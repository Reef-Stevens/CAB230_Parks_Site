<!DOCTYPE html>
<html lang="en">
<head></head>
<body>


<form action="search.php" method="post">
    <input type="text" name="parkNameSearch" placeholder="Search..."/>
    <input type="submit" value=">>">
</form>

<?php

include('createdb.inc');
$output = NULL;

//$connection = new PDO('mysql:host=localhost;dbname=parks', 'root', '');

if (isset($_POST['parkNameSearch'])) {

//Grabbing the users input
$search = $_POST['parkNameSearch'];

// $query = "SELECT Name FROM dataset WHERE Name LIKE \'' .$search .'\'";
// $query = "SELECT Name FROM dataset WHERE Name = \'' .$search .'\'";
$query = "SELECT Name FROM dataset WHERE Name = '%$search%'";

try {

    $result = $pdo->query($query);

    //$output = (string)($result);
    echo "Results: ", $result;

} catch (PDOException $e) {
    echo $e->getMessage();
}
}

?>


</body>
</html>
