-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2021 at 01:35 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pay_and_drive`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `password`, `name`) VALUES
('122', 'c4ca4238a0b923820dcc509a6f75849b', ''),
('admin', 'c4ca4238a0b923820dcc509a6f75849b', ''),
('admin21', 'c4ca4238a0b923820dcc509a6f75849b', ''),
('admin3', 'c4ca4238a0b923820dcc509a6f75849b', ''),
('admin4', 'c4ca4238a0b923820dcc509a6f75849b', ''),
('admin42', 'c4ca4238a0b923820dcc509a6f75849b', ''),
('admin5', 'c4ca4238a0b923820dcc509a6f75849b', ''),
('admin6', 'c4ca4238a0b923820dcc509a6f75849b', ''),
('admin7', 'c4ca4238a0b923820dcc509a6f75849b', ''),
('admin8', 'c4ca4238a0b923820dcc509a6f75849b', '');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `police_id` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `time_in` time NOT NULL,
  `time_out` varchar(50) DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `police_id`, `status`, `time_in`, `time_out`, `date`) VALUES
(15, 'E002', 'late', '14:41:30', NULL, '2021-10-09'),
(16, 'E001', 'present', '15:53:40', '15:57:35', '2021-10-09');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `license_number` varchar(255) NOT NULL,
  `complaint` varchar(1000) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `response` varchar(1000) NOT NULL,
  `date_res` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `license_number`, `complaint`, `subject`, `date`, `status`, `response`, `date_res`) VALUES
(10, 'B4580458', 'wtfffff', 'wtf', '2021-09-29', 'pending', 'nkwjb jfbhj', '2021-09-29'),
(11, 'B4580458', 'wtfffff', 'wtf', '2021-09-29', 'responded', 'ok yef geafb auywf yuaefb  jyewgfv yuwegf  yefgygef yugef yuwe wuyefuyawe fyuawegfuy uyweft6ef ', '2021-09-29'),
(12, 'B3790677', 'test sb hg u ', 'test', '2021-09-29', 'responded', 'test response', '2021-09-29'),
(13, 'B3790677', 'test sb hg u ', 'test', '2021-09-29', 'responded', 'ai hutto', '2021-10-05');

-- --------------------------------------------------------

--
-- Table structure for table `fines`
--

CREATE TABLE `fines` (
  `fine_number` varchar(255) NOT NULL,
  `license_number` varchar(255) NOT NULL,
  `vehicle_number` varchar(255) NOT NULL,
  `date_of_offence` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `place` varchar(255) NOT NULL,
  `nature` varchar(255) NOT NULL,
  `date_expire` date DEFAULT NULL,
  `court` varchar(255) NOT NULL,
  `police_station` varchar(255) NOT NULL,
  `police_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `pc_id` varchar(255) NOT NULL,
  `date_issue` date DEFAULT NULL,
  `court_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fines`
--

INSERT INTO `fines` (`fine_number`, `license_number`, `vehicle_number`, `date_of_offence`, `time`, `place`, `nature`, `date_expire`, `court`, `police_station`, `police_id`, `status`, `amount`, `pc_id`, `date_issue`, `court_date`) VALUES
('00768', 'B4580458', 'cp KH 4598', '2021-09-25', '11:11:00', 'kandy mahiyawa', 'crossing the double line', '2021-09-29', 'kandy', 'kandy city ', 'E001', 'Court', '2800', '', '2021-09-25', '2021-10-09'),
('1', 'B4580458', '1', '2021-10-09', '11:27:00', 'aniwatta nihals super', 'Over Speeding and Crossing the double line ', '2021-09-25', 'kandy', 'kandy city ', 'E001', 'Completed', '3545', '', '2021-10-02', '2021-09-29'),
('1234', 'B3790677', 'CH 4578', '2021-10-06', '17:35:00', 'aniwatta down', 'ehema wisheshayak na', '2021-11-05', 'kandy', 'kandy city ', 'E002', 'payed', '1200', '', '2021-09-28', '2021-10-12'),
('511499', 'B4580458', 'CAJ 5463', '2021-09-09', '11:17:00', 'aniwatta nihals super', 'crossing the double line', '2021-10-09', 'kandy', '', 'E002', 'Completed', '1500', '', '2021-09-09', '2021-09-23'),
('56753', 'B4580458', 'CAJ 5456', '2021-10-06', '18:39:00', 'kandy mahiyawa', 'crossing the double line', '2021-10-05', 'kandy', 'kandy city ', 'E002', 'payed', '1800', '', '2021-09-28', '2021-10-12');

