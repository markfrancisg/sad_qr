-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2024 at 05:06 PM
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
-- Database: `sad_seqrity`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_id` int(10) NOT NULL COMMENT 'This is the primary key for accounts.',
  `account_email` varchar(255) NOT NULL COMMENT 'Emails will be used as login credentials.',
  `password` varchar(255) NOT NULL COMMENT 'This will store the hashed passwords of the accounts.',
  `updated_at` datetime DEFAULT NULL COMMENT 'This will show when the accounts are updated.',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'This will show when the accounts are created.',
  `role_id` int(10) NOT NULL COMMENT 'This will show the type of the account.',
  `token` varchar(255) NOT NULL COMMENT 'This will store reset password token.',
  `token_expiration` datetime DEFAULT NULL,
  `verification_status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `account_email`, `password`, `updated_at`, `created_at`, `role_id`, `token`, `token_expiration`, `verification_status`) VALUES
(35, 'gorreonfrancis@gmail.com', '$2y$12$wEvdxonAvxcFzb8dYNPl6uHXLBh3FlTD6QqSYnacEOqxRFNiCknwe', NULL, '2024-04-11 01:20:11', 7, 'dbfcb8d1d07b06bda836d70a3221f5a7', '2024-06-10 09:35:53', 1),
(106, 'ldr@gmail.com', '', NULL, '2024-06-11 19:45:58', 7, '', NULL, 0),
(107, 'cris@gmail.com', '', NULL, '2024-06-11 20:11:16', 1, '', NULL, 0),
(110, 'dartvader@gmail.com', '', NULL, '2024-06-11 20:12:19', 7, '', NULL, 0),
(115, 'laram@gmail.com', '', NULL, '2024-06-11 21:46:10', 1, '', NULL, 0),
(116, 'asdfasdf@gmail.com', '', NULL, '2024-06-11 21:46:22', 7, '', NULL, 0),
(117, 'gorreonfransdfsdfcis@gmail.com', '', NULL, '2024-06-11 21:46:37', 7, '', NULL, 0),
(118, 'talkingtom@gmail.com', '', NULL, '2024-06-11 21:46:49', 7, '', NULL, 0),
(123, 'ibarra@gmail.com', '', NULL, '2024-06-11 23:29:42', 7, '', NULL, 0),
(124, 'adsfasdf@gmail.com', '', NULL, '2024-06-11 23:29:53', 7, '', NULL, 0),
(125, 'asdfaadfds@gmail.com', '', NULL, '2024-06-11 23:30:06', 7, '', NULL, 0),
(126, 'adsfasdfasdf@gmail.com', '', NULL, '2024-06-11 23:30:17', 7, '', NULL, 0),
(127, 'ra@gmail.com', '', NULL, '2024-06-11 23:30:29', 7, '', NULL, 0),
(128, 'asdfasdfzz@gmail.com', '', NULL, '2024-06-12 00:21:13', 7, '', NULL, 0),
(129, 'qwerqwerqwerqwerqwe@gmail.com', '', NULL, '2024-06-12 00:21:52', 7, '', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `homeowners`
--

CREATE TABLE `homeowners` (
  `ho_id` int(10) NOT NULL COMMENT 'This is the primary key for homeowners.',
  `email` varchar(255) NOT NULL COMMENT 'This stores the emails of the homeowners.',
  `first_name` varchar(50) NOT NULL COMMENT 'This stores the names of the homeowners.',
  `last_name` varchar(50) NOT NULL,
  `block` varchar(10) NOT NULL COMMENT 'This stores the addresses.',
  `lot` varchar(10) NOT NULL,
  `street` varchar(50) NOT NULL,
  `number` varchar(50) NOT NULL COMMENT 'This stores the phone numbers.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homeowners`
--

INSERT INTO `homeowners` (`ho_id`, `email`, `first_name`, `last_name`, `block`, `lot`, `street`, `number`) VALUES
(23, 'shasha@gmail.com', 'Sashas', 'Velour', '12', '12', 'Beverly Hills', '09232222222'),
(24, 'leabautista1103@gmail.com', 'Lea', 'Amor', '12', '12', 'Lexus', '09232311111'),
(29, 'chotel@gmail.com', 'Chelsea', 'Hotel', '23', '23', 'Peony', '09232245555'),
(30, 'lemery@gmail.com', 'Lemery', 'Batangas Lomi', '23', '23', 'Mango', '09555555555'),
(31, 'dunkmaster@gmail.com', 'Dunk', 'Master', '23', '23', 'Stargazer', '09322222222'),
(32, 'jslyvia@gmail.com', 'Justine', 'Slyvia', '23', '23', 'Magnum', '09121111111'),
(33, 'dlup@gmail.com', 'Darren', 'Lup', '23', '23', 'Mercy', '09322111111'),
(34, 'dgomez@gmail.com', 'Dalton', 'Gomez', '23', '23', 'Timberlake', '09232222222'),
(35, 'smaby@gmail.com', 'Justine', 'Smaby', '23', '23', 'Smize', '09232222222'),
(36, 'trixxie@gmail.com', 'Trixxie', 'Matel', '34', '34', 'Candy', '09232226666'),
(37, 'swanlake@gmail.com', 'Lake', 'Swan', '23', '23', 'River', '09232222222'),
(38, 'asdfasdf@gmail.com', 'adsfasdf', 'asdfasdf', '234', '23', 'asdfasdf', '09232222222'),
(39, 'kimpdeleon@gmail.com', 'Kimpy', 'De Leon', '23', '23', 'Miley', '09232222222'),
(40, 'gorreonfrancis@gmail.com', 'Mark', 'Francis', '18', '26', 'Lexus', '09232222222'),
(41, 'mjlimosinero@gmail.com', 'MJ', 'Limosinero', '12', '12', 'Lexus', '09111111111'),
(42, 'qwertyui@gmail.com', 'asdf', 'asdfasdf', '12', '12', 'asdf', '09232222222');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `log_id` int(10) NOT NULL COMMENT 'This is the primary key.',
  `qr_id` int(10) NOT NULL COMMENT 'This will provide additional information about the vehicle.',
  `station_id` int(10) NOT NULL COMMENT 'This will determine whether the vehicle entered or exit.',
  `date` date NOT NULL DEFAULT current_timestamp() COMMENT 'This stores the date of occurrence.',
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`log_id`, `qr_id`, `station_id`, `date`, `time`) VALUES
(57, 146, 2, '2024-06-05', '00:00:00'),
(58, 145, 4, '2024-06-05', '19:59:38'),
(59, 145, 2, '2024-06-05', '04:00:00'),
(60, 147, 2, '2024-06-02', '05:00:00'),
(61, 149, 4, '2024-06-06', '00:00:00'),
(62, 149, 4, '2024-06-06', '00:00:00'),
(63, 149, 4, '2024-06-06', '00:00:00'),
(64, 149, 2, '2024-06-06', '00:00:00'),
(65, 149, 3, '2024-06-06', '00:00:00'),
(66, 149, 1, '2024-06-06', '00:00:00'),
(67, 149, 2, '2024-06-06', '00:00:00'),
(68, 149, 3, '2024-06-06', '00:00:00'),
(69, 149, 1, '2024-06-06', '00:00:00'),
(70, 149, 2, '2024-06-06', '00:00:00'),
(71, 149, 1, '2024-06-06', '00:00:00'),
(72, 149, 1, '2024-06-06', '00:00:00'),
(73, 149, 1, '2024-06-06', '00:00:00'),
(74, 149, 1, '2024-06-06', '00:00:00'),
(75, 149, 3, '2024-06-06', '00:00:00'),
(76, 149, 1, '2024-06-06', '00:00:00'),
(77, 149, 2, '2024-06-06', '00:00:00'),
(78, 149, 2, '2024-06-06', '00:00:00'),
(79, 149, 3, '2024-06-06', '00:00:00'),
(80, 149, 3, '2024-06-06', '00:00:00'),
(81, 149, 3, '2024-06-06', '16:35:01'),
(82, 149, 1, '2024-06-06', '16:36:43'),
(83, 149, 3, '2024-06-06', '22:39:17'),
(84, 149, 3, '2024-06-06', '22:41:06'),
(85, 149, 1, '2024-06-06', '22:43:36'),
(86, 149, 1, '2024-06-06', '22:43:49'),
(87, 149, 1, '2024-06-06', '22:45:24'),
(88, 149, 1, '2024-06-08', '17:19:12'),
(89, 149, 3, '2024-06-08', '21:03:16'),
(90, 149, 4, '2024-06-08', '21:03:43'),
(91, 149, 1, '2024-06-08', '21:13:01'),
(92, 151, 1, '2024-06-11', '15:02:56'),
(93, 151, 1, '2024-06-11', '15:03:08'),
(94, 151, 3, '2024-06-11', '15:03:36');

-- --------------------------------------------------------

--
-- Table structure for table `qr_info`
--

CREATE TABLE `qr_info` (
  `qr_id` int(10) NOT NULL COMMENT 'This is the primary key.',
  `qr_code` varchar(30) NOT NULL DEFAULT 'Not Registered' COMMENT 'This is the generated qr code.',
  `wheel` int(10) NOT NULL COMMENT 'This shows the number of wheels.',
  `vehicle_type` varchar(50) NOT NULL COMMENT 'This shows the vehicle types.',
  `plate_number` varchar(50) NOT NULL COMMENT 'This stores the plate numbers of vehicles.',
  `expiration_date` date DEFAULT NULL COMMENT 'This stores the validity of the qr codes.',
  `registered` int(1) NOT NULL DEFAULT 0,
  `ho_id` int(10) NOT NULL COMMENT 'This stores the information of the vehicle owner.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `qr_info`
--

INSERT INTO `qr_info` (`qr_id`, `qr_code`, `wheel`, `vehicle_type`, `plate_number`, `expiration_date`, `registered`, `ho_id`) VALUES
(139, 'Not Registered', 6, 'Truck', 'BMO-1233', NULL, 0, 23),
(141, 'Not Registered', 4, 'Sedan', 'NED-5725', NULL, 0, 40),
(143, 'Not Registered', 4, 'Van', 'LDE-2322', NULL, 0, 40),
(145, 'Not Registered', 4, 'Sedan', 'NED-5723', NULL, 0, 40),
(146, 'Not Registered', 4, 'Crossover', 'JCO-2392', NULL, 0, 40),
(147, 'Not Registered', 4, 'Ford', 'LOS-0000', NULL, 0, 34),
(148, 'Not Registered', 4, 'Honda Civic', 'TRE-2342', NULL, 0, 37),
(149, 'Not Registered', 4, 'Innova', 'TRY-1233', NULL, 0, 40),
(150, 'Not Registered', 4, 'Honda Civi', 'JKL-2342', NULL, 0, 33),
(151, 'Q0Xex05hq7', 4, 'Sedan', 'NED-5724', '2024-06-12', 1, 41),
(152, 'Not Registered', 4, 'sdfsdf', 'DFG', NULL, 0, 35),
(153, 'Not Registered', 3, 'asdfasdf', 'ASDFASDF', NULL, 0, 29),
(154, 'Not Registered', 4, 'asdf', 'asdf', NULL, 0, 23);

-- --------------------------------------------------------

--
-- Table structure for table `role_info`
--

CREATE TABLE `role_info` (
  `role_id` int(10) NOT NULL COMMENT 'This is the primary key.',
  `role_description` varchar(30) NOT NULL COMMENT 'This stores the description of the role.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_info`
--

INSERT INTO `role_info` (`role_id`, `role_description`) VALUES
(1, 'guard'),
(7, 'admin'),
(9, 'super_admin');

-- --------------------------------------------------------

--
-- Table structure for table `station_info`
--

CREATE TABLE `station_info` (
  `station_id` int(10) NOT NULL COMMENT 'This is the primary key.',
  `station` varchar(10) NOT NULL COMMENT 'This stores the names of the stations.',
  `entry_exit` varchar(10) NOT NULL COMMENT 'This tells whether the station is an entry point or exit point.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `station_info`
--

INSERT INTO `station_info` (`station_id`, `station`, `entry_exit`) VALUES
(1, 'Gate 1', 'entry'),
(2, 'Gate 2', 'entry'),
(3, 'Gate 3', 'exit'),
(4, 'Gate 4', 'exit');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `info_id` int(10) NOT NULL COMMENT 'This is the primary key.',
  `account_first_name` varchar(50) NOT NULL COMMENT 'This stores the name of the accounts.',
  `account_last_name` varchar(50) NOT NULL,
  `account_number` varchar(30) NOT NULL COMMENT 'This stores the numbers of the accounts.',
  `account_id` int(10) NOT NULL COMMENT 'This is a foreign key to reference the account table.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`info_id`, `account_first_name`, `account_last_name`, `account_number`, `account_id`) VALUES
(26, 'Mark', 'Gorreon', '09232222222', 35),
(97, 'Lana', 'Del Rey', '09366666666', 106),
(98, 'Crisostomo', 'Ibarra', '09121111111', 107),
(101, 'Dart', 'Vader', '09215666666', 110),
(106, 'Lara', 'Marie', '09342322222', 115),
(107, 'Jason', 'Mendrez', '09123123123', 116),
(108, 'Leroy', 'Sanchez', '09234235345', 117),
(109, 'Talking', 'TOm', '09234235434', 118),
(114, 'Ibarra', 'Sara', '09234232342', 123),
(115, 'Sara', 'G', '09232222222', 124),
(116, 'John', 'Lennon', '09454444444', 125),
(117, 'Shaun ', 'Mendez', '09222222222', 126),
(118, 'Pretty', 'Devil', '09211111111', 127),
(119, 'asdasd', 'asdasd', '09999999999', 128),
(120, 'asdf', 'asdf', '09121111111', 129);

-- --------------------------------------------------------

--
-- Table structure for table `visitor_log`
--

CREATE TABLE `visitor_log` (
  `visitor_id` int(10) NOT NULL,
  `visitor_date` date NOT NULL DEFAULT current_timestamp(),
  `visitor_time` time NOT NULL,
  `visitor_first_name` varchar(50) NOT NULL COMMENT 'Stores the name of the visitor',
  `visitor_last_name` varchar(50) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `visitor_plate_number` varchar(10) NOT NULL,
  `visitor_vehicle_type` varchar(50) NOT NULL,
  `visitor_wheel` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitor_log`
--

INSERT INTO `visitor_log` (`visitor_id`, `visitor_date`, `visitor_time`, `visitor_first_name`, `visitor_last_name`, `purpose`, `visitor_plate_number`, `visitor_vehicle_type`, `visitor_wheel`) VALUES
(1, '2024-05-10', '00:00:00', 'Drake', 'Bling', 'Visiting cousin', '', '', 0),
(2, '2024-05-11', '00:00:00', 'Kia', 'Madrid', 'Visiting cousin', '', '', 0),
(3, '2024-06-06', '23:45:47', 'Mark', 'Francis', 'Visiting my date', 'NED-5725', 'Sedan', 4),
(4, '2024-06-08', '17:12:43', 'Jerom', 'Ponce', 'Visiting Nurse', 'LOP-1212', 'Sedan', 4),
(5, '2024-06-08', '17:20:11', 'Bernadette', 'Gorreon', 'Visiting', 'NED-5724', 'Sedan', 4),
(6, '2024-06-10', '18:11:24', 'Juan Ponce', 'Enrile', 'PDAF', 'MIJ-90121', 'Lexus', 4),
(7, '2024-06-12', '00:38:33', 'adsasd', 'sdfsdf', 'sdf', 'DFG', 'tyu', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `homeowners`
--
ALTER TABLE `homeowners`
  ADD PRIMARY KEY (`ho_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `qr_id` (`qr_id`),
  ADD KEY `station_id` (`station_id`);

--
-- Indexes for table `qr_info`
--
ALTER TABLE `qr_info`
  ADD PRIMARY KEY (`qr_id`),
  ADD KEY `ho_id` (`ho_id`);

--
-- Indexes for table `role_info`
--
ALTER TABLE `role_info`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `station_info`
--
ALTER TABLE `station_info`
  ADD PRIMARY KEY (`station_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`info_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `visitor_log`
--
ALTER TABLE `visitor_log`
  ADD PRIMARY KEY (`visitor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `account_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'This is the primary key for accounts.', AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `homeowners`
--
ALTER TABLE `homeowners`
  MODIFY `ho_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'This is the primary key for homeowners.', AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'This is the primary key.', AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `qr_info`
--
ALTER TABLE `qr_info`
  MODIFY `qr_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'This is the primary key.', AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `role_info`
--
ALTER TABLE `role_info`
  MODIFY `role_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'This is the primary key.', AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `station_info`
--
ALTER TABLE `station_info`
  MODIFY `station_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'This is the primary key.', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `info_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'This is the primary key.', AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `visitor_log`
--
ALTER TABLE `visitor_log`
  MODIFY `visitor_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role_info` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_2` FOREIGN KEY (`station_id`) REFERENCES `station_info` (`station_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `log_ibfk_3` FOREIGN KEY (`qr_id`) REFERENCES `qr_info` (`qr_id`);

--
-- Constraints for table `qr_info`
--
ALTER TABLE `qr_info`
  ADD CONSTRAINT `qr_info_ibfk_1` FOREIGN KEY (`ho_id`) REFERENCES `homeowners` (`ho_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `user_info_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
