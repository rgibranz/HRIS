-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Okt 2021 pada 08.11
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
  `id_karyawan` int(11) NOT NULL,
  `nama_karyawan` varchar(255) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `waktu_datang` time DEFAULT NULL,
  `waktu_pulang` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absen`
--

INSERT INTO `absen` (`id_absen`, `id_karyawan`, `nama_karyawan`, `tgl`, `waktu_datang`, `waktu_pulang`) VALUES
(37, 8, 'Rifki Raharjo', '2021-10-14', '01:12:39', NULL),
(38, 8, 'Rifki Raharjo', '2022-10-14', '03:38:23', NULL),
(39, 8, 'Rifki Raharjo', '2021-10-15', '02:17:27', '02:19:45'),
(40, 8, 'Rifki Raharjo', '2021-10-18', '12:05:53', '12:09:17'),
(41, 20, 'manajer', '2021-10-18', '12:10:51', '12:16:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bulan`
--

CREATE TABLE `bulan` (
  `id_bulan` int(11) NOT NULL,
  `nama_bulan` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bulan`
--

INSERT INTO `bulan` (`id_bulan`, `nama_bulan`) VALUES
(1, 'Januari'),
(2, 'Febuari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'Sebtember'),
(10, 'Okteber'),
(11, 'November'),
(12, 'Desember');

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

INSERT INTO `cuti` (`id_cuti`, `id_karyawan`, `nama_karyawan`, `mulai_bekerja`, `jenis_cuti`, `lokasi_cuti`, `lama_cuti`, `sisa_cuti`, `mulai_tanggal`, `sampai_tanggal`, `keterangan_cuti`, `tgl_pengajuan`, `status_manajer`, `keterangan_manajer`, `status_direktur`, `keterangan_direktur`) VALUES
(21, 8, 'Rifki Raharjo', '2020-06-11', 'sakit', 'rumah sakit', '2', 10, '2021-10-06', '2021-10-06', 'sakit', '2021-10-06', 'accept', 'OK', 'reject', ''),
(22, 23, 'mas agugng', '2020-06-11', 'sakit', 'rumah sakit', '2', 12, '2021-10-06', '2021-10-08', NULL, '2021-10-06', 'accept', 'OK', 'accept', 'ok'),
(23, 8, 'Rifki Raharjo', '2020-06-11', 'sakit', 'rumah sakit', '2', 4, '2021-10-07', '2021-10-09', NULL, '2021-10-07', 'diajukan', NULL, 'diajukan', NULL),
(24, 8, 'Rifki Raharjo', '2020-06-11', 'sakit', 'rumah sakit', '2', 4, '2021-10-07', '2021-10-08', NULL, '2021-10-07', 'diajukan', NULL, 'diajukan', NULL),
(25, 8, 'Rifki Raharjo', '2020-06-11', 'sakit', 'rumah sakit', '2', 4, '2021-10-08', '2021-10-10', NULL, '2021-10-08', 'accept', 'ok', 'diajukan', NULL),
(26, 8, 'Rifki Raharjo', '2020-06-11', 'sakit', 'rumah sakit', '2', 8, '2021-10-08', '2021-10-10', 'sakit', '2021-10-08', 'accept', '', 'accept', 'ok'),
(27, 8, 'Rifki Raharjo', '2020-06-11', 'sakit', 'rumah sakit', '2', 6, '2021-10-08', '2021-10-10', 'ok', '2021-10-08', 'accept', 'ok', 'accept', 'ok'),
(28, 8, 'Rifki Raharjo', '2020-06-11', 'sakit', 'rumah sakit', '2', 4, '2021-10-08', '2021-10-10', 'sakit', '2021-10-08', 'accept', 'ok', 'reject', 'di tolak'),
(29, 8, 'Rifki Raharjo', '2020-06-11', 'sakit', 'rumah sakit', '2', 6, '2021-10-08', '2021-10-10', 'sakit', '2021-10-08', 'accept', 'oke', 'reject', 'ditolak'),
(30, 8, 'Rifki Raharjo', '2020-06-11', 'sakit', 'rumah sakit', '2', 8, '2021-10-08', '2021-10-10', 'sakit', '2021-10-08', 'reject', '', 'diajukan', NULL),
(31, 8, 'Rifki Raharjo', '2020-06-11', 'sakit', 'rumah', '2', 8, '2021-10-08', '2021-10-10', 'sakit', '2021-10-08', 'accept', 'Oke', 'reject', 'ditolak'),
(32, 8, 'Rifki Raharjo', '2020-06-11', 'sakit', 'rumah sakit', '2', 8, '2021-10-08', '2021-10-10', 'sakit', '2021-10-08', 'accept', 'Ok', 'accept', 'Ok'),
(33, 8, 'Rifki Raharjo', '2020-06-11', 'sakit', 'rumah', '2', 5, '2021-10-08', '2021-10-08', 'oke', '2021-10-08', 'reject', 'oke', 'diajukan', NULL),
(36, 8, 'Rifki Raharjo', '2020-02-11', 'sakit', 'rumah', '1', 2, '2021-10-15', '2021-10-16', 'sakit', '2021-10-15', 'accept', 'ok', 'accept', 'ok'),
(37, 8, 'Rifki Raharjo', '2021-09-26', 'sakit', NULL, '1', 1, '2021-10-18', '2021-10-19', 'sakit', '2021-10-18', 'accept', 'oke', 'accept', 'Oke'),
(38, 8, 'Rifki Raharjo', '2021-09-26', 'sakit', NULL, '2', 3, '2021-10-18', '2021-10-20', 'sakit', '2021-10-18', 'accept', 'oke', 'accept', 'oke'),
(39, 8, 'Rifki Raharjo', '2021-09-26', 'sakit', NULL, '1', 1, '2021-10-18', '2021-10-19', 'sakit', '2021-10-18', 'reject', 'permintan reject dari karyawan bersankutan', 'diajukan', NULL),
(40, 8, 'Rifki Raharjo', '2021-09-26', 'sakit', NULL, '1', 1, '2021-10-18', '2021-10-19', '', '2021-10-18', 'accept', 'oke', 'reject', 'tidak ada keterangan');

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
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama_karyawan` varchar(100) DEFAULT NULL,
  `mulai_bekerja` date DEFAULT NULL,
  `tmpt_lahir` varchar(35) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat_ktp` text DEFAULT NULL,
  `alamat_domisili` text DEFAULT NULL,
  `no_hp` varchar(14) DEFAULT NULL,
  `no_hp_d` varchar(14) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `status_karyawan` varchar(100) DEFAULT NULL,
  `job` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` varchar(30) DEFAULT NULL,
  `gaji` text DEFAULT NULL,
  `img` text DEFAULT NULL,
  `sisa_cuti` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `mulai_bekerja`, `tmpt_lahir`, `tgl_lahir`, `alamat_ktp`, `alamat_domisili`, `no_hp`, `no_hp_d`, `email`, `id_divisi`, `status_karyawan`, `job`, `password`, `level`, `gaji`, `img`, `sisa_cuti`) VALUES
