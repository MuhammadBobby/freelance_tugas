<?php
session_start();
require "admin/pages/functions/functions.php";

// pemeriksaan session login
if (isset($_SESSION["login"])) {
    header("Location: admin/pages/kamar.php");
    exit;
}

// memanggil apabila tombol submit di klik
if (isset($_POST["register"])) {
    $nik = htmlspecialchars($_POST["nik"]);
    $nama = htmlspecialchars($_POST["nama"]);
    $alamat = htmlspecialchars($_POST["alamat"]);
    $no_hp = htmlspecialchars($_POST["no_hp"]);
    $kode = htmlspecialchars($_POST["kode"]);

    // pengecekan id apakah ada di database
    $result = mysqli_query($conn, "SELECT nik FROM penyewa WHERE nik='$nik'");

    if (mysqli_fetch_assoc($result)) {
        header("location: ?gagal=true");
        exit;
    }

    $query = "INSERT INTO penyewa VALUES ('$nik', '$nama', '$alamat', '$no_hp', '$kode' )";

    if ($conn->query($query) === TRUE) {
        header("location: index.php");
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="apple-touch-icon" sizes="76x76" href="admin/assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="admin/assets/img/logo-kost.jpg" />
    <title>Register</title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="admin/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="admin/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="admin/assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="bg-gray-200">
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg blur border-radius-xl top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                    <div class="container-fluid ps-2 pe-0">
                        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3" href=""> Dashboard Kost Tobing </a>
                        <div class="collapse navbar-collapse" id="navigation">
                        </div>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
        </div>
    </div>
    <main class="main-content">
        <div class="page-header align-items-start min-vh-100" style="background-image: url(admin/assets/img/bg-Register.jpeg)">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container my-auto">
                <div class="row" style="margin-top: 100px">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Register</h4>
                                    <div class="row mt-3">
                                        <p class="text-center ms-auto text-white">
                                            Halo, Selamat Bergabung
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="" method="post" class="text-start">
                                    <div class="mb-3">
                                        <label for="nik" class="text-lg text-dark text-bold">NIK</label>
                                        <input type="text" name="nik" style="border: 2px solid gray;" class="form-control form-control-lg" placeholder="NIK Penyewa" required autocomplete="off">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama" class="text-lg text-dark text-bold">Nama</label>
                                        <input type="text" name="nama" style="border: 2px solid gray;" class="form-control form-control-lg" placeholder="Nama Penyewa" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat" class="text-lg text-dark text-bold">Alamat (KTP)</label>
                                        <input type="text" name="alamat" style="border: 2px solid gray;" class="form-control form-control-lg" placeholder="Alamat Asal Penyewa">
                                    </div>
                                    <div class="mb-3">
                                        <label for="no_hp" class="text-lg text-dark text-bold">Nomor HP</label>
                                        <input type="text" name="no_hp" style="border: 2px solid gray;" class="form-control form-control-lg" placeholder="Nomor HP Penyewa">
                                    </div>
                                    <div class="mb-3">
                                        <label for="kode" class="text-lg text-dark text-bold">Kode Sewa</label>
                                        <input type="text" name="kode" style="border: 2px solid gray;" class="form-control form-control-lg" placeholder="Masukkan Kode Sewa yang diberikan Pemilik Kost">
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" name="register" class="btn bg-gradient-primary w-100 my-4 mb-2">Register</button>
                                    </div>
                                    <p class="mt-4 text-sm text-center">
                                        Sudahb memiliki akun?
                                        <a href="index.php" class="text-primary text-gradient font-weight-bold">Login</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer position-absolute bottom-2 py-2 w-100">
                <div class="container">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-12 col-md-6 my-auto">
                            <div class="copyright text-center text-sm text-white text-lg-start">
                                ©
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                , made with <i class="fa fa-heart" aria-hidden="true"></i> by
                                <a href="" class="font-weight-bold text-white" target="_blank">Kost Tobing</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </main>

    <!-- alert -->
    <?php
    if (isset($_GET['gagal'])) : ?>
        <script>
            alert("NIK Penyewa Sudah Terdaftar!");
        </script>
    <?php endif; ?>


    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf("Win") > -1;
        if (win && document.querySelector("#sidenav-scrollbar")) {
            var options = {
                damping: "0.5",
            };
            Scrollbar.init(document.querySelector("#sidenav-scrollbar"), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>