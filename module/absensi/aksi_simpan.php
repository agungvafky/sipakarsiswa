<?php
    include "../../lib/config.php";
    include "../../lib/koneksi.php";

    $thAjaran = $_POST['thAjaran'];
    $tanggal = $_POST['tanggal'];
    $ket = $_POST['ket'];
    $siswa = $_POST['siswa'];
    $nis=substr($siswa, 0,5);
    $absen = $_POST['absen'];
    $izin = $_POST['izin'];
    $sakit = $_POST['sakit'];

    
    


    $querySimpan = mysqli_query($connect,"INSERT INTO absensi (nis, tahun_ajaran, tanggal, absen, izin, sakit, keterangan) VALUES ('$nis', '$thAjaran', '$tanggal', '$absen', '$sakit', '$izin', '$ket')");

    if ($querySimpan) {
        echo "<script> alert('Data Absensi Siswa Berhasil Masuk'); window.location = '$base_url'+'main.php?module=input_absensi';</script>";
    }
    else {
        echo "<script> alert('Data Pelanggaran Siswa Gagal Dimasukkan'); window.location = '$base_url'+'main.php?module=tambah_pelanggaran_siswa';</script>";

    }

?>