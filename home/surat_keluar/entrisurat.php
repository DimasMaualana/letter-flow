<?php
$ip2=$_POST['kode'];
$ip6=$_POST['subjek'];
$ip7=$_POST['deskripsi'];
$tbl=$_POST['simpan'];
$date=date("Y-m-d H:s:i");
$simpan="<input type='submit' name='simpan' value='Kirim' class='btn btn-primary btn-sm'>";
$q=mysqli_query($dt,"select * from file where id_surat='$var2'");
while($s=mysqli_fetch_array($q)){
		$img.="<span style='position:absolute'><a href='?$file:$var1:$var2:hapus:{$ulang['id_file']}:{$ulang['nama_file']}/$folder'><i class='fa fa-close'></a></i></span><img src='file/KL/{$s['nama_file']}' width='150px' height='170px'> ";
}
if($var3=="delete"){
	mysqli_query($dt,"delete from surat where id_surat='$var2'");
	$cc=mysqli_query($dt,"select * from file where id_surat='$var2'");
	while($r=mysqli_fetch_array($cc)){
		unlink("file/Kl/{$r['nama_file']}");
	}
	header("location:?datasurat:$var1:$var2/$folder");	
}

if($tbl){
			if($ip2!="" and $ip6!="" and $ip7!=""){
				$cek1=mysqli_num_rows(mysqli_query($dt,"select * from surat where type_surat='2' and id_surat!=''"));
				if($cek1){
					$bno=mysqli_fetch_array(mysqli_query($dt,"select * from surat where type_surat='2' order by id_surat desc limit 0,1"));
					$no=explode("-",$bno['id_surat']);
					$no=$no[1]+1;
					if($no<=9){$no="000000".$no;}
					elseif($no<=99){$no="00000".$no;}
					elseif($no<=999){$no="0000".$no;}
					elseif($no<=9999){$no="000".$no;}
					elseif($no<=99999){$no="00".$no;}
					elseif($no<=999999){$no="0".$no;}
					else{$no=$no;}
				}
				else
				{
					$no="0000001";
				}
					$no=$no."-".bulan();
					$cek=mysqli_query($dt,"insert into surat(id_surat,kode_surat,tgl,subjek_surat,deskripsi,type_surat,id_user)values('Kl-$no','$ip2','$date','$ip6','$ip7','2','{$nam['id_user']}')");
					if($cek){
						header("location:index.php?$file:file:KL-$no/surat_keluar");
					}
					else{$gagal="sa";}
			}
			else
			{
				$gagal="<div class='alert alert-danger'>Data Gagal Di Simpan</div>";
			}
}
switch($var1){
case"file":
$save="<a href='?datasurat/$folder' class='btn btn-primary btn-sm'>Save</a> <a href='?$file:$var1:$var2:delete/$folder' class='btn btn-danger btn-sm'>Batalkan</a>";
$pang=mysqli_fetch_array(mysqli_query($dt,"select * from surat where id_surat='$var2'"));
$ip1=$pang['kode_surat'];
$ip2=$pang['subjek_surat'];
$ip3=$pang['deskripsi'];
$r="readonly";
if($var2=='hapus'){
mysqli_query($dt,"delete from file where id_file='$var3'");
	unlink("file/".$var4);
	header("location:index.php?$file:$var1/$folder");
}
if($_POST['save']){
	if($_FILES['ip1']['type']=="image/jpeg" or $_FILES['ip1']['type']=="image/png"){
		$ip=explode(".",$_FILES['ip1']['name']);
		$run=rand(00000,99999);
		$name=$ip[1];
		move_uploaded_file($_FILES['ip1']['tmp_name'],"file/KL/".$run.".".$ip[1]);
		$i=mysqli_query($dt,"insert into file(nama_file,id_surat)values('$run.$name','$var2')");
		header("location:?$file:$var1:$var2/$folder");
	}else{
		$gagal="<div class='alert alert-danger'>File Upload Harus Berbentuk Jpg/png</div>";
		}
	}
	$cek="<input type='file' name='ip1' class='form-control'>";
	$simpan="<input type='submit' name='save' class='btn btn-default btn-sm' value='Upload'>";
break;
}
		$bar="
<form method='post' enctype='multipart/form-data'>
 <div class='form-horizontal'>
	<div class='form-group'>
	 <label class='control-label col-xs-2 col-xs-offset-1'>Kode Surat :</label>
	 <div class='col-xs-2'>
	 <input type='text' name='kode' class='form-control' value='$ip1' $r>
	 </div>
	</div>
	<div class='form-group'>
	 <label class='control-label col-xs-2 col-xs-offset-1'>Subjek :</label>
	 <div class='col-xs-5'>
	 <input type='text' name='subjek' class='form-control' value='$ip2' $r>
	 </div>
	</div>
	<div class='form-group'>
	 <label class='control-label col-xs-2 col-xs-offset-1'>Deskripsi :</label>
	 <div class='col-xs-5'>
	 <textarea class='form-control' name='deskripsi' $r>$ip3</textarea>
	 </div>
	</div>
		<div class='form-group'>
	 <div class='col-xs-3 col-xs-offset-3'>
	$cek
	 </div>
	</div>
	<div class='form-group'>
		<div class='col-xs-8 col-xs-offset-3'>
		 $simpan $save
		</div>
	</div>
	<div class='col-xs-12'>$gagal</div>
 </div>
</form>
<div class='col-xs-12'>
$img
</div>
";
$tbl=tbl_panel_hijau("datasurat/surat_keluar","reply","Kembali");
$bar=wadah("Entri Surat Keluar",$bar,$tbl);
?>