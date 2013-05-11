-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 09, 2012 at 01:22 AM
-- Server version: 5.5.28-0ubuntu0.12.04.2
-- PHP Version: 5.4.8-1~precise+1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllProducts`()
BEGIN 
SELECT * FROM products; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetUserInfo`()
BEGIN 
SELECT u.id, u.username, (select ui.filename from userImage as ui where u.id = ui.userId and ui.useProfile = 1 limit 1) as profileImage FROM user as u; 
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `heading` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `heading`, `description`, `image`, `created`) VALUES
(3, 'ram', 'i am ram', '509bfc02bb731.png', '2012-11-08 18:37:54'),
(4, 'heading2', 'this is description', '509bfc18562b3.jpg', '2012-11-08 18:38:16'),
(6, 'sdafdsf', 'asfsadf', '509c080e00a6c.jpg', '2012-11-08 19:28:50');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
