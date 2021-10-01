-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Okt 2021 pada 06.08
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
  `id_karyawan` int(11) NOT NULL,
  `nama_karyawan` varchar(100) DEFAULT NULL,
  `mulai_bekerja` varchar(100) DEFAULT NULL,
  `jenis_cuti` varchar(100) DEFAULT NULL,
  `lama_cuti` varchar(35) DEFAULT NULL,
  `sisa_cuti` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `tgl_pengajuan` date DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `status_manajer` varchar(20) NOT NULL,
  `status_direktur` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cuti`
--

INSERT INTO `cuti` (`id_cuti`, `id_karyawan`, `nama_karyawan`, `mulai_bekerja`, `jenis_cuti`, `lama_cuti`, `sisa_cuti`, `tanggal`, `tgl_pengajuan`, `status`, `status_manajer`, `status_direktur`) VALUES
(20, 8, 'Rifki Raharjo', '11-06-2020', 'sakit', '2', NULL, '0000-00-00', '2021-09-30', 'accept', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int(11) NOT NULL,
  `nama_divisi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `nama_divisi`) VALUES
(1, 'Multimedia'),
(2, 'Divisi 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gaji`
--

CREATE TABLE `gaji` (
  `id_gaji` int(11) NOT NULL,
  `gaji_pokok` double DEFAULT NULL,
  `uang_makan` double DEFAULT NULL,
  `uang_transport` double DEFAULT NULL,
  `lain_ain` double DEFAULT NULL,
  `total_gaji` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama_karyawan` varchar(100) DEFAULT NULL,
  `tmpt_lahir` varchar(35) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat_ktp` text DEFAULT NULL,
  `alamat_domisili` text DEFAULT NULL,
  `no_hp` varchar(14) DEFAULT NULL,
  `no_hp_d` varchar(14) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `job` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` varchar(30) DEFAULT NULL,
  `gaji` text DEFAULT NULL,
  `img` text DEFAULT NULL,
  `sisa_cuti` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `tmpt_lahir`, `tgl_lahir`, `alamat_ktp`, `alamat_domisili`, `no_hp`, `no_hp_d`, `email`, `id_divisi`, `job`, `password`, `level`, `gaji`, `img`, `sisa_cuti`) VALUES
(7, 'test 10', 'jakarta', '2021-09-26', 'jalan', NULL, '0822297636384', '', 'androrif29@gmail.com', 1, 'magang', '$2y$10$i/bECnX5rtGqnObNObvVdulvXxiiGOob4zIYh3a7fwHTuwBbk/./C', 'admin', '0', '', NULL),
(8, 'Rifki Raharjo', 'jakarta', '2021-09-26', 'jalan 1', '', '029239541', '0825', 'user@user.com', 1, 'magang', '$2y$10$qD5kCVMSR7nOuPz/QpgPSeq6TJ0/Kxl0/i8twnltAV.HDiHt0Z95O', 'user', '0', '1632827314.jpg', 10),
(9, 'test 12', 'jakarta', '2021-09-27', 'jalan 12', NULL, '0822923', '', 'androrif31@gmail.com', 2, 'Fullstack', '$2y$10$wcT7nVNsV8Ugsd18GZzq4.rqnlQlVreOI6ALc77DUH9JPRt.375j2', 'user', '4500000', '', NULL),
(10, 'test 1', 'jakarta', '2021-09-28', 'jalan', NULL, '082222', '', 'androrif32@gmail.com', 3, 'test', '$2y$10$fkgm6uKKO/tP3Yc1EsPDL.Z2pDvz35sqwcJo8AY4b1Ljstrzvg2B6', 'user', '450000', '', NULL),
(11, 'test 13', 'jakarta', '2021-09-28', 'sadsad', '', '0231651', '032156', 'androrif34@gmail.com', 1, 'magang', '$2y$10$7hPawGZCziLNUZR0sSLnAuM.8Oe5Ak30KAv06/rhTEllYFnLgVRE.', 'user', '123333', 'gambar.jpg', NULL),
(14, 'HRD', 'asdsad', '2021-09-17', 'asdsadasd', '', '035218230', '035218230', 'abd@abd.com', 1, 'magang', '$2y$10$g8CKbWaX4.lfT8WJLwCk.Ol22stmRB8Mr5q1tURbw1CWNp2m3IZGG', 'admin', '12333', '1632826200.png', NULL),
(20, 'manajer', 'jakarta', '2021-09-30', 'sdasd', '', '293090', '2903902', 'manajer@manajer.com', 1, 'sdsad', '$2y$10$fR/KLn9dpJXuHvbQZXaRl.ID3TxFw6/DMLWZVENhOZrFgooPf/wUO', 'manajer', '123', '641968.jpg', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_role`
--

CREATE TABLE `users_role` (
  `id_user` int(11) NOT NULL,
  `users_role` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users_role`
--

INSERT INTO `users_role` (`id_user`, `users_role`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'manajer'),
(4, 'direktur');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id_cuti`);

--
-- Indeks untuk tabel `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indeks untuk tabel `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `users_role`
--
ALTER TABLE `users_role`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `users_role`
--
ALTER TABLE `users_role`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
