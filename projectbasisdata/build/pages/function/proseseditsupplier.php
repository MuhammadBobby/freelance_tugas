<?php 
    require "koneksi.php";

    $id=$_POST["id"];
    $nama=$_POST["nama"];
    $alamat=$_POST["alamat"];
    $telepon=$_POST["no_telepon"];


    mysqli_query($conn,"update supplier set nama_supplier='$nama', alamat='$alamat', no_telepon='$telepon' where id_supplier='$id'");

        
    header('location: ../datasupplier.php?edit=true');
?>