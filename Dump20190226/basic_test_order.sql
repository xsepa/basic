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
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cartridge_id` int(10) unsigned DEFAULT NULL,
  `date` date NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `printer_id` int(10) unsigned NOT NULL,
  `order_status_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `zayvka__user_idx` (`user_id`),
  KEY `zyavka__cartridge_idx` (`cartridge_id`),
  KEY `zayavka__status_idx` (`order_status_id`),
  KEY `zayavka__printer_idx` (`printer_id`),
  CONSTRAINT `zayavka__printer` FOREIGN KEY (`printer_id`) REFERENCES `printer` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `zayavka__status` FOREIGN KEY (`order_status_id`) REFERENCES `order_status` (`id`),
  CONSTRAINT `zayvka__user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `zyavka__cartridge` FOREIGN KEY (`cartridge_id`) REFERENCES `cartridge` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` VALUES (1,7,'2019-02-22',1,1,2),(2,1,'2019-02-22',1,4,2),(3,13,'2019-02-23',1,3,2),(4,10,'2019-02-25',1,4,2),(5,2,'2019-02-25',1,1,2),(6,14,'2019-02-25',1,4,2),(7,12,'2019-02-25',1,5,2),(8,2,'2019-02-25',1,1,1),(9,6,'2019-02-25',1,2,2),(10,2,'2019-02-25',1,1,1),(11,12,'2019-02-25',1,5,1),(12,14,'2019-02-25',1,4,1),(13,13,'2019-02-26',4,3,1);
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
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
