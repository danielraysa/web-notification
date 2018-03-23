<?php
$servername = "localhost";
$username ="root";
$password ="";
$dbname = "karyawan";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
	die("connection failed: ". $conn->connect_error);
	
}

$sql = "SELECT perihal, isi FROM pengumuman";
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