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
                            <h4> Tambah Data Instruktur </h4>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <label for="no_rak" class="control-label">ID Instruktur :</label>
                            <input type="text" name="id_instruktur" class="form-control" placeholder="Inputkan ID Instruktur" required>
                        </div>
                        <div class="form-group">
                            <label for="no_rak" class="control-label">Nama Instruktur :</label>
                            <input type="text" name="nama" class="form-control" placeholder="Inputkan Nama Instruktur" required>
                        </div>
                        <div class="form-group">
                            <label for="no_laci" class="control-label">Nomor Hp :</label>
                            <input type="text" name="nohp" class="form-control" placeholder="Inputkan Nomor Hp" required>
                        </div>
                        <div class="form-group">
                            <label for="no_boks" class="control-label">Alamat :</label>
                            <textarea class="form-control" placeholder="Alamat Instruktur" name="alamat" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="status" class="control-label">Jenis Kelamin :</label>
                            <select name="jnis_klmn" class="form-control">
                                <option> -- Pilih Jenis Kelamin -- </option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tgl_masuk" class="control-label">Mulai Bekerja</label>
                            <input type="date" name="tgl_bekerja" class="form-control" placeholder="Inputkan Tanggal Masuk" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <span class="fa fa-save"></span> Simpan Data </button>
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
    $id = $_POST['id_instruktur'];
    $nama = $_POST['nama'];
    $nohp = $_POST['nohp'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jnis_klmn'];
    $tglkrja = $_POST['tgl_bekerja'];
    //buat sql
    $sql = "INSERT INTO instruktur VALUES ('$id','$nama','$nohp','$alamat','$jk','$tglkrja')";
    $query =  mysqli_query($koneksi, $sql) or die("SQL Simpan Arsip Error");
    if ($query) {
        echo "<script>window.location.assign('?page=instruktur&actions=tampil');</script>";
    } else {
        echo "<script>alert('Simpan Data Gagal');<script>";
    }
}

?>