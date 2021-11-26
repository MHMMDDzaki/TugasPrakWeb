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

    $query = "UPDATE inventaris set kode_barang='$kode',nama_barang='$nama',jumlah='$jumlah',satuan='$satuan',tgl_datang='$tanggal',kategori='$kategori',status_barang='$status',harga='$harga'";
    $execute = mysqli_query($connect, $query);

    if ($execute) {
        echo "<script>alert('Data Berhasil diupdate ')</script>";
        header("location:session.php");
    } else {
        echo "<script>alert('Data Gagal')</script>";
        header("location:session.php");
    }
} ?>