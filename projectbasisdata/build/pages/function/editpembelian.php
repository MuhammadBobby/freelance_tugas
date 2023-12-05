<?php
session_start();

// pemeriksaan session login
if (!isset($_SESSION["login"])) {
    header("Location: ../../index.php");
    exit;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="../../assets/img/logo.jpeg" />
    <title>Form Edit Data penjualan</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
</head>

<body class="bg-green-200 p-6">

    <?php
    include 'koneksi.php';
    $id = $_GET['id'];
    $data = mysqli_query($conn, "SELECT *, detail_pembelian.harga as hrg FROM pembelian, detail_pembelian, karyawan, obat, supplier WHERE detail_pembelian.id_detail_pembelian = '$id' AND detail_pembelian.no_faktur = pembelian.no_faktur AND detail_pembelian.id_obat = obat.id_obat AND
        pembelian.id_karyawan = karyawan.id_karyawan AND
        pembelian.id_supplier = supplier.id_supplier");
    while ($row = mysqli_fetch_array($data)) {
    ?>

        <div class="max-w-xl mx-auto  rounded p-8 shadow-md outline outline-2  outline-offset-2 outline-green-500 bg-slate-200">
            <h2 class="text-2xl font-bold mb-8 text-slate-600 text-center ">Edit Data pembelian</h2>
            <form action="proseseditpembelian.php" method="post" class="space-y-4 ">
                <div>
                    <label for="nofaktur" class="block text-sm font-medium text-gray-600">No Faktor</label>
                    <input type="text" id="nofaktur" name="nofaktur" value="<?php echo $row['no_faktur']; ?>" class="mt-1 p-2 w-full border rounded-md" readonly>
                    <input type="hidden" name="id" value="<?php echo $row['id_detail_pembelian']; ?>">
                </div>


                <div>
                    <label for="karyawan" class="block text-sm font-medium text-gray-600">Nama Karyawan</label>
                    <select name="karyawan" id="karyawan" class="form-control form-control-lg mt-1 p-2 w-full border rounded-md" readonly>
                        <option selected value="<?php echo $row['id_karyawan'] ?>"><?php echo $row['nama_karyawan'] ?></option>
                    </select>
                </div>
                <div>
                    <label for="supplier" class="block text-sm font-medium text-gray-600">Nama supplier</label>
                    <select name="supplier" id="supplier" class="form-control form-control-lg mt-1 p-2 w-full border rounded-md" readonly>
                        <option selected value="<?php echo $row['id_supplier'] ?>"><?php echo $row['nama_supplier'] ?></option>
                    </select>
                </div>
                <div>
                    <label for="tanggal" class="block text-sm font-medium text-gray-600">Tanggal</label>
                    <input type="date" id="tanggal" name="tanggal" value="<?php echo $row['tanggal']; ?>" class="mt-1 p-2 w-full border rounded-md" readonly>
                </div>
                <div>
                    <label for="obat" class="block text-sm font-medium text-gray-600">Obat</label>
                    <select name="obat" id="obat" class="form-control form-control-lg mt-1 p-2 w-full border rounded-md" required>
                        <option selected value="<?php echo $row['id_obat'] ?>"><?php echo $row['nama_obat'] ?></option>
                        <?php

                        $data4 = mysqli_query($conn, "SELECT * FROM  obat WHERE id_supplier = '$supplier'");
                        while ($row4 = mysqli_fetch_array($data4)) {
                        ?>
                            <option value="<?php echo $row4['id_obat'] ?>"><?php echo $row4['nama_obat'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <input type="hidden" id="jumlahsebelum" name="jumlahsebelum" value="<?php echo $row['jumlah']; ?>" class="mt-1 p-2 w-full border rounded-md">

                <div>
                    <label for="jumlah" class="block text-sm font-medium text-gray-600">jumlah</label>
                    <input type="number" id="jumlah" name="jumlah" value="<?php echo $row['jumlah']; ?>" class="mt-1 p-2 w-full border rounded-md">
                </div>

                <input type="hidden" id="hargasebelum" name="hargasebelum" value="<?php echo $row['hrg']; ?>" class="mt-1 p-2 w-full border rounded-md">

                <div>
                    <label for="harga" class="block text-sm font-medium text-gray-600">Harga Satuan</label>
                    <input type="number" id="harga" name="harga" value="<?php echo $row['harga']; ?>" class="mt-1 p-2 w-full border rounded-md" readonly>
                </div>

                <div>
                    <button type="submit" class="w-full bg-green-500 text-white p-2 rounded-md hover:bg-green-700">Simpan</button>
                </div>
            </form>
        </div>

        <p class="mt-4 text-lg text-gray-600 text-center">Tidak ingin menambahkan data? <a href="../datapembelian.php" class="text-blue-700 no-underline hover:underline">Klik kembali</a></p>
</body>

<?php
    }
?>

</html>