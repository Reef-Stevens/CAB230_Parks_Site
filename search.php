<!--         Header        -->
<?php
include 'header.inc';
?>

<!--  Creates and print a map with all parks labelled  -->
<?php

if(isset($_POST['lat']) && isset($_POST['long'])){
    $R = 6371;
    $lat = $_POST['lat'];
    $lon = $_POST['long'];
    $distance = 8000; // in meters
    $rad = $distance / $R; // angular radius
    $radR = rad2deg($rad/$R);
    $max_lat = $lat + $radR;
    $min_lat = $lat - $radR;
    $radR = rad2deg($rad/$R/cos(deg2rad($lat)));
    $max_lon = $lon + $radR;
    $min_lon = $lon - $radR;
    ?>
    <script>
    function myMap() {
        // map options for centering, zoom and no scrolling
        var mapOptions = {
            center: new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $lon; ?>),
            zoom: 14,
            mapTypeId:google.maps.MapTypeId.ROADMAP,
            scrollwheel: false,
            mapTypeControl:false,
            navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
        }
        // creates map using the options set
        var map = new google.maps.Map(document.getElementById("map"), mapOptions);
        var marker;
        var infowindow = new google.maps.InfoWindow();
        <?php
        include 'pdo.inc'; // new pdo for query
        $query = $pdo->prepare("SELECT id, Name, Suburb, Street, Latitude, Longitude FROM items WHERE Latitude BETWEEN :min_lat AND :max_lat AND Longitude BETWEEN :min_lon AND :max_lon" );
        $query->bindValue(':max_lat', $max_lat);
        $query->bindValue(':min_lat', $min_lat);
        $query->bindValue(':max_lon', $max_lon);
        $query->bindValue(':min_lon', $min_lon);
        try {
            $query->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        if ($query->rowCount() > 0) {
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            // include 'resultsTable.inc'; // Echo results
            foreach ($data as $row) {
            ?> // create a marker for each park
                newlatlon=new google.maps.LatLng(<?php  echo $row['Latitude'];  ?>, <?php  echo $row['Longitude'];  ?>)
                marker=new google.maps.Marker({position:newlatlon,map:map,title:"<?php  echo $row['Name'];  ?>"});
                <?php $id = $row['id']; ?>
                <?php $name = $row['Name']; ?>
                <?php $suburb = $row['Suburb']; ?>
                <?php $street = $row['Street']; ?>
                // create a link within a popup window for each park
                var text = "<?php  echo '<a class=\'link\' href=\"result.php?id='.$id.'\">'.$name.'</a><p>Street: '.$street.'</p><p>Suburb: '.$suburb.'</p>';  ?>";
                google.maps.event.addListener(marker, 'click', (function(marker,text) {
                    return function() {
                    infowindow.setContent(text);
                    infowindow.open(map, marker);
                    }
                })(marker,text));
                <?php
            }
        }
        ?>
        latlon=new google.maps.LatLng(<?php  echo $_POST['lat'];  ?>, <?php  echo $_POST['long'];  ?>)
        var marker=new google.maps.Marker({position:latlon,animation:google.maps.Animation.BOUNCE,map:map,title:"You are here!"});
    }
    </script>
    <?php include "map_source.inc"; ?>
    <?php
} else {
    include "map.inc";
}

?>

