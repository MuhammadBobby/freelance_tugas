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
    $id = htmlspecialchars($_POST["id"]);
    $pelanggan = htmlspecialchars($_POST["pelanggan"]);
    $plat = htmlspecialchars($_POST["plat"]);
    $tanggal = htmlspecialchars($_POST["tanggal"]);
    $lama = htmlspecialchars($_POST["lama"]);

    // mengambil data harga rental mobil untuk menghitung sesuai lama 
    $queryhrg = "SELECT * FROM mobil WHERE plat_nomor = '$plat'";
    $hasilhrg = $conn->query($queryhrg);
    while ($hrg = $hasilhrg->fetch_assoc()) {
        $harga = $hrg['harga'];
        $total = $harga * $lama;
    }

    // pengecekan username apakah ada di database
    $result = mysqli_query($conn, "SELECT id_transaksi FROM transaksi WHERE id_transaksi='$id'");

    if (mysqli_fetch_assoc($result)) {
        header("location: ?gagal=true");
        exit;
    }

    $query = "INSERT INTO transaksi  (id_transaksi, pelanggan, plat_mobil, tanggal, lama, total_bayar)  VALUES ('$id', '$pelanggan', '$plat', '$tanggal' , $lama, $total )";

    if ($conn->query($query) === TRUE) {
        header("location: ../transaksi.php?tambah=true");
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
    <title>Tambah Transaksi Mobil</title>
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
                <h4 class="font-weight-bolder text-5xl text-primary">Tambah Transaksi Mobil</h4>
            </div>

            <!-- alert -->
            <?php
            if (isset($_GET['gagal'])) : ?>
                <script>
                    alert("ID Transaksi Sudah Terdaftar!");
                </script>
            <?php endif; ?>


            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="id" class="text-lg">ID Transaksi</label>
                        <input type="text" name="id" class="form-control form-control-lg" placeholder="ID Transkasi" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="pelanggan" class="text-lg">Pelanggan</label>
                        <select name="pelanggan" id="pelanggan" class="form-control form-control-lg" required>
                            <option selected>--Pilih Pelanggan--</option>
                            <?php

                            $queryplg = "SELECT * FROM pelanggan";
                            $hasilplg = $conn->query($queryplg);
                            while ($plg = $hasilplg->fetch_assoc()) :
                            ?>
                                <option value="<?= $plg['nik'] ?>"><?= $plg['nama_pelanggan'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="plat" class="text-lg">Mobil - Plat Nomor</label>
                        <select name="plat" id="plat" class="form-control form-control-lg" required>
                            <option selected>--Pilih Mobil--</option>
                            <?php

                            $querymbl = "SELECT * FROM mobil";
                            $hasilmbl = $conn->query($querymbl);
                            while ($mbl = $hasilmbl->fetch_assoc()) :
                            ?>
                                <option value="<?= $mbl['plat_nomor'] ?>"><?= $mbl['nama_mobil'] ?> - <?= $mbl['plat_nomor'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal" class="text-lg">Tanggal Pemesanan</label>
                        <input type="date" name="tanggal" class="form-control form-control-lg" placeholder="Tanggal Rental Mobil" required>
                    </div>

                    <div class="mb-3">
                        <label for="lama" class="text-lg">Lama Waktu (hari)</label>
                        <input type="number" min="1" name="lama" class="form-control form-control-lg" value="1" required>
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