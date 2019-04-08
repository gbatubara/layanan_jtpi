-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2019 at 07:54 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

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
  `prodi` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `email`, `password`, `nama_mhs`, `prodi`) VALUES
(14116039, 'gabrielbatubara91@gmail.com', '202cb962ac59075b964b07152d234b70', 'gabriel', 3),
(14116120, 'a@h', '0cc175b9c0f1b6a831c399e269772661', 'a', 3);

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
  `Prodi` int(10) DEFAULT NULL,
  `Tempat_KP` varchar(50) DEFAULT NULL,
  `Alamat_KP` varchar(50) DEFAULT NULL,
  `Aksi` int(6) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kp`
--

INSERT INTO `tbl_kp` (`id`, `Nim`, `Nama`, `Prodi`, `Tempat_KP`, `Alamat_KP`, `Aksi`) VALUES
(1, 14116039, 'Gabriel Batubaa', 3, 'Kostan', 'Jl. Lapas', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_name`
--

CREATE TABLE `tbl_name` (
  `id` int(11) NOT NULL,
  `lastName` varchar(25) NOT NULL,
  `firstName` varchar(25) NOT NULL,
  `birthdate` date NOT NULL,
  `contactNo` int(15) NOT NULL,
  `bio` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_name`
--

INSERT INTO `tbl_name` (`id`, `lastName`, `firstName`, `birthdate`, `contactNo`, `bio`) VALUES
(7, 'Santiago', 'Juanito', '1993-03-03', 112212313, 'qwerty '),
(8, 'a', 'a', '1199-01-01', 1, 'vd'),
(9, 'as', 'as', '1111-11-11', 0, 'as');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `prodi` varchar(250) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `zipcode`, `prodi`, `email`, `username`, `password`, `register_date`) VALUES
(4, 'as', '123', 'informatika', 'a@h', 'as', 'f970e2767d0cfe75876ea857f92e319b', '2019-04-02 01:36:24'),
(5, 'a', '113', 'geologi', 'geo@h', 'a', '0cc175b9c0f1b6a831c399e269772661', '2019-04-02 04:41:23'),
(6, 'yohanes', '1234', 'informatika', 'yo@h', 'yohanes', '493331a7321bf622460493a8cda5e4c4', '2019-04-02 04:50:38'),
(7, 'dio', '123', 'informatika', 'dio@h', 'dio', '27b205035c328b16d8c8329c4b41e87e', '2019-04-02 04:59:44'),
(8, 'asd', 'asd', '', 'asd@asd', 'asd', '7815696ecbf1c96e6894b779456d330e', '2019-04-05 00:35:53'),
(9, 'qw', '123', '', 'qw@qw', 'qw', '006d2143154327a64d86a264aea225f3', '2019-04-05 00:37:49');

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
  ADD KEY `prodi` (`prodi`);

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
  ADD KEY `Nim` (`Nim`),
  ADD KEY `tbl_kp_ibfk_2` (`Prodi`),
  ADD KEY `Aksi` (`Aksi`);

--
-- Indexes for table `tbl_name`
--
ALTER TABLE `tbl_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_kp`
--
ALTER TABLE `tbl_kp`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_name`
--
ALTER TABLE `tbl_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`prodi`) REFERENCES `prodi` (`kode_prodi`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_kp`
--
ALTER TABLE `tbl_kp`
  ADD CONSTRAINT `tbl_kp_ibfk_1` FOREIGN KEY (`Nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_kp_ibfk_2` FOREIGN KEY (`Prodi`) REFERENCES `prodi` (`kode_prodi`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_kp_ibfk_3` FOREIGN KEY (`Aksi`) REFERENCES `status` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
