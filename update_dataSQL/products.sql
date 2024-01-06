-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2023 at 08:42 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demobemet_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` float(10,2) NOT NULL,
  `sale_price` float(10,2) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) DEFAULT 0,
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `sale_price`, `category_id`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Produc 1', 'cGAh8T8DgFs3QcytrpiqWI2mRPg9H3eIRrkLdOTD.png', 1111111.00, 22222.00, 2, '<p>Thịt Gà<br></p>', 1, '2023-12-19', '2023-12-19'),
(3, 'Product 2', 'UXrTfKUtS9yxZsgSnoDKq8z9KpT88DfQeqnWHsfI.png', 99999.00, NULL, 3, '<p>Product 2<br></p>', 1, '2023-12-19', '2023-12-19'),
(4, 'Product 3', 'pU9sxtRWhK7vWTzyUoLmpDLkbEII9l90DO1xEuz8.png', 111111.00, 9000.00, 4, '<p>Product 3<br></p>', 0, '2023-12-19', '2023-12-19'),
(5, 'Product 4', 'Y8A2ahswC9sFzP25qwBi5JxjTfCtgvTdsLEVBr6p.png', 1111111.00, 27000.00, 4, '<p>Product 4<br></p>', 1, '2023-12-19', '2023-12-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
