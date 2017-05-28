<!--         Header        -->
<?php
include 'header.inc';
?>

<!--  Individual results page for a park selected from the search  -->
<body id="individualPageOne">
	<?php
	include 'pdo.inc'; // create new pdo

	// get id for park clicked on previous page
	if(isset($_GET['id'])){
		$id = $_GET['id'];

	if ($id == 0) {
		$id = $_SESSION['id']; // get id from session
	} else {
		$_SESSION['id'] = $id; // save id in session
	}
	}else {
		$id = $_SESSION['id']; // get id from session
	}

	// Query for data of selcted park
	$query = $pdo->prepare("SELECT Name, Suburb, Street, Latitude, Longitude  FROM items WHERE id = :id");
	$query->bindValue(':id', $id);
	try {
		$query->execute();
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
	// get data from query
	$data = $query->fetch(PDO::FETCH_ASSOC)
	?>
	<!--         Search and large park background        -->
	<div class="section">
		<div class="containerMap">
			<!--  show name of selected park  -->
			<h1><?php  echo $data['Name'];  ?></h1>

			<!--  create map of selected park with a marker  -->
			<div id="map" style="width:100%;height:500px;background:yellow"></div>

			<script> // zoomed in map of individual park with marker
			function myMap() {
				latlon = new google.maps.LatLng(<?php  echo $data['Latitude'];  ?>, <?php  echo $data['Longitude'];  ?>);
				var mapOptions = { // map options for zoom and no scrolling set
				    center:latlon,
				    zoom: 15,
				    mapTypeId:google.maps.MapTypeId.ROADMAP,
					scrollwheel: false,
	                mapTypeControl:false,
					navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
				}
				var map = new google.maps.Map(document.getElementById("map"), mapOptions);
				var marker=new google.maps.Marker({position:latlon,map:map,title:"<?php  echo $data['Name'];  ?>"});
			}
			</script>

			<!--  source for the google api map  -->
			<?php include "map_source.inc"; ?>

		</div>
	</div>

	<!--  Display suburb and street of park  -->
	<div class="individualParkInfo">
		<h2><?php  echo $data['Suburb'];  ?></h2>
		<h2><?php  echo $data['Street'];  ?></h2>
	</div>

	<?php
	// If the user is logged in, they can see a review form and add a review for the park
    if (isset($_SESSION['isAdmin'])) {
		if (!empty($_POST['submit']) && !empty($_POST['review'])) {
			// get submitted data, the user email from the session and today's dat

			$review = htmlspecialchars($_POST['review']);
			$rating = $_POST['rating'];
			$email = $_SESSION['email'];
			$date = date("d/m/Y"); // today's date

			include 'pdo.inc'; // new pdo
			$query = $pdo->prepare("SELECT * FROM members WHERE userEmail = :email");
			$query->bindValue(':email', $email); // get data for member with the session email

			try {
		        $query->execute();
		    } catch (PDOException $e) {
		        echo $e->getMessage();
		    }
			$row = $query->fetch(PDO::FETCH_ASSOC);
			$name = $row['userName']; // get the user name from fetched data

			if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
				require 'review.php'; // get required function for checking and setting a review
				if(review($name, $review, $rating, $id, $date)) { // try to add review
					header("Location: result.php?id=0");
					exit;
				} else { // reshow the result page with a set id
					header("Location: result.php?id=0");
					exit;
				}
			} else { // reshow the result page with a set id
				header("Location: result.php?id=0");
				exit;
			}
		} else { // show the review form if user is logged in
			include 'form_review.php';
		}
    }
	?>


	<!--         Rating        -->
	<?php
	include 'pdo.inc';
	// get reviews for the selected park
	$query = $pdo->prepare('SELECT * FROM reviews WHERE parkID = :id');
	$query->bindValue(':id', $id);

	try {
		$query->execute();
	} catch (PDOException $e) {
		echo $e->getMessage();
	}?>
	<h1 style='text-align: center;color:#4CAF50;'>Reviews</h1>
	<?php
	if ($query->rowCount() > 0) {
		$data = $query->fetchAll(PDO::FETCH_ASSOC);
		echo '<table class="out_table">';
		$n = 0;
		$f = 0;
		foreach ($data as $row) {
			if(($n % 3 == 0) && $f == 0) {
				echo "<tr>";
				$f = 1;
			}else if (($n % 3 == 0) && $f == 1){
				echo "</tr>";
				$f = 0;
			}
			echo '<th>';

			echo "<table class='in_table'>";
			echo "<tr><th>",$row['userName'],"</th><th>",$row['rating'],"</th><th style='text-align:right'>",$row['reviewDate'],"</th></tr>";
			echo "<td colspan='3'>",$row['review'],"</td>";
			echo "</table>";

			echo '</th>';
			$n++;
		}

		echo '</table>';
	} else {
		?>
		<p style='text-align:center'>Sorry no reviews available. Login to review this park!</p>
		<?php
	}
	?>

<!--       Footer       -->
<?php
require "footer.php";
?>
