<?php
// include koneksi
include "DB.php";
//buat sql
$sql= "INSERT INTO mahasiswa (nim,nama,alamat,jkl,agama,email,pwd,created_at,updated_at) VALUES ('123458', 'aditya', 'sipakuarea', 
'PRIA', 'islam', 'pohan@gmail.com', '123456', current_timestamp(), '2024-04-22 10:38:06')";
//proses sql database
$q=mysqli_query($koneksi,$sql) or die('SQL eror');
if($q){
    echo "Data Berhasil di simpan";
}else {
    echo "Gagal menyimpan data!!";
}
?>