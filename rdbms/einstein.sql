-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 23, 2014 at 06:35 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `einstein`
--
CREATE DATABASE IF NOT EXISTS `einstein` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `einstein`;

-- --------------------------------------------------------

--
-- Table structure for table `masters`
--

CREATE TABLE IF NOT EXISTS `masters` (
  `name` varchar(30) DEFAULT NULL COMMENT 'User/org name',
  `long` double DEFAULT NULL COMMENT 'Longitude',
  `lat` double DEFAULT NULL COMMENT 'latitude',
  `rating` float DEFAULT NULL COMMENT 'User rating',
  `backers` int(11) DEFAULT NULL COMMENT 'Number of backers',
  `type` int(11) DEFAULT NULL COMMENT 'Type - person, org',
  `rateCount` int(11) DEFAULT NULL COMMENT 'Number of ratings',
  `id` varchar(30) NOT NULL DEFAULT '' COMMENT 'Unique id',
  `skill` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Masters (teachers/tutors) table - point of contact for search';

--
-- Dumping data for table `masters`
--

INSERT INTO `masters` (`name`, `long`, `lat`, `rating`, `backers`, `type`, `rateCount`, `id`, `skill`) VALUES
('Herman Singh Badwal', -73.665301, 45.535433, 3.7, 11, 0, 43, 'HermanSinghBadwal', 'code'),
('Khady Lo Seck', -73.551515, 45.593669, 3.1, 8, 0, 22, 'KhadyLoSeck', 'code'),
('Manjeet Kaur', -73.635006, 45.502506, 3.6, 2, 0, 97, 'ManjeetKaur', 'code'),
('Md. Zahed Hossain', -73.622779, 45.558152, 4.4, 31, 0, 43, 'MdZahedHossain', 'code'),
('Mehsum Mansoor Naqvi', -73.565861, 45.567341, 2.3, 15, 0, 55, 'MehsumMansoorNaqvi', 'code'),
('Nataly Sheinin', -73.561832, 45.492256, 4.8, 22, 0, 98, 'NatalySheinin', 'code'),
('Nidale Hajjar', -73.669783, 45.582244, 2.3, 34, 0, 93, 'NidaleHajjar', 'code'),
('Omeed Safee-Rad', -73.574398, 45.524658, 3, 38, 0, 7, 'OmeedSafeeRad', 'code'),
('Vadim Stark', -73.642349, 45.588031, 3.4, 27, 0, 35, 'VadimStark', 'code'),
('Will Smith', -73.507666, 45.507406, 5, 10, 0, 32, 'WillSmith', 'code'),
('Zain Adil', -73.624161, 45.549844, 2.2, 3, 0, 49, 'ZainAdil', 'code');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
