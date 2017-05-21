<?php
function register($name, $pass, $email) {
    $pdo = new PDO('mysql:host=fastapps04.qut.edu.au;port=3306;dbname=n8783012', 'n8783012', 'MySQLPassword');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("SELECT * FROM users WHERE userEmail = :email");
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
        $stmt = $pdo->prepare('INSERT INTO users (userName, userPass, userEmail) VALUES (:name, SHA2(CONCAT(:pass, "4b3403665fea6"), 0), :email)');
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':pass', $pass);
        $stmt->bindValue(':email', $email);
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
