<!doctype html>
<html lang="en">
  <head>
  	<title>Sign Up</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="assets/css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="wrap">
						<div class="img" style="background-image: url(assets/img/login.JPG);"></div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Sign Up</h3>
			      		</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div>
					</div>
					<form action="" class="signin-form" method="post" >
			      		<div class="form-group mt-3">
			      			<input type="text" name="name" class="form-control" required>
			      			<label class="form-control-placeholder" for="name">Name</label>
			      		</div>
					<div class="form-group mt-3">
			      		<input type="text" name="username" class="form-control" required>
			      		<label class="form-control-placeholder" for="username">Username</label>
			      	</div>
					<div class="form-group mt-3">
			      		<input type="text" name="tlpn" class="form-control" required>
			      		<label class="form-control-placeholder" for="username">No Tlpn</label>
			      	</div>
		            <div class="form-group">
		              <input id="password" name="password" type="password" class="form-control" required>
		              <label class="form-control-placeholder" for="password">Password</label>
		              <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
		            </div>
		            <div class="form-group">
		            	<button type="submit" name="submit" class="form-control btn btn-primary rounded submit px-3">Sign Up</button>
		            </div>
		            
		          </form>
		          <p class="text-center">Have Account ?<a href="index.php"> Sign In</a></p>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/main.js"></script>

	</body>
</html>
<?php

        if(isset($_POST['submit'])){
			$nama = $_POST['name'];
            $username = $_POST['username'];
            $password = $_POST['password'];
			$tlpn = $_POST['tlpn'];

				if(empty($nama)){
					echo "<script>alert('nama tidak boleh kosong');location.href='signup.php';</script>";
				} elseif(empty($username)){

					echo "<script>alert('username tidak boleh kosong');location.href='signup.php';</script>";
				} elseif(empty($password)){

					echo "<script>alert('password tidak boleh kosong');location.href='signup.php';</script>";
				} elseif(empty($password)){
					echo "<script>alert('password tidak boleh kosong');location.href='signup.php';</script>";
				} else {
					include "koneksi.php";

					$insert=mysqli_query($conn,"insert into user (nama, username, password, tlpn) value ('".$nama."','".$username."','$password','".$tlpn."')") or die(mysqli_error($conn));

					if($insert){
						echo "<script>alert('Berhasil Mendaftar');location.href='index.php';</script>";
					} else {
						echo "<script>alert('Gagal Daftar');location.href='signup.php';</script>";
					}
				}
			}
?>