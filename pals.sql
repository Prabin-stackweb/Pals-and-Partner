-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 28, 2021 at 06:33 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pals`
--

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Surya Subedi', 'ss_subedi9@yahoo.com', 'Regarding the Module 2 Journal Submission', 'This is m messge'),
(3, 'Surya Subedi', 'ss_subedi9@yahoo.com', 'Property', 'asdasfas'),
(4, 'Alex Smith', 'alex@gmail.com', 'Address', 'Hi I can\'t locate your address on google maps'),
(5, 'Khimu Sentury', 'khimusentury05@gmail.com', 'House Cleaning', 'I want to clean my house. What are the services you offer?');

-- --------------------------------------------------------

--
-- Table structure for table `quote_request`
--

DROP TABLE IF EXISTS `quote_request`;
CREATE TABLE IF NOT EXISTS `quote_request` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `area` decimal(10,0) NOT NULL,
  `frequency` varchar(100) NOT NULL,
  `service` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quote_request`
--

INSERT INTO `quote_request` (`id`, `user_id`, `name`, `email`, `phone`, `area`, `frequency`, `service`) VALUES
(1, 1, 'Ryan Malik', 'ryan@gmail.com', '0405030233', '123', 'Weekly', 'Office Cleaning'),
(2, 3, 'Nelson', 'nelson@gmail.com', '0234235093', '50', 'Fortnightly', 'House Cleaning');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `address`, `password`, `type`) VALUES
(1, 'Ryan Malik', 'ryan@gmail.com', '0405030233', '24 Calais Street, Hurstville, NSW', '$2y$10$ikZM3n3AcGCFPWa/PUXmL.fiC3uBv/p96wxxNtfIgbmnUpIgMsk76', 'admin'),
(14, 'Helen', 'helen@gmail.com', '0458200482', '123 address', '$2y$10$40hDumxafbb/FZCg/L6UKexleDSsTFb9IucfotrCszw2rCzcQe4hi', 'customer'),
(5, 'NIma', 'nima@gmail.com', '1234124124', '123 skdjfslndkll', '$2y$10$cZlpfx988GydpjTDdFRiAeuiVoxhnLf1So4fiPRUIR6z/hXmF.TdK', 'admin'),
(9, 'Admin', 'admin@palsandpartners.com', '023 456 1102', '232 Railway Parade, Kogarah, NSW 2217', '$2y$10$fMyOqkjR0OXSCxXkBF1giuGETjj4wZcBE.PRvsYop602aZ5esQBjC', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
