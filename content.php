<?php
error_reporting(0);
session_start();
include"koneksi.php";
if($_GET['menu']==''){
echo"<h1>Welcome</h1> Selamat Datang <b>$_SESSION[nama]</b> <br> Silahkan OLah Modul Disamping";	
	
}
//<<<<<<<<<<<<<<<<<<<<<<<< admin dibagian data dosen >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
if($_GET['menu']=='datadosen'){
	$sql=mysql_query("select * from user where level='dosen'");	?>
	<div style="margin:20px 0 10px 0;">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('open')">Open</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('close')">Close</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('expand',true)">Expand</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('collapse',true)">Collapse</a>
        <a href="?menu=tambah_dosen" class="easyui-linkbutton" onclick="javascript:$('#p').panel('collapse',true)">Tambah</a>
	</div>
<div class="easyui-panel" style="height:auto;padding:5px;">
		<div id="p" class="easyui-panel" title="Panel Tools" style="width:100%;height:auto;padding:10px;"
				data-options="iconCls:'icon-save',collapsible:true,minimizable:true,maximizable:true,closable:true">
     <?php
	 echo"           
	<table width='100%' border='1' cellpadding='4' cellspacing='0'>
	<tr align='center' bgcolor='#B3DFDA'>
	<td width='20'>No.</td>
	<td width='100'>Nama</td>
	<td width='150'>Alamat</td>
	<td width='50'>Nip</td>
	<td width='100'>Jenis Kelamin</td>
	<td width='100'>Tanggal Lahir</td>
	<td width='100'>Password</td>
	<td width='50'>Status</td>
	<td colspan='2'>Aksi</td>
	</tr>
	";
	while($data=mysql_fetch_array($sql)){
		echo"
	<tr>
	<td>$data[id]</td>
	<td>$data[nama]</td>
	<td>$data[alamat]</td>
	<td>$data[nip]</td>
	<td>$data[Jenis_kelamin]</td>
	<td>$data[tanggal_lahir]</td>
	<td>$data[password]</td>
	<td>$data[status]</td>
	<td><a href=\"aksi.php?act=hapususer&id=$data[id]\" onclick=\"return confirm('Yakin Mau Hapus Data Ini $data[nama]?')\">Hapus</a>
	</td>
	<td><a href='?menu=edit_dosen&id=$data[id]'>Edit</a></td>
	</tr>";
	?>
	<?php
	}
	echo"</table>";
	?>
    </div>
    </div>
    <?php
} ?>

<?php
if($_GET['menu']=='tambah_dosen'){ ?>
	<div style="margin:5px 0 5px 0;">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('open')">Open</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('close')">Close</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('expand',true)">Expand</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('collapse',true)">Collapse</a>
	</div>
<div class="easyui-panel" style="height:auto;padding:5px;">
		<div id="p" class="easyui-panel" title="Panel Tools" style="width:100%;height:auto;padding:0px;"
				data-options="iconCls:'icon-save',collapsible:true,minimizable:true,maximizable:true,closable:true">
                <?php
	include"form_tambah_dosen.php";
	?>
	</div>
    </div>
	<?php
    }
