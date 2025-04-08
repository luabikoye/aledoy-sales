-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 13, 2023 at 12:48 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `babyyofa_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(6) UNSIGNED NOT NULL,
  `order_id` int(6) DEFAULT NULL,
  `product_id` int(6) DEFAULT NULL,
  `description` varchar(60) DEFAULT NULL,
  `quantity` varchar(20) DEFAULT NULL,
  `unit_price` varchar(20) DEFAULT NULL,
  `total_price` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `order_id`, `product_id`, `description`, `quantity`, `unit_price`, `total_price`) VALUES
(16, 6, 3, 'Innovate Or Die(S, Black)', '4', '12000', '48000'),
(17, 6, 8, 'Ready or Not(XL, Black)', '3', '2500', '7500'),
(18, 6, 8, 'Ready or Not(XL, Black)', '3', '2500', '7500'),
(19, 6, 8, 'Ready or Not(XL, Black)', '3', '2500', '7500'),
(20, 7, 4, 'Yo Ho Ho(S, Black)', '2', '20000', '40000'),
(21, 7, 5, 'Travel Smart(XXXL, Black)', '1', '20000', '20000'),
(22, 8, 6, 'Travel Smart(S, Black)', '1', '20000', '20000'),
(23, 9, 8, 'Ready or Not(S, Black)', '1', '2500', '2500'),
(24, 12, 4, 'Yo Ho Ho(M, White)', '4', '20000', '80000'),
(25, 12, 5, 'Travel Smart(S, Black)', '5', '20000', '100000'),
(26, 12, 18, 'Ready or Not(S, Black)', '1', '2500', '2500'),
(27, 13, 2, 'Innovate Or Die(S, Blue)', '2', '10000', '20000'),
(28, 14, 8, 'Ready or Not(S, Black)', '2', '2500', '5000'),
(29, 15, 3, 'Innovate Or Die(S, Black)', '2', '12000', '24000'),
(30, 20, 18, 'Ready or Not(XL, White)', '1', '2500', '2500');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(6) UNSIGNED NOT NULL,
  `cat_name` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`) VALUES
(14, 'Kids'),
(11, 'Men'),
(16, 'Phones'),
(15, 'Watches'),
(12, 'Women');

-- --------------------------------------------------------

--
-- Table structure for table `home_banners`
--

