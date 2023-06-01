-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2023 at 08:49 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

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
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`id`, `product_id`, `product_name`, `Model`, `serialnumber`, `description`, `firstname`, `lastname`, `studentnumber`, `date`) VALUES
(4, 112, 'qwerty', 'qwerty', '22222222222', 'brand new', 'ace', 'qwe', '3333333333', '2023-07-08'),
(5, 109, 'Lenovo.', 'Phone', '5 4 1 6 10', 'Old', 'rensteve', 'elmido', '2222222222', '2023-06-30');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `product_id`, `product_name`, `Model`, `serialnumber`, `description`, `firstname`, `lastname`, `studentnumber`, `date`) VALUES
(1, 109, 'Lenovo.', 'Phone', '5 4 1 6 10', 'Old', 'rensteve', 'weqweqwe', '2222222222', '2023-06-29'),
(2, 110, 'Toshiba.', 'Keyboard', '4 9 8 1 3', 'Brand new', 'ace', 'qwe', '3333333333', '2023-07-08');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(20) NOT NULL,
  `quantity` int(10) NOT NULL,
  `order_date` date NOT NULL,
  `order_price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(20) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `Model` varchar(100) NOT NULL,
  `quantity` int(10) NOT NULL,
  `serialnumber` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `Model`, `quantity`, `serialnumber`, `description`) VALUES
(102, 'Razer', 'Mouse', 0, '55566482', 'brand new'),
(103, 'Logitech', 'Keyboard', 0, '22232323', 'brand new'),
(104, 'Razer', 'Keyboard', 0, '55566482', 'brand new'),
(105, 'HP.', 'Desktop', 0, '9 6 5 4 8', 'Brand new'),
(106, 'Microsoft.', 'Computer', 0, '3 6 7 4 2', 'Brand new'),
(107, 'Dell.', 'Monitor', 0, '2 7 8 6 3', 'Broken'),
(108, 'Samsung.', 'Phone', 0, '7 9 6 1 4', 'Brand new'),
(109, 'Lenovo.', 'Phone', 0, '5 4 1 6 10', 'Old'),
(110, 'Toshiba.', 'Keyboard', 1, '4 9 8 1 3', 'Brand new'),
(111, 'Asus.', 'Laptop', 0, '1 5 4 7 9', 'Brand new'),
(112, 'qwerty', 'qwerty', 0, '22222222222', 'brand new'),
(115, 'wwwwwww', 'wwwwwwww', 0, '2222222222222222222222', 'new');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`username`, `first_name`, `last_name`, `email`, `password_1`) VALUES
('admin123', 'admin', 'admin123', 'admin123@gmail.com', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `product_id` int(20) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `studentnumber` varchar(10) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `itemserialborrow` varchar(100) NOT NULL,
  `itemborrow` varchar(100) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`product_id`, `firstname`, `lastname`, `studentnumber`, `product_name`, `description`, `itemserialborrow`, `itemborrow`, `date`) VALUES
(20, 'rens', 'elmido', '2147483647', '0', '', '', '', '2023-06-10'),
(21, 'elmido', 'rensteve', '2147483647', '0', '', '', '', '2023-06-07'),
(22, 'rensteve', 'elmido', '2147483647', '0', '', '', '', '2023-06-12'),
(23, 'rens', 'ehasd', '2147483647', '0', '', '', '', '2023-06-08'),
(24, 'weqwe', 'rens', '2147483647', '0', '', '', '', '2023-06-01'),
(37, 'russell', 'cabang', '9999999999', '0', '', '', '', '2023-07-12');

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
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `borrow_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `cart` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
