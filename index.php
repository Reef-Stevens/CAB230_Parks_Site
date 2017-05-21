<!--         Header        -->
<?php
require 'adminPermission.inc';
?>


<body id="homePage">
    <div class="pagecontent">

        <!--         Search and large park background        -->
        <div class="section">
            <div class="parkbg">
                <div class="container parksearchcontent">
                    <div class="flexsearch">
                        <div class="flexsearch--wrapper">
                          <button onclick="window.location.href='search.php'" class="loginopt">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--       Parks pannels showing different parks with small description        -->
        <div id="featuredParks">
            <div class="section bg ">
                <div class="container">
                    <h1>Featured Parks</h1>
                    <h2>Explore parks in Brisbane!</h2>


                    <div onclick="window.location.href='individualPageOne.php'">
                        <div class="col three bg pointer">
                            <div class="imgholder">
                                <img class="parkImg" src="images/brisbaneCityGardensBotanic.jpg" alt="Featured park">
                            </div>
                            <h1 class="feature">Brisbane City Gardens</h1>
                            <p>Attractions at the Gardens include Bamboo Grove, Weeping Fig Avenue, Riverstage, ornamental ponds and more. Bookings are available in the Gardens for special events.</p>
                        </div>
                    </div>

                    <div onclick="window.location.href='individualPageTwo.php'">
                        <div class="col three bg pointer">
                            <div class="imgholder">
                                <img class="parkImg" src="images/gardenOne.jpg" alt="Featured park">
                            </div>
                            <h1 class="feature">Brisbane Botanic Gardens</h1>
                            <p>A stunningly landscaped park showcasing luscious rainforest, a scented garden, waterfalls and lagoons, where you can see eastern water dragons, turtles and eels.</p>
                        </div>
                    </div>

                    <div onclick="window.location.href='individualPageThree.php'">
                        <div class="col three bg pointer">
                            <div class="imgholder">
                                <img class="parkImg" src="images/gardenTwo.jpg" alt="Featured park">
                            </div>
                            <h1 class="feature">Gregory Park</h1>
                            <p>On weekend afternoons this park resembles a village green in England as families, dog walkers, picnickers and sports players descend on the tree-bordered grassy expanse to enjoy the last of the day’s sun.
                        </div>
                    </div>

                    <div class="group margin"></div>

                    <div class="col three bg pointer">
                        <div class="imgholder">
                            <img class="parkImg" src="images/gardenThree.jpg" alt="Featured park">
                        </div>
                        <h1 class="feature">New Farm Park</h1>
                        <p>As any regular playground visiting parent will know, size does matter, with the creativity of the play equipment coming a close second. Which is why city slickers and their offspring find it hard to go past the many charms of New
                            Farm Park, with its massive fortress and iconic furniture-eating fig trees.</p>
                    </div>

                    <div class="col three bg pointer">
                        <div class="imgholder">
                            <img class="parkImg" src="images/gardenFour.jpg" alt="Featured park">
                        </div>
                        <h1 class="feature">Spectacle Garden</h1>
                        <p>Enjoy meandering through the winding path ways of this garden lovers paradise with an ever changing seasonal display of blooms. The Spectacle Garden at Colin Campbell Place displays a vivid array of colour all year and includes
                            a collection of flowers, herbs, water features and art works. You might even be greeted by one of our resident Water Dragons.</p>
                    </div>

                    <div class="col three bg pointer">
                        <div class="imgholder">
                            <img class="parkImg" src="images/gardenFive.jpg" alt="Featured park">
                        </div>
                        <h1 class="feature">The Epicurious Gardens</h1>
                        <p>The Epicurious Garden is a must-visit destination at South Bank for foodies, gardening enthusiasts and all those in-between.</p>
                    </div>
                    <div class="group"></div>
                </div>
            </div>
        </div>



        <!--         Google map with park locations mapped        -->

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
