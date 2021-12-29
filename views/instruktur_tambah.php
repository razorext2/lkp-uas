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
                            <label for="no_rak" class="col-sm-3 control-label">Id Instruktur :</label>
                            <div class="col-sm-9">
                                <input type="text" name="id_instruktur" class="form-control" id="inputEmail3" placeholder="Inputkan Id Instruktur" required>
                            </div>
                        </div>
						<div class="form-group">
                            <label for="no_rak" class="col-sm-3 control-label">Nama Instruktur :</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama" class="form-control" id="inputEmail3" placeholder="Inputkan Nama Instruktur" required>
                            </div>
                        </div>
						 <div class="form-group">
                            <label for="no_laci" class="col-sm-3 control-label">Nomor Hp :</label>
                            <div class="col-sm-9">
                                <input type="text" name="nohp" class="form-control" id="inputEmail3" placeholder="Inputkan Nomor Hp" required>
                            </div>
                        </div>
						 <div class="form-group">
                            <label for="no_boks" class="col-sm-3 control-label">Alamat :</label>
                            <div class="col-sm-9">
                                <input type="text" name="alamat" class="form-control" id="inputEmail3" placeholder="Inputkan Alamat" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status" class="col-sm-3 control-label">Jenis Kelamin :</label>
                            <div class="col-sm-2 col-xs-9">
                                <select name="jnis_klmn" class="form-control">
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>

                         <div class="form-group">
                            <label for="tgl_masuk" class="col-sm-3 control-label">Mulai Bekerja</label>
                            <div class="col-sm-3">
                                <input type="date" name="tgl_bekerja" class="form-control" id="inputEmail3" placeholder="Inputkan Tanggal Masuk" required>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-save"></span> Simpan Data Instruktur</button>
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
    $id=$_POST['id_instruktur'];
    $nama=$_POST['nama'];
	$nohp=$_POST['nohp'];
	$alamat=$_POST['alamat'];
	$jk=$_POST['jnis_klmn'];
    $tglkrja=$_POST['tgl_bekerja'];
    //buat sql
    $sql="INSERT INTO instruktur VALUES ('$id','$nama','$nohp','$alamat','$jk','$tglkrja')";
    $query=  mysqli_query($koneksi, $sql) or die ("SQL Simpan Arsip Error");
    if ($query){
        echo "<script>window.location.assign('?page=instruktur&actions=tampil');</script>";
    }else{
        echo "<script>alert('Simpan Data Gagal');<script>";
    }
    }

?>
