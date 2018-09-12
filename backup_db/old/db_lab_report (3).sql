-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 10 Apr 2018 pada 02.21
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
(2, 'default', NULL, NULL);

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
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(15, 'Set Shift', 'set_shift', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_detail`
--

CREATE TABLE `log_detail` (
  `id` int(11) NOT NULL,
  `log_time` datetime NOT NULL,
  `pic` varchar(12) NOT NULL,
  `action` varchar(20) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_group`
--

CREATE TABLE `log_group` (
  `id` int(11) NOT NULL,
  `content_type_id` varchar(20) NOT NULL,
  `log_detail_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(24, '2018_03_25_003349_create_auth_group_department_table', 8);

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
('5', 'QA', 'Y', '25749', '25749', '2018-03-28 23:55:42', '2018-03-28 23:55:42');

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
('LINE 1 BAG', '2', 'Y', '04091725749', '04091725749', '2018-03-28 01:36:06', '2018-03-28 01:36:06'),
('LINE 1 CUP', '3', 'Y', '04091725749', '04091725749', '2018-03-28 02:21:51', '2018-03-28 02:21:51'),
('LINE 10 BAG', '2', 'Y', '04091725749', '04091725749', '2018-03-28 01:47:07', '2018-03-28 01:47:07'),
('LINE 11 BAG', '2', 'Y', '04091725749', '04091725749', '2018-03-28 01:47:16', '2018-03-28 01:47:16'),
('LINE 12 BAG', '2', 'Y', '04091725749', '04091725749', '2018-03-28 01:47:23', '2018-03-28 01:47:23'),
('LINE 13 BAG', '2', 'Y', '04091725749', '04091725749', '2018-03-28 01:47:31', '2018-03-28 01:47:31'),
('LINE 14 BAG', '2', 'Y', '04091725749', '04091725749', '2018-03-28 01:47:40', '2018-03-28 01:47:40'),
('LINE 15 BAG', '2', 'Y', '04091725749', '04091725749', '2018-03-28 01:47:48', '2018-03-28 01:47:48'),
('LINE 16 BAG', '2', 'Y', '04091725749', '04091725749', '2018-03-28 01:47:56', '2018-03-28 01:47:56'),
('LINE 17 BAG', '3', 'Y', '04091725749', '04091725749', '2018-03-28 02:22:13', '2018-03-28 02:22:13'),
('LINE 18 BAG', '3', 'Y', '04091725749', '04091725749', '2018-03-28 02:22:24', '2018-03-28 02:22:24'),
('LINE 19 BAG', '3', 'Y', '04091725749', '04091725749', '2018-03-28 02:22:34', '2018-03-28 02:22:34'),
('LINE 2 BAG', '2', 'Y', '04091725749', '04091725749', '2018-03-28 01:36:19', '2018-03-28 01:36:19'),
('LINE 2 CUP', '3', 'Y', '04091725749', '04091725749', '2018-03-28 02:22:01', '2018-03-28 02:22:01'),
('LINE 3 BAG', '2', 'Y', '04091725749', '04091725749', '2018-03-28 01:36:28', '2018-03-28 01:36:28'),
('LINE 4 BAG', '2', 'Y', '04091725749', '04091725749', '2018-03-28 01:36:42', '2018-03-28 01:36:42'),
('LINE 5 BAG', '2', 'Y', '04091725749', '04091725749', '2018-03-28 01:46:04', '2018-03-28 01:46:04'),
('LINE 6 BAG', '2', 'Y', '04091725749', '04091725749', '2018-03-28 01:46:15', '2018-03-28 01:46:15'),
('LINE 7 BAG', '2', 'Y', '04091725749', '04091725749', '2018-03-28 01:46:25', '2018-03-28 01:46:25'),
('LINE 8 BAG', '2', 'Y', '04091725749', '04091725749', '2018-03-28 01:46:45', '2018-03-28 01:46:45'),
('LINE 9 BAG', '2', 'Y', '04091725749', '04091725749', '2018-03-28 01:46:54', '2018-03-28 01:46:54');

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
('04091725749', 2, '1', 'Heri Lesmana', 'Admin', 'lezmanaherie@gmail.com', '$2y$10$g/2fMvOPH8KcqAYoTFQ4uutH10mcYNobee7TqHPx7zdBmFFzArjQ.', '25749', '25749', 'Y', '2018-03-22 20:55:28', '2018-03-22 20:55:28', 'd50R1CSWHANIAAG2h3b44dhhILmxDQlZrU16nxEQQakkeRSrvhWNGER9xzj7'),
('04091725750', 2, '1', 'Muhammad Machbub Marzuqi', 'Foreman', 'muhammadmachbubmarzuqie@prakarsaalamsegar.com', '$2y$10$Ntol1LNzW6Cr7SdIlNvDUuh2hwJxSSQ08JWNv917kk/8akv3AI/gi', '25749', '25749', 'Y', '2018-03-22 20:56:00', '2018-03-23 00:24:45', 'ismbtlshN4zW2URfQaEtQ4RVershY4uV8ks6nW6HiXeHmHGcfboyoWTYNyRS'),
('101', 2, '4', 'QC Sementara', 'Lapangan', 'hehe@hehe.hehe', '$2y$10$rqlfqujDwfdpuIyac6YfJOMBqwt14oWJ8ccYa2u/k/nAhCtULzph2', '25749', '25749', 'Y', '2018-03-29 00:06:05', '2018-03-29 00:06:05', '0AG6ZRKDRQef8F4l6JjPBN3KK8Wvinw3HsCoYPTQLmYT1di754ytkWeHdl4X'),
('102', 2, '5', 'QA Sementara', 'Analyst', 'hehe@hehe.hehe', '$2y$10$9ylUcfzQReZ7uXQDXx1kT.udJ1qqEniCntuEPLf17/cvexxmzXlv2', '25749', '25749', 'Y', '2018-03-29 00:06:35', '2018-03-29 00:06:35', 'Mm0vWnF6Hcsi4FfRerg5xZQiTZPCMXwIP0RF2pGfdhcUOff8XVXSa17hhEzo');

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
('1102', 'GR', 'Y', '25749', '25749', '2018-03-25 07:14:22', '2018-03-25 07:14:22');

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
  `id` int(10) NOT NULL,
  `sample_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 'SMK00001', 'BKA', NULL, NULL, NULL, NULL, NULL, '2018-03-29 02:01:05', '2018-03-29 02:01:05'),
(2, 'SMK00002', 'BKB', NULL, NULL, NULL, NULL, NULL, '2018-03-29 02:01:05', '2018-03-29 02:01:05'),
(3, 'SMK00003', 'BB', NULL, NULL, NULL, NULL, NULL, '2018-03-29 02:01:06', '2018-03-29 02:01:06'),
(4, 'SMK00004', 'MP', NULL, NULL, NULL, NULL, NULL, '2018-03-29 02:01:06', '2018-03-29 02:01:06'),
(5, 'SMK00005', 'BKA', NULL, NULL, NULL, NULL, NULL, '2018-03-29 02:04:34', '2018-03-29 02:04:34'),
(6, 'SMK00006', 'BKB', NULL, NULL, NULL, NULL, NULL, '2018-03-29 02:04:34', '2018-03-29 02:04:34'),
(7, 'SMK00007', 'BB', NULL, NULL, NULL, NULL, NULL, '2018-03-29 02:04:35', '2018-03-29 02:04:35'),
(8, 'SMK00008', 'MP', NULL, NULL, NULL, NULL, NULL, '2018-03-29 02:04:35', '2018-03-29 02:04:35'),
(9, 'SMK00009', 'BKA', NULL, NULL, NULL, NULL, NULL, '2018-03-29 02:06:25', '2018-03-29 02:06:25'),
(10, 'SMK00010', 'BKB', NULL, NULL, NULL, NULL, NULL, '2018-03-29 02:06:26', '2018-03-29 02:06:26'),
(11, 'SMK00011', 'BB', NULL, NULL, NULL, NULL, NULL, '2018-03-29 02:06:26', '2018-03-29 02:06:26'),
(12, 'SMK00012', 'MP', NULL, NULL, NULL, NULL, NULL, '2018-03-29 02:06:26', '2018-03-29 02:06:26'),
(13, 'SMK00013', 'BKA', NULL, NULL, NULL, NULL, NULL, '2018-03-29 02:08:37', '2018-03-29 02:08:37');

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
  `sample_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 'SMK00001', 'BKA', NULL, NULL, NULL, NULL, NULL, '2018-03-29 02:01:05', '2018-03-29 02:01:05'),
(2, 'SMK00002', 'BKB', NULL, NULL, NULL, NULL, NULL, '2018-03-29 02:01:05', '2018-03-29 02:01:05'),
(3, 'SMK00003', 'BB', NULL, NULL, NULL, NULL, NULL, '2018-03-29 02:01:06', '2018-03-29 02:01:06'),
(4, 'SMK00004', 'MP', NULL, NULL, NULL, NULL, NULL, '2018-03-29 02:01:06', '2018-03-29 02:01:06'),
(5, 'SMK00005', 'BKA', NULL, NULL, NULL, NULL, NULL, '2018-03-29 02:04:34', '2018-03-29 02:04:34'),
(6, 'SMK00006', 'BKB', NULL, NULL, NULL, NULL, NULL, '2018-03-29 02:04:34', '2018-03-29 02:04:34'),
(7, 'SMK00007', 'BB', NULL, NULL, NULL, NULL, NULL, '2018-03-29 02:04:35', '2018-03-29 02:04:35'),
(8, 'SMK00008', 'MP', NULL, NULL, NULL, NULL, NULL, '2018-03-29 02:04:35', '2018-03-29 02:04:35'),
(9, 'SMK00009', 'BKA', NULL, NULL, NULL, NULL, NULL, '2018-03-29 02:06:25', '2018-03-29 02:06:25'),
(10, 'SMK00010', 'BKB', NULL, NULL, NULL, NULL, NULL, '2018-03-29 02:06:25', '2018-03-29 02:06:25'),
(11, 'SMK00011', 'BB', NULL, NULL, NULL, NULL, NULL, '2018-03-29 02:06:26', '2018-03-29 02:06:26'),
(12, 'SMK00012', 'MP', NULL, NULL, NULL, NULL, NULL, '2018-03-29 02:06:26', '2018-03-29 02:06:26'),
(13, 'SMK00013', 'BKA', NULL, NULL, NULL, NULL, NULL, '2018-03-29 02:08:37', '2018-03-29 02:08:37');

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
  `id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line_id` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept_id` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mid_product` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sample_date` date NOT NULL,
  `input_date` date NOT NULL,
  `sample_time` time NOT NULL,
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

--
-- Dumping data untuk tabel `t_sample_minyak`
--

INSERT INTO `t_sample_minyak` (`id`, `line_id`, `dept_id`, `mid_product`, `sample_date`, `input_date`, `sample_time`, `input_time`, `shift`, `approve`, `approver`, `approve_date`, `approve_time`, `created_by`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
('SMK00001', 'LINE 1 BAG', '2', '1001', '1970-01-01', '2018-03-29', '00:00:01', '09:01:00', 'NS1', NULL, NULL, NULL, NULL, '101', NULL, '1', '2018-03-29 02:01:05', '2018-03-29 02:01:05'),
('SMK00002', 'LINE 1 BAG', '2', '1001', '1970-01-01', '2018-03-29', '00:00:01', '09:01:00', 'NS1', NULL, NULL, NULL, NULL, '101', NULL, '1', '2018-03-29 02:01:05', '2018-03-29 02:01:05'),
('SMK00003', 'LINE 1 BAG', '2', '1001', '1970-01-01', '2018-03-29', '00:00:01', '09:01:00', 'NS1', NULL, NULL, NULL, NULL, '101', NULL, '1', '2018-03-29 02:01:06', '2018-03-29 02:01:06'),
('SMK00004', 'LINE 1 BAG', '2', '1001', '1970-01-01', '2018-03-29', '00:00:01', '09:01:00', 'NS1', NULL, NULL, NULL, NULL, '101', NULL, '1', '2018-03-29 02:01:06', '2018-03-29 02:01:06'),
('SMK00005', 'LINE 1 CUP', '3', '1001', '1970-01-01', '2018-03-29', '00:00:01', '09:04:00', 'NS1', NULL, NULL, NULL, NULL, '101', NULL, '1', '2018-03-29 02:04:34', '2018-03-29 02:04:34'),
('SMK00006', 'LINE 1 CUP', '3', '1001', '1970-01-01', '2018-03-29', '00:00:01', '09:04:00', 'NS1', NULL, NULL, NULL, NULL, '101', NULL, '1', '2018-03-29 02:04:34', '2018-03-29 02:04:34'),
('SMK00007', 'LINE 1 CUP', '3', '1001', '1970-01-01', '2018-03-29', '00:00:01', '09:04:00', 'NS1', NULL, NULL, NULL, NULL, '101', NULL, '1', '2018-03-29 02:04:34', '2018-03-29 02:04:34'),
('SMK00008', 'LINE 1 CUP', '3', '1001', '1970-01-01', '2018-03-29', '00:00:01', '09:04:00', 'NS1', NULL, NULL, NULL, NULL, '101', NULL, '1', '2018-03-29 02:04:35', '2018-03-29 02:04:35'),
('SMK00009', 'LINE 2 BAG', '2', '1001', '1970-01-01', '2018-03-29', '00:00:01', '09:06:00', 'NS1', NULL, NULL, NULL, NULL, '101', NULL, '1', '2018-03-29 02:06:25', '2018-03-29 02:06:25'),
('SMK00010', 'LINE 2 BAG', '2', '1001', '1970-01-01', '2018-03-29', '00:00:01', '09:06:00', 'NS1', NULL, NULL, NULL, NULL, '101', NULL, '1', '2018-03-29 02:06:25', '2018-03-29 02:06:25'),
('SMK00011', 'LINE 2 BAG', '2', '1001', '1970-01-01', '2018-03-29', '00:00:01', '09:06:00', 'NS1', NULL, NULL, NULL, NULL, '101', NULL, '1', '2018-03-29 02:06:26', '2018-03-29 02:06:26'),
('SMK00012', 'LINE 2 BAG', '2', '1001', '1970-01-01', '2018-03-29', '00:00:01', '09:06:00', 'NS1', NULL, NULL, NULL, NULL, '101', NULL, '1', '2018-03-29 02:06:26', '2018-03-29 02:06:26'),
('SMK00013', 'LINE 1 BAG', '2', '1001', '1970-01-01', '2018-03-29', '00:00:01', '09:08:00', 'NS1', NULL, NULL, NULL, NULL, '101', NULL, '1', '2018-03-29 02:08:37', '2018-03-29 02:08:37');

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
-- Indexes for table `log_detail`
--
ALTER TABLE `log_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_group`
--
ALTER TABLE `log_group`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `auth_group_department`
--
ALTER TABLE `auth_group_department`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `auth_group_permission`
--
ALTER TABLE `auth_group_permission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `auth_permission`
--
ALTER TABLE `auth_permission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `log_detail`
--
ALTER TABLE `log_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `log_group`
--
ALTER TABLE `log_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `t_ka`
--
ALTER TABLE `t_ka`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_pv`
--
ALTER TABLE `t_pv`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
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
