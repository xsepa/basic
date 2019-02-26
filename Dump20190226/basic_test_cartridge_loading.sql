-- MySQL dump 10.13  Distrib 8.0.15, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: basic_test
-- ------------------------------------------------------
-- Server version	8.0.15

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cartridge_loading`
--

DROP TABLE IF EXISTS `cartridge_loading`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `cartridge_loading` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cartridge_id` int(10) unsigned NOT NULL,
  `loading_id` int(10) unsigned NOT NULL,
  `loading_price` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cartridge_loading__loading_idx` (`loading_id`),
  KEY `cartridge_loading__cartridge_idx` (`cartridge_id`),
  CONSTRAINT `cartridge_loading__cartridge` FOREIGN KEY (`cartridge_id`) REFERENCES `cartridge` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `cartridge_loading__loading` FOREIGN KEY (`loading_id`) REFERENCES `loading` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cartridge_loading`
--

LOCK TABLES `cartridge_loading` WRITE;
/*!40000 ALTER TABLE `cartridge_loading` DISABLE KEYS */;
INSERT INTO `cartridge_loading` VALUES (1,1,4,11),(2,2,4,22),(3,4,4,33),(4,1,5,25),(5,2,5,26),(6,3,5,27),(7,4,5,28),(8,7,5,29),(9,8,5,30);
/*!40000 ALTER TABLE `cartridge_loading` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-02-26 18:07:20
