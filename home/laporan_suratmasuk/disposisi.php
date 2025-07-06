<?php
$ip1=$_POST['ip1'];
$wk=date("Y-m-d H:i:s");
$ip=$_POST['save'];
if($ip){
	if($ip1!=""){
	$cek=mysqli_query($dt,"update disposition set tgl_disposisi='$wk', user_tujuan='$ip1',status='disposisi' where id_dis='$var1'");
		if($cek){
				header("location:suratdisposisi.php?$var1");
			}
	}
	else
	{
		$info="<div class='aler alert-danger'>Data gagal Di Simpan</div>";
	}
}
$d=mysqli_query($dt,"select * from user where jabatan='pegawai'");
while($ulang=mysqli_fetch_array($d)){
	$op.="<option value='{$ulang['id_user']}'>{$ulang['nama_lengkap']}</option>";
}
$bar="
<form method='post'>
<div class='form-horizontal'>
	<div class='form-group'>
		<label class='control-label col-xs-2 col-xs-offset-1'>Di Teruskan Kepada :</label>
		<div class='col-xs-5'>
		<select class='form-control' name='ip1'>
			<option>-Nama Anggota-</option>
			$op
		</select>
		</div>
	</div>
	<div class='col-xs-2 col-xs-offset-3'>
		<input type='submit' name='save' class='btn btn-primary' value='Kirim'>
	</div>
	<div class='col-xs-12'>
	<br>$info
	</div>
</div>
</form>
";
$tbl=tbl_panel_hijau("laporan/laporan_suratmasuk","reply","Kembali");
$bar=wadah("Disposisi Surat Masuk",$bar,$tbl);
?>