<?php
    $result=null;
    if (isset($_POST['submit'])){
        $servername = "localhost";
        $username   = "root";
        $password   = "";
        $dbname     = "store_db";
        $conn       = new mysqli($servername, $username, $password, $dbname);

        $name        = $_POST['name'];
        $surname = $_POST['surname'];
        $user_name = $_POST['userName'];
        $password    = $_POST['password'];
        
        $insertSql = "INSERT INTO admin_table(admin_name, admin_surname, admin_username, admin_pass, admin_status) VALUES ('$name', '$surname', '$user_name', '$password', 1)";

        if ($conn -> query ($insertSql)){
            $result="<h2>*******Data insert success*******</h2>";
            //navigate to dashboard.php
            header("Location: dashboard.php");
        }else{
            die($conn -> error);
        }
    } 
?>