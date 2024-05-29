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

    //Create order in orders table
    $insertOrder = "INSERT INTO orders (cargo_info, billing_info, created_at) VALUES ('Cargo Info Here', 'Billing Info Here', NOW())";
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