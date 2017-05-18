<!DOCTYPE html>
<html lang="en">

<head>
	<title>Log In</title>
	<meta name="author" content="Riccardo Grinover and Reef Stevens" />
	<meta name="description" content="Website to search for parks" />
	<meta charset="UTF-8" />
	<link href="style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="scripts.js"></script>
</head>


<body id="login">


	<!--         Header        -->
	<?php
        require "header.php";
    ?>

	<div class="pagecontent">
		<div class="section loginform">
			<form class="loginform-container">
				<div class="loginform-content">
					<label><b>E-mail</b></label>
					<input type="email" placeholder="Enter Email" name="email" required>

					<label><b>Password</b></label>
					<input type="password" placeholder="Enter Password" name="psw" required>

					<div class="buttons-container">
						<button type="submit" class="loginbtn">Login</button>
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
