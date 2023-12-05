<?php
require "function.php";

$id      = $_POST['id'];
$nama      = $_POST['nama'];
$alamat      = $_POST['alamat'];
$telp      = $_POST['telp'];

$sql = "UPDATE supplier SET 
nama_supplier='$nama', alamat_supplier='$alamat',telepon_supplier='$telp' WHERE id_supplier='$id'";

if ($conn->query($sql) === TRUE) {
    header("location: ../supplier.php?sukses=sukses");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
