<!--  Creates and print a map with all parks labelled  -->
<script>
function myMap() {
    // map options for centering, zoom and no scrolling
    var mapOptions = {
        center: new google.maps.LatLng(-27.477250, 153.028564),
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
    $query = $pdo->prepare("SELECT * FROM items"); // get only the name, lat and long
    $query->execute();
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
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
    ?>
}



</script>

<!--  source for the map using own key for the google map api  -->
<?php include "map_source.inc"; ?>
