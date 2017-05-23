<!--         Header        -->
<?php
require 'adminPermission.inc';
?>

<body id="individualPageOne">
	<?php
	include('createdb.inc');

	$id = $_GET['id'];

	$search = $pdo->prepare("SELECT Name, Suburb, Street, Latitude, Longitude  FROM dataset WHERE id = $id");
	// Execute with wildcards
	$search->execute();
	$data = $search->fetch(PDO::FETCH_ASSOC)

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
