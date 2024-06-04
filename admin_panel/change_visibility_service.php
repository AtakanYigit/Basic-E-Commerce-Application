<?php
    include("config.php");
    $url = $_SERVER['REQUEST_URI'];
    $parsedUrl = parse_url($url);

    if (isset($parsedUrl['query'])) {
        parse_str($parsedUrl['query'], $queryParams);
        if (isset($queryParams['id'])) {
            $id = $queryParams['id'];
        }else{
            echo "ID not found in the URL";
        }

        if (isset($queryParams['status'])) {
            $status = $queryParams['status'];
        }else{
            echo "Status not found in the URL";
        }

    }else{
        echo "No query string found in the URL";
    }

    echo $id;
    echo $status;

    echo "UPDATE shipment_infos SET is_hidden = '$status' WHERE id = $id";

    insert_or_delete("UPDATE products SET is_hidden = '$status' WHERE id = $id");

    header("Location: /Basic-E-Commerce-Application/admin_panel/dashboard.php");
?>