<?php
require "functions.php";
session_start();

// pemeriksaan session login
if (!isset($_SESSION["login"])) {
    header("Location: ../../../index.php");
    exit;
}


$id = $_GET["id"];
// query data pelanggan berdasarka id
$sql = "SELECT * FROM temp, pelanggan, mobil WHERE temp.id_transaksi = '$id' AND
        temp.pelanggan = pelanggan.nik AND 
        temp.plat_mobil = mobil.plat_nomor";
$hasil = $conn->query($sql);

while ($row = $hasil->fetch_assoc()) {
    $id = $row['id_transaksi'];
    $pelanggan = $row['pelanggan'];
    $plat_mobil = $row['plat_mobil'];
    $tanggal = $row['tanggal'];
    $lama = $row['lama'];
    $total_bayar = $row['total_bayar'];
}


$query = "INSERT INTO transaksi  (id_transaksi, pelanggan, plat_mobil, tanggal, lama, total_bayar)  VALUES ('$id', '$pelanggan', '$plat_mobil', '$tanggal' , $lama, $total_bayar )";

$hapus = "UPDATE temp SET desk = 'Pesanan Telah Dikonfirmasi'
        WHERE id_transaksi = '$id'";

if ($conn->query($query) === TRUE && $conn->query($hapus) === TRUE) {
    header("location: ../transaksi.php?tambah=true");
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}
