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
			    center: new google.maps.LatLng(51.5, -0.12),
			    zoom: 10,
			    mapTypeId: google.maps.MapTypeId.HYBRID
			}
			var map = new google.maps.Map(document.getElementById("map"), mapOptions);
			}
			</script>

			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>

		</div>
	</div>

	<div class="individualParkInfo">
		<h2><?php  echo $data['Suburb'];  ?></h2>
		<h2><?php  echo $data['Street'];  ?></h2>
	</div>

	<?php
	include 'form_review.php';
	?>

	<!--         Rating        -->
	<div class="ratingBox">
		<div class="section bg ">
			<div class="container">
				<div class="reviewHolder col three backGround">
					<h3>Riccardo Grinover</h3>
					<div class="acidjs-rating-stars">

					</div>
					<p>"Yeah man this park is fucking awesome"</p>
				</div>
			</div>

			<div class="group"></div>
		</div>
	</div>

<!--       Footer       -->
<?php
require "footer.php";
?>
