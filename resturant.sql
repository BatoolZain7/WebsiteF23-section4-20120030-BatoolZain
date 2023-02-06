-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2023 at 02:57 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resturant`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `name`, `price`, `image`, `quantity`) VALUES
(1, 1, 'Super Meal', '6.90', 'super_meal.png', 5);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `ingredients` varchar(255) DEFAULT NULL,
  `price` decimal(5,2) NOT NULL,
  `image` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `type`, `name`, `ingredients`, `price`, `image`) VALUES
(1, 'Broasted Chicken', 'Economy Meal', '2 chicken and half 20 pieces, 2 beef burger, 2 chicken burger, 1 family fries, 1 family coleslaw, fresh juice 1. 5 liter, pepsi 2 liter, 5 garlic and 5 bread.', '20.95', 'econemy_meal.png'),
(2, 'Broasted Chicken', 'Super Meal', '1 chicken 8 pieces, 2 French fries, 2 small coleslaw, 1 liter Pepsi, 2 garlic and 2 bread.', '6.90', 'super_meal.png'),
(3, 'Broasted Chicken', 'Combo Saving', '1/2 chicken 4 pieces, 1 fries, 1 colslow, 1 soft drink ,1 garlic and 1 bread.', '3.35', 'combo_saving.png'),
(4, 'Broasted Chicken', 'Crispy Strips Meal', '5 pieces tender, 1 french fries, 1 pepsi, 1 garlic sauce, 1 small coleslaw and 1 bun', '3.35', 'crispy_strips_meal.png'),
(5, 'Broasted Chicken', 'Special Meal', '16 piece chicken, 1 family fries, 1 large coleslaw 2 l Pepsi, 4 gramsarlic sauce and 4 bread.', '13.80', 'special_meal.png'),
(6, 'Broasted Chicken', 'Idel Meal', '12Psc Chicken . 1 Family Fries . 2L Pepsi 1Larg Coleslow 3Garlic . 3bread', '10.75', 'ideal_meal.png'),
(7, 'Broasted Chicken', 'Mega Meal', '20 Pieces Chicken, 1 Family Fries, 1 Large Coleslaw ,2 Liter Pepsi 5 Garlic and 5 bread', '15.99', 'mega_meal.png'),
(8, 'Sandwiches', 'Twin Twist Combo', 'Boneless chicken 330 ml, fries 200 gram and pepsi 330 ml.', '2.99', 'twin_twist_combo.png'),
(9, 'Sandwiches', 'Zinger Tornado Combo', 'Boneless chicken 330 ml, fries 200 gram and pepsi 330 ml.', '2.25', 'zinger_tornado-combo.png'),
(10, 'Sandwiches', 'Super Crunchy Combo', 'Super crunchy sandwich, 1 french fries and 1 pepsi', '2.10', 'super_crunchy_combo.png'),
(11, 'Burger', 'Max Burger Combo', 'Beef burger 150 gram, fries and pepsi.', '2.75', 'max_burger_combo.png'),
(12, 'Burger', 'Twin Beef Burger', '2 beef burger 40 gram with cheese, fries 200 gram and pepsi 330 ml.', '2.50', 'twin_beef_burger.png'),
(13, 'Burger', 'Twin Chicken Burger', '2 chicken burger 70 gram with cheese, fries 200 gram and pepsi 330 ml.', '2.50', 'twin_chicken_burger.png'),
(14, 'Burger', 'Chicken Burger Combo', 'Chicken burger sandwich, 1 french fries and 1 pepsi', '1.70', 'chicken_burger_combo.png'),
(15, 'Burger', 'Beef Burger Combo', 'Beef burger sandwich, 1 french fries and 1 Pepsi', '1.70', 'beef_burger_combo.png'),
(16, 'Side Dishes', 'Rice Plate', '', '0.95', 'rice_plate.png'),
(17, 'Side Dishes', 'Colslow', '', '0.50', 'colslow.png'),
(18, 'Side Dishes', 'Bun', '', '0.10', 'bun.png'),
(19, 'Side Dishes', 'Crispy Sause', '', '0.15', 'crispy_sauce.png'),
(20, 'Side Dishes', 'Garlic Sauce', '', '0.15', 'garlic_sauce.png'),
(21, 'Side Dishes', 'Sweet Chili Sauce', '', '0.15', 'sweet_chill_sauce.png'),
(22, 'Side Dishes', 'Pepsi 330 Ml', '', '0.40', 'pepsi_330ml.png'),
(23, 'Side Dishes', 'Fries', '', '0.50', 'fries.png');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`item_id`, `order_id`, `quantity`) VALUES
(1, 1, 1),
(3, 3, 3),
(4, 2, 2),
(5, 2, 1),
(7, 4, 1),
(18, 4, 5),
(20, 4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Waiting'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_order`
--

INSERT INTO `user_order` (`id`, `user_id`, `price`, `date`, `status`) VALUES
(1, '1', '20.95', '2023-02-01', 'Delivered'),
(2, '1', '20.50', '2023-02-11', 'Delivered'),
(3, '1', '10.05', '2022-12-25', 'Delivered'),
(4, '1', '17.39', '2023-01-29', 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `web_user`
--

CREATE TABLE `web_user` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_user`
--

INSERT INTO `web_user` (`id`, `fname`, `lname`, `phone`, `email`, `password`) VALUES
(1, 'Batool', 'Zain', 791527509, 'batoolzain077@gmail.com', 'batool@123'),
(2, 'Ahmad', 'Touqan', 784521562, 'ahmadtouqan@gmail.com', 'ahmad123'),
(3, 'Ahmad', 'Isa', 791527500, 'ahmadisa@gmail.com', 'ahmad@123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`item_id`,`order_id`),
  ADD KEY `order_item_order_id` (`order_id`);

--
-- Indexes for table `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_user`
--
ALTER TABLE `web_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_order`
--
ALTER TABLE `user_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `web_user`
--
ALTER TABLE `web_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_item_id` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_item_order_id` FOREIGN KEY (`order_id`) REFERENCES `user_order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
