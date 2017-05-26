<?php
    // removes user info from the session
    session_start();
    unset($_SESSION['isAdmin']);
    unset($_SESSION['email']);
    header("Location: index.php"); // sends back to the home page
    exit();
?>
