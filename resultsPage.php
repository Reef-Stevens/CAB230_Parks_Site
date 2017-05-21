<!DOCTYPE html>
<html lang="en">

<head>
	<title>Parks</title>
	<meta name="author" content="Riccardo Grinover and Reef Stevens" />
	<meta name="description" content="Website to search for parks" />
	<meta charset="UTF-8" />
	<link href="style/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="scripts.js"></script>
</head>


<body>

	<!--         Header        -->
	<?php
        require "header.php";
    ?>

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
	<?php
        require "footer.php";
    ?>


</body>

</php>
