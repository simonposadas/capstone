-- MySQL dump 10.13  Distrib 5.7.20, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: capstone
-- ------------------------------------------------------
-- Server version	5.7.20

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
-- Table structure for table `budget_form`
--

DROP TABLE IF EXISTS `budget_form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `budget_form` (
  `budget_id` int(11) NOT NULL AUTO_INCREMENT,
  `reserve_id` int(11) NOT NULL,
  `description` varchar(45) NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`budget_id`),
  KEY `budget_fk1_idx` (`reserve_id`),
  CONSTRAINT `budget_fk1` FOREIGN KEY (`reserve_id`) REFERENCES `reservation_details` (`reserv_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `budget_form`
--

LOCK TABLES `budget_form` WRITE;
/*!40000 ALTER TABLE `budget_form` DISABLE KEYS */;
/*!40000 ALTER TABLE `budget_form` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_info`
--

DROP TABLE IF EXISTS `customer_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_info` (
  `cust_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_fname` varchar(45) NOT NULL,
  `cust_lname` varchar(45) NOT NULL,
  `gender` char(1) DEFAULT NULL,
  `contNo` varchar(15) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `reserve_id` int(11) DEFAULT NULL,
  `address` varchar(191) NOT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_info`
--

LOCK TABLES `customer_info` WRITE;
/*!40000 ALTER TABLE `customer_info` DISABLE KEYS */;
INSERT INTO `customer_info` VALUES (48,'Darryl','Milan','M','09490090214','darryl.milan0401@gmail.com',NULL,'406 L. Cerrero street, Macamot, Binangonan, Rizal'),(49,'Darryl','Milan','M','09490090214','darryl.milan0401@gmail.com',NULL,'406 L. Cerrero street, Macamot, Binangonan, Rizal'),(50,'Darryl','Milan','M','09490090214','darryl.milan0401@gmail.com',NULL,'406 L. Cerrero street, Macamot, Binangonan, Rizal'),(51,'Emrech','Presa','M','09235859322','darryl.milan0401@gmail.com',NULL,'406 L. Cerrero street, Macamot, Binangonan, Rizal');
/*!40000 ALTER TABLE `customer_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipment`
--

DROP TABLE IF EXISTS `equipment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipment` (
  `equipment_id` int(11) NOT NULL AUTO_INCREMENT,
  `equipment_name` varchar(50) NOT NULL,
  `cost` float NOT NULL,
  `quantity` int(5) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`equipment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipment`
--

LOCK TABLES `equipment` WRITE;
/*!40000 ALTER TABLE `equipment` DISABLE KEYS */;
INSERT INTO `equipment` VALUES (12,'Chair',100,80,0),(13,'Table',100,90,0),(17,'Plates',80,150,0),(18,'Spoon',10,400,0);
/*!40000 ALTER TABLE `equipment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_details`
--

DROP TABLE IF EXISTS `event_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event_details` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_type` varchar(20) DEFAULT NULL,
  `place` varchar(191) NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_details`
--

LOCK TABLES `event_details` WRITE;
/*!40000 ALTER TABLE `event_details` DISABLE KEYS */;
INSERT INTO `event_details` VALUES (6,'wedding',''),(7,'wedding','QC'),(8,'wedding','QC'),(9,'wedding','QC'),(10,'wedding','QC'),(11,'wedding','QC'),(12,'wedding','QC'),(13,'wedding','QC'),(14,'wedding','Quezon City Palace'),(15,'wedding','Quezon City Palace Square'),(16,'wedding','Madison Square Garden'),(17,'bday','QC'),(18,'bday','Bahay'),(19,'wedding','asdfas'),(20,'wedding','dadasd'),(21,'wedding','Manila Hotel'),(22,'wedding','sadfasf'),(23,'wedding','asdfasdf'),(24,'wedding','asdfasdf'),(25,'wedding','fasdfasdf'),(26,'wedding','malayo'),(27,'wedding','fasdfasd'),(28,'wedding','fsafdasd'),(29,'wedding','fasfasdfsf'),(30,'wedding','asdfasdf'),(31,'wedding','fasdfsad'),(32,'wedding','fasdfsad'),(33,'wedding','fasdfsad'),(34,'wedding','fasdfsad'),(35,'wedding','fasdfasd'),(36,'wedding','PUP'),(37,'wedding','fasfasfdasf'),(38,'wedding','fasfasfdasf'),(39,'wedding','hell'),(40,'wedding',';k;lskdfa'),(41,'wedding','Marikina'),(42,'wedding','Binangonan'),(43,'wedding','Rizal'),(44,'wedding','Meralco Village Taytay'),(45,'wedding','Rizal'),(46,'bday','Rizal');
/*!40000 ALTER TABLE `event_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `food_details`
--

DROP TABLE IF EXISTS `food_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `food_details` (
  `food_id` int(11) NOT NULL AUTO_INCREMENT,
  `food_name` varchar(20) NOT NULL,
  `food_type_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `price` float NOT NULL,
  `recipe_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`food_id`),
  KEY `food_type_id` (`food_type_id`),
  KEY `food_details_recipefk_idx` (`recipe_id`),
  KEY `food_recipe_fk_idx` (`recipe_id`),
  CONSTRAINT `food_details_ibfk_1` FOREIGN KEY (`food_type_id`) REFERENCES `food_type` (`food_type_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `food_details`
--

LOCK TABLES `food_details` WRITE;
/*!40000 ALTER TABLE `food_details` DISABLE KEYS */;
INSERT INTO `food_details` VALUES (7,'Adobo',10,1,100,0),(8,'Trial',10,1,25,0),(9,'Adobo',10,1,700,0),(10,'Adobo',10,1,700,0),(11,'Sinigangg',10,0,500,0),(12,'Bicol Express',10,0,2450,0),(26,'Mushroom soup',2,0,0,0),(27,'Adobo',10,0,420,0),(28,'Buko Salad',2,1,0,0),(29,'Buko Salad',12,1,0,0),(30,'Buko Salad',12,1,0,0),(31,'Buko Salad',12,1,0,0),(32,'Buko Salad',12,1,0,0),(33,'Pork Nilaga',10,0,2820,0),(34,'Pork Nilaga',10,1,0,0),(35,'Menudo',10,0,1640,0),(36,'Chicken Soup',2,0,2200,0),(37,'Chicken Soup',2,1,0,0),(38,'Fruit Salad',12,0,500,0),(39,'Macapuno',12,0,220,0),(40,'Ham & Cheese',11,0,360,0);
/*!40000 ALTER TABLE `food_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `food_recipe`
--

DROP TABLE IF EXISTS `food_recipe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `food_recipe` (
  `food_Product_Id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `unit_cost` double NOT NULL,
  `price_sold` double NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`food_Product_Id`,`recipe_id`),
  KEY `recipe_id_FK_idx` (`recipe_id`),
  CONSTRAINT `recipe_id_FK` FOREIGN KEY (`recipe_id`) REFERENCES `recipe_list_tbl` (`recipe_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `food_recipe`
--

LOCK TABLES `food_recipe` WRITE;
/*!40000 ALTER TABLE `food_recipe` DISABLE KEYS */;
INSERT INTO `food_recipe` VALUES (10,1,35,35,20),(11,1,35,35,3),(11,5,120,120,5),(13,1,35,35,30),(13,3,35,35,40),(22,1,35,35,70),(22,2,80,80,40),(27,1,35,35,12),(33,1,35,35,12),(33,2,80,80,12),(33,6,120,120,12),(35,1,35,35,15),(35,6,120,120,5),(35,8,15,15,10),(35,9,20,20,2),(35,10,15,15,15),(35,11,10,10,10),(36,1,35,35,10),(36,2,80,80,10),(36,3,35,35,10),(36,5,120,120,5),(36,9,20,20,5),(38,9,20,20,10),(38,11,10,10,10),(38,13,200,200,1),(39,7,12,12,10),(39,14,50,50,2),(40,16,70,70,3),(40,17,50,50,3),(41,1,35,35,5),(41,2,80,80,5);
/*!40000 ALTER TABLE `food_recipe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `food_type`
--

DROP TABLE IF EXISTS `food_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `food_type` (
  `food_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `food_type_name` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`food_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `food_type`
--

LOCK TABLES `food_type` WRITE;
/*!40000 ALTER TABLE `food_type` DISABLE KEYS */;
INSERT INTO `food_type` VALUES (2,'Soup',0),(10,'Main Entree',0),(11,'Appetizer',0),(12,'Salad',0);
/*!40000 ALTER TABLE `food_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice_table`
--

DROP TABLE IF EXISTS `invoice_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoice_table` (
  `invoice_ID` int(11) NOT NULL,
  `total_Amount` double NOT NULL,
  `vat` double NOT NULL,
  `employee_budget` double NOT NULL,
  `equipment_budget` double NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`invoice_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice_table`
--

LOCK TABLES `invoice_table` WRITE;
/*!40000 ALTER TABLE `invoice_table` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoice_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `multi_worker`
--

DROP TABLE IF EXISTS `multi_worker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `multi_worker` (
  `worker_id` int(11) NOT NULL,
  `reserve_id` int(11) NOT NULL,
  KEY `multi_fk1_idx` (`worker_id`),
  KEY `multi_workerfk2_idx` (`reserve_id`),
  CONSTRAINT `multi_workerfk1` FOREIGN KEY (`worker_id`) REFERENCES `worker` (`worker_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `multi_workerfk2` FOREIGN KEY (`reserve_id`) REFERENCES `reservation_details` (`reserv_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `multi_worker`
--

LOCK TABLES `multi_worker` WRITE;
/*!40000 ALTER TABLE `multi_worker` DISABLE KEYS */;
/*!40000 ALTER TABLE `multi_worker` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `reserv_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `order_fk1_idx` (`reserv_id`),
  KEY `order_fk2_idx` (`food_id`),
  CONSTRAINT `order_fk1` FOREIGN KEY (`reserv_id`) REFERENCES `reservation_details` (`reserv_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `order_fk2` FOREIGN KEY (`food_id`) REFERENCES `food_details` (`food_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_details`
--

LOCK TABLES `order_details` WRITE;
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `package_details`
--

DROP TABLE IF EXISTS `package_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `package_details` (
  `package_id` int(11) NOT NULL AUTO_INCREMENT,
  `package_name` varchar(50) NOT NULL,
  `package_price` double NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `package_type_id` int(10) unsigned NOT NULL COMMENT 'Package type foreign key',
  PRIMARY KEY (`package_id`),
  KEY `package_details_package_type_id_foreign` (`package_type_id`),
  CONSTRAINT `package_details_package_type_id_foreign` FOREIGN KEY (`package_type_id`) REFERENCES `package_type` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `package_details`
--

LOCK TABLES `package_details` WRITE;
/*!40000 ALTER TABLE `package_details` DISABLE KEYS */;
INSERT INTO `package_details` VALUES (1,'Package 1',500,0,1);
/*!40000 ALTER TABLE `package_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `package_food`
--

DROP TABLE IF EXISTS `package_food`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `package_food` (
  `package_id` int(11) NOT NULL,
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `desc` text NOT NULL COMMENT 'Package details menu',
  `price` double NOT NULL,
  PRIMARY KEY (`id`,`package_id`),
  KEY `package_id` (`package_id`),
  CONSTRAINT `package_food_ibfk_1` FOREIGN KEY (`package_id`) REFERENCES `package_details` (`package_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `package_food`
--

LOCK TABLES `package_food` WRITE;
/*!40000 ALTER TABLE `package_food` DISABLE KEYS */;
INSERT INTO `package_food` VALUES (1,1,'',0),(1,2,'Pumpkin Soup / Mushroom Soup / Nido Soup / Creamy Vegetable Soup',0);
/*!40000 ALTER TABLE `package_food` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `package_type`
--

DROP TABLE IF EXISTS `package_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `package_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `package_type`
--

LOCK TABLES `package_type` WRITE;
/*!40000 ALTER TABLE `package_type` DISABLE KEYS */;
INSERT INTO `package_type` VALUES (1,'Wedding Buffet Menu'),(2,'Merienda Menu');
/*!40000 ALTER TABLE `package_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `packages_view`
--

DROP TABLE IF EXISTS `packages_view`;
/*!50001 DROP VIEW IF EXISTS `packages_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `packages_view` AS SELECT 
 1 AS `package_id`,
 1 AS `package_name`,
 1 AS `package_price`,
 1 AS `status`,
 1 AS `package_type_id`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `payment_settlement`
--

DROP TABLE IF EXISTS `payment_settlement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_settlement` (
  `invoice_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `amount_used` double NOT NULL,
  `change` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`invoice_id`,`payment_id`),
  CONSTRAINT `invoice_ID_FK` FOREIGN KEY (`invoice_id`) REFERENCES `reservation_details` (`reserv_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_settlement`
--

LOCK TABLES `payment_settlement` WRITE;
/*!40000 ALTER TABLE `payment_settlement` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment_settlement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_tbl`
--

DROP TABLE IF EXISTS `payment_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_tbl` (
  `payment_ID` int(11) NOT NULL AUTO_INCREMENT,
  `amount` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`payment_ID`),
  UNIQUE KEY `payment_ID_UNIQUE` (`payment_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_tbl`
--

LOCK TABLES `payment_tbl` WRITE;
/*!40000 ALTER TABLE `payment_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recipe_list_tbl`
--

DROP TABLE IF EXISTS `recipe_list_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recipe_list_tbl` (
  `recipe_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `initial_Price` double NOT NULL,
  PRIMARY KEY (`recipe_id`),
  UNIQUE KEY `recipe_id_UNIQUE` (`recipe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipe_list_tbl`
--

LOCK TABLES `recipe_list_tbl` WRITE;
/*!40000 ALTER TABLE `recipe_list_tbl` DISABLE KEYS */;
INSERT INTO `recipe_list_tbl` VALUES (1,'Carrot',35),(2,'Cabbage',80),(3,'Young Corn',35),(5,'Chicken Product',120),(6,'Pork',120),(7,'Buko',12),(8,'Liver Spread',15),(9,'Cream',20),(10,'Potato',15),(11,'Raisins',10),(12,'Garlic',50),(13,'Fruit Cocktail',200),(14,'Sugar',50),(16,'Ham',70),(17,'Cheese',50);
/*!40000 ALTER TABLE `recipe_list_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservation_details`
--

DROP TABLE IF EXISTS `reservation_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservation_details` (
  `reserv_id` int(11) NOT NULL AUTO_INCREMENT,
  `reserv_guestNo` varchar(45) NOT NULL,
  `cust_budget` int(11) DEFAULT NULL,
  `bud_food` int(11) DEFAULT NULL,
  `bud_equip` int(11) DEFAULT NULL,
  `bud_worker` int(11) DEFAULT NULL,
  `cust_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `addOn_id` int(11) DEFAULT NULL,
  `reserv_date` date NOT NULL,
  `reserv_time` time NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `package_id` int(11) NOT NULL,
  `disapprove_reason` text COMMENT 'The reason of admin for disapproving the reservation',
  `total_pay` int(11) DEFAULT NULL,
  `receipt_no` varchar(45) DEFAULT NULL,
  `amount_paid` int(11) DEFAULT NULL,
  PRIMARY KEY (`reserv_id`),
  KEY `reserve_fk5_idx` (`cust_id`),
  KEY `reservation_details_event_id_foreign` (`event_id`),
  KEY `reservation_details_package_id_foreign` (`package_id`),
  CONSTRAINT `reservation_details_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `event_details` (`event_id`) ON DELETE CASCADE,
  CONSTRAINT `reservation_details_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `package_details` (`package_id`) ON DELETE CASCADE,
  CONSTRAINT `reserve_fk5` FOREIGN KEY (`cust_id`) REFERENCES `customer_info` (`cust_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation_details`
--

LOCK TABLES `reservation_details` WRITE;
/*!40000 ALTER TABLE `reservation_details` DISABLE KEYS */;
INSERT INTO `reservation_details` VALUES (28,'899',100000,100000,100000,100000,48,43,NULL,'2017-11-17','09:00:00',5,1,NULL,300000,'190203',NULL),(29,'250',100000,50000,NULL,NULL,49,44,NULL,'2017-11-17','07:00:00',4,1,NULL,50000,'190203',NULL),(30,'100',100000,30000,50000,20000,50,45,NULL,'2017-10-16','09:00:00',5,1,NULL,100000,'12345',NULL),(31,'75',100000,NULL,NULL,NULL,51,46,NULL,'2017-11-23','14:00:00',0,1,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `reservation_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservation_equipments`
--

DROP TABLE IF EXISTS `reservation_equipments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservation_equipments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `reserv_id` int(11) NOT NULL COMMENT 'Reservation foreign key',
  `equipment_id` int(11) NOT NULL COMMENT 'Equipment foreign key',
  `quantity` int(11) NOT NULL COMMENT 'the number of quantity assigned in a event',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reservation_equipments_reserv_id_foreign` (`reserv_id`),
  KEY `reservation_equipments_equipment_id_foreign` (`equipment_id`),
  CONSTRAINT `reservation_equipments_equipment_id_foreign` FOREIGN KEY (`equipment_id`) REFERENCES `equipment` (`equipment_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `reservation_equipments_reserv_id_foreign` FOREIGN KEY (`reserv_id`) REFERENCES `reservation_details` (`reserv_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation_equipments`
--

LOCK TABLES `reservation_equipments` WRITE;
/*!40000 ALTER TABLE `reservation_equipments` DISABLE KEYS */;
INSERT INTO `reservation_equipments` VALUES (1,28,12,300,'2017-10-20 08:37:41','2017-10-20 08:37:41'),(2,28,13,100,'2017-10-20 08:38:09','2017-10-20 08:38:09'),(3,30,13,10,'2017-10-21 08:39:59','2017-10-21 08:39:59'),(4,30,12,120,'2017-10-21 08:40:14','2017-10-21 08:40:14');
/*!40000 ALTER TABLE `reservation_equipments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservation_workers`
--

DROP TABLE IF EXISTS `reservation_workers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservation_workers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `reserv_id` int(11) NOT NULL COMMENT 'Reservation foreign key',
  `worker_id` int(11) NOT NULL COMMENT 'Worker foreign key',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reservation_workers_reserv_id_foreign` (`reserv_id`),
  KEY `reservation_workers_worker_id_foreign` (`worker_id`),
  CONSTRAINT `reservation_workers_reserv_id_foreign` FOREIGN KEY (`reserv_id`) REFERENCES `reservation_details` (`reserv_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `reservation_workers_worker_id_foreign` FOREIGN KEY (`worker_id`) REFERENCES `worker` (`worker_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation_workers`
--

LOCK TABLES `reservation_workers` WRITE;
/*!40000 ALTER TABLE `reservation_workers` DISABLE KEYS */;
INSERT INTO `reservation_workers` VALUES (4,29,1,'2017-10-18 07:37:34','2017-10-18 07:37:34'),(5,28,2,'2017-10-18 16:41:26','2017-10-18 16:41:26'),(6,28,3,'2017-10-18 16:41:46','2017-10-18 16:41:46'),(7,28,7,'2017-10-20 08:38:40','2017-10-20 08:38:40'),(8,30,4,'2017-10-21 08:34:55','2017-10-21 08:34:55'),(9,30,5,'2017-10-21 08:35:08','2017-10-21 08:35:08'),(10,30,13,'2017-10-21 08:35:22','2017-10-21 08:35:22');
/*!40000 ALTER TABLE `reservation_workers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `worker`
--

DROP TABLE IF EXISTS `worker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `worker` (
  `worker_id` int(11) NOT NULL AUTO_INCREMENT,
  `worker_lname` varchar(20) NOT NULL,
  `worker_fname` varchar(20) NOT NULL,
  `worker_mname` varchar(20) NOT NULL,
  `worker_age` int(3) NOT NULL,
  `worker_role_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`worker_id`),
  KEY `worker_role_id` (`worker_role_id`),
  CONSTRAINT `worker_ibfk_1` FOREIGN KEY (`worker_role_id`) REFERENCES `worker_role` (`worker_role_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `worker`
--

LOCK TABLES `worker` WRITE;
/*!40000 ALTER TABLE `worker` DISABLE KEYS */;
INSERT INTO `worker` VALUES (1,'Rutherford','Irma','Koss',34,1,1),(2,'Strosin','Yasmin','Parker',18,1,0),(3,'Schultz','Amber','Mraz',31,4,0),(4,'Raynor','Cecile','Stark',31,1,0),(5,'Herzog','Kyra','Trantow',23,3,0),(6,'Quitzon','Leta','Durgan',20,5,0),(7,'Littel','Gardner','Larkin',22,2,0),(8,'Hoppe','Maxine','Okuneva',29,5,0),(9,'Hudson','Daphnee','Hackett',33,3,0),(10,'Stamm','Stephania','Ratke',20,2,0),(11,'Pagac','Trever','Lang',32,5,0),(12,'Mraz','Raleigh','Altenwerth',21,3,0),(13,'Schmeler','Alvera','Collins',24,5,0),(14,'Lesch','Palma','Johns',31,5,0),(15,'Klocko','Francis','Schumm',21,1,0),(16,'Bosco','Nelson','Volkman',23,4,0),(17,'Hahn','Lambert','Kutch',27,2,0),(18,'Schamberger','Hilbert','Shields',31,3,0),(19,'Cole','Antonietta','Prohaska',19,5,0),(20,'Rempel','Afton','Kuhn',29,2,0),(21,'Gleason','Darren','Dietrich',20,3,0),(22,'Okuneva','Ludwig','Flatley',33,5,0),(23,'Effertz','Maybell','Friesen',23,4,0),(24,'Heathcote','Margaretta','Wehner',34,1,0),(25,'Brakus','Pete','Nolan',34,2,0),(26,'Doyle','Reyes','Schimmel',32,4,0),(27,'Ernser','Thaddeus','Anderson',28,4,0),(28,'Brekke','Brycen','Fay',35,5,0),(29,'Ruecker','Doris','Oberbrunner',28,3,0),(30,'Dach','Elian','Dietrich',25,5,0),(31,'Erdman','Tyrique','Hills',29,2,0),(32,'Swift','August','Greenholt',27,1,0),(33,'Greenholt','Aylin','Schroeder',35,4,0),(34,'Herzog','Una','Toy',24,1,0),(35,'Stark','Danial','Legros',23,2,0),(36,'Kuphal','Lonnie','Rolfson',24,5,0),(37,'Wunsch','Yoshiko','Nader',32,5,0),(38,'Reichel','Durward','Nader',25,1,0),(39,'Towne','Francisco','Friesen',22,4,0),(40,'Blick','Genesis','Ledner',20,5,0),(41,'Stehr','Erika','Lueilwitz',32,3,0),(42,'Veum','Clarissa','Nitzsche',24,4,0),(43,'Terry','Ernestine','Towne',22,5,0),(44,'Padberg','Bessie','Russel',29,4,0),(45,'Ryan','Camilla','Nitzsche',31,3,0),(46,'Kling','Freddy','Senger',34,2,0),(47,'Crona','Blanche','Funk',18,5,0),(48,'Roberts','Dorthy','West',30,1,0),(49,'Windler','Dedric','Senger',24,4,0),(50,'Howe','Orrin','Kuphal',33,1,0),(51,'Milan','Aian Darryl','Cerafica',31,1,0),(53,'Buban','Emrech','Vacban',50,3,0);
/*!40000 ALTER TABLE `worker` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `worker_role`
--

DROP TABLE IF EXISTS `worker_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `worker_role` (
  `worker_role_id` int(11) NOT NULL AUTO_INCREMENT,
  `worker_role_description` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`worker_role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `worker_role`
--

LOCK TABLES `worker_role` WRITE;
/*!40000 ALTER TABLE `worker_role` DISABLE KEYS */;
INSERT INTO `worker_role` VALUES (1,'Waiter',1),(2,'Waiter II',0),(3,'Chef',0),(4,'Chef II',0),(5,'Waiter III',0),(6,'Head waiter',0);
/*!40000 ALTER TABLE `worker_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `packages_view`
--

/*!50001 DROP VIEW IF EXISTS `packages_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `packages_view` AS select `package_details`.`package_id` AS `package_id`,`package_details`.`package_name` AS `package_name`,`package_details`.`package_price` AS `package_price`,`package_details`.`status` AS `status`,`package_details`.`package_type_id` AS `package_type_id` from `package_details` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-02 22:28:50
