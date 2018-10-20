CREATE DATABASE  IF NOT EXISTS `test_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `test_db`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: ncserver    Database: test_db
-- ------------------------------------------------------
-- Server version	5.7.16-0ubuntu0.16.04.1

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
-- Table structure for table `clicks`
--

DROP TABLE IF EXISTS `clicks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clicks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `provider_id` int(10) unsigned NOT NULL,
  `date` date DEFAULT NULL,
  `total_clicks` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `provider_fk_idx` (`provider_id`),
  CONSTRAINT `provider_fk` FOREIGN KEY (`provider_id`) REFERENCES `provider` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clicks`
--

LOCK TABLES `clicks` WRITE;
/*!40000 ALTER TABLE `clicks` DISABLE KEYS */;
INSERT INTO `clicks` VALUES (1,1,'2015-01-01','5683'),(2,1,'2015-02-01','5819'),(3,1,'2015-03-01','4282'),(4,1,'2015-04-01','2486'),(5,1,'2015-05-01','2082'),(6,1,'2015-06-01','3441'),(7,1,'2015-07-01','5314'),(8,1,'2015-08-01','5979'),(9,1,'2015-09-01','4824'),(10,1,'2015-10-01','2912'),(11,1,'2015-11-01','2000'),(12,1,'2015-12-01','2927'),(13,1,'2016-01-01','4840'),(14,1,'2016-02-01','5981'),(15,1,'2016-03-01','5301'),(16,1,'2016-04-01','3424'),(17,1,'2016-05-01','2077'),(18,1,'2016-06-01','2498'),(19,1,'2016-07-01','4300'),(20,1,'2016-08-01','5826'),(21,1,'2016-09-01','5673'),(22,1,'2016-10-01','3982'),(23,1,'2016-11-01','2308'),(24,1,'2016-12-01','2189'),(25,1,'2017-01-01','3735'),(26,1,'2017-02-01','5525'),(27,1,'2017-03-01','5913'),(28,2,'2015-01-01','5081'),(29,2,'2015-02-01','3168'),(30,2,'2015-03-01','2020'),(31,2,'2015-04-01','2693'),(32,2,'2015-05-01','4567'),(33,2,'2015-06-01','5920'),(34,2,'2015-07-01','5508'),(35,2,'2015-08-01','3709'),(36,2,'2015-09-01','2178'),(37,2,'2015-10-01','2322'),(38,2,'2015-11-01','4009'),(39,2,'2015-12-01','5688'),(40,2,'2016-01-01','5815'),(41,2,'2016-02-01','4273'),(42,2,'2016-03-01','2481'),(43,2,'2016-04-01','2085'),(44,2,'2016-05-01','3450'),(45,2,'2016-06-01','5321'),(46,2,'2016-07-01','5977'),(47,2,'2016-08-01','4816'),(48,2,'2016-09-01','2905'),(49,2,'2016-10-01','2000'),(50,2,'2016-11-01','2934'),(51,2,'2016-12-01','4848'),(52,2,'2017-01-01','5982'),(53,2,'2017-02-01','5294'),(54,2,'2017-03-01','3416'),(55,3,'2015-01-01','6223'),(56,3,'2015-02-01','5402'),(57,3,'2015-03-01','3292'),(58,3,'2015-04-01','1833'),(59,3,'2015-05-01','2366'),(60,3,'2015-06-01','4401'),(61,3,'2015-07-01','6068'),(62,3,'2015-08-01','5833'),(63,3,'2015-09-01','3913'),(64,3,'2015-10-01','2073'),(65,3,'2015-11-01','2004'),(66,3,'2015-12-01','3771'),(67,3,'2016-01-01','5748'),(68,3,'2016-02-01','6118'),(69,3,'2016-03-01','4541'),(70,3,'2016-04-01','2467'),(71,3,'2016-05-01','1802'),(72,3,'2016-06-01','3158'),(73,3,'2016-07-01','5288'),(74,3,'2016-08-01','6234'),(75,3,'2016-09-01','5126'),(76,3,'2016-10-01','2982'),(77,3,'2016-11-01','1775'),(78,3,'2016-12-01','2613'),(79,3,'2017-01-01','4726'),(80,3,'2017-02-01','6172'),(81,3,'2017-03-01','5621');
/*!40000 ALTER TABLE `clicks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provider`
--

DROP TABLE IF EXISTS `provider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provider` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(45) NOT NULL,
  `display_name` char(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `NAME_IX` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provider`
--

LOCK TABLES `provider` WRITE;
/*!40000 ALTER TABLE `provider` DISABLE KEYS */;
INSERT INTO `provider` VALUES (1,'adwords','Google AdWords'),(2,'bing','Bing'),(3,'facebook','Facebook'),(4,'yahoo_gemini','Yahoo Gemini'),(5,'analytics','Google Analytics'),(6,'search_console','Gooogle Search Console'),(7,'twitter','Twiter Ads'),(8,'yelp','Yelp'),(9,'adroll','AdRoll'),(10,'mongoose','Mongoose Metrics'),(11,'sheets','Google Sheets');
/*!40000 ALTER TABLE `provider` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-07-18  0:49:35
