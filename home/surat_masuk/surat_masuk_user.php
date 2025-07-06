<?php
if($var1=='1'){
	mysqli_query($dt,"update disposition set notifikasi_pe='2' where user_tujuan='$var2'");
	header("location:index.php?$file/$folder");
}
$tp=mysqli_query($dt,"select * from disposition,surat where disposition.id_surat=surat.id_surat and type_surat='1' and status='disposisi' and user_tujuan='{$nam['id_user']}'");
while($ulang=mysqli_fetch_array($tp))
{
	$no++;
	$tr.="<tr>
		<td>$no</td>
		<td>{$ulang['kode_surat']}</td>
		<td>{$ulang['tgl_surat']}</td>
		<td>{$ulang['surat_dari']}</td>
		<td>{$ulang['subjek_surat']}</td>
		<td><a href='repot.php?{$ulang['id_surat']}:MSK' target='_blank'><i class='fa fa-print'></i></a> <a href='surat_file.php?{$ulang['id_surat']}:MSK' target='_blank'><i class='fa fa-file'></i></a></td>
	 </tr>";
}
$bar="
<style>
.table th,td{
	text-align:center;
}
</style>
<table class='table table-bordered'>
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
$bar=wadah("Data Surat Masuk",$bar,"");
?>