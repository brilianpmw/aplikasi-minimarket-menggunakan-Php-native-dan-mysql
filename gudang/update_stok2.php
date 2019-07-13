<?php
session_start();
include('../koneksi/koneksi.php');
if(isset($_POST['button_selesai'])) {
$no_faktur=$_POST['no_faktur'];
$total_belanja=$_POST['total_belanja'];
$tgl_penjualan=date('Ymd');
$id_user=$_SESSION['id_user'];
$kd_toko=$_SESSION['kd_toko'];

$query="INSERT INTO tabel_penjualan (no_faktur_penjualan,tgl_penjualan,id_user,total_penjualan)VALUES('".$no_faktur."'.'".$tgl_penjualan."'.'".$id_user."'.'".$total_belanja."')";

$insert = mysql_query($query);
if ($insert) {
$query_item_penjualan="select kd_barang,SUM(jumlah) as total_item FROM tabel_rince_penjualan WHERE no_faktur_penjualan='".$no_faktur."' group by kd_barang";	
$item_penjualan=mysql_query($query_item_penjualan);
while($penjualan=mysql_fetch_array($item_penjualan)) {
$kd_barang=$penjualan['kd_barang'];
$total_item=$penjualan['total_item'];

$query_ambil_stok="SELECT stok FROM tabel_stok_toko WHERE kd_barang='".$kd_barang."' AND kd _toko='".$kd_toko."'";
$ambil_stok=mysql_query($query_ambil_stok);
$stok=mysql_fetch_array($ambil_stok);
$stok_lama=$stok['stok'];
$stok_baru=$stok_lama-$total_item;
$query_update_stok="UPDATE tabel_stok_toko SET stok='".$stok_baru."' WHERE kd_barang='".$kd_barang."' AND kd _toko='".$kd_toko."'";
$update_stok=mysql_query($query_update_stok); }}
else{echo "transaksi gagal"; }}
header('location:../index.php?menu=penjualan'); 
?> 