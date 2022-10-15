<?php
include "lib/koneksi.php";


$nis=$_GET['nis'];

$siswa=mysqli_query($connect, "SELECT surat_sp_2.no_surat, surat_sp_2.nis, surat_sp_2.tanggal, surat_sp_2.jam, siswa.nama_siswa, kelas.tingkat_kelas, jurusan.nama_jurusan, kelas.sub_kelas, orang_tua.nama_ortu FROM surat_sp_2 join siswa ON surat_sp_2.nis=siswa.nis JOIN kelas ON siswa.id_kelas=kelas.id_kelas JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan JOIN orang_tua ON siswa.id_ortu=orang_tua.id_ortu WHERE surat_sp_2.nis='$nis'");
$sw=mysqli_fetch_array($siswa);

?>
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <!-- this row will not appear when printing -->
                      <div class="row no-print pull-right">
                        <div class="col-xs-12">
                         
                          <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                          
                        </div>
                      </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <section class="content invoice">
                      
                      <img src="images/smk1.PNG">
                      <br>
                      <span style='font-size:12.0pt;font-family:"Times New Roman","serif"'>
                        <form method="post" action="">
                        <p>
                          
                            Nomor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $sw['no_surat']; ?><br>
                            Lamp. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<br>
                            Hal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Surat Peringatan dan Pemanggilan<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Orang Tua Murid
                        </p>
                        <br>
                        <p>
                        Yth. Bapak/Ibu Wali Murid<br>
                        <?php echo $sw['nama_ortu']; ?>
                        </p>
                        <br>
                        <p>
                          Dengan hormat,
                        </p>
                        <p>
                          Bersama surat ini, kami pihak sekolah mengharap kehadiran Bapak/Ibu Wali Murid dari:
                        </p>
                        <p>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $sw['nama_siswa']; ?>
                          <br>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kelas&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $sw['tingkat_kelas']." ".$sw['nama_jurusan']." ".$sw['sub_kelas']; ?>
                        </p>
                        <p>
                          Untuk menemui wali kelas dan guru BK, pada waktu sebagai berikut:
                        </p>
                        <p>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hari/Tanggal&nbsp;&nbsp;: <?php echo $sw['tanggal'];; ?>
                          <br>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Waktu&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $sw['jam']; ?> WIB
                          <br>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tempat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Ruang Bimbingan Konseling (BK)
                        </p>
                        <p>
                          Demikian surat ini kami sampaikan. Atas perhatiannya kami sampaikan terima kasih.
                        </p>
                        <br><br><br>
                        <p>
                          Hormat kami,
                        </p>
                        <p>
                          Kepala Sekolah
                        </p>
                        <br><br><br>
                        <p>
                          Gusti Kamal, S.Pd, M.Pd.<br>
                          NIP. 196908251995031003
                        </p>
                      </span>
                    </section>
                  </div>
                </div>

                 <div class="col-md-3 col-sm-1 col-xs-1 col-md-offset-1">
                        
                        </div>
              </form>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->