-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2023 at 04:59 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventorymanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `id` int(6) UNSIGNED NOT NULL,
  `product_id` int(6) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `Model` varchar(50) NOT NULL,
  `serialnumber` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `studentnumber` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `position` varchar(50) NOT NULL,
  `collegeunit` varchar(50) NOT NULL,
  `event` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `product_id` int(20) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `Model` varchar(100) NOT NULL,
  `quantity` int(10) NOT NULL,
  `serialnumber` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `itemreports`
--

CREATE TABLE `itemreports` (
  `product_id` int(20) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `Model` varchar(100) NOT NULL,
  `quantity` int(10) NOT NULL,
  `serialnumber` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `itemreports`
--

INSERT INTO `itemreports` (`product_id`, `product_name`, `Model`, `quantity`, `serialnumber`, `description`) VALUES
(5, 'Lenovo.', 'Phone', 0, '5 4 1 6 10', 'Old'),
(6, 'Dell.', 'Monitor', 0, '2 7 8 6 3', 'Broken'),
(7, 'Lenovo.', 'Phone', 0, '5 4 1 6 10', 'Old'),
(8, 'Apple.', 'Mac', 0, '6 8 3 10 7', 'BROKEN'),
(9, 'Dell.', 'Monitor', 0, '2 7 8 6 3', 'May sira'),
(10, 'Samsung.', 'Phone', 0, '7 9 6 1 4', 'broken'),
(11, 'Toshiba.', 'Keyboard', 0, '4 9 8 1 3', 'broken'),
(12, 'Samsung.', 'Phone', 0, '7 9 6 1 4', 'nasunog'),
(13, 'Asus.', 'Laptop', 0, '1 5 4 7 9', 'Brand new');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(6) UNSIGNED NOT NULL,
  `product_id` int(6) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `Model` varchar(50) NOT NULL,
  `serialnumber` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `studentnumber` varchar(10) NOT NULL,
  `returndate` date NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `product_id`, `product_name`, `Model`, `serialnumber`, `description`, `firstname`, `lastname`, `studentnumber`, `returndate`, `date`) VALUES
(5, 109, 'Lenovo.', 'Phone', '5 4 1 6 10', 'Old', 'rensteve', 'elmido', '2022304850', '2023-06-02', '2023-06-02'),
(6, 110, 'Toshiba.', 'Keyboard', '4 9 8 1 3', 'Brand new', 'rensteve', 'elmido', '2022304850', '2023-06-02', '2023-06-02'),
(7, 111, 'Asus.', 'Laptop', '1 5 4 7 9', 'Brand new', 'rensteve', 'elmido', '2022304850', '2023-06-02', '2023-06-02'),
(8, 110, 'Toshiba.', 'Keyboard', '4 9 8 1 3', 'Brand new', 'Ace', 'Duran', '2022304853', '2023-06-02', '2023-06-02'),
(9, 111, 'Asus.', 'Laptop', '1 5 4 7 9', 'Brand new', 'Ace', 'Duran', '2022304853', '2023-06-02', '2023-06-02'),
(10, 155, 'HP.', 'Desktop', '9 6 5 4 8', 'Brand new', 'Russell', 'Cabang', '2022304850', '2023-06-02', '2023-06-02'),
(11, 157, 'Dell.', 'Monitor', '2 7 8 6 3', 'Brand new', 'Russell', 'Cabang', '2022304850', '2023-06-02', '2023-06-02'),
(12, 196, 'Microsoft.', 'Computer', '3 6 7 4 2', 'Brand new', 'Russell', 'Cabang', '2022304850', '2023-06-02', '2023-06-02'),
(13, 154, 'Apple.', 'Mac', '6 8 3 10 7', 'Brand new', 'Emmanuel', 'Cruz', '2022304851', '2023-06-02', '2023-05-31'),
(14, 156, 'Microsoft.', 'Computer', '3 6 7 4 2', 'Brand new', 'Emmanuel', 'Cruz', '2022304851', '2023-06-02', '2023-05-31'),
(15, 154, 'Apple.', 'Mac', '6 8 3 10 7', 'Brand new', 'benjamin', 'lovedoreal', '2022304855', '2023-06-02', '2023-06-09'),
(16, 155, 'HP.', 'Desktop', '9 6 5 4 8', 'Brand new', 'benjamin', 'lovedoreal', '2022304855', '2023-06-02', '2023-06-09'),
(17, 154, 'Apple.', 'Mac', '6 8 3 10 7', 'Brand new', 'rensteve', 'rensteve', '2222222222', '2023-06-02', '2023-06-03'),
(18, 154, 'Apple.', 'Mac', '6 8 3 10 7', 'Brand new', 'prince', 'mauricio', '5555555555', '2023-06-02', '2023-06-02'),
(19, 157, 'Dell.', 'Monitor', '2 7 8 6 3', 'Brand new', 'prince', 'mauricio', '5555555555', '2023-06-02', '2023-06-02'),
(24, 156, 'Microsoft.', 'Computer', '3 6 7 4 2', 'Brand new', 'prince', 'mauricio', '5555555555', '2023-06-02', '2023-06-02'),
(25, 177, 'Asus.', 'Laptop', '1 5 4 7 9', 'Brand new', 'rensteve', 'elmido', '2022304850', '2023-06-02', '2023-06-02');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(20) NOT NULL,
  `quantity` int(10) NOT NULL,
  `order_date` date NOT NULL,
  `order_price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `Model` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `serialnumber` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `datecreated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `Model`, `quantity`, `serialnumber`, `description`, `datecreated`) VALUES
