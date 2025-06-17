-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 17, 2025 at 10:11 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goodiematicaa`
--

-- --------------------------------------------------------

--
-- Table structure for table `authcode`
--

CREATE TABLE `authcode` (
  `id` int NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `orders` int NOT NULL,
  `maxOrders` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `authcode`
--

INSERT INTO `authcode` (`id`, `code`, `orders`, `maxOrders`) VALUES
(450, 'goodie-balky0', 0, 1),
(451, 'goodie-filmy8', 0, 1),
(452, 'goodie-deign8', 0, 1),
(453, 'goodie-amber4', 0, 1),
(454, 'goodie-udder8', 0, 1),
(455, 'torso4', 0, 1),
(456, 'charm6', 0, 1),
(457, 'nerdy2', 0, 1),
(458, 'cairn6', 0, 1),
(459, 'lodge1', 0, 1),
(462, 'admin321', 15, 9999),
(463, 'goodie-admin321', 1, 9999);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'goodie'),
(2, 'other\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `position` int NOT NULL,
  `img` varchar(255) NOT NULL,
  `productSet` int NOT NULL,
  `categoryId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `position`, `img`, `productSet`, `categoryId`) VALUES
(1, 'Red AA', 'Red 3D printed AA logo', 11, 'assets/placeholderCards.png', 1, 1),
(2, 'Blue AA', 'Blue 3D printed AA logo', 13, 'assets/placeholderCards.png', 1, 1),
(3, 'Green AA', 'Green 3D printed AA logo', 15, 'assets/placeholderCards.png', 1, 1),
(4, 'Yellow AA', 'Yellow 3D printed AA logo', 17, 'assets/placeholderCards.png', 1, 1),
(5, 'Black AA', 'Black 3D printed AA logo', 21, 'assets/placeholderCards.png', 1, 1),
(6, 'White AA', 'White 3D printed AA logo', 23, 'assets/placeholderCards.png', 1, 1),
(7, 'Purple AA', 'Purple 3D printed AA logo', 25, 'assets/placeholderCards.png', 1, 1),
(8, 'Red Pen', 'Red 3D printed pen', 26, 'assets/placeholderCards.png', 2, 1),
(9, 'Blue Pen', 'Blue 3D printed pen', 27, 'assets/placeholderCards.png', 2, 1),
(10, 'Green Pen', 'Green 3D printed pen', 28, 'assets/placeholderCards.png', 2, 1),
(11, 'Yellow Pen', 'Yellow 3D printed pen', 31, 'assets/placeholderCards.png', 2, 1),
(12, 'Black Pen', 'Black 3D printed pen', 35, 'assets/placeholderCards.png', 2, 1),
(13, 'White Pen', 'White 3D printed pen', 37, 'assets/placeholderCards.png', 2, 1),
(14, 'Purple Pen', 'Purple 3D printed pen', 41, 'assets/placeholderCards.png', 2, 1),
(15, 'Red Monster Can', 'Red 3D printed Monster can', 42, 'assets/placeholderCards.png', 3, 1),
(16, 'Blue Monster Can', 'Blue 3D printed Monster can', 43, 'assets/placeholderCards.png', 3, 1),
(17, 'Green Monster Can', 'Green 3D printed Monster can', 44, 'assets/placeholderCards.png', 3, 1),
(18, 'Yellow Monster Can', 'Yellow 3D printed Monster can', 45, 'assets/placeholderCards.png', 3, 1),
(19, 'Black Monster Can', 'Black 3D printed Monster can', 46, 'assets/placeholderCards.png', 3, 1),
(20, 'White Monster Can', 'White 3D printed Monster can', 48, 'assets/placeholderCards.png', 3, 1),
(21, 'Purple Monster Can', 'Purple 3D printed Monster can', 51, 'assets/placeholderCards.png', 3, 1),
(50, 'white monster', '500ml can of monster', 50, 'assets/placeholderCards.png', 1, 2),
(51, 'blue monster', '500ml can of monster', 51, 'assets/placeholderCards.png', 1, 2),
(52, 'green monster', '500ml can of monster', 52, 'assets/placeholderCards.png', 1, 2),
(53, 'red monster', '500ml can of monster', 53, 'assets/placeholderCards.png', 1, 2),
(54, 'purple monster', '500ml can of monster', 54, 'assets/placeholderCards.png', 1, 2),
(55, 'orange monster', '500ml can of monster', 55, 'assets/placeholderCards.png', 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authcode`
--
ALTER TABLE `authcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`categoryId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authcode`
--
ALTER TABLE `authcode`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=464;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `category` FOREIGN KEY (`categoryId`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
