<?php
    session_start();
    unset($_SESSION['isAdmin']);
    header("Location: http://{$_SERVER['HTTP_HOST']}/CAB230_Parks_Site/index.php");
    exit();
?>
