<?php

if($handle = opendir("../banner")){
	while(($entry = readdir($handle)) != false){
		if($entry != "." && $entry != ".." && $entry != ".DS_Store"){
			echo ",$entry";
		}
	}
}

?>