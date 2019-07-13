<?php
include('../koneksi/koneksi.php');
if(isset($_GET['kd_toko'])){
	$kd_toko=$_GET['kd_toko'];
	$query_delete="DELETE FROM tabel_toko WHERE kd_toko='".$kd_toko."'";
	$delete=mysql_query($query_delete);
	if($delete){
		header("location:../index.php?menu=toko&stt=sukses");}
		else{
			header("location:../index.php?menu=toko&stt=gagal");}
}?>