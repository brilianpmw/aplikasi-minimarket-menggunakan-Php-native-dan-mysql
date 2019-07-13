<?php
include('../koneksi/koneksi.php');
if(isset($_GET['kd_supplier'])){
	$kd_supplier=$_GET['kd_supplier'];
	$query_delete="DELETE FROM tabel_supplier WHERE kd_supplier='".$kd_supplier."'";
	$delete=mysql_query($query_delete);
	if($delete){
		header("location:../index.php?menu=supplier&stt=sukses");}
		else{
			header("location:../index.php?menu=supplier&stt=gagal");}}
?>