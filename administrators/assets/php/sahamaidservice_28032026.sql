-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2026 at 05:27 PM
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
(1, 3, '2026-03', '[{\"slno\":1,\"atten_date\":\"01-03-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"Come on time\"},{\"slno\":2,\"atten_date\":\"02-03-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"10 minutes late\"},{\"slno\":3,\"atten_date\":\"03-03-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":4,\"atten_date\":\"04-03-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":5,\"atten_date\":\"05-03-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"30 minutes late\"},{\"slno\":6,\"atten_date\":\"06-03-2026\",\"pre_abs_lev\":\"2\",\"atten_note\":\"Went for party\"},{\"slno\":7,\"atten_date\":\"07-03-2026\",\"pre_abs_lev\":\"3\",\"atten_note\":\"Ostomongola bar\"},{\"slno\":8,\"atten_date\":\"08-03-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":9,\"atten_date\":\"09-03-2026\",\"pre_abs_lev\":\"1\",\"atten_note\":\"\"},{\"slno\":10,\"atten_date\":\"10-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":11,\"atten_date\":\"11-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":12,\"atten_date\":\"12-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":13,\"atten_date\":\"13-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":14,\"atten_date\":\"14-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":15,\"atten_date\":\"15-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":16,\"atten_date\":\"16-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":17,\"atten_date\":\"17-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":18,\"atten_date\":\"18-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":19,\"atten_date\":\"19-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":20,\"atten_date\":\"20-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":21,\"atten_date\":\"21-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":22,\"atten_date\":\"22-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":23,\"atten_date\":\"23-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":24,\"atten_date\":\"24-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":25,\"atten_date\":\"25-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":26,\"atten_date\":\"26-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":27,\"atten_date\":\"27-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":28,\"atten_date\":\"28-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":29,\"atten_date\":\"29-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":30,\"atten_date\":\"30-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":31,\"atten_date\":\"31-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"}]'),
(2, 2, '2026-03', '[{\"slno\":1,\"atten_date\":\"01-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":2,\"atten_date\":\"02-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":3,\"atten_date\":\"03-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":4,\"atten_date\":\"04-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":5,\"atten_date\":\"05-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":6,\"atten_date\":\"06-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":7,\"atten_date\":\"07-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":8,\"atten_date\":\"08-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":9,\"atten_date\":\"09-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":10,\"atten_date\":\"10-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":11,\"atten_date\":\"11-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":12,\"atten_date\":\"12-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":13,\"atten_date\":\"13-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":14,\"atten_date\":\"14-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":15,\"atten_date\":\"15-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":16,\"atten_date\":\"16-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":17,\"atten_date\":\"17-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":18,\"atten_date\":\"18-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":19,\"atten_date\":\"19-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":20,\"atten_date\":\"20-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":21,\"atten_date\":\"21-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":22,\"atten_date\":\"22-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":23,\"atten_date\":\"23-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":24,\"atten_date\":\"24-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":25,\"atten_date\":\"25-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":26,\"atten_date\":\"26-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":27,\"atten_date\":\"27-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":28,\"atten_date\":\"28-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":29,\"atten_date\":\"29-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":30,\"atten_date\":\"30-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"},{\"slno\":31,\"atten_date\":\"31-03-2026\",\"pre_abs_lev\":\"\",\"atten_note\":\"\"}]');

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
  `id` int(5) NOT NULL,
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
  `updated_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `services_photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_manager`
--

INSERT INTO `service_manager` (`service_id`, `name`, `description`, `created_on`, `updated_on`, `services_photo`) VALUES
(6, 'All types of man power supply', 'We have all types of employess (Skilled, Unskilled & Semiskilled). We supply man power for Driver Services, Contract Labour Supplier Services, Plumbing Contractors, Industrial Manpower Services, Staffing Service, and Labour Consultants.', '2023-04-05 09:59:59', '2023-04-05 09:59:59', ''),
(7, 'House keeping in office & Commercial Place', 'Housekeeping refers to day-to-day cleanliness, tidiness and good order in all parts of the office. Good housekeeping provides a clean and pleasant working environment. It also helps prevent accidents in the workplace and aids the efficient operation of the office.', '2023-04-05 10:14:21', '2023-04-05 10:14:21', ''),
(10, 'All Types of Maid', 'Basic House Cleaning, Deep/Spring Cleaning, Green Cleaning Services, Ceiling and Wall Cleaning, Curtain Cleaning, Carpet and Upholstery Maid Services, Blind and Chimney Cleaning, Pressure Washing', '2023-04-05 20:23:32', '2023-04-05 20:52:07', '');
INSERT INTO `service_manager` (`service_id`, `name`, `description`, `created_on`, `updated_on`, `services_photo`) VALUES
(11, 'Pet Care', 'We provide best quality of pet care', '2023-06-16 17:01:25', '2026-03-21 17:21:51', 'data:image/png;base64,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');

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
  `work_exp` int(2) NOT NULL DEFAULT 0,
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
  `lc_id` tinyint(1) NOT NULL DEFAULT 0,
  `wh_id` int(11) NOT NULL COMMENT 'PK of working_hour_master',
  `religion` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `family_bg_info` text NOT NULL,
  `nr_id` text NOT NULL COMMENT 'PK of nurses_master',
  `inserted_by` int(11) NOT NULL DEFAULT 0,
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `insert_date` datetime NOT NULL DEFAULT current_timestamp(),
  `update_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `username`, `password`, `user_type`, `added_by`, `full_name`, `fat_hus_name`, `email_id`, `phone_number`, `alt_phone_number`, `m_id`, `date_of_birth`, `gender`, `address`, `curr_address`, `city_id`, `state_id`, `country_id`, `pincode`, `adhar_card`, `adhar_card_img`, `adhar_card_back_img`, `pan_card`, `pan_card_img`, `voter_id_card`, `voter_id_card_img`, `voter_id_card_back_img`, `user_photo`, `wt_id`, `work_exp`, `earlier_work_city`, `last_emplr_name`, `sk_id`, `l_id`, `work_loc`, `st_id`, `exp_salary`, `available_from`, `wf_id`, `il_id`, `pv_id`, `ch_id`, `emg_cont_person`, `relation`, `emg_cont_number`, `bank_details`, `bank_details_img`, `highest_edu`, `declaration`, `lc_id`, `wh_id`, `religion`, `nationality`, `family_bg_info`, `nr_id`, `inserted_by`, `updated_by`, `insert_date`, `update_date`) VALUES
