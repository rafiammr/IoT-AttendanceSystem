-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2025 at 08:25 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absenrfid`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(20) NOT NULL,
  `nokartu` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_pulang` time NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `nokartu`, `tanggal`, `jam_masuk`, `jam_pulang`, `status`) VALUES
(23, '1911411814', '2023-11-24', '19:04:43', '19:11:17', 'Present'),
(24, '1311291814', '2023-11-24', '19:04:51', '19:11:13', 'Present'),
(25, '83199107169', '2023-11-24', '19:05:07', '19:11:11', 'Present'),
(26, '1951755316', '2023-11-24', '19:05:39', '19:11:39', 'Present'),
(27, '1151262817', '2023-11-24', '19:07:59', '19:11:07', 'Late'),
(28, '1311587616', '2023-11-24', '19:12:05', '19:12:11', 'Absent'),
(29, '1311291814', '2023-11-27', '21:38:26', '23:01:31', 'Present'),
(30, '1151262817', '2023-11-27', '23:00:20', '23:01:27', 'Late'),
(31, '1951755316', '2023-11-27', '23:02:30', '23:02:34', 'Absent'),
(32, '1311587616', '2023-11-27', '23:11:56', '23:14:34', 'Present'),
(33, '83199107169', '2023-11-27', '23:13:06', '23:14:38', 'Late'),
(34, '1911411814', '2023-11-27', '23:14:05', '23:14:09', 'Absent'),
(35, '672520248', '2023-11-27', '23:15:34', '23:15:38', 'Absent'),
(43, '1311587616', '2023-11-30', '09:33:44', '09:37:06', 'Present'),
(44, '83199107169', '2023-11-30', '09:33:52', '09:37:24', 'Present'),
(45, '1951594617', '2023-11-30', '09:35:30', '00:00:00', 'Late'),
(46, '1311291814', '2023-11-30', '09:37:46', '00:00:00', 'Absent'),
(47, '672520248', '2023-12-07', '13:05:47', '00:00:00', 'Present'),
(48, '1311291814', '2023-12-07', '13:21:18', '00:00:00', 'Present'),
(49, '197215813', '2023-12-07', '13:23:00', '13:24:20', 'Present'),
(50, '83199107169', '2023-12-07', '13:23:46', '00:00:00', 'Late'),
(51, '1951755316', '2023-12-07', '13:24:43', '13:24:53', 'Absent');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(20) NOT NULL,
  `nokartu` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `NIM` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nokartu`, `nama`, `NIM`) VALUES
(5, '83199107169', 'Rheza Pramuditha Dewangga', '123210150'),
(6, '1911411814', 'Muhammad Fachrul Ghifari', '123210144'),
(7, '1311291814', 'Muhammad Rizky', '123210035'),
(9, '1951755316', 'Rafli Kavarera', '123210131'),
(10, '1151262817', 'Beneditus Irvanda Nugroho', '123210138'),
(11, '1311587616', 'Rafi Ammar Dinata', '123210145'),
(13, '672520248', 'Dimas Isya Saputra', '123210143'),
(15, '197215813', 'Mario', '1231201555');

-- --------------------------------------------------------

--
-- Table structure for table `tmprfid`
--

CREATE TABLE `tmprfid` (
  `nokartu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmprfid`
--
ALTER TABLE `tmprfid`
  ADD PRIMARY KEY (`nokartu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
