<?php
    $result=null;
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
            $category_id = $queryParams['id'];
        }else{
            echo "ID not found in the URL";
        }
    }else{
        echo "No query string found in the URL";
    }

    echo $category_id;
    $category_name = $_POST["name"];
    echo $category_name;

    $updateSql = "UPDATE categories SET name = '$category_name' WHERE id = $category_id";

    if ($conn -> query ($updateSql)){
        $result="<h2>*******Data insert success*******</h2>";
        //navigate to dashboard.php
        header("Location: /Basic-E-Commerce-Application/admin_panel/categories.php");
    }else{
        die($conn -> error);
    }
?>