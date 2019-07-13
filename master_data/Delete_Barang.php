<?php
include('../koneksi/koneksi.php');
if(isset($_GET['kd_barang'])){
$kd_barang=$_GET['kd_barang'];
$query_delete="DELETE FROM tabel_barang WHERE kd_barang='".$kd_barang."'";
$delete=mysql_query($query_delete);
if($delete){
header("location:../index.php?menu=barang&stt=sukses");}
else{
header("location:../index.php?menu=barang&stt=gagal");}
}
?>