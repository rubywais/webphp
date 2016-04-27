<?php
include"koneksi.php";
$tgl=date("d-m-Y");
$sql=mysql_query("select * from register");

$content="
<table border=1 cellpadding=4 cellspacing=0 style=’border-collapse:collspase;’>
<tr>
<td>Id</td>
<td>Username</td>
<td>Alamat</td>
<td>notel</td>
<td>TTL</td>
</tr>
";

while($data=mysql_fetch_array($sql)){

$content .="
<tr>
<td>".$data['id']."</td>
<td>".$data['username']."</td>
<td>".$data['alamat']."</td>
<td>".$data['notel']."</td>
<td>".$data['ttl']."</td>
</tr>
";
}
$content .="</table>";

header("Content-type: application/msdownload");

header("Content-disposition: inline; filename=$tgl.doc");

header("Content-length: " . strlen($content));

echo $content;


?>