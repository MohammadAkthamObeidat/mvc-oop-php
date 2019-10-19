-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2019 at 08:04 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Food', '2000-01-01 00:00:00', '2019-10-17 06:29:05'),
(2, 'Fashion', '2000-01-01 00:00:00', '2019-10-18 16:47:09'),
(3, 'Electronics', '2000-01-01 00:00:00', '2019-10-18 16:47:15'),
(4, 'Motors', '2000-01-01 00:00:00', '2019-10-18 16:47:20');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 NOT NULL,
  `price` float NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `created`, `modified`, `category_id`) VALUES
(2, 'LG P880 4X HD', 'My first awesome phone!', 336, '2000-01-01 00:00:00', '2019-10-18 16:48:50', 3),
(3, 'Google Nexus 4', 'The most awesome phone of 2013!', 299, '2000-01-01 00:00:00', '2019-10-18 16:49:26', 3),
(4, 'Samsung Galaxy S4', 'How about no?', 600, '2000-01-01 00:00:00', '2019-10-18 16:52:44', 3),
(5, 'Bench Shirt', 'The best shirt!', 29, '2000-01-01 00:00:00', '2019-10-18 17:01:35', 2),
(6, 'Lenovo Laptop', 'My business partner', 399, '2000-01-01 00:00:00', '2019-10-18 17:02:17', 3),
(7, 'Samsung Galaxy Tab 10.1', 'Good tablet.', 259, '2000-01-01 00:00:00', '2019-10-18 17:03:06', 3),
(8, 'Spalding Watch', 'My sports watch.', 199, '2000-01-01 00:00:00', '2019-10-18 17:03:28', 3),
(9, 'Sony Smart Watch', 'The coolest smart watch!', 300, '2000-01-01 00:00:00', '2019-10-18 17:03:55', 3),
(10, 'Huawei Y300', 'For testing purposes.', 100, '2000-01-01 00:00:00', '2019-10-18 17:04:15', 3),
(11, 'Abercrombie Lake Arnold Shirt', 'Perfect as gift', 60, '2000-01-01 00:00:00', '2019-10-18 17:06:22', 2),
(12, 'Abercrombie Allen Brook Shirt', 'Cool red shirt!', 70, '2000-01-01 00:00:00', '2019-10-18 17:07:17', 2),
(13, 'Abercrombie Allen Anew Shirt', 'Awesome new shirt!', 999, '2000-01-01 00:00:00', '2019-10-18 17:07:53', 2),
(14, 'Washing Machine Model PTRR', 'Some new product.', 999, '2000-01-01 00:00:00', '2019-10-18 17:08:34', 4),
(15, 'Amanda Waller Shirt', 'New awesome shirt!', 333, '2000-01-01 00:00:00', '2019-10-18 17:08:58', 2),
(16, 'Wal-mart Shirt', 'Nothing to say a bout this product', 555, '2000-01-01 00:00:00', '2019-10-18 17:09:52', 2),
(17, 'Wallet', 'You can absolutely use this one', 799, '2000-01-01 00:00:00', '2019-10-18 17:10:12', 2),
(18, 'Bag', 'Awesome bag for you!', 33, '2000-01-01 00:00:00', '2019-10-18 17:10:29', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
