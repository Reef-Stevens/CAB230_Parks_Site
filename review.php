<?php
function review($name, $review, $rating, $id, $date) {

    include 'pdo.inc';

    $stmt = $pdo->prepare('INSERT INTO reviews (userName, review, rating, parkID, reviewDate) VALUES (:name, :review, :rating, :id, :reviewDate)');
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':review', $review);
    $stmt->bindValue(':rating', $rating);
    $stmt->bindValue(':id', $id);
    $stmt->bindValue(':reviewDate', $date);

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
