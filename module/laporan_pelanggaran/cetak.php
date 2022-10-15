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

 $idKelas=$_GET['idKelas'];

$query = mysqli_query($connect,"SELECT a.*, SUM(c.poin) as jml FROM siswa a join detail_poin b on a.nis=b.nis join pelanggaran c on b.id_pelanggaran=c.id_pelanggaran WHERE a.id_kelas='$idKelas' group BY a.nis order by jml desc");
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
<center><h3><u>Laporan Pelanggaran</u></center> 
  
  ';

  
$html .= '<center>

<br>
      <table border="1" width="100%" cellpadding="4" cellspacing="0">
       <tr>
          <th>No</th>
          <th>NIS</th>
          <th>Nama Siswa</th>
          <th>Total Poin pelanggaran</th>
        </tr>';

        $nok=1;
         while($row = mysqli_fetch_array($query))
         {
           $html .='<tr>
            <td align="center">'.$nok.'</td>
            <td>'.$row['nis'].'</td>
            <td>'.$row['nama_siswa'].'</td>
            <td>'.$row['jml'].'</td>
           
        </tr>';
        $nok++;
      }

     $html .='</table> </body>
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