CREATE DATABASE  IF NOT EXISTS `basic_test` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `basic_test`;
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
-- Table structure for table `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `idx-auth_assignment-user_id` (`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_assignment`
--

LOCK TABLES `auth_assignment` WRITE;
/*!40000 ALTER TABLE `auth_assignment` DISABLE KEYS */;
INSERT INTO `auth_assignment` VALUES ('admin','2',1551183513),('user','1',1551185068),('user','3',1551185068),('user','4',1551185068);
/*!40000 ALTER TABLE `auth_assignment` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Table structure for table `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_item_child`
--

LOCK TABLES `auth_item_child` WRITE;
/*!40000 ALTER TABLE `auth_item_child` DISABLE KEYS */;
INSERT INTO `auth_item_child` VALUES ('admin','createCartridge'),('admin','createCartridgeLoading'),('admin','createCartridgeModels'),('admin','createInventory'),('admin','createLoading'),('admin','createLoadingReport'),('admin','createOrder'),('admin','createPrinter'),('admin','createPrinterCartridgeCompatiblity'),('admin','createPrinterModels'),('user','createUserOrder'),('admin','deleteCartridge'),('admin','deleteCartridgeLoading'),('admin','deleteCartridgeModels'),('admin','deleteInventory'),('admin','deleteLoading'),('admin','deleteLoadingReport'),('admin','deleteOrder'),('admin','deletePrinter'),('admin','deletePrinterCartridgeCompatiblity'),('admin','deletePrinterModels'),('user','deleteUserOrder'),('admin','updateCartridge'),('admin','updateCartridgeLoading'),('admin','updateCartridgeModels'),('admin','updateInventory'),('admin','updateLoading'),('admin','updateLoadingReport'),('admin','updateOrder'),('admin','updatePrinter'),('admin','updatePrinterCartridgeCompatiblity'),('admin','updatePrinterModels'),('user','updateUserOrder'),('admin','user'),('admin','viewCartridge'),('admin','viewCartridgeLoading'),('admin','viewCartridgeModels'),('admin','viewInventory'),('admin','viewLoading'),('admin','viewLoadingReport'),('admin','viewOrder'),('admin','viewPrinter'),('admin','viewPrinterCartridgeCompatiblity'),('admin','viewPrinterModels'),('user','viewUserOrder');
/*!40000 ALTER TABLE `auth_item_child` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_rule`
--

