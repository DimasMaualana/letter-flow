<?php
switch($var2){
 case"n":mysqli_query($dt,"update user set status='n' where id_user='$var1'");header("location:?$file/$folder");break;
 case"a":mysqli_query($dt,"update user set status='a' where id_user='$var1'");header("location:?$file/$folder");break;
}
$d=mysqli_query($dt,"select * from user");
while($ulang=mysqli_fetch_array($d)){
	$no++;
	switch($ulang['status']){
		case"a":$N="<a href='?$file:{$ulang['id_user']}:n/$folder'><i class='fa fa-toggle-on'></i></a>";break;
		case"n":$N="<a href='?$file:{$ulang['id_user']}:a/$folder'><i class='fa fa-toggle-off'></i></a>";break;
	}
	$tr.="
	<tr>
		<td>$no</td>
		<td>{$ulang['nama_lengkap']}</td>
		<td>{$ulang['jabatan']}</td>
		<td> <a href='?$file:{$ulang['nama_lengkap']}:ed/$folder'><i class='fa fa-edit'></i></a> $N</td>
	</tr>
	";
}

$isi="
<style>
.table th,td{
	text-align:center;
}
</style>
<table class='table table-bordered table-hover' id='tabelku'>
 <thead>
  <tr>
	<th>No</th>
	<th>Nama</th>
	<th>jabatan</th>
	<th>Option</th>
  </tr>
 </thead>
 <tbody>
  $tr
 </tbody>
</table>
";
$tbl=tbl_panel_hijau("tuse/user","plus","Tambah User");
$bar=wadah("Data Pegawai",$isi,$tbl)
?>