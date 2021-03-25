-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2021 at 05:40 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iot_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `downtimes`
--

CREATE TABLE `downtimes` (
  `dwn_id` bigint(20) UNSIGNED NOT NULL,
  `id_line` bigint(20) UNSIGNED NOT NULL,
  `sts_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `date_start` datetime DEFAULT NULL,
  `date_end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `downtimes`
--

INSERT INTO `downtimes` (`dwn_id`, `id_line`, `sts_id`, `date_start`, `date_end`) VALUES
(1, 1, 0, '2021-03-24 07:04:33', '2021-03-24 09:06:24'),
(47, 1, 0, '2021-03-24 10:58:53', '2021-03-24 11:24:37'),
(48, 1, 0, '2021-03-24 11:25:19', '2021-03-24 11:25:28'),
(49, 2, 0, '2021-03-24 11:28:12', '2021-03-24 11:28:54'),
(50, 2, 0, '2021-03-24 11:29:21', '2021-03-24 11:35:28'),
(51, 1, 0, '2021-03-24 11:37:34', '2021-03-24 11:37:51'),
(52, 2, 0, '2021-03-24 11:38:53', '2021-03-24 11:40:19'),
(53, 2, 0, '2021-03-24 13:29:19', '2021-03-24 13:29:36'),
(54, 2, 0, '2021-03-24 14:29:42', '2021-03-24 14:29:52'),
(55, 2, 0, '2021-03-24 16:31:31', '2021-03-24 16:31:43');

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
-- Table structure for table `machines`
--

CREATE TABLE `machines` (
  `mch_id` bigint(20) UNSIGNED NOT NULL,
  `mch_ip_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mch_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mch_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `machines`
--

INSERT INTO `machines` (`mch_id`, `mch_ip_address`, `mch_name`, `mch_desc`, `created_at`, `updated_at`) VALUES
(1, '192.168.10.3', 'Kautex - 1', 'Blow Molding', '2021-03-21 11:03:01', '2021-03-21 11:03:01'),
(2, '192.168.10.4', 'Kautex - 2', 'Blow Molding', '2021-03-21 11:35:40', '2021-03-21 11:35:40'),
(3, '192.168.10.5', 'Kautex - 3', 'Blow Molding 3', '2021-03-21 11:36:00', '2021-03-21 11:36:00');

-- --------------------------------------------------------

--
-- Table structure for table `mch_lines`
--

CREATE TABLE `mch_lines` (
  `id_line` bigint(20) UNSIGNED NOT NULL,
  `mch_id` bigint(20) UNSIGNED NOT NULL,
  `sts_id` bigint(20) UNSIGNED NOT NULL,
  `wop_id` bigint(20) UNSIGNED NOT NULL,
  `opt_id` bigint(20) UNSIGNED NOT NULL,
  `ins_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mch_lines`
--

INSERT INTO `mch_lines` (`id_line`, `mch_id`, `sts_id`, `wop_id`, `opt_id`, `ins_status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 0, NULL, '2021-03-24 04:37:51'),
(2, 2, 1, 1, 3, 0, NULL, '2021-03-24 09:31:43');

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
(25, '2014_10_12_000000_create_users_table', 1),
(26, '2014_10_12_100000_create_password_resets_table', 1),
(27, '2019_08_19_000000_create_failed_jobs_table', 1),
(28, '2021_03_09_035830_create_machines_table', 1),
(29, '2021_03_09_062858_create_statuses_table', 1),
(30, '2021_03_09_071444_create_workorders_table', 1),
(31, '2021_03_12_011516_create_mch_lines_table', 1),
(32, '2021_03_12_012221_create_downtimes_table', 1);

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
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `sts_id` bigint(20) UNSIGNED NOT NULL,
  `sts_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sts_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`sts_id`, `sts_name`, `sts_desc`, `created_at`, `updated_at`) VALUES
(0, 'NOT RUNNING', 'Machine is Off', '2021-03-21 11:03:45', '2021-03-21 11:03:55'),
(1, 'RUNNING', 'Machine is On', '2021-03-21 11:04:04', '2021-03-21 11:04:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `opt_id` bigint(20) UNSIGNED NOT NULL,
  `opt_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) DEFAULT 2,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`opt_id`, `opt_name`, `division`, `username`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Blow Molding', 'Blow Molding', 'blowm', NULL, '$2y$10$WAeBO12BchfMjm6c6ul37OemOidylyjXEgDXfPddQ4JI92hsHTobi', 2, NULL, '2021-03-21 09:46:38', '2021-03-21 09:46:38'),
