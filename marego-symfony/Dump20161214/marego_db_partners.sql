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
-- Table structure for table `partners`
--

DROP TABLE IF EXISTS `partners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partners` (
  `pid` int(2) NOT NULL AUTO_INCREMENT,
  `p_name` varchar(100) NOT NULL,
  `strasse` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `zipcode` int(5) NOT NULL,
  `f_name` varchar(45) DEFAULT NULL,
  `l_name` varchar(45) DEFAULT NULL,
  `title` varchar(15) DEFAULT NULL,
  `iban` varchar(25) DEFAULT NULL,
  `phone` varchar(14) DEFAULT NULL,
  `mail` varchar(30) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `securitypassword` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`pid`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partners`
--

LOCK TABLES `partners` WRITE;
/*!40000 ALTER TABLE `partners` DISABLE KEYS */;
INSERT INTO `partners` VALUES (1,'Marego GmbH','Franckestrasse 2','Magdeburg',39104,'Eric','Schumann','Herr','DE123456789','123456789','abc@marego.com','marego','marego'),(3,'Kreisverkehrsgesellschaft Salzland mbH','Altenburger Chaussee 1','Bernburg',6406,'','','','','','service@pnvg­-salzland.de',NULL,NULL),(4,'Magdeburger Verkehrsbetriebe GmbH & Co. KG','Walther-RathenauStrasse 36','Magdeburg',39106,'Susann','Riecke','','DE154589974','','susann.riecke@mvbnet.de','mvb','123'),(5,'DB Regio AG, Region Südost','Richard-Wagner-Straße 1','Leipzig',4109,'Thomas','Huebner',NULL,'1234465',NULL,'thomas.huebner@deutschebahn.co','db','db');
/*!40000 ALTER TABLE `partners` ENABLE KEYS */;
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
