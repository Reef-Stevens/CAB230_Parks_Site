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
                <h1>Search for Parks in Brisbane</h1>
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

        <div class="table-results">
        <?php
        $pdo = new PDO('mysql:host=fastapps04.qut.edu.au;port=3306;dbname=n9441409', 'n9441409', '1password1');
      	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if (isset($_GET['search']) && !empty($_GET['search'])) {
            // Users search terms is taken and saved
            $search = $_GET['search'];


            if($_GET["select"] == "searchByName") { // If the search was done by name
                // Prepare statement
                $query = $pdo->prepare("SELECT id, Name, Suburb, Street, Latitude, Longitude FROM dataset WHERE Name LIKE ?");
                // Execute with wildcards
                $query->execute(array("%$search%"));
                // Echo results
                include 'resultsTable.php';
            } else if($_GET["select"] == "searchBySuburb") { // If the search was done by suburb
                // Prepare statement
                $query = $pdo->prepare("SELECT id, Name, Suburb, Street, Latitude, Longitude FROM dataset WHERE Suburb LIKE ?");
                // Execute with wildcards
                $query->execute(array("%$search%"));
                // Echo results
                include 'resultsTable.php';
            } else if($_GET["select"] == "searchByRating") { // If the search was done by rating
                $rate = $_GET["rating"];
                if ($rate != "rate") {
                    // Prepare statement
                    $pdo = new PDO('mysql:host=fastapps04.qut.edu.au;port=3306;dbname=n8783012', 'n8783012', 'MySQLPassword');
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $query = $pdo->prepare("SELECT * FROM reviews WHERE rating = :rate");
                    $query->bindValue(':rate', $rate);
                    $query->execute();

                    $n = 0;
                    while ($row = $query->fetch(PDO::FETCH_ASSOC)){
                        $ids[$n] = $row['parkID'];
                        $n++;
                    }
                    // Prepare statement
                    $pdo = new PDO('mysql:host=fastapps04.qut.edu.au;port=3306;dbname=n9441409', 'n9441409', '1password1');
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $query = $pdo->prepare("SELECT id, Name, Suburb, Street, Latitude, Longitude FROM dataset WHERE id IN (" . implode(',', array_map('intval', $ids)) . ")");
                    // Execute with wildcards
                    $query->execute();
                    // Echo results
                    include 'resultsTable.php';
                } else {
                    // Prepare statement
                    $pdo = new PDO('mysql:host=fastapps04.qut.edu.au;port=3306;dbname=n9441409', 'n9441409', '1password1');
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $query = $pdo->prepare("SELECT id, Name, Suburb, Street, Latitude, Longitude FROM dataset");
                    // Execute with wildcards
                    $query->execute();
                    // Echo results
                    include 'resultsTable.php';
                }
            }
        }
        ?>
        </div>

        <div class="map_field" >
            <!--          Geolocation Map           -->
            <p><button onclick="getLocation()">Show your location!</button></p>
            <p id="error"></p>
            <div id="map" ></div>

            <script>
            var x=document.getElementById("error");
            function getLocation()
              {
              if (navigator.geolocation)
                {
                navigator.geolocation.getCurrentPosition(showPosition,showError);
                }
              else{x.innerHTML="Geolocation is not supported by this browser.";}
              }

            function showPosition(position)
              {
              lat=position.coords.latitude;
              lon=position.coords.longitude;
              latlon=new google.maps.LatLng(lat, lon)
              map=document.getElementById('map')

              var myOptions={
              center:latlon,
              zoom:14,
              mapTypeId:google.maps.MapTypeId.ROADMAP,
              scrollwheel: false,
              mapTypeControl:false,
              navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
              };
              var map=new google.maps.Map(document.getElementById("map"),myOptions);
              var marker=new google.maps.Marker({position:latlon,map:map,title:"You are here!"});
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
            }
            </script>

            <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBvhv7RHUjEOrec7yU7Eg2AKbLwm0Er1aQ&callback=myMap"></script>
        </div>
    </div>

<!--       Footer       -->
<?php
require "footer.php";
?>
