-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 15, 2024 at 12:17 PM
-- Server version: 8.0.36
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apibeckdemo_jitsu`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint UNSIGNED NOT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mission` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `icon`, `mission`, `status`, `created_at`, `updated_at`) VALUES
(1, '[{\"icon_image\":\"icon_images\\/DzwxFvYHqQQimasOuhsCOokXLYDVf2mQwVZ9BCRI.png\",\"icon_link\":\"https:\\/\\/youtube.com\\/@Brain-Jiu-Jitsu?si=nWgPebq09SQhbdwV\"}]', 'The Brain-Jiu-Jitsu (BJJ) app is a visual representation of the Brazilian Jiu-Jitsu skill acquisition process organized into a network of skills and techniques. \r\nIt will have a specific way to guide the users in learning those techniques in the form of layer categories and useful information uploaded by the admin for the users in the form of videos and description.', 1, '2023-12-12 06:01:52', '2024-03-09 15:51:30');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@jitsu.com', '$2y$12$M9xcbeBq47/xf0bYvBWfluK9aWvd9f4.xgVYRBaDUiLFEl8gw1jKO', '2023-11-29 13:44:55', '2023-11-29 13:44:55');

-- --------------------------------------------------------

--
-- Table structure for table `assessment_l2_s`
--

CREATE TABLE `assessment_l2_s` (
  `id` bigint UNSIGNED NOT NULL,
  `sub_assessment_id` bigint UNSIGNED NOT NULL,
  `order_number` int DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` text COLLATE utf8mb4_unicode_ci,
  `video` text COLLATE utf8mb4_unicode_ci,
  `youtube_link` text COLLATE utf8mb4_unicode_ci,
  `skill_point` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assessment_l2_s`
--

INSERT INTO `assessment_l2_s` (`id`, `sub_assessment_id`, `order_number`, `title`, `thumbnail`, `video`, `youtube_link`, `skill_point`, `type`, `status`, `created_at`, `updated_at`) VALUES
(18, 3, 1, 'Flower sweep', 'storage/child_assessments/thumbnail/OnIqvV.png', NULL, 'https://www.youtube.com/watch?v=zSF5RcjQYdI', 'Test', 'Mastered', 1, '2024-03-15 14:38:23', '2024-04-05 08:52:16');

-- --------------------------------------------------------

--
-- Table structure for table `belt_ranks`
--

CREATE TABLE `belt_ranks` (
  `id` bigint UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `belt_ranks`
--

INSERT INTO `belt_ranks` (`id`, `image`, `title`, `created_at`, `updated_at`) VALUES
(1, 'storage/belt_rank/pJrmC0.PNG', 'White', '2024-03-12 12:24:43', '2024-03-15 13:04:12'),
(2, 'storage/belt_rank/cjkJrf.PNG', 'Grey White', '2024-03-12 12:25:11', '2024-03-12 12:25:11'),
(3, 'storage/belt_rank/EtpXE8.PNG', 'Grey', '2024-03-12 12:26:10', '2024-03-12 12:26:10'),
(4, 'storage/belt_rank/JJrnzw.PNG', 'Grey Black', '2024-03-12 12:27:16', '2024-03-12 12:27:16'),
(5, 'storage/belt_rank/LxyXLs.PNG', 'Yellow White', '2024-03-12 12:27:49', '2024-03-12 12:27:49'),
(6, 'storage/belt_rank/IzSqFT.PNG', 'Yellow', '2024-03-12 12:28:05', '2024-03-12 12:28:05'),
(7, 'storage/belt_rank/jZTobT.PNG', 'Yellow Black', '2024-03-12 12:28:45', '2024-03-12 12:28:45'),
(8, 'storage/belt_rank/5uE3vr.PNG', 'Orange White', '2024-03-12 12:29:08', '2024-03-12 12:29:08'),
(9, 'storage/belt_rank/3FxVWT.PNG', 'Orange', '2024-03-12 12:29:26', '2024-03-12 12:29:26'),
(10, 'storage/belt_rank/7Qo9kY.PNG', 'Orange Black', '2024-03-12 12:29:50', '2024-03-15 13:04:43'),
(11, 'storage/belt_rank/wcjSJR.PNG', 'Green White', '2024-03-12 12:30:12', '2024-03-12 12:30:12'),
(12, 'storage/belt_rank/KxP9bq.PNG', 'Green', '2024-03-12 12:30:33', '2024-03-12 12:30:33'),
(13, 'storage/belt_rank/iKrQHF.PNG', 'Green Black', '2024-03-12 12:31:11', '2024-03-12 12:31:11'),
(15, 'storage/belt_rank/N8KcbF.PNG', 'White 1st Stripe', '2024-03-12 12:38:15', '2024-03-15 13:05:58'),
(16, 'storage/belt_rank/kM6Fj5.PNG', 'White 2nd Stripe', '2024-03-12 12:39:46', '2024-03-15 13:06:11'),
(17, 'storage/belt_rank/r2APAG.PNG', 'White 3rd Stripe', '2024-03-12 12:40:09', '2024-03-15 13:06:22'),
(18, 'storage/belt_rank/1usjd7.PNG', 'White 4th Stripe', '2024-03-12 12:40:31', '2024-03-15 13:06:35'),
(19, 'storage/belt_rank/GYsTw5.PNG', 'Blue', '2024-03-12 12:40:51', '2024-03-15 13:06:54'),
(20, 'storage/belt_rank/koGXYJ.PNG', 'Blue 1st Stripe', '2024-03-12 12:43:51', '2024-03-15 13:07:05'),
(21, 'storage/belt_rank/NzB6sw.PNG', 'Blue 2nd Stripe', '2024-03-12 12:44:28', '2024-03-15 13:07:17'),
(22, 'storage/belt_rank/o0DJbF.PNG', 'Blue 3rd Stripe', '2024-03-12 12:44:53', '2024-03-15 13:07:28'),
(23, 'storage/belt_rank/Syh5GO.PNG', 'Blue 4th Stripe', '2024-03-12 12:45:37', '2024-03-15 13:07:39'),
(24, 'storage/belt_rank/czo1x3.PNG', 'Purple', '2024-03-12 12:45:58', '2024-03-15 13:07:49'),
(25, 'storage/belt_rank/5Ul0QG.PNG', 'Purple 1st Stripe', '2024-03-12 12:46:22', '2024-03-15 13:07:59'),
(26, 'storage/belt_rank/cWgY2o.PNG', 'Purple 2nd Stripe', '2024-03-12 12:47:05', '2024-03-15 13:08:10'),
(27, 'storage/belt_rank/rsOqAU.PNG', 'Purple 3rd Stripe', '2024-03-12 12:47:27', '2024-03-15 13:08:22'),
(28, 'storage/belt_rank/ZzdURl.PNG', 'Purple 4th Stripe', '2024-03-12 12:47:49', '2024-03-15 13:08:34'),
(29, 'storage/belt_rank/vwfe2i.PNG', 'Brown', '2024-03-12 12:48:09', '2024-03-15 13:08:44'),
(30, 'storage/belt_rank/mx048B.PNG', 'Brown 1st Stripe', '2024-03-12 12:48:32', '2024-03-15 13:08:54'),
(31, 'storage/belt_rank/OWExsL.PNG', 'Brown 2nd Stripe', '2024-03-12 12:48:55', '2024-03-15 13:09:08'),
(32, 'storage/belt_rank/itUkCj.PNG', 'Brown 3rd Stripe', '2024-03-12 12:49:21', '2024-03-15 13:09:19'),
(33, 'storage/belt_rank/BUvnlO.PNG', 'Brown 4th Stripe', '2024-03-12 12:50:02', '2024-03-15 13:09:29'),
(34, 'storage/belt_rank/TeRpKE.PNG', 'Black', '2024-03-12 12:50:31', '2024-03-15 13:09:39'),
(35, 'storage/belt_rank/huOiea.PNG', 'Black 1st Degree', '2024-03-12 12:50:59', '2024-03-15 13:09:49'),
(36, 'storage/belt_rank/gqX9kV.PNG', 'Black 2nd Degree', '2024-03-12 12:51:42', '2024-03-15 13:09:57'),
(37, 'storage/belt_rank/xGxn31.PNG', 'Black 3rd Degree', '2024-03-12 12:52:07', '2024-03-15 13:10:04'),
(38, 'storage/belt_rank/mSbhLV.PNG', 'Black 4th Degree', '2024-03-12 12:52:30', '2024-03-15 13:10:11'),
(39, 'storage/belt_rank/8WKoRB.PNG', 'Black 5th Degree', '2024-03-12 12:52:57', '2024-03-15 13:10:18'),
(40, 'storage/belt_rank/4sM1pw.PNG', 'Black 6th Degree', '2024-03-12 12:53:22', '2024-03-15 13:10:26'),
(41, 'storage/belt_rank/F68zhH.PNG', 'Black Red 7th Degree', '2024-03-12 12:54:58', '2024-03-15 13:10:38'),
(42, 'storage/belt_rank/x92n6C.PNG', 'Black White 8th Degree', '2024-03-12 12:55:26', '2024-03-15 13:10:46'),
(43, 'storage/belt_rank/HBF3oI.PNG', 'Red 9th Degree', '2024-03-12 12:56:27', '2024-03-15 13:10:54'),
(44, 'storage/belt_rank/F8kmP1.PNG', 'Red 10th Degree', '2024-03-12 12:58:25', '2024-03-15 13:11:03');

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE `bookmarks` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `module_id` bigint UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookmarks`
--

INSERT INTO `bookmarks` (`id`, `user_id`, `module_id`, `type`, `created_at`, `updated_at`) VALUES
(90, 26, 1, 'assessment_l2_s', '2023-12-21 07:56:32', '2023-12-21 07:56:32'),
(95, 39, 1, 'sub_assessments', '2024-01-03 16:02:29', '2024-01-03 16:02:29'),
(111, 49, 11, 'assessment_l2_s', '2024-03-13 07:23:45', '2024-03-13 07:23:45'),
(112, 71, 7, 'main_assessments', '2024-03-13 11:34:00', '2024-03-13 11:34:00'),
(113, 74, 5, 'main_assessments', '2024-03-13 11:54:47', '2024-03-13 11:54:47'),
(124, 77, 18, 'assessment_l2_s', '2024-03-16 04:51:27', '2024-03-16 04:51:27'),
(125, 81, 2, 'main_assessments', '2024-03-30 12:37:26', '2024-03-30 12:37:26');

-- --------------------------------------------------------

--
-- Table structure for table `competitions`
--

CREATE TABLE `competitions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `competition_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `age_division` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `belt_rank` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `competitors` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `matches` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `wins` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `result` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `competitions`
--

INSERT INTO `competitions` (`id`, `user_id`, `competition_name`, `date`, `location`, `gender`, `weight`, `age_division`, `belt_rank`, `competitors`, `matches`, `wins`, `result`, `notes`, `created_at`, `updated_at`) VALUES
(3, 9, 'Demo Competition', '2023-11-29', 'Fsd', 'male', 'light', 'Age', 'Purple Belt', '12', '5', '1', 'Silver', 'Demo Phase', '2023-12-07 08:04:52', '2023-12-07 08:04:52'),
(5, 15, 'home', '2023-12-08', 'lA', 'yes', 'Light Feather', 'Adult', 'Bronze', '8', '15', '5', 'Silver', NULL, '2023-12-07 13:53:50', '2023-12-07 13:53:50'),
(6, 22, 'iqra', '2023-12-28', 'fsd', 'yes', 'Feather', 'Juvenile 2', 'Black', '25', '5', '1', 'Gold', 'Abc', '2023-12-13 12:28:22', '2023-12-13 12:28:22'),
(7, 25, 'koi jitsu competition', '2023-12-18', 'united kingdom', 'yes', 'Rooster', 'Adult', 'Black', '1', '1', '1', 'Gold', 'Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu..Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsuAcademy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu..Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsuAcademy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu..Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsuAcademy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.', '2023-12-18 10:51:02', '2023-12-18 10:51:02'),
(8, 25, 'competition 2', '2023-12-19', 'Australia', 'no', 'Feather', 'Adult', 'Brown', '2', '3', '5', 'Bronze', 'Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu..Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsuAcademy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu..Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsuAcademy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu..Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsuAcademy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.', '2023-12-18 10:52:20', '2023-12-18 10:52:20'),
(9, 25, 'competition 3', '2023-12-20', 'united kingdom', 'no', 'Feather', 'Juvenile 1', 'Purple', '5', '5', '9', 'Silver', 'Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu..Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsuAcademy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu..Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsuAcademy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu..Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsuAcademy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.', '2023-12-18 10:53:14', '2023-12-18 10:53:14'),
(10, 25, 'como4', '2023-12-19', 'united', 'yes', 'Open Class', 'Masters 5', 'Grey/White', '20', '8', '9', 'Gold', 'Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu..Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsuAcademy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu..Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsuAcademy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu..Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsuAcademy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.', '2023-12-18 10:54:00', '2023-12-18 10:54:00'),
(11, 25, 'ysts', '2023-12-18', 'xgztzy', 'xyzt', 'Feather', 'Juvenile 2', 'Brown', '55', '757', '88', 'Bronze', 'Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu..Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsuAcademy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu..Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsuAcademy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu..Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsuAcademy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.xohxogxogxoxogxigxixupxigxigxogxogxoyxyodoycogfoyfooggoxoitfxohxogxogxoxogxigxixupxigxigxogxogxoyxyodoycogfoyfooggoxoitf\nAcademy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu..Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsuAcademy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu..Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsuAcademy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu..Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsuAcademy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.xohxogxogxoxogxigxixupxigxigxogxogxoyxyodoycogfoyfooggoxoitfxohxogxogxoxogxigxixupxigxigxogxogxoyxyodoycogfoyfooggoxoitf', '2023-12-18 13:58:49', '2023-12-18 13:58:49'),
(14, 6, 'Demo Competition', '2023-11-29', 'Fsd', 'male', 'light', 'Age', 'Purple Belt', '12', '5', '1', 'Silver', 'Testing from postman', '2023-12-19 08:13:46', '2023-12-19 08:13:46'),
(15, 6, 'Demo Competition', '2023-11-29', 'Fsd', 'male', 'light', 'Age', 'Purple Belt', '12', '5', '1', 'Silver', 'Testing from postman same date', '2023-12-19 08:14:03', '2023-12-19 08:14:03'),
(16, 6, 'Demo Competition', '2023-11-29', 'Fsd', 'male', 'light', 'Age', 'Purple Belt', '12', '5', '1', 'Silver', 'Testing from postman same date 2', '2023-12-19 08:14:20', '2023-12-19 08:14:20'),
(17, 6, 'Demo Competition', '2023-11-29', 'Fsd', 'male', 'light', 'Age', 'Purple Belt', '12', '5', '1', 'Silver', 'We are losing this place twice over: first to money, and then to sea. There are ways to quantify these losses: only 3,200 bushels of scallops were caught this past winter and more than $2 billion in real estate transactions were recorded last year. My parents aren’t sure where they should be buried; all the graveyards in all the towns we have ever lived will one day be inundated. I imagine horseshoe crabs trolling along the bottom, pausing to read the names etched on headstones.\n\nAll over the island, it looms: this is the end of something. I walk along the dune-tops, what’s left of them, at the very end of South Shore Road. Over one shoulder is the Atlantic; endless. Over the other are the sewer beds. A sandy strip separates the two. Second homes are not the only creatures perched precariously on eroding shorelines. Our wastewater treatment facility hangs in the balance.\n\nI’ve spent most of my life in two vacation destinations, but I am most interested in the places tourists never see. I inherited my parents’ fascination with waste. My father, a town manager for forty years, has spent his career in towns the ocean threatens to reclaim at full moon tides. He is concerned with the inner workings of a transfer station (or dump, in layman’s terms), or wastewater treatment plant, wonders of modernity that might allow us to stay in these sandy outposts a little longer. My mother’s interests are more varied, less technical, but equally focused on transforming waste into something usable. She has rescued works of art, designer clothes, and early American furniture from the dump or the side of the road. My parents have been obsessed with sustainability long before anybody called it that. They met on Nantucket, where I live now, and some of their earliest dates were visits to the Nantucket dump—my father, so he could see up-close what was happening with the island’s refuse; my mother, so she could show off her best find.\n\nI threw the switch at the Provincetown sewer treatment plant, the so-called “first flush.” There is a photo from that day, my father in a suit and tie, me in a Moby-Dick’s restaurant tee-shirt I picked up at the swap shop at the Truro dump. My hand is on the giant switch. A selectman, now dead, wears yellow sou’wester gear. Provincetown’s sewer was a hard-fought victory, years of town meetings before the voters agreed to appropriate the funds. When you live on a pile of sand, you start to realize all of this shit has to go somewhere. They built the plant on the other side of the highway, near the smallpox cemetery and the old burn dump. Even at the edge of the world, there is more exiling to be done.\n\nMy father, since retired, still holds the record as Provincetown’s longest-serving town manager. The day the sewer treatment plant switched on was one of proudest of his career, and for a while he kept a vial of treated effluent on his desk at the Town Hall, the liquid as clear as sea water. This was a miracle, up there with transubstantiation. My mother kept a small bottle of spermaceti whale oil from the head cavity of a juvenile sperm whale that washed ashore in Nantucket twenty-five years ago this December. The future and past of a watery place, here before me in liquid form.\n\nThis past August, Provincetown’s sewer system suffered a failure for a few days at the height of the season. Rows and rows of blue port-a-potties were set up in the shadow of the Town Hall. Their plastic, peaked roofs were a strange inversion of the iconic tourist cabins, as small as Monopoly houses, that line the narrow highway into town.\n\nAt a Special Town Meeting in November 2022, Provincetown recommitted to the sewer. Residents voted in favor of a $75 million expansion that will include more reliable gravity flows and pumps. By the end of the decade, the goal is for every property in town to have access to a municipal sewer line. Two voters, abutters who live near the location of a proposed wastewater treatment substation, raised concerns over the smell. The proposal passed 300 to 10. Climate change adaptation comes at a high cost. Norman Mailer, a Provincetown resident for many years wrote, “One must grow or pay more for remaining the same.” My father likes to say, “It takes a sewer to make a village.”\n\nOn Nantucket, our sewer is more than a century old. In 2018, catastrophic storms smashed the sewer main, expelling two million gallons of the stuff into our harbor and surrounding streets. Scallops are filter feeders. It looked nothing like my father’s vial.\n\nSewer Bed Beach is also the nude beach. The water is perfect here, a clear turquoise. Summer cops ride ATVs along the shoreline, their eyes fixed on the horizon. There is an unspoken agreement that they do not stop along this spit of beach unless there is a shark sighting or other natural concern they have to report. They speak to a woman who stands in the surf break, holding a breast in either hand, about the dangers of a rip current.\n\nAfter summer’s revelers are gone, we return to the dune-top trail along Sewer Bed Beach. The trunk of a huge tree has washed ashore, something much larger than anything that manages to grow in the sand out here. The wood is bleached by the sun and salt, rubbed raw by the sand. It juts out of the beach at an odd angle, arched like a whale’s rib.\n\nLike the tree, like the effluent, this place, too, will be transformed into something we aren’t fully capable of envisioning. The end of one place, the start of a new one. A place that belongs to the horseshoe crabs, who have made it 300 million years without a sanitary sewer.\n\n \n\nMary Bergman is a writer and historian living on Nantucket Island. Her work has appeared in Literary Hub, Provincetown Arts, and she is a regular contributor to WCAI, the Cape and Islands NPR station. She is writing a novel.', '2023-12-19 08:17:38', '2023-12-19 08:17:38'),
(20, 6, 'Demo Competition', '2023-11-29', 'Fsd', 'male', 'light', 'Age', 'Purple Belt', '12', '5', '1', 'Silver', 'Dear All,\nWe have requirement from client to implement XXL feature available in InfoObject with SAP BW 7.4 to display extra long text.\nOur system is currently on SAP BW 7.4 with SP level 16.\nI have created InfoObject and enabled the option \'Supports XXL attribute\' and checked the box \'long text, long text is XL\'.\nIn the XXL Attribute tab we have created XXL InfoObject as well with data type STRING.\nI understand from SDN and help portal that the data type and table structure definition and field length (1333) is correct.\nRequest your inputs on the below pointers.\n1. How exactly this functionality works.\n2. Do we need to implement any note, need to do any settings or use any FM to use this option.\n3. Will this support flat file datasource interface. If yes, what should be the file format, how to load end to end etc.\n4. Once loaded to tables how do we display the text in reports, data validation etc.\nI understand that long text can be displayed by creating multiple InfoObject, split and load the data and concatenate in the report.\nHowever client want to implement XXL feature.\nPlease do let me know if you have knowledge or worked on similar requirement and implemented this feature in any of your projects.\nAppreciate if you could share documents if any which will help us drive this requirement.\nThanks in advance.\nThanks and Regards\nMohan', '2023-12-19 08:19:42', '2023-12-19 08:19:42'),
(28, 26, 'mm', '2023-12-14', 'lkl', 'yes', 'Rooster', 'Juvenile 2', 'Purple', '2', '5', '5', 'Silver', NULL, '2023-12-19 10:06:35', '2023-12-19 10:06:35'),
(29, 26, 'jjj', '2023-12-19', 'hh', 'yes', 'Feather', 'Juvenile 2', 'Brown', '5', '5', '2', 'Silver', NULL, '2023-12-19 10:36:22', '2023-12-19 10:36:22'),
(31, 32, 'bfjgj', '2023-12-20', 'lahore', 'Yes', 'Rooster', 'Juvenile 1', 'Brown', '5', '2', '4', 'Silver', 'No', '2023-12-20 13:56:47', '2023-12-20 13:56:47'),
(32, 32, 'uguvuvgigig', '2023-12-20', 'fad fad fad fsd', 'Yes', 'Feather', 'Adult', 'Brown', '20', '8', '8', 'Gold', 'No', '2023-12-20 14:05:19', '2023-12-20 14:05:19'),
(33, 32, 'Fight', '2023-12-21', 'Faisalabad', 'No', 'Feather', 'Adult', 'Black', '10', '5', '2', 'Silver', 'No', '2023-12-20 14:32:41', '2023-12-20 14:32:41'),
(34, 33, 'henen', '2023-12-21', 'bdndn', 'Yes', 'Light Feather', 'Juvenile 1', 'Green/Black', '548', '8491', '4819', 'Silver', 'Ebhejehehe rjrhje rhrirhdj djrjje rjrbrjr. RjrbrnEbhejehehe rjrhje rhrirhdj djrjje rjrbrjr. Rjrbrn Ebhejehehe rjrhje rhrirhdj djrjje rjrbrjr. RjrbrnEbhejehehe rjrhje rhrirhdj djrjje rjrbrjr. Rjrbrn Ebhejehehe rjrhje rhrirhdj djrjje rjrbrjr. RjrbrnEbhejehehe rjrhje rhrirhdj djrjje rjrbrjr. Rjrbrn Ebhejehehe rjrhje rhrirhdj djrjje rjrbrjr. RjrbrnEbhejehehe rjrhje rhrirhdj djrjje rjrbrjr. Rjrbrn Ebhejehehe rjrhje rhrirhdj djrjje rjrbrjr. RjrbrnEbhejehehe rjrhje rhrirhdj djrjje rjrbrjr. Rjrbrn Ebhejehehe rjrhje rhrirhdj djrjje rjrbrjr. RjrbrnEbhejehehe rjrhje rhrirhdj djrjje rjrbrjr. Rjrbrn Ebhejehehe rjrhje rhrirhdj djrjje rjrbrjr. RjrbrnEbhejehehe rjrhje rhrirhdj djrjje rjrbrjr. Rjrbrn Ebhejehehe rjrhje rhrirhdj djrjje rjrbrjr. RjrbrnEbhejehehe rjrhje rhrirhdj djrjje rjrbrjr. Rjrbrn Ebhejehehe rjrhje rhrirhdj djrjje rjrbrjr. RjrbrnEbhejehehe rjrhje rhrirhdj djrjje rjrbrjr. Rjrbrn Ebhejehehe rjrhje rhrirhdj djrjje rjrbrjr. RjrbrnEbhejehehe rjrhje rhrirhdj djrjje rjrbrjr. Rjrbrn Ebhejehehe rjrhje rhrirhdj djrjje rjrbrjr. RjrbrnEbhejehehe rjrhje rhrirhdj djrjje rjrbrjr. Rjrbrn Ebhejehehe rjrhje rhrirhdj djrjje rjrbrjr. RjrbrnEbhejehehe rjrhje rhrirhdj djrjje rjrbrjr. Rjrbrn Ebhejehehe rjrhje rhrirhdj djrjje rjrbrjr. RjrbrnEbhejehehe rjrhje rhrirhdj djrjje rjrbrjr. Rjrbrn Ebhejehehe rjrhje rhrirhdj djrjje rjrbrjr. RjrbrnEbhejehehe rjrhje rhrirhdj djrjje rjrbrjr. Rjrbrn Ebhejehehe rjrhje rhrirhdj djrjje rjrbrjr. RjrbrnEbhejehehe rjrhje rhrirhdj djrjje rjrbrjr. Rjrbrn Ebhejehehe rjrhje rhrirhdj djrjje rjrbrjr. RjrbrnEbhejehehe rjrhje rhrirhdj djrjje rjrbrjr. Rjrbrn Ebhejehehe rjrhje rhrirhdj djrjje rjrbrjr. RjrbrnEbhejehehe rjrhje rhrirhdj djrjje rjrbrjr. Rjrbrn Ebhejehehe rjrhje rhrirhdj djrjje rjrbrjr. RjrbrnEbhejehehe rjrhje rhrirhdj djrjje rjrbrjr. Rjrbrn Ebhejehehe rjrhje rhrirhdj djrjje rjrbrjr. RjrbrnEbhejehehe rjrhje rhrirhdj djrjje rjrbrjr. Rjrbrn Ebhejehehe rjrhje rhrirhdj djrjje rjrbrjr. RjrbrnEbhejehehe rjrhje rhrirhdj djrjje rjrbrjr. Rjrbrn', '2023-12-21 05:48:03', '2023-12-21 05:48:03'),
(35, 38, 'black belt championship', '2024-01-02', 'united kingdom', 'Yes', 'Feather', 'Juvenile 2', 'Black', '10', '5', '2', 'Gold', 'Competition winner 🏆', '2024-01-02 16:07:31', '2024-01-02 16:07:31'),
(36, 39, 'black belt 🥊', '2024-01-03', 'united kingdom', 'Yes', 'Rooster', 'Adult', 'Purple', '20', '8', '8', 'Silver', 'Test', '2024-01-03 16:04:03', '2024-01-03 16:04:03'),
(38, 41, 'competition 1', '2024-01-17', 'Lahore', 'Yes', 'Rooster', 'Juvenile 1', 'Black', '29', '9', '9', 'Gold', 'Vzbsna', '2024-01-17 11:59:03', '2024-01-17 11:59:03'),
(39, 41, 'competition', '2024-01-16', 'uk', 'Yes', 'Light Feather', 'Juvenile 1', 'Purple', '3', '5', '6', 'Gold', 'Bxxn', '2024-01-17 12:00:20', '2024-01-17 12:00:20'),
(57, 51, 'Demo Competition', '2024-03-10', 'Fsd', 'male', 'light', 'Age', 'Purple Belt', '12', '5', '1', 'Silver', 'Demo Phase', '2024-03-12 04:53:27', '2024-03-12 04:53:27'),
(58, 52, 'veg', '2024-03-11', 'brh', 'Yes', 'Light Feather', 'Adult', 'Black', '20', '5', '4', 'Gold', 'Gym ggw', '2024-03-12 05:20:14', '2024-03-12 05:22:46'),
(61, 56, 'jj competition', '2024-03-12', 'lhr', 'Yes', 'Light Feather', 'Adult', 'Brown', '5', '10', '4', 'Silver', 'Lorem ipsum', '2024-03-12 15:44:36', '2024-03-12 15:56:50'),
(62, 57, 'jj competition', '2024-03-08', 'lhr', 'Yes', 'Feather', 'Adult', 'Purple', '29', '10', '5', 'Silver', 'Notes', '2024-03-12 18:51:15', '2024-03-12 18:51:29'),
(71, 68, 'bdsn', '2024-03-10', 'lhr', 'Yes', 'Feather', 'Juvenile 2', 'Purple', '20', '10', '5', 'Silver', 'X. Z', '2024-03-13 11:09:02', '2024-03-13 11:09:02'),
(73, 71, 'bxns', '2024-08-31', 'lhr', 'Yes', 'Light Feather', 'Juvenile 2', 'Brown', '10', '7', '3', 'Silver', 'Zbsb', '2024-03-13 11:36:30', '2024-03-13 11:36:30'),
(74, 74, 'test edit', '2024-03-15', 'lhr', 'Yes', 'Feather', 'Juvenile 2', 'Purple', '50', '10', '4', 'Silver', 'Bzbs', '2024-03-13 11:53:02', '2024-03-13 11:53:15'),
(76, 77, 'World Master', '2023-08-31', 'Las Vegas', 'Yes', 'Rooster', 'Masters 1', 'Black', '10', '3', '2', 'Bronze', 'IBJJF', '2024-03-15 23:22:58', '2024-03-15 23:22:58'),
(77, 77, 'East Japan', '2023-04-02', 'Tokyo', 'Yes', 'Light Feather', 'Adult', 'Black', '3', '2', '0', 'Bronze', 'JBJJF', '2024-03-15 23:24:24', '2024-03-15 23:24:24'),
(78, 77, 'All Japan Master', '2023-02-26', 'Yokohama', 'Yes', 'Light Feather', 'Masters 1', 'Black', '10', '2', '1', 'Bronze', 'JBJJF', '2024-03-15 23:25:43', '2024-03-15 23:25:43'),
(79, 77, 'All Japan Open Class', '2023-01-22', 'Tokyo', 'Yes', 'Open Class', 'Adult', 'Black', '2', '1', '1', 'Gold', 'JBJJF', '2024-03-15 23:27:08', '2024-03-15 23:27:08'),
(80, 77, 'Asian', '2019-09-14', 'Tokyo', 'Yes', 'Light Feather', 'Adult', 'Black', '15', '3', '2', 'Silver', 'IBJJF', '2024-03-15 23:29:01', '2024-03-15 23:29:01'),
(81, 77, 'Battle Grapple 4', '2019-01-27', 'Guildford', 'Yes', 'Light Feather', 'Adult', 'Black', '2', '1', '1', 'Gold', 'Battle Grapple', '2024-03-15 23:50:11', '2024-03-15 23:50:11'),
(82, 77, 'Paris Fall Open', '2018-11-24', 'Paris', 'Yes', 'Feather', 'Adult', 'Black', '4', '1', '0', 'Bronze', 'IBJJF', '2024-03-15 23:52:01', '2024-03-15 23:52:01'),
(83, 77, 'Battle Grapple 2', '2018-08-05', 'Guildford', 'Yes', 'Feather', 'Adult', 'Black', '2', '1', '1', 'Gold', 'Battle Grapple', '2024-03-15 23:53:39', '2024-03-15 23:53:39'),
(84, 77, 'British National', '2018-06-24', 'London', 'Yes', 'Light Feather', 'Adult', 'Black', '1', '1', '1', 'Gold', 'IBJJF', '2024-03-15 23:55:03', '2024-03-15 23:58:11'),
(85, 77, 'Battle Grapple', '2018-06-17', 'Guildford', 'Yes', 'Open Class', 'Adult', 'Black', '2', '1', '0', 'Silver', 'Battle Grapple', '2024-03-15 23:56:47', '2024-03-15 23:56:47'),
(86, 77, 'Paris Spring Open', '2018-05-12', 'Paris', 'Yes', 'Light Feather', 'Adult', 'Black', '3', '2', '2', 'Gold', 'IBJJF', '2024-03-15 23:59:32', '2024-03-15 23:59:32'),
(87, 77, 'Asian', '2017-09-09', 'Tokyo', 'Yes', 'Light Feather', 'Adult', 'Black', '16', '2', '1', 'Bronze', 'IBJJF', '2024-03-16 00:01:56', '2024-03-16 00:01:56'),
(88, 77, 'Rizin', '2016-12-29', 'Saitama', 'Yes', 'Light Feather', 'Adult', 'Black', '1', '1', '1', 'Gold', 'JBJJF', '2024-03-16 00:03:51', '2024-03-16 00:03:51'),
(89, 77, 'Rizin', '2016-12-29', 'Saitama', 'Yes', 'Open Class', 'Adult', 'Black', '4', '2', '2', 'Gold', 'JBJJF', '2024-03-16 00:04:40', '2024-03-16 00:04:40'),
(90, 77, 'Abu Dhabi Grand Slam Tokyo', '2016-10-23', 'Tokyo', 'Yes', 'Light Feather', 'Adult', 'Black', '3', '2', '1', 'Silver', 'AJP', '2024-03-16 00:06:50', '2024-03-16 00:06:50'),
(91, 77, 'Asian', '2016-09-10', 'Tokyo', 'Yes', 'Light Feather', 'Adult', 'Black', '16', '3', '2', 'Silver', 'IBJJF', '2024-03-16 00:08:05', '2024-03-16 00:08:05'),
(92, 77, 'Odawara Free Fight', '2016-08-28', 'Odawara', 'Yes', 'Open Class', 'Adult', 'Black', '2', '1', '1', 'Gold', 'roots', '2024-03-16 00:10:07', '2024-03-16 00:10:07'),
(93, 77, 'Grand Impact East Japan', '2016-06-19', 'Tokyo', 'Yes', 'Light Feather', 'Adult', 'Black', '2', '1', '1', 'Gold', 'JBJJF', '2024-03-16 00:11:50', '2024-03-16 00:11:50'),
(94, 77, 'Grand Impact East Japan', '2016-06-19', 'Tokyo', 'Yes', 'Open Class', 'Adult', 'Black', '4', '1', '0', 'Bronze', 'JBJJF', '2024-03-16 00:13:02', '2024-03-16 00:13:02'),
(95, 77, 'Japanese National', '2016-04-17', 'Tokyo', 'Yes', 'Light Feather', 'Adult', 'Black', '4', '1', '0', 'Bronze', 'IBJJF', '2024-03-16 00:14:33', '2024-03-16 00:15:50'),
(96, 77, 'Japanese National', '2016-04-17', 'Tokyo', 'Yes', 'Open Class', 'Adult', 'Black', '6', '2', '1', 'Bronze', 'IBJJF', '2024-03-16 00:15:35', '2024-03-16 00:15:35'),
(97, 77, 'Ground Impact Pro', '2015-10-11', 'Tokyo', 'Yes', 'Feather', 'Adult', 'Black', '2', '1', '0', 'Silver', 'IF-Project', '2024-03-16 03:14:24', '2024-03-16 03:14:24'),
(98, 77, 'Asian', '2015-09-12', 'Tokyo', 'Yes', 'Light Feather', 'Adult', 'Black', '20', '3', '3', 'Gold', 'IBJJF', '2024-03-16 03:15:38', '2024-03-16 03:15:38'),
(99, 77, 'All Japan', '2015-07-19', 'Tokyo', 'Yes', 'Light Feather', 'Adult', 'Black', '20', '3', '2', 'Silver', 'JBJJF', '2024-03-16 03:17:16', '2024-03-16 03:17:16'),
(100, 77, 'IKKIUCHI 2', '2015-05-17', 'Tokyo', 'Yes', 'Light Feather', 'Adult', 'Black', '2', '1', '1', 'Gold', 'IKKIUCHI', '2024-03-16 03:20:13', '2024-03-16 03:20:13'),
(101, 77, 'NAGA', '2015-04-26', 'London', 'Yes', 'Feather', 'Adult', 'Black', '2', '1', '1', 'Gold', 'NAGA', '2024-03-16 03:21:51', '2024-03-16 03:21:51'),
(102, 77, 'JBJJF Ranking No.1', '2015-02-22', 'Tokyo', 'Yes', 'Light Feather', 'Adult', 'Brown', '1', '1', '1', 'Gold', 'JBJJF', '2024-03-16 03:24:01', '2024-03-16 03:24:01'),
(103, 77, 'Asian', '2014-11-09', 'Aichi', 'Yes', 'Light Feather', 'Adult', 'Brown', '16', '3', '3', 'Gold', 'IBJJF', '2024-03-16 03:25:18', '2024-03-16 03:25:18'),
(104, 77, 'Asian', '2014-11-09', 'Aichi', 'Yes', 'Open Class', 'Adult', 'Brown', '4', '2', '1', 'Bronze', 'IBJJF', '2024-03-16 03:26:14', '2024-03-16 03:26:14'),
(105, 77, 'All Japan Open', '2014-09-14', 'Tokyo', 'Yes', 'Light Feather', 'Adult', 'Brown', '16', '3', '2', 'Silver', 'JBJJF', '2024-03-16 03:28:34', '2024-03-16 03:32:25'),
(106, 77, 'All Japan Open', '2014-09-14', 'Tokyo', 'Yes', 'Open Class', 'Adult', 'Brown', '4', '2', '2', 'Gold', 'JBJJF', '2024-03-16 03:29:30', '2024-03-16 03:32:59'),
(107, 77, 'All Japan', '2014-06-22', 'Tokyo', 'Yes', 'Light Feather', 'Adult', 'Brown', '16', '3', '3', 'Gold', 'JBJJF', '2024-03-16 03:31:09', '2024-03-16 03:31:09'),
(108, 77, 'Asian', '2013-10-27', 'Tokyo', 'Yes', 'Light Feather', 'Adult', 'Purple', '16', '2', '1', 'Bronze', 'IBJJF', '2024-03-16 03:34:22', '2024-03-16 03:34:22'),
(109, 77, 'All Japan', '2013-07-28', 'Tokyo', 'Yes', 'Light Feather', 'Adult', 'Purple', '16', '3', '3', 'Gold', 'JBJJF', '2024-03-16 03:35:22', '2024-03-16 03:35:22'),
(110, 77, 'Freshman’s Tournament', '2010-05-05', 'Tokyo', 'Yes', 'Light Feather', 'Adult', 'White', '2', '1', '1', 'Gold', 'JBJJF', '2024-03-16 04:04:15', '2024-03-16 04:15:28'),
(111, 77, 'Freshman’s Tournament', '2010-05-05', 'Tokyo', 'Yes', 'Open Class', 'Adult', 'White', '4', '2', '2', 'Gold', 'JBJJF', '2024-03-16 04:05:14', '2024-03-16 04:15:52'),
(112, 77, 'Adidas Cup', '2012-09-09', 'Tokyo', 'Yes', 'Light Feather', 'Adult', 'Purple', '8', '3', '2', 'Silver', 'IF-Project', '2024-03-16 04:21:59', '2024-03-16 04:24:18'),
(113, 77, 'Adidas Cup', '2012-09-09', 'Tokyo', 'Yes', 'Open Class', 'Adult', 'Purple', '8', '3', '3', 'Gold', 'IF-Project', '2024-03-16 04:22:52', '2024-03-16 04:24:50'),
(114, 77, 'Copa ALMA', '2011-09-11', 'Tokyo', 'Yes', 'Feather', 'Adult', 'Blue', '2', '1', '1', 'Gold', 'IF-Project', '2024-03-16 04:26:47', '2024-03-16 04:26:47'),
(115, 77, 'Copa ALMA', '2011-09-11', 'Tokyo', 'Yes', 'Open Class', 'Adult', 'Blue', '3', '2', '0', 'Bronze', 'IF-Project', '2024-03-16 04:28:40', '2024-03-16 04:28:40'),
(116, 77, 'Aichi Open', '2011-03-27', 'Aichi', 'Yes', 'Open Class', 'Adult', 'Blue', '4', '2', '2', 'Gold', 'ALIVE', '2024-03-16 04:32:17', '2024-03-16 04:32:17'),
(117, 77, 'East Japan', '2013-06-16', 'Tokyo', 'Yes', 'Light Feather', 'Adult', 'Purple', '2', '1', '1', 'Gold', 'JBJJF', '2024-03-16 04:34:49', '2024-03-16 04:34:49'),
(118, 77, 'Tokyo Open', '2014-01-26', 'Tokyo', 'Yes', 'Light Feather', 'Adult', 'Brown', '1', '1', '1', 'Gold', 'JBJJF', '2024-03-16 04:36:48', '2024-03-16 04:36:48'),
(119, 77, 'Tokyo Open', '2014-01-26', 'Tokyo', 'Yes', 'Open Class', 'Adult', 'Brown', '3', '2', '1', 'Silver', 'JBJJF', '2024-03-16 04:37:58', '2024-03-16 04:37:58'),
(120, 77, 'Kanto Open', '2013-04-14', 'Tokyo', 'Yes', 'Light Feather', 'Adult', 'Purple', '2', '1', '1', 'Gold', 'JBJJF', '2024-03-16 04:41:33', '2024-03-16 04:41:33'),
(121, 77, 'BJJ-JAM TOKYO', '2014-08-31', 'Tokyo', 'Yes', 'Light Feather', 'Adult', 'Brown', '2', '1', '0', 'Silver', 'JBJJF', '2024-03-16 04:47:01', '2024-03-16 04:47:01'),
(122, 77, 'Kanto Open', '2009-06-28', 'Tokyo', 'Yes', 'Feather', 'Adult', 'White', '4', '1', '0', 'Bronze', 'JBJJF', '2024-03-16 12:58:30', '2024-03-16 12:58:30'),
(123, 77, 'Kanto Open', '2015-02-22', 'Tokyo', 'Yes', 'Light Feather', 'Adult', 'Brown', '1', '1', '1', 'Gold', 'JBJJF', '2024-03-16 13:01:45', '2024-03-16 13:01:45'),
(124, 77, 'Kanto Open', '2015-02-22', 'Tokyo', 'Yes', 'Open Class', 'Adult', 'Brown', '1', '1', '1', 'Gold', 'JBJJF', '2024-03-16 13:02:30', '2024-03-16 13:02:30'),
(125, 77, 'All Japan', '2014-07-20', 'Tokyo', 'Yes', 'Light Feather', 'Adult', 'Brown', '1', '1', '1', 'Gold', 'JBJJF', '2024-03-16 13:16:05', '2024-03-16 13:16:05'),
(126, 77, 'Kanto Open', '2014-04-20', 'Tokyo', 'Yes', 'Light Feather', 'Adult', 'Brown', '1', '1', '1', 'Gold', 'JBJJF', '2024-03-16 13:21:31', '2024-03-16 13:21:31'),
(127, 77, 'All Japan Open', '2014-03-23', 'Tokyo', 'Yes', 'Light Feather', 'Adult', 'Brown', '1', '1', '1', 'Gold', 'JBJJF', '2024-03-16 13:22:52', '2024-03-16 13:22:52'),
(128, 77, 'De La Riva Cup', '2013-09-22', 'Tokyo', 'Yes', 'Light Feather', 'Adult', 'Purple', '1', '1', '1', 'Gold', 'IF-Project', '2024-03-16 13:25:08', '2024-03-16 13:25:08'),
(129, 77, 'De La Riva Cup', '2013-09-22', 'Tokyo', 'Yes', 'Open Class', 'Adult', 'Purple', '2', '1', '1', 'Gold', 'JBJJF', '2024-03-16 13:26:03', '2024-03-16 13:26:03'),
(130, 77, 'Rickson Gracie Cup', '2012-08-05', 'Tokyo', 'Yes', 'Light Feather', 'Adult', 'Purple', '6', '2', '2', 'Gold', 'JJFJ', '2024-03-16 13:29:20', '2024-03-16 13:29:20'),
(131, 77, 'All Japan', '2012-07-29', 'Tokyo', 'Yes', 'Light Feather', 'Adult', 'Purple', '3', '2', '2', 'Gold', 'JBJJF', '2024-03-16 13:30:43', '2024-03-16 13:30:43'),
(132, 77, 'Xande Cup', '2012-06-24', 'Tokyo', 'Yes', 'Feather', 'Adult', 'Purple', '2', '1', '0', 'Silver', 'IF-Project', '2024-03-16 13:33:51', '2024-03-16 13:33:51'),
(133, 77, 'Xande Cup', '2012-06-24', 'Tokyo', 'Yes', 'Open Class', 'Adult', 'Purple', '4', '2', '2', 'Gold', 'IF-Project', '2024-03-16 13:34:48', '2024-03-16 13:34:48'),
(134, 77, 'Tokyo International', '2011-10-01', 'Tokyo', 'Yes', 'Feather', 'Adult', 'Blue', '6', '2', '2', 'Gold', 'JBJJF', '2024-03-16 13:36:58', '2024-03-16 13:36:58'),
(135, 77, 'De La Riva Cup', '2011-06-26', 'Tokyo', 'Yes', 'Feather', 'Adult', 'Blue', '4', '1', '0', 'Bronze', 'IF-Project', '2024-03-16 13:39:34', '2024-03-16 13:39:34'),
(136, 77, 'De La Riva Cup', '2011-06-26', 'Tokyo', 'Yes', 'Open Class', 'Adult', 'Blue', '4', '2', '2', 'Gold', 'IF-Project', '2024-03-16 13:40:37', '2024-03-16 13:40:37'),
(137, 49, 'test', '2024-03-20', 'london', 'Yes', 'Light Feather', 'Juvenile 2', 'Brown', '3', '3', '3', 'None', 'Dada', '2024-03-20 11:40:43', '2024-03-20 11:40:43'),
(138, 77, 'World 2018', '2018-06-03', 'Walter Pylamid', 'Yes', 'Light Feather', 'Adult', 'Black', '25', '1', '0', 'None', 'IBJJF', '2024-03-20 12:08:26', '2024-03-20 12:08:26'),
(139, 77, 'World 2016', '2016-06-05', 'Walter Pylamid', 'Yes', 'Light Feather', 'Adult', 'Black', '25', '1', '0', 'None', 'IBJJF', '2024-03-20 12:12:08', '2024-03-20 12:12:08'),
(140, 77, 'Pan Ams 2016', '2016-03-21', 'Los Angels', 'Yes', 'Light Feather', 'Adult', 'Black', '25', '1', '0', 'None', 'IBJJF', '2024-03-20 12:14:35', '2024-03-20 12:14:35'),
(141, 77, 'World 2014', '2014-05-30', 'Walter Pylamid', 'Yes', 'Light Feather', 'Adult', 'Brown', '25', '1', '0', 'None', 'IBJJF', '2024-03-20 12:17:30', '2024-03-20 12:19:28'),
(142, 77, 'European 2019', '2019-01-21', 'Lisbon', 'Yes', 'Light Feather', 'Adult', 'Black', '25', '1', '0', 'None', 'IBJJF', '2024-03-20 12:28:10', '2024-03-20 12:28:10'),
(143, 77, 'World 2013', '2013-06-01', 'Walter Pylamid', 'Yes', 'Light Feather', 'Adult', 'Purple', '25', '1', '0', 'None', 'IBJJF', '2024-03-20 12:37:20', '2024-03-20 12:37:20');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `main_assessments`
--

CREATE TABLE `main_assessments` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_number` int DEFAULT NULL,
  `thumbnail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_assessments`
--

INSERT INTO `main_assessments` (`id`, `title`, `order_number`, `thumbnail`, `type`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Pass Guard', 2, 'storage/main_assessment/Uwodzt.jpeg', 'top', 1, '2023-12-04 07:22:14', '2024-03-20 12:40:54'),
(5, 'Guard', 1, 'storage/main_assessment/oPKB8z.jpeg', 'bottom', 1, '2024-02-05 02:47:46', '2024-03-20 12:39:41'),
(6, 'Sub & Escape', 3, 'storage/main_assessment/rdHTSq.jpeg', 'top', 1, '2024-02-05 02:51:43', '2024-03-20 13:16:08'),
(7, 'Takedown', 1, 'storage/main_assessment/WzUtGC.jpeg', 'top', 1, '2024-02-05 11:54:00', '2024-03-20 12:40:39'),
(9, 'Sub & Escape', 3, 'storage/main_assessment/YT2vlh.jpeg', 'bottom', 1, '2024-02-16 04:45:58', '2024-03-20 13:15:15'),
(14, 'Retention', 2, 'storage/main_assessment/06eUMk.jpeg', 'bottom', 1, '2024-03-16 06:49:23', '2024-03-20 13:15:30');

-- --------------------------------------------------------

--
-- Table structure for table `mark_assessment_l2_s`
--

CREATE TABLE `mark_assessment_l2_s` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `child_assessment_id` bigint UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mark_assessment_l2_s`
--

INSERT INTO `mark_assessment_l2_s` (`id`, `user_id`, `child_assessment_id`, `type`, `created_at`, `updated_at`) VALUES
(42, 77, 18, 'Mastered', '2024-03-16 00:48:14', '2024-04-05 08:52:16');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_11_07_113039_create_admins_table', 1),
(7, '2023_11_15_061203_create_privacy_policies_table', 1),
(8, '2023_11_15_080144_create_term_conditions_table', 1),
(9, '2023_11_15_095110_create_about_us_table', 1),
(10, '2023_11_20_081426_add_otp_to_users', 1),
(11, '2023_11_27_130738_create_main_assessments_table', 1),
(12, '2023_11_27_130943_create_sub_assessments_table', 1),
(13, '2023_11_27_131332_create_assessment_l2_s_table', 1),
(14, '2023_11_28_072713_create_bookmarks_table', 1),
(15, '2023_11_28_105524_add_thumbnail_to_assessment_l2_s', 1),
(16, '2023_11_28_114904_create_trainings_table', 1),
(17, '2023_11_29_060716_create_competitions_table', 1),
(18, '2023_11_29_075217_create_promotions_table', 1),
(19, '2023_12_18_114452_create_views_table', 2),
(20, '2023_12_20_071838_add_fcm_token_to_users', 3),
(21, '2024_03_05_071036_add_order_id_to_assessments', 4),
(22, '2024_03_05_082630_add_order_id_to_tables', 5),
(23, '2024_03_06_060456_change_video_to_nullable_in_assessment_l2_s', 6),
(24, '2024_03_06_060728_add_youtube_link_to_assessment_l2_s', 6),
(25, '2024_03_11_051411_add_description_to_users', 7),
(26, '2024_03_11_052951_create_social_media_table', 8),
(27, '2024_03_11_062806_add_belt_image_to_promotions', 9),
(28, '2024_03_11_101032_change_date_column_in_promotions', 10),
(29, '2024_03_11_103406_drop_column_in_users', 11),
(30, '2024_03_11_115803_add_columns_to_users', 12),
(31, '2024_03_11_130922_add_type_to_assessment_l2_s', 13),
(32, '2024_03_11_150404_create_mark_assessment_l2_s_table', 14),
(33, '2024_03_12_071122_change_dob_column_in_users', 15),
(34, '2024_03_12_114358_create_belt_ranks_table', 16),
(35, '2024_03_12_124214_drop_column_in_promotions', 17),
(36, '2024_03_12_124547_add_column_in_promotions', 17);

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `privacy_policies`
--

CREATE TABLE `privacy_policies` (
  `id` bigint UNSIGNED NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `privacy_policies`
--

INSERT INTO `privacy_policies` (`id`, `detail`, `status`, `created_at`, `updated_at`) VALUES
(1, '<p>Eum animi reiciendis et impedit porro sed&nbsp;<br>obcaecati quos sit repudiandae accusantium vel deserunt rerum et molestiae omnis eum nulla nemo. Ab officia reprehenderit ut sunt porro aut eveniet velit non libero dolorem. Qui labore voluptas rem beatae consequatur&nbsp;<br>qui maiores illo ad natus nihil ut internos fugit et ipsum dolores.</p><p>Lorem ipsum dolor sit amet. Non quia autem et atque blanditiis sit quasi voluptate et eligendi omnis qui enim nulla cum voluptatem<br>enim aut laudantium alias? Quo cupiditate perspiciatis sit veritatis voluptate est eaque quasi eos officiis odio vel eius magnam?Aut consequuntur rerum nam accusamus voluptatibus et nihil corporis qui accusamus quae non autem veniam. Et expedita illo cum labore neque in labore voluptas. Et quae error qui voluptates doloremque sed repellendus iusto aut voluptatum iure aut Quis quasi. Qui ullam consequuntur et nisi labore quo eaque iusto?</p>', 0, '2023-12-12 05:59:57', '2024-03-22 11:03:13');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `belt_image_id` bigint UNSIGNED DEFAULT NULL,
  `date` date DEFAULT NULL,
  `academy` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `professor` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `user_id`, `belt_image_id`, `date`, `academy`, `professor`, `notes`, `created_at`, `updated_at`) VALUES
(3, 9, 1, '2023-11-29', 'Tecbeck', 'Haseeb Raza', 'Dummy', '2023-12-06 06:48:07', '2023-12-06 06:48:07'),
(5, 15, NULL, '2023-12-07', 'home academy', 'prof.', NULL, '2023-12-07 13:54:25', '2023-12-07 13:54:25'),
(9, 22, NULL, '2023-12-13', 'ghhh', 'hhh', 'Vbbh', '2023-12-13 12:30:49', '2023-12-13 12:30:49'),
(10, 25, NULL, '2023-12-18', 'academy 1', 'professor 1', 'Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu..Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsuAcademy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu..Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsuAcademy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu..Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsuAcademy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.', '2023-12-18 10:56:12', '2023-12-18 10:56:12'),
(11, 25, NULL, '2023-12-18', 'academy 2', 'professor 2', 'Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu..Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsuAcademy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu..Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsuAcademy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu..Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsuAcademy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.', '2023-12-18 10:57:03', '2023-12-18 10:57:03'),
(12, 25, NULL, '2023-12-18', 'academy 4', 'professor 4', 'Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu..Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsuAcademy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu..Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsuAcademy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu..Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsuAcademy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.', '2023-12-18 10:57:50', '2023-12-18 10:57:50'),
(13, 25, NULL, '2023-12-18', 'zhys', 'hsys', 'Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu..Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsuAcademy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu..Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsuAcademy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu..Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsuAcademy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.xohxogxogxoxogxigxixupxigxigxogxogxoyxyodoycogfoyfooggoxoitfxohxogxogxoxogxigxixupxigxigxogxogxoyxyodoycogfoyfooggoxoitfAcademy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu..Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsuAcademy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu..Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsuAcademy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu..Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsuAcademy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.xohxogxogxoxogxigxixupxigxigxogxogxoyxyodoycogfoyfooggoxoitfxohxogxogxoxogxigxixupxigxigxogxogxoyxyodoycogfoyfooggoxoitfAcademy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu..Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsuAcademy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu..Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsuAcademy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu..Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsuAcademy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.xohxogxogxoxogxigxixupxigxigxogxogxoyxyodoycogfoyfooggoxoitfxohxogxogxoxogxigxixupxigxigxogxogxoyxyodoycogfoyfooggoxoitf', '2023-12-18 13:59:11', '2023-12-18 13:59:11'),
(15, 26, NULL, '2023-12-15', 'gh', 'ghh', NULL, '2023-12-19 10:07:05', '2023-12-19 10:07:05'),
(16, 26, NULL, '2023-12-19', 'bb', 'bb', NULL, '2023-12-19 10:36:56', '2023-12-19 10:36:56'),
(19, 32, NULL, '2023-12-28', 'academy', 'John', 'No', '2023-12-20 14:33:13', '2023-12-20 14:33:13'),
(20, 38, NULL, '2024-01-02', 'Forex', 'Mrs thai', 'Promotional description', '2024-01-02 16:08:05', '2024-01-02 16:08:05'),
(21, 39, NULL, '2024-01-03', 'JJ competition training academy', 'venom', 'Test', '2024-01-03 16:04:40', '2024-01-03 16:04:40'),
(27, 43, NULL, '2024-03-08', 'ngnf', 'ngng', 'Tmmfmf', '2024-03-08 14:07:37', '2024-03-08 14:07:37'),
(42, 43, NULL, '2023-03-11', 'Tecbeck', 'Haseeb Raza', 'Dummy', '2024-03-11 11:01:05', '2024-03-11 11:01:05'),
(43, 43, NULL, '2024-03-11', 'Tecbeck', 'Haseeb Raza', 'Dummy', '2024-03-11 11:03:32', '2024-03-11 11:03:32'),
(44, 43, NULL, '2024-03-11', 'Tecbeck', 'Haseeb Raza', 'Dummy', '2024-03-11 11:03:42', '2024-03-11 11:03:42'),
(45, 43, NULL, '2024-03-11', 'Tecbeck', 'Haseeb Raza', 'Dummy', '2024-03-11 11:07:42', '2024-03-11 11:07:42'),
(50, 2, NULL, '2024-03-11', 'Tecbeck', 'Haseeb Raza', 'Dummy', '2024-03-11 16:33:29', '2024-03-11 16:33:29'),
(59, 51, NULL, '2023-03-11', 'Tecbeck', 'Haseeb Raza', 'Dummy', '2024-03-12 04:45:40', '2024-03-12 04:45:40'),
(61, 51, NULL, '2024-03-12', 'academy', 'professor', 'Eb ejej', '2024-03-12 04:59:03', '2024-03-12 04:59:03'),
(63, 18, 2, '2023-11-29', 'Tecbeck', 'Haseeb Raza', 'Dummy', '2024-03-12 14:03:09', '2024-03-12 14:03:09'),
(64, 49, 4, '2024-03-12', 'academy', 'prof', 'Sdssd', '2024-03-12 14:38:23', '2024-03-12 14:38:23'),
(65, 49, 42, '2024-03-23', 'qqq', 'qqqq', 'Qqq', '2024-03-12 14:42:53', '2024-03-12 14:42:53'),
(67, 56, 8, '2024-03-11', 'academy 1', 'professor 1', 'Lorem ipsum', '2024-03-12 15:49:36', '2024-03-12 15:57:03'),
(68, 56, 31, '2024-03-11', 'academy 2', 'professor 2', 'Lorem ipsum', '2024-03-12 15:50:08', '2024-03-12 15:50:08'),
(69, 57, 18, '2024-03-11', 'ac1', 'prof1', 'Notes', '2024-03-12 18:52:04', '2024-03-12 18:52:04'),
(70, 57, 41, '2024-03-12', 'ac2', 'prf2', 'Notes', '2024-03-12 18:52:38', '2024-03-12 18:53:24'),
(82, 18, 3, '2024-03-13', 'sd', 'xz', 'D', '2024-03-13 08:57:49', '2024-03-13 08:57:49'),
(83, 68, 12, '2024-03-03', 'ac', 'sbwn', 'Ennw', '2024-03-13 11:09:30', '2024-03-13 11:09:30'),
(87, 71, 42, '2023-03-13', 'bzsn', 'sbsn', 'Snsn', '2024-03-13 11:37:06', '2024-03-13 11:37:06'),
(88, 74, 42, '2024-03-11', 'bzn', 'sndn', 'Wnen', '2024-03-13 11:53:37', '2024-03-13 11:53:37'),
(89, 74, 11, '2024-03-03', 'end', 's s', 'D e', '2024-03-13 11:54:19', '2024-03-13 11:54:19'),
(90, 75, 37, '2023-12-19', 'Drgon’s Den', 'M Sawada', NULL, '2024-03-13 14:43:40', '2024-03-13 14:43:40'),
(98, 75, 1, '2008-04-16', 'wwww', 'wwwww', NULL, '2024-03-15 14:04:58', '2024-03-15 14:04:58'),
(99, 77, 1, '2008-04-16', 'Shooto Gym roots', 'K Kusayanagi', 'I started Jiu-Jitsu today!', '2024-03-15 14:08:29', '2024-03-15 14:08:29'),
(100, 77, 19, '2010-05-12', 'Shooto Gym roots', 'K Kusayanagi', NULL, '2024-03-15 14:09:42', '2024-03-15 14:09:42'),
(101, 77, 24, '2012-05-23', 'Shooto Gum roots', 'K Kusayanagi', NULL, '2024-03-15 14:12:41', '2024-03-15 14:12:41'),
(102, 77, 29, '2013-10-20', 'Shooto Gum roots', 'K Kusayanagi', NULL, '2024-03-15 14:13:29', '2024-03-15 14:13:29'),
(103, 77, 34, '2014-12-19', 'Shooto Gum roots', 'K Kusayanagi', NULL, '2024-03-15 14:14:11', '2024-03-15 14:14:11'),
(104, 77, 35, '2019-10-17', 'Carpe Diem Hope', 'D Shiraki', NULL, '2024-03-15 14:15:02', '2024-03-15 14:15:02'),
(105, 77, 36, '2022-09-01', 'Dragon’s Den', 'M Sawada', NULL, '2024-03-15 14:15:46', '2024-03-15 14:15:46'),
(106, 77, 37, '2023-12-19', 'Dragon’s Den', 'M Sawada', NULL, '2024-03-15 14:16:29', '2024-03-15 14:16:29');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` bigint UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `link` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `image`, `link`, `created_at`, `updated_at`) VALUES
(1, 'social_media/W4QkoOiJHjvuQTeK1qw4JkrX73GhzeIfRvfqaLxC.jpg', 'https://www.instagram.com/brain_jiu_jitsu?igsh=YjlvNmQ5MndocmJv&utm_source=qr', '2024-03-11 13:59:16', '2024-03-15 13:01:16'),
(2, 'social_media/iHGxl510QoRj7GYDhc9yRtdzCzZQRT398vU0OzqG.png', 'https://www.youtube.com/channel/UC9WABTW2-7pLyZjTrzkhdeA', '2024-03-15 12:57:14', '2024-03-15 13:01:05');

-- --------------------------------------------------------

--
-- Table structure for table `sub_assessments`
--

CREATE TABLE `sub_assessments` (
  `id` bigint UNSIGNED NOT NULL,
  `assessment_id` bigint UNSIGNED NOT NULL,
  `order_number` int DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_assessments`
--

INSERT INTO `sub_assessments` (`id`, `assessment_id`, `order_number`, `title`, `thumbnail`, `status`, `created_at`, `updated_at`) VALUES
(3, 5, 5, 'Closed', 'storage/sub_assessment/WkYeeg.jpeg', 1, '2024-02-05 11:23:07', '2024-03-20 13:25:15'),
(4, 5, 10, 'Half', 'storage/sub_assessment/EeOgv3.jpeg', 1, '2024-02-05 11:24:21', '2024-03-20 13:27:43'),
(5, 5, 17, 'Shin-to-Shin', 'storage/sub_assessment/C729gY.jpeg', 1, '2024-02-05 11:25:52', '2024-03-20 13:32:14'),
(6, 5, 4, 'Butterfly (Hook)', 'storage/sub_assessment/Ps8Gap.jpeg', 1, '2024-02-05 11:26:34', '2024-03-20 13:24:34'),
(7, 5, 11, 'Impassable', 'storage/sub_assessment/wjEnkh.jpeg', 1, '2024-02-05 11:27:18', '2024-03-20 13:28:17'),
(8, 5, 6, 'Collar Sleeve', 'storage/sub_assessment/qhwq92.jpeg', 1, '2024-02-05 11:27:58', '2024-03-20 13:25:47'),
(9, 5, 14, 'Lasso (Spider)', 'storage/sub_assessment/FFRzYQ.jpeg', 1, '2024-02-05 11:28:39', '2024-03-20 13:29:44'),
(10, 5, 21, 'Unstoppable', 'storage/sub_assessment/GYOEQQ.jpeg', 1, '2024-02-05 11:29:18', '2024-03-20 13:34:31'),
(11, 5, 23, 'Worm', 'storage/sub_assessment/Zbq9pN.jpeg', 1, '2024-02-05 11:29:55', '2024-03-20 13:35:47'),
(12, 5, 22, 'Waiter', 'storage/sub_assessment/TUE0AZ.jpeg', 1, '2024-02-05 11:30:26', '2024-03-20 13:35:08'),
(13, 5, 20, 'Squid', 'storage/sub_assessment/WmWFYN.jpeg', 1, '2024-02-05 11:30:57', '2024-03-20 13:33:58'),
(14, 5, 25, '50/50', 'storage/sub_assessment/xzlFby.jpeg', 1, '2024-02-05 11:32:06', '2024-03-20 13:21:05'),
(15, 5, 8, 'Double', 'storage/sub_assessment/lyT4cR.jpeg', 1, '2024-02-05 11:32:50', '2024-03-20 13:27:14'),
(16, 5, 2, 'Anubis', 'storage/sub_assessment/mVBCZn.jpeg', 1, '2024-02-05 11:33:22', '2024-03-20 13:23:49'),
(17, 5, 16, 'Rubber', 'storage/sub_assessment/E1o8RR.jpeg', 1, '2024-02-05 11:41:57', '2024-03-20 13:31:42'),
(18, 5, 7, 'De La Riva', 'storage/sub_assessment/CTkkfa.jpeg', 1, '2024-02-05 11:43:25', '2024-03-20 13:26:13'),
(19, 5, 16, 'Reverse De La Riva (Spiral)', 'storage/sub_assessment/Mzqo5n.jpeg', 1, '2024-02-05 11:44:14', '2024-03-20 13:31:12'),
(20, 5, 24, 'X', 'storage/sub_assessment/E0dRSN.jpeg', 1, '2024-02-05 11:44:37', '2024-03-20 13:36:36'),
(21, 5, 18, 'Single Leg X', 'storage/sub_assessment/0Pq8ag.jpeg', 1, '2024-02-05 11:45:06', '2024-03-20 13:32:47'),
(22, 5, 12, 'Inverted', 'storage/sub_assessment/FTiF8y.jpeg', 1, '2024-02-05 11:45:34', '2024-03-20 13:28:43'),
(23, 5, 9, 'Donkey', 'storage/sub_assessment/vku7zt.jpeg', 1, '2024-02-05 11:46:03', '2024-03-20 13:26:45'),
(24, 5, 15, 'Matrix', 'storage/sub_assessment/pEodOx.jpeg', 1, '2024-02-05 11:46:34', '2024-03-20 13:30:18'),
(25, 5, 13, 'K', 'storage/sub_assessment/8q9oDy.jpeg', 1, '2024-02-05 11:46:59', '2024-03-20 13:29:16'),
(26, 5, 19, 'Sit Up (Seated)', 'storage/sub_assessment/0qZfXA.jpeg', 1, '2024-02-05 11:47:57', '2024-03-20 13:33:20'),
(27, 5, 3, 'Body X', 'storage/sub_assessment/hs1Hbu.jpeg', 1, '2024-02-05 11:48:31', '2024-03-20 13:24:08'),
(41, 6, 39, 'Mount', 'storage/sub_assessment/ZQCeoh.jpeg', 1, '2024-02-05 13:42:52', '2024-03-21 06:57:13'),
(42, 6, 40, 'Side', 'storage/sub_assessment/ZKoAYv.jpeg', 1, '2024-02-05 13:43:44', '2024-03-21 06:59:48'),
(43, 6, 41, 'Close', 'storage/sub_assessment/1U5Cip.jpeg', 1, '2024-02-05 13:44:29', '2024-03-21 06:52:56'),
(44, 6, 42, 'Knee on Belly', 'storage/sub_assessment/8nIWr1.jpeg', 1, '2024-02-05 13:44:59', '2024-03-21 06:56:41'),
(45, 6, 43, 'North South', 'storage/sub_assessment/4zBLKc.jpeg', 1, '2024-02-05 13:45:34', '2024-03-21 06:57:43'),
(46, 6, 44, 'Inoki Ali', 'storage/sub_assessment/0lM4kp.jpeg', 1, '2024-02-05 13:46:03', '2024-03-21 06:54:26'),
(47, 6, 45, 'Turtle', 'storage/sub_assessment/rvRgeQ.jpeg', 1, '2024-02-05 13:46:30', '2024-03-21 07:01:23'),
(48, 6, 46, 'Parterre', 'storage/sub_assessment/1dWyje.jpeg', 1, '2024-02-05 13:47:32', '2024-03-21 06:58:49'),
(49, 6, 47, 'Sprawling', 'storage/sub_assessment/NLyN5O.jpeg', 1, '2024-02-05 13:48:20', '2024-03-21 07:02:43'),
(50, 6, 48, 'Back', 'storage/sub_assessment/BDLkc8.jpeg', 1, '2024-02-05 13:48:56', '2024-03-21 06:52:22'),
(51, 6, 49, 'Back mount', 'storage/sub_assessment/TxG13P.jpeg', 1, '2024-02-05 13:49:19', '2024-03-21 06:51:53'),
(52, 6, 50, '50/50', 'storage/sub_assessment/8e72j7.jpeg', 1, '2024-02-05 13:49:59', '2024-03-21 06:51:41'),
(53, 6, 51, 'Single Leg X', 'storage/sub_assessment/25X6bW.jpeg', 1, '2024-02-05 13:50:37', '2024-03-21 07:00:06'),
(54, 6, 52, 'Half', 'storage/sub_assessment/pnfRVa.jpeg', 1, '2024-02-05 13:51:09', '2024-03-21 06:54:07'),
(55, 6, 53, 'Deep Half', 'storage/sub_assessment/5Zru4E.jpeg', 1, '2024-02-05 13:51:47', '2024-03-21 06:53:55'),
(56, 6, 54, 'Reverse Half', 'storage/sub_assessment/j6xjx1.jpeg', 1, '2024-02-05 13:52:12', '2024-03-21 06:59:06'),
(57, 6, 55, 'Stack', 'storage/sub_assessment/EqNJG5.jpeg', 1, '2024-02-05 13:52:42', '2024-03-21 07:02:12'),
(58, 6, 56, 'Kesagatame', 'storage/sub_assessment/rnm7t9.jpeg', 1, '2024-02-05 13:53:19', '2024-03-21 06:56:23'),
(59, 6, 57, 'Spider', 'storage/sub_assessment/zZUtep.jpeg', 1, '2024-02-05 13:53:51', '2024-03-21 07:00:39'),
(60, 6, 58, 'Worm', 'storage/sub_assessment/AU0hNU.jpeg', 1, '2024-02-05 13:54:35', '2024-03-21 07:01:09'),
(61, 6, 59, 'Sit Up', 'storage/sub_assessment/l56Fmf.jpeg', 1, '2024-02-05 13:55:26', '2024-03-21 07:00:23'),
(62, 6, 60, 'De La Riva', 'storage/sub_assessment/ou6ZUX.jpeg', 1, '2024-02-05 13:56:38', '2024-03-21 06:53:41'),
(63, 2, 61, 'Mendes', 'storage/sub_assessment/ittAHV.jpeg', 1, '2024-02-05 13:58:29', '2024-03-21 06:45:53'),
(64, 2, 62, 'São Paulo', 'storage/sub_assessment/VKl1iL.jpeg', 1, '2024-02-05 13:58:59', '2024-03-21 06:48:51'),
(65, 2, 63, 'Cartwheel', 'storage/sub_assessment/AG3Ob7.jpeg', 1, '2024-02-05 13:59:31', '2024-03-20 21:44:49'),
(66, 2, 64, 'Hip Switch', 'storage/sub_assessment/BnZYhk.jpeg', 1, '2024-02-05 14:02:33', '2024-03-20 21:49:15'),
(67, 2, 65, 'Stack (Double under)', 'storage/sub_assessment/lwi6px.jpeg', 1, '2024-02-05 14:05:11', '2024-03-21 06:49:56'),
(68, 2, 66, 'Leg Pin', 'storage/sub_assessment/WDJKpN.jpeg', 1, '2024-02-05 14:05:37', '2024-03-21 06:44:39'),
(69, 2, 67, 'Duck Under', 'storage/sub_assessment/Ajgugv.jpeg', 1, '2024-02-05 14:06:02', '2024-03-20 21:46:16'),
(70, 2, 68, 'Over Under', 'storage/sub_assessment/RbYyYz.jpeg', 1, '2024-02-05 14:06:44', '2024-03-21 06:46:06'),
(71, 2, 69, 'Knee Slice', 'storage/sub_assessment/Gv4sQA.jpeg', 1, '2024-02-05 14:07:09', '2024-03-20 21:48:58'),
(72, 2, 70, 'Cradle', 'storage/sub_assessment/d0UGrx.jpeg', 1, '2024-02-05 14:07:33', '2024-03-20 21:45:20'),
(73, 2, 71, 'Sprawl', 'storage/sub_assessment/pCyYYG.jpeg', 1, '2024-02-05 14:07:57', '2024-03-21 06:49:39'),
(74, 2, 72, 'Back Step', 'storage/sub_assessment/SJmear.jpeg', 1, '2024-02-05 14:08:23', '2024-03-20 21:44:20'),
(75, 2, 73, 'Body Lock', 'storage/sub_assessment/zhHfGw.jpeg', 1, '2024-02-05 14:08:53', '2024-03-20 21:44:36'),
(76, 2, 74, 'Reverse Body Lock', 'storage/sub_assessment/dnAMjH.jpeg', 1, '2024-02-05 14:09:24', '2024-03-21 06:47:03'),
(77, 2, 75, 'Floating', 'storage/sub_assessment/8qbXOj.jpeg', 1, '2024-02-05 14:10:01', '2024-03-20 21:47:27'),
(78, 2, 76, 'Leg Weave', 'storage/sub_assessment/RhkAHs.jpeg', 1, '2024-02-05 14:10:37', '2024-03-21 06:45:12'),
(79, 2, 77, 'Step Out', 'storage/sub_assessment/d3i767.jpeg', 1, '2024-02-05 14:11:05', '2024-03-21 06:50:11'),
(80, 2, 78, 'Long Step', 'storage/sub_assessment/sm28X8.jpeg', 1, '2024-02-05 14:11:31', '2024-03-21 06:45:35'),
(81, 2, 79, 'Rolling Kimura', 'storage/sub_assessment/MisOeJ.jpeg', 1, '2024-02-05 14:11:58', '2024-03-21 06:48:23'),
(82, 2, 80, 'Crazy Dog', 'storage/sub_assessment/SJ1BPd.jpeg', 1, '2024-02-05 14:12:23', '2024-03-20 21:45:35'),
(83, 2, 81, 'Lasso', 'storage/sub_assessment/1amAv2.jpeg', 1, '2024-02-05 14:12:43', '2024-03-20 21:48:10'),
(84, 2, 82, 'Lapel', 'storage/sub_assessment/EDAM6b.jpeg', 1, '2024-02-05 14:13:10', '2024-03-20 21:48:23'),
(85, 2, 83, 'Toreando', 'storage/sub_assessment/sD5bY8.jpeg', 1, '2024-02-05 14:13:41', '2024-03-21 06:50:42'),
(86, 2, 84, 'Rolling', 'storage/sub_assessment/31bBdg.jpeg', 1, '2024-02-05 14:14:12', '2024-03-21 06:48:36'),
(87, 2, 85, 'Leg Pummeling', 'storage/sub_assessment/Q6tWHr.jpeg', 1, '2024-02-05 14:14:49', '2024-03-21 06:44:55'),
(88, 2, 86, 'De La Riva', 'storage/sub_assessment/41WBXK.jpeg', 1, '2024-02-05 14:15:21', '2024-03-20 21:46:03'),
(89, 2, 87, 'Spider', 'storage/sub_assessment/9FHXch.jpeg', 1, '2024-02-05 14:15:41', '2024-03-21 06:49:24'),
(90, 2, 88, 'Gator Roll', 'storage/sub_assessment/bg0Sfq.jpeg', 1, '2024-02-05 14:16:18', '2024-03-20 21:49:37'),
(91, 2, 89, 'Quick', 'storage/sub_assessment/PgdHsl.jpeg', 1, '2024-02-05 14:16:47', '2024-03-21 06:46:50'),
(92, 2, 90, 'Pretzel', 'storage/sub_assessment/Ik4teT.jpeg', 1, '2024-02-05 14:17:12', '2024-03-21 06:46:20'),
(93, 2, 91, 'Lapel Lasso', 'storage/sub_assessment/tH9VOI.jpeg', 1, '2024-02-05 14:17:41', '2024-03-20 21:48:42'),
(94, 2, 92, 'Surfer', 'storage/sub_assessment/r5Phz3.jpeg', 1, '2024-02-05 14:18:03', '2024-03-21 06:50:25'),
(95, 2, 93, 'Push Kick', 'storage/sub_assessment/SnSK39.jpeg', 1, '2024-02-05 14:18:32', '2024-03-21 06:46:35'),
(96, 2, 94, 'Cross Step', 'storage/sub_assessment/MxZb7u.jpeg', 1, '2024-02-05 14:18:52', '2024-03-20 21:45:49'),
(97, 2, 95, 'Shin Pin', 'storage/sub_assessment/lyu3Pj.jpeg', 1, '2024-02-05 14:19:14', '2024-03-21 06:49:06'),
(98, 2, 96, 'Leg Drag', 'storage/sub_assessment/0LKZf1.jpeg', 1, '2024-02-05 14:19:46', '2024-03-20 21:47:40'),
(99, 2, 97, 'X', 'storage/sub_assessment/jnGomd.jpeg', 1, '2024-02-05 14:20:09', '2024-03-20 21:47:03'),
(100, 2, 98, 'Folding', 'storage/sub_assessment/T1bUw0.jpeg', 1, '2024-02-05 14:20:33', '2024-03-20 21:49:53'),
(101, 2, 99, 'Catching Waves', 'storage/sub_assessment/lP947t.jpeg', 1, '2024-02-05 14:21:06', '2024-03-20 21:45:04'),
(102, 2, 100, 'Fishnet', 'storage/sub_assessment/Y73t9c.jpeg', 1, '2024-02-05 14:22:01', '2024-03-20 21:46:29'),
(103, 2, 101, 'Leap Frog', 'storage/sub_assessment/PRUCgd.jpeg', 1, '2024-02-05 14:22:30', '2024-03-20 21:47:54'),
(104, 2, 102, 'Windshield Wiper', 'storage/sub_assessment/O5k4C9.jpeg', 1, '2024-02-05 14:23:06', '2024-03-20 21:46:46'),
(109, 7, 107, 'Fireman’s Carry', 'storage/sub_assessment/E51qfn.jpeg', 1, '2024-02-05 20:31:36', '2024-03-20 16:43:39'),
(110, 7, 108, 'Double Leg', 'storage/sub_assessment/APDSQW.jpeg', 1, '2024-02-05 20:32:13', '2024-03-20 16:42:41'),
(111, 7, 109, 'Single leg', 'storage/sub_assessment/bd0dSS.jpeg', 1, '2024-02-05 20:32:44', '2024-03-20 21:34:37'),
(112, 7, 110, 'High Crotch', 'storage/sub_assessment/xjyQfc.jpeg', 1, '2024-02-05 20:33:26', '2024-03-20 21:22:26'),
(113, 7, 111, 'Ippon Seoi', 'storage/sub_assessment/iR5RAu.jpeg', 1, '2024-02-05 20:35:29', '2024-03-20 21:23:20'),
(114, 7, 112, 'Maki nage', 'storage/sub_assessment/N1ZzUf.jpeg', 1, '2024-02-05 20:35:55', '2024-03-20 21:28:41'),
(115, 7, 113, 'Kubi nage', 'storage/sub_assessment/SXPk08.jpeg', 1, '2024-02-05 20:36:24', '2024-03-20 21:24:09'),
(116, 7, 114, 'Sori nage', 'storage/sub_assessment/0dlwqN.jpeg', 1, '2024-02-05 20:36:49', '2024-03-20 21:34:02'),
(117, 7, 115, 'Neck and Arm', 'storage/sub_assessment/CHHWOg.jpeg', 1, '2024-02-05 20:37:22', '2024-03-20 21:28:08'),
(118, 7, 116, 'Low tackle', 'storage/sub_assessment/4qTzgS.jpeg', 1, '2024-02-05 20:37:50', '2024-03-20 21:28:59'),
(119, 7, 117, 'Under hook', 'storage/sub_assessment/Ha1Es4.jpeg', 1, '2024-02-05 20:38:24', '2024-03-20 21:40:35'),
(120, 7, 118, 'Over hook', 'storage/sub_assessment/8nZZz4.jpeg', 1, '2024-02-05 20:38:46', '2024-03-20 21:30:16'),
(121, 7, 119, 'Bear Hug', 'storage/sub_assessment/0nVfJw.jpeg', 1, '2024-02-05 20:39:18', '2024-03-20 16:41:05'),
(122, 7, 120, 'Spin around', 'storage/sub_assessment/1z0t2x.jpeg', 1, '2024-02-05 20:39:45', '2024-03-20 21:33:31'),
(123, 7, 121, 'Duck Under', 'storage/sub_assessment/1pjrRP.jpeg', 1, '2024-02-05 20:40:10', '2024-03-20 16:43:10'),
(124, 7, 122, 'Leg trip', 'storage/sub_assessment/Vdj26R.jpeg', 1, '2024-02-05 20:40:36', '2024-03-20 21:29:21'),
(125, 7, 123, 'Ankle pick', 'storage/sub_assessment/uS0A2W.jpeg', 1, '2024-02-05 20:43:58', '2024-03-20 16:40:16'),
(126, 7, 124, 'Collar Drag', 'storage/sub_assessment/H11wCY.jpeg', 1, '2024-02-05 20:44:22', '2024-03-20 16:41:25'),
(127, 7, 125, 'Deashi Harai', 'storage/sub_assessment/LQgYg1.jpeg', 1, '2024-02-06 01:35:13', '2024-03-20 16:42:10'),
(128, 7, 126, 'Hiza Guruma', 'storage/sub_assessment/sLQ2hO.jpeg', 1, '2024-02-06 01:35:51', '2024-03-20 21:23:03'),
(129, 7, 127, 'Sasae Tsurikomi Ashi', 'storage/sub_assessment/VEWgI3.jpeg', 1, '2024-02-06 01:36:31', '2024-03-20 21:30:00'),
(130, 7, 3, 'Osoto Gari', 'storage/sub_assessment/z1huIC.jpeg', 1, '2024-02-06 01:36:59', '2024-03-20 21:31:54'),
(131, 7, 128, 'Ouchi Gari', 'storage/sub_assessment/DvZ6in.jpeg', 1, '2024-02-06 01:37:30', '2024-03-20 21:30:36'),
(132, 7, 129, 'Kosoto Gari', 'storage/sub_assessment/7YIKYu.jpeg', 1, '2024-02-06 01:37:59', '2024-03-20 21:25:13'),
(133, 7, 130, 'Kouchi Gari', 'storage/sub_assessment/HVrLbr.jpeg', 1, '2024-02-06 01:38:22', '2024-03-20 21:24:44'),
(134, 7, 131, 'Okuri Ashi Harai', 'storage/sub_assessment/KmF13b.jpeg', 1, '2024-02-06 01:38:52', '2024-03-20 21:26:46'),
(135, 7, 132, 'Uchi Mata', 'storage/sub_assessment/YODXev.jpeg', 1, '2024-02-06 01:39:16', '2024-03-20 21:35:57'),
(136, 7, 133, 'Kosoto Gake', 'storage/sub_assessment/CmgEKx.jpeg', 1, '2024-02-06 01:39:50', '2024-03-20 21:25:28'),
(137, 7, 134, 'Ashi Guruma', 'storage/sub_assessment/wG2jHg.jpeg', 1, '2024-02-06 01:40:16', '2024-03-20 16:40:41'),
(138, 7, 135, 'Harai Tsurikomi Ashi', 'storage/sub_assessment/ObofEw.jpeg', 1, '2024-02-06 01:40:54', '2024-03-20 21:21:55'),
(139, 7, 136, 'O Guruma', 'storage/sub_assessment/wftB6N.jpeg', 1, '2024-02-06 01:43:17', '2024-03-20 21:27:33'),
(140, 7, 137, 'Osoto Guruma', 'storage/sub_assessment/9rLyKt.jpeg', 1, '2024-02-06 01:44:00', '2024-03-20 21:31:38'),
(141, 7, 138, 'Osoto Otoshi', 'storage/sub_assessment/W373zI.jpeg', 1, '2024-02-06 01:44:34', '2024-03-20 21:31:06'),
(142, 7, 139, 'Tsubame Gaeshi', 'storage/sub_assessment/ns87e3.jpeg', 1, '2024-02-06 01:45:13', '2024-03-20 21:37:15'),
(143, 7, 140, 'Osoto Gaeshi', 'storage/sub_assessment/DVxCUF.jpeg', 1, '2024-02-06 01:45:42', '2024-03-20 21:32:08'),
(144, 7, 141, 'Ouchi Gaeshi', 'storage/sub_assessment/lvtoGY.jpeg', 1, '2024-02-06 01:46:06', '2024-03-20 21:30:52'),
(145, 7, 142, 'Hanegoshi Gaeshi', 'storage/sub_assessment/gwDbYj.jpeg', 1, '2024-02-06 01:46:35', '2024-03-20 21:21:10'),
(146, 7, 143, 'Haraigoshi Gaeshi', 'storage/sub_assessment/3AXAo0.jpeg', 1, '2024-02-06 01:47:07', '2024-03-20 21:22:10'),
(147, 7, 144, 'Uchimata Gaeshi', 'storage/sub_assessment/lKbk84.jpeg', 1, '2024-02-06 01:47:35', '2024-03-20 21:35:38'),
(148, 7, 145, 'Tomoe Nage', 'storage/sub_assessment/HJ2qm3.jpeg', 1, '2024-02-06 01:51:37', '2024-03-20 21:37:34'),
(149, 7, 146, 'Sumi Geshi', 'storage/sub_assessment/xCVYib.jpeg', 1, '2024-02-06 01:52:03', '2024-03-20 21:32:58'),
(150, 7, 147, 'Hikikomi Gaeshi', 'storage/sub_assessment/d19Yzh.jpeg', 1, '2024-02-06 01:52:30', '2024-03-20 21:22:49'),
(151, 7, 148, 'Tawara Gaeshi', 'storage/sub_assessment/2fCwEg.jpeg', 1, '2024-02-06 01:52:58', '2024-03-20 21:37:57'),
(152, 7, 149, 'Ura Nage', 'storage/sub_assessment/sfXwyw.jpeg', 1, '2024-02-06 01:53:22', '2024-03-20 21:40:13'),
(153, 7, 150, 'Uchimata Makikomi', 'storage/sub_assessment/XoY9Zl.jpeg', 1, '2024-02-06 01:53:55', '2024-03-20 21:35:21'),
(154, 7, 151, 'Osoto Makikomi', 'storage/sub_assessment/WH5Jtj.jpeg', 1, '2024-02-06 01:54:18', '2024-03-20 21:31:24'),
(155, 7, 152, 'Harai Makikomi', 'storage/sub_assessment/fgHYbB.jpeg', 1, '2024-02-06 01:54:43', '2024-03-20 21:21:40'),
(156, 7, 153, 'Kouchi Makikomi', 'storage/sub_assessment/CCLBrG.jpeg', 1, '2024-02-06 01:55:09', '2024-03-20 21:24:26'),
(157, 7, 154, 'Kawazu Gake', 'storage/sub_assessment/lmcB9E.jpeg', 1, '2024-02-06 01:55:43', '2024-03-20 21:26:24'),
(158, 7, 155, 'Seoi Nage', 'storage/sub_assessment/8FoA5v.jpeg', 1, '2024-02-06 01:56:34', '2024-03-20 21:29:44'),
(159, 7, 156, 'Tai Otoshi', 'storage/sub_assessment/0GODN1.jpeg', 1, '2024-02-06 01:57:33', '2024-03-20 21:32:24'),
(160, 7, 157, 'Seoi Otoshi', 'storage/sub_assessment/OLDIBG.jpeg', 1, '2024-02-06 01:58:03', '2024-03-20 21:34:51'),
(161, 7, 158, 'Kata Guruma', 'storage/sub_assessment/ORVFJC.jpeg', 1, '2024-02-06 01:58:27', '2024-03-20 21:23:36'),
(162, 7, 159, 'Sukui Nage', 'storage/sub_assessment/yOgENA.jpeg', 1, '2024-02-06 01:58:59', '2024-03-20 21:33:15'),
(163, 7, 160, 'Obi Otoshi', 'storage/sub_assessment/aY71r7.jpeg', 1, '2024-02-06 01:59:24', '2024-03-20 21:27:17'),
(164, 7, 161, 'Uki Otoshi', 'storage/sub_assessment/NtDxR8.jpeg', 1, '2024-02-06 01:59:50', '2024-03-20 21:41:13'),
(165, 7, 162, 'Sumi Otoshi', 'storage/sub_assessment/04HUTR.jpeg', 1, '2024-02-06 02:00:13', '2024-03-20 21:32:42'),
(166, 7, 163, 'Yama Arashi', 'storage/sub_assessment/8TpXD5.jpeg', 1, '2024-02-06 02:00:47', '2024-03-20 21:39:31'),
(167, 7, 164, 'Obitori Gaeshi', 'storage/sub_assessment/R8GuT1.jpeg', 1, '2024-02-06 02:01:15', '2024-03-20 21:27:02'),
(168, 7, 165, 'Morote Gari', 'storage/sub_assessment/NTxYCx.jpeg', 1, '2024-02-06 02:01:41', '2024-03-20 21:28:25'),
(169, 7, 166, 'Kuchiki Taoshi', 'storage/sub_assessment/D9hCEZ.jpeg', 1, '2024-02-06 02:02:15', '2024-03-20 21:23:53'),
(170, 7, 167, 'Kibisu Gaeshi', 'storage/sub_assessment/2d0Jby.jpeg', 1, '2024-02-06 02:03:03', '2024-03-20 21:26:08'),
(171, 7, 168, 'Uchimata Sukashi', 'storage/sub_assessment/pdeMOQ.jpeg', 1, '2024-02-06 02:03:28', '2024-03-20 21:41:50'),
(172, 7, 169, 'Kouchi Gaeshi', 'storage/sub_assessment/tZuh2S.jpeg', 1, '2024-02-06 02:03:55', '2024-03-20 21:24:58'),
(173, 7, 170, 'Uki Goshi', 'storage/sub_assessment/oRQPbd.jpeg', 1, '2024-02-06 02:04:19', '2024-03-20 21:41:31'),
(174, 7, 171, 'O Goshi', 'storage/sub_assessment/ioIQsf.jpeg', 1, '2024-02-06 02:04:37', '2024-03-20 21:27:50'),
(175, 7, 172, 'Koshi Guruma', 'storage/sub_assessment/R0vCRx.jpeg', 1, '2024-02-06 02:05:01', '2024-03-20 21:25:44'),
(176, 7, 173, 'Tsurikomi Goshi', 'storage/sub_assessment/0Au3HJ.jpeg', 1, '2024-02-06 02:06:04', '2024-03-20 21:36:36'),
(177, 7, 174, 'Sode Tsurikomi Goshi', 'storage/sub_assessment/h1ERiV.jpeg', 1, '2024-02-06 02:06:37', '2024-03-20 21:34:19'),
(178, 7, 175, 'Harai Goshi', 'storage/sub_assessment/EsCDGM.jpeg', 1, '2024-02-06 02:06:56', '2024-03-20 21:21:25'),
(179, 7, 176, 'Tsuri Goshi', 'storage/sub_assessment/XyVBHm.jpeg', 1, '2024-02-06 02:07:20', '2024-03-20 21:36:55'),
(180, 7, 177, 'Ushiro Goshi', 'storage/sub_assessment/dvjwOn.jpeg', 1, '2024-02-06 02:07:42', '2024-03-20 21:39:56'),
(181, 7, 178, 'Yoko Otoshi', 'storage/sub_assessment/fwSr0V.jpeg', 1, '2024-02-06 02:08:08', '2024-03-20 21:38:43'),
(182, 7, 179, 'Tani Otoshi', 'storage/sub_assessment/QGIxpS.jpeg', 1, '2024-02-06 02:08:38', '2024-03-20 21:38:15'),
(183, 7, 180, 'Hane Makikomi', 'storage/sub_assessment/DZd1M8.jpeg', 1, '2024-02-06 02:09:07', '2024-03-20 16:44:06'),
(184, 7, 181, 'Soto Makikomi', 'storage/sub_assessment/QplBEX.jpeg', 1, '2024-02-06 02:09:32', '2024-03-20 21:33:46'),
(185, 7, 182, 'Uchi Makikomi', 'storage/sub_assessment/1yhWXz.jpeg', 1, '2024-02-06 02:09:52', '2024-03-20 21:36:16'),
(186, 7, 183, 'Uki Waza', 'storage/sub_assessment/yHxaPf.jpeg', 1, '2024-02-06 02:10:13', '2024-03-20 21:40:55'),
(187, 7, 184, 'Yoko Wakare', 'storage/sub_assessment/K2Uzsv.jpeg', 1, '2024-02-06 02:10:38', '2024-03-20 21:38:30'),
(188, 7, 185, 'Yoko Guruma', 'storage/sub_assessment/AKeRQY.jpeg', 1, '2024-02-06 02:10:58', '2024-03-20 21:38:57'),
(189, 7, 186, 'Yoko Gake', 'storage/sub_assessment/YZmBq8.jpeg', 1, '2024-02-06 02:11:17', '2024-03-20 21:39:14'),
(190, 7, 187, 'Daki Wakare', 'storage/sub_assessment/zH5Btl.jpeg', 1, '2024-02-06 02:11:42', '2024-03-20 16:41:47'),
(200, 5, 1, '70/30', 'storage/sub_assessment/IZJdtb.jpeg', 1, '2024-03-15 21:35:59', '2024-03-20 13:23:12'),
(201, 9, 1, 'Stack', 'storage/sub_assessment/ydrhEn.png', 1, '2024-03-15 22:33:09', '2024-03-21 07:02:26'),
(202, 9, 1, 'Crucifix', 'storage/sub_assessment/Yrg1pt.png', 1, '2024-03-15 22:33:44', '2024-03-21 06:53:25'),
(203, 9, 1, 'Knee on Belly', 'storage/sub_assessment/hmHyyF.png', 1, '2024-03-15 22:34:22', '2024-03-21 06:56:55'),
(204, 9, 1, 'North-South', 'storage/sub_assessment/iBAJbx.png', 1, '2024-03-15 22:36:12', '2024-03-21 06:57:57'),
(205, 9, 1, 'Inoki Ali', 'storage/sub_assessment/mQ0Jcj.png', 1, '2024-03-15 22:36:46', '2024-03-21 06:55:21'),
(206, 9, 1, 'Turtle', 'storage/sub_assessment/l5awaz.png', 1, '2024-03-15 22:37:16', '2024-03-21 07:01:46'),
(207, 9, 1, 'Parterre', 'storage/sub_assessment/hVex7p.png', 1, '2024-03-15 22:37:54', '2024-03-21 06:58:32'),
(208, 9, 1, 'Turtle Half position', 'storage/sub_assessment/YcONbP.png', 1, '2024-03-15 22:38:31', '2024-03-15 22:38:31'),
(209, 9, 1, 'Sprawling', 'storage/sub_assessment/tYqNAK.png', 1, '2024-03-15 22:39:08', '2024-03-21 07:00:53'),
(210, 9, 1, 'Back', 'storage/sub_assessment/4T6vLV.png', 1, '2024-03-15 22:39:37', '2024-03-21 06:52:41'),
(211, 9, 1, 'Back mount', 'storage/sub_assessment/2P6l9g.png', 1, '2024-03-15 22:40:09', '2024-03-21 06:52:07'),
(212, 9, 1, 'Mount', 'storage/sub_assessment/5mg9EV.png', 1, '2024-03-15 22:40:39', '2024-03-21 06:57:27'),
(213, 9, 1, 'Side', 'storage/sub_assessment/F4l8vK.png', 1, '2024-03-15 22:41:14', '2024-03-21 06:59:24'),
(214, 9, 1, 'Kesagatame', 'storage/sub_assessment/uGHDpc.png', 1, '2024-03-15 22:41:47', '2024-03-21 06:56:07'),
(215, 9, 1, 'Over Under', 'storage/sub_assessment/YeUrAM.png', 1, '2024-03-15 22:42:16', '2024-03-21 06:58:17'),
(216, 5, 1, 'Pull', 'storage/sub_assessment/9NL1Sp.png', 1, '2024-03-15 22:44:54', '2024-03-20 13:30:44'),
(217, 14, 1, 'Test', 'storage/sub_assessment/9kcHHe.jpeg', 1, '2024-03-16 06:52:05', '2024-03-16 06:52:05');

-- --------------------------------------------------------

--
-- Table structure for table `term_conditions`
--

CREATE TABLE `term_conditions` (
  `id` bigint UNSIGNED NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `term_conditions`
--

INSERT INTO `term_conditions` (`id`, `detail`, `status`, `created_at`, `updated_at`) VALUES
(2, '<h3>Summary</h3><p>Eum animi reiciendis et impedit porro sed&nbsp;<br>obcaecati quos sit repudiandae accusantium vel deserunt rerum et molestiae omnis eum nulla nemo. Ab officia reprehenderit ut sunt porro aut eveniet velit non libero dolorem. Qui labore voluptas rem beatae consequatur&nbsp;<br>qui maiores illo ad natus nihil ut internos fugit et ipsum dolores.</p><h3>Terms Of Services</h3><p>enim aut laudantium alias? Quo cupiditate perspiciatis sit veritatis voluptate est eaque quasi eos officiis odio vel eius magnam?Aut consequuntur rerum nam accusamus voluptatibus et nihil corporis qui accusamus quae non autem veniam. Et expedita illo cum labore neque in labore voluptas. Et quae error qui voluptates doloremque sed repellendus iusto aut voluptatum iure aut Quis quasi. Qui ullam consequuntur et nisi labore quo eaque iusto?Summary</p><p>Eum animi reiciendis et impedit porro sed&nbsp;<br>obcaecati quos sit repudiandae accusantium vel deserunt rerum et molestiae omnis eum nulla nemo. Ab officia reprehenderit ut sunt porro aut eveniet velit non libero dolorem. Qui labore voluptas rem beatae consequatur&nbsp;<br>qui maiores illo ad natus nihil ut internos fugit et ipsum dolores.</p>', 1, '2023-12-20 07:36:58', '2023-12-20 13:42:40');

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `academy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `professor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainings`
--

INSERT INTO `trainings` (`id`, `user_id`, `date`, `academy`, `professor`, `notes`, `created_at`, `updated_at`) VALUES
(2, 9, '2023-11-28', 'Microbeck Fsd', 'Abubakar', 'Testing', '2023-12-06 06:47:38', '2023-12-06 06:47:38'),
(3, 2, '2023-11-28', 'Microbeck Fsd', 'Abubakar', 'Testing', '2023-12-06 06:47:45', '2023-12-06 06:47:45'),
(4, 2, '2023-11-28', 'Microbeck Fsd', 'Abubakar', NULL, '2023-12-07 07:03:45', '2023-12-07 07:03:45'),
(5, 2, '2023-11-28', 'Microbeck Fsd', 'Abubakar', 'Testing', '2023-12-07 07:38:52', '2023-12-07 07:38:52'),
(6, 2, '2023-11-28', 'Microbeck Fsd', 'Abubakar', NULL, '2023-12-07 07:38:54', '2023-12-07 07:38:54'),
(9, 15, '2023-12-09', 'home academy', 'prof.', NULL, '2023-12-07 13:53:01', '2023-12-07 13:53:01'),
(10, 22, '2023-12-14', 'abc', 'abc', 'Abc', '2023-12-13 13:26:21', '2023-12-13 13:26:21'),
(11, 25, '2023-12-18', 'jui jitsu academy', 'brucely', 'Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu jitsu.Academy for only jiu', '2023-12-18 10:46:40', '2023-12-18 10:46:40'),
(12, 25, '2023-12-19', 'dhdd', 'tvgr', 'Duruududud', '2023-12-18 11:37:33', '2023-12-18 11:37:33'),
(13, 26, '2023-12-15', 'klk', 'ghh', NULL, '2023-12-19 10:07:28', '2023-12-19 10:07:28'),
(14, 26, '2023-12-19', 'nn', 'hhh', 'Hh the download link or copy this email and any attachments is intended only for the download link or copy this email and any attachments is confidential and intended only', '2023-12-19 10:35:33', '2023-12-19 10:35:33'),
(19, 32, '2023-12-20', 'Abcd', 'Abcd', 'NO', '2023-12-20 14:31:48', '2023-12-20 14:31:48'),
(22, 38, '2024-01-02', 'Thailand\'s', 'bolt', 'Thailand\'s best professor', '2024-01-02 16:06:42', '2024-01-02 16:06:42'),
(23, 39, '2024-01-03', 'JJ academy', 'chul kwon', 'Test', '2024-01-03 16:03:19', '2024-01-03 16:03:19'),
(30, 33, '2023-11-28', 'updated Microbeck Fsd', 'Abubakar', 'Testing Demo', '2024-03-07 12:11:45', '2024-03-07 12:23:06'),
(48, 43, '2023-11-28', 'Microbeck Fsd', 'Abubakar', 'Testing', '2024-03-11 11:13:01', '2024-03-11 11:13:01'),
(51, 51, '2023-10-12', 'Microbeck Fsd', 'Abubakar', 'Testing', '2024-03-12 05:52:00', '2024-03-12 05:52:00'),
(54, 51, '2023-11-27', 'Microbeck Fsd', 'Abubakar', 'Testing', '2024-03-12 06:41:15', '2024-03-12 06:41:15'),
(55, 51, '2023-11-11', 'Microbeck Fsd', 'Abubakar', 'Testing', '2024-03-12 06:41:40', '2024-03-12 06:41:40'),
(56, 51, '2023-10-11', 'Microbeck Fsd', 'Abubakar', 'Testing', '2024-03-12 06:42:57', '2024-03-12 06:42:57'),
(57, 51, '2023-09-11', 'Microbeck Fsd', 'Abubakar', 'Testing', '2024-03-12 06:43:30', '2024-03-12 06:43:30'),
(58, 51, '2023-09-09', 'Microbeck Fsd', 'Abubakar', 'Testing', '2024-03-12 06:45:32', '2024-03-12 06:45:32'),
(65, 56, '2023-02-12', 'jj academy 1', 'professor 1', 'Lorem ipsum', '2024-03-12 15:31:43', '2024-03-12 15:56:34'),
(67, 56, '2024-02-12', 'academy 3', 'professor 3', 'Lorem ipsum', '2024-03-12 15:33:41', '2024-03-12 15:33:41'),
(68, 56, '2023-02-12', 'academy 4', 'professor 4', 'Lorem ipsum', '2024-03-12 15:34:27', '2024-03-12 15:34:27'),
(69, 57, '2024-03-11', 'jj ac1', 'jj prof1', 'Notes jj1', '2024-03-12 18:49:10', '2024-03-12 18:50:26'),
(71, 57, '2023-03-12', 'jj ac3', 'jj prof3', 'Notes', '2024-03-12 18:50:07', '2024-03-12 18:50:07'),
(84, 18, '2024-03-13', 'aa', 'Zz', 'ZZ', '2024-03-13 09:08:21', '2024-03-13 09:08:21'),
(86, 18, '2024-03-13', 's', 'Z', 'Z', '2024-03-13 09:09:09', '2024-03-13 09:09:09'),
(100, 68, '2017-06-01', 'ac1', 'prbd', 'D dn', '2024-03-13 11:08:04', '2024-03-13 11:08:04'),
(101, 71, '2011-03-07', 'bsns', 'snns', 'Ndsn', '2024-03-13 11:34:30', '2024-03-13 11:35:34'),
(104, 74, '2017-03-13', 'z z', 'xbs', 'Znsn', '2024-03-13 11:52:07', '2024-03-13 11:52:07'),
(106, 75, '2008-04-16', 'Shooto Gym roots', 'K Kusayanagi', 'I started Jiu-Jitsu.', '2024-03-13 14:42:21', '2024-03-13 14:42:21'),
(110, 76, '2024-03-15', 'jjnnnnnnnnnnnnnnnn', 'hbn. nm bbbjjk', NULL, '2024-03-14 20:22:10', '2024-03-14 20:22:10'),
(111, 49, '2020-03-15', 'academy name', 'professor name', 'Hello', '2024-03-15 12:04:00', '2024-03-15 12:04:15'),
(112, 77, '2008-04-16', 'Shooto Gym roots', 'K Kusayanagi', NULL, '2024-03-15 14:17:10', '2024-03-15 14:17:10'),
(113, 77, '2017-06-01', 'Carpe Diem Hope', 'D Shiraki', NULL, '2024-03-15 14:18:14', '2024-03-15 14:18:14'),
(114, 77, '2022-04-01', 'Dragon’s Den', 'M Sawada', NULL, '2024-03-15 14:18:43', '2024-03-15 14:18:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `gender` text COLLATE utf8mb4_unicode_ci,
  `dob` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `training_affiliation` text COLLATE utf8mb4_unicode_ci,
  `weight_division` text COLLATE utf8mb4_unicode_ci,
  `competition_count` text COLLATE utf8mb4_unicode_ci,
  `profile_image` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) DEFAULT NULL,
  `otp` text COLLATE utf8mb4_unicode_ci,
  `fcm_token` longtext COLLATE utf8mb4_unicode_ci,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `first_name`, `last_name`, `email`, `description`, `gender`, `dob`, `training_affiliation`, `weight_division`, `competition_count`, `profile_image`, `status`, `otp`, `fcm_token`, `password`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Haseeb', NULL, NULL, 'haseeb@gmail.com', NULL, 'male', NULL, 'Gym', NULL, NULL, 'https://api.beckdemos.com/jitsu/public/storage/user/profile_images/7cYTVuw3lCff0OCWCo6MaUxwqWipKwLGawJHIQzs.jpg', 1, NULL, NULL, '$2y$12$3LnCSzexMk4RNZXB2vB5RuI3zlYYyBSNU6TM95Ef0XxAS96st4JKu', NULL, NULL, '2023-12-01 10:13:51', '2024-03-13 09:49:23'),
(4, 'ahmed', NULL, NULL, 'ahmed1@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'fnwdjfujfwerufufwdifhweifweufhw', '$2y$12$I4vq4PDZZ3zgvzLudvKk7.IlzosaU3s4/6l/sVZe26CkaDbstWqLe', NULL, NULL, '2023-12-01 11:59:47', '2023-12-20 07:48:34'),
(5, 'ahmed', NULL, NULL, 'ahmed12@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '4405', NULL, '$2y$12$4cgw5qoTwVXxYmKl2YRw9ulsqE6eKGvtRA0rwW2aF2kR8iCqevK7e', NULL, NULL, '2023-12-01 12:03:06', '2023-12-01 13:51:09'),
(6, 'ahmed', NULL, NULL, 'ahmed0@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '$2y$12$4ns/H1mhforBRQWQ5rwqTul.DZo4r3tiPk7e199f1PRRS0rUzp5Tu', NULL, NULL, '2023-12-01 12:06:04', '2023-12-01 12:06:04'),
(7, 'ahmed', NULL, NULL, 'ahmed123@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '$2y$12$4m1pUEF5jnpzaJ5AZFziPeTk0wmQPeLUx9tglOxnCYblSfmLz76uq', NULL, NULL, '2023-12-04 05:59:58', '2023-12-04 05:59:58'),
(8, 'ppp', NULL, NULL, 'p@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '$2y$12$XTYglxzcppt7hgMoo5RkjOTQeV3yAd0aANsjKCdQvNuYFZw5HKaHa', NULL, NULL, '2023-12-04 06:07:21', '2023-12-04 06:07:21'),
(9, 'pppq', NULL, NULL, 'pp@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '$2y$12$PnBDZiP8hiFpmTxXPp6XUOqybS.oz3Hi5C.hPNb2wP6WxzEfSRDga', NULL, NULL, '2023-12-04 06:10:44', '2023-12-04 06:10:44'),
(10, 'ahmed', NULL, NULL, 'tt@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '$2y$12$9aHe2VgXA7LT0/pkjXpyq.L8m.6N/SpHPkKmXWuoPUwOTFuyAGZ2m', NULL, NULL, '2023-12-07 05:47:19', '2023-12-07 05:47:19'),
(11, 'ahmed', NULL, NULL, 'qq@gmail.com', NULL, NULL, NULL, 'avb gym', NULL, NULL, 'storage/user/profile_images/lPOxdE58oTgVGNFM2tIXnGxdYsEFzDhm0Tw3Xe8P.jpg', 1, NULL, NULL, '$2y$12$uto5I1zuwndthecjyQM1iOTTPyF4woe30quYKNnADNFUVzsgpXU5m', NULL, NULL, '2023-12-07 06:00:46', '2023-12-07 06:01:56'),
(12, 'Haider', NULL, NULL, 'er@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '$2y$12$yi0xFcSb..xVLXqYbSIdP.LFcj2YVoRaYbJ0t/PYlo/zyyInRTMvO', NULL, NULL, '2023-12-07 06:05:54', '2023-12-08 06:15:27'),
(13, 'poi', NULL, NULL, 'poi@gmail.com', NULL, NULL, NULL, 'km gym', NULL, NULL, 'storage/user/profile_images/kmzzjXvpPAVTAmpxW8SHqhMjhp66cKVyYBCUft9Q.jpg', 1, NULL, NULL, '$2y$12$jEcvX8CppRq4XIjZfMstbugs8IuuO95hHLKFEDjcvUJ/5NabtlNlK', NULL, NULL, '2023-12-07 06:11:13', '2023-12-07 06:12:13'),
(15, 'hellos', NULL, NULL, 'hello@gmail.com', NULL, 'male', NULL, 'home gym', NULL, NULL, 'storage/user/profile_images/8rpd3eoXzk3RUTKD04uW6ePPbe2OwvPaXOxCOMVg.jpg', 1, NULL, NULL, '$2y$12$RNOUrtaj9iAGDW3c.nLF5u2fV6wLEmegslhz2cu9GPoDyw.Vf9W2O', NULL, NULL, '2023-12-07 13:50:53', '2023-12-08 07:21:56'),
(17, 'Muneeb', NULL, NULL, 'muneeb@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '$2y$12$0YPK7OSCkfXysp1PNyjfO.3l8zmFev48iS9bzZhNAKE6u1qPVtSbC', NULL, NULL, '2023-12-12 09:44:58', '2023-12-12 09:44:58'),
(18, 'ali', NULL, NULL, 'ali@gmail.com', 'hhhhhhhh', NULL, NULL, 'home gym', NULL, NULL, NULL, 1, '8022', NULL, '$2y$12$rrCgvms9WWI.gXPkZNoXku26r/r2E53S/hoCDxyv3N/1wxdiDN4x6', NULL, NULL, '2023-12-12 09:50:24', '2024-03-11 16:59:20'),
(22, 'iqrayaqub', NULL, NULL, 'iqra.yaqub@gmail.com', NULL, 'female', NULL, 'gym', NULL, NULL, NULL, 1, NULL, NULL, '$2y$12$yFK0DS9nQ103XuqR4cCcxu3YHQ5Dz3k8QJYs7VLEhl8YOCFbtz7hS', NULL, NULL, '2023-12-13 12:22:20', '2023-12-13 13:02:37'),
(24, 'usama', NULL, NULL, 'usamaamir265@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2699', NULL, '$2y$12$fSday24R.wC5wskty4gKa.qHuB6C0ddm1G43qUWew70rTgA.c1mmm', NULL, NULL, '2023-12-13 13:58:25', '2023-12-13 13:58:40'),
(25, 'john', NULL, NULL, 'umerarshid728@gmail.com', NULL, NULL, NULL, 'gym', NULL, NULL, 'storage/user/profile_images/YWHxW9OjttfLtswvyAgBmjbrTiz9B5UWBtH9jd7J.png', 1, NULL, NULL, '$2y$12$3LnCSzexMk4RNZXB2vB5RuI3zlYYyBSNU6TM95Ef0XxAS96st4JKu', NULL, NULL, '2023-12-18 09:53:27', '2023-12-18 15:39:55'),
(26, 'ali', NULL, NULL, 'ali1@gmail.com', NULL, 'Male', NULL, 'abc', NULL, NULL, 'storage/user/profile_images/CcbKXspKjdwE2YtjzHLq5hoX6SOozVJYYk8r4br6.jpg', 1, NULL, NULL, '$2y$12$KyUkTDbFAsbAbG0dQ1y6K.Cxjn.LxdLpSrDb5QOZ96LuB.Ky6fCb2', NULL, NULL, '2023-12-19 10:04:39', '2023-12-20 13:22:31'),
(28, 'usama', NULL, NULL, 'usama123@gmail.com', NULL, 'Male', NULL, 'abc', NULL, NULL, 'storage/user/profile_images/jWOBR38Yru2p8dGusMsY07kJWCF9Ud4p8QFhdCzY.png', 1, NULL, NULL, '$2y$12$jnl1DdnUtuu4HYpY.xUpsO5HlIOSsSwWrDJQxcTgEjzrpYruF54vq', NULL, NULL, '2023-12-19 14:23:00', '2023-12-19 14:25:50'),
(30, 'patrice', NULL, NULL, 'patrice@gmail.com', NULL, NULL, NULL, 'db', NULL, NULL, 'storage/user/profile_images/dPJpaPIvAhCsF6C1Mhp8E5wnZcRYl50kTdkYH6qh.jpg', 1, NULL, NULL, '$2y$12$u0A5EgF5WEd9ef1rSbKCuuK4yn1wXyFsp0eBlQzpJbuSO2xfbhIOC', NULL, NULL, '2023-12-20 07:37:18', '2023-12-20 07:37:26'),
(31, 'patrice', NULL, NULL, 'patrice0@gmail.com', NULL, NULL, NULL, 'bdb', NULL, NULL, 'storage/user/profile_images/NOIIfwYOLu9rTFEr1yjLq34SEJyfvHBrHDZaHJa3.jpg', 1, NULL, NULL, '$2y$12$UqhT5hzCalGQMuZWYSAhROlgKxRH8zYgfAyQlI9sGLdC.C7YE8VcG', NULL, NULL, '2023-12-20 07:37:40', '2023-12-20 07:38:00'),
(32, 'usama', NULL, NULL, 'usama000@gmail.com', NULL, 'Male', NULL, 'yest', NULL, NULL, 'storage/user/profile_images/oRTNTPxajf9MX4zNd9vJFSlNcttv6MFk41ShBgoX.png', 1, '8288', NULL, '$2y$12$48c6IRH3oeX.dJX06NxBBeVwfnW56YyCJBS9Sn8tavrxslDK5ErtG', NULL, NULL, '2023-12-20 13:23:51', '2023-12-20 14:33:55'),
(33, 'umer', NULL, NULL, 'umer@gmail.com', NULL, 'Male', NULL, 'bsjsksk jdjsjsjsjsjsjsjd dnskdksjsjjdjdjdjdjd dndjdjdkskjdjd djdjdjdjdbsbd', NULL, NULL, 'storage/user/profile_images/MN64a2xfW9OMrbOqOopJUfpBMIn3CCx5XqNGHg0L.jpg', 1, NULL, NULL, '$2y$12$u2hq8B6JbyrgCTAke5xpuulCuE8PibApG30sOiK3pij5Gp2q99dpK', NULL, NULL, '2023-12-21 05:44:37', '2023-12-21 05:49:08'),
(34, 'Biceps', NULL, NULL, 'admin@jitsu.com', NULL, 'male', NULL, 'tf1', NULL, 'Gold', 'storage/user/profile_images/p0Bo8Z5rCJMstFDQ7DFBEGNAUCcIvODAI4qoDiiG.jpg', 1, NULL, NULL, '$2y$12$hUckXULJPsGEiYOb2FVdvOVlUEBAT3Mgw7xciOcvZI0j6pdLsPuhO', NULL, NULL, '2023-12-27 11:14:02', '2023-12-27 11:14:02'),
(35, 'umer', NULL, NULL, 'umerarshid728+@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '$2y$12$8o9ioNU8x9BNoiD2nhy4vOaduBy6VZVLejzs7kcBm8V/M2m0iVInu', NULL, NULL, '2023-12-29 06:27:16', '2023-12-29 06:27:16'),
(37, 'usama', NULL, NULL, 'usama@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '3203', NULL, '$2y$12$lxJJ6JApXaJtiuacvktjC.PTZtxtXJISrQ4tW3BmTEkH2UHz.BWqm', NULL, NULL, '2023-12-29 09:42:22', '2023-12-29 13:54:41'),
(38, 'alex', NULL, NULL, 'alex@gmail.com', NULL, 'Male', NULL, 'gym', NULL, NULL, NULL, 1, NULL, NULL, '$2y$12$VgU63zoc3oHMuQjo597HO.eIf.TY/3JXgKaGdPI15VhnMAfk9Dhyq', NULL, NULL, '2024-01-02 16:03:06', '2024-01-02 16:05:51'),
(39, 'nudge', NULL, NULL, 'nudge@gmail.com', NULL, 'Male', NULL, 'gym', NULL, NULL, NULL, 1, NULL, NULL, '$2y$12$Ez7hOYwr7Ptx5Y/musviG.4TtKgHiv5GrGILG75rnMEUeYDfrg4fm', NULL, NULL, '2024-01-03 15:57:27', '2024-01-03 16:06:45'),
(41, 'jjj', NULL, NULL, 'jj@gmail.com', NULL, NULL, NULL, 'gym', NULL, NULL, NULL, 1, NULL, NULL, '$2y$12$7vRW/2.GpsMSWlh.UT4/9.jslgZrQXfrcuNgR9.8Mkd4qZMTuKwCS', NULL, NULL, '2024-01-17 11:55:00', '2024-01-17 11:55:10'),
(43, 'jj user10', NULL, NULL, 'jjuser@gmail.com', NULL, NULL, NULL, 'gym', NULL, NULL, NULL, 1, NULL, NULL, '$2y$12$t1bJBaexPJFEQr8Fvh7XPukxltWj2fkc0tav0ZORCkdFAAmN./4..', NULL, NULL, '2024-03-08 13:56:48', '2024-03-08 13:57:26'),
(44, 'Haider', NULL, NULL, 'haider@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '$2y$12$HtvbsgM7lvgUN1voInqZZODDqorMPpShJssKQGlqpZxcD2DxN6zyG', NULL, NULL, '2024-03-11 09:57:25', '2024-03-11 09:57:25'),
(45, 'Moaz', NULL, NULL, 'moaz@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '$2y$12$FEtGGQHWZYp3jqZF16beweZOuGlc.XVTVzf/ipT6CY.e9rqTgbJkK', NULL, NULL, '2024-03-11 12:08:07', '2024-03-11 12:08:07'),
(46, 'abc', 'Haider', 'Zaman', 'abc@gmail.com', NULL, 'male', '1999-04-21', 'Gym', NULL, NULL, NULL, 1, NULL, NULL, '$2y$12$UcdTBrnOrfGVIKRtIYP.8.DNBG93lVPoXSoFKmmMHHbSQoKqpn/ie', NULL, NULL, '2024-03-11 15:17:37', '2024-03-11 15:17:37'),
(47, 'abcd', 'Haider', 'Zaman', 'abcd@gmail.com', NULL, NULL, '1999-04-21', 'Gym', NULL, NULL, NULL, 1, NULL, NULL, '$2y$12$qq9YSSZoouNWZqxBf2PzleNp8ksprj9Ghlbj8lRM0OFLdUruD4D/q', NULL, NULL, '2024-03-11 15:18:05', '2024-03-11 15:18:05'),
(48, 'abcde', 'Haider', 'Zaman', 'abcde@gmail.com', NULL, NULL, NULL, 'Gym', NULL, NULL, NULL, 1, NULL, NULL, '$2y$12$pqrdpuVOiFihIktjtglNEurRHyluwjNtgWOxCoiSkF7Xs2uqDQt0G', NULL, NULL, '2024-03-11 15:19:28', '2024-03-11 15:19:28'),
(49, 'ak', 'ahmed', 'kashifff', 'ahmad@gmail.com', 'hello my name is ahmad dwjbfwjfbwe adbnadkjc fakfb hello', 'Male', 'Select Date Of Birth', 'dragon', NULL, NULL, 'storage/user/profile_images/SUlLyKgcpayrtBUYjpkqjUh5AKYlnUiD8id61V0c.jpg', 1, NULL, NULL, '$2y$12$aYz8nY3hLGSEJWhHtSUrrOybPSN9YHVF5OLJ0WiElZUQKe0MPnhC2', NULL, NULL, '2024-03-11 15:57:32', '2024-03-13 07:28:35'),
(51, 'hamza', 'john', 'hamza', 'hamza@gmail.com', 'zigzagging pj0xpufphc pjv9hc9y 9hc9yf9u 9hc9h 9h 9u 9hc9hc9h 9y 9y 9y 9h 9y 9 oh 9y 9h 9y 9y9 8g ogcpxpxoyxohc9y 9h 9hcohcoyc9h 8h 9yc8yc8u 9u 9u 9uc9u 9u 9u 9ucu0f0ufpyfpyfpyflhxkgxkg 0j  ohxogdogdogpjc pufohxohx 0jc9uc9u 0uf0uf9u 0uvu0v0uv9ucohcohxohfohdoydoyxyoxohxoyxohxohxoyxoyxohihc9hxyodphxho   zigzagging pj0xpufphc pjv9hc9y 9hc9yf9u 9hc9h 9h 9u 9hc9hc9h 9y 9y 9y 9h 9y 9 oh 9y 9h 9y 9y9 8g ogcpxpxoyxohc9y 9h 9hcohcoyc9h 8h 9yc8yc8u 9u 9u 9uc9u 9u 9u 9ucu0f0ufpyfpyfpyflhxkgxkg 0j  ohxogdogdogpjc pufohxohx 0jc9uc9u 0uf0uf9u 0uvu0v0uv9ucohcohxohfohdoydoyxyoxohxoyxohxohxoyxoyxohihc9hxyodphxho   zigzagging pj0xpufphc pjv9hc9y 9hc9yf9u 9hc9h 9h 9u 9hc9hc9h 9y 9y 9y 9h 9y 9 oh 9y 9h 9y 9y9 8g ogcpxpxoyxohc9y 9h 9hcohcoyc9h 8h 9yc8yc8u 9u 9u 9uc9u 9u 9u 9ucu0f0ufpyfpyfpyflhxkgxkg 0j  ohxogdogdogpjc pufohxohx 0jc9uc9u 0uf0uf9u 0uvu0v0uv9ucohcohxohfohdoydoyxyoxohxoyxohxohxoyxoyxohihc9hxyodphxho   zigzagging pj0xpufphc pjv9hc9y 9hc9yf9u 9hc9h 9h 9u 9hc9hc9h 9y 9y 9y 9h 9y 9 oh 9y 9h 9y 9y9 8g ogcpxpxoyxohc9y 9h 9hcohcoyc9h 8h 9yc8yc8u 9u 9u 9uc9u 9u 9u 9ucu0f0ufpyfpyfpyflhxkgxkg 0j  ohxogdogdogpjc pufohxohx 0jc9uc9u 0uf0uf9u 0uvu0v0uv9ucohcohxohfohdoydoyxyoxohxoyxohxohxoyxoyxohihc9hxyodphxho   zigzagging pj0xpufphc pjv9hc9y 9hc9yf9u 9hc9h 9h 9u 9hc9hc9h 9y 9y 9y 9h 9y 9 oh 9y 9h 9y 9y9 8g ogcpxpxoyxohc9y 9h 9hcohcoyc9h 8h 9yc8yc8u 9u 9u 9uc9u 9u 9u 9ucu0f0ufpyfpyfpyflhxkgxkg 0j  ohxogdogdogpjc pufohxohx 0jc9uc9u 0uf0uf9u 0uvu0v0uv9ucohcohxohfohdoydoyxyoxohxoyxohxohxoyxoyxohihc9hxyodphxho   zigzagging pj0xpufphc pjv9hc9y 9hc9yf9u 9hc9h 9h 9u 9hc9hc9h 9y 9y 9y 9h 9y 9 oh 9y 9h 9y 9y9 8g ogcpxpxoyxohc9y 9h 9hcohcoyc9h 8h 9yc8yc8u 9u 9u 9uc9u 9u 9u 9ucu0f0ufpyfpyfpyflhxkgxkg 0j  ohxogdogdogpjc pufohxohx 0jc9uc9u 0uf0uf9u 0uvu0v0uv9ucohcohxohfohdoydoyxyoxohxoyxohxohxoyxoyxohihc9hxyodphxho', 'male', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '$2y$12$8o9ioNU8x9BNoiD2nhy4vOaduBy6VZVLejzs7kcBm8V/M2m0iVInu', NULL, NULL, '2024-03-12 04:31:33', '2024-03-12 05:01:46'),
(52, 'Coddy', 'Cody', 'Rhodes', 'cody@gmail.com', 'Sakxkka', NULL, '2024-03-03', NULL, NULL, NULL, NULL, 1, NULL, NULL, '$2y$12$a4aQCY7L0I/pie7zOcAFqeoCHjSqFNgpq39DZKTX1FGlyGyhZb9le', NULL, NULL, '2024-03-12 05:18:24', '2024-03-12 05:19:02'),
(53, 'mb', 'moaz', 'bhai', 'moazbhai@gmail.com', 'I am moaz.', NULL, '2018-03-05', NULL, NULL, NULL, NULL, 1, NULL, NULL, '$2y$12$kV.r8Gw0NrMfTifj5KrarOYt2NfrW81tgFDM0HA5i4zAF.9XJ8Y86', NULL, NULL, '2024-03-12 07:33:47', '2024-03-12 07:34:19'),
(54, 'pt', 'Patricia', 'john', 'pt@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '$2y$12$44ZJgEVOQfYysaq3eEi0guGeojtJoI.jDOfmwdc9GpviHT0x5oeku', NULL, NULL, '2024-03-12 09:30:15', '2024-03-12 09:30:15'),
(55, 'jamesjj', 'james', 'jj', 'jamesjj@gmail.com', 'hsjs sneke is did djd djd fj fjf fjd did did djd did id djd did djd dk d ok d dr', NULL, '1999-01-20', NULL, NULL, NULL, 'storage/user/profile_images/ElWNvxhWuuTabzojLHmixnilK470Fp6d3WHfCzxN.jpg', 1, NULL, NULL, '$2y$12$B5zaLhb6ZUYzuUI6T5lY3e3oZJlhvb790BLbHF/ZsKG0AIgVCZaAe', NULL, NULL, '2024-03-12 15:20:30', '2024-03-12 15:21:16'),
(56, 'QC', 'QC', 'QA', 'qc@gmail.com', 'bsnsm dndkd djd djd djdnjdd kddndjdjd dndndkd dkdjd dkddkd nd', NULL, '1999-01-20', NULL, NULL, NULL, 'storage/user/profile_images/tLh8DIr1ZJSBvQ4KHLQH4A53Jo29D6z7AvQcdcyd.jpg', 1, NULL, NULL, '$2y$12$5t0FMGKXEP77jrT0z2gVsuetbLxLhgG2QDYHyRxJA0Pn6uMPx3cc.', NULL, NULL, '2024-03-12 15:22:48', '2024-03-12 15:23:14'),
(57, 'aizal', 'aizal', 'Fatima', 'aizal@gmail.com', 'dummy description of the profile completion', 'Select gender', 'Select Date Of Birth', NULL, NULL, NULL, 'storage/user/profile_images/F9Ry9eiVD8LKXcwO9F4Ktu9eycjD3Y5UvXGbDTEb.jpg', 1, NULL, NULL, '$2y$12$PbTAX670BTD1VXBWzfgRIuj8VPifyPE5oBlztC.4fLLKhJvaNrjYu', NULL, NULL, '2024-03-12 18:47:58', '2024-03-13 07:21:18'),
(60, 'brain', 'brain', 'jj', 'brain@gmail.com', 'profile completion text is a lorem.ipsum', 'Male', '1987-03-13', NULL, NULL, NULL, NULL, 1, NULL, NULL, '$2y$12$9/RMhnFBqs1Uj5dpqsFnlOpzehDTOZzs32dDSUvq4tKYdXd/Ah50q', NULL, NULL, '2024-03-13 09:04:06', '2024-03-13 09:35:56'),
(61, 'asd', 'bssn', 'dndn', 'asd@gmail.com', 'dbdn', 'Male', 'Select Date Of Birth', NULL, NULL, NULL, NULL, 1, NULL, NULL, '$2y$12$0oGLn8KBkKciJzRUzilIe.M6bl0EVMAuRnVV25/hKV8vBVOViSBR.', NULL, NULL, '2024-03-13 09:36:56', '2024-03-13 09:44:37'),
(62, 'fog', 'paint', 'joh', 'fog@gmail.com', NULL, 'male', '1999-01-20', NULL, NULL, NULL, NULL, 1, NULL, NULL, '$2y$12$PS85iSiloGkgod3D6LhGHuZ7pFRZC79EPiXJB3Xwmvyaedkz4gqKa', NULL, NULL, '2024-03-13 09:48:26', '2024-03-13 09:52:28'),
(63, 'dob', 'ndn', 'dnd', 'dob@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '$2y$12$OOlpK9e4zjYSOHgTrHX6yOu8v8Mm/Bxe4d4/wkumqmoxhrzF2pz1m', NULL, NULL, '2024-03-13 09:51:43', '2024-03-13 09:51:43'),
(64, 'dmnbv', 'hsdokjv', 'sdkc', 'abcabc@gmail.com', NULL, NULL, '2024-03-12', NULL, NULL, NULL, NULL, 1, NULL, NULL, '$2y$12$N4cLnCqTpzEIMMvpSiyJ.eV5uokdoU.hW7J26LTMIueI1YYMSTQJK', NULL, NULL, '2024-03-13 10:23:57', '2024-03-13 10:25:01'),
(65, 'Ali', 'Ali', 'Ali', 'ali10@gmail.com', NULL, 'male', '2024-03-10', NULL, NULL, NULL, NULL, 1, NULL, NULL, '$2y$12$wYYgo6VJq3TSlG7sYYGlc.g/s6uAyo.culafoXyw2tjv4FP2dsJ.y', NULL, NULL, '2024-03-13 10:26:55', '2024-03-13 10:30:05'),
(66, 'asghar', 'asghar', 'asghar', 'asgharno3@gmail.com', NULL, NULL, '2024-03-12', NULL, NULL, NULL, NULL, 1, NULL, NULL, '$2y$12$tyK3heD5nvy.UvvzzPGNwe9rgC5jk1TY2IQckMIoBsQD7z1hQN1/C', NULL, NULL, '2024-03-13 10:34:26', '2024-03-13 10:34:59'),
(67, 'adhmad', 'ahmad', 'adhmad', 'ahmad2@gmail.com', 'wrire', NULL, '2024-03-01', NULL, NULL, NULL, NULL, 1, NULL, NULL, '$2y$12$hEJnxZvIlHoiNPkniY3tROzHqmZqvv1QT26ShYxYbMqyZwJvQ1ofy', NULL, NULL, '2024-03-13 10:37:09', '2024-03-13 11:35:12'),
(68, 'henry', 'henry', 'Charles', 'henry@gmail.com', 'hsjs sjbd djd djd djd djd djd djd djd djd djdbhrhe djdhrhe dhrbr jr djd dbd djd rhjr rjebr e', NULL, '1999-01-20', NULL, NULL, NULL, 'https://api.beckdemos.com/jitsu/public/storage/user/profile_images/CXKmtNGkcdHEtrBYbpKdzPDHtAtcNchx4gcCFKNU.jpg', 1, NULL, NULL, '$2y$12$NZvariDFQb87CfYUFDIxsOR7/3q9R7afeuU525AfapNJ4i1hD3utK', NULL, NULL, '2024-03-13 11:04:48', '2024-03-13 11:05:37'),
(69, 'lewis', 'Arthur', 'lewis', 'lewis@gmail.com', 'rndndn', NULL, '1999-01-20', NULL, NULL, NULL, NULL, 1, NULL, NULL, '$2y$12$FxBDfvGPmMrvmNcdFftE/Oi4xn2SinNpdyhCXc3DFR5zGbLmnKR/6', NULL, NULL, '2024-03-13 11:28:42', '2024-03-13 11:34:21'),
(70, 'arthur', 'lewis', 'arthur', 'arthur@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '$2y$12$3PfQHIIBNo43Lw.Iqkx4EOlAYPKBsu0xVheEyF8SKNFIVU8whQo3y', NULL, NULL, '2024-03-13 11:30:57', '2024-03-13 11:30:57'),
(71, 'Arthur 11', 'lewis', 'arthur', 'arthur0@gmail.com', 'bdnsmw', NULL, '1999-01-20', NULL, NULL, NULL, 'storage/user/profile_images/etAKkTsbvZHXXJhnsEaad3QxVYylOkEKmdGPwvMm.jpg', 1, NULL, NULL, '$2y$12$Iscf4sGkIE4xVTizvQb7IO/ckdSo2yJChszuBfpsQQEQXdypC9pv2', NULL, NULL, '2024-03-13 11:32:12', '2024-03-13 11:32:31'),
(72, 'ghj', 'asd', 'ghj', 'ghj@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '$2y$12$pKwZY527eLXo2gonFIel6ekq6d01lckylaOGggdnT/IRP7CGfvBAu', NULL, NULL, '2024-03-13 11:40:57', '2024-03-13 11:40:57'),
(73, 'noah', 'noah', 'wailliam', 'noah@gmail.com', 'bznsn', NULL, '1999-03-20', NULL, NULL, NULL, 'storage/user/profile_images/VvEO64LtdT2GLy3oSpH8pWRPBQOsdJ3SgGQQ4b8i.jpg', 1, NULL, NULL, '$2y$12$fMgrwm6lPx1kXZ8b8dlGI.3tKm8WFmx/6xDo/GsSQ4vGq6KcLWaNW', NULL, NULL, '2024-03-13 11:42:00', '2024-03-13 11:43:00'),
(74, 'Charles', 'jack', 'charles', 'charles@gmail.com', 'bdnsnw. hdhd djd djd djd djd djd djd hd djd dbd djd djd db', 'Select gender', '1999-01-20', NULL, NULL, NULL, 'storage/user/profile_images/eWewAGYaq016HGB2FuTbiDSWGaXPAYvZPYCp6Dj1.jpg', 1, NULL, NULL, '$2y$12$62AJWuFJOfiMLfIFP/T/Ge3pB65NVYzGFVGEvl1X/P8220TNbV89G', NULL, NULL, '2024-03-13 11:50:10', '2024-03-13 11:55:21'),
(75, 'chiyamika', 'Kazuhiro', 'Miyachi', 'Brainjiujitsu@gmail.com', 'xxxxxxxxxxxxxxxxxxxxxxxxkkkkkkkkk\njkkkkkkkkkk\nhhgghhhh', NULL, '1989-05-19', NULL, NULL, NULL, 'https://api.beckdemos.com/jitsu/public/storage/user/profile_images/onkYbpFkdl06WC9EPqdHIsLFph2ezTUKadiA43A9.jpg', 1, NULL, NULL, '$2y$12$vX0m33wT0glop36OJhvL5e7YA3tDp/QpTaphaG6CmVBTv1dC6lLx.', NULL, NULL, '2024-03-13 14:39:21', '2024-03-13 15:13:39'),
(76, 'Myname', 'Steward', 'Myname', 'myname@gmail.com', 'Hello I am my name.', 'Male', '2018-03-01', NULL, NULL, NULL, NULL, 1, NULL, NULL, '$2y$12$gb85.d5R.Y6pyw2sLphqVeLhCh/RJgaqmkCOVZrOEHhqxWGM/OaMe', NULL, NULL, '2024-03-13 17:37:02', '2024-03-13 17:42:25'),
(77, 'chiyamika', 'Kazuhiro', 'Miyachi', 'chiyamika6@gmail.com', 'Looking for solution of Jiu-Jitsu', 'Male', '1989-05-19', NULL, NULL, NULL, 'https://api.beckdemos.com/jitsu/public/storage/user/profile_images/HgyQ9HUQVi89HsvDhrJCmin2QL1kVi0f4J7Ogm4H.jpg', 1, NULL, NULL, '$2y$12$o7.WQuPFIpxgBLp0WW.waOxT.iGNB81rRK0aAGbwJ99uh.qJv5Scy', NULL, NULL, '2024-03-15 14:06:26', '2024-03-16 11:28:49'),
(78, 'sdfsdfd', 'adsfsfsdfa', 'sdfs', 'muhammadsayyam1244@gmail.com', 'asd', 'Select gender', '1997-03-20', NULL, NULL, NULL, 'https://api.beckdemos.com/jitsu/public/storage/user/profile_images/JtClPtoLAZqPWwOCf7gtjNm3G7pbc9RNLSdJaNrX.jpg', 1, '8370', NULL, '$2y$12$wWE4gBaA.C8fVyReK6hG2uqJ5DuAPwN/2AmjPPg4sOvXOvO605APK', NULL, NULL, '2024-03-27 11:24:15', '2024-04-05 19:38:57'),
(79, 'test', 'test', 'test', 'test@gmail.com', 'cool', NULL, '2024-03-28', NULL, NULL, NULL, NULL, 1, NULL, NULL, '$2y$12$ftRQKvhmKXDHyCEQH6ctc.hPqFbBNuupAv3/e7VIJUAYS1ursyPCO', NULL, NULL, '2024-03-28 10:29:15', '2024-03-28 10:30:31'),
(80, 'nnnnkk', 'yy', 'bbjjk', 'muhammadsayam1244@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '$2y$12$ur5bUL.B8fu89HKXDW/II.NaracuYN6l.xXL0MKF3dqBA9R7Nuw0e', NULL, NULL, '2024-03-30 12:05:58', '2024-03-30 12:05:58'),
(81, 'nsmsn', 'hdhd', 'nsmmd', 's@gmail.com', 'jdjdjrj', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '$2y$12$C.aM21Y7y.9HucrJbpRMne8JFbk.3t6iEz.lZjYDxdGUrG85iBDvK', NULL, NULL, '2024-03-30 12:06:29', '2024-03-30 12:36:52'),
(82, '1234234', 'asdkfjasdk', 'asdkfjasdlkf', 'sayyam03119960424@gmail.com', 'adfdsf', NULL, '2024-04-09', NULL, NULL, NULL, 'storage/user/profile_images/62WfM73PqI4Z9Ul5vY9UG4GDZDgtzEHE4rL2SQeo.jpg', 0, NULL, NULL, '$2y$12$IHXCQXt9gDptI9CXBhxawO64kegpZtn4.HOnnk24voDRPP8x0uGmi', NULL, NULL, '2024-04-05 19:40:16', '2024-04-15 08:30:53');

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `child_assessment_id` bigint UNSIGNED NOT NULL,
  `no_of_views` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessment_l2_s`
--
ALTER TABLE `assessment_l2_s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assessment_l2_s_sub_assessment_id_foreign` (`sub_assessment_id`);

--
-- Indexes for table `belt_ranks`
--
ALTER TABLE `belt_ranks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookmarks_user_id_foreign` (`user_id`);

--
-- Indexes for table `competitions`
--
ALTER TABLE `competitions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `competitions_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `main_assessments`
--
ALTER TABLE `main_assessments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mark_assessment_l2_s`
--
ALTER TABLE `mark_assessment_l2_s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mark_assessment_l2_s_user_id_foreign` (`user_id`),
  ADD KEY `mark_assessment_l2_s_child_assessment_id_foreign` (`child_assessment_id`);

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
-- Indexes for table `privacy_policies`
--
ALTER TABLE `privacy_policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `promotions_user_id_foreign` (`user_id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_assessments`
--
ALTER TABLE `sub_assessments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_assessments_assessment_id_foreign` (`assessment_id`);

--
-- Indexes for table `term_conditions`
--
ALTER TABLE `term_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trainings_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`),
  ADD KEY `views_user_id_foreign` (`user_id`),
  ADD KEY `views_child_assessment_id_foreign` (`child_assessment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assessment_l2_s`
--
ALTER TABLE `assessment_l2_s`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `belt_ranks`
--
ALTER TABLE `belt_ranks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `competitions`
--
ALTER TABLE `competitions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `main_assessments`
--
ALTER TABLE `main_assessments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mark_assessment_l2_s`
--
ALTER TABLE `mark_assessment_l2_s`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privacy_policies`
--
ALTER TABLE `privacy_policies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_assessments`
--
ALTER TABLE `sub_assessments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT for table `term_conditions`
--
ALTER TABLE `term_conditions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assessment_l2_s`
--
ALTER TABLE `assessment_l2_s`
  ADD CONSTRAINT `assessment_l2_s_sub_assessment_id_foreign` FOREIGN KEY (`sub_assessment_id`) REFERENCES `sub_assessments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD CONSTRAINT `bookmarks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `competitions`
--
ALTER TABLE `competitions`
  ADD CONSTRAINT `competitions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mark_assessment_l2_s`
--
ALTER TABLE `mark_assessment_l2_s`
  ADD CONSTRAINT `mark_assessment_l2_s_child_assessment_id_foreign` FOREIGN KEY (`child_assessment_id`) REFERENCES `assessment_l2_s` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mark_assessment_l2_s_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `promotions`
--
ALTER TABLE `promotions`
  ADD CONSTRAINT `promotions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_assessments`
--
ALTER TABLE `sub_assessments`
  ADD CONSTRAINT `sub_assessments_assessment_id_foreign` FOREIGN KEY (`assessment_id`) REFERENCES `main_assessments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `trainings`
--
ALTER TABLE `trainings`
  ADD CONSTRAINT `trainings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `views`
--
ALTER TABLE `views`
  ADD CONSTRAINT `views_child_assessment_id_foreign` FOREIGN KEY (`child_assessment_id`) REFERENCES `assessment_l2_s` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `views_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
