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
-- Table structure for table `albums`
--

DROP TABLE IF EXISTS `albums`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `albums` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `author` int(11) NOT NULL,
  `backupA` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `backupB` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `backupC` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `albums`
--

LOCK TABLES `albums` WRITE;
/*!40000 ALTER TABLE `albums` DISABLE KEYS */;
INSERT INTO `albums` VALUES (1,'二次元','/avatar/default.jpg','阿斯风速达风速达风速达风速达飞洒da',2,'','','','2015-04-12 16:06:06','2015-04-12 16:06:06'),(2,'不吃饭会饿','/avatar/default.jpg','撒旦飞洒地方撒旦发撒旦',2,'','','','2015-04-12 16:13:40','2015-04-12 16:13:40'),(3,'默认相册','/avatar/default.jpg','',1,'','','','2015-04-26 17:31:37','2015-04-26 17:31:37');
/*!40000 ALTER TABLE `albums` ENABLE KEYS */;
UNLOCK TABLES;

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
INSERT INTO `caches` VALUES (1,1,'是否缓存');
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
-- Table structure for table `collects`
--

DROP TABLE IF EXISTS `collects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `collects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author` int(11) NOT NULL,
  `imgUrl` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `albumId` int(11) NOT NULL,
  `backupA` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `backupB` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `backupC` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `collects`
--

LOCK TABLES `collects` WRITE;
/*!40000 ALTER TABLE `collects` DISABLE KEYS */;
INSERT INTO `collects` VALUES (4,2,'/umeditor/php/upload/20150407/14283493385627.jpg','测试,test',1,'','','','2015-04-12 20:51:55','2015-04-12 20:51:55'),(6,2,'/umeditor/php/upload/20150407/14283493374652.jpg','测试,test',2,'','','','2015-04-12 20:52:31','2015-04-12 20:52:31'),(7,1,'/umeditor/php/upload/20150407/14283493374652.jpg','测试,test',3,'','','','2015-04-26 17:32:10','2015-04-26 17:32:10'),(8,1,'/umeditor/php/upload/20150407/14283493385627.jpg','测试,test',3,'','','','2015-04-26 17:32:20','2015-04-26 17:32:20'),(9,1,'/umeditor/php/upload/20150407/14283493406442.jpg','测试,test',3,'','','','2015-04-26 17:32:27','2015-04-26 17:32:27');
/*!40000 ALTER TABLE `collects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `postId` int(5) NOT NULL,
  `parentId` int(5) NOT NULL,
  `userId` int(5) NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isRead` tinyint(1) NOT NULL COMMENT '1 有新回复 0 整藏',
  `backupB` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `backupC` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,17,0,1,'这是一条测试数据',0,'','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,17,0,1,'这是一条测试数据2',0,'','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,17,0,1,'这是一条测试数据3',0,'','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,17,0,1,'这是一条测试数据4',0,'','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,17,0,1,'这是一条测试数据5',0,'','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,17,0,1,'这是一条测试数据6',0,'','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(7,17,1,1,'这是一条测试数据7',0,'','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(8,17,1,1,'这是一条测试数据8',0,'','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(9,17,8,1,'这是一条测试数据9',0,'','','0000-00-00 00:00:00','2015-04-26 14:14:11'),(10,17,8,1,'这是一条测试数据 10',0,'','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(11,17,8,1,'这是一条测试数据 11',0,'','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(12,17,9,1,'这是一条测试数据 12',0,'','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(13,17,0,2,'这是一条测试 测试阿 测试阿测试阿 ',0,'','','2015-04-12 09:54:59','2015-04-12 09:54:59'),(14,17,12,2,'@胡桃沢梅:测试阿 测试阿 万恶后iwewe ',0,'','','2015-04-12 09:55:15','2015-04-12 09:55:15');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '/group/small/default.jpg',
  `shortName` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` int(5) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `backupA` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `backupB` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `backupC` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (2,'二次元是没有胖子的','/group/small/21428643262.jpeg','二次元是没有胖子的',2,'你见过二次元的胖子么？什么，你见过？骚年该醒来搬砖了',NULL,NULL,NULL,'2015-04-09 21:21:02','2015-04-09 21:21:02'),(3,'紧密团结在大腿袜的周围','/group/small/21428707967.jpeg','萌萌测试小组',2,'袜子',NULL,NULL,NULL,'2015-04-10 15:19:27','2015-04-10 15:19:27');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
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
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2015_04_03_161844_create_posts_table',1),('2015_04_04_143946_create_category_table',2),('2015_04_07_160704_create_comments_table',3),('2015_04_08_145014_create_sections_table',4),('2015_04_09_204932_create_relations_table',5),('2015_04_09_220041_create_groups_table',6),('2015_04_12_225434_create_collects_table',7),('2015_04_12_232700_create_albums_table',8);
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
  `category` tinyint(2) DEFAULT '1',
  `author` int(10) NOT NULL,
  `view` int(5) DEFAULT NULL,
  `state` tinyint(1) NOT NULL,
  `type` tinyint(4) DEFAULT NULL COMMENT '1:小组 2:版块',
  `forumId` int(5) DEFAULT NULL,
  `isRead` tinyint(1) NOT NULL COMMENT '1 有新回复 0 正常',
  `isTop` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'测试数据1','<p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150406/1428297273610.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150406/1428297273610.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150406/14282972745413.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150406/14282972745413.jpg\\\" style=\\\"\\\"/></p><p><br/></p>','测试,test',1,1,7,1,2,1,0,3,'2015-04-05 21:14:39','2015-04-28 08:07:21'),(2,'测试数据2','<p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150406/14282973584775.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150406/14282973584775.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150406/14282973602129.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150406/14282973602129.jpg\\\" style=\\\"\\\"/></p><p><br/></p>','测试,test',2,1,NULL,1,2,1,0,2,'2015-04-05 21:16:06','2015-04-05 21:16:06'),(3,'测试3','<p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283456293783.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283456293783.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283456315081.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283456315081.jpg\\\" style=\\\"\\\"/></p><p><br/></p>','测试,test',1,1,NULL,1,2,3,0,0,'2015-04-06 10:40:42','2015-04-06 10:40:42'),(4,'测试数据1','<p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283456619142.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283456619142.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283456638582.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283456638582.jpg\\\" style=\\\"\\\"/></p><p><br/></p>','test1,test2',2,1,NULL,1,2,4,0,0,'2015-04-06 10:41:09','2015-04-06 10:41:09'),(5,'测试数据4','<p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/142834568387.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/142834568387.jpg\\\"/></p>','测试,test',1,1,NULL,1,2,1,0,1,'2015-04-06 10:41:28','2015-04-06 10:41:28'),(6,'测试数据5','<p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283456997558.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283456997558.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457012766.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457012766.jpg\\\" style=\\\"\\\"/></p><p><br/></p>','测试,test',1,1,2,1,2,1,0,2,'2015-04-06 10:41:45','2015-05-03 14:10:12'),(7,'测试数据6','<p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457171029.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457171029.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457206990.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457206990.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457225372.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457225372.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457241885.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457241885.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457273174.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457273174.jpg\\\" style=\\\"\\\"/></p><p><br/></p>','测试,test',1,1,NULL,1,2,1,0,0,'2015-04-06 10:42:13','2015-04-06 10:42:13'),(8,'测试数据8','<p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457461241.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457461241.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457485956.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457485956.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457503945.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457503945.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457532034.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457532034.jpg\\\" style=\\\"\\\"/></p><p><br/></p>','test1,test2',1,1,135,1,2,3,0,0,'2015-04-06 10:42:38','2015-04-06 10:42:38'),(9,'测试数据10','<p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457694595.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457694595.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457719128.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457719128.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457738209.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457738209.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457755098.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457755098.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457785052.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283457785052.jpg\\\" style=\\\"\\\"/></p><p><br/></p>','test1,test2',1,1,NULL,1,1,2,0,0,'2015-04-06 10:43:03','2015-04-06 10:43:03'),(10,'测试数据11','<p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283458019654.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283458019654.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283458037760.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283458037760.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283458052358.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283458052358.jpg\\\" style=\\\"\\\"/></p><p><br/></p>','test1,test2',1,1,NULL,1,1,3,0,0,'2015-04-06 10:43:29','2015-04-06 10:43:29'),(11,'测试数据13','<p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283458225202.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283458225202.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283458246475.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283458246475.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283458269480.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283458269480.jpg\\\" style=\\\"\\\"/></p><p><br/></p>','测试,test',1,1,NULL,1,1,3,0,0,'2015-04-06 10:43:52','2015-04-06 10:43:52'),(12,'测试数据14','<p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283458435837.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283458435837.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283458457397.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283458457397.jpg\\\" style=\\\"\\\"/></p><p><br/></p>','测试,test',1,1,NULL,1,2,6,0,0,'2015-04-06 10:44:10','2015-04-06 10:44:10'),(13,'测试数据15','<p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/1428345867210.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/1428345867210.jpg\\\"/></p>','test1,test2',2,1,NULL,1,1,2,0,0,'2015-04-06 10:44:32','2015-04-06 10:44:32'),(14,'测试数据16','<p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283458881828.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283458881828.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283458899666.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283458899666.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283458915176.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283458915176.jpg\\\" style=\\\"\\\"/></p><p><br/></p>','test1,test2',2,1,NULL,1,2,7,0,0,'2015-04-06 10:44:56','2015-04-06 10:44:56'),(15,'测试数据16','<p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283459075666.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283459075666.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283459097573.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283459097573.jpg\\\" style=\\\"\\\"/></p><p><br/></p>','test1,test2',1,1,NULL,1,1,2,0,0,'2015-04-06 10:45:13','2015-04-06 10:45:13'),(16,'测试数据17','<p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283459246046.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283459246046.jpg\\\"/></p>','test1,test2',1,1,88,1,2,2,0,0,'2015-04-06 10:45:29','2015-04-06 10:45:29'),(17,'测试触发器','<p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283493374652.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283493374652.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283493385627.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283493385627.jpg\\\" style=\\\"\\\"/></p><p><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283493406442.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150407/14283493406442.jpg\\\" style=\\\"\\\"/></p><p><br/></p>','测试,test',1,1,14,1,1,2,0,0,'2015-04-06 11:42:25','2015-04-28 12:16:19'),(18,'这是一篇正常向的测试数据','<p style=\\\"text-align: center;\\\"><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150429/14302527337059.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150429/14302527337059.jpg\\\" style=\\\"\\\"/></p><p style=\\\"text-align: center;\\\"><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150429/1430252735742.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150429/1430252735742.jpg\\\" style=\\\"\\\"/></p><p style=\\\"text-align: center;\\\"><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150429/14302527367876.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150429/14302527367876.jpg\\\" style=\\\"\\\"/></p><p>这是一篇正常向的测试数据。。</p>','美女,动漫,图片',1,11,1,1,2,1,0,0,'2015-04-28 12:26:03','2015-04-28 14:05:23'),(19,'这是一篇正常向的测试数据2','<p style=\\\"text-align: center;\\\"><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150429/14302529551387.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150429/14302529551387.jpg\\\" style=\\\"\\\"/></p><p style=\\\"text-align: center;\\\"><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150429/14302529578274.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150429/14302529578274.jpg\\\" style=\\\"\\\"/></p><p style=\\\"text-align: center;\\\"><img src=\\\"http://127.0.0.1/umeditor/php/upload/20150429/14302529596694.jpg\\\" _src=\\\"http://127.0.0.1/umeditor/php/upload/20150429/14302529596694.jpg\\\" style=\\\"\\\"/></p><p>这是一篇正常向的测试数据。。。。</p>','美女,动漫,图片',1,11,6,1,2,1,0,0,'2015-04-28 12:29:39','2015-05-03 16:47:47');
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
-- Table structure for table `relations`
--

