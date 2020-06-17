-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 17, 2020 at 01:48 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_05_12_220631_create_roles_table', 1),
(5, '2020_05_13_020558_create_table_paket', 2),
(6, '2020_05_15_015858_create_table_jlaundry', 3),
(7, '2020_05_18_022243_create_table_status_paket', 4),
(8, '2020_05_18_024510_create_table_status_pesanan', 5),
(9, '2020_05_18_024551_create_table_status_pembayaran', 5),
(11, '2020_05_18_031825_crete_table_transaksi', 6),
(12, '2020_05_19_063755_alter_table_tb_transaksi', 7),
(14, '2020_05_20_074746_alter_table_transaksi', 8),
(15, '2020_05_21_022230_create_table_costumer', 9),
(18, '2020_05_25_021936_alter_table_costumer', 10),
(20, '2020_05_26_070434_alter_table_user', 11),
(21, '2020_05_26_080258_alter_table_users', 12),
(22, '2020_05_28_062236_create_table_diskon', 13);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Karyawan', NULL, NULL),
(3, 'Member', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_costumer`
--

CREATE TABLE `tb_costumer` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_member` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_paket` enum('Jemput','Antar') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_costumer`
--

INSERT INTO `tb_costumer` (`id`, `id_member`, `kode`, `nama`, `email`, `no_hp`, `alamat`, `status_paket`, `created_at`, `updated_at`) VALUES
(52, NULL, 'TR-0603101836', 'yuda', 'yuda@gmail.com', '12345678', 'cisomang', 'Jemput', '2020-06-03 03:19:52', '2020-06-03 03:19:52');

-- --------------------------------------------------------

--
-- Table structure for table `tb_diskon`
--

CREATE TABLE `tb_diskon` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_diskon`
--

INSERT INTO `tb_diskon` (`id`, `nama`, `harga`, `created_at`, `updated_at`) VALUES
(1, 'Member', 1000, '2020-05-28 00:17:26', '2020-05-28 00:33:37'),
(2, 'Bukan Member', 0, '2020-05-28 00:38:22', '2020-05-28 00:38:22');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jlaundry`
--

CREATE TABLE `tb_jlaundry` (
  `id` int(11) NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_jlaundry`
--

INSERT INTO `tb_jlaundry` (`id`, `nama`, `harga`, `created_at`, `updated_at`) VALUES
(1, 'Pakaian', 7000, '2020-05-14 20:21:46', '2020-05-21 23:10:18'),
(2, 'Boneka ( Size Small )', 10000, '2020-05-17 21:34:49', '2020-05-19 02:33:27'),
(3, 'Boneka ( Size Medium )', 15000, '2020-05-19 02:30:00', '2020-05-19 02:32:31'),
(4, 'Boneka ( Size Big )', 20000, '2020-05-19 02:33:17', '2020-05-19 02:33:17'),
(5, 'Karpet', 12000, '2020-05-19 02:33:54', '2020-05-19 02:36:49'),
(6, 'Bed Cover ( Size 120 )', 25000, '2020-05-19 02:34:31', '2020-05-19 02:34:31'),
(7, 'Bed Cover ( Size 160-180 )', 35000, '2020-05-19 02:34:57', '2020-05-19 02:34:57'),
(8, 'Jasa Setrika Aja ( Tanpa Cuci )', 5000, '2020-05-19 02:36:07', '2020-05-19 02:36:07');

-- --------------------------------------------------------

--
-- Table structure for table `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id` int(11) NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_paket`
--

INSERT INTO `tb_paket` (`id`, `nama`, `harga`, `created_at`, `updated_at`) VALUES
(1, 'Paket Kilat Express 12 jam', 3000, '2020-05-14 03:27:18', '2020-05-21 23:13:05'),
(2, 'Paket Kilat 24 jam', 2000, '2020-05-14 03:27:36', '2020-05-21 23:13:23'),
(3, 'Paket Biasa ( 1-2 hari )', 0, '2020-05-14 19:30:57', '2020-05-21 23:13:37');

-- --------------------------------------------------------

--
-- Table structure for table `tb_status_paket`
--

CREATE TABLE `tb_status_paket` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_status_paket`
--

INSERT INTO `tb_status_paket` (`id`, `nama`, `harga`, `created_at`, `updated_at`) VALUES
(1, 'Jemput', 3000, '2020-05-17 19:37:26', '2020-05-23 01:17:12'),
(2, 'Antarkan sendiri', 0, '2020-05-17 19:37:55', '2020-05-23 01:17:26');

-- --------------------------------------------------------

--
-- Table structure for table `tb_status_pembayaran`
--

CREATE TABLE `tb_status_pembayaran` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_status_pembayaran`
--

INSERT INTO `tb_status_pembayaran` (`id`, `status`, `urutan`, `created_at`, `updated_at`) VALUES
(1, 'Belum Lunas', 1, '2020-05-17 20:16:31', '2020-05-17 20:16:58'),
(2, 'Lunas', 2, '2020-05-17 20:16:44', '2020-05-17 20:16:44');

-- --------------------------------------------------------

--
-- Table structure for table `tb_status_pesanan`
--

CREATE TABLE `tb_status_pesanan` (
  `id` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_status_pesanan`
--

INSERT INTO `tb_status_pesanan` (`id`, `status`, `urutan`, `created_at`, `updated_at`) VALUES
(1, 'Pesanan Diproses', 1, '2020-05-18 23:51:51', '2020-05-18 23:51:51'),
(2, 'Proses Pencucian', 2, '2020-05-18 23:54:54', '2020-05-18 23:54:54'),
(3, 'Proses Pengeringan', 3, '2020-05-18 23:55:10', '2020-05-18 23:55:10'),
(4, 'Proses Setrika', 4, '2020-05-18 23:55:27', '2020-05-18 23:55:27'),
(5, 'Selesai', 5, '2020-05-18 23:56:27', '2020-05-18 23:56:27');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id` int(11) NOT NULL,
  `costumer_id` int(11) NOT NULL,
  `diskon_id` int(11) NOT NULL,
  `paket_id` int(11) NOT NULL,
  `jlaundry_id` int(11) NOT NULL,
  `status_paket_id` int(11) NOT NULL,
  `berat` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `status_pesanan_id` int(11) NOT NULL DEFAULT 1,
  `status_pembayaran_id` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id`, `costumer_id`, `diskon_id`, `paket_id`, `jlaundry_id`, `status_paket_id`, `berat`, `total`, `status_pesanan_id`, `status_pembayaran_id`, `created_at`, `updated_at`) VALUES
(51, 52, 2, 1, 1, 1, 2, 20000, 2, 1, '2020-06-03 03:23:58', '2020-06-03 03:24:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 3,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_member` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'default.png',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_vertifikasi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `id_member`, `email_verified_at`, `password`, `photo`, `remember_token`, `created_at`, `updated_at`, `is_vertifikasi`) VALUES
(8, 1, 'Yuda Muhtar ( Owner )', 'yudamuhtar@gmail.com', NULL, '2020-05-26 01:01:47', '$2y$10$KqLXB5OiV0jpFMqsxpgULejuTUOu09NkXaQoe517RU4QkE3eDfOHK', 'laracode.png', NULL, '2020-05-26 01:01:25', '2020-06-03 03:27:31', NULL),
(19, 2, 'yuda', 'yuda@gmail.com', 'MEM-102751', '2020-06-03 03:28:43', '$2y$10$BzfuaKc/AIy/joQtDYGbjuQjYYursW7MD2EwLz98CGLP0szsxqBl.', 'mint-logo.png', NULL, '2020-06-03 03:28:13', '2020-06-03 03:30:23', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_costumer`
--
ALTER TABLE `tb_costumer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_costumer_email_unique` (`email`),
  ADD UNIQUE KEY `kode` (`kode`),
  ADD UNIQUE KEY `id_member` (`id_member`);

--
-- Indexes for table `tb_diskon`
--
ALTER TABLE `tb_diskon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jlaundry`
--
ALTER TABLE `tb_jlaundry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_status_paket`
--
ALTER TABLE `tb_status_paket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_status_pembayaran`
--
ALTER TABLE `tb_status_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_status_pesanan`
--
ALTER TABLE `tb_status_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `id_member` (`id_member`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_costumer`
--
ALTER TABLE `tb_costumer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tb_diskon`
--
ALTER TABLE `tb_diskon`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_jlaundry`
--
ALTER TABLE `tb_jlaundry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_paket`
--
ALTER TABLE `tb_paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_status_paket`
--
ALTER TABLE `tb_status_paket`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_status_pembayaran`
--
ALTER TABLE `tb_status_pembayaran`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_status_pesanan`
--
ALTER TABLE `tb_status_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
