<?php
session_start();
include "../koneksi.php";
date_default_timezone_set("Asia/Jakarta");
$tgl_upload = date("Y-m-d H:i:s");
setlocale (LC_TIME, 'INDONESIAN');
$user			= $_POST["user"];
$ip 			= $_POST["ip"];

$add = mysqli_query($konek, "INSERT INTO client (ip, user) VALUES 
	('".$ip."', '".$user."')");
if (!$add) {
	die ("Terdapat kesalahan : ". mysqli_error($konek));
}
else {
	header("Location: client.php");
}
?>