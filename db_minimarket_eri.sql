-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 28 Apr 2021 pada 03.24
-- Versi server: 5.7.31
-- Versi PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_minimarket_eri`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

DROP TABLE IF EXISTS `barang`;
CREATE TABLE IF NOT EXISTS `barang` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `produk_id` int(11) NOT NULL,
  `nama_barang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_jual` double NOT NULL,
  `stock` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `barang_produk_id_index` (`produk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `produk_id`, `nama_barang`, `satuan`, `harga_jual`, `stock`, `created_at`, `updated_at`) VALUES
(6, 'BRG000001', 5, 'Nasi Padang', 'BOX', 10000, '220', '2021-04-26 14:19:00', '2021-04-27 04:10:34'),
(7, 'BRG00000002', 3, 'Acer', 'BOX', 5500000, '270', '2021-04-26 14:19:49', '2021-04-27 06:43:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pembelian`
--

DROP TABLE IF EXISTS `detail_pembelian`;
CREATE TABLE IF NOT EXISTS `detail_pembelian` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pembelian_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `harga_beli` double NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sub_total` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id`, `pembelian_id`, `barang_id`, `harga_beli`, `jumlah`, `sub_total`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5500000, 11, 250000, '2021-04-25 07:19:10', '2021-04-25 07:19:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

DROP TABLE IF EXISTS `detail_penjualan`;
CREATE TABLE IF NOT EXISTS `detail_penjualan` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `penjualan_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `harga_jual` double NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sub_total` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '2021_03_08_081150_create_pembelians_table', 1),
(12, '2021_03_08_081551_create_barangs_table', 1),
(13, '2021_03_08_081613_create_pemasoks_table', 1),
(14, '2021_03_08_081649_create_detail_pembelians_table', 1),
(15, '2021_03_08_081709_create_produks_table', 1),
(16, '2021_03_08_081728_create_penjualans_table', 1),
(17, '2021_03_08_081821_create_tampung_bayars_table', 1),
(18, '2021_03_08_082538_create_detail_penjualans_table', 1),
(19, '2021_03_08_082602_create_pelanggans_table', 1),
(20, '2021_03_08_082633_create_users_table', 1),
(21, '2021_04_22_074744_create_penarikan_barang_table', 2),
(22, '2021_04_27_073812_create_table_pengajuan_barang', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_pelanggan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `kode_pelanggan`, `nama`, `alamat`, `no_telp`, `email`, `created_at`, `updated_at`) VALUES
(3, 'PB00000001', 'Eri Sukmawan', 'jln Rancagoong', '09876567898', 'erisukmawan01@gmail.com', '2021-04-25 09:43:19', '2021-04-25 09:43:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasok`
--

DROP TABLE IF EXISTS `pemasok`;
CREATE TABLE IF NOT EXISTS `pemasok` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_pemasok` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pemasok` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pemasok`
--

INSERT INTO `pemasok` (`id`, `kode_pemasok`, `nama_pemasok`, `alamat`, `kota`, `no_telp`, `created_at`, `updated_at`) VALUES
(3, 'SUP000001', 'Google', 'jln Grogol', 'Jakarta Utara', '8372654532', '2021-04-25 08:52:53', '2021-04-25 08:53:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

DROP TABLE IF EXISTS `pembelian`;
CREATE TABLE IF NOT EXISTS `pembelian` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_masuk` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `total` double NOT NULL,
  `pemasok_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id`, `kode_masuk`, `tanggal_masuk`, `total`, `pemasok_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'P00000001', '2021-04-25', 2000000, 3, 1, '2021-04-25 09:47:36', '2021-04-25 10:48:16'),
(2, 'P00000001', '2021-04-25', 2000000, 3, 1, '2021-04-25 09:48:19', '2021-04-25 10:48:20'),
(3, 'P00000002', '2021-04-25', 1000000, 3, 1, '2021-04-25 12:06:19', '2021-04-25 12:06:19'),
(4, 'P00000002', '2021-04-25', 1000000, 3, 1, '2021-04-25 12:07:17', '2021-04-25 12:07:17'),
(5, 'P00000003', '2021-04-25', 1000000, 3, 1, '2021-04-25 12:10:09', '2021-04-25 12:10:09'),
(6, 'P00000003', '2021-04-25', 1000000, 3, 1, '2021-04-25 12:11:52', '2021-04-25 12:11:52'),
(7, 'P00000003', '2021-04-25', 1000000, 3, 1, '2021-04-25 12:12:26', '2021-04-25 12:12:26'),
(8, 'P00000003', '2021-04-25', 1000000, 3, 1, '2021-04-25 12:12:56', '2021-04-25 12:12:56'),
(9, 'P00000004', '2021-04-25', 1000000, 3, 1, '2021-04-25 12:30:39', '2021-04-25 12:30:39'),
(10, 'P00000005', '2021-04-25', 1000000, 3, 1, '2021-04-25 12:31:54', '2021-04-25 12:31:54'),
(11, 'P00000005', '2021-04-25', 1000000, 3, 1, '2021-04-25 12:33:07', '2021-04-25 12:33:07'),
(12, 'P00000005', '2021-04-25', 1000000, 3, 1, '2021-04-25 12:34:23', '2021-04-25 12:34:23'),
(13, 'P00000005', '2021-04-25', 1000000, 3, 1, '2021-04-25 12:34:45', '2021-04-25 12:34:45'),
(14, 'P00000005', '2021-04-25', 1000000, 3, 1, '2021-04-25 12:35:04', '2021-04-25 12:35:04'),
(15, 'P00000005', '2021-04-25', 1000000, 3, 1, '2021-04-25 12:36:05', '2021-04-25 12:36:05'),
(16, 'P00000005', '2021-04-25', 1000000, 3, 1, '2021-04-25 12:36:17', '2021-04-25 12:36:17'),
(17, 'P00000006', '2021-04-25', 1000000, 3, 1, '2021-04-25 12:38:52', '2021-04-25 12:38:52'),
(18, 'P00000007', '2021-04-25', 3000000, 3, 1, '2021-04-25 12:43:45', '2021-04-25 12:43:45'),
(19, 'P00000007', '2021-04-25', 3000000, 3, 1, '2021-04-25 12:45:04', '2021-04-25 12:45:04'),
(20, 'P00000007', '2021-04-25', 3000000, 3, 1, '2021-04-25 12:46:13', '2021-04-25 12:46:13'),
(21, 'P00000007', '2021-04-25', 3000000, 3, 1, '2021-04-25 12:50:37', '2021-04-25 12:50:37'),
(22, 'P00000008', '2021-04-25', 1000000, 3, 1, '2021-04-25 12:51:10', '2021-04-25 12:51:10'),
(23, 'P00000009', '2021-04-25', 1000000, 3, 1, '2021-04-25 12:52:18', '2021-04-25 12:52:18'),
(24, 'P00000009', '2021-04-25', 1000000, 3, 1, '2021-04-25 12:52:47', '2021-04-25 12:52:47'),
(25, 'P00000009', '2021-04-25', 1000000, 3, 1, '2021-04-25 12:53:03', '2021-04-25 12:53:03'),
(26, 'P00000009', '2021-04-25', 1000000, 3, 1, '2021-04-25 12:55:30', '2021-04-25 12:55:30'),
(27, 'P00000010', '2021-04-25', 1000000, 3, 1, '2021-04-25 12:58:15', '2021-04-25 12:58:15'),
(28, 'P00000010', '2021-04-25', 1000000, 3, 1, '2021-04-25 12:58:30', '2021-04-25 12:58:30'),
(29, 'P00000010', '2021-04-25', 1000000, 3, 1, '2021-04-25 12:58:39', '2021-04-25 12:58:39'),
(30, 'P00000010', '2021-04-25', 1000000, 3, 1, '2021-04-25 13:01:19', '2021-04-25 13:01:19'),
(31, 'P00000010', '2021-04-25', 1000000, 3, 1, '2021-04-25 13:02:37', '2021-04-25 13:02:37'),
(32, 'P00000010', '2021-04-25', 1000000, 3, 1, '2021-04-25 13:07:01', '2021-04-25 13:07:01'),
(33, 'P00000010', '2021-04-25', 1000000, 3, 1, '2021-04-25 13:07:18', '2021-04-25 13:07:18'),
(34, 'P00000011', '2021-04-26', 1000000, 3, 1, '2021-04-26 11:48:09', '2021-04-26 11:48:09'),
(35, 'P00000011', '2021-04-26', 1000000, 3, 1, '2021-04-26 11:48:55', '2021-04-26 11:48:55'),
(36, 'P00000011', '2021-04-26', 1000000, 3, 1, '2021-04-26 11:50:38', '2021-04-26 11:50:38'),
(37, 'P00000012', '2021-04-26', 3000000, 3, 1, '2021-04-26 13:52:05', '2021-04-26 13:52:05'),
(38, 'P00000012', '2021-04-26', 3000000, 3, 1, '2021-04-26 14:00:51', '2021-04-26 14:00:51'),
(39, 'P00000012', '2021-04-26', 3000000, 3, 1, '2021-04-26 14:01:43', '2021-04-26 14:01:43'),
(40, 'P00000013', '2021-04-26', 1000000, 3, 1, '2021-04-26 14:02:23', '2021-04-26 14:02:23'),
(41, 'P00000014', '2021-04-26', 3000000, 3, 1, '2021-04-26 14:09:53', '2021-04-26 14:09:53'),
(42, 'P00000015', '2021-04-26', 9000000, 3, 1, '2021-04-26 14:13:16', '2021-04-26 14:13:16'),
(43, 'P00000016', '2021-04-26', 5510000, 3, 1, '2021-04-26 14:21:19', '2021-04-26 14:21:19'),
(44, 'P00000017', '2021-04-26', 10000, 3, 1, '2021-04-26 14:22:07', '2021-04-26 14:22:07'),
(45, 'P00000018', '2021-04-26', 10000, 3, 1, '2021-04-26 14:23:03', '2021-04-26 14:23:03'),
(46, 'P00000019', '2021-04-26', 5500000, 3, 1, '2021-04-26 14:23:18', '2021-04-26 14:23:18'),
(47, 'P00000020', '2021-04-26', 10000, 3, 1, '2021-04-26 14:26:00', '2021-04-26 14:26:00'),
(48, 'P00000020', '2021-04-26', 10000, 3, 1, '2021-04-26 14:26:27', '2021-04-26 14:26:27'),
(49, 'P00000020', '2021-04-26', 10000, 3, 1, '2021-04-26 14:27:43', '2021-04-26 14:27:43'),
(50, 'P00000020', '2021-04-26', 10000, 3, 1, '2021-04-26 14:28:29', '2021-04-26 14:28:29'),
(51, 'P00000020', '2021-04-26', 10000, 3, 1, '2021-04-26 14:28:59', '2021-04-26 14:28:59'),
(52, 'P00000021', '2021-04-27', 0, 3, 1, '2021-04-27 05:10:39', '2021-04-27 05:10:39'),
(53, 'P00000021', '2021-04-27', 0, 3, 1, '2021-04-27 05:10:40', '2021-04-27 05:10:40'),
(54, 'P00000021', '2021-04-27', 0, 3, 1, '2021-04-27 05:10:40', '2021-04-27 05:10:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penarikan_barang`
--

DROP TABLE IF EXISTS `penarikan_barang`;
CREATE TABLE IF NOT EXISTS `penarikan_barang` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_expire` date NOT NULL,
  `qty` int(11) NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penarikan_barang`
--

INSERT INTO `penarikan_barang` (`id`, `kode_barang`, `nama_barang`, `tanggal_expire`, `qty`, `status`, `created_at`, `updated_at`) VALUES
(93, 'BRG000001', 'Samsung Galaxy A12', '2021-04-25', 0, '1', '2021-04-25 09:43:49', '2021-04-25 09:44:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_barang`
--

DROP TABLE IF EXISTS `pengajuan_barang`;
CREATE TABLE IF NOT EXISTS `pengajuan_barang` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_pengajuan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `qty` int(11) NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengajuan_barang`
--

INSERT INTO `pengajuan_barang` (`id`, `nama_pengajuan`, `nama_barang`, `tanggal_pengajuan`, `qty`, `status`, `created_at`, `updated_at`) VALUES
(7, 'Eri Sukmawan', 'Acer', '2021-04-27', 10, '1', '2021-04-27 06:43:13', '2021-04-27 06:43:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

DROP TABLE IF EXISTS `penjualan`;
CREATE TABLE IF NOT EXISTS `penjualan` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `no_faktur` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_faktur` date NOT NULL,
  `total_bayar` double NOT NULL,
  `pelanggan_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id`, `no_faktur`, `tgl_faktur`, `total_bayar`, `pelanggan_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'F606179000', '1972-06-17', 5980, 1, 1, '2021-04-27 03:49:08', '2021-04-27 03:49:08'),
(2, 'F239269512', '2003-01-22', 33034, 1, 1, '2021-04-27 03:49:08', '2021-04-27 03:49:08'),
(3, 'F04809539', '2002-01-17', 43585, 1, 1, '2021-04-27 03:49:08', '2021-04-27 03:49:08'),
(4, 'F847695358', '1984-08-19', 31479, 1, 1, '2021-04-27 03:49:08', '2021-04-27 03:49:08'),
(5, 'F983811873', '2004-09-21', 45461, 1, 1, '2021-04-27 03:49:08', '2021-04-27 03:49:08'),
(6, 'F933742534', '1990-10-14', 89999, 1, 1, '2021-04-27 06:36:33', '2021-04-27 06:36:33'),
(7, 'F880563681', '2013-05-31', 29623, 1, 1, '2021-04-27 06:36:34', '2021-04-27 06:36:34'),
(8, 'F182694208', '2002-02-09', 33606, 1, 1, '2021-04-27 06:36:34', '2021-04-27 06:36:34'),
(9, 'F58795394', '2005-06-23', 50234, 1, 1, '2021-04-27 06:36:34', '2021-04-27 06:36:34'),
(10, 'F574778758', '1995-04-18', 24558, 1, 1, '2021-04-27 06:36:34', '2021-04-27 06:36:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

DROP TABLE IF EXISTS `produk`;
CREATE TABLE IF NOT EXISTS `produk` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `created_at`, `updated_at`) VALUES
(3, 'Handphone', '2021-04-25 09:18:38', '2021-04-25 09:18:38'),
(5, 'Laptop', '2021-04-25 09:32:40', '2021-04-25 09:32:40'),
(6, 'Televisi', '2021-04-25 09:32:53', '2021-04-25 09:32:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tampung_bayar`
--

DROP TABLE IF EXISTS `tampung_bayar`;
CREATE TABLE IF NOT EXISTS `tampung_bayar` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `penjualan_id` int(11) NOT NULL,
  `total` double NOT NULL,
  `terima` double NOT NULL,
  `kembali` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(19, 'erisukmawan', 'erisukmawan03@gmail.com', NULL, '$2y$10$BuQICoWM654lA2qTJo9cz.swUZ2w.EXJFrmAiB3.f5tsRFlFsjR0O', NULL, '2021-04-27 06:24:30', '2021-04-27 06:24:30'),
(20, 'erisukmawan', 'erisukmawan03@gmail.com', '2021-04-27 06:38:38', 'erisukmawan', 'n3SY5o0tkI', '2021-04-27 06:38:39', '2021-04-27 06:38:39');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
