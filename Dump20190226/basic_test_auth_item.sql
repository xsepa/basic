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
-- Table structure for table `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_item`
--

LOCK TABLES `auth_item` WRITE;
/*!40000 ALTER TABLE `auth_item` DISABLE KEYS */;
INSERT INTO `auth_item` VALUES ('admin',1,NULL,NULL,NULL,1551183513,1551183513),('createCartridge',2,'Создание картриджей и принтеров',NULL,NULL,1551183513,1551183513),('createCartridgeLoading',2,'Создание заправок Картриджа',NULL,NULL,1551183513,1551183513),('createCartridgeModels',2,'Создание моделей карттриджей',NULL,NULL,1551183513,1551183513),('createInventory',2,'Создание Инвентарных номеров',NULL,NULL,1551183513,1551183513),('createLoading',2,'Создание заправок',NULL,NULL,1551183513,1551183513),('createLoadingReport',2,'Создание отчетов заправок',NULL,NULL,1551183513,1551183513),('createOrder',2,'Создание заявок на замену/установку картриджа',NULL,NULL,1551183513,1551183513),('createPrinter',2,'Создание картриджей и принтеров',NULL,NULL,1551183513,1551183513),('createPrinterCartridgeCompatiblity',2,'Создание совместимости моделей картриджей и принтеров',NULL,NULL,1551183513,1551183513),('createPrinterModels',2,'Создание моделей принтеров',NULL,NULL,1551183513,1551183513),('createUserOrder',2,'Создание заявок на замену/установку картриджа',NULL,NULL,1551183513,1551183513),('deleteCartridge',2,'Удаление картриджей и принтеров',NULL,NULL,1551183513,1551183513),('deleteCartridgeLoading',2,'Удаление заправок Картриджа',NULL,NULL,1551183513,1551183513),('deleteCartridgeModels',2,'Удаление моделей карттриджей',NULL,NULL,1551183513,1551183513),('deleteInventory',2,'Удаление Инвентарных номеров',NULL,NULL,1551183513,1551183513),('deleteLoading',2,'Удаление заправок',NULL,NULL,1551183513,1551183513),('deleteLoadingReport',2,'Удаление отчетов заправок',NULL,NULL,1551183513,1551183513),('deleteOrder',2,'Удаление заявок на замену/установку картриджа',NULL,NULL,1551183513,1551183513),('deletePrinter',2,'Удаление картриджей и принтеров',NULL,NULL,1551183513,1551183513),('deletePrinterCartridgeCompatiblity',2,'Удаление совместимости моделей картриджей и принтеров',NULL,NULL,1551183513,1551183513),('deletePrinterModels',2,'Удаление моделей принтеров',NULL,NULL,1551183513,1551183513),('deleteUserOrder',2,'Удаление заявок на замену/установку картриджа',NULL,NULL,1551183513,1551183513),('updateCartridge',2,'Обновление картриджей и принтеров',NULL,NULL,1551183513,1551183513),('updateCartridgeLoading',2,'Обновление заправок Картриджа',NULL,NULL,1551183513,1551183513),('updateCartridgeModels',2,'Обновление моделей карттриджей',NULL,NULL,1551183513,1551183513),('updateInventory',2,'Обновление Инвентарных номеров',NULL,NULL,1551183513,1551183513),('updateLoading',2,'Обновление заправок',NULL,NULL,1551183513,1551183513),('updateLoadingReport',2,'Обновление отчетов заправок',NULL,NULL,1551183513,1551183513),('updateOrder',2,'Обновление заявок на замену/установку картриджа',NULL,NULL,1551183513,1551183513),('updatePrinter',2,'Обновление картриджей и принтеров',NULL,NULL,1551183513,1551183513),('updatePrinterCartridgeCompatiblity',2,'Обновление совместимости моделей картриджей и принтеров',NULL,NULL,1551183513,1551183513),('updatePrinterModels',2,'Обновление моделей принтеров',NULL,NULL,1551183513,1551183513),('updateUserOrder',2,'Обновление заявок на замену/установку картриджа',NULL,NULL,1551183513,1551183513),('user',1,NULL,NULL,NULL,1551183513,1551183513),('viewCartridge',2,'Просмотр картриджей и принтеров',NULL,NULL,1551183513,1551183513),('viewCartridgeLoading',2,'Просмотр заправок Картриджа',NULL,NULL,1551183513,1551183513),('viewCartridgeModels',2,'Просмотр моделей карттриджей',NULL,NULL,1551183513,1551183513),('viewInventory',2,'Просмотр Инвентарных номеров',NULL,NULL,1551183513,1551183513),('viewLoading',2,'Просмотр заправок',NULL,NULL,1551183513,1551183513),('viewLoadingReport',2,'Просмотр отчетов заправок',NULL,NULL,1551183513,1551183513),('viewOrder',2,'Просмотр заявок на замену/установку картриджа',NULL,NULL,1551183513,1551183513),('viewPrinter',2,'Просмотр картриджей и принтеров',NULL,NULL,1551183513,1551183513),('viewPrinterCartridgeCompatiblity',2,'Просмотр совместимости моделей картриджей и принтеров',NULL,NULL,1551183513,1551183513),('viewPrinterModels',2,'Просмотр моделей принтеров',NULL,NULL,1551183513,1551183513),('viewUserOrder',2,'Просмотр заявок на замену/установку картриджа',NULL,NULL,1551183513,1551183513);
/*!40000 ALTER TABLE `auth_item` ENABLE KEYS */;
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
