<?php
    session_start();
    $index = $_GET["index"];
    unset($_SESSION["cart"][$index]);
    header("Location: /Basic-E-Commerce-Application/user_front/cart.php");
    exit();
?>