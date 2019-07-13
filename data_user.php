<?php
include('c:\xampp\htdocs\minimarket\koneksi\koneksi.php');
$cek_tabel=mysql_query("SELECT * FROM tabel_user");
if (!$cek_tabel){
	echo "tabel kosong" ;}
$hitung_record=mysql_num_rows($cek_tabel);
include('c:\xampp\htdocs\minimarket\paging.php');
$query_user_paging="SELECT * FROM tabel_user LIMIT ".$start_record.",".$max_data."";
$user_paging=mysql_query($query_user_paging);
?>

<?php
if(isset($_GET['id_user'])){
	$id_user=$_GET['id_user'];
	$query_user_for_update="SELECT * FROM tabel_user WHERE id_user='".$id_user."'";
	$user_for_update=mysql_query($query_user_for_update);
	$user_update=mysql_fetch_array($user_for_update);
	$id_update=$user_update['id_user'];
	$nm_update=$user_update['nm_user'];
	$akses_update=$user_update['akses'];}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Data User</title>
	<link href="css/form.css"" rel="stylesheet" type="text/css" />
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
		<td colspan="6" align="center" class="judul_tabel">DATA USER</td>
	</tr>
	<tr>
		<td colspan="6"><a href="#" onclick="hide(1)">Tambah Data</a></td>
	</tr>
	<tr class="header_tabel">
		<td align="center">Id User</td>
		<td align="center">Kode Toko</td>
		<td align="center">Nama User</td>
		<td align="center">Hak Akses</td>
		<td colspan="2" align="center">Pilihan</td>
	</tr>
	<?php
	if($tampil_data==true){
		while($data_user=mysql_fetch_array($user_paging)){
			$id_user=$data_user['id_user'];
			$nm_user=$data_user['nm_user'];
			$akses=$data_user['akses'];
			$kd_toko=$data_user['kd_toko'];
	?>
	<tr class="isi_tabel">
		<td><?php echo $id_user; ?>&nbsp;</td>
		<td><?php echo $kd_toko; ?>&nbsp;</td>
		<td><?php echo $nm_user; ?>&nbsp;</td>
		<td><?php echo $akses; ?>&nbsp;</td>
		<td><a href="<?php echo $_SERVER['PHP_SELF'];?>?menu=user&id_user=<?php echo $id_user;?>&do=update">Update</a></td>
		<td><a href="master_data/delete_user.php?id_user=<?php echo $id_user;?>">Delete</a></td>
	</tr>
	<?php }} ?>
	<tr>
		<td colspan="6" class="footer_tabel"><?php include('c:\xampp\htdocs\minimarket\navigasi_paging.php');?></td>
	</tr>
</table>
	</div>

<div id="query">
	<br/><br />
	<form action="master_data/Simpan_user.php" method="post" id="form_tambah">
	<table width="300" border="0" align="center">
		<tr>
			<td colspan="3" align="center">TAMBAH DATA</td>
		</tr>
		<tr>
			<td width="71">Nama User</td>
			<td width="4">:</td>
			<td width="211"><input type="text" name="nm_user" id="aaaaa"/></td>
		</tr>
		<tr>
			<td>Kode Toko</td>
			<td>:</td>
			<td><select name="kd_toko" size="1" id="kd_toko">
				<?php
				$query_kd_toko=mysql_query("SELECT kd_toko FROM tabel_toko");
				while($result_kd_toko=mysql_fetch_array($query_kd_toko)){
				$kd_toko=$result_kd_toko['kd_toko'];
				echo "<option value=".$kd_toko.">".$kd_toko."</option>";}
				?>
			</select></td>
		</tr>
		<tr>
			<td>Password</td>
			<td>:</td>
			<td><input type="password" name="password" id="password" /></td>
		</tr>
		<tr>
			<td>Hak Akses</td>
			<td>:</td>
			<td><select name="akses" size="1" id="akses">
				<option value="manager">Manager</option>
				<option value="admin">Admin</option>
				<option value="kasir">Kasir</option>
				<option value="gudang">Gudang</option>
			</select>
			</td>
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
	
	<form action="master_data/update_user.php" method="post" id="form_update">
		<table width="300" border="0" align="center">
			<tr>
				<td colspan="3" align="center">UPDATE USER</td>
			</tr>
			<tr>
				<td width="75">Id User</td>
				<td width="4">:</td>
				<td width="207"><input name="id_update" type="text" id="id_update" value="<?php echo $id_update;?>" readonly="readonly" /></td>
			</tr>
			<tr>
				<td>Nama User</td>
				<td>:</td>
				<td><input name="nm_update" type="text" id="nm_update" value="<?php echo $nm_update;?>" /></td>
			</tr>
            <tr>
    	        <td>Password</td>
        	    <td>:</td>
        	    <td><input type="text" name="pass_update" id="pass_update" /></td>
            </tr>
            <tr>
            	<td>Kode Toko</td>
            	<td>:</td>
            	<td><select name="kd_toko_update" size="1" id="kd_toko_update">
            		<?php 
            		$query_kd_toko=mysql_query("SELECT kd_toko FROM tabel_toko");
            		while($result_kd_toko=mysql_fetch_array($query_kd_toko)){
            		$kd_toko=$result_kd_toko['kd_toko'];
            		echo "<option value=".$kd_toko.">".$kd_toko."</option>";}
            		?>
            	</select></td>
            </tr>
            <tr>
            	<td>Hak Akses</td>
            	<td>:</td>
            	<td><select name="akses_update" size="1" id="akses_update">
				<option value="manager">Manager</option>
				<option value="admin">Admin</option>
				<option value="kasir">Kasir</option>
				<option value="gudang">Gudang</option>
				</select></td>
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