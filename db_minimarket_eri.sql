-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 18, 2021 at 11:47 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `barang`
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `barang_produk_id_index` (`produk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `produk_id`, `nama_barang`, `satuan`, `harga_jual`, `stock`, `created_at`, `updated_at`) VALUES
(1, '12353', 59289, 'Armstrong-Swift', '4', 4648461, '8', '2021-03-08 04:56:09', '2021-03-08 04:56:09'),
(2, '17524', 95807, 'Ortiz-Goldner', '1', 7431653, '1', '2021-03-08 04:56:09', '2021-03-08 04:56:09'),
(3, '48800', 18605, 'Lesch Ltd', '6', 8519791, '5', '2021-03-08 04:56:09', '2021-03-08 04:56:09'),
(4, '89167', 16151, 'Reichel, Schinner and White', '3', 7752800, '3', '2021-03-08 04:56:09', '2021-03-08 04:56:09'),
(5, '76741', 25119, 'Turner, Baumbach and Mertz', '5', 1171098, '8', '2021-03-08 04:56:09', '2021-03-08 04:56:09'),
(6, '33230', 38532, 'Jones, Von and McClure', '2', 7997384, '9', '2021-03-08 04:56:09', '2021-03-08 04:56:09'),
(7, '71100', 58924, 'Pollich Group', '3', 9062232, '9', '2021-03-08 04:56:09', '2021-03-08 04:56:09'),
(8, '26985', 42495, 'Becker, Harris and Lang', '10', 9190980, '7', '2021-03-08 04:56:09', '2021-03-08 04:56:09'),
(9, '34708', 10207, 'Cassin, Brekke and Daugherty', '3', 9205827, '5', '2021-03-08 04:56:09', '2021-03-08 04:56:09'),
(10, '41002', 54637, 'Bauch, Pfannerstill and Hauck', '1', 5313659, '5', '2021-03-08 04:56:09', '2021-03-08 04:56:09'),
(11, '98767', 44081, 'O\'Reilly, Thiel and Sawayn', '8', 4215759, '4', '2021-03-08 04:56:09', '2021-03-08 04:56:09'),
(12, '51025', 76249, 'Larson-Rutherford', '10', 9484243, '8', '2021-03-08 04:56:09', '2021-03-08 04:56:09'),
(13, '4703', 59723, 'Gottlieb Ltd', '3', 3714208, '9', '2021-03-08 04:56:09', '2021-03-08 04:56:09'),
(14, '90634', 10142, 'Lind, Abbott and Wiegand', '1', 6298923, '8', '2021-03-08 04:56:09', '2021-03-08 04:56:09'),
(15, '75590', 48866, 'Wehner Ltd', '4', 8008073, '4', '2021-03-08 04:56:09', '2021-03-08 04:56:09');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

DROP TABLE IF EXISTS `detail_pembelian`;
CREATE TABLE IF NOT EXISTS `detail_pembelian` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pembelian_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `harga_beli` double NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sub_total` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9303 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id`, `pembelian_id`, `barang_id`, `harga_beli`, `jumlah`, `sub_total`, `created_at`, `updated_at`) VALUES
(1364, 8043288, 8, 49860, 274, 41242, '2021-03-18 01:45:37', '2021-03-18 01:45:37'),
(1939, 5852268, 10, 99132, 791, 53241, '2021-03-18 01:45:37', '2021-03-18 01:45:37'),
(2375, 7880346, 1, 63362, 165, 66157, '2021-03-18 01:45:38', '2021-03-18 01:45:38'),
(2695, 6772883, 14, 90473, 366, 97152, '2021-03-18 01:45:38', '2021-03-18 01:45:38'),
(2860, 764289, 1, 94552, 210, 87131, '2021-03-18 01:45:38', '2021-03-18 01:45:38'),
(3588, 7476653, 13, 81938, 176, 95333, '2021-03-18 01:45:38', '2021-03-18 01:45:38'),
(4910, 2157158, 14, 56165, 861, 77117, '2021-03-18 01:45:38', '2021-03-18 01:45:38'),
(5293, 9028286, 14, 28676, 879, 45956, '2021-03-18 01:45:38', '2021-03-18 01:45:38'),
(6796, 9028286, 1, 52097, 527, 25653, '2021-03-18 01:45:37', '2021-03-18 01:45:37'),
(6899, 7880346, 15, 41978, 807, 51699, '2021-03-18 01:45:38', '2021-03-18 01:45:38'),
(7374, 764289, 6, 71766, 675, 45543, '2021-03-18 01:45:38', '2021-03-18 01:45:38'),
(7402, 7880346, 6, 31250, 497, 62877, '2021-03-18 01:45:37', '2021-03-18 01:45:37'),
(7898, 7476653, 8, 85925, 787, 69527, '2021-03-18 01:45:38', '2021-03-18 01:45:38'),
(8229, 6807727, 12, 62075, 893, 93136, '2021-03-18 01:45:37', '2021-03-18 01:45:37'),
(9302, 7880346, 10, 84858, 412, 52990, '2021-03-18 01:45:38', '2021-03-18 01:45:38');

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

DROP TABLE IF EXISTS `detail_penjualan`;
CREATE TABLE IF NOT EXISTS `detail_penjualan` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `penjualan_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `harga_jual` double NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sub_total` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=93139 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id`, `penjualan_id`, `barang_id`, `harga_jual`, `jumlah`, `sub_total`, `created_at`, `updated_at`) VALUES
(11273, 27293, 15, 44284, 75950, 86119, '2021-03-18 04:36:09', '2021-03-18 04:36:09'),
(17020, 56543, 12, 54161, 84072, 21301, '2021-03-18 04:36:09', '2021-03-18 04:36:09'),
(18021, 19557, 2, 90040, 65763, 43107, '2021-03-18 04:36:10', '2021-03-18 04:36:10'),
(19374, 49521, 12, 18963, 99211, 36603, '2021-03-18 04:36:09', '2021-03-18 04:36:09'),
(34834, 6807, 12, 65558, 17041, 50588, '2021-03-18 04:36:09', '2021-03-18 04:36:09'),
(51732, 56543, 2, 74414, 44189, 22108, '2021-03-18 04:36:10', '2021-03-18 04:36:10'),
(53364, 73859, 4, 90536, 79025, 14755, '2021-03-18 04:36:10', '2021-03-18 04:36:10'),
(62295, 30399, 14, 16350, 84944, 95175, '2021-03-18 04:36:10', '2021-03-18 04:36:10'),
(64484, 27293, 9, 58081, 12514, 28974, '2021-03-18 04:36:09', '2021-03-18 04:36:09'),
(65662, 30399, 3, 47054, 52975, 35157, '2021-03-18 04:36:10', '2021-03-18 04:36:10'),
(70357, 39167, 13, 29775, 92463, 76230, '2021-03-18 04:36:10', '2021-03-18 04:36:10'),
(70660, 2775, 12, 81383, 98011, 88247, '2021-03-18 04:36:10', '2021-03-18 04:36:10'),
(73782, 30399, 11, 35222, 17277, 88488, '2021-03-18 04:36:09', '2021-03-18 04:36:09'),
(85369, 27293, 13, 29361, 77608, 45673, '2021-03-18 04:36:10', '2021-03-18 04:36:10'),
(93138, 20580, 14, 27800, 90984, 45979, '2021-03-18 04:36:10', '2021-03-18 04:36:10');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(38, '2021_03_08_081150_create_pembelians_table', 1),
(39, '2021_03_08_081551_create_barangs_table', 1),
(40, '2021_03_08_081613_create_pemasoks_table', 1),
(41, '2021_03_08_081649_create_detail_pembelians_table', 1),
(42, '2021_03_08_081709_create_produks_table', 1),
(43, '2021_03_08_081728_create_penjualans_table', 1),
(44, '2021_03_08_081821_create_tampung_bayars_table', 1),
(45, '2021_03_08_082538_create_detail_penjualans_table', 1),
(46, '2021_03_08_082602_create_pelanggans_table', 1),
(47, '2021_03_08_082633_create_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_pelanggan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=95151 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `kode_pelanggan`, `nama`, `alamat`, `no_telp`, `email`, `created_at`, `updated_at`) VALUES
(9519, 'pl521305900', 'Miss Mara Green II', '4568 Carmen Trail Suite 792\nLockmanstad, SD 45868', '(602) 775-4366 x484', 'haag.dashawn@example.net', '2021-03-18 04:46:57', '2021-03-18 04:46:57'),
(12480, 'pl27881991', 'Roosevelt Heller', '598 Jay Summit Apt. 656\nLakinshire, FL 41130', '1-942-487-0566 x927', 'gmclaughlin@example.org', '2021-03-18 04:46:57', '2021-03-18 04:46:57'),
(24822, 'pl625295862', 'Lilliana Reichel', '62559 Lizzie Estates Apt. 276\nNew Tiara, VT 06360-7866', '1-724-768-4708 x726', 'chilpert@example.com', '2021-03-18 04:46:57', '2021-03-18 04:46:57'),
(27297, 'pl238377742', 'Leslie DuBuque', '99673 Bechtelar Canyon Apt. 280\nReillyview, TX 55092-6812', '1-653-960-8864', 'danika.weber@example.com', '2021-03-18 04:46:57', '2021-03-18 04:46:57'),
(32170, 'pl08373104', 'Prof. Tiffany Lehner IV', '741 Wunsch Harbors Suite 587\nMooreburgh, VT 06924-5426', '+1 (407) 940-9901', 'larkin.marie@example.net', '2021-03-18 04:46:57', '2021-03-18 04:46:57'),
(38558, 'pl642819861', 'Fidel Bahringer', '98050 Douglas Hollow Suite 518\nEmieberg, NE 26714', '1-435-803-9845 x6188', 'ellen.beatty@example.org', '2021-03-18 04:46:57', '2021-03-18 04:46:57'),
(47196, 'pl145709442', 'Robin Brown', '1756 Rosenbaum Plains\nElbertview, FL 57298-6721', '+1.547.815.7456', 'darryl.monahan@example.org', '2021-03-18 04:46:57', '2021-03-18 04:46:57'),
(52783, 'pl388568649', 'Dr. Elsie Zboncak', '5646 Eulah Grove\nHickleville, UT 30908', '+1-517-569-9337', 'ivah.quigley@example.net', '2021-03-18 04:46:57', '2021-03-18 04:46:57'),
(62988, 'pl279014339', 'Alf Hauck', '8719 Otto Springs Suite 626\nLake Alfonso, IL 37523-1667', '+1-943-660-1588', 'nkihn@example.com', '2021-03-18 04:46:57', '2021-03-18 04:46:57'),
(66577, 'pl230021178', 'Estell Conroy', '43433 Brain Path\nNorth Antonetta, MO 50692-2041', '(819) 534-7269', 'ruby.kreiger@example.org', '2021-03-18 04:46:57', '2021-03-18 04:46:57'),
(73042, 'pl500104896', 'Kole Bashirian', '2292 Wilkinson Oval\nNew Andreaneland, DE 36698-9941', '+1.521.288.7505', 'orrin.kling@example.org', '2021-03-18 04:46:57', '2021-03-18 04:46:57'),
(81135, 'pl41488264', 'Miss Lillian Gutmann DVM', '8445 Amari Shoal Suite 273\nPort Josianeside, WV 24045-1583', '701.329.3126 x228', 'cokon@example.org', '2021-03-18 04:46:57', '2021-03-18 04:46:57'),
(82182, 'pl447308527', 'Vernon Douglas', '1605 Upton Lodge Suite 611\nPort Margaretteside, WA 34369', '619-527-2757 x16700', 'wolff.hershel@example.org', '2021-03-18 04:46:57', '2021-03-18 04:46:57'),
(83603, 'pl130653356', 'Riley Grady', '597 Gerlach Islands\nOndrickamouth, VA 73109-5648', '735.982.0397', 'geovanni21@example.net', '2021-03-18 04:46:57', '2021-03-18 04:46:57'),
(95150, 'pl352025007', 'Mr. Ricky Thompson MD', '9761 Thad Heights Apt. 671\nBartellland, SD 24352', '+1-709-678-3981', 'xkilback@example.com', '2021-03-18 04:46:57', '2021-03-18 04:46:57');

-- --------------------------------------------------------

--
-- Table structure for table `pemasok`
--

DROP TABLE IF EXISTS `pemasok`;
CREATE TABLE IF NOT EXISTS `pemasok` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_pemasok` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pemasok` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemasok`
--

INSERT INTO `pemasok` (`id`, `kode_pemasok`, `nama_pemasok`, `alamat`, `kota`, `no_telp`, `created_at`, `updated_at`) VALUES
(1, '57820', 'Raynor Inc', '872 Boehm Stream\nPort Richard, WV 12968', 'New Nashfort', '1-406-522-0896 x397', '2021-03-08 04:56:08', '2021-03-08 04:56:08'),
(2, '22530', 'Moore-Hamill', '2011 Zechariah Forks\nSchillerview, MD 28692', 'Krajcikstad', '(969) 888-7709 x0128', '2021-03-08 04:56:08', '2021-03-08 04:56:08'),
(3, '19520', 'Sanford Ltd', '77452 Norma Forest Apt. 185\nFatimatown, DE 71491-7778', 'Alycechester', '983-960-4835', '2021-03-08 04:56:08', '2021-03-08 04:56:08'),
(4, '35083', 'Cassin-Gottlieb', '6215 Myra Road\nLake Donald, KS 17394-8755', 'North Gail', '1-353-440-0618 x9030', '2021-03-08 04:56:08', '2021-03-08 04:56:08'),
(5, '43734', 'Rogahn-Little', '90880 O\'Conner Dam\nLilaland, MD 77589-8465', 'Port Zachariahbury', '+1-951-556-2779', '2021-03-08 04:56:08', '2021-03-08 04:56:08'),
(6, '68097', 'Stroman Ltd', '68135 Mabelle Plaza Suite 753\nLake Eldon, AZ 22711', 'Wilkinsontown', '(212) 247-5154 x5308', '2021-03-08 04:56:08', '2021-03-08 04:56:08'),
(7, '39545', 'Marquardt, Crooks and Corkery', '56140 Kyleigh Viaduct Apt. 358\nMaynardshire, ND 84412-2555', 'Port Maryamside', '579.481.8830', '2021-03-08 04:56:08', '2021-03-08 04:56:08'),
(8, '7971', 'Cassin, McKenzie and Labadie', '877 Margarette Burgs\nLindashire, AZ 14734-9726', 'West Giovanni', '(847) 836-7406 x6048', '2021-03-08 04:56:08', '2021-03-08 04:56:08'),
(9, '39560', 'Hayes-Emmerich', '46886 Kemmer Expressway\nCarsonstad, WV 91692', 'Gislasonland', '(283) 819-6747 x5967', '2021-03-08 04:56:08', '2021-03-08 04:56:08'),
(10, '63084', 'Bergnaum-Fahey', '480 Christina Roads\nPort Bridieport, MO 92291-8951', 'West Mariela', '393-588-1742', '2021-03-08 04:56:08', '2021-03-08 04:56:08'),
(11, '82306', 'Stehr PLC', '3282 Mohr Circle\nFlavioland, CO 67284-0200', 'Port Zackeryville', '831-307-8957 x3764', '2021-03-08 04:56:08', '2021-03-08 04:56:08'),
(12, '29428', 'Price-Kuhn', '455 Turcotte Ville\nNew Miltonburgh, VT 96216-5730', 'Bernhardtown', '(296) 994-4679 x6638', '2021-03-08 04:56:08', '2021-03-08 04:56:08'),
(13, '20696', 'Corwin, Borer and Kertzmann', '82988 Lindgren Forge\nKalebfort, LA 01288', 'Shanahanfurt', '(432) 348-4603 x0095', '2021-03-08 04:56:09', '2021-03-08 04:56:09'),
(14, '40486', 'Wehner-Haag', '520 Ashlee Corner Apt. 545\nNorth Deshaunfort, KS 98206', 'Lake Adelashire', '551.965.5290 x5400', '2021-03-08 04:56:09', '2021-03-08 04:56:09'),
(15, '43204', 'Block-Grimes', '35764 Hane Loaf\nWest Kennith, TX 07323-2331', 'Thomasview', '1-290-237-6303 x176', '2021-03-08 04:56:09', '2021-03-08 04:56:09');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

DROP TABLE IF EXISTS `pembelian`;
CREATE TABLE IF NOT EXISTS `pembelian` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_masuk` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `total` double NOT NULL,
  `pemasok_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=99049 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `kode_masuk`, `tanggal_masuk`, `total`, `pemasok_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2990, 'P451541256', '2006-03-12', 124952, 7343, 50188, '2021-03-18 01:38:58', '2021-03-18 01:38:58'),
