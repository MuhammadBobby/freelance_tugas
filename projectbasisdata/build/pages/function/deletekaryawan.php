<?php 
include "koneksi.php";

$id = $_GET['id'];

mysqli_query($conn,"delete from karyawan where id_karyawan = '$id'") ;


header('location: ../datakaryawan.php?delete=true');
?>