-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2023 at 02:46 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dardoc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL,
  `role_id` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `password`, `photo`, `is_active`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Tarek Mandour', 'tarek.mandourr@gmail.com', '201006287379', '$2y$10$DdlKDFqLfrh8/DtMVSS/A.CFpRpr9VqmXKTv.4yTymkE83bOCEmVa', 'img1_1653665367.jpg', 1, 1, NULL, '2022-09-08 13:12:13', '2022-09-09 19:04:36'),
(5, 'tarek banker', 'banker@gmail.com', '1236549887', '$2y$10$RoOjBQcxkRCHjdMbyiVSIOzf52.1eCxjho.9qPGX7j1Gv.kxu1WtO', NULL, 1, 0, NULL, '2022-09-09 19:07:23', '2022-09-10 11:16:20'),
(6, 'malek tarek mandour', 'malek@gmail.com', '01006283333', '$2y$10$85XaIERa8r.IPNYIlyXeSeltdsOFIEizrd5s4.Ckjmoq3Cn05oQOi', NULL, 1, 0, NULL, '2022-12-31 12:20:06', '2022-12-31 12:27:21');

-- --------------------------------------------------------

--
-- Table structure for table `admin_statuses`
--

CREATE TABLE `admin_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_statuses`
--

INSERT INTO `admin_statuses` (`id`, `admin_id`, `status_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'test', '2022-09-08 15:27:30', '2022-09-08 15:27:30'),
(9, 3, 2, 'asd1', '2022-09-08 16:06:58', '2022-09-08 16:06:58');

-- --------------------------------------------------------

--
-- Table structure for table `admin_status_details`
--

CREATE TABLE `admin_status_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_status_id` int(11) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_status_details`
--

INSERT INTO `admin_status_details` (`id`, `admin_status_id`, `note`, `photo`, `created_at`, `updated_at`) VALUES
(7, 11, 'hfghfg', '1662859674631d399ad70d0.jpg', '2022-09-10 23:27:54', '2022-09-10 23:27:54'),
(8, 11, 'tryhgfhfgh', NULL, '2022-09-10 23:31:55', '2022-09-10 23:31:55');

-- --------------------------------------------------------

--
-- Table structure for table `admin_vacations`
--

CREATE TABLE `admin_vacations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `vacation_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `startdate` timestamp NULL DEFAULT NULL,
  `enddate` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_vacations`
--

INSERT INTO `admin_vacations` (`id`, `admin_id`, `vacation_id`, `name`, `startdate`, `enddate`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'tareq abdo', '2022-09-05 16:54:00', '2022-09-15 16:54:00', '2022-09-05 14:54:40', '2022-09-08 14:54:40'),
(2, 3, 1, 'tareq abdo', '2022-09-08 16:55:00', '2022-09-08 17:56:00', '2022-09-08 14:55:12', '2022-09-08 14:55:12');

-- --------------------------------------------------------

--
-- Table structure for table `admin_vacation_details`
--

CREATE TABLE `admin_vacation_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_vacation_id` int(11) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_vacation_details`
--

INSERT INTO `admin_vacation_details` (`id`, `admin_vacation_id`, `note`, `photo`, `created_at`, `updated_at`) VALUES
(3, 4, 'ghjhgjhgj', NULL, '2022-09-10 23:47:02', '2022-09-10 23:47:02'),
(4, 4, NULL, '1662860826631d3e1a72e33.jpg', '2022-09-10 23:47:06', '2022-09-10 23:47:06');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent` tinyint(4) DEFAULT 0,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `name_en`, `parent`, `photo`, `meta_keywords`, `meta_description`, `created_at`, `updated_at`) VALUES
(5, 'قسم رئيسي 1', NULL, NULL, 'img1_1653665367.jpg', NULL, NULL, '2022-05-27 12:20:00', '2022-09-10 11:35:24'),
(49, 'تجربه  11', NULL, NULL, NULL, NULL, NULL, '2022-09-08 10:38:42', '2022-09-08 10:41:05');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `membership_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `national_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jop` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delegate_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` timestamp NULL DEFAULT NULL,
  `register_date` timestamp NULL DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL,
  `type` tinyint(4) DEFAULT 0,
  `parent_id` int(11) DEFAULT 0,
  `token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `membership_no`, `national_no`, `phone`, `password`, `email`, `jop`, `delegate_name`, `birth_date`, `register_date`, `photo`, `is_active`, `type`, `parent_id`, `token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'طارق ابو مندور', '848421-1', '87218017171981', '201006287371', '$2y$10$35c6KTr5FaeK9RqB8bs02eGJrGXKSACyLreiwUf.ACW.3sZAl46Ai', 'tarek.mandourr@gmail.com', 'Web Developer', 'hjgjhgjhg', '1987-07-31 22:00:00', '2014-07-31 22:00:00', 'img1_1655725194.jpg', 1, 0, 0, '45454554666664', 'lpf31X7xT5N7sIUwDVodHRiKFf2K73pXnTyQZIuF0y1wAPurUoC4CbhpiiAz', '2022-05-27 12:20:10', '2022-08-23 13:40:51'),
(2, 'مالك طارق ابو مندور', '84842.1-1', '8721801717198.1-1', '201006287311', '$2y$10$Wm/h1UCSGvQEfhB8SRbpbO6TRfl.m/cHSNSVlvZpz4szsaduLvwUO', 'tarek.mandourr@gmail.com', 'Web Developer', NULL, '1987-07-31 22:00:00', '2014-07-31 22:00:00', NULL, 1, 1, 1, NULL, NULL, '2022-05-27 12:20:12', '2022-06-14 12:40:57'),
(3, 'روفان طارق ابو مندور', '84842.1-2', '8721801717198.1-2', '201006287312', '$2y$10$AdEYAFcvpvgoeW7odvX.CuduGQj3d2IOty7g5AUnpt0X0yIhIZXT.', 'tarek.mandourr@gmail.com', 'Web Developer', NULL, '1987-08-01 09:14:54', '2014-08-01 09:14:54', NULL, 1, 1, 1, NULL, NULL, '2022-05-27 12:20:12', '2022-05-27 12:20:12'),
(4, 'محمود الغرباوي', '848421-2', '87218017171982', '201006287372', '$2y$10$iaFAoXauQB59o5QCdhadTO3IORPRLgRRVudwqN7sIB5ttP0zetJ/6', 'tarek.mandourr@gmail.com', 'Web Developer', NULL, '1987-08-02 09:14:54', '2014-08-02 09:14:54', NULL, 1, 0, 0, NULL, NULL, '2022-05-27 12:20:12', '2022-05-27 12:20:12'),
(5, 'ادم محمود الغرباوي', '84842.2-1', '8721801717198.2-1', '201006287321', '$2y$10$5N6aTaO8e2yTneLHdG93v.VHM/Xa1VCqZx9hVST8happJJWTW5Osu', 'tarek.mandourr@gmail.com', 'Web Developer', NULL, '1987-08-02 09:14:54', '2014-08-02 09:14:54', NULL, 1, 1, 4, NULL, NULL, '2022-05-27 12:20:14', '2022-05-27 12:20:14'),
(6, 'ايسل محمود الغرباوي', '84842.2-2', '8721801717198.2-2', '201006287322', '$2y$10$3fGATadQN05Fx7W0Pksn3uRHHdhHGd4k3.Ff9NlCqxDY2zqL3ZmYG', 'tarek.mandourr@gmail.com', 'Web Developer', NULL, '1987-08-02 09:14:54', '2014-08-02 09:14:54', NULL, 1, 1, 4, NULL, NULL, '2022-05-27 12:20:14', '2022-05-27 12:20:14'),
(7, 'محمود درويش', '848421-3', '87218017171983', '201006287373', '$2y$10$rFmEpAWmeh0NpTBJjOWybOZssnspfHgLwLX5tBWC7z4ZDhHdL9Tbq', 'tarek.mandourr@gmail.com', 'Web Developer', NULL, '1987-08-03 09:14:54', '2014-08-03 09:14:54', NULL, 1, 0, 0, NULL, NULL, '2022-05-27 12:20:14', '2022-05-27 12:20:14'),
(8, 'مؤمن محمود درويش', '84842.3-1', '8721801717198.3-1', '201006287331', '$2y$10$LvT9Lgn9yY.5SW6BjEJkHOgcTdW6txqMs3dh5DwLgjk.Ilj0z2Mzq', 'tarek.mandourr@gmail.com', 'Web Developer', NULL, '1987-08-03 09:14:54', '2014-08-03 09:14:54', NULL, 1, 1, 7, NULL, NULL, '2022-05-27 12:20:15', '2022-05-27 12:20:15'),
(9, 'ساره محمود درويش', '84842.3-2', '8721801717198.3-2', '201006287332', '$2y$10$eFYd/kFNpRtKALaI/umcROgxNn9hPrTHj5tNYPvePm9YufTqPsfYK', 'tarek.mandourr@gmail.com', 'Web Developer', NULL, '1987-08-03 09:14:54', '2014-08-03 09:14:54', NULL, 1, 1, 7, NULL, NULL, '2022-05-27 12:20:15', '2022-05-27 12:20:15'),
(10, 'نور خميس', '848421-4', '87218017171984', '201006287374', '$2y$10$UWhtFndELFxuGUv6fIuVzu3OwyqgVDrbtR2Okg119GCjrApuyFC2m', 'tarek.mandourr@gmail.com', 'Web Developer', NULL, '1987-08-04 09:14:54', '2014-08-04 09:14:54', NULL, 1, 0, 0, NULL, NULL, '2022-05-27 12:20:15', '2022-05-27 12:20:15'),
(11, 'ليليا نور خميس', '84842.4-1', '8721801717198.4-1', '201006287341', '$2y$10$wpj1DO2b0O6jGPy0RKMpXehgMCHSpvdwEn6W3Dp4Z1rjYU0PrTqvm', 'tarek.mandourr@gmail.com', 'Web Developer', NULL, '1987-08-04 09:14:54', '2014-08-04 09:14:54', NULL, 1, 1, 10, NULL, NULL, '2022-05-27 12:20:16', '2022-05-27 12:20:16'),
(12, 'سليم نور خميس', '84842.4-2', '8721801717198.4-2', '201006287342', '$2y$10$f1PRaXKhs86ib2khgzWMk.cFCrCzRgtke4Q5y/BT15vT5dIO.2NlW', 'tarek.mandourr@gmail.com', 'Web Developer', NULL, '1987-08-04 09:14:54', '2014-08-04 09:14:54', NULL, 1, 1, 10, NULL, NULL, '2022-05-27 12:20:16', '2022-05-27 12:20:16'),
(13, 'اسامه زيدان', '848421-5', '87218017171985', '201006287375', '$2y$10$F9oJ0UaP5SarQLqIV5u3eex/1GdYZoOpC2q6QGf08rCcUcra7P9Nm', 'tarek.mandourr@gmail.com', 'Web Developer', NULL, '1987-08-05 09:14:54', '2014-08-05 09:14:54', NULL, 1, 0, 0, NULL, NULL, '2022-05-27 12:20:16', '2022-05-27 12:20:16'),
(14, 'لي لي اسامه زيدان', '84842.5-1', '8721801717198.5-1', '201006287351', '$2y$10$0TTAMxpRw/PTWVm3fJFm6en.R7Qh4liKz7q7Sjf5S8zCyjPxi7UpW', 'tarek.mandourr@gmail.com', 'Web Developer', NULL, '1987-08-05 09:14:54', '2014-08-05 09:14:54', NULL, 1, 1, 13, NULL, NULL, '2022-05-27 12:20:17', '2022-05-27 12:20:17'),
(15, 'عز اسامه زيدان', '84842.5-2', '8721801717198.5-2', '201006287352', '$2y$10$fveoFM13mFnrJFs7NbSVfu8YC1jGVZp7PNe.yCW95Lw5dbUB7s9We', 'tarek.mandourr@gmail.com', 'Web Developer', NULL, '1987-08-05 09:14:54', '2014-08-05 09:14:54', NULL, 1, 1, 13, NULL, NULL, '2022-05-27 12:20:18', '2022-05-27 12:20:18'),
(16, 'عميل تجريبي', '848421-6', '87218017171986', '201006287376', '$2y$10$VKVJL9I40p//SaBJJi.H4eMgC3uqChteJRxRfG.EG67rVOiM/58Ly', 'tarek.mandourr@gmail.com', 'Web Developer', NULL, '1987-08-06 09:14:54', '2014-08-06 09:14:54', NULL, 1, 0, 0, NULL, NULL, '2022-05-27 12:20:18', '2022-05-27 12:20:18'),
(17, 'عميل تابع تجريبي', '84842.6-1', '8721801717198.6-1', '201006287361', '$2y$10$cdMsouq7ircsiphqA7EtkOK1LVc0xRnkGomQnTdc/tD4O18FCFCmG', 'tarek.mandourr@gmail.com', 'Web Developer', NULL, '1987-08-06 09:14:54', '2014-08-06 09:14:54', NULL, 1, 1, 16, NULL, NULL, '2022-05-27 12:20:19', '2022-05-27 12:20:19'),
(18, 'عميل تابع تجريبي', '84842.6-2', '8721801717198.6-2', '201006287362', '$2y$10$41LCU9IRVZpLUFsKfAcq0uWA.xHtO.n4lRubMmtjM2B9AmJqtrkoS', 'tarek.mandourr@gmail.com', 'Web Developer', NULL, '1987-08-06 09:14:54', '2014-08-06 09:14:54', NULL, 1, 1, 16, NULL, NULL, '2022-05-27 12:20:19', '2022-05-27 12:20:19'),
(19, 'tareq mohamed abdo', '848421-1-3', '87218017171981-3', '+966542224999', '$2y$10$B4q9JcBkQMqkfu2tYJ1/5eK8SMDqFUQmrvZNXQBbsTuAwNcVSPFp.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2022-06-14 12:40:32', '2022-06-14 12:40:32'),
(20, 'toto', '3216527', '123546833548', '+966541114999', '$2y$10$2ePlGq39zgP/7sUtIz2sZuaetaDKbD9HLdO9ZnTC0dPLp6EefQnA.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, NULL, NULL, '2022-06-14 12:43:10', '2022-06-14 12:43:10');

-- --------------------------------------------------------

--
-- Table structure for table `client_cards`
--

CREATE TABLE `client_cards` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_cards`
--

INSERT INTO `client_cards` (`id`, `client_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'كارنيه 1', '2022-05-27 12:20:10', '2022-05-27 12:20:10'),
(2, 1, 'كارنيه 1', '2022-05-27 12:20:11', '2022-05-27 12:20:11'),
(3, 1, 'كارنيه 1', '2022-05-27 12:20:11', '2022-05-27 12:20:11'),
(4, 4, 'كارنيه 2', '2022-05-27 12:20:12', '2022-05-27 12:20:12'),
(5, 4, 'كارنيه 2', '2022-05-27 12:20:13', '2022-05-27 12:20:13'),
(6, 4, 'كارنيه 2', '2022-05-27 12:20:13', '2022-05-27 12:20:13'),
(7, 7, 'كارنيه 3', '2022-05-27 12:20:14', '2022-05-27 12:20:14'),
(8, 7, 'كارنيه 3', '2022-05-27 12:20:14', '2022-05-27 12:20:14'),
(9, 7, 'كارنيه 3', '2022-05-27 12:20:14', '2022-05-27 12:20:14'),
(10, 10, 'كارنيه 4', '2022-05-27 12:20:15', '2022-05-27 12:20:15'),
(11, 10, 'كارنيه 4', '2022-05-27 12:20:15', '2022-05-27 12:20:15'),
(12, 10, 'كارنيه 4', '2022-05-27 12:20:15', '2022-05-27 12:20:15'),
(13, 13, 'كارنيه 5', '2022-05-27 12:20:17', '2022-05-27 12:20:17'),
(14, 13, 'كارنيه 5', '2022-05-27 12:20:17', '2022-05-27 12:20:17'),
(15, 13, 'كارنيه 5', '2022-05-27 12:20:17', '2022-05-27 12:20:17'),
(16, 16, 'كارنيه 6', '2022-05-27 12:20:18', '2022-05-27 12:20:18'),
(17, 16, 'كارنيه 6', '2022-05-27 12:20:18', '2022-05-27 12:20:18'),
(18, 16, 'كارنيه 6', '2022-05-27 12:20:18', '2022-05-27 12:20:18');

-- --------------------------------------------------------

--
-- Table structure for table `client_debts`
--

CREATE TABLE `client_debts` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_debts`
--

INSERT INTO `client_debts` (`id`, `client_id`, `date`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-06-06', 300.00, '2022-05-27 12:20:11', '2022-05-27 12:20:11'),
(2, 1, '2024-06-06', 300.00, '2022-05-27 12:20:11', '2022-05-27 12:20:11'),
(3, 4, '2023-06-06', 300.00, '2022-05-27 12:20:13', '2022-05-27 12:20:13'),
(4, 4, '2024-06-06', 300.00, '2022-05-27 12:20:13', '2022-05-27 12:20:13'),
(5, 7, '2023-06-06', 300.00, '2022-05-27 12:20:14', '2022-05-27 12:20:14'),
(6, 7, '2024-06-06', 300.00, '2022-05-27 12:20:14', '2022-05-27 12:20:14'),
(7, 10, '2023-06-06', 300.00, '2022-05-27 12:20:16', '2022-05-27 12:20:16'),
(8, 10, '2024-06-06', 300.00, '2022-05-27 12:20:16', '2022-05-27 12:20:16'),
(9, 13, '2023-06-06', 300.00, '2022-05-27 12:20:17', '2022-05-27 12:20:17'),
(10, 13, '2024-06-06', 300.00, '2022-05-27 12:20:17', '2022-05-27 12:20:17'),
(11, 16, '2023-06-06', 300.00, '2022-05-27 12:20:18', '2022-05-27 12:20:18'),
(12, 16, '2024-06-06', 300.00, '2022-05-27 12:20:18', '2022-05-27 12:20:18');

-- --------------------------------------------------------

--
-- Table structure for table `client_notifications`
--

CREATE TABLE `client_notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fav` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_notifications`
--

INSERT INTO `client_notifications` (`id`, `client_id`, `title`, `body`, `fav`, `created_at`, `updated_at`) VALUES
(1, 1, 'تذكير سداد ', 'يرجى دفع مصاريف كارنيه ', 0, '2022-05-27 12:20:11', '2022-05-27 12:20:11'),
(2, 1, 'تذكير سداد ', 'يرجى دفع مصاريف كارنيه ', 0, '2022-05-27 12:20:11', '2022-06-20 15:19:49'),
(3, 1, 'تذكير سداد ', 'يرجى دفع مصاريف كارنيه ', 0, '2022-05-27 12:20:12', '2022-05-27 12:20:12'),
(7, 7, 'تذكير سداد ', 'يرجى دفع مصاريف كارنيه ', 0, '2022-05-27 12:20:14', '2022-06-20 14:59:08'),
(9, 7, 'تذكير سداد ', 'يرجى دفع مصاريف كارنيه ', 0, '2022-05-27 12:20:14', '2022-05-27 12:20:14'),
(10, 10, 'تذكير سداد ', 'يرجى دفع مصاريف كارنيه ', 0, '2022-05-27 12:20:16', '2022-05-27 12:20:16'),
(11, 10, 'تذكير سداد ', 'يرجى دفع مصاريف كارنيه ', 0, '2022-05-27 12:20:16', '2022-05-27 12:20:16'),
(12, 10, 'تذكير سداد ', 'يرجى دفع مصاريف كارنيه ', 0, '2022-05-27 12:20:16', '2022-05-27 12:20:16'),
(13, 13, 'تذكير سداد ', 'يرجى دفع مصاريف كارنيه ', 0, '2022-05-27 12:20:17', '2022-05-27 12:20:17'),
(14, 13, 'تذكير سداد ', 'يرجى دفع مصاريف كارنيه ', 0, '2022-05-27 12:20:17', '2022-05-27 12:20:17'),
(15, 13, 'تذكير سداد ', 'يرجى دفع مصاريف كارنيه ', 0, '2022-05-27 12:20:17', '2022-05-27 12:20:17'),
(16, 16, 'تذكير سداد ', 'يرجى دفع مصاريف كارنيه ', 0, '2022-05-27 12:20:18', '2022-05-27 12:20:18'),
(17, 16, 'تذكير سداد ', 'يرجى دفع مصاريف كارنيه ', 0, '2022-05-27 12:20:18', '2022-05-27 12:20:18'),
(18, 16, 'تذكير سداد ', 'يرجى دفع مصاريف كارنيه ', 0, '2022-05-27 12:20:18', '2022-05-27 12:20:18');

-- --------------------------------------------------------

--
-- Table structure for table `client_payments`
--

CREATE TABLE `client_payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_payments`
--

INSERT INTO `client_payments` (`id`, `client_id`, `date`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-06-06 09:14:54', 300.00, '2022-05-27 12:20:11', '2022-05-27 12:20:11'),
(2, 4, '2022-06-06 09:14:54', 300.00, '2022-05-27 12:20:13', '2022-05-27 12:20:13'),
(3, 7, '2022-06-06 09:14:54', 300.00, '2022-05-27 12:20:14', '2022-05-27 12:20:14'),
(4, 10, '2022-06-06 09:14:54', 300.00, '2022-05-27 12:20:16', '2022-05-27 12:20:16'),
(5, 13, '2022-06-06 09:14:54', 300.00, '2022-05-27 12:20:17', '2022-05-27 12:20:17'),
(6, 16, '2022-06-06 09:14:54', 300.00, '2022-05-27 12:20:18', '2022-05-27 12:20:18');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `msg` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `type`, `email`, `phone`, `msg`, `created_at`, `updated_at`) VALUES
(1, 'رسالة  1', NULL, 'tarek.mandourr1@gmail.com', '01006287379', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى', '2022-05-27 12:20:09', '2022-05-27 12:20:09'),
(2, 'رسالة  2', NULL, 'tarek.mandourr2@gmail.com', '01006287379', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى', '2022-05-27 12:20:09', '2022-05-27 12:20:09');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `ar_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action_date` timestamp NULL DEFAULT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `days` int(11) NOT NULL DEFAULT 0,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `admin_id`, `admin_name`, `num`, `name`, `category`, `type`, `action_date`, `start_date`, `end_date`, `days`, `description`, `created_at`, `updated_at`) VALUES
(7, 3, 'Tarek Mandour', 14, 'احمد بهنسي', 'قسم رئيسي 1', 'حالة ادارية', '2022-09-14 17:09:50', NULL, NULL, 0, 'اضافة حالة ادارية حالة ادارية 4', '2022-09-14 17:09:50', '2022-09-14 17:09:50'),
(8, 3, 'Tarek Mandour', 13, 'احمد بهنسي', 'قسم رئيسي 1', 'حالة ادارية', '2022-09-14 17:49:01', NULL, NULL, 0, 'حذف حالة ادارية حالة ادارية 4', '2022-09-14 17:49:01', '2022-09-14 17:49:01'),
(9, 3, 'Tarek Mandour', 14, 'احمد بهنسي', 'قسم رئيسي 1', 'حالة ادارية', '2022-09-14 17:49:02', NULL, NULL, 0, 'حذف حالة ادارية حالة ادارية 4', '2022-09-14 17:49:02', '2022-09-14 17:49:02'),
(10, 3, 'Tarek Mandour', 15, 'احمد بهنسي', 'قسم رئيسي 1', 'اجازة', '2022-09-14 18:05:52', '2022-09-14 19:57:00', '2022-09-22 19:57:00', 8, 'اضافة اجازة اجازه مرضي', '2022-09-14 18:05:52', '2022-09-14 18:05:52'),
(11, 3, 'Tarek Mandour', 3, 'احمد بهنسي', 'قسم رئيسي 1', 'اجازة', '2022-09-10 11:29:54', '2022-09-12 13:29:00', '2022-09-15 13:29:00', 3, 'حذف اجازة - tareq abdo', '2022-09-14 20:56:39', '2022-09-14 20:56:39');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent` tinyint(4) DEFAULT 0,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `name`, `name_en`, `parent`, `photo`, `meta_keywords`, `meta_description`, `created_at`, `updated_at`) VALUES
(2, 'asd1', NULL, NULL, NULL, NULL, NULL, '2022-09-08 14:27:02', '2022-09-08 14:27:02'),
(3, 'asd 2', NULL, NULL, NULL, NULL, NULL, '2022-09-08 14:27:07', '2022-09-08 14:27:07'),
(4, 'asd 4', NULL, NULL, NULL, NULL, NULL, '2022-09-08 14:27:13', '2022-09-08 14:27:13'),
(5, 'asd 5', NULL, NULL, NULL, NULL, NULL, '2022-09-08 16:03:42', '2022-09-08 16:03:42');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_05_26_130449_create_settings_table', 1),
(6, '2022_05_26_131226_create_clients_table', 1),
(7, '2022_05_26_132317_create_pages_table', 1),
(8, '2022_05_26_133200_create_contacts_table', 1),
(9, '2022_05_26_133939_create_sliders_table', 1),
(10, '2022_05_26_134630_create_partners_table', 1),
(11, '2022_05_26_134709_create_languages_table', 1),
(12, '2022_05_26_140406_create_categories_table', 1),
(13, '2022_05_26_140623_create_posts_table', 1),
(14, '2022_05_26_142030_create_post_galleries_table', 1),
(15, '2022_05_26_144656_create_client_payments_table', 1),
(16, '2022_05_26_144722_create_client_debts_table', 1),
(17, '2022_05_26_153939_create_client_cards_table', 1),
(18, '2022_05_26_160028_create_offers_table', 1),
(19, '2022_05_26_160643_create_client_notifications_table', 1),
(20, '2022_05_26_131206_create_admins_table', 2),
(21, '2022_09_08_124357_create_vacations_table', 3),
(22, '2022_09_08_124433_create_statuses_table', 4),
(23, '2022_09_08_141844_create_admin_statuses_table', 5),
(24, '2022_09_08_141905_create_admin_vacations_table', 6),
(25, '2022_09_09_190440_create_permission_tables', 7),
(26, '2022_09_10_125832_create_logs_table', 8),
(27, '2022_09_11_001438_create_admin_status_details_table', 9),
(28, '2022_09_11_001518_create_admin_vacation_details_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Admin', 3),
(1, 'App\\Models\\Admin', 6),
(2, 'App\\Models\\Admin', 5);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slogan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slogan_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qrcode` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `title`, `slogan`, `content`, `title_en`, `slogan_en`, `content_en`, `photo`, `qrcode`, `created_at`, `updated_at`) VALUES
(1, 'شركة 1  1', 'النص هو مثال لنص يمكن أن يستبدل في نفس المساحة. 1', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى', 'Company  1', 'Lorem Ipsum is simply dummy text of the printing  1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'img1_1653665367.jpg', 'img1_1653665111.png', '2022-05-27 12:20:10', '2022-05-27 12:20:10'),
(2, 'شركة 1  2', 'النص هو مثال لنص يمكن أن يستبدل في نفس المساحة. 2', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى', 'Company  2', 'Lorem Ipsum is simply dummy text of the printing  2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'img1_1653665367.jpg', 'img1_1653665111.png', '2022-05-27 12:20:10', '2022-05-27 12:20:10'),
(3, 'شركة 1  3', 'النص هو مثال لنص يمكن أن يستبدل في نفس المساحة. 3', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى', 'Company  3', 'Lorem Ipsum is simply dummy text of the printing  3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'img1_1653665367.jpg', 'img1_1653665111.png', '2022-05-27 12:20:10', '2022-05-27 12:20:10'),
(4, 'شركة 1  4', 'النص هو مثال لنص يمكن أن يستبدل في نفس المساحة. 4', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى', 'Company  4', 'Lorem Ipsum is simply dummy text of the printing  4', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'img1_1653665367.jpg', 'img1_1653665111.png', '2022-05-27 12:20:10', '2022-05-27 12:20:10'),
(5, 'شركة 1  5', 'النص هو مثال لنص يمكن أن يستبدل في نفس المساحة. 5', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى', 'Company  5', 'Lorem Ipsum is simply dummy text of the printing  5', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'img1_1653665367.jpg', 'img1_1653665111.png', '2022-05-27 12:20:10', '2022-05-27 12:20:10'),
(6, 'شركة 1  6', 'النص هو مثال لنص يمكن أن يستبدل في نفس المساحة. 6', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى', 'Company  6', 'Lorem Ipsum is simply dummy text of the printing  6', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'img1_1653665367.jpg', 'img1_1653665111.png', '2022-05-27 12:20:10', '2022-05-27 12:20:10');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mission` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vision` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `why` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mission_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vision_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `why_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `content`, `title_en`, `content_en`, `meta_keywords`, `meta_description`, `photo`, `photo2`, `lat`, `lng`, `mission`, `vision`, `why`, `mission_en`, `vision_en`, `why_en`, `created_at`, `updated_at`) VALUES
(1, 'من نحن', '<p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى</p>', 'About us', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>', 'meta_keywords', 'meta_description', 'img_1654375155.jpg', 'img2_1654375155.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-27 12:19:58', '2022-06-04 18:39:15'),
(2, 'سياسة الاستخدام', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى', 'Policy', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'meta_keywords', 'meta_description', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-27 12:19:58', '2022-05-27 12:19:58'),
(3, 'الشروط والاحكام', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى', 'Terms', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'meta_keywords', 'meta_description', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-27 12:19:59', '2022-05-27 12:19:59'),
(4, 'لائحة النادي', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى', 'Terms', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'meta_keywords', 'meta_description', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-27 12:19:59', '2022-05-27 12:19:59');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `title`, `title_en`, `link`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'شركاؤنا  1', 'Partner  1', 'http://google.com', NULL, '2022-05-27 12:20:09', '2022-05-27 12:20:09'),
(2, 'شركاؤنا  2', 'Partner  2', 'http://google.com', NULL, '2022-05-27 12:20:09', '2022-05-27 12:20:09'),
(3, 'شركاؤنا  3', 'Partner  3', 'http://google.com', NULL, '2022-05-27 12:20:09', '2022-05-27 12:20:09'),
(4, 'شركاؤنا  4', 'Partner  4', 'http://google.com', NULL, '2022-05-27 12:20:09', '2022-05-27 12:20:09'),
(5, 'شركاؤنا  5', 'Partner  5', 'http://google.com', NULL, '2022-05-27 12:20:09', '2022-05-27 12:20:09');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `parent_name`, `created_at`, `updated_at`) VALUES
(8, 'الحالات الادارية', 'admin', 'الاعدادات', '2022-09-09 18:00:14', '2022-09-09 18:00:14'),
(9, 'انواع الاجازات', 'admin', 'الاعدادات', '2022-09-09 18:00:14', '2022-09-09 18:00:14'),
(10, 'الاقسام', 'admin', 'الاعدادات', '2022-09-09 18:00:14', '2022-09-09 18:00:14'),
(11, 'الاعدادات للموقع', 'admin', 'الاعدادات', '2022-09-09 18:00:14', '2022-09-09 18:00:14'),
(12, 'تقرير الموظفين', 'admin', 'التقارير', '2022-09-09 18:00:14', '2022-09-09 18:00:14'),
(13, 'تقرير الحالات الادارية', 'admin', 'التقارير', '2022-09-09 18:00:14', '2022-09-09 18:00:14'),
(14, 'تقرير الاجازات', 'admin', 'التقارير', '2022-09-09 18:00:14', '2022-09-09 18:00:14'),
(15, 'الصلاحيات والادوار', 'admin', 'الصلاحيات', '2022-09-09 18:00:14', '2022-09-09 18:00:14'),
(16, 'اضافة موظف', 'admin', 'الموظفين', '2022-09-09 18:00:14', '2022-09-09 18:00:14'),
(17, 'تعديل موظف', 'admin', 'الموظفين', '2022-09-09 18:00:14', '2022-09-09 18:00:14'),
(18, 'حذف موظف', 'admin', 'الموظفين', '2022-09-09 18:00:14', '2022-09-09 18:00:14'),
(19, 'اضافة حالة ادارية', 'admin', 'الموظفين', '2022-09-09 18:00:14', '2022-09-09 18:00:14'),
(20, 'حذف حالة ادارية', 'admin', 'الموظفين', '2022-09-09 18:00:14', '2022-09-09 18:00:14'),
(21, 'اضافة اجازة', 'admin', 'الموظفين', '2022-09-09 18:00:14', '2022-09-09 18:00:14'),
(22, 'حذف اجازة', 'admin', 'الموظفين', '2022-09-09 18:00:15', '2022-09-09 18:00:15'),
(23, 'الاجراءات', 'admin', 'الاعدادات', '2022-09-09 18:00:14', '2022-09-09 18:00:14'),
(24, 'نسخ حالة ادارية', 'admin', 'الموظفين', '2022-09-09 18:00:14', '2022-09-09 18:00:14'),
(25, 'نسخ اجازة', 'admin', 'الموظفين', '2022-09-09 18:00:15', '2022-09-09 18:00:15');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat_id` int(10) UNSIGNED NOT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `title_en`, `content_en`, `cat_id`, `meta_keywords`, `meta_description`, `photo`, `created_at`, `updated_at`) VALUES
(49, 'مقالة  1', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى', 'Article  1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 5, 'meta_keywords', 'meta_description', 'img1_1653665367.jpg', '2022-05-27 12:20:07', '2022-05-27 12:20:07'),
(50, 'مقالة  2', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى', 'Article  2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 5, 'meta_keywords', 'meta_description', 'img1_1653665367.jpg', '2022-05-27 12:20:08', '2022-05-27 12:20:08'),
(51, 'مقالة  3', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى', 'Article  3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 5, 'meta_keywords', 'meta_description', 'img1_1653665367.jpg', '2022-05-27 12:20:08', '2022-05-27 12:20:08'),
(52, 'مقالة  4', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى', 'Article  4', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 5, 'meta_keywords', 'meta_description', 'img1_1653665367.jpg', '2022-05-27 12:20:08', '2022-05-27 12:20:08'),
(53, 'مقالة  5', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى', 'Article  5', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 5, 'meta_keywords', 'meta_description', 'img1_1653665367.jpg', '2022-05-27 12:20:08', '2022-05-27 12:20:08'),
(54, 'مقالة  6', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى', 'Article  6', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 5, 'meta_keywords', 'meta_description', 'img1_1653665367.jpg', '2022-05-27 12:20:08', '2022-05-27 12:20:08'),
(55, 'مقالة  7', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى', 'Article  7', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 5, 'meta_keywords', 'meta_description', 'img1_1653665367.jpg', '2022-05-27 12:20:08', '2022-05-27 12:20:08'),
(56, 'مقالة  8', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى', 'Article  8', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 5, 'meta_keywords', 'meta_description', 'img1_1653665367.jpg', '2022-05-27 12:20:08', '2022-05-27 12:20:08'),
(57, 'مقالة  9', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى', 'Article  9', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 5, 'meta_keywords', 'meta_description', 'img1_1653665367.jpg', '2022-05-27 12:20:08', '2022-05-27 12:20:08'),
(58, 'مقالة  10', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى', 'Article  10', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 5, 'meta_keywords', 'meta_description', 'img1_1653665367.jpg', '2022-05-27 12:20:08', '2022-05-27 12:20:08'),
(59, 'مقالة  11', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى', 'Article  11', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 5, 'meta_keywords', 'meta_description', 'img1_1653665367.jpg', '2022-05-27 12:20:08', '2022-05-27 12:20:08'),
(60, 'مقالة  12', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى', 'Article  12', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 5, 'meta_keywords', 'meta_description', 'img1_1653665367.jpg', '2022-05-27 12:20:09', '2022-05-27 12:20:09');

-- --------------------------------------------------------

--
-- Table structure for table `post_galleries`
--

CREATE TABLE `post_galleries` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_age` int(11) NOT NULL,
  `husband_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `husband_age` int(11) NOT NULL,
  `referral_dr` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pregnancy` tinyint(4) NOT NULL DEFAULT 1,
  `sex` tinyint(4) DEFAULT 0,
  `retrieval_date` date DEFAULT NULL,
  `trade_fsh` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trade_hmg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trade_triggering` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trade_e2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trade_p4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trade_fsh2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trade_hmg2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trade_triggering2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_fsh2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_hmg2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_triggering2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_fsh` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_hmg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_triggering` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_e2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_p4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vol` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `count` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `motility` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `progressive_motility` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abnormality` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oocyte_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_injected` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gv` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m2_abn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oocytes_comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day5` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `embryos` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `straws` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `patient_name`, `patient_age`, `husband_name`, `husband_age`, `referral_dr`, `pregnancy`, `sex`, `retrieval_date`, `trade_fsh`, `trade_hmg`, `trade_triggering`, `trade_e2`, `trade_p4`, `trade_fsh2`, `trade_hmg2`, `trade_triggering2`, `number_fsh2`, `number_hmg2`, `number_triggering2`, `number_fsh`, `number_hmg`, `number_triggering`, `number_e2`, `number_p4`, `vol`, `count`, `motility`, `progressive_motility`, `abnormality`, `oocyte_no`, `total_injected`, `m2`, `m1`, `gv`, `m2_abn`, `oocytes_comment`, `day3`, `day5`, `embryos`, `date`, `straws`, `created_at`, `updated_at`) VALUES