(5427, 'P834856718', '1998-10-14', 205862, 96645, 25513, '2021-03-18 01:45:37', '2021-03-18 01:45:37'),
(10170, 'P114534114', '1973-07-15', 206772, 67206, 47190, '2021-03-18 01:45:37', '2021-03-18 01:45:37'),
(12244, 'P462112283', '1999-08-06', 637651, 42750, 59124, '2021-03-18 01:38:57', '2021-03-18 01:38:57'),
(13466, 'P65053866', '2010-12-25', 609867, 13325, 19409, '2021-03-18 01:45:37', '2021-03-18 01:45:37'),
(14202, 'P529128541', '2018-11-23', 967285, 76099, 48193, '2021-03-18 01:45:37', '2021-03-18 01:45:37'),
(15837, 'P102679165', '1988-01-10', 699693, 51586, 39184, '2021-03-18 01:45:37', '2021-03-18 01:45:37'),
(19323, 'P906893218', '2016-11-19', 541049, 70871, 68593, '2021-03-18 01:45:37', '2021-03-18 01:45:37'),
(22756, 'P658995122', '2005-05-13', 379773, 92243, 65479, '2021-03-18 01:45:36', '2021-03-18 01:45:36'),
(26883, 'P741615489', '1992-04-09', 501110, 5758, 13711, '2021-03-18 01:38:57', '2021-03-18 01:38:57'),
(27576, 'P394879326', '1998-12-04', 217993, 82727, 29072, '2021-03-18 01:38:57', '2021-03-18 01:38:57'),
(27735, 'P850904494', '1996-01-09', 834615, 52518, 7828, '2021-03-18 01:45:37', '2021-03-18 01:45:37'),
(36722, 'P328454785', '2010-09-02', 286768, 46415, 75852, '2021-03-18 01:45:36', '2021-03-18 01:45:36'),
(44394, 'P39112898', '2018-02-05', 928960, 9985, 94066, '2021-03-18 01:45:37', '2021-03-18 01:45:37'),
(47047, 'P795845013', '2013-02-25', 625287, 21469, 21853, '2021-03-18 01:45:36', '2021-03-18 01:45:36'),
(50554, 'P327636921', '2018-07-20', 630885, 6049, 25493, '2021-03-18 01:38:57', '2021-03-18 01:38:57'),
(51049, 'P486563179', '1991-08-10', 943182, 7266, 30097, '2021-03-18 01:38:57', '2021-03-18 01:38:57'),
(55316, 'P16362120', '2010-06-06', 121839, 41264, 11627, '2021-03-18 01:45:37', '2021-03-18 01:45:37'),
(56340, 'P994672056', '1980-11-25', 101562, 77820, 75642, '2021-03-18 01:38:57', '2021-03-18 01:38:57'),
(56885, 'P479828539', '2000-02-02', 208746, 61316, 12247, '2021-03-18 01:45:36', '2021-03-18 01:45:36'),
(60589, 'P284334828', '2015-06-02', 369894, 19059, 11128, '2021-03-18 01:38:58', '2021-03-18 01:38:58'),
(66183, 'P109735373', '2005-07-05', 824824, 15388, 90708, '2021-03-18 01:45:37', '2021-03-18 01:45:37'),
(69763, 'P741474129', '1980-04-03', 217399, 43328, 97792, '2021-03-18 01:38:57', '2021-03-18 01:38:57'),
(73892, 'P83721314', '1983-12-26', 745365, 69992, 12547, '2021-03-18 01:38:57', '2021-03-18 01:38:57'),
(78379, 'P23879290', '2018-05-19', 313915, 99078, 40422, '2021-03-18 01:38:57', '2021-03-18 01:38:57'),
(92153, 'P71102341', '2008-02-24', 152767, 45552, 62441, '2021-03-18 01:38:57', '2021-03-18 01:38:57'),
(92431, 'P78780710', '1991-09-28', 94943, 32519, 12697, '2021-03-18 01:38:57', '2021-03-18 01:38:57'),
(98820, 'P303677796', '1972-01-09', 696382, 40172, 10123, '2021-03-18 01:38:57', '2021-03-18 01:38:57'),
(98944, 'P882154456', '1983-08-17', 287144, 35612, 73495, '2021-03-18 01:45:37', '2021-03-18 01:45:37'),
(99048, 'P980571489', '1980-04-04', 58357, 89874, 44122, '2021-03-18 01:38:57', '2021-03-18 01:38:57');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

