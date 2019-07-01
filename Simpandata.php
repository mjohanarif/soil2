<?php
// Parameter untuk database MySQL
$host = "localhost"; // Nama host atau IP server
$user = "root";      // Username MySQL
$pass = "";          // Password MySQL
$name = "db_sensor";      // Nama database MySQL
 
// Baca parameter get  /simpandata.php?suhu=x <===
$kelembaban = $_GET["moisture"];
 
// Buat koneksi ke database MySQL
$conn = new mysqli($host, $user, $pass, $name);
 
// Periksa apakah koneksi sudah berhasil
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
 
// Perintah SQL untuk menyimpan data suhu ke tabel sensor
$sql = "INSERT INTO db_sensor (tbl_water) VALUES ('$kelembaban')";
 
// Jalankan dan periksa apakah perintah berhasil dijalankan
if ($conn->query($sql) === TRUE) {
    echo "Sukses - Tersimpan: ".$suhu;
} else {
    echo "Error: ". $conn->error;
}
 
$conn->close();
?>