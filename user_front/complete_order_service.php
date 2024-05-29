<?php include ("config.php"); ?>
<?php
    $url = $_SERVER['REQUEST_URI'];
    $parsedUrl = parse_url($url);

    $result = null;
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "store_db";
    $conn       = new mysqli($servername, $username, $password, $dbname);

    //Create Shipping Info in shipment_infos table
    echo '<pre>'; print_r($_SESSION["shipment_info"]); echo '</pre>';
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

    //Create Billing Info in billing_infos table
    $card_number = $_SESSION["payment_info"][0]["card_number"];
    $card_holder = $_SESSION["payment_info"][0]["card_holder"];
    $valid_month = $_SESSION["payment_info"][0]["valid_month"];
    $valid_year = $_SESSION["payment_info"][0]["valid_year"];
    $ccv = $_SESSION["payment_info"][0]["ccv"];

    $insertBillingInfo = "INSERT INTO billing_infos (card_number, card_holder, valid_month, valid_year, ccv) VALUES ('$card_number', '$card_holder', '$valid_month', '$valid_year', '$ccv')";
    if ($conn -> query ($insertBillingInfo)){
        $result="<h2>Billing Info created</h2>";
        $billing_info_id = $conn->insert_id;
        echo $result;
    }else{
        die($conn -> error);
    }

    //Create order in orders table
    $insertOrder = "INSERT INTO orders (shipment_info, billing_info, created_at) VALUES ($shipment_info_id, $billing_info_id, NOW())";
    if ($conn -> query ($insertOrder)){
        $result="<h2>Order created</h2>";
        $order_id = $conn->insert_id;
        echo $result;
    }else{
        die($conn -> error);
    }

    foreach($_SESSION["cart"] as $cart_item){
        $product_id = $cart_item[0];
        $count_to_buy = $cart_item[1];

        //Create order_product in order_products table and link the order_product to the order
        $insertOrderProduct = "INSERT INTO order_products (product_id, order_id, quantity) VALUES ($product_id, $order_id, $count_to_buy)";
        if ($conn -> query ($insertOrderProduct)){
            $result="<h2>Order Product created</h2>";
            echo $result;
        }else{
            die($conn -> error);
        }

        //Reduce the quantity of the product
        $updateProduct = "UPDATE products SET quantity = quantity - $count_to_buy WHERE id = $product_id";
        if ($conn -> query ($updateProduct)){
            $result="<h2>Product quantity updated</h2>";
            echo $result;
        }else{
            die($conn -> error);
        }
    }

    echo $order_id;
    $_SESSION["cart"] = [];
    header("Location: /Basic-E-Commerce-Application/user_front/order_completed.php?id=$order_id");
?>