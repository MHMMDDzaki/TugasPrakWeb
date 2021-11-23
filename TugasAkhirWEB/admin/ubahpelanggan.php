<h2>Edit Data Pelanggan</h2>


<?php
$sql = mysqli_query($conn, "SELECT * FROM pelanggan WHERE id_pelanggan = '$_GET[id]'") or die(mysqli_error($conn));
$data = mysqli_fetch_assoc($sql);

echo "<pre>";
print_r($data);
echo "</pre>";
?>
<div class="container" style="margin-top:20px">

	<form enctype="multipart/form-data" method="post">
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">email</label>
			<div class="col-sm-10">
				<input type="text" name="email" class="form-control" value="<?php echo $data['email_pelanggan'] ?>">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Password</label>
			<div class="col-sm-10">
				<input type="text" name="password" class="form-control" value="<?php echo $data['password_pelanggan'] ?>">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Nama</label>
			<div class="col-sm-10">
				<input type="text" name="nama" class="form-control" value="<?php echo $data['nama_pelanggan'] ?>">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Telephone</label>
			<div class="col-sm-10">
				<input type="text" name="telephone" class="form-control" value="<?php echo $data['telepon_pelanggan'] ?>">
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

	$conn->query("UPDATE pelanggan SET email_pelanggan = '$_POST[email]', password_pelanggan = '$_POST[password]', nama_pelanggan = '$_POST[nama]', telepon_pelanggan = '$_POST[telephone]' WHERE id_pelanggan = '$_GET[id]'") or die(mysqli_error($conn));


	echo "<div class='alert alert-info'> Data Tersimpan </div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=pelanggan'>";
}
?>