<?php
include ('c:\xampp\htdocs\minimarket\koneksi\koneksi.php');
$kd_toko=$_SESSION['kd_toko'];
$date=date('ymd');
$query=mysql_query("SELECT MAX(no_faktur_penjualan) as maxid FROM tabel_penjualan WHERE no_faktur_penjualan LIKE '".$kd_toko."%'");
$result=mysql_fetch_array($query);
$maxid=$result['maxid'];
$no_urut=substr($maxid,-5);
$new_urut=$no_urut+1;
$no_faktur=$kd_toko.$date.sprintf("%05s",$new_urut);
?>
<?php
$total=0; $jubar=0;
if(isset($_POST['button_bayar'])){	
$data=mysql_query("select * from tabel_rinci_penjualan where no_faktur_penjualan='".$no_faktur."'");
while($ambil=mysql_fetch_array($data)){
		$jumlahbar=$ambil['jumlah'];
		$subtotaljual=$ambil['sub_total_penjualan'];
		$total=$total+$subtotaljual;
		$jubar=$jubar+$jumlahbar;}}?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
#info_transaksi{
	height:455px; width:25%; float:left;
	background-color:#CCC;
	font-family:Arial, Helvetica, sans-serif;}
#info_user{
	background-color:#CCC;
	height:450px; width:20%; float:left;
	font-family:Arial, Helvetica, sans-serif;
	font-size:10pt; color:#000;
	font-weight: bold; padding-top:5px;}
#pembayaran{
	height:180px; width:100%;
	border-bottom-width:2px; border-bottom-color:#933;
	border-bottom-style:solid; border-top-width:2px;
	padding-left:10px; margin-top:10px;
	font-size:24pt; color:#00F;
	font-family:Arial, Helvetica, sans-serif;}
#kalkulator{
	height:50px; width:100%; border-bottom-width:2px;
	border-bottom-color:#933; border-bottom-style:solid;
	padding-left:10px; padding-top:10px;}
#scanner{
	height:80px; width:100%;
	border-bottom-width:2px; border-bottom-color:#933;
	border-bottom-style:solid;
	padding-top:10px; padding-left:10px;}
#button_transaksi{
	height:45px; width:100%;
	padding-top:5px; padding-left:10px;}
#data_barang{
	background-color:#999; height:450px; width:55%;
	float:left; overflow:scroll; padding-top:5px;}
.id_total{
	font-family:Arial, Helvetica, sans-serif;
	font-size:25px; font-weight:bold; color:#03F;
	text-decoration:none;}
.td_cash{
	font-family:Arial, Helvetica, sans-serif;
	font-size:25px; font-weight:bold; color:#FF0;
	text-decoration:none;}
