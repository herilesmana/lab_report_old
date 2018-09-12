-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2018 at 04:15 AM
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
-- Database: `db_lab_report`
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
(1, 'superuser', NULL, NULL),
(2, 'default', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_group_permision`
--

CREATE TABLE `auth_group_permision` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(7, '2018_03_09_024524_create_auth_group_permission_table', 1),
(9, '2018_03_09_024727_create_t_sample_minyak_table', 1),
(10, '2018_03_09_024750_create_t_pv_table', 1),
(11, '2018_03_09_024807_create_t_ffa_table', 1),
(12, '2018_03_09_024831_create_t_sample_mie_table', 1),
(13, '2018_03_09_024901_create_t_fc_table', 1),
(14, '2018_03_09_024929_create_t_ka_table', 1),
(17, '2018_03_09_024211_create_m_variant_product_table', 2),
(18, '2018_03_09_024607_create_m_user_table', 3),
(19, '2018_03_09_023917_create_m_shift_table', 4),
(20, '2018_03_09_040759_create_t_shift_table', 4),
(21, '2018_03_19_035501_create_m_jam_sample_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `m_department`
--

CREATE TABLE `m_department` (
  `id` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_department`
--

INSERT INTO `m_department` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
('1', 'ITE', 'Y', '25749', '25749', '2018-03-14 23:34:31', '2018-03-15 03:04:20');

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
  `id` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept_id` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_product`
--

CREATE TABLE `m_product` (
  `mid` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
('NORMAL SHIFT 1', '07:00:00', '15:00:00', 'Y', '25749', '25749', '2018-03-16 03:21:25', '2018-03-16 03:27:08'),
('NORMAL SHIFT 2', '15:00:00', '23:00:00', 'Y', '25749', '25749', '2018-03-16 03:23:34', '2018-03-16 03:27:11'),
('NORMAL SHIFT 3', '23:00:00', '07:00:00', 'Y', '25749', '25749', '2018-03-16 03:24:02', '2018-03-16 03:27:04'),
('SHORT SHIFT 1', '07:00:00', '12:00:00', 'Y', '25749', '25749', '2018-03-16 03:25:11', '2018-03-16 03:25:11'),
('SHORT SHIFT 2', '12:00:00', '17:00:00', 'Y', '25749', '25749', '2018-03-16 03:25:31', '2018-03-16 03:25:31'),
('SHORT SHIFT 3', '17:00:00', '22:00:00', 'Y', '25749', '25749', '2018-03-16 03:26:17', '2018-03-16 03:26:17');

-- --------------------------------------------------------

--
-- Table structure for table `m_user`
--

CREATE TABLE `m_user` (
  `nik` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `dept_id` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_user`
--

INSERT INTO `m_user` (`nik`, `group_id`, `dept_id`, `name`, `jabatan`, `email`, `password`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`) VALUES
('04091725742', 2, '1', 'Aris Purwadi', 'Supervisor', 'aris.purwadi@prakarsaalamsegar.com', '$2y$10$qU3jXMiOT7bRe3hZA/fL9.VMq25NKX5HM2fRaqytEU7m3TGAaENl.', '25749', '25749', 'Y', '2018-03-18 19:25:23', '2018-03-18 19:25:23'),
('04091725749', 2, '1', 'Heri Lesmana', 'Admin', 'lezmanaherie@gmail.com', '$2y$10$Oy7kAHP2Or8EvMTYv2mgxukABa4QDSX9iLsGfY7P6le05jLmlaAI2', '25749', '25749', 'Y', '2018-03-15 22:57:32', '2018-03-15 22:57:44'),
('040925750', 2, '1', 'Muhammad Machbub Marzuqi', 'Foreman', 'muhammadmachbubmarzuqie@prakarsaalamsegar.com', '$2y$10$FRJw5TYriFCGq3pVqyF2ZuC81rZPoR8Qa2ZrKANjAhnIEese6KBiS', '25749', '25749', 'Y', '2018-03-15 20:14:54', '2018-03-15 22:56:41');

-- --------------------------------------------------------

--
-- Table structure for table `m_variant_product`
--

CREATE TABLE `m_variant_product` (
  `mid` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_variant_product`
--

INSERT INTO `m_variant_product` (`mid`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
('1001', 'Soto', 'Y', '25749', '25749', '2018-03-15 00:10:56', '2018-03-15 00:11:47'),
('10110', 'Goreng', 'Y', '25749', '25749', '2018-03-15 00:12:03', '2018-03-15 00:12:07');

-- --------------------------------------------------------

--
-- Table structure for table `t_fc`
--

CREATE TABLE `t_fc` (
  `id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sample_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `labu_isi` double(8,4) NOT NULL,
  `labu_awal` double(8,4) NOT NULL,
  `bobot_sample` double(8,4) NOT NULL,
  `nilai` double(8,4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_ffa`
--

CREATE TABLE `t_ffa` (
  `id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sample_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tangki` enum('A','B','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `volume_titrasi` double(8,4) NOT NULL,
  `bobot_sample` double(8,4) NOT NULL,
  `normalitas` double(8,4) NOT NULL,
  `faktor` double(8,4) NOT NULL,
  `nilai` double(8,4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_ka`
--

CREATE TABLE `t_ka` (
  `id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sample_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `w0` double(8,4) NOT NULL,
  `w1` double(8,4) NOT NULL,
  `w2` double(8,4) NOT NULL,
  `nilai` double(8,4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_pv`
--

CREATE TABLE `t_pv` (
  `id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sample_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tangki` enum('A','B','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `volume_titrasi` double(8,4) NOT NULL,
  `bobot_sample` double(8,4) NOT NULL,
  `normalitas` double(8,4) NOT NULL,
  `faktor` double(8,4) NOT NULL,
  `nilai` double(8,4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_sample_mie`
--

CREATE TABLE `t_sample_mie` (
  `id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line_id` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept_id` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mid_product` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sample_date` date NOT NULL,
  `input_date` date NOT NULL,
  `sample_time` time NOT NULL,
  `input_time` time NOT NULL,
  `shift` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approve` enum('Y','N','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `approver` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approve_date` date NOT NULL,
  `approve_time` time NOT NULL,
  `created_by` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_sample_minyak`
--

CREATE TABLE `t_sample_minyak` (
  `id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line_id` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept_id` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mid_product` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sample_date` date NOT NULL,
  `input_date` date NOT NULL,
  `sample_time` time NOT NULL,
  `input_time` time NOT NULL,
  `shift` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` enum('BK','BB','proses') COLLATE utf8mb4_unicode_ci NOT NULL,
  `approve` enum('Y','N','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `approver` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approve_date` date NOT NULL,
  `approve_time` time NOT NULL,
  `created_by` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Indexes for table `auth_group_permision`
--
ALTER TABLE `auth_group_permision`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_group_permision_group_id_foreign` (`group_id`),
  ADD KEY `auth_group_permision_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `auth_permission`
--
ALTER TABLE `auth_permission`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `m_product`
--
ALTER TABLE `m_product`
  ADD PRIMARY KEY (`mid`);

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
  ADD KEY `t_sample_mie_line_id_foreign` (`line_id`),
  ADD KEY `t_sample_mie_dept_id_foreign` (`dept_id`),
  ADD KEY `t_sample_mie_mid_product_foreign` (`mid_product`);

--
-- Indexes for table `t_sample_minyak`
--
ALTER TABLE `t_sample_minyak`
  ADD PRIMARY KEY (`id`),
  ADD KEY `t_sample_minyak_line_id_foreign` (`line_id`),
  ADD KEY `t_sample_minyak_dept_id_foreign` (`dept_id`),
  ADD KEY `t_sample_minyak_mid_product_foreign` (`mid_product`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth_group_permision`
--
ALTER TABLE `auth_group_permision`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_permission`
--
ALTER TABLE `auth_permission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `m_jam_sample`
--
ALTER TABLE `m_jam_sample`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `t_shift`
--
ALTER TABLE `t_shift`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_group_permision`
--
ALTER TABLE `auth_group_permision`
  ADD CONSTRAINT `auth_group_permision_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_group` (`id`),
  ADD CONSTRAINT `auth_group_permision_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permission` (`id`);

--
-- Constraints for table `m_line`
--
ALTER TABLE `m_line`
  ADD CONSTRAINT `m_line_dept_id_foreign` FOREIGN KEY (`dept_id`) REFERENCES `m_department` (`id`);

--
-- Constraints for table `m_user`
--
ALTER TABLE `m_user`
  ADD CONSTRAINT `m_user_dept_id_foreign` FOREIGN KEY (`dept_id`) REFERENCES `m_department` (`id`),
  ADD CONSTRAINT `m_user_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_group` (`id`);

--
-- Constraints for table `t_fc`
--
ALTER TABLE `t_fc`
  ADD CONSTRAINT `t_fc_sample_id_foreign` FOREIGN KEY (`sample_id`) REFERENCES `t_sample_mie` (`id`);

--
-- Constraints for table `t_ffa`
--
ALTER TABLE `t_ffa`
  ADD CONSTRAINT `t_ffa_sample_id_foreign` FOREIGN KEY (`sample_id`) REFERENCES `t_sample_minyak` (`id`);

--
-- Constraints for table `t_ka`
--
ALTER TABLE `t_ka`
  ADD CONSTRAINT `t_ka_sample_id_foreign` FOREIGN KEY (`sample_id`) REFERENCES `t_sample_mie` (`id`);

--
-- Constraints for table `t_pv`
--
ALTER TABLE `t_pv`
  ADD CONSTRAINT `t_pv_sample_id_foreign` FOREIGN KEY (`sample_id`) REFERENCES `t_sample_minyak` (`id`);

--
-- Constraints for table `t_sample_mie`
--
ALTER TABLE `t_sample_mie`
  ADD CONSTRAINT `t_sample_mie_dept_id_foreign` FOREIGN KEY (`dept_id`) REFERENCES `m_department` (`id`),
  ADD CONSTRAINT `t_sample_mie_line_id_foreign` FOREIGN KEY (`line_id`) REFERENCES `m_line` (`id`),
  ADD CONSTRAINT `t_sample_mie_mid_product_foreign` FOREIGN KEY (`mid_product`) REFERENCES `m_product` (`mid`);

--
-- Constraints for table `t_sample_minyak`
--
ALTER TABLE `t_sample_minyak`
  ADD CONSTRAINT `t_sample_minyak_dept_id_foreign` FOREIGN KEY (`dept_id`) REFERENCES `m_department` (`id`),
  ADD CONSTRAINT `t_sample_minyak_line_id_foreign` FOREIGN KEY (`line_id`) REFERENCES `m_line` (`id`),
  ADD CONSTRAINT `t_sample_minyak_mid_product_foreign` FOREIGN KEY (`mid_product`) REFERENCES `m_product` (`mid`);

--
-- Constraints for table `t_shift`
--
ALTER TABLE `t_shift`
  ADD CONSTRAINT `t_shift_shift_name_foreign` FOREIGN KEY (`shift_name`) REFERENCES `m_shift` (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
