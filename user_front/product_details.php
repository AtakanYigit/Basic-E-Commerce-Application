<?php include("config.php"); ?>
<?php 
    $url = $_SERVER['REQUEST_URI'];
    $parsedUrl = parse_url($url);

    if (isset($parsedUrl['query'])) {
        parse_str($parsedUrl['query'], $queryParams);
        if (isset($queryParams['id'])) {
            $product_id = $queryParams['id'];
        }else{
            echo "ID not found in the URL";
        }
    }else{
        echo "No query string found in the URL";
    }

    $product = query_parser("SELECT * FROM products WHERE id = $product_id")[0];
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
            <h1><?php echo $product["name"]; ?></h1>
            <p class = "mb-4 width-50"><?php echo $product["description"]; ?></p>
            <div class = "d-flex flex-row justify-content-start gap-5">
                <img src = "data:image/png;base64, <?php echo base64_encode($product["image"]); ?>" class = "w-25" alt = "<?php echo $product["name"]; ?>">
                <form class = "d-flex flex-column justify-content-start gap-3" action = "direct_order.php?id=<?php echo $product["id"]; ?>" method = "POST">
                    <p>Price: $<?php echo $product["price"]; ?></p>
                    <p>Stock: <?php echo $product["quantity"]; ?></p>
                    <p>Category: <?php query_parser("SELECT name FROM categories WHERE id = $product[category_id]")[0]["name"]; ?></p>
                    <div class="mb-3">
                        <label for="count_to_buy" class="form-label">How many would you like to buy?</label>
                        <input type="number" name="count_to_buy" class="form-control" id="exampleInputName" value = "1" min = "1" max = "<?php echo $product["quantity"]; ?>">
                    </div>
                    <input type = "submit" class = "btn btn-primary" value = "Buy Now"/>
                    <a class = "btn btn-secondary" href = "product_detail.php/<?php echo $product["name"]; ?>">Add to Cart</a>
                </form>
            </div>
        </main>
        <script src = "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity = "sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin = "anonymous"></script>
        <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity = "sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin = "anonymous"></script>
    </body>
</html>
