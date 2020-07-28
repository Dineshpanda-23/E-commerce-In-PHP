-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 28, 2020 at 07:53 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

DROP TABLE IF EXISTS `order_product`;
CREATE TABLE IF NOT EXISTS `order_product` (
  `order_id` int(200) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `product_id` (`product_id`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`order_id`, `product_id`, `user_id`) VALUES
(78, 1, 14),
(79, 1, 14),
(80, 2, 14),
(81, 3, 14),
(82, 4, 14);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `pdName` varchar(200) NOT NULL,
  `pdImg` varchar(200) NOT NULL,
  `pdDisc` varchar(500) NOT NULL,
  `pdPrice` int(100) NOT NULL,
  `pdCatg` varchar(100) NOT NULL,
  `pdID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`pdID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pdName`, `pdImg`, `pdDisc`, `pdPrice`, `pdCatg`, `pdID`) VALUES
('Nokia Max Pro', 'product_img/mobile.png', 'Nokia Max Pro(Glacial Green 6GB RAM+128GB Storage)', 50000, 'Mobile', 1),
('Samsung Galaxy S10 ', 'product_img/s10.jpg', 'Samsung Galaxy S10 (Prism Blue, 8GB RAM, 128GB Storage)', 49999, 'Mobile', 2),
('OnePlus 8 Pro ', 'product_img/18.jpg', 'OnePlus 8 Pro (Glacial Green 8GB RAM+128GB Storage)', 54999, 'Mobile', 3),
('Apple iPhone 11 Pro Max', 'product_img/apple.jpg', '\r\nApple iPhone 11 Pro Max (64GB) - Midnight Green', 117100, 'Mobile', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `userFirstName` varchar(500) NOT NULL,
  `userLastName` varchar(500) NOT NULL,
  `userMobile` varchar(20) NOT NULL,
  `userEmail` varchar(500) NOT NULL,
  `userPassword` varchar(500) DEFAULT NULL,
  `userAddress` text NOT NULL,
  `userCity` varchar(90) NOT NULL,
  `userState` varchar(100) NOT NULL,
  `userCountry` varchar(50) NOT NULL,
  `userZip` varchar(20) NOT NULL,
  `userOrder` int(200) DEFAULT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `userFirstName`, `userLastName`, `userMobile`, `userEmail`, `userPassword`, `userAddress`, `userCity`, `userState`, `userCountry`, `userZip`, `userOrder`) VALUES
(14, 'Prince', 'vishwakarma', '08756599427', 'princevworld@gmail.com', '4eae18cf9e54a0f62b44176d074cbe2f', 'gorakhpur', 'gorakhpur', 'Uttar Pradesh', 'India', '273209', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`pdID`),
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`userID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`userOrder`) REFERENCES `order_product` (`order_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
