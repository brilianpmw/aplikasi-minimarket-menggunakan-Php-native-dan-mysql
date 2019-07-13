<?php
include('../koneksi/koneksi.php');
if(isset($_POST['button_tambah'])){
	$kd_toko=$_POST['kd_toko'];
	$nm_toko=$_POST['nm_toko'];
	$alamat=$_POST['alamat'];
	$telepon=$_POST['telepon'];
	$fax=$_POST['fax'];
	$password=$_POST['password'];
	$status=$_POST['status'];
	$error=false;
	$folder="../images/";
	$file_type=array('jpg','jpeg','png','bmp','gif');
	$max_size=3000000;
	$file_name=$_FILES['file_logo']['name'];
	$file_size=$_FILES['file_logo']['size'];
	$explode=explode('.',$file_name);
	$extensi=$explode[count($explode)-1];
	if(in_array($extensi,$file_type)){
		$error=true;
		$pesan="Type file tidak sesuai";}
		if($file_size>$max_size){
			echo"<script language='javascript'>
			window.alert('Proses penyimpanan gagal".$pesan."');javascript:history.back();</script>";}
			else{
				if(move_uploaded_file($_FILES['file_logo']['tmp_name'],$folder.$file_name)){
	$query_insert="INSERT INTO tabel_toko(kd_toko,nm_toko,almt_toko,tlp_toko,fax_toko,logo,password,status) 
	VALUES('".$kd_toko."','".$nm_toko."','".$alamat."','".$telepon."','".$fax."','".$file_name."',md5('".$password."'),'".$status."')";
	$insert=mysql_query($query_insert);
	if($insert){
		header("location:../index.php?menu=toko&stt=sukses");}
		else{
			header("location:../index.php?menu=toko&stt=gagal");}
}
else{
	echo"<script language='javascript'>window.alert ('Proses penyimpanan gagal silahkan isi data kembali');javascript:history.back();</script>";}
			}}?>