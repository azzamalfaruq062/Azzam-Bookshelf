-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2022 at 11:36 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book`
--

-- --------------------------------------------------------

--
-- Table structure for table `bukus`
--

CREATE TABLE `bukus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `isbn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penulis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `isi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'show',
  `kategoris_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bukus`
--

INSERT INTO `bukus` (`id`, `isbn`, `judul`, `penulis`, `tanggal`, `isi`, `cover`, `status`, `kategoris_id`, `created_at`, `updated_at`) VALUES
(1, 'A1', 'Naruto 01', 'Admin', '2022-12-04', 'Naruto Uzumaki (うずまきナルト Uzumaki Naruto) yang bergelar Hokage Ketujuh (7番目の火影 Nanadaime Hokage) adalah tokoh utama dari serial anime dan manga Naruto. Ia merupakan tokoh utama dalam serial ini. Ia digambarkan sebagai bocah berambut pirang dan bermata biru. Di pipinya ada semacam guratan yang mirip seperti kumis milik karakter Doraemon dalam manga Doraemon. Ia sering terlihat memakai jaket dan celana panjang berwarna jingga. Di dahinya ada ikat kepala berwarna biru dengan lambang desa kelahirannya.', 'img/Vlc5pKOKlLFYMjKzn91nYsjAdVnSBCOybI4QL7vF.jpg', 'show', 1, '2022-12-04 01:55:41', '2022-12-04 01:55:41'),
(2, 'A2', 'Naruto 03', 'Admin', '2022-12-05', 'manga naruto', 'img/3q2uLsSuYe1r71KZJyckG1tO6a4n5MXt3gHfpekN.jpg', 'show', 1, '2022-12-04 03:28:55', '2022-12-04 03:28:55'),
(3, 'A3', 'Naruto 03', 'Admin', '1111-11-11', 'isi majalah', 'img/wKkaw7FyHwmo4Ym1HJ3iQEpzZKHmrMXtqVWFfU6e.jpg', 'show', 2, '2022-12-04 03:29:23', '2022-12-04 03:29:23'),
(4, 'A4', 'Negri 5 Menara', 'Admin', '1999-11-21', 'manga', 'img/PwERKhimZhnyTmjzlLO9YebR9D1intOuZBc7VZwH.jpg', 'show', 3, '2022-12-04 03:29:57', '2022-12-04 03:29:57');

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
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Manga', '2022-12-04 01:54:43', '2022-12-04 01:54:43'),
(2, 'Majalah', '2022-12-04 01:54:51', '2022-12-04 01:54:51'),
(3, 'Novel', '2022-12-04 01:54:58', '2022-12-04 01:54:58');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_12_04_073404_create_kategoris_table', 1),
(6, '2022_12_04_073534_create_bukus_table', 1),
(7, '2022_12_04_073803_create_pembacas_table', 1);

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
-- Table structure for table `pembacas`
--

CREATE TABLE `pembacas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pembaca` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukus_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembacas`
--

INSERT INTO `pembacas` (`id`, `pembaca`, `bukus_id`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 1, '2022-12-04 02:03:59', '2022-12-04 02:03:59'),
(2, 'Admin', 3, '2022-12-04 03:30:35', '2022-12-04 03:30:35'),
(3, 'Editor', 2, '2022-12-04 03:32:45', '2022-12-04 03:32:45');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@g.c', NULL, '$2y$10$KLVfp29Fe6b41lTJ3EuwS.8t6SuT9fBZ81VMSLreujTX/mI0/43ou', 'admin', 'aktif', NULL, '2022-12-04 01:37:20', '2022-12-04 01:37:20'),
(2, 'Editor', 'editor@g.c', NULL, '$2y$10$EZdictHD8AO7jBpM43xhbuP01JoKhZY0QQOD91qc/VYpcnjfST972', 'editor', 'aktif', NULL, '2022-12-04 01:37:35', '2022-12-04 01:37:35'),
(3, 'User', 'user@g.c', NULL, '$2y$10$SjJsM3eAVJeUEMxmc/MBaux6IlB93F35xTF4.l7qJqQEe74MSc2aW', 'User', 'aktif', NULL, '2022-12-04 01:37:47', '2022-12-04 01:37:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bukus`
--
ALTER TABLE `bukus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bukus_isbn_unique` (`isbn`),
  ADD KEY `bukus_kategoris_id_foreign` (`kategoris_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
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
-- Indexes for table `pembacas`
--
ALTER TABLE `pembacas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembacas_bukus_id_foreign` (`bukus_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `bukus`
--
ALTER TABLE `bukus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pembacas`
--
ALTER TABLE `pembacas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bukus`
--
ALTER TABLE `bukus`
  ADD CONSTRAINT `bukus_kategoris_id_foreign` FOREIGN KEY (`kategoris_id`) REFERENCES `kategoris` (`id`);

--
-- Constraints for table `pembacas`
--
ALTER TABLE `pembacas`
  ADD CONSTRAINT `pembacas_bukus_id_foreign` FOREIGN KEY (`bukus_id`) REFERENCES `bukus` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
