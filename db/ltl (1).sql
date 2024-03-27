-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2023 at 01:37 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ltl`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`) VALUES
(1, 'admin', '1234'),
(2, 'admin@admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `cleaners`
--

CREATE TABLE `cleaners` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `specialty` varchar(255) NOT NULL,
  `team` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cleaners`
--

INSERT INTO `cleaners` (`id`, `name`, `email`, `phone`, `specialty`, `team`) VALUES
(16, 'Kelvin Kip', 'kipkelvin@gmail.com', '0789986556', 'Pool Cleaning', 'Team A'),
(17, 'Alex Kimwe', 'alex@gmail.com', '0789987667', 'Pool Cleaning', 'Team B'),
(18, 'gwen Alekxi', 'gwen@gmail.com', '0789984334', 'Tank Cleaning', 'Team C');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(50) NOT NULL,
  `home_address` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `full_name`, `email`, `phone`, `home_address`, `password`, `date`) VALUES
(2, 'Natalie Kim', 'kim@gmail.com', 789987667, 'benedicta,utawala', '0000', '2023-11-25 12:07:08'),
(20, 'Kelvin Melvin ', 'melvin@gmail.com', 789867656, 'airport north road,embakasi', '0000', '2023-11-25 10:56:05'),
(30, 'trevor muthomi', 'muthomi@gmail.com', 112345249, 'airport north road,embakasi', '0000', '2023-11-26 11:49:39'),
(31, 'Joygun Oboyo', 'joygun@gmail.com', 789986556, 'airport north road,embakasi', '0000', '2023-11-26 14:35:10'),
(32, 'Terry Atieno', 'terry@gmail.com', 789986556, 'airport north road,embakasi', '0000', '2023-11-26 14:38:03'),
(52, 'Lucky Nzioka', 'lucky@gmail.com', 112345249, 'airport north road,embakasi', '0000', '2023-11-27 13:35:58'),
(53, 'Ndungwa Linet', 'ndungwalinet@gmail.com', 112345249, 'airport north road,embakasi', '0000', '2023-11-28 05:50:37');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `equip_id` int(11) NOT NULL,
  `equip_name` varchar(255) NOT NULL,
  `price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`equip_id`, `equip_name`, `price`) VALUES
(1, 'skimmer net', 1500),
(2, 'nylon brush ', 1000),
(3, 'robotic cleaner', 10000),
(4, 'telescopic pole', 1500),
(5, 'vacuum head with side brush ', 3500),
(6, 'algae brush ', 750);

-- --------------------------------------------------------

--
-- Table structure for table `equip_booking`
--

CREATE TABLE `equip_booking` (
  `booking_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `selected_service` varchar(255) NOT NULL,
  `cleaning_date` date NOT NULL,
  `number_of_equipment` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` varchar(100) NOT NULL,
  `booking_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equip_booking`
--

INSERT INTO `equip_booking` (`booking_id`, `user_email`, `selected_service`, `cleaning_date`, `number_of_equipment`, `total_price`, `status`, `booking_timestamp`) VALUES
(1, 'kim@gmail.com', 'nylon brush ', '2023-11-30', 2, 2000.00, '', '2023-11-27 06:56:39'),
(2, 'terry@gmail.com', 'algae brush ', '2023-11-28', 2, 1500.00, 'confirmed', '2023-11-27 07:29:07'),
(3, 'kim@gmail.com', 'skimmer net', '2023-12-05', 3, 4500.00, '', '2023-11-27 13:13:18'),
(4, 'ndungwalinet@gmail.com', 'skimmer net', '2023-11-29', 3, 4500.00, '', '2023-11-28 05:51:09'),
(5, 'ndungwalinet@gmail.com', 'skimmer net', '2023-11-29', 2, 3000.00, '', '2023-11-28 06:16:31');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `admin_response` text NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `name`, `email`, `subject`, `message`, `admin_response`, `Date`) VALUES
(2, 'trevor', 'muthomi@gmail.com', 'pool cleaning', 'can a pool full of water be cleaned?', 'hello', '2023-11-22 04:38:25'),
(4, 'Frankline Lange', 'frank@gmail.com', 'Multiple order', 'Can i place multiple order on the ame page?', 'ihuihogbg', '2023-11-21 08:27:14'),
(5, 'Lucky Frank', 'frank@gmail.com', 'Pricing', 'is the pricing given on service page fixed?', 'hi', '2023-11-24 10:02:59'),
(11, 'Timothy Kimono', 'kimono@gmail.com', 'booking', 'why was my order not confirmed', 'your order could not be processed because we are only operational in Nairobi', '2023-11-27 10:46:17');

-- --------------------------------------------------------

--
-- Table structure for table `pool`
--

