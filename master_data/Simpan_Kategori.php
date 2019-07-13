<?php
include('../koneksi/koneksi.php');
if(isset($_POST['button_tambah'])){
	$kd_kategori=$_POST['kd_kategori'];
	$nm_kategori=$_POST['nm_kategori'];
	$query_insert="INSERT INTO tabel_kategori_barang(kd_kategori,nm_kategori) VALUES('".$kd_kategori."','".$nm_kategori."')";
	$insert=mysql_query($query_insert);
	if($insert){
		header("location:../index.php?menu=kategori&stt=sukses");}
		else{
			header("location:../index.php?menu=kategori&stt=gagal");}
}
?>