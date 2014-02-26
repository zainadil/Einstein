-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 26, 2014 at 10:05 PM
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
  `id` varchar(50) NOT NULL DEFAULT '' COMMENT 'Unique id',
  `skill` varchar(15) NOT NULL,
  `uid` int(11) NOT NULL DEFAULT '0',
  `detail` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Masters (teachers/tutors) table - point of contact for search';

--
-- Dumping data for table `masters`
--

INSERT INTO `masters` (`name`, `long`, `lat`, `rating`, `backers`, `type`, `rateCount`, `id`, `skill`, `uid`, `detail`) VALUES
('Abdullah Bangali', -79.476662, 43.804034, 4.1, 20, 0, 28, 'Abdullah99BangaliABCDEFG5020', 'french', 0, 'Graduated. Works in the Industry.'),
('Aditya Murray', -79.552059, 43.779069, 4.5, 8, 0, 47, 'Aditya99MurrayABCDEFG5021', 'code', 0, 'Hacker 4 Life'),
('Aditya Murray', -79.540805, 43.786248, 4.3, 3, 0, 25, 'Aditya99MurrayABCDEFG5022', 'french', 0, 'Hacker 4 Life'),
('Anirudh Agnihotri', -79.542893, 43.776349, 5, 35, 0, 5, 'Anirudh99AgnihotriABCDEFG5023', 'guitar', 0, 'Player. What else can I say.'),
('Anirudh Agnihotri', -79.477786, 43.766234, 4.1, 14, 0, 9, 'Anirudh99AgnihotriABCDEFG5024', 'code', 0, 'Player. What else can I say.'),
('Ashwin Dey', -79.515247, 43.766373, 4.1, 28, 0, 15, 'Ashwin99DeyABCDEFG5025', 'bake', 0, 'Graduated. Working in the Industry.'),
('Ashwin Dey', -79.465082, 43.77717, 4.5, 6, 0, 38, 'Ashwin99DeyABCDEFG5026', 'code', 0, 'Graduated. Working in the Industry.'),
('Ashwin Dey', -79.49482, 43.804534, 4.2, 0, 0, 42, 'Ashwin99DeyABCDEFG5027', 'french', 0, 'Graduated. Working in the Industry.'),
('Asim Delavenne', -79.455941, 43.779495, 4.2, 23, 0, 70, 'Asim99DelavenneABCDEFG5028', 'guitar', 0, 'On an Intership at IBM. Enjoying life.'),
('Asim Delavenne', -79.590364, 43.785293, 4.3, 8, 0, 58, 'Asim99DelavenneABCDEFG5029', 'dance', 0, 'On an Intership at IBM. Enjoying life.'),
('Fahad Siddiqui', -79.50276, 43.786283, 4.1, 34, 0, 84, 'Fahad99SiddiquiABCDEFG5030', 'bake', 0, 'Wingman. Bodyguard.'),
('Fahad Siddiqui', -79.547006, 43.77536, 4.3, 3, 0, 55, 'Fahad99SiddiquiABCDEFG5031', 'dance', 0, 'Wingman. Bodyguard.'),
('Fahad Siddiqui', -79.463631, 43.788819, 4.3, 22, 0, 33, 'Fahad99SiddiquiABCDEFG5032', 'code', 0, 'Wingman. Bodyguard.'),
('Haroon Awan', -79.431544, 43.778207, 4.6, 28, 0, 21, 'Haroon99AwanABCDEFG5033', 'bake', 0, 'The terminator.'),
('Haroon Awan', -79.556033, 43.75354, 4.6, 27, 0, 31, 'Haroon99AwanABCDEFG5034', 'guitar', 0, 'The terminator.'),
('Haroon Awan', -79.533655, 43.756475, 4.7, 38, 0, 38, 'Haroon99AwanABCDEFG5035', 'code', 0, 'The terminator.'),
('Herman Singh Badwal', -79.557093, 43.803994, 4, 27, 0, 83, 'HermanSinghBadwalABCDEFG5000', 'dance', 0, 'Loves to code and teach! Hates everything else'),
('Itzik JKob', -79.462452, 43.75387, 3.6, 9, 0, 27, 'Itzik99JKobABCDEFG5036', 'code', 0, 'Junior Software Dev.'),
('Jatin Behl', -79.540154, 43.762278, 4.2, 37, 0, 29, 'Jatin99BehlABCDEFG5037', 'guitar', 0, 'Likes Samosas. Many many samosas.'),
('Jatin Behl', -79.581149, 43.780055, 4.7, 30, 0, 44, 'Jatin99BehlABCDEFG5038', 'dance', 0, 'Likes Samosas. Many many samosas.'),
('Jatin Behl', -79.585291, 43.761123, 4.3, 36, 0, 80, 'Jatin99BehlABCDEFG5039', 'code', 0, 'Likes Samosas. Many many samosas.'),
('Jatin Behl', -79.441589, 43.780304, 4, 4, 0, 53, 'Jatin99BehlABCDEFG5040', 'french', 0, 'Likes Samosas. Many many samosas.'),
('Jorge Pinilla', -79.497089, 43.770063, 3.9, 23, 0, 90, 'Jorge99PinillaABCDEFG5041', 'bake', 0, 'On an internship at Research In Motion.'),
('Jorge Pinilla', -79.458308, 43.7998, 3.7, 9, 0, 31, 'Jorge99PinillaABCDEFG5042', 'french', 0, 'On an internship at Research In Motion.'),
('Khady Lo Seck', -79.589331, 43.777451, 4.5, 20, 0, 77, 'KhadyLoSeckABCDEFG5001', 'bake', 0, 'Was born to teach! Computer Engineering Student at York University'),
('Khady Lo Seck', -79.542601, 43.753963, 5, 18, 0, 69, 'KhadyLoSeckABCDEFG5002', 'guitar', 0, 'Was born to teach! Computer Engineering Student at York University'),
('Khady Lo Seck', -79.44744, 43.766508, 4.6, 12, 0, 77, 'KhadyLoSeckABCDEFG5003', 'dance', 0, 'Was born to teach! Computer Engineering Student at York University'),
('Khan Obyoy Azad', -79.596143, 43.803813, 4.6, 20, 0, 16, 'Khan99Obyoy99AzadABCDEFG5043', 'dance', 0, 'Favourite student of Topsis'),
('Khan Obyoy Azad', -79.5986, 43.78035, 3.7, 4, 0, 69, 'Khan99Obyoy99AzadABCDEFG5044', 'code', 0, 'Favourite student of Topsis'),
('Manjeet Kaur', -79.575566, 43.784952, 4.8, 8, 0, 2, 'ManjeetKaurABCDEFG5004', 'bake', 0, 'Former IBMer, loves coding, travelling and making new friends'),
('Manjeet Kaur', -79.587663, 43.791818, 3.5, 1, 0, 88, 'ManjeetKaurABCDEFG5005', 'guitar', 0, 'Former IBMer, loves coding, travelling and making new friends'),
('Manjeet Kaur', -79.594556, 43.788276, 4.4, 21, 0, 69, 'ManjeetKaurABCDEFG5006', 'dance', 0, 'Former IBMer, loves coding, travelling and making new friends'),
('Manjeet Kaur', -79.520636, 43.791645, 4.3, 7, 0, 31, 'ManjeetKaurABCDEFG5007', 'french', 0, 'Former IBMer, loves coding, travelling and making new friends'),
('Matthew Walczyk', -79.599509, 43.800008, 4.3, 18, 0, 51, 'Matthew99WalczykABCDEFG5045', 'bake', 0, 'Chilling 25/7'),
('Matthew Walczyk', -79.562995, 43.785979, 4, 23, 0, 73, 'Matthew99WalczykABCDEFG5046', 'dance', 0, 'Chilling 25/7'),
('Matthew Walczyk', -79.609828, 43.751285, 3.7, 27, 0, 53, 'Matthew99WalczykABCDEFG5047', 'french', 0, 'Chilling 25/7'),
('Maynil Patel', -79.586541, 43.74804, 4.1, 15, 0, 66, 'Maynil99PatelABCDEFG5048', 'guitar', 0, 'Code monkey'),
('Maynil Patel', -79.588765, 43.786078, 3.8, 8, 0, 63, 'Maynil99PatelABCDEFG5049', 'code', 0, 'Code monkey'),
('Md. Zahed Hossain', -79.430169, 43.769981, 4.4, 27, 0, 87, 'MdZahedHossainABCDEFG5008', 'bake', 0, 'Born and raised in Bangladesh! LOVES FISH! To be Engineer, Musician, Guitarist, Tech Curious, Hacker, Tea Drinker, Sports lover. According to some rumors, he codes too..'),
('Md. Zahed Hossain', -79.58476, 43.77664, 5, 25, 0, 69, 'MdZahedHossainABCDEFG5009', 'french', 0, 'Born and raised in Bangladesh! LOVES FISH! To be Engineer, Musician, Guitarist, Tech Curious, Hacker, Tea Drinker, Sports lover. According to some rumors, he codes too..'),
('Mehsum Mansoor Naqvi', -79.569426, 43.757812, 4.1, 32, 0, 15, 'MehsumMansoorNaqviABCDEFG5010', 'guitar', 0, 'IBMER, Pakistani, Programmer, Happily Married'),
('Milandeep Singh Shergill', -79.605259, 43.747778, 4.7, 34, 0, 69, 'Milandeep99Singh99ShergillABCDEFG5050', 'guitar', 0, 'Samosas? I am down.'),
('Milandeep Singh Shergill', -79.46303, 43.751607, 5, 16, 0, 1, 'Milandeep99Singh99ShergillABCDEFG5051', 'dance', 0, 'Samosas? I am down.'),
('Milandeep Singh Shergill', -79.596715, 43.772182, 4.2, 23, 0, 36, 'Milandeep99Singh99ShergillABCDEFG5052', 'code', 0, 'Samosas? I am down.'),
('Milandeep Singh Shergill', -79.54192, 43.766327, 4.7, 21, 0, 20, 'Milandeep99Singh99ShergillABCDEFG5053', 'french', 0, 'Samosas? I am down.'),
('Moustapha Seck', -79.607167, 43.758616, 4.7, 7, 0, 96, 'Moustapha99SeckABCDEFG5054', 'guitar', 0, 'Just started programming. Enjoying it.'),
('Moustapha Seck', -79.593263, 43.749936, 4.5, 38, 0, 20, 'Moustapha99SeckABCDEFG5055', 'dance', 0, 'Just started programming. Enjoying it.'),
('Moustapha Seck', -79.491526, 43.794584, 3.8, 8, 0, 77, 'Moustapha99SeckABCDEFG5056', 'french', 0, 'Just started programming. Enjoying it.'),
('Nataly Sheinin', -79.555773, 43.786765, 4.5, 3, 0, 5, 'NatalySheininABCDEFG5011', 'dance', 0, 'Cooks better than she codes, and she cooks amazing?'),
('Nidale Hajjar', -79.49408, 43.755017, 4.5, 7, 0, 84, 'NidaleHajjarABCDEFG5012', 'guitar', 0, 'Designer, Developer and everything esle!'),
('Nidale Hajjar', -79.588518, 43.75842, 4, 3, 0, 87, 'NidaleHajjarABCDEFG5013', 'french', 0, 'Designer, Developer and everything esle!'),
('Omeed Safee-Rad', -79.532778, 43.795896, 4.1, 16, 0, 87, 'OmeedSafeeRadABCDEFG5014', 'dance', 0, 'Code Ninja! Will own a design Dojo one day!'),
('Shuayb Khan', -79.50412, 43.782717, 3.5, 21, 0, 86, 'Shuayb99KhanABCDEFG5057', 'bake', 0, 'The real Dastan of Persia (Not really Persian)'),
('Shuayb Khan', -79.445969, 43.771503, 4, 3, 0, 60, 'Shuayb99KhanABCDEFG5058', 'french', 0, 'The real Dastan of Persia (Not really Persian)'),
('Taha Rizvi', -79.567051, 43.756044, 4.3, 25, 0, 1, 'Taha99RizviABCDEFG5059', 'bake', 0, 'Hobby: Growing beard'),
('Taha Rizvi', -79.592679, 43.782845, 3.8, 6, 0, 74, 'Taha99RizviABCDEFG5060', 'dance', 0, 'Hobby: Growing beard'),
('Taha Rizvi', -79.600736, 43.754023, 4.2, 21, 0, 70, 'Taha99RizviABCDEFG5061', 'code', 0, 'Hobby: Growing beard'),
('Taha Rizvi', -79.478882, 43.775135, 4.1, 12, 0, 90, 'Taha99RizviABCDEFG5062', 'french', 0, 'Hobby: Growing beard'),
('Vadim Stark', -79.430167, 43.801287, 4.6, 6, 0, 95, 'VadimStarkABCDEFG5015', 'french', 0, 'In Russia, Code teaches you!'),
('Vivek Chaudhari', -79.584648, 43.783395, 3.8, 40, 0, 43, 'Vivek99ChaudhariABCDEFG5063', 'guitar', 0, 'Graduated. Working full time. Can teach code.'),
('Vivek Chaudhari', -79.429826, 43.748706, 4.8, 2, 0, 28, 'Vivek99ChaudhariABCDEFG5064', 'code', 0, 'Graduated. Working full time. Can teach code.'),
('Zain Adil', -79.603349, 43.768934, 3.6, 35, 0, 30, 'ZainAdilABCDEFG5016', 'bake', 0, 'Web and Security Dev! Would pick a nice Steak over Fish any day'),
('Zain Adil', -79.448157, 43.747114, 3.8, 0, 0, 61, 'ZainAdilABCDEFG5017', 'guitar', 0, 'Web and Security Dev! Would pick a nice Steak over Fish any day'),
('Zain Adil', -79.551972, 43.779557, 5, 21, 0, 41, 'ZainAdilABCDEFG5018', 'dance', 0, 'Web and Security Dev! Would pick a nice Steak over Fish any day'),
('Zain Adil', -79.528105, 43.795522, 4.4, 33, 0, 47, 'ZainAdilABCDEFG5019', 'french', 0, 'Web and Security Dev! Would pick a nice Steak over Fish any day');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
