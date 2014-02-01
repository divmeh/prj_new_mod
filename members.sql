-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2013 at 03:49 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `prj1`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `isenabled` varchar(10) NOT NULL DEFAULT '0',
  `isadmin` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `email`, `password`, `isenabled`, `isadmin`) VALUES
(19, 'Kamal', 'kamal@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', '0', 0),
(23, 'Mehar', 'mehar@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', '1', 1),
(24, 'Kumar', 'kumar@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', '0', 0),
(25, 'Priya', 'priya@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', '0', 0),
(26, 'Piyush', 'piyush@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', '0', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
