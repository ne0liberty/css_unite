-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2022 at 06:07 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `latihan`
--

-- --------------------------------------------------------

--
-- Table structure for table `latihan_autofill`
--

CREATE TABLE `latihan_autofill` (
  `nim` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jeniskelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `jurusan` enum('SI','ST') NOT NULL,
  `notelp` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `latihan_autofill`
--

INSERT INTO `latihan_autofill` (`nim`, `nama`, `jeniskelamin`, `jurusan`, `notelp`, `email`, `alamat`) VALUES
('123456', 'Gustaf Kusuma Pradana', 'Laki-Laki', 'ST', '09876443689', 'gustaf@css.com', 'asdas'),
('223425', 'Arif sundawan', 'Laki-Laki', 'ST', '08836y435', 'qefqfqef', 'qfqef');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `latihan_autofill`
--
ALTER TABLE `latihan_autofill`
  ADD PRIMARY KEY (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
