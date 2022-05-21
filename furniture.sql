-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 28, 2021 at 10:48 AM
-- Server version: 8.0.23-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furniture`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `aname` varchar(100) NOT NULL,
  `apass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `aname`, `apass`) VALUES
(1, 'prasad', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `categories` varchar(50) NOT NULL,
  `status` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories`, `status`) VALUES
(1, 'LIVING ROOM', 1),
(2, 'BED ROOM', 1),
(3, 'WASH ROOM', 1),
(4, 'KITCHEN ROOM', 1),
(5, 'WOODEN TEMPLE', 1),
(6, 'CHAIRS', 1),
(7, 'DOORS', 1),
(8, 'SOFAS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(75) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `comment` text NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pincode` int NOT NULL,
  `payment_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `payment_status` varchar(25) NOT NULL,
  `order_status` int NOT NULL,
  `total_price` float NOT NULL,
  `added_on` datetime NOT NULL,
  `txnid` varchar(100) NOT NULL,
  `mihpayid` varchar(20) NOT NULL,
  `payu_status` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `address`, `city`, `pincode`, `payment_type`, `payment_status`, `order_status`, `total_price`, `added_on`, `txnid`, `mihpayid`, `payu_status`) VALUES
(16, 1, 'M.G.road', 'Satana', 423301, 'payu', 'success', 5, 599, '2021-04-27 10:41:11', '58d7a2f0f716f7c9e812', '403993715523038059', ''),
(17, 1, 'M.G.road', 'Satana', 423301, 'payu', 'success', 3, 599, '2021-04-27 10:42:55', 'c0ea6c8c52a4f3302d1d', '403993715523038062', ''),
(18, 1, 'M.G.road', 'Satana', 423301, 'COD', 'pending', 1, 2331, '2021-04-27 10:51:55', '7203ae4d8a7e50e3d382', '', ''),
(19, 1, 'M.G.road', 'Satana', 423301, 'payu', 'success', 1, 599, '2021-04-27 10:53:40', '76c1f0b651389cbe34ff', '403993715523038083', ''),
(20, 1, 'M.G.road', 'Satana', 423301, 'payu', 'pending', 1, 333, '2021-04-27 10:54:49', '76c145899d8f7e9235b5', '', ''),
(21, 1, 'M.G.road', 'Satana', 423301, 'COD', 'pending', 1, 599, '2021-04-27 10:55:05', '85b5595f8bd5b0844786', '', ''),
(22, 1, 'M.G.road', 'Satana', 423301, 'COD', 'pending', 1, 599, '2021-04-27 11:00:27', '3a7d92ae62ca42c01c36', '', ''),
(23, 1, 'M.G.road', 'Satana', 423301, 'COD', 'pending', 1, 333, '2021-04-27 11:03:50', '4606b329a4a174f654f4', '', ''),
(24, 1, 'M.G.road', 'Satana', 423301, 'COD', 'pending', 1, 9999, '2021-04-28 12:23:12', '5d9b5aae5a149c23a655', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `qty` int NOT NULL,
  `price` float NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `qty`, `price`, `added_on`) VALUES
(17, 0, 2, 1, 333, '2021-04-27 10:36:00'),
(19, 16, 4, 1, 599, '2021-04-27 10:41:11'),
(20, 17, 4, 1, 599, '2021-04-27 10:42:55'),
(21, 18, 2, 7, 333, '2021-04-27 10:51:55'),
(22, 19, 4, 1, 599, '2021-04-27 10:53:40'),
(23, 20, 1, 1, 333, '2021-04-27 10:54:49'),
(24, 21, 4, 1, 599, '2021-04-27 10:55:05'),
(25, 22, 4, 1, 599, '2021-04-27 11:00:27'),
(26, 23, 2, 1, 333, '2021-04-27 11:03:50'),
(27, 24, 12, 1, 9999, '2021-04-28 12:23:12');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int NOT NULL,
  `name` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'pending'),
(2, 'processing'),
(3, 'shipped'),
(4, 'Cancelled'),
(5, 'delivered');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `categories_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `mrp` float NOT NULL,
  `price` float NOT NULL,
  `qty` int NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'NO IMG',
  `short_desc` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `meta_title` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `meta_desc` varchar(2000) NOT NULL,
  `meta_keyword` varchar(2000) NOT NULL,
  `status` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `categories_id`, `name`, `mrp`, `price`, `qty`, `img`, `short_desc`, `description`, `meta_title`, `meta_desc`, `meta_keyword`, `status`) VALUES
(1, 1, 'Prasad Patil', 222, 333, 54, '659_living1.jpg', 'fqwfwffqfwf', 'wdawddaad', 'adas', 'asd', 'asd', 1),
(2, 1, 'XXXX', 222, 333, 54, '787_living2.jpg', 'fqwfwffqfwf', 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \\\'Content here, content here\\\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \\\'lorem ipsum\\\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'adas', 'asd', 'asd', 1),
(3, 1, 'RACK', 899, 599, 15, '489_living3.jpg', 'adsdssaddasd', 'asdasdasdasd', 'asdasd', 'asdasdas', 'asdasd', 1),
(4, 1, 'TV CORNER', 899, 599, 15, '176_living4.jpg', 'adsdssaddasd', 'asdasdasdasd', 'asdasd', 'asdasdas', 'asdasd', 1),
(12, 5, 'R P', 13999, 9999, 15, '449_temp5.jpg', 'versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `uname` varchar(255) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `mob` varchar(15) NOT NULL,
  `addrs` varchar(100) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `uname`, `name`, `email`, `mob`, `addrs`, `pass`, `added_on`) VALUES
(1, 'prasad123', 'Prasad Patil', 'prasadpatil1771997@gmail.com', '+919420693397', 'M.G.road', 'admin', '2021-04-25 09:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
