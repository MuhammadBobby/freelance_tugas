<?php 
    require "koneksi.php";

    $id=$_POST["id"];
    $nama=$_POST["nama"];
    $alamat=$_POST["alamat"];
    $telepon=$_POST["no_telepon"];

    mysqli_query($conn,"insert into supplier (id_supplier, nama_supplier, alamat, no_telepon) values ('$id', '$nama', '$alamat', '$telepon')");

        
        header('location: ../datasupplier.php?sukses=true');


?>