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
					<?php
					$errors = array();
					require 'validate.php';
					include 'form.php';
					?>
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
