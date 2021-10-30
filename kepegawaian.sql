-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2021 at 05:05 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kepegawaian`
--

-- --------------------------------------------------------

--
-- Table structure for table `ambil_jabatan`
--

CREATE TABLE `ambil_jabatan` (
  `id_ambil_jabatan` int(11) NOT NULL,
  `id_identitas` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `periode_mulai` varchar(50) NOT NULL,
  `periode_selesai` varchar(50) DEFAULT 'Sampai Sekarang',
  `unit_kerja` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ambil_jabatan`
--

INSERT INTO `ambil_jabatan` (`id_ambil_jabatan`, `id_identitas`, `id_jabatan`, `periode_mulai`, `periode_selesai`, `unit_kerja`) VALUES
(1, 1, 1, '2021-04-26', 'Sampai Sekarang', 'Kantor Pusat Manajemen'),
(2, 9, 1, '2021-04-26', 'Sampai Sekarang', 'Kantor Pusat Operasional'),
(3, 135, 2, 'Januari 2003', 'Juli 2005', 'BPR-BKK JATIROTO'),
(4, 135, 3, 'Juli 2005', 'Desember 2005', 'BPR-BKK JATIROTO'),
(5, 135, 3, 'Januari 2006', 'September 2007', 'CAB. JATIROTO'),
(6, 135, 3, 'Oktober 2007', 'Maret 2013', 'CAB. JATIPURNO'),
(7, 135, 4, 'Maret 2013', 'April 2018', 'Kantor Pusat'),
(8, 135, 5, 'April 2018', 'Sampai Sekarang', 'Kantor Pusat Manajemen');

-- --------------------------------------------------------

--
-- Table structure for table `ambil_pangkat`
--

