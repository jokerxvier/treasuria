-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2013 at 10:09 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `treasure`
--
CREATE DATABASE IF NOT EXISTS `treasure` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `treasure`;

-- --------------------------------------------------------

--
-- Table structure for table `avatar_choices`
--

CREATE TABLE IF NOT EXISTS `avatar_choices` (
  `avatar_id` int(20) NOT NULL AUTO_INCREMENT,
  `image` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`avatar_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `avatar_choices`
--

INSERT INTO `avatar_choices` (`avatar_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'female1.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'female2.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'female3.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'male1.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'male2.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'male3.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'female1.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `login_logout`
--

CREATE TABLE IF NOT EXISTS `login_logout` (
  `login_logout_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `login_date` datetime NOT NULL,
  `logout_date` datetime NOT NULL,
  PRIMARY KEY (`login_logout_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `login_logout`
--

INSERT INTO `login_logout` (`login_logout_id`, `user_id`, `login_date`, `logout_date`) VALUES
(1, 30, '2013-11-06 02:57:36', '2013-11-06 02:58:23'),
(2, 30, '2013-11-06 02:58:28', '2013-11-06 03:04:41'),
(3, 5, '2013-11-06 03:05:14', '0000-00-00 00:00:00'),
(4, 5, '2013-11-06 05:39:51', '0000-00-00 00:00:00'),
(5, 3, '2013-11-06 07:17:17', '2013-11-06 09:35:09'),
(6, 5, '2013-11-06 09:36:16', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `payment_gateway`
--

CREATE TABLE IF NOT EXISTS `payment_gateway` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `payment_name` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_history`
--

CREATE TABLE IF NOT EXISTS `purchase_history` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) NOT NULL,
  `points` int(100) NOT NULL,
  `purchased_date` datetime NOT NULL,
  `merchant_id` int(20) NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `treasuria_gallery`
--

CREATE TABLE IF NOT EXISTS `treasuria_gallery` (
  `prize_uniq` varchar(75) NOT NULL,
  `prize_id` int(11) NOT NULL AUTO_INCREMENT,
  `prize_name` varchar(200) NOT NULL,
  `prize_img` varchar(200) NOT NULL,
  `prize_credits` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted` int(11) NOT NULL,
  PRIMARY KEY (`prize_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `treasuria_gallery`
--

INSERT INTO `treasuria_gallery` (`prize_uniq`, `prize_id`, `prize_name`, `prize_img`, `prize_credits`, `created_at`, `updated_at`, `deleted`) VALUES
('9ec3cbff0e6bf826a3d310483d465cc7', 1, 'Iphone 5', 'prize_1.png', 5000, '2013-10-23 16:00:00', '2013-10-23 16:00:00', 0),
('86c12cd177a3ce5493363820389ec724', 2, 'Macbook', 'prize_2.png', 10000, '2013-10-23 17:00:00', '2013-10-23 17:00:00', 0),
('f04be2328fe23d00a86ea326d6e7ec1d', 3, 'Galaxy S3', 'prize_3.png', 4000, '2013-10-23 17:00:00', '2013-10-23 17:00:00', 0),
('146bdebb324a64d327b1dde22a07d0bd', 4, 'Laptop', 'prize_4.png', 4500, '2013-10-23 00:00:00', '2013-10-23 00:00:00', 0),
('d6942640128d6e7f3fa9fdd5f2ec9e93', 5, 'Tumbler', 'prize_5.png', 500, '2013-10-23 00:00:00', '2013-10-23 00:00:00', 0),
('60a18ff6cff5f25e8ba53d3b7101b27a', 6, 'House & Lot', 'prize_6.png', 1000000, '2013-10-23 00:00:00', '2013-10-23 00:00:00', 0),
('a60ba1a7a56c9e00252baebe89d62c12', 7, 'Shoes', 'prize_7.png', 1000, '2013-10-23 00:00:00', '2013-10-23 00:00:00', 0),
('4be79689d51f61a5c665b7ce8ebd000a', 8, 'Pumpkin Costume', 'prize_8.png', 2000, '2013-10-23 00:00:00', '2013-10-23 00:00:00', 0),
('ae09b3a386306c28ce58c4377a0112ac', 9, 'Witch Costume', 'prize_9.png', 2000, '2013-10-23 00:00:00', '2013-10-23 00:00:00', 0),
('e75a4b46605b3adedcce3e98dace883a', 10, 'Jacket', 'prize_10.png', 100, '2013-10-23 00:00:00', '2013-10-23 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `treasuria_key`
--

CREATE TABLE IF NOT EXISTS `treasuria_key` (
  `key_uniq` varchar(75) NOT NULL COMMENT 'md5',
  `key_id` int(20) NOT NULL AUTO_INCREMENT,
  `key_img` varchar(200) NOT NULL,
  `key_credits` int(20) NOT NULL,
  `key_name` varchar(200) NOT NULL,
  `key_price` float NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted` int(11) NOT NULL,
  PRIMARY KEY (`key_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `treasuria_key`
--

INSERT INTO `treasuria_key` (`key_uniq`, `key_id`, `key_img`, `key_credits`, `key_name`, `key_price`, `created_at`, `updated_at`, `deleted`) VALUES
('10400861b715cc44e1ac2995bdb6ed75', 1, 'thumb_yellow_key.png', 20, 'Golden Gem Key', 2.99, '2013-10-23 10:13:00', '2013-10-23 11:00:00', 0),
('1da3cd8e6c06b154fa3d11f19a36983a', 2, 'thumb_purple_key.png', 50, 'Amethyst Gem Key', 6.99, '2013-10-23 11:00:00', '2013-10-23 11:00:00', 0),
('3853a698f6baeccbcbf7247386b752bd', 3, 'thumb_green_key.png', 150, 'Emerald Gem Key', 20.99, '2013-10-23 11:00:00', '2013-10-23 11:00:00', 0),
('93c0f41f1add195214064fcdbe5d3b78', 4, 'thumb_orange_key.png', 300, 'Citrine Gem Key', 41.99, '2013-10-23 11:00:00', '2013-10-23 11:00:00', 0),
('ab3dbb4d64b3b38304a12fd40a35faca', 5, 'thumb_blue_key.png', 500, 'Sapphire Gem Key', 69.99, '2013-10-23 11:00:00', '2013-10-23 11:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(20) NOT NULL AUTO_INCREMENT,
  `password` varchar(200) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `email` varchar(200) NOT NULL,
  `key_email` varchar(200) NOT NULL,
  `phone` int(20) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `user_type` int(11) NOT NULL,
  `deleted` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `password`, `firstname`, `lastname`, `address`, `city`, `country`, `created_at`, `updated_at`, `email`, `key_email`, `phone`, `gender`, `user_type`, `deleted`) VALUES
(1, '892528e3dc04c9901ec1d89176c07e62', 'Maritess', 'Maritess', 'Tomas Morato', 'Quezon City', 'Philippines', '2013-10-18 04:39:13', '2013-10-18 04:39:13', 'francesca.abrahan@gmail.com', '', 1234567, 'F', 1, 0),
(2, '56521b4d2824c0cb09bb240f8461acad', 'Sample', 'Sample', 'Valenzuela', 'Valenzuela', 'Philippines', '2013-10-18 05:52:37', '2013-10-18 05:52:37', 'desiree.alviento@yahoo.com', '', 35498466, 'F', 0, 0),
(3, 'cc03e747a6afbbcbf8be7668acfebee5', 'Desiree', 'Alviento', 'Valenzuela', 'Valenzuela', 'Philippines', '2013-10-22 07:35:36', '2013-10-22 07:35:36', 'des@y.com', '', 2147483647, 'F', 0, 0),
(4, '2ecff62bf9175186dfcde5cdc4130f8b', 'Julia Antoinette', 'Macaranas', '45 Kapiligan St Brgy Dona Imelda', 'Quezon City', 'Philippines', '2013-10-22 08:23:48', '2013-10-22 08:23:48', 'julia.macaranas@yahoo.com', '', 2147483647, 'F', 0, 0),
(5, 'cc03e747a6afbbcbf8be7668acfebee5', 'Desiree', 'Alviento', 'Valenzuela', 'Valenzuela', 'Philippines', '2013-10-29 06:36:05', '2013-10-29 06:36:05', 'desiree.alviento@gmail.com', '', 435356464, 'F', 1, 0),
(6, '84351463248c4630a6c258eb15c3c97e', 'Miguel', 'Rivera', 'asd asda', 'as dasd as', 'asdas das', '2013-10-30 05:02:34', '2013-10-30 05:02:34', 'rivera.migueld@gmail.com', '', 1234567890, 'M', 0, 0),
(7, 'cc03e747a6afbbcbf8be7668acfebee5', 'Desiree', 'Second', 'Valenzuela', 'Valenzuela', 'Philippines', '2013-11-06 03:08:39', '2013-11-06 03:08:39', 'gentleheart2391@yahoo.com', 'e3fd4be03a1c6f2e6ca3f9c8fb7eda98', 2147483647, 'F', 0, 0),
(34, 'cc03e747a6afbbcbf8be7668acfebee5', 'First Name', 'Last Name', 'Malinta', 'Malinta', 'Philippines', '2013-11-06 09:36:06', '2013-11-06 09:36:06', 'desss@gmail.com', 'ab60ac1e16c4f5f99f64d7fe9f55dc1a', 7654321, 'F', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_avatar`
--

CREATE TABLE IF NOT EXISTS `user_avatar` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) NOT NULL,
  `avatar_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user_avatar`
--

INSERT INTO `user_avatar` (`id`, `user_id`, `avatar_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 3, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 4, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 5, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 6, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 7, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_credits`
--

CREATE TABLE IF NOT EXISTS `user_credits` (
  `credits_id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) NOT NULL,
  `credits` int(25) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `item_qty` int(20) NOT NULL,
  `item_id` int(20) NOT NULL,
  PRIMARY KEY (`credits_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `user_credits`
--

INSERT INTO `user_credits` (`credits_id`, `user_id`, `credits`, `created_at`, `updated_at`, `item_qty`, `item_id`) VALUES
(15, 6, 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 2),
(16, 6, 150, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 3),
(17, 6, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 4),
(18, 6, 500, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 5),
(19, 6, 20, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 1),
(20, 2, 20, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, 1),
(21, 2, 150, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, 3),
(22, 2, 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, 2),
(23, 2, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, 4),
(24, 2, 500, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, 5),
(25, 6, 20, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(26, 6, 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 2),
(27, 6, 150, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 3),
(28, 6, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 4),
(29, 6, 500, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 5),
(30, 6, 20, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 5, 1),
(31, 2, 150, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 3),
(32, 7, 20, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 1),
(33, 7, 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 2),
(34, 7, 150, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 3),
(35, 7, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 4),
(36, 7, 500, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_points`
--

CREATE TABLE IF NOT EXISTS `user_points` (
  `points_id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) NOT NULL,
  `points` int(25) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`points_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user_points`
--

INSERT INTO `user_points` (`points_id`, `user_id`, `points`, `created_at`, `updated_at`) VALUES
(2, 1, 500000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 2, 50500, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 3, 50200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 4, 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 5, 10, '2013-10-29 06:33:36', '2013-10-29 06:33:36'),
(8, 6, 150, '2013-10-29 06:38:43', '2013-10-29 06:38:43'),
(9, 7, 200, '2013-10-30 05:03:12', '2013-10-30 05:03:12');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
