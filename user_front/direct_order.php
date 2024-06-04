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

    $count_to_buy = $_POST["count_to_buy"] ?? $_POST["count_to_buy_for_$product_id"] ?? 1;

    $direct_order_info = [];
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
        <script>
            const handle_proceed = (e) => {
                <?php 
                    $direct_order_info = [
                        "id" => $product_id,
                        "count_to_buy" => $count_to_buy
                    ];
                    $_SESSION["direct_order_info"] = $direct_order_info;
                ?>

                location.href = "/Basic-E-Commerce-Application/user_front/cargo_detail.php";
            }
        </script>
        <?php include("navbar.php"); ?>
        <main class = "p-5 pt-3">
            <div class = "d-flex flex-row justify-content-start gap-5">
                <img src = "data:image/png;base64, <?php echo base64_encode($product["image"]); ?>" class = "w-25" alt = "<?php echo $product["name"]; ?>">
                <form class = "d-flex flex-column justify-content-start gap-3">
                    <p>Buying: <?php echo $count_to_buy; ?></p>
                    <p>Total Price: <?php echo $count_to_buy * $product["price"]; ?>$</p>
                    <button type = "button" onclick = "handle_proceed()" class = "btn btn-primary">Proceed To Shipment</button>
                </form>
            </div>
        </main>
        <script src = "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity = "sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin = "anonymous"></script>
        <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity = "sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin = "anonymous"></script>
    </body>
</html>
