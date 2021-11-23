<?php
	$sql = mysqli_query($conn, "SELECT * FROM pelanggan WHERE id_pelanggan = '$_GET[id]'") or die(mysqli_error($conn));
	$data = mysqli_fetch_assoc($sql);
	
	$del = mysqli_query($conn, "DELETE FROM pelanggan WHERE id_pelanggan='$_GET[id]'") or die(mysqli_error($conn));

	echo '<script>alert("Berhasil menghapus data."); document.location="index.php?halaman=pelanggan";</script>';
?>