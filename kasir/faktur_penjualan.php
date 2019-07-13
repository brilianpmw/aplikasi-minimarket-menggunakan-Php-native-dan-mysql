<?php
session_start();
include('../koneksi/koneksi.php');
$kd_toko=$_SESSION['kd_toko'];
$no_faktur=$_GET['no_faktur'];
$cash=$_GET['cash'];
$query_info_toko="SELECT*FROM tabel_toko WHERE kd_toko='".$kd_toko."'";
$ambil_info_toko=mysql_query($query_info_toko);
if (!$ambil_info_toko) {echo "ambil info  g bisa";}
$info_toko=mysql_fetch_array($ambil_info_toko);
$nama_toko=$info_toko['nm_toko'];
$alamat=$info_toko['almt_toko'];
$tlp_toko=$info_toko['tlp_toko'];
$fax_toko=$info_toko['fax_toko'];
$query_rinci_jual="SELECT * FROM tabel_rinci_penjualan WHERE no_faktur_penjualan='".$no_faktur."'";
$rinci_jual=mysql_query($query_rinci_jual);
if (!$rinci_jual){echo "rinci jual bermasaah";}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
body {
	font-family:Arial, Helvetica, sans-serif;
	font-size:8pt;
	color:#000;
	text-transform:uppercase;}
</style>
</head>
<body onload="print()">
<table width="250" border="0" align="center">
<tr>
<td colspan="4" align="center"><?php echo $nama_toko."<br>".$tlp_toko."".$fax_toko;
?>&nbsp; </br >
<hr width="75%">
</td>
</tr>
<tr>
<td colspan="4">RECEIPT<?php echo $no_faktur."".date('d-m-y');?></td>
</tr>
<tr>
<td height="17">NM BRG</td>
<td>JML</td>
<td>HRG</td>
<td>SUB TTL</td>
</tr>
<?php
$kembali=0;$total_item=0;$total_penjualan=0;
while($data_jual=mysql_fetch_array($rinci_jual)){
	$nm_barang=$data_jual['nm_barang'];
	$jml=$data_jual['jumlah'];
	$hrg=$data_jual['harga'];
	$sub_total=$data_jual['sub_total_penjualan'];
	$total_penjualan=$sub_total+$total_penjualan;
	$total_item=$jml+$total_item;
?>
<tr>
<td><?php echo $nm_barang;?>&nbsp;</td>
<td><?php echo $jml;?>&nbsp;</td>
<td><?php echo $hrg;?>&nbsp;</td>
<td>RP.<?php echo $sub_total;?>&nbsp;</td>
</tr>
<?php }$kembali=$cash-$total_penjualan;?>
<tr>
<td>TOTAL</td>
<td><?php echo $total_item;?>ITEM</TD>
<td>&nbsp;</td>
<td>RP.<?php echo $total_penjualan;?>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>CASH</td>
<td>RP.<?php echo $cash;?></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>KEMBALI</td>
<td>RP.<?php echo $kembali;?></td>
</tr>
<tr>
<td colspan="4" align="center"><p>&nbsp;</p>
<p>TERIMA KASIH ATAS KUNJUNGAN ANDA</p></td>
</tr>
</table>
</body>
</html>



  
	
	
	
	
	
	