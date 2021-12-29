<?php
//membuat query untuk hapus data
$sql="DELETE FROM catatan_pembayaran WHERE id_bayar ='".$_GET['id']."'";
$query=mysqli_query($koneksi, $sql) or die ("SQL Hapus Error");
if($query){
    echo"<script> window.location.assign('?page=laporan&actions=pembayaran');</script>";
}else{
    echo"<script> alert ('Maaf !!! Data Tidak Berhasil Dihapus') window.location.assign('?page=instruktur&actions=tampil');</scripr>";
}

