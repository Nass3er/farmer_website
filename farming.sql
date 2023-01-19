-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2022 at 01:06 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farming`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `farmer_id` int(100) DEFAULT NULL,
  `quantity` int(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `orderState` bit(1) NOT NULL DEFAULT b'0',
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `farmer_id`, `quantity`, `photo`, `orderState`, `date`) VALUES
(68, 1, 1, 1, 2, 'uploadimages/child.jpg', b'1', '2022-10-28'),
(69, 1, 1, 1, 2, 'uploadimages/child.jpg', b'1', '2022-10-28'),
(70, 3, 2, 1, 2, 'uploadimages/farmteam.jpg', b'1', '2022-10-29');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `pname` varchar(200) NOT NULL,
  `pprice` double NOT NULL,
  `locality` varchar(200) NOT NULL,
  `quantity` int(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `shippingcharge` double NOT NULL,
  `salestate` bit(1) NOT NULL DEFAULT b'0',
  `userid` int(100) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pname`, `pprice`, `locality`, `quantity`, `category`, `shippingcharge`, `salestate`, `userid`, `photo`) VALUES
(1, 'banana', 60000, 'taiz', 55, 'vegtables', 34.5, b'1', 1, 'uploadimages/18-16-33-images.jpg'),
(2, 'apple ', 60000, 'taiz', 565, 'vegtables', 34.5, b'0', 1, 'uploadimages/18-16-10-rice.jpg'),
(3, 'apple ', 60000, 'taiz', 565, 'tomato', 34.5, b'0', 1, 'uploadimages/farmteam.jpg'),
(4, 'ninawaa bubble', 60000, 'nagran-damam', 46, 'tomato1', 54.5, b'0', 3, 'uploadimages/farm4.jpeg'),
(7, 'moroklka', 150000, 'nagran-damam', 35, 'tomato', 34.5, b'0', 3, 'uploadimages/f55.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `place` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `usertype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `place`, `email`, `mobile`, `usertype`) VALUES
(1, 'nasser', '$2y$10$g4pM1QlWZosEEgqsV2jhw.MtBNy4MmuaD8Q3XpgejEu.rQ51fkwV6', 'taiz yemen', 'n715527766@gmail.com', '7771652334', 'farmer'),
(2, 'nassser', '$2y$10$LUz6J4MUN8vO00/8fW1hCOTBcSXPGefSM1gIozl5oJ0tOKiU8vmA6', 'aden', 'nasser@email.com', '77764643', 'user'),
(3, 'nassser', '$2y$10$7nL6Ck6KlqnsckbmyrOd2Oex2.0v/6y3kiKa1AWrueNqVqP2608b.', 'aden', 'n@gmail.com', '77764643', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_product_farmer_id` (`user_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_product` (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
