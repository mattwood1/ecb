-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 07, 2014 at 03:23 AM
-- Server version: 5.5.33-MariaDB-log
-- PHP Version: 5.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ecb`
--

-- --------------------------------------------------------

--
-- Table structure for table `ccars`
--

CREATE TABLE IF NOT EXISTS `ccars` (
  `carId` int(11) NOT NULL AUTO_INCREMENT,
  `reg` varchar(10) NOT NULL,
  `motDue` date NOT NULL,
  `taxDue` date NOT NULL,
  `service` date NOT NULL,
  `bookedOut` date DEFAULT NULL,
  `dueIn` date DEFAULT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`carId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE IF NOT EXISTS `job` (
  `jobId` int(11) NOT NULL AUTO_INCREMENT,
  `site` enum('MK','Bedford','Northampton','Luton','Ayelsbury','St. Albans','Watford') NOT NULL,
  `jobSource` enum('CASH','TMI','INSURANCE','WARRANTY','INTERNAL','EASIDRIVE','OTHER') NOT NULL,
  `carReg` text NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `postcode` text NOT NULL,
  `tel` text NOT NULL,
  `mobile` text NOT NULL,
  `email` text NOT NULL,
  `make` text NOT NULL,
  `model` text NOT NULL,
  `mileage` int(11) NOT NULL,
  `vin` text NOT NULL,
  `transmission` enum('Auto','Manual','Unknown') NOT NULL,
  `fuel` enum('Petrol','Diesel','LPG','Hybrid','Unknown','Electric') NOT NULL,
  `colour` text NOT NULL,
  `damage` text NOT NULL,
  `special` text NOT NULL,
  `partsEst` text NOT NULL,
  `excess` decimal(10,2) NOT NULL,
  `vatRegistered` tinyint(4) NOT NULL,
  `seToyota` tinyint(4) NOT NULL,
  `jobStatusId` int(2) NOT NULL DEFAULT '1',
  `jobProcessId` int(2) NOT NULL DEFAULT '0',
  `insDate` date NOT NULL,
  `insName` text NOT NULL,
  `insAdd` text NOT NULL,
  `insPost` text NOT NULL,
  `insTel` text NOT NULL,
  `labRate` decimal(10,2) NOT NULL,
  `labHours` decimal(10,2) NOT NULL,
  `labEst` decimal(10,2) NOT NULL,
  `pandmEst` decimal(10,2) NOT NULL,
  `partsTotal` decimal(10,2) NOT NULL,
  `specialEst` decimal(10,2) NOT NULL,
  `vatEst` decimal(10,2) NOT NULL,
  `subtotEst` decimal(10,2) NOT NULL,
  `totalEst` decimal(10,2) NOT NULL,
  `recovEst` decimal(10,2) NOT NULL,
  `estPrep` text NOT NULL,
  `eta` date NOT NULL,
  `onSite` date NOT NULL,
  `dateCreated` datetime NOT NULL,
  `dateModified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`jobId`),
  KEY `jobStatusId` (`jobStatusId`),
  KEY `jobProcessId` (`jobProcessId`),
  FULLTEXT KEY `carReg` (`carReg`,`name`,`address`,`postcode`,`make`,`model`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`jobId`, `site`, `jobSource`, `carReg`, `name`, `address`, `postcode`, `tel`, `mobile`, `email`, `make`, `model`, `mileage`, `vin`, `transmission`, `fuel`, `colour`, `damage`, `special`, `partsEst`, `excess`, `vatRegistered`, `seToyota`, `jobStatusId`, `jobProcessId`, `insDate`, `insName`, `insAdd`, `insPost`, `insTel`, `labRate`, `labHours`, `labEst`, `pandmEst`, `partsTotal`, `specialEst`, `vatEst`, `subtotEst`, `totalEst`, `recovEst`, `estPrep`, `eta`, `onSite`, `dateCreated`, `dateModified`) VALUES
(1, 'MK', 'CASH', 'MK60 LTN ', 'HART', '', '', '', '', '', 'toyota', 'verso', 0, '', '', '', '', '', '', '', '0.00', 0, 0, 4, 7, '2027-01-14', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'Zoe', '0000-00-00', '0000-00-00', '2014-01-30 11:01:55', '2014-01-31 11:35:59'),
(2, 'MK', 'CASH', 'WF58 FUT ', 'Thevakanthan', '', '', '', '', '', 'Toyota', 'Auris', 0, '', '', '', '', '', '', '', '0.00', 0, 0, 4, 1, '2014-01-30', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '0000-00-00', '0000-00-00', '2014-01-30 16:06:52', '2014-01-30 16:07:44'),
(3, 'MK', 'CASH', 'KH56 VRM ', 'MARLEY', '', '', '', '', '', 'Toyota', 'Prius', 0, '', '', '', '', '', '', '', '0.00', 0, 0, 4, 1, '2014-01-30', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '0000-00-00', '0000-00-00', '2014-01-30 16:08:26', '2014-01-30 16:08:32'),
(4, 'MK', 'CASH', 'FG07 JOH ', 'Wahid', '', '', '', '', '', 'Toyota', 'Aygo', 0, '', '', '', '', '', '', '', '0.00', 0, 0, 4, 3, '2014-01-30', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '0000-00-00', '0000-00-00', '2014-01-30 16:09:25', '2014-02-04 09:51:21'),
(5, 'MK', 'CASH', 'KY60 WPZ ', 'Clare', '', '', '', '', '', 'Toyota', 'Prius', 0, '', '', '', '', '', '', '', '0.00', 0, 0, 4, 1, '2014-01-30', 'insurance', '', '', '', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '0000-00-00', '0000-00-00', '2014-01-30 16:10:55', '2014-01-30 16:10:59'),
(6, 'MK', 'TMI', 'LR13 RZK ', 'Parish', '', '', '', '', '', 'Toyota', 'GT86', 0, '', '', '', '', '', '', '', '0.00', 0, 0, 4, 1, '2014-01-30', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2014-02-13', '2014-02-06', '2014-01-30 16:12:27', '2014-02-06 23:04:21'),
(7, 'MK', 'CASH', 'KH55 KKG ', 'JANES', '', '', '', '', '', 'TOYOTA', 'COROLLA', 0, '', '', '', '', '', '', '', '0.00', 0, 0, 4, 4, '2014-01-30', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '0000-00-00', '0000-00-00', '2014-01-30 16:33:30', '2014-01-30 16:33:30'),
(8, 'MK', 'CASH', 'LL63 GXD', 'ABBI', '', '', '', '', '', 'TOYOTA', 'YARIS', 0, '', '', '', '', '', '', '', '0.00', 0, 0, 4, 7, '2014-01-30', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '0000-00-00', '0000-00-00', '2014-01-30 16:34:21', '2014-01-30 16:35:25'),
(9, 'MK', 'CASH', 'LK63 MPY ', 'MOTTS', '', '', '', '', '', 'TOYOTA', 'AURIS', 0, '', '', '', '', '', '', '', '0.00', 0, 0, 4, 7, '2014-01-30', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '0000-00-00', '0000-00-00', '2014-01-30 16:36:25', '2014-01-30 16:36:25'),
(10, 'MK', 'CASH', 'WV07 BTY', 'ST ALBANS', '', '', '', '', '', 'TOYOTA', 'AVENSIS', 0, '', '', '', '', '', '', '', '0.00', 0, 0, 4, 3, '2014-01-30', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '0000-00-00', '0000-00-00', '2014-01-30 16:37:10', '2014-01-30 16:37:10'),
(11, 'MK', 'CASH', 'LL13 FGA ', 'RAMAGE', '', '', '', '', '', 'TOYOTA', 'YARIS', 0, '', '', '', '', '', '', '', '0.00', 0, 0, 4, 4, '2014-01-30', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '0000-00-00', '0000-00-00', '2014-01-30 16:37:59', '2014-01-30 16:37:59'),
(12, 'MK', 'CASH', 'LM60 KZR ', 'NNANDOZIE', '', '', '', '', '', 'TOYOTA', 'VERSO', 0, '', '', '', '', '', '', '', '0.00', 0, 0, 7, 7, '2014-01-30', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '0000-00-00', '0000-00-00', '2014-01-30 16:38:34', '2014-01-30 16:38:41'),
(13, 'MK', 'CASH', 'LS56 GBY ', 'SALAIWA', '', '', '', '', '', 'TOYOTA', 'PRIUS', 0, '', '', '', '', '', '', '', '0.00', 0, 0, 4, 6, '2014-01-30', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '0000-00-00', '0000-00-00', '2014-01-30 16:39:21', '2014-01-31 11:38:29'),
(14, 'MK', 'CASH', 'LL62 UZP ', 'IMOH', '', '', '', '', '', 'TOYOTA', 'VERSO', 0, '', '', '', '', '', '', '', '0.00', 0, 0, 4, 2, '2014-01-30', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '0000-00-00', '0000-00-00', '2014-01-30 16:40:08', '2014-01-30 16:40:08'),
(15, 'MK', 'CASH', 'JO11 EWY ', 'LEWY', '', '', '', '', '', 'TOYOTA', 'LAND CRUISER', 0, '', '', '', '', '', '', '', '0.00', 0, 0, 7, 7, '2014-01-30', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '0000-00-00', '0000-00-00', '2014-01-30 16:40:40', '2014-01-30 16:40:40'),
(16, 'MK', 'CASH', 'GR04 EXM ', 'WICKHAM', '', '', '', '', '', 'TOYOTA', 'VERSO', 0, '', '', '', '', '', '', '', '0.00', 0, 0, 4, 5, '2014-01-30', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '0000-00-00', '0000-00-00', '2014-01-30 16:41:33', '2014-01-30 16:41:33'),
(17, 'MK', 'CASH', 'KU10 XED ', 'LEE', '', '', '', '', '', 'TOYOTA', 'YARIS', 0, '', '', '', '', '', '', '', '0.00', 0, 0, 4, 4, '2014-01-30', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '0000-00-00', '0000-00-00', '2014-01-30 16:42:09', '2014-01-30 16:42:09'),
(18, 'MK', 'CASH', 'FD05 UDS ', 'JONES', '', '', '', '', '', 'TOYOTA', 'AVENSIS', 0, '', '', '', '', '', '', '', '0.00', 0, 0, 4, 4, '2014-01-30', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '0000-00-00', '0000-00-00', '2014-01-30 16:43:09', '2014-01-30 16:43:09'),
(19, 'MK', 'CASH', 'LN61 ZKK ', 'BARRALETT', '', '', '', '', '', 'TOYOTA', 'PRIUS', 0, '', '', '', '', '', '', '', '0.00', 0, 0, 4, 3, '2014-01-30', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '0000-00-00', '0000-00-00', '2014-01-30 16:43:51', '2014-01-30 16:43:51'),
(20, 'MK', 'CASH', 'KP13 WJU ', 'NORTHAMPTONCAR', '', '', '', '', '', 'TOYOTA', 'PRIUS+', 0, '', '', '', '', '', '', '', '0.00', 0, 0, 4, 4, '2014-01-30', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '0000-00-00', '0000-00-00', '2014-01-30 16:45:47', '2014-01-30 16:45:47'),
(21, 'MK', 'CASH', 'GU09 FAM ', 'ALLEN', '', '', '', '', '', 'TOYOTA', 'PRIUS', 0, '', '', '', '', '', '', '', '0.00', 0, 0, 4, 2, '2014-01-30', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '0000-00-00', '0000-00-00', '2014-01-30 16:46:15', '2014-01-30 16:46:15'),
(22, 'MK', 'CASH', 'LT11 LBV ', 'SACKS', '', '', '', '', '', 'TOYOTA', 'AURIS', 0, '', '', '', '', '', '', '', '0.00', 0, 0, 4, 3, '2014-01-30', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '0000-00-00', '0000-00-00', '2014-01-30 16:46:50', '2014-01-30 16:46:50'),
(23, 'MK', 'CASH', 'VE54 MCH ', 'KHAN', '', '', '', '', '', 'TOYOTA', 'PREVIA', 0, '', '', '', '', '', '', '', '0.00', 0, 0, 4, 5, '2014-01-30', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '0000-00-00', '0000-00-00', '2014-01-30 16:47:23', '2014-01-30 16:47:23'),
(24, 'MK', 'CASH', 'LN58 OEM ', 'GANATRA', '', '', '', '', '', 'PEUGEOT', '107', 0, '', '', '', '', '', '', '', '0.00', 0, 0, 4, 4, '2014-01-30', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '0000-00-00', '0000-00-00', '2014-01-30 16:47:58', '2014-01-30 16:47:58'),
(25, 'MK', 'CASH', 'FV09 UWP ', 'THANDI', '', '', '', '', '', 'TOYOTA', 'VERSO', 0, '', '', '', '', '', '', '', '0.00', 0, 0, 4, 4, '2014-01-30', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '0000-00-00', '0000-00-00', '2014-01-30 16:48:33', '2014-01-30 16:48:33'),
(26, 'MK', 'CASH', 'KN63 KMY ', 'JONES', '', '', '', '', '', 'TOYOTA', 'AVENSIS', 0, '', '', '', '', '', '', '', '0.00', 0, 0, 4, 4, '2014-01-30', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '0000-00-00', '0000-00-00', '2014-01-30 16:49:18', '2014-01-30 16:49:18'),
(27, 'MK', 'CASH', 'GV61 BWY ', 'MORGAN', '', '', '', '', '', 'TOYOTA', 'PRIUS', 0, '', '', '', '', '', '', '', '0.00', 0, 0, 3, 1, '2014-01-30', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '0000-00-00', '0000-00-00', '2014-01-30 16:51:09', '2014-01-30 16:51:09'),
(28, 'MK', 'CASH', 'EK11 UOG ', 'BOWLZER', '', '', '', '', '', 'TOYOTA', 'VERSO', 0, '', '', '', '', '', '', '', '0.00', 0, 0, 3, 1, '2014-01-30', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '0000-00-00', '0000-00-00', '2014-01-30 16:52:23', '2014-01-30 16:52:23'),
(29, 'MK', 'CASH', 'LN59 XES ', 'PUROHIT', '', '', '', '', '', 'TOYOTA', 'PRIUS', 0, '', '', '', '', '', '', '', '0.00', 0, 0, 2, 1, '2014-01-30', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '0000-00-00', '0000-00-00', '2014-01-30 17:17:11', '2014-02-04 08:55:15'),
(30, 'MK', 'CASH', 'KV57 PPF ', 'BROWN', '', '', '', '', '', 'TOYOTA', 'AURIS', 0, '', '', '', '', '', '', '', '0.00', 0, 0, 3, 1, '2014-01-30', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '0000-00-00', '0000-00-00', '2014-01-30 17:18:16', '2014-01-30 17:18:16');

-- --------------------------------------------------------

--
-- Table structure for table `jobCard`
--

CREATE TABLE IF NOT EXISTS `jobCard` (
  `jobCardId` int(11) NOT NULL,
  `jobId` int(11) NOT NULL,
  `mechanical` int(11) DEFAULT NULL,
  `panel` int(11) DEFAULT NULL,
  `strip` int(11) DEFAULT NULL,
  `prep` int(11) DEFAULT NULL,
  `polish` int(11) DEFAULT NULL,
  `fit` int(11) DEFAULT NULL,
  `paint` int(11) DEFAULT NULL,
  `clean` int(11) DEFAULT NULL,
  `dateBooked` date DEFAULT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateModified` datetime NOT NULL,
  PRIMARY KEY (`jobCardId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jobCard`
--

INSERT INTO `jobCard` (`jobCardId`, `jobId`, `mechanical`, `panel`, `strip`, `prep`, `polish`, `fit`, `paint`, `clean`, `dateBooked`, `dateCreated`, `dateModified`) VALUES
(0, 1, 0, 3, 2, 0, 0, NULL, 7, 0, '2014-01-30', '2014-01-30 16:01:35', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `jobImage`
--

CREATE TABLE IF NOT EXISTS `jobImage` (
  `imageJobId` int(11) NOT NULL AUTO_INCREMENT,
  `jobId` int(11) NOT NULL,
  `file` text NOT NULL,
  `thumb` text NOT NULL,
  `dateCreated` datetime NOT NULL,
  PRIMARY KEY (`imageJobId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `jobImage`
--

INSERT INTO `jobImage` (`imageJobId`, `jobId`, `file`, `thumb`, `dateCreated`) VALUES
(1, 1, '/jobUploads/1/OUTER_TORQUES.pdf', '/jobUploads/1/thumbs/OUTER_TORQUES.pdf', '2014-01-30 15:57:39'),
(2, 1, '/jobUploads/1/WORKSHOP.jpg', '/jobUploads/1/thumbs/WORKSHOP.jpg', '2014-01-30 16:00:11'),
(3, 26, '/jobUploads/26/cwtaekwondologo.gif', '/jobUploads/26/thumbs/cwtaekwondologo.gif', '2014-01-30 18:45:34'),
(4, 26, '/jobUploads/26/BT_BOOKLET_6_EVENT_REQUIREMENTS_1st_JANUARY_2013.pdf', '/jobUploads/26/thumbs/BT_BOOKLET_6_EVENT_REQUIREMENTS_1st_JANUARY_2013.pdf', '2014-01-30 18:46:17'),
(5, 13, '/jobUploads/13/prius_rear_bumper.pdf', '/jobUploads/13/thumbs/prius_rear_bumper.pdf', '2014-02-04 08:54:41');

-- --------------------------------------------------------

--
-- Table structure for table `jobNote`
--

CREATE TABLE IF NOT EXISTS `jobNote` (
  `jobNoteId` int(11) NOT NULL AUTO_INCREMENT,
  `jobId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `note` text NOT NULL,
  `dateCreated` datetime NOT NULL,
  PRIMARY KEY (`jobNoteId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `jobNote`
--

INSERT INTO `jobNote` (`jobNoteId`, `jobId`, `userId`, `note`, `dateCreated`) VALUES
(1, 1, 0, 'stripped out to inspect water leak', '2014-01-30 11:02:41'),
(2, 2, 0, 'insurance', '2014-01-30 16:07:41'),
(3, 3, 0, 'RECOVERD IN ESTIMATE 20/1/14, ENGINEER TO INSPECT 30/1/14\r\n', '2014-01-30 16:08:39'),
(4, 4, 0, 'TMI', '2014-01-30 16:09:36'),
(5, 4, 0, 'RECOVERD IN 22/1/14. AUDATEX SENT TMI 23/1/14. TOTAL LOSS 24/1/14\r\n', '2014-01-30 16:09:45'),
(6, 4, 0, 'Likely Total loss', '2014-01-30 16:09:57'),
(7, 5, 0, 'Insurance - Hit a fox', '2014-01-30 16:11:08'),
(8, 5, 0, 'RECOVERD IN 24/1/14 PM. AUDATEX DONE AND REPORT SENT TO ZM \r\n', '2014-01-30 16:11:24'),
(9, 6, 0, 'Parts are at Elite', '2014-01-30 16:12:38'),
(10, 6, 0, 'will try and repair Quarter if not customer is aware we will replace QTR and Door', '2014-01-30 16:12:55'),
(11, 6, 0, 'The handle cap & door membrane will be here Monday', '2014-01-30 16:13:08'),
(12, 15, 0, 'DOOR MOULDING DELIVERED NEEDS TO GO BACK TO PARTS', '2014-01-30 16:40:59'),
(13, 13, 0, 'complete delivered back', '2014-01-31 13:25:51'),
(14, 6, 0, 'Latest notes at the top', '2014-02-04 02:12:00'),
(15, 6, 0, '', '2014-02-04 02:14:25'),
(16, 6, 0, 'New Note 123', '2014-02-04 02:23:02'),
(17, 6, 0, '456', '2014-02-04 02:23:37'),
(18, 6, 0, '789', '2014-02-04 02:24:26'),
(19, 6, 0, 'test', '2014-02-04 02:30:55'),
(20, 6, 2, 'try again', '2014-02-04 02:35:17'),
(21, 6, 2, 'Completing', '2014-02-04 02:35:49'),
(22, 13, 4, 'threaded\r\n', '2014-02-04 08:54:14'),
(23, 6, 4, 'test', '2014-02-04 09:49:48');

-- --------------------------------------------------------

--
-- Table structure for table `jobPart`
--

CREATE TABLE IF NOT EXISTS `jobPart` (
  `jobPartId` int(11) NOT NULL AUTO_INCREMENT,
  `jobId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` text NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `discount` int(11) NOT NULL,
  `vat` decimal(4,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateModified` datetime NOT NULL,
  `invoiceId` int(11) NOT NULL,
  PRIMARY KEY (`jobPartId`),
  KEY `jobId` (`jobId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jobProcess`
--

CREATE TABLE IF NOT EXISTS `jobProcess` (
  `jobProcessId` int(11) NOT NULL AUTO_INCREMENT,
  `label` text NOT NULL,
  PRIMARY KEY (`jobProcessId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `jobProcess`
--

INSERT INTO `jobProcess` (`jobProcessId`, `label`) VALUES
(1, 'Strip'),
(2, 'Polish/Fit'),
(3, 'Paint'),
(4, 'Repair'),
(5, 'Prime'),
(6, 'Wash'),
(7, 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `jobStatus`
--

CREATE TABLE IF NOT EXISTS `jobStatus` (
  `jobStatusId` int(11) NOT NULL AUTO_INCREMENT,
  `label` text NOT NULL,
  `class` text NOT NULL,
  PRIMARY KEY (`jobStatusId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `jobStatus`
--

INSERT INTO `jobStatus` (`jobStatusId`, `label`, `class`) VALUES
(1, 'Estimate', 'Grey'),
(2, 'To Book In', 'Red'),
(3, 'Booked In', 'Yellow'),
(4, 'W I P', 'Blue'),
(5, 'Complete', 'Green');

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE IF NOT EXISTS `todo` (
  `todoId` int(11) NOT NULL AUTO_INCREMENT,
  `status` enum('TODO','DONE','INFO','FAULT') NOT NULL,
  `note` text NOT NULL,
  `userId` int(11) NOT NULL,
  `dateCreated` datetime NOT NULL,
  `dateModified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`todoId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `todo`
--

INSERT INTO `todo` (`todoId`, `status`, `note`, `userId`, `dateCreated`, `dateModified`) VALUES
(1, 'INFO', 'Todo Item added', 0, '2014-02-04 00:55:28', '2014-02-04 09:52:39');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `dateCreated` datetime NOT NULL,
  `dateModified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `dateLoggedIn` datetime NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `username`, `password`, `name`, `email`, `dateCreated`, `dateModified`, `dateLoggedIn`) VALUES
(1, 'chris', '6b34fe24ac2ff8103f6fce1f0da2ef57', 'chris', 'chrisw6152@yahoo.co.uk', '0000-00-00 00:00:00', '2013-06-29 22:08:13', '0000-00-00 00:00:00'),
(2, 'matt', '9dc5b8a7732196248f978dcce7de708e', 'Matthew Wood', 'matthew.john.wood@gmail.com', '2013-06-29 00:11:23', '2014-02-06 22:51:41', '2014-02-06 22:51:41'),
(3, 'woodc84', 'd00f4d6137c71d64a74e099680529d3f', 'chris', 'chris@cwtkd.co.uk', '2013-06-30 11:12:44', '2013-07-03 09:57:50', '2013-07-03 10:57:50'),
(4, 'chrisw6152', '1a1dc91c907325c69271ddf0c944bc72', 'Chris Wood', 'none@none.com', '2013-07-03 11:45:03', '2014-02-06 21:07:33', '2014-02-06 21:07:33'),
(5, 'Bloggs', '5e74c30a0bf9b81a79dad7e782357d6a', 'Joe', 'joe@bloggs.co.uk', '2014-02-04 01:16:01', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'fishy', '5e7185365fa4b3a3da7088f9f287d0bf', 'fishy', 'fishy@fishco.co.uk', '2014-02-04 01:18:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
