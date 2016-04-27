<?php
include"koneksi.php";
if($_GET['act']=='hapususer'){
	mysql_query("delete from user where id='$_GET[id]'");
	
	echo"<script>alert('data berhasil dihapus');window.location.href='home.php?menu=datadosen'</script>";
	
	
	}

?>
<?php
if($_GET['act']=='tambah_dosen'){
	$lokasi_file=$_FILES['gambar']['tmp_name'];
$nama_file=$_FILES['gambar']['name'];	
if(empty($lokasi_file)){
echo"Data Masih Kosong !";	
}else{
move_uploaded_file($lokasi_file,"image/$nama_file");	

mysql_query("insert into user (nama,alamat,nip,Jenis_kelamin,tanggal_lahir,gambar,password,level)values('$_POST[nama]','$_POST[alamat]','$_POST[nip]','$_POST[Jenis_kelamin]','$_POST[tanggal_lahir]','$nama_file','$_POST[password]','$_POST[level]')");
	echo"<script>alert('Data berhasil berhasil di input');window.location.href='home.php?menu=datadosen'</script>";	
	}
}
?>
<?php
if($_GET['act']=='update_dosen'){
	mysql_query("update user set nama='$_POST[nama]',nip='$_POST[nip]',Jenis_kelamin='$_POST[Jenis_kelamin]',alamat='$_POST[alamat]',tanggal_lahir='$_POST[tanggal_lahir]',password='$_POST[password]',status='$_POST[status]' where id='$_POST[id]'");
	echo"<script>alert('Data berhasil berhasil di Edit');window.location.href='home.php?menu=datadosen'</script>";
	}
?>

<?php
//<<<<<<<<<<<<<<<<<<<<< admin dibagian dosen >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
?>
<?php
if($_GET['act']=='hapussiswa'){
	mysql_query("delete from user where id='$_GET[id]'");
	
	echo"<script>alert('data berhasil dihapus');window.location.href='home.php?menu=datasiswa'</script>";
	
	
	}
?>
<?php
if($_GET['act']=='tambah_siswa'){
	mysql_query("insert into user (nama,alamat,nim,jenis_kelamin,tanggal_lahir,password,level)values('$_POST[nama]','$_POST[alamat]','$_POST[nim]','$_POST[jenis_kelamin]','$_POST[tanggal_lahir]','$_POST[password]','$_POST[level]')");
	echo"<script>alert('Data berhasil berhasil di input');window.location.href='home.php?menu=datasiswa'</script>";	
	}
?>
<?php
if($_GET['act']=='update_siswa'){
	mysql_query("update user set nama='$_POST[nama]',nim='$_POST[nim]',Jenis_kelamin='$_POST[Jenis_kelamin]',alamat='$_POST[alamat]',tanggal_lahir='$_POST[tanggal_lahir]' where id='$_POST[id]'");
	echo"<script>alert('Data berhasil berhasil di Edit');window.location.href='home.php?menu=datasiswa'</script>";
	}
?>

<?php
//<<<<<<<<<<<<< admin dibagian matkul>>>>>>>>>>>>>>>>>>>>>>>>>>>>
?>
<?php
if($_GET['act']=='hapusmatkul'){
	mysql_query("delete from matkul where id='$_GET[id]'");
	
	echo"<script>alert('data berhasil dihapus');window.location.href='home.php?menu=datamatkul'</script>";
	
	
	}
?>
<?php
if($_GET['act']=='update_matkul'){
	mysql_query("update matkul set matkul='$_POST[matkul]',id_dosen='$_POST[id_dosen]',sks='$_POST[sks]' where id='$_POST[id]'");
	echo"<script>alert('Data berhasil berhasil di Edit');window.location.href='home.php?menu=datamatkul'</script>";
	}
?>
<?php
if($_GET['act']=='tambah_matkul'){
	mysql_query("insert into matkul (matkul,sks,id_dosen)values('$_POST[matkul]','$_POST[sks]','$_POST[id]')");
	echo"<script>alert('Data berhasil berhasil di input');window.location.href='home.php?menu=datamatkul'</script>";	
	}
?>
<?php
//<<<<<<<<<<<<<<<<<<<<<<<<<admin di bagian data nilai>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
?>
<?php
if($_GET['act']=='tambah_nilai'){
	mysql_query("insert into nilai (nilai,huruf,id_matkul,id_siswa,id_dosen)values('$_POST[nilai]','$_POST[huruf]','$_POST[id_matkul]','$_POST[id]','$_POST[id_dosen]')");
	echo"<script>alert('Data berhasil berhasil di input');window.location.href='home.php?menu=datanilai'</script>";	
	}
?>
<?php
if($_GET['act']=='hapusnilai'){
	mysql_query("delete from nilai where id='$_GET[id]'");
	
	echo"<script>alert('data berhasil dihapus');window.location.href='home.php?menu=datanilai'</script>";
	
	
	}
?>
<?php
if($_GET['act']=='edit_nilai'){
	mysql_query("update nilai set nilai='$_POST[nilai]',huruf='$_POST[huruf]',id_matkul='$_POST[id_matkul]',id_siswa='$_POST[id_siswa]',id_dosen='$_POST[id_dosen]' where id='$_POST[id]'");
	echo"<script>alert('Data berhasil berhasil di Edit');window.location.href='home.php?menu=datanilai'</script>";
	}
?>

<?php
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//dosen di bagian input nilai
?>
<?php
if($_GET['act']=='tambahnilai'){
	mysql_query("insert into nilai (nilai,huruf,id_matkul,id_siswa,id_dosen)values('$_POST[nilai]','$_POST[huruf]','$_POST[id_matkul]','$_POST[id_dosen]','$_POST[id]')");
	echo"<script>alert('Data berhasil berhasil di input');window.location.href='home.php?menu=data_nilai'</script>";	
	}
?>
<?php
if($_GET['act']=='delete_nilai'){
	mysql_query("delete from nilai where id='$_GET[id]'");
	
	echo"<script>alert('data berhasil dihapus');window.location.href='home.php?menu=nilai'</script>";
	
	
	}
?>
<?php
if($_GET['act']=='update_nilai2'){
	mysql_query("update nilai set nilai='$_POST[nilai]',id_siswa='$_POST[id_siswa]',huruf='$_POST[huruf]',id_matkul='$_POST[id_matkul]' where id='$_POST[id]'");
	echo"<script>alert('Data berhasil berhasil di Edit');window.location.href='home.php?menu=nilai'</script>";
	}
?>

