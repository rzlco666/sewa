-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Des 2020 pada 10.25
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sewa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_user` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `akses` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_user`, `email`, `password`, `akses`) VALUES
(3, 'coba@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(5, 'daffa@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(6, 'd@g', '202cb962ac59075b964b07152d234b70', 'user'),
(10, 'abc@g', '202cb962ac59075b964b07152d234b70', 'user'),
(11, 'r@g', '202cb962ac59075b964b07152d234b70', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_admin`
--

CREATE TABLE `akun_admin` (
  `id_admin` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `akses` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun_admin`
--

INSERT INTO `akun_admin` (`id_admin`, `email`, `password`, `akses`) VALUES
(1, 'admin@megas.studio', '202cb962ac59075b964b07152d234b70', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_alatdj`
--

CREATE TABLE `data_alatdj` (
  `id_alatdj` int(10) NOT NULL,
  `nama_alatdj` text NOT NULL,
  `merk` text NOT NULL,
  `harga` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `spesifikasi` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_alatdj`
--

INSERT INTO `data_alatdj` (`id_alatdj`, `nama_alatdj`, `merk`, `harga`, `status`, `spesifikasi`, `foto`) VALUES
(1, 'XDJ 1000 MK2', 'MK2', 50000, 0, 'Belum diisi', 'gambar/def.png'),
(3, 'DJM 750 MK2', 'MK2', 50000, 0, '<p>1. Speaker Mantep</p>\r\n<p>2. Boost</p>', 'gambar/virus.png'),
(6, 'test123', 'test123', 123456, 1, '<p>123test</p>', 'gambar/pamunqkas_94419650_166409528191424_5101485317151165621_n.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_user`
--

CREATE TABLE `data_user` (
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `hp` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_user`
--

INSERT INTO `data_user` (`nama`, `email`, `id_user`, `alamat`, `hp`, `foto`) VALUES
('Daffa', 'coba@gmail.com', 3, 'Solok', '0812345678910', 'gambar/pamunqkas_94419650_166409528191424_5101485317151165621_n.jpg'),
('Daffa Qil', 'daffa@gmail.com', 5, '', '0', 'gambar/default.png'),
('daf', 'd@g', 6, '', '0', 'gambar/default.png'),
('abc', 'abc@g', 10, 'abc', '123', 'gambar/default.png'),
('rubah', 'r@g', 11, 'abc', '123', 'gambar/plot graph.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sewa`
--

CREATE TABLE `sewa` (
  `id_sewa` int(11) NOT NULL,
  `tgl_sewa` date NOT NULL,
  `durasi_sewa` varchar(20) CHARACTER SET latin1 NOT NULL,
  `tgl_kembali` date NOT NULL,
  `tgl_dikembalikan` date NOT NULL,
  `denda` int(11) NOT NULL,
  `total_sewa` int(11) NOT NULL,
  `lunas` int(1) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_alatdj` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sewa`
--

INSERT INTO `sewa` (`id_sewa`, `tgl_sewa`, `durasi_sewa`, `tgl_kembali`, `tgl_dikembalikan`, `denda`, `total_sewa`, `lunas`, `id_user`, `id_alatdj`) VALUES
(1, '2020-12-14', '+2 day', '2020-12-16', '2020-12-13', 0, 100000, 1, 3, 1),
(2, '2020-12-15', '+1 day', '2020-12-16', '2020-12-17', 10000, 50000, 1, 3, 1),
(3, '2020-12-15', '+1 day', '2020-12-16', '2020-12-17', 10000, 50000, 1, 3, 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `akun_admin`
--
ALTER TABLE `akun_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `data_alatdj`
--
ALTER TABLE `data_alatdj`
  ADD PRIMARY KEY (`id_alatdj`);

--
-- Indeks untuk tabel `data_user`
--
ALTER TABLE `data_user`
  ADD KEY `data_user_ibfk_1` (`id_user`);

--
-- Indeks untuk tabel `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_alatdj` (`id_alatdj`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `akun_admin`
--
ALTER TABLE `akun_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `data_alatdj`
--
ALTER TABLE `data_alatdj`
  MODIFY `id_alatdj` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `sewa`
--
ALTER TABLE `sewa`
  MODIFY `id_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_user`
--
ALTER TABLE `data_user`
  ADD CONSTRAINT `data_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `akun` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sewa`
--
ALTER TABLE `sewa`
  ADD CONSTRAINT `sewa_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `akun` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sewa_ibfk_2` FOREIGN KEY (`id_alatdj`) REFERENCES `data_alatdj` (`id_alatdj`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
