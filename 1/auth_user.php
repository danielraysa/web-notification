<?php

if (!isset ($_SESSION["Login"]) || $_SESSION ["Login"] != true){
	header ("Location: ../pagenotfound.php");
}
else if ($_SESSION["IdUser"] = 1){
	$_SESSION ["Login"] = true;
}
else{
	header ("Location: ../pagenotfound.php");
}

?>