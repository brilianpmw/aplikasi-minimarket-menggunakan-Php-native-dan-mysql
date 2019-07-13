<?php
session_start();
include ('c:\xampp\htdocs\minimarket\koneksi\koneksi.php');
$kd_toko = $_SESSION['kd_toko'];
if(isset ($_GET['no_faktur'])){
	$no_faktur=$_GET['no_faktur'];}
$kuerifaktur = "SELECT * FROM tabel_rinci_pembelian where no_faktur_pembelian = '".$no_faktur."'";
$faktur = mysql_query($kuerifaktur);
if ($faktur) {
	$arayfaktur = mysql_fetch_array($faktur);
	$kd_barang=$arayfaktur['kd_barang'];
	$jml = $arayfaktur['jumlah']; }
$kueristok = "select * from tabel_stok_toko where kd_toko = '".$kd_toko."' and kd_barang='".$kd_barang."'";
$cekstok = mysql_query($kueristok);
$hitungrow = mysql_num_rows($cekstok);
if ($hitungrow > 0 ) { 
	$awal = mysql_fetch_array($cekstok);
	$jumlahawal = $awal['stok'];
	$jumlah= $jumlahawal + $jml;
	$kueriupdate = "update tabel_stok_toko SET stok= '".$jumlah."' where kd_toko ='".$kd_toko."' and kd_barang='".$kd_barang."'";
	$update=mysql_query($kueriupdate); }
else {
	$kueriinsert = "INSERT INTO tabel_stok_toko(kd_toko,kd_barang,stok) VALUES ('".$kd_toko."','".$kd_barang."','".$jml."')";
	$insert = mysql_query($kueriinsert);}
if ($insert || $update) {header("location:../index.php?menu=faktur_pembelian&no_faktur='".$no_faktur."'");}

	 
?>