<?php
include('../koneksi/koneksi.php');
if(isset($_POST['button_update'])){
	echo "sudah di set";
	$kd_satuan=$_POST['kd_update'];
	$nm_satuan=$_POST['nm_update'];
	$query_update="UPDATE tabel_satuan_barang SET nm_satuan='".$nm_satuan."' WHERE kd_satuan='".$kd_satuan."'" ;
	$update=mysql_query($query_update);
	if($update){
		header("location:../index.php?menu=satuan&stt=sukses");}
	else{
		header("location:../index.php?menu=satuan&stt=gagal");}}
		?>