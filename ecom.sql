-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2023 at 04:01 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `image`, `password`, `status`, `created_at`, `updated_at`) VALUES
(2, 'dayal saha', 'dayalsaha12345678@gmail.com', NULL, '1768495811914556.jpg', '$2y$10$u.d8TsnNcbdjscszRusRyeuE9NtQMeZIswsR8xIhhtcB5BwAizlV.', 0, '2023-06-12 05:23:54', '2023-06-12 05:23:54');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `b_name_eng` varchar(255) NOT NULL,
  `b_name_hin` varchar(255) NOT NULL,
  `b_slug_eng` varchar(255) NOT NULL,
  `b_slug_hin` varchar(255) NOT NULL,
  `b_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `b_name_eng`, `b_name_hin`, `b_slug_eng`, `b_slug_hin`, `b_image`, `created_at`, `updated_at`) VALUES
(1, 'Samsung', 'सैमसंग', 'samsung', 'सैमसंग', 'samsung-0071768031391937178.png', '2023-06-07 02:23:19', '2023-06-07 02:23:19'),
(3, 'Huawei', 'हुवाई', 'huawei', 'हुवाई', 'huawei1768031569870333.png', '2023-06-07 02:25:00', NULL),
(5, 'Oppo', 'ऑप', 'oppo', 'ऑप', 'oppo1768390235185120.png', '2023-06-11 01:25:49', NULL),
(6, 'Apple', 'सेब', 'apple', 'सेब', 'apple1768390271707073.png', '2023-06-11 01:26:23', NULL),
(7, 'xiaomi', 'जिओ', 'xiaomi', 'जिओ', 'xiaomi1768390452623475.png', '2023-06-11 01:29:17', NULL),
(8, 'Nokia', 'नोकिया', 'nokia', 'नोकिया', 'nokia1768400821598623.png', '2023-06-11 04:14:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `c_name_eng` varchar(255) NOT NULL,
  `c_name_hin` varchar(255) NOT NULL,
  `c_slug_eng` varchar(255) NOT NULL,
  `c_slug_hin` varchar(255) NOT NULL,
  `c_icon` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `c_name_eng`, `c_name_hin`, `c_slug_eng`, `c_slug_hin`, `c_icon`, `created_at`, `updated_at`) VALUES
(6, 'Fashion', 'फैशन', 'fashion', 'फैशन', 'fa fa-shield', '2023-06-23 01:12:31', '2023-06-23 01:12:31'),
(7, 'Electronics', 'इलेक्ट्रानिक्स', 'electronics', 'इलेक्ट्रानिक्स', 'fa fa-bolt', '2023-06-14 23:27:56', NULL),
(8, 'Sweet Home', 'प्यारा घर', 'sweet-home', 'प्यारा-घर', 'fa fa-home', '2023-06-14 23:43:20', NULL),
(9, 'Appliances', 'उपकरण', 'appliances', 'उपकरण', 'fa fa-clock-o', '2023-06-23 01:25:55', '2023-06-23 01:25:55'),
(10, 'Beauty', 'सुंदरता', 'beauty', 'सुंदरता', 'fa fa-heart-o', '2023-06-15 00:24:16', NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_05_31_045144_create_users_table', 2),
(9, '2023_06_02_170820_create_admins_table', 3),
(10, '2023_06_06_055458_create_brands_table', 4),
(11, '2023_06_11_111402_create_categories_table', 5),
(12, '2023_06_12_061505_create_subcategories_table', 6),
(13, '2023_06_12_123243_create_subsubcategories_table', 7),
(14, '2023_06_14_071949_create_products_table', 8),
(15, '2023_06_14_074604_create_multiimages_table', 9),
(16, '2023_06_19_102751_create_sliders_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `multiimages`
--

CREATE TABLE `multiimages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_id` int(11) NOT NULL,
  `multi_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multiimages`
--

INSERT INTO `multiimages` (`id`, `p_id`, `multi_image`, `created_at`, `updated_at`) VALUES
(8, 6, 'men-typography-round-neck-cotton-blend-black-t-shirt-1768936861160134.jpeg', '2023-06-17 02:14:11', NULL),
(9, 6, 'men-typography-round-neck-cotton-blend-black-t-shirt-1768936861390287.jpeg', '2023-06-17 02:14:12', NULL),
(10, 7, 'gamin--keyboard-5g-1768940181697594.jpeg', '2023-06-17 03:06:58', NULL),
(11, 7, 'gamin--keyboard-5g-1768940181729323.jpeg', '2023-06-17 03:06:58', NULL),
(12, 7, 'gamin--keyboard-5g-1768940181763675.jpeg', '2023-06-17 03:06:58', NULL),
(16, 10, 'mens-fashionable-tshirt-1769111974138664.jpeg', '2023-06-19 00:37:32', NULL),
(17, 10, 'mens-fashionable-tshirt-1769111974242721.jpeg', '2023-06-19 00:37:32', NULL),
(18, 11, 'men-typography-round-neck-cotton-blend-black-t-shirt-1769112270957107.jpeg', '2023-06-19 00:42:15', NULL),
(19, 11, 'men-typography-round-neck-cotton-blend-black-t-shirt-1769112271021367.jpeg', '2023-06-19 00:42:15', NULL),
(20, 11, 'men-typography-round-neck-cotton-blend-black-t-shirt-1769112271064172.jpeg', '2023-06-19 00:42:15', NULL),
(21, 12, 'mens-shoes-1769377529291033.jpeg', '2023-06-21 22:58:25', NULL),
(22, 12, 'mens-shoes-1769377529342644.jpeg', '2023-06-21 22:58:25', NULL),
(23, 12, 'mens-shoes-1769377529412421.jpeg', '2023-06-21 22:58:25', NULL),
(24, 13, 'mens--stylish-hoody-1769378644840097.jpeg', '2023-06-21 23:16:09', NULL),
(25, 13, 'mens--stylish-hoody-1769378644937772.jpeg', '2023-06-21 23:16:09', NULL),
(26, 13, 'mens--stylish-hoody-1769378645063391.jpeg', '2023-06-21 23:16:09', NULL),
(27, 14, 'led--television-1769378841756601.jpeg', '2023-06-21 23:19:17', NULL),
(28, 14, 'led--television-1769378841792257.jpeg', '2023-06-21 23:19:17', NULL),
(29, 15, 'oled--tv-1769379078038811.jpeg', '2023-06-21 23:23:02', NULL),
(30, 15, 'oled--tv-1769379078076120.jpeg', '2023-06-21 23:23:02', NULL),
(31, 15, 'oled--tv-1769379078114890.jpeg', '2023-06-21 23:23:02', NULL),
(32, 16, 'oled-tv-1769379304083215.jpeg', '2023-06-21 23:26:38', NULL),
(33, 16, 'oled-tv-1769379304116156.jpeg', '2023-06-21 23:26:38', NULL),
(34, 17, 'smart-printer-1769379458763346.jpeg', '2023-06-21 23:29:05', NULL),
(35, 17, 'smart-printer-1769379458789063.jpeg', '2023-06-21 23:29:05', NULL),
(36, 18, 'ink-printer-1769379710123612.jpeg', '2023-06-21 23:33:05', NULL),
(37, 18, 'ink-printer-1769379710144290.jpeg', '2023-06-21 23:33:05', NULL),
(38, 18, 'ink-printer-1769379710174835.jpeg', '2023-06-21 23:33:05', NULL),
(39, 19, 'smart--monitor-1769380636783778.jpeg', '2023-06-21 23:47:49', NULL),
(40, 19, 'smart--monitor-1769380636821921.jpeg', '2023-06-21 23:47:49', NULL),
(41, 20, 'mens-winter-shirt-1769380824019932.jpeg', '2023-06-21 23:50:47', NULL),
(43, 22, 'simple--black-tshirt-1769381172073041.jpeg', '2023-06-21 23:56:19', NULL),
(44, 22, 'simple--black-tshirt-1769381172127192.jpeg', '2023-06-21 23:56:19', NULL),
(45, 22, 'simple--black-tshirt-1769381172181557.jpeg', '2023-06-21 23:56:19', NULL),
(46, 23, 'smart-monitor-black-1769381343668862.jpeg', '2023-06-21 23:59:03', NULL),
(47, 23, 'smart-monitor-black-1769381343705258.jpeg', '2023-06-21 23:59:03', NULL),
(48, 23, 'smart-monitor-black-1769381343738956.jpeg', '2023-06-21 23:59:03', NULL),
(49, 24, 'folding--monitor-1769381558081929.jpeg', '2023-06-22 00:02:27', NULL),
(50, 24, 'folding--monitor-1769381558117473.jpeg', '2023-06-22 00:02:27', NULL),
(51, 25, 'sweet-home-model-1769383114150801.jpg', '2023-06-22 00:27:12', NULL),
(52, 25, 'sweet-home-model-1769383114396178.jpg', '2023-06-22 00:27:12', NULL),
(53, 26, 'fresh--vegetables-1769383243776831.jpg', '2023-06-22 00:29:15', NULL),
(54, 26, 'fresh--vegetables-1769383243885972.jpg', '2023-06-22 00:29:15', NULL),
(55, 26, 'fresh--vegetables-1769383243984910.jpg', '2023-06-22 00:29:15', NULL),
(56, 27, 'fresh-cucamber-1769383542489583.jpg', '2023-06-22 00:34:00', NULL),
(57, 27, 'fresh-cucamber-1769383542590010.jpg', '2023-06-22 00:34:00', NULL),
(58, 27, 'fresh-cucamber-1769383542687362.jpg', '2023-06-22 00:34:00', NULL),
(59, 28, 'gaming--mouse-1769383892689895.jpg', '2023-06-22 00:39:34', NULL),
(60, 28, 'gaming--mouse-1769383892873498.jpg', '2023-06-22 00:39:34', NULL),
(61, 28, 'gaming--mouse-1769383893113145.jpg', '2023-06-22 00:39:35', NULL),
(62, 29, 'gaming-mouse-black-1769384210692029.jpg', '2023-06-22 00:44:37', NULL),
(63, 29, 'gaming-mouse-black-1769384210803064.jpg', '2023-06-22 00:44:37', NULL),
(64, 29, 'gaming-mouse-black-1769384210911674.jpg', '2023-06-22 00:44:37', NULL);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `b_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `sc_id` int(11) DEFAULT NULL,
  `ssc_id` int(11) DEFAULT NULL,
  `p_name_eng` varchar(255) NOT NULL,
  `p_name_hin` varchar(255) NOT NULL,
  `p_slug_eng` varchar(255) NOT NULL,
  `p_slug_hin` varchar(255) NOT NULL,
  `p_code` varchar(255) NOT NULL,
  `p_qty` varchar(255) NOT NULL,
  `p_tags_eng` varchar(255) DEFAULT NULL,
  `p_tags_hin` varchar(255) DEFAULT NULL,
  `p_size_eng` varchar(255) DEFAULT NULL,
  `p_size_hin` varchar(255) DEFAULT NULL,
  `p_color_eng` varchar(255) DEFAULT NULL,
  `p_color_hin` varchar(255) DEFAULT NULL,
  `selling_price` varchar(255) NOT NULL,
  `discount_price` varchar(255) DEFAULT NULL,
  `short_descp_eng` varchar(255) NOT NULL,
  `short_descp_hin` varchar(255) NOT NULL,
  `long_descp_eng` text NOT NULL,
  `long_descp_hin` text NOT NULL,
  `p_image` varchar(255) DEFAULT NULL,
  `hot_deals` tinyint(255) DEFAULT NULL,
  `featured` tinyint(255) DEFAULT NULL,
  `special_offer` tinyint(255) DEFAULT NULL,
  `special_deals` tinyint(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `b_id`, `c_id`, `sc_id`, `ssc_id`, `p_name_eng`, `p_name_hin`, `p_slug_eng`, `p_slug_hin`, `p_code`, `p_qty`, `p_tags_eng`, `p_tags_hin`, `p_size_eng`, `p_size_hin`, `p_color_eng`, `p_color_hin`, `selling_price`, `discount_price`, `short_descp_eng`, `short_descp_hin`, `long_descp_eng`, `long_descp_hin`, `p_image`, `hot_deals`, `featured`, `special_offer`, `special_deals`, `status`, `created_at`, `updated_at`) VALUES
