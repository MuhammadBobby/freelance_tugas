<?php
// Pastikan form telah di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include koneksi database
    include 'koneksi.php';

    // Tangkap data dari form
    $nama_meja = $_POST['nama_meja'];
    $status_meja = $_POST['status_meja'];

    // Query untuk menyimpan data ke database
    $query = "INSERT INTO tbl_meja 
              VALUES ('', '$nama_meja', '$status_meja')";

    if ($conn->query($query) === TRUE) {
        header("location: datameja.php");
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }

    // Tutup koneksi database
    $conn->close();
}
