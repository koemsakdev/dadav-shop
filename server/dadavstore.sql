-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2025 at 02:05 PM
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
-- Database: `dadavstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_cost` decimal(6,2) NOT NULL,
  `order_status` varchar(100) NOT NULL DEFAULT 'on_hold',
  `user_id` int(11) NOT NULL,
  `user_phone` int(11) NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_cost`, `order_status`, `user_id`, `user_phone`, `user_city`, `user_address`, `order_date`) VALUES
(1, 129.50, 'pending', 1, 2147483647, 'Phnom Penh', '123 Main St, Phnom Penh', '2025-10-28 12:58:16'),
(2, 877.96, 'pending', 1, 855, 'New York', '123 Main St, New York, NY 10001', '2025-11-12 17:41:26'),
(3, 877.96, 'pending', 1, 855, 'New York', '123 Main St, New York, NY 10001', '2025-11-12 17:41:51'),
(4, 877.96, 'pending', 1, 855, 'New York', '123 Main St, New York, NY 10001', '2025-11-12 17:44:57'),
(5, 647.50, 'pending', 1, 855, 'New York', '123 Main St, New York, NY 10001', '2025-11-13 13:36:02'),
(6, 449.95, 'pending', 1, 855, 'New York', '123 Main St, New York, NY 10001', '2025-11-13 13:57:15');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` decimal(10,0) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `product_id`, `product_name`, `product_image`, `product_price`, `product_quantity`, `user_id`, `order_date`) VALUES
(1, 1, '2', 'Smart Fitness Watch', 'product-feature-2.jpg', 130, 1, 1, '2025-10-28 12:58:16'),
(2, 2, '1', 'Wireless Bluetooth Headphones', 'product-feature-1.jpg', 90, 4, 1, '2025-11-12 17:41:26'),
(3, 2, '2', 'Smart Fitness Watch', 'product-feature-2.jpg', 130, 4, 1, '2025-11-12 17:41:26'),
(4, 3, '1', 'Wireless Bluetooth Headphones', 'product-feature-1.jpg', 90, 4, 1, '2025-11-12 17:41:51'),
(5, 3, '2', 'Smart Fitness Watch', 'product-feature-2.jpg', 130, 4, 1, '2025-11-12 17:41:51'),
(6, 4, '1', 'Wireless Bluetooth Headphones', 'product-feature-1.jpg', 90, 4, 1, '2025-11-12 17:44:57'),
(7, 4, '2', 'Smart Fitness Watch', 'product-feature-2.jpg', 130, 4, 1, '2025-11-12 17:44:57'),
(8, 5, '2', 'Smart Fitness Watch', 'product-feature-2.jpg', 130, 5, 1, '2025-11-13 13:36:02'),
(9, 6, '1', 'Wireless Bluetooth Headphones', 'product-feature-1.jpg', 90, 5, 1, '2025-11-13 13:57:15');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_id` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_image4` varchar(255) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_special_offer` int(2) NOT NULL,
  `product_color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_price`, `product_special_offer`, `product_color`) VALUES
(1, 'Wireless Bluetooth Headphones', 'Shoes', 'High-quality over-ear wireless headphones with noise cancellation and 20-hour battery life.', 'product-feature-1.jpg', 'product-feature-2.jpg', 'product-feature-3.jpg', 'product-feature-4.jpg', 89.99, 10, 'Black'),
(2, 'Smart Fitness Watch', 'Bag', 'Track your heart rate, steps, sleep, and notifications with this waterproof fitness smartwatch.', 'product-feature-2.jpg', 'product-feature-2.jpg', 'product-feature-2.jpg', 'product-feature-2.jpg', 129.50, 15, 'Silver'),
(3, 'Ergonomic Office Chair', 'Bag', 'Adjustable ergonomic mesh office chair with lumbar support and 360° swivel wheels.', 'product-feature-3.jpg', 'product-feature-3.jpg', 'product-feature-3.jpg', 'product-feature-3.jpg', 249.00, 20, 'Gray'),
(4, 'Gaming Mechanical Keyboard', 'Bag', 'RGB backlit mechanical keyboard with blue switches, anti-ghosting, and aluminum frame.', 'product-feature-4.jpg', 'product-feature-4.jpg', 'product-feature-4.jpg', 'product-feature-4.jpg', 79.99, 5, 'Black'),
(5, 'Classic Wool Overcoat', 'Coats', 'Elegant long wool overcoat perfect for winter, featuring a double-breasted design and soft lining.', 'dress-1.jpg', 'dress-1.jpg', 'dress-1.jpg', 'dress-1.jpg', 159.00, 10, 'Camel'),
(6, 'Lightweight Trench Coat', 'Coats', 'Stylish beige trench coat with adjustable belt and water-resistant fabric ideal for spring and autumn.', 'dress-2.jpg', 'dress-2.jpg', 'dress-2.jpg', 'dress-2.jpg', 129.99, 15, 'Beige'),
(7, 'Puffer Down Jacket', 'Coats', 'Warm, lightweight puffer jacket with detachable hood and zip pockets for everyday comfort.', 'dress-3.jpg', 'dress-3.jpg', 'dress-3.jpg', 'dress-3.jpg', 119.50, 20, 'Navy Blue'),
(8, 'Faux Leather Biker Jacket', 'Coats', 'Trendy faux leather biker jacket with asymmetrical zipper and quilted shoulders for a bold look.', 'dress-4.jpg', 'dress-4.jpg', 'dress-4.jpg', 'dress-4.jpg', 139.00, 5, 'Black');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'Mean Koemsak', 'koemsak.mean@gmail.com', '$2y$10$WbW1V35yw4Gk.f8E2HHUauGG.whwaaXLd9udG5S26.x69RA02jlmG'),
(2, 'Davy Bun', 'davy.bun@gmail.com', '$2y$10$fBZ3pnhoh0oxamSGGv.BLeyLJMaYVpwh1QsnsoEQP47YHfR1d6de.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `UX_Constraint` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
