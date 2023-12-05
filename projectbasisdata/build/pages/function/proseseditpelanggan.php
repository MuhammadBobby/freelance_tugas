<?php 
    require "koneksi.php";

    $id=$_POST["id"];
    $nama=$_POST["nama"];
    $alamat=$_POST["alamat"];
    $jenkel=$_POST["jenis_kelamin"];
    $pekerjaan=$_POST["pekerjaan"];
    $usia=$_POST["usia"];


    mysqli_query($conn,"update pelanggan set nama_pelanggan='$nama', alamat='$alamat', jenis_kelamin='$jenkel', pekerjaan='$pekerjaan', usia='$usia' where id_pelanggan='$id'");

        
    header('location: ../datapelanggan.php?edit=true');
?>