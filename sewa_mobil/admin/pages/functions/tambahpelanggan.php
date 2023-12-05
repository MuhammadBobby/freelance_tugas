<?php
require "functions.php";
session_start();

// pemeriksaan session login
if (!isset($_SESSION["login"])) {
    header("Location: ../../../index.php");
    exit;
}

// memanggil apabila tombol submit di klik
if (isset($_POST["submit"])) {
    $nik = htmlspecialchars($_POST["nik"]);
    $nama = htmlspecialchars($_POST["nama"]);
    $alamat = htmlspecialchars($_POST["alamat"]);
    $no_hp = htmlspecialchars($_POST["no_hp"]);
    $kode_unik = htmlspecialchars($_POST["kode_unik"]);

    // pengecekan username apakah ada di database
    $result = mysqli_query($conn, "SELECT nik FROM pelanggan WHERE nik='$nik'");

    if (mysqli_fetch_assoc($result)) {
        header("location: ?gagal=true");
        exit;
    }

    $query = "INSERT INTO pelanggan VALUES ('$nik', '$nama', '$alamat', '$no_hp','$kode_unik' )";

    if ($conn->query($query) === TRUE) {
        header("location: ../pelanggan.php?tambah=true");
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pelanggan</title>
    <link rel="icon" type="image/png" href="../../assets/img/logo.jpg" />

    <!-- icons google -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="bg-primary">
    <div class="container  bg-white  rounded-3 my-7 m-auto w-60">
        <div class="card card-plain">
            <div class="card-header pb-0 text-start">
                <h4 class="font-weight-bolder text-5xl text-primary">Tambah Data Pelanggan</h4>
            </div>

            <!-- alert -->
            <?php
            if (isset($_GET['gagal'])) : ?>
                <script>
                    alert("NIK Pelanggan Sudah Terdaftar!");
                </script>
            <?php endif; ?>


            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="nik" class="text-lg">NIK Pelanggan</label>
                        <input type="text" name="nik" class="form-control form-control-lg" placeholder="NIK Pelanggan" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="text-lg">Nama</label>
                        <input type="text" name="nama" class="form-control form-control-lg" placeholder="Nama Pelanggan" required>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="text-lg">Alamat</label>
                        <input type="text" name="alamat" class="form-control form-control-lg" placeholder="Alamat Pelanggan" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_hp" class="text-lg">Nomor HP</label>
                        <input type="text" name="no_hp" class="form-control form-control-lg" placeholder="Nomor HP Pelanggan" required>
                    </div>
                    <div class="mb-3">
                        <label for="kode_unik" class="text-lg">Kode Unik</label>
                        <input type="text" name="kode_unik" class="form-control form-control-lg" placeholder="Kode Unik Pelanggan" required>
                    </div>

                    <div class="text-center">
                        <button type="submit" name="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Tambahkan Data</button>
                    </div>
                    <p class="text-sm mt-3 mb-0">Tidak ingin menambahkan data? <a href="../pelanggan.php" class="text-dark font-weight-bolder">kembali</a></p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>