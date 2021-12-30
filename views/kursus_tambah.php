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
                            <h4> Tambah Kursus </h4>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <label for="id_kurs" class="control-label">ID Kursus :</label>
                            <input type="text" name="id_kursus" class="form-control" placeholder="Inputkan Id Kursus" required>
                        </div>
                        <div class="form-group">
                            <label for="nam_kurs" class="control-label">Nama Kursus :</label>
                            <input type="text" name="nama_kursus" class="form-control" id="nam_kurs" placeholder="Inputkan Nama Kursus" required>
                        </div>
                        <div class="form-group">
                            <label for="biaya" class="control-label">Biaya Kursus:</label>
                            <input type="text" name="biaya" class="form-control" placeholder="Inputkan Biaya Kursus" required>
                        </div>
                        <div class="form-group">
                            <label for="jnis_klmn" class="control-label">Nama Instruktur :</label>
                            <select name="nama_instruktur" class="form-control">
                                <option> -- Pilih Instruktur -- </option>
                                <?php $query = mysqli_query($koneksi, "SELECT * FROM instruktur GROUP BY nama_instruktur ORDER BY nama_instruktur");
                                while ($data = mysqli_fetch_array($query)) { ?>
                                    <option value="<?= $data['nama_instruktur']; ?>"><?php echo $data['nama_instruktur']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="jmlh_prtm" class="control-label">Jumlah Pertemuan :</label>
                            <input type="number" name="jmlh_pertemuan" class="form-control" placeholder="Inputkan Jumlah Pertemuan" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <span class="fa fa-save"></span> Simpan Data Kursus
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
    $sql = "INSERT INTO kursus VALUES ('$id_kursus','$nama','$biaya','$nama_ins','$jmlh')";
    $query =  mysqli_query($koneksi, $sql) or die("SQL Simpan Arsip Error");
    if ($query) {
        echo "<script>window.location.assign('?page=kursus&actions=tampil');</script>";
    } else {
        echo "<script>alert('Simpan Data Gagal');<script>";
    }
}

?>