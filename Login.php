<?php
// checks if user is logged in
if (isset($_POST['login'])) {
	if (isset($_POST['login']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
		require 'userLogin.php'; //script to check if user is logged in
		$pass = $_POST['pass'];
		$email = $_POST['email'];
		if (loginSession($pass, $email)) { // check if user is logged in
			session_start();
			// adds needed info to the session
			$_SESSION['isAdmin'] = TRUE;
			$_SESSION['email'] = $email;
			header("Location: index.php");
		} else {
			header("Location: Login.php?loginfail=true"); // set value for failed login
			exit();
		}
	}
}
?>

<!--         Header        -->
<?php
include "header.inc";
?>

<body id="login">

	<div class="pagecontent">
		<!--   login form container  -->
		<div class="section loginform">
			<?php
			// form for the login of users created via a constructor
			include 'form_login.php';
			?>
		</div>
	</div>

<!--       Footer       -->
<?php
require "footer.php";
?>
