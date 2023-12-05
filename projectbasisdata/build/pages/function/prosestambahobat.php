<?php 
    require "koneksi.php";

    $nama=$_POST["nama"];
    $jenis=$_POST["jenis"];
    $harga=$_POST["harga"];
    $stok=$_POST["stok"];
    $supplier=$_POST["supplier"];

    mysqli_query($conn,"insert into obat (id_obat, nama_obat, jenis, harga, stok, id_supplier) values ('', '$nama', '$jenis', '$harga', '$stok', '$supplier')");

        
        header('location: ../dataobat.php?sukses=true');


?>