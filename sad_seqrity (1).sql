-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2024 at 07:28 AM
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
  `token_expiration` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `account_email`, `password`, `updated_at`, `created_at`, `role_id`, `token`, `token_expiration`) VALUES
(35, 'gorreonfrancis@gmail.com', '$2y$12$DKUBvLnuDkE9UkkWMFxpVOEufC7pVkPZ9t/jrusFlDG766SaBYkLy', NULL, '2024-04-11 01:20:11', 7, '042d37dd0f3872be3a953a3c98df6756', '2024-04-20 05:40:17'),
(53, 'lebleb@gmail.com', '$2y$12$a/x1weBtuSEMWLBbf8V0POGA5oiYaq/5rXN7p9lWyQT7lQ4xbWITW', NULL, '2024-04-22 03:02:01', 7, '', NULL),
(54, 'jbatistat@gmail.com', '$2y$12$/8ofZTEpy3Jyi8iMW68M1u2PwBQ2BEmWaGpbfgjcsjI2d1YOh9PlW', NULL, '2024-04-22 03:07:29', 1, '', NULL),
(55, 'blacqueswan@gmail.com', '$2y$12$wkkP9HDUSrbUOT8ZsHsDkOgPipG9UE001ap3aAJYfd6EX0nI8a0lO', NULL, '2024-04-22 03:08:00', 7, '', NULL);

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
(1, 'jerome@gmail.com', 'Jerome Ponce', '', '18', '0', '', '09458022222'),
(2, 'marina@gmail.com', 'Marina Summers', '', '0', '0', '', '09888888888'),
(3, 'nicole@gmail.com', 'Nicole Pardaux', '', '0', '0', '', '09990000000'),
(4, 'carl@gmail.com', 'Carl Duran', '', '0', '0', '', '09766662222'),
(5, 'mj@gmail.com', 'MJ Limo', '', '0', '0', '', '09567889232'),
(6, 'renan@gmail.com', 'Carl Renan Duran', '', '0', '0', '', '09121231231'),
(7, 'blacqueswan@gmail.com', 'Black Swan', '', '0', '0', '', '09124544444'),
(8, 'gorreonallan@gmail.com', 'Bernadette Gorreon', '', '0', '0', '', '09876542647'),
(9, 'm@gmail.com', 'Mark gorreon', '', '0', '0', '', '09871222222'),
(10, 'l@gmail.com', 'Mark Francis', '', '0', '0', '', '09672332333'),
(11, 't@gmail.com', 'T M', '', '0', '0', '', '09124441232'),
(12, 'b@gmail.com', 'b l', '', '0', '0', '', '09123432222'),
(13, 'barrientoshannah13@gmail.com', 'Hannah  Barrientos', '', '0', '0', '', '09872323232'),
(14, 'pig@gmail.com', 'Peppa pig', '', '0', '0', '', '09123433333'),
(15, 'carlrenanduran@gmail.com', 'Carl Renan Duran', '', '0', '0', '', '09991738693'),
(16, 'ssdfsdf@gmail.com', 'sfsdf sdfsdf', '', '0', '0', '', '09232222222'),
(17, 'jacob@gmail.com', 'JacobJacob', 'Gorreon', '18', '26', 'Lexus', '09121111111');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `log_id` int(10) NOT NULL COMMENT 'This is the primary key.',
  `qr_id` int(10) NOT NULL COMMENT 'This will provide additional information about the vehicle.',
  `station_id` int(10) NOT NULL COMMENT 'This will determine whether the vehicle entered or exit.',
  `date_time` datetime NOT NULL COMMENT 'This stores the date of occurrence.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(69, 'Not Registered', 4, '4', 'TRE-1234', NULL, 0, 12),
