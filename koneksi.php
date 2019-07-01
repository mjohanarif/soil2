<?php

$databaseHost = 'localhost';
$databaseName = 'db_sensor';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername,
 $databasePassword, $databaseName); 

if($mysqli){
//	echo "Koneksi Berhasil<br>";
}
else{
	echo "Gagal<br>";
}

?>