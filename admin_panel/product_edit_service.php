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

        echo "<pre>";
        print_r($_POST);
        echo "</pre>";

        echo $name;
        echo $description;
        echo $quantity;
        echo $price;
        
        $encodedImage = null; // Set default value for $encodedImage

        if (isset($_FILES['image']) && !empty($_FILES['image']['tmp_name'])){
            $image = file_get_contents($_FILES['image']['tmp_name']);
            $encodedImage = base64_encode($image);
        }

        echo $encodedImage;
        

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

        echo "---id: " . $product_id;

        // Update the product
        if(!isset($_POST['image']) || empty($_POST['image'])){
            $product_update_sql = "UPDATE products SET name = '$name', description = '$description', quantity = $quantity, price = $price WHERE id = $product_id";
        }else{
            $product_update_sql = "UPDATE products SET name = '$name', description = '$description', quantity = $quantity, price = $price, image = '$encodedImage' WHERE id = $product_id";
        }

        if ($conn -> query ($product_update_sql)){
            $result="<h2>*******Data insert success*******</h2>";
        }else{
            die($conn -> error);
        }

        //Delete the previous categories from product_categories
        $delete_previous_categories_sql = "DELETE FROM product_categories WHERE product_id = $product_id";
        if ($conn -> query ($delete_previous_categories_sql)){
            $result="<h2>*******Data insert success*******</h2>";
        }else{
            die($conn -> error);
        }

        //Create categories in product_categories table
        $category_id = explode(",", $_POST['category_id']);

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

        // header("Location: products.php");
    } 
?>