-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2022 at 07:25 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users_tc`
--

-- --------------------------------------------------------

--
-- Table structure for table `contractors`
--

CREATE TABLE `contractors` (
  `id` int(11) NOT NULL,
  `fname` tinytext NOT NULL,
  `lname` tinytext NOT NULL,
  `address` text NOT NULL,
  `city` tinytext NOT NULL,
  `state` tinytext NOT NULL,
  `zip` tinytext NOT NULL,
  `phone` tinytext NOT NULL,
  `email` text NOT NULL,
  `license` int(11) NOT NULL,
  `social` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contractors`
--

INSERT INTO `contractors` (`id`, `fname`, `lname`, `address`, `city`, `state`, `zip`, `phone`, `email`, `license`, `social`, `date_created`) VALUES
(1, 'a', 'v', 'rqrq', 'rqr', 'tx', '55353', '5', 'afdg@gmail.com', 41342, '141421', '2022-03-29 15:00:50');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `cname` tinytext NOT NULL,
  `address` mediumtext NOT NULL,
  `city` tinytext NOT NULL,
  `state` tinytext NOT NULL,
  `zip` tinytext NOT NULL,
  `phone` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `bill_info` mediumtext NOT NULL,
  `credit` mediumtext NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `cname`, `address`, `city`, `state`, `zip`, `phone`, `email`, `bill_info`, `credit`, `date_created`) VALUES
(1, 'a', 'c', 'd', 'e', '5', '1', '352@gmail.com', '5', '1', '2022-03-29 17:18:52'),
(2, 'benis', 'crqrq', 'd12', 'e12421', '55555555', '151-52151-525', 'aaaa@gmail.org', '55555', '1', '2022-03-29 17:20:02');

-- --------------------------------------------------------

--
-- Table structure for table `trucks`
--

CREATE TABLE `trucks` (
  `id` int(11) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year` int(255) NOT NULL,
  `miles` int(5) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trucks`
--

INSERT INTO `trucks` (`id`, `model`, `year`, `miles`, `date_created`) VALUES
(1, 'Cool Truck', 1999, 2, '2022-02-14 23:04:39'),
(2, 'Monster Truck', 2069, 420, '2022-02-14 23:11:40'),
(3, 'another truck', 2050, 96500, '2022-02-14 23:24:43'),
(4, 'Mama Luigi', 123466, 42131, '2022-02-15 00:07:16'),
(5, 'alphabet', 123414, 9, '2022-02-15 00:07:38'),
(6, 'obama', 4141, 54645646, '2022-02-15 00:08:16'),
(7, 'Pootis', 192345, 1000000, '2022-02-15 03:23:38'),
(8, 'Pootis', 192345, 1000000, '2022-02-15 03:24:11'),
(9, 'Pootisb', 192345, 1000000, '2022-02-15 03:24:16'),
(10, '', 0, 0, '2022-02-15 03:24:20'),
(11, 'Apple', 1241, 242, '2022-02-15 03:32:09'),
(12, 'a', 4, 4, '2022-02-15 17:58:47'),
(13, 'Asdfghj97859', 3, 3, '2022-02-15 18:08:43'),
(14, 'Big truck', 1996, 525252, '2022-02-15 18:13:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `user_uid` varchar(30) NOT NULL,
  `user_pwd` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contractors`
--
ALTER TABLE `contractors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trucks`
--
ALTER TABLE `trucks`
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
-- AUTO_INCREMENT for table `contractors`
--
ALTER TABLE `contractors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trucks`
--
ALTER TABLE `trucks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `user_uid` varchar(30) NOT NULL,
  `user_pwd` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `employees` (
  `id` int(10) NOT NULL,
  `emp_uid` varchar(30) NOT NULL,
  `emp_pwd` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `adm_uid` varchar(30) NOT NULL,
  `adm_pwd` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
