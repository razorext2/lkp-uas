<?php
if (!isset($_SESSION['idsesi'])) {
    echo "<script> window.location.assign('../index.php'); </script>";
}
?>

<div class="row mb-2">
    <div class="col-auto">
        <h4> Data Pembayaran </h4>
    </div>
    <div class="col-auto">
        <a href="?page=kursus&actions=tambah" class="btn btn-info btn-sm">
            [+] Kursus
        </a>
    </div>
</div>

<div class="table-responsive p-0">
    <table class="table table-hover table-striped align-items-center mb-0 text-sm" style="width:100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Id Kursus</th>
                <th>Nama Kursus</th>
                <th>Biaya Kursus</th>
                <th>Id Instruktur</th>
                <th>Jumlah Pertemuan</th>
                <th>ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            <!--ambil data dari database, dan tampilkan kedalam tabel-->
            <?php
            //buat sql untuk tampilan data, gunakan kata kunci select
            $sql = "SELECT * FROM kursus";
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
                    <td><?= $nomor ?></td>
                    <td><?= $data['id_kursus'] ?></td>
                    <td><?= $data['nama_kursus'] ?></td>
                    <td><?= $data['biaya'] ?></td>
                    <td><?= $data['id_instruktur'] ?></td>
                    <td><?= $data['jmlh_pertemuan'] ?></td>
                    <td>
                        <a href="?page=kursus&actions=detail&id=<?= $data['id_kursus'] ?>">
                            <span class="fa fa-eye text-info p-2"></span>
                        </a>
                        <a href="?page=kursus&actions=edit&id=<?= $data['id_kursus'] ?>">
                            <span class="fa fa-edit text-primary p-2"></span>
                        </a>
                        <a href="?page=kursus&actions=delete&id=<?= $data['id_kursus'] ?>">
                            <span class="fa fa-remove text-danger p-2"></span>
                        </a>
                    </td>
                </tr>
                <!--Tutup Perulangan data-->
            <?php } ?>
        </tbody>
    </table>
</div>