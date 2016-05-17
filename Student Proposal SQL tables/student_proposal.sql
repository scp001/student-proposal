CREATE DATABASE  IF NOT EXISTS `studentproposal` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `studentproposal`;
-- MySQL dump 10.13  Distrib 5.5.40, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: studentproposal
-- ------------------------------------------------------
-- Server version	5.5.40-0ubuntu0.14.04.1

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
-- Table structure for table `form`
--

DROP TABLE IF EXISTS `form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `form_name` varchar(50) DEFAULT NULL,
  `shortname` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form`
--

LOCK TABLES `form` WRITE;
/*!40000 ALTER TABLE `form` DISABLE KEYS */;
INSERT INTO `form` VALUES (1,'Academic Travel Fund','actf'),(2,'Enhancement/Partnership/DSA Fund Online Form','fof');
/*!40000 ALTER TABLE `form` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fund_online_form`
--

DROP TABLE IF EXISTS `fund_online_form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fund_online_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `funding_type` int(11) DEFAULT NULL,
  `group` int(11) DEFAULT NULL,
  `contact_name` varchar(45) DEFAULT NULL,
  `contact_email` varchar(45) DEFAULT NULL,
  `contact_phone` varchar(45) DEFAULT NULL,
  `funding_workshop` text,
  `round` int(11) DEFAULT NULL,
  `event_name` varchar(45) DEFAULT NULL,
  `event_location` int(11) DEFAULT NULL,
  `contribution` longtext,
  `item1` varchar(45) DEFAULT NULL,
  `item2` varchar(45) DEFAULT NULL,
  `item3` varchar(45) DEFAULT NULL,
  `item4` varchar(45) DEFAULT NULL,
  `item5` varchar(45) DEFAULT NULL,
  `item_amount1` float DEFAULT NULL,
  `item_amount2` float DEFAULT NULL,
  `item_amount3` float DEFAULT NULL,
  `item_amount4` float DEFAULT NULL,
  `item_amount5` float DEFAULT NULL,
  `revenue1` varchar(45) DEFAULT NULL,
  `revenue2` varchar(45) DEFAULT NULL,
  `revenue3` varchar(45) DEFAULT NULL,
  `revenue4` varchar(45) DEFAULT NULL,
  `revenue5` varchar(45) DEFAULT NULL,
  `revenue_amount1` float DEFAULT NULL,
  `revenue_amount2` float DEFAULT NULL,
  `revenue_amount3` float DEFAULT NULL,
  `revenue_amount4` float DEFAULT NULL,
  `revenue_amount5` float DEFAULT NULL,
  `req_and_rule` longtext,
  `name_group_proposal` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `internal_comment` text,
  `student_comment` text,
  `approved_amount` float DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reimbursment` text,
  `name_cheque` varchar(45) DEFAULT NULL,
  `gate_keeper_approve` int(11) DEFAULT NULL,
  `group2` varchar(45) DEFAULT NULL,
  `group3` varchar(45) DEFAULT NULL,
  `group4` varchar(45) DEFAULT NULL,
  `group5` varchar(45) DEFAULT NULL,
  `amount_requested` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fund_online_form`
--

LOCK TABLES `fund_online_form` WRITE;
/*!40000 ALTER TABLE `fund_online_form` DISABLE KEYS */;
INSERT INTO `fund_online_form` VALUES (1,1,NULL,'Yadi Xing','yadi.xing@utoronto.ca','2266065154','08/04/2015',1,'13',1,'QWE','1',NULL,NULL,NULL,NULL,10,NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL,NULL,20,NULL,NULL,NULL,NULL,'ASD','123',1,'2015-08-04 10:37:42',NULL,NULL,NULL,'2015-08-04 10:13:58',79585,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL),(2,1,NULL,'Yadi Xing','yadi.xing@utoronto.ca','2266065154','08/02/2015',1,'123',1,'123','11',NULL,NULL,NULL,NULL,10,NULL,NULL,NULL,NULL,'2',NULL,NULL,NULL,NULL,10,NULL,NULL,NULL,NULL,'123','123',1,'2015-08-06 10:36:11',NULL,NULL,NULL,'2015-08-06 10:31:33',79585,NULL,NULL,1,NULL,NULL,NULL,NULL,'1230'),(3,1,NULL,'Yadi Xing','yadi.xing@utoronto.ca','','08/04/2015',1,'',1,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','123',0,'2015-08-04 10:21:27',NULL,NULL,NULL,'2015-08-04 10:21:27',79585,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,1,NULL,'Yadi Xing','yadi.xing@utoronto.ca','','',1,'',1,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,0,'2015-08-04 13:17:21',NULL,NULL,NULL,'2015-08-04 13:17:21',79585,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,1,NULL,'Yadi Xing','yadi.xing@utoronto.ca','2266065154','08/03/2015',1,'hehe',1,'123','1',NULL,NULL,NULL,NULL,10,NULL,NULL,NULL,NULL,'2',NULL,NULL,NULL,NULL,20,NULL,NULL,NULL,NULL,'12','1',1,'2015-08-04 14:29:36',NULL,NULL,NULL,'2015-08-04 14:29:36',79585,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,1,NULL,'Yadi Xing','yadi.xing@utoronto.ca','2266065154','08/04/2015',1,'12',1,'12','1',NULL,NULL,NULL,NULL,10,NULL,NULL,NULL,NULL,'2',NULL,NULL,NULL,NULL,20,NULL,NULL,NULL,NULL,'123','1',1,'2015-08-04 14:35:51',NULL,NULL,NULL,'2015-08-04 14:35:51',79585,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,1,NULL,'Yadi Xing','yadi.xing@utoronto.ca','2266065154','08/04/2015',1,'dasdasd',1,'12','1',NULL,NULL,NULL,NULL,10,NULL,NULL,NULL,NULL,'2',NULL,NULL,NULL,NULL,20,NULL,NULL,NULL,NULL,'123','1',1,'2015-08-04 14:37:01',NULL,NULL,NULL,'2015-08-04 14:37:01',79585,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,1,NULL,'Yadi Xing','yadi.xing@utoronto.ca','2266065154','08/04/2015',1,'1',1,'1','1',NULL,NULL,NULL,NULL,10,NULL,NULL,NULL,NULL,'2',NULL,NULL,NULL,NULL,20,NULL,NULL,NULL,NULL,'sad','1',1,'2015-08-04 14:43:04',NULL,NULL,NULL,'2015-08-04 14:43:04',79585,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,1,NULL,'Yadi Xing','yadi.xing@utoronto.ca','2266065154','08/04/2015',1,'12',1,'12','1',NULL,NULL,NULL,NULL,10,NULL,NULL,NULL,NULL,'2',NULL,NULL,NULL,NULL,20,NULL,NULL,NULL,NULL,'12','1',1,'2015-08-04 15:22:48',NULL,NULL,NULL,'2015-08-04 14:48:16',79585,NULL,NULL,1,'2','3','4',NULL,NULL),(10,1,NULL,'Yadi Xing','yadi.xing@utoronto.ca','2266065154','08/05/2015',1,'123',1,'123','1',NULL,NULL,NULL,NULL,10,NULL,NULL,NULL,NULL,'2',NULL,NULL,NULL,NULL,20,NULL,NULL,NULL,NULL,'123','err',1,'2015-08-05 11:59:43',NULL,NULL,NULL,'2015-08-05 11:58:14',79585,NULL,NULL,1,'43','21','31','55',NULL),(11,1,NULL,'Yadi Xing','yadi.xing@utoronto.ca','2266065154','08/05/2015',1,'hehe',1,'123','1',NULL,NULL,NULL,NULL,10,NULL,NULL,NULL,NULL,'2',NULL,NULL,NULL,NULL,20,NULL,NULL,NULL,NULL,'err','1',1,'2015-08-05 11:54:35',NULL,NULL,NULL,'2015-08-05 11:54:35',79585,NULL,NULL,NULL,'2','3','4','5',NULL),(12,1,NULL,'Yadi Xing','yadi.xing@utoronto.ca','2266065154','08/05/2015',1,'123',1,'123','1',NULL,NULL,NULL,NULL,10,NULL,NULL,NULL,NULL,'2',NULL,NULL,NULL,NULL,20,NULL,NULL,NULL,NULL,'123 ','1',1,'2015-08-05 12:50:24',NULL,NULL,NULL,'2015-08-05 12:50:24',79585,NULL,NULL,NULL,'2',NULL,NULL,NULL,NULL),(13,1,NULL,'Yadi Xing','yadi.xing@utoronto.ca','2266065154','08/05/2015',1,'hmmm',1,'123','1','2',NULL,NULL,NULL,10,20,NULL,NULL,NULL,'1',NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,'123','123',1,'2015-08-05 13:35:10',NULL,NULL,NULL,'2015-08-05 13:35:10',79585,NULL,NULL,NULL,'hehe',NULL,NULL,NULL,NULL),(14,1,NULL,'Yadi Xing','yadi.xing@utoronto.ca','','08/05/2015',1,'',1,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,0,'2015-08-05 15:24:27',NULL,NULL,NULL,'2015-08-05 15:24:27',79585,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(15,1,NULL,'Yadi Xing','yadi.xing@utoronto.ca','','08/05/2015',1,'',1,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,0,'2015-08-05 15:28:55',NULL,NULL,NULL,'2015-08-05 15:28:55',79585,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0'),(16,1,NULL,'Yadi Xing','yadi.xing@utoronto.ca','','08/05/2015',1,'',1,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,0,'2015-08-05 15:30:12',NULL,NULL,NULL,'2015-08-05 15:30:12',79585,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0'),(17,1,NULL,'Yadi Xing','yadi.xing@utoronto.ca','2266065154','08/05/2015',1,'123',1,'12','1',NULL,NULL,NULL,NULL,10,NULL,NULL,NULL,NULL,'2',NULL,NULL,NULL,NULL,20,NULL,NULL,NULL,NULL,'1 2 ','1',1,'2015-08-06 11:55:18',NULL,NULL,NULL,'2015-08-06 11:55:18',79585,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'10'),(18,1,NULL,'Yadi Xing','yadi.xing@utoronto.ca','2266065154','08/05/2015',1,'123',1,'123','1',NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,'f  s s  d','12',1,'2015-08-05 15:49:47',NULL,NULL,NULL,'2015-08-05 15:49:47',79585,NULL,NULL,NULL,'34',NULL,NULL,NULL,''),(19,1,NULL,'Yadi Xing','yadi.xing@utoronto.ca','2266065154','08/06/2015',1,'1',1,'1','1',NULL,NULL,NULL,NULL,10,NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL,NULL,10,NULL,NULL,NULL,NULL,'1','1',1,'2015-08-06 11:59:39',NULL,NULL,NULL,'2015-08-06 11:59:39',79585,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'10'),(20,1,NULL,'Yadi Xing','yadi.xing@utoronto.ca','2266065154','08/06/2015',1,'1',1,'1','1',NULL,NULL,NULL,NULL,10,NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL,NULL,10,NULL,NULL,NULL,NULL,'1','1',0,'2015-08-06 12:02:10',NULL,NULL,NULL,'2015-08-06 12:02:10',79585,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'10');
/*!40000 ALTER TABLE `fund_online_form` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rounds`
--

DROP TABLE IF EXISTS `rounds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rounds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `round1_start` text,
  `round1_end` text,
  `round2_start` text,
  `round2_end` text,
  `round3_start` text,
  `round4_end` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rounds`
--

LOCK TABLES `rounds` WRITE;
/*!40000 ALTER TABLE `rounds` DISABLE KEYS */;
/*!40000 ALTER TABLE `rounds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `travel_fund_form`
--

DROP TABLE IF EXISTS `travel_fund_form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `travel_fund_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_name` varchar(45) DEFAULT NULL,
  `tcard` int(11) DEFAULT NULL,
  `contact_email` varchar(45) DEFAULT NULL,
  `contact_phone` varchar(45) DEFAULT NULL,
  `round` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `program` int(11) DEFAULT NULL,
  `destination` int(11) DEFAULT NULL,
  `name_conference` varchar(45) DEFAULT NULL,
  `start_date` text,
  `end_date` text,
  `amount_travel` float DEFAULT NULL,
  `amount_acc` float DEFAULT NULL,
  `amount_con` float DEFAULT NULL,
  `amount_mis` float DEFAULT NULL,
  `other_funding` int(11) DEFAULT NULL,
  `reflection` text,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `unique_id` char(14) DEFAULT NULL,
  `internal_comment` text,
  `student_comment` text,
  `approved_amount` float DEFAULT NULL,
  `reimbursment` int(11) DEFAULT NULL,
  `name_cheque` varchar(45) DEFAULT NULL,
  `gate_keeper_approve` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `travel_fund_form`
--

LOCK TABLES `travel_fund_form` WRITE;
/*!40000 ALTER TABLE `travel_fund_form` DISABLE KEYS */;
INSERT INTO `travel_fund_form` VALUES (1,'Yadi Xing',998804799,'yadi.xing@utoronto.ca','2266065154',1,1,1,0,'123','07/28/15','08/14/2015',10,10,10,0.01,2,'123456','2015-07-29 10:10:04','2015-07-28 10:59:44',79585,6,'55b798e0df2ca','ok','good',10,0,'',1),(2,'Yadi Xing',998804799,'yadi.xing@utoronto.ca','2266065154',1,1,1,0,'wqe','07/28/15','07/31/2015',0.01,0.01,10,10,2,'','2015-07-29 10:06:40','2015-07-28 15:25:23',79585,6,'55b7d723f138a','','',0,1,'',1),(3,'Yadi Xing',998804799,'yadi.xing@utoronto.ca','2266065154',1,1,1,0,'asd','07/28/15','07/28/15',10,20,0,0,2,'123','2015-07-29 10:01:39','2015-07-28 15:27:46',79585,6,'55b7d7b2a9d92','asd','asd',10,1,'',1),(4,'Yadi Xing',998804799,'yadi.xing@utoronto.ca','6472341234',1,1,1,0,'qwe','07/28/15','07/28/15',0,0,0,0,0,'123','2015-07-29 10:32:27','2015-07-28 15:57:25',79585,7,'55b7dea562276','asd','asd',120,1,'',1),(5,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,'2015-07-30 13:17:41','2015-07-30 13:17:41',NULL,0,'55ba5c357adb8',NULL,NULL,NULL,NULL,NULL,NULL),(6,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,'2015-07-31 14:10:09','2015-07-31 14:10:09',NULL,0,'55bbba0197ef6',NULL,NULL,NULL,NULL,NULL,NULL),(7,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,'2015-07-31 14:18:46','2015-07-31 14:18:46',NULL,0,'55bbbc0634151',NULL,NULL,NULL,NULL,NULL,NULL),(8,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,'2015-07-31 14:19:55','2015-07-31 14:19:55',NULL,0,'55bbbc4c00877',NULL,NULL,NULL,NULL,NULL,NULL),(9,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,'2015-07-31 14:21:13','2015-07-31 14:21:13',NULL,0,'55bbbc991f424',NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `travel_fund_form` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `peopleid` int(11) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `permission_level` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`peopleid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (57727,'Julia','Bronfenbrener','committee','bronfen@utsc.utoronto.ca','2015-07-30 18:15:43'),(59385,'Syed','Kashif','gatekeeper','kashif@utsc.utoronto.ca','2015-07-30 18:22:59');
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

-- Dump completed on 2015-08-06 15:20:17
