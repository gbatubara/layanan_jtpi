-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Mar 2019 pada 04.45
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jtpi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `izinkegiatan_jadwal`
--

CREATE TABLE `izinkegiatan_jadwal` (
  `kd_izin_kegiatan` int(4) NOT NULL,
  `waktu_pengambilan` datetime NOT NULL,
  `waktu_berakhir` datetime NOT NULL,
  `status_jadwal` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `izin_kegiatan`
--

CREATE TABLE `izin_kegiatan` (
  `kd_izin_kegiatan` int(4) NOT NULL,
  `nama_kegiatan` varchar(35) NOT NULL,
  `waktu_kegiatan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kp`
--

CREATE TABLE `kp` (
  `kd_kp` int(4) NOT NULL,
  `nama_instansi` varchar(50) NOT NULL,
  `alamat_instansi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kp_jadwal`
--

CREATE TABLE `kp_jadwal` (
  `kd_kp` int(4) NOT NULL,
  `waktu_pengambilan` datetime NOT NULL,
  `waktu_berakhir` datetime NOT NULL,
  `status_jadwal` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL,
  `kd_prodi` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa_izinkegiatan`
--

CREATE TABLE `mahasiswa_izinkegiatan` (
  `kd_izin_kegiatan` int(4) NOT NULL,
  `nim` int(10) NOT NULL,
  `status_berkas` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa_kp`
--

CREATE TABLE `mahasiswa_kp` (
  `kd_kp` int(4) NOT NULL,
  `nim` int(10) NOT NULL,
  `status_berkas` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `kd_prodi` int(7) NOT NULL,
  `ketua_prodi` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `izinkegiatan_jadwal`
--
ALTER TABLE `izinkegiatan_jadwal`
  ADD PRIMARY KEY (`kd_izin_kegiatan`);

--
-- Indeks untuk tabel `izin_kegiatan`
--
ALTER TABLE `izin_kegiatan`
  ADD PRIMARY KEY (`kd_izin_kegiatan`);

--
-- Indeks untuk tabel `kp`
--
ALTER TABLE `kp`
  ADD PRIMARY KEY (`kd_kp`);

--
-- Indeks untuk tabel `kp_jadwal`
--
ALTER TABLE `kp_jadwal`
  ADD PRIMARY KEY (`kd_kp`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `kd_prodi` (`kd_prodi`);

--
-- Indeks untuk tabel `mahasiswa_izinkegiatan`
--
ALTER TABLE `mahasiswa_izinkegiatan`
  ADD PRIMARY KEY (`kd_izin_kegiatan`),
  ADD KEY `nim` (`nim`);

--
-- Indeks untuk tabel `mahasiswa_kp`
--
ALTER TABLE `mahasiswa_kp`
  ADD PRIMARY KEY (`kd_kp`),
  ADD KEY `nim` (`nim`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`kd_prodi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `izin_kegiatan`
--
ALTER TABLE `izin_kegiatan`
  MODIFY `kd_izin_kegiatan` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kp`
--
ALTER TABLE `kp`
  MODIFY `kd_kp` int(4) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `izinkegiatan_jadwal`
--
ALTER TABLE `izinkegiatan_jadwal`
  ADD CONSTRAINT `izinkegiatan_jadwal_ibfk_1` FOREIGN KEY (`kd_izin_kegiatan`) REFERENCES `izin_kegiatan` (`kd_izin_kegiatan`);

--
-- Ketidakleluasaan untuk tabel `kp_jadwal`
--
ALTER TABLE `kp_jadwal`
  ADD CONSTRAINT `kp_jadwal_ibfk_1` FOREIGN KEY (`kd_kp`) REFERENCES `kp` (`kd_kp`);

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`kd_prodi`) REFERENCES `prodi` (`kd_prodi`);

--
-- Ketidakleluasaan untuk tabel `mahasiswa_izinkegiatan`
--
ALTER TABLE `mahasiswa_izinkegiatan`
  ADD CONSTRAINT `mahasiswa_izinkegiatan_ibfk_1` FOREIGN KEY (`kd_izin_kegiatan`) REFERENCES `izin_kegiatan` (`kd_izin_kegiatan`),
  ADD CONSTRAINT `mahasiswa_izinkegiatan_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);

--
-- Ketidakleluasaan untuk tabel `mahasiswa_kp`
--
ALTER TABLE `mahasiswa_kp`
  ADD CONSTRAINT `mahasiswa_kp_ibfk_1` FOREIGN KEY (`kd_kp`) REFERENCES `kp` (`kd_kp`),
  ADD CONSTRAINT `mahasiswa_kp_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
