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
-- Table structure for table `printer_cartridge_installed`
--

DROP TABLE IF EXISTS `printer_cartridge_installed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `printer_cartridge_installed` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `printer_id` int(10) unsigned NOT NULL,
  `cartridge_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `installed_printer_idx` (`printer_id`),
  KEY `installed__cartridge_idx` (`cartridge_id`),
  CONSTRAINT `installed__cartridge` FOREIGN KEY (`cartridge_id`) REFERENCES `cartridge` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `installed__printer` FOREIGN KEY (`printer_id`) REFERENCES `printer` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `printer_cartridge_installed`
--

LOCK TABLES `printer_cartridge_installed` WRITE;
/*!40000 ALTER TABLE `printer_cartridge_installed` DISABLE KEYS */;
INSERT INTO `printer_cartridge_installed` VALUES (3,1,2,'2019-02-25'),(4,2,6,'2019-02-25'),(5,3,13,'2019-02-25'),(6,4,14,'2019-02-25'),(7,5,12,'2019-02-25');
/*!40000 ALTER TABLE `printer_cartridge_installed` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-02-26 18:07:23
