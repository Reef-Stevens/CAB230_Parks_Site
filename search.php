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

                <form action="search.php" method="get">
                    <input type="text" name="search" placeholder="Search..."/>
                    <input type="submit" value="&#10140;">
                    <label>Catagory: </label>
                    <select name="select">
                        <option value="searchByName" selected>Name</option>
                        <option value="searchByLocation">Location</option>
                        <option value="searchBySuburb">Suburb</option>
                        <option value="searchByRating">Rating</option>
                    </select>
                </form>
                <br>

            </div>
        </div>
    </div>


    <?php
    include('createdb.inc');

    if (isset($_GET['search'])) {

        // Users search terms is saved in $_POST['q']
        $q = $_GET['search'];

        if($_GET["select"] == "searchByName") {
            // Prepare statement
            $search = $pdo->prepare("SELECT id, Name, Suburb, Street, Latitude, Longitude FROM dataset WHERE Name LIKE ?");
            // Execute with wildcards
            $search->execute(array("%$q%"));
            // Echo results
            include 'resultsTable.php';
        }

        if($_GET["select"] == "searchBySuburb") {
            // Prepare statement
            $search = $pdo->prepare("SELECT id, Name, Suburb, Street, Latitude, Longitude FROM dataset WHERE Suburb LIKE ?");
            // Execute with wildcards
            $search->execute(array("%$q%"));
            // Echo results
            include 'resultsTable.php';
        }

    }
    ?>


  <!--********************************** Geolocation Button *****************-->
  <button onclick="getLocation()">Get Location</button>

  <p id="demo"></p>




    <!--       Footer       -->
    <?php
    require "footer.php";
    ?>


</body>

</php>
