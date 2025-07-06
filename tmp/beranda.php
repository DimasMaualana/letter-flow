<?php
//<span class='label label-danger' style='float:right'>5</span>
  /*$file = 'filesaya.pdf';
  $filename = 'tmp_filesaya.pdf';
  header('Content-type: application/pdf');
  header('Content-Disposition: inline; filename="' . $filename . '"');
  header('Content-Transfer-Encoding: binary');
  header('Accept-Ranges: bytes');
  @readfile($file);*/
$am=mysqli_fetch_array(mysqli_query($dt,"select * from user where username='{$_COOKIE['ur']}'"));
switch($am['jabatan']){
					case"pimpinan": 
					$cek=mysqli_query($dt,"select * from disposition");
					while($tes=mysqli_fetch_array($cek)){
						switch($tes['notifikasi_pim']){
						case"0":$cek=mysqli_fetch_array(mysqli_query($dt,"select count(*) from disposition where notifikasi_pim='0'"));
						$ket="<span class='badge' style='float:right;background-color:red;'>{$cek['count(*)']}</span>";break;}
									}
									$cek2=mysqli_query($dt,"select * from surat where type_surat='2'");
					while($r=mysqli_fetch_array($cek2)){
						switch($r['notic']){
							case"0":$cek2=mysqli_fetch_array(mysqli_query($dt,"select count(*) from surat where notic='0' and type_surat='2'"));
									$ket2="<span class='badge' style='float:right;background-color:red;'>{$cek2['count(*)']}</span>";break;}
							}

					$link="<li class='treeview'><a href=''><i class='fa fa-home'></i><span>Beranda</span></a></li>
						  <li class='treeview'><a href='?duser/user'><i class='fa fa-users'></i> Data User</a></li>
					      <li class='treeview'><a href='?laporan:1/laporan_suratmasuk'><i class='fa fa-envelope'></i> Laporan Surat Masuk $ket</a></li>
						  <li class='treeview'><a href='?laporan:1/laporan_suratkeluar'><i class='fa fa-envelope'></i><span>Laporan Surat Keluar $ket2</span></a></li>";
					$jabatan="<span class='logo-lg'><strong>PIMPINAN</strong></span>
						  <span class='logo-mini'><strong>PMN</strong></span>";
					break;


	case"pegawai":	$cek=mysqli_fetch_array(mysqli_query($dt,"select * from disposition where user_tujuan='{$nam['id_user']}' and notifikasi_pe='1'"));
					switch($cek['notifikasi_pe']){
									case"1":
									$cek=mysqli_fetch_array(mysqli_query($dt,"select count(*) from disposition where notifikasi_pe='1' and user_tujuan='{$nam['id_user']}'"));
									$ket="<span class='badge' style='float:right;background-color:red;'>{$cek['count(*)']}</span>";break;
					}		

					$link="<li class='treeview'><a href='?'><i class='fa fa-home'></i><span>Beranda</span></a></li>
							<li class='treeview'><a href='?surat_masuk_user:1:{$nam['id_user']}/surat_masuk'><i class='fa fa-envelope'></i><span>Surat Masuk $ket</span></a></li>";
					$jabatan="<span class='logo-lg'><strong>PEGAWAI</strong></span>
							<span class='logo-mini'><strong>PGI</strong></span>";
					break;
	case"sekertaris":
		$link="<li class='treeview'><a href='?'><i class='fa fa-home'></i><span>Beranda</span></a></li>
					      <li class='treeview'><a href='?datasurat/surat_masuk'><i class='fa fa-envelope'></i><span>Surat Masuk</span></a></li>
						  <li class='treeview'><a href='?datasurat/surat_keluar'><i class='fa fa-envelope-o'></i><span>Surat Keluar</span></a></li>";
					$jabatan="<span class='logo-lg'><strong>SEKERTARIS</strong></span>
							 <span class='logo-mini'><strong>SRS</strong></span>";
					break;
}
$isi="<html>
  <meta charset='utf-8'>
	<title>Aplikasi Berita</title>
	<link rel='stylesheet' href='css/bootstrap.css'>
	<link rel='stylesheet' href='css/font-awesome.css'>
	<link rel='stylesheet' href='css/AdminLTE.css'>
	<link rel='stylesheet' href='css/_all-skins.css'>
	<link rel='stylesheet' href='css/bootstrap-datepicker.css'>
	<link rel='stylesheet' href='css/jquery.dataTables.css'>

	<body class='hold-transition skin-green sidebar-mini'>
		<div class='wrapper'>
			<header class='main-header'>
				<a href='' class='logo'>
				 $jabatan
				</a>
			<nav class='navbar navbar-static-top'>
				<a href='' class='sidebar-toggle' data-toggle='offcanvas' role='button'>
					<span class='sr-only'>toggle navigation</span>
					<span class='icon-bar'></span>
					<span class='icon-bar'></span>
					<span class='icon-bar'></span>
				</a>
				 <div class='navbar-custom-menu'>
					<ul class='nav navbar-nav'>

						<li class='dropdown user user-menu'>
						  <a href='?logout' class='dropdown-toggle'>keluar <i class='fa fa-sign-out'></i></a>
							</li>
						  </ul>
				 </div>
			 </nav>
			</header>
		<aside class='main-sidebar'>
		<section class='sidebar'>
			<ul class='sidebar-menu'>
				 $link
		</section>
		</aside>
		<div id='profil' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal'>&times;</button>
        <h4 class='modal-title'>Upload Gambar</h4>
      </div>
      <div class='modal-body'>
        <p>Some text in the modal.</p>
      </div>
      <div class='modal-footer'>
		<form method='post' enctype='multipart/form-data'>
			<input type='file' name='gambar'>
			<input type='submit' name='save' value='simpan' class='btn btn-primary'>
		</form>
        <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
      </div>
    </div>

  </div>
</div>
		<div class='content-wrapper'>
			<section class='content-header'>
				<h5>$judul</h5>
			</section>
			<section class='content'>
				<div class='panel'>
					<div class='panel-body'>
					$bar
					</div>
				</div>
			</section>
		</div>

		<footer class='main-footer'>
			<strong>CopyRight@dasboard</strong>all right reserved
		</footer>
		</div>
	<script src='js/jquery-2.2.3.min.js'></script>
	<script src='js/bootstrap.js'></script>
	<script src='js/app.js'></script>
	<script src='js/jquery.dataTables.js'></script>
	<script src='js/dataTables.bootstrap.js'></script>
	<script src='js/bootstrap-datepicker.js'></script>
	<script>
  $(function(){
	 $('#tgl').datepicker({
      autoclose: true,
	  format : 'yyyy-mm-dd',
    });
  });
</script>
<script>
$(document).ready(function(){
	$('#tabelku').DataTable();
});
</script>
";
?>