-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2019 at 11:06 AM
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
-- Dumping data for table `course_details`
--

INSERT INTO `course_details` (`course_id`, `course_name`, `course_prep_date`, `course_prep_time`, `course_notes`, `course_instructions`, `course_image`) VALUES
(43, 'Herby rice with roasted veg, chickpeas &amp; halloumi', '2019-04-18', 35, 'Stir parsley pesto through brown rice and top with onions, peppers, courgettes and chunks of halloumi cheese for a filling vegetarian dinner', 'Heat oven to 200C/180C fan/gas 6. Put the red onions, peppers and courgettes in a large roasting tin, toss in 2 tbsp oil and season. (You may need to do this in 2 tins.) Pop in the oven and cook for 25 mins until the veg is tender and beginning to turn golden.', '1555576545_herby-rice.jpg'),
(44, 'Smoky roasted veg, marinated feta &amp; lime', '2019-04-18', 20, 'Give your vegetarian brunch a punch of big flavours, with cumin, lime and sweet smoked paprika. It takes a while to prep, but there&rsquo;s little hands-on cooking time', 'Heat oven to 200C/180C fan/gas 6. Break the cauliflower into florets. Trim then chop the thick stem into small chunks and keep any leaves. Halve the squash lengthways, scrape out and keep the seeds, then cut the flesh into 5mm half moons. Put the veg in a roasting tin with 2 tbsp oil, the spices and some seasoning, then rub with your hands to coat. Roast for 45 mins, turning the veg a few times, until golden and tender. Add the leaves (large ones shredded) halfway through.', '1555576777_smoky-roasted-veg-marinated-feta-lime.jpg'),
(45, 'Truffle macancini', '2019-04-18', 55, 'Our twist on arancini balls, filled with the perfect ratio of pasta, cheese, truffle and crumb. Serve these moreish morsels up with cocktails at your next party, they\'re a crowd-pleaser!', 'First, cook the macaroni in a large pan of salted water for 6 mins, or 1-2 mins less than it says on the packet. Drain and set aside.\r\n\r\nMeanwhile, make the sauce. Melt the butter in a large saucepan and add the garlic and mustard powder, stirring for 1 min. Tip in 1 1/2 tbsp of plain flour and stir for 1 min. Gradually pour in the milk, whisking until the sauce is lump-free, then simmer for 5 mins, whisking constantly until it thickens and becomes gloss', '1555577095_truffle-macancini.jpg'),
(46, 'Lobster, green bean &amp; radicchio salad', '2019-04-18', 20, 'This festive seafood starter, finished with a garlicky basil dressing, can be prepared ahead - ideal for a fuss-free dinner for one', 'To prepare the lobster, separate the claws from the tail. Crack the claws with a rolling pin and pick out the meat. Remove the shell from the lobster tail, cut the tail in half and discard the intestine. Break off the legs then roll a rolling pin over them to push out any meat. Cut all the meat into bite-sized pieces, cover and put in the fridge.\r\n\r\nPut a small saucepan of salted water on to boil. Add the potatoes and simmer for 15 mins until cooked but not broken up. Lift the potatoes out of the water and leave to one side to cool. Add the green beans to the hot water and boil for 3 mins until just cooked. Drain the beans and run under cold water. Put the cooled potatoes and beans in the fridge to chill.', '1555577513_lobster-green-bean-radicchio-salad.jpg'),
(47, 'Massaman curry roast chicken', '2019-04-18', 35, 'A full-flavoured alternative to your usual weekend roast - serve with a big bowl of rice', 'Put the chicken in a roasting tin or large casserole. Roughly chop half the ginger and put into the cavity of the chicken with the lemongrass and half the lime, then tie the legs together with string. Mix 1 tsp of the curry paste with the oil, rub it all over the chicken, then season with salt and pepper. Heat the oven to 200C/fan 180C/gas 6, cover the chicken loosely with foil, then put it in to roast. After 35 mins, take the foil off the bird. Add the potatoes to the tin, then stir them around in any juices. Roast for another 40 mins until the chicken is cooked through and golden and the potatoes are tender.\r\n\r\nTake the chicken out of the tin and leave to rest, loosely covered. Put the tin on the hob, add the remaining curry paste, grate in the remaining ginger, then fry for 2 mins until fragrant. Stir in the coconut milk and sugar, then boil for about 5 mins until the sauce is slightly thickened.', '1555577845_recipe-image-legacy-id--513816_11.jpg'),
(48, 'Apple &amp; blackberry crumble', '2019-04-18', 20, 'Raymond Blanc pre-cooks the crumble topping to avoid gluey, uncooked crumble and retain the texture of the fruit', '    Heat oven to 190C/170C fan/gas 5. Tip 120g plain flour and 60g caster sugar into a large bowl.\r\n\r\n    Add 60g unsalted butter, then rub into the flour using your fingertips to make a light breadcrumb texture. Do not overwork it or the crumble will become heavy.\r\n\r\n    Sprinkle the mixture evenly over a baking sheet and bake for 15 mins or until lightly coloured.\r\n\r\n    Meanwhile, for the compote, peel, core and cut 300g Braeburn apples into 2cm dice.\r\n\r\n    Put 30g unsalted butter and 30g demerara sugar in a medium saucepan and melt together over a medium heat. Cook for 3 mins until the mixture turns to a light caramel.\r\n\r\n    Stir in the apples and cook for 3 mins. Add 115g blackberries and &frac14; tsp ground cinnamon, and cook for 3 mins more.\r\n\r\n    Cover, remove from the heat, then leave for 2-3 mins to continue cooking in the warmth of the pan.\r\n\r\n    To serve, spoon the warm fruit into an ovenproof gratin dish, top with the crumble mix, then reheat in the oven for 5-10 mins. Serve with vanilla ice cream.', '1555578088_recipe-image-legacy-id--393505_11.jpg'),
(49, 'Homemade elderflower cordial ', '2019-04-18', 10, 'Fragrant and refreshing, springtime elderflower cordial is easy to make. Mix with sparkling water to create elderflower press&eacute;, or add to wine, prosecco or champagne to start a party in style', '    Put the sugar and 1.5 litres/2&frac34; pints water into the largest saucepan you have. Gently heat, without boiling, until the sugar has dissolved. Give it a stir every now and again. Pare the zest from the lemons using a potato peeler, then slice the lemons into rounds.\r\n\r\n    Once the sugar has dissolved, bring the pan of syrup to the boil, then turn off the heat. Fill a washing up bowl with cold water. Give the flowers a gentle swish around to loosen any dirt or bugs. Lift flowers out, gently shake and transfer to the syrup along with the lemons, zest and citric acid, then stir well. Cover the pan and leave to infuse for 24 hrs.\r\n\r\n    Line a colander with a clean tea towel, then sit it over a large bowl or pan. Ladle in the syrup &ndash; let it drip slowly through. Discard the bits left in the towel. Use a funnel and a ladle to fill sterilised bottles (run glass bottles through the dishwasher, or wash well with soapy water. Rinse, then leave to dry in a low oven). The cordial is ready to drink straight away and will keep in the fridge for up to 6 weeks. Or freeze it in plastic containers or ice cube trays and defrost as needed.', '1555578310_Home made.jpg');

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
-- Dumping data for table `meal_course`
--

