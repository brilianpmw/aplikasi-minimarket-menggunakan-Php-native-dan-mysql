<?php
include('../koneksi/koneksi.php');
if(isset($_POST['button_update'])){
	$kd_update=$_POST['kd_update'];
	$nm_update=$_POST['nm_update'];
	$sat_update=$_POST['sat_update'];
	$kat_update=$_POST['kat_update'];
	$jual_update=$_POST['jual_update'];
	$beli_update=$_POST['beli_update'];
	$query_update="UPDATE tabel_barang SET nm_barang='".$nm_update."',kd_satuan='".$sat_update."',kd_kategori='".$kat_update."',hrg_jual='".$jual_update."',hrg_beli='".$beli_update."' WHERE kd_barang='".$kd_update."'";
	$update=mysql_query($query_update);
	if($update){
		header("location:../index.php?menu=barang&stt=sukses");}
	else{
		header("location:../index.php?menu=barang&stt=gagal");}
}
?>			