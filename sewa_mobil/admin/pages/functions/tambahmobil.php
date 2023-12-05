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
    $plat = htmlspecialchars($_POST["plat"]);
    $merk = htmlspecialchars($_POST["merk"]);
    $nama = htmlspecialchars($_POST["nama"]);
    $tahun = htmlspecialchars($_POST["tahun"]);
    $harga = htmlspecialchars($_POST["harga"]);

    // pengecekan username apakah ada di database
    $result = mysqli_query($conn, "SELECT plat_nomor FROM mobil WHERE plat_nomor='$plat'");

    if (mysqli_fetch_assoc($result)) {
        header("location: ?gagal=true");
        exit;
    }

    $query = "INSERT INTO mobil VALUES ('$plat', '$merk', '$nama', '$tahun', $harga)";

    if ($conn->query($query) === TRUE) {
        header("location: ../mobil.php?tambah=true");
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
    <title>Tambah Data Mobil</title>
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
                <h4 class="font-weight-bolder text-5xl text-primary">Tambah Data Mobil</h4>
            </div>

            <!-- alert -->
            <?php
            if (isset($_GET['gagal'])) : ?>
                <script>
                    alert("Plat Nomor Kendaraan Sudah Terdaftar!");
                </script>
            <?php endif; ?>


            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="plat" class="text-lg">Plat Nomor Mobil</label>
                        <input type="text" name="plat" class="form-control form-control-lg" placeholder="Plat Nomor Kendaraan" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="merk" class="text-lg">Merk</label>
                        <select name="merk" id="merk" class="form-control form-control-lg" required>
                            <option selected>--Pilih Merk--</option>
                            <?php

                            $querysup = "SELECT * FROM merk";
                            $hasil = $conn->query($querysup);
                            while ($merk = $hasil->fetch_assoc()) :
                            ?>
                                <option value="<?= $merk['id_merk'] ?>"><?= $merk['nama_merk'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="text-lg">Nama Mobil</label>
                        <input type="text" name="nama" class="form-control form-control-lg" placeholder="Nama Mobil" required>
                    </div>
                    <div class="mb-3">
                        <label for="tahun" class="text-lg">Tahun Produksi</label>
                        <input type="text" name="tahun" class="form-control form-control-lg" placeholder="Tahun Produksi" required>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="text-lg">Harga</label>
                        <input type="number" min="0" name="harga" class="form-control form-control-lg" placeholder="Harga Rental Per hari" required>
                    </div>

                    <div class="text-center">
                        <button type="submit" name="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Tambahkan Data</button>
                    </div>
                    <p class="text-sm mt-3 mb-0">Tidak ingin menambahkan data? <a href="../mobil.php" class="text-dark font-weight-bolder">kembali</a></p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>