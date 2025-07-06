<?php
$tp=mysqli_fetch_array(mysqli_query($dt,"select * from disposition,surat where disposition.id_surat=surat.id_surat and type_surat='1' and surat.id_surat='$var1' order by tgl_surat desc"));
$am1=$tp['kode_surat'];
$am2=$tp['surat_dari'];
$am3=$tp['subjek_surat'];
$am4=$tp['deskripsi'];
$bar="
<style>
.table th,td{
	text-align:center;
}
</style>
<table class='table table-bordered'>
	<thead>
	 <tr>
	  <th>Kode Surat</th>
	  <th>Surat Dari</th>
	  <th>Subject</th>
	  <th>Deskripsi</th>
	 </tr>
	</thead>
	<tbody>
	 <tr>
	  <td>$am1</td>
	  <td>$am2</td>
	  <td>$am3</td>
	  <td>$am4</td>
	 </tr>
	</tbody>
</table>
";
$tbl=tbl_panel_hijau("datasurat/surat_masuk","reply","Kembali");
$bar=wadah("Data Surat Masuk",$bar,$tbl);
?>