<?php

// connect database
$conn = mysqli_connect("localhost", "root", "", "apotekyaya");

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}


// query (banyak untuk read)
function query($query)
{
    global $conn;
    $rows = [];
    // memilih table / query
    $data = mysqli_query($conn, $query);

    // fetch
    while ($apotek = mysqli_fetch_array($data)) {
        $rows[] = $apotek;
    }

    return $rows;
}
