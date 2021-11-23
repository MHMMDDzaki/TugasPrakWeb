<h2>Produk Buku</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Gambar</th>
			<th>Nama</th>
			<th>Harga</th>
			<th>Kategori</th>
			<th>Berat(gr)</th>
			<th>Deskripsi</th>
			<th>Stok</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $data = $conn-> query("SELECT*FROM produk");?>
		<?php $no=1; ?>
		<?php while($isi= mysqli_fetch_assoc($data)){ ?>
		<tr>
			<td><?php echo $no; ?></td>
			<td>
				<img src="../foto_produk/<?php echo $isi['foto_produk']; ?>" width="100 px">
			</td>
			<td><?php echo $isi['nama_produk']; ?></td>
			<td><?php echo $isi['harga_produk']; ?></td>
			<td><?php echo $isi['kategori_produk']; ?></td>
			<td><?php echo $isi['berat']; ?></td>
			<td><?php echo $isi['deskripsi_produk']; ?></td>
			<td><?php echo $isi['Stok']; ?></td>
			<td>
				<a href="index.php?halaman=hapusproduk&id=<?php echo $isi ['id_produk']; ?>" class="btn-danger btn">hapus</a>
				<a href="index.php?halaman=ubahproduk&id=<?php echo $isi ['id_produk']; ?>" class="btn-warning btn">edit</a>
			</td>
		</tr>
		<?php $no++;?>
		<?php } ?>
	</tbody>
</table>
<br>
<a href="index.php?halaman=tambahproduk" class="btn btn-primary"> Tambah Buku</a>