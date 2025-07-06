<?php
error_reporting(E_ERROR);
date_default_timezone_set("Asia/Jakarta");
include("fc/function.php");
$dt=mysqli_connect("localhost","root","","pengarsipan_surat")or die ("<h1>ERROR 404</h1>");
$url=$_SERVER["QUERY_STRING"];
$belah=explode('/',$url);
$belah0=explode(':',$belah[0]);
$folder=$belah[1];
$folder0=$belah[2];
$file=$belah0[0];
$var1=$belah0[1];
$var2=$belah0[2];
$var3=$belah0[3];
$var4=$belah0[4];
$nam=mysqli_fetch_array(mysqli_query($dt,"select * from user where username='{$_COOKIE['ur']}'"));
if($file!=""){
	include("home/$folder/$folder0/$file.php");
}

$user=$_POST['user'];
$pwd=$_POST['pwd'];
$tbl=$_POST['tbl'];
if($tbl){
	$cek=mysqli_num_rows(mysqli_query($dt,"select * from user where username='$user' and password='$pwd'"));
		if($cek){
			setcookie('ur',$user);
			header("location:index.php");
		}else{
			$gagal="<div class='alert alert-danger'>Username Dan Password Anda Salah</div>";
		}
}
if($_COOKIE['ur']==""){
		include("home/login.php");
}else{
	include('tmp/beranda.php');
}
echo "
<title>Aplikasi Pengarsipan Surat</title>$isi";
?>