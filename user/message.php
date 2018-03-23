<?php
    session_start();
    //Means the form was submitted
    include "../koneksi.php";
    $perihal = $_GET['perihal'];
    $look = mysqli_query($konek, "SELECT * FROM pengumuman WHERE perihal = '".$perihal."' AND kepada = '".$_SESSION['Username']."'");
    $get = mysqli_fetch_array($look);
    $query = "UPDATE pesan SET tanggal = '".date('Y-m-d')."', agreement = 'Ya' WHERE nomor = ".$get['nomor']."";
    mysqli_query($konek, $query) or die(mysql_error());

?>