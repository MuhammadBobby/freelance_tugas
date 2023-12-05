<?php
require "koneksi.php";

// memanggil apabila tombol submit di klik
$id = $_POST['id'];
$idjual = $_POST['id_penjualan'];
$karyawan = $_POST['karyawan'];
$pelanggan = $_POST['pelanggan'];
$id_obat = $_POST['obat'];
$jumlah = $_POST['jumlah'];
$harga_satuan = $_POST['harga'];

$harga = $jumlah * $harga_satuan;
$jumlahsebelum = $_POST['jumlahsebelum'];
$hargasebelum = $_POST['hargasebelum'];


// update stok obat
$stok = mysqli_query($conn, "SELECT * FROM obat WHERE id_obat = '$id_obat'");
while ($row = mysqli_fetch_array($stok)) {
    $stokobat = $row['stok'];
    if ($jumlah < $jumlahsebelum) {
        $selisih = $jumlahsebelum - $jumlah;
        $stokobat = $stokobat + $selisih;
    } else if ($jumlah > $jumlahsebelum) {
        $selisih = $jumlah - $jumlahsebelum;
        if ($stokobat < $selisih) {
            header("location: ../datapenjualan.php?gagal=true");
            exit;
        }
        $stokobat = $stokobat - $selisih;
    }
}
mysqli_query($conn, "UPDATE obat SET stok = '$stokobat' WHERE id_obat = '$id_obat' ");

// mengupdate data penjualan
mysqli_query($conn, "UPDATE detail_penjualan SET
    id_obat = '$id_obat',
    jumlah = $jumlah,
    harga = $harga
    WHERE id_detail_penjualan = $id");

// update jumlah bayar penjualan
$hasilharga = mysqli_query($conn, "SELECT * FROM penjualan WHERE id_penjualan = '$idjual'");
while ($row = mysqli_fetch_array($hasilharga)) {
    $hargasekarang = $row['total_bayar'];
    if ($harga > $hargasebelum) {
        $selisih = $harga - $hargasebelum;
        $hargasekarang = $hargasekarang + $selisih;
    } else if ($harga < $hargasebelum) {
        $selisih = $hargasebelum - $harga;
        $hargasekarang = $hargasekarang - $selisih;
    }
}
mysqli_query($conn, "UPDATE penjualan SET total_bayar = $hargasekarang WHERE id_penjualan = '$idjual' ");

header('location: ../datapenjualan.php?edit=true');
