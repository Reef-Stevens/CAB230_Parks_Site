<!DOCTYPE html>
<html lang="en">

<head>
	<title>Park</title>
	<meta name="author" content="Riccardo Grinover and Reef Stevens" />
	<meta name="description" content="Website to search for parks" />
	<meta charset="UTF-8" />
	<link href="style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="scripts.js"></script>
</head>


<body id="individualPageTwo">

	<div id="wrapper">

		<!--         Header        -->
		<?php
	        require "header.php";
	    ?>


		<!--         Search and large park background        -->
		<div class="section">
			<div class="containerMap">
				<h1>Mt Cootha Botanic Gardens</h1>
				<img class="resultMap" src="images/test.png" alt="parkMap">
			</div>
		</div>

		<div class="individualParkInfo">
			<h2>MT COOT-THA RD TOOWONG</h2>
		</div>


		<!--         Rating        -->
		<div class="ratingBox">
			<div class="section bg ">
				<div class="container">
					<div class="reviewHolder col three backGround">
						<h3>Riccardo Grinover</h3>
						<div class="acidjs-rating-stars">
							<form>
								<input type="radio" name="group-2" id="group-1-0" value="5" /><label for="group-2-0"></label>
								<!--
								--><input type="radio" name="group-2" id="group-1-1" value="4" /><label for="group-2-1"></label>
								<!--
								--><input type="radio" checked="checked" name="group-2" id="group-1-2" value="3" /><label for="group-2-2"></label>
								<!--
								--><input type="radio" name="group-2" id="group-1-3" value="2" /><label for="group-2-3"></label>
								<!--
								--><input type="radio" name="group-2" id="group-1-4" value="1" /><label for="group-2-4"></label>
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
								<input type="radio" name="group-2" id="group-3-0" value="5" /><label for="group-2-0"></label>
								<!--
								--><input type="radio" name="group-2" id="group-3-1" value="4" /><label for="group-2-1"></label>
								<!--
								--><input type="radio" checked="checked" name="group-2" id="group-3-2" value="3" /><label for="group-2-2"></label>
								<!--
								--><input type="radio" name="group-2" id="group-3-3" value="2" /><label for="group-2-3"></label>
								<!--
								--><input type="radio" name="group-2" id="group-3-4" value="1" /><label for="group-2-4"></label>
							</form>
						</div>
						<p>"B-E-A-UTIFUL"</p>
					</div>
				</div>

				<div class="group"></div>
			</div>
		</div>
	</div>

	<!--       Footer       -->
	<?php
        require "footer.php";
    ?>



</body>

</php>
