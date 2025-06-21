-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2025 at 10:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finance_system_anwar`
--

-- --------------------------------------------------------

--
-- Table structure for table `biaya`
--

CREATE TABLE `biaya` (
  `id` char(36) NOT NULL,
  `supplier_id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `chart_of_account_id` char(36) NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `status` enum('pending','paid') NOT NULL DEFAULT 'pending',
  `total_harga` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chart_of_accounts`
--

CREATE TABLE `chart_of_accounts` (
  `id` char(36) NOT NULL,
  `no_account` char(8) NOT NULL,
  `category_account` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `nature` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chart_of_accounts`
--

INSERT INTO `chart_of_accounts` (`id`, `no_account`, `category_account`, `description`, `nature`, `created_at`, `updated_at`) VALUES
('019764b9-9065-7133-aa83-c0ecee998978', '45678954', '4', 'Pendapatan', 'Pendapatan', '2025-06-12 08:19:32', '2025-06-12 08:19:32'),
('01979419-be6b-70cf-9980-3a8c284fb6f7', '45678959', '6', 'Beban Usaha', 'Beban Usaha', '2025-06-21 13:06:44', '2025-06-21 13:06:44'),
('0197941a-b479-71cf-abcb-7b8a5be9e64d', '56756743', '1', 'Aktiva', 'Aktiva', '2025-06-21 13:07:47', '2025-06-21 13:07:47');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` char(36) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `code_customer` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nomor_rekening` varchar(30) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL,
  `cabang` varchar(255) NOT NULL,
  `npwp` char(16) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `nama_perusahaan`, `code_customer`, `email`, `alamat`, `nomor_rekening`, `nama_bank`, `nama_pemilik`, `cabang`, `npwp`, `created_at`, `updated_at`) VALUES
('019764b8-742f-7107-9b56-0757f7717dcd', 'PT. Adyawinsa', 'CDP2025001', 'adyawinsa@akti.ac.id', 'Tanjung pura', '9877625415162789', 'BRI', 'adyawinsa', 'Klari', '9876543216789156', '2025-06-12 08:18:19', '2025-06-12 08:18:19');

-- --------------------------------------------------------

--
-- Table structure for table `detail_biaya`
--

