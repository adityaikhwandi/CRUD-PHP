<!doctype html>
<html lang="en">


<body>
          <!-- form awal -->
          <h2 class="text-center p-5 text-danger"><b>UPDATE DATA</b></h2>
          <div class="container">
                    <?php

                    //Include file koneksi, untuk koneksikan ke database
                    include "DB.php";

                    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
                    function input($data)
                    {
                              $data = trim($data);
                              $data = stripslashes($data);
                              $data = htmlspecialchars($data);
                              return $data;
                    }
                    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama nim
                    if (isset($_GET['nim'])) {
                              $nim = input($_GET["nim"]);

                              $sql = "SELECT * FROM mahasiswa WHERE nim=$nim";
                              $hasil = mysqli_query($koneksi, $sql);
                              $data = mysqli_fetch_assoc($hasil);
                    }

                    //Cek apakah ada kiriman form dari method post
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {

                              $nim = htmlspecialchars($_POST["nim"]);
                              $nama = input($_POST["nama"]);
                              $alamat = input($_POST["alamat"]);
                              $jkl = input($_POST["jkl"]);
                              $email = input($_POST["email"]);
                              $pwd = input($_POST["pwd"]);

                              //Query update data pada tabel mahasiswa
                              $sql = "update mahasiswa set
			nim='$nim',
			nama='$nama',
			alamat='$alamat',
			email='$email',
			jkl='$jkl',
			pwd='$pwd'
			where nim =$nim";

                              //Mengeksekusi atau menjalankan query diatas
                              $hasil = mysqli_query($koneksi, $sql);

                              //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
                              if ($hasil) {
                                        header("Location:read.php");
                              } else {
                                        echo "<div class='alert alert-danger'> Data Gagal diupdate.</div>";

                              }

                    }

                    ?>


                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                              <div class="form-group mb-3">
                                        <label>Nim:</label>
                                        <input type="text" name="nim" class="form-control"
                                                  value="<?php echo $data['nim']; ?>" placeholder="Masukan Nim"
                                                  required />

                              </div>
                              <div class="form-group mb-3">
                                        <label>Nama:</label>
                                        <input type="text" name="nama" class="form-control"
                                                  value="<?php echo $data['nama']; ?>" placeholder="Masukan Nama"
                                                  required />

                              </div>
                              <div class="form-group mb-3">
                                        <label>Alamat:</label>
                                        <textarea name="alamat" class="form-control" rows="5"
                                                  placeholder="Masukan Alamat"
                                                  required><?php echo $data['alamat']; ?></textarea>

                              </div>
                              <div class="form-group mb-3">
                                        <label>Email:</label>
                                        <input type="email" name="email" class="form-control"
                                                  value="<?php echo $data['email']; ?>" placeholder="Masukan Email"
                                                  required />
                              </div>
                              <div class="form-group mb-3">
                                        <label>Jenis Kelamin:</label>
                                        <input type="text" name="jkl" class="form-control"
                                                  value="<?php echo $data['jkl']; ?>"
                                                  placeholder="Masukan Jenis Kelamin" required />
                              </div>
                              <div class="form-group mb-3">
                                        <label>Agama:</label>
                                        <input type="text" name="agama" class="form-control"
                                                  value="<?php echo $data['agama']; ?>" placeholder="Masukan Agama"
                                                  required />
                              </div>
                              <div class="form-group mb-3">
                                        <label>Pwd:</label>
                                        <input type="text" name="pwd" class="form-control"
                                                  value="<?php echo $data['pwd']; ?>" placeholder="Masukan Password"
                                                  required />
                              </div>

                              <input type="hidden" name="nim" value="<?php echo $data['nim']; ?>" />

                              <button type="submit" name="submit" class="btn btn-warning"><b> Update</b></button>
                    </form>
                </div>
</body>

</html>