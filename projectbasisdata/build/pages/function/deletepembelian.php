<?php
require "koneksi.php";

$id = $_GET["id"];
$id_penjualan = $_GET["jual"];
$id_obat = $_GET["id_obat"];

// me refresh stok
$tambahstok = mysqli_query($conn, "SELECT * FROM detail_pembelian, obat WHERE id_detail_pembelian = '$id' and detail_pembelian.id_obat = obat.id_obat");
while ($row = mysqli_fetch_array($tambahstok)) {
    $stokobat = $row['stok'];
    $jumlahobat = $row['jumlah'];
    $stokobat = $stokobat - $jumlahobat;
    mysqli_query($conn, "UPDATE obat SET stok = '$stokobatnew' WHERE id_obat = '$id_obat' ");
}

// mengurangi di pembelian
$hasilharga = mysqli_query($conn, "SELECT * FROM pembelian WHERE no_faktur = '$no_faktur'");
$querydetail = "SELECT * FROM detail_pembelian WHERE id_detail_pembelian = '$id'";
$aptdetail = query($querydetail)[0];

$total = 0;
while ($row = mysqli_fetch_array($tambahstok)) {
    $hargasekarang = $row['total_bayar'];
    $hargahapus = $aptdetail['harga'];

    $total = $hargasekarang - $hargahapus;
}
mysqli_query($conn, "UPDATE pembelian SET total_bayar = $total WHERE no_faktur = '$no_faktur' ");

mysqli_query($conn, "DELETE FROM detail_pembelian WHERE id_detail_pembelian = '$id' ");

header('location: ../datapembelian.php?delete=true');
