<?php
include "../koneksi.php";

$nomor 			= $_POST["nomor"];
$kepada		 	= $_POST["kepada"];
$perihal		= $_POST["perihal"];
$isi			= $_POST["isi"];

if (empty($lokasi_file)) {
	if ($edit = mysqli_query($konek, "UPDATE pengumuman SET perihal='$perihal', isi='$isi' WHERE nomor='$nomor'")){
		header("Location: artikel.php");
		exit();
	}
	die ("Terdapat kesalahan : ". mysqli_error($konek));

}else {	
	$hapus=mysqli_query($konek, "SELECT * FROM pengumuman WHERE nomor='$nomor'");
    $r=mysqli_fetch_array($hapus);
	
	if ($edit = mysqli_query($konek, "UPDATE pengumuman SET perihal='$perihal', isi='$isi', WHERE nomor='$nomor'")){
			header("Location: artikel.php");
			exit();
		}
	die ("Terdapat kesalahan : ". mysqli_error($konek));
}
?>