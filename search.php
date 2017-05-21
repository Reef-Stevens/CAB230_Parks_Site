<!--         Header        -->
<?php
			require "header.php";
	?>

<body>

	<div class="pagecontent">
		<!--         Search and large park background        -->
		<div class="section">

			<!-- Previous search, in serach bar, along with settings -->
			<div class="row search_bg">
				<div class="container search_field">

          <form action="search.php" method="post">
					       <input type="text" name="parkNameSearch" placeholder="Search..."/>
                 <input type="submit" value="&#10140;">
          </form>

					<br>
					<label>Catagory: </label>
					<select name="select">
						<option value="valueOne" selected>Name</option>
						<option value="valueTwo">Location</option>
						<option value="valueThree">Suburb</option>
						<option value="valueFour">Rating</option>
					</select>
				</div>
			</div>
		</div>


	<!--       Footer       -->
	<?php
        require "footer.php";
    ?>


</body>

</php>
