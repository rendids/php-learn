<?php  
session_start();
    if(isset($_SESSION["login"])){
        header("Location: index.php");
        exit;
    }
require 'function.php';
if(isset($_POST["register"])){
	if (registrasi($_POST) > 0 ){
		echo "<script>
		alert('pendaftaran berhasil');
		document.location.href = 'index.php';
	</script>
";
} else {
echo  mysqli_errno($conn);
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
							<h1 class="h2">Memulai</h1>
							<p class="lead">
							Mulailah menciptakan pengalaman pengguna terbaik bagi Anda.
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-3">
									<form method="post">
										<div class="mb-3">

											<label class="form-label">Nama</label>
											<input class="form-control form-control-lg" type="text" id="nama_pembeli" name="nama_pembeli" placeholder="masukan namamu" oninput="validateName(this)" required />
										</div>
										<div class="mb-3">
											<label for="">jenis kelamin</label>
											<br>
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="radio" name="jk" id="inlineRadio1" value="laki-laki"  required/>
												<label class="form-check-label" for="inlineRadio1">laki-laki</label>
											</div>
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="radio" name="jk" id="inlineRadio2" value="perempuan" required/>
												<label class="form-check-label" for="inlineRadio2">perempuan</label>
											</div>
										</div>
										<div class="mb-3">
											<label class="form-label">Alamat</label>
											<textarea class="form-control form-control-lg"  name="alamat" placeholder="masukan alamatmu"  maxlength="255"  required></textarea>
										</div>
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" name="email" placeholder="masukan email" oninput="validateEmail(this)" required>
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="masukan password" required/>
										</div>
										<div class="mb-3">
											<label class="form-label">Konfirmasi Password</label>
											<input class="form-control form-control-lg" type="password" name="password2" placeholder="masukan kembali password" required />
										</div>
										<div class="d-grid gap-2 mt-3">
											<button type="submit" class="btn btn-lg btn-primary" name="register">daftar</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="text-center mb-3">
							punya akun? <a href="login.php">masuk</a>
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
	<script src="validate2.js"></script>
	<script src="vall.js"></script>

</body>

</html>