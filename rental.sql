-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2022 at 04:06 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mechanic_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'none',
  `appointment_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `mechanic_id`, `user_id`, `date`, `message`, `appointment_status`, `payment_method`, `payment_status`, `created_at`, `updated_at`) VALUES
(2, 2, 2, 'Fri 18 Mar 2022', 'uuu', 'requested', 'payment on arrival', 'unpaid', '2022-03-17 01:22:41', '2022-03-17 01:22:44'),
(3, 1, 2, 'Fri 22 Apr 2022', 'urgent', 'cancelled', 'payment on arrival', 'cancelled', '2022-04-21 00:58:39', '2022-04-22 07:26:52'),
(9, 3, 2, 'Wed 27 Apr 2022', 'urgent', 'requested', 'payment on arrival', 'unpaid', '2022-04-24 11:59:30', '2022-04-24 11:59:33');

-- --------------------------------------------------------

--
-- Table structure for table `bikes`
--

CREATE TABLE `bikes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `priceperday` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `thumbnail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img3` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bikes`
--

INSERT INTO `bikes` (`id`, `name`, `description`, `priceperday`, `brand_id`, `thumbnail`, `images`, `img1`, `img2`, `img3`, `created_at`, `updated_at`) VALUES
(1, 'XtremeV2', 'Very Extreme and Fuel Efficient', '80', 2, 'thumbnail.jpg', 'bc2.jpg,bc3.jpg,bc4.jpg', 'bc2.jpg', 'bc3.jpg', 'bc4.jpg', '2022-02-21 10:12:52', '2022-03-12 04:59:53'),
(2, 'Shine', 'Very nice', '70', 3, 'thumbnail.jpg', 'bc2.jpg,bc3.jpg,bc4.jpg', 'bc2.jpg', 'bc3.jpg', 'bc4.jpg', '2022-02-21 10:12:52', '2022-02-21 10:12:52'),
(5, 'Hayabusa', 'Fastest', '150', 2, 'thumbnail.jpg', 'bc21645898457.jpg,bc31645898457.jpg,', '', '', '', '2022-02-26 12:15:57', '2022-02-26 12:15:57'),
(6, 'new bike', 'sdad', '1212', 4, 't1646724122.jpg', 'bc1646724122.png,t1646724122.jpg,', '', '', '', '2022-03-08 01:37:02', '2022-03-17 11:22:31');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `bike_id` bigint(20) UNSIGNED NOT NULL,
  `fromDate` date NOT NULL,
  `toDate` date NOT NULL,
  `days` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rent_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `bike_id`, `fromDate`, `toDate`, `days`, `message`, `total`, `rent_status`, `payment_method`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2022-02-22', '2022-02-23', '1', 'urgent', '75', 'confirmed', 'payment on arrival', 'paid', '2022-02-22 12:13:36', '2022-02-23 03:39:30'),
(3, 2, 2, '2022-02-22', '2022-02-23', '1', 'urgent', '70', 'cancelled', 'payment on arrival', 'returned', '2022-02-22 12:22:16', '2022-02-23 02:38:46'),
(4, 2, 2, '2022-02-22', '2022-02-23', '1', 'uuuu', '70', 'requested', 'payment on arrival', 'unpaid', '2022-02-22 12:26:04', '2022-02-22 12:33:49'),
(5, 2, 1, '2022-02-22', '2022-02-23', '1', 'need', '75', 'requested', 'payment on arrival', 'unpaid', '2022-02-22 12:29:42', '2022-02-22 12:29:52'),
(6, 2, 1, '2022-02-27', '2022-02-28', '1', 'none', '75', 'requested', 'payment on arrival', 'unpaid', '2022-02-27 00:59:26', '2022-03-12 10:50:53'),
(8, 2, 6, '2022-03-12', '2022-03-13', '1', 'asd', '1212', 'requested', 'payment on arrival', 'unpaid', '2022-03-12 10:51:15', '2022-03-12 10:51:24'),
(10, 2, 1, '2022-04-04', '2022-04-06', '2', 'urgent', '160', 'requested', 'payment on arrival', 'unpaid', '2022-04-04 00:53:29', '2022-04-04 00:54:04'),
(11, 2, 1, '2022-04-05', '2022-04-07', '2', 'sdasd', '160', 'requested', 'payment on arrival', 'unpaid', '2022-04-04 02:08:29', '2022-04-04 02:08:42'),
(12, 1, 1, '2022-04-11', '2022-04-13', '2', 'urgent', '160', 'requested', 'payment on arrival', 'unpaid', '2022-04-10 23:28:55', '2022-04-10 23:33:13'),
(13, 2, 1, '2022-04-21', '2022-04-22', '1', 'urgent', '80', 'requested', 'khalti', 'paid', '2022-04-21 00:20:23', '2022-04-21 00:20:41'),
(14, 2, 2, '2022-04-22', '2022-04-23', '1', 'urgent', '70', 'requested', 'payment on arrival', 'unpaid', '2022-04-21 00:57:10', '2022-04-21 00:58:06');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Hero', '2022-02-21 10:11:51', '2022-02-21 10:11:51'),
(3, 'Honda', '2022-02-21 10:11:51', '2022-02-21 10:11:51'),
(4, 'Suzuki', '2022-03-12 07:26:12', '2022-03-12 07:35:53');

-- --------------------------------------------------------

--
-- Table structure for table `chat_lists`
--

CREATE TABLE `chat_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_user` bigint(20) UNSIGNED NOT NULL,
  `to_user` bigint(20) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`id`, `from_user`, `to_user`, `message`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 'Hello', NULL, NULL),
(2, 3, 2, 'Hi', NULL, NULL),
(3, 2, 4, 'hello', '2022-04-19 06:53:59', '2022-04-19 06:53:59'),
(4, 2, 4, 'i need help', '2022-04-19 07:37:17', '2022-04-19 07:37:17'),
(5, 2, 3, 'I have some issues with my motorcycle', '2022-04-21 01:00:29', '2022-04-21 01:00:29'),
(6, 3, 2, 'Yes sir, please tell me about it.', '2022-04-21 01:01:54', '2022-04-21 01:01:54'),
(7, 2, 6, 'hello', '2022-04-21 01:12:41', '2022-04-21 01:12:41'),
(8, 6, 2, 'yes please', '2022-04-21 01:13:11', '2022-04-21 01:13:11');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mechanics`
--

