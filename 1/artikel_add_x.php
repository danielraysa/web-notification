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

if (count($tujuan) > 1) {
	for($x = 0; $x < count($tujuan); $x++) {
		$add = mysqli_query($konek, "INSERT INTO pengumuman (kepada, perihal, isi, tgl_kirim, tgl_upload) VALUES 
		('".$tujuan[$x]."', '".$subjek."', '".$isi."', '".$tgl_regis."', '".$tgl_upload."')");
		$a = mysqli_query($konek, "SELECT * FROM pengumuman p JOIN client u ON p.kepada = u.user WHERE p.kepada = '".$tujuan[$x]."' AND p.perihal = '".$subjek."'");
		$b = mysqli_fetch_array($a);
		if (!$add) {
			die ("Terdapat kesalahan 1 : ". mysqli_error($konek));
		}
		if (!$a) {
			die ("Terdapat kesalahan 1a : ". mysqli_error($konek));
		}
		if (!$b) {
			die ("Terdapat kesalahan 1b : ". mysqli_error($konek));
		}
		$add1 = mysqli_query($konek, "INSERT INTO pesan (userid, perihal, nomor) VALUES 
		('".$b['iduser']."', '".$subjek."', '".$b['nomor']."')");
		
	}
	$success = 1;
}
else {
	$add = mysqli_query($konek, "INSERT INTO pengumuman (kepada, perihal, isi, tgl_kirim, tgl_upload) VALUES 
		('".$tujuan[0]."', '".$subjek."', '".$isi."', '".$tgl_regis."', '".$tgl_upload."')");
	$a = mysqli_query($konek, "SELECT * FROM pengumuman p JOIN client u ON p.kepada = u.user WHERE p.kepada = '".$tujuan[0]."' AND p.perihal = '".$subjek."'");
	$b = mysqli_fetch_array($a);
	if (!$add) {
		die ("Terdapat kesalahan 2 : ". mysqli_error($konek));			
	}
	if (!$a) {
		die ("Terdapat kesalahan 2a : ". mysqli_error($konek));
	}
	if (!$b) {
		die ("Terdapat kesalahan 2b : ".mysqli_error($konek));
	}
	$add1 = mysqli_query($konek, "INSERT INTO pesan (userid, perihal, nomor) VALUES 
	('".$b['iduser']."', '".$subjek."', '".$b['nomor']."')");
	$success = 1;
	
}

if ($success == 1) {
	header("Location: artikel.php");
}
else {
	die ("Terdapat kesalahan : ". mysqli_error($konek));	
}

?>