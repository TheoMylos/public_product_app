-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 13, 2023 at 09:53 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scandiweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_product`
--

CREATE TABLE `book_product` (
  `id_product` bigint(20) NOT NULL,
  `weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_product`
--

INSERT INTO `book_product` (`id_product`, `weight`) VALUES
(1, 2),
(11, 2),
(12, 3),
(19, 2);

-- --------------------------------------------------------

--
-- Table structure for table `dvd_product`
--

CREATE TABLE `dvd_product` (
  `id_product` bigint(20) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dvd_product`
--

INSERT INTO `dvd_product` (`id_product`, `size`) VALUES
(8, 4700),
(9, 4900),
(14, 5700),
(21, 8700);

-- --------------------------------------------------------

--
-- Table structure for table `furniture_product`
--

CREATE TABLE `furniture_product` (
  `id_product` bigint(20) NOT NULL,
  `dimensions` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `furniture_product`
--

INSERT INTO `furniture_product` (`id_product`, `dimensions`) VALUES
(6, '75x80x150'),
(7, '50x120x210'),
(18, '110x130x210'),
(24, '75x90x200');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) NOT NULL,
  `sku` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `sku`, `name`, `price`) VALUES
(1, 'TRT2021', 'hobbit', 15),
(6, 'TRT2025', 'table', 75),
(7, 'TRT2026', 'bed', 300),
(8, 'TRT2027', 'Acme DISC', 1),
(9, 'TRT2028', 'SONY DISC', 1),
(11, 'TRT2030', 'The art of war', 25),
(12, 'TRT2031', '1984', 25),
(14, 'TRY5678', 'Sandisk', 4),
(18, 'UYT7890', 'Table', 350),
(19, 'IOK6756', 'Road', 34),
(21, 'YRT2356', 'Corsair', 5),
(24, 'GHY3456', 'desk', 450);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_product`
--
ALTER TABLE `book_product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `dvd_product`
--
ALTER TABLE `dvd_product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `furniture_product`
--
ALTER TABLE `furniture_product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sku` (`sku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_product`
--
ALTER TABLE `book_product`
  ADD CONSTRAINT `book_product_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dvd_product`
--
ALTER TABLE `dvd_product`
  ADD CONSTRAINT `dvd_product_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `furniture_product`
--
ALTER TABLE `furniture_product`
  ADD CONSTRAINT `furniture_product_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
