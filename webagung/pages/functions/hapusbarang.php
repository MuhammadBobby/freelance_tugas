<?php
require "function.php";

$id = $_GET["id"];
$query = "DELETE FROM barang WHERE barang_id = '$id'";

if (mysqli_query($conn, $query) === TRUE) {
    header("location: ../barang.php?hapus='hapus'");
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}
