<?php
    include('koneksi.php');
 
    $sensor = $_GET['moisture'];
 
    $sql = "INSERT INTO tbl_water (moisture) VALUES (:moisture)";
 
    $stmt = $PDO->prepare($sql);
 
    $stmt->bindParam(':moisture', $sensor);
 
    if($stmt->execute()) {
        echo "sukses gaes";
    }else{
        echo "gagal gaes";
    }
?>