<!--         Header        -->
<?php
require 'adminPermission.inc';
?>

<body id="individualPageOne">
	<?php
	$pdo = new PDO('mysql:host=fastapps04.qut.edu.au;port=3306;dbname=n9441409', 'n9441409', '1password1');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// get id for park clicked on previous page
	$id = $_GET['id'];
	if ($id == 0) {
		$id = $_SESSION['id']; // get id from session
	} else {
		$_SESSION['id'] = $id; // save id in session
	}

	// Query for data of selcted park
	$query = $pdo->prepare("SELECT Name, Suburb, Street, Latitude, Longitude  FROM dataset WHERE id = :id");
	$query->bindValue(':id', $id);
	try {
		$query->execute();
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
	$data = $query->fetch(PDO::FETCH_ASSOC)

	?>
	<!--         Search and large park background        -->
	<div class="section">
		<div class="containerMap">
			<h1><?php  echo $data['Name'];  ?></h1>

			<div id="map" style="width:100%;height:500px;background:yellow"></div>

			<script>
			function myMap() {
			var mapOptions = {
			    center: new google.maps.LatLng(<?php  echo $data['Latitude'];  ?>, <?php  echo $data['Longitude'];  ?>),
			    zoom: 15,
			    mapTypeId:google.maps.MapTypeId.ROADMAP,
				scrollwheel: false,
                mapTypeControl:false,
				navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
			}
			var map = new google.maps.Map(document.getElementById("map"), mapOptions);
			}
			</script>

			<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBvhv7RHUjEOrec7yU7Eg2AKbLwm0Er1aQ&callback=myMap"></script>

		</div>
	</div>

	<div class="individualParkInfo">
		<h2><?php  echo $data['Suburb'];  ?></h2>
		<h2><?php  echo $data['Street'];  ?></h2>
	</div>

	<?php
    if (isset($_SESSION['isAdmin'])) {
		if (isset($_POST['submit'])) {
			$review = $_POST['review'];
			$rating = $_POST['rating'];
			$email = $_SESSION['email'];
			$date = date("d/m/Y");

			$pdo = new PDO('mysql:host=fastapps04.qut.edu.au;port=3306;dbname=n8783012', 'n8783012', 'MySQLPassword');
		    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$query = $pdo->prepare("SELECT * FROM members WHERE userEmail = :email");
			$query->bindValue(':email', $email);

			try {
		        $query->execute();
		    } catch (PDOException $e) {
		        echo $e->getMessage();
		    }
			$row = $query->fetch(PDO::FETCH_ASSOC);
			$name = $row['userName'];

			if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
				require 'review.php';
				if(review($name, $review, $rating, $id, $date)) {
					header("Location: result.php?id=0");
					exit;
				} else {
					// include 'form_review.php';
					header("Location: result.php?id=0");
					exit;
				}
			} else {
				// include 'form_review.php';
				header("Location: result.php?id=0");
				exit;
			}
		} else {
			include 'form_review.php';
		}
    }
	?>


	<!--         Rating        -->
	<?php
	$pdo = new PDO('mysql:host=fastapps04.qut.edu.au;port=3306;dbname=n8783012', 'n8783012', 'MySQLPassword');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$query = $pdo->prepare('SELECT * FROM reviews WHERE parkID = :id');
	$query->bindValue(':id', $id);

	try {
		$query->execute();
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
	$row = $query->fetch(PDO::FETCH_ASSOC);
	$name = $row['userName'];
	$review = $row['review'];
	?>

	<div class="ratingBox">
		<div class="section bg ">
			<div class="container">
				<div class="reviewHolder col three backGround">
					<h3><?php echo $name ?></h3>
					<div class="acidjs-rating-stars">

					</div>
					<p><?php echo $review ?></p>
				</div>
			</div>

			<div class="group"></div>
		</div>
	</div>

	<?php

		// echo '<table border="solid" width="100%">';
		// while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
		// 	echo "<tr>",$row['userName'],"</tr><tr>";
		// 	echo '<td>';
		//
		// 	echo "<table border='solid'>";
		// 	echo "<tr><th>",$row['userName'],"</th></tr>";
		//
		// 	echo "<td>",$row['review'],"</td>";
		// 	echo "<td>",$row['rating'],"</td>";
		// 	echo "</table>";
		//
		//
		//
		// 	echo '</td>';
		// }
		// echo '</tr></table>';
	?>

<!--       Footer       -->
<?php
require "footer.php";
?>
