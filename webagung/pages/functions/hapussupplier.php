<?php
require "function.php";

$id = $_GET["id"];
$query = "DELETE FROM supplier WHERE id_supplier = '$id'";

if (mysqli_query($conn, $query) === TRUE) {
    header("location: ../supplier.php?hapus='hapus'");
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}
