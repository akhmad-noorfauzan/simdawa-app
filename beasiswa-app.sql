-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2023 at 08:16 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beasiswa-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `beasiswa`
--

CREATE TABLE `beasiswa` (
  `id` int(11) NOT NULL,
  `nama_beasiswa` varchar(50) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `jenis_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `beasiswa`
--

INSERT INTO `beasiswa` (`id`, `nama_beasiswa`, `tanggal_mulai`, `tanggal_selesai`, `jenis_id`) VALUES
(1, 'Beasiswa Bidikmisi', '2023-07-16', '2023-12-08', 3),
(2, 'Beasiswa olahraga', '2023-06-08', '2023-12-28', 5),
(3, 'besiswa uniska', '2023-01-08', '2023-06-24', 3),
(4, 'Beasiswa Uniska', '2023-06-13', '2023-12-29', 7),
(5, 'Beasiswa Uniska', '2023-01-06', '2023-07-06', 8),
(6, 'Beasiswa Swasta', '2023-02-14', '2023-07-22', 9);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_beasiswa`
--

CREATE TABLE `jenis_beasiswa` (
  `id` int(11) NOT NULL,
  `nama_jenis` varchar(50) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_beasiswa`
--

INSERT INTO `jenis_beasiswa` (`id`, `nama_jenis`, `keterangan`) VALUES
(5, 'Beasiswa Tahfidz', 'Untuk mahasiswa yang hafal Al-Qur\'an minimal 5 Juz'),
(8, 'KIP Kuliah', 'Beasiswa KIP Kuliah UNISKA'),
(9, 'Beasiswa BCA Finance', 'Jenis beasiswa yang terdapat di perguruan tinggi adalah beasiswa BCA Finance');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran_pengguna`
--

CREATE TABLE `pendaftaran_pengguna` (
  `id` int(11) NOT NULL,
  `no_pendaftaran` varchar(20) DEFAULT NULL,
  `nama_lengkap` varchar(75) DEFAULT NULL,
  `no_handphone` varchar(15) DEFAULT NULL,
  `bukti_daftar` varchar(225) DEFAULT NULL,
  `prodi_id` int(11) DEFAULT NULL,
  `keterangan` enum('Sudah Diverifikasi','Belum Diverifikasi','Akun Dibatalkan') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendaftaran_pengguna`
--

INSERT INTO `pendaftaran_pengguna` (`id`, `no_pendaftaran`, `nama_lengkap`, `no_handphone`, `bukti_daftar`, `prodi_id`, `keterangan`) VALUES
(1, '1', 'Shellania', '087829508584', 'uniska_logo.png', NULL, 'Sudah Diverifikasi');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_beasiswa`
--

CREATE TABLE `pengajuan_beasiswa` (
  `id` varchar(64) NOT NULL,
  `tanggal_pengajuan` date DEFAULT NULL,
  `pengguna_id` int(11) DEFAULT NULL,
  `beasiswa_id` int(11) DEFAULT NULL,
  `keterangan` enum('Diajukan','Ditolak','Diusulkan','Ditetapkan') DEFAULT 'Diajukan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `peran` enum('ADMIN','USER','OPERATOR') DEFAULT NULL,
  `login_terakhir` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pendaftaran_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `PASSWORD`, `peran`, `login_terakhir`, `pendaftaran_id`) VALUES
(1, '1', '55ad0d2a271aa5e1ec11fdc60190b349', 'USER', '2023-06-24 02:32:04', 1),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'ADMIN', '2023-06-24 03:16:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `persyaratan`
--

CREATE TABLE `persyaratan` (
  `id` int(11) NOT NULL,
  `nama_persyaratan` varchar(100) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `persyaratan`
--

INSERT INTO `persyaratan` (`id`, `nama_persyaratan`, `keterangan`) VALUES
(2, 'Warga Negara Indonesia', 'calon beasiswa peserta harus merupakan warga asli negara indonesia'),
(3, 'Berusia maksimal 19 tahun', 'penerima beasiswa minimal berusia 19 tahun sebelum bulan agustus'),
(4, 'IPK ', 'Minimal IPK 3,0');

-- --------------------------------------------------------

--
-- Table structure for table `persyaratan_beasiswa`
--

CREATE TABLE `persyaratan_beasiswa` (
  `id` int(11) NOT NULL,
  `beasiswa_id` int(11) DEFAULT NULL,
  `persyaratan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `persyaratan_pengajuan`
--

CREATE TABLE `persyaratan_pengajuan` (
  `id` int(11) NOT NULL,
  `pengajuan_id` int(11) DEFAULT NULL,
  `persyaratan_id` int(11) DEFAULT NULL,
  `tanggal_upload` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nama_file` varchar(255) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id` int(11) NOT NULL,
  `nama_prodi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id`, `nama_prodi`) VALUES
(1, 'Teknik Informatika'),
(4, 'Pendidikan Ekonomi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beasiswa`
--
ALTER TABLE `beasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_beasiswa`
--
ALTER TABLE `jenis_beasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendaftaran_pengguna`
--
ALTER TABLE `pendaftaran_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajuan_beasiswa`
--
ALTER TABLE `pengajuan_beasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persyaratan`
--
ALTER TABLE `persyaratan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persyaratan_beasiswa`
--
ALTER TABLE `persyaratan_beasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persyaratan_pengajuan`
--
ALTER TABLE `persyaratan_pengajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beasiswa`
--
ALTER TABLE `beasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jenis_beasiswa`
--
ALTER TABLE `jenis_beasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pendaftaran_pengguna`
--
ALTER TABLE `pendaftaran_pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `persyaratan`
--
ALTER TABLE `persyaratan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `persyaratan_beasiswa`
--
ALTER TABLE `persyaratan_beasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `persyaratan_pengajuan`
--
ALTER TABLE `persyaratan_pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
