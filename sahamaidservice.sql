-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2026 at 06:31 PM
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
(2, '{\"name\":\"Suman Biswas\",\"phone_number\":\"9733935161\",\"email\":\"\",\"address\":\"Kolkaa\",\"message\":\"send me a main quote\"}', '2026-03-01 14:01:02', '0');

-- --------------------------------------------------------

--
-- Table structure for table `service_manager`
--

CREATE TABLE `service_manager` (
  `service_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_manager`
--

INSERT INTO `service_manager` (`service_id`, `name`, `description`, `created_on`, `updated_on`) VALUES
(6, 'All types of man power supply', 'We have all types of employess (Skilled, Unskilled & Semiskilled). We supply man power for Driver Services, Contract Labour Supplier Services, Plumbing Contractors, Industrial Manpower Services, Staffing Service, and Labour Consultants.', '2023-04-05 09:59:59', '2023-04-05 09:59:59'),
(7, 'House keeping in office & Commercial Place', 'Housekeeping refers to day-to-day cleanliness, tidiness and good order in all parts of the office. Good housekeeping provides a clean and pleasant working environment. It also helps prevent accidents in the workplace and aids the efficient operation of the office.', '2023-04-05 10:14:21', '2023-04-05 10:14:21'),
(10, 'All Types of Maid', 'Basic House Cleaning, Deep/Spring Cleaning, Green Cleaning Services, Ceiling and Wall Cleaning, Curtain Cleaning, Carpet and Upholstery Maid Services, Blind and Chimney Cleaning, Pressure Washing', '2023-04-05 20:23:32', '2023-04-05 20:52:07'),
(11, 'Pet Care', 'We provide best quality of pet care', '2023-06-16 17:01:25', '2023-06-16 17:01:25');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` tinyint(1) NOT NULL COMMENT '1=Admin(owner) 2=Manager 3=Employee 4=Client 5=Worker',
  `added_by` int(11) NOT NULL DEFAULT 0,
  `full_name` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` text NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `adhar_card` varchar(12) NOT NULL,
  `adhar_card_img` varchar(255) NOT NULL,
  `pan_card` varchar(10) NOT NULL,
  `pan_card_img` varchar(255) NOT NULL,
  `voter_id_card` varchar(10) NOT NULL,
  `voter_id_card_img` varchar(255) NOT NULL,
  `bank_details` text NOT NULL,
  `bank_details_img` varchar(255) NOT NULL,
  `highest_edu` varchar(255) NOT NULL,
  `inserted_by` int(11) NOT NULL DEFAULT 0,
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `insert_date` datetime NOT NULL DEFAULT current_timestamp(),
  `update_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `username`, `password`, `user_type`, `added_by`, `full_name`, `email_id`, `phone_number`, `date_of_birth`, `address`, `pincode`, `adhar_card`, `adhar_card_img`, `pan_card`, `pan_card_img`, `voter_id_card`, `voter_id_card_img`, `bank_details`, `bank_details_img`, `highest_edu`, `inserted_by`, `updated_by`, `insert_date`, `update_date`) VALUES
(1, 'superadmin@sahaservices.in', '12345678', 1, 0, 'Super Admin', 'superadmin@sahaservices.in', '9733935161', '1987-10-01', 'Village: Bhuarag; PO: Agunshi', '711303', '999955553333', '', 'BCCPJ9833J', '', 'HRC212', '', 'A/c: 32953529067', '', 'Graduate', 0, 0, '2026-03-02 22:36:01', '2026-03-02 22:36:01'),
(2, 'manager@sahaservices.in', '12345678', 2, 1, 'Manager Admin', 'manager@sahaservices.in', '9733935162', '1988-03-01', 'Village: Natibpur', '711304', '951847632145', '', 'BHHYI8966L', '', 'HRC2123', '', 'A/c: 6985321020', '', 'Higher Secondary', 1, 0, '2026-03-02 22:40:30', '2026-03-02 22:40:30'),
(3, 'employee@sahaservices.in', '12345678', 3, 1, 'Employee', 'employee@sahaservices.in', '9733935163', '1997-03-01', 'Village: Chakashi', '711305', '951847632146', '', 'BCCPJ9833P', '', 'HRC2126', '', 'A/c: 568923124578', '', 'Higher secondary', 1, 0, '2026-03-02 22:48:40', '2026-03-02 22:48:40'),
(4, 'client@sahaservices.in', '12345678', 4, 1, 'Client No1', 'client@sahaservices.in', '9733935164', '1990-03-15', 'Village: Gongaram pur', '711306', '951845632146', '', 'BCCKJ9833J', '', 'HRC2124', '', 'A/c No: 7456321025', '', 'Madhyamick', 1, 0, '2026-03-02 22:59:06', '2026-03-02 22:59:06'),
(5, 'worker@sahaservices.in', '12345678', 5, 1, 'Worker No1', 'worker@sahaservices.in', '9733935165', '1990-04-15', 'Village: Gongaram pur', '711307', '951845632148', '', 'ACCKJ9833J', '', 'HRU2124', '', 'A/c No: 7455321025', '', 'B.Tech', 1, 0, '2026-03-02 23:00:33', '2026-03-02 23:00:33');

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
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`);

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
  MODIFY `quote_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service_manager`
--
ALTER TABLE `service_manager`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
