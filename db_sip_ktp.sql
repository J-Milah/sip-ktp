-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 05, 2026 at 11:41 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sip_ktp`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cetak_ktp`
--

CREATE TABLE `cetak_ktp` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_pao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik_cetak` char(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_cetak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rt` char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket_cetak` enum('PRR','Perubahan Data','Rusak','Hilang') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_cetak` enum('Proses','Selesai') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Proses',
  `tanggal_pao` date NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `tanggal_ambil` date DEFAULT NULL,
  `tanda_terima` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `id_user` bigint UNSIGNED NOT NULL,
  `id_lurah` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cetak_ktp`
--

INSERT INTO `cetak_ktp` (`id`, `kode_pao`, `nik_cetak`, `nama_cetak`, `rt`, `ket_cetak`, `status_cetak`, `tanggal_pao`, `tanggal_selesai`, `tanggal_ambil`, `tanda_terima`, `keterangan`, `id_user`, `id_lurah`, `created_at`, `updated_at`) VALUES
(1, '123439876543234569', '6371234323456768', 'Ilham', '15', 'Perubahan Data', 'Selesai', '2026-01-04', '2026-01-04', '2026-01-04', 'Ibu - Anna', '-', 8, 8, '2026-01-03 23:23:43', '2026-01-05 10:28:30'),
(2, '550927653874619284', '6371254555840002', 'Nanang Haryanto', '1', 'Rusak', 'Proses', '2026-01-05', NULL, '2026-01-05', '-', '-', 8, 7, '2026-01-05 10:24:57', '2026-01-05 10:24:57'),
(3, '76091536852145124', '6371298215421000', 'Sartika Dewi Putri', '10', 'Perubahan Data', 'Selesai', '2026-01-05', '2026-01-05', '2026-01-05', 'YBS', '-', 8, 5, '2026-01-05 10:26:10', '2026-01-05 10:26:31'),
(4, '6345678909876543678', '6371093452168412', 'Wawan', '3', 'Perubahan Data', 'Selesai', '2026-01-05', '2026-01-05', '2026-01-05', '-', '-', 8, 3, '2026-01-05 10:36:37', '2026-01-05 10:36:37'),
(35, '12345678901230001', '6371010101010001', 'Ilham', '01', 'Perubahan Data', 'Proses', '2026-01-01', NULL, NULL, NULL, NULL, 8, 1, NULL, NULL),
(36, '12345678901230002', '6371010101010002', 'Ayu', '02', 'PRR', 'Proses', '2026-01-02', NULL, NULL, NULL, NULL, 8, 2, NULL, NULL),
(37, '12345678901230003', '6371010101010003', 'Rizky', '03', 'Hilang', 'Proses', '2026-01-05', NULL, NULL, NULL, NULL, 8, 3, NULL, NULL),
(38, '12345678901230004', '6371010101010004', 'Sinta', '04', 'Rusak', 'Proses', '2026-01-01', NULL, NULL, NULL, NULL, 8, 4, NULL, NULL),
(39, '12345678901230005', '6371010101010005', 'Budi', '05', 'Perubahan Data', 'Proses', '2026-01-02', NULL, NULL, NULL, NULL, 8, 5, NULL, NULL),
(40, '12345678901230006', '6371010101010006', 'Dewi', '06', 'PRR', 'Proses', '2026-01-05', NULL, NULL, NULL, NULL, 8, 6, NULL, NULL),
(41, '12345678901230007', '6371010101010007', 'Andi', '07', 'Hilang', 'Proses', '2026-01-01', NULL, NULL, NULL, NULL, 8, 7, NULL, NULL),
(42, '12345678901230008', '6371010101010008', 'Nina', '08', 'Rusak', 'Proses', '2026-01-02', NULL, NULL, NULL, NULL, 8, 8, NULL, NULL),
(43, '12345678901230009', '6371010101010009', 'Fajar', '09', 'Perubahan Data', 'Proses', '2026-01-05', NULL, '2026-01-05', '-', '-', 8, 9, NULL, '2026-01-05 11:38:33'),
(44, '12345678901230010', '6371010101010010', 'Putri', '10', 'PRR', 'Proses', '2026-01-01', NULL, NULL, NULL, NULL, 8, 1, NULL, NULL),
(45, '12345678901230011', '6371010101010011', 'Agus', '11', 'Hilang', 'Proses', '2026-01-02', NULL, NULL, NULL, NULL, 8, 2, NULL, NULL),
(46, '12345678901230012', '6371010101010012', 'Rina', '12', 'Rusak', 'Proses', '2026-01-05', NULL, NULL, NULL, NULL, 8, 3, NULL, NULL),
(47, '12345678901230013', '6371010101010013', 'Hendra', '13', 'Perubahan Data', 'Proses', '2026-01-01', NULL, NULL, NULL, NULL, 8, 4, NULL, NULL),
(48, '12345678901230014', '6371010101010014', 'Maya', '14', 'PRR', 'Proses', '2026-01-02', NULL, NULL, NULL, NULL, 8, 5, NULL, NULL),
(49, '12345678901230015', '6371010101010015', 'Yoga', '15', 'Hilang', 'Selesai', '2026-01-05', '2026-01-05', '2026-01-05', '-', '-', 8, 6, NULL, '2026-01-05 11:39:43'),
(50, '12345678901230016', '6371010101010016', 'Lina', '16', 'Rusak', 'Proses', '2026-01-01', NULL, NULL, NULL, NULL, 8, 7, NULL, NULL),
(51, '12345678901230017', '6371010101010017', 'Bayu', '17', 'Perubahan Data', 'Proses', '2026-01-02', NULL, NULL, NULL, NULL, 8, 8, NULL, NULL),
(52, '12345678901230018', '6371010101010018', 'Tari', '18', 'PRR', 'Proses', '2026-01-05', NULL, NULL, NULL, NULL, 8, 9, NULL, NULL),
(53, '12345678901230019', '6371010101010019', 'Doni', '19', 'Hilang', 'Proses', '2026-01-01', NULL, NULL, NULL, NULL, 8, 1, NULL, NULL),
(54, '12345678901230020', '6371010101010020', 'Sari', '20', 'Rusak', 'Proses', '2026-01-02', NULL, NULL, NULL, NULL, 8, 2, NULL, NULL),
(55, '12345678901230021', '6371010101010021', 'Robby', '21', 'Perubahan Data', 'Proses', '2026-01-05', NULL, NULL, NULL, NULL, 8, 3, NULL, NULL),
(56, '12345678901230022', '6371010101010022', 'Intan', '22', 'PRR', 'Proses', '2026-01-01', NULL, NULL, NULL, NULL, 8, 4, NULL, NULL),
(57, '12345678901230023', '6371010101010023', 'Wahyu', '23', 'Hilang', 'Proses', '2026-01-02', NULL, NULL, NULL, NULL, 8, 5, NULL, NULL),
(58, '12345678901230024', '6371010101010024', 'Novi', '24', 'Rusak', 'Proses', '2026-01-05', NULL, NULL, NULL, NULL, 8, 6, NULL, NULL),
(59, '12345678901230025', '6371010101010025', 'Arif', '25', 'Perubahan Data', 'Proses', '2026-01-01', NULL, NULL, NULL, NULL, 8, 7, NULL, NULL),
(60, '12345678901230026', '6371010101010026', 'Fitri', '26', 'PRR', 'Proses', '2026-01-02', NULL, NULL, NULL, NULL, 8, 8, NULL, NULL),
(61, '12345678901230027', '6371010101010027', 'Eko', '27', 'Hilang', 'Proses', '2026-01-05', NULL, NULL, NULL, NULL, 8, 9, NULL, NULL),
(62, '12345678901230028', '6371010101010028', 'Lestari', '28', 'Rusak', 'Proses', '2026-01-01', NULL, NULL, NULL, NULL, 8, 1, NULL, NULL),
(63, '12345678901230029', '6371010101010029', 'Reza', '29', 'Perubahan Data', 'Proses', '2026-01-02', NULL, NULL, NULL, NULL, 8, 2, NULL, NULL),
(64, '12345678901230030', '6371010101010030', 'Nadia', '30', 'PRR', 'Proses', '2026-01-05', NULL, NULL, NULL, NULL, 8, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ikd`
--

