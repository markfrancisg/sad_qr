-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2024 at 03:56 PM
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
(35, 'gorreonfrancis@gmail.com', '$2y$12$a2bwC40iwQCe4c5eiH6sAuQ/XXvOZsJvPwxI3rO9GQWL4U41l3Bci', NULL, '2024-04-11 01:20:11', 9, 'df5df2620c65083db75b628a72b57d87', '2024-06-25 07:19:46', 1),
(106, 'ldr@gmail.com', '', NULL, '2024-06-11 19:45:58', 7, '', NULL, 0),
(107, 'cris@gmail.com', '', NULL, '2024-06-11 20:11:16', 1, '', NULL, 0),
(116, 'asdfasdf@gmail.com', '', NULL, '2024-06-11 21:46:22', 7, '60a68a473daf11b171cf20c329598116', '2024-06-22 15:02:32', 0),
(125, 'asdfaadfds@gmail.com', '', NULL, '2024-06-11 23:30:06', 7, '', NULL, 0),
(136, 'sara@gmail.com', '', NULL, '2024-06-22 18:14:04', 7, '', NULL, 0),
(137, 'taric@gmail.com', '', NULL, '2024-06-22 18:17:10', 1, '', NULL, 0),
(138, 'leon@gmail.com', '', NULL, '2024-06-22 18:19:07', 7, '', NULL, 0),
(139, 'bili@gmail.com', '', NULL, '2024-06-22 18:20:28', 7, '', NULL, 0),
(141, 'jerome@gmail.com', '', NULL, '2024-06-22 18:23:29', 1, '', NULL, 0),
(142, 'kikay@gmail.com', '', NULL, '2024-06-22 18:24:38', 7, '', NULL, 0),
(144, 'argojosafor@gmail.com', '$2y$12$GXOX0hXe.oLcK5WHikRfmee52c3CZ3.2mUoSuxsAq1kObjqxeU0O2', NULL, '2024-06-25 08:30:01', 1, '89d61303e5e31fdc3bdacd464ab7eac5', '2024-06-25 07:54:18', 1),
(146, 'blacqueswan@gmail.com', '$2y$12$hB9jutqOxc/w4F0exJkt9.Dl/HI5C7b7UDo/excNIHNjOgUZXJ0y2', NULL, '2024-06-28 12:12:04', 7, '', NULL, 1);

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
(111, 'mark@gmail.com', 'Mark', 'Gorreon', '12', '12', 'Peony', '09123123123'),
(112, 'marx@gmail.com', 'Marx', 'Jacob', '17', '12', 'Lexus', '09123123123'),
(113, 'angelika@gmail.com', 'Angelika', 'Bariring', '12', '12', 'Gumamela', '09111111111'),
(114, 'maria@gmail.com', 'Maria', 'Bisnar', '17', '12', 'Star', '09121212121'),
(115, 'mj@gmail.com', 'Mj', 'Limosinero', '12', '18', 'Nissan', '09123123123'),
(116, 'kia@gmail.com', 'Kia', 'Madrid', '18', '14', 'Santan', '09345345345'),
(117, 'kiamadrid@gmail.com', 'Kia', 'Madrid ', '15', '17', 'Kamagung', '09299541804');

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
  `exit_log` datetime DEFAULT NULL,
  `last_action` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`log_id`, `date`, `log_plate_number`, `log_name`, `log_address`, `log_vehicle`, `entry_log`, `exit_log`, `last_action`) VALUES
(153, '2024-06-29', 'KIL-1231', 'Marx Jacob', 'Block 17, Lot 12 ,Lexus Street', 'SUV, 4-wheeler', NULL, '2024-06-30 21:46:00', 'exit_log'),
(154, '2024-06-30', 'KIL-1231', 'Marx Jacob', 'Block 17, Lot 12 ,Lexus Street', 'SUV, 4-wheeler', '2024-06-30 21:47:00', '2024-06-30 21:46:00', 'entry_log'),
(155, '2024-06-30', 'KIL-1231', 'Marx Jacob', 'Block 17, Lot 12 ,Lexus Street', 'SUV, 4-wheeler', '2024-06-30 21:48:00', '2024-06-30 21:48:00', 'entry_log'),
(156, '2024-06-30', 'KIL-1231', 'Marx Jacob', 'Block 17, Lot 12 ,Lexus Street', 'SUV, 4-wheeler', '2024-06-30 21:48:00', '2024-06-30 21:48:00', 'entry_log'),
(157, '2024-06-30', 'KIL-1231', 'Marx Jacob', 'Block 17, Lot 12 ,Lexus Street', 'SUV, 4-wheeler', '2024-06-30 21:50:00', '2024-06-30 21:49:00', 'entry_log'),
(158, '2024-06-30', 'DAF-1850', 'Kia Madrid ', 'Block 15, Lot 17 ,Kamagung Street', 'SUV, 4-wheeler', '2024-06-30 21:50:00', '2024-06-30 21:51:00', 'exit_log'),
(159, '2024-06-30', 'KIL-1231', 'Marx Jacob', 'Block 17, Lot 12 ,Lexus Street', 'SUV, 4-wheeler', '2024-06-30 21:51:00', '2024-06-30 21:50:00', 'entry_log'),
(160, '2024-06-30', 'DAF-1850', 'Kia Madrid ', 'Block 15, Lot 17 ,Kamagung Street', 'SUV, 4-wheeler', '2024-06-30 21:52:00', '2024-06-30 21:53:00', 'exit_log');

