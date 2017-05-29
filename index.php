<!--         Header        -->
<?php
include 'header.inc';
?>

<body id="homePage">
    <div class="pagecontent">
        <!--         Search and large park background        -->
        <div class="section">
            <!-- div used for the placement of background -->
            <div class="parkbg" alt="Search button with park background">
                <div class="search">
                    <!-- Search Button - Sends to search page -->
                    <button onclick="window.location.href='search.php'"class="loginopt">Search for Parks!</button>
                </div>
            </div>
        </div>

        <div class="container" id="ref">
            <h1>Explore parks in Brisbane!</h1>
        </div>
        <!--  Map container  -->
        <div class="section map">
            <div class="map_field" id="GoogleMap">
                <!--  Google map with park locations mapped  -->
                <div alt="Map of brisbane parks with markers" id="map"></div>
                <?php include 'map.inc'; ?>
            </div>
        </div>
    </div>

<!--       Footer       -->
<?php
require "footer.php";
?>
