-- Cleaned SQL Dump for MariaDB
-- phpMyAdmin SQL Dump
-- Compatible with MariaDB

START TRANSACTION;
SET time_zone = "+00:00";

-- Database: `goodiematicaa`

CREATE TABLE `authcode` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `orders` int NOT NULL,
  `maxOrders` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `authcode` (`id`, `code`, `orders`, `maxOrders`) VALUES
(450, 'goodie-balky0', 1, 1),
(451, 'goodie-filmy8', 1, 1),
(452, 'goodie-deign8', 1, 1),
(453, 'goodie-amber4', 1, 1),
(454, 'goodie-udder8', 1, 1),
(455, 'torso4', 1, 1),
(456, 'charm6', 0, 1),
(457, 'nerdy2', 0, 1),
(458, 'cairn6', 0, 1),
(459, 'lodge1', 0, 1),
(462, 'admin321', 22, 9999),
(463, 'goodie-admin321', 49, 9999),
(464, 'goodie-angel0', 0, 5),
(465, 'goodie-rouge3', 0, 5),
(466, 'goodie-alibi5', 0, 5),
(467, 'goodie-xenia2', 0, 5),
(468, 'goodie-chive6', 1, 5),
(469, 'goodie-spine0', 0, 1),
(470, 'goodie-gloom8', 0, 1),
(471, 'goodie-deign8', 0, 1),
(472, 'goodie-joust8', 1, 1),
(473, 'goodie-punch1', 1, 1);

CREATE TABLE `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'goodie'),
(2, 'other');

CREATE TABLE `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `position` int NOT NULL,
  `orderCount` int NOT NULL,
  `img` varchar(255) NOT NULL,
  `productSet` int NOT NULL,
  `categoryId` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category` (`categoryId`),
  CONSTRAINT `category` FOREIGN KEY (`categoryId`) REFERENCES `category` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `product` (`id`, `name`, `description`, `position`, `orderCount`, `img`, `productSet`, `categoryId`) VALUES
(1, 'Orange AA', 'Orange 3D printed AA logo', 11, 2, 'assets/AA1.png', 1, 1),
(2, 'Blue AA', 'Blue 3D printed AA logo', 13, 1, 'assets/AA2.png', 1, 1),
(3, 'White AA', 'White 3D printed AA logo', 15, 3, 'assets/AA3.png', 1, 1),
(4, 'Red AA', 'Red 3D printed AA logo', 17, 0, 'assets/AA4.png', 1, 1),
(6, 'Yellow AA', 'Yellow 3D printed AA logo', 23, 4, 'assets/AA5.png', 1, 1),
(8, 'Green Pen', 'Green ballpoint pen', 26, 0, 'assets/pen1.png', 2, 1),
(9, 'Blue Pen', 'Blue ballpoint pen', 27, 1, 'assets/pen2.png', 2, 1),
(10, 'Black Pen', 'Black ballpoint pen', 28, 2, 'assets/pen3.png', 2, 1),
(11, 'Red Pen', 'Red ballpoint pen', 31, 0, 'assets/pen4.png', 2, 1),
(15, 'Bounty', 'Bounty bar', 42, 2, 'assets/bounty.png', 3, 1),
(16, 'Mars', 'Mars bar', 43, 1, 'assets/mars.png', 3, 1),
(17, 'Bros', 'Bros bar', 44, 1, 'assets/bros.png', 3, 1),
(18, 'Frisia', 'Frisia bag', 45, 0, 'assets/frisia.png', 3, 1),
(50, 'white monster', '500ml can of monster', 50, 0, 'assets/placeholderCards.png', 1, 2),
(51, 'blue monster', '500ml can of monster', 51, 2, 'assets/placeholderCards.png', 1, 2),
(52, 'green monster', '500ml can of monster', 52, 0, 'assets/placeholderCards.png', 1, 2),
(53, 'red monster', '500ml can of monster', 53, 0, 'assets/placeholderCards.png', 1, 2),
(54, 'purple monster', '500ml can of monster', 54, 0, 'assets/placeholderCards.png', 1, 2),
(55, 'orange monster', '500ml can of monster', 55, 0, 'assets/placeholderCards.png', 1, 2);

COMMIT;
