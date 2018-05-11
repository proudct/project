-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2018 at 10:11 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` char(50) NOT NULL,
  `lname` char(50) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` char(50) NOT NULL,
  `is_enable` char(1) NOT NULL,
  `create_by` int(10) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `lname`, `tel`, `email`, `address`, `username`, `password`, `role`, `is_enable`, `create_by`, `create_at`) VALUES
(1, 'ชุติมา', 'ทิพย์รักษ์', '0831943959', 'peaceheart825@gmail.com', 'ป่าดงดิบที่อ้อยๆเยอะๆ', 'proud', 'a3e0f6576a754059784babff593d798a', 'admin', 'y', NULL, '2018-05-09 17:09:11');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `event_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `file_path` varchar(100) NOT NULL,
  `create_by` varchar(100) NOT NULL,
  `update_by` varchar(100) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `event_id`, `name`, `file_path`, `create_by`, `update_by`, `create_at`, `update_at`) VALUES
(1, 1, 'banner.jpg', '_files/_banner/banner.jpg', ' ชุติมา', ' ชุติมา', '2018-05-06 09:55:38', '0000-00-00 00:00:00'),
(2, 2, '5.jpg', '_files/_banner/5.jpg', ' ชุติมา', ' ชุติมา', '2018-05-06 09:55:54', '0000-00-00 00:00:00'),
(3, 3, '201805061157044.jpg', '_files/_banner/201805061157044.jpg', ' ชุติมา', NULL, '2018-05-06 09:57:04', '0000-00-00 00:00:00'),
(4, 4, '22221920_1574641045934375_6865113902334744966_n.jpg', '_files/_banner/22221920_1574641045934375_6865113902334744966_n.jpg', ' ชุติมา', ' ชุติมา', '2018-05-09 09:01:56', '0000-00-00 00:00:00'),
(5, 5, '20180506050344nick.jpg', '_files/_banner/20180506050344nick.jpg', ' ชุติมา', NULL, '2018-05-06 15:03:44', '0000-00-00 00:00:00'),
(6, 6, '20180506050425p.jpg', '_files/_banner/20180506050425p.jpg', ' ชุติมา', NULL, '2018-05-06 15:04:25', '0000-00-00 00:00:00'),
(7, 12, '20180506050437suf.jpg', '_files/_banner/20180506050437suf.jpg', ' ชุติมา', NULL, '2018-05-06 15:04:37', '0000-00-00 00:00:00'),
(8, 13, 'r.jpg', '_files/_banner/r.jpg', ' ชุติมา', ' ชุติมา', '2018-05-10 19:48:26', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `booking_date` datetime NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `lname` varchar(50) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `company` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  `brandname` varchar(50) NOT NULL,
  `banner` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `booking_date`, `user_id`, `role`, `name`, `lname`, `tel`, `email`, `company`, `address`, `type`, `brandname`, `banner`) VALUES
(45, '2018-05-10 20:54:50', 1, 'exhibitor', 'xz', 'as', '7852', '52ew@f.v', 's', 'fe', '', '', ''),
(47, '2018-05-10 20:58:45', 1, 'exhibitor', 'ชุติมา', 'แก้วจินดา', '0831943959', 'killer_of_darkness@hotmail.com', 'สาขาระบบสารสนเทศ คณะวิทยาการจัดการ', 'มอ.หาดใหญ่', '', '', ''),
(49, '2018-05-10 21:04:55', 1, 'admin', 'ชุติมา', 'ทิพย์รักษ์', '0831943959', 'peaceheart825@gmail.com', NULL, NULL, 'sa', 'ax', 'sdcsc'),
(50, '2018-05-10 21:33:41', 4, 'exhibitor', 'กกกก', 'ดดดด', 'กดกด', 'fdsg@fgd', 'dfsgs', 'fgdf', '', '', ''),
(51, '2018-05-10 21:34:38', 4, 'exhibitor', 'กกกก', 'ดดดด', 'กดกด', 'fdsg@fgd', 'dfsgs', 'fgdf', '', '', ''),
(52, '2018-05-10 21:35:22', 4, 'exhibitor', '', '', '', '', '', '', '', '', ''),
(53, '2018-05-10 21:38:04', 4, 'exhibitor', 'xzas', 'saas', '7852', '5710513019@psu.ac.th', 'dsfds', 'fsdfdf', '', '', ''),
(54, '2018-05-10 21:40:50', 4, 'exhibitor', '', '', '', '', '', '', '', '', ''),
(55, '2018-05-10 21:57:20', 4, 'exhibitor', 'hhh', 'hhh', 'hiu', 'ness@hotmail.com', 'hkihui', 'มอ.หาดใหญ', '', '', ''),
(56, '2018-05-10 22:01:57', 4, 'exhibitor', '่รน่ร', '้รั้', '0831943959', 'killer_of_darkness@hotmail.com', NULL, NULL, '้ีิ้ีเัะ', 'อเัอเ', 'อเัอั');

-- --------------------------------------------------------

--
-- Table structure for table `booking_detail`
--

CREATE TABLE `booking_detail` (
  `id` int(10) NOT NULL,
  `booking_id` int(5) NOT NULL,
  `booth_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking_detail`
--

INSERT INTO `booking_detail` (`id`, `booking_id`, `booth_id`, `qty`) VALUES
(31, 28, 36, 3),
(32, 29, 36, 3),
(33, 30, 19, 1),
(34, 31, 20, 1),
(35, 32, 16, 1),
(36, 33, 17, 1),
(37, 34, 37, 1),
(38, 35, 13, 1),
(39, 36, 13, 1),
(40, 37, 39, 1),
(41, 38, 39, 1),
(42, 39, 18, 1),
(43, 40, 15, 1),
(44, 41, 38, 1),
(45, 42, 40, 1),
(46, 43, 9, 1),
(47, 44, 34, 1),
(48, 45, 34, 1),
(49, 46, 18, 1),
(50, 47, 15, 1),
(51, 48, 37, 1),
(52, 49, 37, 1),
(53, 53, 21, 1),
(54, 54, 21, 1),
(55, 55, 41, 1),
(56, 56, 42, 3);

-- --------------------------------------------------------

--
-- Table structure for table `booths`
--

CREATE TABLE `booths` (
  `booth_id` int(10) UNSIGNED NOT NULL,
  `zone_id` int(10) NOT NULL,
  `b_name` varchar(100) NOT NULL,
  `size` varchar(10) NOT NULL,
  `price` varchar(10) NOT NULL,
  `status` varchar(1) NOT NULL,
  `create_by` varchar(100) NOT NULL,
  `update_by` varchar(100) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booths`
