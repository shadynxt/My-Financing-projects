-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1build0.15.04.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 11, 2017 at 03:46 PM
-- Server version: 5.6.28-0ubuntu0.15.04.1
-- PHP Version: 5.6.4-4ubuntu6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Financing`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE IF NOT EXISTS `about_us` (
`id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `title`, `body`, `img`, `created_at`, `updated_at`) VALUES
(1, 'مشروع', 'تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى  ن ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى                ن ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى  ن ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى                تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى  ن ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى                ن ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى  ن ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى                تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى  ن ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تلقائى ص تل', 'about.png', NULL, '2017-09-20 12:21:11');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
`id` int(10) unsigned NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', 'X1bXFIsYpouHw', 'SB2otmHwXvFXF8G6D3rKqJyuOO3nOJQ551McF9UKKLk1Qw6oh2Up8N8MwTnL', NULL, '2017-08-17 06:41:30'),
(2, 'nada', 'nada@gmail.com', '$2y$10$7.hI/P3dRbNdJl.ozO4DCeCT0nh1DR2GFLlrMp8/GexQvlRFhd9P6', NULL, '2017-10-01 13:43:32', '2017-10-01 13:43:32');

-- --------------------------------------------------------

--
-- Table structure for table `brief`
--

