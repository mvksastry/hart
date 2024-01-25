-- MySQL dump 10.13  Distrib 8.0.35, for Win64 (x86_64)
--
-- Host: localhost    Database: smoffice
-- ------------------------------------------------------
-- Server version	8.0.35

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `advances`
--

DROP TABLE IF EXISTS `advances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `advances` (
  `adv_id` int unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int unsigned NOT NULL,
  `uuid` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'nd',
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `principal` float(9,2) NOT NULL DEFAULT '0.00',
  `interest` float(9,2) NOT NULL DEFAULT '0.00',
  `total` float(9,2) NOT NULL DEFAULT '0.00',
  `installments` int unsigned DEFAULT '0',
  `instmts_due` int unsigned DEFAULT '0',
  `inst_amount` float(9,2) NOT NULL DEFAULT '0.00',
  `last_installment` float(9,2) NOT NULL DEFAULT '0.00',
  `status` tinyint unsigned DEFAULT '0',
  `posted_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edited_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`adv_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `advances`
--

LOCK TABLES `advances` WRITE;
/*!40000 ALTER TABLE `advances` DISABLE KEYS */;
/*!40000 ALTER TABLE `advances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `category_id` int unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(10) NOT NULL,
  `age_relax` int NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `committees`
--

DROP TABLE IF EXISTS `committees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `committees` (
  `committee_id` int unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `frequency` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mandate` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `agenda` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `minutes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` tinyint unsigned DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`committee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `committees`
--

LOCK TABLES `committees` WRITE;
/*!40000 ALTER TABLE `committees` DISABLE KEYS */;
/*!40000 ALTER TABLE `committees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `communications`
--

DROP TABLE IF EXISTS `communications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `communications` (
  `communication_id` int unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int unsigned NOT NULL,
  `date_submitted` date NOT NULL,
  `subject` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `filename` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `folder` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comments` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `uuid` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint unsigned DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`communication_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `communications`
--

LOCK TABLES `communications` WRITE;
/*!40000 ALTER TABLE `communications` DISABLE KEYS */;
/*!40000 ALTER TABLE `communications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `decisions`
--

DROP TABLE IF EXISTS `decisions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `decisions` (
  `uuid` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `supervisor_decision` tinyint unsigned DEFAULT NULL,
  `supervisor_decision_date` date DEFAULT NULL,
  `gl_decision` tinyint unsigned DEFAULT NULL,
  `gl_decision_date` date DEFAULT NULL,
  `sh_decision` tinyint unsigned DEFAULT NULL,
  `sh_decision_date` date DEFAULT NULL,
  `coa_decision` tinyint unsigned DEFAULT NULL,
  `coa_decision_date` date DEFAULT NULL,
  `director_decision` tinyint unsigned DEFAULT NULL,
  `director_decision_date` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `decisions`
--

LOCK TABLES `decisions` WRITE;
/*!40000 ALTER TABLE `decisions` DISABLE KEYS */;
/*!40000 ALTER TABLE `decisions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employees` (
  `employee_id` int unsigned NOT NULL,
  `gender_id` int unsigned NOT NULL,
  `department` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `join_date` date NOT NULL,
  `designation` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level_id` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `basic_pay` int unsigned NOT NULL,
  `variable_pay` int unsigned DEFAULT NULL,
  `increment_date` date DEFAULT NULL,
  `office_phone` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `mobile_phone1` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `mobile_phone2` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `validity_date` date NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `photofile` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `folder_name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `website_link` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `status` tinyint unsigned DEFAULT '0',
  `tds` int unsigned DEFAULT '0',
  `suspension` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (1,1,'admin','1978-04-01','2023-08-01','Chief Admin Officer','14',2400000,1200000,'2024-09-01','04012345678','9876543210','9876501234','2026-08-31','Building H, No 23, Spires Society, Abcd Road Ec, Jusidye Hudyy - 123456',NULL,'2YS0JMyn4z12Ln4',NULL,1,0,'no','2024-01-09 06:06:08','2024-01-11 07:10:23');
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enquirytypes`
--

