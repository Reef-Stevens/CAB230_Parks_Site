<!--  Search form by name, suburb, and rating for parks  -->
<form class="searchform" name="myForm" action="search.php" method="get">
    <!-- Search box -->
    <input id="search" type="text" name="search" placeholder="Search by name, suburb or rating!"/>
    <!-- Categories -->
    <div class="set">
        <select id="choose" name="select" onchange="myFunction()">
            <option value="searchByName" selected>Name</option>
            <option value="searchBySuburb">Suburb</option>
            <option value="searchByRating">Rating</option>
        </select>
    </div>
    <!--  ratings selection, only appears if search by rating is selected -->
    <div class="rating">
        <select id="rate" name="rating">
            <option value="rate" selected>Any rating</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
    </div>
    <!--  ratings selection, only appears if search by rating is selected -->
    <div class="suburb">
        <select id="suburb" name="suburb">
            <?php
            include 'pdo.inc';
            // create a query to get all suburbs for the select option of the form
            $query = $pdo->prepare("SELECT Suburb FROM items");
            try {
                $query->execute();
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            // loop over the suburbs and add unique suburbs to the options list
            $last = "";
            while ($row = $query->fetch(PDO::FETCH_ASSOC)){ // Save all park IDs in an array
                if ($row['Suburb'] != $last) { // check for unique suburbs
                    $last = $row['Suburb']; // this works as the suburbs are sorted
                    echo '<option value="'.$row['Suburb'].'">'.$row['Suburb'].'</option>';
                }
            }
            ?>
        </select>
    </div>
    <input type="submit" value="&#10140;">
</form>
