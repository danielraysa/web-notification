<?php
    session_start();
    //Means the form was submitted
    include "../koneksi.php";
    if (isset($_GET['perihal'])) {
        $perihal = $_GET['perihal'];
        $look = mysqli_query($konek, "SELECT * FROM pengumuman WHERE perihal = '".$perihal."' AND kepada = '".$_SESSION['Username']."'");
        $get = mysqli_fetch_array($look);
        if ($_GET['respons'] == "yes") {
            $query = "UPDATE pesan SET tanggal = '".date('Y-m-d')."', agreement = 'Ya' WHERE nomor = ".$get['nomor']."";
        }
        else {
            $query = "UPDATE pesan SET tanggal = '".date('Y-m-d')."', agreement = 'Tidak' WHERE nomor = ".$get['nomor']."";
        }
        $run = mysqli_query($konek, $query);
        if (!$run) {
            die("Error 1 : ".mysqli_error($konek));
        }
        else {
            echo "Success 1";
            //header("Location: index.php");
	        //exit();
        }
    }
    else if (isset($_GET['nomor'])) {
        $get = $_GET['nomor'];
        echo $get;
        if ($_GET['respons'] == "yes") {
            $query = "UPDATE pesan SET tanggal = '".date('Y-m-d')."', agreement = 'Ya' WHERE nomor = ".$get."";
        }
        else {
            $query = "UPDATE pesan SET tanggal = '".date('Y-m-d')."', agreement = 'Tidak' WHERE nomor = ".$get."";
        }
        $run = mysqli_query($konek, $query);
        if (!$run) {
            die("Error 2 : ".mysqli_error($konek));
        }
        else {
            echo "Success 2";
            //header("Location: index.php");
	        //exit();
        }
    }
    else {
        echo "Error occured.";
    }
    
?>