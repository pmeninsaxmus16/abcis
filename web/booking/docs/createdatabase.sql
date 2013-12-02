--
-- Current Database: `booking_db`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `booking_db` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `booking_db`;

--
-- Table structure for table `resource_category`
--

DROP TABLE IF EXISTS `resource_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resource_category` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(85) NOT NULL,
  `description` varchar(150) default NULL,
  `created_date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resource_category`
--

-- LOCK TABLES `resource_category` WRITE;
/*!40000 ALTER TABLE `resource_category` DISABLE KEYS */;
INSERT INTO `resource_category` VALUES (9,'LRC','Includes iMacs, Digital Cameras, Projector, etc.','2012-02-13 20:54:57'),(10,'Locations and Equipment','Includes PAC, Lecture Theatre, Auditorium, Playing Field. etc.','2012-02-13 20:54:57'),(11,'Upper Primary','Includes Smartboards, Laptops, Jubilee Seminar Room, etc.','2012-02-13 20:54:57'),(12,'Science','Includes different rooms from science department.','2012-02-13 20:54:57'),(13,'Language','N/A','2012-02-13 20:54:57');
/*!40000 ALTER TABLE `resource_category` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `resource`
--

DROP TABLE IF EXISTS `resource`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resource` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(85) NOT NULL,
  `description` varchar(150) default NULL,
  `category_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL default '1',
  `time_before_booking` time NOT NULL default '00:00:00',
  `is_active` enum('t','f') NOT NULL default 't',
  `created_date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `timetable_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `category_resource_fkey` (`category_id`),
  CONSTRAINT `category_resource_fkey` FOREIGN KEY (`category_id`) REFERENCES `resource_category` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resource`
--

-- LOCK TABLES `resource` WRITE;
/*!40000 ALTER TABLE `resource` DISABLE KEYS */;
INSERT INTO `resource` VALUES (4,'Playing Field',NULL,10,3,'00:00:00','t','2012-02-13 21:22:31',1),(5,'Room 47',NULL,10,2,'00:00:00','t','2012-02-13 21:22:31',1),(36,'Jubilee Seminar Room',NULL,11,1,'00:00:00','t','2012-02-13 21:22:31',1),(37,'Science Lab UP',NULL,11,1,'00:00:00','t','2012-02-13 21:22:31',1),(38,'Laptops (Science Senior School)',NULL,12,23,'00:00:00','t','2012-02-13 21:22:31',1),(39,'Room 58',NULL,12,1,'00:00:00','t','2012-02-13 21:22:31',1),(40,'Room 58a',NULL,12,29,'00:00:00','t','2012-02-13 21:22:31',1),(41,'Room 59',NULL,12,1,'00:00:00','t','2012-02-13 21:22:31',1),(42,'Room 59a',NULL,12,1,'00:00:00','t','2012-02-13 21:22:31',1),(43,'Room 62',NULL,12,1,'00:00:00','t','2012-02-13 21:22:31',1),(44,'Room 63',NULL,12,1,'00:00:00','t','2012-02-13 21:22:31',1),(45,'Room 64',NULL,12,1,'00:00:00','t','2012-02-13 21:22:31',1),(46,'Room 65',NULL,12,1,'00:00:00','t','2012-02-13 21:22:31',1),(50,'Sound and Lights Support',NULL,10,1,'00:00:00','t','2012-02-13 21:22:31',1),(51,'Sound System (Mobile)',NULL,10,1,'00:00:00','t','2012-02-13 21:22:31',1),(52,'Laptops (Languages Senior School)',NULL,13,24,'00:00:00','t','2012-02-13 21:22:31',1),(53,'lactocs',NULL,10,20,'08:00:00','t','2012-06-13 18:50:48',3),(56,'Fans',NULL,10,24,'04:00:00','t','2012-06-13 19:08:33',3);
/*!40000 ALTER TABLE `resource` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `section`
--

DROP TABLE IF EXISTS `section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `section` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(85) NOT NULL,
  `description` varchar(150) default NULL,
  `created_date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `section`
--

-- LOCK TABLES `section` WRITE;
/*!40000 ALTER TABLE `section` DISABLE KEYS */;
INSERT INTO `section` VALUES (1,'Lower Primary',NULL,'2012-02-03 17:05:38'),(2,'Upper Primary',NULL,'2012-02-03 17:05:38'),(3,'Secondary',NULL,'2012-02-03 17:05:38'),(4,'Administration',NULL,'2012-02-03 17:05:38'),(5,'General',NULL,'2012-02-03 17:05:38');
/*!40000 ALTER TABLE `section` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(85) NOT NULL,
  `description` varchar(150) default NULL,
  `section_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`),
  KEY `section_fkey` (`section_id`),
  CONSTRAINT `section_fkey` FOREIGN KEY (`section_id`) REFERENCES `section` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room`
--

-- LOCK TABLES `room` WRITE;
/*!40000 ALTER TABLE `room` DISABLE KEYS */;
INSERT INTO `room` VALUES (1,'PAC','General',5,'2012-02-06 14:23:33'),(2,'Lecture Theatre','General',5,'2012-02-06 14:23:33'),(3,'Playing Field','General',5,'2012-02-06 14:23:33'),(4,'Emergency Car Park','General',5,'2012-02-06 14:23:33'),(5,'Room 47','Secondary',3,'2012-02-06 14:23:33'),(6,'LRC','General',5,'2012-02-06 14:23:33'),(7,'Jubilee Seminar Room','Upper Primary',2,'2012-02-06 14:23:33'),(8,'Science Lab UP','Upper Primary',2,'2012-02-06 14:23:33'),(9,'Room 1','Lower Primary',1,'2012-02-06 14:23:33'),(10,'Room 2','Lower Primary',1,'2012-02-06 14:23:33'),(11,'Room 3','Lower Primary',1,'2012-02-06 14:23:33'),(12,'Room 4','Lower Primary',1,'2012-02-06 14:23:33'),(13,'Room 5','Lower Primary',1,'2012-02-06 14:23:33'),(14,'Room 6','Lower Primary',1,'2012-02-06 14:23:33'),(15,'Room 8','Lower Primary',1,'2012-02-06 14:23:33'),(16,'Room 9','Lower Primary',1,'2012-02-06 14:23:33'),(17,'Room 10','Lower Primary',1,'2012-02-06 14:23:33'),(18,'Room 11','Lower Primary',1,'2012-02-06 14:23:33'),(19,'Room 12','Lower Primary',1,'2012-02-06 14:23:33'),(20,'Room 13','Lower Primary',1,'2012-02-06 14:23:33'),(21,'Room 14','Lower Primary',1,'2012-02-06 14:23:33'),(22,'Room 15','Lower Primary',1,'2012-02-06 14:23:33'),(23,'Room 16','Lower Primary',1,'2012-02-06 14:23:33'),(24,'Room 7','Lower Primary',1,'2012-02-06 14:23:33'),(25,'Room 17 / Sala Cuna','Lower Primary',1,'2012-02-06 14:23:33'),(26,'Room 21','Upper Primary',2,'2012-02-06 14:23:33'),(27,'Room 22','Upper Primary',2,'2012-02-06 14:23:33'),(28,'Room 23','Upper Primary',2,'2012-02-06 14:23:33'),(29,'Room 24','Upper Primary',2,'2012-02-06 14:23:33'),(30,'Room 25','Upper Primary',2,'2012-02-06 14:23:33'),(31,'Room 26','Upper Primary',2,'2012-02-06 14:23:33'),(32,'Room 27','Upper Primary',2,'2012-02-06 14:23:33'),(33,'Room 28','Upper Primary',2,'2012-02-06 14:23:33'),(34,'Room 29','Upper Primary',2,'2012-02-06 14:23:33'),(35,'Room 30','Upper Primary',2,'2012-02-06 14:23:33'),(36,'Room 31','Upper Primary',2,'2012-02-06 14:23:33'),(37,'Room 32','Upper Primary',2,'2012-02-06 14:23:33'),(38,'Room 33','Upper Primary',2,'2012-02-06 14:23:33'),(39,'Room 34','Upper Primary',2,'2012-02-06 14:23:33'),(40,'Room 35','Upper Primary',2,'2012-02-06 14:23:33'),(41,'Room 36','Upper Primary',2,'2012-02-06 14:23:33'),(42,'Room 37','Upper Primary',2,'2012-02-06 14:23:33'),(43,'Room 38','Upper Primary',2,'2012-02-06 14:23:33'),(44,'Room 39','Upper Primary',2,'2012-02-06 14:23:33'),(45,'ICT Lab','Upper Primary',2,'2012-02-06 14:23:33'),(46,'LSU Office','Upper Primary',2,'2012-02-06 14:23:33'),(47,'Oficina de Espa','Upper Primary',2,'2012-02-06 14:23:33'),(48,'Room 41','Secondary',3,'2012-02-06 14:23:33'),(49,'Room 40','Secondary',3,'2012-02-06 14:23:33'),(50,'Room 42','Secondary',3,'2012-02-06 14:23:33'),(51,'Room 43','Upper Primary',2,'2012-02-06 14:23:33'),(52,'Room 44','Secondary',3,'2012-02-06 14:23:33'),(53,'Room 45','Secondary',3,'2012-02-06 14:23:33'),(54,'Room 46','Secondary',3,'2012-02-06 14:23:33'),(55,'Room 48','Secondary',3,'2012-02-06 14:23:33'),(56,'Room 49','Secondary',3,'2012-02-06 14:23:33'),(57,'Room 50','Secondary',3,'2012-02-06 14:23:33'),(58,'Room 51','Secondary',3,'2012-02-06 14:23:33'),(59,'Room 52','Secondary',3,'2012-02-06 14:23:33'),(60,'Room 54','Secondary',3,'2012-02-06 14:23:33'),(61,'Room 55','Secondary',3,'2012-02-06 14:23:33'),(62,'Room 56','Secondary',3,'2012-02-06 14:23:33'),(63,'Room 57','Secondary',3,'2012-02-06 14:23:33'),(64,'Room 58','Secondary',3,'2012-02-06 14:23:33'),(65,'Room 59','Secondary',3,'2012-02-06 14:23:33'),(66,'Room 60','Secondary',3,'2012-02-06 14:23:33'),(67,'Room 61','Secondary',3,'2012-02-06 14:23:33'),(68,'Room 62','Secondary',3,'2012-02-06 14:23:33'),(69,'Room 63','Secondary',3,'2012-02-06 14:23:33'),(70,'Room 64','Secondary',3,'2012-02-06 14:23:33'),(71,'Room 65','Secondary',3,'2012-02-06 14:23:33'),(72,'Room 66','Secondary',3,'2012-02-06 14:23:33'),(73,'Room 67','Secondary',3,'2012-02-06 14:23:33'),(74,'Room 68','Secondary',3,'2012-02-06 14:23:33'),(75,'Room 69','Secondary',3,'2012-02-06 14:23:33'),(76,'Room 70','Secondary',3,'2012-02-06 14:23:33'),(77,'Room 71','Secondary',3,'2012-02-06 14:23:33'),(78,'Room 72','Secondary',3,'2012-02-06 14:23:33'),(79,'Room 56a','Secondary',3,'2012-02-06 14:23:33'),(80,'Room 57a','Secondary',3,'2012-02-06 14:23:33'),(81,'Room 58a','Secondary',3,'2012-02-06 14:23:33'),(82,'Room 59a','Secondary',3,'2012-02-06 14:23:33'),(83,'Room 53','Secondary',3,'2012-02-06 14:23:33'),(84,'Auditorium','General',5,'2012-02-06 14:23:33');
/*!40000 ALTER TABLE `room` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `timetableheader`
--

DROP TABLE IF EXISTS `timetableheader`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `timetableheader` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(85) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `timetableheader`
--

-- LOCK TABLES `timetableheader` WRITE;
/*!40000 ALTER TABLE `timetableheader` DISABLE KEYS */;
INSERT INTO `timetableheader` VALUES (1,'Bell Times','0000-00-00 00:00:00'),(3,'24/7 Schedule','2012-06-13 09:20:53');
/*!40000 ALTER TABLE `timetableheader` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `timetable`
--

DROP TABLE IF EXISTS `timetable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `timetable` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(85) NOT NULL,
  `nickname` varchar(35) NOT NULL,
  `description` varchar(150) default NULL,
  `header_id` int(11) NOT NULL,
  `start_time` time NOT NULL default '00:00:00',
  `end_time` time NOT NULL default '00:00:00',
  `created_date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`),
  KEY `timetableheader_fkey` (`header_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `timetable`
--

-- LOCK TABLES `timetable` WRITE;
/*!40000 ALTER TABLE `timetable` DISABLE KEYS */;
INSERT INTO `timetable` VALUES (1,'Registration','R',NULL,1,'07:00:00','07:17:00','2012-05-28 20:16:01'),(2,'Period 1','P1',NULL,1,'07:20:00','08:05:00','2012-05-28 20:16:01'),(3,'Period 2','P2',NULL,1,'08:08:00','08:53:00','2012-05-28 20:16:01'),(4,'Period 3','P3',NULL,1,'08:56:00','09:40:00','2012-05-28 20:16:01'),(5,'Period 4','P4',NULL,1,'10:00:00','10:45:00','2012-05-28 20:16:01'),(6,'Period 5','P5',NULL,1,'10:48:00','11:30:00','2012-05-28 20:16:01'),(7,'Lunch','L',NULL,1,'11:33:00','12:14:00','2012-05-28 20:16:01'),(8,'Period 6','P6',NULL,1,'12:17:00','13:02:00','2012-05-28 20:16:01'),(9,'Period 7','P7',NULL,1,'13:05:00','13:50:00','2012-05-28 20:16:01'),(10,'Extra Curricular / Team Sports','EC/TS',NULL,1,'14:00:00','15:00:00','2012-05-28 20:16:01'),(11,'After School','AS1',NULL,1,'15:00:00','15:30:00','2012-05-28 20:16:01'),(12,'After School','AS2',NULL,1,'15:30:00','16:00:00','2012-05-28 20:16:01'),(13,'After School','AS3',NULL,1,'16:00:00','16:30:00','2012-05-28 20:16:01'),(14,'After School','AS4',NULL,1,'16:30:00','17:00:00','2012-05-28 20:16:01'),(15,'After School','AS5',NULL,1,'17:00:00','17:30:00','2012-05-28 20:16:01'),(16,'After School','AS6',NULL,1,'17:30:00','18:00:00','2012-05-28 20:16:01'),(17,'After School','AS7',NULL,1,'18:00:00','18:30:00','2012-05-28 20:16:01'),(18,'After School','AS8',NULL,1,'18:30:00','19:00:00','2012-05-28 20:16:01'),(19,'After School','AS9',NULL,1,'19:00:00','19:30:00','2012-05-28 20:16:01'),(20,'After School','AS10',NULL,1,'19:30:00','20:00:00','2012-05-28 20:16:01'),(21,'After School','AS11',NULL,1,'20:00:00','21:00:00','2012-05-28 20:16:01'),(22,'After School','AS12',NULL,1,'21:00:00','22:00:00','2012-05-28 20:16:01'),(23,'After School','AS13',NULL,1,'22:00:00','23:00:00','2012-05-28 20:16:01'),(24,'After School','AS14',NULL,1,'23:00:00','23:59:00','2012-05-28 20:16:01'),(25,'Break','B',NULL,1,'09:41:00','09:57:00','2012-05-28 20:16:01');
/*!40000 ALTER TABLE `timetable` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `bookingheader`
--

DROP TABLE IF EXISTS `bookingheader`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bookingheader` (
  `id` int(11) NOT NULL auto_increment,
  `subject` varchar(85) NOT NULL,
  `location` int(11) NOT NULL default '-1',
  `description` varchar(150) default NULL,
  `owner` varchar(8) NOT NULL,
  `is_active` enum('t','f') NOT NULL default 't',
  `ip` varchar(15) NOT NULL,
  `created_date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookingheader`
--

-- LOCK TABLES `bookingheader` WRITE;
/*!40000 ALTER TABLE `bookingheader` DISABLE KEYS */;
INSERT INTO `bookingheader` VALUES (1,'Test Booking',2,'This is a test booking','DM010107','t','172.16.255.3','2012-07-02 15:22:21'),(2,'Testing my booking',38,'Testing my booking','MD010107','t','172.16.255.3','2012-07-11 15:34:00'),(3,'Testing my booking',38,'Testing my booking','MD010107','t','172.16.255.3','2012-07-11 15:39:55'),(4,'Testing my booking',38,'Testing my booking','MD010107','t','172.16.255.3','2012-07-11 15:56:37'),(5,'Testing my booking',38,'Testing my booking','MD010107','t','172.16.255.3','2012-07-11 15:57:53'),(6,'Testing my booking',38,'Testing my booking','MD010107','t','172.16.255.3','2012-07-11 15:59:02'),(7,'fjkasdfkljeior',38,'fjkasdfkljeior','MD010107','t','172.16.255.3','2012-07-11 16:02:17'),(8,'testing my booking',44,'testing my booking','MD010107','t','172.16.255.3','2012-07-11 16:03:54'),(9,'Evento repetido los jueves',44,'Evento repetido los jueves','MD010107','t','172.16.255.3','2012-07-11 16:25:44'),(10,'Jueves y Viernes',39,'Jueves y Viernes','MD010107','t','172.16.255.3','2012-07-11 16:28:17'),(11,'dfasdfsd',39,'dfasdfsd','MD010107','t','172.16.255.3','2012-07-11 16:33:01'),(12,'dfasdfsd',39,'dfasdfsd','MD010107','t','172.16.255.3','2012-07-11 16:45:40'),(13,'tertyuyjgh',39,'tertyuyjgh','MD010107','t','172.16.255.3','2012-07-11 16:48:20'),(14,'ukuyikjkjh',39,'ukuyikjkjh','MD010107','t','172.16.255.3','2012-07-11 16:52:03'),(15,'uiuyiuyiuy',39,'uiuyiuyiuy','MD010107','t','172.16.255.3','2012-07-11 16:52:20'),(16,'jopupoikl',39,'jopupoikl','MD010107','t','172.16.255.3','2012-07-11 16:53:19'),(17,'tuesday and friday',44,'tuesday and friday','MD010107','t','172.16.255.3','2012-07-11 16:56:56'),(18,'overlap',44,'overlap','MD010107','t','172.16.255.3','2012-07-11 17:12:31'),(19,'repeticion',3,'repeticion','MD010107','t','172.16.255.3','2012-07-11 18:03:37'),(20,'repeticion',3,'repeticion','MD010107','t','172.16.255.3','2012-07-11 20:11:56'),(21,'all days',3,'all days','MD010107','t','172.16.255.3','2012-07-11 20:29:43'),(22,'all days',3,'all days','MD010107','t','172.16.255.3','2012-07-11 20:30:12'),(23,'all days',3,'all days','MD010107','t','172.16.255.3','2012-07-11 20:30:29'),(24,'evento diario',3,'evento diario','MD010107','t','172.16.255.3','2012-07-11 20:33:33'),(25,'prueba 4rkrf',38,'prueba 4rkrf','MD010107','t','172.16.255.3','2012-07-11 20:34:41'),(26,'fernando',38,'fernando','MD010107','t','172.16.255.3','2012-07-12 16:35:55'),(27,'titulo',38,'titulo','MD010107','t','172.16.255.3','2012-07-12 17:05:44'),(28,'gilbert',3,'gilbert','MD010107','t','172.16.255.3','2012-07-12 17:28:14');
/*!40000 ALTER TABLE `bookingheader` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `bookingevents`
--

DROP TABLE IF EXISTS `bookingevents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bookingevents` (
  `id` int(11) NOT NULL auto_increment,
  `booking_id` int(11) NOT NULL,
  `resource_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL default '1',
  `start_time` time NOT NULL default '00:00:00',
  `end_time` time NOT NULL default '00:00:00',
  `bdate` date NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `bookingheader_fkey` (`booking_id`),
  KEY `bookingresource_fkey` (`resource_id`),
  CONSTRAINT `bookingheader_fkey` FOREIGN KEY (`booking_id`) REFERENCES `bookingheader` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `bookingresource_fkey` FOREIGN KEY (`resource_id`) REFERENCES `resource` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=191 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookingevents`
--

-- LOCK TABLES `bookingevents` WRITE;
/*!40000 ALTER TABLE `bookingevents` DISABLE KEYS */;
INSERT INTO `bookingevents` VALUES (97,1,5,5,'10:00:00','12:00:00','2012-07-04'),(98,1,5,5,'10:00:00','12:00:00','2012-07-11'),(99,1,5,5,'10:00:00','12:00:00','2012-07-18'),(100,1,5,5,'10:00:00','12:00:00','2012-07-25'),(101,1,5,5,'10:00:00','12:00:00','2012-07-27'),(102,1,5,1,'12:01:00','13:00:00','2012-07-27'),(103,1,5,1,'12:17:00','13:00:00','2012-07-28'),(104,8,53,1,'13:00:00','15:30:00','2012-07-11'),(105,9,53,1,'08:00:00','10:00:00','2012-07-12'),(106,9,53,1,'08:00:00','10:00:00','2012-07-19'),(107,9,53,1,'08:00:00','10:00:00','2012-07-26'),(108,10,53,1,'10:30:00','11:15:00','2012-07-12'),(109,16,53,1,'08:00:00','10:30:00','2012-07-09'),(110,16,53,1,'08:00:00','10:30:00','2012-07-16'),(111,16,53,1,'08:00:00','10:30:00','2012-07-23'),(112,17,53,1,'08:30:00','08:45:00','2012-07-24'),(113,17,53,1,'08:30:00','08:45:00','2012-07-31'),(114,17,53,1,'08:30:00','08:45:00','2012-08-07'),(115,17,53,1,'08:30:00','08:45:00','2012-07-27'),(116,17,53,1,'08:30:00','08:45:00','2012-08-03'),(117,17,53,1,'08:30:00','08:45:00','2012-08-10'),(118,18,53,1,'09:00:00','11:15:00','2012-07-23'),(119,18,53,1,'09:00:00','11:15:00','2012-07-30'),(120,18,53,1,'09:00:00','11:15:00','2012-08-06'),(121,18,53,1,'09:00:00','11:15:00','2012-07-24'),(122,18,53,1,'09:00:00','11:15:00','2012-07-31'),(123,18,53,1,'09:00:00','11:15:00','2012-08-07'),(124,18,53,1,'09:00:00','11:15:00','2012-07-27'),(125,18,53,1,'09:00:00','11:15:00','2012-08-03'),(126,18,53,1,'09:00:00','11:15:00','2012-08-10'),(127,23,56,1,'10:45:00','12:45:00','2012-07-09'),(128,23,56,1,'10:45:00','12:45:00','2012-07-16'),(129,23,56,1,'10:45:00','12:45:00','2012-07-23'),(130,23,56,1,'10:45:00','12:45:00','2012-07-30'),(131,23,56,1,'10:45:00','12:45:00','2012-07-10'),(132,23,56,1,'10:45:00','12:45:00','2012-07-17'),(133,23,56,1,'10:45:00','12:45:00','2012-07-24'),(134,23,56,1,'10:45:00','12:45:00','2012-07-31'),(135,23,56,1,'10:45:00','12:45:00','2012-07-11'),(136,23,56,1,'10:45:00','12:45:00','2012-07-18'),(137,23,56,1,'10:45:00','12:45:00','2012-07-25'),(138,23,56,1,'10:45:00','12:45:00','2012-07-12'),(139,23,56,1,'10:45:00','12:45:00','2012-07-19'),(140,23,56,1,'10:45:00','12:45:00','2012-07-26'),(141,23,56,1,'10:45:00','12:45:00','2012-07-13'),(142,23,56,1,'10:45:00','12:45:00','2012-07-20'),(143,23,56,1,'10:45:00','12:45:00','2012-07-27'),(144,24,56,1,'08:00:00','08:45:00','2012-08-13'),(145,24,56,1,'08:00:00','08:45:00','2012-08-14'),(146,24,56,1,'08:00:00','08:45:00','2012-08-15'),(147,24,56,1,'08:00:00','08:45:00','2012-08-16'),(148,24,56,1,'08:00:00','08:45:00','2012-08-17'),(149,24,56,1,'08:00:00','08:45:00','2012-08-18'),(150,24,56,1,'08:00:00','08:45:00','2012-08-19'),(151,24,56,1,'08:00:00','08:45:00','2012-08-20'),(152,24,56,1,'08:00:00','08:45:00','2012-08-21'),(153,24,56,1,'08:00:00','08:45:00','2012-08-22'),(154,24,56,1,'08:00:00','08:45:00','2012-08-23'),(155,24,56,1,'08:00:00','08:45:00','2012-08-24'),(156,24,56,1,'08:00:00','08:45:00','2012-08-25'),(157,24,56,1,'08:00:00','08:45:00','2012-08-26'),(158,24,56,1,'08:00:00','08:45:00','2012-08-27'),(159,24,56,1,'08:00:00','08:45:00','2012-08-28'),(160,24,56,1,'08:00:00','08:45:00','2012-08-29'),(161,24,56,1,'08:00:00','08:45:00','2012-08-30'),(162,25,53,1,'08:00:00','09:30:00','2012-09-03'),(163,25,53,1,'08:00:00','09:30:00','2012-09-10'),(164,25,53,1,'08:00:00','09:30:00','2012-09-17'),(165,25,53,1,'08:00:00','09:30:00','2012-09-24'),(166,25,53,1,'08:00:00','09:30:00','2012-10-01'),(167,25,53,1,'08:00:00','09:30:00','2012-09-05'),(168,25,53,1,'08:00:00','09:30:00','2012-09-12'),(169,25,53,1,'08:00:00','09:30:00','2012-09-19'),(170,25,53,1,'08:00:00','09:30:00','2012-09-26'),(171,25,53,1,'08:00:00','09:30:00','2012-10-03'),(172,25,53,1,'08:00:00','09:30:00','2012-09-07'),(173,25,53,1,'08:00:00','09:30:00','2012-09-14'),(174,25,53,1,'08:00:00','09:30:00','2012-09-21'),(175,25,53,1,'08:00:00','09:30:00','2012-09-28'),(176,25,53,1,'08:00:00','09:30:00','2012-10-05'),(177,26,53,1,'07:00:00','10:00:00','2012-07-14'),(178,27,53,1,'10:12:00','10:12:00','2012-08-14'),(179,27,53,1,'10:12:00','10:12:00','2012-08-21'),(180,27,53,1,'10:12:00','10:12:00','2012-08-15'),(181,27,53,1,'10:12:00','10:12:00','2012-08-22'),(182,27,53,1,'10:12:00','10:12:00','2012-08-16'),(183,27,53,1,'10:12:00','10:12:00','2012-08-23'),(184,27,56,1,'10:12:00','10:12:00','2012-08-14'),(185,27,56,1,'10:12:00','10:12:00','2012-08-21'),(186,27,56,1,'10:12:00','10:12:00','2012-08-15'),(187,27,56,1,'10:12:00','10:12:00','2012-08-22'),(188,27,56,1,'10:12:00','10:12:00','2012-08-16'),(189,27,56,1,'10:12:00','10:12:00','2012-08-23'),(190,28,56,1,'06:15:00','08:00:00','2012-07-17');
/*!40000 ALTER TABLE `bookingevents` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `link_resource_admin`
--

DROP TABLE IF EXISTS `link_resource_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `link_resource_admin` (
  `id` int(11) NOT NULL auto_increment,
  `resource_id` int(11) NOT NULL,
  `owner` varchar(8) NOT NULL,
  `created_date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`),
  KEY `lnk_resource_room_fkey` (`resource_id`),
  CONSTRAINT `lnk_resource_room_fkey` FOREIGN KEY (`resource_id`) REFERENCES `resource` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `link_resource_admin`
--

-- LOCK TABLES `link_resource_admin` WRITE;
/*!40000 ALTER TABLE `link_resource_admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `link_resource_admin` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `link_resource_room`
--

DROP TABLE IF EXISTS `link_resource_room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `link_resource_room` (
  `id` int(11) NOT NULL auto_increment,
  `resource_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`),
  KEY `lnk_resource_fkey` (`resource_id`),
  KEY `lnk_room_fkey` (`room_id`),
  CONSTRAINT `lnk_resource_fkey` FOREIGN KEY (`resource_id`) REFERENCES `resource` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `lnk_room_fkey` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `link_resource_room`
--

-- LOCK TABLES `link_resource_room` WRITE;
/*!40000 ALTER TABLE `link_resource_room` DISABLE KEYS */;
INSERT INTO `link_resource_room` VALUES (9,38,79,'2012-06-14 18:14:44'),(10,38,67,'2012-06-14 18:14:44'),(11,56,3,'2012-06-14 18:16:12'),(12,53,33,'2012-06-15 02:03:30'),(13,53,38,'2012-06-15 02:03:30'),(14,53,39,'2012-06-15 02:03:30'),(15,53,44,'2012-06-15 02:03:30');
/*!40000 ALTER TABLE `link_resource_room` ENABLE KEYS */;
-- UNLOCK TABLES;