DROP TABLE IF EXISTS `relations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `relations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author` tinyint(4) NOT NULL,
  `followId` int(5) DEFAULT NULL,
  `type` tinyint(1) DEFAULT NULL COMMENT '1、文章 2、好友 3、群组 4、图片',
  `backupB` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `backupC` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `relations`
--

LOCK TABLES `relations` WRITE;
/*!40000 ALTER TABLE `relations` DISABLE KEYS */;
INSERT INTO `relations` VALUES (7,2,1,2,NULL,NULL,'2015-04-09 18:49:19','2015-04-09 18:49:19'),(8,2,3,2,NULL,NULL,'2015-04-09 18:53:26','2015-04-09 18:53:26'),(9,2,1,1,NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(10,2,2,1,NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(11,2,3,3,NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(12,2,2,3,NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(16,1,2,2,NULL,NULL,'2015-04-12 22:30:29','2015-04-12 22:30:29');
/*!40000 ALTER TABLE `relations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sections`
--

DROP TABLE IF EXISTS `sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shortname` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` int(5) NOT NULL,
  `avatar` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `number` tinyint(2) NOT NULL,
  `backupA` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `backupB` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `backupC` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sections`
--

LOCK TABLES `sections` WRITE;
/*!40000 ALTER TABLE `sections` DISABLE KEYS */;
INSERT INTO `sections` VALUES (1,'资讯、新番','资讯、新番',1,'/avatar/default.jpg','二次元、三次元资讯全掌握',1,NULL,NULL,NULL,'2015-04-07 16:00:00','2015-04-07 16:00:00'),(2,'绝对领域、cosplay图片','绝对领域、cosplay图片',1,'/avatar/default.jpg','我是勤劳的小蜜蜂，哦不，搬运工',2,NULL,NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'二次元图区','二次元图区',1,'/avatar/default.jpg','我是勤劳的搬运工',4,NULL,NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,'旧番、补番综合区','旧番、补番综合区',1,'/avatar/default.jpg','过度怀旧是一种病，但我并不想治',5,NULL,NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,'电影综合讨论区','电影综合讨论区',1,'/avatar/default.jpg','豆瓣装逼250，你看了多少',6,NULL,NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,'少女祈祷中','少女祈祷中',1,'/avatar/default.jpg','要节操还是要水？',7,NULL,NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(7,'少女有话说','少女有话说',1,'/avatar/default.jpg','本站全手写，有意见就提',8,NULL,NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(8,'过膝袜',NULL,1,'/avatar/default.jpg','大腿袜、过膝袜等领域用品晒图。啥，你晒蓝白条也阔以',3,NULL,NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00');
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
  `activeCode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `backupB` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `backupC` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'胡桃沢梅','胡桃沢梅','/avatar/small/1.jpeg','admin@atfield.club','$2y$10$75e9Hdu3OYYWYpseXf.Ta.Rm7zsoEW3tC2OckY9OMGwUUHVdLLDz6',1,'','','','9LHKFjnzPI09obQIivPuiFPTtCsW3SeWDk2SklPCoRjU2XxK6cUGlALNrmGE','2015-04-03 11:05:21','2015-04-26 17:56:10'),(2,'胡桃小泽梅','胡桃小泽梅','/avatar/small/2.jpeg','admin@uuuuj.com','$2y$10$uNl9vCmkLo57UhKG/fbASOgq8DcmhtKW.ER0ApdOMtASuno3RJN4W',1,'','','','CzCdDfdnoal84GDLFvXmpGC34v2BFsb2EX4t50ph7iaZGXyjsmNKU8FZbPGw','2015-04-09 07:07:25','2015-04-12 22:25:41'),(3,'测试帐号1','测试帐号1','/avatar/default.jpg','example@qq.com','$2y$10$A63f67bmX.C1RR8Stg3QLO/Y9aUOC1t6uYkyNYujuj0jFESNrrnbC',1,'','','',NULL,'2015-04-09 18:52:53','2015-04-09 18:52:53'),(11,'黑沼爽子','黑沼爽子','/avatar/default.jpg','17604384@qq.com','$2y$10$.JIbEajrYhUztpQCRcD.C.taelbuKuXlkn6IVbGJFwGHn9xCWSIWW',1,'$2y$10$I0jXPlQlxwUenBo10P8HYeUY8aSqFDn3OWOX4qFHaPIrXLu5rnliS','','',NULL,'2015-04-27 10:57:49','2015-04-27 12:34:13');
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

-- Dump completed on 2015-05-04  9:25:21
