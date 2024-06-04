<?php
    include("config.php");
    $id = $_GET["id"];
    $status = $_POST["status"];
    insert_or_delete("UPDATE shipment_infos SET status = '$status' WHERE id = $id");
    header("Location: /Basic-E-Commerce-Application/admin_panel/orders.php");
?>