-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2020 at 04:28 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `websales`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountadmin`
--

CREATE TABLE `accountadmin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accountadmin`
--

INSERT INTO `accountadmin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catid` int(100) NOT NULL,
  `catname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catid`, `catname`) VALUES
(1, 'do dien tu'),
(2, 'Smart phone');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cusid` int(50) NOT NULL,
  `cusname` varchar(50) NOT NULL,
  `ngaysinh` date NOT NULL,
  `gender` int(20) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cusid`, `cusname`, `ngaysinh`, `gender`, `address`, `phone`, `email`, `password`) VALUES
(9, 'nguyen hoang tuan vu', '2000-10-08', 1, 'thủ đức', '0935794380', 'avu7212@gmail.com', '8102000'),
(10, 'aaa', '0000-00-00', 1, 'thủ đức', '0935794380', 'avu7212@gmail.com', '8102000');

-- --------------------------------------------------------

--
-- Table structure for table `image_library`
--

CREATE TABLE `image_library` (
  `id` int(100) NOT NULL,
  `product id` int(100) NOT NULL,
  `path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mainproduct`
--

CREATE TABLE `mainproduct` (
  `id` int(100) NOT NULL,
  `ten` varchar(20) NOT NULL,
  `hinh` varchar(50) NOT NULL,
  `price` int(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mainproduct`
--

INSERT INTO `mainproduct` (`id`, `ten`, `hinh`, `price`, `description`) VALUES
(9, 'may anh', 'themes/images/products/4.jpg', 500000, 'may anh ki thuat so'),
(10, 'tablet', 'themes/images/products/kindle.png', 500000, 'may anh ki thuat so'),
(12, '', '	themes/images/products/large/f3.jpg', 0, ''),
(13, 'aaa', 'themes/images/products/b3.jpg', 2000, 'aaaaaaaaaaa');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `orderid` int(50) NOT NULL,
  `orderdate` date NOT NULL,
  `orderdes` text NOT NULL,
  `customerid` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `orderdetailid` int(50) NOT NULL,
  `orderid` int(50) NOT NULL,
  `productid` int(50) NOT NULL,
  `productquantity` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `proid` int(50) NOT NULL,
  `proname` text NOT NULL,
  `price` int(10) NOT NULL,
  `description` text NOT NULL,
  `photo` text NOT NULL,
  `catid` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`proid`, `proname`, `price`, `description`, `photo`, `catid`) VALUES
(1, 'quat', 2000, 'àasfsgdgds', 'themes/images/products/large/f3.jpg', 1),
(2, 'noi', 2000, 'asadasd', 'themes/images/products/b3.jpg', 1),
(3, 'den', 30000, 'aaaaaaaaaa', 'themes/images/products/b1.jpg', 1),
(4, 'but', 2000, 'aaaaaaaaa', 'themes/images/products/b2.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountadmin`
--
ALTER TABLE `accountadmin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cusid`);

--
-- Indexes for table `image_library`
--
ALTER TABLE `image_library`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product id` (`product id`);

--
-- Indexes for table `mainproduct`
--
ALTER TABLE `mainproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderid`),
  ADD KEY `customerid` (`customerid`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`orderdetailid`),
  ADD KEY `orderid` (`orderid`),
  ADD KEY `productid` (`productid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`proid`),
  ADD KEY `catid` (`catid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cusid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `image_library`
--
ALTER TABLE `image_library`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mainproduct`
--
ALTER TABLE `mainproduct`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `orderid` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `orderdetailid` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `proid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `image_library`
--
ALTER TABLE `image_library`
  ADD CONSTRAINT `image_library_ibfk_1` FOREIGN KEY (`product id`) REFERENCES `products` (`proid`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`customerid`) REFERENCES `customer` (`cusid`);

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`orderid`) REFERENCES `order` (`orderid`),
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`productid`) REFERENCES `products` (`proid`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`catid`) REFERENCES `category` (`catid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
