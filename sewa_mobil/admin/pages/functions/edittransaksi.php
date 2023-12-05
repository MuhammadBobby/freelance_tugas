<?php
require "functions.php";
session_start();

// pemeriksaan session login
if (!isset($_SESSION["login"])) {
    header("Location: ../../../index.php");
    exit;
}

$id = $_GET["id"];
// query data pelanggan berdasarka id
$sql = "SELECT * FROM transaksi, pelanggan, mobil WHERE transaksi.id_transaksi = '$id' AND
        transaksi.pelanggan = pelanggan.nik AND 
        transaksi.plat_mobil = mobil.plat_nomor";
$hasil = $conn->query($sql);


// memanggil apabila tombol submit di klik
if (isset($_POST["ubah"])) {
    $id = htmlspecialchars($_POST["id"]);
    $pelanggan = htmlspecialchars($_POST["pelanggan"]);
    $plat = htmlspecialchars($_POST["plat"]);
    $tanggal = htmlspecialchars($_POST["tanggal"]);
    $lama = htmlspecialchars($_POST["lama"]);

    // mengambil data harga rental mobil untuk menghitung sesuai lama 
    $queryhrg = "SELECT * FROM mobil WHERE plat_nomor = '$plat'";
    $hasilhrg = $conn->query($queryhrg);
    $total = 0;
    while ($hrg = $hasilhrg->fetch_assoc()) {
        $harga = $hrg['harga'];
        $total = $harga * $lama;
    }


    $query = "UPDATE transaksi SET
        pelanggan = '$pelanggan',
        plat_mobil = '$plat',
        tanggal = '$tanggal',
        lama = $lama,
        total_bayar = $total
    WHERE id_transaksi= '$id'";

    if (mysqli_query($conn, $query) === TRUE) {
        header("location: ../transaksi.php?ubah=true");
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
    <title>Ubah Data Pelanggan</title>
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
                <h4 class="font-weight-bolder text-5xl text-primary">Ubah Data Pelanggan</h4>
            </div>

            <div class="card-body">
                <?php while ($mobil = $hasil->fetch_assoc()) : ?>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="id" class="text-lg">ID Transaksi</label>
                            <input type="text" name="id" class="form-control form-control-lg" value="<?= $mobil['id_transaksi'] ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="pelanggan" class="text-lg">Pelanggan</label>
                            <select name="pelanggan" id="pelanggan" class="form-control form-control-lg" required>
                                <option selected value="<?= $mobil['pelanggan'] ?>"><?= $mobil['nama_pelanggan'] ?></option>
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
                            <label for="supir" class="text-lg">Supir</label>
                            <select name="supir" id="supir" class="form-control form-control-lg" required>
                                <option selected value="<?= $mobil['supir'] ?>"><?= $mobil['nama_supir'] ?></option>
                                <?php

                                $queryspr = "SELECT * FROM supir";
                                $hasilspr = $conn->query($queryspr);
                                while ($spr = $hasilspr->fetch_assoc()) :
                                ?>
                                    <option value="<?= $spr['nik'] ?>"><?= $spr['nama_supir'] ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="plat" class="text-lg">Mobil - Plat Nomor</label>
                            <select name="plat" id="plat" class="form-control form-control-lg" required>
                                <option selected value="<?= $mobil['plat_mobil'] ?>"><?= $mobil['nama_mobil'] ?> - <?= $mobil['plat_nomor'] ?></option>
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
                            <input type="date" name="tanggal" class="form-control form-control-lg" value="<?= $mobil['tanggal'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="lama" class="text-lg">Lama Waktu (Hari)</label>
                            <input type="number" min="1" name="lama" class="form-control form-control-lg" value="<?= $mobil['lama'] ?>" required>
                        </div>

                        <div class="text-center">
                            <button type="submit" name="ubah" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Update Data</button>
                        </div>
                        <p class="text-sm mt-3 mb-0">Tidak ingin mengupdate data? <a href="../pelanggan.php" class="text-dark font-weight-bolder">kembali</a></p>
                    </form>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</body>

</html>