CREATE TABLE `ambil_pangkat` (
  `id_ambil_pangkat` int(11) NOT NULL,
  `id_identitas` int(11) NOT NULL,
  `id_pangkat` int(11) NOT NULL,
  `thn_perolehan` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ambil_pangkat`
--

INSERT INTO `ambil_pangkat` (`id_ambil_pangkat`, `id_identitas`, `id_pangkat`, `thn_perolehan`) VALUES
(1, 1, 1, '2021-04-26'),
(2, 1, 2, '2024-04-26'),
(3, 9, 1, '2021-04-26'),
(4, 135, 1, 'Mar 2005'),
(5, 135, 4, 'Maret 2007'),
(6, 135, 3, 'Juli 2009'),
(7, 135, 5, 'Maret 2011'),
(8, 135, 6, 'Juli 2014'),
(9, 135, 7, 'Maret 2015'),
(10, 135, 8, 'Juli 2017'),
(11, 135, 9, 'Maret 2019');

-- --------------------------------------------------------

--
-- Table structure for table `ambil_pendidikan`
--

CREATE TABLE `ambil_pendidikan` (
  `id_ambil_pend` int(11) NOT NULL,
  `id_identitas` int(11) NOT NULL,
  `id_pend` int(11) NOT NULL,
  `thn_lulus` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ambil_pendidikan`
--

INSERT INTO `ambil_pendidikan` (`id_ambil_pend`, `id_identitas`, `id_pend`, `thn_lulus`) VALUES
(1, 1, 1, 2010),
(3, 1, 2, 2013),
(4, 1, 3, 2016),
(5, 1, 4, 2020),
(6, 9, 1, 2009),
(7, 9, 2, 2012),
(10, 9, 3, 2015),
(11, 9, 5, 2019),
(13, 13, 1, 2009),
(18, 135, 1, 1992),
(19, 135, 2, 1995),
(20, 135, 3, 1998),
(21, 135, 7, 2002);

-- --------------------------------------------------------

--
-- Table structure for table `ambil_users`
--

CREATE TABLE `ambil_users` (
  `id_ambil_user` int(11) NOT NULL,
  `id` int(11) UNSIGNED NOT NULL,
  `id_identitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ambil_users`
--

INSERT INTO `ambil_users` (`id_ambil_user`, `id`, `id_identitas`) VALUES
(1, 2, 1),
(2, 4, 9),
(3, 5, 10),
(4, 6, 135);

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'superadmin', 'Administrator'),
(2, 'user', 'Reguler User');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 2),
(1, 6),
(2, 4),
(2, 5),
(2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'aditya.sulistyo98@gmail.com', 1, '2021-06-10 03:50:09', 0),
(2, '::1', 'aditya.sulistyo98@gmail.com', 1, '2021-06-10 03:57:13', 0),
(3, '::1', 'sulis', NULL, '2021-06-13 07:13:05', 0),
(4, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-06-13 07:26:24', 1),
(5, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-06-13 07:27:32', 1),
(6, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-06-13 07:41:48', 1),
(7, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-06-13 07:44:03', 1),
(8, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-06-13 20:25:42', 1),
(9, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-06-13 20:34:30', 1),
(10, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-06-13 20:38:56', 1),
(11, '::1', 'sulis', NULL, '2021-06-13 20:39:09', 0),
(12, '::1', 'asdas', NULL, '2021-06-13 20:39:20', 0),
(13, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-06-13 21:21:55', 1),
(14, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-06-13 21:22:14', 1),
(15, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-06-13 22:41:32', 1),
(16, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-06-14 01:39:01', 1),
(17, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-06-14 19:59:35', 1),
(18, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-06-14 21:55:57', 1),
(19, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-06-15 02:19:06', 1),
(20, '::1', 'sulis', NULL, '2021-06-15 02:19:28', 0),
(21, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-06-15 02:19:40', 1),
(22, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-06-15 02:22:10', 1),
(23, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-06-23 02:45:12', 1),
(24, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-06-23 03:01:08', 1),
(25, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-06-27 19:57:14', 1),
(26, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-06-27 20:39:02', 1),
(27, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-06-27 21:14:48', 1),
(28, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-06-27 23:10:56', 1),
(29, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-06-28 02:23:18', 1),
(30, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-06-29 01:53:54', 1),
(31, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-06-29 20:50:50', 1),
(32, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-06-29 21:34:13', 1),
(33, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-06-29 23:42:48', 1),
(34, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-06-30 06:44:13', 1),
(35, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-06-30 20:02:17', 1),
(36, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-01 02:17:40', 1),
(37, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-04 21:11:13', 1),
(38, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-05 00:18:09', 1),
(39, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-05 07:15:07', 1),
(40, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-05 21:30:29', 1),
(41, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-06 05:46:10', 1),
(42, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-06 20:19:53', 1),
(43, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-06 20:25:26', 1),
(44, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-06 21:54:11', 1),
(45, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-07 19:27:05', 1),
(46, '::1', 'sulis', NULL, '2021-07-08 02:57:15', 0),
(47, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-08 02:57:24', 1),
(48, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-08 22:49:53', 1),
(49, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-11 20:45:25', 1),
(50, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-12 02:44:47', 1),
(51, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-12 20:36:45', 1),
(52, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-12 22:49:21', 1),
(53, '::1', 'sulis', NULL, '2021-07-13 20:28:21', 0),
(54, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-13 20:28:37', 1),
(55, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-14 02:31:40', 1),
(56, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-14 02:45:38', 1),
(57, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-14 03:56:36', 1),
(58, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-14 20:50:20', 1),
(59, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-15 20:05:48', 1),
(60, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-15 20:26:03', 1),
(61, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-15 20:43:29', 1),
(62, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-15 20:55:04', 1),
(63, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-15 20:58:32', 1),
(64, '::1', 'riskunca', NULL, '2021-07-15 21:23:43', 0),
(65, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-15 22:19:19', 1),
(66, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-15 22:26:18', 1),
(67, '::1', 'risky.kuncara97@gmail.com', 4, '2021-07-15 22:34:55', 1),
(68, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-15 22:44:46', 1),
(69, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-15 23:10:33', 1),
(70, '::1', 'risky.kuncara97@gmail.com', 4, '2021-07-15 23:11:33', 1),
(71, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-15 23:15:32', 1),
(72, '::1', 'risky.kuncara97@gmail.com', 4, '2021-07-16 03:00:21', 1),
(73, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-16 06:37:39', 1),
(74, '::1', 'risky.kuncara97@gmail.com', 4, '2021-07-16 06:49:42', 1),
(75, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-16 06:52:23', 1),
(76, '::1', 'risky.kuncara97@gmail.com', 4, '2021-07-16 06:59:44', 1),
(77, '::1', 'risky.kuncara97@gmail.com', 4, '2021-07-18 20:09:04', 1),
(78, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-18 20:59:51', 1),
(79, '::1', 'risky.kuncara97@gmail.com', 4, '2021-07-18 23:32:12', 1),
(80, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-18 23:52:13', 1),
(81, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-19 03:44:20', 1),
(82, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-19 22:39:18', 1),
(83, '::1', 'risky.kuncara97@gmail.com', 4, '2021-07-19 22:44:34', 1),
(84, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-20 07:20:28', 1),
(85, '::1', 'riskunca', NULL, '2021-07-20 07:48:17', 0),
(86, '::1', 'risky.kuncara97@gmail.com', 4, '2021-07-20 07:48:26', 1),
(87, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-20 07:48:56', 1),
(88, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-20 20:13:55', 1),
(89, '::1', 'sulis', NULL, '2021-07-20 21:00:42', 0),
(90, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-20 21:00:54', 1),
(91, '::1', 'risky.kuncara97@gmail.com', 4, '2021-07-20 22:43:37', 1),
(92, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-20 22:44:06', 1),
(93, '::1', 'risky.kuncara97@gmail.com', 4, '2021-07-20 23:54:50', 1),
(94, '::1', 'sulis', NULL, '2021-07-20 23:57:31', 0),
(95, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-20 23:57:40', 1),
(96, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-21 03:16:46', 1),
(97, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-21 03:19:58', 1),
(98, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-23 02:55:05', 1),
(99, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-25 05:04:29', 1),
(100, '::1', 'risky.kuncara97@gmail.com', 4, '2021-07-25 05:21:56', 1),
(101, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-25 05:29:10', 1),
(102, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-25 20:34:17', 1),
(103, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-26 03:04:23', 1),
(104, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-26 07:46:32', 1),
(105, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-26 22:07:59', 1),
(106, '::1', 'risky.kuncara97@gmail.com', 4, '2021-07-27 03:26:37', 1),
(107, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-27 03:29:57', 1),
(108, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-27 07:17:09', 1),
(109, '::1', 'risky.kuncara97@gmail.com', 4, '2021-07-27 07:20:20', 1),
(110, '::1', 'sulis', NULL, '2021-07-27 07:49:46', 0),
(111, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-27 07:49:59', 1),
(112, '::1', 'sulis', NULL, '2021-07-27 20:02:30', 0),
(113, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-27 20:02:38', 1),
(114, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-28 01:24:45', 1),
(115, '::1', 'risky.kuncara97@gmail.com', 4, '2021-07-28 21:36:08', 1),
(116, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-28 21:36:42', 1),
(117, '::1', 'risky.kuncara97@gmail.com', 4, '2021-07-28 22:54:56', 1),
(118, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-28 22:58:02', 1),
(119, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-28 23:50:41', 1),
(120, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-29 20:01:18', 1),
(121, '::1', 'risky.kuncara97@gmail.com', 4, '2021-07-30 07:40:35', 1),
(122, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-30 07:41:04', 1),
(123, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-30 20:35:03', 1),
(124, '::1', 'risky.kuncara97@gmail.com', 4, '2021-07-30 23:39:44', 1),
(125, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-30 23:51:46', 1),
(126, '::1', 'risky.kuncara97@gmail.com', 4, '2021-07-31 01:56:12', 1),
(127, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-07-31 01:56:53', 1),
(128, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-08-01 06:16:07', 1),
(129, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-08-01 09:35:16', 1),
(130, '::1', 'risky.kuncara97@gmail.com', 4, '2021-08-01 09:53:34', 1),
(131, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-08-01 20:35:05', 1),
(132, '::1', 'risky.kuncara97@gmail.com', 4, '2021-08-01 22:23:56', 1),
(133, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-08-01 22:29:35', 1),
(134, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-08-02 01:35:45', 1),
(135, '::1', 'pritaclaloecyangdia99@gmail.com', 5, '2021-08-02 01:39:28', 1),
(136, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-08-02 02:06:21', 1),
(137, '::1', 'risky.kuncara97@gmail.com', 4, '2021-08-02 03:07:56', 1),
(138, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-08-02 21:11:52', 1),
(139, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-08-02 22:38:24', 1),
(140, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-08-02 22:53:24', 1),
(141, '::1', 'sulis', NULL, '2021-08-03 01:33:33', 0),
(142, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-08-03 01:33:42', 1),
(143, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-08-03 20:05:53', 1),
(144, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-08-03 21:33:26', 1),
(145, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-08-04 06:00:56', 1),
(146, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-08-04 20:11:17', 1),
(147, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-08-05 20:19:52', 1),
(148, '::1', 'riskunca', NULL, '2021-08-05 20:45:28', 0),
(149, '::1', 'risky.kuncara97@gmail.com', 4, '2021-08-05 20:45:35', 1),
(150, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-08-05 20:46:35', 1),
(151, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-08-08 20:28:55', 1),
(152, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-08-11 22:15:08', 1),
(153, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-08-22 08:33:29', 1),
(154, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-08-29 20:28:04', 1),
(155, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-08-30 02:58:09', 1),
(156, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-08-30 20:06:25', 1),
(157, '::1', 'riskunca', NULL, '2021-08-30 20:12:10', 0),
(158, '::1', 'riskunca', NULL, '2021-08-30 20:12:31', 0),
(159, '::1', 'riskunca', NULL, '2021-08-30 20:12:49', 0),
(160, '::1', 'risky.kuncara97@gmail.com', 4, '2021-08-30 20:13:02', 1),
(161, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-08-30 20:15:01', 1),
(162, '::1', 'risky.kuncara97@gmail.com', 4, '2021-08-30 21:04:24', 1),
(163, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-08-30 21:11:20', 1),
(164, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-08-31 20:49:33', 1),
(165, '::1', 'riskunca', NULL, '2021-09-01 03:03:59', 0),
(166, '::1', 'riskunca', NULL, '2021-09-01 03:04:17', 0),
(167, '::1', 'risky.kuncara97@gmail.com', 4, '2021-09-01 03:04:28', 1),
(168, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-09-01 03:07:35', 1),
(169, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-09-01 03:32:41', 1),
(170, '::1', 'risky.kuncara97@gmail.com', 4, '2021-09-01 03:49:39', 1),
(171, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-09-01 03:50:26', 1),
(172, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-09-02 06:26:13', 1),
(173, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-09-02 06:38:12', 1),
(174, '::1', 'sulis', NULL, '2021-09-02 06:46:40', 0),
(175, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-09-02 20:32:35', 1),
(176, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-09-02 20:34:05', 1),
(177, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-09-02 21:06:13', 1),
(178, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-09-02 22:46:09', 1),
(179, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-09-03 02:24:14', 1),
(180, '::1', 'mulyani21@gmail.com', 6, '2021-09-03 02:40:47', 1),
(181, '::1', 'mulyani21@gmail.com', 6, '2021-09-05 06:54:42', 1),
(182, '::1', 'mulyani21@gmail.com', 6, '2021-09-05 07:06:26', 1),
(183, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-09-05 21:29:31', 1),
(184, '::1', 'sulis', NULL, '2021-09-05 22:44:56', 0),
(185, '::1', 'sulis', NULL, '2021-09-05 22:45:41', 0),
(186, '::1', 'sulis', NULL, '2021-09-05 22:45:56', 0),
(187, '::1', 'risky.kuncara97@gmail.com', 4, '2021-09-05 22:46:27', 1),
(188, '::1', 'sulis', NULL, '2021-09-05 22:47:26', 0),
(189, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-09-05 22:47:43', 1),
(190, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-09-07 20:05:13', 1),
(191, '::1', 'riskunca', NULL, '2021-09-08 22:09:49', 0),
(192, '::1', 'risky.kuncara97@gmail.com', 4, '2021-09-08 22:10:03', 1),
(193, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-09-08 22:11:01', 1),
(194, '::1', 'sulis', NULL, '2021-09-08 23:37:32', 0),
(195, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-09-08 23:37:41', 1),
(196, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-09-09 03:23:30', 1),
(197, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-09-09 06:13:15', 1),
(198, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-09-09 19:54:07', 1),
(199, '::1', 'risky.kuncara97@gmail.com', 4, '2021-09-09 22:06:25', 1),
(200, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-09-09 22:22:34', 1),
(201, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-09-10 01:29:33', 1),
(202, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-09-11 23:09:03', 1),
(203, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-09-12 08:37:57', 1),
(204, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-09-12 19:56:04', 1),
(205, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-09-13 21:32:03', 1),
(206, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-09-14 01:58:24', 1),
(207, '::1', 'aditya.sulistyo98@gmail.com', 2, '2021-09-14 20:52:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'manage-users', 'Manage All Users'),
(2, 'manage-profile', 'Manage user\'s profile');

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `data_keluarga`
--

CREATE TABLE `data_keluarga` (
  `id_data_kel` int(11) NOT NULL,
  `id_identitas` int(11) NOT NULL,
  `nama_kel` varchar(100) NOT NULL,
  `tgllahir_kel` date NOT NULL,
  `status_kel` varchar(50) NOT NULL,
  `keterangan` varchar(50) DEFAULT 'Pasangan',
  `tertanggung` char(50) DEFAULT 'Tertanggung'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_keluarga`
--

INSERT INTO `data_keluarga` (`id_data_kel`, `id_identitas`, `nama_kel`, `tgllahir_kel`, `status_kel`, `keterangan`, `tertanggung`) VALUES
(1, 1, 'Kana Hasimoto', '2021-07-16', 'Istri', 'Pasangan', 'Tertanggung'),
(3, 1, 'Monkey D Luffy', '2021-07-16', 'Anak', '', 'Tertanggung'),
(4, 9, 'Suci Susanti', '1998-03-24', 'Istri', 'Pasangan', 'Tertanggung'),
(5, 135, 'Triadmojo B', '1980-01-24', 'Suami', 'Pasangan', 'Tertanggung'),
(6, 135, 'Verrell AA', '2006-07-28', 'Anak', '', 'Tertanggung'),
(7, 135, 'Ashyla Shaziannisa A', '2013-11-17', 'Anak', '', 'Tertanggung');

-- --------------------------------------------------------

--
-- Table structure for table `identitaspeg`
--

CREATE TABLE `identitaspeg` (
  `id_identitas` int(11) NOT NULL,
  `nik` int(7) NOT NULL,
  `tmt` date DEFAULT NULL,
  `namapeg` varchar(50) NOT NULL,
  `jabatan_peg` varchar(100) NOT NULL,
  `tmplahir` char(50) NOT NULL,
  `tgllahir` date NOT NULL,
  `alamat` text NOT NULL,
  `Statuspeg` varchar(50) NOT NULL,
  `statuskeluarga` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `identitaspeg`
--

INSERT INTO `identitaspeg` (`id_identitas`, `nik`, `tmt`, `namapeg`, `jabatan_peg`, `tmplahir`, `tgllahir`, `alamat`, `Statuspeg`, `statuskeluarga`) VALUES
(1, 5810387, '2021-04-26', 'ADITYA SULISTYO, S.Kom', 'Staff TI', 'Wonogiri', '1998-03-25', 'Wonosari RT02/10 Purwosari', 'Calon Pegawai', 'Belum Menikah'),
(9, 5813587, '2021-04-26', 'RIZKY KUNCARA, S.Kom', 'Staff TI', 'WONOGIRI', '1997-07-22', 'Bulusari RT02/10, Bulusulur Wonogiri', 'Calon Pegawai', 'Belum Menikah'),
(10, 5813548, NULL, 'PRITA, S.Kom', 'Staff TI', 'WONOGIRI', '1998-03-10', 'Kaloran RT02/11, Wonogiri', 'Calon Pegawai', 'Belum Menikah'),
(11, 5813575, NULL, 'AGUS PRIHANTORO', 'Staff Pemasaran', 'WONOGIRI', '1979-06-27', 'Purwantor, RT02/1, Wonogiri', 'Calon Pegawai', 'Menikah'),
(13, 3321157, NULL, 'Amryta Dominig', 'Staff Pemasaran', 'WONOGIRI', '1997-05-17', 'Pokoh Kidul, RT02/10, Wonogiri', 'Calon Pegawai', 'Belum Menikah'),
(19, 123457, NULL, 'Alan Suryajana S.Ms', 'Staff Pemasaran', 'Semarang', '2004-01-28', 'Giriwono, Wonogiri', 'Pegawai Tetap', 'Cerai Hidup'),
(22, 3321152, NULL, 'Bram Pramono', 'Staff Pemasaran', 'WONOGIRI', '2021-05-18', 'Pokoh Kidul, RT02/10, Wonogiri', 'Pegawai Tetap', 'Menikah'),
(26, 3321150, NULL, 'Wicaksono Dimas Prasetyo, S.Kom', 'Staff TI', 'WONOGIRI', '1997-06-18', 'Pokoh Kidul, RT02/10, Wonogiri', 'Pegawai Tetap', 'Belum Menikah'),
(27, 1234567, NULL, 'Aditya Sulistyo', 'Staff Pemasaran', 'Wonogiri', '1998-03-25', 'Wonosari RT02/10, Purwosari, Wonogiri', 'Calon Pegawai', 'Belum Menikah'),
(29, 8242494, NULL, 'Gaylord Hermann', 'Staff Pemasaran', 'Idaho', '1985-07-09', '226 Bode Points\nNew Efren, OK 62681-7326', 'Calon Pegawai', 'Belum Menikah'),
(30, 304360, NULL, 'Clara Nurdiyanti', 'Staff Pemasaran', 'Sulawesi Barat', '2009-11-02', 'Psr. Jambu No. 844, Ternate 28855, Jateng', 'Calon Pegawai', 'Belum Menikah'),
(31, 7276217, NULL, 'Mursinin Siregar Oktavia', 'Staff Pemasaran', 'Kalimantan Utara', '2018-04-05', 'Psr. Moch. Toha No. 539, Padang 69768, Maluku', 'Pegawai Tetap', 'Menikah'),
(32, 433917, NULL, 'Kuncara Wage Wibowo', 'Staff Pemasaran', 'Sulawesi Tengah', '2006-02-24', 'Dk. Nanas No. 801, Bandung 84799, Papua', 'Calon Pegawai', 'Belum Menikah'),
(33, 1507267, NULL, 'Najwa Safitri', 'Staff Pemasaran', 'Kepulauan Riau', '1980-05-07', 'Ds. Tubagus Ismail No. 960, Pekanbaru 97749, Kaltara', 'Calon Pegawai', 'Belum Menikah'),
(34, 173533, NULL, 'Putri Rahimah', 'Staff Pemasaran', 'Sulawesi Utara', '1993-05-16', 'Jr. Salam No. 695, Banjarbaru 28757, Sumatra', 'Pegawai Tetap', 'Cerai Mati'),
(35, 7727698, NULL, 'Paulin Tami Usada M.M.', 'Staff Pemasaran', 'Riau', '1973-03-12', 'Psr. Bhayangkara No. 739, Denpasar 16001, Kaltim', 'Calon Pegawai', 'Belum Menikah'),
(36, 7140572, NULL, 'Cayadi Siregar S.E.I', 'Staff Pemasaran', 'Nusa Tenggara Timur', '1989-03-03', 'Jln. Elang No. 902, Kediri 57511, Kalteng', 'Pegawai Tetap', 'Menikah'),
(37, 4084047, NULL, 'Hilda Handayani', 'Staff Kepatuhan', 'Sulawesi Utara', '2008-12-16', 'Dk. Raya Setiabudhi No. 811, Administrasi Jakarta Utara 26688, Sulfur', 'Pegawai Tetap', 'Menikah'),
(38, 3217119, NULL, 'Elisa Nasyiah', 'Staff Pemasaran', 'Jambi', '1992-10-07', 'Kpg. Surapati No. 113, Banjarmasin 65487, Aceh', 'Calon Pegawai', 'Belum Menikah'),
(39, 774957, NULL, 'Ilsa Syahrini Padmasari M.TI.', 'Staff Pemasaran', 'Sulawesi Utara', '2005-05-26', 'Jln. Laswi No. 922, Lubuklinggau 94364, DKI', 'Calon Pegawai', 'Belum Menikah'),
(40, 1791698, NULL, 'Icha Utami', 'Staff Pemasaran', 'Kalimantan Selatan', '1990-06-02', 'Dk. Yogyakarta No. 340, Cilegon 15419, Sulsel', 'Calon Pegawai', 'Belum Menikah'),
(41, 5987558, NULL, 'Baktiadi Saragih', 'Staff Pemasaran', 'Kalimantan Utara', '1982-01-13', 'Kpg. Bhayangkara No. 973, Cirebon 10577, Sumut', 'Calon Pegawai', 'Belum Menikah'),
(42, 4560486, NULL, 'Perkasa Prasetyo S.Pd', 'Staff Pemasaran', 'Jambi', '2007-07-21', 'Gg. Bakau Griya Utama No. 516, Pariaman 17596, Sultra', 'Calon Pegawai', 'Belum Menikah'),
(43, 5382574, NULL, 'Kamaria Nuraini', 'Staff Pemasaran', 'Sumatera Selatan', '1991-03-22', 'Gg. Baranang Siang Indah No. 969, Mataram 45835, Papua', 'Calon Pegawai', 'Belum Menikah'),
(44, 6397538, NULL, 'Gamblang Sihotang', 'Staff Pemasaran', 'Kalimantan Tengah', '1989-11-19', 'Gg. Abdul No. 184, Bukittinggi 83036, Bali', 'Calon Pegawai', 'Belum Menikah'),
(45, 120170, NULL, 'Uda Hutasoit', 'Staff Pemasaran', 'DI Yogyakarta', '1976-11-22', 'Jr. Barasak No. 442, Cilegon 42450, Aceh', 'Calon Pegawai', 'Belum Menikah'),
(46, 467351, NULL, 'Kiandra Melani S.Kom', 'Staff Pemasaran', 'Kalimantan Selatan', '2021-03-25', 'Jln. Ters. Jakarta No. 487, Sorong 83308, DIY', 'Pegawai Tetap', 'Menikah'),
(47, 345114, NULL, 'Martani Latupono M.Farm', 'Staff Pemasaran', 'DKI Jakarta', '1992-05-14', 'Jln. Sutoyo No. 684, Tasikmalaya 67737, Kalsel', 'Calon Pegawai', 'Belum Menikah'),
(48, 1180656, NULL, 'Jindra Utama', 'Staff Pemasaran', 'Banten', '2009-03-19', 'Gg. Tangkuban Perahu No. 318, Mataram 99160, DIY', 'Calon Pegawai', 'Belum Menikah'),
(49, 5847290, NULL, 'Ghaliyati Hassanah', 'Staff Pemasaran', 'Aceh', '1977-11-13', 'Jln. Salak No. 98, Medan 47541, Kaltara', 'Calon Pegawai', 'Belum Menikah'),
(50, 111686, NULL, 'Devi Hariyah S.T.', 'Staff Pemasaran', 'Sulawesi Tengah', '2010-02-03', 'Jln. Lembong No. 126, Probolinggo 39091, DIY', 'Calon Pegawai', 'Belum Menikah'),
(51, 4788063, NULL, 'Ikhsan Tamba', 'Staff Pemasaran', 'Aceh', '2013-08-12', 'Kpg. Muwardi No. 696, Surakarta 31312, Sumbar', 'Calon Pegawai', 'Belum Menikah'),
(52, 4099998, NULL, 'Martaka Prakasa', 'Staff Pemasaran', 'Jawa Tengah', '1970-04-23', 'Gg. Veteran No. 229, Sawahlunto 85817, Banten', 'Calon Pegawai', 'Belum Menikah'),
(53, 1778352, NULL, 'Putu Cagak Prasasta S.Pt', 'Staff Pemasaran', 'Sumatera Selatan', '1986-07-30', 'Jln. Ikan No. 583, Administrasi Jakarta Timur 59688, Kalbar', 'Calon Pegawai', 'Belum Menikah'),
(54, 9266978, NULL, 'Puspa Zulaika', 'Staff Pemasaran', 'Jambi', '1976-02-15', 'Ds. Jamika No. 853, Batam 19615, Sulsel', 'Calon Pegawai', 'Belum Menikah'),
(55, 2072437, NULL, 'Edward Waskita', 'Staff Pemasaran', 'Sumatera Selatan', '2020-10-15', 'Jr. Cihampelas No. 792, Pontianak 58191, Riau', 'Calon Pegawai', 'Belum Menikah'),
(56, 335826, NULL, 'Padma Handayani', 'Staff Pemasaran', 'Bali', '2007-01-27', 'Gg. Dewi Sartika No. 778, Prabumulih 32374, Kalteng', 'Calon Pegawai', 'Belum Menikah'),
(57, 9340516, NULL, 'Alambana Prabowo S.IP', 'Staff Pemasaran', 'Sumatera Barat', '1971-11-27', 'Jln. Bazuka Raya No. 313, Mojokerto 43200, Riau', 'Calon Pegawai', 'Belum Menikah'),
(58, 4958981, NULL, 'Cornelia Cinta Laksita', 'Staff Pemasaran', 'Riau', '1988-01-03', 'Dk. Cemara No. 369, Tidore Kepulauan 23211, Kepri', 'Calon Pegawai', 'Belum Menikah'),
(59, 7430709, NULL, 'Jaeman Hutagalung', 'Staff Pemasaran', 'Sumatera Utara', '1988-01-21', 'Psr. W.R. Supratman No. 409, Sawahlunto 17343, Malut', 'Calon Pegawai', 'Belum Menikah'),
(60, 1057944, NULL, 'Amalia Nuraini', 'Staff Pemasaran', 'Bengkulu', '1980-05-20', 'Kpg. Bakau Griya Utama No. 777, Sabang 67458, Maluku', 'Calon Pegawai', 'Belum Menikah'),
(61, 9669928, NULL, 'Lega Kayun Wahyudin S.IP', 'Staff Pemasaran', 'Sulawesi Barat', '1992-05-23', 'Jr. Pasir Koja No. 594, Sabang 41217, Sumbar', 'Calon Pegawai', 'Belum Menikah'),
(62, 7709742, NULL, 'Patricia Suartini', 'Staff Pemasaran', 'Papua Barat', '2003-03-14', 'Jln. Yoga No. 725, Pasuruan 97911, NTT', 'Calon Pegawai', 'Belum Menikah'),
(63, 5212027, NULL, 'Amalia Fujiati', 'Staff Pemasaran', 'Sumatera Utara', '1978-09-21', 'Jr. Banda No. 651, Sawahlunto 51037, NTB', 'Calon Pegawai', 'Belum Menikah'),
(64, 2136376, NULL, 'Melinda Hasanah', 'Staff Pemasaran', 'DI Yogyakarta', '1976-08-08', 'Ki. Wahid No. 741, Tidore Kepulauan 44163, Kalteng', 'Calon Pegawai', 'Belum Menikah'),
(65, 4270323, NULL, 'Humaira Haryanti S.E.', 'Staff Pemasaran', 'Papua', '1994-01-01', 'Gg. Bawal No. 904, Solok 24695, Jambi', 'Calon Pegawai', 'Belum Menikah'),
(66, 2643714, NULL, 'Calista Zelaya Hartati M.Ak', 'Staff Pemasaran', 'Maluku Utara', '2012-12-26', 'Jln. Agus Salim No. 881, Jayapura 73879, Maluku', 'Calon Pegawai', 'Belum Menikah'),
(67, 5628056, NULL, 'Kiandra Hariyah S.I.Kom', 'Staff Pemasaran', 'Nusa Tenggara Timur', '1998-09-11', 'Gg. Banceng Pondok No. 94, Sawahlunto 86035, Kaltim', 'Calon Pegawai', 'Belum Menikah'),
(68, 8600629, NULL, 'Bella Riyanti S.Kom', 'Staff Pemasaran', 'Kepulauan Riau', '2013-02-01', 'Kpg. Banal No. 680, Cirebon 61299, Kalteng', 'Calon Pegawai', 'Belum Menikah'),
(69, 320974, NULL, 'Ihsan Teguh Najmudin', 'Staff Pemasaran', 'Kalimantan Tengah', '1990-07-12', 'Psr. Industri No. 661, Kotamobagu 23454, Banten', 'Calon Pegawai', 'Belum Menikah'),
(70, 9765471, NULL, 'Martani Wacana', 'Staff Pemasaran', 'Sulawesi Utara', '2007-02-13', 'Ds. Bank Dagang Negara No. 176, Pekanbaru 54429, Kaltim', 'Calon Pegawai', 'Belum Menikah'),
(71, 3203945, NULL, 'Gandi Sirait', 'Staff Pemasaran', 'Maluku', '2021-03-28', 'Jr. Achmad No. 394, Palangka Raya 77836, Sumbar', 'Calon Pegawai', 'Belum Menikah'),
(72, 9783735, NULL, 'Zulfa Kuswandari', 'Staff Pemasaran', 'Kalimantan Selatan', '1982-03-03', 'Jr. Uluwatu No. 521, Makassar 41883, Gorontalo', 'Calon Pegawai', 'Belum Menikah'),
(73, 9894682, NULL, 'Legawa Pradipta S.T.', 'Staff Pemasaran', 'Sulawesi Tengah', '1972-07-31', 'Ki. Casablanca No. 769, Medan 89769, Sulbar', 'Calon Pegawai', 'Belum Menikah'),
(74, 1430197, NULL, 'Safina Usamah', 'Staff Pemasaran', 'Maluku', '1970-09-08', 'Gg. Bazuka Raya No. 441, Palu 92667, Banten', 'Calon Pegawai', 'Belum Menikah'),
(75, 1342887, NULL, 'Luwes Tedi Halim S.Ked', 'Staff Pemasaran', 'DI Yogyakarta', '1970-08-04', 'Jr. Supomo No. 400, Pontianak 62845, Babel', 'Calon Pegawai', 'Belum Menikah'),
(76, 9354707, NULL, 'Reksa Nalar Maulana', 'Staff Pemasaran', 'Sumatera Selatan', '1995-07-15', 'Dk. Yoga No. 686, Palu 18602, Sulsel', 'Calon Pegawai', 'Belum Menikah'),
(77, 4660185, NULL, 'Melinda Ulva Nurdiyanti S.Ked', 'Staff Pemasaran', 'Sulawesi Barat', '1982-04-20', 'Dk. Gading No. 525, Tangerang Selatan 64233, Sulut', 'Calon Pegawai', 'Belum Menikah'),
(78, 7299032, NULL, 'Vanesa Hasanah', 'Staff Pemasaran', 'Jawa Tengah', '1996-08-19', 'Ki. Camar No. 91, Surabaya 19310, Sulsel', 'Calon Pegawai', 'Belum Menikah'),
(79, 2196278, NULL, 'Murti Megantara', 'Staff Pemasaran', 'Kalimantan Utara', '2013-11-21', 'Jr. Thamrin No. 377, Banjarbaru 55564, Maluku', 'Calon Pegawai', 'Belum Menikah'),
(80, 9610430, NULL, 'Ilsa Yulianti', 'Staff Pemasaran', 'Kalimantan Selatan', '2008-03-17', 'Jln. Bahagia  No. 591, Administrasi Jakarta Selatan 85711, Jabar', 'Calon Pegawai', 'Belum Menikah'),
(81, 3321151, NULL, 'Indah Kusuma', 'Teller', 'WONOGIRI', '2017-01-31', 'Segawe Purwosari Wonogiri', 'Pegawai Tetap', 'Menikah'),
(82, 9610297, NULL, 'Damu Mandala', 'Staff Pemasaran', 'DI Yogyakarta', '1972-04-28', 'Ds. Abdul Rahmat No. 195, Pagar Alam 33110, Banten', 'Calon Pegawai', 'Belum Menikah'),
(83, 9103532, NULL, 'Banawa Prasetyo', 'Staff Pemasaran', 'Sulawesi Utara', '1994-02-07', 'Kpg. Veteran No. 612, Balikpapan 48866, Pabar', 'Calon Pegawai', 'Belum Menikah'),
(84, 2400718, NULL, 'Yuliana Hilda Hastuti S.Gz', 'Staff Pemasaran', 'Sumatera Selatan', '1975-05-18', 'Dk. Suharso No. 873, Sibolga 23054, Kalteng', 'Calon Pegawai', 'Belum Menikah'),
(85, 9454554, NULL, 'Maya Kusmawati', 'Staff Pemasaran', 'Maluku Utara', '2008-06-25', 'Dk. Rajawali No. 534, Parepare 26687, Banten', 'Calon Pegawai', 'Belum Menikah'),
(86, 5298178, NULL, 'Sarah Hassanah', 'Staff Pemasaran', 'Kalimantan Barat', '1976-03-28', 'Ds. Gajah No. 794, Palangka Raya 61063, NTB', 'Calon Pegawai', 'Belum Menikah'),
(87, 5244926, NULL, 'Taufik Ridwan Nababan S.Sos', 'Staff Pemasaran', 'Papua Barat', '1974-12-11', 'Jr. Baiduri No. 590, Magelang 45500, Sumbar', 'Calon Pegawai', 'Belum Menikah'),
(88, 2676363, NULL, 'Endah Pudjiastuti', 'Staff Pemasaran', 'Papua', '2004-05-02', 'Jr. Gegerkalong Hilir No. 851, Depok 64774, Sulbar', 'Calon Pegawai', 'Belum Menikah'),
(89, 5893434, NULL, 'Teguh Prakasa S.Sos', 'Staff Pemasaran', 'Kalimantan Timur', '1972-09-30', 'Jln. Baranang No. 460, Sawahlunto 61579, Kalteng', 'Calon Pegawai', 'Belum Menikah'),
(90, 1429532, NULL, 'Zaenab Rachel Nuraini', 'Staff Pemasaran', 'Sumatera Barat', '2015-08-07', 'Dk. Banceng Pondok No. 916, Palu 63204, Sultra', 'Calon Pegawai', 'Belum Menikah'),
(91, 1937640, NULL, 'Shania Pratiwi', 'Staff Pemasaran', 'Jawa Tengah', '2015-01-19', 'Jln. Bata Putih No. 802, Padang 96813, Banten', 'Calon Pegawai', 'Belum Menikah'),
(92, 3913596, NULL, 'Hairyanto Paiman Mangunsong S.E.I', 'Staff Pemasaran', 'DKI Jakarta', '1999-03-10', 'Jln. Salak No. 283, Tanjung Pinang 21671, Sulsel', 'Calon Pegawai', 'Belum Menikah'),
(93, 6886257, NULL, 'Bancar Olga Kurniawan', 'Staff Pemasaran', 'Sulawesi Barat', '1998-03-16', 'Ds. Jaksa No. 318, Tarakan 16550, NTT', 'Calon Pegawai', 'Belum Menikah'),
(94, 1658788, NULL, 'Belinda Ratna Mulyani', 'Staff Pemasaran', 'Kepulauan Bangka Belitung', '2007-05-15', 'Dk. Kiaracondong No. 727, Pekalongan 74334, Sulbar', 'Calon Pegawai', 'Belum Menikah'),
(95, 7924535, NULL, 'Ihsan Rajata S.Gz', 'Staff Pemasaran', 'Nusa Tenggara Barat', '1992-11-26', 'Kpg. Karel S. Tubun No. 868, Blitar 76637, Kaltim', 'Calon Pegawai', 'Belum Menikah'),
(96, 4915166, NULL, 'Bahuraksa Budi Saptono S.E.I', 'Staff Pemasaran', 'Kalimantan Utara', '1976-07-27', 'Ki. Cikutra Timur No. 916, Medan 17331, Sulsel', 'Calon Pegawai', 'Belum Menikah'),
(97, 9493293, NULL, 'Kunthara Garang Situmorang', 'Staff Pemasaran', 'Kalimantan Timur', '1979-10-14', 'Dk. Basoka Raya No. 726, Sorong 30544, Riau', 'Calon Pegawai', 'Belum Menikah'),
(98, 4902876, NULL, 'Kajen Legawa Dongoran', 'Staff Pemasaran', 'Aceh', '2012-02-14', 'Jr. Gremet No. 173, Bogor 86341, Kepri', 'Calon Pegawai', 'Belum Menikah'),
(99, 3061908, NULL, 'Mursita Anggriawan', 'Staff Pemasaran', 'DKI Jakarta', '1993-03-04', 'Psr. Baha No. 896, Bima 57696, Babel', 'Calon Pegawai', 'Belum Menikah'),
(100, 2176108, NULL, 'Yulia Puspasari', 'Staff Pemasaran', 'Sumatera Utara', '1987-01-06', 'Gg. Casablanca No. 559, Administrasi Jakarta Timur 33531, Jateng', 'Calon Pegawai', 'Belum Menikah'),
(101, 71710, NULL, 'Jarwa Dongoran', 'Staff Pemasaran', 'Sulawesi Utara', '2019-07-24', 'Ds. Bah Jaya No. 332, Madiun 15604, Kalteng', 'Calon Pegawai', 'Belum Menikah'),
(102, 2409254, NULL, 'Julia Nasyidah', 'Staff Pemasaran', 'Sulawesi Barat', '2011-04-21', 'Jln. Salam No. 990, Administrasi Jakarta Pusat 89877, Sulut', 'Calon Pegawai', 'Belum Menikah'),
(103, 2560425, NULL, 'Azalea Widiastuti', 'Staff Pemasaran', 'Kalimantan Selatan', '1988-03-02', 'Psr. Sadang Serang No. 436, Prabumulih 23030, Kalsel', 'Calon Pegawai', 'Belum Menikah'),
(104, 1633542, NULL, 'Aswani Maryadi', 'Staff Pemasaran', 'Sulawesi Tengah', '1997-08-30', 'Jr. Ciwastra No. 468, Jayapura 55630, Sulbar', 'Calon Pegawai', 'Belum Menikah'),
(105, 437920, NULL, 'Farhunnisa Ulva Nurdiyanti M.Pd', 'Staff Pemasaran', 'Maluku', '2007-06-12', 'Ds. Soekarno Hatta No. 205, Banjar 76202, Bali', 'Calon Pegawai', 'Belum Menikah'),
(106, 2726537, NULL, 'Ifa Melani', 'Staff Pemasaran', 'Jambi', '1997-01-01', 'Ki. Suharso No. 876, Tanjung Pinang 16214, Bengkulu', 'Calon Pegawai', 'Belum Menikah'),
(107, 2303318, NULL, 'Mala Oktaviani S.IP', 'Staff Pemasaran', 'Sulawesi Tengah', '1994-05-04', 'Gg. Laksamana No. 666, Bengkulu 20046, Kalteng', 'Calon Pegawai', 'Belum Menikah'),
(108, 9362682, NULL, 'Kambali Pangeran Wibowo', 'Staff Pemasaran', 'Sulawesi Tengah', '1995-06-08', 'Dk. Ciwastra No. 81, Lubuklinggau 19803, Sumut', 'Calon Pegawai', 'Belum Menikah'),
(109, 2064005, NULL, 'Kayun Timbul Megantara S.E.', 'Staff Pemasaran', 'Nusa Tenggara Barat', '2015-05-25', 'Dk. Yohanes No. 11, Dumai 43880, Banten', 'Calon Pegawai', 'Belum Menikah'),
(110, 7676156, NULL, 'Jasmin Uyainah M.Pd', 'Staff Pemasaran', 'Kepulauan Riau', '1993-03-26', 'Psr. Bakaru No. 895, Singkawang 29900, Sumbar', 'Calon Pegawai', 'Belum Menikah'),
(111, 9567188, NULL, 'Salimah Ulva Anggraini S.E.', 'Staff Pemasaran', 'Kalimantan Barat', '1978-11-26', 'Gg. Sutarjo No. 335, Langsa 25103, Riau', 'Calon Pegawai', 'Belum Menikah'),
(112, 3254244, NULL, 'Kadir Simanjuntak', 'Staff Pemasaran', 'Papua Barat', '2008-02-03', 'Psr. Agus Salim No. 131, Tanjungbalai 66561, Riau', 'Calon Pegawai', 'Belum Menikah'),
(113, 1260733, NULL, 'Kasusra Waskita', 'Staff Pemasaran', 'Sumatera Barat', '2012-11-14', 'Ki. Ahmad Dahlan No. 359, Banjar 29525, Kalteng', 'Calon Pegawai', 'Belum Menikah'),
(114, 4392496, NULL, 'Yuliana Hasanah', 'Staff Pemasaran', 'Papua Barat', '1978-11-17', 'Jr. Teuku Umar No. 454, Padang 74064, Malut', 'Calon Pegawai', 'Belum Menikah'),
(115, 6519808, NULL, 'Dalimin Nababan', 'Staff Pemasaran', 'DI Yogyakarta', '1992-04-26', 'Kpg. Ters. Buah Batu No. 157, Cilegon 75017, Sumut', 'Calon Pegawai', 'Belum Menikah'),
(116, 3065218, NULL, 'Latika Puspasari', 'Staff Pemasaran', 'Kalimantan Timur', '1975-07-06', 'Ki. Sukabumi No. 378, Bitung 43229, Bali', 'Calon Pegawai', 'Belum Menikah'),
(117, 2106063, NULL, 'Queen Halima Laksmiwati', 'Staff Pemasaran', 'Sulawesi Utara', '2009-01-14', 'Jln. Madiun No. 609, Kotamobagu 76692, Malut', 'Calon Pegawai', 'Belum Menikah'),
(118, 4497033, NULL, 'Maimunah Halimah', 'Staff Pemasaran', 'Papua', '2021-01-22', 'Jln. Gatot Subroto No. 552, Surabaya 56479, DKI', 'Calon Pegawai', 'Belum Menikah'),
(119, 2845719, NULL, 'Makara Parman Hakim S.Pd', 'Staff Pemasaran', 'Kepulauan Bangka Belitung', '1977-07-26', 'Psr. Kusmanto No. 783, Batu 26771, Gorontalo', 'Calon Pegawai', 'Belum Menikah'),
(120, 8999522, NULL, 'Hasta Banawi Simanjuntak', 'Staff Pemasaran', 'Gorontalo', '1983-10-27', 'Kpg. Gajah Mada No. 15, Metro 57188, Sumsel', 'Calon Pegawai', 'Belum Menikah'),
(121, 6659230, NULL, 'Ajimin Dongoran', 'Staff Pemasaran', 'Sulawesi Tengah', '1988-04-27', 'Ki. Banda No. 25, Pariaman 75643, NTB', 'Calon Pegawai', 'Belum Menikah'),
(122, 2246680, NULL, 'Qori Riyanti S.Pd', 'Staff Pemasaran', 'Gorontalo', '2010-05-08', 'Ki. Urip Sumoharjo No. 687, Tangerang 77360, Sulteng', 'Calon Pegawai', 'Belum Menikah'),
(124, 6784367, NULL, 'Puji Raisa Rahimah M.Ak', 'Staff Pemasaran', 'Banten', '1980-02-18', 'Gg. K.H. Wahid Hasyim (Kopo) No. 843, Tidore Kepulauan 35135, Jateng', 'Calon Pegawai', 'Belum Menikah'),
(125, 974185, NULL, 'Kardi Siregar', 'Staff Pemasaran', 'Kalimantan Timur', '2019-12-21', 'Gg. Sumpah Pemuda No. 664, Banjarbaru 66327, Kalbar', 'Calon Pegawai', 'Belum Menikah'),
(126, 3307121, NULL, 'Wardi Firgantoro', 'Staff Pemasaran', 'Papua Barat', '1970-08-31', 'Gg. Bass No. 720, Makassar 22311, Jatim', 'Calon Pegawai', 'Belum Menikah'),
(127, 60643, NULL, 'Ade Diana Widiastuti S.Ked', 'Staff Pemasaran', 'Maluku Utara', '2012-07-01', 'Ki. Yoga No. 51, Pariaman 43677, Sulteng', 'Calon Pegawai', 'Belum Menikah'),
(128, 2279035, NULL, 'Marsito Nashiruddin', 'Staff Pemasaran', 'Banten', '2007-02-17', 'Jln. Cikapayang No. 663, Semarang 70477, Jatim', 'Calon Pegawai', 'Belum Menikah'),
(129, 2293123, NULL, 'Radit Dariati Januar S.Pd', 'Staff Pemasaran', 'Jawa Barat', '2009-06-08', 'Gg. Kalimalang No. 164, Subulussalam 25354, DIY', 'Calon Pegawai', 'Belum Menikah'),
(130, 3021534, NULL, 'Salwa Anggraini', 'Staff Pemasaran', 'Maluku', '2008-10-14', 'Psr. Adisumarmo No. 682, Administrasi Jakarta Barat 94412, Kalbar', 'Calon Pegawai', 'Belum Menikah'),
(131, 1870360, NULL, 'Hardana Marpaung', 'Staff Pemasaran', 'Bali', '2020-05-02', 'Jr. Sutan Syahrir No. 130, Depok 32054, Jateng', 'Calon Pegawai', 'Belum Menikah'),
(133, 3321156, NULL, 'Indah Kusuma', 'Staff Kepatuhan', 'Semarang', '2021-07-06', 'Pokoh Kidul, RT02/10, Wonogiri', 'Calon Pegawai', 'Cerai Mati'),
(134, 3321155, NULL, 'Laura Isabella', 'Teller', 'Sulawesi SELATAN', '2021-07-13', 'Dk. Raya Setiabudhi No. 811, Administrasi Jakarta Utara 26688, Sulfur', 'Calon Pegawai', 'Belum Menikah'),
(135, 5810255, '2005-03-01', 'Mulyani, SE', 'Kasubid SDM dan Sekretariat KPM', 'WONOGIRI', '1980-01-11', 'Ngrandu 02/02 Gunungsari Jatisrono', 'Pegawai Tetap', 'Menikah');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Staff TI'),
(2, 'Sie. Dana'),
(3, 'Kasir'),
(4, 'Staf TU Direksi'),
(5, 'Kasubid SDM dan Sekretariat');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1623161454, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pangkat`
--

CREATE TABLE `pangkat` (
  `id_pangkat` int(11) NOT NULL,
  `nama_pangkat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pangkat`
--

INSERT INTO `pangkat` (`id_pangkat`, `nama_pangkat`) VALUES
(1, 'Staff Muda/C1'),
(2, 'Staff Muda C2'),
(3, 'Staf Muda I/C2'),
(4, 'Gaji Berkala /C1'),
(5, 'Gaji Berkala /C2 '),
(6, 'Staf /C3'),
(7, 'Gaji Berkala /C3'),
(8, 'Staf I/C4'),
(9, 'Gaji Berkala /C4');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id_pend` int(11) NOT NULL,
  `nama_pendidikan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id_pend`, `nama_pendidikan`) VALUES
(1, 'SD'),
(2, 'SMP'),
(3, 'SLTA'),
(4, 'S1 - Sistem Informasi'),
(5, 'S1 - Teknik Informatika'),
(7, 'S1 - Ekonomi');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan_nonformal`
--

CREATE TABLE `pendidikan_nonformal` (
  `id_nonformal` int(11) NOT NULL,
  `id_identitas` int(7) NOT NULL,
  `nama_pend_non` varchar(100) NOT NULL,
  `thn_lulus_non` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendidikan_nonformal`
--

INSERT INTO `pendidikan_nonformal` (`id_nonformal`, `id_identitas`, `nama_pend_non`, `thn_lulus_non`) VALUES
(1, 1, 'Mikrotik', 2021),
(2, 1, 'Akuntansi dan Bisnis', 2023);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) NOT NULL DEFAULT 'default.svg',
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `fullname`, `user_image`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'aditya.sulistyo98@gmail.com', 'sulis', 'Aditya Sulistyo', 'adit.png', '$2y$10$WgnW08m88dl92l3UdaRZBeEBiP6MbeD62IrTvPOlt8wBv3/A.2GJ2', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-06-13 07:26:08', '2021-06-13 07:26:08', NULL),
(4, 'risky.kuncara97@gmail.com', 'riskunca', 'Rizky Kuncara', 'default.svg', '$2y$10$4L1MgOOqHUAjib0YiK1DcOSauAI60z9MJSL/CA4wZBc.KAY.6gYK6', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-07-15 22:34:35', '2021-07-15 22:34:35', NULL),
(5, 'pritaclaloecyangdia99@gmail.com', 'Prita', 'Prita', 'default.svg', '$2y$10$7lOV9Vsg70mhZvoXbaaEVONEXu3..tFscAiBugCYxsGkE4RR.UtlO', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-08-02 01:39:16', '2021-08-02 01:39:16', NULL),
(6, 'mulyani21@gmail.com', 'mulyani', 'Mulyani', 'mulyani.png', '$2y$10$MCs2MV4kPzDIZSLfDVoT5.5tf.3Lu8X.Pj/gYd4ehBavLljsmJqZK', NULL, NULL, NULL, 'b0dfaa2967d1e52d2f5af78b418e653e', NULL, NULL, 1, 0, '2021-09-03 02:35:24', '2021-09-03 02:35:24', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ambil_jabatan`
--
ALTER TABLE `ambil_jabatan`
  ADD PRIMARY KEY (`id_ambil_jabatan`),
  ADD KEY `id_identitas` (`id_identitas`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indexes for table `ambil_pangkat`
--
ALTER TABLE `ambil_pangkat`
  ADD PRIMARY KEY (`id_ambil_pangkat`),
  ADD KEY `id_identitas` (`id_identitas`),
  ADD KEY `id_pangkat` (`id_pangkat`);

--
-- Indexes for table `ambil_pendidikan`
--
ALTER TABLE `ambil_pendidikan`
  ADD PRIMARY KEY (`id_ambil_pend`),
  ADD KEY `id_iden_pend` (`id_identitas`),
  ADD KEY `id_pend` (`id_pend`);

--
-- Indexes for table `ambil_users`
--
ALTER TABLE `ambil_users`
  ADD PRIMARY KEY (`id_ambil_user`),
  ADD KEY `id_identitas` (`id_identitas`),
  ADD KEY `id_usersbaru` (`id`);

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `data_keluarga`
--
ALTER TABLE `data_keluarga`
  ADD PRIMARY KEY (`id_data_kel`),
  ADD KEY `id_identitaspeg` (`id_identitas`) USING BTREE;

--
-- Indexes for table `identitaspeg`
--
ALTER TABLE `identitaspeg`
  ADD PRIMARY KEY (`id_identitas`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pangkat`
--
ALTER TABLE `pangkat`
  ADD PRIMARY KEY (`id_pangkat`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id_pend`);

--
-- Indexes for table `pendidikan_nonformal`
--
ALTER TABLE `pendidikan_nonformal`
  ADD PRIMARY KEY (`id_nonformal`),
  ADD KEY `id_identitas` (`id_identitas`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ambil_jabatan`
--
ALTER TABLE `ambil_jabatan`
  MODIFY `id_ambil_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ambil_pangkat`
--
ALTER TABLE `ambil_pangkat`
  MODIFY `id_ambil_pangkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ambil_pendidikan`
--
ALTER TABLE `ambil_pendidikan`
  MODIFY `id_ambil_pend` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `ambil_users`
--
ALTER TABLE `ambil_users`
  MODIFY `id_ambil_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_keluarga`
--
ALTER TABLE `data_keluarga`
  MODIFY `id_data_kel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `identitaspeg`
--
ALTER TABLE `identitaspeg`
  MODIFY `id_identitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pangkat`
--
ALTER TABLE `pangkat`
  MODIFY `id_pangkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id_pend` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pendidikan_nonformal`
--
ALTER TABLE `pendidikan_nonformal`
  MODIFY `id_nonformal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ambil_jabatan`
--
ALTER TABLE `ambil_jabatan`
  ADD CONSTRAINT `id_identitas_jab` FOREIGN KEY (`id_identitas`) REFERENCES `identitaspeg` (`id_identitas`),
  ADD CONSTRAINT `id_jabatan` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`);

--
-- Constraints for table `ambil_pangkat`
--
ALTER TABLE `ambil_pangkat`
  ADD CONSTRAINT `ambil_pangkat_ibfk_1` FOREIGN KEY (`id_identitas`) REFERENCES `identitaspeg` (`id_identitas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ambil_pangkat_ibfk_2` FOREIGN KEY (`id_pangkat`) REFERENCES `pangkat` (`id_pangkat`);

--
-- Constraints for table `ambil_pendidikan`
--
ALTER TABLE `ambil_pendidikan`
  ADD CONSTRAINT `id_iden_pend` FOREIGN KEY (`id_identitas`) REFERENCES `identitaspeg` (`id_identitas`),
  ADD CONSTRAINT `id_pend` FOREIGN KEY (`id_pend`) REFERENCES `pendidikan` (`id_pend`);

--
-- Constraints for table `ambil_users`
--
ALTER TABLE `ambil_users`
  ADD CONSTRAINT `id_identitas_user` FOREIGN KEY (`id_identitas`) REFERENCES `identitaspeg` (`id_identitas`),
  ADD CONSTRAINT `id_usersamb` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `data_keluarga`
--
ALTER TABLE `data_keluarga`
  ADD CONSTRAINT `id_identitas` FOREIGN KEY (`id_identitas`) REFERENCES `identitaspeg` (`id_identitas`);

--
-- Constraints for table `pendidikan_nonformal`
--
ALTER TABLE `pendidikan_nonformal`
  ADD CONSTRAINT `pendidikan_nonformal_ibfk_1` FOREIGN KEY (`id_identitas`) REFERENCES `identitaspeg` (`id_identitas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