CREATE TABLE `ikd` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_ikd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik_ikd` char(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_ikd` date NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ikd`
--

INSERT INTO `ikd` (`id`, `nama_ikd`, `nik_ikd`, `tanggal_ikd`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'Hanum', '6371987309874735', '2026-01-05', 7, '2026-01-05 10:20:00', '2026-01-05 10:20:00'),
(2, 'Ilham', '6371987309874736', '2026-01-05', 7, '2026-01-05 02:25:00', '2026-01-05 02:25:00'),
(3, 'Ayu', '6371987309874737', '2026-01-05', 7, '2026-01-05 02:30:00', '2026-01-05 02:30:00'),
(4, 'Rizky', '6371987309874738', '2026-01-05', 7, '2026-01-05 02:35:00', '2026-01-05 02:35:00'),
(5, 'Sinta', '6371987309874739', '2026-01-05', 7, '2026-01-05 02:40:00', '2026-01-05 02:40:00'),
(6, 'Budi', '6371987309874740', '2026-01-05', 7, '2026-01-05 02:45:00', '2026-01-05 02:45:00'),
(7, 'Dewi', '6371987309874741', '2026-01-05', 7, '2026-01-05 02:50:00', '2026-01-05 02:50:00'),
(8, 'Andi', '6371987309874742', '2026-01-05', 7, '2026-01-05 02:55:00', '2026-01-05 02:55:00'),
(9, 'Nina', '6371987309874743', '2026-01-05', 7, '2026-01-05 03:00:00', '2026-01-05 03:00:00'),
(10, 'Fajar', '6371987309874744', '2026-01-05', 7, '2026-01-05 03:05:00', '2026-01-05 03:05:00');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_kelurahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`id`, `nama_kelurahan`, `created_at`, `updated_at`) VALUES
(1, 'Basirih', NULL, NULL),
(2, 'Telaga Biru', NULL, NULL),
(3, 'Teluk Tiram', NULL, NULL),
(4, 'Pelambuan', NULL, NULL),
(5, 'Telawang', NULL, NULL),
(6, 'Belitung Utara', NULL, NULL),
(7, 'Belitung Selatan', NULL, NULL),
(8, 'Kuin Selatan', NULL, NULL),
(9, 'Kuin Cerucuk', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_11_28_150736_create_kelurahan_table', 1),
(5, '2025_11_29_142719_create_cetak_ktp_table', 1),
(6, '2025_11_29_143652_create_rekam_ktp_table', 1),
(7, '2025_12_21_115241_create_ikd_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rekam_ktp`
--

