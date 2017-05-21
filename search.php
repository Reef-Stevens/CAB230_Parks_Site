<!--         Header        -->
<?php
require 'adminPermission.inc';
?>

<body>

<div class="pagecontent">
    <!--         Search and large park background        -->
    <div class="section">

        <!-- Previous search, in serach bar, along with settings -->
        <div class="row search_bg">
            <div class="container search_field">

                <form action="search.php" method="post">
                    <input type="text" name="search" placeholder="Search..."/>
                    <input type="submit" value="&#10140;">
                </form>
                <br>
                <label>Catagory: </label>
                <select name="select">
                    <option value="searchByName" selected>Name</option>
                    <option value="searchByLocation">Location</option>
                    <option value="searchBySuburb">Suburb</option>
                    <option value="searchByRating">Rating</option>
                </select>
            </div>
        </div>
    </div>


    <?php
    include('createdb.inc');

    if (isset($_POST['search'])) {

        // Users search terms is saved in $_POST['q']
        $q = $_POST['search'];

        if($_REQUEST["select"] = "searchByName") {
            // Prepare statement
            $search = $pdo->prepare("SELECT Name  FROM dataset WHERE Name LIKE ?");
            // Execute with wildcards
            $search->execute(array("%$q%"));
            // Echo results
            foreach ($search as $s) {
                echo $s['Name'];
            }
        }

        if($_REQUEST["select"] = "searchBySuburb") {
            // Prepare statement
            $search = $pdo->prepare("SELECT Suburb, Name  FROM dataset WHERE Suburb LIKE ?");
            // Execute with wildcards
            $search->execute(array("%$q%"));
            // Echo results
            foreach ($search as $s) {
                echo $s['Name'];
            }
        }

    }
    ?>


  <!--********************************** Geolocation Button *****************-->
  <button onclick="getLocation()">Get Location</button>

  <p id="demo"></p>

  <script>
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
  </script>


    <!--       Footer       -->
    <?php
    require "footer.php";
    ?>


</body>

</php>
