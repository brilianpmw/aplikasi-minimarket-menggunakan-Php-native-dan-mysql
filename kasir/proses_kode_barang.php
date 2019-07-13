<?php
session_start();
include('c:\xampp\htdocs\minimarket\koneksi\koneksi.php');
if(isset($_GET['kd_barang'])&&isset($_GET['no_faktur'])){
	$kd_barang=$_POST['kd_barang'];
	$no_faktur=$_POST['no_faktur'];
	$kd_toko=$_SESSION['kd_toko'];
$query="SELECT tabel_barang.*,tabel_stok_toko.kd_barang FROM tabel_barang,tabel_stok_toko WHERE tabel_barang.kd_barang='".$kd_barang."' AND tabel_stok_toko.kd_barang='".$kd_barang."' AND tabel_stok_toko.kd_toko='".$kd_toko."'";
$get_data=mysql_query($query);
if (!$get_data) {
	echo"<script language='javascript'>
			window.alert('ada yang salah');javascript:history.back();</script>";}
$found=mysql_num_rows($get_data);

if($found>0){
	$data=mysql_fetch_array($get_data);
	$kd_barang=$data['kd_barang'];
	$nm_barang=$data['nm_barang'];
	$kd_satuan=$data['kd_satuan'];
	$kd_kategori=$data['kd_kategori'];
	$hrg_jual=$data['hrg_jual'];
	$hrg_beli=$data['hrg_beli'];
	$stok=$data['stok'];
	$jml=1;
	$sub_total=$hrg_jual*$jml;
$query_rinci_jual="INSERT INTO tabel_rinci_penjualan(no_faktur_penjualan,kd_barang,nm_barang,jumlah,harga,sub_total_jual)VALUES('".$no_faktur."','".$kd_barang."','".$nm_barang."','".$jml."','".$hrg_jual."','".$sub_total."')";
$insert_rinci_jual=mysql_query($query_rinci_jual);
if($insert_rinci_jual){
	header('location:../index.php?menu=penjualan');}
	else{
		echo"Terjadi Kesalahan, Tidak Dapat Melanjutkan Proses";}}
		else{
			echo"<script type='text/javascript'>alert('Kode Barang Tidak Terdaftar!');
			document.location.href='../index.php?menu=penjualan';</script>;";}}
			?>
			