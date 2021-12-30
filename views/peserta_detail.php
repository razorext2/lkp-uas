<div class="container">
    <div class="row">
        <div class="col-xs-6 text-sm">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row mb-2">
                        <div class="col-auto">
                            <a href="?page=peserta&actions=tampil" class="btn bg-gradient-primary p-2"> Kembali </a>
                        </div>
                        <div class="col-auto">
                            <h4> Data Peserta Kursus </h4>
                        </div>
                    </div>
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
                    <table class="table table-responsive table-hover">
                        <tr>
                            <td width="200">Nama Peserta</td>
                            <td> : </td>
                            <td><?= $data['nama_peserta'] ?></td>
                        </tr>
                        <tr>
                            <td width="200">Jenis Kelamin</td>
                            <td> : </td>
                            <td><?= $data['jenis_kelamin'] ?></td>
                        </tr>
                        <tr>
                            <td>Pendidikan</td>
                            <td> : </td>
                            <td><?= $data['pendidikan'] ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Pendaftaran</td>
                            <td> : </td>
                            <td><?= $data['tanggal_pendaftaran'] ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kursus</td>
                            <td> : </td>
                            <td><?= $data['id_kursus'] ?></td>
                        </tr>
                        <tr>
                            <td>Nomor Hp</td>
                            <td> : </td>
                            <td><?= $data['nomor_hp'] ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td> : </td>
                            <td><?= $data['alamat'] ?></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td> : </td>
                            <td>
                                <?php
                                $i = $data['status'];

                                if ($data['status'] == "lulus") { ?>
                                    <span class="badge badge-pill bg-gradient-success"> <?= $i ?> </span>
                                <?php } else { ?>
                                    <span class="badge badge-pill bg-gradient-primary"> <?= $i ?> </span>
                                <?php } ?>
                            </td>
                        </tr>

                    </table>

                </div>
            </div>

        </div>
    </div>
</div>