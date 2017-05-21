<!DOCTYPE html>
<html lang="en">

<head>
	<title>Parks</title>
	<meta name="author" content="Riccardo Grinover and Reef Stevens" />
	<meta name="description" content="Website to search for parks" />
	<meta charset="UTF-8" />
	<link href="style/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="scripts.js"></script>
</head>


<body>

	<!--         Header        -->
	<?php
        require "header.php";
    ?>

	<div class="pagecontent">
		<!--         Search and large park background        -->
		<div class="section">

			<!-- Previous search, in serach bar, along with settings -->
			<div class="row search_bg">
				<div class="container search_field">
					<input type="text">
					<br>
					<label>Catagory: </label>
					<select name="select">
						<option value="valueOne" selected>Name</option>
						<option value="valueTwo">Location</option>
						<option value="valueThree">Suburb</option>
						<option value="valueFour">Rating</option>
					</select>
				</div>
			</div>
		</div>

		<!-- Generated search content -->
		<div class="container">
			<a href="result.php">
				<div class="result">
					<!-- Map --> <!-- TASK -->
					<div id="randomStringA" class="result_map">
						<!-- The IDs have to be kept unique for google maps to work -->
					</div>
					<div class="result_content">
						<h1>Name</h1>
						<h1>Street</h1>
						<h1>Suburb</h1>
					</div>
				</div>
			</a>
			<a href="result.php">
			<div class="result">

	<!--       Footer       -->
	<?php
        require "footer.php";
    ?>


</body>

</php>
