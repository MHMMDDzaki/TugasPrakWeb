<?php
error_reporting(0);

if (!isset($_SESSION["keranjang"])) {
	echo "<script>location = 'index.php'; </script>";
} elseif(empty($_SESSION["keranjang"])){
	echo "<script>alert('Keranjang Kosong, Silahkan belanja');</script>";
}
?>
<div class="container">
	<h3>Keranjang Belanja</h3>
	<hr>
	<table class="table table-bordered mb-4">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Buku</th>
				<th>Harga</th>
				<th>Jumlah</th>
				<th>Subharga</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1; ?>
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
					<td>
						<a href="hapusproduk.php?id=<?php echo $id_produk ?>" class="btn btn-danger">Hapus</a>
					</td>
				</tr>
				<?php $no++; ?>
			<?php endforeach ?>
		</tbody>
	</table>
	<a href="checkout.php" class="btn btn-primary">Checkout</a>
</div>