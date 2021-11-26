<?php
session_start();
include "connection.php";

if (isset($_GET['id'])) {
$id = $_GET['id'];

$query = "SELECT * FROM inventaris WHERE id = '$id'";
$execute = mysqli_query($connect, $query);

$row = mysqli_fetch_object($execute);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header justify-content-center" style="background-color: rgb(72, 74, 88);">
                    <h5 class="modal-title text-light" id="labeleditData">Ubah Data Inventaris</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?= $row->id ?>">
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>

