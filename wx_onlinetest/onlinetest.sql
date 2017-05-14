-- MySQL dump 10.13  Distrib 5.7.18, for Linux (x86_64)
--
-- Host: localhost    Database: onlinetest
-- ------------------------------------------------------
-- Server version	5.7.18-0ubuntu0.16.04.1

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
-- Table structure for table `test_choice`
--

DROP TABLE IF EXISTS `test_choice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test_choice` (
  `cid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `choice_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `choice_sid` int(11) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_choice`
--

LOCK TABLES `test_choice` WRITE;
/*!40000 ALTER TABLE `test_choice` DISABLE KEYS */;
INSERT INTO `test_choice` VALUES (91,'其外恶气',25),(92,'其外恶气',25),(93,'其外恶气万恶',25),(94,'２１',90),(95,'其外额',90),(96,'其外额',90),(97,'',90),(99,'123123',26),(100,'123123',26),(101,'123123',26);
/*!40000 ALTER TABLE `test_choice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_pmark`
--

DROP TABLE IF EXISTS `test_pmark`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test_pmark` (
  `pm_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `psy_id` int(11) unsigned NOT NULL,
  `psy_mark` int(20) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`pm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_pmark`
--

LOCK TABLES `test_pmark` WRITE;
/*!40000 ALTER TABLE `test_pmark` DISABLE KEYS */;
INSERT INTO `test_pmark` VALUES (1,1,80,1),(2,1,10,5);
/*!40000 ALTER TABLE `test_pmark` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_pyschology`
--

DROP TABLE IF EXISTS `test_pyschology`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test_pyschology` (
  `pid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ps_status` int(5) unsigned NOT NULL DEFAULT '0',
  `ps_time` datetime NOT NULL,
  `p_name` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_pyschology`
--

LOCK TABLES `test_pyschology` WRITE;
/*!40000 ALTER TABLE `test_pyschology` DISABLE KEYS */;
INSERT INTO `test_pyschology` VALUES (1,1,'2017-05-11 22:10:52','心理测评１'),(2,1,'2017-05-11 22:24:18','心理测评２');
/*!40000 ALTER TABLE `test_pyschology` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_question`
--

DROP TABLE IF EXISTS `test_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test_question` (
  `qid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `q_question` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `add_time` datetime NOT NULL,
  `q_status` int(11) unsigned NOT NULL DEFAULT '0',
  `q_answer` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `question_type` int(11) NOT NULL DEFAULT '1',
  `add_id` int(10) NOT NULL,
  PRIMARY KEY (`qid`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_question`
--

LOCK TABLES `test_question` WRITE;
/*!40000 ALTER TABLE `test_question` DISABLE KEYS */;
INSERT INTO `test_question` VALUES (2,'题目３','2017-05-09 20:07:51',0,'1',0,0),(15,'１２','2017-05-11 23:15:16',0,'1',1,1),(16,'２３４','2017-05-11 23:15:16',0,'1',1,1),(17,'２３４２３','2017-05-11 23:15:16',0,'1',1,1),(18,'１２','2017-05-11 23:15:54',0,'1',1,1),(19,'其外额','2017-05-11 23:15:54',0,'1',1,1),(20,'１２３','2017-05-11 23:15:54',0,'1',1,1),(21,'１２','2017-05-11 23:17:17',0,'1',1,2),(22,'１２３','2017-05-11 23:17:17',0,'1',1,2),(26,'其外额','2017-05-11 23:21:33',0,'1',0,1),(27,'完全额外额外额','2017-05-11 23:21:33',0,'1',0,1),(28,'额额','2017-05-11 23:22:05',0,'1',0,1),(29,'其外额２','2017-05-11 23:22:05',0,'1',0,1),(30,'１２额','2017-05-11 23:23:40',0,'1',0,2),(31,'其外额阿达','2017-05-11 23:23:40',0,'1',0,2),(32,'其外恶气万恶','2017-05-11 23:23:40',0,'1',0,2),(33,'wqqddd','2017-05-12 15:16:46',0,'1',1,6),(34,'aaddd','2017-05-12 15:16:46',0,'1',1,6),(35,'aaassfff','2017-05-12 15:16:46',0,'1',1,6),(36,'qwe','2017-05-12 15:35:39',0,'1',1,1),(37,'123','2017-05-12 15:56:23',0,'1',1,6),(38,'12','2017-05-12 15:59:45',0,'1',1,6),(40,'23123','2017-05-12 16:02:38',0,'1',1,6),(41,'wqw','2017-05-12 16:04:20',0,'1',1,6),(42,'qwe','2017-05-12 16:04:20',0,'1',1,6);
/*!40000 ALTER TABLE `test_question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_skill`
--

DROP TABLE IF EXISTS `test_skill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test_skill` (
  `sid` int(30) unsigned NOT NULL AUTO_INCREMENT,
  `skill_name` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `skill_time` datetime NOT NULL,
  `skill_status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_skill`
--

LOCK TABLES `test_skill` WRITE;
/*!40000 ALTER TABLE `test_skill` DISABLE KEYS */;
INSERT INTO `test_skill` VALUES (1,'测试一','2017-05-09 14:03:28',0),(6,'测试２','2017-05-11 22:35:59',1);
/*!40000 ALTER TABLE `test_skill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_smark`
--

DROP TABLE IF EXISTS `test_smark`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test_smark` (
  `mid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ski_id` int(20) unsigned NOT NULL,
  `skill_mark` int(20) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_smark`
--

LOCK TABLES `test_smark` WRITE;
/*!40000 ALTER TABLE `test_smark` DISABLE KEYS */;
INSERT INTO `test_smark` VALUES (1,1,70,1),(2,6,50,5),(3,6,50,5),(4,6,65,5),(5,6,65,5);
/*!40000 ALTER TABLE `test_smark` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_user`
--

DROP TABLE IF EXISTS `test_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test_user` (
  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `user_type` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_user`
--

LOCK TABLES `test_user` WRITE;
/*!40000 ALTER TABLE `test_user` DISABLE KEYS */;
INSERT INTO `test_user` VALUES (1,'admin','a9986595098961f0eb08958b06bcbe62',1),(3,'shaoziyuan','21232f297a57a5a743894a0e4a801fc3',0),(4,'shaoziyuan','a9986595098961f0eb08958b06bcbe62',0),(5,'nightwaking','a9986595098961f0eb08958b06bcbe62',0);
/*!40000 ALTER TABLE `test_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-14 15:12:11