?>
<?php
if($_GET['menu']=='edit_dosen'){
	$data=mysql_fetch_array(mysql_query("select * from user where id='$_GET[id]'"));
	echo"
	<form action='aksi.php?act=update_dosen' method='post'>
	<input type=hidden name='id' value='$data[id]'>";?>
    
	<div style="margin:20px 0 10px 0;">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('open')">Open</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('close')">Close</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('expand',true)">Expand</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('collapse',true)">Collapse</a>
	</div>
<div class="easyui-panel" style="height:auto;padding:5px;">
		<div id="p" class="easyui-panel" title="Proses Edit Data Dosen" style="width:100%;height:400px;padding:10px;"
				data-options="iconCls:'icon-save',collapsible:true,minimizable:true,maximizable:true,closable:true">
     <?php           
	echo"
	<table width='50%' border='0'>
	<tr><td>Id</td><td><input type=text name='id' value='$data[id]' size=1 disabled></td></tr>
	<tr><td>Nama</td><td><input type=text name='nama' value='$data[nama]'></td></tr>
	<tr><td>Nip</td><td><input type=text name='nip' value='$data[nip]'></td></tr>
	<tr><td>Jenis Kelamin</td><td><select class='easyui-combobox' name='Jenis_kelamin' value='$data[Jenis_kelamin]' style='width:200px;'>
		<option value='Laki-laki' selected>Laki-laki</option>
		<option value='Perempuan'>Perempuan</option></td></select></td></tr>
	<tr><td>Alamat</td><td><textarea name='alamat' cols=25>$data[alamat]</textarea></td></tr>	
	<tr><td>Tanggal Lahir</td><td><input type=text name='tanggal_lahir' value='$data[tanggal_lahir]'  class=easyui-datebox></td></tr>
	<tr><td>Password</td><td><input type=text name='password' value='$data[password]'></td></tr>
	<tr><td>Status</td><td><input type=text name='status' value='$data[status]'></td></tr>
	<tr><td></td><td> <input type=submit value='Simpan'> <input type=button value='Cancel' onclick=self.history.back();> </td></tr>
	</table>
	</form>
	";?>
    </div>
    </div>
	<?php
	}
?>
<?php 
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< admin dibagian data siswa >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
?>
<?php
if($_GET['menu']=='datasiswa'){
	$sql=mysql_query("select * from user where level='mahasiswa'");?>
	<div style="margin:20px 0 10px 0;">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('open')">Open</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('close')">Close</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('expand',true)">Expand</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('collapse',true)">Collapse</a>
        <a href="?menu=tambah_siswa" class="easyui-linkbutton" onclick="javascript:$('#p').panel('collapse',true)">Tambah</a>
	</div>
<div class="easyui-panel" style="height:auto;padding:5px;">
		<div id="p" class="easyui-panel" title="Panel Tools" style="width:100%;height:200px;padding:10px;"
				data-options="iconCls:'icon-save',collapsible:true,minimizable:true,maximizable:true,closable:true">
	<?php			
	echo"
	<table width='100%' border='1' cellpadding='4' cellspacing='0'>
	<tr align='center' bgcolor='#B3DFDA'>
	<td width='20'>No.</td>
	<td width='100'>Nama</td>
	<td width='150'>Alamat</td>
	<td width='50'>Nim</td>
	<td width='100'>Jenis Kelamin</td>
	<td width='100'>Tanggal Lahir</td>
	<td width='100'>Password</td>
	
	<td colspan='2'>Aksi</td>
	</tr>
	";
	while($data=mysql_fetch_array($sql)){
		echo"
	<tr>
	<td>$data[id]</td>
	<td>$data[nama]</td>
	<td>$data[alamat]</td>
	<td>$data[nim]</td>
	<td>$data[Jenis_kelamin]</td>
	<td>$data[tanggal_lahir]</td>
	<td>$data[password]</td>
	
	<td><a href=\"aksi.php?act=hapussiswa&id=$data[id]\" onclick=\"return confirm('Yakin Mau Hapus Data Ini $data[nama]?')\">Hapus</a>
	</td>
	<td><a href='?menu=edit_siswa&id=$data[id]'>Edit</a></td>
	</tr>";
	?>
	<?php
	}
	echo"</table>";
	?>
    </div>
    
    </div>
    <?php
}
	?>
    <?php
if($_GET['menu']=='tambah_siswa'){ ?>
<div style="margin:20px 0 10px 0;">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('open')">Open</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('close')">Close</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('expand',true)">Expand</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('collapse',true)">Collapse</a>
	</div>
<div class="easyui-panel" style="height:auto;padding:5px;">
		<div id="p" class="easyui-panel" title="Panel Tools" style="width:100%;height:400px;padding:10px;"
				data-options="iconCls:'icon-save',collapsible:true,minimizable:true,maximizable:true,closable:true">
<?php
	include"form_tambah_siswa.php";
	?>
    </div>
    </div>
	<?php
	}
