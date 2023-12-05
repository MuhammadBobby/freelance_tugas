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
    $pelanggan = $_SESSION["pelanggan"];
    $plat = htmlspecialchars($_POST["plat"]);
    $tanggal = htmlspecialchars($_POST["tanggal"]);
    $lama = htmlspecialchars($_POST["lama"]);

    // mengambil data harga rental mobil untuk menghitung sesuai lama 
    $queryhrg = "SELECT * FROM mobil WHERE plat_nomor = '$plat'";
    $hasilhrg = $conn->query($queryhrg);
    while ($hrg = $hasilhrg->fetch_assoc()) {
        $harga = $hrg['harga'];
        $total = $harga * $lama;
    }

    // pengecekan username apakah ada di database

    $query = "INSERT INTO temp (id_transaksi, pelanggan, plat_mobil, tanggal, lama, total_bayar) VALUES ('', '$pelanggan', '$plat', '$tanggal' , $lama, $total )";

    if ($conn->query($query) === TRUE) {
        header("location: index.php?tambah=true#pemesanan");
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
