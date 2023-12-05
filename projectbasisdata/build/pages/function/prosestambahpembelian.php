<?php
require "koneksi.php";


// memanggil apabila tombol submit di klik
    $nofaktur = $_POST['nofaktur'];
    $tanggal = $_POST['tanggal'];
    $karyawan = $_POST['karyawan'];
    $supplier = $_POST['supplier'];
    $id_obat = $_POST['id_obat'];
    $jumlah = $_POST['jumlah'];
    $harga_satuan = $_POST['harga_satuan'];


    $harga = array(); // Deklarasi array
    // menghitung harga
    for ($j = 0; $j < count($jumlah); $j++) {
        $harga[] = $jumlah[$j] * $harga_satuan[$j];
    }

    $jumlah_obat = count($id_obat);
    // input detail & update stok
    for ($i = 0; $i < $jumlah_obat; $i++) {


        $stok = mysqli_query($conn,"SELECT * FROM obat WHERE id_obat = '$id_obat[$i]'");
        while ($row = mysqli_fetch_array($stok)) {
            $stokobat = $row['stok'];
            $stokobatnew = $stokobat + $jumlah[$i];
        }


        // hanya memasukkan jumlah yang lebih dari 0
        if ($jumlah[$i] > 0) {

            mysqli_query($conn, "INSERT INTO detail_pembelian VALUES ('', '$nofaktur', '$id_obat[$i]', '$jumlah[$i]', $harga[$i])");
            mysqli_query($conn, "UPDATE obat SET stok = '$stokobatnew' WHERE id_obat = '$id_obat[$i]'");
        }
    }

    $total_bayar = 0;
    foreach ($harga as $nilai) {
        $total_bayar += $nilai;
    }

    mysqli_query($conn, "INSERT INTO pembelian VALUES ('$nofaktur', '$tanggal', '$karyawan', '$supplier', '$total_bayar')");
    header('location: ../datapembelian.php?sukses=true');

?>