
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
	height:90px; width:100%; border-bottom-width:2px;
	border-bottom-color:#933; border-bottom-style:solid;
	padding-left:10px; padding-top:10px;}
#scanner{
	height:50px; width:100%;
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
</head>
<body>
 <div id="kalkulator">
        <form id="form_kalkulator" name="form_kalkulator" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
 Cash :
<input name="cash" type="text" id="cash" size="15" />
<input type="submit" name="button" id="button" value="Hitung" />
</form>
</div>
</body>
</html>