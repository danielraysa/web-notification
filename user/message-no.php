<?php
    session_start();
    //Means the form was submitted
    include "../koneksi.php";
    $perihal = $_GET['perihal'];
    $look = mysqli_query($konek, "SELECT * FROM pengumuman WHERE perihal = '".$perihal."'");
    $get = mysqli_fetch_array($look);
    $query = "INSERT INTO pesan (userid, perihal, tanggal, agreement, nomor) VALUES ('".$_SESSION["Id_User"]."', '".$perihal."', '".date('Y-m-d')."', 'Tidak', ".$get['nomor'].")";
    mysqli_query($konek, $query) or die(mysql_error());

?>