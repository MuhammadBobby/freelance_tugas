<?php
require "koneksi.php";

// memanggil apabila tombol submit di klik
$id = $_POST['id'];
$nofaktur = $_POST['nofaktur'];
$karyawan = $_POST['karyawan'];
$supplier = $_POST['supplier'];
$tanggal = $_POST['tanggal'];
$id_obat = $_POST['obat'];
$jumlah = $_POST['jumlah'];
$harga_satuan = $_POST['harga'];

$harga = $jumlah * $harga_satuan;
$jumlahsebelum = $_POST['jumlahsebelum'];
$hargasebelum = $_POST['hargasebelum'];

// mengupdate data penjualan
mysqli_query($conn, "UPDATE detail_pembelian SET
id_obat = '$id_obat',
jumlah = $jumlah,
harga = $harga
WHERE id_detail_pembelian = $id");

// update stok obat
$stok = mysqli_query($conn, "SELECT * FROM obat WHERE id_obat = '$id_obat'");
while ($row = mysqli_fetch_array($stok)) {
    $stokobat = $row['stok'];
    if ($jumlah < $jumlahsebelum) {
        $selisih = $jumlahsebelum - $jumlah;
        $stokobat = $stokobat - $selisih;
    } else if ($jumlah > $jumlahsebelum) {
        $selisih = $jumlah - $jumlahsebelum;
        $stokobat = $stokobat + $selisih;
    }
}
mysqli_query($conn, "UPDATE obat SET stok = '$stokobat' WHERE id_obat = '$id_obat' ");

// update jumlah bayar penjualan
$hasilharga = mysqli_query($conn, "SELECT * FROM pembelian WHERE no_faktur = '$nofaktur'");
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
mysqli_query($conn, "UPDATE pembelian SET total_bayar = $hargasekarang WHERE no_faktur = '$nofaktur' ");

header('location: ../datapembelian.php?edit=true');
