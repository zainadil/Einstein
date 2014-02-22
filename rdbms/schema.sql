-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 22, 2014 at 10:11 PM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `long` float DEFAULT NULL COMMENT 'Longitude',
  `lat` float DEFAULT NULL COMMENT 'latitude',
  `rating` float DEFAULT NULL COMMENT 'User rating',
  `backers` int(11) DEFAULT NULL COMMENT 'Number of backers',
  `type` int(11) DEFAULT NULL COMMENT 'Type - person, org',
  `rateCount` int(11) DEFAULT NULL COMMENT 'Number of ratings',
  `id` varchar(30) NOT NULL DEFAULT '' COMMENT 'Unique id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Masters (teachers/tutors) table - point of contact for search';

--
-- Dumping data for table `masters`
--

INSERT INTO `masters` (`name`, `long`, `lat`, `rating`, `backers`, `type`, `rateCount`, `id`) VALUES
('Linus Torvalds', 100.1, 200.2, 4.5, 10, 0, 70, 'Linus_Torvalds');

