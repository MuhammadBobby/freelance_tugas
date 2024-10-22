<?php
$servername = "localhost";
$username = 'root';
$password = '';
$mydb   = "dbbilliard";
// Create connection
$conn = new mysqli($servername, $username, $password, $mydb);

// Check connection
if ($conn->connect_error) {
    die("Koneksi Gagal " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <title>
        Agung Billiard - Pemrograman Web
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- CSS Files -->
    <link id="pagestyle" href="assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-200">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
                <img src="assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold text-white">Agung Billiard</span>
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white " href="index.php">
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="infodatatransaksi.php">
                        <span class="nav-link-text ms-1">Data Transaksi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="datameja.php">
                        <span class="nav-link-text ms-1">Data Meja</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white active bg-gradient-primary" href="datamember.php">
                        <span class="nav-link-text ms-1">Data Member</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="datapetugas.php">
                        <span class="nav-link-text ms-1">Data Petugas</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="logout.php">
                        <span class="nav-link-text ms-1">Log Out</span>
                    </a>
                </li>
            </ul>
        </div>
        </div>
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <h3 class="font-weight-bolder mb-0">Member</h3>
            </div>
        </nav>
        <!-- End Navbar -->
        <!-- Form untuk input data member -->
        <form action="simpandatamember.php" method="post">
            <!-- <label for="id_meja">ID Meja:</label><br> -->

            <label for="nama_pelanggan">nama pelanggan:</label><br>
            <input type="text" name="nama_pelanggan" required><br>

            <label for="alamat_pelanggan">alamat pelanggan:</label><br>
            <input type="text" name="alamat_pelanggan" required><br>

            <label for="telepon_pelanggan">telepon pelanggan:</label><br>
            <input type="text" name="telepon_pelanggan" required><br>


            <button type="submit">Tambah Data Member</button>
        </form>
    </main>
    <!--   Core JS Files   -->
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="assets/js/plugins/chartjs.min.js"></script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>

</html>