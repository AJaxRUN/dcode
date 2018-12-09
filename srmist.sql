-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 09, 2018 at 02:56 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `d_code`
--

-- --------------------------------------------------------

--
-- Table structure for table `srmist`
--

DROP TABLE IF EXISTS `srmist`;
CREATE TABLE IF NOT EXISTS `srmist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` mediumtext NOT NULL,
  `details` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `srmist`
--

INSERT INTO `srmist` (`id`, `data`, `details`) VALUES
(1, '{\r\n	\"123\":{\r\n		\"name\" : \"karthik\";\r\n		\"year\" : \"I\";\r\n		\"dept\" : \"CSE\";\r\n		\"section\" : \"A\";\r\n	}\r\n	\"124\":{\r\n		\"name\" : \"jeevitha\";\r\n		\"year\" : \"I\";\r\n		\"dept\" : \"CSE\";\r\n		\"section\" : \"A\";\r\n	}\r\n}', 'students'),
(2, '{\"900305\":{\"name\" : \"kiran\",\"password\":\"F974B3759E2E8362149521672E7FCB5F\",\"status\":\"Data not uploaded\"},\"aj\":{\"name\":\"Aj\",\"username\":\"aj\",\"password\":\"3B6F421E7550395E28E091C5565AC80A\",\"status\":\"Data not uploaded\"}}', 'users');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
