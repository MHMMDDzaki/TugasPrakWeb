<?php
session_start();
include 'conn.php';
//jika belum login
if (!isset($_SESSION["pelanggan"]) or empty($_SESSION["pelanggan"])) {
	echo "<script>alert('anda belum login');</script>";
	echo "<script>location='login.php';</script>";
	exit();
}
?>

<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Riwayat Pembelian</title>
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
	<section class="pt-5" style="height: 100vh; background: #5F9EA0;">
		<div class="container">
			<h4>Riwayat belanja <?php echo $_SESSION["pelanggan"]["nama_pelanggan"]; ?></h4>

			<table class="table table-bordered">
				<thead style="background: #FF7F50;">
					<tr>
						<th>NO</th>
						<th>Tanggal</th>
						<th>Status</th>
						<th>Total</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody style="background: white;">
					<?php
					$no = 1;
					$id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
					$data = mysqli_query($conn, "SELECT * FROM pembelian WHERE id_pelanggan = '$id_pelanggan'");
					while ($isi = mysqli_fetch_assoc($data)) {
					?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $isi['tanggal_pembelian']; ?></td>
							<td><?php echo $isi['status']; ?></td>
							<td>Rp. <?php echo number_format($isi['total_pembelian']); ?></td>
							<td>
								<a href="hasil.php?id=<?php echo $isi["id_pembelian"]; ?>" class="btn btn-primary">Nota</a>
								<a href="pembayaran.php?id=<?php echo $isi["id_pembelian"]; ?>" class="btn btn-success">Pembayaran</a>
							</td>
						</tr>
						<?php $no++; ?>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</section>

</body>

</html>