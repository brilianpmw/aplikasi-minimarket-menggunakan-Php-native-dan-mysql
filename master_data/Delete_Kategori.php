<?php
include('../koneksi/koneksi.php');
if(isset($_GET['kd_kategori'])){
	$kd_kattegori=$_GET['kd_kategori'];
	$query_delete="DELETE FROM tabel_kategori_barang WHERE kd_kategori='".$kd_kategori."'";
	$delete=mysql_query($query_delete);
	if($delete){
		header("location:../index.php?menu=kategori&stt=sukses");}
		else{
			header("location:../index.php?menu=kategoristt=gagal");}}
			?>