(7, 'test 10', NULL, 'jakarta', '2021-09-26', 'jalan', NULL, '0822297636384', '', 'androrif29@gmail.com', 1, 'test', 'magang', '$2y$10$i/bECnX5rtGqnObNObvVdulvXxiiGOob4zIYh3a7fwHTuwBbk/./C', 'admin', '0', '', 3),
(8, 'Rifki Raharjo', '2021-09-26', 'jakarta', '2021-09-26', 'jalan 1', '', '029239541', '029239541', 'user@user.com', 1, 'Magang', 'magang', '$2y$10$qD5kCVMSR7nOuPz/QpgPSeq6TJ0/Kxl0/i8twnltAV.HDiHt0Z95O', 'user', '0', '1634533804.png', 1),
(9, 'test 12', NULL, 'jakarta', '2021-09-27', 'jalan 12', NULL, '0822923', '', 'androrif31@gmail.com', 2, NULL, 'Fullstack', '$2y$10$wcT7nVNsV8Ugsd18GZzq4.rqnlQlVreOI6ALc77DUH9JPRt.375j2', 'user', '4500000', '', 3),
(10, 'test 1', NULL, 'jakarta', '2021-09-28', 'jalan', '', '082222', '082222', 'androrif32@gmail.com', 1, 'Probation', 'test', '$2y$10$fkgm6uKKO/tP3Yc1EsPDL.Z2pDvz35sqwcJo8AY4b1Ljstrzvg2B6', 'user', '450000', '1633418154.jpg', 3),
(11, 'test 13', NULL, 'jakarta', '2021-09-28', 'sadsad', '', '0231651', '0231651', 'androrif34@gmail.com', 1, 'Probation', 'magang', '$2y$10$7hPawGZCziLNUZR0sSLnAuM.8Oe5Ak30KAv06/rhTEllYFnLgVRE.', '', '123333', '1633417082.jpg', 3),
(14, 'HRD', NULL, 'asdsad', '2021-09-17', 'asdsadasd', '', '035218230', '035218230', 'abd@abd.com', 1, NULL, 'magang', '$2y$10$g8CKbWaX4.lfT8WJLwCk.Ol22stmRB8Mr5q1tURbw1CWNp2m3IZGG', 'admin', '12333', '1632826200.png', 3),
(20, 'manajer', NULL, 'jakarta', '2021-09-30', 'sdasd', '', '293090', '2903902', 'manajer@manajer.com', 1, NULL, 'sdsad', '$2y$10$fR/KLn9dpJXuHvbQZXaRl.ID3TxFw6/DMLWZVENhOZrFgooPf/wUO', 'manajer', '123', '641968.jpg', 3),
(21, 'Test karyawan', NULL, 'jakarta', '2021-10-05', 'Jakarta', '', '039393', '039393', 'karyawan@karyawan.com', 1, 'Probation', 'IT', '$2y$10$CMnp5CRZfiusoi.zuOu2HO3KmrfF4uIN9CAX6ulAcGQUajC98KV4i', 'user', '12033', '6419681.jpg', 3),
(22, 'direktur', NULL, 'jakarta', '2021-10-06', 'jalan 1', '', '0290210', '0290210', 'direktur@direktur.com', 2, 'Karyawan tetap', 'Direktur', '$2y$10$bmmzM7A3ynLPC4Lmz1Crte3un0idIr2HBYQxaRjhF1NqcUVZLV5/m', 'direktur', '1233333', 'index.png', 3),
(23, 'mas agugng', NULL, 'bogor', '2021-10-06', 'jalan', '', '090902', '09209', 'agung@agung.com', 4, 'Karyawan tetap', 'Fullstack', '$2y$10$V/xtKRKepb9ibJMuMz9rMuJpQ9No1/2HOJUlynRnVvubdQDd8wg2K', 'user', '100000000', 'index1.png', 3),
(24, 'manajer', NULL, 'jakarta', '2000-02-29', 'jalan', '', '092029', '0902982', 'gmail@gmail.com', 4, 'Karyawan tetap', 'IT', '$2y$10$dGDJbCB2FRwpxM0FDkDpNOc1MhPHlgsr2TeCiMOsNq52PxkEpQZKS', 'manajer', '10000000000', 'index2.png', 3),
(26, 'test baru', NULL, '11', '2021-10-07', 'jalan', '', '020202', '20020', 'test13@test13.com', 2, 'Karyawan tetap', 'IT', '$2y$10$YjL4ySJCGTyQUwiv8g4oE.9qnufQfciI65.Zm2midDtQWn2.k6I3q', 'user', '123333', 'index4.png', 14),
(27, 'test baru', NULL, 'jakarta', '2021-10-14', 'jalan', '', '0202', '', 'an@an2.com', 1, '', 'IT', '$2y$10$ylQhTlUwviuSCMUmIgZ4XO/MK/zR7dLJJe4V1/OgpInCvsEn4gszK', 'user', '1233333', 'index5.png', 13),
(28, 'tester_1', '2020-02-12', 'jakarta', '2000-02-02', 'tester1', '', '039393', '039304', 'test11@gmail.com', 4, 'Karyawan tetap', 'IT', '$2y$10$WjQr/4hMTYYAUConJ0BO9eyyFr7DMNy1Fe2FxQphD8BVo4nR2AaUu', 'admin', '111111111111111111', '1.PNG', 15),
(29, 'tester_2', NULL, 'jakarta', '2000-02-09', 'tester11', '', '08228282', '08228282', 'tester21@gmail.com', 4, 'Karyawan tetap', 'IT', '$2y$10$xDJPRYUpOphsmV0XbwWWS.Bgsaf2Ad4MWTsQROadtQvLIuNwrU9cW', 'user', '111111111111111111', '2.PNG', 15);

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
-- Indeks untuk tabel `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indeks untuk tabel `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`id_bulan`);

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
-- AUTO_INCREMENT untuk tabel `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `bulan`
--
ALTER TABLE `bulan`
  MODIFY `id_bulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `users_role`
--
ALTER TABLE `users_role`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
