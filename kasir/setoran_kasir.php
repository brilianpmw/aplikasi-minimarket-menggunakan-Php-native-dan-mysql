<?php
include('c:\xampp\htdocs\minimarket\koneksi\koneksi.php');
if(isset($_POST['button'])){
	$tgl_awal=$_POST['tgl_awal'];
	$bln_awal=$_POST['bln_awal'];
	$thn_awal=$_POST['thn_awal'];
	$tanggal_awal=$thn_awal.$bln_awal.$tgl_awal;
	$tgl_akhir=$_POST['tgl_akhir'];
	$bln_akhir=$_POST['bln_akhir'];
	$thn_akhir=$_POST['thn_akhir'];
	$tanggal_akhir=$thn_akhir.$bln_akhir.$tgl_akhir;
	$id_user=$_POST['id_user'];
	$query_setoran=mysql_query("SELECT*FROM tabel_penjualan WHERE id_user='".$id_user."' AND tgl_penjualan BETWEEN '".$tanggal_awal."' AND '".$tanggal_akhir."'");}
	else{
		$id_user=$_SESSION['id_user'];
		$query_setoran=mysql_query("SELECT*FROM tabel_penjualan WHERE id_user='".$id_user."'");}
		?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
#pilih_setoran{
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px; color:#000;
	height:40px; width:100%;}
#setoran{
	font-family:Arial, Helvetica, sans-serif;
	font-size:10pt; color:#000;
	height:410px; width:100%; overflow:scroll;}
.header_footer{
	font-size:11pt; font-weight:bold; color:#FFF;
	background-color:#333;
	text-align:center;}
.isi_tabel{
	font-size:10pt; color:#000;
	background-color:#FFF;}
</style>
</head>
<body>
<div id="pilih_setoran"><form action="<?php $_SERVER['PHP_SELF'];?>" method="post" id="form_filter"><table width="95%" border="0" align="center">
<tr>
<td align="center">Tanggal Awal:
<select name="tgl_awal" size="1" id="tgl_awal">
<?php
for($i=1;$i<=31;$i++){
	if($i<10){$i="0".$i;}
	echo"<option value=".$i.">".$i."</option>";}
	?>
    </select><select name="bln_awal" size="1" id="bln_awal">
    <?php
	for($i=1;$i<=12;$i++){
	if($i<10){$i="0".$i;}
	echo"<option value=".$i.">".$i."</option>";}
	?>
	</select>
    <select name="thn_awal" size="1" id="thn_awal">
    <?php
	for($i=2013;$i<=date('Y');$i++){
	if($i<10){$i="0".$i;}
	echo"<option value=".$i.">".$i."</option>";}
	?>
	</select>
    Tanggal Akhir:
    <select name="tgl_akhir" size="1" id="tgl_akhir">
    <?php
	for($i=1;$i<=31;$i++){
	if($i<10){$i="0".$i;}
	echo"<option value=".$i.">".$i."</option>";}
	?>
	</select>
    <select name="bln_akhir" size="1" id="bln_akhir">
    <?php
	for($i=1;$i<=12;$i++){
	if($i<10){$i="0".$i;}
	echo"<option value=".$i.">".$i."</option>";}
	?>
	</select>
    <select name="thn_akhir" size="1" id="thn_akhir">
    <?php
	for($i=2013;$i<=date('Y');$i++){
	if($i<10){$i="0".$i;}
	echo"<option value=".$i.">".$i."</option>";}
	?>
	</select>
    Id User:
    <input name="id_user" type="text" id="id_user" value="<?php echo $_SESSION['id_user'];?>" size="10" readonly="readonly"/>
    <input type="submit" name="button" id="button" value="Submit" />
    <input type="submit" name="button2" id="button2" value="All" /></td>
    </tr>
    </table>
    </form></div>
    <div id="setoran">
    <table width="500" border="0" align="center">
    <tr class="header_footer">
    <td>No. Faktur</td>
    <td>Tanggal Penjualan</td>
    <td>Total Penjualan</td>
    </tr>
    <?php
	$total_seluruh=0;
	while($setoran=mysql_fetch_array($query_setoran)){
		$no_faktur=$setoran['no_faktur_penjualan'];
		$tgl_penjualan=$setoran['tgl_penjualan'];
		$total_penjualan=$setoran['total_penjualan'];
		$total_seluruh=$total_penjualan+$total_seluruh;
		?>
		<tr class="isi_tabel">
        <td><?php echo $no_faktur;?>&nbsp;</td>
        <td><?php echo $tgl_penjualan;?>&nbsp;</td>
        <td><?php echo $total_penjualan;?>&nbsp;</td>
        </tr>
   <?php } ?>
   <tr class="header_footer">
   <td colspan="2" align="right">Total Seluruh</td>
   <td align="left">Rp.<?php echo $total_seluruh;?></td>
    </tr>
    </table>
    </div>
    </body>
    </html>
        