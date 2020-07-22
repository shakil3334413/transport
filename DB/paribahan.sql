-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 04, 2020 at 12:38 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paribahan`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessories_earns`
--

CREATE TABLE `accessories_earns` (
  `id` int(10) UNSIGNED NOT NULL,
  `counter_id` int(10) UNSIGNED DEFAULT NULL,
  `total_amount` double(30,2) DEFAULT NULL,
  `shift` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accessories_earns`
--

INSERT INTO `accessories_earns` (`id`, `counter_id`, `total_amount`, `shift`, `created_at`, `updated_at`, `deleted_at`) VALUES
(22, 1, 100.00, '1', '2020-03-04 04:41:11', '2020-03-04 04:41:11', NULL),
(23, 2, 1000.00, '1', '2020-03-04 04:52:26', '2020-03-04 04:52:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `all_bus_costs`
--

CREATE TABLE `all_bus_costs` (
  `id` int(10) UNSIGNED NOT NULL,
  `bus_id` int(10) UNSIGNED NOT NULL,
  `gp_cost_add_id` int(10) UNSIGNED DEFAULT NULL,
  `driver_salarie_id` int(10) UNSIGNED DEFAULT NULL,
  `cost_add_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `id` int(10) UNSIGNED NOT NULL,
  `model` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`id`, `model`, `number`, `lat`, `long`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '21D', '25638-DK', '16.812280', '100.292680', '2020-02-25 02:16:50', '2020-02-25 02:21:45', NULL),
