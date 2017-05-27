<?php
// function to login the user
function loginSession($pass, $email) {
    include 'pdo.inc'; // create new pdo

    // create query to get data for relevant user email and hashed password
    $query = $pdo->prepare("SELECT * FROM members WHERE userEmail = :email AND userPass = SHA2(CONCAT(:pass,'4b3403665fea6'), 0)");
    $query->bindValue(':email', $email);
    $query->bindValue(':pass', $pass);
    try {
        $query->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $query->rowCount() > 0; // return whether the user has been found
}

?>
