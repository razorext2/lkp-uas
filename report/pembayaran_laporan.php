<!DOCTYPE html>
<html>

<head>
    <title>Cetak Bukti Pembayaran</title>
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
                    <h5 class="py-0 text-center">Catatan Pembayaran Peserta Didik LKP SRH Training Center </h5>
                    <h6 class="py-0 text-center"> Pulau Rakyat Pekan Ds. 2, Pulau Rakyat Tua, Pulau Rakyat</h6>
                    <h5 class="py-0 text-center"> Kabupaten Asahan, Sumatera Utara, Kode Pos : 21273</h5>
                    <hr>
                    <h4 class="py-0 text-center">Data Pembayaran Peserta : <?= $_GET['nama']; ?> </h4>
                    <table class="table table-hover text-sm">

                        <thead>
                            <tr>
                                <th width="200" class="text-center">No.</th>
                                <th>Nama Peserta</th>
                                <th>Jumlah Bayar</th>
                                <th>Sisa</th>
                                <th>Tanggal Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--ambil data dari database, dan tampilkan kedalam tabel-->
                            <?php
                            //buat sql untuk tampilan data, gunakan kata kunci select
                            $nama   = str_replace('%20', ' ', $_GET['nama']);
                            $sql    = "SELECT * FROM catatan_pembayaran WHERE nama_peserta = '$nama'";
                            $query  = mysqli_query($koneksi, $sql) or die("SQL Anda Salah");
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
                                    <td class="text-center"><?= $nomor ?></td>
                                    <td><?= $data['nama_peserta'] ?></td>
                                    <td><?= 'Rp. ' . number_format($data['jmlh_bayar'], 2, ',', '.') ?></td>
                                    <td class="text-center"><?php
                                                            if ($data['sisa'] == 0) {
                                                                echo "Lunas";
                                                            } else {
                                                                echo 'Rp. ' . number_format($data['sisa'], 2, ',', '.');
                                                            }

                                                            ?></td>
                                    <td class="text-center"><?= $data['tanggal'] ?></td>
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