(5, 'قسم رئيسي 1', 0, '', 0, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-27 12:20:00', '2022-09-10 11:35:24'),
(49, 'تجربه  11', 20, 'Husband name:', 2, NULL, 1, NULL, NULL, '5', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '50', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-08 10:38:42', '2023-01-01 16:32:10'),
(50, 'Patient name:', 52, 'Husband name:', 52, 'Referral dr', 3, 0, '2023-01-09', '5', '4', '2', '2', '4', NULL, NULL, NULL, NULL, NULL, NULL, '50', '1', '3', '2', '8', '52', '55', '44', '22', '12', 'test1', 'test2', 'test3', 'test4', 'test5', 'test6', 'Oocytes comment Oocytes comment Oocytes comment Oocytes comment', NULL, '<h1 class=\"d-flex flex-column text-dark fw-bolder fs-3 mb-0\" style=\"box-sizing: border-box; margin-top: 0px; line-height: 1.2; color: #181c32; --bs-text-opacity: 1; font-family: Poppins, Helvetica, sans-serif; background-color: #ffffff; margin-bottom: 0px !important; font-size: 1.35rem !important; display: flex !important; flex-direction: column !important;\">Record | Patient name</h1>', 'Embryos', '2023-01-16', '24', '2022-12-31 20:48:04', '2023-01-05 11:41:37'),
(51, 'hana', 32, 'ahmed', 40, 'mohamed', 2, 2, '2023-01-04', '2', '3', '4', NULL, NULL, '4', '2', '3', '2', '2', '1', '10', '5', '15', '2', '5', '4', '55', '44', NULL, NULL, '15', NULL, '12', '2', '1', NULL, NULL, '<p>6 8ytilauq embryos of go</p>', NULL, NULL, NULL, NULL, '2023-01-04 15:39:45', '2023-01-05 11:55:08');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'الادمن', 'admin', '2022-09-09 18:02:36', '2022-09-09 18:02:36'),
(2, 'محاسب', 'admin', '2022-09-09 19:06:40', '2022-09-09 19:06:40'),
(4, 'ttttttt', 'admin', '2022-09-10 10:21:37', '2022-09-10 10:29:57');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(8, 1),
(9, 1),
(10, 1),
(12, 1),
(12, 2),
(12, 4),
(13, 1),
(13, 2),
(13, 4),
(14, 1),
(14, 2),
(14, 4),
(15, 1),
(15, 4),
(16, 1),
(16, 4),
(17, 1),
(17, 4),
(18, 1),
(18, 4),
(19, 1),
(19, 4),
(20, 1),
(20, 4),
(21, 1),
(21, 4),
(22, 1),
(22, 4),
(23, 1),
(24, 1),
(25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fav` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `breadcrumb` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_lang` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `snapchat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `title_en`, `meta_keywords`, `meta_description`, `meta_description_en`, `logo1`, `logo2`, `fav`, `breadcrumb`, `site_lang`, `phone1`, `phone2`, `email1`, `email2`, `address`, `address_en`, `pdf`, `website`, `location`, `work_time`, `whatsapp`, `facebook`, `twitter`, `youtube`, `linkedin`, `instagram`, `snapchat`, `created_at`, `updated_at`) VALUES
(1, 'Dar El-Omoma Hospital', 'Dar El-Omoma Hospital', 'موقع تجريبي 1 , موقع تجريب 2', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'logo11672494350.png', 'logo21672494672.png', 'fav1672494531.png', 'breadcrumb1655219384.png', 'ar', '01006287378', '01006287379', 'tarek.mandourr@gmail.com', 'tarek.mandourr@gmail.com', 'العنوان شارع العنوان', 'Address St 25 , towers', 'breadcrumb1655727047.pdf', 'https://demosite.com', 'https://goo.gl/maps/HpUs2tj6om1f6rRM7', NULL, '201006287379', 'facebook', 'twitter', 'youtube', 'linkedin', 'instagram', 'snapchat', '2022-05-27 12:19:58', '2022-12-31 11:51:12');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` tinyint(4) DEFAULT 0,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `title_en`, `content`, `content_en`, `link`, `sort`, `photo`, `background`, `created_at`, `updated_at`) VALUES
(4, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'img2_1655220237.png', '2022-06-14 13:23:57', '2022-06-14 13:23:57'),
(5, NULL, NULL, NULL, NULL, NULL, 2, NULL, 'img2_1655220253.png', '2022-06-14 13:24:13', '2022-06-14 13:24:13'),
(6, NULL, NULL, NULL, NULL, NULL, 4, NULL, 'img2_1655220991.png', '2022-06-14 13:36:31', '2022-06-14 13:36:31'),
(7, NULL, NULL, NULL, NULL, NULL, 5, NULL, 'img2_1655221005.jpg', '2022-06-14 13:36:45', '2022-06-14 13:36:45'),
(8, NULL, NULL, NULL, NULL, NULL, 6, NULL, 'img2_1655221019.jpg', '2022-06-14 13:36:59', '2022-06-14 13:36:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vacations`
--

CREATE TABLE `vacations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent` tinyint(4) DEFAULT 0,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vacations`
--

INSERT INTO `vacations` (`id`, `name`, `name_en`, `parent`, `photo`, `meta_keywords`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'tareq abdo', NULL, NULL, NULL, NULL, NULL, '2022-09-08 11:05:13', '2022-09-08 11:07:14'),
(2, 'اجازه مرضي', NULL, NULL, NULL, NULL, NULL, '2022-09-10 15:54:24', '2022-09-10 15:54:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_phone_unique` (`phone`);

--
-- Indexes for table `admin_statuses`
--
ALTER TABLE `admin_statuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_statuses_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `admin_status_details`
--
ALTER TABLE `admin_status_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_vacations`
--
ALTER TABLE `admin_vacations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_vacations_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `admin_vacation_details`
--
ALTER TABLE `admin_vacation_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_membership_no_unique` (`membership_no`),
  ADD UNIQUE KEY `clients_national_no_unique` (`national_no`),
  ADD UNIQUE KEY `clients_phone_unique` (`phone`);

--
-- Indexes for table `client_cards`
--
ALTER TABLE `client_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_cards_client_id_foreign` (`client_id`);

--
-- Indexes for table `client_debts`
--
ALTER TABLE `client_debts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_debts_client_id_foreign` (`client_id`);

--
-- Indexes for table `client_notifications`
--
ALTER TABLE `client_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_notifications_client_id_foreign` (`client_id`);

--
-- Indexes for table `client_payments`
--
ALTER TABLE `client_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_payments_client_id_foreign` (`client_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_cat_id_foreign` (`cat_id`);

--
-- Indexes for table `post_galleries`
--
ALTER TABLE `post_galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_galleries_post_id_foreign` (`post_id`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vacations`
--
ALTER TABLE `vacations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admin_statuses`
--
ALTER TABLE `admin_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `admin_status_details`
--
ALTER TABLE `admin_status_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admin_vacations`
--
ALTER TABLE `admin_vacations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `admin_vacation_details`
--
ALTER TABLE `admin_vacation_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `client_cards`
--
ALTER TABLE `client_cards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `client_debts`
--
ALTER TABLE `client_debts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `client_notifications`
--
ALTER TABLE `client_notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `client_payments`
--
ALTER TABLE `client_payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `post_galleries`
--
ALTER TABLE `post_galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vacations`
--
ALTER TABLE `vacations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_statuses`
--
ALTER TABLE `admin_statuses`
  ADD CONSTRAINT `admin_statuses_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `admin_vacations`
--
ALTER TABLE `admin_vacations`
  ADD CONSTRAINT `admin_vacations_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `client_cards`
--
ALTER TABLE `client_cards`
  ADD CONSTRAINT `client_cards_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `client_debts`
--
ALTER TABLE `client_debts`
  ADD CONSTRAINT `client_debts_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `client_notifications`
--
ALTER TABLE `client_notifications`
  ADD CONSTRAINT `client_notifications_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `client_payments`
--
ALTER TABLE `client_payments`
  ADD CONSTRAINT `client_payments_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_galleries`
--
ALTER TABLE `post_galleries`
  ADD CONSTRAINT `post_galleries_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
