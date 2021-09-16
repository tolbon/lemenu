CREATE DATABASE  IF NOT EXISTS "lemenu" /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `lemenu`;
-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: lemenu
-- ------------------------------------------------------
-- Server version	5.7.35

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `allergy`
--

DROP TABLE IF EXISTS `allergy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `allergy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UIDX_allergyname` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `allergy`
--

LOCK TABLES `allergy` WRITE;
/*!40000 ALTER TABLE `allergy` DISABLE KEYS */;
INSERT INTO `allergy` VALUES (1,'peanut','peanut'),(2,'celery','celery'),(3,'shellfish','shellfish'),(4,'nut','nut'),(5,'gluten','gluten'),(6,'lactose','lactose'),(7,'lupine','lupine'),(8,'mollusc','mollusc'),(9,'mustard','mustard'),(10,'egg','egg'),(11,'fish','fish'),(12,'sesame','sesame'),(13,'soy','soy'),(14,'sulphites','sulphites');
/*!40000 ALTER TABLE `allergy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `diet`
--

DROP TABLE IF EXISTS `diet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `diet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UIDX_dietname` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `diet`
--

LOCK TABLES `diet` WRITE;
/*!40000 ALTER TABLE `diet` DISABLE KEYS */;
INSERT INTO `diet` VALUES (1,'DiabeticDiet','A diet appropriate for people with diabetes.'),(2,'GlutenFreeDiet','A diet exclusive of gluten.'),(3,'HalalDiet','A diet conforming to Islamic dietary practices.'),(4,'HinduDiet','A diet conforming to Hindu dietary practices, in particular, beef-free.'),(5,'KosherDiet','A diet conforming to Jewish dietary practices'),(6,'LowCalorieDiet','A diet focused on reduced calorie intake'),(7,'LowFatDiet','A diet focused on reduced fat and cholesterol intake'),(8,'LowLactoseDiet','A diet appropriate for people with lactose intolerance'),(9,'LowSaltDiet','A diet focused on reduced sodium intake'),(10,'VeganDiet','A diet exclusive of all animal products'),(11,'VegetarianDiet','A diet exclusive of animal meat'),(12,'PorkFreeDiet','No pork'),(13,'AlcoholFreeDiet','No alcohol');
/*!40000 ALTER TABLE `diet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20210725225238','2021-07-26 00:53:17',553),('DoctrineMigrations\\Version20210726143739','2021-07-26 14:37:49',1770);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ingredient`
--

DROP TABLE IF EXISTS `ingredient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ingredient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingredient`
--

