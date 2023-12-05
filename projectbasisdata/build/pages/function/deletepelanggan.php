<?php 
include "koneksi.php";

$id = $_GET['id'];

mysqli_query($conn,"delete from pelanggan where id_pelanggan = '$id'") ;


header('location: ../datapelanggan.php?delete=true');
