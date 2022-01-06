<div class="container">
    <div class="row">
        <div class="col-xs-6 text-sm">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row mb-2">
                        <div class="col-auto">
                            <a href="?page=pembayaran&actions=tampil" class="btn bg-gradient-primary p-2"> Kembali </a>
                        </div>
                        <div class="col-auto">
                            <h4> Informasi Detail Pembayaran </h4>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <!--Menampilkan data detail arsip-->
                    <?php
                    $sql = "SELECT *FROM bayar WHERE id_bayar ='" . $_GET['id'] . "'";
                    //proses query ke database
                    $query = mysqli_query($koneksi, $sql) or die("SQL Detail error");
                    //Merubaha data hasil query kedalam bentuk array
                    $data = mysqli_fetch_array($query);
                    ?>

                    <!--dalam tabel--->
                    <table class="table table-hover">
                        <tr>
                            <td width="200">Nama Peserta </td>
                            <td> : </td>
                            <td><?= $data['nama_peserta'] ?></td>
                        </tr>
                        <tr>
                            <td width="200">Jenis Kursus</td>
                            <td> : </td>
                            <td><?= $data['nama_kursus'] ?></td>
                        </tr>
                        <tr>
                            <td>Biaya Kursus (Rp)</td>
                            <td> : </td>
                            <td><?= "Rp. " . number_format($data['biaya_awal'], 2, ',', '.') ?></td>
                        </tr>
                        <tr>
                            <td>Jumlah Bayar (Rp)</td>
                            <td> : </td>
                            <td><?= "Rp. " . number_format($data['jmlh_bayar'], 2, ',', '.') ?></td>
                        </tr>
                        <tr>
                            <td>Sisa (Rp)</td>
                            <td> : </td>
                            <td><?= "Rp. " . number_format($data['status'], 2, ',', '.') ?></td>
                        </tr>
                    </table>
                </div>
                <div class="row mb-2">
                    <div class="col-auto">
                        <a target="_blank" href="report/pembayaran_laporan.php?nama=<?= $data['nama_peserta']; ?>" class="btn bg-gradient-primary p-2"> Print Bukti Pembayaran </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>