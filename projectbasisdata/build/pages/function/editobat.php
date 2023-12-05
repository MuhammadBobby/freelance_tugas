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
    <title>Form Edit Data Obat</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
</head>

<body class="bg-green-200 p-6">

    <?php
    include 'koneksi.php';
    $id = $_GET['id'];
    $data = mysqli_query($conn, "SELECT * FROM obat, supplier WHERE obat.id_obat = '$id' AND obat.id_supplier = supplier.id_supplier");
    while ($row = mysqli_fetch_array($data)) {
    ?>

        <div class="max-w-xl mx-auto  rounded p-8 shadow-md outline outline-2  outline-offset-2 outline-green-500 bg-slate-200">
            <h2 class="text-2xl font-bold mb-8 text-slate-600 text-center ">Edit Data Obat</h2>
            <form action="proseseditobat.php" method="post" class="space-y-4 ">
                <div>
                    <input type="hidden" id="id_obat" name="id" value="<?php echo $row['id_obat']; ?>" class="mt-1 p-2 w-full border rounded-md " readonly>
                </div>
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-600">Nama Obat</label>
                    <input type="text" id="nama_obat" name="nama" value="<?php echo $row['nama_obat']; ?>" class="mt-1 p-2 w-full border rounded-md">
                </div>
                <div>
                    <label for="jenis" class="block text-sm font-medium text-gray-600">Jenis Obat</label>
                    <select name="jenis" id="jenis" class="form-control form-control-lg mt-1 p-2 w-full border rounded-md" required>
                        <option selected value="<?php echo $row['jenis'] ?>"> <?php echo $row['jenis'] ?></option>
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
                    <input type="text" id="harga" name="harga" value="<?php echo $row['harga']; ?>" class="mt-1 p-2 w-full border rounded-md">
                </div>
                <div>
                    <label for="stok" class="block text-sm font-medium text-gray-600">Stok</label>
                    <input type="text" id="Stok" name="stok" value="<?php echo $row['stok']; ?>" class="mt-1 p-2 w-full border rounded-md">
                </div>
                <div>
                    <label for="supplier" class="block text-sm font-medium text-gray-600">Supplier</label>
                    <select name="supplier" id="supplier" class="form-control form-control-lg mt-1 p-2 w-full border rounded-md" required>
                        <option selected value="<?php echo $row['id_supplier'] ?>"><?php echo $row['nama_supplier'] ?></option>
                        <?php

                        $datasup = mysqli_query($conn, "SELECT * FROM supplier");
                        while ($rowsup = mysqli_fetch_array($datasup)) {
                        ?>
                            <option value="<?php echo $rowsup['id_supplier'] ?>"><?php echo $rowsup['nama_supplier'] ?></option>
                        <?php } ?>
                    </select>
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