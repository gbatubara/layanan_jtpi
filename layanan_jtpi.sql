-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2019 at 05:00 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `layanan_jtpi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user` varchar(35) NOT NULL,
  `password` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` int(10) NOT NULL,
  `email` varchar(35) DEFAULT NULL,
  `password` varchar(35) DEFAULT NULL,
  `nama_mhs` varchar(35) DEFAULT NULL,
  `kode_prodi` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `email`, `password`, `nama_mhs`, `kode_prodi`) VALUES
(14116039, 'gabrielbatubara91@gmail.com', '202cb962ac59075b964b07152d234b70', 'gabriel', 3);

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `kode_prodi` int(6) NOT NULL,
  `nama_prodi` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`kode_prodi`, `nama_prodi`) VALUES
(1, 'Teknik Elektro'),
(2, 'Teknik Geofisika'),
(3, 'Teknik Informatika'),
(4, 'Teknik Mesin'),
(5, 'Teknik Industri'),
(6, 'Teknik Kimia'),
(7, 'Teknik Geologi'),
(8, 'Teknik Fisika'),
(9, 'Teknik Biosistem'),
(10, 'Teknik Sistem Energi'),
(11, 'Teknik Industri Pertanian'),
(12, 'Teknik Teknologi Pangan'),
(13, 'Teknik Pertambangan'),
(14, 'Teknik Material'),
(15, 'Teknik Telekomunikasi');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(6) NOT NULL,
  `nama_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `nama_status`) VALUES
(0, 'Diproses'),
(1, 'Diterima'),
(2, 'Ditolak');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kp`
--

CREATE TABLE `tbl_kp` (
  `id` int(6) NOT NULL,
  `Nim` int(10) DEFAULT NULL,
  `Nama` varchar(30) DEFAULT NULL,
  `kode_prodi` int(10) DEFAULT NULL,
  `Tempat_KP` varchar(50) DEFAULT NULL,
  `Alamat_KP` varchar(50) DEFAULT NULL,
  `Aksi` int(6) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kp`
--

INSERT INTO `tbl_kp` (`id`, `Nim`, `Nama`, `kode_prodi`, `Tempat_KP`, `Alamat_KP`, `Aksi`) VALUES
(1, 14116039, 'Gabriel Batubaa', 3, 'Kostan', 'Jl. Lapas', 0),
(3, 1234567, 'adfdgf', 2, 'aasdfgh', 'jhgfds', 0),
(4, 1234434, 'hgffdda', 9, 'asdghj', 'ygfcx', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `prodi` (`kode_prodi`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`kode_prodi`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kp`
--
ALTER TABLE `tbl_kp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_kp_ibfk_2` (`kode_prodi`),
  ADD KEY `Aksi` (`Aksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_kp`
--
ALTER TABLE `tbl_kp`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`kode_prodi`) REFERENCES `prodi` (`kode_prodi`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_kp`
--
ALTER TABLE `tbl_kp`
  ADD CONSTRAINT `tbl_kp_ibfk_2` FOREIGN KEY (`kode_prodi`) REFERENCES `prodi` (`kode_prodi`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_kp_ibfk_3` FOREIGN KEY (`Aksi`) REFERENCES `status` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
