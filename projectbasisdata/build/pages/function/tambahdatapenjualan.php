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
    <title>Form Tambah Data Penjualan</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
</head>

<body class="bg-green-200  p-6">
    <div class="max-w-xl mx-auto  rounded p-8 shadow-md outline outline-2  outline-offset-2 outline-green-500 bg-slate-200">
        <h2 class="text-2xl font-bold mb-3 text-slate-600 text-center ">Tambah Data penjualan</h2>
        <h6 class="text-sm  mb-5 text-slate-500 ">*harap isi data penjualan sesuai data yang ada</h6>
        <form action="prosestambahpenjualan.php" method="post" class="space-y-4 ">
            <div>
                <label for="idpenjualan" class="block text-sm font-medium text-gray-600">ID Penjualan</label>
                <input type="text" id="id" name="idpenjualan" placeholder="masukkan id penjualan" class="mt-1 p-2 w-full border rounded-md " required>
            </div>
            <div>
                <label for="karyawan" class="block text-sm font-medium text-gray-600">Nama Karyawan</label>
                <select name="karyawan" id="karyawan" class="form-control form-control-lg mt-1 p-2 w-full border rounded-md" required>
                    <option selected>--Pilih Karyawan--</option>
                    <?php
                    include "koneksi.php";

                    $data = mysqli_query($conn, "SELECT * FROM karyawan");
                    while ($row = mysqli_fetch_array($data)) {
                    ?>
                        <option value="<?php echo $row['id_karyawan'] ?>"><?php echo $row['nama_karyawan'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div>
                <label for="pelanggan" class="block text-sm font-medium text-gray-600">Nama Pelanggan</label>
                <select name="pelanggan" id="pelanggan" class="form-control form-control-lg mt-1 p-2 w-full border rounded-md" required>
                    <option selected>--Pilih Pelanggan--</option>
                    <?php

                    $dataplg = mysqli_query($conn, "SELECT * FROM pelanggan");
                    while ($rowplg = mysqli_fetch_array($dataplg)) {
                    ?>
                        <option value="<?php echo $rowplg['id_pelanggan'] ?>"><?php echo $rowplg['nama_pelanggan'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full table-auto border-collapse border border-gray-200">
                    <thead>
                        <tr class="bg-gray-300">
                            <th class="py-2 px-4 border border-gray-400">NO</th>
                            <th class="py-2 px-4 border border-gray-400">ID Obat</th>
                            <th class="py-2 px-4 border border-gray-400">Nama Obat</th>
                            <th class="py-2 px-4 border border-gray-400">Jumlah</th>
                            <th class="py-2 px-4 border border-gray-400">Harga Satuan</th>
                        </tr>
                    </thead>
                    <tbody id="showdata">
                        <?php
                        $data2 = mysqli_query($conn, "SELECT * FROM obat");
                        $num = 1;
                        $obt = '';
                        while ($row2 = mysqli_fetch_array($data2)) {
                            $obt .= '<tr class="bg-white">
                                <td class="py-2 px-4 border border-gray-200">' . $num++ . '</td>

                                <td class="py-2 px-4 border border-gray-200">
                                    <input type="text" name="id_obat[]" value=' . $row2['id_obat'] . ' class="form-control  bg-gray-100" readonly> </td>

                                <td class="py-2 px-4 border border-gray-200">' . $row2['nama_obat'] . '</td>

                                <td class="py-2 px-4 border border-gray-200">
                                    <input type="number" min="0" name="jumlah[]" class="form-control bg-gray-100" value="0" required></td>

                                <td class="py-2 px-4 border border-gray-200">
                                    <input type="number" name="harga_satuan[]" class="form-control bg-gray-100" value=' . $row2['harga'] . ' readonly></td>
                                    </tr>';
                        }
                        echo $obt;
                        ?>
                    </tbody>
                </table>
            </div>


            <div>
                <button type="submit" class="w-full bg-green-500 text-white p-2 rounded-md hover:bg-green-700">Simpan</button>
            </div>
        </form>
    </div>

    <p class="mt-4 text-lg text-gray-600 text-center">Tidak ingin menambahkan data? <a href="../datapenjualan.php" class="text-blue-700 no-underline hover:underline">Klik kembali</a></p>
</body>

</html>