<?php
if (!isset($_SESSION['idsesi'])) {
    echo "<script> window.location.assign('../index.php'); </script>";
}
?>

<div class="row mb-2">
    <div class="col-auto">
        <h4> Data Instruktur </h4>
    </div>
    <div class="col-auto">
        <a href="?page=instruktur&actions=tambah" class="btn btn-info btn-sm">
            [+] Instruktur
        </a>
    </div>
</div>

<div class="table-responsive p-0">
    <table class="table table-hover table-striped align-items-center mb-0 text-sm">
        <thead>
            <tr class="text-center">
                <th>No.</th>
                <th>Nama</th>
                <th>No Hp</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Mulai Bekerja</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <!--ambil data dari database, dan tampilkan kedalam tabel-->
            <?php
            //buat sql untuk tampilan data, gunakan kata kunci select
            $sql = "SELECT * FROM instruktur";
            $query = mysqli_query($koneksi, $sql) or die("SQL Anda Salah");
            //Baca hasil query dari databse, gunakan perulangan untuk 
            //Menampilkan data lebh dari satu. disini akan digunakan
            //while dan fungdi mysqli_fecth_array
            //Membuat variabel untuk menampilkan nomor urut
            $nomor = 0;
            //Melakukan perulangan u/menampilkan data
            while ($data = mysqli_fetch_array($query)) {
                $nomor++; //Penambahan satu untuk nilai var nomor
            ?>
                <tr>
                    <td style="text-align: center  !important"><?= $nomor ?></td>
                    <td><?= $data['nama_instruktur'] ?></td>
                    <td><?= $data['no_hp'] ?></td>
                    <td><?= $data['alamat'] ?></td>
                    <td class="text-center"><?= $data['jenis_klmn'] ?></td>
                    <td class="text-center"><?= $data['tanggal_kerja'] ?></td>
                    <td class="text-center">
                        <a href="?page=instruktur&actions=detail&id=<?= $data['id_instruktur'] ?>">
                            <span class="fa fa-eye text-info p-2"></span>
                        </a>
                        <a href="?page=instruktur&actions=edit&id=<?= $data['id_instruktur'] ?>">
                            <span class="fa fa-edit text-primary p-2"></span>
                        </a>
                        <a href="?page=instruktur&actions=delete&id=<?= $data['id_instruktur'] ?>">
                            <span class="fa fa-remove text-danger p-2"></span>
                        </a>
                    </td>
                </tr>
                <!--Tutup Perulangan data-->
            <?php } ?>
        </tbody>
    </table>
</div>