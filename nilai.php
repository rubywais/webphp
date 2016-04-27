<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "win";
 
$link = mysql_connect ($db_host, $db_user, $db_pass) or die ("Ga bisa connect");
mysql_select_db ($db_name) or die ("Ga bisa select database");
 
$isi = trim($_GET['isi']);
$sender=trim($_GET['sender']);
  
$sql = "INSERT INTO sementara SET id='',isi='$isi',sender='$sender'";
$query = mysql_query($sql) ;


$id=mysql_insert_id();

$data=mysql_fetch_array(mysql_query("select * from sementara where id='$id'"));

$pecah=explode(",",$data['isi']); 
$pecah1=$pecah[0];
$pecah2=$pecah[1]; 
$pecah3=$pecah[2]; 
$pecah4=$pecah[3];
$pecah5=$pecah[4];


mysql_query("insert into nilai(id,nilai,huruf,id_matkul,id_siswa,id_dosen)values('$_POST[id]','$pecah1','$pecah2','$pecah3','$pecah4','$pecah5')");

header('location:http://localhost:8800/?PhoneNumber=081316491181&Text=Dosen+'.$sender.'+Berhasil+Diinput'); 

?>