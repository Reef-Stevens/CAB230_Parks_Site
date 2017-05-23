
<table width="100%" border="solid" class="table">
    <thead>
    <th>
        Park Name
    </th>
    <th>
        Suburb
    </th>
    <th>
        Street
    </th>
    <th>
        Latitude
    </th>
    <th>
        Longitude
    </th>
    </thead>
    <tbody>

<?php

$search = $pdo->prepare("SELECT id, Name, Suburb, Street, Latitude, Longitude FROM dataset WHERE Name LIKE ?");
// Execute with wildcards
$search->execute(array("%$q%"));


        while ($row = $search->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo '<td><a href="individualPageOne.php?id=' . $row['id'] . '">'. $row['Name'] .'</a></td>';
            echo '<td>' . $row['Suburb'] . '</td>';
            echo '<td>' . $row['Street'] . '</td>';
            echo '<td>' . $row['Latitude'] . '</td>';
            echo '<td>' . $row['Longitude'] . '</td>';
            echo "</tr>";
        }
?>

    </tbody>
</table>
