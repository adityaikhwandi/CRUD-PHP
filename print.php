<!doctype html>
<html lang="en">

<head>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <title>CETAK DATA MAHASISWA</title>
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
                    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
                    crossorigin="anonymous">

          <!-- link icons boostrap -->
          <link rel="stylesheet"
                    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

          <?php
          include_once "DB.php";
          $sql = "SELECT * FROM mahasiswa";
          $q = mysqli_query($koneksi, $sql);
          ?>

          <!-- form data awal -->
          <h2<b>CETAK DATA</b></h2>
          <!-- <a href="form.php" class="btn btn-primary mt-4 mb-2 ms-5" role="button"><i class="bi bi-cloud-download"></i>
                    Tambah
                    Data</a>
          <a href="print.php" class="btn btn-secondary mt-4 mb-2 ms-2" role="button"><i class="bi bi-printer"></i>
                    Print</a> -->
          <div class="table-responsive m-3">
                    <table class="table table-hover">
                              <thead>
                                        <tr>
                                                  <th>No</th>
                                                  <th>Nim</th>
                                                  <th>Nama</th>
                                                  <th>Alamat</th>
                                                  <th>Jenis Kelamin</th>
                                                  <th>Agama</th>
                                                  <th>Email</th>
                                                  <th>Pwd</th>
                                                  <!-- <th>Aksi</th> -->
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
                                                            <!-- <td>

                                                            <a class="btn btn-warning"
                                                                      href="update.php?nim=<?= $data['nim'] ?>"><b
                                                                                class="text-white"><i
                                                                                          class="bi bi-pencil-square"></i>
                                                                                Edit</b></a>
                                                            <a class="btn btn-danger"
                                                                      href="delete.php?nim=<?= $data['nim'] ?>"><b
                                                                                class="text-white"><i
                                                                                          class="bi bi-trash"></i>
                                                                                Delete</b></a>
                                                  </td> -->
                                                  </tr>
                                                  <?php $no++;
                                        } ?>
                              </tbody>
                    </table>
                    <script type="text/javascript">
                              window.print();
                    </script>
          </div>
          <!-- form data end -->
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
                    crossorigin="anonymous"></script>
</body>

</html>