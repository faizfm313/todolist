-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Nov 2024 pada 09.40
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_todolist`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kegiatan`
--

CREATE TABLE `tb_kegiatan` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `nama_kegiatan` varchar(200) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `status` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_kegiatan`
--

INSERT INTO `tb_kegiatan` (`id`, `user_id`, `nama_kegiatan`, `tanggal`, `waktu`, `status`) VALUES
(44, 8, 'TEST DATA', '2222-02-01', '22:22:00', 'selesai'),
(45, 8, 'jalan sore', '2024-10-28', '16:17:00', 'selesai'),
(46, 9, 'masak', '2024-10-28', '16:19:00', ''),
(47, 10, 'test bar', '2024-10-29', '09:41:00', 'selesai'),
(48, 10, 'lari pagi', '2024-10-29', '14:53:00', ''),
(49, 16, 'bangun tidur', '2024-10-31', '07:18:00', 'selesai'),
(50, 16, 'lari pagi', '2024-10-30', '05:15:00', 'selesai'),
(51, 16, 'mandi', '2024-10-30', '06:15:00', 'selesai'),
(52, 16, 'sarapan', '2024-10-30', '07:16:00', 'selesai'),
(53, 16, 'siram tanaman', '2024-10-30', '08:17:00', 'selesai'),
(54, 16, 'seapond aquarium', '2024-10-30', '09:18:00', 'selesai'),
(55, 16, 'cuci sepatu', '2024-10-30', '10:19:00', 'selesai'),
(56, 16, 'tidur siang', '2024-10-30', '11:18:00', 'belum selesai'),
(57, 16, 'mandi', '2024-10-30', '13:20:00', 'belum selesai'),
(58, 16, 'makan siang', '2024-10-30', '14:20:00', 'belum selesai'),
(59, 16, 'feeding ikan', '2024-10-30', '15:21:00', 'belum selesai'),
(60, 16, 'siram tanaman', '2024-10-30', '16:21:00', 'belum selesai'),
(61, 16, 'angkat jemuran', '2024-10-30', '17:30:00', 'belum selesai'),
(62, 16, 'makan', '2024-10-30', '18:25:00', 'belum selesai'),
(86, 16, 'tidur', '2024-11-01', '09:48:00', 'selesai'),
(88, 17, 'liburan', '2024-11-05', '06:00:00', 'belum selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(100) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `username` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `fullname`, `username`, `email`, `password`) VALUES
(8, 'udin', 'petot', 'udinpetot123@gmail.com', '$2y$10$8BMqI6KsL3Y9xTBoJI8mE.Xu4xcsikdCGNO89H8wkLT.ujV/STN2y'),
(9, 'nabil', 'nabilah', 'nabil@gmail.com', '$2y$10$uO.qqJ9NZ752AuHhq8gynushEn/UeSh8qPVWOTXqXtex63oIguDCq'),
(16, 'faiz bachtiar', 'bachtiar', 'bachtiar123@gmail.com', '$2y$10$9o4B/6QtGDg./V0jmGf6Ne0qlSx76sEPb6JQpX7nFkNV97Hu/lzgy'),
(17, 'dara', 'darazavira', 'darazavira10@gmail.com', '$2y$10$a6ziRVGXj0W/bovfKi/CveTTGE0oui2R/XV35r1Excrf/iXpPnOoC');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
