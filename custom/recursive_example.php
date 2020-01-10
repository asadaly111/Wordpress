<?php 
function parentmainrescursive($counter){
	echo $counter;
	echo "<br>";
	if ($counter > 0) {
    	parentmainrescursive($counter-1);
	}
}
// Define your level
parentmainrescursive(5);

 ?>