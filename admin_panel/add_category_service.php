<?php
    $result=null;
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "store_db";
    $conn       = new mysqli($servername, $username, $password, $dbname);

    $category_name = $_POST['name'];
    
    $insertSql = "INSERT INTO categories(name) VALUES ('$category_name')";

    if ($conn -> query ($insertSql)){
        $result="<h2>*******Data insert success*******</h2>";
        //navigate to dashboard.php
        header("Location: /Basic-E-Commerce-Application/admin_panel/categories.php");
    }else{
        die($conn -> error);
    }
?>