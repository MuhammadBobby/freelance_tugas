<?php 
include "koneksi.php";

$id = $_GET['id'];

mysqli_query($conn,"delete from obat where id_obat = '$id'") ;


header('location: ../dataobat.php?delete=true');
?>