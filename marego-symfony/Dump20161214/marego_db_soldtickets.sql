-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: marego_db
-- ------------------------------------------------------
-- Server version	5.7.13-log

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
-- Table structure for table `soldtickets`
--

DROP TABLE IF EXISTS `soldtickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `soldtickets` (
  `pid` int(11) NOT NULL,
  `T_id` int(11) NOT NULL,
  `C_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `G_id` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`pid`,`T_id`,`C_id`,`G_id`,`date`),
  KEY `TID_idx` (`T_id`),
  KEY `CID_idx` (`C_id`),
  KEY `gid_idx` (`G_id`),
  KEY `soldTicketPrice_idx` (`T_id`,`C_id`),
  CONSTRAINT `T_id` FOREIGN KEY (`T_id`) REFERENCES `tickets` (`T_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `cid` FOREIGN KEY (`C_id`) REFERENCES `price_category` (`C_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `gid` FOREIGN KEY (`G_id`) REFERENCES `grant_type` (`G_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `pid` FOREIGN KEY (`pid`) REFERENCES `partners` (`pid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `soldTicketPrice` FOREIGN KEY (`T_id`, `C_id`) REFERENCES `price` (`Ticketid`, `Catid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `soldtickets`
--

LOCK TABLES `soldtickets` WRITE;
/*!40000 ALTER TABLE `soldtickets` DISABLE KEYS */;
INSERT INTO `soldtickets` VALUES (1,10,601,3,1,'2016-12-09'),(3,11,2,1,2,'2016-11-24'),(3,11,2,1,2,'2016-12-04'),(4,10,601,1,3,'2016-12-09'),(4,11,1,1,3,'2016-12-09'),(4,11,2,1,3,'2016-12-06'),(4,13,2,1,3,'2016-12-07'),(5,11,3,1,3,'2016-12-07');
/*!40000 ALTER TABLE `soldtickets` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-14 19:21:16
