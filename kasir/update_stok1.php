<?php
session_start();
include('../koneksi/koneksi.php');
$kd_toko=$_SESSION['kd_toko'];
$no_faktur=$_GET['no_faktur'];
$query_get_rinci_pembelian="SELECT tabel_rinci_pembelian.*,tabel_pembelian.no_faktur_pembelian FROM tabel_rinci_pembelian,tabel_pembelian WHERE tabel_rinci_pembelian.no_faktur_pembelian=tabel_pembelian.no_faktur_pembelian AND tabel_pembelian.no_faktur_pembelian='".$no_faktur."'";
$get_rinci_pembelian=mysql_query($query_get_rinci_pembelian);
if(!$get_rinci_pembelian){ echo "gbisa";}
while($rinci_pembelian=mysql_fetch_array($get_rinci_pembelian)){
	$kd_barang=$rinci_pembelian['kd_barang'];
	$jml=$rinci_pembelian['jumlah'];
	$query_get_stok="SELECT*FROM tabel_stok_toko WHERE kd_barang='".$kd_barang."'AND kd_toko='".$kd_toko."'";
	$get_stok=mysql_query($query_get_stok);
	$hitung_record_stok=mysql_num_rows($get_stok);
	if($hitung_record_stok>0){
		$stok=mysql_fetch_array($get_stok);
		$jml_stok=$stok['stok'];
		$stok_baru=$jml_stok+$jml;
		$query_update_stok="UPDATE tabel_stok_toko SET stok='".$stok_baru."' WHERE kd_barang='".$kd_barang."' AND kd_toko='".$kd_toko."'";
		$update_stok=mysql_query($query_update_stok);}
		else{
			$query_insert_stok="INSERT INTO tabel_stok_toko(kd_toko,kd_barang,stok) VALUES ('".$kd_toko."','".$kd_barang."','".$jml."')";
			$insert_stok=mysql_query($query_insert_stok);}}
			if(!$update_stok || !$insert_stok){
				header("location:../index.php?menu=faktur_pembelian&no_faktur=".$no_faktur."'");}
				?>
