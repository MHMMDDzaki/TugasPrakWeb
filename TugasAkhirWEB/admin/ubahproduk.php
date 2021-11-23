<h2>Edit Produk</h2>

<?php
$sql = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '$_GET[id]'") or die(mysqli_error($conn));
$data = mysqli_fetch_assoc($sql);

echo "<pre>";
print_r($data);
echo "</pre>";
?>
<div class="container" style="margin-top:20px">

	<form enctype="multipart/form-data" method="post">
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Nama</label>
			<div class="col-sm-10">
				<input type="text" name="nama" class="form-control" value="<?php echo $data['nama_produk']; ?>">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Kategori</label>
			<div class="col-sm-10">
				<select name="kategori" class="form-control" value="<?php echo $data['kategori_produk']; ?>">
					<option value="">PILIH KATEGORI</option>
					<option value="teknologi">Teknologi</option>
					<option value="hiburan">Hiburan</option>
					<option value="komik">Komik</option>
					<option value="umum">Umum</option>
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Harga (Rp.)</label>
			<div class="col-sm-10">
				<input type="number" name="harga" class="form-control" value="<?php echo $data['harga_produk']; ?>">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Berat (gr.)</label>
			<div class="col-sm-10">
				<input type="number" name="berat" class="form-control" value="<?php echo $data['berat']; ?>">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Deskripsi</label>
			<div class="col-sm-10">
				<textarea class="form-control" name="deskripsi" rows="10"><?php echo $data['deskripsi_produk']; ?></textarea>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Foto</label>
			<div class="col-sm-10">
				<img src="../foto_produk/<?php echo $data['foto_produk'] ?>" width="250">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Ganti Foto</label>
			<div class="col-sm-10">
				<input type="file" name="foto" class="form-control">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">STOK : </label>
			<div class="col-sm-10">
				<input type="number" name="stok" class="form-control" value="<?php echo $data['Stok']; ?>">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">&nbsp;</label>
			<div class="col-sm-10">
				<input type="submit" name="edit" class="btn btn-primary" value="Ubah">
			</div>
		</div>
	</form>

</div>


<?php
if (isset($_POST['edit'])) {

	$nama = $_FILES['foto']['name'];
	$lokasi = $_FILES['foto']['tmp_name'];

	if (!empty($lokasi)) {
		move_uploaded_file($lokasi, "../foto_produk/$nama");

		$conn->query("UPDATE produk SET nama_produk = '$_POST[nama]', harga_produk = '$_POST[harga]', kategori_produk = '$_POST[kategori]', berat = '$_POST[berat]', foto_produk=$nama, deskripsi_produk='$_POST[deskripsi]', Stok = '$_POST[stok]' WHERE id_produk = '$_GET[id]'") or die(mysqli_error($conn));
	} else {
		$conn->query("UPDATE produk SET nama_produk = '$_POST[nama]', harga_produk = '$_POST[harga]', kategori_produk = '$_POST[kategori]', berat = '$_POST[berat]', deskripsi_produk='$_POST[deskripsi]', Stok = '$_POST[stok]' WHERE id_produk = '$_GET[id]'") or die(mysqli_error($conn));
	}

	echo "<div class='alert alert-info'> Data Tersimpan </div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
}
?>