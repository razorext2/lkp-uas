<?php
$id=$_GET['id'];
$ambil=  mysqli_query($koneksi, "SELECT * FROM bayar WHERE id_bayar ='$id'") or die ("SQL Edit error");
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
                            <label for="status" class="col-sm-3 control-label">Sisa Pembayaran :</label>
                            <div class="col-sm-9">
                                <input type="text" name="status" value="<?=$data['status']?>"class="form-control" id="inputEmail3" placeholder="Nama Pesrta">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jmlh_bayar" class="col-sm-3 control-label">Jumlah Bayar :</label>
                            <div class="col-sm-9">
                                <input type="hidden" name="jmlh_bayars" value="<?=$data['jmlh_bayar']?>">
                                <input type="text" name="jmlh_bayar" class="form-control" id="inputEmail3" placeholder="Jumlah Bayar">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="biaya" class="col-sm-3 control-label">Biaya :</label>
                            <div class="col-sm-2 col-xs-9">
                                <select name="biaya" class="form-control">
                                    <option value="<?=$data['biaya_awal']?>">
                                        <?=$data['biaya_awal']?>
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
                                    <option value="<?=$data['nama_kursus']?>">
                                        <?=$data['nama_kursus']?>
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
                    <a href="?page=arsip&actions=tampil" class="btn btn-danger btn-sm">
                        Kembali Ke Data Arsip
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
    $id_kurs=$_POST['id_kurs'];
    $awal = $_POST['jmlh_bayars'];
    $jmlh_bayar=$_POST['jmlh_bayar'];
    $jumlah = $awal + $jmlh_bayar;
    $biaya=$_POST['biaya'];
    $status=$_POST['status'];
    $sisa = $status-$jmlh_bayar;
    $tanggal = date('Y-m-d');
    //buat sql
    $sql="UPDATE bayar SET nama_peserta='$nama',nama_kursus='$id_kurs',biaya_awal='$biaya',
    jmlh_bayar='$jumlah',status='$sisa' WHERE id_bayar ='$id'"; 
    $query=  mysqli_query($koneksi, $sql) or die ("SQL Edit MHS Error");

    $sql="INSERT INTO catatan_pembayaran VALUES ('','$nama','$jmlh_bayar','$sisa','$tanggal')";
    $quer=  mysqli_query($koneksi, $sql) or die ("SQL Simpan Arsip Error");
    if ($query){
        echo "<script>window.location.assign('?page=pembayaran&actions=tampil');</script>";
    }else{
        echo "<script>alert('Edit Data Gagal');<script>";
    }
    }

?>



