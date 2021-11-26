<?php 
    include "connection.php";

    $query = "SELECT * FROM inventaris WHERE kategori = 'kendaraan'";
    $execute = mysqli_query($connect,$query);
?>
<div class="" style="width: 100vw;">
<table class="table table-striped mx-auto" style="max-width: 1100px;">
  <thead class="table-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Kode</th>
      <th scope="col">Nama Barang</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Satuan</th>
      <th scope="col">Tanggal Datang</th>
      <th scope="col">Kategori</th>
      <th scope="col">Status</th>
      <th scope="col">Harga Satuan</th>
      <th scope="col">Total Harga</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $i = 1; 
        while($row = mysqli_fetch_object($execute)){
    ?>
    <tr>
      <th scope="row"><?=$i?></th>
      <td><?=$row->kode_barang?></td>
      <td><?=$row->nama_barang?></td>
      <td><?=$row->jumlah?></td>
      <td><?=$row->satuan?></td>
      <td><?=$row->tgl_datang?></td>
      <td><?=$row->kategori?></td>
      <td><?=$row->status_barang?></td>
      <td><?=$row->harga?></td>
      <td><?=$row->harga * $row->jumlah?></td>
      <td class="btn-group" role="group" aria-label="Basic outlined example">
        <button type="button" class="btn btn-outline-primary">Edit</button>
        <button type="button" class="btn btn-outline-primary">Hapus</button>
      </td>
    </tr>
    <?php
        $i++;   
        }
    ?>
  </tbody>
</table>
</div>