<body>
    <!--  Search bar with results in table and large park map  -->
    <div class="section">
        <div class="row search_bg">
            <div class="container search_field">
                <h1>Search for Parks in Brisbane</h1>
                <!--  information form to search the database  -->
                <?php include "form_search.php"; ?>
            </div>
        </div>

        <!--  Results table  -->
        <div class="table-results">
        <?php
        // include 'pdo.inc';

        if(isset($_POST["loc"])) { // If the search was done by suburb
            $R = 6371;
            $lat = $_POST['lat'];
            $lon = $_POST['long'];
            $distance = 8000; // in meters
            $rad = $distance / $R; // angular radius
            $radR = rad2deg($rad/$R);
            $max_lat = $lat + $radR;
            $min_lat = $lat - $radR;
            $radR = rad2deg($rad/$R/cos(deg2rad($lat)));
            $max_lon = $lon + $radR;
            $min_lon = $lon - $radR;

            include 'pdo.inc'; // new pdo for query
            $query = $pdo->prepare("SELECT id, Name, Suburb, Street, Latitude, Longitude FROM items WHERE Latitude BETWEEN :min_lat AND :max_lat AND Longitude BETWEEN :min_lon AND :max_lon" );
            $query->bindValue(':max_lat', $max_lat);
            $query->bindValue(':min_lat', $min_lat);
            $query->bindValue(':max_lon', $max_lon);
            $query->bindValue(':min_lon', $min_lon);
            try {
                $query->execute();
            } catch (PDOException $e) {
                echo $e->getMessage();
            }

            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            include 'resultsTable.inc'; // Echo results
        } else if (isset($_GET['search'])) { // check what type of search was made, query and show the results in table and map
            if($_GET["select"] == "searchByName" && !empty($_GET['search'])) { // If the search was done by name
                $search = htmlspecialchars($_GET['search']);
                $query = $pdo->prepare("SELECT id, Name, Suburb, Street, Latitude, Longitude FROM items WHERE Name LIKE ?");
                try {
                    $query->execute(array("%$search%")); // Execute with wildcards
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
                // fetch all data to be used for both table and map
                if ($query->rowCount() > 0) {
                    $data = $query->fetchAll(PDO::FETCH_ASSOC);
                    include 'resultsTable.inc'; // Echo results
                    include 'searchMap.inc';
                } else { // no parks were found, give error message and show a map of all parks
                    echo "<div style='text-align:center;'>Sorry. No parks were found, try a different search.</div>";
                    include 'map.inc';
                }

            } else if($_GET["select"] == "searchBySuburb" && !empty($_GET['suburb'])) { // If the search was done by suburb
                $suburb = $_GET['suburb']; // get selected suburb option
                $query = $pdo->prepare("SELECT id, Name, Suburb, Street, Latitude, Longitude FROM items WHERE Suburb = :suburb");
                $query->bindValue(':suburb', $suburb);
                try {
                    $query->execute();
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
                // fetch all data to be used for both table and map
                if ($query->rowCount() > 0) {
                    $data = $query->fetchAll(PDO::FETCH_ASSOC);
                    include 'resultsTable.inc'; // Echo results
                    include 'searchMap.inc';
                } else { // no parks were found, give error message and show a map of all parks
                    echo "<div style='text-align:center;'>Sorry. No parks were found, try a different search.</div>";
                    include 'map.inc';
                }

            } else if($_GET["select"] == "searchByRating") { // If the search was done by rating
                $rate = $_GET["rating"]; // get selected rating
                if ($rate != "rate") { // check that rating is a numerical value
                    $query = $pdo->prepare("SELECT * FROM reviews WHERE rating = :rate");
                    $query->bindValue(':rate', $rate);
                    try {
                        $query->execute();
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                    }

                    // place all the ids for the parks found in an array for next query
                    $n = 0;
                    while ($row = $query->fetch(PDO::FETCH_ASSOC)){ // Save all park IDs in an array
                        $ids[$n] = $row['parkID'];
                        $n++;
                    }

                    if(!empty($ids)){ // Check that at least on ID has been found
                        $query = $pdo->prepare("SELECT id, Name, Suburb, Street, Latitude, Longitude FROM items WHERE id IN (" . implode(',', array_map('intval', $ids)) . ")");
                        try {
                            $query->execute();
                        } catch (PDOException $e) {
                            echo $e->getMessage();
                        }
                        // fetch all data to be used for both table and map
                        if ($query->rowCount() > 0) {
                            $data = $query->fetchAll(PDO::FETCH_ASSOC);
                            include 'resultsTable.inc'; // Echo results
                            include 'searchMap.inc';
                        } else { // no parks were found, give error message and show a map of all parks
                            echo "<div style='text-align:center;'>Sorry. No parks were found, try a different search.</div>";
                            include 'map.inc';
                        }

                    } else { // no parks were found, give error message and show a map of all parks
                        echo "<div style='text-align:center;'>Sorry. No parks were found, try a different search.</div>";
                        include 'map.inc';
                    }
                } else { // show all parks and map relevant map
                    $query = $pdo->prepare("SELECT id, Name, Suburb, Street, Latitude, Longitude FROM items");
                    try {
                        $query->execute();
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                    }

                    if ($query->rowCount() > 0) {
                        $data = $query->fetchAll(PDO::FETCH_ASSOC);
                        include 'resultsTable.inc'; // Echo results
                        include 'searchMap.inc';
                    }
                }
            } else { // no parks were found, give error message and show a map of all parks
                echo "<div style='text-align:center;'>Sorry. No parks were found, try a different search.</div>";
                include 'map.inc';
            }
        }
        unset($_GET);
        $_GET = array();
        unset($_POST);
        $_POST = array();
        ?>
        </div>

        <!--  Show map of resulting parks  -->
        <div class="map_field" >
            <!-- Get location of user to show parks around them -->
            <form id="myForm" name="myForm" method="post">
                <input type="hidden" id="lat" name="lat" value="1"></input>
                <input type="hidden" id="long" name="long" value="2"></input>
                <input type="hidden" id="loc" name="loc" value="3"></input>
            </form>
            <button onclick="getLatLon()">Show your location!</button>
            <!-- paragraph for errors if any occur -->
            <p id="error"></p>
            <!-- containder for the map  -->
            <div alt="Map of brisbane parks with markers" id="map" > </div>

            <!--  source for the map using own key for the google map api  -->
            <?php include "map_source.inc"; ?>

            <script>
            var x=document.getElementById("error");
            function getLatLon() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(submitForm,showError);
                } else {
                    x.innerHTML="Geolocation is not supported by this browser.";
                }
            }

            function submitForm(position) {
                lat=position.coords.latitude;
                lon=position.coords.longitude;
                document.getElementById('lat').value = lat;
                document.getElementById('long').value = lon;
                document.getElementById('myForm').submit();

            }

            //  check for errors and print appropriate statements
            function showError(error) {
                switch(error.code) {
                case error.PERMISSION_DENIED:
                    x.innerHTML="User denied the request for Geolocation."
                    break;
                case error.POSITION_UNAVAILABLE:
                    x.innerHTML="Location information is unavailable."
                    break;
                case error.TIMEOUT:
                    x.innerHTML="The request to get user location timed out."
                    break;
                case error.UNKNOWN_ERROR:
                    x.innerHTML="An unknown error occurred."
                    break;
                }
              }
            </script>
            <!--  source of google api map  -->
            <?php include "map_source.inc"; ?>
        </div>
    </div>

<!--       Footer       -->
<?php
require "footer.php";
?>
