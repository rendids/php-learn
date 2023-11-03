<?php
session_start();
if (isset($_SESSION["login"])) {
    header("Location: index.php");
	echo '<script>alert("Anda harus login terlebih dahulu.");</script>';
    exit;
}

require 'function.php';
if (isset($_POST["login"])) {
    $username = $_POST["nama_pembeli"];
    $pw = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM pembeli WHERE nama_pembeli = '$username'");

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($pw, $row["password"])) {
            // sesi
            $_SESSION["login"] = true;
            header("Location: index.php?login_success=true");
            exit;
        }
    }
    $error = true;
}

// Bagian HTML halaman login
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
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
		
		<!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Selamat Datang Kembali!</h1>
							<p class="lead">
								silahkan login dahulu
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-3">
									<form method="post">
										<?php if(isset($error )) : ?>
											<p class="text-danger">harap masukan username/password dengan benar</p>
											<?php endif; ?>
											<div class="mb-3">
            									<label class="form-label">Nama</label>
    											<input class="form-control form-control-lg" type="text" name="nama_pembeli" id="nama_pembeli" placeholder="masukan namamu" oninput="validateForm()" required/>
											</div>										
										<div class="mb-3">
											<label class="form-label">Kata sandi</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="maskan kata sandi" required />
										</div>
										<div class="d-grid gap-2 mt-3">
											<button type="submit" class="btn btn-lg btn-primary" name="login">masuk</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="text-center mb-3">
							Belum mempunyai akun? <a href="register.php">daftar</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>



  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
	<script src="validasi2.js"></script>

</body>

</html>