?>
<?php
if($_GET['menu']=='edit_siswa'){
	$data=mysql_fetch_array(mysql_query("select * from user where id='$_GET[id]'"));
	echo"
	<form action='aksi.php?act=update_siswa' method='post'>
	<input type=hidden name='id' value='$data[id]'>";?>
	<div style="margin:20px 0 10px 0;">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('open')">Open</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('close')">Close</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('expand',true)">Expand</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('collapse',true)">Collapse</a>
	</div>
<div class="easyui-panel" style="height:auto;padding:5px;">
		<div id="p" class="easyui-panel" title="Proses Edit Data Mahasiswa" style="width:100%;height:400px;padding:10px;"
				data-options="iconCls:'icon-save',collapsible:true,minimizable:true,maximizable:true,closable:true">
	
	<?php
	echo"
	<table width='50%' border='0'>
	<tr><td>Id</td><td><input type=text name='id' value='$data[id]' size=1 disabled></td></tr>
	<tr><td>Nama</td><td><input type=text name='nama' value='$data[nama]'></td></tr>
	<tr><td>Nim</td><td><input type=text name='nim' value='$data[nim]'></td></tr>
	<tr><td>Jenis Kelamin</td><td><select class='easyui-combobox' name='Jenis_kelamin' value='$data[Jenis_kelamin]' style='width:200px;'>
		<option value='Laki-laki' selected>Laki-laki</option>
		<option value='Perempuan'>Perempuan</option></td></select></td></tr>
	<tr><td>Alamat</td><td><textarea name='alamat' cols=25>$data[alamat]</textarea></td></tr>	
	<tr><td>Tanggal Lahir</td><td><input type=text name='tanggal_lahir' value='$data[tanggal_lahir]'  class=easyui-datebox></td></tr>
	<tr><td></td><td> <input type=submit value='Simpan'> <input type=button value='Cancel' onclick=self.history.back();> </td></tr>
	</table>
	</form>
	";
	?>
	</div>
    </div>
	<?php
	}
?>
<?php
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<< admin dibagian data mata kuliah >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
?>
<?php
if($_GET['menu']=='datamatkul'){
	$sql=mysql_query("select * from matkul");?>
<div style="margin:20px 0 10px 0;">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('open')">Open</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('close')">Close</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('expand',true)">Expand</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('collapse',true)">Collapse</a>
        <a href="?menu=tambah_matkul" class="easyui-linkbutton" onclick="javascript:$('#p').panel('collapse',true)">Tambah</a>
	</div>
<div class="easyui-panel" style="height:auto;padding:5px;">
		<div id="p" class="easyui-panel" title="Panel Tools" style="width:100%;height:200px;padding:10px;"
				data-options="iconCls:'icon-save',collapsible:true,minimizable:true,maximizable:true,closable:true">
			<?php
			echo"<table width='100%' border='1'>
	<tr align='center' bgcolor='#B3DFDA'>
	<td width='20'>No.</td>
	<td width='150'>Mata Kuliah</td>
	<td width='100'>Id Dosen</td>
	<td width='100'>SKS</td>
	<td colspan='2'>Aksi</td>
	</tr>
	";
	while($data=mysql_fetch_array($sql)){
	echo"<tr>
	<td>$data[id]</td>
	<td>$data[matkul]</td>
	<td>$data[id_dosen]</td>
	<td>$data[sks]</td>
	<td><a href=\"aksi.php?act=hapusmatkul&id=$data[id]\" onclick=\"return confirm('Yakin Mau Hapus Data Ini $data[nama]?')\">Hapus</a>
	</td>
	<td><a href='?menu=edit_matkul&id=$data[id]'>Edit</a></td>
	</tr>
	";	
		
		
		}
		echo"</table>";
	
			?>
		</div>
	</div>
    <?php
}
?>
<?php
if($_GET['menu']=='tambah_matkul'){ ?>
	<div style="margin:20px 0 10px 0;">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('open')">Open</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('close')">Close</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('expand',true)">Expand</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('collapse',true)">Collapse</a>
	</div>
<div class="easyui-panel" style="height:auto;padding:5px;">
		<div id="p" class="easyui-panel" title="Panel Tools" style="width:100%;height:400px;padding:10px;"
				data-options="iconCls:'icon-save',collapsible:true,minimizable:true,maximizable:true,closable:true">

	<?php
	include"form_tambah_matkul.php";
	?>
    </div>
    </div>
    
    <?php
	}
