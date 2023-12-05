<?php
require "function.php";

$detail_id = $_POST['detail_id'];
$masuk_id = $_POST['masuk_id'];
$tanggal = $_POST['tanggal'];
$supplier = $_POST['supplier'];
$barang_id = $_POST['barang'];
$jumlah = $_POST['jumlah'];
$harga_satuan = $_POST['harga'];

$harga = $jumlah * $harga_satuan;
$jumlahsebelum = $_POST['jumlahsebelum'];
$hargasebelum = $_POST['hargasebelum'];

$query = "UPDATE barang_masuk_detail SET
     barang_id = '$barang_id',
     jumlah = $jumlah,
     harga = $harga
 WHERE detail_id = $detail_id";

// update stok barang
$querystok = "SELECT * FROM barang WHERE barang_id = '$barang_id'";
$hasilstok = $conn->query($querystok);
while ($brgstok = $hasilstok->fetch_assoc()) {
    $stokbarang = $brgstok['stok_barang'];
    if ($jumlah < $jumlahsebelum) {
        $selisih = $jumlahsebelum - $jumlah;
        $stokbarang = $stokbarang - $selisih;
    } else if ($jumlah > $jumlahsebelum) {
        $selisih = $jumlah - $jumlahsebelum;
        $stokbarang = $stokbarang + $selisih;
    }
}
$updatestok = "UPDATE barang SET stok_barang = '$stokbarang' WHERE barang_id = '$barang_id' ";
$conn->query($updatestok);
// 

// update jumlah bayar pembelian
$queryharga = "SELECT * FROM barang_masuk WHERE masuk_id = '$masuk_id'";
$hasilharga = $conn->query($queryharga);
while ($brgharga = $hasilharga->fetch_assoc()) {
    $hargasekarang = $brgharga['total_harga'];
    if ($harga > $hargasebelum) {
        $selisih = $harga - $hargasebelum;
        $hargasekarang = $hargasekarang + $selisih;
    } else if ($harga < $hargasebelum) {
        $selisih = $hargasebelum - $harga;
        $hargasekarang = $hargasekarang - $selisih;
    }
}
$updateharga = "UPDATE barang_masuk SET total_harga = $hargasekarang WHERE masuk_id = '$masuk_id'";
$conn->query($updateharga);
//

if (mysqli_query($conn, $query) === TRUE) {
    header("location: ../transaksi.php?sukses=sukses");
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}
