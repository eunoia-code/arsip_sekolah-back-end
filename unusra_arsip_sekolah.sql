-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Nov 2020 pada 14.46
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unusra_arsip_sekolah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `disposisi`
--

CREATE TABLE `disposisi` (
  `id_disposisi` varchar(20) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `isi_disposisi` text NOT NULL,
  `sifat` varchar(100) NOT NULL,
  `catatan` varchar(100) NOT NULL,
  `batas_waktu` date DEFAULT NULL,
  `id_surat_masuk` varchar(20) NOT NULL,
  `user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `disposisi`
--

INSERT INTO `disposisi` (`id_disposisi`, `tujuan`, `isi_disposisi`, `sifat`, `catatan`, `batas_waktu`, `id_surat_masuk`, `user`) VALUES
('5f6de46ee193f', 'kamu', 'undefined', 'Biasa', '', '1969-12-31', '5f69ba373aebe', 'admin'),
('5f6e4758196ed', 'kamu', 'undefined', 'Segera', '', '1969-12-31', '5f6e47418de29', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(3, '2020-09-08-135845', 'App\\Database\\Migrations\\SuratMasuk', 'default', 'App', 1599930855, 1),
(4, '2020-09-18-074826', 'App\\Database\\Migrations\\Disposisi', 'default', 'App', 1600448066, 2),
(5, '2020-09-23-072419', 'App\\Database\\Migrations\\SuratKeluar', 'default', 'App', 1600845949, 3),
(6, '2020-09-24-081239', 'App\\Database\\Migrations\\Referensi', 'default', 'App', 1600935454, 4),
(7, '2020-09-25-180004', 'App\\Database\\Migrations\\User', 'default', 'App', 1601056972, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `referensi`
--

CREATE TABLE `referensi` (
  `id_referensi` varchar(20) NOT NULL,
  `kode` varchar(3) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `uraian` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `referensi`
--

INSERT INTO `referensi` (`id_referensi`, `kode`, `nama`, `uraian`, `user`) VALUES
('5f6c58bc79303', '01', 'pemberitahuan', 'hahaha', 'admin'),
('5f6c5c6822c96', '022', 'ups', 'hahahah', 'admin'),
('5f6e477ace1fb', '02', 'Umum', 'umum', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_surat_keluar` varchar(20) NOT NULL,
  `nomor_surat` varchar(100) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `isi_surat` text NOT NULL,
  `tanggal_surat` date DEFAULT NULL,
  `id_referensi` varchar(50) NOT NULL,
  `nomor_agenda` varchar(3) NOT NULL,
  `user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_surat_keluar`, `nomor_surat`, `tujuan`, `isi_surat`, `tanggal_surat`, `id_referensi`, `nomor_agenda`, `user`) VALUES
('5f6b0153e5fff', '123/x/05/zxcv', 'diam', 'qweqweqwe', '2020-09-24', '5f6c58bc79303', '', 'admin'),
('5f6e47a33523c', '123/x/05/zxc', 'dia', 'isi surat', '2020-09-26', '', '', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_surat_masuk` varchar(20) NOT NULL,
  `nomor_surat` varchar(100) NOT NULL,
  `asal_surat` varchar(100) NOT NULL,
  `isi_surat` text NOT NULL,
  `tanggal_surat` date DEFAULT NULL,
  `id_referensi` varchar(50) NOT NULL,
  `nomor_agenda` varchar(3) NOT NULL,
  `user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_surat_masuk`, `nomor_surat`, `asal_surat`, `isi_surat`, `tanggal_surat`, `id_referensi`, `nomor_agenda`, `user`) VALUES
('5f5e6e409f0c5', '123/x/05/zxcintakamu', 'bapakmuu', 'yellow dudes', '2020-09-18', '', '', 'admin'),
('5f69ba373aebe', '2123/zxc/ul/a4z', 'disini tbk', 'hahahahaha', '2020-09-22', '', '', 'admin'),
('5f6e47418de29', '01/123/abc/A/2020', 'Aku', 'ini surat', '2020-09-26', '', '', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
('5f6e310409b3f', 'admin', 'e34cd0ba70d964a217a0437eeb461c38c0c4760f');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id_disposisi`),
  ADD KEY `disposisi_id_surat_masuk_foreign` (`id_surat_masuk`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `referensi`
--
ALTER TABLE `referensi`
  ADD PRIMARY KEY (`id_referensi`);

--
-- Indeks untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_surat_keluar`);

--
-- Indeks untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_surat_masuk`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `disposisi`
--
ALTER TABLE `disposisi`
  ADD CONSTRAINT `disposisi_id_surat_masuk_foreign` FOREIGN KEY (`id_surat_masuk`) REFERENCES `surat_masuk` (`id_surat_masuk`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
