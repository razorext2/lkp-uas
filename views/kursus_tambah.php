<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Form Tambah Data Arsip</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <label for="id_kurs" class="col-sm-3 control-label">Id Kursus :</label>
                            <div class="col-sm-9">
                                <input type="text" name="id_kursus" class="form-control" id="inputEmail3" placeholder="Inputkan Id Kursus" required>
                            </div>
                        </div>
						<div class="form-group">
                            <label for="nam_kurs" class="col-sm-3 control-label">Nama Kursus :</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_kursus" class="form-control" id="nam_kurs" placeholder="Inputkan Nama Kursus" required>
                            </div>
                        </div>
						 <div class="form-group">
                            <label for="biaya" class="col-sm-3 control-label">Biaya Kursus:</label>
                            <div class="col-sm-9">
                                <input type="text" name="biaya" class="form-control" id="inputEmail3" placeholder="Inputkan Biaya Kursus" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jnis_klmn" class="col-sm-3 control-label">Nama Instruktur :</label>
                            <div class="col-sm-2 col-xs-9">
                                <select name="nama_instruktur" class="form-control">
                                    <option>Pilih Instruktur</option>
                                    <?php $query = mysqli_query($koneksi, "SELECT * FROM instruktur GROUP BY nama_instruktur ORDER BY nama_instruktur");
                                   while($data = mysqli_fetch_array($query)){?>
                                    <option value="<?=$data['nama_instruktur'];?>"><?php echo $data['nama_instruktur'];?></option>
                                   <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="jmlh_prtm" class="col-sm-3 control-label">Jumlah Pertemuan :</label>
                            <div class="col-sm-9">
                                <input type="text" name="jmlh_pertemuan" class="form-control" id="inputEmail3" placeholder="Inputkan Jumlah Pertemuan" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-save"></span> Simpan Data Kursus</button>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="panel-footer">
                    <a href="?page=kursus&actions=tampil" class="btn btn-danger btn-sm">
                         Kembali Ke Data Kursus
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
if($_POST){
    //Ambil data dari form
    $id_kursus=$_POST['id_kursus'];
    $nama=$_POST['nama_kursus'];
	$biaya=$_POST['biaya'];
	$nama_ins=$_POST['nama_instruktur'];
	$jmlh=$_POST['jmlh_pertemuan'];
    //buat sql
    $sql="INSERT INTO kursus VALUES ('$id_kursus','$nama','$biaya','$nama_ins','$jmlh')";
    $query=  mysqli_query($koneksi, $sql) or die ("SQL Simpan Arsip Error");
    if ($query){
        echo "<script>window.location.assign('?page=kursus&actions=tampil');</script>";
    }else{
        echo "<script>alert('Simpan Data Gagal');<script>";
    }
    }

?>
