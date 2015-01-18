<?php

include("database.php");

$catID = $_POST['id'];



$sql = "SELECT * FROM subcategories,catrelations WHERE catrelations.catID=$catID AND subcategories.subCatID=catrelations.subCatID";
$result = mysql_query($sql);

while(($data = mysql_fetch_array($result)) != false){
	$name = $data['subCatName'];
	echo "<a class='subcat'>$name</a>";
}

?>