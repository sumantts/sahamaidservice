-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2026 at 08:07 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sahaserv_sahamaidservice`
--

-- --------------------------------------------------------

--
-- Table structure for table `schedule_log`
--

CREATE TABLE `schedule_log` (
  `log_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_mobile` varchar(10) NOT NULL,
  `area_location_id` int(11) NOT NULL,
  `area_location_name` varchar(255) NOT NULL,
  `building_id` int(11) NOT NULL,
  `building_name` varchar(255) NOT NULL,
  `service_id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_rate_per_hour` decimal(10,2) NOT NULL,
  `booking_date` date NOT NULL,
  `from_time` time NOT NULL,
  `to_time` time NOT NULL,
  `total_hours` int(2) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `cgst_percent` int(2) NOT NULL,
  `cgst_amount` decimal(10,2) NOT NULL,
  `sgst_percent` int(2) NOT NULL,
  `sgst_amount` decimal(10,2) NOT NULL,
  `total_amount_with_tax` decimal(10,2) NOT NULL,
  `amount_paid` decimal(10,2) NOT NULL,
  `amount_due` decimal(10,2) NOT NULL,
  `worker_id` int(11) NOT NULL,
  `worker_name` varchar(255) NOT NULL,
  `worker_mobile` varchar(10) NOT NULL,
  `order_status` tinyint(1) NOT NULL,
  `order_placed_date` date NOT NULL,
  `order_placed_time` time NOT NULL,
  `order_placed_by` int(11) NOT NULL,
  `order_placed_by_name` varchar(255) NOT NULL,
  `order_channel_name` varchar(10) NOT NULL,
  `payment_history` text NOT NULL,
  `order_status_history` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule_log`
--

INSERT INTO `schedule_log` (`log_id`, `client_id`, `client_name`, `client_mobile`, `area_location_id`, `area_location_name`, `building_id`, `building_name`, `service_id`, `service_name`, `service_rate_per_hour`, `booking_date`, `from_time`, `to_time`, `total_hours`, `total_amount`, `cgst_percent`, `cgst_amount`, `sgst_percent`, `sgst_amount`, `total_amount_with_tax`, `amount_paid`, `amount_due`, `worker_id`, `worker_name`, `worker_mobile`, `order_status`, `order_placed_date`, `order_placed_time`, `order_placed_by`, `order_placed_by_name`, `order_channel_name`, `payment_history`, `order_status_history`) VALUES
(1, 1, 'suman', '9733935161', 1, 'Saltlake sector V', 1, 'GlobSyn', 1, 'Car Wash', 10.00, '2026-10-06', '10:30:31', '11:30:31', 1, 10.00, 9, 0.90, 9, 0.90, 2.00, 1.00, 1.00, 1, 'Santu', '9855654712', 1, '2026-10-06', '00:00:00', 1, 'sabbir', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `schedule_log`
--
ALTER TABLE `schedule_log`
  ADD PRIMARY KEY (`log_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `schedule_log`
--
ALTER TABLE `schedule_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