CREATE TABLE `mechanics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img3` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mechanics`
--

INSERT INTO `mechanics` (`id`, `user_id`, `name`, `description`, `experience`, `price`, `thumbnail`, `images`, `img1`, `img2`, `img3`, `created_at`, `updated_at`) VALUES
(1, 3, 'Ram', 'Our Oldest and most efficient staff.', '7 years', '150', 'mech11647191603.jpg', 'mech1.jpg,mech2.jpg,mech3.jpg', 'mech1.jpg', 'mech2.jpg', 'mech3.jpg', '2022-02-21 10:22:53', '2022-03-13 11:28:23'),
(2, 4, 'Shyam', 'our new and young mechanic', '2 years', '200', 'mechthumb.jpg', 'mech1.jpg,mech2.jpg,mech3.jpg', 'mech1.jpg', 'mech2.jpg', 'mech3.jpg', '2022-02-21 10:24:26', '2022-02-21 10:24:26'),
(3, 6, 'Hari', 'Energetic', '3 years', '100', 'mechthumb1647105388.jpg', 'mech11647105388.jpg,mech21647105388.jpg,mech31647105388.jpg,', '', '', '', '2022-03-12 11:31:28', '2022-03-12 11:31:28');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_01_10_070633_add__lisense__to__user', 1),
(6, '2022_01_10_070843_add_phone_to_user', 1),
(7, '2022_01_12_070804_create_brands_table', 1),
(8, '2022_01_12_090048_create_bikes_table', 1),
(9, '2022_01_15_151957_create_bookings_table', 1),
(10, '2022_02_03_080236_add_total_price_bookings', 1),
(11, '2022_02_03_172913_add_days_booking', 1),
(12, '2022_02_10_151813_add_user_type_users', 1),
(13, '2022_02_12_132851_create_reviews_table', 1),
(14, '2022_02_12_150545_create_mechanics_table', 1),
(15, '2022_02_12_173649_create_appointments_table', 1),
(16, '2022_02_14_084552_add_name_mechanic', 1),
(18, '2022_02_25_110146_add_images_bike', 2),
(19, '2022_03_12_162435_add_images_mechanics', 3),
(22, '2022_03_20_040602_create_chat_lists_table', 4),
(23, '2022_03_20_040707_create_chat_messages_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('sita@gmail.com', '$2y$10$rk6PstVtiB.Cs3tKtcvDAOX03KT3dwc8JHi4nZyJ3D/3kbR7nhiqu', '2022-04-07 09:42:19');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bike_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `bike_id`, `user_id`, `review`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'very nice and comfortable', '2022-03-12 09:56:18', '2022-03-12 09:56:18'),
(2, 6, 2, 'super fast and awesome', '2022-03-12 09:56:52', '2022-03-12 09:56:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `license` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `license`, `phone`, `user_type`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test@gmail.com', '998876556', '9876543456', 'user', NULL, '$2y$10$iG93ZD4hEpGeTDXLVnuMvuvalyvxja9FzwFrj5qJamvAcmN2ITTmm', 'j0Gog4HOukAydwHEMyl03yUt3hoKcMroerkrm5D4HxKHGsEu7770KaKIiJi9', '2022-02-21 04:34:47', '2022-04-07 09:44:28'),
(2, 'Roshan', 'roshan@gmail.com', '9878987756', '9878787644', 'user', NULL, '$2y$10$6eenm/Zlb1jC0awdNUBI/upq0ICYbG5NeC.GrZZNxOeeRVrHdXZb2', NULL, '2022-02-21 04:35:38', '2022-04-11 23:33:13'),
(3, 'Ram', 'ram@gmail.com', '', '9878765432', 'mechanic', NULL, '$2y$10$va9XKB8Yv5.SSrxJvAPJUOiSOgNyLvKpDHfyn97bg7rvx/4Bdo9kq', NULL, '2022-02-21 04:36:26', '2022-03-13 11:28:23'),
(4, 'Shyam', 'shyam@gmail.com', '', '9876543211', 'mechanic', NULL, '$2y$10$fZCAmPquNl3OtDUzk8zQEu4eWXnqqUvDAnMqIMmva81RqwKxxJAOG', NULL, '2022-02-21 04:37:02', '2022-02-21 04:37:02'),
(5, 'admin', 'admin@gmail.com', '', '9876545676', 'admin', NULL, '$2y$10$m/0AUFQl/btezq5OuXQc1OCmL9vysvxcSNion44dYAGJovlGvThTi', NULL, '2022-02-22 09:22:02', '2022-02-22 09:22:02'),
(6, 'Hari', 'hari@gmail.com', '', '9876545678', 'mechanic', NULL, '$2y$10$KuWOj.an52Jd96DrpOiPTu1QI5LD9aAOL/ZY0tk5/W0Vns1Iu71ke', NULL, '2022-03-12 11:31:28', '2022-03-12 11:31:28'),
(8, 'sita', 'sita@gmail.com', '1212121212', '9876565434', 'user', NULL, '$2y$10$srOwk/TfAYJiH75ZCwO8we3P9Iug8LyFOfTmdNIns2AbHVtFwtEWG', NULL, '2022-04-01 05:55:50', '2022-04-01 05:55:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_mechanic_id_foreign` (`mechanic_id`),
  ADD KEY `appointments_user_id_foreign` (`user_id`);

