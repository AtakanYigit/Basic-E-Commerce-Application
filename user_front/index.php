<?php 
    session_start(); //--we started session--
    ini_set("display_errors", "1"); // 1 is on, 0 is off
    ini_set("display_startup_errors", "1"); // 1 is on, 0 is off
    error_reporting(E_ALL);
    function query_parser($sql = "") {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "store_db";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        if(empty($sql)) {
            return "sql statement is empty";
        }
        $query_result = $conn->query($sql);
        $array_result = [];
        while($row = $query_result->fetch_assoc()) {
            $array_result[] = $row;
        }
        return $array_result;
    }

    function insert_or_delete($sql = "") {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "store_db";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        if(empty($sql)) {
            return "sql statement is empty";
        }
        $query_result = $conn->query($sql);
    }
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
        <main class = "ps-5 pt-3">
            <h1>Welcome to Yigit's Store</h1>
            <p class = "mb-4">Yigit's Store is a leading online store that offers a wide range of products at competitive prices. Our goal is to provide our customers with the best shopping experience possible. We offer a wide selection of products, including electronics, clothing, home goods, and more. Whether you're looking for the latest tech gadgets or stylish fashion accessories, you'll find it all at Yigit's Store. Shop with us today and experience the difference!</p>
            <div class = "d-flex justify-content-between gap-3">
                <?php foreach(query_parser("SELECT * FROM products") as $product) { ?>
                    <div class = "card rounded" style = "width: 20%;">
                        <img src = "data:image/png;base64, <?php echo base64_encode($product["image"]); ?>" class = "card-img-top" alt = "<?php echo $product["name"]; ?>">
                        <div class = "card-body">
                            <h5 class = "card-title"><?php echo $product["name"]; ?></h5>
                            <p class = "card-text"><?php echo $product["description"]; ?></p>
                            <a class = "btn btn-primary"   href = "order.php/<?php echo $product["name"]; ?>">Buy Now</a>
                            <a class = "btn btn-secondary" href = "product_detail.php/<?php echo $product["name"]; ?>">Add to Cart</a>
                            <a class = "btn btn-secondary" href = "product_detail.php/<?php echo $product["name"]; ?>">Details</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </main>
        <script src = "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity = "sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin = "anonymous"></script>
        <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity = "sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin = "anonymous"></script>
    </body>
</html>
