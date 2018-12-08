-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 08, 2018 at 02:47 PM
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
-- Table structure for table `developer`
--

DROP TABLE IF EXISTS `developer`;
CREATE TABLE IF NOT EXISTS `developer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` mediumtext NOT NULL,
  `details` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `developer`
--

INSERT INTO `developer` (`id`, `data`, `details`) VALUES
(1, '{\"aj\":{\"name\":\"Arjun\",\"password\":\"3B6F421E7550395E28E091C5565AC80A\"},\"ak\":{\"name\":\"Akshaya\",\"password\":\"17540AEF7B8470CC3EA8B2B9046AF3B6\"}}\r\n', 'users'),
(2, '{\"srm\":{\"username\":\"12\",\"contactnumber\":\"12\",\"password\":\"c20ad4d76fe97759aa27a0c99bff6710\",\"email\":\"12\",\"clgname\":\"srm\",\"branch_barch\":\"on\",\"ug\":\"on\"},\"vit\":{\"username\":\"ap\",\"contactnumber\":\"12\",\"password\":\"c20ad4d76fe97759aa27a0c99bff6710\",\"email\":\"ad\",\"clgname\":\"vit\",\"branch_eng\":\"on\",\"ug\":\"on\",\"dept_biomed\":\"on\"},\"bit\":{\"username\":\"wp\",\"contactnumber\":\"213\",\"password\":\"c20ad4d76fe97759aa27a0c99bff6710\",\"email\":\"dsas@\",\"clgname\":\"bit\",\"branch_eng\":\"on\",\"ug\":\"on\",\"dept_biomed\":\"on\"},\"bkm\":{\"username\":\"12\",\"contactnumber\":\"12\",\"password\":\"c20ad4d76fe97759aa27a0c99bff6710\",\"email\":\"12\",\"clgname\":\"bkm\",\"branch_eng\":\"on\",\"branch_mba\":\"on\",\"pg\":\"on\",\"dept_cse\":\"on\"},\"ted\":{\"username\":\"12\",\"contactnumber\":\"12\",\"password\":\"c20ad4d76fe97759aa27a0c99bff6710\",\"email\":\"m@ma.com\",\"clgname\":\"ted\",\"branch_mba\":\"on\",\"pg\":\"on\"},\"tip\":{\"username\":\"12\",\"contactnumber\":\"12\",\"password\":\"c20ad4d76fe97759aa27a0c99bff6710\",\"email\":\"da@gma.com\",\"clgname\":\"tip\",\"branch_mba\":\"on\",\"ug\":\"on\"}}', 'requests'),
(3, '{\"srm\":{\"username\":\"12\",\"contactnumber\":\"12\",\"password\":\"c20ad4d76fe97759aa27a0c99bff6710\",\"email\":\"12\",\"clgname\":\"srm\",\"branch_barch\":\"on\",\"ug\":\"on\"},\"vit\":{\"username\":\"ap\",\"contactnumber\":\"12\",\"password\":\"c20ad4d76fe97759aa27a0c99bff6710\",\"email\":\"ad\",\"clgname\":\"vit\",\"branch_eng\":\"on\",\"ug\":\"on\",\"dept_biomed\":\"on\"},\"bit\":{\"username\":\"wp\",\"contactnumber\":\"213\",\"password\":\"c20ad4d76fe97759aa27a0c99bff6710\",\"email\":\"dsas@\",\"clgname\":\"bit\",\"branch_eng\":\"on\",\"ug\":\"on\",\"dept_biomed\":\"on\"},\"bkm\":{\"username\":\"12\",\"contactnumber\":\"12\",\"password\":\"c20ad4d76fe97759aa27a0c99bff6710\",\"email\":\"12\",\"clgname\":\"bkm\",\"branch_eng\":\"on\",\"branch_mba\":\"on\",\"pg\":\"on\",\"dept_cse\":\"on\"},\"ted\":{\"username\":\"12\",\"contactnumber\":\"12\",\"password\":\"c20ad4d76fe97759aa27a0c99bff6710\",\"email\":\"m@ma.com\",\"clgname\":\"ted\",\"branch_mba\":\"on\",\"pg\":\"on\"},\"tip\":{\"username\":\"12\",\"contactnumber\":\"12\",\"password\":\"c20ad4d76fe97759aa27a0c99bff6710\",\"email\":\"da@gma.com\",\"clgname\":\"tip\",\"branch_mba\":\"on\",\"ug\":\"on\"}}', 'colleges'),
(4, '111115', 'keyCode');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
