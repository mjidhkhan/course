-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2019 at 05:26 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `course_work`
--
CREATE DATABASE IF NOT EXISTS `course_work` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `course_work`;

-- --------------------------------------------------------

--
-- Table structure for table `course_details`
--

DROP TABLE IF EXISTS `course_details`;
CREATE TABLE `course_details` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(250) NOT NULL,
  `course_prep_date` date NOT NULL,
  `course_prep_time` int(11) NOT NULL,
  `course_notes` text NOT NULL,
  `course_instructions` text NOT NULL,
  `course_image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `course_details`:
--

-- --------------------------------------------------------

--
-- Table structure for table `course_type`
--

DROP TABLE IF EXISTS `course_type`;
CREATE TABLE `course_type` (
  `id` int(11) NOT NULL,
  `course_type` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `course_type`:
--

--
-- Dumping data for table `course_type`
--

INSERT INTO `course_type` (`id`, `course_type`) VALUES
(1, 'Starter'),
(2, 'Main Course'),
(3, 'Dessert'),
(4, 'Breakfast'),
(5, 'Refreshment');

-- --------------------------------------------------------

--
-- Table structure for table `meal_course`
--

DROP TABLE IF EXISTS `meal_course`;
CREATE TABLE `meal_course` (
  `id` int(11) NOT NULL,
  `course_type` tinyint(2) NOT NULL,
  `meal_type` tinyint(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `meal_course`:
--

-- --------------------------------------------------------

--
-- Table structure for table `meal_type`
--

DROP TABLE IF EXISTS `meal_type`;
CREATE TABLE `meal_type` (
  `id` int(11) NOT NULL,
  `meal_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `meal_type`:
--

--
-- Dumping data for table `meal_type`
--

INSERT INTO `meal_type` (`id`, `meal_type`) VALUES
(1, 'Vegan'),
(2, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `booking_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `orders`:
--

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `order_date`, `booking_date`) VALUES
(1, 1, '2011-03-10', '2011-03-15');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `order_ref` varchar(50) NOT NULL,
  `meal_type` varchar(30) NOT NULL,
  `course_type` varchar(30) NOT NULL,
  `course_name` varchar(300) NOT NULL,
  `servings` int(11) NOT NULL,
  `order_status` tinyint(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `order_details`:
--

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

DROP TABLE IF EXISTS `recipes`;
CREATE TABLE `recipes` (
  `course_id` int(11) NOT NULL,
  `recipe_id` varchar(30) NOT NULL DEFAULT '0.0',
  `item_id` int(11) NOT NULL,
  `qty_used` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `recipes`:
--

-- --------------------------------------------------------

--
-- Table structure for table `review_rating`
--

DROP TABLE IF EXISTS `review_rating`;
CREATE TABLE `review_rating` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `cont_title` varchar(100) NOT NULL,
  `review` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `review_rating`:
--

-- --------------------------------------------------------

--
-- Table structure for table `servings`
--

DROP TABLE IF EXISTS `servings`;
CREATE TABLE `servings` (
  `id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `cou_id` int(11) NOT NULL,
  `ord_id` int(11) NOT NULL,
  `no_of_servings` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `servings`:
--

--
-- Dumping data for table `servings`
--

INSERT INTO `servings` (`id`, `cus_id`, `cou_id`, `ord_id`, `no_of_servings`) VALUES
(1, 1, 1, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `ingredient_name` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `reorder_level` int(11) NOT NULL DEFAULT '250',
  `units` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `stock`:
--

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `ingredient_name`, `quantity`, `reorder_level`, `units`) VALUES
(1, 'Flour', 440, 250, 'g'),
(2, 'Raisins', 440, 250, 'g'),
(3, 'Rice  ', 440, 250, 'g'),
(4, 'Syrup ', 440, 250, 'ml'),
(5, 'Lettuce', 500, 250, 'g'),
(6, 'Carrots', 500, 250, 'g'),
(7, 'Potato', 20, 250, 'g'),
(8, 'Apples ', 388, 250, 'g'),
(9, 'Chicken  ', 9150, 250, 'g'),
(10, 'Blackbeans', 1000, 250, 'g'),
(11, 'Beef', 3900, 250, 'g'),
(12, 'Shrimp', 1000, 250, 'g'),
(13, 'Salmon', 1744, 250, 'g'),
(14, 'Spaghetti', 1794, 250, 'g'),
(15, 'Tomato  ', 40, 250, 'g'),
(16, 'Salt', 990, 250, 'g'),
(17, 'Pepper', 390, 250, 'g'),
(18, 'Garlic', 400, 250, 'g'),
(19, 'Paprika', 1000, 250, 'g'),
(20, 'Onions', 1800, 250, 'g'),
(21, 'Cumin  ', 1000, 250, 'g'),
(22, 'Cayenne pepper', 333, 250, 'g'),
(23, 'Olive oil', 1000, 250, 'ml'),
(24, 'Dry sherry', 500, 250, 'g'),
(25, 'Hot sauce', 246, 250, 'g'),
(26, 'Oregano', 350, 250, 'g'),
(27, 'Bay leaves', 100, 250, 'g'),
(28, 'Honey ', 1000, 250, 'ml'),
(29, 'Avocado', 500, 250, 'g'),
(30, 'Lime', 500, 250, 'ml');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hashed_password` varchar(250) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `users`:
--

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `hashed_password`, `status`) VALUES
(28, 'Chathurika Goonawardane', 'chathurika', 'cha@cha', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2),
(27, 'Majid H Khan', 'mhkhan', 'mhk@mhk.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1),
(34, 'Rashid Khan', 'rashid', 'rashid@menu.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1),
(35, 'Sajid Khan', 'sajid', 'sajid@mp.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course_details`
--
ALTER TABLE `course_details`
  ADD UNIQUE KEY `course_id` (`course_id`);

--
-- Indexes for table `course_type`
--
ALTER TABLE `course_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meal_course`
--
ALTER TABLE `meal_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meal_type`
--
ALTER TABLE `meal_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `order_ref` (`order_ref`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD KEY `course_id` (`course_id`),
  ADD KEY `recipe_id` (`recipe_id`);

--
-- Indexes for table `review_rating`
--
ALTER TABLE `review_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servings`
--
ALTER TABLE `servings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
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
-- AUTO_INCREMENT for table `course_type`
--
ALTER TABLE `course_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `meal_course`
--
ALTER TABLE `meal_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `meal_type`
--
ALTER TABLE `meal_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `review_rating`
--
ALTER TABLE `review_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `servings`
--
ALTER TABLE `servings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
