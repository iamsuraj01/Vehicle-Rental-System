-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2019 at 12:28 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ovrs`
--

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pno` int(11) NOT NULL,
  `v_type` varchar(255) NOT NULL,
  `d_rate` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id`, `name`, `address`, `pno`, `v_type`, `d_rate`) VALUES
(1, 'Ram Gayawali', 'Kathmandu', 2147483647, 'car', 1200),
(2, 'Suraj Gaire', 'Kathmandu', 2147483647, 'van', 1000),
(3, 'Patan Sharma', 'Pokhara', 2147483647, 'bike', 500),
(6, 'Suraj Gaire', 'Biratnagar', 2147483647, 'bus', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_register`
--

CREATE TABLE `tbl_register` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_register`
--

INSERT INTO `tbl_register` (`id`, `name`, `email`, `password`, `address`, `phone_no`) VALUES
(7, 'Suraj Gaire', 'ram1@gmail.com', '12345', 'tansen', '98454212'),
(8, 'Ram Dhakal', 'ram1@gmail.com', '123456', 'Bhaktapur', '2147483647'),
(9, 'Sujan Kandel', 'sujan@gmail.com', '1234567', 'Tansen', '2147483647'),
(10, 'Ram Shah', 'ram2@gmail.com', '1234', 'Dharan', '9845712564'),
(11, 'Ravi Thapa', 'ravi@gmail.com', '12345678', 'Biratnagar', '9847215256'),
(12, 'Hari Dhakal', 'hari@gmail.com', '12345678', 'Dharan', '9860365404'),
(13, 'Pramod Nepal', 'pramod@gmail.com', '12345678', 'Tansen', '9821589655'),
(14, 'Garima Kandel', 'garima@gmail.com', 'garima1234', 'Sinamangal', '986532312'),
(15, 'abc', 'cde@fgh.com', '123456', 'Dharan', '9876543234'),
(16, 'asa', 'abc@def', '12345678', 'Dharan', '9847215256');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rent`
--

CREATE TABLE `tbl_rent` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `v_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rent`
--

INSERT INTO `tbl_rent` (`id`, `user_id`, `v_id`, `price`, `start_date`, `end_date`) VALUES
(20, 11, 8, 3000, '2019-07-20 00:00:00', '2019-07-22 00:00:00'),
(21, 12, 14, 3000, '2019-07-20 00:00:00', '2019-07-21 00:00:00'),
(22, 12, 1, -1000, '2019-07-20 00:00:00', '2019-07-18 00:00:00'),
(23, 13, 15, 3000, '2019-07-20 00:00:00', '2019-07-21 00:00:00'),
(24, 13, 8, 3000, '2019-07-20 00:00:00', '2019-07-22 00:00:00'),
(25, 13, 9, 3500, '2019-07-20 00:00:00', '2019-07-21 00:00:00'),
(26, 13, 8, 1500, '2019-07-21 00:00:00', '2019-07-22 00:00:00'),
(27, 13, 8, 1000, '2019-07-21 00:00:00', '2019-07-22 00:00:00'),
(28, 15, 8, 2000, '2019-07-21 00:00:00', '2019-07-23 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehical`
--

CREATE TABLE `tbl_vehical` (
  `id` int(11) NOT NULL,
  `v_name` varchar(255) NOT NULL,
  `v_type` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `rate` float NOT NULL,
  `v_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_vehical`
--

INSERT INTO `tbl_vehical` (`id`, `v_name`, `v_type`, `model`, `description`, `rate`, `v_img`) VALUES
(1, 'Suzuki', 'car', '1475', 'Suzuki Altra', 500, 'ridge.jpg'),
(6, 'Honda', 'car', 'Crz', 'Engiene 9656 cc 5 seats', 3000, 'tacoma_hero.png'),
(8, 'Suzuki', 'bike', 'Suzuki Gixxer', '2 seat 35kmpg mileage', 1000, 'suzuki_gixxer.png'),
(9, 'Tata', 'van', 'Tata tiago', 'Engiene 9656 cc 5 seats', 2500, 'mahindra-marazzo.jpg'),
(16, 'Mahindra', 'car', 'Mahindra Scorpio', '6 seated 20 kmpl mileage', 5000, 'mahindra-scorpio.jpg'),
(17, 'Mahindra ', 'van', 'Mahindra Supro', '8 seated 20 kmpl mileage', 7000, 'mahindra-supro.jpg'),
(18, 'Hero', 'bike', 'Hero Super Splender', '80 kmpl mileage', 700, 'hero-splendor-plus-black-purple-silver.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `username`, `password`) VALUES
(8, '', '', 'ram@gmail.com', '12345'),
(9, 'Suraj Gaire', '9865465', 'suraj@yahoo.com', 'ad583f113ad3e6f84ff827ab9ebba541');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_register`
--
ALTER TABLE `tbl_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_rent`
--
ALTER TABLE `tbl_rent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vehical`
--
ALTER TABLE `tbl_vehical`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_register`
--
ALTER TABLE `tbl_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_rent`
--
ALTER TABLE `tbl_rent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_vehical`
--
ALTER TABLE `tbl_vehical`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
