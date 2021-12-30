<?php
include 'config/koneksi.php';
//variabel nisn yang dikirimkan form.php
$nama = $_GET['nama_kursus'];

//mengambil data
$query = mysqli_query($koneksi, "SELECT * FROM kursus WHERE nama_kursus = '$nama'");
$row = mysqli_fetch_array($query);
$data = array(
    'id'           => $row['id_kursus'],
    'nama'          =>  $row['nama_kursus'],
    'biaya'    => $row['biaya']
);
//tampil data
echo json_encode($data);
