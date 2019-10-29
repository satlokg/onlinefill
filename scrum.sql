-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2019 at 12:23 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scrum`
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
(1, 'Admin', 'midname', 'lastname', 'admin@app.com', NULL, '$2y$10$eFtt1Tz97Rt/vfKjSNgkPuIyJf8qO4EggUbaWUgJZY2VgOYQyb6.K', NULL, '2019-08-13 06:31:51', '2019-08-13 06:31:51');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `filename` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `project_id`, `user_id`, `filename`, `updated_at`, `created_at`) VALUES
(4, 1, NULL, 'html_tutorial.pdf', '2019-10-23 03:53:46', '2019-10-23 03:53:46'),
(14, 2, NULL, 'htmltutorial.pdf', '2019-10-24 02:46:44', '2019-10-24 02:46:44'),
(15, 2, NULL, 'imgavatar.png', '2019-10-24 02:46:44', '2019-10-24 02:46:44'),
(16, 2, NULL, 'avatar-7_1.png', '2019-10-24 02:47:10', '2019-10-24 02:47:10'),
(18, 3, NULL, 'htmltutorial_2.pdf', '2019-10-25 01:19:18', '2019-10-25 01:19:18'),
(19, 6, NULL, 'htmltutorial_3.pdf', '2019-10-25 01:28:38', '2019-10-25 01:28:38');

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
  `git_repo` text NOT NULL,
  `project_manager` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `start_end` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `technology`, `est_hours`, `delivery_date`, `git_repo`, `project_manager`, `description`, `start_end`, `updated_at`, `created_at`) VALUES
(6, 'SCRUM', 'php,mysql', '400', '11/30/2019', 'http://tiavik.com/saltic/e1/employee-login', '33', 'wdad wfwe efew', '10/09/2019 - 11/02/2019', '2019-10-29 09:53:19', '2019-10-25 01:28:38');

-- --------------------------------------------------------

--
-- Table structure for table `project_hour`
--

CREATE TABLE `project_hour` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `alloted_hours` int(11) DEFAULT NULL,
  `spend_hours` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_hour`
--

INSERT INTO `project_hour` (`id`, `project_id`, `user_id`, `alloted_hours`, `spend_hours`, `updated_at`, `created_at`) VALUES
(4, 6, 33, 20, NULL, '2019-10-29 00:21:09', '2019-10-25 06:23:23'),
(5, 6, 35, 200, NULL, '2019-10-29 00:21:09', '2019-10-25 06:23:23'),
(6, 6, 36, 118, NULL, '2019-10-29 00:21:09', '2019-10-25 06:23:37'),
(9, 3, 33, 12, NULL, '2019-10-29 04:38:32', '2019-10-29 04:37:19'),
(10, 3, 36, 12, NULL, '2019-10-29 04:38:32', '2019-10-29 04:37:19'),
(11, 3, 35, 8, NULL, '2019-10-29 04:38:32', '2019-10-29 04:38:03');

-- --------------------------------------------------------

--
-- Table structure for table `project_user`
--

