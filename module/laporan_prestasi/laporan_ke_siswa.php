<?php
include "lib/config.php";
include "lib/koneksi.php";
//session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=index.php><b>LOGIN</b></a></center>";
}
elseif ($_SESSION['akses']==3){ ?>   
              <?php
                $username=$_SESSION['namauser'];
                $pass=$_SESSION['passuser'];
                $cariNis=mysqli_query($connect, "SELECT siswa.nis FROM user JOIN siswa ON user.nis=siswa.nis JOIN orang_tua ON siswa.id_ortu=orang_tua.id_ortu WHERE user.username='$username' AND user.password='$pass'");
                $cn=mysqli_fetch_array($cariNis);
                $nis=$cn['nis'];
               
               
              ?>           
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">

              <div class="title_left">
                <div class="form-group">
                  <div class="col-md-4 col-sm-4 col-xs-4">
                    
                  </div>
                </div>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    
                  </div>
                </div>
              </div>

            </div>

            <div class="clearfix"></div>
            
            

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_title">
                    <h2>Detail Prestasi</h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <div class="col-md-12 col-sm-12 col-xs-12">                       
                               <!-- start tabel prestasi -->
                                  <?php
                                    $prestasi=mysqli_query($connect, "SELECT * FROM detail_poin JOIN siswa ON detail_poin.nis=siswa.nis JOIN prestasi ON detail_poin.id_prestasi=prestasi.id_prestasi WHERE detail_poin.nis='$nis' ORDER BY tanggal DESC");
                                    $ketemu = mysqli_num_rows($prestasi);
                                    if($ketemu==0){
                                      echo "<h4 align=center>Belum ada prestasi yang dicapai</h4>";
                                    }
                                    else{
                                  ?>
                                  <div class="table-responsive">
                            <table id="datatable-fixed-header" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Tanggal</th>
                                  <th>Prestasi</th>
                                  <th>Keterangan</th>
                                </tr>
                              </thead>

                              <tbody>
                                      <?php
                                      $no=1;
                                      while($pres=mysqli_fetch_array($prestasi)){
                                      $idDetailPoin=$pres['id_detail_poin'];
                                       ?>
                                <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><?php echo $pres['tanggal']; ?></td>
                                  <td><?php echo $pres['nama_prestasi']; ?></td>
                                  <td><?php echo $pres['ket']; ?></td>
                                </tr>

                                        <?php
                                          $no++;
                                          }
                                        ?>
                                      
                              </tbody>
                            </table>
                          </div>
                                  <?php } ?>        
                            <!-- end tabel prestasi -->

                      
                    </div> <!-- tutup col md-12 -->
                  </div><!-- tutup x-content -->

                </div>
              </div>
            </div> <!-- tutup row -->


          </div>
        </div>
<?php 
}
else{
  echo "Anda Harus Login Untuk Mengakses Halaman Ini";
}
 ?>
