-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2020 at 12:11 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `homegallery`
--

CREATE TABLE `homegallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gallery_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_sub_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_sub_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gallery_sub_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_slag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `homegallery`
--

INSERT INTO `homegallery` (`id`, `image_title`, `image_name`, `image_description`, `image_url`, `gallery_image`, `image_sub_name`, `image_sub_url`, `gallery_sub_img`, `image_slag`, `created_at`, `updated_at`) VALUES
(3, 'hgfc', 'sadf', 'sadf', 'sfd', '4_1577166035.png', 'asdf', 'sadf', 'img_1577166035.jpg', 'asdf', '2019-12-22 23:08:32', '2019-12-23 18:40:35'),
(4, 'asdf', 'asdf', 'asdf', 'asdf', '1_1577166201.png', '/lk', ';kmkopm', '4_1577166201.png', 'kljhbo', '2019-12-22 23:09:07', '2019-12-23 18:43:21'),
(5, 'asdfasdf', 'asfasd', 'asdf', 'asdf', '1_1577162511.png', 'asdf', 'asdf', '3_1577162511.png', 'asdf', '2019-12-23 17:41:51', '2019-12-23 17:41:51'),
(6, 'asdf', 'asdf', 'asdf', 'adsf', '4_1577166671.png', 'aSD', 'asd', '2_1577166671.png', 'asdASD', '2019-12-23 17:42:35', '2019-12-23 18:51:11'),
(7, 'SADF', 'ASDF', 'ASDF', 'ASDF', '1_1577167013.png', 'SADF', 'ASDF', 'noimage.jpg', 'ASDF', '2019-12-23 18:08:07', '2019-12-23 18:56:53'),
(8, 'ASDF', 'ASDF', 'ASDF', 'SDAF', '4_1577166784.png', 'ASDF', 'ASDF', '3_1577166784.png', 'SADF', '2019-12-23 18:20:23', '2019-12-23 18:53:04'),
(9, 'asdf', 'asdf', 'asdf', 'sdf', '2_1577166962.png', 'asdf', 'asdf', '3_1577166962.png', 'asdf', '2019-12-23 18:25:02', '2019-12-23 18:56:02'),
(10, 'asdf', 'sadf', 'asdf', 'asdf', '4_1577166997.png', 'asdf', 'asdf', '2_1577166997.png', 'asdf', '2019-12-23 18:25:58', '2019-12-23 18:56:37'),
(11, 'asdf', 'asdf', 'asdf', 'asdf', '4_1577166978.png', 'asdf', 'asdf', 'noimage.jpg', 'asdf', '2019-12-23 18:30:20', '2019-12-23 18:56:18');

-- --------------------------------------------------------

--
-- Table structure for table `homeslider`
--

CREATE TABLE `homeslider` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slider_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slider_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slider_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slider_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slider_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `homeslider`
--

INSERT INTO `homeslider` (`id`, `slider_title`, `slider_name`, `slider_description`, `slider_url`, `slider_img`, `slider_slug`, `created_at`, `updated_at`) VALUES
(1, 'Stars Nellore', 'Stars Nellore', 'Stars Nellore\n/nProfessional Care', 'Stars Nellore', 'banner_1577174044.png', 'Stars Nellore', '2019-12-23 20:54:04', '2019-12-23 20:54:04'),
(2, 'Stars Nellore', 'Stars Nellore', 'Stars Nellore\n/nProfessional Care', 'Stars Nellore', 'banner_1577174047.png', 'Stars Nellore', '2019-12-23 20:54:07', '2019-12-23 20:54:07'),
(3, 'Stars Nellore', 'Stars Nellore', 'Stars Nellore\n/nProfessional Care', 'Stars Nellore', 'banner_1577174048.png', 'Stars Nellore', '2019-12-23 20:54:09', '2019-12-23 20:54:09'),
(4, 'Stars Nellore', 'Stars Nellore', 'Stars Nellore\n/nProfessional Care', 'Stars Nellore', 'banner_1577174050.png', 'Stars Nellore', '2019-12-23 20:54:10', '2019-12-23 20:54:10'),
(5, 'Stars Nellore', 'Stars Nellore', 'Stars Nellore\n/nProfessional Care', 'Stars Nellore', 'banner_1577174052.png', 'Stars Nellore', '2019-12-23 20:54:12', '2019-12-23 20:54:12'),
(6, 'Stars Nellore', 'Stars Nellore', 'Stars Nellore\n/nProfessional Care', 'Stars Nellore', 'banner_1577174054.png', 'Stars Nellore', '2019-12-23 20:54:14', '2019-12-23 20:54:14');

-- --------------------------------------------------------

--
-- Table structure for table `home_sliders`
--

CREATE TABLE `home_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slider_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slider_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slider_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slider_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slider_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `home_sliders`
--