-- --------------------------------------------------------

--
-- Table structure for table `qr_info`
--

CREATE TABLE `qr_info` (
  `qr_id` int(10) NOT NULL COMMENT 'This is the primary key.',
  `qr_code` varchar(30) NOT NULL DEFAULT 'Not Registered' COMMENT 'This is the generated qr code.',
  `wheel` int(10) NOT NULL COMMENT 'This shows the number of wheels.',
  `vehicle_type` varchar(50) NOT NULL COMMENT 'This shows the vehicle types.',
  `vehicle_color` varchar(30) NOT NULL,
  `plate_number` varchar(50) NOT NULL COMMENT 'This stores the plate numbers of vehicles.',
  `expiration_date` date DEFAULT NULL COMMENT 'This stores the validity of the qr codes.',
  `registered` int(1) NOT NULL DEFAULT 0,
  `ho_id` int(10) NOT NULL COMMENT 'This stores the information of the vehicle owner.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `qr_info`
--

INSERT INTO `qr_info` (`qr_id`, `qr_code`, `wheel`, `vehicle_type`, `vehicle_color`, `plate_number`, `expiration_date`, `registered`, `ho_id`) VALUES
(186, 'Not Registered', 4, 'Crossover', 'Blue', 'NED-5723', NULL, 0, 111),
(187, 'gMEhoeeDJX', 4, 'SUV', 'White', 'KIL-1231', '2025-06-24', 1, 112),
(188, 'Not Registered', 4, 'Sedan', 'Silver', 'NED-1231', NULL, 0, 112),
(189, 'Not Registered', 4, 'Crossover', 'White', 'JIK-8888', NULL, 0, 114),
(190, 'Not Registered', 4, 'Motor', 'Black', 'ULK-1211', NULL, 0, 115),
(191, 'qhy5fNvAre', 4, 'SUV', 'RED', 'DAF-1850', '2025-06-28', 1, 117),
(193, 'Not Registered', 4, 'Sedan', 'Black', 'TRY-1111', NULL, 0, 111),
(194, 'Not Registered', 2, 'Motor', 'Black', 'MMM-9999', NULL, 0, 113),
(195, 'Not Registered', 4, 'Sedan ', 'Black ', 'UUU-1111', NULL, 0, 113);

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
(127, 'Sara', 'G', '09232222222', 136),
(128, 'Taric', 'g', '09232222222', 137),
(129, 'Leon', 'G', '09232222222', 138),
(130, 'Bili', 'E', '09232323232', 139),
(132, 'Jerome', 'P', '09232323232', 141),
(133, 'Kikay', 'P', '09232323232', 142),
(135, 'Argo', 'Josafor', '09111111111', 144),
(137, ' Black ', ' Swan ', '09123123123', 146);

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
  `visitor_wheel` int(10) NOT NULL,
  `visitor_vehicle_color` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitor_log`
--

INSERT INTO `visitor_log` (`visitor_id`, `visitor_date`, `visitor_time`, `visitor_first_name`, `visitor_last_name`, `purpose`, `visitor_plate_number`, `visitor_vehicle_type`, `visitor_wheel`, `visitor_vehicle_color`) VALUES
(1, '2024-05-10', '00:00:00', 'Drake', 'Bling', 'Visiting cousin', '', '', 0, ''),
(2, '2024-05-11', '00:00:00', 'Kia', 'Madrid', 'Visiting cousin', '', '', 0, ''),
(3, '2024-06-06', '23:45:47', 'Mark', 'Francis', 'Visiting my date', 'NED-5725', 'Sedan', 4, ''),
(4, '2024-06-08', '17:12:43', 'Jerom', 'Ponce', 'Visiting Nurse', 'LOP-1212', 'Sedan', 4, ''),
(5, '2024-06-08', '17:20:11', 'Bernadette', 'Gorreon', 'Visiting', 'NED-5724', 'Sedan', 4, ''),
(6, '2024-06-10', '18:11:24', 'Juan Ponce', 'Enrile', 'PDAF', 'MIJ-90121', 'Lexus', 4, ''),
(7, '2024-06-12', '00:38:33', 'adsasd', 'sdfsdf', 'sdf', 'DFG', 'tyu', 6, ''),
(11, '2024-06-28', '13:40:49', 'KARL', 'ACIO', 'FOOD DELIVERY', 'DAF-1234', 'MOTOR', 2, 'BLACK'),
(12, '2024-06-30', '20:01:21', 'Jerome', 'Mal', 'Cuddles', 'NEU-1211', 'Sedan', 4, 'Black'),
(13, '2024-06-30', '20:09:44', 'Malik', 'Zayn', 'Cuddles', 'ULK-1211', 'Sedan', 4, 'White');

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
  MODIFY `account_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'This is the primary key for accounts.', AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `homeowners`
--
ALTER TABLE `homeowners`
  MODIFY `ho_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'This is the primary key for homeowners.', AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'This is the primary key.', AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `qr_info`
--
ALTER TABLE `qr_info`
  MODIFY `qr_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'This is the primary key.', AUTO_INCREMENT=196;

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
  MODIFY `info_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'This is the primary key.', AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `visitor_log`
--
ALTER TABLE `visitor_log`
  MODIFY `visitor_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
