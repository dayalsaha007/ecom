-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2023 at 03:43 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `shipdistricts`
--

CREATE TABLE `shipdistricts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipdistricts`
--

INSERT INTO `shipdistricts` (`id`, `division_id`, `district_name`, `created_at`, `updated_at`) VALUES
(1, 2, 'Khulna', '2023-07-24 01:30:44', NULL),
(2, 2, 'Bagerhat', '2023-07-24 01:31:25', NULL),
(3, 2, 'Kustia', '2023-07-24 01:31:41', NULL),
(4, 7, 'Rangamati', '2023-07-24 03:09:03', NULL),
(5, 7, 'Bandorbon', '2023-07-24 03:09:14', NULL),
(6, 6, 'Sylhet', '2023-07-24 06:11:46', NULL),
(7, 6, 'Moulovibazar', '2023-07-24 06:12:00', NULL),
(8, 5, 'Rangpur', '2023-07-24 06:12:12', NULL),
(9, 4, 'Rajshahi', '2023-07-24 06:12:35', NULL),
(10, 3, 'Barishal', '2023-07-24 06:12:48', NULL),
(11, 3, 'Vola', '2023-07-24 06:12:58', NULL),
(16, 8, 'Keranigong', '2023-07-25 00:30:44', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shipdistricts`
--
ALTER TABLE `shipdistricts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shipdistricts`
--
ALTER TABLE `shipdistricts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