.td_kembali{
	font-family:Arial, Helvetica, sans-serif;
	font-size:25px; font-weight:bold;
	color:#F00; text-decoration: none;}
.tr_header_footer{
	background-color:#09F;
	font-size:14px; color:#FFF; font-weight:bold;
	font-family:Arial, Helvetica, sans-serif;}
.tr_isi{
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px; color:#000;
	background-color:#FFF;}
</style>

<script language="javascript">
function onEnter(e){
	var key=e.keyCode||e.which;
	var kd_barang=document.getElementById['kd_barang'].value;
	var no_faktur=document.getElementById['no_faktur'].value;
	if(key==13){
		document.location.href="kasir/proses_kode_barang.php?kd_barang="+kd_barang+"&no_faktur="+no_faktur;}}
		</script>
        </head>
        
        <body onload="document.getElementById('kd_barang').focus()">
        <div id="info_transaksi">
        <div id="pembayaran">TOTAL<br />
        Rp.<?php echo $total;?><br />
        <br />
        KEMBALI<br />
        Rp. <?php
		if(isset($_POST['cash'])&&isset($_POST['button_hitung'])){
			$data=mysql_query("select * from tabel_rinci_penjualan where no_faktur_penjualan='".$no_faktur."'");
while($ambil=mysql_fetch_array($data)){
		$jumlahbar=$ambil['jumlah'];
		$subtotaljual=$ambil['sub_total_penjualan'];
		$total=$total+$subtotaljual;
		$jubar=$jubar+$jumlahbar;}
			$cash=$_POST['cash'];
			$kembali=$cash-$total;
			echo $kembali;
		}
		else{
			echo"0";
		}
		?>
		</div>       
        <div id="kalkulator">
        <form id="form_kalkulator" name="form_kalkulator" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
 Cash :
<input name="cash" type="text" id="cash" size="15" />
<input type="submit" name="button_hitung" id="button_hitung" value="Hitung" />
</form>
</div>
<div id="scanner">Kode Barang:
<form id="form_scanner" name="form_scanner" method="post" action="<?php $_SERVER['PHP_SELF']; ?>" >
<input type="text" name="kd_barang" id="kd_barang" onkeypress="onEnter(e)"/> jumlah :
<input type="text" name="jumlah_beli" id="jumlah_beli" size="5" />
<input type="submit" name="button_cart" id="button_cart" value="add cart" />
</form>
</div>

<div id="button_transaksi">
<form id="form_penjualan" name="form_penjualan" method="POST" action="kasir/update_stok.php">
Nomor Faktur:
<input name="no_faktur" type="text" id="no_faktur" value="<?php echo $no_faktur;?>" size="16" readonly="readonly"/>
<br/>
Total Belanja:
<input name="total_belanja" type="text" id="total_belanja" value="<?php echo $total;?>" size="15" readonly="readonly" />
<br />
<input type="submit" name="button2" id="button2" value="Cetak Faktur" onclick="popup()" />
<input type="submit" name="button_selesai" id="button_selesai" value="Selesai" />
</form>
</div>
</div>
<div id="data_barang"><table width="95%" border="0" align="center">
<tr class="tr_header_footer">
<td align="center">Kode Barang</td>
<td align="center">Nama Barang</td>
<td align="center">Harga</td>
<td align="center">Jumlah</td>
<td align="center">Sub Total</td>
</tr>

<?php
if (isset($_POST['button_cart'])&&isset($_POST['jumlah_beli'])&&isset($_POST['kd_barang'])){
	$jubel=$_POST['jumlah_beli'];
	$kodebarang = $_POST['kd_barang'];
	$kueriambildata=mysql_query("select * from tabel_barang where kd_barang='".$kodebarang."'");
	$ambildata = mysql_fetch_array($kueriambildata);
	$nabar=$ambildata['nm_barang'];
	$habar=$ambildata['hrg_jual'];
	$subtot=$jubel*$habar;
	$queri_insert = "INSERT INTO tabel_rinci_penjualan(no_faktur_penjualan,kd_barang,nm_barang,jumlah,harga,sub_total_penjualan) VALUES ('".$no_faktur."','".$kodebarang."','".$nabar."','".$jubel."','".$habar."','".$subtot."')";
	$insert=mysql_query($queri_insert);
	$data=mysql_query("select * from tabel_rinci_penjualan where no_faktur_penjualan='".$no_faktur."'");
	while($ambil=mysql_fetch_array($data)){
		$kodebar=$ambil['kd_barang'];
		$namabar=$ambil['nm_barang'];
		$hargabar=$ambil['harga'];
		$jumlahbar=$ambil['jumlah'];
		$subtotaljual=$ambil['sub_total_penjualan'];
		$total=$total+$subtotaljual;
		$jubar=$jubar+$jumlahbar;
	
?>
<tr class="tr_isi">
<td><?php echo $kodebar;?>&nbsp;</td>
<td><?php echo $namabar;?>&nbsp;</td>
<td><?php echo $hargabar;?>&nbsp;</td>
<td><?php echo $jumlahbar;?>&nbsp;</td>
<td><?php echo $subtotaljual;?>&nbsp;</td>	
</tr>
<tr class="tr_header_footer">
<form id="bayar" name="bayar" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>Total</td>
<td><?php echo $jubar;?>Items</td>
<td>Rp. <?php echo $total;?></td>
<?php }} ?>
<td><input type="submit" name="button_bayar" id="button_bayar" value="bayar"/></td>
</form>
</tr>
</table>
</div>
<div id="info_user"><table width="95%" border="0" align="center">
<tr>
<td width="50%">Id User</td>
<td width="5%">:</td>
<td width="40%"><?php echo $_SESSION['id_user'];?>&nbsp;</td>
</tr>
<tr>
<td>Nama User</td>
<td>:</td>
<td><?php echo $_SESSION['nm_user'];?>&nbsp;</td>
</tr>
<tr>
<td>Tanggal Akses</td>
<td>:</td>
<td><?php echo date('d-m-y');?>&nbsp;</td>
</tr>
<tr>
<td>Hak Akses</td>
<td>:</td>
<td><?php echo $_SESSION['status_user'];?>&nbsp;</td>
</tr>
</table>
</div>
</body>
</html>
<script type="text/javascript">
var mywin;
function popup(){
	mywin=window.open("kasir/faktur_penjualan.php?no_faktur=<?php echo $no_faktur;?>&cash=<?php echo $cash;?>","_blank", "toolbar=yes,location=yes,menubar=yes,copyhistory=yes,directories=no,status=no,resizable=no,width=500,height=400"); mywin.moveTo(100,100);}
	</script>