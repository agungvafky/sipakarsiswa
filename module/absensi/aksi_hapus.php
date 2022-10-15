<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {

	echo "<center>untuk mengakses modul, anda harus login <br>";
	echo "<a href=index.php><b>LOGIN</b></a></center>";
} else {
	include "../../lib/koneksi.php";
	include "../../lib/config.php";

	$id_admin=$_GET['id_admin'];
	$queryHapus=mysqli_query($connect,"DELETE FROM absensi WHERE id_admin='$id_admin'");
	if ($queryHapus) {
		echo "<script> alert('Data Absensi Siswa Berhasil di Hapus'); window.location='$base_url'+'main.php?module=input_absensi';</script>";
	}
	else {
		echo "<script> alert('Data Absensi Siswa Gagal di Hapus'); window.location='$base_url'+'main.php?module=input_absensi';</script> ";
	}

	}
?>