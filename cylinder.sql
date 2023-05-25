-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 09, 2023 at 03:30 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cylinder`
--
ALTER TABLE `cylinder`
  ADD PRIMARY KEY (`transid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cylinder`
--
ALTER TABLE `cylinder`
  MODIFY `transid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
