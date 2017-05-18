<!DOCTYPE html>
<html lang="en">

<head>
		<title>Sign Up</title>
		<meta name="author" content="Riccardo Grinover and Reef Stevens" />
		<meta name="description" content="Website to search for parks" />
		<meta charset="UTF-8" />
		<link href="style.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="scripts.js"></script>
</head>

<body id="signUp">

	<!--         Header        -->
	<?php
        require "header.php";
    ?>


	<div class="pagecontent">
		<!-- Signup -->
		<div class="section signupform">
			<form class="signform-container">
				<div class="signform-content">
					<form name="myForm">
						<label><b>Name</b></label>
						<input type="text" placeholder="Enter First Name" name="firstname" required>

						<label><b>Email</b></label>
						<input type="email" placeholder="Enter Email" name="email" required>

						<label><b>Age</b></label>
						<input type="number" min="18" max="99" placeholder="Example: 21" required>

						<label><b>Birthday</b></label>

						<input type="date" placeholder="DD/MM/YYYY" pattern="[0-9-/]+" id="myDate" required>

						<label><b>Gender</b></label>
						<div class="radiobtn">
							<input id="r-male" type="radio" name="gender" value="male" required>
							<label>Male</label>
							<input id="r-female" type="radio" name="gender" value="female" required>
							<label>Female</label>
							<input id="r-neither" type="radio" name="gender" value="neither" required>
							<label>Neither</label>
						</div>

						<label><b>Suburb</b></label>
						<input list="Suburbs" placeholder="Example: Brisbane" required>
						<datalist id="Suburbs">
						<option value="Brisbane">Brisbane</option>
						<option value="Milton">Milton</option>
						<option value="Spring Hill">Spring Hill</option>
						<option value="Indooroopilly">Indooroopilly</option>
						<option value="St Lucia">St Lucia</option>
						<option value="Toowoong">Toowoong</option>
						<option value="Southbank">Southbank</option>
					</datalist>

						<label><b>Password</b></label>
						<input type="password" placeholder="Enter Password" name="psw" required>
					</form>

					<div class="buttons-container">
						<button type="submit" class="signupbtn">Sign Up</button>
					</div>
				</div>
			</form>

		</div>
	</div>


	<!--       Footer       -->
	<?php
        require "footer.php";
    ?>


</body>

</php>
