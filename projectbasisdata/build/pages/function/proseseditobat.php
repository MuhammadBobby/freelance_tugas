<?php 
    require "koneksi.php";

    $nama=$_POST["nama"];
    $jenis=$_POST["jenis"];
    $harga=$_POST["harga"];
    $stok=$_POST["stok"];
    $supplier=$_POST["supplier"];

    mysqli_query($conn,"update obat set nama_obat = '$nama',jenis = '$jenis',harga = $harga,stok = $stok,id_supplier = '$supplier' WHERE id_obat = '$id'");

        
    header('location: ../dataobat.php?edit=true');


?>