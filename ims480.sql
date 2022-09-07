-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2022 at 10:05 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ims480`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `des` varchar(100) NOT NULL,
  `unit` int(100) NOT NULL,
  `unitprice` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `des`, `unit`, `unitprice`, `created_at`) VALUES
(1, 'Shirt', 'good', 14, 450, '2022-09-05 14:52:05'),
(3, 'Anik', 'good', 50, 1234, '2022-09-05 14:52:36'),
(5, 'Anik', 'good', 560, 4654, '2022-09-07 19:39:10');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `sellunit` int(100) NOT NULL,
  `totalprice` int(100) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `productid` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `name`, `sellunit`, `totalprice`, `created_at`, `productid`) VALUES
(6, 'Shirt', 2, 900, '2022-09-05 15:35:23.235605', 1),
(7, 'Shirt', 1, 450, '2022-09-05 15:38:13.537607', 1),
(8, 'Shirt', 1, 450, '2022-09-05 15:38:57.778705', 1),
(9, 'Shirt', 6, 2700, '2022-09-05 15:39:02.314293', 1),
(10, 'Shirt', 1, 450, '2022-09-05 15:40:27.149784', 1),
(11, 'Anik', 0, 0, '2022-09-05 15:40:35.913893', 3),
(12, 'Anik', 1, 1234, '2022-09-05 15:40:38.090130', 3),
(13, 'Shirt', 5, 2250, '2022-09-07 17:04:31.664109', 1),
(14, 'Anik', 5, 23270, '2022-09-07 19:45:57.315523', 5),
(15, 'Anik', 5, 6170, '2022-09-07 19:45:59.738015', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
