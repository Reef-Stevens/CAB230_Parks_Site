<!--         Header        -->
<?php
include 'header.inc';
?>

<body id="signUp">
	<!--  signup page for new users  -->
	<div class="pagecontent">
		<!--  signup page form container  -->
		<div class="section signupform">
			<?php
			$errors = array();
			require 'validate.php'; // require appropriate validation function
			if (isset($_POST['signup'])) {
				// validate all given inputs by the user
				validateName($errors, $_POST, 'name');
				validateEmail($errors, $_POST, 'email');
				validateAge($errors, $_POST, 'age');
				validateDate($errors, $_POST, 'date');
				validatePass($errors, $_POST, 'pass');
				if ($errors) { // if errors are encountered, reshow form with errors
					include 'form_signup.php';
				} else { // get the data from the poasted signup form
					$name = $_POST['name'];
					$pass = $_POST['pass'];
					$email = $_POST['email'];
					$age = $_POST['age'];
					$birth = $_POST['date'];

					if (isset($_POST['signup']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
						require 'register.php'; // require necessary registration script
						if(register($name,$pass,$email, $age, $birth)) { // try to register the user
							header("Location: Login.php"); // send the registered user to the login page
							exit;
						} else {
							include 'form_signup.php'; // errors occured, reshow form
						}
					} else {
						include 'form_signup.php'; // errors occured, reshow form
					}
				}
			} else {
				include 'form_signup.php'; // show the initial signup form
			}
			?>
		</div>
	</div>

<!--       Footer       -->
<?php
require "footer.php";
?>
