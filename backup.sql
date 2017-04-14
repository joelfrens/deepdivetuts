-- MySQL dump 10.16  Distrib 10.1.19-MariaDB, for osx10.11 (x86_64)
--
-- Host: deepdivetuts    Database: deepdivetuts
-- ------------------------------------------------------
-- Server version	10.1.19-MariaDB

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
-- Table structure for table `article_images`
--

DROP TABLE IF EXISTS `article_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `article_images_article_id_index` (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_images`
--

LOCK TABLES `article_images` WRITE;
/*!40000 ALTER TABLE `article_images` DISABLE KEYS */;
INSERT INTO `article_images` VALUES (1,1,'bbsp.jpg','2017-03-04 00:42:41','2017-03-04 00:42:41');
/*!40000 ALTER TABLE `article_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `article_tag`
--

DROP TABLE IF EXISTS `article_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article_tag` (
  `article_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `article_tag_article_id_index` (`article_id`),
  KEY `article_tag_tag_id_index` (`tag_id`),
  CONSTRAINT `article_tag_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `article_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_tag`
--

LOCK TABLES `article_tag` WRITE;
/*!40000 ALTER TABLE `article_tag` DISABLE KEYS */;
INSERT INTO `article_tag` VALUES (2,5,NULL,NULL),(18,4,NULL,NULL),(18,5,NULL,NULL),(19,4,NULL,NULL),(19,5,NULL,NULL),(21,4,NULL,NULL),(21,5,NULL,NULL);
/*!40000 ALTER TABLE `article_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_keywords` longtext COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ycoordinate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcoordinate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `schedule_on` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `articles_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (2,1,'Test 234','test-234','test',11,'','4343643','34543','Test 45',1,NULL,'2017-03-05 21:12:05','2017-03-05 21:12:05'),(18,1,'foo','foo','test',5,'','325325','32423','Bar',1,NULL,'2017-03-09 11:19:58','2017-03-09 11:19:58'),(19,1,'Test','test','test',5,'','4643643','346436','Test',1,NULL,'2017-03-09 11:25:43','2017-03-09 11:25:43'),(20,1,'Test 7','test-7','test',5,'','34634','436436','test 7',1,NULL,'2017-03-09 11:39:31','2017-03-09 11:39:31'),(21,1,'Test 7','test-7-1','test',5,'','34634','436436','test 7',1,NULL,'2017-03-09 11:42:31','2017-03-09 11:42:31'),(22,1,'Test','test-235','test',5,'','436436','46346346','test',1,NULL,'2017-03-11 19:54:09','2017-03-11 19:54:09');
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` text COLLATE utf8_unicode_ci NOT NULL,
  `category_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=185 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (5,'Jaida Hagenes I','Test','','JaidaHagenesI',1,'2016-12-22 21:06:19','2017-02-28 20:52:34'),(6,'Valentina Reichert','','','ValentinaReichert',0,'2016-12-22 21:06:19','2016-12-22 21:06:19'),(7,'Russ O\'Hara','','','RussO\'Hara',0,'2016-12-22 21:06:19','2016-12-22 21:06:19'),(8,'Cyril Bauch','','','CyrilBauch',0,'2016-12-22 21:06:19','2016-12-22 21:06:19'),(9,'Dr. Adolfo Hudson DDS','','','Dr.AdolfoHudsonDDS',0,'2016-12-22 21:06:19','2016-12-22 21:06:19'),(10,'Jaeden Mosciski','','','JaedenMosciski',1,'2016-12-22 21:06:19','2016-12-22 21:06:19'),(11,'Eve Doyle','','','EveDoyle',1,'2016-12-22 21:06:19','2016-12-22 21:06:19'),(13,'Dr. Monserrat Wuckert II','','','Dr.MonserratWuckertII',1,'2016-12-22 21:06:19','2016-12-22 21:06:19'),(14,'Samantha Roberts','','','SamanthaRoberts',1,'2016-12-22 21:06:19','2016-12-22 21:06:19'),(15,'Rylee Runolfsson','','','RyleeRunolfsson',1,'2016-12-22 21:06:19','2016-12-22 21:06:19'),(16,'Kayla Crona','','','KaylaCrona',1,'2016-12-22 21:06:19','2016-12-22 21:06:19'),(17,'Mona Pacocha','','','MonaPacocha',1,'2016-12-22 21:06:19','2016-12-22 21:06:19'),(18,'Danny Carter','','','DannyCarter',1,'2016-12-22 21:06:19','2016-12-22 21:06:19'),(20,'Ms. Felipa Von V','','','Ms.FelipaVonV',1,'2016-12-22 21:06:19','2016-12-22 21:06:19'),(21,'Dr. Randi Effertz IV','','','Dr.RandiEffertzIV',1,'2016-12-22 21:06:19','2016-12-22 21:06:19'),(22,'Kale Weimann II','','','KaleWeimannII',1,'2016-12-22 21:06:19','2016-12-22 21:06:19'),(23,'Jaeden Gerlach','','','jaeden-gerlach',1,'2016-12-22 21:31:50','2016-12-22 21:31:50'),(24,'Shana Dietrich','','','shana-dietrich',1,'2016-12-22 21:31:50','2016-12-22 21:31:50'),(25,'Angelita Hand','','','angelita-hand',1,'2016-12-22 21:31:50','2016-12-22 21:31:50'),(26,'Melvina Hayes','','','melvina-hayes',1,'2016-12-22 21:31:50','2016-12-22 21:31:50'),(27,'Hettie Hermiston','','','hettie-hermiston',1,'2016-12-22 21:31:50','2016-12-22 21:31:50'),(28,'Sabryna Rogahn II','','','sabryna-rogahn-ii',1,'2016-12-22 21:31:50','2016-12-22 21:31:50'),(29,'Mr. Rigoberto Kunde','','','mr-rigoberto-kunde',1,'2016-12-22 21:31:50','2016-12-22 21:31:50'),(30,'Lazaro Shanahan','','','lazaro-shanahan',1,'2016-12-22 21:31:50','2016-12-22 21:31:50'),(31,'Prof. Veronica Wisoky','','','prof-veronica-wisoky',1,'2016-12-22 21:31:50','2016-12-22 21:31:50'),(32,'Dr. Gabriel Schmeler','','','dr-gabriel-schmeler',1,'2016-12-22 21:31:50','2016-12-22 21:31:50'),(33,'Dr. Savion Lemke','','','dr-savion-lemke',1,'2016-12-22 21:31:50','2016-12-22 21:31:50'),(34,'Marilie Schroeder Jr.','','','marilie-schroeder-jr',1,'2016-12-22 21:31:50','2016-12-22 21:31:50'),(35,'Haven Schulist','','','haven-schulist',1,'2016-12-22 21:31:50','2016-12-22 21:31:50'),(36,'Prof. Reggie Aufderhar','','','prof-reggie-aufderhar',1,'2016-12-22 21:31:50','2016-12-22 21:31:50'),(37,'Marcia Ankunding','','','marcia-ankunding',1,'2016-12-22 21:31:50','2016-12-22 21:31:50'),(38,'Delbert Boyle','','','delbert-boyle',1,'2016-12-22 21:31:50','2016-12-22 21:31:50'),(39,'Mr. Lisandro Kessler III','','','mr-lisandro-kessler-iii',1,'2016-12-22 21:31:50','2016-12-22 21:31:50'),(40,'Garrison King','','','garrison-king',1,'2016-12-22 21:31:50','2016-12-22 21:31:50'),(41,'Timothy Zulauf','','','timothy-zulauf',1,'2016-12-22 21:31:50','2016-12-22 21:31:50'),(42,'Mrs. Syble Rempel','','','mrs-syble-rempel',1,'2016-12-22 21:31:50','2016-12-22 21:31:50'),(43,'My tinker category','','','my-tinker-category',1,'2016-12-22 21:39:47','2016-12-22 21:39:47'),(44,'Edgardo Cummings','','','edgardo-cummings',1,'2016-12-22 21:40:58','2016-12-22 21:40:58'),(45,'Prof. Harley Buckridge DVM','','','prof-harley-buckridge-dvm',1,'2016-12-22 21:40:58','2016-12-22 21:40:58'),(46,'Dr. Althea Jerde','','','dr-althea-jerde',1,'2016-12-22 21:40:58','2016-12-22 21:40:58'),(47,'Rebekah Koch','','','rebekah-koch',1,'2016-12-22 21:40:58','2016-12-22 21:40:58'),(48,'Prof. Leon Will Jr.','','','prof-leon-will-jr',1,'2016-12-22 21:40:58','2016-12-22 21:40:58'),(49,'Wava Farrell','','','wava-farrell',1,'2016-12-22 21:40:58','2016-12-22 21:40:58'),(50,'Dr. Eleazar Collier Jr.','','','dr-eleazar-collier-jr',1,'2016-12-22 21:40:58','2016-12-22 21:40:58'),(51,'Yesenia Rogahn III','','','yesenia-rogahn-iii',1,'2016-12-22 21:40:58','2016-12-22 21:40:58'),(52,'Vilma Lehner','','','vilma-lehner',1,'2016-12-22 21:40:58','2016-12-22 21:40:58'),(53,'Orval Jacobson','','','orval-jacobson',1,'2016-12-22 21:40:58','2016-12-22 21:40:58'),(54,'Miss Trycia Baumbach Jr.','','','miss-trycia-baumbach-jr',1,'2016-12-22 21:40:58','2016-12-22 21:40:58'),(55,'Miss Eda Wilderman MD','','','miss-eda-wilderman-md',1,'2016-12-22 21:40:58','2016-12-22 21:40:58'),(56,'Dr. Giles Ritchie','','','dr-giles-ritchie',1,'2016-12-22 21:40:58','2016-12-22 21:40:58'),(57,'Ethel Kozey','','','ethel-kozey',1,'2016-12-22 21:40:58','2016-12-22 21:40:58'),(58,'Miss Claudine Corwin II','','','miss-claudine-corwin-ii',1,'2016-12-22 21:40:58','2016-12-22 21:40:58'),(59,'Marilie Yundt','','','marilie-yundt',1,'2016-12-22 21:40:58','2016-12-22 21:40:58'),(60,'Hilda Hills','','','hilda-hills',1,'2016-12-22 21:40:58','2016-12-22 21:40:58'),(61,'Lorem Ipsum updated!!!!!????','','','mrs-carmen-smith-dvm',1,'2016-12-22 21:40:58','2017-01-24 06:43:26'),(63,'Jessy Hintz II','','','jessy-hintz-ii',1,'2016-12-22 21:40:58','2016-12-22 21:40:58'),(64,'Lorem Ipsum updated','','','lorem-ipsum',1,'2016-12-23 15:21:00','2016-12-23 15:29:06'),(65,'foo','','','foo',1,'2017-01-24 06:18:54','2017-01-24 06:18:54'),(66,'foo','','','foo-1',1,'2017-01-24 06:19:13','2017-01-24 06:19:13'),(67,'foobar','','','foobar',1,'2017-01-24 06:19:37','2017-01-24 06:19:37'),(68,'HI','','','hi',1,'2017-01-24 06:30:42','2017-01-24 06:30:42'),(69,'bbbbbbbb11111','','','bbbbbbbb',1,'2017-01-24 22:12:57','2017-01-24 22:13:09'),(70,'jgjgj','','','jgjgj',1,'2017-01-24 22:13:55','2017-01-24 22:13:55'),(71,'Oswaldo Satterfield Jr.','','','oswaldo-satterfield-jr',1,'2017-01-26 23:31:56','2017-01-26 23:31:56'),(72,'Hassie Lockman','','','hassie-lockman',1,'2017-01-26 23:31:56','2017-01-26 23:31:56'),(73,'Assunta Brown','','','assunta-brown',1,'2017-01-26 23:35:54','2017-01-26 23:35:54'),(74,'Prof. Norene Hegmann','','','prof-norene-hegmann',1,'2017-01-26 23:35:54','2017-01-26 23:35:54'),(75,'Reba Carter','','','reba-carter',1,'2017-01-26 23:37:58','2017-01-26 23:37:58'),(76,'Annabell Okuneva','','','annabell-okuneva',1,'2017-01-26 23:37:58','2017-01-26 23:37:58'),(77,'Ms. Valentine King PhD','','','ms-valentine-king-phd',1,'2017-01-26 23:38:53','2017-01-26 23:38:53'),(78,'Mariana Rosenbaum','','','mariana-rosenbaum',1,'2017-01-26 23:38:53','2017-01-26 23:38:53'),(79,'Rogers Kuhn','','','rogers-kuhn',1,'2017-01-26 23:38:53','2017-01-26 23:38:53'),(80,'Mr. Lane Barton Jr.','','','mr-lane-barton-jr',1,'2017-01-26 23:38:53','2017-01-26 23:38:53'),(81,'Nils Douglas','','','nils-douglas',1,'2017-01-26 23:38:53','2017-01-26 23:38:53'),(82,'Mr. Keaton Moen','','','mr-keaton-moen',1,'2017-01-26 23:38:53','2017-01-26 23:38:53'),(83,'Dr. Novella Bernier','','','dr-novella-bernier',1,'2017-01-26 23:38:53','2017-01-26 23:38:53'),(84,'Dalton Larson PhD','','','dalton-larson-phd',1,'2017-01-26 23:38:53','2017-01-26 23:38:53'),(85,'Prof. Chandler Crooks IV','','','prof-chandler-crooks-iv',1,'2017-01-26 23:38:53','2017-01-26 23:38:53'),(86,'Rigoberto Kiehn','','','rigoberto-kiehn',1,'2017-01-26 23:38:53','2017-01-26 23:38:53'),(87,'Otis Rowe','','','otis-rowe',1,'2017-01-26 23:38:53','2017-01-26 23:38:53'),(88,'Mr. Billy Cruickshank','','','mr-billy-cruickshank',1,'2017-01-26 23:38:53','2017-01-26 23:38:53'),(89,'Evangeline White','','','evangeline-white',1,'2017-01-26 23:38:53','2017-01-26 23:38:53'),(90,'Garland Toy','','','garland-toy',1,'2017-01-26 23:38:53','2017-01-26 23:38:53'),(91,'Terrence Stehr','','','terrence-stehr',1,'2017-01-26 23:38:53','2017-01-26 23:38:53'),(92,'Daisha Koss Sr.','','','daisha-koss-sr',1,'2017-01-26 23:38:53','2017-01-26 23:38:53'),(93,'Vicenta Beahan','','','vicenta-beahan',1,'2017-01-26 23:38:53','2017-01-26 23:38:53'),(94,'Lafayette Smith I','','','lafayette-smith-i',1,'2017-01-26 23:38:53','2017-01-26 23:38:53'),(95,'Luna Wiza','','','luna-wiza',1,'2017-01-26 23:38:53','2017-01-26 23:38:53'),(96,'Dr. Jovan Ebert MD','','','dr-jovan-ebert-md',1,'2017-01-26 23:38:53','2017-01-26 23:38:53'),(97,'Jeff Smith','','','jeff-smith',1,'2017-01-26 23:40:42','2017-01-26 23:40:42'),(98,'Haylee Rosenbaum MD','','','haylee-rosenbaum-md',1,'2017-01-26 23:40:42','2017-01-26 23:40:42'),(99,'Maryse Feeney','','','maryse-feeney',1,'2017-01-26 23:40:42','2017-01-26 23:40:42'),(100,'Janiya McCullough','','','janiya-mccullough',1,'2017-01-26 23:40:42','2017-01-26 23:40:42'),(101,'Ms. Clarissa Koelpin','','','ms-clarissa-koelpin',1,'2017-01-26 23:40:42','2017-01-26 23:40:42'),(102,'Mr. Gerhard Rice I','','','mr-gerhard-rice-i',1,'2017-01-26 23:40:42','2017-01-26 23:40:42'),(103,'Miss Raphaelle Stoltenberg','','','miss-raphaelle-stoltenberg',1,'2017-01-26 23:40:42','2017-01-26 23:40:42'),(104,'Santos Fritsch','','','santos-fritsch',1,'2017-01-26 23:40:42','2017-01-26 23:40:42'),(105,'Garland Parker','','','garland-parker',1,'2017-01-26 23:40:42','2017-01-26 23:40:42'),(106,'Bryon Harvey','','','bryon-harvey',1,'2017-01-26 23:40:42','2017-01-26 23:40:42'),(107,'Marco Weimann DDS','','','marco-weimann-dds',1,'2017-01-26 23:40:42','2017-01-26 23:40:42'),(108,'Golden Hartmann','','','golden-hartmann',1,'2017-01-26 23:40:42','2017-01-26 23:40:42'),(109,'Angel D\'Amore','','','angel-d-amore',1,'2017-01-26 23:40:42','2017-01-26 23:40:42'),(110,'Melyna Wilkinson','','','melyna-wilkinson',1,'2017-01-26 23:40:42','2017-01-26 23:40:42'),(111,'Ms. Theresia Mann','','','ms-theresia-mann',1,'2017-01-26 23:40:42','2017-01-26 23:40:42'),(112,'Ike Greenfelder','','','ike-greenfelder',1,'2017-01-26 23:40:42','2017-01-26 23:40:42'),(113,'Chanel Mayer','','','chanel-mayer',1,'2017-01-26 23:40:42','2017-01-26 23:40:42'),(114,'Prof. Walter Conroy Sr.','','','prof-walter-conroy-sr',1,'2017-01-26 23:40:42','2017-01-26 23:40:42'),(115,'Dr. Rogers Koepp PhD','','','dr-rogers-koepp-phd',1,'2017-01-26 23:40:42','2017-01-26 23:40:42'),(116,'Octavia Adams','','','octavia-adams',1,'2017-01-26 23:40:42','2017-01-26 23:40:42'),(117,'Heidi Anderson','','','heidi-anderson',1,'2017-01-26 23:41:01','2017-01-26 23:41:01'),(118,'Meghan Grimes I','','','meghan-grimes-i',1,'2017-01-26 23:41:01','2017-01-26 23:41:01'),(119,'Wallace Howe','','','wallace-howe',1,'2017-01-26 23:41:01','2017-01-26 23:41:01'),(120,'Casey Batz','','','casey-batz',1,'2017-01-26 23:41:01','2017-01-26 23:41:01'),(121,'Prof. Korey Wilkinson I','','','prof-korey-wilkinson-i',1,'2017-01-26 23:41:01','2017-01-26 23:41:01'),(122,'Corrine Wisozk','','','corrine-wisozk',1,'2017-01-26 23:41:01','2017-01-26 23:41:01'),(123,'Tommie Mraz','','','tommie-mraz',1,'2017-01-26 23:41:01','2017-01-26 23:41:01'),(124,'Clemens Ankunding','','','clemens-ankunding',1,'2017-01-26 23:41:01','2017-01-26 23:41:01'),(125,'Cora Mayer PhD','','','cora-mayer-phd',1,'2017-01-26 23:41:01','2017-01-26 23:41:01'),(126,'Adelbert Eichmann','','','adelbert-eichmann',1,'2017-01-26 23:41:01','2017-01-26 23:41:01'),(127,'Della Beatty','','','della-beatty',1,'2017-01-26 23:41:01','2017-01-26 23:41:01'),(128,'Catherine Dach','','','catherine-dach',1,'2017-01-26 23:41:01','2017-01-26 23:41:01'),(129,'Miss Una Osinski I','','','miss-una-osinski-i',1,'2017-01-26 23:41:01','2017-01-26 23:41:01'),(130,'Thelma Koch','','','thelma-koch',1,'2017-01-26 23:41:01','2017-01-26 23:41:01'),(131,'Narciso Lueilwitz','','','narciso-lueilwitz',1,'2017-01-26 23:41:01','2017-01-26 23:41:01'),(132,'Wilfred Conroy','','','wilfred-conroy',1,'2017-01-26 23:41:01','2017-01-26 23:41:01'),(133,'Pat Adams','','','pat-adams',1,'2017-01-26 23:41:01','2017-01-26 23:41:01'),(134,'Enid White','','','enid-white',1,'2017-01-26 23:41:01','2017-01-26 23:41:01'),(135,'Eileen Witting','','','eileen-witting',1,'2017-01-26 23:41:01','2017-01-26 23:41:01'),(136,'Mrs. Willa Toy','','','mrs-willa-toy',1,'2017-01-26 23:41:01','2017-01-26 23:41:01'),(137,'Jolie Lubowitz','','','jolie-lubowitz',1,'2017-01-26 23:41:27','2017-01-26 23:41:27'),(138,'Melody Ziemann','','','melody-ziemann',1,'2017-01-26 23:41:27','2017-01-26 23:41:27'),(139,'Dr. Reagan Nienow PhD','','','dr-reagan-nienow-phd',1,'2017-01-26 23:41:27','2017-01-26 23:41:27'),(140,'Hailie Kassulke','','','hailie-kassulke',1,'2017-01-26 23:41:27','2017-01-26 23:41:27'),(141,'Lillian Howell','','','lillian-howell',1,'2017-01-26 23:41:27','2017-01-26 23:41:27'),(142,'Marques Herman','','','marques-herman',1,'2017-01-26 23:41:27','2017-01-26 23:41:27'),(143,'Mrs. Patsy D\'Amore','','','mrs-patsy-d-amore',1,'2017-01-26 23:41:27','2017-01-26 23:41:27'),(144,'Prof. Paige Gislason DDS','','','prof-paige-gislason-dds',1,'2017-01-26 23:41:28','2017-01-26 23:41:28'),(145,'Marion Purdy','','','marion-purdy',1,'2017-01-26 23:41:28','2017-01-26 23:41:28'),(146,'Jacky Farrell','','','jacky-farrell',1,'2017-01-26 23:41:28','2017-01-26 23:41:28'),(147,'Therese Lesch','','','therese-lesch',1,'2017-01-26 23:41:28','2017-01-26 23:41:28'),(148,'Mckenzie Shields','','','mckenzie-shields',1,'2017-01-26 23:41:28','2017-01-26 23:41:28'),(149,'Jonathon Casper','','','jonathon-casper',1,'2017-01-26 23:41:28','2017-01-26 23:41:28'),(150,'Jeffry Rosenbaum PhD','','','jeffry-rosenbaum-phd',1,'2017-01-26 23:41:28','2017-01-26 23:41:28'),(151,'Dr. Verdie Green Sr.','','','dr-verdie-green-sr',1,'2017-01-26 23:41:28','2017-01-26 23:41:28'),(152,'Mr. Ignatius Abernathy MD','','','mr-ignatius-abernathy-md',1,'2017-01-26 23:41:28','2017-01-26 23:41:28'),(153,'Allene Rowe','','','allene-rowe',1,'2017-01-26 23:41:28','2017-01-26 23:41:28'),(154,'Leanne Schmeler','','','leanne-schmeler',1,'2017-01-26 23:41:28','2017-01-26 23:41:28'),(155,'Myra Hettinger','','','myra-hettinger',1,'2017-01-26 23:41:28','2017-01-26 23:41:28'),(156,'Noemy Frami','','','noemy-frami',1,'2017-01-26 23:41:28','2017-01-26 23:41:28'),(157,'Prof. Sabina Kling V','','','prof-sabina-kling-v',1,'2017-01-26 23:42:37','2017-01-26 23:42:37'),(158,'Maegan Bogisich','','','maegan-bogisich',1,'2017-01-26 23:42:38','2017-01-26 23:42:38'),(159,'Golda Schneider','','','golda-schneider',1,'2017-01-26 23:42:38','2017-01-26 23:42:38'),(160,'Laura Bradtke','','','laura-bradtke',1,'2017-01-26 23:42:38','2017-01-26 23:42:38'),(161,'Kristopher Moen','','','kristopher-moen',1,'2017-01-26 23:42:38','2017-01-26 23:42:38'),(162,'Toby Kirlin','','','toby-kirlin',1,'2017-01-26 23:42:38','2017-01-26 23:42:38'),(163,'Julian Mitchell','','','julian-mitchell',1,'2017-01-26 23:42:38','2017-01-26 23:42:38'),(164,'Mozell Schiller','','','mozell-schiller',1,'2017-01-26 23:42:38','2017-01-26 23:42:38'),(165,'Arvilla Sanford','','','arvilla-sanford',1,'2017-01-26 23:42:38','2017-01-26 23:42:38'),(166,'Janice Gutmann','','','janice-gutmann',1,'2017-01-26 23:42:38','2017-01-26 23:42:38'),(167,'Arno Leannon','','','arno-leannon',1,'2017-01-26 23:42:38','2017-01-26 23:42:38'),(168,'Sam Sanford','','','sam-sanford',1,'2017-01-26 23:42:38','2017-01-26 23:42:38'),(169,'Dr. Armando Walter PhD','','','dr-armando-walter-phd',1,'2017-01-26 23:42:38','2017-01-26 23:42:38'),(170,'Antonia Ratke','','','antonia-ratke',1,'2017-01-26 23:42:38','2017-01-26 23:42:38'),(171,'Bart Gleichner','','','bart-gleichner',1,'2017-01-26 23:42:38','2017-01-26 23:42:38'),(172,'Mr. Thaddeus Pfeffer','','','mr-thaddeus-pfeffer',1,'2017-01-26 23:42:39','2017-01-26 23:42:39'),(173,'Raoul Goldner II','','','raoul-goldner-ii',1,'2017-01-26 23:42:39','2017-01-26 23:42:39'),(174,'Dr. Lauriane Hansen','','','dr-lauriane-hansen',1,'2017-01-26 23:42:39','2017-01-26 23:42:39'),(175,'Bill Haley','','','bill-haley',1,'2017-01-26 23:42:39','2017-01-26 23:42:39'),(176,'Dr. Everett Douglas MD','','','dr-everett-douglas-md',1,'2017-01-26 23:42:39','2017-01-26 23:42:39'),(177,'test no','','','test-no',1,'2017-01-30 20:31:11','2017-01-30 21:57:16'),(178,'Test No','Test Tset','','test-yes',1,'2017-01-31 18:24:00','2017-01-31 20:00:28'),(179,'fdgsdg','','','fdgsdg',0,'2017-01-31 20:27:03','2017-01-31 20:27:03'),(180,'dsgdsg','dsgdsdsg','','dsgdsg',1,'2017-01-31 21:06:33','2017-01-31 21:06:33'),(181,'dgdg','dsgdsgdsg','','dgdg',1,'2017-01-31 21:08:26','2017-01-31 21:08:26'),(182,'test','test','','test',0,'2017-01-31 21:15:39','2017-01-31 21:15:39'),(183,'Test image','Test Test','','test-image',1,'2017-01-31 21:38:18','2017-01-31 21:38:18'),(184,'Test image 1','Test','Laravel-Crud-1.png','test-image-1',1,'2017-01-31 21:43:35','2017-01-31 21:43:35');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ingredients`
--

DROP TABLE IF EXISTS `ingredients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ingredients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingredients`
--

LOCK TABLES `ingredients` WRITE;
/*!40000 ALTER TABLE `ingredients` DISABLE KEYS */;
/*!40000 ALTER TABLE `ingredients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (5,'2014_10_12_000000_create_users_table',1),(6,'2014_10_12_100000_create_password_resets_table',1),(7,'2016_12_22_202600_create_categories_table',1),(8,'2016_12_22_203733_add_visible_to_categories_table',2),(9,'2017_01_26_232624_create_videos_table',3),(10,'2017_01_31_195735_add_desc_to_categories',4),(12,'2017_01_31_203915_add_image',5),(13,'2017_01_31_212414_add_image_to_categories_table',6),(14,'2017_02_22_070849_add_status_to_user_table',7),(15,'2017_03_03_234226_create_articles_table',8),(16,'2017_03_03_234332_create_recipes_table',8),(17,'2017_03_03_234414_create_ingredients_table',8),(18,'2017_03_03_234502_create_article_images_table',8),(19,'2017_03_03_234635_create_tags_table',8),(20,'2017_03_03_234704_add_slug_to_recipes_table',8),(21,'2017_03_03_234900_create_recipe_ingredients_table',8),(22,'2017_03_04_004019_add_coordinates_to_articles_table',9),(23,'2017_03_04_004143_add_categories_id_to_articles_table',10),(24,'2017_03_04_004225_add_meta_keywords_to_articles_table',11);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recipes`
--

DROP TABLE IF EXISTS `recipes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recipes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipes`
--

LOCK TABLES `recipes` WRITE;
/*!40000 ALTER TABLE `recipes` DISABLE KEYS */;
/*!40000 ALTER TABLE `recipes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (4,'Test Tag 1','test-tag-1',1,'2017-03-05 17:44:43','2017-03-05 17:44:43'),(5,'Test Tag 2','test-tag-2',1,'2017-03-05 17:44:48','2017-03-05 17:44:48');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Joel','joelfrens@gmail.com','$2y$10$CIht2s2OERF902QDoeAATuK2nDoUkDaHX7I0BHLAVx64lu.aC1Z9S',1,'7TmWvNepZ0mBeVyVP51BTiiIWOduDxoHDtKMLlpVvWDgUTLrQMN1MCFXcPZ1','2016-12-22 23:34:10','2017-01-28 15:16:16'),(2,'Test','test@gmail.com','$2y$10$cg8fmAm7OSI5p.xFNzLLu.fYubGqLSxEo1ZC3crJQAYN4FHDA9SlK',0,'M003CfbPZywf9M8HGIF932jOnEq6cHiUqV6RGCFx7Up3U4PfXKFggO2fAyqu','2017-02-22 07:02:36','2017-02-22 07:02:36');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `videos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videos`
--

LOCK TABLES `videos` WRITE;
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
INSERT INTO `videos` VALUES (23,'Ms. Alva Feeney','',157,1,NULL,'2017-01-26 23:42:39','2017-01-26 23:42:39'),(24,'Braden Runolfsson','',157,1,NULL,'2017-01-26 23:42:40','2017-01-26 23:42:40'),(25,'Prof. Paolo Luettgen','',157,1,NULL,'2017-01-26 23:42:40','2017-01-26 23:42:40'),(26,'Nia Monahan','',157,1,NULL,'2017-01-26 23:42:40','2017-01-26 23:42:40'),(27,'Asa Rath','',157,1,NULL,'2017-01-26 23:42:41','2017-01-26 23:42:41'),(28,'Prof. Rick Schinner II','',158,1,NULL,'2017-01-26 23:42:41','2017-01-26 23:42:41'),(29,'Maxime Bernhard','',158,1,NULL,'2017-01-26 23:42:41','2017-01-26 23:42:41'),(30,'Trycia O\'Connell','',158,1,NULL,'2017-01-26 23:42:41','2017-01-26 23:42:41'),(31,'Prof. Orrin Christiansen MD','',158,1,NULL,'2017-01-26 23:42:41','2017-01-26 23:42:41'),(32,'Dr. Anne Conn IV','',158,1,NULL,'2017-01-26 23:42:41','2017-01-26 23:42:41'),(33,'Miss Ressie Lubowitz','',159,1,NULL,'2017-01-26 23:42:42','2017-01-26 23:42:42'),(34,'Mr. Destin Bednar','',159,1,NULL,'2017-01-26 23:42:42','2017-01-26 23:42:42'),(35,'Miss Daphnee Schaefer','',159,1,NULL,'2017-01-26 23:42:42','2017-01-26 23:42:42'),(36,'Dr. Florian Miller','',159,1,NULL,'2017-01-26 23:42:42','2017-01-26 23:42:42'),(37,'Elody Welch','',159,1,NULL,'2017-01-26 23:42:42','2017-01-26 23:42:42'),(38,'Dr. Jaylon Kuhic','',160,1,NULL,'2017-01-26 23:42:42','2017-01-26 23:42:42'),(39,'Miss Eveline Padberg','',160,1,NULL,'2017-01-26 23:42:42','2017-01-26 23:42:42'),(40,'Dr. Waldo Monahan DDS','',160,1,NULL,'2017-01-26 23:42:42','2017-01-26 23:42:42'),(41,'Gia Langosh','',160,1,NULL,'2017-01-26 23:42:43','2017-01-26 23:42:43'),(42,'Libby Doyle','',160,1,NULL,'2017-01-26 23:42:43','2017-01-26 23:42:43'),(43,'Dr. Ignatius Tromp Sr.','',161,1,NULL,'2017-01-26 23:42:43','2017-01-26 23:42:43'),(44,'Mr. Jaylin Becker','',161,1,NULL,'2017-01-26 23:42:43','2017-01-26 23:42:43'),(45,'Irving Olson','',161,1,NULL,'2017-01-26 23:42:43','2017-01-26 23:42:43'),(46,'Ambrose Bauch','',161,1,NULL,'2017-01-26 23:42:43','2017-01-26 23:42:43'),(47,'Miss Gabriella Adams','',161,1,NULL,'2017-01-26 23:42:43','2017-01-26 23:42:43'),(48,'Pink Stoltenberg','',162,1,NULL,'2017-01-26 23:42:43','2017-01-26 23:42:43'),(49,'Arno Ward IV','',162,1,NULL,'2017-01-26 23:42:43','2017-01-26 23:42:43'),(50,'Brando Mitchell','',162,1,NULL,'2017-01-26 23:42:43','2017-01-26 23:42:43'),(51,'Prof. Bessie Monahan II','',162,1,NULL,'2017-01-26 23:42:43','2017-01-26 23:42:43'),(52,'Oma Rohan DDS','',162,1,NULL,'2017-01-26 23:42:43','2017-01-26 23:42:43'),(53,'Van Reilly','',163,1,NULL,'2017-01-26 23:42:43','2017-01-26 23:42:43'),(54,'Prof. Clair Crist DVM','',163,1,NULL,'2017-01-26 23:42:43','2017-01-26 23:42:43'),(55,'Juwan Gutkowski','',163,1,NULL,'2017-01-26 23:42:43','2017-01-26 23:42:43'),(56,'Dr. Isac Goldner','',163,1,NULL,'2017-01-26 23:42:43','2017-01-26 23:42:43'),(57,'Cali Prosacco V','',163,1,NULL,'2017-01-26 23:42:43','2017-01-26 23:42:43'),(58,'Jackie Toy','',164,1,NULL,'2017-01-26 23:42:44','2017-01-26 23:42:44'),(59,'Dr. Catherine Borer PhD','',164,1,NULL,'2017-01-26 23:42:44','2017-01-26 23:42:44'),(60,'Prof. Stacey Thompson','',164,1,NULL,'2017-01-26 23:42:44','2017-01-26 23:42:44'),(61,'Zachery Satterfield II','',164,1,NULL,'2017-01-26 23:42:44','2017-01-26 23:42:44'),(62,'Jamie O\'Hara','',164,1,NULL,'2017-01-26 23:42:44','2017-01-26 23:42:44'),(63,'Lucy Batz','',165,1,NULL,'2017-01-26 23:42:44','2017-01-26 23:42:44'),(64,'Mr. Jamar Hammes DDS','',165,1,NULL,'2017-01-26 23:42:44','2017-01-26 23:42:44'),(65,'Prof. Abby Kemmer IV','',165,1,NULL,'2017-01-26 23:42:44','2017-01-26 23:42:44'),(66,'Dr. Tiana Bode I','',165,1,NULL,'2017-01-26 23:42:44','2017-01-26 23:42:44'),(67,'Prof. Justina Lehner PhD','',165,1,NULL,'2017-01-26 23:42:44','2017-01-26 23:42:44'),(68,'Ludwig Considine','',166,1,NULL,'2017-01-26 23:42:44','2017-01-26 23:42:44'),(69,'Mr. Stephan Veum','',166,1,NULL,'2017-01-26 23:42:44','2017-01-26 23:42:44'),(70,'Sigrid Braun','',166,1,NULL,'2017-01-26 23:42:44','2017-01-26 23:42:44'),(71,'Mr. Hank Price','',166,1,NULL,'2017-01-26 23:42:44','2017-01-26 23:42:44'),(72,'Isac Hegmann PhD','',166,1,NULL,'2017-01-26 23:42:44','2017-01-26 23:42:44'),(73,'Flavie Strosin','',167,1,NULL,'2017-01-26 23:42:44','2017-01-26 23:42:44'),(74,'Emmy Schiller','',167,1,NULL,'2017-01-26 23:42:44','2017-01-26 23:42:44'),(75,'Dr. Ashleigh Kuhic Sr.','',167,1,NULL,'2017-01-26 23:42:44','2017-01-26 23:42:44'),(76,'Austin Christiansen','',167,1,NULL,'2017-01-26 23:42:44','2017-01-26 23:42:44'),(77,'Vida Mante','',167,1,NULL,'2017-01-26 23:42:44','2017-01-26 23:42:44'),(78,'Mrs. Emie Bahringer Sr.','',168,1,NULL,'2017-01-26 23:42:44','2017-01-26 23:42:44'),(79,'Miss Charlotte King','',168,1,NULL,'2017-01-26 23:42:44','2017-01-26 23:42:44'),(80,'Prof. Seth Jerde','',168,1,NULL,'2017-01-26 23:42:44','2017-01-26 23:42:44'),(81,'Mrs. Madalyn Orn V','',168,1,NULL,'2017-01-26 23:42:44','2017-01-26 23:42:44'),(82,'Jesse Conroy','',168,1,NULL,'2017-01-26 23:42:44','2017-01-26 23:42:44'),(83,'Dr. Sherman Lehner Sr.','',169,1,NULL,'2017-01-26 23:42:44','2017-01-26 23:42:44'),(84,'Mrs. Nicolette Braun','',169,1,NULL,'2017-01-26 23:42:44','2017-01-26 23:42:44'),(85,'Prof. Milford Terry','',169,1,NULL,'2017-01-26 23:42:44','2017-01-26 23:42:44'),(86,'Estefania Littel','',169,1,NULL,'2017-01-26 23:42:44','2017-01-26 23:42:44'),(87,'Jairo Cole','',169,1,NULL,'2017-01-26 23:42:44','2017-01-26 23:42:44'),(88,'Helmer Hyatt','',170,1,NULL,'2017-01-26 23:42:44','2017-01-26 23:42:44'),(89,'Miss Lou Huel Sr.','',170,1,NULL,'2017-01-26 23:42:44','2017-01-26 23:42:44'),(90,'Lenora Pollich','',170,1,NULL,'2017-01-26 23:42:44','2017-01-26 23:42:44'),(91,'Amy Johnston','',170,1,NULL,'2017-01-26 23:42:44','2017-01-26 23:42:44'),(92,'Mr. Myron Schaden','',170,1,NULL,'2017-01-26 23:42:44','2017-01-26 23:42:44'),(93,'Evelyn Krajcik','',171,1,NULL,'2017-01-26 23:42:45','2017-01-26 23:42:45'),(94,'Mariane Wehner V','',171,1,NULL,'2017-01-26 23:42:45','2017-01-26 23:42:45'),(95,'Prof. Roel Ledner','',171,1,NULL,'2017-01-26 23:42:45','2017-01-26 23:42:45'),(96,'Gerardo Shanahan II','',171,1,NULL,'2017-01-26 23:42:45','2017-01-26 23:42:45'),(97,'Ms. Vella Pagac','',171,1,NULL,'2017-01-26 23:42:45','2017-01-26 23:42:45'),(98,'Dr. Sarah Hermann PhD','',172,1,NULL,'2017-01-26 23:42:45','2017-01-26 23:42:45'),(99,'Elfrieda Feil Sr.','',172,1,NULL,'2017-01-26 23:42:45','2017-01-26 23:42:45'),(100,'Carlee Adams','',172,1,NULL,'2017-01-26 23:42:45','2017-01-26 23:42:45'),(101,'Marty Yost','',172,1,NULL,'2017-01-26 23:42:45','2017-01-26 23:42:45'),(102,'Camylle Mayert','',172,1,NULL,'2017-01-26 23:42:45','2017-01-26 23:42:45'),(103,'Anibal Kunze','',173,1,NULL,'2017-01-26 23:42:45','2017-01-26 23:42:45'),(104,'Dixie Schmitt','',173,1,NULL,'2017-01-26 23:42:45','2017-01-26 23:42:45'),(105,'Michale Stanton','',173,1,NULL,'2017-01-26 23:42:45','2017-01-26 23:42:45'),(106,'Prof. Ryder Moore II','',173,1,NULL,'2017-01-26 23:42:45','2017-01-26 23:42:45'),(107,'Jalen Wisoky','',173,1,NULL,'2017-01-26 23:42:45','2017-01-26 23:42:45'),(108,'Lauren Turner','',174,1,NULL,'2017-01-26 23:42:45','2017-01-26 23:42:45'),(109,'Mr. Forrest Jerde I','',174,1,NULL,'2017-01-26 23:42:45','2017-01-26 23:42:45'),(110,'Everardo Blanda','',174,1,NULL,'2017-01-26 23:42:45','2017-01-26 23:42:45'),(111,'Lyda Balistreri MD','',174,1,NULL,'2017-01-26 23:42:45','2017-01-26 23:42:45'),(112,'Mr. Darien Bosco','',174,1,NULL,'2017-01-26 23:42:45','2017-01-26 23:42:45'),(113,'Ms. Alayna Ziemann II','',175,1,NULL,'2017-01-26 23:42:45','2017-01-26 23:42:45'),(114,'Dovie Bartell','',175,1,NULL,'2017-01-26 23:42:45','2017-01-26 23:42:45'),(115,'Marques Hickle','',175,1,NULL,'2017-01-26 23:42:45','2017-01-26 23:42:45'),(116,'Benjamin Lemke','',175,1,NULL,'2017-01-26 23:42:45','2017-01-26 23:42:45'),(117,'Royce Hilll','',175,1,NULL,'2017-01-26 23:42:45','2017-01-26 23:42:45'),(118,'Miss Annabell Collins DVM','',176,1,NULL,'2017-01-26 23:42:45','2017-01-26 23:42:45'),(119,'Tomas Morissette MD','',176,1,NULL,'2017-01-26 23:42:45','2017-01-26 23:42:45'),(120,'Burdette Gerlach','',176,1,NULL,'2017-01-26 23:42:45','2017-01-26 23:42:45'),(121,'Mrs. Rozella O\'Hara','',176,1,NULL,'2017-01-26 23:42:45','2017-01-26 23:42:45'),(122,'Ms. Margaretta Erdman','',176,1,NULL,'2017-01-26 23:42:45','2017-01-26 23:42:45');
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-12 12:23:16
