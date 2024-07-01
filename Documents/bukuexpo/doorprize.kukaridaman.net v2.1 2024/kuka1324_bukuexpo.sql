-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 26 Mar 2024 pada 13.34
-- Versi server: 10.5.22-MariaDB-cll-lve
-- Versi PHP: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuka1324_bukuexpo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `telp` varchar(30) NOT NULL,
  `kesan` text NOT NULL,
  `rating` varchar(1) NOT NULL,
  `code` varchar(20) NOT NULL,
  `is_pemenang` varchar(3) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `kunj` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pengunjung`
--

INSERT INTO `pengunjung` (`id`, `nama`, `telp`, `kesan`, `rating`, `code`, `is_pemenang`, `tanggal`, `jam`, `kunj`) VALUES
(7346, 'Ery Hariyono', '+628125339369', 'Sip', '5', 'PIQLZ', '0', '2024-03-25', '14:15:34', '14'),
(7347, 'test', '+62811537075', 'test', '4', 'QWHSY', '1', '2024-03-25', '14:16:52', '14'),
(7348, 'Kucing', '+6285245450253', 'P heh', '4', 'UPRZU', '0', '2024-03-26', '12:20:10', '12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_hadiah`
--

CREATE TABLE `tbl_hadiah` (
  `id` int(11) NOT NULL,
  `secret` varchar(50) NOT NULL,
  `hadiah` varchar(20) NOT NULL,
  `level` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_hadiah`
--

INSERT INTO `tbl_hadiah` (`id`, `secret`, `hadiah`, `level`) VALUES
(1, 'KHGDS', 'Hadiah 1', 1),
(2, 'CVBMN', 'Hadiah 2', 1),
(3, 'I7TRO', 'Hadiah 3', 1),
(4, 'CGYUK', 'Hadiah 4', 1),
(5, 'MKONJI', 'Hadiah 5', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `username`, `password`, `level`) VALUES
(1, 'diskominfo@kukarkab.go.id', '9b1983a6d23ab581613a55a8086299024e0e1470', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_token`
--

CREATE TABLE `tbl_token` (
  `id` int(11) NOT NULL,
  `token` varchar(50) NOT NULL,
  `code` varchar(5) NOT NULL,
  `is_aktif` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_token`
--

INSERT INTO `tbl_token` (`id`, `token`, `code`, `is_aktif`) VALUES
(1, 'b7674e37ac361b6b5529319b49d404c94b48b396', '12345', '1'),
(2, '120aedaf388a0a30345aa0d29953483173876990', '54321', '0'),
(3, 'c54804980cfa669a805555b645b14ba137b6ee79', '12121', '0'),
(4, '1a9b9508b6003b68ddfe03a9c8cbc4bd4388339b', '22222', '0'),
(5, '7b21848ac9af35be0ddb2d6b9fc3851934db8420', '11111', '0');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_hadiah`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_hadiah` (
`hadiah` varchar(20)
,`code` varchar(20)
,`nama` varchar(200)
,`telp` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_jumlahharian`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_jumlahharian` (
`Jumlah_pengunjung` bigint(21)
,`tanggal` date
);

-- --------------------------------------------------------

--
-- Struktur untuk view `view_hadiah`
--
DROP TABLE IF EXISTS `view_hadiah`;

CREATE ALGORITHM=UNDEFINED DEFINER=`kuka1324`@`localhost` SQL SECURITY DEFINER VIEW `view_hadiah`  AS SELECT `a`.`hadiah` AS `hadiah`, `b`.`code` AS `code`, `b`.`nama` AS `nama`, concat(left(`b`.`telp`,7),'xxx') AS `telp` FROM (`tbl_hadiah` `a` left join `pengunjung` `b` on(`a`.`id` = `b`.`is_pemenang`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_jumlahharian`
--
DROP TABLE IF EXISTS `view_jumlahharian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`kuka1324`@`localhost` SQL SECURITY DEFINER VIEW `view_jumlahharian`  AS SELECT count(`pengunjung`.`id`) AS `Jumlah_pengunjung`, `pengunjung`.`tanggal` AS `tanggal` FROM `pengunjung` GROUP BY `pengunjung`.`tanggal` ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_hadiah`
--
ALTER TABLE `tbl_hadiah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_token`
--
ALTER TABLE `tbl_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7349;

--
-- AUTO_INCREMENT untuk tabel `tbl_hadiah`
--
ALTER TABLE `tbl_hadiah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_token`
--
ALTER TABLE `tbl_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
