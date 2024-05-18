<?php
include_once "DB.php";
$sql = "SELECT * FROM mahasiswa";
$q = mysqli_query($koneksi, $sql);
?>
 <h2><b>DATA MAHASISWA</b></h2>
      <a href="form.php" class="btn btn-primary mt-4 mb-2 ms-5" role="button"><i class="bi bi-cloud-download"></i>
            Tambah
            Data</a>
      <a target="_blank" href="print.php" class="btn btn-secondary mt-4 mb-2 ms-2" role="button"><i
                  class="bi bi-printer"></i>
            Print</a>

<table width="100%" border="1">
    <thead>
        <tr>
            <th>NO</th>
            <th>Nim</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>Agama</th>
            <th>Email</th>
            <th>Pwd</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        while ($data = mysqli_fetch_assoc($q)) {
        ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $data['nim'] ?></td>
            <td><?= $data['nama'] ?></td>
            <td><?= $data['alamat'] ?></td>
            <td><?= $data['jkl'] ?></td>
            <td><?= $data['agama'] ?></td>
            <td><?= $data['email'] ?></td>
            <td><?= $data['pwd'] ?></td>
            <td>
                <a href="edit.php?nim=<?= $data['nim'] ?>">Edit</a> |
                <a href="delete.php?nim=<?= $data['nim'] ?>">Delete</a>
            </td>
        </tr>
        <?php $no++;
        } ?>
    </tbody>
</table>