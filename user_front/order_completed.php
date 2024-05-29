<?php include("config.php"); ?>

<?php 
    $url = $_SERVER['REQUEST_URI'];
    $parsedUrl = parse_url($url);

    if (isset($parsedUrl['query'])) {
        parse_str($parsedUrl['query'], $queryParams);
        if (isset($queryParams['id'])) {
            $order_id = $queryParams['id'];
        }else{
            echo "ID not found in the URL";
        }
    }else{
        echo "No query string found in the URL";
    }

    //I have 3 tables. 1)- products, 2)- orders, 3)- order_products. Each order can have multiple order_products. Each order_product is linked to a product. I need to get the product details of each product which is linked by order_product that has the id to the order.
    $order = query_parser("SELECT * FROM orders WHERE id = $order_id")[0];
    $order_products = query_parser("SELECT products.id as product_id, products.image as product_image, products.name as product_name, products.price as product_price, order_products.quantity as product_quantity FROM order_products INNER JOIN products ON order_products.product_id = products.id WHERE order_products.order_id = $order_id");
?>

<!DOCTYPE html> 
<html lang = "en"> 
    <head> 
        <meta charset = "UTF-8"> 
        <meta name = "viewport"             content = "width=device-width, initial-scale=1.0 , minimum-scale=1"> 
        <meta name = "author"               content = "Atakan Yigit Cengeloglu"> 
        <meta name = "description"          content = "Welcome to Yigit's Store">
        <title>Yigit's Store</title> 
        <link rel = "icon"                  href = "favicon.ico">
        <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel = "stylesheet" integrity = "sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin = "anonymous">
        <link rel = "stylesheet preload"    type = "text/css"    href = "style.css" as = "style"> 
    </head>
    <body>
        <?php include("navbar.php"); ?>
        <main class = "p-5 pt-3">
            <h1>You Have Completed Your Order!</h1>
            <p class = "mb-4">Thank you for shopping with us! Your order has been successfully placed. Below are the details of your order:</p>
            <a href = "/Basic-E-Commerce-Application/user_front/index.php" class = "btn btn-primary mb-5">Continue Shopping</a>
            <div>
                <p>Order ID: <?php echo $order["id"]; ?></p>
                <p>Order Date: <?php echo $order["created_at"]; ?></p>
                <p>Total Price: 
                    <?php 
                        $total_price = 0;
                        foreach($order_products as $product) {
                            $total_price += $product["product_price"] * $product["product_quantity"];
                        }
                        echo "$" . $total_price;
                    ?>
                </p>
            </div>
            <p class = "mt-3" style = "text-decoration: none">Order Details:</p>
            <!-- Print $order_products  -->
            <?php foreach($order_products as $product) { ?>
                <a href = "/Basic-E-Commerce-Application/user_front/product_details.php?id=<?php echo $product["product_id"]; ?>" class = "card" style = "text-decoration: none">
                    <div class = "card-body">
                        <div class = "d-flex flex-row justify-content-start gap-5">
                            <img src = "data:image/png;base64, <?php echo base64_encode($product["product_image"]); ?>" style = "width: 160px">
                            <div>
                                <p class = "card-text" style = "text-decoration: none">Product: <?php echo $product["product_name"]; ?></p>
                                <p class = "card-text" style = "text-decoration: none">Price: $<?php echo $product["product_price"]; ?></p>
                                <p class = "card-text" style = "text-decoration: none">Quantity: <?php echo $product["product_quantity"]; ?></p>
                                <p class = "card-text" style = "text-decoration: none">Total Price: $<?php echo $product["product_price"] * $product["product_quantity"]; ?></p>
                            </div>
                        </div>
                    </div>
                </a>
            <?php } ?>
        </main>
        <script src = "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity = "sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin = "anonymous"></script>
        <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity = "sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin = "anonymous"></script>
    </body>
</html>
