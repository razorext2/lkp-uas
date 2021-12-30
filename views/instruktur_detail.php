<div class="container">
    <div class="row">
        <div class="col-xs-6 text-sm">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row mb-2">
                        <div class="col-auto">
                            <a href="?page=instruktur&actions=tampil" class="btn bg-gradient-primary p-2"> Kembali </a>
                        </div>
                        <div class="col-auto">
                            <h4> Data Instruktur </h4>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <!--Menampilkan data detail arsip-->
                    <?php
                    $sql = "SELECT *FROM instruktur WHERE id_instruktur ='" . $_GET['id'] . "'";
                    //proses query ke database
                    $query = mysqli_query($koneksi, $sql) or die("SQL Detail error");
                    //Merubaha data hasil query kedalam bentuk array
                    $data = mysqli_fetch_array($query);
                    ?>

                    <!--dalam tabel--->
                    <table class="table table-hover">
                        <tr>
                            <td width="200">ID Instruktur</td>
                            <td>:</td>
                            <td><?= $data['id_instruktur'] ?></td>
                        </tr>
                        <tr>
                            <td>Nama Instruktur</td>
                            <td>:</td>
                            <td><?= $data['nama_instruktur'] ?></td>
                        </tr>
                        <tr>
                            <td>No HP</td>
                            <td>:</td>
                            <td><?= $data['no_hp'] ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td><?= $data['alamat'] ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td><?= $data['jenis_klmn'] ?></td>
                        </tr>
                        <tr>
                            <td>Mulai Bekerja</td>
                            <td>:</td>
                            <td><?= $data['tanggal_kerja'] ?></td>
                        </tr>
                        <tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>