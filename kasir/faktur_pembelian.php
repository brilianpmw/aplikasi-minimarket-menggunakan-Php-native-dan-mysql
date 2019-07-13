<?php
include('../koneksi/koneksi.php');
$no_faktur=$_GET['no_faktur'];
$query_get_rinci_pembelian="SELECT tabel_pembelian.*,tabel_rinci_pembelian.*FROM tabel_pembelian,tabel_rinci_pembelian WHERE tabel_pembelian.no_faktur_pembelian='".$n0_faktur."'AND tabel_pembelian.no_faktur_pembelian=tabel_rinci_pembelian.no_faktur_pembelian";
$get_pembelian=mysql_query($query-get_rinci_pembelian);
$pembelian=mysql_fetch_array($get_pembelian);
$kd_supplier=$pembelian['kd_supplier'];
$tgl_pembelian=$pembelian['tgl_pembelian'];
$tgl=substr($tgl_pembelian,8,2);
$bln=substr($tgl_pembelian,5,2);
$thn=substr($tgl_pembelian,0,4);
$tgl_diformat_ind="".$tgl."-".$bln."-".$th."";
$id_user=$pembelian['id_user'];
$total_pembelian=$pembelian['total_pembelian'];
$query_get_data_supplier="SELECT*FROM tabel_supplier WHERE kd_supplier'".$kd_supplier."'";
$get_data_supplier=mysql_query($query_get_data_supplier);
$data_supplier=mysql_fetch_array($get_data_supplier);
$nm_supplier=$data_supplier['nm_supplier'];
$atas_nama=$data_supplier['atas_nama'];
$get_rinci_pembelian=mysql_query($query_get_rinci_pembelian);
$hitung_baris=mysql_num_rows($get_rinci_pembelian);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
#faktur{
	height:465px; width:100%; overflow:scroll;
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px}
#tabel_faktur{
	background-color:#FFF; margin-top:20px;}
.tr_info{
	color:#000; font-weight: bold;}
.tr_header_footer{
	color:#000; font-weight: bold;
	background-color:#CCC;}
.tr_item{
	color:#000; background-color:#FFF;}
</style>
</head>
<body onload="print()">
<div id="faktur"><table width="500" border="0" align="center" id="tabel_faktur">
<tr>
<td width="66"><span class="tr_info">NO FAAKTUR</span></td>
<td width="10"><span class="tr_info">:</span></td>
<td width="163"><?php echo $no_faktur;?>&nbsp;</td>
<td width="89"><span class="tr_info">KODE SUPPLIER</span></td>
<td width="10"><span class="tr_info">:</span></td>
<td width="163"><?php echo $kd_supplier;?>&nbsp;</td>
</tr>
<tr>
<td><span class="tr_info">TGL FAKTUR</span></td>
<td><span class="tr_info">:</span></td>
<td><?php echo $tgl_diformat_ind;?>&nbsp;</td>
<td><span class="tr_info">SUPPLIER</span></td>
<td><span class="tr_info">:</span></td>
<td><?php echo $nm_supplier;?>&nbsp;</td>
</tr>
<tr>
<td><span class="tr_info">ID USER</span></td>
<td><span class="tr_info">:</span></td>
<td><?php echo $id_user;?>&nbsp;</td>
<td><span class="tr_info">ATAS NAMA</span></td>
<td><span class="tr_info">:</span></td>
<td><?php echo $atas_nama;?>&nbsp;</td>
</tr>
<tr>
<td colspan="6"><table width="100%" border="0" align="center">
<tr class="tr_header_footer">
<td>KD BRG</td>
<td>NM BRG</td>
<td>SAT</td>
<td>JML</td>
<td>HRG</td>
<td>SUB TOTAL</td>
</tr>
<?php
$total_item=0;
while($rinci_pembelian=mysql_fetch_array($get_rinci_pembelian)){
	$kd_brg=$rinci_pembelian['kd_brg'];
	$nm_brg=$rinci_pembelian['nm_brg'];
	$sat=$rinci_pembelian['satuan'];
	$jml=$rinci_pembelian['jumlah'];
	$hrg=$rinci_pembelian['harga'];
	$sub_ttl=$rinci_pembelian['sub_total_beli'];
	$total_item=$jml+$total_item;
	?>
<tr class="tr_item">
	<td><?php echo $kd_brg;?>&nbsp;</td>
    <td><?php echo $nm_brg;?>&nbsp;</td>
    <td><?php echo $sat;?>&nbsp;</td>
    <td><?php echo $jml;?>&nbsp;</td>
    <td>RP.<?php echo $hrg;?>&nbsp;</td>
    <td><?php echo $sub_ttl;?>&nbsp;</td>
    </tr>
    <?php }?>
<tr class="tr_header_footer">
	<td>TOTAL</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><?php echo $total_item?>ITEMS</td>
    <td>&nbsp;</td>
    <td>RP.<?php echo $total_pembelian;?></td>
    </tr>
<tr class="tr_info">
	<td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3"><p>PALEMBANG,<?php echo $tgl_diformat_ind;?></p>
    <td>&nbsp;</td>
    <p>SUPPLIER</p>
    <p>(<?php echo $atas_nama;?>)</p></td>
    </tr>
    </table></td>
    </tr>
    </table>
    </div>
    </body>
    </html>