<!DOCTYPE html>
<html>

<head>
  <title>Cetak Data Pembayaran Perbulan</title>
  <link href="../assets/css/soft-ui-dashboard.min.css " rel="stylesheet" type="text/css" />
</head>

<body onload="print()">
  <!--Menampilkan data detail arsip-->
  <?php
  include '../config/koneksi.php';
  $ambilbln = $_POST['bulan'];
  $ambilthn = $_POST['tahun'];
  $bulanNama;
  if ($ambilbln == 12) {
    $bulanNama = "DESEMBER";
  } elseif ($ambilbln == 11) {
    $bulanNama = "NOVEMBER";
  } elseif ($ambilbln == 10) {
    $bulanNama = "OKTOBER";
  } elseif ($ambilbln == 9) {
    $bulanNama = "SEPTEMBER";
  } elseif ($ambilbln == 8) {
    $bulanNama = "AGUSTUS";
  } elseif ($ambilbln == 7) {
    $bulanNama = "JULI";
  } elseif ($ambilbln == 6) {
    $bulanNama = "JUNI";
  } elseif ($ambilbln == 5) {
    $bulanNama = "MEI";
  } elseif ($ambilbln == 4) {
    $bulanNama = "APRIL";
  } elseif ($ambilbln == 3) {
    $bulanNama = "MARET";
  } elseif ($ambilbln == 2) {
    $bulanNama = "FEBRUARI";
  } elseif ($ambilbln == 1) {
    $bulanNama = "JANUARI";
  }

  ?>

  <div class="container">
    <div class='row'>
      <div class="col-sm-12">
        <!--dalam tabel--->
        <div>
          <h5 class="py-0 text-center">Catatan Pembayaran Peserta Didik LKP SRH Training Center </h5>
          <h6 class="py-0 text-center"> Pulau Rakyat Pekan Ds. 2, Pulau Rakyat Tua, Pulau Rakyat </h6>
          <h5 class="py-0 text-center">Kabupaten Asahan, Sumatera Utara, Kode Pos : 21273</h5>
          <hr>
          <h4 class="py-0 text-center">Data Pembayaran Peserta Bulan : <?= $bulanNama . ' / ' . $ambilthn; ?></h4>
          <table class="table table-bordered table-striped table-hover text-sm">
            <tbody>
              <thead>
                <tr>
                  <th width="200" class="text-center">No.</th>
                  <th>Nama Peserta</th>
                  <th>Jumlah Bayar</th>
                  <th>Sisa</th>
                  <th>Tanggal Pembayaran</th>
                </tr>
              </thead>
            <tbody>
              <!--ambil data dari database, dan tampilkan kedalam tabel-->
              <?php
              //buat sql untuk tampilan data, gunakan kata kunci select
              $sql = "SELECT * FROM catatan_pembayaran WHERE substr(tanggal,1,7)='$ambilthn-$ambilbln'";
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
                  <td><?= 'Rp. ' . number_format($data['jmlh_bayar'], 2, ',', '.') ?></td>
                  <td><?php
                      if ($data['sisa'] == 0) {
                        echo "Lunas";
                      } else {
                        echo 'Rp. ' . number_format($data['sisa'], 2, ',', '.');
                      }

                      ?></td>
                  <td class="text-center"><?= $data['tanggal'] ?></td>
                </tr>
                <!--Tutup Perulangan data-->
              <?php } ?>
            </tbody>


            <tfoot>
              <tr>
                <td colspan="8" class="text-right">
                  Pulau Rakyat <?= date("d-m-Y") ?>
                  <br><br><br>
                  <u>SRH Training Center<strong></u><br>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
</body>

</html>