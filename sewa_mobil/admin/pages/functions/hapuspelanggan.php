<?php
require "functions.php";

$nik = $_GET["nik"];
$query = "DELETE FROM pelanggan WHERE nik = '$nik'";

if (mysqli_query($conn, $query) === TRUE) {
    header("location: ../pelanggan.php?hapus=true");
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}
