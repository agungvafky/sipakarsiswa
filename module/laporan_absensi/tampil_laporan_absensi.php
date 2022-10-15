<?php
include "lib/config.php";
include "lib/koneksi.php";
//session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href='$base_url'+'index.php><b>LOGIN</b></a></center>";
}
elseif ($_SESSION['akses']==1 or $_SESSION['akses']==2){ ?>        

        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Pelanggaran Siswa</h3>
              </div>
            </div>
             <?php 
                            $th_ajaran=mysqli_query($connect, "SELECT * FROM th_ajaran WHERE sekarang='Y'");
                            $ta=mysqli_fetch_array($th_ajaran);
                            $thAjaran=$ta['tahun_ajaran'];
                           ?>
            <div class="clearfix"></div>

            <!-- Siswa Dengan Pelanggaran Terbanyak -->
           <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <h4>Data Absen Siswa</h4>
                    <div class="table-responsive">
                    <table id="datatable-fixed-header" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Tanggal Update</th>
                          <th>NIS</th>
                          <th>Nama Siswa</th>
                          <th>Absen</th>
                          <th>Sakit</th>
                          <th>Izin</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php
                        $absensi=mysqli_query($connect, "SELECT * FROM absensi JOIN siswa ON absensi.nis=siswa.nis WHERE tahun_ajaran='$thAjaran' ORDER BY tanggal DESC");
                        $no=1;
                        while($plg=mysqli_fetch_array($absensi)){
                        
                         ?>
                        <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $plg['tanggal']; ?></td>
                          <td><a href="main.php?module=detail_siswa&nis=<?php echo $plg['nis'];?>&sb=input_pelanggaran"><?php echo $plg['nis']; ?></a></td>
                          <td><a href="main.php?module=detail_siswa&nis=<?php echo $plg['nis'];?>&sb=input_pelanggaran"><?php echo $plg['nama_siswa']; ?></a></td>
                          <td><?php echo $plg['absen']; ?></td>
                          <td><?php echo $plg['sakit']; ?></td>
                          <td><?php echo $plg['izin']; ?></td>
                          <td>
                            <div class="btn-group">
                              <a href="module/laporan_absensi/cetak.php?id_admin=<?php echo $plg['id_admin'];?>" class="btn btn-warning btn-sm" target="_blank"><i class='fa fa-print'></i></button></a>
                              
                            </div>
                          </td>
                        </tr>

                        <?php
                        $no++;
                        }
                         ?>
                        
                      </tbody>
                    </table>
                  </div>
                  </div>
                </div>
              </div>
              </div>
              <!-- Tabel Semua Data Pelanggaran -->
                            <!-- end pelanggaran per kategori -->


                          </div>


                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
<?php 
}
else{
  echo "Anda Harus Login Untuk Mengakses Halaman Ini";
}
 ?>