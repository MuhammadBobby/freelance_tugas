<?php
require "function.php";

$id      = $_POST['id'];
$nama      = $_POST['nama'];
$stok      = $_POST['stok'];
$harga      = $_POST['harga'];
$supplier      = $_POST['supplier'];


$sql = "INSERT INTO barang VALUES ($id, '$nama',$harga, $stok, '$supplier')";

if ($conn->query($sql) === TRUE) {
    header("location: ../barang.php?sukses=sukses");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