--
-- Indexes for table `bikes`
--
ALTER TABLE `bikes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bikes_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `bookings_bike_id_foreign` (`bike_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_lists`
--
ALTER TABLE `chat_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_messages_from_user_foreign` (`from_user`),
  ADD KEY `chat_messages_to_user_foreign` (`to_user`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `mechanics`
--
ALTER TABLE `mechanics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mechanics_user_id_foreign` (`user_id`);

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
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_bike_id_foreign` (`bike_id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bikes`
--
ALTER TABLE `bikes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `chat_lists`
--
ALTER TABLE `chat_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mechanics`
--
ALTER TABLE `mechanics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_mechanic_id_foreign` FOREIGN KEY (`mechanic_id`) REFERENCES `mechanics` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bikes`
--
ALTER TABLE `bikes`
  ADD CONSTRAINT `bikes_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_bike_id_foreign` FOREIGN KEY (`bike_id`) REFERENCES `bikes` (`id`),
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD CONSTRAINT `chat_messages_from_user_foreign` FOREIGN KEY (`from_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `chat_messages_to_user_foreign` FOREIGN KEY (`to_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `mechanics`
--
ALTER TABLE `mechanics`
  ADD CONSTRAINT `mechanics_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_bike_id_foreign` FOREIGN KEY (`bike_id`) REFERENCES `bikes` (`id`),
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
