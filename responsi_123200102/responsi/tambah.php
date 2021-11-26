<?php
session_start();
include "connection.php";
if (isset($_POST["submit"])) {
    $kode = $_POST['kode_barang'];
    $nama = $_POST['nama_barang'];
    $jumlah = $_POST['jumlah'];
    $satuan = $_POST['satuan'];
    $tanggal = $_POST['tanggal'];
    $kategori = $_POST['kategori'];
    $status = $_POST['radio'];
    $harga = $_POST['harga'];

    $query = "INSERT INTO inventaris (kode_barang,nama_barang,jumlah,satuan,tgl_datang,kategori,status_barang,harga) VALUES ('$kode','$nama','$jumlah','$satuan','$tanggal','$kategori','$status','$harga')";
    $execute = mysqli_query($connect, $query);

    if ($execute) {
        echo "<script>alert('Data Berhasil Diambil')</script>";
        header("location:session.php");
    } else {
        echo "<script>alert('Data Gagal')</script>";
    }
}?>