CREATE TABLE `pool` (
  `pool_id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `chemical` varchar(255) NOT NULL,
  `price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pool`
--

INSERT INTO `pool` (`pool_id`, `service_name`, `chemical`, `price`) VALUES
(1, 'pool filter cleaning', 'trisodium phosphate \r\nmuriatic acid\r\nhydrochloric acid', 15000),
(2, 'pool vacuuming', 'none\r\nuse of pool vacuums ', 20000),
(4, 'pool wall cleaning', 'muriatic acid\r\nbleach\r\nchlorine\r\nbaking soda', 10000),
(5, 'pool tile cleaning', 'muriatic acid\r\nvinegar\r\nacetic acid\r\nborax\r\nbaking soda', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `pool_booking`
--

CREATE TABLE `pool_booking` (
  `booking_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `selected_service` varchar(255) NOT NULL,
  `allergy_preference` varchar(255) NOT NULL,
  `cleaning_date` date NOT NULL,
  `number_of_pools` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `team` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `booking_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pool_booking`
--

INSERT INTO `pool_booking` (`booking_id`, `user_email`, `selected_service`, `allergy_preference`, `cleaning_date`, `number_of_pools`, `total_price`, `team`, `status`, `booking_timestamp`) VALUES
(1, 'melvin@gmail.com', 'pool filter cleaning', 'none', '2023-11-29', 2, 30000.00, 'Team B', 'pending', '2023-11-26 12:46:23'),
(7, 'kim@gmail.com', 'pool filter cleaning', 'chlorine', '2023-12-15', 2, 45000.00, 'Team A', 'cancelled', '2023-11-26 14:20:36'),
(8, 'ndungwalinet@gmail.com', 'pool vacuuming', 'none', '2023-11-28', 4, 80000.00, 'Team B', 'pending', '2023-11-26 16:13:27'),
(9, 'terry@gmail.com', 'pool filter cleaning', 'chlorine', '2023-11-29', 2, 30000.00, 'Team A', 'pending', '2023-11-27 07:31:08'),
(10, 'ndungwalinet@gmail.com', 'pool filter cleaning', 'none', '2023-11-30', 2, 30000.00, '', '', '2023-11-28 06:26:06');

-- --------------------------------------------------------

--
-- Table structure for table `tank`
--

CREATE TABLE `tank` (
  `tank_id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `chemical` varchar(255) NOT NULL,
  `price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tank`
--

INSERT INTO `tank` (`tank_id`, `service_name`, `chemical`, `price`) VALUES
(1, 'water tank cleaning', 'chlorine\r\nbio/oil dispersant', 30000),
(2, 'oil tank cleaning', 'chlorine\r\nxylene\r\ntoulene\r\ndetergent', 55000),
(3, 'food and beverage tank cleaning', 'detergent\r\nchlorine', 50000),
(4, 'chemical tank cleaning', 'ammonia\r\nsimple green\r\nchlorine', 70000);

-- --------------------------------------------------------

--
-- Table structure for table `tank_booking`
--

CREATE TABLE `tank_booking` (
  `booking_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `selected_service` varchar(255) NOT NULL,
  `allergy_preference` varchar(255) NOT NULL,
  `cleaning_date` date NOT NULL,
  `number_of_tanks` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `team` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `booking_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tank_booking`
--

INSERT INTO `tank_booking` (`booking_id`, `user_email`, `selected_service`, `allergy_preference`, `cleaning_date`, `number_of_tanks`, `total_price`, `team`, `status`, `booking_timestamp`) VALUES
(2, 'melvin@gmail.com', 'water tank cleaning', 'chlorine', '2023-11-30', 1, 30000.00, 'Team C', 'cancelled', '2023-11-27 07:12:30'),
(3, 'melvin@gmail.com', 'water tank cleaning', 'chlorine', '2023-11-29', 2, 60000.00, 'Team C', 'confirmed', '2023-11-27 07:12:38'),
(4, 'terry@gmail.com', 'water tank cleaning', 'chlorine', '2023-11-28', 3, 90000.00, 'Team C', '', '2023-11-27 07:30:09'),
(5, 'ndungwalinet@gmail.com', 'water tank cleaning', 'none', '2023-11-29', 2, 60000.00, '', '', '2023-11-28 06:22:49');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `team_id` int(11) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `specialty` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`team_id`, `team_name`, `specialty`) VALUES
(1, 'Team A', 'pool cleaning'),
(2, 'Team B', 'pool cleaning'),
(3, 'Team C', 'tank cleaning'),
(4, 'Team D', 'tank cleaning');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cleaners`
--
ALTER TABLE `cleaners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`equip_id`);

--
-- Indexes for table `equip_booking`
--
ALTER TABLE `equip_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pool`
--
ALTER TABLE `pool`
  ADD PRIMARY KEY (`pool_id`);

--
-- Indexes for table `pool_booking`
--
ALTER TABLE `pool_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tank`
--
ALTER TABLE `tank`
  ADD PRIMARY KEY (`tank_id`);

--
-- Indexes for table `tank_booking`
--
ALTER TABLE `tank_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cleaners`
--
ALTER TABLE `cleaners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `equip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `equip_booking`
--
ALTER TABLE `equip_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pool`
--
ALTER TABLE `pool`
  MODIFY `pool_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pool_booking`
--
ALTER TABLE `pool_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tank`
--
ALTER TABLE `tank`
  MODIFY `tank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tank_booking`
--
ALTER TABLE `tank_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
