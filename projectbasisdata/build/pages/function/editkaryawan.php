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
    <title>Form Edit Data Karyawan</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
</head>

<body class="bg-green-200 p-6">

    <?php
    include 'koneksi.php';
    $id = $_GET['id'];
    $data = mysqli_query($conn, "select * from karyawan where id_karyawan= '$id'");
    while ($row = mysqli_fetch_array($data)) {
    ?>

        <div class="max-w-xl mx-auto  rounded p-8 shadow-md outline outline-2  outline-offset-2 outline-green-500 bg-slate-200">
            <h2 class="text-2xl font-bold mb-8 text-slate-600 text-center ">Edit Data Karyawan</h2>
            <form action="proseseditkaryawan.php" method="post" class="space-y-4 ">
                <div>
                    <label for="id" class="block text-sm font-medium text-gray-600">ID Karyawan</label>
                    <input type="text" id="id_karyawan" name="id" value="<?php echo $row['id_karyawan']; ?>" class="mt-1 p-2 w-full border rounded-md " readonly>
                </div>
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-600">Nama Karyawan</label>
                    <input type="text" id="nama_Karyawan" name="nama" value="<?php echo $row['nama_karyawan']; ?>" class="mt-1 p-2 w-full border rounded-md">
                </div>
                <div>
                    <label for="alamat" class="block text-sm font-medium text-gray-600">Alamat Karyawan</label>
                    <textarea id="alamat_karyawan" name="alamat" value="<?php echo $row['id_karyawan']; ?>" class="mt-1 p-2 w-full border rounded-md"><?php echo $row['alamat']; ?></textarea>
                </div>

                <div>
                    <label for="pekerjaan" class="block text-sm font-medium text-gray-600">Pekerjaan Pelanggan</label>
                    <input type="text" id="no_telepon" name="no_telepon" value="<?php echo $row['no_telepon']; ?>" class="mt-1 p-2 w-full border rounded-md">
                </div>
                <div>
                    <button type="submit" class="w-full bg-green-500 text-white p-2 rounded-md hover:bg-green-700">Simpan</button>
                </div>
            </form>
        </div>

        <p class="mt-4 text-lg text-gray-600 text-center">Tidak ingin menambahkan data? <a href="../datakaryawan.php" class="text-blue-700 no-underline hover:underline">Klik kembali</a></p>
</body>

<?php
    }
?>

</html>