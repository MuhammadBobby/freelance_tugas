<?php
$servername = "localhost";
$username = "root";
$password = "";
$mydb   = "dbparfumelabart";
// Create connection
$conn = new mysqli($servername, $username, $password, $mydb);

// Check connection
if ($conn->connect_error) {
    die("Koneksi Gagal " . $conn->connect_error);
}


function query($query)
{
    global $conn;
    $rows = [];
    // memilih table / query
    $result = mysqli_query($conn, $query);

    // fetch
    while ($brg = mysqli_fetch_assoc($result)) {
        $rows[] = $brg;
    }

    return $rows;
}
