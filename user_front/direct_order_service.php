<?php
    $url = $_SERVER['REQUEST_URI'];
    $parsedUrl = parse_url($url);

    if (isset($parsedUrl['query'])) {
        parse_str($parsedUrl['query'], $queryParams);
        if (isset($queryParams['id'])) {
            $product_id = $queryParams['id'];
        }else{
            echo "ID not found in the URL";
        }

        if(isset($queryParams['count_to_buy'])){
            $count_to_buy = $queryParams['count_to_buy'];
        }else{
            echo "Count to buy not found in the URL";
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

    //Create Shipping Info in shipment_infos table
    $address = $_SESSION["shipment_info"][0]["address"];
    $telephone = $_SESSION["shipment_info"][0]["telephone"];
    $name = $_SESSION["shipment_info"][0]["name"];
    $surname = $_SESSION["shipment_info"][0]["surname"];

    $insertShipmentInfo = "INSERT INTO shipment_infos (address, telephone, name, surname) VALUES ('$address', '$telephone', '$name', '$surname')";
    if ($conn -> query ($insertShipmentInfo)){
        $result="<h2>Shipment Info created</h2>";
        $shipment_info_id = $conn->insert_id;
        echo $result;
    }else{
        die($conn -> error);
    }

    //Create Shipping Info in shipment_infos table
    $insertShipmentInfo = "INSERT INTO shipment_infos (address, telephone, name, surname) VALUES ($_SESSION["shipment_info"][0]["address"], $_SESSION["shipment_info"][0]["telephone"], $_SESSION["shipment_info"][0]["name"], $_SESSION["shipment_info"][0]["surname"])";
    if ($conn -> query ($insertShipmentInfo)){
        $result="<h2>Shipment Info created</h2>";
        $shipment_info_id = $conn->insert_id;
        echo $result;
    }else{
        die($conn -> error);
    }

    //Create order in orders table
    $insertOrder = "INSERT INTO orders (shipment_info, billing_info, created_at) VALUES ($shipment_info_id, 'Billing Info Here', NOW())";
    if ($conn -> query ($insertOrder)){
        $result="<h2>Order created</h2>";
    }else{
        die($conn -> error);
    }

    //Create order_product in order_products table and link the order_product to the order
    $insertOrderProduct = "INSERT INTO order_products (product_id, order_id, quantity) VALUES ($product_id, LAST_INSERT_ID(), $count_to_buy)";
    if ($conn -> query ($insertOrderProduct)){
        $last_id = $conn->insert_id;

        $result="<h2>Order Product created</h2>";
    }else{
        die($conn -> error);
    }

    //Reduce the quantity of the product
    $updateProduct = "UPDATE products SET quantity = quantity - $count_to_buy WHERE id = $product_id";
    if ($conn -> query ($updateProduct)){
        $result="<h2>Product quantity updated</h2>";
        header("Location: /Basic-E-Commerce-Application/user_front/order_completed.php?id=$last_id");
    }else{
        die($conn -> error);
    }
?>