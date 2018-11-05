-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2018 at 01:01 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `change`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_group`
--

CREATE TABLE `auth_group` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auth_group`
--

INSERT INTO `auth_group` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'default', NULL, NULL),
(12, 'spv_qc', '2018-09-15 03:30:10', '2018-09-15 03:30:10'),
(19, 'spv_qa', '2018-09-15 03:50:37', '2018-09-15 03:50:37'),
(20, 'qc_field', '2018-09-15 03:51:16', '2018-09-15 03:51:16'),
(21, 'qa_field', '2018-09-15 03:51:49', '2018-09-15 03:51:49'),
(22, 'head_qa', '2018-09-15 03:52:52', '2018-09-15 03:52:52'),
(23, 'head_qc', '2018-09-15 03:53:48', '2018-09-15 03:53:48'),
(24, 'adm_qa', '2018-09-21 10:16:44', '2018-09-21 10:16:44'),
(25, 'ope', '2018-10-25 09:36:39', '2018-10-25 09:36:39'),
(26, 'adm_qc', '2018-10-27 03:28:49', '2018-10-27 03:28:49');

-- --------------------------------------------------------

--
-- Table structure for table `auth_group_department`
--

CREATE TABLE `auth_group_department` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `department_id` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auth_group_department`
--

INSERT INTO `auth_group_department` (`id`, `group_id`, `department_id`) VALUES
(1, 8, '4'),
(2, 8, '5'),
(3, 5, '4'),
(4, 5, '5');

-- --------------------------------------------------------

--
-- Table structure for table `auth_group_permission`
--

CREATE TABLE `auth_group_permission` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auth_group_permission`
--

