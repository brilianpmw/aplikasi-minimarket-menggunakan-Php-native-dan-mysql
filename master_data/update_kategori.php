<?php
include('../koneksi/koneksi.php');
if(isset($_POST['button_update'])){
	$kd_kat_update=$_POST['kd_update'];
	$nm_kat_update=$_POST['nm_update'];
	$query_update="UPDATE tabel_kategori_barang SET nm_kategori='".$nm_kat_update."'WHERE kd_kategori='".$kd_kat_update."'";
	$update=mysql_query($query_update);
	if($update){
		header("location:../index.php?menu=kategori&stt=sukses");}
	else{
		header("location:../index.php?menu=kategori&stt=gagal");}}
		?>