<?php
require "function.php";

$id      = $_POST['id'];
$nama      = $_POST['nama'];
$harga      = $_POST['harga'];
$stok      = $_POST['stok'];
$supplier      = $_POST['supplier'];

$sql = "UPDATE barang SET 
nama_barang='$nama', harga_barang=$harga,stok_barang=$stok, supplier='$supplier' WHERE barang_id='$id'";

if ($conn->query($sql) === TRUE) {
    header("location: ../barang.php?sukses=sukses");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
