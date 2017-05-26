<?php
function register($name, $pass, $email, $age, $birth) {
    include 'pdo.inc';

    $stmt = $pdo->prepare("SELECT * FROM members WHERE userEmail = :email");
    $stmt->bindValue(':email', $email);

    try {
        $stmt->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
        return False;
    }

    if( $stmt->rowCount() > 0 ) {
        echo '<div class="form_output"><p>Email already registered!</p></div>';
        return False;
    } else {
        $stmt = $pdo->prepare('INSERT INTO members (userName, userPass, userEmail, age, birth) VALUES (:name, SHA2(CONCAT(:pass, "4b3403665fea6"), 0), :email, :age, :birth)');
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':pass', $pass);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':age', $age);
        $stmt->bindValue(':birth', $birth);
        try {
            $stmt->execute();
            echo '<div class="form_output">Thank you for registring! Login to continue.</div>';
            return True;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return False;
        }
    }
}

?>
