-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 09, 2013 at 05:12 PM
-- Server version: 5.5.31-0ubuntu0.12.04.1
-- PHP Version: 5.4.14-1~precise+1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sumit`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `heading` varchar(255) NOT NULL,
  `introduction` text,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` enum('product','event','new product') NOT NULL DEFAULT 'product',
  `publish_date` date DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `heading`, `introduction`, `description`, `image`, `type`, `publish_date`, `created`) VALUES
(2, 'product 2', '<p>this is product tow introduction</p>', '<p>do you like this product two</p>', '50d870475f5d7.jpg', 'new product', '2012-12-27', '2012-12-24 15:09:59'),
(4, 'testevent', '<p>test event</p>', '<p>sdf sdfsadfadsf</p>', '50db37a068b9d.jpg', 'event', '2012-12-11', '2012-12-26 17:45:04'),
(5, 'title', '<p>introduction</p>', '<p>desc</p>', '50e1b7d628125.png', 'product', '2012-01-01', '2012-12-31 16:05:42'),
(6, 'product 4', '<p>Product</p>', '<p>Product description</p>', '50e59b47df8d1.jpg', 'product', '2013-01-30', '2013-01-03 14:52:55'),
(7, 'test', '', '', '50e5a91439507.', 'product', '2013-01-03', '2013-01-03 15:51:48'),
(8, 'product 6', '', '', '50e5b3a2883fe.jpg', 'product', '2013-01-30', '2013-01-03 16:36:50'),
(9, 'product 7', '', '', '50e5b3bb736bc.jpg', 'product', '2013-01-31', '2013-01-03 16:37:15');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `option_name` varchar(255) NOT NULL,
  `option_value` longtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `option_name` (`option_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `option_name`, `option_value`) VALUES
(1, 'product_limit', '6'),
(3, 'new_product_limit', '2'),
(4, 'event_limit', '3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
