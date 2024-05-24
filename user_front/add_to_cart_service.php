<?php
    session_start();
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $count = isset($_POST['count']) ? $_POST['count'] : 1;

    if (is_null($id)) {
        echo 'Error: Product ID not provided.';
        exit();
    }

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }


    array_push($_SESSION['cart'], [$id, $count]);
    return $_SESSION['cart'];
    session_destroy();
?>
