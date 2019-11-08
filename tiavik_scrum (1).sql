-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 08, 2019 at 10:49 AM
-- Server version: 5.6.41-84.1-log
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tiavik_scrum`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `midname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `firstname`, `midname`, `lastname`, `email`, `address`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'midname', 'lastname', 'admin@app.com', NULL, '$2y$10$eFtt1Tz97Rt/vfKjSNgkPuIyJf8qO4EggUbaWUgJZY2VgOYQyb6.K', 'Kbd0C7RisQEcWAwMXN9zRsD1pNWuCb2SNMv6oH9UY97Ud206L1TMesj9xgjc', '2019-08-13 06:31:51', '2019-08-13 06:31:51');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `filename` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `project_id`, `user_id`, `filename`, `updated_at`, `created_at`) VALUES
(2, 5, NULL, 'ownermobilebrd.docx', '2019-11-01 03:01:48', '2019-11-01 03:01:48'),
(3, 5, NULL, 'uidesign.pdf', '2019-11-01 03:01:48', '2019-11-01 03:01:48');

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
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `technology` varchar(255) NOT NULL,
  `est_hours` varchar(11) DEFAULT NULL,
  `delivery_date` varchar(255) NOT NULL,
  `git_repo` text,
  `project_manager` varchar(255) NOT NULL,
  `description` longtext,
  `start_end` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `technology`, `est_hours`, `delivery_date`, `git_repo`, `project_manager`, `description`, `start_end`, `status`, `updated_at`, `created_at`) VALUES
(1, 'MD BioCoal', 'Laravel', '0080:00', '10/29/2019', NULL, '12', '<p>category delete</p>', '10/29/2019 - 10/29/2019', 1, '2019-11-08 10:24:42', '2019-10-29 12:17:07'),
(2, 'Vipra Business', 'WordPress', '0015:00', '10/30/2019', NULL, '3', '<p>changes in vipra</p>', '10/29/2019 - 10/29/2019', 1, '2019-11-06 09:58:03', '2019-10-29 12:29:24'),
(3, 'US Immigration Plan', 'Wordpress', '0125:00', '11/11/2019', NULL, '12', '<p>Hi All,&nbsp;</p><p>This client is looking to revamp the website, we need to redesign the website, the current website is mentioned below.&nbsp;</p><p><a target=\"_blank\" rel=\"nofollow\" href=\"https://www.usimmigrationplan.com/\">https://www.usimmigrationplan.com/</a><br></p><p>Project&nbsp;Technology&nbsp;Required<br></p><p>WordPress<br></p><p>HTML&nbsp;<br></p><p><br></p><p><br></p>', '10/29/2019 - 11/08/2019', 1, '2019-11-06 09:51:59', '2019-10-29 13:50:54'),
(4, 'Bhuumi Social', 'CI, Node', '0100:00', '10/31/2019', NULL, '6', NULL, '10/31/2019 - 10/31/2019', 1, '2019-11-06 09:50:56', '2019-10-31 04:37:05'),
(5, 'Owner Restaurant', 'Android and iOS', '0036:00', '11/12/2019', NULL, '11', '<p>This is will be an app for restaurant owners. Please read project document for detailed understanding</p>', '11/01/2019 - 11/12/2019', 1, '2019-11-06 09:50:04', '2019-11-01 03:01:48'),
(6, 'Bhuumi Chat', 'Android, iOS, Node', '1420:00', '11/18/2019', NULL, '11', NULL, '11/01/2019 - 11/15/2019', 1, '2019-11-06 09:46:15', '2019-11-01 03:20:37'),
(7, 'Bhuumi Ride', 'Android, iOS, CI', '2000:00', '11/08/2019', NULL, '11', NULL, '11/01/2019 - 11/08/2019', 1, '2019-11-06 09:46:40', '2019-11-01 03:23:13'),
(8, 'Bhuumi Web', 'CI, Node', '0616:00', '11/08/2019', NULL, '3', NULL, '11/01/2019 - 11/07/2019', 1, '2019-11-06 09:45:00', '2019-11-01 03:25:45'),
(9, 'Palms Maintenance', 'Core PhP', '002:00', '11/01/2019', 'http://tiavik.com/saltic/e1/employee-login', '12', '<p>Correct all slider image</p><p>\r\n\r\n<a target=\"_blank\" rel=\"nofollow\" href=\"http://palmsmaintenance.com/\">http://palmsmaintenance.com/</a>&nbsp;&nbsp;<br></p>', '11/01/2019 - 11/01/2019', 1, '2019-11-06 09:42:55', '2019-11-01 06:31:20'),
(10, 'NGO', 'Wordpress', '050:00', '11/30/2019', NULL, '12', '<p>\r\n\r\n<a target=\"_blank\" rel=\"nofollow\" href=\"http://viprabusiness.co/ngo/\">http://viprabusiness.co/ngo/</a>\r\n\r\n<br></p>', '11/01/2019 - 11/30/2019', 1, '2019-11-06 09:42:14', '2019-11-01 06:34:49'),
(13, 'Jay Morley MInistries', 'WordPress', '120:00', '11/05/2019', NULL, '12', '<p>Update Wordpress and PayPal integration</p>', '11/01/2019 - 11/04/2019', 1, '2019-11-06 09:37:25', '2019-11-01 08:12:09'),
(14, 'LomoSolution UI', 'CI', '800:00', '11/07/2019', NULL, '12', NULL, '11/04/2019 - 11/06/2019', 1, '2019-11-06 09:36:58', '2019-11-01 09:26:42'),
(15, 'Scrum', 'PhP, Laravel', '200:00', '01/01/2020', NULL, '3', NULL, '11/01/2019 - 12/31/2019', 1, '2019-11-06 09:35:53', '2019-11-01 13:07:21'),
(16, 'Maya\'s Pizza', 'WordPress', '4100:00', '11/12/2019', NULL, '12', NULL, '11/04/2019 - 11/08/2019', 1, '2019-11-08 10:21:59', '2019-11-04 07:19:28'),
(17, 'Brush Creek Church', 'WordPress', '16:50', '11/05/2019', NULL, '12', NULL, '11/04/2019 - 11/05/2019', 1, '2019-11-06 09:34:13', '2019-11-04 12:12:04'),
(18, 'Salticme Employee', 'PhP, WordPress, CI, Laravel', '0040:00', '12/01/2019', NULL, '3', NULL, '11/01/2019 - 12/01/2019', 1, '2019-11-08 10:23:14', '2019-11-06 13:18:24');

