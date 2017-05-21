<?php
    session_start();
    if (isset($_SESSION['isAdmin'])) {
        require "headerLogout.php";
    } else {
        require "header.php";
    }
?>
