-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2020 at 08:19 AM
-- Server version: 5.7.14
-- PHP Version: 7.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `covid19db`
--

-- --------------------------------------------------------

--
-- Table structure for table `sebaran`
--

CREATE TABLE IF NOT EXISTS `sebaran` (
  `id_kecamatan` varchar(10) NOT NULL,
  `odp` int(11) NOT NULL,
  `pdp` int(11) NOT NULL,
  `positif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sebaran`
--

INSERT INTO `sebaran` (`id_kecamatan`, `odp`, `pdp`, `positif`) VALUES
('52_7_1', 1, 1, 0),
('52_7_2', 2, 0, 0),
('52_7_3', 3, 4, 1),
('52_7_4', 3, 0, 0),
('52_7_5', 4, 5, 0),
('52_7_6', 2, 0, 0),
('52_7_7', 2, 6, 1),
('52_7_8', 3, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tiger_kecamatan`
--

CREATE TABLE IF NOT EXISTS `tiger_kecamatan` (
  `id` char(13) NOT NULL,
  `kecamatan` varchar(300) NOT NULL DEFAULT '',
  `kode_kecamatan` varchar(10) DEFAULT NULL,
  `id_kota` char(13) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `kordinat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tiger_kecamatan`
--

INSERT INTO `tiger_kecamatan` (`id`, `kecamatan`, `kode_kecamatan`, `id_kota`, `urutan`, `kordinat`) VALUES
('52_7_1', 'JEREWEH', '52_7_1', '52_7', NULL, ''),
('52_7_2', 'TALIWANG', '52_7_2', '52_7', NULL, ''),
('52_7_3', 'SETELUK', '52_7_3', '52_7', NULL, ''),
('52_7_4', 'SEKONGKANG', '52_7_4', '52_7', NULL, ''),
('52_7_5', 'BRANG REA', '52_7_5', '52_7', NULL, ''),
('52_7_6', 'POTO TANO', '52_7_6', '52_7', NULL, ''),
('52_7_7', 'BRANG ENE', '52_7_7', '52_7', NULL, ''),
('52_7_8', 'MALUK', '52_7_8', '52_7', NULL, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sebaran`
--
ALTER TABLE `sebaran`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `tiger_kecamatan`
--
ALTER TABLE `tiger_kecamatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kotaidx` (`id_kota`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
