<!--  Creates and print a map with all parks labelled  -->
<script>
function myMap() {
    // map options for centering, zoom and no scrolling
    var mapOptions = {
        center: new google.maps.LatLng(-27.477250, 153.028564),
        zoom: 13,
        mapTypeId:google.maps.MapTypeId.ROADMAP,
        scrollwheel: false,
        mapTypeControl:false,
        navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
    }
    // creates map using the options set
    var map = new google.maps.Map(document.getElementById("map"), mapOptions);
    <?php
    include 'pdo.inc'; // new pdo for query
    $query = $pdo->prepare("SELECT Name, Latitude, Longitude FROM items"); // get only the name, lat and long
    $query->execute();
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    ?> // create a marker for each park
        newlatlon=new google.maps.LatLng(<?php  echo $row['Latitude'];  ?>, <?php  echo $row['Longitude'];  ?>)
        var marker=new google.maps.Marker({position:newlatlon,map:map,title:"<?php  echo $row['Name'];  ?>"});
    <?php
    }
    ?>
}
</script>

<!--  source for the map using own key for the google map api  -->
<?php include "map_source.inc"; ?>
