<?php
session_start();
include 'conn.php';
error_reporting(0);

if (!isset($_SESSION["pelanggan"])) {
	echo "<script>alert('Silahkan Login Dahulu');</script>";
	echo "<script>location = 'login.php'; </script>";
}
?>

<!DOCTYPE>
<html>

<head>
	<meta charset="utf-8">
	<title>Keranjang</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
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
	<section style="padding-top: 100px; height: 100vh; background: #5F9EA0;">
		<div class="container">
			<h3 class="text-white">Keranjang Belanja</h3>
			<table class="table table-bordered">
				<thead style="background: #FF7F50;">
					<tr>
						<th>No</th>
						<th>Nama Buku</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Subharga</th>

					</tr>
				</thead>
				<tbody style="background: white;">
					<?php $no = 1; ?>
					<?php $total = 0; ?>
					<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) : ?>
						<?php $data = mysqli_query($conn, "SELECT*FROM produk WHERE id_produk = '$id_produk'");
						$isi = mysqli_fetch_assoc($data);
						$harga = $isi['harga_produk'] * $jumlah;
						?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $isi['nama_produk']; ?></td>
							<td>Rp. <?php echo number_format($isi['harga_produk']); ?></td>
							<td><?php echo $jumlah; ?></td>
							<td>Rp. <?php echo number_format($harga); ?></td>

						</tr>
						<?php $no++; ?>
						<?php $total += $harga ?>
					<?php endforeach ?>
				</tbody>
				<tfoot style="background: white;">
					<tr>
						<th colspan="4">Total</th>
						<th>Rp. <?php echo number_format($total) ?></th>
					</tr>
				</tfoot>
			</table>
			<form action="" method="post">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<input type="text" value="<?php echo $_SESSION["pelanggan"]["nama_pelanggan"] ?>" class="form-control">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<input type="text" value="<?php echo $_SESSION["pelanggan"]["telepon_pelanggan"] ?>" class="form-control">
						</div>
					</div>
					<div class="col-md-4">
						<select name="id_ongkir" class="form-control">
							<option value="">Ongkos Kirim</option>
							<?php $data = mysqli_query($conn, "SELECT*FROM ongkir"); ?>
							<?php while ($isi = mysqli_fetch_assoc($data)) { ?>
								<option value="<?php echo $isi["id_ongkir"] ?>">
									<?php echo $isi['nama_kota'] ?> - Rp. <?php echo number_format($isi['tarif']) ?>
								</option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="text-white"><strong>Alamat yang dituju</strong></label>
					<textarea name="alamat" class="form-control" placeholder="Masukan alamat yang dituju"></textarea>
				</div>
				<button class="btn" style="background: #FF7F50;" name="checkout">Checkout</button>
			</form>

			<?php
			if (isset($_POST["checkout"])) {
				$id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
				$id_ongkir = $_POST["id_ongkir"];
				$tanggal = date("Y-m-d");
				$alamat = $_POST['alamat'];

				$sql = mysqli_query($conn, "SELECT*FROM ongkir WHERE id_ongkir = '$id_ongkir'");
				$isidata = mysqli_fetch_assoc($sql);
				$nama_kota = $isidata['nama_kota'];
				$tarif = $isidata['tarif'];

				$totalpembelian = $total + $tarif;
				//data pembelian
				$data = mysqli_query($conn, "INSERT INTO pembelian (id_pelanggan, id_ongkir, tanggal_pembelian, total_pembelian,nama_kota, tarif,alamat) VALUES ('$id_pelanggan','$id_ongkir','$tanggal','$totalpembelian','$nama_kota','$tarif','$alamat')");

				//data pembelian_produk
				$pembelian_terbaru = $conn->insert_id;

				foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) {
					$ambil = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk ='$id_produk'");
					$isi = mysqli_fetch_assoc($ambil);

					$nama = $isi['nama_produk'];
					$harga = $isi['harga_produk'];
					$berat = $isi['berat'];

					$subberat = $isi['berat'] * $jumlah;
					$subharga = $isi['harga_produk'] * $jumlah;

					mysqli_query($conn, "INSERT INTO pembelian_produk (id_pembelian, id_produk, nama, harga, berat, subberat, subharga, jumlah) VALUES ('$pembelian_terbaru','$id_produk','$nama','$harga','$berat','$subberat','$subharga','$jumlah')");

					//update stok
					mysqli_query($conn, "UPDATE produk SET Stok = Stok - $jumlah WHERE id_produk = '$id_produk'");
				}
				//menghilangkan data dikeranjang
				unset($_SESSION["keranjang"]);
				echo "<script>alert('Pembelian Sukses');</script>";
				echo "<script>location = 'hasil.php?id=$pembelian_terbaru'; </script>";
			}

			?>
		</div>
	</section>

</body>

</html>