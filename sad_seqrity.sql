-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2024 at 07:46 PM
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
(35, 'gorreonfrancis@gmail.com', '$2y$12$wEvdxonAvxcFzb8dYNPl6uHXLBh3FlTD6QqSYnacEOqxRFNiCknwe', NULL, '2024-04-11 01:20:11', 9, 'dbfcb8d1d07b06bda836d70a3221f5a7', '2024-06-10 09:35:53', 1),
(106, 'ldr@gmail.com', '', NULL, '2024-06-11 19:45:58', 7, '', NULL, 0),
(107, 'cris@gmail.com', '', NULL, '2024-06-11 20:11:16', 1, '', NULL, 0),
(116, 'asdfasdf@gmail.com', '', NULL, '2024-06-11 21:46:22', 7, '', NULL, 0),
(125, 'asdfaadfds@gmail.com', '', NULL, '2024-06-11 23:30:06', 7, '', NULL, 0),
(126, 'shaunee@gmail.com', '', NULL, '2024-06-11 23:30:17', 7, '', NULL, 0),
(127, 'ra@gmail.com', '', NULL, '2024-06-11 23:30:29', 7, '', NULL, 0),
(132, 'blacqueswan@gmail.com', '$2y$12$w8aS/tA2hkhgr44Ne.mxHu6VZgms.3BNeDTeLcfQfIhGPiXUYGLBq', NULL, '2024-06-17 01:34:43', 7, 'e741e862f77edec5251c751629029f89', '2024-06-16 19:38:49', 1);

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
(66, 'kp@gmail.com', 'KP Qtie', 'Leon', '12', '12', 'Lavender', '09121111111'),
(77, 'lana@gmail.com', 'Lana', 'Del Rey', '34', '2', 'Beverly', '09433333333'),
(78, 'je@gmail.com', 'Jerald', 'Napoles', '12', '12', 'Lexus', '09111111111'),
(79, 'lov@gmail.com', 'Love', 'Poe', '17', '18', 'Umbrella', '09333333333'),
(80, 'cin@gmail.com', 'Cinnamon', 'Sweet', '8', '9', 'Phone', '09232323233'),
(81, 'mandy@gmail.com', 'Mandy', 'Moore', '1', '2', 'Coffee', '09343434343'),
(82, 'ek@gmail.com', 'EK', 'Valdore', '1', '4', 'Dalm', '09232312112'),
(84, 'love@gmail.com', 'Lovely', 'Blake', '1', '5', 'Brokeback', '09655555553'),
(85, 'jera@gmail.com', 'Jerald', 'Napoelon', '1', '12', 'Pluto', '09343333333'),
(86, 'viv@gmail.com', 'Viva', 'Mexico', '2', '3', 'Viva', '09666666666'),
(87, 'stef@gmail.com', 'Stef', 'Arenas', '6', '23', 'QC', '09343466888'),
(88, 'leb@gmail.com', 'Leb', 'Lanc', '12', '34', 'Noxus', '09343434343'),
(89, 'lux@gmail.com', 'Lux', 'Demacia', '4', '2', 'Demacia', '09353535353'),
(90, 'ire@gmail.com', 'Irelia', 'Blade', '34', '2', 'Ionia', '09555555555'),
(91, 'tryn@gmail.com', 'Trynda', 'Mere', '23', '12', 'Noxis', '09999999999'),
(92, 'an@gmail.com', 'Annie', 'Heart', '12', '34', 'Demacia', '09343434343'),
(93, 'son@gmail.com', 'Sona', 'Songheart', '5', '34', 'Ionia', '09343434666'),
(94, 'jan@gmail.com', 'Janna', 'Jan', '12', '23', 'Ionia', '09343112124'),
(95, 'thresh@gmail.com', 'Thresh', 'Soul', '4', '23', 'Noxus', '09544545454'),
(96, 'blitz@gmail.com', 'Blitz', 'Cranck', '43', '23', 'Piltover', '09343434343');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `log_id` int(10) NOT NULL COMMENT 'This is the primary key.',
  `date` date NOT NULL DEFAULT current_timestamp() COMMENT 'This stores the date of occurrence.',
  `log_plate_number` varchar(10) NOT NULL,
  `log_name` varchar(50) NOT NULL,
  `log_address` varchar(50) NOT NULL,
  `log_vehicle` varchar(50) NOT NULL,
  `entry_log` datetime DEFAULT NULL,
  `exit_log` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`log_id`, `date`, `log_plate_number`, `log_name`, `log_address`, `log_vehicle`, `entry_log`, `exit_log`) VALUES
(100, '2024-06-08', 'MOL-1234', 'John Mathew Limo', 'Block 12, Lot 12 ,Peony Street', 'Crossover 4-wheeler', '2024-06-16 17:46:00', '2024-06-16 17:46:00'),
(101, '2024-06-16', 'MOL-1234', 'John Mathew Limo', 'Block 12, Lot 12 ,Peony Street', 'Crossover 4-wheeler', '2024-06-16 17:46:00', NULL),
(102, '2024-06-16', 'MIL-0000', 'Tere Bisnar', 'Block 18, Lot 21 ,Supernova Street', 'Van 4-wheeler', '2024-06-16 17:47:00', '2024-06-16 17:47:00'),
(103, '2024-06-16', 'MIL-0000', 'Tere Bisnar', 'Block 18, Lot 21 ,Supernova Street', 'Van 4-wheeler', '2024-06-16 17:47:00', '2024-06-16 17:47:00'),
(104, '2024-06-16', 'MIL-0000', 'Tere Bisnar', 'Block 18, Lot 21 ,Supernova Street', 'Van 4-wheeler', '2024-06-16 17:47:00', NULL),
(105, '2024-06-16', 'KIL-1234', 'Angelika Bariring', 'Block 9, Lot 9 ,Mundane Street', 'Car, 4-wheeler', '2024-06-16 17:59:00', '2024-06-16 17:59:00'),
(106, '2024-06-16', 'KIL-1234', 'Angelika Bariring', 'Block 9, Lot 9 ,Mundane Street', 'Car, 4-wheeler', '2024-06-16 17:59:00', '2024-06-16 18:15:00');

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
(107, 'Jason', 'Mendrez', '09123123123', 116),
(116, 'John', 'Lennon', '09454444443', 125),
(117, 'Shaunee', 'Mendez', '09222222222', 126),
(118, 'Pretty', 'Devil', '09211111111', 127),
(123, 'Black', 'Swan', '09322323232', 132);

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
  ADD PRIMARY KEY (`log_id`);

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
  MODIFY `account_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'This is the primary key for accounts.', AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `homeowners`
--
ALTER TABLE `homeowners`
  MODIFY `ho_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'This is the primary key for homeowners.', AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'This is the primary key.', AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `qr_info`
--
ALTER TABLE `qr_info`
  MODIFY `qr_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'This is the primary key.', AUTO_INCREMENT=160;

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
  MODIFY `info_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'This is the primary key.', AUTO_INCREMENT=124;

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
