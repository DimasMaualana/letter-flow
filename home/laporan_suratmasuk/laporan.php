<?php
if($var1=="1"){
	mysqli_query($dt,"update disposition set notifikasi_pim='1'");
	header("location:index.php?$file/$folder");
}
$tp=mysqli_query($dt,"select * from disposition,surat where disposition.id_surat=surat.id_surat and type_surat='1'");
while($ulang=mysqli_fetch_array($tp))
{
	switch($ulang['status']){
		case"non-disposisi":$ket5="<a href='?disposisi:{$ulang['id_dis']}/laporan_suratmasuk' class='btn btn-primary btn-xs'>Disposisikan</a>";break;
		case"disposisi":$ket5="<h5>Sudah Di Disposisi";break;
	}
	switch($ulang['read_pimpinan']){
		case "sudah":$ket3="<i class='fa fa-eye'></i>";break;
		case "belum":$ket3="<i class='fa fa-eye-slash'></i>";break;

	}
	$no++;
	$tr.="<tr>
		<td>$no</td>
		<td>{$ulang['kode_surat']}</td>
		<td>{$ulang['tgl_surat']}</td>
		<td>{$ulang['surat_dari']}</td>
		<td>{$ulang['surat_kepada']}</td>
		<td>{$ulang['subjek_surat']}</td>
		<td>$ket5 <a href='repot.php?{$ulang['id_surat']}:MSK' target='_blank'> <a href='surat_file.php?{$ulang['id_surat']}:MSK:sudah' target='_blank'><i class='fa fa-file'></i></a> $ket3</i></td>
	 </tr>";
}
$bar="
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
	  <th>Tanggal Kirim</th>
	  <th>Pengirim</th>
	  <th>Untuk</th>
	  <th>Perihal</th>
	  <th>Status</th>
	 </tr>
	</thead>
	<tbody>
	 $tr
	</tbody>
</table>
";
$bar=wadah("Data Surat Masuk",$bar,"");
?>