(2, '21A (M23)', '25622-DK', '26.675200', '85.166800', '2020-02-25 02:23:06', '2020-02-25 02:23:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bus_trip_numbers`
--

CREATE TABLE `bus_trip_numbers` (
  `id` int(10) UNSIGNED NOT NULL,
  `bus_id` int(10) UNSIGNED NOT NULL,
  `trip_number` int(11) NOT NULL,
  `trip_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bus_trip_numbers`
--

INSERT INTO `bus_trip_numbers` (`id`, `bus_id`, `trip_number`, `trip_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 7, '2020-02-29 01:08:37', '2020-02-29 01:08:37', '2020-02-29 01:24:00', NULL),
(2, 1, 5, '2020-03-03 19:06:00', '2020-02-29 01:24:51', '2020-02-29 01:24:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `checker_infos`
--

CREATE TABLE `checker_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `national_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `checker_infos`
--

INSERT INTO `checker_infos` (`id`, `name`, `phone`, `national_id`, `address`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Kazi Abdullah al Masud', '01876155755', '87/9723555454', 'Shymoli', 'kazi-abdullah-al-masud-2020-02-26-5e561970e7ad5.jpeg', '2020-02-26 00:44:38', '2020-02-26 01:08:32', NULL),
(2, 'Mahadi hasan', '01637621452', '87/9723555443254', 'Mirpur -10', 'dafault.png', '2020-02-26 00:45:01', '2020-02-26 00:45:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `checker_salaries`
--

CREATE TABLE `checker_salaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `checker_id` int(10) UNSIGNED NOT NULL,
  `counter_id` int(10) UNSIGNED NOT NULL,
  `shift` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taka` double(16,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `check_posts`
--

CREATE TABLE `check_posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `check_posts`
--

INSERT INTO `check_posts` (`id`, `name`, `address`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Shymoli', 'Shymoli play ground', '2020-02-25 03:46:56', '2020-02-25 03:46:56', NULL),
(2, 'Mirpur', 'Mirpur-10 Al helal Hospital', '2020-02-25 03:53:56', '2020-02-25 03:53:56', NULL),
(3, 'Mirpur-02', 'Stadiuam', '2020-02-25 03:54:41', '2020-02-25 03:55:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cost_adds`
--

CREATE TABLE `cost_adds` (
  `id` int(10) UNSIGNED NOT NULL,
  `bus_id` int(10) UNSIGNED NOT NULL,
  `cost_id` int(10) UNSIGNED NOT NULL,
  `taka` double(16,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cost_lists`
--

CREATE TABLE `cost_lists` (
  `id` int(10) UNSIGNED NOT NULL,
  `cost_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost_details` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `counters`
--

CREATE TABLE `counters` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counters`
--

INSERT INTO `counters` (`id`, `name`, `address`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Shymoli', 'Shymoli,Ring Road', '2020-02-25 03:26:04', '2020-02-25 03:26:04', NULL),
(2, 'Mirpur', 'Mirpur-10', '2020-02-25 03:29:34', '2020-02-25 03:29:34', NULL),
(3, 'Mohammodpur', 'Adabor Thana', '2020-02-25 03:30:20', '2020-02-25 03:33:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `counter_costs`
--

CREATE TABLE `counter_costs` (
  `id` int(10) UNSIGNED NOT NULL,
  `counter_id` int(10) UNSIGNED NOT NULL,
  `counterman_salary_id` int(10) UNSIGNED DEFAULT NULL,
  `helper_salary_id` int(10) UNSIGNED DEFAULT NULL,
  `checker_salaries_id` int(10) UNSIGNED DEFAULT NULL,
  `counter_cost_add_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `counter_cost_adds`
--

CREATE TABLE `counter_cost_adds` (
  `id` int(10) UNSIGNED NOT NULL,
  `counter_id` int(10) UNSIGNED NOT NULL,
  `counter_cost_id` int(10) UNSIGNED NOT NULL,
  `taka` double(16,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `counter_cost_lists`
--

CREATE TABLE `counter_cost_lists` (
  `id` int(10) UNSIGNED NOT NULL,
  `cost_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost_details` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `counter_man_infos`
--

CREATE TABLE `counter_man_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `national_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counter_man_infos`
--

INSERT INTO `counter_man_infos` (`id`, `name`, `phone`, `national_id`, `address`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Kazi Abdullah al', '01876155755', '2563-876245', 'Shymoli,Ring Road', 'kazi-abdullah-al-2020-02-26-5e5620f108564.jpeg', '2020-02-26 01:40:33', '2020-02-26 01:40:33', NULL),
(2, 'Mahadi hasan', '01637621452', '87/9723', 'Mirpur-10', 'dafault.png', '2020-02-26 01:47:34', '2020-02-26 01:52:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `counter_man_salaries`
--

CREATE TABLE `counter_man_salaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `counterman_id` int(10) UNSIGNED NOT NULL,
  `counter_id` int(10) UNSIGNED NOT NULL,
  `shift` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taka` double(16,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `driver_infos`
--

CREATE TABLE `driver_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driving_liceing` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `national_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `driver_infos`
--

INSERT INTO `driver_infos` (`id`, `name`, `phone`, `driving_liceing`, `national_id`, `address`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Kazi Abdullah al Masud', '01876155754', '2563145624', '87/9723556', 'Shymoli Ring Road', 'kazi-abdullah-al-masud-2020-02-25-5e55156b25221.jpg', '2020-02-25 05:55:32', '2020-02-25 06:39:07', NULL),
(2, 'Mahadi hasan', '01627837443', '5486454', '87/9723', 'Mirpur', 'mahadi-hasan-2020-02-25-5e550be8c718c.jpg', '2020-02-25 05:58:32', '2020-02-25 05:58:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `driver_salaries`
--

CREATE TABLE `driver_salaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `driver_id` int(10) UNSIGNED NOT NULL,
  `bus_id` int(10) UNSIGNED NOT NULL,
  `salary_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taka` double(16,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `earns`
--

CREATE TABLE `earns` (
  `id` int(10) UNSIGNED NOT NULL,
  `counter_id` int(10) UNSIGNED NOT NULL,
  `ticket_id` int(10) UNSIGNED DEFAULT NULL,
  `access_id` int(10) UNSIGNED DEFAULT NULL,
  `total_earn` int(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `earns`
--

INSERT INTO `earns` (`id`, `counter_id`, `ticket_id`, `access_id`, `total_earn`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 1, 24, 22, NULL, '2020-03-04 04:41:11', '2020-03-04 04:41:11', NULL),
(3, 2, 25, NULL, NULL, '2020-03-04 04:43:17', '2020-03-04 04:43:17', NULL),
(4, 2, 26, NULL, NULL, '2020-03-04 04:43:18', '2020-03-04 04:43:18', NULL),
(5, 2, 27, 23, NULL, '2020-03-04 04:52:26', '2020-03-04 04:52:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gp_cost_adds`
--

CREATE TABLE `gp_cost_adds` (
  `id` int(10) UNSIGNED NOT NULL,
  `bus_id` int(10) UNSIGNED NOT NULL,
  `taka` double(16,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `helper_infos`
--

CREATE TABLE `helper_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `national_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `helper_infos`
--

INSERT INTO `helper_infos` (`id`, `name`, `phone`, `national_id`, `address`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Kazi Abdullah al', '01876155755', '87/9723555454', 'Shymoli', 'kazi-abdullah-al-2020-02-26-5e5611dd66e1c.jpeg', '2020-02-26 00:24:37', '2020-02-26 00:36:13', NULL),
(2, 'Kazi Abdullah al Masud', '01876155734', '87/9723555443254', 'Shymoli Ring Road', 'kazi-abdullah-al-masud-2020-02-26-5e561187b671f.jpg', '2020-02-26 00:25:14', '2020-02-26 00:36:27', '2020-02-26 00:36:27'),
(3, 'Mahadi hasan', '01637621452', '87/972355', 'Mirpur', 'dafault.png', '2020-02-26 00:25:54', '2020-02-26 00:25:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `helper_salaries`
--

CREATE TABLE `helper_salaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `helper_id` int(10) UNSIGNED NOT NULL,
  `counter_id` int(10) UNSIGNED NOT NULL,
  `shift` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taka` double(16,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(31, '2014_10_12_000000_create_users_table', 1),
(32, '2014_10_12_100000_create_password_resets_table', 1),
(33, '2020_02_16_073933_create_owners_table', 1),
(34, '2020_02_16_074222_create_buses_table', 1),
(35, '2020_02_16_075153_create_counters_table', 1),
(36, '2020_02_16_080011_create_check_posts_table', 1),
(37, '2020_02_16_080137_create_driver_infos_table', 1),
(38, '2020_02_16_080418_create_helper_infos_table', 1),
(39, '2020_02_16_080611_create_checker_infos_table', 1),
(40, '2020_02_16_084547_create_counter_man_infos_table', 1),
(41, '2020_02_16_084830_create_owner_buses_table', 1),
(42, '2020_02_16_085213_create_owner_advances_table', 1),
(55, '2020_02_16_090254_create_driver_salaries_table', 2),
(56, '2020_02_16_091515_create_counter_man_salaries_table', 2),
(57, '2020_02_16_091906_create_helper_salaries_table', 2),
(58, '2020_02_16_092147_create_checker_salaries_table', 2),
(59, '2020_02_16_092623_create_bus_trip_numbers_table', 2),
(60, '2020_02_16_093448_create_today_driver_helpers_table', 2),
(61, '2020_02_16_093918_create_today_bus_checks_table', 2),
(62, '2020_02_16_101421_create_cost_lists_table', 2),
(63, '2020_02_16_101648_create_cost_adds_table', 2),
(64, '2020_02_16_101841_create_counter_cost_lists_table', 2),
(65, '2020_02_16_101938_create_counter_cost_adds_table', 2),
(66, '2020_02_16_102158_create_gp_cost_adds_table', 2),
(67, '2020_02_16_102446_create_ticket_earns_table', 2),
(68, '2020_02_16_102901_create_accessories_earns_table', 2),
(69, '2020_02_16_110348_create_earns_table', 2),
(70, '2020_02_23_003411_create_counter_costs_table', 2),
(71, '2020_02_23_004113_create_all_bus_costs_table', 2),
(72, '2020_02_23_090850_create_sms_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `national_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`id`, `name`, `phone`, `email`, `bank_number`, `national_id`, `address`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Kazi Abdullah al', '01876155755', 'masud@gmail.com', '123548979871817/7', '87/972355', 'Shymoli', 'kazi-abdullah-al-2020-02-26-5e5628c843bd4.jpeg', '2020-02-25 02:28:05', '2020-02-26 02:14:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `owner_advances`
--

CREATE TABLE `owner_advances` (
  `id` int(10) UNSIGNED NOT NULL,
  `owner_id` int(10) UNSIGNED NOT NULL,
  `counter_id` int(10) UNSIGNED NOT NULL,
  `taka` double(20,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `owner_advances`
--

INSERT INTO `owner_advances` (`id`, `owner_id`, `counter_id`, `taka`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 3, 30000.00, '2020-02-25 04:25:09', '2020-02-25 05:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `owner_buses`
--

CREATE TABLE `owner_buses` (
  `id` int(10) UNSIGNED NOT NULL,
  `owner_id` int(10) UNSIGNED NOT NULL,
  `bus_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `owner_buses`
--

INSERT INTO `owner_buses` (`id`, `owner_id`, `bus_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '2020-02-25 02:30:16', '2020-02-25 02:30:16', NULL),
(2, 1, 1, '2020-02-25 02:55:12', '2020-02-25 02:56:52', NULL);

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
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `id` int(10) UNSIGNED NOT NULL,
  `sender_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cell_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_earns`
--

CREATE TABLE `ticket_earns` (
  `id` int(10) UNSIGNED NOT NULL,
  `counter_id` int(10) UNSIGNED DEFAULT NULL,
  `total_ticket` int(11) DEFAULT NULL,
  `per_ticket_price` double(16,2) DEFAULT NULL,
  `total_amount` double(30,2) DEFAULT NULL,
  `shift` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_earns`
--

INSERT INTO `ticket_earns` (`id`, `counter_id`, `total_ticket`, `per_ticket_price`, `total_amount`, `shift`, `created_at`, `updated_at`, `deleted_at`) VALUES
(24, 1, 100, 10.00, NULL, '1', '2020-03-04 04:41:11', '2020-03-04 04:41:11', NULL),
(25, 2, NULL, NULL, NULL, '1', '2020-03-04 04:43:17', '2020-03-04 04:43:17', NULL),
(26, 2, NULL, NULL, NULL, '1', '2020-03-04 04:43:18', '2020-03-04 04:43:18', NULL),
(27, 2, 1000, 10.00, NULL, '1', '2020-03-04 04:52:26', '2020-03-04 04:52:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `today_bus_checks`
--

CREATE TABLE `today_bus_checks` (
  `id` int(10) UNSIGNED NOT NULL,
  `cheacker_id` int(10) UNSIGNED NOT NULL,
  `checkpost_id` int(10) UNSIGNED NOT NULL,
  `bus_id` int(10) UNSIGNED NOT NULL,
  `check_date` date DEFAULT NULL,
  `check_time` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `today_bus_checks`
--

INSERT INTO `today_bus_checks` (`id`, `cheacker_id`, `checkpost_id`, `bus_id`, `check_date`, `check_time`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, NULL, NULL, '2020-02-26 05:03:12', '2020-02-26 05:03:12', NULL),
(2, 1, 1, 1, '2020-02-26', '17:28:00', '2020-02-26 05:05:38', '2020-02-26 05:05:38', NULL),
(3, 2, 2, 2, '2020-02-26', '13:17:00', '2020-02-26 05:07:13', '2020-02-26 05:07:13', NULL),
(4, 1, 1, 1, NULL, NULL, '2020-02-29 00:03:09', '2020-02-29 00:03:09', NULL),
(5, 1, 1, 1, '2020-02-29', '06:02:39', '2020-02-29 00:06:39', '2020-02-29 00:06:39', NULL),
(6, 2, 3, 2, '2020-02-12', '12:04:00', '2020-02-29 00:21:20', '2020-02-29 00:30:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `today_driver_helpers`
--

CREATE TABLE `today_driver_helpers` (
  `id` int(10) UNSIGNED NOT NULL,
  `driver_id` int(10) UNSIGNED NOT NULL,
  `helper_id` int(10) UNSIGNED NOT NULL,
  `bus_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `today_driver_helpers`
--

INSERT INTO `today_driver_helpers` (`id`, `driver_id`, `helper_id`, `bus_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 3, 1, '2020-02-26 03:15:59', '2020-02-26 03:52:07', NULL),
(2, 1, 3, 1, '2020-02-26 03:38:20', '2020-02-26 03:52:34', '2020-02-26 03:52:34'),
(3, 1, 3, 2, '2020-02-26 03:42:30', '2020-02-26 03:52:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roll_id` int(11) DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `roll_id`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SuperAdmin', 'superadmin@gmail.com', NULL, '$2y$10$IdvYTXvOGXV7ibrYLGE04.9rb88b8flr4Wq1gp7QlYSwZJbSLNI4W', NULL, '2020-02-25 02:05:48', '2020-02-25 02:05:48', NULL),
(2, 'Admin', 'admin@gmail.com', NULL, '$2y$10$kFc0l6M0tUgD273NcyPEwuKreQClJW6hNyrVrwMjjGVDemTS8GuTW', NULL, '2020-02-25 02:05:48', '2020-02-25 02:05:48', NULL),
(3, 'users', 'users@gmail.com', NULL, '$2y$10$ZGUwQotxXF9QCDYoUdxUeunJqXC3.cigBq90EoOdPNj9rZ9kZld3e', '62dep62sUMG8KT3QDTnIBOjtJoyJ9RGXotPedYTS17rCzWqLq0ocSDeRL77T', '2020-02-25 02:05:48', '2020-02-25 02:05:48', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessories_earns`
--
ALTER TABLE `accessories_earns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accessories_earns_counter_id_foreign` (`counter_id`);

--
-- Indexes for table `all_bus_costs`
--
ALTER TABLE `all_bus_costs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `all_bus_costs_bus_id_foreign` (`bus_id`),
  ADD KEY `all_bus_costs_gp_cost_add_id_foreign` (`gp_cost_add_id`),
  ADD KEY `all_bus_costs_driver_salarie_id_foreign` (`driver_salarie_id`),
  ADD KEY `all_bus_costs_cost_add_id_foreign` (`cost_add_id`);

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `buses_number_unique` (`number`);

--
-- Indexes for table `bus_trip_numbers`
--
ALTER TABLE `bus_trip_numbers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bus_trip_numbers_bus_id_foreign` (`bus_id`);

--
-- Indexes for table `checker_infos`
--
ALTER TABLE `checker_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checker_salaries`
--
ALTER TABLE `checker_salaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `checker_salaries_checker_id_foreign` (`checker_id`),
  ADD KEY `checker_salaries_counter_id_foreign` (`counter_id`);

--
-- Indexes for table `check_posts`
--
ALTER TABLE `check_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cost_adds`
--
ALTER TABLE `cost_adds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cost_adds_bus_id_foreign` (`bus_id`),
  ADD KEY `cost_adds_cost_id_foreign` (`cost_id`);

--
-- Indexes for table `cost_lists`
--
ALTER TABLE `cost_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counters`
--
ALTER TABLE `counters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counter_costs`
--
ALTER TABLE `counter_costs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `counter_costs_counter_id_foreign` (`counter_id`),
  ADD KEY `counter_costs_counterman_salary_id_foreign` (`counterman_salary_id`),
  ADD KEY `counter_costs_helper_salary_id_foreign` (`helper_salary_id`),
  ADD KEY `counter_costs_checker_salaries_id_foreign` (`checker_salaries_id`),
  ADD KEY `counter_costs_counter_cost_add_id_foreign` (`counter_cost_add_id`);

--
-- Indexes for table `counter_cost_adds`
--
ALTER TABLE `counter_cost_adds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `counter_cost_adds_counter_id_foreign` (`counter_id`),
  ADD KEY `counter_cost_adds_counter_cost_id_foreign` (`counter_cost_id`);

--
-- Indexes for table `counter_cost_lists`
--
ALTER TABLE `counter_cost_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counter_man_infos`
--
ALTER TABLE `counter_man_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counter_man_salaries`
--
ALTER TABLE `counter_man_salaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `counter_man_salaries_counterman_id_foreign` (`counterman_id`),
  ADD KEY `counter_man_salaries_counter_id_foreign` (`counter_id`);

--
-- Indexes for table `driver_infos`
--
ALTER TABLE `driver_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_salaries`
--
ALTER TABLE `driver_salaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `driver_salaries_driver_id_foreign` (`driver_id`),
  ADD KEY `driver_salaries_bus_id_foreign` (`bus_id`);

--
-- Indexes for table `earns`
--
ALTER TABLE `earns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `earns_counter_id_foreign` (`counter_id`),
  ADD KEY `earns_ticket_id_foreign` (`ticket_id`),
  ADD KEY `earns_access_id_foreign` (`access_id`);

--
-- Indexes for table `gp_cost_adds`
--
ALTER TABLE `gp_cost_adds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gp_cost_adds_bus_id_foreign` (`bus_id`);

--
-- Indexes for table `helper_infos`
--
ALTER TABLE `helper_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `helper_salaries`
--
ALTER TABLE `helper_salaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `helper_salaries_helper_id_foreign` (`helper_id`),
  ADD KEY `helper_salaries_counter_id_foreign` (`counter_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owner_advances`
--
ALTER TABLE `owner_advances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner_advances_owner_id_foreign` (`owner_id`),
  ADD KEY `owner_advances_counter_id_foreign` (`counter_id`);

--
-- Indexes for table `owner_buses`
--
ALTER TABLE `owner_buses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner_buses_owner_id_foreign` (`owner_id`),
  ADD KEY `owner_buses_bus_id_foreign` (`bus_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_earns`
--
ALTER TABLE `ticket_earns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_earns_counter_id_foreign` (`counter_id`);

--
-- Indexes for table `today_bus_checks`
--
ALTER TABLE `today_bus_checks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `today_bus_checks_cheacker_id_foreign` (`cheacker_id`),
  ADD KEY `today_bus_checks_checkpost_id_foreign` (`checkpost_id`),
  ADD KEY `today_bus_checks_bus_id_foreign` (`bus_id`);

--
-- Indexes for table `today_driver_helpers`
--
ALTER TABLE `today_driver_helpers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `today_driver_helpers_driver_id_foreign` (`driver_id`),
  ADD KEY `today_driver_helpers_helper_id_foreign` (`helper_id`),
  ADD KEY `today_driver_helpers_bus_id_foreign` (`bus_id`);

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
-- AUTO_INCREMENT for table `accessories_earns`
--
ALTER TABLE `accessories_earns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `all_bus_costs`
--
ALTER TABLE `all_bus_costs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bus_trip_numbers`
--
ALTER TABLE `bus_trip_numbers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `checker_infos`
--
ALTER TABLE `checker_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `checker_salaries`
--
ALTER TABLE `checker_salaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `check_posts`
--
ALTER TABLE `check_posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cost_adds`
--
ALTER TABLE `cost_adds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cost_lists`
--
ALTER TABLE `cost_lists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `counters`
--
ALTER TABLE `counters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `counter_costs`
--
ALTER TABLE `counter_costs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `counter_cost_adds`
--
ALTER TABLE `counter_cost_adds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `counter_cost_lists`
--
ALTER TABLE `counter_cost_lists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `counter_man_infos`
--
ALTER TABLE `counter_man_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `counter_man_salaries`
--
ALTER TABLE `counter_man_salaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `driver_infos`
--
ALTER TABLE `driver_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `driver_salaries`
--
ALTER TABLE `driver_salaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `earns`
--
ALTER TABLE `earns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gp_cost_adds`
--
ALTER TABLE `gp_cost_adds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `helper_infos`
--
ALTER TABLE `helper_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `helper_salaries`
--
ALTER TABLE `helper_salaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `owner_advances`
--
ALTER TABLE `owner_advances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `owner_buses`
--
ALTER TABLE `owner_buses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_earns`
--
ALTER TABLE `ticket_earns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `today_bus_checks`
--
ALTER TABLE `today_bus_checks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `today_driver_helpers`
--
ALTER TABLE `today_driver_helpers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accessories_earns`
--
ALTER TABLE `accessories_earns`
  ADD CONSTRAINT `accessories_earns_counter_id_foreign` FOREIGN KEY (`counter_id`) REFERENCES `counters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `all_bus_costs`
--
ALTER TABLE `all_bus_costs`
  ADD CONSTRAINT `all_bus_costs_bus_id_foreign` FOREIGN KEY (`bus_id`) REFERENCES `buses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `all_bus_costs_cost_add_id_foreign` FOREIGN KEY (`cost_add_id`) REFERENCES `cost_adds` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `all_bus_costs_driver_salarie_id_foreign` FOREIGN KEY (`driver_salarie_id`) REFERENCES `driver_salaries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `all_bus_costs_gp_cost_add_id_foreign` FOREIGN KEY (`gp_cost_add_id`) REFERENCES `gp_cost_adds` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bus_trip_numbers`
--
ALTER TABLE `bus_trip_numbers`
  ADD CONSTRAINT `bus_trip_numbers_bus_id_foreign` FOREIGN KEY (`bus_id`) REFERENCES `buses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `checker_salaries`
--
ALTER TABLE `checker_salaries`
  ADD CONSTRAINT `checker_salaries_checker_id_foreign` FOREIGN KEY (`checker_id`) REFERENCES `checker_infos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `checker_salaries_counter_id_foreign` FOREIGN KEY (`counter_id`) REFERENCES `counters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cost_adds`
--
ALTER TABLE `cost_adds`
  ADD CONSTRAINT `cost_adds_bus_id_foreign` FOREIGN KEY (`bus_id`) REFERENCES `buses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cost_adds_cost_id_foreign` FOREIGN KEY (`cost_id`) REFERENCES `cost_lists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `counter_costs`
--
ALTER TABLE `counter_costs`
  ADD CONSTRAINT `counter_costs_checker_salaries_id_foreign` FOREIGN KEY (`checker_salaries_id`) REFERENCES `checker_salaries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `counter_costs_counter_cost_add_id_foreign` FOREIGN KEY (`counter_cost_add_id`) REFERENCES `counter_cost_adds` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `counter_costs_counter_id_foreign` FOREIGN KEY (`counter_id`) REFERENCES `counters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `counter_costs_counterman_salary_id_foreign` FOREIGN KEY (`counterman_salary_id`) REFERENCES `counter_man_salaries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `counter_costs_helper_salary_id_foreign` FOREIGN KEY (`helper_salary_id`) REFERENCES `helper_salaries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `counter_cost_adds`
--
ALTER TABLE `counter_cost_adds`
  ADD CONSTRAINT `counter_cost_adds_counter_cost_id_foreign` FOREIGN KEY (`counter_cost_id`) REFERENCES `counter_cost_lists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `counter_cost_adds_counter_id_foreign` FOREIGN KEY (`counter_id`) REFERENCES `counters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `counter_man_salaries`
--
ALTER TABLE `counter_man_salaries`
  ADD CONSTRAINT `counter_man_salaries_counter_id_foreign` FOREIGN KEY (`counter_id`) REFERENCES `counters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `counter_man_salaries_counterman_id_foreign` FOREIGN KEY (`counterman_id`) REFERENCES `counter_man_infos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `driver_salaries`
--
ALTER TABLE `driver_salaries`
  ADD CONSTRAINT `driver_salaries_bus_id_foreign` FOREIGN KEY (`bus_id`) REFERENCES `buses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `driver_salaries_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `driver_infos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `earns`
--
ALTER TABLE `earns`
  ADD CONSTRAINT `earns_access_id_foreign` FOREIGN KEY (`access_id`) REFERENCES `accessories_earns` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `earns_counter_id_foreign` FOREIGN KEY (`counter_id`) REFERENCES `counters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `earns_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `ticket_earns` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gp_cost_adds`
--
ALTER TABLE `gp_cost_adds`
  ADD CONSTRAINT `gp_cost_adds_bus_id_foreign` FOREIGN KEY (`bus_id`) REFERENCES `buses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `helper_salaries`
--
ALTER TABLE `helper_salaries`
  ADD CONSTRAINT `helper_salaries_counter_id_foreign` FOREIGN KEY (`counter_id`) REFERENCES `counters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `helper_salaries_helper_id_foreign` FOREIGN KEY (`helper_id`) REFERENCES `helper_infos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `owner_advances`
--
ALTER TABLE `owner_advances`
  ADD CONSTRAINT `owner_advances_counter_id_foreign` FOREIGN KEY (`counter_id`) REFERENCES `counters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `owner_advances_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `owners` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `owner_buses`
--
ALTER TABLE `owner_buses`
  ADD CONSTRAINT `owner_buses_bus_id_foreign` FOREIGN KEY (`bus_id`) REFERENCES `buses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `owner_buses_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `owners` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket_earns`
--
ALTER TABLE `ticket_earns`
  ADD CONSTRAINT `ticket_earns_counter_id_foreign` FOREIGN KEY (`counter_id`) REFERENCES `counters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `today_bus_checks`
--
ALTER TABLE `today_bus_checks`
  ADD CONSTRAINT `today_bus_checks_bus_id_foreign` FOREIGN KEY (`bus_id`) REFERENCES `buses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `today_bus_checks_cheacker_id_foreign` FOREIGN KEY (`cheacker_id`) REFERENCES `checker_infos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `today_bus_checks_checkpost_id_foreign` FOREIGN KEY (`checkpost_id`) REFERENCES `check_posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `today_driver_helpers`
--
ALTER TABLE `today_driver_helpers`
  ADD CONSTRAINT `today_driver_helpers_bus_id_foreign` FOREIGN KEY (`bus_id`) REFERENCES `buses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `today_driver_helpers_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `driver_infos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `today_driver_helpers_helper_id_foreign` FOREIGN KEY (`helper_id`) REFERENCES `helper_infos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
