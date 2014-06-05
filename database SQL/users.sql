-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 05, 2014 at 12:39 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test3`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `activation` varchar(300) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `activation` (`activation`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `email`, `password`, `activation`, `status`) VALUES
(12, 'jason4906347@yahoo.com.tw', 'yenchenlin1994', '9095c145cbdd8718d16e88e6ebaac7a7', '1'),
(11, 'cc41291181@gmail.com', '123..', '52205b5eb126f727f9f71f68f3072ccf', '0'),
(10, 'auszon3@gmail.com', 'haha123', '1866868965525fed3b8f3f5183941622', '1'),
(16, 'luckypig129@hotmail.com', '12345', 'ae5896c29a52a167e0b4ac05896ed500', '1'),
(17, '123@hotmail.com', 'mag', 'c7ccb35bd208a70fc949f67a04833906', '0'),
(18, 'alice@gmail.com', '1234567', '977e7a37dcaa37b224dfd4f22fbaca32', '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