INSERT INTO `home_sliders` (`id`, `slider_title`, `slider_name`, `slider_description`, `slider_url`, `slider_img`, `slider_slug`, `created_at`, `updated_at`) VALUES
(1, 'Stars Nellore', 'Stars Nellore', 'Stars Nellore\n/nProfessional Care', 'Stars Nellore', 'banner_1577174044.png', 'Stars Nellore', '2019-12-23 20:54:04', '2019-12-23 20:54:04'),
(2, 'Stars Nellore', 'Stars Nellore', 'Stars Nellore\n/nProfessional Care', 'Stars Nellore', 'banner_1577174047.png', 'Stars Nellore', '2019-12-23 20:54:07', '2019-12-23 20:54:07'),
(3, 'Stars Nellore', 'Stars Nellore', 'Stars Nellore\n/nProfessional Care', 'Stars Nellore', 'banner_1577174048.png', 'Stars Nellore', '2019-12-23 20:54:09', '2019-12-23 20:54:09'),
(4, 'Stars Nellore', 'Stars Nellore', 'Stars Nellore\n/nProfessional Care', 'Stars Nellore', 'banner_1577174050.png', 'Stars Nellore', '2019-12-23 20:54:10', '2019-12-23 20:54:10'),
(5, 'Stars Nellore', 'Stars Nellore', 'Stars Nellore\n/nProfessional Care', 'Stars Nellore', 'banner_1577174052.png', 'Stars Nellore', '2019-12-23 20:54:12', '2019-12-23 20:54:12'),
(6, 'Stars Nellore', 'Stars Nellore', 'Stars Nellore\n/nProfessional Care', 'Stars Nellore', 'banner_1577174054.png', 'Stars Nellore', '2019-12-23 20:54:14', '2019-12-23 20:54:14');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu_name`, `url`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'Home', '2019-12-15 23:49:03', '2019-12-15 23:49:03'),
(2, 'About', 'About', '2019-12-15 23:49:12', '2019-12-15 23:49:12'),
(3, 'Services', 'Services', '2019-12-15 23:49:33', '2019-12-15 23:49:33'),
(4, 'Gallery', 'Gallery', '2019-12-15 23:50:11', '2019-12-15 23:50:11'),
(5, 'Blog', 'Blog', '2019-12-15 23:50:19', '2019-12-15 23:50:19'),
(6, 'Contact', 'Contact', '2019-12-15 23:50:37', '2019-12-15 23:50:37'),
(7, 'Staff', 'Staff', '2019-12-15 23:51:13', '2019-12-15 23:51:13'),
(8, 'Reviews', 'Reviews', '2019-12-15 23:51:28', '2019-12-15 23:51:28');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(29, '2014_10_12_000000_create_users_table', 1),
(30, '2014_10_12_100000_create_password_resets_table', 1),
(31, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(32, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(33, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(34, '2016_06_01_000004_create_oauth_clients_table', 1),
(35, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(36, '2019_11_29_054620_create_products_table', 1),
(37, '2019_12_04_065706_myaccount', 2),
(38, '2019_12_05_061446_create_var_table', 3),
(39, '2019_12_16_073202_create_homegallery_table', 4),
(40, '2019_12_16_085546_create_menus_table', 4),
(41, '2019_12_16_085613_create_sub_menus_table', 4),
(42, '2019_12_24_064259_create_homeslider', 4),
(50, '2020_01_02_092921_crate_modules', 5),
(51, '2020_12_27_111441_services', 5),
(52, '2020_12_27_123150_crate_service_menus', 5),
(53, '2020_12_30_073841_crate_service_submenus', 5);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `modules_id` int(11) NOT NULL,
  `modules_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `modules_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `modules_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `modules_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `modules_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `modules_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `modules_id`, `modules_title`, `modules_name`, `modules_description`, `modules_url`, `modules_img`, `modules_slug`, `created_at`, `updated_at`) VALUES
(1, 0, 'service', 'service', 'service', 'serviece', 'noimage.jpg', 'service', '2020-01-09 04:24:11', '2020-01-09 04:24:11');

-- --------------------------------------------------------

--
-- Table structure for table `myaccount`
--

CREATE TABLE `myaccount` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_id` bigint(20) UNSIGNED NOT NULL,
  `module_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `service_id` int(11) NOT NULL,
  `service_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `service_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `service_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `service_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `service_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `service_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `module_id`, `module_name`, `service_id`, `service_title`, `service_name`, `service_description`, `service_url`, `service_img`, `service_slug`, `created_at`, `updated_at`) VALUES
(1, 1, 'service', 0, 'hair', 'hair', 'hair', 'hait', 'noimage.jpg', 'hit', '2020-01-09 04:30:41', '2020-01-09 04:30:41');

-- --------------------------------------------------------

--
-- Table structure for table `service_menus`
--

CREATE TABLE `service_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `service_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `service_menus`
--

INSERT INTO `service_menus` (`id`, `service_id`, `service_name`, `menu_id`, `menu_title`, `menu_name`, `menu_description`, `menu_url`, `menu_img`, `menu_slug`, `created_at`, `updated_at`) VALUES
(1, 1, 'hair', '', 'hah', 'hai', 'h', 'h', 'noimage.jpg', 'h', '2020-01-09 04:31:02', '2020-01-09 04:31:02');

-- --------------------------------------------------------

--
-- Table structure for table `service_submenus`
--

CREATE TABLE `service_submenus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `menu_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `submenu_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `submenu_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `submenu_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `submenu_price` int(11) NOT NULL,
  `submenu_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `submenu_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `submenu_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `submenu_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `service_submenus`
