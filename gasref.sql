-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 09, 2023 at 03:26 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gasref`
--

-- --------------------------------------------------------

--
-- Table structure for table `cylinder`
--

CREATE TABLE `cylinder` (
  `transid` int(11) NOT NULL,
  `size` varchar(100) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `modifyuser` varchar(100) DEFAULT NULL,
  `modifydate` datetime DEFAULT current_timestamp(),
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cylinder`
--

INSERT INTO `cylinder` (`transid`, `size`, `price`, `modifyuser`, `modifydate`, `deleted`) VALUES
(1, '5kg', '60.00', 'roland', '2023-05-07 18:05:21', 0),
(2, '6kg', '80.00', 'roland', '2023-05-07 18:09:24', 0),
(3, '13kg', '190.00', 'roland', '2023-05-07 18:10:02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `transid` varchar(100) NOT NULL,
  `order_no` varchar(100) NOT NULL,
  `user_code` varchar(100) NOT NULL,
  `cylinder_size` varchar(50) NOT NULL,
  `delivery_date` date NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `subtotal` decimal(11,2) NOT NULL,
  `delivery` decimal(11,2) NOT NULL,
  `discount` decimal(11,2) DEFAULT NULL,
  `order_date` date NOT NULL,
  `delivered_date` datetime DEFAULT NULL,
  `confirm_date` datetime DEFAULT NULL,
  `pick_date` datetime DEFAULT NULL,
  `user_confirm` tinyint(1) NOT NULL,
  `status` enum('Pending','Confirmed','Picked','Delivered','Cancelled') NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`transid`, `order_no`, `user_code`, `cylinder_size`, `delivery_date`, `total`, `subtotal`, `delivery`, `discount`, `order_date`, `delivered_date`, `confirm_date`, `pick_date`, `user_confirm`, `status`, `deleted`) VALUES
('11798e', '#2023050001', 'USR6456440130a95', '5kg', '2023-05-08', '75.00', '60.00', '15.00', '0.00', '2023-05-08', NULL, NULL, NULL, 0, 'Pending', 0),
('dbc654', '#2023050002', 'USR6456440130a95', '5kg', '2023-05-08', '75.00', '60.00', '15.00', '0.00', '2023-05-08', NULL, NULL, NULL, 0, 'Pending', 0),
('d9fc99', '#2023050003', 'USR6456440130a95', '5kg', '2023-05-08', '75.00', '60.00', '15.00', '0.00', '2023-05-08', NULL, '2023-05-09 03:36:55', NULL, 1, 'Pending', 0),
('7d7e82', '#2023050004', 'USR6456440130a95', '6kg', '2023-05-08', '95.00', '80.00', '15.00', '0.00', '2023-04-08', '2023-05-09 03:37:26', NULL, NULL, 1, 'Delivered', 0),
('0397bc', '#2023050005', 'USR6456440130a95', '6kg', '2023-05-18', '95.00', '80.00', '15.00', '0.00', '2023-05-08', NULL, NULL, NULL, 1, 'Confirmed', 0),
('2edeff', '#2023050006', 'USR6459c2e6dfc40', '5kg', '2023-05-09', '75.00', '60.00', '15.00', '0.00', '2023-05-09', NULL, '2023-05-09 04:39:57', NULL, 1, 'Confirmed', 0),
('c9d284', '#2023050007', 'USR645a45d1990dc', '6kg', '2023-05-09', '95.00', '80.00', '15.00', '0.00', '2023-05-09', NULL, '2023-05-09 13:12:01', NULL, 1, 'Confirmed', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `transid` bigint(20) UNSIGNED NOT NULL,
  `user_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gps_location` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `street_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `house_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_type` enum('customer','admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deleted` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `createdate` date NOT NULL DEFAULT '2021-08-12',
  `createuser` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `modifydate` date DEFAULT NULL,
  `modifyuser` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`transid`, `user_code`, `fname`, `lname`, `email`, `phone`, `gps_location`, `street_name`, `house_no`, `user_type`, `password`, `remember_token`, `deleted`, `createdate`, `createuser`, `modifydate`, `modifyuser`) VALUES
(32, 'USR6456440130a95', 'Roland', 'Dodoo', 'rolalu.me@gmail.com', '0557353686', 'GA-rrolsnd', NULL, NULL, 'customer', '$2y$10$xNykPMShh4PQg/gsU8omP.aDKX174nVyAsSw/TMf9CoLgGcjghU8e', 'PvV7y1CuVqQ1SPMhXMTZuQXA4vyZqZgb0zdcwtrsz3p7QYgKvRI1eTdSxSmg', '0', '2023-05-06', NULL, NULL, NULL),
(33, 'USR6458cfa4b748d', 'Admin', 'Roland', 'bernard@gmail.com', '05567238443', 'GA-rrolsnd', NULL, NULL, 'admin', '$2y$10$vYx3SFLdvBhS2ToKnXXUC.AH6/UrChDLIEw/MCMe8ta/Ia8A65dRe', 'Dmc2A97Ril5rPOlVLqt6IoAMQoZ7zRuKYbzENSZXgsWYxFiRVZ3TNkT1Ku17', '0', '2023-05-08', NULL, NULL, NULL),
(34, 'USR6459c2e6dfc40', 'Dennis Gyan', 'Azong', 'rol@gmail.com', '+233557353689', 'GA-rrolsnd', NULL, NULL, 'customer', '$2y$10$irwKcbnGrbcZ6gicZ75Y/.OgjLpAM1EaMveE1BhCG8a73RmWNaZ0u', 'rvO3yvA9ATIwE8LuIVOFHt12yUfrsD4POfwrUJdclXrJwTXFIYqKWIAnXfJG', '0', '2023-05-09', NULL, NULL, NULL),
(35, 'USR645a45d1990dc', 'John', 'Doe', 'rol2@gmail.com', '+233557353483', 'GA-rrolsnd', NULL, NULL, 'customer', '$2y$10$saRfA41vgVvPYBjsTx46Ue/z5MntmUGh7aY5/wfw8A41c1vfix0pu', '9eNVn5ykxBGg9pwL5IeJUt38iXnkFedHCfFdBEdLY6bpMzozP68eTahdZ4UL', '0', '2023-05-09', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cylinder`
--
ALTER TABLE `cylinder`
  ADD PRIMARY KEY (`transid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_no`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`transid`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cylinder`
--
ALTER TABLE `cylinder`
  MODIFY `transid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `transid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
