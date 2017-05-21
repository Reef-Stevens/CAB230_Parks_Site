<!DOCTYPE html>
<html lang="en">

<head>
		<title>Sign Up</title>
		<meta name="author" content="Riccardo Grinover and Reef Stevens" />
		<meta name="description" content="Website to search for parks" />
		<meta charset="UTF-8" />
		<link href="style/style.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="scripts.js"></script>
</head>

<body id="signUp">

	<!--         Header        -->
	<?php
        require "header.php";
    ?>


	<div class="pagecontent">
		<!--  Signup -->
		<div class="section signupform">
					<?php
					$errors = array();
					require 'validate.php';
					if (isset($_POST['signup'])) {
						validateName($errors, $_POST, 'name');
						validateEmail($errors, $_POST, 'email');
						validateAge($errors, $_POST, 'age');
						validateDate($errors, $_POST, 'date');
						validatePass($errors, $_POST, 'pass');
						if ($errors) {
							include 'form.php';
						} else {
							echo '1';
							include 'register.php';
							include 'form.php';
							echo 'form submitted successfully with no errors';
						}
					} else {
						include 'form.php';
					}
					?>
		</div>
	</div>


	<!--       Footer       -->
	<?php
        require "footer.php";
    ?>


</body>

</php>