-- --------------------------------------------------------

--
-- Table structure for table `license_inventory`
--

CREATE TABLE `license_inventory` (
  `id` int(255) NOT NULL,
  `police_id` varchar(255) NOT NULL,
  `license_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `latitude` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `longitude` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `info` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Marker icon'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `latitude`, `longitude`, `name`, `info`, `icon`) VALUES
(1, '7.295174', '80.636811', 'kandy', '1521 1st Ave, Seattle, WA', '../Resources/marker.png'),
(2, '7.293567', '80.639398', 'Kandy 2', 'wecjbfjc', '../Resources/marker.png'),
(4, '6.925336', '79.850854', 'col 1', 'colombo', '../Resources/marker.png'),
(5, '7.293308', '80.633317', 'kandy', 'kandy ', '../Resources/pmarker.png');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `bill_id` int(255) NOT NULL,
  `fine_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment_center`
--

CREATE TABLE `payment_center` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `admin_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_center`
--

INSERT INTO `payment_center` (`id`, `name`, `password`, `admin_id`) VALUES
('m001', 'Yasith Rodrigo', 'c4ca4238a0b923820dcc509a6f75849b', 'm001');

-- --------------------------------------------------------

--
-- Table structure for table `police`
--

CREATE TABLE `police` (
  `id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact_number` int(255) DEFAULT NULL,
  `police_id` varchar(255) NOT NULL,
  `admin_id` varchar(255) DEFAULT NULL,
  `rfid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `police`
--

INSERT INTO `police` (`id`, `password`, `name`, `address`, `contact_number`, `police_id`, `admin_id`, `rfid`) VALUES
('p1', 'c4ca4238a0b923820dcc509a6f75849b', 'yasith rodrigo', 'kandy', 77867131, 'E002', 'E002', '179555D3'),
('p2', 'c4ca4238a0b923820dcc509a6f75849b', 'banura', '23', 771161599, 'E001', 'E001', 'D534B6C3');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `password` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `nic` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `date_issue` date DEFAULT NULL,
  `date_expire` date DEFAULT NULL,
  `vehicle_type` varchar(255) DEFAULT NULL,
  `license_number` varchar(255) NOT NULL,
  `contact_number` int(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`password`, `name`, `nic`, `address`, `dob`, `blood_group`, `date_issue`, `date_expire`, `vehicle_type`, `license_number`, `contact_number`, `email`) VALUES
('c4ca4238a0b923820dcc509a6f75849b', '1', '1234', '1', '2021-10-08', 'o+', '2021-10-27', '2021-10-21', 'light_vehicle', '1234', 771161599, ''),
('c81e728d9d4c2f636f067f89cc14862c', 'Bharana Jayawardhana', '672010152v', 'Pink house,1st lane, Samagi mawatha, Bandarawela', '1967-07-13', 'B+', '2017-03-17', '2025-03-17', 'light_vehicle', 'B3790677', 771161599, ''),
('6fbb1c1b0046519486b19e2c2a6a0860', 'Banura Pahan Jayawardhane', '2147483647', '345, Kumnuregedara road, halloluwa, Kandy', '2001-08-13', 'o+', '2019-09-09', '2027-09-05', 'light_vehicle', 'B4580458', 771161599, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fines`
--
ALTER TABLE `fines`
  ADD PRIMARY KEY (`fine_number`),
  ADD KEY `police_id` (`police_id`);

--
-- Indexes for table `license_inventory`
--
ALTER TABLE `license_inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `fine_number` (`fine_number`);

--
-- Indexes for table `payment_center`
--
ALTER TABLE `payment_center`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `police`
--
ALTER TABLE `police`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `police_id` (`police_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`license_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `license_inventory`
--
ALTER TABLE `license_inventory`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `bill_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fines`
--
ALTER TABLE `fines`
  ADD CONSTRAINT `fines_ibfk_1` FOREIGN KEY (`police_id`) REFERENCES `police` (`police_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
