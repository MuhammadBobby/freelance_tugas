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
        <h2 class="text-2xl font-bold mb-3 text-slate-600 text-center ">Tambah Data pembelian</h2>
        <h6 class="text-sm  mb-5 text-slate-500 ">*harap isi data pembelian sesuai data yang ada</h6>
        <form action="prosestambahpembelian.php" method="post" class="space-y-4 ">
            <div>
                <label for="no_faktur" class="block text-sm font-medium text-gray-600">No Faktur
                    <input type="text" id="id" name="nofaktur" placeholder="masukkan id pembelian" class="mt-1 p-2 w-full border rounded-md " required>
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
                <label for="supplier" class="block text-sm font-medium text-gray-600">Nama supplier</label>
                <select name="supplier" id="supplier" class="form-control form-control-lg mt-1 p-2 w-full border rounded-md" required>
                    <option selected>--Pilih supplier--</option>
                    <?php

                    $data1 = mysqli_query($conn, "SELECT * FROM supplier");
                    while ($row1 = mysqli_fetch_array($data1)) {
                    ?>
                        <option value="<?php echo $row1['id_supplier'] ?>"><?php echo $row1['nama_supplier'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div>
                <label for="tanggal" class="block text-sm font-medium text-gray-600">Tanggal
                    <input type="date" id="id" name="tanggal" placeholder="masukkan id pembelian" class="mt-1 p-2 w-full border rounded-md " required>
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
                    <tbody id="tampilkandata">

                    </tbody>
                </table>
            </div>


            <div>
                <button type="submit" class="w-full bg-green-500 text-white p-2 rounded-md hover:bg-green-700">Simpan</button>
            </div>
        </form>
    </div>

    <p class="mt-4 text-lg text-gray-600 text-center">Tidak ingin menambahkan data? <a href="../datapembelian.php" class="text-blue-700 no-underline hover:underline">Klik kembali</a></p>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#supplier").change(function() {
                var supplierid = $(this).val();

                if (supplierid != "") {
                    $.ajax({
                        type: "get",
                        url: "detailpembelian.php",
                        data: {
                            supplier: supplierid
                        },
                        cache: false,
                        success: function(response) {
                            $('#tampilkandata').html(response);
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr);
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>