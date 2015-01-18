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
					<form method="post" action="subcatHandle.php">
						<h2>Skapa översida</h2>
						

						<textarea rows="16" cols="32" name="pageText">
						</textarea><br>

						Välj överkategori<br>
						<select name='catID'>
						<?php

							$sql = "SELECT * FROM categories";
							$result = mysql_query($sql);
							while(($data = mysql_fetch_array($result)) != false){
								$name = $data['catName'];
								$id = $data['catID'];
								echo "<option value='$id'>$name</option>";
							}
						?>

						</select>
						<input type="submit" name="createPage" value="Skapa"/>
					</form><br>


					<?php


						$sql = "SELECT * FROM subcategories, categories, catrelations WHERE subcategories.subCatID=catrelations.subCatID AND categories.catID=catrelations.catID ORDER BY catrelations.catID ASC";
						$result = mysql_query($sql);

						while(($data = mysql_fetch_array($result))){
							$cat = $data['catName'];
							$name = $data['subCatName'];
							$id = $data['subCatID'];

							echo "<form method='post' action='subcatHandle.php'>";
								echo "<input type='hidden' name='selected' value='$id'/>";
								echo $cat." > ".$name;
								echo "<input type='submit' name='delCat' value='Ta bort'/><br>";
							echo "</form><br>";
						}


						if(isset($_POST['createCat'])){
							$pageText = $_POST['pageText']
							$catID = $_POST['catID'];


							$sql = "INSERT INTO subcategories (subCatName) VALUES('$catName')";
							mysql_query($sql);

							$sql = "SELECT subCatID FROM subcategories WHERE subCatName='$catName'";
							$result = mysql_query($sql);
							$subcatID = 0;
							while(($data = mysql_fetch_array($result)) != false){
								$subcatID = $data['subCatID'];
							}

							$sql = "INSERT INTO catrelations (catID, subCatID) VALUES($catID, $subcatID)";
							mysql_query($sql);

							echo 
							"<script>
								alert('Kategori skapad!');
								window.location.href=window.location.href;
							</script>";
						}


						if(isset($_POST['delCat'])){
							$id = $_POST['selected'];

							$sql = "DELETE FROM subcategories WHERE subCatID=$id";
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