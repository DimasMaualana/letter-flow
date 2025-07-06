<?php
error_reporting(0);
error_reporting(E_ERROR);
date_default_timezone_set("Asia/Jakarta");
include("fc/function.php");
$dt=mysqli_connect("localhost","root","","pengarsipan_surat")or die ("<h1>ERROR 404</h1>");
$url=$_SERVER["QUERY_STRING"];
$belah=explode('/',$url);
$var1=$belah[0];
$wk=date('Y-m-d H:i:s');
echo "
<body onload='print()'>
<center><strong>SURAT LAPORAN DISPOSISI</strong></center><br>
  <table border='1' style='width:100%'>
   <thead>
    <tr>
	 <th style='width:250px;height:80px'>NO SURAT DISPOSISI</th>
	 <th style='width:220px;height:80px'>TANGGAL DISPOSISI</th>
	 <th style='width:180px;height:80px'>MENGETAHUI PIMPINAN</th>
	 <th style='width:290px;height:80px'>TTD SURAT KEPADA</th>
	</tr>
   </thead>
      <tr>
	 <td style='width:290px;height:80px;text-align:center'>$var1</td>
	 <td style='width:290px;height:80px;text-align:center'>$wk</td>
	 <td style='width:290px;height:80px;text-align:center'></td>
	 <td style='width:290px;height:80px;text-align:center'></td>
	</tr>
  </table>
</body>
";
?>