INSERT INTO `auth_group_permission` (`id`, `group_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(18, 2, 1, '2018-04-11 07:53:55', '2018-04-11 07:53:55'),
(19, 2, 6, '2018-04-11 07:53:55', '2018-04-11 07:53:55'),
(23, 2, 2, '2018-04-11 13:39:40', '2018-04-11 13:39:40'),
(24, 2, 3, '2018-04-11 13:39:40', '2018-04-11 13:39:40'),
(25, 2, 4, '2018-04-11 13:39:40', '2018-04-11 13:39:40'),
(26, 2, 5, '2018-04-11 13:39:40', '2018-04-11 13:39:40'),
(31, 12, 10, '2018-09-15 03:30:10', '2018-09-15 03:30:10'),
(32, 12, 14, '2018-09-15 03:30:10', '2018-09-15 03:30:10'),
(38, 19, 8, '2018-09-15 03:50:37', '2018-09-15 03:50:37'),
(39, 19, 10, '2018-09-15 03:50:37', '2018-09-15 03:50:37'),
(40, 19, 12, '2018-09-15 03:50:37', '2018-09-15 03:50:37'),
(41, 19, 14, '2018-09-15 03:50:37', '2018-09-15 03:50:37'),
(42, 19, 16, '2018-09-15 03:50:37', '2018-09-15 03:50:37'),
(43, 19, 17, '2018-09-15 03:50:37', '2018-09-15 03:50:37'),
(44, 20, 18, '2018-09-15 03:51:16', '2018-09-15 03:51:16'),
(45, 20, 19, '2018-09-15 03:51:16', '2018-09-15 03:51:16'),
(46, 21, 20, '2018-09-15 03:51:49', '2018-09-15 03:51:49'),
(47, 21, 21, '2018-09-15 03:51:49', '2018-09-15 03:51:49'),
(48, 22, 10, '2018-09-15 03:52:52', '2018-09-15 03:52:52'),
(49, 22, 14, '2018-09-15 03:52:52', '2018-09-15 03:52:52'),
(50, 23, 10, '2018-09-15 03:53:48', '2018-09-15 03:53:48'),
(51, 23, 14, '2018-09-15 03:53:48', '2018-09-15 03:53:48'),
(52, 12, 3, '2018-09-15 03:59:03', '2018-09-15 03:59:03'),
(53, 24, 9, '2018-09-21 10:16:44', '2018-09-21 10:16:44'),
(54, 24, 10, '2018-09-21 10:16:44', '2018-09-21 10:16:44'),
(55, 24, 13, '2018-09-21 10:16:44', '2018-09-21 10:16:44'),
(56, 24, 14, '2018-09-21 10:16:44', '2018-09-21 10:16:44'),
(57, 25, 10, '2018-10-25 09:36:39', '2018-10-25 09:36:39'),
(58, 25, 14, '2018-10-25 09:36:40', '2018-10-25 09:36:40'),
(59, 26, 3, '2018-10-27 03:28:49', '2018-10-27 03:28:49'),
(60, 26, 9, '2018-10-27 03:28:49', '2018-10-27 03:28:49'),
(61, 26, 10, '2018-10-27 03:28:49', '2018-10-27 03:28:49'),
(62, 26, 13, '2018-10-27 03:28:50', '2018-10-27 03:28:50'),
(63, 26, 14, '2018-10-27 03:28:50', '2018-10-27 03:28:50'),
(64, 25, 9, '2018-10-27 03:55:44', '2018-10-27 03:55:44'),
(65, 25, 13, '2018-10-27 03:55:44', '2018-10-27 03:55:44');

-- --------------------------------------------------------

--
-- Table structure for table `auth_group_report`
--

CREATE TABLE `auth_group_report` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `report_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auth_group_report`
--

INSERT INTO `auth_group_report` (`id`, `group_id`, `report_id`, `created_at`, `updated_at`) VALUES
(120, 4, 1, '2018-09-15 02:24:08', '2018-09-15 02:24:08'),
(121, 9, 1, '2018-09-15 02:33:45', '2018-09-15 02:33:45'),
(122, 10, 1, '2018-09-15 02:55:28', '2018-09-15 02:55:28'),
(123, 11, 1, '2018-09-15 03:28:13', '2018-09-15 03:28:13'),
(124, 12, 1, '2018-09-15 03:30:10', '2018-09-15 03:30:10'),
(125, 12, 2, '2018-09-15 03:30:10', '2018-09-15 03:30:10'),
(126, 12, 3, '2018-09-15 03:30:11', '2018-09-15 03:30:11'),
(127, 12, 4, '2018-09-15 03:30:11', '2018-09-15 03:30:11'),
(128, 12, 5, '2018-09-15 03:30:11', '2018-09-15 03:30:11'),
(129, 12, 6, '2018-09-15 03:30:11', '2018-09-15 03:30:11'),
(131, 12, 8, '2018-09-15 03:30:11', '2018-09-15 03:30:11'),
(132, 12, 9, '2018-09-15 03:30:11', '2018-09-15 03:30:11'),
(135, 12, 12, '2018-09-15 03:30:11', '2018-09-15 03:30:11'),
(136, 12, 13, '2018-09-15 03:30:11', '2018-09-15 03:30:11'),
(140, 12, 17, '2018-09-15 03:30:11', '2018-09-15 03:30:11'),
(142, 12, 19, '2018-09-15 03:30:11', '2018-09-15 03:30:11'),
(143, 12, 20, '2018-09-15 03:30:11', '2018-09-15 03:30:11'),
(144, 12, 21, '2018-09-15 03:30:11', '2018-09-15 03:30:11'),
(145, 12, 22, '2018-09-15 03:30:11', '2018-09-15 03:30:11'),
(146, 12, 23, '2018-09-15 03:30:11', '2018-09-15 03:30:11'),
(147, 12, 24, '2018-09-15 03:30:11', '2018-09-15 03:30:11'),
(148, 12, 25, '2018-09-15 03:30:11', '2018-09-15 03:30:11'),
(151, 12, 28, '2018-09-15 03:30:11', '2018-09-15 03:30:11'),
(154, 12, 31, '2018-09-15 03:30:11', '2018-09-15 03:30:11'),
(155, 12, 32, '2018-09-15 03:30:11', '2018-09-15 03:30:11'),
(159, 12, 36, '2018-09-15 03:30:12', '2018-09-15 03:30:12'),
(161, 12, 38, '2018-09-15 03:30:12', '2018-09-15 03:30:12'),
(162, 12, 39, '2018-09-15 03:30:12', '2018-09-15 03:30:12'),
(167, 12, 44, '2018-09-15 03:30:12', '2018-09-15 03:30:12'),
(172, 12, 49, '2018-09-15 03:30:12', '2018-09-15 03:30:12'),
(176, 12, 53, '2018-09-15 03:30:12', '2018-09-15 03:30:12'),
(180, 12, 57, '2018-09-15 03:30:12', '2018-09-15 03:30:12'),
(183, 19, 1, '2018-09-15 03:50:37', '2018-09-15 03:50:37'),
(184, 19, 2, '2018-09-15 03:50:37', '2018-09-15 03:50:37'),
(185, 19, 3, '2018-09-15 03:50:37', '2018-09-15 03:50:37'),
(186, 19, 4, '2018-09-15 03:50:37', '2018-09-15 03:50:37'),
(187, 19, 5, '2018-09-15 03:50:37', '2018-09-15 03:50:37'),
(188, 19, 6, '2018-09-15 03:50:37', '2018-09-15 03:50:37'),
(189, 19, 7, '2018-09-15 03:50:37', '2018-09-15 03:50:37'),
(190, 19, 8, '2018-09-15 03:50:37', '2018-09-15 03:50:37'),
(191, 19, 9, '2018-09-15 03:50:37', '2018-09-15 03:50:37'),
(192, 19, 10, '2018-09-15 03:50:37', '2018-09-15 03:50:37'),
(193, 19, 11, '2018-09-15 03:50:37', '2018-09-15 03:50:37'),
(194, 19, 12, '2018-09-15 03:50:37', '2018-09-15 03:50:37'),
(195, 19, 13, '2018-09-15 03:50:37', '2018-09-15 03:50:37'),
(196, 19, 14, '2018-09-15 03:50:37', '2018-09-15 03:50:37'),
(197, 19, 15, '2018-09-15 03:50:37', '2018-09-15 03:50:37'),
(198, 19, 16, '2018-09-15 03:50:37', '2018-09-15 03:50:37'),
(199, 19, 17, '2018-09-15 03:50:37', '2018-09-15 03:50:37'),
(200, 19, 18, '2018-09-15 03:50:37', '2018-09-15 03:50:37'),
(201, 19, 19, '2018-09-15 03:50:37', '2018-09-15 03:50:37'),
(202, 19, 20, '2018-09-15 03:50:37', '2018-09-15 03:50:37'),
(203, 19, 21, '2018-09-15 03:50:37', '2018-09-15 03:50:37'),
(204, 19, 22, '2018-09-15 03:50:37', '2018-09-15 03:50:37'),
(205, 19, 23, '2018-09-15 03:50:37', '2018-09-15 03:50:37'),
(206, 19, 24, '2018-09-15 03:50:37', '2018-09-15 03:50:37'),
(207, 19, 25, '2018-09-15 03:50:37', '2018-09-15 03:50:37'),
(208, 19, 26, '2018-09-15 03:50:38', '2018-09-15 03:50:38'),
(210, 19, 28, '2018-09-15 03:50:38', '2018-09-15 03:50:38'),
(211, 19, 29, '2018-09-15 03:50:38', '2018-09-15 03:50:38'),
(212, 19, 30, '2018-09-15 03:50:38', '2018-09-15 03:50:38'),
(213, 19, 31, '2018-09-15 03:50:38', '2018-09-15 03:50:38'),
(214, 19, 32, '2018-09-15 03:50:38', '2018-09-15 03:50:38'),
(215, 19, 33, '2018-09-15 03:50:38', '2018-09-15 03:50:38'),
(216, 19, 34, '2018-09-15 03:50:38', '2018-09-15 03:50:38'),
(217, 19, 35, '2018-09-15 03:50:38', '2018-09-15 03:50:38'),
(218, 19, 36, '2018-09-15 03:50:38', '2018-09-15 03:50:38'),
(219, 19, 37, '2018-09-15 03:50:38', '2018-09-15 03:50:38'),
(220, 19, 38, '2018-09-15 03:50:38', '2018-09-15 03:50:38'),
(221, 19, 39, '2018-09-15 03:50:38', '2018-09-15 03:50:38'),
(222, 19, 40, '2018-09-15 03:50:38', '2018-09-15 03:50:38'),
(223, 19, 41, '2018-09-15 03:50:38', '2018-09-15 03:50:38'),
(224, 19, 42, '2018-09-15 03:50:38', '2018-09-15 03:50:38'),
(225, 19, 43, '2018-09-15 03:50:38', '2018-09-15 03:50:38'),
(226, 19, 44, '2018-09-15 03:50:38', '2018-09-15 03:50:38'),
(227, 19, 45, '2018-09-15 03:50:38', '2018-09-15 03:50:38'),
(228, 19, 46, '2018-09-15 03:50:38', '2018-09-15 03:50:38'),
(229, 19, 47, '2018-09-15 03:50:38', '2018-09-15 03:50:38'),
(230, 19, 48, '2018-09-15 03:50:38', '2018-09-15 03:50:38'),
(231, 19, 49, '2018-09-15 03:50:38', '2018-09-15 03:50:38'),
(232, 19, 50, '2018-09-15 03:50:38', '2018-09-15 03:50:38'),
(233, 19, 51, '2018-09-15 03:50:38', '2018-09-15 03:50:38'),
(234, 19, 52, '2018-09-15 03:50:38', '2018-09-15 03:50:38'),
(235, 19, 53, '2018-09-15 03:50:38', '2018-09-15 03:50:38'),
(236, 19, 54, '2018-09-15 03:50:38', '2018-09-15 03:50:38'),
(237, 19, 55, '2018-09-15 03:50:38', '2018-09-15 03:50:38'),
(238, 19, 56, '2018-09-15 03:50:38', '2018-09-15 03:50:38'),
(239, 19, 57, '2018-09-15 03:50:38', '2018-09-15 03:50:38'),
(240, 22, 1, '2018-09-15 03:52:52', '2018-09-15 03:52:52'),
(241, 22, 2, '2018-09-15 03:52:52', '2018-09-15 03:52:52'),
(242, 22, 3, '2018-09-15 03:52:52', '2018-09-15 03:52:52'),
(243, 22, 4, '2018-09-15 03:52:52', '2018-09-15 03:52:52'),
(244, 22, 5, '2018-09-15 03:52:52', '2018-09-15 03:52:52'),
(245, 22, 6, '2018-09-15 03:52:52', '2018-09-15 03:52:52'),
(246, 22, 7, '2018-09-15 03:52:52', '2018-09-15 03:52:52'),
(247, 22, 8, '2018-09-15 03:52:52', '2018-09-15 03:52:52'),
(248, 22, 9, '2018-09-15 03:52:53', '2018-09-15 03:52:53'),
(249, 22, 10, '2018-09-15 03:52:53', '2018-09-15 03:52:53'),
(250, 22, 11, '2018-09-15 03:52:53', '2018-09-15 03:52:53'),
(251, 22, 12, '2018-09-15 03:52:53', '2018-09-15 03:52:53'),
(252, 22, 13, '2018-09-15 03:52:53', '2018-09-15 03:52:53'),
(253, 22, 14, '2018-09-15 03:52:53', '2018-09-15 03:52:53'),
(254, 22, 15, '2018-09-15 03:52:53', '2018-09-15 03:52:53'),
(255, 22, 16, '2018-09-15 03:52:53', '2018-09-15 03:52:53'),
(256, 22, 17, '2018-09-15 03:52:53', '2018-09-15 03:52:53'),
(257, 22, 18, '2018-09-15 03:52:53', '2018-09-15 03:52:53'),
(258, 22, 19, '2018-09-15 03:52:53', '2018-09-15 03:52:53'),
(259, 22, 20, '2018-09-15 03:52:53', '2018-09-15 03:52:53'),
(260, 22, 21, '2018-09-15 03:52:53', '2018-09-15 03:52:53'),
(261, 22, 22, '2018-09-15 03:52:53', '2018-09-15 03:52:53'),
(262, 22, 23, '2018-09-15 03:52:53', '2018-09-15 03:52:53'),
(263, 22, 24, '2018-09-15 03:52:53', '2018-09-15 03:52:53'),
(264, 22, 25, '2018-09-15 03:52:53', '2018-09-15 03:52:53'),
(265, 22, 26, '2018-09-15 03:52:53', '2018-09-15 03:52:53'),
(266, 22, 27, '2018-09-15 03:52:53', '2018-09-15 03:52:53'),
(267, 22, 28, '2018-09-15 03:52:53', '2018-09-15 03:52:53'),
(268, 22, 29, '2018-09-15 03:52:53', '2018-09-15 03:52:53'),
(269, 22, 30, '2018-09-15 03:52:53', '2018-09-15 03:52:53'),
(270, 22, 31, '2018-09-15 03:52:53', '2018-09-15 03:52:53'),
(271, 22, 32, '2018-09-15 03:52:53', '2018-09-15 03:52:53'),
(272, 22, 33, '2018-09-15 03:52:53', '2018-09-15 03:52:53'),
(273, 22, 34, '2018-09-15 03:52:53', '2018-09-15 03:52:53'),
(274, 22, 35, '2018-09-15 03:52:53', '2018-09-15 03:52:53'),
(275, 22, 36, '2018-09-15 03:52:53', '2018-09-15 03:52:53'),
(276, 22, 37, '2018-09-15 03:52:53', '2018-09-15 03:52:53'),
(277, 22, 38, '2018-09-15 03:52:54', '2018-09-15 03:52:54'),
(278, 22, 39, '2018-09-15 03:52:54', '2018-09-15 03:52:54'),
(279, 22, 40, '2018-09-15 03:52:54', '2018-09-15 03:52:54'),
(280, 22, 41, '2018-09-15 03:52:54', '2018-09-15 03:52:54'),
(281, 22, 42, '2018-09-15 03:52:54', '2018-09-15 03:52:54'),
(282, 22, 43, '2018-09-15 03:52:54', '2018-09-15 03:52:54'),
(283, 22, 44, '2018-09-15 03:52:54', '2018-09-15 03:52:54'),
(284, 22, 45, '2018-09-15 03:52:54', '2018-09-15 03:52:54'),
(285, 22, 46, '2018-09-15 03:52:54', '2018-09-15 03:52:54'),
(286, 22, 47, '2018-09-15 03:52:54', '2018-09-15 03:52:54'),
(287, 22, 48, '2018-09-15 03:52:54', '2018-09-15 03:52:54'),
(288, 22, 49, '2018-09-15 03:52:54', '2018-09-15 03:52:54'),
(289, 22, 50, '2018-09-15 03:52:54', '2018-09-15 03:52:54'),
(290, 22, 51, '2018-09-15 03:52:54', '2018-09-15 03:52:54'),
(291, 22, 52, '2018-09-15 03:52:54', '2018-09-15 03:52:54'),
(292, 22, 53, '2018-09-15 03:52:54', '2018-09-15 03:52:54'),
(293, 22, 54, '2018-09-15 03:52:54', '2018-09-15 03:52:54'),
(294, 22, 55, '2018-09-15 03:52:54', '2018-09-15 03:52:54'),
(295, 22, 56, '2018-09-15 03:52:54', '2018-09-15 03:52:54'),
(296, 22, 57, '2018-09-15 03:52:54', '2018-09-15 03:52:54'),
(297, 23, 1, '2018-09-15 03:53:48', '2018-09-15 03:53:48'),
(298, 23, 2, '2018-09-15 03:53:49', '2018-09-15 03:53:49'),
(299, 23, 3, '2018-09-15 03:53:49', '2018-09-15 03:53:49'),
(300, 23, 4, '2018-09-15 03:53:49', '2018-09-15 03:53:49'),
(301, 23, 5, '2018-09-15 03:53:49', '2018-09-15 03:53:49'),
(302, 23, 6, '2018-09-15 03:53:49', '2018-09-15 03:53:49'),
(303, 23, 7, '2018-09-15 03:53:49', '2018-09-15 03:53:49'),
(304, 23, 8, '2018-09-15 03:53:49', '2018-09-15 03:53:49'),
(305, 23, 9, '2018-09-15 03:53:49', '2018-09-15 03:53:49'),
(306, 23, 10, '2018-09-15 03:53:49', '2018-09-15 03:53:49'),
(307, 23, 11, '2018-09-15 03:53:49', '2018-09-15 03:53:49'),
(308, 23, 12, '2018-09-15 03:53:49', '2018-09-15 03:53:49'),
(309, 23, 13, '2018-09-15 03:53:49', '2018-09-15 03:53:49'),
(310, 23, 14, '2018-09-15 03:53:49', '2018-09-15 03:53:49'),
(311, 23, 15, '2018-09-15 03:53:49', '2018-09-15 03:53:49'),
(312, 23, 16, '2018-09-15 03:53:49', '2018-09-15 03:53:49'),
(313, 23, 17, '2018-09-15 03:53:49', '2018-09-15 03:53:49'),
(314, 23, 18, '2018-09-15 03:53:49', '2018-09-15 03:53:49'),
(315, 23, 19, '2018-09-15 03:53:49', '2018-09-15 03:53:49'),
(316, 23, 20, '2018-09-15 03:53:49', '2018-09-15 03:53:49'),
(317, 23, 21, '2018-09-15 03:53:49', '2018-09-15 03:53:49'),
(318, 23, 22, '2018-09-15 03:53:49', '2018-09-15 03:53:49'),
(319, 23, 23, '2018-09-15 03:53:49', '2018-09-15 03:53:49'),
(320, 23, 24, '2018-09-15 03:53:49', '2018-09-15 03:53:49'),
(321, 23, 25, '2018-09-15 03:53:49', '2018-09-15 03:53:49'),
(322, 23, 26, '2018-09-15 03:53:49', '2018-09-15 03:53:49'),
(323, 23, 27, '2018-09-15 03:53:49', '2018-09-15 03:53:49'),
(324, 23, 28, '2018-09-15 03:53:49', '2018-09-15 03:53:49'),
(325, 23, 29, '2018-09-15 03:53:49', '2018-09-15 03:53:49'),
(326, 23, 30, '2018-09-15 03:53:50', '2018-09-15 03:53:50'),
(327, 23, 31, '2018-09-15 03:53:50', '2018-09-15 03:53:50'),
(328, 23, 32, '2018-09-15 03:53:50', '2018-09-15 03:53:50'),
(329, 23, 33, '2018-09-15 03:53:50', '2018-09-15 03:53:50'),
(330, 23, 34, '2018-09-15 03:53:50', '2018-09-15 03:53:50'),
(331, 23, 35, '2018-09-15 03:53:50', '2018-09-15 03:53:50'),
(332, 23, 36, '2018-09-15 03:53:50', '2018-09-15 03:53:50'),
(333, 23, 37, '2018-09-15 03:53:50', '2018-09-15 03:53:50'),
(334, 23, 38, '2018-09-15 03:53:50', '2018-09-15 03:53:50'),
(335, 23, 39, '2018-09-15 03:53:50', '2018-09-15 03:53:50'),
(336, 23, 40, '2018-09-15 03:53:50', '2018-09-15 03:53:50'),
(337, 23, 41, '2018-09-15 03:53:50', '2018-09-15 03:53:50'),
(338, 23, 42, '2018-09-15 03:53:50', '2018-09-15 03:53:50'),
(339, 23, 43, '2018-09-15 03:53:50', '2018-09-15 03:53:50'),
(340, 23, 44, '2018-09-15 03:53:50', '2018-09-15 03:53:50'),
(341, 23, 45, '2018-09-15 03:53:50', '2018-09-15 03:53:50'),
(342, 23, 46, '2018-09-15 03:53:50', '2018-09-15 03:53:50'),
(343, 23, 47, '2018-09-15 03:53:50', '2018-09-15 03:53:50'),
(344, 23, 48, '2018-09-15 03:53:50', '2018-09-15 03:53:50'),
(345, 23, 49, '2018-09-15 03:53:50', '2018-09-15 03:53:50'),
(346, 23, 50, '2018-09-15 03:53:50', '2018-09-15 03:53:50'),
(347, 23, 51, '2018-09-15 03:53:50', '2018-09-15 03:53:50'),
(348, 23, 52, '2018-09-15 03:53:50', '2018-09-15 03:53:50'),
(349, 23, 53, '2018-09-15 03:53:50', '2018-09-15 03:53:50'),
(350, 23, 54, '2018-09-15 03:53:50', '2018-09-15 03:53:50'),
(351, 23, 55, '2018-09-15 03:53:50', '2018-09-15 03:53:50'),
(352, 23, 56, '2018-09-15 03:53:51', '2018-09-15 03:53:51'),
(353, 23, 57, '2018-09-15 03:53:51', '2018-09-15 03:53:51'),
(354, 24, 1, '2018-09-21 10:16:44', '2018-09-21 10:16:44'),
(355, 24, 2, '2018-09-21 10:16:44', '2018-09-21 10:16:44'),
(356, 24, 3, '2018-09-21 10:16:44', '2018-09-21 10:16:44'),
(357, 24, 4, '2018-09-21 10:16:44', '2018-09-21 10:16:44'),
(358, 24, 5, '2018-09-21 10:16:44', '2018-09-21 10:16:44'),
(359, 24, 12, '2018-09-21 10:16:44', '2018-09-21 10:16:44'),
(360, 24, 20, '2018-09-21 10:16:44', '2018-09-21 10:16:44'),
(361, 24, 21, '2018-09-21 10:16:44', '2018-09-21 10:16:44'),
(362, 24, 22, '2018-09-21 10:16:44', '2018-09-21 10:16:44'),
(363, 24, 23, '2018-09-21 10:16:44', '2018-09-21 10:16:44'),
(364, 24, 24, '2018-09-21 10:16:44', '2018-09-21 10:16:44'),
(365, 24, 31, '2018-09-21 10:16:45', '2018-09-21 10:16:45'),
(368, 24, 39, '2018-09-21 10:16:45', '2018-09-21 10:16:45'),
(369, 24, 44, '2018-09-21 10:16:45', '2018-09-21 10:16:45'),
(370, 24, 49, '2018-09-21 10:16:45', '2018-09-21 10:16:45'),
(371, 24, 53, '2018-09-21 10:16:45', '2018-09-21 10:16:45'),
(372, 24, 57, '2018-09-21 10:16:45', '2018-09-21 10:16:45'),
(373, 25, 1, '2018-10-25 09:36:40', '2018-10-25 09:36:40'),
(374, 25, 2, '2018-10-25 09:36:40', '2018-10-25 09:36:40'),
(375, 25, 3, '2018-10-25 09:36:40', '2018-10-25 09:36:40'),
(376, 25, 4, '2018-10-25 09:36:40', '2018-10-25 09:36:40'),
(377, 25, 5, '2018-10-25 09:36:40', '2018-10-25 09:36:40'),
(378, 25, 6, '2018-10-25 09:36:40', '2018-10-25 09:36:40'),
(379, 25, 7, '2018-10-25 09:36:40', '2018-10-25 09:36:40'),
(380, 25, 8, '2018-10-25 09:36:40', '2018-10-25 09:36:40'),
(381, 25, 9, '2018-10-25 09:36:40', '2018-10-25 09:36:40'),
(382, 25, 10, '2018-10-25 09:36:40', '2018-10-25 09:36:40'),
(383, 25, 11, '2018-10-25 09:36:40', '2018-10-25 09:36:40'),
(384, 25, 12, '2018-10-25 09:36:40', '2018-10-25 09:36:40'),
(385, 25, 13, '2018-10-25 09:36:40', '2018-10-25 09:36:40'),
(386, 25, 14, '2018-10-25 09:36:40', '2018-10-25 09:36:40'),
(387, 25, 15, '2018-10-25 09:36:40', '2018-10-25 09:36:40'),
(388, 25, 16, '2018-10-25 09:36:40', '2018-10-25 09:36:40'),
(389, 25, 17, '2018-10-25 09:36:40', '2018-10-25 09:36:40'),
(390, 25, 18, '2018-10-25 09:36:41', '2018-10-25 09:36:41'),
(391, 25, 19, '2018-10-25 09:36:41', '2018-10-25 09:36:41'),
(392, 25, 20, '2018-10-25 09:36:41', '2018-10-25 09:36:41'),
(393, 25, 21, '2018-10-25 09:36:41', '2018-10-25 09:36:41'),
(394, 25, 22, '2018-10-25 09:36:41', '2018-10-25 09:36:41'),
(395, 25, 23, '2018-10-25 09:36:41', '2018-10-25 09:36:41'),
(396, 25, 24, '2018-10-25 09:36:41', '2018-10-25 09:36:41'),
(397, 25, 25, '2018-10-25 09:36:41', '2018-10-25 09:36:41'),
(398, 25, 26, '2018-10-25 09:36:41', '2018-10-25 09:36:41'),
(400, 25, 28, '2018-10-25 09:36:41', '2018-10-25 09:36:41'),
(401, 25, 29, '2018-10-25 09:36:42', '2018-10-25 09:36:42'),
(402, 25, 30, '2018-10-25 09:36:42', '2018-10-25 09:36:42'),
(403, 25, 31, '2018-10-25 09:36:42', '2018-10-25 09:36:42'),
(404, 25, 32, '2018-10-25 09:36:42', '2018-10-25 09:36:42'),
(405, 25, 33, '2018-10-25 09:36:42', '2018-10-25 09:36:42'),
(406, 25, 34, '2018-10-25 09:36:42', '2018-10-25 09:36:42'),
(407, 25, 35, '2018-10-25 09:36:42', '2018-10-25 09:36:42'),
(408, 25, 36, '2018-10-25 09:36:42', '2018-10-25 09:36:42'),
(409, 25, 37, '2018-10-25 09:36:42', '2018-10-25 09:36:42'),
(410, 25, 38, '2018-10-25 09:36:42', '2018-10-25 09:36:42'),
(411, 25, 39, '2018-10-25 09:36:42', '2018-10-25 09:36:42'),
(412, 25, 40, '2018-10-25 09:36:42', '2018-10-25 09:36:42'),
(413, 25, 41, '2018-10-25 09:36:42', '2018-10-25 09:36:42'),
(414, 25, 42, '2018-10-25 09:36:42', '2018-10-25 09:36:42'),
(415, 25, 43, '2018-10-25 09:36:42', '2018-10-25 09:36:42'),
(416, 25, 44, '2018-10-25 09:36:42', '2018-10-25 09:36:42'),
(417, 25, 45, '2018-10-25 09:36:42', '2018-10-25 09:36:42'),
(418, 25, 46, '2018-10-25 09:36:43', '2018-10-25 09:36:43'),
(419, 25, 47, '2018-10-25 09:36:43', '2018-10-25 09:36:43'),
(420, 25, 48, '2018-10-25 09:36:43', '2018-10-25 09:36:43'),
(421, 25, 49, '2018-10-25 09:36:43', '2018-10-25 09:36:43'),
(422, 25, 50, '2018-10-25 09:36:43', '2018-10-25 09:36:43'),
(423, 25, 51, '2018-10-25 09:36:43', '2018-10-25 09:36:43'),
(424, 25, 52, '2018-10-25 09:36:43', '2018-10-25 09:36:43'),
(425, 25, 53, '2018-10-25 09:36:43', '2018-10-25 09:36:43'),
(426, 25, 54, '2018-10-25 09:36:43', '2018-10-25 09:36:43'),
(427, 25, 55, '2018-10-25 09:36:43', '2018-10-25 09:36:43'),
(428, 25, 56, '2018-10-25 09:36:43', '2018-10-25 09:36:43'),
(429, 25, 57, '2018-10-25 09:36:43', '2018-10-25 09:36:43'),
(430, 26, 1, '2018-10-27 03:28:50', '2018-10-27 03:28:50'),
(431, 26, 2, '2018-10-27 03:28:50', '2018-10-27 03:28:50'),
(432, 26, 3, '2018-10-27 03:28:50', '2018-10-27 03:28:50'),
(433, 26, 4, '2018-10-27 03:28:50', '2018-10-27 03:28:50'),
(434, 26, 5, '2018-10-27 03:28:50', '2018-10-27 03:28:50'),
(435, 26, 8, '2018-10-27 03:28:50', '2018-10-27 03:28:50'),
(436, 26, 12, '2018-10-27 03:28:50', '2018-10-27 03:28:50'),
(437, 26, 20, '2018-10-27 03:28:50', '2018-10-27 03:28:50'),
(438, 26, 21, '2018-10-27 03:28:50', '2018-10-27 03:28:50'),
(439, 26, 22, '2018-10-27 03:28:50', '2018-10-27 03:28:50'),
(440, 26, 23, '2018-10-27 03:28:50', '2018-10-27 03:28:50'),
(441, 26, 24, '2018-10-27 03:28:50', '2018-10-27 03:28:50'),
(443, 26, 39, '2018-10-27 03:28:51', '2018-10-27 03:28:51'),
(444, 26, 44, '2018-10-27 03:28:51', '2018-10-27 03:28:51'),
(445, 26, 49, '2018-10-27 03:28:51', '2018-10-27 03:28:51'),
(446, 26, 53, '2018-10-27 03:28:51', '2018-10-27 03:28:51'),
(447, 26, 57, '2018-10-27 03:28:51', '2018-10-27 03:28:51');

-- --------------------------------------------------------

--
-- Table structure for table `auth_permission`
--

CREATE TABLE `auth_permission` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codename` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auth_permission`
--

INSERT INTO `auth_permission` (`id`, `name`, `codename`, `created_at`, `updated_at`) VALUES
(1, 'Master User', 'master_user', NULL, NULL),
(2, 'Master Department', 'master_department', NULL, NULL),
(3, 'Master Variant Product', 'master_variant_product', NULL, NULL),
(4, 'Master Shift', 'master_shift', NULL, NULL),
(5, 'Master Line', 'master_line', NULL, NULL),
(6, 'Master Auth', 'master_auth', NULL, NULL),
(7, 'Input Sample Minyak', 'input_sample_minyak', NULL, NULL),
(8, 'Approve Sample Minyak', 'approve_sample_minyak', NULL, NULL),
(9, 'View Sample Minyak', 'view_sample_minyak', NULL, NULL),
(10, 'Report Sample Minyak', 'report_sample_minyak', NULL, NULL),
(11, 'Input Sample Mie', 'input_sample_mie', NULL, NULL),
(12, 'Approve Sample Mie', 'approve_sample_mie', NULL, NULL),
(13, 'View Sample Mie', 'view_sample_mie', NULL, NULL),
(14, 'Report Sample Mie', 'report_sample_mie', NULL, NULL),
(15, 'Set Shift', 'set_shift', NULL, NULL),
(16, 'Hasil Sample Minyak', 'hasil_sample_minyak', NULL, NULL),
(17, 'Hasil Sample Mie', 'hasil_sample_mie', NULL, NULL),
(18, 'Create Sample Id Minyak', 'create_sample_minyak', NULL, NULL),
(19, 'Create Sample Id Mie', 'create_sample_mie', NULL, NULL),
(20, 'Upload Hasil Sample Minyak', 'upload_hasil_sample_minyak', NULL, NULL),
(21, 'Upload Hasil Sample Mie', 'upload_hasil_sample_mie', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_report`
--

CREATE TABLE `auth_report` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codename` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_sample` enum('MYK','MIE') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auth_report`
--

INSERT INTO `auth_report` (`id`, `name`, `codename`, `jenis_sample`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Oil Sample ID', 't_sample_minyak.id as oil_sample_id', 'MYK', 'Y', '040925749', '040925749', NULL, NULL),
(2, 'Oil Line ID', 't_sample_minyak.line_id as oil_sample_line_id', 'MYK', 'Y', '', '', NULL, NULL),
(3, 'Oil Department', 'm_department.name as department', 'MYK', 'Y', '', '', NULL, NULL),
(4, 'Oil Variant', 'm_variant_product.name as variant', 'MYK', 'Y', '', '', NULL, NULL),
(5, 'Sample Date', 't_sample_minyak.sample_date', 'MYK', 'Y', '', '', NULL, NULL),
(6, 'Create Date', 't_sample_minyak.input_date as create_date', 'MYK', 'Y', '', '', NULL, NULL),
(7, 'Input Date', 't_sample_minyak.upload_date as input_date', 'MYK', 'Y', '', '', NULL, NULL),
(8, 'Sample Time', 't_sample_minyak.sample_time', 'MYK', 'Y', '', '', NULL, NULL),
(9, 'Create Time', 't_sample_minyak.input_time as create_time', 'MYK', 'Y', '', '', NULL, NULL),
(10, 'Input Time', 't_sample_minyak.upload_time as input_time', 'MYK', 'Y', '', '', NULL, NULL),
(11, 'Input By', 't_sample_minyak.uploaded_by as input_by', 'MYK', 'Y', '', '', NULL, NULL),
(12, 'Shift', 't_sample_minyak.shift', 'MYK', 'Y', '', '', NULL, NULL),
(13, 'Approve Status', 't_sample_minyak.approve as approve_status', 'MYK', 'Y', '', '', NULL, NULL),
(14, 'Approver', 't_sample_minyak.approver', 'MYK', 'Y', '', '', NULL, NULL),
(15, 'Approve Date', 't_sample_minyak.approve_date', 'MYK', 'Y', '', '', NULL, NULL),
(16, 'Approve Time', 't_sample_minyak.approve_time', 'MYK', 'Y', '', '', NULL, NULL),
(17, 'Create By', 't_sample_minyak.created_by as create_by', 'MYK', 'Y', '', '', NULL, NULL),
(18, 'Sample Detail', 't_sample_minyak.keterangan as sample_detail', 'MYK', 'Y', '', '', NULL, NULL),
(19, 'Status', 't_sample_minyak.status', 'MYK', 'Y', '', '', NULL, NULL),
(20, 'Noodle Sample ID', 't_sample_mie.id as noodle_sample_id', 'MIE', 'Y', '040925749', '040925749', NULL, NULL),
(21, 'Noodle Line ID', 't_sample_mie.line_id as noodle_sample_line_id', 'MIE', 'Y', '', '', NULL, NULL),
(22, 'Noodle Department', 'm_department.name as department', 'MIE', 'Y', '', '', NULL, NULL),
(23, 'Noodle Variant', 'm_variant_product.name as variant', 'MIE', 'Y', '', '', NULL, NULL),
(24, 'Sample Date', 't_sample_mie.sample_date', 'MIE', 'Y', '', '', NULL, NULL),
(25, 'Create Date', 't_sample_mie.input_date as create_date', 'MIE', 'Y', '', '', NULL, NULL),
(26, 'Input Date', 't_sample_mie.upload_date as input_date', 'MIE', 'Y', '', '', NULL, NULL),
(27, 'Sample Time', 't_sample_mie.sample_time', 'MIE', 'Y', '', '', NULL, NULL),
(28, 'Create Time', 't_sample_mie.input_time as create_time', 'MIE', 'Y', '', '', NULL, NULL),
(29, 'Input Time', 't_sample_mie.upload_time as input_time', 'MIE', 'Y', '', '', NULL, NULL),
(30, 'Input By', 't_sample_mie.uploaded_by as input_by', 'MIE', 'Y', '', '', NULL, NULL),
(31, 'Shift', 't_sample_mie.shift', 'MIE', 'Y', '', '', NULL, NULL),
(32, 'Approve Status', 't_sample_mie.approve as approve_status', 'MIE', 'Y', '', '', NULL, NULL),
(33, 'Approver', 't_sample_mie.approver', 'MIE', 'Y', '', '', NULL, NULL),
(34, 'Approve Date', 't_sample_mie.approve_date', 'MIE', 'Y', '', '', NULL, NULL),
(35, 'Approve Time', 't_sample_mie.approve_time', 'MIE', 'Y', '', '', NULL, NULL),
(36, 'Create By', 't_sample_mie.created_by as create_by', 'MIE', 'Y', '', '', NULL, NULL),
(37, 'Sample Detail', 't_sample_mie.keterangan as sample_detail', 'MIE', 'Y', '', '', NULL, NULL),
(38, 'Status', 't_sample_mie.status', 'MIE', 'Y', '', '', NULL, NULL),
(39, 'Tangki', 't_pv.tangki', 'MYK', 'Y', '', '', NULL, NULL),
(40, 'Bobot Sample PV', 't_pv.bobot_sample as bobot_sample_pv', 'MYK', 'Y', '', '', NULL, NULL),
(41, 'Volume Titrasi PV', 't_pv.volume_titrasi as volume_titrasi_pv', 'MYK', 'Y', '', '', NULL, NULL),
(42, 'Normalitas PV', 't_pv.normalitas as normalitas_pv', 'MYK', 'Y', '', '', NULL, NULL),
(43, 'Faktor PV', 't_pv.faktor as faktor_pv', 'MYK', 'Y', '', '', NULL, NULL),
(44, 'Nilai PV', 't_pv.nilai as nilai_pv', 'MYK', 'Y', '', '', NULL, NULL),
(45, 'Bobot Sample ffa', 't_ffa.bobot_sample as bobot_sample_ffa', 'MYK', 'Y', '', '', NULL, NULL),
(46, 'Volume Titrasi ffa', 't_ffa.volume_titrasi as volume_titrasi_ffa', 'MYK', 'Y', '', '', NULL, NULL),
(47, 'Normalitas ffa', 't_ffa.normalitas as normalitas_ffa', 'MYK', 'Y', '', '', NULL, NULL),
(48, 'Faktor ffa', 't_ffa.faktor as faktor_ffa', 'MYK', 'Y', '', '', NULL, NULL),
(49, 'Nilai ffa', 't_ffa.nilai as nilai_ffa', 'MYK', 'Y', '', '', NULL, NULL),
(50, 'Bobot Sample FC', 't_fc.bobot_sample as bobot_sample_fc', 'MIE', 'Y', '', '', NULL, NULL),
(51, 'Labu Awal FC', 't_fc.labu_awal as labu_awal_fc', 'MIE', 'Y', '', '', NULL, NULL),
(52, 'Labu Isi FC', 't_fc.labu_isi as labu_isi_fc', 'MIE', 'Y', '', '', NULL, NULL),
(53, 'Nilai FC', 't_fc.nilai as nilai_fc', 'MIE', 'Y', '', '', NULL, NULL),
(54, 'w0 KA', 't_ka.w0 as w0_ka', 'MIE', 'Y', '', '', NULL, NULL),
(55, 'w1 KA', 't_ka.w1 as w1_ka', 'MIE', 'Y', '', '', NULL, NULL),
(56, 'w2 KA', 't_ka.w2 as w2_ka', 'MIE', 'Y', '', '', NULL, NULL),
(57, 'Nilai KA', 't_ka.nilai as nilai_ka', 'MIE', 'Y', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `changelog`
--

CREATE TABLE `changelog` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `version_number` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `bug` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `changelog`
--

INSERT INTO `changelog` (`id`, `title`, `description`, `version_number`, `date`, `bug`, `created_at`, `updated_at`) VALUES
(1, 'SOFT LAUNCHING', 'Soft launching kepada user department QA dan QC untuk dilakukan pengetesan sistem.', '1.000', '2018-09-12', 'N', NULL, NULL),
(2, 'PENGGUNAAN TOMBOL ARAH', 'Penambahan fitur penggunaan tombol arah atas, kanan, bawah dan kiri untuk memudahkan QA dalam menavigasi kolom inputan hasil analisa lab.', '1.010', '2018-09-15', 'N', NULL, NULL),
(3, 'New Bug bug ', 'bug #002 ( hasil duplo tidak muncul ).', '#002', '2018-09-18', 'Y', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `log_department`
--

CREATE TABLE `log_department` (
  `id` int(10) UNSIGNED NOT NULL,
  `dept_id` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `log_time` datetime NOT NULL,
  `action` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log_department`
--

INSERT INTO `log_department` (`id`, `dept_id`, `nik`, `log_time`, `action`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, '6', '04091725749', '2018-10-25 16:33:14', 'create', '04091725749 created dept_id 6 at 2018-10-25 16:33:14', '2018-10-25 09:33:14', '2018-10-25 09:33:14');

-- --------------------------------------------------------

--
-- Table structure for table `log_sample_mie`
--

CREATE TABLE `log_sample_mie` (
  `id` int(10) UNSIGNED NOT NULL,
  `sample_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `log_time` datetime NOT NULL,
  `action` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `labu_isi_fc` double(8,4) DEFAULT NULL,
  `labu_awal_fc` double(8,4) DEFAULT NULL,
  `bobot_sample_fc` double(8,4) DEFAULT NULL,
  `nilai_fc` double(8,4) DEFAULT NULL,
  `w0_ka` double(8,4) DEFAULT NULL,
  `w1_ka` double(8,4) DEFAULT NULL,
  `w2_ka` double(8,4) DEFAULT NULL,
  `nilai_ka` double(8,4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log_sample_minyak`
--

CREATE TABLE `log_sample_minyak` (
  `id` int(10) UNSIGNED NOT NULL,
  `sample_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `log_time` datetime NOT NULL,
  `action` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `volume_titrasi_pv` double(8,4) DEFAULT NULL,
  `bobot_sample_pv` double(8,4) DEFAULT NULL,
  `normalitas_pv` double(8,4) DEFAULT NULL,
  `faktor_pv` double(8,4) DEFAULT NULL,
  `nilai_pv` double(8,4) DEFAULT NULL,
  `volume_titrasi_ffa` double(8,4) DEFAULT NULL,
  `bobot_sample_ffa` double(8,4) DEFAULT NULL,
  `normalitas_ffa` double(8,4) DEFAULT NULL,
  `faktor_ffa` double(8,4) DEFAULT NULL,
  `nilai_ffa` double(8,4) DEFAULT NULL,
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
(2, '2018_03_09_024054_create_m_department_table', 1),
(3, '2018_03_09_024135_create_m_line_table', 1),
(4, '2018_03_09_024211_create_m_product_table', 1),
(5, '2018_03_09_024337_create_auth_group_table', 1),
(6, '2018_03_09_024424_create_auth_permission_table', 1),
(9, '2018_03_09_024727_create_t_sample_minyak_table', 1),
(10, '2018_03_09_024750_create_t_pv_table', 1),
(11, '2018_03_09_024807_create_t_ffa_table', 1),
(12, '2018_03_09_024831_create_t_sample_mie_table', 1),
(13, '2018_03_09_024901_create_t_fc_table', 1),
(14, '2018_03_09_024929_create_t_ka_table', 1),
(17, '2018_03_09_024211_create_m_variant_product_table', 2),
(19, '2018_03_09_023917_create_m_shift_table', 4),
(20, '2018_03_09_040759_create_t_shift_table', 4),
(21, '2018_03_19_035501_create_m_jam_sample_table', 5),
(22, '2018_03_09_024607_create_m_user_table', 6),
(23, '2018_03_09_024524_create_auth_group_permission_table', 7),
(24, '2018_03_25_003349_create_auth_group_department_table', 8),
(25, '2018_04_09_080956_create_log_table', 9),
(27, '2018_04_10_224527_create_log_department_table', 10),
(29, '2018_04_10_104520_create_log_sample_minyak_table', 11),
(30, '2018_04_17_161436_create_log_sample_mie_table', 12),
(33, '2018_09_09_142135_create_auth_report_table', 13),
(34, '2018_09_09_164647_create_auth_group_report_table', 13),
(35, '2018_09_15_224816_create_changelog_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `m_department`
--

CREATE TABLE `m_department` (
  `id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept_group` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_department`
--

INSERT INTO `m_department` (`id`, `name`, `status`, `dept_group`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
('1', 'ITE', 'Y', NULL, '25749', '25749', '2018-03-14 16:34:31', '2018-07-15 01:06:33'),
('2', 'PRN', 'Y', 'produksi', '25749', '25749', '2018-09-14 21:31:58', '2018-09-17 00:59:43'),
('3', 'PNC', 'Y', 'produksi', '25749', '25749', '2018-09-14 21:32:22', '2018-09-17 00:59:38'),
('4', 'QC', 'Y', NULL, '25749', '25749', '2018-09-15 02:10:22', '2018-09-15 02:10:22'),
('5', 'QA', 'Y', NULL, '25749', '25749', '2018-09-15 02:10:33', '2018-09-15 02:10:33'),
('6', 'OPE', 'Y', NULL, '25749', '25749', '2018-10-25 09:33:14', '2018-10-25 09:33:14');

-- --------------------------------------------------------

--
-- Table structure for table `m_jam_sample`
--

CREATE TABLE `m_jam_sample` (
  `id` int(10) UNSIGNED NOT NULL,
  `jam_sample` time NOT NULL,
  `created_by` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_jam_sample`
--

INSERT INTO `m_jam_sample` (`id`, `jam_sample`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '06:00:00', '04091725749', '04091725749', NULL, NULL),
(2, '07:30:00', '04091725749', '04091725749', NULL, NULL),
(3, '09:00:00', '04091725749', '04091725749', NULL, NULL),
(4, '10:30:00', '04091725749', '04091725749', NULL, NULL),
(5, '12:00:00', '04091725749', '04091725749', NULL, NULL),
(6, '13:30:00', '04091725749', '04091725749', NULL, NULL),
(7, '15:00:00', '04091725749', '04091725749', NULL, NULL),
(8, '16:30:00', '04091725749', '04091725749', NULL, NULL),
(9, '18:00:00', '04091725749', '04091725749', NULL, NULL),
(10, '19:30:00', '04091725749', '04091725749', NULL, NULL),
(11, '21:00:00', '04091725749', '04091725749', NULL, NULL),
(12, '22:30:00', '04091725749', '04091725749', NULL, NULL),
(13, '00:00:00', '04091725749', '04091725749', NULL, NULL),
(14, '01:30:00', '04091725749', '04091725749', NULL, NULL),
(15, '03:00:00', '04091725749', '04091725749', NULL, NULL),
(16, '04:30:00', '04091725749', '04091725749', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_line`
--

CREATE TABLE `m_line` (
  `id` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept_id` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_line`
--

INSERT INTO `m_line` (`id`, `dept_id`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
('BB Noodle Bag', '2', 'Y', '04091725749', '04091725749', '2018-08-18 20:32:46', '2018-08-18 20:32:46'),
('BB Noodle Cup', '3', 'Y', '04091725749', '04091725749', '2018-08-18 20:33:03', '2018-08-18 20:33:03'),
('LINE 01 BAG', '2', 'Y', '103', '103', '2018-04-13 09:22:48', '2018-04-13 09:22:48'),
('LINE 01 CUP', '3', 'Y', '103', '103', '2018-04-13 09:25:07', '2018-04-13 09:25:07'),
('LINE 02 BAG', '2', 'Y', '103', '103', '2018-04-13 09:25:23', '2018-04-13 09:25:23'),
('LINE 02 CUP', '3', 'Y', '103', '103', '2018-04-13 09:23:02', '2018-04-13 09:23:02'),
('LINE 03 BAG', '2', 'Y', '103', '103', '2018-04-13 09:25:50', '2018-04-13 09:25:50'),
('LINE 03 CUP', '3', 'Y', '103', '103', '2018-04-13 09:23:14', '2018-04-13 09:23:14'),
('LINE 04 BAG', '2', 'Y', '103', '103', '2018-04-13 09:26:10', '2018-04-13 09:26:10'),
('LINE 04 CUP', '3', 'Y', '103', '103', '2018-04-13 09:23:30', '2018-04-13 09:23:30'),
('LINE 05 BAG', '2', 'Y', '103', '103', '2018-04-13 09:26:22', '2018-04-13 09:26:22'),
('LINE 06 BAG', '2', 'Y', '103', '103', '2018-04-13 09:26:32', '2018-04-13 09:26:32'),
('LINE 07 BAG', '2', 'Y', '103', '103', '2018-04-13 09:26:41', '2018-04-13 09:26:41'),
('LINE 08 BAG', '2', 'Y', '103', '103', '2018-04-13 09:26:51', '2018-04-13 09:26:51'),
('LINE 09 BAG', '2', 'Y', '103', '103', '2018-04-13 09:27:03', '2018-04-13 09:27:03'),
('LINE 10 BAG', '2', 'Y', '04091725749', '04091725749', '2018-03-28 01:47:07', '2018-03-28 01:47:07'),
('LINE 11 BAG', '2', 'Y', '04091725749', '04091725749', '2018-03-28 01:47:16', '2018-03-28 01:47:16'),
('LINE 12 BAG', '2', 'Y', '04091725749', '04091725749', '2018-03-28 01:47:23', '2018-03-28 01:47:23'),
('LINE 13 BAG', '2', 'Y', '04091725749', '04091725749', '2018-03-28 01:47:31', '2018-03-28 01:47:31'),
('LINE 14 BAG', '2', 'Y', '04091725749', '04091725749', '2018-03-28 01:47:40', '2018-03-28 01:47:40'),
('LINE 15 BAG', '2', 'Y', '04091725749', '04091725749', '2018-03-28 01:47:48', '2018-03-28 01:47:48'),
('LINE 16 BAG', '2', 'Y', '04091725749', '04091725749', '2018-03-28 01:47:56', '2018-03-28 01:47:56'),
('LINE 17 BAG', '3', 'Y', '04091725749', '04091725749', '2018-03-28 02:22:13', '2018-03-28 02:22:13'),
('LINE 18 BAG', '3', 'Y', '04091725749', '04091725749', '2018-03-28 02:22:24', '2018-03-28 02:22:24'),
('LINE 19 BAG', '3', 'Y', '04091725749', '04091725749', '2018-03-28 02:22:34', '2018-03-28 02:22:34');

-- --------------------------------------------------------

--
-- Table structure for table `m_shift`
--

CREATE TABLE `m_shift` (
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_awal` time NOT NULL,
  `jam_akhir` time NOT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_shift`
--

INSERT INTO `m_shift` (`name`, `jam_awal`, `jam_akhir`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
('NS1', '07:00:00', '15:00:00', 'Y', '25749', '25749', '2018-03-26 23:45:02', '2018-03-26 23:45:02'),
('NS2', '15:00:00', '23:00:00', 'Y', '25749', '25749', '2018-03-26 23:46:01', '2018-03-26 23:46:01'),
('NS3', '23:00:00', '07:00:00', 'Y', '25749', '25749', '2018-03-26 23:46:29', '2018-03-26 23:46:29');

-- --------------------------------------------------------

--
-- Table structure for table `m_user`
--

CREATE TABLE `m_user` (
  `nik` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `dept_id` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept_group` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_user`
--

INSERT INTO `m_user` (`nik`, `group_id`, `dept_id`, `dept_group`, `name`, `jabatan`, `email`, `password`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`, `remember_token`) VALUES
('04091725749', 2, '1', 'superuser', 'Heri Lesmana', 'Admin', 'lezmanaherie@gmail.com', '$2y$10$1iuS48OhwQHKXPtVj3sAIeP1WmB3Q.fSu3kLP7NPTPWOsKK.G75pC', '25749', '25749', 'Y', '2018-03-22 20:55:28', '2018-10-10 09:43:48', 'cR969qCgYgwLwwUQ1lphBg4W0gMyJdoKNCNIAuraUAn77rKYg3juyz2qvbtK'),
('10108', 24, '5', NULL, 'Nur Afni', 'Admin QA', NULL, '$2y$10$WjT3Lci99zlAL/KCB7HkPudXi60Kmpz2ZhTHWHhreP8vYLO3CPepq', '25749', '25749', 'Y', '2018-09-17 01:42:28', '2018-09-21 10:37:18', 'c94VyAhRLAkMF9O5S7FZAJMVkEZspmiOniROnrYdmTR4rv5YV6owJSh42s9Y'),
('10142', 20, '4', NULL, 'Lilik Lestari', 'QC Field', NULL, '$2y$10$Sys4KukDF5g08Ebrjm5BE.H7HT5rgMpJFNfuh/s.o3YHlVwTj7Xd.', '25749', '25749', 'Y', '2018-10-26 09:05:50', '2018-10-26 09:05:50', 'Hk0VwTJjk5zNcmOtOkWEPY4h0r6DGZztK83kDaG8cKwrPAtsx3IopxTwltzh'),
('10156', 20, '4', NULL, 'Agus Setiawan', 'QC Field', NULL, '$2y$10$xyfj4Xb2fVS2kCI9gCnlSOoQBHFcibNwh9darXnBW0wV1ns66cTZm', '25749', '25749', 'Y', '2018-09-15 04:14:12', '2018-09-15 04:14:12', 'nAGvoj15RQ9rYQIfxVieIWDKBHOmxoWukWYXHNlIeegNwyKb7w5IddNQOJU5'),
('10349', 20, '4', NULL, 'Cecep Abdulloh', 'QC Field', NULL, '$2y$10$xMkB.BJDnDZTzlrjIJfpJuZF9tgSJuRot3il/ZKK2e8vhi/RtA5qu', '25749', '25749', 'Y', '2018-09-15 04:36:03', '2018-09-15 04:36:03', 'bUtSPDK8p4YTxrPwtRwLnIpYnq1ivnRtECeG0G45FHmhXxlS2Vgzs31Cdduj'),
('10466', 20, '4', NULL, 'Mohamad Faqih', 'QC Field', NULL, '$2y$10$3Wa.E5tNF3OVjR8Nkvqddufo7PDzR6ntjj8OqPK8IuO/w8kB8Holi', '25749', '25749', 'Y', '2018-09-15 04:14:35', '2018-09-15 04:14:35', 'I2wUm3B7mBHQ9uJNflc9PlGi4hIx9i8qE38FnJyVPUCeYSUJe7MAw3DL0khD'),
('10497', 20, '4', NULL, 'Meri Lestari Karuntu', 'QC Field', NULL, '$2y$10$94x3XD1iVO2tLrn.a9cPN.Q40ME4JcAXn5QCJYy3VneZ/ogC3faL2', '25749', '25749', 'Y', '2018-10-26 10:24:23', '2018-10-26 10:24:23', NULL),
('10611', 20, '4', NULL, 'Syaiful Abac Ience', 'QC Field', NULL, '$2y$10$ntrmtK/BcHPgGjswE6NGg.guMPchXZjXzCVMiTIsFy/r55pUv7rZG', '25749', '25749', 'Y', '2018-09-15 04:29:50', '2018-09-15 04:29:50', 'LMZGDPtrPhtVs2z2qLfOw2JbonnaHU0Ed5TWXjVu8lCFXk0LH8qXlmwHzgVm'),
('10690', 20, '4', NULL, 'Thiyo Nenda Samanta', 'QC Field', NULL, '$2y$10$TBJAbEcQYKl/iN8quCqCxetpOGooxiMggwsq.AWJaSW62b09pOeQy', '25749', '25749', 'Y', '2018-09-15 04:14:58', '2018-09-15 04:14:58', 'BaOBalLbPXvooqUx6e2NSXYWlsCqvHR6Js218HxLqSUDMRlBnWC09ksulXF6'),
('109', 21, '5', NULL, 'Mutmainah', 'QA Field', NULL, '$2y$10$sU3Vcc3sCpTzwsMRcTEDFuvt/5COABJ1Lyd9FN5w70ys0fKueVEqa', '25749', '25749', 'Y', '2018-09-17 01:33:38', '2018-09-17 01:33:38', 'nHjjKUbHGLmLyxRHzxXA8DCKozOr10cEVj7onm4ALmPpkN7pXFeVScLH3JDK'),
('11179', 20, '4', NULL, 'Reny Handayani', 'QC Field', NULL, '$2y$10$Yp3vGFEoQIXgwFJyg8Vz2eRQFA3gKYSl9C.VEPRtlCmyH6.6RHYYi', '25749', '25749', 'Y', '2018-09-15 04:34:56', '2018-09-15 04:34:56', '1e7UoGKEpqr38HPEN2VipRU17RHUC8NK9PkiuNuUuay2jz8T6zyOfcqXcVWQ'),
('11185', 20, '4', NULL, 'Vera Indriasari', 'QC Field', NULL, '$2y$10$Cr4rjU1WJ61QbgEjmNvLTeEkuJnY3HhnRw0Pxfh8dx1j99TuSHRK.', '25749', '25749', 'Y', '2018-10-26 09:07:12', '2018-10-26 09:07:12', '3HojKFQpM473Z2siukpl44vHGRLCmU2XhJhOV3U7TA2UtBB33veeMZ0eECwi'),
('11225', 20, '4', NULL, 'Winardi', 'QC Field', NULL, '$2y$10$Tx7IQzLwiyZ.GJBhpX2Qru/MR5RtPxJ1qat93YNeMi0p9Drrl65Tm', '25749', '25749', 'Y', '2018-09-15 04:46:55', '2018-09-15 04:46:55', 't3yM8fJugfU5B7GTwNWJ9EZWt0htuqViIrBHnTvWmJ6ypg9GGVfNkxLGmAyj'),
('11227', 26, '4', NULL, 'Ginanjar Rezki Kurniawan', 'Admin', NULL, '$2y$10$XnjgsBt46/1C9DHhwfCHluPZHp77ig78wA8jlT3QJRyOvoie9EG1C', '25749', '25749', 'Y', '2018-10-27 03:32:17', '2018-10-27 03:32:17', 'LV7roH5W1Rhh22gyYE4baHZcC1LLd3gvgfkO0g7qlGMzSLAhiwyXeQo7x7BH'),
('11279', 20, '4', NULL, 'Sherly Yulianti', 'QC Field', NULL, '$2y$10$s9T3G4j1nQ3knmpHNhZKYOusQ3VW7SHF8oJ55aKMzAS1aVYj.l7Qu', '25749', '25749', 'Y', '2018-10-26 09:03:52', '2018-10-26 09:03:52', 'lE0yEwwjbvXmlsBcrXeasza0ixkR2uvqFCCPjCm0yw0mH2U1y0eVjru3uKJE'),
('11316', 21, '5', NULL, 'Solihatun', 'QA Field', NULL, '$2y$10$I5LwF.oU6fau16zPrZv8r.0/O.6D8ReJKtli.h1jneEzzErIuCaNS', '25749', '25749', 'Y', '2018-09-17 01:38:01', '2018-09-17 01:38:01', 'fdf6IQKGWA2Ke3zI3iJQeXPBVZbrAhLMa6ovsuzY9NZ8bnYJMvgozds9MbfO'),
('11430', 21, '5', NULL, 'Maulana Ahmad', 'QA Analyst', NULL, '$2y$10$nWbP5a4uOFu1z3cliS9tqeiWHQlIACLeYG3OEn80TZ6V4N2vQ9syG', '25749', '25749', 'Y', '2018-09-17 01:34:02', '2018-10-22 08:03:55', 'OKB0bJKyPYp57rhVH6UT4sVmwikLIroad5TjbczYb4LjSqvTGod4rLoku8Zb'),
('11505', 20, '4', NULL, 'Frans Haris Jaya Pratama', 'QC Field', NULL, '$2y$10$kEmAf0eEnnVC8QJ8tvlAKuVwELfaZwkj9YFLvsLv4GvWFW3etHe2S', '25749', '25749', 'Y', '2018-09-15 04:15:20', '2018-09-15 04:15:20', 'mWJ5EUWp2YEOToVME3oQil20vSPiE7dOdhq5O9I9mQ1o7MKCpXig9KfHLaWi'),
('1187', 20, '4', NULL, 'Samsul Hadi', 'QC Field', NULL, '$2y$10$zqemZJz9bSShIumwsy9rA.dLF/1QG21g2NDv.TicnqHT4zM7rQfDu', '25749', '25749', 'Y', '2018-09-15 04:34:30', '2018-09-15 04:34:30', '1awEZhVH99bjHkfNS3haZFpdzQfA2Qqq8nQldBuLEuzgSo4gAPX3qPH99uwl'),
('12143', 20, '4', NULL, 'Ahmad Syaifuddin', 'QC Field', NULL, '$2y$10$8CGwUY9Ofw73HpLUC1AyBexHinlNL1hdEhtTxRIeCuA.hOaY98Rey', '25749', '25749', 'Y', '2018-09-15 04:15:49', '2018-09-15 04:15:49', 'gyFTRvJnZhOgFSo4mjNDhxKXEaY8brU7L8JdEpdf4Lzq7BUUR5SgAYvwtZgR'),
('12344', 20, '4', NULL, 'Dede Febri Rahmat Fauji', 'QC Field', NULL, '$2y$10$cSUCU45rMmHbPGy6cZKh3.XyFbKdv/azG/oWMDUAokd6f3VrEwToi', '25749', '25749', 'Y', '2018-10-26 10:20:32', '2018-10-26 10:20:32', 'QIRoOmPnXAB6UmibfWN6QAm56KodKkqP8GnkRnnclJWWngeFIw2tbXw7YQex'),
('12446', 20, '4', NULL, 'Soni S', 'QC Field', NULL, '$2y$10$87R6ONRv7bD4PrmlXWTZZOAom7d/8tdM7BAMl9zeYGD2S4IXsoaFi', '25749', '25749', 'Y', '2018-10-26 10:21:09', '2018-10-26 10:21:09', 'iA8QZ9fMLOJihO4is8HMEZN7COQNLCSyBEeUSlt2aGT0dGUl1VcvfDr6LYB5'),
('12449', 20, '4', NULL, 'Muchamad Ni\'am', 'QC Field', NULL, '$2y$10$mxzW8i9wWrvCzlawaiCzmOW75O5hQRXww9po.9CADFiRD4nysEpZW', '25749', '25749', 'Y', '2018-10-26 10:23:02', '2018-10-26 10:23:02', 'p3Hy8lzksZWB6u5Ih5JManW4ojJ8P7ADUn1oA5b6Mez0cvg5P8xsoxSJr9qR'),
('12755', 20, '4', NULL, 'Ahmad Agok Oktarismanto', 'QC Field', NULL, '$2y$10$JZkzA7wLxQbc0RoMiNW5l.ue4zysgpUxbSHYehpiSmiCYD6sHls4.', '25749', '25749', 'Y', '2018-10-26 10:24:45', '2018-10-26 10:24:45', 'en5SGR7eUmDI83Rhsx1eMpJVKh9LBErSUm10zcmkP2QcIthv4ZgnE7CTTiZv'),
('12837', 20, '4', NULL, 'Abdul Somad', 'QC Field', NULL, '$2y$10$Kb1pM8nqn2soEou3OCtE2uIaHihNVcJ1/9unTrICoXBCPOu2xG9Si', '25749', '25749', 'Y', '2018-09-15 04:16:12', '2018-09-15 04:16:12', '88LAK7V34a1pEo9bDWqEIDrrjef1KJmQ9njwEjiooJzCh8bMNypDQWLqiFHR'),
('12883', 20, '4', NULL, 'Tsani Fatchurochman', 'QC Field', NULL, '$2y$10$Zy7xCrR0dQvxgcNmnKKzFOi3K91WKmsqne6QezPycV6IEeArZ6hue', '25749', '25749', 'Y', '2018-09-15 04:47:59', '2018-09-15 04:47:59', 'UBXrQv00bO6rQEVFb7vhVnh2O8lBsvQ6mwxWzSIf7QkgOStvNZJWN1BbaTOK'),
('12904', 26, '4', NULL, 'Nuranilah', 'Admin', NULL, '$2y$10$N6TbcwMGY2PYwzB6r4jSvO.rqtZEjDrLlpk.12/gLcxxImnxCRbcm', '25749', '25749', 'Y', '2018-10-27 03:32:44', '2018-10-27 03:32:44', 'hoBsXfvpMlcWj4Uan1Dbsks1JVJbSJFPCJlf4rDWlUXNZLUle1aF7MgbNfRV'),
('13059', 20, '4', NULL, 'Asep Nurhidayat', 'QC Field', NULL, '$2y$10$MWfseriZCxQsiZpIYn8wP.8tO1yYVrqkIx5Wblt64SyTWX4Mct2x.', '25749', '25749', 'Y', '2018-10-26 09:06:12', '2018-10-26 09:06:12', '2eutUAOUmygVpKaAxbGFzyUSSK8UoLqX2QKi98spJwxPQySWAa9KWcqFhcLY'),
('13110', 20, '4', NULL, 'Jimi Purwanto', 'QC Field', NULL, '$2y$10$qWWISgWQaR0LNdY3UcOL/e/au2yMi4QTuASVf6Vituj9.5c7X7SHO', '25749', '25749', 'Y', '2018-09-15 04:16:34', '2018-09-15 04:16:34', 'lNPULySFe37BRMHuE394nhJhKXQEBGIiAIXDqjW5IvmYZAww0g15lTRFaVay'),
('13576', 20, '4', NULL, 'Andrian Purnama', 'QC Field', NULL, '$2y$10$3wU.zo4VYLcDNCHKoRWt2etZUNMcPgEYpO9RM0BuI/COCo.i87yXK', '25749', '25749', 'Y', '2018-09-15 04:48:20', '2018-09-15 04:48:20', 'Oy30tAprxKZIXJeOHhWcJz29g729rhHx0dVpDtofrk7CzEuiTgGkncM0EWGn'),
('13577', 20, '4', NULL, 'M Rijalul Firdaus', 'QC Field', NULL, '$2y$10$MZfvdYLIVlitjHJ8/ERt2e.aq.J1cSNeAfO1V6oG5z03/9x/.ESN2', '25749', '25749', 'Y', '2018-09-15 04:30:29', '2018-10-23 09:07:52', 'NIMc49S0eHKWENfZckvy4PwS9ZfXzQtBz4s7IWA5ZFFzcrSKsk9YxvM4jwXS'),
('13908', 20, '4', NULL, 'Agus Maulana', 'QC Field', NULL, '$2y$10$yHPGHRJoFw4twuGSJhnVlepJeiPqs2Wb.SEDIzh9/scX6UeJXiVw2', '25749', '25749', 'Y', '2018-10-26 10:07:09', '2018-10-26 10:07:09', 'jBstjelDS8HdVMWfugMn2AfsuIQIPOnJWMepAvtyhqe9amnWvpAFwrTdDdmC'),
('14250', 20, '4', NULL, 'Asep Sudirman', 'QC Field', NULL, '$2y$10$OYQOAHdUHqM.9ODP.H3J4uY0bbKfHtIA9STNQp2rjnU5yW3ku.XvC', '25749', '25749', 'Y', '2018-09-15 04:48:38', '2018-09-15 04:48:38', '12KKZhSywfvs5UgevQ7jtcNeXs5SzckfcCzE1phsjynZoGWHsT7g5ZpQwKNN'),
('14286', 20, '4', NULL, 'Arip Mustofa', 'QC Field', NULL, '$2y$10$y3y6ZGu9OL6cliMN2SmAn.06msEwaxVmF0yklg9cz1Cmeh.8J7w5C', '25749', '25749', 'Y', '2018-09-15 04:49:01', '2018-09-15 04:49:01', 'dhqne4uEE9D7MliEOgyEB87XbPw8eqAbz9FNensQMi36pnkuWSSVVDBxQs5n'),
('14783', 20, '4', NULL, 'Dhika Ferdiansyah', 'QC Field', NULL, '$2y$10$xrmJCrKBhOYKVUDlrLJUZuY5RWVNmoZkWffuI31I6unoqlc3JmhRe', '25749', '25749', 'Y', '2018-09-15 04:49:25', '2018-09-15 04:49:25', 'sBgAEYrmfNsaD6VoMVJYkMGLTBXQz49cEfuJFE3sJxAeIWLv32GaEWNF4FND'),
('14784', 19, '5', NULL, 'Bambang Rianto', 'FOREMAN', NULL, '$2y$10$/shZWVriP5qQKJ14vA7jrecaOrk5Yvyl9ZffIM9snUpka61rvAC7a', '25749', '25749', 'Y', '2018-09-17 01:30:17', '2018-09-17 01:30:17', 'cCAb2FjIaW8ZHkWPRgOXTbtfQR4YytSL5YoTWsIMhbJpxPXqeo4ypIUwUT2h'),
('14830', 21, '5', NULL, 'Marisa Pranita', 'QA Analis', NULL, '$2y$10$R94uMXAjcnIR0CsIDLSz9u8.5gIvqqYHl3yoMXJJfTkkecAFM98W2', '25749', '25749', 'Y', '2018-09-17 01:38:45', '2018-10-23 11:40:22', 'NehP9qdSVizVbpzpvP22J0T3qEr7fKWVdieRXEJ3cpzVPtoBNl9dHyFTIcrR'),
('15045', 20, '4', NULL, 'Ahmad zaenuri', 'QC Field', NULL, '$2y$10$.uBJ9kfy0o8NJHMl050pquCHuQDP3Ue5IGlAF7mOu4ET0hP4xXxXy', '25749', '25749', 'Y', '2018-09-15 04:31:16', '2018-10-30 02:10:38', 'pwgWFXvCaABpYvyDSDdOsOFC7ofLJfNzBkicnkTB9RrfgFmfhxS6AX57zzAV'),
('15046', 20, '4', NULL, 'Juliyanto', 'QC Field', NULL, '$2y$10$DHD2F6V/3LVqzqzkHfHYk.8MNWWbx4xNJ.1/3t2cRtuQEsHhv359C', '25749', '25749', 'Y', '2018-09-15 04:49:52', '2018-09-15 04:49:52', 'Q3yq5t2wblJPt4oVcTUfG7etDUz7yBodg77plafKkK2Mgj90lsqfyRSJL0db'),
('15159', 20, '4', NULL, 'Apriyansyah', 'QC Field', NULL, '$2y$10$f5wkrpZ9F9nlscO/CN0OGuMq9o3UtzjA42NAHC/4liXg3Lj.MyAEa', '25749', '25749', 'Y', '2018-10-26 09:04:17', '2018-10-26 09:04:17', 'RVPz6X5XPshtuxRi2hTlVMeNCS3dazicCsFkWt5DxHUh0CqvwySFHcgpvWEu'),
('15603', 20, '4', NULL, 'Tri Sulchan Ali', 'QC Field', NULL, '$2y$10$OLrUkJkoJm6r.05yOU6ZneR8rf5CcvhmtHKuKZz855jEOBLnGaM7m', '25749', '25749', 'Y', '2018-10-26 10:07:43', '2018-10-26 10:07:43', 'ujTXVlLet54tLFV4WpuJ6CyPZA0FiUMoPS2v2MfCWw4pcZdAKUr267IsF1wK'),
('15604', 21, '5', NULL, 'Arum Oktaviani', 'QA Field', NULL, '$2y$10$Ew8EUnM1dN1EcgTX98QAzuIfOOPPQo9MeoU7OndNNdEIWVKaQjbs6', '25749', '25749', 'Y', '2018-09-17 01:41:09', '2018-09-17 01:41:09', '4DFwX70MOdRz3ypobc8sx4I14fNIQ4mlrDwYrohaYhcm8N174DzAgQ80Em59'),
('15639', 20, '4', NULL, 'Imam Dwi P', 'QC Field', NULL, '$2y$10$cFLtJBBmNeBBb9yg9tQ0ne03DuWc2igveXNZQYs2uX6qNzZuKOWAm', '25749', '25749', 'Y', '2018-09-15 04:17:03', '2018-09-15 04:17:03', 'X4IxjWd3sjcvSogn484wkP9I9ru387e4QVqKtj1LeYkWocGpTij5aMDVvbAz'),
('16090', 21, '5', NULL, 'Wildan Naufal H', 'QA Field', NULL, '$2y$10$7cGEs9F2e.vn6BEehNaZUu8VbIaXf1bHTopfd2waX5ZvBNyYrI1b6', '25749', '25749', 'N', '2018-09-17 01:37:33', '2018-09-17 07:31:28', NULL),
('16245', 19, '5', NULL, 'Jhonni Sigiro', 'SPV', 'jhonni.sigiro@prakarsaalamsegar.com', '$2y$10$UeTkBY3wFZbdXzbqe.nRNe8cpFCckpunFa8m6b7A0zNhxnH/k3Rl.', '25749', '25749', 'Y', '2018-09-17 01:32:37', '2018-10-16 01:57:23', 'GrjMW4WbwANwsh1FIeI0B7YD2gwuwxjqycDvpW0Nh1zfMX0WUZrF9FtPQQwz'),
('16758', 20, '4', NULL, 'Timbul Hidayat', 'QC Field', NULL, '$2y$10$b7qlJP0PmRhmU2gggxWL4uGLBDfb/D1NPOB/Cgo6hLBU0mKCKpEX.', '25749', '25749', 'Y', '2018-10-26 10:08:04', '2018-10-26 10:08:04', 'uHdKZkFdgZack1c74AxKxlwBu7k8epZriKVX2Wos4ljmvaL5e35fThyLI620'),
('16759', 20, '4', NULL, 'Ichwan Pradesa Suwardji', 'QC Field', NULL, '$2y$10$jTPEOaBuIIz82304ITr9tu/7bqB6BUNeNaTkmtqoTYJsEt4SrzW0e', '25749', '25749', 'Y', '2018-10-26 10:23:16', '2018-10-26 10:23:16', 'Ke5k1zZ3GQBmQ4HnzGonMlbgAjKJmn2zvsEoJViiZEXJKjEGNS1GZCbIDHA5'),
('16806', 20, '4', NULL, 'Dulmanan', 'QC Field', NULL, '$2y$10$oZ/smQcNrGQuz9sIcIlVpu2P8jAP1cFAZ86kwMpR7439UNrTzuLtq', '25749', '25749', 'Y', '2018-10-26 10:23:31', '2018-10-26 10:23:31', 'QYVXYb7YXDIC9UPcnMJpaiwebOUKA3PdAkiGnpKDYbMNLOQL0EBrqDNz7h9f'),
('17015', 20, '4', NULL, 'Linggar Joddy Purwandy', 'QC Field', NULL, '$2y$10$QQ1Y810p75vwEfwFHwVGb.Ar/jix5czmOjPUTYlqs8e8M20UOJ/kO', '25749', '25749', 'Y', '2018-10-26 10:21:25', '2018-10-26 10:21:25', 'qkYsK8s1uaCf3cWj0G2ki2ZHgCTWy3HTnYRO4tK3KE8oe5QLPjfFp79B25oV'),
('17154', 20, '4', NULL, 'Elwin Supenta Purba', 'QC Field', NULL, '$2y$10$caeOvJZdXqlX1mXA87q6zeaVnK4pqW6e18BbEXbhD8kPpn3kZQvN.', '25749', '25749', 'Y', '2018-10-26 10:21:40', '2018-10-26 10:21:40', 'GrL7FEcWHf5YhfXnakuCKrF1thyCdrbhxShROwmssjBXmBWJWu2FIDuy1H9u'),
('17155', 20, '4', NULL, 'Budi Susilo', 'QC Field', NULL, '$2y$10$2P8QYwnKgBIAHVmgdRJtxee4GW1kFSRwsWpvMxXM3CjzOEp.zPLi6', '25749', '25749', 'Y', '2018-10-26 10:23:47', '2018-10-26 10:23:47', 'kudwpnpf3GytiNJxyb9Sffqi1W8Ox8m0SkJjjuEzCN5hBttiFIbJFx4ux9us'),
('17424', 26, '4', NULL, 'Dian Putri Piknawati', 'Admin', NULL, '$2y$10$zikCmJZC0GwG7r/L244BLu1.vK3KVF1rHMq7oh9G20FGYui3n/3KS', '25749', '25749', 'Y', '2018-10-27 03:33:53', '2018-10-27 03:33:53', 'SyHv12pVbUqeS2fgiZSokNGV2jkpp4c3OqkPX6E5J7KQzDg6PbXv2Kjrubeg'),
('18256', 20, '4', NULL, 'Syaifuddin Ngaziz', 'QC Field', NULL, '$2y$10$QGtmRH8T2EMuFnEQAaTckemAt3nMh8laTvq2uvaYiqLZ9nHDQ6hZm', '25749', '25749', 'Y', '2018-10-26 10:08:20', '2018-10-26 10:08:20', 'At7Wpj2oPtdRBFBMgnd0KpLLd4eDJJoVBpWZkUqsrWku5DKXgN4J8T2hvgiT'),
('18257', 20, '4', NULL, 'Cindy Gloria', 'QC Field', NULL, '$2y$10$B4sZrYzZq.F/G70q7OE6KuSL/pr0XUjKYU..g11RJo7ktXAjBK2EG', '25749', '25749', 'Y', '2018-09-15 04:31:38', '2018-09-15 04:31:38', 'Houb1LM2LUUz8zsEm8SJYjAt534DjsbMymZHQpiiVe4khPjg2mhN2vRjojCZ'),
('18361', 21, '5', NULL, 'Diaratna Putty Ikhsani', 'QA Analyst', NULL, '$2y$10$czFk8bRGlEpjID9JKgokf.HNGbnWoSQFWLQFM5IRWg0iL8ue/F//6', '25749', '25749', 'Y', '2018-09-17 01:34:26', '2018-10-22 08:05:40', 'bWX9d0OOrKRHibkBR2xbjrxVTvq1nN1yYjkxwWwp8QJQ6PMEJgr0665wloa8'),
('18430', 21, '5', NULL, 'Risky Amelia', 'QA Analyst', NULL, '$2y$10$w/DpFoCQKZfIGyvz0BRxveg/ER5wtzVBzOnErK3zVF5/VK3JWmWHG', '25749', '25749', 'Y', '2018-09-17 01:38:22', '2018-10-22 11:39:31', 'mo4C2jjOPu4ob7MnRzTZRQYhLlPOsaF7629OCINrZe0DZECw8HogIj8XDjpq'),
('18452', 20, '4', NULL, 'Etika Arum Pratiwi', 'QC Field', NULL, '$2y$10$dLroY4ydetpTjSdfH5wwmuLiX2.8kx7SrWJ3mPPUqfse8SdF5U4dK', '25749', '25749', 'Y', '2018-10-26 09:03:02', '2018-10-26 09:03:02', 'ypZoJQqEt9nY2j3JBJVQ0UJVv25yopDnjkcl4K4JVBgExyS87o6xVmhSM1ej'),
('18455', 21, '5', NULL, 'Faisal Hafiz', 'QA Field', NULL, '$2y$10$EC1B/6U.c0knoK.1g0ApjOPaW5v3T2DFAMsWE4kBIwv5LrfB/busq', '25749', '25749', 'Y', '2018-09-17 01:41:39', '2018-09-17 01:41:39', 'sCdd7ul0RCeAw5vDhuYALrhpEstXScqfMHyfGqFmVv9gp7uLnvEa7cOCphT7'),
('18513', 20, '4', NULL, 'Yanu Anggie Pratiwi', 'QC Field', NULL, '$2y$10$8OUiQtTMtlpN2oRFDhzeG.mfaof07KwVF211vdRBAhn0Zj67MML3G', '25749', '25749', 'Y', '2018-09-15 04:22:46', '2018-09-15 04:22:46', '7T9yVUI6NJqr4MvTjp4iPNU1cxoRMnjuUxg48oFAI7MgGEUapKZgqhfLnvlu'),
('18773', 19, '5', NULL, 'Okik Widiyatmoko', 'FOREMAN', 'okik.widiatmoko@myemail.pas', '$2y$10$GCVFCAoH6pH910cBYWSdU.j5bOfmK17zMaYIrlwuqJoVFdqYhKJWa', '25749', '25749', 'Y', '2018-09-17 01:32:14', '2018-10-30 10:23:44', 'JMcYMBqoECYTiIrl50NoRNm1pMLyCJK8UikdPTcakdtKWHL0d6UkaqSElHpu'),
('18966', 21, '5', NULL, 'Kristina F.', 'QA Field', NULL, '$2y$10$OjXstwDck2d.aCrt/Z10u.yfArqblXAUkJO0rUP.E0191XfOC/hpS', '25749', '25749', 'Y', '2018-09-17 01:40:29', '2018-09-17 01:40:29', 'yPLZX8KPrlqYbbDemJMTDEBEJ5CRin72aluvNq5ApXhIFfbSOTsMRwFbyKTX'),
('19374', 25, '6', NULL, 'Martinus', 'Supervisor', 'martinus.m@prakarsaalamsegar.com', '$2y$10$SvAlFw01OX/T0f54pEKrFeVsW43K3Uyu9EolQLtFZfyVkLtHx/8L.', '25749', '25749', 'Y', '2018-10-25 09:39:49', '2018-10-25 09:39:49', 'vJWRQEARIKQkbxEMHivh3Axh43uruXWx2s0y6RsuvMK8FlQcBtVmh4288Ttx'),
('19556', 20, '4', NULL, 'Danu Harjanto', 'QC Field', NULL, '$2y$10$uiFWyz3RoQ3v/zIsiVDtDuVPn9k7A5eAIoYTZr2NwdH3gk8oIFpzq', '25749', '25749', 'Y', '2018-10-26 10:24:04', '2018-10-26 10:24:04', '0U33movSMIVyDP8NAV8RDKiF32uMIJEkDOIF3F1xn4qInWrk1DnXt0wZIG7R'),
('19558', 20, '4', NULL, 'Wawan Purwono', 'QC Field', NULL, '$2y$10$YJhfbGtcIYnxxIJmTudm5.WI94qxhDKqB8dqf9OhWvLuVwonc372a', '25749', '25749', 'Y', '2018-09-15 04:32:02', '2018-09-15 04:32:02', 'lmhtlMDMCrUagAgKqIcfnOxJCjNHCpwlOvnPZjCOsVwkwiTZacNizr1AjyU6'),
('19690', 24, '5', NULL, 'Nurhayati Elsa Saputri', 'Admin QA', NULL, '$2y$10$6RHRss6cipIEDRTpuTk/juoCXiGjI745QfpAO8WUOH1w6og4mopei', '25749', '25749', 'Y', '2018-09-17 01:42:03', '2018-09-21 10:36:48', '0sTr0BI2HajgPG73U2z6IxGpeUYERZyPwa7GAx908njPkUA4bzOhBUvX0911'),
('19691', 20, '4', NULL, 'Lina Nurjana', 'QC Field', NULL, '$2y$10$vuxrwRJZY7jG1FI6x2hNTOQdFQsWZ5UULcCVYsBO82Vp0jTPJWMyO', '25749', '25749', 'Y', '2018-09-15 04:32:34', '2018-09-15 04:32:34', 'dqZl2Q3PzDEOS80xfgPXVENz2sxsoJRQlkW0WbWWM98SNHuuTJfIbKJqV5wc'),
('1977', 20, '4', NULL, 'Jajang Ruhimat', 'QC Field', NULL, '$2y$10$5ZBLEs/0pIO3VGvzcs0Mcez3amGLvDNKOPKjZDIPRY/TFWww9gjPC', '25749', '25749', 'Y', '2018-09-15 04:13:02', '2018-10-29 17:30:33', 'RSqtnQU9w09wnXBpLKgeZG4YSApK00XW9Ynm4FaiR5jSeJPRcFa2P8H3TcA1'),
('1981', 12, '4', NULL, 'Wawan Setiawan', 'SPV', NULL, '$2y$10$jfvS91Y8LLnMOmSBtfX3mOGzv6fadcLy5slddcqiJhxYyoJRgWpzu', '25749', '25749', 'Y', '2018-09-15 02:16:01', '2018-09-15 03:55:59', 'oiSGQhZUX3sLrSFjiQse3oxgxhBWnMqOJOFiSSTfyb1FvuAU2v6wjemeXYNP'),
('19964', 20, '4', NULL, 'Tri Arie Sadewa', 'QC Field', NULL, '$2y$10$pCABLDdbyWqpwpKltfM4lO/a0vsxJDLPRReSEgAOattHCyzSykY/K', '25749', '25749', 'Y', '2018-10-26 10:21:56', '2018-10-26 10:21:56', '6XzDEG4auORiN6BGdodbllQFtd92364UrTFZ4QBVK6MVcx3RU466JBbHaytv'),
('19988', 20, '4', NULL, 'Muhamad Agun Ramadan', 'QC Field', NULL, '$2y$10$u5033iDO5znMuXbnqJ1ZEeL63f6huCYisjlHSGT3ondhklQONvpoC', '25749', '25749', 'Y', '2018-10-26 10:08:37', '2018-10-26 10:08:37', NULL),
('20186', 19, '5', NULL, 'Ahmad Wildan Arroisi', 'FOREMAN', NULL, '$2y$10$6elWNmvgPeEOpNPT6d9OZ.BxaMBPPwhoMrMbAPEIwtbV19pfWm5ta', '25749', '25749', 'Y', '2018-09-17 01:30:48', '2018-09-17 01:30:48', 'WeYLTWhq4AZpyITJIfaoP2dRiDFq2a3dsossQapJbUcWNxTgJi7ZgyfCpKQf'),
('20250', 20, '4', NULL, 'Rizal Amin', 'QC Field', NULL, '$2y$10$g6RC4mxSiG.TWuiAJGcBuOiS3avg2hUpy6/6XGwvqQw4UA35BxEaG', '25749', '25749', 'Y', '2018-10-26 10:22:12', '2018-10-26 10:22:12', 'aHY0mRBcUGIWBW0CV0bIAteq0Ecd3xc1xhpvxgk7O5u9qqOOoPjnakuyIVtY'),
('20421', 23, '4', NULL, 'Aris Setiyani', 'DEPT HEAD', NULL, '$2y$10$q3a8zmYVW16gg3fCNjdgbu5Ch2a/lwx1eV5WNHIUG5AZ.OQTyT6z.', '25749', '25749', 'Y', '2018-09-15 02:18:45', '2018-09-15 03:56:15', 'IreXqBMCi1uy2aOh0ZwOmnHzzU7hs1aW3ogRFly73zN9oqiUjfQXDSpdxz2D'),
('20544', 20, '4', NULL, 'Agung Alphin', 'QC Field', NULL, '$2y$10$rfYR5xbEpRCJvLm.avkNhOmsude7UU4fdWMaJKlSox2pw3pN19EuO', '25749', '25749', 'Y', '2018-10-26 10:16:18', '2018-10-26 10:16:18', 'hjZ9jufcW3H8DWDoX26bY86oYRXRddjkQpbq3PLzvCpZs0x1wNtlTn366j93'),
('20665', 20, '4', NULL, 'Ria Oktaviana', 'QC Field', NULL, '$2y$10$NWYZjmYp7QEeyE9SWXkPk.2S/a9MruDvc.9MhlZAxIWazDNvWN8NC', '25749', '25749', 'Y', '2018-09-15 04:23:49', '2018-09-15 04:23:49', 'JT8fnRjDC6jOp4eLrbnfdJG2p9jeHjKoThLKSTuPM8lnuLDkCcewXyziaCdn'),
('23562', 12, '4', NULL, 'Bayu Firmansyah', 'SPV', 'bayu.firmansyah@myemail.pas', '$2y$10$QQsxaEvsONTHY4xdKyJm5e5bal1wDHxmuab5UNBeT47owzRsbmYGm', '25749', '25749', 'Y', '2018-09-15 02:17:53', '2018-10-26 01:02:16', 'prTINXx3kd8mT0pfEaLtZon4YT9wsJ1VGHhDM9rrwX3vztiEywYvStE8IARI'),
('23855', 19, '5', NULL, 'Andrian', 'FOREMAN', NULL, '$2y$10$/onEngLT6./VEBRDMsjDEO10KHNF6B0dvyk8cgm/ekNMwkHtPwWlG', '25749', '25749', 'Y', '2018-09-17 01:31:33', '2018-09-17 01:31:33', 'TerUdw0H5DuSAYm7khFRMmM52fEY0qqCSOeWbP2EnmjjUcLevYuiBU3TQcpy'),
('2389', 20, '4', NULL, 'Irma', 'QC Field', NULL, '$2y$10$3kctFa289y0lDAYvRhAk0.ILu1MO5XaX0k6Bwa31ZP/3k/bUkCtVG', '25749', '25749', 'Y', '2018-10-26 10:22:29', '2018-10-26 10:22:29', NULL),
('24649', 19, '5', NULL, 'Aldilla Ghozali', 'FOREMAN', NULL, '$2y$10$45ko87u8lKSzxAUozTSbieu4fjKvlq6mCZsjiUC60mwJh/BQhj186', '25749', '25749', 'N', '2018-09-17 01:31:55', '2018-09-17 07:31:42', NULL),
('24804', 21, '5', NULL, 'Delia Prana Bella', 'QA Field', NULL, '$2y$10$b3gomsHRTz2ep5Kg/9IdJ.E9eNwYrpREX3nI7CHFgfLOavEZ2DcuS', '25749', '25749', 'Y', '2018-09-17 01:39:43', '2018-09-17 01:39:43', 'PrVtcqV2yfRbEAcFnn5aSH8TgjlNDtSep9xa4s24NXP02WXPi4ZOLKl7yxgv'),
('25860', 12, '4', NULL, 'Fauzi Iriawan', 'SPV', NULL, '$2y$10$TA04kNUVKfVDITSWZWrsteEMzCNviYHx7p2.ycH5zB/.JVPlRnNXS', '25749', '25749', 'Y', '2018-09-15 02:18:15', '2018-09-15 03:56:30', 'csGg7bkPwV0CK4mR4lPJFGHoHAmK5wSoNx2VyNIq0d16xZNIdXhWIN3EMsvl'),
('2599', 20, '4', NULL, 'Andari Aini', 'QC Field', NULL, '$2y$10$8hsKiXwmiDCieCNI.lW47eDRoNJhJz7lMLIgkSUTXhh8Yb0/yZ5lW', '25749', '25749', 'Y', '2018-09-15 04:23:23', '2018-09-15 04:23:23', 'Oe48ziTOrQocz9Ta9dFH52yRl5s9729ThTJfmFOlA4we5zld5b6Ua7XAWN0n'),
('26796', 21, '5', NULL, 'Alveila Dzikriannisa F', 'QA Analyst', NULL, '$2y$10$FlQ2XSVqVC3GPCW2ajod6OKD0RwESP7dJk/bn.f/Uyue1FQGT/dSq', '25749', '25749', 'Y', '2018-09-17 01:34:54', '2018-10-23 04:04:19', 'ou3J6mLc6EwcqJHEi5Tlf24Oew5Doyk2JgxRnrEL3Pb6kQsHc9yTAUFNZ7o6'),
('2723', 20, '4', NULL, 'Andri Tri S', 'QC Field', NULL, '$2y$10$dnvewiZ.jKVxURrVpx8VEOQPDY8VfPzb8qJF9OTpZZxKchik7U6Di', '25749', '25749', 'Y', '2018-09-15 04:26:24', '2018-09-15 04:26:24', 'JR5i0MBHfFEPleL4hQJh9h5j8PKxaVEdBX640CptXDAIdSogduKmNKLD7oBQ'),
('2724', 19, '5', NULL, 'Prihanto Setyohadi', 'FOREMAN', NULL, '$2y$10$meTbsMhlRrTX.qLs6HFlpOrFhk1HvUqMMSPv.a/6c1zqhUIMzqoVK', '25749', '25749', 'Y', '2018-09-17 01:31:12', '2018-09-17 01:31:12', NULL),
('27886', 19, '5', NULL, 'Fadhil Satya Fajar pratama', 'FOREMAN', NULL, '$2y$10$2NPMO7cjxqlJgGBVgQAuLeqU4FKKHcm65HAE2IVXOgtA2pia2kjYm', '25749', '25749', 'Y', '2018-09-17 07:32:51', '2018-09-17 07:32:51', 'Fv3gX278oBQ2miBSlwthx0tGiD50HcF2DINcaLQBadcB4tR2UY6lRahgXN6N'),
('365', 20, '4', NULL, 'Dwi Sutanti', 'QC Field', NULL, '$2y$10$FnkJpv2rVX/NOWDE6vdGYeGqFykM/eJxI95FuwmwWXmCaF11k3d1q', '25749', '25749', 'Y', '2018-09-15 04:33:03', '2018-09-15 04:33:03', '0LxLCTVNrcCh0sDWr70layo3F5O0lLpDk69Eq1mwruA07XFHwrGHKUpPPwZg'),
('397', 12, '4', NULL, 'Reno Budi H', 'SPV', NULL, '$2y$10$Mq7TfiW9fcWxczu/cDnMpuA9Sn/y9wpb/PKSNwfOmWrJgCp.GwzKe', '25749', '25749', 'Y', '2018-09-15 02:13:58', '2018-09-15 03:56:42', 'EZKDtK8waL7PNoOmWJWBUo5pXIrULnDif5CH2SMYPbTbR5t1P0k27zBmR8Nf'),
('400', 20, '4', NULL, 'Suta Hambali', 'QC Field', NULL, '$2y$10$Y3o98eHWwbFMLZ5oKcq20.kKl6SUC7K8FYxql9pyn3Q35DRtoojPW', '25749', '25749', 'Y', '2018-09-15 04:25:26', '2018-09-15 04:25:26', '9LfAVf9HNxGUak9cB2lm73q6qUWmEaKCTFDmpoF3sp1gmhxc6m964gbr1fiu'),
('4315', 12, '4', NULL, 'Redyan Handoko', 'FOREMAN', NULL, '$2y$10$ETjz7pfFMvN.W27zdN2gre2tJE6PQwf5qCLCw2FsSPQya1F4M60b.', '25749', '25749', 'Y', '2018-09-15 02:15:08', '2018-09-15 03:56:47', 'gcAfqh42ovDrnGJgnccgGHomsCvFHi2mRQX4CieN4MNEkM0BnRUI2ac44843'),
('4316', 12, '4', NULL, 'Dwi Ariyanto B', 'SPV', NULL, '$2y$10$m4rJdooZhd.StZreUoau3.CdW7oZfFe/uC/YfhN5OPfMVfG0WYuee', '25749', '25749', 'Y', '2018-09-15 02:15:39', '2018-10-29 11:21:28', 'IlF3D1ZJ5645Jqh9rOJBCXS2WkEYwv58NGy0aypm6ezndYG0EDd6kHrh1Q1e'),
('4328', 20, '4', NULL, 'Marjuli', 'QC Field', NULL, '$2y$10$9o8kX5N8qVktfwBDDLgg5.pRoOmndQGJAxpgGVz4Lwb9p65A51tA2', '25749', '25749', 'Y', '2018-10-26 10:20:52', '2018-10-26 10:20:52', 'yZgD4Jw77pNy1vm4tPNGj3nx38Lly0sJxlMjHh26yA9R0tZI8rDzOHOc6oOV'),
('4832', 20, '4', NULL, 'Samsir Irawan', 'QC Field', NULL, '$2y$10$LHxaVukB7ZWSUq9Yhbc8rOYrX9RftSZJqCsL6R2VZXU1gE7pt/Xde', '25749', '25749', 'Y', '2018-09-15 04:26:46', '2018-10-25 09:38:22', '94dxuZoIi8WmSnnivaLgwz7Z9z6YeMvIcsJFjyTj1Cit55o9VhzZHmdkYKiQ'),
('490', 20, '4', NULL, 'Zulfi Marnis', 'QC Field', NULL, '$2y$10$8PuDDI2osCMJoSvqTi63JupMNvJYiVN6EF2L/P5J7WMewX6jQ8HF2', '25749', '25749', 'Y', '2018-09-15 04:24:56', '2018-09-15 04:24:56', 'evtrqmxJigwRk4XyKo8Zy4fgVClOwjNvE29yYKAy3uDXeni1oAl06tJXnMxJ'),
('4947', 21, '5', NULL, 'Elisabeth', 'QA Field', NULL, '$2y$10$E.6/Ymo8XaKKVLw/IGfXZOxsf80Jr0AMDn0K5Yq55tHQAOm7aLp5u', '25749', '25749', 'Y', '2018-09-17 01:39:27', '2018-09-17 01:39:27', 'cG4gT8yyH8BF9gRFSSHgPhm5zrUkunbMZ7a3kggqRt0v4SfLMHFtpjT1YI27'),
('4982', 20, '4', NULL, 'Mahmudi', 'QC Field', NULL, '$2y$10$zzKt8x6RadRVfX7y0DyNueofCHJXMoVWGiDBinSwDUBAj9RwHTz92', '25749', '25749', 'Y', '2018-09-15 04:35:41', '2018-09-15 04:35:41', 'WSwdOFqrCgqsw0GgBXS7eDRb2c4q39b6KCpLJXETHsXw5bw06BMNmWk0jr3f'),
('5151', 12, '4', NULL, 'Setyoko', 'SPV', NULL, '$2y$10$DQUYl/u2D5DJAb8DPh68e.JGq7cogL/4aqLXew0annhcHAIKdcniO', '25749', '25749', 'Y', '2018-09-15 02:14:39', '2018-09-15 03:57:04', '5jhNvtDVt5vyvBvsvFqqqL93jsE7tC7cN7vkdX0OuDHnDLc5Bvm8tUVqBmrA'),
('5318', 20, '4', NULL, 'Uswatun Diah Prananingrum', 'QC Field', NULL, '$2y$10$G5fk7ijg8AyoJD1FG6R72.KMgoKP5Ir2IXl4twRnDM6x6J55iMwtm', '25749', '25749', 'Y', '2018-10-26 09:04:41', '2018-10-26 09:04:41', 'Ky5Zao6OhP6XJwOgro34f4zrZqOTNzbzTuYuHU8qNeghkndqCNgEDzwCL4Mi'),
('5664', 20, '4', NULL, 'Sopyan Handoko', 'QC Field', NULL, '$2y$10$kLpO5hG.YOYQ.P0ixhKtleHIefyM4rtMIWGVKK8YSV9hkjiq5Hnq2', '25749', '25749', 'Y', '2018-09-15 04:13:25', '2018-09-15 04:13:25', 'lY9TaM05PVXC7HULKG9X5wlj9wj6rt3qbDfJqRGabELHgGh8hYDlUoFB6Udn'),
('5873', 20, '4', NULL, 'Ika Puspa Dewi', 'QC Field', NULL, '$2y$10$D0h/ksZgbYSjp2Vv2jtjwOpjgWKtjN55qggmmMbSEYgmrHcJN5Ytu', '25749', '25749', 'Y', '2018-10-26 09:03:26', '2018-10-26 09:03:26', '6i2w16xP0BiErgDQEmbxzyjowEWCOkRWlBKj06eMUCTajOiGMi6eFMheTzmZ'),
('7148', 12, '4', NULL, 'Muhammad Ilham W', 'Foreman', 'muhammadilham.wahyudi@myemail.pas', '$2y$10$c5cg5OBO/UmTq5hxTPdTJOdx9hhUTNjtj3j4rrfnpennTKeUqC.Q.', '25749', '25749', 'Y', '2018-09-15 02:16:40', '2018-10-03 03:17:01', 'u3ycoaCn2scdJaJuCAha1xW53sUQG37fXO27Fgo3pHo4ZVO1XIMRZdcAdh2U'),
('7400', 12, '4', NULL, 'Robbi Gunawan', 'FOREMAN', NULL, '$2y$10$q02OUluMMPd69l.67BH4zuWzpRCOl1d3l0T/z2nsEEFAQild2muuu', '25749', '25749', 'Y', '2018-09-15 02:17:04', '2018-09-15 03:57:22', 'RfM6M0jxW4GC5dQDJiCpIzcbz93uu5g3B6u5guHDrgQgWz3kCg1Mvi0FQaJi'),
('7770', 20, '4', NULL, 'Dewini', 'QC Field', NULL, '$2y$10$BRrBDYxa1Xlw9jiiNGnG5u1nx4xpsz5QWV8Szoni3OAyaP5SXCIC2', '25749', '25749', 'Y', '2018-09-15 04:24:12', '2018-09-15 04:24:12', '3tkttqI44LfcfBVAlpjr5jSzEX1Bq0XzrV9Q2MGy5TCw8Mkc10FHrpUzXS9J'),
('8072', 20, '4', NULL, 'Wawan Setiawan', 'QC Field', NULL, '$2y$10$A99KlaxX4/UD/yx/CIJzSen74rZnx7Ld1YF5fW3jtV7RjAQpI/y8C', '25749', '25749', 'Y', '2018-09-15 04:47:33', '2018-09-15 04:47:33', '9sWnAKYD82FygMoK5WaiuGjiUiHO8Fhdn5a7seKlPh60qChbnMjxLV0QlsOH'),
('8767', 20, '4', NULL, 'Budi Firmansyah', 'QC Field', NULL, '$2y$10$a5V1Z5hm0VXJJ8ipWEA6J.HZMMUgUkl05w9lyx3ozt6lsaBnmHCsu', '25749', '25749', 'Y', '2018-09-15 04:13:48', '2018-09-15 04:13:48', '37fcqNw8zkdINUTs2E5wfFkcCeO1zTOq8JemfjHHjuloSIpv1PyMlWmy3OvB'),
('8848', 20, '4', NULL, 'Ramdoni', 'QC Field', NULL, '$2y$10$3/HlBIHFF.z4kbat3brMdeivww7cJtGN0Spf/BKKVA2S9OBF4Yp7O', '25749', '25749', 'Y', '2018-09-15 04:27:10', '2018-09-15 04:27:10', 'IaPPkSgZFZf5io66XFieUmH72tOFLtw3eo4d6p1M8ZWTIXIt0TSXEmtPDBdW'),
('8849', 20, '4', NULL, 'Budi Dermawan', 'QC Field', NULL, '$2y$10$RQo/.0BLX2urOWDVHHyjm.nIGzrAVX2qCLnh7W2eENnHURU5vBPP2', '25749', '25749', 'Y', '2018-09-15 04:27:38', '2018-09-15 04:27:38', 'HS4hffmEta8szarDFoiaSDZCRvPZb2WfZkAik9UwlbmvZfKA3FAmEqJvMuHk'),
('8921', 20, '4', NULL, 'Yuga Nugraha', 'QC Field', NULL, '$2y$10$z/JTY2jYVQf43OYYAvPxTOMXutxu8UYlUgziuLtxuHkMZX.bRqW9m', '25749', '25749', 'Y', '2018-09-15 04:29:10', '2018-09-15 04:29:10', 'LkD6RHeVmnWQ9Dtu8fv0rsa6JQF8KS3Lfh1csghHVw2cESg8mdgwAxleoQFh'),
('8923', 21, '5', NULL, 'Putri Retno Hastiningrum', 'QA Field', NULL, '$2y$10$PQO7l3ood2PHKh8TW.qAoOAxymcwisWsBBq1XQpU4.gTIXxvrgrbS', '25749', '25749', 'Y', '2018-09-17 01:40:09', '2018-09-17 01:40:09', 'tLsVFebE06mU3p1GY5BJSSeBLv2M6Ulh2vjuXv8oa9oSh8u0gygecDF1UGAs'),
('9058', 21, '5', NULL, 'Khusnul Khotimah', 'QA Field', NULL, '$2y$10$ehQLWRdugdI3tGXqQwCOpOGWe42XQMWLjojEtqNN/TNcrkqF6XxGu', '25749', '25749', 'Y', '2018-09-17 01:39:05', '2018-09-17 01:39:05', NULL),
('9062', 12, '4', NULL, 'Ravi Ainul Haq', 'FOREMAN', NULL, '$2y$10$ue80i7IYjOUVSqwZXRzuNuiD7gKpTMV4iCo/4nxRgSBzyRMv2UxJa', '25749', '25749', 'Y', '2018-09-15 02:17:25', '2018-09-15 03:57:29', 'Vy8Xt0vESHBLRJpkVnWMDCdWXtJ7EXXKxlaI4XcQtRWOWwyubaS2OQZAgWt7'),
('9112', 20, '4', NULL, 'Sarifodi Hia', 'QC Field', NULL, '$2y$10$KZj1ODTROxRtWFLbzScqRet.t7TObhJsFmJgdrPZ34f2SUh2YRV6i', '25749', '25749', 'Y', '2018-09-15 04:24:35', '2018-09-15 04:24:35', 'FfgKSdKZeq5Ldp0aBJKu4toaDy2RNkk9y3Df1XVZBDTSD6e0nKSpUDD3OOuR'),
('9232', 21, '5', NULL, 'Lili Sugiarti', 'QA Analis', NULL, '$2y$10$vIvc4xUR8LNgHMlAE4H8LunSnxLFJxmObXNvq4G7xenFVP7QcpR.6', '25749', '25749', 'Y', '2018-09-17 01:33:12', '2018-10-24 02:49:28', 'loCLeCqbVKN5guVpNQzCRmiPNZFrVlZC0dB7aGkgPhOIcGc5aSxX3rLVyDfA'),
('9324', 21, '5', NULL, 'Eko Yulianto', 'QA Field', NULL, '$2y$10$0x97z1dInYbwnyYbVS/NJuG0g6oQhGny6bZqiTtB63KDbBdAXlc8i', '25749', '25749', 'Y', '2018-09-17 01:40:48', '2018-09-17 01:40:48', 'tzEpRKxR7G89rm47JN0G7m3TkEHLP3CmbnbgV5n75dumTW7jB3VRI4tFKzKP'),
('9327', 20, '4', NULL, 'Yandi Suryadi', 'QC Field', NULL, '$2y$10$NCvs5KlR5GHrNm9j.AuCpO7sCC/9nj5fXuVK2oNBxPO98X1DTb3uS', '25749', '25749', 'Y', '2018-10-26 10:22:45', '2018-10-26 10:22:45', '6b37W5R4wjSc7iulzQhGmrud9hqW7aQAvMlkdLbbu7SqQYcu0ly4UqcdQtqU'),
('9343', 20, '4', NULL, 'Yuyun Sri W', 'QC Field', NULL, '$2y$10$oaGyWJmqFuZMa74LoG1O4elP9yAVjF06i8RbvqBz2JX6yIdLcQODW', '25749', '25749', 'Y', '2018-10-26 10:20:07', '2018-10-26 10:20:07', NULL),
('9439', 20, '4', NULL, 'Irsalina Izni', 'QC Field', NULL, '$2y$10$lqhjB15VR/zfSU/9MfJ/se97bvT5VTjjW4KP52xNBBbyp.XV8Y646', '25749', '25749', 'Y', '2018-09-15 04:35:17', '2018-09-15 04:35:17', 'MZ3gyMsQElVafbHDks4Ke9iRpB0Phtd08i2tYfuZ5bfdmZntZjHrnpcwA8nk'),
('9604', 20, '4', NULL, 'Ahmad Mahifal', 'QC Field', NULL, '$2y$10$irWQpMk5R3cmLQlsGQqh9u76JAleQnScHfd.pvB4ecSfw9QfQ1zHu', '25749', '25749', 'Y', '2018-09-15 04:29:30', '2018-09-15 04:29:30', 'AmSB5sKUOSmcuUfBG2bjEVjcNXKUE2WPVh28lDa7XG7JwdTARtI6o7HIzmUt');

-- --------------------------------------------------------

--
-- Table structure for table `m_variant_product`
--

CREATE TABLE `m_variant_product` (
  `mid` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` enum('lokal','export') COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_variant_product`
--

INSERT INTO `m_variant_product` (`mid`, `name`, `status`, `jenis`, `dept`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
('1', 'BB', 'Y', 'lokal', 'PRN', '25749', '25749', '2018-09-13 04:16:15', '2018-09-17 02:15:15'),
('1020030', 'GR EXP', 'N', 'export', 'PRN', '25749', '25749', '2018-09-17 01:40:07', '2018-10-02 06:43:19'),
('1020032', 'ST EXP', 'N', 'export', 'PRN', '25749', '25749', '2018-09-17 01:40:33', '2018-10-02 07:01:36'),
('1020033', 'KA EXP', 'N', 'export', 'PRN', '25749', '25749', '2018-09-17 01:41:37', '2018-10-02 06:43:27'),
('1020043', 'EKO3KG', 'N', 'lokal', 'PRN', '25749', '25749', '2018-09-17 01:42:00', '2018-10-02 06:33:42'),
('1020044', 'SG EXP', 'N', 'export', 'PRN', '25749', '25749', '2018-09-17 01:42:19', '2018-10-02 06:59:17'),
('1020056', 'EM36', 'Y', 'lokal', 'PNC', '25749', '23562', '2018-09-17 01:44:13', '2018-10-25 02:56:57'),
('1020057', 'KS EXP', 'N', 'export', 'PRN', '25749', '25749', '2018-09-17 01:44:39', '2018-10-02 06:45:39'),
('1020092', 'BS EXP', 'N', 'export', 'PRN', '25749', '25749', '2018-09-17 01:45:09', '2018-10-02 06:43:09'),
('1020093', 'GK EXP', 'N', 'lokal', 'PRN', '25749', '25749', '2018-09-17 01:45:27', '2018-10-02 06:43:14'),
('1120081', 'GR CUP', 'Y', 'lokal', 'PNC', '25749', '25749', '2018-09-17 01:45:39', '2018-10-02 06:51:28'),
('1120083', 'SCST', 'N', 'lokal', 'PRN', '25749', '25749', '2018-09-17 01:45:56', '2018-10-02 06:55:00'),
('1120084', 'KS CUP', 'Y', 'lokal', 'PNC', '25749', '25749', '2018-09-17 01:48:49', '2018-10-02 06:53:03'),
('1120085', 'BS CUP', 'Y', 'lokal', 'PNC', '25749', '25749', '2018-09-17 01:49:28', '2018-10-02 06:48:55'),
('17000001', 'ABM', 'Y', 'export', 'PRN', '23562', '23562', '2018-10-24 23:48:36', '2018-10-24 23:48:36'),
('17000004', 'GRM', 'Y', 'export', 'PRN', '25749', '25749', '2018-09-17 01:49:39', '2018-10-02 06:55:32'),
('17000012', 'STM', 'Y', 'lokal', 'PRN', '25749', '04091725749', '2018-09-17 01:51:59', '2018-10-20 03:48:27'),
('17000756', 'SGM', 'Y', 'export', 'PRN', '23562', '23562', '2018-10-24 23:50:31', '2018-10-24 23:50:31'),
('17001871', 'AB SUPREME', 'Y', 'export', 'PNC', '25749', '23562', '2018-09-17 01:52:13', '2018-10-25 02:54:58'),
('17001872', 'GR SUPREME', 'Y', 'export', 'PNC', '25749', '23562', '2018-09-17 01:52:31', '2018-10-25 02:57:38'),
('17001873', 'ST SUPREME', 'Y', 'export', 'PNC', '25749', '23562', '2018-09-17 01:52:46', '2018-10-25 02:59:56'),
('17001881', 'ASM', 'Y', 'export', 'PRN', '25749', '25749', '2018-09-17 02:00:22', '2018-10-02 06:37:42'),
('17002254', 'SPGR5', 'N', 'export', 'PRN', '25749', '25749', '2018-09-17 02:01:05', '2018-10-02 06:59:53'),
('17002578', 'KAKAW', 'Y', 'export', 'PRN', '23562', '23562', '2018-10-24 01:49:21', '2018-10-24 01:49:21'),
('17002746', 'KAKARUK KUNING', 'Y', 'export', 'PNC', '25749', '23562', '2018-09-17 02:01:34', '2018-10-25 02:57:52'),
('17003008', 'KAKARUK MERAH', 'Y', 'export', 'PNC', '25749', '23562', '2018-09-17 02:02:19', '2018-10-25 02:58:00'),
('17003548', 'ST ARAB', 'Y', 'export', 'PNC', '25749', '23562', '2018-09-17 02:04:29', '2018-10-25 02:59:37'),
('17003550', 'GR ARAB', 'Y', 'export', 'PNC', '25749', '23562', '2018-09-17 02:04:50', '2018-10-25 02:57:06'),
('17003557', 'SPKK4X40', 'N', 'export', 'PNC', '25749', '23562', '2018-09-17 02:05:32', '2018-10-25 02:58:50'),
('17003930', 'AB ARAB', 'N', 'export', 'PNC', '25749', '23562', '2018-09-17 02:06:30', '2018-10-25 02:55:05'),
('17004147', 'BS CUP EXP', 'Y', 'export', 'PNC', '23562', '23562', '2018-11-01 01:23:18', '2018-11-01 01:23:18'),
('17004149', 'GR CUP EXP', 'N', 'export', 'PNC', '25749', '23562', '2018-09-17 02:07:11', '2018-10-25 02:57:17'),
('17004199', 'ST CUP EXP', 'Y', 'export', 'PNC', '25749', '23562', '2018-09-17 02:08:05', '2018-10-25 02:59:46'),
('17004201', 'KS CUP EXP', 'Y', 'export', 'PNC', '25749', '23562', '2018-09-17 02:08:22', '2018-11-01 01:27:07'),
('17004202', 'GR CUP EXP', 'Y', 'export', 'PNC', '25749', '23562', '2018-09-17 04:45:56', '2018-10-25 02:57:27'),
('17004203', 'BS CUP EXP', 'N', 'export', 'PNC', '25749', '23562', '2018-09-17 02:12:56', '2018-10-25 02:56:35'),
('17004556', 'GRMJ', 'Y', 'export', 'PRN', '25749', '25749', '2018-09-17 02:13:29', '2018-10-02 06:56:45'),
('17004727', 'ABT CUP EXP', 'Y', 'export', 'PNC', '25749', '23562', '2018-09-17 02:13:56', '2018-11-01 01:28:30'),
('17004744', 'GKM', 'Y', 'export', 'PRN', '23562', '23562', '2018-10-24 23:49:01', '2018-10-24 23:49:01'),
('2003', 'ST', 'Y', 'lokal', 'PNC', '23562', '23562', '2018-10-26 02:30:43', '2018-10-26 02:30:43'),
('20030', 'GR', 'Y', 'lokal', 'PRN', '25749', '25749', '2018-09-17 01:24:03', '2018-10-02 06:57:11'),
('20031', 'AB', 'Y', 'lokal', 'PNC', '25749', '1981', '2018-09-17 01:24:29', '2018-10-26 23:49:45'),
('200311', 'AB', 'Y', 'lokal', 'PRN', '23562', '23562', '2018-10-29 02:41:14', '2018-10-29 02:41:14'),
('20032', 'ST', 'Y', 'lokal', 'PRN', '25749', '25749', '2018-09-17 01:24:52', '2018-10-02 06:58:15'),
('20033', 'KA', 'Y', 'lokal', 'PNC', '25749', '1981', '2018-09-17 01:25:11', '2018-10-26 23:47:46'),
('20044', 'SG', 'Y', 'lokal', 'PRN', '25749', '25749', '2018-09-17 01:25:30', '2018-10-02 06:58:04'),
('20050', 'AS', 'Y', 'lokal', 'PNC', '25749', '23562', '2018-09-17 01:25:43', '2018-10-25 02:56:24'),
('20057', 'KS', 'Y', 'lokal', 'PRN', '25749', '25749', '2018-09-17 01:25:52', '2018-10-02 06:57:44'),
('20082', 'SCAT', 'N', 'lokal', 'PNC', '25749', '23562', '2018-09-17 01:36:38', '2018-10-25 02:58:32'),
('20088', 'SSGR', 'Y', 'lokal', 'PRN', '25749', '25749', '2018-09-17 01:36:55', '2018-09-17 01:36:55'),
('20089', 'SSAB', 'Y', 'lokal', 'PRN', '25749', '25749', '2018-09-17 01:37:10', '2018-09-17 01:37:10'),
('20091', 'SSKA', 'Y', 'lokal', 'PRN', '25749', '25749', '2018-09-17 01:37:42', '2018-09-17 01:37:42'),
('20092', 'BS', 'Y', 'lokal', 'PRN', '25749', '04091725749', '2018-09-17 01:37:55', '2018-10-10 09:42:47'),
('20093', 'GRK', 'Y', 'lokal', 'PRN', '25749', '25749', '2018-09-17 01:38:09', '2018-10-02 06:57:00'),
('20098', 'EM2', 'Y', 'lokal', 'PRN', '25749', '25749', '2018-09-17 01:38:36', '2018-09-17 01:38:36'),
('20134', 'WCR', 'Y', 'lokal', 'PRN', '25749', '25749', '2018-09-17 01:38:49', '2018-10-02 06:58:28'),
('20156', 'ABT', 'Y', 'lokal', 'PRN', '25749', '04091725749', '2018-09-17 01:39:07', '2018-10-11 06:46:37'),
('20166', 'SSKC', 'Y', 'lokal', 'PRN', '25749', '25749', '2018-09-17 01:39:21', '2018-09-17 01:39:21'),
('20192', 'GR AI', 'Y', 'lokal', 'PRN', '25749', '25749', '2018-10-02 07:04:26', '2018-10-02 07:04:26'),
('50000698', 'ST CUP', 'Y', 'lokal', 'PNC', '23562', '23562', '2018-11-01 01:20:51', '2018-11-01 01:20:51'),
('50000852', 'ABT CUP', 'Y', 'lokal', 'PNC', '23562', '23562', '2018-11-01 01:21:20', '2018-11-01 01:21:20');

-- --------------------------------------------------------

--
-- Table structure for table `t_fc`
--

CREATE TABLE `t_fc` (
  `id` int(11) NOT NULL,
  `sample_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `labu_isi` double(8,4) DEFAULT NULL,
  `labu_awal` double(8,4) DEFAULT NULL,
  `bobot_sample` double(8,4) DEFAULT NULL,
  `nilai` double(8,4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_ffa`
--

CREATE TABLE `t_ffa` (
  `id` int(20) NOT NULL,
  `sample_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tangki` enum('BKA','BKB','MP','BB') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volume_titrasi` double(8,4) DEFAULT NULL,
  `bobot_sample` double(8,4) DEFAULT NULL,
  `normalitas` double(8,4) DEFAULT NULL,
  `faktor` double(8,4) DEFAULT NULL,
  `nilai` double(8,4) DEFAULT NULL,
  `used` enum('Y','N') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_ka`
--

CREATE TABLE `t_ka` (
  `id` int(11) NOT NULL,
  `sample_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `w0` double(8,4) DEFAULT NULL,
  `w1` double(8,4) DEFAULT NULL,
  `w2` double(8,4) DEFAULT NULL,
  `nilai` double(8,4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_pv`
--

CREATE TABLE `t_pv` (
  `id` int(10) NOT NULL,
  `sample_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tangki` enum('BKA','BKB','MP','BB') COLLATE utf8mb4_unicode_ci NOT NULL,
  `volume_titrasi` double(8,4) DEFAULT NULL,
  `bobot_sample` double(8,4) DEFAULT NULL,
  `normalitas` double(8,4) DEFAULT NULL,
  `faktor` double(8,4) DEFAULT NULL,
  `nilai` double(8,2) DEFAULT NULL,
  `used` enum('Y','N') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_sample_mie`
--

CREATE TABLE `t_sample_mie` (
  `id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept_id` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mid_product` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line_id` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sample_date` date NOT NULL,
  `input_date` date NOT NULL,
  `input_time` time NOT NULL,
  `shift` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approve` enum('Y','N','') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approve_fc` enum('Y','N') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approver` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approve_date` date DEFAULT NULL,
  `approve_time` time DEFAULT NULL,
  `created_by` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upload_date` date DEFAULT NULL,
  `upload_time` time DEFAULT NULL,
  `uploaded_by` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `with_fc` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_sample_minyak`
--

CREATE TABLE `t_sample_minyak` (
  `id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line_id` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept_id` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mid_product` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sample_date` date NOT NULL,
  `input_date` date NOT NULL,
  `sample_time` time DEFAULT NULL,
  `input_time` time NOT NULL,
  `upload_date` date DEFAULT NULL,
  `upload_time` time DEFAULT NULL,
  `uploaded_by` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shift` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approve` enum('Y','N','') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approver` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approve_date` date DEFAULT NULL,
  `approve_time` time DEFAULT NULL,
  `created_by` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ulang` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `duplo` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_shift`
--

CREATE TABLE `t_shift` (
  `id` int(10) UNSIGNED NOT NULL,
  `shift_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_by` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_group`
--
ALTER TABLE `auth_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_group_department`
--
ALTER TABLE `auth_group_department`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_group_department_group_id_foreign` (`group_id`),
  ADD KEY `auth_group_department_department_id_foreign` (`department_id`);

--
-- Indexes for table `auth_group_permission`
--
ALTER TABLE `auth_group_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_group_permission_group_id_foreign` (`group_id`),
  ADD KEY `auth_group_permission_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `auth_group_report`
--
ALTER TABLE `auth_group_report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_group_report_group_id_foreign` (`group_id`),
  ADD KEY `auth_group_report_report_id_foreign` (`report_id`);

--
-- Indexes for table `auth_permission`
--
ALTER TABLE `auth_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_report`
--
ALTER TABLE `auth_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `changelog`
--
ALTER TABLE `changelog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_department`
--
ALTER TABLE `log_department`
  ADD PRIMARY KEY (`id`),
  ADD KEY `log_department_dept_id_foreign` (`dept_id`),
  ADD KEY `log_department_nik_foreign` (`nik`);

--
-- Indexes for table `log_sample_mie`
--
ALTER TABLE `log_sample_mie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `log_sample_mie_sample_id_foreign` (`sample_id`),
  ADD KEY `log_sample_mie_nik_foreign` (`nik`);

--
-- Indexes for table `log_sample_minyak`
--
ALTER TABLE `log_sample_minyak`
  ADD PRIMARY KEY (`id`),
  ADD KEY `log_sample_minyak_sample_id_foreign` (`sample_id`),
  ADD KEY `log_sample_minyak_nik_foreign` (`nik`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_department`
--
ALTER TABLE `m_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_jam_sample`
--
ALTER TABLE `m_jam_sample`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_line`
--
ALTER TABLE `m_line`
  ADD PRIMARY KEY (`id`),
  ADD KEY `m_line_dept_id_foreign` (`dept_id`);

--
-- Indexes for table `m_shift`
--
ALTER TABLE `m_shift`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `m_user_group_id_foreign` (`group_id`),
  ADD KEY `m_user_dept_id_foreign` (`dept_id`);

--
-- Indexes for table `m_variant_product`
--
ALTER TABLE `m_variant_product`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `t_fc`
--
ALTER TABLE `t_fc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `t_fc_sample_id_foreign` (`sample_id`);

--
-- Indexes for table `t_ffa`
--
ALTER TABLE `t_ffa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `t_ffa_sample_id_foreign` (`sample_id`);

--
-- Indexes for table `t_ka`
--
ALTER TABLE `t_ka`
  ADD PRIMARY KEY (`id`),
  ADD KEY `t_ka_sample_id_foreign` (`sample_id`);

--
-- Indexes for table `t_pv`
--
ALTER TABLE `t_pv`
  ADD PRIMARY KEY (`id`),
  ADD KEY `t_pv_sample_id_foreign` (`sample_id`);

--
-- Indexes for table `t_sample_mie`
--
ALTER TABLE `t_sample_mie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `t_sample_mie_dept_id_foreign` (`dept_id`),
  ADD KEY `t_sample_mie_mid_product_foreign` (`mid_product`),
  ADD KEY `shift` (`shift`),
  ADD KEY `line_id` (`line_id`);

--
-- Indexes for table `t_sample_minyak`
--
ALTER TABLE `t_sample_minyak`
  ADD PRIMARY KEY (`id`),
  ADD KEY `t_sample_minyak_line_id_foreign` (`line_id`),
  ADD KEY `t_sample_minyak_dept_id_foreign` (`dept_id`),
  ADD KEY `t_sample_minyak_mid_product_foreign` (`mid_product`),
  ADD KEY `shift` (`shift`);

--
-- Indexes for table `t_shift`
--
ALTER TABLE `t_shift`
  ADD PRIMARY KEY (`id`),
  ADD KEY `t_shift_shift_name_foreign` (`shift_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_group`
--
ALTER TABLE `auth_group`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `auth_group_department`
--
ALTER TABLE `auth_group_department`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `auth_group_permission`
--
ALTER TABLE `auth_group_permission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `auth_group_report`
--
ALTER TABLE `auth_group_report`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=448;

--
-- AUTO_INCREMENT for table `auth_permission`
--
ALTER TABLE `auth_permission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `auth_report`
--
ALTER TABLE `auth_report`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `changelog`
--
ALTER TABLE `changelog`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `log_department`
--
ALTER TABLE `log_department`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log_sample_mie`
--
ALTER TABLE `log_sample_mie`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_sample_minyak`
--
ALTER TABLE `log_sample_minyak`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `m_jam_sample`
--
ALTER TABLE `m_jam_sample`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `t_fc`
--
ALTER TABLE `t_fc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_ffa`
--
ALTER TABLE `t_ffa`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_ka`
--
ALTER TABLE `t_ka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_pv`
--
ALTER TABLE `t_pv`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_shift`
--
ALTER TABLE `t_shift`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_group_permission`
--
ALTER TABLE `auth_group_permission`
  ADD CONSTRAINT `auth_group_permission_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_group` (`id`),
  ADD CONSTRAINT `auth_group_permission_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permission` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
