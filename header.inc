<!DOCTYPE html>
<html lang="en">

<head>
	<title>Parks</title>
	<meta name="author" content="Riccardo Grinover and Reef Stevens" />
	<meta name="description" content="Website to search for parks" />
	<meta charset="UTF-8" />
	<link href="style/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="script/scripts.js"></script>
</head>

	<!--   Container for the header  -->
    <div class="header-container">
        <div class="header">
            <div class="container">
				<!--  Park logo  -->
                <div id="logo" onclick="window.location.href='index.php'">
                    <div class="imgholder">
                        <img class="img" src="images/park_logo.png" alt="Park logo">
                    </div>
                </div>
				<!--  Navigation Menu  -->
                <ul class="nav">
					<!--  links to the main parks map, a search page and about us page for info -->
                    <li><a href="index.php#ref">Parks Map</a></li>
                    <li><a href="search.php">Search Parks</a></li>
                    <li><a href="aboutUs.php">About</a></li>
                    <!-- Button on front page to open signup popup form -->
                    <li>
						<button onclick="window.location.href='signup.php'" class="signupopt">Sign Up</button>
						<?php
					    session_start();
					    // if the user is signed it, it shows a header wit
					    if (isset($_SESSION['isAdmin'])) {// logout button
					        echo '<button onclick="window.location.href=\'logout.php\'" class="loginopt">Logout</button>';
					    } else {// login button
					        echo '<button onclick="window.location.href=\'Login.php\'" class="loginopt">Login</button>';
					    }
						?>
					</li>
                </ul>
            </div>
        </div>
    </div>