(1, 'superadmin@sahaservices.in', '12345678', 1, 0, 'Super Admin', '', 'superadmin@sahaservices.in', '9733935161', '9733935162', 1, '1987-10-01', 1, 'Village: Bhuarag; PO: Agunshi', '', 0, 0, 0, '711303', '999955553333', '', '', 'BCCPJ9833J', '', 'HRC212', '', '', '', '', 0, '', '', '0', '0', '', 0, 0.00, '2026-03-03 00:00:00', 0, 0, 0, 0, '', '', '', 'A/c: 32953529067', '', 'Graduate', 0, 0, 0, '', '', '', '', 0, 1, '2026-03-02 22:36:01', '2026-03-28 09:13:30'),
(2, 'manager@sahaservices.in', '12345678', 2, 1, 'Manager Admin', '', 'manager@sahaservices.in', '9733935162', '', 1, '1988-03-01', 1, 'Village: Natibpur', '', 0, 0, 0, '711304', '951847632145', '', '', 'BHHYI8966L', '', 'HRC2123', '', '', '', '', 0, '', '', '0', '0', '', 0, 0.00, '2026-03-03 00:00:00', 0, 0, 0, 0, '', '', '', 'A/c: 6985321020', '', 'Higher Secondary', 0, 0, 0, '', '', '', '', 1, 0, '2026-03-02 22:40:30', '2026-03-28 09:13:30'),
(3, 'employee@sahaservices.in', '12345678', 3, 1, 'Employee', '', 'employee@sahaservices.in', '9733935163', '', 1, '1997-03-01', 1, 'Village: Chakashi', '', 0, 0, 0, '711305', '951847632146', '', '', 'BCCPJ9833P', '', 'HRC2126', '', '', '', '', 0, '', '', '0', '0', '', 0, 0.00, '2026-03-03 00:00:00', 0, 0, 0, 0, '', '', '', 'A/c: 568923124578', '', 'Higher secondary', 0, 0, 0, '', '', '', '', 1, 0, '2026-03-02 22:48:40', '2026-03-28 09:13:30'),
(4, 'client@sahaservices.in', '12345678', 4, 1, 'Client No1', '', 'client@sahaservices.in', '9733935164', '', 1, '1990-03-15', 1, 'Village: Gongaram pur', '', 0, 0, 0, '711306', '951845632146', '', '', 'BCCKJ9833J', '', 'HRC2124', '', '', '', '', 0, '', '', '0', '0', '', 0, 0.00, '2026-03-03 00:00:00', 0, 0, 0, 0, '', '', '', 'A/c No: 7456321025', '', 'Madhyamick', 0, 1, 0, '', '', '', '', 1, 1, '2026-03-02 22:59:06', '2026-03-28 09:13:30'),
(5, 'worker@sahaservices.in', '12345678', 5, 1, 'Worker No1', 'PersonalHusband', 'worker@sahaservices.in', '9733935165', '', 1, '1990-04-15', 2, 'Village: Gongaram pur', '', 0, 0, 0, '711307', '951845632148', '1774712715.jpg', '1774712718.jpg', 'ACCKJ9833J', '1774712722.jpg', 'HRU2124', '1774712726.jpg', '1774712730.jpg', '1774712736.jpg', '[\"2\",\"1\",\"3\",\"6\"]', 2, '', '', '[\"1\",\"3\",\"6\"]', '[\"1\",\"2\",\"3\"]', 'Bauria', 3, 0.00, '2026-03-03 00:00:00', 0, 2, 2, 2, '', '', '', 'A/c No: 7455321025', '', 'B.Tech', 0, 2, 5, 'Hindu', 'Indian', 'Maa Baba ', '[\"6\",\"5\"]', 1, 1, '2026-03-02 23:00:33', '2026-03-28 21:25:01'),
(12, '', '', 1, 1, 'Cammet Biswash', 'Baba', '', '9874563201', '5896589658', 2, '1990-06-06', 1, 'bauria paschim para', 'bauria paschim para', 0, 0, 0, '711303', '987654120254', '', '', 'BCCPJ9822J', '', 'HRC12345', '', '', '', '', 0, '', '', '0', '0', '', 0, 0.00, '2026-03-05 00:00:00', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', 1, 1, '2026-03-05 22:53:47', '2026-03-28 09:13:30'),
(13, '', '', 1, 1, 'new admin', 'FatherBaba', '', '', '9874563201', 0, '2026-02-05', 1, 'kolkata', 'kolkata', 0, 0, 0, '598878', '852369874125', '', '', 'PAN256985', '', 'ASDR12345', '', '', '', '', 1, '2', '3', '3', '1', 'kolkatakulgachi', 1, 0.00, '2026-03-05 00:00:00', 0, 2, 1, 1, 'suman jana', 'rail', '0973393516', 'Boroda bank', '', '', 0, 0, 0, '', '', '', '', 1, 1, '2026-03-05 23:07:56', '2026-03-28 09:13:30'),
(26, '123suman@gmail.co.in', '12345678', 1, 1, 'new admin1', 'FatherBaba2', '123suman@gmail.co.in', '9855654123', '9856325412', 3, '2026-03-10', 2, 'permanent address', 'current address', 592, 24, 105, '711303', '852369874199', '1773331157.png', '1773849918.png', 'PAN2569899', '1773333169.png', 'ASDR123499', '1773333181.png', '1773849730.png', '1773333185.jpg', '', 99, 'Hyadrabad', 'Bablu', '[\"3\",\"2\",\"1\",\"5\",\"6\",\"4\"]', '[\"1\",\"2\",\"3\"]', 'Bauria Chaksahi', 3, 12000.00, '2026-03-01 00:00:00', 1, 2, 2, 2, 'Modon Mitra', 'Friend', '0082820082', 'Boroda bank ltd. okok', '1773333205.png', 'HS Graduate', 1, 0, 0, '', '', '', '', 1, 1, '2026-03-10 23:11:44', '2026-03-28 09:13:30'),
(27, '', '', 1, 1, '', '', '', '', '', 1, '2026-03-10', 1, '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0.00, '2026-03-10 00:00:00', 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', 1, 0, '2026-03-10 23:16:41', '2026-03-28 09:13:30');

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
(7, 'Elder care');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance_register`
--
ALTER TABLE `attendance_register`
  ADD PRIMARY KEY (`atten_id`);

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
-- AUTO_INCREMENT for table `attendance_register`
--
ALTER TABLE `attendance_register`
  MODIFY `atten_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=604;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

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
  MODIFY `quote_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
  MODIFY `wt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
