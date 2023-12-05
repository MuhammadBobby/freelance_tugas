<?php
require "../admin/pages/functions/functions.php";
session_start();

// pemeriksaan session login
if (!isset($_SESSION["login"])) {
    header("Location: ../../index.php");
    exit;
}

// memanggil apabila tombol submit di klik
if (isset($_POST["submit"])) {
    $penyewa = $_SESSION["penyewa"];
    $kamar = htmlspecialchars($_POST["kamar"]);
    $tanggal = htmlspecialchars($_POST["tanggal"]);
    $bayar = htmlspecialchars($_POST["harga"]);
    $desk = 'belum dikonfirmasi';


    $query = "INSERT INTO konfirmasi VALUES ('', '$penyewa', '$kamar', '$tanggal' , $bayar, '$desk')";


    if ($conn->query($query) === TRUE) {
        header("location: index.php?tambah=true#pemesanan");
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
