<!--         Header        -->
<?php
require 'adminPermission.inc';
?>

<body>
    <!--  Search bar with results in table and large park map  -->
    <div class="section">
        <div class="row search_bg">
            <div class="container search_field">
                <h1>Search for Parks in Brisbane</h1>
                <!--  Search form by name, suburb, and rating for parks  -->
                <form class="searchform" name="myForm" action="search.php" method="get">
                    <!-- Search box -->
                    <input type="text" name="search" placeholder="Search by name, suburb or rating!"/>
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
                    <input type="submit" value="&#10140;">
                </form>
            </div>
        </div>

        <!--  Results table  -->
        <div class="table-results">
        <?php
        $pdo = new PDO('mysql:host=fastapps04.qut.edu.au;port=3306;dbname=n8783012', 'n8783012', 'MySQLPassword');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if (isset($_GET['search'])) {
            if($_GET["select"] == "searchByName" && !empty($_GET['search'])) { // If the search was done by name
                $search = $_GET['search']; // Users search terms is taken and saved
                $query = $pdo->prepare("SELECT id, Name, Suburb, Street, Latitude, Longitude FROM items WHERE Name LIKE ?");
                try {
                    $query->execute(array("%$search%")); // Execute with wildcards
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }

                include 'resultsTable.php';// Echo results

            } else if($_GET["select"] == "searchBySuburb" && !empty($_GET['search'])) { // If the search was done by suburb
                $search = $_GET['search']; // Users search terms is taken and saved
                $query = $pdo->prepare("SELECT id, Name, Suburb, Street, Latitude, Longitude FROM items WHERE Suburb LIKE ?");
                try {
                    $query->execute(array("%$search%")); // Execute with wildcards
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }

                include 'resultsTable.php'; // Echo results

            } else if($_GET["select"] == "searchByRating") { // If the search was done by rating
                $rate = $_GET["rating"];
                if ($rate != "rate") {
                    $query = $pdo->prepare("SELECT * FROM reviews WHERE rating = :rate");
                    $query->bindValue(':rate', $rate);
                    try {
                        $query->execute(); // Execute with wildcards
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                    }

                    $n = 0;
                    while ($row = $query->fetch(PDO::FETCH_ASSOC)){ // Save all park IDs in an array
                        $ids[$n] = $row['parkID'];
                        $n++;
                    }

                    if(!empty($ids)){ // Check that at least on ID has been found
                        $query = $pdo->prepare("SELECT id, Name, Suburb, Street, Latitude, Longitude FROM items WHERE id IN (" . implode(',', array_map('intval', $ids)) . ")");
                        try {
                            $query->execute(); // Execute with wildcards
                        } catch (PDOException $e) {
                            echo $e->getMessage();
                        }

                        include 'resultsTable.php'; // Echo results
                    } else {
                        echo "<div style='text-align:center;'>Sorry. No parks were found, try a different search.</div>";
                    }
                } else {
                    $query = $pdo->prepare("SELECT id, Name, Suburb, Street, Latitude, Longitude FROM items");
                    $query->execute();

                    include 'resultsTable.php'; // Echo results
                }
            }  else {
                echo "<div style='text-align:center;'>Sorry. No parks were found, try a different search.</div>";
            }
        }
        ?>
        </div>

        <!--  Show map of resulting parks  -->
        <div class="map_field" >
            <!-- Get location of user to show parks around them -->
            <p><button onclick="getLocation()">Show your location!</button></p>
            <!-- paragraph for errors if any occur -->
            <p id="error"></p>
            <!-- containder for the map  -->
            <div id="map" ></div>
            <?php
            $query = $pdo->prepare("SELECT id, Name, Suburb, Street, Latitude, Longitude FROM items");
            try {
                $query->execute(); // Execute with wildcards
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            ?>
            <script>
            var x=document.getElementById("error");
            function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition,showError);
                } else {
                    x.innerHTML="Geolocation is not supported by this browser.";
                }
            }

            function showPosition(position) {
                lat=position.coords.latitude;
                lon=position.coords.longitude;
                latlon=new google.maps.LatLng(lat, lon)
                map=document.getElementById('map')

                var myOptions = {
                    center:latlon,
                    zoom:15,
                    mapTypeId:google.maps.MapTypeId.ROADMAP,
                    scrollwheel: false,
                    mapTypeControl:false,
                    navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
                };
                var map=new google.maps.Map(document.getElementById("map"),myOptions);
                var marker=new google.maps.Marker({position:latlon,animation:google.maps.Animation.BOUNCE,map:map,title:"You are here!"});
                <?php
                $pdo = new PDO('mysql:host=fastapps04.qut.edu.au;port=3306;dbname=n8783012', 'n8783012', 'MySQLPassword');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // Prepare statement
                $query = $pdo->prepare("SELECT Name, Latitude, Longitude FROM items");
                // Execute with wildcards
                $query->execute();
                while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    newlatlon=new google.maps.LatLng(<?php  echo $row['Latitude'];  ?>, <?php  echo $row['Longitude'];  ?>)
                    var marker=new google.maps.Marker({position:newlatlon,map:map,title:"<?php  echo $row['Name'];  ?>"});
                <?php
                }
                ?>
            }

            function showError(error)
              {
              switch(error.code)
                {
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

            <script>
            function myMap() {
                var mapOptions = {
                    center: new google.maps.LatLng(-27.477250, 153.028564),
                    zoom: 13,
                    mapTypeId:google.maps.MapTypeId.ROADMAP,
                    scrollwheel: false,
                    mapTypeControl:false,
                    navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
                }
                var map = new google.maps.Map(document.getElementById("map"), mapOptions);
                <?php
                $pdo = new PDO('mysql:host=fastapps04.qut.edu.au;port=3306;dbname=n8783012', 'n8783012', 'MySQLPassword');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // Prepare statement
                $query = $pdo->prepare("SELECT Name, Latitude, Longitude FROM items");
                // Execute with wildcards
                $query->execute();
                while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    newlatlon=new google.maps.LatLng(<?php  echo $row['Latitude'];  ?>, <?php  echo $row['Longitude'];  ?>)
                    var marker=new google.maps.Marker({position:newlatlon,map:map,title:"<?php  echo $row['Name'];  ?>"});
                <?php
                }
                ?>
            }
            </script>

            <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBvhv7RHUjEOrec7yU7Eg2AKbLwm0Er1aQ&callback=myMap"></script>
        </div>
    </div>

<!--       Footer       -->
<?php
require "footer.php";
?>
