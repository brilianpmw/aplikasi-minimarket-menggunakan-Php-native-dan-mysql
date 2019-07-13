<?php
include('c:\xampp\htdocs\minimarket\koneksi\koneksi.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript">
function popup(){
window.open ("gudang/faktur_pembelian.php?no_faktur=<?php echo $_GET['no_faktur'];?>","page","toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=600,height=600,left=50,top=50,titlebar=yes");}
	</script>
    </head>
    <body>
    <table width="300" border="0" align="center">
    <tr align="center">
    <td>
    Klik tombol dibawah ini untuk mencetak faktur<br />
    <input type="button" name="button" id="button" value="Cetak Faktur" onclick='popup()'/></td>
    </tr>
    </table>
    </body>
    </html>