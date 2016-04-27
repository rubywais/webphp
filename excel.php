<?php

error_reporting(0);
ob_start();
session_start();
include"koneksi.php";
$tgl=date("d-m-Y");
$sql=mysql_query("select * from nilai left join matkul on nilai.id_matkul=matkul.matkul where id_siswa='$_SESSION[nama]'");

$content="
<table border=1 cellpadding=4 cellspacing=0 style=’border-collapse:collspase;’>
<tr>
<td>No.</td>
<td>Nilai</td>
<td>Keriteria</td>
<td>Mata Kuliah</td>
<td>Id Dosen</td>
<td>SKS</td>
</tr>";

while($data=mysql_fetch_array($sql)){

		$wais += $data['nilai'];
		$ines += $data['sks'];
		
		$ipk= substr(($wais / $ines)/24,0,4);
		
$content .="
<tr>
<td>".$data['id']."</td>
<td>".$data['nilai']."</td>
<td>".$data['huruf']."</td>
<td>".$data['id_matkul']."</td>
<td>".$data['id_dosen']."</td>
<td>".$data['sks']."</td>
</tr>
";
}
$content .="</table>";

$content .="Ipk $ipk";


header("Content-type: application/msdownload");

header("Content-disposition: inline; filename=$tgl.xls");

header("Content-length: " . strlen($content));

echo $content;

?>