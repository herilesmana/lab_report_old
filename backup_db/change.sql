-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Sep 2018 pada 07.31
-- Versi server: 10.1.33-MariaDB
-- Versi PHP: 7.2.6

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
(9, 'qa_analyst', '2018-04-11 23:54:28', '2018-04-11 23:54:28'),
(10, 'manager_qc', '2018-09-09 14:40:02', '2018-09-09 14:40:02'),
(11, 'spv_qc', '2018-09-10 08:30:11', '2018-09-10 08:30:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_group_department`
--

CREATE TABLE `auth_group_department` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `department_id` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `auth_group_department`
--

INSERT INTO `auth_group_department` (`id`, `group_id`, `department_id`) VALUES
(1, 8, '4'),
(2, 8, '5'),
(3, 5, '4'),
(4, 5, '5');

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
(69, 9, 21, '2018-04-11 23:54:28', '2018-04-11 23:54:28'),
(70, 10, 10, '2018-09-09 14:40:02', '2018-09-09 14:40:02'),
(71, 8, 10, '2018-09-09 14:46:24', '2018-09-09 14:46:24'),
(72, 10, 14, '2018-09-09 15:16:52', '2018-09-09 15:16:52'),
(73, 11, 10, '2018-09-10 08:30:11', '2018-09-10 08:30:11'),
(74, 11, 14, '2018-09-10 08:30:11', '2018-09-10 08:30:11'),
(75, 11, 18, '2018-09-10 08:30:11', '2018-09-10 08:30:11'),
(76, 11, 19, '2018-09-10 08:30:11', '2018-09-10 08:30:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_group_report`
--

CREATE TABLE `auth_group_report` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `report_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `auth_group_report`
--

INSERT INTO `auth_group_report` (`id`, `group_id`, `report_id`, `created_at`, `updated_at`) VALUES
(1, 10, 1, '2018-09-09 14:40:02', '2018-09-09 14:40:02'),
(2, 8, 1, '2018-09-09 14:46:24', '2018-09-09 14:46:24'),
(3, 10, 2, '2018-09-09 14:57:21', '2018-09-09 14:57:21'),
(4, 10, 20, '2018-09-09 15:16:52', '2018-09-09 15:16:52'),
(5, 10, 21, '2018-09-09 15:16:52', '2018-09-09 15:16:52'),
(6, 11, 1, '2018-09-10 08:30:11', '2018-09-10 08:30:11'),
(7, 11, 2, '2018-09-10 08:30:11', '2018-09-10 08:30:11'),
(8, 11, 3, '2018-09-10 08:30:11', '2018-09-10 08:30:11'),
(9, 11, 4, '2018-09-10 08:30:11', '2018-09-10 08:30:11'),
(10, 11, 5, '2018-09-10 08:30:12', '2018-09-10 08:30:12'),
(11, 11, 6, '2018-09-10 08:30:12', '2018-09-10 08:30:12'),
(12, 11, 7, '2018-09-10 08:30:12', '2018-09-10 08:30:12'),
(13, 11, 8, '2018-09-10 08:30:12', '2018-09-10 08:30:12'),
(14, 11, 9, '2018-09-10 08:30:12', '2018-09-10 08:30:12'),
(15, 11, 10, '2018-09-10 08:30:12', '2018-09-10 08:30:12'),
(16, 11, 11, '2018-09-10 08:30:12', '2018-09-10 08:30:12'),
(17, 11, 12, '2018-09-10 08:30:12', '2018-09-10 08:30:12'),
(18, 11, 13, '2018-09-10 08:30:12', '2018-09-10 08:30:12'),
(19, 11, 14, '2018-09-10 08:30:12', '2018-09-10 08:30:12'),
(20, 11, 15, '2018-09-10 08:30:12', '2018-09-10 08:30:12'),
(21, 11, 16, '2018-09-10 08:30:12', '2018-09-10 08:30:12'),
(22, 11, 17, '2018-09-10 08:30:12', '2018-09-10 08:30:12'),
(23, 11, 18, '2018-09-10 08:30:12', '2018-09-10 08:30:12'),
(24, 11, 19, '2018-09-10 08:30:12', '2018-09-10 08:30:12'),
(25, 11, 20, '2018-09-10 08:30:12', '2018-09-10 08:30:12'),
(26, 11, 21, '2018-09-10 08:30:12', '2018-09-10 08:30:12'),
(27, 11, 22, '2018-09-10 08:30:12', '2018-09-10 08:30:12'),
(28, 11, 23, '2018-09-10 08:30:12', '2018-09-10 08:30:12'),
(29, 11, 24, '2018-09-10 08:30:12', '2018-09-10 08:30:12'),
(30, 11, 25, '2018-09-10 08:30:12', '2018-09-10 08:30:12'),
(31, 11, 26, '2018-09-10 08:30:12', '2018-09-10 08:30:12'),
(32, 11, 27, '2018-09-10 08:30:13', '2018-09-10 08:30:13'),
(33, 11, 28, '2018-09-10 08:30:13', '2018-09-10 08:30:13'),
(34, 11, 29, '2018-09-10 08:30:13', '2018-09-10 08:30:13'),
(35, 11, 30, '2018-09-10 08:30:13', '2018-09-10 08:30:13'),
(36, 11, 31, '2018-09-10 08:30:13', '2018-09-10 08:30:13'),
(37, 11, 32, '2018-09-10 08:30:13', '2018-09-10 08:30:13'),
(38, 11, 33, '2018-09-10 08:30:13', '2018-09-10 08:30:13'),
(39, 11, 34, '2018-09-10 08:30:13', '2018-09-10 08:30:13'),
(40, 11, 35, '2018-09-10 08:30:13', '2018-09-10 08:30:13'),
(41, 11, 36, '2018-09-10 08:30:13', '2018-09-10 08:30:13'),
(42, 11, 37, '2018-09-10 08:30:13', '2018-09-10 08:30:13'),
(43, 11, 38, '2018-09-10 08:30:13', '2018-09-10 08:30:13'),
(44, 11, 39, '2018-09-10 08:30:13', '2018-09-10 08:30:13'),
(45, 11, 40, '2018-09-10 08:30:13', '2018-09-10 08:30:13'),
(46, 11, 41, '2018-09-10 08:30:13', '2018-09-10 08:30:13'),
(47, 11, 42, '2018-09-10 08:30:13', '2018-09-10 08:30:13'),
(48, 11, 43, '2018-09-10 08:30:13', '2018-09-10 08:30:13'),
(49, 11, 44, '2018-09-10 08:30:13', '2018-09-10 08:30:13'),
(50, 11, 45, '2018-09-10 08:30:13', '2018-09-10 08:30:13'),
(51, 11, 46, '2018-09-10 08:30:13', '2018-09-10 08:30:13'),
(52, 11, 47, '2018-09-10 08:30:13', '2018-09-10 08:30:13'),
(53, 11, 48, '2018-09-10 08:30:14', '2018-09-10 08:30:14'),
(54, 11, 49, '2018-09-10 08:30:14', '2018-09-10 08:30:14'),
(55, 11, 50, '2018-09-10 08:30:14', '2018-09-10 08:30:14'),
(56, 11, 51, '2018-09-10 08:30:14', '2018-09-10 08:30:14'),
(57, 11, 52, '2018-09-10 08:30:14', '2018-09-10 08:30:14'),
(58, 11, 53, '2018-09-10 08:30:14', '2018-09-10 08:30:14'),
(59, 11, 54, '2018-09-10 08:30:14', '2018-09-10 08:30:14'),
(60, 11, 55, '2018-09-10 08:30:14', '2018-09-10 08:30:14'),
(61, 11, 56, '2018-09-10 08:30:14', '2018-09-10 08:30:14'),
(62, 11, 57, '2018-09-10 08:30:14', '2018-09-10 08:30:14');

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
-- Struktur dari tabel `auth_report`
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
-- Dumping data untuk tabel `auth_report`
--

INSERT INTO `auth_report` (`id`, `name`, `codename`, `jenis_sample`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Oil Sample ID', 't_sample_minyak.id as oil_sample_id', 'MYK', 'Y', '040925749', '040925749', NULL, NULL),
(2, 'Oil Line ID', 't_sample_minyak.line_id as oil_sample_line_id', 'MYK', 'Y', '', '', NULL, NULL),
(3, 'Oil Department', 'm_department.id as department', 'MYK', 'Y', '', '', NULL, NULL),
(4, 'Oil Variant', 'm_variant_product.mid as variant', 'MYK', 'Y', '', '', NULL, NULL),
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
(22, 'Noodle Department', 'm_department.id as department', 'MIE', 'Y', '', '', NULL, NULL),
(23, 'Noodle Variant', 'm_variant_product.mid as variant', 'MIE', 'Y', '', '', NULL, NULL),
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

--
-- Dumping data untuk tabel `log_department`
--

INSERT INTO `log_department` (`id`, `dept_id`, `nik`, `log_time`, `action`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, '9', '04091725749', '2018-09-07 05:44:00', 'update', '04091725749 updated dept_id 9 at 2018-09-07 05:44:00', '2018-09-06 22:44:00', '2018-09-06 22:44:00'),
(2, '2', '04091725749', '2018-09-10 15:25:09', 'create', '04091725749 created dept_id 2 at 2018-09-10 15:25:09', '2018-09-10 08:25:09', '2018-09-10 08:25:09'),
(3, '3', '04091725749', '2018-09-10 15:25:28', 'create', '04091725749 created dept_id 3 at 2018-09-10 15:25:28', '2018-09-10 08:25:28', '2018-09-10 08:25:28'),
(4, '3', '04091725749', '2018-09-10 15:25:36', 'update', '04091725749 updated dept_id 3 at 2018-09-10 15:25:36', '2018-09-10 08:25:36', '2018-09-10 08:25:36'),
(5, '4', '04091725749', '2018-09-10 15:25:53', 'create', '04091725749 created dept_id 4 at 2018-09-10 15:25:53', '2018-09-10 08:25:53', '2018-09-10 08:25:53'),
(6, '5', '04091725749', '2018-09-10 15:26:03', 'create', '04091725749 created dept_id 5 at 2018-09-10 15:26:03', '2018-09-10 08:26:03', '2018-09-10 08:26:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_sample_mie`
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
(1, 'MYK180912001', '102', '2018-09-12 07:20:59', 'create', '102 created sample sample MYK180912001 at 2018-09-12 07:20:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-09-12 00:20:59', '2018-09-12 00:20:59'),
(2, 'MYK180912001', '102', '2018-09-12 07:21:28', 'duplo', '102 duplo sample MYK180912001 pv nilai 3.09 ffa nilai 0.0578 at 2018-09-12 07:21:28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-09-12 00:21:28', '2018-09-12 00:21:28'),
(3, 'MYK180912001', '102', '2018-09-12 07:21:28', 'duplo', '102 duplo sample MYK180912001 pv nilai 3.09 ffa nilai 0.0578 at 2018-09-12 07:21:28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-09-12 00:21:28', '2018-09-12 00:21:28'),
(4, 'MYK180912001', '102', '2018-09-12 07:21:29', 'upload', '102 uploaded sample result MYK180912001 at 2018-09-12 07:21:29', 1.5600, 5.0413, 0.0100, 1000.0000, 3.0900, 0.8700, 10.0224, 0.0260, 25.6000, 0.0578, '2018-09-12 00:21:29', '2018-09-12 00:21:29'),
(5, 'MYK180912002', '102', '2018-09-12 07:31:19', 'create', '102 created sample sample MYK180912002 at 2018-09-12 07:31:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-09-12 00:31:19', '2018-09-12 00:31:19'),
(6, 'MYK180912002', '102', '2018-09-12 07:31:37', 'upload', '102 uploaded sample result MYK180912002 at 2018-09-12 07:31:37', 1.5600, 5.0413, 0.0100, 1000.0000, 3.0900, 0.8700, 10.0224, 0.0260, 25.6000, 0.0578, '2018-09-12 00:31:37', '2018-09-12 00:31:37'),
(7, 'MYK180912002', '102', '2018-09-12 07:31:50', 'approve', 'Approved by 102', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-09-12 00:31:50', '2018-09-12 00:31:50');

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
(29, '2018_04_10_104520_create_log_sample_minyak_table', 11),
(30, '2018_04_17_161436_create_log_sample_mie_table', 12),
(33, '2018_09_09_142135_create_auth_report_table', 13),
(34, '2018_09_09_164647_create_auth_group_report_table', 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_department`
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
-- Dumping data untuk tabel `m_department`
--

INSERT INTO `m_department` (`id`, `name`, `status`, `dept_group`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
('1', 'ITE', 'Y', 'superuser', '25749', '25749', '2018-03-14 16:34:31', '2018-07-15 01:06:33'),
('2', 'PRN', 'Y', 'prod_noodle', '25749', '25749', '2018-03-24 23:44:13', '2018-03-24 23:44:13'),
('3', 'PNC', 'Y', 'prod_noodle', '25749', '25749', '2018-03-27 17:00:22', '2018-03-27 17:00:22'),
('4', 'QC', 'Y', 'qc_noodle', '25749', '25749', '2018-03-28 16:55:33', '2018-03-28 16:55:33'),
('5', 'QA', 'Y', 'qa_noodle', '25749', '25749', '2018-03-28 16:55:42', '2018-03-28 16:55:42'),
('9', 'HRD', 'Y', NULL, '25749', '25749', '2018-09-04 03:56:30', '2018-09-06 15:44:00');

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
-- Dumping data untuk tabel `m_user`
--

INSERT INTO `m_user` (`nik`, `group_id`, `dept_id`, `dept_group`, `name`, `jabatan`, `email`, `password`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`, `remember_token`) VALUES
('04091725749', 2, '1', 'superuser', 'Heri Lesmana', 'Admin', 'lezmanaherie@gmail.com', '$2y$10$1iuS48OhwQHKXPtVj3sAIeP1WmB3Q.fSu3kLP7NPTPWOsKK.G75pC', '25749', '25749', 'Y', '2018-03-22 20:55:28', '2018-04-11 13:38:44', 'JbBevP4MkhEpLwZCtWTOsQQIwp66gy9rbZD4tIV2rIY17VdWcbhAdD9w2H3n'),
('04091725750', 2, '1', 'superuser', 'Muhammad Machbub Marzuqi', 'Foreman', 'muhammadmachbubmarzuqie@prakarsaalamsegar.com', '$2y$10$Ntol1LNzW6Cr7SdIlNvDUuh2hwJxSSQ08JWNv917kk/8akv3AI/gi', '25749', '25749', 'Y', '2018-03-22 20:56:00', '2018-03-23 00:24:45', '83qWmYGqbWzYAb8TUGMya9XYtPw8AkF2Lz5htRktw6z6ZDoD5KKTMNQPoJgj'),
('1001', 10, '4', NULL, 'Manager QC Sample', 'Manager', 'manager.qc@prakarsaalamsegar.com', '$2y$10$.B6rXL5Uf7ruKPgThM/XkOy8gSxG7HUy5onb2ZlHecD9CFpX3ocrC', '25749', '25749', 'Y', '2018-09-09 14:58:33', '2018-09-09 14:58:33', 'wPNsQhJ72FCcqTmSUBFG1Zjsc0qs37s8zlkSnsw9X68M4utLtqGyz23Ujv2e'),
('10010', 7, '2', NULL, 'Hehe', 'Hehe', 'hehe@hehe.hehe', '$2y$10$DD.1F9rX6zVmN//cX6wUBOK7Xb/0Sf1q.y/oSeMGpiBlv.Rukr0mq', '25749', '25749', 'N', '2018-09-04 11:00:02', '2018-09-04 11:28:58', NULL),
('101', 8, '4', 'prod_noodle', 'QC Sementara', 'Lapangan', 'qc.lapangan@prakarsaalamsegar.com', '$2y$10$rqlfqujDwfdpuIyac6YfJOMBqwt14oWJ8ccYa2u/k/nAhCtULzph2', '25749', '25749', 'Y', '2018-03-29 00:06:05', '2018-04-12 10:47:40', 'XHtuJQRu5n23aFkJ4JoXnLH2T3D1CZloLpiYT02LcuWf8G8rKaNpnazgwZYK'),
('102', 9, '5', 'prod_noodle', 'QA Sementara', 'Analyst', 'qa.analyt@prakarsaalamsegar.com', '$2y$10$9ylUcfzQReZ7uXQDXx1kT.udJ1qqEniCntuEPLf17/cvexxmzXlv2', '25749', '25749', 'Y', '2018-03-29 00:06:35', '2018-04-11 23:55:35', 'sbjdiUFvMBzcpwvXsNFNReyYNAGZmbfgQXDuJqOVYeRH2n81lgcHVb5PAjBE'),
('103', 7, '5', 'prod_noodle', 'Foreman QA Sementara', 'Foreman', 'foreman.qa@prakarsaalamsegar.com', '$2y$10$ms8gxcC/q.lWpQLJc21OA.867P9niR2ERklTEamzKbV.1HcDhY8Z6', '25749', '25749', 'Y', '2018-04-12 00:10:01', '2018-04-12 00:10:01', '2tPstAJpCAc2m8x5rasqhkRvog1qf21SBy3ryBXhZ4kRBXVLGoP3GuO5ikXe'),
('16071416245', 7, '2', NULL, 'Jhonni Sigiro', 'SPV', 'jhonni.sigiro@prakarsaalamsegar.com', '$2y$10$QWOsT35oGtZskOeRRtAK8.80Fg.JzVYqLoJj7a5Rw.m7Vh3cmI1fK', '25749', '25749', 'Y', '2018-09-10 08:27:13', '2018-09-10 08:27:13', NULL),
('23031518461', 1, '1', 'superuser', 'Muhammad Machbub Marzuqi', 'Foreman', 'muhammadmachbubmarzuqi@prakarsaalamsegar.com', '$2y$10$LVELDh1KzW2VxRLrR1vZP.u7DM5VpGu6Nx7p6gvFFidJV15/Hh8f.', '25749', '25749', 'Y', '2018-04-12 06:16:52', '2018-04-12 06:16:52', 'AnqzKhaKAeATmmDbMj7tPzfTx2xc6W6pjOy93aEE53TBWJkWRvsRWnmGkwB9'),
('29121623562', 11, '3', NULL, 'Bayu Firmansyah', 'SPV', 'bayu.firmansyah@myemail.pas', '$2y$10$chamzIWjtFwU5nlxmdvuYOshhqV/q1lX9ztpjRinBMdryQMUiNljq', '25749', '25749', 'Y', '2018-09-10 08:31:55', '2018-09-10 08:31:55', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_variant_product`
--

CREATE TABLE `m_variant_product` (
  `mid` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` enum('lokal','export') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `m_variant_product`
--

INSERT INTO `m_variant_product` (`mid`, `name`, `status`, `jenis`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
('10010', 'GKSS', 'Y', 'lokal', '25749', '25749', '2018-09-06 09:38:21', '2018-09-06 09:38:21'),
('10111', 'ABSS', 'Y', 'lokal', '25749', '25749', '2018-09-06 09:38:48', '2018-09-06 09:38:48'),
('10112', 'MG', 'Y', 'lokal', '25749', '25749', '2018-09-06 09:39:02', '2018-09-06 09:39:02'),
('10113', 'AB', 'Y', 'lokal', '25749', '25749', '2018-09-06 09:39:19', '2018-09-06 09:39:19'),
('10114', 'ST', 'Y', 'lokal', '25749', '25749', '2018-09-06 09:39:44', '2018-09-06 09:39:44'),
('10115', 'KS', 'Y', 'lokal', '25749', '25749', '2018-09-06 09:39:58', '2018-09-06 09:39:58'),
('10116', 'MGM', 'Y', 'export', '25749', '25749', '2018-09-06 09:40:26', '2018-09-06 09:40:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_fc`
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
  `used` enum('Y','N') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `t_ffa`
--

INSERT INTO `t_ffa` (`id`, `sample_id`, `tangki`, `volume_titrasi`, `bobot_sample`, `normalitas`, `faktor`, `nilai`, `used`, `created_at`, `updated_at`) VALUES
(1, 'MYK180912001', 'MP', 0.8700, 10.0224, 0.0260, 25.6000, 0.0578, NULL, '2018-09-12 00:20:59', '2018-09-12 00:21:29'),
(2, 'MYK180912001', 'MP', 0.8700, 10.0224, 0.0260, 25.6000, 0.0578, NULL, '2018-09-12 00:21:28', '2018-09-12 00:21:28'),
(3, 'MYK180912001', 'MP', 0.8700, 10.0224, 0.0260, 25.6000, 0.0578, NULL, '2018-09-12 00:21:28', '2018-09-12 00:21:28'),
(4, 'MYK180912002', 'MP', 0.8700, 10.0224, 0.0260, 25.6000, 0.0578, NULL, '2018-09-12 00:31:19', '2018-09-12 00:31:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_ka`
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
  `used` enum('Y','N') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `t_pv`
--

INSERT INTO `t_pv` (`id`, `sample_id`, `tangki`, `volume_titrasi`, `bobot_sample`, `normalitas`, `faktor`, `nilai`, `used`, `created_at`, `updated_at`) VALUES
(1, 'MYK180912001', 'MP', 1.5600, 5.0413, 0.0100, 1000.0000, 3.0900, NULL, '2018-09-12 00:20:59', '2018-09-12 00:21:29'),
(2, 'MYK180912001', 'MP', 1.5600, 5.0413, 0.0100, 1000.0000, 3.0900, 'Y', '2018-09-12 00:21:28', '2018-09-12 00:21:47'),
(3, 'MYK180912001', 'MP', 1.5600, 5.0413, 0.0100, 1000.0000, 3.0900, NULL, '2018-09-12 00:21:28', '2018-09-12 00:21:28'),
(4, 'MYK180912002', 'MP', 1.5600, 5.0413, 0.0100, 1000.0000, 3.0900, NULL, '2018-09-12 00:31:19', '2018-09-12 00:31:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_sample_mie`
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
-- Struktur dari tabel `t_sample_minyak`
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

--
-- Dumping data untuk tabel `t_sample_minyak`
--

INSERT INTO `t_sample_minyak` (`id`, `line_id`, `dept_id`, `mid_product`, `sample_date`, `input_date`, `sample_time`, `input_time`, `upload_date`, `upload_time`, `uploaded_by`, `shift`, `approve`, `approver`, `approve_date`, `approve_time`, `created_by`, `keterangan`, `status`, `ulang`, `duplo`, `created_at`, `updated_at`) VALUES
('MYK180912001', 'LINE 01 BAG', '2', '10010', '2018-09-12', '2018-09-12', '07:30:00', '07:20:00', '2018-09-12', '07:21:00', '102', 'NS1', NULL, NULL, NULL, NULL, '102', 'uploaded by 102', '2', '', 'Y', '2018-09-12 00:20:59', '2018-09-12 00:21:29'),
('MYK180912002', 'LINE 02 BAG', '2', '10111', '2018-09-12', '2018-09-12', '07:30:00', '07:31:00', '2018-09-12', '07:31:00', '102', 'NS1', 'Y', '102', '2018-09-12', '07:31:50', '102', 'Approved by 102', '3', '', 'N', '2018-09-12 00:31:18', '2018-09-12 00:31:50');

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
-- Indeks untuk tabel `auth_group`
--
ALTER TABLE `auth_group`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_group_department`
--
ALTER TABLE `auth_group_department`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_group_department_group_id_foreign` (`group_id`),
  ADD KEY `auth_group_department_department_id_foreign` (`department_id`);

--
-- Indeks untuk tabel `auth_group_permission`
--
ALTER TABLE `auth_group_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_group_permission_group_id_foreign` (`group_id`),
  ADD KEY `auth_group_permission_permission_id_foreign` (`permission_id`);

--
-- Indeks untuk tabel `auth_group_report`
--
ALTER TABLE `auth_group_report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_group_report_group_id_foreign` (`group_id`),
  ADD KEY `auth_group_report_report_id_foreign` (`report_id`);

--
-- Indeks untuk tabel `auth_permission`
--
ALTER TABLE `auth_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_report`
--
ALTER TABLE `auth_report`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `log_department`
--
ALTER TABLE `log_department`
  ADD PRIMARY KEY (`id`),
  ADD KEY `log_department_dept_id_foreign` (`dept_id`),
  ADD KEY `log_department_nik_foreign` (`nik`);

--
-- Indeks untuk tabel `log_sample_mie`
--
ALTER TABLE `log_sample_mie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `log_sample_mie_sample_id_foreign` (`sample_id`),
  ADD KEY `log_sample_mie_nik_foreign` (`nik`);

--
-- Indeks untuk tabel `log_sample_minyak`
--
ALTER TABLE `log_sample_minyak`
  ADD PRIMARY KEY (`id`),
  ADD KEY `log_sample_minyak_sample_id_foreign` (`sample_id`),
  ADD KEY `log_sample_minyak_nik_foreign` (`nik`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_department`
--
ALTER TABLE `m_department`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_jam_sample`
--
ALTER TABLE `m_jam_sample`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_line`
--
ALTER TABLE `m_line`
  ADD PRIMARY KEY (`id`),
  ADD KEY `m_line_dept_id_foreign` (`dept_id`);

--
-- Indeks untuk tabel `m_shift`
--
ALTER TABLE `m_shift`
  ADD PRIMARY KEY (`name`);

--
-- Indeks untuk tabel `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `m_user_group_id_foreign` (`group_id`),
  ADD KEY `m_user_dept_id_foreign` (`dept_id`);

--
-- Indeks untuk tabel `m_variant_product`
--
ALTER TABLE `m_variant_product`
  ADD PRIMARY KEY (`mid`);

--
-- Indeks untuk tabel `t_fc`
--
ALTER TABLE `t_fc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `t_fc_sample_id_foreign` (`sample_id`);

--
-- Indeks untuk tabel `t_ffa`
--
ALTER TABLE `t_ffa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `t_ffa_sample_id_foreign` (`sample_id`);

--
-- Indeks untuk tabel `t_ka`
--
ALTER TABLE `t_ka`
  ADD PRIMARY KEY (`id`),
  ADD KEY `t_ka_sample_id_foreign` (`sample_id`);

--
-- Indeks untuk tabel `t_pv`
--
ALTER TABLE `t_pv`
  ADD PRIMARY KEY (`id`),
  ADD KEY `t_pv_sample_id_foreign` (`sample_id`);

--
-- Indeks untuk tabel `t_sample_mie`
--
ALTER TABLE `t_sample_mie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `t_sample_mie_dept_id_foreign` (`dept_id`),
  ADD KEY `t_sample_mie_mid_product_foreign` (`mid_product`),
  ADD KEY `shift` (`shift`),
  ADD KEY `line_id` (`line_id`);

--
-- Indeks untuk tabel `t_sample_minyak`
--
ALTER TABLE `t_sample_minyak`
  ADD PRIMARY KEY (`id`),
  ADD KEY `t_sample_minyak_line_id_foreign` (`line_id`),
  ADD KEY `t_sample_minyak_dept_id_foreign` (`dept_id`),
  ADD KEY `t_sample_minyak_mid_product_foreign` (`mid_product`),
  ADD KEY `shift` (`shift`);

--
-- Indeks untuk tabel `t_shift`
--
ALTER TABLE `t_shift`
  ADD PRIMARY KEY (`id`),
  ADD KEY `t_shift_shift_name_foreign` (`shift_name`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth_group`
--
ALTER TABLE `auth_group`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `auth_group_department`
--
ALTER TABLE `auth_group_department`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `auth_group_permission`
--
ALTER TABLE `auth_group_permission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT untuk tabel `auth_group_report`
--
ALTER TABLE `auth_group_report`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `auth_permission`
--
ALTER TABLE `auth_permission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `auth_report`
--
ALTER TABLE `auth_report`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `log_department`
--
ALTER TABLE `log_department`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `log_sample_mie`
--
ALTER TABLE `log_sample_mie`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `log_sample_minyak`
--
ALTER TABLE `log_sample_minyak`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `m_jam_sample`
--
ALTER TABLE `m_jam_sample`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `t_fc`
--
ALTER TABLE `t_fc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `t_ffa`
--
ALTER TABLE `t_ffa`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `t_ka`
--
ALTER TABLE `t_ka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `t_pv`
--
ALTER TABLE `t_pv`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `t_shift`
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
-- Ketidakleluasaan untuk tabel `auth_group_report`
--
ALTER TABLE `auth_group_report`
  ADD CONSTRAINT `auth_group_report_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_group` (`id`),
  ADD CONSTRAINT `auth_group_report_report_id_foreign` FOREIGN KEY (`report_id`) REFERENCES `auth_report` (`id`);

--
-- Ketidakleluasaan untuk tabel `log_department`
--
ALTER TABLE `log_department`
  ADD CONSTRAINT `log_department_dept_id_foreign` FOREIGN KEY (`dept_id`) REFERENCES `m_department` (`id`),
  ADD CONSTRAINT `log_department_nik_foreign` FOREIGN KEY (`nik`) REFERENCES `m_user` (`nik`);

--
-- Ketidakleluasaan untuk tabel `log_sample_mie`
--
ALTER TABLE `log_sample_mie`
  ADD CONSTRAINT `log_sample_mie_nik_foreign` FOREIGN KEY (`nik`) REFERENCES `m_user` (`nik`),
  ADD CONSTRAINT `log_sample_mie_sample_id_foreign` FOREIGN KEY (`sample_id`) REFERENCES `t_sample_mie` (`id`);

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
  ADD CONSTRAINT `t_sample_mie_ibfk_2` FOREIGN KEY (`line_id`) REFERENCES `m_line` (`id`),
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
