-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 14, 2025 at 08:34 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab7`
--

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ip` varchar(45) NOT NULL,
  `request_time` datetime NOT NULL,
  `url` text NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=235 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `ip`, `request_time`, `url`, `status`) VALUES
(1, '::1', '2025-04-01 16:51:09', '/task6/', 200),
(2, '::1', '2025-04-01 16:51:27', '/task6/', 200),
(4, '::1', '2025-04-01 17:31:57', '/task6/', 200),
(5, '::1', '2025-04-01 17:31:57', '/task6/', 200),
(6, '::1', '2025-04-01 17:32:16', '/task6/', 200),
(7, '::1', '2025-04-01 17:32:17', '/task6/', 200),
(8, '::1', '2025-04-01 17:32:18', '/task6/index.php', 200),
(9, '::1', '2025-04-01 17:32:19', '/task6/index.php', 200),
(10, '::1', '2025-04-01 17:32:19', '/task6/index.php', 200),
(11, '::1', '2025-04-01 17:32:19', '/task6/about.php', 200),
(12, '::1', '2025-04-01 17:32:20', '/task6/about.php', 200),
(13, '::1', '2025-04-01 17:32:21', '/task6/about.php', 200),
(14, '::1', '2025-04-01 17:33:06', '/task6/gdfgs', 200),
(15, '::1', '2025-04-01 17:34:12', '/task6/index.php', 200),
(16, '::1', '2025-04-01 17:34:12', '/task6/index.php', 200),
(17, '::1', '2025-04-01 17:34:12', '/task6/index.php', 200),
(18, '::1', '2025-04-01 17:34:14', '/task6/index.php', 200),
(19, '::1', '2025-04-01 17:34:15', '/task6/index.php', 200),
(20, '::1', '2025-04-01 17:35:03', '/task6/index.%D0%BF%D0%B2%D0%B0php', 404),
(21, '::1', '2025-04-01 17:35:04', '/task6/index.php', 200),
(22, '::1', '2025-04-01 17:35:12', '/task6/index.php%D1%80%D0%B0%D0%B2', 404),
(23, '::1', '2025-04-01 17:35:13', '/task6/index.php', 200),
(24, '::1', '2025-04-01 17:35:17', '/task6/index.php%D0%B2%D0%BF%D0%B0%D1%80', 404),
(25, '::1', '2025-04-01 17:35:19', '/task6/index.php%D0%B2%D0%BF%D0%B0%D1%80', 404),
(26, '::1', '2025-04-01 17:35:20', '/task6/index.php%D0%B2%D0%BF%D0%B0%D1%80', 404),
(27, '::1', '2025-04-01 17:35:20', '/task6/index.php', 200),
(28, '::1', '2025-04-01 18:03:02', '/task6/index.php', 200),
(29, '::1', '2025-04-01 18:03:14', '/task6/index.php', 200),
(30, '::1', '2025-04-01 18:03:15', '/task6/index.php', 200),
(31, '::1', '2025-04-01 18:03:17', '/task6/index.php', 200),
(32, '::1', '2025-04-01 18:03:18', '/task6/index.php', 200),
(33, '::1', '2025-04-01 18:03:31', '/task6/index.php', 200),
(34, '::1', '2025-04-01 18:03:33', '/task6/index.php', 200),
(35, '::1', '2025-04-01 18:03:39', '/task6/index.php', 200),
(36, '::1', '2025-04-01 18:03:42', '/task6/index.php', 200),
(37, '::1', '2025-04-01 18:03:50', '/task6/index.php', 200),
(38, '::1', '2025-04-01 18:03:52', '/task6/index.php', 200),
(39, '::1', '2025-04-01 18:03:55', '/task6/index.phpf', 404),
(40, '::1', '2025-04-01 18:03:56', '/task6/index.php', 200),
(41, '::1', '2025-04-01 18:06:18', '/task6/index.php', 200),
(42, '::1', '2025-04-01 18:06:19', '/task6/index.php', 200),
(43, '::1', '2025-04-01 18:06:19', '/task6/index.php', 200),
(44, '::1', '2025-04-01 18:06:19', '/task6/index.php', 200),
(45, '::1', '2025-04-01 18:06:20', '/task6/index.php', 200),
(46, '::1', '2025-04-01 18:06:20', '/task6/index.php', 200),
(47, '::1', '2025-04-01 18:06:20', '/task6/index.php', 200),
(48, '::1', '2025-04-01 18:06:20', '/task6/index.php', 200),
(49, '::1', '2025-04-01 18:06:20', '/task6/index.php', 200),
(50, '::1', '2025-04-01 18:06:21', '/task6/index.php', 200),
(51, '::1', '2025-04-01 18:06:21', '/task6/index.php', 200),
(52, '::1', '2025-04-01 18:06:21', '/task6/index.php', 200),
(53, '::1', '2025-04-01 18:06:21', '/task6/index.php', 200),
(54, '::1', '2025-04-01 18:06:23', '/task6/index.php', 200),
(55, '::1', '2025-04-01 18:06:23', '/task6/index.php', 200),
(56, '::1', '2025-04-01 18:06:23', '/task6/index.php', 200),
(57, '::1', '2025-04-01 18:06:24', '/task6/index.php', 200),
(58, '::1', '2025-04-01 18:06:24', '/task6/index.php', 200),
(59, '::1', '2025-04-01 18:06:24', '/task6/index.php', 200),
(60, '::1', '2025-04-01 18:06:24', '/task6/index.php', 200),
(61, '::1', '2025-04-01 18:06:24', '/task6/index.php', 200),
(62, '::1', '2025-04-01 18:06:25', '/task6/index.php', 200),
(63, '::1', '2025-04-01 18:06:25', '/task6/index.php', 200),
(64, '::1', '2025-04-01 18:06:25', '/task6/index.php', 200),
(65, '::1', '2025-04-01 18:06:38', '/task6/index.php', 200),
(66, '::1', '2025-04-01 18:06:57', '/task6/index.php', 200),
(67, '::1', '2025-04-01 18:06:58', '/task6/statsfd.php', 404),
(68, '::1', '2025-04-01 18:06:59', '/task6/statsfd.php', 404),
(69, '::1', '2025-04-01 18:06:59', '/task6/statsfd.php', 404),
(70, '::1', '2025-04-01 18:06:59', '/task6/statsfd.php', 404),
(71, '::1', '2025-04-01 18:07:05', '/task6/index.php', 200),
(72, '::1', '2025-04-01 18:07:06', '/task6/statsfd.php', 404),
(73, '::1', '2025-04-01 18:07:06', '/task6/index.php', 200),
(74, '::1', '2025-04-02 05:41:12', '/task6/', 200),
(75, '::1', '2025-04-02 05:41:15', '/task6/index.php', 200),
(76, '::1', '2025-04-02 05:41:19', '/task6/index.php', 200),
(77, '::1', '2025-04-02 05:41:21', '/task6/statsfd.php', 404),
(78, '::1', '2025-04-02 05:41:22', '/task6/statsfd.php', 404),
(79, '::1', '2025-04-02 05:41:22', '/task6/statsfd.php', 404),
(80, '::1', '2025-04-02 05:41:23', '/task6/statsfd.php', 404),
(81, '::1', '2025-04-02 05:41:23', '/task6/statsfd.php', 404),
(82, '::1', '2025-04-02 05:41:24', '/task6/index.php', 200),
(83, '::1', '2025-04-02 05:41:25', '/task6/index.php', 200),
(84, '::1', '2025-04-02 05:41:26', '/task6/index.php', 200),
(85, '::1', '2025-04-02 05:41:26', '/task6/index.php', 200),
(86, '::1', '2025-04-02 05:41:26', '/task6/index.php', 200),
(87, '::1', '2025-04-02 05:41:26', '/task6/index.php', 200),
(88, '::1', '2025-04-02 05:41:26', '/task6/index.php', 200),
(89, '::1', '2025-04-02 05:41:27', '/task6/index.php', 200),
(90, '::1', '2025-04-02 05:41:27', '/task6/index.php', 200),
(91, '::1', '2025-04-02 05:41:27', '/task6/index.php', 200),
(92, '::1', '2025-04-02 05:41:27', '/task6/index.php', 200),
(93, '::1', '2025-04-02 05:41:27', '/task6/index.php', 200),
(94, '::1', '2025-04-02 05:41:27', '/task6/index.php', 200),
(95, '::1', '2025-04-02 05:41:28', '/task6/index.php', 200),
(96, '::1', '2025-04-02 05:41:28', '/task6/index.php', 200),
(97, '::1', '2025-04-02 05:41:28', '/task6/index.php', 200),
(98, '::1', '2025-04-02 05:41:28', '/task6/index.php', 200),
(99, '::1', '2025-04-02 05:41:31', '/task6/index.php', 200),
(100, '::1', '2025-04-02 05:41:31', '/task6/index.php', 200),
(101, '::1', '2025-04-02 05:41:31', '/task6/index.php', 200),
(102, '::1', '2025-04-02 05:41:32', '/task6/index.php', 200),
(103, '::1', '2025-04-02 05:41:32', '/task6/index.php', 200),
(104, '::1', '2025-04-02 05:41:32', '/task6/index.php', 200),
(105, '::1', '2025-04-02 05:41:33', '/task6/index.php', 200),
(106, '::1', '2025-04-02 05:41:33', '/task6/index.php', 200),
(107, '::1', '2025-04-02 05:41:34', '/task6/index.php', 200),
(108, '::1', '2025-04-02 05:41:36', '/task6/index.php', 200),
(109, '::1', '2025-04-02 05:42:10', '/task6/about.php', 200),
(110, '::1', '2025-04-02 05:42:11', '/task6/about.php', 200),
(111, '::1', '2025-04-02 05:42:11', '/task6/about.php', 200),
(112, '::1', '2025-04-02 05:42:11', '/task6/about.php', 200),
(113, '::1', '2025-04-02 05:42:11', '/task6/about.php', 200),
(114, '::1', '2025-04-02 05:42:12', '/task6/index.php', 200),
(115, '::1', '2025-04-02 05:42:13', '/task6/index.php', 200),
(116, '::1', '2025-04-02 05:42:14', '/task6/about.php', 200),
(117, '::1', '2025-04-02 05:42:15', '/task6/about.php', 200),
(118, '::1', '2025-04-02 05:42:15', '/task6/about.php', 200),
(119, '::1', '2025-04-02 05:42:15', '/task6/about.php', 200),
(120, '::1', '2025-04-02 05:42:15', '/task6/index.php', 200),
(121, '::1', '2025-04-02 06:05:49', '/task6/', 200),
(122, '::1', '2025-04-02 06:08:03', '/task6/', 200),
(123, '::1', '2025-04-14 19:55:24', '/lab7/task6/statsfd.php', 200),
(124, '::1', '2025-04-14 19:55:31', '/lab7/task6/statsfd.php', 200),
(125, '::1', '2025-04-14 19:55:31', '/lab7/task6/statsfd.php', 200),
(126, '::1', '2025-04-14 19:55:32', '/lab7/task6/statsfd.php', 200),
(127, '::1', '2025-04-14 19:55:32', '/lab7/task6/statsfd.php', 200),
(128, '::1', '2025-04-14 19:55:32', '/lab7/task6/statsfd.php', 200),
(129, '::1', '2025-04-14 19:55:42', '/lab7/task6/statsfd.php', 200),
(130, '::1', '2025-04-14 19:55:47', '/lab7/task6/statsfd.php', 200),
(131, '::1', '2025-04-14 19:55:47', '/lab7/task6/statsfd.php', 200),
(132, '::1', '2025-04-14 19:55:49', '/lab7/task6/statsfd.php', 200),
(133, '::1', '2025-04-14 19:55:58', '/lab7/task6/statsfd.php', 200),
(134, '::1', '2025-04-14 19:55:58', '/lab7/task6/statsfd.php', 200),
(135, '::1', '2025-04-14 19:55:59', '/lab7/task6/statsfd.php', 200),
(136, '::1', '2025-04-14 19:56:00', '/lab7/task6/statsfd.php', 200),
(137, '::1', '2025-04-14 19:58:31', '/lab7/task6/statsfd.php', 200),
(138, '::1', '2025-04-14 19:59:11', '/lab7/task6/statsfd.php', 404),
(139, '::1', '2025-04-14 19:59:12', '/lab7/task6/statsfd.php', 404),
(140, '::1', '2025-04-14 20:02:13', '/lab7/task6/statsfd.php', 404),
(141, '::1', '2025-04-14 20:03:39', '/lab7/task6/statsfd.php', 404),
(142, '::1', '2025-04-14 20:03:39', '/lab7/task6/statsfd.php', 404),
(143, '::1', '2025-04-14 20:03:40', '/lab7/task6/statsfd.php', 404),
(144, '::1', '2025-04-14 20:03:40', '/lab7/task6/statsfd.php', 404),
(145, '::1', '2025-04-14 20:03:40', '/lab7/task6/statsfd.php', 404),
(146, '::1', '2025-04-14 20:04:31', '/lab7/task6/statsfd.php', 404),
(147, '::1', '2025-04-14 20:08:13', '/lab7/task6/index.php', 200),
(148, '::1', '2025-04-14 20:08:14', '/lab7/task6/index.php', 200),
(149, '::1', '2025-04-14 20:08:14', '/lab7/task6/index.php', 200),
(150, '::1', '2025-04-14 20:08:15', '/lab7/task6/index.php', 200),
(151, '::1', '2025-04-14 20:08:16', '/lab7/task6/index.php', 200),
(152, '::1', '2025-04-14 20:08:16', '/lab7/task6/index.php', 200),
(153, '::1', '2025-04-14 20:08:16', '/lab7/task6/index.php', 200),
(154, '::1', '2025-04-14 20:08:17', '/lab7/task6/index.php', 200),
(155, '::1', '2025-04-14 20:08:19', '/lab7/task6/index.php', 200),
(156, '::1', '2025-04-14 20:08:20', '/lab7/task6/index.php', 200),
(157, '::1', '2025-04-14 20:08:23', '/lab7/task6/index.php', 200),
(158, '::1', '2025-04-14 20:08:28', '/lab7/task6/index.php', 200),
(159, '::1', '2025-04-14 20:08:28', '/lab7/task6/index.php', 200),
(160, '::1', '2025-04-14 20:08:28', '/lab7/task6/index.php', 200),
(161, '::1', '2025-04-14 20:08:28', '/lab7/task6/index.php', 200),
(162, '::1', '2025-04-14 20:08:29', '/lab7/task6/index.php', 200),
(163, '::1', '2025-04-14 20:08:29', '/lab7/task6/index.php', 200),
(164, '::1', '2025-04-14 20:08:29', '/lab7/task6/index.php', 200),
(165, '::1', '2025-04-14 20:08:29', '/lab7/task6/index.php', 200),
(166, '::1', '2025-04-14 20:08:29', '/lab7/task6/index.php', 200),
(167, '::1', '2025-04-14 20:08:30', '/lab7/task6/index.php', 200),
(168, '::1', '2025-04-14 20:08:30', '/lab7/task6/index.php', 200),
(169, '::1', '2025-04-14 20:08:30', '/lab7/task6/index.php', 200),
(170, '::1', '2025-04-14 20:08:30', '/lab7/task6/index.php', 200),
(171, '::1', '2025-04-14 20:08:31', '/lab7/task6/index.php', 200),
(172, '::1', '2025-04-14 20:08:32', '/lab7/task6/index.php', 200),
(173, '::1', '2025-04-14 20:08:32', '/lab7/task6/index.php', 200),
(174, '::1', '2025-04-14 20:08:32', '/lab7/task6/index.php', 200),
(175, '::1', '2025-04-14 20:08:32', '/lab7/task6/index.php', 200),
(176, '::1', '2025-04-14 20:08:32', '/lab7/task6/index.php', 200),
(177, '::1', '2025-04-14 20:08:33', '/lab7/task6/index.php', 200),
(178, '::1', '2025-04-14 20:08:33', '/lab7/task6/index.php', 200),
(179, '::1', '2025-04-14 20:08:33', '/lab7/task6/index.php', 200),
(180, '::1', '2025-04-14 20:08:33', '/lab7/task6/index.php', 200),
(181, '::1', '2025-04-14 20:08:33', '/lab7/task6/index.php', 200),
(182, '::1', '2025-04-14 20:08:34', '/lab7/task6/index.php', 200),
(183, '::1', '2025-04-14 20:08:34', '/lab7/task6/index.php', 200),
(184, '::1', '2025-04-14 20:08:34', '/lab7/task6/index.php', 200),
(185, '::1', '2025-04-14 20:08:34', '/lab7/task6/index.php', 200),
(186, '::1', '2025-04-14 20:08:34', '/lab7/task6/index.php', 200),
(187, '::1', '2025-04-14 20:08:34', '/lab7/task6/index.php', 200),
(188, '::1', '2025-04-14 20:08:35', '/lab7/task6/index.php', 200),
(189, '::1', '2025-04-14 20:08:35', '/lab7/task6/index.php', 200),
(190, '::1', '2025-04-14 20:08:35', '/lab7/task6/index.php', 200),
(191, '::1', '2025-04-14 20:08:35', '/lab7/task6/index.php', 200),
(192, '::1', '2025-04-14 20:08:35', '/lab7/task6/index.php', 200),
(193, '::1', '2025-04-14 20:08:36', '/lab7/task6/index.php', 200),
(194, '::1', '2025-04-14 20:08:36', '/lab7/task6/index.php', 200),
(195, '::1', '2025-04-14 20:08:36', '/lab7/task6/index.php', 200),
(196, '::1', '2025-04-14 20:08:36', '/lab7/task6/index.php', 200),
(197, '::1', '2025-04-14 20:08:36', '/lab7/task6/index.php', 200),
(198, '::1', '2025-04-14 20:08:38', '/lab7/task6/index.php', 200),
(199, '::1', '2025-04-14 20:08:38', '/lab7/task6/index.php', 200),
(200, '::1', '2025-04-14 20:08:39', '/lab7/task6/index.php', 200),
(201, '::1', '2025-04-14 20:08:39', '/lab7/task6/index.php', 200),
(202, '::1', '2025-04-14 20:08:40', '/lab7/task6/index.php', 200),
(203, '::1', '2025-04-14 20:08:40', '/lab7/task6/index.php', 200),
(204, '::1', '2025-04-14 20:08:40', '/lab7/task6/index.php', 200),
(205, '::1', '2025-04-14 20:08:40', '/lab7/task6/index.php', 200),
(206, '::1', '2025-04-14 20:08:41', '/lab7/task6/index.php', 200),
(207, '::1', '2025-04-14 20:08:42', '/lab7/task6/index.php', 200),
(208, '::1', '2025-04-14 20:08:42', '/lab7/task6/index.php', 200),
(209, '::1', '2025-04-14 20:08:42', '/lab7/task6/index.php', 200),
(210, '::1', '2025-04-14 20:08:42', '/lab7/task6/index.php', 200),
(211, '::1', '2025-04-14 20:08:42', '/lab7/task6/index.php', 200),
(212, '::1', '2025-04-14 20:08:43', '/lab7/task6/index.php', 200),
(213, '::1', '2025-04-14 20:08:43', '/lab7/task6/index.php', 200),
(214, '::1', '2025-04-14 20:08:43', '/lab7/task6/index.php', 200),
(215, '::1', '2025-04-14 20:08:43', '/lab7/task6/index.php', 200),
(216, '::1', '2025-04-14 20:08:43', '/lab7/task6/index.php', 200),
(217, '::1', '2025-04-14 20:08:44', '/lab7/task6/index.php', 200),
(218, '::1', '2025-04-14 20:08:44', '/lab7/task6/index.php', 200),
(219, '::1', '2025-04-14 20:11:15', '/lab7/task6/index.php', 200),
(220, '::1', '2025-04-14 20:11:16', '/lab7/task6/about.php', 200),
(221, '::1', '2025-04-14 20:11:17', '/lab7/task6/index.php', 200),
(222, '::1', '2025-04-14 20:11:18', '/lab7/task6/statsfd.php', 404),
(223, '::1', '2025-04-14 20:11:18', '/lab7/task6/index.php', 200),
(224, '::1', '2025-04-14 20:11:20', '/lab7/task6/index.php', 200),
(225, '::1', '2025-04-14 20:11:29', '/lab7/task6/index.php', 200),
(226, '::1', '2025-04-14 20:11:31', '/lab7/task6/index.php', 200),
(227, '::1', '2025-04-14 20:24:30', '/lab7/task6/', 404),
(228, '::1', '2025-04-14 20:24:31', '/lab7/task6/index.php', 200),
(229, '::1', '2025-04-14 20:24:42', '/lab7/task6/index.php', 200),
(230, '::1', '2025-04-14 20:24:43', '/lab7/task6/index.php', 200),
(231, '::1', '2025-04-14 20:24:43', '/lab7/task6/index.php', 200),
(232, '::1', '2025-04-14 20:24:43', '/lab7/task6/index.php', 200),
(233, '::1', '2025-04-14 20:24:43', '/lab7/task6/index.php', 200),
(234, '::1', '2025-04-14 20:24:43', '/lab7/task6/index.php', 200);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
