<?php 
    require "koneksi.php";

    $id=$_POST["id"];
    $nama=$_POST["nama"];
    $alamat=$_POST["alamat"];
    $telepon=$_POST["no_telepon"];


    mysqli_query($conn,"update karyawan set nama_karyawan='$nama', alamat='$alamat', no_telepon='$telepon' where id_karyawan='$id'");

        
    header('location: ../datakaryawan.php?edit=true');
?>