--

INSERT INTO `service_submenus` (`id`, `menu_id`, `menu_name`, `submenu_id`, `submenu_title`, `submenu_name`, `submenu_price`, `submenu_description`, `submenu_url`, `submenu_img`, `submenu_slug`, `created_at`, `updated_at`) VALUES
(1, 1, 'hai', '', 'h', 'h', 120, 'h', 'g', '', 'g', '2020-01-09 04:31:53', '2020-01-09 04:32:06'),
(2, 1, 'hai', '', 'h', 'h', 0, 'h', 'h', 'noimage.jpg', 'h', '2020-01-09 04:32:20', '2020-01-09 04:32:20'),
(3, 1, 'hai', '', 'h', 'h', 120, 'h', 'h', 'noimage.jpg', 'h', '2020-01-09 04:33:10', '2020-01-09 04:33:10');

-- --------------------------------------------------------

--
-- Table structure for table `sub_menus`
--

CREATE TABLE `sub_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `submenu_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sub_menus`
--

INSERT INTO `sub_menus` (`id`, `submenu_name`, `link`, `menu_id`, `created_at`, `updated_at`) VALUES
(2, 'HomeGallery', 'HomeGallery', 4, '2019-12-16 00:35:57', '2019-12-16 00:35:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dharani Kumar Nellore', 'dharani-php@webappclouds.com', NULL, '$2y$10$oidhxqB19X1ps31wq9/Qa.5Sjivu1rH8EQi654X9ShT9Mm8Izef8W', NULL, '2020-01-01 23:36:15', '2020-01-01 23:36:15');

-- --------------------------------------------------------

--
-- Table structure for table `var`
--

CREATE TABLE `var` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `var_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `var_type` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vars`
--

CREATE TABLE `vars` (
  `id` int(10) NOT NULL,
  `var_title` varchar(255) NOT NULL,
  `var_name` varchar(255) NOT NULL,
  `var_type` int(10) NOT NULL,
  `var_desc` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vars`
