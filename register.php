<?php
$name = $_POST['name'];
$pass = $_POST['pass'];
$email = $_POST['email'];

echo '2';
if (isset($_POST['signup']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    echo '3';
    $pdo = new PDO('mysql:host=fastapps04.qut.edu.au;port=3306;dbname=n8783012', 'n8783012', 'MySQLPassword');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("SELECT * FROM users WHERE userEmail = :email");
    $stmt->bindValue(':email', $email);

    echo '4';
    try {
        // $result = $stmt->execute();
        $stmt->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    if( $stmt->rowCount() > 0 ) {
     echo "Email already register!";
    } else {
        $stmt = $pdo->prepare('INSERT INTO users (userName, userPass, userEmail) VALUES (:name, SHA2(CONCAT(:pass, "4b3403665fea6"), 0), :email)');
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':pass', $pass);
        $stmt->bindValue(':email', $email);
        try {
            $stmt->execute();
            echo 'Form submitted successfully with no errors';
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

?>
