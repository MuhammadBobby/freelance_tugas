<?php
require "functions.php";

$plat = $_GET["plat"];
$query = "DELETE FROM mobil WHERE plat_nomor = '$plat'";

if (mysqli_query($conn, $query) === TRUE) {
    header("location: ../mobil.php?hapus=true");
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}
