<?php
session_start();
include "connection.php";
$username = $_SESSION['username'];
if (empty($_SESSION['username'])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Halaman Session</title>
    <style>
        .top-nav {
            width: 100vw;
            padding: 2vh 0;
            background-color: rgb(72, 74, 88);
        }

        .content {
            width: 100vw;
            height: 74.85vh;
        }

        footer {
            width: 100vw;
            padding: 1vh 0;
            background-color: rgb(72, 74, 88);
        }
    </style>
</head>

<body>
    <div class="top-nav">
        <h1 class="text-center text-light">Daftar Inventaris Barang Kantor Serba Ada</h1>
    </div>
    <nav class="navbar navbar-light nav-tabs position-relative">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="session.php?halaman=beranda">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="session.php?halaman=daftarInventaris">Daftar Inventaris</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">List per Kategori</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="session.php?halaman=bangunan">Bangunan</a></li>
                    <li><a class="dropdown-item" href="session.php?halaman=kendaraan">Kendaraan</a></li>
                    <li><a class="dropdown-item" href="session.php?halaman=alatTulisKantor">Alat Tulis Kantor</a></li>
                    <li><a class="dropdown-item" href="session.php?halaman=elektronik">Elektronik</a></li>
                </ul>
            </li>
            <li class="position-absolute top-50 end-0 translate-middle-y">
                <form method="post">
                    <input type="submit" value="Logout" name="Logout" class="btn btn-outline-danger me-4">
                    <?php
                    if (array_key_exists('Logout', $_POST)) {
                        session_destroy(); //mengakhiri semua session
                        header("location:login.php");
                    }
                    ?>
                </form>
            </li>
        </ul>
    </nav>
    <div class="content">
        <!-- Button trigger modal -->
        <button type="button" class="btn text-light mx-3 mt-2" data-bs-toggle="modal" data-bs-target="#tambahdata" style="background-color: rgb(72, 74, 88);">
            + Tambah
        </button>

        <!-- Modal -->
        <div class="modal fade" id="tambahdata" tabindex="-1" aria-labelledby="labeltambahdata" aria-hidden="true">
            <div class="modal-dialog">
                <form action="tambah.php" method="POST">
                <div class="modal-content">
                    <div class="modal-header justify-content-center" style="background-color: rgb(72, 74, 88);">
                        <h5 class="modal-title text-light" id="labeltambahdata">Tambah Data Inventaris</h5>
                    </div>
                    <div class="modal-body">
                        <label for="kode" class="mb-3" style="margin-right: 18px;">Kode Barang</label>
                        <input type="text" id="kode" class="w-75" name="kode_barang">
                        <label for="nama" class="mb-3" style="margin-right: 13px;">Nama Barang</label>
                        <input type="text" id="nama" class="w-75" name="nama_barang">
                        <label for="jumlah" class="mb-3" style="margin-right: 59px;">Jumlah</label>
                        <input type="text" id="jumlah" class="w-25" style="margin-right: 200px;" name="jumlah">
                        <label for="satuan" class="mb-3" style="margin-right: 60px;">Satuan</label>
                        <input type="text" id="satuan" class="w-25" style="margin-right: 200px;" name="satuan">
                        <label for="tanggal" class="mb-3" style="margin-right: 5px;">Tanggal Datang</label>
                        <input type="date" id="tanggal" class="w-50" style="margin-right: 100px;" name="tanggal">
                        <label for="kategori" class="mb-3" style="margin-right: 50px;">Kategori</label>
                        <select name="kategori" id="kategori" style="height: 30px; margin-right: 100px;" class="w-50">
                            <option value="Bangunan" name="Bangunan">Bangunan</option>
                            <option value="Kendaraan" name="Kendaraan">Kendaraan</option>
                            <option value="Alat Tulis Kantor" name="Alat Tulis Kantor">Alat Tulis Kantor</option>
                            <option value="Elektronik" name="Elektronik">Elektronik</option>
                        </select>
                        <label for="status" style="margin-right: 65px;">Status</label>
                        <input type="radio" value="Baik" name="radio">
                        <label for="baik" style="margin-right: 10px;">Baik</label>
                        <input type="radio" value="Perawatan" name="radio">
                        <label for="perawatan" style="margin-right: 10px;">Perawatan</label>
                        <input type="radio" value="Rusak" name="radio">
                        <label for="rusak" style="margin-right: 100px;">Rusak</label>
                        <label for="harga" style="margin-right: 12px;" class="mt-3">Harga Satuan</label>
                        <input type="text" id="harga" class="w-75" name="harga">
                    </div>
                    <div class="modal-footer justify-content-center">
                        <input type="submit" class="btn btn-success w-25" value="Simpan" name="submit">
                        <button type="button" class="btn btn-danger w-25" data-bs-dismiss="modal">Batal</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <?php
        if (isset($_GET['halaman'])) {
            if ($_GET['halaman'] == 'beranda') {
                include 'beranda.php';
            } elseif ($_GET['halaman'] == 'daftarInventaris') {
                include 'daftarInventaris.php';
            } elseif ($_GET['halaman'] == 'bangunan') {
                include 'Bangunan.php';
            } elseif ($_GET['halaman'] == 'kendaraan') {
                include 'kendaraan.php';
            } elseif ($_GET['halaman'] == 'alatTulisKantor') {
                include 'alatTulisKantor.php';
            } elseif ($_GET['halaman'] == 'elektronik') {
                include 'elektronik.php';
            }
        } else {
            include 'beranda.php';
        }
        ?>
    </div>
    <footer>
        <h4 class="text-center text-light">Inventaris 2016</h4>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>