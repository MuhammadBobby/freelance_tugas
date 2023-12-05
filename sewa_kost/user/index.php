<?php
require "../admin/pages/functions/functions.php";

session_start();

// pemeriksaan session login
if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}

if (isset($_SESSION["penyewa"])) {
    $penyewa = $_SESSION["penyewa"];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Kost Tobing</title>
    <link rel="icon" type="image/x-icon" href="../admin/assets/img/logo-kost.jpg" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top">Kost Tobing</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#gallery">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="#pemesanan">Pemesanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="../admin/pages/logout.php" style="color: red;">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0.7) 75%, #000 100%), url(assets/img/bg-header.jpeg); background-repeat: no-repeat; background-size: cover; background-position:center;">
        <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
            <div class="d-flex justify-content-center">
                <div class="text-center">
                    <h1 class="mx-auto my-0 text-uppercase">Kost Tobing</h1>
                    <h2 class="text-white-50 mx-auto mt-2 mb-5">Sewa kost terjangkau dengan fasilitas lengkap dan nyaman.</h2>
                    <a class="btn btn-primary" href="#pemesanan">Pesan Now!</a>
                </div>
            </div>
        </div>
    </header>
    <!-- About-->
    <section class="about-section text-center" id="about">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8">
                    <h2 class="text-white mb-4">Perkenalkan, Kost Tobing</h2>
                    <p class="text-white-50">
                        Kost yang dapat anda pesan melalui website kami. Kami menghadirkan fitur pemesanan online melalui website menyesuaikan dengan gaya milenial untuk mencari tempat tinggal dengan lebih mudah.
                        Dengan pemesanan melalui website, kami dapat melayani anda degan lebih cepat dan anda akan mendapatkan pelayanan yang maksimal.
                    </p>
                </div>
            </div>
            <img class="img-fluid" src="assets/img/ipad.png" alt="..." />
        </div>
    </section>
    <!-- Projects-->
    <section class="projects-section bg-light" id="gallery">
        <div class="container px-4 px-lg-5">
            <!-- Featured Project Row-->
            <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
                <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0" src="assets/img/01.jpeg" alt="..." /></div>
                <div class="col-xl-4 col-lg-5">
                    <div class="featured-text text-center text-lg-left">
                        <h4>Harga yang terjangkau</h4>
                        <p class="text-black-50 mb-0">Kost Tobing dapat anda sewa dengan harga mulai dari <span class="text-danger text-bold">600k</span> perbulan. Dengan harga demikian, anda tentunya akan mendapatkan kenyamanan dan dekat dengan berbagai wilayah strategis yang akan memudahkan anda.</p>
                    </div>
                </div>
            </div>
            <!-- Project One Row-->
            <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
                <div class="col-lg-6"><img class="img-fluid" src="assets/img/02.jpg" alt="..." /></div>
                <div class="col-lg-6">
                    <div class="bg-black text-center h-100 project">
                        <div class="d-flex h-100">
                            <div class="project-text w-100 my-auto text-center text-lg-left">
                                <h4 class="text-white">Jumlah dan halaman yang luas</h4>
                                <p class="mb-0 text-white-50">Jangan takut kehabisan kamar, dengan total <span>14 Kamar</span>, anda dapat memilih dimana anda akan tinggal. Halaman yang ada juga luas, sehingga anda tidak akan kebingungan jika ingin meletakkan kendaraan anda di depan kost atau kamar anda. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Project Two Row-->
            <div class="row gx-0 justify-content-center">
                <div class="col-lg-6"><img class="img-fluid" src="assets/img/03.jpg" alt="..." /></div>
                <div class="col-lg-6 order-lg-first">
                    <div class="bg-black text-center h-100 project">
                        <div class="d-flex h-100">
                            <div class="project-text w-100 my-auto text-center text-lg-right">
                                <h4 class="text-white">Fasilitas yang memadai</h4>
                                <p class="mb-0 text-white-50">Jangan takut untuk berbagi kamar mandi atau bingung ingin masak dimana, karena di Kost Tobing, semua kamar akan memiliki fasilitas kamar mandi dan dapur yang berada di dalam. Sehingga privasi anda akan terjamin.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- locate -->
    <section id="location" class="bg-light" style="padding-bottom: 50px;">
        <div class="container px-4 px-lg-5">
            <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
                <div class="col-lg-6">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63714.175587074475!2d98.65358352160285!3d3.5561307158445006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303130686c0ab937%3A0xd87495013cf08cc6!2sJl.%20Pintu%20Air%2C%20Siti%20Rejo%20I%2C%20Kec.%20Medan%20Kota%2C%20Kota%20Medan%2C%20Sumatera%20Utara!5e0!3m2!1sid!2sid!4v1701319192125!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-lg-6">
                    <div class="bg-black h-100 project">
                        <div class="d-flex h-100">
                            <div class="project-text w-100 my-auto text-lg-left">
                                <h4 class="text-white ms-5">Lokasi Kami</h4>
                                <p class="mb-0 text-white-50 mx-5">Kost Tobing berlokasi di Jalan Pintu Air Gg. horas no.10, Kecamatan Medan Kota, Medan. <a href="https://maps.app.goo.gl/nPoX6mmXNFSXfvbs8" target="_blank" class="text-primary">klik untuk melihat peta >></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- pemesanan -->
    <section class="signup-section" id="pemesanan" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.1) 0%, rgba(0, 0, 0, 0.5) 75%, #000 100%), url(assets/img/bg-header.jpeg);background-repeat: no-repeat; background-size: cover; background-position:center;">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-10 col-lg-8 mx-auto text-center">
                    <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
                    <h2 class="text-white mb-5">Pemesanan Kost Tobing!</h2>
                    <form action="prosespesan.php" method="post" class="form-signup">
                        <!-- Email address input-->
                        <div class="row input-group-newsletter">
                            <div class="col">
                                <label for="kamar" class="text-white mb-2">Pilih Kamar yang Tersedia</label>
                                <select name="kamar" id="kamar" class="form-control form-control-lg" required>
                                    <!-- <option selected>--Pilih Kamar yang Tersedia--</option> -->
                                    <?php

                                    $querykmr = "SELECT * FROM kamar_kost WHERE status = 'tersedia'";
                                    $hasilkmr = $conn->query($querykmr);
                                    while ($kmr = $hasilkmr->fetch_assoc()) :
                                    ?>
                                        <option value="<?= $kmr['id_kamar'] ?>">Kamar No. <?= $kmr['id_kamar'] ?> - Rp. <?= $kmr['harga_sewa'] ?></option>

                                    <?php
                                        $harga = $kmr['harga_sewa'];
                                    endwhile; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row input-group-newsletter mt-5">
                            <div class="col">
                                <label for="tanggal" class="text-white mb-2">Tanggal Sewa / Pembayaran</label>
                                <input type="date" name="tanggal" class="form-control form-control-lg">
                            </div>
                        </div>
                        <div class="row input-group-newsletter mt-5">
                            <div class="col">
                                <label for="harga" class="text-white mb-2">Jumlah yang akan Dibayarkan</label>
                                <input type="number" name="harga" class="form-control form-control-lg" value="<?= $harga ?>" readonly>
                            </div>
                        </div>
                        <div class="row input-group-newsletter mt-5">
                            <div class="col-auto">
                                <button class="btn btn-primary margin-auto" type="submit" name="submit">Pesan Kamar Kost</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php
        $nom = 1;
        $pesanan = "SELECT kamar_kost.id_kamar, konfirmasi.tanggal_pembayaran, konfirmasi.jumlah_bayar, konfirmasi.desk, konfirmasi.id_transaksi
        FROM konfirmasi
        JOIN penyewa ON konfirmasi.id_penyewa = penyewa.nik
        JOIN kamar_kost ON konfirmasi.id_kamar = kamar_kost.id_kamar
        WHERE konfirmasi.id_penyewa = $penyewa
        ORDER BY konfirmasi.tanggal_pembayaran;";
        $hasilpesan = $conn->query($pesanan);
        while ($kamar = $hasilpesan->fetch_assoc()) :
        ?>

            <!-- card pemesanan -->
            <div class="card text-center mt-5 w-50 m-auto">
                <div class="card-header">
                    Pesanan <?php $nom++ ?>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Kamar No. <?= $kamar['id_kamar'] ?></h5>
                    <p class="card-text">Kamu memesan Kamar dengan Harga : Rp. <?= $kamar['jumlah_bayar'] ?></p>
                    <p class="card-text">Tanggal Pemesanan / Pembayaran : <?= $kamar['tanggal_pembayaran'] ?></p>
                    <p class="card-text text-bold text-warning">Status : <?= $kamar['desk'] ?></p>

                    <?php if ($kamar['desk'] == 'belum dikonfirmasi') : ?>
                        <a href="batalpesan.php?id=<?= $kamar['id_transaksi'] ?>" class="btn btn-danger" onclick=" return confirm ('Apakah Anda Yakin Ingin Membatalkan Pesanan Ini ?');">Batalkan Pesanan</a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endwhile; ?>
    </section>
    <!-- Footer-->
    <footer class="footer bg-black small text-center text-white-50">
        <div class="container px-4 px-lg-5">Copyright &copy; Kost Tobing Website 2023</div>
    </footer>


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
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>