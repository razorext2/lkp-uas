-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Des 2021 pada 18.56
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lkp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bayar`
--

CREATE TABLE `bayar` (
  `id_bayar` int(11) NOT NULL,
  `nama_peserta` varchar(250) NOT NULL,
  `nama_kursus` varchar(250) NOT NULL,
  `biaya_awal` varchar(250) NOT NULL,
  `jmlh_bayar` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bayar`
--

INSERT INTO `bayar` (`id_bayar`, `nama_peserta`, `nama_kursus`, `biaya_awal`, `jmlh_bayar`, `status`) VALUES
(16, 'Alan wahyuda nasution', 'Microsoft Office', '300000', '90000', '210000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `catatan_pembayaran`
--

CREATE TABLE `catatan_pembayaran` (
  `id_bayar` int(11) NOT NULL,
  `nama_peserta` varchar(250) NOT NULL,
  `jmlh_bayar` varchar(250) NOT NULL,
  `sisa` varchar(250) NOT NULL,
  `tanggal` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `catatan_pembayaran`
--

INSERT INTO `catatan_pembayaran` (`id_bayar`, `nama_peserta`, `jmlh_bayar`, `sisa`, `tanggal`) VALUES
(1, 'udin', '12346y7', '437654', '2021-12-23'),
(2, 'udin', '123123', '176877', '2021-12-29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `instruktur`
--

CREATE TABLE `instruktur` (
  `id_instruktur` varchar(250) NOT NULL,
  `nama_instruktur` varchar(250) NOT NULL,
  `no_hp` varchar(250) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `jenis_klmn` varchar(250) NOT NULL,
  `tanggal_kerja` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `instruktur`
--

INSERT INTO `instruktur` (`id_instruktur`, `nama_instruktur`, `no_hp`, `alamat`, `jenis_klmn`, `tanggal_kerja`) VALUES
('123456', 'Yana', '082167232047', 'Pekanbaru', 'Perempuan', '2021-12-01'),
('18220356', 'Ifvan', '087896829934', 'Perkebunan Gunung Melayu', 'Laki-Laki', '2021-12-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kursus`
--

CREATE TABLE `kursus` (
  `id_kursus` varchar(250) NOT NULL,
  `nama_kursus` varchar(250) NOT NULL,
  `biaya` varchar(250) NOT NULL,
  `id_instruktur` varchar(250) NOT NULL,
  `jmlh_pertemuan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kursus`
--

INSERT INTO `kursus` (`id_kursus`, `nama_kursus`, `biaya`, `id_instruktur`, `jmlh_pertemuan`) VALUES
('SRH001', 'Microsoft Office', '300000', 'Ifvan', '21'),
('SRH002', 'Prakerin', '450000', 'Ifvan', '90');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE `peserta` (
  `no_id` int(11) NOT NULL,
  `nama_peserta` varchar(250) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `tanggal_pendaftaran` varchar(250) NOT NULL,
  `id_kursus` varchar(250) NOT NULL,
  `nomor_hp` varchar(100) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`no_id`, `nama_peserta`, `jenis_kelamin`, `pendidikan`, `tanggal_pendaftaran`, `id_kursus`, `nomor_hp`, `alamat`, `status`) VALUES
(18, 'Alan wahyuda nasution', 'Laki-Laki', 'S1', '2021-12-13', 'Microsoft Office', '082167232047', 'Perkebunan Gunung Melayu', 'Lulus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(25) NOT NULL,
  `paswd` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` int(1) NOT NULL,
  `ket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `paswd`, `email`, `nama`, `level`, `ket`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'devk@gmail.com', 'Developer SRH', 1, 'Admin SRH');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indeks untuk tabel `catatan_pembayaran`
--
ALTER TABLE `catatan_pembayaran`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indeks untuk tabel `instruktur`
--
ALTER TABLE `instruktur`
  ADD PRIMARY KEY (`id_instruktur`);

--
-- Indeks untuk tabel `kursus`
--
ALTER TABLE `kursus`
  ADD PRIMARY KEY (`id_kursus`);

--
-- Indeks untuk tabel `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`no_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bayar`
--
ALTER TABLE `bayar`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `catatan_pembayaran`
--
ALTER TABLE `catatan_pembayaran`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `peserta`
--
ALTER TABLE `peserta`
  MODIFY `no_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
