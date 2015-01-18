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
		<script src="apps/banner.js"></script>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</header>

	<body>
		<div class="container">
			<div class="topbar"><div>Classic Yacht Service</div></div>
			<div class="heroholder">
				<div class="hero">
				</div>
			</div>
			
			<div class="content" align="center">
				<div class="text">
					<h1>Livskvalitet är en vacker träbåt</h1>
					Hur mår din träbåt? Kanske behöver något bytas eller bara fräschas upp? Kanske finns en dröm om en nybyggd båt vid bryggan? Vi erbjuder lösningar på era funderingar och önskemål. Vad ni än behöver ha gjort så gör vi noggranna arbeten med hög kvalitet. Både traditionella och moderna metoder används för bästa resultat. Classic Yacht Service erbjuder också hållbara och underhållsfria produkter för Din båt. 
					Välkommen till Classic Yacht Service!
				</div>
			</div>

			<div class="sidebar">

				<a class="sidebtn" id="0">Hem<div class="under"></div></a>
						
				<?php

					$barIDS = [];
					$sql = "SELECT * FROM categories, catrelations WHERE categories.catID=catrelations.catID";
					$result = mysql_query($sql);

					

					while(($data = mysql_fetch_array($result))){
						$catname = $data['catName'];
						$catid = $data['catID'];

						 

						if(!in_array($catid, $barIDS)){
							
					
							echo '<a class="sidebtn" id="'.$catid.'">'.$catname.'<div class="under"></div></a>';
								
							
							array_push($barIDS, $catid);
						}

					}

					$sql = "SELECT * FROM categories";
					$result = mysql_query($sql);

					while(($data = mysql_fetch_array($result))){
						$catname = $data['catName'];
						$catid = $data['catID'];

						

						if(!in_array($catid, $barIDS)){
							
							
							echo '<a class="sidebtn" id="'.$catid.'">'.$catname.'<div class="under"></div></a>';
								
							
							array_push($barIDS, $catid);
						}

					}

				?>
				
				
			</div>

			<div style="clear:both"></div>

		</div>
	</body>

	<footer>
	</footer>

</html>