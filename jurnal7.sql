-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2018 at 07:03 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jurnal7`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `NIM` varchar(10) NOT NULL,
  `Nama` varchar(35) NOT NULL,
  `Tgl_Lahir` date NOT NULL,
  `Jk` enum('L','P') NOT NULL,
  `Prodi` enum('D3 Teknik Telekomunikasi','D3 Teknik Informatika','D3 Manajemen Informatika','D3 Manajemen Pemasaran','D3 Perhotelan','D4 Sistem Multimedia') NOT NULL,
  `Fakultas` enum('Fakultas Teknik Elektro','Fakultas Teknik Informatika','Fakultas Rekayasa Industri','Fakultas Industri Kreatif','Fakultas Komunikasi Bisnis','Fakultas Ilmu Terapan') NOT NULL,
  `Asal` varchar(25) NOT NULL,
  `Motto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`NIM`, `Nama`, `Tgl_Lahir`, `Jk`, `Prodi`, `Fakultas`, `Asal`, `Motto`) VALUES
('6701170104', 'Niah Jelek Banget', '1997-01-20', 'P', 'D3 Perhotelan', 'Fakultas Industri Kreatif', 'Kepanjen Malang', 'Lif is a choice '),
('6701171069', 'Fitria Riadatul Chusniah', '1998-01-30', 'P', 'D3 Manajemen Informatika', 'Fakultas Ilmu Terapan', 'Malang', 'No Gain Without Pain');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`NIM`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
