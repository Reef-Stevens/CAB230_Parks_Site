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
    var map = new google.maps.Map(document.getElementById("map"), mapOptions);
    <?php
    foreach ($data as $row) {
    ?>
        // show markers for each of the parks in the resulting query
        newlatlon=new google.maps.LatLng(<?php  echo $row['Latitude'];  ?>, <?php  echo $row['Longitude'];  ?>)
        var marker=new google.maps.Marker({position:newlatlon,map:map,title:"<?php  echo $row['Name'];  ?>"});
    <?php
    }
    ?>
    
}
</script><?php
