<?php
	session_start();
	
	error_reporting(0);
	$conn = mysqli_connect("localhost","root","","tugas_akhir");
	
	if ($conn -> connect_error){
		die('gagal menyambungkan database : '. $connect->connect_error);
	}
	
	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT*FROM admin WHERE username = '$username' && password = '$password'") or die(mysqli_error($conn));

	$hasil = mysqli_num_rows($result);

	if($hasil > 0){
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		
		$_SESSION["login"]=true;
		header("location: index.php");
	}
	else{
		echo "<script>
			alert('Username atau password salah');
			  </script>
		";
	}
	
?>


<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Login Page</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>

<body>
	<div class="mx-0 px-0">
		<nav class="navbar position-sticky default-layout-navbar col-lg-12 col-12 shadow-sm p-3 mb-0 bg-body rounded">
			<div class="container-fluid">
				<a href="index.php" class="navbar-brand" style="color: black;">
					TOKO BUKU
					<img src="https://th.bing.com/th/id/OIP.5AIBiqVoTNtQIOGzVOeEJwHaFO?w=256&h=180&c=7&r=0&o=5&dpr=2&pid=1.7" alt="" width="30" height="24" class="d-inline-block align-text-top">
				</a>
			</div>
		</nav>
	</div>
	<section class="position-relative">
		<div class="panel panel-default position-absolute bg-light" style="padding: 70px 40px; width: 400px; top: 70px; left: 100px; z-index: 1; border-radius: 30px">
			<div class="panel-heading">
				<h4 class="panel-title text-center" style="margin-bottom: 50px; letter-spacing: 3px;">LOGIN ADMIN</h4>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
						<label for="">Email</label>
						<input type="email" class="form-control" name="username">
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input type="password" class="form-control" name="password">
					</div>
					<button class="btn btn-primary" name="login">Login</button>
				</form>
			</div>
		</div>
		<div class="" id="wallpaper"></div>
	</section>
</body>

<style>
	#wallpaper {
		width: 100vw;
		height: 90vh;
		background-image: url("https://www.detecon.com/drupal/sites/default/files/2021-03/strategie-und-agilitaet_color_1110x600.jpg");
		background-size: cover;
		opacity: 0.8;
	}
</style>

</html>