CREATE TABLE `home_banners` (
  `id` int(6) UNSIGNED NOT NULL,
  `heading` varchar(300) DEFAULT NULL,
  `sub_heading` varchar(300) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_banners`
--

INSERT INTO `home_banners` (`id`, `heading`, `sub_heading`, `image`) VALUES
(3, 'Quality & Premium <span style=\"color:red;\">T shirt</span>', 'Available in all sizes for men, women & kids', 'uploads/3.png');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(6) UNSIGNED NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(70) NOT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `email`) VALUES
(1, 'kizito', '*6D70A1160E370F48F4491CAFA8067B314025D2C3', ''),
(2, 'administrator', '*6D70A1160E370F48F4491CAFA8067B314025D2C3', 'oabikay@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(6) UNSIGNED NOT NULL,
  `ip_address` varchar(200) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `address` varchar(60) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `payment_type` varchar(40) DEFAULT NULL,
  `amount` varchar(30) DEFAULT NULL,
  `payment_status` varchar(20) DEFAULT 'Pending',
  `order_status` varchar(20) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `ip_address`, `date_time`, `firstname`, `lastname`, `email`, `phone`, `address`, `city`, `state`, `payment_type`, `amount`, `payment_status`, `order_status`) VALUES
(5, '::1', '2022-08-18 11:42:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'pending'),
(6, '::1', '2022-08-18 11:52:54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'pending'),
(7, '::1', '2022-08-18 01:58:40', 'OLUMIDE', 'ABIKOYE', 'olumide@aledoy.com', '08023443581', '8 GBEMISOLA ADENUBI STREET', 'ISOLO', 'Abuja', 'Bank Transfer', '70,000', 'Paid', 'complete'),
(8, '::1', '2022-08-18 02:05:45', 'Osareniro', 'Walter', 'walterniro11@gmail.com', '+2348074277621', 'Abbey Mortgage Bank Building', 'Isolo, Lagos', 'Lagos', 'Bank Transfer', '22,000', 'Paid', 'complete'),
(9, '::1', '2022-08-18 02:07:37', 'Francis', 'Badejo', 'phrancisgilbert@yahoo.com', '07042629011', '67 Adelabu Drive', 'Lagos', 'Lagos', 'Paystack', '4,500', 'Paid', 'complete'),
(10, '::1', '2022-08-23 10:34:12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'pending'),
(11, '::1', '2022-08-23 11:55:41', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'pending'),
(12, '::1', '2022-08-23 11:55:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Paystack', NULL, 'Pending', 'pending'),
(13, '::1', '2022-08-23 12:54:02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Paystack', NULL, 'Paid', 'pending'),
(14, '::1', '2022-08-23 12:59:20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Paystack', NULL, 'Paid', 'pending'),
(15, '::1', '2022-08-23 01:00:51', 'Francis', 'Badejo', 'phrancisgilbert@yahoo.com', '07042629011', '67 Adelabu Drive', 'Lagos', 'Lagos', 'Paystack', '26,000', 'Paid', 'complete'),
(16, '::1', '2022-08-26 03:40:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'pending'),
(17, '::1', '2022-09-07 06:43:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'pending'),
(18, '::1', '2022-09-08 02:42:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'pending'),
(19, '::1', '2022-10-28 05:08:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'pending'),
(20, '::1', '2023-06-14 12:41:45', 'Abayomi', 'Adejonwo', 'oabikay@yahoo.com', '07042629011', '19 oni street surulere', 'Lagos', 'Lagos', 'Bank Transfer', '4,500', 'Pending', 'complete'),
(21, '::1', '2023-06-14 12:44:02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'pending'),
(22, '::1', '2023-10-13 12:46:56', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(6) UNSIGNED NOT NULL,
  `title` varchar(70) DEFAULT NULL,
  `cat_id` varchar(100) DEFAULT NULL,
  `price` varchar(40) DEFAULT NULL,
  `color` varchar(29) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL,
  `stock` varchar(20) DEFAULT NULL,
  `image_1` varchar(200) DEFAULT NULL,
  `image_2` varchar(200) DEFAULT NULL,
  `image_3` varchar(200) DEFAULT NULL,
  `image_4` varchar(200) DEFAULT NULL,
  `image_5` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `cat_id`, `price`, `color`, `size`, `stock`, `image_1`, `image_2`, `image_3`, `image_4`, `image_5`) VALUES
(2, 'Innovate Or Die', '11', '10000', 'Red', 'M, L, XL', '10', 'uploads/2.jpeg', 'uploads/2_2.jpeg', 'uploads/2_3.jpeg', NULL, NULL),
(3, 'Innovate Or Die', '11', '12000', 'Blue Black', 'M, L, XL, XXL', '15', 'uploads/3.jpeg', 'uploads/3_2.jpeg', 'uploads/3_3.jpeg', NULL, NULL),
(4, 'Yo Ho Ho', '11', '20000', 'White', 'M, L, XL', '10', 'uploads/4.jpeg', 'uploads/4_2.jpeg', 'uploads/4_3.jpeg', NULL, NULL),
(5, 'Travel Smart', '11', '20000', 'Black', 'M, L, XL', '10', 'uploads/5.jpeg', 'uploads/5_2.jpeg', 'uploads/5_3.jpeg', NULL, NULL),
(6, 'Travel Smart', '11', '20000', 'Red', 'M, L, XL', '10', 'uploads/6.jpeg', 'uploads/6_2.jpeg', 'uploads/6_3.jpeg', NULL, NULL),
(8, 'Ready or Not', '11', '2500', 'Red', 'M, L, XL', '10', 'uploads/8.png', 'uploads/8_2.png', 'uploads/8_3.png', NULL, NULL),
(12, 'Innovate Or Die', '11', '10000', 'Red', 'M, L, XL', '10', 'uploads/2.jpeg', 'uploads/2_2.jpeg', 'uploads/2_3.jpeg', NULL, NULL),
(13, 'Innovate Or Die', '11', '12000', 'Blue Black', 'M, L, XL, XXL', '15', 'uploads/3.jpeg', 'uploads/3_2.jpeg', 'uploads/3_3.jpeg', NULL, NULL),
(14, 'Yo Ho Ho', '11', '20000', 'White', 'M, L, XL', '10', 'uploads/4.jpeg', 'uploads/4_2.jpeg', 'uploads/4_3.jpeg', NULL, NULL),
(15, 'Travel Smart', '14', '20000', 'Black', 'M, L, XL', '10', 'uploads/5.jpeg', 'uploads/5_2.jpeg', 'uploads/5_3.jpeg', NULL, NULL),
(16, 'Travel Smart', '12', '20000', 'Red', 'M, L, XL', '10', 'uploads/6.jpeg', 'uploads/6_2.jpeg', 'uploads/6_3.jpeg', NULL, NULL),
(18, 'Ready or Not', '12', '2500', 'Red', 'M, L, XL', '10', 'uploads/8.png', 'uploads/8_2.png', 'uploads/8_3.png', NULL, NULL),
(28, 'Ready or Not', '12', '2500', 'Red', 'M, L, XL', '10', 'uploads/8.png', 'uploads/8_2.png', 'uploads/8_3.png', NULL, NULL),
(38, 'Ready or Not', '12', '2500', 'Red', 'M, L, XL', '10', 'uploads/8.png', 'uploads/8_2.png', 'uploads/8_3.png', NULL, NULL),
(48, 'Ready or Not', '12', '2500', 'Red', 'M, L, XL', '10', 'uploads/8.png', 'uploads/8_2.png', 'uploads/8_3.png', NULL, NULL),
(58, 'Ready or Not', '12', '2500', 'Red', 'M, L, XL', '10', 'uploads/8.png', 'uploads/8_2.png', 'uploads/8_3.png', NULL, NULL),
(68, 'Ready or Not', '12', '2500', 'Red', 'M, L, XL', '10', 'uploads/8.png', 'uploads/8_2.png', 'uploads/8_3.png', NULL, NULL),
(78, 'Ready or Not', '12', '2500', 'Red', 'M, L, XL', '10', 'uploads/8.png', 'uploads/8_2.png', 'uploads/8_3.png', NULL, NULL),
(81, 'Ready or Not', '12', '2500', 'Red', 'M, L, XL', '10', 'uploads/8.png', 'uploads/8_2.png', 'uploads/8_3.png', NULL, NULL),
(82, 'Ready or Not', '12', '2500', 'Red', 'M, L, XL', '10', 'uploads/8.png', 'uploads/8_2.png', 'uploads/8_3.png', NULL, NULL),
(84, 'Ready or Not', '12', '2500', 'Red', 'M, L, XL', '10', 'uploads/8.png', 'uploads/8_2.png', 'uploads/8_3.png', NULL, NULL),
(85, 'Ready or Not', '14', '2500', 'Red', 'M, L, XL', '10', 'uploads/8.png', 'uploads/8_2.png', 'uploads/8_3.png', NULL, NULL),
(86, 'Ready or Not', '14', '2500', 'Red', 'M, L, XL', '10', 'uploads/8.png', 'uploads/8_2.png', 'uploads/8_3.png', NULL, NULL),
(89, 'Ready or Not', '14', '2500', 'Red', 'M, L, XL', '10', 'uploads/8.png', 'uploads/8_2.png', 'uploads/8_3.png', NULL, NULL),
(99, 'Ready or Not', '14', '2500', 'Red', 'M, L, XL', '10', 'uploads/8.png', 'uploads/8_2.png', 'uploads/8_3.png', NULL, NULL),
(100, 'Boos T-Short', '14', '10000', 'Red', 'L', '3', 'uploads/100.jpg', 'uploads/100_2.jpg', 'uploads/100_3.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `site_info`
--

CREATE TABLE `site_info` (
  `id` int(6) UNSIGNED NOT NULL,
  `company_name` varchar(40) DEFAULT NULL,
  `account_number` varchar(40) DEFAULT NULL,
  `account_name` varchar(30) DEFAULT NULL,
  `phone_number` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cat_name` (`cat_name`);

--
-- Indexes for table `home_banners`
--
ALTER TABLE `home_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_info`
--
ALTER TABLE `site_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `home_banners`
--
ALTER TABLE `home_banners`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `site_info`
--
ALTER TABLE `site_info`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;
