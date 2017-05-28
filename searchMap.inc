<script>
// function for showing a map with the queried parks from user search
function myMap() {
    <?php
    foreach ($data as $row) {
        $lat = $row['Latitude'];
        $long = $row['Longitude'];
    }
    ?>
    var mapOptions = { // map options with no scrolling
        center: new google.maps.LatLng(<?php  echo $lat;  ?>, <?php  echo $long;  ?>),
        zoom: 13,
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
    foreach ($data as $row) {
    ?>
        // show markers for each of the parks in the resulting query
        newlatlon=new google.maps.LatLng(<?php  echo $row['Latitude'];  ?>, <?php  echo $row['Longitude'];  ?>)
        marker=new google.maps.Marker({position:newlatlon,map:map,title:"<?php  echo $row['Name'];  ?>"});
        <?php $id = $row['id']; ?>
        <?php $name = $row['Name']; ?>
        // create a link within a popup window for each park
        var text = "<?php  echo '<h3>Check the park:</h3><a class=\'link\' href=\"result.php?id='.$id.'\">'.$name.'</a>';  ?>";
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
</script><?php
