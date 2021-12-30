<?php
$id = $_GET['id'];
$ambil =  mysqli_query($koneksi, "SELECT * FROM instruktur WHERE id_instruktur ='$id'") or die("SQL Edit error");
$data = mysqli_fetch_array($ambil);
?>
<div class="container">
    <div class="row">
        <div class="col-6 text-sm">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row mb-2">
                        <div class="col-auto">
                            <a href="?page=instruktur&actions=tampil" class="btn bg-gradient-primary p-2"> Kembali </a>
                        </div>
                        <div class="col-auto">
                            <h4> Edit Data Instruktur </h4>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <label for="id_instruktur" class="col-sm-3 control-label">ID Instruktur :</label>
                            <input type="text" name="id_ins" value="<?= $data['id_instruktur'] ?>" class="form-control" placeholder="Inputkan Nama Instruktur" readonly="on" required>
                        </div>
                        <div class="form-group">
                            <label for="nama" class="col-sm-3 control-label">Nama Instruktur :</label>
                            <input type="text" name="nama" value="<?= $data['nama_instruktur'] ?>" class="form-control" placeholder="Nama Instruktur">
                        </div>
                        <div class="form-group">
                            <label for="nohp" class="col-sm-3 control-label">Nomor Hp :</label>
                            <input type="text" name="nohp" value="<?= $data['no_hp'] ?>" class="form-control" placeholder="Nomor Hp">
                        </div>
                        <div class="form-group">
                            <label for="alamat" class="col-sm-3 control-label">Alamat :</label>
                            <textarea class="form-control" placeholder="Alamat Instruktur" name="alamat" rows="3" required><?= $data['alamat'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="jnis_klmn" class="col-sm-3 control-label">Jenis Kelamin :</label>
                            <select name="jnis_klmn" class="form-control">
                                <option>
                                    -- Pilih Jenis Kelamin --
                                </option>
                                <option value="Laki-Laki" <?php if ($data['jenis_klmn'] == 'Laki-Laki') {
                                                                echo 'selected';
                                                            } ?>>Laki-Laki</option>
                                <option value="Perempuan" <?php if ($data['jenis_klmn'] == 'Perempuan') {
                                                                echo 'selected';
                                                            } ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tgl_bekerja" class="col-sm-3 control-label">Mulai Bekerja</label>
                            <input type="date" name="tgl_bekerja" class="form-control" placeholder="Inputkan Tanggal Masuk" value="<?= $data['tanggal_kerja'] ?>" required>
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
    $idku = $_POST['id_ins'];
    $nama = $_POST['nama'];
    $nohp = $_POST['nohp'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jnis_klmn'];
    $tgl = $_POST['tgl_bekerja'];
    //buat sql
    $sql = "UPDATE instruktur SET nama_instruktur='$nama',no_hp='$nohp',alamat='$alamat',jenis_klmn='$jk',tanggal_kerja='$tgl'
	 WHERE id_instruktur ='$idku'";
    $query =  mysqli_query($koneksi, $sql) or die("SQL Edit MHS Error");
    if ($query) {
        echo "<script>window.location.assign('?page=instruktur&actions=tampil');</script>";
    } else {
        echo "<script>alert('Edit Data Gagal');<script>";
    }
}

?>