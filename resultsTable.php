
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
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo '<td><a href="result.php?id=' . $row['id'] . '">'. $row['Name'] .'</a></td>';
            echo '<td>' . $row['Suburb'] . '</td>';
            echo '<td>' . $row['Street'] . '</td>';
            echo '<td>' . $row['Latitude'] . '</td>';
            echo '<td>' . $row['Longitude'] . '</td>';
            echo "</tr>";
        }
?>

    </tbody>
</table>
