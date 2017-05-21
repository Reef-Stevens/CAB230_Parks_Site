<!--         Header        -->
<?php
require "header.php";
?>

<body id="login">

	<div class="pagecontent">
		<div class="section loginform">

			<?php
			$errors = array();
			require 'validate.php';
			if (isset($_POST['login'])) {
				validateEmail($errors, $_POST, 'email');
				validatePass($errors, $_POST, 'pass');
				if ($errors) {
					include 'form_login.php';
				} else {
					$pass = $_POST['pass'];
					$email = $_POST['email'];

					if (isset($_POST['login']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
					}
					include 'form_login.php';
				}
			} else {
				include 'form_login.php';
			}
			?>
		</div>
	</div>

	<!--       Footer       -->
	<?php
	require "footer.php";
	?>
