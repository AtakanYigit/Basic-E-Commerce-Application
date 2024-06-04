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
            $encodedImage = file_get_contents($_FILES['image']['tmp_name']);
        }

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
        if(!isset($encodedImage) || empty($encodedImage)){
            $product_update_sql = $conn->prepare("UPDATE products SET name = ?, description = ?, quantity = ?, price = ? WHERE id = ?");
            $product_update_sql->bind_param("sssss", $name, $description, $quantity, $price, $product_id);
        }else{
            $product_update_sql = $conn->prepare("UPDATE products SET name = ?, description = ?, quantity = ?, price = ?, image = ? WHERE id = ?");
            $product_update_sql->bind_param("ssssss", $name, $description, $quantity, $price, $encodedImage, $product_id);
        }

        echo "<pre>";
        print_r($product_update_sql);
        echo "</pre>";

        if ($product_update_sql->execute()){
            $result="<h2>**Data insert success**</h2>";
        }else{
            die($conn->error);
        }

        //Delete the previous categories from product_categories
        $delete_previous_categories_sql = "DELETE FROM product_categories WHERE product_id = $product_id";
        if ($conn -> query ($delete_previous_categories_sql)){
            $result="<h2>**Data insert success**</h2>";
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
                $result="<h2>**Data insert success**</h2>";
            }else{
                die($conn -> error);
            }
        }

        header("Location: dashboard.php");
    } 
?>