<?php
if (!isset($_SESSION['idsesi'])) {
    echo "<script> window.location.assign('../index.php'); </script>";
}
?>

<div class="row mb-2">
    <div class="col-auto">
        <h4> Data Peserta Kursus </h4>
    </div>
    <?php
    if ($_SESSION['level'] == 1) : ?>
        <div class="col-auto">
            <a href="?page=pendaftaran&actions=tampil" class="btn btn-info p-2">
                [+] Siswa Baru
            </a>
        </div>
    <?php endif ?>
    <div class="col-auto">
        <a href="report/arsip_peserta.php" class="btn bg-gradient-primary p-2" target="_blank"> Print Laporan </a>
    </div>
</div>

<div class="table-responsive p-0">
    <table class="table table-hover table-striped align-items-center mb-0 text-sm" style="width:100%">
        <thead>
            <tr class="text-center">
                <th>No.</th>
                <th>Nama Peserta</th>
                <th>No Hp</th>
                <th>Alamat</th>
                <th>Jenis Kursus</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <!--ambil data dari database, dan tampilkan kedalam tabel-->
            <?php
            //buat sql untuk tampilan data, gunakan kata kunci select
            $sql = "SELECT * FROM peserta ORDER BY status ASC";
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
                    <td><?= $data['nama_peserta'] ?></td>
                    <td><?= $data['nomor_hp'] ?></td>
                    <td>
                        <?php
                        $text = $data['alamat'];
                        if (str_word_count($text) > 2) {
                            echo substr($text, 0, 15) . " ...";
                        } else {
                            echo $text;
                        }
                        ?>

                    </td>
                    <td><?= $data['id_kursus'] ?></td>
                    <td class="text-center">
                        <?php
                        $i = $data['status'];

                        if ($data['status'] == "lulus") { ?>
                            <span class="badge badge-pill bg-gradient-success"> <?= $i ?> </span>
                        <?php } else { ?>
                            <span class="badge badge-pill bg-gradient-primary"> <?= $i ?> </span>
                        <?php } ?>

                    </td>
                    <td class="text-center">
                        <a href="?page=peserta&actions=detail&id=<?= $data['no_id'] ?>">
                            <span class="fa fa-eye p-2 text-info"></span>
                        </a>
                        <?php if ($_SESSION['level'] == 1) : ?>
                            <a href="?page=peserta&actions=edit&id=<?= $data['no_id'] ?>">
                                <span class="fa fa-edit p-2 text-primary"></span>
                            </a>
                            <a href="?page=peserta&actions=delete&id=<?= $data['no_id'] ?>">
                                <span class="fa fa-remove p-2 text-danger"></span>
                            </a>
                        <?php endif ?>
                    </td>
                </tr>
                <!--Tutup Perulangan data-->
            <?php } ?>
        </tbody>
        <tfoot>

        </tfoot>
    </table>
</div>