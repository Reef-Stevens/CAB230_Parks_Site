<?php
// review function to add new park reviews to the server
function review($name, $review, $rating, $id, $date) {

    include 'pdo.inc'; // create new pdo

    // insert review daat into the server
    $stmt = $pdo->prepare('INSERT INTO reviews (userName, review, rating, parkID, reviewDate) VALUES (:name, :review, :rating, :id, :reviewDate)');
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':review', $review);
    $stmt->bindValue(':rating', $rating);
    $stmt->bindValue(':id', $id);
    $stmt->bindValue(':reviewDate', $date);

    try {
        $stmt->execute();
        return True; // review added to the server
    } catch (PDOException $e) {
        echo $e->getMessage();
        return False;
    }
}
?>
