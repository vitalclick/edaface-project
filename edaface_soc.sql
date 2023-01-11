-- MySQL dump 10.13  Distrib 5.7.37, for Linux (x86_64)
--
-- Host: localhost    Database: evillage_soc
-- ------------------------------------------------------
-- Server version	5.7.37-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `addons`
--

DROP TABLE IF EXISTS `addons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `addons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `unique_identifier` varchar(255) NOT NULL,
  `version` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `about` longtext,
  `purchase_code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addons`
--

LOCK TABLES `addons` WRITE;
/*!40000 ALTER TABLE `addons` DISABLE KEYS */;
INSERT INTO `addons` (`id`, `name`, `unique_identifier`, `version`, `status`, `created_at`, `updated_at`, `about`, `purchase_code`) VALUES (1,'Jitsi live class','jitsi-live-class','1.0',1,1387670400,NULL,'Jitsi is a set of open-source projects. Jitsi Video bridge passes everyone’s video and audio to all participants, rather than mixing them first.',''),(2,'Offline Payment Gateway','offline_payment','1.1',1,1419206400,NULL,'Offline payment gateway allows you to take payment through various local payment gateways.',''),(3,'Paystack Payment Gateway','paystack','1.2',1,1545436800,NULL,'','');
/*!40000 ALTER TABLE `addons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `applications`
--

DROP TABLE IF EXISTS `applications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `applications` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `address` longtext,
  `phone` varchar(255) DEFAULT NULL,
  `message` longtext,
  `document` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applications`
--

LOCK TABLES `applications` WRITE;
/*!40000 ALTER TABLE `applications` DISABLE KEYS */;
/*!40000 ALTER TABLE `applications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_category`
--

DROP TABLE IF EXISTS `blog_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_category` (
  `blog_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `added_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`blog_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_category`
--

LOCK TABLES `blog_category` WRITE;
/*!40000 ALTER TABLE `blog_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `blog_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_comments`
--

DROP TABLE IF EXISTS `blog_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_comments` (
  `blog_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `comment` longtext COLLATE utf8_unicode_ci NOT NULL,
  `likes` longtext COLLATE utf8_unicode_ci NOT NULL,
  `added_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`blog_comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_comments`
--

LOCK TABLES `blog_comments` WRITE;
/*!40000 ALTER TABLE `blog_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `blog_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blogs` (
  `blog_id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `banner` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_popular` int(11) NOT NULL,
  `likes` longtext COLLATE utf8_unicode_ci NOT NULL,
  `added_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`blog_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blogs`
--

LOCK TABLES `blogs` WRITE;
/*!40000 ALTER TABLE `blogs` DISABLE KEYS */;
/*!40000 ALTER TABLE `blogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent` int(11) DEFAULT '0',
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL,
  `font_awesome_class` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `code`, `name`, `parent`, `slug`, `date_added`, `last_modified`, `font_awesome_class`, `thumbnail`) VALUES (1,'a983b43350','EdaFace SOC Curriculum',0,'edaface-soc-curriculum',1670889600,1670889600,'fas fa-book','6e17b9c52968907dccc26fe896be9489.jpg'),(2,'0f02562983','School Levels',1,'school-levels',1670889600,NULL,'fas fa-graduation-cap',NULL);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('5e843ff31fd80611ab2865d0efe2b51140e65212','102.89.22.181',1670317389,_binary '__ci_last_regenerate|i:1670317388;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('1692117bebb74f391d73af1d241c1b9ecf051222','102.89.22.181',1670317389,_binary '__ci_last_regenerate|i:1670317388;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('535bdf7f9e4217aad4b91b12ec8ee322cf151a44','102.89.22.181',1670317389,_binary '__ci_last_regenerate|i:1670317388;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('b65ce8f4691e6d2d5d7c7608abe1b900e357d53a','102.89.22.181',1670317390,_binary '__ci_last_regenerate|i:1670317388;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('21118828a6ce44a0b7e390784a0c3a4815c2bf53','102.89.22.181',1670317390,_binary '__ci_last_regenerate|i:1670317388;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('a117a546de86ea23fba9ad994c844ee80cd5cb63','102.89.22.181',1670317390,_binary '__ci_last_regenerate|i:1670317388;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('8f7c17fe0c73dba88e51c57607d32e14be419191','102.89.22.181',1670317390,_binary '__ci_last_regenerate|i:1670317388;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('baa5bd4c597caa30c96969c53aeef8472f29c898','102.89.22.181',1671872948,_binary '__ci_last_regenerate|i:1670317388;cart_items|a:2:{i:0;s:1:\"1\";i:1;s:1:\"3\";}language|s:7:\"english\";custom_session_limit|i:1672736948;user_id|s:1:\"1\";role_id|s:1:\"1\";role|s:5:\"Admin\";name|s:11:\"Super Admin\";is_instructor|s:1:\"1\";admin_login|s:1:\"1\";total_price_of_checking_out|d:20;layout|s:4:\"list\";countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}'),('5cd894d063b5db14e7bc80b9dc3ecd44dd560116','102.89.23.178',1670318668,_binary '__ci_last_regenerate|i:1670318668;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('a89c4c70e6d0c9c96fae2164827de412ed8cfd2b','51.75.169.50',1670318732,_binary '__ci_last_regenerate|i:1670318732;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('4fa7a55913430dee421a8f0762baa98082e35ec6','51.75.169.50',1670318733,_binary '__ci_last_regenerate|i:1670318732;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('3858a8e193da7c273e12d6d30d9ab8e880d38b2e','133.242.140.127',1670324147,_binary '__ci_last_regenerate|i:1670324147;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('e532161f4a4271784cd2e4ded04a3b292aaf8ba0','133.242.174.119',1670324150,_binary '__ci_last_regenerate|i:1670324150;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('62d61830ca9193896817b951ce5ab5039baeaff5','133.242.140.127',1670324170,_binary '__ci_last_regenerate|i:1670324170;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('27364e22db55d9bf9bb9df2395d244a0f62e589f','133.242.174.119',1670324172,_binary '__ci_last_regenerate|i:1670324171;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('8966e8fd5b9345ed0ce849dcf3ea375027beb7b7','34.244.203.111',1670326209,_binary '__ci_last_regenerate|i:1670326209;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('1995d8d1528103cd5033ed1fe005b004efbcd72e','34.244.203.111',1670326211,_binary '__ci_last_regenerate|i:1670326210;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('f34cf69f511a59f8112a2a52e7f6d683dda907a8','34.244.203.111',1670326212,_binary '__ci_last_regenerate|i:1670326212;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";layout|s:4:\"list\";'),('9c5daacadbbf233385a3c1d96be3b58d8ce291b9','34.244.203.111',1670326215,_binary '__ci_last_regenerate|i:1670326215;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";layout|s:4:\"list\";'),('ad049bdd7b6c47e7a3837ffbabcf47a55ae10f3d','34.244.203.111',1670326218,_binary '__ci_last_regenerate|i:1670326218;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|d:0;'),('1da1cae8ea9dc4cc96eefbb046669c015a23e7a4','34.244.203.111',1670326222,_binary '__ci_last_regenerate|i:1670326222;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|d:0;'),('5b0e6e270782dd5a7697cce18dcb1fabb3abc215','34.244.203.111',1670326227,_binary '__ci_last_regenerate|i:1670326227;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('fc5ebb999fbcfc6619dd761ba3ae7b759cbc91ef','34.244.203.111',1670326234,_binary '__ci_last_regenerate|i:1670326234;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('ad4ed7ae6aa18d0ff9ff710f4a50ec02bed7430a','34.244.203.111',1670326236,_binary '__ci_last_regenerate|i:1670326236;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('3619b84254bbe2cf9f7b593fe5cd47a2c110ac69','34.244.203.111',1670326246,_binary '__ci_last_regenerate|i:1670326246;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('f9240b24102f3e0bc65d4b9ef89bd66ee5cef495','150.136.250.6',1670408422,_binary '__ci_last_regenerate|i:1670408422;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('7c6120d57bc2d5a7b585896a0c7304156b69ce2c','51.255.62.0',1670426705,_binary '__ci_last_regenerate|i:1670426705;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('c0efd6015e0c212c62abc4a023f17bd1c1d313ed','51.255.62.2',1670426705,_binary '__ci_last_regenerate|i:1670426705;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('6afb976ee0b2193a290f4eb3375ef7ed4b5835c4','51.255.62.6',1670426705,_binary '__ci_last_regenerate|i:1670426705;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('ac94e2f60b9a337a785217842b492ba110b58b2c','51.255.62.5',1670426705,_binary '__ci_last_regenerate|i:1670426705;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('ba73223b298bd8486ca7d0e288a9df2cd6f0306f','51.254.49.101',1670434485,_binary '__ci_last_regenerate|i:1670434485;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('5e7f83222564d32bd2fef4d791c1774f8642159b','51.254.49.106',1670434499,_binary '__ci_last_regenerate|i:1670434499;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('57f5449ee1be8d030a3741911e3f6548328d411f','209.141.36.231',1670452726,_binary '__ci_last_regenerate|i:1670452726;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('9e4b23f1625caedaf91ccd8a6209dad57f2ee06c','209.141.35.128',1670452728,_binary '__ci_last_regenerate|i:1670452727;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('a5eb754ab17fe0b38355f09a2490cc5efc677f5e','183.129.153.157',1670471499,_binary '__ci_last_regenerate|i:1670471499;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('4e92f0f6b59887c8373a607c8af4e54c71a45402','183.129.153.157',1670479203,_binary '__ci_last_regenerate|i:1670479203;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('728b4d6a4fe7921f42c8f77ee3610741c6440f20','180.163.220.4',1670514245,_binary '__ci_last_regenerate|i:1670514245;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('e1481db27df02ce1220485c72d65642cc0e61d93','180.163.220.54',1670514252,_binary '__ci_last_regenerate|i:1670514252;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('d66a41ddd2ed45c8b01cd4d3813c81c9f1a5f592','27.115.124.70',1670514331,_binary '__ci_last_regenerate|i:1670514331;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('7a28a22613542fd48e13ef3aabbb9bd0f2347fc9','27.115.124.70',1670514332,_binary '__ci_last_regenerate|i:1670514332;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('f3fc7420b41d67c198006b3c4b21f332631c3187','51.255.62.15',1670546958,_binary '__ci_last_regenerate|i:1670546958;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('bbb1d0e96316ea95ff3c0c217789aa7155a5e2ae','51.255.62.11',1670546958,_binary '__ci_last_regenerate|i:1670546958;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('6f020714ec8bf49aa370c867a3c0a842cb7c8fcc','51.255.62.11',1670546958,_binary '__ci_last_regenerate|i:1670546958;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('ed3b19fc2e755d3b25a4694d6fd46ff93ec25496','51.255.62.14',1670546958,_binary '__ci_last_regenerate|i:1670546958;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('b05577f48e4519e35a8aeeb34662c776b31b9af7','51.255.62.4',1670546958,_binary '__ci_last_regenerate|i:1670546958;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('bf94ca73dc08a78f1128ecc1e0ccc8fe8cbf2e18','51.255.62.14',1670546958,_binary '__ci_last_regenerate|i:1670546958;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('1421391aeebe135ee82fc05bbe33245fb3ba067b','51.255.62.1',1670546958,_binary '__ci_last_regenerate|i:1670546958;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('f012326debbe9f1046ca577218df3935b1498879','51.255.62.2',1670546958,_binary '__ci_last_regenerate|i:1670546958;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|d:0;'),('b1103da8833dd9461d4a7f613aee6112fe49e145','51.255.62.4',1670546958,_binary '__ci_last_regenerate|i:1670546958;countCall|i:1;__ci_vars|a:2:{s:9:\"countCall\";s:3:\"new\";s:13:\"error_message\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";error_message|s:21:\"No search value found\";'),('eb3bcc881be713fdfab06600269adda308119d7a','51.255.62.12',1670546958,_binary '__ci_last_regenerate|i:1670546958;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('97cc732feb5a12cb919e44ef9282f368a0666837','51.255.62.12',1670546958,_binary '__ci_last_regenerate|i:1670546958;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:1:{i:0;N;}language|s:7:\"english\";'),('4c18c42a5fa43a53af56d6d884bd1b1a61df7bfd','51.255.62.10',1670546958,_binary '__ci_last_regenerate|i:1670546958;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('3f2b0a3ab0bbf46072d12089e8f5afa5c40706b7','51.255.62.11',1670546958,_binary '__ci_last_regenerate|i:1670546958;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('e3e3687493a3c4474539889406dd6387985ff05a','51.255.62.15',1670546958,_binary '__ci_last_regenerate|i:1670546958;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";layout|s:4:\"list\";'),('047e643d151249ce1ebc65cd9934aa1ef11943e2','51.255.62.13',1670546995,_binary '__ci_last_regenerate|i:1670546995;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('eeb3ed91d5ca59209179f4212be18195bb9ca428','51.255.62.6',1670546995,_binary '__ci_last_regenerate|i:1670546995;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('8f9163a6fd1e9208fd4f75eb89042882b50729cb','51.255.62.7',1670546995,_binary '__ci_last_regenerate|i:1670546995;countCall|i:1;__ci_vars|a:2:{s:9:\"countCall\";s:3:\"new\";s:13:\"error_message\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";error_message|s:21:\"No search value found\";'),('1c6175170782e28eae7512e970e0b8d89adab9c6','51.255.62.8',1670546995,_binary '__ci_last_regenerate|i:1670546995;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('611d58e71eefa670adc0b30ac5b30e33482524ee','51.255.62.0',1670546995,_binary '__ci_last_regenerate|i:1670546995;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('45caf3191389844b6f6886131b5afe22920cc182','51.255.62.7',1670546995,_binary '__ci_last_regenerate|i:1670546995;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('49d7e6c359bbc1181ed44ae08678d10da30438e6','51.255.62.9',1670546995,_binary '__ci_last_regenerate|i:1670546995;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|d:0;'),('c2aef811bb8bc0aa550791e15b7f5e4bb8580533','51.255.62.14',1670546995,_binary '__ci_last_regenerate|i:1670546995;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('eda4321be675919cc472edbabd6730e3a081c007','51.255.62.0',1670546995,_binary '__ci_last_regenerate|i:1670546995;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('e12b9d8f272b24d667da567a7f3f6eef5b875c58','51.255.62.10',1670546995,_binary '__ci_last_regenerate|i:1670546995;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('9afa54a98e2404a80e5e6493970f48fe0d2c0b94','51.255.62.15',1670546995,_binary '__ci_last_regenerate|i:1670546995;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";layout|s:4:\"list\";'),('0f654b4c5e831743f00f950798d0049fee787de3','51.255.62.4',1670546995,_binary '__ci_last_regenerate|i:1670546995;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('28e8048ec7e2b5653a79ece0a0f7e850d75930f2','51.255.62.4',1670546995,_binary '__ci_last_regenerate|i:1670546995;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('cec90f5e6ab74bb3871bddc2a36df9efe572cb88','51.255.62.9',1670546995,_binary '__ci_last_regenerate|i:1670546995;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:1:{i:0;N;}language|s:7:\"english\";'),('54a56b3e055ea0c6dfa9bdb98b9fdc8b34fb269e','51.255.62.3',1670546995,_binary '__ci_last_regenerate|i:1670546995;countCall|i:1;__ci_vars|a:2:{s:9:\"countCall\";s:3:\"new\";s:13:\"error_message\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";error_message|s:21:\"No search value found\";'),('6d5b23880fc928c7f9241bb1f6db6233b8d1dd25','51.255.62.7',1670546996,_binary '__ci_last_regenerate|i:1670546995;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|d:0;'),('ae1a57c03e1527138d9e9665c64c33b732668189','51.255.62.7',1670546996,_binary '__ci_last_regenerate|i:1670546995;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('850ea0b149a5e423738a8cde9252bb12c57b67cd','51.255.62.1',1670546996,_binary '__ci_last_regenerate|i:1670546995;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('e4e4eb8b186714a95a44037129151737ca08299f','51.255.62.13',1670546996,_binary '__ci_last_regenerate|i:1670546995;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('bd15731d446de72c76eabe7b6f78dcf8351f8b98','51.255.62.12',1670546996,_binary '__ci_last_regenerate|i:1670546995;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('0549b23d9f806658f6c114ec3776c13516563cbd','51.255.62.0',1670546996,_binary '__ci_last_regenerate|i:1670546995;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('076b5e65010df571457db51dc615b30eee8fc226','51.255.62.11',1670546996,_binary '__ci_last_regenerate|i:1670546996;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('955e59f23fb4ddc88d694300ad5f018b607388d2','51.255.62.1',1670546996,_binary '__ci_last_regenerate|i:1670546996;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:1:{i:0;N;}language|s:7:\"english\";'),('0636dbfbe7357fb5ee0a2b60d64367cbd2954e97','51.255.62.11',1670546996,_binary '__ci_last_regenerate|i:1670546996;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('cbd92ff994443fda0bd6405826fcd5a4870411a1','51.255.62.10',1670546996,_binary '__ci_last_regenerate|i:1670546996;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('047ff13fc829d8fb8454c09946eae1b0f2ecab0b','51.255.62.14',1670546997,_binary '__ci_last_regenerate|i:1670546995;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";layout|s:4:\"list\";'),('23f364ec41a83ac975069ac99374d5db0428adac','51.254.49.107',1670551994,_binary '__ci_last_regenerate|i:1670551994;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('037967db9ecd26b1e6e48f4a5bb54dd73d519879','51.254.49.107',1670551994,_binary '__ci_last_regenerate|i:1670551994;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('352992fb58efef48c3b84eb3a707d5388f35d038','87.236.176.231',1670590206,_binary '__ci_last_regenerate|i:1670590206;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('410dad3ea6e4e7d08f1ad1345e20488f734c7660','205.185.122.184',1670775689,_binary '__ci_last_regenerate|i:1670775689;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('0f36c830583b270205c602aed9c456097fe08c9e','205.185.116.89',1670775692,_binary '__ci_last_regenerate|i:1670775692;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('bbc980a8e1b60adc9289d54a446120c0b251ee49','27.115.124.45',1670863753,_binary '__ci_last_regenerate|i:1670863753;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('cac41061cc0bdf30f992ea33ff9cd4b40e7e6c87','27.115.124.45',1670863796,_binary '__ci_last_regenerate|i:1670863796;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('a5f11674e9a5864410bf942317507fc4e3f0a3ec','42.236.10.117',1670863805,_binary '__ci_last_regenerate|i:1670863805;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('a7e38b53bb6ae4dd83851a2b3e393beca529ca3f','180.163.220.5',1670863809,_binary '__ci_last_regenerate|i:1670863809;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('91d7fe6161767f658db9e14b1875021c4999659b','180.163.220.5',1670863823,_binary '__ci_last_regenerate|i:1670863823;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('0d2ea251d56d1a1803dcb919cd286e835bb1bb91','43.142.237.137',1670871080,_binary '__ci_last_regenerate|i:1670871080;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('28513b6e8b3e084d7d7df3d7a54f403fdf69cf39','27.115.124.101',1670927351,_binary '__ci_last_regenerate|i:1670927349;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"old\";}cart_items|a:0:{}language|s:7:\"english\";'),('c96ead90d2ad3b83d74f5c612768ce66ea26dd17','87.236.176.68',1670937537,_binary '__ci_last_regenerate|i:1670937537;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('b72e53edd533b7ee1ae6183fcc2d9e0a4f3e9043','167.71.186.170',1671064658,_binary '__ci_last_regenerate|i:1671064658;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('342c7ab42ca14a4c0db1d74eca0b4f63abc37895','45.55.65.51',1671085853,_binary '__ci_last_regenerate|i:1671085852;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('5025bd78459f41aabad43b684e745e369361346e','180.163.220.66',1671262382,_binary '__ci_last_regenerate|i:1671262381;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('945933132c2ac34fd5380a61cc3c707afb4820cc','42.236.10.93',1671262385,_binary '__ci_last_regenerate|i:1671262385;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('977dfc99e02793c3927fa62ec51ab0046c4f2ca8','180.163.220.66',1671262386,_binary '__ci_last_regenerate|i:1671262385;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"old\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('7dd6b906ead8fe2f20786e0c8f1a7a1c87e30fa9','42.236.10.93',1671262395,_binary '__ci_last_regenerate|i:1671262395;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('c155b57d880439cad322789d2aca7e28180ae824','180.163.220.67',1671262396,_binary '__ci_last_regenerate|i:1671262396;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";'),('b48641993f35ca071b552cee1fc601e15cab4d43','27.115.124.38',1671262409,_binary '__ci_last_regenerate|i:1671262409;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('0ba4958c01f93c9fbc9e1e66a23dd12c22003372','27.115.124.6',1671262416,_binary '__ci_last_regenerate|i:1671262416;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('3f6a38984d683da6ee4b60a546349d9e087e61c4','42.236.10.125',1671262507,_binary '__ci_last_regenerate|i:1671262507;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('d8d321c1b6dc7c8d6c0fc01a7195cd92e59c2ecb','27.115.124.45',1671262522,_binary '__ci_last_regenerate|i:1671262522;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('46cf88866a96639e9bb83872e6228f117b77d14d','27.115.124.38',1671262540,_binary '__ci_last_regenerate|i:1671262530;cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}'),('3100098753c724b9acf896cf1dd0cdb718e0b9c8','102.89.32.25',1671361843,_binary '__ci_last_regenerate|i:1671361843;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('efe05b3a8ef1c72d1569a797ec4a70bf498bc3f9','87.236.176.39',1671418018,_binary '__ci_last_regenerate|i:1671418018;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('2c241991e78a75a9dfbc1375b88eb60641cb0a36','27.115.124.109',1671443280,_binary '__ci_last_regenerate|i:1671443269;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"old\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('2903ae5f9b7e827a9fb901a0173978f17a081b3c','27.115.124.101',1671443291,_binary '__ci_last_regenerate|i:1671443291;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('17dc4f400f150a8362d3418e142074f9d812ac07','42.236.10.78',1671443332,_binary '__ci_last_regenerate|i:1671443323;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"old\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('eef72517b4e1402caf0a91fe3985de9556f65bad','42.236.10.84',1671443351,_binary '__ci_last_regenerate|i:1671443342;cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}'),('0f1f832fcac7c7511e1b49492fc07fde312dceaa','180.163.220.66',1671443479,_binary '__ci_last_regenerate|i:1671443479;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('144431a2cd14ac982817b946ac5c630279f865b3','180.163.220.66',1671443492,_binary '__ci_last_regenerate|i:1671443492;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('8a1d3c904d925378fa00e007bba988e369f444f2','77.111.247.71',1671870984,_binary '__ci_last_regenerate|i:1671451991;cart_items|a:0:{}language|s:7:\"english\";layout|s:4:\"list\";total_price_of_checking_out|i:0;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}'),('7fae57824fcb9e158cf6186825db77d1171fcdcb','209.141.49.169',1671572684,_binary '__ci_last_regenerate|i:1671572684;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('124126ae6d54f27df205eb4b104ed024396c0ab2','205.185.116.89',1671572742,_binary '__ci_last_regenerate|i:1671572684;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"old\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('59c089401dc0173d3ce3328c46e4b02beb86bb29','209.141.49.169',1671572707,_binary '__ci_last_regenerate|i:1671572707;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('a60ceed1087569d72db33c1f244217f357a3e90a','209.141.36.231',1671572708,_binary '__ci_last_regenerate|i:1671572708;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('8d7849a1307d8d98df38871ef55f2f6ac3d19367','209.141.51.222',1671572737,_binary '__ci_last_regenerate|i:1671572737;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('15dbeeaebf5ec41304245abba7290ca5ee584ee4','205.185.122.184',1671572738,_binary '__ci_last_regenerate|i:1671572738;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('264899cc46c3dfd3ecc4f3615120349a78f54a81','209.141.35.128',1671572741,_binary '__ci_last_regenerate|i:1671572740;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('d1115c1b3534fdf3e896898d9474f4cb263d9858','27.115.124.101',1671612489,_binary '__ci_last_regenerate|i:1671612489;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"old\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('e28f0ab1e11e36b2a3a450a1105f7b0e5a163619','27.115.124.101',1671612497,_binary '__ci_last_regenerate|i:1671612496;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"old\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('1b29094a819fcb9daeda2fd4ce498d2350c97434','42.236.10.125',1671626870,_binary '__ci_last_regenerate|i:1671626870;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('1bb682f4dcc045a1f540723c2c00f323b91e57f1','42.236.10.117',1671626880,_binary '__ci_last_regenerate|i:1671626880;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('e41661853e696aca4eeeb681abe5eed22233bb9d','42.236.10.106',1671626949,_binary '__ci_last_regenerate|i:1671626949;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('6e6abd26965ab2d86a788a32f2b41c7cfd5de765','42.236.10.114',1671626957,_binary '__ci_last_regenerate|i:1671626957;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('924942a9080f8e13a1382ca1ee21d0d61636775d','180.163.220.66',1671627047,_binary '__ci_last_regenerate|i:1671627047;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('9926f27b8a4438d4a55e54725e211e280d40ec41','180.163.220.67',1671627061,_binary '__ci_last_regenerate|i:1671627061;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('fb51af415930bdc4232b1e623dd23a4aa805955b','42.236.10.93',1671648360,_binary '__ci_last_regenerate|i:1671648360;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}'),('d46f0b8e5295d9dad02b3d4c46492c0df6dc9f38','42.236.10.75',1671648374,_binary '__ci_last_regenerate|i:1671648374;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"old\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('6b4af926e5b3eeeb485960a87f714595f38bcd00','102.89.33.88',1672222474,_binary '__ci_last_regenerate|i:1671701998;cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;custom_session_limit|i:1672735163;user_id|s:1:\"2\";role_id|s:1:\"2\";role|s:4:\"User\";name|s:16:\"anthony Abidakun\";is_instructor|s:1:\"0\";user_login|s:1:\"1\";countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}'),('e5968ee50f4a0899e40e206b0518bcefc8696551','102.89.33.88',1671721600,_binary '__ci_last_regenerate|i:1671721600;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('9d9e5ba6d4e41a0f9438839d1893b322d17fecd2','102.89.47.32',1671764403,_binary '__ci_last_regenerate|i:1671764403;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('b307561567de522479f1e2ff9487fd2f4e2f2af0','102.89.47.205',1671764404,_binary '__ci_last_regenerate|i:1671764403;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('427ec60a13b54f13ca1f3fb34290ea3e78f70fd3','102.89.46.94',1671764404,_binary '__ci_last_regenerate|i:1671764404;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('b08367137455cd1ca636e2e995c53f0eb7222329','102.89.47.93',1671764404,_binary '__ci_last_regenerate|i:1671764404;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('84b5683cbd10a42b48b0bc548fa2f1af60a39685','27.115.124.45',1671869116,_binary '__ci_last_regenerate|i:1671869116;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('7f482df4dc2204a896eb3f7a34aac81b2dabeb8e','27.115.124.45',1671869117,_binary '__ci_last_regenerate|i:1671869117;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('3d8e805cedbb802ce0ba76b1b414cc27f4d04e2b','102.165.193.154',1671870777,_binary '__ci_last_regenerate|i:1671870777;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('c72836607e6ffcedc9457505a531584e406f4ab9','102.165.193.154',1671872025,_binary '__ci_last_regenerate|i:1671872025;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('763663ef8743a744082730025d7b1c19ae38c7ae','180.163.220.114',1671872051,_binary '__ci_last_regenerate|i:1671872051;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('975faa9549a794709b0ad7971665a48c29487c07','42.236.10.125',1671872135,_binary '__ci_last_regenerate|i:1671872135;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"old\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('465c5950210038bdbb1798611ee93e75c1bfd1b9','102.165.193.154',1671872676,_binary '__ci_last_regenerate|i:1671872676;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('47a88beba01592a1a10617395317fe7a87e065ed','102.165.193.154',1672087583,_binary '__ci_last_regenerate|i:1671872676;cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;custom_session_limit|i:1672477855;user_id|s:1:\"3\";role_id|s:1:\"2\";role|s:4:\"User\";name|s:11:\"MCD Testing\";is_instructor|s:1:\"0\";user_login|s:1:\"1\";countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}'),('203ea4e36283c0b4bad1a7071268f2c292e580b6','197.234.142.46',1671899318,_binary '__ci_last_regenerate|i:1671899318;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('9fa440fa56c63085fc4d0919cddd9239ed18813b','41.150.208.59',1671899656,_binary '__ci_last_regenerate|i:1671899371;cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;layout|s:4:\"grid\";countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}'),('8436975094e58ccc6ac895e5167967f2b2e207a2','93.159.230.87',1671907820,_binary '__ci_last_regenerate|i:1671907819;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('8b0db3f79e06b71e3d0055d0a9e3e61d92106dad','93.159.230.88',1671911573,_binary '__ci_last_regenerate|i:1671911573;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('960c4a03dee46c23e6002a31728bfbf6646fbfb5','93.159.230.87',1671918628,_binary '__ci_last_regenerate|i:1671918628;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('83e468cd8d99988962896fc800d865f06a03cd02','180.163.220.67',1672049729,_binary '__ci_last_regenerate|i:1672049725;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"old\";}cart_items|a:0:{}language|s:7:\"english\";'),('00678940edae42231bdcfb21d27439872b1acba0','27.115.124.101',1672049738,_binary '__ci_last_regenerate|i:1672049737;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"old\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('42740e993343db1a7912baee20f584e076e4b811','42.236.10.114',1672049767,_binary '__ci_last_regenerate|i:1672049767;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('bc22ef4b05346bdb773d5b06a5f829c8cfc484bf','42.236.10.117',1672049814,_binary '__ci_last_regenerate|i:1672049814;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('730e484d81700eb5e6d77bb0102882baa3a6c093','42.236.10.75',1672049816,_binary '__ci_last_regenerate|i:1672049815;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"old\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('8b3e155fa9661353458443eb614b679542e50c49','42.236.10.114',1672049816,_binary '__ci_last_regenerate|i:1672049816;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('5191e2e167c36fb6badf6083fb5142cc60fdb8a3','180.163.220.4',1672049820,_binary '__ci_last_regenerate|i:1672049819;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}'),('32c16138206483aa20b641611c67864690865713','205.169.39.63',1672128667,_binary '__ci_last_regenerate|i:1672128667;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('45e983d981333d40a5bfda2932269b21936a1a9a','205.169.39.63',1672129206,_binary '__ci_last_regenerate|i:1672129206;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('0a34df646188286d6e95a35c172f70a80a124faf','205.169.39.63',1672132526,_binary '__ci_last_regenerate|i:1672132526;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('463232713d96c5c1fe44358946e09c7323d8efdf','65.154.226.167',1672132621,_binary '__ci_last_regenerate|i:1672132621;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('e2da5c12e7aef9ed12282e3c55c758f553126909','212.47.251.118',1672162813,_binary '__ci_last_regenerate|i:1672162813;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('04672833f036e8362fdc98699f7f4db7c6c6cd5b','180.163.220.5',1672222585,_binary '__ci_last_regenerate|i:1672222585;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('9f81f23cf22250c4278f0ee3143d816ac27867d5','42.236.10.106',1672222625,_binary '__ci_last_regenerate|i:1672222617;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"old\";}cart_items|a:0:{}language|s:7:\"english\";'),('8e952ffc63eeff22596b15bb42f2492b12a56574','180.163.220.3',1672222630,_binary '__ci_last_regenerate|i:1672222626;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"old\";}cart_items|a:0:{}language|s:7:\"english\";'),('29c3176b8088376355a907cdecef91dc1162a663','87.236.176.122',1672455479,_binary '__ci_last_regenerate|i:1672455479;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('2d2ac2e2e75a32321fb3be0df4014ed5708feff0','205.185.116.89',1672525567,_binary '__ci_last_regenerate|i:1672525567;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('67d57bd35f83d765d984a3b5b5caf4bf20d92807','209.141.49.169',1672525580,_binary '__ci_last_regenerate|i:1672525580;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('ce29c87f8bd6031634365346b3ff1738f15f6e07','209.141.51.222',1672525624,_binary '__ci_last_regenerate|i:1672525624;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;'),('a66f8658d37f0d16c38182b925c0d7091df1356c','205.185.116.89',1672525626,_binary '__ci_last_regenerate|i:1672525626;countCall|i:1;__ci_vars|a:1:{s:9:\"countCall\";s:3:\"new\";}cart_items|a:0:{}language|s:7:\"english\";total_price_of_checking_out|i:0;');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8_unicode_ci,
  `user_id` int(11) DEFAULT NULL,
  `commentable_id` int(11) DEFAULT NULL,
  `commentable_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coupons` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `discount_percentage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `expiry_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coupons`
--

LOCK TABLES `coupons` WRITE;
/*!40000 ALTER TABLE `coupons` DISABLE KEYS */;
/*!40000 ALTER TABLE `coupons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_description` longtext COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci,
  `outcomes` longtext COLLATE utf8_unicode_ci,
  `language` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `section` longtext COLLATE utf8_unicode_ci,
  `requirements` longtext COLLATE utf8_unicode_ci,
  `price` double DEFAULT NULL,
  `discount_flag` int(11) DEFAULT '0',
  `discounted_price` double DEFAULT NULL,
  `level` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL,
  `course_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_top_course` int(11) DEFAULT '0',
  `is_admin` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_overview_provider` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` longtext COLLATE utf8_unicode_ci,
  `meta_description` longtext COLLATE utf8_unicode_ci,
  `is_free_course` int(11) DEFAULT NULL,
  `multi_instructor` int(11) NOT NULL DEFAULT '0',
  `enable_drip_content` int(11) NOT NULL,
  `creator` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course`
--

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` (`id`, `title`, `short_description`, `description`, `outcomes`, `language`, `category_id`, `sub_category_id`, `section`, `requirements`, `price`, `discount_flag`, `discounted_price`, `level`, `user_id`, `thumbnail`, `video_url`, `date_added`, `last_modified`, `course_type`, `is_top_course`, `is_admin`, `status`, `course_overview_provider`, `meta_keywords`, `meta_description`, `is_free_course`, `multi_instructor`, `enable_drip_content`, `creator`) VALUES (1,'Primary SOC','A Guide to Maximizing Crypto Investment','<p>Gives an overview of the crypto industry and the sweeping changes in the digital world.<br></p>','[\"setting up and securing your cryptocurrency account.\"]','english',1,2,'[1,2,3,4]','[\"Desire to Learn\"]',20,1,0,'advanced','1',NULL,'https://soc.evillage.world/uploads/videos/videoplayback.mp4',1670889600,1671708932,'general',1,1,'active','youtube','','Gives an overview of the crypto industry and the sweeping changes in the digital world.',1,0,0,1),(2,'Secondary SOC','A Guide to Generating Continuous Passive Incomes','<p>Exposes you to the various ways you can generate continuous passive income from the Crypto Market.<br></p>','[\"Techniques on Mining, Modified Hodling, and Trading.\"]','english',1,2,'[]','[\"Desire to Learn\"]',50,1,1,'advanced','1',NULL,'',1670889600,1671456584,'general',1,1,'active','','','Exposes you to the various ways you can generate continuous passive income from the Crypto Market.',NULL,0,0,1),(3,'Tertiary SOC','A Guide to Accelerating Wealth from Cryptos','<p>Takes you into the Crypto Market decentralised system, which is the future of global economy.<br></p>','[\"Decentralised Finance, Yield Farming, and NFT creation\"]','english',1,2,'[]','[\"Desire to Learn\"]',80,1,2,'advanced','1',NULL,'',1670889600,1671456609,'general',1,1,'active','','','Takes you into the Crypto Market decentralised system, which is the future of global economy.',NULL,0,0,1);
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `currency`
--

DROP TABLE IF EXISTS `currency`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `symbol` varchar(255) DEFAULT NULL,
  `paypal_supported` int(11) DEFAULT NULL,
  `stripe_supported` int(11) DEFAULT NULL,
  `paystack_supported` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=165 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `currency`
--

LOCK TABLES `currency` WRITE;
/*!40000 ALTER TABLE `currency` DISABLE KEYS */;
INSERT INTO `currency` (`id`, `name`, `code`, `symbol`, `paypal_supported`, `stripe_supported`, `paystack_supported`) VALUES (1,'US Dollar','USD','$',1,1,0),(2,'Albanian Lek','ALL','Lek',0,1,0),(3,'Algerian Dinar','DZD','دج',1,1,0),(4,'Angolan Kwanza','AOA','Kz',1,1,0),(5,'Argentine Peso','ARS','$',1,1,0),(6,'Armenian Dram','AMD','֏',1,1,0),(7,'Aruban Florin','AWG','ƒ',1,1,0),(8,'Australian Dollar','AUD','$',1,1,0),(9,'Azerbaijani Manat','AZN','m',1,1,0),(10,'Bahamian Dollar','BSD','B$',1,1,0),(11,'Bahraini Dinar','BHD','.د.ب',1,1,0),(12,'Bangladeshi Taka','BDT','৳',1,1,0),(13,'Barbadian Dollar','BBD','Bds$',1,1,0),(14,'Belarusian Ruble','BYR','Br',0,0,0),(15,'Belgian Franc','BEF','fr',1,1,0),(16,'Belize Dollar','BZD','$',1,1,0),(17,'Bermudan Dollar','BMD','$',1,1,0),(18,'Bhutanese Ngultrum','BTN','Nu.',1,1,0),(19,'Bitcoin','BTC','฿',1,1,0),(20,'Bolivian Boliviano','BOB','Bs.',1,1,0),(21,'Bosnia','BAM','KM',1,1,0),(22,'Botswanan Pula','BWP','P',1,1,0),(23,'Brazilian Real','BRL','R$',1,1,0),(24,'British Pound Sterling','GBP','£',1,1,0),(25,'Brunei Dollar','BND','B$',1,1,0),(26,'Bulgarian Lev','BGN','Лв.',1,1,0),(27,'Burundian Franc','BIF','FBu',1,1,0),(28,'Cambodian Riel','KHR','KHR',1,1,0),(29,'Canadian Dollar','CAD','$',1,1,0),(30,'Cape Verdean Escudo','CVE','$',1,1,0),(31,'Cayman Islands Dollar','KYD','$',1,1,0),(32,'CFA Franc BCEAO','XOF','CFA',1,1,0),(33,'CFA Franc BEAC','XAF','FCFA',1,1,0),(34,'CFP Franc','XPF','₣',1,1,0),(35,'Chilean Peso','CLP','$',1,1,0),(36,'Chinese Yuan','CNY','¥',1,1,0),(37,'Colombian Peso','COP','$',1,1,0),(38,'Comorian Franc','KMF','CF',1,1,0),(39,'Congolese Franc','CDF','FC',1,1,0),(40,'Costa Rican ColÃ³n','CRC','₡',1,1,0),(41,'Croatian Kuna','HRK','kn',1,1,0),(42,'Cuban Convertible Peso','CUC','$, CUC',1,1,0),(43,'Czech Republic Koruna','CZK','Kč',1,1,0),(44,'Danish Krone','DKK','Kr.',1,1,0),(45,'Djiboutian Franc','DJF','Fdj',1,1,0),(46,'Dominican Peso','DOP','$',1,1,0),(47,'East Caribbean Dollar','XCD','$',1,1,0),(48,'Egyptian Pound','EGP','ج.م',1,1,0),(49,'Eritrean Nakfa','ERN','Nfk',1,1,0),(50,'Estonian Kroon','EEK','kr',1,1,0),(51,'Ethiopian Birr','ETB','Nkf',1,1,0),(52,'Euro','EUR','€',1,1,0),(53,'Falkland Islands Pound','FKP','£',1,1,0),(54,'Fijian Dollar','FJD','FJ$',1,1,0),(55,'Gambian Dalasi','GMD','D',1,1,0),(56,'Georgian Lari','GEL','ლ',1,1,0),(57,'German Mark','DEM','DM',1,1,0),(58,'Ghanaian Cedi','GHS','GH₵',1,1,0),(59,'Gibraltar Pound','GIP','£',1,1,0),(60,'Greek Drachma','GRD','₯, Δρχ, Δρ',1,1,0),(61,'Guatemalan Quetzal','GTQ','Q',1,1,0),(62,'Guinean Franc','GNF','FG',1,1,0),(63,'Guyanaese Dollar','GYD','$',1,1,0),(64,'Haitian Gourde','HTG','G',1,1,0),(65,'Honduran Lempira','HNL','L',1,1,0),(66,'Hong Kong Dollar','HKD','$',1,1,0),(67,'Hungarian Forint','HUF','Ft',1,1,0),(68,'Icelandic KrÃ³na','ISK','kr',1,1,0),(69,'Indian Rupee','INR','₹',1,1,0),(70,'Indonesian Rupiah','IDR','Rp',1,1,0),(71,'Iranian Rial','IRR','﷼',1,1,0),(72,'Iraqi Dinar','IQD','د.ع',1,1,0),(73,'Israeli New Sheqel','ILS','₪',1,1,0),(74,'Italian Lira','ITL','L,£',1,1,0),(75,'Jamaican Dollar','JMD','J$',1,1,0),(76,'Japanese Yen','JPY','¥',1,1,0),(77,'Jordanian Dinar','JOD','ا.د',1,1,0),(78,'Kazakhstani Tenge','KZT','лв',1,1,0),(79,'Kenyan Shilling','KES','KSh',1,1,0),(80,'Kuwaiti Dinar','KWD','ك.د',1,1,0),(81,'Kyrgystani Som','KGS','лв',1,1,0),(82,'Laotian Kip','LAK','₭',1,1,0),(83,'Latvian Lats','LVL','Ls',0,0,0),(84,'Lebanese Pound','LBP','£',1,1,0),(85,'Lesotho Loti','LSL','L',1,1,0),(86,'Liberian Dollar','LRD','$',1,1,0),(87,'Libyan Dinar','LYD','د.ل',1,1,0),(88,'Lithuanian Litas','LTL','Lt',0,0,0),(89,'Macanese Pataca','MOP','$',1,1,0),(90,'Macedonian Denar','MKD','ден',1,1,0),(91,'Malagasy Ariary','MGA','Ar',1,1,0),(92,'Malawian Kwacha','MWK','MK',1,1,0),(93,'Malaysian Ringgit','MYR','RM',1,1,0),(94,'Maldivian Rufiyaa','MVR','Rf',1,1,0),(95,'Mauritanian Ouguiya','MRO','MRU',1,1,0),(96,'Mauritian Rupee','MUR','₨',1,1,0),(97,'Mexican Peso','MXN','$',1,1,0),(98,'Moldovan Leu','MDL','L',1,1,0),(99,'Mongolian Tugrik','MNT','₮',1,1,0),(100,'Moroccan Dirham','MAD','MAD',1,1,0),(101,'Mozambican Metical','MZM','MT',1,1,0),(102,'Myanmar Kyat','MMK','K',1,1,0),(103,'Namibian Dollar','NAD','$',1,1,0),(104,'Nepalese Rupee','NPR','₨',1,1,0),(105,'Netherlands Antillean Guilder','ANG','ƒ',1,1,0),(106,'New Taiwan Dollar','TWD','$',1,1,0),(107,'New Zealand Dollar','NZD','$',1,1,0),(108,'Nicaraguan CÃ³rdoba','NIO','C$',1,1,0),(109,'Nigerian Naira','NGN','₦',1,1,1),(110,'North Korean Won','KPW','₩',0,0,0),(111,'Norwegian Krone','NOK','kr',1,1,0),(112,'Omani Rial','OMR','.ع.ر',0,0,0),(113,'Pakistani Rupee','PKR','₨',1,1,0),(114,'Panamanian Balboa','PAB','B/.',1,1,0),(115,'Papua New Guinean Kina','PGK','K',1,1,0),(116,'Paraguayan Guarani','PYG','₲',1,1,0),(117,'Peruvian Nuevo Sol','PEN','S/.',1,1,0),(118,'Philippine Peso','PHP','₱',1,1,0),(119,'Polish Zloty','PLN','zł',1,1,0),(120,'Qatari Rial','QAR','ق.ر',1,1,0),(121,'Romanian Leu','RON','lei',1,1,0),(122,'Russian Ruble','RUB','₽',1,1,0),(123,'Rwandan Franc','RWF','FRw',1,1,0),(124,'Salvadoran ColÃ³n','SVC','₡',0,0,0),(125,'Samoan Tala','WST','SAT',1,1,0),(126,'Saudi Riyal','SAR','﷼',1,1,0),(127,'Serbian Dinar','RSD','din',1,1,0),(128,'Seychellois Rupee','SCR','SRe',1,1,0),(129,'Sierra Leonean Leone','SLL','Le',1,1,0),(130,'Singapore Dollar','SGD','$',1,1,0),(131,'Slovak Koruna','SKK','Sk',1,1,0),(132,'Solomon Islands Dollar','SBD','Si$',1,1,0),(133,'Somali Shilling','SOS','Sh.so.',1,1,0),(134,'South African Rand','ZAR','R',1,1,0),(135,'South Korean Won','KRW','₩',1,1,0),(136,'Special Drawing Rights','XDR','SDR',1,1,0),(137,'Sri Lankan Rupee','LKR','Rs',1,1,0),(138,'St. Helena Pound','SHP','£',1,1,0),(139,'Sudanese Pound','SDG','.س.ج',1,1,0),(140,'Surinamese Dollar','SRD','$',1,1,0),(141,'Swazi Lilangeni','SZL','E',1,1,0),(142,'Swedish Krona','SEK','kr',1,1,0),(143,'Swiss Franc','CHF','CHf',1,1,0),(144,'Syrian Pound','SYP','LS',0,0,0),(145,'São Tomé and Príncipe Dobra','STD','Db',1,1,0),(146,'Tajikistani Somoni','TJS','SM',1,1,0),(147,'Tanzanian Shilling','TZS','TSh',1,1,0),(148,'Thai Baht','THB','฿',1,1,0),(149,'Tongan pa\'anga','TOP','$',1,1,0),(150,'Trinidad & Tobago Dollar','TTD','$',1,1,0),(151,'Tunisian Dinar','TND','ت.د',1,1,0),(152,'Turkish Lira','TRY','₺',1,1,0),(153,'Turkmenistani Manat','TMT','T',1,1,0),(154,'Ugandan Shilling','UGX','USh',1,1,0),(155,'Ukrainian Hryvnia','UAH','₴',1,1,0),(156,'United Arab Emirates Dirham','AED','إ.د',1,1,0),(157,'Uruguayan Peso','UYU','$',1,1,0),(158,'Afghan Afghani','AFA','؋',1,1,0),(159,'Uzbekistan Som','UZS','лв',1,1,0),(160,'Vanuatu Vatu','VUV','VT',1,1,0),(161,'Venezuelan BolÃvar','VEF','Bs',0,0,0),(162,'Vietnamese Dong','VND','₫',1,1,0),(163,'Yemeni Rial','YER','﷼',1,1,0),(164,'Zambian Kwacha','ZMK','ZK',1,1,0);
/*!40000 ALTER TABLE `currency` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `custom_page`
--

DROP TABLE IF EXISTS `custom_page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `custom_page` (
  `custom_page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page_content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `page_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `button_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `button_position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`custom_page_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `custom_page`
--

LOCK TABLES `custom_page` WRITE;
/*!40000 ALTER TABLE `custom_page` DISABLE KEYS */;
/*!40000 ALTER TABLE `custom_page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enrol`
--

DROP TABLE IF EXISTS `enrol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enrol` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enrol`
--

LOCK TABLES `enrol` WRITE;
/*!40000 ALTER TABLE `enrol` DISABLE KEYS */;
INSERT INTO `enrol` (`id`, `user_id`, `course_id`, `date_added`, `last_modified`) VALUES (1,2,1,1670976000,NULL),(2,2,3,1670976000,NULL),(3,2,2,1671321600,NULL),(4,3,1,1671840000,NULL);
/*!40000 ALTER TABLE `enrol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `frontend_settings`
--

DROP TABLE IF EXISTS `frontend_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `frontend_settings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `frontend_settings`
--

LOCK TABLES `frontend_settings` WRITE;
/*!40000 ALTER TABLE `frontend_settings` DISABLE KEYS */;
INSERT INTO `frontend_settings` (`id`, `key`, `value`) VALUES (1,'banner_title','Bringing New Insight for Your Financial Freedom'),(2,'banner_sub_title','The School of Cryptocurrencies (SOC) is part of EdaFace Academy'),(4,'about_us','<p></p><h2><span xss=removed>This is about us</span></h2><p><span xss=\"removed\">Welcome to Academy. It will help you to learn in a new ways</span></p>'),(10,'terms_and_condition','<h2>Terms and Condition</h2>This is the Terms and condition page for your companys'),(11,'privacy_policy','<p></p><p></p><h2><span xss=\"removed\">Privacy Policy</span><br></h2>This is the Privacy Policy page for your companys<p></p><p><b>This is another</b> <u><a href=\"https://youtube.com/watch?v=PHgc8Q6qTjc\" target=\"_blank\">thing you will</a></u> <span xss=\"removed\">not understand</span>.</p>'),(13,'theme','nifty'),(14,'cookie_note','This website uses cookies to personalize content and analyse traffic in order to offer you a better experience.'),(15,'cookie_status','active'),(16,'cookie_policy','<h1>Cookie policy</h1><ol><li>Cookies are small text files that can be used by websites to make a user\'s experience more efficient.</li><li>The law states that we can store cookies on your device if they are strictly necessary for the operation of this site. For all other types of cookies we need your permission.</li><li>This site uses different types of cookies. Some cookies are placed by third party services that appear on our pages.</li></ol>'),(17,'banner_image','cca71ff818bc73b972a818cafb2ae4ea.jpg'),(18,'light_logo','8cde262fa88618f09747e11735d0bc09.png'),(19,'dark_logo','9246eb8610d571d99a95f476a90a60b3.png'),(20,'small_logo','08d99db530cfd87762d003efecd79d6d.png'),(21,'favicon','0fb42c57c3c98a16e5203f1a7397f12c.png'),(22,'recaptcha_status','0'),(23,'recaptcha_secretkey','Valid-secret-key'),(24,'recaptcha_sitekey','Valid-site-key'),(25,'refund_policy','<h2><span xss=\"removed\">Refund Policy</span></h2>'),(26,'facebook','https://www.facebook.com/EdaFace.Office1'),(27,'twitter','https://twitter.com/EdaFace_office'),(28,'linkedin','https://www.instagram.com/edaface_office/'),(31,'blog_page_title','Where possibilities begin'),(32,'blog_page_subtitle','We’re a leading marketplace platform for learning and teaching online. Explore some of our most popular content and learn something new.'),(33,'blog_page_banner','blog-page.png'),(34,'instructors_blog_permission','0'),(35,'blog_visibility_on_the_home_page','0');
/*!40000 ALTER TABLE `frontend_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jitsi_live_class`
--

DROP TABLE IF EXISTS `jitsi_live_class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jitsi_live_class` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `course_id` int(11) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `time` varchar(100) DEFAULT NULL,
  `jitsi_meeting_id` varchar(255) DEFAULT NULL,
  `jitsi_meeting_password` varchar(255) DEFAULT NULL,
  `note_to_students` longtext,
  `class_topic` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jitsi_live_class`
--

LOCK TABLES `jitsi_live_class` WRITE;
/*!40000 ALTER TABLE `jitsi_live_class` DISABLE KEYS */;
INSERT INTO `jitsi_live_class` (`id`, `course_id`, `date`, `time`, `jitsi_meeting_id`, `jitsi_meeting_password`, `note_to_students`, `class_topic`) VALUES (1,1,'1670889600','1671667200',NULL,'','','Live class'),(2,3,'1670889600','1671408000',NULL,'','','Live class'),(3,2,'1671321600','1671408000',NULL,'','','Live class');
/*!40000 ALTER TABLE `jitsi_live_class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `language`
--

DROP TABLE IF EXISTS `language`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `language` (
  `phrase_id` int(11) NOT NULL AUTO_INCREMENT,
  `phrase` longtext COLLATE utf8_unicode_ci,
  `english` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`phrase_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `language`
--

LOCK TABLES `language` WRITE;
/*!40000 ALTER TABLE `language` DISABLE KEYS */;
/*!40000 ALTER TABLE `language` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lesson`
--

DROP TABLE IF EXISTS `lesson`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lesson` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `video_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cloud_video_id` int(20) DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL,
  `lesson_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attachment` longtext COLLATE utf8_unicode_ci,
  `attachment_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `caption` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `summary` longtext COLLATE utf8_unicode_ci,
  `is_free` int(11) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '0',
  `video_type_for_mobile_application` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_url_for_mobile_application` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `duration_for_mobile_application` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lesson`
--

LOCK TABLES `lesson` WRITE;
/*!40000 ALTER TABLE `lesson` DISABLE KEYS */;
INSERT INTO `lesson` (`id`, `title`, `duration`, `course_id`, `section_id`, `video_type`, `cloud_video_id`, `video_url`, `date_added`, `last_modified`, `lesson_type`, `attachment`, `attachment_type`, `caption`, `summary`, `is_free`, `order`, `video_type_for_mobile_application`, `video_url_for_mobile_application`, `duration_for_mobile_application`) VALUES (4,'Introduction','00:05:00',1,1,'html5',NULL,'https://soc.evillage.world/uploads/videos/videoplayback.mp4',1671667200,1671667200,'video','','url',NULL,'&lt;p&gt;&lt;span style=&quot;color: rgb(15, 15, 15); font-family: Roboto, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: pre-wrap; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgba(0, 0, 0, 0.05); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;&quot;&gt;This video on Cryptocurrency covers all the important concepts from basics to advanced. Also it covers all the information about Cryptocurrency like what Cryptocurrency is, how Cryptocurrency originated, How Cryptocurrency works, How Cryptocurrency benefits us and How it works on Blockchain. Don\'t forget to take &lt;/span&gt;&lt;/p&gt;',1,1,'html5','https://www.html5rocks.com/en/tutorials/video/basics/devstories.webm','00:01:10'),(5,'Resources',NULL,1,2,NULL,NULL,NULL,1671667200,NULL,'text','&lt;p&gt;https://soc.edaface.com/&lt;br&gt;&lt;/p&gt;','description',NULL,'&lt;p&gt;https://soc.edaface.com/&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;',1,0,NULL,NULL,NULL),(6,'Story of Money','00:10:00',1,3,'html5',NULL,'https://soc.evillage.world/uploads/videos/videoplayback.mp4',1671667200,NULL,'video',NULL,'url',NULL,'&lt;p&gt;Learning a little each day adds up. Research shows that students who \r\nmake learning a habit are more likely to reach their goals. Set time \r\naside to learn and get reminders using your learning scheduler.&lt;/p&gt;',1,0,'html5','https://www.html5rocks.com/en/tutorials/video/basics/devstories.webm','00:01:10'),(7,'Economics of the Bitcoin',NULL,1,3,NULL,NULL,NULL,1671667200,NULL,'text','&lt;p&gt;What is money? When was money invented? Who invented money? The \r\nhistory of money is fascinating and goes back thousands of years. From \r\nthe early days of bartering to the first metal coins and eventually the \r\nfirst paper money, money has always had an important impact on the way \r\nwe function as a society.&lt;/p&gt;\r\n&lt;p&gt;In this guide we’ll go into detail about the history of money and how\r\n human beings have advanced from the barter economy to a complex \r\nfinancial system with several forms of currency. Keep reading for a \r\ncomprehensive overview or use the links below to go to a specific \r\nsection.&lt;/p&gt;&lt;h2&gt;What is Money?&lt;/h2&gt;\r\n&lt;p&gt;Interestingly enough, money often has no intrinsic value. Instead, \r\nmoney is an object that has a value placed on it, which allows for the \r\ntrade of goods and services. Some money, such as metal coins, has actual\r\n value in terms of the materials used. However, paper money is more \r\ncommon in the modern world and typically has no real value. Throughout \r\nthe evolution of money, currency has taken several different forms.&lt;/p&gt;\r\n&lt;h2&gt;When Was Money Invented?&lt;/h2&gt;\r\n&lt;p&gt;Before &lt;a href=&quot;https://mint.intuit.com/blog/career/how-to-start-a-new-career/&quot; title=&quot;&quot; target=&quot;_blank&quot; rel=&quot;false noopener&quot;&gt;money&lt;/a&gt;\r\n was invented, people bartered for goods and services. It wasn’t until \r\nabout 5,000 years ago that the Mesopotamian people created the shekel, \r\nwhich is considered the first known form of currency. Gold and silver \r\ncoins date back to around 650 to 600 B.C. when stamped coins were used \r\nto pay armies. Some evidence suggests that metal coins may be as old as \r\n1250 B.C.&lt;/p&gt;\r\n&lt;h3&gt;What Was Used Before Money Was Invented?&lt;/h3&gt;\r\n&lt;p&gt;When there was no currency, &lt;u&gt;&lt;a href=&quot;https://mint.intuit.com/blog/personal-finance/guide-to-the-barter-economy-the-barter-system-history/&quot;&gt;people traded goods and services&lt;/a&gt;&lt;/u&gt;\r\n for what they needed. One farmer might trade livestock for vegetables, \r\nwhile another may trade labor or lumber for livestock. These \r\ntransactions were the early building blocks of our modern economy and \r\nwould go on to create the &lt;u&gt;&lt;a href=&quot;https://mint.intuit.com/blog/planning/the-future-of-money/&quot;&gt;future of money&lt;/a&gt;&lt;/u&gt; the world knows today.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;','description',NULL,'&lt;p&gt;What is money? When was money invented? Who invented money? The \r\nhistory of money is fascinating and goes back thousands of years. From \r\nthe early days of bartering to the first metal coins and eventually the \r\nfirst paper money, money has always had an important impact on the way \r\nwe function as a society.&lt;/p&gt;',1,0,NULL,NULL,NULL),(8,'The Complete Guide for Types of Blockchain!',NULL,1,4,NULL,NULL,NULL,1671667200,NULL,'text','&lt;p&gt;&lt;a href=&quot;https://www.simplilearn.com/tutorials/blockchain-tutorial&quot; target=&quot;_blank&quot; title=&quot;Blockchain&quot; rel=&quot;noopener&quot;&gt;Blockchain&lt;/a&gt;\r\n has recently gained a lot of popularity, which has led to the high \r\ndemand for the adaptation of this technology. But the question is - Are \r\nall firms adapting Blockchain have the same requirements?&lt;/p&gt;\r\n&lt;p&gt;Well, the answer is no! Each firm has different and unique \r\nrequirements that demand types of Blockchain. Types of Blockchain are \r\ndifferent versions of &lt;a href=&quot;https://www.simplilearn.com/tutorials/blockchain-tutorial/blockchain-technology&quot; target=&quot;_blank&quot; title=&quot;blockchain technology&quot; rel=&quot;noopener&quot;&gt;blockchain technology&lt;/a&gt; with different characteristics. And in this tutorial, we will explore and understand these different types of Blockchain.&lt;/p&gt;\r\n&lt;p&gt;&lt;/p&gt;&lt;div class=&quot;engagingBanner&quot;&gt;&lt;div class=&quot;detail-info-banner&quot; data-reactroot=&quot;&quot;&gt;&lt;div class=&quot;left-clm&quot;&gt;&lt;h4&gt;Professional Certificate Program in Blockchain&lt;/h4&gt;&lt;span class=&quot;discription&quot;&gt;in Collaboration with IIT Kanpur&lt;/span&gt;&lt;a href=&quot;https://www.simplilearn.com/blockchain-certification-training-course?source=GhPreviewCTABanner&quot; target=&quot;_blank&quot; class=&quot;btn&quot;&gt;Enroll Now&lt;/a&gt;&lt;/div&gt;&lt;div class=&quot;right-clm&quot;&gt;&lt;img class=&quot;blend-mode&quot; src=&quot;https://www.simplilearn.com/ice9/banners/free_resources_banners/lead_banners/Banner_image_Blockchain.png&quot; alt=&quot;Professional Certificate Program in Blockchain&quot; width=&quot;16&quot; height=&quot;9&quot;&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;p&gt;&lt;/p&gt;\r\n&lt;h2 id=&quot;what_is_blockchain&quot;&gt;What Is Blockchain?&lt;/h2&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;&lt;img src=&quot;https://www.simplilearn.com/ice9/free_resources_article_thumb/Types_of_Blockchain_1.png&quot; alt=&quot;Types_of_Blockchain_1.&quot; class=&quot;blend-mode&quot; width=&quot;512&quot; height=&quot;204&quot;&gt;&lt;/p&gt;\r\n&lt;ul&gt;&lt;li aria-level=&quot;1&quot;&gt;A Blockchain is a decentralized database that is shared among computer network nodes.&lt;/li&gt;&lt;li aria-level=&quot;1&quot;&gt;Transactional data from numerous sources may be readily collected, integrated, and shared using blockchain cloud services.&lt;/li&gt;&lt;li aria-level=&quot;1&quot;&gt;Data is divided into common blocks linked together using cryptographic hashes as unique IDs.&amp;nbsp;&lt;/li&gt;&lt;li aria-level=&quot;1&quot;&gt;Data integrity is ensured via Blockchain, which uses a\r\n single source of truth to eliminate data duplication and increase \r\nsecurity.&amp;nbsp;&lt;/li&gt;&lt;li aria-level=&quot;1&quot;&gt;Fraud and data tampering is prevented in a blockchain\r\n system since data can\'t be changed without the permission of the nodes \r\nof the parties.&lt;/li&gt;&lt;/ul&gt;\r\n&lt;h2 id=&quot;why_do_we_need_different_types_of_blockchain&quot;&gt;Why Do We Need Different Types of Blockchain&lt;/h2&gt;\r\n&lt;ul&gt;&lt;li aria-level=&quot;1&quot;&gt;To carry out transactions or data transfers across a secure network.&lt;/li&gt;&lt;li aria-level=&quot;1&quot;&gt;The way people use Blockchain and distributed ledger \r\ntechnologies or networks, on the other hand, differs from context to \r\nsituation.&lt;/li&gt;&lt;li aria-level=&quot;1&quot;&gt;For example, Bitcoin is a digital &lt;a href=&quot;https://www.simplilearn.com/tutorials/blockchain-tutorial/what-is-cryptocurrency&quot; target=&quot;_blank&quot; title=&quot;cryptocurrency&quot; rel=&quot;noopener&quot;&gt;cryptocurrency&lt;/a&gt; transacted using Blockchain and DLT technology.&amp;nbsp;&lt;/li&gt;&lt;li aria-level=&quot;1&quot;&gt;Because anyone from anywhere in the world can become a\r\n node, verify other nodes, and exchange bitcoins, this form of a \r\nblockchain network is a public network.&lt;/li&gt;&lt;li aria-level=&quot;1&quot;&gt;Assume a bank, on the other hand, is using a private blockchain network.&lt;/li&gt;&lt;li aria-level=&quot;1&quot;&gt;The network, which will be password-protected, will \r\nbe accessible only to those the bank has approved. As a result, bank \r\ndata is accessible only within the local network.&lt;/li&gt;&lt;/ul&gt;\r\n&lt;p&gt;Similar to these instances, the blockchain network can be set up in various ways based on usage and requirements.&lt;/p&gt;\r\n&lt;h2 id=&quot;types_of_blockchain&quot;&gt;Types of Blockchain&lt;/h2&gt;\r\n&lt;p&gt;There are majorly four types of Blockchain -&amp;nbsp;&lt;/p&gt;\r\n&lt;h3&gt;1. Public Blockchain&lt;/h3&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;&lt;img src=&quot;https://www.simplilearn.com/ice9/free_resources_article_thumb/Types_of_Blockchain_2.png&quot; alt=&quot;Types_of_Blockchain_2.&quot; class=&quot;blend-mode&quot; width=&quot;512&quot; height=&quot;193&quot;&gt;&lt;/p&gt;\r\n&lt;ul&gt;&lt;li aria-level=&quot;1&quot;&gt;It is a permissionless distributed ledger on which anybody can join and conduct transactions.&amp;nbsp;&lt;/li&gt;&lt;li aria-level=&quot;1&quot;&gt;It is a non-restrictive form of the ledger in which \r\neach peer has a copy. This also means that anyone with an internet \r\nconnection can access the public Blockchain.&lt;/li&gt;&lt;li aria-level=&quot;1&quot;&gt;This user has access to historical and contemporary records and the ability to perform mining operations.&lt;/li&gt;&lt;li aria-level=&quot;1&quot;&gt;These complex computations must be performed to verify transactions and add them to the ledger.&amp;nbsp;&lt;/li&gt;&lt;li aria-level=&quot;1&quot;&gt;On the blockchain network, no valid record or \r\ntransaction may be altered. Because the source code is usually open, \r\nanybody can check the transactions, uncover problems, and suggest fixes.&lt;/li&gt;&lt;/ul&gt;\r\n&lt;h3&gt;Advantages of Public Blockchain -&lt;/h3&gt;\r\n&lt;ul&gt;&lt;li aria-level=&quot;1&quot;&gt;Trustable: Public Blockchain nodes do not need to \r\nknow or trust each other because the proof-of-work procedure ensures no \r\nfraudulent transactions.&lt;/li&gt;&lt;li aria-level=&quot;1&quot;&gt;Secure: A public network can have as many \r\nparticipants or nodes as it wants, making it a secure network. The \r\nhigher the network\'s size, the more records are distributed, and the \r\nmore difficult it is for hackers to hack the entire network.&lt;/li&gt;&lt;li aria-level=&quot;1&quot;&gt;Open and Transparent: The data on a public blockchain\r\n is transparent to all member nodes. Every authorized node has a copy of\r\n the blockchain records or digital ledger.&lt;/li&gt;&lt;/ul&gt;\r\n&lt;h3&gt;Disadvantages of Public Blockchain -&lt;/h3&gt;\r\n&lt;ul&gt;&lt;li aria-level=&quot;1&quot;&gt;Lower TPS: The number of transactions per second in a\r\n public blockchain is extremely low. This is because it is a large \r\nnetwork with many nodes which take time to verify a transaction and do \r\nproof-of-work.&lt;/li&gt;&lt;li aria-level=&quot;1&quot;&gt;Scalability Issues: Its transactions are processed \r\nand completed slowly. This harms scalability. Because the more we try to\r\n expand the network\'s size, the slower it will become.&lt;/li&gt;&lt;li aria-level=&quot;1&quot;&gt;High Energy Consumption: The proof-of-work device is \r\nexpensive and requires lots of energy. Technology will undoubtedly need \r\nto develop energy-efficient consensus methods.&lt;/li&gt;&lt;/ul&gt;\r\n&lt;h3&gt;Uses of Public Blockchain -&lt;/h3&gt;\r\n&lt;ul&gt;&lt;li aria-level=&quot;1&quot;&gt;Voting: Governments can use a public blockchain to vote, ensuring openness and trust.&lt;/li&gt;&lt;li aria-level=&quot;1&quot;&gt;Fundraising: Businesses or initiatives can use the public Blockchain to improve transparency and trust.&lt;/li&gt;&lt;/ul&gt;\r\n&lt;p&gt;&lt;/p&gt;&lt;div class=&quot;engagingBanner&quot;&gt;&lt;div class=&quot;detail-info-banner&quot; data-reactroot=&quot;&quot;&gt;&lt;div class=&quot;left-clm&quot;&gt;&lt;h4&gt;FREE Course: Blockchain Developer&lt;/h4&gt;&lt;span class=&quot;discription&quot;&gt;Learn Blockchain Basics with the FREE Course&lt;/span&gt;&lt;a href=&quot;https://www.simplilearn.com/learn-blockchain-basics-skillup?utm_source=frs&amp;amp;utm_medium=skillup-course-banner&amp;amp;utm_campaign=frs-tutorial-skillup-course-promotion&quot; target=&quot;_blank&quot; class=&quot;btn&quot;&gt;Enroll Now&lt;/a&gt;&lt;/div&gt;&lt;div class=&quot;right-clm&quot;&gt;&lt;img class=&quot;blend-mode&quot; src=&quot;https://www.simplilearn.com/ice9/banners/free_resources_banners/lead_banners/Agile_and_Scrum_.png&quot; alt=&quot;FREE Course: Blockchain Developer&quot; width=&quot;16&quot; height=&quot;9&quot;&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;p&gt;&lt;/p&gt;\r\n&lt;h3&gt;2. Private Blockchain&lt;/h3&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;&lt;img src=&quot;https://www.simplilearn.com/ice9/free_resources_article_thumb/Types_of_Blockchain_3.jpg&quot; alt=&quot;Types_of_Blockchain_3&quot; class=&quot;blend-mode&quot; width=&quot;512&quot; height=&quot;210&quot;&gt;&lt;/p&gt;\r\n&lt;ul&gt;&lt;li aria-level=&quot;1&quot;&gt;A blockchain network operates in a private context, such as a restricted network, or is controlled by a single identity.&amp;nbsp;&lt;/li&gt;&lt;li aria-level=&quot;1&quot;&gt;While it has a similar peer-to-peer connection and \r\ndecentralization to a public blockchain network, this Blockchain is far \r\nsmaller.&lt;/li&gt;&lt;li aria-level=&quot;1&quot;&gt;They are often run on a small network within a firm \r\nor organization rather than open to anybody who wants to contribute \r\nprocessing power.&amp;nbsp;&lt;/li&gt;&lt;li aria-level=&quot;1&quot;&gt;Permissioned blockchains and business blockchains are two more terms for them.&lt;/li&gt;&lt;/ul&gt;\r\n&lt;h3&gt;Advantages of Private Blockchain -&amp;nbsp;&lt;/h3&gt;\r\n&lt;ul&gt;&lt;li aria-level=&quot;1&quot;&gt;Speed: Private Blockchain transactions are faster. \r\nThis is because a private network has a smaller number of nodes, which \r\nshortens the time it takes to verify a transaction.&lt;/li&gt;&lt;li aria-level=&quot;1&quot;&gt;Scalability: You can tailor the size of your private \r\nBlockchain to meet your specific requirements. This makes private \r\nblockchains particularly scalable since they allow companies to easily \r\nraise or decrease their network size.&lt;/li&gt;&lt;/ul&gt;\r\n&lt;h3&gt;Disadvantages of Private Blockchain -&lt;/h3&gt;\r\n&lt;ul&gt;&lt;li aria-level=&quot;1&quot;&gt;Trust Building: In a private network, there are fewer participants than in a private network.&lt;/li&gt;&lt;li aria-level=&quot;1&quot;&gt;Lower Security: A private blockchain network has fewer nodes or members, so it is more vulnerable to a security compromise.&lt;/li&gt;&lt;li aria-level=&quot;1&quot;&gt;Centralization: Private blockchains are limited in \r\nthat they require a central Identity and Access Management (IAM) system \r\nto function. This system provides full administrative and monitoring \r\ncapabilities.&lt;/li&gt;&lt;/ul&gt;\r\n&lt;h3&gt;Uses of Private Blockchain -&amp;nbsp;&lt;/h3&gt;\r\n&lt;ul&gt;&lt;li aria-level=&quot;1&quot;&gt;\r\n&lt;a href=&quot;https://www.simplilearn.com/use-cases-for-blockchain-in-supply-chain-management-article&quot; target=&quot;_blank&quot; title=&quot;Supply Chain Management&quot; rel=&quot;noopener&quot;&gt;Supply Chain Management&lt;/a&gt;: A private blockchain can be used to manage a company\'s supply chain.&lt;/li&gt;&lt;li aria-level=&quot;1&quot;&gt;Asset Ownership: A private blockchain can be used to track and verify assets.&lt;/li&gt;&lt;li aria-level=&quot;1&quot;&gt;Internal Voting: Internal voting is also possible with a private blockchain.&lt;/li&gt;&lt;/ul&gt;\r\n&lt;h3&gt;3. Hybrid Blockchain&lt;/h3&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;&lt;img src=&quot;https://www.simplilearn.com/ice9/free_resources_article_thumb/Types_of_Blockchain_4.png&quot; alt=&quot;Types_of_Blockchain_4&quot; class=&quot;blend-mode&quot; width=&quot;512&quot; height=&quot;367&quot;&gt;&lt;/p&gt;\r\n&lt;ul&gt;&lt;li aria-level=&quot;1&quot;&gt;Organizations who expect the best of both worlds use a\r\n hybrid blockchain, which combines the features of both private and \r\npublic blockchains.&amp;nbsp;&lt;/li&gt;&lt;li aria-level=&quot;1&quot;&gt;It enables enterprises to construct a private, \r\npermission-based system alongside a public, permissionless system, \r\nallowing them to choose who has access to certain Blockchain data and \r\nwhat data is made public.&lt;/li&gt;&lt;li aria-level=&quot;1&quot;&gt;In a hybrid blockchain, transactions and records are \r\ntypically not made public, but they can be validated if necessary by \r\ngranting access via a smart contract.&lt;/li&gt;&lt;/ul&gt;\r\n&lt;h3&gt;Advantages of Hybrid Blockchain -&amp;nbsp;&lt;/h3&gt;\r\n&lt;ul&gt;&lt;li aria-level=&quot;1&quot;&gt;Secure: Hybrid Blockchain operates within a closed \r\nenvironment, preventing outside hackers from launching a 51 percent \r\nattack on the network.&lt;/li&gt;&lt;li aria-level=&quot;1&quot;&gt;Cost-Effective: It also safeguards privacy while \r\nallowing third-party contact. Transactions are inexpensive and quick and\r\n scale better than a public blockchain network.&lt;/li&gt;&lt;/ul&gt;\r\n&lt;h3&gt;Disadvantages of Hybrid Blockchain -&amp;nbsp;&lt;/h3&gt;\r\n&lt;ul&gt;&lt;li aria-level=&quot;1&quot;&gt;Lack of Transparency: Because information can be hidden, this type of blockchain isn\'t completely transparent.&lt;/li&gt;&lt;li aria-level=&quot;1&quot;&gt;Less Incentive: Upgrading can be difficult, and users have no incentive to participate in or contribute to the network.&lt;/li&gt;&lt;/ul&gt;\r\n&lt;h3&gt;Uses of Hybrid Blockchain -&amp;nbsp;&lt;/h3&gt;\r\n&lt;ul&gt;&lt;li aria-level=&quot;1&quot;&gt;Real Estate: Real-estate companies can &lt;a href=&quot;https://www.simplilearn.com/promising-uses-of-blockchain-article&quot; target=&quot;_blank&quot; title=&quot;use hybrid networks&quot; rel=&quot;noopener&quot;&gt;use hybrid networks&lt;/a&gt; to run their systems and offer information to the public.&lt;/li&gt;&lt;li aria-level=&quot;1&quot;&gt;Retail: The hybrid network can also help retailers streamline their processes.&lt;/li&gt;&lt;li aria-level=&quot;1&quot;&gt;Highly Regulated Markets: Hybrid blockchains are also well-suited to highly regulated areas like the banking sector.&lt;/li&gt;&lt;/ul&gt;\r\n&lt;p&gt;&lt;/p&gt;&lt;div class=&quot;engagingBanner&quot;&gt;&lt;div class=&quot;detail-info-banner&quot; data-reactroot=&quot;&quot;&gt;&lt;div class=&quot;left-clm&quot;&gt;&lt;h4&gt;Blockchain Certification Training Course&lt;/h4&gt;&lt;span class=&quot;discription&quot;&gt;Gain expertise in core Blockchain concepts&lt;/span&gt;&lt;a href=&quot;https://www.simplilearn.com/blockchain-certification-training?source=GhPreviewCTABanner&quot; target=&quot;_blank&quot; class=&quot;btn&quot;&gt;View Course&lt;/a&gt;&lt;/div&gt;&lt;div class=&quot;right-clm&quot;&gt;&lt;img class=&quot;blend-mode&quot; src=&quot;https://www.simplilearn.com/ice9/banners/free_resources_banners/lead_banners/Blockchain_vector.png&quot; alt=&quot;Blockchain Certification Training Course&quot; width=&quot;16&quot; height=&quot;9&quot;&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;p&gt;&lt;/p&gt;\r\n&lt;h3&gt;4. Consortium Blockchain&lt;/h3&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;&lt;img src=&quot;https://www.simplilearn.com/ice9/free_resources_article_thumb/Types_of_Blockchain_5.png&quot; alt=&quot;Types_of_Blockchain_5&quot; class=&quot;blend-mode&quot; width=&quot;512&quot; height=&quot;481&quot;&gt;&lt;/p&gt;\r\n&lt;ul&gt;&lt;li aria-level=&quot;1&quot;&gt;In the same way that a hybrid blockchain has both \r\nprivate and public blockchain features, a Consortium blockchain, also \r\nknown as a federated blockchain, does.&lt;/li&gt;&lt;li aria-level=&quot;1&quot;&gt;However, it differs because it involves various organizational members working together on a decentralized network.&lt;/li&gt;&lt;li aria-level=&quot;1&quot;&gt;Predetermined nodes control the consensus methods in a consortium blockchain.&amp;nbsp;&lt;/li&gt;&lt;li aria-level=&quot;1&quot;&gt;It has a validator node responsible for initiating, \r\nreceiving, and validating transactions. Transactions can be initiated or\r\n received by member nodes.&lt;/li&gt;&lt;/ul&gt;\r\n&lt;h3&gt;Advantages of Consortium Blockchain -&amp;nbsp;&lt;/h3&gt;\r\n&lt;ul&gt;&lt;li aria-level=&quot;1&quot;&gt;Secure: A consortium blockchain is more secure, \r\nscalable, and efficient than a public blockchain network. It, like \r\nprivate and mixed blockchains, has access controls.&lt;/li&gt;&lt;/ul&gt;\r\n&lt;h3&gt;Disadvantages of Consortium Blockchain -&amp;nbsp;&lt;/h3&gt;\r\n&lt;ul&gt;&lt;li aria-level=&quot;1&quot;&gt;Lack of Transparency: The consortium blockchain has a\r\n lower degree of transparency. If a member node is infiltrated, it can \r\nstill be hacked, and the Blockchain\'s rules can render the network \r\ninoperable.&lt;/li&gt;&lt;/ul&gt;\r\n&lt;h3&gt;Uses of Consortium Blockchain -&lt;/h3&gt;\r\n&lt;ul&gt;&lt;li aria-level=&quot;1&quot;&gt;Banking and Payments: A consortium can be formed by a\r\n group of banks working together. They have control over which nodes \r\nwill validate transactions.&lt;/li&gt;&lt;li aria-level=&quot;1&quot;&gt;Research: A consortium blockchain can be employed to share research data and outcomes.&lt;/li&gt;&lt;li aria-level=&quot;1&quot;&gt;Food Tracking: It is also apt for food tracking.&lt;/li&gt;&lt;/ul&gt;\r\n&lt;h2 id=&quot;final_words&quot;&gt;Final Words&lt;/h2&gt;\r\n&lt;p&gt;Each Blockchain has its own set of benefits, and as a result, there \r\nis no straightforward solution to the question of which Blockchain to \r\nuse.&lt;/p&gt;\r\n&lt;p&gt;However, assess your requirements to ensure that you make the best decision.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;','description',NULL,'&lt;p&gt;&lt;a href=&quot;https://www.simplilearn.com/tutorials/blockchain-tutorial&quot; target=&quot;_blank&quot; title=&quot;Blockchain&quot; rel=&quot;noopener&quot;&gt;Blockchain&lt;/a&gt;\r\n has recently gained a lot of popularity, which has led to the high \r\ndemand for the adaptation of this technology. But the question is - Are \r\nall firms adapting Blockchain have the same requirements?&lt;/p&gt;',1,0,NULL,NULL,NULL),(9,'Blockchain Quiz','0:02:00',1,4,NULL,NULL,NULL,1671667200,NULL,'quiz','{\"total_marks\":\"11\"}','json',NULL,'Think you&#039;ve got blockchain all figured out? Let&#039;s put your knowledge to the test to uncover your level of blockchain expertise! Start Quiz.',0,0,NULL,NULL,NULL);
/*!40000 ALTER TABLE `lesson` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `from` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `message_thread_code` longtext COLLATE utf8_unicode_ci,
  `message` longtext COLLATE utf8_unicode_ci,
  `sender` longtext COLLATE utf8_unicode_ci,
  `timestamp` longtext COLLATE utf8_unicode_ci,
  `read_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
/*!40000 ALTER TABLE `message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message_thread`
--

DROP TABLE IF EXISTS `message_thread`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message_thread` (
  `message_thread_id` int(11) NOT NULL AUTO_INCREMENT,
  `message_thread_code` longtext COLLATE utf8_unicode_ci,
  `sender` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `receiver` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `last_message_timestamp` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`message_thread_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message_thread`
--

LOCK TABLES `message_thread` WRITE;
/*!40000 ALTER TABLE `message_thread` DISABLE KEYS */;
/*!40000 ALTER TABLE `message_thread` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offline_payment`
--

DROP TABLE IF EXISTS `offline_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `offline_payment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `course_id` varchar(255) DEFAULT NULL,
  `document_image` varchar(255) DEFAULT NULL,
  `timestamp` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offline_payment`
--

LOCK TABLES `offline_payment` WRITE;
/*!40000 ALTER TABLE `offline_payment` DISABLE KEYS */;
INSERT INTO `offline_payment` (`id`, `user_id`, `amount`, `course_id`, `document_image`, `timestamp`, `status`) VALUES (1,2,'2','[\"1\",\"3\"]','8505938.pdf','1671036960',1);
/*!40000 ALTER TABLE `offline_payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `payment_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL,
  `admin_revenue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instructor_revenue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tax` double DEFAULT NULL,
  `instructor_payment_status` int(11) DEFAULT '0',
  `transaction_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `session_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `coupon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
INSERT INTO `payment` (`id`, `user_id`, `payment_type`, `course_id`, `amount`, `date_added`, `last_modified`, `admin_revenue`, `instructor_revenue`, `tax`, `instructor_payment_status`, `transaction_id`, `session_id`, `coupon`) VALUES (1,2,'offline',1,0,1670976000,NULL,'0','0',0,1,NULL,NULL,NULL),(2,2,'offline',3,2,1670976000,NULL,'2','0',0,1,NULL,NULL,NULL),(3,2,'paystack',2,1,1671321600,NULL,'1','0',0,1,NULL,NULL,NULL);
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payout`
--

DROP TABLE IF EXISTS `payout`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payout` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payout`
--

LOCK TABLES `payout` WRITE;
/*!40000 ALTER TABLE `payout` DISABLE KEYS */;
/*!40000 ALTER TABLE `payout` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) DEFAULT NULL,
  `permissions` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `quiz_id` int(11) DEFAULT NULL,
  `title` longtext COLLATE utf8_unicode_ci,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `number_of_options` int(11) DEFAULT NULL,
  `options` longtext COLLATE utf8_unicode_ci,
  `correct_answers` longtext COLLATE utf8_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` (`id`, `quiz_id`, `title`, `type`, `number_of_options`, `options`, `correct_answers`, `order`) VALUES (1,3,'&lt;p&gt;Crypto is the new oil&lt;br&gt;&lt;/p&gt;','single_choice',2,'[\"True\",\"False\"]','[\"1\"]',0),(2,9,'&lt;p&gt;&lt;strong&gt;The five elements of blockchain are distribution, encryption, immutability, tokenization and:&lt;/strong&gt;&lt;/p&gt;','multiple_choice',3,'[\"Transparency\",\"Authorization \",\"Decentralization\"]','[\"3\"]',0),(3,9,'&lt;p&gt;&lt;strong&gt;What can an IT leader use enterprise blockchain for?&lt;/strong&gt;&lt;/p&gt;','multiple_choice',4,'[\"Streamline supply chains\",\"Improve financial transactions\",\"Provide identity management\",\"All of the above\"]','[\"4\"]',0),(4,9,'&lt;p&gt;&lt;strong&gt;True or false: Smart contracts are legally binding contracts.&lt;/strong&gt;&lt;/p&gt;','single_choice',2,'[\"True\",\"False\"]','[\"1\"]',0),(5,9,'&lt;p&gt;&lt;strong&gt;What are essential skills a blockchain developer should have?&lt;/strong&gt;&lt;/p&gt;','multiple_choice',4,'[\"Official asset registry, voting facilitation, back-office functions\",\"Familiarity of blockchain architecture, foundation in cryptography, proficiency in common programming languages\",\"Foundation in data structures, web development, understanding of smart contracts\",\"Both B and C\"]','[\"4\"]',0);
/*!40000 ALTER TABLE `question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz_results`
--

DROP TABLE IF EXISTS `quiz_results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quiz_results` (
  `quiz_result_id` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_answers` longtext COLLATE utf8_unicode_ci NOT NULL,
  `correct_answers` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'question_id',
  `total_obtained_marks` double NOT NULL,
  `date_added` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date_updated` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_submitted` int(11) NOT NULL,
  PRIMARY KEY (`quiz_result_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz_results`
--

LOCK TABLES `quiz_results` WRITE;
/*!40000 ALTER TABLE `quiz_results` DISABLE KEYS */;
INSERT INTO `quiz_results` (`quiz_result_id`, `quiz_id`, `user_id`, `user_answers`, `correct_answers`, `total_obtained_marks`, `date_added`, `date_updated`, `is_submitted`) VALUES (1,3,2,'{\"1\":[\"1\"]}','[\"1\"]',7,'1671702055','1671702058',1),(2,9,2,'{\"2\":[\"3\"],\"3\":[\"4\"],\"4\":[\"1\"],\"5\":[\"3\"]}','[\"2\",\"3\",\"4\"]',8.3,'1671704354','1671704362',1);
/*!40000 ALTER TABLE `quiz_results` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rating` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rating` double DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ratable_id` int(11) DEFAULT NULL,
  `ratable_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL,
  `review` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rating`
--

LOCK TABLES `rating` WRITE;
/*!40000 ALTER TABLE `rating` DISABLE KEYS */;
/*!40000 ALTER TABLE `rating` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`id`, `name`, `date_added`, `last_modified`) VALUES (1,'Admin',1234567890,1234567890),(2,'User',1234567890,1234567890);
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `section`
--

DROP TABLE IF EXISTS `section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `section`
--

LOCK TABLES `section` WRITE;
/*!40000 ALTER TABLE `section` DISABLE KEYS */;
INSERT INTO `section` (`id`, `title`, `course_id`, `order`) VALUES (1,'Introduction',1,0),(2,'Resources',1,0),(3,'Evolution of Currency',1,0),(4,'Blockchain',1,0);
/*!40000 ALTER TABLE `section` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` (`id`, `key`, `value`) VALUES (1,'language','english'),(2,'system_name','EdaFace School of Cryptocurrencies'),(3,'system_title','EdaFace School of Cryptocurrencies'),(4,'system_email','support@edaface.com'),(5,'address','Johannesburg, South Africa'),(6,'phone','+27 67 201 8677'),(7,'purchase_code','6fd2305b-e5cd-412b-91b0-5bb3rd5f8567'),(8,'paypal','[{\"active\":\"0\",\"mode\":\"production\",\"sandbox_client_id\":\"AR_rtr_PHnlewP3ZvUV3QjLU0WoT-GfwffgRjBlpP5UBatMXqSNUhjjdXk-fIjBaUihUTjEquJUH1bOU\",\"sandbox_secret_key\":\"EEd3R3HqcyUhhUG6zd8-r_SzKaSu__SMhGdBvZ5xzJ92ax-ox6KZ\",\"production_client_id\":\"AR_rtr_PHnlewP3ZvUV3QjLU0WoT-GfwffgRjBlpP5UBatMXqSNUhjjdXk-fIjBaUihUTjEquJUH1bOU\",\"production_secret_key\":\"EEd3R3HqcyUhhUG6zd8-r_SzKaSu__SMhGdBvZ5xzJ92ax-ox6KZ\"}]'),(9,'stripe_keys','[{\"active\":\"0\",\"testmode\":\"on\",\"public_key\":\"pk_test_CAC3cB1mhgkJqXtypYBTGb4f\",\"secret_key\":\"sk_test_iatnshcHhQVRXdygXw3L2Pp2\",\"public_live_key\":\"pk_live_xxxxxxxxxxxxxxxxxxxxxxxx\",\"secret_live_key\":\"sk_live_xxxxxxxxxxxxxxxxxxxxxxxx\"}]'),(10,'youtube_api_key','youtube-api-key'),(11,'vimeo_api_key','vimeo-api-key'),(12,'slogan','Bringing New Insight for Your Financial Freedom.'),(13,'text_align',NULL),(14,'allow_instructor','1'),(15,'instructor_revenue','70'),(16,'system_currency','USD'),(17,'paypal_currency','USD'),(18,'stripe_currency','USD'),(19,'author','EdaFace'),(20,'currency_position','left'),(21,'website_description','Study any topic, anytime. explore thousands of courses for the lowest price ever!'),(22,'website_keywords','Edaface,School of Cryptocurrencies,School,Crypto'),(23,'footer_text',''),(24,'footer_link','https://edaface.com'),(25,'protocol','smtp'),(26,'smtp_host','smtp.gmail.com'),(27,'smtp_port','587'),(28,'smtp_user','your-email-address'),(29,'smtp_pass','your-email-password'),(30,'version','5.10.1'),(31,'student_email_verification','disable'),(32,'instructor_application_note','Fill all the fields carefully and share if you want to share any document with us it will help us to evaluate you as an instructor.'),(33,'razorpay_keys','[{\"active\":\"0\",\"key\":\"rzp_test_J60bqBOi1z1aF5\",\"secret_key\":\"uk935K7p4j96UCJgHK8kAU4q\",\"theme_color\":\"#c7a600\"}]'),(34,'razorpay_currency','USD'),(35,'fb_app_id','facebook-app-id'),(36,'fb_app_secret','facebook-app-secret-key'),(37,'fb_social_login','0'),(38,'drip_content_settings','{\"lesson_completion_role\":\"percentage\",\"minimum_duration\":10,\"minimum_percentage\":\"50\",\"locked_lesson_message\":\"&lt;h3 xss=&quot;removed&quot; style=&quot;text-align: center; &quot;&gt;&lt;span xss=&quot;removed&quot;&gt;&lt;strong&gt;Permission denied!&lt;\\/strong&gt;&lt;\\/span&gt;&lt;\\/h3&gt;&lt;p xss=&quot;removed&quot; style=&quot;text-align: center; &quot;&gt;&lt;span xss=&quot;removed&quot;&gt;This course supports drip content, so you must complete the previous lessons.&lt;\\/span&gt;&lt;\\/p&gt;\"}'),(41,'course_accessibility','publicly'),(42,'smtp_crypto','tls'),(43,'allowed_device_number_of_loging','5'),(47,'academy_cloud_access_token','jdfghasdfasdfasdfasdfasdf'),(48,'course_selling_tax','0'),(49,'randCallRange','30'),(50,'paystack_keys','[{\"active\":\"1\",\"testmode\":\"on\",\"secret_test_key\":\"sk_test_c746060e693dd50c6f397dffc6c3b2f655217c94\",\"public_test_key\":\"pk_test_0816abbed3c339b8473ff22f970c7da1c78cbe1b\",\"secret_live_key\":\"sk_live_xxxxxxxxxxxxxxxxxxxxx\",\"public_live_key\":\"pk_live_xxxxxxxxxxxxxxxxxxxxx\"}]'),(51,'paystack_currency','NGN');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tag` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tagable_id` int(11) DEFAULT NULL,
  `tagable_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag`
--

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
/*!40000 ALTER TABLE `tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `skills` longtext COLLATE utf8_unicode_ci NOT NULL,
  `social_links` longtext COLLATE utf8_unicode_ci,
  `biography` longtext COLLATE utf8_unicode_ci,
  `role_id` int(11) DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL,
  `wishlist` longtext COLLATE utf8_unicode_ci,
  `title` longtext COLLATE utf8_unicode_ci,
  `payment_keys` longtext COLLATE utf8_unicode_ci NOT NULL,
  `verification_code` longtext COLLATE utf8_unicode_ci,
  `status` int(11) DEFAULT NULL,
  `is_instructor` int(11) DEFAULT '0',
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sessions` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `skills`, `social_links`, `biography`, `role_id`, `date_added`, `last_modified`, `wishlist`, `title`, `payment_keys`, `verification_code`, `status`, `is_instructor`, `image`, `sessions`) VALUES (1,'Super','Admin','admin@edaface.com','f320ac9ea7f7c6122e33caa425d7dce06eb5e8a2','','{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}',NULL,1,NULL,NULL,NULL,NULL,'',NULL,1,1,NULL,''),(2,'anthony','Abidakun','toni@vitalclick.co.za','3ee4332c28349d34ca3ecbd308c9da7aeb64bd94','','{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}',NULL,2,1670935083,NULL,'[]',NULL,'{\"paypal\":{\"production_client_id\":\"\",\"production_secret_key\":\"\"},\"stripe\":{\"public_live_key\":\"\",\"secret_live_key\":\"\"},\"razorpay\":{\"key_id\":\"\",\"secret_key\":\"\"}}','197387',1,0,NULL,'[\"6b4af926e5b3eeeb485960a87f714595f38bcd00\"]'),(3,'MCD','Testing','mcdglobal20@gmail.com','310b947704f6b75c274d6565a6fb71a9af3e7c92','','{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}',NULL,2,1671870539,NULL,'[]',NULL,'{\"paypal\":{\"production_client_id\":\"\",\"production_secret_key\":\"\"},\"stripe\":{\"public_live_key\":\"\",\"secret_live_key\":\"\"},\"razorpay\":{\"key_id\":\"\",\"secret_key\":\"\"}}','196573',1,0,NULL,'[\"47a88beba01592a1a10617395317fe7a87e065ed\"]');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `watch_histories`
--

DROP TABLE IF EXISTS `watch_histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `watch_histories` (
  `watch_history_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `completed_lesson` longtext COLLATE utf8_unicode_ci NOT NULL,
  `course_progress` int(11) NOT NULL,
  `watching_lesson_id` int(11) NOT NULL,
  `quiz_result` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date_added` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_updated` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`watch_history_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `watch_histories`
--

LOCK TABLES `watch_histories` WRITE;
/*!40000 ALTER TABLE `watch_histories` DISABLE KEYS */;
INSERT INTO `watch_histories` (`watch_history_id`, `course_id`, `student_id`, `completed_lesson`, `course_progress`, `watching_lesson_id`, `quiz_result`, `date_added`, `date_updated`) VALUES (1,1,2,'[\"2\"]',100,5,'','1671650941','1671871586'),(2,1,1,'',0,4,'','1671869361','1671869945'),(3,1,3,'',0,5,'','1671870675','1671873295');
/*!40000 ALTER TABLE `watch_histories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `watched_duration`
--

DROP TABLE IF EXISTS `watched_duration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `watched_duration` (
  `watched_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `watched_student_id` int(11) DEFAULT NULL,
  `watched_course_id` int(11) DEFAULT NULL,
  `watched_lesson_id` int(11) DEFAULT NULL,
  `current_duration` int(20) DEFAULT NULL,
  `watched_counter` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`watched_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `watched_duration`
--

LOCK TABLES `watched_duration` WRITE;
/*!40000 ALTER TABLE `watched_duration` DISABLE KEYS */;
INSERT INTO `watched_duration` (`watched_id`, `watched_student_id`, `watched_course_id`, `watched_lesson_id`, `current_duration`, `watched_counter`) VALUES (1,2,1,4,5,'[\"5\"]'),(2,1,1,4,5,'[\"5\"]'),(3,3,1,4,5,'[\"5\"]');
/*!40000 ALTER TABLE `watched_duration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'evillage_soc'
--

--
-- Dumping routines for database 'evillage_soc'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-03  7:30:08
