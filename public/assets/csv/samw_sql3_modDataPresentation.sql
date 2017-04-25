-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 24, 2017 at 10:43 AM
-- Server version: 5.5.50-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `samw_constr`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `cit_id` int(11) NOT NULL AUTO_INCREMENT,
  `cit_name` varchar(255) DEFAULT NULL,
  `cit_inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `country_cou_id` int(11) NOT NULL,
  PRIMARY KEY (`cit_id`),
  KEY `fk_city_country1_idx` (`country_cou_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`cit_id`, `cit_name`, `cit_inserted`, `country_cou_id`) VALUES
(1, 'Pétange', '2017-04-21 09:09:34', 2),
(2, 'San Sebas', '2017-04-20 12:07:33', 1),
(3, 'Sebville', '2017-04-20 12:09:33', 1),
(4, 'San Carlito', '2017-04-20 12:09:33', 2),
(5, 'New Carlolina', '2017-04-20 12:09:33', 2),
(6, 'Samstown', '2017-04-20 12:09:33', 3),
(7, 'Imaginiville', '2017-04-20 12:09:33', 4),
(8, 'Springfield', '2017-04-20 12:09:33', 4),
(9, 'Citysam', '2017-04-20 14:09:33', 3);

-- --------------------------------------------------------

--
-- Table structure for table `constructions`
--

