<?php
$ip1=$_POST['nama'];
$ip2=$_POST['tlp'];
$ip3=$_POST['gender'];
$ip4=$_POST['alm'];
$ip5=$_POST['jb'];
$msk=$_POST['save'];
$user=explode(" ",$ip1);
$id=rand(0000,9999);
$pwd=rand(000,999);
if($msk){
	if($ip1!="" and $ip3!="" and $ip5!=""){
	$cek=mysqli_query($dt,"insert into user(id_user,username,password,nama_lengkap,gender,alamat,tlp,jabatan)values('$id','$user[0]','$pwd','$ip1','$ip3','$ip4','$ip2','$ip5')");
	if($cek){
		header("location:index.php?$file:$id:print/$folder");
	}
	else{
		$ket="<div class='alert alert-danger'>User Gagal Disimpan</div>";
	}
	}
	else{
		$ket="<div class='alert alert-danger'>Kolom Tidak Boleh Kosong</div>";
	}
}
switch($var2){
	case"print":
	$na=mysqli_fetch_array(mysqli_query($dt,"select * from user where id_user='$var1'"));	
	$isi="
	<body onload='print()'>
	Username : {$na['username']}<br>
	password : {$na['password']}
	</body>
	";break;
	default:$isi="
<form method='post' class='form-horizontal'>
	<div class='form-group'>
	 <label class='label-control col-xs-2 col-xs-offset-1'>Nama :</label>
	 <div class='col-xs-5'><input type='text' name='nama' class='form-control'></div>
	</div>
	<div class='form-group'>
	 <label class='label-control col-xs-2 col-xs-offset-1'>Telephone :</label>
	 <div class='col-xs-5'><input type='text' name='tlp' class='form-control'></div>
	</div>
	<div class='form-group'>
	 <label class='label-control col-xs-2 col-xs-offset-1'>Jenis Kelamin :</label>
	 <div class='col-xs-5'>
	 <label class='radio-inline'><input type='radio' name='gender'> Laki-Laki</label>
<label class='radio-inline'><input type='radio' name='gender'> Perempuan</label>
	 </div>
	</div>
	<div class='form-group'>
	 <label class='label-control col-xs-2 col-xs-offset-1'>Alamat :</label>
	 <div class='col-xs-5'><textarea class='form-control' name='alm'></textarea></div>
	</div>
	<div class='form-group'>
	 <label class='label-control col-xs-2 col-xs-offset-1'>Jabatan :</label>
	 <div class='col-xs-5'>
		<select class='form-control' name='jb'>
			<option>-jabatan-</option>
			<option> Sekertaris </option>
			<option> Pegawai </option>
		</select>
	 </div>
	</div>
	<div class='col-xs-3 col-xs-offset-3'>
	 <input type='submit' name='save' class='btn btn-primary' value='simpan'>
	</div>
	<div class='col-xs-12'>
	<br>$ket
	</div>
</form>
";break;
}
$user=rand(000,999);
$tbl=tbl_panel_info("duser/$folder","reply","Kembali");
$tbl2=tbl_panel_info("tuser:$user/$folder","plus","Tambah");
$bar=wadah("<i class='fa fa-user'></i> Tambah User",$isi,$tbl.$tbl2);
?>