<?php
$id = $_GET['id'];
$ambil =  mysqli_query($koneksi, "SELECT * FROM bayar WHERE id_bayar ='$id'") or die("SQL Edit error");
$data = mysqli_fetch_array($ambil);
?>
<div class="container">
    <div class="row">
        <div class="col-6 text-sm">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row mb-2">
                        <div class="col-auto">
                            <a href="?page=pembayaran&actions=tampil" class="btn bg-gradient-primary p-2"> Kembali </a>
                        </div>
                        <div class="col-auto">
                            <h4> Update Pembayaran </h4>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <label for="nama" class="col-sm-3 control-label">Nama Pesrta :</label>
                            <input type="text" name="nama" value="<?= $data['nama_peserta'] ?>" class="form-control" id="inputEmail3" placeholder="Nama Pesrta">
                        </div>
                        <div class="form-group">
                            <label for="status" class="col-sm-3 control-label">Sisa Pembayaran :</label>
                            <input type="text" name="status" value="<?= "Rp. " . number_format($data['status'], 0, '', '.') ?>" class="form-control" id="inputEmail3" placeholder="Nama Pesrta" readonly>
                        </div>
                        <div class="form-group">
                            <label for="jmlh_bayar" class="col-sm-3 control-label">Jumlah Bayar :</label>
                            <input type="hidden" name="jmlh_bayars" value="<?= $data['jmlh_bayar'] ?>">
                            <input type="text" name="jmlh_bayar" class="form-control" id="jmlh_bayar" placeholder="Jumlah Bayar">
                        </div>
                        <div class="form-group">
                            <label for="biaya" class="col-sm-3 control-label">Biaya :</label>
                            <input type="text" name="biaya" class="form-control" value="<?= "Rp. " . number_format($data['biaya_awal'], 0, '', '.') ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="id_kurs" class="col-sm-3 control-label">Jenis Kursus :</label>
                            <input type="text" name="id_kurs" class="form-control" value="<?= $data['nama_kursus'] ?>" readonly>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <span class="fa fa-edit"></span> Update Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if ($_POST) {
    //Ambil data dari form
    $nama = $_POST['nama'];
    $id_kurs = $_POST['id_kurs'];
    $awal = str_replace(array('.', 'Rp '), array('', ''), $_POST['jmlh_bayars']);
    $jmlh_bayar = str_replace(array('.', 'Rp '), array('', ''), $_POST['jmlh_bayar']);
    $jumlah = $awal + $jmlh_bayar;
    $biaya = str_replace(array('.', 'Rp '), array('', ''), $_POST['biaya']);
    $status = str_replace(array('.', 'Rp '), array('', ''), $_POST['status']);
    $sisa = $status - $jmlh_bayar;
    $tanggal = date('Y-m-d');
    //buat sql
    $sql = "UPDATE bayar SET nama_peserta='$nama',nama_kursus='$id_kurs',biaya_awal='$biaya',
    jmlh_bayar='$jumlah',status='$sisa' WHERE id_bayar ='$id'";
    $query =  mysqli_query($koneksi, $sql) or die("SQL Edit MHS Error");

    $sql = "INSERT INTO catatan_pembayaran VALUES ('','$nama','$jmlh_bayar','$sisa','$tanggal')";
    $quer =  mysqli_query($koneksi, $sql) or die("SQL Simpan Arsip Error");
    if ($query) {
        echo "<script>window.location.assign('?page=pembayaran&actions=tampil');</script>";
    } else {
        echo "<script>alert('Edit Data Gagal');<script>";
    }
}

?>