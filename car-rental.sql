-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2019 at 04:25 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car-rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` bigint(20) NOT NULL,
  `car_model` varchar(50) NOT NULL,
  `plate_no` varchar(50) NOT NULL,
  `capacity` varchar(50) NOT NULL,
  `car_unit` varchar(50) NOT NULL,
  `car_color` varchar(50) NOT NULL,
  `car_type` varchar(50) NOT NULL,
  `car_name` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `manufacturer` varchar(50) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `car_model`, `plate_no`, `capacity`, `car_unit`, `car_color`, `car_type`, `car_name`, `price`, `manufacturer`, `created`) VALUES
(7, 'SENTRA', 'fa sdfa sdfasdf', 'ssd', 'dd', 'asd', 'dd', 'asdasd', 1200, 'asdasd', '2018-12-19 03:27:06'),
(9, 'WILDTRAC', 'ddddxxxx', 'a sda sd', 'a sda sd', 'asd asd', 'a sdasd ', 'asd asd ', 2000, 'a sdas dsad', '2019-01-06 01:03:57'),
(10, 'RANGER', 'dasda', 'asdasd', 'dasd', 'asdasd', 'asdasd', 'asdasd', 2500, '2500', '2019-01-06 01:40:44'),
(11, 'sdf sdf', 'sdfsdfsd', 'fsdfsd', 'fsdf', 'sdfsdf', 'sdfsdf', 'sdfsdf', 232, 'sdfsdfsdf', '2019-01-06 01:40:55'),
(12, 'xxx', 'xxx', 'xxxx', 'xxx', 'xxx', 'xxx', 'xxxx', 123123, 'xxxx', '2019-01-06 02:12:45');

-- --------------------------------------------------------

--
-- Table structure for table `car_trans`
--

CREATE TABLE `car_trans` (
  `car_trans_id` bigint(20) NOT NULL,
  `trans_id` bigint(20) NOT NULL,
  `car_id` bigint(20) NOT NULL,
  `pick_up_date` date NOT NULL,
  `pick_up_time` time NOT NULL,
  `return_date` date NOT NULL,
  `return_time` time NOT NULL,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_trans`
--

