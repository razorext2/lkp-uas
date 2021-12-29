<?php
$id=$_GET['id'];
$ambil=  mysqli_query($koneksi, "SELECT * FROM peserta WHERE no_id ='$id'") or die ("SQL Edit error");
$data= mysqli_fetch_array($ambil);
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Form Update Data Peserta</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <label for="nama" class="col-sm-3 control-label">Nama Pesrta :</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama" value="<?=$data['nama_peserta']?>"class="form-control" id="inputEmail3" placeholder="Nama Pesrta">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin" class="col-sm-3 control-label">Jenis Kelamin :</label>
                            <div class="col-sm-2 col-xs-9">
                                <select name="jnis_klmn" class="form-control">
                                    <option value="<?=$data['jenis_kelamin']?>">
                                        <?=$data['jenis_kelamin']?>
                                    </option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pendidikan" class="col-sm-3 control-label">Pendidikan :</label>
                            <div class="col-sm-2 col-xs-9">
                                <select name="pendidikan" class="form-control">
                                    <option value="<?=$data['pendidikan']?>">
                                        <?=$data['pendidikan']?>
                                    </option>
                                    <option value="SD-SMA">SD-SMA</option>
                                    <option value="S1">S1</option>
                                    <option value="umum">Umum</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nohp" class="col-sm-3 control-label">Nomor Hp :</label>
                            <div class="col-sm-9">
                                <input type="text" name="nohp" value="<?=$data['nomor_hp']?>"class="form-control" id="inputEmail3" placeholder="Nama Pesrta">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat" class="col-sm-3 control-label">Alamat :</label>
                            <div class="col-sm-9">
                                <input type="text" name="alamat" value="<?=$data['alamat']?>"class="form-control" id="inputEmail3" placeholder="Nama Pesrta">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status" class="col-sm-3 control-label">Status :</label>
                            <div class="col-sm-2 col-xs-9">
                                <select name="status" class="form-control">
                                    <option value="<?=$data['status']?>">
                                        <?=$data['status']?>
                                    </option>
                                     <option value="Aktif">Aktif</option>
                                    <option value="Lulus">Lulus</option>
                                    <option value="Berhenti">Berhenti</option>
                                </select>
                            </div>
                        </div>
                       <div class="form-group">
                            <label for="id_kurs" class="col-sm-3 control-label">Jenis Kursus :</label>
                            <div class="col-sm-2 col-xs-9">
                                <select name="id_kurs" class="form-control">
                                    <option value="<?=$data['id_kursus']?>">
                                        <?=$data['id_kursus']?>
                                    </option>
                                     <?php $query = mysqli_query($koneksi, "SELECT * FROM kursus GROUP BY nama_kursus ORDER BY nama_kursus");
                                   while($data = mysqli_fetch_array($query)){?>
                                    <option value="<?=$data['nama_kursus'];?>"><?php echo $data['nama_kursus'];?></option>
                                   <?php };?>
                                </select>
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-edit"></span> Update Data Arsip</button>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="panel-footer">
                    <a href="?page=peserta&actions=tampil" class="btn btn-danger btn-sm">
                        Kembali Ke Data Peserta
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php 
if($_POST){
    //Ambil data dari form
    $nama=$_POST['nama'];
    $jnis_klmn=$_POST['jnis_klmn'];
    $pendidikan=$_POST['pendidikan'];
    $id_kurs=$_POST['id_kurs'];
    $nohp=$_POST['nohp'];
    $alamat=$_POST['alamat'];
    $status=$_POST['status'];
    //buat sql
    $sql="UPDATE peserta SET nama_peserta='$nama',jenis_kelamin='$jnis_klmn',pendidikan='$pendidikan',id_kursus='$id_kurs',nomor_hp='$nohp',
    alamat='$alamat',status='$status' WHERE no_id ='$id'"; 
    $query=  mysqli_query($koneksi, $sql) or die ("SQL Edit MHS Error");
    if ($query){
        echo "<script>window.location.assign('?page=peserta&actions=tampil');</script>";
    }else{
        echo "<script>alert('Edit Data Gagal');<script>";
    }
    }

?>



