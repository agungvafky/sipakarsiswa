<?php
    include "../../lib/config.php";
    include "../../lib/koneksi.php";

        $nis=$_GET['nis'];
        $no_surat=$_GET['no_surat'];
        $tanggal=$_GET['tanggal'];
        $waktu=$_GET['waktu'];
       
        
     
      
      

        //seleksi data dari data base
        $cekdata = mysqli_query($connect,"select * from surat_sp_1 where nis='$no_surat'");
        // menghitung jumlah data yang ditemukan
        $cek = mysqli_num_rows($cekdata);
        // cek apakah username dan password di temukan pada database
        if($cek > 0){
        echo"<script>alert('data dengan no_surat ini sudah ada!');</script>";
        }
        else
        {
        mysqli_query($connect,"insert into surat_sp_1 values
            ('$no_surat',
            '$nis',
            '$tanggal',
            '$waktu')");
       
        echo"<script>alert('surat berhasil disimpan');
        </script>";
        echo"<script>window.location='$base_url'+'main.php?module=home_admin'</script>";
        }

?>