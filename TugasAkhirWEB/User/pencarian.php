<?php

include 'conn.php';
$cari = $_GET["cari"];
$semua = array();
$sql = mysqli_query($conn, "SELECT*FROM produk WHERE nama_produk LIKE '%$cari%' OR deskripsi_produk LIKE '%$cari%'");

while ($data = mysqli_fetch_assoc($sql)) {
    $semua[] = $data;
}
?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Menu Pencarian</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>

<body>
    <div class="mx-0 px-0">
        <nav class="navbar position-sticky default-layout-navbar col-lg-12 col-12 shadow-sm p-3 mb-0 bg-body rounded">
            <div class="container-fluid">
                <a href="index.php" class="navbar-brand" style="color: black;">
                    TOKO BUKU
                    <img src="https://th.bing.com/th/id/OIP.5AIBiqVoTNtQIOGzVOeEJwHaFO?w=256&h=180&c=7&r=0&o=5&dpr=2&pid=1.7" alt="" width="30" height="24" class="d-inline-block align-text-top">
                </a>
            </div>
        </nav>
    </div>
    <section class="pt-5" style="height: 100vh; background: #5F9EA0;">
        <div class="container">
            <h5>Hasil Pencarian : <?php echo $cari ?></h5>
            <?php
            if (empty($semua)) :
            ?>
                <div class="alert alert-danger"><?php echo $cari ?> tidak ditemukan!!</div>
            <?php
            endif
            ?>
            <div class="row">
                <?php foreach ($semua as $key => $isi) : ?>
                    <div class="col-md-3">
                        <div class="card mb-3 rounded">
                            <img src="./assets/foto_produk/<?php echo $isi['foto_produk']; ?>" class="img rounded-top">
                            <div class="card-body pt-0 ps-3 pb-4">
                                <h4 style="color: black;"><?php echo $isi['nama_produk']; ?></h4>
                                <h7 class="bg-danger px-2 rounded-pill" style="color: white;"><?php echo $isi['kategori_produk']; ?></h7>
                                <h5 class="mt-2" style="color: black;">Rp.<?php echo number_format($isi['harga_produk']); ?></h5>
                                <div class="btn-group">
                                    <a href="beli.php?id=<?php echo $isi['id_produk']; ?>" class="btn btn-primary rounded-3 px-3 me-2">Beli</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>

</body>

</html>