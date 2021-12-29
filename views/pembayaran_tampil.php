<?php
if (!isset($_SESSION['idsesi'])) {
    echo "<script> window.location.assign('../index.php'); </script>";
}
?>

<div class="row mb-2">
    <div class="col-auto">
        <h4> Data Pembayaran </h4>
    </div>
</div>

<div class="table-responsive p-0">
    <table class="table table-hover table-striped align-items-center mb-0 text-sm" style="width:100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Peserta</th>
                <th>Jenis Kursus</th>
                <th>Biaya</th>
                <th>Jumlah Bayar</th>
                <th>Sisa Pembayaran</th>
                <th>ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            <!--ambil data dari database, dan tampilkan kedalam tabel-->
            <?php
            //buat sql untuk tampilan data, gunakan kata kunci select
            $sql = "SELECT * FROM bayar ORDER BY status DESC";
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
                    <td><?= $data['nama_peserta'] ?></td>
                    <td><?= $data['nama_kursus'] ?></td>
                    <td><?= $data['biaya_awal'] ?></td>
                    <td><?= $data['jmlh_bayar'] ?></td>
                    <td><?php
                        if ($data['status'] == 0) {
                            echo "Lunas";
                        } else {
                            echo $data['status'];
                        }
                        ?></td>
                    <td>
                        <a href="?page=pembayaran&actions=detail&id=<?= $data['id_bayar'] ?>">
                            <span class="fa fa-eye text-info p-2"></span>
                        </a>
                        <a href="?page=pembayaran&actions=edit&id=<?= $data['id_bayar'] ?>">
                            <span class="fa fa-edit text-primary p-2"></span>
                        </a>
                        <a href="?page=pembayaran&actions=delete&id=<?= $data['id_bayar'] ?>">
                            <span class="fa fa-remove text-danger p-2"></span>
                        </a>
                    </td>
                </tr>
                <!--Tutup Perulangan data-->
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="7">
                    <span>Data Pembayaran</span>
                </td>
            </tr>
        </tfoot>
    </table>
</div>