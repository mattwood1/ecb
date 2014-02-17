-- MySQL dump 10.14  Distrib 5.5.33-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: ecb
-- ------------------------------------------------------
-- Server version	5.5.33-MariaDB-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ccars`
--

DROP TABLE IF EXISTS `ccars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ccars` (
  `carId` int(11) NOT NULL AUTO_INCREMENT,
  `reg` varchar(10) NOT NULL,
  `motDue` date NOT NULL,
  `taxDue` date NOT NULL,
  `service` date NOT NULL,
  `bookedOut` date DEFAULT NULL,
  `dueIn` date DEFAULT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`carId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ccars`
--

LOCK TABLES `ccars` WRITE;
/*!40000 ALTER TABLE `ccars` DISABLE KEYS */;
/*!40000 ALTER TABLE `ccars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job`
--

DROP TABLE IF EXISTS `job`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job` (
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
  `coordinator` text NOT NULL,
  `estPrep` text NOT NULL,
  `eta` date NOT NULL,
  `onSite` date NOT NULL,
  `dateCreated` datetime NOT NULL,
  `dateModified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`jobId`),
  KEY `jobStatusId` (`jobStatusId`),
  KEY `jobProcessId` (`jobProcessId`),
  FULLTEXT KEY `carReg` (`carReg`,`name`,`address`,`postcode`,`make`,`model`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job`
--

LOCK TABLES `job` WRITE;
/*!40000 ALTER TABLE `job` DISABLE KEYS */;
INSERT INTO `job` VALUES (1,'MK','CASH','MK60 LTN ','HART','','','','','','toyota','verso',0,'','','','','','','',0.00,0,0,4,7,'2027-01-14','','','','',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'','Zoe','0000-00-00','0000-00-00','2014-01-30 11:01:55','2014-01-31 11:35:59'),(2,'Bedford','CASH','WF58 FUT ','Thevakanthan','','','','','','Toyota','Auris',0,'','','','','','','',0.00,0,0,4,1,'2014-01-30','','','','',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'','','0000-00-00','0000-00-00','2014-01-30 16:06:52','2014-02-12 01:10:27'),(3,'Northampton','CASH','KH56 VRM ','MARLEY','','','','','','Toyota','Prius',0,'','','','','','','',0.00,0,0,4,1,'2014-01-30','','','','',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'','','0000-00-00','0000-00-00','2014-01-30 16:08:26','2014-02-12 01:10:39'),(4,'Luton','CASH','FG07 JOH ','Wahid','','','','','','Toyota','Aygo',0,'','','','','','','',0.00,0,0,4,3,'2014-01-30','','','','',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'','','0000-00-00','0000-00-00','2014-01-30 16:09:25','2014-02-12 01:10:45'),(5,'Ayelsbury','CASH','KY60 WPZ ','Clare','','','','','','Toyota','Prius',0,'','','','','','','',0.00,0,0,4,1,'2014-01-30','insurance','','','',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'','','0000-00-00','0000-00-00','2014-01-30 16:10:55','2014-02-12 01:10:51'),(6,'St. Albans','TMI','LR13 RZK ','Parish','','','','','','Toyota','GT86',0,'','','','','','','',0.00,0,0,4,4,'2014-01-30','','','','',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'','','2014-02-20','2014-02-06','2014-01-30 16:12:27','2014-02-13 08:20:33'),(7,'Watford','CASH','KH55 KKG ','JANES','','','','','','TOYOTA','COROLLA',0,'','','','','','','',0.00,0,0,4,4,'2014-01-30','','','','',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'','','0000-00-00','0000-00-00','2014-01-30 16:33:30','2014-02-12 01:11:02'),(8,'MK','CASH','LL63 GXD','ABBI','','','','','','TOYOTA','YARIS',0,'','','','','','','',0.00,0,0,4,7,'2014-01-30','','','','',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'','','0000-00-00','0000-00-00','2014-01-30 16:34:21','2014-01-30 16:35:25'),(9,'MK','CASH','LK63 MPY ','MOTTS','','','','','','TOYOTA','AURIS',0,'','','','','','','',0.00,0,0,4,7,'2014-01-30','','','','',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'','','0000-00-00','0000-00-00','2014-01-30 16:36:25','2014-01-30 16:36:25'),(10,'MK','CASH','WV07 BTY','ST ALBANS','','','','','','TOYOTA','AVENSIS',0,'','','','','','','',0.00,0,0,4,3,'2014-01-30','','','','',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'','','0000-00-00','0000-00-00','2014-01-30 16:37:10','2014-01-30 16:37:10'),(11,'MK','CASH','LL13 FGA ','RAMAGE','','','','','','TOYOTA','YARIS',0,'','','','','','','',0.00,0,0,4,4,'2014-01-30','','','','',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'','','0000-00-00','0000-00-00','2014-01-30 16:37:59','2014-01-30 16:37:59'),(12,'MK','CASH','LM60 KZR ','NNANDOZIE','','','','','','TOYOTA','VERSO',0,'','','','','','','',0.00,0,0,7,7,'2014-01-30','','','','',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'','','0000-00-00','0000-00-00','2014-01-30 16:38:34','2014-01-30 16:38:41'),(13,'MK','CASH','LS56 GBY ','SALAIWA','','','','','','TOYOTA','PRIUS',0,'','','','','','','',0.00,0,0,4,6,'2014-01-30','','','','',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'','','0000-00-00','0000-00-00','2014-01-30 16:39:21','2014-01-31 11:38:29'),(14,'MK','CASH','LL62 UZP ','IMOH','','','','','','TOYOTA','VERSO',0,'','','','','','','',0.00,0,0,4,2,'2014-01-30','','','','',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'','','0000-00-00','0000-00-00','2014-01-30 16:40:08','2014-01-30 16:40:08'),(15,'MK','CASH','JO11 EWY ','LEWY','','','','','','TOYOTA','LAND CRUISER',0,'','','','','','','',0.00,0,0,7,7,'2014-01-30','','','','',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'','','0000-00-00','0000-00-00','2014-01-30 16:40:40','2014-01-30 16:40:40'),(16,'MK','CASH','GR04 EXM ','WICKHAM','','','','','','TOYOTA','VERSO',0,'','','','','','','',0.00,0,0,4,5,'2014-01-30','','','','',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'','','0000-00-00','0000-00-00','2014-01-30 16:41:33','2014-01-30 16:41:33'),(17,'MK','CASH','KU10 XED ','LEE','','','','','','TOYOTA','YARIS',0,'','','','','','','',0.00,0,0,4,4,'2014-01-30','','','','',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'','','0000-00-00','0000-00-00','2014-01-30 16:42:09','2014-01-30 16:42:09'),(18,'MK','CASH','FD05 UDS ','JONES','','','','','','TOYOTA','AVENSIS',0,'','','','','','','',0.00,0,0,4,4,'2014-01-30','','','','',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'','','0000-00-00','0000-00-00','2014-01-30 16:43:09','2014-01-30 16:43:09'),(19,'MK','CASH','LN61 ZKK ','BARRALETT','','','','','','TOYOTA','PRIUS',0,'','','','','','','',0.00,0,0,4,3,'2014-01-30','','','','',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'','','0000-00-00','0000-00-00','2014-01-30 16:43:51','2014-01-30 16:43:51'),(20,'MK','CASH','KP13 WJU ','NORTHAMPTONCAR','','','','','','TOYOTA','PRIUS+',0,'','','','','','','',0.00,0,0,4,4,'2014-01-30','','','','',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'','','0000-00-00','0000-00-00','2014-01-30 16:45:47','2014-01-30 16:45:47'),(21,'MK','CASH','GU09 FAM ','ALLEN','','','','','','TOYOTA','PRIUS',0,'','','','','','','',0.00,0,0,4,2,'2014-01-30','','','','',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'','','0000-00-00','0000-00-00','2014-01-30 16:46:15','2014-01-30 16:46:15'),(22,'MK','CASH','LT11 LBV ','SACKS','','','','','','TOYOTA','AURIS',0,'','','','','','','',0.00,0,0,4,3,'2014-01-30','','','','',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'','','0000-00-00','0000-00-00','2014-01-30 16:46:50','2014-01-30 16:46:50'),(23,'MK','CASH','VE54 MCH ','KHAN','','','','','','TOYOTA','PREVIA',0,'','','','','','','',0.00,0,0,4,5,'2014-01-30','','','','',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'','','0000-00-00','0000-00-00','2014-01-30 16:47:23','2014-01-30 16:47:23'),(24,'MK','CASH','LN58 OEM ','GANATRA','','','','','','PEUGEOT','107',0,'','','','','','','',0.00,0,0,4,4,'2014-01-30','','','','',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'','','0000-00-00','0000-00-00','2014-01-30 16:47:58','2014-01-30 16:47:58'),(25,'MK','CASH','FV09 UWP ','THANDI','','','','','','TOYOTA','VERSO',0,'','','','','','','',0.00,0,0,4,4,'2014-01-30','','','','',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'','','0000-00-00','0000-00-00','2014-01-30 16:48:33','2014-01-30 16:48:33'),(26,'MK','CASH','KN63 KMY ','JONES','','','','','','TOYOTA','AVENSIS',0,'','','','','','','',0.00,0,0,4,4,'2014-02-10','','','','',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'','','0000-00-00','0000-00-00','2014-01-30 16:49:18','2014-02-10 13:15:23'),(27,'MK','CASH','GV61 BWY ','MORGAN','','','','','','TOYOTA','PRIUS',0,'','','','','','','',0.00,0,0,3,1,'2014-01-30','','','','',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'','','0000-00-00','0000-00-00','2014-01-30 16:51:09','2014-01-30 16:51:09'),(28,'MK','CASH','EK11 UOG ','BOWLZER','','','','','','TOYOTA','VERSO',0,'','','','','','','',0.00,0,0,3,1,'2014-01-30','','','','',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'','','0000-00-00','0000-00-00','2014-01-30 16:52:23','2014-01-30 16:52:23'),(29,'St. Albans','CASH','LN59 XES ','PUROHIT','','','','','','TOYOTA','PRIUS',0,'','','','','','','',0.00,0,0,4,1,'2014-01-30','','','','',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'','','0000-00-00','0000-00-00','2014-01-30 17:17:11','2014-02-12 01:20:09'),(30,'MK','CASH','KV57 PPF ','BROWN','','','','','','TOYOTA','AURIS',0,'','','','','','','',0.00,0,0,3,1,'2014-01-30','','','','',0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'','','0000-00-00','0000-00-00','2014-01-30 17:18:16','2014-01-30 17:18:16');
/*!40000 ALTER TABLE `job` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobCard`
--

DROP TABLE IF EXISTS `jobCard`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobCard` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobCard`
--

LOCK TABLES `jobCard` WRITE;
/*!40000 ALTER TABLE `jobCard` DISABLE KEYS */;
INSERT INTO `jobCard` VALUES (0,1,0,3,2,0,0,NULL,7,0,'2014-01-30','2014-01-30 16:01:35','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `jobCard` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobImage`
--

DROP TABLE IF EXISTS `jobImage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobImage` (
  `imageJobId` int(11) NOT NULL AUTO_INCREMENT,
  `jobId` int(11) NOT NULL,
  `file` text NOT NULL,
  `thumb` text NOT NULL,
  `dateCreated` datetime NOT NULL,
  PRIMARY KEY (`imageJobId`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobImage`
--

LOCK TABLES `jobImage` WRITE;
/*!40000 ALTER TABLE `jobImage` DISABLE KEYS */;
INSERT INTO `jobImage` VALUES (1,1,'/jobUploads/1/OUTER_TORQUES.pdf','/jobUploads/1/thumbs/OUTER_TORQUES.pdf','2014-01-30 15:57:39'),(2,1,'/jobUploads/1/WORKSHOP.jpg','/jobUploads/1/thumbs/WORKSHOP.jpg','2014-01-30 16:00:11'),(3,26,'/jobUploads/26/cwtaekwondologo.gif','/jobUploads/26/thumbs/cwtaekwondologo.gif','2014-01-30 18:45:34'),(4,26,'/jobUploads/26/BT_BOOKLET_6_EVENT_REQUIREMENTS_1st_JANUARY_2013.pdf','/jobUploads/26/thumbs/BT_BOOKLET_6_EVENT_REQUIREMENTS_1st_JANUARY_2013.pdf','2014-01-30 18:46:17'),(5,13,'/jobUploads/13/prius_rear_bumper.pdf','/jobUploads/13/thumbs/prius_rear_bumper.pdf','2014-02-04 08:54:41'),(6,6,'/jobUploads/6/IMG_6876.JPG','/jobUploads/6/thumbs/IMG_6876.JPG','2014-02-11 16:18:14');
/*!40000 ALTER TABLE `jobImage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobNote`
--

DROP TABLE IF EXISTS `jobNote`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobNote` (
  `jobNoteId` int(11) NOT NULL AUTO_INCREMENT,
  `jobId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `note` text NOT NULL,
  `dateCreated` datetime NOT NULL,
  PRIMARY KEY (`jobNoteId`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobNote`
--

LOCK TABLES `jobNote` WRITE;
/*!40000 ALTER TABLE `jobNote` DISABLE KEYS */;
INSERT INTO `jobNote` VALUES (1,1,0,'stripped out to inspect water leak','2014-01-30 11:02:41'),(2,2,0,'insurance','2014-01-30 16:07:41'),(3,3,0,'RECOVERD IN ESTIMATE 20/1/14, ENGINEER TO INSPECT 30/1/14\r\n','2014-01-30 16:08:39'),(4,4,0,'TMI','2014-01-30 16:09:36'),(5,4,0,'RECOVERD IN 22/1/14. AUDATEX SENT TMI 23/1/14. TOTAL LOSS 24/1/14\r\n','2014-01-30 16:09:45'),(6,4,0,'Likely Total loss','2014-01-30 16:09:57'),(7,5,0,'Insurance - Hit a fox','2014-01-30 16:11:08'),(8,5,0,'RECOVERD IN 24/1/14 PM. AUDATEX DONE AND REPORT SENT TO ZM \r\n','2014-01-30 16:11:24'),(9,6,0,'Parts are at Elite','2014-01-30 16:12:38'),(10,6,0,'will try and repair Quarter if not customer is aware we will replace QTR and Door','2014-01-30 16:12:55'),(11,6,0,'The handle cap & door membrane will be here Monday','2014-01-30 16:13:08'),(12,15,0,'DOOR MOULDING DELIVERED NEEDS TO GO BACK TO PARTS','2014-01-30 16:40:59'),(13,13,0,'complete delivered back','2014-01-31 13:25:51'),(14,6,0,'Latest notes at the top','2014-02-04 02:12:00'),(15,6,0,'','2014-02-04 02:14:25'),(16,6,0,'New Note 123','2014-02-04 02:23:02'),(17,6,0,'456','2014-02-04 02:23:37'),(18,6,0,'789','2014-02-04 02:24:26'),(19,6,0,'test','2014-02-04 02:30:55'),(20,6,2,'try again','2014-02-04 02:35:17'),(21,6,2,'Completing','2014-02-04 02:35:49'),(22,13,4,'threaded\r\n','2014-02-04 08:54:14'),(23,6,4,'test','2014-02-04 09:49:48'),(24,26,4,'added\r\n\r\n','2014-02-10 13:15:04'),(25,30,4,'added parts to the job - requires more of A B & C','2014-02-11 16:17:15'),(26,29,4,'Job has come in, needs a large Sup.\r\nhas been hit hard on the OSF wheel, will need OSF suspension adding to the estimate, OSF wing hybrid badge, OSF splash shield, OSF wheel & tyre.','2014-02-11 16:37:49'),(27,6,4,'handle cap was sent incorrectly, it should have had a hole for the lock to sit into, had to wait till PM for the correct one to come in','2014-02-12 12:52:55');
/*!40000 ALTER TABLE `jobNote` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobPart`
--

DROP TABLE IF EXISTS `jobPart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobPart` (
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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobPart`
--

LOCK TABLES `jobPart` WRITE;
/*!40000 ALTER TABLE `jobPart` DISABLE KEYS */;
INSERT INTO `jobPart` VALUES (1,29,0,'wing',0.00,0,0.00,0.00,'2014-02-11 16:39:19','0000-00-00 00:00:00',0),(2,29,0,'frt lower spoiler',0.00,0,0.00,0.00,'2014-02-11 16:39:30','0000-00-00 00:00:00',0),(3,29,0,'osf guide rail',0.00,0,0.00,0.00,'2014-02-11 16:39:37','0000-00-00 00:00:00',0),(4,29,0,'wing',0.00,0,0.00,0.00,'2014-02-12 13:12:50','0000-00-00 00:00:00',0);
/*!40000 ALTER TABLE `jobPart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobProcess`
--

DROP TABLE IF EXISTS `jobProcess`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobProcess` (
  `jobProcessId` int(11) NOT NULL AUTO_INCREMENT,
  `label` text NOT NULL,
  PRIMARY KEY (`jobProcessId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobProcess`
--

LOCK TABLES `jobProcess` WRITE;
/*!40000 ALTER TABLE `jobProcess` DISABLE KEYS */;
INSERT INTO `jobProcess` VALUES (1,'Strip'),(2,'Polish/Fit'),(3,'Paint'),(4,'Repair'),(5,'Prime'),(6,'Wash'),(7,'Complete');
/*!40000 ALTER TABLE `jobProcess` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobStatus`
--

DROP TABLE IF EXISTS `jobStatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobStatus` (
  `jobStatusId` int(11) NOT NULL AUTO_INCREMENT,
  `label` text NOT NULL,
  `class` text NOT NULL,
  PRIMARY KEY (`jobStatusId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobStatus`
--

LOCK TABLES `jobStatus` WRITE;
/*!40000 ALTER TABLE `jobStatus` DISABLE KEYS */;
INSERT INTO `jobStatus` VALUES (1,'Estimate','Grey'),(2,'To Book In','Red'),(3,'Booked In','Yellow'),(4,'W I P','Blue'),(5,'Complete','Green');
/*!40000 ALTER TABLE `jobStatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `roleId` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `system` int(11) NOT NULL,
  `resources` text NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`roleId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'Administrator',1,'a:1:{i:0;s:14:\"administrators\";}',0);
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `todo`
--

DROP TABLE IF EXISTS `todo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `todo` (
  `todoId` int(11) NOT NULL AUTO_INCREMENT,
  `status` enum('TODO','DONE','INFO','FAULT') NOT NULL,
  `note` text NOT NULL,
  `userId` int(11) NOT NULL,
  `dateCreated` datetime NOT NULL,
  `dateModified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`todoId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `todo`
--

LOCK TABLES `todo` WRITE;
/*!40000 ALTER TABLE `todo` DISABLE KEYS */;
INSERT INTO `todo` VALUES (1,'INFO','Info is normal ',0,'2014-02-04 00:55:28','2014-02-11 16:19:43'),(4,'TODO','Here you can ADD and delete TODO notes',4,'2014-02-11 16:18:57','2014-02-11 16:18:57'),(5,'FAULT','RED are urgent',4,'2014-02-11 16:19:09','2014-02-11 16:19:09'),(6,'DONE','DONE is Green',4,'2014-02-11 16:19:21','2014-02-11 16:40:22'),(7,'FAULT','Red will always be at the top',4,'2014-02-11 16:20:04','2014-02-11 16:20:04');
/*!40000 ALTER TABLE `todo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `password` text NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `dateCreated` datetime NOT NULL,
  `dateModified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `dateLoggedIn` datetime NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'6b34fe24ac2ff8103f6fce1f0da2ef57','chris','chrisw6152@yahoo.co.uk','0000-00-00 00:00:00','2013-06-29 22:08:13','0000-00-00 00:00:00'),(2,'9dc5b8a7732196248f978dcce7de708e','Matthew Wood','matthew.john.wood@gmail.com','2013-06-29 00:11:23','2014-02-17 01:28:11','2014-02-17 01:28:11'),(3,'d00f4d6137c71d64a74e099680529d3f','chris','chris@cwtkd.co.uk','2013-06-30 11:12:44','2013-07-03 09:57:50','2013-07-03 10:57:50'),(4,'1a1dc91c907325c69271ddf0c944bc72','Chris Wood','none@none.com','2013-07-03 11:45:03','2014-02-14 06:20:56','2014-02-14 06:20:56'),(5,'5e74c30a0bf9b81a79dad7e782357d6a','Joe','joe@bloggs.co.uk','2014-02-04 01:16:01','0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,'5e7185365fa4b3a3da7088f9f287d0bf','fishy','fishy@fishco.co.uk','2014-02-04 01:18:04','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userRole`
--

DROP TABLE IF EXISTS `userRole`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userRole` (
  `userId` int(11) NOT NULL,
  `roleId` int(11) NOT NULL,
  PRIMARY KEY (`userId`,`roleId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userRole`
--

LOCK TABLES `userRole` WRITE;
/*!40000 ALTER TABLE `userRole` DISABLE KEYS */;
INSERT INTO `userRole` VALUES (2,1);
/*!40000 ALTER TABLE `userRole` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-02-17  1:32:56
