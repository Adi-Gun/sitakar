<?php
include "inc/koneksi.php";
   
?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>LOGIN | SITAKAR</title>
	<link rel="icon" href="dist/img/sitakar.png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="#">
				<img src="dist/img/sitakar.png" style="width: 100px; height: 100px;">
				<h1 style="color: white;"><b>SITAKAR</b></h1>
				<h2 style="color: white;">Sistem Informasi Tabungan Karyawan</h2>
				</a>
		</div>
		<!-- /.login-logo -->
		<div class="login-box-body" style="border-radius: 10px;">
			<h4 class="login-box-msg">Login</h4>

			<form action="#" method="post">
				<div class="form-group has-feedback">
					<input style="border-radius:10px;" type="text" class="form-control" name="username" placeholder="Masukkan Username" required>
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input style="border-radius:10px;" type="password" class="form-control" name="password" placeholder="Masukkan Password" required>
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="row">
					<div class="col-xs-8">

					</div>
					<!-- /.col -->
					<div class="col-xs-4">
						<button type="submit" class="btn btn-block btn-flat" name="btnLogin" title="Masuk Sistem" style="border-radius:10px; background-color: #B27946;">
							<b style="color:white;">Login</b>
						</button>
					</div>
					<!-- /.col -->
				</div>
			</form>
			<!-- /.social-auth-links -->

		</div>
		<!-- /.login-box-body -->
	</div>
	<!-- /.login-box -->

	<!-- jQuery 2.2.3 -->
	<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
	<!-- Bootstrap 3.3.6 -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<!-- iCheck -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<!-- sweet alert -->
	<body class="hold-transition login-page" style="background:url(dist/img/login.png)
no-repeat center center fixed; background-size: cover;
 -webkit-background-size: cover; 
 -moz-background-size: cover; -o-background-size: cover;">
</body>
<footer style="text-align: center;">
	<strong style="color:white;">&copy; 2023 Dikembangkan Oleh<a style="color:white;"> ICT POMOSDA</a></strong>
</footer>

</html>


<?php 
		if (isset($_POST['btnLogin'])) {  

		$username=mysqli_real_escape_string($koneksi,$_POST['username']);
		$password=mysqli_real_escape_string($koneksi,$_POST['password']);


		$sql_login = "SELECT * FROM tb_pengguna WHERE BINARY username='$username' AND password='$password'";
		$query_login = mysqli_query($koneksi, $sql_login);
		$data_login = mysqli_fetch_array($query_login,MYSQLI_BOTH);
		$jumlah_login = mysqli_num_rows($query_login);
        

            if ($jumlah_login == 1 ){
              session_start();
              $_SESSION["ses_id"]=$data_login["id_pengguna"];
              $_SESSION["ses_nama"]=$data_login["nama_pengguna"];
              $_SESSION["ses_username"]=$data_login["username"];
              $_SESSION["ses_password"]=$data_login["password"];
              $_SESSION["ses_level"]=$data_login["level"];
                
              echo "<script>
                    Swal.fire({title: 'Login Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.value) {
                            window.location = 'index.php';
                        }
                    })</script>";
              }else{
              echo "<script>
                    Swal.fire({title: 'Login Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.value) {
                            window.location = 'login.php';
                        }
                    })</script>";
                }
			  }
