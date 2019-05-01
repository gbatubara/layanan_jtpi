-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2019 at 09:47 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `email` varchar(35) NOT NULL,
  `password` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('adminjtpi@jtpi.itera.ac.id', '0a6d9a11baa9729b80784a5bb3f4f278');

-- --------------------------------------------------------

--
-- Stand-in structure for view `jam`
--
CREATE TABLE `jam` (
`WAKTU` varchar(10)
,`kode_prodi` int(6)
);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` int(10) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `password` varchar(35) DEFAULT NULL,
  `nama_mhs` varchar(35) DEFAULT NULL,
  `kode_prodi` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `email`, `password`, `nama_mhs`, `kode_prodi`) VALUES
(14116039, 'gabriel.14116039@student.itera.ac.id', '25f9e794323b453885f5181f1b624d0b', 'Gabriel Batubara', 3),
(14116059, 'yohanes.14116059@student.itera.ac.id', '25d55ad283aa400af464c76d713c07ad', 'yohanes eloi pardamean manik', 3);

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
(1, 14116039, 'Gabriel Batubara', 3, 'Kostan', 'Jl. Lapas', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_perizinan`
--

CREATE TABLE `tbl_perizinan` (
  `id` int(11) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `Nim` int(10) NOT NULL,
  `kode_prodi` int(6) NOT NULL,
  `Nama_kegiatan` varchar(30) NOT NULL,
  `Agenda` varchar(30) NOT NULL,
  `Tempat` varchar(30) NOT NULL,
  `Tanggal` date NOT NULL,
  `Waktu` time(4) NOT NULL,
  `Namapj` varchar(30) NOT NULL,
  `Jabatanpj` varchar(30) NOT NULL,
  `Aksi` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_perizinan`
--

INSERT INTO `tbl_perizinan` (`id`, `Nama`, `Nim`, `kode_prodi`, `Nama_kegiatan`, `Agenda`, `Tempat`, `Tanggal`, `Waktu`, `Namapj`, `Jabatanpj`, `Aksi`) VALUES
(3, 'Gabriel Batubara', 14116039, 7, 'asd', 'asd', 'asd', '2019-05-16', '09:59:00.0000', 'asd', 'asd', 0),
(4, 'Gabriel Batubara', 14116039, 8, 'asd', 'asds', 'asd', '2019-05-14', '02:57:00.0000', 'fdfd', 'dsfsdfsgd', 0),
(5, 'yohanes eloi pardamean manik', 14116059, 6, 'asddsad', 'asdsasd', '123123', '2019-05-16', '12:33:00.0000', 'gfdgdf', 'dfgdfgdf', 0);

-- --------------------------------------------------------

--
-- Structure for view `jam`
--
DROP TABLE IF EXISTS `jam`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jam`  AS  select time_format(`tbl_perizinan`.`Waktu`,'%H:%i') AS `WAKTU`,`tbl_perizinan`.`kode_prodi` AS `kode_prodi` from `tbl_perizinan` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

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
-- Indexes for table `tbl_perizinan`
--
ALTER TABLE `tbl_perizinan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kd_prodi` (`kode_prodi`),
  ADD KEY `status` (`Aksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_kp`
--
ALTER TABLE `tbl_kp`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_perizinan`
--
ALTER TABLE `tbl_perizinan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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

--
-- Constraints for table `tbl_perizinan`
--
ALTER TABLE `tbl_perizinan`
  ADD CONSTRAINT `tbl_perizinan_ibfk_1` FOREIGN KEY (`kode_prodi`) REFERENCES `prodi` (`kode_prodi`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_perizinan_ibfk_2` FOREIGN KEY (`aksi`) REFERENCES `status` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
