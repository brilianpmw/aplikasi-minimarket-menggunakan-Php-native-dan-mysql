<?php
include('c:\xampp\htdocs\minimarket\koneksi\koneksi.php');
$query_cek_toko="SELECT * FROM tabel_toko";
$cek_toko=mysql_query($query_cek_toko);
$hitung_record=mysql_num_rows($cek_toko);
include('c:\xampp\htdocs\minimarket\paging.php');
$query_toko_paging="SELECT * FROM tabel_toko LIMIT ".$start_record.",".$max_data."";
$toko_paging=mysql_query($query_toko_paging)
?>

<?php
if(isset($_GET['kd_toko'])) {
	$kd_toko=$_GET['kd_toko'];
	$query_data_update="SELECT * FROM tabel_toko WHERE kd_toko='".$kd_toko."'";
	$toko_update = mysql_query($query_data_update);
	$data_toko_update=mysql_fetch_array($toko_update);
	$kd_toko_update=$data_toko_update['kd_toko'];
	$nm_toko_update=$data_toko_update['nm_toko'];
	$alamat_toko_update=$data_toko_update['almt_toko'];
	$telepon_toko_update=$data_toko_update['tlp_toko'];
	$fax_toko_update=$data_toko_update['fax_toko']; }
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>data_toko</title>
<link href="../css/form.css" rel="stylesheet" type="text/css" />
</head>

<body onload="hide(<?php echo $param; ?>)">
	<div id="view_data">
	<div id="info_query">
	<?php
		if(isset($_GET['stt'])){
		$stt=$_GET['stt'];
		echo "query".$stt."";}
	?>
    </div>
<br /> <br />
<table width="95%" border="0" align="center">
<tr>
	<td colspan="9" align="center" class="judul_tabel">DATA TOKO</td>
</tr>
<tr>
	<td colspan="9"><a href="#" onclick="hide(1)">Tambah Data</a></td>
</tr>
<tr class="header_tabel">
	<td align="center">Kode Toko</td>
    <td align="center">Nama Toko</td>
    <td align="center">Alamat</td>
    <td align="center">Telepon</td>
    <td align="center">Fax</td>
    <td align="center">Logo</td>
    <td align="center">Status</td>
    <td colspan="2" align="center">Pilihan</td>
</tr>
   
<?php
if($tampil_data==true) {
	while($toko=mysql_fetch_array($toko_paging)) {
		$kd_toko=$toko['kd_toko'];
		$nm_toko=$toko['nm_toko'];
		$alamat=$toko['almt_toko'];
		$telepon=$toko['tlp_toko'];
		$fax=$toko['fax_toko'];
		$logo=$toko['logo'];
		$status=$toko['status'];  
?>
<tr class="isi_tabel">
	<td> <?php echo $kd_toko; ?>&nbsp;</td>
    <td> <?php echo $nm_toko; ?>&nbsp;</td>
    <td> <?php echo $alamat; ?>&nbsp;</td>
    <td> <?php echo $telepon; ?>&nbsp;</td>
    <td> <?php echo $fax; ?>&nbsp;</td>
    <td><img src="images/<?php echo $logo; ?>" width="75" height="75" ? />&nbsp;</td>
    <td> <?php echo $status; ?>&nbsp;</td>
  	<td><a href="<?php echo $_SERVER['PHP_SELF']?>?menu=toko&kd_toko=<?php echo $kd_toko;?>&do=update">Update</a></td>
    <td><a href="master_data/delete_toko.php?kd_toko=<?php echo $kd_toko;?>">Delete</a></td>
</tr>
<?php }} ?>

<tr>
	<td colspan="9" class="footer_tabel"><?php include('c:\xampp\htdocs\minimarket\navigasi_paging.php');?></td>
</tr>
</table>
</div>

<div id="query">
<br /> <br />
<form action="master_data/simpan_toko.php" method="post" enctype="multipart/form-data" id="form_tambah"><table width="300" border="0" align="center">
<tr>
	<td colspan="3" align="center">TAMBAH DATA</td>
