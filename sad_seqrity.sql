-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2024 at 08:41 AM
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
(49, 'carlrenanduran@gmail.com', '$2y$12$aE9yV0C6lAgPwPGi4kEd8.psfgxanXgZM2ooLhDf7qWiDFQJ8D0P.', NULL, '2024-04-14 19:20:32', 1, 'ad8f1c613c97d38fcfd2d3ae4c949bde', '2024-04-20 06:55:54');

-- --------------------------------------------------------

--
-- Table structure for table `homeowners`
--

CREATE TABLE `homeowners` (
  `ho_id` int(10) NOT NULL COMMENT 'This is the primary key for homeowners.',
  `email` varchar(255) NOT NULL COMMENT 'This stores the emails of the homeowners.',
  `name` varchar(50) NOT NULL COMMENT 'This stores the names of the homeowners.',
  `address` varchar(255) NOT NULL COMMENT 'This stores the addresses.',
  `number` varchar(50) NOT NULL COMMENT 'This stores the phone numbers.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homeowners`
--

INSERT INTO `homeowners` (`ho_id`, `email`, `name`, `address`, `number`) VALUES
(1, 'jerome@gmail.com', 'Jerome Ponce', '18 26 Lexus', '09458022222'),
(2, 'marina@gmail.com', 'Marina Summers', 'Block 17 ,Lot 17 Peony', '09888888888'),
(3, 'nicole@gmail.com', 'Nicole Pardaux', 'Block 10 ,Lot 10 CasaNovaStreet', '09990000000'),
(4, 'carl@gmail.com', 'Carl Duran', 'Block 9 ,Lot 9 Cornedbeef Street', '09766662222'),
(5, 'mj@gmail.com', 'MJ Limo', 'Block 8 ,Lot 8 Star Street', '09567889232'),
(6, 'renan@gmail.com', 'Carl Renan Duran', 'Block 4 ,Lot 4 Celina Street', '09121231231'),
(7, 'blacqueswan@gmail.com', 'Black Swan', 'Block 18 ,Lot 26 Lexus Street', '09124544444'),
(8, 'gorreonallan@gmail.com', 'Bernadette Gorreon', 'Block 18 ,Lot 26 Lexus Street', '09876542647'),
(9, 'm@gmail.com', 'Mark gorreon', 'Block 12 ,Lot 12 Star Street', '09871222222'),
(10, 'l@gmail.com', 'Mark Francis', 'Block 98 ,Lot 82 Mega Street', '09672332333'),
(11, 't@gmail.com', 'T M', 'Block 12 ,Lot 12 Star Street', '09124441232'),
(12, 'b@gmail.com', 'b l', 'Block 12 ,Lot 12 Star Street', '09123432222'),
(13, 'barrientoshannah13@gmail.com', 'Hannah  Barrientos', 'Block 12 ,Lot 12 Agata Street', '09872323232'),
(14, 'pig@gmail.com', 'Peppa pig', 'Block 18 ,Lot 19 Meow Street', '09123433333'),
(15, 'carlrenanduran@gmail.com', 'Carl Renan Duran', 'Block 10 ,Lot 14 Jade Street', '09991738693');

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
(22, 'Not Registered', 4, 'Sedan', 'NED-5724', NULL, 0, 7),
(23, 'Not Registered', 8, 'Truck', 'MMM-1234', NULL, 0, 7),
(24, 'Not Registered', 4, 'Crossover', 'MNB-1230', NULL, 0, 7),
(25, 'Not Registered', 4, 'Sportscar', 'VVV-0000', NULL, 0, 7),
(26, 'Not Registered', 4, 'Sedan', 'MNB-1989', NULL, 0, 8),
(27, 'Not Registered', 4, 'Civic', 'BBB-7865', NULL, 0, 3),
(28, 'Not Registered', 4, 'Limo', 'FGHJ-1234', NULL, 0, 7),
(29, 'Not Registered', 123, 'Sedan', 'asdfasdf', NULL, 0, 8),
(30, 'Not Registered', 12, 'asdfasdf', 'asdfasdf', NULL, 0, 7),
(31, 'Not Registered', 34567, 'dfghjk', 'dfghjk', NULL, 0, 7),
(32, 'Not Registered', 0, 'asdf', 'asdf', NULL, 0, 3),
(33, 'Not Registered', 0, 'asdf', 'sfsdf', NULL, 0, 9),
(34, 'Not Registered', 4, 'Ferrari', 'UUU-0000', NULL, 0, 8),
(35, 'Not Registered', 4, 'Bugatti', 'VBN-1230', NULL, 0, 5),
(36, 'Not Registered', 4, 'Pickup', 'III-JJJJ', NULL, 0, 3),
(37, 'Not Registered', 4, 'SUV', 'LKJ-8902', NULL, 0, 13),
(38, 'Not Registered', 4, 'Sedan', 'nmb-1231', NULL, 0, 13),
(39, 'Not Registered', 4, 'Sedan', 'MNH-1234', NULL, 0, 14),
(40, 'TNiabZslXd', 6, 'Truck', 'MNV-1231', '2024-04-21', 1, 8),
(41, 'wUxL5NQ9sw', 4, 'SEDAN', 'QWERTYU', '2024-04-21', 1, 15);

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
  `account_name` varchar(50) NOT NULL COMMENT 'This stores the name of the accounts.',
  `account_number` varchar(30) NOT NULL COMMENT 'This stores the numbers of the accounts.',
  `account_id` int(10) NOT NULL COMMENT 'This is a foreign key to reference the account table.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`info_id`, `account_name`, `account_number`, `account_id`) VALUES
(26, 'Mark Gorreon', '09232222222', 35),
(40, 'Carl Duran', '09787888888', 49);

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
  MODIFY `account_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'This is the primary key for accounts.', AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `homeowners`
--
ALTER TABLE `homeowners`
  MODIFY `ho_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'This is the primary key for homeowners.', AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'This is the primary key.';

--
-- AUTO_INCREMENT for table `qr_info`
--
ALTER TABLE `qr_info`
  MODIFY `qr_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'This is the primary key.', AUTO_INCREMENT=42;

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
  MODIFY `info_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'This is the primary key.', AUTO_INCREMENT=44;

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
