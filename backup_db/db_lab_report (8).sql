-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 16 Apr 2018 pada 02.39
-- Versi Server: 10.1.24-MariaDB
-- PHP Version: 7.1.6

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
-- Struktur dari tabel `auth_group`
--

CREATE TABLE `auth_group` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `auth_group`
--

INSERT INTO `auth_group` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'superuser', NULL, NULL),
(2, 'default', NULL, NULL),
(5, 'analyst_qa', '2018-04-11 13:40:52', '2018-04-11 13:40:52'),
(7, 'foreman_qa', '2018-04-11 13:42:05', '2018-04-11 13:42:05'),
(8, 'qc_lapangan', '2018-04-11 23:54:05', '2018-04-11 23:54:05'),
(9, 'qa_analyst', '2018-04-11 23:54:28', '2018-04-11 23:54:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_group_department`
--

CREATE TABLE `auth_group_department` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `department_id` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_group_permission`
--

CREATE TABLE `auth_group_permission` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `auth_group_permission`
--

INSERT INTO `auth_group_permission` (`id`, `group_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(16, 1, 1, '2018-04-11 07:53:10', '2018-04-11 07:53:10'),
(17, 1, 6, '2018-04-11 07:53:10', '2018-04-11 07:53:10'),
(18, 2, 1, '2018-04-11 07:53:55', '2018-04-11 07:53:55'),
(19, 2, 6, '2018-04-11 07:53:55', '2018-04-11 07:53:55'),
(23, 2, 2, '2018-04-11 13:39:40', '2018-04-11 13:39:40'),
(24, 2, 3, '2018-04-11 13:39:40', '2018-04-11 13:39:40'),
(25, 2, 4, '2018-04-11 13:39:40', '2018-04-11 13:39:40'),
(26, 2, 5, '2018-04-11 13:39:40', '2018-04-11 13:39:40'),
(27, 5, 20, '2018-04-11 13:40:52', '2018-04-11 13:40:52'),
(28, 5, 21, '2018-04-11 13:40:52', '2018-04-11 13:40:52'),
(31, 7, 3, '2018-04-11 13:42:05', '2018-04-11 13:42:05'),
(32, 7, 5, '2018-04-11 13:42:05', '2018-04-11 13:42:05'),
(33, 7, 8, '2018-04-11 13:42:05', '2018-04-11 13:42:05'),
(34, 7, 9, '2018-04-11 13:42:05', '2018-04-11 13:42:05'),
(35, 7, 10, '2018-04-11 13:42:05', '2018-04-11 13:42:05'),
(37, 7, 12, '2018-04-11 13:42:06', '2018-04-11 13:42:06'),
(38, 7, 13, '2018-04-11 13:42:06', '2018-04-11 13:42:06'),
(39, 7, 14, '2018-04-11 13:42:06', '2018-04-11 13:42:06'),
(40, 7, 16, '2018-04-11 13:42:06', '2018-04-11 13:42:06'),
(41, 7, 17, '2018-04-11 13:42:06', '2018-04-11 13:42:06'),
(47, 1, 2, '2018-04-11 23:53:06', '2018-04-11 23:53:06'),
(48, 1, 3, '2018-04-11 23:53:06', '2018-04-11 23:53:06'),
(49, 1, 4, '2018-04-11 23:53:06', '2018-04-11 23:53:06'),
(50, 1, 5, '2018-04-11 23:53:06', '2018-04-11 23:53:06'),
(53, 1, 9, '2018-04-11 23:53:06', '2018-04-11 23:53:06'),
(54, 1, 10, '2018-04-11 23:53:06', '2018-04-11 23:53:06'),
(57, 1, 13, '2018-04-11 23:53:06', '2018-04-11 23:53:06'),
(58, 1, 14, '2018-04-11 23:53:06', '2018-04-11 23:53:06'),
(59, 1, 15, '2018-04-11 23:53:06', '2018-04-11 23:53:06'),
(60, 1, 16, '2018-04-11 23:53:06', '2018-04-11 23:53:06'),
(61, 1, 17, '2018-04-11 23:53:06', '2018-04-11 23:53:06'),
(66, 8, 18, '2018-04-11 23:54:05', '2018-04-11 23:54:05'),
(67, 8, 19, '2018-04-11 23:54:05', '2018-04-11 23:54:05'),
(68, 9, 20, '2018-04-11 23:54:28', '2018-04-11 23:54:28'),
(69, 9, 21, '2018-04-11 23:54:28', '2018-04-11 23:54:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permission`
--

CREATE TABLE `auth_permission` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codename` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `auth_permission`
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
-- Struktur dari tabel `log_department`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_sample_minyak`
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

--
-- Dumping data untuk tabel `log_sample_minyak`
--

INSERT INTO `log_sample_minyak` (`id`, `sample_id`, `nik`, `log_time`, `action`, `keterangan`, `volume_titrasi_pv`, `bobot_sample_pv`, `normalitas_pv`, `faktor_pv`, `nilai_pv`, `volume_titrasi_ffa`, `bobot_sample_ffa`, `normalitas_ffa`, `faktor_ffa`, `nilai_ffa`, `created_at`, `updated_at`) VALUES
(1, 'MYK180416061838', '101', '2018-04-16 06:18:38', 'create', '101 created sample sample MYK180416061838 at 2018-04-16 06:18:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-04-15 23:18:38', '2018-04-15 23:18:38'),
(2, 'MYK180416061838', '102', '2018-04-16 06:23:20', 'upload', '102 uploaded sample result MYK180416061838 at 2018-04-16 06:23:20', 1.5600, 5.0413, 0.0100, 1000.0000, 3.0900, 0.8700, 10.0224, 0.1026, 25.6000, 0.2280, '2018-04-15 23:23:20', '2018-04-15 23:23:20'),
(3, 'MYK180416061838', '103', '2018-04-16 06:23:45', 'approve', 'Approved by 103', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-04-15 23:23:45', '2018-04-15 23:23:45'),
(4, 'MYK180416072415', '101', '2018-04-16 07:24:15', 'create', '101 created sample sample MYK180416072415 at 2018-04-16 07:24:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-04-16 00:24:15', '2018-04-16 00:24:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
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
(29, '2018_04_10_104520_create_log_sample_minyak_table', 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_department`
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
-- Dumping data untuk tabel `m_department`
--

INSERT INTO `m_department` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
('1', 'ITE', 'Y', '25749', '25749', '2018-03-14 23:34:31', '2018-03-15 03:04:20'),
('2', 'PRN', 'Y', '25749', '25749', '2018-03-25 06:44:13', '2018-03-25 06:44:13'),
('3', 'PNC', 'Y', '25749', '25749', '2018-03-28 00:00:22', '2018-03-28 00:00:22'),
('4', 'QC', 'Y', '25749', '25749', '2018-03-28 23:55:33', '2018-03-28 23:55:33'),
('5', 'QA', 'Y', '25749', '25749', '2018-03-28 23:55:42', '2018-03-28 23:55:42'),
('HSE', 'HSE', 'Y', '25749', '25749', '2018-04-12 10:50:47', '2018-04-12 10:50:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_jam_sample`
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
-- Dumping data untuk tabel `m_jam_sample`
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
-- Struktur dari tabel `m_line`
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
-- Dumping data untuk tabel `m_line`
--

INSERT INTO `m_line` (`id`, `dept_id`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
('LINE 01 BAG', '3', 'Y', '103', '103', '2018-04-13 09:22:48', '2018-04-13 09:22:48'),
('LINE 01 CUP', '2', 'Y', '103', '103', '2018-04-13 09:25:07', '2018-04-13 09:25:07'),
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
-- Struktur dari tabel `m_shift`
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
-- Dumping data untuk tabel `m_shift`
--

INSERT INTO `m_shift` (`name`, `jam_awal`, `jam_akhir`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
('NS1', '07:00:00', '15:00:00', 'Y', '25749', '25749', '2018-03-26 23:45:02', '2018-03-26 23:45:02'),
('NS2', '15:00:00', '23:00:00', 'Y', '25749', '25749', '2018-03-26 23:46:01', '2018-03-26 23:46:01'),
('NS3', '23:00:00', '07:00:00', 'Y', '25749', '25749', '2018-03-26 23:46:29', '2018-03-26 23:46:29'),
('SS1', '07:00:00', '12:00:00', 'Y', '25749', '25749', '2018-03-26 23:47:15', '2018-03-26 23:47:15'),
('SS2', '12:00:00', '17:00:00', 'Y', '25749', '25749', '2018-03-26 23:49:13', '2018-03-26 23:49:13'),
('SS3', '17:00:00', '22:00:00', 'Y', '25749', '25749', '2018-03-26 23:49:58', '2018-03-26 23:49:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_user`
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
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `m_user`
--

INSERT INTO `m_user` (`nik`, `group_id`, `dept_id`, `name`, `jabatan`, `email`, `password`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`, `remember_token`) VALUES
('04091725749', 2, '1', 'Heri Lesmana', 'Admin', 'lezmanaherie@gmail.com', '$2y$10$1iuS48OhwQHKXPtVj3sAIeP1WmB3Q.fSu3kLP7NPTPWOsKK.G75pC', '25749', '25749', 'Y', '2018-03-22 20:55:28', '2018-04-11 13:38:44', 'qFVq8MyrFCOggCHGsx3gNnq1yLmvwVFQGVx1W9o96DzripA5ni0sprKECPic'),
('04091725750', 2, '1', 'Muhammad Machbub Marzuqi', 'Foreman', 'muhammadmachbubmarzuqie@prakarsaalamsegar.com', '$2y$10$Ntol1LNzW6Cr7SdIlNvDUuh2hwJxSSQ08JWNv917kk/8akv3AI/gi', '25749', '25749', 'Y', '2018-03-22 20:56:00', '2018-03-23 00:24:45', '83qWmYGqbWzYAb8TUGMya9XYtPw8AkF2Lz5htRktw6z6ZDoD5KKTMNQPoJgj'),
('101', 8, '4', 'QC Sementara', 'Lapangan', 'qc.lapangan@prakarsaalamsegar.com', '$2y$10$rqlfqujDwfdpuIyac6YfJOMBqwt14oWJ8ccYa2u/k/nAhCtULzph2', '25749', '25749', 'Y', '2018-03-29 00:06:05', '2018-04-12 10:47:40', '4bYGJ1QALNRafiPJvzB5G3qDZoSiyDoA25givyD02jqDXNkCT95kC3EWMWli'),
('102', 9, '5', 'QA Sementara', 'Analyst', 'qa.analyt@prakarsaalamsegar.com', '$2y$10$9ylUcfzQReZ7uXQDXx1kT.udJ1qqEniCntuEPLf17/cvexxmzXlv2', '25749', '25749', 'Y', '2018-03-29 00:06:35', '2018-04-11 23:55:35', 'zyxobIVCDcUStpWTbVaZ3QLqSs8DWxaNQpcPJwh6OIUceuUQiStOulvHntok'),
('103', 7, '5', 'Foreman QA Sementara', 'Foreman', 'foreman.qa@prakarsaalamsegar.com', '$2y$10$ms8gxcC/q.lWpQLJc21OA.867P9niR2ERklTEamzKbV.1HcDhY8Z6', '25749', '25749', 'Y', '2018-04-12 00:10:01', '2018-04-12 00:10:01', 'd3y6m9CLSVcb5s8QgHaGCFvNJBg1vt3FR6X0RfJhwE6yp3xvUZ9Ljz6uUpIh'),
('23031518461', 1, '1', 'Muhammad Machbub Marzuqi', 'Foreman', 'muhammadmachbubmarzuqi@prakarsaalamsegar.com', '$2y$10$LVELDh1KzW2VxRLrR1vZP.u7DM5VpGu6Nx7p6gvFFidJV15/Hh8f.', '25749', '25749', 'Y', '2018-04-12 06:16:52', '2018-04-12 06:16:52', 'AnqzKhaKAeATmmDbMj7tPzfTx2xc6W6pjOy93aEE53TBWJkWRvsRWnmGkwB9');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_variant_product`
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
-- Dumping data untuk tabel `m_variant_product`
--

INSERT INTO `m_variant_product` (`mid`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
('1001', 'Soto', 'Y', '25749', '25749', '2018-03-15 00:10:56', '2018-03-15 00:11:47'),
('10110', 'Goreng', 'Y', '25749', '25749', '2018-03-15 00:12:03', '2018-03-15 00:12:07'),
('1101', 'ST', 'Y', '25749', '25749', '2018-03-25 07:14:12', '2018-03-25 07:14:12'),
('1102', 'GR', 'Y', '25749', '25749', '2018-03-25 07:14:22', '2018-03-25 07:14:22'),
('asdf', 'asdf', 'Y', '25749', '25749', '2018-04-12 10:55:41', '2018-04-12 10:55:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_fc`
--

CREATE TABLE `t_fc` (
  `id` int(10) NOT NULL,
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
-- Struktur dari tabel `t_ffa`
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `t_ffa`
--

INSERT INTO `t_ffa` (`id`, `sample_id`, `tangki`, `volume_titrasi`, `bobot_sample`, `normalitas`, `faktor`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 'MYK180416061838', 'BKA', 0.8700, 10.0224, 0.1026, 25.6000, 0.2280, '2018-04-15 23:18:38', '2018-04-15 23:23:20'),
(2, 'MYK180416072415', 'BKA', NULL, NULL, NULL, NULL, NULL, '2018-04-16 00:24:15', '2018-04-16 00:24:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_ka`
--

CREATE TABLE `t_ka` (
  `id` int(10) NOT NULL,
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
-- Struktur dari tabel `t_pv`
--

CREATE TABLE `t_pv` (
  `id` int(10) NOT NULL,
  `sample_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tangki` enum('BKA','BKB','MP','BB') COLLATE utf8mb4_unicode_ci NOT NULL,
  `volume_titrasi` double(8,4) DEFAULT NULL,
  `bobot_sample` double(8,4) DEFAULT NULL,
  `normalitas` double(8,4) DEFAULT NULL,
  `faktor` double(8,4) DEFAULT NULL,
  `nilai` double(8,4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `t_pv`
--

INSERT INTO `t_pv` (`id`, `sample_id`, `tangki`, `volume_titrasi`, `bobot_sample`, `normalitas`, `faktor`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 'MYK180416061838', 'BKA', 1.5600, 5.0413, 0.0100, 1000.0000, 3.0900, '2018-04-15 23:18:38', '2018-04-15 23:23:20'),
(2, 'MYK180416072415', 'BKA', NULL, NULL, NULL, NULL, NULL, '2018-04-16 00:24:15', '2018-04-16 00:24:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_sample_mie`
--

CREATE TABLE `t_sample_mie` (
  `id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept_id` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mid_product` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sample_date` date NOT NULL,
  `input_date` date NOT NULL,
  `input_time` time NOT NULL,
  `shift` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approve` enum('Y','N','') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approver` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approve_date` date DEFAULT NULL,
  `approve_time` time DEFAULT NULL,
  `created_by` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_sample_minyak`
--

CREATE TABLE `t_sample_minyak` (
  `id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line_id` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept_id` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mid_product` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sample_date` date NOT NULL,
  `input_date` date NOT NULL,
  `sample_time` time NOT NULL,
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
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `t_sample_minyak`
--

INSERT INTO `t_sample_minyak` (`id`, `line_id`, `dept_id`, `mid_product`, `sample_date`, `input_date`, `sample_time`, `input_time`, `upload_date`, `upload_time`, `uploaded_by`, `shift`, `approve`, `approver`, `approve_date`, `approve_time`, `created_by`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
('MYK180416061838', 'LINE 01 CUP', '2', '1001', '2018-04-16', '2018-04-16', '06:00:00', '06:18:00', '2018-04-16', '06:23:00', '102', 'NS1', 'Y', '103', '2018-04-16', '06:23:45', '101', 'Approved by 103', '3', '2018-04-15 23:18:38', '2018-04-15 23:23:45'),
('MYK180416072415', 'LINE 02 BAG', '2', '1001', '2018-04-16', '2018-04-16', '06:00:00', '07:24:00', '2018-04-16', '07:24:00', '102', 'NS1', NULL, NULL, NULL, NULL, '101', 'uploaded by 102', '2', '2018-04-16 00:24:15', '2018-04-16 00:24:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_shift`
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
-- Indexes for table `auth_permission`
--
ALTER TABLE `auth_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_department`
--
ALTER TABLE `log_department`
  ADD PRIMARY KEY (`id`),
  ADD KEY `log_department_dept_id_foreign` (`dept_id`),
  ADD KEY `log_department_nik_foreign` (`nik`);

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
  ADD KEY `shift` (`shift`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `auth_group_department`
--
ALTER TABLE `auth_group_department`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `auth_group_permission`
--
ALTER TABLE `auth_group_permission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `auth_permission`
--
ALTER TABLE `auth_permission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `log_department`
--
ALTER TABLE `log_department`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `log_sample_minyak`
--
ALTER TABLE `log_sample_minyak`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `m_jam_sample`
--
ALTER TABLE `m_jam_sample`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `t_fc`
--
ALTER TABLE `t_fc`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_ffa`
--
ALTER TABLE `t_ffa`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `t_ka`
--
ALTER TABLE `t_ka`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_pv`
--
ALTER TABLE `t_pv`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `t_shift`
--
ALTER TABLE `t_shift`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_group_department`
--
ALTER TABLE `auth_group_department`
  ADD CONSTRAINT `auth_group_department_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `m_department` (`id`),
  ADD CONSTRAINT `auth_group_department_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_group` (`id`);

--
-- Ketidakleluasaan untuk tabel `auth_group_permission`
--
ALTER TABLE `auth_group_permission`
  ADD CONSTRAINT `auth_group_permission_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_group` (`id`),
  ADD CONSTRAINT `auth_group_permission_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permission` (`id`);

--
-- Ketidakleluasaan untuk tabel `log_department`
--
ALTER TABLE `log_department`
  ADD CONSTRAINT `log_department_dept_id_foreign` FOREIGN KEY (`dept_id`) REFERENCES `m_department` (`id`),
  ADD CONSTRAINT `log_department_nik_foreign` FOREIGN KEY (`nik`) REFERENCES `m_user` (`nik`);

--
-- Ketidakleluasaan untuk tabel `log_sample_minyak`
--
ALTER TABLE `log_sample_minyak`
  ADD CONSTRAINT `log_sample_minyak_nik_foreign` FOREIGN KEY (`nik`) REFERENCES `m_user` (`nik`),
  ADD CONSTRAINT `log_sample_minyak_sample_id_foreign` FOREIGN KEY (`sample_id`) REFERENCES `t_sample_minyak` (`id`);

--
-- Ketidakleluasaan untuk tabel `m_line`
--
ALTER TABLE `m_line`
  ADD CONSTRAINT `m_line_dept_id_foreign` FOREIGN KEY (`dept_id`) REFERENCES `m_department` (`id`);

--
-- Ketidakleluasaan untuk tabel `m_user`
--
ALTER TABLE `m_user`
  ADD CONSTRAINT `m_user_dept_id_foreign` FOREIGN KEY (`dept_id`) REFERENCES `m_department` (`id`),
  ADD CONSTRAINT `m_user_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_group` (`id`);

--
-- Ketidakleluasaan untuk tabel `t_fc`
--
ALTER TABLE `t_fc`
  ADD CONSTRAINT `t_fc_sample_id_foreign` FOREIGN KEY (`sample_id`) REFERENCES `t_sample_mie` (`id`);

--
-- Ketidakleluasaan untuk tabel `t_ffa`
--
ALTER TABLE `t_ffa`
  ADD CONSTRAINT `t_ffa_sample_id_foreign` FOREIGN KEY (`sample_id`) REFERENCES `t_sample_minyak` (`id`);

--
-- Ketidakleluasaan untuk tabel `t_ka`
--
ALTER TABLE `t_ka`
  ADD CONSTRAINT `t_ka_sample_id_foreign` FOREIGN KEY (`sample_id`) REFERENCES `t_sample_mie` (`id`);

--
-- Ketidakleluasaan untuk tabel `t_pv`
--
ALTER TABLE `t_pv`
  ADD CONSTRAINT `t_pv_sample_id_foreign` FOREIGN KEY (`sample_id`) REFERENCES `t_sample_minyak` (`id`);

--
-- Ketidakleluasaan untuk tabel `t_sample_mie`
--
ALTER TABLE `t_sample_mie`
  ADD CONSTRAINT `t_sample_mie_dept_id_foreign` FOREIGN KEY (`dept_id`) REFERENCES `m_department` (`id`),
  ADD CONSTRAINT `t_sample_mie_ibfk_1` FOREIGN KEY (`shift`) REFERENCES `m_shift` (`name`),
  ADD CONSTRAINT `t_sample_mie_mid_product_foreign` FOREIGN KEY (`mid_product`) REFERENCES `m_variant_product` (`mid`);

--
-- Ketidakleluasaan untuk tabel `t_sample_minyak`
--
ALTER TABLE `t_sample_minyak`
  ADD CONSTRAINT `t_sample_minyak_dept_id_foreign` FOREIGN KEY (`dept_id`) REFERENCES `m_department` (`id`),
  ADD CONSTRAINT `t_sample_minyak_ibfk_1` FOREIGN KEY (`shift`) REFERENCES `m_shift` (`name`),
  ADD CONSTRAINT `t_sample_minyak_line_id_foreign` FOREIGN KEY (`line_id`) REFERENCES `m_line` (`id`),
  ADD CONSTRAINT `t_sample_minyak_mid_product_foreign` FOREIGN KEY (`mid_product`) REFERENCES `m_variant_product` (`mid`);

--
-- Ketidakleluasaan untuk tabel `t_shift`
--
ALTER TABLE `t_shift`
  ADD CONSTRAINT `t_shift_shift_name_foreign` FOREIGN KEY (`shift_name`) REFERENCES `m_shift` (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
