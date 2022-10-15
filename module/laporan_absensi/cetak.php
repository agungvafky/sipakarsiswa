<?php

include('../../lib/koneksi.php');
require_once("../../dompdf/dompdf_config.inc.php");

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
}

 $id_admin=$_GET['id_admin'];

$query = mysqli_query($connect,"select * from absensi join siswa on absensi.nis=siswa.nis where id_admin='$id_admin'");
$html = ' <html>

<head>
<style>
@page { margin: 2cm 2cm 2cm 3cm; }
.style1{
  font-size: 21px;
  font-family:Arial;
}
</style>
</head>
<body>
<table border="0" style="width: 100%" cellspacing="0" cellpadding="0">
   
  
    <tr>

      <th align="center" width="60"><img src="../../images/smk.jpg" width="80" height="90"></th>
      <td colspan="7"><center><div class="style1"><b>PEMERINTAH PROVINSI SUMATERA BARAT</b></div></center></b>
        <center><font size="17px" face="Arial"><b>SMK NEGERI 1 AMPEK ANGKEK</b></font></center>
        
      <center><font size="8.5px">Alamat: Jl.Panca Batu Taba, Kec.Ampek Angkek, Kab.Agam Telp./Fax(0752) 7834358 kode Pos 26191 E-mail : smikagam@ymail.com</font></center></td>
     
      
    <tr>
  </table>
  <hr>
<center><u>Laporan Absensi</u></center> 
  
  ';
  $row = mysqli_fetch_array($query);
$html .= '<center>


<table border="0" width="100%" cellpadding="4" cellspacing="0">
        <tr height="20px">
            <td width="200px">Nama</td>
            <td width="5">:</td>
            <td>'.$row['nama_siswa'].'</td>
        </tr>
         <tr>
            <td>NIS</td>
            <td>:</td>
            <td>'.$row['nis'].'</td>
        </tr>
         <tr>
            <td>Absen</td>
            <td>:</td>
            <td>'.$row['absen'].'</td>
        </tr>
         <tr>
            <td>Sakit</td>
            <td>:</td>
            <td>'.$row['sakit'].'</td>
        </tr>
        <tr>
            <td>Izin</td>
            <td>:</td>
            <td>'.$row['izin'].'</td>
        </tr>
        <br>
          </p>

</body>
        ';

   
$dompdf = new Dompdf();
$html .= '</html>';

$dompdf->load_Html($html);
// Setting ukuran dan orientasi kertas
$dompdf->set_Paper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('Absensi.pdf', array("Attachment"=>0));

?>