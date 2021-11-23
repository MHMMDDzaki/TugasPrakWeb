
<?php
	$sql = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '$_GET[id]'") or die(mysqli_error($conn));
	$data = mysqli_fetch_assoc($sql);
	$fotoproduk = $data['foto_produk'];
	if(file_exists("../foto_produk/$fotoproduk")){
		unlink("../foto_produk/$fotoproduk");
	}
	
	$del = mysqli_query($conn, "DELETE FROM produk WHERE id_produk='$_GET[id]'") or die(mysqli_error($conn));

	echo '<script>alert("Berhasil menghapus data."); document.location="index.php?halaman=produk";</script>';
?>