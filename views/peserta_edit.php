<?php
$id = $_GET['id'];
$ambil =  mysqli_query($koneksi, "SELECT * FROM peserta WHERE no_id ='$id'") or die("SQL Edit error");
$data = mysqli_fetch_array($ambil);
?>
<div class="container">
    <div class="row">
        <div class="col-6 text-sm">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row mb-2">
                        <div class="col-auto">
                            <a href="?page=peserta&actions=tampil" class="btn bg-gradient-primary p-2"> Kembali </a>
                        </div>
                        <div class="col-auto">
                            <h4> Edit Data Peserta Kursus </h4>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <label for="nama" class="control-label">Nama Peserta :</label>
                            <input type="text" name="nama" value="<?= $data['nama_peserta'] ?>" class="form-control" placeholder="Nama Peserta">
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin" class="control-label">Jenis Kelamin :</label>
                            <select name="jnis_klmn" class="form-control">
                                <option> -- Pilih Jenis Kelamin --</option>
                                <option value="Laki-Laki" <?php if ($data['jenis_kelamin'] == 'Laki-Laki') {
                                                                echo 'selected';
                                                            } ?>>Laki-Laki</option>
                                <option value="Perempuan" <?php if ($data['jenis_kelamin'] == 'Perempuan') {
                                                                echo 'selected';
                                                            } ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pendidikan" class="control-label">Pendidikan :</label>
                            <select name="pendidikan" class="form-control">
                                <option> -- Pilih Pendidikan --</option>
                                </option>
                                <option value="SD-SMA" <?php if ($data['pendidikan'] == 'SD-SMA') {
                                                            echo 'selected';
                                                        } ?>>SD-SMA</option>
                                <option value="S1" <?php if ($data['pendidikan'] == 'S1') {
                                                        echo 'selected';
                                                    } ?>>S1</option>
                                <option value="umum" <?php if ($data['pendidikan'] == 'umum') {
                                                            echo 'selected';
                                                        } ?>>Umum</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nohp" class="control-label">Nomor Hp :</label>
                            <input type="text" name="nohp" value="<?= $data['nomor_hp'] ?>" class="form-control" placeholder="Nomor Peserta">
                        </div>
                        <div class="form-group">
                            <label for="alamat" class="control-label">Alamat :</label>
                            <textarea class="form-control" placeholder="Alamat Peserta" name="alamat" rows="3"><?= $data['alamat'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="status" class="control-label">Status :</label>
                            <select name="status" class="form-control">
                                <option> -- Pilih Status Kursus -- </option>
                                <option value="Aktif" <?php if ($data['status'] == 'Aktif') {
                                                            echo 'selected';
                                                        } ?>>Aktif</option>
                                <option value="Lulus" <?php if ($data['status'] == 'Lulus') {
                                                            echo 'selected';
                                                        } ?>>Lulus</option>
                                <option value="Berhenti" <?php if ($data['status'] == 'Berhenti') {
                                                                echo 'selected';
                                                            } ?>>Berhenti</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_kurs" class="control-label">Jenis Kursus :</label>
                            <select name="id_kurs" class="form-control">
                                <option> -- Pilih Jenis Kursus -- </option>
                                <?php
                                $query = mysqli_query($koneksi, "SELECT * FROM kursus GROUP BY nama_kursus ORDER BY nama_kursus");
                                while ($row = mysqli_fetch_array($query)) { ?>
                                    <option value="<?= $row['nama_kursus']; ?>" <?php if ($row['nama_kursus'] == $data['id_kursus']) {
                                                                                    echo 'selected';
                                                                                } ?>>
                                        <?= $row['nama_kursus']; ?>
                                    </option>
                                <?php }; ?>
                            </select>
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
    $jnis_klmn = $_POST['jnis_klmn'];
    $pendidikan = $_POST['pendidikan'];
    $id_kurs = $_POST['id_kurs'];
    $nohp = $_POST['nohp'];
    $alamat = $_POST['alamat'];
    $status = $_POST['status'];
    //buat sql
    $sql = "UPDATE peserta SET nama_peserta='$nama',jenis_kelamin='$jnis_klmn',pendidikan='$pendidikan',id_kursus='$id_kurs',nomor_hp='$nohp',
    alamat='$alamat',status='$status' WHERE no_id ='$id'";
    $query =  mysqli_query($koneksi, $sql) or die("SQL Edit MHS Error");
    if ($query) {
        echo "<script>window.location.assign('?page=peserta&actions=tampil');</script>";
    } else {
        echo "<script>alert('Edit Data Gagal');<script>";
    }
}

?>