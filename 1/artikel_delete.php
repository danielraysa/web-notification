<?php

include "../koneksi.php";

$nomor	= $_GET["nomor"];
$delete = mysqli_query ($konek, "DELETE FROM pesan WHERE nomor=".$nomor.""); 
$delete1 = mysqli_query ($konek, "DELETE FROM pengumuman WHERE nomor=".$nomor."");
if (!$delete || !$delete1){
	die ("Terdapat Kesalahan : ".mysqli_error($konek));	
}
else {
	header("Location: artikel.php");
}

?>