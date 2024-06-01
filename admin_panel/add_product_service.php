<?php
    $result = null;
    if (isset($_POST['submit'])){
        $servername = "localhost";
        $username   = "root";
        $password   = "";
        $dbname     = "store_db";
        $conn       = new mysqli($servername, $username, $password, $dbname);

        $name        = $_POST['name'];
        $description = $_POST['description'];
        $quantity    = $_POST['quantity'];
        $price       = $_POST['price'];

        $encodedImage = null; // Set default value for $encodedImage

        if (isset($_FILES['image']) && !empty($_FILES['image']['tmp_name'])){
            $image = file_get_contents($_FILES['image']['tmp_name']);
            $encodedImage = base64_encode($image);
        }

        // Insert the product into the database
        $product_insert_sql = "INSERT INTO products(name, description, quantity, price, image) VALUES ('$name', '$description',$quantity, $price, '$encodedImage')";

        if ($conn -> query ($product_insert_sql)){
            $result="<h2>*******Data insert success*******</h2>";
        }else{
            die($conn -> error);
        }

        //Create categories in product_categories table
        $category_id = explode(",", $_POST['category_id']);
        
        $product_id = $conn -> insert_id;
        
        foreach ($category_id as $category_id){
            $category_id = trim($category_id);
            $category_id = (int)$category_id;

            $product_categories_insert_sql = "INSERT INTO product_categories(product_id, category_id) VALUES ('$product_id', '$category_id')";
            if ($conn -> query ($product_categories_insert_sql)){
                $result="<h2>*******Data insert success*******</h2>";
            }else{
                die($conn -> error);
            }
        }

        header("Location: products.php");
    } 
?>