<?php
session_start();
require "admin/pages/functions/functions.php";


if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sewa = query("SELECT * FROM pelanggan WHERE nik = '$username'")[0];

    if ($username == "Admin123" && $password == "123admin") {
        $_SESSION["login"] = true;

        // cek cookie
        if (isset($_POST["rememberMe"])) {
            // id
            setcookie("us", $username, time() + 60 * 5);
            // username
            setcookie("pw", hash("sha256", $password), time() + 60 * 5);
        }

        header("Location: admin/pages/mobil.php");
        exit;
    } else if ($sewa['nik'] == $username && $sewa['kode_unik'] == $password) {
        $_SESSION["login"] = true;
        $_SESSION["pelanggan"] = $username;

        // cek cookie
        if (isset($_POST["rememberMe"])) {
            // id
            setcookie("us", $username, time() + 60 * 5);
            // username
            setcookie("pw", hash("sha256", $password), time() + 60 * 5);
        }

        header("Location: user/index.php");
        exit;
    }

    header("Location: ?salah=true");
    exit;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="apple-touch-icon" sizes="76x76" href="admin/assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="admin/assets/img/logo.jpg" />
    <title>Login Sewa Mobil</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="admin/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="admin/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="admin/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="admin/assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="">
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                    <div class="container-fluid pe-0">
                        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3" href="pages/dashboard.html">Dashboard Sewa Mobil</a>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
        </div>
    </div>
    <main class="main-content mt-0">
        <section>
            <div class="page-header min-vh-75">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                            <div class="card card-plain mt-8">
                                <div class="card-header pb-0 text-left bg-transparent">
                                    <h3 class="font-weight-bolder text-info text-gradient">Selamat Datang</h3>
                                    <p class="mb-0">Masukkan Username dan Password.</p>
                                </div>
                                <div class="card-body">
                                    <form action="" method="post">
                                        <label>Username / NIK</label>
                                        <div class="mb-3">
                                            <input type="text" name="username" class="form-control" placeholder="Masukkan Username" />
                                        </div>
                                        <label>Password / Kode Unik</label>
                                        <div class="mb-3">
                                            <input type="password" name="password" class="form-control" placeholder="Masukkan Password" />
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="rememberMe" type="checkbox" id="rememberMe" checked="" />
                                            <label class="form-check-label" for="rememberMe">Remember me</label>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" name="login" class="btn bg-gradient-info w-100 mt-4 mb-0">Login</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-4 text-sm mx-auto">
                                        Belum punya akun?
                                    </p>
                                    <a href="register.php">Register</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image: url('admin/assets/img/logo-2.jpg');"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    <footer class="footer py-5">
        <div class="container">
            <div class="row">
                <div class="col-8 mx-auto text-center mt-1">
                    <p class="mb-0 text-secondary">
                        Copyright ©
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        Create with Heart.
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    <!--   Core JS Files   -->
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
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
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>


    <!-- alert -->
    <?php
    if (isset($_GET['gagal'])) : ?>
        <script>
            alert("Username atau Password Salah. Silahkan Masukkan Username dan Password yang Benar !");
        </script>
    <?php endif; ?>


    <?php
    if (isset($_GET['tambah'])) : ?>
        <script>
            alert("Data Berhasil Direkam");
        </script>
    <?php endif; ?>
</body>

</html>