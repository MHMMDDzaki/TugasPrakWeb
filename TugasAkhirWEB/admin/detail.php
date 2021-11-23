<h2>Data Pembeli</h2>

<?php  
	$data = $conn->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan
	WHERE pembelian.id_pembelian = '$_GET[id]'");
	$detail = mysqli_fetch_assoc($data);
?>

<strong><?php echo $detail['nama_pelanggan'];?></strong><br>

<P>
	Nomor Telepon : <?php echo $detail['telepon_pelanggan'];?> <br>
	Email         : <?php echo $detail['email_pelanggan'];?> <br>
</P>

<br>
<h2>Detail Produk</h2>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>no</th>
			<th>Nama Produk</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Total</th>
		</tr>
	</thead>
	<tbody>
		<?php	
		$sql = mysqli_query($conn, "SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk = produk.id_produk WHERE pembelian_produk.id_pembelian = '$_GET[id]'");
		?>
		<?php $no=1; ?>
		<?php while ($data = mysqli_fetch_assoc($sql)){ ?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $data['nama_produk'];?></td>
			<td><?php echo $data['harga_produk']; ?></td>
			<td><?php echo $data['jumlah'];?></td>
			<td>
				<?php echo $data['jumlah']*$data['harga_produk'];?>
			</td>
		</tr>
		<?php $no++; ?>
		<?php } ?>
	</tbody>
</table>

