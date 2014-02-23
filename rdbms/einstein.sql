-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 23, 2014 at 12:01 PM
-- Server version: 5.5.25
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `einstein`
--

-- --------------------------------------------------------

--
-- Table structure for table `masters`
--

CREATE TABLE `masters` (
  `name` varchar(30) DEFAULT NULL COMMENT 'User/org name',
  `long` double DEFAULT NULL COMMENT 'Longitude',
  `lat` double DEFAULT NULL COMMENT 'latitude',
  `rating` float DEFAULT NULL COMMENT 'User rating',
  `backers` int(11) DEFAULT NULL COMMENT 'Number of backers',
  `type` int(11) DEFAULT NULL COMMENT 'Type - person, org',
  `rateCount` int(11) DEFAULT NULL COMMENT 'Number of ratings',
  `id` varchar(30) NOT NULL DEFAULT '' COMMENT 'Unique id',
  `skill` varchar(15) NOT NULL,
  `uid` int(11) NOT NULL,
  `detail` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Masters (teachers/tutors) table - point of contact for search';

--
-- Dumping data for table `masters`
--

INSERT INTO `masters` (`name`, `long`, `lat`, `rating`, `backers`, `type`, `rateCount`, `id`, `skill`, `uid`, `detail`) VALUES
('Herman Singh Badwal', -73.665301, 45.535433, 3.7, 12, 0, 43, 'HermanSinghBadwal', 'code', 0, 'Loves to code and teach! Hates everything else'),
('Khady Lo Seck', -73.551515, 45.593669, 3.1, 8, 0, 22, 'KhadyLoSeck', 'code', 0, 'Was born to teach! Computer Engineering Student at York University'),
('Manjeet Kaur', -73.635006, 45.502506, 3.6, 2, 0, 97, 'ManjeetKaur', 'code', 0, 'Former IBMer, loves coding, travelling and making new friends'),
('Md. Zahed Hossain', -73.622779, 45.558152, 4.4, 31, 0, 43, 'MdZahedHossain', 'code', 0, 'Born and raised in Bangladesh! LOVES FISH! According to some rumors, he codes too..'),
('Mehsum Mansoor Naqvi', -73.565861, 45.567341, 2.3, 15, 0, 55, 'MehsumMansoorNaqvi', 'code', 0, 'IBMER, Pakistani, Programmer, Happily Married'),
('Nataly Sheinin', -73.561832, 45.492256, 4.8, 22, 0, 98, 'NatalySheinin', 'code', 0, 'Cooks better than she codes, and she cooks amazing?'),
('Nidale Hajjar', -73.669783, 45.582244, 2.3, 34, 0, 93, 'NidaleHajjar', 'code', 0, 'Designer, Developer and everything esle!'),
('Omeed Safee-Rad', -73.574398, 45.524658, 3, 38, 0, 7, 'OmeedSafeeRad', 'code', 0, 'Code Ninga! Will own a design Dojo one day!'),
('Vadim Stark', -73.642349, 45.588031, 3.4, 27, 0, 35, 'VadimStark', 'code', 0, 'In Russia, Code teaches you!'),
('Will Smith', -73.507666, 45.507406, 5, 10, 0, 32, 'WillSmith', 'code', 0, 'What do you want man! I am Will Smith!'),
('Zain Adil', -73.624161, 45.549844, 2.2, 3, 0, 49, 'ZainAdil', 'code', 0, 'Web and Security Dev! Would pick a nice Steak over Fish any day!');
