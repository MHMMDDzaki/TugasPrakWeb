<h2>Data Pembayaran</h2>

<?php
//id pembelian
$id_pembelian = $_GET['id'];

$sql = mysqli_query($conn, "SELECT * FROM pembayaran WHERE id_pembelian = '$id_pembelian'");
$data = mysqli_fetch_assoc($sql);

?>

<div class="row">
	<div class="col-md-6">
		<table class="table">
			<tr>
				<th>Nama</th>
				<td><?php echo $data['nama']?></td>
			</tr>
			<tr>
				<th>Bank</th>
				<td><?php echo $data['bank']?></td>
			</tr>
			<tr>
				<th>Jumlah</th>
				<td>Rp. <?php echo number_format($data['jumlah'])?></td>
			</tr>
			<tr>
				<th>Tanggal</th>
				<td><?php echo $data['tanggal']?></td>
			</tr>
		</table>
	</div>
	<div class="col-md-6">
		<img src="../foto_bukti/<?php echo $data['bukti_pembayaran']?>" alt="" width="250">
	</div>
</div>