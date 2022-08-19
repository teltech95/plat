-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2022 at 11:20 AM
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
-- Database: `ssb_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `batchs`
--

CREATE TABLE `batchs` (
  `id` int(11) NOT NULL,
  `batch` varchar(255) DEFAULT NULL,
  `createdAt` date DEFAULT current_timestamp(),
  `code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `batchs`
--

INSERT INTO `batchs` (`id`, `batch`, `createdAt`, `code`) VALUES
(1, 'C:\\xampp\\tmp\\php8388.tmp', '2022-08-17', '1733'),
(2, 'C:\\xampp\\tmp\\php78A8.tmp', '2022-08-17', '1733');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`name`, `code`, `description`, `id`, `user`) VALUES
('ghadsghsd3', '31231', 'dcacascc', 6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `deduction`
--

CREATE TABLE `deduction` (
  `record_ID` int(10) NOT NULL,
  `code` bigint(20) DEFAULT NULL,
  `request_status` int(11) DEFAULT 0,
  `request_type` int(11) DEFAULT NULL,
  `ec_number` varchar(10) DEFAULT NULL,
  `id_number` varchar(10) DEFAULT NULL,
  `transaction_reference` varchar(10) DEFAULT NULL,
  `deductions_start_date` varchar(20) DEFAULT NULL,
  `deductions_end_date` varchar(20) DEFAULT NULL,
  `installment_amount` decimal(20,0) DEFAULT NULL,
  `createdAt` date DEFAULT current_timestamp(),
  `first_name` varchar(255) DEFAULT NULL,
  `total_amount` decimal(20,0) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deduction`
--

INSERT INTO `deduction` (`record_ID`, `code`, `request_status`, `request_type`, `ec_number`, `id_number`, `transaction_reference`, `deductions_start_date`, `deductions_end_date`, `installment_amount`, `createdAt`, `first_name`, `total_amount`, `last_name`) VALUES
(7795, 800184005, 1, 0, '7447', '764563', '345262462', '2022-08-22', '2022-10-31', '45', '2022-08-18', NULL, NULL, NULL),
(7796, 800184005, 1, 0, '12354', '23432345', '234234', '2022-08-18', '2022-08-31', '1000', '2022-08-18', NULL, NULL, NULL),
(7797, 800184005, 0, 0, '123432', '123422', '23421', '2022-08-19', '2022-08-31', '9999', '2022-08-18', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `deduction_payment`
--

CREATE TABLE `deduction_payment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `organisation` varchar(20) DEFAULT '0.0',
  `jan` decimal(20,0) DEFAULT 0,
  `feb` decimal(20,0) DEFAULT 0,
  `mar` decimal(20,0) DEFAULT 0,
  `april` decimal(20,0) DEFAULT 0,
  `may` decimal(20,0) DEFAULT 0,
  `jun` decimal(20,0) DEFAULT 0,
  `jul` decimal(20,0) DEFAULT 0,
  `aug` decimal(20,0) DEFAULT 0,
  `sept` decimal(20,0) DEFAULT 0,
  `oct` decimal(20,0) DEFAULT 0,
  `nov` decimal(20,0) DEFAULT 0,
  `dec` decimal(20,0) DEFAULT 0,
  `year` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deduction_payment`
--

INSERT INTO `deduction_payment` (`id`, `user_id`, `organisation`, `jan`, `feb`, `mar`, `april`, `may`, `jun`, `jul`, `aug`, `sept`, `oct`, `nov`, `dec`, `year`) VALUES
(1, 3, 'PSMAS', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2020');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request_status`
--

CREATE TABLE `request_status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request_status`
--

INSERT INTO `request_status` (`id`, `name`) VALUES
(0, 'Pending'),
(1, 'Approved'),
(2, 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `company`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, 1, NULL, '$2y$10$.YR4FM.wF5lJTymmKD1/DO6EO5XI/eBOME/x2ceJdZoCNw8FwalHm', NULL, '2022-08-19 07:15:36', '2022-08-19 07:15:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batchs`
--
ALTER TABLE `batchs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deduction`
--
ALTER TABLE `deduction`
  ADD PRIMARY KEY (`record_ID`);

--
-- Indexes for table `deduction_payment`
--
ALTER TABLE `deduction_payment`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `request_status`
--
ALTER TABLE `request_status`
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
-- AUTO_INCREMENT for table `batchs`
--
ALTER TABLE `batchs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `deduction`
--
ALTER TABLE `deduction`
  MODIFY `record_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7798;

--
-- AUTO_INCREMENT for table `deduction_payment`
--
ALTER TABLE `deduction_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request_status`
--
ALTER TABLE `request_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
