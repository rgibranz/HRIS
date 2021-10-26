-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Okt 2021 pada 09.58
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hris`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cuti`
--

CREATE TABLE `cuti` (
  `id_cuti` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `nama_users` varchar(100) DEFAULT NULL,
  `nama_divisi` varchar(255) DEFAULT NULL,
  `mulai_bekerja` varchar(100) DEFAULT NULL,
  `jenis_cuti` varchar(100) DEFAULT NULL,
  `lokasi_cuti` varchar(100) DEFAULT NULL,
  `lama_cuti` varchar(35) DEFAULT NULL,
  `sisa_cuti` int(11) DEFAULT NULL,
  `mulai_tanggal` date DEFAULT NULL,
  `sampai_tanggal` date DEFAULT NULL,
  `keterangan_cuti` text DEFAULT NULL,
  `tgl_pengajuan` date DEFAULT NULL,
  `status_manajer` varchar(20) NOT NULL,
  `keterangan_manajer` text DEFAULT NULL,
  `nama_direktur` varchar(255) DEFAULT NULL,
  `status_direktur` varchar(20) NOT NULL,
  `keterangan_direktur` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id_cuti`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
