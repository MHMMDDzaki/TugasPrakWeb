<h2>Pelanggan</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Pelanggan</th>
			<th>emaill</th>
			<th>Telephone</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $data = $conn-> query("SELECT*FROM pelanggan");?>
		<?php $no=1; ?>
		<?php while($isi= mysqli_fetch_assoc($data)){ ?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $isi['nama_pelanggan']; ?></td>
			<td><?php echo $isi['email_pelanggan']; ?></td>
			<td><?php echo $isi['telepon_pelanggan']; ?></td>
			<td>
				<a href="index.php?halaman=hapuspelanggan&id=<?php echo $isi['id_pelanggan']; ?>" class="btn-danger btn">Hapus</a>
				<a href="index.php?halaman=ubahpelanggan&id=<?php echo $isi['id_pelanggan']; ?>" class="btn-warning btn">Edit</a>
			</td>
		</tr>
		<?php $no++;?>
		<?php } ?>
	</tbody>
</table>
<br>
<a href="index.php?halaman=tambahpelanggan" class="btn btn-primary"> Tambah Pelanggan</a>