CREATE TABLE `project_user` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `alloted_hours` varchar(25) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_user`
--

INSERT INTO `project_user` (`id`, `project_id`, `user_id`, `alloted_hours`, `updated_at`, `created_at`) VALUES
(34, 6, 36, NULL, '2019-10-25 11:53:37', '2019-10-25 11:53:37'),
(39, 6, 33, NULL, '2019-10-29 08:46:22', '2019-10-29 08:46:22'),
(40, 6, 35, NULL, '2019-10-29 08:46:22', '2019-10-29 08:46:22'),
(41, 3, 33, NULL, '2019-10-29 10:07:19', '2019-10-29 10:07:19'),
(42, 3, 36, NULL, '2019-10-29 10:07:19', '2019-10-29 10:07:19');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_enabled` tinyint(1) NOT NULL DEFAULT 1,
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
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taskdacs`
--

INSERT INTO `taskdacs` (`id`, `task_id`, `filename`, `updated_at`, `created_at`) VALUES
(1, 2, 'avatar-7_2.png', '2019-10-29 02:42:05', '2019-10-29 02:42:05'),
(2, 2, 'htmltutorial_4.pdf', '2019-10-29 02:42:05', '2019-10-29 02:42:05'),
(3, 3, 'avatar-7_3.png', '2019-10-29 02:43:04', '2019-10-29 02:43:04'),
(4, 3, 'htmltutorial_5.pdf', '2019-10-29 02:43:04', '2019-10-29 02:43:04'),
(5, 5, 'htmltutorial_6.pdf', '2019-10-29 04:09:12', '2019-10-29 04:09:12'),
(6, 6, 'avatar-7_4.png', '2019-10-29 04:09:32', '2019-10-29 04:09:32'),
(7, 7, 'htmltutorial_7.pdf', '2019-10-29 04:39:25', '2019-10-29 04:39:25');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` longtext DEFAULT NULL,
  `hours` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `project_id`, `user_id`, `comment`, `hours`, `updated_at`, `created_at`) VALUES
(1, 6, 35, '<p>sadasd dafsf</p>', 43, '2019-10-29 02:41:31', '2019-10-29 02:41:31'),
(2, 6, 35, '<p>sadasd dafsf</p>', 43, '2019-10-29 02:42:05', '2019-10-29 02:42:05'),
(3, 6, 35, '<p>sadasd dafsf</p>', 43, '2019-10-29 02:43:04', '2019-10-29 02:43:04'),
(4, 6, 35, '<p>adsdas</p>', 23, '2019-10-29 03:39:20', '2019-10-29 03:39:20'),
(5, 6, 35, '<p>dassa</p>', 23, '2019-10-29 04:09:12', '2019-10-29 04:09:12'),
(6, 6, 35, '<p>saA</p>', 43, '2019-10-29 04:09:32', '2019-10-29 04:09:32'),
(7, 3, 35, '<p>zczxc</p>', 43, '2019-10-29 04:39:25', '2019-10-29 04:39:25');

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
(33, 'satlok', 'satlok.vipra@gmail.com', '07007891613', NULL, '1212', 'php', '$2y$10$oky70hfwCE55eic3LrT/bu6XOt7YAbIKyYjDxG18PHtsHV.LpFa86', 'Sr Developer', NULL, '2019-10-22 04:30:01', '2019-10-22 05:22:23'),
(35, 'satlok', 'satlok.vipra1@gmail.com', '07007891613', NULL, '1234', 'php', '$2y$10$dl0SMrXtpEYDJF9BGGOMyuEfZnf/g4js5.l/dh45zXOGwNwgGQKYq', 'Php Developer', NULL, '2019-10-22 04:52:53', '2019-10-22 05:22:40'),
(36, 'Avinash', 'avinash.vipra@gmail.com', '4563217895', NULL, '00012', 'Html/CSS/JS', '$2y$10$1EN5K.j9iZLt6pZZmUS5k.Ny.GovGK/OYYP81xlParyopWLZCB3.q', 'UI Developer', NULL, '2019-10-24 02:49:50', '2019-10-24 02:49:50');

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
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`id`, `city_id`, `zone_name`, `updated_at`, `created_at`) VALUES
(1, 1, 'South Delhi', '2019-09-27 16:07:07', '2019-09-27 16:07:07'),
(2, 1, 'Grater Noida', '2019-10-02 18:24:41', '2019-09-27 16:39:59'),
(3, 1, 'Zone 1', '2019-10-02 18:24:47', '2019-09-29 15:00:45'),
(4, 1, 'West South Zone', '2019-09-30 15:28:45', '2019-09-30 15:28:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendors_email_unique` (`email`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `project_hour`
--
ALTER TABLE `project_hour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `project_user`
--
ALTER TABLE `project_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taskdacs`
--
ALTER TABLE `taskdacs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
