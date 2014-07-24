-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Jul 24, 2014 at 06:39 AM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rnr2db`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artist` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `artist`, `title`) VALUES
(1, 'The  Military  Wives', 'In  My  Dreams'),
(2, 'Adele', '21'),
(3, 'Bruce  Springsteen', 'Wrecking Ball (Deluxe)'),
(4, 'Lana  Del  Rey', 'Born  To  Die'),
(5, 'Gotye', 'Making  Mirrors'),
(6, 'Nirvana', 'Nevermind'),
(7, 'Nirvana', 'In Utero');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET latin1 NOT NULL,
  `colour` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `colour`) VALUES
(1, 'Restaurants', 0),
(2, 'Hotels', 0),
(3, 'Parks', 1),
(4, 'Libraries', 2),
(5, 'Cinemas', 23),
(6, 'Stadiums', 0);

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`friend_id`),
  KEY `IDX_21EE7069A76ED395` (`user_id`),
  KEY `IDX_21EE70696A5458E8` (`friend_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `abbreviation` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `name`, `abbreviation`) VALUES
(1, 'English', 'en'),
(2, 'Français', 'fr'),
(3, 'Deutsch', 'de'),
(4, 'Español', 'es'),
(5, 'Italiano', 'it'),
(6, 'Български', 'bg');

-- --------------------------------------------------------

--
-- Table structure for table `privilege`
--

CREATE TABLE `privilege` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resource_id` int(11) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permission_allow` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_87209A8789329D25` (`resource_id`),
  KEY `IDX_87209A87D60322AC` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_B6F7494EB6F7494E` (`question`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `question`) VALUES
(3, 'In what city did your father born?'),
(2, 'In what city did your mother born?'),
(4, 'In what city or town was your first job?'),
(1, 'What was your childhood phone number?');

-- --------------------------------------------------------

--
-- Table structure for table `resource`
--

CREATE TABLE `resource` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `rating` int(1) NOT NULL,
  `comments` text NOT NULL,
  `reviewedby` int(5) NOT NULL,
  `reviewdate` datetime NOT NULL,
  `photo` varchar(10) NOT NULL,
  `publish` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `reviewedby_idx` (`reviewedby`),
  KEY `categoryid_idx` (`categoryid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `itemid`, `categoryid`, `rating`, `comments`, `reviewedby`, `reviewdate`, `photo`, `publish`) VALUES
