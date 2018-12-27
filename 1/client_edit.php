<?php
include "../koneksi.php";

$id 			= $_POST["id"];
$user			= $_POST["user"];
$ip 			= $_POST["ip"];

$add = mysqli_query($konek, "UPDATE client SET ip = '".$ip."', user = '".$user."' WHERE userid = ".$id."");
if (!$add) {
	die ("Terdapat kesalahan : ". mysqli_error($konek));
}
else {
	header("Location: client.php");
}
?>