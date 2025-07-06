<?php
$q=mysqli_query($dt,"select * from surat where type_surat='2'");
while($ulang=mysqli_fetch_array($q)){
	$no++;
	$tr.="
	<tr>
		<td width='10px'>$no</td>
		<td>{$ulang['kode_surat']}</td>
		<td>{$ulang['tgl_surat']}</td>
		<td>{$ulang['subjek_surat']}</td>
		<td>{$ulang['deskripsi']}</td>
		<td><a href='?det:{$ulang['id_surat']}/$folder' class='btn btn-primary btn-xs'>Detail</a> <a href='surat_file.php?{$ulang['id_surat']}:KL' target='_blank'><i class='fa fa-file'></i></a> </td>
	</tr>
	";
}
$bar="
<style>
.table th,td{
	text-align:center;
}
</style>
<table id='tabelku' class='table table-bordered table-hover'>
	<thead>
	 <tr>
	  <th>No</th>
	  <th>Kode Surat</th>
	  <th>Tanggal Kirim</th>
	  <th>Subject</th>
	  <th>Deskirpsi</th>
	  <th>File</th>
	 </tr>
	</thead>
	<tbody>
	$tr
	</tbody>
</table>
";
$tbl2=" <a href='rpkl.php?' class='btn btn-info btn-xs' target='_blank'>Print</a>";;
$tbl=tbl_panel_hijau("entrisurat/surat_keluar","plus","Surat Keluar");
$bar=wadah("Data Surat Keluar",$bar,$tbl.$tbl2);
?>