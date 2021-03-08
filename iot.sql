-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 02 Mar 2021 pada 16.56
-- Versi Server: 10.3.27-MariaDB-0+deb10u1
-- PHP Version: 7.3.27-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iot`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `downtime`
--

CREATE TABLE `downtime` (
  `dwn_id` int(11) NOT NULL,
  `id_line` int(11) NOT NULL,
  `sts_id` int(11) NOT NULL,
  `date_start` datetime DEFAULT NULL,
  `date_end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mch_line`
--

CREATE TABLE `mch_line` (
  `id_line` int(11) NOT NULL,
  `mch_id` int(11) NOT NULL,
  `sts_id` int(11) NOT NULL,
  `wop_id` int(11) NOT NULL,
  `opr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mch_line`
--

INSERT INTO `mch_line` (`id_line`, `mch_id`, `sts_id`, `wop_id`, `opr_id`) VALUES
(1, 1, 1, 1, 2),
(2, 2, 0, 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mch_master`
--

CREATE TABLE `mch_master` (
  `mch_id` int(11) NOT NULL,
  `mch_ip_addres` varchar(255) NOT NULL,
  `mch_name` varchar(255) NOT NULL,
  `mch_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mch_master`
--

INSERT INTO `mch_master` (`mch_id`, `mch_ip_addres`, `mch_name`, `mch_desc`) VALUES
(1, '192.168.10.1', 'Kautek-1', 'Mesin Blow Molding-1'),
(2, '192.168.10.2', 'Kautek-2', 'Mesin Kautek-2 dsb');

-- --------------------------------------------------------

--
-- Struktur dari tabel `opr_master`
--

CREATE TABLE `opr_master` (
  `opr_id` int(11) NOT NULL,
  `opr_name` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `opr_master`
--

INSERT INTO `opr_master` (`opr_id`, `opr_name`, `division`) VALUES
(1, 'Imam Satria', 'Blow MOlding'),
(2, 'Arif Wisnus', 'Blow MOlding');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sts_master`
--

CREATE TABLE `sts_master` (
  `sts_id` int(11) NOT NULL,
  `status_name` varchar(255) NOT NULL,
  `status_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sts_master`
--

INSERT INTO `sts_master` (`sts_id`, `status_name`, `status_desc`) VALUES
(0, 'Not Running', 'Machine is Off'),
(1, 'Running', 'Machine is ON');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wop_master`
--

CREATE TABLE `wop_master` (
  `wop_id` int(11) NOT NULL,
  `wop_target` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `wop_master`
--

INSERT INTO `wop_master` (`wop_id`, `wop_target`) VALUES
(1, '1200'),
(2, '3000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `downtime`
--
ALTER TABLE `downtime`
  ADD PRIMARY KEY (`dwn_id`),
  ADD KEY `id_line` (`id_line`),
  ADD KEY `sts_id` (`sts_id`);

--
-- Indexes for table `mch_line`
--
ALTER TABLE `mch_line`
  ADD PRIMARY KEY (`id_line`),
  ADD KEY `mch_id` (`mch_id`),
  ADD KEY `sts_id` (`sts_id`),
  ADD KEY `opr_id` (`opr_id`),
  ADD KEY `wop_id` (`wop_id`);

--
-- Indexes for table `mch_master`
--
ALTER TABLE `mch_master`
  ADD PRIMARY KEY (`mch_id`),
  ADD KEY `mch_id` (`mch_id`);

--
-- Indexes for table `opr_master`
--
ALTER TABLE `opr_master`
  ADD PRIMARY KEY (`opr_id`);

--
-- Indexes for table `sts_master`
--
ALTER TABLE `sts_master`
  ADD PRIMARY KEY (`sts_id`),
  ADD KEY `sts_id` (`sts_id`);

--
-- Indexes for table `wop_master`
--
ALTER TABLE `wop_master`
  ADD PRIMARY KEY (`wop_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `downtime`
--
ALTER TABLE `downtime`
  MODIFY `dwn_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mch_line`
--
ALTER TABLE `mch_line`
  MODIFY `id_line` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `opr_master`
--
ALTER TABLE `opr_master`
  MODIFY `opr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `wop_master`
--
ALTER TABLE `wop_master`
  MODIFY `wop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `downtime`
--
ALTER TABLE `downtime`
  ADD CONSTRAINT `downtime_ibfk_1` FOREIGN KEY (`id_line`) REFERENCES `mch_line` (`id_line`),
  ADD CONSTRAINT `downtime_ibfk_2` FOREIGN KEY (`sts_id`) REFERENCES `sts_master` (`sts_id`);

--
-- Ketidakleluasaan untuk tabel `mch_line`
--
ALTER TABLE `mch_line`
  ADD CONSTRAINT `mch_line_ibfk_1` FOREIGN KEY (`mch_id`) REFERENCES `mch_master` (`mch_id`),
  ADD CONSTRAINT `mch_line_ibfk_2` FOREIGN KEY (`sts_id`) REFERENCES `sts_master` (`sts_id`),
  ADD CONSTRAINT `mch_line_ibfk_3` FOREIGN KEY (`opr_id`) REFERENCES `opr_master` (`opr_id`),
  ADD CONSTRAINT `mch_line_ibfk_4` FOREIGN KEY (`wop_id`) REFERENCES `wop_master` (`wop_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
