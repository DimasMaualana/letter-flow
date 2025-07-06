<?php
$ip2=$_POST['kode'];
$ip3=$_POST['data'];
$ip4=$_POST['dari'];
$ip6=$_POST['s'];
$ip7=$_POST['deskripsi'];
$tbl=$_POST['save'];
$date=date("Y-m-d H:i:s");
$img=mysqli_query($dt,"select * from file where id_surat='$var2'");
while($ulang=mysqli_fetch_array($img)){
	$mage.="<span style='position:absolute'><a href='?$file:$var1:$var2:hapus:{$ulang['id_file']}:{$ulang['nama_file']}/$folder'><i class='fa fa-close'></a></i></span><img src='file/MSK/{$ulang['nama_file']}' width='150px' height='170px'> ";
}
if($var3=="batal"){
	mysqli_query($dt,"delete from surat where id_surat='$var2'");
	$cc=mysqli_query($dt,"select * from file where id_surat='$var2'");
	while($r=mysqli_fetch_array($cc)){
		unlink("file/MSK/{$r['nama_file']}");
	}
	header("location:?datasurat:$var1:$var2/$folder");	
}


if($var3=='hapus'){
	mysqli_query($dt,"delete from file where id_file='$var4'");
	unlink("file/MSK/",$var5);
	header("location:index.php?$file:$var1:$var2/$folder");
}
if($tbl){
	if($ip2!="" and $ip3!="" and $ip4!="" and $ip6!=""){
		$cek1=mysqli_num_rows(mysqli_query($dt,"select * from surat where id_surat!=''"));
		if($cek1){
			$nm=mysqli_fetch_array(mysqli_query($dt,"select * from surat order by id_surat desc limit 0,1"));
			$pecah=explode("-",$nm['id_surat']);
			$no=$pecah[1]+1;
			if($no<=9){$num="000000".$no;}
			elseif($no<=99){$num="00000".$no;}
			elseif($no<=999){$num="0000".$no;}
			elseif($no<=9999){$num="000".$no;}
			elseif($no<=99999){$num="00".$no;}
			elseif($no<=999999){$num="0".$no;}
			else{$num=$no;}
		}else{
			$num="0000001";
		}
		$num=$num."-".bulan();
		$cek=mysqli_query($dt,"insert into surat(id_surat,kode_surat,tgl_surat,tgl,surat_dari,subjek_surat,deskripsi,type_surat,id_user)values('MS-$num','$ip2','$ip3','$date','$ip4','$ip6','$ip7','1','{$nam['id_user']}')");
		mysqli_query($dt,"insert into disposition(id_dis,id_surat)values('SMK-$num','MS-$num')");
		if($cek){
			header("location:index.php?$file:upload:MS-$num/surat_masuk");
		}
	}
	else
	{
		$gagal="<div class='alert alert-danger'>Data Gagal Di Simpan</div>";
	}
}
$simpan="<input type='submit' name='save' value='Kirim' class='btn btn-primary btn-sm'>";
switch($var1){
	case"upload":
if($var2=='hapus'){
	mysqli_query($dt,"delete from file where id_file='$var3'");
	unlink("file/MSK/".$var4);
	header("location:index.php?$file:$var1/$folder");
}
if($_POST['simpan']){
	if($_FILES['ip1']['type']=="image/jpeg" or $_FILES['ip1']['type']=="image/png"){
		$ip=explode(".",$_FILES['ip1']['name']);
		$ra=rand(00000,99999);
		move_uploaded_file($_FILES['ip1']['tmp_name'],"file/MSK/".$ra.".".$ip[1]);
		mysqli_query($dt,"insert into file(nama_file,id_surat)values('$ra.$ip[1]','$var2')");
		header("location:index.php?$file:$var1:$var2/$folder");
	}
	else{
		$gagal="<div class='alert alert-danger'>File Upload Harus Berbentuk Jpg/png</div>";
	}
}
$ambil=mysqli_fetch_array(mysqli_query($dt,"select * from surat where id_surat='$var2'"));
$ip2=$ambil['kode_surat'];
$ip3=$ambil['tgl_surat'];
$ip4=$ambil['surat_dari'];
$ip6=$ambil['subjek_surat'];
$ip7=$ambil['deskripsi'];
$cek="readonly";
$bt="<a href='?$file:$var1:$var2:batal/$folder' class='btn btn-danger btn-sm'>Batalkan</a>";
$upload="
	<div class='form-group'>
		<label class='control-label col-xs-2 col-xs-offset-1'>File Upload :</label>
		<div class='col-xs-5'>
			<input type='file' name='ip1' class='form-control'>
		</div>";
$simpan="<input type='submit' name='simpan' value='Upload' class='btn btn-success btn-sm'> <a href='?datasurat/surat_masuk' class='btn btn-primary btn-sm'>Simpan</a>";break;
}
$isi="
<form method='post' enctype='multipart/form-data'>
 <div class='form-horizontal'>
	<div class='form-group'>
	 <label class='control-label col-xs-2 col-xs-offset-1'>Kode Surat :</label>
	 <div class='col-xs-2'>
	 <input type='text' name='kode' class='form-control' value='$ip2' $cek>
	 </div>
	</div>
	<div class='form-group'>
	 <label class='control-label col-xs-2 col-xs-offset-1'>Tanggal Surat :</label>
	 <div class='col-xs-2'>
	 <input type='text' data-provide='datepicker' id='tgl' name='data' class='form-control' value='$ip3' $cek>
	 </div>
	</div>
	<div class='form-group'>
	 <label class='control-label col-xs-2 col-xs-offset-1'>Surat Dari :</label>
	 <div class='col-xs-4'>
	 <input type='text' name='dari' class='form-control' value='$ip4' $cek>
	 </div>
	</div>
	<div class='form-group'>
	 <label class='control-label col-xs-2 col-xs-offset-1'>Subjek :</label>
	 <div class='col-xs-4'>
	 <input type='text' name='s' class='form-control' value='$ip6' $cek>
	 </div>
	</div>
	<div class='form-group'>
	 <label class='control-label col-xs-2 col-xs-offset-1'>Deskripsi :</label>
	 <div class='col-xs-4'>
	 <textarea class='form-control' name='deskripsi' $cek>$ip7</textarea>
	 </div>
	</div>
	$upload
	<div class='form-group'>
		<div class='col-xs-3 col-xs-offset-3'>
		 <br>$simpan $bt
		</div>
	</div>
	<div class='col-xs-12'>$gagal</div>
 </div>
</form>
<div class='col-xs-12'>
$mage
</div>
";
$tbl=tbl_panel_hijau("datasurat/surat_masuk","reply","Kembali");
$bar=wadah("Entri Surat",$isi,$tbl);
?>