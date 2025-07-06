<?php
error_reporting(0);
$dt=mysqli_connect("localhost","root","","pengarsipan_surat");
$url=$_SERVER["QUERY_STRING"];
$p1=explode(":",$url);
$var1=$p1[0];
$var2=$p1[1];
$var3=$p1[2];
$var4=$p1[3];

if($var3=="sudah"){
	mysqli_query($dt,"update disposition set read_pimpinan='sudah' where id_surat='$var1'");
	header("location:surat_file.php?$var1:$var2");
}

$d=mysqli_query($dt,"select * from file,surat where file.id_surat=surat.id_surat and file.id_surat='$var1'");
while($s=mysqli_fetch_array($d)){
	$img.="
	<center><img src='file/$var2/{$s['nama_file']}' width='1020px' height='1190px'></center><p>
	$var1
	";
}
echo"
<body style='background-color:black'>
$img
</body>
";
?>