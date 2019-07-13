<?php
include('c:\xampp\htdocs\minimarket\koneksi\koneksi.php');
$query_data_satuan="SELECT * FROM tabel_satuan_barang";
$query_data_kategori="SELECT * FROM tabel_kategori_barang";
$ambil_satuan=mysql_query($query_data_satuan);
if(!$ambil_satuan){ echo "ambil satuan gabisa";}
$ambil_kategori=mysql_query($query_data_kategori);
if (!$ambil_kategori) {echo "ambil kategori ";}
?>
  
<?php
$query_cek_barang="SELECT * FROM tabel_barang";
$cek_barang=mysql_query($query_cek_barang);
$hitung_record=mysql_num_rows($cek_barang);
if($hitung_record = 0){echo "perhitungan salah";}
include('c:\xampp\htdocs\minimarket\paging.php');
$query_barang_paging="SELECT * FROM tabel_barang LIMIT ".$start_record.",".$max_data."";
$barang_paging=mysql_query($query_barang_paging);
?>


<?php
if (isset($_GET['kd_barang'])){
	$kd_barang=$_GET['kd_barang'];
	$query_barang_update ="SELECT * FROM tabel_barang WHERE kd_barang='".$kd_barang."'";
	$barang_update=mysql_query($query_barang_update);
	$data_barang_update=mysql_fetch_array($barang_update);
	$kd_update=$data_barang_update['kd_barang'];
	$nm_update=$data_barang_update['nm_barang'];
	$sat_update=$data_barang_update['kd_satuan'];
	$kat_update=$data_barang_update['kd_kategori'];
	$jual_update=$data_barang_update['hrg_jual'];
	$beli_update=$data_barang_update['hrg_beli'];}
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
	<?php if(isset($_GET['stt'])){
		$stt=$_GET['stt'];
		echo "query".$stt."";}?>
	</div>
	<br /> 
    <br />
<table width="95%" border="0" align="center">
	<tr>
		<td colspan="8" align="center" class="judul_tabel">DATA BARANG</td>
	</tr>
	<tr>
		<td colspan="8"><a href="#" onclick="hide(1)">Tambah Data</a></td>
	</tr>
	<tr class="header_tabel">
		<td align="center">Kode Barang</td>
		<td align="center">Nama Barang</td>
        <td align="center">Satuan</td>
        <td align="center">Kategori</td>
        <td align="center">Hrg Jual</td>
        <td align="center">Hrg Beli</td>
		<td colspan="2" align="center">Pilihan</td>
	</tr>
    <?php
	if($tampil_data==false){
		while($data_barang=mysql_fetch_array($barang_paging)){
			$kd_barang=$data_barang['kd_barang'];
			$nm_barang=$data_barang['nm_barang'];
			$satuan=$data_barang['kd_satuan'];
			$kategori=$data_barang['kd_kategori'];
			$hrg_jual=$data_barang['hrg_jual'];
			$hrg_beli=$data_barang['hrg_beli'];
			
	?>
	<tr class="isi_tabel">
		<td><?php echo $kd_barang;?>&nbsp;</td>
        <td><?php echo $nm_barang;?>&nbsp;</td>
		<td><?php echo $satuan;?>&nbsp;</td>
        <td><?php echo $kategori;?>&nbsp;</td>
        <td><?php echo $hrg_jual;?>&nbsp;</td>
        <td><?php echo $hrg_beli;?>&nbsp;</td>
		<td><a href="<?php echo $_SERVER['PHP_SELF'];?>?menu=barang&kd_barang=<?php echo $kd_barang;?>&do=update">Update</a></td>
		<td><a href="master_data/delete_barang.php?kd_barang=<?php echo $kd_barang; ?>">Delete</a></td>
	</tr>
	<?php }} ?>
    	<tr>
		<td colspan="8" class="footer_tabel"><?php include('c:\xampp\htdocs\minimarket\navigasi_paging.php');?></td>
	</tr>
