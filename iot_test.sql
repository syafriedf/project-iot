-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2021 at 11:10 AM
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
  `sts_id` bigint(20) UNSIGNED NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(99, '2014_10_12_000000_create_users_table', 1),
(100, '2014_10_12_100000_create_password_resets_table', 1),
(101, '2019_08_19_000000_create_failed_jobs_table', 1),
(102, '2021_03_08_033614_create_operators_table', 1),
(103, '2021_03_09_035830_create_machines_table', 1),
(104, '2021_03_09_062858_create_statuses_table', 1),
(105, '2021_03_09_071444_create_workorders_table', 1),
(106, '2021_03_12_011516_create_mch_lines_table', 1),
(107, '2021_03_12_012221_create_downtimes_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `operators`
--

CREATE TABLE `operators` (
  `opt_id` bigint(20) UNSIGNED NOT NULL,
  `opt_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `operators`
--

INSERT INTO `operators` (`opt_id`, `opt_name`, `division`, `username`, `password`, `roles`, `created_at`, `updated_at`) VALUES
(2, 'asfasf', 'asfasf', 'asfasf', 'asfasf', 'asfasf', '2021-03-12 02:50:41', '2021-03-12 02:50:41'),
(4, 'asfasf', 'asfasfasfasf', 'asfasfasfasfasfasf', 'asfasf', 'asfasf', '2021-03-12 02:52:31', '2021-03-12 02:52:31');

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
-- Indexes for table `operators`
--
ALTER TABLE `operators`
  ADD PRIMARY KEY (`opt_id`),
  ADD UNIQUE KEY `operators_username_unique` (`username`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

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
  MODIFY `dwn_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `machines`
--
ALTER TABLE `machines`
  MODIFY `mch_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mch_lines`
--
ALTER TABLE `mch_lines`
  MODIFY `id_line` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `operators`
--
ALTER TABLE `operators`
  MODIFY `opt_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `sts_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `workorders`
--
ALTER TABLE `workorders`
  MODIFY `wop_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `mch_lines_opt_id_foreign` FOREIGN KEY (`opt_id`) REFERENCES `operators` (`opt_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mch_lines_sts_id_foreign` FOREIGN KEY (`sts_id`) REFERENCES `statuses` (`sts_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mch_lines_wop_id_foreign` FOREIGN KEY (`wop_id`) REFERENCES `workorders` (`wop_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
