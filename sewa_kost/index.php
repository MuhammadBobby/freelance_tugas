<?php
session_start();
require "admin/pages/functions/functions.php";


if (isset($_POST["login"])) {
  $nik = $_POST["nik"];
  $kode = $_POST["kode"];

  $sewa = query("SELECT * FROM penyewa WHERE nik = '$nik'")[0];

  if ($nik == "kosttobing" && $kode == "12345") {
    $_SESSION["login"] = true;

    // cek cookie
    if (isset($_POST["rememberMe"])) {
      // nik
      setcookie("nk", $nik, time() + 60 * 5);
      // kode
      setcookie("kd", hash("sha256", $kode), time() + 60 * 5);
    }

    header("Location: admin/pages/kamar.php");
    exit;
  } else if ($sewa['nik'] == $nik && $sewa['kode_sewa'] == $kode) {
    $_SESSION["login"] = true;
    $_SESSION["penyewa"] = $nik;

    // cek cookie
    if (isset($_POST["rememberMe"])) {
      // nik
      setcookie("nk", $nik, time() + 60 * 5);
      // kode
      setcookie("kd", hash("sha256", $kode), time() + 60 * 5);
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
  <link rel="icon" type="image/png" href="admin/assets/img/logo-kost.jpg" />
  <title>Login</title>
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
  <main class="main-content mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url(admin/assets/img/bg-login.jpeg)">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Login</h4>
                  <div class="row mt-3">
                    <p class="text-center ms-auto text-white">
                      Selamat datang kembali
                    </p>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <form action="" method="post" class="text-start">
                  <div class="input-group input-group-outline my-3">
                    <input type="text" name="nik" class="form-control" autocomplete="off" placeholder="NIK Penyewa" />
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <input type="password" name="kode" class="form-control" placeholder="Kode Sewa" />
                  </div>
                  <div class="form-check form-switch d-flex align-items-center mb-3">
                    <input class="form-check-input" type="checkbox" name="rememberMe" checked />
                    <label class="form-check-label mb-0 ms-3" for="rememberMe">Remember me</label>
                  </div>
                  <div class="text-center">
                    <button type="submit" name="login" class="btn bg-gradient-primary w-100 my-4 mb-2">Login</button>
                  </div>
                  <p class="mt-4 text-sm text-center">
                    Ingin mendaftar menjadi penyewa?
                    <a href="register.php" class="text-primary text-gradient font-weight-bold">Register</a>
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