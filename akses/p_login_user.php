<?php
session_start();
include('../koneksi/koneksi.php');
$kd_toko=$_SESSION['kd_toko']; 
if(isset($_POST['button_login'])){
	$id_user=$_POST['id_user'];
	$password_digunakan=$_POST['password'];
	$cek_user=mysql_query("SELECT*FROM tabel_user WHERE id_user='".$id_user."' AND kd_toko='".$kd_toko."'");
	$count=mysql_num_rows($cek_user);
if($count>0){
	$user=mysql_fetch_array($cek_user);
	$id_user=$user['id_user'];
	$nm_user=$user['nm_user'];
	$status=$user['akses'];
	$password_database=$user['password'];
if($password_database=($password_digunakan)){
	echo "password sama";
	$_SESSION['id_user']=$id_user;
	$_SESSION['nm_user']=$nm_user;
	$_SESSION['status_user']=$status;
header('location:../index.php?menu=home');}
else{header ('location:login_user.php');
	echo "kesalahan 1";}}
else{echo"kesalahan 2";}}
else{header('location:login_user.php');}
?>
