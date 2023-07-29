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
-- Table structure for table `shipdivisions`
--

CREATE TABLE `shipdivisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipdivisions`
--

INSERT INTO `shipdivisions` (`id`, `division_name`, `created_at`, `updated_at`) VALUES
(2, 'Khulna', '2023-07-24 01:17:25', NULL),
(3, 'Barishal', '2023-07-24 01:17:38', NULL),
(4, 'Rajshahi', '2023-07-24 01:17:48', NULL),
(5, 'Rangpur', '2023-07-24 01:17:59', NULL),
(6, 'Sylhet', '2023-07-24 01:18:18', NULL),
(7, 'Chittagong', '2023-07-24 06:46:08', '2023-07-24 06:46:08'),
(8, 'Dhaka', '2023-07-24 06:50:25', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shipdivisions`
--
ALTER TABLE `shipdivisions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shipdivisions`
--
ALTER TABLE `shipdivisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
