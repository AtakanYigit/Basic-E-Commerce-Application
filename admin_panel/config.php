<?php 
    session_start();

    ini_set('display_errors', '1'); // 1 is on, 0 is off
    ini_set('display_startup_errors', '1'); // 1 is on, 0 is off
    error_reporting(E_ALL);

    //--query function--
    function query_parser($sql='') {
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
        // echo '<pre>'; print_r($query_result); die();

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

        if(empty($sql)){
            return 'sql statement is empty';
        }
        $query_result = $conn->query($sql);
        // echo '<pre>'; print_r($query_result); die();

        return $query_result;
    }
?>



