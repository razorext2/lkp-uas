<!DOCTYPE html>
<html>

<head>
    <title>Cetak Data Semua Peserta</title>
    <link href="../assets/css/soft-ui-dashboard.min.css" rel="stylesheet" type="text/css" />
</head>

<body onload="print()">
    <!--Menampilkan data detail arsip-->
    <?php
    include '../config/koneksi.php';
    ?>

    <div class="container">
        <div class='row'>
            <div class="col-sm-12">
                <!--dalam tabel--->
                <div>
                    <h5 class="py-0 text-center">Data Lulusan LKP SRH Training Center </h5>
                    <h6 class="py-0 text-center"> Pulau Rakyat Pekan Ds. 2, Pulau Rakyat Tua, Pulau Rakyat </h6>
                    <h5 class="py-0 text-center">Kabupaten Asahan, Sumatera Utara, Kode Pos : 21273</h5>
                    <hr>
                    <h4 class="py-0 text-center">Data Peserta Lulus</h4>
                    <table class="table table-bordered table-striped table-hover text-sm">

                        <thead>
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Nama Peserta</th>
                                <th>Jenis Kursus</th>
                                <th>Tanggal Pendaftaran</th>
                                <th>Alamat</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--ambil data dari database, dan tampilkan kedalam tabel-->
                            <?php
                            //buat sql untuk tampilan data, gunakan kata kunci select
                            $sql = "SELECT nama_peserta,id_kursus,tanggal_pendaftaran,alamat,status FROM peserta WHERE status = 'Lulus'";
                            $query = mysqli_query($koneksi, $sql) or die("SQL Anda Salah");
                            //Baca hasil query dari databse, gunakan perulangan untuk 
                            //Menampilkan data lebh dari satu. disini akan digunakan
                            //while dan fungdi mysqli_fecth_array
                            //Membuat variabel untuk menampilkan nomor urut
                            $nomor = 0;
                            //Melakukan perulangan u/menampilkan data
                            while ($data = mysqli_fetch_array($query)) {
                                $nomor++; //Penambahan satu untuk nilai var nomor
                            ?>
                                <tr>
                                    <td><?= $nomor ?></td>
                                    <td><?= $data['nama_peserta'] ?></td>
                                    <td><?= $data['id_kursus'] ?></td>
                                    <td><?= $data['tanggal_pendaftaran'] ?></td>
                                    <td><?= $data['alamat'] ?></td>
                                    <td><?= $data['status'] ?></td>
                                </tr>
                                <!--Tutup Perulangan data-->
                            <?php } ?>
                        </tbody>

                        <tfoot>
                            <tr>
                                <td colspan="8" class="text-right">
                                    Pulau Rakyat <?= date("d-m-Y") ?>
                                    <br><br><br>
                                    <u>SRH Training Center<strong></u><br>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
</body>

</html>