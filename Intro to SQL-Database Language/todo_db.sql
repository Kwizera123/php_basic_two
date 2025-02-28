-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 28, 2025 at 12:26 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `product` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product`) VALUES
(1, 1, 'Laptop'),
(2, 2, 'Smartphone'),
(3, 3, 'Headphone'),
(4, 4, 'Tablet'),
(5, 5, 'smartwatchs'),
(6, 6, 'Keyboard'),
(7, 7, 'Monitor'),
(8, 8, 'Mouse'),
(9, 9, 'Printer'),
(10, 10, 'External Hard Driver'),
(11, 11, 'Laptop Case'),
(12, 12, 'Blueltooth Speaker'),
(13, 13, 'Wireless charger'),
(14, 14, 'USB Cable'),
(15, 15, 'Gaming Console'),
(16, 16, 'Fitnes tracker'),
(17, 17, 'Webcame'),
(18, 18, 'Moderm'),
(19, 19, 'Drone'),
(20, 20, 'Graphic Card');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `created_at`) VALUES
(1, 'user1', 'user1@example.com', '2025-02-28 11:43:54'),
(2, 'user2', 'user1@example.com', '2025-02-28 11:43:54'),
(3, 'user3', 'user1@example.com', '2025-02-28 11:43:54'),
(4, 'user4', 'user1@example.com', '2025-02-28 11:43:54'),
(5, 'user5', 'user1@example.com', '2025-02-28 11:43:54'),
(6, 'user6', 'user1@example.com', '2025-02-28 11:43:54'),
(7, 'user7', 'user1@example.com', '2025-02-28 11:43:54'),
(8, 'user8', 'user1@example.com', '2025-02-28 11:43:54'),
(9, 'user9', 'user1@example.com', '2025-02-28 11:43:54'),
(10, 'user10', 'user1@example.com', '2025-02-28 11:43:54'),
(11, 'user11', 'user1@example.com', '2025-02-28 11:43:54'),
(12, 'user12', 'user1@example.com', '2025-02-28 11:43:54'),
(13, 'user13', 'user1@example.com', '2025-02-28 11:43:54'),
(14, 'user14', 'user1@example.com', '2025-02-28 11:43:54'),
(15, 'user15', 'user1@example.com', '2025-02-28 11:43:54'),
(16, 'user16', 'user1@example.com', '2025-02-28 11:43:54'),
(17, 'user17', 'user1@example.com', '2025-02-28 11:43:54'),
(18, 'user18', 'user1@example.com', '2025-02-28 11:43:54'),
(19, 'user19', 'user1@example.com', '2025-02-28 11:43:54'),
(20, 'user19', 'user1@example.com', '2025-02-28 11:43:54');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
