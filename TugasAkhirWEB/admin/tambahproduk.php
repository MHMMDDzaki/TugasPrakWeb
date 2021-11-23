<h2>Tambah Buku</h2>
<div class="container" style="margin-top:20px">

	<form enctype="multipart/form-data" method="post">
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Nama</label>
			<div class="col-sm-10">
				<input type="text" name="nama" class="form-control">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Kategori</label>
			<div class="col-sm-10">
				<select name="kategori" class="form-control" required>
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
				<input type="number" name="harga" class="form-control">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Berat (gr.)</label>
			<div class="col-sm-10">
				<input type="number" name="berat" class="form-control">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Deskripsi</label>
			<div class="col-sm-10">
				<textarea class="form-control" name="deskripsi" rows="10"></textarea>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Foto</label>
			<div class="col-sm-10">
				<input type="file" name="foto" class="form-control">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">STOK : </label>
			<div class="col-sm-10">
				<input type="number" name="stok" class="form-control">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">&nbsp;</label>
			<div class="col-sm-10">
				<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</div>
	</form>

</div>


<?php
if (isset($_POST['submit'])) {

	$nama = $_FILES['foto']['name'];
	$lokasi = $_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasi, "../foto_produk/" . $nama);

	$sql = mysqli_query($conn, "INSERT INTO produk(nama_produk,harga_produk,berat,foto_produk,kategori_produk,deskripsi_produk, Stok) VALUES('$_POST[nama]','$_POST[harga]','$_POST[berat]','$nama','$_POST[kategori]','$_POST[deskripsi]','$_POST[Stok]')") or die(mysqli_error($conn));

	echo "<div class='alert alert-info'> Data Tersimpan </div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
}
?>