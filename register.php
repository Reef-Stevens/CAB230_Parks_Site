<?php
$name = $_POST['name'];
$pass = $_POST['pass'];
$email = $_POST['email'];

if (isset($_POST['signup']) && $_SERVER['REQUEST_METHOD'] == 'post') {

    $pdo = new PDO('mysql:host=fastapps04.qut.edu.au;port=3306;dbname=n8783012', 'n8783012', 'MySQLPassword');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = $pdo->prepare("SELECT * FROM users WHERE userEmail = :email");
    $query->bindValue(':email', $email);

    try {
        $result = $pdo->query($query);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $data = $result->fetch();
    if (!empty($data)) {
        echo 'Email already registered';
    } else {
        $query = 'INSERT INTO users (userName, userPass, userEmail) VALUES (\'' . $name . '\', SHA2(CONCAT(\'' . $pass . '\', \'4b3403665fea6\'), 0)' . '\', \'' . $email . '\')';
        try {
            $pdo->query($query);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

?>
