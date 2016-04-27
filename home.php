<?php
session_start();
include"koneksi.php";
$cek=mysql_query("select * from user where nama='$_SESSION[nama]'");
$data=mysql_fetch_array($cek);
if($data['level']=='admin'){
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Web Input Nilai</title>
	<link rel="stylesheet" type="text/css" href="themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="themes/icon.css">
	<link rel="stylesheet" type="text/css" href="demo/demo.css">
	<script type="text/javascript" src="jquery.min.js"></script>
	<script type="text/javascript" src="jquery.easyui.min.js"></script>
</head>
<body class="easyui-layout">
	<div data-options="region:'north',border:false" style="height:30px;background:#B3DFDA;padding:10px">
    <center><font style="font-family:'Times New Roman', Times, serif; font-size:20px; font-style:italic;" color="#0099FF">Web Input Nilai</font></center></div>
	<div data-options="region:'west',split:true,title:'Login'" style="width:250px;padding:0px;">
    <div class="easyui-accordion" data-options="fit:true">
	<div title="Navigasi Menu" style="overflow:auto;padding:0px;">
	<ul class="easyui-tree">
		<li> 
        <span>Admin</span>
        <ul>           
					
					<li><a href="?menu=datadosen">Data Dosen</a></li>
                    <li><a href="?menu=datasiswa">Data Siswa</a></li>
                    <li><a href="?menu=datamatkul">Data Mata Kuliah</a></li>
                    <li><a href="?menu=datanilai">Data Nilai</a></li>
                    <li><a href="logout.php" onClick="return confirm('Yakin Mau Keluar Aplikasi ini?');">logout</a></li>
                    
                    
                    
		</ul>
        </li>
        </ul>	
	</div>     
    
    <div title="Profil" style="overflow:auto;padding:10px;">
	
  
	<?php
	echo"<b>$data[gambar]</b><hr>";
    echo"&bull; Nama : <b> $data[nama].</b><hr>";	
	echo"&bull; Nip : <b>$data[nip].</b> <hr>";	
	echo"&bull; Hak Akses : <b>$data[level].</b><hr>";
	
	?>	
  
    
	</div>      
     
    </div>    
    </div>

    
    </div>
	<div data-options="region:'east',split:true,collapsed:true,title:'East'" style="width:100px;padding:10px;">east region</div>
	<div data-options="region:'south',border:false" style="height:50px;background:#A9FACD;padding:10px;">south region</div>
	<div data-options="region:'center',title:'Content'">
    <?php
	include"content.php";
	?>
    </div>
</body>
</html>

<?php
}elseif($data['level']=='dosen'){
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Web Input Nilai</title>
	<link rel="stylesheet" type="text/css" href="themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="themes/icon.css">
	<link rel="stylesheet" type="text/css" href="demo/demo.css">
	<script type="text/javascript" src="jquery.min.js"></script>
	<script type="text/javascript" src="jquery.easyui.min.js"></script>
</head>
<body class="easyui-layout">
	<div data-options="region:'north',border:false" style="height:60px;background:#B3DFDA;padding:10px">
    <center><font style="font-family:'Times New Roman', Times, serif; font-size:40px; font-style:italic;" color="#0099FF">Web Input Nilai</font></center>
    </div>
	<div data-options="region:'west',split:true,title:'Login'" style="width:250px;padding:10px;">
    <div class="easyui-accordion" data-options="fit:true">
	<div title="Navigasi Menu" style="overflow:auto;padding:0px;">
	<?php  {  ?>
    <ul class="easyui-tree">
		<li> 
        <span>Dosen</span>
        <ul>           
					
					<li><a href="?menu=nilai">Data Penilaian</a></li>
                    <li><a href="logout.php" onClick="return confirm('Yakin Mau Keluar Aplikasi ini?');">logout</a></li>
                    
                    
		</ul>
		</li>
		</ul>	
        <?php  } ?>
	</div>     
    
    <div title="Profil" style="overflow:auto;padding:10px;">
	
  
	<?php
	echo"<b><img src='image/$data[gambar]' width='100px'></b><hr>";
    echo"&bull; Nama : <b> $data[nama].</b><hr>";	
	echo"&bull; Nip : <b>$data[nip].</b> <hr>";	
	echo"&bull; Level : <b>$data[level].</b><hr>";
	?>	
  
    
	</div>      
     
    </div>    
    </div>

    
    </div>
	<div data-options="region:'east',split:true,collapsed:true,title:'East'" style="width:100px;padding:10px;">east region</div>
	<div data-options="region:'south',border:false" style="height:50px;background:#A9FACD;padding:10px;">south region</div>
	<div data-options="region:'center',title:'Content'">
    <?php
	include"content.php";
	?>
    </div>
</body>
</html>
<?php
	}else{
		
	?>	
		
		<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Web Input Nilai</title>
	<link rel="stylesheet" type="text/css" href="themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="themes/icon.css">
	<link rel="stylesheet" type="text/css" href="demo/demo.css">
	<script type="text/javascript" src="jquery.min.js"></script>
	<script type="text/javascript" src="jquery.easyui.min.js"></script>
</head>
<body class="easyui-layout">
	<div data-options="region:'north',border:false" style="height:60px;background:#B3DFDA;padding:10px">
    <center><font style="font-family:'Times New Roman', Times, serif; font-size:40px; font-style:italic;" color="#0099FF">Web Input Nilai</font></center>
    </div>
	<div data-options="region:'west',split:true,title:'Login'" style="width:250px;padding:0px;">
    <div class="easyui-accordion" data-options="fit:true">
	
    <div title="Navigasi Menu" style="overflow:auto;padding:0px;">
	<?php { ?>
    <ul class="easyui-tree">
		<li> 
        <span>Mahasiswa</span>
        <ul>           
					
					<li><a href="?menu=nilai_mahasiswa">Penilaian</a></li>
                    <li><a href="logout.php" onClick="return confirm('Yakin Mau Keluar Aplikasi ini?');">logout</a></li>
                    
                    
		</ul>
		</li>
		</ul>
        <?php } ?>	
	</div>     
    
    <div title="Profil" style="overflow:auto;padding:10px;">
	
  
	<?php
    echo"&bull; Nama : <b> $data[nama].</b><hr>";	
	echo"&bull; Nim : <b>$data[nip].</b> <hr>";	
	echo"&bull; Level : <b>$data[level].</b><hr>";
	?>	
  
    
	</div>      
     
    </div>    
    </div>

    
    </div>
	<div data-options="region:'east',split:true,collapsed:true,title:'East'" style="width:100px;padding:10px;">east region</div>
	<div data-options="region:'south',border:false" style="height:50px;background:#A9FACD;padding:10px;">south region</div>
	<div data-options="region:'center',title:'Content'">
    <?php
	include"content.php";
	?>
    </div>
</body>
</html>
<?php	
		}
	?>