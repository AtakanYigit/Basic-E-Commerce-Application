<?php
    include("config.php");
    $index = $_GET["index"];
    $quantity = $_GET["quantity"];
    $_SESSION["cart"][$index][1] = $quantity;
    header("Location: /Basic-E-Commerce-Application/user_front/cart.php");
?>