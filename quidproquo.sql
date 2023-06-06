-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2023 at 07:41 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quidproquo`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_authors`
--

CREATE TABLE `blog_authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `github_handle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_handle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT 0,
  `seo_title` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_author_id` bigint(20) UNSIGNED DEFAULT NULL,
  `blog_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `filament_page_hints`
--

CREATE TABLE `filament_page_hints` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hint` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_05_22_053359_create_quizzes_table', 1),
(7, '2022_05_27_163432_add_negative_marks_columns_to_quiz_questions_table', 1),
(8, '2022_06_09_203138_rename_quizzes_tables', 1),
(9, '2022_06_12_061720_create_quiz_authors_table', 1),
(10, '2022_08_01_153324_remove_unique_constraint_for_slugs', 1),
(11, '2022_08_15_033405_remove_unq_constraint_from_quiz_questions_table', 1),
(12, '2022_12_15_072625_create_sessions_table', 1),
(13, '2022_12_15_092927_add_google_id_column', 1),
(14, '2023_01_21_013343_create_feedbacks_table', 1),
(15, '2023_01_21_134026_add_explanation_columns_to_question_options_table', 1),
(16, '2023_01_27_032010_create_notifications_table', 1),
(18, '2023_03_30_231340_create_socialite_users_table', 1),
(19, '2023_05_14_214816_create_filament_blog_tables', 1),
(20, '2023_05_14_214816_create_tag_tables', 1),
(21, '2023_05_14_220700_create_filament_page_hints_table', 1),
(22, '2023_03_28_222622_create_permission_tables', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(37, 'App\\Models\\User', 2),
(38, 'App\\Models\\User', 2),
(61, 'App\\Models\\User', 2),
(62, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view_author', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(2, 'view_any_author', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(3, 'create_author', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(4, 'update_author', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(5, 'restore_author', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(6, 'restore_any_author', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(7, 'replicate_author', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(8, 'reorder_author', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(9, 'delete_author', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(10, 'delete_any_author', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(11, 'force_delete_author', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(12, 'force_delete_any_author', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(13, 'view_category', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(14, 'view_any_category', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(15, 'create_category', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(16, 'update_category', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(17, 'restore_category', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(18, 'restore_any_category', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(19, 'replicate_category', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(20, 'reorder_category', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(21, 'delete_category', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(22, 'delete_any_category', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(23, 'force_delete_category', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(24, 'force_delete_any_category', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(25, 'view_page::hints', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(26, 'view_any_page::hints', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(27, 'create_page::hints', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(28, 'update_page::hints', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(29, 'restore_page::hints', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(30, 'restore_any_page::hints', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(31, 'replicate_page::hints', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(32, 'reorder_page::hints', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(33, 'delete_page::hints', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(34, 'delete_any_page::hints', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(35, 'force_delete_page::hints', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(36, 'force_delete_any_page::hints', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(37, 'view_post', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(38, 'view_any_post', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(39, 'create_post', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(40, 'update_post', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(41, 'restore_post', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(42, 'restore_any_post', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(43, 'replicate_post', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(44, 'reorder_post', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(45, 'delete_post', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(46, 'delete_any_post', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(47, 'force_delete_post', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(48, 'force_delete_any_post', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(49, 'view_question', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(50, 'view_any_question', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(51, 'create_question', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(52, 'update_question', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(53, 'restore_question', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(54, 'restore_any_question', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(55, 'replicate_question', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(56, 'reorder_question', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(57, 'delete_question', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(58, 'delete_any_question', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(59, 'force_delete_question', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(60, 'force_delete_any_question', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(61, 'view_quiz', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(62, 'view_any_quiz', 'web', '2023-06-03 13:25:20', '2023-06-03 13:25:20'),
(63, 'create_quiz', 'web', '2023-06-03 13:25:20', '2023-06-03 13:25:20'),
(64, 'update_quiz', 'web', '2023-06-03 13:25:20', '2023-06-03 13:25:20'),
(65, 'restore_quiz', 'web', '2023-06-03 13:25:20', '2023-06-03 13:25:20'),
(66, 'restore_any_quiz', 'web', '2023-06-03 13:25:20', '2023-06-03 13:25:20'),
(67, 'replicate_quiz', 'web', '2023-06-03 13:25:20', '2023-06-03 13:25:20'),
(68, 'reorder_quiz', 'web', '2023-06-03 13:25:20', '2023-06-03 13:25:20'),
(69, 'delete_quiz', 'web', '2023-06-03 13:25:20', '2023-06-03 13:25:20'),
(70, 'delete_any_quiz', 'web', '2023-06-03 13:25:20', '2023-06-03 13:25:20'),
(71, 'force_delete_quiz', 'web', '2023-06-03 13:25:20', '2023-06-03 13:25:20'),
(72, 'force_delete_any_quiz', 'web', '2023-06-03 13:25:20', '2023-06-03 13:25:20'),
(73, 'view_shield::role', 'web', '2023-06-03 13:25:20', '2023-06-03 13:25:20'),
(74, 'view_any_shield::role', 'web', '2023-06-03 13:25:20', '2023-06-03 13:25:20'),
(75, 'create_shield::role', 'web', '2023-06-03 13:25:20', '2023-06-03 13:25:20'),
(76, 'update_shield::role', 'web', '2023-06-03 13:25:20', '2023-06-03 13:25:20'),
(77, 'delete_shield::role', 'web', '2023-06-03 13:25:20', '2023-06-03 13:25:20'),
(78, 'delete_any_shield::role', 'web', '2023-06-03 13:25:20', '2023-06-03 13:25:20'),
(79, 'view_topic', 'web', '2023-06-03 13:25:20', '2023-06-03 13:25:20'),
(80, 'view_any_topic', 'web', '2023-06-03 13:25:20', '2023-06-03 13:25:20'),
(81, 'create_topic', 'web', '2023-06-03 13:25:20', '2023-06-03 13:25:20'),
(82, 'update_topic', 'web', '2023-06-03 13:25:20', '2023-06-03 13:25:20'),
(83, 'restore_topic', 'web', '2023-06-03 13:25:20', '2023-06-03 13:25:20'),
(84, 'restore_any_topic', 'web', '2023-06-03 13:25:20', '2023-06-03 13:25:20'),
(85, 'replicate_topic', 'web', '2023-06-03 13:25:20', '2023-06-03 13:25:20'),
(86, 'reorder_topic', 'web', '2023-06-03 13:25:20', '2023-06-03 13:25:20'),
(87, 'delete_topic', 'web', '2023-06-03 13:25:20', '2023-06-03 13:25:20'),
(88, 'delete_any_topic', 'web', '2023-06-03 13:25:20', '2023-06-03 13:25:20'),
(89, 'force_delete_topic', 'web', '2023-06-03 13:25:20', '2023-06-03 13:25:20'),
(90, 'force_delete_any_topic', 'web', '2023-06-03 13:25:20', '2023-06-03 13:25:20'),
(91, 'view_user', 'web', '2023-06-03 13:25:20', '2023-06-03 13:25:20'),
(92, 'view_any_user', 'web', '2023-06-03 13:25:20', '2023-06-03 13:25:20'),
(93, 'create_user', 'web', '2023-06-03 13:25:20', '2023-06-03 13:25:20'),
(94, 'update_user', 'web', '2023-06-03 13:25:20', '2023-06-03 13:25:20'),
(95, 'restore_user', 'web', '2023-06-03 13:25:20', '2023-06-03 13:25:20'),
(96, 'restore_any_user', 'web', '2023-06-03 13:25:20', '2023-06-03 13:25:20'),
(97, 'replicate_user', 'web', '2023-06-03 13:25:20', '2023-06-03 13:25:20'),
(98, 'reorder_user', 'web', '2023-06-03 13:25:20', '2023-06-03 13:25:20'),
(99, 'delete_user', 'web', '2023-06-03 13:25:20', '2023-06-03 13:25:20'),
(100, 'delete_any_user', 'web', '2023-06-03 13:25:20', '2023-06-03 13:25:20'),
(101, 'force_delete_user', 'web', '2023-06-03 13:25:20', '2023-06-03 13:25:20'),
(102, 'force_delete_any_user', 'web', '2023-06-03 13:25:20', '2023-06-03 13:25:20'),
(103, 'widget_Overlook', 'web', '2023-06-03 13:25:20', '2023-06-03 13:25:20'),
(104, 'widget_DashboardOverview', 'web', '2023-06-03 13:25:20', '2023-06-03 13:25:20');

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
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `media_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `name`, `question_type_id`, `media_url`, `media_type`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '\"Hello, this is Serena, staff ID K0738 calling from KWSP (Employee Provident Fund). We have observed an increase in scam cases affecting KWSP recently. As a precautionary measure against fraudulent activities, we kindly request your cooperation in verifying your account details. To ensure the security of your identity, may I please ask you to provide your full name, IC number, and bank account information?\" What would you do in this situation?', NULL, NULL, NULL, 1, '2023-06-03 16:16:23', '2023-06-03 16:20:44', NULL),
(2, 'How did you manage to avoid giving her the details?', NULL, NULL, NULL, 1, '2023-06-03 16:24:21', '2023-06-03 16:24:21', NULL),
(3, 'You receive an email from someone claiming to be from Hong Leong Bank, stating that there is an issue with your account and requesting you to update your information immediately. The email includes a link to a website where you can supposedly update your details. What should you do in this situation?', NULL, NULL, NULL, 1, '2023-06-03 16:30:05', '2023-06-03 16:30:05', NULL),
(4, 'If you have been a victim of an online scam, what actions should you take?', NULL, NULL, NULL, 1, '2023-06-03 16:41:23', '2023-06-03 16:41:23', NULL),
(5, 'If your friend or sibling informs you that they have been scammed, what advice would you give them?', NULL, NULL, NULL, 1, '2023-06-03 16:41:45', '2023-06-03 16:41:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `question_options`
--

CREATE TABLE `question_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT 0,
  `explanation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_options`
--

INSERT INTO `question_options` (`id`, `question_id`, `name`, `media_url`, `media_type`, `is_correct`, `explanation`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Provide the requested details.', NULL, NULL, 0, 'Incorrect. The caller is not from KWSP, as KWSP would never ask for private information. It\'s important to clarify and confirm the caller\'s identity before providing any details.', '2023-06-03 16:18:31', '2023-06-03 16:18:31', NULL),
(2, 1, 'Refrain from providing the requested details.', NULL, NULL, 1, 'Correct. It is advisable not to provide the requested details as a precaution against potential scams or fraudulent activities.', '2023-06-03 16:19:08', '2023-06-03 16:19:08', NULL),
(3, 1, 'I\'m not sure.', NULL, NULL, 0, ' Okay. The caller is not from KWSP, as KWSP would not ask for private information. It is crucial to clarify the situation and seek further information or assistance before making a decision.', '2023-06-03 16:20:14', '2023-06-03 16:20:14', NULL),
(4, 3, 'Click on the link and enter my account information to verify identity.', NULL, NULL, 0, 'Incorrect. ', '2023-06-03 16:31:04', '2023-06-03 16:31:04', NULL),
(5, 3, 'Use virustotal.com to verify whether it is a phishing attempt.', NULL, NULL, 1, 'Correct. ', '2023-06-03 16:31:59', '2023-06-03 16:31:59', NULL),
(6, 3, 'Use a URL link verification tool called urlcheckscam.com to verify whether the email was a phishing attempt.', NULL, NULL, 0, 'Incorrect.', '2023-06-03 16:32:47', '2023-06-03 16:32:47', NULL),
(7, 3, 'I\'m not sure.', NULL, NULL, 0, 'Okay.', '2023-06-03 16:33:02', '2023-06-03 16:33:02', NULL),
(8, 4, 'Lodge a police report by calling 999.', NULL, NULL, 0, 'Incorrect. ', '2023-06-03 16:42:39', '2023-06-03 16:42:39', NULL),
(9, 4, 'Call the NSRC\'s hotline - 997.', NULL, NULL, 1, 'Correct. ', '2023-06-03 16:42:58', '2023-06-03 16:42:58', NULL),
(10, 4, 'Call the NSRD\'s hotline - 994.', NULL, NULL, 0, 'Incorrect.', '2023-06-03 16:43:12', '2023-06-03 16:43:12', NULL),
(11, 4, 'I\'m not sure.', NULL, NULL, 0, 'Okay.', '2023-06-03 16:43:19', '2023-06-03 16:43:19', NULL),
(12, 5, 'Lodge a police report by calling 999.', NULL, NULL, 0, 'Incorrect. ', '2023-06-03 16:44:15', '2023-06-03 16:44:15', NULL),
(13, 5, 'Call the NSRC\'s hotline - 997.', NULL, NULL, 1, 'Correct. ', '2023-06-03 16:44:23', '2023-06-03 16:44:23', NULL),
(14, 5, 'Call the NSRD\'s hotline - 994.', NULL, NULL, 0, 'Incorrect.', '2023-06-03 16:44:36', '2023-06-03 16:44:36', NULL),
(15, 5, 'I\'m not sure.', NULL, NULL, 0, 'Okay. ', '2023-06-03 16:44:44', '2023-06-03 16:44:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `question_types`
--

CREATE TABLE `question_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_marks` double(8,2) NOT NULL DEFAULT 0.00,
  `pass_marks` double(8,2) NOT NULL DEFAULT 0.00,
  `negative_marking_settings` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`negative_marking_settings`)),
  `max_attempts` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `is_published` tinyint(4) NOT NULL DEFAULT 0,
  `media_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `valid_from` timestamp NOT NULL DEFAULT '2023-06-03 13:24:33',
  `valid_upto` timestamp NULL DEFAULT NULL,
  `time_between_attempts` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `name`, `slug`, `description`, `total_marks`, `pass_marks`, `negative_marking_settings`, `max_attempts`, `is_published`, `media_url`, `media_type`, `duration`, `valid_from`, `valid_upto`, `time_between_attempts`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Social Engineering Quiz', 'social-engineering-quiz', 'Welcome! Take this quiz to test your social engineering awareness.', 0.00, 0.00, NULL, 0, 1, 'JtyHH8DbD8RWKFPS98k0NifXRy9RGd-metacXVpeiBsb2dvLmpwZw==-.jpg', NULL, 0, '2023-06-03 13:24:33', NULL, 0, '2023-06-03 16:46:52', '2023-06-03 16:46:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_attempts`
--

CREATE TABLE `quiz_attempts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED DEFAULT NULL,
  `participant_id` int(10) UNSIGNED NOT NULL,
  `participant_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_attempts`
--

INSERT INTO `quiz_attempts` (`id`, `quiz_id`, `participant_id`, `participant_type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 1, 2, 'filament_user', '2023-06-04 12:04:12', '2023-06-04 12:04:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_attempt_answers`
--

CREATE TABLE `quiz_attempt_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_attempt_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quiz_question_id` bigint(20) UNSIGNED DEFAULT NULL,
  `question_option_id` bigint(20) UNSIGNED DEFAULT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_attempt_answers`
--

INSERT INTO `quiz_attempt_answers` (`id`, `quiz_attempt_id`, `quiz_question_id`, `question_option_id`, `answer`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 1, 6, NULL, '2023-06-04 12:04:12', '2023-06-05 05:03:20', NULL),
(2, 3, 2, 10, NULL, '2023-06-05 05:03:20', '2023-06-05 05:03:33', NULL),
(3, 3, 3, 12, NULL, '2023-06-05 05:03:33', '2023-06-05 05:03:44', NULL),
(4, 3, 4, 2, NULL, '2023-06-05 05:03:44', '2023-06-05 05:03:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_authors`
--

CREATE TABLE `quiz_authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED DEFAULT NULL,
  `author_id` int(10) UNSIGNED NOT NULL,
  `author_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED DEFAULT NULL,
  `question_id` bigint(20) UNSIGNED DEFAULT NULL,
  `marks` double(8,2) UNSIGNED NOT NULL DEFAULT 0.00,
  `negative_marks` double(8,2) UNSIGNED NOT NULL DEFAULT 0.00,
  `is_optional` tinyint(1) NOT NULL DEFAULT 0,
  `order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`id`, `quiz_id`, `question_id`, `marks`, `negative_marks`, `is_optional`, `order`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 3, 0.00, 0.00, 0, 0, '2023-06-03 17:06:38', '2023-06-03 17:06:38', NULL),
(2, 1, 4, 0.00, 0.00, 0, 0, '2023-06-03 17:06:43', '2023-06-03 17:06:43', NULL),
(3, 1, 5, 0.00, 0.00, 0, 0, '2023-06-03 17:06:43', '2023-06-03 17:06:43', NULL),
(4, 1, 1, 0.00, 0.00, 0, 0, '2023-06-03 17:06:54', '2023-06-03 17:06:54', NULL),
(5, 1, 2, 0.00, 0.00, 0, 0, '2023-06-03 17:06:54', '2023-06-03 17:06:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'web', '2023-06-03 13:25:19', '2023-06-03 13:25:19'),
(2, 'filament_user', 'web', '2023-06-03 13:25:20', '2023-06-03 13:25:20');

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
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(37, 2),
(38, 1),
(38, 2),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(61, 2),
(62, 1),
(62, 2),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(96, 1),
(97, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(103, 1),
(104, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Gy3abWEfeUUNR6u8JiVlknxZ9vTYrkfZMJKIemuk', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiZU9neEp2djBZR1VQb1Y3NzBaVVFmRzY5TVpGS21oRThPMXpZc3lJOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9xcHEvcXVpenplcy8xL2F0dGVtcHQvNCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRRVnlvUmFGOEEybjhjdmROOFI3aHJ1NlVkUXhPNXlYV0NoSGcuOG8uWmhEYUhncTU3bmlReSI7czo4OiJmaWxhbWVudCI7YTowOnt9fQ==', 1685941613),
('NyBJ4FVtGy1Dkusoa8pHMBujCSQ7gdmgqaAQcI2s', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZXhCblRCZlpxTzBlYUUxdXZBRExRa1g2SGdrRUQ3QkwwcHlKb3k2bSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9xcHEvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1685966001),
('t6qf1cJdVg22XT6T92oLCO7y4f3DXFZE07PcJElL', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQ2hnZ0FMUUYxRDY0RXNEQjIzYVd5NzRGemhmbkh0TzVUdmdoOTNxciI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0NToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3FwcS9xdWl6emVzLzEvYXR0ZW1wdC80Ijt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9xcHEvbG9naW4iO319', 1685953308);

-- --------------------------------------------------------

--
-- Table structure for table `socialite_users`
--

CREATE TABLE `socialite_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taggables`
--

CREATE TABLE `taggables` (
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `taggable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taggable_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`name`)),
  `slug` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`slug`)),
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_column` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `topicables`
--

CREATE TABLE `topicables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `topic_id` bigint(20) UNSIGNED DEFAULT NULL,
  `topicable_id` int(10) UNSIGNED NOT NULL,
  `topicable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topicables`