CREATE TABLE `detail_biaya` (
  `id` char(36) NOT NULL,
  `biaya_id` char(36) NOT NULL,
  `chart_of_account_id` char(36) NOT NULL,
  `item_biaya` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` decimal(15,2) NOT NULL,
  `total_harga` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_produk_penjualan`
--

CREATE TABLE `detail_produk_penjualan` (
  `id` char(36) NOT NULL,
  `penjualan_id` char(36) NOT NULL,
  `chart_of_account_id` char(36) NOT NULL,
  `product_id` char(36) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_harga` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_produk_penjualan`
--

INSERT INTO `detail_produk_penjualan` (`id`, `penjualan_id`, `chart_of_account_id`, `product_id`, `qty`, `total_harga`, `created_at`, `updated_at`) VALUES
('019764bb-e473-7236-81fc-0eac6163a3a7', '019764bb-e464-713e-9784-a05eab8a9c38', '019764b9-9065-7133-aa83-c0ecee998978', '019764b8-e216-721e-8f30-0fc893092d65', 10, 8000000.00, '2025-06-12 08:22:04', '2025-06-12 08:22:04'),
('01979411-a8ee-7046-8764-46c22a0aef6b', '01979411-a7d8-729e-8a67-32ff1ed05267', '019764b9-9065-7133-aa83-c0ecee998978', '019764b8-e216-721e-8f30-0fc893092d65', 10, 8000000.00, '2025-06-21 12:57:54', '2025-06-21 12:57:54');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` char(7) NOT NULL,
  `regency_id` char(4) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_biaya`
--

CREATE TABLE `file_biaya` (
  `id` char(36) NOT NULL,
  `biaya_id` char(36) NOT NULL,
  `nama_file` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_penjualan`
--

CREATE TABLE `file_penjualan` (
  `id` char(36) NOT NULL,
  `penjualan_id` char(36) NOT NULL,
  `nama_file` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jurnal_umum`
--

CREATE TABLE `jurnal_umum` (
  `id` char(36) NOT NULL,
  `kategori` enum('penjualan','biaya') NOT NULL,
  `relational_id` char(36) NOT NULL,
  `no_account` varchar(20) NOT NULL,
  `code_perusahaan` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tgl` date NOT NULL,
  `debit` decimal(15,2) NOT NULL,
  `kredit` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurnal_umum`
--

INSERT INTO `jurnal_umum` (`id`, `kategori`, `relational_id`, `no_account`, `code_perusahaan`, `nama`, `tgl`, `debit`, `kredit`, `created_at`, `updated_at`) VALUES
('019764bc-eac3-73cd-8df1-96d8e8b9b5a5', 'penjualan', '019764bb-e464-713e-9784-a05eab8a9c38', '45678954', 'CDP2025001', 'PT. Adyawinsa', '2025-06-12', 0.00, 8000000.00, '2025-06-12 08:23:11', '2025-06-12 08:23:11');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2017_05_02_140432_create_provinces_tables', 1),
(5, '2017_05_02_140444_create_regencies_tables', 1),
(6, '2017_05_02_142019_create_districts_tables', 1),
(7, '2017_05_02_143454_create_villages_tables', 1),
(8, '2025_03_02_103935_create_customers_table', 1),
(9, '2025_03_02_110829_create_suppliers_table', 1),
(10, '2025_03_08_135104_create_chart_of_accounts_table', 1),
(11, '2025_03_16_145257_create_products_table', 1),
(12, '2025_03_27_154905_create_penjualan_table', 1),
(13, '2025_03_29_160843_create_detail_produk_penjualans_table', 1),
(14, '2025_04_05_040702_create_biayas_table', 1),
(15, '2025_04_19_224204_create_file_penjualans_table', 1),
(16, '2025_05_01_141735_create_detail_biayas_table', 1),
(17, '2025_05_01_142828_create_file_biayas_table', 1),
(18, '2025_05_29_062143_create_jurnal_umums_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` char(36) NOT NULL,
  `customer_id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `status` enum('draft','created','send','paid') NOT NULL DEFAULT 'draft',
  `tgl_transaksi` date NOT NULL,
  `tgl_pengiriman` date DEFAULT NULL,
  `tgl_terima` date DEFAULT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `pajak` double NOT NULL,
  `diskon` double NOT NULL,
  `total_harga` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `customer_id`, `user_id`, `kode_transaksi`, `status`, `tgl_transaksi`, `tgl_pengiriman`, `tgl_terima`, `tgl_bayar`, `pajak`, `diskon`, `total_harga`, `created_at`, `updated_at`) VALUES
('019764bb-e464-713e-9784-a05eab8a9c38', '019764b8-742f-7107-9b56-0757f7717dcd', '019764b7-748b-7057-b6bf-3cd7e4717e3a', 'TR-2025/06/0001', 'paid', '2025-06-12', '2025-06-12', '2025-06-12', NULL, 0, 0, 8000000, '2025-06-12 08:22:04', '2025-06-12 08:23:11'),
('01979411-a7d8-729e-8a67-32ff1ed05267', '019764b8-742f-7107-9b56-0757f7717dcd', '019764b7-748b-7057-b6bf-3cd7e4717e3a', 'TR-2025/06/0002', 'draft', '2025-06-21', '2025-06-22', '2025-06-22', NULL, 0, 0, 8000000, '2025-06-21 12:57:54', '2025-06-21 13:16:43');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` char(36) NOT NULL,
  `kode_produk` char(4) NOT NULL,
  `nama_produk` varchar(20) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `harga` double NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `kode_produk`, `nama_produk`, `satuan`, `harga`, `stok`, `created_at`, `updated_at`) VALUES
('019764b8-e216-721e-8f30-0fc893092d65', '7878', 'Palet', 'pcs', 800000, 60, '2025-06-12 08:18:47', '2025-06-21 12:57:54');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` char(2) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `regencies`
--

CREATE TABLE `regencies` (
  `id` char(4) NOT NULL,
  `province_id` char(2) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` char(36) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('dhDEAEyFs8SQwoMEXwBEm8cdMr49BYRGQbciQpxu', '019764b7-748b-7057-b6bf-3cd7e4717e3a', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZFBPR1A5b1hvV1g4UDRUM0wweFdMdGwybVJPRzNFSUVmZE5JR21SZiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI4OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvanVybmFsIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO3M6MzY6IjAxOTc2NGI3LTc0OGItNzA1Ny1iNmJmLTNjZDdlNDcxN2UzYSI7fQ==', 1750537013);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` char(36) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `code_supplier` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nomor_rekening` varchar(30) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL,
  `cabang` varchar(255) NOT NULL,
  `npwp` char(16) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `nama_perusahaan`, `code_supplier`, `email`, `alamat`, `nomor_rekening`, `nama_bank`, `nama_pemilik`, `cabang`, `npwp`, `created_at`, `updated_at`) VALUES
('01979418-70c1-71a8-98ef-f272cd1d1cbf', 'PT Horizon', 'SDP2025001', 'ahmad@mail.com', 'Tanjung pura', '9877625415162789', 'BRI', 'Horizon', 'Klari', '9876543216789156', '2025-06-21 13:05:19', '2025-06-21 13:05:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('admin','marketing') NOT NULL DEFAULT 'marketing',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
('019764b7-748b-7057-b6bf-3cd7e4717e3a', 'Administrator', 'admin@mail.com', 'admin', NULL, '$2y$12$DM9hKkRmFbkyZ7ac2Tod8OXWePiwRDSxxhCloyPjjEAfh3KAPyGc6', NULL, '2025-06-12 08:17:13', '2025-06-12 08:17:13');

-- --------------------------------------------------------

--
-- Table structure for table `villages`
--

CREATE TABLE `villages` (
  `id` char(10) NOT NULL,
  `district_id` char(7) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biaya`
--
ALTER TABLE `biaya`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `biaya_kode_transaksi_unique` (`kode_transaksi`),
  ADD KEY `biaya_supplier_id_foreign` (`supplier_id`),
  ADD KEY `biaya_user_id_foreign` (`user_id`),
  ADD KEY `biaya_chart_of_account_id_foreign` (`chart_of_account_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `chart_of_accounts`
--
ALTER TABLE `chart_of_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `chart_of_accounts_no_account_unique` (`no_account`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_nama_perusahaan_unique` (`nama_perusahaan`),
  ADD UNIQUE KEY `customers_code_customer_unique` (`code_customer`),
  ADD UNIQUE KEY `customers_email_unique` (`email`),
  ADD UNIQUE KEY `customers_nomor_rekening_unique` (`nomor_rekening`);

--
-- Indexes for table `detail_biaya`
--
ALTER TABLE `detail_biaya`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_biaya_biaya_id_foreign` (`biaya_id`),
  ADD KEY `detail_biaya_chart_of_account_id_foreign` (`chart_of_account_id`);

--
-- Indexes for table `detail_produk_penjualan`
--
ALTER TABLE `detail_produk_penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_produk_penjualan_penjualan_id_foreign` (`penjualan_id`),
  ADD KEY `detail_produk_penjualan_chart_of_account_id_foreign` (`chart_of_account_id`),
  ADD KEY `detail_produk_penjualan_product_id_foreign` (`product_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD KEY `districts_regency_id_foreign` (`regency_id`),
  ADD KEY `districts_id_index` (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `file_biaya`
--
ALTER TABLE `file_biaya`
  ADD PRIMARY KEY (`id`),
  ADD KEY `file_biaya_biaya_id_foreign` (`biaya_id`);

--
-- Indexes for table `file_penjualan`
--
ALTER TABLE `file_penjualan`
  ADD KEY `file_penjualan_penjualan_id_foreign` (`penjualan_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurnal_umum`
--
ALTER TABLE `jurnal_umum`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jurnal_umum_relational_id_unique` (`relational_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `penjualan_kode_transaksi_unique` (`kode_transaksi`),
  ADD KEY `penjualan_customer_id_foreign` (`customer_id`),
  ADD KEY `penjualan_user_id_foreign` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_kode_produk_unique` (`kode_produk`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD KEY `provinces_id_index` (`id`);

--
-- Indexes for table `regencies`
--
ALTER TABLE `regencies`
  ADD KEY `regencies_province_id_foreign` (`province_id`),
  ADD KEY `regencies_id_index` (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `suppliers_nama_perusahaan_unique` (`nama_perusahaan`),
  ADD UNIQUE KEY `suppliers_code_supplier_unique` (`code_supplier`),
  ADD UNIQUE KEY `suppliers_email_unique` (`email`),
  ADD UNIQUE KEY `suppliers_nomor_rekening_unique` (`nomor_rekening`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `villages`
--
ALTER TABLE `villages`
  ADD KEY `villages_district_id_foreign` (`district_id`),
  ADD KEY `villages_id_index` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `biaya`
--
ALTER TABLE `biaya`
  ADD CONSTRAINT `biaya_chart_of_account_id_foreign` FOREIGN KEY (`chart_of_account_id`) REFERENCES `chart_of_accounts` (`id`),
  ADD CONSTRAINT `biaya_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`),
  ADD CONSTRAINT `biaya_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `detail_biaya`
--
ALTER TABLE `detail_biaya`
  ADD CONSTRAINT `detail_biaya_biaya_id_foreign` FOREIGN KEY (`biaya_id`) REFERENCES `biaya` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_biaya_chart_of_account_id_foreign` FOREIGN KEY (`chart_of_account_id`) REFERENCES `chart_of_accounts` (`id`);

--
-- Constraints for table `detail_produk_penjualan`
--
ALTER TABLE `detail_produk_penjualan`
  ADD CONSTRAINT `detail_produk_penjualan_chart_of_account_id_foreign` FOREIGN KEY (`chart_of_account_id`) REFERENCES `chart_of_accounts` (`id`),
  ADD CONSTRAINT `detail_produk_penjualan_penjualan_id_foreign` FOREIGN KEY (`penjualan_id`) REFERENCES `penjualan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_produk_penjualan_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_regency_id_foreign` FOREIGN KEY (`regency_id`) REFERENCES `regencies` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `file_biaya`
--
ALTER TABLE `file_biaya`
  ADD CONSTRAINT `file_biaya_biaya_id_foreign` FOREIGN KEY (`biaya_id`) REFERENCES `biaya` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `file_penjualan`
--
ALTER TABLE `file_penjualan`
  ADD CONSTRAINT `file_penjualan_penjualan_id_foreign` FOREIGN KEY (`penjualan_id`) REFERENCES `penjualan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `penjualan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `regencies`
--
ALTER TABLE `regencies`
  ADD CONSTRAINT `regencies_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `villages`
--
ALTER TABLE `villages`
  ADD CONSTRAINT `villages_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
