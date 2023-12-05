<?php 
include "koneksi.php";

$id = $_GET['id'];

mysqli_query($conn,"delete from supplier where id_supplier = '$id'") ;


header('location: ../datasupplier.php?delete=true');
?>