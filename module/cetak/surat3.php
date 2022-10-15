<?php
include "lib/koneksi.php";

$nama_siswa=$_POST['nama'];
$tingkat_kelas=$_POST['tingkatKelas'];
$jurusan=$_POST['jurusan'];
$sub_kelas=$_POST['subKelas'];
$ortu=$_POST['ortu'];
$hari=$_POST['hariTanggal'];
$waktu=$_POST['waktu'];
$no_surat=$_POST['no_surat'];
$nis=$_POST['nis'];



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
                          <a href="module/cetak/simpan3.php?nis=<?php echo $nis;?> &&no_surat=<?php echo $no_surat;?>&&tanggal=<?php echo $hari;?>&&waktu=<?php echo $waktu;?>">
                            <button type="button" class="btn btn-success">Submit</button>
                          </a>
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
                          
                            Nomor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<?php echo $no_surat; ?><br>
                            Lamp. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<br>
                            Hal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Surat Peringatan dan Pemanggilan<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Orang Tua Murid
                        </p>
                        <br>
                        <p>
                        Yth. Bapak/Ibu Wali Murid<br>
                        <?php echo $ortu; ?>
                        </p>
                        <br>
                        <p>
                          Dengan hormat,
                        </p>
                        <p>
                          Bersama surat ini, kami pihak sekolah mengharap kehadiran Bapak/Ibu Wali Murid dari:
                        </p>
                        <p>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $nama_siswa; ?>
                          <br>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kelas&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $tingkat_kelas." ".$jurusan." ".$sub_kelas; ?>
                        </p>
                        <p>
                          Untuk menemui wali kelas dan guru BK, pada waktu sebagai berikut:
                        </p>
                        <p>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hari/Tanggal&nbsp;&nbsp;: <?php echo $hari; ?>
                          <br>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Waktu&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $waktu; ?> WIB
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