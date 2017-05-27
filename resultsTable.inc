<!--  Table to show all results found from user search-->
<table class="search-results" width="100%" class="table">
    <!--  create table heading for name, suburb and other useful data -->
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
        // place all found data within the created table
        foreach ($data as $row) {
            echo "<tr>";
            // set the name of the park as a link to its individual page
            echo '<td><a class="link" href="result.php?id=' . $row['id'] . '">'. $row['Name'] .'</a></td>';
            echo '<td>' . $row['Suburb'] . '</td>';
            echo '<td>' . $row['Street'] . '</td>';
            echo '<td>' . $row['Latitude'] . '</td>';
            echo '<td>' . $row['Longitude'] . '</td>';
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
