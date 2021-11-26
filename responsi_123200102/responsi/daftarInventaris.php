<?php
include "connection.php";

$query = "SELECT * FROM inventaris";
$execute = mysqli_query($connect, $query);
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
      while ($row = mysqli_fetch_object($execute)) {
      ?>
        <tr>
          <th scope="row"><?= $row->id ?></th>
          <td><?= $row->kode_barang ?></td>
          <td><?= $row->nama_barang ?></td>
          <td><?= $row->jumlah ?></td>
          <td><?= $row->satuan ?></td>
          <td><?= $row->tgl_datang ?></td>
          <td><?= $row->kategori ?></td>
          <td><?= $row->status_barang ?></td>
          <td><?= $row->harga ?></td>
          <td><?= $row->harga * $row->jumlah ?></td>
          <td class="btn-group" role="group" aria-label="Basic outlined example">
            <button type="button" class="btn btn-outline-primary"><a href="edit.php?id=<?= $row->id ?>" class="text-decoration: none;">Edit</a></button>
            <button type="button" class="btn btn-outline-primary"><a href="hapus.php?id=<?= $row->id ?>" class="text-decoration: none;">Hapus</a></button>
          </td>
        </tr>
      <?php
      }
      ?>
      
    </tbody>
  </table>
</div>