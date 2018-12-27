<?php
include "../koneksi.php";

$nomor 			= $_POST["id"];
//$kepada		 	= $_POST["kepada"];
$perihal		= mysqli_real_escape_string($konek, $_POST["subjek"]);
$isi			= mysqli_real_escape_string($konek,$_POST["isi"]);
$tgl			= $_POST["tgl_regis"];
$edit = mysqli_query($konek, "UPDATE pengumuman SET perihal = '".$perihal."', isi = '".$isi."', tgl_kirim = '".$tgl."' WHERE nomor = ".$nomor."");

if (!$edit) {
	die(mysqli_error($konek));
}
else {
	header("location:artikel.php");
}
?>