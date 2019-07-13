<?php
include('../koneksi/koneksi.php');
if(isset($_POST['button_tambah'])){
	$kd_barang=$_POST['kd_barang'];
	$nm_barang=$_POST['nm_barang'];
	$satuan=$_POST['satuan'];
	$kategori=$_POST['kategori'];
	$hrg_jual=$_POST['hrg_jual'];
	$hrg_beli=$_POST['hrg_beli'];
	$query_insert="INSERT INTO tabel_barang(kd_barang,nm_barang,kd_satuan,kd_kategori,hrg_jual,hrg_beli)VALUES('".$kd_barang."','".$nm_barang."','".$satuan."','".$kategori."','".$hrg_jual."','".$hrg_beli."')";
	$insert=mysql_query($query_insert);
	if($insert){
		header("location:../index.php?menu=barang&stt=sukses");}
		else{
			header("location:../index.php?menu=barang&stt=gagal");}
}
?>