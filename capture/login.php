<?php

session_start();
include "koneksi.php";


$login=mysql_query("select * from user where gambar='$_GET[id]'");
$dt=mysql_fetch_array($login);
$cek=mysql_num_rows($login);

if($cek > 0){
	
	session_register('id');
	session_register('gambar');
	session_register('nama');
	session_register('level');
	session_register('status');
	
	
	$_SESSION['id']=$dt['id'];
	$_SESSION['level']=$dt['level'];
	$_SESSION['nama']=$dt['nama'];
	
	
	
	header('location:http://localhost/WebInputNilai/home.php');
	
}else{
echo"Login Gagal";	
}

?>