CREATE TABLE IF NOT EXISTS `brief` (
`id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brief`
--

INSERT INTO `brief` (`id`, `title`, `body`, `created_at`, `updated_at`) VALUES
(1, 'ابدأ مشروعك', 'دليلك لمعرفة مصادر رأس المال لتمويل المشاريع الرياديه الناجحه', '0000-00-00 00:00:00', '2017-10-01 13:42:35');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_pic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `category_pic`, `created_at`, `updated_at`) VALUES
(1, 'طعام', '2017-07-18-08:12:00-1961644401', '2017-07-18 06:12:00', '2017-07-18 06:12:00'),
(2, 'افلام', '2017-07-18-08:40:43-832906123', '2017-07-18 06:40:43', '2017-07-18 06:40:43'),
(3, 'الموضه', '2017-07-18-08:41:08-2071309797', '2017-07-18 06:41:08', '2017-07-18 06:41:08'),
(4, 'التصميم', '2017-07-18-08:50:22-1019691280', '2017-07-18 06:50:22', '2017-07-18 06:50:22'),
(5, 'الحرف', '2017-07-18-08:50:46-1841213115', '2017-07-18 06:50:46', '2017-07-18 06:50:46'),
(6, 'الفنون', '2017-07-18-08:51:03-1164302055', '2017-07-18 06:51:03', '2017-07-18 06:51:03'),
(7, 'رسم كاريكاتير ', '2017-07-18-08:52:51-1225146632', '2017-07-18 06:52:51', '2017-07-18 06:52:51'),
(8, 'موسيقي ', '2017-07-18-08:53:16-282680322', '2017-07-18 06:53:16', '2017-07-18 06:53:16'),
(9, 'تكنولوجيا', '2017-07-18-08:53:39-768035615', '2017-07-18 06:53:39', '2017-07-18 06:53:39'),
(10, 'تعليم', '2017-07-18-08:54:04-474090800', '2017-07-18 06:54:04', '2017-07-18 06:54:04'),
(11, 'صحافه', '2017-07-18-08:54:18-153306380', '2017-07-18 06:54:18', '2017-07-18 06:54:18');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'الرياض', '2017-08-08 07:31:46', '2017-08-08 07:31:46');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`id` int(10) unsigned NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `idea_project_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `body`, `idea_project_id`, `user_id`, `created_at`, `updated_at`) VALUES
(47, '12nada', 6, 17, '2017-09-11 10:11:19', '2017-10-01 13:55:16'),
(48, 'good', 6, 17, '2017-09-11 10:35:27', '2017-09-11 10:35:27'),
(52, 'good', 6, 17, '2017-09-20 10:56:26', '2017-09-20 10:56:26'),
(56, '1nada', 6, 18, '2017-10-01 13:54:36', '2017-10-01 13:54:36'),
(57, 'nada', 8, 20, '2017-10-01 13:54:50', '2017-10-01 13:54:50');

-- --------------------------------------------------------

--
-- Table structure for table `Contact_us`
--

CREATE TABLE IF NOT EXISTS `Contact_us` (
`id` int(10) unsigned NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` int(11) NOT NULL,
  `msg` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Contact_us`
--

INSERT INTO `Contact_us` (`id`, `first_name`, `last_name`, `email`, `phone_number`, `msg`, `created_at`, `updated_at`) VALUES
(1, 'nada', 'nada', 'nadarageh66@gmail.com', 1144025341, 'dhfghjk.l/kkhgfdsfghj', '2017-09-12 11:45:36', '2017-09-12 11:45:36'),
(2, 'nody', 'nody', 'nody@gmail.com', 1144025341, 'nadanada', '2017-09-12 11:51:39', '2017-09-12 11:51:39'),
(3, 'nody', 'nody', 'nody@gmail.com', 1144025341, 'nadanada', '2017-09-12 11:52:51', '2017-09-12 11:52:51'),
(4, 'nody', 'nody', 'nody@gmail.com', 1144025341, 'nadanada', '2017-09-12 11:53:21', '2017-09-12 11:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE IF NOT EXISTS `conversations` (
`id` int(10) unsigned NOT NULL,
  `user_one` int(10) unsigned NOT NULL,
  `user_two` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=822 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `conversations`
--

INSERT INTO `conversations` (`id`, `user_one`, `user_two`, `created_at`, `updated_at`) VALUES
(817, 16, 10, '2017-08-14 07:41:39', '2017-08-14 07:41:39'),
(818, 18, 18, '2017-08-20 09:21:43', '2017-08-20 09:21:43'),
(819, 18, 10, '2017-08-20 09:22:15', '2017-08-20 09:22:15'),
(820, 19, 17, '2017-09-12 07:15:27', '2017-09-12 07:15:27'),
(821, 20, 17, '2017-09-12 07:45:57', '2017-09-12 07:45:57');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Egypt', '2017-07-08 13:04:14', '2017-07-08 13:04:14');

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE IF NOT EXISTS `favorite` (
`id` int(10) unsigned NOT NULL,
  `idea_project_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE IF NOT EXISTS `follow` (
`id` int(10) unsigned NOT NULL,
  `project_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`id`, `project_id`, `user_id`, `created_at`, `updated_at`) VALUES
(45, 9, 10, '2017-07-31 07:30:53', '2017-10-01 14:08:42'),
(48, 10, 1, '2017-08-02 10:43:18', '2017-08-02 10:43:18'),
(49, 3, 42, '2017-08-02 10:46:45', '2017-08-02 10:46:45'),
(51, 1, 42, '2017-08-02 10:49:17', '2017-08-02 10:49:17'),
(57, 16, 50, '2017-08-20 11:44:09', '2017-08-20 11:44:09'),
(58, 17, 50, '2017-08-20 11:48:17', '2017-08-20 11:48:17'),
(59, 16, 52, '2017-08-21 12:02:31', '2017-08-21 12:02:31'),
(61, 7, 17, '2017-10-01 14:14:48', '2017-10-01 14:14:48');

-- --------------------------------------------------------

--
-- Table structure for table `goals`
--

CREATE TABLE IF NOT EXISTS `goals` (
`id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `goals`
--

INSERT INTO `goals` (`id`, `title`, `body`, `img`, `created_at`, `updated_at`) VALUES
(1, 'المبادره', '      هذا هو نص مثالى يمكن ان يستبدل فى نفس المساحه . لقد تم توليد هذا النص من مولد النص العربى  حيث يمن ان تولد مثل هذا النص او                  العديد من النصوص التى يولدها التطبيق', '2017-07-28-09:00:51-1383717876', NULL, '2017-09-20 11:26:12'),
(2, 'المصداقيه ', '  هذا هو نص مثالى يمكن ان يستبدل فى نفس المساحه . لقد تم توليد هذا النص من مولد النص العربى  حيث يمن ان تولد مثل هذا النص او                  العديد من النصوص التى يولدها التطبيق', 'goal_1.png', NULL, '2017-09-20 11:26:18'),
(3, 'المشاريع الناجحه ', ' هذا هو نص مثالى يمكن ان يستبدل فى نفس المساحه . لقد تم توليد هذا النص من مولد النص العربى  حيث يمن ان تولد مثل هذا النص او\r\n                  العديد من النصوص التى يولدها التطبيق', 'goal_2.png', NULL, NULL),
(4, 'خدمات المجتمع', '     هذا هو نص مثالى يمكن ان يستبدل فى نفس المساحه . لقد تم توليد هذا النص من مولد النص العربى  حيث يمن ان تولد مثل هذا النص او\r\n                  العديد من النصوص التى يولدها التطبيق', 'goal_3.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ideas_projects`
--

CREATE TABLE IF NOT EXISTS `ideas_projects` (
`id` int(10) unsigned NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idea` text COLLATE utf8_unicode_ci NOT NULL,
  `budget` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `basic_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `additional_photos` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video` text COLLATE utf8_unicode_ci,
  `youtube_link` text COLLATE utf8_unicode_ci,
  `views` double DEFAULT NULL,
  `expected_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city_id` int(10) unsigned DEFAULT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ideas_projects`
--

INSERT INTO `ideas_projects` (`id`, `address`, `idea`, `budget`, `link`, `basic_image`, `additional_photos`, `video`, `youtube_link`, `views`, `expected_date`, `city_id`, `category_id`, `user_id`, `created_at`, `updated_at`) VALUES
(6, 'dsdfghjkl;', 'LoginSiteMiddleware', '143564', 'LoginSiteMiddleware', '2017-09-11-12:10:41-460575059', NULL, NULL, NULL, 41, '2017-09-12', 1, 2, 17, '2017-09-11 10:10:41', '2017-10-01 06:42:21'),
(7, 'sdfghjkl', 'sdfghjklkgddffg', '3456', 'https://www.youtube.com/watch?v=1MA266uRa2Y&feature=youtu.be', '2017-09-11-13:52:10-742854609', NULL, NULL, '', 19, '2017-09-13', 1, 10, 19, '2017-09-11 11:52:10', '2017-10-01 11:18:46'),
(8, 'sdfghjkl', 'https://www.youtub', '234456', 'https://www.youtube.c', '2017-09-11-14:08:51-440647154', NULL, NULL, 'https://www.youtube.com/watch?v=1MA266uRa2Y&feature=youtu.be', 33, '2017-09-15', 1, 2, 19, '2017-09-11 12:08:51', '2017-10-09 06:20:29'),
(9, 'rtyutrewq', 'sdsfgtyugtgrfd', '34564', 'efrgthtyuytre', '2017-10-08-08:09:58-1942681250', NULL, NULL, '', NULL, '2017-10-19', 1, 4, 17, '2017-10-08 06:09:58', '2017-10-08 06:09:58'),
(10, 'jkhjgfdsghjk', 'hgfdgfghjkll', '234567', 'kjhgfdsadfghghj', '2017-10-11-12:44:16-473564655', NULL, NULL, '', NULL, '10/11/2017', 1, 2, 17, '2017-10-11 10:44:16', '2017-10-11 10:44:16'),
(11, 'hgfdsdfg', 'fdfghjkjjkhhgfg', '12345', 'hgdsfghjkl', '2017-10-11-12:44:59-1828512239', NULL, NULL, '', NULL, '10/11/2017', 1, 1, 17, '2017-10-11 10:44:59', '2017-10-11 10:44:59');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
`id` int(10) unsigned NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idea_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `img`, `idea_id`, `created_at`, `updated_at`) VALUES
(1, '2017-10-08-08:09:59-1230023251', 9, '2017-10-08 06:09:59', '2017-10-08 06:09:59'),
(2, '2017-10-08-08:09:59-445115978', 9, '2017-10-08 06:09:59', '2017-10-08 06:09:59'),
(3, '2017-10-11-12:44:16-450231013', 10, '2017-10-11 10:44:16', '2017-10-11 10:44:16'),
(4, '2017-10-11-12:44:16-1259591309', 10, '2017-10-11 10:44:16', '2017-10-11 10:44:16'),
(5, '2017-10-11-12:44:16-1435764493', 10, '2017-10-11 10:44:16', '2017-10-11 10:44:16'),
(6, '2017-10-11-12:44:16-466876481', 10, '2017-10-11 10:44:16', '2017-10-11 10:44:16');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
`id` int(10) unsigned NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `user_from` int(10) unsigned NOT NULL,
  `user_to` int(10) unsigned NOT NULL,
  `conversation_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `user_from`, `user_to`, `conversation_id`, `created_at`, `updated_at`) VALUES
(1, 'good\r\n', 16, 10, 817, '2017-08-14 07:41:48', '2017-08-14 07:41:48'),
(2, 'منتنتمنكطكمكن', 16, 10, 817, '2017-08-14 07:59:23', '2017-08-14 07:59:23'),
(3, 'jkb,kjn lk,', 18, 10, 818, '2017-08-20 09:23:00', '2017-08-20 09:23:00'),
(4, 'hiiii', 20, 17, 821, '2017-09-12 07:46:03', '2017-09-12 07:46:03'),
(5, 'good ', 17, 19, 820, '2017-09-12 07:47:03', '2017-09-12 07:47:03');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
`id` int(10) unsigned NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_07_06_102935_cities', 1),
(2, '2017_07_06_102941_users', 1),
(3, '2017_07_06_103807_categories', 1),
(4, '2017_07_06_104019_password_resets', 1),
(5, '2017_07_06_104033_admins', 1),
(6, '2017_07_06_104048_MobiltTokens', 1),
(7, '2017_07_06_104640_Ideas', 1),
(8, '2017_07_06_105638_Supported', 1),
(9, '2017_07_06_105651_comments', 1),
(10, '2017_07_06_105702_contact_us', 1),
(11, '2017_07_07_124944_favorate', 1),
(12, '2017_07_07_124952_follow', 1),
(13, '2017_07_16_082256_images', 1),
(14, '2017_07_16_082410_slider', 1),
(15, '2017_07_16_082437_goals', 1),
(16, '2017_07_16_110658_Brief', 1),
(17, '2017_07_30_075509_recent_the_project', 1),
(18, '2017_07_30_083849_about_us', 1),
(19, '2017_08_07_094437_create_notifications_table', 1),
(20, '2017_08_07_151047_conversations', 1),
(21, '2017_08_08_081947_messages', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mobile__tokens`
--

CREATE TABLE IF NOT EXISTS `mobile__tokens` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notifiable_id` int(10) unsigned NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_id`, `notifiable_type`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('0a8f78bb-1cbe-43cc-b384-4c0d5c5a78ac', 'App\\Notifications\\CommentOnProject', 10, 'App\\User', '{"comment":{"body":"GOOD","idea_project_id":"4","user_id":17,"updated_at":"2017-09-11 12:07:13","created_at":"2017-09-11 12:07:13","id":43},"userThatNoty":{"id":10,"token":"EAAUJZC5AL4ukBAF2a4iKnBR6PonYbOOoztxnpKcSt6YbjJgXqfCgAxBu9hX7OjQSN0lVR1mf6hZCUZAzVp2uUbFrCFmuDgZCEdpQMvZCHgqAKSfGjtxvwdhTlZCzNpizHyntQKjibMVRKWOUTa8dgH7wHRF7uMebhLuV0ozwxO7AZDZD","first_name":"\\u0646\\u062f\\u0649 \\u0622\\u0644 \\u0631\\u0627\\u062c\\u062d4567","last_name":"\\u0646\\u062f\\u0649 \\u0622\\u0644 \\u0631\\u0627\\u062c\\u062d","facebook_id":"1908586032713629","twitter_id":null,"phone_number":"11449253","email":"nadanada@gmail.com","city_id":"1","profile_pic":null,"about_you":"","link_facebook":"","link":"","active":"0","created_at":"2017-08-14 08:19:12","updated_at":"2017-08-20 11:34:01"},"project":{"id":4,"address":"\\u0645\\u062d\\u0644\\u0627\\u062a \\u0644\\u0644\\u0623\\u0633\\u0631 \\u0627\\u0644\\u0645\\u0646\\u062a\\u062c\\u0629","idea":"\\u0635\\u064f\\u0645\\u0645 \\u0627\\u0644\\u0628\\u0631\\u0646\\u0627\\u0645\\u062c \\u0644\\u062f\\u0639\\u0645 \\u0627\\u0644\\u0623\\u0633\\u0631 \\u0627\\u0644\\u0645\\u0646\\u062a\\u062c\\u0629\\u060c \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0623\\u062e\\u0635 \\u0627\\u0644\\u0633\\u064a\\u062f\\u0627\\u062a\\u060c \\u0627\\u0644\\u0644\\u0627\\u062a\\u064a \\u062a\\u0641\\u0636\\u0644\\u0646 \\u0627\\u0644\\u0639\\u0645\\u0644 \\u0645\\u0646 \\u0627\\u0644\\u0645\\u0646\\u0632\\u0644 \\u0641\\u064a \\u0645\\u0634\\u0631\\u0648\\u0639\\u0627\\u062a \\u0645\\u062a\\u0646\\u0627\\u0647\\u064a\\u0629 \\u0627\\u0644\\u0635\\u063a\\u0631\\u060c \\u0648\\u064a\\u062a\\u0636\\u0645\\u0646 \\u062a\\u0642\\u062f\\u064a\\u0645 \\u0627\\u0644\\u062f\\u0639\\u0645 \\u0627\\u0644\\u0645\\u0627\\u0644\\u064a \\u0648\\u0627\\u0644\\u0641\\u0646\\u064a \\u0648\\u0627\\u0644\\u0625\\u062f\\u0627\\u0631\\u064a \\u0648\\u0627\\u0644\\u062a\\u0633\\u0648\\u064a\\u0642\\u064a \\u0644\\u0645\\u0633\\u0627\\u0639\\u062f\\u0629 \\u0647\\u0624\\u0644\\u0627\\u0621 \\u0627\\u0644\\u0633\\u064a\\u062f\\u0627\\u062a \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0625\\u0646\\u062a\\u0627\\u062c \\u0648\\u0628\\u064a\\u0639 \\u062a\\u0644\\u0643 \\u0627\\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a. \\u0643\\u0645\\u0627 \\u0646\\u0647\\u062a\\u0645 \\u0623\\u064a\\u0636\\u0627\\u064b \\u0628\\u062a\\u064a\\u0633\\u064a\\u0631 \\u0627\\u0644\\u0623\\u0646\\u0634\\u0637\\u0629 \\u0627\\u0644\\u062a\\u0633\\u0648\\u064a\\u0642\\u064a\\u0629\\u060c \\u0648\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0641\\u064a \\u0627\\u0644\\u0623\\u0633\\u0648\\u0627\\u0642 \\u0648\\u0627\\u0644\\u0645\\u0639\\u0627\\u0631\\u0636 \\u0648\\u0641\\u064a \\u0627\\u0644\\u0641\\u0639\\u0627\\u0644\\u064a\\u0627\\u062a \\u0627\\u0644\\u062a\\u062c\\u0627\\u0631\\u064a\\u0629\\u060c \\u0623\\u0648 \\u0627\\u0644\\u062a\\u0631\\u0648\\u064a\\u062c \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0627\\u0644\\u0645\\u0633\\u062a\\u0641\\u064a\\u062f\\u064a\\u0646 \\u0645\\u0646 \\u062e\\u0644\\u0627\\u0644 \\u0645\\u0648\\u0627\\u0642\\u0639 \\u0627\\u0644\\u062a\\u0648\\u0627\\u0635\\u0644 \\u0627\\u0644\\u0627\\u062c\\u062a\\u0645\\u0627\\u0639\\u064a. ","budget":"1000","link":"","basic_image":"2017-08-17-13:38:58-192335341","additional_photos":"additional_photos\\/2017-08-17-09:22:31-foodfestival-gallery-1-1024x683.jpg","video":null,"youtube_link":"","views":"184","expected_date":"2017-12-23 00:00:00","city_id":"1","category_id":"1","user_id":"10","created_at":"2017-08-14 09:01:22","updated_at":"2017-09-11 12:07:00"},"ownerName":"nada rageh","ownerImg":null}', NULL, '2017-09-11 10:07:14', '2017-09-11 10:07:14'),
('162fec5e-a2d9-4be9-802a-c391ba1da146', 'App\\Notifications\\SiteSupport', 19, 'App\\User', '{"support":{"amount_of_contribution":"234563456","full_name":"nadarageh","email":"nadarageh66@gmail.com","known":1,"idea_project_id":"15","updated_at":"2017-10-02 08:56:11","created_at":"2017-10-02 08:56:11","id":17,"project":{"id":15,"address":"  var_dump($reques","idea":"sdfghj","budget":"1344","link":"  var_dump($request->additional_photos);","basic_image":"2017-09-12-09:09:51-939750814","additional_photos":null,"video":null,"youtube_link":"","views":"6","expected_date":"2017-09-15 00:00:00","city_id":"1","category_id":"2","user_id":"19","created_at":"2017-09-12 09:09:51","updated_at":"2017-10-02 08:55:52"}},"project":{"id":15,"address":"  var_dump($reques","idea":"sdfghj","budget":"1344","link":"  var_dump($request->additional_photos);","basic_image":"2017-09-12-09:09:51-939750814","additional_photos":null,"video":null,"youtube_link":"","views":"6","expected_date":"2017-09-15 00:00:00","city_id":"1","category_id":"2","user_id":"19","created_at":"2017-09-12 09:09:51","updated_at":"2017-10-02 08:55:52"},"userThatNotify":{"id":19,"token":"2y102Q1InJmSkZaVXaQGJwEieQmlS7xNBSd8afshCnNaYrG2APenY","first_name":"nada","last_name":"rageh","facebook_id":null,"twitter_id":null,"phone_number":"1144025341","email":"nada@gmail.com","city_id":"1","profile_pic":null,"about_you":null,"link_facebook":null,"link":null,"active":"0","created_at":"2017-09-11 13:04:06","updated_at":"2017-09-12 09:45:01"},"ownerName":"nadarageh"}', NULL, '2017-10-02 06:56:11', '2017-10-02 06:56:11'),
('19660517-c2fb-4f7d-a383-8bfb9171d7e5', 'App\\Notifications\\CommentOnProject', 19, 'App\\User', '{"comment":{"body":"good","idea_project_id":"11","user_id":20,"updated_at":"2017-09-15 18:13:48","created_at":"2017-09-15 18:13:48","id":51},"userThatNoty":{"id":19,"token":"2y102Q1InJmSkZaVXaQGJwEieQmlS7xNBSd8afshCnNaYrG2APenY","first_name":"nada","last_name":"rageh","facebook_id":null,"twitter_id":null,"phone_number":"1144025341","email":"nada@gmail.com","city_id":"1","profile_pic":null,"about_you":null,"link_facebook":null,"link":null,"active":"0","created_at":"2017-09-11 13:04:06","updated_at":"2017-09-12 09:45:01"},"project":{"id":11,"address":"sdfghjkl","idea":"count","budget":"4567","link":"count","basic_image":"2017-09-11-16:28:04-115692110","additional_photos":null,"video":null,"youtube_link":"","views":"1","expected_date":"2017-09-15 00:00:00","city_id":"1","category_id":"9","user_id":"19","created_at":"2017-09-11 16:28:04","updated_at":"2017-09-15 18:13:35"},"ownerName":"nody rageh","ownerImg":null}', NULL, '2017-09-15 16:13:48', '2017-09-15 16:13:48'),
('1b27cdce-dd1a-40a3-bc8b-bb932cb44bc4', 'App\\Notifications\\SiteSupport', 19, 'App\\User', '{"support":{"amount_of_contribution":"2345645","full_name":"nada nada","email":"nadarageh66@gmail.com","known":1,"idea_project_id":"8","updated_at":"2017-10-02 09:16:44","created_at":"2017-10-02 09:16:44","id":18,"project":{"id":8,"address":"sdfghjkl","idea":"https:\\/\\/www.youtub","budget":"234456","link":"https:\\/\\/www.youtube.c","basic_image":"2017-09-11-14:08:51-440647154","additional_photos":null,"video":null,"youtube_link":"https:\\/\\/www.youtube.com\\/watch?v=1MA266uRa2Y&feature=youtu.be","views":"26","expected_date":"2017-09-15 00:00:00","city_id":"1","category_id":"2","user_id":"19","created_at":"2017-09-11 14:08:51","updated_at":"2017-10-02 09:15:19"}},"project":{"id":8,"address":"sdfghjkl","idea":"https:\\/\\/www.youtub","budget":"234456","link":"https:\\/\\/www.youtube.c","basic_image":"2017-09-11-14:08:51-440647154","additional_photos":null,"video":null,"youtube_link":"https:\\/\\/www.youtube.com\\/watch?v=1MA266uRa2Y&feature=youtu.be","views":"26","expected_date":"2017-09-15 00:00:00","city_id":"1","category_id":"2","user_id":"19","created_at":"2017-09-11 14:08:51","updated_at":"2017-10-02 09:15:19"},"userThatNotify":{"id":19,"token":"2y102Q1InJmSkZaVXaQGJwEieQmlS7xNBSd8afshCnNaYrG2APenY","first_name":"nada","last_name":"rageh","facebook_id":null,"twitter_id":null,"phone_number":"1144025341","email":"nada@gmail.com","city_id":"1","profile_pic":null,"about_you":null,"link_facebook":null,"link":null,"active":"0","created_at":"2017-09-11 13:04:06","updated_at":"2017-09-12 09:45:01"},"ownerName":"nada nada"}', NULL, '2017-10-02 07:16:44', '2017-10-02 07:16:44'),
('315a90ad-cef5-44cf-9144-25b310868b69', 'App\\Notifications\\CommentOnProject', 10, 'App\\User', '{"comment":{"body":"GOOD","idea_project_id":"4","user_id":17,"updated_at":"2017-09-11 12:07:21","created_at":"2017-09-11 12:07:21","id":44},"userThatNoty":{"id":10,"token":"EAAUJZC5AL4ukBAF2a4iKnBR6PonYbOOoztxnpKcSt6YbjJgXqfCgAxBu9hX7OjQSN0lVR1mf6hZCUZAzVp2uUbFrCFmuDgZCEdpQMvZCHgqAKSfGjtxvwdhTlZCzNpizHyntQKjibMVRKWOUTa8dgH7wHRF7uMebhLuV0ozwxO7AZDZD","first_name":"\\u0646\\u062f\\u0649 \\u0622\\u0644 \\u0631\\u0627\\u062c\\u062d4567","last_name":"\\u0646\\u062f\\u0649 \\u0622\\u0644 \\u0631\\u0627\\u062c\\u062d","facebook_id":"1908586032713629","twitter_id":null,"phone_number":"11449253","email":"nadanada@gmail.com","city_id":"1","profile_pic":null,"about_you":"","link_facebook":"","link":"","active":"0","created_at":"2017-08-14 08:19:12","updated_at":"2017-08-20 11:34:01"},"project":{"id":4,"address":"\\u0645\\u062d\\u0644\\u0627\\u062a \\u0644\\u0644\\u0623\\u0633\\u0631 \\u0627\\u0644\\u0645\\u0646\\u062a\\u062c\\u0629","idea":"\\u0635\\u064f\\u0645\\u0645 \\u0627\\u0644\\u0628\\u0631\\u0646\\u0627\\u0645\\u062c \\u0644\\u062f\\u0639\\u0645 \\u0627\\u0644\\u0623\\u0633\\u0631 \\u0627\\u0644\\u0645\\u0646\\u062a\\u062c\\u0629\\u060c \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0623\\u062e\\u0635 \\u0627\\u0644\\u0633\\u064a\\u062f\\u0627\\u062a\\u060c \\u0627\\u0644\\u0644\\u0627\\u062a\\u064a \\u062a\\u0641\\u0636\\u0644\\u0646 \\u0627\\u0644\\u0639\\u0645\\u0644 \\u0645\\u0646 \\u0627\\u0644\\u0645\\u0646\\u0632\\u0644 \\u0641\\u064a \\u0645\\u0634\\u0631\\u0648\\u0639\\u0627\\u062a \\u0645\\u062a\\u0646\\u0627\\u0647\\u064a\\u0629 \\u0627\\u0644\\u0635\\u063a\\u0631\\u060c \\u0648\\u064a\\u062a\\u0636\\u0645\\u0646 \\u062a\\u0642\\u062f\\u064a\\u0645 \\u0627\\u0644\\u062f\\u0639\\u0645 \\u0627\\u0644\\u0645\\u0627\\u0644\\u064a \\u0648\\u0627\\u0644\\u0641\\u0646\\u064a \\u0648\\u0627\\u0644\\u0625\\u062f\\u0627\\u0631\\u064a \\u0648\\u0627\\u0644\\u062a\\u0633\\u0648\\u064a\\u0642\\u064a \\u0644\\u0645\\u0633\\u0627\\u0639\\u062f\\u0629 \\u0647\\u0624\\u0644\\u0627\\u0621 \\u0627\\u0644\\u0633\\u064a\\u062f\\u0627\\u062a \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0625\\u0646\\u062a\\u0627\\u062c \\u0648\\u0628\\u064a\\u0639 \\u062a\\u0644\\u0643 \\u0627\\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a. \\u0643\\u0645\\u0627 \\u0646\\u0647\\u062a\\u0645 \\u0623\\u064a\\u0636\\u0627\\u064b \\u0628\\u062a\\u064a\\u0633\\u064a\\u0631 \\u0627\\u0644\\u0623\\u0646\\u0634\\u0637\\u0629 \\u0627\\u0644\\u062a\\u0633\\u0648\\u064a\\u0642\\u064a\\u0629\\u060c \\u0648\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0641\\u064a \\u0627\\u0644\\u0623\\u0633\\u0648\\u0627\\u0642 \\u0648\\u0627\\u0644\\u0645\\u0639\\u0627\\u0631\\u0636 \\u0648\\u0641\\u064a \\u0627\\u0644\\u0641\\u0639\\u0627\\u0644\\u064a\\u0627\\u062a \\u0627\\u0644\\u062a\\u062c\\u0627\\u0631\\u064a\\u0629\\u060c \\u0623\\u0648 \\u0627\\u0644\\u062a\\u0631\\u0648\\u064a\\u062c \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0627\\u0644\\u0645\\u0633\\u062a\\u0641\\u064a\\u062f\\u064a\\u0646 \\u0645\\u0646 \\u062e\\u0644\\u0627\\u0644 \\u0645\\u0648\\u0627\\u0642\\u0639 \\u0627\\u0644\\u062a\\u0648\\u0627\\u0635\\u0644 \\u0627\\u0644\\u0627\\u062c\\u062a\\u0645\\u0627\\u0639\\u064a. ","budget":"1000","link":"","basic_image":"2017-08-17-13:38:58-192335341","additional_photos":"additional_photos\\/2017-08-17-09:22:31-foodfestival-gallery-1-1024x683.jpg","video":null,"youtube_link":"","views":"185","expected_date":"2017-12-23 00:00:00","city_id":"1","category_id":"1","user_id":"10","created_at":"2017-08-14 09:01:22","updated_at":"2017-09-11 12:07:14"},"ownerName":"nada rageh","ownerImg":null}', NULL, '2017-09-11 10:07:21', '2017-09-11 10:07:21'),
('53448328-1f1a-4a31-9a40-671f6a3a5b90', 'App\\Notifications\\SiteSupport', 10, 'App\\User', '{"support":{"amount_of_contribution":"6543","full_name":"nadarageh","email":"nadanada@gmail.com","active":1,"idea_project_id":"4","updated_at":"2017-08-14 11:06:25","created_at":"2017-08-14 11:06:25","id":6,"project":{"id":4,"address":"jkhgfd","idea":"http:\\/\\/localhost","budget":"456754","link":"http:\\/\\/localhost","basic_image":"2017-08-14-09:01:22-2085945320","additional_photos":null,"video":null,"views":"15","expected_date":"2017-12-23 00:00:00","city_id":"1","category_id":"10","user_id":"10","created_at":"2017-08-14 09:01:22","updated_at":"2017-08-14 11:06:06"}},"project":{"id":4,"address":"jkhgfd","idea":"http:\\/\\/localhost","budget":"456754","link":"http:\\/\\/localhost","basic_image":"2017-08-14-09:01:22-2085945320","additional_photos":null,"video":null,"views":"15","expected_date":"2017-12-23 00:00:00","city_id":"1","category_id":"10","user_id":"10","created_at":"2017-08-14 09:01:22","updated_at":"2017-08-14 11:06:06"},"userThatNotify":{"id":10,"token":"EAAUJZC5AL4ukBAF2a4iKnBR6PonYbOOoztxnpKcSt6YbjJgXqfCgAxBu9hX7OjQSN0lVR1mf6hZCUZAzVp2uUbFrCFmuDgZCEdpQMvZCHgqAKSfGjtxvwdhTlZCzNpizHyntQKjibMVRKWOUTa8dgH7wHRF7uMebhLuV0ozwxO7AZDZD","first_name":"\\u0646\\u062f\\u0649 \\u0622\\u0644 \\u0631\\u0627\\u062c\\u062d","last_name":"\\u0646\\u062f\\u0649 \\u0622\\u0644 \\u0631\\u0627\\u062c\\u062d","facebook_id":"1908586032713629","twitter_id":null,"phone_number":null,"email":null,"city_id":null,"profile_pic":null,"about_you":null,"link_facebook":null,"link":null,"active":"0","created_at":"2017-08-14 08:19:12","updated_at":"2017-08-14 10:15:37"},"ownerName":"nadarageh"}', NULL, '2017-08-14 09:06:25', '2017-08-14 09:06:25'),
('73a120b3-f879-4c71-9156-f62a61fc1c44', 'App\\Notifications\\FavoriteOnProject', 19, 'App\\User', '{"userThatNoty":{"id":19,"token":"2y102Q1InJmSkZaVXaQGJwEieQmlS7xNBSd8afshCnNaYrG2APenY","first_name":"nada","last_name":"rageh","facebook_id":null,"twitter_id":null,"phone_number":"1144025341","email":"nada@gmail.com","city_id":"1","profile_pic":null,"about_you":null,"link_facebook":null,"link":null,"active":"0","created_at":"2017-09-11 13:04:06","updated_at":"2017-09-12 09:45:01"},"project":{"idea_project_id":"16","user_id":17,"updated_at":"2017-09-20 12:57:07","created_at":"2017-09-20 12:57:07","id":2,"user":{"id":17,"token":"2y10zomTFILyudiGXxCWqdYWndJxx63JcNNKni6UCGNWXFr1VJ6lpEcq","first_name":"nada","last_name":"rageh","facebook_id":null,"twitter_id":null,"phone_number":"1144025341","email":"nadarageh66@gmail.com","city_id":"1","profile_pic":null,"about_you":null,"link_facebook":null,"link":null,"active":"1","created_at":"2017-08-14 08:59:35","updated_at":"2017-09-12 09:46:52"}},"ownerName":"nada rageh","ownerImg":null}', NULL, '2017-09-20 10:57:07', '2017-09-20 10:57:07'),
('b3a3eca0-ea06-44ef-a44b-5e4260bf4d06', 'App\\Notifications\\SiteComment', 16, 'App\\User', '{"comment":{"body":"good","idea_project_id":"4","user_id":16,"updated_at":"2017-08-14 09:18:46","created_at":"2017-08-14 09:18:46","id":38,"project":{"id":4,"address":"jkhgfd","idea":"http:\\/\\/localhost","budget":"456754","link":"http:\\/\\/localhost","basic_image":"2017-08-14-09:01:22-2085945320","additional_photos":null,"video":null,"views":"7","expected_date":"2017-12-23 00:00:00","city_id":"1","category_id":"10","user_id":"10","created_at":"2017-08-14 09:01:22","updated_at":"2017-08-14 09:18:30"},"user":{"id":16,"token":"885921964740816897-v3Y06VSD5q2u6Br9zA9Pb9BOAEokgxN","first_name":"nadarageh","last_name":"nadarageh","facebook_id":null,"twitter_id":"885921964740816897","phone_number":null,"email":null,"city_id":null,"profile_pic":null,"about_you":null,"link_facebook":null,"link":null,"active":"1","created_at":"2017-08-14 08:50:40","updated_at":"2017-08-14 09:04:04"}},"project":{"id":4,"address":"jkhgfd","idea":"http:\\/\\/localhost","budget":"456754","link":"http:\\/\\/localhost","basic_image":"2017-08-14-09:01:22-2085945320","additional_photos":null,"video":null,"views":"7","expected_date":"2017-12-23 00:00:00","city_id":"1","category_id":"10","user_id":"10","created_at":"2017-08-14 09:01:22","updated_at":"2017-08-14 09:18:30"},"userThatNotify":{"id":16,"token":"885921964740816897-v3Y06VSD5q2u6Br9zA9Pb9BOAEokgxN","first_name":"nadarageh","last_name":"nadarageh","facebook_id":null,"twitter_id":"885921964740816897","phone_number":null,"email":null,"city_id":null,"profile_pic":null,"about_you":null,"link_facebook":null,"link":null,"active":"1","created_at":"2017-08-14 08:50:40","updated_at":"2017-08-14 09:04:04"},"ownerName":"nadaragehnadarageh"}', NULL, '2017-08-14 07:18:46', '2017-08-14 07:18:46'),
('bafb7369-5d94-4f10-8e3b-4f69263ced2a', 'App\\Notifications\\SiteSupport', 19, 'App\\User', '{"support":{"amount_of_contribution":"234","full_name":"nada","email":"nadarageh66@gmail.com","known":1,"idea_project_id":"15","updated_at":"2017-09-12 09:22:48","created_at":"2017-09-12 09:22:48","id":16,"project":{"id":15,"address":"  var_dump($reques","idea":"sdfghj","budget":"1344","link":"  var_dump($request->additional_photos);","basic_image":"2017-09-12-09:09:51-939750814","additional_photos":null,"video":null,"youtube_link":"","views":"4","expected_date":"2017-09-15 00:00:00","city_id":"1","category_id":"2","user_id":"19","created_at":"2017-09-12 09:09:51","updated_at":"2017-09-12 09:17:34"}},"project":{"id":15,"address":"  var_dump($reques","idea":"sdfghj","budget":"1344","link":"  var_dump($request->additional_photos);","basic_image":"2017-09-12-09:09:51-939750814","additional_photos":null,"video":null,"youtube_link":"","views":"4","expected_date":"2017-09-15 00:00:00","city_id":"1","category_id":"2","user_id":"19","created_at":"2017-09-12 09:09:51","updated_at":"2017-09-12 09:17:34"},"userThatNotify":{"id":19,"token":"2y102Q1InJmSkZaVXaQGJwEieQmlS7xNBSd8afshCnNaYrG2APenY","first_name":"nada","last_name":"rageh","facebook_id":null,"twitter_id":null,"phone_number":"1144025341","email":"nada@gmail.com","city_id":"1","profile_pic":null,"about_you":null,"link_facebook":null,"link":null,"active":"1","created_at":"2017-09-11 13:04:06","updated_at":"2017-09-11 13:04:06"},"ownerName":"nada"}', NULL, '2017-09-12 07:22:48', '2017-09-12 07:22:48'),
('bbfc0e3c-ef3d-4dfa-8ced-1b539ab4af55', 'App\\Notifications\\SiteComment', 16, 'App\\User', '{"comment":{"body":",mzxl,m,m","idea_project_id":"4","user_id":16,"updated_at":"2017-08-14 10:16:56","created_at":"2017-08-14 10:16:56","id":40,"project":{"id":4,"address":"jkhgfd","idea":"http:\\/\\/localhost","budget":"456754","link":"http:\\/\\/localhost","basic_image":"2017-08-14-09:01:22-2085945320","additional_photos":null,"video":null,"views":"12","expected_date":"2017-12-23 00:00:00","city_id":"1","category_id":"10","user_id":"10","created_at":"2017-08-14 09:01:22","updated_at":"2017-08-14 10:16:48"},"user":{"id":16,"token":"885921964740816897-v3Y06VSD5q2u6Br9zA9Pb9BOAEokgxN","first_name":"nadarageh","last_name":"nadarageh","facebook_id":null,"twitter_id":"885921964740816897","phone_number":null,"email":null,"city_id":null,"profile_pic":null,"about_you":null,"link_facebook":null,"link":null,"active":"1","created_at":"2017-08-14 08:50:40","updated_at":"2017-08-14 10:15:44"}},"project":{"id":4,"address":"jkhgfd","idea":"http:\\/\\/localhost","budget":"456754","link":"http:\\/\\/localhost","basic_image":"2017-08-14-09:01:22-2085945320","additional_photos":null,"video":null,"views":"12","expected_date":"2017-12-23 00:00:00","city_id":"1","category_id":"10","user_id":"10","created_at":"2017-08-14 09:01:22","updated_at":"2017-08-14 10:16:48"},"userThatNotify":{"id":16,"token":"885921964740816897-v3Y06VSD5q2u6Br9zA9Pb9BOAEokgxN","first_name":"nadarageh","last_name":"nadarageh","facebook_id":null,"twitter_id":"885921964740816897","phone_number":null,"email":null,"city_id":null,"profile_pic":null,"about_you":null,"link_facebook":null,"link":null,"active":"1","created_at":"2017-08-14 08:50:40","updated_at":"2017-08-14 10:15:44"},"ownerName":"nadaragehnadarageh"}', NULL, '2017-08-14 08:16:56', '2017-08-14 08:16:56'),
('c7b5f48c-b903-4f35-b162-2be73b92cab9', 'App\\Notifications\\SiteComment', 10, 'App\\User', '{"comment":{"body":"Awesome","idea_project_id":"4","user_id":17,"updated_at":"2017-08-21 15:32:06","created_at":"2017-08-21 15:32:06","id":42,"project":{"id":4,"address":"\\u0645\\u062d\\u0644\\u0627\\u062a \\u0644\\u0644\\u0623\\u0633\\u0631 \\u0627\\u0644\\u0645\\u0646\\u062a\\u062c\\u0629","idea":"\\u0635\\u064f\\u0645\\u0645 \\u0627\\u0644\\u0628\\u0631\\u0646\\u0627\\u0645\\u062c \\u0644\\u062f\\u0639\\u0645 \\u0627\\u0644\\u0623\\u0633\\u0631 \\u0627\\u0644\\u0645\\u0646\\u062a\\u062c\\u0629\\u060c \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0623\\u062e\\u0635 \\u0627\\u0644\\u0633\\u064a\\u062f\\u0627\\u062a\\u060c \\u0627\\u0644\\u0644\\u0627\\u062a\\u064a \\u062a\\u0641\\u0636\\u0644\\u0646 \\u0627\\u0644\\u0639\\u0645\\u0644 \\u0645\\u0646 \\u0627\\u0644\\u0645\\u0646\\u0632\\u0644 \\u0641\\u064a \\u0645\\u0634\\u0631\\u0648\\u0639\\u0627\\u062a \\u0645\\u062a\\u0646\\u0627\\u0647\\u064a\\u0629 \\u0627\\u0644\\u0635\\u063a\\u0631\\u060c \\u0648\\u064a\\u062a\\u0636\\u0645\\u0646 \\u062a\\u0642\\u062f\\u064a\\u0645 \\u0627\\u0644\\u062f\\u0639\\u0645 \\u0627\\u0644\\u0645\\u0627\\u0644\\u064a \\u0648\\u0627\\u0644\\u0641\\u0646\\u064a \\u0648\\u0627\\u0644\\u0625\\u062f\\u0627\\u0631\\u064a \\u0648\\u0627\\u0644\\u062a\\u0633\\u0648\\u064a\\u0642\\u064a \\u0644\\u0645\\u0633\\u0627\\u0639\\u062f\\u0629 \\u0647\\u0624\\u0644\\u0627\\u0621 \\u0627\\u0644\\u0633\\u064a\\u062f\\u0627\\u062a \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0625\\u0646\\u062a\\u0627\\u062c \\u0648\\u0628\\u064a\\u0639 \\u062a\\u0644\\u0643 \\u0627\\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a. \\u0643\\u0645\\u0627 \\u0646\\u0647\\u062a\\u0645 \\u0623\\u064a\\u0636\\u0627\\u064b \\u0628\\u062a\\u064a\\u0633\\u064a\\u0631 \\u0627\\u0644\\u0623\\u0646\\u0634\\u0637\\u0629 \\u0627\\u0644\\u062a\\u0633\\u0648\\u064a\\u0642\\u064a\\u0629\\u060c \\u0648\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0641\\u064a \\u0627\\u0644\\u0623\\u0633\\u0648\\u0627\\u0642 \\u0648\\u0627\\u0644\\u0645\\u0639\\u0627\\u0631\\u0636 \\u0648\\u0641\\u064a \\u0627\\u0644\\u0641\\u0639\\u0627\\u0644\\u064a\\u0627\\u062a \\u0627\\u0644\\u062a\\u062c\\u0627\\u0631\\u064a\\u0629\\u060c \\u0623\\u0648 \\u0627\\u0644\\u062a\\u0631\\u0648\\u064a\\u062c \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0627\\u0644\\u0645\\u0633\\u062a\\u0641\\u064a\\u062f\\u064a\\u0646 \\u0645\\u0646 \\u062e\\u0644\\u0627\\u0644 \\u0645\\u0648\\u0627\\u0642\\u0639 \\u0627\\u0644\\u062a\\u0648\\u0627\\u0635\\u0644 \\u0627\\u0644\\u0627\\u062c\\u062a\\u0645\\u0627\\u0639\\u064a. ","budget":"1000","link":"","basic_image":"2017-08-17-13:38:58-192335341","additional_photos":"additional_photos\\/2017-08-17-09:22:31-foodfestival-gallery-1-1024x683.jpg","video":null,"views":171,"expected_date":"2017-12-23 00:00:00","city_id":1,"category_id":1,"user_id":10,"created_at":"2017-08-14 09:01:22","updated_at":"2017-08-21 15:31:12"},"user":{"id":17,"token":"2y10zomTFILyudiGXxCWqdYWndJxx63JcNNKni6UCGNWXFr1VJ6lpEcq","first_name":"nada","last_name":"rageh","facebook_id":null,"twitter_id":null,"phone_number":1144025341,"email":"nadarageh66@gmail.com","city_id":1,"profile_pic":null,"about_you":null,"link_facebook":null,"link":null,"active":"0","created_at":"2017-08-14 08:59:35","updated_at":"2017-08-21 14:20:04"}},"project":{"id":4,"address":"\\u0645\\u062d\\u0644\\u0627\\u062a \\u0644\\u0644\\u0623\\u0633\\u0631 \\u0627\\u0644\\u0645\\u0646\\u062a\\u062c\\u0629","idea":"\\u0635\\u064f\\u0645\\u0645 \\u0627\\u0644\\u0628\\u0631\\u0646\\u0627\\u0645\\u062c \\u0644\\u062f\\u0639\\u0645 \\u0627\\u0644\\u0623\\u0633\\u0631 \\u0627\\u0644\\u0645\\u0646\\u062a\\u062c\\u0629\\u060c \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0623\\u062e\\u0635 \\u0627\\u0644\\u0633\\u064a\\u062f\\u0627\\u062a\\u060c \\u0627\\u0644\\u0644\\u0627\\u062a\\u064a \\u062a\\u0641\\u0636\\u0644\\u0646 \\u0627\\u0644\\u0639\\u0645\\u0644 \\u0645\\u0646 \\u0627\\u0644\\u0645\\u0646\\u0632\\u0644 \\u0641\\u064a \\u0645\\u0634\\u0631\\u0648\\u0639\\u0627\\u062a \\u0645\\u062a\\u0646\\u0627\\u0647\\u064a\\u0629 \\u0627\\u0644\\u0635\\u063a\\u0631\\u060c \\u0648\\u064a\\u062a\\u0636\\u0645\\u0646 \\u062a\\u0642\\u062f\\u064a\\u0645 \\u0627\\u0644\\u062f\\u0639\\u0645 \\u0627\\u0644\\u0645\\u0627\\u0644\\u064a \\u0648\\u0627\\u0644\\u0641\\u0646\\u064a \\u0648\\u0627\\u0644\\u0625\\u062f\\u0627\\u0631\\u064a \\u0648\\u0627\\u0644\\u062a\\u0633\\u0648\\u064a\\u0642\\u064a \\u0644\\u0645\\u0633\\u0627\\u0639\\u062f\\u0629 \\u0647\\u0624\\u0644\\u0627\\u0621 \\u0627\\u0644\\u0633\\u064a\\u062f\\u0627\\u062a \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0625\\u0646\\u062a\\u0627\\u062c \\u0648\\u0628\\u064a\\u0639 \\u062a\\u0644\\u0643 \\u0627\\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a. \\u0643\\u0645\\u0627 \\u0646\\u0647\\u062a\\u0645 \\u0623\\u064a\\u0636\\u0627\\u064b \\u0628\\u062a\\u064a\\u0633\\u064a\\u0631 \\u0627\\u0644\\u0623\\u0646\\u0634\\u0637\\u0629 \\u0627\\u0644\\u062a\\u0633\\u0648\\u064a\\u0642\\u064a\\u0629\\u060c \\u0648\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0641\\u064a \\u0627\\u0644\\u0623\\u0633\\u0648\\u0627\\u0642 \\u0648\\u0627\\u0644\\u0645\\u0639\\u0627\\u0631\\u0636 \\u0648\\u0641\\u064a \\u0627\\u0644\\u0641\\u0639\\u0627\\u0644\\u064a\\u0627\\u062a \\u0627\\u0644\\u062a\\u062c\\u0627\\u0631\\u064a\\u0629\\u060c \\u0623\\u0648 \\u0627\\u0644\\u062a\\u0631\\u0648\\u064a\\u062c \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0627\\u0644\\u0645\\u0633\\u062a\\u0641\\u064a\\u062f\\u064a\\u0646 \\u0645\\u0646 \\u062e\\u0644\\u0627\\u0644 \\u0645\\u0648\\u0627\\u0642\\u0639 \\u0627\\u0644\\u062a\\u0648\\u0627\\u0635\\u0644 \\u0627\\u0644\\u0627\\u062c\\u062a\\u0645\\u0627\\u0639\\u064a. ","budget":"1000","link":"","basic_image":"2017-08-17-13:38:58-192335341","additional_photos":"additional_photos\\/2017-08-17-09:22:31-foodfestival-gallery-1-1024x683.jpg","video":null,"views":171,"expected_date":"2017-12-23 00:00:00","city_id":1,"category_id":1,"user_id":10,"created_at":"2017-08-14 09:01:22","updated_at":"2017-08-21 15:31:12"},"userThatNotify":{"id":10,"token":"EAAUJZC5AL4ukBAF2a4iKnBR6PonYbOOoztxnpKcSt6YbjJgXqfCgAxBu9hX7OjQSN0lVR1mf6hZCUZAzVp2uUbFrCFmuDgZCEdpQMvZCHgqAKSfGjtxvwdhTlZCzNpizHyntQKjibMVRKWOUTa8dgH7wHRF7uMebhLuV0ozwxO7AZDZD","first_name":"\\u0646\\u062f\\u0649 \\u0622\\u0644 \\u0631\\u0627\\u062c\\u062d4567","last_name":"\\u0646\\u062f\\u0649 \\u0622\\u0644 \\u0631\\u0627\\u062c\\u062d","facebook_id":"1908586032713629","twitter_id":null,"phone_number":11449253,"email":"nadanada@gmail.com","city_id":1,"profile_pic":null,"about_you":"","link_facebook":"","link":"","active":"0","created_at":"2017-08-14 08:19:12","updated_at":"2017-08-20 11:34:01"},"ownerName":"nadarageh"}', NULL, '2017-08-21 13:32:07', '2017-08-21 13:32:07'),
('cb24ddac-c948-4a49-afb4-131e00e097ac', 'App\\Notifications\\CommentOnProject', 10, 'App\\User', '{"comment":{"body":"GOOD","idea_project_id":"4","user_id":17,"updated_at":"2017-09-11 12:07:48","created_at":"2017-09-11 12:07:48","id":46},"userThatNoty":{"id":10,"token":"EAAUJZC5AL4ukBAF2a4iKnBR6PonYbOOoztxnpKcSt6YbjJgXqfCgAxBu9hX7OjQSN0lVR1mf6hZCUZAzVp2uUbFrCFmuDgZCEdpQMvZCHgqAKSfGjtxvwdhTlZCzNpizHyntQKjibMVRKWOUTa8dgH7wHRF7uMebhLuV0ozwxO7AZDZD","first_name":"\\u0646\\u062f\\u0649 \\u0622\\u0644 \\u0631\\u0627\\u062c\\u062d4567","last_name":"\\u0646\\u062f\\u0649 \\u0622\\u0644 \\u0631\\u0627\\u062c\\u062d","facebook_id":"1908586032713629","twitter_id":null,"phone_number":"11449253","email":"nadanada@gmail.com","city_id":"1","profile_pic":null,"about_you":"","link_facebook":"","link":"","active":"0","created_at":"2017-08-14 08:19:12","updated_at":"2017-08-20 11:34:01"},"project":{"id":4,"address":"\\u0645\\u062d\\u0644\\u0627\\u062a \\u0644\\u0644\\u0623\\u0633\\u0631 \\u0627\\u0644\\u0645\\u0646\\u062a\\u062c\\u0629","idea":"\\u0635\\u064f\\u0645\\u0645 \\u0627\\u0644\\u0628\\u0631\\u0646\\u0627\\u0645\\u062c \\u0644\\u062f\\u0639\\u0645 \\u0627\\u0644\\u0623\\u0633\\u0631 \\u0627\\u0644\\u0645\\u0646\\u062a\\u062c\\u0629\\u060c \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0623\\u062e\\u0635 \\u0627\\u0644\\u0633\\u064a\\u062f\\u0627\\u062a\\u060c \\u0627\\u0644\\u0644\\u0627\\u062a\\u064a \\u062a\\u0641\\u0636\\u0644\\u0646 \\u0627\\u0644\\u0639\\u0645\\u0644 \\u0645\\u0646 \\u0627\\u0644\\u0645\\u0646\\u0632\\u0644 \\u0641\\u064a \\u0645\\u0634\\u0631\\u0648\\u0639\\u0627\\u062a \\u0645\\u062a\\u0646\\u0627\\u0647\\u064a\\u0629 \\u0627\\u0644\\u0635\\u063a\\u0631\\u060c \\u0648\\u064a\\u062a\\u0636\\u0645\\u0646 \\u062a\\u0642\\u062f\\u064a\\u0645 \\u0627\\u0644\\u062f\\u0639\\u0645 \\u0627\\u0644\\u0645\\u0627\\u0644\\u064a \\u0648\\u0627\\u0644\\u0641\\u0646\\u064a \\u0648\\u0627\\u0644\\u0625\\u062f\\u0627\\u0631\\u064a \\u0648\\u0627\\u0644\\u062a\\u0633\\u0648\\u064a\\u0642\\u064a \\u0644\\u0645\\u0633\\u0627\\u0639\\u062f\\u0629 \\u0647\\u0624\\u0644\\u0627\\u0621 \\u0627\\u0644\\u0633\\u064a\\u062f\\u0627\\u062a \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0625\\u0646\\u062a\\u0627\\u062c \\u0648\\u0628\\u064a\\u0639 \\u062a\\u0644\\u0643 \\u0627\\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a. \\u0643\\u0645\\u0627 \\u0646\\u0647\\u062a\\u0645 \\u0623\\u064a\\u0636\\u0627\\u064b \\u0628\\u062a\\u064a\\u0633\\u064a\\u0631 \\u0627\\u0644\\u0623\\u0646\\u0634\\u0637\\u0629 \\u0627\\u0644\\u062a\\u0633\\u0648\\u064a\\u0642\\u064a\\u0629\\u060c \\u0648\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0641\\u064a \\u0627\\u0644\\u0623\\u0633\\u0648\\u0627\\u0642 \\u0648\\u0627\\u0644\\u0645\\u0639\\u0627\\u0631\\u0636 \\u0648\\u0641\\u064a \\u0627\\u0644\\u0641\\u0639\\u0627\\u0644\\u064a\\u0627\\u062a \\u0627\\u0644\\u062a\\u062c\\u0627\\u0631\\u064a\\u0629\\u060c \\u0623\\u0648 \\u0627\\u0644\\u062a\\u0631\\u0648\\u064a\\u062c \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0627\\u0644\\u0645\\u0633\\u062a\\u0641\\u064a\\u062f\\u064a\\u0646 \\u0645\\u0646 \\u062e\\u0644\\u0627\\u0644 \\u0645\\u0648\\u0627\\u0642\\u0639 \\u0627\\u0644\\u062a\\u0648\\u0627\\u0635\\u0644 \\u0627\\u0644\\u0627\\u062c\\u062a\\u0645\\u0627\\u0639\\u064a. ","budget":"1000","link":"","basic_image":"2017-08-17-13:38:58-192335341","additional_photos":"additional_photos\\/2017-08-17-09:22:31-foodfestival-gallery-1-1024x683.jpg","video":null,"youtube_link":"","views":"187","expected_date":"2017-12-23 00:00:00","city_id":"1","category_id":"1","user_id":"10","created_at":"2017-08-14 09:01:22","updated_at":"2017-09-11 12:07:22"},"ownerName":"nada rageh","ownerImg":null}', NULL, '2017-09-11 10:07:48', '2017-09-11 10:07:48'),
('f0ae3d0f-2583-4148-ab83-73fa04216df5', 'App\\Notifications\\SiteComment', 16, 'App\\User', '{"comment":{"body":"nbvvcfvhjkjhg","idea_project_id":"4","user_id":16,"updated_at":"2017-08-14 09:18:30","created_at":"2017-08-14 09:18:30","id":37,"project":{"id":4,"address":"jkhgfd","idea":"http:\\/\\/localhost","budget":"456754","link":"http:\\/\\/localhost","basic_image":"2017-08-14-09:01:22-2085945320","additional_photos":null,"video":null,"views":"6","expected_date":"2017-12-23 00:00:00","city_id":"1","category_id":"10","user_id":"10","created_at":"2017-08-14 09:01:22","updated_at":"2017-08-14 09:17:18"},"user":{"id":16,"token":"885921964740816897-v3Y06VSD5q2u6Br9zA9Pb9BOAEokgxN","first_name":"nadarageh","last_name":"nadarageh","facebook_id":null,"twitter_id":"885921964740816897","phone_number":null,"email":null,"city_id":null,"profile_pic":null,"about_you":null,"link_facebook":null,"link":null,"active":"1","created_at":"2017-08-14 08:50:40","updated_at":"2017-08-14 09:04:04"}},"project":{"id":4,"address":"jkhgfd","idea":"http:\\/\\/localhost","budget":"456754","link":"http:\\/\\/localhost","basic_image":"2017-08-14-09:01:22-2085945320","additional_photos":null,"video":null,"views":"6","expected_date":"2017-12-23 00:00:00","city_id":"1","category_id":"10","user_id":"10","created_at":"2017-08-14 09:01:22","updated_at":"2017-08-14 09:17:18"},"userThatNotify":{"id":16,"token":"885921964740816897-v3Y06VSD5q2u6Br9zA9Pb9BOAEokgxN","first_name":"nadarageh","last_name":"nadarageh","facebook_id":null,"twitter_id":"885921964740816897","phone_number":null,"email":null,"city_id":null,"profile_pic":null,"about_you":null,"link_facebook":null,"link":null,"active":"1","created_at":"2017-08-14 08:50:40","updated_at":"2017-08-14 09:04:04"},"ownerName":"nadaragehnadarageh"}', NULL, '2017-08-14 07:18:30', '2017-08-14 07:18:30'),
('f0d0efa3-3c3e-4c50-887c-28b560cc4fa9', 'App\\Notifications\\SiteComment', 10, 'App\\User', '{"comment":{"body":"kjhgfdsfghj","idea_project_id":"4","user_id":16,"updated_at":"2017-08-14 11:12:41","created_at":"2017-08-14 11:12:41","id":41,"project":{"id":4,"address":"jkhgfd","idea":"http:\\/\\/localhost","budget":"456754","link":"http:\\/\\/localhost","basic_image":"2017-08-14-09:01:22-2085945320","additional_photos":null,"video":null,"views":"16","expected_date":"2017-12-23 00:00:00","city_id":"1","category_id":"10","user_id":"10","created_at":"2017-08-14 09:01:22","updated_at":"2017-08-14 11:12:29"},"user":{"id":16,"token":"885921964740816897-v3Y06VSD5q2u6Br9zA9Pb9BOAEokgxN","first_name":"nadarageh","last_name":"nadarageh","facebook_id":null,"twitter_id":"885921964740816897","phone_number":null,"email":null,"city_id":null,"profile_pic":null,"about_you":null,"link_facebook":null,"link":null,"active":"1","created_at":"2017-08-14 08:50:40","updated_at":"2017-08-14 11:12:14"}},"project":{"id":4,"address":"jkhgfd","idea":"http:\\/\\/localhost","budget":"456754","link":"http:\\/\\/localhost","basic_image":"2017-08-14-09:01:22-2085945320","additional_photos":null,"video":null,"views":"16","expected_date":"2017-12-23 00:00:00","city_id":"1","category_id":"10","user_id":"10","created_at":"2017-08-14 09:01:22","updated_at":"2017-08-14 11:12:29"},"userThatNotify":{"id":10,"token":"EAAUJZC5AL4ukBAF2a4iKnBR6PonYbOOoztxnpKcSt6YbjJgXqfCgAxBu9hX7OjQSN0lVR1mf6hZCUZAzVp2uUbFrCFmuDgZCEdpQMvZCHgqAKSfGjtxvwdhTlZCzNpizHyntQKjibMVRKWOUTa8dgH7wHRF7uMebhLuV0ozwxO7AZDZD","first_name":"\\u0646\\u062f\\u0649 \\u0622\\u0644 \\u0631\\u0627\\u062c\\u062d","last_name":"\\u0646\\u062f\\u0649 \\u0622\\u0644 \\u0631\\u0627\\u062c\\u062d","facebook_id":"1908586032713629","twitter_id":null,"phone_number":null,"email":null,"city_id":null,"profile_pic":null,"about_you":null,"link_facebook":null,"link":null,"active":"0","created_at":"2017-08-14 08:19:12","updated_at":"2017-08-14 11:12:06"},"ownerName":"nadaragehnadarageh"}', NULL, '2017-08-14 09:12:41', '2017-08-14 09:12:41'),
('f54dd881-e415-463f-b739-2746ece85913', 'App\\Notifications\\CommentOnProject', 10, 'App\\User', '{"comment":{"body":"GOOD","idea_project_id":"4","user_id":17,"updated_at":"2017-09-11 12:07:21","created_at":"2017-09-11 12:07:21","id":45},"userThatNoty":{"id":10,"token":"EAAUJZC5AL4ukBAF2a4iKnBR6PonYbOOoztxnpKcSt6YbjJgXqfCgAxBu9hX7OjQSN0lVR1mf6hZCUZAzVp2uUbFrCFmuDgZCEdpQMvZCHgqAKSfGjtxvwdhTlZCzNpizHyntQKjibMVRKWOUTa8dgH7wHRF7uMebhLuV0ozwxO7AZDZD","first_name":"\\u0646\\u062f\\u0649 \\u0622\\u0644 \\u0631\\u0627\\u062c\\u062d4567","last_name":"\\u0646\\u062f\\u0649 \\u0622\\u0644 \\u0631\\u0627\\u062c\\u062d","facebook_id":"1908586032713629","twitter_id":null,"phone_number":"11449253","email":"nadanada@gmail.com","city_id":"1","profile_pic":null,"about_you":"","link_facebook":"","link":"","active":"0","created_at":"2017-08-14 08:19:12","updated_at":"2017-08-20 11:34:01"},"project":{"id":4,"address":"\\u0645\\u062d\\u0644\\u0627\\u062a \\u0644\\u0644\\u0623\\u0633\\u0631 \\u0627\\u0644\\u0645\\u0646\\u062a\\u062c\\u0629","idea":"\\u0635\\u064f\\u0645\\u0645 \\u0627\\u0644\\u0628\\u0631\\u0646\\u0627\\u0645\\u062c \\u0644\\u062f\\u0639\\u0645 \\u0627\\u0644\\u0623\\u0633\\u0631 \\u0627\\u0644\\u0645\\u0646\\u062a\\u062c\\u0629\\u060c \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0623\\u062e\\u0635 \\u0627\\u0644\\u0633\\u064a\\u062f\\u0627\\u062a\\u060c \\u0627\\u0644\\u0644\\u0627\\u062a\\u064a \\u062a\\u0641\\u0636\\u0644\\u0646 \\u0627\\u0644\\u0639\\u0645\\u0644 \\u0645\\u0646 \\u0627\\u0644\\u0645\\u0646\\u0632\\u0644 \\u0641\\u064a \\u0645\\u0634\\u0631\\u0648\\u0639\\u0627\\u062a \\u0645\\u062a\\u0646\\u0627\\u0647\\u064a\\u0629 \\u0627\\u0644\\u0635\\u063a\\u0631\\u060c \\u0648\\u064a\\u062a\\u0636\\u0645\\u0646 \\u062a\\u0642\\u062f\\u064a\\u0645 \\u0627\\u0644\\u062f\\u0639\\u0645 \\u0627\\u0644\\u0645\\u0627\\u0644\\u064a \\u0648\\u0627\\u0644\\u0641\\u0646\\u064a \\u0648\\u0627\\u0644\\u0625\\u062f\\u0627\\u0631\\u064a \\u0648\\u0627\\u0644\\u062a\\u0633\\u0648\\u064a\\u0642\\u064a \\u0644\\u0645\\u0633\\u0627\\u0639\\u062f\\u0629 \\u0647\\u0624\\u0644\\u0627\\u0621 \\u0627\\u0644\\u0633\\u064a\\u062f\\u0627\\u062a \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0625\\u0646\\u062a\\u0627\\u062c \\u0648\\u0628\\u064a\\u0639 \\u062a\\u0644\\u0643 \\u0627\\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a. \\u0643\\u0645\\u0627 \\u0646\\u0647\\u062a\\u0645 \\u0623\\u064a\\u0636\\u0627\\u064b \\u0628\\u062a\\u064a\\u0633\\u064a\\u0631 \\u0627\\u0644\\u0623\\u0646\\u0634\\u0637\\u0629 \\u0627\\u0644\\u062a\\u0633\\u0648\\u064a\\u0642\\u064a\\u0629\\u060c \\u0648\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0641\\u064a \\u0627\\u0644\\u0623\\u0633\\u0648\\u0627\\u0642 \\u0648\\u0627\\u0644\\u0645\\u0639\\u0627\\u0631\\u0636 \\u0648\\u0641\\u064a \\u0627\\u0644\\u0641\\u0639\\u0627\\u0644\\u064a\\u0627\\u062a \\u0627\\u0644\\u062a\\u062c\\u0627\\u0631\\u064a\\u0629\\u060c \\u0623\\u0648 \\u0627\\u0644\\u062a\\u0631\\u0648\\u064a\\u062c \\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0627\\u0644\\u0645\\u0633\\u062a\\u0641\\u064a\\u062f\\u064a\\u0646 \\u0645\\u0646 \\u062e\\u0644\\u0627\\u0644 \\u0645\\u0648\\u0627\\u0642\\u0639 \\u0627\\u0644\\u062a\\u0648\\u0627\\u0635\\u0644 \\u0627\\u0644\\u0627\\u062c\\u062a\\u0645\\u0627\\u0639\\u064a. ","budget":"1000","link":"","basic_image":"2017-08-17-13:38:58-192335341","additional_photos":"additional_photos\\/2017-08-17-09:22:31-foodfestival-gallery-1-1024x683.jpg","video":null,"youtube_link":"","views":"186","expected_date":"2017-12-23 00:00:00","city_id":"1","category_id":"1","user_id":"10","created_at":"2017-08-14 09:01:22","updated_at":"2017-09-11 12:07:21"},"ownerName":"nada rageh","ownerImg":null}', NULL, '2017-09-11 10:07:22', '2017-09-11 10:07:22');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects_updates`
--

CREATE TABLE IF NOT EXISTS `projects_updates` (
`id` int(10) unsigned NOT NULL,
  `project_id` int(10) unsigned NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `projects_updates`
--

INSERT INTO `projects_updates` (`id`, `project_id`, `description`, `img`, `created_at`, `updated_at`) VALUES
(16, 8, 'fghjhkl', NULL, '2017-10-02 07:28:25', '2017-10-02 07:28:40');

-- --------------------------------------------------------

--
-- Table structure for table `recent`
--

CREATE TABLE IF NOT EXISTS `recent` (
`id` int(10) unsigned NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idea_project_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `code_session` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
`id` int(10) unsigned NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `img`, `created_at`, `updated_at`) VALUES
(1, 'tree.png', NULL, NULL),
(2, 'tree.png', NULL, NULL),
(3, 'tree.png', NULL, NULL),
(4, 'tree.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supported`
--

CREATE TABLE IF NOT EXISTS `supported` (
`id` int(10) unsigned NOT NULL,
  `amount_of_contribution` double NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_support` int(11) DEFAULT NULL,
  `idea_project_id` int(10) unsigned NOT NULL,
  `known` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `supported`
--

INSERT INTO `supported` (`id`, `amount_of_contribution`, `full_name`, `email`, `user_id`, `user_support`, `idea_project_id`, `known`, `created_at`, `updated_at`) VALUES
(1, 14, NULL, '', 2, NULL, 1, 0, '2017-07-08 13:08:23', '2017-07-08 13:17:56'),
(3, 35, NULL, '', 1, NULL, 1, 0, '2017-07-08 13:17:38', '2017-07-12 22:00:00'),
(4, 200, NULL, '', 2, NULL, 3, 1, '2017-08-02 06:07:58', '2017-08-02 06:07:58'),
(6, 200, NULL, '', NULL, 4, 3, 1, '2017-08-02 06:39:28', '2017-08-02 06:39:28'),
(7, 200, NULL, '', NULL, 5, 3, 1, '2017-08-02 07:09:16', '2017-08-02 07:09:16'),
(8, 200, NULL, '', NULL, 6, 3, 1, '2017-08-02 07:09:33', '2017-08-02 07:09:33'),
(9, 200, NULL, '', NULL, 7, 3, 1, '2017-08-02 07:10:18', '2017-08-02 07:10:18'),
(10, 504, NULL, '', NULL, 9, 1, 0, '2017-08-02 07:22:45', '2017-08-02 07:22:45'),
(11, 504, NULL, '', NULL, 10, 1, 0, '2017-08-02 07:23:27', '2017-08-02 07:23:27'),
(12, 504, NULL, '', NULL, 13, 1, 0, '2017-08-02 07:23:57', '2017-08-02 07:23:57'),
(13, 6, NULL, '', NULL, 16, 10, 0, '2017-08-02 07:32:41', '2017-08-02 07:32:41'),
(14, 55, NULL, '', NULL, 17, 16, 1, '2017-08-10 13:04:59', '2017-08-10 13:04:59'),
(15, 55, NULL, '', NULL, 18, 17, 1, '2017-08-20 12:16:39', '2017-08-20 12:16:39'),
(16, 234, 'nada', 'nadarageh66@gmail.com', NULL, NULL, 15, 1, '2017-09-12 07:22:48', '2017-09-12 07:22:48'),
(17, 234563456, 'nadarageh', 'nadarageh66@gmail.com', NULL, NULL, 15, 1, '2017-10-02 06:56:11', '2017-10-02 06:56:11'),
(18, 2345645, 'nada nada', 'nadarageh66@gmail.com', NULL, NULL, 8, 1, '2017-10-02 07:16:44', '2017-10-02 07:16:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `facebook_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` double DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city_id` int(10) unsigned DEFAULT NULL,
  `profile_pic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `about_you` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link_facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `token`, `first_name`, `last_name`, `facebook_id`, `twitter_id`, `phone_number`, `email`, `password`, `city_id`, `profile_pic`, `about_you`, `link_facebook`, `link`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(10, 'EAAUJZC5AL4ukBAF2a4iKnBR6PonYbOOoztxnpKcSt6YbjJgXqfCgAxBu9hX7OjQSN0lVR1mf6hZCUZAzVp2uUbFrCFmuDgZCEdpQMvZCHgqAKSfGjtxvwdhTlZCzNpizHyntQKjibMVRKWOUTa8dgH7wHRF7uMebhLuV0ozwxO7AZDZD', 'ندى آل راجح4567', 'ندى آل راجح', '1908586032713629', NULL, 11449253, 'nadanada@gmail.com', NULL, 1, NULL, '', '', '', '0', 'pNvPif1FTQ7GHwYZecErrTOznytdon4HyMWOgG8g4TcMXi8at2glqbVInDFA', '2017-08-14 06:19:12', '2017-08-20 09:34:01'),
(16, '885921964740816897-v3Y06VSD5q2u6Br9zA9Pb9BOAEokgxN', 'nadarageh', 'nadarageh', NULL, '885921964740816897', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'RKVOQdMWdP27b6wg9uzIh5QG8NMJwLjzRBdTpMZKW50k2A3rUfTCOTrRQE3W', '2017-08-14 06:50:40', '2017-08-16 11:38:43'),
(17, '2y10zomTFILyudiGXxCWqdYWndJxx63JcNNKni6UCGNWXFr1VJ6lpEcq', 'nada', 'rageh', NULL, NULL, 1144025341, 'nadarageh66@gmail.com', '$2y$10$3isa5IDWs6eGf9khwm2//uv1tzxJ0j/DAI5G3UgXsABbltljGHyRG', 1, '2017-10-02-09:49:30-1700113834', NULL, NULL, NULL, '1', 'gJniuXpp68Tbr6Zuhx2k1GHDcXj03PK10tbr4vo0fhBAC8hOyDDG96FZM3Jz', '2017-08-14 06:59:35', '2017-10-03 14:13:55'),
(18, 'EAAUJZC5AL4ukBAHCUcKYoBdHsLZB9UP7kLTQAByMhmrkPnMOhA0PAdAjVutCAZB73bezW28dxoNPf2h3cZCRmSEvQWO4qavqFPD7xiEIbdXBd3jDcy1baFQcV5vZCaGK1uauBlvpD1Ka3szCU257SjDXYYTmGMtZCIHrZBZCzVmrc5xwXBaxpZCys', 'Noorhan Al-shennawy', 'Noorhan Al-shennawy', '1443848695694333', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'EVfn3stjiJWSVxmHhoo7omiRd9ZWDzoDZasR1GMSC9SQNm1kmQgdHstKYAG8', '2017-08-20 09:20:59', '2017-08-20 09:21:00'),
(19, '2y102Q1InJmSkZaVXaQGJwEieQmlS7xNBSd8afshCnNaYrG2APenY', 'nada', 'rageh', NULL, NULL, 1144025341, 'nada@gmail.com', '$2y$10$8Vb1Q2AUBTF69fWhe2GkWesG2.fy4zN3WwbAbpTlAQ7K8j28ojr9y', 1, NULL, NULL, NULL, NULL, '0', 'q8MZ3ecJtqSpEaa90sWJo4TYYVbobnGSP1zYNMqv8ZWTwJYlHBct81RecbhW', '2017-09-11 11:04:06', '2017-09-12 07:45:01'),
(20, '2y10vjTkQhIqM2cWYJKcCLlpGy5rK9qvSypaiCoLyIabJHH107jt6', 'nody', 'rageh', NULL, NULL, 1144025341, 'nody@gmail.vom', '$2y$10$k/gNBEQ1w4wH7FUu/gdAyuXGPpcc5RuEHoNSjDfzcwmEeo7R8z.m6', 1, NULL, '', '', '', '0', 'wGHMdpP4BCyPVQxMPQewSoodGLsXGRlxIwmCpKLejwhTaHQ0XwSdA7cT4cLr', '2017-09-12 07:45:38', '2017-09-15 16:45:58'),
(21, '2y10LcVcS8b0RTfNnLJMbf9FQe0HxhltuGXQdAQM7tYR9pqOF8T0Mqyz6', 'osama', 'mohamed', NULL, NULL, 10200220, 'rageh@gmail.com', '$2y$10$PoD4KxL4ajgp5qFla4eccO6DkF.aXeNP/5JHr0v9YTOyBubtLSMT2', NULL, NULL, NULL, NULL, NULL, '0', NULL, '2017-09-16 07:29:18', '2017-09-16 07:29:18'),
(22, '2y10Z1mmgpVMNVlW8YnZgRCfpTu2YO0mdSG2XnugEpec32kYptOK0li', 'osama', 'mohamed', NULL, NULL, 10200220, 'nada@gmail.com', '$2y$10$kNC4XlV2mr3ia2gX6z6eKuKa5QLI/uo9qlv6nYMTFawLwXLZSZ9e6', NULL, NULL, NULL, NULL, NULL, '0', NULL, '2017-09-16 08:22:15', '2017-09-16 08:22:15'),
(23, '2y10dKjdI8aShGBE1l0dKt2HROX4XlkQh6buGt97JqaTDCGEoxvewu63K', 'osama', 'mohamed', NULL, NULL, 10200220, 'nada@gmail.com', '$2y$10$9JGaYxW.inbMUrYlpZWBgOi9zqVMY9VBiYRrpoa90.B7VO6OghNfS', 1, NULL, NULL, NULL, NULL, '0', NULL, '2017-09-16 08:54:23', '2017-09-16 08:54:23'),
(24, '2y10Ypjc7Gir7Ji3qyF6VhKs56RmJ7ccicA7hHDijmgslXv5845etWD6', 'nadanada', 'rageh', NULL, NULL, 11440246141, 'nadarageh423@gmail.com', '$2y$10$7xrpM/DuQ8yh9xkdsciG8.R3aOsSa94MaibQVUybJabjpI.iGk8vS', 1, NULL, NULL, NULL, NULL, '0', '0SwMdeueSfUiKeAscOv5LfzhjRAhbVujz18YWdy6ULyuM7NoVTYFAUbYBDly', '2017-09-20 11:46:11', '2017-09-20 12:02:35'),
(25, '2y10JlqEMUeaFNBb0MaZTbGiure1JYZ4I6tHKi2RtDQ3RnsgylaBny', 'لااتنمكنتالبالا', 'نتاغلفيسيبلاتنم', NULL, NULL, 1144025341, 'nadarageh66@gmail.com', '$2y$10$bg1YQIzM1SJbglTnRtHrTuA28C.5U3CW09oCLrhYAQJgGwbgl4Z0i', 1, 'default.png', NULL, NULL, NULL, '0', NULL, '2017-10-01 13:58:06', '2017-10-01 13:58:06');

-- --------------------------------------------------------

--
-- Table structure for table `users_supported`
--

CREATE TABLE IF NOT EXISTS `users_supported` (
`id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_supported`
--

INSERT INTO `users_supported` (`id`, `username`, `email`, `created_at`, `updated_at`) VALUES
(1, 'hema', 'email@email.com', '2017-08-02 06:07:57', '2017-08-02 06:07:57'),
(2, 'hema', 'email@email.com', '2017-08-02 06:09:20', '2017-08-02 06:09:20'),
(3, 'hema', 'email@email.com', '2017-08-02 06:10:11', '2017-08-02 06:10:11'),
(4, 'hema', 'email@email.com', '2017-08-02 06:39:28', '2017-08-02 06:39:28'),
(5, 'hema', 'email@email.com', '2017-08-02 07:09:16', '2017-08-02 07:09:16'),
(6, 'hema', 'email@email.com', '2017-08-02 07:09:33', '2017-08-02 07:09:33'),
(7, 'hema', 'email@email.com', '2017-08-02 07:10:18', '2017-08-02 07:10:18'),
(8, 'h', 'h', '2017-08-02 07:22:17', '2017-08-02 07:22:17'),
(9, 'eslam', 'sda', '2017-08-02 07:22:45', '2017-08-02 07:22:45'),
(10, 'eslam', 'sda', '2017-08-02 07:23:27', '2017-08-02 07:23:27'),
(11, 'h', 'h', '2017-08-02 07:23:32', '2017-08-02 07:23:32'),
(12, 'h', 'h', '2017-08-02 07:23:40', '2017-08-02 07:23:40'),
(13, 'eslam', 'sda', '2017-08-02 07:23:57', '2017-08-02 07:23:57'),
(14, 'h', '', '2017-08-02 07:26:40', '2017-08-02 07:26:40'),
(15, 'eslm', '', '2017-08-02 07:31:11', '2017-08-02 07:31:11'),
(16, 'eslm', 'sda', '2017-08-02 07:32:41', '2017-08-02 07:32:41'),
(17, 'اسلام محمد محمود ابراهيم', 'islam.salaawy@gmail.com', '2017-08-10 13:04:59', '2017-08-10 13:04:59'),
(18, 'حمادة ', 'hamada@gmail.com', '2017-08-20 12:16:39', '2017-08-20 12:16:39');

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
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `brief`
--
ALTER TABLE `brief`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`id`), ADD KEY `comments_idea_project_id_foreign` (`idea_project_id`), ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `Contact_us`
--
ALTER TABLE `Contact_us`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
 ADD PRIMARY KEY (`id`), ADD KEY `conversations_user_one_foreign` (`user_one`), ADD KEY `conversations_user_two_foreign` (`user_two`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
 ADD PRIMARY KEY (`id`), ADD KEY `favorite_idea_project_id_foreign` (`idea_project_id`), ADD KEY `favorite_user_id_foreign` (`user_id`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
 ADD PRIMARY KEY (`id`), ADD KEY `follow_follower_id_foreign` (`project_id`), ADD KEY `follow_user_id_foreign` (`user_id`);

--
-- Indexes for table `goals`
--
ALTER TABLE `goals`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ideas_projects`
--
ALTER TABLE `ideas_projects`
 ADD PRIMARY KEY (`id`), ADD KEY `ideas_projects_city_id_foreign` (`city_id`), ADD KEY `ideas_projects_category_id_foreign` (`category_id`), ADD KEY `ideas_projects_user_id_foreign` (`user_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
 ADD PRIMARY KEY (`id`), ADD KEY `images_idea_project_id_foreign` (`idea_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
 ADD PRIMARY KEY (`id`), ADD KEY `messages_user_from_foreign` (`user_from`), ADD KEY `messages_user_to_foreign` (`user_to`), ADD KEY `messages_conversation_id_foreign` (`conversation_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobile__tokens`
--
ALTER TABLE `mobile__tokens`
 ADD PRIMARY KEY (`id`), ADD KEY `mobile__tokens_user_id_foreign` (`user_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
 ADD PRIMARY KEY (`id`), ADD KEY `notifications_notifiable_id_notifiable_type_index` (`notifiable_id`,`notifiable_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
 ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `projects_updates`
--
ALTER TABLE `projects_updates`
 ADD PRIMARY KEY (`id`), ADD KEY `projects_updates_project_id_foreign` (`project_id`);

--
-- Indexes for table `recent`
--
ALTER TABLE `recent`
 ADD PRIMARY KEY (`id`), ADD KEY `recent_idea_project_id_foreign` (`idea_project_id`), ADD KEY `recent_user_id_foreign` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supported`
--
ALTER TABLE `supported`
 ADD PRIMARY KEY (`id`), ADD KEY `supported_idea_project_id_foreign` (`idea_project_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_token_unique` (`token`), ADD KEY `users_city_id_foreign` (`city_id`);

--
-- Indexes for table `users_supported`
--
ALTER TABLE `users_supported`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `brief`
--
ALTER TABLE `brief`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `Contact_us`
--
ALTER TABLE `Contact_us`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=822;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `goals`
--
ALTER TABLE `goals`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ideas_projects`
--
ALTER TABLE `ideas_projects`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `mobile__tokens`
--
ALTER TABLE `mobile__tokens`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `projects_updates`
--
ALTER TABLE `projects_updates`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `recent`
--
ALTER TABLE `recent`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `supported`
--
ALTER TABLE `supported`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `users_supported`
--
ALTER TABLE `users_supported`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
ADD CONSTRAINT `comments_idea_project_id_foreign` FOREIGN KEY (`idea_project_id`) REFERENCES `ideas_projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `conversations`
--
ALTER TABLE `conversations`
ADD CONSTRAINT `conversations_user_one_foreign` FOREIGN KEY (`user_one`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `conversations_user_two_foreign` FOREIGN KEY (`user_two`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favorite`
--
ALTER TABLE `favorite`
ADD CONSTRAINT `favorite_idea_project_id_foreign` FOREIGN KEY (`idea_project_id`) REFERENCES `ideas_projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `favorite_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ideas_projects`
--
ALTER TABLE `ideas_projects`
ADD CONSTRAINT `ideas_projects_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `ideas_projects_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `ideas_projects_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`idea_id`) REFERENCES `ideas_projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
ADD CONSTRAINT `messages_conversation_id_foreign` FOREIGN KEY (`conversation_id`) REFERENCES `conversations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `messages_user_from_foreign` FOREIGN KEY (`user_from`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `messages_user_to_foreign` FOREIGN KEY (`user_to`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mobile__tokens`
--
ALTER TABLE `mobile__tokens`
ADD CONSTRAINT `mobile__tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projects_updates`
--
ALTER TABLE `projects_updates`
ADD CONSTRAINT `projects_updates_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `ideas_projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recent`
--
ALTER TABLE `recent`
ADD CONSTRAINT `recent_idea_project_id_foreign` FOREIGN KEY (`idea_project_id`) REFERENCES `ideas_projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `recent_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `users_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
