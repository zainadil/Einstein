-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 26, 2014 at 09:39 PM
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
  `uid` int(11) NOT NULL DEFAULT '0',
  `detail` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Masters (teachers/tutors) table - point of contact for search';

--
-- Dumping data for table `masters`
--

INSERT INTO `masters` (`name`, `long`, `lat`, `rating`, `backers`, `type`, `rateCount`, `id`, `skill`, `uid`, `detail`) VALUES
('Abdullah Bangali', -79.452171, 43.773417, 4.7, 12, 0, 85, 'Abdullah99BangaliABCDEFG5027', 'bake', 0, 'Graduated. Works in the Industry.'),
('Abdullah Bangali', -79.585877, 43.802179, 4.4, 20, 0, 30, 'AbdullahBangaliABCDEFG5028', 'guitar', 0, 'Graduated. Works in the Industry.'),
('Abdullah Bangali', -79.534664, 43.790477, 4.5, 32, 0, 29, 'AbdullahBangaliABCDEFG5029', 'dance', 0, 'Graduated. Works in the Industry.'),
('Abdullah Bangali', -79.573068, 43.757572, 4.5, 34, 0, 53, 'AbdullahBangaliABCDEFG5030', 'french', 0, 'Graduated. Works in the Industry.'),
('Aditya Murray', -79.605559, 43.795199, 3.8, 7, 0, 46, 'Aditya99MurrayABCDEFG5031', 'bake', 0, 'Hacker 4 Life'),
('Aditya Murray', -79.466302, 43.795318, 3.7, 35, 0, 100, 'AdityaMurrayABCDEFG5032', 'dance', 0, 'Hacker 4 Life'),
('Aditya Murray', -79.556104, 43.763264, 4.9, 32, 0, 52, 'AdityaMurrayABCDEFG5033', 'code', 0, 'Hacker 4 Life'),
('Anirudh Agnihotri', -79.463235, 43.762192, 4.9, 7, 0, 92, 'Anirudh99AgnihotriABCDEFG5034', 'bake', 0, 'Player. What else can I say.'),
('Anirudh Agnihotri', -79.507472, 43.754621, 4.3, 26, 0, 61, 'AnirudhAgnihotriABCDEFG5035', 'dance', 0, 'Player. What else can I say.'),
('Anirudh Agnihotri', -79.557869, 43.765036, 3.8, 22, 0, 27, 'AnirudhAgnihotriABCDEFG5036', 'french', 0, 'Player. What else can I say.'),
('Ashwin Dey', -79.463743, 43.761618, 5, 37, 0, 97, 'Ashwin99DeyABCDEFG5037', 'dance', 0, 'Graduated. Working in the Industry.'),
('Asim Delavenne', -79.510689, 43.804881, 4.2, 1, 0, 1, 'Asim99DelavenneABCDEFG5038', 'guitar', 0, 'On an Intership at IBM. Enjoying life.'),
('Asim Delavenne', -79.434401, 43.792241, 3.6, 2, 0, 66, 'AsimDelavenneABCDEFG5039', 'dance', 0, 'On an Intership at IBM. Enjoying life.'),
('Asim Delavenne', -79.589315, 43.777405, 3.6, 35, 0, 94, 'AsimDelavenneABCDEFG5040', 'code', 0, 'On an Intership at IBM. Enjoying life.'),
('Fahad Siddiqui', -79.593502, 43.799334, 4.2, 12, 0, 56, 'Fahad99SiddiquiABCDEFG5041', 'guitar', 0, 'Wingman. Bodyguard.'),
('Fahad Siddiqui', -79.482776, 43.803918, 4.2, 15, 0, 47, 'FahadSiddiquiABCDEFG5042', 'dance', 0, 'Wingman. Bodyguard.'),
('Fahad Siddiqui', -79.573535, 43.789234, 4.4, 12, 0, 89, 'FahadSiddiquiABCDEFG5043', 'french', 0, 'Wingman. Bodyguard.'),
('Haroon Awan', -79.507827, 43.780844, 3.5, 12, 0, 17, 'Haroon99AwanABCDEFG5044', 'french', 0, 'The terminator.'),
('Herman Singh Badwal', -79.469883, 43.790797, 4, 1, 0, 99, 'HermanSinghBadwalABCDEFG5000', 'guitar', 0, 'Loves to code and teach! Hates everything else'),
('Herman Singh Badwal', -79.535726, 43.77068, 5, 29, 0, 70, 'HermanSinghBadwalABCDEFG5001', 'dance', 0, 'Loves to code and teach! Hates everything else'),
('Herman Singh Badwal', -79.484987, 43.752794, 4, 37, 0, 89, 'HermanSinghBadwalABCDEFG5002', 'code', 0, 'Loves to code and teach! Hates everything else'),
('Herman Singh Badwal', -79.456778, 43.787808, 4, 16, 0, 2, 'HermanSinghBadwalABCDEFG5003', 'french', 0, 'Loves to code and teach! Hates everything else'),
('Itzik JKob', -79.557794, 43.746865, 4.6, 38, 0, 54, 'Itzik99JKobABCDEFG5045', 'bake', 0, 'Junior Software Dev.'),
('Itzik JKob', -79.568275, 43.784999, 3.5, 25, 0, 85, 'ItzikJKobABCDEFG5046', 'code', 0, 'Junior Software Dev.'),
('Jatin Behl', -79.452428, 43.793014, 4.2, 24, 0, 71, 'Jatin99BehlABCDEFG5047', 'bake', 0, 'Likes Samosas. Many many samosas.'),
('Jatin Behl', -79.431519, 43.782847, 4, 0, 0, 83, 'JatinBehlABCDEFG5048', 'dance', 0, 'Likes Samosas. Many many samosas.'),
('Jorge Pinilla', -79.495316, 43.749447, 3.6, 40, 0, 47, 'Jorge99PinillaABCDEFG5049', 'bake', 0, 'On an internship at Research In Motion.'),
('Jorge Pinilla', -79.487046, 43.799513, 4.1, 35, 0, 5, 'JorgePinillaABCDEFG5050', 'dance', 0, 'On an internship at Research In Motion.'),
('Khady Lo Seck', -79.437939, 43.76451, 4, 6, 0, 92, 'KhadyLoSeckABCDEFG5004', 'guitar', 0, 'Was born to teach! Computer Engineering Student at York University'),
('Khady Lo Seck', -79.517975, 43.800459, 4.7, 28, 0, 42, 'KhadyLoSeckABCDEFG5005', 'dance', 0, 'Was born to teach! Computer Engineering Student at York University'),
('Khady Lo Seck', -79.524001, 43.774387, 4.1, 13, 0, 41, 'KhadyLoSeckABCDEFG5006', 'code', 0, 'Was born to teach! Computer Engineering Student at York University'),
('Khady Lo Seck', -79.53728, 43.757598, 4.1, 34, 0, 69, 'KhadyLoSeckABCDEFG5007', 'french', 0, 'Was born to teach! Computer Engineering Student at York University'),
('Khan Obyoy Azad', -79.50767, 43.776301, 4.1, 13, 0, 1, 'Khan99Obyoy99AzadABCDEFG5051', 'bake', 0, 'Favourite student of Topsis'),
('Khan Obyoy Azad', -79.560373, 43.747645, 4.1, 32, 0, 23, 'KhanObyoyAzadABCDEFG5052', 'guitar', 0, 'Favourite student of Topsis'),
('Khan Obyoy Azad', -79.555424, 43.796396, 4.2, 23, 0, 79, 'KhanObyoyAzadABCDEFG5053', 'dance', 0, 'Favourite student of Topsis'),
('Khan Obyoy Azad', -79.502311, 43.774285, 3.6, 23, 0, 3, 'KhanObyoyAzadABCDEFG5054', 'french', 0, 'Favourite student of Topsis'),
('Manjeet Kaur', -79.52377, 43.749316, 4.7, 32, 0, 60, 'ManjeetKaurABCDEFG5008', 'guitar', 0, 'Former IBMer, loves coding, travelling and making new friends'),
('Manjeet Kaur', -79.546203, 43.763272, 4.1, 8, 0, 16, 'ManjeetKaurABCDEFG5009', 'dance', 0, 'Former IBMer, loves coding, travelling and making new friends'),
('Manjeet Kaur', -79.611072, 43.776708, 4.7, 14, 0, 20, 'ManjeetKaurABCDEFG5010', 'french', 0, 'Former IBMer, loves coding, travelling and making new friends'),
('Matthew Walczyk', -79.476201, 43.802072, 4.1, 37, 0, 50, 'Matthew99WalczykABCDEFG5055', 'guitar', 0, 'Chilling 25/7'),
('Matthew Walczyk', -79.477256, 43.781173, 4, 37, 0, 78, 'MatthewWalczykABCDEFG5056', 'dance', 0, 'Chilling 25/7'),
('Matthew Walczyk', -79.590802, 43.781189, 3.7, 9, 0, 36, 'MatthewWalczykABCDEFG5057', 'code', 0, 'Chilling 25/7'),
('Matthew Walczyk', -79.441319, 43.800405, 3.8, 39, 0, 31, 'MatthewWalczykABCDEFG5058', 'french', 0, 'Chilling 25/7'),
('Maynil Patel', -79.451331, 43.769739, 3.8, 28, 0, 63, 'Maynil99PatelABCDEFG5059', 'guitar', 0, 'Code monkey'),
('Maynil Patel', -79.489212, 43.748486, 4, 17, 0, 40, 'MaynilPatelABCDEFG5060', 'dance', 0, 'Code monkey'),
('Maynil Patel', -79.564277, 43.774715, 4.5, 14, 0, 25, 'MaynilPatelABCDEFG5061', 'code', 0, 'Code monkey'),
('Md. Zahed Hossain', -79.516384, 43.793367, 4.9, 22, 0, 58, 'MdZahedHossainABCDEFG5011', 'code', 0, 'Born and raised in Bangladesh! LOVES FISH! To be Engineer, Musician, Guitarist, Tech Curious, Hacker, Tea Drinker, Sports lover. According to some rumors, he codes too..'),
('Mehsum Mansoor Naqvi', -79.585424, 43.799806, 4.9, 5, 0, 9, 'MehsumMansoorNaqviABCDEFG5012', 'bake', 0, 'IBMER, Pakistani, Programmer, Happily Married'),
('Mehsum Mansoor Naqvi', -79.50776, 43.748889, 3.5, 30, 0, 100, 'MehsumMansoorNaqviABCDEFG5013', 'guitar', 0, 'IBMER, Pakistani, Programmer, Happily Married'),
('Mehsum Mansoor Naqvi', -79.46676, 43.767708, 4.3, 14, 0, 3, 'MehsumMansoorNaqviABCDEFG5014', 'dance', 0, 'IBMER, Pakistani, Programmer, Happily Married'),
('Milandeep Singh Shergill', -79.562904, 43.765021, 4.3, 30, 0, 86, 'Milandeep99Singh99ShergillABCD', 'bake', 0, 'Samosas? I am down.'),
('Milandeep Singh Shergill', -79.510509, 43.798972, 3.9, 3, 0, 19, 'MilandeepSinghShergillABCDEFG5', 'french', 0, 'Samosas? I am down.'),
('Moustapha Seck', -79.444537, 43.800915, 4.3, 39, 0, 15, 'Moustapha99SeckABCDEFG5064', 'bake', 0, 'Just started programming. Enjoying it.'),
('Moustapha Seck', -79.565932, 43.746592, 4.8, 20, 0, 89, 'MoustaphaSeckABCDEFG5065', 'guitar', 0, 'Just started programming. Enjoying it.'),
('Moustapha Seck', -79.565107, 43.766135, 3.5, 38, 0, 94, 'MoustaphaSeckABCDEFG5066', 'code', 0, 'Just started programming. Enjoying it.'),
('Nataly Sheinin', -79.429576, 43.766455, 3.8, 33, 0, 1, 'NatalySheininABCDEFG5015', 'guitar', 0, 'Cooks better than she codes, and she cooks amazing?'),
('Nataly Sheinin', -79.579549, 43.803666, 3.8, 26, 0, 96, 'NatalySheininABCDEFG5016', 'code', 0, 'Cooks better than she codes, and she cooks amazing?'),
('Nataly Sheinin', -79.525097, 43.774703, 3.7, 19, 0, 54, 'NatalySheininABCDEFG5017', 'french', 0, 'Cooks better than she codes, and she cooks amazing?'),
('Nidale Hajjar', -79.54417, 43.74717, 4.3, 29, 0, 4, 'NidaleHajjarABCDEFG5018', 'bake', 0, 'Designer, Developer and everything esle!'),
('Nidale Hajjar', -79.576666, 43.75509, 5, 1, 0, 22, 'NidaleHajjarABCDEFG5019', 'dance', 0, 'Designer, Developer and everything esle!'),
('Nidale Hajjar', -79.480418, 43.788162, 4.7, 37, 0, 78, 'NidaleHajjarABCDEFG5020', 'code', 0, 'Designer, Developer and everything esle!'),
('Omeed Safee-Rad', -79.575806, 43.784214, 4, 26, 0, 43, 'OmeedSafeeRadABCDEFG5021', 'guitar', 0, 'Code Ninja! Will own a design Dojo one day!'),
('Omeed Safee-Rad', -79.512084, 43.78311, 5, 25, 0, 42, 'OmeedSafeeRadABCDEFG5022', 'code', 0, 'Code Ninja! Will own a design Dojo one day!'),
('Omeed Safee-Rad', -79.541832, 43.793454, 4.8, 13, 0, 74, 'OmeedSafeeRadABCDEFG5023', 'french', 0, 'Code Ninja! Will own a design Dojo one day!'),
('Shuayb Khan', -79.581176, 43.797494, 4.2, 19, 0, 58, 'Shuayb99KhanABCDEFG5067', 'bake', 0, 'The real Dastan of Persia (Not really Persian)'),
('Shuayb Khan', -79.438944, 43.765155, 4.9, 11, 0, 21, 'ShuaybKhanABCDEFG5068', 'guitar', 0, 'The real Dastan of Persia (Not really Persian)'),
('Shuayb Khan', -79.54181, 43.747299, 3.8, 38, 0, 38, 'ShuaybKhanABCDEFG5069', 'dance', 0, 'The real Dastan of Persia (Not really Persian)'),
('Shuayb Khan', -79.599046, 43.757961, 4, 5, 0, 83, 'ShuaybKhanABCDEFG5070', 'code', 0, 'The real Dastan of Persia (Not really Persian)'),
('Taha Rizvi', -79.576739, 43.778666, 4.5, 18, 0, 56, 'Taha99RizviABCDEFG5071', 'bake', 0, 'Hobby: Growing beard'),
('Taha Rizvi', -79.432895, 43.786797, 4.5, 16, 0, 25, 'TahaRizviABCDEFG5072', 'guitar', 0, 'Hobby: Growing beard'),
('Taha Rizvi', -79.554545, 43.780725, 4.1, 22, 0, 84, 'TahaRizviABCDEFG5073', 'code', 0, 'Hobby: Growing beard'),
('Taha Rizvi', -79.596692, 43.769254, 4.3, 18, 0, 46, 'TahaRizviABCDEFG5074', 'french', 0, 'Hobby: Growing beard'),
('Vadim Stark', -79.593107, 43.782893, 4.4, 27, 0, 5, 'VadimStarkABCDEFG5024', 'guitar', 0, 'In Russia, Code teaches you!'),
('Vadim Stark', -79.453215, 43.752635, 4.3, 19, 0, 77, 'VadimStarkABCDEFG5025', 'code', 0, 'In Russia, Code teaches you!'),
('Vivek Chaudhari', -79.597193, 43.76961, 3.9, 10, 0, 68, 'Vivek99ChaudhariABCDEFG5075', 'guitar', 0, 'Graduated. Working full time. Can teach code.'),
('Vivek Chaudhari', -79.525588, 43.779863, 4.6, 18, 0, 7, 'VivekChaudhariABCDEFG5076', 'code', 0, 'Graduated. Working full time. Can teach code.'),
('Zain Adil', -79.572514, 43.766629, 4.8, 7, 0, 51, 'ZainAdilABCDEFG5026', 'dance', 0, 'Web and Security Dev! Would pick a nice Steak over Fish any day');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