CREATE TABLE `rekam_ktp` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_rekam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik_rekam` char(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rt` char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_rekam` date NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `id_lurah` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rekam_ktp`
--

INSERT INTO `rekam_ktp` (`id`, `nama_rekam`, `nik_rekam`, `alamat`, `rt`, `tanggal_rekam`, `id_user`, `id_lurah`, `created_at`, `updated_at`) VALUES
(2, 'Nana Ayu', '6371092736498201', '-', '12', '2026-01-05', 9, 4, '2026-01-05 10:21:39', '2026-01-05 10:21:39'),
(3, 'Ayu Lestari', '6371092736498203', '-', '05', '2026-01-05', 9, 2, '2026-01-05 02:30:00', '2026-01-05 02:30:00'),
(4, 'Rizky', '6371092736498204', '-', '07', '2026-01-05', 9, 3, '2026-01-05 02:35:00', '2026-01-05 02:35:00'),
(5, 'Sinta', '6371092736498205', '-', '09', '2026-01-05', 9, 5, '2026-01-05 02:40:00', '2026-01-05 02:40:00'),
(6, 'Budi', '6371092736498206', '-', '10', '2026-01-05', 9, 6, '2026-01-05 02:45:00', '2026-01-05 02:45:00'),
(7, 'Dewi', '6371092736498207', '-', '14', '2026-01-05', 9, 7, '2026-01-05 02:50:00', '2026-01-05 02:50:00'),
(8, 'Andi', '6371092736498208', '-', '16', '2026-01-05', 9, 8, '2026-01-05 02:55:00', '2026-01-05 02:55:00'),
(9, 'Nina', '6371092736498209', '-', '18', '2026-01-05', 9, 9, '2026-01-05 03:00:00', '2026-01-05 03:00:00'),
(10, 'Fajar', '6371092736498210', '-', '20', '2026-01-05', 9, 4, '2026-01-05 03:05:00', '2026-01-05 03:05:00'),
(11, 'Agus', '6371092736498211', '-', '02', '2026-01-05', 9, 1, '2026-01-05 03:10:00', '2026-01-05 03:10:00'),
(12, 'Rina', '6371092736498212', '-', '04', '2026-01-05', 9, 2, '2026-01-05 03:15:00', '2026-01-05 03:15:00'),
(13, 'Yoga', '6371092736498213', '-', '06', '2026-01-05', 9, 3, '2026-01-05 03:20:00', '2026-01-05 03:20:00'),
(14, 'Maya', '6371092736498214', '-', '08', '2026-01-05', 9, 5, '2026-01-05 03:25:00', '2026-01-05 03:25:00'),
(15, 'Bayu', '6371092736498215', '-', '11', '2026-01-05', 9, 6, '2026-01-05 03:30:00', '2026-01-05 03:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('T1CIiTDMe1wm1kzhNaogl8daenLsCtiFk6ggIst2', 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidTJScVFJdlg5NE5rMTgzWFNxWVJsZWZkVkhCYWFFalBOYWRzQ0liNiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly9zaXAta3RwLnRlc3QvaWtkIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Nzt9', 1767613256);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` char(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` enum('Admin','Operator-Cetak','Operator-Rekam') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_user` enum('Active','Non-active') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `nik`, `password`, `jabatan`, `status_user`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'Anisah', '6371045107790009', '$2y$12$1y399Q/.Vj1xG837BuWI5.vCb1lNZp4Lvvtn890fyuQs1TBqoTDUm', 'Admin', 'Active', NULL, '2026-01-03 12:54:27', '2026-01-03 12:54:27'),
(8, 'Fitri', '6371054407830005', '$2y$12$igWlHYCO8JkWcvQvJ7pLxOonlb/yIBU3G5M7ymCWv/Cu01qvclwti', 'Operator-Cetak', 'Active', NULL, '2026-01-03 12:54:27', '2026-01-03 13:05:37'),
(9, 'Mitha', '6371014303000017', '$2y$12$m.m5PH1ZjmOfffmUPE/DW.ZVSsrpfdftIM/pUEsvOqsdtIzkP7lRa', 'Operator-Rekam', 'Active', NULL, '2026-01-03 12:54:28', '2026-01-03 12:54:28'),
(10, 'Milah', '6371045003050003', '$2y$12$H2KNI33iRcCJrfOkBMI/Au6mH82.boaDl6pX7jO1PPRb0TrlEQqam', 'Admin', 'Active', NULL, '2026-01-03 12:55:55', '2026-01-03 13:07:57');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `cetak_ktp`
--
ALTER TABLE `cetak_ktp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cetak_ktp_id_user_foreign` (`id_user`),
  ADD KEY `cetak_ktp_id_lurah_foreign` (`id_lurah`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `ikd`
--
ALTER TABLE `ikd`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ikd_id_user_foreign` (`id_user`);

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
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `rekam_ktp`
--
ALTER TABLE `rekam_ktp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rekam_ktp_id_user_foreign` (`id_user`),
  ADD KEY `rekam_ktp_id_lurah_foreign` (`id_lurah`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nik_unique` (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cetak_ktp`
--
ALTER TABLE `cetak_ktp`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ikd`
--
ALTER TABLE `ikd`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rekam_ktp`
--
ALTER TABLE `rekam_ktp`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cetak_ktp`
--
ALTER TABLE `cetak_ktp`
  ADD CONSTRAINT `cetak_ktp_id_lurah_foreign` FOREIGN KEY (`id_lurah`) REFERENCES `kelurahan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cetak_ktp_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ikd`
--
ALTER TABLE `ikd`
  ADD CONSTRAINT `ikd_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rekam_ktp`
--
ALTER TABLE `rekam_ktp`
  ADD CONSTRAINT `rekam_ktp_id_lurah_foreign` FOREIGN KEY (`id_lurah`) REFERENCES `kelurahan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rekam_ktp_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
