-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 11, 2025 at 06:18 PM
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
-- Database: `akademik`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `tahun` year(4) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `isdel` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul`, `penulis`, `tahun`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`, `isdel`) VALUES
(1, 'Hantu', 'Arif Bryan', '2024', 1, '2024-12-22 05:14:36', 1, '2025-01-12 00:01:29', 1, '2024-12-22 05:15:54', 0),
(7, 'Seleraku', 'Bundomu', '1969', 1, '2025-01-11 22:37:35', 1, '2025-01-11 22:38:31', NULL, NULL, 1),
(8, 'Tanah Anarki', 'Dalang Mendem', '1968', 1, '2025-01-11 22:37:51', NULL, NULL, NULL, NULL, 0),
(9, 'Hasrat Gilaku', 'Gundul China', '1979', 1, '2025-01-11 23:58:43', 1, '2025-01-12 00:00:40', NULL, NULL, 0);

--
-- Triggers `buku`
--
DELIMITER $$
CREATE TRIGGER `before_buku_insert` BEFORE INSERT ON `buku` FOR EACH ROW BEGIN
    SET NEW.created_by = 1; -- Ganti dengan ID pengguna yang sesuai
    SET NEW.created_at = NOW();
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_buku_update` BEFORE UPDATE ON `buku` FOR EACH ROW BEGIN
    SET NEW.updated_by = 1; -- Ganti dengan ID pengguna yang sesuai
    SET NEW.updated_at = NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `active`) VALUES
(1, 'Ayub', 'Ayub@gmal.com', '$2y$10$3uvA1XVq7UV9ApiJ6R1FTOENTqnOgC4fpiGbBouUO3cYgvICjpNwG', 1),
(2, 'Goklas', 'Goklsd@.com', '$2y$10$tBeasH9IRCVQDEk/ilpKGud/PUCLeTpFOUngP1BewXCniPNmaChmC', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
