<?php
//membuat query untuk hapus data
$sql="DELETE FROM peserta WHERE no_id ='".$_GET['id']."'";
$query=mysqli_query($koneksi, $sql) or die ("SQL Hapus Error");
if($query){
    echo"<script> window.location.assign('?page=peserta&actions=tampil');</script>";
}else{
    echo"<script> alert ('Maaf !!! Data Tidak Berhasil Dihapus') window.location.assign('?page=instruktur&actions=tampil');</scripr>";
}

