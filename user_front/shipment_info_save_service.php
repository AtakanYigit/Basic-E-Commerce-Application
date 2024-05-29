<?php
    session_start();

    $_SESSION["shipment_info"] = [];

    array_push($_SESSION["shipment_info"], [
        "address"   => $_POST["address"],
        "telephone" => $_POST["telephone"],
        "name"      => $_POST["name"],
        "surname"   => $_POST["surname"]
    ]);

    header("Location: /Basic-E-Commerce-Application/user_front/payment.php");
?>