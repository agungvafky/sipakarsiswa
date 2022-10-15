<?php
error_reporting(0);
$nama_dokumen='Laporan'; //Beri nama file PDF hasil.
define('../mpdf60/');//lokasi folder mpdf60
require_once("../mpdf60/mpdf.php");
$mpdf=new MPDF('utf-8', 'A4-P'); // PDF mau L lanscape P potrait



ob_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {
  font-size: 18px;
  color: #0000FF;
}
.style2 {
  color: #990000;
  font-style: italic;
}
hr{
	border: 0;
	border-top: 3px double #eb121d;
}
.style3{
  font-size: 12px;
}
.style4{
  font-size: 25px;
  font-family:Arial;
}
.style5{
  font-size: 21px;
  font-family:Arial;
}
.style6{
  font-size: 14px;
  font-family:Arial;
}
.style7{
  font-size: 17px;
  font-family: "Times New Roman", Times, serif;
}
.sp{
	font-size:16px;
}

.c2{
	font-size:16px;
	line-height: 1.5em;
	}
-->
</style>
</head>

<body>
  <table width="794" border="0" align="center" cellspacing="0" cellpadding="0">
     <tr>
       <td width="95" rowspan="5" ><img src="../images/ian.png" width="90" height="130"></td>
       <td width="695" align="center">
       <div class="style4"><b>KEMENTRIAN AGAMA REPUBLIK INDONESIA</b></div></td>
     </tr>
     <tr>
       <td align="center"><div class="style5"><b>INSTITUT AGAMA ISLAM NEGERI(IAIN) BUKITTINGGI</b></div></td>
     </tr>
     <tr>
       <td align="center"><div class="style5"><b>FAKULTAS TARBIYAH DAN ILMU KEGURUAN</b></div></td>
     </tr>
     <tr>
       <td align="center"><div class="style6">Kampus II:Jalan Gurun Aur Kubang Putih Kab.Agam - Sumatra Barat - Telepon/Fax : (0752) 22875)</div></td>
     </tr>
     <tr>
       <td align="center"><div class="style6">Website : www.ftik.iainbukittinggi.ac.id | e-mail : ftik@iainbukittinggi.ac.id </div> </td>
     </tr>
</table>

<hr style="margin-bottom: red;">
<hr style="margin-top: 3px;">
<?php
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}?>  
<div class="style7">&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; <?php echo tgl_indo(date('Y-m-d')); ?></div><br>
   
   
  <?php
    include "koneksi.php";
    $no=$_GET['no'];
    $datad = mysqli_query($koneksi,"select * from sppem where no='$no'");
    while($data = mysqli_fetch_array($datad)){
    ?><div class="style7">
  &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Nomor &nbsp;&nbsp;: <?php echo $data['no'];?>
 <br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lamp.&nbsp;&nbsp;&nbsp;&nbsp;: 1 (Satu) rangkap <br>
 &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Mohon Kesediaan Jadi Pembimbing
 
    <br><br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Yth&nbsp;&nbsp;: Bapak/ Ibu  <?php echo $data['namad'];?>
    <br><br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Di tempat
   <br><br><br><p align="justify">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; <i>Assalamu'alaikum wr.wb.</i>
   <br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sesuai dengan usulan Pembimbing Skripsi yang diajukan oleh Mahasiswa 
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Prodi Pendidikan Teknik Informatika dan Komputer (PTIK) Fakultas Tarbiyah dan 
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ilmu Keguruan IAIN Bukittinggi, maka bersama ini mohon kesediaan Bapak/Ibu 
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;sebagai pembimbing skripsi mahasiswa dibawah ini:</p></div>
  
   
  
    <table width="678" border="0">
      <tr>
        <td width="63">&nbsp;</td>
        <td width="120"><div class="style7">Nama</div></td>
        <td width="8">:</td>
        <td width="459"> <div class="style7"><b><?php echo $data['namam'];?></b></div>
     </td>
        
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><div class="style7">NIM</div></td>
        <td>:</td>
        <td><div class="style7"><?php echo $data['nim'];?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td valign="top"><div class="style7">Judul<br> Skripsi</div></td>
        <td valign="top">:</td>
        <td align="justify"><div class="style7"><?php echo $data['judul'];?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><br><div class="style7">Pembimbing</div><br></td>
        <td><br>:</td>
        <td><br><div class="style7"><?php echo $data['namad'];?></td>
        
      </tr>
    </table>
    
    
     </div>
    <?php } ?>
    <br><div class="style7"><p align="justify">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Demikian permohonan ini kami sampaikan atas perhatian dan kerjasamanya 
    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;di ucapkan terimakasih.
    <br><div class="style7">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Wassalam,
    
     <br><div class="style7">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; An. Dekan
     
     <br><div class="style7">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ketua Prodi PTIK,
     
     <br><br><br><br><div class="style7">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b> Riri Okra, M. Kom </b>
     
   <br><div class="style7">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; NIP. 197910172011011010  
    
    </p></div>
</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>