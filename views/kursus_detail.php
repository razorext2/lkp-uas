<div class="container">
    <div class="row">
        <div class="col-6 text-sm">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row mb-2">
                        <div class="col-auto">
                            <a href="?page=kursus&actions=tampil" class="btn bg-gradient-primary p-2"> Kembali </a>
                        </div>
                        <div class="col-auto">
                            <h4> Detail Kursus </h4>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <!--Menampilkan data detail arsip-->
                    <?php
                    $sql = "SELECT *FROM kursus WHERE id_kursus ='" . $_GET['id'] . "'";
                    //proses query ke database
                    $query = mysqli_query($koneksi, $sql) or die("SQL Detail error");
                    //Merubaha data hasil query kedalam bentuk array
                    $data = mysqli_fetch_array($query);
                    ?>

                    <!--dalam tabel--->
                    <table class="table table-hover">
                        <tr>
                            <td width="200">ID Kursus</td>
                            <td>:</td>
                            <td><?= $data['id_kursus'] ?></td>
                        </tr>
                        <tr>
                            <td>Nama Kursus</td>
                            <td>:</td>
                            <td><?= $data['nama_kursus'] ?></td>
                        </tr>
                        <tr>
                            <td>Biaya Kursus</td>
                            <td>:</td>
                            <td><?= 'Rp. ' . number_format($data['biaya'], 2, ',', '.') ?></td>
                        </tr>
                        <tr>
                            <td>Nama Instruktur</td>
                            <td>:</td>
                            <td><?= $data['id_instruktur'] ?></td>
                        </tr>
                        <tr>
                            <td>Jumlah Pertemuan</td>
                            <td>:</td>
                            <td><?= $data['jmlh_pertemuan'] ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>