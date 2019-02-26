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
-- Table structure for table `cartridge`
--

DROP TABLE IF EXISTS `cartridge`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `cartridge` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `purchase_date` date NOT NULL,
  `cartridge_model_id` int(10) unsigned NOT NULL,
  `status_id` int(10) unsigned NOT NULL,
  `inventory_name_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `inventory_id_idx` (`inventory_name_id`),
  KEY `cartridg_model_id_idx` (`cartridge_model_id`),
  KEY `cartridge_status_idx` (`status_id`),
  CONSTRAINT `cartridg__cartridge_model` FOREIGN KEY (`cartridge_model_id`) REFERENCES `cartridge_model` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `cartridge__cartridge_status` FOREIGN KEY (`status_id`) REFERENCES `cartridge_status` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `cartridge__inventory` FOREIGN KEY (`inventory_name_id`) REFERENCES `inventory` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cartridge`
--

LOCK TABLES `cartridge` WRITE;
/*!40000 ALTER TABLE `cartridge` DISABLE KEYS */;
INSERT INTO `cartridge` VALUES (1,'2019-01-29',5,1,1),(2,'2019-02-07',1,3,2),(3,'2019-02-16',1,1,5),(4,'2019-02-06',2,1,6),(5,'2019-02-21',3,1,7),(6,'2019-03-08',3,2,11),(7,'2019-01-30',1,1,13),(8,'2019-01-29',2,1,14),(9,'2019-01-30',6,1,15),(10,'2019-01-27',5,2,16),(11,'2019-01-30',3,1,17),(12,'2019-01-29',2,3,18),(13,'2019-01-29',4,3,19),(14,'2019-01-28',5,3,20);
/*!40000 ALTER TABLE `cartridge` ENABLE KEYS */;
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
