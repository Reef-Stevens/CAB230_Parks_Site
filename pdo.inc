<!--  New PDO query with set attributes  -->
<?php
$pdo = new PDO('mysql:host=fastapps04.qut.edu.au;port=3306;dbname=n8783012', 'n8783012', 'MySQLPassword');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
