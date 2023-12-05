<?php 
    require "koneksi.php";

    // memasukkan data ke database
    $idpenjualan = $_POST['idpenjualan'];
    $karyawan = $_POST['karyawan'];
    $pelanggan = $_POST['pelanggan'];
    $tanggal = date('Y-m-d');
    $id_obat = $_POST['id_obat'];
    $jumlah = $_POST['jumlah'];
    $harga_satuan = $_POST['harga_satuan'];

    $harga = array(); // Deklarasi array
    // menghitung harga
    for ($j = 0; $j < count($jumlah); $j++) {
        $harga[] = $jumlah[$j] * $harga_satuan[$j];
    }
    
        // input detail & update stok
        for ($i = 0; $i < count($id_obat); $i++) {

            $stok = mysqli_query($conn,"SELECT * FROM obat WHERE id_obat = '$id_obat[$i]'");
            while ($row = mysqli_fetch_array($stok)) {
                $stokobatnow = $row['stok'];
                $stokobat = $stokobatnow - $jumlah[$i];
            }
    
            // cek jumlah harus lebih dari stok dan tidak boleh 0
            if ($stokobatnow >= $jumlah[$i]) {
                if ($jumlah[$i] > 0) {
                    mysqli_query($conn, "INSERT INTO detail_penjualan VALUES ('', '$idpenjualan', '$id_obat[$i]', '$jumlah[$i]', $harga[$i])");
                    mysqli_query($conn, "UPDATE obat SET stok = '$stokobat' WHERE id_obat = '$id_obat[$i]'");
                }
            }
        }
        $total_bayar = 0;
        foreach ($harga as $nilai) {
            $total_bayar += $nilai;
        }

        mysqli_query($conn, "INSERT INTO penjualan VALUES ('$idpenjualan', '$pelanggan', '$karyawan', '$total_bayar', '$tanggal')");
        header('location: ../datapenjualan.php?sukses=true');
        
        


?>