<?php
    session_start();

    $_SESSION["payment_info"] = [];

    array_push($_SESSION["payment_info"], [
        "card_number"   => $_POST["card_number"],
        "card_holder"   => $_POST["card_holder"],
        "valid_month"   => $_POST["valid_month"],
        "valid_year"    => $_POST["valid_year"],
        "ccv"           => $_POST["ccv"]
    ]);

    header("Location: /Basic-E-Commerce-Application/user_front/complete_order_service.php");
?>