(2, 'Admin IT', 'IT', 'admin', NULL, '$2y$10$m5nLHfD1mds395L3tQB36e1A2JP6x3C/xFofU3iyzse6mJkQiYl5O', 1, NULL, '2021-03-21 09:49:22', '2021-03-21 09:49:22'),
(3, 'Injection', 'IMM', 'imm', NULL, '$2y$10$o6qWFzkqojzGxDBIbU8Fm.MlI48HscBz1J7W0VhoS9KVKv6mjRVzq', 2, NULL, '2021-03-21 11:26:55', '2021-03-21 11:26:55');

-- --------------------------------------------------------

--
-- Table structure for table `workorders`
--

CREATE TABLE `workorders` (
  `wop_id` bigint(20) UNSIGNED NOT NULL,
  `wop_target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `workorders`
--

INSERT INTO `workorders` (`wop_id`, `wop_target`, `created_at`, `updated_at`) VALUES
(1, '5000', '2021-03-21 11:03:31', '2021-03-21 11:03:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `downtimes`
--
ALTER TABLE `downtimes`
  ADD PRIMARY KEY (`dwn_id`),
  ADD KEY `downtimes_id_line_foreign` (`id_line`),
  ADD KEY `downtimes_sts_id_foreign` (`sts_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `machines`
--
ALTER TABLE `machines`
  ADD PRIMARY KEY (`mch_id`);

--
-- Indexes for table `mch_lines`
--
ALTER TABLE `mch_lines`
  ADD PRIMARY KEY (`id_line`),
  ADD KEY `mch_lines_mch_id_foreign` (`mch_id`),
  ADD KEY `mch_lines_sts_id_foreign` (`sts_id`),
  ADD KEY `mch_lines_wop_id_foreign` (`wop_id`),
  ADD KEY `mch_lines_opt_id_foreign` (`opt_id`);

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
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`sts_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`opt_id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `workorders`
--
ALTER TABLE `workorders`
  ADD PRIMARY KEY (`wop_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `downtimes`
--
ALTER TABLE `downtimes`
  MODIFY `dwn_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `machines`
--
ALTER TABLE `machines`
  MODIFY `mch_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mch_lines`
--
ALTER TABLE `mch_lines`
  MODIFY `id_line` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `sts_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `opt_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `workorders`
--
ALTER TABLE `workorders`
  MODIFY `wop_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `downtimes`
--
ALTER TABLE `downtimes`
  ADD CONSTRAINT `downtimes_id_line_foreign` FOREIGN KEY (`id_line`) REFERENCES `mch_lines` (`id_line`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `downtimes_sts_id_foreign` FOREIGN KEY (`sts_id`) REFERENCES `statuses` (`sts_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mch_lines`
--
ALTER TABLE `mch_lines`
  ADD CONSTRAINT `mch_lines_mch_id_foreign` FOREIGN KEY (`mch_id`) REFERENCES `machines` (`mch_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mch_lines_opt_id_foreign` FOREIGN KEY (`opt_id`) REFERENCES `users` (`opt_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mch_lines_sts_id_foreign` FOREIGN KEY (`sts_id`) REFERENCES `statuses` (`sts_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mch_lines_wop_id_foreign` FOREIGN KEY (`wop_id`) REFERENCES `workorders` (`wop_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
