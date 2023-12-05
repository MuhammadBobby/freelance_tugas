<?php
require "functions.php";

$id = $_GET["id"];
$query = "DELETE FROM transaksi WHERE id_transaksi = '$id'";

if (mysqli_query($conn, $query) === TRUE) {
    header("location: ../transaksi.php?hapus=true");
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}