INSERT INTO `meal_course` (`id`, `course_type`, `meal_type`) VALUES
(43, 2, 2),
(44, 1, 1),
(45, 1, 1),
(46, 1, 2),
(47, 2, 2),
(48, 3, 2),
(49, 5, 2);

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
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`course_id`, `recipe_id`, `item_id`, `qty_used`) VALUES
(43, '43.1', 3, 500),
(43, '43.2', 20, 250),
(43, '43.3', 23, 50),
(43, '43.4', 10, 500),
(44, '44.1', 5, 250),
(44, '44.2', 19, 500),
(44, '44.3', 20, 250),
(44, '44.4', 12, 250),
(45, '45.1', 26, 500),
(45, '45.2', 3, 250),
(45, '45.3', 7, 250),
(45, '45.4', 20, 150),
(46, '46.1', 9, 250),
(46, '46.2', 10, 200),
(46, '46.3', 17, 100),
(46, '46.4', 12, 250),
(47, '47.1', 9, 750),
(47, '47.2', 3, 500),
(47, '47.3', 7, 500),
(47, '47.4', 20, 250),
(48, '48.1', 8, 500),
(48, '48.2', 19, 250),
(48, '48.3', 29, 250),
(48, '48.4', 2, 200),
(49, '49.1', 8, 1000),
(49, '49.2', 16, 50),
(49, '49.3', 21, 20),
(49, '49.4', 30, 300);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

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
