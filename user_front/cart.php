<?php include("config.php"); ?>
<!DOCTYPE html> 
<html lang = "en"> 
    <head> 
        <meta charset = "UTF-8"> 
        <meta name = "viewport"             content = "width=device-width, initial-scale=1.0 , minimum-scale=1"> 
        <meta name = "author"               content = "Atakan Yigit Cengeloglu"> 
        <meta name = "description"          content = "Welcome to Yigit's Store">
        <title>Cart</title> 
        <link rel = "icon"                  href = "favicon.ico">
        <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel = "stylesheet" integrity = "sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin = "anonymous">
        <link rel = "stylesheet preload"    type = "text/css"    href = "style.css" as = "style"> 
    </head>
    <body>
        <?php include("navbar.php"); ?>
        <main class = "p-5 pt-3">
            <h1>Your Cart!</h1>
            <p class = "mt-3" style = "text-decoration: none">Order Details:</p>
            <?php foreach($_SESSION["cart"] as $index=>$cart_item) { ?>
                <?php 
                    $product_id = $cart_item[0];
                    $product_quantity = $cart_item[1];
                    $product = query_parser("SELECT * FROM products WHERE id = $product_id")[0];
                ?>
                
                <div class = "card" style = "text-decoration: none">
                    <form class = "card-body" action = "remove_from_cart_service.php<?php echo "?index=" . $index; ?>" method = "POST">
                        <div class = "d-flex flex-row justify-content-start gap-5">
                            <a href = "/Basic-E-Commerce-Application/user_front/product_details.php?id=<?php echo $product["id"]; ?>"  class = " d-flex justify-content-center align-items-center overflow-hidden" style = "width: 240px; border: 4px solid rgba(10, 62, 204, 0.15); border-radius: 5px; border-radius: 5px">
                                <img src = "data:image/png;base64, <?php echo base64_encode($product["image"]); ?>" style = "object-fit: cover; width: 100%; height: 100%">
                            </a>
                            <div>
                                <p class = "card-text" style = "text-decoration: none">Product: <?php echo $product["name"]; ?></p>
                                <p class = "card-text" style = "text-decoration: none">Price: $<?php echo $product["price"]; ?></p>
                                <p class = "card-text" style = "text-decoration: none">Quantity: <?php echo $product_quantity; ?></p>
                                <p class = "card-text" style = "text-decoration: none">Total Price: $<?php echo $product["price"] * $product_quantity; ?></p>
                                <button class = "btn btn-danger">Remove From Cart</button>
                            </div>
                        </div>
                    </form>
            </div>
            <?php } ?>
            <!-- Total Price -->
            <?php 
                $total_price = 0;
                foreach($_SESSION["cart"] as $cart_item) {
                    $product_id = $cart_item[0];
                    $product_quantity = $cart_item[1];
                    $product = query_parser("SELECT * FROM products WHERE id = $product_id")[0];
                    $total_price += $product["price"] * $product_quantity;
                }
                echo "<p class = 'mt-3'>Total Price: $" . $total_price . "</p>";
            ?>
            <a href = "/Basic-E-Commerce-Application/user_front/complete_order.php" class = "btn btn-primary mb-5">Buy Now</a>
        </main>
        <script src = "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity = "sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin = "anonymous"></script>
        <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity = "sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin = "anonymous"></script>
        <?php include("footer.php"); ?>
    </body>
</html>
