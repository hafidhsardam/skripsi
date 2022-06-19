-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2022 at 02:42 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `purchase_req`
--

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
-- Table structure for table `log_history`
--

CREATE TABLE `log_history` (
  `id_log` int(11) NOT NULL,
  `id_data` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_history`
--

INSERT INTO `log_history` (`id_log`, `id_data`, `status`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'PR0001', 'Created Purchase Request', 1, '2022-05-22 12:09:51', '2022-05-22 05:09:51'),
(2, 'PR0001', 'Created Request Quotation', 1, '2022-05-22 12:10:02', '2022-05-22 05:10:02'),
(3, 'PR0001', 'Created Purchase Order', 1, '2022-05-22 12:36:40', '2022-05-22 05:36:40'),
(6, 'PO0001', 'Updated Purchase Order', 1, '2022-05-22 12:38:31', '2022-05-22 05:38:31'),
(7, 'PO0001', 'Updated Purchase Order', 1, '2022-05-22 12:42:25', '2022-05-22 05:42:25');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_14_030818_create_vendors_table', 1),
(6, '2022_05_15_013201_create_purchase_reqs_table', 2),
(7, '2022_05_15_013647_create_purchase_prods_table', 2),
(8, '2022_05_15_092503_create_produks_table', 3),
(9, '2022_05_18_055005_create_request__quotations_table', 4),
(10, '2022_05_18_143214_create_purchase_orders_table', 5);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `stok`, `price`, `type`, `created_at`, `updated_at`) VALUES
('PB001', 'Jasmine Rice', 120, 11000, '', '2022-05-15 10:11:11', '2022-05-15 10:11:11'),
('PB002', 'Gula Pasir', 119, 13000, '', '2022-05-15 10:11:11', '2022-05-15 10:11:11');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_orders`
--

CREATE TABLE `purchase_orders` (
  `id_po` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_purchase` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_orders`
--

INSERT INTO `purchase_orders` (`id_po`, `id_purchase`, `status`, `document`, `created_at`, `updated_at`) VALUES
('PO0001', 'PR0001', 'Received', 'penghasilan.png', '2022-05-22 05:36:39', '2022-05-22 05:41:58');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_prods`
--

CREATE TABLE `purchase_prods` (
  `id_purchase_prod` int(11) NOT NULL,
  `id_purchase` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) DEFAULT NULL,
  `priceEach` int(11) NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_prods`
--

INSERT INTO `purchase_prods` (`id_purchase_prod`, `id_purchase`, `id_produk`, `qty`, `unit`, `price`, `priceEach`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'PR0001', 'PB001', 1, 'karung', 11000, 11000, 'Kemasan hijau', NULL, NULL);

--
-- Triggers `purchase_prods`
--
DELIMITER $$
CREATE TRIGGER `harga` BEFORE INSERT ON `purchase_prods` FOR EACH ROW SET new.price = NEW.qty*(SELECT price FROM produk WHERE id_produk = new.id_produk), new.priceEach = (SELECT price FROM produk WHERE id_produk = new.id_produk)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `harga_2` BEFORE UPDATE ON `purchase_prods` FOR EACH ROW SET new.price = NEW.qty*(SELECT price FROM produk WHERE id_produk = new.id_produk), new.priceEach = (SELECT price FROM produk WHERE id_produk = new.id_produk)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_reqs`
--

CREATE TABLE `purchase_reqs` (
  `id_purchase` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `quotations` enum('y','n') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_reqs`
--

INSERT INTO `purchase_reqs` (`id_purchase`, `vendor_id`, `notes`, `status`, `created_at`, `order_date`, `updated_at`, `quotations`) VALUES
('PR0001', 2, 'urgent', 'Approved', '2022-05-22 05:09:51', '2022-05-23', '2022-05-22 05:10:02', 'n');

-- --------------------------------------------------------

--
-- Table structure for table `request_quotations`
--

CREATE TABLE `request_quotations` (
  `id_quotation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_purchase` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_quotations`
--

INSERT INTO `request_quotations` (`id_quotation`, `id_purchase`, `status`, `created_at`, `updated_at`) VALUES
('RFQ0001', 'PR0001', 'Approved', '2022-05-22 05:10:02', '2022-05-22 05:10:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `name`, `username`, `password`, `level`, `created_at`, `updated_at`, `email`) VALUES
(1, 'test', NULL, '$2y$10$j6d.JGHTa/a/C1mvl6i8sOEpo0WXOb4Q/rqdC7.UcdwGeBS5CUDh.', 'user', '2022-05-20 22:38:41', '2022-05-20 22:38:41', 'jpem@gmail.com'),
(2, 'asasa', NULL, '$2y$10$aQdu9NtPRD5Heflzn5BwX.2BW4iAYLX38wIpbYHhvPBz9bYrixtAi', 'admin', '2022-05-20 23:34:47', '2022-05-20 23:34:47', 'jpema@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id_vendor` int(255) NOT NULL,
  `vendor_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('best_partner','casual') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id_vendor`, `vendor_name`, `address`, `phone`, `email`, `type`, `created_at`, `updated_at`) VALUES
(1, 'test2q', 'jl. test aa', '087895382900', 'jpem@gmail.com', 'best_partner', '2022-05-13 21:19:02', '2022-05-14 18:26:26'),
(2, 'test1', 'jl. test aja yah', '0812121212191', 'jpema@gmail.com', 'best_partner', '2022-05-14 18:17:18', '2022-05-14 18:27:08'),
(3, 'test1asa', 'jl. test aja yah', '087895300005', 'modal_test@gg.c', 'best_partner', '2022-05-14 18:27:46', '2022-05-14 18:27:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `log_history`
--
ALTER TABLE `log_history`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `log_history_ibfk_1` (`id_data`),
  ADD KEY `id_user` (`id_user`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  ADD PRIMARY KEY (`id_po`);

--
-- Indexes for table `purchase_prods`
--
ALTER TABLE `purchase_prods`
  ADD PRIMARY KEY (`id_purchase_prod`);

--
-- Indexes for table `purchase_reqs`
--
ALTER TABLE `purchase_reqs`
  ADD PRIMARY KEY (`id_purchase`);

--
-- Indexes for table `request_quotations`
--
ALTER TABLE `request_quotations`
  ADD PRIMARY KEY (`id_quotation`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id_vendor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_history`
--
ALTER TABLE `log_history`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_prods`
--
ALTER TABLE `purchase_prods`
  MODIFY `id_purchase_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id_vendor` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `log_history`
--
ALTER TABLE `log_history`
  ADD CONSTRAINT `log_history_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
