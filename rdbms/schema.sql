-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 23, 2014 at 02:32 AM
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
('Herman Singh Badwal', -73.578487, 45.513532, 4.9, 9, 0, 39, 'HermanSinghBadwal', 'code'),
('Khady Lo Seck', -73.578863, 45.513543, 1.6, 33, 0, 99, 'KhadyLoSeck', 'code'),
('Manjeet Kaur', -73.578526, 45.513537, 4.7, 18, 0, 24, 'ManjeetKaur', 'code'),
('Md. Zahed Hossain', -73.578235, 45.513536, 3.6, 29, 0, 66, 'MdZahedHossain', 'code'),
('Mehsum Mansoor Naqvi', -73.578205, 45.513507, 2.7, 31, 0, 37, 'MehsumMansoorNaqvi', 'code'),
('Nataly Sheinin', -73.5787, 45.513524, 2.5, 1, 0, 30, 'NatalySheinin', 'code'),
('Nidale Hajjar', -73.578889, 45.513539, 4, 21, 0, 90, 'NidaleHajjar', 'code'),
('Omeed Safee-Rad', -73.57811, 45.513534, 2.8, 22, 0, 63, 'OmeedSafeeRad', 'code'),
('Vadim Stark', -73.579096, 45.513505, 2.8, 29, 0, 86, 'VadimStark', 'code'),
('Will Smith', -73.578332, 45.513527, 1.6, 16, 0, 43, 'WillSmith', 'code'),
('Zain Adil', -73.579084, 45.513518, 2.8, 17, 0, 99, 'ZainAdil', 'code');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
