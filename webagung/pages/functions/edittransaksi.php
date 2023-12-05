<?php
require "function.php";

$id = $_GET['id'];
$sql = "SELECT * FROM barang_masuk, barang_masuk_detail, barang, supplier WHERE
    barang_masuk_detail.detail_id = $id AND
    barang_masuk.masuk_id = barang_masuk_detail.masuk_id AND
    barang_masuk.supplier_id = supplier.id_supplier AND
    barang_masuk_detail.barang_id = barang.barang_id";
$hasil = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Parfume Lab Art</title>
    <link rel="icon" href="../../assets/images/logo parfume.png">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__wobble" src="../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div> -->

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="logout.php" class="nav-link">Logout</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->


                <!-- Messages Dropdown Menu -->

                <!-- Notifications Dropdown Menu -->

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-primary  elevation-4" style="background-color: #e3f2fd;">
            <!-- Brand Logo -->
            <a href="index.php" class="brand-link">
                <img src="../../assets/images/logo parfume.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Parfume Lab Art</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../../assets/images/poto.jpeg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">agung liadi prasetyo</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="index.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="Supplier.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Supplier</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="barang.php" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Barang</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="transaksi.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Transaksi Barang Masuk</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">


            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <div class="col-sm-11 col-sm-offset-5 col-md-12 col-md-offset-2 main">


                        <section class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                                        <h1 class="page-header">Update Transaksi Barang Masuk</h1>

                                        <?php while ($row = $hasil->fetch_assoc()) { ?>
                                            <form action="updatetransaksi.php" method="post">
                                                <div class="form-group">
                                                    <input type="hidden" name="detail_id" value="<?= $id ?>">

                                                    <label for="masuk_id">ID Barang Masuk</label>
                                                    <input type="text" name="masuk_id" class="form-control" value="<?= $row['masuk_id'] ?>" readonly>

                                                    <label for="tanggal">Tanggal Transaksi</label>
                                                    <input type="date" name="tanggal" class="form-control" value="<?= $row['tanggal_masuk'] ?>" readonly>

                                                    <label for="supplier">Supplier</label>
                                                    <select name="supplier" id="supplier" class="form-control form-control-lg" readonly>
                                                        <option selected value="<?= $row['supplier_id'] ?>"><?= $row['nama_supplier'] ?></option>
                                                    </select>

                                                    <label for="barang">Nama Barang</label>
                                                    <select name="barang" id="barang" class="form-control form-control-lg" required>
                                                        <option selected value="<?= $row['barang_id'] ?>"><?= $row['nama_barang'] ?></option>

                                                        <?php
                                                        $supplier = $row['supplier_id'];
                                                        $querybrg = "SELECT * FROM barang WHERE supplier = '$supplier'";
                                                        $hasilbrg = $conn->query($querybrg);
                                                        while ($brg = $hasilbrg->fetch_assoc()) :
                                                        ?>
                                                            <option value="<?= $brg['barang_id'] ?>"><?= $brg['nama_barang'] ?></option>
                                                        <?php endwhile; ?>
                                                    </select>

                                                    <input type="hidden" name="jumlahsebelum" value="<?= $row['jumlah'] ?>">

                                                    <label for="jumlah">Jumlah Transaksi</label>
                                                    <input type="number" min="0" name="jumlah" class="form-control" value="<?= $row['jumlah'] ?>" required>

                                                    <input type="hidden" name="hargasebelum" value="<?= $row['harga'] ?>">

                                                    <label for="harga">Harga Satuan</label>
                                                    <input type="number" min="0" name="harga" class="form-control" value="<?= $row['harga_barang'] ?>" readonly>



                                                </div>
                                                <input type="submit" class="btn btn-info" value="Simpan">
                                            </form>
                                        <?php } ?>

                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.container-fluid -->
                        </section>
                        <!-- /.content -->

                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- /.row -->
    </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2021 <a href="">Agung Liadi</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
        </div>
    </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.js"></script>

    <!-- PAGE ../../PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="../../plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="../../plugins/raphael/raphael.min.js"></script>
    <script src="../../plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="../../plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="../../plugins/chart.js/Chart.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../../dist/js/pages/dashboard2.js"></script>
    <!-- DataTables  & ../../Plugins -->
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../../plugins/jszip/jszip.min.js"></script>
    <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    <script>
        window.setTimeout(function() {
            $('.alert').fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 1500);
    </script>
    <script src="https://kit.fontawesome.com/7f6991c5dd.js" crossorigin="anonymous"></script>
</body>

</html>