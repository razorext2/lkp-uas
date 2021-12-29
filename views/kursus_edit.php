<?php
$id=$_GET['id'];
$ambil=  mysqli_query($koneksi, "SELECT * FROM kursus WHERE id_kursus ='$id'") or die ("SQL Edit error");
$data= mysqli_fetch_array($ambil);
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Form Update Data Kursus</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <label for="id_kurs" class="col-sm-3 control-label">Id Kursus :</label>
                            <div class="col-sm-9">
                                <input type="text" name="id_kursus" value="<?=$data['id_kursus']?>" class="form-control" id="inputEmail3" placeholder="Inputkan Nama Instruktur" required >
                            </div>
                        </div>
                        <div class="form-group">
                         <label for="nam_kurs" class="col-sm-3 control-label">Nama Kursus :</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_kursus" value="<?=$data['nama_kursus']?>"class="form-control" id="inputEmail3" placeholder="Nama Instruktur">
                            </div>
                        </div>
						<div class="form-group">
                           <label for="biaya" class="col-sm-3 control-label">Biaya Kursus:</label>
                            <div class="col-sm-9">
                                <input type="text" name="biaya" value="<?=$data['biaya']?>"class="form-control" id="inputEmail3" placeholder="Nomor Hp">
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="jmlh_prtm" class="col-sm-3 control-label">Jumlah Pertemuan :</label>
                            <div class="col-sm-9">
                                <input type="text" name="jmlh_pertemuan" class="form-control" id="inputEmail3" placeholder="Inputkan Tanggal Masuk" value="<?=$data['jmlh_pertemuan']?>" required>
                            </div>
                        </div>
						<div class="form-group">
                             <label for="jnis_klmn" class="col-sm-3 control-label">Nama Instruktur :</label>
                            <div class="col-sm-2 col-xs-9">
                                <select name="nama_instruktur" class="form-control">
                                    <option value="<?=$data['id_instruktur']?>"><?=$data['id_instruktur']?></option>
                                    <?php $query = mysqli_query($koneksi, "SELECT * FROM instruktur GROUP BY nama_instruktur ORDER BY nama_instruktur");
                                   while($data = mysqli_fetch_array($query)){?>
                                    <option value="<?=$data['nama_instruktur'];?>"><?php echo $data['nama_instruktur'];?></option>
                                   <?php } ?>
                                </select>
                            </div>
                        </div>
						
                       
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-edit"></span> Update Data Kursus</button>
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
    $sql="UPDATE kursus SET nama_kursus='$nama',biaya='$biaya',id_instruktur='$nama_ins',jmlh_pertemuan='$jmlh'
	 WHERE id_kursus ='$id_kursus'"; 
    $query=  mysqli_query($koneksi, $sql) or die ("SQL Edit MHS Error");
    if ($query){
        echo "<script>window.location.assign('?page=kursus&actions=tampil');</script>";
    }else{
        var_dump($query);
    }
    }

?>



