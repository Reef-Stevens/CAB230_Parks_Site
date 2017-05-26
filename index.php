<!--         Header        -->
<?php
require 'adminPermission.inc';
?>


<body id="homePage">
    <div class="pagecontent">

        <!--         Search and large park background        -->
        <div class="section">
            <!-- div used for the placement of background -->
            <div class="parkbg">
                <div class="search">
                    <!-- Search Button - Sends to search page -->
                    <button onclick="window.location.href='search.php'" class="loginopt">Search for Parks!</button>
                </div>
            </div>
        </div>

        <!--         Google map with park locations mapped        -->
        <div class="container" id="ref">
            <h1>Explore parks in Brisbane!</h1>
        </div>
        <div class="section map">
            <div class="map_field" id="GoogleMap">
                <div id="map"></div>
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
                </script>
            </div>
        </div>
    </div>

<!--       Footer       -->
<?php
require "footer.php";
?>
