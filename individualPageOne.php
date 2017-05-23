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
			<img class="resultMap" src="images/test.png" alt="parkMap">
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
						<form>
							<input type="radio" name="group-2" id="group-2-0" value="5" /><label for="group-2-0"></label>
							<!--
					        --><input type="radio" name="group-2" id="group-2-1" value="4" /><label for="group-2-1"></label>
							<!--
					        --><input type="radio" checked="checked" name="group-2" id="group-2-2" value="3" /><label for="group-2-2"></label>
							<!--
					        --><input type="radio" name="group-2" id="group-2-3" value="2" /><label for="group-2-3"></label>
							<!--
					        --><input type="radio" name="group-2" id="group-2-4" value="1" /><label for="group-2-4"></label>
						</form>
					</div>
					<p>"Yeah man this park is fucking awesome"</p>
				</div>

				<div class="reviewHolder col three backGround">
					<h3>Reef Stevens</h3>
					<div class="acidjs-rating-stars">
						<form>
							<input type="radio" name="group-2" id="group-2-0" value="5" /><label for="group-2-0"></label>
							<!--
					        --><input type="radio" name="group-2" id="group-2-1" value="4" /><label for="group-2-1"></label>
							<!--
					        --><input type="radio" checked="checked" name="group-2" id="group-2-2" value="3" /><label for="group-2-2"></label>
							<!--
					        --><input type="radio" name="group-2" id="group-2-3" value="2" /><label for="group-2-3"></label>
							<!--
					        --><input type="radio" name="group-2" id="group-2-4" value="1" /><label for="group-2-4"></label>
						</form>
					</div>
					<p>"Not too bad, needs more beer"</p>
				</div>

				<div class="reviewHolder col three backGround">
					<h3>Tom Mishteler</h3>
					<div class="acidjs-rating-stars">
						<form>
							<input type="radio" name="group-2" id="group-2-0" value="5" /><label for="group-2-0"></label>
							<!--
					        --><input type="radio" name="group-2" id="group-2-1" value="4" /><label for="group-2-1"></label>
							<!--
					        --><input type="radio" checked="checked" name="group-2" id="group-2-2" value="3" /><label for="group-2-2"></label>
							<!--
					        --><input type="radio" name="group-2" id="group-2-3" value="2" /><label for="group-2-3"></label>
							<!--
					        --><input type="radio" name="group-2" id="group-2-4" value="1" /><label for="group-2-4"></label>
						</form>
					</div>
					<p>"B-E-A-UTIFUL"</p>
				</div>
			</div>

			<div class="group"></div>
		</div>
	</div>

<!--       Footer       -->
<?php
require "footer.php";
?>
