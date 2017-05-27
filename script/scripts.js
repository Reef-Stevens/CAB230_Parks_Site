// function getLocation() {
//     var x = document.getElementById("demo");
//     if (navigator.geolocation) {
//         navigator.geolocation.getCurrentPosition(showPosition, showError);
//     } else {
//         x.innerHTML = "Geolocation is not supported by this browser.";
//     }
// }
//
// function showPosition(position) {
//     var x = document.getElementById("demo");
//     x.innerHTML = "Latitude: " + position.coords.latitude +
//         "<br>Longitude: " + position.coords.longitude;
// }
//
// function showError(error) {
//     var x = document.getElementById("demo");
//     switch (error.code) {
//         case error.PERMISSION_DENIED:
//             x.innerHTML = "User denied the request for Geolocation."
//             break;
//         case error.POSITION_UNAVAILABLE:
//             x.innerHTML = "Location information is unavailable."
//             break;
//         case error.TIMEOUT:
//             x.innerHTML = "The request to get user location timed out."
//             break;
//         case error.UNKNOWN_ERROR:
//             x.innerHTML = "An unknown error occurred."
//             break;
//     }
// }

function myFunction() {
    var x = document.getElementById("choose").value;
    if (x == "searchByRating") {
        document.getElementById("suburb").style.display = "none";
        document.getElementById("rate").style.display = "block";
        document.getElementById("search").placeholder = "No search needed for rating!"
        document.getElementById("search").readOnly = true;
    } else if (x == "searchBySuburb") {
        document.getElementById("rate").style.display = "none";
        document.getElementById("suburb").style.display = "block";
        document.getElementById("search").placeholder = "No search needed for suburb!"
        document.getElementById("search").readOnly = true;
    } else {
        document.getElementById("rate").style.display = "none";
        document.getElementById("suburb").style.display = "none";
        document.getElementById("search").readOnly = false;
        document.getElementById("search").placeholder = "Search by name, suburn or rating!"
    }

}
