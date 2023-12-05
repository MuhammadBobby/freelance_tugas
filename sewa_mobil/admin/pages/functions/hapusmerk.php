<?php
require "functions.php";

$id = $_GET["id"];
$query = "DELETE FROM merk WHERE id_merk = '$id'";

if (mysqli_query($conn, $query) === TRUE) {
    header("location: ../merk.php?hapus=true");
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}
