<?php
// Register a user and their details within a members table
function register($name, $pass, $email, $age, $birth) {
    include 'pdo.inc';
    // tries to get any email that would be the same as the one used in the form
    $stmt = $pdo->prepare("SELECT * FROM members WHERE userEmail = :email");
    $stmt->bindValue(':email', $email);

    try {
        $stmt->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
        return False;
    }

    if( $stmt->rowCount() > 0 ) { // checks if there is any data found, if so the user is already registered
        echo '<div class="form_output"><p>Email already registered!</p></div>';
        return False;
    } else { // for new users, it stored all their given data and the hashed password in the server
        $stmt = $pdo->prepare('INSERT INTO members (userName, userPass, userEmail, age, birth) VALUES (:name, SHA2(CONCAT(:pass, "4b3403665fea6"), 0), :email, :age, :birth)');
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':pass', $pass);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':age', $age);
        $stmt->bindValue(':birth', $birth);
        try {
            $stmt->execute(); // user added successfully
            return True;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return False;
        }
    }
}
?>
