<?php
include('c:\xampp\htdocs\minimarket\koneksi\koneksi.php');
$query_cek_kategori="SELECT * FROM tabel_kategori_barang";
$cek_kategori=mysql_query($query_cek_kategori);
$hitung_record=mysql_num_rows($cek_kategori);
include('c:\xampp\htdocs\minimarket\paging.php');
$query_kategori_paging="SELECT * FROM tabel_kategori_barang LIMIT ".$start_record.",".$max_data."";
$kategori_paging=mysql_query($query_kategori_paging);
if (!$kategori_paging) {
	echo "gada datanya boss"; }
?>

<?php
if(isset($_GET['kd_kategori'])){
	$kd_kategori=$_GET['kd_kategori'];
	$query_kat_update="SELECT * FROM tabel_kategori_barang WHERE kd_kategori='".$kd_kategori."'";
	$kat_update=mysql_query($query_kat_update);
	$data_kat_update=mysql_fetch_array($kat_update);
	$kd_kat_update=$data_kat_update['kd_kategori'];
	$nm_kat_update=$data_kat_update['nm_kategori'];}
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
		<td colspan="4" align="center" class="judul_tabel">DATA KATEGORI BARANG</td>
	</tr>
	<tr>
		<td colspan="4"><a href="#" onclick="hide(1)">Tambah Data</a></td>
	</tr>
	<tr class="header_tabel">
		<td align="center">Kategori Barang</td>
		<td align="center">Nama Kategori</td>
		<td colspan="2" align="center">Pilihan</td>
	</tr>
    <?php
	if($tampil_data==true){
		while($kategori=mysql_fetch_array($kategori_paging)){
			$kd_kategori=$kategori['kd_kategori'];
			$nm_kategori=$kategori['nm_kategori'];
	?>
	<tr class="isi_tabel">
		<td><?php echo $kd_kategori; ?>&nbsp;</td>
		<td><?php echo $nm_kategori; ?>&nbsp;</td>
		<td><a href="<?php echo $_SERVER['PHP_SELF'];?>?menu=kategori&kd_kategori=<?php echo $kd_kategori;?>&do=update">Update</a></td>
		<td><a href="master_data/delete_kategori.php?kd_kategori=<?php echo $kd_kategori;?>">Delete</a></td>
	</tr>
	<?php }} ?>
	<tr>
		<td colspan="4" class="footer_tabel"><?php include('c:\xampp\htdocs\minimarket\navigasi_paging.php');?></td>
	</tr>
</table>
	</div>
    
    <div id="query">
	<br /> <br />
	<form action="master_data/simpan_kategori.php" method="post" id="form_tambah">
	<table width="300" border="0" align="center">
		<tr>
			<td colspan="3" align="center">TAMBAH DATA</td>
		</tr>
		<tr>
			<td width="98">Kode Kategori</td>
			<td width="4">:</td>
			<td width="184"><input name="kd_kategori" type="text" id="kd_kategori"/></td>
		</tr>
        <tr>
			<td>Nama Kategori</td>
			<td>:</td>
			<td ><input type="text" name="nm_kategori" id="nm_kategori"/></td>
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
	
	<form action="master_data/update_kategori.php" method="post" id="form_update">
		<table width="300" border="0" align="center">
			<tr>
				<td colspan="3" align="center">UPDATE DATA</td>
			</tr>
			<tr>
				<td width="69">Kode Kategori</td>
				<td width="4">:</td>
				<td width="213"><input name="kd_update" type="text" id="kd_update" value="<?php echo $kd_kat_update;?>" readonly="readonly" /></td>
			</tr>
			<tr>
				<td>Nama Kategori</td>
				<td>:</td>
				<td><input name="nm_update" type="text" id="nm_update" value="<?php echo $nm_update;?>" /></td>
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