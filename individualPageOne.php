<!DOCTYPE html>
<html lang="en">

<head>
	<title>Park</title>
	<meta name="author" content="Riccardo Grinover and Reef Stevens" />
	<meta name="description" content="Website to search for parks" />
	<meta charset="UTF-8" />
	<link href="style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="scripts.js"></script>
</head>


<body id="individualPageOne">


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


	<!--         Search and large park background        -->
	<div class="section">
		<div class="containerMap">
			<h1>Brisbane City Botanic Gardens</h1>
			<img class="resultMap" src="images/test.png" alt="parkMap">
		</div>
	</div>

	<div class="individualParkInfo">
		<h2>ALICE ST	BRISBANE</h2>
	</div>


	<!--         Rating        -->
	<div class="ratingBox">
		<div class="section bg ">
			<div class="container">
				<div class="reviewHolder col three backGround">
					<h3>Riccardo Grinover</h3>
					<div class="acidjs-rating-stars">
						<form>
							<input type="radio" name="group-2" id="group-2-0" value="5" /><label for="group-2-0"></label>
							<!--
					        --><input type="radio" name="group-2" id="group-2-1" value="4" /><label for="group-2-1"></label>
							<!--
					        --><input type="radio" checked="checked" name="group-2" id="group-2-2" value="3" /><label for="group-2-2"></label>
							<!--
					        --><input type="radio" name="group-2" id="group-2-3" value="2" /><label for="group-2-3"></label>
							<!--
					        --><input type="radio" name="group-2" id="group-2-4" value="1" /><label for="group-2-4"></label>
						</form>
					</div>
					<p>"Yeah man this park is fucking awesome"</p>
				</div>

				<div class="reviewHolder col three backGround">
					<h3>Reef Stevens</h3>
					<div class="acidjs-rating-stars">
						<form>
							<input type="radio" name="group-2" id="group-2-0" value="5" /><label for="group-2-0"></label>
							<!--
					        --><input type="radio" name="group-2" id="group-2-1" value="4" /><label for="group-2-1"></label>
							<!--
					        --><input type="radio" checked="checked" name="group-2" id="group-2-2" value="3" /><label for="group-2-2"></label>
							<!--
					        --><input type="radio" name="group-2" id="group-2-3" value="2" /><label for="group-2-3"></label>
							<!--
					        --><input type="radio" name="group-2" id="group-2-4" value="1" /><label for="group-2-4"></label>
						</form>
					</div>
					<p>"Not too bad, needs more beer"</p>
				</div>

				<div class="reviewHolder col three backGround">
					<h3>Tom Mishteler</h3>
					<div class="acidjs-rating-stars">
						<form>
							<input type="radio" name="group-2" id="group-2-0" value="5" /><label for="group-2-0"></label>
							<!--
					        --><input type="radio" name="group-2" id="group-2-1" value="4" /><label for="group-2-1"></label>
							<!--
					        --><input type="radio" checked="checked" name="group-2" id="group-2-2" value="3" /><label for="group-2-2"></label>
							<!--
					        --><input type="radio" name="group-2" id="group-2-3" value="2" /><label for="group-2-3"></label>
							<!--
					        --><input type="radio" name="group-2" id="group-2-4" value="1" /><label for="group-2-4"></label>
						</form>
					</div>
					<p>"B-E-A-UTIFUL"</p>
				</div>
			</div>

			<div class="group"></div>
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
