<?php
require "koneksi.php";

$id = $_GET["id"];
$id_penjualan = $_GET["jual"];
$id_obat = $_GET["id_obat"];

// me refresh stok
$tambahstok = mysqli_query($conn,"SELECT * FROM detail_penjualan, obat WHERE id_detail_penjualan = '$id' and detail_penjualan.id_obat = obat.id_obat");
while ($row = mysqli_fetch_array($tambahstok)) {
    $stokobat = $row['stok'];
    $jumlahobat = $row['jumlah'];
    $stokobatnew = $stokobat + $jumlahobat;
}
mysqli_query($conn, "UPDATE obat SET stok = '$stokobatnew' WHERE id_obat = '$id_obat' ");

// mengurangi di penjualan
$hasilharga = mysqli_query($conn,"SELECT * FROM penjualan WHERE id_penjualan = '$id_penjualan'");
$querydetail = "SELECT * FROM detail_penjualan WHERE id_detail_penjualan = '$id'";
$aptdetail = query($querydetail)[0];

$total = 0;
while ($row = mysqli_fetch_array($tambahstok)) {
    $hargasekarang = $row['total_bayar'];
    $hargahapus = $aptdetail['harga'];

    $total = $hargasekarang - $hargahapus;
}
mysqli_query($conn, "UPDATE penjualan SET total_bayar = $total WHERE id_penjualan = '$id_penjualan' ");

mysqli_query($conn, "DELETE FROM detail_penjualan WHERE id_detail_penjualan = '$id' ");

    header('location: ../datapenjualan.php?delete=true');