</table>
	</div>
    
    <div id="query">
	<br />
    <br />
	<form action="master_data/simpan_barang.php" method="post" id="form_tambah">
	<table width="300" border="0" align="center">
		<tr>
			<td colspan="3" align="center">TAMBAH DATA</td>
		</tr>
		<tr>
			<td width="89">Kode Barang</td>
			<td width="4">:</td>
			<td width="193"><input type="text" name="kd_barang" id="kd_barang"/></td>
		</tr>
        <tr>
			<td>Nama Barang</td>
			<td>:</td>
			<td ><input type="text" name="nm_barang" id="nm_barang"/></td>
		</tr>
        <tr>
			<td>Satuan</td>
			<td>:</td>
			<td><select name="satuan" size="1" id="satuan">
				<?php
				while($data_satuan=mysql_fetch_array($ambil_satuan)){
				$kd_satuan=$data_satuan['kd_satuan'];
				$nm_satuan=$data_satuan['nm_satuan'];
				echo"<option value=".$kd_satuan.">".$nm_satuan."</option>";}
                ?>
                </select></td>
        </tr>
        <tr>
			<td>Kategori</td>
			<td>:</td>
			<td><select name="kategori" size="1" id="kategori">
				<?php
				while($data_kategori=mysql_fetch_array($ambil_kategori)){
				$kd_kategori=$data_kategori['kd_kategori'];
				$nm_kategori=$data_kategori['nm_kategori'];
				echo"<option value=".$kd_kategori.">".$nm_kategori."</option>";}
                ?>
                </select></td>
		</tr>
        <tr>
			<td>Hrg Jual</td>
			<td>:</td>
			<td ><input type="text" name="hrg_jual" id="hrg_jual"/></td>
		</tr>
        <tr>
			<td>Hrg Beli</td>
			<td>:</td>
			<td><input type="text" name="hrg_beli" id="hrg_beli"/></td>
		</tr>
        <tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td><input type="submit" name="button_tambah" id="button_tambah" value="Tambah" />
				<input type="reset" name="button_reset" id="button_reset" value="Reset" /></td>
		</tr>
	</table>
	</form>
	
	<form action="master_data/update_barang.php" method="post" id="form_update">
		<table width="300" border="0" align="center">
			<tr>
				<td colspan="3" align="center">UPDATE DATA</td>
			</tr>
			<tr>
				<td width="95">Kode Barang</td>
				<td width="4">:</td>
				<td width="187"><input name="kd_update" type="text" id="kd_update" value="<?php echo $kd_update;?>" readonly="readonly" /></td>
			</tr>
			<tr>
				<td>Nama Barang</td>
				<td>:</td>
				<td><input name="nm_update" type="text" id="nm_update" value="<?php echo $nm_update;?>" /></td>
			</tr>
            <tr>
				<td>Satuan</td>
				<td>:</td>
				<td><select name="sat_update" size="1" id="sat_update">
					<?php
					$ambil_sat_update=mysql_query($query_data_satuan);
					while($sat_update=mysql_fetch_array($ambil_sat_update)){
					$kd_sat_update=$sat_update['kd_satuan'];
					$nm_sat_update=$sat_update['nm_satuan'];
					echo"<option value=".$kd_sat_update.">".$nm_sat_update."</option>";}
                	?>
                    </select></td>
        	</tr>
            <tr>
				<td>Kategori</td>
				<td>:</td>
				<td><select name="kat_update" size="1" id="kat_update">
					<?php
					$ambil_kat_update=mysql_query($query_data_kategori);
					while($kat_update=mysql_fetch_array($ambil_kat_update)){
					$kd_kat_update=$kat_update['kd_kategori'];
					$nm_kat_update=$kat_update['nm_kategori'];
					echo"<option value=".$kd_kat_update.">".$nm_kat_update."</option>";}
                	?>
                    </select></td>
			</tr>
        	<tr>
				<td>Hrg Jual</td>
				<td>:</td>
				<td ><input name="jual_update" type="text" id="jual_update" value="<?php echo $jual_update ?>"/></td>
			</tr>
        	<tr>
				<td>Hrg Beli</td>
				<td>:</td>
				<td ><input name="beli_update" type="text" id="beli_update" value="<?php echo $beli_update; ?>"/></td>
			</tr>
            <tr>
            	<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td><input type="submit" name="button_update" id="button_update" value="Update" />
					<input type="button" name="button_cancel" id="button_cancel" value="Cancel" onclick="hide(0)" /></td>
            </tr>
		</table>
	</form>
</div>
</body>
</html>