--

INSERT INTO `vars` (`id`, `var_title`, `var_name`, `var_type`, `var_desc`, `updated_at`, `created_at`) VALUES
(1, 'Home Page Content', 'home_page_content', 1, '<!-- about_area_start -->\r\n<div class=\"about_area\">\r\n<div class=\"container\">\r\n<div class=\"align-items-center row\">\r\n<div class=\"col-lg-6 col-xl-6\">\r\n<div class=\"about_thumb\"><input alt=\"img\" src=\"http://localhost/starsnellore/admin/public/ckeditor/uploads/about_lft.png\" type=\"image\" />\r\n<div class=\"opening_hour text-center\">\r\n<h3>Opening Hour</h3>\r\n\r\n<p>Mon-Fri (9.00-11.00)<br />\r\nSat (10.00-4.00)</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-lg-6 col-xl-6\">\r\n<div class=\"about_info\">\r\n<div class=\"mb-20px section_title\">Home\r\n<h3>Experienced and<br />\r\nTraditional Stylish<br />\r\nBarber Shop</h3>\r\n</div>\r\n\r\n<p>Inspires employees and organizations to support causes they care<br />\r\nabout. We do this to bring more resources to the nonprofits that are<br />\r\nchanging our world.</p>\r\n<a class=\"boxed-btn3\" href=\"Experienced-and-Traditional-Stylish-Barber-Shop\">Learn More</a></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', '2019-12-24 01:43:17', '2019-12-24 01:38:11'),
(2, 'Home Page Video Contnet', 'home_page_video_content', 1, '<!-- video_area_start -->\r\n<div class=\"video_area\">\r\n<div class=\"container-fluid p-0\">\r\n<div class=\"align-items-center no-gutters row\">\r\n<div class=\"col-lg-6 col-xl-6\">\r\n<div class=\"video_info\">\r\n<div class=\"about_info\">\r\n<div class=\"mb-20px section_title\">How we Work\r\n<h3>Watch the Video<br />\r\nHow we Work?</h3>\r\n</div>\r\n\r\n<p>Inspires employees and organizations to support causes they care<br />\r\nabout. We do this to bring more resources to the nonprofits that are<br />\r\nchanging our world.</p>\r\n<a class=\"boxed-btn3\" href=\"book-an-appointment\"><span style=\"color:#ffffff\">book now</span></a></div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-lg-6 col-xl-6\">\r\n<div class=\"video_thumb\">\r\n<div class=\"video_thumb_inner\"><input alt=\"img\" src=\"http://localhost/starsnellore/admin/public/ckeditor/uploads/video.png\" type=\"image\" /> <a class=\"popup-video\" href=\"https://www.youtube.com/watch?v=I4NcwG-zusE\"> </a></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<!-- video_area_end -->', '2019-12-24 02:04:39', '2019-12-24 01:55:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `homegallery`
--
ALTER TABLE `homegallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homeslider`
--
ALTER TABLE `homeslider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `myaccount`
--
ALTER TABLE `myaccount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_module_id_foreign` (`module_id`);

--
-- Indexes for table `service_menus`
--
ALTER TABLE `service_menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_menus_service_id_foreign` (`service_id`);

--
-- Indexes for table `service_submenus`
--
ALTER TABLE `service_submenus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_submenus_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `sub_menus`
--
ALTER TABLE `sub_menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_menus_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `var`
--
ALTER TABLE `var`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `homegallery`
--
ALTER TABLE `homegallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `homeslider`
--
ALTER TABLE `homeslider`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `myaccount`
--
ALTER TABLE `myaccount`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service_menus`
--
ALTER TABLE `service_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service_submenus`
--
ALTER TABLE `service_submenus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_menus`
--
ALTER TABLE `sub_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `var`
--
ALTER TABLE `var`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service_menus`
--
ALTER TABLE `service_menus`
  ADD CONSTRAINT `service_menus_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `service_submenus`
--
ALTER TABLE `service_submenus`
  ADD CONSTRAINT `service_submenus_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `service_menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_menus`
--
ALTER TABLE `sub_menus`
  ADD CONSTRAINT `sub_menus_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