-- --------------------------------------------------------

--
-- Table structure for table `project_hour`
--

CREATE TABLE `project_hour` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `alloted_hours` varchar(11) DEFAULT NULL,
  `spend_hours` varchar(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_hour`
--

INSERT INTO `project_hour` (`id`, `project_id`, `user_id`, `alloted_hours`, `spend_hours`, `updated_at`, `created_at`) VALUES
(1, 1, 1, '0010:00', NULL, '2019-11-08 10:24:42', '2019-10-29 12:17:07'),
(2, 2, 4, '0008:00', NULL, '2019-11-06 09:58:41', '2019-10-29 12:29:24'),
(3, 2, 2, '0004:00', NULL, '2019-11-06 09:58:41', '2019-10-29 12:39:03'),
(4, 1, 2, '0010:00', NULL, '2019-11-08 10:24:42', '2019-10-29 12:57:04'),
(5, 3, 1, '0040:00', NULL, '2019-11-06 09:56:33', '2019-10-29 13:50:54'),
(6, 3, 2, '0024:00', NULL, '2019-11-06 09:56:33', '2019-10-29 13:50:54'),
(7, 3, 5, '0001:00', NULL, '2019-11-06 09:56:33', '2019-10-29 14:34:23'),
(8, 4, 6, '0008:00', NULL, '2019-11-06 09:50:56', '2019-10-31 04:37:05'),
(9, 5, 11, '0017:00', NULL, '2019-11-06 09:50:04', '2019-11-01 03:07:10'),
(10, 4, 7, NULL, NULL, '2019-11-01 03:17:24', '2019-11-01 03:17:24'),
(11, 6, 6, NULL, NULL, '2019-11-01 03:20:37', '2019-11-01 03:20:37'),
(12, 6, 8, NULL, NULL, '2019-11-01 03:20:37', '2019-11-01 03:20:37'),
(13, 6, 10, NULL, NULL, '2019-11-01 03:20:37', '2019-11-01 03:20:37'),
(14, 7, 7, NULL, NULL, '2019-11-01 03:23:14', '2019-11-01 03:23:14'),
(15, 7, 8, NULL, NULL, '2019-11-01 03:23:14', '2019-11-01 03:23:14'),
(16, 7, 9, NULL, NULL, '2019-11-01 03:23:14', '2019-11-01 03:23:14'),
(17, 8, 5, '0100:00', NULL, '2019-11-06 13:19:44', '2019-11-01 03:25:45'),
(18, 8, 7, '0200:00', NULL, '2019-11-06 13:19:44', '2019-11-01 03:25:45'),
(19, 9, 5, '002:00', NULL, '2019-11-06 09:42:55', '2019-11-01 06:31:20'),
(20, 10, 1, '040:00', NULL, '2019-11-06 09:42:14', '2019-11-01 06:34:49'),
(21, 10, 5, '010:00', NULL, '2019-11-06 09:42:14', '2019-11-01 06:34:49'),
(22, 3, 4, '0016:00', NULL, '2019-11-06 09:56:33', '2019-11-01 06:39:40'),
(23, 11, 2, '1', NULL, '2019-11-01 07:13:12', '2019-11-01 07:12:59'),
(24, 5, 2, '0001:00', NULL, '2019-11-06 09:50:04', '2019-11-01 07:26:09'),
(25, 12, 2, NULL, NULL, '2019-11-01 07:40:06', '2019-11-01 07:40:06'),
(26, 5, 9, '0017:00', NULL, '2019-11-06 09:50:04', '2019-11-01 07:47:30'),
(27, 13, 1, '080:00', NULL, '2019-11-06 09:39:47', '2019-11-01 08:12:09'),
(28, 14, 3, '500:00', NULL, '2019-11-06 09:41:26', '2019-11-01 09:26:42'),
(29, 14, 5, '050:00', NULL, '2019-11-06 09:41:26', '2019-11-01 09:26:42'),
(30, 14, 7, '100:00', NULL, '2019-11-06 09:41:26', '2019-11-01 09:26:42'),
(31, 2, 1, '0001:00', NULL, '2019-11-06 09:58:41', '2019-11-01 09:49:44'),
(32, 15, 3, '100:00', NULL, '2019-11-06 09:35:53', '2019-11-01 13:07:21'),
(33, 2, 5, NULL, NULL, '2019-11-01 14:07:36', '2019-11-01 14:07:36'),
(34, 16, 1, '0016:00', NULL, '2019-11-08 10:21:59', '2019-11-04 07:19:28'),
(35, 16, 2, NULL, NULL, '2019-11-04 07:19:28', '2019-11-04 07:19:28'),
(36, 16, 5, NULL, NULL, '2019-11-04 07:19:28', '2019-11-04 07:19:28'),
(37, 17, 1, NULL, NULL, '2019-11-04 12:12:04', '2019-11-04 12:12:04'),
(38, 13, 5, '040:00', NULL, '2019-11-06 09:39:47', '2019-11-05 09:04:14'),
(39, 6, 2, NULL, NULL, '2019-11-05 13:34:14', '2019-11-05 13:34:14'),
(40, 1, 3, '0010:00', NULL, '2019-11-08 10:24:42', '2019-11-06 09:59:54'),
(41, 18, 3, '0040:00', NULL, '2019-11-08 10:23:14', '2019-11-06 13:18:24'),
(42, 8, 3, '0024:00', NULL, '2019-11-06 13:19:44', '2019-11-06 13:19:32'),
(43, 1, 12, '0002:00', NULL, '2019-11-08 10:24:42', '2019-11-08 10:23:48');

-- --------------------------------------------------------

--
-- Table structure for table `project_user`
--

CREATE TABLE `project_user` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `alloted_hours` varchar(25) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_user`
--

INSERT INTO `project_user` (`id`, `project_id`, `user_id`, `alloted_hours`, `updated_at`, `created_at`) VALUES
(1, 1, 1, NULL, '2019-10-29 12:17:07', '2019-10-29 12:17:07'),
(2, 2, 4, NULL, '2019-10-29 12:29:24', '2019-10-29 12:29:24'),
(4, 1, 2, NULL, '2019-10-29 12:57:04', '2019-10-29 12:57:04'),
(5, 3, 1, NULL, '2019-10-29 13:50:54', '2019-10-29 13:50:54'),
(6, 3, 2, NULL, '2019-10-29 13:50:54', '2019-10-29 13:50:54'),
(8, 4, 6, NULL, '2019-10-31 04:37:05', '2019-10-31 04:37:05'),
(9, 5, 11, NULL, '2019-11-01 03:07:10', '2019-11-01 03:07:10'),
(10, 4, 7, NULL, '2019-11-01 03:17:24', '2019-11-01 03:17:24'),
(11, 6, 6, NULL, '2019-11-01 03:20:37', '2019-11-01 03:20:37'),
(12, 6, 8, NULL, '2019-11-01 03:20:37', '2019-11-01 03:20:37'),
(13, 6, 10, NULL, '2019-11-01 03:20:37', '2019-11-01 03:20:37'),
(14, 7, 7, NULL, '2019-11-01 03:23:14', '2019-11-01 03:23:14'),
(15, 7, 8, NULL, '2019-11-01 03:23:14', '2019-11-01 03:23:14'),
(16, 7, 9, NULL, '2019-11-01 03:23:14', '2019-11-01 03:23:14'),
(17, 8, 5, NULL, '2019-11-01 03:25:45', '2019-11-01 03:25:45'),
(18, 8, 7, NULL, '2019-11-01 03:25:45', '2019-11-01 03:25:45'),
(19, 9, 5, NULL, '2019-11-01 06:31:20', '2019-11-01 06:31:20'),
(20, 10, 1, NULL, '2019-11-01 06:34:49', '2019-11-01 06:34:49'),
(21, 10, 5, NULL, '2019-11-01 06:34:49', '2019-11-01 06:34:49'),
(22, 3, 4, NULL, '2019-11-01 06:39:40', '2019-11-01 06:39:40'),
(23, 11, 2, NULL, '2019-11-01 07:12:59', '2019-11-01 07:12:59'),
(24, 5, 2, NULL, '2019-11-01 07:26:09', '2019-11-01 07:26:09'),
(25, 12, 2, NULL, '2019-11-01 07:40:06', '2019-11-01 07:40:06'),
(26, 5, 9, NULL, '2019-11-01 07:47:30', '2019-11-01 07:47:30'),
(27, 13, 1, NULL, '2019-11-01 08:12:09', '2019-11-01 08:12:09'),
(28, 14, 3, NULL, '2019-11-01 09:26:42', '2019-11-01 09:26:42'),
(29, 14, 5, NULL, '2019-11-01 09:26:42', '2019-11-01 09:26:42'),
(30, 14, 7, NULL, '2019-11-01 09:26:42', '2019-11-01 09:26:42'),
(31, 2, 1, NULL, '2019-11-01 09:49:44', '2019-11-01 09:49:44'),
(32, 15, 3, NULL, '2019-11-01 13:07:21', '2019-11-01 13:07:21'),
(33, 2, 5, NULL, '2019-11-01 14:07:36', '2019-11-01 14:07:36'),
(34, 16, 1, NULL, '2019-11-04 07:19:28', '2019-11-04 07:19:28'),
(35, 16, 2, NULL, '2019-11-04 07:19:28', '2019-11-04 07:19:28'),
(36, 16, 5, NULL, '2019-11-04 07:19:28', '2019-11-04 07:19:28'),
(37, 17, 1, NULL, '2019-11-04 12:12:04', '2019-11-04 12:12:04'),
(38, 13, 5, NULL, '2019-11-05 09:04:14', '2019-11-05 09:04:14'),
(39, 6, 2, NULL, '2019-11-05 13:34:14', '2019-11-05 13:34:14'),
(40, 3, 5, NULL, '2019-11-06 09:55:07', '2019-11-06 09:55:07'),
(41, 2, 2, NULL, '2019-11-06 09:58:20', '2019-11-06 09:58:20'),
(42, 1, 3, NULL, '2019-11-06 09:59:54', '2019-11-06 09:59:54'),
(43, 18, 3, NULL, '2019-11-06 13:18:24', '2019-11-06 13:18:24'),
(44, 8, 3, NULL, '2019-11-06 13:19:32', '2019-11-06 13:19:32'),
(45, 1, 12, NULL, '2019-11-08 10:23:48', '2019-11-08 10:23:48');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_enabled` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taskdacs`
--

CREATE TABLE `taskdacs` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taskdacs`
--

INSERT INTO `taskdacs` (`id`, `task_id`, `filename`, `updated_at`, `created_at`) VALUES
(1, 14, 'splash-screen.png', '2019-11-01 08:25:23', '2019-11-01 08:25:23'),
(2, 50, 'practice-areas.png', '2019-11-05 04:28:34', '2019-11-05 04:28:34'),
(3, 50, 'inner-pages.png', '2019-11-05 04:28:34', '2019-11-05 04:28:34'),
(4, 56, 'portfolio-content--2.png', '2019-11-05 13:17:25', '2019-11-05 13:17:25');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` longtext,
  `hours` varchar(6) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `project_id`, `user_id`, `comment`, `hours`, `updated_at`, `created_at`) VALUES
