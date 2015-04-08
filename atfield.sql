-- MySQL dump 10.13  Distrib 5.5.38, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: atfield
-- ------------------------------------------------------
-- Server version	5.5.38-0+wheezy1

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
-- Table structure for table `caches`
--

DROP TABLE IF EXISTS `caches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `caches` (
  `id` tinyint(2) NOT NULL,
  `cached` tinyint(2) DEFAULT NULL,
  `description` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caches`
--

LOCK TABLES `caches` WRITE;
/*!40000 ALTER TABLE `caches` DISABLE KEYS */;
INSERT INTO `caches` VALUES (1,0,'是否缓存');
/*!40000 ALTER TABLE `caches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorys`
--

DROP TABLE IF EXISTS `categorys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorys` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `backupA` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `backupB` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `backupC` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorys`
--

LOCK TABLES `categorys` WRITE;
/*!40000 ALTER TABLE `categorys` DISABLE KEYS */;
INSERT INTO `categorys` VALUES (1,'三次元','','','','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'二次元','','','','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'Cosplay','','','','','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `categorys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `postId` tinyint(4) NOT NULL,
  `parentId` tinyint(4) NOT NULL,
  `userId` tinyint(4) NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `backupA` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `backupB` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `backupC` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,17,0,1,'这是一条测试数据','','','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,17,0,1,'这是一条测试数据2','','','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,17,0,1,'这是一条测试数据3','','','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,17,0,1,'这是一条测试数据4','','','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,17,0,1,'这是一条测试数据5','','','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,17,0,1,'这是一条测试数据6','','','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(7,17,1,1,'这是一条测试数据7','','','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(8,17,1,1,'这是一条测试数据8','','','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(9,17,8,1,'这是一条测试数据9','','','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(10,17,8,1,'这是一条测试数据 10','','','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(11,17,8,1,'这是一条测试数据 11','','','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(12,17,9,1,'这是一条测试数据 12','','','','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2015_04_03_161844_create_posts_table',1),('2015_04_04_143946_create_category_table',2),('2015_04_07_160704_create_comments_table',3),('2015_04_08_145014_create_sections_table',4);
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
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
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
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category` tinyint(2) NOT NULL DEFAULT '1',
  `author` int(10) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `section` tinyint(2) DEFAULT '1',
  `backupB` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `backupC` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'测试数据1','<p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150406/1428297273610.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150406/1428297273610.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150406/14282972745413.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150406/14282972745413.jpg\\\" style=\\\"\\\"/></p><p><br/></p>','测试,test',1,1,1,0,'','','2015-04-05 21:14:39','2015-04-05 21:14:39'),(2,'测试数据2','<p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150406/14282973584775.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150406/14282973584775.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150406/14282973602129.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150406/14282973602129.jpg\\\" style=\\\"\\\"/></p><p><br/></p>','测试,test',2,1,1,0,'','','2015-04-05 21:16:06','2015-04-05 21:16:06'),(3,'测试3','<p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283456293783.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283456293783.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283456315081.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283456315081.jpg\\\" style=\\\"\\\"/></p><p><br/></p>','测试,test',1,1,1,0,'','','2015-04-06 10:40:42','2015-04-06 10:40:42'),(4,'测试数据1','<p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283456619142.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283456619142.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283456638582.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283456638582.jpg\\\" style=\\\"\\\"/></p><p><br/></p>','test1,test2',2,1,1,0,'','','2015-04-06 10:41:09','2015-04-06 10:41:09'),(5,'测试数据4','<p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/142834568387.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/142834568387.jpg\\\"/></p>','测试,test',1,1,1,0,'','','2015-04-06 10:41:28','2015-04-06 10:41:28'),(6,'测试数据5','<p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283456997558.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283456997558.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457012766.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457012766.jpg\\\" style=\\\"\\\"/></p><p><br/></p>','测试,test',1,1,1,0,'','','2015-04-06 10:41:45','2015-04-06 10:41:45'),(7,'测试数据6','<p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457171029.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457171029.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457206990.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457206990.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457225372.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457225372.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457241885.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457241885.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457273174.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457273174.jpg\\\" style=\\\"\\\"/></p><p><br/></p>','测试,test',1,1,1,0,'','','2015-04-06 10:42:13','2015-04-06 10:42:13'),(8,'测试数据8','<p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457461241.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457461241.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457485956.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457485956.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457503945.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457503945.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457532034.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457532034.jpg\\\" style=\\\"\\\"/></p><p><br/></p>','test1,test2',1,1,1,0,'','','2015-04-06 10:42:38','2015-04-06 10:42:38'),(9,'测试数据10','<p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457694595.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457694595.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457719128.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457719128.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457738209.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457738209.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457755098.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457755098.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457785052.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457785052.jpg\\\" style=\\\"\\\"/></p><p><br/></p>','test1,test2',1,1,1,0,'','','2015-04-06 10:43:03','2015-04-06 10:43:03'),(10,'测试数据11','<p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283458019654.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283458019654.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283458037760.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283458037760.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283458052358.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283458052358.jpg\\\" style=\\\"\\\"/></p><p><br/></p>','test1,test2',1,1,1,0,'','','2015-04-06 10:43:29','2015-04-06 10:43:29'),(11,'测试数据13','<p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283458225202.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283458225202.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283458246475.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283458246475.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283458269480.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283458269480.jpg\\\" style=\\\"\\\"/></p><p><br/></p>','测试,test',1,1,1,0,'','','2015-04-06 10:43:52','2015-04-06 10:43:52'),(12,'测试数据14','<p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283458435837.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283458435837.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283458457397.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283458457397.jpg\\\" style=\\\"\\\"/></p><p><br/></p>','测试,test',1,1,1,0,'','','2015-04-06 10:44:10','2015-04-06 10:44:10'),(13,'测试数据15','<p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/1428345867210.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/1428345867210.jpg\\\"/></p>','test1,test2',2,1,1,0,'','','2015-04-06 10:44:32','2015-04-06 10:44:32'),(14,'测试数据16','<p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283458881828.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283458881828.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283458899666.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283458899666.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283458915176.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283458915176.jpg\\\" style=\\\"\\\"/></p><p><br/></p>','test1,test2',2,1,1,0,'','','2015-04-06 10:44:56','2015-04-06 10:44:56'),(15,'测试数据16','<p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283459075666.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283459075666.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283459097573.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283459097573.jpg\\\" style=\\\"\\\"/></p><p><br/></p>','test1,test2',1,1,1,0,'','','2015-04-06 10:45:13','2015-04-06 10:45:13'),(16,'测试数据17','<p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283459246046.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283459246046.jpg\\\"/></p>','test1,test2',1,1,1,0,'','','2015-04-06 10:45:29','2015-04-06 10:45:29'),(17,'测试触发器','<p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283493374652.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283493374652.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283493385627.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283493385627.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283493406442.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283493406442.jpg\\\" style=\\\"\\\"/></p><p><br/></p>','测试,test',1,1,1,0,'','','2015-04-06 11:42:25','2015-04-06 11:42:25');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `insertCache` AFTER INSERT ON `posts` FOR EACH ROW update caches set cached='1' where id='1' */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `sections`
--

DROP TABLE IF EXISTS `sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shortName` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` tinyint(4) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `backupA` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `backupB` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `backupC` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sections`
--

LOCK TABLES `sections` WRITE;
/*!40000 ALTER TABLE `sections` DISABLE KEYS */;
INSERT INTO `sections` VALUES (1,'绝对领域','绝对领域',1,'绝对领域版块',NULL,NULL,NULL,'2015-04-07 16:00:00','2015-04-07 16:00:00');
/*!40000 ALTER TABLE `sections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nickname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `state` tinyint(1) NOT NULL,
  `backupA` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `backupB` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `backupC` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'胡桃沢梅','胡桃沢梅','/avatar/small/1.jpeg','admin@atfield.club','$2y$10$75e9Hdu3OYYWYpseXf.Ta.Rm7zsoEW3tC2OckY9OMGwUUHVdLLDz6',0,'','','','cRtVPLi8Lnssi2wggst9SsAUAIDjMrZwZ6DGJ1Jn6cVo2JsDCzoQRH5p98Q7','2015-04-03 11:05:21','2015-04-05 18:34:11');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-04-09  0:53:35
