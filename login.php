<?php
error_reporting(0);
ob_start();
session_start();
date_default_timezone_set("Asia/Jakarta");
include"koneksi.php";

$login=mysql_query("select * from user where nama='$_POST[nama]' and password='$_POST[password]'");
$rowcount=mysql_num_rows($login);
$r=mysql_fetch_array($login);
if($rowcount > 0) {
	
	$_SESSION['nama']=$_POST['nama'];
	$_SESSION['password']=$_POST['password'];
		
		
	echo"<script>setTimeout(function(){document.location='home.php'},5000);</script>";
	echo"<br><br><br><br><h3 align=center> LOADING SEBAGAI ".strtoupper($_POST[nama])." </h3>";
	echo"<center><img src='loading.gif'></center>";
	
	// sisipkan jika di perlukan
	
	
	}
	else {
				
		echo"<script>alert('Anda gagal masuk');window.location.href='index.php';</script>";
	}
ob_end_flush();	

?>