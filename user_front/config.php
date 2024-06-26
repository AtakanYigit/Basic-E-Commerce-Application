<?php 
    session_start();
    if(!isset($_SESSION["cart"])){
        $_SESSION["cart"] = [];
    }   

    if(!isset($_SESSION["shipment_info"])){
        $_SESSION["shipment_info"] = [];
    }   

    if(!isset($_SESSION["payment_info"])){
        $_SESSION["payment_info"] = [];
    }   

    if(!isset($_SESSION["previous_orders"])){
        $_SESSION["previous_orders"] = [];
    }

    if(!isset($_SESSION["direct_order_info"])){
        $_SESSION["direct_order_info"] = [];
    }

    ini_set('display_errors', '1'); // 1 is on, 0 is off
    ini_set('display_startup_errors', '1'); // 1 is on, 0 is off
    error_reporting(E_ALL);

    function query_parser($sql='') {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "store_db";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        if(empty($sql)) {
            return 'sql statement is empty';
        }
        $query_result = $conn->query($sql);

        $array_result = [];
        while($row = $query_result->fetch_assoc()) {
            $array_result[] = $row;
        }
        return $array_result;
    }

    function insert_or_delete($sql='') {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "store_db";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        if(empty($sql)) {
            return 'sql statement is empty';
        }
        $query_result = $conn->query($sql);

        return $query_result;

    }

    //Check db if that order exists, if not remove from $_SESSION["previous_orders"]
    if(isset($_SESSION["previous_orders"])){
        foreach($_SESSION["previous_orders"] as $key => $order){
            $sql = "SELECT * FROM orders WHERE id = $order";
            $result = query_parser($sql);
            if(empty($result)){
                unset($_SESSION["previous_orders"][$key]);
            }
        }
    }
?>