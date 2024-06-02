<?php include("config.php");?>
<?php
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "store_db";
    $conn       = new mysqli($servername, $username, $password, $dbname);

    $url = $_SERVER['REQUEST_URI'];
    $parsedUrl = parse_url($url);
    
    if (isset($parsedUrl['query'])) {
        parse_str($parsedUrl['query'], $queryParams);
        if (isset($queryParams['id'])) {
            $order_id = $queryParams['id'];
        }else{
            echo "ID not found in the URL";
        }
    }else{
        echo "No query string found in the URL";
    }

    $shipment_info_id = query_parser("SELECT shipment_info FROM orders WHERE id = $order_id")[0]["shipment_info"];
    $billing_info_id = query_parser("SELECT billing_info FROM orders WHERE id = $order_id")[0]["billing_info"];
    echo $shipment_info_id;
    echo $billing_info_id;

    $billing_info_delete_sql = "DELETE FROM billing_infos WHERE id = $billing_info_id";
    $shipment_info_delete_sql = "DELETE FROM shipment_infos WHERE id = $shipment_info_id";
    $order_products_delete_sql = "DELETE FROM order_products WHERE order_id = $order_id";
    $order_delete_sql = "DELETE FROM orders WHERE id = $order_id";
    
    $conn->query($order_products_delete_sql);
    $conn->query($billing_info_delete_sql);
    $conn->query($shipment_info_delete_sql);
    $conn->query($order_delete_sql);
    
    header("Location: /Basic-E-Commerce-Application/admin_panel/orders.php");
?>