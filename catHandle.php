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
					<form method="post" action="catHandle.php">
						<h2>Skapa kategori</h2>
						<input type="text" name="catName" placeholder="Kategori namn"/>
						<input type="submit" name="createCat" value="Skapa"/>
					</form><br>


					<?php


						$sql = "SELECT * FROM categories";
						$result = mysql_query($sql);

						while(($data = mysql_fetch_array($result))){
							$name = $data['catName'];
							$id = $data['catID'];

							echo "<form method='post' action='catHandle.php'>";
								echo "<input type='hidden' name='selected' value='$id'/>";
								echo $name;
								echo "<input type='submit' name='delCat' value='Ta bort'/><br>";
							echo "</form><br>";
						}


						if(isset($_POST['createCat'])){
							$catName = $_POST['catName'];

							$sql = "INSERT INTO categories (catName) VALUES('$catName')";
							mysql_query($sql);
							echo 
							"<script>
								alert('Kategori skapad!');
								window.location.href=window.location.href;
							</script>";
						}


						if(isset($_POST['delCat'])){
							$id = $_POST['selected'];

							$sql = "DELETE FROM categories WHERE catID=$id";
							mysql_query($sql);
							echo 
							"<script>
								alert('Kategori borttagen!');
								window.location.href=window.location.href;
							</script>";
						}

					?>

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