(63, 'Apple.', 'Mac', 0, '6 8 3 10 7', 'new', '2023-06-02'),
(64, 'HP.', 'Desktop', 0, '9 6 5 4 8', 'new', '2023-06-09'),
(65, 'Microsoft.', 'Computer', 0, '3 6 7 4 2', 'broken', '2023-06-16'),
(66, 'Dell.', 'Monitor', 1, '2 7 8 6 3', 'Brand new', NULL),
(67, 'Samsung.', 'Phone', 1, '7 9 6 1 4', 'Brand new', NULL),
(68, 'Lenovo.', 'Phone', 1, '5 4 1 6 10', 'Old', NULL),
(69, 'Toshiba.', 'Keyboard', 1, '4 9 8 1 3', 'Brand new', NULL),
(70, 'Asus.', 'Laptop', 1, '1 5 4 7 9', 'Brand new', NULL),
(71, 'we', 'qww', 1, '222222', 'ew', '2023-06-02'),
(72, 'Apple.', 'Mac', 0, '6 8 3 10 7', 'Brand new', '2023-06-14'),
(73, 'HP.', 'Desktop', 1, '9 6 5 4 8', 'Brand new', NULL),
(74, 'Microsoft.', 'Computer', 1, '3 6 7 4 2', 'Brand new', NULL),
(75, 'Dell.', 'Monitor', 1, '2 7 8 6 3', 'Brand new', NULL),
(76, 'Samsung.', 'Phone', 1, '7 9 6 1 4', 'Brand new', NULL),
(77, 'Lenovo.', 'Phone', 1, '5 4 1 6 10', 'Old', NULL),
(78, 'Toshiba.', 'Keyboard', 1, '4 9 8 1 3', 'Brand new', NULL),
(79, 'Asus.', 'Laptop', 1, '1 5 4 7 9', 'Brand new', NULL),
(81, 'Apple.', 'Mac', 1, '6 8 3 10 7', 'Brand new', NULL),
(82, 'HP.', 'Desktop', 1, '9 6 5 4 8', 'Brand new', NULL),
(83, 'Microsoft.', 'Computer', 1, '3 6 7 4 2', 'Brand new', NULL),
(84, 'Dell.', 'Monitor', 1, '2 7 8 6 3', 'Brand new', NULL),
(85, 'Samsung.', 'Phone', 1, '7 9 6 1 4', 'Brand new', NULL),
(86, 'Lenovo.', 'Phone', 1, '5 4 1 6 10', 'Old', NULL),
(87, 'Toshiba.', 'Keyboard', 1, '4 9 8 1 3', 'Brand new', NULL),
(88, 'Asus.', 'Laptop', 0, '1 5 4 7 9', 'Brand new', '2023-06-07');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `username` varchar(20) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password_1` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`username`, `first_name`, `last_name`, `email`, `password_1`) VALUES
('rensteve33122', 'Rensteve', 'Elmido', 'rensteveselmido@tua.edu.ph', '25f9e794323b453885f5181f1b624d0b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `itemreports`
--
ALTER TABLE `itemreports`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `itemreports`
--
ALTER TABLE `itemreports`
  MODIFY `product_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