(1, 1, 1, 5, 'Good one', 1, '0000-00-00 00:00:00', '', 0),
(2, 1, 6, 5, 'Amazing Stuff', 1, '2014-01-01 00:00:00', '', 0),
(3, 2, 6, 4, 'Pretty Good', 1, '2014-01-01 00:00:00', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'guest'),
(2, 'member'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `roles_parents`
--

CREATE TABLE `roles_parents` (
  `role_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`role_id`,`parent_id`),
  KEY `IDX_C70E6B91D60322AC` (`role_id`),
  KEY `IDX_C70E6B91727ACA70` (`parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles_parents`
--

INSERT INTO `roles_parents` (`role_id`, `parent_id`) VALUES
(2, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `stadium`
--

CREATE TABLE `stadium` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `title` varchar(29) DEFAULT NULL,
  `address` varchar(55) DEFAULT NULL,
  `suburb` varchar(13) DEFAULT NULL,
  `telephone` varchar(17) DEFAULT NULL,
  `email` varchar(29) DEFAULT NULL,
  `disabledaccess` int(1) DEFAULT NULL,
  `website` varchar(41) DEFAULT NULL,
  `info` varchar(671) DEFAULT NULL,
  `categoryid` int(11) NOT NULL DEFAULT '6',
  `latitude` varchar(11) DEFAULT NULL,
  `longitude` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categoryid_idx` (`categoryid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `stadium`
--

INSERT INTO `stadium` (`id`, `title`, `address`, `suburb`, `telephone`, `email`, `disabledaccess`, `website`, `info`, `categoryid`, `latitude`, `longitude`) VALUES
(1, 'Metricon Stadium', 'Nerang - Broadbeach Road\nCarrara QLD 4211', 'Nerang ', ' (07) 5644 6200', '', 1, 'http://www.metriconstadium.com.au/', 'Metricon Stadium has been jointly funded by the Queensland Government ($71.9m), Commonwealth Government ($36m), Gold Coast City Council ($23m) and the AFL ($13.3m) and is a multipurpose facility that currently seats 25,000 spectators and will be capable of being extended to 40,000 seats in the future. Metricon Stadium features an AFL oval that will also be capable of holding ICC cricket matches, concerts, festivals, IAAF athletics events and FIFA World Cup soccer matches.', 6, '-28.005422', '153.367148'),
(2, 'The Gabba', 'Gate 7 Vulture Street\nWoolloongabba QLD 4102', 'Woolloongabba', '1300 843 422', 'info@thegabba.com.au', 1, 'http://www.thegabba.com.au/', 'The Gabba is one of nine major sporting and entertainment facilities owned and operated by Stadiums Queensland.', 6, '-27.485548', '153.038090'),
(3, 'Sleeman Sports Complex', 'Cnr Old Cleveland & Tilley Roads\nChandler Qld 4155', 'Chandler ', '(07) 07 3131 9620', 'info@sleemansports.com.au', 1, 'http://www.sleemansports.com.au/', 'Sleeman Sports Complex is one of eight major sporting and entertainment facilities owned and operated by Stadiums Queensland.', 6, NULL, NULL),
(4, 'QSAC', 'Kessels Road\nNathan QLD 4111', 'Nathan', '(07) 3405 7511', '', 1, 'http://www.qsac.com.au/', 'QSAC is one of eight major sporting and entertainment facilities owned and operated by Stadiums Queensland.', 6, NULL, NULL),
(5, '1300SMILES Stadium', 'Golf Links Drive\nKIRWAN  QLD  4817', 'Kirwan', '(07) 4722 7700', 'info@1300smilesstadium.com.au', 1, 'http://www.1300smilesstadium.com.au/', '1300SMILES Stadium is one of nine major sporting and entertainment facilities owned and operated by Stadiums Queensland. Stadiums Queensland (SQ) has been established by the Queensland Government to manage, operate and promote the use of the State', 6, NULL, NULL),
(6, 'Cbus Super Stadium', 'Cbus Super Stadium\nCentreline Place\nRobina   QLD   4226', 'Robina', '(07) 5656 5500', ' info@cbussuperstadium.com.au', 1, 'http://www.cbussuperstadium.com.au/', 'Cbus Super Stadium is one of nine major sporting and entertainment facilities owned and operated by Stadiums Queensland.', 6, NULL, NULL),
(7, 'Suncorp Stadium', '40 Castlemaine St. Milton QLD 4064', 'Milton', '(07) 3331 5000', 'info@suncorpstadium.com.au', 1, 'http://www.suncorpstadium.com.au/', 'Suncorp Stadium provides Brisbane and south-east Queensland with a 52,500 plus seat capacity, state-of-the art, world-class stadium able to accommodate a range of uses including:\n\nRugby League ', 6, NULL, NULL),
(8, 'Brisbane Entertainment Centre', 'Melaleuca Drive\nBoondall QLD 4034', 'Boondall', '(07) 3265 8111 ', 'bec@brisent.com.au', 1, 'http://www.brisent.com.au/', 'The Brisbane Entertainment Centre (BEC) is located in Boondall, a Brisbane City suburb, in Queensland, Australia. It is managed by AEG Ogden.\r\n\r\nThe arena has an array of seating plans which facilitate the comfort of its users, subject to performance. Specific seating plans are usually allocated, depending on the performance and the size of its audience.', 6, NULL, NULL),
(9, 'Queensland Tennis Centre', '190 King Arthur Terrace\nTennyson, QLD 4105', 'Tennyson', '(07) 3214 3800', '', 1, 'http://www.queenslandtenniscentre.com.au/', 'Tennis in Queensland is set to be bigger, brighter and more spectacular than ever with the advent of the Queensland Tennis Centre. Set on the banks of the iconic Brisbane River at Tennyson, the $82 million state-of-the-art facility includes:\n\nPat Rafter Arena ', 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_A393D2FBA393D2FB` (`state`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `state`) VALUES
(1, 'Disabled'),
(2, 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `answer` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `registration_date` datetime DEFAULT NULL,
  `registration_token` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_confirmed` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  KEY `IDX_8D93D649D60322AC` (`role_id`),
  KEY `IDX_8D93D64982F1BAF4` (`language_id`),
  KEY `IDX_8D93D6495D83CC1` (`state_id`),
  KEY `IDX_8D93D6491E27F6BF` (`question_id`),
  KEY `search_idx` (`username`,`first_name`,`last_name`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role_id`, `language_id`, `state_id`, `question_id`, `username`, `first_name`, `last_name`, `email`, `password`, `answer`, `picture`, `registration_date`, `registration_token`, `email_confirmed`) VALUES
(1, 3, 1, 2, 3, 'RomanY', 'Roman', 'Yagovkin', 'r.yagovkin@gmail.com', '$2y$10$eYMzbcfyVtxew0hzep4s2OYXdf3ZaLc.Uw/NTyRnknB7ElCPOUY9S', 'permcity', NULL, '2014-07-16 08:40:06', '3cf84eca3bef592dd835dbd943c1bcea', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `FK_21EE70696A5458E8` FOREIGN KEY (`friend_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_21EE7069A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `privilege`
--
ALTER TABLE `privilege`
  ADD CONSTRAINT `FK_87209A8789329D25` FOREIGN KEY (`resource_id`) REFERENCES `resource` (`id`),
  ADD CONSTRAINT `FK_87209A87D60322AC` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`categoryid`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `review_ibfk_3` FOREIGN KEY (`reviewedby`) REFERENCES `user` (`id`);

--
-- Constraints for table `roles_parents`
--
ALTER TABLE `roles_parents`
  ADD CONSTRAINT `FK_C70E6B91727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `role` (`id`),
  ADD CONSTRAINT `FK_C70E6B91D60322AC` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Constraints for table `stadium`
--
ALTER TABLE `stadium`
  ADD CONSTRAINT `stadium_ibfk_1` FOREIGN KEY (`categoryid`) REFERENCES `category` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D6491E27F6BF` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`),
  ADD CONSTRAINT `FK_8D93D6495D83CC1` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`),
  ADD CONSTRAINT `FK_8D93D64982F1BAF4` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`),
  ADD CONSTRAINT `FK_8D93D649D60322AC` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