DROP TABLE IF EXISTS `penjualan`;
CREATE TABLE IF NOT EXISTS `penjualan` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `no_faktur` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_faktur` date NOT NULL,
  `total_bayar` double NOT NULL,
  `pelanggan_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=98167 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `no_faktur`, `tgl_faktur`, `total_bayar`, `pelanggan_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2775, 'F685440777', '1980-02-25', 420795, 455683, 703542, '2021-03-18 02:33:32', '2021-03-18 02:33:32'),
(5013, 'F693195886', '1980-01-19', 632180, 682213, 124302, '2021-03-18 04:24:57', '2021-03-18 04:24:57'),
(6807, 'F427625023', '1979-10-08', 698079, 739323, 58519, '2021-03-18 04:24:57', '2021-03-18 04:24:57'),
(9104, 'F270538818', '2004-04-08', 30852, 930841, 376787, '2021-03-18 02:33:31', '2021-03-18 02:33:31'),
(9192, 'F856385789', '1970-04-10', 542256, 209252, 394935, '2021-03-18 04:24:56', '2021-03-18 04:24:56'),
(19557, 'F314470783', '2000-07-10', 160805, 311180, 551734, '2021-03-18 02:33:32', '2021-03-18 02:33:32'),
(20580, 'F404092657', '2002-08-24', 693873, 467832, 614573, '2021-03-18 04:24:56', '2021-03-18 04:24:56'),
(20761, 'F44575473', '1974-01-20', 152706, 123723, 612673, '2021-03-18 04:24:56', '2021-03-18 04:24:56'),
(21742, 'F549021906', '1974-03-06', 311627, 927209, 259340, '2021-03-18 04:25:40', '2021-03-18 04:25:40'),
(22220, 'F05021940', '1991-03-21', 154113, 489159, 406401, '2021-03-18 04:25:40', '2021-03-18 04:25:40'),
(23061, 'F215501254', '1997-12-20', 784641, 173664, 705591, '2021-03-18 04:25:40', '2021-03-18 04:25:40'),
(27293, 'F782803700', '1990-03-13', 220660, 474772, 147947, '2021-03-18 02:33:32', '2021-03-18 02:33:32'),
(30399, 'F224182782', '1996-04-07', 442069, 731135, 260447, '2021-03-18 04:24:56', '2021-03-18 04:24:56'),
(32405, 'F864028321', '1993-01-03', 273129, 689485, 53056, '2021-03-18 04:24:57', '2021-03-18 04:24:57'),
(33590, 'F94454502', '1989-01-30', 271876, 607487, 622698, '2021-03-18 04:25:40', '2021-03-18 04:25:40'),
(39167, 'F832505619', '1991-12-30', 891996, 342609, 309276, '2021-03-18 04:24:55', '2021-03-18 04:24:55'),
(40396, 'F412939368', '1970-01-16', 22854, 382645, 860002, '2021-03-18 02:33:32', '2021-03-18 02:33:32'),
(43084, 'F194670234', '2008-09-03', 403403, 416804, 969849, '2021-03-18 04:25:41', '2021-03-18 04:25:41'),
(43203, 'F997785047', '1984-12-19', 276180, 615390, 560381, '2021-03-18 04:24:56', '2021-03-18 04:24:56'),
(46156, 'F249924799', '1987-02-23', 998096, 995212, 299432, '2021-03-18 04:24:57', '2021-03-18 04:24:57'),
(48225, 'F980334986', '1989-05-22', 783871, 383759, 961119, '2021-03-18 02:33:32', '2021-03-18 02:33:32'),
(48505, 'F85244302', '2009-04-13', 517191, 525085, 486108, '2021-03-18 04:24:56', '2021-03-18 04:24:56'),
(49521, 'F20869289', '2008-06-23', 295682, 175764, 496743, '2021-03-18 02:33:31', '2021-03-18 02:33:31'),
(55370, 'F983531072', '2009-05-07', 295397, 471309, 499691, '2021-03-18 02:33:31', '2021-03-18 02:33:31'),
(56543, 'F74667416', '2009-10-05', 780201, 663099, 153260, '2021-03-18 04:25:40', '2021-03-18 04:25:40'),
(59192, 'F09286585', '1990-02-05', 476792, 401395, 232396, '2021-03-18 04:24:56', '2021-03-18 04:24:56'),
(61102, 'F183199158', '1985-01-13', 418559, 84161, 572109, '2021-03-18 04:25:40', '2021-03-18 04:25:40'),
(62580, 'F673453496', '1994-02-01', 324266, 246933, 30431, '2021-03-18 02:33:31', '2021-03-18 02:33:31'),
(65327, 'F684405499', '1975-07-29', 304142, 562443, 435619, '2021-03-18 02:33:31', '2021-03-18 02:33:31'),
(68107, 'F101193802', '2018-08-12', 905673, 648562, 87111, '2021-03-18 04:25:40', '2021-03-18 04:25:40'),
(71766, 'F788537345', '1988-07-20', 801599, 354942, 864871, '2021-03-18 04:25:40', '2021-03-18 04:25:40'),
(73859, 'F605988185', '1984-02-26', 314985, 924107, 701055, '2021-03-18 04:25:41', '2021-03-18 04:25:41'),
(77666, 'F216419827', '1998-04-10', 265420, 669025, 668266, '2021-03-18 04:24:56', '2021-03-18 04:24:56'),
(79226, 'F173737504', '1984-06-21', 393084, 616603, 760754, '2021-03-18 02:33:32', '2021-03-18 02:33:32'),
(83742, 'F573529291', '2001-06-30', 547578, 680011, 44789, '2021-03-18 04:24:57', '2021-03-18 04:24:57'),
(83856, 'F514443144', '2001-11-15', 103144, 307224, 875838, '2021-03-18 02:33:31', '2021-03-18 02:33:31'),
(84767, 'F988419185', '1996-05-20', 843143, 246598, 58276, '2021-03-18 04:25:41', '2021-03-18 04:25:41'),
(85909, 'F965980031', '2009-07-15', 115750, 470304, 704224, '2021-03-18 02:33:32', '2021-03-18 02:33:32'),
(87060, 'F68446501', '1973-05-06', 283798, 650845, 699569, '2021-03-18 04:25:40', '2021-03-18 04:25:40'),
(93592, 'F874634729', '2003-12-17', 74022, 831720, 825056, '2021-03-18 04:24:56', '2021-03-18 04:24:56'),
(93832, 'F943973909', '2000-01-31', 991637, 180739, 175138, '2021-03-18 04:25:41', '2021-03-18 04:25:41'),
(94433, 'F525471034', '2014-01-23', 841801, 134007, 471912, '2021-03-18 04:25:40', '2021-03-18 04:25:40'),
(95626, 'F602015137', '1997-02-18', 27409, 923589, 656296, '2021-03-18 02:33:32', '2021-03-18 02:33:32'),
(96482, 'F667202929', '1977-01-10', 999090, 529734, 740763, '2021-03-18 04:25:41', '2021-03-18 04:25:41'),
(98166, 'F578340459', '1990-12-24', 544068, 611253, 255611, '2021-03-18 02:33:31', '2021-03-18 02:33:31');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

DROP TABLE IF EXISTS `produk`;
CREATE TABLE IF NOT EXISTS `produk` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9512392 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `created_at`, `updated_at`) VALUES
(764289, 'kaos', '2021-03-18 01:29:02', '2021-03-18 01:29:02'),
(2157158, 'kaos', '2021-03-18 01:29:02', '2021-03-18 01:29:02'),
(2388896, 'sepatu', '2021-03-18 01:29:02', '2021-03-18 01:29:02'),
(4225535, 'celana,baju', '2021-03-18 01:29:01', '2021-03-18 01:29:01'),
(5209062, 'sepatu', '2021-03-18 01:29:01', '2021-03-18 01:29:01'),
(5852268, 'celana,baju', '2021-03-18 01:29:02', '2021-03-18 01:29:02'),
(6772883, 'celana,baju', '2021-03-18 01:29:02', '2021-03-18 01:29:02'),
(6807727, 'kaos', '2021-03-18 01:29:01', '2021-03-18 01:29:01'),
(7241409, 'celana,baju', '2021-03-18 01:29:02', '2021-03-18 01:29:02'),
(7476653, 'kaos', '2021-03-18 01:29:02', '2021-03-18 01:29:02'),
(7880346, 'sepatu', '2021-03-18 01:29:02', '2021-03-18 01:29:02'),
(8043288, 'celana,baju', '2021-03-18 01:29:02', '2021-03-18 01:29:02'),
(8302125, 'sepatu', '2021-03-18 01:29:02', '2021-03-18 01:29:02'),
(9028286, 'celana,baju', '2021-03-18 01:29:02', '2021-03-18 01:29:02'),
(9512391, 'sepatu', '2021-03-18 01:29:01', '2021-03-18 01:29:01');

-- --------------------------------------------------------

--
-- Table structure for table `tampung_bayar`
--

DROP TABLE IF EXISTS `tampung_bayar`;
CREATE TABLE IF NOT EXISTS `tampung_bayar` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `penjualan_id` int(11) NOT NULL,
  `total` double NOT NULL,
  `terima` double NOT NULL,
  `kembali` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tampung_bayar`
