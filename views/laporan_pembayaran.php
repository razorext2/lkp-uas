<div class="container">
    <div class="row">
        <div class="col-12 text-sm">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row mb-2">
                        <div class="col-auto">
                            <a href="?page=pembayaran&actions=tampil" class="btn bg-gradient-primary p-2"> Kembali </a>
                        </div>
                        <div class="col-auto">
                            <h4> Data Pembayaran Peserta </h4>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn bg-gradient-primary p-2" data-bs-toggle="modal" data-bs-target="#cetak_perbulan">
                                <span class="fa fa-print"></span> Cetak Perbulan
                            </button>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn bg-gradient-primary p-2" data-bs-toggle="modal" data-bs-target="#cetak_pertahun">
                                <span class="fa fa-print"></span> Cetak Pertahun
                            </button>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-hover table-striped align-items-center mb-0">
                        <thead>
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Nama Peserta</th>
                                <th>Jumlah Bayar</th>
                                <th>Sisa</th>
                                <th>Tanggal Pembayaran</th>
                                <?php if ($_SESSION['level'] == 1) : ?>
                                    <th>Aksi</th>
                                <?php endif ?>
                            </tr>
                        </thead>
                        <tbody>
                            <!--ambil data dari database, dan tampilkan kedalam tabel-->
                            <?php
                            //buat sql untuk tampilan data, gunakan kata kunci select
                            $sql = "SELECT * FROM catatan_pembayaran";
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
                                    <td class="text-center"><?= $nomor ?></td>
                                    <td><?= $data['nama_peserta'] ?></td>
                                    <td class="text-center"><?= "Rp. " . number_format($data['jmlh_bayar'], 2, ',', '.'); ?></td>
                                    <td>
                                        <?php
                                        if ($data['sisa'] == 0) {
                                            echo "Lunas";
                                        } else {
                                            echo "Rp. " . number_format($data['sisa'], 2, ',', '.');
                                        }

                                        ?>
                                    </td>
                                    <td class="text-center"><?= $data['tanggal'] ?></td>
                                    <?php if ($_SESSION['level'] == 1) : ?>
                                        <td>
                                            <a href="?page=laporan&actions=delete&id=<?= $data['id_bayar'] ?>" class="btn btn-danger btn-xs">
                                                <span class="fa fa-remove"></span>
                                            </a>
                                        </td>
                                    <?php endif ?>

                                </tr>
                                <!--Tutup Perulangan data-->
                            <?php } ?>

                        </tbody>
                        <tr>
                            <td colspan="9">

                            </td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="cetak_perbulan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Pilih Bulan dan Tahun Laporan </h5>
                <button type="button" class="btn-close btn-sm bg-danger" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                <form target="_blank" class="form-horizontal" action="report/arsip_perbulan.php" method="post">
                    <div class="form-group">
                        <label for="bulan" class="control-label">Pilih Bulan :</label>
                        <select name="bulan" class="form-control">
                            <option value="12"> Desember </option>
                            <option value="11"> November </option>
                            <option value="10"> Oktober </option>
                            <option value="09"> September </option>
                            <option value="08"> Agustus </option>
                            <option value="07"> Juli </option>
                            <option value="06"> Juni </option>
                            <option value="05"> Mei </option>
                            <option value="04"> April </option>
                            <option value="03"> Maret </option>
                            <option value="02"> Februari </option>
                            <option value="01"> Januari </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tahun" class="control-label">Pilih Tahun :</label>
                        <select name="tahun" class="form-control">
                            <?php
                            for ($i = substr(date("d-m-Y"), 6, 4); $i > substr(date("d-m-Y"), 6, 4) - 5; $i--) { ?>
                                <option value="<?= $i ?>"> <?= $i ?> </option>
                            <?php  }
                            ?>
                        </select>
                    </div>
                    <button class="btn btn-sm bg-gradient-primary" type="submit">Proses</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="cetak_pertahun" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Pilih Tahun Laporan </h5>
                <button type="button" class="btn-close btn-sm bg-danger" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                <form target="_blank" action="report/arsip_pertahun.php" method="post">
                    <div class="form-group">
                        <label for="tahun" class="control-label">Pilih Tahun :</label>
                        <select name="tahun" class="form-control">
                            <?php
                            for ($i = substr(date("d-m-Y"), 6, 4); $i > substr(date("d-m-Y"), 6, 4) - 5; $i--) { ?>
                                <option value="<?= $i ?>"> <?= $i ?> </option>
                            <?php  }
                            ?>
                        </select>
                    </div>
                    <button class="btn btn-sm bg-gradient-primary" type="submit">Proses</button>
                </form>
            </div>
        </div>
    </div>
</div>