-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20260118.0ae02437ae
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 19, 2026 at 04:09 AM
-- Server version: 8.4.3
-- PHP Version: 8.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan_sarpras_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `nama_lengkap`, `password`) VALUES
(1, 'hilman', 'Hilman Nur Maulana', '$2a$12$dsSSlRo9OAwcBLJ11S9zaeD2j5IOPznygc17BXN5A6y7d9fkRgDTm'),
(2, 'admin02', 'Admin Dua', 'admin123'),
(3, 'admin03', 'Admin Tiga', 'admin123'),
(4, 'admin04', 'Admin Empat', 'admin123'),
(5, 'admin05', 'Admin Lima', 'admin123'),
(6, 'admin06', 'Admin Enam', 'admin123'),
(7, 'admin07', 'Admin Tujuh', 'admin123'),
(8, 'admin08', 'Admin Delapan', 'admin123'),
(9, 'admin09', 'Admin Sembilan', 'admin123'),
(10, 'admin10', 'Admin Sepuluh', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `tb_aspirasi`
--

CREATE TABLE `tb_aspirasi` (
  `id_aspirasi` int NOT NULL,
  `id_siswa` int NOT NULL,
  `id_kategori` int NOT NULL,
  `judul_laporan` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `lokasi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `bukti_foto` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tanggal_dikirim` timestamp NOT NULL,
  `status` enum('menunggu','diproses','selesai','ditolak') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'menunggu',
  `umpan_balik` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_aspirasi`
--

INSERT INTO `tb_aspirasi` (`id_aspirasi`, `id_siswa`, `id_kategori`, `judul_laporan`, `keterangan`, `lokasi`, `bukti_foto`, `tanggal_dikirim`, `status`, `umpan_balik`) VALUES
(21, 1, 12, 'kipas rusak', 'kipas rusak sehingga tidak bisa digunakan', 'ruang kelas XII RPL 2', '1792381817_download (1).jpeg', '2026-10-19 03:50:17', 'selesai', 'sudah bisa digunakan kembali'),
(22, 2, 11, 'papan tulis sudah kusam dan kotor menempel', 'papan tulis sudah usang sehingga sulit membaca tulisan yang ada di papan tulis', 'ruang kelas XII RPL 2', '1792382157_669769775855985080.jpeg', '2026-10-19 03:55:57', 'menunggu', NULL),
(23, 3, 12, 'kaca pecah', 'kaca ruangan uks pecah', 'UKS', '1792382522_broken window_.jpeg', '2026-10-19 04:02:02', 'ditolak', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_histori`
--

CREATE TABLE `tb_histori` (
  `id_histori` int NOT NULL,
  `id_aspirasi` int NOT NULL,
  `id_admin` int NOT NULL,
  `status_lama` varchar(30) NOT NULL,
  `status_baru` varchar(30) NOT NULL,
  `tanggal_perubahan` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_histori`
--

INSERT INTO `tb_histori` (`id_histori`, `id_aspirasi`, `id_admin`, `status_lama`, `status_baru`, `tanggal_perubahan`) VALUES
(23, 21, 1, 'menunggu', 'diproses', '2026-10-19 03:51:13'),
(24, 21, 1, 'diproses', 'selesai', '2026-10-19 03:51:48'),
(25, 23, 1, 'menunggu', 'ditolak', '2026-10-19 04:02:40');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(11, 'Fasilitas pembelajaran'),
(12, 'Fasilitas Umum'),
(19, 'Keluhan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_progres`
--

CREATE TABLE `tb_progres` (
  `id_progres` int NOT NULL,
  `id_aspirasi` int NOT NULL,
  `id_admin` int NOT NULL,
  `tahap_progres` enum('diproses','diperbaiki','selesai') NOT NULL,
  `foto_bukti` varchar(100) NOT NULL,
  `tanggal_progres` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_progres`
--

INSERT INTO `tb_progres` (`id_progres`, `id_aspirasi`, `id_admin`, `tahap_progres`, `foto_bukti`, `tanggal_progres`) VALUES
(5, 21, 1, 'diproses', '1792381873_698620960982535179.jpeg', '2026-10-19 03:51:13'),
(6, 21, 1, 'selesai', '1792381908_260434790940533455.jpeg', '2026-10-19 03:51:48');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int NOT NULL,
  `nis` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama_siswa` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nis`, `nama_siswa`, `kelas`, `password`) VALUES
(1, '0123456789', 'M Malvien Ramadhan S', 'XII RPL 2', '$2y$12$86GpWeXYXeDxwpvCetfVxempaJHYlu08eMWejRVYA/p3fQrGSaQJS'),
(2, '1234567890', 'Rezka Parsha A', 'XII RPL 2', '$2y$12$WOJM.PGEWJVXbpgmahUs7.RjESKu2D454vmVLDlkIWq8qVmSDSXRK'),
(3, '0012345678', 'Razaqa Artha P', 'XII RPL 2', '$2y$12$Fn20G3qM0mgCb6EFbRkN6.E7bPQBT4ntx51J9xurhR3l.ymDMoeZm'),
(4, '10002', 'Alfian Rizki N', 'XII RPL 2', 'siswa123'),
(5, '10003', 'Eka Santika', 'XII RPL 2', 'siswa123'),
(6, '10004', 'Fajar Rizki R', 'XII RPL 2', 'siswa123'),
(44, '10005', 'gilang Putra Pratama', 'XII RPL 2', '$2y$12$YqCDmadcW0bZMBn1OThLCOG9yugQ1PvHG9KkxLgX8mkGsGywiJoWe'),
(45, '10006', 'Shintia Maharani', 'XII RPL 2', '$2y$12$vh.gYsVo8W34TWP2pQagsennb1tXt8bQGJjMDqZSi8VUmZ4KoD3em'),
(46, '10007', 'Budi Santoso', 'XII RPL 2', '$2y$12$wHpQ0fc73v5u4o9W5e8Hte4V4G9F9LuSiNnHDjxncrmr/JRLTYJwu'),
(47, '10008', 'vell u', 'XII RPL 2', '$2y$12$fj8E99dQZCbFsrUpjmDcpO2YZhzpNlD1prpyxCTo/SYEtRy7TgKjm'),
(48, '10009', 'mauru', 'XII RPL 2', '$2y$12$4clV9jfGXhrE0YuLMHP3feusomZr2uNVaCUBlJU7XLHDJUfz4Zrue'),
(49, '10010', 'tralelo', 'XII RPL 2', '$2y$12$0AwviaGOsRA5uBBiUsjCVe2WuQklTQYpOVUcc59G/z6Ng788nO.q2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_aspirasi`
--
ALTER TABLE `tb_aspirasi`
  ADD PRIMARY KEY (`id_aspirasi`),
  ADD KEY `id_siswa` (`id_siswa`,`id_kategori`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `tb_histori`
--
ALTER TABLE `tb_histori`
  ADD PRIMARY KEY (`id_histori`),
  ADD KEY `id_aspirasi` (`id_aspirasi`,`id_admin`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_progres`
--
ALTER TABLE `tb_progres`
  ADD PRIMARY KEY (`id_progres`),
  ADD KEY `id_aspirasi` (`id_aspirasi`,`id_admin`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_aspirasi`
--
ALTER TABLE `tb_aspirasi`
  MODIFY `id_aspirasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_histori`
--
ALTER TABLE `tb_histori`
  MODIFY `id_histori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_progres`
--
ALTER TABLE `tb_progres`
  MODIFY `id_progres` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_aspirasi`
--
ALTER TABLE `tb_aspirasi`
  ADD CONSTRAINT `tb_aspirasi_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `tb_siswa` (`id_siswa`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_aspirasi_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `tb_histori`
--
ALTER TABLE `tb_histori`
  ADD CONSTRAINT `tb_histori_ibfk_1` FOREIGN KEY (`id_aspirasi`) REFERENCES `tb_aspirasi` (`id_aspirasi`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_histori_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id_admin`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `tb_progres`
--
ALTER TABLE `tb_progres`
  ADD CONSTRAINT `tb_progres_ibfk_1` FOREIGN KEY (`id_aspirasi`) REFERENCES `tb_aspirasi` (`id_aspirasi`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_progres_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id_admin`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
