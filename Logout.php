<?php
    session_start();
    unset($_SESSION['isAdmin']);
    unset($_SESSION['email']);
    header("Location: http://{$_SERVER['HTTP_HOST']}/CAB230_Parks_Site/index.php");
    exit();
?>
