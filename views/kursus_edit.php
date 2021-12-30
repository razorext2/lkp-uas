<?php
$id = $_GET['id'];
$ambil =  mysqli_query($koneksi, "SELECT * FROM kursus WHERE id_kursus ='$id'") or die("SQL Edit error");
$data = mysqli_fetch_array($ambil);
?>
<div class="container">
    <div class="row">
        <div class="col-6 text-sm">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row mb-2">
                        <div class="col-auto">
                            <a href="?page=kursus&actions=tampil" class="btn bg-gradient-primary p-2"> Kembali </a>
                        </div>
                        <div class="col-auto">
                            <h4> Edit Kursus </h4>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <label for="id_kurs" class="control-label">ID Kursus :</label>
                            <input type="text" name="id_kursus" value="<?= $data['id_kursus'] ?>" class="form-control" placeholder="Inputkan Nama Instruktur" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nam_kurs" class="control-label">Nama Kursus :</label>
                            <input type="text" name="nama_kursus" value="<?= $data['nama_kursus'] ?>" class="form-control" placeholder="Nama Instruktur">
                        </div>
                        <div class="form-group">
                            <label for="biaya" class="control-label">Biaya Kursus:</label>
                            <input type="text" name="biaya" value="<?= $data['biaya'] ?>" class="form-control" placeholder="Nomor Hp">
                        </div>
                        <div class="form-group">
                            <label for="jmlh_prtm" class="control-label">Jumlah Pertemuan :</label>
                            <input type="text" name="jmlh_pertemuan" class="form-control" placeholder="Inputkan Tanggal Masuk" value="<?= $data['jmlh_pertemuan'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="jnis_klmn" class="control-label">Nama Instruktur :</label>
                            <select name="nama_instruktur" class="form-control">
                                <option> -- Pilih Intruktur -- </option>
                                <?php $query = mysqli_query($koneksi, "SELECT * FROM instruktur GROUP BY nama_instruktur ORDER BY nama_instruktur");
                                while ($row = mysqli_fetch_array($query)) { ?>

                                    <option value="<?= $row['nama_instruktur']; ?>" <?php if ($row['nama_instruktur'] == $data['id_instruktur']) {
                                                                                        echo 'selected';
                                                                                    } ?>><?php echo $row['nama_instruktur']; ?></option>

                                <?php } ?>
                            </select>
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <span class="fa fa-edit"></span> Update Data Kursus
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
    $id_kursus = $_POST['id_kursus'];
    $nama = $_POST['nama_kursus'];
    $biaya = $_POST['biaya'];
    $nama_ins = $_POST['nama_instruktur'];
    $jmlh = $_POST['jmlh_pertemuan'];
    //buat sql
    $sql = "UPDATE kursus SET nama_kursus='$nama',biaya='$biaya',id_instruktur='$nama_ins',jmlh_pertemuan='$jmlh'
	 WHERE id_kursus ='$id_kursus'";
    $query =  mysqli_query($koneksi, $sql) or die("SQL Edit MHS Error");
    if ($query) {
        echo "<script>window.location.assign('?page=kursus&actions=tampil');</script>";
    } else {
        var_dump($query);
    }
}

?>