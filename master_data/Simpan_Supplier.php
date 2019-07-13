<?php
include('../koneksi/koneksi.php');
if(isset($_POST['button_tambah'])){
	$kd_supplier=$_POST['kd_supplier'];
	$nm_supplier=$_POST['nm_supplier'];
	$alamat=$_POST['alamat'];
	$telepon=$_POST['telepon'];
	$fax=$_POST['fax'];
	$atas_nama=$_POST['atas_nama'];
	$query_insert="INSERT INTO tabel_supplier(kd_supplier,nm_supplier,almt_supplier,tlp_supplier,fax_supplier,atas_nama) 
	VALUES ('".$kd_supplier."','".$nm_supplier."','".$alamat."','".$telepon."','".$fax."','".$atas_nama."')";
	$insert=mysql_query($query_insert);
	if($insert){
		header("location:../index.php?menu=supplier&stt=sukses");}
		else{
			header("location:../index.php?menu=supplier&stt=gagal");}}
?>