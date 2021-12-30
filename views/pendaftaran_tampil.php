<div class="row mb-2">
    <div class="col-auto">
        <a href="?page=peserta&actions=tampil" class="btn bg-gradient-primary p-2"> Kembali </a>
    </div>
    <div class="col-auto">
        <h4> Pendaftaran Siswa </h4>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <!--membuat form untuk tambah data-->
        <form class="form-horizontal" action="" method="post">
            <div class="form-group">
                <label for="nama_peserta" class="col-sm-3 control-label">Nama Peserta:</label>
                <input type="text" name="nama_peserta" class="form-control" placeholder="Nama Peserta" required>
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
                <select id="nama_kursus" name="nama_kursus" class="form-control" onchange="isi_otomatis()">
                    <option>-- Pilih Paket Kursus --</option>
                    <?php $query = mysqli_query($koneksi, "SELECT * FROM kursus GROUP BY nama_kursus ORDER BY nama_kursus");
                    while ($data = mysqli_fetch_array($query)) { ?>
                        <option value="<?= $data['nama_kursus']; ?>"><?php echo $data['nama_kursus']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="biaya_kurs" class="col-sm-3 control-label">Biaya Kursus:</label>
                <input type="text" name="biaya_kurs" id="biaya_kurs" class="form-control" placeholder="Pilih Kursus Terlebih Dahulu" readonly>
            </div>
            <div class="form-group">
                <label for="nomor_hp" class="col-sm-3 control-label">Nomor Hp:</label>
                <input type="text" name="nomor_hp" class="form-control" placeholder="Nomor Hp" required>
            </div>
            <div class="form-group">
                <label for="alamat" class="col-sm-3 control-label">Alamat :</label>
                <textarea class="form-control" placeholder="Alamat Peserta" name="alamat" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="jmlh_bayar" class="col-sm-3 control-label">Jumlah Bayar :</label>
                <input type="text" name="jmlh_bayar" id="jmlh_bayar" class="form-control" placeholder="Jumlah Bayar" required>
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
                    <button type="submit" class="btn bg-gradient-primary">
                        <span class="fa fa-save"></span> Simpan Data Peserta</button>
                </div>
            </div>
        </form>
    </div>

    <?php
    if ($_POST) {
        //Ambil data dari form
        $nama = $_POST['nama_peserta'];
        $jk = $_POST['jnis_klmn'];
        $pendidikan = $_POST['pendidikan'];
        $tanggal = date('Y-m-d');
        $nama_kurs = $_POST['nama_kursus'];
        $biaya = str_replace(array('.', 'Rp '), array('', ''), $_POST['biaya_kurs']);
        $jmlh = str_replace(array('.', 'Rp '), array('', ''),  $_POST['jmlh_bayar']);
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