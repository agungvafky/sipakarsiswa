-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Des 2021 pada 13.15
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pembinaan_karakter`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id_admin` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `tahun_ajaran` varchar(11) NOT NULL,
  `tanggal` date NOT NULL,
  `absen` int(11) NOT NULL,
  `izin` int(11) NOT NULL,
  `sakit` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id_admin`, `nis`, `tahun_ajaran`, `tanggal`, `absen`, `izin`, `sakit`, `keterangan`) VALUES
(3, 25171, '2019/2021', '2021-12-21', 2, 1, 1, 'dsad');

-- --------------------------------------------------------

--
-- Struktur dari tabel `alumni`
--

CREATE TABLE `alumni` (
  `nis` varchar(6) NOT NULL,
  `nama_alumni` varchar(30) NOT NULL,
  `th_lulus` year(4) NOT NULL,
  `id_jurusan` tinyint(2) NOT NULL,
  `sub_kelas` char(1) NOT NULL,
  `id_ortu` int(5) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_poin`
--

CREATE TABLE `detail_poin` (
  `id_detail_poin` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `tahun_ajaran` char(9) NOT NULL,
  `nis` varchar(6) NOT NULL,
  `id_pelanggaran` tinyint(3) DEFAULT NULL,
  `id_prestasi` tinyint(3) DEFAULT NULL,
  `ket` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_poin`
--

INSERT INTO `detail_poin` (`id_detail_poin`, `tanggal`, `tahun_ajaran`, `nis`, `id_pelanggaran`, `id_prestasi`, `ket`) VALUES
(1, '2017-11-13', '2016/2017', '16433', 1, NULL, ''),
(2, '2017-11-13', '2016/2017', '16422', 1, NULL, ''),
(3, '2017-11-13', '2016/2017', '16426', 1, NULL, ''),
(4, '2017-11-14', '2016/2017', '16444', 5, NULL, ''),
(6, '2017-11-13', '2016/2017', '16430', 5, NULL, ''),
(7, '2017-11-14', '2016/2017', '16441', 1, NULL, ''),
(8, '2017-11-14', '2016/2017', '12347', NULL, 2, NULL),
(9, '2017-07-05', '2016/2017', '16421', NULL, 6, ''),
(10, '2017-07-05', '2016/2017', '16425', NULL, 6, ''),
(12, '2017-07-05', '2016/2017', '16429', NULL, 6, ''),
(13, '2017-07-05', '2016/2017', '16435', NULL, 6, ''),
(14, '2017-07-05', '2016/2017', '16440', NULL, 6, ''),
(15, '2017-07-05', '2016/2017', '16445', NULL, 6, ''),
(16, '2017-07-05', '2016/2017', '16451', NULL, 6, ''),
(17, '2017-07-05', '2016/2017', '16457', NULL, 6, ''),
(18, '2017-08-20', '2016/2017', '16439', NULL, 4, ''),
(19, '2017-08-20', '2016/2017', '16424', NULL, 4, ''),
(20, '2017-09-21', '2016/2017', '16440', NULL, 2, ''),
(21, '2017-10-14', '2016/2017', '16427', NULL, 3, ''),
(22, '2017-10-14', '2016/2017', '16444', NULL, 3, ''),
(23, '2017-10-14', '2016/2017', '16421', NULL, 3, ''),
(24, '2017-10-19', '2016/2017', '16434', NULL, 12, ''),
(25, '2017-07-05', '2016/2017', '16420', 1, NULL, ''),
(26, '2017-07-05', '2016/2017', '16423', 5, NULL, ''),
(27, '2017-07-14', '2016/2017', '16435', 5, NULL, ''),
(28, '2017-07-21', '2016/2017', '16428', 1, NULL, ''),
(29, '2017-08-08', '2016/2017', '16439', 1, NULL, ''),
(30, '2017-08-10', '2016/2017', '16431', 1, NULL, ''),
(31, '2017-08-23', '2016/2017', '16430', 1, NULL, ''),
(32, '2017-08-24', '2016/2017', '16429', 1, NULL, ''),
(33, '2017-08-12', '2016/2017', '16445', 5, NULL, ''),
(34, '2017-11-09', '2016/2017', '16427', 1, NULL, ''),
(35, '2017-11-10', '2016/2017', '16420', 2, NULL, ''),
(36, '2017-09-05', '2016/2017', '16426', 1, NULL, ''),
(37, '2017-10-14', '2016/2017', '16430', 5, NULL, ''),
(42, '2017-12-05', '2017/2018', '16421', 2, NULL, ''),
(44, '2017-12-11', '2017/2018', '16425', 1, NULL, ''),
(45, '2016-12-01', '2016/2017', '16419', 5, NULL, 'Main Playstation'),
(46, '2016-12-05', '2016/2017', '16419', 5, NULL, 'Main di Alkid'),
(47, '2016-12-08', '2016/2017', '16419', 1, NULL, 'Tidak mendapatkan alat  transportasi dari rumah ke kampus'),
(48, '2017-01-17', '2016/2017', '16426', 7, NULL, 'Berbicara keras dan melempar sapu ke teman lainya'),
(49, '2017-01-20', '2016/2017', '16426', 7, NULL, 'Memukul - mukul meja'),
(50, '2017-02-25', '2016/2017', '16421', 1, NULL, 'Ban sepeda motor bagian belakang bocor'),
(51, '2017-02-25', '2016/2017', '16424', 2, NULL, 'Dijual'),
(52, '2017-02-26', '2016/2017', '16423', 8, NULL, 'Malas'),
(53, '2017-03-17', '2016/2017', '16427', 4, NULL, ''),
(54, '2017-04-17', '2016/2017', '16431', 6, NULL, 'Kelaparan'),
(55, '2017-05-17', '2016/2017', '16446', 9, NULL, 'Bosan mengikuti mata pelajaran'),
(56, '2017-05-17', '2016/2017', '16428', 10, NULL, ''),
(57, '2017-06-17', '2016/2017', '16422', 5, NULL, ''),
(58, '2017-07-17', '2017/2018', '16420', NULL, 6, ''),
(59, '2017-08-17', '2017/2018', '16421', NULL, 1, ''),
(60, '2017-09-17', '2017/2018', '16421', NULL, 2, ''),
(61, '2017-09-27', '2017/2018', '16421', NULL, 3, ''),
(62, '2017-10-17', '2016/2017', '16419', NULL, 8, ''),
(63, '2017-10-17', '2016/2017', '16427', NULL, 8, ''),
(64, '2017-10-17', '2017/2018', '16432', NULL, 8, ''),
(65, '2017-10-17', '2017/2018', '16434', NULL, 6, ''),
(66, '2021-11-27', '2020/2021', '16430', NULL, 2, 'selamat'),
(67, '2021-11-29', '2020/2021', '16455', 8, NULL, ''),
(68, '2021-11-29', '2020/2021', '25171', NULL, 1, 'Selamat !!'),
(69, '2021-12-16', '2019/2021', '25171', 1, NULL, 'dadas'),
(70, '2021-12-18', '2019/2021', '25171', 0, NULL, 'dsa'),
(71, '2021-12-18', '2019/2021', '25171', 0, NULL, 'dsads'),
(72, '2021-12-18', '2019/2021', '25171', 0, NULL, 'dsa'),
(73, '2021-12-22', '2019/2021', '25160', 12, NULL, 'asasa'),
(74, '2021-12-22', '2019/2021', '25160', NULL, 2, 'ssasa'),
(75, '2021-12-22', '2019/2021', '11111', 1, NULL, 'hkuhi'),
(76, '2021-12-22', '2019/2021', '11111', NULL, 2, 'dsad');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `nip` char(18) NOT NULL,
  `nama_guru` varchar(30) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `jabatan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`nip`, `nama_guru`, `no_hp`, `jabatan`) VALUES
