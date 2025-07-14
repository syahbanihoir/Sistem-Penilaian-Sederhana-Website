-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Bulan Mei 2022 pada 00.20
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uts_pweb_2011500432_syahbani_hoir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblmatkul`
--

CREATE TABLE `tblmatkul` (
  `kd_mtk` varchar(10) NOT NULL,
  `nm_mtk` varchar(40) NOT NULL,
  `sks` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblmatkul`
--

INSERT INTO `tblmatkul` (`kd_mtk`, `nm_mtk`, `sks`) VALUES
('BA001', 'Bahasa Indonesia', 2),
('KP002', 'Algoritma dan Struktur Data 1', 3),
('KP045', 'Kecerdasan Tiruan', 3),
('Kp047', 'Komputer dan Masyarakat', 2),
('KP121', 'Pengantar Teknologi Informasi', 3),
('KP181', 'Teori Bahasa dan Otomata *', 3),
('KP342', 'Rekayasa Perangkat Lunak 1', 3),
('KP368', 'Penambangan Data', 3),
('MI041', 'Logika Matematika', 3),
('PG061', 'Pemrograman Berorientasi Obyek', 3),
('PG184', 'Pemrograman Web Tingkat Mahir', 3),
('UM013', 'Metodologi Riset', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblmhs`
--

CREATE TABLE `tblmhs` (
  `nim` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tgllahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblmhs`
--

INSERT INTO `tblmhs` (`nim`, `nama`, `tgllahir`, `alamat`) VALUES
('1911500145', 'Andika Rizki', '2001-02-19', 'Gg. Palem, Tanggerang'),
('1911500678', 'Adi Ibrahim', '1997-08-12', ' Jl. saaba, Joglo'),
('2011500432', 'Syahbani Hoir', '2001-11-14', 'Jl. Manunggal, Meruya Selatan, Jakarta Barat'),
('2011500456', 'Heny Nur Azizah', '2000-11-27', 'Gg.asem, Meruya, Jakarta Barat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblnilai`
--

CREATE TABLE `tblnilai` (
  `nim` varchar(10) NOT NULL,
  `kd_mtk` varchar(20) NOT NULL,
  `nilai` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblnilai`
--

INSERT INTO `tblnilai` (`nim`, `kd_mtk`, `nilai`) VALUES
('1911500145', 'BA001', 80),
('1911500145', 'KP002', 78),
('1911500145', 'KP045', 64),
('1911500678', 'BA001', 70),
('1911500678', 'KP002', 48),
('1911500678', 'KP045', 89),
('2011500432', 'BA001', 76),
('2011500432', 'KP002', 88),
('2011500456', 'BA001', 78);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tblmatkul`
--
ALTER TABLE `tblmatkul`
  ADD PRIMARY KEY (`kd_mtk`);

--
-- Indeks untuk tabel `tblmhs`
--
ALTER TABLE `tblmhs`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `tblnilai`
--
ALTER TABLE `tblnilai`
  ADD KEY `kd_mtk` (`kd_mtk`),
  ADD KEY `nim` (`nim`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tblnilai`
--
ALTER TABLE `tblnilai`
  ADD CONSTRAINT `tblnilai_ibfk_2` FOREIGN KEY (`kd_mtk`) REFERENCES `tblmatkul` (`kd_mtk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblnilai_ibfk_3` FOREIGN KEY (`nim`) REFERENCES `tblmhs` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
