-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2016 at 11:40 AM
-- Server version: 10.1.8-MariaDB-log
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kepindahan`
--

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  `aksi` varchar(255) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `role`, `aksi`, `tanggal`) VALUES
(1, 'warga', 'Input Form Dalam', '2016-05-15 17:00:00'),
(2, 'kelurahan', 'Verifikasi Dalam', '2016-05-15 17:00:00'),
(3, 'kecamatan', 'Verifikasi Dalam', '2016-05-15 17:00:00'),
(4, 'warga', 'Input Form Dalam', '2016-05-15 17:00:00'),
(5, 'kelurahan', 'Reject Dalam', '2016-05-15 17:00:00'),
(6, 'warga', 'Input Form Datang', '2016-05-15 17:00:00'),
(7, 'kelurahan', 'Reject Datang', '2016-05-15 17:00:00'),
(8, 'warga', 'Input Form Keluar', '2016-05-15 17:00:00'),
(9, 'kelurahan', 'Reject Keluar', '2016-05-15 17:00:00'),
(10, 'disdukcapil', 'Verifikasi Dalam', '2016-05-15 17:00:00'),
(11, 'warga', 'Input Form Dalam', '2016-05-16 17:00:00'),
(12, 'warga', 'Input Form Dalam', '2016-05-16 17:00:00'),
(13, 'kelurahan', 'Verifikasi Dalam', '2016-05-16 17:00:00'),
(14, 'kecamatan', 'Verifikasi Dalam', '2016-05-16 17:00:00'),
(15, 'disdukcapil', 'Verifikasi Dalam', '2016-05-16 17:00:00'),
(16, 'warga', 'Input Form Datang', '2016-05-16 17:00:00'),
(17, 'warga', 'Input Form Datang', '2016-05-16 17:00:00'),
(18, 'warga', 'Input Form Datang', '2016-05-16 17:00:00'),
(19, 'warga', 'Input Form Dalam', '2016-05-16 17:00:00'),
(20, 'kelurahan', 'Verifikasi Dalam', '2016-05-16 17:00:00'),
(21, 'kecamatan', 'Verifikasi Dalam', '2016-05-16 17:00:00'),
(22, 'disdukcapil', 'Verifikasi Dalam', '2016-05-16 17:00:00'),
(23, 'warga', 'Input Form Dalam', '2016-05-16 17:00:00'),
(24, 'kelurahan', 'Verifikasi Dalam', '2016-05-16 17:00:00'),
(25, 'kelurahan', 'Reject Datang', '2016-05-16 17:00:00'),
(26, 'warga', 'Input Form Dalam', '2016-05-16 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pindah_dalam_kota`
--

