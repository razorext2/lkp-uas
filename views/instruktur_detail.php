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
                    $sql = "SELECT *FROM instruktur WHERE id_instruktur ='" . $_GET ['id'] . "'";
                    //proses query ke database
                    $query = mysqli_query($koneksi, $sql) or die("SQL Detail error");
                    //Merubaha data hasil query kedalam bentuk array
                    $data = mysqli_fetch_array($query);
                    ?>   

                    <!--dalam tabel--->
                    <table class="table table-bordered table-striped table-hover"> 
                        <tr>
                            <td width="200">Id Instruktur :</td> <td><?= $data['id_instruktur'] ?></td>
                        </tr>
                        <tr>
                            <td width="200">Nama Instruktur :</td> <td><?= $data['nama_instruktur'] ?></td>
                        </tr>
                        <tr>
                            <td>No HP :</td> <td><?= $data['no_hp'] ?></td>
                        </tr>
                        <tr>
                            <td>Alamat :</td> <td><?= $data['alamat'] ?></td>
                        </tr>
						<tr>
                            <td>Jenis Kelamin :</td> <td><?= $data['jenis_klmn'] ?></td>
                        </tr>
                        <tr>
                            <td>Mulai Bekerja :</td> <td><?= $data['tanggal_kerja'] ?></td>
                        </tr>
                        <tr>
                    </table>
				
                </div> <!--end panel-body-->
                <!--panel footer--> 
                <div class="panel-footer">
                    <a href="?page=instruktur&actions=tampil" class="btn btn-success btn-sm">
                         Kembali Ke Data Instruktur </a>

                </div>
                <!--end panel footer-->
            </div>

        </div>
    </div>
</div>

