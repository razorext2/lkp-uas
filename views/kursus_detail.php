<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Informasi Detail Instruktur</h3>
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
                    <table class="table table-bordered table-striped table-hover">
                        <tr>
                            <td width="200">Id Kursus</td>
                            <td><?= $data['id_kursus'] ?></td>
                        </tr>
                        <tr>
                            <td width="200">Nama Kursus</td>
                            <td><?= $data['nama_kursus'] ?></td>
                        </tr>
                        <tr>
                            <td>Biaya Kursus</td>
                            <td><?= $data['biaya'] ?></td>
                        </tr>
                        <tr>
                            <td>Nama Instruktur</td>
                            <td><?= $data['id_instruktur'] ?></td>
                        </tr>
                        <tr>
                            <td>Jumlah Pertemuan</td>
                            <td><?= $data['jmlh_pertemuan'] ?></td>
                        </tr>


                    </table>

                </div>
                <!--end panel-body-->
                <!--panel footer-->
                <div class="panel-footer">
                    <a href="?page=kursus&actions=tampil" class="btn btn-success btn-sm">
                        Kembali Ke Data Kursus </a>

                </div>
                <!--end panel footer-->
            </div>

        </div>
    </div>
</div>