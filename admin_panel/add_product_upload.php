<?php
    $result=null;
    if (isset($_POST['submit'])){
        $servername = "localhost";
        $username   = "root";
        $password   = "";
        $dbname     = "store_db";
        $conn       = new mysqli($servername, $username, $password, $dbname);

        $name        = $_POST['name'];
        $category_id = $_POST['category_id'];
        $description = $_POST['description'];
        $quantity    = $_POST['quantity'];
        $price       = $_POST['price'];

        $encodedImage = null; // Set default value for $encodedImage

        if (isset($_FILES['image']) && !empty($_FILES['image']['tmp_name'])){
            $image = file_get_contents($_FILES['image']['tmp_name']);
            $encodedImage = base64_encode($image);
        }

        $insertSql = "INSERT INTO products(name, category_id, description, quantity, price, image) VALUES ('$name', '$category_id', '$description',$quantity, $price, '$encodedImage')";

        if ($conn -> query ($insertSql)){
            $result="<h2>*******Data insert success*******</h2>";
        }else{
            die($conn -> error);
        }
    } 
?>