(70, 'Not Registered', 4, '4', 'TRE-1234', NULL, 0, 12),
(71, 'Not Registered', 4, '4', 'TRE-1', NULL, 0, 12),
(72, 'Not Registered', 4, '4', 'TRE-2', NULL, 0, 12),
(73, 'Not Registered', 4, '4', 'TRE-3', NULL, 0, 12),
(74, 'Not Registered', 4, '4', 'TRE-1234', NULL, 0, 12),
(75, 'Not Registered', 4, '4', 'TRE-1', NULL, 0, 12),
(76, 'Not Registered', 4, '4', 'TRE-2', NULL, 0, 12),
(77, 'Not Registered', 4, '4', 'TRE-3', NULL, 0, 12),
(78, 'Not Registered', 4, '4', 'TRE-1234', NULL, 0, 12),
(79, 'Not Registered', 4, '4', 'TRE-1', NULL, 0, 12),
(80, 'Not Registered', 4, '4', 'TRE-2', NULL, 0, 12),
(81, 'Not Registered', 4, '4', 'TRE-3', NULL, 0, 12),
(82, 'Not Registered', 4, '4', 'TRE-1234', NULL, 0, 12),
(83, 'Not Registered', 4, '4', 'TRE-1', NULL, 0, 12),
(84, 'Not Registered', 4, '4', 'TRE-2', NULL, 0, 12),
(85, 'Not Registered', 4, '4', 'TRE-3', NULL, 0, 12),
(86, 'Not Registered', 4, '4', 'TRE-1234', NULL, 0, 12),
(87, 'Not Registered', 4, '4', 'TRE-1', NULL, 0, 12),
(88, 'Not Registered', 4, '4', 'TRE-2', NULL, 0, 12),
(89, 'Not Registered', 4, '4', 'TRE-3', NULL, 0, 12),
(90, 'Not Registered', 4, '4', 'TRE-B', NULL, 0, 12),
(91, 'Not Registered', 4, '4', 'TRE-1', NULL, 0, 12),
(92, 'Not Registered', 4, '4', 'TRE-2', NULL, 0, 12),
(93, 'Not Registered', 4, '4', 'TRE-3', NULL, 0, 12),
(94, 'Not Registered', 4, '4', 'TRE-B', NULL, 0, 12),
(95, 'Not Registered', 4, '4', 'TRE-B', NULL, 0, 12),
(96, 'Not Registered', 4, '4', 'TRE-B', NULL, 0, 12),
(97, 'Not Registered', 4, '4', 'TRE-B', NULL, 0, 12),
(98, 'Not Registered', 4, '4', 'TRE-B', NULL, 0, 12),
(99, 'Not Registered', 4, '4', 'TRE-B', NULL, 0, 12),
(100, 'Not Registered', 4, '4', 'TRE-B', NULL, 0, 12),
(101, 'Not Registered', 4, '4', 'TRE-B', NULL, 0, 12),
(102, 'Not Registered', 4, '4', 'TRE-B', NULL, 0, 12),
(103, 'Not Registered', 4, '4', 'TRE-B', NULL, 0, 12),
(104, 'Not Registered', 4, '4', 'TRE-C', NULL, 0, 12),
(105, 'Not Registered', 4, '4', 'TRE-C', NULL, 0, 12),
(106, 'Not Registered', 4, '4', 'TRE-C', NULL, 0, 12),
(107, 'Not Registered', 4, '4', 'TRE-C', NULL, 0, 12),
(108, 'Not Registered', 4, '4', 'TRE-C', NULL, 0, 12),
(109, 'Not Registered', 4, '4', 'TRE-C', NULL, 0, 12),
(110, 'Not Registered', 4, '4', 'TRE-C', NULL, 0, 12),
(111, 'Not Registered', 4, '4', 'TRE-C', NULL, 0, 12),
(112, 'Not Registered', 4, '4', 'TRE-C', NULL, 0, 12),
(113, 'Not Registered', 4, '4', 'TRE-C', NULL, 0, 12),
(114, 'Not Registered', 4, '4', 'TRE-C', NULL, 0, 12),
(115, 'Not Registered', 4, '4', 'TRE-C', NULL, 0, 12),
(116, 'Not Registered', 4, '4', 'TRE-C', NULL, 0, 12),
(117, 'Not Registered', 4, '4', 'TRE-C', NULL, 0, 12),
(118, 'Not Registered', 4, '4', 'TRE-C', NULL, 0, 12),
(119, 'Not Registered', 4, '4', 'TRE-D', NULL, 0, 12),
(120, 'Not Registered', 4, '4', 'TRE-D', NULL, 0, 12),
(121, 'Not Registered', 4, '4', 'TRE-D', NULL, 0, 12),
(122, 'Not Registered', 4, '4', 'TRE-D', NULL, 0, 12),
(123, 'Not Registered', 4, '4', 'TRE-D', NULL, 0, 12),
(124, 'Not Registered', 4, '4', 'TRE-D', NULL, 0, 12),
(125, 'Not Registered', 4, '4', 'TRE-D', NULL, 0, 12),
(126, 'Not Registered', 4, '4', 'TRE-D', NULL, 0, 12),
(127, 'Not Registered', 4, '4', 'TRE-D', NULL, 0, 12),
(128, 'Not Registered', 4, '4', 'TRE-D', NULL, 0, 12),
(129, 'cDN8mGzEl8', 4, 'Honda Civic', 'QWER-0987', '2024-04-23', 1, 17);

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
(7, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `station_info`
--

CREATE TABLE `station_info` (
  `station_id` int(10) NOT NULL COMMENT 'This is the primary key.',
  `station` varchar(10) NOT NULL COMMENT 'This stores the names of the stations.',
  `entry_exit` varchar(10) NOT NULL COMMENT 'This tells whether the station is an entry point or exit point.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(26, 'Mark Gorreon', '', '09232222222', 35),
(44, 'Lebron', 'James', '09121111111', 53),
(45, 'Jon', 'Batista', '09123433333', 54),
(46, 'Blacque', 'Swan', '09121110000', 55);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `account_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'This is the primary key for accounts.', AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `homeowners`
--
ALTER TABLE `homeowners`
  MODIFY `ho_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'This is the primary key for homeowners.', AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'This is the primary key.';

--
-- AUTO_INCREMENT for table `qr_info`
--
ALTER TABLE `qr_info`
  MODIFY `qr_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'This is the primary key.', AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `role_info`
--
ALTER TABLE `role_info`
  MODIFY `role_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'This is the primary key.', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `station_info`
--
ALTER TABLE `station_info`
  MODIFY `station_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'This is the primary key.';

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `info_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'This is the primary key.', AUTO_INCREMENT=47;

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
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`qr_id`) REFERENCES `qr_info` (`qr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
