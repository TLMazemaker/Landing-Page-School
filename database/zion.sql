-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2023 at 03:57 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zion`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin@admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jeniskelamin` enum('L','P') NOT NULL,
  `nik` bigint(16) NOT NULL,
  `tempatlahir` varchar(100) NOT NULL,
  `tanggallahir` date NOT NULL,
  `anakke` int(2) NOT NULL,
  `saudarakandung` int(2) NOT NULL,
  `saudaratiri` int(2) NOT NULL,
  `tinggibadan` int(3) NOT NULL,
  `beratbadan` int(3) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `rt` varchar(1) NOT NULL,
  `rw` varchar(1) NOT NULL,
  `jenistinggal` varchar(20) NOT NULL,
  `transportasi` varchar(30) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `handphone` varchar(15) NOT NULL,
  `asalsekolah` enum('SMP Zion','SMP Lainnya') NOT NULL,
  `namasekolah` varchar(100) NOT NULL,
  `provinsi` varchar(20) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `kecamatan` varchar(20) NOT NULL,
  `namaibu` varchar(255) NOT NULL,
  `kerjaibu` varchar(20) NOT NULL,
  `penghasilanibu` varchar(20) NOT NULL,
  `hpibu` varchar(15) NOT NULL,
  `namaayah` varchar(255) NOT NULL,
  `kerjaayah` varchar(20) NOT NULL,
  `penghasilanayah` varchar(20) NOT NULL,
  `hpayah` varchar(15) NOT NULL,
  `namawali` varchar(255) NOT NULL,
  `kerjawali` varchar(20) NOT NULL,
  `penghasilanwali` varchar(20) NOT NULL,
  `hpwali` varchar(15) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `semestersatu` varchar(255) NOT NULL,
  `semesterdua` varchar(255) NOT NULL,
  `aktakelahiran` varchar(255) NOT NULL,
  `kartukeluarga` varchar(255) NOT NULL,
  `ktpayah` varchar(255) NOT NULL,
  `ktpibu` varchar(255) NOT NULL,
  `ktpwali` varchar(255) NOT NULL,
  `gkka` varchar(255) NOT NULL,
  `keteranganranking` varchar(255) NOT NULL,
  `status` enum('No','Yes') NOT NULL DEFAULT 'No',
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
