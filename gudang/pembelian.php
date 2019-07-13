<?php
include('c:\xampp\htdocs\minimarket\koneksi\koneksi.php');
	$kd_toko=$_SESSION['kd_toko'];
	$date=date('ymd');
	$query=mysql_query("SELECT MAX(no_faktur_pembelian) as maxid FROM tabel_pembelian WHERE no_faktur_pembelian LIKE '".$kd_toko."%'");
	$result=mysql_fetch_array($query);
	$maxid=$result['maxid'];
	$no_urut=substr($maxid,-5);
	$new_urut=$no_urut+1;
	$no_faktur=$kd_toko.$date.sprintf("%05s",$new_urut);
?>

	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">

#pembelian {
		height:100px; width: 100%; padding-top: 5px;
		background-color:#999;
		font-family: Arial, Helvetica, sans-serif;
		font-size: 10pt;}

#data_pembelian {
		height:335px; width: 100%; background-color: #999;
		overflow:scroll; padding-top: 10px;
		font-family: Arial, Helvetica, sans-serif;}
		
.header_pembelian {
		background-color: #39F; text-align:center;
		font-weight:bold; color: #FFF; font-size:10pt; }
		
.isi_pembelian {
		font-size: 10pt; color:#000;
		background-color: #FFF;}
		
.resume_pembelian {
		color: #FFF; font-size: 10pt; font-weight:bold; 
		background-color: #666;}
input {
		font-size: 9pt; color:#36F;}
select {
		font-size: 9pt; color:#36F; }
</style>

<script language="javascript">
function createRequestObject() {
	var ajax;
	if(navigator.appName=='Microsoft Internet Explorer') {
		ajax= new ActiveXObject('Msxml2.XMLHTTP'); }
	else {
		ajax = new XMLHttpRequest(); }
		return ajax;}
	var http = createRequestObject();
	function sendRequest(kd_barang) {
	if(kd_barang=="") {
		alert("Anda Belum Memilih Kode Barang!"); }
	else {
		http.open('GET','gudang/ajax.php?kd_barang='+encodeURIComponent(kd_barang), true);
		http.onreadystatechange = handleResponse;
		http.send(null); }}
		
	function handleResponse() {
		if(http.readyState==4) {
			var string = http.responseText.split('&&&');
			document.getElementById('nm_barang').value=string[0];
			document.getElementById('satuan').value=string[1];
			document.getElementById('harga').value=string[2];
			document.getElementById('jumlah').value="";
			document.getElementById('sub_total').value="";
			document.getElementById('jumlah').focus();}}
			
	function kalkulator() {
		var jml=document.getElementById('jumlah').value;
		var hrg=document.getElementById('harga').value;
		var hasil= hrg*jml;
		document.getElementById('sub_total').value=hasil; }
	</script>
   </head>
   
  <body>
  <div id="pembelian"><form action="gudang/simpan_pembelian.php" method="post" id="form_pembelian"><table width="95%" border="0" align="center">
  <tr>
  
  <td colspan="7"align="center"> No. Faktur:
    <input name="no_faktur" type="text" id="no_faktur" value="<?php echo $no_faktur; ?>" size="18" readonly="readonly" />
    Id User:
    <input name="id_user" type="text" id="id_user" value="<?php echo $_SESSION['id_user']; ?>" size="10" readonly="readonly" />
    Kode Supplier:
    <select name="kd_supplier" size="1" id="kd_supplier">
    
	<?php
	$query_supplier=mysql_query("SELECT kd_supplier FROM tabel_supplier");
	if(!$query_supplier){echo "kueri salah";}
	while($result_supplier=mysql_fetch_array($query_supplier)){
		$kd_supplier=$result_supplier['kd_supplier'];
		echo "<option value=".$kd_supplier.">".$kd_supplier."</option>"; }
	?> 
	</select>
	
	Tanggal:
	<input name="tanggal" type="text" id="tanggal" value="<?php echo date('d-m-Y'); ?>" size="10" readonly="readonly"/>
    <input type="submit" name="button_selesai" id="button_selesai" value="Selesai Beli"/><td>
    </tr>
    <tr class="header_pembelian">
  	<td>Kode Barang</td>
    <td>Nama Barang</td>
    <td>Satuan</td>
    <td>Harga</td>
    <td>Jumlah</td>
    <td>Sub Total</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
  <td><select name="kd_barang"size="1"id="kd_barang" onChange="new sendRequest(this.value)">
  <option value="">PILIH KODE BARANG</option>
  
<?php
	$query_barang=mysql_query("SELECT kd_barang FROM tabel_barang");
	while($result_barang=mysql_fetch_array($query_barang)){
	$kd_barang=$result_barang['kd_barang'];
	echo"<option value=".$kd_barang.">".$kd_barang."</option>"; }
?>
</select></td>
	<td><input name="nm_barang" type="text" id="nm_barang" size="25" readonly="readonly"/></td>
	<td><input name="satuan" type="text" id="satuan" size="15" readonly="readonly"/></td>
	<td><input name="harga" type="text" id="harga" size="15" readonly="readonly"/></td>
	<td><input name="jumlah" type="text" id="jumlah" size="4" onkeyup="kalkulator()"/></td>
	<td><input name="sub_total" type="text" id="sub_total" size="15" readonly="readonly"/></td>
	<td><input type="submit" name="button_add" id="button_add" value="Add" /></td>
</tr> 

</table> 
</form></div> 

<div id="data_pembelian"><table width="95%" border="0" align="center">
<tr class="header_pembelian">
	<td>Kode Barang</td>
	<td>Nama Barang</td>
	<td>Satuan</td>
	<td>Harga</td>
	<td>Jumlah</td>
	<td>Sub Total</td>
	<td>&nbsp;</td>
</tr>

<?php
$total_harga=0; $total_item=0;
$query_data_pembelian=mysql_query("SELECT * FROM tabel_rinci_pembelian WHERE no_faktur_pembelian='".$no_faktur."'");
while($hasil_data_pembelian=mysql_fetch_array($query_data_pembelian)){
$no_faktur=$hasil_data_pembelian['no_faktur_pembelian'];
$kd_barang=$hasil_data_pembelian['kd_barang'];
$nm_barang=$hasil_data_pembelian['nm_barang'];
$satuan=$hasil_data_pembelian['satuan'];
$jml=$hasil_data_pembelian['jumlah'];
$harga=$hasil_data_pembelian['harga'];
$sub_total=$hasil_data_pembelian['sub_total_beli'];
$total_harga=$sub_total+$total_harga;
$total_item=$jml+$total_item;
?>

<tr class="isi_pembelian">
	<td><?php echo $kd_barang; ?>&nbsp;</td>
	<td><?php echo $nm_barang; ?>&nbsp;</td>
	<td><?php echo $satuan; ?>&nbsp;</td>
	<td>RP.<?php echo $harga; ?></td>
	<td><?php echo $jml; ?>&nbsp;</td>
	<td>RP.<?php echo $sub_total; ?></td>    
	<td><a href="gudang/hapus_pembelian.php?kd_barang=<?php echo $kd_barang ?> &no_faktur=<?php echo $no_faktur; ?>"><input type="button" name="button" id="button" value="Delete" /> </a> </td>
</tr>
<?php } ?>
<tr class="resume_pembelian">
	<td>&nbsp;</td>
	<td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Total</td>
    <td><?php echo $total_item ?>Items</td>
    <td>RP.<?php echo $total_harga; ?></td>
    <td>&nbsp;</td>
</tr> </table>
</div> </body> </html>