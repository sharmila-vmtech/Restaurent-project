-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2017 at 11:42 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resturent_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `cusine`
--

CREATE TABLE `cusine` (
  `id` int(11) NOT NULL,
  `cusinename` varchar(100) NOT NULL,
  `cusineimage` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cusine`
--

INSERT INTO `cusine` (`id`, `cusinename`, `cusineimage`, `created_at`, `updated_at`) VALUES
(3, 'Rice', '908229430.jpg', '2017-10-06 07:53:06', '2017-10-06 02:23:06'),
(4, 'new ', '2.PNG', '2017-10-08 05:28:45', '2017-10-08 05:28:45'),
(5, 'Soup', 'courses-phonegap-874-228.png', '2017-10-11 01:11:58', '2017-10-11 01:11:58');

-- --------------------------------------------------------

--
-- Table structure for table `dish`
--

CREATE TABLE `dish` (
  `id` int(11) NOT NULL,
  `cusine_id` int(11) NOT NULL,
  `dish_type` int(11) NOT NULL,
  `dish_name` varchar(100) NOT NULL,
  `dish_tag` varchar(50) NOT NULL,
  `dish_image` varchar(50) NOT NULL,
  `dish_des` varchar(500) NOT NULL,
  `price` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dish`
--

INSERT INTO `dish` (`id`, `cusine_id`, `dish_type`, `dish_name`, `dish_tag`, `dish_image`, `dish_des`, `price`, `created_at`, `updated_at`) VALUES
(5, 4, 1, 'rice', '', 'the-alchemist.jpg', '<p>WERTFHYTR</p>\r\n', '20', '2017-10-09 04:15:41', '2017-10-09 04:15:41'),
(6, 5, 1, 'Soup', '', 'images (3).jpg', '<p>Soup</p>\r\n', '500', '2017-10-11 01:12:49', '2017-10-11 01:12:49'),
(7, 5, 1, 'Tomato Soup', '', 'download.jpg', '<p>Tomato Soup</p>\r\n', '50', '2017-10-11 01:13:24', '2017-10-11 01:13:24');

-- --------------------------------------------------------

--
-- Table structure for table `dish_type`
--

CREATE TABLE `dish_type` (
  `id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dish_type`
--

INSERT INTO `dish_type` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Drinks', '2017-10-06 08:12:43', '2017-10-06 02:42:43'),
(2, 'Sweet', '2017-10-06 08:11:18', '2017-10-06 02:41:18');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(11) NOT NULL,
  `waiter_name` varchar(100) NOT NULL,
  `table_id` int(11) NOT NULL,
  `dish_name` varchar(80) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `table_name` varchar(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `total` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL,
  `serve_status` varchar(32) NOT NULL DEFAULT 'orderd',
  `grand_total` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `waiter_name`, `table_id`, `dish_name`, `quantity`, `price`, `table_name`, `order_id`, `total`, `status`, `serve_status`, `grand_total`, `created_at`, `updated_at`) VALUES
(1, 'Saleem', 1, 'rice', 1, 20, '1', 20170001, '20', '0', 'Served', '', '2017-10-12 12:45:29', '2017-10-12 06:58:58'),
(2, 'Saleem', 1, 'Soup', 5, 500, '1', 20170001, '2500', '1', 'Cooking', '', '2017-10-16 05:00:47', '2017-10-12 06:58:58'),
(3, 'Saleem', 5, 'Tomato Soup', 5, 50, '5', 20170002, '250', '0', 'Served', '', '2017-10-12 12:46:53', '2017-10-12 07:02:23'),
(4, 'Saleem', 5, 'Soup', 1, 500, '5', 20170002, '500', '1', 'orderd', '', '2017-10-12 07:02:23', '2017-10-12 07:02:23'),
(5, 'Saleem', 5, 'rice', 7, 20, '5', 20170002, '140', '2', 'Cooking', '', '2017-10-16 05:00:51', '2017-10-12 07:02:23'),
(6, 'Rajesh', 6, 'rice', 4, 20, '6', 20170003, '80', '0', 'Served', '', '2017-10-12 12:57:00', '2017-10-12 07:25:57'),
(7, 'Rajesh', 6, 'Soup', 3, 500, '6', 20170003, '1500', '1', 'orderd', '', '2017-10-12 07:25:57', '2017-10-12 07:25:57'),
(8, 'Rajesh', 6, 'Tomato Soup', 5, 50, '6', 20170003, '250', '2', 'orderd', '', '2017-10-12 07:25:57', '2017-10-12 07:25:57'),
(9, 'Rajesh', 5, 'Soup', 5, 500, '5', 20170004, '2500', '0', 'orderd', '', '2017-10-12 07:26:11', '2017-10-12 07:26:11'),
(10, 'Rajesh', 1, '', 0, 0, '1', 20170005, '', '0', 'orderd', '', '2017-10-12 07:30:29', '2017-10-12 07:30:29'),
(11, 'Saleem', 2, 'Soup', 5, 500, '2', 20170006, '2500', '0', 'Served', '', '2017-10-16 04:49:23', '2017-10-15 23:18:35'),
(12, 'Saleem', 2, 'rice', 5, 20, '2', 20170006, '100', '1', 'orderd', '', '2017-10-15 23:18:35', '2017-10-15 23:18:35'),
(13, 'Saleem', 6, 'Soup', 10, 500, '6', 20170007, '5000', '0', 'Served', '', '2017-10-16 04:53:15', '2017-10-15 23:22:28'),
(14, 'Saleem', 6, 'Soup', 11, 500, '6', 20170007, '5500', '1', 'orderd', '', '2017-10-15 23:22:29', '2017-10-15 23:22:29'),
(15, 'Saleem', 6, 'rice', 5, 20, '6', 20170007, '100', '2', 'Cooking', '', '2017-10-16 05:00:42', '2017-10-15 23:22:29'),
(16, 'Satheesh', 1, '', 0, 0, '1', 20170008, '', '0', 'Served', '', '2017-10-16 08:56:01', '2017-10-16 00:05:19'),
(17, 'Satheesh', 2, 'Soup', 10, 500, '2', 20170009, '5000', '5200', 'orderd', '', '2017-10-16 00:14:53', '2017-10-16 00:14:53'),
(18, 'Satheesh', 2, 'rice', 10, 20, '2', 20170009, '200', '5200', 'orderd', '', '2017-10-16 00:14:53', '2017-10-16 00:14:53'),
(19, 'Satheesh', 2, 'Soup', 10, 500, '2', 20170009, '5000', '0', 'Served', '5200', '2017-10-16 09:13:34', '2017-10-16 00:16:44'),
(20, 'Satheesh', 2, 'rice', 10, 20, '2', 20170009, '200', '1', 'orderd', '5200', '2017-10-16 00:16:45', '2017-10-16 00:16:45'),
(21, 'Saleem', 7, 'rice', 1, 20, '7', 201700010, '20', '0', 'orderd', '20', '2017-10-16 03:24:03', '2017-10-16 03:24:03'),
(22, 'Satheesh', 5, 'Soup', 10, 500, '5', 201700011, '5000', '0', 'orderd', '5000', '2017-10-16 03:32:02', '2017-10-16 03:32:02'),
(23, 'Satheesh', 6, 'Soup', 10, 500, '6', 201700012, '5000', '0', 'orderd', '5100', '2017-10-16 03:42:24', '2017-10-16 03:42:24'),
(24, 'Satheesh', 6, 'rice', 5, 20, '6', 201700012, '100', '1', 'orderd', '5100', '2017-10-16 03:42:25', '2017-10-16 03:42:25'),
(25, 'Satheesh', 7, 'Soup', 100, 500, '7', 201700013, '50000', '0', 'orderd', '50000', '2017-10-16 03:42:50', '2017-10-16 03:42:50'),
(26, 'Satheesh', 8, 'Soup', 14, 500, '8', 201700014, '7000', '0', 'orderd', '7160', '2017-10-16 04:04:37', '2017-10-16 04:04:37'),
(27, 'Satheesh', 8, 'rice', 8, 20, '8', 201700014, '160', '1', 'orderd', '7160', '2017-10-16 04:04:37', '2017-10-16 04:04:37');

-- --------------------------------------------------------

--
-- Table structure for table `ordertable`
--

CREATE TABLE `ordertable` (
  `id` int(11) NOT NULL,
  `tableid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `startdatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `enddatetime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `amount` int(10) NOT NULL,
  `customername` varchar(15) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `grandtotal` int(11) NOT NULL,
  `status` varchar(15) NOT NULL,
  `paymentstatus` varchar(15) NOT NULL,
  `paymentmode` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paymentmode`
--

CREATE TABLE `paymentmode` (
  `id` int(11) NOT NULL,
  `pay_type` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `paymentmode`
--

INSERT INTO `paymentmode` (`id`, `pay_type`, `created_at`, `updated_at`) VALUES
(1, 'cash', '2017-10-16 03:19:34', '2017-10-16 03:19:34'),
(2, 'Card', '2017-10-16 03:19:48', '2017-10-16 03:19:48');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `currency` varchar(50) NOT NULL,
  `tax` int(5) NOT NULL,
  `vattax` int(5) NOT NULL,
  `additionaltax` int(5) NOT NULL,
  `discount` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `address`, `phone`, `currency`, `tax`, `vattax`, `additionaltax`, `discount`, `created_at`, `updated_at`) VALUES
(1, 'VM Hotel', 'Krishnagiri', '875369146', 'Rs', 2, 3, 3, 0, '2017-10-16 08:10:57', '2017-10-16 02:40:57');

-- --------------------------------------------------------

--
-- Table structure for table `tablemaster`
--

CREATE TABLE `tablemaster` (
  `id` int(11) NOT NULL,
  `tablename` varchar(255) NOT NULL,
  `tablestatus` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `tablemaster`
--

INSERT INTO `tablemaster` (`id`, `tablename`, `tablestatus`, `created_at`, `updated_at`) VALUES
(1, 'table', 1, '2017-10-09 05:57:06', '0000-00-00 00:00:00'),
(2, 'table2', 1, '2017-10-08 06:01:37', '0000-00-00 00:00:00'),
(3, 'table3', 0, '2017-10-12 12:53:00', '2017-10-08 00:35:56'),
(4, 'Table 4', 0, '2017-10-11 08:02:54', '0000-00-00 00:00:00'),
(5, 'Table6', 1, '2017-10-11 06:40:42', '0000-00-00 00:00:00'),
(6, 'Table 7', 1, '2017-10-11 08:03:08', '0000-00-00 00:00:00'),
(7, 'Cash', 1, '2017-10-16 08:45:54', '0000-00-00 00:00:00'),
(8, 'table 9', 1, '2017-10-16 09:16:31', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `usermaster`
--

CREATE TABLE `usermaster` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `usermaster`
--

INSERT INTO `usermaster` (`id`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
(2, 'Admin', 'admin', 'Admin', '2017-10-09 00:48:05', '2017-10-09 00:48:05'),
(3, 'Satheesh', 'satheesh', 'User(waiter)', '2017-10-11 07:15:14', '2017-10-11 07:15:14'),
(4, 'Saleem', 'saleem', 'User(waiter)', '2017-10-11 07:15:41', '2017-10-11 07:15:41'),
(5, 'Account', 'account', 'Accountant Manager', '2017-10-11 09:01:55', '2017-10-11 09:01:55'),
(6, 'Kitchen', 'kitchen', 'Kitchen Manager', '2017-10-11 09:03:26', '2017-10-11 09:03:26'),
(7, 'Rajesh', 'qwerty', 'User(waiter)', '2017-10-12 07:23:36', '2017-10-12 07:23:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'saif', 'saleemit80@gmail.com', '$2y$10$T6ZcxpzkUMSpCdH26Rho4Oyu4ytIblEXZH92bDSDy2ODPEhwB1j4u', '8qC6IVlH5jKkgdMAUc2byiGEBINtid6M1ANYZXSJB4cgvrXuv0fzECMajKu2', '2017-10-06 21:48:34', '2017-10-12 07:24:03'),
(2, 'admin', 'admin@admin.com', '$2y$10$VmD77Q7sjtSIIYYImXRwcuhZNy3TEIsa4gwX78N0gZ9MuzLXd.g7.', 'ejbV51ZnxZQF7AofUMOmTOrEQgrkgTdOHAzmbHo332zJmYpMq58u1GVoZds4', '2017-10-11 02:57:16', '2017-10-15 23:56:17');

-- --------------------------------------------------------

--
-- Table structure for table `waiter`
--

CREATE TABLE `waiter` (
  `id` int(11) NOT NULL,
  `waiter_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `waiter`
--

INSERT INTO `waiter` (`id`, `waiter_name`, `created_at`, `updated_at`) VALUES
(1, 'Raju', '2017-10-11 07:27:18', '2017-10-11 01:57:18'),
(2, 'Mahesh', '2017-10-11 07:28:52', '2017-10-11 01:58:52'),
(3, 'Suresh', '2017-10-11 07:29:39', '2017-10-11 01:59:39'),
(4, 'Ramesh', '2017-10-11 07:29:22', '2017-10-11 01:59:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cusine`
--
ALTER TABLE `cusine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dish`
--
ALTER TABLE `dish`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dish_type`
--
ALTER TABLE `dish_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordertable`
--
ALTER TABLE `ordertable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentmode`
--
ALTER TABLE `paymentmode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tablemaster`
--
ALTER TABLE `tablemaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usermaster`
--
ALTER TABLE `usermaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `waiter`
--
ALTER TABLE `waiter`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cusine`
--
ALTER TABLE `cusine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `dish`
--
ALTER TABLE `dish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `dish_type`
--
ALTER TABLE `dish_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `ordertable`
--
ALTER TABLE `ordertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `paymentmode`
--
ALTER TABLE `paymentmode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tablemaster`
--
ALTER TABLE `tablemaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `usermaster`
--
ALTER TABLE `usermaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `waiter`
--
ALTER TABLE `waiter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
