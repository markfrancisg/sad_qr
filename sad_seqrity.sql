-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2024 at 10:37 AM
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
(35, 'gorreonfrancis@gmail.com', '$2y$12$wEvdxonAvxcFzb8dYNPl6uHXLBh3FlTD6QqSYnacEOqxRFNiCknwe', NULL, '2024-04-11 01:20:11', 9, '0d6a347406a8777702eabbc9eff0f536', '2024-05-29 06:25:07', 1),
(65, 'jacobgorreon@gmail.com', '$2y$12$PzBneXVsCU1Pq65bG9.6Ju0vKA94KuH5BREqmfl9YgFjEfrdcsF9m', NULL, '2024-05-26 16:57:00', 7, '', NULL, 0),
(72, 'asdfasdf@gmail.com', '', NULL, '2024-05-29 20:29:27', 7, '', NULL, 0),
(74, 'blacqueswan@gmail.com', '$2y$12$mmxops0lyabzt09X.SL9Du4YY6rry7/m.EBUZT3Hy9oShhsZvqYce', NULL, '2024-05-29 20:37:11', 1, '', NULL, 1);

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
(23, 'shasha@gmail.com', 'Sasha', 'Velour', '12', '12', 'Beverly Hills', '09232222222'),
(24, 'leabautista1103@gmail.com', 'Lea', 'Amor', '12', '12', 'Lexus', '09232222222');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `log_id` int(10) NOT NULL COMMENT 'This is the primary key.',
  `qr_id` int(10) NOT NULL COMMENT 'This will provide additional information about the vehicle.',
  `station_id` int(10) NOT NULL COMMENT 'This will determine whether the vehicle entered or exit.',
  `date_time` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'This stores the date of occurrence.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`log_id`, `qr_id`, `station_id`, `date_time`) VALUES
(55, 138, 3, '2024-05-11 13:13:36'),
(56, 140, 2, '2024-05-29 21:24:35');

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
(139, 'Not Registered', 6, 'Truck', 'BMO-1231', NULL, 0, 23),
(140, 'vKXoBeHttX', 4, 'Sedan', 'NED5724', '2024-05-30', 1, 24);

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
(1, 'Station A', 'entry'),
(2, 'Station B', 'entry'),
(3, 'Station C', 'exit'),
(4, 'Station D', 'exit');

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
(56, 'Jacob', 'Gorreon', '09232222222', 65),
(63, 'Gj', 'Hilario', '09232222222', 72),
(65, 'black', 'swan', '09233222222', 74);

-- --------------------------------------------------------

--
-- Table structure for table `visitor_log`
--

CREATE TABLE `visitor_log` (
  `visitor_id` int(10) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `first_name` varchar(50) NOT NULL COMMENT 'Stores the name of the visitor',
  `last_name` varchar(50) NOT NULL,
  `purpose` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitor_log`
--

INSERT INTO `visitor_log` (`visitor_id`, `date_time`, `first_name`, `last_name`, `purpose`) VALUES
(1, '2024-05-10 20:46:09', 'Drake', 'Bling', 'Visiting cousin'),
(2, '2024-05-11 13:15:23', 'Kia', 'Madrid', 'Visiting cousin');

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
  MODIFY `account_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'This is the primary key for accounts.', AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `homeowners`
--
ALTER TABLE `homeowners`
  MODIFY `ho_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'This is the primary key for homeowners.', AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'This is the primary key.', AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `qr_info`
--
ALTER TABLE `qr_info`
  MODIFY `qr_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'This is the primary key.', AUTO_INCREMENT=141;

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
  MODIFY `info_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'This is the primary key.', AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `visitor_log`
--
ALTER TABLE `visitor_log`
  MODIFY `visitor_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role_info` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_2` FOREIGN KEY (`station_id`) REFERENCES `station_info` (`station_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
