-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Mar 2021 pada 07.41
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_electric_payment`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateStatusTagihan` (`tagihan_id` INT(11))  BEGIN
	UPDATE tagihan
    SET status = 'diproses'
    WHERE id = tagihan_id;
END$$

--
-- Fungsi
--
CREATE DEFINER=`root`@`localhost` FUNCTION `jumlah_bayar` (`jumlah_meter` INT, `tarif` INT) RETURNS INT(11) BEGIN
	RETURN jumlah_meter * tarif;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `activity_log`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `activity_log` (
`id` bigint(20) unsigned
,`nama_log` varchar(255)
,`tabel` varchar(255)
,`id_referensi` varchar(255)
,`user_id` bigint(20) unsigned
,`deskripsi` varchar(255)
,`created_at` timestamp
,`updated_at` timestamp
,`nama_user` varchar(50)
,`nama_level` varchar(20)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_level` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id`, `nama_level`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'bank', NULL, NULL),
(3, 'pelanggan', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

CREATE TABLE `log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_log` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tabel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_referensi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `metode`
--

CREATE TABLE `metode` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_metode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `metode`
--

INSERT INTO `metode` (`id`, `nama_metode`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'bca', 2, '2021-03-20 23:33:13', '2021-03-20 23:33:13'),
(2, 'bri', 3, '2021-03-20 23:33:13', '2021-03-20 23:33:13'),
(3, 'mandiri', 4, '2021-03-20 23:33:13', '2021-03-20 23:33:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_02_20_084837_create_level_table', 1),
(2, '2021_02_21_124713_create_users_table', 1),
(3, '2021_02_22_022251_create_tarif_table', 1),
(4, '2021_02_23_061509_create_pelanggan_table', 1),
(5, '2021_02_23_092551_create_penggunaan_table', 1),
(6, '2021_02_23_092752_create_tagihan_table', 1),
(7, '2021_02_23_094925_create_metode_table', 1),
(8, '2021_02_23_094954_create_pembayaran_table', 1),
(9, '2021_03_02_033614_create_log_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_meter` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pelanggan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarif_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nomor_meter`, `nama_pelanggan`, `alamat`, `tarif_id`, `created_at`, `updated_at`) VALUES
(1, '32153211001', 'gunawan', 'Jl. Bungur Raya No.28, Kel.Jakasampurna, Kec.Bekasi Barat, Kota Bekasi, Jawa Barat', 1, '2021-03-20 23:33:11', '2021-03-20 23:33:11'),
(2, '32153211002', 'cahyadi', 'Jl. Fajar Baru No.8, Kel.Jakasampurna, Kec.Bekasi Barat, Kota Bekasi, Jawa Barat', 2, '2021-03-20 23:33:11', '2021-03-20 23:33:11'),
(3, '32153211003', 'lilis heryati', 'Jl. Fajar Asri No.18, Kel.Jakasampurna, Kec.Bekasi Barat, Kota Bekasi, Jawa Barat', 2, '2021-03-20 23:33:11', '2021-03-20 23:33:11'),
(4, '32153211004', 'lia panjaitan', 'Jl. Kenangan No.52, Kel.Jakasampurna, Kec.Bekasi Barat, Kota Bekasi, Jawa Barat', 3, '2021-03-20 23:33:11', '2021-03-20 23:33:11'),
(5, '32153211005', 'ahmad kurniawan', 'Jl. Imam Bonjol No.22, Kel.Jakasampurna, Kec.Bekasi Barat, Kota Bekasi, Jawa Barat', 4, '2021-03-20 23:33:11', '2021-03-20 23:33:11'),
(6, '32153211006', 'supardi', 'Jl. Dahlia Raya No.102, Kel.Jakasampurna, Kec.Bekasi Barat, Kota Bekasi, Jawa Barat', 1, '2021-03-20 23:33:11', '2021-03-20 23:33:11'),
(7, '32153211007', 'iksan fikryanto', 'Jl. Puri I No.35, Kel.Jakasampurna, Kec.Bekasi Barat, Kota Bekasi, Jawa Barat', 5, '2021-03-20 23:33:11', '2021-03-20 23:33:11'),
(8, '32153211008', 'reja setiawan', 'Jl. Cempaka No.99, Kel.Jakasampurna, Kec.Bekasi Barat, Kota Bekasi, Jawa Barat', 4, '2021-03-20 23:33:11', '2021-03-20 23:33:11'),
(9, '32153211009', 'nashwa ramadan', 'Jl. Mawar No.12, Kel.Jakasampurna, Kec.Bekasi Barat, Kota Bekasi, Jawa Barat', 3, '2021-03-20 23:33:11', '2021-03-20 23:33:11'),
(10, '32153211010', 'yudhistira', 'Jl. Nangka No.25, Kel.Jakasampurna, Kec.Bekasi Barat, Kota Bekasi, Jawa Barat', 5, '2021-03-20 23:33:11', '2021-03-20 23:33:11');

--
-- Trigger `pelanggan`
--
DELIMITER $$
CREATE TRIGGER `delete_pelanggan` AFTER DELETE ON `pelanggan` FOR EACH ROW INSERT INTO log VALUES ('','DELETE','Pelanggan', Old.id ,1,'Menghapus Data Pelanggan',now(),null)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_pelanggan` AFTER INSERT ON `pelanggan` FOR EACH ROW INSERT INTO log VALUES ('','INSERT','Pelanggan',New.id,1,'Menambah Data Pelanggan',now(),null)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_pelanggan` AFTER UPDATE ON `pelanggan` FOR EACH ROW INSERT INTO log VALUES ('','UPDATE','Pelanggan',New.id,1,'Mengubah Data Pelanggan',now(),null)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tagihan_id` bigint(20) UNSIGNED NOT NULL,
  `pelanggan_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `bulan_bayar` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_bayar` year(4) NOT NULL,
  `biaya_admin` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `metode_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_bayar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penggunaan`
--

CREATE TABLE `penggunaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pelanggan_id` bigint(20) UNSIGNED NOT NULL,
  `bulan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` year(4) NOT NULL,
  `meter_awal` int(11) NOT NULL,
  `meter_akhir` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penggunaan`
--

INSERT INTO `penggunaan` (`id`, `pelanggan_id`, `bulan`, `tahun`, `meter_awal`, `meter_akhir`, `created_at`, `updated_at`) VALUES
(1, 1, 'januari', 2021, 0, 150, '2021-03-20 23:33:12', '2021-03-20 23:33:12'),
(2, 2, 'januari', 2021, 50, 250, '2021-03-20 23:33:12', '2021-03-20 23:33:12'),
(3, 3, 'januari', 2021, 0, 200, '2021-03-20 23:33:12', '2021-03-20 23:33:12'),
(4, 4, 'januari', 2021, 50, 150, '2021-03-20 23:33:12', '2021-03-20 23:33:12'),
(5, 5, 'januari', 2021, 0, 100, '2021-03-20 23:33:12', '2021-03-20 23:33:12'),
(6, 6, 'januari', 2021, 0, 150, '2021-03-20 23:33:12', '2021-03-20 23:33:12'),
(7, 7, 'januari', 2021, 30, 100, '2021-03-20 23:33:12', '2021-03-20 23:33:12'),
(8, 8, 'januari', 2021, 100, 300, '2021-03-20 23:33:12', '2021-03-20 23:33:12'),
(9, 9, 'januari', 2021, 50, 100, '2021-03-20 23:33:12', '2021-03-20 23:33:12'),
(10, 10, 'januari', 2021, 100, 250, '2021-03-20 23:33:12', '2021-03-20 23:33:12');

--
-- Trigger `penggunaan`
--
DELIMITER $$
CREATE TRIGGER `delete_penggunaan` AFTER DELETE ON `penggunaan` FOR EACH ROW INSERT INTO log VALUES ('','DELETE','Penggunaan',Old.id,1,'Menghapus Data Penggunaan',now(),null)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_penggunaan` AFTER INSERT ON `penggunaan` FOR EACH ROW INSERT INTO log VALUES ('','INSERT','Penggunaan',New.id,1,'Menambah Data Penggunaan',now(),null)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_penggunaan` AFTER UPDATE ON `penggunaan` FOR EACH ROW INSERT INTO log VALUES ('','UPDATE','Penggunaan',New.id,1,'Mengubah Data Penggunaan',now(),null)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `riwayat`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `riwayat` (
`id` bigint(20) unsigned
,`tagihan_id` bigint(20) unsigned
,`pelanggan_id` bigint(20) unsigned
,`tanggal_pembayaran` date
,`bulan_bayar` varchar(10)
,`tahun_bayar` year(4)
,`biaya_admin` int(11)
,`total_bayar` int(11)
,`metode_id` bigint(20) unsigned
,`status` varchar(20)
,`user_id` bigint(20) unsigned
,`created_at` timestamp
,`updated_at` timestamp
,`nomor_meter` varchar(12)
,`nama_pelanggan` varchar(50)
,`nama_metode` varchar(255)
,`jumlah_meter` int(11)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tagihan`
--

CREATE TABLE `tagihan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `penggunaan_id` bigint(20) UNSIGNED NOT NULL,
  `pelanggan_id` bigint(20) UNSIGNED NOT NULL,
  `bulan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` year(4) NOT NULL,
  `jumlah_meter` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tagihan`
--

INSERT INTO `tagihan` (`id`, `penggunaan_id`, `pelanggan_id`, `bulan`, `tahun`, `jumlah_meter`, `jumlah_bayar`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'januari', 2021, 150, 25230, 'belum bayar', '2021-03-20 23:33:12', '2021-03-20 23:33:12'),
(2, 2, 2, 'januari', 2021, 200, 54800, 'belum bayar', '2021-03-20 23:33:12', '2021-03-20 23:33:12'),
(3, 3, 3, 'januari', 2021, 200, 54800, 'belum bayar', '2021-03-20 23:33:12', '2021-03-20 23:33:12'),
(4, 4, 4, 'januari', 2021, 100, 135200, 'belum bayar', '2021-03-20 23:33:12', '2021-03-20 23:33:12'),
(5, 5, 5, 'januari', 2021, 100, 144400, 'belum bayar', '2021-03-20 23:33:12', '2021-03-20 23:33:12'),
(6, 6, 6, 'januari', 2021, 150, 25350, 'belum bayar', '2021-03-20 23:33:12', '2021-03-20 23:33:12'),
(7, 7, 7, 'januari', 2021, 70, 101080, 'belum bayar', '2021-03-20 23:33:12', '2021-03-20 23:33:12'),
(8, 8, 8, 'januari', 2021, 200, 288800, 'belum bayar', '2021-03-20 23:33:12', '2021-03-20 23:33:12'),
(9, 9, 9, 'januari', 2021, 50, 67600, 'belum bayar', '2021-03-20 23:33:12', '2021-03-20 23:33:12'),
(10, 10, 10, 'januari', 2021, 150, 216600, 'belum bayar', '2021-03-20 23:33:12', '2021-03-20 23:33:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tarif`
--

CREATE TABLE `tarif` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_tarif` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `golongan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `daya` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarif_perkwh` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tarif`
--

INSERT INTO `tarif` (`id`, `kode_tarif`, `golongan`, `daya`, `tarif_perkwh`, `created_at`, `updated_at`) VALUES
(1, 'R1/450VA', 'R1', '450VA', 169, '2021-03-20 23:33:11', '2021-03-20 23:33:11'),
(2, 'R1/900VA', 'R1', '900VA', 274, '2021-03-20 23:33:11', '2021-03-20 23:33:11'),
(3, 'R1M/900VA', 'R1M', '900VA', 1352, '2021-03-20 23:33:11', '2021-03-20 23:33:11'),
(4, 'R1/1300VA', 'R1', '1300VA', 1444, '2021-03-20 23:33:11', '2021-03-20 23:33:11'),
(5, 'R1/2200VA', 'R1', '2200VA', 1444, '2021-03-20 23:33:11', '2021-03-20 23:33:11');

--
-- Trigger `tarif`
--
DELIMITER $$
CREATE TRIGGER `delete_tarif` AFTER DELETE ON `tarif` FOR EACH ROW INSERT INTO log VALUES ('','DELETE','Tarif',Old.id,1,'Menghapus Data Tarif',now(),null)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_tarif` AFTER INSERT ON `tarif` FOR EACH ROW INSERT INTO log VALUES ('','INSERT','Tarif',New.id,1,'Menambah Data Tarif',now(),null)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_tarif` AFTER UPDATE ON `tarif` FOR EACH ROW INSERT INTO log VALUES ('','UPDATE','Tarif',New.id,1,'Mengubah Data Tarif',now(),null)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_user` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_telepon` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama_user`, `username`, `password`, `nomor_telepon`, `foto`, `level_id`, `created_at`, `updated_at`) VALUES
(1, 'irwansyah', 'admin', '$2y$10$zWGv7zXbhaEwrHWCr8FhbuDHBN8Xx25Syrf.PGmY2p5sEbGdVGxr6', '081221212121', 'img/profile.jpg', 1, '2021-03-20 23:33:10', '2021-03-20 23:33:10'),
(2, 'darman', 'bankbca', '$2y$10$b00VwNeOBi1h4tZAt0G4GOQCh7jMxIzHPcOjm.wMKW4PAsW0GwFsa', '081599988822', 'img/profile.jpg', 2, '2021-03-20 23:33:10', '2021-03-20 23:33:10'),
(3, 'susanto', 'bankbri', '$2y$10$J1pTIkkUDClBsi/wVgEx2ePiQfgbq36HXHwHBCy2gAGAHbWU89nIu', '081588880000', 'img/profile.jpg', 2, '2021-03-20 23:33:10', '2021-03-20 23:33:10'),
(4, 'ferdiansyah', 'bankmandiri', '$2y$10$kt5NrfWKmXA70iDEW6VGjuJy2RS8vdhGUT.Krdt9Pxbz0ih7NLn2i', '081890299999', 'img/profile.jpg', 2, '2021-03-20 23:33:10', '2021-03-20 23:33:10'),
(5, 'hasan', 'hasan123', '$2y$10$34hwM1eRZTu3MpTLdMoXKuk64wS0D0kmwgzLr4U71gj/Ma/r0uujW', '083811002288', 'img/profile.jpg', 3, '2021-03-20 23:33:10', '2021-03-20 23:33:10');

-- --------------------------------------------------------

--
-- Struktur untuk view `activity_log`
--
DROP TABLE IF EXISTS `activity_log`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `activity_log`  AS  select `log`.`id` AS `id`,`log`.`nama_log` AS `nama_log`,`log`.`tabel` AS `tabel`,`log`.`id_referensi` AS `id_referensi`,`log`.`user_id` AS `user_id`,`log`.`deskripsi` AS `deskripsi`,`log`.`created_at` AS `created_at`,`log`.`updated_at` AS `updated_at`,`users`.`nama_user` AS `nama_user`,`level`.`nama_level` AS `nama_level` from ((`log` join `users` on(`log`.`user_id` = `users`.`id`)) join `level` on(`users`.`level_id` = `level`.`id`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `riwayat`
--
DROP TABLE IF EXISTS `riwayat`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `riwayat`  AS  select `pembayaran`.`id` AS `id`,`pembayaran`.`tagihan_id` AS `tagihan_id`,`pembayaran`.`pelanggan_id` AS `pelanggan_id`,`pembayaran`.`tanggal_pembayaran` AS `tanggal_pembayaran`,`pembayaran`.`bulan_bayar` AS `bulan_bayar`,`pembayaran`.`tahun_bayar` AS `tahun_bayar`,`pembayaran`.`biaya_admin` AS `biaya_admin`,`pembayaran`.`total_bayar` AS `total_bayar`,`pembayaran`.`metode_id` AS `metode_id`,`pembayaran`.`status` AS `status`,`pembayaran`.`user_id` AS `user_id`,`pembayaran`.`created_at` AS `created_at`,`pembayaran`.`updated_at` AS `updated_at`,`pelanggan`.`nomor_meter` AS `nomor_meter`,`pelanggan`.`nama_pelanggan` AS `nama_pelanggan`,`metode`.`nama_metode` AS `nama_metode`,`tagihan`.`jumlah_meter` AS `jumlah_meter` from (((`pembayaran` join `pelanggan` on(`pembayaran`.`pelanggan_id` = `pelanggan`.`id`)) join `metode` on(`pembayaran`.`metode_id` = `metode`.`id`)) join `tagihan` on(`pembayaran`.`tagihan_id` = `tagihan`.`id`)) where `pembayaran`.`status` = 'sukses' ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `metode`
--
ALTER TABLE `metode`
  ADD PRIMARY KEY (`id`),
  ADD KEY `metode_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelanggan_tarif_id_foreign` (`tarif_id`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembayaran_tagihan_id_foreign` (`tagihan_id`),
  ADD KEY `pembayaran_pelanggan_id_foreign` (`pelanggan_id`),
  ADD KEY `pembayaran_metode_id_foreign` (`metode_id`),
  ADD KEY `pembayaran_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `penggunaan`
--
ALTER TABLE `penggunaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penggunaan_pelanggan_id_foreign` (`pelanggan_id`);

--
-- Indeks untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tagihan_penggunaan_id_foreign` (`penggunaan_id`),
  ADD KEY `tagihan_pelanggan_id_foreign` (`pelanggan_id`);

--
-- Indeks untuk tabel `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_level_id_foreign` (`level_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `log`
--
ALTER TABLE `log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `metode`
--
ALTER TABLE `metode`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penggunaan`
--
ALTER TABLE `penggunaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tarif`
--
ALTER TABLE `tarif`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `metode`
--
ALTER TABLE `metode`
  ADD CONSTRAINT `metode_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_tarif_id_foreign` FOREIGN KEY (`tarif_id`) REFERENCES `tarif` (`id`);

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_metode_id_foreign` FOREIGN KEY (`metode_id`) REFERENCES `metode` (`id`),
  ADD CONSTRAINT `pembayaran_pelanggan_id_foreign` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`),
  ADD CONSTRAINT `pembayaran_tagihan_id_foreign` FOREIGN KEY (`tagihan_id`) REFERENCES `tagihan` (`id`),
  ADD CONSTRAINT `pembayaran_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `penggunaan`
--
ALTER TABLE `penggunaan`
  ADD CONSTRAINT `penggunaan_pelanggan_id_foreign` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`);

--
-- Ketidakleluasaan untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  ADD CONSTRAINT `tagihan_pelanggan_id_foreign` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`),
  ADD CONSTRAINT `tagihan_penggunaan_id_foreign` FOREIGN KEY (`penggunaan_id`) REFERENCES `penggunaan` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `level` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
