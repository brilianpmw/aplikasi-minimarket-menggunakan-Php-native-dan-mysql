<?php
include ('c:\xampp\htdocs\minimarket\koneksi\koneksi.php');
$query_cek_supplier="SELECT * FROM tabel_supplier";
$cek_supplier=mysql_query($query_cek_supplier);
$hitung_record=mysql_num_rows($cek_supplier);
include('c:\xampp\htdocs\minimarket\paging.php');
$query_supplier_paging="SELECT * FROM tabel_supplier LIMIT ".$start_record.",".$max_data."";
$supplier_paging=mysql_query($query_supplier_paging);
?>

<?php
if(isset($_GET['kd_supplier'])){
	$kd_supplier=$_GET['kd_supplier'];
	$query_supplier_update="SELECT * FROM tabel_supplier WHERE kd_supplier='".$kd_supplier."'";
	$supplier_update=mysql_query($query_supplier_update);
	$data_to_update=mysql_fetch_array($supplier_update);
	$kd_update=$data_to_update['kd_supplier'];
	$nm_update=$data_to_update['nm_supplier'];
	$almt_update=$data_to_update['almt_supplier'];
	$tlp_update=$data_to_update['tlp_supplier'];
	$fax_update=$data_to_update['fax_supplier'];
	$ats_nm_update=$data_to_update['atas_nama'];}
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
<table width="95%" border="0" align="center">
	<tr>
		<td colspan="8" align="center" class="judul_tabel">DATA SUPPLIER</td>
	</tr>
	<tr>
		<td colspan="8"><a href="#" onclick="hide(1)">Tambah Data</a></td>
	</tr>
	<tr class="header_tabel">
		<td align="center">Kode Supplier</td>
		<td align="center">Nama Supplier</td>
        <td align="center">Alamat</td>
        <td align="center">Telepon</td>
        <td align="center">Fax</td>
        <td align="center">Atas Nama</td>
		<td colspan="2" align="center">Pilihan</td>
	</tr>
    <?php
	if($tampil_data==true){
		while($supplier=mysql_fetch_array($supplier_paging)){
			$kd_supplier=$supplier['kd_supplier'];
			$nm_supplier=$supplier['nm_supplier'];
			$alamat=$supplier['almt_supplier'];
			$telepon=$supplier['tlp_supplier'];
			$fax=$supplier['fax_supplier'];
			$atas_nama=$supplier['atas_nama'];
	?>
	<tr class="isi_tabel">
		<td><?php echo $kd_supplier; ?>&nbsp;</td>
        <td><?php echo $nm_supplier; ?>&nbsp;</td>
		<td><?php echo $alamat; ?>&nbsp;</td>
        <td><?php echo $telepon; ?>&nbsp;</td>
        <td><?php echo $fax; ?>&nbsp;</td>
        <td><?php echo $atas_nama; ?>&nbsp;</td>
		<td><a href="<?php echo $_SERVER['PHP_SELF'];?>?menu=supplier&kd_supplier=<?php echo $kd_supplier;?>&do=update">Update</a></td>
		<td><a href="master_data/delete_supplier.php?kd_supplier=<?php echo $kd_supplier;?>">Delete</a></td>
	</tr>
    <?php }} ?>
		
    <tr>
		<td colspan="8" class="footer_tabel"><?php include('c:\xampp\htdocs\minimarket\navigasi_paging.php');?></td>
	</tr>
</table>
	</div>
    
    <div id="query">
	<br /> <br />
	<form action="master_data/simpan_supplier.php" method="post" id="form_tambah">
	<table width="300" border="0" align="center">
		<tr>
			<td colspan="3" align="center">TAMBAH DATA</td>
		</tr>
		<tr>
			<td width="95">Kode Supplier</td>
			<td width="4">:</td>
			<td width="187"><input type="text" name="kd_supplier" id="kd_supplier"/></td>
		</tr>
        <tr>
			<td>Nama Supplier</td>
			<td>:</td>
			<td ><input type="text" name="nm_supplier" id="nm_supplier"/></td>
		</tr>
        <tr>
        	<td valign="top">Alamat</td>
            <td valign="top">:</td>
            <td valign="top"><textarea name="alamat" id="alamat" cols="15" rows="5"></textarea></td>
        </tr>
        <tr>
			<td>Telepon</td>
			<td>:</td>
			<td ><input type="text" name="telepon" id="telepon"/></td>
		</tr>
        <tr>
        	<td>Fax</td>
			<td>:</td>
			<td ><input type="text" name="fax" id="fax"/></td>
		</tr>
        <tr>
        	<td>Atas Nama</td>
			<td>:</td>
			<td ><input type="text" name="atas_nama" id="atas_nama"/></td>
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
	
	<form action="master_data/update_suplier.php" method="post" id="form_update">
		<table width="300" border="0" align="center">
			<tr>
				<td colspan="3" align="center">UPDATE DATA</td>
			</tr>
			<tr>
				<td width="95">Kode Supplier</td>
				<td width="4">:</td>
				<td width="187"><input name="kd_update" type="text" id="kd_update" value="<?php echo $kd_update?>" readonly="readonly" /></td>
			</tr>
			<tr>
				<td>Nama Supplier</td>
				<td>:</td>
				<td><input name="nm_update" type="text" id="nm_update" value="<?php echo $nm_update;?>" /></td>
			</tr>
            <tr>
	        	<td valign="top">Alamat</td>
    	        <td valign="top">:</td>
        	    <td valign="top"><textarea name="almt_update" id="almt_update" cols="15" rows="5"><?php echo $almt_update;?></textarea></td>
        	</tr>
        	<tr>
				<td>Telepon</td>
				<td>:</td>
				<td ><input name="tlp_update" type="text" id="tlp_update" value="<?php echo $tlp_update;?>"/></td>
			</tr>
    	    <tr>
        		<td>Fax</td>
				<td>:</td>
				<td ><input name="fax_update" type="text" id="fax_update" value="<?php echo $fax_update;?>"/></td>
			</tr>
        	<tr>
        		<td>Atas Nama</td>
				<td>:</td>
				<td ><input name="ats_nm_update" type="text" id="ats_nm_update" value="<?php echo $ats_nm_update;?>"/></td>
			</tr>
            <tr>
            	<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td><input type="submit" name="button_update" id="button_update" value="Update" />
					<input type="button" name="button_cancel" id="button_cancel" value="Cancel" onclick="hide(0)" />
				</td>
            </tr>
		</table>
	</form>
</div>
</body>
</html>
