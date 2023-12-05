<?php
require "../admin/pages/functions/functions.php";

// read
$query = "SELECT * FROM mobil, merk WHERE mobil.id_merk = merk.id_merk ORDER BY mobil.id_merk";
$hasil = $conn->query($query);



session_start();

// pemeriksaan session login
if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}

if (isset($_SESSION["pelanggan"])) {
    $pelanggan = $_SESSION["pelanggan"];
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sewa Mobil RenCars</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top"><img src="../admin/assets/img/logo.jpg" alt="..." class="rounded-circle" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Sewa Mobil
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#history">History</a></li>
                    <li class="nav-item"><a class="nav-link" href="#detail">Detail Harga</a></li>
                    <li class="nav-item"><a class="nav-link" href="#pemesanan">Pemesanan</a></li>
                    <li class="nav-item"><a class="nav-link text-danger" href="../admin/pages/logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">Selamat Datang di Rencars!</div>
            <div class="masthead-heading text-uppercase">tempat rental terbaik untukmu</div>
            <a class="btn btn-warning btn-xl text-uppercase text-2xl" href="#pemesanan">Pesan Sekarang</a>
        </div>
    </header>
    <!-- Services-->
    <section class="page-section" id="about">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">About Me</h2>
                <h3 class="section-subheading text-muted">Ini semua tentang kami.</h3>
                <h3 class="section-subheading text-muted">Rencars adalah sebuah usaha rental mobil yang sudah dipercaya ribuan orang. Rencars hadir sebagai solusi bagi anda yang membutuhkan kendaraan roda empat yang ingin anda gunakan untuk bepergian, wisata, bahkan untuk pergi dengan gaya. kami memiliki berbagai unit yang dapat disesuaikan dengan keinginan dan kebutuhan anda.</h3>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Multiplatform</h4>
                    <p class="text-muted">Kamu bisa memesan rental kami melalui berbagai macam platform yang ada sehingga kamu akan dipermudah dengan berbagai kenyamanan pemesanan.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">kenyamanan</h4>
                    <p class="text-muted">Kami memberikan anda kenyamanan extra untuk semua jenis mobil yang ingin anda sewa dengan harga yang terjangkau.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Keamanan</h4>
                    <p class="text-muted">Kami menjamin keamanan setiap pelanggan kami mulai dari keamanan data hingga bahkan keamanan berkendara di jalan raya.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="page-section" id="history">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">History Kami</h2>
                <h3 class="section-subheading text-muted">Ini adalah perjalanan Rencars hingga saat ini.</h3>
            </div>
            <ul class="timeline">
                <li>
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/1.jpg" alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>2015-2016</h4>
                            <h4 class="subheading">Kami berencana membangun sebuah usaha rental mobil</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Kami bersama sama berencana untuk membangun rental mobil dengan peluang usaha yang ada! Kami yakin bahwa dengan adanya usaha ini, bua=kan hanya kami yang diuntungkan, melainkan juga orang orang yang membutuhkannya.</p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/2.jpg" alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>March 2016</h4>
                            <h4 class="subheading">Kami membentuk usaha baru</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Usaha ini dimulai dengan menyediakan beberapa mobil dan pemesanan melalui call center kami. kami terus berkembang dan terus melaju di ranah pasar rental mobil Indonesia.</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/3.jpg" alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>December 2018</h4>
                            <h4 class="subheading">Kami mendapatkan Pemasukan investor</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Setelah diskusi dan presentasi yang kmai berikan, kami akhirnya mendapatkan investor yang membuat usaha kami semakin meroket dengan bebagai keunggulan.</p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/4.jpg" alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>2022</h4>
                            <h4 class="subheading">Kami memiliki kantor sendiri</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Hingga akhirnya usaha kamikian melejit dan kami akhirnya memiliki kantor sendiri yang akan kami gunakan untuk proses penerimaan pesanan oleh pelanggan.</p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image">
                        <h4>
                            Be Part
                            <br />
                            Of Our
                            <br />
                            Story!
                        </h4>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <!-- Clients-->
    <div class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/microsoft.svg" alt="..." aria-label="Microsoft Logo" /></a>
                </div>
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/google.svg" alt="..." aria-label="Google Logo" /></a>
                </div>
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/facebook.svg" alt="..." aria-label="Facebook Logo" /></a>
                </div>
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/ibm.svg" alt="..." aria-label="IBM Logo" /></a>
                </div>
            </div>
        </div>
    </div>
    <!-- harga -->
    <section id="detail">
        <div class="container-fluid py-4">
            <div class="text-center" style="margin-bottom: 3rem;">
                <h2 class="section-heading text-uppercase text-bold text-dark">Detail Harga</h2>
                <h3 class="text-lighter text-warning">Berikut nama nama mobil yang tersedia beserta harga rental per hari.</h3>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0 table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-3 text-center">No.</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Merk Mobil</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Mobil</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">tahun Produksi</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga Rental</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        ?>
                                        <?php while ($sewa = $hasil->fetch_assoc()) :
                                        ?>
                                            <tr>
                                                <td class="text-center"><?= $i ?></td>
                                                <td class="align-middle text-center text-sm"><?= $sewa['nama_merk'] ?></td>
                                                <td class="align-middle text-center text-sm text-bold text-danger"><?= $sewa['nama_mobil'] ?></td>
                                                <td class="align-middle text-center text-sm"><?= $sewa['tahun_produksi'] ?></td>
                                                <td class="align-middle text-center text-sm">Rp. <?= $sewa['harga'] ?></td>
                                            </tr>
                                            <?php $i++
                                            ?>
                                        <?php endwhile;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <!-- pemesanan -->
    <section id="pemesanan" class="bg-warning">
        <div class="container bg-white  rounded-3 my-7 m-auto w-55" style="padding: 3rem;">
            <div class="text-center">
                <h2 class="text-uppercase text-dark" style="font-weight: bold">Pemesanan Rental</h2>
            </div>
            <div class="">
                <div class="card-body">
                    <form action="prosespesan.php" method="post">

                        <div class="mb-3">
                            <label for="plat" class="text-lg">Mobil - Harga</label>
                            <select name="plat" id="plat" class="form-control form-control-lg" required>
                                <option selected>--Pilih Mobil--</option>
                                <?php

                                $querymbl = "SELECT * FROM mobil";
                                $hasilmbl = $conn->query($querymbl);
                                while ($mbl = $hasilmbl->fetch_assoc()) :
                                ?>
                                    <option value="<?= $mbl['plat_nomor'] ?>"><?= $mbl['nama_mobil'] ?> - Rp. <?= $mbl['harga'] ?></option>
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
                            <button type="submit" name="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Pesan Mobil</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
        $pesanan = "SELECT mobil.nama_mobil, temp.tanggal, temp.total_bayar, temp.desk, temp.id_transaksi
        FROM temp
        JOIN pelanggan ON temp.pelanggan = pelanggan.nik
        JOIN mobil ON mobil.plat_nomor = temp.plat_mobil
        WHERE temp.pelanggan = $pelanggan
        ORDER BY temp.tanggal;";
        $hasilpesan = $conn->query($pesanan);
        while ($pesan = $hasilpesan->fetch_assoc()) :
        ?>
            <div class="card m-5">
                <div class="card-header">
                    Pesanan Anda
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $pesan['nama_mobil'] ?></h5>
                    <h5 class="card-title">Tanggal : <?= $pesan['tanggal'] ?></h5>
                    <p class="card-text">Rp.<?= $pesan['total_bayar'] ?></p>
                    <p class="card-text text-success text-bold"><?= $pesan['desk'] ?></p>

                    <?php if ($pesan['desk'] == null) : ?>
                        <a href="hapuspesan.php?id=<?= $pesan['id_transaksi'] ?>" class="btn btn-danger" onclick=" return confirm ('Apakah Anda Yakin Ingin Membatalkan Pesanan Ini ?');">Batalkan</a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endwhile; ?>
    </section>
    <!-- Footer-->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Copyright &copy; Rencars 2023</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                    <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Portfolio Modals-->




    <!-- alert -->
    <?php
    if (isset($_GET['tambah'])) : ?>
        <script>
            alert("Pemesanan Berhasil Dilakukan");
        </script>
    <?php endif; ?>

    <?php
    if (isset($_GET['hapus'])) : ?>
        <script>
            alert("Pemesanan Berhasil Dibatalkan");
        </script>
    <?php endif; ?>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>