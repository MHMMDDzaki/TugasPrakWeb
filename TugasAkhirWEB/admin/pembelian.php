<h2>Data Pembelian</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Pelanggan</th>
			<th>Tanggal</th>
			<th>Status</th>
			<th>Total</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $data = $conn-> query("SELECT*FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan");?>
		<?php $no=1; ?>
		<?php while($isi= mysqli_fetch_assoc($data)){ ?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $isi['nama_pelanggan']; ?></td>
			<td><?php echo $isi['tanggal_pembelian']; ?></td>
			<td><?php echo $isi['status']; ?></td>
			<td><?php echo $isi['total_pembelian']; ?></td>
			<td>
				<a href="index.php?halaman=detail&id=<?php echo $isi['id_pembelian']?>" class="btn-info btn">detail</a>
				
				<?php if ($isi['status'] == "Sudah Bayar") : ?>
				<a href="index.php?halaman=pembayaran&id=<?php echo $isi['id_pembelian']?>" class="btn btn-success">Lihat Pembayaran</a>
				<?php endif ?>
			</td>
		</tr>
		<?php $no++;?>
		<?php } ?>
	</tbody>
</table>