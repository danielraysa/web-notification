<?php
session_start();
include "../koneksi.php";
date_default_timezone_set("Asia/Jakarta");
$tgl_upload = date("Y-m-d H:i:s");
setlocale (LC_TIME, 'INDONESIAN');
$subjek			= $_POST["subjek"];
$isi 			= $_POST["isi"];
$tgl_regis		= $_POST["tgl_regis"];
$tujuan		= $_POST["tujuan"];
$success = 0;

if (count($tujuan) > 1) {
	for($x = 0; $x < count($tujuan); $x++) {
		$add = mysqli_query($konek, "INSERT INTO pengumuman (kepada, perihal, isi, tgl_kirim, tgl_upload) VALUES 
		('".$tujuan[$x]."', '".$subjek."', '".$isi."', '".$tgl_regis."', '".$tgl_upload."')");
		$a = mysqli_query($konek, "SELECT * FROM pengumuman p JOIN user u ON p.kepada = u.username WHERE p.kepada = '".$tujuan[$x]."' AND p.perihal = '".$subjek."'");
		$b = mysqli_fetch_array($a);
		if (!$a) {
			die ("Terdapat kesalahan : ". mysqli_error($konek));
		}
		if (!$b) {
			die ("Terdapat kesalahan : ". mysqli_error($konek));
		}
		$add1 = mysqli_query($konek, "INSERT INTO pesan (userid, perihal, nomor) VALUES 
		('".$b['iduser']."', '".$subjek."', '".$b['nomor']."')");
		if (!$add) {
			die ("Terdapat kesalahan : ". mysqli_error($konek));
		}
	}
	$success = 1;
}
else {
	$add = mysqli_query($konek, "INSERT INTO pengumuman (kepada, perihal, isi, tgl_kirim, tgl_upload) VALUES 
		('".$tujuan[0]."', '".$subjek."', '".$isi."', '".$tgl_regis."', '".$tgl_upload."')");
	$a = mysqli_query($konek, "SELECT * FROM pengumuman p JOIN user u ON p.kepada = u.username WHERE p.kepada = '".$tujuan[0]."' AND p.perihal = '".$subjek."'");
	$b = mysqli_fetch_array($a);
	if (!$a) {
		die ("Terdapat kesalahan : ". mysqli_error($konek));
	}
	if (!$b) {
		die ("Terdapat kesalahan : ". mysqli_error($konek));
	}
	$add1 = mysqli_query($konek, "INSERT INTO pesan (userid, perihal, nomor) VALUES 
	('".$b['iduser']."', '".$subjek."', '".$b['nomor']."')");
	$success = 1;
	if (!$add) {
		die ("Terdapat kesalahan : ". mysqli_error($konek));			
	}
}

if ($success == 1) {
	header("Location: artikel.php");
}
else {
	die ("Terdapat kesalahan : ". mysqli_error($konek));	
}

?>