-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2024 at 02:35 AM
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
-- Database: `ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(6) UNSIGNED NOT NULL,
  `book_name` varchar(30) NOT NULL,
  `book_author` varchar(30) DEFAULT NULL,
  `book_price` decimal(7,2) NOT NULL,
  `book_category` varchar(30) DEFAULT NULL,
  `book_pages` int(6) DEFAULT NULL,
  `book_isbn_10` varchar(20) DEFAULT NULL,
  `book_isbn_13` varchar(20) DEFAULT NULL,
  `book_publication_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_name`, `book_author`, `book_price`, `book_category`, `book_pages`, `book_isbn_10`, `book_isbn_13`, `book_publication_date`) VALUES
(2, 'The Alchemist', 'Paulo Coelho', 200.00, 'Novel', NULL, NULL, NULL, NULL),
(3, 'Sherlock Holmes', 'Arthur Conan Doyle', 500.00, 'Novel', NULL, NULL, NULL, NULL),
(4, 'Harry Potter', 'J. K. Rowling', 1000.00, 'Novel', NULL, NULL, NULL, NULL),
(6, 'The Theory Of Everything', 'Stephen Hawking', 450.00, 'Cosmology', NULL, NULL, NULL, NULL),
(7, 'Atomic Habits', 'James Clear', 250.00, 'Self-Help', NULL, NULL, NULL, NULL),
(8, 'The Old Man and the Sea', 'Ernest Hemingway', 200.00, 'Novel', NULL, NULL, NULL, NULL),
(9, 'Web Coding & Development - Dum', 'Paul McFedries', 300.00, 'Programming', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `centralstore`
--

CREATE TABLE `centralstore` (
  `book_id` int(6) UNSIGNED NOT NULL,
  `stock` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `centralstore`
--

INSERT INTO `centralstore` (`book_id`, `stock`) VALUES
(2, 150),
(3, 200),
(4, 400),
(7, 100),
(6, 175);

-- --------------------------------------------------------

--
-- Table structure for table `headoffice`
--

CREATE TABLE `headoffice` (
  `book_id` int(6) UNSIGNED NOT NULL,
  `stock` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `headoffice`
--

INSERT INTO `headoffice` (`book_id`, `stock`) VALUES
(3, 30),
(2, 100),
(6, 50),
(7, 150);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `outlet`
--

CREATE TABLE `outlet` (
  `book_id` int(6) UNSIGNED NOT NULL,
  `stock` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `outlet`
--

INSERT INTO `outlet` (`book_id`, `stock`) VALUES
(2, 50),
(4, 300),
(6, 75),
(7, 80),
(8, 25);

-- --------------------------------------------------------

--
-- Table structure for table `permisison`
--

CREATE TABLE `permisison` (
  `permission_id` int(6) UNSIGNED NOT NULL,
  `role_id` varchar(10) NOT NULL,
  `permission_name` varchar(30) NOT NULL,
  `permission_module` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` varchar(10) NOT NULL,
  `role_name` varchar(30) NOT NULL,
  `role_description` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `invoice_id` int(6) UNSIGNED NOT NULL,
  `book_id` int(6) UNSIGNED NOT NULL,
  `sales_date` date NOT NULL,
  `quantity` int(6) NOT NULL,
  `transaction_amount` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`invoice_id`, `book_id`, `sales_date`, `quantity`, `transaction_amount`) VALUES
(9, 4, '2024-01-25', 3, 3000.00),
(10, 2, '2024-01-23', 5, 1000.00),
(14, 6, '2024-01-01', 10, 4500.00),
(15, 7, '2024-01-20', 2, 500.00),
(16, 8, '2024-01-10', 7, 1400.00);

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `transfer_id` int(6) UNSIGNED NOT NULL,
  `book_id` int(6) UNSIGNED NOT NULL,
  `transfer_date` date NOT NULL,
  `quantity` int(6) NOT NULL,
  `from_stock` varchar(30) NOT NULL,
  `to_stock` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(6) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_phone` varchar(14) NOT NULL,
  `user_email` varchar(30) DEFAULT NULL,
  `user_address` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `centralstore`
--
ALTER TABLE `centralstore`
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `headoffice`
--
ALTER TABLE `headoffice`
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `check_unique_username` (`username`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `outlet`
--
ALTER TABLE `outlet`
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `permisison`
--
ALTER TABLE `permisison`
  ADD PRIMARY KEY (`permission_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`transfer_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `permisison`
--
ALTER TABLE `permisison`
  MODIFY `permission_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `invoice_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `transfer_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
