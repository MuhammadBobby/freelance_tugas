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
    <title>Form Tambah Data Obat</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
</head>

<body class="bg-green-200  p-6">
    <div class="max-w-xl mx-auto  rounded p-8 shadow-md outline outline-2  outline-offset-2 outline-green-500 bg-slate-200">
        <h2 class="text-2xl font-bold mb-3 text-slate-600 text-center ">Tambah Data Obat</h2>
        <h6 class="text-sm  mb-5 text-slate-500 ">*harap isi data obat sesuai data yang ada</h6>
        <form action="prosestambahobat.php" method="post" class="space-y-4 ">
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-600">Nama Obat</label>
                <input type="text" id="nama_obat" name="nama" placeholder="masukkan nama obat" class="mt-1 p-2 w-full border rounded-md " required>
            </div>
            <div>
                <label for="jenis" class="block text-sm font-medium text-gray-600">Jenis Obat</label>
                <select name="jenis" id="jenis" class="form-control form-control-lg mt-1 p-2 w-full border rounded-md" required>
                    <option selected>--Pilih Jenis--</option>
                    <option value="tablet">Tablet</option>
                    <option value="Kapsul">Kapsul</option>
                    <option value="cair">Cair</option>
                    <option value="oles">Oles</option>
                    <option value="tetes">Tetes</option>
                    <option value="alat">Peralatan Medis</option>
                    <option value="lain">Lain-lain</option>
                </select>
            </div>
            <div>
                <label for="harga" class="block text-sm font-medium text-gray-600">Harga</label>
                <input type="number" id="harga" name="harga" placeholder="masukkan harga obat" min="0" class="mt-1 p-2 w-full border rounded-md">
            </div>
            <div>
                <label for="stok" class="block text-sm font-medium text-gray-600">stok</label>
                <input type="number" id="stok" name="stok" placeholder="masukkan stok obat" min="0" class="mt-1 p-2 w-full border rounded-md">
            </div>
            <div>
                <label for="supplier" class="block text-sm font-medium text-gray-600">Supplier</label>
                <select name="supplier" id="supplier" class="form-control form-control-lg mt-1 p-2 w-full border rounded-md" required>
                    <option selected>--Pilih suplier--</option>
                    <?php
                    include "koneksi.php";

                    $data = mysqli_query($conn, "SELECT * FROM supplier");
                    while ($row = mysqli_fetch_array($data)) {
                    ?>
                        <option value="<?php echo $row['id_supplier'] ?>"><?php echo $row['nama_supplier'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div>
                <button type="submit" class="w-full bg-green-500 text-white p-2 rounded-md hover:bg-green-700">Simpan</button>
            </div>
        </form>
    </div>

    <p class="mt-4 text-lg text-gray-600 text-center">Tidak ingin menambahkan data? <a href="../dataobat.php" class="text-blue-700 no-underline hover:underline">Klik kembali</a></p>
</body>

</html>