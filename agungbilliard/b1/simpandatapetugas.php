<?php
// Pastikan form telah di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include koneksi database
    include 'koneksi.php';

    // Tangkap data dari form
    $nama_petugas = $_POST['nama_petugas'];

    // Query untuk menyimpan data ke database
    $query = "INSERT INTO tbl_petugas 
              VALUES ('', '$nama_petugas')";

    if ($conn->query($query) === TRUE) {
        header("location: datapetugas.php");
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }

    // Tutup koneksi database
    $conn->close();
}
