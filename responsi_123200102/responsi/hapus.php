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
        <form action="processedit.php" method="POST">
            <div class="modal-content">
                <div class="modal-header justify-content-center" style="background-color: rgb(72, 74, 88);">
                    <h5 class="modal-title text-light" id="labeleditData">Hapus Data Inventaris</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?= $row->id ?>">
                    <p>Yakin ingin menghapus <?= $row->nama_barang ?></p>
                </div>
                <div class="modal-footer justify-content-center">
                    <input type="submit" class="btn btn-success w-25" value="Simpan" name="submit">
                    <button type="button" class="btn btn-danger w-25" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>

