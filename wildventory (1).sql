-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2021 at 01:29 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wildventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(11) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `harga` int(20) NOT NULL,
  `stok` int(11) NOT NULL,
  `nama_supplier` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga`, `stok`, `nama_supplier`) VALUES
('BAR01', 'Baju Gamis', 600000, 240, 'PT. Aduy Shop'),
('BAR1', 'Susu', 300000, 240, 'PT. Aduy Shop'),
('BAR12', 'Baju Muslim', 30000, 300, 'PT. Baitun Nazmi'),
('BAR3', 'PC', 100000, 40, 'PT. Baitun Nazmi');

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE `bayar` (
  `id_bayar` int(11) NOT NULL,
  `pembeli` varchar(222) NOT NULL,
  `nama_barang` varchar(111) NOT NULL,
  `tanggal_bayar` varchar(111) NOT NULL,
  `total_beli` varchar(111) NOT NULL,
  `keterangan` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bayar`
--

INSERT INTO `bayar` (`id_bayar`, `pembeli`, `nama_barang`, `tanggal_bayar`, `total_beli`, `keterangan`) VALUES
(1, 'Yudha Ghusni F.', 'Baju Gamis', '2021-03-31', '2', 'aasdsa'),
(2, 'Tati Sumarn', 'Susu', '2021-03-31', '4', 'LUNAS'),
(3, 'Tati Sumarn', 'Baju Gamis', '2021-03-31', '12', 'asda'),
(4, 'Yudha Ghusni F.', 'Baju Gamis', '2021-03-31', '76', 'hgjh'),
(5, 'Yudha Ghusni F.', 'Baju Gamis', '2021-04-01', '2', 'Nama penerima aduy');

--
-- Triggers `bayar`
--
DELIMITER $$
CREATE TRIGGER `stock_update` AFTER INSERT ON `bayar` FOR EACH ROW BEGIN
UPDATE barang SET stok = stok - NEW.total_beli
WHERE nama_barang=NEW.nama_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` varchar(11) NOT NULL,
  `nama_pembeli` varchar(300) NOT NULL,
  `jk` char(1) NOT NULL,
  `no_telp` char(13) NOT NULL,
  `alamat` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `nama_pembeli`, `jk`, `no_telp`, `alamat`) VALUES
('CUS1', 'Tati Sumarn', 'L', '089756464845', 'bmnbmnb'),
('CUS2', 'Yudha Ghusni F.', 'L', '0897564545455', 'Jl. Cisangkan');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` varchar(11) NOT NULL,
  `nama_supplier` varchar(300) NOT NULL,
  `no_telp` char(14) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `no_telp`, `alamat`) VALUES
('1', 'PT. Aduy Shop', '089777451578', 'Jl. Padasuka Cimahi'),
('2133', 'PT. Adi Butik Jaya Abadi', '089754234575', 'Jl. KBB'),
('PAS1', 'PT. Baitun Nazmi', '0897457875434', 'Jl. Pojok Utara');

-- --------------------------------------------------------

--
-- Table structure for table `update_barang`
--

CREATE TABLE `update_barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(211) NOT NULL,
  `stok` varchar(211) NOT NULL,
  `tgl` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `update_barang`
--

INSERT INTO `update_barang` (`id`, `nama_barang`, `stok`, `tgl`) VALUES
(1, 'Baju Gamis', '1', '2021-03-31'),
(2, 'Baju Gamis', '30', '2021-03-31'),
(3, 'PC', '20', '2021-04-01');

--
-- Triggers `update_barang`
--
DELIMITER $$
CREATE TRIGGER `stok_update` AFTER INSERT ON `update_barang` FOR EACH ROW BEGIN
UPDATE barang SET stok = stok + NEW.stok
WHERE nama_barang=NEW.nama_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Onlycode_', 'onlycode_@gmail.com', NULL, '$2y$10$PSbuXfy0B.EPTbdC.2eZqOTEtQiEOv02gFOwUKBvun1W9X9g0FxoS', NULL, '2021-03-09 03:43:58', '2021-03-09 03:43:58'),
(2, 'adad', 'ad@sd', NULL, '$2y$10$Ru/8EzfODP8Cuh9K.uvIZuNloLeQn1cwn2mWCHaclidUtO8DS3o1a', NULL, '2021-03-09 04:52:50', '2021-03-09 04:52:50'),
(3, 'adda', 'adda@gmail.com', NULL, '$2y$10$E.pJGrfLllRsnkAQ9oRTVOdDkvJXfXPoDTZY4nvBodMXjw1x6qboi', NULL, '2021-03-09 05:02:08', '2021-03-09 05:02:08'),
(4, 'asdas', 'asds@gsd', NULL, '$2y$10$8FkfTeZWh8OyY9EhwQvd/u4nz5bS.ZeNiBhzMLzkaBdwB93lDRSwK', NULL, '2021-03-09 05:37:25', '2021-03-09 05:37:25'),
(5, 'Mamah Tati', 'mamah@gmail.com', NULL, '$2y$10$g7ydHF1VAsAOS46WknVzL.IqbzoA/sfZ7waJc/nHvq4ZNy57GUnfC', NULL, '2021-03-09 06:07:37', '2021-03-09 06:07:37'),
(6, 'Adi Ardian S.', 'adi@gmail.com', NULL, '$2y$10$vjaz/WzEuP4YbTKCB7.Zt.cocFjGAvv1qA2s/TCwV9Owo/WO9dpZq', NULL, '2021-03-11 03:09:07', '2021-03-11 03:09:07'),
(7, 'Yudha Gusni F.', 'aduy@gmail.com', NULL, '$2y$10$Qh3AEBVYHFVnFVjG6ztWBOiFWOvi9JfFJkS5ZoiIh.hQtMO38eTbW', NULL, '2021-03-11 03:10:02', '2021-03-11 03:10:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_supplier` (`nama_supplier`(768));

--
-- Indexes for table `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `update_barang`
--
ALTER TABLE `update_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bayar`
--
ALTER TABLE `bayar`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `update_barang`
--
ALTER TABLE `update_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
