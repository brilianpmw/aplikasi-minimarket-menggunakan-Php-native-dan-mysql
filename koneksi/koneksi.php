<?php
$user_database="root";
$password_database="";
$server_database="localhost";
$nama_database="minimarket";
$koneksi=mysql_connect($server_database,$user_database,$password_database,$nama_database);
if(!$koneksi){
	die("tidak bisa terhubung ke server" . mysql_error());
	}
$pilih_database=mysql_select_db($nama_database,$koneksi);
if(!$pilih_database){
	die("database tidak bisa digunakan".mysql_error());}
?>
