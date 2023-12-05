<?php
require "function.php";

$id      = $_POST['id'];
$nama      = $_POST['nama'];
$alamat      = $_POST['alamat'];
$telp      = $_POST['telp'];


$sql = "INSERT INTO supplier VALUES ($id, '$nama','$alamat', '$telp')";

if ($conn->query($sql) === TRUE) {
    header("location: ../supplier.php?sukses=sukses");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
