<!DOCTYPE html>
<html lang="en">

<head>
	<title>About Us</title>
	<meta name="author" content="Riccardo Grinover and Reef Stevens" />
	<meta name="description" content="Website to search for parks" />
	<meta charset="UTF-8" />
	<link href="style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="scripts.js"></script>
</head>



<body id="aboutUs">


	<!--         Header        -->
	<div class="header-container">
		<div class="header">
			<div class="container">
				<div id="logo" onclick="window.location.href='homePage.php'">
					<div class="imgholder">
						<img class="img" src="images/park_logo.png" alt="Park logo">
					</div>
				</div>
				<ul class="nav">
					<li><a href="homePage.php#GoogleMap">Nearby Parks</a></li>
					<li><a href="homePage.php#featuredParks">Featured Parks</a></li>
					<li><a href="aboutUs.php">About</a></li>
					<!-- Button on front page to open signup popup form -->
					<li><button onclick="window.location.href='SignUp.php'" class="signupopt">Sign Up</button>
						<button onclick="window.location.href='Login.php'" class="loginopt">Login</button></li>
				</ul>
			</div>
		</div>
	</div>


	<div class="pagecontent">
		<!--       About Us        -->
			<h1 style="text-align: center;">- Our Mission -</h1>
			<p style="text-align: center;">To provide the most bestest Brisbane parks website ever!</p>
			<h2><b>About</b></h2>
			<p style="text-align: center;">We are two electrical engineering students trying to make our way in the big, scary world of website design.</p>
	</div>

	<!--       Footer       -->
	<div class="section">
		<div class="footer">
			<div class="container white">
				<div class="col three left">
					<h1>Contact</h1>
					<p>Reef Stevens - n9441409 - reef.stevens@qut.edu.au</p>
					<p>Riccardo Grinover - n8783012 - ricardo.grinover@qut.edu.au</p>
				</div>
				<div class="col three left" onclick="window.location.href='aboutUs.php'" style="cursor:pointer">
					<h1>Our Mission</h1>
					<p>Parks are a great place to connect with people and to relax.</p>
					<p>We aim to find the best park for you, your family and pets, anywhere in Brisbane!!</p>
				</div>
				<div class="col three left">
					<h1>QUT</h1>
					<p>This website has been developed for CAB230 2017</p>
				</div>
				<div class="group"></div>
			</div>
		</div>
	</div>


</body>

</php>
