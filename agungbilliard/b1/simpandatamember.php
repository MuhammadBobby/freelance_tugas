<?php
// Pastikan form telah di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include koneksi database
    include 'koneksi.php';

    // Tangkap data dari form
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $alamat_pelanggan = $_POST['alamat_pelanggan'];
    $telepon_pelanggan = $_POST['telepon_pelanggan'];

    // Query untuk menyimpan data ke database
    $query = "INSERT INTO tbl_pelanggan 
              VALUES ('', '$nama_pelanggan','$alamat_pelanggan','$telepon_pelanggan')";

    if ($conn->query($query) === TRUE) {
        header("location: datamember.php");
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }

    // Tutup koneksi database
    $conn->close();
}
