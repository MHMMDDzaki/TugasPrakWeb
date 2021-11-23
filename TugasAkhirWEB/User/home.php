<div class="container">
    <h3 class="text-black">Produk Buku</h3>
    <div class="row">
        <?php $sql = mysqli_query($conn, "SELECT * FROM produk") or die(mysqli_error($conn)); ?>
        <?php while ($isi = mysqli_fetch_assoc($sql)) { ?>
            <div class="col-md-3">
                <div class="card mb-3 rounded">
                    <img src="./assets/foto_produk/<?php echo $isi['foto_produk']; ?>" class="img rounded-top">
                    <div class="card-body pt-0 ps-3 pb-4">
                        <h4 style="color: black;"><?php echo $isi['nama_produk']; ?></h4>
                        <h7 class="bg-danger px-2 rounded-pill" style="color: white;"><?php echo $isi['kategori_produk']; ?></h7>
                        <h5 class="mt-2" style="color: black;">Rp.<?php echo number_format($isi['harga_produk']); ?></h5>
                        <div class="btn-group">
                            <a href="beli.php?id=<?php echo $isi['id_produk']; ?>" class="btn btn-primary rounded-3 px-3 me-2">Beli</a>
                            <button type="button" class="btn btn-primary rounded-3" data-bs-toggle="modal" data-bs-target="#id<?php echo $isi['id_produk']; ?>">
                                Detail
                            </button>
                        </div>

                    </div>
                </div>
            </div>

            <div class="modal fade" id="id<?php echo $isi['id_produk']; ?>" tabindex="-1" aria-labelledby="labelmodal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body" style="height: 75vh;">
                            <img src="./assets/foto_produk/<?php echo $isi['foto_produk']; ?>" class="imgModal rounded-top">
                            <h4 style="color: black;"><?php echo $isi['nama_produk']; ?></h3>
                            <h6 style="color: black;">Deskripsi : </h6>
                            <p style="color: black;"><?php echo $isi['deskripsi_produk']; ?></p>
                            <h6 style="color: black;">Stok Tersedia : <?php echo $isi['Stok'] ?></h6>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>
    </div>
</div>

<style>
    .img {
        width: 100%;
        height: 250px;
        background-position: center center;
        overflow: hidden;
        border: 2px solid black;
        position: relative;
        background-size: cover;
        margin-bottom: 10px;
    }

    .imgModal {
        width: 100%;
        height: 450px;
        overflow: hidden;
        background-size: cover;
        margin-bottom: 10px;
    }
</style>