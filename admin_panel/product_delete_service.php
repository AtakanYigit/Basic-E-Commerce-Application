<?php include("config.php"); ?>
<?php
    $result = null;
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "store_db";
    $conn       = new mysqli($servername, $username, $password, $dbname);

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

    $delete_product_sql = "DELETE FROM products WHERE id = $product_id";
    $delete_product_categories_sql = "DELETE FROM product_categories WHERE product_id = $product_id";

    $result = insert_or_delete($delete_product_sql);
    $result = insert_or_delete($delete_product_categories_sql);

    header("Location: /Basic-E-Commerce-Application/admin_panel/dashboard.php");
?>