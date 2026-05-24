-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2026 at 05:21 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sahamaidservice`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_maid`
--

CREATE TABLE `assign_maid` (
  `assign_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL COMMENT 'PK of user_details',
  `rcvabl_amount` decimal(10,2) NOT NULL,
  `worker_id` int(11) NOT NULL COMMENT 'PK of user_details',
  `exp_salary` decimal(10,2) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `from_time` varchar(255) NOT NULL,
  `to_time` varchar(255) NOT NULL,
  `atten_data` text NOT NULL,
  `payment_history` text NOT NULL,
  `assign_by` int(11) NOT NULL COMMENT 'PK of user_details',
  `asssign_time` datetime NOT NULL DEFAULT current_timestamp(),
  `bill_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'from bill_status_master',
  `hsn_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assign_maid`
--

INSERT INTO `assign_maid` (`assign_id`, `client_id`, `rcvabl_amount`, `worker_id`, `exp_salary`, `from_date`, `to_date`, `from_time`, `to_time`, `atten_data`, `payment_history`, `assign_by`, `asssign_time`, `bill_status`, `hsn_code`) VALUES
(4, 101, 12000.00, 30, 12000.00, '2026-04-01', '2026-04-30', '08:06', '09:06', '[{\"slno\":1,\"atten_date\":\"01-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":2,\"atten_date\":\"02-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":3,\"atten_date\":\"03-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":4,\"atten_date\":\"04-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":5,\"atten_date\":\"05-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":6,\"atten_date\":\"06-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":7,\"atten_date\":\"07-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":8,\"atten_date\":\"08-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":9,\"atten_date\":\"09-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":10,\"atten_date\":\"10-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":11,\"atten_date\":\"11-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":12,\"atten_date\":\"12-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":13,\"atten_date\":\"13-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":14,\"atten_date\":\"14-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":15,\"atten_date\":\"15-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":16,\"atten_date\":\"16-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":17,\"atten_date\":\"17-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":18,\"atten_date\":\"18-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":19,\"atten_date\":\"19-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":20,\"atten_date\":\"20-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":21,\"atten_date\":\"21-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":22,\"atten_date\":\"22-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":23,\"atten_date\":\"23-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":24,\"atten_date\":\"24-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":25,\"atten_date\":\"25-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":26,\"atten_date\":\"26-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":27,\"atten_date\":\"27-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":28,\"atten_date\":\"28-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":29,\"atten_date\":\"29-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":30,\"atten_date\":\"30-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"}]', '', 1, '2026-04-18 08:06:24', 1, 'SHN123'),
(5, 101, 20000.00, 117, 18000.00, '2026-04-01', '2026-04-30', '16:06', '17:06', '[{\"slno\":1,\"atten_date\":\"01-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":2,\"atten_date\":\"02-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":3,\"atten_date\":\"03-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":4,\"atten_date\":\"04-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":5,\"atten_date\":\"05-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":6,\"atten_date\":\"06-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":7,\"atten_date\":\"07-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":8,\"atten_date\":\"08-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":9,\"atten_date\":\"09-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":10,\"atten_date\":\"10-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":11,\"atten_date\":\"11-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":12,\"atten_date\":\"12-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":13,\"atten_date\":\"13-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":14,\"atten_date\":\"14-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":15,\"atten_date\":\"15-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":16,\"atten_date\":\"16-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":17,\"atten_date\":\"17-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":18,\"atten_date\":\"18-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":19,\"atten_date\":\"19-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":20,\"atten_date\":\"20-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":21,\"atten_date\":\"21-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":22,\"atten_date\":\"22-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":23,\"atten_date\":\"23-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":24,\"atten_date\":\"24-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":25,\"atten_date\":\"25-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":26,\"atten_date\":\"26-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":27,\"atten_date\":\"27-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":28,\"atten_date\":\"28-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":29,\"atten_date\":\"29-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":30,\"atten_date\":\"30-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"}]', '', 1, '2026-04-18 08:07:03', 1, 'HSN456'),
(6, 350, 12000.00, 351, 10000.00, '2026-04-01', '2026-04-30', '07:01', '08:00', '[{\"slno\":1,\"atten_date\":\"01-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":2,\"atten_date\":\"02-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":3,\"atten_date\":\"03-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":4,\"atten_date\":\"04-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":5,\"atten_date\":\"05-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":6,\"atten_date\":\"06-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":7,\"atten_date\":\"07-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":8,\"atten_date\":\"08-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":9,\"atten_date\":\"09-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":10,\"atten_date\":\"10-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":11,\"atten_date\":\"11-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":12,\"atten_date\":\"12-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":13,\"atten_date\":\"13-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":14,\"atten_date\":\"14-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":15,\"atten_date\":\"15-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":16,\"atten_date\":\"16-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":17,\"atten_date\":\"17-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":18,\"atten_date\":\"18-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":19,\"atten_date\":\"19-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":20,\"atten_date\":\"20-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":21,\"atten_date\":\"21-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":22,\"atten_date\":\"22-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":23,\"atten_date\":\"23-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":24,\"atten_date\":\"24-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":25,\"atten_date\":\"25-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":26,\"atten_date\":\"26-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":27,\"atten_date\":\"27-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":28,\"atten_date\":\"28-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":29,\"atten_date\":\"29-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":30,\"atten_date\":\"30-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"}]', '', 1, '2026-04-18 11:49:43', 1, 'HSN456'),
(7, 350, 20000.00, 117, 18000.00, '2026-04-01', '2026-04-30', '09:00', '10:00', '[{\"slno\":1,\"atten_date\":\"01-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":2,\"atten_date\":\"02-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"10 minutes late\"},{\"slno\":3,\"atten_date\":\"03-04-2026\",\"pre_abs_lev\":\"2\",\"atten_note\":\"\"},{\"slno\":4,\"atten_date\":\"04-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":5,\"atten_date\":\"05-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":6,\"atten_date\":\"06-04-2026\",\"pre_abs_lev\":\"2\",\"atten_note\":\"\"},{\"slno\":7,\"atten_date\":\"07-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":8,\"atten_date\":\"08-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":9,\"atten_date\":\"09-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":10,\"atten_date\":\"10-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":11,\"atten_date\":\"11-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":12,\"atten_date\":\"12-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":13,\"atten_date\":\"13-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":14,\"atten_date\":\"14-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":15,\"atten_date\":\"15-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":16,\"atten_date\":\"16-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":17,\"atten_date\":\"17-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":18,\"atten_date\":\"18-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":19,\"atten_date\":\"19-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":20,\"atten_date\":\"20-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":21,\"atten_date\":\"21-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":22,\"atten_date\":\"22-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":23,\"atten_date\":\"23-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":24,\"atten_date\":\"24-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":25,\"atten_date\":\"25-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":26,\"atten_date\":\"26-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":27,\"atten_date\":\"27-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":28,\"atten_date\":\"28-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":29,\"atten_date\":\"29-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":30,\"atten_date\":\"30-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"}]', '', 1, '2026-04-18 11:52:16', 1, 'HSN001'),
(8, 287, 22000.00, 117, 18000.00, '2026-06-01', '2026-06-30', '07:00', '09:00', '', '', 1, '2026-05-12 09:49:05', 1, ''),
(9, 78, 12000.00, 117, 18000.00, '2026-07-01', '2026-07-31', '09:00', '21:01', '', '', 1, '2026-05-12 09:54:28', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_register`
--

CREATE TABLE `attendance_register` (
  `atten_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `month_date` varchar(7) NOT NULL,
  `atten_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance_register`
--

INSERT INTO `attendance_register` (`atten_id`, `user_id`, `month_date`, `atten_data`) VALUES
(1, 3, '2026-03', '[{\"slno\":1,\"atten_date\":\"01-03-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"Come on time\"},{\"slno\":2,\"atten_date\":\"02-03-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"10 minutes late\"},{\"slno\":3,\"atten_date\":\"03-03-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":4,\"atten_date\":\"04-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":5,\"atten_date\":\"05-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":6,\"atten_date\":\"06-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":7,\"atten_date\":\"07-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":8,\"atten_date\":\"08-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":9,\"atten_date\":\"09-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":10,\"atten_date\":\"10-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":11,\"atten_date\":\"11-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":12,\"atten_date\":\"12-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":13,\"atten_date\":\"13-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":14,\"atten_date\":\"14-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":15,\"atten_date\":\"15-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":16,\"atten_date\":\"16-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":17,\"atten_date\":\"17-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":18,\"atten_date\":\"18-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":19,\"atten_date\":\"19-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":20,\"atten_date\":\"20-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":21,\"atten_date\":\"21-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":22,\"atten_date\":\"22-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":23,\"atten_date\":\"23-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":24,\"atten_date\":\"24-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":25,\"atten_date\":\"25-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":26,\"atten_date\":\"26-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":27,\"atten_date\":\"27-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":28,\"atten_date\":\"28-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":29,\"atten_date\":\"29-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":30,\"atten_date\":\"30-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":31,\"atten_date\":\"31-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"}]'),
(2, 3, '2026-02', '[{\"slno\":1,\"atten_date\":\"01-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":2,\"atten_date\":\"02-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":3,\"atten_date\":\"03-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":4,\"atten_date\":\"04-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":5,\"atten_date\":\"05-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":6,\"atten_date\":\"06-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":7,\"atten_date\":\"07-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":8,\"atten_date\":\"08-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":9,\"atten_date\":\"09-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":10,\"atten_date\":\"10-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":11,\"atten_date\":\"11-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":12,\"atten_date\":\"12-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":13,\"atten_date\":\"13-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":14,\"atten_date\":\"14-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":15,\"atten_date\":\"15-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":16,\"atten_date\":\"16-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":17,\"atten_date\":\"17-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":18,\"atten_date\":\"18-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":19,\"atten_date\":\"19-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":20,\"atten_date\":\"20-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":21,\"atten_date\":\"21-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":22,\"atten_date\":\"22-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":23,\"atten_date\":\"23-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":24,\"atten_date\":\"24-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":25,\"atten_date\":\"25-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":26,\"atten_date\":\"26-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":27,\"atten_date\":\"27-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":28,\"atten_date\":\"28-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"}]'),
(3, 3, '2026-04', '[{\"slno\":1,\"atten_date\":\"01-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":2,\"atten_date\":\"02-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":3,\"atten_date\":\"03-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":4,\"atten_date\":\"04-04-2026\",\"pre_abs_lev\":\"2\",\"atten_note\":\"\"},{\"slno\":5,\"atten_date\":\"05-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":6,\"atten_date\":\"06-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":7,\"atten_date\":\"07-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":8,\"atten_date\":\"08-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":9,\"atten_date\":\"09-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":10,\"atten_date\":\"10-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":11,\"atten_date\":\"11-04-2026\",\"pre_abs_lev\":\"2\",\"atten_note\":\"\"},{\"slno\":12,\"atten_date\":\"12-04-2026\",\"pre_abs_lev\":\"3\",\"atten_note\":\"\"},{\"slno\":13,\"atten_date\":\"13-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":14,\"atten_date\":\"14-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":15,\"atten_date\":\"15-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":16,\"atten_date\":\"16-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":17,\"atten_date\":\"17-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":18,\"atten_date\":\"18-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":19,\"atten_date\":\"19-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":20,\"atten_date\":\"20-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":21,\"atten_date\":\"21-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":22,\"atten_date\":\"22-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":23,\"atten_date\":\"23-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":24,\"atten_date\":\"24-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":25,\"atten_date\":\"25-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":26,\"atten_date\":\"26-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":27,\"atten_date\":\"27-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":28,\"atten_date\":\"28-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":29,\"atten_date\":\"29-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":30,\"atten_date\":\"30-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"}]'),
(4, 0, '2026-04', '[{\"slno\":1,\"atten_date\":\"01-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":2,\"atten_date\":\"02-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":3,\"atten_date\":\"03-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":4,\"atten_date\":\"04-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":5,\"atten_date\":\"05-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":6,\"atten_date\":\"06-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":7,\"atten_date\":\"07-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":8,\"atten_date\":\"08-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":9,\"atten_date\":\"09-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":10,\"atten_date\":\"10-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":11,\"atten_date\":\"11-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":12,\"atten_date\":\"12-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":13,\"atten_date\":\"13-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":14,\"atten_date\":\"14-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":15,\"atten_date\":\"15-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":16,\"atten_date\":\"16-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":17,\"atten_date\":\"17-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":18,\"atten_date\":\"18-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":19,\"atten_date\":\"19-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":20,\"atten_date\":\"20-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":21,\"atten_date\":\"21-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":22,\"atten_date\":\"22-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":23,\"atten_date\":\"23-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":24,\"atten_date\":\"24-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":25,\"atten_date\":\"25-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":26,\"atten_date\":\"26-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":27,\"atten_date\":\"27-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":28,\"atten_date\":\"28-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":29,\"atten_date\":\"29-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":30,\"atten_date\":\"30-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"}]'),
(5, 119, '2026-01', '[{\"slno\":1,\"atten_date\":\"01-01-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":2,\"atten_date\":\"02-01-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":3,\"atten_date\":\"03-01-2026\",\"pre_abs_lev\":\"2\",\"atten_note\":\"\"},{\"slno\":4,\"atten_date\":\"04-01-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":5,\"atten_date\":\"05-01-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":6,\"atten_date\":\"06-01-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":7,\"atten_date\":\"07-01-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":8,\"atten_date\":\"08-01-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":9,\"atten_date\":\"09-01-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":10,\"atten_date\":\"10-01-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":11,\"atten_date\":\"11-01-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":12,\"atten_date\":\"12-01-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":13,\"atten_date\":\"13-01-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":14,\"atten_date\":\"14-01-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":15,\"atten_date\":\"15-01-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":16,\"atten_date\":\"16-01-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":17,\"atten_date\":\"17-01-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":18,\"atten_date\":\"18-01-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":19,\"atten_date\":\"19-01-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":20,\"atten_date\":\"20-01-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":21,\"atten_date\":\"21-01-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":22,\"atten_date\":\"22-01-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":23,\"atten_date\":\"23-01-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":24,\"atten_date\":\"24-01-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":25,\"atten_date\":\"25-01-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":26,\"atten_date\":\"26-01-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":27,\"atten_date\":\"27-01-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":28,\"atten_date\":\"28-01-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":29,\"atten_date\":\"29-01-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":30,\"atten_date\":\"30-01-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":31,\"atten_date\":\"31-01-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"}]'),
(6, 119, '2026-02', '[{\"slno\":1,\"atten_date\":\"01-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":2,\"atten_date\":\"02-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":3,\"atten_date\":\"03-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":4,\"atten_date\":\"04-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":5,\"atten_date\":\"05-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":6,\"atten_date\":\"06-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":7,\"atten_date\":\"07-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":8,\"atten_date\":\"08-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":9,\"atten_date\":\"09-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":10,\"atten_date\":\"10-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":11,\"atten_date\":\"11-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":12,\"atten_date\":\"12-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":13,\"atten_date\":\"13-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":14,\"atten_date\":\"14-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":15,\"atten_date\":\"15-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":16,\"atten_date\":\"16-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":17,\"atten_date\":\"17-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":18,\"atten_date\":\"18-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":19,\"atten_date\":\"19-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":20,\"atten_date\":\"20-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":21,\"atten_date\":\"21-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":22,\"atten_date\":\"22-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":23,\"atten_date\":\"23-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":24,\"atten_date\":\"24-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":25,\"atten_date\":\"25-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":26,\"atten_date\":\"26-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":27,\"atten_date\":\"27-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":28,\"atten_date\":\"28-02-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"}]'),
(7, 157, '2026-03', '[{\"slno\":1,\"atten_date\":\"01-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":2,\"atten_date\":\"02-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":3,\"atten_date\":\"03-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":4,\"atten_date\":\"04-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":5,\"atten_date\":\"05-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":6,\"atten_date\":\"06-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":7,\"atten_date\":\"07-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":8,\"atten_date\":\"08-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":9,\"atten_date\":\"09-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":10,\"atten_date\":\"10-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":11,\"atten_date\":\"11-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":12,\"atten_date\":\"12-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":13,\"atten_date\":\"13-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":14,\"atten_date\":\"14-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":15,\"atten_date\":\"15-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":16,\"atten_date\":\"16-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":17,\"atten_date\":\"17-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":18,\"atten_date\":\"18-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":19,\"atten_date\":\"19-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":20,\"atten_date\":\"20-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":21,\"atten_date\":\"21-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":22,\"atten_date\":\"22-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":23,\"atten_date\":\"23-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":24,\"atten_date\":\"24-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":25,\"atten_date\":\"25-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":26,\"atten_date\":\"26-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":27,\"atten_date\":\"27-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":28,\"atten_date\":\"28-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":29,\"atten_date\":\"29-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":30,\"atten_date\":\"30-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":31,\"atten_date\":\"31-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"}]'),
(8, 209, '2026-03', '[{\"slno\":1,\"atten_date\":\"01-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":2,\"atten_date\":\"02-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":3,\"atten_date\":\"03-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":4,\"atten_date\":\"04-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":5,\"atten_date\":\"05-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":6,\"atten_date\":\"06-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":7,\"atten_date\":\"07-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":8,\"atten_date\":\"08-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":9,\"atten_date\":\"09-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":10,\"atten_date\":\"10-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":11,\"atten_date\":\"11-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":12,\"atten_date\":\"12-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":13,\"atten_date\":\"13-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":14,\"atten_date\":\"14-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":15,\"atten_date\":\"15-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":16,\"atten_date\":\"16-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":17,\"atten_date\":\"17-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":18,\"atten_date\":\"18-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":19,\"atten_date\":\"19-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":20,\"atten_date\":\"20-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":21,\"atten_date\":\"21-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":22,\"atten_date\":\"22-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":23,\"atten_date\":\"23-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":24,\"atten_date\":\"24-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":25,\"atten_date\":\"25-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":26,\"atten_date\":\"26-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":27,\"atten_date\":\"27-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":28,\"atten_date\":\"28-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":29,\"atten_date\":\"29-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":30,\"atten_date\":\"30-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":31,\"atten_date\":\"31-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"}]'),
(9, 30, '2026-04', '[{\"slno\":1,\"atten_date\":\"01-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":2,\"atten_date\":\"02-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":3,\"atten_date\":\"03-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":4,\"atten_date\":\"04-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":5,\"atten_date\":\"05-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":6,\"atten_date\":\"06-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":7,\"atten_date\":\"07-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":8,\"atten_date\":\"08-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":9,\"atten_date\":\"09-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":10,\"atten_date\":\"10-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":11,\"atten_date\":\"11-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":12,\"atten_date\":\"12-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":13,\"atten_date\":\"13-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":14,\"atten_date\":\"14-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":15,\"atten_date\":\"15-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":16,\"atten_date\":\"16-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":17,\"atten_date\":\"17-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":18,\"atten_date\":\"18-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":19,\"atten_date\":\"19-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":20,\"atten_date\":\"20-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":21,\"atten_date\":\"21-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":22,\"atten_date\":\"22-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":23,\"atten_date\":\"23-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":24,\"atten_date\":\"24-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":25,\"atten_date\":\"25-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":26,\"atten_date\":\"26-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":27,\"atten_date\":\"27-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":28,\"atten_date\":\"28-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":29,\"atten_date\":\"29-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":30,\"atten_date\":\"30-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"}]'),
(10, 351, '2026-04', '[{\"slno\":1,\"atten_date\":\"01-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":2,\"atten_date\":\"02-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":3,\"atten_date\":\"03-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":4,\"atten_date\":\"04-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":5,\"atten_date\":\"05-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":6,\"atten_date\":\"06-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":7,\"atten_date\":\"07-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":8,\"atten_date\":\"08-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":9,\"atten_date\":\"09-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":10,\"atten_date\":\"10-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":11,\"atten_date\":\"11-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":12,\"atten_date\":\"12-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":13,\"atten_date\":\"13-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":14,\"atten_date\":\"14-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":15,\"atten_date\":\"15-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":16,\"atten_date\":\"16-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":17,\"atten_date\":\"17-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":18,\"atten_date\":\"18-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":19,\"atten_date\":\"19-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":20,\"atten_date\":\"20-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":21,\"atten_date\":\"21-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":22,\"atten_date\":\"22-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":23,\"atten_date\":\"23-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":24,\"atten_date\":\"24-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":25,\"atten_date\":\"25-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":26,\"atten_date\":\"26-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":27,\"atten_date\":\"27-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":28,\"atten_date\":\"28-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":29,\"atten_date\":\"29-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":30,\"atten_date\":\"30-04-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"}]'),
(11, 170, '2026-04', '[{\"slno\":1,\"atten_date\":\"01-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":2,\"atten_date\":\"02-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":3,\"atten_date\":\"03-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":4,\"atten_date\":\"04-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":5,\"atten_date\":\"05-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":6,\"atten_date\":\"06-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":7,\"atten_date\":\"07-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":8,\"atten_date\":\"08-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":9,\"atten_date\":\"09-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":10,\"atten_date\":\"10-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":11,\"atten_date\":\"11-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":12,\"atten_date\":\"12-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":13,\"atten_date\":\"13-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":14,\"atten_date\":\"14-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":15,\"atten_date\":\"15-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":16,\"atten_date\":\"16-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":17,\"atten_date\":\"17-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":18,\"atten_date\":\"18-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":19,\"atten_date\":\"19-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":20,\"atten_date\":\"20-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":21,\"atten_date\":\"21-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":22,\"atten_date\":\"22-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":23,\"atten_date\":\"23-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":24,\"atten_date\":\"24-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":25,\"atten_date\":\"25-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":26,\"atten_date\":\"26-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":27,\"atten_date\":\"27-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":28,\"atten_date\":\"28-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":29,\"atten_date\":\"29-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":30,\"atten_date\":\"30-04-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"}]'),
(12, 1, '2026-05', '[{\"slno\":1,\"atten_date\":\"01-05-2026\",\"pre_abs_lev\":\"2\",\"atten_note\":\"\"},{\"slno\":2,\"atten_date\":\"02-05-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":3,\"atten_date\":\"03-05-2026\",\"pre_abs_lev\":\"2\",\"atten_note\":\"\"},{\"slno\":4,\"atten_date\":\"04-05-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":5,\"atten_date\":\"05-05-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":6,\"atten_date\":\"06-05-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":7,\"atten_date\":\"07-05-2026\",\"pre_abs_lev\":\"2\",\"atten_note\":\"\"},{\"slno\":8,\"atten_date\":\"08-05-2026\",\"pre_abs_lev\":\"4\",\"atten_note\":\"\"},{\"slno\":9,\"atten_date\":\"09-05-2026\",\"pre_abs_lev\":\"4\",\"atten_note\":\"\"},{\"slno\":10,\"atten_date\":\"10-05-2026\",\"pre_abs_lev\":\"2\",\"atten_note\":\"\"},{\"slno\":11,\"atten_date\":\"11-05-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":12,\"atten_date\":\"12-05-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":13,\"atten_date\":\"13-05-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":14,\"atten_date\":\"14-05-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":15,\"atten_date\":\"15-05-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":16,\"atten_date\":\"16-05-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":17,\"atten_date\":\"17-05-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":18,\"atten_date\":\"18-05-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":19,\"atten_date\":\"19-05-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":20,\"atten_date\":\"20-05-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":21,\"atten_date\":\"21-05-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":22,\"atten_date\":\"22-05-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":23,\"atten_date\":\"23-05-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":24,\"atten_date\":\"24-05-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":25,\"atten_date\":\"25-05-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":26,\"atten_date\":\"26-05-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":27,\"atten_date\":\"27-05-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":28,\"atten_date\":\"28-05-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":29,\"atten_date\":\"29-05-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":30,\"atten_date\":\"30-05-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":31,\"atten_date\":\"31-05-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

CREATE TABLE `bank_details` (
  `bank_id` tinyint(1) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `bank_information` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bank_details`
--

INSERT INTO `bank_details` (`bank_id`, `bank_name`, `bank_information`) VALUES
(1, 'State Bank of India', 'A/C Holder Name: Kundan Kumar Saha<br>\nBank Name: State Bank of India<br>\nA/C: 33378961528<br>\nIFSC code: SBIN0001295<br>\nPhone pay: 8906161591<br>\nGoogle pay: 8906161591 & UPI ID: 8906161591@ybl'),
(2, 'Cash Payment', 'Pay by Cash');

-- --------------------------------------------------------

--
-- Table structure for table `bill_details`
--

CREATE TABLE `bill_details` (
  `bill_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL COMMENT 'user_id from user_details',
  `inv_month` varchar(255) NOT NULL,
  `normal_gst` tinyint(1) NOT NULL,
  `gst_percentage` int(11) NOT NULL DEFAULT 0,
  `terms_condi` tinyint(1) NOT NULL,
  `bank_id` tinyint(4) NOT NULL DEFAULT 0,
  `tax_cgst` decimal(10,2) NOT NULL,
  `tax_sgst` decimal(10,2) NOT NULL,
  `bill_total` decimal(10,2) NOT NULL,
  `bill_created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `bill_updated_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `bill_created_by` int(11) NOT NULL,
  `bill_updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill_details`
--

INSERT INTO `bill_details` (`bill_id`, `client_id`, `inv_month`, `normal_gst`, `gst_percentage`, `terms_condi`, `bank_id`, `tax_cgst`, `tax_sgst`, `bill_total`, `bill_created_on`, `bill_updated_on`, `bill_created_by`, `bill_updated_by`) VALUES
(1, 101, '2026-04', 1, 9, 3, 0, 0.00, 0.00, 32000.00, '2026-04-18 08:09:00', '2026-04-18 08:54:03', 1, 1),
(2, 350, '2026-04', 2, 9, 1, 1, 2880.00, 2880.00, 37760.00, '2026-04-18 11:55:33', '2026-05-22 20:58:06', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bill_payment_details`
--

CREATE TABLE `bill_payment_details` (
  `bpd_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL COMMENT 'pk of bill_details',
  `client_id` int(11) NOT NULL COMMENT 'pk of user_details',
  `paid_amount` decimal(10,2) NOT NULL,
  `payment_mode` tinyint(1) NOT NULL COMMENT '1=cash 2=UPI',
  `transaction_id` varchar(255) NOT NULL,
  `pay_date` datetime NOT NULL DEFAULT current_timestamp(),
  `payment_received_by` int(11) NOT NULL COMMENT 'pk of user_details'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill_payment_details`
--

INSERT INTO `bill_payment_details` (`bpd_id`, `bill_id`, `client_id`, `paid_amount`, `payment_mode`, `transaction_id`, `pay_date`, `payment_received_by`) VALUES
(1, 1, 101, 10000.00, 2, '998563254125789652', '2026-04-18 08:09:33', 1),
(2, 2, 350, 5000.00, 2, '998563254125789652', '2026-04-18 12:09:15', 1),
(3, 2, 350, 2760.00, 1, '', '2026-05-14 19:13:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bill_status_master`
--

CREATE TABLE `bill_status_master` (
  `bs_id` tinyint(1) NOT NULL,
  `bill_status_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill_status_master`
--

INSERT INTO `bill_status_master` (`bs_id`, `bill_status_name`) VALUES
(1, 'DUE'),
(2, 'PAID');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city`, `state_id`) VALUES
(1, 'North and Middle Andaman', 32),
(2, 'South Andaman', 32),
(3, 'Nicobar', 32),
(4, 'Adilabad', 1),
(5, 'Anantapur', 1),
(6, 'Chittoor', 1),
(7, 'East Godavari', 1),
(8, 'Guntur', 1),
(9, 'Hyderabad', 1),
(10, 'Kadapa', 1),
(11, 'Karimnagar', 1),
(12, 'Khammam', 1),
(13, 'Krishna', 1),
(14, 'Kurnool', 1),
(15, 'Mahbubnagar', 1),
(16, 'Medak', 1),
(17, 'Nalgonda', 1),
(18, 'Nellore', 1),
(19, 'Nizamabad', 1),
(20, 'Prakasam', 1),
(21, 'Rangareddi', 1),
(22, 'Srikakulam', 1),
(23, 'Vishakhapatnam', 1),
(24, 'Vizianagaram', 1),
(25, 'Warangal', 1),
(26, 'West Godavari', 1),
(27, 'Anjaw', 3),
(28, 'Changlang', 3),
(29, 'East Kameng', 3),
(30, 'Lohit', 3),
(31, 'Lower Subansiri', 3),
(32, 'Papum Pare', 3),
(33, 'Tirap', 3),
(34, 'Dibang Valley', 3),
(35, 'Upper Subansiri', 3),
(36, 'West Kameng', 3),
(37, 'Barpeta', 2),
(38, 'Bongaigaon', 2),
(39, 'Cachar', 2),
(40, 'Darrang', 2),
(41, 'Dhemaji', 2),
(42, 'Dhubri', 2),
(43, 'Dibrugarh', 2),
(44, 'Goalpara', 2),
(45, 'Golaghat', 2),
(46, 'Hailakandi', 2),
(47, 'Jorhat', 2),
(48, 'Karbi Anglong', 2),
(49, 'Karimganj', 2),
(50, 'Kokrajhar', 2),
(51, 'Lakhimpur', 2),
(52, 'Marigaon', 2),
(53, 'Nagaon', 2),
(54, 'Nalbari', 2),
(55, 'North Cachar Hills', 2),
(56, 'Sibsagar', 2),
(57, 'Sonitpur', 2),
(58, 'Tinsukia', 2),
(59, 'Araria', 4),
(60, 'Aurangabad', 4),
(61, 'Banka', 4),
(62, 'Begusarai', 4),
(63, 'Bhagalpur', 4),
(64, 'Bhojpur', 4),
(65, 'Buxar', 4),
(66, 'Darbhanga', 4),
(67, 'Purba Champaran', 4),
(68, 'Gaya', 4),
(69, 'Gopalganj', 4),
(70, 'Jamui', 4),
(71, 'Jehanabad', 4),
(72, 'Khagaria', 4),
(73, 'Kishanganj', 4),
(74, 'Kaimur', 4),
(75, 'Katihar', 4),
(76, 'Lakhisarai', 4),
(77, 'Madhubani', 4),
(78, 'Munger', 4),
(79, 'Madhepura', 4),
(80, 'Muzaffarpur', 4),
(81, 'Nalanda', 4),
(82, 'Nawada', 4),
(83, 'Patna', 4),
(84, 'Purnia', 4),
(85, 'Rohtas', 4),
(86, 'Saharsa', 4),
(87, 'Samastipur', 4),
(88, 'Sheohar', 4),
(89, 'Sheikhpura', 4),
(90, 'Saran', 4),
(91, 'Sitamarhi', 4),
(92, 'Supaul', 4),
(93, 'Siwan', 4),
(94, 'Vaishali', 4),
(95, 'Pashchim Champaran', 4),
(96, 'Bastar', 36),
(97, 'Bilaspur', 36),
(98, 'Dantewada', 36),
(99, 'Dhamtari', 36),
(100, 'Durg', 36),
(101, 'Jashpur', 36),
(102, 'Janjgir-Champa', 36),
(103, 'Korba', 36),
(104, 'Koriya', 36),
(105, 'Kanker', 36),
(106, 'Kawardha', 36),
(107, 'Mahasamund', 36),
(108, 'Raigarh', 36),
(109, 'Rajnandgaon', 36),
(110, 'Raipur', 36),
(111, 'Surguja', 36),
(112, 'Diu', 29),
(113, 'Daman', 29),
(114, 'Central Delhi', 25),
(115, 'East Delhi', 25),
(116, 'New Delhi', 25),
(117, 'North Delhi', 25),
(118, 'North East Delhi', 25),
(119, 'North West Delhi', 25),
(120, 'South Delhi', 25),
(121, 'South West Delhi', 25),
(122, 'West Delhi', 25),
(123, 'North Goa', 26),
(124, 'South Goa', 26),
(125, 'Ahmedabad', 5),
(126, 'Amreli District', 5),
(127, 'Anand', 5),
(128, 'Banaskantha', 5),
(129, 'Bharuch', 5),
(130, 'Bhavnagar', 5),
(131, 'Dahod', 5),
(132, 'The Dangs', 5),
(133, 'Gandhinagar', 5),
(134, 'Jamnagar', 5),
(135, 'Junagadh', 5),
(136, 'Kutch', 5),
(137, 'Kheda', 5),
(138, 'Mehsana', 5),
(139, 'Narmada', 5),
(140, 'Navsari', 5),
(141, 'Patan', 5),
(142, 'Panchmahal', 5),
(143, 'Porbandar', 5),
(144, 'Rajkot', 5),
(145, 'Sabarkantha', 5),
(146, 'Surendranagar', 5),
(147, 'Surat', 5),
(148, 'Vadodara', 5),
(149, 'Valsad', 5),
(150, 'Ambala', 6),
(151, 'Bhiwani', 6),
(152, 'Faridabad', 6),
(153, 'Fatehabad', 6),
(154, 'Gurgaon', 6),
(155, 'Hissar', 6),
(156, 'Jhajjar', 6),
(157, 'Jind', 6),
(158, 'Karnal', 6),
(159, 'Kaithal', 6),
(160, 'Kurukshetra', 6),
(161, 'Mahendragarh', 6),
(162, 'Mewat', 6),
(163, 'Panchkula', 6),
(164, 'Panipat', 6),
(165, 'Rewari', 6),
(166, 'Rohtak', 6),
(167, 'Sirsa', 6),
(168, 'Sonepat', 6),
(169, 'Yamuna Nagar', 6),
(170, 'Palwal', 6),
(171, 'Bilaspur', 7),
(172, 'Chamba', 7),
(173, 'Hamirpur', 7),
(174, 'Kangra', 7),
(175, 'Kinnaur', 7),
(176, 'Kulu', 7),
(177, 'Lahaul and Spiti', 7),
(178, 'Mandi', 7),
(179, 'Shimla', 7),
(180, 'Sirmaur', 7),
(181, 'Solan', 7),
(182, 'Una', 7),
(183, 'Anantnag', 8),
(184, 'Badgam', 8),
(185, 'Bandipore', 8),
(186, 'Baramula', 8),
(187, 'Doda', 8),
(188, 'Jammu', 8),
(189, 'Kargil', 8),
(190, 'Kathua', 8),
(191, 'Kupwara', 8),
(192, 'Leh', 8),
(193, 'Poonch', 8),
(194, 'Pulwama', 8),
(195, 'Rajauri', 8),
(196, 'Srinagar', 8),
(197, 'Samba', 8),
(198, 'Udhampur', 8),
(199, 'Bokaro', 34),
(200, 'Chatra', 34),
(201, 'Deoghar', 34),
(202, 'Dhanbad', 34),
(203, 'Dumka', 34),
(204, 'Purba Singhbhum', 34),
(205, 'Garhwa', 34),
(206, 'Giridih', 34),
(207, 'Godda', 34),
(208, 'Gumla', 34),
(209, 'Hazaribagh', 34),
(210, 'Koderma', 34),
(211, 'Lohardaga', 34),
(212, 'Pakur', 34),
(213, 'Palamu', 34),
(214, 'Ranchi', 34),
(215, 'Sahibganj', 34),
(216, 'Seraikela and Kharsawan', 34),
(217, 'Pashchim Singhbhum', 34),
(218, 'Ramgarh', 34),
(219, 'Bidar', 9),
(220, 'Belgaum', 9),
(221, 'Bijapur', 9),
(222, 'Bagalkot', 9),
(223, 'Bellary', 9),
(224, 'Bangalore Rural District', 9),
(225, 'Bangalore Urban District', 9),
(226, 'Chamarajnagar', 9),
(227, 'Chikmagalur', 9),
(228, 'Chitradurga', 9),
(229, 'Davanagere', 9),
(230, 'Dharwad', 9),
(231, 'Dakshina Kannada', 9),
(232, 'Gadag', 9),
(233, 'Gulbarga', 9),
(234, 'Hassan', 9),
(235, 'Haveri District', 9),
(236, 'Kodagu', 9),
(237, 'Kolar', 9),
(238, 'Koppal', 9),
(239, 'Mandya', 9),
(240, 'Mysore', 9),
(241, 'Raichur', 9),
(242, 'Shimoga', 9),
(243, 'Tumkur', 9),
(244, 'Udupi', 9),
(245, 'Uttara Kannada', 9),
(246, 'Ramanagara', 9),
(247, 'Chikballapur', 9),
(248, 'Yadagiri', 9),
(249, 'Alappuzha', 10),
(250, 'Ernakulam', 10),
(251, 'Idukki', 10),
(252, 'Kollam', 10),
(253, 'Kannur', 10),
(254, 'Kasaragod', 10),
(255, 'Kottayam', 10),
(256, 'Kozhikode', 10),
(257, 'Malappuram', 10),
(258, 'Palakkad', 10),
(259, 'Pathanamthitta', 10),
(260, 'Thrissur', 10),
(261, 'Thiruvananthapuram', 10),
(262, 'Wayanad', 10),
(263, 'Alirajpur', 11),
(264, 'Anuppur', 11),
(265, 'Ashok Nagar', 11),
(266, 'Balaghat', 11),
(267, 'Barwani', 11),
(268, 'Betul', 11),
(269, 'Bhind', 11),
(270, 'Bhopal', 11),
(271, 'Burhanpur', 11),
(272, 'Chhatarpur', 11),
(273, 'Chhindwara', 11),
(274, 'Damoh', 11),
(275, 'Datia', 11),
(276, 'Dewas', 11),
(277, 'Dhar', 11),
(278, 'Dindori', 11),
(279, 'Guna', 11),
(280, 'Gwalior', 11),
(281, 'Harda', 11),
(282, 'Hoshangabad', 11),
(283, 'Indore', 11),
(284, 'Jabalpur', 11),
(285, 'Jhabua', 11),
(286, 'Katni', 11),
(287, 'Khandwa', 11),
(288, 'Khargone', 11),
(289, 'Mandla', 11),
(290, 'Mandsaur', 11),
(291, 'Morena', 11),
(292, 'Narsinghpur', 11),
(293, 'Neemuch', 11),
(294, 'Panna', 11),
(295, 'Rewa', 11),
(296, 'Rajgarh', 11),
(297, 'Ratlam', 11),
(298, 'Raisen', 11),
(299, 'Sagar', 11),
(300, 'Satna', 11),
(301, 'Sehore', 11),
(302, 'Seoni', 11),
(303, 'Shahdol', 11),
(304, 'Shajapur', 11),
(305, 'Sheopur', 11),
(306, 'Shivpuri', 11),
(307, 'Sidhi', 11),
(308, 'Singrauli', 11),
(309, 'Tikamgarh', 11),
(310, 'Ujjain', 11),
(311, 'Umaria', 11),
(312, 'Vidisha', 11),
(313, 'Ahmednagar', 12),
(314, 'Akola', 12),
(315, 'Amrawati', 12),
(316, 'Aurangabad', 12),
(317, 'Bhandara', 12),
(318, 'Beed', 12),
(319, 'Buldhana', 12),
(320, 'Chandrapur', 12),
(321, 'Dhule', 12),
(322, 'Gadchiroli', 12),
(323, 'Gondiya', 12),
(324, 'Hingoli', 12),
(325, 'Jalgaon', 12),
(326, 'Jalna', 12),
(327, 'Kolhapur', 12),
(328, 'Latur', 12),
(329, 'Mumbai City', 12),
(330, 'Mumbai suburban', 12),
(331, 'Nandurbar', 12),
(332, 'Nanded', 12),
(333, 'Nagpur', 12),
(334, 'Nashik', 12),
(335, 'Osmanabad', 12),
(336, 'Parbhani', 12),
(337, 'Pune', 12),
(338, 'Raigad', 12),
(339, 'Ratnagiri', 12),
(340, 'Sindhudurg', 12),
(341, 'Sangli', 12),
(342, 'Solapur', 12),
(343, 'Satara', 12),
(344, 'Thane', 12),
(345, 'Wardha', 12),
(346, 'Washim', 12),
(347, 'Yavatmal', 12),
(348, 'Bishnupur', 13),
(349, 'Churachandpur', 13),
(350, 'Chandel', 13),
(351, 'Imphal East', 13),
(352, 'Senapati', 13),
(353, 'Tamenglong', 13),
(354, 'Thoubal', 13),
(355, 'Ukhrul', 13),
(356, 'Imphal West', 13),
(357, 'East Garo Hills', 14),
(358, 'East Khasi Hills', 14),
(359, 'Jaintia Hills', 14),
(360, 'Ri-Bhoi', 14),
(361, 'South Garo Hills', 14),
(362, 'West Garo Hills', 14),
(363, 'West Khasi Hills', 14),
(364, 'Aizawl', 15),
(365, 'Champhai', 15),
(366, 'Kolasib', 15),
(367, 'Lawngtlai', 15),
(368, 'Lunglei', 15),
(369, 'Mamit', 15),
(370, 'Saiha', 15),
(371, 'Serchhip', 15),
(372, 'Dimapur', 16),
(373, 'Kohima', 16),
(374, 'Mokokchung', 16),
(375, 'Mon', 16),
(376, 'Phek', 16),
(377, 'Tuensang', 16),
(378, 'Wokha', 16),
(379, 'Zunheboto', 16),
(380, 'Angul', 17),
(381, 'Boudh', 17),
(382, 'Bhadrak', 17),
(383, 'Bolangir', 17),
(384, 'Bargarh', 17),
(385, 'Baleswar', 17),
(386, 'Cuttack', 17),
(387, 'Debagarh', 17),
(388, 'Dhenkanal', 17),
(389, 'Ganjam', 17),
(390, 'Gajapati', 17),
(391, 'Jharsuguda', 17),
(392, 'Jajapur', 17),
(393, 'Jagatsinghpur', 17),
(394, 'Khordha', 17),
(395, 'Kendujhar', 17),
(396, 'Kalahandi', 17),
(397, 'Kandhamal', 17),
(398, 'Koraput', 17),
(399, 'Kendrapara', 17),
(400, 'Malkangiri', 17),
(401, 'Mayurbhanj', 17),
(402, 'Nabarangpur', 17),
(403, 'Nuapada', 17),
(404, 'Nayagarh', 17),
(405, 'Puri', 17),
(406, 'Rayagada', 17),
(407, 'Sambalpur', 17),
(408, 'Subarnapur', 17),
(409, 'Sundargarh', 17),
(410, 'Karaikal', 27),
(411, 'Mahe', 27),
(412, 'Puducherry', 27),
(413, 'Yanam', 27),
(414, 'Amritsar', 18),
(415, 'Bathinda', 18),
(416, 'Firozpur', 18),
(417, 'Faridkot', 18),
(418, 'Fatehgarh Sahib', 18),
(419, 'Gurdaspur', 18),
(420, 'Hoshiarpur', 18),
(421, 'Jalandhar', 18),
(422, 'Kapurthala', 18),
(423, 'Ludhiana', 18),
(424, 'Mansa', 18),
(425, 'Moga', 18),
(426, 'Mukatsar', 18),
(427, 'Nawan Shehar', 18),
(428, 'Patiala', 18),
(429, 'Rupnagar', 18),
(430, 'Sangrur', 18),
(431, 'Ajmer', 19),
(432, 'Alwar', 19),
(433, 'Bikaner', 19),
(434, 'Barmer', 19),
(435, 'Banswara', 19),
(436, 'Bharatpur', 19),
(437, 'Baran', 19),
(438, 'Bundi', 19),
(439, 'Bhilwara', 19),
(440, 'Churu', 19),
(441, 'Chittorgarh', 19),
(442, 'Dausa', 19),
(443, 'Dholpur', 19),
(444, 'Dungapur', 19),
(445, 'Ganganagar', 19),
(446, 'Hanumangarh', 19),
(447, 'Juhnjhunun', 19),
(448, 'Jalore', 19),
(449, 'Jodhpur', 19),
(450, 'Jaipur', 19),
(451, 'Jaisalmer', 19),
(452, 'Jhalawar', 19),
(453, 'Karauli', 19),
(454, 'Kota', 19),
(455, 'Nagaur', 19),
(456, 'Pali', 19),
(457, 'Pratapgarh', 19),
(458, 'Rajsamand', 19),
(459, 'Sikar', 19),
(460, 'Sawai Madhopur', 19),
(461, 'Sirohi', 19),
(462, 'Tonk', 19),
(463, 'Udaipur', 19),
(464, 'East Sikkim', 20),
(465, 'North Sikkim', 20),
(466, 'South Sikkim', 20),
(467, 'West Sikkim', 20),
(468, 'Ariyalur', 21),
(469, 'Chennai', 21),
(470, 'Coimbatore', 21),
(471, 'Cuddalore', 21),
(472, 'Dharmapuri', 21),
(473, 'Dindigul', 21),
(474, 'Erode', 21),
(475, 'Kanchipuram', 21),
(476, 'Kanyakumari', 21),
(477, 'Karur', 21),
(478, 'Madurai', 21),
(479, 'Nagapattinam', 21),
(480, 'The Nilgiris', 21),
(481, 'Namakkal', 21),
(482, 'Perambalur', 21),
(483, 'Pudukkottai', 21),
(484, 'Ramanathapuram', 21),
(485, 'Salem', 21),
(486, 'Sivagangai', 21),
(487, 'Tiruppur', 21),
(488, 'Tiruchirappalli', 21),
(489, 'Theni', 21),
(490, 'Tirunelveli', 21),
(491, 'Thanjavur', 21),
(492, 'Thoothukudi', 21),
(493, 'Thiruvallur', 21),
(494, 'Thiruvarur', 21),
(495, 'Tiruvannamalai', 21),
(496, 'Vellore', 21),
(497, 'Villupuram', 21),
(498, 'Dhalai', 22),
(499, 'North Tripura', 22),
(500, 'South Tripura', 22),
(501, 'West Tripura', 22),
(502, 'Almora', 33),
(503, 'Bageshwar', 33),
(504, 'Chamoli', 33),
(505, 'Champawat', 33),
(506, 'Dehradun', 33),
(507, 'Haridwar', 33),
(508, 'Nainital', 33),
(509, 'Pauri Garhwal', 33),
(510, 'Pithoragharh', 33),
(511, 'Rudraprayag', 33),
(512, 'Tehri Garhwal', 33),
(513, 'Udham Singh Nagar', 33),
(514, 'Uttarkashi', 33),
(515, 'Agra', 23),
(516, 'Allahabad', 23),
(517, 'Aligarh', 23),
(518, 'Ambedkar Nagar', 23),
(519, 'Auraiya', 23),
(520, 'Azamgarh', 23),
(521, 'Barabanki', 23),
(522, 'Badaun', 23),
(523, 'Bagpat', 23),
(524, 'Bahraich', 23),
(525, 'Bijnor', 23),
(526, 'Ballia', 23),
(527, 'Banda', 23),
(528, 'Balrampur', 23),
(529, 'Bareilly', 23),
(530, 'Basti', 23),
(531, 'Bulandshahr', 23),
(532, 'Chandauli', 23),
(533, 'Chitrakoot', 23),
(534, 'Deoria', 23),
(535, 'Etah', 23),
(536, 'Kanshiram Nagar', 23),
(537, 'Etawah', 23),
(538, 'Firozabad', 23),
(539, 'Farrukhabad', 23),
(540, 'Fatehpur', 23),
(541, 'Faizabad', 23),
(542, 'Gautam Buddha Nagar', 23),
(543, 'Gonda', 23),
(544, 'Ghazipur', 23),
(545, 'Gorkakhpur', 23),
(546, 'Ghaziabad', 23),
(547, 'Hamirpur', 23),
(548, 'Hardoi', 23),
(549, 'Mahamaya Nagar', 23),
(550, 'Jhansi', 23),
(551, 'Jalaun', 23),
(552, 'Jyotiba Phule Nagar', 23),
(553, 'Jaunpur District', 23),
(554, 'Kanpur Dehat', 23),
(555, 'Kannauj', 23),
(556, 'Kanpur Nagar', 23),
(557, 'Kaushambi', 23),
(558, 'Kushinagar', 23),
(559, 'Lalitpur', 23),
(560, 'Lakhimpur Kheri', 23),
(561, 'Lucknow', 23),
(562, 'Mau', 23),
(563, 'Meerut', 23),
(564, 'Maharajganj', 23),
(565, 'Mahoba', 23),
(566, 'Mirzapur', 23),
(567, 'Moradabad', 23),
(568, 'Mainpuri', 23),
(569, 'Mathura', 23),
(570, 'Muzaffarnagar', 23),
(571, 'Pilibhit', 23),
(572, 'Pratapgarh', 23),
(573, 'Rampur', 23),
(574, 'Rae Bareli', 23),
(575, 'Saharanpur', 23),
(576, 'Sitapur', 23),
(577, 'Shahjahanpur', 23),
(578, 'Sant Kabir Nagar', 23),
(579, 'Siddharthnagar', 23),
(580, 'Sonbhadra', 23),
(581, 'Sant Ravidas Nagar', 23),
(582, 'Sultanpur', 23),
(583, 'Shravasti', 23),
(584, 'Unnao', 23),
(585, 'Varanasi', 23),
(586, 'Birbhum', 24),
(587, 'Bankura', 24),
(588, 'Bardhaman', 24),
(589, 'Darjeeling', 24),
(590, 'Dakshin Dinajpur', 24),
(591, 'Hooghly', 24),
(592, 'Howrah', 24),
(593, 'Jalpaiguri', 24),
(594, 'Cooch Behar', 24),
(595, 'Kolkata', 24),
(596, 'Malda', 24),
(597, 'Midnapore', 24),
(598, 'Murshidabad', 24),
(599, 'Nadia', 24),
(600, 'North 24 Parganas', 24),
(601, 'South 24 Parganas', 24),
(602, 'Purulia', 24),
(603, 'Uttar Dinajpur', 24);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `countryCode` char(2) NOT NULL DEFAULT '',
  `name` varchar(45) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `countryCode`, `name`) VALUES
(1, 'AD', 'Andorra'),
(2, 'AE', 'United Arab Emirates'),
(3, 'AF', 'Afghanistan'),
(4, 'AG', 'Antigua and Barbuda'),
(5, 'AI', 'Anguilla'),
(6, 'AL', 'Albania'),
(7, 'AM', 'Armenia'),
(8, 'AO', 'Angola'),
(9, 'AQ', 'Antarctica'),
(10, 'AR', 'Argentina'),
(11, 'AS', 'American Samoa'),
(12, 'AT', 'Austria'),
(13, 'AU', 'Australia'),
(14, 'AW', 'Aruba'),
(15, 'AX', 'Åland'),
(16, 'AZ', 'Azerbaijan'),
(17, 'BA', 'Bosnia and Herzegovina'),
(18, 'BB', 'Barbados'),
(19, 'BD', 'Bangladesh'),
(20, 'BE', 'Belgium'),
(21, 'BF', 'Burkina Faso'),
(22, 'BG', 'Bulgaria'),
(23, 'BH', 'Bahrain'),
(24, 'BI', 'Burundi'),
(25, 'BJ', 'Benin'),
(26, 'BL', 'Saint Barthélemy'),
(27, 'BM', 'Bermuda'),
(28, 'BN', 'Brunei'),
(29, 'BO', 'Bolivia'),
(30, 'BQ', 'Bonaire'),
(31, 'BR', 'Brazil'),
(32, 'BS', 'Bahamas'),
(33, 'BT', 'Bhutan'),
(34, 'BV', 'Bouvet Island'),
(35, 'BW', 'Botswana'),
(36, 'BY', 'Belarus'),
(37, 'BZ', 'Belize'),
(38, 'CA', 'Canada'),
(39, 'CC', 'Cocos [Keeling] Islands'),
(40, 'CD', 'Democratic Republic of the Congo'),
(41, 'CF', 'Central African Republic'),
(42, 'CG', 'Republic of the Congo'),
(43, 'CH', 'Switzerland'),
(44, 'CI', 'Ivory Coast'),
(45, 'CK', 'Cook Islands'),
(46, 'CL', 'Chile'),
(47, 'CM', 'Cameroon'),
(48, 'CN', 'China'),
(49, 'CO', 'Colombia'),
(50, 'CR', 'Costa Rica'),
(51, 'CU', 'Cuba'),
(52, 'CV', 'Cape Verde'),
(53, 'CW', 'Curacao'),
(54, 'CX', 'Christmas Island'),
(55, 'CY', 'Cyprus'),
(56, 'CZ', 'Czech Republic'),
(57, 'DE', 'Germany'),
(58, 'DJ', 'Djibouti'),
(59, 'DK', 'Denmark'),
(60, 'DM', 'Dominica'),
(61, 'DO', 'Dominican Republic'),
(62, 'DZ', 'Algeria'),
(63, 'EC', 'Ecuador'),
(64, 'EE', 'Estonia'),
(65, 'EG', 'Egypt'),
(66, 'EH', 'Western Sahara'),
(67, 'ER', 'Eritrea'),
(68, 'ES', 'Spain'),
(69, 'ET', 'Ethiopia'),
(70, 'FI', 'Finland'),
(71, 'FJ', 'Fiji'),
(72, 'FK', 'Falkland Islands'),
(73, 'FM', 'Micronesia'),
(74, 'FO', 'Faroe Islands'),
(75, 'FR', 'France'),
(76, 'GA', 'Gabon'),
(77, 'GB', 'United Kingdom'),
(78, 'GD', 'Grenada'),
(79, 'GE', 'Georgia'),
(80, 'GF', 'French Guiana'),
(81, 'GG', 'Guernsey'),
(82, 'GH', 'Ghana'),
(83, 'GI', 'Gibraltar'),
(84, 'GL', 'Greenland'),
(85, 'GM', 'Gambia'),
(86, 'GN', 'Guinea'),
(87, 'GP', 'Guadeloupe'),
(88, 'GQ', 'Equatorial Guinea'),
(89, 'GR', 'Greece'),
(90, 'GS', 'South Georgia and the South Sandwich Islands'),
(91, 'GT', 'Guatemala'),
(92, 'GU', 'Guam'),
(93, 'GW', 'Guinea-Bissau'),
(94, 'GY', 'Guyana'),
(95, 'HK', 'Hong Kong'),
(96, 'HM', 'Heard Island and McDonald Islands'),
(97, 'HN', 'Honduras'),
(98, 'HR', 'Croatia'),
(99, 'HT', 'Haiti'),
(100, 'HU', 'Hungary'),
(101, 'ID', 'Indonesia'),
(102, 'IE', 'Ireland'),
(103, 'IL', 'Israel'),
(104, 'IM', 'Isle of Man'),
(105, 'IN', 'India'),
(106, 'IO', 'British Indian Ocean Territory'),
(107, 'IQ', 'Iraq'),
(108, 'IR', 'Iran'),
(109, 'IS', 'Iceland'),
(110, 'IT', 'Italy'),
(111, 'JE', 'Jersey'),
(112, 'JM', 'Jamaica'),
(113, 'JO', 'Jordan'),
(114, 'JP', 'Japan'),
(115, 'KE', 'Kenya'),
(116, 'KG', 'Kyrgyzstan'),
(117, 'KH', 'Cambodia'),
(118, 'KI', 'Kiribati'),
(119, 'KM', 'Comoros'),
(120, 'KN', 'Saint Kitts and Nevis'),
(121, 'KP', 'North Korea'),
(122, 'KR', 'South Korea'),
(123, 'KW', 'Kuwait'),
(124, 'KY', 'Cayman Islands'),
(125, 'KZ', 'Kazakhstan'),
(126, 'LA', 'Laos'),
(127, 'LB', 'Lebanon'),
(128, 'LC', 'Saint Lucia'),
(129, 'LI', 'Liechtenstein'),
(130, 'LK', 'Sri Lanka'),
(131, 'LR', 'Liberia'),
(132, 'LS', 'Lesotho'),
(133, 'LT', 'Lithuania'),
(134, 'LU', 'Luxembourg'),
(135, 'LV', 'Latvia'),
(136, 'LY', 'Libya'),
(137, 'MA', 'Morocco'),
(138, 'MC', 'Monaco'),
(139, 'MD', 'Moldova'),
(140, 'ME', 'Montenegro'),
(141, 'MF', 'Saint Martin'),
(142, 'MG', 'Madagascar'),
(143, 'MH', 'Marshall Islands'),
(144, 'MK', 'Macedonia'),
(145, 'ML', 'Mali'),
(146, 'MM', 'Myanmar [Burma]'),
(147, 'MN', 'Mongolia'),
(148, 'MO', 'Macao'),
(149, 'MP', 'Northern Mariana Islands'),
(150, 'MQ', 'Martinique'),
(151, 'MR', 'Mauritania'),
(152, 'MS', 'Montserrat'),
(153, 'MT', 'Malta'),
(154, 'MU', 'Mauritius'),
(155, 'MV', 'Maldives'),
(156, 'MW', 'Malawi'),
(157, 'MX', 'Mexico'),
(158, 'MY', 'Malaysia'),
(159, 'MZ', 'Mozambique'),
(160, 'NA', 'Namibia'),
(161, 'NC', 'New Caledonia'),
(162, 'NE', 'Niger'),
(163, 'NF', 'Norfolk Island'),
(164, 'NG', 'Nigeria'),
(165, 'NI', 'Nicaragua'),
(166, 'NL', 'Netherlands'),
(167, 'NO', 'Norway'),
(168, 'NP', 'Nepal'),
(169, 'NR', 'Nauru'),
(170, 'NU', 'Niue'),
(171, 'NZ', 'New Zealand'),
(172, 'OM', 'Oman'),
(173, 'PA', 'Panama'),
(174, 'PE', 'Peru'),
(175, 'PF', 'French Polynesia'),
(176, 'PG', 'Papua New Guinea'),
(177, 'PH', 'Philippines'),
(178, 'PK', 'Pakistan'),
(179, 'PL', 'Poland'),
(180, 'PM', 'Saint Pierre and Miquelon'),
(181, 'PN', 'Pitcairn Islands'),
(182, 'PR', 'Puerto Rico'),
(183, 'PS', 'Palestine'),
(184, 'PT', 'Portugal'),
(185, 'PW', 'Palau'),
(186, 'PY', 'Paraguay'),
(187, 'QA', 'Qatar'),
(188, 'RE', 'Réunion'),
(189, 'RO', 'Romania'),
(190, 'RS', 'Serbia'),
(191, 'RU', 'Russia'),
(192, 'RW', 'Rwanda'),
(193, 'SA', 'Saudi Arabia'),
(194, 'SB', 'Solomon Islands'),
(195, 'SC', 'Seychelles'),
(196, 'SD', 'Sudan'),
(197, 'SE', 'Sweden'),
(198, 'SG', 'Singapore'),
(199, 'SH', 'Saint Helena'),
(200, 'SI', 'Slovenia'),
(201, 'SJ', 'Svalbard and Jan Mayen'),
(202, 'SK', 'Slovakia'),
(203, 'SL', 'Sierra Leone'),
(204, 'SM', 'San Marino'),
(205, 'SN', 'Senegal'),
(206, 'SO', 'Somalia'),
(207, 'SR', 'Suriname'),
(208, 'SS', 'South Sudan'),
(209, 'ST', 'São Tomé and Príncipe'),
(210, 'SV', 'El Salvador'),
(211, 'SX', 'Sint Maarten'),
(212, 'SY', 'Syria'),
(213, 'SZ', 'Swaziland'),
(214, 'TC', 'Turks and Caicos Islands'),
(215, 'TD', 'Chad'),
(216, 'TF', 'French Southern Territories'),
(217, 'TG', 'Togo'),
(218, 'TH', 'Thailand'),
(219, 'TJ', 'Tajikistan'),
(220, 'TK', 'Tokelau'),
(221, 'TL', 'East Timor'),
(222, 'TM', 'Turkmenistan'),
(223, 'TN', 'Tunisia'),
(224, 'TO', 'Tonga'),
(225, 'TR', 'Turkey'),
(226, 'TT', 'Trinidad and Tobago'),
(227, 'TV', 'Tuvalu'),
(228, 'TW', 'Taiwan'),
(229, 'TZ', 'Tanzania'),
(230, 'UA', 'Ukraine'),
(231, 'UG', 'Uganda'),
(232, 'UM', 'U.S. Minor Outlying Islands'),
(233, 'US', 'United States'),
(234, 'UY', 'Uruguay'),
(235, 'UZ', 'Uzbekistan'),
(236, 'VA', 'Vatican City'),
(237, 'VC', 'Saint Vincent and the Grenadines'),
(238, 'VE', 'Venezuela'),
(239, 'VG', 'British Virgin Islands'),
(240, 'VI', 'U.S. Virgin Islands'),
(241, 'VN', 'Vietnam'),
(242, 'VU', 'Vanuatu'),
(243, 'WF', 'Wallis and Futuna'),
(244, 'WS', 'Samoa'),
(245, 'XK', 'Kosovo'),
(246, 'YE', 'Yemen'),
(247, 'YT', 'Mayotte'),
(248, 'ZA', 'South Africa'),
(249, 'ZM', 'Zambia'),
(250, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `crime_history`
--

CREATE TABLE `crime_history` (
  `ch_id` tinyint(1) NOT NULL,
  `ch_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crime_history`
--

INSERT INTO `crime_history` (`ch_id`, `ch_name`) VALUES
(1, 'Yes'),
(2, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `cstomer_review`
--

CREATE TABLE `cstomer_review` (
  `cr_id` int(11) NOT NULL,
  `review_detail` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `published` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cstomer_review`
--

INSERT INTO `cstomer_review` (`cr_id`, `review_detail`, `created_at`, `published`) VALUES
(1, '{\"name\":\"Rahul Kumar Jha\",\"email\":\"rahul@gmail.com\",\"address\":\"Kolkata\",\"message\":\"So polite behaviour and provide responsible maid as per my requirement with more option. Great service.\"}', '0000-00-00 00:00:00', 1),
(2, '{\"name\":\"Ankit Sahani\",\"email\":\"ankit@mail.com\",\"address\":\"Kolkata\",\"message\":\"Happy from the services good and reliable maid provided by the owner\"}', '0000-00-00 00:00:00', 1),
(3, '{\"name\":\"Aman Choudhary\",\"email\":\"aman@gmail.com\",\"address\":\"Kolkata\",\"message\":\"Happy from the services good and reliable maid provided by the owner\"}', '0000-00-00 00:00:00', 1),
(6, '{\"name\":\"NAVEEN DAS\",\"email\":\"naveendas086@gmail.com\",\"address\":\"mumbai\",\"message\":\"test\"}', '2023-07-06 15:18:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gender_master`
--

CREATE TABLE `gender_master` (
  `g_id` tinyint(1) NOT NULL,
  `gender_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gender_master`
--

INSERT INTO `gender_master` (`g_id`, `gender_name`) VALUES
(1, 'Male'),
(2, 'Female'),
(3, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `illness_master`
--

CREATE TABLE `illness_master` (
  `il_id` int(11) NOT NULL,
  `illness_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `illness_master`
--

INSERT INTO `illness_master` (`il_id`, `illness_name`) VALUES
(1, 'Yes'),
(2, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `language_master`
--

CREATE TABLE `language_master` (
  `l_id` int(11) NOT NULL,
  `language_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `language_master`
--

INSERT INTO `language_master` (`l_id`, `language_name`) VALUES
(1, 'Bengali'),
(2, 'English'),
(3, 'Hindi');

-- --------------------------------------------------------

--
-- Table structure for table `lead_confirm_master`
--

CREATE TABLE `lead_confirm_master` (
  `lc_id` tinyint(1) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lead_confirm_master`
--

INSERT INTO `lead_confirm_master` (`lc_id`, `name`) VALUES
(1, 'Lead'),
(2, 'Confirm');

-- --------------------------------------------------------

--
-- Table structure for table `leave_request`
--

CREATE TABLE `leave_request` (
  `l_id` int(11) NOT NULL,
  `user_type` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'PK of user_details',
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `leave_subject` varchar(255) NOT NULL,
  `leave_message` text NOT NULL,
  `lsm_id` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'from leave_stat_master',
  `approved_by` int(11) NOT NULL DEFAULT 0,
  `approve_date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leave_request`
--

INSERT INTO `leave_request` (`l_id`, `user_type`, `user_id`, `from_date`, `to_date`, `leave_subject`, `leave_message`, `lsm_id`, `approved_by`, `approve_date_time`) VALUES
(1, 2, 2, '2026-04-15', '2026-04-16', 'Need a leave', 'Need a leave for poila boisakh', 2, 0, '2026-04-02 09:10:13');

-- --------------------------------------------------------

--
-- Table structure for table `leave_stat_master`
--

CREATE TABLE `leave_stat_master` (
  `lsm_id` tinyint(1) NOT NULL,
  `l_stat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leave_stat_master`
--

INSERT INTO `leave_stat_master` (`lsm_id`, `l_stat_name`) VALUES
(1, 'Pending'),
(2, 'Approved'),
(3, 'Decline');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `profile_name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `profile_name`, `username`, `password`) VALUES
(1, 'Mr. Kundan Saha', 'saha', 'saha123!@#');

-- --------------------------------------------------------

--
-- Table structure for table `marital_status_master`
--

CREATE TABLE `marital_status_master` (
  `m_id` tinyint(1) NOT NULL,
  `m_status_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marital_status_master`
--

INSERT INTO `marital_status_master` (`m_id`, `m_status_name`) VALUES
(1, 'Single'),
(2, 'Married'),
(3, 'Widow'),
(4, 'Divorced');

-- --------------------------------------------------------

--
-- Table structure for table `nurses_master`
--

CREATE TABLE `nurses_master` (
  `nr_id` int(11) NOT NULL,
  `nr_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nurses_master`
--

INSERT INTO `nurses_master` (`nr_id`, `nr_name`) VALUES
(1, 'GNM'),
(2, 'GDA'),
(3, 'ANM'),
(4, 'BSC'),
(5, 'Para Medic'),
(6, 'Dialysis Technician');

-- --------------------------------------------------------

--
-- Table structure for table `police_verification`
--

CREATE TABLE `police_verification` (
  `pv_id` tinyint(1) NOT NULL,
  `pv_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `police_verification`
--

INSERT INTO `police_verification` (`pv_id`, `pv_name`) VALUES
(1, 'Yes'),
(2, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `quote_request`
--

CREATE TABLE `quote_request` (
  `quote_id` int(11) NOT NULL,
  `quote_details` longtext NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `read_unread` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quote_request`
--

INSERT INTO `quote_request` (`quote_id`, `quote_details`, `created_on`, `read_unread`) VALUES
(1, '{\"name\":\"Souvick Biswas\",\"phone_number\":\"9432953523\",\"email\":\"\",\"address\":\"Dddd\",\"message\":\"Ddddhhhh\"}', '2023-06-16 16:54:43', '0'),
(2, '{\"name\":\"Suman Biswas\",\"phone_number\":\"9733935161\",\"email\":\"\",\"address\":\"Kolkaa\",\"message\":\"send me a main quote\"}', '2026-03-01 14:01:02', '0'),
(3, '{\"name\":\"suman jana\",\"phone_number\":\"09733935161\",\"email\":\"\",\"address\":\"Kolkata Sodepur\",\"required_skills\":[\"Cook\",\"Pet Care\"],\"required_hourse\":[\"2 Hours\"],\"message\":\"I need a maid for cooking please send me a quotation\"}', '2026-03-31 23:15:11', '1');

-- --------------------------------------------------------

--
-- Table structure for table `service_manager`
--

CREATE TABLE `service_manager` (
  `service_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `services_photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_manager`
--

INSERT INTO `service_manager` (`service_id`, `name`, `description`, `created_on`, `updated_on`, `services_photo`) VALUES
(6, 'All types of man power supply', 'We have all types of employess (Skilled, Unskilled & Semiskilled). We supply man power for Driver Services, Contract Labour Supplier Services, Plumbing Contractors, Industrial Manpower Services, Staffing Service, and Labour Consultants.', '2023-04-05 09:59:59', '2023-04-05 09:59:59', ''),
(7, 'House keeping in office & Commercial Place', 'Housekeeping refers to day-to-day cleanliness, tidiness and good order in all parts of the office. Good housekeeping provides a clean and pleasant working environment. It also helps prevent accidents in the workplace and aids the efficient operation of the office.', '2023-04-05 10:14:21', '2023-04-05 10:14:21', ''),
(10, 'All Types of Maid', 'Basic House Cleaning, Deep/Spring Cleaning, Green Cleaning Services, Ceiling and Wall Cleaning, Curtain Cleaning, Carpet and Upholstery Maid Services, Blind and Chimney Cleaning, Pressure Washing', '2023-04-05 20:23:32', '2023-04-05 20:52:07', ''),
(11, 'Pet Care', 'We provide best quality of pet care', '2023-06-16 17:01:25', '2023-06-16 17:01:25', '');

-- --------------------------------------------------------

--
-- Table structure for table `skills_master`
--

CREATE TABLE `skills_master` (
  `sk_id` int(11) NOT NULL,
  `skill_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills_master`
--

INSERT INTO `skills_master` (`sk_id`, `skill_name`) VALUES
(1, 'Housemaid'),
(2, 'Cook'),
(3, 'Nanny'),
(4, 'Patient Care'),
(5, 'Japa'),
(6, 'Pet Care'),
(7, 'Elder Care');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `country_id`) VALUES
(1, 'ANDHRA PRADESH', 105),
(2, 'ASSAM', 105),
(3, 'ARUNACHAL PRADESH', 105),
(4, 'BIHAR', 105),
(5, 'GUJRAT', 105),
(6, 'HARYANA', 105),
(7, 'HIMACHAL PRADESH', 105),
(8, 'JAMMU & KASHMIR', 105),
(9, 'KARNATAKA', 105),
(10, 'KERALA', 105),
(11, 'MADHYA PRADESH', 105),
(12, 'MAHARASHTRA', 105),
(13, 'MANIPUR', 105),
(14, 'MEGHALAYA', 105),
(15, 'MIZORAM', 105),
(16, 'NAGALAND', 105),
(17, 'ORISSA', 105),
(18, 'PUNJAB', 105),
(19, 'RAJASTHAN', 105),
(20, 'SIKKIM', 105),
(21, 'TAMIL NADU', 105),
(22, 'TRIPURA', 105),
(23, 'UTTAR PRADESH', 105),
(24, 'WEST BENGAL', 105),
(25, 'DELHI', 105),
(26, 'GOA', 105),
(27, 'PONDICHERY', 105),
(28, 'LAKSHDWEEP', 105),
(29, 'DAMAN & DIU', 105),
(30, 'DADRA & NAGAR', 105),
(31, 'CHANDIGARH', 105),
(32, 'ANDAMAN & NICOBAR', 105),
(33, 'UTTARANCHAL', 105),
(34, 'JHARKHAND', 105),
(35, 'CHATTISGARH', 105);

-- --------------------------------------------------------

--
-- Table structure for table `stay_type`
--

CREATE TABLE `stay_type` (
  `st_id` int(11) NOT NULL,
  `st_type_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stay_type`
--

INSERT INTO `stay_type` (`st_id`, `st_type_name`) VALUES
(1, 'Live-in'),
(2, 'Part-time'),
(3, 'Full-time');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=Admin(owner) 2=Manager 3=Employee 4=Client 5=Worker',
  `added_by` int(11) NOT NULL DEFAULT 0,
  `full_name` varchar(255) NOT NULL,
  `fat_hus_name` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `alt_phone_number` varchar(10) NOT NULL,
  `m_id` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'PK of marital_status_master',
  `date_of_birth` date NOT NULL,
  `gender` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'PK of gender_master',
  `address` text NOT NULL,
  `curr_address` text NOT NULL,
  `city_id` int(11) NOT NULL COMMENT 'PK of cities',
  `state_id` int(11) NOT NULL DEFAULT 0 COMMENT 'PK of states table',
  `country_id` int(11) NOT NULL COMMENT 'PK of countries',
  `pincode` varchar(6) NOT NULL,
  `adhar_card` varchar(12) NOT NULL,
  `adhar_card_img` varchar(255) NOT NULL,
  `adhar_card_back_img` varchar(255) NOT NULL,
  `pan_card` varchar(10) NOT NULL,
  `pan_card_img` varchar(255) NOT NULL,
  `voter_id_card` varchar(10) NOT NULL,
  `voter_id_card_img` varchar(255) NOT NULL,
  `voter_id_card_back_img` varchar(255) NOT NULL,
  `user_photo` varchar(255) NOT NULL,
  `wt_id` text NOT NULL COMMENT 'PK of work_type',
  `work_type_others` varchar(255) NOT NULL,
  `work_exp` int(11) NOT NULL DEFAULT 0,
  `earlier_work_city` varchar(10) NOT NULL,
  `last_emplr_name` varchar(255) NOT NULL,
  `sk_id` text NOT NULL COMMENT 'PK of skills_master',
  `l_id` text NOT NULL COMMENT 'PK of language_master',
  `work_loc` varchar(255) NOT NULL,
  `st_id` int(11) NOT NULL DEFAULT 0 COMMENT 'PK of stay_type',
  `exp_salary` decimal(10,2) NOT NULL,
  `available_from` datetime DEFAULT current_timestamp(),
  `wf_id` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'PK of weekly_off',
  `il_id` int(11) NOT NULL DEFAULT 0 COMMENT 'PK of illness_master',
  `pv_id` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'PK of police_verification',
  `ch_id` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'PK of crime_history',
  `emg_cont_person` varchar(255) NOT NULL,
  `relation` varchar(255) NOT NULL,
  `emg_cont_number` varchar(10) NOT NULL,
  `bank_details` text NOT NULL,
  `bank_details_img` varchar(255) NOT NULL,
  `highest_edu` varchar(255) NOT NULL,
  `declaration` tinyint(1) NOT NULL DEFAULT 0,
  `lc_id` tinyint(4) NOT NULL DEFAULT 0,
  `wh_id` int(11) NOT NULL COMMENT '	PK of working_hour_master',
  `religion` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `family_bg_info` text NOT NULL,
  `nr_id` text NOT NULL COMMENT 'PK of nurses_master',
  `misce_doc` text NOT NULL,
  `inserted_by` int(11) NOT NULL DEFAULT 0,
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `insert_date` datetime NOT NULL DEFAULT current_timestamp(),
  `update_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `username`, `password`, `user_type`, `added_by`, `full_name`, `fat_hus_name`, `email_id`, `phone_number`, `alt_phone_number`, `m_id`, `date_of_birth`, `gender`, `address`, `curr_address`, `city_id`, `state_id`, `country_id`, `pincode`, `adhar_card`, `adhar_card_img`, `adhar_card_back_img`, `pan_card`, `pan_card_img`, `voter_id_card`, `voter_id_card_img`, `voter_id_card_back_img`, `user_photo`, `wt_id`, `work_type_others`, `work_exp`, `earlier_work_city`, `last_emplr_name`, `sk_id`, `l_id`, `work_loc`, `st_id`, `exp_salary`, `available_from`, `wf_id`, `il_id`, `pv_id`, `ch_id`, `emg_cont_person`, `relation`, `emg_cont_number`, `bank_details`, `bank_details_img`, `highest_edu`, `declaration`, `lc_id`, `wh_id`, `religion`, `nationality`, `family_bg_info`, `nr_id`, `misce_doc`, `inserted_by`, `updated_by`, `insert_date`, `update_date`) VALUES
(1, 'superadmin@sahaservices.in', '12345678', 1, 0, 'Super Admin', '', 'superadmin@sahaservices.in', '9733935161', '9733935162', 1, '1987-10-01', 1, 'Village: Bhuarag; PO: Agunshi', '', 595, 24, 105, '711303', '999955553333', '1773334960.png', '', 'BCCPJ9833J', '1773335000.png', 'HRC212', '1773335010.png', '', '', '', '', 0, '', '', '[\"3\",\"2\",\"1\"]', '[\"1\",\"3\"]', 'kolkata', 1, 50000.00, '2026-03-25 00:00:00', 1, 2, 2, 2, '', '', '', 'A/c: 32953529067', '1773335068.png', 'Graduate', 1, 0, 0, '', '', '', '', '', 0, 1, '2026-03-02 22:36:01', '2026-04-10 12:51:55'),
(2, 'manager@sahaservices.in', '12345678', 2, 1, 'Manager Admin', '', 'manager@sahaservices.in', '9733935162', '', 1, '1988-03-01', 1, 'Village: Natibpur', '', 0, 0, 0, '711304', '951847632145', '', '', 'BHHYI8966L', '', 'HRC2123', '', '', '', '', '', 0, '', '', '[\"3\",\"1\",\"6\"]', '[\"1\",\"3\"]', '', 0, 0.00, '2026-03-03 00:00:00', 0, 0, 0, 0, '', '', '', 'A/c: 6985321020', '', 'Higher Secondary', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-02 22:40:30', '2026-03-28 09:18:25'),
(3, 'employee@sahaservices.in', '12345678', 3, 1, 'Tridip Samanta', '', 'employee@sahaservices.in', '9733935163', '', 1, '1997-03-01', 1, 'Village: Chakashi', '', 0, 0, 0, '711305', '951847632146', '', '', 'BCCPJ9833P', '', 'HRC2126', '', '', '1778817254.jpg', '', '', 0, '', '', '[\"2\"]', '[\"1\"]', '', 0, 0.00, '2026-03-03 00:00:00', 0, 0, 0, 0, '', '', '', 'A/c: 568923124578', '', 'Higher secondary', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-02 22:48:40', '2026-05-15 09:29:43'),
(4, 'client@sahaservices.in', '12345678', 4, 1, 'Client No1', '', 'client@sahaservices.in', '9733935164', '', 1, '1990-03-15', 1, 'Village: Gongaram pur', '', 0, 0, 0, '711306', '951845632146', '', '', 'BCCKJ9833J', '', 'HRC2124', '', '', '', '', '', 0, '', '', '0', '0', '', 0, 0.00, '2026-03-03 00:00:00', 0, 0, 0, 0, '', '', '', 'A/c No: 7456321025', '', 'Madhyamick', 0, 0, 0, '', '', '', '', '', 1, 0, '2026-03-02 22:59:06', '2026-03-28 09:18:25'),
(28, '', '', 5, 1, 'Soni Kumari Dusadh', 'Bikas Patra', '', '9330713148', '', 2, '1987-12-23', 2, 'Tank Road Garulia, North 24 parganas, West Bengal', 'Tank Road Garulia, North 24 parganas, West Bengal', 600, 24, 105, '743133', '615019576194', '1773566486.jpeg', '', '', '', '', '', '', '1773567392.jpeg', '', '', 6, 'kolkata', '', '[\"3\"]', '[\"3\"]', '', 1, 14000.00, '2026-03-15 14:27:42', 2, 2, 0, 0, '', '', '', '', '', '', 1, 0, 0, '', '', '', '', '', 1, 1, '2026-03-15 14:27:42', '2026-03-28 09:18:25'),
(29, '', '', 5, 1, 'Surendra Das', 'Bhutaki Harijan', '', '9327524351', '9523185722', 2, '1993-06-01', 1, 'Nayachak kenduar Amarpur Banka Amarpur Bihar', 'Nayachak kenduar Amarpur Banka Amarpur Bihar', 61, 4, 105, '813101', '894075000513', '1773567949.jpeg', '', '', '', '', '1773568106.jpeg', '', '1773568067.jpeg', '', '', 10, '', '', '[\"2\"]', '[\"3\"]', '', 1, 14000.00, '2026-03-15 15:08:57', 0, 2, 0, 0, '', 'Wife', '9523185722', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-15 15:08:57', '2026-03-28 09:18:25'),
(30, '', '', 5, 1, 'Alisha Parveen', 'Md. Gora', '', '9674866416', '', 2, '2001-07-07', 2, 'Mallikpur peertala Road Baruipur South 24pgs West Bengal', 'Mallikpur peertala Road Baruipur South 24pgs West Bengal', 601, 24, 105, '700145', 'TYK2822690', '', '', '', '', 'TYK2822690', '1773569143.jpeg', '', '1773569150.jpeg', '', '', 0, '', '', '[\"1\"]', '[\"3\"]', '', 2, 12000.00, '2026-03-15 15:23:54', 0, 2, 1, 2, '', '', '', '', '', '', 0, 0, 1, '', '', '', '', '', 1, 1, '2026-03-15 15:23:54', '2026-04-18 09:38:21'),
(31, '', '', 5, 1, 'Rani Hela', 'Pitambar Hela ', '', '7602955758', '', 2, '1982-02-18', 2, 'K.S  Road Beldanga, Asansol, Dhadka Bardhaman West Bengal', 'K.S  Road Beldanga, Asansol, Dhadka Bardhaman West Bengal', 588, 24, 105, '713302', '635629909160', '1773569680.jpeg', '', '', '', 'AOJ0992073', '1773569713.jpeg', '', '1773569740.jpeg', '', '', 7, '', '', '[\"3\"]', '[\"3\"]', '', 1, 28.00, '2026-03-15 15:38:10', 0, 2, 1, 2, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-15 15:38:10', '2026-03-28 09:18:25'),
(33, '', '', 5, 1, 'Rabani Kisku', 'Sukumar Kisku', '', '9883664647', '', 2, '1999-09-15', 2, 'Shibpur Sutadanga Kanksa Sibpur Bardhaman West Bengal', 'Shibpur Sutadanga Kanksa Sibpur Bardhaman West Bengal', 588, 24, 105, '713212', '476699688182', '1773571501.jpeg', '', '', '', 'ZZE1811132', '1773571536.jpeg', '', '1773571543.jpeg', '', '', 0, '', '', '[\"2\"]', '[\"1\"]', '', 1, 13.00, '2026-03-15 16:08:54', 0, 2, 1, 2, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-15 16:08:54', '2026-03-28 09:18:25'),
(34, '', '', 5, 1, 'Moni Hebrom', 'Maharaja Hembrom', '', '8653398101', '', 2, '1990-01-01', 2, 'Andhesuri Bankathi Kanksa Bardhaman West Bengal', 'Andhesuri Bankathi Kanksa Bardhaman West Bengal', 588, 24, 105, '713148', '713288435810', '1773572302.jpeg', '', '', '', 'ZZE0920280', '1773572314.jpeg', '', '1773572409.jpeg', '', '', 3, '', '', '[\"3\"]', '[\"3\"]', '', 0, 0.00, '2026-03-15 16:18:22', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-15 16:18:22', '2026-03-28 09:18:25'),
(35, '', '', 5, 1, 'Mamani Jana', 'Sukumar Jana', '', '8272901380', '', 2, '1984-11-10', 2, 'Dashbagha Kazirchora Howrah West Bengal', 'Dashbagha Kazirchora Howrah West Bengal', 592, 24, 105, '711307', '503487595411', '1773573585.jpeg', '', '', '', '', '', '', '1773573596.jpeg', '', '', 3, '', '', '[\"1\"]', '[\"1\"]', '', 2, 10000.00, '2026-03-15 16:44:22', 0, 2, 1, 2, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-15 16:44:22', '2026-03-28 09:18:25'),
(36, '', '', 5, 1, 'Kirandeep Kaur', 'Gurcharan Singh', '', '8427981493', '', 2, '1998-01-01', 2, 'Jandiali Ludhiana Punjab', 'un', 423, 18, 105, '141112', '648261769467', '1773574217.jpeg', '', '', '', '', '', '', '1773574224.jpeg', '', '', 7, '', '', '[\"3\"]', '[\"3\"]', '', 1, 25.00, '2026-03-15 16:53:10', 0, 2, 1, 2, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-15 16:53:10', '2026-03-28 09:18:25'),
(37, '', '', 5, 1, 'Jhuma Pal', 'Nitya Kumar Sutradhar', '', '9242835162', '', 2, '1990-08-05', 2, 'Balgana Station para balgana Tulshidanga Barddhaman West Bengal', 'Balgana Station para balgana Tulshidanga Barddhaman West Bengal', 588, 24, 105, '713125', '969930864527', '1774683942.jpeg', '1774683947.jpeg', '', '', '', '', '', '1774683951.jpeg', '', '', 4, '', '', '[\"2\",\"1\"]', '[\"1\"]', '', 0, 0.00, '2026-03-15 17:10:18', 0, 0, 0, 0, '', '', '', '', '', '4th passed', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-15 17:10:18', '2026-03-30 08:39:37'),
(38, '', '', 4, 1, 'Anurag Karmakar', '', '', '9903318834', '', 0, '0000-00-00', 1, 'khardah', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"3\",\"1\"]', '[\"1\",\"2\",\"3\"]', '', 0, 0.00, '2026-03-15 17:21:35', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-15 17:21:35', '2026-03-28 09:18:25'),
(39, '', '', 5, 1, 'Gita Devi', 'Ram Krishna Shaw', '', '8420142679', '', 2, '1990-01-01', 2, 'Mehedi Bagan Burdwan Purba Bardhaman', '', 588, 24, 105, '713101', '5432 5776 39', '1773990529.jpeg', '', '', '', '', '', '', '1773990542.jpeg', '', '', 5, '', '', '[\"3\",\"5\"]', '[\"1\",\"3\"]', '', 1, 18000.00, '2026-03-20 12:30:29', 0, 2, 1, 2, '', '', '', '', '', '8 TH Passed', 1, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 12:30:29', '2026-03-28 09:18:25'),
(40, '', '', 5, 1, 'Surekha Pashi', 'Ram nath Pashi', '', '8100689960', '', 2, '1980-02-04', 2, '1/4 Gorapada Sarkar Lane, Ultadanga Main Road Kol', '', 595, 24, 105, '700067', '8460 2777 42', '1773995426.jpeg', '', '', '', '', '', '', '1773995445.jpeg', '', '', 0, '', '', '[\"2\",\"1\"]', '[\"2\",\"3\"]', '', 2, 0.00, '2026-03-20 13:17:11', 0, 2, 1, 2, '', '', '', '', '', '8th Passed', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 13:17:11', '2026-03-28 09:18:25'),
(41, '', '', 5, 1, 'Beauty Dutta', 'Biswajit Dutta', '', '9091343790', '', 2, '1987-01-01', 2, 'Balgona Bhatan Bardhaman West Bengal ', '', 588, 24, 105, '713125', '3227 2457 45', '1773996464.jpeg', '', '', '', '', '', '', '1773996276.jpeg', '', '', 7, '', '', '[\"3\"]', '[\"1\"]', '', 1, 0.00, '2026-03-20 14:06:53', 0, 2, 1, 2, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 14:06:53', '2026-03-28 09:18:25'),
(42, '', '', 4, 1, 'Niyati Chamyal', '', '', '7899799289', '', 1, '0000-00-00', 0, 'Bangalore', '', 224, 9, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"3\",\"2\",\"1\"]', '', '', 1, 30000.00, '2026-03-20 14:21:42', 0, 2, 1, 2, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 14:21:42', '2026-03-28 09:18:25'),
(43, '', '', 4, 1, 'Sonam shaw', '', '', '8910936282', '', 0, '0000-00-00', 0, 'Sodepur HB town', '', 601, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"1\"]', '', '', 0, 0.00, '2026-03-20 14:36:57', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 14:36:57', '2026-03-28 09:18:25'),
(44, '', '', 4, 1, 'Ram Pravesh', '', '', '9343411227', '', 0, '0000-00-00', 0, 'Mall Road Jessore Road Nagerbazar', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"2\",\"1\"]', '', '', 0, 0.00, '2026-03-20 14:43:17', 0, 0, 0, 0, '', '', '', '', '', '', 1, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 14:43:17', '2026-03-28 09:18:25'),
(45, '', '', 4, 1, 'Arvind Agarwal', '', '', '7003830276', '', 1, '0000-00-00', 1, 'Titagarh', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"1\"]', '', '', 0, 0.00, '2026-03-20 14:49:20', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 14:49:20', '2026-03-28 09:18:25'),
(46, '', '', 4, 1, 'Deven Sir', '', '', '9874800993', '', 1, '0000-00-00', 1, 'Salt Lake ', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"3\"]', '', '', 0, 0.00, '2026-03-20 14:51:03', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 14:51:03', '2026-03-28 09:18:25'),
(47, '', '', 4, 1, 'Aayush Samaddar', '', '', '9664550318', '', 0, '0000-00-00', 0, 'Gujarat Ahmedabad', '', 125, 5, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"7\"]', '[\"3\"]', '', 1, 0.00, '2026-03-20 15:05:59', 0, 0, 0, 2, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 15:05:59', '2026-03-28 09:18:25'),
(48, '', '', 4, 1, 'Preeti Baid', '', '', '9903669240', '', 0, '0000-00-00', 0, 'Howrah', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"7\",\"2\"]', '', '', 2, 11000.00, '2026-03-20 15:12:56', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 15:12:56', '2026-03-28 09:18:25'),
(49, '', '', 4, 1, 'Sushil Tiwari', '', '', '9830056820', '', 0, '0000-00-00', 0, 'Mandirtala', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"3\"]', '', '', 2, 0.00, '2026-03-20 15:19:58', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 15:19:58', '2026-03-28 09:18:25'),
(50, '', '', 4, 1, 'Megha Guha', '', '', '7980484784', '', 1, '0000-00-00', 1, 'Andul Howrah', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"2\",\"1\"]', '', '', 3, 15000.00, '2026-03-20 15:21:48', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 15:21:48', '2026-03-28 09:18:25'),
(51, '', '', 4, 1, 'Dola Roy Karmakar', '', '', '9038241510', '', 0, '0000-00-00', 1, '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"2\"]', '', '', 2, 12000.00, '2026-03-20 15:24:04', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 15:24:04', '2026-03-28 09:18:25'),
(52, '', '', 4, 1, 'Sromona Burman', '', '', '9433056750', '', 1, '0000-00-00', 1, 'Rajarhat Gobindo Nivas Khelarmath', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"7\"]', '', '', 2, 350.00, '2026-03-20 15:28:06', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 15:28:06', '2026-03-28 09:18:25'),
(53, '', '', 4, 1, 'Anushikha Kothari ', '', '', '8420787671', '', 1, '0000-00-00', 1, 'Howrah Ac', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"7\"]', '', '', 0, 450.00, '2026-03-20 15:32:09', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 15:32:09', '2026-03-28 09:18:25'),
(54, '', '', 4, 1, 'Santosh Bothra', '', '', '9910746184', '', 1, '0000-00-00', 1, 'Howrah Salkia', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"7\",\"2\",\"1\"]', '', '', 1, 0.00, '2026-03-20 15:33:51', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 15:33:51', '2026-03-28 09:18:25'),
(55, '', '', 4, 1, 'Parth Chakraborty', '', '', '9038703454', '', 1, '0000-00-00', 1, 'Newtown', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"7\",\"2\",\"1\"]', '', '', 1, 0.00, '2026-03-20 15:36:14', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 15:36:14', '2026-03-28 09:18:25'),
(56, '', '', 4, 1, 'Divya Bansal Mannu Kapoor', '', '', '9818120770', '', 1, '0000-00-00', 1, 'Delhi Noida', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"3\"]', '', '', 2, 0.00, '2026-03-20 15:38:17', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 15:38:17', '2026-03-28 09:18:25'),
(57, '', '', 4, 1, 'Sandhya Geonka', '', '', '9831036358', '', 1, '0000-00-00', 1, 'Vedic Village', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"7\"]', '', '', 1, 0.00, '2026-03-20 15:40:11', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 15:40:11', '2026-03-28 09:18:25'),
(58, '', '', 4, 1, 'Anurag Karmakar', '', '', '', '', 1, '0000-00-00', 1, 'Khardah', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"1\"]', '', '', 0, 0.00, '2026-03-20 15:45:19', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 15:45:19', '2026-03-28 09:18:25'),
(59, '', '', 4, 1, 'Sujena Sharma', '', '', '9147082350', '', 1, '0000-00-00', 1, 'Chinar Park', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"2\"]', '', '', 2, 550.00, '2026-03-20 16:26:35', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 16:26:35', '2026-03-28 09:18:25'),
(60, '', '', 4, 1, 'sakuntala Das', '', '', '9102456677', '', 1, '0000-00-00', 1, 'AC Market Howrah Ghasbagan', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"2\"]', '', '', 0, 0.00, '2026-03-20 16:36:29', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 16:36:29', '2026-03-28 09:18:25'),
(61, '', '', 4, 1, 'Harsh Jain', '', '', '8617202629', '', 1, '0000-00-00', 1, 'Howrah Raghav Residency Farsha Road', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"7\",\"2\"]', '', '', 0, 0.00, '2026-03-20 16:38:51', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 16:38:51', '2026-03-28 09:18:25'),
(62, '', '', 4, 1, 'Satabdi Roy', '', '', '9831419643', '', 1, '0000-00-00', 1, 'HOWRAH Betaitala', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"2\"]', '', '', 2, 0.00, '2026-03-20 16:42:34', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 16:42:34', '2026-03-28 09:18:25'),
(63, '', '', 4, 1, 'Giribala Samal', '', '', '9038559862', '', 1, '0000-00-00', 1, 'Howrah', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-03-20 16:44:56', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 16:44:56', '2026-03-28 09:18:25'),
(65, '', '', 4, 1, 'g', '', '', '', '', 1, '0000-00-00', 1, '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-03-20 17:07:24', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 0, '2026-03-20 17:07:24', '2026-03-28 09:18:25'),
(66, '', '', 4, 1, 'Somlata Chowdhury', '', '', '', '', 1, '0000-00-00', 1, 'Salkia', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"7\",\"2\"]', '', '', 0, 0.00, '2026-03-20 17:09:16', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 17:09:16', '2026-03-28 09:18:25'),
(67, '', '', 4, 1, 'Subhashis Mukherjee', '', '', '9933080155', '', 1, '0000-00-00', 1, 'Andul', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"4\"]', '', '', 0, 18000.00, '2026-03-20 17:13:19', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 17:13:19', '2026-03-28 09:18:25'),
(68, '', '', 4, 1, 'Satrujit ', '', '', '9090909778', '', 1, '0000-00-00', 1, 'Tollygunge', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"2\"]', '', '', 1, 18000.00, '2026-03-20 17:16:22', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 17:16:22', '2026-03-28 09:18:25'),
(69, '', '', 4, 1, 'Ridhima Chawla', '', '', '9903295588', '', 1, '0000-00-00', 1, 'Park Street', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"2\"]', '', '', 0, 17000.00, '2026-03-20 17:20:44', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 17:20:44', '2026-03-28 09:18:25'),
(70, '', '', 4, 1, 'Mohini Jaiswal', '', '', '8450064876', '', 1, '0000-00-00', 1, 'Laketown', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"1\"]', '', '', 0, 0.00, '2026-03-20 17:23:13', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 17:23:13', '2026-03-28 09:18:25'),
(71, '', '', 4, 1, 'Mrs. A Kashyap', '', '', '9073881805', '', 1, '0000-00-00', 1, 'Arbana Rubi', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"7\",\"2\",\"1\"]', '', '', 0, 0.00, '2026-03-20 17:26:03', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 17:26:03', '2026-03-28 09:18:25'),
(72, '', '', 4, 1, 'Kamal Nayan', '', '', '9771402765', '', 1, '0000-00-00', 1, 'Salkia Howrah Hoogly Doc', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"5\"]', '', '', 2, 650.00, '2026-03-20 17:28:42', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 17:28:42', '2026-03-28 09:18:25'),
(73, '', '', 4, 1, 'Faiyaz Ali', '', '', '7044325242', '', 1, '0000-00-00', 1, 'Shivpur', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"4\"]', '', '', 2, 500.00, '2026-03-20 17:32:07', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 17:32:07', '2026-03-28 09:18:25'),
(74, '', '', 4, 1, 'Jayanthi', '', '', '7257828753', '', 1, '0000-00-00', 1, 'Bangalore', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"3\"]', '', '', 0, 0.00, '2026-03-20 17:34:00', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 17:34:00', '2026-03-28 09:18:25'),
(75, '', '', 4, 1, 'Srishti', '', '', '8897173411', '', 1, '0000-00-00', 1, 'Hyderabad', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"3\"]', '', '', 0, 0.00, '2026-03-20 17:36:17', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 17:36:17', '2026-03-28 09:18:25'),
(76, '', '', 4, 1, 'Priyanka Haldar', '', '', '8420957896', '', 1, '0000-00-00', 1, 'Newtown', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 1, 0.00, '2026-03-20 17:38:41', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 17:38:41', '2026-03-28 09:18:25'),
(77, '', '', 4, 1, 'Jaya Roy Chowdhury', '', '', '9007986009', '', 1, '0000-00-00', 1, 'Kasba Aqua Polish Mall', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"7\",\"2\"]', '', '', 0, 0.00, '2026-03-20 17:39:55', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 17:39:55', '2026-03-28 09:18:25'),
(78, '', '', 4, 1, 'Jayeeta Bose', '', '', '9051042204', '', 1, '0000-00-00', 1, 'Baguihati Jodamandir middle', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"7\"]', '', '', 2, 480.00, '2026-03-20 17:42:05', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 17:42:05', '2026-03-28 09:18:25'),
(79, '', '', 4, 1, 'Sanjukta Mishra', '', '', '8240871464', '', 1, '0000-00-00', 1, 'Newtown Action area 1cc Block', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"1\"]', '', '', 0, 0.00, '2026-03-20 17:44:59', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 17:44:59', '2026-03-28 09:18:25'),
(80, '', '', 4, 1, 'Nikhil ', '', '', '8981089677', '', 1, '0000-00-00', 1, 'Rajarhat Thana', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-03-20 17:48:40', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 17:48:40', '2026-03-28 09:18:25'),
(81, '', '', 4, 1, 'Manshi ', '', '', '7890618831', '', 1, '0000-00-00', 1, 'Chinarpark', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"3\"]', '', '', 1, 0.00, '2026-03-20 17:50:18', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 17:50:18', '2026-03-28 09:18:25'),
(82, '', '', 4, 1, 'Akansha Mittal', '', '', '9836099688', '', 1, '0000-00-00', 1, 'Teghoria Enclave', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-03-20 17:53:41', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 17:53:41', '2026-03-28 09:18:25'),
(83, '', '', 4, 1, 'Pradip Panda', '', '', '8017911149', '', 1, '0000-00-00', 1, 'Nabano', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 2, 450.00, '2026-03-20 17:56:01', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 17:56:01', '2026-03-28 09:18:25'),
(84, '', '', 4, 1, 'Pinky Sukhla', '', '', '9831141407', '', 1, '0000-00-00', 1, 'Dharmtala', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"2\"]', '', '', 2, 370.00, '2026-03-20 17:59:30', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 17:59:30', '2026-03-28 09:18:25'),
(85, '', '', 4, 1, 'Kamal Jajoo', '', '', '7003618901', '', 1, '0000-00-00', 1, 'VIVEK Bihar Howrah', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"2\"]', '', '', 0, 0.00, '2026-03-20 18:02:16', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 18:02:16', '2026-03-28 09:18:25'),
(86, '', '', 4, 1, 'R.J ', '', '', '9903220507', '', 1, '0000-00-00', 1, 'NAGERBAZAR', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"2\"]', '', '', 0, 480.00, '2026-03-20 18:05:02', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 18:05:02', '2026-03-28 09:18:25'),
(87, '', '', 4, 1, 'Sangita Singh', '', '', '7439090834', '', 1, '0000-00-00', 1, 'Rajarhat ', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"3\"]', '', '', 1, 18000.00, '2026-03-20 18:08:25', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 18:08:25', '2026-03-28 09:18:25'),
(88, '', '', 4, 1, 'Kanta Dalmia', '', '', '9831137631', '', 1, '0000-00-00', 1, 'Tollygunge', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"4\"]', '', '', 2, 480.00, '2026-03-20 18:11:19', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 18:11:19', '2026-03-28 09:18:25'),
(89, '', '', 4, 1, 'Ashapurna Roy', '', '', '8820908211', '', 1, '0000-00-00', 1, 'Behala Menton', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"3\"]', '', '', 0, 20000.00, '2026-03-20 18:16:19', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 18:16:19', '2026-03-28 09:18:25'),
(90, '', '', 4, 1, 'Pulkit Chawla', '', '', '9836062590', '', 1, '0000-00-00', 1, 'Hazra', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"3\"]', '', '', 1, 18000.00, '2026-03-20 18:17:34', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-20 18:17:34', '2026-03-28 09:18:25'),
(91, '', '', 4, 1, 'Reshma Santani', '', '', '9831156464', '', 1, '0000-00-00', 1, 'Ballygunge', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"2\"]', '', '', 1, 18000.00, '2026-03-24 15:36:50', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-24 15:36:50', '2026-03-28 09:18:25'),
(92, '', '', 4, 1, 'Rajeev Bhandari', '', '', '9831724247', '', 1, '0000-00-00', 1, 'Chetla', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"2\",\"1\"]', '', '', 0, 16000.00, '2026-03-24 15:39:30', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-24 15:39:30', '2026-03-28 09:18:25'),
(93, '', '', 4, 1, 'Anjali Srivastava', '', '', '9073900707', '', 1, '0000-00-00', 1, 'Nagerbazar', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"3\"]', '', '', 1, 0.00, '2026-03-24 15:43:47', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-24 15:43:47', '2026-03-28 09:18:25'),
(94, '', '', 4, 1, 'Arunhati Biswas', '', '', '9836267933', '', 1, '0000-00-00', 1, 'Beleghata', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"3\"]', '', '', 0, 18000.00, '2026-03-24 15:48:16', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-24 15:48:16', '2026-03-28 09:18:25'),
(95, '', '', 4, 1, 'Nidhi Gupta', '', '', '8299058545', '', 1, '0000-00-00', 1, 'Rajarhat', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"2\"]', '', '', 0, 0.00, '2026-03-24 15:50:27', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-24 15:50:27', '2026-03-28 09:18:25'),
(96, '', '', 4, 1, 'Pampa Ray', '', '', '9831518588', '', 1, '0000-00-00', 1, 'Rajarhat', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"2\"]', '', '', 0, 18.00, '2026-03-24 15:52:28', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-24 15:52:28', '2026-03-28 09:18:25'),
(97, '', '', 4, 1, 'Pusmita Dey', '', '', '7044455367', '', 1, '0000-00-00', 1, 'Science city', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"2\"]', '', '', 0, 18000.00, '2026-03-24 15:56:38', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-24 15:56:38', '2026-03-28 09:18:25'),
(98, '', '', 4, 1, 'Sarika Agarwal', '', '', '9886213002', '', 1, '0000-00-00', 1, 'Howrah Shibpur', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-03-24 16:01:54', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-24 16:01:54', '2026-03-28 09:18:25'),
(99, '', '', 4, 1, 'Sarika Agarwal', '', '', '', '', 1, '0000-00-00', 1, 'Howrah Shibpur', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"4\"]', '', '', 0, 450.00, '2026-03-24 16:03:05', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-24 16:03:05', '2026-03-28 09:18:25'),
(100, '', '', 4, 1, 'Dipraj Das', '', '', '9051846478', '', 1, '0000-00-00', 1, 'Newtown Mahesh Bagan Sec 5', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"2\"]', '', '', 0, 18.00, '2026-03-24 16:04:36', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-24 16:04:36', '2026-03-28 09:18:25'),
(101, '', '', 4, 1, 'A. Singh', '', '', '8390906160', '', 1, '0000-00-00', 1, 'New Town Kalipark', '', 595, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"7\",\"2\"]', '', '', 0, 0.00, '2026-03-24 16:07:53', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-24 16:07:53', '2026-04-18 09:11:15'),
(102, '', '', 4, 1, 'Payel Pansari', '', '', '9883425721', '', 1, '0000-00-00', 1, 'Ultadanga Lake Town', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"3\"]', '', '', 0, 18.00, '2026-03-24 16:10:37', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-24 16:10:37', '2026-03-28 09:18:25'),
(103, '', '', 4, 1, 'Pradyumna Mukherjee', '', '', '8860034440', '', 1, '0000-00-00', 1, 'Mukundopur', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"3\"]', '', '', 0, 17.00, '2026-03-24 16:12:35', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-24 16:12:35', '2026-03-28 09:18:25'),
(104, '', '', 4, 1, 'Shreya Satwika', '', '', '9874564337', '', 1, '0000-00-00', 1, 'Alipore', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-03-24 16:14:17', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-24 16:14:17', '2026-03-28 09:18:25'),
(105, '', '', 4, 1, 'Sonu Sah', '', '', '6201029318', '', 1, '0000-00-00', 0, 'Salkia AC Market Arvind Mall', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-03-24 16:22:29', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-24 16:22:29', '2026-03-28 09:18:25'),
(106, '', '', 4, 1, 'Prajna Srivastava', '', '', '9450568873', '', 1, '0000-00-00', 1, 'Santragachi', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 1, 0.00, '2026-03-24 16:24:18', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-24 16:24:18', '2026-03-28 09:18:25'),
(107, '', '', 4, 1, 'Nirmala Jain', '', '', '9830822211', '', 1, '0000-00-00', 1, 'Park  Circus Begbagan', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"2\"]', '', '', 0, 500.00, '2026-03-24 16:26:16', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-24 16:26:16', '2026-03-28 09:18:25'),
(108, '', '', 4, 1, 'Jhilik Bhattacharjee', '', '', '7978053946', '', 1, '0000-00-00', 0, 'Chetla Petrol Pump', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"7\"]', '', '', 1, 18.00, '2026-03-24 16:28:45', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-24 16:28:45', '2026-03-28 09:18:25'),
(109, '', '', 4, 1, 'Amit Agarwal ', '', '', '9804634774', '', 1, '0000-00-00', 1, 'Ultadanga', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"3\"]', '', '', 0, 18.00, '2026-03-24 16:33:22', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-24 16:33:22', '2026-03-28 09:18:25'),
(110, '', '', 4, 1, 'Neha Dhona', '', '', '9883186336', '', 1, '0000-00-00', 1, 'Kajurgachui', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"3\"]', '', '', 1, 0.00, '2026-03-24 16:35:03', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-24 16:35:03', '2026-03-28 09:18:25'),
(111, '', '', 4, 1, 'Akash Tiwari', '', '', '9830118309', '', 1, '0000-00-00', 1, 'Uniworld', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"3\"]', '', '', 0, 18.00, '2026-03-24 16:39:58', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-24 16:39:58', '2026-03-28 09:18:25'),
(112, '', '', 4, 1, 'Vala Ravali', '', '', '9100946658', '', 0, '0000-00-00', 0, 'Kokapet', '', 0, 0, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"3\"]', '', '', 0, 0.00, '2026-03-24 16:50:01', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-24 16:50:01', '2026-03-30 12:10:24'),
(113, '', '', 4, 1, 'Mousumi Das Gupta', '', '', '9831177221', '', 1, '0000-00-00', 0, 'Bagalore Canning Home', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"3\"]', '', '', 1, 28.00, '2026-03-24 16:59:05', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-24 16:59:05', '2026-03-28 09:18:25'),
(114, '', '', 4, 1, 'Alka Kutiala', '', '', '9816250027', '', 1, '0000-00-00', 1, 'Chandigarh', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"2\"]', '', '', 1, 28.00, '2026-03-24 17:02:41', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-24 17:02:41', '2026-03-28 09:18:25'),
(115, '', '', 4, 1, 'Joysree Mojumdar', '', '', '9147065919', '', 1, '0000-00-00', 1, 'Agartala Tripura', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"5\"]', '', '', 0, 23.00, '2026-03-24 17:05:33', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-24 17:05:33', '2026-03-28 09:18:25'),
(116, '', '', 4, 1, 'Saloni Mondal', '', '', '', '', 1, '0000-00-00', 1, '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-03-24 17:07:14', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 0, '2026-03-24 17:07:14', '2026-03-28 09:18:25'),
(117, '', '', 5, 1, 'Ashalata Mandal', 'Pradip Mandal', '', '8167784104', '', 2, '1979-02-12', 2, 'Purba Senpara Jalpaiguri Jalpaiguri West Bengal', '', 593, 24, 105, '735101', '9922 2606 36', '1774355835.jpeg', '1774355842.jpeg', '', '', '', '', '', '1774355848.jpeg', '', '', 0, '', '', '[\"3\"]', '', '', 1, 18000.00, '2026-03-24 17:44:17', 0, 2, 1, 2, '', '', '', '', '', '', 0, 0, 2, '', '', '', '', '', 1, 1, '2026-03-24 17:44:17', '2026-04-18 09:36:25'),
(118, '', '', 5, 1, 'Punam Chowdhury', 'Narayan Chowdhury', '', '6291407595', '', 2, '1994-02-15', 2, 'No227, H K Bhattar Road Halisahar Barrackpur Hazinagar', '', 602, 24, 105, '743135', '5538 2979 90', '1774356397.jpeg', '1774356404.jpeg', '', '', '', '', '', '1774356410.jpeg', '', '', 0, '', '', '[\"3\"]', '[\"1\",\"3\"]', '', 0, 18000.00, '2026-03-24 18:09:41', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-24 18:09:41', '2026-03-28 09:18:25'),
(119, '', '', 5, 1, 'Tusi Das', 'Sudip Das', '', '7890753803', '6291231601', 2, '1980-05-15', 2, '56/2/A/2, Satkari Chatterjee Lane Haora Corporation PO Haora', '', 592, 24, 105, '711101', '913505971312', '1774357080.jpeg', '1774357085.jpeg', '', '', '', '', '', '1774357090.jpeg', '', '', 9, '', '', '[\"2\",\"7\",\"1\"]', '[\"1\"]', '', 1, 13000.00, '2026-03-24 18:19:02', 0, 2, 1, 0, '', '', '', '', '', '', 1, 0, 5, 'HINDU', 'INDIAN', '', '', '', 1, 1, '2026-03-24 18:19:02', '2026-03-31 11:47:35'),
(120, '', '', 4, 1, '', '', '', '', '', 1, '0000-00-00', 1, '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-03-24 18:48:04', 0, 0, 0, 0, '', '', '', '', '', '', 0, 2, 0, '', '', '', '', '', 1, 1, '2026-03-24 18:48:04', '2026-03-28 09:18:25'),
(121, '', '', 5, 1, 'Sangita Pramanick', 'Samir Pramanick', '', '8509658462', '', 2, '1994-09-11', 2, 'Belani Howrah West Bengal ', '', 592, 24, 105, '711315', '5370 5419 18', '1774418465.jpeg', '', '', '', '', '', '', '1774418472.jpeg', '', '', 6, '', '', '', '', '', 0, 0.00, '2026-03-25 11:00:26', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-25 11:00:26', '2026-03-28 09:18:25'),
(122, '', '', 5, 1, 'Khukumoni Seal', 'Subhas Shil', '', '9330596779', '', 2, '1980-04-11', 2, 'Shyamaprasad Polly Panihati North 24 Pgs West Bengal', '', 600, 24, 105, '700111', '8570 3106 65', '1774421839.jpeg', '', '', '', '', '', '', '1774421846.jpeg', '', '', 2, '', '', '[\"2\"]', '[\"1\",\"3\"]', '', 2, 0.00, '2026-03-25 12:21:14', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-25 12:21:14', '2026-03-28 09:18:25'),
(123, '', '', 5, 1, 'Khusbu Kumari', 'Shyam Das', '', '', '', 1, '2004-02-15', 2, '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-03-25 12:31:27', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-25 12:31:27', '2026-03-28 09:18:25'),
(124, '', '', 5, 1, 'Sampa Das', 'Manik Das', '', '8436522239', '', 2, '1989-01-01', 2, 'Khadinan Haora West Bengal  ', '', 592, 24, 105, '711303', '8094 3470 00', '1774423640.jpeg', '1774423646.jpeg', '', '', '', '', '', '1774423651.jpeg', '', '', 3, '', '', '[\"7\"]', '[\"1\",\"3\"]', '', 1, 0.00, '2026-03-25 12:51:43', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-25 12:51:43', '2026-03-28 09:18:25'),
(125, '', '', 5, 1, 'Priyanka Rajak ', 'Sanjit Rajak', '', '7439903731', '', 1, '1994-11-13', 2, 'Naihati West Bengal Gorifa North Twenty four Parganas West Bengal', '', 600, 24, 105, '743166', '4459 5100 86', '1774602313.jpeg', '1774602314.jpeg', 'BXMPR3571B', '1774602353.jpeg', '', '', '', '1774613810.jpeg', '', '', 4, '', '', '[\"3\"]', '[\"1\",\"2\",\"3\"]', '', 0, 0.00, '2026-03-25 12:59:54', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-25 12:59:54', '2026-03-28 09:18:25'),
(126, '', '', 4, 1, 'Madhumita Ghosh', '', '', '9147092718', '', 0, '0000-00-00', 1, 'Uni World City', '', 595, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"7\",\"1\"]', '', '', 0, 16500.00, '2026-03-25 16:30:06', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-25 16:30:06', '2026-03-28 09:18:25'),
(127, '', '', 5, 1, 'Sujata patra', 'Surajit Patra', '', '9748295517', '7439838233', 4, '1994-01-01', 2, 'Kamardanga,Sitalatala,Kamardanga bus stop,Howrah', 'Same', 0, 24, 105, '711104', '5574 6643 20', '1774438552.jpeg', '1774438564.jpeg', '', '', '', '', '', '1774438578.jpeg', '', '', 5, '', '', '[\"7\",\"3\",\"2\",\"1\",\"5\",\"6\"]', '[\"1\",\"3\"]', '', 3, 0.00, '2026-03-25 16:37:54', 0, 2, 1, 2, '', '', '', '', '', '8th Passed', 0, 0, 5, 'HINDU', 'INDIAN', 'Mother, Daughter', '', '', 1, 1, '2026-03-25 16:37:54', '2026-04-01 16:41:19'),
(128, '', '', 5, 1, 'Chhabi Goldar', 'Gopal Goldar', '', '9002134529', '', 2, '1975-10-15', 2, '4/5 Sinematala bilen guskara,Aligram bardhaman,West Bengal ', '', 588, 24, 105, '713128', '5242 3059 19', '1774439798.jpeg', '1774439807.jpeg', '', '', '', '1774439844.jpeg', '1774439833.jpeg', '1774439851.jpeg', '', '', 7, '', '', '[\"1\",\"6\"]', '[\"1\",\"3\"]', '', 1, 0.00, '2026-03-25 17:14:52', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-25 17:14:52', '2026-03-28 09:18:25'),
(131, '', '', 5, 1, 'RINKU DUTTA', 'PRASANTA DUTTA', '', '9233117258', '8250038785', 2, '1975-01-01', 2, 'N0019/A, MANKAR MALLICK PARA , NEAR KABIRAJ BARI', 'N0019/A, MANKAR MALLICK PARA , NEAR KABIRAJ BARI', 588, 24, 105, '713144', '704614159706', '1774528161.jpeg', '1774528166.jpeg', '', '', 'GST2303824', '1774527291.jpeg', '1774527298.jpeg', '1774527059.jpeg', '', '', 10, '', '', '[\"3\",\"2\",\"1\",\"5\",\"6\",\"4\"]', '[\"1\"]', '', 0, 13000.00, '2026-03-26 17:34:41', 0, 0, 0, 0, '', '', '', '', '', '8TH PASS', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-26 17:34:41', '2026-03-28 09:18:25'),
(132, '', '', 5, 1, 'KIRAN PASI', 'BABULAL PASI', '', '', '', 1, '1999-03-25', 2, '5/2/H/5, PRAN NATH CHOWDHURY LANE, KOLKATA MUNICIPAL CORPORATION', '5/2/H/5, PRAN NATH CHOWDHURY LANE, KOLKATA MUNICIPAL CORPORATION', 595, 24, 105, '700002', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-03-26 18:00:53', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-26 18:00:53', '2026-03-28 09:18:25'),
(134, '', '', 5, 1, 'Madhuri dash', 'Bimal Dash', '', '6294284326', '', 2, '1971-02-20', 2, 'Kunarda Paschim Medinipur Kunarda West Bengal', '', 597, 24, 105, '721457', '6066 5693 84', '1774530105.jpeg', '', '', '', '', '', '', '1774530113.jpeg', '', '', 10, '', '', '[\"7\",\"2\",\"1\"]', '[\"1\",\"3\"]', '', 1, 0.00, '2026-03-26 18:23:10', 0, 2, 1, 2, '', '', '', '', '', '', 1, 0, 0, '', '', '', '', '', 1, 1, '2026-03-26 18:23:10', '2026-03-28 09:18:25'),
(135, '', '', 5, 1, 'Minati Bera ', 'Tapan Bera ', '', '9679843770', '', 2, '1986-08-25', 2, 'Bera Bhavan Bagnan 2 Mellock Howrah West Bengal', '', 592, 24, 105, '711303', '2550 9983 61', '1774530713.jpeg', '', '', '', '', '1774530725.jpeg', '', '1774530732.jpeg', '', '', 8, '', '', '[\"7\",\"2\"]', '[\"1\"]', '', 2, 0.00, '2026-03-26 18:37:20', 0, 2, 1, 2, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-26 18:37:20', '2026-03-28 09:18:25'),
(136, '', '', 5, 1, 'Sumit Ghosh', 'Utpal Ghosh', '', '9339775697', '', 2, '1998-01-01', 1, 'Jemo Raghunathpur Kandi ,Jemo Rajbati Murshidabad', '', 598, 24, 105, '742140', '3681 6336 63', '1774531245.jpeg', '1774531253.jpeg', '', '', '', '', '', '1774531258.jpeg', '', '', 4, '', '', '[\"7\",\"2\"]', '[\"1\",\"3\"]', '', 1, 0.00, '2026-03-26 18:45:16', 0, 2, 1, 2, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-26 18:45:16', '2026-03-28 09:18:25'),
(137, '', '', 5, 1, 'Pinki Paul ', 'Madhab Paul', '', '9330837824', '', 2, '1994-01-01', 2, '12 Gobinda Khatick Road Gobinda Khatick Road Circus Avenue West Bengal', '', 601, 24, 105, '700046', '3920 3156 76', '1774531722.jpeg', '1774531731.jpeg', '', '', '', '', '', '1774531735.jpeg', '', '', 6, '', '', '[\"1\"]', '[\"1\",\"3\"]', '', 2, 0.00, '2026-03-26 18:53:07', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-26 18:53:07', '2026-03-28 09:18:25'),
(138, '', '', 5, 1, 'Rajkumar Mondal', 'Ramprasad Mondal', '', '7601874965', '', 1, '1983-03-25', 1, 'Haradham Rabanbon Poschim Sambhu Pur Anulia Ranaghat', '', 0, 24, 105, '741255', '7189 5556 63', '1774600712.jpeg', '', '', '', '', '', '', '1774600723.jpeg', '', '', 10, '', '', '[\"1\"]', '[\"1\",\"3\"]', '', 1, 0.00, '2026-03-27 13:31:09', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-27 13:31:09', '2026-03-28 09:18:25'),
(140, '', '', 5, 1, 'Kanchan Kumari', 'Shyam Das', '', '9330361647', '', 1, '2005-06-12', 2, '5/6 foreshore road,Howrah (M.Crop) Howrah,West Bengal', '', 0, 24, 105, '711103', '6416 7041 25', '1774603160.jpeg', '1774603170.jpeg', '', '', '', '', '', '1774603186.jpeg', '', '', 3, '', '', '[\"7\",\"1\"]', '[\"1\",\"3\"]', '', 2, 0.00, '2026-04-15 00:00:00', 0, 0, 0, 0, '', '', '', '', '', '', 1, 0, 0, '', '', '', '', '', 1, 1, '2026-03-27 14:19:54', '2026-03-28 09:18:25'),
(142, '', '', 5, 1, 'Baishakhi Das', 'Chanchal  Das', '', '8918729794', '', 2, '1996-07-25', 2, 'Dhanapara, Kaldanga Guskara Bardhaman West Bengal ', '', 588, 24, 105, '713128', '8468 1538 36', '1774603299.jpeg', '1774603330.jpeg', '', '', '', '1774603341.jpeg', '1774603564.jpeg', '1774603570.jpeg', '', '', 5, '', '', '[\"3\"]', '[\"1\"]', '', 1, 0.00, '2026-03-27 14:41:00', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-27 14:41:00', '2026-03-28 09:18:25'),
(143, '', '', 5, 1, 'Srabani Das', 'madhab das', '', '7585014838', '', 2, '1999-10-15', 2, 'Bharila Dakshin Dinajpur Bhania West Bengal ', '', 590, 24, 105, '733102', '9670 0897 57', '1774604058.jpeg', '1774604068.jpeg', '', '1774604105.jpeg', '', '', '', '1774604089.jpeg', '', '', 4, '', '', '[\"7\"]', '[\"1\"]', '', 1, 0.00, '2026-03-27 14:56:57', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-27 14:56:57', '2026-03-28 09:18:25'),
(144, '', '', 5, 1, 'Chhabi Santra', 'Gakul Santra', '', '8017167710', '', 2, '0000-00-00', 1, 'Chengail Karunapara Howrah West Bengal', '', 592, 24, 105, '711308', '881142745974', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-03-27 15:16:30', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-27 15:16:30', '2026-03-28 11:59:42'),
(145, '', '', 5, 1, 'Anjana Dutta', 'Sadhan Dutta', '', '9734319460', '', 3, '1976-09-23', 2, 'Thuba Mission Para Taki Thuba Taki North 24parganas West Bengal', '', 600, 24, 105, '743429', '6950 5528 55', '1774606037.jpeg', '1774606047.jpeg', '', '', '', '', '', '1774606054.jpeg', '', '', 8, '', '', '[\"7\",\"2\",\"5\"]', '[\"1\",\"3\"]', '', 1, 0.00, '2026-03-27 15:24:12', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-27 15:24:12', '2026-03-28 09:18:25'),
(146, '', '', 5, 1, 'Mahima Chowdhury ', 'Binod Chowdhury', '', '9073107041', '', 1, '2004-12-01', 2, '150 Rajkumar Mukherjee Road Baranagar Alam Bazar West Bengal', '', 592, 24, 105, '700035', '4313 7840 50', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-03-27 15:40:33', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-27 15:40:33', '2026-03-28 09:18:25'),
(147, '', '', 5, 1, 'Shelli Das', 'Bimal Adhikari', '', '8910071827', '', 2, '1984-01-01', 2, 'Satinandi  Barddhaman       ', '', 588, 24, 105, '713141', '2958 9276 28', '1774608277.jpeg', '1774608283.jpeg', '', '', '', '', '', '1774608286.jpeg', '', '', 3, '', '', '[\"7\",\"3\",\"2\",\"1\"]', '[\"1\",\"3\"]', '', 1, 0.00, '2026-03-27 15:49:36', 0, 2, 2, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-27 15:49:36', '2026-03-28 09:18:25'),
(148, '', '', 5, 1, 'Rupa Behera ', 'Bharat Kumar Behera', '', '9912601580', '', 2, '0000-00-00', 2, '1-116/A Hitex Road Near Tata Docomo Office Madhapur Hyderabad', '', 0, 0, 105, '500081', '3510 3768 24', '1774609380.jpeg', '1774609384.jpeg', '', '', '', '', '', '1774609390.jpeg', '', '', 4, '', '', '[\"3\"]', '[\"3\"]', '', 0, 0.00, '2026-03-27 16:19:49', 0, 2, 1, 2, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-27 16:19:49', '2026-03-28 09:18:25'),
(149, '', '', 5, 1, 'Pintu Pradhan', 'Nishith Pradhan', '', '9875410501', '', 2, '1991-07-01', 1, 'Santra Para Radhanagar Howrah West Bengal 711310', '', 592, 24, 105, '711310', '4115 8193 43', '1774611295.jpeg', '1774611302.jpeg', '', '', 'AZQ1357706', '1774611314.jpeg', '1774611319.jpeg', '1774611322.jpeg', '', '', 3, '', '', '[\"2\"]', '[\"1\",\"3\"]', '', 1, 0.00, '2026-03-27 16:57:42', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-27 16:57:42', '2026-03-28 09:18:25'),
(150, '', '', 5, 1, 'Aparna Samanta', 'Bimal Adak', '', '8910535186', '', 2, '1986-05-07', 2, 'Kapasaharia Janapara Patrapara (Paschim) Kapasharia Hooghly', '', 591, 24, 105, '712306', '', '', '', '', '', 'UYB1692680', '1774611891.jpeg', '1774611898.jpeg', '1774611901.jpeg', '[\"1\"]', '', 6, '', '', '[\"1\"]', '[\"1\"]', '', 1, 0.00, '2026-03-27 17:07:46', 0, 0, 0, 0, '', '', '', '', '', '9th PASSED', 0, 0, 5, 'HINDU', 'INDIAN', 'Husband', '', '', 1, 0, '2026-03-27 17:07:46', '2026-04-13 16:41:12'),
(151, '', '', 5, 1, 'Rajanti Munda', 'Behana Oraon', '', '8170971249', '', 2, '1996-03-10', 2, 'Matigara Darjeeling West Bengal ', '', 589, 24, 105, '734010', '924958935291', '1774612748.jpeg', '1774612754.jpeg', 'ERYPM3767D', '1774612767.jpeg', '', '', '', '1774612771.jpeg', '', '', 5, '', '', '[\"3\"]', '[\"3\"]', '', 0, 0.00, '2026-03-27 17:19:21', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-27 17:19:21', '2026-03-28 09:18:25'),
(152, '', '', 5, 1, 'Mamoni Dhali', 'Gopal Dhali', '', '8927032679', '', 2, '1984-01-01', 2, 'Balgana Station para balgana Tulshidanga Barddhaman West Bengal', '', 592, 24, 105, '711413', '472057525094', '1774613662.jpeg', '', '', '', '', '1774613603.jpeg', '1774613651.jpeg', '1774613656.jpeg', '', '', 0, '', '', '[\"3\"]', '[\"1\"]', '', 0, 0.00, '2026-03-27 17:31:42', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-27 17:31:42', '2026-03-28 09:18:25'),
(153, '', '', 5, 1, 'Menka Jha ', 'Chotu Kumar Jha', '', '9433282149', '', 1, '1997-03-02', 2, 'New Colony Radhanagar Howrah', '', 592, 24, 105, '711310', '678930698897', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-03-27 17:48:57', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-27 17:48:57', '2026-03-28 09:18:25'),
(154, '', '', 5, 1, 'Bijan Sarkar', 'Biren Sarkar', '', '9134885094', '', 2, '1976-12-29', 2, 'Raipur Domkal Murshidabad West Bengal', '', 598, 24, 105, '742303', '975080003934', '1774615586.jpeg', '1774615591.jpeg', '', '', '', '', '', '1774615595.jpeg', '', '', 10, '', '', '[\"5\",\"6\",\"4\"]', '[\"1\",\"3\"]', '', 0, 0.00, '2026-03-27 18:11:15', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-27 18:11:15', '2026-03-28 09:18:25');
INSERT INTO `user_details` (`user_id`, `username`, `password`, `user_type`, `added_by`, `full_name`, `fat_hus_name`, `email_id`, `phone_number`, `alt_phone_number`, `m_id`, `date_of_birth`, `gender`, `address`, `curr_address`, `city_id`, `state_id`, `country_id`, `pincode`, `adhar_card`, `adhar_card_img`, `adhar_card_back_img`, `pan_card`, `pan_card_img`, `voter_id_card`, `voter_id_card_img`, `voter_id_card_back_img`, `user_photo`, `wt_id`, `work_type_others`, `work_exp`, `earlier_work_city`, `last_emplr_name`, `sk_id`, `l_id`, `work_loc`, `st_id`, `exp_salary`, `available_from`, `wf_id`, `il_id`, `pv_id`, `ch_id`, `emg_cont_person`, `relation`, `emg_cont_number`, `bank_details`, `bank_details_img`, `highest_edu`, `declaration`, `lc_id`, `wh_id`, `religion`, `nationality`, `family_bg_info`, `nr_id`, `misce_doc`, `inserted_by`, `updated_by`, `insert_date`, `update_date`) VALUES
(155, '', '', 5, 1, 'Sima Shaw', 'Mantu Shaw', '', '7980796260', '8276890588', 2, '1988-10-11', 2, 'Nazirganj Thana Makua Satyen Bose Road Near Nepali Para Shiv Mandir ', '', 592, 24, 105, '711109', '431888206591', '1774615995.jpeg', '1774615998.jpeg', '', '', '', '', '', '1774616002.jpeg', '', '', 8, '', '', '[\"7\"]', '[\"1\",\"3\"]', '', 2, 0.00, '2026-03-27 18:18:28', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-27 18:18:28', '2026-03-28 09:18:25'),
(156, '', '', 5, 1, 'Bajantri Kamala', 'Gopal Bajantri', '', '9985607067', '', 2, '1971-06-02', 2, '6-3-956 Somajiguda Kapadia Lane Khairtabad Hyderabad', '', 0, 0, 105, '', '589939353515', '1774616520.jpeg', '1774616531.jpeg', '', '', '', '', '', '', '', '', 5, '', '', '[\"3\"]', '[\"3\"]', '', 0, 0.00, '2026-03-27 18:25:10', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-27 18:25:10', '2026-03-28 09:18:25'),
(157, '', '', 5, 1, 'Alisha Baniya', 'Kiran Bahadur', '', '7019348531', '', 2, '2002-02-20', 2, 'No.35 Viva Corner DLF , Akshaya Nagar Township Road Bangalore ', 'n', 224, 9, 105, '560068', '', '1774617149.jpeg', '1774617153.jpeg', 'GLUPB8929J', '1774617169.jpeg', '', '', '', '1774617173.jpeg', '', '', 5, '', '', '[\"3\"]', '[\"1\",\"3\"]', '', 1, 0.00, '2026-03-27 18:34:18', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-27 18:34:18', '2026-03-28 09:18:25'),
(158, '', '', 5, 1, 'Tamesha Bibi ', 'Manju Sekh', '', '8250646778', '', 2, '1990-04-18', 2, 'Jamai Para Katwa Bardhaman West Bengal ', '', 588, 24, 105, '713130', '889078881301', '1774617637.jpeg', '1774617642.jpeg', '', '', '', '', '', '1774617646.jpeg', '', '', 6, '', '', '[\"3\"]', '[\"1\",\"3\"]', '', 2, 0.00, '2026-03-27 18:44:51', 0, 0, 0, 0, '', '', '', '', '', '5 passed', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-27 18:44:51', '2026-03-28 09:18:25'),
(160, '', '', 5, 1, 'Rinki Thekere', 'Deepak Thekere', '', '9836450230', '', 1, '1990-01-01', 2, 'Room no.2 Kharooaai Building B Wing Ground floor wada road', '', 0, 0, 105, '421302', '212105930302', '1774618148.jpeg', '', '', '', '', '', '', '1774618153.jpeg', '', '', 6, '', '', '[\"3\"]', '[\"1\",\"3\"]', '', 0, 0.00, '2026-03-27 18:54:19', 0, 0, 0, 0, '', '', '', '', '', '8th passed', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-27 18:54:19', '2026-03-28 12:00:52'),
(161, '', '', 5, 1, 'Tapati Biswas', 'Tapan Biswas', '', '9242193769', '7001485988', 2, '2005-07-07', 2, 'Toherpur Natunpara Birnagar Nadia', '', 599, 24, 105, '741127', '343444586909', '1774678949.jpeg', '1774678953.jpeg', '', '', '', '', '', '1774678958.jpeg', '[\"3\"]', '', 3, '', '', '[\"3\"]', '[\"1\",\"3\"]', '', 1, 0.00, '2026-03-27 19:00:59', 0, 2, 1, 2, '', '', '', '', '', '10th Passed', 0, 0, 5, 'HINDU', 'INDIAN', 'Mother,Grand Mother, Daughter', '', '', 1, 1, '2026-03-27 19:00:59', '2026-04-01 16:30:34'),
(162, '', '', 5, 1, 'Sabita Biswas', 'Dev Rajan Biswas', '', '9339804546', '', 2, '1983-01-01', 2, 'Nabarupdaha Ghugrahaghachi Bayandeng Nadia West Bengal ', '', 599, 24, 105, '', '847725622489', '1774679783.jpeg', '1774679787.jpeg', '', '', '', '', '', '1774679792.jpeg', '', '', 8, '', '', '[\"7\",\"4\"]', '[\"1\",\"3\"]', '', 1, 0.00, '2026-03-28 12:02:16', 0, 0, 0, 0, '', '', '', '', '', '9th passed', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-28 12:02:16', '2026-03-30 08:39:37'),
(163, '', '', 5, 1, 'Anjana Ray', 'Atul Biswas ', '', '6296478594', '', 2, '1981-01-01', 2, 'Charmandal Charmandal Bhag Naldugri North 24pgs West Bengal', '', 600, 24, 105, '743297', '225083841254', '1774680319.jpeg', '1774680332.jpeg', '', '', '', '', '', '1774680333.jpeg', '', '', 6, '', '', '[\"2\",\"1\"]', '', '', 1, 0.00, '2026-03-28 12:11:21', 0, 0, 0, 0, '', '', '', '', '', '8TH PASSED', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-28 12:11:21', '2026-03-30 08:39:37'),
(164, '', '', 5, 1, 'Rubi Chowdhury ', 'Rajkumar Chowdhury ', '', '8100408960', '', 2, '1972-01-01', 2, 'Chengail Ayama Para Chengail Howrah  West Bengal', '', 592, 24, 105, '711308', '233092441230', '1774681622.jpeg', '1774681638.jpeg', '', '', '', '', '', '1774681526.jpeg', '', '', 10, '', '', '[\"3\"]', '[\"1\",\"3\"]', '', 2, 0.00, '2026-03-28 12:18:59', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-28 12:18:59', '2026-03-30 08:39:37'),
(165, '', '', 5, 1, 'Arpita Haldar', 'Biswanath Haldar', '', '9875488319', '', 2, '1985-07-18', 2, '67/8 Dharmatala Road Salkia Hoara Howrah West Bengal', '', 592, 24, 105, '711106', '273105760312', '1774682601.jpeg', '1774682605.jpeg', '', '', '', '', '1774682615.jpeg', '1774682620.jpeg', '[\"1\"]', '', 4, '', '', '[\"1\"]', '[\"1\",\"3\"]', '', 2, 0.00, '2026-03-28 12:47:41', 0, 0, 0, 0, '', '', '', '', '', '6TH PASSED', 0, 0, 3, 'HINDU', 'INDIAN', 'Husband, 2 Son', '', '', 1, 1, '2026-03-28 12:47:41', '2026-04-12 17:21:20'),
(166, '', '', 5, 1, 'Kakali Bag', '', '', '', '', 1, '0000-00-00', 1, '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-03-28 13:19:07', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 0, '2026-03-28 13:19:07', '2026-03-28 13:19:07'),
(167, '', '', 5, 1, 'Kakali Bag', 'Nityananda Bag', '', '9043864361', '8942048591', 2, '1992-07-05', 2, 'Panpur Serpur Howrah West Bengal Amta 1', '', 592, 24, 105, '711401', '263466828715', '1774684576.jpeg', '1774684582.jpeg', '', '', '', '', '', '1774684640.jpeg', '', '', 3, '', '', '[\"2\",\"1\"]', '[\"1\"]', '', 0, 0.00, '2026-03-28 13:22:53', 0, 0, 0, 0, '', '', '', '', '', '5th passed', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-28 13:22:53', '2026-03-30 08:39:37'),
(168, '', '', 5, 0, 'Ganesh  K C', 'Khadak Bahadur Khatri', '', '9831974887', '', 2, '1984-09-15', 1, '42/1/H/4 Ekbalpore Lane Near Ghazi club khiddirpore kolkata', '', 0, 24, 105, '', '627681319663', '1774688996.jpeg', '1774689002.jpeg', '', '', '', '', '', '1774689006.jpeg', '', '', 10, '', '', '[\"2\"]', '[\"3\"]', '', 1, 0.00, '2026-03-28 14:34:30', 0, 0, 0, 0, '', '', '', '', '', '4th passed', 0, 0, 0, '', '', '', '', '', 0, 0, '2026-03-28 14:34:30', '2026-03-30 08:39:37'),
(169, '', '', 5, 1, 'ki', '', '', '', '', 1, '0000-00-00', 1, '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-03-28 14:42:59', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 0, '2026-03-28 14:42:59', '2026-03-28 14:42:59'),
(170, '', '', 5, 1, 'Kainatun Nesha', 'Md. Shamim', '', '9330430884', '8100051287', 2, '1987-04-20', 2, '127 Noor Mohammad Munshi Lane Haora Howrah West Bengal', '', 592, 24, 105, '711101', '579700213790', '1774689825.jpeg', '1774689829.jpeg', 'AJWPN7974P', '1774689835.jpeg', '', '', '', '1774689842.jpeg', '', '', 4, '', '', '[\"1\"]', '[\"3\"]', '', 1, 0.00, '2026-03-28 14:43:55', 0, 0, 0, 0, '', '', '', '', '', '10TH PASSED', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-28 14:43:55', '2026-03-30 08:39:37'),
(171, '', '', 5, 1, 'Shaida Bibi', 'Nasim Khan', '', '8274969677', '', 2, '1995-01-01', 2, 'New Panchur Molla Para Rabindranagar Maheshtala Bidhangarh', '', 601, 24, 105, '700066', '668785242783', '1774691009.jpeg', '', '', '', '', '', '', '1774691014.jpeg', '', '', 3, '', '', '[\"2\",\"1\"]', '[\"3\"]', '', 2, 0.00, '2026-03-28 15:06:34', 0, 0, 0, 0, '', '', '', '', '', '10TH PASSED', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-28 15:06:34', '2026-03-30 08:39:37'),
(172, '', '', 5, 1, 'Soumitra Kumar Ghosh', 'Tapan Kumar Ghosh', '', '8670148340', '', 2, '1986-01-14', 2, 'Barbarisha Bara Barisha Purba Medinipur', '', 597, 24, 105, '721134', '304198669194', '1774691784.jpeg', '1774691789.jpeg', 'AZOPG3565D', '1774691805.jpeg', '', '', '', '', '', '', 4, '', '', '[\"1\"]', '[\"1\",\"3\"]', '', 1, 0.00, '2026-03-28 15:19:15', 0, 0, 0, 0, '', '', '', '', '', '12TH PASSED', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-28 15:19:15', '2026-03-30 08:39:37'),
(173, '', '', 5, 1, 'Chayanika Barman', 'Ratul  Barman', '', '9309108468', '', 2, '1979-03-01', 2, 'Japarkuchi Nalbari  Terechia Assam india ', '', 54, 2, 105, '781335', '533186314926', '1774692727.jpeg', '1774692732.jpeg', '', '', '', '', '', '1774692740.jpeg', '', '', 10, '', '', '[\"3\"]', '[\"2\",\"3\"]', '', 1, 0.00, '2026-03-28 15:36:03', 0, 0, 0, 0, '', '', '', '', '', 'graduate', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-28 15:36:03', '2026-03-30 08:39:37'),
(174, '', '', 5, 1, 'Pinki Thapa ', 'Rabi Chandra Das', '', '8420988187', '', 2, '1986-01-01', 2, 'Hat Bauria PS Bauria Howrah West Bengal', '', 592, 24, 105, '711310', '260115071766', '1774693996.jpeg', '', '', '', '', '', '', '1774694001.jpeg', '', '', 8, '', '', '[\"1\"]', '', '', 1, 0.00, '2026-03-28 15:58:01', 0, 0, 0, 0, '', '', '', '', '', '6th passed', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-28 15:58:01', '2026-03-30 08:39:37'),
(175, '', '', 5, 1, 'Soma Mukherjee', 'Ayan Samuy', '', '9832664635', '', 2, '2006-11-24', 2, 'Banerjee Para Raghunathbari Fakhgirganja East Mindapore West Bengal', '', 597, 24, 105, '721634', '487887210889', '1774694633.jpeg', '1774694639.jpeg', '', '', '', '', '', '1774694646.jpeg', '', '', 2, '', '', '[\"1\"]', '', '', 1, 0.00, '2026-03-28 16:09:34', 0, 0, 0, 0, '', '', '', '', '', '9th passed', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-28 16:09:34', '2026-03-30 08:39:37'),
(176, '', '', 5, 1, 'Jharna Byapari', 'Nityananda Byapari', '', '6291641604', '', 2, '1992-04-20', 2, 'Ruiya Ajamtala Patulia Bandipur North 24pgs Titagarh West Bengal', '', 600, 24, 105, '700119', '245852567639', '1774695022.jpeg', '1774695028.jpeg', '', '', '', '', '', '1774695032.jpeg', '', '', 3, '', '', '[\"1\"]', '[\"1\"]', '', 1, 0.00, '2026-03-28 16:15:44', 0, 0, 0, 0, '', '', '', '', '', '10th passed', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-28 16:15:44', '2026-03-30 08:39:37'),
(177, '', '', 5, 1, 'RAHUL MUKHERJEE', 'DEBABRATA MUKHERJEE', '', '8637323096', '', 1, '2001-08-04', 1, 'SHRI CHAITANYA COLONY, NABADWIP, NADIA', 'SHRI CHAITANYA COLONY, NABADWIP, NADIA', 599, 24, 105, '741302', '292954355695', '1774695603.jpeg', '1774695609.jpeg', '', '', '', '', '', '1774695618.jpeg', '[\"2\",\"1\"]', '', 6, '', '', '[\"2\",\"1\"]', '[\"1\",\"3\"]', '', 1, 0.00, '2026-03-28 16:24:27', 0, 2, 1, 2, '', '', '', '', '', '10 TH Passed', 1, 0, 6, 'HINDU', 'INDIAN', 'Mother, Father', '', '', 1, 1, '2026-03-28 16:24:27', '2026-04-13 13:08:40'),
(178, '', '', 5, 1, 'SUNIL KUMAR SINGH', 'SHANTI SINGH', '', '7209516947', '', 2, '1993-01-01', 1, 'DIWAN TOLA, NAWAGARH, BAGHMARA, DUMRA,NORTH NAWAGARH', 'DIWAN TOLA, NAWAGARH, BAGHMARA, DUMRA,NORTH NAWAGARH', 203, 34, 105, '828306', '408353678501', '1774695895.jpeg', '1774695900.jpeg', '', '', '', '', '', '1774695910.jpeg', '', '', 4, '', '', '[\"2\",\"7\",\"1\",\"4\"]', '[\"1\",\"3\"]', '', 1, 0.00, '2026-03-28 16:31:33', 0, 2, 1, 2, '', '', '', '', '', '', 1, 0, 0, '', '', '', '', '', 1, 1, '2026-03-28 16:31:33', '2026-03-30 08:39:37'),
(180, '', '', 5, 1, 'NILAM SHAW', 'RAMCHANDRA SHAW', '', '6289737712', '', 2, '1991-01-01', 2, 'DIWAN TOLA, NAWAGARH, BAGHMARA, DUMRA,NORTH NAWAGARH', 'DIWAN TOLA, NAWAGARH, BAGHMARA, DUMRA,NORTH NAWAGARH', 592, 24, 105, '711106', '826491822779', '1774697561.jpeg', '', '', '', '', '1774697572.jpeg', '1774697576.jpeg', '1774697641.jpeg', '', '', 4, '', '', '[\"2\",\"7\",\"1\",\"3\",\"4\",\"6\"]', '[\"1\",\"3\"]', '', 0, 0.00, '2026-03-28 16:48:04', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-28 16:48:04', '2026-03-30 08:39:37'),
(182, '', '', 5, 1, 'ASHA PATRA', 'RAJU PATRA', '', '9734576162', '9339757362', 2, '1992-01-01', 2, 'HARINARAYANPUR, MUGKALYAN,HOWRAH, WEST BENGAL', 'HARINARAYANPUR, MUGKALYAN,HOWRAH, WEST BENGAL', 592, 24, 105, '711312', '894291243146', '1774698623.jpeg', '', '', '', 'NCL1372234', '1774698630.jpeg', '', '1774698638.jpeg', '[\"2\",\"1\"]', '', 8, '', '', '[\"2\",\"1\"]', '[\"1\",\"2\"]', '', 1, 0.00, '2026-03-28 17:14:53', 0, 0, 0, 0, '', '', '', '', '', '10th passed', 1, 0, 5, 'HINDU', 'INDIAN', 'Husband, Son', '', '', 1, 1, '2026-03-28 17:14:53', '2026-04-17 18:37:56'),
(183, '', '', 5, 1, 'Shaibya Baidya', 'Kalipada Mondal', '', '9831731863', '', 2, '1986-06-19', 2, '1 NO Amberia North 24PGS West Bengal', '', 600, 24, 105, '743435', '386195598402', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-03-28 17:30:11', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-28 17:30:11', '2026-03-28 17:34:00'),
(184, '', '', 4, 1, 'Megha Jhunjhunwala', '', '', '9365887330', '', 1, '0000-00-00', 1, 'Howrah', '', 0, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"4\"]', '', '', 0, 15000.00, '2026-03-28 17:42:55', 0, 0, 0, 0, '', '', '', '', '', '', 1, 0, 0, '', '', '', '', '', 1, 1, '2026-03-28 17:42:55', '2026-03-30 08:39:37'),
(185, '', '', 5, 1, 'Geeta Devi ', 'Ram Krishna Shaw', '', '9256577437', '', 2, '1990-01-01', 2, 'Mehedi Bagan Burdwan Purba Bardhaman West Bengal', '', 588, 24, 105, '713101', '543257763976', '1774700197.jpeg', '1774700203.jpeg', '', '', '', '', '', '1774700207.jpeg', '', '', 5, '', '', '[\"3\"]', '[\"1\",\"3\"]', '', 1, 0.00, '2026-03-28 17:43:20', 0, 0, 0, 0, '', '', '', '', '', '8th passed', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-28 17:43:20', '2026-03-30 08:39:37'),
(186, '', '', 4, 1, 'Priya', '', '', '7003843414', '', 1, '0000-00-00', 1, 'Sodepur', '', 601, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"3\"]', '', '', 0, 18000.00, '2026-03-28 17:44:34', 0, 0, 0, 0, '', '', '', '', '', '', 1, 0, 0, '', '', '', '', '', 1, 1, '2026-03-28 17:44:34', '2026-03-28 17:45:35'),
(187, '', '', 4, 1, 'AARADHYA', '', '', '9007340247', '', 1, '0000-00-00', 1, 'MALLICK FATAK, HOWAH', '', 592, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 8000.00, '2026-03-28 17:45:56', 0, 0, 0, 0, '', '', '', '', '', '', 1, 0, 0, '', '', '', '', '', 1, 1, '2026-03-28 17:45:56', '2026-03-30 08:39:37'),
(188, '', '', 4, 1, 'SOMA GHOSH', '', '', '8007059878', '', 1, '0000-00-00', 1, 'RAJARHAT', '', 595, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 12000.00, '2026-03-28 17:47:49', 0, 0, 0, 0, '', '', '', '', '', '', 1, 0, 0, '', '', '', '', '', 1, 1, '2026-03-28 17:47:49', '2026-03-30 08:39:37'),
(190, '', '', 4, 1, 'PRASENJIT BANERJEE', '', '', '9830645495', '', 1, '0000-00-00', 1, 'DHAKURIA', '', 601, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 17000.00, '2026-03-28 17:49:35', 0, 0, 0, 0, '', '', '', '', '', '', 1, 0, 0, '', '', '', '', '', 1, 1, '2026-03-28 17:49:35', '2026-03-30 08:39:37'),
(191, '', '', 5, 1, 'Khadija Bibi', 'Jhantu SK', '', '9088414728', '', 2, '1990-01-02', 2, 'Palla daha Kanchapara Barrackpore North24 pgs West Bengal', '', 600, 24, 105, '743145', '462554777232', '', '', '', '', '', '', '', '', '', '', 5, '', '', '[\"1\"]', '[\"1\",\"3\"]', '', 1, 0.00, '2026-03-28 17:50:20', 0, 0, 0, 0, '', '', '', '', '', '4th passed', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-28 17:50:20', '2026-03-30 08:39:37'),
(192, '', '', 4, 1, 'SANA PARVEEN', '', '', '8777048256', '', 1, '0000-00-00', 1, 'BEGBAGAN', '', 595, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-03-28 17:54:54', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-28 17:54:54', '2026-03-30 08:39:37'),
(193, '', '', 5, 1, 'Sima  Murmu', 'Rabilal Maholi', '', '6380550779', '', 2, '1981-10-28', 2, 'Siyan Sahajapur Birbhum West Bengal ', '', 586, 24, 105, '731204', '385152949787', '', '', '', '', '', '', '', '', '', '', 2, '', '', '[\"2\",\"1\"]', '[\"1\"]', '', 0, 0.00, '2026-03-28 17:55:06', 0, 0, 0, 0, '', '', '', '', '', '2 passed', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-28 17:55:06', '2026-03-30 08:39:37'),
(194, '', '', 4, 1, 'RUTIKA AGARWAL', '', '', '8939304070', '', 1, '0000-00-00', 1, 'SALT LAKE', '', 595, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-03-28 18:00:18', 0, 0, 0, 0, '', '', '', '', '', '', 1, 0, 0, '', '', '', '', '', 1, 1, '2026-03-28 18:00:18', '2026-03-30 08:39:37'),
(195, '', '', 5, 1, 'Sabita Das', 'Santosh Das', '', '8001043404', '', 2, '1976-01-01', 2, 'Hoglasi Shrikole Deoly Howrah ', '', 592, 24, 105, '711301', '923684834968', '', '', '', '', '', '', '', '', '', '', 5, '', '', '[\"1\",\"4\"]', '[\"1\"]', '', 1, 0.00, '2026-03-28 18:00:48', 0, 0, 0, 0, '', '', '', '', '', '2passed', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-28 18:00:48', '2026-03-30 08:39:37'),
(196, '', '', 4, 1, 'SHRABONI SEN', '', '', '9830006105', '', 1, '0000-00-00', 1, 'PARK CIRCUS , TOPSIA MORE , BISWABANGLA', '', 595, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-03-28 18:03:16', 0, 0, 0, 0, '', '', '', '', '', '', 1, 0, 0, '', '', '', '', '', 1, 1, '2026-03-28 18:03:16', '2026-03-30 08:39:37'),
(197, '', '', 5, 1, 'Sujata  Dhara ', '', '', '9907767356', '', 2, '1993-01-01', 2, 'Baikunthapur Nakole Shyampur Howrah', '', 592, 24, 105, '711312', '979038503953', '', '', '', '', '', '', '', '', '', '', 2, '', '', '[\"3\"]', '[\"1\",\"3\"]', '', 1, 0.00, '2026-03-28 18:06:45', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-28 18:06:45', '2026-03-30 08:39:37'),
(199, '', '', 4, 1, 'DEV BISWAL', '', '', '9650226799', '', 1, '0000-00-00', 1, 'CHINAR PARK', '', 595, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-03-28 18:08:58', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-28 18:08:58', '2026-03-28 18:11:27'),
(200, '', '', 5, 1, 'Nilam Pasi ', 'Kailash Pasi ', '', '6291767290', '', 2, '1997-04-04', 2, 'Jele Para Rudra Lane  Bansberia', '', 592, 24, 105, '711310', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-03-28 18:30:36', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-28 18:30:36', '2026-03-28 18:33:14'),
(201, '', '', 5, 1, 'Alka Bharti ', 'Shyam Babu Bharti', '', '7439939139', '', 2, '2006-01-31', 2, 'Budge Budge 1 South 24Pgs ', '', 601, 24, 105, '743318', '823561348681', '1774703461.jpeg', '', '', '', '', '', '', '1774703466.jpeg', '', '', 2, '', '', '[\"1\"]', '[\"3\"]', '', 1, 0.00, '2026-03-28 18:36:42', 0, 0, 0, 0, '', '', '', '', '', '12th passed', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-28 18:36:42', '2026-03-30 08:39:37'),
(202, '', '', 5, 1, 'Shankari Sahani', 'Shankar Sahani ', '', '9088251604', '', 2, '1990-01-01', 2, 'Bauria Bhasapara Howrah West Bengal ', '', 592, 24, 105, '711305', '758495887520', '1774703818.jpeg', '1774703821.jpeg', '', '', '', '', '', '1774703835.jpeg', '', '', 18, '', '', '[\"5\"]', '[\"1\",\"3\"]', '', 1, 0.00, '2026-03-28 18:44:16', 0, 0, 0, 0, '', '', '', '', '', '4th passed', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-28 18:44:16', '2026-03-30 08:39:37'),
(203, '', '', 5, 1, 'Purbasa Das', 'Abhijit Das', '', '', '', 2, '2008-06-25', 1, 'Bhagabanpur Mollahal Shyampur 1 Howrah West Bengal', '', 592, 24, 105, '711314', '326063008755', '', '', '', '', '', '', '', '', '', '', 0, '', '', '[\"1\"]', '[\"1\"]', '', 0, 0.00, '2026-03-28 18:49:38', 0, 0, 0, 0, '', '', '', '', '', '8th passed', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-28 18:49:38', '2026-03-30 08:39:37'),
(204, '', '', 5, 1, 'Rupa Bhattacharya ', 'Ganesh Prasad Srivastab', '', '9038296094', '', 1, '1972-09-04', 2, 'A.K Mukherjee Road Baranagar North 24 pgs ', '', 600, 24, 105, '711310', '', '', '', '', '', '', '', '', '', '', '', 10, '', '', '[\"3\"]', '[\"1\"]', '', 1, 0.00, '2026-03-28 18:55:52', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-28 18:55:52', '2026-03-30 08:39:37'),
(205, '', '', 5, 1, 'Rita Baidya ', 'Suranjan Baidya ', '', '8481834600', '', 2, '1985-02-11', 2, 'Nadia West Bengal Dasdia Fatepur Haringhata ', '', 599, 24, 105, '741249', '', '', '', '', '', '', '', '', '1774866407.jpeg', '[\"2\"]', '', 12, '', '', '[\"2\",\"1\"]', '[\"1\",\"3\"]', '', 1, 0.00, '2026-03-28 19:00:09', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 5, 'HINDU', 'INDIAN', '', '', '', 1, 1, '2026-03-28 19:00:09', '2026-03-30 15:58:11'),
(207, '', '', 5, 1, 'Menaka Das', 'Manindra Das', '', '8670866244', '', 2, '1965-03-18', 2, 'Bhaluka Battala Kanainagar Nadia', '', 599, 24, 105, '741317', '242973694380', '1774866964.jpeg', '1774866969.jpeg', '', '', '', '', '', '1774866973.jpeg', '[\"1\"]', '', 7, '', '', '[\"2\",\"1\"]', '[\"1\"]', '', 1, 0.00, '2026-03-30 16:01:15', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 5, 'HINDU', 'INDIAN', '', '', '', 1, 1, '2026-03-30 16:01:15', '2026-03-30 16:07:10'),
(208, '', '', 5, 1, 'Indrajit Bhattacharjee', 'Keshab Bhattacharjee', '', '6295890693', '', 2, '1993-10-15', 2, 'Jayrambati Bankura', '', 592, 24, 105, '722161', '215568208419', '1774867685.jpeg', '', '', '1774867754.jpeg', '', '', '1774867729.jpeg', '1774867774.jpeg', '[\"4\"]', '', 4, '', '', '[\"7\",\"4\"]', '[\"1\"]', '', 1, 0.00, '2026-03-30 16:09:53', 0, 2, 1, 2, '', '', '', '', '', 'Graduation', 0, 0, 5, 'HINDU', 'INDIAN', 'Parents,Wife', '', '', 1, 1, '2026-03-30 16:09:53', '2026-03-30 16:21:07'),
(209, '', '', 5, 1, 'Aparna Das', 'Sushanta Das', '', '6289986729', '', 2, '1999-01-09', 2, '181 Kashinath Dutta Road Baranagar(m) North 24pgs West Bengal', '', 600, 24, 105, '700036', '776093148304', '1774868328.jpeg', '1774868333.jpeg', 'GAZPD9539L', '1774868337.jpeg', '', '', '', '1774868341.jpeg', '[\"7\",\"4\"]', '', 3, '', '', '[\"1\",\"4\"]', '[\"1\",\"3\"]', '', 2, 0.00, '2026-03-30 16:24:04', 0, 0, 0, 0, '', '', '', '', '', '12th Passed', 0, 0, 2, 'HINDU', 'INDIAN', 'Mother,father', '', '', 1, 1, '2026-03-30 16:24:04', '2026-03-30 16:32:07'),
(210, '', '', 5, 1, 'Sima Yadav', 'Satrugan Yadav', '', '8327654071', '', 2, '1976-01-01', 2, 'Bhedia Bagdipara Bardhaman West Bengal', '', 588, 24, 105, '713126', '490986967368', '1774868900.jpeg', '', '', '', '', '1774868909.jpeg', '', '1774868923.jpeg', '[\"2\",\"1\"]', '', 6, '', '', '[\"2\",\"1\"]', '[\"1\",\"3\"]', '', 1, 0.00, '2026-03-30 16:34:54', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 5, 'HINDU', 'INDIAN', 'husband, children', '', '', 1, 1, '2026-03-30 16:34:54', '2026-03-30 16:39:52'),
(211, '', '', 5, 1, 'Gita Majumdar', 'Swapan Majumdar', '', '8388874495', '', 2, '1985-01-01', 2, 'Birnagar Khanpara Nadia West Bengal', '', 599, 24, 105, '741127', '794050229856', '1774869729.jpeg', '1774869760.jpeg', 'HYHPD8007A', '', '', '', '', '1774869764.jpeg', '[\"2\",\"1\"]', '', 10, '', '', '[\"2\",\"1\"]', '[\"1\"]', '', 0, 0.00, '2026-03-30 16:46:59', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 5, 'HINDU', 'INDIAN', 'Daughter', '', '', 1, 1, '2026-03-30 16:46:59', '2026-03-30 16:54:01'),
(212, '', '', 5, 1, 'Sunita Rajbhar', 'Durga Prasad Rajbhar', '', '8334862864', '', 2, '1987-12-25', 2, 'Line no.5 Fortgloster OEO Block Howrah', '', 592, 24, 105, '711310', '966991173085', '1774871322.jpeg', '1774871330.jpeg', '', '', '', '', '', '1774871334.jpeg', '[\"1\",\"3\"]', '', 2, '', '', '[\"1\",\"3\",\"4\"]', '[\"1\",\"3\"]', '', 1, 0.00, '2026-03-30 17:03:54', 0, 0, 0, 0, '', '', '', '', '', '5th passed', 0, 0, 5, 'HINDU', 'INDIAN', 'Husband, Father-in-law, Mother-in-law.', '', '', 1, 1, '2026-03-30 17:03:54', '2026-03-30 17:21:06'),
(213, '', '', 5, 1, 'Durga Santra', 'Asta Charan Bag', '', '7872429424', '', 2, '1989-06-20', 2, 'Saluka Panskura 11 Kolaghat', '', 592, 24, 105, '721130', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-03-30 17:22:25', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-30 17:22:25', '2026-03-30 17:24:31'),
(214, '', '', 5, 1, 'Dipa Das', 'Pradip Das', '', '9744039654', '', 2, '1991-01-13', 2, '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-03-30 17:25:21', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-03-30 17:25:21', '2026-03-30 17:26:50'),
(215, '', '', 5, 1, 'Mili Sarkar', 'Sushanta Biswas', '', '8653640823', '', 2, '1987-12-20', 2, 'Kaijuru Swarupnagar Kaijuri N 24PGS West Bengal', '', 600, 24, 105, '743427', '365011838478', '', '', '', '', '', '', '', '', '[\"2\",\"7\",\"1\"]', '', 5, '', '', '[\"2\",\"7\",\"1\"]', '[\"1\"]', '', 1, 0.00, '2026-03-30 17:30:43', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 5, 'HINDU', 'INDIAN', 'Husband, Son', '', '', 1, 1, '2026-03-30 17:30:43', '2026-03-30 17:37:25'),
(216, '', '', 5, 1, 'Mamani Maji', 'Arabinda Maji', '', '8514839692', '7872377050', 2, '1982-01-01', 2, 'Chondhar Pukurpar Gushkara Bardhaman', '', 588, 24, 105, '713128', '577211690790', '1774872865.jpeg', '1774872870.jpeg', '', '', '', '1774872884.jpeg', '1774872892.jpeg', '1774872897.jpeg', '[\"2\",\"7\",\"1\",\"3\"]', '', 3, '', '', '[\"3\"]', '[\"1\"]', '', 1, 0.00, '2026-03-30 17:41:05', 0, 0, 0, 0, '', '', '', '', '', '2passed', 0, 0, 5, 'HINDU', 'INDIAN', 'Husband', '', '', 1, 1, '2026-03-30 17:41:05', '2026-03-30 17:46:46'),
(217, '', '', 5, 1, 'Minu Mondal', 'Dulal Mondal', '', '8116480284', '8388990348', 2, '1985-03-02', 2, 'Bidyanagar Ganganandapur Bidyanagar Barddhaman West Bengal', '', 588, 24, 105, '741319', '658694829172', '1774873508.jpeg', '1774873511.jpeg', '', '', '', '', '', '1774873514.jpeg', '[\"2\",\"3\"]', '', 3, '', '', '[\"2\",\"3\"]', '[\"1\"]', '', 1, 0.00, '2026-03-30 17:51:48', 0, 0, 0, 0, '', '', '', '', '', '5th passed', 0, 0, 5, 'HINDU', 'INDIAN', 'Husband, Two Son, Two Daughter-in-law', '', '', 1, 1, '2026-03-30 17:51:48', '2026-03-30 17:56:54'),
(218, '', '', 5, 1, 'Namita Das', 'Swarswati Das', '', '8509347729', '7679453266', 2, '1985-12-17', 2, 'Mahartuba Purba Bardhaman West Bengal', '', 588, 24, 105, '713147', '751534279731', '1774873973.jpeg', '1774873978.jpeg', '', '', '', '', '', '1774873981.jpeg', '[\"2\",\"7\",\"1\",\"3\"]', '', 3, '', '', '[\"2\",\"7\",\"1\",\"3\"]', '[\"1\"]', '', 1, 0.00, '2026-03-30 17:59:42', 0, 0, 0, 0, '', '', '', '', '', '8th passed', 0, 0, 5, 'HINDU', 'INDIAN', 'Mother,Daughter', '', '', 1, 1, '2026-03-30 17:59:42', '2026-03-30 18:04:35'),
(219, '', '', 5, 1, 'Amanti Naik', 'Prem Naik', '', '9382542025', '', 2, '1994-01-02', 2, '0092, Naya Laina Chalauni Tea Garden Jalpaiguri', '', 593, 24, 105, '735223', '', '', '', 'CRBPN2635N', '1774874484.jpeg', '', '1774874474.jpeg', '1774874478.jpeg', '1774874488.jpeg', '[\"2\",\"1\"]', '', 5, '', '', '[\"2\",\"1\"]', '[\"3\"]', '', 1, 0.00, '2026-03-30 18:07:05', 0, 0, 0, 0, '', '', '', '', '', '9th passed', 0, 0, 5, 'HINDU', 'INDIAN', 'Mother,Daughter(7years), Son (13years)', '', '', 1, 1, '2026-03-30 18:07:05', '2026-03-30 18:13:54'),
(220, '', '', 5, 1, 'Alpana Jana', 'Uttam Jana', '', '8145648712', '8482022947', 2, '1982-10-07', 2, 'Bhagabanpur Mollahat Howrah', '', 592, 24, 105, '711314', '565224398499', '1774875011.jpeg', '', '', '', '', '', '', '', '[\"2\",\"1\",\"3\"]', '', 2, '', '', '[\"2\",\"1\",\"3\"]', '[\"1\"]', '', 1, 0.00, '2026-03-30 18:17:42', 0, 0, 0, 0, '', '', '', '', '', '2year', 0, 0, 5, 'HINDU', 'INDIAN', 'Husband, Mother-in-law.', '', '', 1, 1, '2026-03-30 18:17:42', '2026-03-30 18:22:00'),
(221, '', '', 5, 1, 'Sharada Pandurang More', 'Pandurang More', '', '7075710838', '919959393', 2, '2003-01-01', 2, 'At Birwadi Tal Mahabaleshwar Satara Maharashtra', '', 343, 12, 105, '412806', '570828960661', '1774875547.jpeg', '1774875550.jpeg', '', '', '', '', '', '1774875554.jpeg', '[\"2\",\"1\",\"3\"]', '', 3, '', '', '[\"2\",\"1\",\"3\"]', '[\"3\"]', '', 1, 0.00, '2026-03-30 18:24:54', 0, 0, 0, 0, '', '', '', '', '', '10th passed', 0, 0, 5, 'HINDU', 'INDIAN', '', '', '', 1, 1, '2026-03-30 18:24:54', '2026-03-30 18:30:17'),
(222, '', '', 5, 1, 'Sabina Yeasmin', 'Sahed Ali', '', '7047403543', '', 2, '1996-05-01', 2, 'Mahendrapur 1 District Malda West Bengal', '', 596, 24, 105, '732125', '837506163059', '1774875879.jpeg', '', '', '', '', '', '', '1774875887.jpeg', '[\"2\",\"1\"]', '', 0, '', '', '[\"2\",\"1\"]', '[\"1\"]', '', 1, 0.00, '2026-03-30 18:32:17', 0, 0, 0, 0, '', '', '', '', '', '12th passed', 0, 0, 5, 'muslim', 'INDIAN', '', '', '', 1, 1, '2026-03-30 18:32:17', '2026-03-30 18:36:20'),
(223, '', '', 5, 1, 'Jhilik Haldar', 'Palash Haldar', '', '6297682194', '8100583235', 2, '1990-05-04', 2, 'Jorehat Howrah West Bengal', '', 592, 24, 105, '711302', '423226658482', '1774876271.jpeg', '1774876275.jpeg', '', '', '', '', '', '1774876278.jpeg', '[\"2\",\"1\"]', '', 8, '', '', '[\"2\",\"1\"]', '[\"1\",\"3\"]', '', 1, 0.00, '2026-03-30 18:38:45', 0, 0, 0, 0, '', '', '', '', '', '8th passed', 0, 0, 5, 'HINDU', 'INDIAN', 'Husband, Daughter', '', '', 1, 1, '2026-03-30 18:38:45', '2026-03-30 18:42:43'),
(224, '', '', 5, 1, 'Protiva Mondal', 'Sujit Kumar Mondal', '', '9775690096', '', 2, '1994-12-26', 2, 'Ghugraghachi Bayardengi Nadia West Bengal', '', 599, 24, 105, '741502', '670819266927', '1774876646.jpeg', '1774876650.jpeg', '', '', '', '', '', '1774876652.jpeg', '[\"2\",\"1\",\"3\"]', '', 3, '', '', '[\"2\",\"1\",\"3\"]', '[\"1\",\"3\"]', '', 1, 0.00, '2026-03-30 18:44:51', 0, 0, 0, 0, '', '', '', '', '', '10th passed', 0, 0, 5, 'HINDU', 'INDIAN', 'Husband ,Son', '', '', 1, 1, '2026-03-30 18:44:51', '2026-03-30 18:48:41'),
(225, '', '', 5, 1, 'Kabita Poddar Biswas', 'Sankar Poddar', '', '7501251156', '', 2, '1991-01-01', 2, 'Gangni Paschim Gangni Nadia West Bengal ', '', 599, 24, 105, '741121', '695357518391', '1774877018.jpeg', '', '', '', '', '1774877024.jpeg', '1774877028.jpeg', '1774877031.jpeg', '[\"2\",\"7\",\"1\",\"3\"]', '', 3, '', '', '[\"3\"]', '[\"1\",\"3\"]', '', 1, 0.00, '2026-03-30 18:50:00', 0, 0, 0, 0, '', '', '', '', '', '6 passed', 0, 0, 5, 'HINDU', 'INDIAN', 'Husband, 2 Children, Mother', '', '', 1, 1, '2026-03-30 18:50:00', '2026-03-30 18:56:02'),
(226, '', '', 5, 1, 'Santoshi Maity', 'Goshtha Senapati', '', '9800203553', '', 2, '1982-01-01', 2, 'Hogal beria Ramtarakhat Purba Medinipur West Bengal', '', 597, 24, 105, '721151', '444290756418', '1774938429.jpeg', '1774938433.jpeg', '', '', '', '', '', '1774938437.jpeg', '[\"2\",\"1\"]', '', 3, '', '', '[\"2\",\"1\"]', '[\"1\",\"3\"]', '', 1, 0.00, '2026-03-31 11:49:07', 0, 0, 0, 0, '', '', '', '', '', '6th passed', 0, 0, 5, 'HINDU', 'INDIAN', 'Son, Daughter-in-law, Daughter', '', '', 1, 1, '2026-03-31 11:49:07', '2026-03-31 11:58:58'),
(227, '', '', 5, 1, 'Mitali Sur', 'Bijay Das', '', '8981218669', '', 2, '1988-02-12', 2, 'Siddanta Para 16no. Rail Gate Nona Chandan Pukur N 24pgs West Bengal ', '', 600, 24, 105, '700122', '766911894239', '1774939631.jpeg', '1774939651.jpeg', '', '', 'TQR1524685', '1774939877.jpeg', '1774939882.jpeg', '1774939885.jpeg', '[\"7\",\"4\"]', '', 5, '', '', '[\"7\",\"4\"]', '[\"1\",\"3\"]', '', 1, 0.00, '2026-03-31 12:12:56', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 5, 'HINDU', 'INDIAN', 'Mother,Daughter', '', '', 1, 1, '2026-03-31 12:12:56', '2026-03-31 12:24:07'),
(228, '', '', 5, 1, 'Rajani Hansda', 'Somai Hansda', '', '8710013208', '', 1, '2002-09-27', 2, 'Mangolkote Barddhaman West Bengal', '', 588, 24, 105, '713147', '498849044294', '1774940404.jpeg', '', '', '', '', '', '', '1774940408.jpeg', '[\"2\",\"1\",\"3\"]', '', 1, '', '', '[\"2\",\"1\",\"3\"]', '[\"1\"]', '', 1, 0.00, '2026-03-31 12:26:06', 0, 0, 0, 0, '', '', '', '', '', '12 passed', 0, 0, 5, 'HINDU', 'INDIAN', 'Mother,Grand Mother.', '', '', 1, 1, '2026-03-31 12:26:06', '2026-03-31 12:31:25'),
(229, '', '', 5, 1, 'Anita Rajbhar', 'Sita  Ram Rajbhar', '', '8910662952', '', 2, '1990-01-01', 2, 'Bally Durgapur Samabaypalli Howrah West Bengal ', '', 592, 24, 105, '711205', '851262236645', '1774957338.jpeg', '1774957345.jpeg', '', '', '', '', '', '1774957351.jpeg', '[\"2\",\"1\"]', '', 10, '', '', '[\"2\",\"1\"]', '[\"3\"]', '', 2, 0.00, '2026-03-31 16:48:54', 0, 0, 0, 0, '', '', '', '', '', '8 th passed', 0, 0, 4, 'HINDU', 'INDIAN', 'Husband ,Son, Daughter', '', '', 1, 1, '2026-03-31 16:48:54', '2026-03-31 17:14:01'),
(230, '', '', 5, 1, 'Sabita Devi', 'Deepak Prasad', '', '7044214291', '', 2, '1988-01-01', 2, '21 Gauripada Mukherjee Lane Howrah Haora West Bengal ', '', 592, 24, 105, '711101', '972886940509', '1774958426.jpeg', '1774958432.jpeg', '', '', '', '', '', '1774958439.jpeg', '[\"2\",\"1\"]', '', 7, '', '', '[\"2\",\"1\"]', '[\"3\"]', '', 2, 0.00, '2026-03-31 17:24:57', 0, 0, 0, 0, '', '', '', '', '', '10th passed', 0, 0, 3, 'HINDU', 'INDIAN', 'Husband, Son, Daughter, Mother, Father', '', '', 1, 1, '2026-03-31 17:24:57', '2026-03-31 17:32:06'),
(231, '', '', 5, 1, 'Aruna Dey', 'Hiralal Dey', '', '8918805301', '', 2, '1989-04-01', 2, 'Mahinda alias babudengan Puruliya babugram West Bengal', '', 602, 24, 105, '723133', '203808515574', '1774958872.jpeg', '1774958876.jpeg', '', '', '', '', '', '1774958880.jpeg', '[\"1\",\"3\"]', '', 4, '', '', '[\"1\",\"3\"]', '[\"1\"]', '', 1, 0.00, '2026-03-31 17:33:55', 0, 0, 0, 0, '', '', '', '', '', '5th  PASSED', 0, 0, 5, 'HINDU', 'INDIAN', 'Husband,Son', '', '', 1, 1, '2026-03-31 17:33:55', '2026-03-31 17:42:19'),
(232, '', '', 5, 1, 'Manju Majhi', 'Sunil Majhi', '', '8944891973', '', 2, '1994-06-09', 2, 'Dighirpara Sunuti Murshidabad Sunuti West Bengal', 'w', 598, 24, 105, '742401', '481754021543', '1774959631.jpeg', '1774959636.jpeg', '', '', 'TFH1333145', '1774959643.jpeg', '1774959648.jpeg', '1774959653.jpeg', '[\"3\"]', '', 4, '', '', '[\"3\"]', '[\"1\"]', '', 1, 0.00, '2026-03-31 17:45:19', 0, 0, 0, 0, '', '', '', '', '', '3rd passed', 0, 0, 5, 'HINDU', 'INDIAN', 'Father, Mother, Son, Daughter', '', '', 1, 1, '2026-03-31 17:45:19', '2026-03-31 17:53:08'),
(233, '', '', 5, 1, 'Mangala Sardar', 'Panchanan Sardar', '', '7811969328', '', 2, '1993-01-01', 2, 'Kamarpara Pathan Khali Gosaba South 24 pgs West Bengal', '', 601, 24, 105, '743611', '363359685780', '1774960427.jpeg', '1774960431.jpeg', '', '', '', '', '', '1774960435.jpeg', '[\"1\",\"3\"]', '', 5, '', '', '[\"1\",\"3\"]', '[\"1\",\"3\"]', '', 0, 0.00, '2026-03-31 17:57:29', 0, 0, 0, 0, '', '', '', '', '', '3 rd passed', 0, 0, 0, '', '', 'Father,Mothers,Son', '', '', 1, 1, '2026-03-31 17:57:29', '2026-03-31 18:05:10'),
(234, '', '', 5, 1, 'Sahadeb Maji', 'Sannyasi Maji', '', '8609054021', '8609220872', 1, '1990-03-08', 1, 'Sarishani Mollahat Howrah', '', 592, 24, 105, '711314', '976980364995', '1774961529.jpeg', '1774961534.jpeg', '', '', 'YWJ1169507', '1774961551.jpeg', '', '1774961555.jpeg', '[\"2\",\"1\"]', '', 3, '', '', '[\"2\",\"1\"]', '[\"1\",\"3\"]', '', 1, 0.00, '2026-03-31 18:05:58', 0, 0, 0, 0, '', '', '', '', '', '5th passed', 0, 0, 5, 'HINDU', 'INDIAN', 'Mother,Father, Brother', '', '', 1, 1, '2026-03-31 18:05:58', '2026-03-31 18:24:40'),
(235, '', '', 5, 1, 'Archana Biswas', 'Srijan Biswas', '', '7602704084', '', 2, '1989-02-03', 2, 'Arjangarh Badkulla Gangni Nadia West Bengal', '', 599, 24, 105, '741121', '532767523930', '1774962168.jpeg', '1774962175.jpeg', '', '', '', '', '', '1774962182.jpeg', '[\"2\",\"1\",\"3\"]', '', 5, '', '', '[\"2\",\"1\",\"3\"]', '[\"1\"]', '', 0, 0.00, '2026-03-31 18:27:41', 0, 0, 0, 0, '', '', '', '', '', '5th passed', 0, 0, 0, 'HINDU', 'INDIAN', 'Husband, Son', '', '', 1, 1, '2026-03-31 18:27:41', '2026-03-31 18:35:49'),
(236, '', '', 5, 1, 'Shyamali Ghosh', 'Lt. Subal Ghosh', '', '9083208066', '', 3, '1986-01-01', 2, 'Chhatini Kherur Barddhaman West Bengal', '', 588, 24, 105, '713125', '459406220412', '1774962964.jpeg', '1774962969.jpeg', '', '', '', '', '', '1774962973.jpeg', '[\"2\",\"7\",\"1\"]', '', 4, '', '', '[\"2\",\"7\",\"1\"]', '[\"1\"]', '', 1, 0.00, '2026-03-31 18:42:46', 0, 0, 0, 0, '', '', '', '', '', '7 th passed', 0, 0, 5, 'HINDU', 'INDIAN', 'Daughter', '', '', 1, 1, '2026-03-31 18:42:46', '2026-03-31 18:47:42'),
(239, '', '', 5, 1, 'Soma Chakraborty', 'Nibir Chakraborty', '', '7079887011', '', 2, '1987-08-24', 2, 'Raine Panskura II Purba Medinipur West Bengal ', '', 597, 24, 105, '721130', '310608469712', '1775046725.jpeg', '1775046730.jpeg', '', '', '', '', '', '1775046734.jpeg', '[\"7\",\"4\"]', '', 4, '', '', '', '[\"1\",\"3\"]', '', 1, 0.00, '2026-04-01 17:55:29', 0, 0, 0, 0, '', '', '', '', '', 'Gradute', 0, 0, 5, 'HINDU', 'INDIAN', 'Son', '', '', 1, 1, '2026-04-01 17:55:29', '2026-04-01 18:03:27'),
(240, '', '', 5, 1, 'Jhuma Roy ', 'Bihari Malik', '', '6296215554', '', 2, '1996-01-01', 2, 'Patuli Patuligram Hooghly  West Bengal', '', 591, 24, 105, '712501', '966989016416', '1775047315.jpeg', '', '', '', '', '', '', '1775047321.jpeg', '[\"2\",\"3\"]', '', 5, '', '', '[\"2\",\"3\"]', '[\"1\",\"3\"]', '', 1, 0.00, '2026-04-01 18:08:40', 0, 0, 0, 0, '', '', '', '', '', '6th Passed', 0, 0, 5, 'HINDU', 'INDIAN', 'Father, Mother,Son', '', '', 1, 1, '2026-04-01 18:08:40', '2026-04-01 18:13:35'),
(241, '', '', 5, 1, 'Leena Manik Jangam', 'Manik Jangam', '', '7773938262', '', 2, '1981-05-08', 2, 'Near Kata House Mahakali Colliery Chandrapur Maharashtra', '', 329, 12, 105, '442401', '356957359142', '1775047737.jpeg', '1775047742.jpeg', 'PUDPS1658L', '1775047748.jpeg', '', '', '', '', '[\"3\"]', '', 5, '', '', '[\"3\"]', '[\"3\"]', '', 1, 0.00, '2026-04-01 18:15:04', 0, 0, 0, 0, '', '', '', '', '', '12TH PASSED', 0, 0, 5, 'HINDU', 'INDIAN', 'SINGLE', '', '', 1, 1, '2026-04-01 18:15:04', '2026-04-01 18:20:35'),
(242, '', '', 5, 1, 'Pratima Baidya', 'Banamali Mondal', '', '8335979127', '', 2, '1984-03-15', 2, 'Dhulasimla Dadpur Uluberia Howrah West Bengal', '', 592, 24, 105, '711315', '589937506199', '1775048194.jpeg', '1775048198.jpeg', '', '', '', '', '', '1775048203.jpeg', '[\"2\",\"3\"]', '', 4, '', '', '[\"2\",\"3\"]', '[\"1\"]', '', 1, 0.00, '2026-04-01 18:22:06', 0, 0, 0, 0, '', '', '', '', '', '10th passed', 0, 0, 5, 'HINDU', 'INDIAN', 'Daughter, Son', '', '', 1, 1, '2026-04-01 18:22:06', '2026-04-01 18:28:31'),
(243, '', '', 5, 1, 'Aparna Mitra', 'Surajit Mitra', '', '6291920072', '', 2, '1996-10-13', 2, 'Ramprasad Sarani Natun Bari para Hali Sahar North  24 Parganas', '', 600, 24, 105, '743134', '538736424291', '1775049205.jpeg', '1775049210.jpeg', '', '', '', '1775049219.jpeg', '1775049224.jpeg', '1775049228.jpeg', '', '', 5, '', '', '', '', '', 0, 0.00, '2026-04-01 18:37:02', 0, 0, 0, 0, '', '', '', '', '', '12th Passed', 0, 0, 0, '', '', 'Husband, Daughter', '', '', 1, 1, '2026-04-01 18:37:02', '2026-04-01 18:45:01'),
(244, '', '', 5, 1, 'Piyali Purakait', 'Prabir Purakait ', '', '8017247982', '', 2, '1996-12-17', 2, '8 Rani Branch Road Cossipore Kolkata West Bengal', '', 595, 24, 105, '700002', '849430679153', '1775049818.jpeg', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-04-01 18:47:33', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-01 18:47:33', '2026-04-01 18:53:38'),
(245, '', '', 5, 1, 'Piyali ', '', '', '', '', 1, '0000-00-00', 1, '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-04-02 11:34:46', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 0, '2026-04-02 11:34:46', '2026-04-02 11:34:46'),
(246, '', '', 4, 1, 'Bhawana Gupta', '', '', '7278545811', '', 1, '0000-00-00', 1, 'Howrah Maidan', '', 592, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-04-04 15:08:25', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 15:08:25', '2026-04-04 15:09:00'),
(247, '', '', 4, 1, 'Hemant Mishra', '', '', '8130333480', '', 1, '0000-00-00', 1, 'Newtown', '', 595, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 21.00, '2026-04-04 15:10:31', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 15:10:31', '2026-04-04 15:11:25'),
(248, '', '', 4, 1, 'Sukanto Ghosh ', '', '', '8910812189', '', 1, '0000-00-00', 1, 'Newtown city center 2', '', 595, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-04-04 15:11:49', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 15:11:49', '2026-04-04 15:12:29'),
(250, '', '', 4, 1, 'Swati  Shakhambari', '', '', '8100456023', '', 1, '0000-00-00', 1, 'Science city', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-04-04 15:14:43', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 15:14:43', '2026-04-04 15:15:11'),
(251, '', '', 4, 1, 'Zoya Basu', '', '', '9903306417', '', 1, '0000-00-00', 1, 'Salt lake ', '', 595, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 16.00, '2026-04-04 15:17:35', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 15:17:35', '2026-04-04 15:18:13'),
(252, '', '', 4, 1, 'Sonam Singh Kaur', '', '', '8585055304', '', 1, '0000-00-00', 1, 'Chinar park', '', 595, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 17.00, '2026-04-04 15:18:47', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 15:18:47', '2026-04-04 15:19:28'),
(253, '', '', 4, 1, 'Jyoti Dugar', '', '', '9073354210', '', 1, '0000-00-00', 1, 'Howrah AC', 'h', 592, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 16.00, '2026-04-04 15:19:56', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 15:19:56', '2026-04-04 15:20:58'),
(254, '', '', 4, 1, 'Dipta Banerjee', '', '', '9831055459', '', 1, '0000-00-00', 1, 'Delhi', '', 0, 25, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 23.00, '2026-04-04 15:21:37', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 15:21:37', '2026-04-04 15:22:35'),
(255, '', '', 4, 1, 'Rituparna Das', '', '', '8420203477', '', 1, '0000-00-00', 1, 'Ultadanga', '', 595, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 18.00, '2026-04-04 15:23:10', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 15:23:10', '2026-04-04 15:24:04'),
(256, '', '', 4, 1, 'Bratindra Narayan Chakraborty', '', '', '9910000675', '', 1, '0000-00-00', 1, 'Chinar Park', '', 595, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-04-04 15:24:51', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 15:24:51', '2026-04-04 15:25:30'),
(257, '', '', 4, 1, 'Siddharth Jain', '', '', '9800920001', '', 1, '0000-00-00', 1, 'Kharagpur', '', 0, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-04-04 15:26:09', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 15:26:09', '2026-04-04 15:26:39'),
(258, '', '', 4, 1, 'Indu Tapari', '', '', '9311170970', '', 1, '0000-00-00', 1, 'Lilua', '', 0, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 420.00, '2026-04-04 15:27:31', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 15:27:31', '2026-04-04 15:28:28'),
(259, '', '', 4, 1, 'Sakshi  toshiniwal ', '', '', '8860464688', '', 1, '0000-00-00', 1, 'Girish Park', '', 595, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 18.00, '2026-04-04 15:29:08', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 15:29:08', '2026-04-04 15:30:01'),
(260, '', '', 4, 1, 'Shreya ', '', '', '', '', 1, '0000-00-00', 1, '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-04-04 15:30:35', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 0, '2026-04-04 15:30:35', '2026-04-04 15:30:35'),
(261, '', '', 4, 1, 'Sukanya Roy', '', '', '8240195983', '', 1, '0000-00-00', 1, 'Salt lake 4 no. tank', '', 595, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 16.00, '2026-04-04 15:31:52', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 15:31:52', '2026-04-04 15:33:50'),
(262, '', '', 4, 1, 'Soumya  Chatterjee', '', '', '9903206833', '', 1, '0000-00-00', 1, 'Kalighat ', '', 595, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 350.00, '2026-04-04 15:34:42', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 15:34:42', '2026-04-04 15:35:28'),
(263, '', '', 4, 1, 'Asish Kumar Mishra', '', '', '6291985904', '', 1, '0000-00-00', 1, 'Budge Budge', '', 0, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-04-04 15:36:10', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 15:36:10', '2026-04-04 15:36:47'),
(264, '', '', 4, 1, 'Rafiq ', '', '', '9845288188', '', 1, '0000-00-00', 1, 'Bangalore', '', 224, 9, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 22.00, '2026-04-04 15:37:21', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 15:37:21', '2026-04-04 15:39:23'),
(265, '', '', 4, 1, 'Liza Bhandawat', '', '', '9038588183', '', 1, '0000-00-00', 1, 'Howrah AC', '', 592, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-04-04 15:40:46', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 15:40:46', '2026-04-04 15:41:32'),
(266, '', '', 4, 1, 'Somnath Ghosh', '', '', '905123280', '', 1, '0000-00-00', 1, 'Nabana (Mandirtala)', '', 592, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-04-04 15:43:13', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 15:43:13', '2026-04-04 15:44:39'),
(267, '', '', 4, 1, 'Riddhima Seal', '', '', '9833108532', '', 1, '0000-00-00', 1, 'Kestopur Dumdumpark', '', 595, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-04-04 15:45:18', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 15:45:18', '2026-04-04 15:46:00'),
(268, '', '', 4, 1, 'Debyani Banerjee', '', '', '9831071431', '', 1, '0000-00-00', 1, 'Chinar Park (Lognathmandir)', '', 595, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 500.00, '2026-04-04 15:46:46', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 15:46:46', '2026-04-04 15:47:55'),
(269, '', '', 4, 1, 'Susmita Mayur', '', '', '7439774587', '', 1, '0000-00-00', 1, 'Santragachi Belepol', '', 592, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 350.00, '2026-04-04 15:48:24', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 15:48:24', '2026-04-04 15:49:22'),
(270, '', '', 4, 1, 'Dr. Pranab Goswami', '', '', '7439691659', '', 1, '0000-00-00', 1, '', '', 0, 0, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-04-04 15:50:02', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 15:50:02', '2026-04-04 15:50:27'),
(271, '', '', 4, 1, 'Samir Mitra', '', '', '8100079587', '', 1, '0000-00-00', 1, 'Panskura', '', 0, 0, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 24.00, '2026-04-04 15:50:58', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 15:50:58', '2026-04-04 15:51:48'),
(272, '', '', 4, 1, 'Anesha Some', '', '', '8335080491', '', 1, '0000-00-00', 1, 'Haldiram Airport', '', 595, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-04-04 15:52:17', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 15:52:17', '2026-04-04 15:52:56'),
(273, '', '', 4, 1, 'Sompa Mallick', '', '', '9330699940', '', 1, '0000-00-00', 1, 'Maniktala', 'i', 0, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 16.00, '2026-04-04 15:53:52', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 15:53:52', '2026-04-04 15:54:48'),
(274, '', '', 4, 1, 'Muneor Subair', '', '', '6005527396', '', 1, '0000-00-00', 1, 'Hesting', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 18.00, '2026-04-04 15:55:23', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 15:55:23', '2026-04-04 15:56:06'),
(275, '', '', 4, 1, 'Prashant', '', '', '8179630843', '', 1, '0000-00-00', 1, 'Hyderabad', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-04-04 15:56:53', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 15:56:53', '2026-04-04 15:57:24'),
(276, '', '', 4, 1, 'Twinkle ', '', '', '9873031011', '', 1, '0000-00-00', 1, 'Kakurgachi Fulbagan', '', 595, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 22.00, '2026-04-04 15:57:55', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 15:57:55', '2026-04-04 15:58:54');
INSERT INTO `user_details` (`user_id`, `username`, `password`, `user_type`, `added_by`, `full_name`, `fat_hus_name`, `email_id`, `phone_number`, `alt_phone_number`, `m_id`, `date_of_birth`, `gender`, `address`, `curr_address`, `city_id`, `state_id`, `country_id`, `pincode`, `adhar_card`, `adhar_card_img`, `adhar_card_back_img`, `pan_card`, `pan_card_img`, `voter_id_card`, `voter_id_card_img`, `voter_id_card_back_img`, `user_photo`, `wt_id`, `work_type_others`, `work_exp`, `earlier_work_city`, `last_emplr_name`, `sk_id`, `l_id`, `work_loc`, `st_id`, `exp_salary`, `available_from`, `wf_id`, `il_id`, `pv_id`, `ch_id`, `emg_cont_person`, `relation`, `emg_cont_number`, `bank_details`, `bank_details_img`, `highest_edu`, `declaration`, `lc_id`, `wh_id`, `religion`, `nationality`, `family_bg_info`, `nr_id`, `misce_doc`, `inserted_by`, `updated_by`, `insert_date`, `update_date`) VALUES
(277, '', '', 4, 1, 'Suchandrima Dutta', '', '', '8961629581', '', 1, '0000-00-00', 1, 'Jadavpur', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 18.00, '2026-04-04 16:00:53', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 16:00:53', '2026-04-04 16:06:30'),
(278, '', '', 4, 1, 'Karishma Khan', '', '', '9163955530', '', 1, '0000-00-00', 1, 'Garden Reach', '', 0, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 470.00, '2026-04-04 16:07:04', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 16:07:04', '2026-04-04 16:07:57'),
(279, '', '', 4, 1, 'A.K Basu', '', '', '6289079796', '', 1, '0000-00-00', 1, 'Garden Reach', '', 0, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 14.00, '2026-04-04 16:08:20', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 16:08:20', '2026-04-04 16:09:25'),
(280, '', '', 4, 1, 'Mintu ', '', '', '7601875707', '', 1, '0000-00-00', 1, '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 18.00, '2026-04-04 16:09:50', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 16:09:50', '2026-04-04 16:10:18'),
(281, '', '', 4, 1, 'Sirisha Cheedalla', '', '', '9494365555', '', 1, '0000-00-00', 1, 'Hyderabad', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-04-04 16:10:53', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 16:10:53', '2026-04-04 16:11:18'),
(282, '', '', 4, 1, 'Sudeshna Mukherjee', '', '', '9831741077', '', 1, '0000-00-00', 1, 'Dumdum Cantonment', '', 0, 0, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-04-04 16:21:04', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 16:21:04', '2026-04-04 16:21:52'),
(283, '', '', 4, 1, 'Pradipto Tapadar', '', '', '9903492768', '', 1, '0000-00-00', 1, 'Nagerbazar', '', 0, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-04-04 16:22:30', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 16:22:30', '2026-04-04 16:23:07'),
(284, '', '', 4, 1, 'Ankita Poddar', '', '', '8820002105', '', 1, '0000-00-00', 1, 'Belgharia', '', 0, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-04-04 16:23:57', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 16:23:57', '2026-04-04 16:25:31'),
(285, '', '', 4, 1, 'Divyaanshi Jain', '', '', '7980567728', '', 1, '0000-00-00', 1, 'New Alipore', '', 0, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 21.00, '2026-04-04 16:34:25', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 16:34:25', '2026-04-04 16:35:11'),
(286, '', '', 4, 1, 'Shambhu Roy', '', '', '8420108606', '', 1, '0000-00-00', 1, 'Ramtala Ghoshpara', '', 592, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 430.00, '2026-04-04 16:36:05', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 16:36:05', '2026-04-04 16:36:57'),
(287, '', '', 4, 1, 'Abhishek Saraogi', '', '', '9007928333', '', 1, '0000-00-00', 1, 'Uniworld City', '', 595, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-04-04 16:37:30', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 16:37:30', '2026-04-04 16:38:12'),
(288, '', '', 4, 1, 'Swapna Saha', '', '', '9830657564', '', 1, '0000-00-00', 1, 'Desopriya park', '', 592, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 420.00, '2026-04-04 16:38:44', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 16:38:44', '2026-04-04 16:39:32'),
(289, '', '', 4, 1, 'Gopinath Agarwal', '', '', '8585008000', '', 1, '0000-00-00', 1, 'Bhawanipur', '', 595, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 18.00, '2026-04-04 16:40:06', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 16:40:06', '2026-04-04 16:40:49'),
(290, '', '', 4, 1, 'Shyam Narayan Yadav', '', '', '9433672006', '', 1, '0000-00-00', 1, 'Orisha', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-04-04 16:41:22', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 16:41:22', '2026-04-04 16:42:50'),
(291, '', '', 4, 1, 'Khushi singh', '', '', '9330320036', '', 1, '0000-00-00', 1, 'Shyamnagar Natural City', '', 0, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-04-04 16:43:39', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 16:43:39', '2026-04-04 16:44:22'),
(292, '', '', 4, 1, 'Soma Basu', '', '', '9831234259', '', 1, '0000-00-00', 1, 'Mumbai', '', 329, 12, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 25.00, '2026-04-04 16:44:49', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 16:44:49', '2026-04-04 16:45:45'),
(293, '', '', 4, 1, 'Gunjan Ray', '', '', '9304007518', '', 1, '0000-00-00', 1, 'Shivpur', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-04-04 16:46:19', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 16:46:19', '2026-04-04 16:46:42'),
(294, '', '', 4, 1, 'Madhurima Bose', '', '', '7894341223', '', 1, '0000-00-00', 1, 'Bhuwneshwar', '', 591, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-04-04 16:47:11', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 16:47:11', '2026-04-04 16:47:56'),
(295, '', '', 4, 1, 'Sunil Agarwal', '', '', '9731681076', '', 1, '0000-00-00', 1, 'Bangalore Myesur', '', 0, 0, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-04-04 16:48:33', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 16:48:33', '2026-04-04 16:49:05'),
(296, '', '', 4, 1, 'Ankit Singh', '', '', '8840004090', '', 1, '0000-00-00', 1, 'Nagerbazar', '', 595, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-04-04 16:49:57', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 16:49:57', '2026-04-04 16:50:35'),
(297, '', '', 4, 1, 'Priyanka Chabra', '', '', '8100306149', '', 1, '0000-00-00', 1, 'Salimar', '', 0, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-04-04 16:51:08', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 16:51:08', '2026-04-04 16:51:30'),
(298, '', '', 4, 1, 'Sreejeni Bhattacharya', '', '', '9163538753', '', 1, '0000-00-00', 1, '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 16.00, '2026-04-04 16:52:15', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 16:52:15', '2026-04-04 16:52:38'),
(299, '', '', 4, 1, 'Surabhi Kotriwal', '', '', '9836291555', '', 1, '0000-00-00', 1, 'Thane Mumbai', '', 329, 12, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 30.00, '2026-04-04 16:53:16', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 16:53:16', '2026-04-04 16:54:38'),
(300, '', '', 4, 1, 'Anjali ', '', '', '8860517857', '', 1, '0000-00-00', 1, 'Gaziabad Delhi', '', 116, 25, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-04-04 16:54:57', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 16:54:57', '2026-04-04 16:55:51'),
(301, '', '', 4, 1, 'Ravi Shaw', '', '', '9378071675', '', 1, '0000-00-00', 1, 'Nager bazar', '', 595, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 420.00, '2026-04-04 16:56:37', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 16:56:37', '2026-04-04 16:57:23'),
(302, '', '', 4, 1, 'Priyanka Ladha', '', '', '8100121300', '', 1, '0000-00-00', 1, 'Rishra Bagur Park', '', 0, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 450.00, '2026-04-04 16:57:58', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 16:57:58', '2026-04-04 16:59:36'),
(303, '', '', 4, 1, 'Madhumita Basu', '', '', '9874575046', '', 1, '0000-00-00', 1, 'Newtown DLF Height', '', 595, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 16.50, '2026-04-04 16:59:58', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 16:59:58', '2026-04-04 17:01:35'),
(304, '', '', 4, 1, 'Dipanjan Dasgupta', '', '', '8373077630', '', 1, '0000-00-00', 1, 'Dumdum', '', 595, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-04-04 17:02:37', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 17:02:37', '2026-04-04 17:03:14'),
(305, '', '', 4, 1, 'Kirti Parekh', '', '', '9820102975', '', 1, '0000-00-00', 1, 'Mumbai Lonavala', '', 329, 12, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-04-04 17:03:57', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 17:03:57', '2026-04-04 17:05:46'),
(306, '', '', 4, 1, 'Dipsikha Ghosh Dutta', '', '', '9550114602', '', 1, '0000-00-00', 1, 'Hyderabad uppal', '', 0, 0, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 25.00, '2026-04-04 17:06:26', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 17:06:26', '2026-04-04 17:07:50'),
(307, '', '', 4, 1, 'Sambhu Roy', '', '', '', '', 1, '0000-00-00', 1, '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-04-04 17:08:31', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 17:08:31', '2026-04-04 17:08:46'),
(308, '', '', 4, 1, 'Sayeda Famia Alam', '', '', '9330178997', '', 1, '0000-00-00', 1, 'Hyderabad', '', 0, 0, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 30.00, '2026-04-04 17:10:20', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 17:10:20', '2026-04-04 17:11:01'),
(309, '', '', 4, 1, 'Swastika Banerjee', '', '', '6291270660', '', 1, '0000-00-00', 1, 'Howrah Shivpur', '', 592, 24, 105, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-04-04 17:11:35', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 17:11:35', '2026-04-04 17:12:21'),
(310, '', '', 5, 1, 'Priyanka Chiney', 'Krishnakanta Chandra', '', '', '', 1, '1992-01-01', 2, '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-04-04 17:13:27', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-04 17:13:27', '2026-04-04 17:13:54'),
(311, '', '', 5, 1, 'Anjali Shaw', 'Nand Kishore Shaw', '', '8777284364', '', 2, '1989-06-25', 2, 'Room no. 461 Line no.18 Fort gloster B Block Bauria Howrah', '', 592, 24, 105, '711310', '363095704452', '1775560231.jpeg', '1775560236.jpeg', '', '', 'AZQ0594002', '1775560248.jpeg', '1775560252.jpeg', '1775560261.jpeg', '[\"1\"]', '', 5, '', '', '[\"1\"]', '[\"3\"]', '', 1, 0.00, '2026-04-07 16:27:19', 0, 2, 1, 2, '', '', '', '', '', '8th Passed', 0, 0, 5, 'HINDU', 'INDIAN', 'Husband, 2 Son', '', '', 1, 1, '2026-04-07 16:27:19', '2026-04-07 16:41:01'),
(312, '', '', 5, 1, 'Deepa Ray', 'Binod Ray', '', '8100123337', '', 3, '1992-09-19', 2, '462,B.M Road Champdani M, P.O Baidyabati Hooghly West Bengal ', '', 591, 24, 105, '712222', '851679016183', '1775635380.jpeg', '', '', '', '', '', '', '1775635385.jpeg', '[\"3\"]', '', 2, '', '', '[\"3\"]', '[\"1\",\"3\"]', '', 2, 0.00, '2026-04-08 13:22:58', 0, 2, 1, 2, '', '', '', '', '', '10th passed', 0, 0, 3, 'HINDU', 'INDIAN', 'Mother, Father, Brother, Son', '', '', 1, 1, '2026-04-08 13:22:58', '2026-04-08 13:33:05'),
(313, '', '', 5, 0, 'Manashi Gupta ', 'Rabindra Prasad Gupta', '', '7439695084', '7439619980', 1, '2000-09-13', 2, '50, Tripura ROY LANE SALKIA Haora corporation Salkia Haora West Bengal', '', 592, 24, 105, '711106', '766772042121', '1775647445.jpeg', '1775647450.jpeg', '', '', '', '', '', '1775647459.jpeg', '[\"2\",\"1\"]', '', 3, '', '', '[\"2\",\"1\"]', '[\"3\"]', '', 2, 0.00, '2026-04-08 16:44:48', 0, 2, 1, 2, '', '', '', '', '', '10th passed', 0, 0, 3, 'HINDU', 'INDIAN', 'Mother, Father', '', '', 0, 0, '2026-04-08 16:44:48', '2026-04-08 16:56:32'),
(314, '', '', 5, 0, 'Sabita Bar', 'Netai Bar', '', '9163023231', '', 2, '1979-01-01', 2, 'Part No.23 badu Road 7no.Rail Gate  Kadambagachi Barasat 1 North Twenty Four Parganas, West Bengal', '', 600, 24, 105, '700125', '317481300778', '1775722257.jpeg', '1775722266.jpeg', 'BFUPB5207G', '1775722278.jpeg', '', '', '', '1775722284.jpeg', '[\"1\",\"3\"]', '', 5, '', '', '[\"1\",\"3\"]', '[\"1\"]', '', 1, 0.00, '2026-04-08 18:43:36', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 5, 'HINDU', 'INDIAN', 'Husband, Son, Mother-in-law, Father-in-law.', '', '', 0, 1, '2026-04-08 18:43:36', '2026-04-09 13:46:16'),
(315, '', '', 5, 1, 'Kartick Dutta', 'Priti Lal Dutta', '', '7439539166', '', 1, '1993-11-16', 1, 'North Habra (M) Ward 5 Habra North 24 Parganas West Bengal', '', 600, 24, 105, '743263', '383513066342', '1775723784.jpeg', '1775723788.jpeg', 'GMNPD2520K', '1775723794.jpeg', '', '', '', '1775723797.jpeg', '[\"2\"]', '', 7, '', '', '[\"2\"]', '[\"1\",\"3\"]', '', 1, 0.00, '2026-04-09 13:49:23', 0, 0, 0, 0, '', '', '', '', '', '10th Passed', 0, 0, 5, 'HINDU', 'INDIAN', 'Mother, Father, Brother', '', '', 1, 1, '2026-04-09 13:49:23', '2026-04-09 14:39:46'),
(316, '', '', 5, 1, 'Vidya Kumari Rajbhar', 'Anup Kumar Rajbhar', '', '8479830417', '', 2, '1993-02-28', 2, 'No.0447 Fort gloster E Block Line No. 06 Uluberia Bauria Howrah ', '', 592, 24, 105, '711310', '598591143692', '1775724155.jpeg', '1775724160.jpeg', '', '', 'AZQ2161149', '1775724168.jpeg', '1775724172.jpeg', '1775724175.jpeg', '[\"3\"]', '', 3, '', '', '[\"3\"]', '[\"1\",\"3\"]', '', 1, 0.00, '2026-04-09 14:07:28', 0, 0, 0, 0, '', '', '', '', '', '7th passed', 0, 0, 5, 'HINDU', 'INDIAN', 'Husband, Son', '', '', 1, 1, '2026-04-09 14:07:28', '2026-04-14 11:50:06'),
(317, '', '', 5, 1, 'Avijit Paik', 'Bablu Paik', '', '6289985006', '', 2, '1998-01-18', 1, 'Bhajna South 24pgs West Bengal', '', 601, 24, 105, '743399', '901468037168', '1775741147.jpeg', '1775741157.jpeg', 'FFNPP5748P', '1775741166.jpeg', '', '1775741173.jpeg', '', '1775741178.jpeg', '[\"1\"]', '', 5, '', '', '[\"1\"]', '[\"1\",\"3\"]', '', 2, 0.00, '2026-04-09 18:44:43', 0, 0, 0, 0, '', '', '', '', '', '12th Passed', 0, 0, 3, 'HINDU', 'INDIAN', 'Father, Mother, Wife, ', '', '', 1, 1, '2026-04-09 18:44:43', '2026-04-09 18:56:18'),
(318, '', '', 5, 1, 'Monalisa Banerjee', 'Pijush Kanti Bose', '', '9674222311', '', 2, '1974-01-01', 2, '22/5/3 BRAJANTH LAHIRI LANE Haora Corporation Santragachi Haora West Bengal', '', 592, 24, 105, '711104', '273543988336', '1775802313.jpeg', '1775802317.jpeg', '', '', '', '', '', '1775803885.jpeg', '[\"2\"]', '', 5, '', '', '[\"2\"]', '[\"1\"]', '', 2, 0.00, '2026-04-10 11:43:01', 0, 2, 1, 2, '', '', '', '', '', 'GRADUATE', 0, 0, 1, 'HINDU', 'INDIAN', 'Husband, Daughter', '', '', 1, 1, '2026-04-10 11:43:01', '2026-04-10 12:21:25'),
(319, '', '', 5, 1, 'SARASWATI DULE', 'BISWAJIT DULE', '', '9477923489', '', 2, '1968-03-01', 2, 'FORT GLOSTER,BAURIA,HOWRAH.P.S - BAURIA,', '', 592, 24, 105, '711310', '6680 6153 11', '1775805374.jpeg', '', '', '', '', '', '', '1775805391.jpeg', '[\"5\",\"3\"]', '', 16, '', '', '[\"5\",\"3\"]', '[\"1\",\"3\"]', '', 1, 0.00, '2026-04-14 00:00:00', 0, 0, 0, 0, '', '', '', '', '', '6TH PASS', 1, 0, 5, 'HINDU', 'INDIAN', 'HUSBAND', '', '', 1, 1, '2026-04-10 12:38:27', '2026-04-10 12:54:47'),
(320, '', '', 5, 1, 'Kalpana Kar', 'Tapas Kar', '', '9064908844', '', 2, '1991-11-24', 2, '507/95, JESSORE ROAD, South Dum Dum(M), Motijheel, North 24 Parganas West Bengal', '', 600, 24, 105, '700074', '833180006767', '1775979982.jpeg', '1775979987.jpeg', '', '', 'IHM1200021', '1775979993.jpeg', '1775980000.jpeg', '1775980005.jpeg', '[\"3\"]', '', 7, '', '', '[\"3\"]', '[\"1\",\"3\"]', '', 1, 0.00, '2026-04-12 13:11:37', 0, 0, 0, 0, '', '', '', '', '', '10th passed', 0, 0, 5, 'HINDU', 'INDIAN', 'Husband, Son', '', '', 1, 1, '2026-04-12 13:11:37', '2026-04-12 13:20:57'),
(322, '', '', 5, 1, 'Santoshi  Hajra', 'Uday Hajra', '', '9564191380', '', 2, '1998-04-16', 2, 'SWARNAHATI, Sunuti Murshidabad  West Bengal', '', 598, 24, 105, '742401', '892573503017', '1775996448.jpeg', '1775996453.jpeg', '', '', '', '', '', '1775996457.jpeg', '[\"1\"]', '', 5, '', '', '[\"1\"]', '[\"1\"]', '', 1, 0.00, '2026-04-12 17:32:50', 0, 0, 0, 0, '', '', '', '', '', '2 passed', 0, 0, 5, 'HINDU', 'INDIAN', 'Mother,Father,Daughter,Son, Brother', '', '', 1, 1, '2026-04-12 17:32:50', '2026-04-12 17:50:57'),
(323, '', '', 5, 1, 'Siddheswar Mitra', 'Sukumar Mitra', '', '6295765732', '', 2, '1990-08-23', 1, 'Word no.21 D B RD NEAR OLD DURGA MANDIR AUROBINDA SARANI puruliya (M) West Bengal', '', 602, 24, 105, '723101', '753758768424', '1776081343.jpeg', '1776081352.jpeg', 'CFAPM7993D', '1776081363.jpeg', 'WIT1209618', '1776081371.jpeg', '1776081381.jpeg', '1776081392.jpeg', '[\"2\"]', '', 6, '', '', '[\"2\"]', '[\"1\"]', '', 1, 0.00, '2026-04-13 17:14:45', 0, 0, 0, 0, '', '', '', '', '', '10th Passed', 0, 0, 5, 'HINDU', 'INDIAN', 'Mother, Wife', '', '', 1, 1, '2026-04-13 17:14:45', '2026-04-13 17:29:10'),
(324, '', '', 5, 1, 'Mariyam nighat Parveen ', 'Samsher Ali', '', '+91 84790 ', '', 2, '1998-05-16', 2, 'Kankinara sankarpur North 24parganas', '', 600, 24, 105, '743126', '805659733327', '1776244033.jpg', '', '', '', '', '', '', '1776244051.jpg', '[\"4\"]', '', 5, '', '', '[\"4\"]', '[\"1\",\"3\"]', '', 1, 0.00, '2026-04-15 14:32:36', 0, 0, 0, 0, '', '', '', '', '', 'B.A Pass', 0, 0, 5, 'Muslim', 'Indian ', 'Husband', '', '', 1, 1, '2026-04-15 14:32:36', '2026-04-15 14:39:27'),
(325, '', '', 5, 1, 'Rupa Sarkar', 'Sanjay Sarkar', '', '8293692855', '', 2, '1986-12-25', 2, 'Haldipara Road, Haldipara Satpota , Nadia Haldipara West Bengal 741502', '', 599, 24, 105, '741502', '811388263030', '1776328227.jpeg', '1776328231.jpeg', '', '', '', '', '', '1776328237.jpeg', '[\"2\",\"1\"]', '', 5, '', '', '[\"2\",\"1\"]', '[\"1\"]', '', 1, 0.00, '2026-04-16 13:06:39', 0, 0, 0, 0, '', '', '', '', '', '8Th Passed', 0, 0, 5, 'HINDU', 'INDIAN', '2 Son, Husband, Mother in law', '', '', 1, 1, '2026-04-16 13:06:39', '2026-04-16 14:09:17'),
(326, '', '', 5, 1, 'Lachmi Mallick', 'Kailash Mallick', '', '7059924989', '', 2, '1985-01-01', 2, 'Fort Gloster Block c Room no. 120 Line no. 13 Howrah West Bengal', '', 592, 24, 105, '711310', '83285520608', '1776329300.jpeg', '', '', '', '', '', '', '1776329307.jpeg', '[\"5\"]', '', 6, '', '', '[\"5\"]', '[\"1\",\"3\"]', '', 1, 0.00, '2026-04-16 14:11:16', 0, 0, 0, 0, '', '', '', '', '', '4th passed', 0, 0, 5, 'HINDU', 'INDIAN', 'Daughter, Mother', '', '', 1, 1, '2026-04-16 14:11:16', '2026-04-16 14:20:37'),
(327, '', '', 5, 1, 'Bharati Kumari Shaw', 'Gopal Shaw', '', '6289080260', '', 1, '1997-03-06', 2, '38/5 Fakir Bagan Lane Haora Howrah West Bengal', '', 592, 24, 105, '711101', '44784493187', '1776330292.jpeg', '1776330296.jpeg', '', '', '', '', '', '1776330300.jpeg', '[\"2\",\"1\"]', '', 6, '', '', '[\"2\",\"1\"]', '[\"1\",\"3\"]', '', 1, 0.00, '2026-04-16 14:24:27', 0, 0, 0, 0, '', '', '', '', '', '12th passed', 0, 0, 5, 'HINDU', 'INDIAN', 'Sister', '', '', 1, 1, '2026-04-16 14:24:27', '2026-04-17 13:48:12'),
(328, '', '', 5, 1, 'Babita Kumari', 'Kailash Kahar', '', '6289463969', '', 1, '2000-01-01', 2, '414, A Rood, Haora  Conponation lSalkia, West Bengal 711106\n', '', 592, 24, 105, '711106', '817454713816', '1776330897.jpeg', '1776330901.jpeg', '', '', '', '', '', '1776330946.jpeg', '[\"3\"]', '', 4, '', '', '[\"3\"]', '[\"3\"]', '', 1, 0.00, '2026-04-16 14:39:39', 0, 0, 0, 0, '', '', '', '', '', '9th passed', 0, 0, 5, 'HINDU', 'INDIAN', 'Sister , Brother \n', '', '', 1, 1, '2026-04-16 14:39:39', '2026-04-16 14:50:57'),
(329, '', '', 5, 1, 'Deepti Pandit', 'Mohan Kumar Hella', '', '97485 4987', '', 2, '1986-01-01', 2, '19 Alipore Basti Alipore Kolkata West Bengal', '', 595, 24, 105, '700027', '768284062317', '1776334231.jpeg', '1776334239.jpeg', '', '', '', '', '', '1776334244.jpeg', '[\"3\"]', '', 4, '', '', '[\"3\"]', '[\"1\",\"3\"]', '', 2, 0.00, '2026-04-16 15:35:55', 0, 0, 0, 0, '', '', '', '', '', '8th Passed', 0, 0, 2, 'HINDU', 'INDIAN', 'Husband, 2 Son, Daughter', '', '', 1, 1, '2026-04-16 15:35:55', '2026-04-16 15:43:57'),
(330, '', '', 5, 1, 'Tumpa Paul', 'Gita Rani Paul', '', '8016141057', '', 2, '1999-08-15', 2, ' NOO06,Radhanagar Colony KOTWALL NADIA,741101 \n', '', 599, 24, 105, '741101', '634510700011', '1776339458.jpeg', '', '', '', '', '1776339475.jpeg', '1776339480.jpeg', '1776339487.jpeg', '[\"2\",\"1\"]', '', 5, '', '', '[\"2\",\"1\"]', '[\"1\"]', '', 1, 0.00, '2026-04-16 16:54:03', 0, 0, 0, 0, '', '', '', '', '', '6th passed', 0, 0, 5, 'HINDU', 'INDIAN', 'Two Son', '', '', 1, 1, '2026-04-16 16:54:03', '2026-04-16 17:08:07'),
(331, '', '', 5, 1, 'Priya Mondal', 'Chandi Mondal', '', '9732605345', '', 1, '1988-01-25', 2, 'Kotulpur Bankura Kotulpur West Bengal 722141', '', 587, 24, 105, '722141', '767081024471', '1776342721.jpeg', '1776342726.jpeg', '', '', '', '', '', '1776419685.jpeg', '[\"2\",\"1\",\"3\"]', '', 5, '', '', '[\"2\",\"1\",\"3\"]', '[\"1\",\"3\"]', '', 1, 0.00, '2026-04-16 17:53:54', 0, 0, 0, 0, '', '', '', '', '', '4th passed', 0, 0, 5, 'HINDU', 'INDIAN', 'Father, Brother', '', '', 1, 1, '2026-04-16 17:53:54', '2026-04-17 15:24:45'),
(332, '', '', 5, 1, 'Sabina Bibi', 'Abdul Rauf Laskar', '', '9330280412', '', 2, '1988-01-01', 2, 'Alampur Kamalpur Magrahat South 24 parganas 743609', '', 601, 24, 105, '743609', '856643690198', '1776412629.jpeg', '1776412635.jpeg', 'DIQPB9142B', '1776412678.jpeg', 'CGB2947810', '1776412655.jpeg', '1776412662.jpeg', '1776412669.jpeg', '[\"2\",\"1\"]', '', 3, '', '', '[\"2\",\"1\"]', '[\"1\",\"3\"]', '', 1, 0.00, '2026-04-17 13:12:23', 0, 0, 0, 0, '', '', '', '', '', '4th Passed', 0, 0, 5, 'HINDU', 'INDIAN', 'Husband, Daughter', '', '', 1, 1, '2026-04-17 13:12:23', '2026-04-17 13:29:13'),
(333, '', '', 5, 1, 'Rupa Pramanik', 'Biswanath Das', '', '8001784810', '', 2, '1980-01-01', 2, 'Chaulia Nakol Howrah West Bengal', '', 592, 24, 105, '711312', '942908756737', '1776413246.jpeg', '1776413250.jpeg', '', '', '', '', '', '1776413256.jpeg', '[\"2\",\"1\"]', '', 6, '', '', '[\"2\",\"1\"]', '[\"1\"]', '', 1, 0.00, '2026-04-17 13:31:42', 0, 0, 0, 0, '', '', '', '', '', '8TH Passed', 0, 0, 5, 'HINDU', 'INDIAN', 'Son, Daughter-in-law', '', '', 1, 1, '2026-04-17 13:31:42', '2026-04-17 13:40:11'),
(334, '', '', 5, 1, 'Vijayamma Pillai Ram', 'Baram Dev Ram', '', '9748211073', '', 2, '1973-06-12', 2, '51 Tiljala Road Tiljala South 24 Parganas West Bengal', '', 601, 24, 105, '700039', '881155959524', '1776414448.jpeg', '1776414454.jpeg', '', '', 'MFN3349792', '1776414463.jpeg', '1776414467.jpeg', '1779467023.jpg', '[\"1\"]', 'Delivery Boy', 4, '', '', '[\"1\"]', '[\"3\"]', '', 2, 0.00, '2026-04-17 13:52:33', 0, 0, 0, 0, '', '', '', '', '', '10th passed', 0, 0, 3, 'HINDU', 'INDIAN', 'Husband, Son', '', '1779469280_1.jpg,1779469280_2.jpg,1779469280_3.jpg', 1, 1, '2026-04-17 13:52:33', '2026-05-24 20:35:17'),
(335, '', '', 5, 1, 'Sani Mandi', 'Niranjan Mandi', '', '7810808034', '', 1, '2004-10-19', 2, 'Banmohara Pedda Monbazar 1 Purulia West Bengal', '', 602, 24, 105, '723131', '318412357669', '1776417695.jpeg', '1776417699.jpeg', '', '', '', '', '', '1776417706.jpeg', '[\"2\",\"1\"]', '', 3, '', '', '[\"2\",\"1\"]', '[\"1\"]', '', 1, 0.00, '2026-04-17 14:43:12', 0, 0, 0, 0, '', '', '', '', '', '10th passed', 0, 0, 5, 'HINDU', 'INDIAN', 'Father, Mother, Brother', '', '', 1, 1, '2026-04-17 14:43:12', '2026-04-17 14:53:59'),
(336, '', '', 5, 1, 'Shyamali Ghosh', 'Subal Ghosh ', '', '', '', 1, '1986-01-01', 2, 'Chatini Khoru', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-04-17 14:59:20', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-17 14:59:20', '2026-04-17 15:00:13'),
(337, '', '', 5, 1, 'Suman Tamang', 'Sudhanshu Tamang', '', '9604593819', '', 2, '1996-06-11', 2, 'Northmill OAO Block Radhanagar Howrah West Bengal', '', 592, 24, 105, '711310', '682770298694', '1776418995.jpeg', '1776419000.jpeg', 'CENPT0531C', '1776419008.jpeg', '', '', '', '1776419014.jpeg', '[\"3\"]', '', 3, '', '', '[\"3\"]', '[\"3\"]', '', 1, 0.00, '2026-04-17 15:05:18', 0, 0, 0, 0, '', '', '', '', '', '9th Passed', 0, 0, 5, 'HINDU', 'INDIAN', 'Husband', '', '', 1, 1, '2026-04-17 15:05:18', '2026-04-17 15:14:08'),
(338, '', '', 5, 1, 'Soma Ghosh', 'Biswanath Ghosh', '', '8240813032', '', 1, '1990-12-12', 2, '19/1 Kedar Bose Lane Bhawanipore Kolkata West Bengal', '', 595, 24, 105, '700025', '641316354827', '1776420507.jpeg', '1776420512.jpeg', '', '', '', '', '', '1776420518.jpeg', '[\"2\",\"1\"]', '', 2, '', '', '[\"2\",\"1\"]', '[\"1\"]', '', 2, 0.00, '2026-04-17 15:28:40', 0, 0, 0, 0, '', '', '', '', '', '10TH PASSED', 0, 0, 3, 'HINDU', 'INDIAN', 'Brother', '', '', 1, 1, '2026-04-17 15:28:40', '2026-04-17 15:39:49'),
(339, '', '', 5, 1, 'Suraj Show', 'Ram Kebal Show', '', '8336897380', '', 1, '1998-07-12', 2, 'Fort Gloster E Block Uluberia Bauria Howrah ', '', 592, 24, 105, '711310', '968153992824', '1776421600.jpeg', '1776421605.jpeg', '', '', 'AZ02156024', '1776421619.jpeg', '1776421625.jpeg', '1776421629.jpeg', '', '', 5, '', '', '', '[\"1\",\"3\"]', '', 1, 0.00, '2026-04-17 15:46:41', 0, 0, 0, 0, '', '', '', '', '', '10th Passed', 0, 0, 5, 'HINDU', 'INDIAN', 'Mother', '', '', 1, 1, '2026-04-17 15:46:41', '2026-04-17 15:58:59'),
(340, '', '', 5, 1, 'Avijit Das', 'Ruhit Das', '', '8100018159', '', 1, '1999-11-20', 1, 'Momanpur Ramkrishna Krishna Nagar Maheshtala 700139', '', 595, 24, 105, '700139', '484383826961', '1776422235.jpeg', '', '', '', '', '', '', '1776422241.jpeg', '[\"6\"]', '', 3, '', '', '[\"6\"]', '[\"1\"]', '', 2, 0.00, '2026-04-17 16:02:07', 0, 0, 0, 0, '', '', '', '', '', '10th passed', 0, 0, 4, 'HINDU', 'INDIAN', 'Mother', '', '', 1, 1, '2026-04-17 16:02:07', '2026-04-17 16:07:21'),
(341, '', '', 5, 1, 'Mantu Das', 'Kena Ram Das', '', '6289539326', '', 2, '1995-01-22', 2, 'Charkhara Barasat 1 Duttapukur Digha North 24 parganas', '', 600, 24, 105, '743248', '220921349972', '1776423298.jpeg', '', '', '', '', '', '', '1776423304.jpeg', '[\"2\",\"1\"]', '', 2, '', '', '[\"2\",\"1\"]', '[\"1\",\"3\"]', '', 1, 0.00, '2026-04-17 16:13:31', 0, 0, 0, 0, '', '', '', '', '', '6 th Passed', 0, 0, 5, 'HINDU', 'INDIAN', 'Father, Mother, Wife, Son, 2 Daughter', '', '', 1, 1, '2026-04-17 16:13:31', '2026-04-17 16:27:49'),
(342, '', '', 5, 1, 'Merila Marandi', 'Paulus Marandi', '', ' 95088 371', '', 1, '1997-01-01', 2, 'kauwadeb Arjunpur Sahebganj Jharkhand ', '', 215, 34, 105, '816104', '851427325771', '1776424137.jpeg', '1776424141.jpeg', '', '', '', '', '', '1776424146.jpeg', '[\"2\",\"1\"]', '', 6, '', '', '[\"2\",\"1\"]', '[\"1\",\"2\",\"3\"]', '', 1, 0.00, '2026-04-17 16:30:14', 0, 0, 0, 0, '', '', '', '', '', '10TH passed', 0, 0, 5, 'HINDU', 'INDIAN', 'NORMAL', '', '', 1, 1, '2026-04-17 16:30:14', '2026-04-17 16:47:03'),
(343, '', '', 5, 1, 'Pinki Agarwal', 'Rajendra Kumar Agarwal', '', '8777845203', '', 2, '1984-09-12', 2, 'Anand Kumar Roy Choudhury Lane Shivpur Howrah', '', 592, 24, 105, '711102', '626532499019', '1776425303.jpeg', '1776425309.jpeg', '', '', '', '', '', '1776425313.jpeg', '[\"2\",\"1\",\"3\"]', '', 3, '', '', '[\"2\",\"1\",\"3\"]', '[\"1\",\"3\"]', '', 2, 0.00, '2026-04-17 16:51:33', 0, 0, 0, 0, '', '', '', '', '', '8th Passed', 0, 0, 3, 'HINDU', 'INDIAN', 'Mother, Daughter', '', '', 1, 1, '2026-04-17 16:51:33', '2026-04-17 16:58:33'),
(344, '', '', 5, 1, 'Chhanda Sahoo', 'Madanmohan  Sahoo', '', '7318810028', '', 2, '1971-03-15', 2, 'Dandashira Soharda Paschim Medinipur West Bengal ', '', 597, 24, 105, '721131', '976813064637', '1776425869.jpeg', '', '', '', '', '', '', '1776425876.jpeg', '[\"2\",\"1\"]', '', 8, '', '', '[\"2\",\"1\"]', '[\"1\"]', '', 1, 0.00, '2026-04-17 17:01:00', 0, 0, 0, 0, '', '', '', '', '', '9th passed', 0, 0, 5, 'HINDU', 'INDIAN', 'Husband, Daughter', '', '', 1, 1, '2026-04-17 17:01:00', '2026-04-17 17:09:51'),
(345, '', '', 5, 1, 'Jhuma Roy', 'Bih', '', '', '', 1, '0000-00-00', 1, '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-04-17 17:24:27', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '', 1, 1, '2026-04-17 17:24:27', '2026-04-17 17:24:45'),
(346, '', '', 5, 1, 'Anuprabha Sahu', 'Kudei Nadigoan', '', '8767691928', '', 1, '1997-03-27', 2, 'VTC Raghunathpur Kudei Nadigaon Baleswar Odisha', '', 385, 17, 105, '756045', '633477624861', '1776428113.jpeg', '', '', '', '', '', '', '1776428118.jpeg', '[\"2\",\"1\",\"4\"]', '', 10, '', '', '[\"2\",\"1\",\"4\"]', '[\"3\"]', '', 1, 0.00, '2026-04-17 17:29:19', 0, 0, 0, 0, '', '', '', '', '', '10th Passed', 0, 0, 5, 'HINDU', 'INDIAN', 'Mother, Father', '', '', 1, 1, '2026-04-17 17:29:19', '2026-04-17 17:45:18'),
(347, '', '', 5, 1, 'Kalyani Sardar', 'Manaranjan Sardar', '', '9903987957', '', 1, '1994-01-01', 2, 'Paniara Haora West Bengal', '', 592, 24, 105, '711302', '507310129805', '1776428595.jpeg', '', '', '', 'NVZ1793850', '1776428603.jpeg', '1776428608.jpeg', '1776428615.jpeg', '[\"2\",\"1\"]', '', 3, '', '', '[\"2\",\"1\"]', '[\"1\"]', '', 1, 0.00, '2026-04-17 17:46:10', 0, 0, 0, 0, '', '', '', '', '', '2 passed', 0, 0, 5, 'HINDU', 'INDIAN', 'Husband', '', '', 1, 1, '2026-04-17 17:46:10', '2026-04-17 17:54:13'),
(348, '', '', 5, 1, 'Najima Sekh', 'Bari Sekh', '', '9734421533', '', 2, '1989-01-01', 2, 'Purba Para Kanthalberia South twenty Four parganas West Bengal', '', 601, 24, 105, '743329', '257501094972', '1776429534.jpeg', '', '', '', '', '', '', '1776429539.jpeg', '[\"1\"]', '', 10, '', '', '[\"1\"]', '[\"1\",\"3\"]', '', 1, 0.00, '2026-04-17 18:01:17', 0, 0, 0, 0, '', '', '', '', '', '4TH Passed', 0, 0, 5, 'Muslim', 'INDIAN', 'Husband, Son,Daughter', '', '', 1, 1, '2026-04-17 18:01:17', '2026-04-17 18:11:08'),
(349, '', '', 5, 1, 'Sumitra Dutta', 'Dhiren Dutta', '', '8918656866', '', 2, '1982-01-08', 2, 'Behind Joydurga Cinema,Guskara Bardhaman West Bengal', '', 588, 24, 105, '713128', '319307930241', '1776431033.jpeg', '', '', '', '', '', '', '1776431038.jpeg', '[\"2\",\"1\"]', '', 10, '', '', '[\"2\",\"1\"]', '[\"1\",\"3\"]', '', 1, 0.00, '2026-04-17 18:27:55', 0, 0, 0, 0, '', '', '', '', '', '10TH Passed', 0, 0, 5, 'HINDU', 'INDIAN', 'SON', '', '', 1, 1, '2026-04-17 18:27:55', '2026-04-17 18:33:58'),
(350, '', '', 4, 1, 'Ram Manna', '', '', '9858471452', '', 1, '0000-00-00', 1, 'Bauria; Paschim Para;', 'Chakkhasi', 595, 24, 105, '711310', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 1000.00, '2026-04-18 11:34:22', 0, 0, 0, 0, '', '', '', '', '', '', 1, 2, 0, '', '', '', '', '', 1, 1, '2026-04-18 11:34:22', '2026-04-18 11:35:35'),
(351, '', '', 5, 1, 'Lokkhir Maa', 'Lokhhir Baba', '', '9856985698', '', 3, '2004-02-18', 2, 'Naopala; Bagnana', 'Naopala; Bagnana', 592, 24, 105, '711303', '852741963456', '', '', '', '', '', '', '', '', '[\"2\",\"1\"]', '', 0, '', '', '[\"2\",\"1\"]', '[\"1\"]', '', 3, 10000.00, '2026-04-02 00:00:00', 1, 2, 2, 2, '', '', '', '', '', '', 1, 0, 2, 'Hindu', 'Indian', '', '', '', 1, 1, '2026-04-18 11:37:25', '2026-04-18 11:45:18');

-- --------------------------------------------------------

--
-- Table structure for table `user_type_master`
--

CREATE TABLE `user_type_master` (
  `user_type` tinyint(1) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_type_master`
--

INSERT INTO `user_type_master` (`user_type`, `name`) VALUES
(1, 'Admin'),
(2, 'Manager'),
(3, 'Employee'),
(4, 'Client'),
(5, 'Worker');

-- --------------------------------------------------------

--
-- Table structure for table `weekly_off`
--

CREATE TABLE `weekly_off` (
  `wf_id` tinyint(1) NOT NULL,
  `wf_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `weekly_off`
--

INSERT INTO `weekly_off` (`wf_id`, `wf_name`) VALUES
(1, 'Yes'),
(2, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `working_hour_master`
--

CREATE TABLE `working_hour_master` (
  `wh_id` int(11) NOT NULL,
  `wh_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `working_hour_master`
--

INSERT INTO `working_hour_master` (`wh_id`, `wh_name`) VALUES
(1, '6 HRS'),
(2, '8 HRS'),
(3, '10 HRS'),
(4, '12 HRS'),
(5, '24 HRS'),
(6, 'Out of Kolkata');

-- --------------------------------------------------------

--
-- Table structure for table `work_type`
--

CREATE TABLE `work_type` (
  `wt_id` int(11) NOT NULL,
  `type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `work_type`
--

INSERT INTO `work_type` (`wt_id`, `type_name`) VALUES
(1, 'Housemaid'),
(2, 'Cook'),
(3, 'Nanny'),
(4, 'Patient care'),
(5, 'Japa'),
(6, 'Pet care'),
(7, 'Elder care'),
(8, 'Gardener'),
(9, 'Driver'),
(10, 'Housekeeper');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_maid`
--
ALTER TABLE `assign_maid`
  ADD PRIMARY KEY (`assign_id`);

--
-- Indexes for table `attendance_register`
--
ALTER TABLE `attendance_register`
  ADD PRIMARY KEY (`atten_id`);

--
-- Indexes for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `bill_details`
--
ALTER TABLE `bill_details`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `bill_payment_details`
--
ALTER TABLE `bill_payment_details`
  ADD PRIMARY KEY (`bpd_id`);

--
-- Indexes for table `bill_status_master`
--
ALTER TABLE `bill_status_master`
  ADD PRIMARY KEY (`bs_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crime_history`
--
ALTER TABLE `crime_history`
  ADD PRIMARY KEY (`ch_id`);

--
-- Indexes for table `cstomer_review`
--
ALTER TABLE `cstomer_review`
  ADD PRIMARY KEY (`cr_id`);

--
-- Indexes for table `gender_master`
--
ALTER TABLE `gender_master`
  ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `illness_master`
--
ALTER TABLE `illness_master`
  ADD PRIMARY KEY (`il_id`);

--
-- Indexes for table `language_master`
--
ALTER TABLE `language_master`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `lead_confirm_master`
--
ALTER TABLE `lead_confirm_master`
  ADD PRIMARY KEY (`lc_id`);

--
-- Indexes for table `leave_request`
--
ALTER TABLE `leave_request`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `leave_stat_master`
--
ALTER TABLE `leave_stat_master`
  ADD PRIMARY KEY (`lsm_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `marital_status_master`
--
ALTER TABLE `marital_status_master`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `nurses_master`
--
ALTER TABLE `nurses_master`
  ADD PRIMARY KEY (`nr_id`);

--
-- Indexes for table `police_verification`
--
ALTER TABLE `police_verification`
  ADD PRIMARY KEY (`pv_id`);

--
-- Indexes for table `quote_request`
--
ALTER TABLE `quote_request`
  ADD PRIMARY KEY (`quote_id`);

--
-- Indexes for table `service_manager`
--
ALTER TABLE `service_manager`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `skills_master`
--
ALTER TABLE `skills_master`
  ADD PRIMARY KEY (`sk_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stay_type`
--
ALTER TABLE `stay_type`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_type_master`
--
ALTER TABLE `user_type_master`
  ADD PRIMARY KEY (`user_type`);

--
-- Indexes for table `weekly_off`
--
ALTER TABLE `weekly_off`
  ADD PRIMARY KEY (`wf_id`);

--
-- Indexes for table `working_hour_master`
--
ALTER TABLE `working_hour_master`
  ADD PRIMARY KEY (`wh_id`);

--
-- Indexes for table `work_type`
--
ALTER TABLE `work_type`
  ADD PRIMARY KEY (`wt_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign_maid`
--
ALTER TABLE `assign_maid`
  MODIFY `assign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `attendance_register`
--
ALTER TABLE `attendance_register`
  MODIFY `atten_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `bank_details`
--
ALTER TABLE `bank_details`
  MODIFY `bank_id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bill_details`
--
ALTER TABLE `bill_details`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bill_payment_details`
--
ALTER TABLE `bill_payment_details`
  MODIFY `bpd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bill_status_master`
--
ALTER TABLE `bill_status_master`
  MODIFY `bs_id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=604;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `crime_history`
--
ALTER TABLE `crime_history`
  MODIFY `ch_id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cstomer_review`
--
ALTER TABLE `cstomer_review`
  MODIFY `cr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gender_master`
--
ALTER TABLE `gender_master`
  MODIFY `g_id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `illness_master`
--
ALTER TABLE `illness_master`
  MODIFY `il_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `language_master`
--
ALTER TABLE `language_master`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lead_confirm_master`
--
ALTER TABLE `lead_confirm_master`
  MODIFY `lc_id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leave_request`
--
ALTER TABLE `leave_request`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `leave_stat_master`
--
ALTER TABLE `leave_stat_master`
  MODIFY `lsm_id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `marital_status_master`
--
ALTER TABLE `marital_status_master`
  MODIFY `m_id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nurses_master`
--
ALTER TABLE `nurses_master`
  MODIFY `nr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `police_verification`
--
ALTER TABLE `police_verification`
  MODIFY `pv_id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quote_request`
--
ALTER TABLE `quote_request`
  MODIFY `quote_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service_manager`
--
ALTER TABLE `service_manager`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `skills_master`
--
ALTER TABLE `skills_master`
  MODIFY `sk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `stay_type`
--
ALTER TABLE `stay_type`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=352;

--
-- AUTO_INCREMENT for table `user_type_master`
--
ALTER TABLE `user_type_master`
  MODIFY `user_type` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `weekly_off`
--
ALTER TABLE `weekly_off`
  MODIFY `wf_id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `working_hour_master`
--
ALTER TABLE `working_hour_master`
  MODIFY `wh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `work_type`
--
ALTER TABLE `work_type`
  MODIFY `wt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
