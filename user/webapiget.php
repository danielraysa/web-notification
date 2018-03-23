<?php
session_start();

$servername = "localhost";
$username ="root";
$password ="";
$dbname = "karyawan";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
	die("connection failed: ". $conn->connect_error);
	
}

//$sql = "SELECT p1.perihal, p1.isi FROM pengumuman p1 WHERE DATE(p1.tgl_kirim) = CURDATE() AND p1.kepada = '".$_SESSION['Username']."'";
$sql = "SELECT p1.perihal, p1.isi FROM pengumuman p1 JOIN pesan p2 ON p1.nomor = p2.nomor WHERE DATE(p1.tgl_kirim) = CURDATE() AND p2.agreement IS NULL AND p1.kepada = '".$_SESSION['Username']."'";
$result = $conn->query($sql);

if (!$result) {
    trigger_error('Invalid query: ' . $conn->error);
}

$resultStr ="[";

if ($result->num_rows > 0){
	while ($row = $result->fetch_assoc()){
		$resultStr.="{\"id\":\"".$row["perihal"]."\",\"value\":\"".$row['isi']."\"},";
		
	}
	$resultStr = substr($resultStr,0,strlen($resultStr)-1)."]";
	echo $resultStr;
	
}else{
	echo "0 result";
}
$conn->close();

?>