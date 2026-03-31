/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19-12.0.2-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: finance
-- ------------------------------------------------------
-- Server version	12.0.2-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

--
-- Table structure for table `admin_notifications`
--

DROP TABLE IF EXISTS `admin_notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_notifications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT 0,
  `title` varchar(255) DEFAULT NULL,
  `is_read` tinyint(4) NOT NULL DEFAULT 0,
  `click_url` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_notifications`
--

LOCK TABLES `admin_notifications` WRITE;
/*!40000 ALTER TABLE `admin_notifications` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `admin_notifications` VALUES
(1,1,'New member registered',1,'/admin/users/detail/1','2024-06-11 08:59:20','2024-06-24 20:14:35'),
(2,1,'Deposit request from MC-BA-4120-2024',1,'/admin/deposit/details/1','2024-06-11 09:11:06','2024-06-24 20:14:35'),
(3,1,'New withdraw request from MC-BA-4120-2024',1,'/admin/withdraw/details/1','2024-06-11 09:11:52','2024-06-24 20:14:35'),
(4,2,'New member registered',1,'/admin/users/detail/2','2024-06-11 10:18:01','2024-06-24 20:14:35'),
(5,1,'Deposit request from MC-BA-4120-2024',1,'/admin/deposit/details/2','2024-06-11 10:36:43','2024-06-24 20:14:35'),
(6,1,'New withdraw request from MC-BA-4120-2024',1,'/admin/withdraw/details/2','2024-06-11 10:37:26','2024-06-24 20:14:35'),
(7,0,'A new contact message has been submitted',1,'/admin/ticket/view/1','2024-06-11 13:39:09','2024-06-24 20:14:35'),
(8,1,'New withdraw request from MC-BA-4120-2024',1,'/admin/withdraw/details/3','2024-06-11 13:51:54','2024-06-24 20:14:35'),
(9,0,'A new contact message has been submitted',1,'/admin/ticket/view/2','2024-06-11 14:03:24','2024-06-24 20:14:35'),
(10,3,'New member registered',1,'/admin/users/detail/3','2024-06-11 14:10:55','2024-06-24 20:14:35'),
(11,3,'Deposit request from MC-BA-1754-2024',1,'/admin/deposit/details/3','2024-06-11 16:49:24','2024-06-24 20:14:35'),
(12,3,'Deposit request from MC-BA-1754-2024',1,'/admin/deposit/details/4','2024-06-11 17:28:18','2024-06-24 20:14:35'),
(13,3,'Deposit request from MC-BA-1754-2024',1,'/admin/deposit/details/5','2024-06-11 17:39:59','2024-06-24 20:14:35'),
(14,1,'New withdraw request from MC-BA-4120-2024',1,'/admin/withdraw/details/4','2024-06-12 04:17:07','2024-06-24 20:14:35'),
(15,1,'New support ticket has opened',1,'/admin/ticket/view/3','2024-06-12 04:43:17','2024-06-24 20:14:35'),
(16,1,'Deposit request from MC-BA-4120-2024',1,'/admin/deposit/details/6','2024-06-12 04:59:50','2024-06-24 20:14:35'),
(17,1,'New withdraw request from MC-BA-4120-2024',1,'/admin/withdraw/details/5','2024-06-12 05:54:53','2024-06-24 20:14:35'),
(18,0,'A new contact message has been submitted',1,'/admin/ticket/view/4','2024-06-12 06:08:32','2024-06-24 20:14:35'),
(19,0,'A new contact message has been submitted',1,'/admin/ticket/view/5','2024-06-12 06:39:51','2024-06-24 20:14:35'),
(20,1,'New loan request',1,'/admin/loan/all?search=EZBSKDSO3Y4G','2024-06-12 07:49:42','2024-06-24 20:14:35'),
(21,1,'Deposit request from MC-BA-4120-2024',1,'/admin/deposit/details/7','2024-06-12 17:28:15','2024-06-24 20:14:35'),
(22,0,'A new contact message has been submitted',1,'/admin/ticket/view/6','2024-06-17 08:22:02','2024-06-24 20:14:35'),
(23,1,'New installment payment',1,'/admin/loan/all?search=EZBSKDSO3Y4G','2024-06-24 13:24:54','2024-06-24 20:14:35'),
(24,1,'New installment payment',1,'/admin/loan/all?search=EZBSKDSO3Y4G','2024-06-24 13:25:20','2024-06-24 20:14:35'),
(25,1,'New installment payment',1,'/admin/loan/all?search=EZBSKDSO3Y4G','2024-06-24 13:29:37','2024-06-24 20:14:35'),
(26,1,'New installment payment',1,'/admin/loan/all?search=EZBSKDSO3Y4G','2024-06-24 13:29:49','2024-06-24 20:14:35'),
(27,1,'New installment payment',1,'/admin/loan/all?search=EZBSKDSO3Y4G','2024-06-24 13:30:00','2024-06-24 20:14:35'),
(28,1,'New installment payment',1,'/admin/loan/all?search=EZBSKDSO3Y4G','2024-06-24 13:30:11','2024-06-24 20:14:35'),
(29,1,'New installment payment',1,'/admin/loan/all?search=EZBSKDSO3Y4G','2024-06-24 13:30:23','2024-06-24 20:14:35'),
(30,1,'New installment payment',1,'/admin/loan/all?search=EZBSKDSO3Y4G','2024-06-24 13:30:34','2024-06-24 20:14:35'),
(31,1,'New installment payment',1,'/admin/loan/all?search=EZBSKDSO3Y4G','2024-06-24 13:30:45','2024-06-24 20:14:35'),
(32,1,'New installment payment',1,'/admin/loan/all?search=EZBSKDSO3Y4G','2024-06-24 13:30:55','2024-06-24 20:14:35'),
(33,1,'New loan request',1,'/admin/loan/all?search=8WOG87Y677AB','2024-06-24 17:34:42','2024-06-24 20:14:35'),
(34,3,'New loan request',1,'/admin/loan/all?search=WO3EMHTG4QGD','2024-06-24 18:46:46','2024-06-24 20:14:35'),
(35,3,'New loan request',1,'/admin/loan/all?search=64VA6PKJE9W9','2024-06-24 18:58:54','2024-06-24 20:14:35'),
(36,4,'New member registered',1,'/admin/users/detail/4','2024-06-24 19:40:48','2024-06-24 20:14:35'),
(37,5,'New member registered',1,'/admin/users/detail/5','2024-06-24 19:51:30','2024-06-24 20:14:35'),
(38,5,'Deposit request from MC-JA-4274-2024',1,'/admin/deposit/details/8','2024-06-24 19:53:44','2024-06-24 20:14:35'),
(39,5,'Deposit request from MC-JA-4274-2024',1,'/admin/deposit/details/9','2024-06-24 20:03:32','2024-06-24 20:14:35'),
(40,5,'New loan request',1,'/admin/loan/all?search=1MVHWG179HH3','2024-06-24 20:05:19','2024-06-24 20:14:35'),
(41,5,'Deposit request from MC-JA-4274-2024',1,'/admin/deposit/details/10','2024-06-24 20:06:21','2024-06-24 20:14:35'),
(42,5,'Deposit request from MC-JA-4274-2024',1,'/admin/deposit/details/11','2024-06-24 20:07:21','2024-06-24 20:14:35'),
(43,5,'New loan request',1,'/admin/loan/all?search=M9623GAQBP6M','2024-06-24 20:10:56','2024-06-24 20:14:35'),
(44,3,'New installment payment',0,'/admin/loan/all?search=WO3EMHTG4QGD','2024-06-26 06:26:17','2024-06-26 06:26:17'),
(45,0,'A new contact message has been submitted',0,'/admin/ticket/view/7','2024-06-26 06:58:03','2024-06-26 06:58:03'),
(46,1,'New installment payment',0,'/admin/loan/all?search=8WOG87Y677AB','2024-06-26 17:13:44','2024-06-26 17:13:44'),
(47,1,'New installment payment',0,'/admin/loan/all?search=8WOG87Y677AB','2024-07-08 16:11:44','2024-07-08 16:11:44'),
(48,1,'New installment payment',0,'/admin/loan/all?search=8WOG87Y677AB','2024-07-08 16:15:28','2024-07-08 16:15:28'),
(49,1,'New installment payment',0,'/admin/loan/all?search=8WOG87Y677AB','2024-07-08 16:16:03','2024-07-08 16:16:03'),
(50,1,'New installment payment',0,'/admin/loan/all?search=8WOG87Y677AB','2024-07-08 18:25:54','2024-07-08 18:25:54'),
(51,6,'New member registered',0,'/admin/users/detail/6','2024-07-09 03:34:49','2024-07-09 03:34:49'),
(52,7,'New member registered',0,'/admin/users/detail/7','2024-07-09 04:24:09','2024-07-09 04:24:09'),
(53,8,'New member registered',0,'/admin/users/detail/8','2024-07-09 04:33:13','2024-07-09 04:33:13'),
(54,9,'New member registered',0,'/admin/users/detail/9','2024-07-09 04:44:02','2024-07-09 04:44:02'),
(55,9,'A new contact message has been submitted',0,'/admin/ticket/view/8','2024-07-09 06:45:42','2024-07-09 06:45:42'),
(56,10,'New member registered',0,'/admin/users/detail/10','2024-07-09 08:08:13','2024-07-09 08:08:13'),
(57,11,'New member registered',0,'/admin/users/detail/11','2024-07-09 08:17:43','2024-07-09 08:17:43'),
(58,5,'New support ticket has opened',0,'/admin/ticket/view/9','2024-07-09 10:04:59','2024-07-09 10:04:59'),
(59,12,'New member registered',0,'/admin/users/detail/12','2024-07-09 14:25:13','2024-07-09 14:25:13'),
(60,12,'Deposit request from SF-MJ-9848-2024',0,'/admin/deposit/details/12','2024-07-09 14:55:51','2024-07-09 14:55:51'),
(61,5,'New installment payment',0,'/admin/loan/all?search=1MVHWG179HH3','2024-07-11 03:41:59','2024-07-11 03:41:59'),
(62,13,'New member registered',0,'/admin/users/detail/13','2024-07-11 08:57:27','2024-07-11 08:57:27'),
(63,14,'New member registered',0,'/admin/users/detail/14','2024-07-11 09:02:06','2024-07-11 09:02:06'),
(64,15,'New member registered',0,'/admin/users/detail/15','2024-07-11 10:06:03','2024-07-11 10:06:03'),
(65,16,'New member registered',0,'/admin/users/detail/16','2024-07-11 10:09:38','2024-07-11 10:09:38'),
(66,17,'New member registered',0,'/admin/users/detail/17','2024-07-11 10:14:10','2024-07-11 10:14:10'),
(67,18,'New member registered',0,'/admin/users/detail/18','2024-07-11 10:49:21','2024-07-11 10:49:21'),
(68,19,'New member registered',0,'/admin/users/detail/19','2024-07-11 10:55:01','2024-07-11 10:55:01'),
(69,20,'New member registered',0,'/admin/users/detail/20','2024-07-11 11:09:50','2024-07-11 11:09:50'),
(70,21,'New member registered',0,'/admin/users/detail/21','2024-07-11 11:14:23','2024-07-11 11:14:23'),
(71,22,'New member registered',0,'/admin/users/detail/22','2024-07-11 11:28:34','2024-07-11 11:28:34'),
(72,23,'New member registered',0,'/admin/users/detail/23','2024-07-11 11:29:54','2024-07-11 11:29:54'),
(73,24,'New member registered',0,'/admin/users/detail/24','2024-07-11 11:33:42','2024-07-11 11:33:42'),
(74,25,'New member registered',0,'/admin/users/detail/25','2024-07-11 11:38:54','2024-07-11 11:38:54'),
(75,26,'New member registered',0,'/admin/users/detail/26','2024-07-11 11:41:49','2024-07-11 11:41:49'),
(76,27,'New member registered',0,'/admin/users/detail/27','2024-07-11 11:43:39','2024-07-11 11:43:39'),
(77,28,'New member registered',0,'/admin/users/detail/28','2024-07-11 19:00:55','2024-07-11 19:00:55'),
(78,29,'New member registered',0,'/admin/users/detail/29','2024-07-11 19:06:51','2024-07-11 19:06:51'),
(79,30,'New member registered',0,'/admin/users/detail/30','2024-07-11 20:14:14','2024-07-11 20:14:14'),
(80,31,'New member registered',0,'/admin/users/detail/31','2024-07-11 20:16:08','2024-07-11 20:16:08'),
(81,32,'New member registered',0,'/admin/users/detail/32','2024-07-11 21:09:50','2024-07-11 21:09:50'),
(82,33,'New member registered',0,'/admin/users/detail/33','2024-07-11 21:39:54','2024-07-11 21:39:54'),
(83,34,'New member registered',0,'/admin/users/detail/34','2024-07-11 22:05:36','2024-07-11 22:05:36'),
(84,35,'New member registered',0,'/admin/users/detail/35','2024-07-16 07:01:24','2024-07-16 07:01:24'),
(85,0,'A new contact message has been submitted',0,'/admin/ticket/view/10','2024-07-16 07:29:00','2024-07-16 07:29:00'),
(86,36,'New member registered',0,'/admin/users/detail/36','2024-07-16 13:00:03','2024-07-16 13:00:03'),
(87,37,'New member registered',0,'/admin/users/detail/37','2024-07-16 13:02:50','2024-07-16 13:02:50'),
(88,38,'New member registered',0,'/admin/users/detail/38','2024-07-16 13:12:47','2024-07-16 13:12:47'),
(89,39,'New member registered',0,'/admin/users/detail/39','2024-07-17 06:51:32','2024-07-17 06:51:32'),
(90,40,'New member registered',0,'/admin/users/detail/40','2024-07-17 07:06:29','2024-07-17 07:06:29'),
(91,41,'New member registered',0,'/admin/users/detail/41','2024-07-17 07:13:36','2024-07-17 07:13:36'),
(92,42,'New member registered',0,'/admin/users/detail/42','2024-07-17 07:16:08','2024-07-17 07:16:08'),
(93,43,'New member registered',0,'/admin/users/detail/43','2024-07-17 07:21:07','2024-07-17 07:21:07'),
(94,44,'New member registered',0,'/admin/users/detail/44','2024-07-17 07:25:03','2024-07-17 07:25:03'),
(95,45,'New member registered',0,'/admin/users/detail/45','2024-07-17 10:15:28','2024-07-17 10:15:28'),
(96,46,'New member registered',0,'/admin/users/detail/46','2024-07-17 10:21:22','2024-07-17 10:21:22'),
(97,47,'New member registered',0,'/admin/users/detail/47','2024-07-17 15:39:51','2024-07-17 15:39:51'),
(98,48,'New member registered',0,'/admin/users/detail/48','2024-07-17 15:43:50','2024-07-17 15:43:50'),
(99,49,'New member registered',0,'/admin/users/detail/49','2024-07-17 15:45:33','2024-07-17 15:45:33'),
(100,50,'New member registered',0,'/admin/users/detail/50','2024-07-17 16:00:14','2024-07-17 16:00:14'),
(101,51,'New member registered',0,'/admin/users/detail/51','2024-07-17 16:14:12','2024-07-17 16:14:12'),
(102,52,'New member registered',0,'/admin/users/detail/52','2024-07-17 16:20:07','2024-07-17 16:20:07'),
(103,53,'New member registered',0,'/admin/users/detail/53','2024-07-17 16:34:30','2024-07-17 16:34:30'),
(104,54,'New member registered',0,'/admin/users/detail/54','2024-07-17 20:02:54','2024-07-17 20:02:54'),
(105,55,'New member registered',0,'/admin/users/detail/55','2024-07-17 20:04:24','2024-07-17 20:04:24'),
(106,56,'New member registered',0,'/admin/users/detail/56','2024-07-18 10:22:56','2024-07-18 10:22:56'),
(107,56,'Deposit request from SF-JA-3289-2024',0,'/admin/deposit/details/13','2024-07-18 10:25:13','2024-07-18 10:25:13'),
(108,56,'Deposit request from SF-JA-3289-2024',0,'/admin/deposit/details/14','2024-07-18 10:26:34','2024-07-18 10:26:34'),
(109,56,'Deposit request from SF-JA-3289-2024',0,'/admin/deposit/details/15','2024-07-18 11:46:32','2024-07-18 11:46:32'),
(110,56,'Deposit request from SF-JA-3289-2024',0,'/admin/deposit/details/16','2024-07-18 11:51:37','2024-07-18 11:51:37'),
(111,56,'Deposit request from SF-JA-3289-2024',0,'/admin/deposit/details/17','2024-07-18 12:54:27','2024-07-18 12:54:27'),
(112,57,'New member registered',0,'/admin/users/detail/57','2024-07-18 23:20:38','2024-07-18 23:20:38'),
(113,57,'Deposit request from SF-BA-1510-2024',0,'/admin/deposit/details/18','2024-07-18 23:23:17','2024-07-18 23:23:17'),
(114,57,'Deposit request from SF-BA-1510-2024',0,'/admin/deposit/details/19','2024-07-19 08:11:45','2024-07-19 08:11:45'),
(115,57,'Deposit request from SF-BA-1510-2024',0,'/admin/deposit/details/20','2024-07-19 10:01:29','2024-07-19 10:01:29'),
(116,57,'New loan request',0,'/admin/loan/all?search=4KKPEZHZ4HN5','2024-07-19 10:03:13','2024-07-19 10:03:13'),
(117,1,'New installment payment',0,'/admin/loan/all?search=8WOG87Y677AB','2024-07-19 10:39:24','2024-07-19 10:39:24'),
(118,1,'New installment payment',0,'/admin/loan/all?search=8WOG87Y677AB','2024-07-19 10:50:32','2024-07-19 10:50:32');
/*!40000 ALTER TABLE `admin_notifications` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `admin_password_resets`
--

DROP TABLE IF EXISTS `admin_password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_password_resets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(40) DEFAULT NULL,
  `token` varchar(40) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_password_resets`
--

LOCK TABLES `admin_password_resets` WRITE;
/*!40000 ALTER TABLE `admin_password_resets` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `admin_password_resets` VALUES
(1,'superadmin2@gmail.com','361196',1,'2024-06-24 02:27:08',NULL),
(2,'benjaminiathanas@gmail.com','378107',1,'2024-06-24 02:32:27',NULL),
(3,'benjaminiathanas@gmail.com','238209',1,'2024-06-24 06:18:54',NULL),
(4,'benjaminiathanas@gmail.com','799260',1,'2024-06-24 06:19:52',NULL),
(5,'benjaminiathanas@gmail.com','473004',1,'2024-06-24 06:24:37',NULL),
(6,'benjaminiathanas@gmail.com','708558',1,'2024-06-24 06:25:47',NULL),
(7,'benjaminiathanas@gmail.com','283048',0,'2024-06-24 06:26:22',NULL),
(8,'benjaminiathanas@gmail.com','455574',1,'2024-06-24 06:28:44',NULL),
(9,'benjaminiathanas@gmail.com','142541',1,'2024-06-24 06:34:10',NULL),
(10,'benjaminiathanas@gmail.com','934189',0,'2024-06-24 06:35:28',NULL),
(11,'benjaminiathanas@gmail.com','178294',1,'2024-06-24 06:44:42',NULL),
(12,'benjaminiathanas@gmail.com','451994',1,'2024-06-24 07:28:17',NULL),
(13,'benjaminiathanas@gmail.com','129846',0,'2024-06-24 07:31:20',NULL),
(14,'benjaminiathanas@gmail.com','391356',1,'2024-07-16 07:39:31',NULL),
(15,'benjaminiathanas@gmail.com','423894',1,'2024-07-16 07:39:58',NULL),
(16,'benjaminiathanas@gmail.com','509553',1,'2024-07-17 00:13:51',NULL),
(17,'benjaminiathanas@gmail.com','700786',1,'2024-07-17 00:20:55',NULL),
(18,'benjaminiathanas@gmail.com','777362',1,'2024-07-17 00:24:02',NULL),
(19,'benjaminiathanas@gmail.com','354805',1,'2024-07-17 00:24:36',NULL),
(20,'benjaminiathanas@gmail.com','845949',1,'2024-07-17 00:27:49',NULL),
(21,'benjaminiathanas@gmail.com','467591',1,'2024-07-17 00:32:14',NULL),
(22,'benjaminiathanas@gmail.com','259583',1,'2024-07-17 00:37:43',NULL),
(23,'benjaminiathanas@gmail.com','497235',1,'2024-07-17 00:43:21',NULL),
(24,'benjaminiathanas@gmail.com','618090',1,'2024-07-17 01:06:00',NULL),
(25,'benjaminiathanas@gmail.com','428814',1,'2024-07-17 01:07:17',NULL),
(26,'benjaminiathanas@gmail.com','793997',1,'2024-07-17 01:09:09',NULL),
(27,'benjaminiathanas@gmail.com','197547',1,'2024-07-17 01:11:07',NULL),
(28,'benjaminiathanas@gmail.com','550804',1,'2024-07-17 01:14:36',NULL),
(29,'benjaminiathanas@gmail.com','828004',1,'2024-07-17 01:15:12',NULL),
(30,'benjaminiathanas@gmail.com','545111',1,'2024-07-17 01:19:28',NULL),
(31,'benjaminiathanas@gmail.com','691149',1,'2024-07-17 01:21:34',NULL),
(32,'benjaminiathanas@gmail.com','261872',1,'2024-07-17 01:24:04',NULL);
/*!40000 ALTER TABLE `admin_password_resets` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `role` enum('admin','superadmin') NOT NULL DEFAULT 'admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `admins` VALUES
(1,'Isaya Kapama','superadmin1@gmail.com','superuser1',NULL,NULL,'$2y$10$Y2iVIv.KhVG.TCE3cj4LB.wfVFZKwBiYaQH8g/65Okzu5rbo2FalK',NULL,'superadmin','2024-06-11 04:56:46','2024-06-11 04:56:46'),
(2,'BENJAMINI ATHANAS','benjaminiathanas@gmail.com','superuser',NULL,'66697bb9224b91718188985.jpg','$2y$10$Y2iVIv.KhVG.TCE3cj4LB.wfVFZKwBiYaQH8g/65Okzu5rbo2FalK','Lk5blqwHtUH7cMSjLIkIN1yRUls4LEeOCzDwUiQm3YmPOm8VTPL1ODLTo9nR','superadmin','2024-06-11 04:56:46','2024-07-19 08:31:23'),
(3,'Constantine Boniphace','superadmin3@gmail.com','superuser3',NULL,'666f63516c59b1718575953.jpg','$2y$10$Y2iVIv.KhVG.TCE3cj4LB.wfVFZKwBiYaQH8g/65Okzu5rbo2FalK',NULL,'admin','2024-06-11 04:56:46','2024-06-16 19:12:33');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `attachments`
--

DROP TABLE IF EXISTS `attachments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `attachments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `attachment_type` varchar(255) NOT NULL,
  `card_number` varchar(255) DEFAULT NULL,
  `nin_number` varchar(255) DEFAULT NULL,
  `voter_id_number` varchar(255) DEFAULT NULL,
  `license_number` varchar(255) DEFAULT NULL,
  `license_category` varchar(255) DEFAULT NULL,
  `front_image` varchar(255) DEFAULT NULL,
  `back_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `attachment_format` varchar(255) DEFAULT NULL,
  `documents` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `attachments_nin_number_unique` (`nin_number`),
  UNIQUE KEY `attachments_voter_id_number_unique` (`voter_id_number`),
  UNIQUE KEY `attachments_license_number_unique` (`license_number`),
  KEY `attachments_user_id_foreign` (`user_id`),
  CONSTRAINT `attachments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attachments`
--

LOCK TABLES `attachments` WRITE;
/*!40000 ALTER TABLE `attachments` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `attachments` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1->Enable, 0->Disable',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `categories` VALUES
(1,'Personal Loan1',NULL,'Personal Loan',0,'2024-06-11 09:59:36','2024-07-08 08:21:08'),
(2,'Business Loan2',NULL,'Business Loan',0,'2024-06-11 09:59:56','2024-07-08 08:21:26'),
(3,'Personal Loan',NULL,'This is a personal Loan\r\namount extends\r\nbeyond TZS. 300,000\r\nup to maximum\r\nof TZS.2,000,000.00',1,'2024-07-08 08:30:17','2024-07-08 10:10:38'),
(4,'Emergency Loan',NULL,'Emergency Loan',1,'2024-07-08 10:10:22','2024-07-08 10:10:22'),
(5,'Micro and Small Loan',NULL,'This is loan targeting individuals/ companies / low-income earners doing business in micro and small sector and intends to use proceed for business investment and tenders. The product loan amount extends above TZS. 500,000.00 up to TZS, 15,000,000.00',1,'2024-07-08 10:22:59','2024-07-08 10:22:59'),
(6,'SME/PO Loan',NULL,'This is a loan targeting\r\nindividual businessmen\r\n/women and\r\ncompanies in well\r\norganized and\r\nformalized business in\r\nlarge and medium\r\neconomic sectors.\r\nThe Loan amount\r\nextends above\r\nTZS.15,000,000.00 up to\r\nTZS. 100,000,000.00',1,'2024-07-08 10:30:11','2024-07-08 10:30:11');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `cron_job_logs`
--

DROP TABLE IF EXISTS `cron_job_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cron_job_logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cron_job_id` int(10) unsigned NOT NULL DEFAULT 0,
  `start_at` datetime DEFAULT NULL,
  `end_at` datetime DEFAULT NULL,
  `duration` int(10) unsigned NOT NULL DEFAULT 0,
  `error` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cron_job_logs`
--

LOCK TABLES `cron_job_logs` WRITE;
/*!40000 ALTER TABLE `cron_job_logs` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `cron_job_logs` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `cron_jobs`
--

DROP TABLE IF EXISTS `cron_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cron_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `alias` varchar(40) DEFAULT NULL,
  `action` text DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `cron_schedule_id` int(10) unsigned NOT NULL DEFAULT 0,
  `next_run` datetime DEFAULT NULL,
  `last_run` datetime DEFAULT NULL,
  `is_running` tinyint(4) NOT NULL DEFAULT 1,
  `is_default` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cron_jobs`
--

LOCK TABLES `cron_jobs` WRITE;
/*!40000 ALTER TABLE `cron_jobs` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `cron_jobs` VALUES
(2,'TESTBACKUP','testbackup',NULL,'https://example.com',2,'2024-06-25 13:10:00',NULL,0,0,'2024-06-25 07:05:18','2024-07-19 10:22:54');
/*!40000 ALTER TABLE `cron_jobs` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `cron_schedules`
--

DROP TABLE IF EXISTS `cron_schedules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cron_schedules` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `interval` int(10) unsigned NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cron_schedules`
--

LOCK TABLES `cron_schedules` WRITE;
/*!40000 ALTER TABLE `cron_schedules` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `cron_schedules` VALUES
(1,'ISAYA JOHN KAPAMA',60,1,'2024-06-19 03:30:34','2024-06-19 03:31:04'),
(2,'BACKUP CREATION',300,1,'2024-06-25 06:21:48','2024-06-25 06:21:48');
/*!40000 ALTER TABLE `cron_schedules` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `deposits`
--

DROP TABLE IF EXISTS `deposits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `deposits` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT 0,
  `method_code` int(10) unsigned NOT NULL DEFAULT 0,
  `amount` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `method_currency` varchar(40) DEFAULT NULL,
  `charge` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `rate` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `final_amo` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `detail` text DEFAULT NULL,
  `btc_amo` varchar(255) DEFAULT NULL,
  `btc_wallet` varchar(255) DEFAULT NULL,
  `trx` varchar(40) DEFAULT NULL,
  `payment_try` int(10) unsigned NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=>success, 2=>pending, 3=>cancel',
  `from_api` tinyint(4) NOT NULL DEFAULT 0,
  `admin_feedback` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone_number` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deposits`
--

LOCK TABLES `deposits` WRITE;
/*!40000 ALTER TABLE `deposits` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `deposits` VALUES
(1,1,1000,100000.00000000,'TZ',1100.00000000,1.00000000,101100.00000000,'[]','0','','1EFYSYF3YTRT',0,1,0,NULL,'2024-06-11 09:11:02','2024-06-11 09:11:24',NULL),
(2,1,1001,40000.00000000,'TZ',500.00000000,1.00000000,40500.00000000,'[]','0','','3V6OEUK3KCK9',0,1,0,NULL,'2024-06-11 10:36:39','2024-06-11 10:37:56',NULL),
(3,3,1000,30000.00000000,'TZ',400.00000000,1.00000000,30400.00000000,'[]','0','','GOD4ZTY5MSMY',0,1,0,NULL,'2024-06-11 16:49:20','2024-06-11 17:37:04',NULL),
(4,3,1000,10000.00000000,'TZ',200.00000000,1.00000000,10200.00000000,'[]','0','','O9Z8RXHXYYJC',0,1,0,NULL,'2024-06-11 17:28:13','2024-06-11 17:36:55','0684573370'),
(5,3,1000,100000.00000000,'TZ',1100.00000000,1.00000000,101100.00000000,'[]','0','','9YCZJTKSO8EZ',0,3,0,'phone','2024-06-11 17:39:53','2024-06-11 17:41:35','2557476968345'),
(6,1,1002,500000.00000000,'TZ',5100.00000000,1.00000000,505100.00000000,'[]','0','','Z7RKJ6B44P9A',0,1,0,NULL,'2024-06-12 04:59:46','2024-06-12 05:00:28','0684573370'),
(7,1,1001,1000000.00000000,'TZ',10100.00000000,1.00000000,1010100.00000000,'[]','0','','BR9935M51WE8',0,1,0,NULL,'2024-06-12 17:28:11','2024-06-13 03:22:20','0684573370'),
(8,5,1000,10000.00000000,'TZ',200.00000000,1.00000000,10200.00000000,'[]','0','','PRF12J3HD15Y',0,1,0,NULL,'2024-06-24 19:53:39','2024-06-24 19:54:11','0684573370'),
(9,5,1000,100000.00000000,'TZ',1100.00000000,1.00000000,101100.00000000,'[]','0','','DEMBQDPC4SWC',0,1,0,NULL,'2024-06-24 20:03:28','2024-06-24 20:04:01','0684573370'),
(10,5,1000,100000.00000000,'TZ',1100.00000000,1.00000000,101100.00000000,'[]','0','','C5CNHXWJ2U3J',0,1,0,NULL,'2024-06-24 20:06:16','2024-06-24 20:06:44','0747696834'),
(11,5,1000,100000.00000000,'TZ',1100.00000000,1.00000000,101100.00000000,'[]','0','','QY1CHC1DP727',0,1,0,NULL,'2024-06-24 20:07:17','2024-06-24 20:07:39','0747696834'),
(12,12,1000,100000.00000000,'TZ',1100.00000000,1.00000000,101100.00000000,'[]','0','','S9EC7195ETBZ',0,1,0,NULL,'2024-07-09 14:55:14','2024-07-19 08:02:02','255684573370'),
(18,57,1002,10000.00000000,'TZ',200.00000000,1.00000000,10200.00000000,'[]','0','','AK3ZZDTE6HFF',0,1,0,NULL,'2024-07-18 23:23:05','2024-07-19 07:47:10','255684573370'),
(19,57,1000,3000.00000000,'TZ',130.00000000,1.00000000,3130.00000000,'[]','0','','QDB88GYUKAGC',0,1,0,NULL,'2024-07-19 08:11:40','2024-07-19 08:25:47','255684573370'),
(20,57,1000,3000.00000000,'TZ',130.00000000,1.00000000,3130.00000000,'[]','0','','NJ1UFHETB586',0,1,0,NULL,'2024-07-19 10:01:25','2024-07-19 10:02:00','255684573370');
/*!40000 ALTER TABLE `deposits` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `device_tokens`
--

DROP TABLE IF EXISTS `device_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `device_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT 0,
  `is_app` tinyint(4) NOT NULL DEFAULT 0,
  `token` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `device_tokens`
--

LOCK TABLES `device_tokens` WRITE;
/*!40000 ALTER TABLE `device_tokens` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `device_tokens` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `extensions`
--

DROP TABLE IF EXISTS `extensions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `extensions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `act` varchar(40) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `script` text DEFAULT NULL,
  `shortcode` text DEFAULT NULL COMMENT 'object',
  `support` text DEFAULT NULL COMMENT 'help section',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=>enable, 2=>disable',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `extensions`
--

LOCK TABLES `extensions` WRITE;
/*!40000 ALTER TABLE `extensions` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `extensions` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `forms`
--

DROP TABLE IF EXISTS `forms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `forms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `act` varchar(40) DEFAULT NULL,
  `form_data` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forms`
--

LOCK TABLES `forms` WRITE;
/*!40000 ALTER TABLE `forms` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `forms` VALUES
(1,'manual_deposit','[]','2024-06-11 09:05:53','2024-06-11 09:05:53'),
(2,'manual_deposit','[]','2024-06-11 09:07:01','2024-06-11 09:07:01'),
(3,'manual_deposit','[]','2024-06-11 09:07:58','2024-06-11 09:07:58'),
(4,'withdraw_method','[]','2024-06-11 09:09:36','2024-06-11 09:09:36'),
(5,'withdraw_method','[]','2024-06-11 09:10:15','2024-06-11 09:10:15'),
(6,'withdraw_method','[]','2024-06-11 09:10:45','2024-06-11 09:10:45'),
(7,'loan_plan','[]','2024-06-12 07:49:08','2024-06-12 07:49:08'),
(8,'loan_plan','[]','2024-06-18 08:06:26','2024-06-18 08:06:26'),
(9,'loan_plan','[]','2024-06-24 18:55:52','2024-06-24 18:55:52'),
(10,'loan_plan','[]','2024-06-24 19:36:49','2024-06-24 19:36:49'),
(11,'loan_plan','[]','2024-07-08 08:54:13','2024-07-08 08:54:13'),
(12,'loan_plan','[]','2024-07-08 10:20:16','2024-07-08 10:20:16'),
(13,'loan_plan','[]','2024-07-08 10:27:22','2024-07-08 10:27:22'),
(14,'loan_plan','[]','2024-07-08 10:40:04','2024-07-08 10:40:04'),
(15,'loan_plan','[]','2024-07-08 10:47:13','2024-07-08 10:47:13');
/*!40000 ALTER TABLE `forms` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `frontends`
--

DROP TABLE IF EXISTS `frontends`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `frontends` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `data_keys` varchar(40) DEFAULT NULL,
  `data_values` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `frontends`
--

LOCK TABLES `frontends` WRITE;
/*!40000 ALTER TABLE `frontends` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `frontends` VALUES
(1,'maintenance.data','{\"description\":\"<h3 class=\\\"mb-3\\\" style=\\\"line-height: 1.3; font-size: 24px; color: rgb(54, 54, 54); text-align: center; font-family: Exo, sans-serif;\\\"><i>We\'re currently making some improvements to enhance your experience. Please bear with us while we work on it. We apologize for any inconvenience caused. Thank you for your patience<\\/i><span style=\\\"font-weight: 600;\\\"><i>!<\\/i><br><\\/span><\\/h3>\",\"image\":\"667286cbd424a1718781643.png\",\"heading\":\"The System is Under Constructions!\"}','2024-06-11 07:11:34','2024-06-19 04:20:44'),
(2,'banner.content','{\"has_image\":\"1\",\"heading\":\"Choose the Right Plan for Your Financial Needs\",\"button_name\":\"GET STARTED\",\"button_link\":\"\\/user\\/register\",\"image\":\"6671a67c9f62e1718724220.jpg\"}','2024-06-11 07:29:38','2024-06-18 12:23:43'),
(3,'breadcrumb.content','{\"has_image\":\"1\",\"image\":\"666832428a6271718104642.jpg\"}','2024-06-11 07:39:06','2024-06-11 08:17:22'),
(4,'blog.content','{\"heading\":\"SOFTFINANCE\",\"subheading\":\"SoftFinance\"}','2024-06-11 07:50:31','2024-07-09 08:49:37'),
(5,'blog.element','{\"has_image\":[\"1\"],\"title\":\"BOSTISHA  PLAIN\",\"description_nic\":\"Boost your wallent now , in few seconds\",\"image\":\"66682c21a81971718103073.jpg\"}','2024-06-11 07:51:13','2024-06-11 07:51:13'),
(6,'blog.element','{\"has_image\":[\"1\"],\"title\":\"KITCHEN CHAP\",\"description_nic\":\"Take loan for your family\\u00a0\",\"image\":\"66682c406f30d1718103104.jpg\"}','2024-06-11 07:51:44','2024-06-11 07:51:44'),
(7,'blog.element','{\"has_image\":[\"1\"],\"title\":\"SCHOOL LITE\",\"description_nic\":\"take the loan for your student, pay school fees,\\u00a0 and school accommodation\",\"image\":\"66682c8ccbfc21718103180.jpg\"}','2024-06-11 07:53:00','2024-06-11 07:53:01'),
(8,'blog.element','{\"has_image\":[\"1\"],\"title\":\"HOMEBOY PLAN\",\"description_nic\":\"Take the loan for boost your capital and increase you bussiness growith\",\"image\":\"66682cd0a27c61718103248.jpg\"}','2024-06-11 07:54:08','2024-06-11 07:54:08'),
(9,'blog.element','{\"has_image\":[\"1\"],\"title\":\"FARU LOAN\",\"description_nic\":\"Take loan to complete your house now\\u00a0\",\"image\":\"6668318c52fed1718104460.jpg\"}','2024-06-11 08:14:20','2024-06-11 08:14:20'),
(10,'blog.element','{\"has_image\":[\"1\"],\"title\":\"ELEPHANT  LOAN\",\"description_nic\":\"Take loan to invest on farming, prepare your farm get money and invest\",\"image\":\"666831e8118e51718104552.jpg\"}','2024-06-11 08:15:52','2024-06-11 08:15:52'),
(12,'client.element','{\"has_image\":\"1\",\"image\":\"6668339fb9f171718104991.png\"}','2024-06-11 08:23:11','2024-06-11 08:23:12'),
(13,'client.element','{\"has_image\":\"1\",\"image\":\"666833af0027d1718105007.png\"}','2024-06-11 08:23:26','2024-06-11 08:23:27'),
(14,'client.element','{\"has_image\":\"1\",\"image\":\"666833c380ea31718105027.png\"}','2024-06-11 08:23:47','2024-06-11 08:23:47'),
(15,'client.element','{\"has_image\":\"1\",\"image\":\"666833d64df521718105046.png\"}','2024-06-11 08:24:06','2024-06-11 08:24:06'),
(16,'contact.content','{\"heading\":\"Our contact\",\"phone\":\"+255 67845778\",\"email\":\"softfinance@gmail.com\",\"location\":\"Dar-es-salaam , Tanzania\",\"map\":\"https:\\/\\/maps.google.com\\/maps?width=100%25&height=600&hl=en&q=1%20Grafton%20Street,%20Dublin,%20Ireland+(My%20Business%20Name)&t=&z=14&ie=UTF8&iwloc=B&output=embed\"}','2024-06-11 08:26:32','2024-07-09 09:14:18'),
(17,'counter.content','{\"has_image\":\"1\",\"image\":\"666837550b7101718105941.jpg\"}','2024-06-11 08:36:58','2024-06-11 08:39:01'),
(18,'footer.content','{\"title\":\"SoftFinance\",\"content\":\"We offer a variety of loan options tailored to meet your unique financial needs. Whether you need a short-term loan to cover immediate expenses or a long-term loan for a significant investment, we have a solution for you\",\"subscription_heading\":\"Priority Support\",\"subscription_subheading\":\"Access to financial newsletters and updates\"}','2024-06-11 08:39:47','2024-07-09 09:54:13'),
(19,'login.content','{\"has_image\":\"1\",\"heading\":\"Login\",\"image\":\"6671a604dcaf21718724100.jpg\"}','2024-06-11 08:40:52','2024-06-18 12:21:41'),
(20,'plan.content','{\"subheading\":\"Unlock Your Financial Potential with Our Tailored Loan Plans\",\"heading\":\"Choose the Right Plan for Your Financial Needs\"}','2024-06-11 08:43:01','2024-06-11 08:43:01'),
(21,'policy_pages.element','{\"title\":\"Our Policy\",\"details\":\"<div>Loan Application and Approval Policy:<\\/div><div>Clearly outline the eligibility criteria for loan applications, including credit score, income requirements, and any specific documentation needed. Describe the process of application submission, review, and approval. Specify the maximum loan amounts, interest rates, and repayment terms. Ensure transparency by explaining how loan decisions are made and the expected timeline for approval or denial.<\\/div><div><br \\/><\\/div><div>Interest Rate and Fee Policy:<\\/div><div>Detail the methodology for determining interest rates based on factors like creditworthiness, loan type, and market conditions. Clarify any additional fees or charges, such as origination fees or prepayment penalties. Provide examples and scenarios to help borrowers understand the total cost of borrowing. Emphasize transparency and compliance with usury laws or consumer protection regulations<\\/div><div><br \\/><\\/div><div>Privacy and Data Security Policy:<\\/div><div>Address how customer data will be collected, stored, processed, and protected in compliance with relevant data protection laws (e.g., GDPR or CCPA). Describe measures taken to ensure data security, such as encryption and regular security audits. Outline how customer data will be used, shared (if applicable), and how customers can access or modify their information.<\\/div><div><br \\/><\\/div><div>Repayment and Default Policy:<\\/div><div>Clearly explain the repayment options available to borrowers, including automatic deductions, manual payments, and payment schedules. Outline the consequences of missed or late payments, including potential late fees and impact on credit scores. Describe the steps taken in case of loan default, such as collections processes, potential legal actions, and implications for future borrowing.<\\/div><div><br \\/><\\/div><div>Customer Service and Complaint Resolution Policy:<\\/div><div>Define the channels and methods through which customers can seek assistance, ask questions, or make complaints. Establish a dedicated customer support team and provide contact information. Describe the process for addressing and resolving customer complaints, including timelines for response and resolution. Highlight your commitment to excellent customer service.<\\/div><div><br \\/><\\/div><div><br \\/><\\/div>\"}','2024-06-11 08:44:36','2024-06-11 08:44:36'),
(22,'social_icon.element','{\"title\":\"facebook\",\"social_icon\":\"<i class=\\\"fab fa-facebook-f\\\"><\\/i>\",\"url\":\"www.facebook.com\"}','2024-06-11 08:45:05','2024-06-11 08:45:05'),
(23,'social_icon.element','{\"title\":\"whatssapp\",\"social_icon\":\"<i class=\\\"fab fa-whatsapp\\\"><\\/i>\",\"url\":\"www.whatssap.com\"}','2024-06-11 08:45:29','2024-06-11 08:45:29'),
(24,'social_icon.element','{\"title\":\"Tweeter\",\"social_icon\":\"<i class=\\\"fab fa-twitter\\\"><\\/i>\",\"url\":\"www.tweeter.com\"}','2024-06-11 08:45:49','2024-06-11 08:45:49'),
(25,'social_icon.element','{\"title\":\"Instagram\",\"social_icon\":\"<i class=\\\"fab fa-instagram\\\"><\\/i>\",\"url\":\"www.instagram.com\"}','2024-06-11 08:46:14','2024-06-11 08:46:14'),
(26,'testimonial.element','{\"has_image\":\"1\",\"author\":\"Isaya John\",\"designation\":\"Dar-es-salaam\",\"quote\":\"Nice company to meeet\",\"image\":\"66718d47c39671718717767.jpg\"}','2024-06-11 08:47:32','2024-06-18 10:36:08'),
(27,'testimonial.element','{\"has_image\":\"1\",\"author\":\"Marco Amosi\",\"designation\":\"Dodoma\",\"quote\":\"The loan process with Mikopochap was quick and easy. They offered competitive rates and great customer service. I wouldn\'t hesitate to use them again.\",\"image\":\"66718db1b7a441718717873.jpg\"}','2024-06-11 08:54:50','2024-06-18 10:37:53'),
(28,'feature.content','{\"has_image\":\"1\",\"heading\":\"Our Features\",\"subheading\":\"SoftFinance\",\"content\":\"\\\"Quick loans\\\" refer to fast and easily accessible financial products designed to provide immediate funds for emergency or urgent expenses. They typically have a streamlined application process, minimal documentation requirements, and quick disbursement of funds, often within the same day. Here are the key aspects to consider\",\"image\":\"667193a614bc21718719398.jpg\"}','2024-06-11 08:56:43','2024-07-09 09:53:49'),
(29,'seo.data','{\"keywords\":[],\"description\":\"\",\"social_title\":\"\",\"social_description\":\"\",\"image\":null}','2024-06-11 13:44:20','2024-06-11 13:44:20'),
(31,'cta.content','{\"heading\":\"Welcome,  Make your dreams come true.\",\"subheading\":\"Quick loans are designed to meet urgent financial needs efficiently. Here are the key benefits of opting for a quick loan\",\"button_name\":\"JOIN US\",\"button_link\":\"http:\\/\\/127.0.0.1:8000\\/user\\/login\"}','2024-06-18 11:20:53','2024-07-09 09:18:00'),
(32,'counter.element','{\"title\":\"WANUFAIKA\",\"counter_digit\":\"1000+\"}','2024-06-19 04:29:38','2024-06-19 04:31:31'),
(33,'counter.element','{\"title\":\"MIKOPO\",\"counter_digit\":\"500  M\"}','2024-06-19 04:30:41','2024-06-19 04:30:41'),
(34,'counter.element','{\"title\":\"TUZO\",\"counter_digit\":\"5+\"}','2024-06-19 04:32:19','2024-06-19 04:32:19'),
(35,'about.content','{\"has_image\":\"1\",\"heading\":\"Empowering Financial Freedom And Trusted Solutions\",\"subheading\":\"ABOUT US\",\"description\":\"<span style=\\\"color:rgb(33,37,41);\\\">We are committed to helping you achieve your financial goals and dreams. Our loan services are designed to provide you with the support and resources you need to take control of your finances and embark on a path towards prosperity.Our experienced team of financial experts is dedicated to understanding your unique needs and finding the best loan solutions that align with your goals. Whether you\'re looking to fund a new business venture, consolidate debt, purchase a new home, or cover unexpected expenses, we\'ve got you covered.<\\/span><br \\/>\",\"button_name\":\"About\",\"button_link\":\"\\/about\",\"image\":\"6672946ca20971718785132.jpg\"}','2024-06-19 05:15:14','2024-06-19 05:18:53');
/*!40000 ALTER TABLE `frontends` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `gateway_currencies`
--

DROP TABLE IF EXISTS `gateway_currencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `gateway_currencies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `currency` varchar(40) DEFAULT NULL,
  `symbol` varchar(40) DEFAULT NULL,
  `method_code` int(11) DEFAULT NULL,
  `gateway_alias` varchar(40) DEFAULT NULL,
  `min_amount` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `max_amount` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `percent_charge` decimal(5,2) NOT NULL DEFAULT 0.00,
  `fixed_charge` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `rate` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `image` varchar(255) DEFAULT NULL,
  `gateway_parameter` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gateway_currencies`
--

LOCK TABLES `gateway_currencies` WRITE;
/*!40000 ALTER TABLE `gateway_currencies` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `gateway_currencies` VALUES
(1,'M-PESA','TZ','',1000,'m-pesa',1000.00000000,100000.00000000,1.00,100.00000000,1.00000000,NULL,NULL,'2024-06-11 09:05:53','2024-06-11 09:05:53'),
(2,'TIGO-PESA','TZ','',1001,'tigo-pesa',1000.00000000,10000000.00000000,1.00,100.00000000,1.00000000,NULL,NULL,'2024-06-11 09:07:02','2024-06-11 09:07:02'),
(3,'AIRTEL-MONEY','TZ','',1002,'airtel-money',1000.00000000,1000000.00000000,1.00,100.00000000,1.00000000,NULL,NULL,'2024-06-11 09:07:58','2024-06-12 04:27:29');
/*!40000 ALTER TABLE `gateway_currencies` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `gateways`
--

DROP TABLE IF EXISTS `gateways`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `gateways` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `form_id` int(10) unsigned NOT NULL DEFAULT 0,
  `code` int(10) unsigned DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `alias` varchar(40) NOT NULL DEFAULT 'NULL',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=>enable, 2=>disable',
  `gateway_parameters` text DEFAULT NULL,
  `supported_currencies` text DEFAULT NULL,
  `crypto` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: fiat currency, 1: crypto currency',
  `extra` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gateways`
--

LOCK TABLES `gateways` WRITE;
/*!40000 ALTER TABLE `gateways` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `gateways` VALUES
(1,1,1000,'M-PESA','m-pesa',1,'[]','[]',0,NULL,'Check your phone and confirm the Depost amount and password to depost','2024-06-11 09:05:53','2024-06-11 09:05:53'),
(2,2,1001,'TIGO-PESA','tigo-pesa',1,'[]','[]',0,NULL,'Check your phone confirm the amount and password to depots','2024-06-11 09:07:01','2024-06-11 09:07:01'),
(3,3,1002,'AIRTEL-MONEY','airtel-money',1,'[]','[]',0,NULL,'Check the phone , confirm the amount and password to depost','2024-06-11 09:07:58','2024-06-11 09:07:58');
/*!40000 ALTER TABLE `gateways` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `general_settings`
--

DROP TABLE IF EXISTS `general_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `general_settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `site_name` varchar(40) DEFAULT NULL,
  `cur_text` varchar(40) DEFAULT NULL COMMENT 'currency text',
  `cur_sym` varchar(40) DEFAULT NULL COMMENT 'currency symbol',
  `email_from` varchar(40) DEFAULT NULL,
  `email_template` text DEFAULT NULL,
  `sms_body` varchar(255) DEFAULT NULL,
  `sms_from` varchar(255) DEFAULT NULL,
  `base_color` varchar(40) DEFAULT NULL,
  `mail_config` text DEFAULT NULL COMMENT 'email configuration',
  `sms_config` text DEFAULT NULL,
  `push_configuration` text DEFAULT NULL,
  `global_shortcodes` text DEFAULT NULL,
  `kv` tinyint(4) NOT NULL DEFAULT 0,
  `ev` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'email verification, 0 - dont check, 1 - check',
  `en` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'email notification, 0 - dont send, 1 - send',
  `sv` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'mobile verication, 0 - dont check, 1 - check',
  `sn` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'sms notification, 0 - dont send, 1 - send',
  `pn` tinyint(4) NOT NULL DEFAULT 0,
  `force_ssl` tinyint(4) NOT NULL DEFAULT 0,
  `maintenance_mode` tinyint(4) NOT NULL DEFAULT 0,
  `secure_password` tinyint(4) NOT NULL DEFAULT 0,
  `agree` tinyint(4) NOT NULL DEFAULT 0,
  `multi_language` tinyint(4) NOT NULL DEFAULT 1,
  `registration` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: Off, 1: On',
  `active_template` varchar(40) DEFAULT NULL,
  `system_info` text DEFAULT NULL,
  `system_customized` tinyint(4) NOT NULL DEFAULT 0,
  `last_cron` datetime DEFAULT NULL,
  `socialite_credentials` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `general_settings`
--

LOCK TABLES `general_settings` WRITE;
/*!40000 ALTER TABLE `general_settings` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `general_settings` VALUES
(1,'SoftFinance','TZS','TZS','benjaminiathanas@gmail.com','b','hi {{fullname}} ({{username}}), {{message}}','MikopoChap','70b2ec','{\"name\":\"php\"}','\"{\\\"name\\\":\\\"nexmo\\\",\\\"clickatell\\\":{\\\"api_key\\\":\\\"----------------\\\"},\\\"infobip\\\":{\\\"username\\\":\\\"------------8888888\\\",\\\"password\\\":\\\"-----------------\\\"},\\\"message_bird\\\":{\\\"api_key\\\":\\\"-------------------\\\"},\\\"nexmo\\\":{\\\"api_key\\\":\\\"----------------------\\\",\\\"api_secret\\\":\\\"----------------------\\\"},\\\"sms_broadcast\\\":{\\\"username\\\":\\\"----------------------\\\",\\\"password\\\":\\\"-----------------------------\\\"},\\\"twilio\\\":{\\\"account_sid\\\":\\\"-----------------------\\\",\\\"auth_token\\\":\\\"---------------------------\\\",\\\"from\\\":\\\"----------------------\\\"},\\\"text_magic\\\":{\\\"username\\\":\\\"-----------------------\\\",\\\"apiv2_key\\\":\\\"-------------------------------\\\"},\\\"custom\\\":{\\\"method\\\":\\\"get\\\",\\\"url\\\":\\\"https:\\\\\\/\\\\\\/hostname\\\\\\/demo-api-v1\\\",\\\"headers\\\":{\\\"name\\\":[\\\"api_key\\\"],\\\"value\\\":[\\\"test_api 555\\\"]},\\\"body\\\":{\\\"name\\\":[\\\"from_number\\\"],\\\"value\\\":[\\\"5657545757\\\"]}}}\"',NULL,'\"{\\\\n    \\\"site_name\\\":\\\"Name of your site\\\",\\\\n    \\\"site_currency\\\":\\\"Currency of your site\\\",\\\\n    \\\"currency_symbol\\\":\\\"Symbol of currency\\\"\\\\n}\"',0,1,1,1,1,0,0,0,0,1,1,1,'basic','{\"version\":\"2.1\",\"details\":\"\"}',0,'2024-05-01 12:44:14','\"{\\\"google\\\":{\\\"client_id\\\":\\\"157973156918-1lk2892pttn264pstis089cpo2pi80oc.apps.googleusercontent.com\\\",\\\"client_secret\\\":\\\"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\\\",\\\"status\\\":1},\\\"facebook\\\":{\\\"client_id\\\":\\\"1722606658114776\\\",\\\"client_secret\\\":\\\"ecb94d75bf34bff9f6b44c6f93d7fd0a\\\",\\\"status\\\":1},\\\"linkedin\\\":{\\\"client_id\\\":\\\"868mv3jobt5bqq\\\",\\\"client_secret\\\":\\\"2GYeQjyzyhavFVr4\\\",\\\"status\\\":1}}\"','2024-06-07 01:50:17','2024-07-09 08:21:04');
/*!40000 ALTER TABLE `general_settings` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `installments`
--

DROP TABLE IF EXISTS `installments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `installments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `loan_id` bigint(20) unsigned NOT NULL,
  `delay_charge` decimal(28,8) unsigned NOT NULL DEFAULT 0.00000000,
  `installment_date` date DEFAULT NULL,
  `status` enum('pending','payed') NOT NULL DEFAULT 'pending',
  `given_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `installments_loan_id_foreign` (`loan_id`),
  CONSTRAINT `installments_loan_id_foreign` FOREIGN KEY (`loan_id`) REFERENCES `loans` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `installments`
--

LOCK TABLES `installments` WRITE;
/*!40000 ALTER TABLE `installments` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `installments` VALUES
(1,1,3000.33000000,'2024-06-13','payed','2024-06-24 13:24:53',NULL,NULL),
(2,1,3000.33000000,'2024-06-14','payed','2024-06-24 13:25:19',NULL,NULL),
(3,1,3000.33000000,'2024-06-15','payed','2024-06-24 13:29:37',NULL,NULL),
(4,1,2000.22000000,'2024-06-16','payed','2024-06-24 13:29:49',NULL,NULL),
(5,1,2000.22000000,'2024-06-17','payed','2024-06-24 13:30:00',NULL,NULL),
(6,1,2000.22000000,'2024-06-18','payed','2024-06-24 13:30:11',NULL,NULL),
(7,1,1000.11000000,'2024-06-19','payed','2024-06-24 13:30:22',NULL,NULL),
(8,1,1000.11000000,'2024-06-20','payed','2024-06-24 13:30:33',NULL,NULL),
(9,1,0.00000000,'2024-06-21','payed','2024-06-24 13:30:45',NULL,NULL),
(10,1,0.00000000,'2024-06-22','payed','2024-06-24 13:30:55',NULL,NULL),
(11,2,8000.88000000,'2024-06-25','payed','2024-06-26 17:13:44',NULL,NULL),
(12,2,7000.77000000,'2024-06-26','payed','2024-07-08 16:11:44',NULL,NULL),
(13,2,7000.77000000,'2024-06-27','payed','2024-07-08 16:15:28',NULL,NULL),
(14,2,7000.77000000,'2024-06-28','payed','2024-07-08 16:16:03',NULL,NULL),
(15,2,6000.66000000,'2024-06-29','payed','2024-07-08 18:25:53',NULL,NULL),
(16,2,6000.66000000,'2024-06-30','payed','2024-07-19 10:39:24',NULL,NULL),
(17,2,6000.66000000,'2024-07-01','payed','2024-07-19 10:50:32',NULL,NULL),
(18,2,5000.55000000,'2024-07-02','pending',NULL,NULL,NULL),
(19,2,5000.55000000,'2024-07-03','pending',NULL,NULL,NULL),
(20,2,5000.55000000,'2024-07-04','pending',NULL,NULL,NULL),
(31,4,0.00000000,'2024-07-04','pending',NULL,NULL,NULL),
(32,4,0.00000000,'2024-07-14','pending',NULL,NULL,NULL),
(33,4,0.00000000,'2024-07-24','pending',NULL,NULL,NULL),
(34,4,0.00000000,'2024-08-03','pending',NULL,NULL,NULL),
(35,4,0.00000000,'2024-08-13','pending',NULL,NULL,NULL),
(36,4,0.00000000,'2024-08-23','pending',NULL,NULL,NULL),
(37,4,0.00000000,'2024-09-02','pending',NULL,NULL,NULL),
(38,4,0.00000000,'2024-09-12','pending',NULL,NULL,NULL),
(39,4,0.00000000,'2024-09-22','pending',NULL,NULL,NULL),
(40,4,0.00000000,'2024-10-02','pending',NULL,NULL,NULL),
(41,4,0.00000000,'2024-10-12','pending',NULL,NULL,NULL),
(42,6,0.00000000,'2024-07-14','pending',NULL,NULL,NULL),
(43,6,0.00000000,'2024-08-03','pending',NULL,NULL,NULL),
(44,6,0.00000000,'2024-08-23','pending',NULL,NULL,NULL),
(45,6,0.00000000,'2024-09-12','pending',NULL,NULL,NULL),
(46,6,0.00000000,'2024-10-02','pending',NULL,NULL,NULL),
(47,6,0.00000000,'2024-10-22','pending',NULL,NULL,NULL),
(48,5,20000.40000000,'2024-07-04','payed','2024-07-11 03:41:59',NULL,NULL),
(49,5,0.00000000,'2024-07-14','pending',NULL,NULL,NULL),
(50,5,0.00000000,'2024-07-24','pending',NULL,NULL,NULL),
(51,5,0.00000000,'2024-08-03','pending',NULL,NULL,NULL),
(52,5,0.00000000,'2024-08-13','pending',NULL,NULL,NULL),
(53,5,0.00000000,'2024-08-23','pending',NULL,NULL,NULL),
(54,5,0.00000000,'2024-09-02','pending',NULL,NULL,NULL),
(55,5,0.00000000,'2024-09-12','pending',NULL,NULL,NULL),
(56,5,0.00000000,'2024-09-22','pending',NULL,NULL,NULL),
(57,5,0.00000000,'2024-10-02','pending',NULL,NULL,NULL),
(58,5,0.00000000,'2024-10-12','pending',NULL,NULL,NULL);
/*!40000 ALTER TABLE `installments` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `languages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `code` varchar(40) DEFAULT NULL,
  `is_default` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: not default language, 1: default language',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `languages`
--

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `languages` VALUES
(1,'English','en',1,'2024-06-11 07:27:42','2024-07-09 19:18:07'),
(3,'Swahili','sw',0,'2024-06-26 17:47:36','2024-06-26 17:53:09');
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `loan_plans`
--

DROP TABLE IF EXISTS `loan_plans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `loan_plans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL DEFAULT 0,
  `form_id` int(10) unsigned NOT NULL DEFAULT 0,
  `name` varchar(40) NOT NULL,
  `title` varchar(40) DEFAULT NULL,
  `minimum_amount` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `maximum_amount` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `per_installment` decimal(5,2) NOT NULL DEFAULT 0.00 COMMENT '%',
  `installment_interval` int(11) NOT NULL DEFAULT 0 COMMENT 'In Day',
  `total_installment` int(11) NOT NULL DEFAULT 0,
  `application_fixed_charge` decimal(28,8) NOT NULL DEFAULT 0.00000000 COMMENT 'Fixed Application charge',
  `application_percent_charge` decimal(28,8) NOT NULL DEFAULT 0.00000000 COMMENT 'Percent Application charge',
  `instruction` text DEFAULT NULL,
  `delay_value` int(10) unsigned NOT NULL DEFAULT 1,
  `fixed_charge` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `percent_charge` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `is_featured` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1->Featured, 0->Non-Featured',
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loan_plans`
--

LOCK TABLES `loan_plans` WRITE;
/*!40000 ALTER TABLE `loan_plans` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `loan_plans` VALUES
(1,1,7,'Personal Loan','Perconal Loan',10000.00000000,10000000.00000000,11.00,1,10,100.00000000,0.00000000,'confirm the payments&nbsp;',3,1000.00000000,1.00000000,0,1,'2024-06-12 07:49:09','2024-06-12 07:49:09'),
(2,1,8,'isaya John','333',1000.00000000,10000.00000000,1.00,1,102,1.00000000,1.00000000,'<br>',1,100.00000000,1.00000000,1,1,'2024-06-18 08:06:26','2024-06-24 18:52:15'),
(3,2,9,'Economy Loan','Economy Loan',1000000.00000000,10000000.00000000,10.00,10,11,1000.00000000,0.00000000,'confirm before taka the loan',3,10000.00000000,2.00000000,1,1,'2024-06-24 18:55:52','2024-06-24 20:10:22'),
(4,2,10,'Smart Business','Smart Business',5000000.00000000,100000000.00000000,20.00,20,6,10000.00000000,0.00000000,'welcome to our office for more verifications',10,100000.00000000,4.00000000,0,1,'2024-06-24 19:36:49','2024-06-24 20:10:05'),
(5,3,11,'Personal Loan','Personal Loan',300000.00000000,2000000.00000000,108.00,30,1,0.00000000,1.50000000,'confirm the before to apply the loan',3,0.00000000,1.00000000,0,1,'2024-07-08 08:54:13','2024-07-08 10:11:26'),
(6,4,12,'Emergency Loan','Emergency Loan',300000.00000000,1000000.00000000,108.00,30,1,0.00000000,1.50000000,'Emergency Loan',3,0.00000000,1.00000000,0,1,'2024-07-08 10:20:16','2024-07-08 10:20:16'),
(7,5,13,'Micro and Small Loan','Micro and Small Loan',500000.00000000,15000000.00000000,107.00,30,1,1.00000000,1.50000000,'This is loan targeting individuals/ companies / low-income earners doing business in micro and small sector and intends to use proceed for business investment and tenders. The product loan amount extends above TZS. 500,000.00 up to TZS, 15,000,000.00&nbsp;<br>',3,0.00000000,1.00000000,0,1,'2024-07-08 10:27:22','2024-07-08 10:27:22'),
(8,6,14,'SME/PO Loan','SME/PO Loan',15000000.00000000,100000000.00000000,106.00,30,1,0.00000000,1.50000000,'This is a loan targeting individual businessmen /women and companies in well organized and formalized business in large and medium economic sectors. The Loan amount extends above TZS.15,000,000.00 up to TZS. 100,000,000.0<br>',3,0.00000000,1.00000000,0,1,'2024-07-08 10:40:04','2024-07-08 10:40:04'),
(9,6,15,'SME/PO Loan','SME /PO Loan',15000000.00000000,100000000.00000000,53.00,90,2,0.00000000,1.50000000,'&nbsp;This is a loan targeting individual businessmen /women and companies in well organized and formalized business in large and medium economic sectors. The Loan amount extends above TZS.15,000,000.00 up to TZS. 100,000,000.00<br>',3,0.00000000,1.00000000,0,1,'2024-07-08 10:47:13','2024-07-08 10:47:13');
/*!40000 ALTER TABLE `loan_plans` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `loans`
--

DROP TABLE IF EXISTS `loans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `loans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `loan_number` varchar(40) DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `plan_id` bigint(20) unsigned NOT NULL,
  `amount` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `per_installment` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `payable_amount` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `installment_interval` int(11) NOT NULL DEFAULT 0 COMMENT 'Days',
  `delay_value` int(11) NOT NULL DEFAULT 1,
  `charge_per_installment` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `delay_charge` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `given_installment` int(11) NOT NULL DEFAULT 0,
  `total_installment` int(11) NOT NULL DEFAULT 0,
  `application_form` text DEFAULT NULL,
  `admin_feedback` text DEFAULT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT 0 COMMENT '0 = Pending, 1 = Running, 2 = Paid, 3 = Rejected',
  `paid_amount` decimal(28,2) unsigned NOT NULL DEFAULT 0.00,
  `due_notification_sent` timestamp NULL DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `loans_user_id_foreign` (`user_id`),
  KEY `loans_plan_id_foreign` (`plan_id`),
  CONSTRAINT `loans_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `loan_plans` (`id`) ON DELETE CASCADE,
  CONSTRAINT `loans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loans`
--

LOCK TABLES `loans` WRITE;
/*!40000 ALTER TABLE `loans` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `loans` VALUES
(1,'EZBSKDSO3Y4G',1,1,1000000.00000000,110000.00000000,0.00000000,1,3,1000.11000000,17001.87000000,10,10,'[]',NULL,2,1210000.00,NULL,'2024-06-12 07:50:38','2024-06-12 07:49:41','2024-06-24 13:30:55'),
(2,'8WOG87Y677AB',1,1,1000000.00000000,110000.00000000,330000.00000000,1,3,1000.11000000,25002.75000000,7,10,'[]',NULL,1,880000.00,NULL,'2024-06-24 17:36:29','2024-06-24 17:34:42','2024-07-19 10:50:32'),
(4,'64VA6PKJE9W9',3,3,6000000.00000000,600000.00000000,6600000.00000000,10,3,10000.20000000,0.00000000,0,11,'[]',NULL,1,0.00,NULL,'2024-06-24 19:32:45','2024-06-24 18:58:53','2024-06-24 19:32:45'),
(5,'1MVHWG179HH3',5,3,1000000.00000000,100000.00000000,1000000.00000000,10,3,10000.20000000,20000.40000000,10,11,'[]',NULL,1,1100000.00,NULL,'2024-06-24 20:11:38','2024-06-24 20:05:19','2024-07-11 03:41:59'),
(6,'M9623GAQBP6M',5,4,20000000.00000000,4000000.00000000,24000000.00000000,20,10,100000.80000000,0.00000000,0,6,'[]',NULL,1,0.00,NULL,'2024-06-24 20:11:27','2024-06-24 20:10:56','2024-06-24 20:11:27');
/*!40000 ALTER TABLE `loans` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `migrations` VALUES
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2022_02_26_061836_create_forms_table',1),
(6,'2023_06_15_144908_create_update_logs_table',1),
(7,'2024_05_27_151143_create_admins_table',1),
(8,'2024_05_29_132712_create_pages_table',1),
(9,'2024_06_10_083808_create_admin_notifications_table',1),
(10,'2024_06_10_084043_create_admin_password_resets_table',1),
(11,'2024_06_10_084459_create_categories_table',1),
(12,'2024_06_10_084637_create_cron_jobs_table',1),
(13,'2024_06_10_084811_create_cron_job_logs_table',1),
(14,'2024_06_10_085018_create_cron_schedules_table',1),
(15,'2024_06_10_085215_create_deposits_table',1),
(16,'2024_06_10_085355_create_device_tokens_table',1),
(17,'2024_06_10_085513_create_extensions_table',1),
(18,'2024_06_10_085742_create_forms_table',1),
(19,'2024_06_10_085906_create_frontends_table',1),
(20,'2024_06_10_090000_create_support_tickets_table',1),
(21,'2024_06_10_090212_create_gateways_table',1),
(22,'2024_06_10_090411_create_gateway_currencies_table',1),
(23,'2024_06_10_090614_create_general_settings_table',1),
(24,'2024_06_10_090810_create_loan_plans_table',1),
(25,'2024_06_10_090811_create_loans_table',1),
(26,'2024_06_10_091008_create_languages_table',1),
(27,'2024_06_10_091729_create_notification_logs_table',1),
(28,'2024_06_10_092211_create_installments_table',1),
(29,'2024_06_10_092308_create_notification_templates_table',1),
(30,'2024_06_10_092545_create_subscribers_table',1),
(31,'2024_06_10_092744_create_support_messages_table',1),
(32,'2024_06_10_092930_create_support_attachments_table',1),
(33,'2024_06_10_093719_create_transactions_table',1),
(34,'2024_06_10_093915_create_update_logs_table',1),
(35,'2024_06_10_094359_add_columns_to_users_table',1),
(36,'2024_06_10_101500_create_user_logins_table',1),
(37,'2024_06_10_101840_create_user_notifications_table',1),
(38,'2024_06_10_102153_create_withdrawals_table',1),
(39,'2024_06_10_102549_create_withdraw_methods_table',1),
(40,'2024_06_21_075337_add_status_to_installments_table',2),
(41,'2024_06_21_133737_add_paid_amount_to_loans_table',2),
(42,'2024_08_19_152132_create_attachments_table',3),
(43,'2024_08_20_004408_add_unique_constraints_to_attachments_table',3),
(44,'2024_08_21_125551_add_attachment_format_and_documents_to_attachments_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `notification_logs`
--

DROP TABLE IF EXISTS `notification_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `notification_logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `sender` varchar(40) DEFAULT NULL,
  `sent_from` varchar(40) DEFAULT NULL,
  `sent_to` varchar(40) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `notification_type` varchar(40) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notification_logs_user_id_foreign` (`user_id`),
  CONSTRAINT `notification_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification_logs`
--

LOCK TABLES `notification_logs` WRITE;
/*!40000 ALTER TABLE `notification_logs` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `notification_logs` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `notification_templates`
--

DROP TABLE IF EXISTS `notification_templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `notification_templates` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `act` varchar(40) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `subj` varchar(255) DEFAULT NULL,
  `email_body` text DEFAULT NULL,
  `sms_body` text DEFAULT NULL,
  `push_notification_body` text DEFAULT NULL,
  `shortcodes` text DEFAULT NULL,
  `email_status` tinyint(4) NOT NULL DEFAULT 1,
  `sms_status` tinyint(4) NOT NULL DEFAULT 1,
  `push_notification_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification_templates`
--

LOCK TABLES `notification_templates` WRITE;
/*!40000 ALTER TABLE `notification_templates` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `notification_templates` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `pages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `tempname` varchar(255) NOT NULL,
  `secs` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`secs`)),
  `is_default` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `pages` VALUES
(1,'HOME','/','templates.basic.','[\"client\",\"about\",\"feature\",\"plan\",\"counter\",\"faq\",\"testimonial\",\"blog\"]',1,'2024-06-11 04:57:08','2024-06-11 10:45:23'),
(2,'Blog','blog','templates.basic.',NULL,1,'2024-06-11 04:57:08','2024-06-11 04:57:08'),
(3,'Contact','contact','templates.basic.',NULL,1,'2024-06-11 04:57:08','2024-06-11 04:57:08'),
(4,'About','about','templates.basic.',NULL,0,'2024-06-11 04:57:08','2024-06-26 06:43:43');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `password_resets` VALUES
('bennycive@gmail.com','119301','2024-07-19 11:20:43');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
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
set autocommit=0;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `subscribers`
--

DROP TABLE IF EXISTS `subscribers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `subscribers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(40) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscribers`
--

LOCK TABLES `subscribers` WRITE;
/*!40000 ALTER TABLE `subscribers` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `subscribers` VALUES
(1,'isayajohn616@gmail.com','2024-06-18 07:45:45','2024-06-18 07:45:45'),
(3,'bennycive@gmail.com','2024-07-19 09:07:18','2024-07-19 09:07:18');
/*!40000 ALTER TABLE `subscribers` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `support_attachments`
--

DROP TABLE IF EXISTS `support_attachments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `support_attachments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `support_message_id` bigint(20) unsigned DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `support_attachments_support_message_id_foreign` (`support_message_id`),
  CONSTRAINT `support_attachments_support_message_id_foreign` FOREIGN KEY (`support_message_id`) REFERENCES `support_messages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `support_attachments`
--

LOCK TABLES `support_attachments` WRITE;
/*!40000 ALTER TABLE `support_attachments` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `support_attachments` VALUES
(1,5,'66695195c72ac1718178197.jpg','2024-06-12 04:43:18','2024-06-12 04:43:18'),
(2,8,'66696e88ec3241718185608.png','2024-06-12 06:46:50','2024-06-12 06:46:50'),
(3,8,'66696e8aa48601718185610.jpg','2024-06-12 06:46:51','2024-06-12 06:46:51'),
(4,14,'668d357b1a42b1720530299.jpg','2024-07-09 10:04:59','2024-07-09 10:04:59');
/*!40000 ALTER TABLE `support_attachments` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `support_messages`
--

DROP TABLE IF EXISTS `support_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `support_messages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `support_ticket_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `admin_id` bigint(20) unsigned DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `support_messages_support_ticket_id_foreign` (`support_ticket_id`),
  KEY `support_messages_admin_id_foreign` (`admin_id`),
  CONSTRAINT `support_messages_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  CONSTRAINT `support_messages_support_ticket_id_foreign` FOREIGN KEY (`support_ticket_id`) REFERENCES `support_tickets` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `support_messages`
--

LOCK TABLES `support_messages` WRITE;
/*!40000 ALTER TABLE `support_messages` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `support_messages` VALUES
(2,1,2,'welcome','2024-06-11 13:50:28','2024-06-11 13:50:28'),
(4,2,2,'fixed','2024-06-12 04:24:49','2024-06-12 04:24:49'),
(5,3,NULL,'bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb bbbbbbbbbbbbbbbbbbbbbbbbbbbb bbbbbbbbbbbbbbbbbbbbbbb','2024-06-12 04:43:17','2024-06-12 04:43:17'),
(7,5,NULL,'bbbbbbbb nnnnnnnnnnnnnn bbbbbbbbbbbbb','2024-06-12 06:39:51','2024-06-12 06:39:51'),
(8,5,NULL,'The problem of site is that can be','2024-06-12 06:46:48','2024-06-12 06:46:48'),
(9,4,2,'bbbbbbb','2024-06-12 07:17:56','2024-06-12 07:17:56'),
(10,5,3,'bbbbbbbbbbbbbbbbbb','2024-06-13 15:51:48','2024-06-13 15:51:48'),
(12,7,NULL,'DDDDDDDDDDDDDD','2024-06-26 06:58:03','2024-06-26 06:58:03'),
(13,8,NULL,'bbbbbbbbbbbbb','2024-07-09 06:45:42','2024-07-09 06:45:42'),
(14,9,NULL,'mkopo unagoma kuomba kwa wakati','2024-07-09 10:04:58','2024-07-09 10:04:58'),
(15,10,NULL,'wwww welcome back','2024-07-16 07:29:00','2024-07-16 07:29:00'),
(16,10,2,'bbbbbbbbbbbbb','2024-07-19 07:48:55','2024-07-19 07:48:55');
/*!40000 ALTER TABLE `support_messages` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `support_tickets`
--

DROP TABLE IF EXISTS `support_tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `support_tickets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `name` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `ticket` varchar(40) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: Open, 1: Answered, 2: Replied, 3: Closed',
  `priority` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1 = Low, 2 = Medium, 3 = High',
  `last_reply` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `support_tickets`
--

LOCK TABLES `support_tickets` WRITE;
/*!40000 ALTER TABLE `support_tickets` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `support_tickets` VALUES
(1,0,'BENJAMINI ATHANAS','bennycive@gmail.com','25212030','UPDATE SYSTEM TEST',1,2,'2024-06-11 16:50:28','2024-06-11 13:39:09','2024-06-11 13:50:28'),
(2,0,'Business Loan','bennycive@gmail.com','39405884','UPDATE SYSTEM TEST',1,2,'2024-06-12 07:24:49','2024-06-11 14:03:24','2024-06-12 04:24:49'),
(3,1,'BENJAMINI ATHANAS','bennycive@gmail.com','206554','UPDATE SYSTEM TEST',3,2,'2024-06-12 07:43:17','2024-06-12 04:43:17','2024-06-13 15:52:14'),
(4,0,'BENJAMINI ATHANAS','bennycive@gmail.com','40599747','UPDATE SYSTEM TEST',1,2,'2024-06-12 10:17:56','2024-06-12 06:08:32','2024-06-12 07:17:56'),
(5,0,'BENJAMINI ATHANAS','bennycive@gmail.com','60832707','UPDATE SYSTEM TEST',1,2,'2024-06-13 18:51:48','2024-06-12 06:39:51','2024-06-13 15:51:48'),
(6,0,'isaya John','isayajohn616@gmail.com','87451708','siwezi omba mkopo',3,2,'2024-06-17 11:22:02','2024-06-17 08:22:02','2024-06-17 08:37:58'),
(7,0,'BENJAMINI ATHANAS','bennycive@gmail.com','42512232','bennycive@gmail.com',3,2,'2024-06-26 09:58:03','2024-06-26 06:58:03','2024-06-26 09:56:52'),
(8,9,'Mussa Joshua','bennycive@gmail.com','74757457','bbb',0,2,'2024-07-09 09:45:42','2024-07-09 06:45:42','2024-07-09 06:45:42'),
(9,5,'Joshua Amos','bennycive11@gmail.com','151639','msaada',0,2,'2024-07-09 13:04:58','2024-07-09 10:04:58','2024-07-09 10:04:58'),
(10,0,'ABC','bennycive@gmail.com','41648894','SUBJECT',1,2,'2024-07-19 10:48:55','2024-07-16 07:29:00','2024-07-19 07:48:55');
/*!40000 ALTER TABLE `support_tickets` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `transactions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `amount` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `phone_number` varchar(255) DEFAULT NULL,
  `charge` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `post_balance` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `trx_type` varchar(40) DEFAULT NULL,
  `trx` varchar(40) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `remark` varchar(40) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transactions_user_id_foreign` (`user_id`),
  CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `transactions` VALUES
(1,1,100000.00000000,NULL,1100.00000000,100000.00000000,'+','1EFYSYF3YTRT','Deposit Via M-PESA','deposit','2024-06-11 09:11:24','2024-06-11 09:11:24'),
(2,1,10000.00000000,NULL,200.00000000,90000.00000000,'-','ZNWABJFG9O8U','9,800.00 TZ Withdraw Via AIRTEL-MONEY','withdraw','2024-06-11 09:11:52','2024-06-11 09:11:52'),
(3,1,50000.00000000,NULL,600.00000000,40000.00000000,'-','WDR1NVMKE2VN','49,400.00 TZ Withdraw Via TIGO-PESA','withdraw','2024-06-11 10:37:26','2024-06-11 10:37:26'),
(4,1,40000.00000000,NULL,500.00000000,80000.00000000,'+','3V6OEUK3KCK9','Deposit Via TIGO-PESA','deposit','2024-06-11 10:37:57','2024-06-11 10:37:57'),
(5,1,60000.00000000,NULL,700.00000000,20000.00000000,'-','43FV5T66M9H9','59,300.00 TZ Withdraw Via AIRTEL-MONEY','withdraw','2024-06-11 13:51:54','2024-06-11 13:51:54'),
(6,1,10000.00000000,NULL,0.00000000,30000.00000000,'+','SWH5GVXCUQP4','bonus','balance_add','2024-06-11 13:58:18','2024-06-11 13:58:18'),
(7,1,10000.00000000,NULL,0.00000000,20000.00000000,'-','66EVATJ5AM6K','penality','balance_subtract','2024-06-11 13:58:45','2024-06-11 13:58:45'),
(8,3,10000.00000000,NULL,0.00000000,10000.00000000,'+','UTGQ9A8773PA','signup bonus','balance_add','2024-06-11 16:45:51','2024-06-11 16:45:51'),
(9,3,10000.00000000,'0684573370',200.00000000,20000.00000000,'+','O9Z8RXHXYYJC','Deposit Via M-PESA','deposit','2024-06-11 17:36:55','2024-06-11 17:36:55'),
(10,3,30000.00000000,NULL,400.00000000,50000.00000000,'+','GOD4ZTY5MSMY','Deposit Via M-PESA','deposit','2024-06-11 17:37:04','2024-06-11 17:37:04'),
(11,1,10000.00000000,'255747696834',200.00000000,10000.00000000,'-','UQ1X7FQNXGG5','9,800.00 TZ Withdraw Via M-PESA','withdraw','2024-06-12 04:17:06','2024-06-12 04:17:06'),
(12,1,500000.00000000,'0684573370',5100.00000000,510000.00000000,'+','Z7RKJ6B44P9A','Deposit Via AIRTEL-MONEY','deposit','2024-06-12 05:00:28','2024-06-12 05:00:28'),
(13,1,400000.00000000,'0747696834',4100.00000000,110000.00000000,'-','65DZHCO2R24D','395,900.00 TZ Withdraw Via M-PESA','withdraw','2024-06-12 05:54:53','2024-06-12 05:54:53'),
(14,1,100.00000000,NULL,0.00000000,109900.00000000,'-','EZBSKDSO3Y4G','TZS1,000,000.00 Charged for application fee Personal Loan','application_fee','2024-06-12 07:49:42','2024-06-12 07:49:42'),
(15,1,1000000.00000000,NULL,0.00000000,1109900.00000000,'+','5W49TFR8T181','Loan taken','loan_taken','2024-06-12 07:50:39','2024-06-12 07:50:39'),
(16,1,1000000.00000000,'0684573370',10100.00000000,2109900.00000000,'+','BR9935M51WE8','Deposit Via TIGO-PESA','deposit','2024-06-13 03:22:21','2024-06-13 03:22:21'),
(17,1,100000.00000000,NULL,0.00000000,2009900.00000000,'-','QR7OAM25AJSM','deni','balance_subtract','2024-06-17 08:43:29','2024-06-17 08:43:29'),
(18,1,3000.33000000,'255747696834',0.00000000,3000.33000000,'+','718326b14be140d0','TZS3,000.33 Installment penalty for loan EZBSKDSO3Y4G','installment_penalty','2024-06-24 13:24:54','2024-06-24 13:24:54'),
(19,1,110000.00000000,'255747696834',0.00000000,110000.00000000,'+','b4210338e23453d8','TZS113,000.33 Installment payment for loan EZBSKDSO3Y4G','installment_payment','2024-06-24 13:24:54','2024-06-24 13:24:54'),
(20,1,3000.33000000,'255747696834',0.00000000,3000.33000000,'+','6a9cdc38f20b17a3','TZS3,000.33 Installment penalty for loan EZBSKDSO3Y4G','installment_penalty','2024-06-24 13:25:20','2024-06-24 13:25:20'),
(21,1,110000.00000000,'255747696834',0.00000000,220000.00000000,'+','78123b991a942a73','TZS113,000.33 Installment payment for loan EZBSKDSO3Y4G','installment_payment','2024-06-24 13:25:20','2024-06-24 13:25:20'),
(22,1,3000.33000000,'255747696834',0.00000000,3000.33000000,'+','086eeb1f2ad539a8','TZS3,000.33 Installment penalty for loan EZBSKDSO3Y4G','installment_penalty','2024-06-24 13:29:37','2024-06-24 13:29:37'),
(23,1,110000.00000000,'255747696834',0.00000000,330000.00000000,'+','fb61e83253519088','TZS113,000.33 Installment payment for loan EZBSKDSO3Y4G','installment_payment','2024-06-24 13:29:37','2024-06-24 13:29:37'),
(24,1,2000.22000000,'255747696834',0.00000000,2000.22000000,'+','15ad130c692756ce','TZS2,000.22 Installment penalty for loan EZBSKDSO3Y4G','installment_penalty','2024-06-24 13:29:49','2024-06-24 13:29:49'),
(25,1,110000.00000000,'255747696834',0.00000000,440000.00000000,'+','948b376967294343','TZS112,000.22 Installment payment for loan EZBSKDSO3Y4G','installment_payment','2024-06-24 13:29:49','2024-06-24 13:29:49'),
(26,1,2000.22000000,'255747696834',0.00000000,2000.22000000,'+','62d8f86922a37b8d','TZS2,000.22 Installment penalty for loan EZBSKDSO3Y4G','installment_penalty','2024-06-24 13:30:00','2024-06-24 13:30:00'),
(27,1,110000.00000000,'255747696834',0.00000000,550000.00000000,'+','238d9ee04251a721','TZS112,000.22 Installment payment for loan EZBSKDSO3Y4G','installment_payment','2024-06-24 13:30:00','2024-06-24 13:30:00'),
(28,1,2000.22000000,'255747696834',0.00000000,2000.22000000,'+','8b0fa204dd2580f6','TZS2,000.22 Installment penalty for loan EZBSKDSO3Y4G','installment_penalty','2024-06-24 13:30:11','2024-06-24 13:30:11'),
(29,1,110000.00000000,'255747696834',0.00000000,660000.00000000,'+','c2eecec87487bda3','TZS112,000.22 Installment payment for loan EZBSKDSO3Y4G','installment_payment','2024-06-24 13:30:11','2024-06-24 13:30:11'),
(30,1,1000.11000000,'255747696834',0.00000000,1000.11000000,'+','acd140825957e9ba','TZS1,000.11 Installment penalty for loan EZBSKDSO3Y4G','installment_penalty','2024-06-24 13:30:22','2024-06-24 13:30:22'),
(31,1,110000.00000000,'255747696834',0.00000000,770000.00000000,'+','59a6981ad3d393cb','TZS111,000.11 Installment payment for loan EZBSKDSO3Y4G','installment_payment','2024-06-24 13:30:23','2024-06-24 13:30:23'),
(32,1,1000.11000000,'255747696834',0.00000000,1000.11000000,'+','a41f1223ba706ed9','TZS1,000.11 Installment penalty for loan EZBSKDSO3Y4G','installment_penalty','2024-06-24 13:30:33','2024-06-24 13:30:33'),
(33,1,110000.00000000,'255747696834',0.00000000,880000.00000000,'+','a00153b23529518d','TZS111,000.11 Installment payment for loan EZBSKDSO3Y4G','installment_payment','2024-06-24 13:30:34','2024-06-24 13:30:34'),
(34,1,110000.00000000,'255747696834',0.00000000,990000.00000000,'+','963e6aef40d3f549','TZS110,000.00 Installment payment for loan EZBSKDSO3Y4G','installment_payment','2024-06-24 13:30:45','2024-06-24 13:30:45'),
(35,1,110000.00000000,'255747696834',0.00000000,1100000.00000000,'+','eb16c40832be4e01','TZS110,000.00 Installment payment for loan EZBSKDSO3Y4G','installment_payment','2024-06-24 13:30:55','2024-06-24 13:30:55'),
(36,1,100.00000000,NULL,0.00000000,2009800.00000000,'-','8WOG87Y677AB','TZS1,000,000.00 Charged for application fee Personal Loan','application_fee','2024-06-24 17:34:42','2024-06-24 17:34:42'),
(37,1,1000000.00000000,NULL,0.00000000,3009800.00000000,'+','3OD43JJN6DV9','Loan taken','loan_taken','2024-06-24 17:36:30','2024-06-24 17:36:30'),
(38,3,100.00000000,NULL,0.00000000,49900.00000000,'-','WO3EMHTG4QGD','TZS9,800,000.00 Charged for application fee Personal Loan','application_fee','2024-06-24 18:46:46','2024-06-24 18:46:46'),
(39,3,9800000.00000000,NULL,0.00000000,9849900.00000000,'+','H949RZEPTXQF','Loan taken','loan_taken','2024-06-24 18:48:08','2024-06-24 18:48:08'),
(40,3,181000.00000000,NULL,0.00000000,9668900.00000000,'-','64VA6PKJE9W9','TZS6,000,000.00 Charged for application fee Economy Loan','application_fee','2024-06-24 18:58:54','2024-06-24 18:58:54'),
(41,3,6000000.00000000,NULL,0.00000000,15668900.00000000,'+','AAAXZYAQGVFY','Loan taken','loan_taken','2024-06-24 19:32:46','2024-06-24 19:32:46'),
(42,5,10000.00000000,'0684573370',200.00000000,10000.00000000,'+','PRF12J3HD15Y','Deposit Via M-PESA','deposit','2024-06-24 19:54:12','2024-06-24 19:54:12'),
(43,5,100000.00000000,'0684573370',1100.00000000,110000.00000000,'+','DEMBQDPC4SWC','Deposit Via M-PESA','deposit','2024-06-24 20:04:02','2024-06-24 20:04:02'),
(44,5,31000.00000000,NULL,0.00000000,79000.00000000,'-','1MVHWG179HH3','TZS1,000,000.00 Charged for application fee Economy Loan','application_fee','2024-06-24 20:05:19','2024-06-24 20:05:19'),
(45,5,100000.00000000,'0747696834',1100.00000000,179000.00000000,'+','C5CNHXWJ2U3J','Deposit Via M-PESA','deposit','2024-06-24 20:06:45','2024-06-24 20:06:45'),
(46,5,100000.00000000,'0747696834',1100.00000000,279000.00000000,'+','QY1CHC1DP727','Deposit Via M-PESA','deposit','2024-06-24 20:07:40','2024-06-24 20:07:40'),
(47,5,10000.00000000,NULL,0.00000000,269000.00000000,'-','M9623GAQBP6M','TZS20,000,000.00 Charged for application fee Smart Business','application_fee','2024-06-24 20:10:56','2024-06-24 20:10:56'),
(48,5,20000000.00000000,NULL,0.00000000,20269000.00000000,'+','USYQDSB95PQN','Loan taken','loan_taken','2024-06-24 20:11:28','2024-06-24 20:11:28'),
(49,5,1000000.00000000,NULL,0.00000000,21269000.00000000,'+','RTW9YFYN7OX9','Loan taken','loan_taken','2024-06-24 20:11:40','2024-06-24 20:11:40'),
(50,3,1078000.00000000,'255627871360',0.00000000,1078000.00000000,'+','602e718e75ebf9e3','TZS1,078,000.00 Installment payment for loan WO3EMHTG4QGD','installment_payment','2024-06-26 06:26:17','2024-06-26 06:26:17'),
(51,1,110000.00000000,'255627871360',0.00000000,110000.00000000,'+','28fda39a3a8c3e11','TZS110,000.00 Installment payment for loan 8WOG87Y677AB','installment_payment','2024-06-26 17:13:44','2024-06-26 17:13:44'),
(52,1,4000.44000000,'255684573370',0.00000000,4000.44000000,'+','959ea9a575e6bf60','TZS4,000.44 Installment penalty for loan 8WOG87Y677AB','installment_penalty','2024-07-08 16:11:44','2024-07-08 16:11:44'),
(53,1,110000.00000000,'255684573370',0.00000000,220000.00000000,'+','5b73ab4b825d9b05','TZS114,000.44 Installment payment for loan 8WOG87Y677AB','installment_payment','2024-07-08 16:11:44','2024-07-08 16:11:44'),
(54,1,3000.33000000,'255684573370',0.00000000,3000.33000000,'+','3d5e7cc6373e1746','TZS3,000.33 Installment penalty for loan 8WOG87Y677AB','installment_penalty','2024-07-08 16:15:28','2024-07-08 16:15:28'),
(55,1,110000.00000000,'255684573370',0.00000000,330000.00000000,'+','5d7b2a805a6ac00c','TZS113,000.33 Installment payment for loan 8WOG87Y677AB','installment_payment','2024-07-08 16:15:28','2024-07-08 16:15:28'),
(56,1,3000.33000000,'255684573370',0.00000000,3000.33000000,'+','a401783e5a07496d','TZS3,000.33 Installment penalty for loan 8WOG87Y677AB','installment_penalty','2024-07-08 16:16:03','2024-07-08 16:16:03'),
(57,1,110000.00000000,'255684573370',0.00000000,440000.00000000,'+','76fc68abc408b4aa','TZS113,000.33 Installment payment for loan 8WOG87Y677AB','installment_payment','2024-07-08 16:16:03','2024-07-08 16:16:03'),
(58,1,3000.33000000,'255684573370',0.00000000,3000.33000000,'+','bac2404f016a60ff','TZS3,000.33 Installment penalty for loan 8WOG87Y677AB','installment_penalty','2024-07-08 18:25:54','2024-07-08 18:25:54'),
(59,1,110000.00000000,'255684573370',0.00000000,550000.00000000,'+','e47d4e6cc8c4109e','TZS113,000.33 Installment payment for loan 8WOG87Y677AB','installment_payment','2024-07-08 18:25:54','2024-07-08 18:25:54'),
(60,5,20000.40000000,'255684573370',0.00000000,20000.40000000,'+','f5d80e77e779d386','TZS20,000.40 Installment penalty for loan 1MVHWG179HH3','installment_penalty','2024-07-11 03:41:59','2024-07-11 03:41:59'),
(61,5,100000.00000000,'255684573370',0.00000000,1000000.00000000,'+','3135f63fb7a9171e','TZS120,000.40 Installment payment for loan 1MVHWG179HH3','installment_payment','2024-07-11 03:41:59','2024-07-11 03:41:59'),
(63,12,100000.00000000,'255684573370',1100.00000000,100000.00000000,'+','S9EC7195ETBZ','Deposit Via M-PESA','deposit','2024-07-19 08:02:02','2024-07-19 08:02:02'),
(68,1,6000.66000000,'255684573370',0.00000000,6000.66000000,'+','d90213048d5fb846','TZS6,000.66 Installment penalty for loan 8WOG87Y677AB','installment_penalty','2024-07-19 10:39:24','2024-07-19 10:39:24'),
(69,1,110000.00000000,'255684573370',0.00000000,660000.00000000,'+','e77929122918428d','TZS116,000.66 Installment payment for loan 8WOG87Y677AB','installment_payment','2024-07-19 10:39:24','2024-07-19 10:39:24'),
(70,1,6000.66000000,'255684573370',0.00000000,6000.66000000,'+','7f0a5c8d3885f0ff','TZS6,000.66 Installment penalty for loan 8WOG87Y677AB','installment_penalty','2024-07-19 10:50:32','2024-07-19 10:50:32'),
(71,1,110000.00000000,'255684573370',0.00000000,770000.00000000,'+','5313981e6056a86f','TZS116,000.66 Installment payment for loan 8WOG87Y677AB','installment_payment','2024-07-19 10:50:32','2024-07-19 10:50:32');
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `update_logs`
--

DROP TABLE IF EXISTS `update_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `update_logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(40) DEFAULT NULL,
  `update_log` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `update_logs`
--

LOCK TABLES `update_logs` WRITE;
/*!40000 ALTER TABLE `update_logs` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `update_logs` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `user_logins`
--

DROP TABLE IF EXISTS `user_logins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_logins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `user_ip` varchar(40) DEFAULT NULL,
  `user_mac` varchar(255) DEFAULT NULL,
  `city` varchar(40) DEFAULT NULL,
  `country` varchar(40) DEFAULT NULL,
  `country_code` varchar(40) DEFAULT NULL,
  `longitude` varchar(40) DEFAULT NULL,
  `latitude` varchar(40) DEFAULT NULL,
  `browser` varchar(40) DEFAULT NULL,
  `os` varchar(40) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_logins_user_id_foreign` (`user_id`),
  CONSTRAINT `user_logins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_logins`
--

LOCK TABLES `user_logins` WRITE;
/*!40000 ALTER TABLE `user_logins` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `user_logins` VALUES
(1,1,'127.0.0.1','MAC address not found','','','','','','Chrome','Windows 10','2024-06-11 08:59:22','2024-06-11 08:59:22'),
(2,2,'192.168.1.188','40-b0-34-e9-0c-9b','','','','','','Chrome','Windows 10','2024-06-11 10:18:02','2024-06-11 10:18:02'),
(3,3,'192.168.1.189','MAC address not found','','','','','','Chrome','Windows 10','2024-06-11 14:10:57','2024-06-11 14:10:57'),
(4,3,'192.168.1.189','MAC address not found','','','','','','Chrome','Windows 10','2024-06-11 16:48:24','2024-06-11 16:48:24'),
(5,1,'192.168.1.189','MAC address not found','','','','','','Chrome','Windows 10','2024-06-12 03:39:24','2024-06-12 03:39:24'),
(6,1,'192.168.1.189','MAC address not found','','','','','','Chrome','Windows 10','2024-06-12 03:40:40','2024-06-12 03:40:40'),
(7,1,'192.168.1.189','MAC address not found','','','','','','Chrome','Windows 10','2024-06-12 03:43:20','2024-06-12 03:43:20'),
(8,1,'192.168.1.189','MAC address not found','','','','','','Chrome','Windows 10','2024-06-12 07:17:01','2024-06-12 07:17:01'),
(9,1,'192.168.1.189','MAC address not found','','','','','','Chrome','Windows 10','2024-06-12 14:09:08','2024-06-12 14:09:08'),
(10,1,'192.168.1.189','MAC address not found','','','','','','Chrome','Windows 10','2024-06-12 17:26:30','2024-06-12 17:26:30'),
(11,1,'192.168.1.189','MAC address not found','','','','','','Chrome','Windows 10','2024-06-13 09:34:11','2024-06-13 09:34:11'),
(12,1,'127.0.0.1','MAC address not found','','','','','','Chrome','Windows 10','2024-06-16 19:05:03','2024-06-16 19:05:03'),
(13,1,'127.0.0.1','MAC address not found','','','','','','Chrome','Windows 10','2024-06-17 08:40:26','2024-06-17 08:40:26'),
(14,1,'127.0.0.1','MAC address not found','','','','','','Chrome','Windows 10','2024-06-18 07:57:47','2024-06-18 07:57:47'),
(15,1,'127.0.0.1','MAC address not found','','','','','','Chrome','Windows 10','2024-06-18 12:32:53','2024-06-18 12:32:53'),
(16,1,'127.0.0.1','MAC address not found','','','','','','Chrome','Windows 10','2024-06-24 17:32:27','2024-06-24 17:32:27'),
(17,1,'127.0.0.1','MAC address not found','','','','','','Chrome','Windows 10','2024-06-24 17:34:11','2024-06-24 17:34:11'),
(18,3,'127.0.0.1','MAC address not found','','','','','','Chrome','Windows 10','2024-06-24 18:46:20','2024-06-24 18:46:20'),
(19,3,'127.0.0.1','MAC address not found','','','','','','Chrome','Windows 10','2024-06-24 18:57:29','2024-06-24 18:57:29'),
(20,3,'127.0.0.1','MAC address not found','','','','','','Chrome','Windows 10','2024-06-24 19:30:10','2024-06-24 19:30:10'),
(22,5,'127.0.0.1','MAC address not found','','','','','','Chrome','Windows 10','2024-06-24 19:51:31','2024-06-24 19:51:31'),
(23,5,'127.0.0.1','MAC address not found','','','','','','Chrome','Windows 10','2024-06-24 20:02:55','2024-06-24 20:02:55'),
(24,1,'127.0.0.1','MAC address not found','','','','','','Chrome','Windows 10','2024-06-25 06:18:31','2024-06-25 06:18:31'),
(25,1,'127.0.0.1','MAC address not found','','','','','','Chrome','Windows 10','2024-06-25 17:39:51','2024-06-25 17:39:51'),
(26,5,'127.0.0.1','MAC address not found','','','','','','Chrome','Windows 10','2024-06-26 06:29:06','2024-06-26 06:29:06'),
(27,1,'127.0.0.1','MAC address not found','','','','','','Chrome','Windows 10','2024-06-26 17:13:03','2024-06-26 17:13:03'),
(28,1,'127.0.0.1','MAC address not found','','','','','','Firefox','Windows 10','2024-07-08 16:10:50','2024-07-08 16:10:50'),
(29,1,'127.0.0.1','MAC address not found','','','','','','Chrome','Windows 10','2024-07-08 08:55:10','2024-07-08 08:55:10'),
(30,1,'127.0.0.1','MAC address not found','','','','','','Firefox','Windows 10','2024-07-08 18:24:55','2024-07-08 18:24:55'),
(35,5,'127.0.0.1','MAC address not found','','','','','','Firefox','Windows 10','2024-07-09 07:32:55','2024-07-09 07:32:55'),
(37,11,'127.0.0.1','MAC address not found','','','','','','Firefox','Windows 10','2024-07-09 08:17:43','2024-07-09 08:17:43'),
(38,11,'127.0.0.1','MAC address not found','','','','','','Firefox','Windows 10','2024-07-09 09:47:33','2024-07-09 09:47:33'),
(39,5,'127.0.0.1','MAC address not found','','','','','','Firefox','Windows 10','2024-07-09 10:01:05','2024-07-09 10:01:05'),
(40,12,'127.0.0.1','MAC address not found','','','','','','Firefox','Windows 10','2024-07-09 14:25:13','2024-07-09 14:25:13'),
(41,5,'127.0.0.1','MAC address not found','','','','','','Firefox','Windows 10','2024-07-11 03:08:38','2024-07-11 03:08:38'),
(51,22,'192.168.1.100','08-6a-c5-fb-da-3d','','','','','','Chrome','Windows 10','2024-07-11 11:28:39','2024-07-11 11:28:39'),
(93,1,'127.0.0.1','MAC address not found','','','','','','Firefox','Windows 10','2024-07-19 10:37:37','2024-07-19 10:37:37'),
(94,1,'127.0.0.1','MAC address not found','','','','','','Chrome','Windows 10','2026-03-31 09:56:29','2026-03-31 09:56:29');
/*!40000 ALTER TABLE `user_logins` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `user_notifications`
--

DROP TABLE IF EXISTS `user_notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_notifications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `remark` varchar(40) DEFAULT NULL,
  `click_value` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_notifications_user_id_foreign` (`user_id`),
  CONSTRAINT `user_notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_notifications`
--

LOCK TABLES `user_notifications` WRITE;
/*!40000 ALTER TABLE `user_notifications` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `user_notifications` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `firstname` varchar(40) DEFAULT NULL,
  `lastname` varchar(40) DEFAULT NULL,
  `username` varchar(40) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `country_code` varchar(40) DEFAULT NULL,
  `mobile` varchar(40) DEFAULT NULL,
  `ref_by` bigint(20) unsigned NOT NULL DEFAULT 0,
  `balance` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `address` text DEFAULT NULL COMMENT 'contains full address',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0: banned, 1: active',
  `kyc_data` text DEFAULT NULL,
  `kv` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: KYC Unverified, 2: KYC pending, 1: KYC verified',
  `ev` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: email unverified, 1: email verified',
  `sv` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: mobile unverified, 1: mobile verified',
  `profile_complete` tinyint(4) NOT NULL DEFAULT 0,
  `ver_code` varchar(40) DEFAULT NULL COMMENT 'stores verification code',
  `ver_code_send_at` datetime DEFAULT NULL COMMENT 'verification send time',
  `ts` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: 2fa off, 1: 2fa on',
  `tv` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0: 2fa unverified, 1: 2fa verified',
  `tsc` varchar(255) DEFAULT NULL,
  `ban_reason` varchar(255) DEFAULT NULL,
  `login_by` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `users` VALUES
(1,'','bennycive12@gmail.com',NULL,'$2y$10$Y2iVIv.KhVG.TCE3cj4LB.wfVFZKwBiYaQH8g/65Okzu5rbo2FalK','yOi0U4Jz21yv9vp2n8fTTaqhJyK0qOOEPOyrPkpPxAgmYhEr85dBD1s1K1R4','2024-06-11 08:59:19','2024-07-19 10:48:26','BENJAMINI','ATHANAS','MC-BA-4120-2024','669a4479cccca1721386105.png','TZ','255684573311',0,3009800.00000000,'{\"address\":\"P.O.BOX 456 DODOMA\",\"state\":\"DODOMA\",\"zip\":\"418345\",\"country\":\"Tanzania\",\"city\":\"AREA C\"}',1,NULL,1,1,1,1,NULL,NULL,0,1,NULL,NULL,NULL),
(2,'','costankingboniphace@gmail.com',NULL,'$2y$10$Y2iVIv.KhVG.TCE3cj4LB.wfVFZKwBiYaQH8g/65Okzu5rbo2FalK',NULL,'2024-06-11 10:18:01','2024-06-11 13:48:17','daniel','boniphace','MC-DB-8635-2024','66687fd12f9d81718124497.jpg','TZ','255765977237',0,0.00000000,'{\"address\":\"no\",\"state\":\"no\",\"zip\":\"no\",\"country\":\"Tanzania\",\"city\":\"dodoma\"}',1,NULL,1,1,1,1,NULL,NULL,0,1,NULL,NULL,NULL),
(3,'','benjaminiathanas@gmail.com',NULL,'$2y$10$Y2iVIv.KhVG.TCE3cj4LB.wfVFZKwBiYaQH8g/65Okzu5rbo2FalK',NULL,'2024-06-11 14:10:55','2024-06-24 19:32:46','Benjamini','ATHANAS','MC-BA-1754-2024',NULL,'TZ','2568907',0,15668900.00000000,'{\"country\":\"Tanzania\",\"address\":\"P.O.BOX 456 DODOMA\",\"state\":\"DODOMA\",\"zip\":\"5688\",\"city\":\"DODOMA\"}',1,NULL,1,1,1,1,'996086','2024-06-11 17:10:57',0,1,NULL,NULL,NULL),
(5,'','bennycive11@gmail.com',NULL,'$2y$10$Y2iVIv.KhVG.TCE3cj4LB.wfVFZKwBiYaQH8g/65Okzu5rbo2FalK',NULL,'2024-06-24 19:51:30','2024-06-26 06:30:33','Joshua','Amos','MC-JA-4274-2024',NULL,'TZ','255684573313',0,21269000.00000000,'{\"address\":\"p.o.box 234 dododma\",\"city\":\"area d\",\"state\":\"DODOMA\",\"zip\":\"34567\",\"country\":\"Tanzania\"}',1,NULL,1,1,1,1,NULL,NULL,0,1,NULL,NULL,NULL),
(11,'','ben@gmail.com',NULL,'$2y$10$Y2iVIv.KhVG.TCE3cj4LB.wfVFZKwBiYaQH8g/65Okzu5rbo2FalK',NULL,'2024-07-09 08:17:43','2024-07-09 09:47:12','Mathew','Antonny','SF-MA-6217-2024',NULL,'TZ','255718561495',0,0.00000000,'{\"address\":\"P.o.box 45\",\"state\":\"Dodoma\",\"zip\":\"45624\",\"country\":\"Tanzania\",\"city\":\"area C\"}',1,NULL,1,1,1,1,NULL,NULL,0,1,NULL,NULL,NULL),
(12,'','bennnycive@gmail.com',NULL,'$2y$10$Y2iVIv.KhVG.TCE3cj4LB.wfVFZKwBiYaQH8g/65Okzu5rbo2FalK',NULL,'2024-07-09 14:25:13','2024-07-19 08:02:02','MUSSA','JOSHUA','SF-MJ-9848-2024',NULL,'TZ','255684573370',0,100000.00000000,'{\"address\":\"P.O.BOX 67\",\"state\":\"DODOMA\",\"zip\":\"67854\",\"country\":\"Tanzania\",\"city\":\"AREA C\"}',1,NULL,1,1,1,1,NULL,NULL,0,1,NULL,NULL,NULL),
(22,'','isayajohn616@gmail.com',NULL,'$2y$10$Y2iVIv.KhVG.TCE3cj4LB.wfVFZKwBiYaQH8g/65Okzu5rbo2FalK',NULL,'2024-07-11 11:28:34','2024-07-11 11:29:46','isaya','kapama','SF-IK-4280-2024',NULL,'TZ','255743871360',0,0.00000000,'{\"country\":\"Tanzania\",\"address\":\"dodoma\",\"state\":\"area c\",\"zip\":\"1234\",\"city\":\"dodoma\"}',1,NULL,1,1,1,1,NULL,NULL,0,1,NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `withdraw_methods`
--

DROP TABLE IF EXISTS `withdraw_methods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `withdraw_methods` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `form_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `min_limit` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `max_limit` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `fixed_charge` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `rate` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `percent_charge` decimal(5,2) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `withdraw_methods`
--

LOCK TABLES `withdraw_methods` WRITE;
/*!40000 ALTER TABLE `withdraw_methods` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `withdraw_methods` VALUES
(1,4,'M-PESA',1000.00000000,10000000.00000000,100.00000000,1.00000000,1.00,'TZ','Confirm the number for withdraw if is valid for M-Pesa',1,'2024-06-11 09:09:36','2024-06-11 09:09:36'),
(2,5,'AIRTEL-MONEY',1000.00000000,10000000.00000000,100.00000000,1.00000000,1.00,'TZ','<span style=\"color: rgb(33, 37, 41);\">Confirm the number for withdraw if is valid for airtel-Money</span><br>',1,'2024-06-11 09:10:15','2024-06-11 09:10:15'),
(3,6,'TIGO-PESA',1000.00000000,10000000.00000000,100.00000000,1.00000000,1.00,'TZ','<span style=\"color: rgb(33, 37, 41);\">Confirm the number for withdraw if is valid for Tigo-Pesa</span><br>',1,'2024-06-11 09:10:45','2024-06-11 09:10:45');
/*!40000 ALTER TABLE `withdraw_methods` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `withdrawals`
--

DROP TABLE IF EXISTS `withdrawals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `withdrawals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `method_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `amount` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `phone_number` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `rate` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `charge` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `trx` varchar(255) DEFAULT NULL,
  `final_amount` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `after_charge` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `withdraw_information` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=>success, 2=>pending, 3=>cancel',
  `admin_feedback` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `withdrawals`
--

LOCK TABLES `withdrawals` WRITE;
/*!40000 ALTER TABLE `withdrawals` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `withdrawals` VALUES
(1,2,1,10000.00000000,NULL,'TZ',1.00000000,200.00000000,'ZNWABJFG9O8U',9800.00000000,9800.00000000,'[]',1,'confirmed','2024-06-11 09:11:49','2024-06-11 09:12:15'),
(2,3,1,50000.00000000,NULL,'TZ',1.00000000,600.00000000,'WDR1NVMKE2VN',49400.00000000,49400.00000000,'[]',1,'nn','2024-06-11 10:37:22','2024-06-11 10:38:15'),
(3,2,1,60000.00000000,NULL,'TZ',1.00000000,700.00000000,'43FV5T66M9H9',59300.00000000,59300.00000000,'[]',1,'bb','2024-06-11 13:51:49','2024-06-11 13:55:49'),
(4,1,1,10000.00000000,'255747696834','TZ',1.00000000,200.00000000,'UQ1X7FQNXGG5',9800.00000000,9800.00000000,'[]',1,'verified','2024-06-12 04:17:03','2024-06-12 04:24:22'),
(5,1,1,400000.00000000,'0747696834','TZ',1.00000000,4100.00000000,'65DZHCO2R24D',395900.00000000,395900.00000000,'[]',1,'b','2024-06-12 05:54:48','2024-06-12 05:55:35');
/*!40000 ALTER TABLE `withdrawals` ENABLE KEYS */;
UNLOCK TABLES;
commit;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- Dump completed on 2026-03-31 13:09:07