('202019990713030899', 'Angga Yunanda', '082365657687', 'Wali kelas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` tinyint(2) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'Teknik Komputer Jaringan'),
(2, 'Multimedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kat_pelanggaran`
--

CREATE TABLE `kat_pelanggaran` (
  `id_kat_pelanggaran` tinyint(2) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kat_pelanggaran`
--

INSERT INTO `kat_pelanggaran` (`id_kat_pelanggaran`, `nama_kategori`) VALUES
(1, 'Komponen Kelakuan'),
(2, 'Komponen Kerapihan'),
(3, 'Komponen Kerajinan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` tinyint(3) NOT NULL,
  `id_jurusan` tinyint(2) NOT NULL,
  `tingkat_kelas` varchar(4) NOT NULL,
  `sub_kelas` char(1) NOT NULL,
  `nip` char(18) DEFAULT NULL,
  `jml_siswa` tinyint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `id_jurusan`, `tingkat_kelas`, `sub_kelas`, `nip`, `jml_siswa`) VALUES
(1, 1, 'X', 'A', '202019990713030899', 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orang_tua`
--

CREATE TABLE `orang_tua` (
  `id_ortu` int(5) NOT NULL,
  `nama_ortu` varchar(30) NOT NULL,
  `alamat_ortu` text NOT NULL,
  `no_hp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orang_tua`
--

INSERT INTO `orang_tua` (`id_ortu`, `nama_ortu`, `alamat_ortu`, `no_hp`) VALUES
(1, 'Tina', 'Sungai  Pua', '081265657687'),
(2, 'umam', 'dsajldasj', '081366112112');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggaran`
--

CREATE TABLE `pelanggaran` (
  `id_pelanggaran` tinyint(3) NOT NULL,
  `nama_pelanggaran` varchar(150) NOT NULL,
  `id_sub_kategori` tinyint(2) NOT NULL,
  `poin` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggaran`
--

INSERT INTO `pelanggaran` (`id_pelanggaran`, `nama_pelanggaran`, `id_sub_kategori`, `poin`) VALUES
(1, 'Terlambat hadir di sekolah / keg.PBM lebih dari 5 menit', 1, 2),
(2, 'Tidak membawa buku paket/pelajaran', 1, 5),
(3, 'TIdak mengerjakan tugas sesuai dengan batas waktu yang ditentukan', 1, 7),
(4, 'Mencontek/ menconteki', 1, 10),
(5, 'Keluar kampus tanpa ijin guru/ karyawan (membolos)', 1, 10),
(6, 'Makan/ minum/ tidur saat PBM tanpa ijin guru/ karyawan', 1, 10),
(7, 'Membuat gaduh di kelas', 1, 10),
(8, 'Tidak mengikuti ekstrakurikuler wajib di sekolah', 1, 10),
(9, 'Menggunakan media player dan atau alat komunikasi saat PBM', 1, 20),
(10, 'Membawa/ meminjamkan alat selain yang menunjang PBM', 1, 20),
(11, 'Tidak mengikuti kegiatan keagamaan tanpa keterangan', 1, 20),
(12, 'Tidak mengikuti upacara bendera', 1, 10),
(13, 'Menggunakan Narkoba', 5, 127),
(16, 'berkata -kata tidak sopan', 2, 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasi`
--

CREATE TABLE `prestasi` (
  `id_prestasi` tinyint(3) NOT NULL,
  `nama_prestasi` varchar(100) NOT NULL,
  `poin` smallint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prestasi`
--

INSERT INTO `prestasi` (`id_prestasi`, `nama_prestasi`, `poin`) VALUES
(1, 'Juara lomba tingkat Nasional', 150),
(2, 'Juara lomba tingkat Provinsi', 100),
(3, 'Juara lomba tingkat Kabupaten/Kota', 50),
(4, 'Juara lomba tingkat Kecamatan', 25),
(5, 'Juara lomba tingkat Sekolah', 20),
(6, 'Peringkat 1-3 di kelas', 20),
(7, 'Pengurus aktif OSIS/PK/Pramuka per tahun', 10),
(8, 'Pengurus aktif kelas per tahun', 5),
(9, 'Pengurus aktif organisasi kemasyarakatan', 5),
(10, 'Menjadi panitia kegiatan sekolah', 4),
(11, 'Mengikuti lomba sebagai wakil sekolah', 3),
(12, 'Mendapat nilai tertinggi ulangan harian', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(10) NOT NULL,
  `nama_siswa` varchar(30) NOT NULL,
  `th_angkatan` year(4) NOT NULL,
  `alamat` text NOT NULL,
  `id_kelas` tinyint(3) NOT NULL,
  `id_ortu` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `nama_siswa`, `th_angkatan`, `alamat`, `id_kelas`, `id_ortu`) VALUES
('11111', 'ddgrdt', 2020, 'sdfsd', 1, 2),
('25160', 'amin', 2020, 'eweq', 1, 2),
('25171', 'Feby', 2020, 'Sungai pua', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa_do`
--

CREATE TABLE `siswa_do` (
  `nis` varchar(6) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `th_keluar` year(4) NOT NULL,
  `id_jurusan` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa_do`
--

INSERT INTO `siswa_do` (`nis`, `nama`, `th_keluar`, `id_jurusan`) VALUES
('12348', 'Thinkerbell', 2017, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_kat_pelanggaran`
--

CREATE TABLE `sub_kat_pelanggaran` (
  `id_sub_kategori` tinyint(2) NOT NULL,
  `nama_sub_kategori` varchar(100) NOT NULL,
  `id_kat_pelanggaran` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sub_kat_pelanggaran`
--

INSERT INTO `sub_kat_pelanggaran` (`id_sub_kategori`, `nama_sub_kategori`, `id_kat_pelanggaran`) VALUES
(1, 'Belajar Mengajar', 1),
(2, 'Penghinaan', 1),
(3, 'Sarana Prasarana', 1),
(4, 'Memakai Perhiasan', 1),
(5, 'Rokok/ Miras/ Narkoba/ Petasan/ Pornografi', 1),
(6, 'Pemalsuan/ Pencurian/ Zina/ Pemerasan/ Perjudian/ Kesopanan/ Penyelewengan/ Geng', 1),
(7, 'Rambut', 2),
(8, 'Pakaian', 2),
(9, 'Kehadiran', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp_rapat`
--

CREATE TABLE `temp_rapat` (
  `id_temp_rapat` int(12) NOT NULL,
  `nis` varchar(6) NOT NULL,
  `jml_poin_pelanggaran` smallint(3) NOT NULL,
  `lihat` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp_sp_1`
--

CREATE TABLE `temp_sp_1` (
  `id_temp_sp_1` int(12) NOT NULL,
  `nis` varchar(6) NOT NULL,
  `jml_poin_pelanggaran` smallint(3) NOT NULL,
  `lihat` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `temp_sp_1`
--

INSERT INTO `temp_sp_1` (`id_temp_sp_1`, `nis`, `jml_poin_pelanggaran`, `lihat`) VALUES
(1, '16430', 22, 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp_sp_2`
--

CREATE TABLE `temp_sp_2` (
  `id_temp_sp_2` int(12) NOT NULL,
  `nis` varchar(6) NOT NULL,
  `jml_poin_pelanggaran` smallint(3) NOT NULL,
  `lihat` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp_sp_3`
--

CREATE TABLE `temp_sp_3` (
  `id_temp_sp_3` int(12) NOT NULL,
  `nis` varchar(6) NOT NULL,
  `jml_poin_pelanggaran` smallint(3) NOT NULL,
  `lihat` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `th_ajaran`
--

CREATE TABLE `th_ajaran` (
  `id_th_ajaran` mediumint(5) NOT NULL,
  `tahun_ajaran` char(9) NOT NULL,
  `sekarang` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `th_ajaran`
--

INSERT INTO `th_ajaran` (`id_th_ajaran`, `tahun_ajaran`, `sekarang`) VALUES
(1, '2016/2017', 'N'),
(2, '2017/2018', 'N'),
(3, '2020/2021', 'N'),
(4, '2019/2021', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tindakan`
--

CREATE TABLE `tindakan` (
  `id_tindakan` tinyint(3) NOT NULL,
  `nama_tindakan` varchar(30) NOT NULL,
  `ketentuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tindakan`
--

INSERT INTO `tindakan` (`id_tindakan`, `nama_tindakan`, `ketentuan`) VALUES
(1, 'SP 1', 'Jumlah poin pelanggaran lebih dari 35 dan kurang dari 50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_login` int(5) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` text NOT NULL,
  `nip` char(18) DEFAULT NULL,
  `nis` varchar(6) DEFAULT NULL,
  `id_ortu` int(5) DEFAULT NULL,
  `hak_akses` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_login`, `username`, `password`, `nip`, `nis`, `id_ortu`, `hak_akses`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', '12345', 0, 1),
(8, 'kesiswaan', 'accc7841ce41b0f788a737bf9798ea4f', '123456712345123456', '', 0, 2),
(14, 'tina', 'ef2afe0ea76c76b6b4b1ee92864c4d5c', '', '25171', 1, 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `id_jurusan` (`id_jurusan`),
  ADD KEY `id_ortu` (`id_ortu`);

--
-- Indeks untuk tabel `detail_poin`
--
ALTER TABLE `detail_poin`
  ADD PRIMARY KEY (`id_detail_poin`),
  ADD KEY `nis` (`nis`),
  ADD KEY `id_pelanggaran` (`id_pelanggaran`),
  ADD KEY `id_prestasi` (`id_prestasi`),
  ADD KEY `tahun_ajaran` (`tahun_ajaran`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `kat_pelanggaran`
--
ALTER TABLE `kat_pelanggaran`
  ADD PRIMARY KEY (`id_kat_pelanggaran`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_jurusan` (`id_jurusan`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `orang_tua`
--
ALTER TABLE `orang_tua`
  ADD PRIMARY KEY (`id_ortu`);

--
-- Indeks untuk tabel `pelanggaran`
--
ALTER TABLE `pelanggaran`
  ADD PRIMARY KEY (`id_pelanggaran`),
  ADD KEY `id_kat_pelanggaran` (`id_sub_kategori`);

--
-- Indeks untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id_prestasi`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `id_ortu` (`id_ortu`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `siswa_do`
--
ALTER TABLE `siswa_do`
  ADD PRIMARY KEY (`nis`);

--
-- Indeks untuk tabel `sub_kat_pelanggaran`
--
ALTER TABLE `sub_kat_pelanggaran`
  ADD PRIMARY KEY (`id_sub_kategori`),
  ADD KEY `id_kat_pelanggaran` (`id_kat_pelanggaran`);

--
-- Indeks untuk tabel `temp_rapat`
--
ALTER TABLE `temp_rapat`
  ADD PRIMARY KEY (`id_temp_rapat`);

--
-- Indeks untuk tabel `temp_sp_1`
--
ALTER TABLE `temp_sp_1`
  ADD PRIMARY KEY (`id_temp_sp_1`);

--
-- Indeks untuk tabel `temp_sp_2`
--
ALTER TABLE `temp_sp_2`
  ADD PRIMARY KEY (`id_temp_sp_2`);

--
-- Indeks untuk tabel `temp_sp_3`
--
ALTER TABLE `temp_sp_3`
  ADD PRIMARY KEY (`id_temp_sp_3`);

--
-- Indeks untuk tabel `th_ajaran`
--
ALTER TABLE `th_ajaran`
  ADD PRIMARY KEY (`id_th_ajaran`),
  ADD UNIQUE KEY `tahun_ajaran` (`tahun_ajaran`);

--
-- Indeks untuk tabel `tindakan`
--
ALTER TABLE `tindakan`
  ADD PRIMARY KEY (`id_tindakan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_login`),
  ADD KEY `nip` (`nip`),
  ADD KEY `nis` (`nis`),
  ADD KEY `id_ortu` (`id_ortu`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `detail_poin`
--
ALTER TABLE `detail_poin`
  MODIFY `id_detail_poin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kat_pelanggaran`
--
ALTER TABLE `kat_pelanggaran`
  MODIFY `id_kat_pelanggaran` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `orang_tua`
--
ALTER TABLE `orang_tua`
  MODIFY `id_ortu` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pelanggaran`
--
ALTER TABLE `pelanggaran`
  MODIFY `id_pelanggaran` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id_prestasi` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `sub_kat_pelanggaran`
--
ALTER TABLE `sub_kat_pelanggaran`
  MODIFY `id_sub_kategori` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `temp_rapat`
--
ALTER TABLE `temp_rapat`
  MODIFY `id_temp_rapat` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `temp_sp_1`
--
ALTER TABLE `temp_sp_1`
  MODIFY `id_temp_sp_1` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `temp_sp_2`
--
ALTER TABLE `temp_sp_2`
  MODIFY `id_temp_sp_2` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `temp_sp_3`
--
ALTER TABLE `temp_sp_3`
  MODIFY `id_temp_sp_3` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `th_ajaran`
--
ALTER TABLE `th_ajaran`
  MODIFY `id_th_ajaran` mediumint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tindakan`
--
ALTER TABLE `tindakan`
  MODIFY `id_tindakan` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_login` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `alumni`
--
ALTER TABLE `alumni`
  ADD CONSTRAINT `alumni_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`),
  ADD CONSTRAINT `alumni_ibfk_2` FOREIGN KEY (`id_ortu`) REFERENCES `orang_tua` (`id_ortu`);

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`),
  ADD CONSTRAINT `kelas_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`);

--
-- Ketidakleluasaan untuk tabel `pelanggaran`
--
ALTER TABLE `pelanggaran`
  ADD CONSTRAINT `pelanggaran_ibfk_1` FOREIGN KEY (`id_sub_kategori`) REFERENCES `sub_kat_pelanggaran` (`id_sub_kategori`);

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_ortu`) REFERENCES `orang_tua` (`id_ortu`);

--
-- Ketidakleluasaan untuk tabel `sub_kat_pelanggaran`
--
ALTER TABLE `sub_kat_pelanggaran`
  ADD CONSTRAINT `sub_kat_pelanggaran_ibfk_1` FOREIGN KEY (`id_kat_pelanggaran`) REFERENCES `kat_pelanggaran` (`id_kat_pelanggaran`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