LOCK TABLES `auth_rule` WRITE;
/*!40000 ALTER TABLE `auth_rule` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_rule` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Table structure for table `cartridge_model`
--

DROP TABLE IF EXISTS `cartridge_model`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `cartridge_model` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cartridge_model` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cartridge_model_UNIQUE` (`cartridge_model`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cartridge_model`
--

LOCK TABLES `cartridge_model` WRITE;
/*!40000 ALTER TABLE `cartridge_model` DISABLE KEYS */;
INSERT INTO `cartridge_model` VALUES (5,'CANNON cartrdge model 1'),(6,'CANNON cartrdge model 2'),(7,'CYOCERA cartridge model 1'),(1,'HP cartrdge model 1'),(2,'HP cartrdge model 2'),(3,'HP cartrdge model 3'),(4,'HP cartrdge model 4');
/*!40000 ALTER TABLE `cartridge_model` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cartridge_status`
--

DROP TABLE IF EXISTS `cartridge_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `cartridge_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cartridge_status`
--

LOCK TABLES `cartridge_status` WRITE;
/*!40000 ALTER TABLE `cartridge_status` DISABLE KEYS */;
INSERT INTO `cartridge_status` VALUES (1,'Полный'),(2,'Установлен'),(3,'Пустой'),(4,'Заправляется');
/*!40000 ALTER TABLE `cartridge_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `inventory` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `inventory_name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `inventory_name_UNIQUE` (`inventory_name`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory`
--

LOCK TABLES `inventory` WRITE;
/*!40000 ALTER TABLE `inventory` DISABLE KEYS */;
INSERT INTO `inventory` VALUES (3,'ин1'),(11,'ин10'),(15,'ин13'),(16,'ин14'),(14,'ин18'),(13,'ин19'),(1,'ин1_'),(2,'ин2'),(19,'ин25'),(5,'ин4'),(17,'ин41'),(18,'ин42'),(20,'ин43'),(6,'ин5'),(7,'ин6'),(4,'принтер ин1'),(8,'принтер ин2'),(9,'принтер ин3'),(10,'принтер ин4'),(12,'принтер ин5');
/*!40000 ALTER TABLE `inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loading`
--

DROP TABLE IF EXISTS `loading`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `loading` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `loading_order_name` varchar(45) NOT NULL,
  `loading_status_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `loading_order_name_UNIQUE` (`loading_order_name`),
  KEY `loading__user_idx` (`user_id`),
  KEY `loading__status_idx` (`loading_status_id`),
  CONSTRAINT `loading__status` FOREIGN KEY (`loading_status_id`) REFERENCES `loading_status` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `loading__user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loading`
--

LOCK TABLES `loading` WRITE;
/*!40000 ALTER TABLE `loading` DISABLE KEYS */;
INSERT INTO `loading` VALUES (1,'2019-03-24',1,'sDD',1),(2,'2019-02-24',1,'asasdasd',1),(3,'2019-02-24',1,'asasdasd2',1),(4,'2019-02-24',1,'ad',2),(5,'2019-02-25',1,'заправка 4',2);
/*!40000 ALTER TABLE `loading` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loading_status`
--

DROP TABLE IF EXISTS `loading_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `loading_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `loading_status` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `loading_status_UNIQUE` (`loading_status`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loading_status`
--

LOCK TABLES `loading_status` WRITE;
/*!40000 ALTER TABLE `loading_status` DISABLE KEYS */;
INSERT INTO `loading_status` VALUES (2,'closed'),(1,'open');
/*!40000 ALTER TABLE `loading_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES ('m000000_000000_base',1550654513),('m140506_102106_rbac_init',1551183298),('m170907_052038_rbac_add_index_on_auth_assignment_user_id',1551183298),('m180523_151638_rbac_updates_indexes_without_prefix',1551183298),('m190226_120038_create_rbac_data',1551183513);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Table structure for table `order_status`
--

DROP TABLE IF EXISTS `order_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `order_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `status_zayavok_UNIQUE` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_status`
--

LOCK TABLES `order_status` WRITE;
/*!40000 ALTER TABLE `order_status` DISABLE KEYS */;
INSERT INTO `order_status` VALUES (2,'закрыта'),(1,'открыта');
/*!40000 ALTER TABLE `order_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `printer`
--

DROP TABLE IF EXISTS `printer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `printer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `printer_model_id` int(10) unsigned DEFAULT NULL,
  `inventory_name_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `printer_model_id_idx` (`printer_model_id`),
  KEY `inventory_id_idx` (`inventory_name_id`),
  CONSTRAINT `printer__inventory` FOREIGN KEY (`inventory_name_id`) REFERENCES `inventory` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `printer__printer_model` FOREIGN KEY (`printer_model_id`) REFERENCES `printer_model` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `printer`
--

LOCK TABLES `printer` WRITE;
/*!40000 ALTER TABLE `printer` DISABLE KEYS */;
INSERT INTO `printer` VALUES (1,1,4),(2,2,8),(3,3,9),(4,4,10),(5,1,12);
/*!40000 ALTER TABLE `printer` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Table structure for table `printer_model`
--

DROP TABLE IF EXISTS `printer_model`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `printer_model` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `printer_model` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `printer_model`
--

LOCK TABLES `printer_model` WRITE;
/*!40000 ALTER TABLE `printer_model` DISABLE KEYS */;
INSERT INTO `printer_model` VALUES (1,'HP model 1'),(2,'HP model 2'),(3,'HP model 3'),(4,'CANNON printer 1'),(5,'CANNON printer 2'),(6,'CYOCERA model 1');
/*!40000 ALTER TABLE `printer_model` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `status` smallint(6) unsigned NOT NULL,
  `created_at` int(11) unsigned NOT NULL,
  `updated_at` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin_','znMciaHnrNfrU_za_dwHr1bNpt479djJ','$2y$13$.sSTgfgjpQSJ4zlySCovuuUjssIxJGetG0adbZZZqwtqOkK5/eWPa',NULL,'xsepa@mail.ru_',10,0,NULL),(2,'admin','10YuMvU-1juPJiL-Fu_5rnsW-m6YvJ8n','$2y$13$VwLaD0LsomMyQJbdchl1.u16wakotxSqUAbN2RGiXWk/MRKIHbbcu',NULL,'xsepa@mail.ru',10,1550658176,NULL),(3,'user','g9YGMRDf-3CjuvSY4drvJRUAze9Bxre-','$2y$13$X9nLUkvC4GvlgzwfMSZOE.W/0NKiD5/VeOS8HV8nzkcfojFcWei3m',NULL,'user@basic.lo',10,1550658499,NULL),(4,'user2','TScHNpGdN4AaMrvN-TYHlLXBUjUbIPuH','$2y$13$0jlhbC9opUsIz6GVFcEo4OTbv5EPdyhDVlv8Owz08eK0/BylXATQu',NULL,'user2@user2.ru',10,1551172454,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-02-27 13:54:41
