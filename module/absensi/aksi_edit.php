<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {

    echo "<center>untuk mengakses modul, anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
    include "../../lib/koneksi.php";
    include "../../lib/config.php";
    
    $id_admin = $_POST['id_admin'];
    $thAjaran = $_POST['thAjaran'];
    $tanggal = $_POST['tanggal'];
    $ket = $_POST['ket'];
    $siswa = $_POST['siswa'];
    $nis=substr($siswa, 0,5);
    $absen = $_POST['absen'];
    $izin = $_POST['izin'];
    $sakit = $_POST['sakit'];

   
    $queryEdit = mysqli_query($connect,"UPDATE absensi SET tanggal='$tanggal', nis='$nis', absen='$absen', sakit='$sakit', izin='$izin', tahun_ajaran='$thAjaran', keterangan='$ket' WHERE id_admin='$id_admin'" );

    if ($queryEdit) {
        echo "<script> alert ('Data Pelanggaran Siswa Berhasil Diubah'); window.location = '$base_url'+'main.php?module=input_absensi';</script>";
    }
    else {
        echo "<script> alert('Data Pelanggaran Siswa Gagal Diubah'); window.location='main.php?module=edit_absensi&id_admin='+'$id_admin';</script>";
    }
}
?>