<?php
include "lib/config.php";
include "lib/koneksi.php";
//session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href='$base_url'+'index.php><b>LOGIN</b></a></center>";
}
elseif ($_SESSION['akses']==3){ ?>

 			<?php
                $username=$_SESSION['namauser'];
                $pass=$_SESSION['passuser'];
                $cariNis=mysqli_query($connect, "SELECT siswa.nis FROM user JOIN siswa ON user.nis=siswa.nis JOIN orang_tua ON siswa.id_ortu=orang_tua.id_ortu WHERE user.username='$username' AND user.password='$pass'");
                $cn=mysqli_fetch_array($cariNis);
                $nisa=$cn['nis'];

                $pelanggaran=mysqli_query($connect, "SELECT SUM(pelanggaran.poin) AS jml FROM pelanggaran JOIN detail_poin ON pelanggaran.id_pelanggaran=detail_poin.id_pelanggaran WHERE detail_poin.nis='$nis' ORDER BY detail_poin.nis");
                $plg=mysqli_fetch_array($pelanggaran);
                $poinPelanggaran=$plg['jml'];

                $prestasi=mysqli_query($connect, "SELECT SUM(prestasi.poin) AS totPrestasi FROM prestasi JOIN detail_poin ON prestasi.id_prestasi=detail_poin.id_prestasi WHERE detail_poin.nis='$nis' ORDER BY detail_poin.nis");
				        $pres=mysqli_fetch_array($prestasi);
                $poinPrestasi=$pres['totPrestasi'];      



                      $hitungTotal=mysqli_query($connect, "SELECT detail_poin.nis, SUM(pelanggaran.poin) AS poin FROM detail_poin JOIN pelanggaran ON detail_poin.id_pelanggaran=pelanggaran.id_pelanggaran GROUP BY detail_poin.nis");
                      while($total=mysqli_fetch_array($hitungTotal)){
                        $nis=$total['nis'];
                        $totalPoin=$total['poin'];

                        if ($totalPoin>=36 && $totalPoin<=50) {
                          $cariSp1=mysqli_query($connect, "SELECT nis FROM temp_sp_1 WHERE nis=$nis");
                          $hasil=mysqli_num_rows($cariSp1);
                          if ($hasil==0) {
                            $simpan=mysqli_query($connect, "INSERT INTO temp_sp_1(nis, jml_poin_pelanggaran, lihat) VALUES ('$nis', '$totalPoin', 'N' )");
                          }
                        }
                        elseif ($totalPoin>=51 && $totalPoin<=75) {
                          $cariSp2=mysqli_query($connect, "SELECT nis FROM temp_sp_2 WHERE nis=$nis");
                          $hasil2=mysqli_num_rows($cariSp2);
                          if ($hasil2==0) {
                            $simpan2=mysqli_query($connect, "INSERT INTO temp_sp_2(nis, jml_poin_pelanggaran, lihat) VALUES ('$nis', '$totalPoin', 'N' )");
                          }
                        }
                        elseif ($totalPoin>=76 && $totalPoin<=124) {
                          $cariSp3=mysqli_query($connect, "SELECT nis FROM temp_sp_3 WHERE nis=$nis");
                          $hasil3=mysqli_num_rows($cariSp3);
                          if ($hasil3==0) {
                            $simpan3=mysqli_query($connect, "INSERT INTO temp_sp_3(nis, jml_poin_pelanggaran, lihat) VALUES ('$nis', '$totalPoin', 'N' )");
                          }
                        }
                        elseif ($totalPoin>=125) {
                          $cariRapat=mysqli_query($connect, "SELECT nis FROM temp_rapat WHERE nis=$nis");
                          $hasil4=mysqli_num_rows($cariRapat);
                          if ($hasil4==0) {
                            $simpan4=mysqli_query($connect, "INSERT INTO temp_rapat(nis, jml_poin_pelanggaran, lihat) VALUES ('$nis', '$totalPoin', 'N' )");
                          }
                        }

                      }          
               

            ?>     

<div class="right_col" role="main">
	<div class="">
        <div class="row top_tiles">
           <div class="col-md-9">
                      <div class="row tile_count">

                        <!-- SP 1 -->
                        <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
                          <span class="count_top" ><i class="fa fa-envelope-square"></i> Surat Peringatan 1</span>
                          <div class="count">
                            <a class="pull-left border-green profile_thumb" style="color:#bebebe">
                              <i class="fa fa-bell-o"></i>&nbsp;
                            </a>
                            <?php
                              $sp1=mysqli_query($connect, "SELECT temp_sp_1.nis, temp_sp_1.id_temp_sp_1, siswa.nama_siswa, kelas.tingkat_kelas, jurusan.nama_jurusan, kelas.sub_kelas, temp_sp_1.jml_poin_pelanggaran FROM temp_sp_1 JOIN siswa ON temp_sp_1.nis=siswa.nis JOIN kelas ON siswa.id_kelas=kelas.id_kelas JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan WHERE lihat='N' and temp_sp_1.nis='$nisa' ");
                              $jmlSp1=mysqli_num_rows($sp1);
                            ?>
                            <a href="#"><?php if ($jmlSp1==0) { echo "0";}else{echo $jmlSp1;} ?></a>
                          </div>
                          <span class="count_bottom"><button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target=".cetaksp1">SP 1 Perlu Dicetak</button></span>
                        </div>
                        <!-- Penutup SP 1 -->

                        <!-- modals SP 1 -->
                        <div class="modal fade cetaksp1" tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel"><font color="#da3131"><b>Daftar Surat Peringatan (SP 1) Yang Harus Dicetak</b></font></h4>
                              </div>
                              <div class="modal-body">
                                <h4>Perlu Dicetak</h4>
                                <table class="table table-hover">
                                  <?php
                                    $no=1;
                                    while ($cetak1=mysqli_fetch_array($sp1)) {
                                  ?>
                                  <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo "<b>Nama:</b> (".$cetak1['nis'].") ".$cetak1['nama_siswa']; ?></td>
                                    <td><?php echo "<b>Kelas:</b> ".$cetak1['tingkat_kelas']." ".$cetak1['nama_jurusan']." ".$cetak1['sub_kelas']; ?></td>
                                    <td><?php echo "<b>Total Poin:</b> ".$cetak1['jml_poin_pelanggaran']; ?></td>
                                    <td>
                                      <a href="main.php?module=detail_siswa&nis=<?php echo $cetak1['nis']; ?>&sb=home">
                                        <button type="button" class="btn btn-info btn-xs" ><i class='fa fa-eye'></i> Lihat</button>
                                      </a>
                                      <a href="main.php?module=pre_cetak1&nis=<?php echo $cetak1['nis']; ?>&id_temp_sp_1=<?php echo $cetak1['id_temp_sp_1']; ?>">
                                        <button type="button" class="btn btn-primary btn-xs" ><i class='fa fa-print'></i> Cetak</button>
                                      </a>
                                    </td>
                                  </tr>
                                  <?php 
                                    $no++;
                                    }
                                  ?>
                                </table>                            

                                <br>
                                <h4>Terakhir Dicetak</h4>
                                <table class="table table-hover">
                                  <?php
                                    $sdhCetak1=mysqli_query($connect, "SELECT temp_sp_1.nis, temp_sp_1.id_temp_sp_1, siswa.nama_siswa, kelas.tingkat_kelas, jurusan.nama_jurusan, kelas.sub_kelas, temp_sp_1.jml_poin_pelanggaran FROM temp_sp_1 JOIN siswa ON temp_sp_1.nis=siswa.nis JOIN kelas ON siswa.id_kelas=kelas.id_kelas JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan WHERE lihat='Y' and temp_sp_1.nis='$nisa' ORDER BY temp_sp_1.id_temp_sp_1 DESC LIMIT 5 ");
                                    $urut=1;
                                    while ($ulang1=mysqli_fetch_array($sdhCetak1)) {
                                  ?>
                                  <tr>
                                    <td><?php echo $urut; ?></td>
                                    <td><?php echo "<b>Nama:</b> (".$ulang1['nis'].") ".$ulang1['nama_siswa']; ?></td>
                                    <td><?php echo "<b>Kelas:</b> ".$ulang1['tingkat_kelas']." ".$ulang1['nama_jurusan']." ".$ulang1['sub_kelas']; ?></td>
                                    <td><?php echo "<b>Total Poin:</b> ".$ulang1['jml_poin_pelanggaran']; ?></td>
                                    <td>
                                      <a href="main.php?module=pre_cetak1&nis=<?php echo $ulang1['nis']; ?>&id_temp_sp_1=<?php echo $ulang1['id_temp_sp_1']; ?>">
                                        <button type="button" class="btn btn-primary btn-xs" ><i class='fa fa-print'></i> Cetak Ulang</button>
                                      </a>
                                    </td>
                                  </tr>
                                  <?php 
                                    $no++;
                                    }
                                  ?>
                                </table>      

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                              </div>

                            </div>
                          </div>
                        </div>
                        <!-- Penutup modals SP 1 -->

                        <!-- SP 2 -->
                        <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
                          <span class="count_top"><i class="fa fa-envelope-square"></i> Surat Peringatan 2</span>
                          <div class="count">
                            <a class="pull-left border-green profile_thumb" style="color:#da8631">
                              <i class="fa fa-bell-o"></i>&nbsp;
                            </a>
                            <?php
                              $sp2=mysqli_query($connect, "SELECT temp_sp_2.nis, temp_sp_2.id_temp_sp_2,siswa.nama_siswa, kelas.tingkat_kelas, jurusan.nama_jurusan, kelas.sub_kelas, temp_sp_2.jml_poin_pelanggaran FROM temp_sp_2 JOIN siswa ON temp_sp_2.nis=siswa.nis JOIN kelas ON siswa.id_kelas=kelas.id_kelas JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan WHERE lihat='N' and temp_sp_2.nis='$nisa'");
                              $jmlSp2=mysqli_num_rows($sp2);
                              
                            ?>
                            <a href="#"><?php if ($jmlSp2==0) { echo "0";}else{echo $jmlSp2;} ?></a>
                          </div>
                          <span class="count_bottom"><button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target=".cetaksp2">SP 2 Perlu Dicetak</button></span>
                        </div>
                        <!-- Penutup SP 2 -->

                        <!-- modals SP 2 -->
                        <div class="modal fade cetaksp2" tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel"><font color="#da3131"><b>Daftar Surat Peringatan (SP 2) Yang Harus Dicetak</b></font></h4>
                              </div>
                              <div class="modal-body">
                                <h4>Perlu Dicetak</h4>
                                <table class="table table-hover">
                                  <?php
                                    $no=1;
                                    while ($cetak2=mysqli_fetch_array($sp2)) {
                                  ?>
                                  <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo "<b>Nama:</b> (".$cetak2['nis'].") ".$cetak2['nama_siswa']; ?></td>
                                    <td><?php echo "<b>Kelas:</b> ".$cetak2['tingkat_kelas']." ".$cetak2['nama_jurusan']." ".$cetak2['sub_kelas']; ?></td>
                                    <td><?php echo "<b>Total Poin:</b> ".$cetak2['jml_poin_pelanggaran']; ?></td>
                                    <td>
                                      <a href="main.php?module=detail_siswa&nis=<?php echo $cetak2['nis']; ?>&sb=home">
                                        <button type="button" class="btn btn-info btn-xs" ><i class='fa fa-eye'></i> Lihat</button>
                                      </a>
                                      <a href="main.php?module=pre_cetak2&nis=<?php echo $cetak2['nis']; ?>&id_temp_sp_2=<?php echo $cetak2['id_temp_sp_2']; ?>">
                                        <button type="button" class="btn btn-primary btn-xs" ><i class='fa fa-print'></i> Cetak</button>
                                      </a>
                                    </td>
                                  </tr>
                                  <?php 
                                    $no++;
                                    }
                                  ?>
                                </table>                            

                                <br>
                                <h4>Terakhir Dicetak</h4>
                                <table class="table table-hover">
                                  <?php
                                    $sdhCetak2=mysqli_query($connect, "SELECT temp_sp_2.nis, temp_sp_2.id_temp_sp_2, siswa.nama_siswa, kelas.tingkat_kelas, jurusan.nama_jurusan, kelas.sub_kelas, temp_sp_2.jml_poin_pelanggaran FROM temp_sp_2 JOIN siswa ON temp_sp_2.nis=siswa.nis JOIN kelas ON siswa.id_kelas=kelas.id_kelas JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan WHERE lihat='Y' and temp_sp_2.nis='$nisa' ORDER BY temp_sp_2.id_temp_sp_2 DESC LIMIT 5 ");
                                    $urut=1;
                                    while ($ulang2=mysqli_fetch_array($sdhCetak2)) {
                                  ?>
                                  <tr>
                                    <td><?php echo $urut; ?></td>
                                    <td><?php echo "<b>Nama:</b> (".$ulang2['nis'].") ".$ulang2['nama_siswa']; ?></td>
                                    <td><?php echo "<b>Kelas:</b> ".$ulang2['tingkat_kelas']." ".$ulang2['nama_jurusan']." ".$ulang2['sub_kelas']; ?></td>
                                    <td><?php echo "<b>Total Poin:</b> ".$ulang2['jml_poin_pelanggaran']; ?></td>
                                    <td>
                                      <a href="main.php?module=pre_cetak2&nis=<?php echo $ulang2['nis']; ?>&id_temp_sp_2=<?php echo $ulang2['id_temp_sp_2']; ?>">
                                        <button type="button" class="btn btn-primary btn-xs" ><i class='fa fa-print'></i> Cetak Ulang</button>
                                      </a>
                                    </td>
                                  </tr>
                                  <?php 
                                    $no++;
                                    }
                                  ?>
                                </table>      

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                              </div>

                            </div>
                          </div>
                        </div>
                        <!-- Penutup modals SP 1 -->

                        <!-- Penutup modals SP 2 -->

                        <!-- SP 3 -->
                        <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
                          <span class="count_top"><i class="fa fa-envelope-square"></i> Surat Peringatan 3</span>
                          <div class="count">
                            <a class="pull-left border-green profile_thumb" style="color:#da3131">
                              <i class="fa fa-bell-o"></i>&nbsp;
                            </a>

                            <?php
                              $sp3=mysqli_query($connect, "SELECT temp_sp_3.nis, temp_sp_3.id_temp_sp_3, siswa.nama_siswa, kelas.tingkat_kelas, jurusan.nama_jurusan, kelas.sub_kelas, temp_sp_3.jml_poin_pelanggaran FROM temp_sp_3 JOIN siswa ON temp_sp_3.nis=siswa.nis JOIN kelas ON siswa.id_kelas=kelas.id_kelas JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan WHERE lihat='N' and temp_sp_3.nis='$nisa'");
                              $jmlSp3=mysqli_num_rows($sp3);
                            ?>
                            <a href="#"><?php if ($jmlSp3==0) { echo "0";}else{echo $jmlSp3;} ?></a>
                          </div>
                          <span class="count_bottom"><button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target=".cetaksp3">SP 3 Perlu Dicetak</button></span>
                        </div>
                        <!-- Penutup SP 3 -->

                        <!-- modals SP 3 -->
                        <div class="modal fade cetaksp3" tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel"><font color="#da3131"><b>Daftar Surat Peringatan (SP 3) Yang Harus Dicetak</b></font></h4>
                              </div>
                              <div class="modal-body">
                                <h4>Perlu Dicetak</h4>
                                <table class="table table-hover">
                                  <?php
                                    $no=1;
                                    while ($cetak3=mysqli_fetch_array($sp3)) {
                                  ?>
                                  <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo "<b>Nama:</b> (".$cetak3['nis'].") ".$cetak3['nama_siswa']; ?></td>
                                    <td><?php echo "<b>Kelas:</b> ".$cetak3['tingkat_kelas']." ".$cetak3['nama_jurusan']." ".$cetak3['sub_kelas']; ?></td>
                                    <td><?php echo "<b>Total Poin:</b> ".$cetak3['jml_poin_pelanggaran']; ?></td>
                                    <td>
                                      <a href="main.php?module=detail_siswa&nis=<?php echo $cetak3['nis']; ?>&sb=home">
                                        <button type="button" class="btn btn-info btn-xs" ><i class='fa fa-eye'></i> Lihat</button>
                                      </a>
                                      <a href="main.php?module=pre_cetak3&nis=<?php echo $cetak3['nis']; ?>&id_temp_sp_3=<?php echo $cetak3['id_temp_sp_3']; ?>">
                                        <button type="button" class="btn btn-primary btn-xs" ><i class='fa fa-print'></i> Cetak</button>
                                      </a>
                                    </td>
                                  </tr>
                                  <?php 
                                    $no++;
                                    }
                                  ?>
                                </table>                            

                                <br>
                                <h4>Terakhir Dicetak</h4>
                                <table class="table table-hover">
                                  <?php
                                    $sdhCetak3=mysqli_query($connect, "SELECT temp_sp_3.nis, temp_sp_3.id_temp_sp_3,siswa.nama_siswa, kelas.tingkat_kelas, jurusan.nama_jurusan, kelas.sub_kelas, temp_sp_3.jml_poin_pelanggaran FROM temp_sp_3 JOIN siswa ON temp_sp_3.nis=siswa.nis JOIN kelas ON siswa.id_kelas=kelas.id_kelas JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan WHERE lihat='Y' and temp_sp_3.nis='$nisa' ORDER BY temp_sp_3.id_temp_sp_3 DESC LIMIT 5 ");
                                    $urut=1;
                                    while ($ulang3=mysqli_fetch_array($sdhCetak3)) {
                                  ?>
                                  <tr>
                                    <td><?php echo $urut; ?></td>
                                    <td><?php echo "<b>Nama:</b> (".$ulang3['nis'].") ".$ulang3['nama_siswa']; ?></td>
                                    <td><?php echo "<b>Kelas:</b> ".$ulang3['tingkat_kelas']." ".$ulang3['nama_jurusan']." ".$ulang3['sub_kelas']; ?></td>
                                    <td><?php echo "<b>Total Poin:</b> ".$ulang3['jml_poin_pelanggaran']; ?></td>
                                    <td>
                                      <a href="main.php?module=pre_cetak3&nis=<?php echo $ulang3['nis']; ?>&id_temp_sp_3=<?php echo $ulang3['id_temp_sp_3']; ?>">
                                        <button type="button" class="btn btn-primary btn-xs" ><i class='fa fa-print'></i> Cetak Ulang</button>
                                      </a>
                                    </td>
                                  </tr>
                                  <?php 
                                    $no++;
                                    }
                                  ?>
                                </table>      

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                              </div>

                            </div>
                          </div>
                        </div>
                        <!-- Penutup modals SP 3 -->

                        <!-- Keputusan Akhir -->
                        <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
                          <span class="count_top"><i class="fa fa-envelope-square"></i> Keputusan Akhir</span>
                          <div class="count">
                            <a class="pull-left border-green profile_thumb" style="color:#da3131">
                              <i class="fa fa-exclamation-circle"></i>&nbsp;
                            </a>
                            <?php
                              $do=mysqli_query($connect, "SELECT  temp_rapat.id_temp_rapat, temp_rapat.nis, siswa.nama_siswa, kelas.tingkat_kelas, jurusan.nama_jurusan, kelas.sub_kelas, temp_rapat.jml_poin_pelanggaran FROM temp_rapat JOIN siswa ON temp_rapat.nis=siswa.nis JOIN kelas ON siswa.id_kelas=kelas.id_kelas JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan WHERE lihat='N' and temp_rapat.nis='$nisa'");
                              $jmlDo=mysqli_num_rows($do);
                            ?>
                            <a href="#"><?php if ($jmlDo==0) { echo "0";}else{echo $jmlDo;} ?></a>
                          </div>
                          <span class="count_bottom"><button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target=".rapat">Perlu Dirapatkan</button></span>
                        </div>
                        <!-- Penutup Keputusan Akhir -->

                        <!-- modals Keputusan Akhir -->
                        <div class="modal fade rapat" tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel"><font color="#da3131"><b>Daftar Yang Harus Dirapatkan</b></font></h4>
                              </div>
                              <div class="modal-body">
                                <h4>List Untuk Diakan Rapat Pleno</h4>
                                <table class="table table-hover">
                                  <?php
                                    $no=1;
                                    while ($rapat=mysqli_fetch_array($do)) {
                                  ?>
                                  <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo "<b>Nama:</b> (".$rapat['nis'].") ".$rapat['nama_siswa']; ?></td>
                                    <td><?php echo "<b>Kelas:</b> ".$rapat['tingkat_kelas']." ".$rapat['nama_jurusan']." ".$rapat['sub_kelas']; ?></td>
                                    <td><?php echo "<b>Total Poin:</b> ".$rapat['jml_poin_pelanggaran']; ?></td>
                                    <td>
                                      <a href="main.php?module=pre_cetak4&nis=<?php echo $rapat['nis']; ?>&id_temp_rapat=<?php echo $rapat['id_temp_rapat']; ?>">
                                      <button type="button" class="btn btn-primary btn-xs" ><i class='fa fa-print'></i> Sudah Rapat</button></a>
                                    </td>
                                  </tr>
                                  <?php 
                                    $no++;
                                    }
                                  ?>
                                </table>                            

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                              </div>

                            </div>
                          </div>
                        </div>
                        <!-- Penutup modals Keputusan Akhir -->

                      </div>
                    </div>
                    <!-- End Notifikasi -->

        	<div class="animated flipInY col-lg-2 col-md-2 col-sm-6 col-xs-12">
                
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-warning"></i></div>
                  <div class="count"><?php if($poinPelanggaran==0){echo "0";} else{ echo $poinPelanggaran; }?></div>
                  <h3>Poin Pelanggaran</h3>
                  <p>Total poin pelanggaran yang dilakukan</p>
                </div>
            </div>
            <div class="animated flipInY col-lg-2 col-md-2 col-sm-6 col-xs-12">
                
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-star-o"></i></div>
                  <div class="count"><?php if($poinPrestasi==0){echo "0";} else{ echo $poinPrestasi; }?></div>
                  <h3>Poin Prestasi </h3>
                  <p>Total poin prestasi yang didapat</p>
                </div>
            </div>
        </div>
    </div><!-- Penutup class "" -->
	
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
        	<div class="dashboard_graph x_panel">
                <div class="row x_title">
                	<div class="col-md-6">

                    	<h3>PROFIL <small></small></h3>
                    </div>
                    <div class="col-md-6">      	
                    </div>
                </div>

                <?php 
                	$siswa=mysqli_query($connect, "SELECT siswa.nama_siswa, kelas.tingkat_kelas, kelas.sub_kelas, jurusan.nama_jurusan, siswa.alamat FROM siswa JOIN kelas ON siswa.id_kelas=kelas.id_kelas JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan WHERE siswa.nis='$nisa'");
                	$sw=mysqli_fetch_array($siswa);

                ?>
                <div class="x_content">
                    <div class="demo-container">
                    	<table>
                      		<tr>
                      			<td width="100">NIS</td>
                      			<td width="10">:</td>
                      			<td><?php echo $nisa; ?></td>
                      		</tr>
                      		<tr>
                      			<td>Nama</td>
                      			<td>:</td>
                      			<td><?php echo $sw['nama_siswa']; ?></td>
                      		</tr>
                      		<tr>
                      			<td>Kelas</td>
                      			<td>:</td>
                      			<td><?php echo $sw['tingkat_kelas']." ".$sw['nama_jurusan']." ".$sw['sub_kelas']; ?></td>
                      		</tr>
                      		<tr>
                      			<td>Alamat</td>
                      			<td>:</td>
                      			<td><?php echo $sw['alamat']; ?></td>
                      		</tr>
                      	</table>
                      
                    </div>
                </div>

            </div>
        </div>
    </div>
    <h4 align="center">Anda dapat melakukan pengecekan detail poin pelanggaran dan prestasi dengan klik menu di samping atau klik tombol di bawah ini</h4>
    <br>
    <div class="col-md-3"></div>
    <div class="col-md-4">
    	<a href="main.php?module=lap_pelanggaran_ke_siswa">
    		<button type="button" class="btn btn-primary btn-lg">Cek Poin Pelanggaran</button>
    	</a>
    </div>
    <div class="col-md-4">
    	<a href="main.php?module=lap_prestasi_ke_siswa">
    		<button type="button" class="btn btn-primary btn-lg">Cek Poin Prestasi</button>
    	</a>
    </div>

</div><!-- Penutup right_col -->


<?php 
}
else{
  echo "Anda Harus Login Untuk Mengakses Halaman Ini";
}
 ?>