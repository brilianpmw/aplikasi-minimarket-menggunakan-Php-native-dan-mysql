<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LOGIN TOKO</title>
<link href="../css/login.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div id="container">
<div id="image"><img src="../images/login.png" width="100" height="100"/></div>
<div id="title">LOGIN TOKO</div>
<div id="form_login"><form action="p_login_toko.php" method="post" id="login_toko">
<table width="70%" border="0" align="center">
<tr>
<td width="32%">Kode Toko</td>
<td width="5%">:</td>
<td width="63%"><input type="text" name="kd_toko" id="kd_toko" /></td>
</tr>
<tr>
<td>Password</td>
<td>:</td>
<td><input type="password" name="password" id="password" /></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="button_login" id="button_login" value="Login" />
<input type="reset" name="button_reset" id="button_reset" value="Reset" /></td>
</tr>
</table>
</form></div>
<div id="footer_login">APLIKASI MINIMARKET</div>
</div>
</body>
</html>