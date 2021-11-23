<h2>Tambah Pelanggan</h2>
<div class="container" style="margin-top:20px">

	<form enctype="multipart/form-data" method="post">
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">email</label>
			<div class="col-sm-10">
				<input type="text" name="email" class="form-control">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Password</label>
			<div class="col-sm-10">
				<input type="text" name="password" class="form-control">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Nama</label>
			<div class="col-sm-10">
				<input type="text" name="nama" class="form-control">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Telephone</label>
			<div class="col-sm-10">
				<input type="text" name="telephone" class="form-control">
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


	$sql = mysqli_query($conn, "INSERT INTO pelanggan(email_pelanggan,password_pelanggan,nama_pelanggan,telepon_pelanggan) VALUES('$_POST[email]','$_POST[password]','$_POST[nama]','$_POST[telephone]')") or die(mysqli_error($conn));

	echo "<div class='alert alert-info'> Data Tersimpan </div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=pelanggan'>";
}
?>