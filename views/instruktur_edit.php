<?php
$id=$_GET['id'];
$ambil=  mysqli_query($koneksi, "SELECT * FROM instruktur WHERE id_instruktur ='$id'") or die ("SQL Edit error");
$data= mysqli_fetch_array($ambil);
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Form Update Data Instruktur</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <label for="id_instruktur" class="col-sm-3 control-label">Id Instruktur :</label>
                            <div class="col-sm-9">
                                <input type="text" name="id_ins" value="<?=$data['id_instruktur']?>" class="form-control" id="inputEmail3" placeholder="Inputkan Nama Instruktur" readonly="on" required >
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="nama" class="col-sm-3 control-label">Nama Instruktur :</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama" value="<?=$data['nama_instruktur']?>"class="form-control" id="inputEmail3" placeholder="Nama Instruktur">
                            </div>
                        </div>
						<div class="form-group">
                           <label for="nohp" class="col-sm-3 control-label">Nomor Hp :</label>
                            <div class="col-sm-9">
                                <input type="text" name="nohp" value="<?=$data['no_hp']?>"class="form-control" id="inputEmail3" placeholder="Nomor Hp">
                            </div>
                        </div>
						<div class="form-group">
                            <label for="alamat" class="col-sm-3 control-label">Alamat :</label>
                            <div class="col-sm-9">
                                <input type="text" name="alamat" value="<?=$data['alamat']?>"class="form-control" id="inputEmail3" placeholder="Alamat">
                            </div>
                        </div>
						<div class="form-group">
                            <label for="jnis_klmn" class="col-sm-3 control-label">Jenis Kelamin :</label>
                            <div class="col-sm-2 col-xs-9">
                                <select name="jnis_klmn" class="form-control">
                                    <option value="<?=$data['jenis_klmn']?>">
                                        <?=$data['jenis_klmn']?>
                                    </option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tgl_bekerja" class="col-sm-3 control-label">Mulai Bekerja</label>
                            <div class="col-sm-3">
                                <input type="date" name="tgl_bekerja" class="form-control" id="inputEmail3" placeholder="Inputkan Tanggal Masuk" value="<?=$data['tanggal_kerja']?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-edit"></span> Update Data Instruktur</button>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="panel-footer">
                    <a href="?page=instruktur&actions=tampil" class="btn btn-danger btn-sm">
                        Kembali Ke Data Instruktur
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php 
if($_POST){
    //Ambil data dari form
    $idku=$_POST['id_ins'];
    $nama=$_POST['nama'];
    $nohp=$_POST['nohp'];
    $alamat=$_POST['alamat'];
    $jk=$_POST['jnis_klmn'];
    $tgl=$_POST['tgl_bekerja'];
    //buat sql
    $sql="UPDATE instruktur SET nama_instruktur='$nama',no_hp='$nohp',alamat='$alamat',jenis_klmn='$jk',tanggal_kerja='$tgl'
	 WHERE id_instruktur ='$idku'"; 
    $query=  mysqli_query($koneksi, $sql) or die ("SQL Edit MHS Error");
    if ($query){
        echo "<script>window.location.assign('?page=instruktur&actions=tampil');</script>";
    }else{
          echo "<script>alert('Edit Data Gagal');<script>";
    }
    }

?>



