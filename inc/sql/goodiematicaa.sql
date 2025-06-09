-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 09, 2025 at 02:27 PM
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
(342, 'eclat8', 0, 5),
(343, 'gauge0', 0, 5),
(344, 'lemon7', 0, 5),
(345, 'daisy7', 0, 5),
(346, 'velar4', 0, 5),
(347, 'nymph4', 0, 5),
(348, 'amber7', 0, 5),
(349, 'bloom9', 0, 5),
(350, 'dream7', 0, 5),
(351, 'serum9', 0, 5),
(352, 'lotus2', 0, 5),
(353, 'sofia4', 0, 5),
(354, 'fauna1', 0, 5),
(355, 'daisy7', 0, 5),
(356, 'peony2', 0, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authcode`
--
ALTER TABLE `authcode`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authcode`
--
ALTER TABLE `authcode`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=357;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
