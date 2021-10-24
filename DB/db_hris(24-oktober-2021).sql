-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Okt 2021 pada 12.21
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
-- Struktur dari tabel `absen`
--

CREATE TABLE `absen` (
  `id_absen` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `nama_users` varchar(255) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `waktu_datang` time DEFAULT NULL,
  `waktu_pulang` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absen`
--

INSERT INTO `absen` (`id_absen`, `id_users`, `nama_users`, `tgl`, `waktu_datang`, `waktu_pulang`) VALUES
(37, 8, 'Rifki Raharjo', '2021-10-14', '01:12:39', NULL),
(38, 8, 'Rifki Raharjo', '2022-10-14', '03:38:23', NULL),
(39, 8, 'Rifki Raharjo', '2021-10-15', '02:17:27', '02:19:45'),
(40, 8, 'Rifki Raharjo', '2021-10-18', '12:05:53', '12:09:17'),
(41, 20, 'manajer', '2021-10-18', '12:10:51', '12:16:39'),
(42, 22, 'direktur', '2021-10-18', '06:49:36', '06:50:49'),
(43, 20, 'manajer', '2021-10-18', '06:51:24', '06:51:47'),
(44, 8, 'Rifki Raharjo', '2021-10-19', '07:35:34', '07:36:34'),
(45, 8, 'Rifki Rahardjo', '2021-10-21', '02:33:30', NULL),
(46, 8, 'Rifki Rahardjo', '2021-10-21', '02:34:01', '02:35:17'),
(47, 8, 'Rifki Rahardjo', '2021-10-21', '02:36:07', '02:36:42'),
(48, 8, 'Rifki Rahardjo', '2021-10-22', '09:54:55', NULL),
(49, 8, 'Rifki Rahardjo', '2021-10-24', '04:37:33', '04:37:52'),
(50, 20, 'manajer', '2021-10-24', '04:45:30', NULL);

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
  `status_direktur` varchar(20) NOT NULL,
  `keterangan_direktur` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cuti`
--

INSERT INTO `cuti` (`id_cuti`, `id_users`, `nama_users`, `nama_divisi`, `mulai_bekerja`, `jenis_cuti`, `lokasi_cuti`, `lama_cuti`, `sisa_cuti`, `mulai_tanggal`, `sampai_tanggal`, `keterangan_cuti`, `tgl_pengajuan`, `status_manajer`, `keterangan_manajer`, `status_direktur`, `keterangan_direktur`) VALUES
(53, 8, 'Rifki Raharjo', 'Multimedia', '2021-09-26', 'sakit tahap 2', NULL, '1', 42, '2021-10-18', '2021-10-19', 'sakit', '2021-10-18', 'accept', 'oke', 'accept', 'oke'),
(57, 0, 'Rifki Rahardjo', NULL, '2021-09-26', 'sakit', NULL, '1', 23, '2021-10-21', '2021-10-22', '1', '2021-10-21', 'diajukan', NULL, 'diajukan', NULL),
(60, 8, 'Rifki Rahardjo', 'Multimedia', '2021-09-26', 'sakit', NULL, '1', 21, '2021-10-21', '2021-10-22', 's', '2021-10-21', 'accept', 'oke', 'accept', 'kee'),
(65, 8, 'Rifki Rahardjo', 'Multimedia', '2021-09-26', 'test', NULL, '1', 19, '2021-10-22', '2021-10-23', 'sakit', '2021-10-22', 'accept', 'test', 'accept', 'oke'),
(66, 8, 'Rifki Rahardjo', 'Multimedia', '2021-09-26', 'sakit', NULL, '1', 18, '2021-10-22', '2021-10-23', 'sakit', '2021-10-22', 'reject', 'test', 'diajukan', NULL),
(69, 8, 'Rifki Rahardjo', 'Multimedia', '2021-09-26', 'test', NULL, '1', 18, '2021-10-22', '2021-10-23', 'sakit', '2021-10-22', 'accept', 'oke', 'reject', 'tolak'),
(70, 8, 'Rifki Rahardjo', 'Teknologi', '2021-09-26', 'sakit', NULL, '1', 18, '2021-10-22', '2021-10-23', '1', '2021-10-22', 'diajukan', NULL, 'diajukan', NULL),
(71, 20, 'manajer', 'Multimedia', '2021-10-24', 'sakit', NULL, '1', 37, '2021-10-24', '2021-10-25', 'sakit', '2021-10-24', 'accept', NULL, 'diajukan', NULL);

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
(2, 'Divisi 1'),
(4, 'Teknologi');

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
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `nama_users` varchar(100) DEFAULT NULL,
  `mulai_bekerja` date DEFAULT NULL,
  `tmpt_lahir` varchar(35) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat_ktp` text DEFAULT NULL,
  `alamat_domisili` text DEFAULT NULL,
  `no_hp` varchar(14) DEFAULT NULL,
  `no_hp_d` varchar(14) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `status_users` varchar(100) DEFAULT NULL,
  `job` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` varchar(30) DEFAULT NULL,
  `gaji` text DEFAULT NULL,
  `img` text DEFAULT NULL,
  `sisa_cuti` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `nama_users`, `mulai_bekerja`, `tmpt_lahir`, `tgl_lahir`, `alamat_ktp`, `alamat_domisili`, `no_hp`, `no_hp_d`, `email`, `id_divisi`, `status_users`, `job`, `password`, `level`, `gaji`, `img`, `sisa_cuti`) VALUES
