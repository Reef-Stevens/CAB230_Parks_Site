<?php
if (isset($_POST['login'])) {
	if (isset($_POST['login']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
		require 'userLogin.php';
		$pass = $_POST['pass'];
		$email = $_POST['email'];
		if (loginSession($pass, $email)) {
			session_start();
			$_SESSION['isAdmin'] = TRUE;
			header("Location: http://{$_SERVER['HTTP_HOST']}/CAB230_Parks_Site/index.php");
			exit();
		} else {
			header("Location: http://{$_SERVER['HTTP_HOST']}/CAB230_Parks_Site/Login.php?loginfail=true");
			exit();
		}
	}
}
?>

<!--         Header        -->
<?php
require "header.php";
?>

<body id="login">

	<div class="pagecontent">
		<div class="section loginform">
			<?php
			if (isset($_GET['loginfail'])){
				echo "<h1>Login failed</h1>";
			}
			include 'form_login.php';
			?>
		</div>
	</div>

<!--       Footer       -->
<?php
require "footer.php";
?>
