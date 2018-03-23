<?php
session_start();
include "koneksi.php";

$Username = $_POST["username"];
$Password = $_POST["password"];


// Validasi Login
if (isset($_POST["login"])){
 
 $queryuser = mysqli_query ($konek, "SELECT * FROM user WHERE username='".$Username."'") or die (mysqli_error($konek));
  
 $user = mysqli_fetch_array ($queryuser) or die (mysqli_error($konek));
 if ($Password == $user["password"] && $Username == $user["username"]){
 
 $_SESSION["Id_User"]    = $user["iduser"];
 $_SESSION["Username"]    = $user["username"];
 $_SESSION["Password"]    = $user["password"];
 $_SESSION["IdUser"]    = $user["iduser"];
 $_SESSION["Login"]     = true;
 
 if ($_SESSION["Username"] == "admin"){
  //echo "1";
  header ("Location: 1/artikel.php");
  exit();
  
 }
 else if($_SESSION["Username"] == "user" || $_SESSION["Username"] == "user1" || $_SESSION["Username"] == "user2" ){
  //echo "2";/
  header ("Location: user/index.php");
  
 }
 else if($_SESSION["Id_Usergroup_User"] == 3){
  echo "3";
  //header ("Location: 3/index.php");
  
 }
 else{
  echo "4";
  //header("Location :pagenotfound.php");
  }
 }
}
else {
 echo "Error";
}
 
?>