(7, 'test 10', NULL, 'jakarta', '2021-09-26', 'jalan', NULL, '0822297636384', '', 'androrif29@gmail.com', 1, 'test', 'magang', '$2y$10$i/bECnX5rtGqnObNObvVdulvXxiiGOob4zIYh3a7fwHTuwBbk/./C', 'admin', '0', '', 37),
(8, 'Rifki Rahardjo', '2021-09-26', 'jakartaa', '2021-10-19', 'jalan 212', '', '082282821', '082282821', 'user@user.com', 4, 'Magang', 'IT', '$2y$10$qD5kCVMSR7nOuPz/QpgPSeq6TJ0/Kxl0/i8twnltAV.HDiHt0Z95O', 'karyawan', '111111111111111111', '1634614996.png', 17),
(9, 'test 12', NULL, 'jakarta', '2021-09-27', 'jalan 12', NULL, '0822923', '', 'androrif31@gmail.com', 2, NULL, 'Fullstack', '$2y$10$wcT7nVNsV8Ugsd18GZzq4.rqnlQlVreOI6ALc77DUH9JPRt.375j2', 'user', '4500000', '', 37),
(10, 'test 1', NULL, 'jakarta', '2021-09-28', 'jalan', '', '082222', '082222', 'androrif32@gmail.com', 1, 'Probation', 'test', '$2y$10$fkgm6uKKO/tP3Yc1EsPDL.Z2pDvz35sqwcJo8AY4b1Ljstrzvg2B6', 'user', '450000', '1633418154.jpg', 37),
(11, 'test 13', NULL, 'jakarta', '2021-09-28', 'sadsad', '', '0231651', '0231651', 'androrif34@gmail.com', 1, 'Probation', 'magang', '$2y$10$7hPawGZCziLNUZR0sSLnAuM.8Oe5Ak30KAv06/rhTEllYFnLgVRE.', '', '123333', '1633417082.jpg', 37),
(14, 'HRD', NULL, 'asdsad', '2021-09-17', 'asdsadasd', '', '035218230', '035218230', 'abd@abd.com', 1, NULL, 'magang', '$2y$10$g8CKbWaX4.lfT8WJLwCk.Ol22stmRB8Mr5q1tURbw1CWNp2m3IZGG', 'HR', '12333', '1632826200.png', 37),
(20, 'manajer', NULL, 'jakarta', '2021-09-30', 'sdasd', '', '293090', '2903902', 'manajer@manajer.com', 1, NULL, 'sdsad', '$2y$10$fR/KLn9dpJXuHvbQZXaRl.ID3TxFw6/DMLWZVENhOZrFgooPf/wUO', 'manajer', '123', '641968.jpg', 36),
(21, 'Test karyawan', NULL, 'jakarta', '2021-10-05', 'Jakarta', '', '039393', '039393', 'karyawan@karyawan.com', 1, 'Probation', 'IT', '$2y$10$CMnp5CRZfiusoi.zuOu2HO3KmrfF4uIN9CAX6ulAcGQUajC98KV4i', 'user', '12033', '6419681.jpg', 37),
(22, 'direktur', NULL, 'jakarta', '2021-10-06', 'jalan 1', '', '0290210', '0290210', 'direktur@direktur.com', 2, 'Karyawan tetap', 'Direktur', '$2y$10$bmmzM7A3ynLPC4Lmz1Crte3un0idIr2HBYQxaRjhF1NqcUVZLV5/m', 'direktur', '1233333', 'index.png', 37),
(24, 'manajer', NULL, 'jakarta', '2000-02-29', 'jalan', '', '092029', '0902982', 'gmail@gmail.com', 4, 'Karyawan tetap', 'IT', '$2y$10$dGDJbCB2FRwpxM0FDkDpNOc1MhPHlgsr2TeCiMOsNq52PxkEpQZKS', 'manajer', '10000000000', 'index2.png', 37),
(26, 'test baru', NULL, '11', '2021-10-07', 'jalan', '', '020202', '20020', 'test13@test13.com', 2, 'Karyawan tetap', 'IT', '$2y$10$YjL4ySJCGTyQUwiv8g4oE.9qnufQfciI65.Zm2midDtQWn2.k6I3q', 'user', '123333', 'index4.png', 48),
(27, 'test baru', NULL, 'jakarta', '2021-10-14', 'jalan', '', '0202', '', 'an@an2.com', 1, '', 'IT', '$2y$10$ylQhTlUwviuSCMUmIgZ4XO/MK/zR7dLJJe4V1/OgpInCvsEn4gszK', 'user', '1233333', 'index5.png', 47),
(34, 'Rifki', '2021-10-21', 'jakarta', '2021-10-21', 'Jalan', '', '0290210', '02902', 'user2@user.com', 4, 'karyawan tetap', 'it', '$2y$10$kUml2.ct3LxsJP32ybzhKON9muu0W.Krk9Q5oD3phFkEfPFj0timG', 'user', '123', 'avatar04.png', 16),
(35, 'tester1', '2021-10-21', 'jakarta', '2021-10-21', 'jakarta', '', '0290210', '033020', 'user3@user.com', 4, NULL, 'IT', '$2y$10$YiBv3AufjJ4H01hEMcBcGuZRZzetzyKkeNmKTuHSoqU3zoWCtq7UC', 'user', '1233333', 'avatar54.png', 12),
(36, 'tester1', '2021-10-21', 'jakarta', '2021-10-21', 'jalan', '', '0290210', '033020', 'user4@user.com', 4, 'Pekerja tetap', 'IT', '$2y$10$hmzTgFer3S5QsWwyotJeAe3C7XWb0OyprRDNaRXNZWDZzKUMosl4S', 'user', '123', 'avatar3.png', 12);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`);

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
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
