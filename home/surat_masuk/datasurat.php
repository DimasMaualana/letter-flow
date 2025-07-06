<?php
$tp=mysqli_query($dt,"select * from disposition,surat where disposition.id_surat=surat.id_surat and type_surat='1' order by tgl_surat desc");
while($ulang=mysqli_fetch_array($tp))
{
	switch($ulang['status']){
		case"disposisi":$ket="<a class='btn btn-success btn-xs disabled'>Sudah Di Disposisi</a>";break;
		case"non-disposisi":$ket="<a class='btn btn-info btn-xs disabled'>Belum Di Disposisi</a>";break;
	}
	$no++;
	$tr.="<tr>
		<td>$no</td>
		<td>{$ulang['kode_surat']}</td>
		<td>{$ulang['tgl_surat']}</td>
		<td>{$ulang['surat_dari']}</td>
		<td>{$ulang['subjek_surat']}</td>
		<td><a href='?det:{$ulang['id_surat']}/surat_masuk' class='btn btn-primary btn-xs'>Detail</a> $ket <a href='surat_file.php?{$ulang['id_surat']}:MSK' target='_blank'><i class='fa fa-file'></i></a> <a href='?ed:{$ulang['id_surat']}/$folder' target='_blank'><i class='fa fa-edit'></i></a></td>
	 </tr>";
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
	  <th>Pengirim</th>
	  <th>Subject</th>
	  <th>Status</th>
	 </tr>
	</thead>
	<tbody>
	 $tr
	</tbody>
</table>
";
$tbl=tbl_panel_hijau("entrisurat/surat_masuk","plus","Surat Masuk");
$tbl2=" <a href='rp.php?1' class='btn btn-info btn-xs' target='_blank'>Print</a>";;
$bar=wadah("Data Surat Masuk",$bar,$tbl.$tbl2);
?>