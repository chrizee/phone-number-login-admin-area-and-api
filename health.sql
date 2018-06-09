-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2018 at 08:49 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `health`
--

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(10) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialist_id` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `message`, `specialist_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'test', NULL, NULL, '2018-06-05 18:35:18', '2018-06-05 18:35:18'),
(2, 'testerrfv', 1, NULL, '2018-06-05 18:37:13', '2018-06-05 18:37:13'),
(3, 'test efe is a go', 1, NULL, '2018-06-05 18:41:17', '2018-06-05 18:41:17'),
(4, 'test efe is a go', 2, NULL, '2018-06-05 18:42:24', '2018-06-05 18:42:24'),
(5, 'test efe is a goal', 2, NULL, '2018-06-05 18:43:34', '2018-06-05 18:43:34'),
(7, 'last test', 2, NULL, '2018-06-05 18:46:26', '2018-06-05 18:46:26');

-- --------------------------------------------------------

--
-- Table structure for table `first_aids`
--

CREATE TABLE `first_aids` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `first_aids`
--

INSERT INTO `first_aids` (`id`, `title`, `body`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'title', '<p><br />\r\nbody</p>', 'firstaid/firstaid_1528069388.jpg', NULL, '2018-06-03 22:43:08', '2018-06-03 22:43:08'),
(2, 'test', '<p><br />\r\ntest bodytest bodytest bodytest bodytest bodytest bodytest bodytest bodytest body</p>\r\n\r\n<p><br />\r\ntest bodytest bodytest bodytest bodytest bodytest bodytest bodytest bodytest body</p>\r\n\r\n<p><br />\r\ntest bodytest bodytest bodytest bodytest bodytest bodytest bodytest bodytest body</p>\r\n\r\n<p><br />\r\ntest bodytest bodytest bodytest bodytest bodytest bodytest bodytest bodytest body</p>\r\n\r\n<p><br />\r\ntest bodytest bodytest bodytest bodytest bodytest bodytest bodytest bodytest body</p>\r\n\r\n<p><br />\r\ntest bodytest bodytest bodytest bodytest bodytest bodytest bodytest bodytest body</p>\r\n\r\n<p><br />\r\ntest bodytest bodytest bodytest bodytest bodytest bodytest bodytest bodytest body</p>\r\n\r\n<p><br />\r\ntest bodytest bodytest bodytest bodytest bodytest bodytest bodytest bodytest body</p>\r\n\r\n<p><br />\r\ntest bodytest bodytest bodytest bodytest bodytest bodytest bodytest bodytest body</p>\r\n\r\n<p><br />\r\ntest bodytest bodytest bodytest bodytest bodytest bodytest bodytest bodytest body</p>', 'firstaid/firstaid_1528069671.jpg', NULL, '2018-06-03 22:47:51', '2018-06-04 22:21:52'),
(3, 'accident', '<p><br />\r\nuwdnckaxn djsvbda xm sdjlvnad nx f joasn amcdj n&nbsp; on asm</p>', 'firstaid/firstaid_1528213862.png', NULL, '2018-06-05 14:50:31', '2018-06-05 14:51:02');

-- --------------------------------------------------------

--
-- Table structure for table `health_locations`
--

CREATE TABLE `health_locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `units` mediumtext COLLATE utf8mb4_unicode_ci,
  `services` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_lines` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `health_locations`
--

INSERT INTO `health_locations` (`id`, `name`, `description`, `units`, `services`, `email`, `emergency_lines`, `location`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'UBTH', 'a teaching hospital', 'surgery, Morge', 'all health services', 'hospital@ubth.com', '08182642340', 'Ugbowo, Benin city, Edo state, Nigeria.', NULL, '2018-06-04 21:35:44', '2018-06-04 21:48:28'),
(2, 'DelsuTh', 'a general hospital', 'all medical units', 'all medical services', 'delsuth@hospital.com', '08182642340', 'warri', NULL, '2018-06-04 21:44:38', '2018-06-04 21:47:10');

-- --------------------------------------------------------

--
-- Table structure for table `health_tips`
--

CREATE TABLE `health_tips` (
  `id` int(10) UNSIGNED NOT NULL,
  `tip` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `health_tips`
--

INSERT INTO `health_tips` (`id`, `tip`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '<p>tipwqdqw</p>', 'healthtips/healthtip_1528098033.jpg', '2018-06-04 06:40:47', '2018-06-04 06:38:03', '2018-06-04 06:40:47'),
(2, '<p>test bodytest bodytest bodytest bodytest bodytest bodytest bodytest bodytest body</p>', 'healthtips/healthtip_1528213955.png', NULL, '2018-06-04 22:22:52', '2018-06-05 14:52:35');

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
(3, '2018_06_03_181032_create_specialists_table', 1),
(4, '2018_06_03_184653_create_first_aids_table', 1),
(5, '2018_06_03_184821_create_health_tips_table', 1),
(6, '2018_06_03_185005_create_health_locations_table', 1),
(7, '2018_06_03_185120_create_chats_table', 1);

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
-- Table structure for table `specialists`
--

CREATE TABLE `specialists` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialties` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specialists`
--

INSERT INTO `specialists` (`id`, `name`, `email`, `password`, `location`, `specialties`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Dr. okoro efe (phD)', 'efe@gmail.comef', '$2y$10$U8DIiN1Yjx5YsalBUZShkenav/dmV.2ePQ6ExMC4wC3big3gruuwu', 'University of Benin teaching hospital, Benin city, Edo state.', 'cardio, Neuro, Ortho, General surgery', 'specialists/specialist_1528148043.png', NULL, '2018-06-04 20:34:04', '2018-06-04 21:47:15'),
(2, 'okoro elohor', 'elohor@gmail.com', '$2y$10$rGeRjW81LHtxY/QU/3Nif.uQK1r30kjRYOgxJGoV4pbwhY3BumLBO', 'warri general hospital', 'cardio', 'specialists/specialist_1528149248.png', NULL, '2018-06-04 20:54:09', '2018-06-04 20:54:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `pic`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@health.com', '$2y$10$Tr12Kri86l2yKu4JNYzk5essZsjg1LTdCKAZlToCP1Rs0oCC6vSty', 'user_1528153417.png', 'kHe6uvNaZ2D2MOtb1Fc09190ygum6AN8FbBWbLxSlNPbQjh3hIgeXtuColnz', '2018-06-03 20:18:02', '2018-06-04 22:03:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chats_specialist_id_foreign` (`specialist_id`);

--
-- Indexes for table `first_aids`
--
ALTER TABLE `first_aids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `health_locations`
--
ALTER TABLE `health_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `health_tips`
--
ALTER TABLE `health_tips`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `specialists`
--
ALTER TABLE `specialists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `specialists_email_unique` (`email`);

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
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `first_aids`
--
ALTER TABLE `first_aids`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `health_locations`
--
ALTER TABLE `health_locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `health_tips`
--
ALTER TABLE `health_tips`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `specialists`
--
ALTER TABLE `specialists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_specialist_id_foreign` FOREIGN KEY (`specialist_id`) REFERENCES `specialists` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
