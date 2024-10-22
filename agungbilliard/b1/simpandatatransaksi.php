<?php
// Pastikan form telah di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include koneksi database
    include 'koneksi.php';

    // Tangkap data dari form
    $id_meja = $_POST['id_meja'];
    $id_pelanggan = $_POST['id_pelanggan'];
    $waktu_mulai = $_POST['waktu_mulai'];
    $waktu_selesai = $_POST['waktu_selesai'];
    $total_harga = $_POST['total_harga'];
    $status_pembayaran = $_POST['status_pembayaran'];

    // Query untuk menyimpan data ke database
    $query = "INSERT INTO tbl_transaksi (id_meja, id_pelanggan, waktu_mulai, waktu_selesai, total_harga, status_pembayaran) 
              VALUES ('$id_meja', '$id_pelanggan', '$waktu_mulai', '$waktu_selesai', '$total_harga', '$status_pembayaran')";

    if ($conn->query($query) === TRUE) {
        header("location: datatransaksi.php");
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }

    // Tutup koneksi database
    $conn->close();
}