--

INSERT INTO `booths` (`booth_id`, `zone_id`, `b_name`, `size`, `price`, `status`, `create_by`, `update_by`, `create_at`, `update_at`) VALUES
(9, 21, 'A1', '2*2', '18000', '', ' ชุติมา', '', '2018-05-10 18:45:31', '0000-00-00 00:00:00'),
(10, 21, 'A2', '2*2', '18000', 'w', ' ชุติมา', '', '2018-05-09 15:54:40', '0000-00-00 00:00:00'),
(11, 21, 'A3', '2*3', '22000', 'w', ' ชุติมา', '', '2018-05-09 20:59:10', '0000-00-00 00:00:00'),
(12, 21, 'A4', '2*3', '22000', 'w', ' ชุติมา', '', '2018-05-09 15:39:47', '0000-00-00 00:00:00'),
(13, 22, 'B1', '2*3', '22000', 'w', ' ชุติมา', '', '2018-05-10 17:47:48', '0000-00-00 00:00:00'),
(14, 22, 'B2', '2*3', '22000', 'f', ' ชุติมา', '', '2018-05-06 16:55:40', '0000-00-00 00:00:00'),
(15, 22, 'B3', '2*2', '18000', '', ' ชุติมา', '', '2018-05-10 18:58:45', '0000-00-00 00:00:00'),
(16, 22, 'B4', '2*2', '18000', 'f', ' ชุติมา', '', '2018-05-10 18:38:38', '0000-00-00 00:00:00'),
(17, 23, 'C1', '2*3', '22000', 'f', ' ชุติมา', '', '2018-05-10 18:38:38', '0000-00-00 00:00:00'),
(18, 23, 'C2', '2*3', '22000', '', ' ชุติมา', '', '2018-05-10 18:57:04', '0000-00-00 00:00:00'),
(19, 23, 'C3', '2*2', '18000', 'w', ' ชุติมา', '', '2018-05-10 17:01:25', '0000-00-00 00:00:00'),
(20, 23, 'C4', '2*2', '18000', 'f', ' ชุติมา', '', '2018-05-10 18:38:38', '0000-00-00 00:00:00'),
(21, 24, 'D1', '2*2', '18000', 'w', ' ชุติมา', '', '2018-05-10 19:38:05', '0000-00-00 00:00:00'),
(22, 24, 'D2', '2*2', '18000', 'f', ' ชุติมา', '', '2018-05-06 16:58:29', '0000-00-00 00:00:00'),
(23, 24, 'D3', '2*3', '22000', 'f', ' ชุติมา', '', '2018-05-06 16:58:29', '0000-00-00 00:00:00'),
(24, 24, 'D4', '2*3', '22000', 'f', ' ชุติมา', '', '2018-05-06 16:58:29', '0000-00-00 00:00:00'),
(25, 25, 'E1', '2*3', '22000', 'f', ' ชุติมา', '', '2018-05-06 16:59:05', '0000-00-00 00:00:00'),
(26, 25, 'E2', '2*2', '18000', 'f', ' ชุติมา', '', '2018-05-06 16:59:05', '0000-00-00 00:00:00'),
(27, 25, 'E3', '2*3', '22000', 'f', ' ชุติมา', '', '2018-05-06 16:59:05', '0000-00-00 00:00:00'),
(28, 25, 'E4', '2*2', '18000', 'f', ' ชุติมา', '', '2018-05-06 16:59:05', '0000-00-00 00:00:00'),
(29, 26, 'F1', '2*3', '22000', 'f', ' ชุติมา', '', '2018-05-06 17:01:31', '0000-00-00 00:00:00'),
(30, 26, 'F2', '2*2', '18000', 'f', ' ชุติมา', '', '2018-05-06 17:01:31', '0000-00-00 00:00:00'),
(31, 26, 'F3', '2*2', '18000', 'f', ' ชุติมา', '', '2018-05-06 17:01:31', '0000-00-00 00:00:00'),
(32, 26, 'F4', '2*3', '22000', 'f', ' ชุติมา', '', '2018-05-06 17:01:31', '0000-00-00 00:00:00'),
(33, 21, 'A5', '2*3', '22000', 'p', ' ชุติมา', '', '2018-05-08 10:16:30', '0000-00-00 00:00:00'),
(34, 21, 'A6', '2*2', '18000', 'w', ' ชุติมา', '', '2018-05-10 18:54:50', '0000-00-00 00:00:00'),
(36, 21, 'A7', '2*2', '18000', 'f', ' ชุติมา', '', '2018-05-10 18:38:38', '0000-00-00 00:00:00'),
(37, 21, 'A8', '2*3', '22000', 'w', ' ชุติมา', '', '2018-05-10 19:01:04', '0000-00-00 00:00:00'),
(38, 21, 'A9', '2*2', '18000', 'f', ' ชุติมา', '', '2018-05-10 18:38:38', '0000-00-00 00:00:00'),
(39, 21, 'aa1', '2*3', '22000', 'f', ' ชุติมา', '', '2018-05-10 18:38:38', '0000-00-00 00:00:00'),
(40, 21, 'aa2', '2*2', '18000', 'f', ' ชุติมา', '', '2018-05-10 18:38:38', '0000-00-00 00:00:00'),
(41, 27, 'a1', '2*3', '10000', 'w', ' ชุติมา', '', '2018-05-10 19:57:20', '0000-00-00 00:00:00'),
(42, 27, 'a2', '2*2', '8000', 'w', ' ชุติมา', '', '2018-05-10 20:01:57', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `document_id` int(10) UNSIGNED NOT NULL,
  `event_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `file_path` varchar(100) NOT NULL,
  `create_by` varchar(100) NOT NULL,
  `update_by` varchar(100) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`document_id`, `event_id`, `name`, `file_path`, `create_by`, `update_by`, `create_at`, `update_at`) VALUES
(10, 1, '201805040804180bigc-mini25.04.604.pdf', '_files/_document/201805040804180bigc-mini25.04.604.pdf', ' ชุติมา', '', '2018-05-04 18:04:18', '0000-00-00 00:00:00'),
(11, 1, '201805040804181MiniBigc280460.pdf', '_files/_document/201805040804181MiniBigc280460.pdf', ' ชุติมา', '', '2018-05-04 18:04:18', '0000-00-00 00:00:00'),
(16, 1, '201805040811330Miss Chutima Tiprak.pdf', '_files/_document/201805040811330Miss Chutima Tiprak.pdf', '', '', '2018-05-04 18:11:33', '0000-00-00 00:00:00'),
(17, 1, '201805040815080database_mbs.docx', '_files/_document/201805040815080database_mbs.docx', '', '', '2018-05-04 18:15:08', '0000-00-00 00:00:00'),
(18, 1, '201805040816350OUTLINE-OF-PROJECTS.pdf', '_files/_document/201805040816350OUTLINE-OF-PROJECTS.pdf', '', '', '2018-05-04 18:16:35', '0000-00-00 00:00:00'),
(20, 1, '201805050941310chap9- OD.pdf', '_files/_document/201805050941310chap9- OD.pdf', '', '', '2018-05-05 07:41:31', '0000-00-00 00:00:00'),
(21, 1, '201805050942330chap7-_ทฤษฎีองค์การและการออกแบบองค์การ_new.pdf', '_files/_document/201805050942330chap7-_ทฤษฎีองค์การและการออกแบบองค์การ_new.pdf', '', '', '2018-05-05 07:42:33', '0000-00-00 00:00:00'),
(22, 1, '201805050943430chap8-วัฒนธรรมองค์การ.pdf', '_files/_document/201805050943430chap8-วัฒนธรรมองค์การ.pdf', '', '', '2018-05-05 07:43:43', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(10) UNSIGNED NOT NULL,
  `ev_name` varchar(100) NOT NULL,
  `ev_caption` varchar(255) NOT NULL,
  `ev_dateS` date NOT NULL,
  `ev_dateF` date NOT NULL,
  `ev_dateRS` date NOT NULL,
  `ev_dateRF` date NOT NULL,
  `status` varchar(1) NOT NULL,
  `create_by` varchar(100) NOT NULL,
  `update_by` varchar(100) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `ev_name`, `ev_caption`, `ev_dateS`, `ev_dateF`, `ev_dateRS`, `ev_dateRF`, `status`, `create_by`, `update_by`, `create_at`, `update_at`) VALUES
(1, 'healthy & trendy fair สุขภาพดีไม่มีตกเทรนด์', 'ทดลองรอบที่1 ครั้งที่แสนสาหัส', '2018-05-01', '2018-05-01', '2018-05-01', '2018-05-01', 'y', ' ชุติมา', ' ชุติมา', '2018-05-06 11:04:33', '0000-00-00 00:00:00'),
(2, 'OTOP', 'ทดลองรอบที่1', '2018-05-01', '2018-05-01', '2018-05-01', '2018-05-01', 'n', ' ชุติมา', '', '2018-05-06 09:53:49', '0000-00-00 00:00:00'),
(3, 'Summer Bitter Sweet', 'Summer Bitter Sweet', '2018-05-06', '2018-05-06', '2018-05-06', '2018-05-06', 'n', ' ชุติมา', '', '2018-05-06 09:54:31', '0000-00-00 00:00:00'),
(4, 'ทดลองรอบที่1', 'Summer Bitter Sweet', '2018-05-06', '2018-05-06', '2018-05-06', '2018-05-06', 'n', ' ชุติมา', '', '2018-05-06 09:57:35', '0000-00-00 00:00:00'),
(5, 'ทดลองรอบที่ล้าน8', 'ทดลองรอบที่ล้าน8', '2018-05-06', '2018-05-06', '2018-05-06', '2018-05-06', 'n', ' ชุติมา', '', '2018-05-06 09:57:57', '0000-00-00 00:00:00'),
(6, 'ทดลองรอบที่ล้านT T', 'ทดลองรอบที่ล้านT T', '2018-05-06', '2018-05-06', '2018-05-06', '2018-05-06', 'n', ' ชุติมา', '', '2018-05-06 09:58:26', '0000-00-00 00:00:00'),
(12, 'qq', 'qq', '2018-05-06', '2018-05-06', '2018-05-06', '2018-05-06', 'n', ' ชุติมา', '', '2018-05-06 11:16:30', '0000-00-00 00:00:00'),
(13, 'run', 'dfdsf', '2018-05-10', '2018-05-10', '2018-05-10', '2018-05-10', 'n', ' ชุติมา', '', '2018-05-10 19:44:36', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `event_images`
--

CREATE TABLE `event_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `event_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `file_path` varchar(100) NOT NULL,
  `create_by` varchar(100) NOT NULL,
  `update_by` varchar(100) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_images`
--

INSERT INTO `event_images` (`id`, `event_id`, `name`, `file_path`, `create_by`, `update_by`, `create_at`, `update_at`) VALUES
(25, 1, 'img1.jpg', '_files/_event_image/img1.jpg', ' ชุติมา', ' ชุติมา', '2018-05-09 09:05:49', '0000-00-00 00:00:00'),
(26, 1, 'img1.jpg', '_files/_event_image/img1.jpg', ' ชุติมา', ' ชุติมา', '2018-05-09 09:05:49', '0000-00-00 00:00:00'),
(27, 3, 'banner.jpg', '_files/_event_image/banner.jpg', ' ชุติมา', ' ชุติมา', '2018-05-09 09:02:51', '0000-00-00 00:00:00'),
(28, 1, 'img1.jpg', '_files/_event_image/img1.jpg', ' ชุติมา', ' ชุติมา', '2018-05-09 09:05:49', '0000-00-00 00:00:00'),
(29, 1, 'img1.jpg', '_files/_event_image/img1.jpg', ' ชุติมา', ' ชุติมา', '2018-05-09 09:05:49', '0000-00-00 00:00:00'),
(30, 1, 'img1.jpg', '_files/_event_image/img1.jpg', ' ชุติมา', ' ชุติมา', '2018-05-09 09:05:49', '0000-00-00 00:00:00'),
(31, 1, 'img1.jpg', '_files/_event_image/img1.jpg', ' ชุติมา', ' ชุติมา', '2018-05-09 09:05:49', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `exhibitors`
--

CREATE TABLE `exhibitors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` char(50) CHARACTER SET utf8 NOT NULL,
  `lname` char(50) CHARACTER SET utf8 NOT NULL,
  `tel` varchar(10) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(50) NOT NULL,
  `company` varchar(100) NOT NULL,
  `address` varchar(100) CHARACTER SET utf8 NOT NULL,
  `role` char(50) CHARACTER SET utf8 NOT NULL,
  `is_enable` char(1) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exhibitors`
--

INSERT INTO `exhibitors` (`id`, `name`, `lname`, `tel`, `email`, `username`, `password`, `company`, `address`, `role`, `is_enable`) VALUES
(1, 'วัชรพล', 'อินทสระ', '831943959', 'killer_of_darkness@hotmail.com', 'nick', 'e2e42a07550863f8b67f5eb252581f6d', 'สาขาระบบสารสนเทศ คณะวิทยาการจัดการ', 'มอ.หาดใหญ่', 'exhibitor', 'n'),
(2, 'ซุฟยาน', 'ฮะอุรา', '831684598', '5710513039@psu.ac.th', 'suf', 'ac9dfa5e755e830154a57e3e086c2a35', 'สาขาระบบสารสนเทศ คณะวิทยาการจัดการ', 'มอ.หาดใหญ่', 'exhibitor', 'y'),
(4, 'dggf', 'fghdfh', 'fhdfh', 'gfhfdghfg@rgtr', 'rrr', '81dc9bdb52d04dc20036dbd8313ed055', 'evento', 'dgdfg', 'exhibitor', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `pay`
--

CREATE TABLE `pay` (
  `pay_id` int(10) NOT NULL,
  `booking_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `file_path` varchar(50) NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `event_id` int(10) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `file_path` varchar(100) DEFAULT NULL,
  `create_by` varchar(100) NOT NULL,
  `update_by` varchar(100) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `event_id`, `name`, `file_path`, `create_by`, `update_by`, `create_at`, `update_at`) VALUES
(1, 1, 'r.jpg', '_files/_plan/r.jpg', ' ww', ' ชุติมา', '2018-05-10 17:10:03', '0000-00-00 00:00:00'),
(2, 2, 'plan1.jpg', '_files/_plan/plan1.jpg', ' ชุติมา', NULL, '2018-05-03 18:14:39', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `zone_id` int(10) UNSIGNED NOT NULL,
  `event_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `create_by` varchar(100) NOT NULL,
  `update_by` varchar(100) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`zone_id`, `event_id`, `name`, `create_by`, `update_by`, `create_at`, `update_at`) VALUES
(21, 1, 'A1', ' ชุติมา', ' ชุติมา', '2018-05-09 07:58:15', '0000-00-00 00:00:00'),
(22, 1, 'B', ' ชุติมา', '', '2018-05-06 16:51:53', '0000-00-00 00:00:00'),
(23, 1, 'C', ' ชุติมา', '', '2018-05-06 16:51:53', '0000-00-00 00:00:00'),
(24, 2, 'D', ' ชุติมา', '', '2018-05-06 16:54:33', '0000-00-00 00:00:00'),
(25, 2, 'E', ' ชุติมา', '', '2018-05-06 16:54:45', '0000-00-00 00:00:00'),
(26, 2, 'F', ' ชุติมา', '', '2018-05-06 16:54:46', '0000-00-00 00:00:00'),
(27, 13, 'อาหาร', ' ชุติมา', '', '2018-05-10 19:49:39', '0000-00-00 00:00:00'),
(28, 13, 'กีฬา', ' ชุติมา', '', '2018-05-10 19:49:39', '0000-00-00 00:00:00'),
(29, 13, 'ความสวย', ' ชุติมา', '', '2018-05-10 19:49:39', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `booking_detail`
--
ALTER TABLE `booking_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booths`
--
ALTER TABLE `booths`
  ADD PRIMARY KEY (`booth_id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `event_images`
--
ALTER TABLE `event_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exhibitors`
--
ALTER TABLE `exhibitors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay`
--
ALTER TABLE `pay`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`zone_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `booking_detail`
--
ALTER TABLE `booking_detail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `booths`
--
ALTER TABLE `booths`
  MODIFY `booth_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `document_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `event_images`
--
ALTER TABLE `event_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `exhibitors`
--
ALTER TABLE `exhibitors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pay`
--
ALTER TABLE `pay`
  MODIFY `pay_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `zone_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
