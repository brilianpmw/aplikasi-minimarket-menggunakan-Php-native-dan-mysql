<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Untitled Document</title>
	<style type="text/css">
		#tabel{
		font-family: Arial, Helvetica, sans-serif;
		font-size: 10pt; font-weight: bold;
		text-transform: uppercase; color: #36F;
		padding-top: 100px}
	</style>
	</head>
	<body>
		<div id="tabel">
		<table width="355" border="0" align="center">
			<tr>
				<td height="45" colspan="3" align="center">Selamat Datang di Aplikasi Mini Market</td>
			</tr>
			<tr>
				<td width="88">Id User</td>
				<td width="1">:</td>
				<td width="252"><?php echo $_SESSION['id_user']; ?></td>
			</tr>
			<tr>
				<td>Nama User</td>
				<td>:</td>
				<td><?php echo $_SESSION['nm_user'];?></td>
			</tr>
			<tr>
				<td>Hak Akses</td>
				<td>:</td>
				<td><?php echo $_SESSION['status_user'];?></td>
			</tr>
		</table>
		</div>
	</body>
	</html>