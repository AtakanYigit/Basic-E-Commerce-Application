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

    $url = $_SERVER['REQUEST_URI'];
    $parsedUrl = parse_url($url);

    if (isset($parsedUrl['query'])) {
        parse_str($parsedUrl['query'], $queryParams);
        if (isset($queryParams['id'])) {
            $category_id = $queryParams['id'];
        }else{
            echo "ID not found in the URL";
        }
    }else{
        echo "No query string found in the URL";
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
        <script>
            const handle_add_to_cart_click = (e, id, count) =>{
                e.preventDefault();
                fetch("add_to_cart_service.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: "id=" + id + "&count=" + count
                })
                    .then(response => {
                        if (response.ok) {
                            console.log(response);
                            location.reload();
                        } else {
                            throw new Error("Failed to add product to cart");
                        }
                    })
                    .catch(error => {
                        console.error(error);
                        alert("Failed to add product to cart")
                    });
                }
        </script>

        <main class = "ps-5 pt-3">
            <h1>Welcome to Yigit's Store</h1>
            <p class = "mb-4">Yigit's Store is a leading online store that offers a wide range of products at competitive prices. Our goal is to provide our customers with the best shopping experience possible. We offer a wide selection of products, including electronics, clothing, home goods, and more. Whether you're looking for the latest tech gadgets or stylish fashion accessories, you'll find it all at Yigit's Store. Shop with us today and experience the difference!</p>
            <div class = "d-flex flex-row justify-content-center gap-5 w-100">
                <div class = "d-flex justify-content-start gap-5 flex-wrap mb-5" style = "width: 85%">
                <!-- Select product from product_categories with $category_id by product_id-->
                    <?php foreach(query_parser("SELECT products.id, products.name, products.description, products.price, products.image, products.quantity FROM products INNER JOIN product_categories ON products.id = product_categories.product_id WHERE product_categories.category_id = $category_id") as $product) { ?>
                        <form class = "card rounded" style = "width: 20%;" action = "direct_order.php?id=<?php echo $product["id"]; ?>" method = "POST">
                            <a href = "product_details.php?id=<?php echo $product["id"]; ?>" class = "card-img-top justify-content-center align-items-start d-flex overflow-hidden" style = "height: 200px;">
                                <img src = "data:image/png;base64, <?php echo base64_encode($product["image"]); ?>" style = "max-width: 100%" alt = "<?php echo $product["name"]; ?>">
                            </a>
                            <div class = "card-body">
                                <h5 class = "card-title"><?php echo $product["name"]; ?></h5>
                                <p class = "card-text"><?php echo $product["description"]; ?></p>
                                <p class = "card-text"><?php echo $product["price"]; ?>$</p>
                                <div class = "d-flex flex-row gap-3">
                                    <input type="number" name="count_to_buy_for_<?php echo $product["id"]?>" class="form-control w-50" id="exampleInputName" value="1" min = "1" max = "<?php echo $product["quantity"]; ?>">
                                    <button class="btn btn-secondary w-50" style = "white-space:nowrap" type="button" onclick = "handle_add_to_cart_click(event, <?php echo $product['id']; ?>, document.querySelector('input[name=count_to_buy_for_<?php echo $product['id']; ?>').value)">Add to Cart</button>
                                </div>
                                <div class = "d-flex flex-row gap-3 mt-2 gap-3 align-items-center w-100">
                                    <input type = "submit" class = "btn btn-primary w-50" value = "Buy Now"/>
                                    <a class = "btn btn-secondary w-50" href = "product_details.php?id=<?php echo $product["id"]; ?>">Details</a>
                                </div>
                            </div>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </main>
        <script src = "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity = "sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin = "anonymous"></script>
        <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity = "sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin = "anonymous"></script>
    </body>
</html>
