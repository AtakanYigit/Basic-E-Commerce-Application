<?php

include("config.php");


$username = $_POST['form_username'];
$password = $_POST['form_password'];


$sql = "SELECT * FROM admin_table WHERE admin_username = '$username' AND admin_pass = '$password' ";
$result = berkhoca_query_parser($sql);
// echo "<pre>"; print_r($result); die();

if(!empty($result) && count($result) > 0) {
    
    // Load sessions
    $_SESSION['admin_id']           = $result[0]['admin_id'];
    $_SESSION['admin_username']     = $result[0]['admin_username'];

    // Redirect to dashboard
    header("Location: dashboard.php");

} else {
  
    // Redirect to logout
    session_destroy();
    header("Location: logout.php?warning=1");

}



?>