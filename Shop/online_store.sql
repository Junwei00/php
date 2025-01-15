-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 15, 2025 at 04:42 AM
-- Server version: 8.0.39
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `email` varchar(50) CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `password` int NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` text,
  `date_of_birth` date NOT NULL,
  `registration_date_&_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `account status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`email`, `password`, `firstname`, `lastname`, `gender`, `date_of_birth`, `registration_date_&_time`, `account status`) VALUES
('apple bean', 1536, 'lau', 'junwei', 'male', '2024-12-26', '2024-12-18 15:07:42', 1),
('banana', 123654, 'king', 'kong', 'male', '2024-12-07', '2024-12-18 16:45:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `product_cat` int NOT NULL,
  `price` double NOT NULL,
  `promotion_price` double NOT NULL,
  `manufacture_date` text NOT NULL,
  `expired_date` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `product_cat`, `price`, `promotion_price`, `manufacture_date`, `expired_date`, `created`, `modified`) VALUES
(1, 'Basketball', 'A ball used in the NBA.', 1, 49.99, 0, '', '', '2015-08-02 12:04:03', '2024-12-28 09:29:39'),
(3, 'Gatorade', 'This is a very good drink for athletes.', 1, 1.99, 0, '', '', '2015-08-02 12:14:29', '2024-12-28 09:29:57'),
(4, 'Eye Glasses', 'It will make you read better.', 3, 6, 0, '', '', '2015-08-02 12:15:04', '2024-12-28 09:31:45'),
(5, 'Trash Can', 'It will help you maintain cleanliness.', 3, 3.95, 0, '', '', '2015-08-02 12:16:08', '2024-12-28 09:31:48'),
(6, 'Mouse', 'Very useful if you love your computer.', 4, 11.35, 0, '', '', '2015-08-02 12:17:58', '2024-12-28 09:31:17'),
(7, 'Earphone', 'You need this one if you love music.', 2, 7, 0, '', '', '2015-08-02 12:18:21', '2024-12-28 09:31:42'),
(8, 'Pillow', 'Sleeping well is important.', 3, 8.99, 0, '', '', '2015-08-02 12:18:56', '2024-12-28 09:31:50'),
(9, 'banana', 'banana', 3, 10, 0, '', '', '2024-12-13 02:09:41', '2024-12-28 09:31:52');

-- --------------------------------------------------------

--
-- Table structure for table `product_cat`
--

DROP TABLE IF EXISTS `product_cat`;
CREATE TABLE IF NOT EXISTS `product_cat` (
  `product_cat_id` int NOT NULL,
  `product_cat_name` text CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `product_cat_description` text CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  PRIMARY KEY (`product_cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `product_cat`
--

INSERT INTO `product_cat` (`product_cat_id`, `product_cat_name`, `product_cat_description`) VALUES
(1, 'sport', ''),
(2, 'phone', ''),
(3, 'phone case', ''),
(4, 'computer', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
