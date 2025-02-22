<?php
session_start();
if(!isset($_SESSION["login"])){
    echo "<script>alert('Anda harus login terlebih dahulu.');</script>";
    echo "<script>window.location.href = 'login.php';</script>";
    exit;
}

require 'function.php';

$id = $_GET ["id"];

$brg = query("SELECT * FROM transaksi WHERE id_transaksi =$id")[0];

//cek apakah tombol submit sudah di tekan atau belum
if (isset($_POST["submit"])) {
    //cek apakah data berhasil di tambahkan atau tidak
    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil diubah');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diubahn');
                document.location.href = 'index.php';
            </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item ">
    <a class="nav-link" href="../index.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="../barang/index.php">
        <i class="fas fa-fw fa-boxes"></i>
        <span>barang</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="../supplier/index.php">
        <i class="fas fa-fw fa-user-tie"></i>
        <span>supplier</span></a>
</li>
<li class="nav-item active">
    <a class="nav-link" href="../transaksi/index.php">
        <i class="fas fa-wallet"></i>
        <span>transaksi</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="../pembayaran/index.php">
        <i class="fas fa-credit-card"></i>
        <span>pembayaran</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="../pembeli/index.php">
        <i class="fas fa-users"></i>
        <span>pembeli</span></a>
</li>

</ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Collapsable Card Example -->
                    <div class="card shadow mb-4">
                                <!-- Card Header - Accordion -->
                                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                    <h6 class="m-0 font-weight-bold text-primary">Ubah transaksi</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="collapseCardExample">
                                    <div class="card-body">
                                        <form action="" method="POST" >
                                            <input type="hidden" name="id" value="<?= $brg["id_transaksi"] ?>">
                                            <div class="pb-3">
                                                <label for="supplier" class="form-label">nama barang</label>
                                                <select class="form-control" aria-label="suplier" name="id_barang" value="<?= $brg["nama_barang"] ?>" required>
                                                    <?php 
                                                    $cateory = mysqli_query($conn,"SELECT * FROM barang" );
                                                    while($c = mysqli_fetch_array($cateory)){
                                                    ?>
                                                    <option value="<?php echo $c['nama_barang'] ?>"><?php echo $c['nama_barang']?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="pb-3">
                                                <label for="supplier" class="form-label">nama pembeli</label>
                                                <select class="form-control" aria-label="suplier" name="id_pembeli" value="<?= $brg["nama_pembeli"] ?>"required>
                                                    <?php 
                                                    $cateory = mysqli_query($conn,"SELECT * FROM pembeli" );
                                                    while($c = mysqli_fetch_array($cateory)){
                                                    ?>
                                                    <option value="<?php echo $c['nama_pembeli'] ?>"><?php echo $c['nama_pembeli']?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="alamat" class="form-label">tanggal</label>
                                                <input type="date" class="form-control" id="tanggal" value="<?= $brg["tanggal"] ?>" name="tanggal" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="alamat" class="form-label">keterangan</label>
                                                <textarea type="text" class="form-control" id="alamat" value="" name="keterangan" ><?= $brg["keterangan"] ?></textarea>
                                            </div>
                                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>

</body>

</html>