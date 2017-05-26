<!--         Header        -->
<?php
require 'adminPermission.inc';
?>

<body id="signUp">
	<!--         Signup        -->
	<div class="pagecontent">
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
					include 'form_signup.php';
				} else {
					$name = $_POST['name'];
					$pass = $_POST['pass'];
					$email = $_POST['email'];
					$age = $_POST['age'];
					$birth = $_POST['date'];

					if (isset($_POST['signup']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
						require 'register.php';
						if(register($name,$pass,$email, $age, $birth)) {
							header("Location: Login.php");
							exit;
						} else {
							include 'form_signup.php';
						}
					} else {
						include 'form_signup.php';
					}
				}
			} else {
				include 'form_signup.php';
			}
			?>
		</div>
	</div>

<!--       Footer       -->
<?php
require "footer.php";
?>
