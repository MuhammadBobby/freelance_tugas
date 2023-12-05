<?php 
    require "koneksi.php";

    $id=$_POST["id"];
    $nama=$_POST["nama"];
    $alamat=$_POST["alamat"];
    $jenkel=$_POST["jenis_kelamin"];
    $pekerjaan=$_POST["pekerjaan"];
    $usia=$_POST["usia"];

    mysqli_query($conn,"insert into pelanggan (id_pelanggan, nama_pelanggan, alamat, jenis_kelamin, pekerjaan, usia) values ('$id', '$nama', '$alamat', '$jenkel', '$pekerjaan', $usia)");

        
        header('location: ../datapelanggan.php?sukses=true');


?>