LOCK TABLES `ingredient` WRITE;
/*!40000 ALTER TABLE `ingredient` DISABLE KEYS */;
INSERT INTO `ingredient` VALUES (1,'chicken'),(2,'cow'),(6,'paste'),(4,'potato'),(5,'rice'),(3,'steak');
/*!40000 ALTER TABLE `ingredient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ingredient_tag`
--

DROP TABLE IF EXISTS `ingredient_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ingredient_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingredient_tag`
--

LOCK TABLES `ingredient_tag` WRITE;
/*!40000 ALTER TABLE `ingredient_tag` DISABLE KEYS */;
INSERT INTO `ingredient_tag` VALUES (19,'meet','viande'),(20,'peanut','peanut'),(21,'celery','celery'),(22,'shellfish','shellfish'),(23,'nut','nut'),(24,'gluten','gluten'),(25,'lactose','lactose'),(26,'lupine','lupine'),(27,'mollusc','mollusc'),(28,'mustard','mustard'),(29,'egg','egg'),(30,'fish','fish'),(31,'sesame','sesame'),(32,'soy','soy'),(33,'sulphites','sulphites'),(34,'pork','pork'),(35,'alcohol','alcohol');
/*!40000 ALTER TABLE `ingredient_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ingredient_tag_ingredient`
--

DROP TABLE IF EXISTS `ingredient_tag_ingredient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ingredient_tag_ingredient` (
  `ingredient_tag_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  PRIMARY KEY (`ingredient_tag_id`,`ingredient_id`),
  KEY `IDX_A003A3A056A8A350` (`ingredient_tag_id`),
  KEY `IDX_A003A3A0933FE08C` (`ingredient_id`),
  CONSTRAINT `FK_A003A3A056A8A350` FOREIGN KEY (`ingredient_tag_id`) REFERENCES `ingredient_tag` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_A003A3A0933FE08C` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredient` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingredient_tag_ingredient`
--

LOCK TABLES `ingredient_tag_ingredient` WRITE;
/*!40000 ALTER TABLE `ingredient_tag_ingredient` DISABLE KEYS */;
/*!40000 ALTER TABLE `ingredient_tag_ingredient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `label_menu_item`
--

DROP TABLE IF EXISTS `label_menu_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `label_menu_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UIDX_labelmenuitem_name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `label_menu_item`
--

LOCK TABLES `label_menu_item` WRITE;
/*!40000 ALTER TABLE `label_menu_item` DISABLE KEYS */;
INSERT INTO `label_menu_item` VALUES (1,'eurofeuille','eurofeuille'),(2,'AB FR','AB FR'),(3,'Bio Cohérence','Bio Cohérence'),(4,'homemade','homemade');
/*!40000 ALTER TABLE `label_menu_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `label_restaurant`
--

DROP TABLE IF EXISTS `label_restaurant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `label_restaurant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UIDX_labelresto_name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `label_restaurant`
--

LOCK TABLES `label_restaurant` WRITE;
/*!40000 ALTER TABLE `label_restaurant` DISABLE KEYS */;
/*!40000 ALTER TABLE `label_restaurant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `restaurant_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activate` tinyint(1) NOT NULL,
  `url_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insert_date_db` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '(DC2Type:datetimetz_immutable)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UIDX_restaurantId_name` (`restaurant_id`,`name`),
  UNIQUE KEY `UIDX_restaurantId_slug` (`restaurant_id`,`url_slug`,`activate`),
  CONSTRAINT `FK_7D053A93B1E7706E` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (2,1,'Menu','Menu du 22/07/2021',1,'menu','2021-07-25 21:34:49'),(3,2,'Menu Ô$phɵǒrœ ȘỚỸßØå','Ô$phɵǒrœ ȘỚỸßØå',1,'menu-osphore','2021-07-25 21:34:49'),(4,2,'Menu2',' ',0,'menu2','2021-07-25 21:34:49');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_has_menu_section`
--

DROP TABLE IF EXISTS `menu_has_menu_section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu_has_menu_section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `menu_section_parent_id` int(11) NOT NULL,
  `menu_section_id` int(11) NOT NULL,
  `insert_date_db` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '(DC2Type:datetime_immutable)',
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UIDX_9AEC8DF98E57A2` (`menu_id`,`menu_section_parent_id`,`position`),
  UNIQUE KEY `UIDX_79AEC8DF98E57` (`menu_id`,`menu_section_id`),
  KEY `IDX_79AEC8DCCD7E912` (`menu_id`),
  KEY `IDX_79AEC8DF98E57A8` (`menu_section_id`),
  KEY `FK_79AEC8DF98E57A8Bis_idx` (`menu_section_parent_id`),
  CONSTRAINT `FK_79AEC8DCCD7E912` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`),
  CONSTRAINT `FK_79AEC8DF98E57A8` FOREIGN KEY (`menu_section_id`) REFERENCES `menu_section` (`id`),
  CONSTRAINT `FK_79AEC8DF98E57A8Bis` FOREIGN KEY (`menu_section_parent_id`) REFERENCES `menu_section` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_has_menu_section`
--

LOCK TABLES `menu_has_menu_section` WRITE;
/*!40000 ALTER TABLE `menu_has_menu_section` DISABLE KEYS */;
INSERT INTO `menu_has_menu_section` VALUES (4,2,0,1,'2021-08-03 09:45:18',2),(5,2,1,2,'2021-08-03 09:45:18',1),(6,2,1,3,'2021-08-03 09:45:18',2),(7,2,0,4,'2021-08-05 10:06:48',1);
/*!40000 ALTER TABLE `menu_has_menu_section` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_item`
--

DROP TABLE IF EXISTS `menu_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price1` float DEFAULT NULL,
  `price2` float DEFAULT NULL,
  `price3` float DEFAULT NULL,
  `restaurant_id` int(11) NOT NULL,
  `insert_date_db` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '(DC2Type:datetimetz_immutable)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UIDX_restaurantId_name` (`restaurant_id`,`name`),
  KEY `IDX_D754D550B1E7706E` (`restaurant_id`),
  CONSTRAINT `FK_D754D550B1E7706E` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_item`
--

LOCK TABLES `menu_item` WRITE;
/*!40000 ALTER TABLE `menu_item` DISABLE KEYS */;
INSERT INTO `menu_item` VALUES (1,'CLASSIC','Boeuf, comté affiné 18 mois, laitue iceberg,',9.4,NULL,NULL,1,'2021-07-25 21:33:18'),(2,'WALLACE','Boeuf, blue stilton, bacon de boeuf,',9.4,NULL,NULL,1,'2021-07-25 21:33:18'),(3,'Rosa (Végétarien)','Poivrons grillés, aubergines grillées, gros champignon',8.4,NULL,NULL,1,'2021-07-25 21:33:18'),(5,'CHAMPIGNON PORTOBELLO','Un champignon frais, snacké à la plancha.',NULL,NULL,NULL,1,'2021-07-25 21:33:18'),(6,'STEAK VEGAN BEYOND MEAT','Un steak surprenant de légumes, protéiné, sans gluten et sans OGM',2.5,NULL,NULL,1,'2021-07-25 21:33:18'),(7,'Doublez votre viande ou ?',' ajoutez du ? ou du bacon',10000.5,NULL,NULL,1,'2021-07-25 21:33:18'),(8,'ajoutez des ingrédients','Tomates confites, champignons caramélisés, oignons caramélisés, oignons rouges, poivrons grillés, cornichons, aubergines.',1,NULL,NULL,1,'2021-07-25 21:33:18'),(9,'Moët et Chandon','',NULL,65,120,1,'2021-08-05 10:05:30'),(10,'Cristal Louis Roederer','',NULL,NULL,280,1,'2021-08-05 10:05:30'),(11,'1664','',3,4.5,8,1,'2021-08-05 10:05:30'),(12,'Rachid','Delicieux Hamburger avec du beurre de caouette',80,NULL,NULL,1,'2021-08-05 14:59:08');
/*!40000 ALTER TABLE `menu_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_item_allergy`
--

DROP TABLE IF EXISTS `menu_item_allergy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu_item_allergy` (
  `menu_item_id` int(11) NOT NULL,
  `allergy_id` int(11) NOT NULL,
  PRIMARY KEY (`menu_item_id`,`allergy_id`),
  KEY `IDX_BFEE95449AB44FE0` (`menu_item_id`),
  KEY `IDX_BFEE9544DBFD579D` (`allergy_id`),
  CONSTRAINT `FK_BFEE95449AB44FE0` FOREIGN KEY (`menu_item_id`) REFERENCES `menu_item` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_BFEE9544DBFD579D` FOREIGN KEY (`allergy_id`) REFERENCES `allergy` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_item_allergy`
--

LOCK TABLES `menu_item_allergy` WRITE;
/*!40000 ALTER TABLE `menu_item_allergy` DISABLE KEYS */;
INSERT INTO `menu_item_allergy` VALUES (12,1);
/*!40000 ALTER TABLE `menu_item_allergy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_item_diet`
--

DROP TABLE IF EXISTS `menu_item_diet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu_item_diet` (
  `menu_item_id` int(11) NOT NULL,
  `diet_id` int(11) NOT NULL,
  PRIMARY KEY (`menu_item_id`,`diet_id`),
  KEY `IDX_4C9446EF9AB44FE0` (`menu_item_id`),
  KEY `IDX_4C9446EFE1E13ACE` (`diet_id`),
  CONSTRAINT `FK_4C9446EF9AB44FE0` FOREIGN KEY (`menu_item_id`) REFERENCES `menu_item` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_4C9446EFE1E13ACE` FOREIGN KEY (`diet_id`) REFERENCES `diet` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_item_diet`
--

LOCK TABLES `menu_item_diet` WRITE;
/*!40000 ALTER TABLE `menu_item_diet` DISABLE KEYS */;
/*!40000 ALTER TABLE `menu_item_diet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_item_ingredient`
--

DROP TABLE IF EXISTS `menu_item_ingredient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu_item_ingredient` (
  `menu_item_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  PRIMARY KEY (`menu_item_id`,`ingredient_id`),
  KEY `IDX_EA047E5E9AB44FE0` (`menu_item_id`),
  KEY `IDX_EA047E5E933FE08C` (`ingredient_id`),
  CONSTRAINT `FK_EA047E5E933FE08C` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredient` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_EA047E5E9AB44FE0` FOREIGN KEY (`menu_item_id`) REFERENCES `menu_item` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_item_ingredient`
--

LOCK TABLES `menu_item_ingredient` WRITE;
/*!40000 ALTER TABLE `menu_item_ingredient` DISABLE KEYS */;
/*!40000 ALTER TABLE `menu_item_ingredient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_item_label_menu_item`
--

DROP TABLE IF EXISTS `menu_item_label_menu_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu_item_label_menu_item` (
  `menu_item_id` int(11) NOT NULL,
  `label_menu_item_id` int(11) NOT NULL,
  PRIMARY KEY (`menu_item_id`,`label_menu_item_id`),
  KEY `IDX_903738449AB44FE0` (`menu_item_id`),
  KEY `IDX_90373844CE81C419` (`label_menu_item_id`),
  CONSTRAINT `FK_903738449AB44FE0` FOREIGN KEY (`menu_item_id`) REFERENCES `menu_item` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_90373844CE81C419` FOREIGN KEY (`label_menu_item_id`) REFERENCES `label_menu_item` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_item_label_menu_item`
--

LOCK TABLES `menu_item_label_menu_item` WRITE;
/*!40000 ALTER TABLE `menu_item_label_menu_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `menu_item_label_menu_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_item_tag`
--

DROP TABLE IF EXISTS `menu_item_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu_item_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_item_tag`
--

LOCK TABLES `menu_item_tag` WRITE;
/*!40000 ALTER TABLE `menu_item_tag` DISABLE KEYS */;
INSERT INTO `menu_item_tag` VALUES (1,'meet','viande'),(2,'peanut','peanut'),(3,'celery','celery'),(4,'shellfish','shellfish'),(5,'nut','nut'),(6,'gluten','gluten'),(7,'lactose','lactose'),(8,'lupine','lupine'),(9,'mollusc','mollusc'),(10,'mustard','mustard'),(11,'egg','egg'),(12,'fish','fish'),(13,'sesame','sesame'),(14,'soy','soy'),(15,'sulphites','sulphites'),(16,'pork','pork'),(17,'alcohol','alcohol'),(32,'bio','bio'),(33,'homemade','homemade');
/*!40000 ALTER TABLE `menu_item_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_item_tag_menu_item`
--

DROP TABLE IF EXISTS `menu_item_tag_menu_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu_item_tag_menu_item` (
  `menu_item_tag_id` int(11) NOT NULL,
  `menu_item_id` int(11) NOT NULL,
  PRIMARY KEY (`menu_item_tag_id`,`menu_item_id`),
  KEY `IDX_E3EE59FA54D70892` (`menu_item_tag_id`),
  KEY `IDX_E3EE59FA9AB44FE0` (`menu_item_id`),
  CONSTRAINT `FK_E3EE59FA54D70892` FOREIGN KEY (`menu_item_tag_id`) REFERENCES `menu_item_tag` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_E3EE59FA9AB44FE0` FOREIGN KEY (`menu_item_id`) REFERENCES `menu_item` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_item_tag_menu_item`
--

LOCK TABLES `menu_item_tag_menu_item` WRITE;
/*!40000 ALTER TABLE `menu_item_tag_menu_item` DISABLE KEYS */;
INSERT INTO `menu_item_tag_menu_item` VALUES (1,1),(1,2),(7,1),(7,2),(16,2);
/*!40000 ALTER TABLE `menu_item_tag_menu_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_menu_section`
--

DROP TABLE IF EXISTS `menu_menu_section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu_menu_section` (
  `menu_id` int(11) NOT NULL,
  `menu_section_id` int(11) NOT NULL,
  PRIMARY KEY (`menu_id`,`menu_section_id`),
  KEY `IDX_DAAA96F4CCD7E912` (`menu_id`),
  KEY `IDX_DAAA96F4F98E57A8` (`menu_section_id`),
  CONSTRAINT `FK_DAAA96F4CCD7E912` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_DAAA96F4F98E57A8` FOREIGN KEY (`menu_section_id`) REFERENCES `menu_section` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_menu_section`
--

LOCK TABLES `menu_menu_section` WRITE;
/*!40000 ALTER TABLE `menu_menu_section` DISABLE KEYS */;
INSERT INTO `menu_menu_section` VALUES (2,1);
/*!40000 ALTER TABLE `menu_menu_section` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_section`
--

DROP TABLE IF EXISTS `menu_section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu_section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price1` float DEFAULT NULL,
  `price2` float DEFAULT NULL,
  `price3` float DEFAULT NULL,
  `display_currency_symbol_on_title` tinyint(1) NOT NULL,
  `display_currency_symbol_on_children` tinyint(1) NOT NULL,
  `display_description_after_children` tinyint(1) NOT NULL,
  `display_children_section_after_menuItems` tinyint(1) NOT NULL,
  `insert_date_db` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '(DC2Type:datetimetz_immutable)',
  `restaurant_id` int(11) NOT NULL,
  `title_price1` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_price2` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_price3` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_A5A86751F98E5754_idx` (`restaurant_id`),
  CONSTRAINT `FK_A5A86751F98E5754` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_section`
--

LOCK TABLES `menu_section` WRITE;
/*!40000 ALTER TABLE `menu_section` DISABLE KEYS */;
INSERT INTO `menu_section` VALUES (0,'Root','root',NULL,NULL,NULL,0,0,0,0,'2021-08-05 11:27:35',0,NULL,NULL,NULL),(1,'Burger','Nos viandes* sont cuites à point, n’hésitez pas à préciser votre cuisson !',NULL,NULL,NULL,0,1,0,0,'2021-07-25 21:35:26',1,NULL,NULL,NULL),(2,' ENVIE D\'UN VÉGÉ ?','2 CHOIX POUR REMPLACER NOTRE STEAK :',NULL,NULL,NULL,0,1,0,0,'2021-07-25 21:35:26',1,NULL,NULL,NULL),(3,'→ une grosse faim ?',' ',NULL,NULL,NULL,0,1,0,0,'2021-07-25 21:35:26',1,NULL,NULL,NULL),(4,'Carte des Vins','',NULL,NULL,NULL,0,1,0,0,'2021-08-05 10:02:09',1,'25Cl','50Cl','75 cl');
/*!40000 ALTER TABLE `menu_section` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_section_menu_item`
--

DROP TABLE IF EXISTS `menu_section_menu_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu_section_menu_item` (
  `menu_section_id` int(11) NOT NULL,
  `menu_item_id` int(11) NOT NULL,
  PRIMARY KEY (`menu_section_id`,`menu_item_id`),
  KEY `IDX_982775A6F98E57A8` (`menu_section_id`),
  KEY `IDX_982775A69AB44FE0` (`menu_item_id`),
  CONSTRAINT `FK_982775A69AB44FE0` FOREIGN KEY (`menu_item_id`) REFERENCES `menu_item` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_982775A6F98E57A8` FOREIGN KEY (`menu_section_id`) REFERENCES `menu_section` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_section_menu_item`
--

LOCK TABLES `menu_section_menu_item` WRITE;
/*!40000 ALTER TABLE `menu_section_menu_item` DISABLE KEYS */;
INSERT INTO `menu_section_menu_item` VALUES (1,1),(1,2),(1,3),(1,12),(2,5),(2,6),(3,7),(3,8),(4,9),(4,10),(4,11);
/*!40000 ALTER TABLE `menu_section_menu_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `restaurant`
--

DROP TABLE IF EXISTS `restaurant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'EUR',
  `activate` tinyint(1) NOT NULL,
  `url_slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `url_slug_UNIQUE` (`url_slug`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `restaurant`
--

LOCK TABLES `restaurant` WRITE;
/*!40000 ALTER TABLE `restaurant` DISABLE KEYS */;
INSERT INTO `restaurant` VALUES (0,'LeMenuInternal','InternalRestaurant Not Visible','EUR',0,'menuinternals',NULL,NULL),(1,'Rosaparks','ROSAPARKS TROYES','EUR',1,'rosaparks','',''),(2,'Le BÔ$phɵǒrœ ȘỚỸßØå','Kébab Frêre Ô$phɵǒrœ ȘỚỸßØå','EUR',1,'bosphore','','');
/*!40000 ALTER TABLE `restaurant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `restaurant_label_restaurant`
--

DROP TABLE IF EXISTS `restaurant_label_restaurant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `restaurant_label_restaurant` (
  `restaurant_id` int(11) NOT NULL,
  `label_restaurant_id` int(11) NOT NULL,
  PRIMARY KEY (`restaurant_id`,`label_restaurant_id`),
  KEY `IDX_77B1A7B8B1E7706E` (`restaurant_id`),
  KEY `IDX_77B1A7B875D20F5D` (`label_restaurant_id`),
  CONSTRAINT `FK_77B1A7B875D20F5D` FOREIGN KEY (`label_restaurant_id`) REFERENCES `label_restaurant` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_77B1A7B8B1E7706E` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `restaurant_label_restaurant`
--

LOCK TABLES `restaurant_label_restaurant` WRITE;
/*!40000 ALTER TABLE `restaurant_label_restaurant` DISABLE KEYS */;
/*!40000 ALTER TABLE `restaurant_label_restaurant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'jb@gmail.com','[\"ROLE_USER\"]','$2y$13$4GKfmJD/tr8xLyMnMKW3p.JWqUEBk7ih.lc//4Wtafw8ifHFjaVLy'),(2,'alex@gmail.com','[\"ROLE_USER\"]','$2y$13$609jBuub76kCBvkNjDjymuLIjPNeuOiuHzmETwyh5woRKuuQJtod.');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_allergy`
--

DROP TABLE IF EXISTS `user_allergy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_allergy` (
  `user_id` int(11) NOT NULL,
  `allergy_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`allergy_id`),
  KEY `IDX_93BC5CBFA76ED395` (`user_id`),
  KEY `IDX_93BC5CBFDBFD579D` (`allergy_id`),
  CONSTRAINT `FK_93BC5CBFA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_93BC5CBFDBFD579D` FOREIGN KEY (`allergy_id`) REFERENCES `allergy` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_allergy`
--

LOCK TABLES `user_allergy` WRITE;
/*!40000 ALTER TABLE `user_allergy` DISABLE KEYS */;
INSERT INTO `user_allergy` VALUES (2,1);
/*!40000 ALTER TABLE `user_allergy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_diet`
--

DROP TABLE IF EXISTS `user_diet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_diet` (
  `user_id` int(11) NOT NULL,
  `diet_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`diet_id`),
  KEY `IDX_E76529E9A76ED395` (`user_id`),
  KEY `IDX_E76529E9E1E13ACE` (`diet_id`),
  CONSTRAINT `FK_E76529E9A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_E76529E9E1E13ACE` FOREIGN KEY (`diet_id`) REFERENCES `diet` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_diet`
--

LOCK TABLES `user_diet` WRITE;
/*!40000 ALTER TABLE `user_diet` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_diet` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-08-06 16:55:37
