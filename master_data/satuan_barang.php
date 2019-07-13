<?php
include ('c:\xampp\htdocs\minimarket\koneksi\koneksi.php');
$query_cek_satuan="SELECT * FROM tabel_satuan_barang";
$cek_satuan=mysql_query($query_cek_satuan);
if(!$cek_satuan){
	echo "tabel kosong boss";}
$hitung_record=mysql_num_rows($cek_satuan);
if($hitung_record = 0) {
	echo "gada row";}
include('c:\xampp\htdocs\minimarket\paging.php');
$query_satuan_paging="SELECT * FROM tabel_satuan_barang LIMIT ".$start_record.",".$max_data."";
$satuan_paging=mysql_query($query_satuan_paging);
if(!$satuan_paging){
	echo "bahayaaaa";}
?>

<?php
if(isset($_GET['kd_satuan'])){
	$kd_sat_update=$_GET['kd_satuan'];
	$query_sat_update="SELECT * FROM tabel_satuan_barang WHERE kd_satuan='".$kd_sat_update."'";
	$sat_update=mysql_query($query_sat_update);
	if (!$sat_update) { echo "data kosong coy";}
	$data_sat_update=mysql_fetch_array($sat_update);
	$kd_sat=$data_sat_update['kd_satuan'];
	$nm_sat=$data_sat_update['nm_satuan'];}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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
<table width="500" border="0" align="center">
	<tr>
		<td colspan="4" align="center" class="judul_tabel">DATA SATUAN BARANG</td>
	</tr>
	<tr>
		<td colspan="4"><a href="#" onclick="hide(1)">Tambah Data</a></td>
	</tr>
	<tr class="header_tabel">
		<td align="center">Kode Satuan</td>
		<td align="center">Nama Satuan</td>
		<td colspan="2" align="center">Pilihan</td>
	</tr>
    <?php
	if($tampil_data==false){
		while($satuan=mysql_fetch_array($satuan_paging)){
			$kd_satuan=$satuan['kd_satuan'];
			$nm_satuan=$satuan['nm_satuan'];
	?>
	<tr class="isi_tabel">
		<td><?php echo $kd_satuan; ?>&nbsp;</td>
		<td><?php echo $nm_satuan; ?>&nbsp;</td>
		<td><a href="<?php echo $_SERVER['PHP_SELF'];?>?menu=satuan&kd_satuan=<?php echo $kd_satuan;?>&do=update">Update</a></td>
		<td><a href="master_data/delete_satuan.php?kd_satuan=<?php echo $kd_satuan;?>">Delete</a></td>
	</tr>
	<?php }} ?>
	<tr>
		<td colspan="4" class="footer_tabel"><?php include('c:\xampp\htdocs\minimarket\navigasi_paging.php');?></td>
	</tr>
</table>
	</div>
    
    <div id="query">
	<br /> <br />
	<form action="master_data/simpan_satuan.php" method="post" id="form_tambah">
	<table width="300" border="0" align="center">
		<tr>
			<td colspan="3" align="center">TAMBAH DATA</td>
		</tr>
		<tr>
			<td width="95">Kode Satuan</td>
			<td width="10">:</td>
			<td width="181"><input type="text" name="kd_satuan" id="kd_satuan"/></td>
		</tr>
        <tr>
			<td>Nama Satuan</td>
			<td>:</td>
			<td ><input type="text" name="nm_satuan" id="nm_satuan"/></td>
		</tr>
        		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td><input type="submit" name="button_tambah" id="button_tambah" value="Tambah" />
				<input type="reset" name="button_reset" id="button_reset" value="Reset" />
			</td>
		</tr>
	</table>
	</form>
	
	<form action="master_data/update_satuan.php" method="post" id="form_update">
		<table width="300" border="0" align="center">
			<tr>
				<td colspan="3" align="center">UPDATE DATA</td>
			</tr>
			<tr>
				<td width="95">Kode Satuan</td>
				<td width="6">:</td>
				<td width="185"><input name="kd_update" type="text" id="kd_update" value="<?php echo $kd_sat?>" readonly="readonly" /></td>
			</tr>
			<tr>
				<td>Nama Satuan</td>
				<td>:</td>
				<td><input name="nm_update" type="text" id="nm_update" value="<?php echo $nm_sat;?>" /></td>
			</tr>
            <tr>
            	<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td><input type="submit" name="button_update" id="button_update" value="Update" />
					<input type="reset" name="button_cancel" id="button_cancel" value="Cancel" onclick="hide(0)" />
				</td>
            </tr>
		</table>
	</form>
</div>
</body>
</html>