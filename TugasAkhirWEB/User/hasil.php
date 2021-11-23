<?php
session_start();
include 'conn.php';
?>

<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Nota</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
</head>

<body>
	<div class="container mx-0 px-0">
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
			<h2 class="pb-5">Data Pembelian</h2>

			<?php
			$data = $conn->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan
					WHERE pembelian.id_pembelian = '$_GET[id]'");
			$detail = mysqli_fetch_assoc($data);
			?>


			<?php
			//id yang beli
			$id_login = $detail["id_pelanggan"];

			//id yang login
			$id_login2 = $_SESSION["pelanggan"]["id_pelanggan"];

			if ($id_login !== $id_login2) {
				echo "<script>alert('Login dahulu');</script>";
				echo "<script>location = 'riwayat.php';</script>";
				exit();
			}

			?>

			<div class="row">
				<div class="col-md-4">
					<h4>Pembelian</h4>
					<strong>No Pembelian : <?php echo $detail['id_pembelian']; ?></strong><br>
					<P>
						Tanggal : <?php echo $detail['tanggal_pembelian']; ?> <br>
						Total : Rp. <?php echo number_format($detail['total_pembelian']); ?> <br>
					</P>
				</div>
				<div class="col-md-4">
					<h4>Pelanggan</h4>
					<strong><?php echo $detail['nama_pelanggan']; ?></strong><br>
					<p>
						Nomor Telepon : <?php echo $detail['telepon_pelanggan']; ?> <br>
						Email : <?php echo $detail['email_pelanggan']; ?> <br>
					</p>
				</div>
				<div class="col-md-4">
					<h4>Pengiriman</h4>
					<strong><?php echo $detail['nama_kota'] ?></strong>
					<br>
					Ongkos Kirim : Rp. <?php echo number_format($detail['tarif']); ?><br>
					Alamat Tujuan : <?php echo $detail['alamat']; ?>
				</div>
			</div>
			<br>
			<h2>Detail Produk</h2>
			<table class="table table-bordered">
				<thead style="background: #FF7F50;">
					<tr>
						<th>no</th>
						<th>Nama Produk</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Berat</th>
						<th>Subberat</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody style="background: white;">
					<?php
					$sql = mysqli_query($conn, "SELECT * FROM pembelian_produk WHERE id_pembelian = '$_GET[id]'");
					?>
					<?php $no = 1; ?>
					<?php while ($data = mysqli_fetch_assoc($sql)) { ?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $data['nama']; ?></td>
							<td>Rp. <?php echo number_format($data['harga']); ?></td>
							<td><?php echo $data['jumlah']; ?></td>
							<td><?php echo $data['berat']; ?> gr</td>
							<td><?php echo $data['subberat']; ?> gr</td>
							<td>Rp. <?php echo number_format($data['subharga']); ?></td>
						</tr>
						<?php $no++; ?>
					<?php } ?>
				</tbody>
			</table>

			<div class="row">
				<div class="col-md-7">
					<div class="alert alert-info">
						<p>Silanhkan Lakukan pembayaran Rp. <?php echo number_format($detail['total_pembelian']); ?></p>
						<strong>Ke no DANA 089530412017</strong>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>

</html>