CREATE TABLE `pindah_dalam_kota` (
  `id` int(7) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nomor_kk` varchar(16) NOT NULL,
  `asal_kota` varchar(30) NOT NULL,
  `asal_kecamatan` varchar(30) NOT NULL,
  `asal_kelurahan` varchar(30) NOT NULL,
  `asal_rw` int(3) NOT NULL,
  `asal_rt` int(3) NOT NULL,
  `asal_alamat` varchar(100) NOT NULL,
  `tujuan_kota` varchar(30) NOT NULL,
  `tujuan_kecamatan` varchar(30) NOT NULL,
  `tujuan_kelurahan` varchar(30) NOT NULL,
  `tujuan_rw` int(3) NOT NULL,
  `tujuan_rt` int(3) NOT NULL,
  `tujuan_alamat` varchar(100) NOT NULL,
  `waktu` date NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pindah_dalam_kota`
--

INSERT INTO `pindah_dalam_kota` (`id`, `nik`, `nomor_kk`, `asal_kota`, `asal_kecamatan`, `asal_kelurahan`, `asal_rw`, `asal_rt`, `asal_alamat`, `tujuan_kota`, `tujuan_kecamatan`, `tujuan_kelurahan`, `tujuan_rw`, `tujuan_rt`, `tujuan_alamat`, `waktu`, `verified`) VALUES
(1, '1111111111111111', '1', 'Bandung', 'Coblong', 'Dago', 5, 5, 'Jl. Juanda', 'Bandung', 'Sukajadi', 'Sekeloa Selatan', 6, 6, 'Jl. Sekeloa', '2016-05-17', 3),
(2, '1111111111111111', '1', 'Bandung', 'Coblong', 'Dago', 5, 5, 'Jl. Juanda', 'Bandung', 'Sukajadi', 'Sekeloa Selatan', 6, 6, 'Jl. Sekeloa', '2016-05-17', 3),
(3, '1111111111111111', '1', 'Bandung', 'Coblong', 'Dago', 5, 5, 'Jl. Juanda', 'Bandung', 'Coblong', 'Dago 2', 6, 6, 'Jl. Sekeloa', '2016-05-17', 3),
(4, '99999', '1', 'Bandung', 'a', 'a', 1, 1, 'a', 'Bandung', 'b', 'b', 2, 2, 'b', '2016-05-17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pindah_datang`
--

CREATE TABLE `pindah_datang` (
  `id` int(7) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nomor_kk` varchar(16) NOT NULL,
  `asal_kota` varchar(30) NOT NULL,
  `asal_kecamatan` varchar(30) NOT NULL,
  `asal_kelurahan` varchar(30) NOT NULL,
  `asal_rw` int(3) NOT NULL,
  `asal_rt` int(3) NOT NULL,
  `asal_alamat` varchar(100) NOT NULL,
  `tujuan_kota` varchar(30) NOT NULL,
  `tujuan_kecamatan` varchar(30) NOT NULL,
  `tujuan_kelurahan` varchar(30) NOT NULL,
  `tujuan_rw` int(3) NOT NULL,
  `tujuan_rt` int(3) NOT NULL,
  `tujuan_alamat` varchar(100) NOT NULL,
  `waktu` date NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pindah_datang`
--

INSERT INTO `pindah_datang` (`id`, `nik`, `nomor_kk`, `asal_kota`, `asal_kecamatan`, `asal_kelurahan`, `asal_rw`, `asal_rt`, `asal_alamat`, `tujuan_kota`, `tujuan_kecamatan`, `tujuan_kelurahan`, `tujuan_rw`, `tujuan_rt`, `tujuan_alamat`, `waktu`, `verified`) VALUES
(1, '1111111111111111', '1', 'a', 'a', 'a', 1, 1, 'a', 'Bandung', 'b', 'b', 2, 2, 'b', '2016-05-17', -1),
(2, '1111111111111111', '1', 'a', 'a', 'a', 1, 1, 'a', 'Bandung', 'b', 'b', 2, 2, 'b', '2016-05-17', 3),
(3, '1111111111111111', '2', 'a', 'a', 'a', 1, 1, 'a', 'Bandung', 'b', 'b', 2, 2, 'b', '2016-05-17', -1);

-- --------------------------------------------------------

--
-- Table structure for table `pindah_keluar`
--

CREATE TABLE `pindah_keluar` (
  `id` int(7) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nomor_kk` varchar(16) NOT NULL,
  `asal_kota` varchar(30) NOT NULL,
  `asal_kecamatan` varchar(30) NOT NULL,
  `asal_kelurahan` varchar(30) NOT NULL,
  `asal_rw` int(3) NOT NULL,
  `asal_rt` int(3) NOT NULL,
  `asal_alamat` varchar(100) NOT NULL,
  `tujuan_kota` varchar(30) NOT NULL,
  `tujuan_kecamatan` varchar(30) NOT NULL,
  `tujuan_kelurahan` varchar(30) NOT NULL,
  `tujuan_rw` int(3) NOT NULL,
  `tujuan_rt` int(3) NOT NULL,
  `tujuan_alamat` varchar(100) NOT NULL,
  `waktu` date NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pindah_dalam_kota`
--
ALTER TABLE `pindah_dalam_kota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pindah_datang`
--
ALTER TABLE `pindah_datang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pindah_keluar`
--
ALTER TABLE `pindah_keluar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `pindah_dalam_kota`
--
ALTER TABLE `pindah_dalam_kota`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pindah_datang`
--
ALTER TABLE `pindah_datang`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pindah_keluar`
--
ALTER TABLE `pindah_keluar`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
