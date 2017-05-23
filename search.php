<!--         Header        -->
<?php
require 'adminPermission.inc';
?>

<body>

    <!--         Search and large park background        -->
    <div class="section">

        <!-- Previous search, in serach bar, along with settings -->
        <div class="row search_bg">
            <div class="container search_field">
                <form class="searchform" name="myForm" action="search.php" method="get">
                    <!-- Search box -->
                    <input type="text" name="search" placeholder="Search..."/>
                    <!-- Categories -->
                    <select name="select">
                        <option value="searchByName" selected>Name</option>
                        <option value="searchBySuburb">Suburb</option>
                        <option value="searchByRating">Rating</option>
                        <option value="searchByLocation">Location</option>
                    </select>
                    <input type="submit" value="&#10140;">
                </form>
            </div>
        </div>
        <div class="map_field" id="GoogleMap">
            <!--          Geolocation Map           -->
            <button onclick="getLocation()">Search your Location!</button>
            <p id="demo"></p>
            <img class="homeMap" src="images/homePageMap.png" alt="map">
        </div>
    </div>

    <?php
    include('createdb.inc');

    if (isset($_GET['search'])) {
        // Users search terms is taken and saved
        $search = $_GET['search'];

        // If the search was done by name
        if($_GET["select"] == "searchByName") {
            // Prepare statement
            $query = $pdo->prepare("SELECT id, Name, Suburb, Street, Latitude, Longitude FROM dataset WHERE Name LIKE ?");
            // Execute with wildcards
            $query->execute(array("%$search%"));
            // Echo results
            include 'resultsTable.php';
        }

        // If the search was done by suburb
        if($_GET["select"] == "searchBySuburb") {
            // Prepare statement
            $query = $pdo->prepare("SELECT id, Name, Suburb, Street, Latitude, Longitude FROM dataset WHERE Suburb LIKE ?");
            // Execute with wildcards
            $query->execute(array("%$search%"));
            // Echo results
            include 'resultsTable.php';
        }

    }
    ?>

<!--       Footer       -->
<?php
require "footer.php";
?>