--

INSERT INTO `topicables` (`id`, `topic_id`, `topicable_id`, `topicable_type`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Harishdurga\\LaravelQuiz\\Models\\Question', NULL, NULL),
(2, 1, 2, 'Harishdurga\\LaravelQuiz\\Models\\Question', NULL, NULL),
(3, 2, 3, 'Harishdurga\\LaravelQuiz\\Models\\Question', NULL, NULL),
(4, 3, 4, 'Harishdurga\\LaravelQuiz\\Models\\Question', NULL, NULL),
(5, 3, 5, 'Harishdurga\\LaravelQuiz\\Models\\Question', NULL, NULL),
(6, 2, 1, 'Harishdurga\\LaravelQuiz\\Models\\Quiz', NULL, NULL),
(7, 3, 1, 'Harishdurga\\LaravelQuiz\\Models\\Quiz', NULL, NULL),
(8, 1, 1, 'Harishdurga\\LaravelQuiz\\Models\\Quiz', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `slug`, `parent_id`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'KWSP', 'kwsp', NULL, 1, '2023-06-03 16:10:40', '2023-06-03 16:25:34', NULL),
(2, 'Hong Leong', 'hong-leong', NULL, 1, '2023-06-03 16:26:11', '2023-06-03 16:26:11', NULL),
(3, 'NSRC', 'nsrc', NULL, 1, '2023-06-03 16:40:29', '2023-06-03 16:40:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `google_id`) VALUES
(1, 'Super Admin', 'admin@test.com', '2023-06-03 13:24:36', '$2y$10$kW9ej9KP9bb290pE6HbuNOU2XvNUZUwlrdXBUTWmNmyqutkVOfnri', NULL, NULL, NULL, '1rpC2umXSo', NULL, NULL, '2023-06-03 13:24:36', '2023-06-03 13:24:36', NULL),
(2, 'Muhammad Rahimi', 'rahimi@test.com', NULL, '$2y$10$QVyoRaF8A2n8cvdN8R7hru6UdQxO5yXWChHg.8o.ZhDaHgq57niQy', NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-03 17:08:54', '2023-06-03 17:08:54', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_authors`
--
ALTER TABLE `blog_authors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_authors_email_unique` (`email`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_categories_slug_unique` (`slug`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_posts_slug_unique` (`slug`),
  ADD KEY `blog_posts_blog_author_id_foreign` (`blog_author_id`),
  ADD KEY `blog_posts_blog_category_id_foreign` (`blog_category_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filament_page_hints`
--
ALTER TABLE `filament_page_hints`
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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_question_type_id_foreign` (`question_type_id`);

--
-- Indexes for table `question_options`
--
ALTER TABLE `question_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_options_question_id_foreign` (`question_id`);

--
-- Indexes for table `question_types`
--
ALTER TABLE `question_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_attempts`
--
ALTER TABLE `quiz_attempts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_attempts_quiz_id_foreign` (`quiz_id`);

--
-- Indexes for table `quiz_attempt_answers`
--
ALTER TABLE `quiz_attempt_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_attempt_answers_quiz_attempt_id_foreign` (`quiz_attempt_id`),
  ADD KEY `quiz_attempt_answers_quiz_question_id_foreign` (`quiz_question_id`),
  ADD KEY `quiz_attempt_answers_question_option_id_foreign` (`question_option_id`);

--
-- Indexes for table `quiz_authors`
--
ALTER TABLE `quiz_authors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_authors_quiz_id_foreign` (`quiz_id`);

--
-- Indexes for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_questions_quiz_id_foreign` (`quiz_id`),
  ADD KEY `quiz_questions_question_id_foreign` (`question_id`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `socialite_users`
--
ALTER TABLE `socialite_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `socialite_users_provider_provider_id_unique` (`provider`,`provider_id`);

--
-- Indexes for table `taggables`
--
ALTER TABLE `taggables`
  ADD UNIQUE KEY `taggables_tag_id_taggable_id_taggable_type_unique` (`tag_id`,`taggable_id`,`taggable_type`),
  ADD KEY `taggables_taggable_type_taggable_id_index` (`taggable_type`,`taggable_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topicables`
--
ALTER TABLE `topicables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topicables_topic_id_foreign` (`topic_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topics_parent_id_foreign` (`parent_id`);

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
-- AUTO_INCREMENT for table `blog_authors`
--
ALTER TABLE `blog_authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `filament_page_hints`
--
ALTER TABLE `filament_page_hints`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `question_options`
--
ALTER TABLE `question_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `question_types`
--
ALTER TABLE `question_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quiz_attempts`
--
ALTER TABLE `quiz_attempts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quiz_attempt_answers`
--
ALTER TABLE `quiz_attempt_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `quiz_authors`
--
ALTER TABLE `quiz_authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `socialite_users`
--
ALTER TABLE `socialite_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `topicables`
--
ALTER TABLE `topicables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD CONSTRAINT `blog_posts_blog_author_id_foreign` FOREIGN KEY (`blog_author_id`) REFERENCES `blog_authors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blog_posts_blog_category_id_foreign` FOREIGN KEY (`blog_category_id`) REFERENCES `blog_categories` (`id`) ON DELETE SET NULL;

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
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_question_type_id_foreign` FOREIGN KEY (`question_type_id`) REFERENCES `question_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `question_options`
--
ALTER TABLE `question_options`
  ADD CONSTRAINT `question_options_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quiz_attempts`
--
ALTER TABLE `quiz_attempts`
  ADD CONSTRAINT `quiz_attempts_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quiz_attempt_answers`
--
ALTER TABLE `quiz_attempt_answers`
  ADD CONSTRAINT `quiz_attempt_answers_question_option_id_foreign` FOREIGN KEY (`question_option_id`) REFERENCES `question_options` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quiz_attempt_answers_quiz_attempt_id_foreign` FOREIGN KEY (`quiz_attempt_id`) REFERENCES `quiz_attempts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quiz_attempt_answers_quiz_question_id_foreign` FOREIGN KEY (`quiz_question_id`) REFERENCES `quiz_questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quiz_authors`
--
ALTER TABLE `quiz_authors`
  ADD CONSTRAINT `quiz_authors_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD CONSTRAINT `quiz_questions_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quiz_questions_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `taggables`
--
ALTER TABLE `taggables`
  ADD CONSTRAINT `taggables_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `topicables`
--
ALTER TABLE `topicables`
  ADD CONSTRAINT `topicables_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `topics` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
