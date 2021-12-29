<div class="row mb-2">
    <div class="col-auto">
        <h4> Form Pendaftaran </h4>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <!--membuat form untuk tambah data-->
        <form class="form-horizontal" action="" method="post">
            <div class="form-group">
                <label for="nama_peserta" class="col-sm-3 control-label">Nama Peserta:</label>
                <input type="text" name="nama_peserta" class="form-control" id="id_instruktur" placeholder="Inputkan Nama Peserta" required>
            </div>
            <div class="form-group">
                <label for="status" class="col-sm-3 control-label">Jenis Kelamin :</label>
                <select name="jnis_klmn" class="form-control">
                    <option>-- Pilih Jenis Kelamin --</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="status" class="col-sm-3 control-label">Status :</label>
                <select name="pendidikan" class="form-control">
                    <option>-- Pilih Pendidikan --</option>
                    <option value="SD-SMA">SD-SMA</option>
                    <option value="S1">S1</option>
                    <option value="umum">Umum</option>
                </select>
            </div>
            <div class="form-group">
                <label for="jnis_klmn" class="col-sm-3 control-label">Jenis Kursus:</label>
                <select name="nama_kursus" class="form-control">
                    <option>-- Pilih Paket Kursus --</option>
                    <?php $query = mysqli_query($koneksi, "SELECT * FROM kursus GROUP BY nama_kursus ORDER BY nama_kursus");
                    while ($data = mysqli_fetch_array($query)) { ?>
                        <option value="<?= $data['nama_kursus']; ?>"><?php echo $data['nama_kursus']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="biaya_kurs" class="col-sm-3 control-label">Biaya Kursus:</label>
                <select name="biaya_kurs" class="form-control">
                    <option>-- Pilih Biaya Kursus --</option>
                    <?php $query = mysqli_query($koneksi, "SELECT * FROM kursus GROUP BY biaya ORDER BY biaya");
                    while ($data = mysqli_fetch_array($query)) { ?>
                        <option value="<?= $data['biaya']; ?>"><?php echo $data['biaya']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="nomor_hp" class="col-sm-3 control-label">Nomor Hp:</label>
                <input type="text" name="nomor_hp" class="form-control" id="nomor_hp" placeholder="Inputkan Nomor Hp" required>
            </div>
            <div class="form-group">
                <label for="alamat" class="col-sm-3 control-label">Alamat :</label>
                <input type="text" name="alamat" class="form-control" id="inputEmail3" placeholder="Inputkan Alamat" required>
            </div>
            <div class="form-group">
                <label for="jmlh_bayar" class="col-sm-3 control-label">Jumlah Bayar :</label>
                <input type="text" name="jmlh_bayar" class="form-control" id="inputEmail3" placeholder="Inputkan Alamat" required>
            </div>
            <div class="form-group">
                <label for="status_belajar" class="col-sm-3 control-label">Status Belajar :</label>
                <select name="status_belajar" class="form-control">
                    <option>-- Pilih Status Belajar --</option>
                    <option value="Aktif">Aktif</option>
                    <option value="Lulus">Lulus</option>
                    <option value="Berhenti">Berhenti</option>
                </select>
            </div>


            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-success">
                        <span class="fa fa-save"></span> Simpan Data Peserta</button>
                </div>
            </div>
        </form>


    </div>
    <div class="panel-footer">
        <a href="?page=beranda&actions=adm" class="btn btn-danger btn-sm">
            Kembali Ke Beranda
        </a>
    </div>

    <?php
    if ($_POST) {
        //Ambil data dari form
        $nama = $_POST['nama_peserta'];
        $jk = $_POST['jnis_klmn'];
        $pendidikan = $_POST['pendidikan'];
        $tanggal = date('Y-m-d');
        $nama_kurs = $_POST['nama_kursus'];
        $biaya = $_POST['biaya_kurs'];
        $jmlh = $_POST['jmlh_bayar'];
        $sisa = $biaya - $jmlh;
        $no_hp = $_POST['nomor_hp'];
        $alamat = $_POST['alamat'];
        $status = $_POST['status_belajar'];
        //buat sql
        $sqlku = "INSERT INTO peserta VALUES ('','$nama','$jk','$pendidikan','$tanggal','$nama_kurs', '$no_hp', '$alamat', '$status')";
        $query = mysqli_query($koneksi, $sqlku)  or die("SQL Simpan Arsip Error");

        $sql = "INSERT INTO catatan_pembayaran VALUES ('','$nama','$jmlh','$sisa','$tanggal')";
        $quer =  mysqli_query($koneksi, $sql) or die("SQL Simpan Arsip Error");

        $sqlnya = "INSERT INTO bayar VALUES ('','$nama', '$nama_kurs','$biaya','$jmlh','$sisa')";
        $quere =  mysqli_query($koneksi, $sqlnya) or die("SQL Simpan Arsip Error");

        if ($query) {
            echo "<script>window.location.assign('?page=peserta&actions=tampil');</script>";
        } else {
            echo "<script>alert('Simpan Data Gagal');<script>";
        }
    }

    ?>