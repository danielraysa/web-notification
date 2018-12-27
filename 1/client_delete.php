<?php

include "../koneksi.php";

$nomor	= $_GET["nomor"];

$delete = mysqli_query ($konek, "DELETE FROM client WHERE userid = '$nomor'");
if (!$delete) {
    die ("Terdapat Kesalahan : ".mysqli_error($konek));
}
else {
    header("Location:client.php");
}
?>