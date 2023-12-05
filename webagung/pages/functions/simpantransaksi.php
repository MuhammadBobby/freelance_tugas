<?php
require "function.php";

$id = $_POST['id'];
$tanggal = $_POST['tanggal'];
$supplier = $_POST['supplier'];
$barang_id = $_POST['barang_id'];
$jumlah = $_POST['jumlah'];
$harga_satuan = $_POST['harga_satuan'];



// menghitung harga
$harga = array();
for ($j = 0; $j < count($jumlah); $j++) {
    $harga[] = $jumlah[$j] * $harga_satuan[$j];
}



// input detail & update stok
for ($i = 0; $i < count($barang_id); $i++) {

    // penambahan stok
    $stok = "SELECT * FROM barang WHERE barang_id = '$barang_id[$i]'";
    $hasilstok = $conn->query($stok);
    while ($brgstok = $hasilstok->fetch_assoc()) {
        $stokbarang = $brgstok['stok_barang'];
        $stokbarang = $stokbarang + $jumlah[$i];
    }

    // hanya memasukkan jumlah yang lebih dari 0
    if ($jumlah[$i] > 0) {
        $query = "INSERT INTO barang_masuk_detail VALUES ('', '$id', '$barang_id[$i]', '$jumlah[$i]', $harga[$i])";
        $updatestok = "UPDATE barang SET stok_barang = '$stokbarang' WHERE barang_id = '$barang_id[$i]'";
        $conn->query($query);
        $conn->query($updatestok);
    }
}

$total_bayar = 0;
foreach ($harga as $nilai) {
    $total_bayar += $nilai;
}
$barang_masuk = "INSERT INTO barang_masuk VALUES ('$id', '$tanggal', '$supplier', '$total_bayar')";

if ($conn->query($barang_masuk) === TRUE) {
    header("location: ../transaksi.php?tambah=sukses");
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}
