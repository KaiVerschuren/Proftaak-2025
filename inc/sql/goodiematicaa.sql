
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";






CREATE TABLE `authcode` (
  `id` int NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `orders` int NOT NULL,
  `maxOrders` int NOT NULL
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
(462, 'admin321', 15, 9999),
(463, 'goodie-admin321', 43, 9999),
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
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `category` (`id`, `name`) VALUES
(1, 'goodie'),
(2, 'other\r\n');



CREATE TABLE `product` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `position` int NOT NULL,
  `orderCount` int NOT NULL,
  `img` varchar(255) NOT NULL,
  `productSet` int NOT NULL,
  `categoryId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `product` (`id`, `name`, `description`, `position`, `orderCount`, `img`, `productSet`, `categoryId`) VALUES
(1, 'Red AA', 'Red 3D printed AA logo', 11, 1, 'assets/placeholderCards.png', 1, 1),
(2, 'Blue AA', 'Blue 3D printed AA logo', 13, 1, 'assets/placeholderCards.png', 1, 1),
(3, 'Green AA', 'Green 3D printed AA logo', 15, 0, 'assets/placeholderCards.png', 1, 1),
(4, 'Yellow AA', 'Yellow 3D printed AA logo', 17, 0, 'assets/placeholderCards.png', 1, 1),
(5, 'Black AA', 'Black 3D printed AA logo', 21, 0, 'assets/placeholderCards.png', 1, 1),
(6, 'White AA', 'White 3D printed AA logo', 23, 2, 'assets/placeholderCards.png', 1, 1),
(7, 'Purple AA', 'Purple 3D printed AA logo', 25, 1, 'assets/placeholderCards.png', 1, 1),
(8, 'Red Pen', 'Red 3D printed pen', 26, 0, 'assets/placeholderCards.png', 2, 1),
(9, 'Blue Pen', 'Blue 3D printed pen', 27, 0, 'assets/placeholderCards.png', 2, 1),
(10, 'Green Pen', 'Green 3D printed pen', 28, 0, 'assets/placeholderCards.png', 2, 1),
(11, 'Yellow Pen', 'Yellow 3D printed pen', 31, 0, 'assets/placeholderCards.png', 2, 1),
(12, 'Black Pen', 'Black 3D printed pen', 35, 0, 'assets/placeholderCards.png', 2, 1),
(13, 'White Pen', 'White 3D printed pen', 37, 2, 'assets/placeholderCards.png', 2, 1),
(14, 'Purple Pen', 'Purple 3D printed pen', 41, 3, 'assets/placeholderCards.png', 2, 1),
(15, 'Red Monster Can', 'Red 3D printed Monster can', 42, 0, 'assets/placeholderCards.png', 3, 1),
(16, 'Blue Monster Can', 'Blue 3D printed Monster can', 43, 1, 'assets/placeholderCards.png', 3, 1),
(17, 'Green Monster Can', 'Green 3D printed Monster can', 44, 0, 'assets/placeholderCards.png', 3, 1),
(18, 'Yellow Monster Can', 'Yellow 3D printed Monster can', 45, 0, 'assets/placeholderCards.png', 3, 1),
(19, 'Black Monster Can', 'Black 3D printed Monster can', 48, 0, 'assets/placeholderCards.png', 3, 1),
(20, 'White Monster Can', 'White 3D printed Monster can', 51, 2, 'assets/placeholderCards.png', 3, 1),
(21, 'Purple Monster Can', 'Purple 3D printed Monster can', 52, 2, 'assets/placeholderCards.png', 3, 1),
(50, 'white monster', '500ml can of monster', 53, 0, 'assets/placeholderCards.png', 1, 2),
(51, 'blue monster', '500ml can of monster', 54, 2, 'assets/placeholderCards.png', 1, 2),
(52, 'green monster', '500ml can of monster', 55, 0, 'assets/placeholderCards.png', 1, 2),
(53, 'red monster', '500ml can of monster', 56, 0, 'assets/placeholderCards.png', 1, 2),
(54, 'purple monster', '500ml can of monster', 57, 0, 'assets/placeholderCards.png', 1, 2),
(55, 'orange monster', '500ml can of monster', 55, 0, 'assets/placeholderCards.png', 1, 2);


ALTER TABLE `authcode`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`categoryId`);


ALTER TABLE `authcode`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=474;

ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;


ALTER TABLE `product`
  ADD CONSTRAINT `category` FOREIGN KEY (`categoryId`) REFERENCES `category` (`id`);
COMMIT;