(7, 7, 7, 18, 34, 'Gamin  Keyboard 5g', 'गेमिंग कीबोर्ड 5g', 'gamin--keyboard-5g', 'गेमिंग-कीबोर्ड-5g', 'gk-1', '40', 'lorem', 'lorem', 'Large, medium, Small', 'Large, medium, Small', 'Red, Black, White', 'Red, Black, White', '450', '400', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'कंपनी अपने आप में एक बेहद सफल कंपनी है. सबसे बढ़कर, लचीलापन', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '<p>यह एक लंबे समय से स्थापित तथ्य है कि किसी पृष्ठ के लेआउट को देखते समय एक पाठक की पठनीय सामग्री से विचलित हो जाएगा। लोरेम इप्सम का उपयोग करने का बिंदु यह है कि इसमें अक्षरों का अधिक या कम सामान्य वितरण है, जो \'सामग्री यहां, सामग्री यहां\' का उपयोग करने के विपरीत है, जिससे यह पठनीय अंग्रेजी जैसा दिखता है। कई डेस्कटॉप पब्लिशिंग पैकेज और वेब पेज एडिटर अब अपने डिफ़ॉल्ट मॉडल टेक्स्ट के रूप में लोरेम इप्सम का उपयोग करते हैं, और \'लोरेम इप्सम\' की खोज से कई वेब साइटों का पता चलेगा जो अभी भी अपनी प्रारंभिक अवस्था में हैं। पिछले कुछ वर्षों में कई संस्करण विकसित हुए हैं, कभी-कभी दुर्घटना से, कभी-कभी उद्देश्य से (हास्य और इसी तरह के इंजेक्शन)।</p>', 'gamin--keyboard-5g-1768950017245858.jpeg', NULL, 1, NULL, NULL, 1, '2023-06-17 05:43:18', '2023-06-18 23:24:21'),
(10, 7, 6, 11, 14, 'Mens Fashionable Tshirt', 'पुरुषों की फैशनेबल टीशर्ट', 'mens-fashionable-tshirt', 'पुरुषों-की-फैशनेबल-टीशर्ट', 'ts-1', '40', 'ipsum', 'ipsum', 'Large, medium, Small', 'Large, medium, Small', 'Red, Black, White', 'Red, Black, White', '300', '275', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'कंपनी अपने आप में एक बेहद सफल कंपनी है. सबसे बढ़कर, लचीलापन', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '<p>यह एक लंबे समय से स्थापित तथ्य है कि किसी पृष्ठ के लेआउट को देखते समय एक पाठक की पठनीय सामग्री से विचलित हो जाएगा। लोरेम इप्सम का उपयोग करने का बिंदु यह है कि इसमें अक्षरों का अधिक या कम सामान्य वितरण है, जो \'सामग्री यहां, सामग्री यहां\' का उपयोग करने के विपरीत है, जिससे यह पठनीय अंग्रेजी जैसा दिखता है। कई डेस्कटॉप पब्लिशिंग पैकेज और वेब पेज एडिटर अब अपने डिफ़ॉल्ट मॉडल टेक्स्ट के रूप में लोरेम इप्सम का उपयोग करते हैं, और \'लोरेम इप्सम\' की खोज से कई वेब साइटों का पता चलेगा जो अभी भी अपनी प्रारंभिक अवस्था में हैं। पिछले कुछ वर्षों में कई संस्करण विकसित हुए हैं, कभी-कभी दुर्घटना से, कभी-कभी उद्देश्य से (हास्य और इसी तरह के इंजेक्शन)।</p>', 'mens-fashionable-tshirt-1769111973986314.jpeg', 1, NULL, NULL, NULL, 1, '2023-06-19 00:37:32', '2023-06-21 23:44:29'),
(11, 3, 6, 11, 14, 'Men Typography Round Neck Cotton Blend Black T-Shirt', 'पुरुषों के लिए टाइपोग्राफी गोल नेक कॉटन ब्लेंड काली टी-शर्ट', 'men-typography-round-neck-cotton-blend-black-t-shirt', 'पुरुषों-के-लिए-टाइपोग्राफी-गोल-नेक-कॉटन-ब्लेंड-काली-टी-शर्ट', 'ts-2', '40', 'jesum', 'jesum', 'Large, medium, Small', 'Large, medium, Small', 'Red, Black, White', 'Red, Black, White', '310', '280', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'कंपनी अपने आप में एक बेहद सफल कंपनी है. सबसे बढ़कर, लचीलापन', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '<p>यह एक लंबे समय से स्थापित तथ्य है कि किसी पृष्ठ के लेआउट को देखते समय एक पाठक की पठनीय सामग्री से विचलित हो जाएगा। लोरेम इप्सम का उपयोग करने का बिंदु यह है कि इसमें अक्षरों का अधिक या कम सामान्य वितरण है, जो \'सामग्री यहां, सामग्री यहां\' का उपयोग करने के विपरीत है, जिससे यह पठनीय अंग्रेजी जैसा दिखता है। कई डेस्कटॉप पब्लिशिंग पैकेज और वेब पेज एडिटर अब अपने डिफ़ॉल्ट मॉडल टेक्स्ट के रूप में लोरेम इप्सम का उपयोग करते हैं, और \'लोरेम इप्सम\' की खोज से कई वेब साइटों का पता चलेगा जो अभी भी अपनी प्रारंभिक अवस्था में हैं। पिछले कुछ वर्षों में कई संस्करण विकसित हुए हैं, कभी-कभी दुर्घटना से, कभी-कभी उद्देश्य से (हास्य और इसी तरह के इंजेक्शन)।</p>', 'men-typography-round-neck-cotton-blend-black-t-shirt-1769112270797900.jpeg', NULL, 1, 1, NULL, 1, '2023-06-19 00:42:15', '2023-06-21 23:44:44'),
(12, 6, 6, 13, 21, 'Mens Shoes', 'पुरुषों के जूते', 'mens-shoes', 'पुरुषों-के-जूते', 's-01', '40', 'ipsum', 'ipsum', 'Large, medium, Small', 'Large, medium, Small', 'Red, Black, White', 'Red, Black, White', '500', '470', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum', 'कंपनी अपने आप में एक बेहद सफल कंपनी है. सबसे बढ़कर, लचीलापन', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,<br>molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum<br>numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium<br>optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis<br>obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam<br>nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,<br>tenetur error, harum nesciunt ipsum debitis quas aliquid. Reprehenderit,<br>quia. Quo neque error repudiandae fuga? Ipsa laudantium molestias eos&nbsp;<br>sapiente officiis modi at sunt excepturi expedita sint? Sed quibusdam<br>recusandae alias error harum maxime adipisci amet laborum. Perspiciatis&nbsp;<br>minima nesciunt dolorem! Officiis iure rerum voluptates a cumque velit&nbsp;<br>quibusdam sed amet tempora. Sit laborum ab, eius fugit doloribus tenetur&nbsp;<br>fugiat, temporibus enim commodi iusto libero magni deleniti quod quam&nbsp;<br>consequuntur! Commodi minima excepturi repudiandae velit hic maxime<br>doloremque. Quaerat provident commodi consectetur veniam similique ad&nbsp;<br>earum omnis ipsum saepe, voluptas, hic voluptates pariatur est explicabo&nbsp;<br>fugiat, dolorum eligendi quam cupiditate excepturi mollitia maiores labore&nbsp;<br>suscipit quas? Nulla, placeat. Voluptatem quaerat non architecto ab laudantium<br>modi minima sunt esse temporibus sint culpa, recusandae aliquam numquam&nbsp;<br>totam ratione voluptas quod exercitationem fuga. Possimus quis earum veniam&nbsp;<br>quasi aliquam eligendi, placeat qui corporis!</p>', '<p>कंपनी अपने आप में एक बहुत ही सफल कंपनी है। सर्वाधिक लचीला<br>असुविधाएँ, भले ही वे फायदे हों, श्रम के सुख का परिणाम हैं<br>लेकिन वह इन लोगों की चापलूसी से भागने से नफरत करता है, बल्कि उपस्थित लोगों की मात्र उड़ान से<br>विकल्प, और वे चीज़ें! वे ऐसे आरोप लगाने वालों की व्यवस्था करते हैं, लेकिन किसी की नहीं। सच का<br>कुछ खुशी के साथ वास्तुकार को परेशान करने के अपने अधिकार से वह अंधा हो जाएगा<br>कुछ नहीं, ऐसा होगा कुछ सेवाओं की गलती है या! यह उसे खोजने से रोकता है, वह नफरत करता है,<br>यह ग़लत माना जाता है, कि वे नहीं जानते कि उन पर क्या बकाया है। आलोचना करना<br>क्योंकि फ्लाइट रिजेक्ट करने में कहां हुई गलती? वह उनकी परेशानियों की तारीफ करती हैं<br>लेकिन क्या उन्हें बुद्धिमानी से स्वीकार किया जाना चाहिए? लेकिन कुछ को<br>दूसरी गलती इन चीजों से अधिकतम लाभ लेने से इनकार करना है। आइए देखते हैं<br>छोटे बच्चे दर्द नहीं जानते! वह जिससे चाहे, वस्तुओं के नियम का सुख ले सकता है<br>लेकिन कुछ लोगों के लिए यह मज़ेदार समय है। उसके कष्टों से ही सही, वह अपने कष्टों से ही बंधा हुआ है<br>उसे भाग जाने दो, क्योंकि सुविधा के समय बड़ी सज्जनता से उसे मुक्त कर दिया गया<br>परिणाम! इनमें से सबसे कम फायदे को यहां खारिज किया जाना चाहिए<br>और दर्द वह क्षमा आदि के लाभ प्रदान करना चाहता है<br>मैं उन सभी को बहुत बार समझाऊंगा, आनंद, यहां आनंद पैदा होता है<br>उसे श्रम के साथ अधिक लचीलेपन को स्वीकार करने की इच्छा के बजाय दर्द चुनने के लिए भागने दें<br>उसमें क्या लगेगा? कृपया नहीं। उसे एक वास्तुकार के रूप में नहीं, बल्कि उन लोगों से खुशी की तलाश करनी चाहिए जो उसकी प्रशंसा करते हैं<br>कभी-कभी गलती करने से बचने के, कभी भी किसी को मना न करने के बहुत कम तरीके होते हैं<br>संपूर्ण कारण आनंद और उड़ान है। हम उनमें से किसी के पास आ सकते हैं<br>मानो किसी एक को चुनना हो, तो उसे शरीर को प्रसन्न करने दो!</p>', 'mens-shoes-1769377529158805.jpeg', NULL, NULL, NULL, 1, 1, '2023-06-21 22:58:25', '2023-06-21 23:44:51'),
(13, 6, 6, 11, 15, 'Mens  stylish Hoody', 'पुरुषों की स्टाइलिश हुडी', 'mens--stylish-hoody', 'पुरुषों-की-स्टाइलिश-हुडी', 'ts-3', '200', 'jesum', 'jesum', 'Large, medium, Small', 'Large, medium, Small', 'Red, Black, White', 'Red, Black, White', '600', '580', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum', 'कंपनी अपने आप में एक बेहद सफल कंपनी है. सबसे बढ़कर, लचीलापन', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,<br>molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum<br>numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium<br>optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis<br>obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam<br>nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,<br>tenetur error, harum nesciunt ipsum debitis quas aliquid. Reprehenderit,<br>quia. Quo neque error repudiandae fuga? Ipsa laudantium molestias eos&nbsp;<br>sapiente officiis modi at sunt excepturi expedita sint? Sed quibusdam<br>recusandae alias error harum maxime adipisci amet laborum. Perspiciatis&nbsp;<br>minima nesciunt dolorem! Officiis iure rerum voluptates a cumque velit&nbsp;<br>quibusdam sed amet tempora. Sit laborum ab, eius fugit doloribus tenetur&nbsp;<br>fugiat, temporibus enim commodi iusto libero magni deleniti quod quam&nbsp;<br>consequuntur! Commodi minima excepturi repudiandae velit hic maxime<br>doloremque. Quaerat provident commodi consectetur veniam similique ad&nbsp;<br>earum omnis ipsum saepe, voluptas, hic voluptates pariatur est explicabo&nbsp;<br>fugiat, dolorum eligendi quam cupiditate excepturi mollitia maiores labore&nbsp;<br>suscipit quas? Nulla, placeat. Voluptatem quaerat non architecto ab laudantium<br>modi minima sunt esse temporibus sint culpa, recusandae aliquam numquam&nbsp;<br>totam ratione voluptas quod exercitationem fuga. Possimus quis earum veniam&nbsp;<br>quasi aliquam eligendi, placeat qui corporis!</p>', '<p>कंपनी अपने आप में एक बहुत ही सफल कंपनी है। सर्वाधिक लचीला<br>असुविधाएँ, भले ही वे फायदे हों, श्रम के सुख का परिणाम हैं<br>लेकिन वह इन लोगों की चापलूसी से भागने से नफरत करता है, बल्कि उपस्थित लोगों की मात्र उड़ान से<br>विकल्प, और वे चीज़ें! वे ऐसे आरोप लगाने वालों की व्यवस्था करते हैं, लेकिन किसी की नहीं। सच का<br>कुछ खुशी के साथ वास्तुकार को परेशान करने के अपने अधिकार से वह अंधा हो जाएगा<br>कुछ नहीं, ऐसा होगा कुछ सेवाओं की गलती है या! यह उसे खोजने से रोकता है, वह नफरत करता है,<br>यह ग़लत माना जाता है, कि वे नहीं जानते कि उन पर क्या बकाया है। आलोचना करना<br>क्योंकि फ्लाइट रिजेक्ट करने में कहां हुई गलती? वह उनकी परेशानियों की तारीफ करती हैं<br>लेकिन क्या उन्हें बुद्धिमानी से स्वीकार किया जाना चाहिए? लेकिन कुछ को<br>दूसरी गलती इन चीजों से अधिकतम लाभ लेने से इनकार करना है। आइए देखते हैं<br>छोटे बच्चे दर्द नहीं जानते! वह जिससे चाहे, वस्तुओं के नियम का सुख ले सकता है<br>लेकिन कुछ लोगों के लिए यह मज़ेदार समय है। उसके कष्टों से ही सही, वह अपने कष्टों से ही बंधा हुआ है<br>उसे भाग जाने दो, क्योंकि सुविधा के समय बड़ी सज्जनता से उसे मुक्त कर दिया गया<br>परिणाम! इनमें से सबसे कम फायदे को यहां खारिज किया जाना चाहिए<br>और दर्द वह क्षमा आदि के लाभ प्रदान करना चाहता है<br>मैं उन सभी को बहुत बार समझाऊंगा, आनंद, यहां आनंद पैदा होता है<br>उसे श्रम के साथ अधिक लचीलेपन को स्वीकार करने की इच्छा के बजाय दर्द चुनने के लिए भागने दें<br>उसमें क्या लगेगा? कृपया नहीं। उसे एक वास्तुकार के रूप में नहीं, बल्कि उन लोगों से खुशी की तलाश करनी चाहिए जो उसकी प्रशंसा करते हैं<br>कभी-कभी गलती करने से बचने के, कभी भी किसी को मना न करने के बहुत कम तरीके होते हैं<br>संपूर्ण कारण आनंद और उड़ान है। हम उनमें से किसी के पास आ सकते हैं<br>मानो किसी एक को चुनना हो, तो उसे शरीर को प्रसन्न करने दो!</p>', 'mens--stylish-hoody-1769378644699059.jpeg', NULL, 1, NULL, NULL, 1, '2023-06-21 23:16:09', '2023-07-01 08:02:52'),
(14, 5, 9, 22, 45, 'Led  Television', 'एलईडी टेलीविजन', 'led--television', 'एलईडी-टेलीविजन', 'lt-01', '200', 'lorem', 'lorem', 'Large, medium, Small', 'Large, medium, Small', 'Red, Black, White', 'Red, Black, White', '10000', '9700', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum.', 'कंपनी अपने आप में एक बेहद सफल कंपनी है. सबसे बढ़कर, लचीलापन', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,<br>molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum<br>numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium<br>optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis<br>obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam<br>nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,<br>tenetur error, harum nesciunt ipsum debitis quas aliquid. Reprehenderit,<br>quia. Quo neque error repudiandae fuga? Ipsa laudantium molestias eos&nbsp;<br>sapiente officiis modi at sunt excepturi expedita sint? Sed quibusdam<br>recusandae alias error harum maxime adipisci amet laborum. Perspiciatis&nbsp;<br>minima nesciunt dolorem! Officiis iure rerum voluptates a cumque velit&nbsp;<br>quibusdam sed amet tempora. Sit laborum ab, eius fugit doloribus tenetur&nbsp;<br>fugiat, temporibus enim commodi iusto libero magni deleniti quod quam&nbsp;<br>consequuntur! Commodi minima excepturi repudiandae velit hic maxime<br>doloremque. Quaerat provident commodi consectetur veniam similique ad&nbsp;<br>earum omnis ipsum saepe, voluptas, hic voluptates pariatur est explicabo&nbsp;<br>fugiat, dolorum eligendi quam cupiditate excepturi mollitia maiores labore&nbsp;<br>suscipit quas? Nulla, placeat. Voluptatem quaerat non architecto ab laudantium<br>modi minima sunt esse temporibus sint culpa, recusandae aliquam numquam&nbsp;<br>totam ratione voluptas quod exercitationem fuga. Possimus quis earum veniam&nbsp;<br>quasi aliquam eligendi, placeat qui corporis!</p>', '<p>कंपनी अपने आप में एक बहुत ही सफल कंपनी है। सर्वाधिक लचीला<br>असुविधाएँ, भले ही वे फायदे हों, श्रम के सुख का परिणाम हैं<br>लेकिन वह इन लोगों की चापलूसी से भागने से नफरत करता है, बल्कि उपस्थित लोगों की मात्र उड़ान से<br>विकल्प, और वे चीज़ें! वे ऐसे आरोप लगाने वालों की व्यवस्था करते हैं, लेकिन किसी की नहीं। सच का<br>कुछ खुशी के साथ वास्तुकार को परेशान करने के अपने अधिकार से वह अंधा हो जाएगा<br>कुछ नहीं, ऐसा होगा कुछ सेवाओं की गलती है या! यह उसे खोजने से रोकता है, वह नफरत करता है,<br>यह ग़लत माना जाता है, कि वे नहीं जानते कि उन पर क्या बकाया है। आलोचना करना<br>क्योंकि फ्लाइट रिजेक्ट करने में कहां हुई गलती? वह उनकी परेशानियों की तारीफ करती हैं<br>लेकिन क्या उन्हें बुद्धिमानी से स्वीकार किया जाना चाहिए? लेकिन कुछ को<br>दूसरी गलती इन चीजों से अधिकतम लाभ लेने से इनकार करना है। आइए देखते हैं<br>छोटे बच्चे दर्द नहीं जानते! वह जिससे चाहे, वस्तुओं के नियम का सुख ले सकता है<br>लेकिन कुछ लोगों के लिए यह मज़ेदार समय है। उसके कष्टों से ही सही, वह अपने कष्टों से ही बंधा हुआ है<br>उसे भाग जाने दो, क्योंकि सुविधा के समय बड़ी सज्जनता से उसे मुक्त कर दिया गया<br>परिणाम! इनमें से सबसे कम फायदे को यहां खारिज किया जाना चाहिए<br>और दर्द वह क्षमा आदि के लाभ प्रदान करना चाहता है<br>मैं उन सभी को बहुत बार समझाऊंगा, आनंद, यहां आनंद पैदा होता है<br>उसे श्रम के साथ अधिक लचीलेपन को स्वीकार करने की इच्छा के बजाय दर्द चुनने के लिए भागने दें<br>उसमें क्या लगेगा? कृपया नहीं। उसे एक वास्तुकार के रूप में नहीं, बल्कि उन लोगों से खुशी की तलाश करनी चाहिए जो उसकी प्रशंसा करते हैं<br>कभी-कभी गलती करने से बचने के, कभी भी किसी को मना न करने के बहुत कम तरीके होते हैं<br>संपूर्ण कारण आनंद और उड़ान है। हम उनमें से किसी के पास आ सकते हैं<br>मानो किसी एक को चुनना हो, तो उसे शरीर को प्रसन्न करने दो!</p>', 'led--television-1769378841699556.jpeg', NULL, NULL, 1, NULL, 1, '2023-06-21 23:19:17', '2023-06-21 23:44:01'),
(16, 3, 9, 22, 47, 'Oled Tv', 'आप टीवी पर हैं', 'oled-tv', 'आप-टीवी-पर-हैं', 'oltv-01', '200', 'jesum', 'jesum', 'Large, medium, Small', 'Large, medium, Small', 'Red, Black, White', 'Red, Black, White', '15000', '14500', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia, molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum', 'कंपनी अपने आप में एक बेहद सफल कंपनी है. सबसे बढ़कर, लचीलापन', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,<br>molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum<br>numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium<br>optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis<br>obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam<br>nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,<br>tenetur error, harum nesciunt ipsum debitis quas aliquid. Reprehenderit,<br>quia. Quo neque error repudiandae fuga? Ipsa laudantium molestias eos&nbsp;<br>sapiente officiis modi at sunt excepturi expedita sint? Sed quibusdam<br>recusandae alias error harum maxime adipisci amet laborum. Perspiciatis&nbsp;<br>minima nesciunt dolorem! Officiis iure rerum voluptates a cumque velit&nbsp;<br>quibusdam sed amet tempora. Sit laborum ab, eius fugit doloribus tenetur&nbsp;<br>fugiat, temporibus enim commodi iusto libero magni deleniti quod quam&nbsp;<br>consequuntur! Commodi minima excepturi repudiandae velit hic maxime<br>doloremque. Quaerat provident commodi consectetur veniam similique ad&nbsp;<br>earum omnis ipsum saepe, voluptas, hic voluptates pariatur est explicabo&nbsp;<br>fugiat, dolorum eligendi quam cupiditate excepturi mollitia maiores labore&nbsp;<br>suscipit quas? Nulla, placeat. Voluptatem quaerat non architecto ab laudantium<br>modi minima sunt esse temporibus sint culpa, recusandae aliquam numquam&nbsp;<br>totam ratione voluptas quod exercitationem fuga. Possimus quis earum veniam&nbsp;<br>quasi aliquam eligendi, placeat qui corporis!</p>', '<p>कंपनी अपने आप में एक बहुत ही सफल कंपनी है। सर्वाधिक लचीला<br>असुविधाएँ, भले ही वे फायदे हों, श्रम के सुख का परिणाम हैं<br>लेकिन वह इन लोगों की चापलूसी से भागने से नफरत करता है, बल्कि उपस्थित लोगों की मात्र उड़ान से<br>विकल्प, और वे चीज़ें! वे ऐसे आरोप लगाने वालों की व्यवस्था करते हैं, लेकिन किसी की नहीं। सच का<br>कुछ खुशी के साथ वास्तुकार को परेशान करने के अपने अधिकार से वह अंधा हो जाएगा<br>कुछ नहीं, ऐसा होगा कुछ सेवाओं की गलती है या! यह उसे खोजने से रोकता है, वह नफरत करता है,<br>यह ग़लत माना जाता है, कि वे नहीं जानते कि उन पर क्या बकाया है। आलोचना करना<br>क्योंकि फ्लाइट रिजेक्ट करने में कहां हुई गलती? वह उनकी परेशानियों की तारीफ करती हैं<br>लेकिन क्या उन्हें बुद्धिमानी से स्वीकार किया जाना चाहिए? लेकिन कुछ को<br>दूसरी गलती इन चीजों से अधिकतम लाभ लेने से इनकार करना है। आइए देखते हैं<br>छोटे बच्चे दर्द नहीं जानते! वह जिससे चाहे, वस्तुओं के नियम का सुख ले सकता है<br>लेकिन कुछ लोगों के लिए यह मज़ेदार समय है। उसके कष्टों से ही सही, वह अपने कष्टों से ही बंधा हुआ है<br>उसे भाग जाने दो, क्योंकि सुविधा के समय बड़ी सज्जनता से उसे मुक्त कर दिया गया<br>परिणाम! इनमें से सबसे कम फायदे को यहां खारिज किया जाना चाहिए<br>और दर्द वह क्षमा आदि के लाभ प्रदान करना चाहता है<br>मैं उन सभी को बहुत बार समझाऊंगा, आनंद, यहां आनंद पैदा होता है<br>उसे श्रम के साथ अधिक लचीलेपन को स्वीकार करने की इच्छा के बजाय दर्द चुनने के लिए भागने दें<br>उसमें क्या लगेगा? कृपया नहीं। उसे एक वास्तुकार के रूप में नहीं, बल्कि उन लोगों से खुशी की तलाश करनी चाहिए जो उसकी प्रशंसा करते हैं<br>कभी-कभी गलती करने से बचने के, कभी भी किसी को मना न करने के बहुत कम तरीके होते हैं<br>संपूर्ण कारण आनंद और उड़ान है। हम उनमें से किसी के पास आ सकते हैं<br>मानो किसी एक को चुनना हो, तो उसे शरीर को प्रसन्न करने दो!</p>', 'oled-tv-1769379304032662.jpeg', NULL, NULL, NULL, 1, 1, '2023-06-21 23:26:38', '2023-06-21 23:44:37'),
(17, 7, 7, 16, 27, 'Smart Printer', 'स्मार्ट प्रिंटर', 'smart-printer', 'स्मार्ट-प्रिंटर', 'p-01', '500', 'ipsum', 'ipsum', 'Large, medium, Small', 'Large, medium, Small', 'Red, Black, White', 'Red, Black, White', '13000', '12700', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,', 'कंपनी अपने आप में एक बेहद सफल कंपनी है. सबसे बढ़कर, लचीलापन', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,<br>molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum<br>numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium<br>optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis<br>obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam<br>nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,<br>tenetur error, harum nesciunt ipsum debitis quas aliquid. Reprehenderit,<br>quia. Quo neque error repudiandae fuga? Ipsa laudantium molestias eos&nbsp;<br>sapiente officiis modi at sunt excepturi expedita sint? Sed quibusdam<br>recusandae alias error harum maxime adipisci amet laborum. Perspiciatis&nbsp;<br>minima nesciunt dolorem! Officiis iure rerum voluptates a cumque velit&nbsp;<br>quibusdam sed amet tempora. Sit laborum ab, eius fugit doloribus tenetur&nbsp;<br>fugiat, temporibus enim commodi iusto libero magni deleniti quod quam&nbsp;<br>consequuntur! Commodi minima excepturi repudiandae velit hic maxime<br>doloremque. Quaerat provident commodi consectetur veniam similique ad&nbsp;<br>earum omnis ipsum saepe, voluptas, hic voluptates pariatur est explicabo&nbsp;<br>fugiat, dolorum eligendi quam cupiditate excepturi mollitia maiores labore&nbsp;<br>suscipit quas? Nulla, placeat. Voluptatem quaerat non architecto ab laudantium<br>modi minima sunt esse temporibus sint culpa, recusandae aliquam numquam&nbsp;<br>totam ratione voluptas quod exercitationem fuga. Possimus quis earum veniam&nbsp;<br>quasi aliquam eligendi, placeat qui corporis!</p>', '<p>कंपनी अपने आप में एक बहुत ही सफल कंपनी है। सर्वाधिक लचीला<br>असुविधाएँ, भले ही वे फायदे हों, श्रम के सुख का परिणाम हैं<br>लेकिन वह इन लोगों की चापलूसी से भागने से नफरत करता है, बल्कि उपस्थित लोगों की मात्र उड़ान से<br>विकल्प, और वे चीज़ें! वे ऐसे आरोप लगाने वालों की व्यवस्था करते हैं, लेकिन किसी की नहीं। सच का<br>कुछ खुशी के साथ वास्तुकार को परेशान करने के अपने अधिकार से वह अंधा हो जाएगा<br>कुछ नहीं, ऐसा होगा कुछ सेवाओं की गलती है या! यह उसे खोजने से रोकता है, वह नफरत करता है,<br>यह ग़लत माना जाता है, कि वे नहीं जानते कि उन पर क्या बकाया है। आलोचना करना<br>क्योंकि फ्लाइट रिजेक्ट करने में कहां हुई गलती? वह उनकी परेशानियों की तारीफ करती हैं<br>लेकिन क्या उन्हें बुद्धिमानी से स्वीकार किया जाना चाहिए? लेकिन कुछ को<br>दूसरी गलती इन चीजों से अधिकतम लाभ लेने से इनकार करना है। आइए देखते हैं<br>छोटे बच्चे दर्द नहीं जानते! वह जिससे चाहे, वस्तुओं के नियम का सुख ले सकता है<br>लेकिन कुछ लोगों के लिए यह मज़ेदार समय है। उसके कष्टों से ही सही, वह अपने कष्टों से ही बंधा हुआ है<br>उसे भाग जाने दो, क्योंकि सुविधा के समय बड़ी सज्जनता से उसे मुक्त कर दिया गया<br>परिणाम! इनमें से सबसे कम फायदे को यहां खारिज किया जाना चाहिए<br>और दर्द वह क्षमा आदि के लाभ प्रदान करना चाहता है<br>मैं उन सभी को बहुत बार समझाऊंगा, आनंद, यहां आनंद पैदा होता है<br>उसे श्रम के साथ अधिक लचीलेपन को स्वीकार करने की इच्छा के बजाय दर्द चुनने के लिए भागने दें<br>उसमें क्या लगेगा? कृपया नहीं। उसे एक वास्तुकार के रूप में नहीं, बल्कि उन लोगों से खुशी की तलाश करनी चाहिए जो उसकी प्रशंसा करते हैं<br>कभी-कभी गलती करने से बचने के, कभी भी किसी को मना न करने के बहुत कम तरीके होते हैं<br>संपूर्ण कारण आनंद और उड़ान है। हम उनमें से किसी के पास आ सकते हैं<br>मानो किसी एक को चुनना हो, तो उसे शरीर को प्रसन्न करने दो!</p>', 'smart-printer-1769379458717996.jpeg', NULL, NULL, 1, NULL, 1, '2023-06-21 23:29:05', '2023-06-21 23:44:22'),
(18, 8, 7, 16, 27, 'Ink Printer', 'स्याही मुद्रक', 'ink-printer', 'स्याही-मुद्रक', 'ip-01', '150', 'lorem', 'lorem', 'Large, medium, Small', 'Large, medium, Small', 'Red, Black, White', 'Red, Black, White', '12000', '11500', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum', 'कंपनी अपने आप में एक बेहद सफल कंपनी है. सबसे बढ़कर, लचीलापन', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,<br>molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum<br>numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium<br>optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis<br>obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam<br>nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,<br>tenetur error, harum nesciunt ipsum debitis quas aliquid. Reprehenderit,<br>quia. Quo neque error repudiandae fuga? Ipsa laudantium molestias eos&nbsp;<br>sapiente officiis modi at sunt excepturi expedita sint? Sed quibusdam<br>recusandae alias error harum maxime adipisci amet laborum. Perspiciatis&nbsp;<br>minima nesciunt dolorem! Officiis iure rerum voluptates a cumque velit&nbsp;<br>quibusdam sed amet tempora. Sit laborum ab, eius fugit doloribus tenetur&nbsp;<br>fugiat, temporibus enim commodi iusto libero magni deleniti quod quam&nbsp;<br>consequuntur! Commodi minima excepturi repudiandae velit hic maxime<br>doloremque. Quaerat provident commodi consectetur veniam similique ad&nbsp;<br>earum omnis ipsum saepe, voluptas, hic voluptates pariatur est explicabo&nbsp;<br>fugiat, dolorum eligendi quam cupiditate excepturi mollitia maiores labore&nbsp;<br>suscipit quas? Nulla, placeat. Voluptatem quaerat non architecto ab laudantium<br>modi minima sunt esse temporibus sint culpa, recusandae aliquam numquam&nbsp;<br>totam ratione voluptas quod exercitationem fuga. Possimus quis earum veniam&nbsp;<br>quasi aliquam eligendi, placeat qui corporis!</p>', '<p>कंपनी अपने आप में एक बहुत ही सफल कंपनी है। सर्वाधिक लचीला<br>असुविधाएँ, भले ही वे फायदे हों, श्रम के सुख का परिणाम हैं<br>लेकिन वह इन लोगों की चापलूसी से भागने से नफरत करता है, बल्कि उपस्थित लोगों की मात्र उड़ान से<br>विकल्प, और वे चीज़ें! वे ऐसे आरोप लगाने वालों की व्यवस्था करते हैं, लेकिन किसी की नहीं। सच का<br>कुछ खुशी के साथ वास्तुकार को परेशान करने के अपने अधिकार से वह अंधा हो जाएगा<br>कुछ नहीं, ऐसा होगा कुछ सेवाओं की गलती है या! यह उसे खोजने से रोकता है, वह नफरत करता है,<br>यह ग़लत माना जाता है, कि वे नहीं जानते कि उन पर क्या बकाया है। आलोचना करना<br>क्योंकि फ्लाइट रिजेक्ट करने में कहां हुई गलती? वह उनकी परेशानियों की तारीफ करती हैं<br>लेकिन क्या उन्हें बुद्धिमानी से स्वीकार किया जाना चाहिए? लेकिन कुछ को<br>दूसरी गलती इन चीजों से अधिकतम लाभ लेने से इनकार करना है। आइए देखते हैं<br>छोटे बच्चे दर्द नहीं जानते! वह जिससे चाहे, वस्तुओं के नियम का सुख ले सकता है<br>लेकिन कुछ लोगों के लिए यह मज़ेदार समय है। उसके कष्टों से ही सही, वह अपने कष्टों से ही बंधा हुआ है<br>उसे भाग जाने दो, क्योंकि सुविधा के समय बड़ी सज्जनता से उसे मुक्त कर दिया गया<br>परिणाम! इनमें से सबसे कम फायदे को यहां खारिज किया जाना चाहिए<br>और दर्द वह क्षमा आदि के लाभ प्रदान करना चाहता है<br>मैं उन सभी को बहुत बार समझाऊंगा, आनंद, यहां आनंद पैदा होता है<br>उसे श्रम के साथ अधिक लचीलेपन को स्वीकार करने की इच्छा के बजाय दर्द चुनने के लिए भागने दें<br>उसमें क्या लगेगा? कृपया नहीं। उसे एक वास्तुकार के रूप में नहीं, बल्कि उन लोगों से खुशी की तलाश करनी चाहिए जो उसकी प्रशंसा करते हैं<br>कभी-कभी गलती करने से बचने के, कभी भी किसी को मना न करने के बहुत कम तरीके होते हैं<br>संपूर्ण कारण आनंद और उड़ान है। हम उनमें से किसी के पास आ सकते हैं<br>मानो किसी एक को चुनना हो, तो उसे शरीर को प्रसन्न करने दो!</p>', 'ink-printer-1769379710079268.jpeg', NULL, NULL, 1, NULL, 1, '2023-06-21 23:33:05', '2023-06-21 23:44:15'),
(19, 3, 7, 16, 28, 'Smart  Monitor', 'स्मार्ट मॉनिटर', 'smart--monitor', 'स्मार्ट-मॉनिटर', 'm-01', '100', 'jesum', 'jesum', 'Large, medium, Small', 'Large, medium, Small', 'Red, Black, White', 'Red, Black, White', '11000', '10800', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,', 'कंपनी अपने आप में एक बेहद सफल कंपनी है. सबसे बढ़कर, लचीलापन', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,<br>molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum<br>numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium<br>optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis<br>obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam<br>nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,<br>tenetur error, harum nesciunt ipsum debitis quas aliquid. Reprehenderit,<br>quia. Quo neque error repudiandae fuga? Ipsa laudantium molestias eos&nbsp;<br>sapiente officiis modi at sunt excepturi expedita sint? Sed quibusdam<br>recusandae alias error harum maxime adipisci amet laborum. Perspiciatis&nbsp;<br>minima nesciunt dolorem! Officiis iure rerum voluptates a cumque velit&nbsp;<br>quibusdam sed amet tempora. Sit laborum ab, eius fugit doloribus tenetur&nbsp;<br>fugiat, temporibus enim commodi iusto libero magni deleniti quod quam&nbsp;<br>consequuntur! Commodi minima excepturi repudiandae velit hic maxime<br>doloremque. Quaerat provident commodi consectetur veniam similique ad&nbsp;<br>earum omnis ipsum saepe, voluptas, hic voluptates pariatur est explicabo&nbsp;<br>fugiat, dolorum eligendi quam cupiditate excepturi mollitia maiores labore&nbsp;<br>suscipit quas? Nulla, placeat. Voluptatem quaerat non architecto ab laudantium<br>modi minima sunt esse temporibus sint culpa, recusandae aliquam numquam&nbsp;<br>totam ratione voluptas quod exercitationem fuga. Possimus quis earum veniam&nbsp;<br>quasi aliquam eligendi, placeat qui corporis!</p>', '<p>कंपनी अपने आप में एक बहुत ही सफल कंपनी है। सर्वाधिक लचीला<br>असुविधाएँ, भले ही वे फायदे हों, श्रम के सुख का परिणाम हैं<br>लेकिन वह इन लोगों की चापलूसी से भागने से नफरत करता है, बल्कि उपस्थित लोगों की मात्र उड़ान से<br>विकल्प, और वे चीज़ें! वे ऐसे आरोप लगाने वालों की व्यवस्था करते हैं, लेकिन किसी की नहीं। सच का<br>कुछ खुशी के साथ वास्तुकार को परेशान करने के अपने अधिकार से वह अंधा हो जाएगा<br>कुछ नहीं, ऐसा होगा कुछ सेवाओं की गलती है या! यह उसे खोजने से रोकता है, वह नफरत करता है,<br>यह ग़लत माना जाता है, कि वे नहीं जानते कि उन पर क्या बकाया है। आलोचना करना<br>क्योंकि फ्लाइट रिजेक्ट करने में कहां हुई गलती? वह उनकी परेशानियों की तारीफ करती हैं<br>लेकिन क्या उन्हें बुद्धिमानी से स्वीकार किया जाना चाहिए? लेकिन कुछ को<br>दूसरी गलती इन चीजों से अधिकतम लाभ लेने से इनकार करना है। आइए देखते हैं<br>छोटे बच्चे दर्द नहीं जानते! वह जिससे चाहे, वस्तुओं के नियम का सुख ले सकता है<br>लेकिन कुछ लोगों के लिए यह मज़ेदार समय है। उसके कष्टों से ही सही, वह अपने कष्टों से ही बंधा हुआ है<br>उसे भाग जाने दो, क्योंकि सुविधा के समय बड़ी सज्जनता से उसे मुक्त कर दिया गया<br>परिणाम! इनमें से सबसे कम फायदे को यहां खारिज किया जाना चाहिए<br>और दर्द वह क्षमा आदि के लाभ प्रदान करना चाहता है<br>मैं उन सभी को बहुत बार समझाऊंगा, आनंद, यहां आनंद पैदा होता है<br>उसे श्रम के साथ अधिक लचीलेपन को स्वीकार करने की इच्छा के बजाय दर्द चुनने के लिए भागने दें<br>उसमें क्या लगेगा? कृपया नहीं। उसे एक वास्तुकार के रूप में नहीं, बल्कि उन लोगों से खुशी की तलाश करनी चाहिए जो उसकी प्रशंसा करते हैं<br>कभी-कभी गलती करने से बचने के, कभी भी किसी को मना न करने के बहुत कम तरीके होते हैं<br>संपूर्ण कारण आनंद और उड़ान है। हम उनमें से किसी के पास आ सकते हैं<br>मानो किसी एक को चुनना हो, तो उसे शरीर को प्रसन्न करने दो!</p>', 'smart--monitor-1769380636721604.jpeg', 1, NULL, 1, NULL, 1, '2023-06-21 23:47:49', '2023-06-22 00:14:58'),
(20, 6, 6, 11, 15, 'Mens Winter Shirt', 'पुरुषों की शीतकालीन शर्ट', 'mens-winter-shirt', 'पुरुषों-की-शीतकालीन-शर्ट', 'wts-01', '200', 'ipsum', 'ipsum', 'Large, medium, Small', 'Large, medium, Small', 'Red, Black, White', 'Red, Black, White', '700', '650', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,', 'कंपनी अपने आप में एक बेहद सफल कंपनी है. सबसे बढ़कर, लचीलापन', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,<br>molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum<br>numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium<br>optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis<br>obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam<br>nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,<br>tenetur error, harum nesciunt ipsum debitis quas aliquid. Reprehenderit,<br>quia. Quo neque error repudiandae fuga? Ipsa laudantium molestias eos&nbsp;<br>sapiente officiis modi at sunt excepturi expedita sint? Sed quibusdam<br>recusandae alias error harum maxime adipisci amet laborum. Perspiciatis&nbsp;<br>minima nesciunt dolorem! Officiis iure rerum voluptates a cumque velit&nbsp;<br>quibusdam sed amet tempora. Sit laborum ab, eius fugit doloribus tenetur&nbsp;<br>fugiat, temporibus enim commodi iusto libero magni deleniti quod quam&nbsp;<br>consequuntur! Commodi minima excepturi repudiandae velit hic maxime<br>doloremque. Quaerat provident commodi consectetur veniam similique ad&nbsp;<br>earum omnis ipsum saepe, voluptas, hic voluptates pariatur est explicabo&nbsp;<br>fugiat, dolorum eligendi quam cupiditate excepturi mollitia maiores labore&nbsp;<br>suscipit quas? Nulla, placeat. Voluptatem quaerat non architecto ab laudantium<br>modi minima sunt esse temporibus sint culpa, recusandae aliquam numquam&nbsp;<br>totam ratione voluptas quod exercitationem fuga. Possimus quis earum veniam&nbsp;<br>quasi aliquam eligendi, placeat qui corporis!</p>', '<p>कंपनी अपने आप में एक बहुत ही सफल कंपनी है। सर्वाधिक लचीला<br>असुविधाएँ, भले ही वे फायदे हों, श्रम के सुख का परिणाम हैं<br>लेकिन वह इन लोगों की चापलूसी से भागने से नफरत करता है, बल्कि उपस्थित लोगों की मात्र उड़ान से<br>विकल्प, और वे चीज़ें! वे ऐसे आरोप लगाने वालों की व्यवस्था करते हैं, लेकिन किसी की नहीं। सच का<br>कुछ खुशी के साथ वास्तुकार को परेशान करने के अपने अधिकार से वह अंधा हो जाएगा<br>कुछ नहीं, ऐसा होगा कुछ सेवाओं की गलती है या! यह उसे खोजने से रोकता है, वह नफरत करता है,<br>यह ग़लत माना जाता है, कि वे नहीं जानते कि उन पर क्या बकाया है। आलोचना करना<br>क्योंकि फ्लाइट रिजेक्ट करने में कहां हुई गलती? वह उनकी परेशानियों की तारीफ करती हैं<br>लेकिन क्या उन्हें बुद्धिमानी से स्वीकार किया जाना चाहिए? लेकिन कुछ को<br>दूसरी गलती इन चीजों से अधिकतम लाभ लेने से इनकार करना है। आइए देखते हैं<br>छोटे बच्चे दर्द नहीं जानते! वह जिससे चाहे, वस्तुओं के नियम का सुख ले सकता है<br>लेकिन कुछ लोगों के लिए यह मज़ेदार समय है। उसके कष्टों से ही सही, वह अपने कष्टों से ही बंधा हुआ है<br>उसे भाग जाने दो, क्योंकि सुविधा के समय बड़ी सज्जनता से उसे मुक्त कर दिया गया<br>परिणाम! इनमें से सबसे कम फायदे को यहां खारिज किया जाना चाहिए<br>और दर्द वह क्षमा आदि के लाभ प्रदान करना चाहता है<br>मैं उन सभी को बहुत बार समझाऊंगा, आनंद, यहां आनंद पैदा होता है<br>उसे श्रम के साथ अधिक लचीलेपन को स्वीकार करने की इच्छा के बजाय दर्द चुनने के लिए भागने दें<br>उसमें क्या लगेगा? कृपया नहीं। उसे एक वास्तुकार के रूप में नहीं, बल्कि उन लोगों से खुशी की तलाश करनी चाहिए जो उसकी प्रशंसा करते हैं<br>कभी-कभी गलती करने से बचने के, कभी भी किसी को मना न करने के बहुत कम तरीके होते हैं<br>संपूर्ण कारण आनंद और उड़ान है। हम उनमें से किसी के पास आ सकते हैं<br>मानो किसी एक को चुनना हो, तो उसे शरीर को प्रसन्न करने दो!</p>', 'mens-winter-shirt-1769380823938654.jpeg', NULL, NULL, NULL, 1, 1, '2023-06-21 23:50:47', '2023-06-22 00:14:51'),
(22, 6, 6, 11, 14, 'Simple  Black Tshirt', 'साधारण काली टीशर्ट', 'simple--black-tshirt', 'साधारण-काली-टीशर्ट', 'bt-01', '300', 'lorem', 'lorem', 'Large, medium, Small', 'Large, medium, Small', 'Red, Black, White', 'Red, Black, White', '270', '250', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia', 'कंपनी अपने आप में एक बेहद सफल कंपनी है. सबसे बढ़कर, लचीलापन', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,<br>molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum<br>numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium<br>optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis<br>obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam<br>nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,<br>tenetur error, harum nesciunt ipsum debitis quas aliquid. Reprehenderit,<br>quia. Quo neque error repudiandae fuga? Ipsa laudantium molestias eos&nbsp;<br>sapiente officiis modi at sunt excepturi expedita sint? Sed quibusdam<br>recusandae alias error harum maxime adipisci amet laborum. Perspiciatis&nbsp;<br>minima nesciunt dolorem! Officiis iure rerum voluptates a cumque velit&nbsp;<br>quibusdam sed amet tempora. Sit laborum ab, eius fugit doloribus tenetur&nbsp;<br>fugiat, temporibus enim commodi iusto libero magni deleniti quod quam&nbsp;<br>consequuntur! Commodi minima excepturi repudiandae velit hic maxime<br>doloremque. Quaerat provident commodi consectetur veniam similique ad&nbsp;<br>earum omnis ipsum saepe, voluptas, hic voluptates pariatur est explicabo&nbsp;<br>fugiat, dolorum eligendi quam cupiditate excepturi mollitia maiores labore&nbsp;<br>suscipit quas? Nulla, placeat. Voluptatem quaerat non architecto ab laudantium<br>modi minima sunt esse temporibus sint culpa, recusandae aliquam numquam&nbsp;<br>totam ratione voluptas quod exercitationem fuga. Possimus quis earum veniam&nbsp;<br>quasi aliquam eligendi, placeat qui corporis!</p>', '<p>कंपनी अपने आप में एक बहुत ही सफल कंपनी है। सर्वाधिक लचीला<br>असुविधाएँ, भले ही वे फायदे हों, श्रम के सुख का परिणाम हैं<br>लेकिन वह इन लोगों की चापलूसी से भागने से नफरत करता है, बल्कि उपस्थित लोगों की मात्र उड़ान से<br>विकल्प, और वे चीज़ें! वे ऐसे आरोप लगाने वालों की व्यवस्था करते हैं, लेकिन किसी की नहीं। सच का<br>कुछ खुशी के साथ वास्तुकार को परेशान करने के अपने अधिकार से वह अंधा हो जाएगा<br>कुछ नहीं, ऐसा होगा कुछ सेवाओं की गलती है या! यह उसे खोजने से रोकता है, वह नफरत करता है,<br>यह ग़लत माना जाता है, कि वे नहीं जानते कि उन पर क्या बकाया है। आलोचना करना<br>क्योंकि फ्लाइट रिजेक्ट करने में कहां हुई गलती? वह उनकी परेशानियों की तारीफ करती हैं<br>लेकिन क्या उन्हें बुद्धिमानी से स्वीकार किया जाना चाहिए? लेकिन कुछ को<br>दूसरी गलती इन चीजों से अधिकतम लाभ लेने से इनकार करना है। आइए देखते हैं<br>छोटे बच्चे दर्द नहीं जानते! वह जिससे चाहे, वस्तुओं के नियम का सुख ले सकता है<br>लेकिन कुछ लोगों के लिए यह मज़ेदार समय है। उसके कष्टों से ही सही, वह अपने कष्टों से ही बंधा हुआ है<br>उसे भाग जाने दो, क्योंकि सुविधा के समय बड़ी सज्जनता से उसे मुक्त कर दिया गया<br>परिणाम! इनमें से सबसे कम फायदे को यहां खारिज किया जाना चाहिए<br>और दर्द वह क्षमा आदि के लाभ प्रदान करना चाहता है<br>मैं उन सभी को बहुत बार समझाऊंगा, आनंद, यहां आनंद पैदा होता है<br>उसे श्रम के साथ अधिक लचीलेपन को स्वीकार करने की इच्छा के बजाय दर्द चुनने के लिए भागने दें<br>उसमें क्या लगेगा? कृपया नहीं। उसे एक वास्तुकार के रूप में नहीं, बल्कि उन लोगों से खुशी की तलाश करनी चाहिए जो उसकी प्रशंसा करते हैं<br>कभी-कभी गलती करने से बचने के, कभी भी किसी को मना न करने के बहुत कम तरीके होते हैं<br>संपूर्ण कारण आनंद और उड़ान है। हम उनमें से किसी के पास आ सकते हैं<br>मानो किसी एक को चुनना हो, तो उसे शरीर को प्रसन्न करने दो!</p>', 'simple--black-tshirt-1769381172008756.jpeg', NULL, 1, NULL, NULL, 1, '2023-06-21 23:56:19', '2023-06-22 00:14:37'),
(23, 8, 7, 16, 28, 'Smart Monitor Black', 'स्मार्ट मॉनिटर ब्लैक', 'smart-monitor-black', 'स्मार्ट-मॉनिटर-ब्लैक', 'm-02', '300', 'jesum', 'jesum', 'Large, medium, Small', 'Large, medium, Small', 'Red, Black, White', 'Red, Black, White', '13000', '12700', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia', 'कंपनी अपने आप में एक बेहद सफल कंपनी है. सबसे बढ़कर, लचीलापन', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,<br>molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum<br>numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium<br>optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis<br>obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam<br>nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,<br>tenetur error, harum nesciunt ipsum debitis quas aliquid. Reprehenderit,<br>quia. Quo neque error repudiandae fuga? Ipsa laudantium molestias eos&nbsp;<br>sapiente officiis modi at sunt excepturi expedita sint? Sed quibusdam<br>recusandae alias error harum maxime adipisci amet laborum. Perspiciatis&nbsp;<br>minima nesciunt dolorem! Officiis iure rerum voluptates a cumque velit&nbsp;<br>quibusdam sed amet tempora. Sit laborum ab, eius fugit doloribus tenetur&nbsp;<br>fugiat, temporibus enim commodi iusto libero magni deleniti quod quam&nbsp;<br>consequuntur! Commodi minima excepturi repudiandae velit hic maxime<br>doloremque. Quaerat provident commodi consectetur veniam similique ad&nbsp;<br>earum omnis ipsum saepe, voluptas, hic voluptates pariatur est explicabo&nbsp;<br>fugiat, dolorum eligendi quam cupiditate excepturi mollitia maiores labore&nbsp;<br>suscipit quas? Nulla, placeat. Voluptatem quaerat non architecto ab laudantium<br>modi minima sunt esse temporibus sint culpa, recusandae aliquam numquam&nbsp;<br>totam ratione voluptas quod exercitationem fuga. Possimus quis earum veniam&nbsp;<br>quasi aliquam eligendi, placeat qui corporis!</p>', '<p>कंपनी अपने आप में एक बहुत ही सफल कंपनी है। सर्वाधिक लचीला<br>असुविधाएँ, भले ही वे फायदे हों, श्रम के सुख का परिणाम हैं<br>लेकिन वह इन लोगों की चापलूसी से भागने से नफरत करता है, बल्कि उपस्थित लोगों की मात्र उड़ान से<br>विकल्प, और वे चीज़ें! वे ऐसे आरोप लगाने वालों की व्यवस्था करते हैं, लेकिन किसी की नहीं। सच का<br>कुछ खुशी के साथ वास्तुकार को परेशान करने के अपने अधिकार से वह अंधा हो जाएगा<br>कुछ नहीं, ऐसा होगा कुछ सेवाओं की गलती है या! यह उसे खोजने से रोकता है, वह नफरत करता है,<br>यह ग़लत माना जाता है, कि वे नहीं जानते कि उन पर क्या बकाया है। आलोचना करना<br>क्योंकि फ्लाइट रिजेक्ट करने में कहां हुई गलती? वह उनकी परेशानियों की तारीफ करती हैं<br>लेकिन क्या उन्हें बुद्धिमानी से स्वीकार किया जाना चाहिए? लेकिन कुछ को<br>दूसरी गलती इन चीजों से अधिकतम लाभ लेने से इनकार करना है। आइए देखते हैं<br>छोटे बच्चे दर्द नहीं जानते! वह जिससे चाहे, वस्तुओं के नियम का सुख ले सकता है<br>लेकिन कुछ लोगों के लिए यह मज़ेदार समय है। उसके कष्टों से ही सही, वह अपने कष्टों से ही बंधा हुआ है<br>उसे भाग जाने दो, क्योंकि सुविधा के समय बड़ी सज्जनता से उसे मुक्त कर दिया गया<br>परिणाम! इनमें से सबसे कम फायदे को यहां खारिज किया जाना चाहिए<br>और दर्द वह क्षमा आदि के लाभ प्रदान करना चाहता है<br>मैं उन सभी को बहुत बार समझाऊंगा, आनंद, यहां आनंद पैदा होता है<br>उसे श्रम के साथ अधिक लचीलेपन को स्वीकार करने की इच्छा के बजाय दर्द चुनने के लिए भागने दें<br>उसमें क्या लगेगा? कृपया नहीं। उसे एक वास्तुकार के रूप में नहीं, बल्कि उन लोगों से खुशी की तलाश करनी चाहिए जो उसकी प्रशंसा करते हैं<br>कभी-कभी गलती करने से बचने के, कभी भी किसी को मना न करने के बहुत कम तरीके होते हैं<br>संपूर्ण कारण आनंद और उड़ान है। हम उनमें से किसी के पास आ सकते हैं<br>मानो किसी एक को चुनना हो, तो उसे शरीर को प्रसन्न करने दो!</p>', 'smart-monitor-black-1769381343619650.jpeg', NULL, 1, 1, NULL, 1, '2023-06-21 23:59:03', '2023-06-22 00:14:32'),
(24, 5, 7, 16, 28, 'Folding  Monitor', 'फोल्डिंग मॉनिटर', 'folding--monitor', 'फोल्डिंग-मॉनिटर', 'm-03', '150', 'ipsum', 'ipsum', 'Large, medium, Small', 'Large, medium, Small', 'Red, Black, White', 'Red, Black, White', '10000', NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia', 'कंपनी अपने आप में एक बेहद सफल कंपनी है. सबसे बढ़कर, लचीलापन', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,<br>molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum<br>numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium<br>optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis<br>obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam<br>nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,<br>tenetur error, harum nesciunt ipsum debitis quas aliquid. Reprehenderit,<br>quia. Quo neque error repudiandae fuga? Ipsa laudantium molestias eos&nbsp;<br>sapiente officiis modi at sunt excepturi expedita sint? Sed quibusdam<br>recusandae alias error harum maxime adipisci amet laborum. Perspiciatis&nbsp;<br>minima nesciunt dolorem! Officiis iure rerum voluptates a cumque velit&nbsp;<br>quibusdam sed amet tempora. Sit laborum ab, eius fugit doloribus tenetur&nbsp;<br>fugiat, temporibus enim commodi iusto libero magni deleniti quod quam&nbsp;<br>consequuntur! Commodi minima excepturi repudiandae velit hic maxime<br>doloremque. Quaerat provident commodi consectetur veniam similique ad&nbsp;<br>earum omnis ipsum saepe, voluptas, hic voluptates pariatur est explicabo&nbsp;<br>fugiat, dolorum eligendi quam cupiditate excepturi mollitia maiores labore&nbsp;<br>suscipit quas? Nulla, placeat. Voluptatem quaerat non architecto ab laudantium<br>modi minima sunt esse temporibus sint culpa, recusandae aliquam numquam&nbsp;<br>totam ratione voluptas quod exercitationem fuga. Possimus quis earum veniam&nbsp;<br>quasi aliquam eligendi, placeat qui corporis!</p>', '<p>कंपनी अपने आप में एक बहुत ही सफल कंपनी है। सर्वाधिक लचीला<br>असुविधाएँ, भले ही वे फायदे हों, श्रम के सुख का परिणाम हैं<br>लेकिन वह इन लोगों की चापलूसी से भागने से नफरत करता है, बल्कि उपस्थित लोगों की मात्र उड़ान से<br>विकल्प, और वे चीज़ें! वे ऐसे आरोप लगाने वालों की व्यवस्था करते हैं, लेकिन किसी की नहीं। सच का<br>कुछ खुशी के साथ वास्तुकार को परेशान करने के अपने अधिकार से वह अंधा हो जाएगा<br>कुछ नहीं, ऐसा होगा कुछ सेवाओं की गलती है या! यह उसे खोजने से रोकता है, वह नफरत करता है,<br>यह ग़लत माना जाता है, कि वे नहीं जानते कि उन पर क्या बकाया है। आलोचना करना<br>क्योंकि फ्लाइट रिजेक्ट करने में कहां हुई गलती? वह उनकी परेशानियों की तारीफ करती हैं<br>लेकिन क्या उन्हें बुद्धिमानी से स्वीकार किया जाना चाहिए? लेकिन कुछ को<br>दूसरी गलती इन चीजों से अधिकतम लाभ लेने से इनकार करना है। आइए देखते हैं<br>छोटे बच्चे दर्द नहीं जानते! वह जिससे चाहे, वस्तुओं के नियम का सुख ले सकता है<br>लेकिन कुछ लोगों के लिए यह मज़ेदार समय है। उसके कष्टों से ही सही, वह अपने कष्टों से ही बंधा हुआ है<br>उसे भाग जाने दो, क्योंकि सुविधा के समय बड़ी सज्जनता से उसे मुक्त कर दिया गया<br>परिणाम! इनमें से सबसे कम फायदे को यहां खारिज किया जाना चाहिए<br>और दर्द वह क्षमा आदि के लाभ प्रदान करना चाहता है<br>मैं उन सभी को बहुत बार समझाऊंगा, आनंद, यहां आनंद पैदा होता है<br>उसे श्रम के साथ अधिक लचीलेपन को स्वीकार करने की इच्छा के बजाय दर्द चुनने के लिए भागने दें<br>उसमें क्या लगेगा? कृपया नहीं। उसे एक वास्तुकार के रूप में नहीं, बल्कि उन लोगों से खुशी की तलाश करनी चाहिए जो उसकी प्रशंसा करते हैं<br>कभी-कभी गलती करने से बचने के, कभी भी किसी को मना न करने के बहुत कम तरीके होते हैं<br>संपूर्ण कारण आनंद और उड़ान है। हम उनमें से किसी के पास आ सकते हैं<br>मानो किसी एक को चुनना हो, तो उसे शरीर को प्रसन्न करने दो!</p>', 'folding--monitor-1769381558036642.jpeg', 1, 1, NULL, NULL, 1, '2023-06-23 03:28:46', '2023-06-23 03:28:46');
INSERT INTO `products` (`id`, `b_id`, `c_id`, `sc_id`, `ssc_id`, `p_name_eng`, `p_name_hin`, `p_slug_eng`, `p_slug_hin`, `p_code`, `p_qty`, `p_tags_eng`, `p_tags_hin`, `p_size_eng`, `p_size_hin`, `p_color_eng`, `p_color_hin`, `selling_price`, `discount_price`, `short_descp_eng`, `short_descp_hin`, `long_descp_eng`, `long_descp_hin`, `p_image`, `hot_deals`, `featured`, `special_offer`, `special_deals`, `status`, `created_at`, `updated_at`) VALUES
(25, 3, 8, 21, 42, 'Sweet home model', 'स्वीट होम मॉडल', 'sweet-home-model', 'स्वीट-होम-मॉडल', 'sp-01', '500', 'lorem', 'lorem', 'Large, medium', 'Large, medium, Small', 'Red, Black', 'Red, Black, White', '200', '190', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,<br>molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum<br>numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium<br>optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis<br>obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam<br>nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,<br>tenetur error, harum nesciunt ipsum debitis quas aliquid. Reprehenderit,<br>quia. Quo neque error repudiandae fuga? Ipsa laudantium molestias eos&nbsp;<br>sapiente officiis modi at sunt excepturi expedita sint? Sed quibusdam<br>recusandae alias error harum maxime adipisci amet laborum. Perspiciatis&nbsp;<br>minima nesciunt dolorem! Officiis iure rerum voluptates a cumque velit&nbsp;<br>quibusdam sed amet tempora. Sit laborum ab, eius fugit doloribus tenetur&nbsp;<br>fugiat, temporibus enim commodi iusto libero magni deleniti quod quam&nbsp;<br>consequuntur! Commodi minima excepturi repudiandae velit hic maxime<br>doloremque. Quaerat provident commodi consectetur veniam similique ad&nbsp;<br>earum omnis ipsum saepe, voluptas, hic voluptates pariatur est explicabo&nbsp;<br>fugiat, dolorum eligendi quam cupiditate excepturi mollitia maiores labore&nbsp;<br>suscipit quas? Nulla, placeat. Voluptatem quaerat non architecto ab laudantium<br>modi minima sunt esse temporibus sint culpa, recusandae aliquam numquam&nbsp;<br>totam ratione voluptas quod exercitationem fuga. Possimus quis earum veniam&nbsp;<br>quasi aliquam eligendi, placeat qui corporis!</p>', '<p>कंपनी अपने आप में एक बहुत ही सफल कंपनी है। सर्वाधिक लचीला<br>असुविधाएँ, भले ही वे फायदे हों, श्रम के सुख का परिणाम हैं<br>लेकिन वह इन लोगों की चापलूसी से भागने से नफरत करता है, बल्कि उपस्थित लोगों की मात्र उड़ान से<br>विकल्प, और वे चीज़ें! वे ऐसे आरोप लगाने वालों की व्यवस्था करते हैं, लेकिन किसी की नहीं। सच का<br>कुछ खुशी के साथ वास्तुकार को परेशान करने के अपने अधिकार से वह अंधा हो जाएगा<br>कुछ नहीं, ऐसा होगा कुछ सेवाओं की गलती है या! यह उसे खोजने से रोकता है, वह नफरत करता है,<br>यह ग़लत माना जाता है, कि वे नहीं जानते कि उन पर क्या बकाया है। आलोचना करना<br>क्योंकि फ्लाइट रिजेक्ट करने में कहां हुई गलती? वह उनकी परेशानियों की तारीफ करती हैं<br>लेकिन क्या उन्हें बुद्धिमानी से स्वीकार किया जाना चाहिए? लेकिन कुछ को<br>दूसरी गलती इन चीजों से अधिकतम लाभ लेने से इनकार करना है। आइए देखते हैं<br>छोटे बच्चे दर्द नहीं जानते! वह जिससे चाहे, वस्तुओं के नियम का सुख ले सकता है<br>लेकिन कुछ लोगों के लिए यह मज़ेदार समय है। उसके कष्टों से ही सही, वह अपने कष्टों से ही बंधा हुआ है<br>उसे भाग जाने दो, क्योंकि सुविधा के समय बड़ी सज्जनता से उसे मुक्त कर दिया गया<br>परिणाम! इनमें से सबसे कम फायदे को यहां खारिज किया जाना चाहिए<br>और दर्द वह क्षमा आदि के लाभ प्रदान करना चाहता है<br>मैं उन सभी को बहुत बार समझाऊंगा, आनंद, यहां आनंद पैदा होता है<br>उसे श्रम के साथ अधिक लचीलेपन को स्वीकार करने की इच्छा के बजाय दर्द चुनने के लिए भागने दें<br>उसमें क्या लगेगा? कृपया नहीं। उसे एक वास्तुकार के रूप में नहीं, बल्कि उन लोगों से खुशी की तलाश करनी चाहिए जो उसकी प्रशंसा करते हैं<br>कभी-कभी गलती करने से बचने के, कभी भी किसी को मना न करने के बहुत कम तरीके होते हैं<br>संपूर्ण कारण आनंद और उड़ान है। हम उनमें से किसी के पास आ सकते हैं<br>मानो किसी एक को चुनना हो, तो उसे शरीर को प्रसन्न करने दो!</p>', 'sweet-home-model-1769383113984935.jpg', NULL, NULL, 1, NULL, 1, '2023-07-04 01:09:37', '2023-07-04 01:09:37'),
(26, 7, 8, 19, 37, 'Fresh  vegetables', 'ताज़ी सब्जियां', 'fresh--vegetables', 'ताज़ी-सब्जियां', 'sp-02', '200', 'jesum', 'jesum', 'Large, medium, Small', 'Large, medium, Small', 'Red, Black, White', 'Red, Black, White', '250', '230', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,', 'कंपनी अपने आप में एक बेहद सफल कंपनी है. सबसे बढ़कर, लचीलापन', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,<br>molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum<br>numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium<br>optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis<br>obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam<br>nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,<br>tenetur error, harum nesciunt ipsum debitis quas aliquid. Reprehenderit,<br>quia. Quo neque error repudiandae fuga? Ipsa laudantium molestias eos&nbsp;<br>sapiente officiis modi at sunt excepturi expedita sint? Sed quibusdam<br>recusandae alias error harum maxime adipisci amet laborum. Perspiciatis&nbsp;<br>minima nesciunt dolorem! Officiis iure rerum voluptates a cumque velit&nbsp;<br>quibusdam sed amet tempora. Sit laborum ab, eius fugit doloribus tenetur&nbsp;<br>fugiat, temporibus enim commodi iusto libero magni deleniti quod quam&nbsp;<br>consequuntur! Commodi minima excepturi repudiandae velit hic maxime<br>doloremque. Quaerat provident commodi consectetur veniam similique ad&nbsp;<br>earum omnis ipsum saepe, voluptas, hic voluptates pariatur est explicabo&nbsp;<br>fugiat, dolorum eligendi quam cupiditate excepturi mollitia maiores labore&nbsp;<br>suscipit quas? Nulla, placeat. Voluptatem quaerat non architecto ab laudantium<br>modi minima sunt esse temporibus sint culpa, recusandae aliquam numquam&nbsp;<br>totam ratione voluptas quod exercitationem fuga. Possimus quis earum veniam&nbsp;<br>quasi aliquam eligendi, placeat qui corporis!</p>', '<p>कंपनी अपने आप में एक बहुत ही सफल कंपनी है। सर्वाधिक लचीला<br>असुविधाएँ, भले ही वे फायदे हों, श्रम के सुख का परिणाम हैं<br>लेकिन वह इन लोगों की चापलूसी से भागने से नफरत करता है, बल्कि उपस्थित लोगों की मात्र उड़ान से<br>विकल्प, और वे चीज़ें! वे ऐसे आरोप लगाने वालों की व्यवस्था करते हैं, लेकिन किसी की नहीं। सच का<br>कुछ खुशी के साथ वास्तुकार को परेशान करने के अपने अधिकार से वह अंधा हो जाएगा<br>कुछ नहीं, ऐसा होगा कुछ सेवाओं की गलती है या! यह उसे खोजने से रोकता है, वह नफरत करता है,<br>यह ग़लत माना जाता है, कि वे नहीं जानते कि उन पर क्या बकाया है। आलोचना करना<br>क्योंकि फ्लाइट रिजेक्ट करने में कहां हुई गलती? वह उनकी परेशानियों की तारीफ करती हैं<br>लेकिन क्या उन्हें बुद्धिमानी से स्वीकार किया जाना चाहिए? लेकिन कुछ को<br>दूसरी गलती इन चीजों से अधिकतम लाभ लेने से इनकार करना है। आइए देखते हैं<br>छोटे बच्चे दर्द नहीं जानते! वह जिससे चाहे, वस्तुओं के नियम का सुख ले सकता है<br>लेकिन कुछ लोगों के लिए यह मज़ेदार समय है। उसके कष्टों से ही सही, वह अपने कष्टों से ही बंधा हुआ है<br>उसे भाग जाने दो, क्योंकि सुविधा के समय बड़ी सज्जनता से उसे मुक्त कर दिया गया<br>परिणाम! इनमें से सबसे कम फायदे को यहां खारिज किया जाना चाहिए<br>और दर्द वह क्षमा आदि के लाभ प्रदान करना चाहता है<br>मैं उन सभी को बहुत बार समझाऊंगा, आनंद, यहां आनंद पैदा होता है<br>उसे श्रम के साथ अधिक लचीलेपन को स्वीकार करने की इच्छा के बजाय दर्द चुनने के लिए भागने दें<br>उसमें क्या लगेगा? कृपया नहीं। उसे एक वास्तुकार के रूप में नहीं, बल्कि उन लोगों से खुशी की तलाश करनी चाहिए जो उसकी प्रशंसा करते हैं<br>कभी-कभी गलती करने से बचने के, कभी भी किसी को मना न करने के बहुत कम तरीके होते हैं<br>संपूर्ण कारण आनंद और उड़ान है। हम उनमें से किसी के पास आ सकते हैं<br>मानो किसी एक को चुनना हो, तो उसे शरीर को प्रसन्न करने दो!</p>', 'fresh--vegetables-1769383243672810.jpg', NULL, NULL, 1, NULL, 1, '2023-06-22 00:29:15', '2023-06-22 01:15:16'),
(27, 7, 8, 20, 40, 'Fresh Cucamber', 'ताज़ा खीरा', 'fresh-cucamber', 'ताज़ा-खीरा', 'sp-03', '0', 'lorem', 'ipsum', NULL, NULL, 'Red, Black, White', 'Red, Black, White', '150', '140', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,<br>molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum<br>numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium<br>optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis<br>obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam<br>nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,<br>tenetur error, harum nesciunt ipsum debitis quas aliquid. Reprehenderit,<br>quia. Quo neque error repudiandae fuga? Ipsa laudantium molestias eos&nbsp;<br>sapiente officiis modi at sunt excepturi expedita sint? Sed quibusdam<br>recusandae alias error harum maxime adipisci amet laborum. Perspiciatis&nbsp;<br>minima nesciunt dolorem! Officiis iure rerum voluptates a cumque velit&nbsp;<br>quibusdam sed amet tempora. Sit laborum ab, eius fugit doloribus tenetur&nbsp;<br>fugiat, temporibus enim commodi iusto libero magni deleniti quod quam&nbsp;<br>consequuntur! Commodi minima excepturi repudiandae velit hic maxime<br>doloremque. Quaerat provident commodi consectetur veniam similique ad&nbsp;<br>earum omnis ipsum saepe, voluptas, hic voluptates pariatur est explicabo&nbsp;<br>fugiat, dolorum eligendi quam cupiditate excepturi mollitia maiores labore&nbsp;<br>suscipit quas? Nulla, placeat. Voluptatem quaerat non architecto ab laudantium<br>modi minima sunt esse temporibus sint culpa, recusandae aliquam numquam&nbsp;<br>totam ratione voluptas quod exercitationem fuga. Possimus quis earum veniam&nbsp;<br>quasi aliquam eligendi, placeat qui corporis!</p>', '<p>कंपनी अपने आप में एक बहुत ही सफल कंपनी है। सर्वाधिक लचीला<br>असुविधाएँ, भले ही वे फायदे हों, श्रम के सुख का परिणाम हैं<br>लेकिन वह इन लोगों की चापलूसी से भागने से नफरत करता है, बल्कि उपस्थित लोगों की मात्र उड़ान से<br>विकल्प, और वे चीज़ें! वे ऐसे आरोप लगाने वालों की व्यवस्था करते हैं, लेकिन किसी की नहीं। सच का<br>कुछ खुशी के साथ वास्तुकार को परेशान करने के अपने अधिकार से वह अंधा हो जाएगा<br>कुछ नहीं, ऐसा होगा कुछ सेवाओं की गलती है या! यह उसे खोजने से रोकता है, वह नफरत करता है,<br>यह ग़लत माना जाता है, कि वे नहीं जानते कि उन पर क्या बकाया है। आलोचना करना<br>क्योंकि फ्लाइट रिजेक्ट करने में कहां हुई गलती? वह उनकी परेशानियों की तारीफ करती हैं<br>लेकिन क्या उन्हें बुद्धिमानी से स्वीकार किया जाना चाहिए? लेकिन कुछ को<br>दूसरी गलती इन चीजों से अधिकतम लाभ लेने से इनकार करना है। आइए देखते हैं<br>छोटे बच्चे दर्द नहीं जानते! वह जिससे चाहे, वस्तुओं के नियम का सुख ले सकता है<br>लेकिन कुछ लोगों के लिए यह मज़ेदार समय है। उसके कष्टों से ही सही, वह अपने कष्टों से ही बंधा हुआ है<br>उसे भाग जाने दो, क्योंकि सुविधा के समय बड़ी सज्जनता से उसे मुक्त कर दिया गया<br>परिणाम! इनमें से सबसे कम फायदे को यहां खारिज किया जाना चाहिए<br>और दर्द वह क्षमा आदि के लाभ प्रदान करना चाहता है<br>मैं उन सभी को बहुत बार समझाऊंगा, आनंद, यहां आनंद पैदा होता है<br>उसे श्रम के साथ अधिक लचीलेपन को स्वीकार करने की इच्छा के बजाय दर्द चुनने के लिए भागने दें<br>उसमें क्या लगेगा? कृपया नहीं। उसे एक वास्तुकार के रूप में नहीं, बल्कि उन लोगों से खुशी की तलाश करनी चाहिए जो उसकी प्रशंसा करते हैं<br>कभी-कभी गलती करने से बचने के, कभी भी किसी को मना न करने के बहुत कम तरीके होते हैं<br>संपूर्ण कारण आनंद और उड़ान है। हम उनमें से किसी के पास आ सकते हैं<br>मानो किसी एक को चुनना हो, तो उसे शरीर को प्रसन्न करने दो!</p>', 'fresh-cucamber-1769383542375920.jpg', 1, NULL, NULL, NULL, 1, '2023-07-06 00:18:49', '2023-07-06 00:18:49'),
(28, 7, 7, 18, 33, 'Gaming  Mouse', 'गेमिंग माउस', 'gaming--mouse', 'गेमिंग-माउस', 'gm-01', '400', 'lorem', 'lorem', 'Large, medium, Small', 'Large, medium, Small', 'Red, Black, White', 'Red, Black, White', '400', '390', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,', 'कंपनी अपने आप में एक बेहद सफल कंपनी है. सबसे बढ़कर, लचीलापन', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,<br>molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum<br>numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium<br>optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis<br>obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam<br>nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,<br>tenetur error, harum nesciunt ipsum debitis quas aliquid. Reprehenderit,<br>quia. Quo neque error repudiandae fuga? Ipsa laudantium molestias eos&nbsp;<br>sapiente officiis modi at sunt excepturi expedita sint? Sed quibusdam<br>recusandae alias error harum maxime adipisci amet laborum. Perspiciatis&nbsp;<br>minima nesciunt dolorem! Officiis iure rerum voluptates a cumque velit&nbsp;<br>quibusdam sed amet tempora. Sit laborum ab, eius fugit doloribus tenetur&nbsp;<br>fugiat, temporibus enim commodi iusto libero magni deleniti quod quam&nbsp;<br>consequuntur! Commodi minima excepturi repudiandae velit hic maxime<br>doloremque. Quaerat provident commodi consectetur veniam similique ad&nbsp;<br>earum omnis ipsum saepe, voluptas, hic voluptates pariatur est explicabo&nbsp;<br>fugiat, dolorum eligendi quam cupiditate excepturi mollitia maiores labore&nbsp;<br>suscipit quas? Nulla, placeat. Voluptatem quaerat non architecto ab laudantium<br>modi minima sunt esse temporibus sint culpa, recusandae aliquam numquam&nbsp;<br>totam ratione voluptas quod exercitationem fuga. Possimus quis earum veniam&nbsp;<br>quasi aliquam eligendi, placeat qui corporis!</p>', '<p>कंपनी अपने आप में एक बहुत ही सफल कंपनी है। सर्वाधिक लचीला<br>असुविधाएँ, भले ही वे फायदे हों, श्रम के सुख का परिणाम हैं<br>लेकिन वह इन लोगों की चापलूसी से भागने से नफरत करता है, बल्कि उपस्थित लोगों की मात्र उड़ान से<br>विकल्प, और वे चीज़ें! वे ऐसे आरोप लगाने वालों की व्यवस्था करते हैं, लेकिन किसी की नहीं। सच का<br>कुछ खुशी के साथ वास्तुकार को परेशान करने के अपने अधिकार से वह अंधा हो जाएगा<br>कुछ नहीं, ऐसा होगा कुछ सेवाओं की गलती है या! यह उसे खोजने से रोकता है, वह नफरत करता है,<br>यह ग़लत माना जाता है, कि वे नहीं जानते कि उन पर क्या बकाया है। आलोचना करना<br>क्योंकि फ्लाइट रिजेक्ट करने में कहां हुई गलती? वह उनकी परेशानियों की तारीफ करती हैं<br>लेकिन क्या उन्हें बुद्धिमानी से स्वीकार किया जाना चाहिए? लेकिन कुछ को<br>दूसरी गलती इन चीजों से अधिकतम लाभ लेने से इनकार करना है। आइए देखते हैं<br>छोटे बच्चे दर्द नहीं जानते! वह जिससे चाहे, वस्तुओं के नियम का सुख ले सकता है<br>लेकिन कुछ लोगों के लिए यह मज़ेदार समय है। उसके कष्टों से ही सही, वह अपने कष्टों से ही बंधा हुआ है<br>उसे भाग जाने दो, क्योंकि सुविधा के समय बड़ी सज्जनता से उसे मुक्त कर दिया गया<br>परिणाम! इनमें से सबसे कम फायदे को यहां खारिज किया जाना चाहिए<br>और दर्द वह क्षमा आदि के लाभ प्रदान करना चाहता है<br>मैं उन सभी को बहुत बार समझाऊंगा, आनंद, यहां आनंद पैदा होता है<br>उसे श्रम के साथ अधिक लचीलेपन को स्वीकार करने की इच्छा के बजाय दर्द चुनने के लिए भागने दें<br>उसमें क्या लगेगा? कृपया नहीं। उसे एक वास्तुकार के रूप में नहीं, बल्कि उन लोगों से खुशी की तलाश करनी चाहिए जो उसकी प्रशंसा करते हैं<br>कभी-कभी गलती करने से बचने के, कभी भी किसी को मना न करने के बहुत कम तरीके होते हैं<br>संपूर्ण कारण आनंद और उड़ान है। हम उनमें से किसी के पास आ सकते हैं<br>मानो किसी एक को चुनना हो, तो उसे शरीर को प्रसन्न करने दो!</p>', 'gaming--mouse-1769383892474025.jpg', NULL, NULL, 1, NULL, 1, '2023-06-22 00:39:34', '2023-06-22 01:15:05'),
(29, 7, 7, 18, 35, 'Gaming Mouse Black', 'गेमिंग माउस काला', 'gaming-mouse-black', 'गेमिंग-माउस-काला', 'gm-02', '300', 'jesum', 'jesum', 'Large, medium, Small', 'Large, medium, Small', 'Red, Black, White', 'Red, Black, White', '270', NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,', 'कंपनी अपने आप में एक बेहद सफल कंपनी है. सबसे बढ़कर, लचीलापन', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,<br>molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum<br>numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium<br>optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis<br>obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam<br>nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,<br>tenetur error, harum nesciunt ipsum debitis quas aliquid. Reprehenderit,<br>quia. Quo neque error repudiandae fuga? Ipsa laudantium molestias eos&nbsp;<br>sapiente officiis modi at sunt excepturi expedita sint? Sed quibusdam<br>recusandae alias error harum maxime adipisci amet laborum. Perspiciatis&nbsp;<br>minima nesciunt dolorem! Officiis iure rerum voluptates a cumque velit&nbsp;<br>quibusdam sed amet tempora. Sit laborum ab, eius fugit doloribus tenetur&nbsp;<br>fugiat, temporibus enim commodi iusto libero magni deleniti quod quam&nbsp;<br>consequuntur! Commodi minima excepturi repudiandae velit hic maxime<br>doloremque. Quaerat provident commodi consectetur veniam similique ad&nbsp;<br>earum omnis ipsum saepe, voluptas, hic voluptates pariatur est explicabo&nbsp;<br>fugiat, dolorum eligendi quam cupiditate excepturi mollitia maiores labore&nbsp;<br>suscipit quas? Nulla, placeat. Voluptatem quaerat non architecto ab laudantium<br>modi minima sunt esse temporibus sint culpa, recusandae aliquam numquam&nbsp;<br>totam ratione voluptas quod exercitationem fuga. Possimus quis earum veniam&nbsp;<br>quasi aliquam eligendi, placeat qui corporis!</p>', '<p>कंपनी अपने आप में एक बहुत ही सफल कंपनी है। सर्वाधिक लचीला<br>असुविधाएँ, भले ही वे फायदे हों, श्रम के सुख का परिणाम हैं<br>लेकिन वह इन लोगों की चापलूसी से भागने से नफरत करता है, बल्कि उपस्थित लोगों की मात्र उड़ान से<br>विकल्प, और वे चीज़ें! वे ऐसे आरोप लगाने वालों की व्यवस्था करते हैं, लेकिन किसी की नहीं। सच का<br>कुछ खुशी के साथ वास्तुकार को परेशान करने के अपने अधिकार से वह अंधा हो जाएगा<br>कुछ नहीं, ऐसा होगा कुछ सेवाओं की गलती है या! यह उसे खोजने से रोकता है, वह नफरत करता है,<br>यह ग़लत माना जाता है, कि वे नहीं जानते कि उन पर क्या बकाया है। आलोचना करना<br>क्योंकि फ्लाइट रिजेक्ट करने में कहां हुई गलती? वह उनकी परेशानियों की तारीफ करती हैं<br>लेकिन क्या उन्हें बुद्धिमानी से स्वीकार किया जाना चाहिए? लेकिन कुछ को<br>दूसरी गलती इन चीजों से अधिकतम लाभ लेने से इनकार करना है। आइए देखते हैं<br>छोटे बच्चे दर्द नहीं जानते! वह जिससे चाहे, वस्तुओं के नियम का सुख ले सकता है<br>लेकिन कुछ लोगों के लिए यह मज़ेदार समय है। उसके कष्टों से ही सही, वह अपने कष्टों से ही बंधा हुआ है<br>उसे भाग जाने दो, क्योंकि सुविधा के समय बड़ी सज्जनता से उसे मुक्त कर दिया गया<br>परिणाम! इनमें से सबसे कम फायदे को यहां खारिज किया जाना चाहिए<br>और दर्द वह क्षमा आदि के लाभ प्रदान करना चाहता है<br>मैं उन सभी को बहुत बार समझाऊंगा, आनंद, यहां आनंद पैदा होता है<br>उसे श्रम के साथ अधिक लचीलेपन को स्वीकार करने की इच्छा के बजाय दर्द चुनने के लिए भागने दें<br>उसमें क्या लगेगा? कृपया नहीं। उसे एक वास्तुकार के रूप में नहीं, बल्कि उन लोगों से खुशी की तलाश करनी चाहिए जो उसकी प्रशंसा करते हैं<br>कभी-कभी गलती करने से बचने के, कभी भी किसी को मना न करने के बहुत कम तरीके होते हैं<br>संपूर्ण कारण आनंद और उड़ान है। हम उनमें से किसी के पास आ सकते हैं<br>मानो किसी एक को चुनना हो, तो उसे शरीर को प्रसन्न करने दो!</p>', 'gaming-mouse-black-1769384210570690.jpg', NULL, 1, 1, NULL, 1, '2023-06-23 03:06:58', '2023-06-23 03:06:58');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `s_image` varchar(255) NOT NULL,
  `s_title` varchar(255) DEFAULT NULL,
  `s_descrp` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `s_image`, `s_title`, `s_descrp`, `status`, `created_at`, `updated_at`) VALUES
(2, '1769137837308016.jpg', 'NEW COLLECTIONS', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 1, NULL, '2023-06-21 22:52:28'),
(3, '1769137816237959.jpg', 'WOMEN  FASHIONS', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. 007', 1, NULL, '2023-06-21 02:07:34'),
(5, '1769375734780780.jpg', 'COMPUTER ACCESSORIES', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `c_id` int(11) NOT NULL,
  `sc_name_eng` varchar(255) NOT NULL,
  `sc_name_hin` varchar(255) NOT NULL,
  `sc_slug_eng` varchar(255) NOT NULL,
  `sc_slug_hin` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `c_id`, `sc_name_eng`, `sc_name_hin`, `sc_slug_eng`, `sc_slug_hin`, `created_at`, `updated_at`) VALUES
(11, 6, 'Mans Top Ware', 'मैंस टॉप वेयर', 'mans-top-ware', 'मैंस-टॉप-वेयर', '2023-06-14 22:46:12', NULL),
(12, 6, 'Mans Bottom Ware', 'मैन्स बॉटम वेयर', 'mans-bottom-ware', 'मैन्स-बॉटम-वेयर', '2023-06-14 22:49:36', NULL),
(13, 6, 'Mans Footwear', 'पुरुषों के जूते', 'mans-footwear', 'पुरुषों-के-जूते', '2023-06-14 22:50:04', NULL),
(14, 6, 'Women Footwear', 'महिलाओं के जूते', 'women-footwear', 'महिलाओं-के-जूते', '2023-06-14 22:50:39', NULL),
(16, 7, 'Computer Peripherals', 'कंप्यूटर सहायक उपकरण', 'computer-peripherals', 'कंप्यूटर-सहायक-उपकरण', '2023-06-14 23:30:41', NULL),
(17, 7, 'Mobile Accessory', 'मोबाइल सहायक', 'mobile-accessory', 'मोबाइल-सहायक', '2023-06-14 23:31:05', NULL),
(18, 7, 'Gaming', 'जुआ', 'gaming', 'जुआ', '2023-06-14 23:31:34', NULL),
(19, 8, 'Home Furnishings', 'घर सजाने का सामान', 'home-furnishings', 'घर-सजाने-का-सामान', '2023-06-14 23:54:30', NULL),
(20, 8, 'Living Room', 'लिविंग रूम', 'living-room', 'लिविंग-रूम', '2023-06-14 23:55:41', NULL),
(21, 8, 'Home Decor', 'घर की सजावट', 'home-decor', 'घर-की-सजावट', '2023-06-14 23:56:45', NULL),
(22, 9, 'Televisions', 'टेलीविजन', 'televisions', 'टेलीविजन', '2023-06-15 00:06:08', NULL),
(23, 9, 'Washing Machines', 'वाशिंग मशीन', 'washing-machines', 'वाशिंग-मशीन', '2023-06-15 00:07:00', NULL),
(24, 9, 'Refrigerators', 'रेफ्रिजरेटर', 'refrigerators', 'रेफ्रिजरेटर', '2023-06-15 00:09:49', NULL),
(25, 10, 'Beauty and Personal Care', 'सौंदर्य और व्यक्तिगत देखभाल', 'beauty-and-personal-care', 'सौंदर्य-और-व्यक्तिगत-देखभाल', '2023-06-15 00:31:26', NULL),
(26, 10, 'Bady Care', 'खराब देखभाल', 'bady-care', 'खराब-देखभाल', '2023-06-15 00:32:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subsubcategories`
--

CREATE TABLE `subsubcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `c_id` int(11) NOT NULL,
  `sc_id` int(11) NOT NULL,
  `ssc_name_eng` varchar(255) NOT NULL,
  `ssc_name_hin` varchar(255) NOT NULL,
  `ssc_slug_eng` varchar(255) NOT NULL,
  `ssc_slug_hin` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subsubcategories`
--

INSERT INTO `subsubcategories` (`id`, `c_id`, `sc_id`, `ssc_name_eng`, `ssc_name_hin`, `ssc_slug_eng`, `ssc_slug_hin`, `created_at`, `updated_at`) VALUES
(14, 6, 11, 'Mans Tshirt', 'पुरुषों की टी शर्ट', 'mans-tshirt', 'पुरुषों-की-टी-शर्ट', '2023-06-14 22:46:39', NULL),
(15, 6, 11, 'Mans Casual Shirts', 'मैन्स कैजुअल शर्ट्स', 'mans-casual-shirts', 'मैन्स-कैजुअल-शर्ट्स', '2023-06-14 22:47:14', NULL),
(16, 6, 11, 'Mans Kurtas', 'मानस कुर्ते', 'mans-kurtas', 'मानस-कुर्ते', '2023-06-14 22:47:47', NULL),
(17, 6, 12, 'Mans Jeans', 'पुरुषों की जींस', 'mans-jeans', 'पुरुषों-की-जींस', '2023-06-14 22:54:15', NULL),
(18, 6, 12, 'Mans Trousers', 'पुरुषों की पतलून', 'mans-trousers', 'पुरुषों-की-पतलून', '2023-06-14 22:55:08', NULL),
(19, 6, 12, 'Mans Cargos', 'मेन्स कार्गो', 'mans-cargos', 'मेन्स-कार्गो', '2023-06-14 22:55:32', NULL),
(20, 6, 13, 'Mans Sports Shoes', 'पुरुषों के खेल के जूते', 'mans-sports-shoes', 'पुरुषों-के-खेल-के-जूते', '2023-06-14 22:56:21', NULL),
(21, 6, 13, 'Mans Casual Shoes', 'मैन्स कैजुअल शूज', 'mans-casual-shoes', 'मैन्स-कैजुअल-शूज', '2023-06-14 22:57:26', NULL),
(22, 6, 13, 'Mans Formal Shoes', 'मैंस औपचारिक जूते', 'mans-formal-shoes', 'मैंस-औपचारिक-जूते', '2023-06-14 22:58:07', NULL),
(24, 6, 14, 'Women Flats', 'महिला फ्लैट', 'women-flats', 'महिला-फ्लैट', '2023-06-14 23:19:29', NULL),
(25, 6, 14, 'Women Heels', 'महिला ऊँची एड़ी के जूते', 'women-heels', 'महिला-ऊँची-एड़ी-के-जूते', '2023-06-14 23:20:53', NULL),
(26, 6, 14, 'Woman Sheakers', 'महिला शेकर', 'woman-sheakers', 'महिला-शेकर', '2023-06-14 23:21:55', NULL),
(27, 7, 16, 'Printers', 'प्रिंटर', 'printers', 'प्रिंटर', '2023-06-14 23:35:46', NULL),
(28, 7, 16, 'Monitors', 'पर नज़र रखता है', 'monitors', 'पर-नज़र-रखता-है', '2023-06-14 23:36:37', NULL),
(29, 7, 16, 'Projectors', 'प्रोजेक्टर', 'projectors', 'प्रोजेक्टर', '2023-06-14 23:37:05', NULL),
(30, 7, 17, 'Plain Cases', 'सादा मामले', 'plain-cases', 'सादा-मामले', '2023-06-14 23:37:34', NULL),
(31, 7, 17, 'Designer Cases', 'डिजाइनर मामले', 'designer-cases', 'डिजाइनर-मामले', '2023-06-14 23:38:09', NULL),
(32, 7, 17, 'Screen Guards', 'स्क्रीन गार्ड', 'screen-guards', 'स्क्रीन-गार्ड', '2023-06-14 23:38:49', NULL),
(33, 7, 18, 'Gaming Mouse', 'गेमिंग माउस', 'gaming-mouse', 'गेमिंग-माउस', '2023-06-14 23:40:28', NULL),
(34, 7, 18, 'Gaming Keyboards', 'गेमिंग कीबोर्ड', 'gaming-keyboards', 'गेमिंग-कीबोर्ड', '2023-06-14 23:41:04', NULL),
(35, 7, 18, 'Gaming Mousepads', 'गेमिंग माउसपैड', 'gaming-mousepads', 'गेमिंग-माउसपैड', '2023-06-14 23:41:39', NULL),
(36, 8, 19, 'Bed Liners', 'बेड लाइनर्स', 'bed-liners', 'बेड-लाइनर्स', '2023-06-14 23:57:48', NULL),
(37, 8, 19, 'Bedsheets', 'चादरें', 'bedsheets', 'चादरें', '2023-06-14 23:58:21', NULL),
(38, 8, 19, 'Blankets', 'कंबल', 'blankets', 'कंबल', '2023-06-14 23:58:51', NULL),
(39, 8, 20, 'Tv Units', 'टीवी इकाइयां', 'tv-units', 'टीवी-इकाइयां', '2023-06-15 00:00:01', NULL),
(40, 8, 20, 'Dining Sets', 'डाइनिंग सेट', 'dining-sets', 'डाइनिंग-सेट', '2023-06-15 00:00:55', NULL),
(41, 8, 20, 'Coffee Tables', 'कॉफी टेबल्स', 'coffee-tables', 'कॉफी-टेबल्स', '2023-06-15 00:01:34', NULL),
(42, 8, 21, 'Lightings', 'रोशनी', 'lightings', 'रोशनी', '2023-06-15 00:02:32', NULL),
(43, 8, 21, 'Clocks', 'घड़ियाँ', 'clocks', 'घड़ियाँ', '2023-06-15 00:03:06', NULL),
(44, 8, 21, 'Wall Decor', 'दीवार की सजावट', 'wall-decor', 'दीवार-की-सजावट', '2023-06-15 00:03:41', NULL),
(45, 9, 22, 'Big Screen TVs', 'बिग स्क्रीन टीवी', 'big-screen-tvs', 'बिग-स्क्रीन-टीवी', '2023-06-15 00:13:07', NULL),
(46, 9, 22, 'Smart TVs', 'स्मार्ट टीवी', 'smart-tvs', 'स्मार्ट-टीवी', '2023-06-15 00:13:34', NULL),
(47, 9, 22, 'OLED TVs', 'ओएलईडी टीवी', 'oled-tvs', 'ओएलईडी-टीवी', '2023-06-15 00:14:09', NULL),
(48, 9, 23, 'Washer Dryers', 'वॉशर ड्रायर', 'washer-dryers', 'वॉशर-ड्रायर', '2023-06-15 00:15:29', '2023-06-15 00:15:29'),
(49, 9, 23, 'Washer Only', 'केवल वॉशर', 'washer-only', 'केवल-वॉशर', '2023-06-15 00:16:18', NULL),
(50, 9, 23, 'Energy Efficient', 'मिनी रिगरेटर्स', 'energy-efficient', 'मिनी-रिगरेटर्स', '2023-06-15 00:16:51', NULL),
(51, 9, 24, 'Single Door', 'सिंगल डोर', 'single-door', 'सिंगल-डोर', '2023-06-15 00:18:14', NULL),
(52, 9, 24, 'Double Door', 'डबल डोर', 'double-door', 'डबल-डोर', '2023-06-15 00:18:42', NULL),
(53, 9, 24, 'Mini Rerigerators', 'मिनी रिगरेटर्स', 'mini-rerigerators', 'मिनी-रिगरेटर्स', '2023-06-15 00:21:22', NULL),
(54, 10, 25, 'Eys Makeup', 'ईज़ मेकअप', 'eys-makeup', 'ईज़-मेकअप', '2023-06-15 00:33:39', NULL),
(55, 10, 25, 'Lip Makeup', 'लिप मेकअप', 'lip-makeup', 'लिप-मेकअप', '2023-06-15 00:34:05', NULL),
(56, 10, 25, 'Hair Care', 'बालों की देखभाल', 'hair-care', 'बालों-की-देखभाल', '2023-06-15 00:34:34', NULL),
(57, 10, 26, 'Baby Diapers', 'बेबी डायपर', 'baby-diapers', 'बेबी-डायपर', '2023-06-15 00:35:15', NULL),
(58, 10, 26, 'Baby Wipes', 'बेबी वाइप्स', 'baby-wipes', 'बेबी-वाइप्स', '2023-06-15 00:36:42', '2023-06-15 00:36:42'),
(59, 10, 26, 'Baby Food', 'बेबी फूड', 'baby-food', 'बेबी-फूड', '2023-06-15 00:37:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `email_verified_at`, `image`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dayal Saha', 'sahadayal007@gmail.com', '01920761093', NULL, '1767752174071291.jpg', '$2y$10$XGAPezqdarHilsVLLFoH7.BykU40gYGU2GdpvU9qRIYou147t76oa', 0, '2023-05-30 23:38:33', '2023-06-10 22:47:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `multiimages`
--
ALTER TABLE `multiimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subsubcategories`
--
ALTER TABLE `subsubcategories`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `multiimages`
--
ALTER TABLE `multiimages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `subsubcategories`
--
ALTER TABLE `subsubcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
