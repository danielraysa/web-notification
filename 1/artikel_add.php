<?php
session_start();
include "../koneksi.php";
date_default_timezone_set("Asia/Jakarta");
$tgl_upload = date("Y-m-d H:i:s");
setlocale (LC_TIME, 'INDONESIAN');
$subjek			= mysqli_real_escape_string($konek, $_POST["subjek"]);
$isi 			= mysqli_real_escape_string($konek, $_POST["isi"]);
$tgl_regis		= $_POST["tgl_regis"];
$tujuan		= $_POST["tujuan"];
$success = 0;
echo $isi;

$add = mysqli_query($konek, "INSERT INTO pengumuman (perihal, isi, tgl_kirim, tgl_upload) VALUES 
		('".$subjek."', '".$isi."', '".$tgl_regis."', '".$tgl_upload."')");
		$a = mysqli_query($konek, "SELECT * FROM pengumuman WHERE tgl_upload = '".$tgl_upload."'");
		$b = mysqli_fetch_array($a);

if (count($tujuan) > 1) {
	for($x = 0; $x < count($tujuan); $x++) {
		$add2 = mysqli_query($konek, "INSERT INTO pesan (userid, nomor) VALUES 
		(".$tujuan[$x].", '".$b['nomor']."')");	
	}
	$success = 1;
}
else {
	
	$add1 = mysqli_query($konek, "INSERT INTO pesan (userid, nomor) VALUES 
	(".$tujuan[0].", '".$b['nomor']."')");
	$success = 1;
	
}

if ($success == 1) {
	header("Location: artikel.php");
}
else {
	die ("Terdapat kesalahan : ". mysqli_error($konek));	
}

?>