INSERT INTO `car_trans` (`car_trans_id`, `trans_id`, `car_id`, `pick_up_date`, `pick_up_time`, `return_date`, `return_time`, `total_price`) VALUES
(1, 10, 7, '2019-02-18', '08:00:00', '2019-02-22', '17:00:00', 1200),
(2, 10, 9, '2019-02-18', '08:00:00', '2019-02-22', '17:00:00', 2000),
(3, 11, 9, '2019-02-25', '08:00:00', '2019-02-26', '17:00:00', 2000),
(4, 11, 10, '2019-02-25', '08:00:00', '2019-02-26', '17:00:00', 2500),
(5, 12, 7, '2019-03-04', '08:00:00', '2019-03-08', '17:00:00', 1200),
(6, 12, 9, '2019-03-04', '08:00:00', '2019-03-08', '17:00:00', 2000),
(7, 13, 10, '2019-02-18', '08:00:00', '2019-02-22', '17:00:00', 2500),
(8, 14, 11, '2019-02-18', '08:00:00', '2019-02-18', '17:00:00', 232),
(9, 14, 12, '2019-02-18', '08:00:00', '2019-02-18', '17:00:00', 123123),
(10, 15, 7, '2019-02-16', '08:00:00', '2019-02-17', '17:00:00', 1200),
(11, 15, 9, '2019-02-16', '08:00:00', '2019-02-17', '17:00:00', 2000),
(12, 15, 10, '2019-02-16', '08:00:00', '2019-02-17', '17:00:00', 2500),
(13, 16, 7, '2019-03-09', '08:00:00', '2019-03-10', '17:00:00', 1200),
(14, 16, 9, '2019-03-09', '08:00:00', '2019-03-10', '17:00:00', 2000),
(15, 17, 11, '2019-02-16', '08:00:00', '2019-02-17', '17:00:00', 232),
(16, 18, 7, '2019-02-23', '08:00:00', '2019-02-24', '17:00:00', 1200),
(17, 18, 9, '2019-02-23', '08:00:00', '2019-02-24', '17:00:00', 2000),
(18, 19, 7, '2019-02-28', '08:00:00', '2019-02-28', '17:00:00', 1200);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `trans_id` bigint(20) NOT NULL,
  `transaction_no` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_info` tinytext NOT NULL,
  `total_amount` float NOT NULL,
  `status` varchar(50) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`trans_id`, `transaction_no`, `user_id`, `payment_info`, `total_amount`, `status`, `created`) VALUES
(2, '2019-7f72881a', 1, ' {\"payer_email\":\"loreto.gabawa.jr.sandbox@gmail.com\",\"payer_id\":\"BR386AM4VMX6L\",\"payer_status\":\"VERIFIED\",\"first_name\":\"Loreto\",\"last_name\":\"Gabawa Jr\",\"address_name\":\"Loreto Gabawa Jr\",\"address_street\":\"1 Main St\",\"address_city\":\"San Jose\",\"address_state', 0, 'VERIFIED', '2019-02-18 01:27:10'),
(3, '2019-5ce95f74', 1, '{\"payer_email\":\"loreto.gabawa.jr.sandbox@gmail.com\",\"payer_id\":\"BR386AM4VMX6L\",\"payer_status\":\"VERIFIED\",\"first_name\":\"Loreto\",\"last_name\":\"Gabawa Jr\",\"address_name\":\"Loreto Gabawa Jr\",\"address_street\":\"1 Main St\",\"address_city\":\"San Jose\",\"address_state\"', 0, 'VERIFIED', '2019-02-18 01:27:10'),
(4, '2019-5ce95f74', 1, '{\"payer_email\":\"loreto.gabawa.jr.sandbox@gmail.com\",\"payer_id\":\"BR386AM4VMX6L\",\"payer_status\":\"VERIFIED\",\"first_name\":\"Loreto\",\"last_name\":\"Gabawa Jr\",\"address_name\":\"Loreto Gabawa Jr\",\"address_street\":\"1 Main St\",\"address_city\":\"San Jose\",\"address_state\"', 0, 'VERIFIED', '2019-02-18 01:27:10'),
(5, '2019-10ffad76', 1, '{\"payer_email\":\"loreto.gabawa.jr.sandbox@gmail.com\",\"payer_id\":\"BR386AM4VMX6L\",\"payer_status\":\"VERIFIED\",\"first_name\":\"Loreto\",\"last_name\":\"Gabawa Jr\",\"address_name\":\"Loreto Gabawa Jr\",\"address_street\":\"1 Main St\",\"address_city\":\"San Jose\",\"address_state\"', 0, 'VERIFIED', '2019-02-18 01:27:10'),
(6, '2019-4bd12238', 1, '{\"payer_email\":\"loreto.gabawa.jr.sandbox@gmail.com\",\"payer_id\":\"BR386AM4VMX6L\",\"payer_status\":\"VERIFIED\",\"first_name\":\"Loreto\",\"last_name\":\"Gabawa Jr\",\"address_name\":\"Loreto Gabawa Jr\",\"address_street\":\"1 Main St\",\"address_city\":\"San Jose\",\"address_state\"', 0, 'VERIFIED', '2019-02-18 01:27:10'),
(7, '2019-4b73aeab', 1, '{\"payer_email\":\"loreto.gabawa.jr.sandbox@gmail.com\",\"payer_id\":\"BR386AM4VMX6L\",\"payer_status\":\"VERIFIED\",\"first_name\":\"Loreto\",\"last_name\":\"Gabawa Jr\",\"address_name\":\"Loreto Gabawa Jr\",\"address_street\":\"1 Main St\",\"address_city\":\"San Jose\",\"address_state\"', 0, 'VERIFIED', '2019-02-18 01:27:10'),
(8, '2019-3a0f8739', 1, '{\"payer_email\":\"loreto.gabawa.jr.sandbox@gmail.com\",\"payer_id\":\"BR386AM4VMX6L\",\"payer_status\":\"VERIFIED\",\"first_name\":\"Loreto\",\"last_name\":\"Gabawa Jr\",\"address_name\":\"Loreto Gabawa Jr\",\"address_street\":\"1 Main St\",\"address_city\":\"San Jose\",\"address_state\"', 0, 'VERIFIED', '2019-02-18 01:27:10'),
(9, '2019-e4953150', 1, '{\"payer_email\":\"loreto.gabawa.jr.sandbox@gmail.com\",\"payer_id\":\"BR386AM4VMX6L\",\"payer_status\":\"VERIFIED\",\"first_name\":\"Loreto\",\"last_name\":\"Gabawa Jr\",\"address_name\":\"Loreto Gabawa Jr\",\"address_street\":\"1 Main St\",\"address_city\":\"San Jose\",\"address_state\"', 0, 'VERIFIED', '2019-02-18 01:27:10'),
(10, '2019-55204e53', 1, '{\"payer_email\":\"loreto.gabawa.jr.sandbox@gmail.com\",\"payer_id\":\"BR386AM4VMX6L\",\"payer_status\":\"VERIFIED\",\"first_name\":\"Loreto\",\"last_name\":\"Gabawa Jr\",\"address_name\":\"Loreto Gabawa Jr\",\"address_street\":\"1 Main St\",\"address_city\":\"San Jose\",\"address_state\"', 0, 'VERIFIED', '2019-02-18 01:27:10'),
(11, '2019-063c9c41', 1, '{\"payer_email\":\"loreto.gabawa.jr.sandbox@gmail.com\",\"payer_id\":\"BR386AM4VMX6L\",\"payer_status\":\"VERIFIED\",\"first_name\":\"Loreto\",\"last_name\":\"Gabawa Jr\",\"address_name\":\"Loreto Gabawa Jr\",\"address_street\":\"1 Main St\",\"address_city\":\"San Jose\",\"address_state\"', 0, 'VERIFIED', '2019-02-18 01:27:10'),
(12, '2019-bb1730ff', 1, '{\"payer_email\":\"loreto.gabawa.jr.sandbox@gmail.com\",\"payer_id\":\"BR386AM4VMX6L\",\"payer_status\":\"VERIFIED\",\"first_name\":\"Loreto\",\"last_name\":\"Gabawa Jr\",\"address_name\":\"Loreto Gabawa Jr\",\"address_street\":\"1 Main St\",\"address_city\":\"San Jose\",\"address_state\"', 0, 'VERIFIED', '2019-02-18 01:27:10'),
(13, '2019-9b298131', 1, '{\"payer_email\":\"loreto.gabawa.jr.sandbox@gmail.com\",\"payer_id\":\"BR386AM4VMX6L\",\"payer_status\":\"VERIFIED\",\"first_name\":\"Loreto\",\"last_name\":\"Gabawa Jr\",\"address_name\":\"Loreto Gabawa Jr\",\"address_street\":\"1 Main St\",\"address_city\":\"San Jose\",\"address_state\"', 12500, 'pending', '2019-02-18 01:27:10'),
(14, '2019-1b61740a', 1, '{\"payer_email\":\"loreto.gabawa.jr.sandbox@gmail.com\",\"payer_id\":\"BR386AM4VMX6L\",\"payer_status\":\"VERIFIED\",\"first_name\":\"Loreto\",\"last_name\":\"Gabawa Jr\",\"address_name\":\"Loreto Gabawa Jr\",\"address_street\":\"1 Main St\",\"address_city\":\"San Jose\",\"address_state\"', 123355, 'pending', '2019-02-18 01:28:11'),
(15, '2019-7fc28d86', 1, '{\"payer_email\":\"loreto.gabawa.jr.sandbox@gmail.com\",\"payer_id\":\"BR386AM4VMX6L\",\"payer_status\":\"VERIFIED\",\"first_name\":\"Loreto\",\"last_name\":\"Gabawa Jr\",\"address_name\":\"Loreto Gabawa Jr\",\"address_street\":\"1 Main St\",\"address_city\":\"San Jose\",\"address_state\"', 11400, 'pending', '2019-02-18 01:35:26'),
(16, '2019-8bfb113c', 1, '{\"payer_email\":\"loreto.gabawa.jr.sandbox@gmail.com\",\"payer_id\":\"BR386AM4VMX6L\",\"payer_status\":\"VERIFIED\",\"first_name\":\"Loreto\",\"last_name\":\"Gabawa Jr\",\"address_name\":\"Loreto Gabawa Jr\",\"address_street\":\"1 Main St\",\"address_city\":\"San Jose\",\"address_state\"', 6400, 'pending', '2019-02-18 01:46:18'),
(17, '2019-2fac9e2c', 7, '{\"payer_email\":\"loreto.gabawa.jr.sandbox@gmail.com\",\"payer_id\":\"BR386AM4VMX6L\",\"payer_status\":\"VERIFIED\",\"first_name\":\"Loreto\",\"last_name\":\"Gabawa Jr\",\"address_name\":\"Loreto Gabawa Jr\",\"address_street\":\"1 Main St\",\"address_city\":\"San Jose\",\"address_state\"', 464, 'pending', '2019-02-18 02:04:48'),
(18, '2019-52a0eca0', 1, '{\"payer_email\":\"loreto.gabawa.jr.sandbox@gmail.com\",\"payer_id\":\"BR386AM4VMX6L\",\"payer_status\":\"VERIFIED\",\"first_name\":\"Loreto\",\"last_name\":\"Gabawa Jr\",\"address_name\":\"Loreto Gabawa Jr\",\"address_street\":\"1 Main St\",\"address_city\":\"San Jose\",\"address_state\"', 6400, 'pending', '2019-02-18 02:11:20'),
(19, '2019-323b9bcd', 7, '{\"payer_email\":\"loreto.gabawa.jr.sandbox@gmail.com\",\"payer_id\":\"BR386AM4VMX6L\",\"payer_status\":\"VERIFIED\",\"first_name\":\"Loreto\",\"last_name\":\"Gabawa Jr\",\"address_name\":\"Loreto Gabawa Jr\",\"address_street\":\"1 Main St\",\"address_city\":\"San Jose\",\"address_state\"', 1200, 'pending', '2019-02-20 01:17:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` char(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone_no` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `usertype` varchar(15) NOT NULL,
  `date_created` datetime NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `first_name`, `middle_name`, `last_name`, `phone_no`, `address`, `usertype`, `date_created`, `active`) VALUES
(1, 'admin', '1a1dc91c907325c69271ddf0c944bc72', 'xxx@gmail.com', 'Pancho', 'xxx', 'Pilato', 'jnkj', 'njnkjn', 'admin', '2018-11-10 16:05:39', 1),
(4, 'gloria', '1a1dc91c907325c69271ddf0c944bc72', 'asdasd@asdasd.com', 'Gloria', 'X', 'Diaz', '09123456789', 'asdasd', 'customer', '2019-01-06 02:21:16', 1),
(7, 'wang', '1a1dc91c907325c69271ddf0c944bc72', 'long@gmail.com', 'wang', 'd', 'long', '123', 'asdasd', 'customer', '2019-01-06 14:23:49', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `car_trans`
--
ALTER TABLE `car_trans`
  ADD PRIMARY KEY (`car_trans_id`),
  ADD KEY `car_id` (`car_id`),
  ADD KEY `trans_id` (`trans_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`trans_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `car_trans`
--
ALTER TABLE `car_trans`
  MODIFY `car_trans_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `trans_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car_trans`
--
ALTER TABLE `car_trans`
  ADD CONSTRAINT `car_trans_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `cars` (`car_id`),
  ADD CONSTRAINT `car_trans_ibfk_2` FOREIGN KEY (`trans_id`) REFERENCES `transactions` (`trans_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
