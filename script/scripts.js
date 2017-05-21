/*function() {

    var img = document.getElementByClass('imgholder').firstChild;
    img.onload = function() {
        if (img.height > img.width) {
            img.height = '100%';
            img.width = 'auto';
        }
    };
}*/

/*
function myMap() {
    var mapProp = {
        center: new google.maps.LatLng(51.508742, -0.120850),
        zoom: 5,
    };
    var map = new google.maps.Map(document.getElementById("GoogleMap"), mapProp);
}

src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyA4ecW0bx03nOIZZa8r394XPbnldgDvV-Y&callback=myMap" >;
*/
/*
function myMap() {
    var myCenter = new google.maps.LatLng(51.508742, -0.120850);
    var mapCanvas = document.getElementById("map");
    var mapOptions = {
        center: myCenter,
        zoom: 5
    };
    var map = new google.maps.Map(mapCanvas, mapOptions);
    var marker = new google.maps.Marker({
        position: myCenter
    });
    marker.setMap(map);
}
src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyA4ecW0bx03nOIZZa8r394XPbnldgDvV-Y&callback=myMap" >


function myMap() {
    var mapOptions = {
        center: new google.maps.LatLng(51.5, -0.12),
        zoom: 10,
        mapTypeId: google.maps.MapTypeId.HYBRID
    }
    var map = new google.maps.Map(document.getElementById("map"), mapOptions);
}

src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyA4ecW0bx03nOIZZa8r394XPbnldgDvV-Y&callback=myMap"
*/


function searchNow() {
    window.location.href = 'resultsPage.html';
}


var x = document.getElementById("demo");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    x.innerHTML = "Latitude: " + position.coords.latitude +
    "<br>Longitude: " + position.coords.longitude;
}

function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            x.innerHTML = "User denied the request for Geolocation."
            break;
        case error.POSITION_UNAVAILABLE:
            x.innerHTML = "Location information is unavailable."
            break;
        case error.TIMEOUT:
            x.innerHTML = "The request to get user location timed out."
            break;
        case error.UNKNOWN_ERROR:
            x.innerHTML = "An unknown error occurred."
            break;
    }
}
