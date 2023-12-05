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
    $data = mysqli_query($conn, "SELECT *, detail_penjualan.harga as hrg FROM penjualan, detail_penjualan, karyawan, obat, pelanggan WHERE detail_penjualan.id_detail_penjualan = '$id' AND detail_penjualan.id_penjualan = penjualan.id_penjualan AND detail_penjualan.id_obat = obat.id_obat AND
        penjualan.id_karyawan = karyawan.id_karyawan AND
        penjualan.id_pelanggan = pelanggan.id_pelanggan");
    while ($row = mysqli_fetch_array($data)) {
    ?>

        <div class="max-w-xl mx-auto  rounded p-8 shadow-md outline outline-2  outline-offset-2 outline-green-500 bg-slate-200">
            <h2 class="text-2xl font-bold mb-8 text-slate-600 text-center ">Edit Data penjualan</h2>
            <form action="proseseditpenjualan.php" method="post" class="space-y-4 ">


                <div>
                    <label for="idpenjualan" class="block text-sm font-medium text-gray-600">ID Penjualan</label>
                    <input type="text" id="id_penjualan" name="id_penjualan" value="<?php echo $row['id_penjualan']; ?>" class="mt-1 p-2 w-full border rounded-md" readonly>
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                </div>

                <div>
                    <label for="karyawan" class="block text-sm font-medium text-gray-600">Nama Karyawan</label>
                    <select name="karyawan" id="karyawan" class="form-control form-control-lg mt-1 p-2 w-full border rounded-md" readonly>
                        <option selected value="<?php echo $row['id_karyawan'] ?>"><?php echo $row['nama_karyawan'] ?></option>
                    </select>
                </div>

                <div>
                    <label for="pelanggan" class="block text-sm font-medium text-gray-600">Nama Pelanggan</label>
                    <select name="pelanggan" id="pelanggan" class="form-control form-control-lg mt-1 p-2 w-full border rounded-md" readonly>
                        <option selected value="<?php echo $row['id_pelanggan'] ?>"><?php echo $row['nama_pelanggan'] ?></option>
                    </select>
                </div>

                <div>
                    <label for="obat" class="block text-sm font-medium text-gray-600">Obat</label>
                    <select name="obat" id="obat" class="form-control form-control-lg mt-1 p-2 w-full border rounded-md" required>
                        <option selected value="<?php echo $row['id_obat'] ?>"><?php echo $row['nama_obat'] ?></option>
                        <?php

                        $obt = mysqli_query($conn, "SELECT * FROM obat");
                        while ($a = mysqli_fetch_array($obt)) {
                        ?>
                            <option value="<?php echo $a['id_obat'] ?>"><?php echo $a['nama_obat'] ?></option>
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
                    <input type="number" id="harga" name="harga" value="<?php echo $row['harga']; ?>" class="mt-1 p-2 w-full border rounded-md">
                </div>

                <div>
                    <button type="submit" class="w-full bg-green-500 text-white p-2 rounded-md hover:bg-green-700">Simpan</button>
                </div>
            </form>
        </div>

        <p class="mt-4 text-lg text-gray-600 text-center">Tidak ingin menambahkan data? <a href="../datapenjualan.php" class="text-blue-700 no-underline hover:underline">Klik kembali</a></p>
</body>

<?php
    }
?>

</html>