--

INSERT INTO `tampung_bayar` (`id`, `penjualan_id`, `total`, `terima`, `kembali`, `created_at`, `updated_at`) VALUES
(1, 98166, 37316, 25842, 40027, '2021-03-18 04:28:19', '2021-03-18 04:28:19'),
(2, 23061, 80596, 50884, 58432, '2021-03-18 04:28:20', '2021-03-18 04:28:20'),
(3, 93592, 52181, 18978, 58037, '2021-03-18 04:28:20', '2021-03-18 04:28:20'),
(4, 85909, 20046, 51392, 52605, '2021-03-18 04:28:20', '2021-03-18 04:28:20'),
(5, 85909, 25123, 95356, 91231, '2021-03-18 04:28:20', '2021-03-18 04:28:20'),
(6, 79226, 57934, 40643, 30600, '2021-03-18 04:28:20', '2021-03-18 04:28:20'),
(7, 87060, 64106, 76718, 72284, '2021-03-18 04:28:20', '2021-03-18 04:28:20'),
(8, 9192, 38993, 38162, 33054, '2021-03-18 04:28:20', '2021-03-18 04:28:20'),
(9, 59192, 75201, 93568, 28013, '2021-03-18 04:28:20', '2021-03-18 04:28:20'),
(10, 32405, 92104, 58712, 76750, '2021-03-18 04:28:20', '2021-03-18 04:28:20'),
(11, 96482, 83805, 25759, 55191, '2021-03-18 04:28:20', '2021-03-18 04:28:20'),
(12, 94433, 80415, 47726, 80336, '2021-03-18 04:28:21', '2021-03-18 04:28:21'),
(13, 19557, 70639, 10578, 39780, '2021-03-18 04:28:21', '2021-03-18 04:28:21'),
(14, 85909, 15689, 91323, 82618, '2021-03-18 04:28:21', '2021-03-18 04:28:21'),
(15, 85909, 87859, 65072, 69150, '2021-03-18 04:28:21', '2021-03-18 04:28:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Eladio Schuster', 'rutherford.guadalupe@example.com', '2021-03-18 04:39:50', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'f2jq2blAJo', '2021-03-18 04:39:50', '2021-03-18 04:39:50'),
(2, 'Elsie Bergstrom', 'justina12@example.com', '2021-03-18 04:39:50', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'wDIJSY5wvk', '2021-03-18 04:39:50', '2021-03-18 04:39:50'),
(3, 'Mr. Bret Goldner', 'dhand@example.com', '2021-03-18 04:39:50', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'kwhdxjsjwO', '2021-03-18 04:39:51', '2021-03-18 04:39:51'),
(4, 'Dr. Loy Witting', 'elinor.kreiger@example.com', '2021-03-18 04:39:50', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'F3R2x2FzxA', '2021-03-18 04:39:51', '2021-03-18 04:39:51'),
(5, 'Wilfredo Pfeffer', 'schulist.sid@example.net', '2021-03-18 04:39:50', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '7cCgDVEOzm', '2021-03-18 04:39:51', '2021-03-18 04:39:51'),
(6, 'Mr. Kris Bailey Sr.', 'kade.crist@example.org', '2021-03-18 04:39:50', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'XqkcTcFxdY', '2021-03-18 04:39:51', '2021-03-18 04:39:51'),
(7, 'Vida Wolf', 'orville85@example.org', '2021-03-18 04:39:50', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'uuTKMDrL2U', '2021-03-18 04:39:51', '2021-03-18 04:39:51'),
(8, 'Ms. Nayeli Blanda', 'trisha94@example.net', '2021-03-18 04:39:50', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '8VXvraCWYI', '2021-03-18 04:39:51', '2021-03-18 04:39:51'),
(9, 'Morris Reinger', 'bahringer.ayden@example.net', '2021-03-18 04:39:50', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'gbjL6gjorM', '2021-03-18 04:39:51', '2021-03-18 04:39:51'),
(10, 'Prof. Garret Medhurst', 'keeling.rey@example.com', '2021-03-18 04:39:50', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'D04A66WuxB', '2021-03-18 04:39:51', '2021-03-18 04:39:51'),
(11, 'Chester Rogahn', 'agerlach@example.org', '2021-03-18 04:39:50', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'za3dG77fDM', '2021-03-18 04:39:51', '2021-03-18 04:39:51'),
(12, 'Audra Gaylord V', 'bonnie94@example.com', '2021-03-18 04:39:50', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '5D54oyOa6v', '2021-03-18 04:39:51', '2021-03-18 04:39:51'),
(13, 'Alisha Rosenbaum DDS', 'hhane@example.net', '2021-03-18 04:39:50', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'UAw6wvvpkD', '2021-03-18 04:39:51', '2021-03-18 04:39:51'),
(14, 'Camylle Powlowski', 'kelton.stokes@example.net', '2021-03-18 04:39:50', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'cPaGY5jMKn', '2021-03-18 04:39:51', '2021-03-18 04:39:51'),
(15, 'Troy Buckridge', 'sallie.harber@example.org', '2021-03-18 04:39:50', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'eFKIMTgsa5', '2021-03-18 04:39:51', '2021-03-18 04:39:51'),
(16, 'Major Koelpin', 'francesco63@example.net', '2021-03-18 04:46:22', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'xedja3GcuI', '2021-03-18 04:46:22', '2021-03-18 04:46:22'),
(17, 'Prof. Colleen O\'Hara', 'noemi.paucek@example.org', '2021-03-18 04:46:22', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'TlOl6Bny5P', '2021-03-18 04:46:22', '2021-03-18 04:46:22'),
(18, 'Dee Schmeler', 'verlie.pollich@example.com', '2021-03-18 04:46:22', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'seW3bT60XU', '2021-03-18 04:46:22', '2021-03-18 04:46:22'),
(19, 'Prof. Jaylon Sauer', 'dasia61@example.org', '2021-03-18 04:46:22', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'dDUGBHVqro', '2021-03-18 04:46:22', '2021-03-18 04:46:22'),
(20, 'Prof. Darrell Hill', 'reinger.domenica@example.com', '2021-03-18 04:46:22', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'RLMZK4y5Oz', '2021-03-18 04:46:22', '2021-03-18 04:46:22'),
(21, 'Carey Kuhn', 'prohaska.kathryne@example.net', '2021-03-18 04:46:22', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'x4Ij9Ozib6', '2021-03-18 04:46:22', '2021-03-18 04:46:22'),
(22, 'Monique Kutch', 'lilly.aufderhar@example.com', '2021-03-18 04:46:22', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'NqRP6R6Rrd', '2021-03-18 04:46:22', '2021-03-18 04:46:22'),
(23, 'Mr. Isaac VonRueden PhD', 'marques.gaylord@example.com', '2021-03-18 04:46:22', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Rp5n7m16Zv', '2021-03-18 04:46:22', '2021-03-18 04:46:22'),
(24, 'Hal Macejkovic', 'tbechtelar@example.net', '2021-03-18 04:46:22', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'C2UhGuIfOq', '2021-03-18 04:46:22', '2021-03-18 04:46:22'),
(25, 'Nat Ankunding', 'christiansen.zachary@example.net', '2021-03-18 04:46:22', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'aJedzYHCWG', '2021-03-18 04:46:22', '2021-03-18 04:46:22'),
(26, 'Toy Kuhn', 'schowalter.gust@example.com', '2021-03-18 04:46:22', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'IvzQY5bNDN', '2021-03-18 04:46:22', '2021-03-18 04:46:22'),
(27, 'Armani Schroeder', 'adeline.fisher@example.net', '2021-03-18 04:46:22', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '2z6CyVmR7Q', '2021-03-18 04:46:22', '2021-03-18 04:46:22'),
(28, 'Silas Mueller', 'dario.sauer@example.org', '2021-03-18 04:46:22', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'FZCclLp6iB', '2021-03-18 04:46:22', '2021-03-18 04:46:22'),
(29, 'Adeline Weber', 'schuppe.madisyn@example.net', '2021-03-18 04:46:22', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'M5vgf0Cop9', '2021-03-18 04:46:22', '2021-03-18 04:46:22'),
(30, 'Stone Schaefer', 'pink.hill@example.net', '2021-03-18 04:46:22', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'W4a5dXxG3U', '2021-03-18 04:46:22', '2021-03-18 04:46:22');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