?>
<?php
if($_GET['menu']=='edit_matkul'){
	$data=mysql_fetch_array(mysql_query("select * from matkul where id='$_GET[id]'"));
	echo"
	<form action='aksi.php?act=update_matkul' method='post'>
	<input type=hidden name='id' value='$data[id]'>";?>
    <div style="margin:20px 0 10px 0;">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('open')">Open</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('close')">Close</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('expand',true)">Expand</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('collapse',true)">Collapse</a>
	</div>
<div class="easyui-panel" style="height:auto;padding:5px;">
		<div id="p" class="easyui-panel" title="Proses Edit Data Mata Kuliah" style="width:100%;height:400px;padding:10px;"
				data-options="iconCls:'icon-save',collapsible:true,minimizable:true,maximizable:true,closable:true">
                
    
	<?php
	echo"
	<table width='50%' border='0'>
	<tr><td>Id</td><td><input type=text name='id' value='$data[id]' size=1 disabled></td></tr>
	<tr><td>Mata Kuliah</td><td><input type=text name='matkul' value='$data[matkul]'></td></tr>
	<tr><td>SKS</td><td><input type=text name='sks' value='$data[sks]'></td></tr>";
	echo"<tr><td>Id Dosen</td><td>
	<select name='id_dosen'>";
	$sql2=mysql_query("select * from user where level='dosen'");
	while($data2=mysql_fetch_array($sql2)){
	echo"<option value='$data2[nama]'>$data2[nama]</option>
	";}
	echo"<tr><td></td><td> <input type=submit value='Simpan'> <input type=button value='Cancel' onclick=self.history.back();> </td></tr></table>";
	
	?>	 
    </div>
    </div>   		
<?php
}
?>	

<?php
//<<<<<<<<<<<<<<<<<<<< admin dibagian data nilai >>>>>>>>>>>>>>>>>>>>>>>>>
?>
<?php
if($_GET['menu']=='datanilai'){
	$sql=mysql_query("select * from nilai");?>
	
	<div style="margin:20px 0 10px 0;">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('open')">Open</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('close')">Close</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('expand',true)">Expand</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('collapse',true)">Collapse</a>
        <a href="?menu=tambah_nilai" class="easyui-linkbutton" onclick="javascript:$('#p').panel('collapse',true)">Tambah</a>
	</div>
<div class="easyui-panel" style="height:auto;padding:5px; width:100%" data-options"fit:true">
		<div id="p" class="easyui-panel" title="Panel Tools" style="width:100%;height:200px;padding:10px;"
				data-options="iconCls:'icon-save',collapsible:true,minimizable:true,maximizable:true,closable:true,fit:true">
	
    <?php
	echo"
    <table width='100%' border='1'>
	<tr align='center' bgcolor='#B3DFDA'>
	<td width='20'>No.</td>
	<td width='150'>Nilai</td>
	<td width='150'>Huruf</td>	
	<td width='100'>Id Matkul</td>
	<td width='100'>Id Mahasiswa</td>
	<td width='100'>Id Dosen</td>
	<td colspan='2'>Aksi</td>
	</tr>
	";
	while($data=mysql_fetch_array($sql)){
	echo"<tr>
	<td>$data[id]</td>
	<td>$data[nilai]</td>
	<td>$data[huruf]</td>
	<td>$data[id_matkul]</td>
	<td>$data[id_siswa]</td>
	<td>$data[id_dosen]</td>
	<td><a href=\"aksi.php?act=hapusnilai&id=$data[id]\" onclick=\"return confirm('Yakin Mau Hapus Data Ini $data[nama]?')\">Hapus</a>
	</td>
	<td><a href='?menu=edit_nilai&id=$data[id]'>Edit</a></td>
	</tr>
	";	
		
		
		}
		echo"</table>";
		?>
        </div>
        </div>
		<?php
		}
?>
<?php
if($_GET['menu']=='tambah_nilai'){ ?>
<div style="margin:20px 0 10px 0;">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('open')">Open</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('close')">Close</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('expand',true)">Expand</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('collapse',true)">Collapse</a>
	</div>
<div class="easyui-panel" style="height:auto;padding:5px;">
		<div id="p" class="easyui-panel" title="Proses Penambahan Nilai" style="width:100%;height:400px;padding:10px;"
				data-options="iconCls:'icon-save',collapsible:true,minimizable:true,maximizable:true,closable:true">
       <?php         
	include"form_tambah_nilai.php";
	?>
    </div>
    </div>
    
<?php    
}
?>
<?php
if($_GET['menu']=='edit_nilai'){
	$data=mysql_fetch_array(mysql_query("select * from nilai where id='$_GET[id]'"));
	echo"
	<form method=POST action='aksi.php?act=edit_nilai'>
	<input type=hidden name='id' value='$data[id]'>";?>
	<div style="margin:20px 0 10px 0;">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('open')">Open</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('close')">Close</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('expand',true)">Expand</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('collapse',true)">Collapse</a>
	</div>
<div class="easyui-panel" style="height:auto;padding:5px;">
		<div id="p" class="easyui-panel" title="Proses Penambahan Nilai" style="width:100%;height:400px;padding:10px;"
				data-options="iconCls:'icon-save',collapsible:true,minimizable:true,maximizable:true,closable:true">
				
	<?php
	echo"
	<table width=50%>
	<tr><td>Id</td><td><input type=text name='id' value='$data[id]' size=1 disabled></td></tr>
	<tr><td>Nilai</td><td><input type=text name='nilai' value='$data[nilai]'></td></tr>
	<tr><td>Huruf</td><td><input type=text name='huruf' value='$data[huruf]'></td></tr>";?>
	<?php
                echo"<tr><td>Id Mahasiswa</td><td>
	<select name='id_siswa'>";
	$sql2=mysql_query("select * from user where level='mahasiswa'");
	while($data2=mysql_fetch_array($sql2)){
	echo"<option value='$data2[nama]'>$data2[nama]</option>";
	}
	?>	    		
    <?php
                echo"<tr><td>Id Dosen</td><td>
	<select name='id_dosen'>";
	$sql2=mysql_query("select * from user where level='dosen'");
	while($data2=mysql_fetch_array($sql2)){
	echo"<option value='$data2[nama]'>$data2[nama]</option>";
	}
	?>	    		
                <?php
                echo"<tr><td>Id Matkul</td><td>
	<select name='id_matkul'>";
	$sql3=mysql_query("select * from matkul");
	while($data3=mysql_fetch_array($sql3)){
	echo"<option value='$data3[matkul]'>$data3[matkul]</option>";
	}
	?>	    		
    <?php
	echo"<tr><td></td><td> <input type=submit value='Simpan'> <input type=button value='Cancel' onclick=self.history.back();> </td></tr></table>	
	";
	?>
    </div>
    </div>
    <?php
	echo"</form";
	}
?>
<?php
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< dosen dibagian data penilaian >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
?>
<?php
if($_GET['menu']=='nilai'){
	$sql=mysql_query("select * from nilai");?>
	<div style="margin:20px 0 10px 0;">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('open')">Open</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('close')">Close</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('expand',true)">Expand</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('collapse',true)">Collapse</a>
        <a href="?menu=tambahnilai2" class="easyui-linkbutton" onclick="javascript:$('#p').panel('collapse',true)">Tambah</a>
        <?php
		include"search.php";
		?>
	</div>
<div class="easyui-panel" style="height:auto;padding:5px; width:100%" data-options"fit:true">
		<div id="p" class="easyui-panel" title="Panel Tools" style="width:100%;height:200px;padding:10px;"
				data-options="iconCls:'icon-save',collapsible:true,minimizable:true,maximizable:true,closable:true,fit:true">
	<?php
	echo"<table width='100%' border='1'>
	<tr align='center' bgcolor='#B3DFDA'>
	<td width='70'>No.</td>
	<td width='70'>Nilai</td>
	<td width='70'>Keriteria</td>
	<td width='100'>Id Matkul</td>
	<td width='150'>Id Mahasiswa</td>
	<td colspan='2'>Aksi</td>
	</tr>";
	while($data=mysql_fetch_array($sql)){
	echo"<tr>
	<td>$data[id]</td>
	<td>$data[nilai]</td>
	<td>$data[huruf]</td>
	<td>$data[id_matkul]</td>
	<td>$data[id_siswa]</td>
	<td><a href=\"aksi.php?act=delete_nilai&id=$data[id]\" onclick=\"return confirm('Yakin Mau Hapus Data Ini $data[nama]?')\">Hapus</a>
	</td>
	<td><a href='?menu=editnilai2&id=$data[id]'>Edit</a></td>
	</tr>";
		
		}
	
	echo"</table>";?>
    </div>
    </div>
	<?php
	}
?>
<?php
if($_GET['menu']=='tambahnilai2'){ ?>
<div style="margin:20px 0 10px 0;">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('open')">Open</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('close')">Close</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('expand',true)">Expand</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('collapse',true)">Collapse</a>
	</div>
<div class="easyui-panel" style="height:auto;padding:5px;">
		<div id="p" class="easyui-panel" title="Proses Penambahan Nilai" style="width:100%;height:400px;padding:10px;"
				data-options="iconCls:'icon-save',collapsible:true,minimizable:true,maximizable:true,closable:true">
       <?php         
	include"form_tambahnilai.php";
	?>
    </div>
    </div>
    
<?php    
}
?>
<?php
if($_GET['menu']=='editnilai2'){
	$data=mysql_fetch_array(mysql_query("select * from nilai where id='$_GET[id]'"));
	echo"
	<form action='aksi.php?act=update_nilai2' method='post'>
	<input type=hidden name='id' value='$data[id]'>";?>
    <div style="margin:20px 0 10px 0;">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('open')">Open</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('close')">Close</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('expand',true)">Expand</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('collapse',true)">Collapse</a>
	</div>
<div class="easyui-panel" style="height:auto;padding:5px;">
		<div id="p" class="easyui-panel" title="Proses Edit Data Mata Kuliah" style="width:100%;height:400px;padding:10px;"
				data-options="iconCls:'icon-save',collapsible:true,minimizable:true,maximizable:true,closable:true">
                
    
	<?php
	echo"
	<table width='50%' border='0'>
	<tr><td>Id</td><td><input type=text name='id' value='$data[id]' size=1 disabled></td></tr>
	<tr><td>Nilai</td><td><input type=text name='nilai' value='$data[nilai]'></td></tr>
	<tr><td>Keriteria</td><td><input type=text name='huruf' value='$data[huruf]'></td></tr>";
	 echo"<tr><td>Id Mahasiswa</td><td>
	<select name='id_siswa'>";
	$sql2=mysql_query("select * from user where level='mahasiswa'");
	while($data2=mysql_fetch_array($sql2)){
	echo"<option value='$data2[nama]'>$data2[nama]</option>";
	}
	echo"<tr><td>Id Matkul</td><td>
	<select name='id_matkul'>";
	$sql3=mysql_query("select * from matkul");
	while($data3=mysql_fetch_array($sql3)){
	echo"<option value='$data3[matkul]'>$data3[matkul]</option>";
	}
	echo"<tr><td></td><td> <input type=submit value='Simpan'> <input type=button value='Cancel' onclick=self.history.back();> </td></tr></table>";
	
	?>	 
    </div>
    </div>
    <?php
	echo"</form>";
	?>   		
<?php
}
?>	
<?php
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<mahasiswa penilaian>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
?>
<?php
if($_GET['menu']=='nilai_mahasiswa'){
	$sql7=mysql_query("select * from nilai left join matkul on nilai.id_matkul=matkul.matkul where nilai.id_siswa='$_SESSION[nama]'");?>
	<div style="margin:20px 0 10px 0;">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('open')">Open</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('close')">Close</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('expand',true)">Expand</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('collapse',true)">Collapse</a>
		<?php
		echo"
		<a href='excel.php' target='_blank'><input type=button value='Export Excel'>";
		?>
    </div>
<div class="easyui-panel" style="height:auto;padding:5px;">
		<div id="p" class="easyui-panel" title="Proses Penambahan Nilai" style="width:100%;height:auto;padding:0px;"
				data-options="iconCls:'icon-save',collapsible:true,minimizable:true,maximizable:true,closable:true">
	<?php
    echo"
    <table width='100%' border='1' cellpadding='3' cellspacing='0'>
	<tr align='center' bgcolor='#B3DFDA'>
	<td width='20'>No.</td>
	<td width='70'>Nilai</td>
	<td width='70'>Keriteria</td>
	<td width='150'>Mata Kuliah</td>
	<td width='100'>Id Dosen</td>
	<td width='100'>SKS</td>
	</tr>";
		while($data5=mysql_fetch_array($sql7)){
			
		$hasil=($data5['nilai']*$data5['sks'])/24;
		
		$wais += $data5['nilai'];
		$ines += $data5['sks'];
		
		$ipk= substr(($wais / $ines)/24,0,4);
		
		
		
		echo"<tr>
	<td>$data5[id]</td>
	<td>$data5[nilai]</td>
	<td>$data5[huruf]</td>
	<td>$data5[id_matkul]</td>
	<td>$data5[id_dosen]</td>
	<td>$data5[sks]</td>
	</tr>";
	}
	?>
	
	<?php
	echo"</table> <br> IPK = $ipk";
	?>
	</div>
    </div>	
	<?php
	}
?>

<?php
if($_GET['menu']=='cari'){
	$sql7=mysql_query("select * from nilai where id_siswa LIKE '%$_POST[cari]%'");?>
	<div style="margin:20px 0 10px 0;">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('open')">Open</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('close')">Close</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('expand',true)">Expand</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#p').panel('collapse',true)">Collapse</a>
        <a href="home.php?menu=nilai" class="easyui-linkbutton" onclick="javascript:$('#p').panel('collapse',true)">Back</a>
		</div>
<div class="easyui-panel" style="height:auto;padding:5px;">
		<div id="p" class="easyui-panel" title="Proses Penambahan Nilai" style="width:100%;height:auto;padding:0px;"
				data-options="iconCls:'icon-save',collapsible:true,minimizable:true,maximizable:true,closable:true">
	<?php
    echo"
    <table width='100%' border='1' cellpadding='3' cellspacing='0'>
	<tr align='center' bgcolor='#B3DFDA'>
	<td width='20'>No.</td>
	<td width='70'>Nilai</td>
	<td width='70'>Keriteria</td>
	<td width='150'>Mata Kuliah</td>
	<td width='100'>Id Dosen</td>
	</tr>";
	
	while($data5=mysql_fetch_array($sql7)){
		echo"<tr>
	<td>$data5[id]</td>
	<td>$data5[nilai]</td>
	<td>$data5[huruf]</td>
	<td>$data5[id_matkul]</td>
	<td>$data5[id_dosen]</td>
	</tr>";
	}
	?>
	
	<?php
	echo"</table>";
	?>
	</div>
    </div>	
	<?php
	}
?>
<?php
echo" ";
?>