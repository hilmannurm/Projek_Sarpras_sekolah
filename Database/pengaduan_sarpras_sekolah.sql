-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20260118.0ae02437ae
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 09, 2026 at 03:43 PM
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
  `status` enum('diproses','diperbaiki','selesai') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `umpan_balik` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_aspirasi`
--

INSERT INTO `tb_aspirasi` (`id_aspirasi`, `id_siswa`, `id_kategori`, `judul_laporan`, `keterangan`, `lokasi`, `bukti_foto`, `tanggal_dikirim`, `status`, `umpan_balik`) VALUES
(11, 1, 12, 'keran air rusak', 'tutup keran airnya rusak, jadi air keluar trus menerus', 'toilet dekat mushola', '1788916154_IMG-20240321-WA0038.jpg', '2026-09-09 01:09:14', 'selesai', 'sudah beres'),
(12, 1, 11, 'papan tulis rusak', 'papan tulis tidak layak digunakan', 'ruang kelas XII RPL 2', '1788916819_IMG-20240321-WA0038.jpg', '2026-09-09 01:20:19', 'selesai', 'papan tulis sudah diganti dengan yang baru'),
(13, 2, 11, 'meja kelas rusak', 'meja kelas rusak saat dipakai goyang mejanya', 'ruang kelas XII RPL 2', '1788967987_Porsche.jpeg', '2026-09-09 15:33:07', 'diperbaiki', 'meja akan segera diganti');

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
(17, 12, 1, 'diproses', 'diperbaiki', '2026-09-09 01:49:23'),
(18, 12, 1, 'diperbaiki', 'selesai', '2026-09-09 13:51:28'),
(19, 11, 1, 'diproses', 'diperbaiki', '2026-09-09 15:36:08'),
(20, 11, 1, 'diperbaiki', 'selesai', '2026-09-09 15:36:28'),
(21, 13, 1, 'diproses', 'diperbaiki', '2026-09-09 15:39:16');

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
(12, 'Fasilitas Umum');

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
(17, 12, 1, 'diperbaiki', '1788918563_IMG-20240321-WA0040.jpg', '2026-09-09 01:49:23'),
(18, 12, 1, 'selesai', '1788961888_upscalemedia-transformed.jpeg', '2026-09-09 13:51:28'),
(19, 11, 1, 'diperbaiki', '1788968168_pesawat.jpeg', '2026-09-09 15:36:08'),
(20, 11, 1, 'selesai', '1788968188_WIN_20260506_11_55_14_Pro.jpg', '2026-09-09 15:36:28'),
(21, 13, 1, 'diperbaiki', '1788968356_upscalemedia-transformed.jpeg', '2026-09-09 15:39:16');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int NOT NULL,
  `nis` int NOT NULL,
  `nama_siswa` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nis`, `nama_siswa`, `kelas`, `password`) VALUES
(1, 12345, 'M Malvien Ramadhan S', 'XII RPL 2', '$2a$12$0D1JKIxd6CD1xQ2CghW1g.SZCLyN29VN7uuJNiv78t/jI/e/Ri9Dm'),
(2, 1234, 'Rezka Parsha A', 'XII RPL 2', '$2y$12$xmgVdymu7938CjY9sXV2DePb5xEv65BBepdRxIjuoXugZi8oO.S.a'),
(3, 1003, 'Budi Santoso', 'XI RPL 2', '123456'),
(4, 1004, 'Citra Lestari', 'XI RPL 2', '123456'),
(5, 1005, 'Dimas Pratama', 'X RPL 1', '123456'),
(6, 1006, 'Fajar Ramadhan', 'X RPL 1', '123456'),
(7, 1007, 'Nabila Putri', 'X RPL 2', '123456'),
(8, 1008, 'Rizky Maulana', 'X RPL 2', '123456'),
(9, 1009, 'Aulia Rahma', 'XII RPL 1', '123456'),
(10, 1010, 'Galih Saputra', 'XII RPL 1', '123456');

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
  MODIFY `id_aspirasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_histori`
--
ALTER TABLE `tb_histori`
  MODIFY `id_histori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_progres`
--
ALTER TABLE `tb_progres`
  MODIFY `id_progres` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