CREATE TABLE IF NOT EXISTS `constructions` (
  `con_id` int(11) NOT NULL AUTO_INCREMENT,
  `con_name` varchar(255) NOT NULL,
  `con_client` varchar(255) NOT NULL,
  `con_type` tinyint(4) NOT NULL,
  `con_startdate` date DEFAULT NULL,
  `con_enddate` date DEFAULT NULL,
  `con_inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `con_text` text,
  `city_cit_id` int(11) NOT NULL,
  PRIMARY KEY (`con_id`),
  KEY `fk_constructions_city1_idx` (`city_cit_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `constructions`
--

INSERT INTO `constructions` (`con_id`, `con_name`, `con_client`, `con_type`, `con_startdate`, `con_enddate`, `con_inserted`, `con_text`, `city_cit_id`) VALUES
(1, 'Treehouse of horror', 'Bart Simpson', 0, '2016-11-20', '2017-06-20', '2017-04-12 18:22:14', 'as seen on tv', 8),
(2, 'Sam s tent', 'Sam Worry', 0,              '2016-01-20', '2017-08-20', '2017-04-20 12:01:08', 'back to the roots', 5),
(3, 'Pleasure castle', 'Carlito Way', 3,     '2016-10-20', '2017-04-29', '2017-04-20 12:01:08', 'entry through your dream', 4),
(4, 'Villa Ben', 'Benjamin de la Formation', 2, '2016-10-20', '2017-04-20', '2017-04-21 09:04:58', 'to far from Belval', 1),
(5, 'Tour de Toto', 'Benjamin de la Formation', 2,'2016-10-20', '2017-04-10', '2017-04-21 09:05:28', 'he was longing for a representational building', 5),
(6, 'Western Saloon', 'Charles Mirrori', 1, '0000-00-00', '0000-00-00', '2017-04-21 09:32:28', NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `cou_id` int(11) NOT NULL AUTO_INCREMENT,
  `cou_name` varchar(255) DEFAULT NULL,
  `cou_inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cou_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=105 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`cou_id`, `cou_name`, `cou_inserted`) VALUES
(1, 'sebastianistan', '2017-04-20 12:10:00'),
(2, 'Carlolandia', '2017-04-20 12:10:00'),
(3, 'Sambia', '2017-04-20 12:10:00'),
(4, 'Utopia', '2017-04-20 12:10:00'),
(5, 'sebastianistan', '2017-04-20 12:10:50'),
(6, 'Carlolandia', '2017-04-20 12:10:50'),
(7, 'Sambia', '2017-04-20 12:10:50'),
(8, 'Utopia', '2017-04-20 12:10:50'),
(9, 'CarloCountry', '2017-04-21 12:07:47'),
(10, 'Argentina', '2017-04-21 12:10:28'),
(11, 'Australia', '2017-04-21 12:12:56'),
(12, 'Andorra', '2017-04-21 12:44:58'),
(13, 'Barbados', '2017-04-21 12:45:41'),
(14, 'Belgium', '2017-04-21 12:56:22'),
(15, 'Netherlands', '2017-04-21 12:56:29'),
(16, 'Germany', '2017-04-21 12:56:36'),
(17, 'Bodswana', '2017-04-21 13:28:38'),
(18, 'Bodswana', '2017-04-21 13:29:13'),
(19, 'Canada', '2017-04-21 13:31:12'),
(20, 'Luxembourg', '2017-04-21 14:31:40');

-- --------------------------------------------------------

--
-- Table structure for table `process`
--

CREATE TABLE IF NOT EXISTS `process` (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_name` varchar(255) DEFAULT NULL,
  `pro_text` text,
  `pro_inserted` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pro_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `process`
--

INSERT INTO `process` (`pro_id`, `pro_name`, `pro_text`, `pro_inserted`) VALUES
(1, '`prepare construction site`', '`surreal film role`', NULL),
(2, '`building the framework`', '`construction of a treehouse`', NULL),
(3, '`building the stairs`', '`construction of a treehouse`', NULL),
(4, '`building the floor`', '`construction of a treehouse`', NULL),
(5, '`installation of the toilet`', '`construction of a treehouse`', NULL),
(6, '', NULL, NULL),
(7, '', NULL, NULL),
(8, '', NULL, NULL),
(9, '', NULL, NULL),
(10, '`installation of the whirlpool`', '`construction of a treehouse`', NULL),
(11, '', NULL, NULL),
(12, '', NULL, NULL),
(13, '', NULL, NULL),
(14, '', NULL, NULL),
(15, '', NULL, NULL),
(16, '7', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `tas_id` int(11) NOT NULL AUTO_INCREMENT,
  `tas_name` varchar(255) NOT NULL,
  `tas_date` date DEFAULT NULL,
  `tas_typology` varchar(255) NOT NULL,
  `tas_repeat` int(10) NOT NULL,
  `tas_penality` varchar(255) NOT NULL,
  `tas_image1` varchar(255) NOT NULL,
  `tas_image2` varchar(255) NOT NULL,
  `tas_image3` varchar(255) NOT NULL,
  `tas_start` timestamp NULL DEFAULT NULL,
  `tas_stop` timestamp NULL DEFAULT NULL,
  `tas_time` time DEFAULT '00:00:00',
  `tas_text` text,
  `tas_remark` text,
  `tas_inserted` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `tas_vocal_message` varchar(255) DEFAULT NULL,
  `tas_wastage` varchar(255) DEFAULT NULL,
  `tas_va` float DEFAULT NULL,
  `tas_nva` float DEFAULT NULL,
  `tas_nvau` float DEFAULT NULL,
  `teams_tea_id` int(11) NOT NULL,
  `process_pro_id` int(11) NOT NULL,
  `workers_wor_id` int(11) NOT NULL,
  `constructions_con_id` int(11) NOT NULL,
  PRIMARY KEY (`tas_id`),
  KEY `fk_tasks_teams1_idx` (`teams_tea_id`),
  KEY `fk_tasks_process1_idx` (`process_pro_id`),
  KEY `fk_tasks_workers1_idx` (`workers_wor_id`),
  KEY `fk_tasks_constructions1_idx` (`constructions_con_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=115 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`tas_id`, `tas_name`, `tas_date`, `tas_typology`, `tas_repeat`, `tas_penality`, `tas_image1`, `tas_image2`, `tas_image3`, `tas_start`, `tas_stop`, `tas_time`, `tas_text`, `tas_remark`,             `tas_inserted`, `tas_vocal_message`, `tas_wastage`, `tas_va`, `tas_nva`, `tas_nvau`, `teams_tea_id`, `process_pro_id`, `workers_wor_id`, `constructions_con_id`) VALUES
(1, 'cutting the framework', '2017-11-01', 'Homer Simpson', 2, '`heavy lifting`', '', '', '', '2017-02-01 07:00:00', '2017-02-01 11:00:00', '04:00:00', 'cleotus s wood is of inferior quality: overprocessing`', 'the accident with Ralph Wiggum could have been prevented with basic security measures', '2017-04-23 16:34:21', NULL, 'Surprocessing ou setup inutiles', 0.4, 0.25, 0.35, 1, 10, 0, 1),
(2, 'assembling the Framework', '2017-02-01', 'Homer Simpson', 4, 'Retravail', '', '', '', '2017-01-01 07:00:03', '0000-00-00 00:00:00', '00:06:08', 'took the worker to long to get the framework up and standing', 'the worker tried to attach the pieces to one another without wondering where to join them', '2017-04-23 16:34:28', NULL, '`Surprocessing ou setup inutiles`', 0.5, 0.45, 0.05, 3, 10, 0, 1),
(3, 'laying the floor panels', '2017-12-01', 'Team Springfield', 1, '`heavy lifting`', '', '', '', '0000-00-00 00:00:00', '2017-04-05 17:10:02', '08:00:08', 'innsufficient thickness of the panels, several layers needed to support Homer s weight', 'buy the good stuff next time', '2017-04-20 18:20:48', NULL, 'Surproduction', 0.3, 0.35, 0.35, 2, 10, 0, 1),
(4, 'laying the roof panels', '2017-02-06', 'Team Springfield', 1, '`heavy lifting`', '', '', '', '0000-00-00 00:00:00', '2017-04-05 17:10:02', '08:00:08', 'innsufficient thickness of the panels, several layers needed to support Homer s weight', 'buy the good stuff next time', '2017-04-20 18:20:52', NULL, 'Surproduction', 0.3, 0.35, 0.35, 2, 10, 0, 1),
(5, 'adding the wall panels', '0000-00-00', 'Team Springfield', 1, '`heavy lifting`', '', '', '', '0000-00-00 00:00:00', '2017-04-06 17:10:02', '08:04:02', 'innsufficient thickness of the panels, several layers needed to support Homer s weight', 'buy the good stuff next time', '2017-04-20 18:20:57', NULL, 'Surproduction', 0.3, 0.35, 0.35, 2, 10, 0, 1),
(6, 'digging foundations', '0000-00-00', 'worker', 3, 'penality1', '', '', '', '2017-04-19 22:00:00', '2017-04-20 02:14:00', '05:00:00', 'penality1', 'penality1', '2017-04-23 15:54:23', NULL, 'waste 1', 0.6, 0.3, 0.1, 0, 10, 3, 1),
(7, 'construct concrete foundations', '0000-00-00', 'worker', 3, 'penality1', '', '', '', '2017-04-19 22:00:00', '2017-04-20 14:26:00', '01:00:00', 'penality1', 'penality1', '2017-04-23 15:54:36', NULL, 'waste 1', 0.6, 0.3, 0.1, 0, 10, 3, 1),
(8, 'connection: water, electricity and communication', '0000-00-00', 'worker', 3, 'penality1', '', '', '', '2017-04-19 22:00:00', '2017-04-20 03:33:00', '01:00:00', 'penality1', 'penality1', '2017-04-23 16:10:53', NULL, 'waste 1', 0.6, 0.3, 0.1, 0, 10, 1, 1),
(9, 'walls first floor', '0000-00-00', 'worker', 3, 'penality1', '', '', '', '2017-04-19 22:00:00', '2017-04-20 01:30:00', '30:00:00', 'penality1', 'penality1', '2017-04-23 16:11:13', NULL, 'waste 1', 0.6, 0.3, 0.1, 0, 10, 3, 1),
(10, 'exit through the gift shop', '0000-00-00', 'worker', 3, 'penality1', '', '', '', '2017-04-19 22:00:00', '2017-04-21 03:00:00', '00:05:00', 'penality1', 'penality1', '2017-04-23 15:55:22', NULL, 'waste 1', 0.6, 0.3, 0.1, 0, 10, 3, 1),
(11, 'building the slime slide', '0000-00-00', 'worker', 3, 'penality1', '', '', '', '2017-04-19 22:00:00', '2017-04-19 22:37:00', '00:05:00', 'penality1', 'penality1', '2017-04-23 15:55:27', NULL, 'waste 1', 0.6, 0.3, 0.1, 1, 10, 3, 1),
(12, 'wiring of secure phone connection', '0000-00-00', 'worker', 3, 'penality1', '', '', '', '2017-04-19 22:00:00', '2017-04-20 01:24:00', '00:05:00', 'penality1', 'penality1', '2017-04-23 15:55:34', NULL, 'waste 1', 0.6, 0.3, 0.1, 0, 10, 2, 1),
(13, 'testing radiation proof wall paint', '0000-00-00', 'worker', 3, 'penality1', '', '', '', '2017-04-19 22:00:00', '2017-04-20 00:00:00', '02:00:00', 'penality1', 'penality1', '2017-04-23 15:55:54', NULL, 'waste 1', 0.6, 0.3, 0.1, 0, 10, 3, 1),
(14, 'debugging code in the middle of the night', '0000-00-00', 'worker', 3, 'penality1', '', '', '', '2017-04-19 22:00:00', '2017-04-19 22:00:00', '00:05:00', 'penality1', 'penality1', '2017-04-23 09:47:45', NULL, 'waste 1', 0.6, 0.3, 0.1, 0, 10, 3, 1),
(15, 'panoramic windows', '2017-04-20', 'worker', 3, 'penality1', '', '', '', '2017-04-20 22:28:10', '2017-04-19 22:00:00', '00:05:00', 'penality1', 'penality1', '2017-04-23 10:26:34', NULL, 'waste 1', 0.6, 0.3, 0.1, 2, 10, 3, 1),
(16, 'roof cladding', '2017-04-20', 'worker', 3, 'penality1', '', '', '', '2017-04-20 22:28:10', '2017-04-19 22:00:00', '00:05:00', 'penality1', 'penality1', '2017-04-23 09:48:02', NULL, 'waste 1', 0.6, 0.3, 0.1, 0, 10, 3, 1),
(17, 'woodwork masterbedroom', '0000-00-00', 'worker', 3, 'penality1', '', '', '', '2017-04-20 22:28:10', '2017-04-19 22:00:00', '00:05:00', 'penality1', 'penality1', '2017-04-23 10:26:45', NULL, 'waste 1', 0.6, 0.3, 0.1, 3, 10, 4, 1),
(18, 'building the panic room', '0000-00-00', 'worker', 3, 'penality1', '', '', '', '2017-04-20 22:28:10', '2017-04-19 22:00:00', '00:05:00', 'penality1', 'penality1', '2017-04-23 09:48:11', NULL, 'waste 1', 0.6, 0.3, 0.1, 0, 10, 3, 1),
(19, 'digging of escape tunnel', '2017-04-20', 'worker', 3, 'penality1', '', '', '', '2017-04-20 22:28:10', '2017-04-19 22:00:00', '00:05:00', 'penality1', 'penality1', '2017-04-23 09:48:12', NULL, 'waste 1', 0.6, 0.3, 0.1, 0, 10, 3, 1),
(20, 'constrution of roof helipad', '2017-04-20', 'worker', 3, 'penality1', '', '', '', '2017-04-20 22:28:10', '2017-04-19 22:00:00', '00:05:00', 'penality1', 'penality1', '2017-04-23 09:48:16', NULL, 'waste 1', 0.6, 0.3, 0.1, 0, 10, 3, 1),
(21, 'installation of the elevator', '2017-04-20', 'worker', 3, 'penality1', '', '', '', '2017-04-20 22:28:10', '2017-04-19 22:00:00', '00:05:00', 'penality1', 'penality1', '2017-04-23 09:48:17', NULL, 'waste 1', 0.6, 0.3, 0.1, 0, 10, 3, 1),
(22, 'building kitchen', '2017-04-20', 'worker', 3, 'penality1', '', '', '', '2017-04-20 22:28:10', '2017-04-19 22:00:00', '00:05:00', 'penality1', 'penality1', '2017-04-23 10:26:51', NULL, 'waste 1', 0.6, 0.3, 0.1, 0, 10, 5, 1),
(23, 'electrical wiring', '2017-04-20', 'worker', 3, 'penality1', '', '', '', '2017-04-20 22:28:10', '2017-04-19 22:00:00', '00:05:00', 'penality1', 'penality1', '2017-04-23 09:48:26', NULL, 'waste 1', 0.6, 0.3, 0.1, 0, 10, 3, 1),
(24, 'building open fireplace', '0000-00-00', 'worker', 3, 'penality1', '', '', '', '2017-04-20 22:28:10', '2017-04-19 22:00:00', '00:05:00', 'penality1', 'penality1', '2017-04-23 09:48:30', NULL, 'waste 1', 0.6, 0.3, 0.1, 0, 10, 3, 1),
(25, 'finish of the fassade', '2017-04-20', 'worker', 3, 'penality1', '', '', '', '2017-04-20 22:28:10', '2017-04-19 22:00:00', '00:05:00', 'penality1', 'penality1', '2017-04-23 09:48:34', NULL, 'waste 1', 0.6, 0.3, 0.1, 0, 10, 3, 1),
(26, '', '0000-00-00', '', 0, '', '', '', '', '2017-04-20 22:00:00', '2017-04-20 22:00:00', '00:00:00', '', '', NULL, NULL, '', 0, 0, 0, 0, 0, 0, 0),
(27, '', '0000-00-00', '', 0, '', '', '', '', '2017-04-20 22:00:00', '2017-04-20 22:00:00', '00:00:00', '', '', NULL, NULL, '', 0, 0, 0, 0, 0, 0, 0),
(28, '', '0000-00-00', '', 0, '', '', '', '', '2017-04-20 22:00:00', '2017-04-20 22:00:00', '00:00:00', '', '', NULL, NULL, '', 0, 0, 0, 0, 0, 0, 0),
(29, '', '0000-00-00', '', 0, '', '', '', '', '2017-04-20 22:00:00', '2017-04-20 22:00:00', '00:00:00', '', '', NULL, NULL, '', 0, 0, 0, 0, 0, 0, 0),
(30, '', '0000-00-00', '', 0, '', '', '', '', '2017-04-20 22:00:00', '2017-04-20 22:00:00', '00:00:00', '', '', NULL, NULL, '', 0, 0, 0, 0, 0, 0, 0),
(31, '', '0000-00-00', '', 0, '', '', '', '', '2017-04-20 22:00:00', '2017-04-20 22:00:00', '00:00:00', '', '', NULL, NULL, '', 0, 0, 0, 0, 0, 0, 0),
(32, 'Dale', '2017-04-21', '', 1, 'Attente', '', '', '', '0000-00-00 00:00:00', '2017-04-20 22:00:00', '01:00:00', 'John révise son texte.', 'Le faire en dehors des heures de travail !', NULL, NULL, 'Surprod', 0, 100, 50, 0, 0, 0, 0),
(33, 'Dale', '2017-04-21', '', 1, 'Attente', '', '', '', '0000-00-00 00:00:00', '2017-04-20 22:00:00', '01:00:00', 'John révise son texte.', 'Le faire en dehors des heures de travail !', NULL, NULL, 'Surprod', 0, 100, 50, 0, 0, 0, 0),
(34, 'Pose Charpente', '2017-04-21', 'Team Carlo', 0, 'Attente', '', '', '', '0000-00-00 00:00:00', '2017-04-20 22:00:00', '01:00:00', 'fghdh', 'nvcbn', NULL, NULL, 'Surprod', 0, 100, 0, 0, 0, 0, 0),
(35, 'Pose fenêtres', '2017-04-21', '', 2, '', '', '', '', '0000-00-00 00:00:00', '2017-04-20 22:00:00', '01:05:05', 'qqqqqqqqqqq', 'wwwwwwwwwwww', NULL, NULL, 'Surprod', 0, 100, 0, 0, 0, 0, 0),
(36, '', '0000-00-00', '', 0, '', '', '', '', '2017-04-20 22:00:00', '2017-04-20 22:00:00', '00:00:00', '', '', NULL, NULL, '', 0, 0, 0, 0, 0, 0, 0),
(37, '', '0000-00-00', 'Team Carlo', 0, '', '', '', '', '0000-00-00 00:00:00', '2017-04-20 22:00:00', '00:00:00', '', '', NULL, NULL, '', 50, 50, 50, 0, 0, 0, 0),
(38, '', '0000-00-00', '', 0, '', '', '', '', '0000-00-00 00:00:00', '2017-04-20 22:00:00', '00:00:00', '', '', NULL, NULL, '', 50, 50, 50, 0, 0, 0, 0),
(39, '', '0000-00-00', '', 0, '', '', '', '', '0000-00-00 00:00:00', '2017-04-20 22:00:00', '00:00:00', '', '', NULL, NULL, '', 50, 50, 50, 0, 0, 0, 0),
(40, '', '0000-00-00', '', 0, '', '', '', '', '2017-04-20 22:00:00', '2017-04-20 22:00:00', '00:00:00', '', '', NULL, NULL, '', 0, 0, 0, 0, 0, 0, 0),
(41, '', '0000-00-00', '', 0, '', '', '', '', '0000-00-00 00:00:00', '2017-04-20 22:00:00', '00:00:00', '', '', NULL, NULL, '', 50, 50, 50, 0, 0, 0, 0),
(42, '', '0000-00-00', 'Team Carlo', 0, '', '', '', '', '0000-00-00 00:00:00', '2017-04-20 22:00:00', '00:00:00', '', '', NULL, NULL, '', 50, 50, 50, 0, 0, 0, 0),
(43, '', '0000-00-00', 'Team Carlo', 0, '', '', '', '', '0000-00-00 00:00:00', '2017-04-20 22:00:00', '00:00:00', '', '', NULL, NULL, '', 50, 50, 50, 0, 0, 0, 0),
(44, '', '0000-00-00', '', 0, '', '', '', '', '0000-00-00 00:00:00', '2017-04-20 22:00:00', '00:00:00', '', '', NULL, NULL, '', 50, 50, 50, 0, 0, 0, 0),
(45, '', '0000-00-00', 'Team Sam', 0, '', '', '', '', '0000-00-00 00:00:00', '2017-04-20 22:00:00', '00:00:00', '', '', NULL, NULL, '', 50, 50, 50, 0, 0, 0, 0),
(46, '', '0000-00-00', 'Team Sam', 0, '', '', '', '', '0000-00-00 00:00:00', '2017-04-20 22:00:00', '00:00:00', '', '', NULL, NULL, '', 50, 50, 50, 0, 0, 0, 0),
(47, '', '0000-00-00', '', 0, '', '', '', '', '0000-00-00 00:00:00', '2017-04-20 22:00:00', '00:00:00', '', '', NULL, NULL, '', 50, 50, 50, 0, 0, 0, 0),
(48, '', '0000-00-00', '', 0, '', '', '', '', '0000-00-00 00:00:00', '2017-04-20 22:00:00', '00:00:00', '', '', NULL, NULL, '', 50, 50, 50, 0, 0, 0, 0),
(49, '', '0000-00-00', 'Team Carlo', 0, '', '', '', '', '0000-00-00 00:00:00', '2017-04-20 22:00:00', '00:00:00', '', '', NULL, NULL, '', 50, 50, 50, 0, 0, 0, 0),
(50, '', '0000-00-00', 'Team Carlo', 0, '', '', '', '', '0000-00-00 00:00:00', '2017-04-20 22:00:00', '00:00:00', '', '', NULL, NULL, '', 50, 50, 50, 0, 0, 0, 0),
(51, '', '0000-00-00', '', 0, '', '', '', '', '0000-00-00 00:00:00', '2017-04-20 22:00:00', '00:00:00', '', '', NULL, NULL, '', 50, 50, 50, 0, 0, 0, 0),
(52, '', '0000-00-00', '', 0, '', '', '', '', '0000-00-00 00:00:00', '2017-04-20 22:00:00', '00:00:00', '', '', NULL, NULL, '', 50, 50, 50, 0, 0, 0, 0),
(53, '', '0000-00-00', '', 0, '', '', '', '', '0000-00-00 00:00:00', '2017-04-20 22:00:00', '00:00:00', '', '', NULL, NULL, '', 50, 50, 50, 0, 0, 0, 0),
(54, '', '0000-00-00', 'Team Seb', 0, '', '', '', '', '0000-00-00 00:00:00', '2017-04-20 22:00:00', '00:00:00', '', '', NULL, NULL, '', 50, 50, 50, 0, 0, 0, 0),
(55, '', '0000-00-00', 'Team Seb', 0, '', '', '', '', '0000-00-00 00:00:00', '2017-04-20 22:00:00', '00:00:00', '', '', NULL, NULL, '', 50, 50, 50, 0, 0, 0, 0),
(56, '', '0000-00-00', '', 0, '', '', '', '', '0000-00-00 00:00:00', '2017-04-20 22:00:00', '00:00:00', '', '', NULL, NULL, '', 50, 50, 50, 0, 0, 0, 0),
(57, '', '0000-00-00', 'Team Sam', 0, '', '', '', '', '0000-00-00 00:00:00', '2017-04-20 22:00:00', '00:00:00', '', '', NULL, NULL, '', 50, 50, 50, 0, 0, 0, 0),
(58, '', '0000-00-00', 'Team Sam', 0, '', '', '', '', '0000-00-00 00:00:00', '2017-04-20 22:00:00', '00:00:00', '', '', NULL, NULL, '', 50, 50, 50, 0, 0, 0, 0),
(59, '', '0000-00-00', 'Wayne', 0, '', '', '', '', '0000-00-00 00:00:00', '2017-04-20 22:00:00', '00:00:00', '', '', NULL, NULL, '', 50, 50, 50, 0, 0, 0, 0),
(60, '', '0000-00-00', 'Team Carlo', 0, '', '', '', '', '0000-00-00 00:00:00', '2017-04-20 22:00:00', '00:00:00', '', '', NULL, NULL, '', 50, 50, 50, 0, 0, 0, 0),
(61, 'porte', '2017-04-21', 'qwertz', 5, 'Attente', '', '', '', '0000-00-00 00:00:00', '2017-04-20 22:00:00', '01:20:30', 'ooooooo', 'pppppppppp', NULL, NULL, 'Socks inutiles', 80, 10, 10, 0, 0, 0, 0),
(62, '', '0000-00-00', '', 0, '', '', '', '', '2017-04-20 22:00:00', '2017-04-20 22:00:00', '00:00:00', '', '', NULL, NULL, '', 0, 0, 0, 0, 0, 0, 0),
(63, '', '0000-00-00', '', 0, '', '', '', '', '2017-04-20 22:00:00', '2017-04-20 22:00:00', '00:00:00', '', '', NULL, NULL, '', 0, 0, 0, 0, 0, 0, 0),
(64, 'rrrrrrrr', '2017-04-21', 'Team oh', 5, 'Attente', '', '', '', '0000-00-00 00:00:00', '2017-04-20 22:00:00', '01:30:00', 'ghjdjkdtjdt', 'dsftgkmtsdkdst', NULL, NULL, 'Socks inutiles', 0, 100, 0, 0, 0, 0, 0),
(65, '', '0000-00-00', '', 0, '', '', '', '', '2017-04-20 22:00:00', '2017-04-20 22:00:00', '00:00:00', '', '', NULL, NULL, '', 0, 0, 0, 0, 0, 0, 0),
(66, '', '0000-00-00', '', 0, '', '', '', '', '2017-04-20 22:00:00', '2017-04-20 22:00:00', '00:00:00', '', '', NULL, NULL, '', 0, 0, 0, 0, 0, 0, 0),
(67, '', '0000-00-00', '', 0, '', '', '', '', '2017-04-21 22:00:00', '2017-04-21 22:00:00', '00:00:00', '', '', NULL, NULL, '', 0, 0, 0, 0, 0, 0, 0),
(68, '', '0000-00-00', '', 0, '', '', '', '', '2017-04-21 22:00:00', '2017-04-21 22:00:00', '00:00:00', '', '', NULL, NULL, '', 0, 0, 0, 0, 0, 0, 0),
(69, '', '0000-00-00', '', 0, '', '', '', '', '2017-04-21 22:00:00', '2017-04-21 22:00:00', '00:00:00', '', '', NULL, NULL, '', 0, 0, 0, 0, 0, 0, 0),
(70, '', '0000-00-00', '', 0, '', '', '', '', '2017-04-21 22:00:00', '2017-04-21 22:00:00', '00:00:00', '', '', NULL, NULL, '', 0, 0, 0, 0, 0, 0, 0),
(71, '', '0000-00-00', '', 0, '', '', '', '', '2017-04-21 22:00:00', '2017-04-21 22:00:00', '00:00:00', '', '', NULL, NULL, '', 0, 0, 0, 0, 0, 0, 0),
(72, 'TESTF1', '2017-04-22', 'cordier', 2, 'Attente', '', '', '', '0000-00-00 00:00:00', '2017-04-21 22:00:00', '00:01:43', 'tralalala', 'tralalilala', NULL, NULL, 'SurProd', 30, 70, 0, 0, 0, 0, 0),
(73, '', '0000-00-00', '', 0, '', '', '', '', '2017-04-21 22:00:00', '2017-04-21 22:00:00', '00:00:00', '', '', NULL, NULL, '', 0, 0, 0, 0, 0, 0, 0),
(74, '', '0000-00-00', '', 0, '', '', '', '', '2017-04-21 22:00:00', '2017-04-21 22:00:00', '00:00:00', '', '', NULL, NULL, '', 0, 0, 0, 0, 0, 0, 0),
(75, '', '0000-00-00', '', 0, '', '', '', '', '2017-04-21 22:00:00', '2017-04-21 22:00:00', '00:00:00', '', '', NULL, NULL, '', 0, 0, 0, 0, 0, 0, 0),
(76, '', '0000-00-00', '', 0, '', '', '', '', '2017-04-21 22:00:00', '2017-04-21 22:00:00', '00:00:00', '', '', NULL, NULL, '', 0, 0, 0, 0, 0, 0, 0),
(77, '', '0000-00-00', '', 0, '', '', '', '', '2017-04-21 22:00:00', '2017-04-21 22:00:00', '00:00:00', '', '', NULL, NULL, '', 0, 0, 0, 0, 0, 0, 0),
(78, '', '0000-00-00', '', 0, '', '', '', '', '2017-04-21 22:00:00', '2017-04-21 22:00:00', '00:00:00', '', '', NULL, NULL, '', 0, 0, 0, 0, 0, 0, 0),
(79, '', '0000-00-00', '', 0, '', '', '', '', '2017-04-21 22:00:00', '2017-04-21 22:00:00', '00:00:00', '', '', NULL, NULL, '', 0, 0, 0, 0, 0, 0, 0),
(80, '', '0000-00-00', '', 0, '', '', '', '', '2017-04-21 22:00:00', '2017-04-21 22:00:00', '00:00:00', '', '', NULL, NULL, '', 0, 0, 0, 0, 0, 0, 0),
(81, '', '0000-00-00', '', 0, '', '', '', '', '2017-04-21 22:00:00', '2017-04-21 22:00:00', '00:00:00', '', '', NULL, NULL, '', 0, 0, 0, 0, 0, 0, 0),
(82, '', '0000-00-00', '', 0, '', '', '', '', '2017-04-21 22:00:00', '2017-04-21 22:00:00', '00:00:00', '', '', NULL, NULL, '', 0, 0, 0, 0, 0, 0, 0),
(83, '', '0000-00-00', '', 0, '', '', '', '', '2017-04-21 22:00:00', '2017-04-21 22:00:00', '00:00:00', '', '', NULL, NULL, '', 0, 0, 0, 0, 0, 0, 0),
(84, '', '0000-00-00', '', 0, '', '', '', '', '2017-04-21 22:00:00', '2017-04-21 22:00:00', '00:00:00', '', '', NULL, NULL, '', 0, 0, 0, 0, 0, 0, 0),
(85, '', '0000-00-00', '', 0, '', '', '', '', '2017-04-21 22:00:00', '2017-04-21 22:00:00', '00:00:00', '', '', NULL, NULL, '', 0, 0, 0, 0, 0, 0, 0),
(86, '', '0000-00-00', '', 0, '', '', '', '', '2017-04-21 22:00:00', '2017-04-21 22:00:00', '00:00:00', '', '', NULL, NULL, '', 0, 0, 0, 0, 0, 0, 0),
(87, 'wqa', '0000-00-00', '', 0, '', '', '', '', '0000-00-00 00:00:00', '2017-04-21 22:00:00', '00:00:00', '', '', NULL, NULL, '', 50, 50, 50, 0, 0, 0, 0),
(88, 'wqa', '0000-00-00', '', 0, '', '', '', '', '0000-00-00 00:00:00', '2017-04-21 22:00:00', '00:00:00', '', '', NULL, NULL, '', 50, 50, 50, 0, 0, 0, 0),
(89, '', '0000-00-00', '', 0, '', '', '', '', '2017-04-21 22:00:00', '2017-04-21 22:00:00', '00:00:00', '', '', NULL, NULL, '', 0, 0, 0, 0, 0, 0, 0),
(90, 'wqa', '0000-00-00', '', 0, '', '', '', '', '0000-00-00 00:00:00', '2017-04-21 22:00:00', '00:00:00', '', '', NULL, NULL, '', 50, 50, 50, 0, 0, 0, 0),
(91, 'wqa', '0000-00-00', '', 0, '', '', '', '', '0000-00-00 00:00:00', '2017-04-21 22:00:00', '00:00:00', '', '', NULL, NULL, '', 50, 50, 50, 0, 0, 0, 0),
(92, 'wqa', '0000-00-00', '', 0, '', '', '', '', '0000-00-00 00:00:00', '2017-04-21 22:00:00', '00:00:00', '', '', NULL, NULL, '', 50, 50, 50, 0, 0, 0, 0),
(93, 'wqa', '0000-00-00', '', 0, '', '', '', '', '0000-00-00 00:00:00', '2017-04-21 22:00:00', '00:00:00', '', '', NULL, NULL, '', 50, 50, 50, 0, 0, 0, 0),
(94, 'wqa', '0000-00-00', '', 0, '', '', '', '', '0000-00-00 00:00:00', '2017-04-21 22:00:00', '00:00:00', '', '', NULL, NULL, '', 50, 50, 50, 0, 0, 0, 0),
(95, 'wqa', '0000-00-00', '', 0, '', '', '', '', '0000-00-00 00:00:00', '2017-04-21 22:00:00', '00:00:00', '', '', NULL, NULL, '', 50, 50, 50, 0, 0, 0, 0),
(96, 'wqa', '0000-00-00', '', 0, '', '', '', '', '0000-00-00 00:00:00', '2017-04-21 22:00:00', '00:00:00', '', '', NULL, NULL, '', 50, 50, 50, 0, 0, 0, 0),
(97, 'zoulou', '2017-04-22', 'Team1', 2, '', '', '', '', '0000-00-00 00:00:00', '2017-04-21 22:00:00', '01:45:30', 'oooooooooooo', 'aaaaaaaaaaa', NULL, NULL, 'SurProd', 70, 20, 10, 0, 0, 0, 0),
(98, 'zoulou', '2017-04-22', 'Team1', 2, '', '', '', '', '0000-00-00 00:00:00', '2017-04-21 22:00:00', '01:45:30', 'oooooooooooo', 'aaaaaaaaaaa', NULL, NULL, 'SurProd', 70, 20, 10, 0, 0, 0, 0),
(99, 'zoulou', '2017-04-22', 'Team1', 2, '', '', '', '', '0000-00-00 00:00:00', '2017-04-21 22:00:00', '01:45:30', 'oooooooooooo', 'aaaaaaaaaaa', NULL, NULL, 'SurProd', 70, 20, 10, 0, 0, 0, 0),
(100, 'zouuuuuuuu', '2017-04-22', 'Team Seb', 0, '', '', '', '', '0000-00-00 00:00:00', '2017-04-21 22:00:00', '00:00:00', '', '', NULL, NULL, '', 50, 50, 50, 0, 8, 0, 0),
(101, '', '0000-00-00', '', 0, '', '', '', '', '2017-04-21 22:00:00', '2017-04-21 22:00:00', '00:00:00', '', '', NULL, NULL, '', 0, 0, 0, 0, 0, 0, 0),
(102, 'Pose de fenetres', '2017-04-22', 'cordier', 0, '', '', '', '', '0000-00-00 00:00:00', '2017-04-21 22:00:00', '00:00:00', '', '', NULL, NULL, '', 50, 50, 50, 0, 8, 0, 0),
(103, '', '0000-00-00', '', 0, '', '', '', '', '2017-04-22 22:00:00', '2017-04-22 22:00:00', '00:00:00', '', '', NULL, NULL, '', 0, 0, 0, 0, 0, 0, 0),
(104, '', '0000-00-00', '', 0, '', '', '', '', '2017-04-22 22:00:00', '2017-04-22 22:00:00', '00:00:00', '', '', NULL, NULL, '', 0, 0, 0, 0, 0, 0, 0),
(105, '', '0000-00-00', '', 0, '', '', '', '', '2017-04-22 22:00:00', '2017-04-22 22:00:00', '00:00:00', '', '', NULL, NULL, '', 0, 0, 0, 0, 0, 0, 0),
(106, 'Pose de fenetres', '2017-04-23', 'cordier', 2, 'Attente', '', '', '', '0000-00-00 00:00:00', '2017-04-22 22:00:00', '02:45:52', 'qqqqqqqqqqqqqq', 'wwwwwwwwwwwwww', NULL, NULL, 'SurProd', 80, 10, 10, 0, 10, 0, 0),
(107, 'Pose de fenetres', '0000-00-00', 'cordier', 2, 'Attente', '', '', '', '0000-00-00 00:00:00', '2017-04-22 22:00:00', '02:45:52', 'qqqqqqqqqqqqqq', 'wwwwwwwwwwwwww', NULL, NULL, 'SurProd', 80, 10, 10, 0, 10, 0, 0),
(108, 'Pose de fenetres', '2017-04-23', 'cordier', 2, 'Attente', '', '', '', '0000-00-00 00:00:00', '2017-04-22 22:00:00', '02:45:52', 'qqqqqqqqqqqqqq', 'wwwwwwwwwwwwww', NULL, NULL, 'SurProd', 80, 10, 10, 0, 10, 0, 0),
(109, 'Pose de fenetres', '2017-04-23', 'cordier', 2, 'Attente', '', '', '', '0000-00-00 00:00:00', '2017-04-22 22:00:00', '02:45:52', 'qqqqqqqqqqqqqq', 'wwwwwwwwwwwwww', NULL, NULL, 'SurProd', 80, 10, 10, 0, 10, 0, 0),
(110, 'Pose de fenetres', '2017-04-23', 'cordier', 0, '', '', '', '', '0000-00-00 00:00:00', '2017-04-22 22:00:00', '00:00:00', '', '', NULL, NULL, '', 100, 0, 0, 0, 9, 0, 3),
(111, 'Pose de fenetres', '2017-04-23', 'cordier', 0, '', '', '', '', '0000-00-00 00:00:00', '2017-04-22 22:00:00', '00:00:00', '', '', NULL, NULL, '', 100, 0, 0, 0, 9, 0, 3),
(112, 'porte', '2017-04-23', 'Team Seb', 0, 'Attente', '', '', '', '0000-00-00 00:00:00', '2017-04-22 22:00:00', '02:45:12', 'gdjrtmrz rzukrz,rz m', 'm,rz j,ez m,e ez', NULL, NULL, 'SurProd', 100, 0, 0, 0, 9, 0, 3),
(113, 'porte', '2017-04-23', 'Team Seb', 0, 'Attente', '', '', '', '0000-00-00 00:00:00', '2017-04-22 22:00:00', '02:45:12', 'gdjrtmrz rzukrz,rz m', 'm,rz j,ez m,e ez', NULL, NULL, 'SurProd', 100, 0, 0, 0, 9, 0, 3),
(114, '', '0000-00-00', '', 0, '', '', '', '', '2017-04-23 22:00:00', '2017-04-23 22:00:00', '00:00:00', '', '', NULL, NULL, '', 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `tea_id` int(11) NOT NULL AUTO_INCREMENT,
  `tea_name` varchar(255) NOT NULL,
  `tea_text` text NOT NULL,
  `tea_inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`tea_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=130 ;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`tea_id`, `tea_name`, `tea_text`, `tea_inserted`) VALUES
(1, 'Team1', 'Elec', '2017-04-20 13:10:10'),
(2, 'Team2', '', '2017-04-20 10:50:55'),
(3, 'Team Carlo', 'Chauffeur', '2017-04-20 10:55:12'),
(4, 'Team Sam', 'Ferrailleur', '2017-04-20 10:51:48'),
(5, 'Team Seb', 'Yolo', '2017-04-20 10:51:56'),
(45, 'Team Benj', '', '2017-04-20 13:59:01'),
(46, '', '', '2017-04-20 14:12:50'),
(47, '', '', '2017-04-21 07:13:57'),
(48, '', '', '2017-04-21 07:26:29'),
(49, '', '', '2017-04-21 07:34:33'),
(50, '', '', '2017-04-21 07:34:41'),
(51, '', '', '2017-04-21 07:42:58'),
(52, '', '', '2017-04-21 07:43:02'),
(53, '', '', '2017-04-21 07:43:06'),
(54, '', '', '2017-04-21 07:45:49'),
(55, '', '', '2017-04-21 07:47:14'),
(56, '', '', '2017-04-21 07:51:31'),
(57, '', '', '2017-04-21 07:53:43'),
(58, '', '', '2017-04-21 08:18:13'),
(59, 'Team oh', 'Ferrailleur', '2017-04-21 08:18:38'),
(60, '', '', '2017-04-21 08:27:15'),
(61, '', '', '2017-04-21 08:29:34'),
(62, '', '', '2017-04-21 08:30:06'),
(63, '', '', '2017-04-21 09:05:19'),
(64, '', '', '2017-04-21 09:05:24'),
(65, '', '', '2017-04-21 09:06:51'),
(66, '', '', '2017-04-21 09:06:54'),
(67, '', '', '2017-04-21 09:07:31'),
(68, 'qqq', '', '2017-04-21 09:07:39'),
(69, 'www', '', '2017-04-21 09:07:45'),
(70, 'www', '', '2017-04-21 09:09:43'),
(71, 'rrr', '', '2017-04-21 09:09:51'),
(72, 'rrr', '', '2017-04-21 09:11:48'),
(73, 'pppp', '', '2017-04-21 09:12:09'),
(74, '', '', '2017-04-21 09:18:03'),
(75, 'fff', '', '2017-04-21 09:18:24'),
(76, 'fff', '', '2017-04-21 09:18:51'),
(77, 'fff', '', '2017-04-21 09:19:54'),
(78, 'llll', '', '2017-04-21 09:20:40'),
(79, 'llll', '', '2017-04-21 09:21:46'),
(80, 'llll', '', '2017-04-21 09:56:33'),
(81, 'llll', '', '2017-04-21 09:57:18'),
(82, 'llll', '', '2017-04-21 09:58:08'),
(83, 'llll', '', '2017-04-21 10:01:52'),
(84, 'llll', '', '2017-04-21 10:11:38'),
(85, 'llll', '', '2017-04-21 10:13:01'),
(86, 'llll', '', '2017-04-21 10:13:18'),
(87, 'llll', '', '2017-04-21 10:14:17'),
(88, 'llll', '', '2017-04-21 10:14:32'),
(89, 'poule', '', '2017-04-21 10:25:03'),
(90, 'poule', '', '2017-04-21 12:40:35'),
(91, 'poule', '', '2017-04-21 12:44:35'),
(92, 'nnnn', '', '2017-04-21 12:45:43'),
(93, 'nnnn', '', '2017-04-21 12:47:16'),
(94, 'yyyy', '', '2017-04-21 12:47:27'),
(95, 'yyyy', '', '2017-04-21 12:47:49'),
(96, 'yyyy', '', '2017-04-21 12:47:53'),
(97, '', '', '2017-04-21 12:52:44'),
(98, 'test1', '', '2017-04-21 12:54:21'),
(99, 'test2', '', '2017-04-21 12:55:49'),
(100, 'test2', '', '2017-04-21 13:08:32'),
(101, 'test2', '', '2017-04-21 13:08:58'),
(102, 'test2', '', '2017-04-21 13:09:35'),
(103, 'test2', '', '2017-04-21 13:10:36'),
(104, 'test2', '', '2017-04-21 13:11:13'),
(105, 'Cent', 'Ferrailleur', '2017-04-21 13:12:18'),
(106, 'yolo', '', '2017-04-21 13:14:06'),
(107, 'yolo', '', '2017-04-21 13:24:21'),
(108, 'yolo', '', '2017-04-21 13:25:31'),
(109, 'mmmmm', '', '2017-04-21 13:30:44'),
(110, '', '', '2017-04-21 13:31:24'),
(111, 'ttt', '', '2017-04-21 13:46:18'),
(112, 'gg', '', '2017-04-21 13:49:19'),
(113, 'yooooooooo', '', '2017-04-21 13:52:01'),
(114, 'SAAAAAM', 'Ferrailleur', '2017-04-21 13:54:35'),
(115, 'ZZZZZZZZZZ', 'Ferrailleur', '2017-04-21 13:55:38'),
(116, '', '', '2017-04-21 14:09:13'),
(117, '', '', '2017-04-22 10:49:47'),
(118, '', '', '2017-04-22 10:49:50'),
(119, '', '', '2017-04-22 12:44:41'),
(120, '', '', '2017-04-22 12:46:02'),
(121, '', '', '2017-04-22 12:46:33'),
(122, '123456', 'glandeur', '2017-04-22 12:47:13'),
(123, '', '', '2017-04-22 12:48:17'),
(124, '', '', '2017-04-22 12:48:31'),
(125, '', '', '2017-04-22 12:48:33'),
(126, 'ttt', '', '2017-04-22 12:48:51'),
(127, '', '', '2017-04-22 12:50:40'),
(128, 'Timoooooo', 'Zzzz ZZzzzz', '2017-04-22 13:10:50'),
(129, 'carloooooooooooo', 'beugh', '2017-04-22 13:16:53');

-- --------------------------------------------------------

--
-- Table structure for table `teams_workers`
--

CREATE TABLE IF NOT EXISTS `teams_workers` (
  `teams_tea_id` int(11) NOT NULL,
  `workers_wor_id` int(11) NOT NULL,
  PRIMARY KEY (`teams_tea_id`,`workers_wor_id`),
  KEY `fk_teams_has_workers_workers1_idx` (`workers_wor_id`),
  KEY `fk_teams_has_workers_teams1_idx` (`teams_tea_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teams_workers`
--

INSERT INTO `teams_workers` (`teams_tea_id`, `workers_wor_id`) VALUES
(46, 0),
(0, 1),
(1, 1),
(2, 1),
(46, 1),
(106, 1),
(111, 1),
(112, 1),
(113, 1),
(114, 1),
(115, 1),
(0, 2),
(1, 2),
(105, 2),
(109, 2),
(112, 2),
(113, 2),
(114, 2),
(115, 2),
(1, 3),
(0, 4),
(1, 4),
(99, 4),
(113, 4),
(114, 4),
(115, 4),
(114, 6),
(115, 6),
(111, 14),
(122, 14),
(128, 14),
(129, 14),
(122, 15),
(128, 15),
(122, 16),
(128, 16),
(122, 17),
(106, 18),
(111, 18),
(106, 19),
(129, 19),
(128, 30),
(129, 30),
(111, 37),
(129, 37);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `usr_id` int(11) NOT NULL AUTO_INCREMENT,
  `usr_name` varchar(255) NOT NULL,
  `usr_password` varchar(255) NOT NULL,
  `usr_email` varchar(255) NOT NULL,
  `usr_role` varchar(24) NOT NULL,
  `usr_token` varchar(32) NOT NULL,
  `usr_token_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usr_inserted` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`usr_id`),
  UNIQUE KEY `usr_password` (`usr_password`,`usr_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usr_id`, `usr_name`, `usr_password`, `usr_email`, `usr_role`, `usr_token`, `usr_token_created`, `usr_inserted`) VALUES
(1, '', '$2y$10$rzszYkDJgOkqKWeiES2S1.1dJOarvhlB93/A7wfRDUuzNzS.FdFoi', 'm_donovan@hotmail.fr', 'user', '', '2017-04-21 07:35:07', NULL),
(2, '', '$2y$10$DjOsk7tsiaAiHo.T7oBZPOkUwewtyeH5hRZcECDTbI8pLfkFceWL2', 'carlo.specchio@gmail.com', 'user', '', '2017-04-21 07:36:35', NULL),
(3, '', '$2y$10$3IvmBms6kHPJ0cVY1aniWeqiCpTOxMkkYc1.pHinyFDI06F7NeOl.', 'charles.mirror4@gmail.com', 'user', '', '2017-04-24 08:16:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_group_constructions`
--

CREATE TABLE IF NOT EXISTS `users_group_constructions` (
  `users_usr_id` int(11) NOT NULL,
  `constructions_con_id` int(11) NOT NULL,
  `ugp_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`users_usr_id`,`constructions_con_id`),
  KEY `fk_users_has_constructions_constructions1_idx` (`constructions_con_id`),
  KEY `fk_users_has_constructions_users1_idx` (`users_usr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE IF NOT EXISTS `workers` (
  `wor_id` int(11) NOT NULL AUTO_INCREMENT,
  `wor_lastname` varchar(255) NOT NULL,
  `wor_firstname` varchar(255) NOT NULL,
  `wor_picture` varchar(255) NOT NULL,
  `wor_quality` varchar(255) NOT NULL,
  `wor_remark` text NOT NULL,
  `wor_inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`wor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`wor_id`, `wor_lastname`, `wor_firstname`, `wor_picture`, `wor_quality`, `wor_remark`, `wor_inserted`) VALUES
(14, 'qwertz', 'Andrea', '', 'Ferraillage', '', '2017-04-20 13:53:49'),
(15, 'sdfghjk', 'Carlo', '', 'Ferraillage', '', '2017-04-20 13:54:18'),
(16, 'oiuztr', 'kjhg', '', 'Ferraillage', '', '2017-04-20 13:54:29'),
(17, 'drthe', 'rstjh', '', 'Ferraillage', '', '2017-04-20 13:54:36'),
(18, 'hgjrtthcas', 'erg', '', 'Ferraillage', '', '2017-04-20 13:54:45'),
(19, 'hjildsgsrt', 'dfs', '', 'Ferraillage', '', '2017-04-20 13:54:53'),
(30, 'cordier', 'ben', '', 'Ferraillage', 'TRop fort', '2017-04-21 08:18:03'),
(37, 'Al', 'Pacino', '', 'Ferraillage', '', '2017-04-22 11:03:36'),
(43, '', '', '', '', '', '2017-04-24 07:52:47'),
(44, '', '', '', '', '', '2017-04-24 07:55:36');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
