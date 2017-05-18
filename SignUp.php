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
