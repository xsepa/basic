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
-- Table structure for table `printer_cartridge_compatible`
--

DROP TABLE IF EXISTS `printer_cartridge_compatible`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `printer_cartridge_compatible` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cartridge_model_id` int(10) unsigned NOT NULL,
  `printer_model_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `compatible_cartridge_model_idx` (`cartridge_model_id`),
  KEY `compatible__printer_model_idx` (`printer_model_id`),
  CONSTRAINT `compatible__cartridge_model` FOREIGN KEY (`cartridge_model_id`) REFERENCES `cartridge_model` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `compatible__printer_model` FOREIGN KEY (`printer_model_id`) REFERENCES `printer_model` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `printer_cartridge_compatible`
--

LOCK TABLES `printer_cartridge_compatible` WRITE;
/*!40000 ALTER TABLE `printer_cartridge_compatible` DISABLE KEYS */;
INSERT INTO `printer_cartridge_compatible` VALUES (1,1,1),(2,2,1),(3,5,4),(4,6,5),(5,3,2),(6,4,3),(7,7,6),(8,1,2);
/*!40000 ALTER TABLE `printer_cartridge_compatible` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-02-26 18:07:22
