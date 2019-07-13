<?php
include ('c:\xampp\htdocs\minimarket\koneksi\koneksi.php');
if(isset($_POST['button'])) {
	$kategori_request=$_POST['kategori'];
	$stok_request=$_POST['stok'];
	$kd_toko=$_POST['kd_toko'];
	if($stok_request==0) {
		$query_stok_barang="SELECT * FROM tabel_stok_toko, tabel_barang WHERE tabel_stok_toko.kd_barang=tabel_barang.kd_barang AND tabel_barang.kd_kategori='".$kategori_request."' AND tabel_stok_toko.stok=0 AND tabel_stok_toko.kd_TOKO='".$kd_toko."'" ; }
		else if($stok_request==1) {
		$query_stok_barang="SELECT * FROM tabel_stok_toko, tabel_barang WHERE tabel_stok_toko.kd_barang=tabel_barang.kd_barang AND tabel_barang.kd_kategori='".$kategori_request."' AND tabel_stok_toko.stok<50 AND tabel_stok_toko.kd_TOKO='".$kd_toko."'" ; }
		else if($stok_request==2) {
		$query_stok_barang="SELECT * FROM tabel_stok_toko, tabel_barang WHERE tabel_stok_toko.kd_barang=tabel_barang.kd_barang AND tabel_barang.kd_kategori='".$kategori_request."' AND tabel_stok_toko.kd_TOKO='".$kd_toko."'" ; } }
		else {
			$kd_toko=$_SESSION['kd_toko'];
			$query_stok_barang="SELECT * FROM tabel_stok_toko,tabel_barang WHERE tabel_stok_toko.kd_barang=tabel_barang.kd_barang AND tabel_stok_toko.kd_TOKO='".$kd_toko."'" ; }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
#pilih_stok {
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px; color:#000;
	height: 40px; width:100%; }
#pilih_stok {
	font-family:Arial, Helvetica, sans-serif;
	font-size:10pt; color:#000;
	height: 410px; width:100%; overflow:scroll; }
.header_tabel {
	font-size:11pt; font-weight:bold; color:#FFF;
	background-color:#333; text-align:center; }
.isi_tabel {
	font-size:10pt; color:#000;
	background-color:#FFF; }
.footer_tabel {
	background-color:#333; }
</style>
</head>

<body>
<div id="pilih_stok"><from action="<?php $_SERVER['PHP_SELF']; ?>" method="post" id="from_filter"><table width="95%" border="0" align="center">
<tr>
<td align="center">Kategori:
<select name="kategori" size="1" id="kategori">
<?php
	$query_kategori=mysql_query("SELECT * FROM tabel_kategori_barang");
	while($kategori=mysql_fetch_array($query_kategori)) {
	$kd_kategori=$kategori['kd_kategori'];
	$nm_kategori=$kategori['nm_kategori'];
	echo "<option value=".$kd_kategori.">".$nm_kategori."</option>"; }
?>
</select>

Stok :
	<select name="stok" size="1" id="stok">;
	<option value="0">0</option>
	<option value="1">Dibawah 50</option>
	<option value="2">Semua</option>
</select>

Kode Toko :
<select name="kd_toko" size="1" id="kd_toko">
<?php
if($_SESSION['status_toko']=="pusat"&&$_GET['view']=="cabang") {
	$query_toko=mysql_query("SELECT * FROM tabel_toko WHERE satatus='cabang'");
	while($toko=mysql_fetch_array($query_toko)) {
	$kd_toko=$toko['kd_toko']; }}
else {
	$kd_toko=$_SESSION['kd_toko']; }
	echo "<option value=".$kd_toko.">".$kd_toko."</option>"; 
?>
</select> <input type="submit" name="button" id="button" value="Submit" />
<input type="submit" name="button2" id="button2" value="All" /> </td>
</tr> </table>
</form>
</div>

<div id="stok_barang"><table width="95%" border="0" align="center">
<tr class="header_tabel">
	<td>Kode Barang</td>
   	<td>Nama Barang</td>
	<td>Stok</td>
	<td>Harga Jual</td>
</tr>

<?php
	$stok_barang=mysql_query($query_stok_barang);
	while($stok=mysql_fetch_array($stok_barang)) {
	$kd_barang=$stok['kd_barang'];
	$nm_barang=$stok['nm_barang'];
	$jumlah=$stok['stok'];
	$hrg_jual=$stok['hrg_jual'];
?>

<tr class="isi_tabel">
	<td><?php echo $kd_barang; ?>&nbsp;</td>
	<td><?php echo $nm_barang; ?>&nbsp;</td>
	<td><?php echo $jumlah; ?>&nbsp;</td>
	<td><?php echo $hrg_jual; ?>&nbsp;</td>
</tr>
<?php } ?>

<tr>
	<td colspan="4" class="footer_tabel">&nbsp;</td>
</tr> </table>
</div> </body> </html>
    
