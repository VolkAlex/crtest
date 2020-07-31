SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `symfony_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `symfony_db`;

CREATE TABLE `discount` (
  `id` int(11) NOT NULL,
  `products` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phonelastnum` int(11) DEFAULT NULL,
  `isbornbefore` tinyint(1) DEFAULT NULL,
  `isbornafter` tinyint(1) DEFAULT NULL,
  `isphone` tinyint(1) DEFAULT NULL,
  `discount` int(11) NOT NULL,
  `begin` date NOT NULL,
  `end` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `discount` (`id`, `products`, `sex`, `phonelastnum`, `isbornbefore`, `isbornafter`, `isphone`, `discount`, `begin`, `end`) VALUES
(3, '1,2', NULL, NULL, NULL, NULL, NULL, 25, '2020-01-01', NULL),
(4, '6', 'f', NULL, NULL, NULL, NULL, 30, '2020-01-01', NULL);

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `product` (`id`, `name`, `price`, `description`) VALUES
(1, 'услуга 1', '200.00', '1'),
(2, 'услуга 2', '250.00', '2'),
(3, 'услуга 3 ', '220.00', '3'),
(4, 'услуга 4', '230.00', '4'),
(5, 'услуга 5', '110.00', '5'),
(6, 'услуга 6', '300.00', '6');


ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
