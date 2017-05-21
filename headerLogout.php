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


    <div class="header-container">
        <div class="header">
            <div class="container">
                <div id="logo" onclick="window.location.href='index.php'">
                    <div class="imgholder">
                        <img class="img" src="images/park_logo.png" alt="Park logo">
                    </div>
                </div>
                <ul class="nav">
                    <li><a href="index.php#GoogleMap">Nearby Parks</a></li>
                    <li><a href="index.php#featuredParks">Featured Parks</a></li>
                    <li><a href="aboutUs.php">About</a></li>
                    <!-- Button on front page to open signup popup form -->
                    <li><button onclick="window.location.href='signup.php'" class="signupopt">Sign Up</button>
                        <button onclick="window.location.href='logout.php'" class="loginopt">Logout</button></li>
                </ul>
            </div>
        </div>
    </div>
