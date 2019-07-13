<?php
include('../koneksi/koneksi.php');
if(isset($_POST['button_update'])){
	$kd_update=$_POST['kd_update'];
	$nm_update=$_POST['nm_update'];
	$almt_update=$_POST['almt_update'];
	$tlp_update=$_POST['tlp_update'];
	$fax_update=$_POST['fax_update'];
	$ats_nm_update=$_POST['ats_nm_update'];
	$query_update="UPDATE tabel_supplier SET nm_supplier='".$nm_update."',almt_supplier='".$almt_update."',tlp_supplier='".$tlp_update."',fax_supplier='".$fax_update."',atas_nama='".$ats_nm_update."' WHERE kd_supplier='".$kd_update."'";
	$update=mysql_query($query_update);
	if($update){
		header("location:../index.php?menu=supplier&stt=sukses");}
	else{
		header("location:../index.php?menu=supplier&stt=sukses");}}
		?>