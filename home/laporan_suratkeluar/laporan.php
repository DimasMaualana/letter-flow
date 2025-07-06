<?php
if($var1=="1"){
	mysqli_query($dt,"update surat set notic='1'");
	header("location:?$file/$folder");
}
$set=mysqli_query($dt,"select * from surat where type_surat='2'");
while($s=mysqli_fetch_array($set))
{
	$no++;
	$tr.="
	<tr>
	<td>$no</td>
	<td>{$s['kode_surat']}</td>
	<td>{$s['tgl']}</td>
	<td>{$s['subjek_surat']}</td>
	<td><a href='' class='btn btn-primary btn-xs'>Detail</a> <a href='surat_file.php?{$s['id_surat']}:KL' target='_blank'><i class='fa fa-file'></i></a></td>
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
	<th>Kode Surat</th>
	<th>Tanggal Entri Surat</th>
	<th>Perihal</th>
	<th>Status</th>
  </tr>
 </thead>
 <tbody>
	$tr
 </tbody>
</table>
";
$bar=wadah("Laporan Surat Keluar",$isi,"");
?>