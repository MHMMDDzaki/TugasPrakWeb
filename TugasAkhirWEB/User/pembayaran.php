<?php
session_start();
include 'conn.php';
//jika belum login
if (!isset($_SESSION["pelanggan"]) or empty($_SESSION["pelanggan"])) {
	echo "<script>alert('anda belum login');</script>";
	echo "<script>location='login.php';</script>";
	exit();
}

//id dari link
$id_pembeli = $_GET["id"];
$sql = mysqli_query($conn, "SELECT * FROM pembelian WHERE id_pembelian ='$id_pembeli'");
$isi = mysqli_fetch_assoc($sql);

//id beli harus sama id login
$id_beli = $isi["id_pelanggan"];
$id_login = $_SESSION["pelanggan"]["id_pelanggan"];

if ($id_beli !== $id_login) {
	echo "<script>alert('anda salah');</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();
}
?>

<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Laman Pembayaran</title>
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

	<br>

	<div class="container">
		<h3>Konfirmasi Pembayaran</h3>
		<p>Bukti Pembayaran</p>
		<div class="alert alert-info">Total Tagihan <strong>Rp. <?php echo number_format($isi["total_pembelian"]); ?></strong></div>

		<form action="" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="">Nama Pembayar</label>
				<input type="text" class="form-control" name="nama">
			</div>
			<div class="form-group">
				<label for="">Nama Bank</label>
				<input type="text" class="form-control" name="bank">
			</div>
			<div class="form-group">
				<label for="">Jumlah</label>
				<input type="number" class="form-control" name="jumlah" min="1" placeholder="Harus Sesuai dengan tagihan">
			</div>
			<div class="form-group">
				<label for="">Foto Bukti</label>
				<input type="file" class="form-control" name="bukti" style="height: 45px;">
				<small class="text text-danger">Foto bukti harus JPG/PNG MAX 2 MB</small>
			</div>
			<button class="btn btn-success" name="kirim">Bayar</button>
		</form>
	</div>

	<?php
	if (isset($_POST["kirim"])) {
		//upload foto
		$fotobukti = $_FILES["bukti"]["name"];
		$lokasifoto = $_FILES["bukti"]["tmp_name"];
		$nama_foto = date("YmdHis") . $fotobukti;
		move_uploaded_file($lokasifoto, "foto_bukti/$nama_foto");
		$nama = $_POST["nama"];
		$bank = $_POST["bank"];
		$jumlah = $_POST["jumlah"];
		$tanggal = date("Y-m-d");

		if (empty($nama)) {
			mysqli_query($conn, "UPDATE pembelian SET status = 'pending' WHERE id_pembelian = '$id_pembeli'");
			echo "<script>alert('Silahkan isi form terlebih dahulu ');</script>";
			echo "<script>location='riwayat.php';</script>";
		} elseif (empty($bank)) {
			mysqli_query($conn, "UPDATE pembelian SET status = 'pending' WHERE id_pembelian = '$id_pembeli'");
			echo "<script>alert('Silahkan isi form terlebih dahulu ');</script>";
			echo "<script>location='riwayat.php';</script>";
		} elseif (empty($jumlah)) {
			mysqli_query($conn, "UPDATE pembelian SET status = 'pending' WHERE id_pembelian = '$id_pembeli'");
			echo "<script>alert('Silahkan isi form terlebih dahulu ');</script>";
			echo "<script>location='riwayat.php';</script>";
		} elseif (empty($fotobukti)) {
			mysqli_query($conn, "UPDATE pembelian SET status = 'pending' WHERE id_pembelian = '$id_pembeli'");
			echo "<script>alert('Silahkan isi form terlebih dahulu ');</script>";
			echo "<script>location='riwayat.php';</script>";
		} else {
			//simpan data
			mysqli_query($conn, "INSERT INTO pembayaran (id_pembelian, nama, bank, jumlah, tanggal, bukti_pembayaran) VALUES ('$id_pembeli','$nama','$bank','$jumlah','$tanggal','$nama_foto')");
			//update status
			mysqli_query($conn, "UPDATE pembelian SET status = 'Sudah Bayar' WHERE id_pembelian = '$id_pembeli'");
			echo "<script>alert('Pembayaran Sudah Terlaksana');</script>";
			echo "<script>location='riwayat.php';</script>";
		}
	}
	?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>