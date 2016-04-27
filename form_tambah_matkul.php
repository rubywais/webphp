<?php
include"koneksi.php";
?>
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
	<div class="easyui-panel" title="Menambah Data Dosen" style="width:400px">
		<div style="padding:10px 30px 20px 60px">
	    <form id="ff" method="post" action="aksi.php?act=tambah_matkul">
	    	<table cellpadding="5">
	    		<tr>
	    			<td>Mata Kuliah</td>
	    			<td><input class="easyui-textbox" type="text" name="matkul" data-options="required:true" size="30" placeholder="nama"></input></td>
	    		</tr>
                <tr>
	    			<td>SKS</td>
	    			<td><input class="easyui-textbox" type="text" name="sks" data-options="required:true" size="30" placeholder="sks"></input></td>
	    		</tr>
                <?php
                echo"<tr><td>Id Dosen</td><td>
	<select name='id'>";
	$sql2=mysql_query("select * from user where level='dosen'");
	while($data2=mysql_fetch_array($sql2)){
	echo"<option value='$data2[nama]'>$data2[nama]</option>";
	}
	?>	    		
	    	</table>
	    </form>
	    <div style="text-align:center;padding:5px">
	    	<a href="javascript:void(0)" class="easyui-linkbutton" onclick="submitForm()">Submit</a>
	    	<a href="javascript:void(0)" class="easyui-linkbutton" onclick="clearForm()">Clear</a>
            <a href="home.php?menu=datamatkul" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-cancel'">Cancel</a>
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