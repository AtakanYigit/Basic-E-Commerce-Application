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

    $sql = "DELETE FROM products WHERE id = $product_id";
    
    if ($conn->query($sql) === TRUE) {
        $result = "Record deleted successfully";
    } else {
        $result = "Error deleting record: " . $conn->error;
    }

    header("Location: /Basic-E-Commerce-Application/admin_panel/products.php");
?>