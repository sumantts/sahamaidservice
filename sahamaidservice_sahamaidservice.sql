-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 15, 2023 at 10:59 PM
-- Server version: 5.7.42
-- PHP Version: 8.1.16

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
-- Table structure for table `cstomer_review`
--

CREATE TABLE `cstomer_review` (
  `cr_id` int(11) NOT NULL,
  `review_detail` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `published` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `profile_name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `profile_name`, `username`, `password`) VALUES
(1, 'Mr. Kundan Saha', 'saha', 'saha123!@#');

-- --------------------------------------------------------

--
-- Table structure for table `quote_request`
--

CREATE TABLE `quote_request` (
  `quote_id` int(11) NOT NULL,
  `quote_details` longtext NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `read_unread` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quote_request`
--

INSERT INTO `quote_request` (`quote_id`, `quote_details`, `created_on`, `read_unread`) VALUES
(1, '{\"name\":\"Souvick Biswas\",\"phone_number\":\"9432953523\",\"email\":\"\",\"address\":\"Dddd\",\"message\":\"Ddddhhhh\"}', '2023-06-16 16:54:43', '0');

-- --------------------------------------------------------

--
-- Table structure for table `service_manager`
--

CREATE TABLE `service_manager` (
  `service_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_manager`
--

INSERT INTO `service_manager` (`service_id`, `name`, `description`, `created_on`, `updated_on`) VALUES
(6, 'All types of man power supply', 'We have all types of employess (Skilled, Unskilled & Semiskilled). We supply man power for Driver Services, Contract Labour Supplier Services, Plumbing Contractors, Industrial Manpower Services, Staffing Service, and Labour Consultants.', '2023-04-05 09:59:59', '2023-04-05 09:59:59'),
(7, 'House keeping in office & Commercial Place', 'Housekeeping refers to day-to-day cleanliness, tidiness and good order in all parts of the office. Good housekeeping provides a clean and pleasant working environment. It also helps prevent accidents in the workplace and aids the efficient operation of the office.', '2023-04-05 10:14:21', '2023-04-05 10:14:21'),
(10, 'All Types of Maid', 'Basic House Cleaning, Deep/Spring Cleaning, Green Cleaning Services, Ceiling and Wall Cleaning, Curtain Cleaning, Carpet and Upholstery Maid Services, Blind and Chimney Cleaning, Pressure Washing', '2023-04-05 20:23:32', '2023-04-05 20:52:07'),
(11, 'Pet Care', 'We provide best quality of pet care', '2023-06-16 17:01:25', '2023-06-16 17:01:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cstomer_review`
--
ALTER TABLE `cstomer_review`
  ADD PRIMARY KEY (`cr_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cstomer_review`
--
ALTER TABLE `cstomer_review`
  MODIFY `cr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quote_request`
--
ALTER TABLE `quote_request`
  MODIFY `quote_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service_manager`
--
ALTER TABLE `service_manager`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
