<!DOCTYPE html>
<html lang="en">

<head>
	<title>Parks</title>
	<meta name="author" content="Riccardo Grinover and Reef Stevens" />
	<meta name="description" content="Website to search for parks" />
	<meta charset="UTF-8" />
	<link href="style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="scripts.js"></script>
</head>


<body>

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
		<!--         Search and large park background        -->
		<div class="section">


		</div>


		<!--       Parks pannels showing different parks with small description        -->
		<div class="section bg ">
			<div class="container">
				<h1>Results Page</h1>
				<div onclick="window.location.href='individualPageOne.php'">
						<div class="col three bg pointer">
							<div class="imgholder">
								<img class="parkImg" src="images/brisbaneCityGardensBotanic.jpg" alt="result">
							</div>
							<h1 class="feature">Brisbane City Gardens</h1>
							<p>Attractions at the Gardens include Bamboo Grove, Weeping Fig Avenue, Riverstage, ornamental ponds and more. Bookings are available in the Gardens for special events.</p>
						</div>
				</div>

				<div onclick="window.location.href='individualPageTwo.php'">
				<div class="col three bg pointer">
					<div class="imgholder">
						<img class="parkImg" src="images/gardenOne.jpg" alt="result">
					</div>
					<h1 class="feature">Brisbane Botanic Gardens</h1>
					<p>A stunningly landscaped park showcasing luscious rainforest, a scented garden, waterfalls and lagoons, where you can see eastern water dragons, turtles and eels.</p>
				</div>
			</div>

			<div onclick="window.location.href='individualPageThree.php'">
				<div class="col three bg pointer">
					<div class="imgholder">
						<img class="parkImg" src="images/gardenTwo.jpg" alt="result">
					</div>
					<h1 class="feature">Gregory Park</h1>
					<p>On weekend afternoons this park resembles a village green in England as families, dog walkers, picnickers and sports players descend on the tree-bordered grassy expanse to enjoy the last of the day’s sun.
				</div>
			</div>

				<div class="group margin"></div>
				<div class="col three bg pointer">
					<div class="imgholder">
						<img class="parkImg" src="images/gardenThree.jpg" alt="result">
					</div>
					<h1 class="feature">New Farm Park</h1>
					<p>As any regular playground visiting parent will know, size does matter, with the creativity of the play equipment coming a close second. Which is why city slickers and their offspring find it hard to go past the many charms of New Farm Park, with
						its massive fortress and iconic furniture-eating fig trees.</p>
				</div>

				<div class="col three bg pointer">
					<div class="imgholder">
						<img class="parkImg" src="images/gardenFour.jpg" alt="result">
					</div>
					<h1 class="feature">Spectacle Garden</h1>
					<p>Enjoy meandering through the winding path ways of this garden lovers paradise with an ever changing seasonal display of blooms. The Spectacle Garden at Colin Campbell Place displays a vivid array of colour all year and includes a collection of flowers,
						herbs, water features and art works. You might even be greeted by one of our resident Water Dragons.</p>
				</div>

				<div class="col three bg pointer">
					<div class="imgholder">
						<img class="parkImg" src="images/gardenFive.jpg" alt="result">
					</div>
					<h1 class="feature">The Epicurious Gardens</h1>
					<p>The Epicurious Garden is a must-visit destination at South Bank for foodies, gardening enthusiasts and all those in-between.</p>
				</div>

				<div class="group"></div>
			</div>
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