(1, 1, 1, '<p></p><ol><li>testing</li></ol><p></p>', '01:00', '2019-11-05 10:39:20', '2019-10-29 12:21:36'),
(2, 2, 4, '<p></p><ul><li>test</li></ul><p></p>', '05:00', '2019-11-05 10:39:48', '2019-10-29 12:31:53'),
(3, 1, 1, '<p>testing</p>', '01:00', '2019-11-05 10:40:03', '2019-10-29 12:48:47'),
(4, 1, 1, '<p>how is the comment section coming up</p>', '01:00', '2019-11-05 10:40:15', '2019-10-29 12:49:38'),
(5, 1, 1, '<p>hello</p><p><br></p>', '09:00', '2019-11-05 10:40:34', '2019-10-29 12:54:48'),
(6, 1, 1, '<p>test</p>', '01:00', '2019-11-05 10:40:47', '2019-10-29 13:09:24'),
(7, 4, 6, '<p>Changes in API of leave group in Bhuumi Chat.</p><p>Leave Group API Implementation in Bhuumi Social</p>', '08:00', '2019-11-05 10:41:01', '2019-10-31 12:50:13'),
(8, 1, 1, NULL, '02:00', '2019-11-05 10:41:54', '2019-10-31 13:24:27'),
(9, 1, 1, '<p>grhr</p>', '01:00', '2019-11-05 10:49:25', '2019-10-31 13:24:53'),
(10, 3, 1, '<p>Today I worked on user profile&nbsp;</p>', '05:00', '2019-11-05 10:47:39', '2019-10-31 13:25:44'),
(11, 3, 1, '<p></p><ul><li>home page</li><li>contact page</li></ul><p></p>', '08:00', '2019-11-05 10:42:45', '2019-10-31 13:57:39'),
(12, 2, 3, '<p>@Avinash please describe your task</p>', NULL, '2019-11-01 05:57:00', '2019-11-01 05:57:00'),
(13, 10, 1, '<p></p><ul><li>Menu</li><li>Header</li><li>Footer</li><li>what we do</li></ul><p></p>', '03:00', '2019-11-05 10:46:27', '2019-11-01 08:20:25'),
(14, 5, 2, '<p>I have done Splash Screen or Launcher icon for android of <b><u>GoGo Menu.</u></b></p>', '01:00', '2019-11-05 10:49:25', '2019-11-01 08:25:23'),
(15, 8, 7, '<p>resolve bhuumi star issue of design after login</p>', '00:30', '2019-11-05 11:03:15', '2019-11-01 09:42:34'),
(16, 7, 7, '<p>change date format and changes in search queries all pages</p>', '02:30', '2019-11-05 11:04:13', '2019-11-01 09:44:19'),
(17, 14, 7, '<p>resolve issue of design after login if user login as general admin</p>', '00:30', '2019-11-05 11:03:39', '2019-11-01 09:45:39'),
(18, 13, 1, '<p></p><ul><li>paypal configuration R &amp; D</li><li>admin function R &amp; D</li></ul><p></p>', '02:00', '2019-11-05 10:45:19', '2019-11-01 11:56:23'),
(19, 2, 1, NULL, '03:00', '2019-11-05 10:46:27', '2019-11-01 11:56:40'),
(20, 14, 3, '<p>Local Setup ANd review code</p>', '04:00', '2019-11-05 10:47:06', '2019-11-01 13:05:53'),
(21, 15, 3, '<p></p><ol><li>working for project document</li><li>lead project manage</li></ol><p></p>', NULL, '2019-11-01 13:08:51', '2019-11-01 13:08:51'),
(22, 15, 3, '<p>\r\n\r\n</p><ol><li>working for project document</li><li>lead project manage</li></ol><p></p>', '04:00', '2019-11-05 10:47:06', '2019-11-01 13:09:34'),
(23, 4, 6, '<p>Worked on the message status icon and the changes in the edit group if no longer a member.</p>', '08:00', '2019-11-05 10:42:45', '2019-11-01 13:11:00'),
(24, 8, 5, '<p>chat design changes</p>', '01:00', '2019-11-05 10:49:25', '2019-11-01 13:11:32'),
(25, 3, 12, '<p>Anubhav please describe your work</p>', NULL, '2019-11-01 13:15:24', '2019-11-01 13:15:24'),
(26, 7, 7, '<p>check Bhuumi Ride billing isssue</p>', '00:30', '2019-11-05 10:58:03', '2019-11-01 13:20:52'),
(27, 4, 7, '<p>event accept decline, show profile page as front for solcial</p>', '04:00', '2019-11-05 10:47:06', '2019-11-01 13:22:45'),
(28, 8, 5, '<p>this is for the service page changes</p>', '00:15', '2019-11-05 10:53:14', '2019-11-01 14:05:36'),
(29, 2, 5, NULL, '00:30', '2019-11-05 10:53:54', '2019-11-01 14:15:44'),
(30, 10, 5, NULL, '06:15', '2019-11-05 10:55:49', '2019-11-01 14:19:58'),
(31, 5, 9, NULL, '03:00', '2019-11-05 10:46:27', '2019-11-01 14:30:39'),
(32, 5, 11, '<p>Compete All Discussed functionality.</p>', '03:00', '2019-11-05 10:46:27', '2019-11-04 09:01:02'),
(33, 10, 1, '<p><b>In NGO:-</b></p><p></p><ul><li><b></b>All home page<b></b><br></li><li>About page</li><li>Blog Page</li></ul><p></p>', '04:30', '2019-11-05 10:56:09', '2019-11-04 12:07:31'),
(34, 17, 1, '<p></p><ul><li>creat db and update db</li><li>upload folder</li></ul><p></p>', '01:30', '2019-11-05 10:56:27', '2019-11-04 12:19:32'),
(35, 2, 3, '<p></p><ul><li>Blog correction</li><li>nt found correction</li></ul><p></p>', '01:00', '2019-11-05 10:49:25', '2019-11-04 12:48:57'),
(36, 15, 3, '<p></p><ul><li>report for all user in admin</li><li>Report for user</li></ul><p></p>', '04:00', '2019-11-05 10:47:06', '2019-11-04 12:49:56'),
(37, 14, 3, '<p>work for mail module</p>', '03:00', '2019-11-05 10:46:27', '2019-11-04 12:50:42'),
(38, 3, 4, NULL, '08:00', '2019-11-05 10:42:45', '2019-11-04 13:06:57'),
(39, 17, 1, '<p></p><ul><li>Pdf download</li></ul><p></p>', '00:30', '2019-11-05 10:53:54', '2019-11-04 13:07:00'),
(40, 4, 6, '<p>Manage online, offline status and typing, stop typing.</p>', '08:00', '2019-11-05 10:42:45', '2019-11-04 13:10:21'),
(41, 4, 7, NULL, '08:00', '2019-11-05 10:42:45', '2019-11-04 13:13:13'),
(42, 9, 5, NULL, '00:15', '2019-11-05 10:54:23', '2019-11-04 13:26:40'),
(43, 3, 1, '<p></p><ul><li>blog</li><li>resolve design issue</li></ul><p></p>', '01:30', '2019-11-05 10:56:49', '2019-11-04 13:43:59'),
(44, 5, 9, NULL, '01:00', '2019-11-05 10:49:25', '2019-11-04 14:02:18'),
(45, 16, 5, NULL, '02:30', '2019-11-05 10:56:38', '2019-11-04 14:09:04'),
(46, 10, 5, NULL, '00:30', '2019-11-05 10:53:54', '2019-11-04 14:10:18'),
(47, 14, 5, NULL, '00:30', '2019-11-05 10:53:54', '2019-11-04 14:11:23'),
(48, 3, 5, NULL, '00:15', '2019-11-05 10:54:23', '2019-11-04 14:11:57'),
(49, 8, 5, '<p>bhuumi service page</p>', '04:00', '2019-11-05 10:47:06', '2019-11-04 14:12:27'),
(50, 3, 2, '<p>Make PSD of&nbsp; inner pages (Practice Areas)&nbsp;</p>', '04:00', '2019-11-05 10:47:06', '2019-11-05 04:28:34'),
(51, 2, 2, '<p>Make PSD of Portfolio Page.</p>', '04:00', '2019-11-05 10:47:06', '2019-11-05 04:29:49'),
(52, 5, 2, '<p>Make Launcher Icon&nbsp;</p>', '02:00', '2019-11-05 10:45:19', '2019-11-05 04:30:48'),
(55, 3, 4, NULL, '07:30', '2019-11-05 13:04:07', '2019-11-05 13:04:07'),
(56, 2, 2, '<p>Make PSD of Portfolio Page.</p>', '04:00', '2019-11-05 13:17:25', '2019-11-05 13:17:25'),
(57, 3, 1, '<p></p><ul><li>Blog Page load</li><li>meting with Vivek sir</li></ul><br><br><p></p>', '01:00', '2019-11-05 13:28:21', '2019-11-05 13:28:21'),
(58, 13, 1, '<p></p><ul><li>create a custom static page of upcoming events</li><li>dynamic upcoming events</li><li>book now</li></ul><p></p>', '05:00', '2019-11-05 13:30:12', '2019-11-05 13:30:12'),
(59, 13, 1, NULL, '01:00', '2019-11-05 13:31:30', '2019-11-05 13:31:30'),
(60, 17, 1, '<p></p><ul><li>install elementor editor</li><li>study about elementor editor</li><li>create a test page with editor</li></ul><p></p>', '02:00', '2019-11-05 13:33:21', '2019-11-05 13:33:21'),
(61, 6, 2, '<p>Make Icons&nbsp;</p>', '01:30', '2019-11-05 13:35:31', '2019-11-05 13:35:31'),
(62, 15, 3, 'admin report excel csv and view', '08:00', '2019-11-05 13:37:47', '2019-11-05 13:37:47'),
(63, 5, 9, NULL, '08:00', '2019-11-05 13:38:00', '2019-11-05 13:38:00'),
(64, 4, 7, NULL, '03:30', '2019-11-05 13:41:48', '2019-11-05 13:41:48'),
(65, 6, 8, '<p>1) Profile UI</p><p>2) Profile Details API</p><p>3) Profile Image uplaod</p><p>4) Profile Name change</p><p>5) User status UI</p><p>6) User status API</p><p>7) Testing and bug fixing</p>', '08:00', '2019-11-05 13:50:06', '2019-11-05 13:50:06'),
(66, 6, 10, '<p>Worked on fix the uploading and downloading issue and change the icons and font size for the chat screen.</p>', '08:00', '2019-11-05 13:56:53', '2019-11-05 13:56:53'),
(67, 8, 5, NULL, '00:15', '2019-11-05 14:14:58', '2019-11-05 14:14:58'),
(68, 8, 5, '<p>for bhuumi social</p>', '00:15', '2019-11-05 14:15:31', '2019-11-05 14:15:31'),
(69, 2, 5, NULL, '05:00', '2019-11-05 14:15:55', '2019-11-05 14:15:55'),
(70, 3, 5, NULL, '00:15', '2019-11-05 14:16:21', '2019-11-05 14:16:21'),
(71, 10, 5, NULL, '01:15', '2019-11-05 14:16:39', '2019-11-05 14:16:39'),
(72, 13, 5, NULL, '00:45', '2019-11-05 14:16:59', '2019-11-05 14:16:59'),
(73, 6, 6, '<p>Bug Fixes</p>', '06:00', '2019-11-06 04:24:45', '2019-11-05 04:18:26'),
(74, 2, 1, '<p></p><ul><li>blog section have show author name</li></ul><p></p>', '00:30', '2019-11-06 07:38:02', '2019-11-06 07:38:02'),
(76, 3, 4, NULL, '08:00', '2019-11-06 13:13:32', '2019-11-06 13:13:32'),
(77, 15, 3, '<p>\r\n\r\nWorking for project status\r\nand report hours\r\n\r\n<br></p>', '03:00', '2019-11-06 13:13:32', '2019-11-06 13:13:32'),
(78, 8, 7, '<p>change in bhuumi service page, matchmaking page, and show issue of admin alert message</p>', '05:30', '2019-11-06 13:17:10', '2019-11-06 13:17:10'),
(79, 4, 7, NULL, '01:30', '2019-11-06 13:18:23', '2019-11-06 13:18:23'),
(80, 18, 3, '<p>\r\n\r\n3 Form Add\r\n\r\n<br></p>', '03:00', '2019-11-06 13:20:21', '2019-11-06 13:20:21'),
(81, 8, 3, '<p>\r\n\r\nwork for form all\r\n\r\n<br></p>', '02:00', '2019-11-06 13:20:54', '2019-11-06 13:20:54'),
(82, 6, 6, '<p>Status Bug Fixes</p>', '08:00', '2019-11-06 13:21:03', '2019-11-06 13:21:03'),
(83, 13, 1, '<p></p><ul><li>show book now button</li><li>redirect to paypal with price</li></ul><p></p>', '02:00', '2019-11-06 13:34:39', '2019-11-06 13:34:39'),
(84, 7, 9, '<p>work on the client detail screen in the bhumi driver app and upload the app to the app store.</p><p>work on dashboard screen in case of the ride later and work on ride detail  screen and upload app to the app store </p>', '08:00', '2019-11-06 13:38:59', '2019-11-06 13:38:59'),
(85, 3, 1, '<p></p><ul><li>how we work at home page</li><li>mission statement page<br></li><li>vision statement page</li><li>Our story page</li><li>Our team page</li><li>Practice areas page</li></ul><p></p>', '05:30', '2019-11-06 13:41:31', '2019-11-06 13:41:31'),
(86, 6, 8, '1) Settings UI&nbsp;<div>2) Settings make functional</div><div>3) Group added action message</div><div>4) API changes update in app</div><div>5) Contact sync functional changes&nbsp;</div>', '08:00', '2019-11-06 13:57:20', '2019-11-06 13:57:20'),
(87, 6, 10, '<p>Worked on create the screen to pick the image from gallery and capture from camera.</p>', '08:00', '2019-11-06 14:08:10', '2019-11-06 14:08:10'),
(88, 3, 5, '<p>design bugs fixes</p>', '07:30', '2019-11-06 14:30:49', '2019-11-06 14:30:49'),
(89, 2, 5, NULL, '00:15', '2019-11-06 14:31:11', '2019-11-06 14:31:11'),
(90, 8, 5, NULL, '00:15', '2019-11-06 14:31:44', '2019-11-06 14:31:44'),
(92, 16, 5, '<p>internal pages HTML - about, contact and pizza pages</p>', '02:15', '2019-11-07 12:20:12', '2019-11-07 12:20:12'),
(93, 3, 5, '<p>about page design, animation and scroll effect and bug fixes</p>', '05:45', '2019-11-07 12:21:28', '2019-11-07 12:21:28'),
(94, 8, 3, '<p>Local setup and getting some error in my local</p>', '02:00', '2019-11-07 12:52:04', '2019-11-07 12:52:04'),
(95, 18, 3, '<p>\r\n\r\nAll form completed Resume form \r\nremainning in user panel\r\n\r\n<br></p>', '06:00', '2019-11-07 12:52:36', '2019-11-07 12:52:36'),
(96, 3, 4, NULL, '05:30', '2019-11-07 13:06:33', '2019-11-07 13:06:33'),
(97, 6, 6, '<p>Bug Fixes</p>', '05:00', '2019-11-07 13:09:32', '2019-11-07 13:09:32'),
(98, 4, 6, '<p>Add/Remove action message</p>', '03:00', '2019-11-07 13:10:29', '2019-11-07 13:10:29'),
(99, 8, 7, '<p>security check on website</p>', '07:30', '2019-11-07 13:13:21', '2019-11-07 13:13:21'),
(100, 3, 1, '<p></p><ul><li>blog page with inner page</li><li>event/reviews page(only not done after scrolling load data)</li></ul><p></p>', '08:00', '2019-11-07 13:27:51', '2019-11-07 13:27:51'),
(101, 6, 8, '<p>1) Group Action message control&nbsp;</p><p>2) Bug fixing</p>', '08:00', '2019-11-07 14:09:47', '2019-11-07 14:09:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `emp_id` varchar(112) COLLATE utf8mb4_unicode_ci NOT NULL,
  `technology` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `emp_id`, `technology`, `password`, `designation`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Anubhav Kumar', 'anubhav.vipra@gmail.com', '07007891613', NULL, 'VB001', 'PhP, WordPress, CI, Laravel', '$2y$10$mta3sZefSGKAzRq9aPzzNuMQuWnEVJugpcz6oHGwI5iT88Q84VRY2', 'Web Developer', NULL, '2019-10-29 12:07:31', '2019-11-01 03:09:13'),
(2, 'Shivani Shrivastava', 'shivani.vipra@gmail.com', '9205726239', NULL, 'VB002', 'PS, AI, XD', '$2y$10$1fXX0ePb8PukSO.0LfhvCOEPXhuvmMNV.wL35lDZTxc41lwI0CQn.', 'Graphic Designer', 'trWPAeRY5yMCkXcOmFq1ZIlJkRCuBRQQoGjoJOzXgGFosnd7LEdu1RU22ui2', '2019-10-29 12:24:07', '2019-11-01 03:13:10'),
(3, 'Satlok Gupta', 'satlok.vipra@gmail.com', '07007891613', NULL, 'VB003', 'PhP, Laravel, Node', '$2y$10$woQMfOPpR8tipHBg9I1A4e7Di/ZrD7LO4cxinoCTid/sGJSeT5nF2', 'Sr. Web Developer', NULL, '2019-10-29 12:24:55', '2019-11-01 03:11:54'),
(4, 'Avinash Yadav', 'avinash01vipra@gmail.com', '9891889360', NULL, 'VB005', 'HTML, CSS, JS', '$2y$10$SACUjMv1UwZq7CipdyRqC.GYZS2G2oG.bCiiSNJixSENTfD2lIOb.', 'UI Developer', 'd90LX1C2OXHXIrBwe2V7wfnLcWia8pN60MxstIpshtkylTWfESiWysKvtlrT', '2019-10-29 12:26:17', '2019-11-01 03:10:55'),
(5, 'Nirmal Singh', 'nirmal.vipra@gmail.com', '9899495671', NULL, 'VB013', 'HTML, CSS, JS', '$2y$10$elzI5rPIh0DTkk5C71ZiTOGQoJBSZm24D6IPxnVxualNo0w2Ahkhq', 'UI Developer', '7Xqa0Ux6x96KM4Nv77x1iojjTbQKcwvM48eOg924vrPOuKlKrKNq16llvbiR', '2019-10-29 13:46:31', '2019-11-01 05:42:52'),
(6, 'Sushant Chaudhary', 'sushantchaudhary.vipra@gmail.com', '9453680129', NULL, 'VB007', 'PhP, CI, Node, Laravel', '$2y$10$H9tBCR3.TShuR2SwjWas2.2cIKozfw4GMA2t5sASeVlxHNsrr2Nwm', 'Web Developer', NULL, '2019-10-31 04:36:13', '2019-11-01 03:14:00'),
(7, 'Sanjay Pratap Singh', 'sanjaypratap.vipra@gmail.com', '7838163336', NULL, 'VB015', 'PhP, CI', '$2y$10$xP2W2QfmN6nj0Ib6fQ5cZuq2D6o1kuRStExeyi53twtFMlURNOP42', 'Web Developer', 'kjPoFxx4JF7CLJ5nswteIovF723CnYlpTkwGmVselH0Oejmd6LwDfivcByvN', '2019-11-01 02:44:19', '2019-11-01 03:12:17'),
(8, 'Uma Shankar', 'umashankar.vipra@gmail.com', '8800649696', NULL, 'VB016', 'Java', '$2y$10$kSl6lo4sZ1bh6cd8Vxcw9OKxy1tgyXKhwFhVe20YFTd1bebtCQj3y', 'Android Developer', 'M4jptdDjJrDKvvfjeD9rYl62N6oskkRLhA2jqfpvEW9DckTN3FlxrfhqyFFm', '2019-11-01 02:46:24', '2019-11-01 02:46:24'),
(9, 'Neha Vishwakarma', 'neha1.vipra@gmail.com', '8750596225', NULL, 'VB017', 'Objective C, Swift', '$2y$10$spU/3x22IeEjmBixcBWTW.1aeyLwSFGwdS8qqb5zU825FXPp9yBhK', 'iOS Developer', 'lL79MnZpbs16UDD2SJfwOeXMWZheYPFPwGkyQ1nnoLDfMkcDhtDBxwZA3vrz', '2019-11-01 02:48:29', '2019-11-01 02:48:29'),
(10, 'Ankit Paliwal', 'ankitpaliwal.vipra@gmail.com', '9806759609', NULL, 'VB018', 'Objective C, Swift', '$2y$10$PSwPZHB8HZeh9bm9OJipkut./VDUkPngLRsCME7uyZ6DjWBBSJaqa', 'iOS Developer', NULL, '2019-11-01 02:50:03', '2019-11-01 02:50:03'),
(11, 'Saurabh Shukla', 'saurabhs.vipra@gmail.com', '9015036703', NULL, 'VB019', 'Android', '$2y$10$ThigVBTxl8RmyK/hkS3GeOmG3rw2Jp2iDbyix85KIUPRc6/.MaVMO', 'Team Manager', NULL, '2019-11-01 03:04:25', '2019-11-01 03:04:25'),
(12, 'Soumadeep Chatterjee', 'soumadeep.vipra@gmail.com', '858692982', NULL, 'VB0173', 'Business Intelligence & Management', '$2y$10$lwr8NpanKZt2Vl5Ic9ofcuugIntK1gMWK73bBtbFdRoEzQXp2vStG', 'Project Manager', NULL, '2019-11-01 06:56:19', '2019-11-01 06:56:19');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `midname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `firstname`, `midname`, `lastname`, `email`, `address`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Vendor', 'midname', 'lastname', 'vendor@app.com', NULL, '$2y$10$cIZkRz/At8H0OVinK2tM2eOaIOVHQOzMW.VJk0Fk1gHGV7V7h6cNW', NULL, '2019-08-13 06:32:28', '2019-08-13 06:32:28');

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `zone_name` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_hour`
--
ALTER TABLE `project_hour`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_user`
--
ALTER TABLE `project_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taskdacs`
--
ALTER TABLE `taskdacs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `project_hour`
--
ALTER TABLE `project_hour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `project_user`
--
ALTER TABLE `project_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `taskdacs`
--
ALTER TABLE `taskdacs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