DROP TABLE IF EXISTS `enquirytypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enquirytypes` (
  `enquirytype_id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gfr_details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `rules` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`enquirytype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enquirytypes`
--

LOCK TABLES `enquirytypes` WRITE;
/*!40000 ALTER TABLE `enquirytypes` DISABLE KEYS */;
/*!40000 ALTER TABLE `enquirytypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `events` (
  `event_id` int unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int unsigned NOT NULL,
  `event_type` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `event_start` datetime DEFAULT NULL,
  `event_end` datetime DEFAULT NULL,
  `event_venue` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT 'not defined',
  `condition` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'open',
  `council` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint unsigned DEFAULT '1',
  `uuid` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (2,1,'1','2024-02-02 16:00:00','2024-02-02 17:00:00','Central Foyer','Open',NULL,'admin smoffice: 2024-01-06: No Formal dress code',1,'22eef800-ac7c-11ee-bf02-15220e942128','2024-01-06 10:12:45','2024-01-06 10:12:45');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eventypes`
--

DROP TABLE IF EXISTS `eventypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `eventypes` (
  `eventype_id` int unsigned NOT NULL AUTO_INCREMENT,
  `eventname` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `eventdate` date NOT NULL,
  `description` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `conditions` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `posted_by` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `edited_by` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`eventype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventypes`
--

LOCK TABLES `eventypes` WRITE;
/*!40000 ALTER TABLE `eventypes` DISABLE KEYS */;
INSERT INTO `eventypes` VALUES (1,'Foundation Day','2024-01-31','To celebrate foundation day of the organization for reaching next stage, derive inspiration.','Open','admin smoffice','admin smoffice','2024-01-06 02:35:53','2024-01-06 03:01:52');
/*!40000 ALTER TABLE `eventypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expskills`
--

DROP TABLE IF EXISTS `expskills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `expskills` (
  `expskill_id` int unsigned NOT NULL,
  `professional_skills` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `academic_projects` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `certifications` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `training_internship` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_experience` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publications` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `patents` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hobbies` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`expskill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expskills`
--

LOCK TABLES `expskills` WRITE;
/*!40000 ALTER TABLE `expskills` DISABLE KEYS */;
/*!40000 ALTER TABLE `expskills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `groups` (
  `groupleader_id` int unsigned NOT NULL,
  `member_id` int unsigned NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`groupleader_id`,`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `holidays`
--

DROP TABLE IF EXISTS `holidays`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `holidays` (
  `holiday_id` int unsigned NOT NULL AUTO_INCREMENT,
  `holiday_date` date NOT NULL,
  `holiday_name` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `holiday_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'gazetted',
  `posted_by` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `edited_by` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`holiday_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `holidays`
--

LOCK TABLES `holidays` WRITE;
/*!40000 ALTER TABLE `holidays` DISABLE KEYS */;
INSERT INTO `holidays` VALUES (1,'2024-01-29','Foundation Day','declared','admin smoffice','not done','2024-01-02 02:08:01','2024-01-02 02:08:01');
/*!40000 ALTER TABLE `holidays` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hops`
--

DROP TABLE IF EXISTS `hops`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hops` (
  `uuid` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `step_id` int unsigned NOT NULL,
  `from_id` int unsigned NOT NULL,
  `next_id` int unsigned DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hops`
--

LOCK TABLES `hops` WRITE;
/*!40000 ALTER TABLE `hops` DISABLE KEYS */;
INSERT INTO `hops` VALUES ('88219180-ade3-11ee-bea0-73d0a9fbd3ed',2,1,NULL,'2024-01-08 05:05:26','2024-01-08 05:05:26','{\"Employee\":{\"step_id\":\"1\",\"id\":1,\"notes\":\"no\",\"status\":\"complete\"},\"Supervisor\":{\"step_id\":\"2\",\"id\":null,\"notes\":\"no\",\"status\":\"incomplete\"},\"Admin\":{\"step_id\":\"3\",\"id\":\"1\",\"notes\":\"yes\",\"status\":\"incomplete\"},\"Director\":{\"step_id\":\"4\",\"id\":\"6\",\"notes\":\"yes\",\"status\":\"incomplete\"}}');
/*!40000 ALTER TABLE `hops` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `itax`
--

DROP TABLE IF EXISTS `itax`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `itax` (
  `itax_id` int unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int unsigned NOT NULL,
  `rent_paid` float(9,2) DEFAULT '0.00',
  `ll_name` float(9,2) DEFAULT '0.00',
  `ll_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `ll_pan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `hli_paid` float(9,2) DEFAULT '0.00',
  `hl_lender_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `hl_lender_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `hl_lender_pan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `sec_80C_1` float(9,2) DEFAULT '0.00',
  `sec_80C_2` float(9,2) DEFAULT '0.00',
  `sec_80C_3` float(9,2) DEFAULT '0.00',
  `sec_80C_4` float(9,2) DEFAULT '0.00',
  `sec_80C_5` float(9,2) DEFAULT '0.00',
  `sec_80C_6` float(9,2) DEFAULT '0.00',
  `sec_80C_7` float(9,2) DEFAULT '0.00',
  `sec_80C_8` float(9,2) DEFAULT '0.00',
  `sec_80C_9` float(9,2) DEFAULT '0.00',
  `sec_80C_10` float(9,2) DEFAULT '0.00',
  `sec_80C_11` float(9,2) DEFAULT '0.00',
  `sec_80C_12` float(9,2) DEFAULT '0.00',
  `sec_80C_13` float(9,2) DEFAULT '0.00',
  `sec_80C_14` float(9,2) DEFAULT '0.00',
  `sec_80CCC` float(9,2) DEFAULT '0.00',
  `sec_80CCD_1` float(9,2) DEFAULT '0.00',
  `sec_80CCD_1B` float(9,2) DEFAULT '0.00',
  `sec_80CCD_2` float(9,2) DEFAULT '0.00',
  `sec_80CCG` float(9,2) DEFAULT '0.00',
  `sec_80D` float(9,2) DEFAULT '0.00',
  `sec_80DD` float(9,2) DEFAULT '0.00',
  `sec_80DDB` float(9,2) DEFAULT '0.00',
  `sec_80E` float(9,2) DEFAULT '0.00',
  `sec_80EE` float(9,2) DEFAULT '0.00',
  `sec_80G` float(9,2) DEFAULT '0.00',
  `sec_80GG` float(9,2) DEFAULT '0.00',
  `sec_80GGA` float(9,2) DEFAULT '0.00',
  `sec_80GGB` float(9,2) DEFAULT '0.00',
  `sec_80GGC` float(9,2) DEFAULT '0.00',
  `sec_80TTA` float(9,2) DEFAULT '0.00',
  `sec_higher_studies` float(9,2) DEFAULT '0.00',
  `sec_relief_charity` float(9,2) DEFAULT '0.00',
  `tds_buffer` float(9,2) DEFAULT '0.00',
  `filename` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'none',
  `uuid` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`itax_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `itax`
--

LOCK TABLES `itax` WRITE;
/*!40000 ALTER TABLE `itax` DISABLE KEYS */;
/*!40000 ALTER TABLE `itax` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `leaverecords`
--

DROP TABLE IF EXISTS `leaverecords`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `leaverecords` (
  `leaverecord_id` int unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int unsigned NOT NULL,
  `eligible_leavetype_id` int unsigned NOT NULL,
  `current_year` int unsigned DEFAULT NULL,
  `current_year_credit_status` tinyint unsigned DEFAULT NULL,
  `current_year_credit` decimal(6,1) unsigned NOT NULL,
  `current_year_consumed` decimal(6,1) unsigned NOT NULL,
  `current_year_balance` decimal(6,1) unsigned NOT NULL,
  `cumulative_balance` decimal(6,1) unsigned NOT NULL,
  `balance_updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`leaverecord_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leaverecords`
--

LOCK TABLES `leaverecords` WRITE;
/*!40000 ALTER TABLE `leaverecords` DISABLE KEYS */;
INSERT INTO `leaverecords` VALUES (1,1,1,2024,1,5.0,0.0,5.0,5.0,'2024-01-07 20:28:05','2024-01-07 14:58:05','2024-01-07 14:58:05'),(2,2,2,2024,1,5.0,0.0,5.0,5.0,'2024-01-07 20:28:05','2024-01-07 14:58:05','2024-01-07 14:58:05'),(3,3,3,2024,1,5.0,0.0,5.0,5.0,'2024-01-07 20:28:05','2024-01-07 14:58:05','2024-01-07 14:58:05'),(4,4,3,2024,1,5.0,0.0,5.0,5.0,'2024-01-07 20:28:06','2024-01-07 14:58:06','2024-01-07 14:58:06'),(5,6,3,2024,1,5.0,0.0,5.0,5.0,'2024-01-07 20:28:06','2024-01-07 14:58:06','2024-01-07 14:58:06'),(6,7,3,2024,1,5.0,0.0,5.0,5.0,'2024-01-07 20:28:06','2024-01-07 14:58:06','2024-01-07 14:58:06'),(7,8,3,2024,1,5.0,0.0,5.0,5.0,'2024-01-07 20:28:06','2024-01-07 14:58:06','2024-01-07 14:58:06'),(8,9,3,2024,1,5.0,0.0,5.0,5.0,'2024-01-07 20:28:06','2024-01-07 14:58:06','2024-01-07 14:58:06'),(9,10,3,2024,1,5.0,0.0,5.0,5.0,'2024-01-07 20:28:06','2024-01-07 14:58:06','2024-01-07 14:58:06'),(10,38,3,2024,1,5.0,0.0,5.0,5.0,'2024-01-07 20:28:06','2024-01-07 14:58:06','2024-01-07 14:58:06'),(11,40,4,2024,1,5.0,0.0,5.0,5.0,'2024-01-07 20:28:06','2024-01-07 14:58:06','2024-01-07 14:58:06'),(12,39,5,2024,1,5.0,0.0,5.0,5.0,'2024-01-07 20:28:06','2024-01-07 14:58:06','2024-01-07 14:58:06'),(13,41,5,2024,1,5.0,0.0,5.0,5.0,'2024-01-07 20:28:06','2024-01-07 14:58:06','2024-01-07 14:58:06'),(14,5,6,2024,1,5.0,0.0,5.0,5.0,'2024-01-07 20:28:07','2024-01-07 14:58:07','2024-01-07 14:58:07'),(15,42,7,2024,1,5.0,0.0,5.0,5.0,'2024-01-07 20:28:07','2024-01-07 14:58:07','2024-01-07 14:58:07');
/*!40000 ALTER TABLE `leaverecords` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `leaves`
--

DROP TABLE IF EXISTS `leaves`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `leaves` (
  `leave_id` int unsigned NOT NULL AUTO_INCREMENT,
  `leavetype_id` int unsigned NOT NULL,
  `employee_id` int unsigned NOT NULL,
  `leave_start` date NOT NULL,
  `leave_start_session` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Forenoon',
  `leave_end` date NOT NULL,
  `leave_end_session` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Afternoon',
  `total_days` decimal(5,1) unsigned DEFAULT '0.0',
  `leave_reason` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `comments` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `submission_date` date DEFAULT NULL,
  `status` tinyint unsigned DEFAULT '1',
  `leave_status` tinyint unsigned DEFAULT '0',
  `uuid` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`leave_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leaves`
--

LOCK TABLES `leaves` WRITE;
/*!40000 ALTER TABLE `leaves` DISABLE KEYS */;
/*!40000 ALTER TABLE `leaves` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `leavetypes`
--

DROP TABLE IF EXISTS `leavetypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `leavetypes` (
  `leavetype_id` int unsigned NOT NULL AUTO_INCREMENT,
  `leavetype_name` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `leave_limit_peryear` int unsigned NOT NULL,
  `leave_conditions` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `needs_permission` tinyint(1) DEFAULT '0',
  `exclude_holidays` tinyint(1) DEFAULT '0',
  `allow_halfday` tinyint(1) DEFAULT '0',
  `eligible_gender_id` int DEFAULT '0',
  `eligible_role_id` int DEFAULT NULL,
  `carriable` tinyint(1) DEFAULT '0',
  `carried_on_limit` int unsigned DEFAULT '0',
  `cumulative_ceiling` int unsigned DEFAULT '0',
  `posted_by` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `edited_by` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`leavetype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leavetypes`
--

LOCK TABLES `leavetypes` WRITE;
/*!40000 ALTER TABLE `leavetypes` DISABLE KEYS */;
INSERT INTO `leavetypes` VALUES (1,'Casual Leave',5,'None',0,0,0,0,1,2,0,0,'admin smoffice',NULL,'2024-01-07 14:51:18','2024-01-07 14:51:18'),(2,'Casual Leave',5,'None',0,0,0,0,9,2,0,0,'admin smoffice',NULL,'2024-01-07 14:51:18','2024-01-07 14:51:18'),(3,'Casual Leave',5,'None',0,0,0,0,10,2,0,0,'admin smoffice',NULL,'2024-01-07 14:51:18','2024-01-07 14:51:18'),(4,'Casual Leave',5,'None',0,0,0,0,11,2,0,0,'admin smoffice',NULL,'2024-01-07 14:51:18','2024-01-07 14:51:18'),(5,'Casual Leave',5,'None',0,0,0,0,12,2,0,0,'admin smoffice',NULL,'2024-01-07 14:51:18','2024-01-07 14:51:18'),(6,'Casual Leave',5,'None',0,0,0,0,3,2,0,0,'admin smoffice',NULL,'2024-01-07 14:51:18','2024-01-07 14:51:18'),(7,'Casual Leave',5,'None',0,0,0,0,13,2,0,0,'admin smoffice',NULL,'2024-01-07 14:51:18','2024-01-07 14:51:18');
/*!40000 ALTER TABLE `leavetypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meetings`
--

DROP TABLE IF EXISTS `meetings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `meetings` (
  `meeting_id` int unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` int unsigned NOT NULL,
  `frequency` date NOT NULL,
  `mandate` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `agenda` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `chairman` int unsigned NOT NULL,
  `secretary` int unsigned NOT NULL,
  `convenor` int unsigned NOT NULL,
  `members` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `invitees` int unsigned DEFAULT NULL,
  `discussion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `minutes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `start_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `venue` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint unsigned DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`meeting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meetings`
--

LOCK TABLES `meetings` WRITE;
/*!40000 ALTER TABLE `meetings` DISABLE KEYS */;
/*!40000 ALTER TABLE `meetings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2014_10_12_200000_add_two_factor_columns_to_users_table',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2019_12_14_000001_create_personal_access_tokens_table',1),(6,'2020_05_21_100000_create_teams_table',1),(7,'2020_05_21_200000_create_team_user_table',1),(8,'2020_05_21_300000_create_team_invitations_table',1),(9,'2023_12_30_112038_create_sessions_table',1),(10,'2022_07_09_084132_create_posts_table',2),(11,'2023_12_30_143217_create_permission_tables',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',1),(10,'App\\Models\\User',1),(9,'App\\Models\\User',2),(10,'App\\Models\\User',3),(10,'App\\Models\\User',4),(3,'App\\Models\\User',5),(10,'App\\Models\\User',5),(10,'App\\Models\\User',6),(10,'App\\Models\\User',7),(3,'App\\Models\\User',8),(10,'App\\Models\\User',8),(10,'App\\Models\\User',9),(10,'App\\Models\\User',10),(10,'App\\Models\\User',38),(12,'App\\Models\\User',39),(11,'App\\Models\\User',40),(12,'App\\Models\\User',41),(13,'App\\Models\\User',42);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `months`
--

DROP TABLE IF EXISTS `months`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `months` (
  `month_id` int unsigned NOT NULL AUTO_INCREMENT,
  `month` varchar(10) NOT NULL,
  `short_form` varchar(3) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`month_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `months`
--

LOCK TABLES `months` WRITE;
/*!40000 ALTER TABLE `months` DISABLE KEYS */;
INSERT INTO `months` VALUES (1,'January','Jan','2018-08-28 13:55:00','2018-08-28 13:55:00'),(2,'February','Feb','2018-08-28 13:55:00','2018-08-28 13:55:00'),(3,'March','Mar','2018-08-28 13:55:00','2018-08-28 13:55:00'),(4,'April','Apr','2018-08-28 13:55:00','2018-08-28 13:55:00'),(5,'May','May','2018-08-28 13:55:00','2018-08-28 13:55:00'),(6,'June','Jun','2018-08-28 13:55:00','2018-08-28 13:55:00'),(7,'July','Jul','2018-08-28 13:55:00','2018-08-28 13:55:00'),(8,'August','Aug','2018-08-28 13:55:00','2018-08-28 13:55:00'),(9,'September','Sep','2018-08-28 13:55:00','2018-08-28 13:55:00'),(10,'October','Oct','2018-08-28 13:55:00','2018-08-28 13:55:00'),(11,'November','Nov','2018-08-28 13:55:00','2018-08-28 13:55:00'),(12,'December','Dec','2018-08-28 13:55:00','2018-08-28 13:55:00');
/*!40000 ALTER TABLE `months` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notes` (
  `note_id` int unsigned NOT NULL AUTO_INCREMENT,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`note_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notes`
--

LOCK TABLES `notes` WRITE;
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
/*!40000 ALTER TABLE `notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notices`
--

DROP TABLE IF EXISTS `notices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notices` (
  `notice_id` int unsigned NOT NULL AUTO_INCREMENT,
  `postedby_id` int unsigned NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `filename` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addressed_to` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uuid` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`notice_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notices`
--

LOCK TABLES `notices` WRITE;
/*!40000 ALTER TABLE `notices` DISABLE KEYS */;
/*!40000 ALTER TABLE `notices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `panels`
--

DROP TABLE IF EXISTS `panels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `panels` (
  `committee_id` int unsigned NOT NULL,
  `employee_id` int unsigned NOT NULL,
  `role_id` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`committee_id`,`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `panels`
--

LOCK TABLES `panels` WRITE;
/*!40000 ALTER TABLE `panels` DISABLE KEYS */;
/*!40000 ALTER TABLE `panels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paths`
--

DROP TABLE IF EXISTS `paths`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paths` (
  `path_id` int unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int unsigned NOT NULL,
  `controller` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `posted_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`path_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paths`
--

LOCK TABLES `paths` WRITE;
/*!40000 ALTER TABLE `paths` DISABLE KEYS */;
INSERT INTO `paths` VALUES (2,10,'Leaves','{ \"Employee\":  {\"step_id\":\"1\",\"id\":\"0\",\"notes\":\"no\",\"status\":\"incomplete\"},\n\"Supervisor\":{\"step_id\":\"2\",\"id\":\"0\",\"notes\":\"no\",\"status\":\"incomplete\"},\n  \"Admin\":     {\"step_id\":\"3\",\"id\":\"1\",\"notes\":\"yes\",\"status\":\"incomplete\"},\n  \"Director\":  {\"step_id\":\"4\",\"id\":\"6\",\"notes\":\"yes\",\"status\":\"incomplete\"}}','admin','2019-04-27 20:50:09','2019-05-01 08:20:16'),(8,10,'Tours','{ \"Employee\":  {\"step_id\":\"1\",\"id\":\"0\",\"notes\":\"no\",\"status\":\"incomplete\"},\n\"Supervisor\":{\"step_id\":\"2\",\"id\":\"0\",\"notes\":\"no\",\"status\":\"incomplete\"},\n  \"Admin\":     {\"step_id\":\"3\",\"id\":\"1\",\"notes\":\"yes\",\"status\":\"incomplete\"},\n  \"Director\":  {\"step_id\":\"4\",\"id\":\"6\",\"notes\":\"yes\",\"status\":\"incomplete\"}}','admin','2019-04-27 20:50:09','2019-05-01 08:20:40'),(10,10,'Events','{ \"Employee\":  {\"step_id\":\"1\",\"id\":\"0\",\"notes\":\"no\",\"status\":\"incomplete\"},\n\"Supervisor\":{\"step_id\":\"2\",\"id\":\"0\",\"notes\":\"no\",\"status\":\"incomplete\"},\n  \"Admin\":     {\"step_id\":\"3\",\"id\":\"1\",\"notes\":\"yes\",\"status\":\"incomplete\"},\n  \"Director\":  {\"step_id\":\"4\",\"id\":\"6\",\"notes\":\"yes\",\"status\":\"incomplete\"}}','admin','2019-04-27 20:50:09','2019-05-01 08:20:40'),(17,10,'IOC_General','{\"Employee\":{\"step_id\":\"1\",\"id\":\"0\",\"notes\":\"no\",\"status\":\"incomplete\"},\"Supervisor\":{\"step_id\":\"2\",\"id\":\"0\",\"notes\":\"no\",\"status\":\"incomplete\"},\"Admin\":{\"step_id\":\"3\",\"id\":\"1\",\"notes\":\"no\",\"status\":\"incomplete\"},\"Director\":{\"step_id\":\"4\",\"id\":\"6\",\"notes\":\"no\",\"status\":\"incomplete\"}}','mumbai','2019-05-25 14:34:06','2019-05-25 14:34:06'),(18,10,'IOC_Medical','{\"Employee\":{\"step_id\":\"1\",\"id\":\"0\",\"notes\":\"no\",\"status\":\"incomplete\"},\"Supervisor\":{\"step_id\":\"2\",\"id\":\"0\",\"notes\":\"no\",\"status\":\"incomplete\"},\"Accounts\":{\"step_id\":\"3\",\"id\":\"34\",\"notes\":\"no\",\"status\":\"incomplete\"},\"Admin\":{\"step_id\":\"4\",\"id\":\"1\",\"notes\":\"no\",\"status\":\"incomplete\"},\"Director\":{\"step_id\":\"5\",\"id\":\"6\",\"notes\":\"no\",\"status\":\"incomplete\"}}','mumbai','2019-05-25 14:35:58','2019-05-25 14:35:58'),(19,10,'IOC_Tour','{\"Employee\":{\"step_id\":\"1\",\"id\":\"0\",\"notes\":\"no\",\"status\":\"incomplete\"},\"Supervisor\":{\"step_id\":\"2\",\"id\":\"0\",\"notes\":\"no\",\"status\":\"incomplete\"},\"Accounts\":{\"step_id\":\"3\",\"id\":\"34\",\"notes\":\"no\",\"status\":\"incomplete\"},\"Admin\":{\"step_id\":\"4\",\"id\":\"1\",\"notes\":\"no\",\"status\":\"incomplete\"},\"Director\":{\"step_id\":\"5\",\"id\":\"6\",\"notes\":\"no\",\"status\":\"incomplete\"}}','mumbai','2019-05-25 14:36:50','2019-05-25 14:36:50');
/*!40000 ALTER TABLE `paths` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paymatrix`
--

DROP TABLE IF EXISTS `paymatrix`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paymatrix` (
  `paymatrix_id` int unsigned NOT NULL AUTO_INCREMENT,
  `level_id` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `basic` int unsigned NOT NULL,
  PRIMARY KEY (`paymatrix_id`)
) ENGINE=InnoDB AUTO_INCREMENT=538 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paymatrix`
--

LOCK TABLES `paymatrix` WRITE;
/*!40000 ALTER TABLE `paymatrix` DISABLE KEYS */;
/*!40000 ALTER TABLE `paymatrix` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payrates`
--

DROP TABLE IF EXISTS `payrates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payrates` (
  `payrate_id` int unsigned NOT NULL AUTO_INCREMENT,
  `item` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` int unsigned NOT NULL,
  `effective_date` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`payrate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payrates`
--

LOCK TABLES `payrates` WRITE;
/*!40000 ALTER TABLE `payrates` DISABLE KEYS */;
/*!40000 ALTER TABLE `payrates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payrolls`
--

DROP TABLE IF EXISTS `payrolls`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payrolls` (
  `payroll_id` int unsigned NOT NULL AUTO_INCREMENT,
  `fin_year` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `earn_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'salary',
  `employee_id` int unsigned NOT NULL,
  `basic` int unsigned DEFAULT '0',
  `da_rate` int unsigned DEFAULT '0',
  `da` int unsigned DEFAULT '0',
  `hra_rate` int unsigned DEFAULT '0',
  `hra` int unsigned DEFAULT '0',
  `ta` int unsigned DEFAULT '0',
  `oa1_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oa1` int unsigned DEFAULT '0',
  `oa2_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oa2` int unsigned DEFAULT '0',
  `oa3_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oa3` int unsigned DEFAULT '0',
  `oa4_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oa4` int unsigned DEFAULT '0',
  `oa5_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oa5` int unsigned DEFAULT '0',
  `oa6_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oa6` int unsigned DEFAULT '0',
  `oa7_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oa7` int unsigned DEFAULT '0',
  `oa8_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oa8` int unsigned DEFAULT '0',
  `oa9_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oa9` int unsigned DEFAULT '0',
  `oa10_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oa10` int unsigned DEFAULT '0',
  `total_income` int unsigned DEFAULT '0',
  `itax` int unsigned DEFAULT '0',
  `tds` int unsigned DEFAULT '0',
  `gsli` int unsigned DEFAULT '0',
  `pf` int unsigned DEFAULT '0',
  `prof_tax` int unsigned DEFAULT '0',
  `welfare` int unsigned DEFAULT '0',
  `home_loan` int unsigned DEFAULT NULL,
  `two_wheeler_loan` int unsigned DEFAULT NULL,
  `car_loan` int unsigned DEFAULT NULL,
  `computer_loan` int unsigned DEFAULT NULL,
  `advpay_transfer` int unsigned DEFAULT NULL,
  `ta_adv_ttr` int unsigned DEFAULT NULL,
  `ta_adv_sdfm` int unsigned DEFAULT NULL,
  `ltc_advance` int unsigned DEFAULT NULL,
  `od1_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `od1` int unsigned DEFAULT '0',
  `od2_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `od2` int unsigned DEFAULT '0',
  `od3_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `od3` int unsigned DEFAULT '0',
  `od4_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `od4` int unsigned DEFAULT '0',
  `od5_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `od5` int unsigned DEFAULT '0',
  `total_deductions` int DEFAULT '0',
  `comments` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `prepared_id` int unsigned DEFAULT NULL,
  `date_prepared` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `verified_id` int unsigned DEFAULT NULL,
  `date_verified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `approved_id` int unsigned DEFAULT NULL,
  `date_approved` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payroll_status` tinyint unsigned DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`payroll_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payrolls`
--

LOCK TABLES `payrolls` WRITE;
/*!40000 ALTER TABLE `payrolls` DISABLE KEYS */;
/*!40000 ALTER TABLE `payrolls` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'perms_global','web','2019-03-13 14:08:51','2019-03-13 14:08:51'),(2,'perms_director','web','2019-04-18 03:08:02','2019-04-28 09:51:43'),(3,'perms_special','web','2019-04-18 03:08:02','2019-04-28 09:51:43'),(4,'user_create','web','2019-03-09 13:59:42','2019-03-09 13:59:42'),(5,'user_edit','web','2019-03-09 13:59:42','2019-03-09 13:59:42'),(6,'user_delete','web','2019-03-09 13:59:42','2019-03-09 13:59:42'),(7,'leave_apply','web','2019-04-22 02:55:46','2019-04-22 02:55:46'),(8,'leave_edit','web','2019-04-22 02:55:58','2019-04-22 02:55:58'),(9,'leave_delete','web','2019-04-22 02:56:32','2019-04-22 02:56:32'),(10,'leave_update','web','2019-04-22 02:56:12','2019-04-22 02:56:12'),(11,'leave_decision','web','2019-04-20 20:58:47','2019-04-20 20:58:47'),(12,'leave_approval','web','2019-04-28 09:58:40','2019-04-28 09:58:40'),(13,'tour_apply','web','2019-04-22 03:04:46','2019-04-22 03:04:46'),(14,'tour_edit','web','2019-04-22 03:05:03','2019-04-22 03:05:03'),(15,'tour_delete','web','2019-04-22 03:05:35','2019-04-22 03:05:35'),(16,'tour_update','web','2019-04-22 03:05:19','2019-04-22 03:05:19'),(17,'tour_decision','web','2019-04-22 03:05:52','2019-04-22 03:05:52'),(18,'tour_approval','web','2019-04-28 09:58:51','2019-04-28 09:58:51'),(19,'ioc_apply','web','2019-04-22 03:06:11','2019-04-22 03:06:11'),(20,'ioc_edit','web','2019-04-22 03:06:25','2019-04-22 03:06:25'),(21,'ioc_update','web','2019-04-22 03:06:35','2019-04-22 03:06:35'),(22,'ioc_delete','web','2019-04-22 03:06:49','2019-04-22 03:06:49'),(23,'ioc_comment','web','2019-04-22 03:07:00','2019-04-22 03:07:00'),(24,'ioc_decision','web','2019-04-22 03:07:12','2019-04-22 03:07:12'),(25,'ioc_approval','web','2019-04-28 09:59:03','2019-04-28 09:59:03'),(26,'add_notes','web','2019-04-28 09:58:18','2019-04-28 09:58:18'),(27,'add_comment','web','2019-04-28 20:16:54','2019-04-28 20:16:54'),(28,'finance','web','2019-04-29 07:50:52','2019-04-29 07:50:52'),(29,'tech_dept','web','2019-04-29 07:51:09','2019-04-29 07:51:09'),(30,'store_purch','web','2019-04-29 07:51:21','2019-04-29 07:51:21'),(31,'meeting_call','web','2019-05-06 01:06:41','2019-05-06 01:06:41'),(32,'meeting_view','web','2019-05-06 01:03:38','2019-05-06 01:03:38'),(33,'meeting_comment','web','2019-05-06 01:03:50','2019-05-06 01:03:50'),(34,'meeting_close','web','2019-05-06 01:04:07','2019-05-06 01:04:07'),(35,'meeting_finalize_mom','web','2019-05-06 01:04:31','2019-05-06 01:04:31'),(36,'user_list','web','2024-01-09 09:08:32','2024-01-09 09:08:32');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `status` smallint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` mediumblob,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projectgoals`
--

DROP TABLE IF EXISTS `projectgoals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `projectgoals` (
  `projectgoal_id` int unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int unsigned NOT NULL,
  `goal` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `goal_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `goal_budget` float(11,2) DEFAULT '0.00',
  `est_time` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'none',
  `ref_files` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'none',
  `misc_info` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `comments` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` int unsigned DEFAULT '1',
  `folder` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'none',
  `year` int DEFAULT NULL,
  `uuid` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`projectgoal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projectgoals`
--

LOCK TABLES `projectgoals` WRITE;
/*!40000 ALTER TABLE `projectgoals` DISABLE KEYS */;
/*!40000 ALTER TABLE `projectgoals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projectinflows`
--

DROP TABLE IF EXISTS `projectinflows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `projectinflows` (
  `inflow_id` int unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int unsigned DEFAULT NULL,
  `date_received` date NOT NULL,
  `online_reference` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `online_sender` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` float(11,2) NOT NULL,
  `order_file` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `folder` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fundhead_id` int unsigned DEFAULT NULL,
  `head_sp_comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `comments` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) DEFAULT '0',
  `uuid` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`inflow_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projectinflows`
--

LOCK TABLES `projectinflows` WRITE;
/*!40000 ALTER TABLE `projectinflows` DISABLE KEYS */;
/*!40000 ALTER TABLE `projectinflows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `projects` (
  `project_id` int unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int unsigned NOT NULL,
  `office_reference` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_submitted` date NOT NULL,
  `project_file` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agency` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `sanct_ref` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sanct_date` date DEFAULT NULL,
  `sanct_file` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'none',
  `sanct_checked_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'none',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `duration` int unsigned DEFAULT NULL,
  `total_budget` float(11,2) DEFAULT '0.00',
  `ext_reference` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'none',
  `ext_from` date DEFAULT NULL,
  `ext_end` date DEFAULT NULL,
  `ext_file` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'none',
  `ext_amount` float(11,2) DEFAULT '0.00',
  `misc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `comments` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` int unsigned DEFAULT '1',
  `progress` int unsigned DEFAULT '0',
  `progress_date` date DEFAULT NULL,
  `folder` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'none',
  `year` int DEFAULT NULL,
  `uuid` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (1,1,'Abcd/23/11Jan2024','2024-01-11',NULL,'Abcd Inc.','Construction of New 50 Lit Bio-reactor Facility','Desc, it is needed to meet the demand',NULL,NULL,'none','none','2024-02-01','2024-08-11',NULL,120000000.00,'none',NULL,NULL,'none',0.00,NULL,'Payments as per milestones recorded',1,0,'2024-01-22','none',NULL,NULL,'2024-01-11 08:47:45','2024-01-11 14:28:18');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projtasks`
--

DROP TABLE IF EXISTS `projtasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `projtasks` (
  `projtask_id` int unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int unsigned NOT NULL,
  `uuid` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activity` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `img_files` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `doc_files` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `date_posted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `percent_progress` int unsigned DEFAULT '0',
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`projtask_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projtasks`
--

LOCK TABLES `projtasks` WRITE;
/*!40000 ALTER TABLE `projtasks` DISABLE KEYS */;
/*!40000 ALTER TABLE `projtasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchases`
--

DROP TABLE IF EXISTS `purchases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `purchases` (
  `item_id` int unsigned NOT NULL AUTO_INCREMENT,
  `enquirytype_id` int unsigned NOT NULL,
  `employee_id` int unsigned NOT NULL,
  `budget_id` int unsigned NOT NULL,
  `fundhead_id` int unsigned NOT NULL,
  `IOC_id` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `supplier_id` int unsigned NOT NULL,
  `catalog_id` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_id` int unsigned NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku_id` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku_pack_size` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku_ps_price` float(10,2) NOT NULL,
  `quantity_sku_desired` int unsigned NOT NULL,
  `quantity_sku_units` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float(10,2) NOT NULL,
  `quoted_sku_id` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `quoted_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `quoted_units` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `quoted_unit_price` float(10,2) DEFAULT '0.00',
  `quote_comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `quote_date` date DEFAULT NULL,
  `quoted_by` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approval` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `approval_date` date DEFAULT NULL,
  `inv_sku_id` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `inv_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `inv_units` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `inv_unit_price` float(10,2) DEFAULT '0.00',
  `inv_comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchases`
--

LOCK TABLES `purchases` WRITE;
/*!40000 ALTER TABLE `purchases` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `receipts`
--

DROP TABLE IF EXISTS `receipts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `receipts` (
  `receipt_id` int unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int unsigned NOT NULL,
  `uuid` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'nd',
  `date` date DEFAULT NULL,
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `inst_number` int unsigned DEFAULT '0',
  `inst_amount` float(9,2) NOT NULL DEFAULT '0.00',
  `total_paid` float(9,2) NOT NULL DEFAULT '0.00',
  `status` tinyint unsigned DEFAULT '0',
  `posted_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edited_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`receipt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receipts`
--

LOCK TABLES `receipts` WRITE;
/*!40000 ALTER TABLE `receipts` DISABLE KEYS */;
/*!40000 ALTER TABLE `receipts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `remittances`
--

DROP TABLE IF EXISTS `remittances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `remittances` (
  `remittance_id` int unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_id` int unsigned NOT NULL,
  `code` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `amount` float(9,2) NOT NULL DEFAULT '0.00',
  `principal` float(9,2) NOT NULL DEFAULT '0.00',
  `interest` float(9,2) NOT NULL DEFAULT '0.00',
  `installments` int unsigned DEFAULT '0',
  `inst_amount` float(9,2) NOT NULL DEFAULT '0.00',
  `last_amount` float(9,2) NOT NULL DEFAULT '0.00',
  `status` tinyint unsigned DEFAULT '0',
  `posted_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edited_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`remittance_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `remittances`
--

LOCK TABLES `remittances` WRITE;
/*!40000 ALTER TABLE `remittances` DISABLE KEYS */;
/*!40000 ALTER TABLE `remittances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reports` (
  `report_id` int unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int unsigned DEFAULT NULL,
  `report_type` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `report_title` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `submission_date` date DEFAULT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `filename` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `sup_decision` tinyint(1) DEFAULT '1',
  `sup_decision_date` date DEFAULT NULL,
  `ah_decision` tinyint(1) DEFAULT '1',
  `ah_decision_date` date DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT 'none',
  `posted_by` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT 'none',
  `edited_by` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT 'none',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`report_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reports`
--

LOCK TABLES `reports` WRITE;
/*!40000 ALTER TABLE `reports` DISABLE KEYS */;
/*!40000 ALTER TABLE `reports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,1),(3,1),(11,3),(17,3),(23,3),(32,3),(33,3),(1,9),(2,9),(3,9),(7,10),(8,10),(9,10),(10,10),(13,10),(14,10),(15,10),(16,10),(19,10),(20,10),(21,10),(22,10),(23,10),(32,10),(33,10);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','web','2019-03-09 13:59:42','2019-03-09 13:59:42'),(3,'supervisor','web','2019-03-19 16:06:25','2019-03-19 16:06:25'),(9,'director','web','2019-04-18 03:09:24','2019-04-18 03:09:24'),(10,'employee','web','2019-04-22 04:21:26','2019-04-22 04:21:26'),(11,'finance','web','2019-04-29 07:51:54','2019-04-29 07:51:54'),(12,'sto_pur','web','2019-04-29 07:53:07','2019-04-29 07:53:07'),(13,'technical','web','2019-04-29 07:53:38','2019-04-29 07:53:38');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salaries`
--

DROP TABLE IF EXISTS `salaries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `salaries` (
  `salary_id` int NOT NULL AUTO_INCREMENT,
  `fin_year` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `earn_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'salary',
  `employee_id` int NOT NULL,
  `basic` int DEFAULT '0',
  `da_rate` int DEFAULT '0',
  `da` int DEFAULT '0',
  `hra_rate` int DEFAULT '0',
  `hra` int DEFAULT '0',
  `ta` int DEFAULT '0',
  `oa1_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oa1` int DEFAULT '0',
  `oa2_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oa2` int DEFAULT '0',
  `oa3_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oa3` int DEFAULT '0',
  `oa4_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oa4` int DEFAULT '0',
  `oa5_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oa5` int DEFAULT '0',
  `oa6_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oa6` int DEFAULT '0',
  `oa7_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oa7` int DEFAULT '0',
  `oa8_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oa8` int DEFAULT '0',
  `oa9_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oa9` int DEFAULT '0',
  `oa10_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oa10` int DEFAULT '0',
  `total_income` int DEFAULT '0',
  `itax` int DEFAULT '0',
  `tds` int DEFAULT '0',
  `gsli` int DEFAULT '0',
  `pf` int DEFAULT '0',
  `prof_tax` int DEFAULT '0',
  `welfare` int DEFAULT '0',
  `home_loan` int unsigned DEFAULT NULL,
  `two_wheeler_loan` int unsigned DEFAULT NULL,
  `car_loan` int unsigned DEFAULT NULL,
  `computer_loan` int unsigned DEFAULT NULL,
  `advpay_transfer` int unsigned DEFAULT NULL,
  `ta_adv_ttr` int unsigned DEFAULT NULL,
  `ta_adv_sdfm` int unsigned DEFAULT NULL,
  `ltc_advance` int unsigned DEFAULT NULL,
  `od1_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `od1` int DEFAULT '0',
  `od2_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `od2` int DEFAULT '0',
  `od3_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `od3` int DEFAULT '0',
  `od4_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `od4` int DEFAULT '0',
  `od5_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `od5` int DEFAULT '0',
  `total_deductions` int DEFAULT '0',
  `prepared_id` int DEFAULT NULL,
  `date_prepared` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `verified_id` int DEFAULT NULL,
  `date_verified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `approved_id` int DEFAULT NULL,
  `date_approved` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`salary_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salaries`
--

LOCK TABLES `salaries` WRITE;
/*!40000 ALTER TABLE `salaries` DISABLE KEYS */;
/*!40000 ALTER TABLE `salaries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('LPbFfqNO6ECz60RZIZbmdBUEyIWDeDxXv6jINK7I',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36 Edg/120.0.0.0','YTo2OntzOjY6Il90b2tlbiI7czo0MDoiQnVUTDRHbHZBNlVZTTNxaWpkSXVhTEdrTGFlSGdOc3pTNTcyajcyZyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMwOiJodHRwOi8vMTI3LjAuMC4xOjgwMTAvcHJvamVjdHMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTcwNDkyNTMxNTt9fQ==',1704966388);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `states` (
  `state_id` int unsigned NOT NULL AUTO_INCREMENT,
  `state` varchar(35) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `states`
--

LOCK TABLES `states` WRITE;
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
INSERT INTO `states` VALUES (1,'A and N Islands','2018-08-28 09:04:30','2018-08-28 09:04:30'),(2,'Andhra Pradesh','2018-08-28 09:04:30','2018-08-28 09:04:30'),(3,'Arunachal Pradesh','2018-08-28 09:04:30','2018-08-28 09:04:30'),(4,'Assam','2018-08-28 09:04:30','2018-08-28 09:04:30'),(5,'Bihar','2018-08-28 09:04:30','2018-08-28 09:04:30'),(6,'Chandigarh','2018-08-28 09:04:30','2018-08-28 09:04:30'),(7,'Chhattisgarh','2018-08-28 09:04:30','2018-08-28 09:04:30'),(8,'Dadar and Nagar Haveli','2018-08-28 09:04:30','2018-08-28 09:04:30'),(9,'Daman and Diu','2018-08-28 09:04:30','2018-08-28 09:04:30'),(10,'Delhi','2018-08-28 09:04:30','2018-08-28 09:04:30'),(11,'Goa','2018-08-28 09:04:30','2018-08-28 09:04:30'),(12,'Gujarat','2018-08-28 09:04:30','2018-08-28 09:04:30'),(13,'Haryana','2018-08-28 09:04:30','2018-08-28 09:04:30'),(14,'Himachal Pradesh','2018-08-28 09:04:30','2018-08-28 09:04:30'),(15,'Jammu and Kashmir','2018-08-28 09:04:30','2018-08-28 09:04:30'),(16,'Jharkhand','2018-08-28 09:04:30','2018-08-28 09:04:30'),(17,'Karnataka','2018-08-28 09:04:30','2018-08-28 09:04:30'),(18,'Kerala','2018-08-28 09:04:30','2018-08-28 09:04:30'),(19,'Lakshadeep','2018-08-28 09:04:30','2018-08-28 09:04:30'),(20,'Madhya Pradesh','2018-08-28 09:04:30','2018-08-28 09:04:30'),(21,'Maharashtra','2018-08-28 09:04:30','2018-08-28 09:04:30'),(22,'Manipur','2018-08-28 09:04:30','2018-08-28 09:04:30'),(23,'Meghalaya','2018-08-28 09:04:30','2018-08-28 09:04:30'),(24,'Mizoram','2018-08-28 09:04:30','2018-08-28 09:04:30'),(25,'Nagaland','2018-08-28 09:04:30','2018-08-28 09:04:30'),(26,'Orissa','2018-08-28 09:04:30','2018-08-28 09:04:30'),(27,'Pondicherry','2018-08-28 09:04:30','2018-08-28 09:04:30'),(28,'Punjab','2018-08-28 09:04:30','2018-08-28 09:04:30'),(29,'Rajasthan','2018-08-28 09:04:30','2018-08-28 09:04:30'),(30,'Sikkim','2018-08-28 09:04:30','2018-08-28 09:04:30'),(31,'Tamil Nadu','2018-08-28 09:04:30','2018-08-28 09:04:30'),(32,'Telangana','2018-08-28 09:04:30','2019-03-25 15:50:37'),(33,'Tripura','2018-08-28 09:04:30','2018-08-28 09:04:30'),(34,'Uttaranchal','2018-08-28 09:04:30','2018-08-28 09:04:30'),(35,'Uttar Pradesh','2018-08-28 09:04:30','2018-08-28 09:04:30'),(36,'West Bengal','2018-08-28 09:04:30','2018-08-28 09:04:30'),(99,'None','2019-03-25 15:51:28','2019-03-25 15:51:28');
/*!40000 ALTER TABLE `states` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statuscodes`
--

DROP TABLE IF EXISTS `statuscodes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `statuscodes` (
  `statuscode_id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`statuscode_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statuscodes`
--

LOCK TABLES `statuscodes` WRITE;
/*!40000 ALTER TABLE `statuscodes` DISABLE KEYS */;
INSERT INTO `statuscodes` VALUES (1,'none','2019-03-30 16:56:06','2019-03-30 16:56:06'),(2,'pending','2019-03-30 16:56:06','2019-03-30 16:56:06'),(3,'returned','2019-03-30 16:56:06','2019-03-30 16:56:06'),(4,'rejected','2019-03-30 16:56:06','2019-03-30 16:56:06'),(5,'approved','2019-03-30 16:56:06','2019-03-30 16:56:06'),(6,'notify','2019-04-22 15:09:00','2019-04-22 15:09:00'),(7,'sealed','2019-04-22 15:09:00','2019-04-22 15:09:00');
/*!40000 ALTER TABLE `statuscodes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team_invitations`
--

DROP TABLE IF EXISTS `team_invitations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `team_invitations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `team_id` bigint unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`),
  CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_invitations`
--

LOCK TABLES `team_invitations` WRITE;
/*!40000 ALTER TABLE `team_invitations` DISABLE KEYS */;
/*!40000 ALTER TABLE `team_invitations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team_user`
--

DROP TABLE IF EXISTS `team_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `team_user` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `team_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_user`
--

LOCK TABLES `team_user` WRITE;
/*!40000 ALTER TABLE `team_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `team_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teams` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teams_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` VALUES (1,1,'officeadmins',1,'2023-12-30 11:59:43','2023-12-30 13:59:43');
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tours`
--

DROP TABLE IF EXISTS `tours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tours` (
  `tour_id` int unsigned NOT NULL AUTO_INCREMENT,
  `budget_head` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT 'none',
  `employee_id` int unsigned NOT NULL,
  `designation` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `basic_pay` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT 'none',
  `tour_purpose` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT 'none',
  `journey_mode` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT 'none',
  `journey_class` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT 'none',
  `dep_station` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT 'none',
  `dep_station_date` date DEFAULT NULL,
  `dep_station_time` time DEFAULT NULL,
  `destination` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT 'none',
  `dest_arr_date` date DEFAULT NULL,
  `dest_arr_time` time DEFAULT NULL,
  `rj_station` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT 'none',
  `rj_station_date` date DEFAULT NULL,
  `rj_station_time` time DEFAULT NULL,
  `rj_origin` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT 'none',
  `rj_origin_arr_date` date DEFAULT NULL,
  `rj_origin_arr_time` time DEFAULT NULL,
  `tada_advance` tinyint(1) DEFAULT '1',
  `comments` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint unsigned DEFAULT '1',
  `tour_status` tinyint(1) DEFAULT '1',
  `filename` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'none',
  `uuid` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `communication_uuid` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'none',
  `date_submitted` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`tour_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tours`
--

LOCK TABLES `tours` WRITE;
/*!40000 ALTER TABLE `tours` DISABLE KEYS */;
INSERT INTO `tours` VALUES (3,'Abcd-1234',1,'Chief Admin Officer','170100','To conduct experiments at xyz place','2','AC-First','Mumbai','2024-02-02','06:00:00','Hyderabad','2024-02-03','08:30:00','Hyderabad','2024-02-08','17:25:00','Mumbai','2024-02-09','11:35:00',0,'admin smoffice: 2024-01-08: Submitted;;; Uuid:88219180-ade3-11ee-bea0-73d0a9fbd3ed','admin smoffice: 2024-01-08: None',1,1,'none','88219180-ade3-11ee-bea0-73d0a9fbd3ed','none','2024-01-08','2024-01-08 05:05:24','2024-01-08 05:05:24');
/*!40000 ALTER TABLE `tours` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin smoffice','smofficeadmin@gmail.com',NULL,'$2y$10$2oBQrPVUPMR7Wf6mX55JMO9XiFF8pb2o2gDDQupI5wYGfrw/y8kxW',NULL,NULL,NULL,'qfQjVjTFwgpUfZa9HEYFuJPDKmLwCE7PA0kro31guE31XgFdFS0swSocJd6K',1,NULL,'2019-03-09 13:59:43','2019-04-22 05:38:23'),(2,'Director Director','director@demo.com',NULL,'$2y$10$64LnF3WO/A6srfE/V978WuciWOlMtk4w3btQq84SqCA/CMH45dXr2',NULL,NULL,NULL,'fKGNCzthiZZp3FoRQTXLIN71bxwAgkXRq9IrO3Hswd0yC6yOHbuErwG1I3li',0,NULL,'2019-04-18 03:10:13','2024-01-04 20:17:46'),(3,'User01 User01','user01@demo.com',NULL,'$2y$10$I/EIcA4NrmARkNso34fyWu7XdzqE3xNmI9ABhHvcqCsE8vfnINncW',NULL,NULL,NULL,NULL,0,NULL,'2019-04-18 20:46:58','2024-01-07 08:00:22'),(4,'User02 User02','user02@demo.com',NULL,'$2y$10$jUCRy6PhUsTzH.c8THW4vu12HsHn4ZNXq3ln118u3j16nSmJJkAjG',NULL,NULL,NULL,NULL,0,NULL,'2019-04-18 20:47:42','2024-01-07 08:00:51'),(5,'User03 User03','user03@demo.com',NULL,'$2y$10$ggnQZ4YXxQ1EGSGoody2.eZ2EJDdar.yIgm.401mSz9hcH2YBs9fC',NULL,NULL,NULL,NULL,0,NULL,'2019-04-18 20:48:16','2024-01-07 08:04:41'),(6,'User04 User04','user04@demo.com',NULL,'$2y$10$71YaVg92e8F2o93hNw4PTOgsHvCtmmSIja4fS6UEhOj11uxb0D/sG',NULL,NULL,NULL,NULL,0,NULL,'2019-04-18 20:49:07','2024-01-07 08:06:00'),(7,'User05 User05','user05@demo.com',NULL,'$2y$10$TkXb1oDC/K4VmSyach774etONGKf3nzipuSbmQGhL6lqHMP5LZEhK',NULL,NULL,NULL,NULL,0,NULL,'2019-04-18 20:49:43','2024-01-07 08:06:27'),(8,'User06 User06','user06@demo.com',NULL,'$2y$10$nWcMzfag3nJhqX2VfiAJPePdGp1FBWNAVGjTJ6.RzHqNNVWFDiYV6',NULL,NULL,NULL,NULL,0,NULL,'2019-04-18 21:37:32','2024-01-07 08:07:09'),(9,'User07 User07','user07@demo.com',NULL,'$2y$10$oojeVq3yMTd5EnMkRjtCbOUpKozpISqD5OI6wMROuefNCWUKyN4fy',NULL,NULL,NULL,NULL,0,NULL,'2019-04-18 21:38:01','2024-01-07 08:07:45'),(10,'User08 User08','user08@demo.com',NULL,'$2y$10$l1fVtVFHDBd3LPF1jZt7JuWTi7bgf3qxi6X/VdilVRul5oCCKIqSe',NULL,NULL,NULL,NULL,0,NULL,'2019-04-18 21:38:31','2024-01-07 08:09:59'),(11,'user09 user09','user09@demo.com',NULL,'$2y$10$2oBQrPVUPMR7Wf6mX55JMO9XiFF8pb2o2gDDQupI5wYGfrw/y8kxW',NULL,NULL,NULL,NULL,0,NULL,'2019-04-18 21:39:08','2019-04-18 21:58:14'),(12,'user10 user10','user10@demo.com',NULL,'$2y$10$2oBQrPVUPMR7Wf6mX55JMO9XiFF8pb2o2gDDQupI5wYGfrw/y8kxW',NULL,NULL,NULL,NULL,0,NULL,'2019-04-18 21:39:08','2019-04-18 21:58:14'),(13,'user11 user11','user11@demo.com',NULL,'$2y$10$2oBQrPVUPMR7Wf6mX55JMO9XiFF8pb2o2gDDQupI5wYGfrw/y8kxW',NULL,NULL,NULL,NULL,0,NULL,'2019-04-18 20:46:58','2019-04-18 21:55:12'),(14,'user12 user12','user12@demo.com',NULL,'$2y$10$2oBQrPVUPMR7Wf6mX55JMO9XiFF8pb2o2gDDQupI5wYGfrw/y8kxW',NULL,NULL,NULL,NULL,0,NULL,'2019-04-18 20:47:42','2019-04-18 21:55:36'),(15,'user13 user13','user13@demo.com',NULL,'$2y$10$2oBQrPVUPMR7Wf6mX55JMO9XiFF8pb2o2gDDQupI5wYGfrw/y8kxW',NULL,NULL,NULL,NULL,0,NULL,'2019-04-18 20:48:16','2019-04-18 21:55:59'),(16,'user14 user14','user14@demo.com',NULL,'$2y$10$2oBQrPVUPMR7Wf6mX55JMO9XiFF8pb2o2gDDQupI5wYGfrw/y8kxW',NULL,NULL,NULL,NULL,0,NULL,'2019-04-18 20:49:07','2019-04-22 05:40:15'),(17,'user15 user15','user15@demo.com',NULL,'$2y$10$2oBQrPVUPMR7Wf6mX55JMO9XiFF8pb2o2gDDQupI5wYGfrw/y8kxW',NULL,NULL,NULL,NULL,0,NULL,'2019-04-18 20:49:43','2019-04-18 21:56:27'),(18,'user16 user16','user16@demo.com',NULL,'$2y$10$2oBQrPVUPMR7Wf6mX55JMO9XiFF8pb2o2gDDQupI5wYGfrw/y8kxW',NULL,NULL,NULL,NULL,0,NULL,'2019-04-18 21:37:32','2019-04-18 21:56:47'),(19,'user17 user17','user17@demo.com',NULL,'$2y$10$2oBQrPVUPMR7Wf6mX55JMO9XiFF8pb2o2gDDQupI5wYGfrw/y8kxW',NULL,NULL,NULL,NULL,0,NULL,'2019-04-18 21:38:01','2019-04-18 21:57:10'),(20,'user18 user18','user18@demo.com',NULL,'$2y$10$2oBQrPVUPMR7Wf6mX55JMO9XiFF8pb2o2gDDQupI5wYGfrw/y8kxW',NULL,NULL,NULL,NULL,0,NULL,'2019-04-18 21:38:31','2019-04-18 21:57:51'),(21,'user19 user19','user19@demo.com',NULL,'$2y$10$2oBQrPVUPMR7Wf6mX55JMO9XiFF8pb2o2gDDQupI5wYGfrw/y8kxW',NULL,NULL,NULL,NULL,0,NULL,'2019-04-18 21:39:08','2019-04-18 21:58:14'),(22,'user20 user20','user20@demo.com',NULL,'$2y$10$2oBQrPVUPMR7Wf6mX55JMO9XiFF8pb2o2gDDQupI5wYGfrw/y8kxW',NULL,NULL,NULL,NULL,0,NULL,'2019-04-18 21:40:43','2019-04-22 05:40:34'),(23,'user21 user21','user21@demo.com',NULL,'$2y$10$2oBQrPVUPMR7Wf6mX55JMO9XiFF8pb2o2gDDQupI5wYGfrw/y8kxW',NULL,NULL,NULL,NULL,0,NULL,'2019-04-18 21:44:18','2019-04-18 21:59:06'),(24,'user22 user22','user22@demo.com',NULL,'$2y$10$2oBQrPVUPMR7Wf6mX55JMO9XiFF8pb2o2gDDQupI5wYGfrw/y8kxW',NULL,NULL,NULL,NULL,0,NULL,'2019-04-18 21:44:53','2019-04-18 21:59:42'),(25,'user23 user23','user23@demo.com',NULL,'$2y$10$2oBQrPVUPMR7Wf6mX55JMO9XiFF8pb2o2gDDQupI5wYGfrw/y8kxW',NULL,NULL,NULL,NULL,0,NULL,'2019-04-18 21:45:22','2019-04-18 22:00:16'),(26,'user24 user24','user24@demo.com',NULL,'$2y$10$2oBQrPVUPMR7Wf6mX55JMO9XiFF8pb2o2gDDQupI5wYGfrw/y8kxW',NULL,NULL,NULL,NULL,0,NULL,'2019-04-18 21:45:51','2019-04-18 22:00:37'),(27,'user25 user25','user25@demo.com',NULL,'$2y$10$2oBQrPVUPMR7Wf6mX55JMO9XiFF8pb2o2gDDQupI5wYGfrw/y8kxW',NULL,NULL,NULL,NULL,0,NULL,'2019-04-18 21:46:59','2019-04-22 05:40:53'),(28,'user26 user26','user26@demo.com',NULL,'$2y$10$2oBQrPVUPMR7Wf6mX55JMO9XiFF8pb2o2gDDQupI5wYGfrw/y8kxW',NULL,NULL,NULL,NULL,0,NULL,'2019-04-18 21:47:32','2019-04-22 05:41:08'),(29,'user27 user27','user27@demo.com',NULL,'$2y$10$2oBQrPVUPMR7Wf6mX55JMO9XiFF8pb2o2gDDQupI5wYGfrw/y8kxW',NULL,NULL,NULL,NULL,0,NULL,'2019-04-28 07:55:30','2019-04-28 07:55:30'),(30,'user28 user28','user28@demo.com',NULL,'$2y$10$2oBQrPVUPMR7Wf6mX55JMO9XiFF8pb2o2gDDQupI5wYGfrw/y8kxW',NULL,NULL,NULL,NULL,0,NULL,'2019-04-28 07:56:37','2019-04-28 07:56:37'),(31,'user29 user29','user29@demo.com',NULL,'$2y$10$2oBQrPVUPMR7Wf6mX55JMO9XiFF8pb2o2gDDQupI5wYGfrw/y8kxW.',NULL,NULL,NULL,NULL,0,NULL,'2019-04-28 07:57:21','2019-04-28 07:57:21'),(32,'user30 user30','user30@demo.com',NULL,'$2y$10$2oBQrPVUPMR7Wf6mX55JMO9XiFF8pb2o2gDDQupI5wYGfrw/y8kxW',NULL,NULL,NULL,NULL,0,NULL,'2019-04-28 07:58:09','2019-04-29 07:55:23'),(33,'user31 user31','user31@demo.com',NULL,'$2y$10$2oBQrPVUPMR7Wf6mX55JMO9XiFF8pb2o2gDDQupI5wYGfrw/y8kxW',NULL,NULL,NULL,NULL,0,NULL,'2019-04-28 07:58:54','2019-04-28 07:58:54'),(34,'user32 user32','user32@demo.com',NULL,'$2y$10$2oBQrPVUPMR7Wf6mX55JMO9XiFF8pb2o2gDDQupI5wYGfrw/y8kxW',NULL,NULL,NULL,NULL,0,NULL,'2019-04-28 08:00:06','2019-04-28 08:00:06'),(35,'user33 user33','user33@demo.com',NULL,'$2y$10$2oBQrPVUPMR7Wf6mX55JMO9XiFF8pb2o2gDDQupI5wYGfrw/y8kxW',NULL,NULL,NULL,NULL,0,NULL,'2019-04-28 08:01:39','2019-04-28 08:01:39'),(36,'user34 user34','user34@demo.com',NULL,'$2y$10$2oBQrPVUPMR7Wf6mX55JMO9XiFF8pb2o2gDDQupI5wYGfrw/y8kxW',NULL,NULL,NULL,NULL,0,NULL,'2019-04-28 08:02:19','2019-04-28 08:02:19'),(37,'user35 user35','user35@demo.com',NULL,'$2y$10$2oBQrPVUPMR7Wf6mX55JMO9XiFF8pb2o2gDDQupI5wYGfrw/y8kxW',NULL,NULL,NULL,NULL,0,NULL,'2019-04-28 08:04:16','2019-04-29 07:54:41'),(38,'Pune Pune','pune@demo.com',NULL,'$2y$10$ARJF8vYXbJy26c6U43nNXeXQ2aVM3tcQnUOUecRGFesOS6Q.3yXky',NULL,NULL,NULL,NULL,0,NULL,'2019-03-12 14:00:59','2024-01-04 19:45:12'),(39,'Delhi Delhi','delhi@demo.com',NULL,'$2y$10$sOJn4mNdDjrhE6kEDb6J9OV9h2ZRQcxQLy3zzFv.XBZ.wfG81PB1G',NULL,NULL,NULL,NULL,0,NULL,'2019-03-19 16:46:22','2024-01-07 08:03:12'),(40,'Chennai Chennai','chennai@demo.com',NULL,'$2y$10$rx/GyzBG1MMbN72gsWeK3eQ4IGR/e.hTUEL5EBpbgeh8UsCuJ0.IC',NULL,NULL,NULL,NULL,0,NULL,'2019-04-18 21:48:35','2024-01-04 20:20:55'),(41,'Bangalore Bangalore','bangalore@demo.com',NULL,'$2y$10$/ezq5rd42spnNZL0SdaVbe87FfCOj24lGDcljq9cQn.ad.d3M.31a',NULL,NULL,NULL,NULL,0,NULL,'2019-04-18 21:49:03','2024-01-07 08:02:30'),(42,'Hyderabad Hyderabad','hyderabad@demo.com',NULL,'$2y$10$zDrePJwbmC/DmDCl1HRBY.AqvSOWfTTn4rZg5J5BRvuik6DUYXWkG',NULL,NULL,NULL,NULL,0,NULL,'2019-04-18 21:49:40','2024-01-07 08:01:54');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wages`
--

DROP TABLE IF EXISTS `wages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wages` (
  `payroll_id` int unsigned NOT NULL AUTO_INCREMENT,
  `fin_year` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `earn_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'salary',
  `employee_id` int unsigned NOT NULL,
  `basic` int unsigned DEFAULT '0',
  `da_rate` int unsigned DEFAULT '0',
  `da` int unsigned DEFAULT '0',
  `hra_rate` int unsigned DEFAULT '0',
  `hra` int unsigned DEFAULT '0',
  `ta` int unsigned DEFAULT '0',
  `other_allowances` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `total_income` int unsigned DEFAULT '0',
  `itax` int unsigned DEFAULT '0',
  `tds` int unsigned DEFAULT '0',
  `gsli` int unsigned DEFAULT '0',
  `pf` int unsigned DEFAULT '0',
  `prof_tax` int unsigned DEFAULT '0',
  `welfare` int unsigned DEFAULT '0',
  `other_deductions` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `total_deductions` int DEFAULT '0',
  `comments` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `prepared_id` int unsigned DEFAULT NULL,
  `date_prepared` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `verified_id` int unsigned DEFAULT NULL,
  `date_verified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `approved_id` int unsigned DEFAULT NULL,
  `date_approved` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`payroll_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wages`
--

LOCK TABLES `wages` WRITE;
/*!40000 ALTER TABLE `wages` DISABLE KEYS */;
/*!40000 ALTER TABLE `wages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wishlists`
--

DROP TABLE IF EXISTS `wishlists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wishlists` (
  `wishlist_id` int unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int unsigned NOT NULL,
  `vendor_id` int unsigned NOT NULL,
  `currency_id` int unsigned NOT NULL,
  `sku_id` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku_pack_size` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku_ps_price` float(10,2) NOT NULL,
  `desqty_sku` int unsigned NOT NULL,
  `desqty_units` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `desqty_price` float(10,2) NOT NULL,
  `available_from` date DEFAULT NULL,
  `discontinued` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `alt_id` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `alt_ps` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `alt_price` float(10,2) DEFAULT '0.00',
  `alt_available_from` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`wishlist_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlists`
--

LOCK TABLES `wishlists` WRITE;
/*!40000 ALTER TABLE `wishlists` DISABLE KEYS */;
/*!40000 ALTER TABLE `wishlists` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-11 15:41:22
