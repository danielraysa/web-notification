<?php

include "../koneksi.php";

$nomor	= $_GET["nomor"];

$hapus=mysqli_query($konek, "SELECT * FROM pengumuman WHERE nomor='$nomor'");
    $r=mysqli_fetch_array($hapus);
 
if($delete = mysqli_query ($konek, "DELETE FROM pengumuman WHERE nomor='$nomor'")){
	header("Location: artikel.php");
	exit();
}
die ("Terdapat Kesalahan : ".mysqli_error($konek));

?>