</tr>
<tr>
	<td width="64">Kode Toko</td>
    <td width="4">:</td>
    <td width="218"><input type="text" name="kd_toko" id="kd_toko" /></td>
</tr>
<tr>
	<td>Nama Toko</td>
    <td>:</td>
    <td><input type="text" name="nm_toko" id="nm_toko" /></td>
</tr>
<tr>
<td valign="top">Alamat</td>
<td valign="top">:</td>
<td valign="top"><textarea name="alamat" id="alamat" cols="15" rows="5"></textarea></td>
</tr>
<tr>
	<td>Telepon</td>
    <td>:</td>
    <td><input type="text" name="telepon" id="telepon" /></td>
</tr>
<tr>
	<td>Fax</td>
    <td>:</td>
    <td><input type="text" name="fax" id="fax" /></td>
</tr>
<tr>
	<td>Logo</td>
    <td>:</td>
    <td><input type="file" name="file_logo" id="file_logo" /></td>
</tr>
<tr>
	<td>Status</td>
    <td>:</td>
    <td><select name="status" size="1" id="status">
    	<option value="cabang">Cabang</option>
        <option value="pusat">Pusat</option>
        </select> </td>
</tr>
<tr>
	<td>Password</td>
    <td>:</td>
    <td><input type="password" name="password" id="password" /></td>
</tr>
<tr>
	<td>&nbsp;</td>
   	<td>&nbsp;</td>
	<td><input type="submit" name="button_tambah" id="button_tambah" value="Tambah" />
    	<input type="reset" name="button_reset" id="button_reset" value="Reset" /> </td>
</tr>
</table>
</form>

<form action="master_data/update_toko.php" method="post" enctype="multipart/form-data" id="form_update">
<table width="300" border="0" align="center">
<tr>
	<td colspan="3" align="center">UPDATE DATA</td>
</tr>
<tr>
	<td width="81">Kode Toko</td>
    <td width="4">:</td>
    <td width="201"><input name="kd_toko_update" type="text" id="kd_toko_update" value="<?php echo $kd_toko_update;?>" readonly="readonly" /></td>
</tr>
<tr>
	<td>Nama Toko</td>
    <td>:</td>
    <td><input name="nm_toko_update" type="text" id="nm_toko_update" value="<?php echo $nm_toko_update;?>" /></td>
</tr>
<tr>
	<td valign="top">Alamat</td>
	<td valign="top">:</td>
	<td valign="top"><textarea name="alamat_update" id="alamat_update" cols="15" rows="5"><?php echo $alamat_update;?></textarea></td>
</tr>
<tr>
	<td>Telepon</td>
    <td>:</td>
    <td><input name="telepon_update" type="text" id="telepon_update" value="<?php echo $telepon_update;?>"/></td>
</tr>
<tr>
	<td>Fax</td>
    <td>:</td>
    <td><input name="fax_update" type="text" id="fax_update" value="<?php echo $fax_update;?>" /></td>
</tr>
<tr>
	<td>Logo</td>
    <td>:</td>
    <td><input type="file" name="logo_update" id="logo_update" /></td>
</tr>
<tr>
	<td>Status</td>
    <td>:</td>
    <td><select name="status_update" size="1" id="status_update">
    	<option value="cabang">Cabang</option>
        <option value="pusat">Pusat</option>
        </select> </td>
</tr>
<tr>
	<td>Password</td>
    <td>:</td>
    <td><input type="password" name="password_update" id="password_update" /></td>
</tr>
<tr>
	<td>&nbsp;</td>
   	<td>&nbsp;</td>
	<td><input type="submit" name="button_update" id="button_update" value="update" />
    	<input type="reset" name="button_cancel" id="button_cancel" value="Cancel" onclick="hide(0)" /> </td>
</tr>
</table>
</form>
</div>
</body>
</html>