<?php
function loginSession($pass, $email) {
    $pdo = new PDO('mysql:host=fastapps04.qut.edu.au;port=3306;dbname=n8783012', 'n8783012', 'MySQLPassword');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = $pdo->prepare("SELECT * FROM users WHERE userEmail = :email AND userPass = SHA2(CONCAT(:pass,'4b3403665fea6'), 0)");
    $query->bindValue(':email', $email);
    $query->bindValue(':pass', $pass);
    try {
        $query->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $query->rowCount() > 0;
}

?>
