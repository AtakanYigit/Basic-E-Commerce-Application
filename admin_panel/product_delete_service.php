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

    $sql = "DELETE FROM products, product_categories 
            USING products
            INNER JOIN product_categories ON products.id = product_categories.product_id
            WHERE products.id = $product_id";

    if ($conn->query($sql) === TRUE) {
        $result = "Record deleted successfully";
    } else {
        $result = "Error deleting record: " . $conn->error;
    }

    header("Location: /Basic-E-Commerce-Application/admin_panel/dashboard.php");
?>