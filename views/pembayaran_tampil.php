<?php
if (!isset($_SESSION['idsesi'])) {
    echo "<script> window.location.assign('../index.php'); </script>";
}
?>

<div class="row mb-2">
    <div class="col-auto">
        <h4> Data pembayaran </h4>
    </div>
    <div class="col-auto">
        <a href="report/arsip_semua.php" class="btn bg-gradient-primary p-2"> Print Laporan </a>
    </div>
    <div class="col-auto">
        <a href="report/arsip_perbulan.php" class="btn bg-gradient-primary p-2"> Print Laporan Perbulan </a>
    </div>
</div>

<div class="table-responsive p-0">
    <table class="table table-hover table-striped align-items-center mb-0 text-sm">
        <thead>
            <tr>
                <th class="text-center">No.</th>
                <th class="text-center">Nama Peserta</th>
                <th class="text-center">Jenis Kursus</th>
                <th class="text-center">Biaya</th>
                <th class="text-center">Jumlah Bayar</th>
                <th class="text-center">Sisa Pembayaran</th>
                <th class="text-center">Aksi</th>
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
                    <td class="text-center"><?= $nomor ?></td>
                    <td>
                        <?php
                        $text = $data['nama_peserta'];

                        if (
                            str_word_count($text) > 1
                        ) {
                            echo substr($text, 0, 12) . "***";
                        } else {
                            echo $text;
                        }
                        ?>
                    </td>
                    <td><?= $data['nama_kursus'] ?></td>
                    <td class="text-center"><?= "Rp. " . number_format($data['biaya_awal'], 2, ',', '.') ?></td>
                    <td class="text-center"><?= "Rp. " . number_format($data['jmlh_bayar'], 2, ',', '.') ?></td>
                    <td class="text-center"><?php
                                            if ($data['status'] == 0) {
                                                echo "Lunas";
                                            } else {
                                                echo "Rp. " . number_format($data['status'], 2, ',', '.');
                                            }
                                            ?></td>
                    <td class="text-center">
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
    </table>
</div>