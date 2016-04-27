<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Basic Form - jQuery EasyUI Demo</title>
	<link rel="stylesheet" type="text/css" href="../../themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="../../themes/icon.css">
	<link rel="stylesheet" type="text/css" href="../demo.css">
	<script type="text/javascript" src="../../jquery.min.js"></script>
	<script type="text/javascript" src="../../jquery.easyui.min.js"></script>
</head>
<body>
	<div class="easyui-panel" title="Menambah Data Dosen" style="width:500px">
		<div style="padding:10px 30px 20px 60px">
	    <form id="ff" method="post" action="aksi.php?act=tambah_dosen" enctype="multipart/form-data">
	    	<table cellpadding="5">
	    		<tr>
	    			<td>Nama:</td>
	    			<td><input class="easyui-textbox" type="text" name="nama" data-options="required:true" size="30" placeholder="nama"></input></td>
	    		</tr>
	    		<tr>
	    			<td>Nip:</td>
	    			<td><input class="easyui-textbox" type="text" name="nip" data-options="required:true" placeholder="Nip"></input></td>
	    		</tr>
	    		<tr>
	    			<td>Jenis Kelamin:</td>
	    			<td><select class='easyui-combobox' name='Jenis_kelamin' style='width:150px;'>
		<option value='Laki-laki' selected>Laki-laki</option>
		<option value='Perempuan'>Perempuan</option></td></select></td>
	    		</tr>
	    		<tr>
	    			<td>Alamat:</td>
	    			<td><input class="easyui-textbox" name="alamat" data-options="multiline:true" style="height:60px" placeholder="Alamat"></input></td>
	    		</tr>
                <tr>
	    			<td>Tanggal Lahir:</td>
	    			<td><input class='easyui-datebox' name='tanggal_lahir' placeholder="Tanggal Lahir"></input></td>
	    		</tr>
                <tr>
	    			<td>Foto:</td>
	    			<td><input class="easyui-filebox" name="gambar" data-options="prompt:'Choose a file...'"><b>Foto 3 X 4</b></td>
	    		</tr>
                <tr>
	    			<td>Password:</td>
	    			<td><input class='easyui-textbox' name='password' placeholder="password"></input></td>
	    		</tr>
                <tr>
	    			<td>Status:</td>
	    			<td><input class='easyui-textbox' name='status' placeholder="status"></input></td>
	    		</tr>
                <tr>
	    			<td>Level:</td>
	    			<td><select class='easyui-combobox' name='level' style='width:100px;'>
					<option value='Admin' selected>Admin</option>
                    <option value='Dosen'>Dosen</option>
					<option value='Mahasiswa'>Mahasiswa</option></td></select></td>
	    		</tr>
                
	    		
	    	</table>
	    </form>
	    <div style="text-align:center;padding:5px">
	    	<a href="javascript:void(0)" class="easyui-linkbutton" onclick="submitForm()">Submit</a>
	    	<a href="javascript:void(0)" class="easyui-linkbutton" onclick="clearForm()">Clear</a>
            <a href="home.php?menu=datadosen" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-cancel'">Cancel</a>
            
	    </div>
	    </div>
	</div>
	<script>
		function submitForm(){
			$('#ff').form('submit');
		}
		function clearForm(){
			$('#ff').form('clear');
		}
	</script>
</body>
</html>