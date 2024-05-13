<?php 

if (!isset($_SESSION['admin_id'])) {
	session_destroy();
    header("Location: logout.php");
    exit;
}

?>