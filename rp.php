<?php
error_reporting(0);
$dt=mysqli_connect("localhost","root","","pengarsipan_surat");
$tp=mysqli_query($dt,"select * from disposition,surat where disposition.id_surat=surat.id_surat and type_surat='1' order by tgl_surat desc");
while($ulang=mysqli_fetch_array($tp))
{
	$no++;
	$tr.="<tr>
		<td>$no</td>
		<td>{$ulang['kode_surat']}</td>
		<td>{$ulang['tgl_surat']}</td>
		<td>{$ulang['surat_dari']}</td>
		<td>{$ulang['subjek_surat']}</td>
		</tr>";
}
echo"
<style>
.table th,td{
	text-align:center;
}
</style>
<body onload='print()'>
<table border='2' style='width:100%;'>
	<thead>
	 <tr>
	  <th>No</th>
	  <th>Kode Surat</th>
	  <th>Tanggal Kirim</th>
	  <th>Pengirim</th>
	  <th>Subject</th>
	 </tr>
	</thead>
	<tbody>
	 $tr
	</tbody>
</table>
</body>
";
?>