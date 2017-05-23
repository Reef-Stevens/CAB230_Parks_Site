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
            <div id="GoogleMap">
                <div id="map"></div>
                <script>
                    function initMap() {
                        var uluru = {
                            lat: -25.363,
                            lng: 131.044
                        };
                        var map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 4,
                            center: uluru
                        });
                        var marker = new google.maps.Marker({
                            position: uluru,
                            map: map
                        });
                    }
                </script>
                <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4ecW0bx03nOIZZa8r394XPbnldgDvV-Y&callback=initMap">
                </script>
                <img class="homeMap" src="images/homePageMap.png" alt="map">
            </div>
        </div>
    </div>

<!--       Footer       -->
<?php
require "footer.php";
?>
