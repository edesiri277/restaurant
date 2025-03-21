-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2024 at 12:45 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exclusiverestaurant_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_table`
--

CREATE TABLE `book_table` (
  `id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(13) NOT NULL,
  `date_time` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `no_people` varchar(100) NOT NULL,
  `occasion` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_table`
--

INSERT INTO `book_table` (`id`, `name`, `number`, `date_time`, `email`, `no_people`, `occasion`, `message`) VALUES
(1, 'edesiri', '34567', '2024-08-26T01:59', 'edesiri@gmail.com', '7', 'dinner date', 'fghj'),
(17, 'fairme', '678', '2024-08-26T15:32', 'fairmewin@gmail.com', '14', 'birthday outing', 'dfghj'),
(18, 'kevwe', '4567', '2024-08-28T13:30', 'kevwe@gmail.com', '5', 'birthday outing', 'ready');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `qty` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `price`, `image`, `qty`) VALUES
(1, 'Fried rice', '3000', 'Fried rice.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(13) NOT NULL,
  `email` varchar(255) NOT NULL,
  `method` varchar(100) NOT NULL,
  `flat` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `pin_code` int(10) NOT NULL,
  `total_products` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `name`, `number`, `email`, `method`, `flat`, `street`, `city`, `state`, `country`, `pin_code`, `total_products`, `total_price`) VALUES
(236, 'den', '12345678', 'den@gmail.com', 'credit card', '456', 'olodi', 'lolomo', 'kano', 'uganda', 578, 'Egusi soup (1 )', '500'),
(237, 'john', '86074', 'john123@gmail.com', 'cash on delivery', '34567', 'emoefe', 'benin', 'lagos', 'USA', 66677, 'Egusi soup (1 ), Eba (3 )', '3500'),
(238, 'divine', '78987987', '123divine@gmail.com', 'cash on delivery', '456', 'jogo', 'benin', 'kano', 'uganda', 7575, 'Egusi soup (1 ), Eba (3 )', '3500'),
(239, 'divine', '78987987', '123divine@gmail.com', 'cash on delivery', '456', 'jogo', 'benin', 'kano', 'uganda', 7575, 'Egusi soup (1 ), Eba (3 )', '3500'),
(240, 'divine', '78987987', '123divine@gmail.com', 'cash on delivery', '456', 'jogo', 'benin', 'kano', 'uganda', 7575, 'Egusi soup (1 ), Eba (3 )', '3500'),
(241, 'divine', '78987987', '123divine@gmail.com', 'cash on delivery', '456', 'jogo', 'benin', 'kano', 'uganda', 7575, 'Egusi soup (1 ), Eba (3 )', '3500'),
(242, 'divine', '78987987', '123divine@gmail.com', 'cash on delivery', '456', 'jogo', 'benin', 'kano', 'uganda', 7575, 'Egusi soup (1 ), Eba (3 )', '3500'),
(243, 'divine', '78987987', '123divine@gmail.com', 'cash on delivery', '456', 'jogo', 'benin', 'kano', 'uganda', 7575, 'Egusi soup (1 ), Eba (3 )', '3500'),
(244, 'divine', '78987987', '123divine@gmail.com', 'cash on delivery', '456', 'jogo', 'benin', 'kano', 'uganda', 7575, 'Egusi soup (1 ), Eba (3 )', '3500'),
(245, 'divine', '123456', 'kevwe@gmail.com', 'paypal', '09', 'IT', 'tew', 'lagos', 'italy', 578, 'Egusi soup (1 ), Eba (3 )', '3500'),
(246, 'divine', '4567890', 'fairmewin@gmail.com', 'cash on delivery', '54', 'jakpa', 'lolomo', 'kano', 'uganda', 66677, 'Jollof rice (2 ), Fried rice (5 )', '21000');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(1, 'Jollof rice', 3000, 'jollof rice.jpg'),
(2, 'Fried rice', 3000, 'Fried rice.jpg'),
(3, 'White rice and stew', 2500, 'rice and stew.jpg'),
(4, 'Ogbono soup', 4800, 'Nigerian Ogbono Soup.jpg\r\n'),
(5, 'Egusi soup', 500, 'egusi soup.jpg'),
(6, 'Okoro soup', 6000, 'okoro soup.jpg'),
(7, 'Banga soup', 6500, 'banga soup2.jpg'),
(8, 'Vegetable soup', 5800, 'vegetable soup.jpg'),
(9, 'Ewedu soup', 4000, 'ewedu soup.jpg'),
(10, 'Pounded yam', 1500, 'pounded yams.jpg'),
(11, 'Eba', 1000, 'eba.jpg'),
(12, 'Starch', 1800, 'starch.jpg'),
(13, 'Amala', 2000, 'amala.jpg'),
(14, 'Goatmeat peppersoup', 2800, 'goatmeat peppersoup.jpg'),
(15, 'Catfish peppersoup', 3000, 'catfish peppersoup.jpg'),
(16, 'Chicken peppersoup', 2500, 'chicken peppersoup.jpg'),
(17, 'Macaroni', 4200, 'macaroni.jpg'),
(18, 'Spaghetti', 4000, 'jollof spaghetti.jpg'),
(20, 'Meatpie', 1800, 'Nigerian Meat Pies.jpg'),
(21, 'Hamburger', 3000, 'Hamburger.jpg'),
(22, 'Pancake', 2500, 'pancakes.jpg'),
(23, 'Ice-cream', 3500, 'ice-cream.jpg'),
(24, 'Shawarma', 5000, 'shawarma.jpg'),
(26, 'Pizza', 10000, 'pizza.jpg'),
(27, 'Red velvet cake', 17000, 'Red Velvet Cake Recipe.jpg'),
(28, 'Bottle water', 1200, 'Bottled Water.jpg'),
(29, 'Coca-cola', 1400, 'coca-cola.jpg'),
(30, 'Fanta', 1400, 'Fanta Orange.jpg'),
(31, 'Sprite', 1400, 'sprite.jpg'),
(32, 'Malta', 1200, 'Maltina.jpg'),
(33, 'Pepsi', 1400, 'Pepsi.jpg'),
(34, 'Campari', 7800, 'campari.jpg'),
(35, 'Martinelli', 10000, 'Martinelli.jpg'),
(36, 'Dom Bosco', 12000, 'Dom bosco.jpg'),
(37, 'Jack Daniel', 9800, 'Whiskey Jack Daniels.jpg'),
(38, 'Four cousins', 11000, 'four cousins.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `cpassword`) VALUES
(1, 'edesiri', 'edesiri@gmail.com', '1234', '1234'),
(2, 'fairme', 'fairmewin@gmail.com', 'far12', 'far12'),
(3, 'john', 'john123@gmail.com', 'j34', 'j34'),
(4, 'fairme', 'david123@gmail.com', '1234', '1234'),
(7, 'red', 'red@gmail.com', 'red2', 'red2'),
(8, 'gift', 'gift@gmail.com', '1234', '1234'),
(9, 'Nkem', 'nkem@gmail.com', 'n123', 'n123'),
(10, 'edesiri', 'edddesiri@gmail.com', '456', '456'),
(11, 'kevwe', 'kevwe@gmail.com', '$2y$10$Uyrjv3X4dA2wGnd/DHjnx.kGBdRowvoYMtNQJjvCHG3gQkc9QP/8m', '$2y$10$wkjd0kJ116XBs4ILGuXdXesXgZdas04OFgOn1MdAKzl5OwymUoqjC'),
(12, 'bread', 'bread@gmail.com', '$2y$10$nLjW0tDv.uxz0f1kH6z19uQBc2pwF5wbxeTmnMEvtJ17GSpc3bI9W', '$2y$10$7/O0Z78rQH/31Dygz0R7FuAc8bznPeFrWIZ1VN2kCOtzbD9i1CqVi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_table`
--
ALTER TABLE `book_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_table`
--
ALTER TABLE `book_table`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
