<?php
require "../admin/pages/functions/functions.php";

$id = $_GET["id"];
$query = "DELETE FROM temp WHERE id_transaksi = '$id'";

if (mysqli_query($conn, $query) === TRUE) {
    header("location: index.php?hapus=true#pemesanan");
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}
