<?php
	include("apps/database.php");
?>

<html>

	<header>
		<link rel="stylesheet" type="text/css" href="styles/style.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Cinzel+Decorative' rel='stylesheet' type='text/css'>
		<script src="apps/jquery.js"></script>
		<script src="apps/main.js"></script>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</header>

	<body>
		<div class="container">
			<div class="topbar"><div>Classic Yacht Service</div></div>
			
			<div class="heroholder" style="background-image:url(images/yacht.jpg);">
				<div class="hero">
					<h1 style="background-color:rgba(0,0,0,0.5);">Administration</h1>
				</div>
			</div>

			<div class="content" align="center">
				<div class="text">
				</div>
			</div>

			<div class="sidebar">
				<?php
					include("apps/adminNavigation.php");
				?>
			</div>

			<div style="clear:both"></div>

		</div>
	</body>

	<footer>
	</footer>

</html>