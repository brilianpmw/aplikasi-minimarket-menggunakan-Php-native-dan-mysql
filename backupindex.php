<?php
session_start();
if(!isset($_SESSION['kd_toko'])&&!isset($_SESSION['status_toko'])){
header('location:akses/login_toko.php');}
else if(!isset($_SESSION['id_user'])&&!isset($_SESSION['status_user'])){
	header('location:akses/login_user.php');}
	else{
		$status_toko=$_SESSION['status_toko'];
		$status_user=$_SESSION['status_user'];}
		?>
<?php
include('koneksi/koneksi.php');
if(isset($_SESSION['kd_toko'])){
	$query_info_toko=mysql_query("select*from tabel_toko WHERE kd_toko='".$_SESSION['kd_toko']."'");
	$info_toko=mysql_fetch_array($query_info_toko);
	$nm_toko=$info_toko['nm_toko'];
	$almt_toko=$info_toko['almt_toko'];
	$tlp_toko=$info_toko['tlp_toko'];
	$fax_toko=$info_toko['fax_toko'];
	$logo_toko=$info_toko['logo'];
	$header=true;}
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Aplikasi Mini Market</title>
 <link href="css/index.css" rel="stylesheet" type="text/css"  />
 <link href="css/form.css" rel="stylesheet" type="text/css" />
 <script src="js/hide_show.js" type="text/javascript"></script>
 <script src="js/pop_up.js" type="text/javascript"></script>
 <script src"file:///C|/Users/Brilian/AppData/Roaming/Adobe/Dreamweaver CS5.5/en_US/Configuration/Temp/Assets/eam98CF.tmp/SpryMenuBar.js" type="text/javascript"></script>
 
 <?php
 
if(isset($_GET['do'])=="update") {
	$param=2;}
else {
	$param=1;}
?>
<script src="file:///C|/Users/Brilian/AppData/Roaming/Adobe/Dreamweaver CS5.5/en_US/Configuration/Temp/Assets/eam98CF.tmp/SpryMenuBar.js" type="text/javascript"></script>
<link href="file:///C|/Users/Brilian/AppData/Roaming/Adobe/Dreamweaver CS5.5/en_US/Configuration/Temp/Assets/eam98CF.tmp/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />

 </head>
 
 <body>
 
 <div id="container">
 <div id="header">
 <div id="logo"><img src="images/logo.png" width="245" height="89" /></div>
 <div id="info_toko"><?php if($header==true){echo "<span class='nama_toko'>". $nm_toko ."</span> <br/><br/><span class='alamat_toko'>".$almt_toko." Telepon:".$tlp_toko." fax: ".$fax_toko."</span>"; } ?>
 </div>
 
 <div id="menu">
 <ul id="MenuBar1" class="MenuBarHorizontal">
 <li><a href="index.php?menu=home">Index</a></li>
 <li><a herf="#" class="MenuBarItemSubmenu">Data Master</a>
 <ul>
 <li><a herf="index.php?menu=user">User</a></li>
 <li><a href="index.php?menu=kategori">Kategori Barang</a></li>
 <li><a href="index.php?menu=satuan">Satuan Barang</a></li>
 <li><a href="index.php?menu=barang">Barang</a></li>
 <li><a href="index.php?menu=supplier">supplier</a></li>
 <li><a href="index.php?menu=toko">Toko</a></li>
 </ul>
 </li>
 <li><a class="MenuBarItemSubmenu" href="#">Menu Gudang</a>
 <ul>
 <li><a href="index.php?menu=pembelian">Pembelian</a></li>
 <li><a herf="index.php?menu=stok">Stok Barang</a></li>
 </ul>
 </li>
 <li><a herf="#" class="MenuBarItemSubmenu">Menu Kasir</a>
 <ul>
 <li><a href="index.php?menu=penjualan">mesin kasir</a></li>
 <li><a href="index.php?menu=setoran_kasir">setoran kasir</a></li>
 </ul>
 </li>
 <li><a href="#" class="menubaritemsubmenu">manager toko</a>
 <ul>
 <li><a href="index.php?menu=stok">stok barang</a></li>
 <li><a href="#" class="menubaritemsubmenu">laporan</a>
 <ul>
 <li><a href="#"onclick="popup_print(1)">penjualan</a></li>
 <li><a href="#"onclick="popup_print(3)">pembelian</a></li>
 <li><a href="#"onclick="popup_print(5)">profit penjualan</a></li>
 </ul>
 </li>
 </ul>
 </li>
 <li><a href="#"class="menubaritemsubmenu">kontrol cabang</a>
 <ul>
 <li><a href="index.php?menu=stok&amp;view=cabang">stok cabang</a></li>
 <li><a href="#" class="menubaritemsubmenu">laporan</a>
 <ul>
 <li><a href="#"onclick="popup_print(2)">penjualan</a></li>
 <li><a href="#"onclick="popup_print(4)">pembelian</a></li>
 <li><a href="#"onclick="popup_print(6)">profit penjualan</a></li>
 </ul>
 </li>
 </ul>
 </li>
 <li><a href="akses/logout.php">keluar aplikasi</a></li>
 </ul>
 </div>
 <div id="content">
 <?php
 if(isset($_GET['menu'])){
	 $menu = $_GET['menu'];
	 switch($menu){
		 case('home');include('home.php');break;
		 case('user');include('master_data/data_user.php');break;
		 case('kategori');include('master_data/kategori_barang.php');break;
		 case('satuan');include('master_data/satuan_barang.php');break;
		 case('barang');include('master_data/data_barang.php');break;
		 case('supplier');include('master_data/data_supplier.php');break;
		 case('toko');include('master_data/data_toko.php');break;
		 case('pembelian');include('gudang/pembelian.php');break;
		 case('stok');include('gudang/stok_barang.php');break;
		 case('penjualan');include('kasir/penjualan.php');break;
		 case('setoran_kasir');include('kasir/setoran_kasir.php');break;
		 case('faktur_pembelian');include('gudang/cetak_faktur.php');break;}}
		 ?>
		 </div>
 <div id="footer">aplikasi minimarket&copy;2017</div>
 <script type="text/javascript">
 var menubar1=new spry.widget.menubar("menubar1",{imgdown:"spryassets/sprymenubardownhover.gif", imgright:"spryassets/sprymenubarrighthover.gif"});
 </script>
 </body>
 </html>
 