<?php
require "functions.php";
session_start();

// pemeriksaan session login
if (!isset($_SESSION["login"])) {
    header("Location: ../../../index.php");
    exit;
}

$id = $_GET["id"];
// query data merk berdasarkan id
$sql = "SELECT * FROM  merk WHERE id_merk = '$id'";
$hasil = $conn->query($sql);


// memanggil apabila tombol submit di klik
if (isset($_POST["ubah"])) {
    $merk = htmlspecialchars($_POST["merk"]);

    $query = "UPDATE merk SET
        nama_merk = '$merk'
    WHERE id_merk = '$id'";

    if (mysqli_query($conn, $query) === TRUE) {
        header("location: ../merk.php?ubah=true");
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
    <title>Ubah Data Mobil</title>
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
                <h4 class="font-weight-bolder text-5xl text-primary">Ubah Data Mobil</h4>
            </div>

            <div class="card-body">
                <?php while ($mobil = $hasil->fetch_assoc()) : ?>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="merk" class="text-lg">Nama Merk</label>
                            <input type="text" name="merk" class="form-control form-control-lg" value="<?= $mobil['nama_merk'] ?>" required>
                        </div>


                        <div class="text-center">
                            <button type="submit" name="ubah" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Update Data</button>
                        </div>
                        <p class="text-sm mt-3 mb-0">Tidak ingin Mengubah data? <a href="../merk.php" class="text-dark font-weight-bolder">kembali</a></p>
                    </form>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</body>

</html>