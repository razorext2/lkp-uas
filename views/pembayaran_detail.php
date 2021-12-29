<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Informasi Detail Pembayaran</h3>
                </div>
                <div class="panel-body">
                    <!--Menampilkan data detail arsip-->
                    <?php
                    $sql = "SELECT *FROM bayar WHERE id_bayar ='" . $_GET ['id'] . "'";
                    //proses query ke database
                    $query = mysqli_query($koneksi, $sql) or die("SQL Detail error");
                    //Merubaha data hasil query kedalam bentuk array
                    $data = mysqli_fetch_array($query);
                    ?>   

                    <!--dalam tabel--->
                    <table class="table table-bordered table-striped table-hover"> 
                        <tr>
                            <td width="200">Nama Peserta : </td> <td><?= $data['nama_peserta'] ?></td>
                        </tr>
                        <tr>
                            <td width="200">Jenis Kursus :</td> <td><?= $data['nama_kursus'] ?></td>
                        </tr>
                        <tr>
                            <td>Biaya Kursus (Rp) :</td> <td><?= $data['biaya_awal'] ?></td>
                        </tr>
                        <tr>
                            <td>Jumlah Bayar (Rp) :</td> <td><?= $data['jmlh_bayar'] ?></td>
                        </tr>
						<tr>
                            <td>Sisa (Rp) :</td> <td><?= $data['status'] ?></td>
                        </tr>
                        
                        
                    </table>
				
                </div> <!--end panel-body-->
                <!--panel footer--> 
                <div class="panel-footer">
                    <a href="?page=pembayaran&actions=tampil" class="btn btn-success btn-sm">
                         Kembali Ke Data Pembayaran </a>

                </div>
                <!--end panel footer-->
            </div>

        </div>
    </div>
</div>

