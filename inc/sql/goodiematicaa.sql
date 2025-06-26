-- Cleaned SQL Dump for MariaDB

START TRANSACTION;
SET time_zone = "+00:00";

-- Database: `goodiematicaa`

-- Table: authcode
CREATE TABLE `authcode` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `orders` int NOT NULL,
  `maxOrders` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `authcode` (`id`, `code`, `orders`, `maxOrders`) VALUES
(1, 'admin321', 22, 9999),
(2, 'goodie-admin321', 6, 9999),
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

-- Table: category
CREATE TABLE `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'goodie'),
(2, 'other');

-- Table: product
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
(1, 'Green AA', 'Green 3D printed AA logo', 41, 2, 'assets/AA1.png', 1, 1),
(2, 'Blue AA', 'Blue 3D printed AA logo', 43, 1, 'assets/AA2.png', 1, 1),
(4, 'Red AA', 'Red 3D printed AA logo', 45, 0, 'assets/AA4.png', 1, 1),
(6, 'Yellow AA', 'Yellow 3D printed AA logo', 37, 4, 'assets/AA5.png', 1, 1),
(8, 'Multicolor Pen', 'Multicolor ballpoint pen (see position 13)', 13, 0, 'assets/pen1.png', 2, 1),
(9, 'Blue Pen', 'Blue ballpoint pen (see position 11)', 11, 1, 'assets/pen2.png', 2, 1),
(10, 'Pastel Pen', 'Pastel ballpoint pen (see position 15)', 15, 2, 'assets/pen3.png', 2, 1),
(15, 'Bounty', 'Bounty bar', 25, 2, 'assets/bounty.png', 3, 1),
(16, 'Mars', 'Mars bar', 26, 1, 'assets/mars.png', 3, 1),
(17, 'Milkyway', 'Milkyway bar', 27, 1, 'assets/milkyway.png', 3, 1),
(18, 'Twix', 'Twix bar', 28, 0, 'assets/twix.png', 3, 1),
(50, 'white monster', '500ml can of monster', 50, 0, 'assets/placeholderCards.png', 1, 2),
(51, 'blue monster', '500ml can of monster', 51, 2, 'assets/placeholderCards.png', 1, 2),
(52, 'green monster', '500ml can of monster', 52, 0, 'assets/placeholderCards.png', 1, 2),
(53, 'red monster', '500ml can of monster', 53, 0, 'assets/placeholderCards.png', 1, 2),
(54, 'purple monster', '500ml can of monster', 54, 0, 'assets/placeholderCards.png', 1, 2),
(55, 'orange monster', '500ml can of monster', 55, 0, 'assets/placeholderCards.png', 1, 2);

-- Set auto-increment values
ALTER TABLE `authcode` AUTO_INCREMENT = 474;
ALTER TABLE `category` AUTO_INCREMENT = 3;
ALTER TABLE `product` AUTO_INCREMENT = 57;

COMMIT;
