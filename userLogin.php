<?php
function loginSession($pass, $email) {
    include 'pdo.inc';

    $query = $pdo->prepare("SELECT * FROM members WHERE userEmail = :email AND userPass = SHA2(CONCAT(:pass,'4b3403665fea6'), 0)");
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
