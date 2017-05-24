<?php
function review($name,$review,$rating,$id) {

    $pdo = new PDO('mysql:host=fastapps04.qut.edu.au;port=3306;dbname=n8783012', 'n8783012', 'MySQLPassword');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare('INSERT INTO reviews (userName, review, rating, parkID) VALUES (:name, :review, :rating, :id)');
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':review', $review);
    $stmt->bindValue(':rating', $rating);
    $stmt->bindValue(':id', $id);

    try {
        $stmt->execute();
        echo '<div class="form_output">Thank you the review.</div>';
        return True;
    } catch (PDOException $e) {
        echo $e->getMessage();
        return False;
    }
}

?>