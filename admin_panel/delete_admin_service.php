<?php
    $url = $_SERVER['REQUEST_URI'];
    $parsedUrl = parse_url($url);

    if (isset($parsedUrl['query'])) {
        parse_str($parsedUrl['query'], $queryParams);
        if (isset($queryParams['id'])) {
            $admin_id = $queryParams['id'];
        }else{
            echo "ID not found in the URL";
        }
    }else{
        echo "No query string found in the URL";
    }

    $result=null;
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "store_db";
    $conn       = new mysqli($servername, $username, $password, $dbname);

    //Delete Admin By Id
    echo $admin_id;
    $deleteSql = "DELETE FROM admin_table WHERE admin_id = $admin_id";

    if ($conn -> query ($deleteSql)){
        $result="<h2>Data deletion success</h2>";
        echo "here";
        header("Location: /Basic-E-Commerce-Application/admin_panel/admin_list.php");
    }else{
        die($conn -> error);
    }
?>