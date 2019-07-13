<?php
session_start();
include('../koneksi.php');
$kd_toko = $_POST['kd_toko'];
$password = md5($_POST['password']);
$data = mysqli_query("select * from table_toko where kd_toko='$kd_toko' and password='$password'");
$cek = mysqli_num_rows($data);
if($cek > 0){
	$_SESSION['kd_toko'] = $kd_toko;
	$_SESSION['status'] = "login";
	header("location:akses/login_user.php");
}else{
	header("location:login_toko.php");
}
?>