<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-user-plus"></span> Laporan Arsip</h3>
                </div>
                <div class="panel-body">
                    <table id="dtskripsi" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
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
                       
                            <tr>
                                <td colspan="9">
                                    <a href="laporan/arsip_peserta.php" target="_blank" class="btn btn-info btn-sm">
                                        <span class="fa fa_print"></span> Cetak Data Peserta

                                    </a>
                                </td>
                            </tr>
                       
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>


