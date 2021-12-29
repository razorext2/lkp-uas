<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Informasi Detail Peserta</h3>
                </div>
                <div class="panel-body">
                    <!--Menampilkan data detail arsip-->
                    <?php
                    $sql = "SELECT * FROM peserta WHERE no_id ='" . $_GET['id'] . "'";
                    //proses query ke database
                    $query = mysqli_query($koneksi, $sql) or die("SQL Detail error");
                    //Merubaha data hasil query kedalam bentuk array
                    $data = mysqli_fetch_array($query);
                    ?>

                    <!--dalam tabel--->
                    <table class="table table-responsive table-bordered table-striped table-hover">
                        <tr>
                            <td width="200">Nama Peserta :</td>
                            <td><?= $data['nama_peserta'] ?></td>
                        </tr>
                        <tr>
                            <td width="200">Jenis Kelamin :</td>
                            <td><?= $data['jenis_kelamin'] ?></td>
                        </tr>
                        <tr>
                            <td>Pendidikan :</td>
                            <td><?= $data['pendidikan'] ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Pendaftaran :</td>
                            <td><?= $data['tanggal_pendaftaran'] ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kursus :</td>
                            <td><?= $data['id_kursus'] ?></td>
                        </tr>
                        <tr>
                            <td>Nomor Hp :</td>
                            <td><?= $data['nomor_hp'] ?></td>
                        </tr>
                        <tr>
                            <td>Alamat :</td>
                            <td><?= $data['alamat'] ?></td>
                        </tr>
                        <tr>
                            <td>Status :</td>
                            <td><?= $data['status'] ?></td>
                        </tr>

                    </table>

                </div>
                <!--end panel-body-->
                <!--panel footer-->
                <div class="panel-footer">
                    <a href="?page=peserta&actions=tampil" class="btn btn-success btn-sm">
                        Kembali Ke Data Peserta </a>

                </div>
                <!--end panel footer-->
            </div>

        </div>
    </div>
</div>