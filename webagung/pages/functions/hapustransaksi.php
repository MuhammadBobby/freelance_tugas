<?php
require "function.php";

$id = $_GET["id"];
$masuk_id = $_GET["masuk"];
$barang_id = $_GET["barang"];

$tambahstok = "SELECT * FROM barang_masuk_detail, barang WHERE detail_id = '$id' and barang_masuk_detail.barang_id = barang.barang_id";
$hasilstok = $conn->query($tambahstok);
$stokbarang = 0;
while ($brgstok = $hasilstok->fetch_assoc()) {
    $stokbarang = $brgstok['stok_barang'];
    $jumlahbarang = $brgstok['jumlah'];
    $stokbarang = $stokbarang - $jumlahbarang;
}
$updatestok = "UPDATE barang SET stok_barang = '$stokbarang' WHERE barang_id = '$barang_id'";
$conn->query($updatestok);

// mengurangi di barang masuk
$queryharga = "SELECT * FROM barang_masuk WHERE masuk_id = '$masuk_id'";
$querydetail = "SELECT * FROM barang_masuk_detail WHERE detail_id = '$id'";
$hasilharga = $conn->query($queryharga);
$brgdetail = query($querydetail)[0];

while ($brgharga = $hasilharga->fetch_assoc()) {
    $hargasekarang = $brgharga['total_harga'];
    $hargahapus = $brgdetail['harga'];

    $harga = $hargasekarang - $hargahapus;
}
$updateharga = "UPDATE barang_masuk SET total_harga = $harga WHERE masuk_id = '$masuk_id'";
$conn->query($updateharga);
//



$query = "DELETE FROM barang_masuk_detail WHERE detail_id = '$id'";

if (mysqli_query($conn, $query) === TRUE) {
    header("location: ../transaksi.php?hapus=hapus");
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}
