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
    if (isset($_POST['submit'])){
        $servername = "localhost";
        $username   = "root";
        $password   = "";
        $dbname     = "store_db";
        $conn       = new mysqli($servername, $username, $password, $dbname);

        $name        = $_POST['name'];
        $surname     = $_POST['surname'];
        $user_name   = $_POST['userName'];
        $password    = $_POST['password'];
        $insertSql = "UPDATE admin_table SET admin_name = '$name', admin_surname = '$surname', admin_username = '$user_name', admin_pass = '$password' WHERE admin_id = $admin_id";

        if ($conn -> query ($insertSql)){
            $result="<h2>Data insert success</h2>";
            header("Location: /Basic-E-Commerce-Application/admin_panel/admin_list.php");
        }else{
            die($conn -> error);
        }
    } 
?>