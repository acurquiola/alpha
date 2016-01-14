-- MySQL dump 10.14  Distrib 5.5.44-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: saar
-- ------------------------------------------------------
-- Server version	5.5.44-MariaDB

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
-- Table structure for table `aeronaves`
--

DROP TABLE IF EXISTS `aeronaves`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aeronaves` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `matricula` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nacionalidad_id` int(10) unsigned NOT NULL,
  `tipo_id` int(10) unsigned NOT NULL,
  `modelo_id` int(10) unsigned NOT NULL,
  `peso` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cliente_id` int(10) unsigned DEFAULT NULL,
  `hangar_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `aeronaves_nacionalidad_id_foreign` (`nacionalidad_id`),
  KEY `aeronaves_tipo_id_foreign` (`tipo_id`),
  KEY `aeronaves_modelo_id_foreign` (`modelo_id`),
  KEY `aeronaves_cliente_id_foreign` (`cliente_id`),
  KEY `aeronaves_hangar_id_foreign` (`hangar_id`),
  CONSTRAINT `aeronaves_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  CONSTRAINT `aeronaves_hangar_id_foreign` FOREIGN KEY (`hangar_id`) REFERENCES `hangars` (`id`),
  CONSTRAINT `aeronaves_modelo_id_foreign` FOREIGN KEY (`modelo_id`) REFERENCES `modelo_aeronaves` (`id`),
  CONSTRAINT `aeronaves_nacionalidad_id_foreign` FOREIGN KEY (`nacionalidad_id`) REFERENCES `nacionalidad_matriculas` (`id`),
  CONSTRAINT `aeronaves_tipo_id_foreign` FOREIGN KEY (`tipo_id`) REFERENCES `tipo_matriculas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aeronaves`
--

LOCK TABLES `aeronaves` WRITE;
/*!40000 ALTER TABLE `aeronaves` DISABLE KEYS */;
INSERT INTO `aeronaves` VALUES (2,'YV-1381',246,3,71,'55000',124,NULL,'2015-09-09 03:44:47','2015-09-09 03:44:47'),(3,'YV-380T',246,3,71,'53000',124,NULL,'2015-09-09 03:45:36','2015-09-09 03:45:36'),(4,'YV-390T',246,3,71,'53000',124,NULL,'2015-09-09 03:46:26','2015-12-08 03:50:41'),(5,'YV-137T',246,3,233,'54488',13,NULL,'2015-09-11 17:55:38','2015-09-11 17:55:38'),(6,'YV-2992',246,3,362,'64000',13,NULL,'2015-09-11 17:56:35','2015-09-11 17:56:35'),(7,'YV-505T',246,3,362,'61009',13,NULL,'2015-09-11 17:57:45','2015-09-11 17:57:45'),(8,'YV-2957',246,3,362,'61009',13,NULL,'2015-09-11 17:58:50','2015-09-11 17:58:50'),(9,'YV-539T',246,3,363,'72000',40,NULL,'2015-09-11 18:18:29','2015-09-11 18:18:29'),(10,'YV-481T',246,3,363,'72576',40,NULL,'2015-09-11 18:21:07','2015-09-11 18:21:07'),(11,'YV-485T',246,3,363,'72576',40,NULL,'2015-09-11 18:22:16','2015-09-11 18:22:16'),(12,'YV-348T',246,3,361,'67813',40,NULL,'2015-09-11 19:04:54','2015-09-11 19:04:54'),(13,'YV-494T',246,3,362,'66679',40,NULL,'2015-09-11 19:09:08','2015-09-11 19:09:08'),(14,'YV-3024',246,3,363,'72000',40,NULL,'2015-09-11 19:10:02','2015-09-11 19:10:02'),(15,'YV-2990',246,3,363,'72000',40,NULL,'2015-09-11 19:10:47','2015-09-11 19:10:47'),(16,'YV-2971',246,3,363,'64000',40,NULL,'2015-09-11 19:11:41','2015-09-11 19:11:41'),(17,'YV-153T',246,3,362,'64000',40,NULL,'2015-09-11 19:13:27','2015-09-11 19:13:27'),(18,'YV-2754',246,3,362,'67813',40,NULL,'2015-09-11 19:17:58','2015-09-11 19:17:58'),(19,'YV-2749',246,3,361,'67813',40,NULL,'2015-09-11 19:19:47','2015-09-11 19:19:47'),(20,'YV-1019',246,2,313,'5000',139,28,'2015-09-12 01:28:09','2015-09-12 01:28:09'),(21,'YV-1116',246,2,313,'5000',139,28,'2015-09-12 01:31:50','2015-09-12 01:31:50'),(22,'N-429PL',89,1,102,'6000',68,2,'2015-09-12 01:34:22','2015-09-12 01:34:22'),(23,'N-16LJ',89,1,328,'10000',130,NULL,'2015-09-12 01:36:50','2015-09-12 01:36:50'),(24,'YV-1024',246,2,122,'1000',125,38,'2015-09-12 01:39:39','2015-09-12 01:39:40'),(25,'YV-2021',246,1,440,'6000',24,NULL,'2015-09-12 01:41:08','2016-01-14 20:35:12'),(26,'YV-2456',246,2,313,'5000',139,NULL,'2015-09-12 01:42:07','2015-09-12 01:42:07'),(27,'YV-2272',246,2,313,'5000',139,28,'2015-09-12 01:42:55','2015-09-12 01:42:55'),(28,'YV-2536',246,2,313,'5000',139,28,'2015-09-12 01:44:27','2015-09-12 01:44:27'),(29,'YV-1007',246,3,74,'57000',63,NULL,'2015-09-15 02:07:16','2015-09-15 02:07:16'),(30,'YV-2556',246,3,74,'57000',63,NULL,'2015-09-15 02:08:00','2015-09-15 02:08:00'),(31,'YV-2558',246,3,71,'53000',63,NULL,'2015-09-15 02:08:51','2015-09-15 02:08:51'),(32,'YV-2559',246,3,71,'53000',63,NULL,'2015-09-15 02:09:47','2015-09-15 02:09:47'),(33,'YV-1111',246,3,200,'21000',63,NULL,'2015-09-15 02:11:01','2015-09-15 02:11:01'),(34,'YV-1115',246,3,200,'21000',63,NULL,'2015-09-15 02:11:37','2015-09-15 02:11:37'),(35,'YV-2088',246,3,200,'21000',63,NULL,'2015-09-15 02:12:33','2015-09-15 02:12:33'),(36,'YV-2115',246,3,200,'21000',63,NULL,'2015-09-15 02:16:25','2015-09-15 02:16:25'),(37,'YV-2849',246,3,253,'51800',63,NULL,'2015-09-15 02:21:23','2015-09-15 02:21:23'),(38,'YV-2850',246,3,253,'51800',63,NULL,'2015-09-15 02:22:54','2015-09-15 02:22:54'),(39,'YV-2851',246,3,253,'51800',63,NULL,'2015-09-15 02:28:22','2015-09-15 02:28:22'),(40,'YV-2911',246,3,253,'51800',63,NULL,'2015-09-15 02:29:02','2015-09-15 02:29:02'),(41,'YV-2912',246,3,253,'51800',63,NULL,'2015-09-15 02:30:17','2015-09-15 02:30:17'),(42,'YV-2913',246,3,253,'51800',63,NULL,'2015-09-15 02:50:03','2015-09-15 02:50:03'),(43,'YV-2943',246,3,253,'51800',63,NULL,'2015-09-15 02:51:03','2015-09-15 02:51:03'),(44,'YV-2944',246,3,253,'51800',63,NULL,'2015-09-15 02:52:03','2015-09-15 02:52:03'),(45,'YV-2953',246,3,253,'51800',63,NULL,'2015-09-15 02:52:36','2015-09-15 02:52:36'),(46,'YV-2954',246,3,253,'51800',63,NULL,'2015-09-15 02:53:35','2015-09-15 02:53:35'),(47,'YV-2964',246,3,253,'51800',63,NULL,'2015-09-15 02:54:16','2015-09-15 02:54:16'),(48,'YV-2965',246,3,253,'51800',63,NULL,'2015-09-15 02:55:00','2015-09-15 02:55:00'),(49,'YV-2966',246,3,253,'51800',63,NULL,'2015-09-15 02:55:49','2015-09-15 02:55:49'),(50,'YV-3052',246,3,253,'51800',63,NULL,'2015-09-15 02:56:27','2015-09-15 02:56:27'),(51,'YV-3071',246,3,253,'51800',63,NULL,'2015-09-15 02:56:58','2015-09-15 02:56:58'),(52,'YV-1234',246,4,327,'9752',NULL,NULL,'2015-12-08 03:52:12','2015-12-08 03:52:12'),(53,'YV-1223',246,1,130,'1000',101,13,'2016-01-08 00:41:56','2016-01-09 05:25:45'),(54,'YV-3097',246,3,362,'64000',13,NULL,'2016-01-08 02:20:00','2016-01-08 02:20:00'),(55,'YV-2903',246,1,153,'2000',54,5,'2016-01-08 02:55:22','2016-01-08 02:55:22'),(56,'YV-3088',246,1,404,'2000',150,NULL,'2016-01-08 03:12:06','2016-01-08 03:12:06'),(57,'YV-1942',246,2,153,'2000',139,NULL,'2016-01-08 07:52:16','2016-01-08 07:55:07'),(58,'YV-2811',246,2,157,'2000',139,NULL,'2016-01-08 08:03:30','2016-01-08 08:03:31'),(59,'YV-3116',246,1,324,'7000',106,44,'2016-01-09 01:27:27','2016-01-09 01:27:27'),(60,'YV-1419',246,1,156,'5000',128,NULL,'2016-01-09 01:40:25','2016-01-09 01:40:25'),(61,'N-496RA',89,1,185,'9700',153,NULL,'2016-01-09 01:57:58','2016-01-09 01:57:58'),(62,'YV-2078',246,1,102,'6000',154,NULL,'2016-01-09 02:29:23','2016-01-09 02:29:23'),(63,'YV-3067',246,1,171,'4000',155,NULL,'2016-01-09 02:42:12','2016-01-09 02:42:12'),(64,'YV-2554',246,1,153,'2000',156,NULL,'2016-01-09 03:46:53','2016-01-09 03:46:53'),(65,'YV-1269',246,1,151,'2000',157,NULL,'2016-01-09 04:39:14','2016-01-09 04:39:14'),(66,'YV-1465',246,1,118,'5000',158,NULL,'2016-01-09 04:54:45','2016-01-09 04:54:45'),(67,'N-56LP',89,1,182,'9000',148,NULL,'2016-01-10 19:56:58','2016-01-10 19:56:58'),(68,'YV-3070',246,1,153,'2000',156,NULL,'2016-01-10 20:22:21','2016-01-10 20:22:21'),(69,'YV-2751',246,1,153,'2000',156,NULL,'2016-01-10 20:28:03','2016-01-10 20:28:03'),(70,'YV-1203',246,1,112,'3000',58,NULL,'2016-01-10 20:34:07','2016-01-10 20:34:07'),(71,'YV-2970',246,2,156,'5000',63,NULL,'2016-01-10 20:58:25','2016-01-10 20:58:25'),(72,'YV-2699',246,1,324,'7000',15,NULL,'2016-01-11 00:59:52','2016-01-11 00:59:52'),(73,'YV-2937',246,2,72,'55000',45,NULL,'2016-01-11 01:27:10','2016-01-11 01:27:10'),(74,'YV-2024',246,1,154,'2000',54,9,'2016-01-11 01:45:01','2016-01-11 01:45:01'),(75,'YV-3092',246,1,461,'2155',159,NULL,'2016-01-11 01:53:30','2016-01-11 01:53:30'),(76,'YV-588T',246,1,454,'10660',160,NULL,'2016-01-11 02:02:00','2016-01-11 02:02:00'),(77,'YV-2235',246,1,114,'4000',74,30,'2016-01-11 02:18:14','2016-01-11 02:18:14'),(78,'YV-3121',246,1,180,'7000',161,NULL,'2016-01-14 00:44:26','2016-01-14 00:44:26'),(79,'N-929CG',89,1,425,'9000',162,NULL,'2016-01-14 02:04:49','2016-01-14 02:04:49'),(80,'YV-2972',246,1,312,'7000',163,NULL,'2016-01-14 03:47:57','2016-01-14 03:47:57'),(81,'YV-2949',246,1,396,'5000',164,NULL,'2016-01-14 17:54:37','2016-01-14 17:54:37'),(82,'YV-1748',246,1,153,'2000',54,8,'2016-01-14 18:00:02','2016-01-14 18:00:02'),(83,'YV-1055',246,1,151,'2000',165,NULL,'2016-01-14 18:10:00','2016-01-14 18:10:00'),(84,'YV-2502',246,1,176,'6000',166,NULL,'2016-01-14 18:18:33','2016-01-14 18:18:33'),(85,'YV-2483',246,1,436,'1900',80,NULL,'2016-01-14 18:24:54','2016-01-14 18:24:54'),(86,'YV-592T',246,1,324,'7000',22,22,'2016-01-14 18:32:38','2016-01-14 18:32:38'),(87,'YV-2465',246,1,324,'7000',167,NULL,'2016-01-14 18:39:50','2016-01-14 18:39:50'),(88,'N-431RC',89,1,287,'12000',121,NULL,'2016-01-14 18:48:35','2016-01-14 18:48:35'),(89,'YV-3066',246,1,27,'5000',121,NULL,'2016-01-14 18:54:43','2016-01-14 18:54:43'),(90,'YV-1686',246,1,175,'6000',168,NULL,'2016-01-14 19:19:03','2016-01-14 19:19:03'),(91,'YV-1258',246,2,153,'2000',139,28,'2016-01-14 19:25:43','2016-01-14 19:25:43'),(92,'YV-1797',246,1,153,'2000',156,NULL,'2016-01-14 19:32:59','2016-01-14 19:32:59'),(93,'YV-1734',246,1,99,'8000',12,NULL,'2016-01-14 20:05:48','2016-01-14 20:05:48'),(94,'YV-1983',246,1,153,'2000',168,NULL,'2016-01-14 20:23:24','2016-01-14 20:23:24'),(95,'YV-2180',246,1,394,'2000',169,NULL,'2016-01-14 20:52:17','2016-01-14 20:52:17'),(96,'YV-2823',246,3,71,'53000',45,NULL,'2016-01-14 21:03:47','2016-01-14 21:03:47');
/*!40000 ALTER TABLE `aeronaves` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aeropuertos`
--

DROP TABLE IF EXISTS `aeropuertos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aeropuertos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `siglas` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `rif` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `nit` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(1500) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `director` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `gerente` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aeropuertos`
--

LOCK TABLES `aeropuertos` WRITE;
/*!40000 ALTER TABLE `aeropuertos` DISABLE KEYS */;
INSERT INTO `aeropuertos` VALUES (1,'PZO','','','','','','','','','2015-07-31 12:44:28','2015-07-31 12:44:28'),(2,'CBL','','','','','','','','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'SEU','','','','','','','','','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `aeropuertos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ajustes`
--

DROP TABLE IF EXISTS `ajustes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ajustes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cliente_id` int(10) unsigned NOT NULL,
  `cobro_id` int(10) unsigned NOT NULL,
  `monto` double(15,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `ajustes_cliente_id_foreign` (`cliente_id`),
  KEY `ajustes_cobro_id_foreign` (`cobro_id`),
  CONSTRAINT `ajustes_cobro_id_foreign` FOREIGN KEY (`cobro_id`) REFERENCES `cobros` (`id`) ON DELETE CASCADE,
  CONSTRAINT `ajustes_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ajustes`
--

LOCK TABLES `ajustes` WRITE;
/*!40000 ALTER TABLE `ajustes` DISABLE KEYS */;
/*!40000 ALTER TABLE `ajustes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aterrizajes`
--

DROP TABLE IF EXISTS `aterrizajes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aterrizajes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hora` time NOT NULL,
  `fecha` date NOT NULL,
  `aeropuerto_id` int(10) unsigned NOT NULL,
  `aeronave_id` int(10) unsigned NOT NULL,
  `cliente_id` int(10) unsigned DEFAULT NULL,
  `tipoMatricula_id` int(10) unsigned NOT NULL,
  `nacionalidadVuelo_id` int(10) unsigned DEFAULT NULL,
  `piloto_id` int(10) unsigned DEFAULT NULL,
  `num_vuelo` int(11) DEFAULT NULL,
  `puerto_id` int(10) unsigned DEFAULT NULL,
  `desembarqueAdultos` int(11) NOT NULL DEFAULT '0',
  `desembarqueInfante` int(11) NOT NULL DEFAULT '0',
  `desembarqueTercera` int(11) NOT NULL DEFAULT '0',
  `desembarqueTransito` int(11) NOT NULL DEFAULT '0',
  `despego` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `aterrizajes_aeropuerto_id_foreign` (`aeropuerto_id`),
  KEY `aterrizajes_aeronave_id_foreign` (`aeronave_id`),
  KEY `aterrizajes_cliente_id_foreign` (`cliente_id`),
  KEY `aterrizajes_tipomatricula_id_foreign` (`tipoMatricula_id`),
  KEY `aterrizajes_nacionalidadvuelo_id_foreign` (`nacionalidadVuelo_id`),
  KEY `aterrizajes_piloto_id_foreign` (`piloto_id`),
  KEY `aterrizajes_puerto_id_foreign` (`puerto_id`),
  CONSTRAINT `aterrizajes_puerto_id_foreign` FOREIGN KEY (`puerto_id`) REFERENCES `puertos` (`id`),
  CONSTRAINT `aterrizajes_aeronave_id_foreign` FOREIGN KEY (`aeronave_id`) REFERENCES `aeronaves` (`id`),
  CONSTRAINT `aterrizajes_aeropuerto_id_foreign` FOREIGN KEY (`aeropuerto_id`) REFERENCES `aeropuertos` (`id`),
  CONSTRAINT `aterrizajes_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  CONSTRAINT `aterrizajes_nacionalidadvuelo_id_foreign` FOREIGN KEY (`nacionalidadVuelo_id`) REFERENCES `nacionalidad_vuelos` (`id`),
  CONSTRAINT `aterrizajes_piloto_id_foreign` FOREIGN KEY (`piloto_id`) REFERENCES `pilotos` (`id`),
  CONSTRAINT `aterrizajes_tipomatricula_id_foreign` FOREIGN KEY (`tipoMatricula_id`) REFERENCES `tipo_matriculas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aterrizajes`
--

LOCK TABLES `aterrizajes` WRITE;
/*!40000 ALTER TABLE `aterrizajes` DISABLE KEYS */;
INSERT INTO `aterrizajes` VALUES (1,'11:06:00','2015-12-31',1,24,125,2,1,6,0,7,2,0,0,0,1,'2016-01-05 23:31:22','2016-01-05 23:34:56'),(2,'14:40:00','2016-01-01',1,43,63,3,1,98,2352,8,81,0,0,0,1,'2016-01-06 00:02:56','2016-01-06 00:04:20'),(3,'14:43:00','2016-01-01',1,39,63,3,1,72,2384,3,48,0,0,0,1,'2016-01-06 00:11:42','2016-01-06 00:13:24'),(4,'15:45:00','2016-01-01',1,15,40,3,1,24,0,8,131,0,0,0,1,'2016-01-06 00:32:12','2016-01-06 00:34:21'),(5,'15:55:00','2016-01-01',1,14,40,3,1,39,745,3,49,0,0,0,1,'2016-01-06 00:43:02','2016-01-06 00:44:17'),(6,'11:33:00','2015-12-28',1,27,139,2,1,6,0,9,19,0,0,0,1,'2016-01-06 01:13:25','2016-01-06 01:14:53'),(7,'11:40:00','2015-12-28',1,28,139,2,1,7,0,9,17,0,0,0,1,'2016-01-06 01:16:49','2016-01-06 01:17:50'),(8,'11:42:00','2015-12-28',1,21,139,2,1,6,0,9,12,0,0,0,1,'2016-01-06 03:50:43','2016-01-06 03:51:36'),(9,'12:20:00','2015-12-29',1,28,139,2,1,10,0,9,0,0,0,0,1,'2016-01-06 03:53:23','2016-01-06 03:54:02'),(10,'11:57:00','2015-12-29',1,27,139,2,1,6,0,9,19,0,0,0,1,'2016-01-06 03:58:15','2016-01-06 03:58:49'),(11,'13:45:00','2015-12-29',1,21,139,2,1,6,0,9,17,0,0,0,1,'2016-01-06 04:00:33','2016-01-06 04:00:58'),(12,'11:30:00','2015-12-30',1,27,139,2,1,6,0,9,18,0,0,0,1,'2016-01-06 04:02:03','2016-01-06 04:03:04'),(13,'12:08:00','2015-12-30',1,21,139,2,1,6,0,9,19,0,0,0,1,'2016-01-06 04:06:07','2016-01-06 04:06:54'),(14,'11:28:00','2015-12-30',1,28,139,2,1,6,0,9,19,0,0,0,1,'2016-01-06 04:08:28','2016-01-06 04:09:23'),(15,'18:25:00','2016-01-01',1,4,124,3,1,12,306,3,42,0,0,0,1,'2016-01-06 04:11:35','2016-01-06 04:13:34'),(17,'13:59:00','2015-12-30',1,53,101,1,1,141,0,7,0,0,0,0,1,'2016-01-08 00:48:06','2016-01-08 02:05:50'),(18,'20:32:00','2016-01-01',1,54,13,3,1,109,348,3,68,0,0,0,1,'2016-01-08 02:22:52','2016-01-08 02:36:38'),(19,'13:00:00','2015-12-30',1,55,54,1,1,143,0,9,0,0,0,0,1,'2016-01-08 03:02:06','2016-01-08 03:03:13'),(20,'19:52:00','2015-12-28',1,56,150,1,1,144,0,5,3,0,0,0,1,'2016-01-08 03:19:15','2016-01-08 03:20:28'),(21,'11:22:00','2015-12-31',1,21,139,2,1,140,0,9,3,0,0,0,1,'2016-01-08 07:36:03','2016-01-08 07:37:05'),(22,'11:57:00','2015-12-31',1,27,139,2,1,136,0,9,5,0,0,0,1,'2016-01-08 07:42:26','2016-01-08 07:43:37'),(23,'12:00:00','2015-12-29',1,26,139,2,1,140,0,9,19,0,0,0,1,'2016-01-08 07:45:05','2016-01-08 07:45:58'),(24,'09:41:00','2016-01-02',1,28,139,2,1,145,0,9,6,0,0,0,1,'2016-01-08 07:49:23','2016-01-08 07:49:54'),(25,'11:10:00','2016-01-01',1,57,139,2,1,146,0,9,3,0,0,0,1,'2016-01-08 07:54:09','2016-01-08 07:58:42'),(26,'13:34:00','2015-12-28',1,57,139,2,1,146,0,9,2,0,0,0,1,'2016-01-08 08:00:16','2016-01-08 08:00:54'),(27,'16:50:00','2015-12-29',1,58,139,2,1,145,0,9,1,0,0,0,1,'2016-01-08 08:04:42','2016-01-08 08:05:22'),(28,'19:30:00','2015-12-30',1,59,106,1,2,7,0,1,7,0,0,0,1,'2016-01-09 01:33:50','2016-01-09 01:35:26'),(29,'12:57:00','2016-01-02',1,60,128,1,1,44,0,3,0,0,0,8,1,'2016-01-09 01:42:07','2016-01-09 01:44:55'),(30,'15:00:00','2015-12-21',1,61,153,1,2,8,0,3,0,0,0,0,1,'2016-01-09 01:59:18','2016-01-11 18:15:16'),(31,'20:25:00','2016-01-01',1,16,40,3,1,9,747,3,53,0,0,0,1,'2016-01-09 02:09:37','2016-01-09 02:11:23'),(32,'09:16:00','2016-01-02',1,15,40,3,1,147,970,4,113,0,0,0,1,'2016-01-09 02:14:25','2016-01-09 02:15:32'),(33,'21:05:00','2016-01-01',1,4,124,3,1,12,316,8,116,0,0,0,1,'2016-01-09 02:19:10','2016-01-09 02:20:18'),(34,'09:05:00','2016-01-02',1,2,124,3,1,12,312,3,80,0,0,0,1,'2016-01-09 02:22:50','2016-01-09 02:23:34'),(35,'17:15:00','2016-01-02',1,62,154,1,1,9,0,3,0,0,0,0,1,'2016-01-09 02:30:33','2016-01-09 02:31:16'),(36,'15:30:00','2016-01-02',1,15,40,3,1,41,971,8,139,0,0,0,1,'2016-01-09 02:33:16','2016-01-09 02:34:04'),(37,'16:54:00','2016-01-02',1,14,40,3,1,18,745,3,135,0,0,0,1,'2016-01-09 02:37:43','2016-01-09 02:38:27'),(38,'17:50:00','2016-01-02',1,63,155,1,1,148,0,12,0,0,0,0,1,'2016-01-09 02:44:16','2016-01-09 02:45:00'),(39,'14:07:00','2016-01-02',1,59,106,1,1,149,0,8,5,0,0,0,1,'2016-01-09 02:52:53','2016-01-09 02:57:10'),(40,'08:00:00','2016-01-03',1,64,156,1,1,150,0,11,0,0,0,0,1,'2016-01-09 03:48:01','2016-01-09 03:48:35'),(41,'08:00:00','2016-01-03',1,65,157,1,1,151,0,11,1,0,0,0,1,'2016-01-09 04:40:12','2016-01-09 04:41:00'),(42,'08:30:00','2016-01-03',1,66,158,1,1,152,0,5,2,0,0,0,1,'2016-01-09 04:56:39','2016-01-09 04:57:23'),(43,'16:30:00','2016-01-02',1,53,101,1,1,96,0,7,0,0,0,0,1,'2016-01-09 05:20:55','2016-01-09 05:22:07'),(44,'14:36:00','2016-01-02',1,40,63,3,1,93,2352,8,86,0,0,0,1,'2016-01-09 05:31:08','2016-01-09 05:34:50'),(45,'16:46:00','2016-01-02',1,43,63,3,1,98,2384,3,90,0,0,0,1,'2016-01-09 05:38:49','2016-01-09 05:39:48'),(46,'11:00:00','2015-12-23',1,67,148,1,2,156,0,23,0,0,0,0,1,'2016-01-10 20:00:46','2016-01-10 20:05:20'),(47,'09:50:00','2016-01-03',1,68,156,1,1,157,0,9,0,0,0,0,1,'2016-01-10 20:24:50','2016-01-10 20:25:45'),(48,'10:05:00','2016-01-03',1,69,156,1,1,158,0,9,0,0,0,0,1,'2016-01-10 20:29:04','2016-01-10 20:29:43'),(49,'16:30:00','2015-12-31',1,70,58,1,1,159,0,8,0,0,0,0,1,'2016-01-10 20:35:11','2016-01-10 20:35:35'),(50,'18:10:00','2016-01-02',1,2,124,3,1,12,306,3,97,0,0,0,1,'2016-01-10 20:38:26','2016-01-10 20:39:22'),(51,'08:58:00','2016-01-03',1,4,124,3,1,12,312,3,114,0,0,0,1,'2016-01-10 20:43:56','2016-01-10 20:46:03'),(52,'20:20:00','2016-01-02',1,11,40,3,1,38,747,3,101,0,0,0,1,'2016-01-10 20:48:17','2016-01-10 20:49:02'),(53,'08:52:00','2016-01-03',1,15,40,3,1,6,970,4,105,0,0,0,1,'2016-01-10 20:55:18','2016-01-10 20:56:06'),(54,'10:33:00','2016-01-03',1,71,63,2,1,160,2970,3,10,0,0,0,1,'2016-01-10 21:00:37','2016-01-10 21:01:23'),(55,'14:39:00','2016-01-03',1,43,63,3,1,85,2352,8,91,0,0,0,1,'2016-01-10 21:03:02','2016-01-10 21:03:39'),(56,'15:55:00','2016-01-03',1,44,63,3,1,67,2384,3,84,0,0,0,1,'2016-01-11 00:48:10','2016-01-11 00:48:56'),(57,'16:00:00','2016-01-03',1,15,40,3,1,161,971,8,122,0,0,0,1,'2016-01-11 00:52:48','2016-01-11 00:53:39'),(58,'16:44:00','2016-01-03',1,11,40,3,1,162,745,3,163,0,0,0,1,'2016-01-11 00:57:08','2016-01-11 00:57:54'),(59,'23:30:00','2016-01-03',1,72,15,1,1,163,0,3,0,0,0,0,1,'2016-01-11 01:02:20','2016-01-11 01:18:55'),(61,'21:25:00','2016-01-03',1,73,45,2,1,164,803,4,86,0,0,0,1,'2016-01-11 01:30:20','2016-01-11 01:31:29'),(62,'06:55:00','2016-01-02',1,6,13,3,1,165,342,3,87,0,0,0,1,'2016-01-11 01:35:33','2016-01-11 01:36:55'),(63,'20:05:00','2016-01-03',1,5,13,3,1,110,348,3,114,0,0,0,1,'2016-01-11 01:39:56','2016-01-11 01:40:51'),(64,'11:12:00','2016-01-03',1,53,101,1,1,153,0,7,0,0,0,0,1,'2016-01-11 01:42:10','2016-01-11 01:42:43'),(65,'13:08:00','2016-01-02',1,74,54,1,1,166,0,9,0,0,0,0,1,'2016-01-11 01:47:40','2016-01-11 01:48:15'),(66,'15:21:00','2016-01-03',1,75,159,1,1,167,0,21,5,0,0,0,1,'2016-01-11 01:54:28','2016-01-11 01:55:00'),(67,'09:55:00','2016-01-04',1,76,160,1,1,168,0,8,1,0,0,0,1,'2016-01-11 02:03:41','2016-01-11 02:04:21'),(68,'16:24:00','2015-12-30',1,77,74,1,1,144,0,5,0,0,0,0,1,'2016-01-11 02:19:36','2016-01-11 02:22:36'),(69,'10:54:00','2016-01-04',1,78,161,1,1,169,0,47,2,0,0,0,1,'2016-01-14 00:47:53','2016-01-14 00:49:03'),(70,'09:00:00','2016-01-04',1,15,40,3,1,39,970,4,71,0,0,0,1,'2016-01-14 01:01:01','2016-01-14 01:01:49'),(71,'17:58:00','2016-01-03',1,2,124,3,1,7,306,3,114,0,0,0,1,'2016-01-14 01:06:32','2016-01-14 01:26:57'),(72,'20:46:00','2016-01-03',1,2,124,3,1,7,316,8,119,0,0,0,1,'2016-01-14 01:43:32','2016-01-14 01:45:39'),(73,'08:52:00','2016-01-04',1,2,124,3,1,7,61,3,61,0,0,0,1,'2016-01-14 01:48:18','2016-01-14 01:49:32'),(74,'13:18:00','2016-01-04',1,79,162,1,2,171,0,25,0,0,0,0,1,'2016-01-14 02:20:45','2016-01-14 02:21:32'),(75,'11:29:00','2016-01-02',1,26,139,2,1,138,0,9,19,0,0,0,1,'2016-01-14 03:02:54','2016-01-14 03:03:47'),(76,'12:15:00','2016-01-02',1,21,139,2,1,136,0,9,19,0,0,0,1,'2016-01-14 03:05:17','2016-01-14 03:07:07'),(77,'11:20:00','2016-01-02',1,27,139,2,1,139,0,9,15,0,0,0,1,'2016-01-14 03:10:35','2016-01-14 03:11:13'),(78,'12:47:00','2016-01-03',1,27,139,2,1,135,0,9,7,0,0,0,1,'2016-01-14 03:12:17','2016-01-14 03:12:48'),(79,'11:57:00','2016-01-03',1,21,139,2,1,136,0,9,16,0,0,0,1,'2016-01-14 03:14:01','2016-01-14 03:15:48'),(80,'12:49:00','2016-01-03',1,26,139,2,1,138,0,9,19,0,0,0,1,'2016-01-14 03:16:57','2016-01-14 03:17:21'),(81,'14:38:00','2016-01-04',1,49,63,3,1,172,2352,8,100,0,0,0,1,'2016-01-14 03:19:49','2016-01-14 03:20:38'),(82,'15:01:00','2016-01-04',1,50,63,3,1,63,2384,3,93,0,0,0,1,'2016-01-14 03:25:29','2016-01-14 03:26:16'),(83,'15:44:00','2016-01-04',1,14,40,3,1,6,971,8,138,0,0,0,1,'2016-01-14 03:28:51','2016-01-14 03:29:36'),(84,'10:33:00','2016-01-03',1,24,125,2,1,134,0,7,0,0,0,0,1,'2016-01-14 03:31:17','2016-01-14 03:31:51'),(85,'06:49:00','2016-01-04',1,54,13,3,1,173,342,3,114,0,0,0,1,'2016-01-14 03:34:31','2016-01-14 03:35:26'),(86,'13:19:00','2016-01-02',1,56,150,1,2,144,0,10,0,0,0,0,1,'2016-01-14 03:37:25','2016-01-14 03:38:16'),(87,'10:30:00','2016-01-04',1,24,125,2,1,134,0,7,0,0,0,0,1,'2016-01-14 03:39:38','2016-01-14 03:40:15'),(88,'21:04:00','2016-01-04',1,5,13,3,1,109,348,3,124,0,0,0,1,'2016-01-14 03:41:39','2016-01-14 03:42:54'),(89,'10:00:00','2016-01-04',1,80,163,1,1,174,0,8,19,0,0,0,1,'2016-01-14 03:49:41','2016-01-14 03:50:18'),(90,'21:30:00','2016-01-04',1,73,45,2,1,175,803,4,96,0,0,0,1,'2016-01-14 03:53:23','2016-01-14 03:54:03'),(91,'21:30:00','2016-01-04',1,73,45,2,1,175,803,4,96,0,0,0,1,'2016-01-14 04:03:47','2016-01-14 04:04:20'),(92,'11:00:00','2016-01-04',1,53,101,1,1,141,0,7,0,0,0,0,1,'2016-01-14 04:05:48','2016-01-14 04:09:51'),(93,'08:17:00','2016-01-05',1,55,54,1,1,143,0,9,2,0,0,0,1,'2016-01-14 17:46:13','2016-01-14 17:47:35'),(94,'08:10:00','2016-01-05',1,81,164,1,1,176,0,5,0,0,0,0,1,'2016-01-14 17:55:34','2016-01-14 17:57:10'),(95,'13:06:00','2016-01-02',1,82,54,1,1,177,0,9,4,0,0,0,1,'2016-01-14 18:02:10','2016-01-14 18:02:46'),(96,'17:50:00','2016-01-04',1,83,165,1,1,178,0,5,0,0,0,0,1,'2016-01-14 18:11:51','2016-01-14 18:12:44'),(97,'09:08:00','2016-01-05',1,84,166,1,1,179,0,3,1,0,0,0,1,'2016-01-14 18:21:02','2016-01-14 18:21:34'),(98,'10:10:00','2016-01-05',1,85,80,1,1,180,0,5,1,0,0,0,1,'2016-01-14 18:26:50','2016-01-14 18:28:00'),(99,'08:55:00','2016-01-05',1,86,22,1,1,181,0,9,7,0,0,0,1,'2016-01-14 18:35:09','2016-01-14 18:36:03'),(100,'10:26:00','2016-01-05',1,87,167,1,1,182,0,6,1,0,0,0,1,'2016-01-14 18:41:33','2016-01-14 18:42:41'),(101,'11:05:00','2016-01-05',1,88,121,1,2,183,0,1,7,0,0,0,1,'2016-01-14 18:50:12','2016-01-14 18:52:55'),(102,'11:39:00','2016-01-05',1,89,121,1,2,184,0,1,5,0,0,0,1,'2016-01-14 18:56:06','2016-01-14 18:57:11'),(103,'12:28:00','2016-01-04',1,21,139,2,1,140,0,9,19,0,0,0,1,'2016-01-14 18:58:20','2016-01-14 18:59:32'),(104,'12:08:00','2016-01-04',1,26,139,2,1,138,0,9,18,0,0,0,1,'2016-01-14 19:01:51','2016-01-14 19:03:00'),(105,'11:25:00','2016-01-04',1,27,139,2,1,135,0,9,17,0,0,0,1,'2016-01-14 19:04:30','2016-01-14 19:05:43'),(106,'20:50:00','2016-01-04',1,16,40,3,1,24,747,3,136,0,0,0,1,'2016-01-14 19:07:38','2016-01-14 19:09:03'),(107,'09:22:00','2016-01-05',1,14,40,3,1,185,970,4,86,0,0,0,1,'2016-01-14 19:12:17','2016-01-14 19:13:13'),(108,'13:30:00','2016-01-05',1,90,168,1,2,186,0,28,2,0,0,0,1,'2016-01-14 19:21:29','2016-01-14 19:22:24'),(109,'14:00:00','2016-01-05',1,91,139,2,1,137,0,9,2,0,0,2,1,'2016-01-14 19:26:31','2016-01-14 19:27:25'),(110,'14:30:00','2016-01-05',1,64,156,1,1,150,0,9,5,0,0,0,1,'2016-01-14 19:29:32','2016-01-14 19:30:12'),(111,'14:32:00','2016-01-05',1,92,156,1,1,187,0,9,5,0,0,0,1,'2016-01-14 19:36:29','2016-01-14 19:37:04'),(112,'10:15:00','2016-01-05',1,62,154,1,1,154,0,8,8,0,0,0,1,'2016-01-14 19:38:39','2016-01-14 19:39:42'),(113,'14:37:00','2016-01-05',1,49,63,3,1,188,2352,8,95,0,0,0,1,'2016-01-14 19:43:33','2016-01-14 19:44:13'),(114,'14:56:00','2016-01-05',1,45,63,3,1,133,2384,3,98,0,0,0,1,'2016-01-14 19:48:39','2016-01-14 19:49:34'),(115,'16:16:00','2016-01-04',1,4,124,3,1,11,311,3,116,0,0,0,1,'2016-01-14 19:51:16','2016-01-14 19:51:56'),(116,'20:03:00','2016-01-04',1,4,124,3,1,11,306,3,93,0,0,0,1,'2016-01-14 19:53:38','2016-01-14 19:54:35'),(117,'08:57:00','2016-01-05',1,4,124,3,1,12,312,3,85,0,0,0,1,'2016-01-14 19:56:08','2016-01-14 20:03:05'),(118,'09:05:00','2016-01-05',1,93,12,1,1,189,0,4,0,0,0,0,1,'2016-01-14 20:07:44','2016-01-14 20:08:13'),(119,'15:32:00','2016-01-05',1,16,40,3,1,161,971,8,133,0,0,0,1,'2016-01-14 20:09:28','2016-01-14 20:10:05'),(120,'17:00:00','2016-01-05',1,11,40,3,1,49,745,3,150,0,0,0,1,'2016-01-14 20:11:32','2016-01-14 20:12:13'),(121,'12:15:00','2016-01-05',1,67,148,1,2,156,0,11,0,0,0,0,1,'2016-01-14 20:13:57','2016-01-14 20:14:56'),(122,'16:43:00','2016-01-05',1,56,150,1,1,144,0,5,1,0,0,0,1,'2016-01-14 20:17:42','2016-01-14 20:18:28'),(123,'16:00:00','2016-01-05',1,75,159,1,1,167,0,18,1,0,0,0,1,'2016-01-14 20:21:20','2016-01-14 20:22:00'),(124,'15:00:00','2015-12-29',1,94,168,1,1,190,0,9,2,0,0,0,1,'2016-01-14 20:26:50','2016-01-14 20:27:28'),(125,'08:05:00','2016-01-06',1,25,24,1,1,191,0,5,2,0,0,0,1,'2016-01-14 20:30:52','2016-01-14 20:36:16'),(126,'23:30:00','2016-01-05',1,86,22,1,1,181,0,3,0,0,0,0,1,'2016-01-14 20:37:22','2016-01-14 20:43:29'),(127,'14:30:00','2016-01-03',1,59,106,1,1,149,0,3,0,0,0,0,1,'2016-01-14 20:44:39','2016-01-14 20:45:21'),(128,'12:28:00','2016-01-05',1,55,54,1,1,192,0,9,4,0,0,0,1,'2016-01-14 20:47:59','2016-01-14 20:48:42'),(129,'11:38:00','2016-01-06',1,95,169,1,1,193,0,5,0,0,0,0,1,'2016-01-14 20:53:30','2016-01-14 20:54:09'),(130,'13:03:00','2016-01-06',1,69,156,1,1,158,0,9,5,0,0,0,1,'2016-01-14 20:55:24','2016-01-14 20:55:47'),(131,'21:05:00','2016-01-01',1,73,45,2,1,194,803,4,36,0,0,0,1,'2016-01-14 20:59:12','2016-01-14 21:00:15'),(132,'21:10:00','2016-01-05',1,96,45,3,1,195,803,4,72,0,0,0,1,'2016-01-14 21:06:52','2016-01-14 21:07:34'),(133,'20:34:00','2016-01-05',1,5,13,3,1,109,348,3,118,0,0,0,1,'2016-01-14 21:09:08','2016-01-14 21:10:04'),(134,'06:50:00','2016-01-05',1,54,13,3,1,119,342,3,80,0,0,0,1,'2016-01-14 21:11:21','2016-01-14 21:12:36');
/*!40000 ALTER TABLE `aterrizajes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bancos`
--

DROP TABLE IF EXISTS `bancos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bancos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` char(150) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bancos`
--

LOCK TABLES `bancos` WRITE;
/*!40000 ALTER TABLE `bancos` DISABLE KEYS */;
INSERT INTO `bancos` VALUES (1,'Bicentenario Banco Universal','0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'Banco Caroní','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `bancos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bancoscuentas`
--

DROP TABLE IF EXISTS `bancoscuentas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bancoscuentas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` char(150) COLLATE utf8_unicode_ci NOT NULL,
  `isActivo` tinyint(1) NOT NULL,
  `banco_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `bancoscuentas_banco_id_foreign` (`banco_id`),
  CONSTRAINT `bancoscuentas_banco_id_foreign` FOREIGN KEY (`banco_id`) REFERENCES `bancos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bancoscuentas`
--

LOCK TABLES `bancoscuentas` WRITE;
/*!40000 ALTER TABLE `bancoscuentas` DISABLE KEYS */;
INSERT INTO `bancoscuentas` VALUES (1,'01750172100073301437',1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'01280017731700066119',1,2,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `bancoscuentas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargas`
--

DROP TABLE IF EXISTS `cargas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `cliente_id` int(10) unsigned NOT NULL,
  `aeropuerto_id` int(10) unsigned NOT NULL,
  `peso_embarcado` double(8,2) NOT NULL,
  `peso_desembarcado` double(8,2) NOT NULL,
  `observaciones` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `monto_total` double(8,2) NOT NULL,
  `facturado` int(11) NOT NULL DEFAULT '0',
  `factura_id` int(10) unsigned DEFAULT NULL,
  `condicionPago` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `cargas_cliente_id_foreign` (`cliente_id`),
  KEY `cargas_aeropuerto_id_foreign` (`aeropuerto_id`),
  KEY `cargas_factura_id_foreign` (`factura_id`),
  CONSTRAINT `cargas_factura_id_foreign` FOREIGN KEY (`factura_id`) REFERENCES `facturas` (`id`),
  CONSTRAINT `cargas_aeropuerto_id_foreign` FOREIGN KEY (`aeropuerto_id`) REFERENCES `aeropuertos` (`id`),
  CONSTRAINT `cargas_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargas`
--

LOCK TABLES `cargas` WRITE;
/*!40000 ALTER TABLE `cargas` DISABLE KEYS */;
/*!40000 ALTER TABLE `cargas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargos`
--

DROP TABLE IF EXISTS `cargos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargos`
--

LOCK TABLES `cargos` WRITE;
/*!40000 ALTER TABLE `cargos` DISABLE KEYS */;
INSERT INTO `cargos` VALUES (1,'Cargo 1','2015-07-31 12:42:36','2015-12-08 00:42:47');
/*!40000 ALTER TABLE `cargos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargos_varios`
--

DROP TABLE IF EXISTS `cargos_varios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargos_varios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `eq_formulario` double(8,2) NOT NULL,
  `eq_derechoHabilitacion` double(8,2) NOT NULL,
  `eq_usoAbordajeSinHab` double(8,2) NOT NULL,
  `eq_usoAbordajeConHab` double(8,2) NOT NULL,
  `aeropuerto_id` int(10) unsigned NOT NULL,
  `formularioCredito_id` int(10) unsigned NOT NULL,
  `formularioContado_id` int(10) unsigned NOT NULL,
  `habilitacionCredito_id` int(10) unsigned NOT NULL,
  `habilitacionContado_id` int(10) unsigned NOT NULL,
  `abordajeCredito_id` int(10) unsigned NOT NULL,
  `abordajeContado_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `cargos_varios_aeropuerto_id_foreign` (`aeropuerto_id`),
  KEY `cargos_varios_formulariocredito_id_foreign` (`formularioCredito_id`),
  KEY `cargos_varios_formulariocontado_id_foreign` (`formularioContado_id`),
  KEY `cargos_varios_habilitacioncredito_id_foreign` (`habilitacionCredito_id`),
  KEY `cargos_varios_habilitacioncontado_id_foreign` (`habilitacionContado_id`),
  KEY `cargos_varios_abordajecredito_id_foreign` (`abordajeCredito_id`),
  KEY `cargos_varios_abordajecontado_id_foreign` (`abordajeContado_id`),
  CONSTRAINT `cargos_varios_abordajecontado_id_foreign` FOREIGN KEY (`abordajeContado_id`) REFERENCES `conceptos` (`id`),
  CONSTRAINT `cargos_varios_abordajecredito_id_foreign` FOREIGN KEY (`abordajeCredito_id`) REFERENCES `conceptos` (`id`),
  CONSTRAINT `cargos_varios_aeropuerto_id_foreign` FOREIGN KEY (`aeropuerto_id`) REFERENCES `aeropuertos` (`id`),
  CONSTRAINT `cargos_varios_formulariocontado_id_foreign` FOREIGN KEY (`formularioContado_id`) REFERENCES `conceptos` (`id`),
  CONSTRAINT `cargos_varios_formulariocredito_id_foreign` FOREIGN KEY (`formularioCredito_id`) REFERENCES `conceptos` (`id`),
  CONSTRAINT `cargos_varios_habilitacioncontado_id_foreign` FOREIGN KEY (`habilitacionContado_id`) REFERENCES `conceptos` (`id`),
  CONSTRAINT `cargos_varios_habilitacioncredito_id_foreign` FOREIGN KEY (`habilitacionCredito_id`) REFERENCES `conceptos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargos_varios`
--

LOCK TABLES `cargos_varios` WRITE;
/*!40000 ALTER TABLE `cargos_varios` DISABLE KEYS */;
INSERT INTO `cargos_varios` VALUES (1,0.14,14.00,5.14,5.71,1,71,57,70,56,72,58,'0000-00-00 00:00:00','2015-12-08 06:27:03');
/*!40000 ALTER TABLE `cargos_varios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente_hangar`
--

DROP TABLE IF EXISTS `cliente_hangar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente_hangar` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cliente_id` int(10) unsigned NOT NULL,
  `hangar_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `cliente_hangar_cliente_id_foreign` (`cliente_id`),
  KEY `cliente_hangar_hangar_id_foreign` (`hangar_id`),
  CONSTRAINT `cliente_hangar_hangar_id_foreign` FOREIGN KEY (`hangar_id`) REFERENCES `hangars` (`id`),
  CONSTRAINT `cliente_hangar_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente_hangar`
--

LOCK TABLES `cliente_hangar` WRITE;
/*!40000 ALTER TABLE `cliente_hangar` DISABLE KEYS */;
INSERT INTO `cliente_hangar` VALUES (1,150,22,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,106,44,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `cliente_hangar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` char(15) COLLATE utf8_unicode_ci NOT NULL,
  `cedRifPrefix` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cedRif` char(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nit` char(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre` char(150) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` enum('Aeronáutico','No Aeronáutico','Mixto') COLLATE utf8_unicode_ci NOT NULL,
  `isActivo` tinyint(1) NOT NULL,
  `isEnvioAutomatico` tinyint(1) NOT NULL,
  `fechaIngreso` date NOT NULL,
  `direccion` text COLLATE utf8_unicode_ci,
  `ciudad` char(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pais_id` int(10) unsigned NOT NULL,
  `codpostal` char(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefonos` char(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` char(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `responsable` char(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` char(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `web` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `limiteCredito` double(8,2) DEFAULT NULL,
  `diasCredito` double(8,2) DEFAULT NULL,
  `prontoPago` double(8,2) DEFAULT NULL,
  `descTasa` double(8,2) DEFAULT NULL,
  `isContribuyente` tinyint(1) NOT NULL,
  `islrpercentage` double(8,2) DEFAULT NULL,
  `ivapercentage` double(8,2) DEFAULT NULL,
  `comentario` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `clientes_pais_id_foreign` (`pais_id`),
  CONSTRAINT `clientes_pais_id_foreign` FOREIGN KEY (`pais_id`) REFERENCES `pais` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=170 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'1276','J','297288945','','EL TEKEÑAZO, C.A.','No Aeronáutico',0,0,'2009-08-31','CALLE RUBIO CASA NRO. B-12 URB CAMPO A-2 DE LA FERROMINERA  PTO','CIUDAD GUAYANA',232,'8050','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2009-08-31 04:30:00','0000-00-00 00:00:00'),(2,'0222','J','001428860','','ACO ALQUILER S A','No Aeronáutico',0,0,'2013-07-01','AV 1RA AV SUR ALTAMIRA EDIF SAN LUIS PISO PB LOCAL 1 Y 2  URB EL DORADO','CARACAS',232,'1073','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2013-07-01 04:30:00','0000-00-00 00:00:00'),(3,'D058','J','002629134','3077691','AEREO TRANSPORTE LA MONTAÑA','Aeronáutico',0,0,'2005-11-22','AV. LOS MANGOS 3ERA TRANVERSAL QUINTA CABRINI. DISTRITO FEDERAL','CARACAS',232,'','','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2005-11-22 04:00:00','2016-01-14 18:34:55'),(4,'D038','J','307759380','','AERO 1069 C.A.','Aeronáutico',0,0,'2012-01-24','CALLE REAL EDIFICIO OCAMZA, PISO 1, OFICINA 38, VALLE LA PASCUA, ESTADO GUARICO.','VALLE LA PASCUA',232,'','0212- 2003511','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2012-01-24 04:30:00','2016-01-14 18:18:03'),(5,'1283','J','305331510','','AERO CENTRO DE SERVICIOS CARONI, C.A.','No Aeronáutico',0,0,'2009-10-22','AEROPUERTO INTERNACIONAL MANUEL CARLOS PIAR.','CIUDAD GUAYANA',232,'8050','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2009-10-22 04:30:00','0000-00-00 00:00:00'),(6,'D045','J','401020216','','AERO EJECUTIVOS GUAYANA, C.A.','Aeronáutico',0,0,'2012-08-28','AV. GUAYANA LOCAL AEROCLUB CARONI HANGAR 14-B NRO MZ SECTOR PUERTO ORDAZ','CIUDAD GUAYANA',232,'8050','','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2012-08-28 04:30:00','2016-01-14 18:23:23'),(7,'0001','J','303574408','','AEROCLUB CARONI','Mixto',0,0,'2005-11-16','AEROPUERTO INTERNACIONAL  DEL ORINOCO MANUEL  PIAR.  PUERTO  ORDAZ','CIUDAD GUAYANA',232,'8050','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2005-11-16 04:00:00','0000-00-00 00:00:00'),(8,'D031','J','309810634','','AEROCOPTER C.A.','Aeronáutico',0,0,'2011-09-23','CARRETERA  NACIONAL AL CALLAO, RN1 SECTOR LA FRONTERA,  TUMEREMO, ESTADO BOLIVAR.','CIUDAD GUAYANA',232,'8050','0288-7711635','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2011-09-23 04:30:00','2016-01-14 18:08:56'),(9,'0122','J','297314628','','AEROCOSMETIC, COMPAÑIA ANONIMA','No Aeronáutico',0,0,'2009-07-10','VDA AVENIDA GUAYANA  EDIF AEROPUERTO INTERNACIONAL CARLOS MANUEL PIAR PISO NIVEL PLANTA BAJA LOCAL PLA.','CIUDAD GUAYANA',232,'8050','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2009-07-10 04:30:00','0000-00-00 00:00:00'),(10,'D035','J','309342428','','AEROECOM, C.A.','Aeronáutico',0,0,'2011-11-15','AV. FRANCISCO DE MIRANDA  TORRE LA PRIMERA PISO 3 OFIC.381. CARACAS.','CARACAS',232,'','','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2011-11-15 04:30:00','2016-01-14 18:14:32'),(11,'D047','J','307376236','','AEROGUAPARO, C.A.','Aeronáutico',0,0,'2012-10-19','VALENCIA - ESTADO CARABOBO.','',232,'','','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2012-10-19 04:30:00','2016-01-14 18:26:33'),(12,'D065','J','001531297','','AEROPANAMERICANO, C.A','Aeronáutico',0,0,'2006-02-15','AV. TERESA  DE  LA  PARRA  ED. SERPAPROCA  STA.  MONICADTO. FEDERAL','CARACAS',232,'1041','0286-9511552','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2006-02-15 04:00:00','2016-01-14 18:40:37'),(13,'0004','J','303994911','81984700','AEROPOSTAL ALAS DE VENEZUELA,  C.A.','Aeronáutico',0,0,'2005-11-16','AV. PASEO COLON, URB. LOS CAOBOS , PLAZA  VENEZUELA, TORRE POLAR OESTE.  PISOS 21, 22 Y 23  CARACAS','CARACAS',232,'','0212-7086211 /7826323','0212-9510100',NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2005-11-16 04:00:00','0000-00-00 00:00:00'),(14,'D025','J','299707554','','AEROPULLMAN 01, C.A.','Aeronáutico',0,0,'2011-05-25','HANGAR  Nº 129, AEROPUERTO CARACAS, VENEZUELA.','',232,'','','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2011-05-25 04:30:00','2016-01-14 17:39:14'),(15,'D044','J','306900926','','AEROQUEST C.A .','Aeronáutico',0,0,'2012-05-15','CARACAS - VENEZUELA.','',232,'','','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2012-05-15 04:30:00','2016-01-14 18:22:26'),(16,'0100','J','314755250','','AEROSERVICIO GUAYANA. R.L.','No Aeronáutico',0,0,'2007-08-13','AV. GUAYANA URB. UNARE II, SECTOR II. AEROPUERTO MANUEL CARLOS PIAR. PTO. ORDAZ.','CIUDAD GUAYANA',232,'8050','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2007-08-13 04:00:00','0000-00-00 00:00:00'),(17,'D052','J','402999690','','AEROSERVICIOS SKYPPER, C.A.','Aeronáutico',0,0,'2013-11-29','CARACAS - VENEZUELA.','',232,'','','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2013-11-29 04:30:00','2016-01-14 18:28:17'),(18,'0003','J','000652821','42518220','AGENCIA DE VIAJES OMEGA, C.A','No Aeronáutico',0,0,'2005-11-16','AV. FRANCISCO  DE  MIRANDA.  PARQUE  CRISTAL. TORRE  OESTE. PISO 1. OFICINA 5  CARACAS','CARACAS',232,'','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2005-11-16 04:00:00','0000-00-00 00:00:00'),(19,'0002','J','095053180','4821297','AGENCIA DE VIAJES Y TURISMO DON VICTOR, C.A.','No Aeronáutico',0,0,'2005-11-16','CENTRO COMERCIAL CERVEZA ZULIA, LOCAL Nº 21. ALTA VISTA. PUERTO ORDAZ','CIUDAD GUAYANA',232,'8050','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2005-11-16 04:00:00','0000-00-00 00:00:00'),(20,'0053','J','300700429','25119754','AGENCIA DE VIAJES Y TURISMO GIORGIO, C.A.','No Aeronáutico',0,0,'2005-11-16','CALLE GUASDUALITO. EDIF. GIORGIO LOCAL Nº 1 Y 2. CIUDAD OJEDA. EDO. ZULIA','CIUDAD OJEDA',232,'','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2005-11-16 04:00:00','0000-00-00 00:00:00'),(21,'1360','J','317395611','','AGENCIA PLUS DIGITAL, C.A','No Aeronáutico',0,0,'2011-09-29','C.C. ORINOKIA MALL, PLAZA SANTO TOME IV - SEGUNDO PISO - LOCAL P2-09 PUERTO ORDAZ, ESTADO BOLIVAR','CIUDAD GUAYANA',232,'8050','0286 - 9221534',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2011-09-29 04:30:00','0000-00-00 00:00:00'),(22,'D051','J','402950039','','AIR RORAIMA C.A.','Aeronáutico',0,0,'2013-10-24','CR  CIUDAD PIAR EDIF. UPATA PISO 2 OF 2, SECTOR PUERTO ORDAZ, CIUDAD GUAYANA. BOLIVAR.','CIUDAD GUAYANA',232,'8050','','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2013-10-24 04:30:00','2016-01-14 18:27:53'),(23,'D063','J','312162805','','AIR WAY SERVICES & SUPPORT A.S & S, C.A.','Aeronáutico',0,0,'2011-05-25','AV.31 DE JULIO, CCT PLAZA LM-3, LOMA DE GUERRA , NUEVA ESPARTA.','NUEVA ESPARTA',232,'','','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2011-05-25 04:30:00','2016-01-14 18:39:30'),(24,'D066','J','313379344','','ALAS DE GUAYANA','Aeronáutico',0,0,'2006-04-07','CARACAS - DISTRITO CAPITAL.','CARACAS',232,'','','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2006-04-07 04:00:00','2016-01-14 18:40:58'),(25,'0105','J','305519501','','ALBATROS VIAJES Y TURISMO C.A.','No Aeronáutico',0,0,'2008-04-17','AV. LAS AMERICAS EDIF. TORRE LORETO II PISO PB LOCAL PN2-05 PUERTO ORDAZ.','CIUDAD GUAYANA',232,'8050','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2008-04-17 04:30:00','0000-00-00 00:00:00'),(26,'D043','J','297979751','','ALC AVIATION, C.A .','Aeronáutico',0,0,'2012-03-12','CARACAS - DISTRITO CAPITAL.','',232,'','','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2012-03-12 04:30:00','2016-01-14 18:22:04'),(27,'1277','J','305879400','','ALFA CENTER, C.A.','No Aeronáutico',0,0,'2009-09-08','AV. MONTILLA CON CALLE CAMEJO EDIF. CENTRO EMPRESARIAL QUERO SILVA  PISO 1 LOCAL 7 Y 8 SECTOR CENTRO, B.','BARINAS',232,'5201','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2009-09-08 04:30:00','0000-00-00 00:00:00'),(28,'D022','J','295366809','','ALIANZA GLANCELOT, C.A.','Aeronáutico',0,0,'2010-09-03','MARACAY -  ESTADO ARAGUA.','CIUDAD GUAYANA',232,'8050','','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2010-09-30 04:30:00','2016-01-14 16:20:30'),(29,'0005','J','302242401','','ALMACENADORA CARONI, C.A.','No Aeronáutico',0,0,'2005-11-16','CALLE NEVERI 284-09-04 ZONA INDUSTRIAL UNARE I, PUERTO ORDAZ.','CIUDAD GUAYANA',232,'8050','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2005-11-16 04:00:00','0000-00-00 00:00:00'),(30,'D067','J','317142071','','AMC AVIATION CONSULT C.A.','Aeronáutico',0,0,'2011-11-09','CALLE EDIFICIO AEROPUERTO CARACAS, CHARALLAVE EDIFICIO FASA PISO 1 OFICINA UNICA, ESTADO MIRANDA.','CHARALLAVE',232,'1215','0212- 2664090','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2011-11-09 04:30:00','2016-01-14 18:41:18'),(31,'D068','J','304138032','','AMERIJET INTERNACIONAL INC, LINEA AEREA, C.A','Aeronáutico',0,0,'2007-11-28','AV. DON MANUEL  BELLOSO EDIF. AEROPUERTO INTERNACIONAL  LA CHINITA  PISO PB OF ZONA DE CARGA SECTOR PALIT MARACAIBO ESTADO ZULIA','MARACAIBO',232,'4001','','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2007-11-28 04:00:00','2016-01-14 18:41:32'),(32,'D054','V','11972122','','ANDRES FERNANDEZ','Aeronáutico',0,0,'2014-10-28','PUERTO ORDAZ - ESTADO BOLIVAR','CIUDAD GUAYANA',232,'8050','','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2014-10-28 04:30:00','2016-01-14 18:29:33'),(33,'D041','V','8546834','','ANTONIO ROJAS SUAREZ.','Aeronáutico',0,0,'2012-01-24','PUERTO ORDAZ - ESTADO BOLIVAR.','CIUDAD GUAYANA',232,'8050','','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2012-01-24 04:30:00','2016-01-14 18:18:40'),(34,'D046','J','307211741','','ARCADE CORPORATION, C.A.','Aeronáutico',0,0,'2012-09-07','AVENIDA FRANCISCO DE MIRANDA CC LIDO PISO 7 OFICINA 70-A, URBANIZACIÓN EL ROSAL , CARACAS.','CARACAS',232,'','','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2012-09-07 04:30:00','2016-01-14 18:25:52'),(35,'0007','V','041405500','','ARTESANIA  SHURUATA','No Aeronáutico',0,0,'2005-11-16','AEROPUERTO DE CIUDAD GUAYANA. PUERTO ORDAZ. EDO BOLIVAR.','CIUDAD GUAYANA',232,'8050','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2005-11-16 04:00:00','0000-00-00 00:00:00'),(36,'0008','J','095069630','2729652','ARTESANIA Y REGALOS YURUARI, C.A.','No Aeronáutico',0,0,'2005-11-16','AV.  GUAYANA  ZONA I NDUSTRIAL   AEROPUERTO  INTERNACIONAL  DEL  ORINOCO  CARLOS  MANUEL   PIAR   P.B.  LOCAL  5  PUERTO  ORDAZ','CIUDAD GUAYANA',232,'8050','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2005-11-16 04:00:00','0000-00-00 00:00:00'),(37,'2281','J','403301999','','ARTESANIAS AUTOCTONAS SHURUATA,C.A','No Aeronáutico',0,0,'2014-10-06','AV GUAYANA LOCAL AEROPUERTO INTERNACIONAL DEL ORINOCO MANUEL CARLOS PIAR  NRO4 SECTOR UNARE, PUERTO ORDAZ CIUDAD GUAYANA BOLIVAR','CIUDAD GUAYANA',232,'8050','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2014-10-06 04:30:00','0000-00-00 00:00:00'),(38,'0006','V','089464435','','ARTESANIAS CARONI GALETTI','No Aeronáutico',0,0,'2005-11-16','AV. GUAYANA. AEROPUERTO INTERNACIONAL. MANUEL PIAR. LOCAL Nº 1. PUERTO ORDAZ. EDO. BOLIVAR','CIUDAD GUAYANA',232,'8050','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2005-11-16 04:00:00','0000-00-00 00:00:00'),(39,'0055','J','303607322','5789320','ARTESANIAS EL ORFEBRE','No Aeronáutico',0,0,'2005-11-18','AV. JESUS SOTO CIUDAD BOLIVAR. EDO. BOLIVAR','BOLIVAR',232,'8001','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2005-11-18 04:00:00','0000-00-00 00:00:00'),(40,'0009','J','075035593','15355522','ASERCA AIRLINES, C.A.','Aeronáutico',0,0,'2005-11-16','AV. ANDRES  ELOY  BLANCO. C/C CALLE 137-C URB. PREBO -1 EDIFICIO ASERCA AIRLINES  VALENCIA. EDO. CARABOBO.','VALENCIA',232,'','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2005-11-16 04:00:00','0000-00-00 00:00:00'),(41,'0126','J','294032486','','ASOC COOPERATIVA TAXIS AEROPUERTO TOMAS DE HERES RL','No Aeronáutico',0,0,'2009-07-15','CIUDAD BOLIVAR','BOLIVAR',232,'8001','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2009-07-15 04:30:00','0000-00-00 00:00:00'),(42,'1389','J','312585773','','ASOC. COOP. LIDEM SERVICIOS 061, R.L','No Aeronáutico',0,0,'2012-01-26','CARRERA NEKUIMA, TORRE NEKUIMA PISO # 2 OFICINA # 27,  ALTA VISTA PUERTO ORDAZ','CIUDAD GUAYANA',232,'8050','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2012-01-26 04:30:00','0000-00-00 00:00:00'),(43,'1324','J','003192252','','AUTO SIETE VEINTISIETE C.A.','No Aeronáutico',0,0,'2011-01-28','CALLE CARABOBO QTA NRO 727 URB EL ROSAL','',232,'1060','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2011-01-28 04:30:00','0000-00-00 00:00:00'),(44,'0011','J','304942265','','AVIACION CUYUNI C.A.','Mixto',0,0,'2005-11-16','AEROPUERTO INTERNACIONAL MANUEL CARLOS PIAR. PUERTO ORDAZ. EDO. BOLIVAR.','CIUDAD GUAYANA',232,'8050','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2005-11-16 04:00:00','0000-00-00 00:00:00'),(45,'0012','J','302097843','','AVIOR AIRLINES, C.A.','Aeronáutico',0,0,'2005-11-16','AV. 4 DE MAYO SECTOR GENOVES EDIF. RESD. ORTEGA PLANTA BAJA LOCAL 1. NUEVA ESPARTA.','PORLAMAR',232,'','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2005-11-16 04:00:00','0000-00-00 00:00:00'),(46,'0013','V','126452442','263356802','BAGAJES  GILBERT','No Aeronáutico',0,0,'2005-11-16','URB.  LA  FLORESTA  EDIFICIO  LA  CEIBA.  APTO  2. C.  CARRERA  RUBIO.  PUERTO ORDAZ.  EDO. BOLIVAR','CIUDAD GUAYANA',232,'8050','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2005-11-16 04:00:00','0000-00-00 00:00:00'),(48,'0084','J','095048551','','BANCO CARONI, C.A, BANCO UNIVERSAL','Aeronáutico',0,0,'2006-02-22','AVENIDA UNIVERSIDAD, EDIFICIO BANCO CARONI, CARACAS','',232,'','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2006-02-22 04:00:00','0000-00-00 00:00:00'),(49,'1394','G','200078588','','BANCO DEL PUEBLO SOBERANO C.A. BANCO DE DESARROLLO','No Aeronáutico',0,0,'2012-03-09','CALLE ANDRES ELOY BLANCO EDIF. GALLO DE ORO PISO MEZZANINA OF. MEZZANINA SECTOR CATEDRAL','CARACAS',232,'1010','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2012-03-09 04:30:00','0000-00-00 00:00:00'),(50,'2278','J','299788627','','BIENES RAICES 286,C.A','No Aeronáutico',0,0,'2014-08-08','AV LAS AMERICAS CC LORETO II MEZANINA LOCAL NRO 27 SECTOR CENTRO PUERTO ORDAZ CIUDAD GUAYANA BOLIVAR','CIUDAD GUAYANA',232,'8050','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2014-08-08 04:30:00','0000-00-00 00:00:00'),(51,'0095','G','200051434','','C.V.G. TELECOMUNIC ACIONES,  C.A.','No Aeronáutico',0,0,'2007-03-13','VIA COLOMBIA  VIA COLOMBIA TORRE  LORETO II PISO 2','CIUDAD GUAYANA',232,'8050','0212-9501321 / 9501323',NULL,NULL,'jsoto@cvgtelecom.com.ve',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2007-03-13 04:00:00','0000-00-00 00:00:00'),(52,'1272','J','308440272','','CACAO TRAVEL GROUP, C.A','No Aeronáutico',0,0,'2009-08-20','CALLE BOYACA CASA NRO 08 SECTOR CASCO HISTORICO CD. BOLIVAR.','CIUDAD BOLIVAR',232,'8001','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2009-08-20 04:30:00','0000-00-00 00:00:00'),(53,'2285','J','305804176','','CADENA PANAMERICANA, C.A','No Aeronáutico',0,0,'2014-11-21','CALLE LAS ORQUIDEAS MANZ. 2 CASA Nº 3 URB. UD-232. VILLA LOEFLING CIUDAD GUAYANA. BOLIVAR','CIUDAD GUAYANA',232,'8050','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2014-11-21 04:30:00','0000-00-00 00:00:00'),(54,'D015','J','302211220','','CAMPAMENTO PARAKAUPA, C.A','Aeronáutico',0,0,'2011-05-25','PARQUE NACIONAL CANAIMA, ESTADO BOLIVAR.','',232,'','','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2011-05-25 04:30:00','2016-01-14 17:35:46'),(55,'0018','J','095006557','1509756','CANAIMA TOURS, C.A.','No Aeronáutico',0,0,'2005-11-16','PARQUE NACIONAL CANAIMA','CANAIMA',232,'','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2005-11-16 04:00:00','0000-00-00 00:00:00'),(56,'0019','J','095118177','2731045','CARONI RENTAL\'S,  C.A.','No Aeronáutico',0,0,'2005-11-16','ZONA  INDUSTRIAL  UNARE  II.  CALLE  QUERECURE.  EDIFICIO  CARONI.  RENTAL\'S. PUERTO  ORDAZ.  EDO. BOLIVAR','CIUDAD GUAYANA',232,'8050','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2005-11-16 04:00:00','0000-00-00 00:00:00'),(57,'0116','J','313533408','','CENTRO COMERCIAL HOTEL PORTOFINO INN, C.A','No Aeronáutico',0,0,'2009-07-08','CALLE COCHABAMBA CON POTOSI CC PORTOFINO NIVEL TERRAZA OF D-15 URB. VILLA BOLIVIA PTO ORDAZ.','CIUDAD GUAYANA',232,'8050','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2009-07-08 04:30:00','0000-00-00 00:00:00'),(58,'D060','J','080008219','2695499','COMERCIAL DE AVIACIÓN','Aeronáutico',0,0,'2005-11-22','CALLE  PRINCIPAL DEL  YAQUE  EDIF.  AEROPUERTO  SANTIAGO  MARIÑO  PISO  SN  LOCAL  SN  SECTOR  EL  YAQUE','MARGARITA',232,'6325','','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2005-11-22 04:00:00','2016-01-14 18:35:26'),(59,'0106','J','295533128','','COMUNICACIONES VENESPAN, C.A.','No Aeronáutico',0,0,'2008-04-28','AV. GUAYANA NRO. PB-10 LOCAL AEROPUERTO INTERNACIONAL CARLOS MANUEL PIAR SECTOR UNARE.','CIUDAD GUAYANA',232,'8050','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2008-04-28 04:30:00','0000-00-00 00:00:00'),(60,'0021','J','313244759','413483808','COMUNICACIONES VICKY  VICTOR, C.A.','No Aeronáutico',0,0,'2005-11-16','AV. GUAYANA. AEROPUERTO INTERNACIONAL MANUEL PIAR  PB. UNARE. PUERTO ORDAZ. EDO. BOLIVAR','CIUDAD GUAYANA',232,'8050','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2005-11-16 04:00:00','0000-00-00 00:00:00'),(61,'D016','J','003320072','','CONSORCIO HELITEC, C.A.','Aeronáutico',0,0,'2011-05-25','CCCT CHUAO, CARACAS, DISTRITO CAPITAL, VENEZUELA.','',232,'','','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2011-05-25 04:30:00','2016-01-14 17:36:30'),(62,'0092','J','309388479','252760512','CONSORCIO TRANSPORTE LOS PINOS','No Aeronáutico',0,0,'2006-05-01','EDIFICIO TRAKI  -  GALPON  I  ZONA INDUSTRIAL  LOS PINOS  PUERTO  ORDAZ','CIUDAD GUAYANA',232,'8050','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2006-05-01 04:00:00','0000-00-00 00:00:00'),(63,'0081','G','200077743','','CONVIASA','Aeronáutico',0,0,'2006-02-08','AV. INTERCOMUNAL AEROPUERTO INTERNACIONAL DE MAIQUETIA EDIF. SECTOR 6.3, ZONA ESTRATEGICA, LADO ESTE DEL  AEROPUERTO INTERNACIONAL  DE MAIQUETIA, ADYANCENTE A TRANSITO TERRESTRE.','CARACAS',232,'1071','0212-3037367',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2006-02-08 04:00:00','0000-00-00 00:00:00'),(64,'0099','J','293856655','','COOP. AEROPUERTO MANUEL CARLOS PIAR, R.L.','No Aeronáutico',0,0,'2007-07-20','AV. GUAYANA EDIF.AEROP. PISO PB OF. AEROPUERTO CARLOS MANUEL PIAR, URB. UNARE. PUERTO ORDAZ.','CIUDAD GUAYANA',232,'8050','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2007-07-20 04:00:00','0000-00-00 00:00:00'),(65,'0098','J','293874483','','COOP. DE TRANSP. EJEC. AEROPUERTO CARLOS MANUEL PIAR, RL.','No Aeronáutico',0,0,'2007-07-13','AV. GUAYANA EDIF. AEROPUERTO PISO PB, OF PB URB UNARE PUERTO ORDAZ.','CIUDAD GUAYANA',232,'8050','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2007-07-13 04:00:00','0000-00-00 00:00:00'),(66,'0025','J','313285480','415187076','DE ORIS ARTESANIA, C.A.','No Aeronáutico',0,0,'2005-11-16','AV. GUAYANA.  AEROPUERTO  INTERNACIONAL  MANUEL  PIAR  MZZ..  LOCAL 02 PUERTO ORDAZ','CIUDAD GUAYANA',232,'8050','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2005-11-16 04:00:00','0000-00-00 00:00:00'),(67,'1041','J','000797234','','DEL SUR BANCO UNIVERSAL, C.A.','No Aeronáutico',0,0,'2009-08-20','AV.  SAN JUAN  BOSCO EDIF CENTRO ALTAMAIRA PISO 18 OF UNICA ALTAMIRA.','CARACAS',232,'','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2009-08-20 04:30:00','0000-00-00 00:00:00'),(68,'D033','J','000107017','','DELL AQUA, C.A.','Aeronáutico',0,0,'2011-10-06','AVENIDA LAS AMERICAS, TORRE ANTON PISO 02, PUERTO ORDAZ - ESTADO BOLIVAR.','CIUDAD GUAYANA',232,'8050','','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2011-10-06 04:30:00','2016-01-14 18:12:42'),(69,'0027','J','307184671','152917584','DESARROLLOS EL GRANO DE CAFE, C.A.','No Aeronáutico',0,0,'2005-11-16','CALLE CHACAITO BELLO MONTE. EDIFICIO MINA P-1-11. CARACAS.','CARACAS',232,'1050','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2005-11-16 04:00:00','0000-00-00 00:00:00'),(70,'0028','J','311657193','339425400','DISTRIBUIDORA  DE  QUESOS  Y  DULCES  GUAIPO, C.A.','No Aeronáutico',0,0,'2005-11-16','PASEO CARONI  AEROPUERTO  INTERNACIONAL  DEL  ORINOCO  MANUEL  PIAR.  ALTA  VISTA  GAL  DE  ARTE  DEL  SUR  Nº 2  PUERTO  ORDAZ.  EDO. BOLIVAR','CIUDAD GUAYANA',232,'8050','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2005-11-16 04:00:00','0000-00-00 00:00:00'),(71,'0056','J','306937757','','DULCES EL PANAL','No Aeronáutico',0,0,'2005-11-18','URB. LAS ROSAS CALLE PRINCIPAL LAS FLORES. CIUDAD BOLIVAR. EDO. BOLIVAR','BOLIVAR',232,'8001','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2005-11-18 04:00:00','0000-00-00 00:00:00'),(72,'0057','V','088683567','','DULCES GUAIPO','No Aeronáutico',0,0,'2005-11-18','CALLE BOLIVAR Nº 42. CIUDAD BOLIVAR EDO BOLIVAR','BOLIVAR',232,'8001','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2005-11-18 04:00:00','0000-00-00 00:00:00'),(73,'0083','J','314635557','492602531','EC. VENEZUELA , C.A.','No Aeronáutico',0,0,'2006-02-22','AV. BOLIVAR NORTE EDIF. TORRE STRATOS PISO 7 OF S/N URB EL RECREO','VALENCIA',232,'2001','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2006-02-22 04:00:00','0000-00-00 00:00:00'),(74,'D030','J','095133133','','ECO, C.A.','Aeronáutico',0,0,'2011-09-19','CIUDAD GUAYANA,  ESTADO BOLIVAR.','CIUDAD GUAYANA',232,'8050','','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2011-09-19 04:30:00','2016-01-14 18:10:36'),(75,'1325','J','301113381','','EDITORIAL RG, C.A.','No Aeronáutico',0,0,'2011-02-03','CALLE ARO CON CARRERA CHURUN MERU EDIF EDIFICIO CENTRO CORPORATIVO NUEVA PRENSA PISO 01 OF 01 SECTO','CIUDAD GUAYANA',232,'8050','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2011-02-03 04:30:00','0000-00-00 00:00:00'),(76,'1291','J','298034777','','EDNA\'S CAFE EXPRESS, C.A.','No Aeronáutico',0,0,'2009-11-27','AV GUAYANA EDIF. TERMINAL AEREO PISO P.B. LOCAL PA-09 SECTOR AEROPUERTO MANUEL PIAR.','CIUDAD GUAYANA',232,'8050','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2009-11-27 04:30:00','0000-00-00 00:00:00'),(77,'1354','G','200002522','','EJECUTIVO DEL ESTADO BOLÍVAR','No Aeronáutico',0,0,'2011-09-19','CALLE AMOR PATRIO CON CONSTITUCIÓN, CIUDAD BOLÍVAR','CIUDAD BOLIVAR',232,'8001','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2011-09-19 04:30:00','0000-00-00 00:00:00'),(78,'0031','V','039717880','','EL PANAL','No Aeronáutico',0,0,'2005-11-16','CALLE VICTORIA Nº 21. LAS FLORES. CIUDAD BOLIVAR. EDO. BOLIVAR','BOLIVAR',232,'8001','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2005-11-16 04:00:00','0000-00-00 00:00:00'),(79,'D071','J','295678053','','ESTELAR LATINOAMERICANA C.A.','Aeronáutico',0,0,'2011-09-27','CARACAS - DISTRITO CAPITAL.','CARACAS',232,'','0212-9616979','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2011-09-27 04:30:00','2016-01-14 18:42:40'),(80,'D070','J','001215590','','EUROBUILDING INTERNACIONAL, C.A.','Aeronáutico',0,0,'2007-05-01','CALLE LA GUAIRITA,  CHUAO - ESTADO MIRANDA.','CARACAS',232,'','','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2007-05-10 04:00:00','2016-01-14 18:42:25'),(81,'0085','J','314369300','476536731','F1  EXPRESS, C.A.','No Aeronáutico',0,0,'2006-03-10','LOCAL PB  - 11  INSTALACIONES  DEL  AEROPUERTO  MANUEL PIAR  AV.  GUAYANA   PUERTO  ORDAZ','CIUDAD GUAYANA',232,'8050','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2006-03-10 04:00:00','0000-00-00 00:00:00'),(82,'1350','G','200086904','','FUNDACION SOCIAL BOLIVAR','Aeronáutico',0,0,'2011-08-26','URB. RORAIMA CARRERA CHURUM MERU EDIF. MUNDO DE SONRISAS, PUERTO ORDAZ','CIUDAD GUAYANA',232,'8050','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2011-08-26 04:30:00','0000-00-00 00:00:00'),(83,'1418','J','400861390','','GALAUTOS RENTA CAR II, C.A','No Aeronáutico',0,0,'2012-09-04','AV. JESUS SOTO EDIF. AEROPUERTO GENERAL TOMAS DE HERES LOCAL PB-10 SECTOR AEROPUERTO CD BOLIVAR','BOLIVAR',232,'8001','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2012-09-04 04:30:00','0000-00-00 00:00:00'),(84,'D024','J','311618775','','GRUPO ATAHUALPA, C.A.','Aeronáutico',0,0,'2015-07-13','ESQUINA ROMUALDA A MANDUCA, CALLEJON MANDUCA EDIF. 93, LA CANDELARIA, CARACAS','CIUDAD GUAYANA',232,'8050','','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2015-07-13 04:30:00','2016-01-14 17:38:44'),(85,'D037','J','297615237','','GRUPO FANJET, S.A.','Aeronáutico',0,0,'2011-12-13','AV. PRINCIPAL DEL HATILLO, CC PASEO, TORRE DE OFICINA, PISO 10.','CARACAS',232,'','','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2011-12-13 04:30:00','2016-01-14 18:15:28'),(86,'0034','J','311041567','316073107','GUAYANA HANDLING, C.A.','No Aeronáutico',0,0,'2005-11-16','AV. GUAYANA AEROPUERTO INTERNACIONAL MANUEL CARLOS  PIAR. PLATAFORMA. PUERTO ORDAZ. EDO. BOLIVAR','CIUDAD GUAYANA',232,'8050','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2005-11-16 04:00:00','0000-00-00 00:00:00'),(88,'0035','J','313498831','426607360','INFOTRAVEL, C.A','No Aeronáutico',0,0,'2005-11-16','AV. PASEO CARONI. CENTRO COMERCIAL GRAN SABANA. PISO 02. OFICINA Nº 71. PUERTO ORDAZ. EDO. BOLIVAR','CIUDAD GUAYANA',232,'8050','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2005-11-16 04:00:00','0000-00-00 00:00:00'),(89,'2290','G','200086327','','INSAI','No Aeronáutico',0,0,'2015-03-18','MARACAY EDO. ARAGUA A. LAS DELICIAS EDF. INIA OFC. INSAI','',232,'','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2015-03-18 04:30:00','0000-00-00 00:00:00'),(90,'D055','J','293569320','','INSEL AIR INTERNATIONAL B.V, S.R.L','Aeronáutico',0,0,'2015-04-14','VALENCIA ESTADO CARABOBO','',232,'','','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2015-04-14 04:30:00','2016-01-14 18:30:13'),(91,'1367','G','200028386','','INSTITUTO NACIONAL DE AERONAUTICA CIVIL','No Aeronáutico',0,0,'2011-11-08','AEROPUERTO INTERNACIONAL MANUEL CARLOS PIAR','CIUDAD GUAYANA',232,'8050','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2011-11-08 04:30:00','0000-00-00 00:00:00'),(92,'D050','J','310545537','','INVERSIONES ALMACENADORA 2020, C.A','Aeronáutico',0,0,'2013-03-02','CARACAS - DISTRITO CAPITAL','',232,'','','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2013-03-20 04:30:00','2016-01-14 18:27:08'),(93,'1273','J','293600030','','INVERSIONES CASTRO BIENES Y RAICES, C.A.','No Aeronáutico',0,0,'2009-08-20','CR TOCOMA, CRUCE AV. GUAYANA CC CAURA NIVEL PB LOCAL 06 URB ALTA VISTA NORTE, PUERTO ORDAZ.','CIUDAD GUAYANA',232,'8050','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2009-08-20 04:30:00','0000-00-00 00:00:00'),(94,'0036','J','311985212','353850458','INVERSIONES INGEDANA, C.A.','No Aeronáutico',0,0,'2005-11-16','AV. 50. URB  MONTALBAN  I  EDIFICIO VEGA  DEL  ESTE  II.  P  3.','CARACAS',232,'1020','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2005-11-16 04:00:00','0000-00-00 00:00:00'),(95,'1343','J','307925671','','INVERSIONES MARIA SANCHEZ, C.A.','No Aeronáutico',0,0,'2011-06-14','VDA. 4 CASA NRO 6 URB LAS MERCEDES, SECTOR 3. LA VICTORIA, ESTADO ARAGUA','LA VICTORIA',232,'2121','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2011-06-14 04:30:00','0000-00-00 00:00:00'),(96,'0037','J','000572500','64049526','ITALCAMBIO CASA DE CAMBIO, C.A.','No Aeronáutico',0,0,'2005-11-16','AV. URDANETA, ESQUINA  DE  ANIMAS  A   PLATANAL.  EDIFICIO  CAMORUCO,  P.B.  URB. LA CANDELARIA  CARACAS.','CARACAS',232,'','5629555',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2005-11-16 04:00:00','0000-00-00 00:00:00'),(97,'1326','J','299586862','','LAFLICH RENTAL SERVICES, C.A.','No Aeronáutico',0,0,'2011-02-04','AV. JOSE TADEO MONAGAS, CASA N 54, SECTOR LAS COCUIZAS','',232,'','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2011-02-04 04:30:00','0000-00-00 00:00:00'),(98,'0039','V','039701657','326006033','LIBRERIA  Y  REVISTERO  AEROPUERTO','No Aeronáutico',0,0,'2005-11-16','PUERTO  ORDAZ.  URB.  LOS  OLIVOS,  CALLE  PONTEVEDRA   C.R.  DON  MIGUEL. CASA  02 - F','CIUDAD GUAYANA',232,'8050','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2005-11-16 04:00:00','0000-00-00 00:00:00'),(99,'D032','J','003644455','','LINEA  AEREA DE SERVCICIO EJECUTIVO REGIONAL (LASER), C.A.','Aeronáutico',0,0,'2011-09-27','AV. FRANCISCO DE MIRANDA, TORRE BAZAR BOLIVAR, PISO 8, URB. EL MARQUEZ. CARACAS.','CARACAS',232,'','','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2011-09-27 04:30:00','2016-01-14 18:12:14'),(100,'D059','J','001633650','40866272','LINEA TURISTICA AEROTUY L.T.A. C.A','Aeronáutico',0,0,'2005-11-22','EDIFICIO GRAN SABANA. SABANA GRANDE','CARACAS',232,'','','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2005-11-22 04:00:00','2016-01-14 18:35:10'),(101,'D064','J','095143201','','LLOYD AVIATION, C.A.','Aeronáutico',0,0,'2006-02-06','CALLE EL CALLAO, EDIF TORRE LLOYD, PISO MZ LOCAL 2 SECTOR CENTRO','CIUDAD GUAYANA',232,'8050','9514584 / 9527078','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2006-02-06 04:00:00','2016-01-14 18:39:50'),(102,'0107','J','000214107','','MAPFRE LA SEGURIDAD C.A.','No Aeronáutico',0,0,'2008-07-14','CALLE 3-A EDIFICIO MAPFRE LA SEGURIDAD PB, LA URBINA SUR EDO. MIRANDA','CARACAS',232,'','0212- 2138036',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2008-07-14 04:30:00','0000-00-00 00:00:00'),(105,'0015','J','000029610','48432743','MERCANTIL, C.A., BANCO  UNIVERSAL','No Aeronáutico',0,0,'2005-11-16','AV.  ANDRES  BELLO  EDIFICIO MERCANTIL  PISO 26  OFIC P26  URB. SAN BERNARDINO .','CARACAS',232,'1010','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2005-11-16 04:00:00','0000-00-00 00:00:00'),(106,'1416','J','400753953','','MILLA\'S TRAVEL, C.A.','Mixto',0,0,'2012-08-09','AV. VIA CARACAS C.C. EMPRESARIAL AUTANA NIVEL # 1 OFICINA 104, ZONA INDUSTRIAL LOS PINOS','CIUDAD GUAYANA',232,'8050','','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2012-08-09 04:30:00','2016-01-09 01:23:22'),(107,'0041','J','310439486','','NAVIERA BONYO, C.A.','No Aeronáutico',0,0,'2005-11-16','AEROPUERTO INTERNACIONAL DEL ORINOCO MANUEL PIAR. PUERTO ORDAZ. EDO. BOLIVAR','CIUDAD GUAYANA',232,'8050','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2005-11-16 04:00:00','0000-00-00 00:00:00'),(108,'0042','J','306819398','126629800','NEW CAR RENTAL\'S, C.A.','No Aeronáutico',0,0,'2005-11-16','UNARE  II.  CALLE  PRESPUNTAL,  PARCELA  289 - 0204.  PUERTO  ORDAZ.  EDO. BOLIVAR','CIUDAD GUAYANA',232,'8050','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2005-11-16 04:00:00','0000-00-00 00:00:00'),(109,'0044','J','300605019','4828461','ORINOCO CAR RENT, C.A.','No Aeronáutico',0,0,'2005-11-16','HOTEL  RASIL.  CENTRO  CIVICO.  PUERTO  ORDAZ.  EDO. BOLIVAR','CIUDAD GUAYANA',232,'8050','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2005-11-16 04:00:00','0000-00-00 00:00:00'),(110,'1322','J','095178030','','ORINOCO WING AIR, C.A','No Aeronáutico',0,0,'2011-01-04','CALLE EL CALLAO EDIF TORRE LLOYD PISO MZ LOCAL 2 SECTOR CENTRO','CIUDAD GUAYANA',232,'8050','0286- 9237376',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2011-01-04 04:30:00','0000-00-00 00:00:00'),(111,'1293','J','000020388','','ORINOKIA  DE LUXE HOTEL, C.A','No Aeronáutico',0,0,'2010-02-11','CALLE CARONI, 2DA TRANSVERSAL CASTILLITO NRO S/N SECTOR CERRO RONDON / PUERTO ORDAZ.','CIUDAD GUAYANA',232,'8050','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2010-02-11 04:30:00','0000-00-00 00:00:00'),(112,'0026','J','001230726','19615','PDVSA  PETRÓLEOS, S.A.','No Aeronáutico',0,0,'2005-11-16','EDIFICIO PETRÓLEOS DE VENEZUELA, TORRE ESTE, P.H., AV. LIBERTADOR CON CALLE EL EL EMPALME, URB. LA CAMPIÑA,  CARACAS  - DISTRITO  FEDERAL','CARACAS',232,'1071','','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2005-11-16 04:00:00','2016-01-09 00:56:20'),(113,'1381','J','306995188','','PREMIER CLUB, C.A.','No Aeronáutico',0,0,'2012-01-04','AV. PRINCIPAL DE PLAYA GRANDE CON CALLE N 5 CC MINI CENTRO COMERCIAL MARIA VIRGINIA NIVEL PLANTA BAJA','CARACAS',232,'1160','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2012-01-04 04:30:00','0000-00-00 00:00:00'),(114,'D036','J','003173924','','PROFIT C.A.','Aeronáutico',0,0,'2011-11-15','AVENIDA LA ESTANCIA, CCCT TORRE A NIVEL 6 OFIC. 608, URB. CHUAO, CARACAS.','CARACAS',232,'','','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2011-11-15 04:30:00','2016-01-14 18:15:06'),(115,'D034','J','293696631','','PROSPERI AIR,C.A.','Aeronáutico',0,0,'2011-11-09','AEROPUERTO CARACAS, CHARALLAVE, ESTADO MIRANDA.','CIUDAD GUAYANA',232,'8050','','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2011-11-09 04:30:00','2016-01-14 18:13:14'),(116,'D010','J','303756603','','PROYECTOS Y CONSTRUCCIONES P&H C.A.','Aeronáutico',0,0,'2013-09-02','CENTRO COMERCIAL GRAN SABANA, SEGUNDO PISO, OFICINA 73, PUERTO ORDAZ.','',232,'','','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2013-09-20 04:30:00','2016-01-14 17:30:01'),(117,'0046','J','000450730','','RENTA MOTOR , C.A.','No Aeronáutico',0,0,'2005-11-16','AV.  PRINCIPAL  EL  BOSQUE.  EDIFICIO  PICHINCHA  PISO 7.  OFICINA 71.  URB.  EL BOSQUE  CHACAITO  CARACAS','CARACAS',232,'1050','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2005-11-16 04:00:00','0000-00-00 00:00:00'),(118,'0017','J','316497976','','REPRESENTACIONES TURISTICAS CANAIMA, C.A.','No Aeronáutico',0,0,'2005-11-16','AEROPUERTO INTERNACIONAL DEL ORINOCO MANUEL PIAR, SECTOR AEROCLUB CARONI HANGAR 08-09. PUERTO ORDAZ, ESTADO BOLIVAR','CIUDAD GUAYANA',232,'8015','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2005-11-16 04:00:00','0000-00-00 00:00:00'),(119,'D029','J','307326328','','REPRESENTACIONES VINSOCA, C.A.','Aeronáutico',0,0,'2011-09-14','TORRE KLM PISO 10 SANTA EDUBIGIS, CARACAS, DISTRITO CAPITAL, VENEZUELA.','CIUDAD GUAYANA',232,'8050','','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2011-09-14 04:30:00','2016-01-14 18:07:05'),(120,'1286','J','297915290','','REPRESENTACIONES Y SERVICIOS  MAGALLANES LONGONI, C.A.','No Aeronáutico',0,0,'2009-11-12','AV. GUAYANA AEROPUERTO MANUEL CARLOS PIAR NRO B URB  UNARE II, PUERTO ORDAZ.','CIUDAD GUAYANA',232,'8050','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2009-11-12 04:30:00','0000-00-00 00:00:00'),(121,'D042','J','314671367','','RG AVIATIÓN, C.A','Aeronáutico',0,0,'2012-01-26','AEROPUERTO CARACAS OMZ, HANGAR CORPORATIVO 2.','',232,'','','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2012-01-26 04:30:00','2016-01-14 18:21:30'),(122,'0047','J','000860874','','ROFRER, S.A.','No Aeronáutico',0,0,'2005-11-16','CALLE  LOURDES  CON  AV. NUEVA  GRANADA.  EDIFICIO  DUDGET CAR  RENTAL. URB.  LAS  ACACIAS.  CARACAS  DF. 1040  VENEZUELA','CARACAS',232,'','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2005-11-16 04:00:00','0000-00-00 00:00:00'),(123,'D072','J','308192252','','RUTAS AEREAS DE VENEZUELA RAV S.A.','Aeronáutico',0,0,'2009-09-08','AV. PPAL ZONA DE CARGA LOCAL C0003 AEROPUERTO INTERNACIONAL LA CHINITA.','MARACAIBO',232,'4001','','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2009-09-08 04:30:00','2016-01-14 18:43:11'),(124,'0048','J','095003965','2906619','RUTAS AEREAS, C.A.','Aeronáutico',0,0,'2005-11-16','AV. JESUS SOTO SECTOR AEROPUERTO EDIFICIO  TALLER MARES . CIUDAD BOLIVAR. EDO. BOLIVAR','BOLIVAR',232,'8001','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2005-11-16 04:00:00','0000-00-00 00:00:00'),(125,'D002','J','312952512','','S&S ORINOCO AVIATIÓN C.A','Aeronáutico',0,0,'2007-12-27','CALLE ARO CC CARONI PLAZA NIVEL 4 LOCAL 4-1 SECTOR ALTA VISTA PUERTO ORDAZ','CIUDAD GUAYANA',232,'8050','','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2007-12-27 04:30:00','2016-01-14 17:28:35'),(126,'1341','G','200040637','','SERVICIO AUTONOMO DE AEROPUERT REG DEL EDO BOLIVAR','No Aeronáutico',0,0,'2011-06-06','AVENIDA JESUS SOTO EDIFICIO TERMINAL AEREO CIUDAD BOLIVAR','',232,'','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2011-06-06 04:30:00','0000-00-00 00:00:00'),(127,'1316','G','200003030','','SERVICIO NACIONAL INTEGRADO DE ADMON ADUANERA Y TRI','No Aeronáutico',0,0,'2010-11-05','CARRERA TOCOMA CON CALLE ARO, EDIFICIO MIMU, 1 ER. PISO, ALTA VISTA NORTE. PUERTO ORDAZ. - EDO. BOLIVAR','CIUDAD GUAYANA',232,'8050','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2010-11-05 04:30:00','0000-00-00 00:00:00'),(128,'D049','J','095016714','2722720','SERVICIOS AEREOS MINEROS, C.A.','Aeronáutico',0,0,'2005-11-16','AEROPUERTO INTERNACIONAL DEL ORINOCO MANUEL PIAR, PUERTO ORDAZ','CIUDAD GUAYANA',232,'8050','','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2005-11-16 04:00:00','2016-01-14 16:30:04'),(129,'D053','J','299292311','','SERVICIOS AEREOS PROFESIONALES SAP, C.A.','Aeronáutico',0,0,'2014-04-12','CARRIZAL, ESTADO MIRANDA.','',232,'','','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2014-04-12 04:30:00','2016-01-14 18:28:47'),(130,'D023','J','317653440','','SERVICIOS DE EMPAQUES Y MANTENIMIENTO NEKUIMA C.A.','Aeronáutico',0,0,'2012-11-07','ZONA INDUSTRIAL LOS PINOS, MANZANA Nº 6, PARCELA 9 Y 10, PUERTO ORDAZ  - ESTADO BOLIVAR.','CIUDAD GUAYANA',232,'8050','0286 - 9942156','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2012-11-07 04:30:00','2016-01-14 17:38:05'),(131,'0223','J','297695796','','SERVICIOS Y SUMINISTROS LA MAXIMA, C.A','No Aeronáutico',0,0,'2013-07-15','CTRA PARQUE  INDUSTRIAL LOS PINOS, EDIF CENTRO EMPRESARIAL CUBO VERDE PISO P/B','CIUDAD GUAYANA',232,'8050','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2013-07-15 04:30:00','0000-00-00 00:00:00'),(132,'0050','J','000413916','','SIDOR C.A.','No Aeronáutico',0,0,'2005-11-16','ZONA INDUSTRIAL MATANZAS. PUERTO ORDAZ. EDO. BOLIVAR','CIUDAD GUAYANA',232,'8050','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2005-11-16 04:00:00','0000-00-00 00:00:00'),(133,'D003','J','301791940','','SILVA SHIPPING AGENCY, C.A','Aeronáutico',0,0,'2011-01-04','CALLE ARO CC CARONI PLAZA NIVEL LOCAL 4 - 01 ZONA ALTA VISTA PUERTO ORDAZ.','CIUDAD GUAYANA',232,'8050','','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2011-01-04 04:30:00','2016-01-14 17:34:54'),(134,'0123','J','307371889','','SUNDANCE AIR VENEZUELA, C.A.','No Aeronáutico',0,0,'2009-07-15','AV. LA ESTANCIA URB. CHUAO C.C.C.T. NIVEL C-2 OFIC. MZ - 03-B2','CARACAS',232,'1060','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2009-07-15 04:30:00','0000-00-00 00:00:00'),(135,'1407','J','296161364','','SUNDANCE AVSEC CONTROL AND SERVICE C.A.','No Aeronáutico',0,0,'2012-06-11','AV. CALLE 10 CON AVENIDA PRINCIPAL LA ATLANTIDA CC CENTRO EMPRESARIAL JARDINES PLAZA NIVEL 3 LOCAL','',232,'','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2012-06-11 04:30:00','0000-00-00 00:00:00'),(136,'1292','J','003439940','','TELEFÓNICA VENEZOLANA, C.A..','No Aeronáutico',0,0,'2009-12-11','AV. FRANCISCO DE MIRANDA CC EL PARQUE NIVEL 6 OF 6 URB LOS PALOS GRANDES CARACAS.','CARACAS',232,'1070','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2009-12-11 04:30:00','0000-00-00 00:00:00'),(137,'D069','J','311767096','','TRAKI  IVG  PLUS, C.A','Aeronáutico',0,0,'2007-11-28','ZONA INDUSTRIAL LOS PINOS CALLE 6 MANZANA 29 GALPON 2 EDIFICIO TRAKI PUERTO ORDAZ ESTADO BOLIVAR','CIUDAD GUAYANA',232,'8050','0286-9944661 / 9944385','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2007-11-28 04:00:00','2016-01-14 18:41:54'),(138,'D062','J','305703809','','TRANSCARGA INTL. AIRWAYS, C.A','Aeronáutico',0,0,'2006-02-03','Av. Rio Caura. Torre Humbolt,  piso 05 oficina 5-13. Prado del Este. Caracas. Punto referencia Centro Comercial Congresa.','CARACAS',232,'1030','2129776918','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2006-02-03 04:00:00','2016-01-14 18:39:09'),(139,'0074','J','095006573','3314812','TRANSMANDU C.A.','Aeronáutico',0,0,'2005-11-22','AV. JESUS SOTO. AEROPUERTO CIUDAD BOLIVAR EDO. BOLIVAR','BOLIVAR',232,'8001','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2005-11-22 04:00:00','0000-00-00 00:00:00'),(140,'1443','J','001976663','','TRANSPORTE DE VALORES BANCARIOS TRANSBANCA, C.A.','No Aeronáutico',0,0,'2013-03-21','SAN MARTIN CENTRO INDUSTRIAL PALO GRANDE','DISTRITO CAPITAL',232,'','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2013-03-21 04:30:00','0000-00-00 00:00:00'),(141,'1282','J','304684339','','TRANSPORTE DE VALORES VISETECA','No Aeronáutico',0,0,'2009-10-05','EDIF. BANCO PROVINCIAL , SÓTANO AV. GUAYANA, ALATA VISTA. PUERTO ORDAZ.','CIUDAD GUAYANA',232,'8050','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2009-10-05 04:30:00','0000-00-00 00:00:00'),(142,'D061','J','095034330','3094359','TRANSPORTE NACIONALES (TRANACA)','Aeronáutico',0,0,'2005-11-22','AV. JESUS SOTO. CIUDAD BOLIVAR. EDO. BOLIVAR','BOLIVAR',232,'8001','','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2005-11-22 04:00:00','2016-01-14 18:35:44'),(143,'D057','J','300925811','5763606','TURISMO AEREO AMAZONAS','Aeronáutico',0,0,'2005-11-18','AV JESUS SOTO CIUDAD BOLIVAR EDO. BOLIVAR','BOLIVAR',232,'8001','','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2005-11-18 04:00:00','2016-01-14 18:34:10'),(145,'0087','J','003314609','','UNIGLOBE CANDES  TRAVEL, C.A.','No Aeronáutico',0,0,'2006-03-23','AVENIDA  FRANCISCO  DE  MIRANDA  URB.  LOS  PALOS  GRANDES  EDIF.  PARQUE  CRISTAL  TORRE  OESTE  PISO  6  LOC.  63 - 64','CARACAS',232,'1060','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2006-03-23 04:00:00','0000-00-00 00:00:00'),(146,'0051','V','037694661','','VARIEDADES MICHELANGELLI','No Aeronáutico',0,0,'2005-11-16','AV. 1. URB SAN RAFAEL. QTA. ITIMAR Nº 03. CIUDAD BOLIVAR. EDO. BOLIVAR','BOLIVAR',232,'8001','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2005-11-16 04:00:00','0000-00-00 00:00:00'),(147,'D028','J','304780869','','VENEQUIP, S.A.','Aeronáutico',0,0,'2011-07-08','ZONA INDUSTRIAL 1 CALLE 4 EDIFICIO VENEQUIP, BARQUISIMETO -  ESTADO LARA.','BARQUISIMETO',232,'3001','','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2011-07-08 04:30:00','2016-01-14 18:06:13'),(148,'D056','J','405395311','','VUELOS I VUELOS C.A.','Aeronáutico',0,0,'2015-05-25','CALLE ESTE EDIF. ESTE 9 PISO 2 APT.24-A, URB. MANZANARES, BARUTA, CARACAS, MIRANDA.','',232,'','','','','','',0.00,0.00,0.00,0.00,1,0.00,0.00,'','2015-05-25 04:30:00','2016-01-14 18:32:10'),(149,'01440','J','40205013','','INVERSIONES GALETTE EXPRESS, C.A','No Aeronáutico',0,0,'2016-01-06','','',232,'','','','','','',0.00,0.00,0.00,0.00,0,5.00,75.00,'','2016-01-06 20:26:41','2016-01-06 20:26:41'),(150,'D001','J','29904586-1','','JUCA, C.A','Aeronáutico',0,0,'2016-01-07','CALLE LA ARBOLEDA CONJUNTO RESIDENCIAL LA OLIVEÑA TOWN HOUSE Nº19 URB LOS OLIVOS PUERTO ORDAZ','',232,'','','','','','',0.00,0.00,0.00,0.00,0,5.00,75.00,'','2016-01-08 00:32:41','2016-01-09 00:06:44'),(153,'D005','V','5148707','','ROJAS REINALDO','Aeronáutico',0,0,'2016-01-08','CARACAS - DISTRITO CAPITAL.','',232,'','','','','','',0.00,0.00,0.00,0.00,0,5.00,75.00,'','2016-01-09 01:56:44','2016-01-09 01:56:44'),(154,'D006','J','315929350','','INVERSIONES KING AIR BB-611, C.A.','Aeronáutico',0,0,'2016-01-08','CARACAS - DISTRITO CAPITAL.','',232,'','','','','','',0.00,0.00,0.00,0.00,0,5.00,75.00,'','2016-01-09 02:28:18','2016-01-09 02:28:18'),(155,'D007','V','6940492','','CORSER LUIS','Aeronáutico',0,0,'2016-01-08','CARACAS - DISTRITO CAPITAL.','',232,'','','','','','',0.00,0.00,0.00,0.00,0,5.00,75.00,'','2016-01-09 02:41:32','2016-01-09 02:41:32'),(156,'D008','J','295175779','','INVERSIONES MORAIMA C.A.','Aeronáutico',0,0,'2016-01-08','AVENIDA JESUS  SOTO, AEROPUERTO GENERAL TOMAS DE HERES, HANGAR AERO TRANSPORTE LA MONTAÑA, CIUDA BOLIVAR, EDO. BOLIVAR.','',232,'','','','','','',0.00,0.00,0.00,0.00,0,5.00,75.00,'','2016-01-09 03:45:57','2016-01-09 03:51:21'),(157,'D014','V','17163746','','SEGUIAS CARLOS','Aeronáutico',0,0,'2016-01-09','CIUDAD BOLIVAR - ESTADO BOLIVAR.','',232,'','','','','','',0.00,0.00,0.00,0.00,0,5.00,75.00,'','2016-01-09 04:37:39','2016-01-14 16:18:35'),(158,'D013','J','000004676','','AEROTECNICA S.A.','Aeronáutico',0,0,'2016-01-09','AERPUERTO OSCAR MACAHODO ZULUAGA, CHARALLAVE.','',232,'','','','','','',0.00,0.00,0.00,0.00,0,5.00,75.00,'','2016-01-09 04:53:57','2016-01-09 04:53:57'),(159,'D018','V','4639163','','RIVAS MICHEL','Aeronáutico',0,0,'2016-01-10','BARQUISIMETO.  ESTADO LARA.','',232,'','','','','','',0.00,0.00,0.00,0.00,0,5.00,75.00,'','2016-01-11 01:52:37','2016-01-11 01:52:37'),(160,'D017','J','315787644','','GRUPO ANCORA C.A.','Aeronáutico',0,0,'2016-01-10','GUATIRE . ESTADO MIRANDA.','',232,'','','','','','',0.00,0.00,0.00,0.00,0,5.00,75.00,'','2016-01-11 02:01:19','2016-01-11 02:01:19'),(161,'D019','J','31173673-5','','THE COMPANY METAL, C.A','Aeronáutico',0,0,'2016-01-13','MARACAY EDO. - ARAGUA','',232,'','','','','','',0.00,0.00,0.00,0.00,0,5.00,75.00,'','2016-01-14 00:43:00','2016-01-14 00:43:00'),(162,'D020','V','2342875','','BARMES ROGER','Aeronáutico',0,0,'2016-01-13','PANAMÁ','',232,'','','','','','',0.00,0.00,0.00,0.00,0,5.00,75.00,'','2016-01-14 01:58:32','2016-01-14 02:00:35'),(163,'D021','J','08034247-0','','SERVICIOS AEREOS SUCRE, C.A','Aeronáutico',0,0,'2016-01-13','AV. BOLIVAR CENTRO EMPRESARIAL AB, NIVEL PL, OFIC. 19 PAMPATAR, ISLA DE MARGARITA - NUEVA ESPARTA','',232,'','','','','','',0.00,0.00,0.00,0.00,0,5.00,75.00,'','2016-01-14 03:47:04','2016-01-14 03:47:04'),(164,'D026','V','16891816','','RAMIREZ JUAN','Aeronáutico',0,0,'2016-01-14','CARACAS, DISTRITO CAPITAL','',232,'','','','','','',0.00,0.00,0.00,0.00,0,5.00,75.00,'','2016-01-14 17:53:24','2016-01-14 17:53:24'),(165,'D027','V','11664926','','ROSENQVIST HARALD','Aeronáutico',0,0,'2016-01-14','CARACAS, DISTRITO CAPITAL','',232,'','','','','','',0.00,0.00,0.00,0.00,0,5.00,75.00,'','2016-01-14 18:06:17','2016-01-14 18:06:17'),(166,'D039','V','6182198','','CALDERON ALEXIS','Aeronáutico',0,0,'2016-01-14','CARACAS, DISTRITO CAPITAL','',232,'','','','','','',0.00,0.00,0.00,0.00,0,5.00,75.00,'','2016-01-14 18:17:53','2016-01-14 18:17:53'),(167,'D040','J','31034468-0','','INDUSTRIAS DE AISLANTES Y ACERO IAA, C.A.','Aeronáutico',0,0,'2016-01-14','BARCELONA, ESTADO ANZOATEGUI','',232,'','','','','','',0.00,0.00,0.00,0.00,0,5.00,75.00,'','2016-01-14 18:39:08','2016-01-14 18:39:08'),(168,'D073','V','4384459','','ARIAS RAUL','Aeronáutico',0,0,'2016-01-14','SANTA ELENA DE UAIREN, ESTADO BOLIVAR','',232,'','','','','','',0.00,0.00,0.00,0.00,0,5.00,75.00,'','2016-01-14 19:17:29','2016-01-14 19:17:29'),(169,'D074','V','23694631','','FAUSTO RAMIREZ','Aeronáutico',0,0,'2016-01-14','CARACAS, DISTRITO CAPITAL','',232,'','','','','','',0.00,0.00,0.00,0.00,0,5.00,75.00,'','2016-01-14 20:51:42','2016-01-14 20:51:42');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cobro_factura`
--

DROP TABLE IF EXISTS `cobro_factura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cobro_factura` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `factura_id` int(10) unsigned NOT NULL,
  `cobro_id` int(10) unsigned NOT NULL,
  `retencionFecha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `retencionComprobante` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `monto` double(15,2) NOT NULL,
  `base` double(15,2) NOT NULL,
  `iva` double(15,2) NOT NULL,
  `islrpercentage` double NOT NULL,
  `ivapercentage` double NOT NULL,
  `retencion` double(15,2) NOT NULL,
  `total` double(15,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `cobro_factura_factura_id_foreign` (`factura_id`),
  KEY `cobro_factura_cobro_id_foreign` (`cobro_id`),
  CONSTRAINT `cobro_factura_cobro_id_foreign` FOREIGN KEY (`cobro_id`) REFERENCES `cobros` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cobro_factura_factura_id_foreign` FOREIGN KEY (`factura_id`) REFERENCES `facturas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cobro_factura`
--

LOCK TABLES `cobro_factura` WRITE;
/*!40000 ALTER TABLE `cobro_factura` DISABLE KEYS */;
INSERT INTO `cobro_factura` VALUES (1,91,1,'0','0',82.50,82.50,0.00,0,0,0.00,82.50,'2016-01-14 20:49:40','2016-01-14 20:49:40'),(2,93,2,'0','0',144.00,144.00,0.00,0,0,0.00,144.00,'2016-01-14 20:50:49','2016-01-14 20:50:49'),(3,94,3,'0','0',168.00,168.00,0.00,0,0,0.00,168.00,'2016-01-14 20:51:40','2016-01-14 20:51:40'),(4,101,4,'0','0',547.92,547.92,0.00,0,0,0.00,547.92,'2016-01-14 20:53:31','2016-01-14 20:53:31'),(5,102,5,'0','0',1753.50,1753.50,0.00,0,0,0.00,1753.50,'2016-01-14 20:54:26','2016-01-14 20:54:26'),(6,137,6,'0','0',328.50,328.50,0.00,0,0,0.00,328.50,'2016-01-14 20:56:32','2016-01-14 20:56:32'),(7,141,7,'0','0',43380.90,43380.90,0.00,0,0,0.00,43380.90,'2016-01-14 20:57:34','2016-01-14 20:57:34'),(8,107,8,'0','0',390.00,390.00,0.00,0,0,0.00,390.00,'2016-01-14 20:58:52','2016-01-14 20:58:52'),(9,136,9,'0','0',267.00,267.00,0.00,0,0,0.00,267.00,'2016-01-14 20:59:40','2016-01-14 20:59:40'),(10,110,10,'0','0',451.50,451.50,0.00,0,0,0.00,451.50,'2016-01-14 21:01:42','2016-01-14 21:01:42'),(11,111,11,'0','0',144.00,144.00,0.00,0,0,0.00,144.00,'2016-01-14 21:07:12','2016-01-14 21:07:12'),(12,112,12,'0','0',144.00,144.00,0.00,0,0,0.00,144.00,'2016-01-14 21:07:54','2016-01-14 21:07:54'),(13,113,13,'0','0',328.50,328.50,0.00,0,0,0.00,328.50,'2016-01-14 21:08:43','2016-01-14 21:08:43'),(14,138,14,'0','0',82.50,82.50,0.00,0,0,0.00,82.50,'2016-01-14 21:09:28','2016-01-14 21:09:28'),(15,114,15,'0','0',35866.47,35866.47,0.00,0,0,0.00,35866.47,'2016-01-14 21:12:09','2016-01-14 21:12:09'),(16,116,16,'0','0',144.00,144.00,0.00,0,0,0.00,144.00,'2016-01-14 21:13:01','2016-01-14 21:13:01'),(17,115,17,'0','0',144.00,144.00,0.00,0,0,0.00,144.00,'2016-01-14 21:13:47','2016-01-14 21:13:47'),(18,202,18,'0','0',144.00,144.00,0.00,0,0,0.00,144.00,'2016-01-14 21:29:56','2016-01-14 21:29:56'),(19,139,19,'0','0',928.20,928.20,0.00,0,0,0.00,928.20,'2016-01-14 23:10:32','2016-01-14 23:10:32'),(20,131,20,'0','0',82.50,82.50,0.00,0,0,0.00,82.50,'2016-01-14 23:11:50','2016-01-14 23:11:50'),(21,132,21,'0','0',144.00,144.00,0.00,0,0,0.00,144.00,'2016-01-14 23:12:59','2016-01-14 23:12:59'),(22,133,22,'0','0',811.38,811.38,0.00,0,0,0.00,811.38,'2016-01-14 23:14:32','2016-01-14 23:14:32'),(23,134,23,'0','0',697.50,697.50,0.00,0,0,0.00,697.50,'2016-01-14 23:15:16','2016-01-14 23:15:16'),(24,143,24,'0','0',451.50,451.50,0.00,0,0,0.00,451.50,'2016-01-14 23:17:03','2016-01-14 23:17:03'),(25,135,25,'0','0',267.00,267.00,0.00,0,0,0.00,267.00,'2016-01-14 23:18:41','2016-01-14 23:18:41'),(26,148,26,'0','0',1168.50,1168.50,0.00,0,0,0.00,1168.50,'2016-01-14 23:19:30','2016-01-14 23:19:30');
/*!40000 ALTER TABLE `cobro_factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cobros`
--

DROP TABLE IF EXISTS `cobros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cobros` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cliente_id` int(10) unsigned NOT NULL,
  `modulo_id` int(10) unsigned DEFAULT NULL,
  `observacion` text COLLATE utf8_unicode_ci NOT NULL,
  `hasrecaudos` text COLLATE utf8_unicode_ci NOT NULL,
  `montofacturas` double(15,2) NOT NULL,
  `montodepositado` double(15,2) NOT NULL,
  `aeropuerto_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `cobros_cliente_id_foreign` (`cliente_id`),
  KEY `cobros_modulo_id_foreign` (`modulo_id`),
  KEY `cobros_aeropuerto_id_foreign` (`aeropuerto_id`),
  CONSTRAINT `cobros_aeropuerto_id_foreign` FOREIGN KEY (`aeropuerto_id`) REFERENCES `aeropuertos` (`id`),
  CONSTRAINT `cobros_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  CONSTRAINT `cobros_modulo_id_foreign` FOREIGN KEY (`modulo_id`) REFERENCES `modulos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cobros`
--

LOCK TABLES `cobros` WRITE;
/*!40000 ALTER TABLE `cobros` DISABLE KEYS */;
INSERT INTO `cobros` VALUES (1,101,5,'','true',8250.00,8250.00,1,'2016-01-14 20:49:40','2016-01-14 20:49:40'),(2,54,5,'','true',14400.00,14400.00,1,'2016-01-14 20:50:49','2016-01-14 20:50:49'),(3,150,5,'','true',16800.00,16800.00,1,'2016-01-14 20:51:40','2016-01-14 20:51:40'),(4,139,5,'','true',54792.00,54792.00,1,'2016-01-14 20:53:31','2016-01-14 20:53:31'),(5,106,5,'','true',175350.00,175350.00,1,'2016-01-14 20:54:26','2016-01-14 20:54:26'),(6,128,5,'','true',32850.00,32850.00,1,'2016-01-14 20:56:32','2016-01-14 20:56:32'),(7,153,5,'','true',4338090.00,4338090.00,1,'2016-01-14 20:57:34','2016-01-14 20:57:34'),(8,154,5,'','true',39000.00,39000.00,1,'2016-01-14 20:58:52','2016-01-14 20:58:52'),(9,155,5,'','true',26700.00,26700.00,1,'2016-01-14 20:59:40','2016-01-14 20:59:40'),(10,106,5,'','true',45150.00,45150.00,1,'2016-01-14 21:01:42','2016-01-14 21:01:42'),(11,156,5,'','true',14400.00,14400.00,1,'2016-01-14 21:07:12','2016-01-14 21:07:12'),(12,157,5,'','true',14400.00,14400.00,1,'2016-01-14 21:07:54','2016-01-14 21:07:54'),(13,158,5,'','true',32850.00,32850.00,1,'2016-01-14 21:08:43','2016-01-14 21:08:43'),(14,101,5,'','true',8250.00,8250.00,1,'2016-01-14 21:09:28','2016-01-14 21:09:28'),(15,148,5,'','true',3586647.00,3586647.00,1,'2016-01-14 21:12:09','2016-01-14 21:12:09'),(16,156,5,'','true',14400.00,14400.00,1,'2016-01-14 21:13:01','2016-01-14 21:13:01'),(17,156,5,'','true',14400.00,14400.00,1,'2016-01-14 21:13:47','2016-01-14 21:13:47'),(18,54,5,'','true',14400.00,14400.00,1,'2016-01-14 21:29:56','2016-01-14 21:29:56'),(19,15,5,'','true',92820.00,92820.00,1,'2016-01-14 23:10:32','2016-01-14 23:10:32'),(20,101,5,'','true',8250.00,8250.00,1,'2016-01-14 23:11:50','2016-01-14 23:11:50'),(21,54,5,'','true',14400.00,14400.00,1,'2016-01-14 23:12:59','2016-01-14 23:12:59'),(22,159,5,'','true',81138.00,81138.00,1,'2016-01-14 23:14:32','2016-01-14 23:14:32'),(23,160,5,'','true',69750.00,69750.00,1,'2016-01-14 23:15:16','2016-01-14 23:15:16'),(24,161,5,'','true',45150.00,45150.00,1,'2016-01-14 23:17:03','2016-01-14 23:17:03'),(25,74,5,'','true',26700.00,26700.00,1,'2016-01-14 23:18:41','2016-01-14 23:18:41'),(26,162,5,'','true',116850.00,116850.00,1,'2016-01-14 23:19:30','2016-01-14 23:19:30');
/*!40000 ALTER TABLE `cobros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cobrospagos`
--

DROP TABLE IF EXISTS `cobrospagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cobrospagos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` enum('D','NC','T') COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `banco_id` int(10) unsigned NOT NULL,
  `cuenta_id` int(10) unsigned NOT NULL,
  `ncomprobante` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `monto` double(15,2) NOT NULL,
  `cobro_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `cobrospagos_banco_id_foreign` (`banco_id`),
  KEY `cobrospagos_cuenta_id_foreign` (`cuenta_id`),
  KEY `cobrospagos_cobro_id_foreign` (`cobro_id`),
  CONSTRAINT `cobrospagos_cobro_id_foreign` FOREIGN KEY (`cobro_id`) REFERENCES `cobros` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cobrospagos_banco_id_foreign` FOREIGN KEY (`banco_id`) REFERENCES `bancoscuentas` (`banco_id`),
  CONSTRAINT `cobrospagos_cuenta_id_foreign` FOREIGN KEY (`cuenta_id`) REFERENCES `bancoscuentas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cobrospagos`
--

LOCK TABLES `cobrospagos` WRITE;
/*!40000 ALTER TABLE `cobrospagos` DISABLE KEYS */;
INSERT INTO `cobrospagos` VALUES (1,'NC','2016-01-02',2,2,'809',825.00,1,'2016-01-14 20:49:40','2016-01-14 20:49:40'),(2,'NC','2016-01-02',2,2,'809',144.00,2,'2016-01-14 20:50:49','2016-01-14 20:50:49'),(3,'NC','2016-01-02',2,2,'809',168.00,3,'2016-01-14 20:51:40','2016-01-14 20:51:40'),(4,'NC','2016-01-02',2,2,'809',54792.00,4,'2016-01-14 20:53:31','2016-01-14 20:53:31'),(5,'NC','2016-01-02',2,2,'809',17535.00,5,'2016-01-14 20:54:26','2016-01-14 20:54:26'),(6,'NC','2016-01-02',2,2,'809',3285.00,6,'2016-01-14 20:56:32','2016-01-14 20:56:32'),(7,'D','2016-01-02',2,2,'809',433809.00,7,'2016-01-14 20:57:34','2016-01-14 20:57:34'),(8,'NC','2016-01-02',2,2,'809',390.00,8,'2016-01-14 20:58:52','2016-01-14 20:58:52'),(9,'NC','2016-01-02',2,2,'809',267.00,9,'2016-01-14 20:59:40','2016-01-14 20:59:40'),(10,'NC','2016-01-02',2,2,'810',4515.00,10,'2016-01-14 21:01:42','2016-01-14 21:01:42'),(11,'D','2016-01-04',2,2,'49069311',144.00,11,'2016-01-14 21:07:12','2016-01-14 21:07:12'),(12,'D','2016-01-04',2,2,'49069311',144.00,12,'2016-01-14 21:07:54','2016-01-14 21:07:54'),(13,'NC','2016-01-03',2,2,'810',3285.00,13,'2016-01-14 21:08:43','2016-01-14 21:08:43'),(14,'D','2016-01-04',2,2,'49069311',825.00,14,'2016-01-14 21:09:28','2016-01-14 21:09:28'),(15,'NC','2016-01-03',2,2,'422',3586647.00,15,'2016-01-14 21:12:09','2016-01-14 21:12:09'),(16,'NC','2016-01-03',2,2,'810',144.00,16,'2016-01-14 21:13:01','2016-01-14 21:13:01'),(17,'NC','2016-01-03',2,2,'810',144.00,17,'2016-01-14 21:13:47','2016-01-14 21:13:47'),(18,'NC','2016-01-06',2,2,'813',144.00,18,'2016-01-14 21:29:56','2016-01-14 21:29:56'),(19,'NC','2016-01-04',2,2,'811',9282.00,19,'2016-01-14 23:10:32','2016-01-14 23:10:32'),(20,'D','2016-01-04',2,2,'811',825.00,20,'2016-01-14 23:11:50','2016-01-14 23:11:50'),(21,'NC','2016-01-04',2,2,'811',144.00,21,'2016-01-14 23:12:59','2016-01-14 23:12:59'),(22,'NC','2016-01-04',2,2,'811',81138.00,22,'2016-01-14 23:14:32','2016-01-14 23:14:32'),(23,'NC','2016-01-04',2,2,'817.50',6975.00,23,'2016-01-14 23:15:16','2016-01-14 23:15:16'),(24,'NC','2016-01-04',2,2,'811',4515.00,24,'2016-01-14 23:17:03','2016-01-14 23:17:03'),(25,'NC','2016-01-04',2,2,'811',267.00,25,'2016-01-14 23:18:41','2016-01-14 23:18:41'),(26,'NC','2016-01-04',2,2,'811',11685.00,26,'2016-01-14 23:19:30','2016-01-14 23:19:30');
/*!40000 ALTER TABLE `cobrospagos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conceptos`
--

DROP TABLE IF EXISTS `conceptos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conceptos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codpre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nompre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `codcta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stacod` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `coduni` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `iva` double(8,2) unsigned NOT NULL,
  `aeropuerto_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modulo_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `conceptos_aeropuerto_id_foreign` (`aeropuerto_id`),
  KEY `conceptos_modulo_id_foreign` (`modulo_id`),
  CONSTRAINT `conceptos_modulo_id_foreign` FOREIGN KEY (`modulo_id`) REFERENCES `modulos` (`id`),
  CONSTRAINT `conceptos_aeropuerto_id_foreign` FOREIGN KEY (`aeropuerto_id`) REFERENCES `aeropuertos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conceptos`
--

LOCK TABLES `conceptos` WRITE;
/*!40000 ALTER TABLE `conceptos` DISABLE KEYS */;
INSERT INTO `conceptos` VALUES (50,'0-033-001-124-301-09-02-01-001  ','TASAS NACIONALES MODULO','4-2-302-02-01-0001              ','A','',0.00,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(51,'0-033-001-124-301-09-02-01-002  ','TASAS INTERNACIONALES MODULO','4-2-302-02-01-0001              ','A','',0.00,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(52,'0-033-001-124-301-09-02-01-003  ','TASAS NACIONALES SCV','4-2-302-02-01-0002              ','A','',0.00,1,'0000-00-00 00:00:00','2015-12-04 20:15:13',5),(53,'0-033-001-124-301-09-02-01-004  ','TASAS INTERNACIONALES SCV','4-2-302-02-01-0002              ','A','',0.00,1,'0000-00-00 00:00:00','2015-12-04 20:15:13',5),(54,'0-033-001-124-301-09-02-02-001  ','ATERRIZAJE Y DESPEGUE DE AERONAVES','4-2-302-02-01-0002              ','A','',0.00,1,'0000-00-00 00:00:00','2015-12-04 20:15:13',5),(55,'0-033-001-124-301-09-02-02-002  ','ESTACIONAMIENTO DE AERONAVES','4-2-302-02-01-0002              ','A','',0.00,1,'0000-00-00 00:00:00','2015-12-04 20:15:13',5),(56,'0-033-001-124-301-09-02-02-003  ','HABILITACION','4-2-302-02-01-0002              ','A','',0.00,1,'0000-00-00 00:00:00','2015-12-04 20:15:13',5),(57,'0-033-001-124-301-09-02-02-004  ','FORMULARIO DOSA','4-2-302-02-01-0002              ','A','',0.00,1,'0000-00-00 00:00:00','2015-11-20 19:27:34',5),(58,'0-033-001-124-301-09-02-02-005  ','JET WAY','4-2-302-02-01-0002              ','A','',0.00,1,'0000-00-00 00:00:00','2015-11-20 19:27:34',5),(59,'0-033-001-124-301-09-02-02-006  ','CARGA','4-2-302-02-01-0002              ','A','',0.00,1,'0000-00-00 00:00:00','2015-12-04 20:15:20',6),(60,'0-033-001-124-301-09-02-03-000  ','CANON DE ARRENDAMIENTO','1-1-122-02-01-0003              ','A','',0.00,1,'0000-00-00 00:00:00','2015-08-08 01:50:09',2),(61,'0-033-001-124-301-09-02-04-000  ','ESTACIONAMIENTO DE VEHICULOS','4-2-302-02-01-0004              ','A','',0.00,1,'0000-00-00 00:00:00','2015-08-08 01:51:06',4),(62,'0-033-001-124-301-09-02-05-000  ','PUBLICIDAD','4-2-302-02-01-0005              ','A','',0.00,1,'0000-00-00 00:00:00','2015-08-08 01:50:37',3),(63,'0-033-001-124-301-09-02-06-000  ','OTROS INGRESOS COMBUSTIBLE','1-1-122-02-01-0007              ','A','',0.00,1,'0000-00-00 00:00:00','2015-12-04 20:15:13',5),(64,'0-033-001-124-301-09-02-06-001  ','TARJETA DE IDENTIFICACION ','4-2-302-02-01-0006              ','A','',0.00,1,'0000-00-00 00:00:00','2016-01-13 00:14:36',7),(65,'0-033-001-124-301-09-02-06-002  ','OTROS INGRESOS 10% SERVICIOS DE HANDLING ','4-2-302-02-01-0006              ','A','',0.00,1,'0000-00-00 00:00:00','2015-12-04 20:15:13',5),(66,'0-033-001-124-301-09-02-06-003  ','OTROS INGRESOS CARNET DE CIRCULACION','4-2-302-02-01-0006              ','A','',0.00,1,'0000-00-00 00:00:00','2016-01-13 00:15:30',8),(67,'0-033-001-124-301-09-02-06-005  ',' OTROS INGRESOS','1-1-122-02-01-0007              ','A','',0.00,1,'0000-00-00 00:00:00','2016-01-13 00:15:30',8),(68,'0-033-001-124-301-09-02-07-001  ',' ATERRIZAJE Y DESPEGUE DE AERONAVES CREDITO','4-2-302-02-01-0002              ','A','',0.00,1,'0000-00-00 00:00:00','2015-08-08 01:51:53',5),(69,'0-033-001-124-301-09-02-07-002  ','ESTACIONAMIENTO DE AERONAVES CREDITO','4-2-302-02-01-0002              ','A','',0.00,1,'0000-00-00 00:00:00','2015-11-20 19:27:34',5),(70,'0-033-001-124-301-09-02-07-003  ','HABILITACION CREDITO','4-2-302-02-01-0002              ','A','',0.00,1,'0000-00-00 00:00:00','2015-12-04 20:15:13',5),(71,'0-033-001-124-301-09-02-07-004  ','FOMULARIO DOSA CREDITO','4-2-302-02-01-0002              ','A','',0.00,1,'0000-00-00 00:00:00','2015-12-04 20:15:13',5),(72,'0-033-001-124-301-09-02-07-005  ','JET WAY CREDITO','4-2-302-02-01-0002              ','A','',0.00,1,'0000-00-00 00:00:00','2015-12-04 20:15:13',5),(73,'0-033-001-124-301-09-02-07-006  ','CARGA CREDITO','4-2-302-02-01-0002              ','A','',0.00,1,'0000-00-00 00:00:00','2015-12-04 20:15:20',6),(74,'0-033-002-125-302-99-02-01-001  ','TASAS NACIONALES MODULO','1-1-122-03-01-0001              ','A','',0.00,2,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(75,'0-033-002-125-302-99-02-01-003  ','TASAS NACIONALES SCV ','1-1-122-03-01-0002              ','A','',0.00,2,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(76,'0-033-002-125-302-99-02-02-001  ','ATERRIZAJE Y DESPEGUE DE AERONAVES','1-1-122-03-01-0002              ','A','',0.00,2,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(77,'0-033-002-125-302-99-02-02-002  ','ESTACIONAMIENTO DE AERONAVES','1-1-122-03-01-0002              ','A','',0.00,2,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(78,'0-033-002-125-302-99-02-02-003  ','HABILITACION','1-1-122-03-01-0002              ','A','',0.00,2,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(79,'0-033-002-125-302-99-02-02-004  ','FORMULARIO DOSA','1-1-122-03-01-0002              ','A','',0.00,2,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(80,'0-033-002-125-302-99-02-02-005  ','JET WAY','1-1-122-03-01-0002              ','A','',0.00,2,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(81,'0-033-002-125-302-99-02-02-006  ','CARGA','1-1-122-03-01-0002              ','A','',0.00,2,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(82,'0-033-002-125-302-99-02-03-000  ','CANON DE ARRENDAMIENTO','1-1-122-03-01-0003              ','A','',0.00,2,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(83,'0-033-002-125-302-99-02-04-000  ','ESTACIONAMIENTO DE VEHICULOS','1-1-122-03-01-0004              ','A','',0.00,2,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(84,'0-033-002-125-302-99-02-05-000  ','PUBLICIDAD','1-1-122-03-01-0005              ','A','',0.00,2,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(85,'0-033-002-125-302-99-02-06-000  ','OTROS INGRESOS','1-1-122-03-01-0007              ','A','',0.00,2,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(86,'0-033-002-125-302-99-02-06-001  ','TARJETAS DE IDENTIFICACI?N','1-1-122-03-01-0007              ','A','',0.00,2,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(87,'0-033-002-125-302-99-02-06-002  ','TARJETAS DE ESTACIONAMIENTO','1-1-122-03-01-0007              ','A','',0.00,2,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(88,'0-033-002-125-302-99-02-06-003  ','FORMULARIOS ANULADOS','1-1-122-03-01-0007              ','A','',0.00,2,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(89,'0-033-002-125-302-99-02-07-001  ','ATERRIZAJE Y DESPEGUE CREDITO ','1-1-122-03-01-0002              ','A','',0.00,2,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(90,'0-033-002-125-302-99-02-07-002  ','ESTACIONAMIENTO DE AERONAVES CREDITO','1-1-122-03-01-0002              ','A','',0.00,2,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(91,'0-033-002-125-302-99-02-07-003  ',' FORMULARIO DOSA CREDITO','1-1-122-03-01-0002              ','A','',0.00,2,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(92,'0-033-003-126-301-09-02-01-002  ','TASAS AEROPORTUARIAS NACIONALES','1-1-122-04-01-0001              ','A','',0.00,3,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(93,'0-033-003-126-301-09-02-02-001  ','ATERRIZAJE Y DESPEGUE DE AERONAVES','1-1-122-04-01-0002              ','A','',0.00,3,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(94,'0-033-003-126-301-09-02-02-002  ','ESTACIONAMIENTO DE AERONAVES','1-1-122-04-01-0002              ','A','',0.00,3,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(95,'0-033-003-126-301-09-02-02-003  ','FORMULARIO DOSA','1-1-122-04-01-0002              ','A','',0.00,3,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(96,'0-033-003-126-301-09-02-03-000  ','CANON DE ARRENDAMIENTO','1-1-122-04-01-0003              ','A','',0.00,3,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(97,'0-033-003-126-301-09-02-06-001  ','OTROS INGRESOS TARJETA DE IDENTIFICACION','1-1-122-04-01-0007              ','A','',0.00,3,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(98,'0-033-003-126-301-09-02-06-002  ','OTROS INGRESOS FORMULARIOS ANULADOS','1-1-122-04-01-0007              ','A','',0.00,3,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL);
/*!40000 ALTER TABLE `conceptos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `concils`
--

DROP TABLE IF EXISTS `concils`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `concils` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `encargado` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `codbarras` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `fVer` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `hVer` time NOT NULL,
  `serie` text COLLATE utf8_unicode_ci NOT NULL,
  `codtas` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `tiptas` int(11) NOT NULL,
  `valor` double(14,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `concils`
--

LOCK TABLES `concils` WRITE;
/*!40000 ALTER TABLE `concils` DISABLE KEYS */;
/*!40000 ALTER TABLE `concils` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contratos`
--

DROP TABLE IF EXISTS `contratos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contratos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nContrato` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cliente_id` int(10) unsigned NOT NULL,
  `concepto_id` int(10) unsigned NOT NULL,
  `monto` double(8,2) unsigned NOT NULL,
  `montoTipo` enum('Mensual','Anual') COLLATE utf8_unicode_ci NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaVencimiento` date NOT NULL,
  `isReanudacionAutomatica` tinyint(1) NOT NULL,
  `mesesReanudacion` int(11) NOT NULL,
  `isGeneracionAutomaticaFactura` tinyint(1) NOT NULL,
  `diaGeneracion` int(11) NOT NULL,
  `consideracion` text COLLATE utf8_unicode_ci NOT NULL,
  `metros` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `responsable` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ubicacion` text COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `imagen` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `contratos_ncontrato_unique` (`nContrato`),
  KEY `contratos_cliente_id_foreign` (`cliente_id`),
  KEY `contratos_concepto_id_foreign` (`concepto_id`),
  CONSTRAINT `contratos_concepto_id_foreign` FOREIGN KEY (`concepto_id`) REFERENCES `conceptos` (`id`),
  CONSTRAINT `contratos_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contratos`
--

LOCK TABLES `contratos` WRITE;
/*!40000 ALTER TABLE `contratos` DISABLE KEYS */;
INSERT INTO `contratos` VALUES (2,'SB-0003-02-2010',19,60,7741.44,'Mensual','2010-02-03','2010-12-31',1,12,1,3,'Arrendamiento de local ','Doce metros con dos centímetros cuadrados (12.02 Mtrs2)','Luciano Chávez García ','','Ubicado en planta baja, zona Pasillo Hall Central del Aeropuerto Internacional Manuel Carlos Piar de Ciudad Guayana, cuyas paredes colindantes son: Norte: Modulo de información del aeropuerto y salón hall central; sur: pared de vidrio que da área peatonal estacionamiento; este: puerta de entrada principal sensor óptico del aeropuerto; y oeste: local asignado a viajes omega, c.a.','','','2016-01-08 00:37:48','2016-01-08 00:48:43');
/*!40000 ALTER TABLE `contratos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamentos`
--

DROP TABLE IF EXISTS `departamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departamentos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamentos`
--

LOCK TABLES `departamentos` WRITE;
/*!40000 ALTER TABLE `departamentos` DISABLE KEYS */;
INSERT INTO `departamentos` VALUES (1,'Departamento 1','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `departamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `despegue_otros_cargo`
--

DROP TABLE IF EXISTS `despegue_otros_cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `despegue_otros_cargo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `despegue_id` int(10) unsigned NOT NULL,
  `otrosCargo_id` int(10) unsigned NOT NULL,
  `monto` double(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `despegue_otros_cargo_despegue_id_foreign` (`despegue_id`),
  KEY `despegue_otros_cargo_otroscargo_id_foreign` (`otrosCargo_id`),
  CONSTRAINT `despegue_otros_cargo_otroscargo_id_foreign` FOREIGN KEY (`otrosCargo_id`) REFERENCES `otros_cargos` (`id`),
  CONSTRAINT `despegue_otros_cargo_despegue_id_foreign` FOREIGN KEY (`despegue_id`) REFERENCES `despegues` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `despegue_otros_cargo`
--

LOCK TABLES `despegue_otros_cargo` WRITE;
/*!40000 ALTER TABLE `despegue_otros_cargo` DISABLE KEYS */;
/*!40000 ALTER TABLE `despegue_otros_cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `despegues`
--

DROP TABLE IF EXISTS `despegues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `despegues` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hora` time NOT NULL,
  `fecha` date NOT NULL,
  `num_vuelo` int(11) DEFAULT NULL,
  `aeronave_id` int(10) unsigned NOT NULL,
  `aeropuerto_id` int(10) unsigned DEFAULT NULL,
  `puerto_id` int(10) unsigned DEFAULT NULL,
  `piloto_id` int(10) unsigned DEFAULT NULL,
  `tipoMatricula_id` int(10) unsigned NOT NULL,
  `nacionalidadVuelo_id` int(10) unsigned DEFAULT NULL,
  `cliente_id` int(10) unsigned DEFAULT NULL,
  `embarqueAdultos` int(11) NOT NULL DEFAULT '0',
  `embarqueInfante` int(11) NOT NULL DEFAULT '0',
  `embarqueTercera` int(11) NOT NULL DEFAULT '0',
  `transitoAdultos` int(11) NOT NULL DEFAULT '0',
  `transitoInfante` int(11) NOT NULL DEFAULT '0',
  `transitoTercera` int(11) NOT NULL DEFAULT '0',
  `tiempo_estacionamiento` double(8,2) DEFAULT NULL,
  `numero_puenteAbordaje` int(11) DEFAULT NULL,
  `tiempo_puenteAbord` double(8,2) DEFAULT NULL,
  `peso_embarcado` double(8,2) DEFAULT NULL,
  `peso_desembarcado` double(8,2) DEFAULT NULL,
  `cobrar_estacionamiento` int(11) DEFAULT NULL,
  `cobrar_puenteAbordaje` int(11) DEFAULT NULL,
  `cobrar_Formulario` int(11) DEFAULT NULL,
  `cobrar_AterDesp` int(11) DEFAULT NULL,
  `cobrar_carga` int(11) DEFAULT NULL,
  `cobrar_habilitacion` int(11) DEFAULT NULL,
  `cobrar_otrosCargos` int(11) DEFAULT NULL,
  `otrosCargo_id` int(10) unsigned DEFAULT NULL,
  `aterrizaje_id` int(10) unsigned NOT NULL,
  `factura_id` int(10) unsigned DEFAULT NULL,
  `condicionPago` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facturado` int(11) NOT NULL DEFAULT '0',
  `pagado` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `despegues_aeropuerto_id_foreign` (`aeropuerto_id`),
  KEY `despegues_puerto_id_foreign` (`puerto_id`),
  KEY `despegues_piloto_id_foreign` (`piloto_id`),
  KEY `despegues_tipomatricula_id_foreign` (`tipoMatricula_id`),
  KEY `despegues_nacionalidadvuelo_id_foreign` (`nacionalidadVuelo_id`),
  KEY `despegues_aeronave_id_foreign` (`aeronave_id`),
  KEY `despegues_cliente_id_foreign` (`cliente_id`),
  KEY `despegues_otroscargo_id_foreign` (`otrosCargo_id`),
  KEY `despegues_aterrizaje_id_foreign` (`aterrizaje_id`),
  KEY `despegues_factura_id_foreign` (`factura_id`),
  CONSTRAINT `despegues_factura_id_foreign` FOREIGN KEY (`factura_id`) REFERENCES `facturas` (`id`),
  CONSTRAINT `despegues_aeronave_id_foreign` FOREIGN KEY (`aeronave_id`) REFERENCES `aeronaves` (`id`),
  CONSTRAINT `despegues_aeropuerto_id_foreign` FOREIGN KEY (`aeropuerto_id`) REFERENCES `aeropuertos` (`id`),
  CONSTRAINT `despegues_aterrizaje_id_foreign` FOREIGN KEY (`aterrizaje_id`) REFERENCES `aterrizajes` (`id`),
  CONSTRAINT `despegues_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  CONSTRAINT `despegues_nacionalidadvuelo_id_foreign` FOREIGN KEY (`nacionalidadVuelo_id`) REFERENCES `nacionalidad_vuelos` (`id`),
  CONSTRAINT `despegues_otroscargo_id_foreign` FOREIGN KEY (`otrosCargo_id`) REFERENCES `otros_cargos` (`id`),
  CONSTRAINT `despegues_piloto_id_foreign` FOREIGN KEY (`piloto_id`) REFERENCES `pilotos` (`id`),
  CONSTRAINT `despegues_puerto_id_foreign` FOREIGN KEY (`puerto_id`) REFERENCES `puertos` (`id`),
  CONSTRAINT `despegues_tipomatricula_id_foreign` FOREIGN KEY (`tipoMatricula_id`) REFERENCES `tipo_matriculas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `despegues`
--

LOCK TABLES `despegues` WRITE;
/*!40000 ALTER TABLE `despegues` DISABLE KEYS */;
INSERT INTO `despegues` VALUES (1,'08:35:00','2016-01-01',0,24,1,7,6,2,NULL,125,0,0,0,0,0,0,1289.00,0,0.00,0.00,0.00,0,0,1,1,0,0,0,NULL,1,1,'Crédito',0,0,'2016-01-05 23:34:56','2016-01-05 23:35:15'),(2,'15:37:00','2016-01-01',2385,43,1,3,98,3,NULL,63,79,0,0,0,0,0,57.00,3,1.00,0.00,0.00,0,1,1,0,0,0,0,NULL,2,2,'Crédito',0,0,'2016-01-06 00:04:20','2016-01-06 00:06:47'),(3,'15:52:00','2016-01-01',2353,39,1,8,72,3,NULL,63,100,0,0,0,0,0,69.00,2,1.00,0.00,0.00,0,1,1,0,0,0,0,NULL,3,3,'Crédito',0,0,'2016-01-06 00:13:24','2016-01-06 00:14:28'),(4,'16:33:00','2016-01-01',971,15,1,4,24,3,1,40,80,0,0,0,0,0,48.00,2,1.00,0.00,0.00,1,1,1,1,0,0,0,NULL,4,57,'Crédito',0,0,'2016-01-06 00:34:21','2016-01-06 22:56:50'),(5,'16:44:00','2016-01-01',746,14,1,3,39,3,NULL,40,80,0,0,0,0,0,49.00,3,1.00,0.00,0.00,1,1,1,1,0,0,0,NULL,5,4,'Crédito',0,0,'2016-01-06 00:44:17','2016-01-06 00:46:45'),(6,'09:54:00','2015-12-29',0,27,1,9,6,2,NULL,139,19,0,0,0,0,0,1341.00,0,0.00,0.00,0.00,0,0,1,1,0,0,0,NULL,6,5,'Crédito',0,0,'2016-01-06 01:14:53','2016-01-06 01:15:20'),(7,'10:00:00','2015-12-29',0,28,1,9,7,2,NULL,139,19,0,0,0,0,0,1340.00,0,0.00,0.00,0.00,0,0,1,1,0,0,0,NULL,7,6,'Crédito',0,0,'2016-01-06 01:17:50','2016-01-06 01:18:09'),(8,'13:37:00','2015-12-29',0,21,1,9,NULL,2,NULL,139,7,0,0,0,0,0,1555.00,0,0.00,0.00,0.00,0,0,1,1,0,0,0,NULL,8,7,'Crédito',0,0,'2016-01-06 03:51:36','2016-01-06 03:52:07'),(9,'09:05:00','2015-12-30',0,28,1,9,NULL,2,NULL,139,19,0,0,0,0,0,1245.00,0,0.00,0.00,0.00,0,0,1,1,0,0,0,NULL,9,8,'Crédito',0,0,'2016-01-06 03:54:02','2016-01-06 03:55:24'),(10,'18:58:18','2016-01-05',0,27,1,9,NULL,2,NULL,139,19,0,0,0,0,0,10501.00,0,0.00,0.00,0.00,0,0,1,1,0,0,0,NULL,10,9,'Crédito',0,0,'2016-01-06 03:58:49','2016-01-06 03:59:08'),(11,'19:00:36','2016-01-05',0,21,1,9,NULL,2,NULL,139,13,0,0,0,0,0,10395.00,0,0.00,0.00,0.00,0,0,1,1,0,0,0,NULL,11,10,'Crédito',0,0,'2016-01-06 04:00:58','2016-01-06 04:01:11'),(12,'09:12:00','2015-12-31',0,27,1,9,6,2,NULL,139,19,0,0,0,0,0,40182.00,0,0.00,0.00,0.00,0,0,1,1,1,0,0,NULL,12,11,'Crédito',0,0,'2016-01-06 04:03:04','2016-01-06 04:03:20'),(13,'09:00:00','2015-12-31',0,21,1,9,NULL,2,NULL,139,19,0,0,0,0,0,40132.00,0,0.00,0.00,0.00,0,0,1,1,0,0,0,NULL,13,12,'Crédito',0,0,'2016-01-06 04:06:54','2016-01-06 04:07:14'),(14,'11:00:00','2015-12-31',0,28,1,9,6,2,NULL,139,0,0,0,0,0,0,40292.00,0,0.00,0.00,0.00,0,0,1,1,0,0,0,NULL,14,13,'Crédito',0,0,'2016-01-06 04:09:23','2016-01-06 04:09:41'),(15,'19:05:00','2016-01-01',315,4,1,8,12,3,NULL,124,68,0,0,0,0,0,40.00,3,1.00,0.00,0.00,1,1,1,1,0,0,0,NULL,15,90,'Crédito',0,0,'2016-01-06 04:13:34','2016-01-07 19:42:15'),(16,'10:00:00','2016-01-02',0,53,1,7,142,1,NULL,101,0,0,0,0,0,0,42961.00,0,0.00,0.00,0.00,0,0,1,1,0,0,0,NULL,17,91,'Contado',0,0,'2016-01-08 02:05:50','2016-01-08 02:07:48'),(17,'20:50:00','2016-01-01',351,54,1,3,109,3,NULL,13,80,0,0,0,0,0,18.00,3,1.00,0.00,0.00,1,1,1,1,0,0,0,NULL,18,92,'Crédito',0,0,'2016-01-08 02:36:38','2016-01-08 02:45:53'),(18,'09:30:00','2016-01-02',0,55,1,9,143,1,NULL,54,5,0,0,0,0,0,42990.00,0,0.00,0.00,0.00,0,0,1,1,0,0,0,NULL,19,93,'Contado',0,0,'2016-01-08 03:03:13','2016-01-08 03:04:55'),(19,'10:00:00','2016-01-02',0,56,1,10,144,1,NULL,150,4,0,0,0,0,0,6608.00,0,0.00,0.00,0.00,0,0,1,1,0,0,0,NULL,20,94,'Contado',0,0,'2016-01-08 03:20:28','2016-01-08 03:24:22'),(20,'09:18:00','2016-01-02',0,21,1,9,136,2,NULL,139,19,0,0,0,0,0,2756.00,0,0.00,0.00,0.00,0,0,1,1,0,0,0,NULL,21,95,'Crédito',0,0,'2016-01-08 07:37:05','2016-01-08 07:41:36'),(21,'09:26:00','2016-01-02',0,27,1,9,139,2,NULL,139,19,0,0,0,0,0,2729.00,0,0.00,0.00,0.00,0,0,1,1,0,0,0,NULL,22,96,'Crédito',0,0,'2016-01-08 07:43:37','2016-01-08 07:44:14'),(22,'09:13:00','2016-01-02',0,26,1,9,138,2,NULL,139,19,0,0,0,0,0,5593.00,0,0.00,0.00,0.00,0,0,1,1,0,0,0,NULL,23,97,'Crédito',0,0,'2016-01-08 07:45:58','2016-01-08 07:46:28'),(23,'10:14:00','2016-01-02',0,28,1,9,145,2,NULL,139,14,0,0,0,0,0,33.00,0,0.00,0.00,0.00,0,0,1,1,0,0,0,NULL,24,98,'Crédito',0,0,'2016-01-08 07:49:54','2016-01-08 07:50:31'),(24,'07:43:00','2016-01-02',0,57,1,11,146,2,NULL,139,0,0,0,0,0,0,1233.00,0,0.00,0.00,0.00,1,0,1,1,0,0,0,NULL,25,99,'Crédito',0,0,'2016-01-08 07:58:42','2016-01-08 07:59:24'),(25,'14:37:00','2015-12-28',0,57,1,11,146,2,NULL,139,0,0,0,0,0,0,63.00,0,0.00,0.00,0.00,1,0,1,1,0,0,0,NULL,26,100,'Crédito',0,0,'2016-01-08 08:00:54','2016-01-08 08:01:31'),(26,'11:27:00','2015-12-30',0,58,1,9,145,2,NULL,139,0,0,0,0,0,0,1112.00,0,0.00,0.00,0.00,1,0,1,1,0,0,0,NULL,27,101,'Contado',0,0,'2016-01-08 08:05:22','2016-01-08 20:05:22'),(27,'12:30:00','2016-01-02',0,59,1,8,7,1,NULL,106,0,0,0,0,0,0,42780.00,0,0.00,0.00,0.00,0,0,1,1,0,0,0,NULL,28,102,'Contado',0,0,'2016-01-09 01:35:26','2016-01-09 01:37:12'),(28,'13:40:00','2016-01-02',0,60,1,7,44,1,NULL,128,0,0,0,8,0,0,11563.00,0,0.00,0.00,0.00,0,0,1,1,0,0,0,NULL,29,137,'Contado',0,0,'2016-01-09 01:44:55','2016-01-11 02:38:49'),(30,'05:50:00','2016-01-02',740,16,1,3,9,3,NULL,40,122,0,0,0,0,0,565.00,2,3.00,0.00,0.00,1,1,1,1,0,0,0,NULL,31,103,'Crédito',0,0,'2016-01-09 02:11:23','2016-01-09 02:11:57'),(31,'10:00:00','2016-01-02',970,15,1,8,147,3,NULL,40,124,0,0,0,0,0,44.00,2,1.00,0.00,0.00,1,1,1,1,0,0,0,NULL,32,104,'Crédito',0,0,'2016-01-09 02:15:32','2016-01-09 02:16:13'),(32,'00:06:40','2016-01-02',307,4,1,3,12,3,NULL,124,108,0,0,0,0,0,575.00,2,5.00,0.00,0.00,1,1,1,1,0,0,0,NULL,33,105,'Crédito',0,0,'2016-01-09 02:20:18','2016-01-09 02:20:46'),(33,'09:49:00','2016-01-02',310,2,1,3,12,3,NULL,124,119,0,0,0,0,0,44.00,3,1.00,0.00,0.00,1,1,1,1,0,0,0,NULL,34,106,'Crédito',0,0,'2016-01-09 02:23:34','2016-01-09 02:25:33'),(34,'18:00:00','2016-01-02',0,62,1,8,9,1,NULL,154,8,0,0,0,0,0,45.00,0,0.00,0.00,0.00,1,0,1,1,0,0,0,NULL,35,107,'Contado',0,0,'2016-01-09 02:31:16','2016-01-09 02:31:39'),(35,'16:10:00','2016-01-02',971,15,1,4,41,3,NULL,40,140,0,0,0,0,0,40.00,2,1.00,0.00,0.00,1,1,1,1,0,0,0,NULL,36,108,'Crédito',0,0,'2016-01-09 02:34:04','2016-01-09 02:34:18'),(36,'17:30:00','2016-01-02',746,14,1,3,18,3,NULL,40,133,0,0,0,0,0,36.00,2,1.00,0.00,0.00,1,1,1,1,0,0,0,NULL,37,109,'Crédito',0,0,'2016-01-09 02:38:27','2016-01-09 02:39:03'),(37,'18:30:00','2016-01-02',0,63,1,5,148,1,NULL,155,0,0,0,0,0,0,40.00,0,0.00,0.00,0.00,1,0,1,1,0,0,0,NULL,38,136,'Contado',0,0,'2016-01-09 02:45:00','2016-01-11 02:27:26'),(38,'09:00:00','2016-01-03',0,59,1,13,149,1,NULL,106,0,0,0,0,0,0,1133.00,0,0.00,0.00,0.00,0,0,1,1,0,0,0,NULL,39,110,'Contado',0,0,'2016-01-09 02:57:10','2016-01-09 02:59:19'),(39,'09:00:00','2016-01-03',0,64,1,9,150,1,NULL,156,5,0,0,0,0,0,60.00,0,0.00,0.00,0.00,1,0,1,1,0,0,0,NULL,40,111,'Contado',0,0,'2016-01-09 03:48:35','2016-01-09 03:49:04'),(40,'09:00:00','2016-01-03',0,65,1,11,151,1,NULL,157,2,0,0,0,0,0,60.00,0,0.00,0.00,0.00,1,0,1,1,0,0,0,NULL,41,112,'Contado',0,0,'2016-01-09 04:41:00','2016-01-09 04:41:29'),(41,'09:30:00','2016-01-03',0,66,1,5,152,1,NULL,158,5,0,0,0,0,0,60.00,0,0.00,0.00,0.00,1,0,1,1,0,0,0,NULL,42,113,'Contado',0,0,'2016-01-09 04:57:23','2016-01-09 04:57:42'),(42,'09:30:00','2016-01-03',0,53,1,7,96,1,NULL,101,3,0,0,0,0,0,1020.00,0,0.00,0.00,0.00,0,0,1,1,0,0,0,NULL,43,138,'Contado',0,0,'2016-01-09 05:22:07','2016-01-11 02:44:16'),(43,'15:40:00','2016-01-02',2385,40,1,3,93,3,NULL,63,90,0,0,0,0,0,64.00,3,1.00,0.00,0.00,0,1,1,0,0,0,0,NULL,44,124,'Crédito',0,0,'2016-01-09 05:34:50','2016-01-11 00:45:00'),(44,'17:29:00','2016-01-02',2353,43,1,8,98,3,NULL,63,102,0,0,0,0,0,43.00,3,1.00,0.00,0.00,0,1,1,0,0,0,0,NULL,45,122,'Crédito',0,0,'2016-01-09 05:39:48','2016-01-11 00:41:57'),(45,'10:15:00','2016-01-03',0,67,1,23,156,1,NULL,148,8,0,0,0,0,0,15795.00,0,0.00,0.00,0.00,1,0,1,1,0,0,0,NULL,46,114,'Contado',0,0,'2016-01-10 20:05:20','2016-01-10 20:08:44'),(46,'10:30:00','2016-01-03',0,68,1,9,157,1,NULL,156,5,0,0,0,0,0,40.00,0,0.00,0.00,0.00,1,0,1,1,0,0,0,NULL,47,115,'Contado',0,0,'2016-01-10 20:25:45','2016-01-10 20:26:06'),(47,'10:45:00','2016-01-03',0,69,1,9,158,1,NULL,156,5,0,0,0,0,0,40.00,0,0.00,0.00,0.00,1,0,1,1,0,0,0,NULL,48,116,'Contado',0,0,'2016-01-10 20:29:43','2016-01-10 20:30:04'),(48,'11:20:00','2016-01-03',0,70,1,8,159,1,NULL,58,0,0,0,0,0,0,4010.00,0,0.00,0.00,0.00,1,0,1,1,0,0,0,NULL,49,117,'Contado',0,0,'2016-01-10 20:35:35','2016-01-10 20:37:20'),(49,'05:56:00','2016-01-03',307,2,1,3,12,3,NULL,124,116,0,0,0,0,0,706.00,3,2.00,0.00,0.00,1,1,1,1,0,0,0,NULL,50,140,'Crédito',0,0,'2016-01-10 20:39:22','2016-01-11 18:11:32'),(50,'09:37:00','2016-01-03',310,4,1,3,12,3,NULL,124,109,0,0,0,0,0,39.00,3,1.00,0.00,0.00,1,1,1,1,0,0,0,NULL,51,118,'Crédito',0,0,'2016-01-10 20:46:03','2016-01-10 20:46:40'),(51,'06:37:00','2016-01-03',742,11,1,3,38,3,NULL,40,156,0,0,0,0,0,617.00,2,2.00,0.00,0.00,1,1,1,1,0,0,0,NULL,52,119,'Crédito',0,0,'2016-01-10 20:49:02','2016-01-10 20:49:39'),(52,'09:34:00','2016-01-03',9701,15,1,8,6,3,NULL,40,134,0,0,0,0,0,42.00,2,1.00,0.00,0.00,1,1,1,1,0,0,0,NULL,53,120,'Crédito',0,0,'2016-01-10 20:56:06','2016-01-10 20:56:27'),(53,'11:26:00','2016-01-03',2970,71,1,9,160,2,NULL,63,10,0,0,0,0,0,53.00,0,0.00,0.00,0.00,0,0,1,0,0,0,0,NULL,54,123,'Crédito',0,0,'2016-01-10 21:01:23','2016-01-11 00:42:56'),(54,'15:43:00','2016-01-03',2385,43,1,3,85,3,NULL,63,103,0,0,0,0,0,64.00,3,1.00,0.00,0.00,0,1,1,0,0,0,0,NULL,55,121,'Crédito',0,0,'2016-01-10 21:03:39','2016-01-11 00:40:14'),(55,'00:00:00','2016-01-03',2353,44,1,8,67,3,NULL,63,93,0,0,0,0,0,56.00,2,1.00,0.00,0.00,0,1,1,0,0,0,0,NULL,56,125,'Crédito',0,0,'2016-01-11 00:48:56','2016-01-11 00:50:35'),(56,'16:41:00','2016-01-03',971,15,1,4,161,3,NULL,40,136,0,0,0,0,0,41.00,3,1.00,0.00,0.00,1,1,1,1,0,0,0,NULL,57,126,'Crédito',0,0,'2016-01-11 00:53:39','2016-01-11 00:54:32'),(57,'17:30:00','2016-01-03',746,11,1,3,162,3,NULL,40,158,0,0,0,0,0,46.00,2,1.00,0.00,0.00,1,1,1,1,0,0,0,NULL,58,127,'Crédito',0,0,'2016-01-11 00:57:54','2016-01-11 00:58:18'),(58,'05:30:00','2016-01-04',0,72,1,65,163,1,NULL,15,0,0,0,0,0,0,360.00,0,0.00,0.00,0.00,1,0,1,1,0,0,0,NULL,59,139,'Contado',0,0,'2016-01-11 01:18:54','2016-01-11 18:09:49'),(59,'05:50:00','2016-01-04',802,73,1,4,164,2,NULL,45,104,0,0,0,0,0,505.00,0,0.00,0.00,0.00,1,0,1,1,0,0,0,NULL,61,128,'Crédito',0,0,'2016-01-11 01:31:29','2016-01-11 01:31:58'),(60,'07:40:00','2016-01-02',345,6,1,3,165,3,NULL,13,143,0,0,0,0,0,45.00,1,1.00,0.00,0.00,1,1,1,1,0,0,0,NULL,62,129,'Crédito',0,0,'2016-01-11 01:36:55','2016-01-11 01:38:14'),(61,'20:40:00','2016-01-03',351,5,1,3,110,3,NULL,13,119,0,0,0,0,0,35.00,2,1.00,0.00,0.00,1,1,1,1,0,0,0,NULL,63,130,'Crédito',0,0,'2016-01-11 01:40:51','2016-01-11 01:41:18'),(62,'07:50:00','2016-01-04',0,53,1,7,153,1,NULL,101,0,0,0,0,0,0,1238.00,0,0.00,0.00,0.00,0,0,1,1,0,0,0,NULL,64,131,'Contado',0,0,'2016-01-11 01:42:43','2016-01-11 01:43:16'),(63,'09:00:00','2016-01-04',0,74,1,9,166,1,NULL,54,5,0,0,0,0,0,2632.00,0,0.00,0.00,0.00,0,0,1,1,0,0,0,NULL,65,132,'Contado',0,0,'2016-01-11 01:48:15','2016-01-11 01:48:39'),(64,'09:30:00','2016-01-04',0,75,1,18,167,1,NULL,159,5,0,0,0,0,0,1089.00,0,0.00,0.00,0.00,1,0,1,1,0,0,0,NULL,66,133,'Contado',0,0,'2016-01-11 01:55:00','2016-01-11 01:57:45'),(65,'10:45:00','2016-01-04',0,76,1,3,168,1,NULL,160,1,0,0,0,0,0,50.00,0,0.00,0.00,0.00,1,0,1,1,0,0,0,NULL,67,134,'Contado',0,0,'2016-01-11 02:04:21','2016-01-11 02:04:58'),(66,'12:00:00','2016-01-04',0,77,1,8,144,1,NULL,74,2,0,0,0,0,0,45816.00,0,0.00,0.00,0.00,0,0,1,1,0,0,0,NULL,68,135,'Contado',0,0,'2016-01-11 02:22:36','2016-01-11 02:24:37'),(67,'14:30:00','2016-01-02',0,61,1,8,8,1,NULL,153,0,0,0,0,0,0,17250.00,0,0.00,0.00,0.00,1,0,1,1,0,0,0,NULL,30,141,'Contado',0,0,'2016-01-11 18:15:16','2016-01-11 18:24:42'),(68,'11:30:00','2016-01-04',0,78,1,5,169,1,NULL,161,0,0,0,0,0,0,36.00,0,0.00,0.00,0.00,1,0,1,1,0,0,0,NULL,69,143,'Contado',0,0,'2016-01-14 00:49:03','2016-01-14 00:51:20'),(69,'09:42:00','2016-01-04',970,15,1,8,39,3,NULL,40,139,0,0,0,0,0,42.00,3,1.00,0.00,0.00,1,1,1,1,0,0,0,NULL,70,144,'Crédito',0,0,'2016-01-14 01:01:49','2016-01-14 01:02:49'),(71,'18:30:00','2016-01-03',315,2,1,8,7,3,NULL,124,118,0,0,0,0,0,32.00,3,1.00,0.00,0.00,1,1,1,1,0,0,0,NULL,71,145,'Crédito',0,0,'2016-01-14 01:26:57','2016-01-14 01:37:04'),(72,'05:50:00','2016-01-04',307,2,1,3,7,3,NULL,124,119,0,0,0,0,0,544.00,2,3.00,0.00,0.00,1,1,1,1,0,0,0,NULL,72,146,'Crédito',0,0,'2016-01-14 01:45:39','2016-01-14 01:46:20'),(73,'09:30:00','2016-01-04',310,2,1,3,7,3,NULL,124,113,0,0,0,0,0,38.00,2,1.00,0.00,0.00,1,1,1,1,0,0,0,NULL,73,147,'Crédito',0,0,'2016-01-14 01:49:32','2016-01-14 01:50:11'),(74,'14:30:00','2016-01-04',0,79,1,26,171,1,NULL,162,5,0,0,0,0,0,72.00,0,0.00,0.00,0.00,1,0,1,1,0,0,0,NULL,74,148,'Contado',0,0,'2016-01-14 02:21:32','2016-01-14 02:22:20'),(75,'09:50:00','2016-01-03',0,26,1,9,138,2,NULL,139,19,0,0,0,0,0,1341.00,0,0.00,0.00,0.00,0,0,1,1,0,0,0,NULL,75,149,'Crédito',0,0,'2016-01-14 03:03:47','2016-01-14 03:04:22'),(76,'09:02:00','2016-01-03',0,21,1,9,136,2,NULL,139,19,0,0,0,0,0,1247.00,0,0.00,0.00,0.00,0,0,1,1,0,0,0,NULL,76,150,'Crédito',0,0,'2016-01-14 03:07:07','2016-01-14 03:07:46'),(77,'09:30:00','2016-01-03',0,27,1,9,135,2,NULL,139,19,0,0,0,0,0,1330.00,0,0.00,0.00,0.00,0,0,1,1,0,0,0,NULL,77,151,'Crédito',0,0,'2016-01-14 03:11:13','2016-01-14 03:11:39'),(78,'08:42:00','2016-01-04',0,27,1,9,135,2,NULL,139,8,0,0,0,0,0,1195.00,0,0.00,0.00,0.00,0,0,1,1,0,0,0,NULL,78,152,'Crédito',0,0,'2016-01-14 03:12:48','2016-01-14 03:13:10'),(79,'09:10:00','2016-01-04',0,21,1,9,140,2,NULL,139,18,0,0,0,0,0,1273.00,0,0.00,0.00,0.00,0,0,1,1,0,0,0,NULL,79,153,'Crédito',0,0,'2016-01-14 03:15:48','2016-01-14 03:16:17'),(80,'08:56:00','2016-01-04',0,26,1,9,138,2,NULL,139,19,0,0,0,0,0,1207.00,0,0.00,0.00,0.00,0,0,1,1,0,0,0,NULL,80,154,'Crédito',0,0,'2016-01-14 03:17:21','2016-01-14 03:17:45'),(81,'15:56:00','2016-01-04',2385,49,1,3,172,3,NULL,63,94,0,0,0,0,0,78.00,2,1.00,0.00,0.00,0,1,1,0,0,0,0,NULL,81,155,'Crédito',0,0,'2016-01-14 03:20:38','2016-01-14 03:22:26'),(82,'15:47:00','2016-01-04',2353,50,1,8,63,3,NULL,63,99,0,0,0,0,0,46.00,3,1.00,0.00,0.00,0,1,1,0,0,0,0,NULL,82,156,'Crédito',0,0,'2016-01-14 03:26:16','2016-01-14 03:27:31'),(83,'16:35:00','2016-01-04',971,14,1,4,6,3,NULL,40,129,0,0,0,0,0,51.00,3,1.00,0.00,0.00,1,1,1,1,0,0,0,NULL,83,157,'Crédito',0,0,'2016-01-14 03:29:36','2016-01-14 03:29:59'),(84,'06:32:00','2016-01-04',0,24,1,7,134,2,NULL,125,0,0,0,0,0,0,1199.00,0,0.00,0.00,0.00,0,0,1,1,0,0,0,NULL,84,158,'Crédito',0,0,'2016-01-14 03:31:51','2016-01-14 03:32:22'),(85,'07:24:00','2016-01-04',345,54,1,3,173,3,NULL,13,157,0,0,0,0,0,35.00,2,1.00,0.00,0.00,1,1,1,1,0,0,0,NULL,85,159,'Crédito',0,0,'2016-01-14 03:35:26','2016-01-14 03:36:15'),(86,'07:00:00','2016-01-05',0,56,1,5,144,1,NULL,150,2,0,0,0,0,0,3941.00,0,0.00,0.00,0.00,0,0,1,1,0,0,0,NULL,86,160,'Contado',0,0,'2016-01-14 03:38:16','2016-01-14 03:38:41'),(87,'06:51:00','2016-01-05',0,24,1,7,134,2,NULL,125,1,0,0,0,0,0,1221.00,0,0.00,0.00,0.00,0,0,1,1,0,0,0,NULL,87,161,'Crédito',0,0,'2016-01-14 03:40:14','2016-01-14 03:40:51'),(88,'22:11:00','2016-01-04',351,5,1,3,109,3,NULL,13,120,0,0,0,0,0,67.00,0,0.00,0.00,0.00,1,0,1,1,0,0,0,NULL,88,162,'Crédito',0,0,'2016-01-14 03:42:54','2016-01-14 03:43:24'),(89,'09:30:00','2016-01-05',0,80,1,9,174,1,NULL,163,19,0,0,0,0,0,1410.00,0,0.00,0.00,0.00,1,0,1,1,0,0,0,NULL,89,163,'Contado',0,0,'2016-01-14 03:50:18','2016-01-14 03:50:44'),(90,'05:55:00','2016-01-05',802,73,1,4,175,2,NULL,45,0,0,0,0,0,0,505.00,0,0.00,0.00,0.00,1,0,1,1,0,0,0,NULL,90,164,'Crédito',0,0,'2016-01-14 03:54:03','2016-01-14 03:54:34'),(91,'05:55:00','2016-01-05',802,73,1,4,175,2,NULL,45,96,0,0,0,0,0,505.00,0,0.00,0.00,0.00,1,0,1,1,0,0,0,NULL,91,165,'Crédito',0,0,'2016-01-14 04:04:20','2016-01-14 04:04:52'),(93,'08:30:00','2016-01-05',0,53,1,7,141,1,NULL,101,1,0,0,0,0,0,1290.00,0,0.00,0.00,0.00,0,0,1,1,0,0,0,NULL,92,166,'Contado',0,0,'2016-01-14 04:09:51','2016-01-14 04:10:13'),(94,'09:30:00','2016-01-05',0,55,1,9,143,1,NULL,54,4,0,0,0,0,0,73.00,0,0.00,0.00,0.00,0,0,1,1,0,0,0,NULL,93,167,'Contado',0,0,'2016-01-14 17:47:35','2016-01-14 17:49:34'),(95,'09:00:00','2016-01-05',0,81,1,16,176,1,NULL,164,4,0,0,0,0,0,50.00,0,0.00,0.00,0.00,1,0,1,1,0,0,0,NULL,94,168,'Contado',0,0,'2016-01-14 17:57:10','2016-01-14 17:57:40'),(96,'10:00:00','2016-01-05',0,82,1,9,177,1,NULL,54,4,0,0,0,0,0,4134.00,0,0.00,0.00,0.00,0,0,1,1,0,0,0,NULL,95,169,'Contado',0,0,'2016-01-14 18:02:46','2016-01-14 18:03:12'),(97,'10:15:00','2016-01-05',0,83,1,9,178,1,NULL,165,0,0,0,0,0,0,985.00,0,0.00,0.00,0.00,1,0,1,1,0,0,0,NULL,96,170,'Contado',0,0,'2016-01-14 18:12:44','2016-01-14 18:13:26'),(98,'11:30:00','2016-01-05',0,84,1,3,179,1,NULL,166,7,0,0,0,0,0,142.00,0,0.00,0.00,0.00,1,0,1,1,0,0,0,NULL,97,171,'Contado',0,0,'2016-01-14 18:21:34','2016-01-14 18:22:30'),(99,'15:00:00','2016-01-05',0,85,1,5,180,1,NULL,80,1,0,0,0,0,0,290.00,0,0.00,0.00,0.00,1,0,1,1,0,0,0,NULL,98,172,'Contado',0,0,'2016-01-14 18:28:00','2016-01-14 18:28:29'),(100,'11:40:00','2016-01-05',0,86,1,23,181,1,NULL,22,0,0,0,0,0,0,165.00,0,0.00,0.00,0.00,0,0,1,1,0,0,0,NULL,99,173,'Contado',0,0,'2016-01-14 18:36:03','2016-01-14 18:36:36'),(101,'13:00:00','2016-01-05',0,87,1,3,182,1,NULL,167,2,0,0,0,0,0,154.00,0,0.00,0.00,0.00,1,0,1,1,0,0,0,NULL,100,174,'Contado',0,0,'2016-01-14 18:42:41','2016-01-14 18:43:17'),(102,'12:00:00','2016-01-05',0,88,1,5,183,1,NULL,121,0,0,0,0,0,0,55.00,0,0.00,0.00,0.00,1,0,1,1,0,0,0,NULL,101,175,'Contado',0,0,'2016-01-14 18:52:55','2016-01-14 18:53:27'),(103,'12:10:00','2016-01-05',0,89,1,5,184,1,NULL,121,0,0,0,0,0,0,31.00,0,0.00,0.00,0.00,1,0,1,1,0,0,0,NULL,102,176,'Contado',0,0,'2016-01-14 18:57:11','2016-01-14 18:57:35'),(104,'09:00:00','2016-01-05',0,21,1,9,140,2,NULL,139,17,0,0,0,0,0,1232.00,0,0.00,0.00,0.00,0,0,1,1,0,0,0,NULL,103,177,'Crédito',0,0,'2016-01-14 18:59:32','2016-01-14 19:00:21'),(105,'09:14:00','2016-01-05',0,26,1,9,136,2,NULL,139,18,0,0,0,0,0,1266.00,0,0.00,0.00,0.00,0,0,1,1,0,0,0,NULL,104,178,'Crédito',0,0,'2016-01-14 19:03:00','2016-01-14 19:03:30'),(106,'09:30:00','2016-01-05',0,27,1,9,135,2,NULL,139,6,0,0,0,0,0,1325.00,0,0.00,0.00,0.00,0,0,1,1,0,0,0,NULL,105,179,'Crédito',0,0,'2016-01-14 19:05:43','2016-01-14 19:06:28'),(107,'05:48:00','2016-01-05',740,16,1,3,24,3,NULL,40,139,0,0,0,0,0,538.00,3,3.00,0.00,0.00,1,1,1,1,0,0,0,NULL,106,180,'Crédito',0,0,'2016-01-14 19:09:03','2016-01-14 19:09:43'),(108,'09:55:00','2016-01-05',970,14,1,8,185,3,NULL,40,130,0,0,0,0,0,33.00,3,1.00,0.00,0.00,1,1,1,1,0,0,0,NULL,107,181,'Crédito',0,0,'2016-01-14 19:13:13','2016-01-14 19:13:59'),(109,'14:45:00','2016-01-05',0,90,1,28,186,1,NULL,168,6,0,0,0,0,0,75.00,0,0.00,0.00,0.00,1,0,1,1,0,0,0,NULL,108,182,'Contado',0,0,'2016-01-14 19:22:24','2016-01-14 19:22:47'),(110,'14:30:00','2016-01-05',0,91,1,11,137,2,NULL,139,0,0,0,0,0,0,30.00,0,0.00,0.00,0.00,0,0,1,1,0,0,0,NULL,109,183,'Crédito',0,0,'2016-01-14 19:27:25','2016-01-14 19:27:58'),(111,'15:00:00','2016-01-05',0,64,1,11,150,1,NULL,156,0,0,0,0,0,0,30.00,0,0.00,0.00,0.00,1,0,1,1,0,0,0,NULL,110,184,'Contado',0,0,'2016-01-14 19:30:12','2016-01-14 19:31:51'),(112,'15:00:00','2016-01-05',0,92,1,11,187,1,NULL,156,0,0,0,0,0,0,28.00,0,0.00,0.00,0.00,1,0,1,1,0,0,0,NULL,111,185,'Contado',0,0,'2016-01-14 19:37:04','2016-01-14 19:37:27'),(113,'15:30:00','2016-01-05',0,62,1,5,154,1,NULL,154,1,0,0,0,0,0,315.00,0,0.00,0.00,0.00,1,0,1,1,0,0,0,NULL,112,186,'Contado',0,0,'2016-01-14 19:39:42','2016-01-14 19:40:06'),(114,'15:50:00','2016-01-05',2385,49,1,3,188,3,NULL,63,97,0,0,0,0,0,73.00,2,2.00,0.00,0.00,0,1,1,0,0,0,0,NULL,113,187,'Crédito',0,0,'2016-01-14 19:44:12','2016-01-14 19:47:02'),(115,'15:44:00','2016-01-05',2353,45,1,8,133,3,NULL,63,97,0,0,0,0,0,48.00,3,1.00,0.00,0.00,0,1,1,0,0,0,0,NULL,114,188,'Crédito',0,0,'2016-01-14 19:49:34','2016-01-14 19:50:10'),(116,'16:57:00','2016-01-04',313,4,1,3,11,3,NULL,124,112,0,0,0,0,0,41.00,2,1.00,0.00,0.00,1,1,1,1,0,0,0,NULL,115,189,'Crédito',0,0,'2016-01-14 19:51:56','2016-01-14 19:52:30'),(117,'05:55:00','2016-01-05',307,4,1,3,11,3,NULL,124,117,0,0,0,0,0,592.00,2,3.00,0.00,0.00,1,1,1,1,0,0,0,NULL,116,190,'Crédito',0,0,'2016-01-14 19:54:35','2016-01-14 19:55:14'),(118,'09:45:00','2016-01-05',310,4,1,3,12,3,NULL,124,120,0,0,0,0,0,48.00,2,1.00,0.00,0.00,1,1,1,1,0,0,0,NULL,117,191,'Crédito',0,0,'2016-01-14 20:03:05','2016-01-14 20:03:46'),(119,'09:30:00','2016-01-05',0,93,1,3,189,1,NULL,12,0,0,0,0,0,0,25.00,0,0.00,0.00,0.00,1,0,1,1,0,0,0,NULL,118,192,'Contado',0,0,'2016-01-14 20:08:13','2016-01-14 20:08:33'),(120,'16:25:00','2016-01-05',971,16,1,4,161,3,NULL,40,107,0,0,0,0,0,53.00,0,0.00,0.00,0.00,1,0,1,1,0,0,0,NULL,119,193,'Crédito',0,0,'2016-01-14 20:10:05','2016-01-14 20:10:32'),(121,'18:04:00','2016-01-05',746,11,1,3,49,3,NULL,40,163,0,0,0,0,0,64.00,2,1.00,0.00,0.00,1,1,1,1,0,0,0,NULL,120,194,'Crédito',0,0,'2016-01-14 20:12:13','2016-01-14 20:13:07'),(122,'08:00:00','2016-01-06',0,67,1,23,156,1,NULL,148,0,0,0,0,0,0,1185.00,0,0.00,0.00,0.00,1,0,1,1,0,0,0,NULL,121,195,'Contado',0,0,'2016-01-14 20:14:56','2016-01-14 20:16:32'),(123,'08:30:00','2016-01-06',0,56,1,5,144,1,NULL,150,3,0,0,0,0,0,947.00,0,0.00,0.00,0.00,1,0,1,1,0,0,0,NULL,122,196,'Contado',0,0,'2016-01-14 20:18:28','2016-01-14 20:18:50'),(124,'08:30:00','2016-01-06',0,75,1,21,167,1,NULL,159,4,0,0,0,0,0,990.00,0,0.00,0.00,0.00,1,0,1,1,0,0,0,NULL,123,197,'Contado',0,0,'2016-01-14 20:22:00','2016-01-14 20:22:19'),(125,'08:45:00','2016-01-06',0,94,1,18,190,1,NULL,168,0,0,0,0,0,0,11145.00,0,0.00,0.00,0.00,1,0,1,1,0,0,0,NULL,124,198,'Contado',0,0,'2016-01-14 20:27:28','2016-01-14 20:27:46'),(127,'15:00:00','2016-01-06',0,25,1,5,191,1,NULL,24,2,0,0,0,0,0,415.00,0,0.00,0.00,0.00,1,0,1,1,0,0,0,NULL,125,199,'Contado',0,0,'2016-01-14 20:36:16','2016-01-14 20:36:33'),(128,'08:30:00','2016-01-06',0,86,1,3,181,1,NULL,22,0,0,0,0,0,0,540.00,0,0.00,0.00,0.00,0,0,1,1,0,0,0,NULL,126,200,'Contado',0,0,'2016-01-14 20:43:29','2016-01-14 20:43:53'),(129,'12:00:00','2016-01-06',0,59,1,56,149,1,NULL,106,7,0,0,0,0,0,4170.00,0,0.00,0.00,0.00,0,0,1,1,0,0,0,NULL,127,201,'Contado',0,0,'2016-01-14 20:45:21','2016-01-14 20:45:42'),(130,'12:00:00','2016-01-06',0,55,1,9,192,1,NULL,54,4,0,0,0,0,0,1412.00,0,0.00,0.00,0.00,0,0,1,1,0,0,0,NULL,128,202,'Contado',0,0,'2016-01-14 20:48:42','2016-01-14 20:49:04'),(131,'12:30:00','2016-01-06',0,95,1,5,193,1,NULL,169,0,0,0,0,0,0,52.00,0,0.00,0.00,0.00,1,0,1,1,0,0,0,NULL,129,203,'Contado',0,0,'2016-01-14 20:54:09','2016-01-14 20:54:24'),(132,'13:30:00','2016-01-06',0,69,1,11,158,1,NULL,156,0,0,0,0,0,0,27.00,0,0.00,0.00,0.00,1,0,1,1,0,0,0,NULL,130,204,'Contado',0,0,'2016-01-14 20:55:47','2016-01-14 20:56:17'),(133,'06:30:00','2016-01-02',1121,73,1,4,194,3,NULL,45,58,0,0,0,0,0,565.00,0,0.00,0.00,0.00,1,0,1,1,0,0,0,NULL,131,205,'Crédito',0,0,'2016-01-14 21:00:15','2016-01-14 21:01:25'),(134,'06:55:00','2016-01-06',802,96,1,4,195,3,NULL,45,106,0,0,0,0,0,585.00,0,0.00,0.00,0.00,1,0,1,1,0,0,0,NULL,132,206,'Crédito',0,0,'2016-01-14 21:07:34','2016-01-14 21:08:25'),(135,'21:00:00','2016-01-05',351,5,1,3,109,3,NULL,13,90,0,0,0,0,0,26.00,3,1.00,0.00,0.00,1,1,1,1,0,0,0,NULL,133,NULL,'Crédito',0,0,'2016-01-14 21:10:04','2016-01-14 21:10:04'),(136,'07:22:00','2016-01-05',345,54,1,3,119,3,NULL,13,142,0,0,0,0,0,32.00,2,1.00,0.00,0.00,1,1,1,1,0,0,0,NULL,134,NULL,'Crédito',0,0,'2016-01-14 21:12:36','2016-01-14 21:12:36');
/*!40000 ALTER TABLE `despegues` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estacionamiento_aeronaves`
--

DROP TABLE IF EXISTS `estacionamiento_aeronaves`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estacionamiento_aeronaves` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tiempoLibreInt` int(11) NOT NULL,
  `eq_bloqueInt` double(7,5) NOT NULL,
  `minBloqueInt` int(11) NOT NULL,
  `tiempoLibreNac` int(11) NOT NULL,
  `eq_bloqueNac` double(7,5) NOT NULL,
  `minBloqueNac` int(11) NOT NULL,
  `aeropuerto_id` int(10) unsigned NOT NULL,
  `conceptoCredito_id` int(10) unsigned NOT NULL,
  `conceptoContado_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `estacionamiento_aeronaves_aeropuerto_id_foreign` (`aeropuerto_id`),
  KEY `estacionamiento_aeronaves_conceptocredito_id_foreign` (`conceptoCredito_id`),
  KEY `estacionamiento_aeronaves_conceptocontado_id_foreign` (`conceptoContado_id`),
  CONSTRAINT `estacionamiento_aeronaves_conceptocontado_id_foreign` FOREIGN KEY (`conceptoContado_id`) REFERENCES `conceptos` (`id`),
  CONSTRAINT `estacionamiento_aeronaves_aeropuerto_id_foreign` FOREIGN KEY (`aeropuerto_id`) REFERENCES `aeropuertos` (`id`),
  CONSTRAINT `estacionamiento_aeronaves_conceptocredito_id_foreign` FOREIGN KEY (`conceptoCredito_id`) REFERENCES `conceptos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estacionamiento_aeronaves`
--

LOCK TABLES `estacionamiento_aeronaves` WRITE;
/*!40000 ALTER TABLE `estacionamiento_aeronaves` DISABLE KEYS */;
INSERT INTO `estacionamiento_aeronaves` VALUES (1,120,0.09810,60,60,0.07480,60,1,69,55,'0000-00-00 00:00:00','2015-12-08 05:06:40');
/*!40000 ALTER TABLE `estacionamiento_aeronaves` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estacionamientoclientes`
--

DROP TABLE IF EXISTS `estacionamientoclientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estacionamientoclientes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` char(150) COLLATE utf8_unicode_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `costoUnidad` int(10) unsigned NOT NULL,
  `fechaSuscripcion` date NOT NULL,
  `isActivo` tinyint(1) NOT NULL,
  `nPagos` int(11) NOT NULL,
  `estacionamiento_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `estacionamientoclientes_estacionamiento_id_foreign` (`estacionamiento_id`),
  CONSTRAINT `estacionamientoclientes_estacionamiento_id_foreign` FOREIGN KEY (`estacionamiento_id`) REFERENCES `estacionamientos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estacionamientoclientes`
--

LOCK TABLES `estacionamientoclientes` WRITE;
/*!40000 ALTER TABLE `estacionamientoclientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `estacionamientoclientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estacionamientoconceptos`
--

DROP TABLE IF EXISTS `estacionamientoconceptos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estacionamientoconceptos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` char(150) COLLATE utf8_unicode_ci NOT NULL,
  `costo` double(8,2) NOT NULL,
  `estacionamiento_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `estacionamientoconceptos_estacionamiento_id_foreign` (`estacionamiento_id`),
  CONSTRAINT `estacionamientoconceptos_estacionamiento_id_foreign` FOREIGN KEY (`estacionamiento_id`) REFERENCES `estacionamientos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estacionamientoconceptos`
--

LOCK TABLES `estacionamientoconceptos` WRITE;
/*!40000 ALTER TABLE `estacionamientoconceptos` DISABLE KEYS */;
INSERT INTO `estacionamientoconceptos` VALUES (1,'predeterminado',0.00,1,'2016-01-05 19:55:44','2016-01-05 19:55:44');
/*!40000 ALTER TABLE `estacionamientoconceptos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estacionamientoops`
--

DROP TABLE IF EXISTS `estacionamientoops`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estacionamientoops` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `nTaquillas` int(11) NOT NULL,
  `nTurnos` int(11) NOT NULL,
  `total` double(8,2) NOT NULL,
  `depositado` double(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estacionamientoops`
--

LOCK TABLES `estacionamientoops` WRITE;
/*!40000 ALTER TABLE `estacionamientoops` DISABLE KEYS */;
/*!40000 ALTER TABLE `estacionamientoops` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estacionamientooptarjetas`
--

DROP TABLE IF EXISTS `estacionamientooptarjetas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estacionamientooptarjetas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `estacionamientocliente_id` int(10) unsigned NOT NULL,
  `cantidad` int(11) NOT NULL,
  `banco_id` int(10) unsigned NOT NULL,
  `bancoscuenta_id` int(10) unsigned NOT NULL,
  `total` double(8,2) NOT NULL,
  `deposito` char(150) COLLATE utf8_unicode_ci NOT NULL,
  `estacionamientoop_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `estacionamientooptarjetas_estacionamientocliente_id_foreign` (`estacionamientocliente_id`),
  KEY `estacionamientooptarjetas_estacionamientoop_id_foreign` (`estacionamientoop_id`),
  KEY `estacionamientooptarjetas_banco_id_foreign` (`banco_id`),
  KEY `estacionamientooptarjetas_bancoscuenta_id_foreign` (`bancoscuenta_id`),
  CONSTRAINT `estacionamientooptarjetas_bancoscuenta_id_foreign` FOREIGN KEY (`bancoscuenta_id`) REFERENCES `bancoscuentas` (`id`),
  CONSTRAINT `estacionamientooptarjetas_banco_id_foreign` FOREIGN KEY (`banco_id`) REFERENCES `bancos` (`id`),
  CONSTRAINT `estacionamientooptarjetas_estacionamientocliente_id_foreign` FOREIGN KEY (`estacionamientocliente_id`) REFERENCES `estacionamientoclientes` (`id`),
  CONSTRAINT `estacionamientooptarjetas_estacionamientoop_id_foreign` FOREIGN KEY (`estacionamientoop_id`) REFERENCES `estacionamientoops` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estacionamientooptarjetas`
--

LOCK TABLES `estacionamientooptarjetas` WRITE;
/*!40000 ALTER TABLE `estacionamientooptarjetas` DISABLE KEYS */;
/*!40000 ALTER TABLE `estacionamientooptarjetas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estacionamientooptickets`
--

DROP TABLE IF EXISTS `estacionamientooptickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estacionamientooptickets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `econcepto_id` int(10) unsigned NOT NULL,
  `taquilla` int(11) NOT NULL,
  `turno` int(11) NOT NULL,
  `costo` double(8,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `monto` double(8,2) NOT NULL,
  `estacionamientoop_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `estacionamientooptickets_econcepto_id_foreign` (`econcepto_id`),
  KEY `estacionamientooptickets_estacionamientoop_id_foreign` (`estacionamientoop_id`),
  CONSTRAINT `estacionamientooptickets_estacionamientoop_id_foreign` FOREIGN KEY (`estacionamientoop_id`) REFERENCES `estacionamientoops` (`id`),
  CONSTRAINT `estacionamientooptickets_econcepto_id_foreign` FOREIGN KEY (`econcepto_id`) REFERENCES `estacionamientoconceptos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estacionamientooptickets`
--

LOCK TABLES `estacionamientooptickets` WRITE;
/*!40000 ALTER TABLE `estacionamientooptickets` DISABLE KEYS */;
/*!40000 ALTER TABLE `estacionamientooptickets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estacionamientoopticketsdepositos`
--

DROP TABLE IF EXISTS `estacionamientoopticketsdepositos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estacionamientoopticketsdepositos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `banco_id` int(10) unsigned NOT NULL,
  `bancoscuenta_id` int(10) unsigned NOT NULL,
  `total` double(8,2) NOT NULL,
  `deposito` char(150) COLLATE utf8_unicode_ci NOT NULL,
  `estacionamientoop_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `estacionamientoopticketsdepositos_estacionamientoop_id_foreign` (`estacionamientoop_id`),
  KEY `estacionamientoopticketsdepositos_banco_id_foreign` (`banco_id`),
  KEY `estacionamientoopticketsdepositos_bancoscuenta_id_foreign` (`bancoscuenta_id`),
  CONSTRAINT `estacionamientoopticketsdepositos_bancoscuenta_id_foreign` FOREIGN KEY (`bancoscuenta_id`) REFERENCES `bancoscuentas` (`id`),
  CONSTRAINT `estacionamientoopticketsdepositos_banco_id_foreign` FOREIGN KEY (`banco_id`) REFERENCES `bancos` (`id`),
  CONSTRAINT `estacionamientoopticketsdepositos_estacionamientoop_id_foreign` FOREIGN KEY (`estacionamientoop_id`) REFERENCES `estacionamientoops` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estacionamientoopticketsdepositos`
--

LOCK TABLES `estacionamientoopticketsdepositos` WRITE;
/*!40000 ALTER TABLE `estacionamientoopticketsdepositos` DISABLE KEYS */;
/*!40000 ALTER TABLE `estacionamientoopticketsdepositos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estacionamientoportons`
--

DROP TABLE IF EXISTS `estacionamientoportons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estacionamientoportons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` char(150) COLLATE utf8_unicode_ci NOT NULL,
  `estacionamiento_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `estacionamientoportons_estacionamiento_id_foreign` (`estacionamiento_id`),
  CONSTRAINT `estacionamientoportons_estacionamiento_id_foreign` FOREIGN KEY (`estacionamiento_id`) REFERENCES `estacionamientos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estacionamientoportons`
--

LOCK TABLES `estacionamientoportons` WRITE;
/*!40000 ALTER TABLE `estacionamientoportons` DISABLE KEYS */;
INSERT INTO `estacionamientoportons` VALUES (1,'predeterminado',1,'2016-01-05 19:55:44','2016-01-05 19:55:44');
/*!40000 ALTER TABLE `estacionamientoportons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estacionamientos`
--

DROP TABLE IF EXISTS `estacionamientos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estacionamientos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nTaquillas` int(11) NOT NULL,
  `nTurnos` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `aeropuerto_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `estacionamientos_aeropuerto_id_foreign` (`aeropuerto_id`),
  CONSTRAINT `estacionamientos_aeropuerto_id_foreign` FOREIGN KEY (`aeropuerto_id`) REFERENCES `aeropuertos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estacionamientos`
--

LOCK TABLES `estacionamientos` WRITE;
/*!40000 ALTER TABLE `estacionamientos` DISABLE KEYS */;
INSERT INTO `estacionamientos` VALUES (1,0,0,'2016-01-05 19:55:44','2016-01-05 19:55:44',1);
/*!40000 ALTER TABLE `estacionamientos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facturadetalles`
--

DROP TABLE IF EXISTS `facturadetalles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facturadetalles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `factura_id` int(10) unsigned NOT NULL,
  `concepto_id` int(10) unsigned NOT NULL,
  `cantidadDes` int(10) unsigned NOT NULL,
  `montoDes` double(8,2) unsigned NOT NULL,
  `descuentoPerDes` double(8,2) unsigned NOT NULL,
  `descuentoTotalDes` double(8,2) unsigned NOT NULL,
  `ivaDes` double(8,2) unsigned NOT NULL,
  `recargoPerDes` double(8,2) unsigned NOT NULL,
  `recargoTotalDes` double(8,2) unsigned NOT NULL,
  `totalDes` double(8,2) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `facturadetalles_factura_id_foreign` (`factura_id`),
  KEY `facturadetalles_concepto_id_foreign` (`concepto_id`),
  CONSTRAINT `facturadetalles_concepto_id_foreign` FOREIGN KEY (`concepto_id`) REFERENCES `conceptos` (`id`),
  CONSTRAINT `facturadetalles_factura_id_foreign` FOREIGN KEY (`factura_id`) REFERENCES `facturas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=599 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facturadetalles`
--

LOCK TABLES `facturadetalles` WRITE;
/*!40000 ALTER TABLE `facturadetalles` DISABLE KEYS */;
INSERT INTO `facturadetalles` VALUES (1,1,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-05 23:35:15','2016-01-05 23:35:15'),(2,1,68,1,61.50,0.00,0.00,0.00,0.00,0.00,61.50,'2016-01-05 23:35:15','2016-01-05 23:35:15'),(29,14,60,1,8121.60,0.00,0.00,12.00,0.00,0.00,9096.19,'2016-01-06 19:37:17','2016-01-06 19:37:17'),(30,15,60,1,10368.00,0.00,0.00,12.00,0.00,0.00,11612.16,'2016-01-06 19:46:11','2016-01-06 19:46:11'),(31,16,60,1,8640.00,0.00,0.00,12.00,0.00,0.00,9676.80,'2016-01-06 19:50:14','2016-01-06 19:50:14'),(32,17,60,1,4147.20,0.00,0.00,12.00,0.00,0.00,4644.86,'2016-01-06 19:52:58','2016-01-06 19:52:58'),(33,18,60,1,8640.00,0.00,0.00,12.00,0.00,0.00,9676.80,'2016-01-06 19:55:31','2016-01-06 19:55:31'),(34,19,60,1,6912.00,0.00,0.00,12.00,0.00,0.00,7741.44,'2016-01-06 19:58:07','2016-01-06 19:58:07'),(35,20,60,1,1000.00,0.00,0.00,12.00,0.00,0.00,1120.00,'2016-01-06 20:01:17','2016-01-06 20:01:17'),(36,21,60,1,8640.00,0.00,0.00,12.00,0.00,0.00,9676.80,'2016-01-06 20:03:29','2016-01-06 20:03:29'),(37,22,60,1,6912.00,0.00,0.00,12.00,0.00,0.00,7741.44,'2016-01-06 20:05:25','2016-01-06 20:05:25'),(38,23,60,1,5529.60,0.00,0.00,12.00,0.00,0.00,6193.15,'2016-01-06 20:06:52','2016-01-06 20:06:52'),(39,24,60,1,11059.20,0.00,0.00,12.00,0.00,0.00,12386.30,'2016-01-06 20:09:17','2016-01-06 20:09:17'),(40,25,60,1,5529.60,0.00,0.00,12.00,0.00,0.00,6193.15,'2016-01-06 20:10:39','2016-01-06 20:10:39'),(41,26,60,1,5529.60,0.00,0.00,12.00,0.00,0.00,6193.15,'2016-01-06 20:12:09','2016-01-06 20:12:09'),(42,27,60,1,1658.88,0.00,0.00,12.00,0.00,0.00,1857.95,'2016-01-06 20:13:39','2016-01-06 20:13:39'),(43,28,60,1,6912.00,0.00,0.00,12.00,0.00,0.00,7741.44,'2016-01-06 20:14:48','2016-01-06 20:14:48'),(44,29,60,1,1658.88,0.00,0.00,12.00,0.00,0.00,1857.95,'2016-01-06 20:16:26','2016-01-06 20:16:26'),(45,30,60,1,4147.20,0.00,0.00,12.00,0.00,0.00,4644.86,'2016-01-06 20:28:06','2016-01-06 20:28:06'),(46,31,60,1,4147.20,0.00,0.00,12.00,0.00,0.00,4644.86,'2016-01-06 20:30:00','2016-01-06 20:30:00'),(47,32,60,1,5529.60,0.00,0.00,12.00,0.00,0.00,6193.15,'2016-01-06 20:31:09','2016-01-06 20:31:09'),(48,33,60,1,5529.60,0.00,0.00,12.00,0.00,0.00,6193.15,'2016-01-06 20:32:41','2016-01-06 20:32:41'),(49,34,60,1,5529.60,0.00,0.00,12.00,0.00,0.00,6193.15,'2016-01-06 20:35:31','2016-01-06 20:35:31'),(50,35,60,1,5529.60,0.00,0.00,12.00,0.00,0.00,6193.15,'2016-01-06 20:37:18','2016-01-06 20:37:18'),(51,36,60,1,5529.60,0.00,0.00,12.00,0.00,0.00,6193.15,'2016-01-06 20:40:34','2016-01-06 20:40:34'),(52,37,60,1,5529.60,0.00,0.00,12.00,0.00,0.00,6193.15,'2016-01-06 20:43:21','2016-01-06 20:43:21'),(53,38,60,1,5529.60,0.00,0.00,12.00,0.00,0.00,6193.15,'2016-01-06 20:45:02','2016-01-06 20:45:02'),(54,39,60,1,4838.40,0.00,0.00,12.00,0.00,0.00,5419.01,'2016-01-06 20:46:55','2016-01-06 20:46:55'),(55,40,60,1,9953.28,0.00,0.00,12.00,0.00,0.00,11147.67,'2016-01-06 20:49:43','2016-01-06 20:49:43'),(56,41,60,1,4147.20,0.00,0.00,12.00,0.00,0.00,4644.86,'2016-01-06 20:53:18','2016-01-06 20:53:18'),(57,42,60,1,4147.20,0.00,0.00,12.00,0.00,0.00,4644.86,'2016-01-06 21:10:49','2016-01-06 21:10:49'),(58,43,60,1,5529.60,0.00,0.00,12.00,0.00,0.00,6193.15,'2016-01-06 22:05:15','2016-01-06 22:05:15'),(59,44,60,1,4147.20,0.00,0.00,12.00,0.00,0.00,4644.86,'2016-01-06 22:08:13','2016-01-06 22:08:13'),(60,45,60,1,7500.00,0.00,0.00,12.00,0.00,0.00,8400.00,'2016-01-06 22:11:20','2016-01-06 22:11:20'),(61,46,60,1,4147.20,0.00,0.00,12.00,0.00,0.00,4644.86,'2016-01-06 22:14:46','2016-01-06 22:14:46'),(62,47,60,1,4147.20,0.00,0.00,12.00,0.00,0.00,4644.86,'2016-01-06 22:17:34','2016-01-06 22:17:34'),(63,48,60,1,2764.80,0.00,0.00,12.00,0.00,0.00,3096.58,'2016-01-06 22:18:57','2016-01-06 22:18:57'),(64,49,60,1,6912.00,0.00,0.00,12.00,0.00,0.00,7741.44,'2016-01-06 22:20:09','2016-01-06 22:20:09'),(65,50,60,1,6912.00,0.00,0.00,12.00,0.00,0.00,7741.44,'2016-01-06 22:21:32','2016-01-06 22:21:32'),(66,51,60,1,3840.00,0.00,0.00,12.00,0.00,0.00,4300.80,'2016-01-06 22:25:27','2016-01-06 22:25:27'),(67,52,60,1,8847.36,0.00,0.00,12.00,0.00,0.00,9909.04,'2016-01-06 22:27:16','2016-01-06 22:27:16'),(68,53,60,1,3369.60,0.00,0.00,12.00,0.00,0.00,3773.95,'2016-01-06 22:29:32','2016-01-06 22:29:32'),(69,54,60,1,2000.00,0.00,0.00,12.00,0.00,0.00,2240.00,'2016-01-06 22:48:54','2016-01-06 22:48:54'),(70,55,60,1,1658.88,0.00,0.00,12.00,0.00,0.00,1857.95,'2016-01-06 22:50:56','2016-01-06 22:50:56'),(71,56,60,1,1658.88,0.00,0.00,12.00,0.00,0.00,1857.95,'2016-01-06 22:53:31','2016-01-06 22:53:31'),(75,58,60,1,1658.88,0.00,0.00,12.00,0.00,0.00,1857.95,'2016-01-07 17:50:57','2016-01-07 17:50:57'),(76,59,60,1,1658.88,0.00,0.00,12.00,0.00,0.00,1857.95,'2016-01-07 17:53:34','2016-01-07 17:53:34'),(77,60,60,1,2764.80,0.00,0.00,12.00,0.00,0.00,3096.58,'2016-01-07 17:55:02','2016-01-07 17:55:02'),(78,61,60,1,6912.00,0.00,0.00,12.00,0.00,0.00,7741.44,'2016-01-07 17:57:03','2016-01-07 17:57:03'),(79,62,60,1,2419.20,0.00,0.00,12.00,0.00,0.00,2709.50,'2016-01-07 17:58:57','2016-01-07 17:58:57'),(80,63,60,1,2764.80,0.00,0.00,12.00,0.00,0.00,3096.58,'2016-01-07 18:00:58','2016-01-07 18:00:58'),(81,64,60,1,5529.60,0.00,0.00,12.00,0.00,0.00,6193.15,'2016-01-07 18:02:28','2016-01-07 18:02:28'),(82,65,60,1,13167.81,0.00,0.00,12.00,0.00,0.00,14747.95,'2016-01-07 18:05:23','2016-01-07 18:05:23'),(83,66,60,1,8640.00,0.00,0.00,12.00,0.00,0.00,9676.80,'2016-01-07 18:06:40','2016-01-07 18:06:40'),(84,67,60,1,4147.20,0.00,0.00,12.00,0.00,0.00,4644.86,'2016-01-07 18:08:38','2016-01-07 18:08:38'),(85,68,60,1,2880.58,0.00,0.00,12.00,0.00,0.00,3226.25,'2016-01-07 18:10:55','2016-01-07 18:10:55'),(86,69,60,1,1658.88,0.00,0.00,12.00,0.00,0.00,1857.95,'2016-01-07 18:13:38','2016-01-07 18:13:38'),(87,70,60,1,2419.20,0.00,0.00,12.00,0.00,0.00,2709.50,'2016-01-07 18:15:27','2016-01-07 18:15:27'),(88,71,60,1,6912.00,0.00,0.00,12.00,0.00,0.00,7741.44,'2016-01-07 18:16:53','2016-01-07 18:16:53'),(89,72,60,1,70118.82,0.00,0.00,12.00,0.00,0.00,78533.08,'2016-01-07 18:19:24','2016-01-07 18:19:24'),(90,73,60,1,6480.00,0.00,0.00,12.00,0.00,0.00,7257.60,'2016-01-07 18:22:17','2016-01-07 18:22:17'),(91,74,60,1,3456.00,0.00,0.00,12.00,0.00,0.00,3870.72,'2016-01-07 18:25:37','2016-01-07 18:25:37'),(92,75,60,1,8930.30,0.00,0.00,12.00,0.00,0.00,10001.94,'2016-01-07 18:28:13','2016-01-07 18:28:13'),(93,76,60,1,4098.82,0.00,0.00,12.00,0.00,0.00,4590.68,'2016-01-07 18:30:12','2016-01-07 18:30:12'),(94,77,60,1,3904.32,0.00,0.00,12.00,0.00,0.00,4372.84,'2016-01-07 18:32:02','2016-01-07 18:32:02'),(95,78,60,1,2260.22,0.00,0.00,12.00,0.00,0.00,2531.45,'2016-01-07 18:34:59','2016-01-07 18:34:59'),(96,79,60,1,1928.45,0.00,0.00,12.00,0.00,0.00,2159.86,'2016-01-07 18:36:16','2016-01-07 18:36:16'),(97,80,60,1,3725.57,0.00,0.00,12.00,0.00,0.00,4172.64,'2016-01-07 18:38:00','2016-01-07 18:38:00'),(98,81,60,1,1919.32,0.00,0.00,12.00,0.00,0.00,2149.64,'2016-01-07 18:41:14','2016-01-07 18:41:14'),(99,82,60,1,1658.88,0.00,0.00,12.00,0.00,0.00,1857.95,'2016-01-07 18:44:43','2016-01-07 18:44:43'),(100,83,60,1,67043.00,0.00,0.00,12.00,0.00,0.00,75088.16,'2016-01-07 18:46:23','2016-01-07 18:46:23'),(101,84,60,1,70118.82,0.00,0.00,12.00,0.00,0.00,78533.08,'2016-01-07 18:48:44','2016-01-07 18:48:44'),(102,85,60,1,22499.99,0.00,0.00,12.00,0.00,0.00,25199.99,'2016-01-07 18:51:12','2016-01-07 18:51:12'),(103,86,60,1,1220.00,0.00,0.00,12.00,0.00,0.00,1366.40,'2016-01-07 19:11:21','2016-01-07 19:11:21'),(104,87,60,1,70118.82,0.00,0.00,12.00,0.00,0.00,78533.08,'2016-01-07 19:19:15','2016-01-07 19:19:15'),(105,88,60,1,11059.20,0.00,0.00,12.00,0.00,0.00,12386.30,'2016-01-07 19:20:32','2016-01-07 19:20:32'),(106,89,60,1,8294.00,0.00,0.00,12.00,0.00,0.00,9289.28,'2016-01-07 19:22:05','2016-01-07 19:22:05'),(227,138,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-11 02:44:16','2016-01-11 02:44:16'),(228,138,54,1,61.50,0.00,0.00,0.00,0.00,0.00,61.50,'2016-01-11 02:44:16','2016-01-11 02:44:16'),(242,142,67,1,902402.28,0.00,0.00,12.00,0.00,0.00,999999.99,'2016-01-13 01:44:16','2016-01-13 01:44:16'),(243,143,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 00:51:20','2016-01-14 00:51:20'),(244,143,54,1,430.50,0.00,0.00,0.00,0.00,0.00,430.50,'2016-01-14 00:51:20','2016-01-14 00:51:20'),(245,144,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 01:02:49','2016-01-14 01:02:49'),(246,144,68,1,4428.00,0.00,0.00,0.00,0.00,0.00,4428.00,'2016-01-14 01:02:49','2016-01-14 01:02:49'),(247,144,72,1,771.00,0.00,0.00,0.00,0.00,0.00,771.00,'2016-01-14 01:02:49','2016-01-14 01:02:49'),(251,145,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 01:39:54','2016-01-14 01:39:54'),(252,145,68,1,4042.50,0.00,0.00,0.00,0.00,0.00,4042.50,'2016-01-14 01:39:54','2016-01-14 01:39:54'),(253,145,72,1,771.00,0.00,0.00,0.00,0.00,0.00,771.00,'2016-01-14 01:39:54','2016-01-14 01:39:54'),(254,146,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 01:46:20','2016-01-14 01:46:20'),(255,146,69,1,5553.90,0.00,0.00,0.00,0.00,0.00,5553.90,'2016-01-14 01:46:20','2016-01-14 01:46:20'),(256,146,68,1,4042.50,0.00,0.00,0.00,0.00,0.00,4042.50,'2016-01-14 01:46:20','2016-01-14 01:46:20'),(257,146,72,1,2313.00,0.00,0.00,0.00,0.00,0.00,2313.00,'2016-01-14 01:46:20','2016-01-14 01:46:20'),(258,147,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 01:50:11','2016-01-14 01:50:11'),(259,147,68,1,3382.50,0.00,0.00,0.00,0.00,0.00,3382.50,'2016-01-14 01:50:11','2016-01-14 01:50:11'),(260,147,72,1,771.00,0.00,0.00,0.00,0.00,0.00,771.00,'2016-01-14 01:50:11','2016-01-14 01:50:11'),(263,149,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 03:04:22','2016-01-14 03:04:22'),(264,149,68,1,307.50,0.00,0.00,0.00,0.00,0.00,307.50,'2016-01-14 03:04:22','2016-01-14 03:04:22'),(265,150,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 03:07:46','2016-01-14 03:07:46'),(266,150,68,1,307.50,0.00,0.00,0.00,0.00,0.00,307.50,'2016-01-14 03:07:46','2016-01-14 03:07:46'),(267,151,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 03:11:39','2016-01-14 03:11:39'),(268,151,68,1,307.50,0.00,0.00,0.00,0.00,0.00,307.50,'2016-01-14 03:11:39','2016-01-14 03:11:39'),(269,152,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 03:13:10','2016-01-14 03:13:10'),(270,152,68,1,307.50,0.00,0.00,0.00,0.00,0.00,307.50,'2016-01-14 03:13:10','2016-01-14 03:13:10'),(271,153,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 03:16:17','2016-01-14 03:16:17'),(272,153,68,1,307.50,0.00,0.00,0.00,0.00,0.00,307.50,'2016-01-14 03:16:17','2016-01-14 03:16:17'),(273,154,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 03:17:45','2016-01-14 03:17:45'),(274,154,68,1,307.50,0.00,0.00,0.00,0.00,0.00,307.50,'2016-01-14 03:17:45','2016-01-14 03:17:45'),(275,155,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 03:22:26','2016-01-14 03:22:26'),(276,155,72,1,771.00,0.00,0.00,0.00,0.00,0.00,771.00,'2016-01-14 03:22:26','2016-01-14 03:22:26'),(277,156,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 03:27:31','2016-01-14 03:27:31'),(278,156,72,1,771.00,0.00,0.00,0.00,0.00,0.00,771.00,'2016-01-14 03:27:31','2016-01-14 03:27:31'),(279,157,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 03:29:59','2016-01-14 03:29:59'),(280,157,68,1,4428.00,0.00,0.00,0.00,0.00,0.00,4428.00,'2016-01-14 03:29:59','2016-01-14 03:29:59'),(281,157,72,1,771.00,0.00,0.00,0.00,0.00,0.00,771.00,'2016-01-14 03:29:59','2016-01-14 03:29:59'),(282,158,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 03:32:22','2016-01-14 03:32:22'),(283,158,68,1,61.50,0.00,0.00,0.00,0.00,0.00,61.50,'2016-01-14 03:32:22','2016-01-14 03:32:22'),(284,159,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 03:36:15','2016-01-14 03:36:15'),(285,159,68,1,3936.00,0.00,0.00,0.00,0.00,0.00,3936.00,'2016-01-14 03:36:15','2016-01-14 03:36:15'),(286,159,72,1,771.00,0.00,0.00,0.00,0.00,0.00,771.00,'2016-01-14 03:36:15','2016-01-14 03:36:15'),(287,160,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 03:38:41','2016-01-14 03:38:41'),(288,160,54,1,255.00,0.00,0.00,0.00,0.00,0.00,255.00,'2016-01-14 03:38:41','2016-01-14 03:38:41'),(289,161,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 03:40:51','2016-01-14 03:40:51'),(290,161,68,1,61.50,0.00,0.00,0.00,0.00,0.00,61.50,'2016-01-14 03:40:51','2016-01-14 03:40:51'),(291,162,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 03:43:24','2016-01-14 03:43:24'),(292,162,69,1,617.10,0.00,0.00,0.00,0.00,0.00,617.10,'2016-01-14 03:43:24','2016-01-14 03:43:24'),(293,162,68,1,4042.50,0.00,0.00,0.00,0.00,0.00,4042.50,'2016-01-14 03:43:24','2016-01-14 03:43:24'),(294,163,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 03:50:44','2016-01-14 03:50:44'),(295,163,55,1,1806.42,0.00,0.00,0.00,0.00,0.00,1806.42,'2016-01-14 03:50:44','2016-01-14 03:50:44'),(296,163,54,1,430.50,0.00,0.00,0.00,0.00,0.00,430.50,'2016-01-14 03:50:44','2016-01-14 03:50:44'),(297,164,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 03:54:34','2016-01-14 03:54:34'),(298,164,69,1,4936.80,0.00,0.00,0.00,0.00,0.00,4936.80,'2016-01-14 03:54:34','2016-01-14 03:54:34'),(299,164,68,1,4042.50,0.00,0.00,0.00,0.00,0.00,4042.50,'2016-01-14 03:54:34','2016-01-14 03:54:34'),(300,165,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 04:04:52','2016-01-14 04:04:52'),(301,165,69,1,4936.80,0.00,0.00,0.00,0.00,0.00,4936.80,'2016-01-14 04:04:52','2016-01-14 04:04:52'),(302,165,68,1,4042.50,0.00,0.00,0.00,0.00,0.00,4042.50,'2016-01-14 04:04:52','2016-01-14 04:04:52'),(303,166,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 04:10:13','2016-01-14 04:10:13'),(304,166,54,1,61.50,0.00,0.00,0.00,0.00,0.00,61.50,'2016-01-14 04:10:13','2016-01-14 04:10:13'),(305,167,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 17:49:34','2016-01-14 17:49:34'),(306,167,54,1,123.00,0.00,0.00,0.00,0.00,0.00,123.00,'2016-01-14 17:49:34','2016-01-14 17:49:34'),(307,168,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 17:57:40','2016-01-14 17:57:40'),(308,168,54,1,307.50,0.00,0.00,0.00,0.00,0.00,307.50,'2016-01-14 17:57:40','2016-01-14 17:57:40'),(309,169,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 18:03:12','2016-01-14 18:03:12'),(310,169,54,1,123.00,0.00,0.00,0.00,0.00,0.00,123.00,'2016-01-14 18:03:12','2016-01-14 18:03:12'),(311,170,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 18:13:26','2016-01-14 18:13:26'),(312,170,55,1,359.04,0.00,0.00,0.00,0.00,0.00,359.04,'2016-01-14 18:13:26','2016-01-14 18:13:26'),(313,170,54,1,123.00,0.00,0.00,0.00,0.00,0.00,123.00,'2016-01-14 18:13:26','2016-01-14 18:13:26'),(314,171,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 18:22:30','2016-01-14 18:22:30'),(315,171,55,1,134.64,0.00,0.00,0.00,0.00,0.00,134.64,'2016-01-14 18:22:30','2016-01-14 18:22:30'),(316,171,54,1,369.00,0.00,0.00,0.00,0.00,0.00,369.00,'2016-01-14 18:22:30','2016-01-14 18:22:30'),(317,172,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 18:28:29','2016-01-14 18:28:29'),(318,172,55,1,89.76,0.00,0.00,0.00,0.00,0.00,89.76,'2016-01-14 18:28:29','2016-01-14 18:28:29'),(319,172,54,1,123.00,0.00,0.00,0.00,0.00,0.00,123.00,'2016-01-14 18:28:29','2016-01-14 18:28:29'),(320,173,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 18:36:36','2016-01-14 18:36:36'),(321,173,54,1,430.50,0.00,0.00,0.00,0.00,0.00,430.50,'2016-01-14 18:36:36','2016-01-14 18:36:36'),(322,174,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 18:43:17','2016-01-14 18:43:17'),(323,174,55,1,157.08,0.00,0.00,0.00,0.00,0.00,157.08,'2016-01-14 18:43:17','2016-01-14 18:43:17'),(324,174,54,1,430.50,0.00,0.00,0.00,0.00,0.00,430.50,'2016-01-14 18:43:17','2016-01-14 18:43:17'),(325,175,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 18:53:27','2016-01-14 18:53:27'),(326,175,54,1,1530.00,0.00,0.00,0.00,0.00,0.00,1530.00,'2016-01-14 18:53:27','2016-01-14 18:53:27'),(327,176,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 18:57:35','2016-01-14 18:57:35'),(328,176,54,1,637.50,0.00,0.00,0.00,0.00,0.00,637.50,'2016-01-14 18:57:35','2016-01-14 18:57:35'),(329,177,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:00:21','2016-01-14 19:00:21'),(330,177,68,1,307.50,0.00,0.00,0.00,0.00,0.00,307.50,'2016-01-14 19:00:21','2016-01-14 19:00:21'),(331,178,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:03:30','2016-01-14 19:03:30'),(332,178,68,1,307.50,0.00,0.00,0.00,0.00,0.00,307.50,'2016-01-14 19:03:30','2016-01-14 19:03:30'),(333,179,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:06:28','2016-01-14 19:06:28'),(334,179,68,1,307.50,0.00,0.00,0.00,0.00,0.00,307.50,'2016-01-14 19:06:28','2016-01-14 19:06:28'),(335,180,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:09:43','2016-01-14 19:09:43'),(336,180,69,1,5744.64,0.00,0.00,0.00,0.00,0.00,5744.64,'2016-01-14 19:09:43','2016-01-14 19:09:43'),(337,180,68,1,4704.00,0.00,0.00,0.00,0.00,0.00,4704.00,'2016-01-14 19:09:43','2016-01-14 19:09:43'),(338,180,72,1,2313.00,0.00,0.00,0.00,0.00,0.00,2313.00,'2016-01-14 19:09:43','2016-01-14 19:09:43'),(339,181,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:13:59','2016-01-14 19:13:59'),(340,181,68,1,4428.00,0.00,0.00,0.00,0.00,0.00,4428.00,'2016-01-14 19:13:59','2016-01-14 19:13:59'),(341,181,72,1,771.00,0.00,0.00,0.00,0.00,0.00,771.00,'2016-01-14 19:13:59','2016-01-14 19:13:59'),(344,3,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:16:29','2016-01-14 19:16:29'),(345,3,72,1,771.00,0.00,0.00,0.00,0.00,0.00,771.00,'2016-01-14 19:16:29','2016-01-14 19:16:29'),(346,4,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:20:07','2016-01-14 19:20:07'),(347,4,68,1,4428.00,0.00,0.00,0.00,0.00,0.00,4428.00,'2016-01-14 19:20:07','2016-01-14 19:20:07'),(348,4,72,1,771.00,0.00,0.00,0.00,0.00,0.00,771.00,'2016-01-14 19:20:07','2016-01-14 19:20:07'),(349,5,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:20:57','2016-01-14 19:20:57'),(350,5,68,1,307.50,0.00,0.00,0.00,0.00,0.00,307.50,'2016-01-14 19:20:57','2016-01-14 19:20:57'),(351,6,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:21:24','2016-01-14 19:21:24'),(352,6,68,1,307.50,0.00,0.00,0.00,0.00,0.00,307.50,'2016-01-14 19:21:24','2016-01-14 19:21:24'),(353,7,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:21:43','2016-01-14 19:21:43'),(354,7,68,1,307.50,0.00,0.00,0.00,0.00,0.00,307.50,'2016-01-14 19:21:43','2016-01-14 19:21:43'),(355,9,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:22:36','2016-01-14 19:22:36'),(356,9,68,1,307.50,0.00,0.00,0.00,0.00,0.00,307.50,'2016-01-14 19:22:36','2016-01-14 19:22:36'),(357,182,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:22:47','2016-01-14 19:22:47'),(358,182,54,1,765.00,0.00,0.00,0.00,0.00,0.00,765.00,'2016-01-14 19:22:47','2016-01-14 19:22:47'),(359,8,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:23:16','2016-01-14 19:23:16'),(360,8,68,1,307.50,0.00,0.00,0.00,0.00,0.00,307.50,'2016-01-14 19:23:16','2016-01-14 19:23:16'),(361,183,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:27:58','2016-01-14 19:27:58'),(362,183,68,1,123.00,0.00,0.00,0.00,0.00,0.00,123.00,'2016-01-14 19:27:58','2016-01-14 19:27:58'),(368,2,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:31:18','2016-01-14 19:31:18'),(369,2,72,1,771.00,0.00,0.00,0.00,0.00,0.00,771.00,'2016-01-14 19:31:18','2016-01-14 19:31:18'),(370,10,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:31:38','2016-01-14 19:31:38'),(371,10,68,1,307.50,0.00,0.00,0.00,0.00,0.00,307.50,'2016-01-14 19:31:38','2016-01-14 19:31:38'),(372,184,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:31:51','2016-01-14 19:31:51'),(373,184,54,1,123.00,0.00,0.00,0.00,0.00,0.00,123.00,'2016-01-14 19:31:51','2016-01-14 19:31:51'),(374,11,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:32:00','2016-01-14 19:32:00'),(375,11,68,1,307.50,0.00,0.00,0.00,0.00,0.00,307.50,'2016-01-14 19:32:00','2016-01-14 19:32:00'),(376,11,73,1,0.00,0.00,0.00,0.00,0.00,0.00,0.00,'2016-01-14 19:32:00','2016-01-14 19:32:00'),(379,12,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:32:51','2016-01-14 19:32:51'),(380,12,68,1,307.50,0.00,0.00,0.00,0.00,0.00,307.50,'2016-01-14 19:32:51','2016-01-14 19:32:51'),(381,13,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:35:46','2016-01-14 19:35:46'),(382,13,68,1,307.50,0.00,0.00,0.00,0.00,0.00,307.50,'2016-01-14 19:35:46','2016-01-14 19:35:46'),(383,57,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:36:38','2016-01-14 19:36:38'),(384,57,68,1,4428.00,0.00,0.00,0.00,0.00,0.00,4428.00,'2016-01-14 19:36:38','2016-01-14 19:36:38'),(385,57,72,1,771.00,0.00,0.00,0.00,0.00,0.00,771.00,'2016-01-14 19:36:38','2016-01-14 19:36:38'),(386,90,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:37:01','2016-01-14 19:37:01'),(387,90,68,1,3895.50,0.00,0.00,0.00,0.00,0.00,3895.50,'2016-01-14 19:37:01','2016-01-14 19:37:01'),(388,90,72,1,771.00,0.00,0.00,0.00,0.00,0.00,771.00,'2016-01-14 19:37:01','2016-01-14 19:37:01'),(391,185,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:37:27','2016-01-14 19:37:27'),(392,185,54,1,123.00,0.00,0.00,0.00,0.00,0.00,123.00,'2016-01-14 19:37:27','2016-01-14 19:37:27'),(393,92,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:38:04','2016-01-14 19:38:04'),(394,92,68,1,4704.00,0.00,0.00,0.00,0.00,0.00,4704.00,'2016-01-14 19:38:04','2016-01-14 19:38:04'),(395,92,72,1,771.00,0.00,0.00,0.00,0.00,0.00,771.00,'2016-01-14 19:38:04','2016-01-14 19:38:04'),(396,91,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:39:15','2016-01-14 19:39:15'),(397,91,54,1,61.50,0.00,0.00,0.00,0.00,0.00,61.50,'2016-01-14 19:39:15','2016-01-14 19:39:15'),(398,186,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:40:06','2016-01-14 19:40:06'),(399,186,55,1,336.60,0.00,0.00,0.00,0.00,0.00,336.60,'2016-01-14 19:40:06','2016-01-14 19:40:06'),(400,186,54,1,369.00,0.00,0.00,0.00,0.00,0.00,369.00,'2016-01-14 19:40:06','2016-01-14 19:40:06'),(401,93,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:40:18','2016-01-14 19:40:18'),(402,93,54,1,123.00,0.00,0.00,0.00,0.00,0.00,123.00,'2016-01-14 19:40:18','2016-01-14 19:40:18'),(403,94,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:40:47','2016-01-14 19:40:47'),(404,94,54,1,147.00,0.00,0.00,0.00,0.00,0.00,147.00,'2016-01-14 19:40:47','2016-01-14 19:40:47'),(405,95,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:41:14','2016-01-14 19:41:14'),(406,95,68,1,307.50,0.00,0.00,0.00,0.00,0.00,307.50,'2016-01-14 19:41:14','2016-01-14 19:41:14'),(407,96,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:42:01','2016-01-14 19:42:01'),(408,96,68,1,307.50,0.00,0.00,0.00,0.00,0.00,307.50,'2016-01-14 19:42:01','2016-01-14 19:42:01'),(409,98,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:42:41','2016-01-14 19:42:41'),(410,98,68,1,307.50,0.00,0.00,0.00,0.00,0.00,307.50,'2016-01-14 19:42:41','2016-01-14 19:42:41'),(411,97,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:43:03','2016-01-14 19:43:03'),(412,97,68,1,307.50,0.00,0.00,0.00,0.00,0.00,307.50,'2016-01-14 19:43:03','2016-01-14 19:43:03'),(413,99,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:43:35','2016-01-14 19:43:35'),(414,99,69,1,448.80,0.00,0.00,0.00,0.00,0.00,448.80,'2016-01-14 19:43:35','2016-01-14 19:43:35'),(415,99,68,1,123.00,0.00,0.00,0.00,0.00,0.00,123.00,'2016-01-14 19:43:35','2016-01-14 19:43:35'),(416,100,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:43:58','2016-01-14 19:43:58'),(417,100,69,1,22.44,0.00,0.00,0.00,0.00,0.00,22.44,'2016-01-14 19:43:58','2016-01-14 19:43:58'),(418,100,68,1,123.00,0.00,0.00,0.00,0.00,0.00,123.00,'2016-01-14 19:43:58','2016-01-14 19:43:58'),(419,101,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:45:04','2016-01-14 19:45:04'),(420,101,55,1,403.92,0.00,0.00,0.00,0.00,0.00,403.92,'2016-01-14 19:45:04','2016-01-14 19:45:04'),(421,101,54,1,123.00,0.00,0.00,0.00,0.00,0.00,123.00,'2016-01-14 19:45:04','2016-01-14 19:45:04'),(422,102,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:45:47','2016-01-14 19:45:47'),(423,102,54,1,1732.50,0.00,0.00,0.00,0.00,0.00,1732.50,'2016-01-14 19:45:47','2016-01-14 19:45:47'),(424,187,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:47:02','2016-01-14 19:47:02'),(425,187,72,1,1542.00,0.00,0.00,0.00,0.00,0.00,1542.00,'2016-01-14 19:47:02','2016-01-14 19:47:02'),(430,104,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:48:21','2016-01-14 19:48:21'),(431,104,68,1,4428.00,0.00,0.00,0.00,0.00,0.00,4428.00,'2016-01-14 19:48:21','2016-01-14 19:48:21'),(432,104,72,1,771.00,0.00,0.00,0.00,0.00,0.00,771.00,'2016-01-14 19:48:21','2016-01-14 19:48:21'),(433,105,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:49:02','2016-01-14 19:49:02'),(434,105,69,1,5351.94,0.00,0.00,0.00,0.00,0.00,5351.94,'2016-01-14 19:49:02','2016-01-14 19:49:02'),(435,105,68,1,3895.50,0.00,0.00,0.00,0.00,0.00,3895.50,'2016-01-14 19:49:02','2016-01-14 19:49:02'),(436,105,72,1,3855.00,0.00,0.00,0.00,0.00,0.00,3855.00,'2016-01-14 19:49:02','2016-01-14 19:49:02'),(437,106,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:49:32','2016-01-14 19:49:32'),(438,106,68,1,3382.50,0.00,0.00,0.00,0.00,0.00,3382.50,'2016-01-14 19:49:32','2016-01-14 19:49:32'),(439,106,72,1,771.00,0.00,0.00,0.00,0.00,0.00,771.00,'2016-01-14 19:49:32','2016-01-14 19:49:32'),(440,107,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:50:06','2016-01-14 19:50:06'),(441,107,54,1,369.00,0.00,0.00,0.00,0.00,0.00,369.00,'2016-01-14 19:50:06','2016-01-14 19:50:06'),(442,188,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:50:10','2016-01-14 19:50:10'),(443,188,72,1,771.00,0.00,0.00,0.00,0.00,0.00,771.00,'2016-01-14 19:50:10','2016-01-14 19:50:10'),(444,108,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:50:59','2016-01-14 19:50:59'),(445,108,68,1,4428.00,0.00,0.00,0.00,0.00,0.00,4428.00,'2016-01-14 19:50:59','2016-01-14 19:50:59'),(446,108,72,1,771.00,0.00,0.00,0.00,0.00,0.00,771.00,'2016-01-14 19:50:59','2016-01-14 19:50:59'),(447,109,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:51:22','2016-01-14 19:51:22'),(448,109,68,1,4428.00,0.00,0.00,0.00,0.00,0.00,4428.00,'2016-01-14 19:51:22','2016-01-14 19:51:22'),(449,109,72,1,771.00,0.00,0.00,0.00,0.00,0.00,771.00,'2016-01-14 19:51:22','2016-01-14 19:51:22'),(450,136,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:52:25','2016-01-14 19:52:25'),(451,136,54,1,246.00,0.00,0.00,0.00,0.00,0.00,246.00,'2016-01-14 19:52:25','2016-01-14 19:52:25'),(452,189,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:52:30','2016-01-14 19:52:30'),(453,189,68,1,3259.50,0.00,0.00,0.00,0.00,0.00,3259.50,'2016-01-14 19:52:30','2016-01-14 19:52:30'),(454,189,72,1,771.00,0.00,0.00,0.00,0.00,0.00,771.00,'2016-01-14 19:52:30','2016-01-14 19:52:30'),(455,141,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:53:38','2016-01-14 19:53:38'),(456,141,55,1,42084.90,0.00,0.00,0.00,0.00,0.00,42084.90,'2016-01-14 19:53:38','2016-01-14 19:53:38'),(457,141,54,1,1275.00,0.00,0.00,0.00,0.00,0.00,1275.00,'2016-01-14 19:53:38','2016-01-14 19:53:38'),(458,137,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:54:29','2016-01-14 19:54:29'),(459,137,54,1,307.50,0.00,0.00,0.00,0.00,0.00,307.50,'2016-01-14 19:54:29','2016-01-14 19:54:29'),(460,190,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 19:55:14','2016-01-14 19:55:14'),(461,190,69,1,5351.94,0.00,0.00,0.00,0.00,0.00,5351.94,'2016-01-14 19:55:14','2016-01-14 19:55:14'),(462,190,68,1,3895.50,0.00,0.00,0.00,0.00,0.00,3895.50,'2016-01-14 19:55:14','2016-01-14 19:55:14'),(463,190,72,1,2313.00,0.00,0.00,0.00,0.00,0.00,2313.00,'2016-01-14 19:55:14','2016-01-14 19:55:14'),(464,191,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 20:03:46','2016-01-14 20:03:46'),(465,191,68,1,3259.50,0.00,0.00,0.00,0.00,0.00,3259.50,'2016-01-14 20:03:46','2016-01-14 20:03:46'),(466,191,72,1,771.00,0.00,0.00,0.00,0.00,0.00,771.00,'2016-01-14 20:03:46','2016-01-14 20:03:46'),(467,110,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 20:07:47','2016-01-14 20:07:47'),(468,110,54,1,430.50,0.00,0.00,0.00,0.00,0.00,430.50,'2016-01-14 20:07:47','2016-01-14 20:07:47'),(469,192,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 20:08:33','2016-01-14 20:08:33'),(470,192,54,1,492.00,0.00,0.00,0.00,0.00,0.00,492.00,'2016-01-14 20:08:33','2016-01-14 20:08:33'),(471,111,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 20:09:15','2016-01-14 20:09:15'),(472,111,54,1,123.00,0.00,0.00,0.00,0.00,0.00,123.00,'2016-01-14 20:09:15','2016-01-14 20:09:15'),(473,112,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 20:09:40','2016-01-14 20:09:40'),(474,112,54,1,123.00,0.00,0.00,0.00,0.00,0.00,123.00,'2016-01-14 20:09:40','2016-01-14 20:09:40'),(475,113,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 20:10:07','2016-01-14 20:10:07'),(476,113,54,1,307.50,0.00,0.00,0.00,0.00,0.00,307.50,'2016-01-14 20:10:07','2016-01-14 20:10:07'),(477,193,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 20:10:32','2016-01-14 20:10:32'),(478,193,68,1,3936.00,0.00,0.00,0.00,0.00,0.00,3936.00,'2016-01-14 20:10:32','2016-01-14 20:10:32'),(479,194,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 20:13:07','2016-01-14 20:13:07'),(480,194,69,1,819.06,0.00,0.00,0.00,0.00,0.00,819.06,'2016-01-14 20:13:07','2016-01-14 20:13:07'),(481,194,68,1,4489.50,0.00,0.00,0.00,0.00,0.00,4489.50,'2016-01-14 20:13:07','2016-01-14 20:13:07'),(482,194,72,1,771.00,0.00,0.00,0.00,0.00,0.00,771.00,'2016-01-14 20:13:07','2016-01-14 20:13:07'),(483,114,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 20:15:02','2016-01-14 20:15:02'),(484,114,55,1,34697.97,0.00,0.00,0.00,0.00,0.00,34697.97,'2016-01-14 20:15:02','2016-01-14 20:15:02'),(485,114,54,1,1147.50,0.00,0.00,0.00,0.00,0.00,1147.50,'2016-01-14 20:15:02','2016-01-14 20:15:02'),(486,115,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 20:15:38','2016-01-14 20:15:38'),(487,115,54,1,123.00,0.00,0.00,0.00,0.00,0.00,123.00,'2016-01-14 20:15:38','2016-01-14 20:15:38'),(488,195,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 20:16:32','2016-01-14 20:16:32'),(489,195,55,1,2383.83,0.00,0.00,0.00,0.00,0.00,2383.83,'2016-01-14 20:16:32','2016-01-14 20:16:32'),(490,195,54,1,1147.50,0.00,0.00,0.00,0.00,0.00,1147.50,'2016-01-14 20:16:32','2016-01-14 20:16:32'),(491,116,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 20:16:51','2016-01-14 20:16:51'),(492,116,54,1,123.00,0.00,0.00,0.00,0.00,0.00,123.00,'2016-01-14 20:16:51','2016-01-14 20:16:51'),(493,117,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 20:17:40','2016-01-14 20:17:40'),(494,117,55,1,2221.56,0.00,0.00,0.00,0.00,0.00,2221.56,'2016-01-14 20:17:40','2016-01-14 20:17:40'),(495,117,54,1,184.50,0.00,0.00,0.00,0.00,0.00,184.50,'2016-01-14 20:17:40','2016-01-14 20:17:40'),(496,196,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 20:18:50','2016-01-14 20:18:50'),(497,196,55,1,336.60,0.00,0.00,0.00,0.00,0.00,336.60,'2016-01-14 20:18:50','2016-01-14 20:18:50'),(498,196,54,1,123.00,0.00,0.00,0.00,0.00,0.00,123.00,'2016-01-14 20:18:50','2016-01-14 20:18:50'),(499,118,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 20:18:57','2016-01-14 20:18:57'),(500,118,68,1,3259.50,0.00,0.00,0.00,0.00,0.00,3259.50,'2016-01-14 20:18:57','2016-01-14 20:18:57'),(501,118,72,1,771.00,0.00,0.00,0.00,0.00,0.00,771.00,'2016-01-14 20:18:57','2016-01-14 20:18:57'),(502,140,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 20:22:18','2016-01-14 20:22:18'),(503,140,69,1,6788.10,0.00,0.00,0.00,0.00,0.00,6788.10,'2016-01-14 20:22:18','2016-01-14 20:22:18'),(504,140,68,1,4042.50,0.00,0.00,0.00,0.00,0.00,4042.50,'2016-01-14 20:22:18','2016-01-14 20:22:18'),(505,140,72,1,1542.00,0.00,0.00,0.00,0.00,0.00,1542.00,'2016-01-14 20:22:18','2016-01-14 20:22:18'),(506,197,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 20:22:19','2016-01-14 20:22:19'),(507,197,55,1,538.56,0.00,0.00,0.00,0.00,0.00,538.56,'2016-01-14 20:22:19','2016-01-14 20:22:19'),(508,197,54,1,184.50,0.00,0.00,0.00,0.00,0.00,184.50,'2016-01-14 20:22:19','2016-01-14 20:22:19'),(514,125,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 20:24:48','2016-01-14 20:24:48'),(515,125,72,1,771.00,0.00,0.00,0.00,0.00,0.00,771.00,'2016-01-14 20:24:48','2016-01-14 20:24:48'),(516,124,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 20:25:09','2016-01-14 20:25:09'),(517,124,72,1,771.00,0.00,0.00,0.00,0.00,0.00,771.00,'2016-01-14 20:25:09','2016-01-14 20:25:09'),(518,123,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 20:25:31','2016-01-14 20:25:31'),(521,121,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 20:26:49','2016-01-14 20:26:49'),(522,121,72,1,771.00,0.00,0.00,0.00,0.00,0.00,771.00,'2016-01-14 20:26:49','2016-01-14 20:26:49'),(523,122,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 20:27:11','2016-01-14 20:27:11'),(524,122,72,1,771.00,0.00,0.00,0.00,0.00,0.00,771.00,'2016-01-14 20:27:11','2016-01-14 20:27:11'),(525,198,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 20:27:46','2016-01-14 20:27:46'),(526,198,55,1,4151.40,0.00,0.00,0.00,0.00,0.00,4151.40,'2016-01-14 20:27:46','2016-01-14 20:27:46'),(527,198,54,1,123.00,0.00,0.00,0.00,0.00,0.00,123.00,'2016-01-14 20:27:46','2016-01-14 20:27:46'),(530,119,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 20:29:23','2016-01-14 20:29:23'),(531,119,69,1,8190.60,0.00,0.00,0.00,0.00,0.00,8190.60,'2016-01-14 20:29:23','2016-01-14 20:29:23'),(532,119,68,1,5365.50,0.00,0.00,0.00,0.00,0.00,5365.50,'2016-01-14 20:29:23','2016-01-14 20:29:23'),(533,119,72,1,1542.00,0.00,0.00,0.00,0.00,0.00,1542.00,'2016-01-14 20:29:23','2016-01-14 20:29:23'),(534,120,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 20:30:45','2016-01-14 20:30:45'),(535,120,68,1,4428.00,0.00,0.00,0.00,0.00,0.00,4428.00,'2016-01-14 20:30:45','2016-01-14 20:30:45'),(536,120,72,1,771.00,0.00,0.00,0.00,0.00,0.00,771.00,'2016-01-14 20:30:45','2016-01-14 20:30:45'),(540,127,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 20:33:00','2016-01-14 20:33:00'),(541,127,68,1,4489.50,0.00,0.00,0.00,0.00,0.00,4489.50,'2016-01-14 20:33:00','2016-01-14 20:33:00'),(542,127,72,1,771.00,0.00,0.00,0.00,0.00,0.00,771.00,'2016-01-14 20:33:00','2016-01-14 20:33:00'),(543,126,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 20:33:25','2016-01-14 20:33:25'),(544,126,68,1,4428.00,0.00,0.00,0.00,0.00,0.00,4428.00,'2016-01-14 20:33:25','2016-01-14 20:33:25'),(545,126,72,1,771.00,0.00,0.00,0.00,0.00,0.00,771.00,'2016-01-14 20:33:25','2016-01-14 20:33:25'),(546,199,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 20:36:33','2016-01-14 20:36:33'),(547,199,55,1,403.92,0.00,0.00,0.00,0.00,0.00,403.92,'2016-01-14 20:36:33','2016-01-14 20:36:33'),(548,199,54,1,369.00,0.00,0.00,0.00,0.00,0.00,369.00,'2016-01-14 20:36:33','2016-01-14 20:36:33'),(549,200,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 20:43:53','2016-01-14 20:43:53'),(550,200,54,1,514.50,0.00,0.00,0.00,0.00,0.00,514.50,'2016-01-14 20:43:53','2016-01-14 20:43:53'),(551,201,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 20:45:42','2016-01-14 20:45:42'),(552,201,54,1,430.50,0.00,0.00,0.00,0.00,0.00,430.50,'2016-01-14 20:45:42','2016-01-14 20:45:42'),(553,202,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 20:49:04','2016-01-14 20:49:04'),(554,202,54,1,123.00,0.00,0.00,0.00,0.00,0.00,123.00,'2016-01-14 20:49:04','2016-01-14 20:49:04'),(555,203,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 20:54:24','2016-01-14 20:54:24'),(556,203,54,1,123.00,0.00,0.00,0.00,0.00,0.00,123.00,'2016-01-14 20:54:24','2016-01-14 20:54:24'),(557,204,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 20:56:17','2016-01-14 20:56:17'),(558,204,54,1,123.00,0.00,0.00,0.00,0.00,0.00,123.00,'2016-01-14 20:56:17','2016-01-14 20:56:17'),(559,205,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 21:01:25','2016-01-14 21:01:25'),(560,205,69,1,5553.90,0.00,0.00,0.00,0.00,0.00,5553.90,'2016-01-14 21:01:25','2016-01-14 21:01:25'),(561,205,68,1,4042.50,0.00,0.00,0.00,0.00,0.00,4042.50,'2016-01-14 21:01:25','2016-01-14 21:01:25'),(562,206,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 21:08:25','2016-01-14 21:08:25'),(563,206,69,1,5351.94,0.00,0.00,0.00,0.00,0.00,5351.94,'2016-01-14 21:08:25','2016-01-14 21:08:25'),(564,206,68,1,3895.50,0.00,0.00,0.00,0.00,0.00,3895.50,'2016-01-14 21:08:25','2016-01-14 21:08:25'),(568,139,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 22:54:59','2016-01-14 22:54:59'),(569,139,55,1,392.70,0.00,0.00,0.00,0.00,0.00,392.70,'2016-01-14 22:54:59','2016-01-14 22:54:59'),(570,139,54,1,514.50,0.00,0.00,0.00,0.00,0.00,514.50,'2016-01-14 22:54:59','2016-01-14 22:54:59'),(571,128,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 22:56:03','2016-01-14 22:56:03'),(572,128,69,1,4936.80,0.00,0.00,0.00,0.00,0.00,4936.80,'2016-01-14 22:56:03','2016-01-14 22:56:03'),(573,128,68,1,4042.50,0.00,0.00,0.00,0.00,0.00,4042.50,'2016-01-14 22:56:03','2016-01-14 22:56:03'),(574,129,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 22:58:21','2016-01-14 22:58:21'),(575,129,68,1,3936.00,0.00,0.00,0.00,0.00,0.00,3936.00,'2016-01-14 22:58:21','2016-01-14 22:58:21'),(576,129,72,1,771.00,0.00,0.00,0.00,0.00,0.00,771.00,'2016-01-14 22:58:21','2016-01-14 22:58:21'),(577,130,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 22:58:49','2016-01-14 22:58:49'),(578,130,68,1,4042.50,0.00,0.00,0.00,0.00,0.00,4042.50,'2016-01-14 22:58:49','2016-01-14 22:58:49'),(579,130,72,1,771.00,0.00,0.00,0.00,0.00,0.00,771.00,'2016-01-14 22:58:49','2016-01-14 22:58:49'),(580,131,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 22:59:08','2016-01-14 22:59:08'),(581,131,54,1,61.50,0.00,0.00,0.00,0.00,0.00,61.50,'2016-01-14 22:59:08','2016-01-14 22:59:08'),(584,132,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 23:00:08','2016-01-14 23:00:08'),(585,132,54,1,123.00,0.00,0.00,0.00,0.00,0.00,123.00,'2016-01-14 23:00:08','2016-01-14 23:00:08'),(586,133,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 23:00:47','2016-01-14 23:00:47'),(587,133,55,1,605.88,0.00,0.00,0.00,0.00,0.00,605.88,'2016-01-14 23:00:47','2016-01-14 23:00:47'),(588,133,54,1,184.50,0.00,0.00,0.00,0.00,0.00,184.50,'2016-01-14 23:00:47','2016-01-14 23:00:47'),(589,134,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 23:01:15','2016-01-14 23:01:15'),(590,134,54,1,676.50,0.00,0.00,0.00,0.00,0.00,676.50,'2016-01-14 23:01:15','2016-01-14 23:01:15'),(591,135,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 23:01:45','2016-01-14 23:01:45'),(592,135,54,1,246.00,0.00,0.00,0.00,0.00,0.00,246.00,'2016-01-14 23:01:45','2016-01-14 23:01:45'),(593,148,57,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 23:28:38','2016-01-14 23:28:38'),(594,148,54,1,1147.50,0.00,0.00,0.00,0.00,0.00,1147.50,'2016-01-14 23:28:38','2016-01-14 23:28:38'),(595,103,71,1,21.00,0.00,0.00,0.00,0.00,0.00,21.00,'2016-01-14 23:37:31','2016-01-14 23:37:31'),(596,103,69,1,6462.72,0.00,0.00,0.00,0.00,0.00,6462.72,'2016-01-14 23:37:31','2016-01-14 23:37:31'),(597,103,68,1,4704.00,0.00,0.00,0.00,0.00,0.00,4704.00,'2016-01-14 23:37:31','2016-01-14 23:37:31'),(598,103,72,1,2313.00,0.00,0.00,0.00,0.00,0.00,2313.00,'2016-01-14 23:37:31','2016-01-14 23:37:31');
/*!40000 ALTER TABLE `facturadetalles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facturametadatas`
--

DROP TABLE IF EXISTS `facturametadatas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facturametadatas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `factura_id` int(10) unsigned NOT NULL,
  `ncobros` int(10) unsigned NOT NULL,
  `ncuotas` int(10) unsigned NOT NULL,
  `montoiniciocuota` double(15,2) NOT NULL,
  `montopagado` double(15,2) NOT NULL,
  `basepagado` double(15,2) NOT NULL,
  `ivapagado` double(15,2) NOT NULL,
  `islrpercentage` double NOT NULL,
  `ivapercentage` double NOT NULL,
  `retencion` double(15,2) NOT NULL,
  `total` double(15,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `facturametadatas_factura_id_foreign` (`factura_id`),
  CONSTRAINT `facturametadatas_factura_id_foreign` FOREIGN KEY (`factura_id`) REFERENCES `facturas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facturametadatas`
--

LOCK TABLES `facturametadatas` WRITE;
/*!40000 ALTER TABLE `facturametadatas` DISABLE KEYS */;
INSERT INTO `facturametadatas` VALUES (1,91,1,0,0.00,82.50,82.50,0.00,0,0,0.00,82.50,'2016-01-14 20:49:40','2016-01-14 20:49:40'),(2,93,1,0,0.00,144.00,144.00,0.00,0,0,0.00,144.00,'2016-01-14 20:50:49','2016-01-14 20:50:49'),(3,94,1,0,0.00,168.00,168.00,0.00,0,0,0.00,168.00,'2016-01-14 20:51:40','2016-01-14 20:51:40'),(4,101,1,0,0.00,547.92,547.92,0.00,0,0,0.00,547.92,'2016-01-14 20:53:31','2016-01-14 20:53:31'),(5,102,1,0,0.00,1753.50,1753.50,0.00,0,0,0.00,1753.50,'2016-01-14 20:54:26','2016-01-14 20:54:26'),(6,137,1,0,0.00,328.50,328.50,0.00,0,0,0.00,328.50,'2016-01-14 20:56:32','2016-01-14 20:56:32'),(7,141,1,0,0.00,43380.90,43380.90,0.00,0,0,0.00,43380.90,'2016-01-14 20:57:34','2016-01-14 20:57:34'),(8,107,1,0,0.00,390.00,390.00,0.00,0,0,0.00,390.00,'2016-01-14 20:58:52','2016-01-14 20:58:52'),(9,136,1,0,0.00,267.00,267.00,0.00,0,0,0.00,267.00,'2016-01-14 20:59:40','2016-01-14 20:59:40'),(10,110,1,0,0.00,451.50,451.50,0.00,0,0,0.00,451.50,'2016-01-14 21:01:42','2016-01-14 21:01:42'),(11,111,1,0,0.00,144.00,144.00,0.00,0,0,0.00,144.00,'2016-01-14 21:07:12','2016-01-14 21:07:12'),(12,112,1,0,0.00,144.00,144.00,0.00,0,0,0.00,144.00,'2016-01-14 21:07:54','2016-01-14 21:07:54'),(13,113,1,0,0.00,328.50,328.50,0.00,0,0,0.00,328.50,'2016-01-14 21:08:43','2016-01-14 21:08:43'),(14,138,1,0,0.00,82.50,82.50,0.00,0,0,0.00,82.50,'2016-01-14 21:09:28','2016-01-14 21:09:28'),(15,114,1,0,0.00,35866.47,35866.47,0.00,0,0,0.00,35866.47,'2016-01-14 21:12:09','2016-01-14 21:12:09'),(16,116,1,0,0.00,144.00,144.00,0.00,0,0,0.00,144.00,'2016-01-14 21:13:01','2016-01-14 21:13:01'),(17,115,1,0,0.00,144.00,144.00,0.00,0,0,0.00,144.00,'2016-01-14 21:13:47','2016-01-14 21:13:47'),(18,202,1,0,0.00,144.00,144.00,0.00,0,0,0.00,144.00,'2016-01-14 21:29:56','2016-01-14 21:29:56'),(19,139,1,0,0.00,928.20,928.20,0.00,0,0,0.00,928.20,'2016-01-14 23:10:32','2016-01-14 23:10:32'),(20,131,1,0,0.00,82.50,82.50,0.00,0,0,0.00,82.50,'2016-01-14 23:11:50','2016-01-14 23:11:50'),(21,132,1,0,0.00,144.00,144.00,0.00,0,0,0.00,144.00,'2016-01-14 23:12:59','2016-01-14 23:12:59'),(22,133,1,0,0.00,811.38,811.38,0.00,0,0,0.00,811.38,'2016-01-14 23:14:32','2016-01-14 23:14:32'),(23,134,1,0,0.00,697.50,697.50,0.00,0,0,0.00,697.50,'2016-01-14 23:15:16','2016-01-14 23:15:16'),(24,143,1,0,0.00,451.50,451.50,0.00,0,0,0.00,451.50,'2016-01-14 23:17:03','2016-01-14 23:17:03'),(25,135,1,0,0.00,267.00,267.00,0.00,0,0,0.00,267.00,'2016-01-14 23:18:41','2016-01-14 23:18:41'),(26,148,1,0,0.00,1168.50,1168.50,0.00,0,0,0.00,1168.50,'2016-01-14 23:19:30','2016-01-14 23:19:30');
/*!40000 ALTER TABLE `facturametadatas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facturas`
--

DROP TABLE IF EXISTS `facturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facturas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aeropuerto_id` int(10) unsigned NOT NULL,
  `condicionPago` enum('Crédito','Contado') COLLATE utf8_unicode_ci NOT NULL,
  `nFacturaPrefix` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nFactura` int(10) unsigned NOT NULL,
  `nControlPrefix` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nControl` int(10) unsigned NOT NULL,
  `fecha` date NOT NULL,
  `fechaVencimiento` date NOT NULL,
  `fechaControlContrato` date DEFAULT NULL,
  `cliente_id` int(10) unsigned NOT NULL,
  `modulo_id` int(10) unsigned DEFAULT NULL,
  `contrato_id` int(10) unsigned DEFAULT NULL,
  `subtotalNeto` double(8,2) unsigned NOT NULL,
  `descuentoTotal` double(8,2) unsigned NOT NULL,
  `subtotal` double(8,2) unsigned NOT NULL,
  `iva` double(8,2) unsigned NOT NULL,
  `recargoTotal` double(8,2) unsigned NOT NULL,
  `total` double(8,2) unsigned NOT NULL,
  `nroDosa` int(11) DEFAULT NULL,
  `aterrizaje_id` int(10) unsigned DEFAULT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `comentario` text COLLATE utf8_unicode_ci NOT NULL,
  `estado` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `isImpresa` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `facturas_aeropuerto_id_foreign` (`aeropuerto_id`),
  KEY `facturas_cliente_id_foreign` (`cliente_id`),
  KEY `facturas_modulo_id_foreign` (`modulo_id`),
  KEY `facturas_contrato_id_foreign` (`contrato_id`),
  KEY `facturas_aterrizaje_id_foreign` (`aterrizaje_id`),
  CONSTRAINT `facturas_aterrizaje_id_foreign` FOREIGN KEY (`aterrizaje_id`) REFERENCES `aterrizajes` (`id`),
  CONSTRAINT `facturas_aeropuerto_id_foreign` FOREIGN KEY (`aeropuerto_id`) REFERENCES `aeropuertos` (`id`),
  CONSTRAINT `facturas_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  CONSTRAINT `facturas_contrato_id_foreign` FOREIGN KEY (`contrato_id`) REFERENCES `contratos` (`id`),
  CONSTRAINT `facturas_modulo_id_foreign` FOREIGN KEY (`modulo_id`) REFERENCES `modulos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=207 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facturas`
--

LOCK TABLES `facturas` WRITE;
/*!40000 ALTER TABLE `facturas` DISABLE KEYS */;
INSERT INTO `facturas` VALUES (1,1,'Crédito','PZO',1,'PZO',219177,'2016-01-05','2016-02-05',NULL,125,5,NULL,82.50,0.00,82.50,0.00,0.00,82.50,1,NULL,'Facturación por Derechos Aeronáuticos','','P',1,'2016-01-05 23:35:15','2016-01-13 01:56:35',NULL),(2,1,'Crédito','PZO',2,'PZO',219178,'2016-01-01','2016-02-05',NULL,63,5,NULL,792.00,0.00,792.00,0.00,0.00,792.00,2,NULL,'Facturación por Derechos Aeronáuticos','','P',1,'2016-01-06 00:06:47','2016-01-14 19:31:20',NULL),(3,1,'Crédito','PZO',3,'PZO',219179,'2016-01-01','2016-02-05',NULL,63,5,NULL,792.00,0.00,792.00,0.00,0.00,792.00,3,NULL,'Facturación por Derechos Aeronáuticos','','P',1,'2016-01-06 00:14:28','2016-01-14 19:16:34',NULL),(4,1,'Crédito','PZO',4,'PZO',219181,'2016-01-01','2016-02-05',NULL,40,5,NULL,5220.00,0.00,5220.00,0.00,0.00,5220.00,4,NULL,'Facturación por Derechos Aeronáuticos','','P',1,'2016-01-06 00:46:45','2016-01-14 19:20:10',NULL),(5,1,'Crédito','PZO',5,'PZO',219182,'2016-01-01','2016-02-05',NULL,139,5,NULL,328.50,0.00,328.50,0.00,0.00,328.50,5,NULL,'Facturación por Derechos Aeronáuticos','','P',1,'2016-01-06 01:15:20','2016-01-14 19:21:01',NULL),(6,1,'Crédito','PZO',6,'PZO',219183,'2016-01-01','2016-02-05',NULL,139,5,NULL,328.50,0.00,328.50,0.00,0.00,328.50,6,NULL,'Facturación por Derechos Aeronáuticos','','P',1,'2016-01-06 01:18:09','2016-01-14 19:21:28',NULL),(7,1,'Crédito','PZO',7,'PZO',219184,'2016-01-01','2016-02-05',NULL,139,5,NULL,328.50,0.00,328.50,0.00,0.00,328.50,7,NULL,'Facturación por Derechos Aeronáuticos','','P',1,'2016-01-06 03:52:07','2016-01-14 19:21:45',NULL),(8,1,'Crédito','PZO',8,'PZO',219185,'2016-01-01','2016-02-05',NULL,139,5,NULL,328.50,0.00,328.50,0.00,0.00,328.50,8,NULL,'Facturación por Derechos Aeronáuticos','','P',1,'2016-01-06 03:55:24','2016-01-14 19:23:22',NULL),(9,1,'Crédito','PZO',9,'PZO',219186,'2016-01-05','2016-02-05',NULL,139,5,NULL,328.50,0.00,328.50,0.00,0.00,328.50,9,NULL,'Facturación por Derechos Aeronáuticos','','P',1,'2016-01-06 03:59:08','2016-01-14 19:22:38',NULL),(10,1,'Crédito','PZO',10,'PZO',219187,'2016-01-05','2016-02-05',NULL,139,5,NULL,328.50,0.00,328.50,0.00,0.00,328.50,10,NULL,'Facturación por Derechos Aeronáuticos','','P',1,'2016-01-06 04:01:11','2016-01-14 19:31:40',NULL),(11,1,'Crédito','PZO',11,'PZO',219188,'2016-01-01','2016-02-05',NULL,139,5,NULL,328.50,0.00,328.50,0.00,0.00,328.50,11,NULL,'Facturación por Derechos Aeronáuticos','','P',1,'2016-01-06 04:03:20','2016-01-14 19:32:02',NULL),(12,1,'Crédito','PZO',12,'PZO',219189,'2016-01-01','2016-02-05',NULL,139,5,NULL,328.50,0.00,328.50,0.00,0.00,328.50,12,NULL,'Facturación por Derechos Aeronáuticos','','P',1,'2016-01-06 04:07:14','2016-01-14 19:32:53',NULL),(13,1,'Crédito','PZO',13,'PZO',219190,'2016-01-01','2016-02-05',NULL,139,5,NULL,328.50,0.00,328.50,0.00,0.00,328.50,13,NULL,'Facturación por Derechos Aeronáuticos','','P',1,'2016-01-06 04:09:41','2016-01-14 19:35:48',NULL),(14,1,'Crédito','PZO',14,'PZO',146174,'2016-01-04','2016-01-30',NULL,55,2,NULL,8121.60,0.00,8121.60,974.59,0.00,9096.19,NULL,NULL,'          PERIODO ENERO  2016  PATENTE: 2010-AG1845','','P',1,'2016-01-06 19:37:17','2016-01-13 02:17:56',NULL),(15,1,'Crédito','PZO',15,'PZO',146175,'2016-01-04','2016-01-30',NULL,45,2,NULL,10368.00,0.00,10368.00,1244.16,0.00,11612.16,NULL,NULL,'          PERIODO ENERO  2016  PATENTE: 2010-AG1845','','P',0,'2016-01-06 19:46:11','2016-01-06 19:46:11',NULL),(16,1,'Crédito','PZO',16,'PZO',146176,'2016-01-04','2016-01-30',NULL,45,2,NULL,8640.00,0.00,8640.00,1036.80,0.00,9676.80,NULL,NULL,'          PERIODO ENERO  2016  PATENTE: 2010-AG1845','','P',0,'2016-01-06 19:50:14','2016-01-06 19:50:14',NULL),(17,1,'Crédito','PZO',17,'PZO',146177,'2016-01-04','2016-01-30',NULL,40,2,NULL,4147.20,0.00,4147.20,497.66,0.00,4644.86,NULL,NULL,'          PERIODO ENERO  2016  PATENTE: 2010-AG1845','','P',0,'2016-01-06 19:52:58','2016-01-06 19:52:58',NULL),(18,1,'Crédito','PZO',18,'PZO',146178,'2016-01-04','2016-01-30',NULL,40,2,NULL,8640.00,0.00,8640.00,1036.80,0.00,9676.80,NULL,NULL,'          PERIODO ENERO  2016  PATENTE: 2010-AG1845','','P',0,'2016-01-06 19:55:31','2016-01-06 19:55:31',NULL),(19,1,'Crédito','PZO',19,'PZO',146179,'2016-01-04','2016-01-30',NULL,40,2,NULL,6912.00,0.00,6912.00,829.44,0.00,7741.44,NULL,NULL,'          PERIODO ENERO  2016  PATENTE: 2010-AG1845','','P',0,'2016-01-06 19:58:07','2016-01-06 19:58:07',NULL),(20,1,'Crédito','PZO',20,'PZO',146180,'2016-01-04','2016-01-04',NULL,124,2,NULL,1000.00,0.00,1000.00,120.00,0.00,1120.00,NULL,NULL,'          PERIODO ENERO  2016  PATENTE: 2010-AG1845','','P',0,'2016-01-06 20:01:17','2016-01-06 20:01:17',NULL),(21,1,'Crédito','PZO',21,'PZO',146181,'2016-01-04','2016-01-30',NULL,124,2,NULL,8640.00,0.00,8640.00,1036.80,0.00,9676.80,NULL,NULL,'          PERIODO ENERO  2016  PATENTE: 2010-AG1845','','P',0,'2016-01-06 20:03:29','2016-01-06 20:03:29',NULL),(22,1,'Crédito','PZO',22,'PZO',146182,'2016-01-04','2016-01-30',NULL,48,2,NULL,6912.00,0.00,6912.00,829.44,0.00,7741.44,NULL,NULL,'          PERIODO ENERO  2016  PATENTE: 2010-AG1845','','P',0,'2016-01-06 20:05:25','2016-01-06 20:05:25',NULL),(23,1,'Crédito','PZO',23,'PZO',146183,'2016-01-04','2016-01-30',NULL,59,2,NULL,5529.60,0.00,5529.60,663.55,0.00,6193.15,NULL,NULL,'          PERIODO ENERO  2016  PATENTE: 2010-AG1845','','P',0,'2016-01-06 20:06:52','2016-01-06 20:06:52',NULL),(24,1,'Crédito','PZO',24,'PZO',146184,'2016-01-04','2016-01-30',NULL,81,2,NULL,11059.20,0.00,11059.20,1327.10,0.00,12386.30,NULL,NULL,'          PERIODO ENERO  2016  PATENTE: 2010-AG1845 ','','P',0,'2016-01-06 20:09:17','2016-01-06 20:09:17',NULL),(25,1,'Crédito','PZO',25,'PZO',146185,'2016-01-04','2016-01-30',NULL,94,2,NULL,5529.60,0.00,5529.60,663.55,0.00,6193.15,NULL,NULL,'          PERIODO ENERO  2016  PATENTE: 2010-AG1845','','P',0,'2016-01-06 20:10:39','2016-01-06 20:10:39',NULL),(26,1,'Crédito','PZO',26,'PZO',146186,'2016-01-04','2016-01-30',NULL,9,2,NULL,5529.60,0.00,5529.60,663.55,0.00,6193.15,NULL,NULL,'          PERIODO ENERO  2016  PATENTE: 2010-AG1845','','P',0,'2016-01-06 20:12:09','2016-01-06 20:12:09',NULL),(27,1,'Crédito','PZO',27,'PZO',146187,'2016-01-04','2016-01-30',NULL,46,2,NULL,1658.88,0.00,1658.88,199.07,0.00,1857.95,NULL,NULL,'          PERIODO ENERO  2016  PATENTE: 2010-AG1845','','P',0,'2016-01-06 20:13:39','2016-01-06 20:13:39',NULL),(28,1,'Crédito','PZO',28,'PZO',146188,'2016-01-04','2016-01-30',NULL,98,2,NULL,6912.00,0.00,6912.00,829.44,0.00,7741.44,NULL,NULL,'          PERIODO ENERO  2016  PATENTE: 2010-AG1845','','P',0,'2016-01-06 20:14:48','2016-01-06 20:14:48',NULL),(29,1,'Crédito','PZO',29,'PZO',146189,'2016-01-04','2016-01-30',NULL,98,2,NULL,1658.88,0.00,1658.88,199.07,0.00,1857.95,NULL,NULL,'          PERIODO ENERO  2016  PATENTE: 2010-AG1845','','P',0,'2016-01-06 20:16:26','2016-01-06 20:16:26',NULL),(30,1,'Crédito','PZO',30,'PZO',146190,'2016-01-04','2016-01-30',NULL,149,2,NULL,4147.20,0.00,4147.20,497.66,0.00,4644.86,NULL,NULL,'          PERIODO ENERO  2016  PATENTE: 2010-AG1845','','P',0,'2016-01-06 20:28:06','2016-01-06 20:28:06',NULL),(31,1,'Crédito','PZO',31,'PZO',146191,'2016-01-04','2016-01-30',NULL,107,2,NULL,4147.20,0.00,4147.20,497.66,0.00,4644.86,NULL,NULL,'V          PERIODO ENERO  2016  PATENTE: 2010-AG1845','','P',0,'2016-01-06 20:30:00','2016-01-06 20:30:00',NULL),(32,1,'Crédito','PZO',32,'PZO',146192,'2016-01-04','2016-01-30',NULL,109,2,NULL,5529.60,0.00,5529.60,663.55,0.00,6193.15,NULL,NULL,'          PERIODO ENERO  2016  PATENTE: 2010-AG1845','','P',0,'2016-01-06 20:31:09','2016-01-06 20:31:09',NULL),(33,1,'Crédito','PZO',33,'PZO',146193,'2016-01-04','2016-01-30',NULL,73,2,NULL,5529.60,0.00,5529.60,663.55,0.00,6193.15,NULL,NULL,'          PERIODO ENERO  2016  PATENTE: 2010-AG1845','','P',0,'2016-01-06 20:32:41','2016-01-06 20:32:41',NULL),(34,1,'Crédito','PZO',34,'PZO',146194,'2016-01-04','2016-01-30',NULL,117,2,NULL,5529.60,0.00,5529.60,663.55,0.00,6193.15,NULL,NULL,'          PERIODO ENERO  2016  PATENTE: 2010-AG1845','','P',0,'2016-01-06 20:35:31','2016-01-06 20:35:31',NULL),(35,1,'Crédito','PZO',35,'PZO',146195,'2016-01-04','2016-01-30',NULL,122,2,NULL,5529.60,0.00,5529.60,663.55,0.00,6193.15,NULL,NULL,'          PERIODO ENERO  2016  PATENTE: 2010-AG1845','','P',0,'2016-01-06 20:37:18','2016-01-06 20:37:18',NULL),(36,1,'Crédito','PZO',36,'PZO',146196,'2016-01-04','2016-01-30',NULL,97,2,NULL,5529.60,0.00,5529.60,663.55,0.00,6193.15,NULL,NULL,'          PERIODO ENERO  2016  PATENTE: 2010-AG1845','','P',0,'2016-01-06 20:40:34','2016-01-06 20:40:34',NULL),(37,1,'Crédito','PZO',37,'PZO',146197,'2016-01-04','2016-01-30',NULL,2,2,NULL,5529.60,0.00,5529.60,663.55,0.00,6193.15,NULL,NULL,'          PERIODO ENERO  2016  PATENTE: 2010-AG1845','','P',0,'2016-01-06 20:43:21','2016-01-06 20:43:21',NULL),(38,1,'Crédito','PZO',38,'PZO',146198,'2016-01-04','2016-01-30',NULL,108,2,NULL,5529.60,0.00,5529.60,663.55,0.00,6193.15,NULL,NULL,'          PERIODO ENERO  2016  PATENTE: 2010-AG1845','','P',0,'2016-01-06 20:45:02','2016-01-06 20:45:02',NULL),(39,1,'Crédito','PZO',39,'PZO',146199,'2016-01-04','2016-01-30',NULL,65,2,NULL,4838.40,0.00,4838.40,580.61,0.00,5419.01,NULL,NULL,'          PERIODO ENERO  2016  PATENTE: 2010-AG1845','','P',0,'2016-01-06 20:46:55','2016-01-06 20:46:55',NULL),(40,1,'Crédito','PZO',40,'PZO',146200,'2016-01-04','2016-01-30',NULL,96,2,NULL,9953.28,0.00,9953.28,1194.39,0.00,11147.67,NULL,NULL,'          PERIODO ENERO  2016  PATENTE: 2010-AG1845','','P',0,'2016-01-06 20:49:43','2016-01-06 20:49:43',NULL),(41,1,'Crédito','PZO',41,'PZO',146201,'2016-01-06','2016-01-30',NULL,106,2,NULL,4147.20,0.00,4147.20,497.66,0.00,4644.86,NULL,NULL,'          PERIODO ENERO  2016  PATENTE: 2010-AG1845','','P',0,'2016-01-06 20:53:18','2016-01-06 20:56:30','2016-01-06 20:56:30'),(42,1,'Crédito','PZO',42,'PZO',1462201,'2016-01-04','2016-01-30',NULL,106,2,NULL,4147.20,0.00,4147.20,497.66,0.00,4644.86,NULL,NULL,'          PERIODO ENERO  2016  PATENTE: 2010-AG1845','','P',0,'2016-01-06 21:10:49','2016-01-06 21:10:49',NULL),(43,1,'Crédito','PZO',43,'PZO',146202,'2016-01-06','2016-02-06',NULL,43,2,NULL,5529.60,0.00,5529.60,663.55,0.00,6193.15,NULL,NULL,'          PERIODO ENERO  2016  PATENTE: 2010-AG1845','','P',0,'2016-01-06 22:05:15','2016-01-06 22:05:15',NULL),(44,1,'Crédito','PZO',44,'PZO',146203,'2016-01-05','2016-01-30',NULL,118,2,NULL,4147.20,0.00,4147.20,497.66,0.00,4644.86,NULL,NULL,'          PERIODO ENERO  2016  PATENTE: 2010-AG1845','','P',0,'2016-01-06 22:08:13','2016-01-06 22:08:13',NULL),(45,1,'Crédito','PZO',45,'PZO',146204,'2016-01-05','2016-01-30',NULL,145,2,NULL,7500.00,0.00,7500.00,900.00,0.00,8400.00,NULL,NULL,'          PERIODO ENERO  2016  PATENTE: 2010-AG1845','','P',0,'2016-01-06 22:11:20','2016-01-06 22:11:20',NULL),(46,1,'Crédito','PZO',46,'PZO',146205,'2016-01-05','2016-01-30',NULL,105,2,NULL,4147.20,0.00,4147.20,497.66,0.00,4644.86,NULL,NULL,'          PERIODO ENERO  2016  PATENTE: 2010-AG1845','','P',0,'2016-01-06 22:14:46','2016-01-06 22:14:46',NULL),(47,1,'Crédito','PZO',47,'PZO',146206,'2016-01-05','2016-01-30',NULL,20,2,NULL,4147.20,0.00,4147.20,497.66,0.00,4644.86,NULL,NULL,'          PERIODO ENERO  2016  PATENTE: 2010-AG1845','','P',0,'2016-01-06 22:17:34','2016-01-06 22:17:34',NULL),(48,1,'Crédito','PZO',48,'PZO',146207,'2016-01-05','2016-01-30',NULL,88,2,NULL,2764.80,0.00,2764.80,331.78,0.00,3096.58,NULL,NULL,'          PERIODO ENERO  2016  PATENTE: 2010-AG1845','','P',0,'2016-01-06 22:18:57','2016-01-06 22:18:57',NULL),(49,1,'Crédito','PZO',49,'PZO',146208,'2016-01-05','2016-01-30',NULL,18,2,NULL,6912.00,0.00,6912.00,829.44,0.00,7741.44,NULL,NULL,'          PERIODO ENERO  2016  PATENTE: 2010-AG1845','','P',0,'2016-01-06 22:20:09','2016-01-06 22:20:09',NULL),(50,1,'Crédito','PZO',50,'PZO',146209,'2016-01-05','2016-01-30',NULL,19,2,NULL,6912.00,0.00,6912.00,829.44,0.00,7741.44,NULL,NULL,'          PERIODO ENERO  2016  PATENTE: 2010-AG1845','','P',0,'2016-01-06 22:21:32','2016-01-06 22:21:32',NULL),(51,1,'Crédito','PZO',51,'PZO',146210,'2016-01-05','2016-01-30',NULL,83,2,NULL,3840.00,0.00,3840.00,460.80,0.00,4300.80,NULL,NULL,'          PERIODO ENERO  2016  PATENTE: 2010-AG1845','','P',0,'2016-01-06 22:25:27','2016-01-06 22:25:27',NULL),(52,1,'Crédito','PZO',52,'PZO',1462202,'2016-01-05','2016-01-30',NULL,76,2,NULL,8847.36,0.00,8847.36,1061.68,0.00,9909.04,NULL,NULL,'          PERIODO ENERO  2016  PATENTE: 2010-AG1845','','P',0,'2016-01-06 22:27:16','2016-01-06 22:27:16',NULL),(53,1,'Crédito','PZO',53,'PZO',146212,'2016-01-05','2016-01-30',NULL,76,2,NULL,3369.60,0.00,3369.60,404.35,0.00,3773.95,NULL,NULL,'          PERIODO ENERO  2016  PATENTE: 2010-AG1845','','P',0,'2016-01-06 22:29:32','2016-01-06 22:29:32',NULL),(54,1,'Crédito','PZO',54,'PZO',146213,'2016-01-05','2016-01-30',NULL,135,2,NULL,2000.00,0.00,2000.00,240.00,0.00,2240.00,NULL,NULL,'          PERIODO ENERO  2016  PATENTE: 2010-AG1845','','P',0,'2016-01-06 22:48:54','2016-01-06 22:48:54',NULL),(55,1,'Crédito','PZO',55,'PZO',146214,'2016-01-05','2016-01-30',NULL,38,2,NULL,1658.88,0.00,1658.88,199.07,0.00,1857.95,NULL,NULL,'          PERIODO ENERO  2016  PATENTE: 2010-AG1845','','P',0,'2016-01-06 22:50:56','2016-01-06 22:50:56',NULL),(56,1,'Crédito','PZO',56,'PZO',146215,'2016-01-05','2016-01-30',NULL,66,2,NULL,1658.88,0.00,1658.88,199.07,0.00,1857.95,NULL,NULL,'          PERIODO ENERO  2016  PATENTE: 2010-AG1845','','P',0,'2016-01-06 22:53:31','2016-01-06 22:53:31',NULL),(57,1,'Crédito','PZO',57,'PZO',219180,'2016-01-01','2016-02-06',NULL,40,5,NULL,5220.00,0.00,5220.00,0.00,0.00,5220.00,14,NULL,'Facturación por Derechos Aeronáuticos','','P',1,'2016-01-06 22:56:50','2016-01-14 19:36:41',NULL),(58,1,'Crédito','PZO',58,'PZO',146217,'2016-01-05','2016-01-30',NULL,37,2,NULL,1658.88,0.00,1658.88,199.07,0.00,1857.95,NULL,NULL,'PERIODO ENERO 2016 	PATENTE :2010-AG1845','','P',0,'2016-01-07 17:50:57','2016-01-07 17:50:57',NULL),(59,1,'Crédito','PZO',59,'PZO',146218,'2016-01-04','2016-01-30',NULL,36,2,NULL,1658.88,0.00,1658.88,199.07,0.00,1857.95,NULL,NULL,'PERIODO ENERO 2016 	PATENTE :2010-AG1845','','P',0,'2016-01-07 17:53:34','2016-01-07 17:53:34',NULL),(60,1,'Crédito','PZO',60,'PZO',146219,'2016-01-04','2016-01-30',NULL,70,2,NULL,2764.80,0.00,2764.80,331.78,0.00,3096.58,NULL,NULL,'PERIODO ENERO 2016 	PATENTE :2010-AG1845','','P',0,'2016-01-07 17:55:02','2016-01-07 17:55:02',NULL),(61,1,'Crédito','PZO',61,'PZO',146220,'2016-01-04','2016-01-30',NULL,78,2,NULL,6912.00,0.00,6912.00,829.44,0.00,7741.44,NULL,NULL,'PERIODO ENERO 2016 	PATENTE :2010-AG1845','','P',0,'2016-01-07 17:57:03','2016-01-07 17:57:03',NULL),(62,1,'Crédito','PZO',62,'PZO',146221,'2016-01-05','2016-01-30',NULL,78,2,NULL,2419.20,0.00,2419.20,290.30,0.00,2709.50,NULL,NULL,'PERIODO ENERO 2016 	PATENTE :2010-AG1845','','P',0,'2016-01-07 17:58:57','2016-01-07 17:58:57',NULL),(63,1,'Crédito','PZO',63,'PZO',146222,'2016-01-05','2016-01-30',NULL,78,2,NULL,2764.80,0.00,2764.80,331.78,0.00,3096.58,NULL,NULL,'PERIODO ENERO 2016 	PATENTE :2010-AG1845','','P',0,'2016-01-07 18:00:58','2016-01-07 18:00:58',NULL),(64,1,'Crédito','PZO',64,'PZO',146223,'2016-01-05','2016-01-30',NULL,69,2,NULL,5529.60,0.00,5529.60,663.55,0.00,6193.15,NULL,NULL,'PERIODO ENERO 2016 	PATENTE :2010-AG1845','','P',0,'2016-01-07 18:02:28','2016-01-07 18:02:28',NULL),(65,1,'Crédito','PZO',65,'PZO',146223,'2016-01-05','2016-01-30',NULL,136,2,NULL,13167.81,0.00,13167.81,1580.14,0.00,14747.95,NULL,NULL,'PERIODO ENERO 2016 	PATENTE :2010-AG1845','','P',0,'2016-01-07 18:05:23','2016-01-07 18:05:23',NULL),(66,1,'Crédito','PZO',66,'PZO',146225,'2016-01-05','2016-01-30',NULL,13,2,NULL,8640.00,0.00,8640.00,1036.80,0.00,9676.80,NULL,NULL,'PERIODO ENERO 2016 	PATENTE :2010-AG1845','','P',0,'2016-01-07 18:06:40','2016-01-07 18:06:40',NULL),(67,1,'Crédito','PZO',67,'PZO',1146226,'2016-01-05','2016-01-30',NULL,13,2,NULL,4147.20,0.00,4147.20,497.66,0.00,4644.86,NULL,NULL,'PERIODO ENERO 2016 	PATENTE :2010-AG1845','','P',0,'2016-01-07 18:08:38','2016-01-07 18:08:38',NULL),(68,1,'Crédito','PZO',68,'PZO',146227,'2016-01-05','2016-01-30',NULL,95,2,NULL,2880.58,0.00,2880.58,345.67,0.00,3226.25,NULL,NULL,'PERIODO ENERO 2016 	PATENTE :2010-AG1845','','P',0,'2016-01-07 18:10:55','2016-01-07 18:10:55',NULL),(69,1,'Crédito','PZO',69,'PZO',146228,'2016-01-05','2016-01-30',NULL,146,2,NULL,1658.88,0.00,1658.88,199.07,0.00,1857.95,NULL,NULL,'PERIODO ENERO 2016 	PATENTE :2010-AG1845','','P',0,'2016-01-07 18:13:38','2016-01-07 18:13:38',NULL),(70,1,'Crédito','PZO',70,'PZO',146229,'2016-01-05','2016-01-30',NULL,120,2,NULL,2419.20,0.00,2419.20,290.30,0.00,2709.50,NULL,NULL,'PERIODO ENERO 2016 	PATENTE :2010-AG1845','','P',0,'2016-01-07 18:15:27','2016-01-07 18:15:27',NULL),(71,1,'Crédito','PZO',71,'PZO',146230,'2016-01-05','2016-01-30',NULL,86,2,NULL,6912.00,0.00,6912.00,829.44,0.00,7741.44,NULL,NULL,'PERIODO ENERO 2016 	PATENTE :2010-AG1845','','P',0,'2016-01-07 18:16:53','2016-01-07 18:16:53',NULL),(72,1,'Crédito','PZO',72,'PZO',146230,'2016-01-05','2016-01-30',NULL,62,2,NULL,70118.82,0.00,70118.82,8414.26,0.00,78533.08,NULL,NULL,'PERIODO ENERO 2016 	PATENTE :2010-AG1845','','P',0,'2016-01-07 18:19:24','2016-01-07 18:19:24',NULL),(73,1,'Crédito','PZO',73,'PZO',146232,'2016-01-05','2016-01-30',NULL,29,2,NULL,6480.00,0.00,6480.00,777.60,0.00,7257.60,NULL,NULL,'PERIODO ENERO 2016 	PATENTE :2010-AG1845','','P',0,'2016-01-07 18:22:17','2016-01-07 18:22:17',NULL),(74,1,'Crédito','PZO',74,'PZO',146233,'2016-01-05','2016-01-30',NULL,112,2,NULL,3456.00,0.00,3456.00,414.72,0.00,3870.72,NULL,NULL,'PERIODO ENERO 2016 	PATENTE :2010-AG1845','','P',0,'2016-01-07 18:25:37','2016-01-07 18:25:37',NULL),(75,1,'Crédito','PZO',75,'PZO',146234,'2016-01-05','2016-01-30',NULL,5,2,NULL,8930.30,0.00,8930.30,1071.64,0.00,10001.94,NULL,NULL,'PERIODO ENERO 2016 	PATENTE :2010-AG1845','','P',0,'2016-01-07 18:28:13','2016-01-07 18:28:13',NULL),(76,1,'Crédito','PZO',76,'PZO',146235,'2016-01-05','2016-01-30',NULL,110,2,NULL,4098.82,0.00,4098.82,491.86,0.00,4590.68,NULL,NULL,'PERIODO ENERO 2016 	PATENTE :2010-AG1845','','P',0,'2016-01-07 18:30:12','2016-01-07 18:30:12',NULL),(77,1,'Crédito','PZO',77,'PZO',146236,'2016-01-05','2016-01-30',NULL,101,2,NULL,3904.32,0.00,3904.32,468.52,0.00,4372.84,NULL,NULL,'PERIODO ENERO 2016 	PATENTE :2010-AG1845','','P',0,'2016-01-07 18:32:02','2016-01-07 18:32:02',NULL),(78,1,'Crédito','PZO',78,'PZO',146237,'2016-01-05','2016-01-30',NULL,119,2,NULL,2260.22,0.00,2260.22,271.23,0.00,2531.45,NULL,NULL,'PERIODO ENERO 2016 	PATENTE :2010-AG1845','','P',0,'2016-01-07 18:34:59','2016-01-07 18:34:59',NULL),(79,1,'Crédito','PZO',79,'PZO',146238,'2016-01-05','2016-01-30',NULL,125,2,NULL,1928.45,0.00,1928.45,231.41,0.00,2159.86,NULL,NULL,'PERIODO ENERO 2016 	PATENTE :2010-AG1845','','P',0,'2016-01-07 18:36:16','2016-01-07 18:36:16',NULL),(80,1,'Crédito','PZO',80,'PZO',146239,'2016-01-05','2016-01-30',NULL,133,2,NULL,3725.57,0.00,3725.57,447.07,0.00,4172.64,NULL,NULL,'PERIODO ENERO 2016 	PATENTE :2010-AG1845','','P',0,'2016-01-07 18:38:00','2016-01-07 18:38:00',NULL),(81,1,'Crédito','PZO',81,'PZO',146240,'2016-01-05','2016-01-30',NULL,75,2,NULL,1919.32,0.00,1919.32,230.32,0.00,2149.64,NULL,NULL,'PERIODO ENERO 2016 	PATENTE :2010-AG1845 ','','P',0,'2016-01-07 18:41:14','2016-01-07 18:41:14',NULL),(82,1,'Crédito','PZO',82,'PZO',146241,'2016-01-05','2016-01-30',NULL,16,2,NULL,1658.88,0.00,1658.88,199.07,0.00,1857.95,NULL,NULL,'PERIODO ENERO 2016 	PATENTE :2010-AG1845','','P',0,'2016-01-07 18:44:43','2016-01-07 18:44:43',NULL),(83,1,'Crédito','PZO',83,'PZO',146242,'2016-01-05','2016-01-30',NULL,7,2,NULL,67043.00,0.00,67043.00,8045.16,0.00,75088.16,NULL,NULL,'PERIODO ENERO 2016 	PATENTE :2010-AG1845','','P',0,'2016-01-07 18:46:23','2016-01-07 18:46:23',NULL),(84,1,'Crédito','PZO',84,'PZO',146243,'2016-01-05','2016-01-30',NULL,90,2,NULL,70118.82,0.00,70118.82,8414.26,0.00,78533.08,NULL,NULL,'PERIODO ENERO 2016 	PATENTE :2010-AG1845','','P',0,'2016-01-07 18:48:44','2016-01-07 18:48:44',NULL),(85,1,'Crédito','PZO',85,'PZO',146244,'2016-01-05','2016-01-30',NULL,90,2,NULL,22499.99,0.00,22499.99,2700.00,0.00,25199.99,NULL,NULL,'PERIODO ENERO 2016 	PATENTE :2010-AG1845','','P',0,'2016-01-07 18:51:12','2016-01-07 18:51:12',NULL),(86,1,'Crédito','PZO',86,'PZO',146245,'2016-01-05','2016-01-30',NULL,53,2,NULL,1220.00,0.00,1220.00,146.40,0.00,1366.40,NULL,NULL,'PERIODO ENERO 2016 	PATENTE :2010-AG1845','','P',0,'2016-01-07 19:11:21','2016-01-07 19:11:21',NULL),(87,1,'Crédito','PZO',87,'PZO',146246,'2016-01-05','2016-01-30',NULL,50,2,NULL,70118.82,0.00,70118.82,8414.26,0.00,78533.08,NULL,NULL,'PERIODO ENERO 2016 	PATENTE :2010-AG1845','','P',0,'2016-01-07 19:19:15','2016-01-07 19:19:15',NULL),(88,1,'Crédito','PZO',88,'PZO',146247,'2016-01-06','2016-01-30',NULL,6,2,NULL,11059.20,0.00,11059.20,1327.10,0.00,12386.30,NULL,NULL,'PERIODO ENERO 2016 	PATENTE :2010-AG1845','','P',0,'2016-01-07 19:20:32','2016-01-07 19:20:32',NULL),(89,1,'Crédito','PZO',89,'PZO',146248,'2016-01-06','2016-01-30',NULL,113,2,NULL,8294.00,0.00,8294.00,995.28,0.00,9289.28,NULL,NULL,'PERIODO ENERO 2016 	PATENTE :2010-AG1845','','P',0,'2016-01-07 19:22:05','2016-01-07 19:22:05',NULL),(90,1,'Crédito','PZO',90,'PZO',219191,'2016-01-01','2016-02-07',NULL,124,5,NULL,4687.50,0.00,4687.50,0.00,0.00,4687.50,15,NULL,'Facturación por Derechos Aeronáuticos: - Aterrizaje Diuno Internacional, ','','P',1,'2016-01-07 19:42:15','2016-01-14 19:37:03',NULL),(91,1,'Contado','PZO',91,'PZO',219192,'2016-01-01','2016-02-07',NULL,101,5,NULL,82.50,0.00,82.50,0.00,0.00,82.50,16,NULL,'Facturación por Derechos Aeronáuticos: - Aterrizaje Diuno Nacional, ','','C',1,'2016-01-08 02:07:48','2016-01-14 20:49:40',NULL),(92,1,'Crédito','PZO',92,'PZO',219193,'2016-01-02','2016-02-07',NULL,13,5,NULL,5496.00,0.00,5496.00,0.00,0.00,5496.00,17,NULL,'Facturación por Derechos Aeronáuticos: - Aterrizaje Diuno Internacional, ','','P',1,'2016-01-08 02:45:53','2016-01-14 19:38:06',NULL),(93,1,'Contado','PZO',93,'PZO',219194,'2016-01-02','2016-02-07',NULL,54,5,NULL,144.00,0.00,144.00,0.00,0.00,144.00,18,NULL,'Facturación por Derechos Aeronáuticos: - Aterrizaje Diuno Nacional, ','','C',1,'2016-01-08 03:04:55','2016-01-14 20:50:49',NULL),(94,1,'Contado','PZO',94,'PZO',219195,'2016-01-02','2016-02-07',NULL,150,5,NULL,168.00,0.00,168.00,0.00,0.00,168.00,19,NULL,'Facturación por Derechos Aeronáuticos: - Aterrizaje Diuno Internacional, ','','C',1,'2016-01-08 03:24:22','2016-01-14 20:51:40',NULL),(95,1,'Crédito','PZO',95,'PZO',219196,'2016-01-02','2016-02-08',NULL,139,5,NULL,328.50,0.00,328.50,0.00,0.00,328.50,20,NULL,'Facturación por Derechos Aeronáuticos: - Aterrizaje Diuno Nacional, ','','P',1,'2016-01-08 07:41:36','2016-01-14 19:41:23',NULL),(96,1,'Crédito','PZO',96,'PZO',219197,'2016-01-02','2016-02-08',NULL,139,5,NULL,328.50,0.00,328.50,0.00,0.00,328.50,21,NULL,'Facturación por Derechos Aeronáuticos: - Aterrizaje Diuno Nacional, ','','P',1,'2016-01-08 07:44:14','2016-01-14 19:42:04',NULL),(97,1,'Crédito','PZO',97,'PZO',219198,'2016-01-02','2016-02-08',NULL,139,5,NULL,328.50,0.00,328.50,0.00,0.00,328.50,22,NULL,'Facturación por Derechos Aeronáuticos: - Aterrizaje Diuno Nacional, ','','P',1,'2016-01-08 07:46:28','2016-01-14 19:43:08',NULL),(98,1,'Crédito','PZO',98,'PZO',219199,'2016-01-02','2016-02-08',NULL,139,5,NULL,328.50,0.00,328.50,0.00,0.00,328.50,23,NULL,'Facturación por Derechos Aeronáuticos: - Aterrizaje Diuno Nacional, ','','P',1,'2016-01-08 07:50:31','2016-01-14 19:42:43',NULL),(99,1,'Crédito','PZO',99,'PZO',219200,'2016-01-02','2016-02-08',NULL,139,5,NULL,592.80,0.00,592.80,0.00,0.00,592.80,24,NULL,'Facturación por Derechos Aeronáuticos: - Aterrizaje Diuno Nacional, ','','P',1,'2016-01-08 07:59:24','2016-01-14 19:43:39',NULL),(100,1,'Crédito','PZO',100,'PZO',219201,'2016-01-02','2016-02-08',NULL,139,5,NULL,166.44,0.00,166.44,0.00,0.00,166.44,25,NULL,'Facturación por Derechos Aeronáuticos: - Aterrizaje Diuno Nacional, ','','P',1,'2016-01-08 08:01:31','2016-01-14 19:44:05',NULL),(101,1,'Contado','PZO',101,'PZO',219203,'2016-01-02','2016-02-08',NULL,139,5,NULL,547.92,0.00,547.92,0.00,0.00,547.92,26,NULL,'Facturación por Derechos Aeronáuticos: - Aterrizaje Diuno Nacional, ','','C',1,'2016-01-08 20:05:22','2016-01-14 20:53:31',NULL),(102,1,'Contado','PZO',102,'PZO',219204,'2016-01-02','2016-02-08',NULL,106,5,NULL,1753.50,0.00,1753.50,0.00,0.00,1753.50,27,NULL,'Facturación por Derechos Aeronáuticos: - Aterrizaje Nocturno Internacional, ','','C',1,'2016-01-09 01:37:12','2016-01-14 20:54:26',NULL),(103,1,'Crédito','PZO',103,'PZO',219207,'2016-01-02','2016-02-08',NULL,40,5,NULL,13500.72,0.00,13500.72,0.00,0.00,13500.72,28,NULL,'Facturación por Derechos Aeronáuticos.','','P',1,'2016-01-09 02:11:57','2016-01-14 23:37:31',NULL),(104,1,'Crédito','PZO',104,'PZO',219208,'2016-01-02','2016-02-08',NULL,40,5,NULL,5220.00,0.00,5220.00,0.00,0.00,5220.00,29,NULL,'Facturación por Derechos Aeronáuticos: - Aterrizaje Diuno Nacional, ','','P',1,'2016-01-09 02:16:13','2016-01-14 19:48:24',NULL),(105,1,'Crédito','PZO',105,'PZO',219209,'2016-01-02','2016-02-08',NULL,124,5,NULL,13123.44,0.00,13123.44,0.00,0.00,13123.44,30,NULL,'Facturación por Derechos Aeronáuticos: - Aterrizaje Diuno Internacional, ','','P',1,'2016-01-09 02:20:46','2016-01-14 19:49:05',NULL),(106,1,'Crédito','PZO',106,'PZO',219210,'2016-01-02','2016-02-08',NULL,124,5,NULL,4174.50,0.00,4174.50,0.00,0.00,4174.50,31,NULL,'Facturación por Derechos Aeronáuticos: - Aterrizaje Diuno Nacional, ','','P',1,'2016-01-09 02:25:33','2016-01-14 19:49:37',NULL),(107,1,'Contado','PZO',107,'PZO',219211,'2016-01-02','2016-02-08',NULL,154,5,NULL,390.00,0.00,390.00,0.00,0.00,390.00,32,NULL,'Facturación por Derechos Aeronáuticos: - Aterrizaje Diuno Nacional, ','','C',1,'2016-01-09 02:31:39','2016-01-14 20:58:52',NULL),(108,1,'Crédito','PZO',108,'PZO',219212,'2016-01-02','2016-02-08',NULL,40,5,NULL,5220.00,0.00,5220.00,0.00,0.00,5220.00,33,NULL,'Facturación por Derechos Aeronáuticos: - Aterrizaje Diuno Nacional, ','','P',1,'2016-01-09 02:34:18','2016-01-14 19:51:01',NULL),(109,1,'Crédito','PZO',109,'PZO',219213,'2016-01-02','2016-02-08',NULL,40,5,NULL,5220.00,0.00,5220.00,0.00,0.00,5220.00,34,NULL,'Facturación por Derechos Aeronáuticos: - Aterrizaje Diuno Nacional, ','','P',1,'2016-01-09 02:39:03','2016-01-14 19:51:28',NULL),(110,1,'Contado','PZO',110,'PZO',219215,'2016-01-03','2016-02-08',NULL,106,5,NULL,451.50,0.00,451.50,0.00,0.00,451.50,35,NULL,'Facturación por Derechos Aeronáuticos: - Aterrizaje Diuno Nacional, ','','C',1,'2016-01-09 02:59:19','2016-01-14 21:01:42',NULL),(111,1,'Contado','PZO',111,'PZO',219216,'2016-01-03','2016-02-08',NULL,156,5,NULL,144.00,0.00,144.00,0.00,0.00,144.00,36,NULL,'Facturación por Derechos Aeronáuticos: - Aterrizaje Diuno Nacional, ','','C',1,'2016-01-09 03:49:04','2016-01-14 21:07:12',NULL),(112,1,'Contado','PZO',112,'PZO',219217,'2016-01-03','2016-02-09',NULL,157,5,NULL,144.00,0.00,144.00,0.00,0.00,144.00,37,NULL,'Facturación por Derechos Aeronáuticos: - Aterrizaje Diuno Nacional, ','','C',1,'2016-01-09 04:41:29','2016-01-14 21:07:54',NULL),(113,1,'Contado','PZO',113,'PZO',219218,'2016-01-03','2016-02-09',NULL,158,5,NULL,328.50,0.00,328.50,0.00,0.00,328.50,38,NULL,'Facturación por Derechos Aeronáuticos: - Aterrizaje Diuno Nacional, ','','C',1,'2016-01-09 04:57:42','2016-01-14 21:08:43',NULL),(114,1,'Contado','PZO',114,'PZO',219222,'2016-01-03','2016-02-01',NULL,148,5,NULL,35866.47,0.00,35866.47,0.00,0.00,35866.47,39,NULL,'Facturación por Derechos Aeronáuticos: - Aterrizaje Nocturno Nacional, ','','C',1,'2016-01-10 20:08:44','2016-01-14 21:12:09',NULL),(115,1,'Contado','PZO',115,'PZO',219223,'2016-01-03','2016-02-01',NULL,156,5,NULL,144.00,0.00,144.00,0.00,0.00,144.00,40,NULL,'Facturación por Derechos Aeronáuticos: - Aterrizaje Diuno Nacional, ','','C',1,'2016-01-10 20:26:06','2016-01-14 21:13:47',NULL),(116,1,'Contado','PZO',116,'PZO',219224,'2016-01-03','2016-02-01',NULL,156,5,NULL,144.00,0.00,144.00,0.00,0.00,144.00,41,NULL,'Facturación por Derechos Aeronáuticos: - Aterrizaje Diuno Nacional, ','','C',1,'2016-01-10 20:30:04','2016-01-14 21:13:01',NULL),(117,1,'Contado','PZO',117,'PZO',219225,'2016-01-03','2016-02-01',NULL,58,5,NULL,2427.06,0.00,2427.06,0.00,0.00,2427.06,42,NULL,'Facturación por Derechos Aeronáuticos: - Aterrizaje Diuno Nacional, ','','P',1,'2016-01-10 20:37:20','2016-01-14 23:07:58',NULL),(118,1,'Crédito','PZO',118,'PZO',219227,'2015-01-03','2016-02-01',NULL,124,5,NULL,4051.50,0.00,4051.50,0.00,0.00,4051.50,43,NULL,'Facturación por Derechos Aeronáuticos: - Aterrizaje Diuno Nacional, ','','P',1,'2016-01-10 20:46:40','2016-01-14 20:19:06',NULL),(119,1,'Crédito','PZO',119,'PZO',219228,'2016-01-03','2016-02-01',NULL,40,5,NULL,15119.10,0.00,15119.10,0.00,0.00,15119.10,44,NULL,'Facturación por Derechos Aeronáuticos: - Aterrizaje Diuno Internacional, ','','P',1,'2016-01-10 20:49:39','2016-01-14 20:29:25',NULL),(120,1,'Crédito','PZO',120,'PZO',219229,'2016-01-03','2016-02-01',NULL,40,5,NULL,5220.00,0.00,5220.00,0.00,0.00,5220.00,45,NULL,'Facturación por Derechos Aeronáuticos: - Aterrizaje Diuno Nacional, ','','P',1,'2016-01-10 20:56:27','2016-01-14 20:30:47',NULL),(121,1,'Crédito','PZO',121,'PZO',219231,'2016-01-03','2016-02-01',NULL,63,5,NULL,792.00,0.00,792.00,0.00,0.00,792.00,46,NULL,'Facturación por Derechos Aeronáuticos','','P',1,'2016-01-11 00:40:14','2016-01-14 20:26:51',NULL),(122,1,'Crédito','PZO',122,'PZO',219221,'2016-01-03','2016-02-01',NULL,63,5,NULL,792.00,0.00,792.00,0.00,0.00,792.00,47,NULL,'Facturación por Derechos Aeronáuticos','','P',1,'2016-01-11 00:41:57','2016-01-14 20:27:21',NULL),(123,1,'Crédito','PZO',123,'PZO',219230,'2016-01-03','2016-02-01',NULL,63,5,NULL,21.00,0.00,21.00,0.00,0.00,21.00,48,NULL,'Facturación por Derechos Aeronáuticos','','P',1,'2016-01-11 00:42:56','2016-01-14 20:25:33',NULL),(124,1,'Crédito','PZO',124,'PZO',219220,'2016-01-03','2016-02-01',NULL,63,5,NULL,792.00,0.00,792.00,0.00,0.00,792.00,49,NULL,'Facturación por Derechos Aeronáuticos','','P',1,'2016-01-11 00:45:00','2016-01-14 20:25:11',NULL),(125,1,'Crédito','PZO',125,'PZO',219332,'2016-01-03','2016-02-01',NULL,63,5,NULL,792.00,0.00,792.00,0.00,0.00,792.00,50,NULL,'Facturación por Derechos Aeronáuticos','','P',1,'2016-01-11 00:50:35','2016-01-14 20:24:50',NULL),(126,1,'Crédito','PZO',126,'PZO',219233,'2016-01-03','2016-02-01',NULL,40,5,NULL,5220.00,0.00,5220.00,0.00,0.00,5220.00,51,NULL,'Facturación por Derechos Aeronáuticos','','P',1,'2016-01-11 00:54:31','2016-01-14 20:33:27',NULL),(127,1,'Crédito','PZO',127,'PZO',1462204,'2016-01-01','2016-02-01',NULL,40,5,NULL,5281.50,0.00,5281.50,0.00,0.00,5281.50,52,NULL,'Facturación por Derechos Aeronáuticos','','P',1,'2016-01-11 00:58:18','2016-01-14 20:33:02',NULL),(128,1,'Crédito','PZO',128,'PZO',219236,'2016-01-04','2016-02-01',NULL,45,5,NULL,9000.30,0.00,9000.30,0.00,0.00,9000.30,53,NULL,'Facturación por Derechos Aeronáuticos','','P',1,'2016-01-11 01:31:58','2016-01-14 22:56:07',NULL),(129,1,'Crédito','PZO',129,'PZO',219238,'2016-01-04','2016-02-01',NULL,13,5,NULL,4728.00,0.00,4728.00,0.00,0.00,4728.00,54,NULL,'Facturación por Derechos Aeronáuticos','','P',1,'2016-01-11 01:38:14','2016-01-14 22:58:22',NULL),(130,1,'Crédito','PZO',130,'PZO',219239,'2016-01-04','2016-02-01',NULL,13,5,NULL,4834.50,0.00,4834.50,0.00,0.00,4834.50,55,NULL,'Facturación por Derechos Aeronáuticos','','P',1,'2016-01-11 01:41:18','2016-01-14 22:58:51',NULL),(131,1,'Contado','PZO',131,'PZO',219240,'2016-01-04','2016-02-01',NULL,101,5,NULL,82.50,0.00,82.50,0.00,0.00,82.50,56,NULL,'Facturación por Derechos Aeronáuticos','','C',1,'2016-01-11 01:43:16','2016-01-14 23:11:50',NULL),(132,1,'Contado','PZO',132,'PZO',219241,'2016-01-04','2016-02-01',NULL,54,5,NULL,144.00,0.00,144.00,0.00,0.00,144.00,57,NULL,'Facturación por Derechos Aeronáuticos','','C',1,'2016-01-11 01:48:39','2016-01-14 23:12:59',NULL),(133,1,'Contado','PZO',133,'PZO',219243,'2016-01-04','2016-02-01',NULL,159,5,NULL,811.38,0.00,811.38,0.00,0.00,811.38,58,NULL,'Facturación por Derechos Aeronáuticos','','C',0,'2016-01-11 01:57:45','2016-01-14 23:14:32',NULL),(134,1,'Contado','PZO',134,'PZO',219244,'2016-01-04','2016-02-01',NULL,160,5,NULL,697.50,0.00,697.50,0.00,0.00,697.50,59,NULL,'Facturación por Derechos Aeronáuticos','','C',0,'2016-01-11 02:04:58','2016-01-14 23:15:16',NULL),(135,1,'Contado','PZO',135,'PZO',219245,'2016-01-04','2016-02-01',NULL,74,5,NULL,267.00,0.00,267.00,0.00,0.00,267.00,60,NULL,'Facturación por Derechos Aeronáuticos','','C',1,'2016-01-11 02:24:37','2016-01-14 23:18:41',NULL),(136,1,'Contado','PZO',136,'PZO',219214,'2016-01-02','2016-02-01',NULL,155,5,NULL,267.00,0.00,267.00,0.00,0.00,267.00,61,NULL,'Facturación por Derechos Aeronáuticos','','C',1,'2016-01-11 02:27:26','2016-01-14 20:59:40',NULL),(137,1,'Contado','PZO',137,'PZO',219205,'2016-01-02','2016-02-01',NULL,128,5,NULL,328.50,0.00,328.50,0.00,0.00,328.50,62,NULL,'Facturación por Derechos Aeronáuticos','','C',1,'2016-01-11 02:38:49','2016-01-14 20:56:32',NULL),(138,1,'Contado','PZO',138,'PZO',219219,'2016-01-03','2016-02-10',NULL,101,5,NULL,82.50,0.00,82.50,0.00,0.00,82.50,63,NULL,'Facturación por Derechos Aeronáuticos','','C',0,'2016-01-11 02:44:16','2016-01-14 21:09:28',NULL),(139,1,'Contado','PZO',139,'PZO',219235,'2016-01-04','2016-02-11',NULL,15,5,NULL,928.20,0.00,928.20,0.00,0.00,928.20,64,NULL,'Facturación por Derechos Aeronáuticos','','C',1,'2016-01-11 18:09:49','2016-01-14 23:10:32',NULL),(140,1,'Crédito','PZO',140,'PZO',219226,'2016-01-03','2016-02-11',NULL,124,5,NULL,12393.60,0.00,12393.60,0.00,0.00,12393.60,65,NULL,'Facturación por Derechos Aeronáuticos','','P',1,'2016-01-11 18:11:32','2016-01-14 20:22:38',NULL),(141,1,'Contado','PZO',141,'PZO',219206,'2016-01-02','2016-02-11',NULL,153,5,NULL,43380.90,0.00,43380.90,0.00,0.00,43380.90,66,NULL,'Facturación por Derechos Aeronáuticos','','C',1,'2016-01-11 18:24:42','2016-01-14 20:57:34',NULL),(142,1,'Crédito','PZO',142,'',146250,'2016-01-12','2016-02-12',NULL,86,8,NULL,902402.28,0.00,902402.28,108288.27,0.00,999999.99,NULL,NULL,'10% SERVICIOS MES  DICIEMBRE 2015      PATENTE 2010- AG 1845','','P',1,'2016-01-13 01:44:16','2016-01-13 01:44:18',NULL),(143,1,'Contado','PZO',143,'PZO',219246,'2016-01-04','2016-02-13',NULL,161,5,NULL,451.50,0.00,451.50,0.00,0.00,451.50,67,NULL,'Facturación por Derechos Aeronáuticos','','C',0,'2016-01-14 00:51:20','2016-01-14 23:17:03',NULL),(144,1,'Crédito','PZO',144,'PZO',219247,'2016-01-04','2016-02-13',NULL,40,5,NULL,5220.00,0.00,5220.00,0.00,0.00,5220.00,68,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 01:02:49','2016-01-14 01:02:49',NULL),(145,1,'Crédito','PZO',145,'PZO',219248,'2016-01-04','2016-02-13',NULL,124,5,NULL,4834.50,0.00,4834.50,0.00,0.00,4834.50,69,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 01:37:04','2016-01-14 01:39:54',NULL),(146,1,'Crédito','PZO',146,'PZO',219249,'2016-01-04','2016-02-13',NULL,124,5,NULL,11930.40,0.00,11930.40,0.00,0.00,11930.40,70,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 01:46:20','2016-01-14 01:46:20',NULL),(147,1,'Crédito','PZO',147,'PZO',219250,'2016-01-04','2016-02-13',NULL,124,5,NULL,4174.50,0.00,4174.50,0.00,0.00,4174.50,71,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 01:50:11','2016-01-14 01:50:11',NULL),(148,1,'Contado','PZO',148,'PZO',219251,'2016-01-04','2016-02-13',NULL,162,5,NULL,1168.50,0.00,1168.50,0.00,0.00,1168.50,72,NULL,'Facturación por Derechos Aeronáuticos','','C',1,'2016-01-14 02:22:20','2016-01-14 23:28:38',NULL),(149,1,'Crédito','PZO',149,'PZO',219252,'2016-01-04','2016-02-13',NULL,139,5,NULL,328.50,0.00,328.50,0.00,0.00,328.50,73,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 03:04:22','2016-01-14 03:04:22',NULL),(150,1,'Crédito','PZO',150,'PZO',219253,'2016-01-04','2016-02-13',NULL,139,5,NULL,328.50,0.00,328.50,0.00,0.00,328.50,74,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 03:07:46','2016-01-14 03:07:46',NULL),(151,1,'Crédito','PZO',151,'PZO',219254,'2016-01-04','2016-02-13',NULL,139,5,NULL,328.50,0.00,328.50,0.00,0.00,328.50,75,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 03:11:39','2016-01-14 03:11:39',NULL),(152,1,'Crédito','PZO',152,'PZO',219255,'2016-01-04','2016-02-13',NULL,139,5,NULL,328.50,0.00,328.50,0.00,0.00,328.50,76,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 03:13:10','2016-01-14 03:13:10',NULL),(153,1,'Crédito','PZO',153,'PZO',219256,'2016-01-04','2016-02-13',NULL,139,5,NULL,328.50,0.00,328.50,0.00,0.00,328.50,77,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 03:16:17','2016-01-14 03:16:17',NULL),(154,1,'Crédito','PZO',154,'PZO',219257,'2016-01-04','2016-02-13',NULL,139,5,NULL,328.50,0.00,328.50,0.00,0.00,328.50,78,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 03:17:45','2016-01-14 03:17:45',NULL),(155,1,'Crédito','PZO',155,'PZO',219258,'2016-01-04','2016-02-13',NULL,63,5,NULL,792.00,0.00,792.00,0.00,0.00,792.00,79,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 03:22:26','2016-01-14 03:22:26',NULL),(156,1,'Crédito','PZO',156,'PZO',219259,'2016-01-04','2016-02-13',NULL,63,5,NULL,792.00,0.00,792.00,0.00,0.00,792.00,80,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 03:27:31','2016-01-14 03:27:31',NULL),(157,1,'Crédito','PZO',157,'PZO',219260,'2016-01-04','2016-02-13',NULL,40,5,NULL,5220.00,0.00,5220.00,0.00,0.00,5220.00,81,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 03:29:59','2016-01-14 03:29:59',NULL),(158,1,'Crédito','PZO',158,'PZO',219261,'2016-01-04','2016-02-13',NULL,125,5,NULL,82.50,0.00,82.50,0.00,0.00,82.50,82,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 03:32:22','2016-01-14 03:32:22',NULL),(159,1,'Crédito','PZO',159,'PZO',219262,'2016-01-04','2016-02-13',NULL,13,5,NULL,4728.00,0.00,4728.00,0.00,0.00,4728.00,83,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 03:36:15','2016-01-14 03:36:15',NULL),(160,1,'Contado','PZO',160,'PZO',219263,'2016-01-05','2016-02-13',NULL,150,5,NULL,276.00,0.00,276.00,0.00,0.00,276.00,84,NULL,'Facturación por Derechos Aeronáuticos','','P',1,'2016-01-14 03:38:41','2016-01-14 23:29:11',NULL),(161,1,'Crédito','PZO',161,'PZO',219264,'2016-01-05','2016-02-13',NULL,125,5,NULL,82.50,0.00,82.50,0.00,0.00,82.50,85,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 03:40:51','2016-01-14 03:40:51',NULL),(162,1,'Crédito','PZO',162,'PZO',219265,'2016-01-05','2016-02-13',NULL,13,5,NULL,4680.60,0.00,4680.60,0.00,0.00,4680.60,86,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 03:43:24','2016-01-14 03:43:24',NULL),(163,1,'Contado','PZO',163,'PZO',219266,'2016-01-05','2016-02-13',NULL,163,5,NULL,2257.92,0.00,2257.92,0.00,0.00,2257.92,87,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 03:50:44','2016-01-14 03:50:44',NULL),(164,1,'Crédito','PZO',164,'PZO',219267,'2016-01-05','2016-02-13',NULL,45,5,NULL,9000.30,0.00,9000.30,0.00,0.00,9000.30,88,NULL,'Facturación por Derechos Aeronáuticos','','P',1,'2016-01-14 03:54:34','2016-01-14 04:01:45','2016-01-14 04:01:45'),(165,1,'Crédito','PZO',165,'PZO',219267,'2016-01-05','2016-02-13',NULL,45,5,NULL,9000.30,0.00,9000.30,0.00,0.00,9000.30,88,NULL,'Facturación por Derechos Aeronáuticos','','P',1,'2016-01-14 04:04:52','2016-01-14 23:28:12',NULL),(166,1,'Contado','PZO',166,'PZO',219268,'2016-01-05','2016-02-13',NULL,101,5,NULL,82.50,0.00,82.50,0.00,0.00,82.50,89,NULL,'Facturación por Derechos Aeronáuticos','','P',1,'2016-01-14 04:10:13','2016-01-14 20:40:07',NULL),(167,1,'Contado','PZO',167,'PZO',219269,'2016-01-05','2016-02-14',NULL,54,5,NULL,144.00,0.00,144.00,0.00,0.00,144.00,90,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 17:49:34','2016-01-14 17:49:34',NULL),(168,1,'Contado','PZO',168,'PZO',219270,'2016-01-05','2016-02-14',NULL,164,5,NULL,328.50,0.00,328.50,0.00,0.00,328.50,91,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 17:57:40','2016-01-14 17:57:40',NULL),(169,1,'Contado','PZO',169,'PZO',219271,'2016-01-05','2016-02-14',NULL,54,5,NULL,144.00,0.00,144.00,0.00,0.00,144.00,92,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 18:03:12','2016-01-14 18:03:12',NULL),(170,1,'Contado','PZO',170,'PZO',219272,'2016-01-05','2016-02-14',NULL,165,5,NULL,503.04,0.00,503.04,0.00,0.00,503.04,93,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 18:13:26','2016-01-14 18:13:26',NULL),(171,1,'Contado','PZO',171,'PZO',219273,'2016-01-05','2016-02-14',NULL,166,5,NULL,524.64,0.00,524.64,0.00,0.00,524.64,94,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 18:22:30','2016-01-14 18:22:30',NULL),(172,1,'Contado','PZO',172,'PZO',219274,'2016-01-05','2016-02-14',NULL,80,5,NULL,233.76,0.00,233.76,0.00,0.00,233.76,95,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 18:28:29','2016-01-14 18:28:29',NULL),(173,1,'Contado','PZO',173,'PZO',219275,'2016-01-05','2016-02-14',NULL,22,5,NULL,451.50,0.00,451.50,0.00,0.00,451.50,96,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 18:36:36','2016-01-14 18:36:36',NULL),(174,1,'Contado','PZO',174,'PZO',219276,'2016-01-05','2016-02-14',NULL,167,5,NULL,608.58,0.00,608.58,0.00,0.00,608.58,97,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 18:43:17','2016-01-14 18:43:17',NULL),(175,1,'Contado','PZO',175,'PZO',219277,'2016-01-05','2016-02-14',NULL,121,5,NULL,1551.00,0.00,1551.00,0.00,0.00,1551.00,98,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 18:53:27','2016-01-14 18:53:27',NULL),(176,1,'Contado','PZO',176,'PZO',219278,'2016-01-05','2016-02-14',NULL,121,5,NULL,658.50,0.00,658.50,0.00,0.00,658.50,99,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 18:57:35','2016-01-14 18:57:35',NULL),(177,1,'Crédito','PZO',177,'PZO',219279,'2016-01-05','2016-02-14',NULL,139,5,NULL,328.50,0.00,328.50,0.00,0.00,328.50,100,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 19:00:21','2016-01-14 19:00:21',NULL),(178,1,'Crédito','PZO',178,'PZO',219280,'2016-01-05','2016-02-14',NULL,139,5,NULL,328.50,0.00,328.50,0.00,0.00,328.50,101,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 19:03:30','2016-01-14 19:03:30',NULL),(179,1,'Crédito','PZO',179,'PZO',219281,'2016-01-05','2016-02-14',NULL,139,5,NULL,328.50,0.00,328.50,0.00,0.00,328.50,102,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 19:06:28','2016-01-14 19:06:28',NULL),(180,1,'Crédito','PZO',180,'PZO',219282,'2016-01-05','2016-02-14',NULL,40,5,NULL,12782.64,0.00,12782.64,0.00,0.00,12782.64,103,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 19:09:43','2016-01-14 19:09:43',NULL),(181,1,'Crédito','PZO',181,'PZO',219283,'2016-01-05','2016-02-14',NULL,40,5,NULL,5220.00,0.00,5220.00,0.00,0.00,5220.00,104,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 19:13:59','2016-01-14 19:13:59',NULL),(182,1,'Contado','PZO',182,'PZO',219284,'2016-01-05','2016-02-14',NULL,168,5,NULL,786.00,0.00,786.00,0.00,0.00,786.00,105,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 19:22:47','2016-01-14 19:22:47',NULL),(183,1,'Crédito','PZO',183,'PZO',219285,'2016-01-05','2016-02-14',NULL,139,5,NULL,144.00,0.00,144.00,0.00,0.00,144.00,106,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 19:27:58','2016-01-14 19:27:58',NULL),(184,1,'Contado','PZO',184,'PZO',219286,'2016-01-05','2016-02-14',NULL,156,5,NULL,144.00,0.00,144.00,0.00,0.00,144.00,107,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 19:31:51','2016-01-14 19:31:51',NULL),(185,1,'Contado','PZO',185,'PZO',219287,'2016-01-05','2016-02-14',NULL,156,5,NULL,144.00,0.00,144.00,0.00,0.00,144.00,108,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 19:37:27','2016-01-14 19:37:27',NULL),(186,1,'Contado','PZO',186,'PZO',219288,'2016-01-05','2016-02-14',NULL,154,5,NULL,726.60,0.00,726.60,0.00,0.00,726.60,109,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 19:40:06','2016-01-14 19:40:06',NULL),(187,1,'Crédito','PZO',187,'PZO',219289,'2016-01-05','2016-02-14',NULL,63,5,NULL,1563.00,0.00,1563.00,0.00,0.00,1563.00,110,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 19:47:02','2016-01-14 19:47:02',NULL),(188,1,'Crédito','PZO',188,'PZO',219290,'2016-01-05','2016-02-14',NULL,63,5,NULL,792.00,0.00,792.00,0.00,0.00,792.00,111,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 19:50:10','2016-01-14 19:50:10',NULL),(189,1,'Crédito','PZO',189,'PZO',219291,'2016-01-05','2016-02-14',NULL,124,5,NULL,4051.50,0.00,4051.50,0.00,0.00,4051.50,112,NULL,'Facturación por Derechos Aeronáuticos','','P',1,'2016-01-14 19:52:30','2016-01-14 23:29:05',NULL),(190,1,'Crédito','PZO',190,'PZO',219292,'2016-01-05','2016-02-14',NULL,124,5,NULL,11581.44,0.00,11581.44,0.00,0.00,11581.44,113,NULL,'Facturación por Derechos Aeronáuticos','','P',1,'2016-01-14 19:55:14','2016-01-14 23:28:54',NULL),(191,1,'Crédito','PZO',191,'PZO',219293,'2016-01-05','2016-02-14',NULL,124,5,NULL,4051.50,0.00,4051.50,0.00,0.00,4051.50,114,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 20:03:46','2016-01-14 20:03:46',NULL),(192,1,'Contado','PZO',192,'PZO',219294,'2016-01-05','2016-02-14',NULL,12,5,NULL,513.00,0.00,513.00,0.00,0.00,513.00,115,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 20:08:33','2016-01-14 20:08:33',NULL),(193,1,'Crédito','PZO',193,'PZO',219295,'2016-01-05','2016-02-14',NULL,40,5,NULL,3957.00,0.00,3957.00,0.00,0.00,3957.00,116,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 20:10:32','2016-01-14 20:10:32',NULL),(194,1,'Crédito','PZO',194,'PZO',219296,'2016-01-05','2016-02-14',NULL,40,5,NULL,6100.56,0.00,6100.56,0.00,0.00,6100.56,117,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 20:13:07','2016-01-14 20:13:07',NULL),(195,1,'Contado','PZO',195,'PZO',1462205,'2016-01-06','2016-02-14',NULL,148,5,NULL,3552.33,0.00,3552.33,0.00,0.00,3552.33,118,NULL,'Facturación por Derechos Aeronáuticos','','P',1,'2016-01-14 20:16:32','2016-01-14 21:21:55',NULL),(196,1,'Contado','PZO',196,'PZO',219298,'2016-01-06','2016-02-14',NULL,150,5,NULL,480.60,0.00,480.60,0.00,0.00,480.60,119,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 20:18:50','2016-01-14 20:18:50',NULL),(197,1,'Contado','PZO',197,'PZO',219299,'2016-01-06','2016-02-14',NULL,159,5,NULL,744.06,0.00,744.06,0.00,0.00,744.06,120,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 20:22:19','2016-01-14 20:22:19',NULL),(198,1,'Contado','PZO',198,'PZO',4295,'2016-01-06','2016-02-14',NULL,168,5,NULL,4295.40,0.00,4295.40,0.00,0.00,4295.40,121,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 20:27:46','2016-01-14 20:27:46',NULL),(199,1,'Contado','PZO',199,'PZO',219301,'2016-01-06','2016-02-14',NULL,24,5,NULL,793.92,0.00,793.92,0.00,0.00,793.92,122,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 20:36:33','2016-01-14 20:36:33',NULL),(200,1,'Contado','PZO',200,'PZO',219302,'2016-01-06','2016-02-14',NULL,22,5,NULL,535.50,0.00,535.50,0.00,0.00,535.50,123,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 20:43:53','2016-01-14 20:43:53',NULL),(201,1,'Contado','PZO',201,'PZO',219303,'2016-01-06','2016-02-14',NULL,106,5,NULL,451.50,0.00,451.50,0.00,0.00,451.50,124,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 20:45:42','2016-01-14 20:45:42',NULL),(202,1,'Contado','PZO',202,'PZO',219304,'2016-01-06','2016-02-14',NULL,54,5,NULL,144.00,0.00,144.00,0.00,0.00,144.00,125,NULL,'Facturación por Derechos Aeronáuticos','','C',0,'2016-01-14 20:49:04','2016-01-14 21:29:56',NULL),(203,1,'Contado','PZO',203,'PZO',219305,'2016-01-06','2016-02-14',NULL,169,5,NULL,144.00,0.00,144.00,0.00,0.00,144.00,126,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 20:54:24','2016-01-14 20:54:24',NULL),(204,1,'Contado','PZO',204,'PZO',219306,'2016-01-06','2016-02-14',NULL,156,5,NULL,144.00,0.00,144.00,0.00,0.00,144.00,127,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 20:56:17','2016-01-14 20:56:17',NULL),(205,1,'Crédito','PZO',205,'PZO',219307,'2016-01-06','2016-02-14',NULL,45,5,NULL,9617.40,0.00,9617.40,0.00,0.00,9617.40,128,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 21:01:25','2016-01-14 21:01:25',NULL),(206,1,'Crédito','PZO',206,'PZO',219308,'2016-01-06','2016-02-14',NULL,45,5,NULL,9268.44,0.00,9268.44,0.00,0.00,9268.44,129,NULL,'Facturación por Derechos Aeronáuticos','','P',0,'2016-01-14 21:08:25','2016-01-14 21:08:25',NULL);
/*!40000 ALTER TABLE `facturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `footers`
--

DROP TABLE IF EXISTS `footers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `footers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `footer` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `usuario` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `footers`
--

LOCK TABLES `footers` WRITE;
/*!40000 ALTER TABLE `footers` DISABLE KEYS */;
/*!40000 ALTER TABLE `footers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hangars`
--

DROP TABLE IF EXISTS `hangars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hangars` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `aeropuerto_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `hangars_aeropuerto_id_foreign` (`aeropuerto_id`),
  CONSTRAINT `hangars_aeropuerto_id_foreign` FOREIGN KEY (`aeropuerto_id`) REFERENCES `aeropuertos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hangars`
--

LOCK TABLES `hangars` WRITE;
/*!40000 ALTER TABLE `hangars` DISABLE KEYS */;
INSERT INTO `hangars` VALUES (2,'1-A',1,'2015-09-11 00:50:52','2015-09-11 00:50:52'),(5,'4-A',1,'2015-09-11 02:02:04','2015-09-11 02:02:04'),(6,'5-A',1,'2015-09-11 02:02:11','2015-09-11 02:02:11'),(7,'6-A',1,'2015-09-11 02:02:20','2015-09-11 02:02:20'),(8,'7-A',1,'2015-09-11 02:02:37','2015-09-11 02:02:37'),(9,'8-A',1,'2015-09-11 02:02:43','2015-09-11 02:02:43'),(10,'9-A',1,'2015-09-11 02:03:45','2015-09-11 02:03:45'),(11,'10-A',1,'2015-09-11 02:03:54','2015-09-11 02:03:54'),(12,'11-A',1,'2015-09-11 02:04:03','2015-09-11 02:04:03'),(13,'1-B',1,'2015-09-11 02:04:20','2015-09-11 02:04:20'),(14,'2-B',1,'2015-09-11 02:04:27','2015-09-11 02:04:27'),(15,'3-B',1,'2015-09-11 02:04:34','2015-09-11 02:04:34'),(16,'4-B',1,'2015-09-11 02:04:41','2015-09-11 02:07:54'),(17,'5-B',1,'2015-09-11 02:04:52','2015-09-11 02:04:52'),(19,'2-A',1,'2015-09-11 02:15:32','2015-09-11 02:15:32'),(20,'3-A',1,'2015-09-11 02:15:45','2015-09-11 02:15:45'),(21,'6-B',1,'2015-09-11 02:16:49','2015-09-11 02:16:49'),(22,'7-B',1,'2015-09-11 02:17:12','2015-09-11 02:17:12'),(23,'8-B',1,'2015-09-11 02:17:28','2015-09-11 02:17:28'),(24,'9-B',1,'2015-09-11 02:17:34','2015-09-11 02:17:34'),(25,'10-B',1,'2015-09-11 02:17:46','2015-09-11 02:17:46'),(26,'11-B',1,'2015-09-11 02:18:03','2015-09-11 02:18:03'),(27,'12-B',1,'2015-09-11 02:18:16','2015-09-11 02:18:16'),(28,'13-B',1,'2015-09-11 02:18:51','2015-09-11 02:18:51'),(29,'14-B',1,'2015-09-11 02:18:59','2015-09-11 02:18:59'),(30,'1-C',1,'2015-09-11 02:19:26','2015-09-11 02:19:26'),(31,'2-C',1,'2015-09-11 02:19:36','2015-09-11 02:19:36'),(32,'3-C',1,'2015-09-11 02:19:42','2015-09-11 02:19:42'),(33,'4-C',1,'2015-09-11 02:19:48','2015-09-11 02:19:48'),(34,'5-C',1,'2015-09-11 02:19:53','2015-09-11 02:19:53'),(35,'6-C',1,'2015-09-11 02:20:00','2015-09-11 02:20:00'),(36,'7-C',1,'2015-09-11 02:20:06','2015-09-11 02:20:06'),(37,'8-C',1,'2015-09-11 02:20:20','2015-09-11 02:20:20'),(38,'9-C',1,'2015-09-11 02:20:28','2015-09-11 02:20:28'),(39,'10-C',1,'2015-09-11 02:20:37','2015-09-11 02:20:37'),(40,'11-C',1,'2015-09-11 02:21:11','2015-09-11 02:21:11'),(41,'12-C',1,'2015-09-11 02:21:18','2015-09-11 02:21:18'),(42,'13-C',1,'2015-09-11 02:21:24','2015-09-11 02:21:24'),(43,'14-C',1,'2015-09-11 02:21:34','2015-09-11 02:21:34'),(44,'HE-04',1,'2016-01-08 23:57:05','2016-01-08 23:57:05');
/*!40000 ALTER TABLE `hangars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horarios_aeronauticos`
--

DROP TABLE IF EXISTS `horarios_aeronauticos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horarios_aeronauticos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `operaciones_inicio` time NOT NULL,
  `operaciones_fin` time NOT NULL,
  `sol_salida` time NOT NULL,
  `sol_puesta` time NOT NULL,
  `aeropuerto_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `horarios_aeronauticos_aeropuerto_id_foreign` (`aeropuerto_id`),
  CONSTRAINT `horarios_aeronauticos_aeropuerto_id_foreign` FOREIGN KEY (`aeropuerto_id`) REFERENCES `aeropuertos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horarios_aeronauticos`
--

LOCK TABLES `horarios_aeronauticos` WRITE;
/*!40000 ALTER TABLE `horarios_aeronauticos` DISABLE KEYS */;
INSERT INTO `horarios_aeronauticos` VALUES (1,'05:00:00','23:59:00','06:00:00','18:00:00',1,'0000-00-00 00:00:00','2016-01-14 01:37:29');
/*!40000 ALTER TABLE `horarios_aeronauticos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lista_tasas`
--

DROP TABLE IF EXISTS `lista_tasas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lista_tasas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `opcion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `relacion` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lista_tasas`
--

LOCK TABLES `lista_tasas` WRITE;
/*!40000 ALTER TABLE `lista_tasas` DISABLE KEYS */;
/*!40000 ALTER TABLE `lista_tasas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meta_detalles`
--

DROP TABLE IF EXISTS `meta_detalles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meta_detalles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `meta_id` int(10) unsigned NOT NULL,
  `concepto_id` int(10) unsigned NOT NULL,
  `gobernacion_meta` double(8,2) NOT NULL,
  `saar_meta` double(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `meta_detalles_meta_id_foreign` (`meta_id`),
  KEY `meta_detalles_concepto_id_foreign` (`concepto_id`),
  CONSTRAINT `meta_detalles_concepto_id_foreign` FOREIGN KEY (`concepto_id`) REFERENCES `conceptos` (`id`),
  CONSTRAINT `meta_detalles_meta_id_foreign` FOREIGN KEY (`meta_id`) REFERENCES `metas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meta_detalles`
--

LOCK TABLES `meta_detalles` WRITE;
/*!40000 ALTER TABLE `meta_detalles` DISABLE KEYS */;
/*!40000 ALTER TABLE `meta_detalles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `metas`
--

DROP TABLE IF EXISTS `metas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `metas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aeropuerto_id` int(10) unsigned NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `metas_aeropuerto_id_foreign` (`aeropuerto_id`),
  CONSTRAINT `metas_aeropuerto_id_foreign` FOREIGN KEY (`aeropuerto_id`) REFERENCES `aeropuertos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `metas`
--

LOCK TABLES `metas` WRITE;
/*!40000 ALTER TABLE `metas` DISABLE KEYS */;
/*!40000 ALTER TABLE `metas` ENABLE KEYS */;
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
INSERT INTO `migrations` VALUES ('2015_01_12_210508_crear_tabla_usuario',1),('2015_01_15_105324_create_roles_table',1),('2015_01_15_114412_create_role_user_table',1),('2015_01_26_115212_create_permissions_table',1),('2015_01_26_115523_create_permission_role_table',1),('2015_02_09_132439_create_permission_user_table',1),('2015_06_19_203145_create_departamentos_table',1),('2015_06_19_203850_create_cargos_table',1),('2015_06_19_203900_create_aeropuertos_table',1),('2015_06_19_204816_claves_foraneas_tabla_usuarios',1),('2015_06_22_152418_creacion_tablas_estacionamiento',1),('2015_06_23_022444_creacion_tablas_bancos_cuentas',1),('2015_06_23_145953_create_pais_table',1),('2015_06_25_145636_create_tipo_aeronaves_table',1),('2015_06_25_145710_create_modelo_aeronaves_table',1),('2015_06_25_160950_create_puertos_table',1),('2015_07_20_185459_create_nacionalidad_matriculas_table',1),('2015_07_21_150533_creacion_tabla_cliente',1),('2015_07_21_160679_create_hangars_table',1),('2015_07_21_160999_create_tipo_matriculas_table',1),('2015_07_21_161000_create_aeronaves_table',1),('2015_07_22_154747_create_pilotos_table',1),('2015_07_22_174910_create_contratos_table',1),('2015_07_22_180751_create_modulos_table',1),('2015_07_23_051826_create_nacionalidad_vuelos_table',1),('2015_07_23_051928_create_aterrizajes_table',1),('2015_07_23_060536_create_facturas_table',1),('2015_08_04_152519_create_cliente_hangar_table',1),('2015_08_20_160827_creacion_tabla_facturametadatas',1),('2015_08_20_181530_creacion_tablas_cobranzas',1),('2015_10_09_201851_create_montos_fijos_table',1),('2015_10_14_195516_create_precios_aterrizajes_despegues_table',1),('2015_10_15_161731_create_estacionamiento_aeronaves_table',1),('2015_10_20_194806_create_horarios_aeronauticos_table',1),('2015_10_20_195000_create_cargos_varios_table',1),('2015_10_28_144452_create_precios_cargas_table',1),('2015_10_30_185118_create_otros_cargos_table',1),('2015_11_06_135819_create_metas_table',1),('2015_11_06_135827_create_meta_detalles_table',1),('2015_11_09_141140_create_despegues_table',1),('2015_11_12_163326_create_concils_table',1),('2015_11_12_163501_create_footers_table',1),('2015_11_12_163515_create_lista_tasas_table',1),('2015_11_12_163533_create_tasa_cierres_table',1),('2015_11_12_163551_create_ta_tasas_table',1),('2015_11_12_163600_create_tip_tas_table',1),('2015_11_12_163608_create_topes_table',1),('2015_11_20_143239_create_cargas_table',1),('2015_11_30_020918_create_despegue_otros_cargo_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modelo_aeronaves`
--

DROP TABLE IF EXISTS `modelo_aeronaves`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modelo_aeronaves` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `modelo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `peso_maximo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `modelo_aeronaves_tipo_id_foreign` (`tipo_id`),
  CONSTRAINT `modelo_aeronaves_tipo_id_foreign` FOREIGN KEY (`tipo_id`) REFERENCES `tipo_aeronaves` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=462 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modelo_aeronaves`
--

LOCK TABLES `modelo_aeronaves` WRITE;
/*!40000 ALTER TABLE `modelo_aeronaves` DISABLE KEYS */;
INSERT INTO `modelo_aeronaves` VALUES (1,'206B3','1500',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'8R-GHB','2500',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'A-109','2000',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,'A-119','3000',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,'A-300','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,'A-310','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(7,'A-319','76000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(8,'A-320','78000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(9,'A-330','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(10,'A-340-200','275000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(11,'A-340-300','260000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(12,'A-36','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(13,'AA-5B','2000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(14,'AASB','3000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(15,'AC-14','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(16,'AC-21','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(17,'AC-500','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(18,'AC-520','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(19,'AC-560','2800',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(20,'AC-600','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(21,'AC-640','5000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(22,'AC-680','5000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(23,'AC-690','5000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(24,'AC-695','5000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(25,'AC-81','5000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(26,'AC-840','5000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(27,'AC-90','5000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(28,'AC-900','5000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(29,'AC-980','5000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(30,'AE-355','0',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(31,'AEROESTAR 600','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(32,'AG-109','0',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(33,'AG-109C','0',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(34,'AJ-25','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(35,'AK-88B','4000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(36,'ALOUETTE-2','650',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(37,'ALOVTTE 2','1500',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(38,'AMT-200','850',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(39,'AN-124-100','300000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(40,'AN-12BP','61000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(41,'AN-2','6000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(42,'AN-26','24000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(43,'AN-28','6000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(44,'AN-II','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(45,'AP-681P','2590',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(46,'AP-68P','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(47,'as-350b','1300',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(48,'AS-355F1','0',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(49,'AS-TR','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(50,'ASTR-SPX','11000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(51,'AT-401','3000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(52,'AT-42','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(53,'AT-502B','3000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(54,'ATR-42','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(55,'ATR-42-500','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(56,'ATR-72','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(57,'ATR-72500','22000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(58,'B-190','7815',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(59,'B-206 B','1500',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(60,'B-212','0',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(61,'B-300','6500',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(62,'B-407','2500',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(63,'B-427','2682',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(64,'B-707','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(65,'B-707-300','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(66,'B-727','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(67,'B-727-100','69000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(68,'B-727-200','87000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(69,'B-727-227','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(70,'B-727-300','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(71,'B-737-200','53000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(72,'B-737-200RDV','55000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(73,'B-737-241','52390',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(74,'B-737-300','57000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(75,'B-737-400','66000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(76,'B-737-500','66000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(77,'B-737-700','68000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(78,'B-737-800','79010',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(79,'B-747','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(80,'B-747-200','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(81,'B-752','114000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(82,'B-757','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(83,'B-757-2','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(84,'B-757-236','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(85,'B-767','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(86,'B-767-100','142881',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(87,'B-767-3','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(88,'B-767-300','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(89,'B-777-200','294200',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(90,'B-777-300','299370',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(91,'BA-31','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(92,'BA-900','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(93,'BAE-800','12000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(94,'BE-02','8000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(95,'BE-10','5000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(96,'BE-100','5000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(97,'BE-109','6000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(98,'BE-18','2000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(99,'BE-1900','8000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(100,'BE-1900-D','8000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(101,'BE-20','2000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(102,'BE-200','6000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(103,'BE-23','2000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(104,'BE-24r','3000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(105,'BE-300','6000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(106,'BE-33','2000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(107,'BE-35','2000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(108,'BE-350','8000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(109,'BE-36','2000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(110,'BE-400','8000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(111,'BE-50','3000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(112,'BE-55','3000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(113,'BE-58','3000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(114,'BE-60','4000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(115,'BE-65','4000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(116,'BE-76','4000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(117,'BE-80','4000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(118,'BE-90','5000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(119,'BE-95','5000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(120,'BE-99','5000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(121,'BE-9L','5000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(122,'BELL-206L','0',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(123,'BELL-222U','4500',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(124,'BELL-406','2200',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(125,'BELL-407','2000',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(126,'BELL-412','5410',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(127,'BELL-427','2100',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(128,'BELL-429','3175',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(129,'BELL-L3','0',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(130,'BELL206','1000',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(131,'BELL206BIII','1000',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(132,'BELL230','4000',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(133,'BH-06','2000',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(134,'BH-07','2268',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(135,'BH-206','0',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(136,'BH-412','3000',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(137,'BID-1900','7700',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(138,'BL-26','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(139,'BN-2','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(140,'BN-3','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(141,'BN-III','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(142,'BN2','2000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(143,'BO-105','0',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(144,'C-1','5000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(145,'C-130J HERCULES','70310',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(146,'C-152','800',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(147,'C-160','50000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(148,'C-172','2000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(149,'C-177','1600',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(150,'C-17A GLOBEMAST','266000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(151,'C-182','2000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(152,'C-185','2000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(153,'C-206','2000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(154,'C-207','2000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(155,'C-208','2000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(156,'C-208B','5000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(157,'C-210','2000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(158,'C-212','2000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(159,'C-302','3000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(160,'C-303','1500',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(161,'C-310','3000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(162,'C-335','3000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(163,'C-337','3000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(164,'C-340','3000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(165,'C-401','3000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(166,'C-402','4000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(167,'C-404','4000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(168,'C-406','5000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(169,'C-411','2000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(170,'C-414','2856',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(171,'C-421','4000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(172,'C-425','4000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(173,'C-440','5000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(174,'C-441','5000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(175,'C-500','6000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(176,'C-501','6000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(177,'C-510','3921',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(178,'C-525','4800',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(179,'C-52A','5000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(180,'C-550','7000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(181,'C-551','6000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(182,'C-560','6000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(183,'C-56X','10000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(184,'C-601','21000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(185,'C-650','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(186,'C-750','16195',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(187,'C-III','9500',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(188,'CHALLENGER','19618',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(189,'CL-22','20000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(190,'CL-300','26000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(191,'CL-60','21000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(192,'CL-600','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(193,'CL-601','20200',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(194,'CL-602','22000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(195,'CL-604','21000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(196,'CL-605','21000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(197,'CL-64','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(198,'CN-232','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(199,'CN-235','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(200,'CRJ-700','21000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(201,'CV-24','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(202,'CV-340','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(203,'CV-440','15500',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(204,'CV-580','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(205,'CW-3','6000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(206,'D-228-2','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(207,'D-28','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(208,'D-328','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(209,'D02802','3500',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(210,'DA-10','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(211,'DA-20','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(212,'DA-50','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(213,'DA-90','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(214,'DAS-8-300','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(215,'DASH 7','12273',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(216,'DASH-7','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(217,'DC-10','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(218,'DC-10-10','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(219,'DC-10-15','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(220,'DC-10-30','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(221,'DC-10/15','206400',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(222,'DC-3','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(223,'DC-3C','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(224,'DC-6','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(225,'DC-8','159091',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(226,'DC-9','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(227,'DC-9-15','43000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(228,'DC-9-30','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(229,'DC-9-31','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(230,'DC-9-32','50000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(231,'DC-9-34CF','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(232,'DC-9-50','55000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(233,'DC-9-51','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(234,'DC-9-82','66000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(235,'DC-9-83','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(236,'DH-06','5682',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(237,'DH-7','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(238,'DH-8','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(239,'DHS-7','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(240,'DO-C6','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(241,'DSH7','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(242,'E-120','12000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(243,'E50-P','6000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(244,'EA-30','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(245,'EA-31','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(246,'EA-320','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(247,'EC-120','900',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(248,'EC-130','2427',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(249,'EC-135','2800',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(250,'EMB-110','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(251,'EMB-120','12000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(252,'EMB-135BJ','22500',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(253,'EMB-190-100','51800',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(254,'EMB-810','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(255,'EPIC','3000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(256,'ERJ-145','22000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(257,'F-10','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(258,'F-100','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(259,'F-20','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(260,'F-27','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(261,'F-50','17300',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(262,'F-900','20000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(263,'FA-50','20000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(264,'FALCOM 2000LX','19142',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(265,'G-02','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(266,'G-100','12000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(267,'G-150','12000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(268,'G-159','16200',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(269,'G-200','16000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(270,'G-280','16000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(271,'G-3','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(272,'G-4','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(273,'G-73','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(274,'G-II','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(275,'GA-8','1800',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(276,'GA-LX','16000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(277,'GL-25','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(278,'GL-F2','28000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(279,'GL-F4','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(280,'GLEX','55000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(281,'GLF-3','31615',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(282,'GLF-5','41300',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(283,'GLF/5M','40910',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(284,'GULFTREAM','33000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(285,'GULFTREAM - G550','34156',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(286,'H-25A','11000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(287,'H-25B','12000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(288,'H-400','8500',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(289,'H-500C','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(290,'H-500D','0',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(291,'H-700','13000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(292,'H-800','10000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(293,'H-A1','1200',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(294,'H-M18','0',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(295,'HA-1','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(296,'HF-32','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(297,'HI-125','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(298,'HP-137','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(299,'HS-125','9000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(300,'HS-155','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(301,'HS-25','12500',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(302,'HS-25A','12000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(303,'HS-400','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(304,'HS-800','12600',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(305,'IL-18','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(306,'IL-62','60000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(307,'IL-62M','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(308,'IL-76','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(309,'J-328','16000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(310,'JC-1121','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(311,'JCOM','8000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(312,'JS-31','7000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(313,'JS-32','5000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(314,'KODI','3770',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(315,'L-1011','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(316,'L-1011-500','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(317,'L-1329','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(318,'L-329','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(319,'L-39','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(320,'LANCER','1000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(321,'LC-30','1454',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(322,'LEARJET 55','9525',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(323,'LET-410','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(324,'LJ-25','7000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(325,'LJ-31','8000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(326,'LJ-35','8319',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(327,'LJ-45','9752',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(328,'LJ-55','10000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(329,'LJ-60','11000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(330,'LNC-4','2000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(331,'LONG-RANGER','1500',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(332,'LOR-35','0',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(333,'LR-23','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(334,'LR-24','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(335,'LR-25','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(336,'LR-28','7000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(337,'LR-31','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(338,'LR-31A','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(339,'LR-35','7000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(340,'LR-35A','7000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(341,'LR-36','8910',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(342,'LR-45','9320',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(343,'LR-55','10000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(344,'LR-60','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(345,'LR-915','1500',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(346,'M-02K','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(347,'M-20P','1246',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(348,'M-20R','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(349,'M-21','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(350,'M-220J','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(351,'M-26','1200',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(352,'M-28','7000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(353,'M-3','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(354,'M-7','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(355,'MALIBU','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(356,'MD-11','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(357,'MD-500','0',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(358,'MD-500E','1500',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(359,'MD-520','0',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(360,'MD-600','0',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(361,'MD-80','67955',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(362,'MD-82','64000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(363,'MD-83','72000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(364,'MD-87','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(365,'MD-88','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(366,'MD-90','75500',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(367,'MD-900','3000',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(368,'MI-02','3000',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(369,'MI-8','0',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(370,'MID-2','0',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(371,'MO-20','1800',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(372,'MO-21','1000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(373,'MR-404','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(374,'MU-2','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(375,'MU-2B','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(376,'MU-30','7000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(377,'MU-300','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(378,'MU-60','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(379,'MV-02','5000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(380,'MY-20','3000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(381,'N-235','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(382,'N-265','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(383,'N-265-60','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(384,'N-327AR   LJ-60','23500',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(385,'N-731PC','3200',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(386,'NA-265','9000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(387,'NE-821','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(388,'P-58','2495',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(389,'P-68T','2627',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(390,'P68C','1600',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(391,'PA-18','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(392,'PA-22','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(393,'PA-23','2360',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(394,'PA-28','2000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(395,'PA-30','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(396,'PA-31','5000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(397,'PA-31T','3200',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(398,'PA-32','2000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(399,'PA-34','2000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(400,'PA-38','920',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(401,'PA-41','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(402,'PA-42','5000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(403,'PA-44','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(404,'PA-46','2000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(405,'PA-60','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(406,'PAT-31','3200',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(407,'PAY-1','2800',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(408,'PAY-2','5000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(409,'PC-68','2000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(410,'PC12','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(411,'PH-206','0',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(412,'PIPER-28','1450',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(413,'PR-M1','6000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(414,'PY1','4000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(415,'R-22','410',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(416,'R-44','800',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(417,'RANYE','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(418,'RF-10','850',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(419,'RL-893','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(420,'S-135','2700',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(421,'S-300C','0',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(422,'S-350','0',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(423,'S2R','2800',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(424,'SAAB-340B','13155',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(425,'SBR1','9000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(426,'SC-80','9000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(427,'SD-360','10387',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(428,'SE-210','52000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(429,'SF-34','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(430,'SIKORSKI','3500',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(431,'SK-59','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(432,'SK-76','0',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(433,'SL-265','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(434,'SL-8','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(435,'SR-20','1500',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(436,'SR-22','1900',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(437,'SR22','1900',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(438,'ST-200','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(439,'SW-2','4600',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(440,'SW-3','5680',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(441,'SW-4','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(442,'T-39','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(443,'TB-9','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(444,'TS-60','2800',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(445,'TU-154M','100000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(446,'TWINS OSTER','5300',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(447,'V35B','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(448,'VU-93','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(449,'W-201','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(450,'WW-1123','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(451,'WW-1124','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(452,'WW-2','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(453,'WW-23','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(454,'WW-24','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(455,'XSH-500','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(456,'Y-12','12000',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(457,'YAK-40','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(458,'YAK-42','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(459,'YAK-42D','0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(460,'YV-136T','4800',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(461,'PA-34-200T','2155',2,'2016-01-11 01:50:42','2016-01-11 01:50:42');
/*!40000 ALTER TABLE `modelo_aeronaves` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modulos`
--

DROP TABLE IF EXISTS `modulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modulos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `nFacturaPrefix` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nControlPrefix` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `isRetencion` tinyint(1) NOT NULL,
  `isPredeterminado` tinyint(1) NOT NULL,
  `aeropuerto_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `modulos_aeropuerto_id_foreign` (`aeropuerto_id`),
  CONSTRAINT `modulos_aeropuerto_id_foreign` FOREIGN KEY (`aeropuerto_id`) REFERENCES `aeropuertos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modulos`
--

LOCK TABLES `modulos` WRITE;
/*!40000 ALTER TABLE `modulos` DISABLE KEYS */;
INSERT INTO `modulos` VALUES (2,'CANON','ARRENDAMIENTO DE LOCALES COMERCIALES','PZO','PZO',0,0,1,'2015-08-04 15:40:52','2015-08-08 01:50:09'),(3,'PUBLICIDAD','INGRESOS POR ALQUILER DE ESPACIOS PUBLICITARIOS','PZO','PZO',0,0,1,'2015-08-08 01:50:37','2015-08-08 01:50:37'),(4,'ESTACIONAMIENTO','INGRESOS POR TICKETS DE ESTACIONAMIENTO DE VEHICULOS','PZO','PZO',0,0,1,'2015-08-08 01:51:06','2015-08-08 01:51:06'),(5,'DOSAS','MANEJO DE MOVIMIENTOS AERONAUTICOS POR CONTROL DE VUELO','PZO','PZO',0,0,1,'2015-08-08 01:51:53','2015-08-08 01:51:53'),(6,'CARGA','','PZO','PZO',0,0,1,'2015-12-04 20:13:03','2015-12-04 20:13:03'),(7,'TARJETAS DE IDENTIFICACION','TARJETAS DE IDENTIFICACION','PZO','PZO',0,0,1,'2016-01-13 00:14:36','2016-01-13 00:14:36'),(8,'OTROS INGRESOS NO AERONAUTICOS','OTROS INGRESOS NO AERONAUTICOS','PZO','PZO',0,0,1,'2016-01-13 00:15:30','2016-01-13 00:15:30');
/*!40000 ALTER TABLE `modulos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `montos_fijos`
--

DROP TABLE IF EXISTS `montos_fijos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `montos_fijos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `unidad_tributaria` double(8,2) NOT NULL,
  `dolar_oficial` double(8,2) NOT NULL,
  `aeropuerto_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `montos_fijos_aeropuerto_id_foreign` (`aeropuerto_id`),
  CONSTRAINT `montos_fijos_aeropuerto_id_foreign` FOREIGN KEY (`aeropuerto_id`) REFERENCES `aeropuertos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `montos_fijos`
--

LOCK TABLES `montos_fijos` WRITE;
/*!40000 ALTER TABLE `montos_fijos` DISABLE KEYS */;
INSERT INTO `montos_fijos` VALUES (1,150.00,195.25,1,'0000-00-00 00:00:00','2015-10-15 00:36:03');
/*!40000 ALTER TABLE `montos_fijos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nacionalidad_matriculas`
--

DROP TABLE IF EXISTS `nacionalidad_matriculas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nacionalidad_matriculas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `siglas` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=252 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nacionalidad_matriculas`
--

LOCK TABLES `nacionalidad_matriculas` WRITE;
/*!40000 ALTER TABLE `nacionalidad_matriculas` DISABLE KEYS */;
INSERT INTO `nacionalidad_matriculas` VALUES (1,'YA','Afganistán','2015-08-31 15:47:40','0000-00-00 00:00:00'),(2,'ZA','Albania','0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'D','Alemania','0000-00-00 00:00:00','0000-00-00 00:00:00'),(8,'C3','Andorra','0000-00-00 00:00:00','0000-00-00 00:00:00'),(9,'D2','Angola','0000-00-00 00:00:00','0000-00-00 00:00:00'),(10,'VP','Anguila','0000-00-00 00:00:00','0000-00-00 00:00:00'),(11,'V2','Antigua y Barbuda','0000-00-00 00:00:00','0000-00-00 00:00:00'),(12,'HZ','Arabia Saudita','0000-00-00 00:00:00','0000-00-00 00:00:00'),(13,'7T','Argelia','0000-00-00 00:00:00','0000-00-00 00:00:00'),(14,'LV','Argentina','0000-00-00 00:00:00','0000-00-00 00:00:00'),(16,'EK','Armenia','0000-00-00 00:00:00','0000-00-00 00:00:00'),(17,'P4','Aruba','0000-00-00 00:00:00','0000-00-00 00:00:00'),(18,'VH','Australia','0000-00-00 00:00:00','0000-00-00 00:00:00'),(19,'OE','Austria','0000-00-00 00:00:00','0000-00-00 00:00:00'),(20,'4K','Azerbaiyá','2015-08-31 15:43:37','0000-00-00 00:00:00'),(21,'C6','Bahamas','0000-00-00 00:00:00','0000-00-00 00:00:00'),(22,'S2','Bangladés','2015-08-31 15:43:37','0000-00-00 00:00:00'),(23,'8P','Barbados','0000-00-00 00:00:00','0000-00-00 00:00:00'),(24,'A9','Baréis','2015-08-31 15:43:37','0000-00-00 00:00:00'),(25,'OO','Bélgica','2015-08-31 15:43:37','0000-00-00 00:00:00'),(26,'V3','Belice','0000-00-00 00:00:00','0000-00-00 00:00:00'),(27,'TY','Benín','2015-08-31 15:43:37','0000-00-00 00:00:00'),(29,'VR','Bermudas','0000-00-00 00:00:00','0000-00-00 00:00:00'),(30,'EW','Bielorrusia','0000-00-00 00:00:00','0000-00-00 00:00:00'),(31,'XY','Myanmar','0000-00-00 00:00:00','0000-00-00 00:00:00'),(33,'CP','Bolivia','0000-00-00 00:00:00','0000-00-00 00:00:00'),(37,'T9','Bosnia y Herzegovina','0000-00-00 00:00:00','0000-00-00 00:00:00'),(39,'A2','Botsuana','0000-00-00 00:00:00','0000-00-00 00:00:00'),(40,'PP','Brasil','0000-00-00 00:00:00','0000-00-00 00:00:00'),(44,'V8','Brunéi','2015-08-31 15:43:37','0000-00-00 00:00:00'),(45,'LZ','Bulgaria','0000-00-00 00:00:00','0000-00-00 00:00:00'),(46,'XT','Burkina Faso','0000-00-00 00:00:00','0000-00-00 00:00:00'),(47,'9U','Burundi','0000-00-00 00:00:00','0000-00-00 00:00:00'),(48,'A5','Bután','2015-08-31 15:43:37','0000-00-00 00:00:00'),(49,'D4','Cabo Verde','0000-00-00 00:00:00','0000-00-00 00:00:00'),(50,'XU','Camboya','0000-00-00 00:00:00','0000-00-00 00:00:00'),(51,'TJ','Camerú','2015-08-31 15:43:37','0000-00-00 00:00:00'),(52,'CF','Canadá','2015-08-31 15:43:37','0000-00-00 00:00:00'),(56,'A7','Catar','0000-00-00 00:00:00','0000-00-00 00:00:00'),(57,'TT','Chad','0000-00-00 00:00:00','0000-00-00 00:00:00'),(58,'CC','Chile','0000-00-00 00:00:00','0000-00-00 00:00:00'),(59,'B','China','0000-00-00 00:00:00','0000-00-00 00:00:00'),(60,'B','República de China','2015-08-31 15:43:37','0000-00-00 00:00:00'),(61,'5B','Chipre','0000-00-00 00:00:00','0000-00-00 00:00:00'),(62,'HK','Colombia','0000-00-00 00:00:00','0000-00-00 00:00:00'),(68,'D6','Comoras','0000-00-00 00:00:00','0000-00-00 00:00:00'),(69,'P','Corea del Norte','0000-00-00 00:00:00','0000-00-00 00:00:00'),(70,'HL','Corea del Sur','0000-00-00 00:00:00','0000-00-00 00:00:00'),(71,'TU','Costa de Marfil','0000-00-00 00:00:00','0000-00-00 00:00:00'),(72,'TI','Costa Rica','0000-00-00 00:00:00','0000-00-00 00:00:00'),(74,'9A','Croacia','0000-00-00 00:00:00','0000-00-00 00:00:00'),(75,'CU','Cuba','0000-00-00 00:00:00','0000-00-00 00:00:00'),(76,'OY','Dinamarca','0000-00-00 00:00:00','0000-00-00 00:00:00'),(79,'OY','Dinamarca','0000-00-00 00:00:00','0000-00-00 00:00:00'),(80,'J7','Dominica','0000-00-00 00:00:00','0000-00-00 00:00:00'),(81,'HC','Ecuador','0000-00-00 00:00:00','0000-00-00 00:00:00'),(82,'SU','Egipto','0000-00-00 00:00:00','0000-00-00 00:00:00'),(83,'YS','El Salvador','0000-00-00 00:00:00','0000-00-00 00:00:00'),(84,'A6','Emiratos Árabes Unid','2015-08-31 15:43:37','0000-00-00 00:00:00'),(85,'E3','Eritrea','0000-00-00 00:00:00','0000-00-00 00:00:00'),(86,'OM','Eslovaquia','0000-00-00 00:00:00','0000-00-00 00:00:00'),(87,'S5','Eslovenia','0000-00-00 00:00:00','0000-00-00 00:00:00'),(88,'EC','España','2015-08-31 15:43:37','0000-00-00 00:00:00'),(89,'N','Estados Unidos','0000-00-00 00:00:00','0000-00-00 00:00:00'),(90,'ES','Estonia','0000-00-00 00:00:00','0000-00-00 00:00:00'),(91,'ET','Etiopía','2015-08-31 15:43:37','0000-00-00 00:00:00'),(92,'RP','Filipinas','0000-00-00 00:00:00','0000-00-00 00:00:00'),(93,'OH','Finlandia','0000-00-00 00:00:00','0000-00-00 00:00:00'),(94,'DQ','Fiyi','0000-00-00 00:00:00','0000-00-00 00:00:00'),(95,'F','Francia','0000-00-00 00:00:00','0000-00-00 00:00:00'),(99,'TR','Gabón','2015-08-31 15:43:37','0000-00-00 00:00:00'),(100,'C5','Gambia','0000-00-00 00:00:00','0000-00-00 00:00:00'),(101,'4L','Georgia','0000-00-00 00:00:00','0000-00-00 00:00:00'),(102,'9G','Ghana','0000-00-00 00:00:00','0000-00-00 00:00:00'),(103,'VP','Gibraltar','0000-00-00 00:00:00','0000-00-00 00:00:00'),(104,'J3','Granada','0000-00-00 00:00:00','0000-00-00 00:00:00'),(105,'SX','Grecia','0000-00-00 00:00:00','0000-00-00 00:00:00'),(106,'OY','Groenlandia','0000-00-00 00:00:00','0000-00-00 00:00:00'),(107,'TG','Guatemala','0000-00-00 00:00:00','0000-00-00 00:00:00'),(108,'3X','Guinea','0000-00-00 00:00:00','0000-00-00 00:00:00'),(109,'J5','Guinea-Bisáu','2015-08-31 15:43:37','0000-00-00 00:00:00'),(110,'3C','Guinea Ecuatorial','0000-00-00 00:00:00','0000-00-00 00:00:00'),(111,'8R','Guyana','0000-00-00 00:00:00','0000-00-00 00:00:00'),(112,'HH','Haití','2015-08-31 15:43:38','0000-00-00 00:00:00'),(113,'HR','Honduras','0000-00-00 00:00:00','0000-00-00 00:00:00'),(114,'VR','Hong Kong','0000-00-00 00:00:00','0000-00-00 00:00:00'),(117,'HA','Hungría','2015-08-31 15:43:38','0000-00-00 00:00:00'),(118,'VT','India','0000-00-00 00:00:00','0000-00-00 00:00:00'),(119,'PK','Indonesia','0000-00-00 00:00:00','0000-00-00 00:00:00'),(120,'YI','Irak','0000-00-00 00:00:00','0000-00-00 00:00:00'),(121,'EP','Irán','2015-08-31 15:43:38','0000-00-00 00:00:00'),(122,'EI','Irlanda','0000-00-00 00:00:00','0000-00-00 00:00:00'),(123,'M1','Isla de Man','0000-00-00 00:00:00','0000-00-00 00:00:00'),(124,'TF','Islandia','0000-00-00 00:00:00','0000-00-00 00:00:00'),(125,'VP','Islas Caimá','2015-08-31 15:43:38','0000-00-00 00:00:00'),(126,'E5','Islas Cook','0000-00-00 00:00:00','0000-00-00 00:00:00'),(127,'OY','Islas Feroe','0000-00-00 00:00:00','0000-00-00 00:00:00'),(128,'VP','Islas Malvinas','0000-00-00 00:00:00','0000-00-00 00:00:00'),(129,'V7','Islas Marshall','0000-00-00 00:00:00','0000-00-00 00:00:00'),(130,'H4','Islas Salomón','2015-08-31 15:43:38','0000-00-00 00:00:00'),(131,'VQ','Islas Turcas y Caico','0000-00-00 00:00:00','0000-00-00 00:00:00'),(132,'VP','Islas Vírgenes Britá','2015-08-31 15:43:38','0000-00-00 00:00:00'),(133,'4X','Israel','0000-00-00 00:00:00','0000-00-00 00:00:00'),(134,'I','Italia','0000-00-00 00:00:00','0000-00-00 00:00:00'),(135,'6Y','Jamaica','0000-00-00 00:00:00','0000-00-00 00:00:00'),(136,'JA','Japón','2015-08-31 15:45:51','0000-00-00 00:00:00'),(137,'JY','Jordania','0000-00-00 00:00:00','0000-00-00 00:00:00'),(138,'UN','Kazajistán','2015-08-31 15:45:51','0000-00-00 00:00:00'),(139,'5Y','Kenia','0000-00-00 00:00:00','0000-00-00 00:00:00'),(140,'EX','Kirguistán','2015-08-31 15:45:51','0000-00-00 00:00:00'),(141,'T3','Kiribati','0000-00-00 00:00:00','0000-00-00 00:00:00'),(142,'9K','Kuwait','0000-00-00 00:00:00','0000-00-00 00:00:00'),(143,'RD','Laos','0000-00-00 00:00:00','0000-00-00 00:00:00'),(144,'7P','Lesoto','0000-00-00 00:00:00','0000-00-00 00:00:00'),(145,'YL','Letonia','0000-00-00 00:00:00','0000-00-00 00:00:00'),(146,'OD','Líbano','2015-08-31 15:45:51','0000-00-00 00:00:00'),(147,'A8','Liberia','0000-00-00 00:00:00','0000-00-00 00:00:00'),(148,'5A','Libia','0000-00-00 00:00:00','0000-00-00 00:00:00'),(149,'LY','Lituania','0000-00-00 00:00:00','0000-00-00 00:00:00'),(150,'LX','Luxemburgo','0000-00-00 00:00:00','0000-00-00 00:00:00'),(151,'B-','Macao','0000-00-00 00:00:00','0000-00-00 00:00:00'),(152,'Z3','Macedonia','0000-00-00 00:00:00','0000-00-00 00:00:00'),(153,'5R','Madagascar','0000-00-00 00:00:00','0000-00-00 00:00:00'),(154,'9M','Malasia','0000-00-00 00:00:00','0000-00-00 00:00:00'),(155,'7Q','Malaui','0000-00-00 00:00:00','0000-00-00 00:00:00'),(156,'8Q','Maldivas','0000-00-00 00:00:00','0000-00-00 00:00:00'),(157,'TZ','Malí','2015-08-31 15:45:52','0000-00-00 00:00:00'),(158,'9H','Malta','0000-00-00 00:00:00','0000-00-00 00:00:00'),(159,'CN','Marruecos','0000-00-00 00:00:00','0000-00-00 00:00:00'),(160,'3B','Mauricio','0000-00-00 00:00:00','0000-00-00 00:00:00'),(161,'5T','Mauritania','0000-00-00 00:00:00','0000-00-00 00:00:00'),(162,'XA','México','2015-08-31 15:45:52','0000-00-00 00:00:00'),(163,'XB','México','2015-08-31 15:45:52','0000-00-00 00:00:00'),(164,'XC','México','2015-08-31 15:45:52','0000-00-00 00:00:00'),(165,'V6','Micronesia','0000-00-00 00:00:00','0000-00-00 00:00:00'),(166,'ER','Moldavia','0000-00-00 00:00:00','0000-00-00 00:00:00'),(167,'3A','Mónaco','2015-08-31 15:45:52','0000-00-00 00:00:00'),(168,'JU','Mongolia','0000-00-00 00:00:00','0000-00-00 00:00:00'),(169,'4O','Montenegro','0000-00-00 00:00:00','0000-00-00 00:00:00'),(170,'VP','Montserrat','0000-00-00 00:00:00','0000-00-00 00:00:00'),(171,'C9','Mozambique','0000-00-00 00:00:00','0000-00-00 00:00:00'),(172,'V5','Namibia','0000-00-00 00:00:00','0000-00-00 00:00:00'),(173,'C2','Nauru','0000-00-00 00:00:00','0000-00-00 00:00:00'),(174,'9N','Nepal','0000-00-00 00:00:00','0000-00-00 00:00:00'),(175,'YN','Nicaragua','0000-00-00 00:00:00','0000-00-00 00:00:00'),(176,'5U','Nigería','2015-08-31 15:45:52','0000-00-00 00:00:00'),(177,'5N','Nigeria','0000-00-00 00:00:00','0000-00-00 00:00:00'),(178,'LN','Noruega','0000-00-00 00:00:00','0000-00-00 00:00:00'),(179,'ZK','Nueva Zelanda','0000-00-00 00:00:00','0000-00-00 00:00:00'),(180,'A4','Omán','2015-08-31 15:45:52','0000-00-00 00:00:00'),(181,'4U','ONU','0000-00-00 00:00:00','0000-00-00 00:00:00'),(182,'PH','Países Bajos','2015-08-31 15:45:52','0000-00-00 00:00:00'),(183,'PJ','Antillas Neerlandesa','0000-00-00 00:00:00','0000-00-00 00:00:00'),(184,'AP','Pakistán','2015-08-31 15:45:52','0000-00-00 00:00:00'),(185,'HP','Panamá','2015-08-31 15:45:52','0000-00-00 00:00:00'),(186,'P2','Papúa Nueva Guinea','2015-08-31 15:45:52','0000-00-00 00:00:00'),(187,'ZP','Paraguay','0000-00-00 00:00:00','0000-00-00 00:00:00'),(188,'OB','Perú','2015-08-31 15:45:52','0000-00-00 00:00:00'),(193,'SP','Polonia','0000-00-00 00:00:00','0000-00-00 00:00:00'),(194,'CS','Portugal','0000-00-00 00:00:00','0000-00-00 00:00:00'),(195,'G','Reino Unido','0000-00-00 00:00:00','0000-00-00 00:00:00'),(196,'TL','República Centroafri','2015-08-31 15:45:52','0000-00-00 00:00:00'),(197,'OK','República Checa','2015-08-31 15:45:52','0000-00-00 00:00:00'),(198,'TN','República del Congo','2015-08-31 15:45:52','0000-00-00 00:00:00'),(199,'9Q','República Democrátic','2015-08-31 15:45:52','0000-00-00 00:00:00'),(200,'HI','República Dominicana','2015-08-31 15:45:52','0000-00-00 00:00:00'),(201,'9X','Ruanda','0000-00-00 00:00:00','0000-00-00 00:00:00'),(202,'YR','Rumania','0000-00-00 00:00:00','0000-00-00 00:00:00'),(203,'RA','Rusia','0000-00-00 00:00:00','0000-00-00 00:00:00'),(204,'5W','Samoa','0000-00-00 00:00:00','0000-00-00 00:00:00'),(205,'V4','San Cristóbal y Niev','2015-08-31 15:46:56','0000-00-00 00:00:00'),(206,'T7','San Marino','0000-00-00 00:00:00','0000-00-00 00:00:00'),(207,'J8','San Vicente y las Gr','0000-00-00 00:00:00','0000-00-00 00:00:00'),(208,'VQ','Santa Helena','0000-00-00 00:00:00','0000-00-00 00:00:00'),(209,'J6','Santa Lucía','2015-08-31 15:46:56','0000-00-00 00:00:00'),(210,'S9','Santo Tomé y Príncip','2015-08-31 15:46:56','0000-00-00 00:00:00'),(211,'6V','Senegal','0000-00-00 00:00:00','0000-00-00 00:00:00'),(213,'YU','Serbia','0000-00-00 00:00:00','0000-00-00 00:00:00'),(214,'S7','Seychelles','0000-00-00 00:00:00','0000-00-00 00:00:00'),(215,'9L','Sierra Leona','0000-00-00 00:00:00','0000-00-00 00:00:00'),(216,'9V','Singapur','0000-00-00 00:00:00','0000-00-00 00:00:00'),(217,'YK','Siria','0000-00-00 00:00:00','0000-00-00 00:00:00'),(218,'6O','Somalia','0000-00-00 00:00:00','0000-00-00 00:00:00'),(219,'4R','Sri Lanka','0000-00-00 00:00:00','0000-00-00 00:00:00'),(220,'3D','Suazilandia','0000-00-00 00:00:00','0000-00-00 00:00:00'),(221,'ZS','Sudáfrica','2015-08-31 15:46:56','0000-00-00 00:00:00'),(224,'ST','Sudán','2015-08-31 15:46:56','0000-00-00 00:00:00'),(225,'SE','Suecia','0000-00-00 00:00:00','0000-00-00 00:00:00'),(226,'HB','Suiza','0000-00-00 00:00:00','0000-00-00 00:00:00'),(227,'PZ','Surinam','0000-00-00 00:00:00','0000-00-00 00:00:00'),(228,'F-','Tahití','2015-08-31 15:46:56','0000-00-00 00:00:00'),(229,'HS','Tailandia','0000-00-00 00:00:00','0000-00-00 00:00:00'),(230,'5H','Tanzania','0000-00-00 00:00:00','0000-00-00 00:00:00'),(231,'EY','Tayikistán','2015-08-31 15:46:56','0000-00-00 00:00:00'),(232,'4W','Timor Oriental','0000-00-00 00:00:00','0000-00-00 00:00:00'),(233,'5V','Togo','0000-00-00 00:00:00','0000-00-00 00:00:00'),(234,'A3','Tonga','0000-00-00 00:00:00','0000-00-00 00:00:00'),(235,'9Y','Trinidad y Tobago','0000-00-00 00:00:00','0000-00-00 00:00:00'),(236,'TS','Túnez','2015-08-31 15:46:56','0000-00-00 00:00:00'),(237,'EZ','Turkmenistán','2015-08-31 15:46:56','0000-00-00 00:00:00'),(238,'TC','Turquía','2015-08-31 15:46:56','0000-00-00 00:00:00'),(239,'T2','Tuvalu','0000-00-00 00:00:00','0000-00-00 00:00:00'),(240,'5X','Uganda','0000-00-00 00:00:00','0000-00-00 00:00:00'),(241,'UR','Ucrania','0000-00-00 00:00:00','0000-00-00 00:00:00'),(242,'CX','Uruguay','0000-00-00 00:00:00','0000-00-00 00:00:00'),(244,'UK','Uzbekistán','2015-08-31 15:46:56','0000-00-00 00:00:00'),(245,'YJ','Vanuatu','0000-00-00 00:00:00','0000-00-00 00:00:00'),(246,'YV','Venezuela','0000-00-00 00:00:00','0000-00-00 00:00:00'),(247,'VN','Vietnam','0000-00-00 00:00:00','0000-00-00 00:00:00'),(248,'7O','Yemen','0000-00-00 00:00:00','0000-00-00 00:00:00'),(249,'J2','Yibuti','0000-00-00 00:00:00','0000-00-00 00:00:00'),(250,'9J','Zambia','0000-00-00 00:00:00','0000-00-00 00:00:00'),(251,'Z','Zimbabue','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `nacionalidad_matriculas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nacionalidad_vuelos`
--

DROP TABLE IF EXISTS `nacionalidad_vuelos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nacionalidad_vuelos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `siglas` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nacionalidad_vuelos`
--

LOCK TABLES `nacionalidad_vuelos` WRITE;
/*!40000 ALTER TABLE `nacionalidad_vuelos` DISABLE KEYS */;
INSERT INTO `nacionalidad_vuelos` VALUES (1,'V','Nacional','2015-10-06 02:13:59','2015-10-06 02:13:59'),(2,'I','Internacional','2015-10-06 02:14:12','2015-10-06 02:14:12');
/*!40000 ALTER TABLE `nacionalidad_vuelos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `otros_cargos`
--

DROP TABLE IF EXISTS `otros_cargos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `otros_cargos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_cargo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `precio_cargo` double(8,2) NOT NULL,
  `aeropuerto_id` int(10) unsigned NOT NULL,
  `conceptoCredito_id` int(10) unsigned DEFAULT NULL,
  `conceptoContado_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `otros_cargos_aeropuerto_id_foreign` (`aeropuerto_id`),
  KEY `otros_cargos_conceptocredito_id_foreign` (`conceptoCredito_id`),
  KEY `otros_cargos_conceptocontado_id_foreign` (`conceptoContado_id`),
  CONSTRAINT `otros_cargos_conceptocontado_id_foreign` FOREIGN KEY (`conceptoContado_id`) REFERENCES `conceptos` (`id`),
  CONSTRAINT `otros_cargos_aeropuerto_id_foreign` FOREIGN KEY (`aeropuerto_id`) REFERENCES `aeropuertos` (`id`),
  CONSTRAINT `otros_cargos_conceptocredito_id_foreign` FOREIGN KEY (`conceptoCredito_id`) REFERENCES `conceptos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `otros_cargos`
--

LOCK TABLES `otros_cargos` WRITE;
/*!40000 ALTER TABLE `otros_cargos` DISABLE KEYS */;
/*!40000 ALTER TABLE `otros_cargos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pais`
--

DROP TABLE IF EXISTS `pais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pais` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `siglas` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=241 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pais`
--

LOCK TABLES `pais` WRITE;
/*!40000 ALTER TABLE `pais` DISABLE KEYS */;
INSERT INTO `pais` VALUES (1,'AF','Afganistan','2015-06-25 19:41:13','2015-06-25 19:41:13'),(2,'AX','Islas Gland','2015-06-25 19:41:13','2015-06-25 19:41:13'),(3,'AL','Albania','2015-06-25 19:41:13','2015-06-25 19:41:13'),(4,'DE','Alemania','2015-06-25 19:41:13','2015-06-25 19:41:13'),(5,'AD','Andorra','2015-06-25 19:41:13','2015-06-25 19:41:13'),(6,'AO','Angola','2015-06-25 19:41:13','2015-06-25 19:41:13'),(7,'AI','Anguilla','2015-06-25 19:41:13','2015-06-25 19:41:13'),(8,'AQ','Antártida','2015-06-25 19:41:13','2015-06-25 19:41:13'),(9,'AG','Antigua y Barbuda','2015-06-25 19:41:13','2015-06-25 19:41:13'),(10,'AN','Antillas Holandesas','2015-06-25 19:41:13','2015-06-25 19:41:13'),(11,'SA','Arabia Saudí','2015-06-25 19:41:13','2015-06-25 19:41:13'),(12,'DZ','Argelia','2015-06-25 19:41:13','2015-06-25 19:41:13'),(13,'AR','Argentina','2015-06-25 19:41:13','2015-06-25 19:41:13'),(14,'AM','Armenia','2015-06-25 19:41:13','2015-06-25 19:41:13'),(15,'AW','Aruba','2015-06-25 19:41:13','2015-06-25 19:41:13'),(16,'AU','Australia','2015-06-25 19:41:13','2015-06-25 19:41:13'),(17,'AT','Austria','2015-06-25 19:41:13','2015-06-25 19:41:13'),(18,'AZ','Azerbaiyán','2015-06-25 19:41:13','2015-06-25 19:41:13'),(19,'BS','Bahamas','2015-06-25 19:41:13','2015-06-25 19:41:13'),(20,'BH','Bahréin','2015-06-25 19:41:13','2015-06-25 19:41:13'),(21,'BD','Bangladesh','2015-06-25 19:41:13','2015-06-25 19:41:13'),(22,'BB','Barbados','2015-06-25 19:41:13','2015-06-25 19:41:13'),(23,'BY','Bielorrusia','2015-06-25 19:41:13','2015-06-25 19:41:13'),(24,'BE','Bélgica','2015-06-25 19:41:13','2015-06-25 19:41:13'),(25,'BZ','Belice','2015-06-25 19:41:13','2015-06-25 19:41:13'),(26,'BJ','Benin','2015-06-25 19:41:13','2015-06-25 19:41:13'),(27,'BM','Bermudas','2015-06-25 19:41:13','2015-06-25 19:41:13'),(28,'BT','Bhután','2015-06-25 19:41:13','2015-06-25 19:41:13'),(29,'BO','Bolivia','2015-06-25 19:41:13','2015-06-25 19:41:13'),(30,'BA','Bosnia y Herzegovina','2015-06-25 19:41:13','2015-06-25 19:41:13'),(31,'BW','Botsuana','2015-06-25 19:41:13','2015-06-25 19:41:13'),(32,'BV','Isla Bouvet','2015-06-25 19:41:13','2015-06-25 19:41:13'),(33,'BR','Brasil','2015-06-25 19:41:13','2015-06-25 19:41:13'),(34,'BN','Brunéi','2015-06-25 19:41:13','2015-06-25 19:41:13'),(35,'BG','Bulgaria','2015-06-25 19:41:13','2015-06-25 19:41:13'),(36,'BF','Burkina Faso','2015-06-25 19:41:13','2015-06-25 19:41:13'),(37,'BI','Burundi','2015-06-25 19:41:13','2015-06-25 19:41:13'),(38,'CV','Cabo Verde','2015-06-25 19:41:13','2015-06-25 19:41:13'),(39,'KY','Islas Caimán','2015-06-25 19:41:13','2015-06-25 19:41:13'),(40,'KH','Camboya','2015-06-25 19:41:13','2015-06-25 19:41:13'),(41,'CM','Camerún','2015-06-25 19:41:13','2015-06-25 19:41:13'),(42,'CA','Canadá','2015-06-25 19:41:13','2015-06-25 19:41:13'),(43,'CF','República Centroafricana','2015-06-25 19:41:13','2015-06-25 19:41:13'),(44,'TD','Chad','2015-06-25 19:41:13','2015-06-25 19:41:13'),(45,'CZ','República Checa','2015-06-25 19:41:13','2015-06-25 19:41:13'),(46,'CL','Chile','2015-06-25 19:41:13','2015-06-25 19:41:13'),(47,'CN','China','2015-06-25 19:41:13','2015-06-25 19:41:13'),(48,'CY','Chipre','2015-06-25 19:41:13','2015-06-25 19:41:13'),(49,'CX','Isla de Navidad','2015-06-25 19:41:13','2015-06-25 19:41:13'),(50,'VA','Ciudad del Vaticano','2015-06-25 19:41:13','2015-06-25 19:41:13'),(51,'CC','Islas Cocos','2015-06-25 19:41:13','2015-06-25 19:41:13'),(52,'CO','Colombia','2015-06-25 19:41:13','2015-06-25 19:41:13'),(53,'KM','Comoras','2015-06-25 19:41:13','2015-06-25 19:41:13'),(54,'CD','República Democrática del Congo','2015-06-25 19:41:13','2015-06-25 19:41:13'),(55,'CG','Congo','2015-06-25 19:41:13','2015-06-25 19:41:13'),(56,'CK','Islas Cook','2015-06-25 19:41:13','2015-06-25 19:41:13'),(57,'KP','Corea del Norte','2015-06-25 19:41:13','2015-06-25 19:41:13'),(58,'KR','Corea del Sur','2015-06-25 19:41:13','2015-06-25 19:41:13'),(59,'CI','Costa de Marfil','2015-06-25 19:41:13','2015-06-25 19:41:13'),(60,'CR','Costa Rica','2015-06-25 19:41:13','2015-06-25 19:41:13'),(61,'HR','Croacia','2015-06-25 19:41:13','2015-06-25 19:41:13'),(62,'CU','Cuba','2015-06-25 19:41:13','2015-06-25 19:41:13'),(63,'DK','Dinamarca','2015-06-25 19:41:13','2015-06-25 19:41:13'),(64,'DM','Dominica','2015-06-25 19:41:13','2015-06-25 19:41:13'),(65,'DO','República Dominicana','2015-06-25 19:41:13','2015-06-25 19:41:13'),(66,'EC','Ecuador','2015-06-25 19:41:13','2015-06-25 19:41:13'),(67,'EG','Egipto','2015-06-25 19:41:13','2015-06-25 19:41:13'),(68,'SV','El Salvador','2015-06-25 19:41:13','2015-06-25 19:41:13'),(69,'AE','Emiratos Árabes Unidos','2015-06-25 19:41:13','2015-06-25 19:41:13'),(70,'ER','Eritrea','2015-06-25 19:41:13','2015-06-25 19:41:13'),(71,'SK','Eslovaquia','2015-06-25 19:41:13','2015-06-25 19:41:13'),(72,'SI','Eslovenia','2015-06-25 19:41:13','2015-06-25 19:41:13'),(73,'ES','España','2015-06-25 19:41:13','2015-06-25 19:41:13'),(74,'UM','Islas ultramarinas de Estados Unidos','2015-06-25 19:41:13','2015-06-25 19:41:13'),(75,'US','Estados Unidos','2015-06-25 19:41:13','2015-06-25 19:41:13'),(76,'EE','Estonia','2015-06-25 19:41:13','2015-06-25 19:41:13'),(77,'ET','Etiopía','2015-06-25 19:41:13','2015-06-25 19:41:13'),(78,'FO','Islas Feroe','2015-06-25 19:41:13','2015-06-25 19:41:13'),(79,'PH','Filipinas','2015-06-25 19:41:13','2015-06-25 19:41:13'),(80,'FI','Finlandia','2015-06-25 19:41:13','2015-06-25 19:41:13'),(81,'FJ','Fiyi','2015-06-25 19:41:13','2015-06-25 19:41:13'),(82,'FR','Francia','2015-06-25 19:41:13','2015-06-25 19:41:13'),(83,'GA','Gabón','2015-06-25 19:41:13','2015-06-25 19:41:13'),(84,'GM','Gambia','2015-06-25 19:41:13','2015-06-25 19:41:13'),(85,'GE','Georgia','2015-06-25 19:41:13','2015-06-25 19:41:13'),(86,'GS','Islas Georgias del Sur y Sandwich del Sur','2015-06-25 19:41:13','2015-06-25 19:41:13'),(87,'GH','Ghana','2015-06-25 19:41:13','2015-06-25 19:41:13'),(88,'GI','Gibraltar','2015-06-25 19:41:13','2015-06-25 19:41:13'),(89,'GD','Granada','2015-06-25 19:41:13','2015-06-25 19:41:13'),(90,'GR','Grecia','2015-06-25 19:41:13','2015-06-25 19:41:13'),(91,'GL','Groenlandia','2015-06-25 19:41:13','2015-06-25 19:41:13'),(92,'GP','Guadalupe','2015-06-25 19:41:13','2015-06-25 19:41:13'),(93,'GU','Guam','2015-06-25 19:41:13','2015-06-25 19:41:13'),(94,'GT','Guatemala','2015-06-25 19:41:13','2015-06-25 19:41:13'),(95,'GF','Guayana Francesa','2015-06-25 19:41:13','2015-06-25 19:41:13'),(96,'GN','Guinea','2015-06-25 19:41:13','2015-06-25 19:41:13'),(97,'GQ','Guinea Ecuatorial','2015-06-25 19:41:13','2015-06-25 19:41:13'),(98,'GW','Guinea-Bissau','2015-06-25 19:41:13','2015-06-25 19:41:13'),(99,'GY','Guyana','2015-06-25 19:41:13','2015-06-25 19:41:13'),(100,'HT','Haití','2015-06-25 19:41:13','2015-06-25 19:41:13'),(101,'HM','Islas Heard y McDonald','2015-06-25 19:41:13','2015-06-25 19:41:13'),(102,'HN','Honduras','2015-06-25 19:41:13','2015-06-25 19:41:13'),(103,'HK','Hong Kong','2015-06-25 19:41:13','2015-06-25 19:41:13'),(104,'HU','Hungría','2015-06-25 19:41:13','2015-06-25 19:41:13'),(105,'IN','India','2015-06-25 19:41:13','2015-06-25 19:41:13'),(106,'ID','Indonesia','2015-06-25 19:41:13','2015-06-25 19:41:13'),(107,'IR','Irán','2015-06-25 19:41:13','2015-06-25 19:41:13'),(108,'IQ','Iraq','2015-06-25 19:41:13','2015-06-25 19:41:13'),(109,'IE','Irlanda','2015-06-25 19:41:13','2015-06-25 19:41:13'),(110,'IS','Islandia','2015-06-25 19:41:13','2015-06-25 19:41:13'),(111,'IL','Israel','2015-06-25 19:41:13','2015-06-25 19:41:13'),(112,'IT','Italia','2015-06-25 19:41:13','2015-06-25 19:41:13'),(113,'JM','Jamaica','2015-06-25 19:41:13','2015-06-25 19:41:13'),(114,'JP','Japón','2015-06-25 19:41:13','2015-06-25 19:41:13'),(115,'JO','Jordania','2015-06-25 19:41:13','2015-06-25 19:41:13'),(116,'KZ','Kazajstán','2015-06-25 19:41:13','2015-06-25 19:41:13'),(117,'KE','Kenia','2015-06-25 19:41:13','2015-06-25 19:41:13'),(118,'KG','Kirguistán','2015-06-25 19:41:13','2015-06-25 19:41:13'),(119,'KI','Kiribati','2015-06-25 19:41:13','2015-06-25 19:41:13'),(120,'KW','Kuwait','2015-06-25 19:41:13','2015-06-25 19:41:13'),(121,'LA','Laos','2015-06-25 19:41:13','2015-06-25 19:41:13'),(122,'LS','Lesotho','2015-06-25 19:41:13','2015-06-25 19:41:13'),(123,'LV','Letonia','2015-06-25 19:41:13','2015-06-25 19:41:13'),(124,'LB','Líbano','2015-06-25 19:41:13','2015-06-25 19:41:13'),(125,'LR','Liberia','2015-06-25 19:41:13','2015-06-25 19:41:13'),(126,'LY','Libia','2015-06-25 19:41:13','2015-06-25 19:41:13'),(127,'LI','Liechtenstein','2015-06-25 19:41:13','2015-06-25 19:41:13'),(128,'LT','Lituania','2015-06-25 19:41:13','2015-06-25 19:41:13'),(129,'LU','Luxemburgo','2015-06-25 19:41:13','2015-06-25 19:41:13'),(130,'MO','Macao','2015-06-25 19:41:13','2015-06-25 19:41:13'),(131,'MK','ARY Macedonia','2015-06-25 19:41:13','2015-06-25 19:41:13'),(132,'MG','Madagascar','2015-06-25 19:41:13','2015-06-25 19:41:13'),(133,'MY','Malasia','2015-06-25 19:41:13','2015-06-25 19:41:13'),(134,'MW','Malawi','2015-06-25 19:41:13','2015-06-25 19:41:13'),(135,'MV','Maldivas','2015-06-25 19:41:13','2015-06-25 19:41:13'),(136,'ML','Malí','2015-06-25 19:41:13','2015-06-25 19:41:13'),(137,'MT','Malta','2015-06-25 19:41:13','2015-06-25 19:41:13'),(138,'FK','Islas Malvinas','2015-06-25 19:41:13','2015-06-25 19:41:13'),(139,'MP','Islas Marianas del Norte','2015-06-25 19:41:13','2015-06-25 19:41:13'),(140,'MA','Marruecos','2015-06-25 19:41:13','2015-06-25 19:41:13'),(141,'MH','Islas Marshall','2015-06-25 19:41:13','2015-06-25 19:41:13'),(142,'MQ','Martinica','2015-06-25 19:41:13','2015-06-25 19:41:13'),(143,'MU','Mauricio','2015-06-25 19:41:13','2015-06-25 19:41:13'),(144,'MR','Mauritania','2015-06-25 19:41:13','2015-06-25 19:41:13'),(145,'YT','Mayotte','2015-06-25 19:41:13','2015-06-25 19:41:13'),(146,'MX','México','2015-06-25 19:41:13','2015-06-25 19:41:13'),(147,'FM','Micronesia','2015-06-25 19:41:13','2015-06-25 19:41:13'),(148,'MD','Moldavia','2015-06-25 19:41:13','2015-06-25 19:41:13'),(149,'MC','Mónaco','2015-06-25 19:41:13','2015-06-25 19:41:13'),(150,'MN','Mongolia','2015-06-25 19:41:13','2015-06-25 19:41:13'),(151,'MS','Montserrat','2015-06-25 19:41:13','2015-06-25 19:41:13'),(152,'MZ','Mozambique','2015-06-25 19:41:13','2015-06-25 19:41:13'),(153,'MM','Myanmar','2015-06-25 19:41:13','2015-06-25 19:41:13'),(154,'NA','Namibia','2015-06-25 19:41:13','2015-06-25 19:41:13'),(155,'NR','Nauru','2015-06-25 19:41:13','2015-06-25 19:41:13'),(156,'NP','Nepal','2015-06-25 19:41:13','2015-06-25 19:41:13'),(157,'NI','Nicaragua','2015-06-25 19:41:13','2015-06-25 19:41:13'),(158,'NE','Níger','2015-06-25 19:41:13','2015-06-25 19:41:13'),(159,'NG','Nigeria','2015-06-25 19:41:13','2015-06-25 19:41:13'),(160,'NU','Niue','2015-06-25 19:41:13','2015-06-25 19:41:13'),(161,'NF','Isla Norfolk','2015-06-25 19:41:13','2015-06-25 19:41:13'),(162,'NO','Noruega','2015-06-25 19:41:13','2015-06-25 19:41:13'),(163,'NC','Nueva Caledonia','2015-06-25 19:41:13','2015-06-25 19:41:13'),(164,'NZ','Nueva Zelanda','2015-06-25 19:41:13','2015-06-25 19:41:13'),(165,'OM','Omán','2015-06-25 19:41:13','2015-06-25 19:41:13'),(166,'NL','Países Bajos','2015-06-25 19:41:13','2015-06-25 19:41:13'),(167,'PK','Pakistán','2015-06-25 19:41:13','2015-06-25 19:41:13'),(168,'PW','Palau','2015-06-25 19:41:13','2015-06-25 19:41:13'),(169,'PS','Palestina','2015-06-25 19:41:13','2015-06-25 19:41:13'),(170,'PA','Panamá','2015-06-25 19:41:13','2015-06-25 19:41:13'),(171,'PG','Papúa Nueva Guinea','2015-06-25 19:41:13','2015-06-25 19:41:13'),(172,'PY','Paraguay','2015-06-25 19:41:13','2015-06-25 19:41:13'),(173,'PE','Perú','2015-06-25 19:41:13','2015-06-25 19:41:13'),(174,'PN','Islas Pitcairn','2015-06-25 19:41:13','2015-06-25 19:41:13'),(175,'PF','Polinesia Francesa','2015-06-25 19:41:13','2015-06-25 19:41:13'),(176,'PL','Polonia','2015-06-25 19:41:13','2015-06-25 19:41:13'),(177,'PT','Portugal','2015-06-25 19:41:13','2015-06-25 19:41:13'),(178,'PR','Puerto Rico','2015-06-25 19:41:13','2015-06-25 19:41:13'),(179,'QA','Qatar','2015-06-25 19:41:13','2015-06-25 19:41:13'),(180,'GB','Reino Unido','2015-06-25 19:41:13','2015-06-25 19:41:13'),(181,'RE','Reunión','2015-06-25 19:41:13','2015-06-25 19:41:13'),(182,'RW','Ruanda','2015-06-25 19:41:13','2015-06-25 19:41:13'),(183,'RO','Rumania','2015-06-25 19:41:13','2015-06-25 19:41:13'),(184,'RU','Rusia','2015-06-25 19:41:13','2015-06-25 19:41:13'),(185,'EH','Sahara Occidental','2015-06-25 19:41:13','2015-06-25 19:41:13'),(186,'SB','Islas Salomón','2015-06-25 19:41:13','2015-06-25 19:41:13'),(187,'WS','Samoa','2015-06-25 19:41:13','2015-06-25 19:41:13'),(188,'AS','Samoa Americana','2015-06-25 19:41:13','2015-06-25 19:41:13'),(189,'KN','San Cristóbal y Nevis','2015-06-25 19:41:13','2015-06-25 19:41:13'),(190,'SM','San Marino','2015-06-25 19:41:13','2015-06-25 19:41:13'),(191,'PM','San Pedro y Miquelón','2015-06-25 19:41:13','2015-06-25 19:41:13'),(192,'VC','San Vicente y las Granadinas','2015-06-25 19:41:13','2015-06-25 19:41:13'),(193,'SH','Santa Helena','2015-06-25 19:41:13','2015-06-25 19:41:13'),(194,'LC','Santa Lucía','2015-06-25 19:41:13','2015-06-25 19:41:13'),(195,'ST','Santo Tomé y Príncipe','2015-06-25 19:41:13','2015-06-25 19:41:13'),(196,'SN','Senegal','2015-06-25 19:41:13','2015-06-25 19:41:13'),(197,'CS','Serbia y Montenegro','2015-06-25 19:41:13','2015-06-25 19:41:13'),(198,'SC','Seychelles','2015-06-25 19:41:13','2015-06-25 19:41:13'),(199,'SL','Sierra Leona','2015-06-25 19:41:13','2015-06-25 19:41:13'),(200,'SG','Singapur','2015-06-25 19:41:13','2015-06-25 19:41:13'),(201,'SY','Siria','2015-06-25 19:41:13','2015-06-25 19:41:13'),(202,'SO','Somalia','2015-06-25 19:41:13','2015-06-25 19:41:13'),(203,'LK','Sri Lanka','2015-06-25 19:41:13','2015-06-25 19:41:13'),(204,'SZ','Suazilandia','2015-06-25 19:41:13','2015-06-25 19:41:13'),(205,'ZA','Sudáfrica','2015-06-25 19:41:13','2015-06-25 19:41:13'),(206,'SD','Sudán','2015-06-25 19:41:13','2015-06-25 19:41:13'),(207,'SE','Suecia','2015-06-25 19:41:13','2015-06-25 19:41:13'),(208,'CH','Suiza','2015-06-25 19:41:13','2015-06-25 19:41:13'),(209,'SR','Surinam','2015-06-25 19:41:13','2015-06-25 19:41:13'),(210,'SJ','Svalbard y Jan Mayen','2015-06-25 19:41:13','2015-06-25 19:41:13'),(211,'TH','Tailandia','2015-06-25 19:41:13','2015-06-25 19:41:13'),(212,'TW','Taiwán','2015-06-25 19:41:13','2015-06-25 19:41:13'),(213,'TZ','Tanzania','2015-06-25 19:41:13','2015-06-25 19:41:13'),(214,'TJ','Tayikistán','2015-06-25 19:41:13','2015-06-25 19:41:13'),(215,'IO','Territorio Británico del Océano Índico','2015-06-25 19:41:13','2015-06-25 19:41:13'),(216,'TF','Territorios Australes Franceses','2015-06-25 19:41:13','2015-06-25 19:41:13'),(217,'TL','Timor Oriental','2015-06-25 19:41:13','2015-06-25 19:41:13'),(218,'TG','Togo','2015-06-25 19:41:13','2015-06-25 19:41:13'),(219,'TK','Tokelau','2015-06-25 19:41:13','2015-06-25 19:41:13'),(220,'TO','Tonga','2015-06-25 19:41:13','2015-06-25 19:41:13'),(221,'TT','Trinidad y Tobago','2015-06-25 19:41:13','2015-06-25 19:41:13'),(222,'TN','Túnez','2015-06-25 19:41:13','2015-06-25 19:41:13'),(223,'TC','Islas Turcas y Caicos','2015-06-25 19:41:13','2015-06-25 19:41:13'),(224,'TM','Turkmenistán','2015-06-25 19:41:13','2015-06-25 19:41:13'),(225,'TR','Turquía','2015-06-25 19:41:13','2015-06-25 19:41:13'),(226,'TV','Tuvalu','2015-06-25 19:41:13','2015-06-25 19:41:13'),(227,'UA','Ucrania','2015-06-25 19:41:13','2015-06-25 19:41:13'),(228,'UG','Uganda','2015-06-25 19:41:13','2015-06-25 19:41:13'),(229,'UY','Uruguay','2015-06-25 19:41:13','2015-06-25 19:41:13'),(230,'UZ','Uzbekistán','2015-06-25 19:41:13','2015-06-25 19:41:13'),(231,'VU','Vanuatu','2015-06-25 19:41:13','2015-06-25 19:41:13'),(232,'VE','Venezuela','2015-06-25 19:41:13','2015-06-25 19:41:13'),(233,'VN','Vietnam','2015-06-25 19:41:13','2015-06-25 19:41:13'),(234,'VG','Islas Vírgenes Británicas','2015-06-25 19:41:13','2015-06-25 19:41:13'),(235,'VI','Islas Vírgenes de los Estados Unidos','2015-06-25 19:41:13','2015-06-25 19:41:13'),(236,'WF','Wallis y Futuna','2015-06-25 19:41:13','2015-06-25 19:41:13'),(237,'YE','Yemen','2015-06-25 19:41:13','2015-06-25 19:41:13'),(238,'DJ','Yibuti','2015-06-25 19:41:13','2015-06-25 19:41:13'),(239,'ZM','Zambia','2015-06-25 19:41:13','2015-06-25 19:41:13'),(240,'ZW','Zimbabue','2015-06-25 19:41:13','2015-06-25 19:41:13');
/*!40000 ALTER TABLE `pais` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`),
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES (25,3,1,'2015-09-01 19:14:15','2015-09-01 19:14:15'),(27,5,1,'2015-09-01 19:14:15','2015-09-01 19:14:15'),(29,13,1,'2015-09-01 19:14:15','2015-09-01 19:14:15'),(31,14,1,'2015-09-01 19:14:15','2015-09-01 19:14:15'),(34,4,1,'2015-09-01 19:14:15','2015-09-01 19:14:15'),(37,11,1,'2015-09-01 19:14:15','2015-09-01 19:14:15'),(38,7,2,'2015-09-02 00:34:18','2015-09-02 00:34:18'),(39,9,2,'2015-09-02 00:34:18','2015-09-02 00:34:18'),(40,10,2,'2015-09-02 00:34:18','2015-09-02 00:34:18'),(41,6,2,'2015-09-02 00:34:18','2015-09-02 00:34:18'),(42,8,2,'2015-09-02 00:34:18','2015-09-02 00:34:18'),(43,7,1,'2015-09-02 01:16:44','2015-09-02 01:16:44'),(44,12,1,'2015-09-02 01:17:12','2015-09-02 01:17:12'),(45,1,1,'2015-09-02 01:17:12','2015-09-02 01:17:12'),(46,2,1,'2015-09-02 01:17:12','2015-09-02 01:17:12'),(47,9,1,'2015-09-02 01:17:12','2015-09-02 01:17:12'),(48,10,1,'2015-09-02 01:17:12','2015-09-02 01:17:12'),(49,6,1,'2015-09-02 01:17:12','2015-09-02 01:17:12'),(50,8,1,'2015-09-02 01:17:12','2015-09-02 01:17:12'),(51,3,3,'2015-09-02 01:19:32','2015-09-02 01:19:32'),(52,12,3,'2015-09-02 01:19:32','2015-09-02 01:19:32'),(53,5,3,'2015-09-02 01:19:32','2015-09-02 01:19:32'),(54,1,3,'2015-09-02 01:19:32','2015-09-02 01:19:32'),(55,2,3,'2015-09-02 01:19:32','2015-09-02 01:19:32'),(57,4,3,'2015-09-02 01:19:32','2015-09-02 01:19:32'),(58,15,1,'2015-10-05 18:38:09','2015-10-05 18:38:09'),(59,17,1,'2015-10-05 18:38:09','2015-10-05 18:38:09'),(60,16,1,'2015-10-05 18:38:09','2015-10-05 18:38:09'),(61,18,2,'2015-10-10 00:54:39','2015-10-10 00:54:39'),(62,18,1,'2015-10-10 00:54:46','2015-10-10 00:54:46'),(63,19,1,'2015-12-10 02:05:30','2015-12-10 02:05:30'),(64,21,1,'2015-12-10 02:05:30','2015-12-10 02:05:30'),(65,20,1,'2015-12-10 02:05:30','2015-12-10 02:05:30'),(66,22,1,'2015-12-10 02:05:30','2015-12-10 02:05:30'),(67,15,2,'2015-12-16 18:14:07','2015-12-16 18:14:07'),(68,17,2,'2015-12-16 18:14:07','2015-12-16 18:14:07'),(69,16,2,'2015-12-16 18:14:07','2015-12-16 18:14:07'),(70,20,2,'2015-12-16 18:14:07','2015-12-16 18:14:07'),(71,23,2,'2015-12-16 18:14:07','2015-12-16 18:14:07'),(72,1,4,'2016-01-05 19:54:09','2016-01-05 19:54:09'),(73,3,2,'2016-01-05 23:21:20','2016-01-05 23:21:20'),(74,2,2,'2016-01-11 19:58:55','2016-01-11 19:58:55'),(75,7,5,'2016-01-11 23:38:30','2016-01-11 23:38:30'),(76,15,5,'2016-01-11 23:38:30','2016-01-11 23:38:30'),(77,17,5,'2016-01-11 23:38:30','2016-01-11 23:38:30'),(78,3,5,'2016-01-11 23:38:30','2016-01-11 23:38:30'),(80,16,5,'2016-01-11 23:38:30','2016-01-11 23:38:30'),(81,9,5,'2016-01-11 23:38:30','2016-01-11 23:38:30'),(82,10,5,'2016-01-11 23:38:30','2016-01-11 23:38:30'),(83,6,5,'2016-01-11 23:38:30','2016-01-11 23:38:30'),(84,8,5,'2016-01-11 23:38:30','2016-01-11 23:38:30'),(85,20,5,'2016-01-11 23:38:30','2016-01-11 23:38:30');
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_usuario`
--

DROP TABLE IF EXISTS `permission_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_usuario` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `usuario_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `permission_usuario_permission_id_index` (`permission_id`),
  KEY `permission_usuario_usuario_id_index` (`usuario_id`),
  CONSTRAINT `permission_usuario_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_usuario_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_usuario`
--

LOCK TABLES `permission_usuario` WRITE;
/*!40000 ALTER TABLE `permission_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'Menu contrato','menu.contrato',NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'Menu factura','menu.factura',NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'Menu cliente','menu.cliente',NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,'Menu modulo','menu.modulo',NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,'Menu concepto','menu.concepto',NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,'Menu pilotos','menu.piloto',NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(7,'Menu aeronaves','menu.aeronave',NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(8,'Menu puertos','menu.puerto',NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(9,'Menu hangares','menu.hangar',NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(10,'Menu modelo aeronave','menu.modeloaeronave',NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(11,'Menu usuario','menu.usuario',NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(12,'Menu cobranza','menu.cobranza',NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(13,'Menu estacionamiento','menu.estacionamiento',NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(14,'Menu grupos de usuario','menu.role',NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(15,'Menu Aterrizaje','menu.aterrizaje',NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(16,'Menu Despegue','menu.despegue',NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(17,'Menu Carga','menu.carga',NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(18,'Menu Configuración de Precios SCV','menu.preciosSCV',NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(19,'Menú Información','menu.informacion',NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(20,'Menú Reportes SCV','menu.reporteSCV',NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(21,'Menú Reportes Recaudación','menu.reporteRecaudacion',NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(22,'Menú Tasas','menu.tasas',NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(23,'Menú Systas','menu.systas',NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pilotos`
--

DROP TABLE IF EXISTS `pilotos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pilotos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nacionalidad_id` int(10) unsigned NOT NULL,
  `documento_identidad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `licencia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `pilotos_nacionalidad_id_foreign` (`nacionalidad_id`),
  CONSTRAINT `pilotos_nacionalidad_id_foreign` FOREIGN KEY (`nacionalidad_id`) REFERENCES `pais` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=196 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pilotos`
--

LOCK TABLES `pilotos` WRITE;
/*!40000 ALTER TABLE `pilotos` DISABLE KEYS */;
INSERT INTO `pilotos` VALUES (6,'ABREU RODRIGUEZ RAUL',232,'11061864','04241312040','11061864',1,'2015-09-02 01:59:37','2016-01-10 20:54:11'),(7,'VELASQUES JOSE',232,'2980419','','2980419',1,'2015-09-03 01:16:40','2015-09-03 01:16:40'),(8,'RADOMIR ALEKSIC',232,'4437969','','4437969',1,'2015-09-03 20:08:31','2015-09-03 20:08:31'),(9,'SILVA JOSE',232,'8176555','','8176555',1,'2015-09-03 20:10:44','2015-09-03 20:13:34'),(10,'VILLA JOSE',232,'8378052','','8378052',1,'2015-09-03 20:11:45','2015-09-03 20:13:48'),(11,'KABBABE JORGE',232,'8436081','','8436081',1,'2015-09-03 20:12:44','2015-09-03 20:13:16'),(12,'HERNANDEZ GERONIMO',232,'10582334','','10582334',1,'2015-09-03 20:14:56','2015-09-03 20:14:56'),(13,'CASTILLO JAIRO',232,'10630006','','10630006',1,'2015-09-03 20:15:58','2015-09-03 20:15:58'),(14,'GONZALEZ CARLOS',232,'14917644','','14917644',1,'2015-09-03 20:16:47','2015-09-03 20:16:47'),(15,'JIMENEZ OMAR',232,'17837581','','17837581',1,'2015-09-03 20:17:45','2015-09-03 20:17:45'),(16,'GUIA ALEJANDRO',232,'23565494','','23565494',1,'2015-09-03 20:27:01','2015-09-03 20:27:01'),(17,'ALVAREZ RICCIUTI MICKHAIL CAMILO',232,'13325677','04122880318','13325677',1,'2015-09-03 20:30:57','2015-09-03 20:31:37'),(18,'AMER FAUZI YORDI SOUKI',232,'15327442','04123100213','15327442',1,'2015-09-03 20:33:02','2015-09-03 20:33:28'),(19,'BAFFONE SOGAMOSO VINCENZO',232,'6975871','04143651019','6975871',1,'2015-09-03 20:35:13','2015-09-03 20:35:38'),(20,'CISNEROS PERFETTI ELIO ANTONIO',232,'10568561','04141555353','10568561',1,'2015-09-03 20:37:40','2015-09-03 20:38:06'),(21,'CORNET CAYAMA JESUS RAFAEL',232,'4177877','04142398877','4177877',1,'2015-09-03 20:39:14','2015-09-03 20:39:56'),(22,'COTTIN MENDOZA EDUARDO ENRIQUE',232,'11306456','04142821258','11306456',1,'2015-09-03 20:40:58','2015-09-03 20:41:25'),(23,'DE VITA JOYCE GIANFRANCO JORGE',232,'5532284','04142560662','5532284',1,'2015-09-03 20:43:26','2015-09-03 20:47:57'),(24,'DEGOUT PELAEZ GUILLERMO ANTONIO',232,'3888287','04241311033','3888287',1,'2015-09-03 20:48:51','2015-09-03 20:49:17'),(25,'EDUARDO GONZALEZ HAROLD JESUS',232,'14567397','04126083856','14567397',1,'2015-09-03 20:51:12','2015-09-03 20:51:34'),(26,'GARCIA MORILLOCARLOS ENRIQUE',232,'5093045','04142405068','5093045',1,'2015-09-03 20:53:25','2015-09-03 20:54:07'),(27,'GONZALEZ SABAL FELIPE ALBERTO',232,'3478445','04143321341','3478445',1,'2015-09-03 20:55:10','2015-09-03 20:55:31'),(28,'HEVER PLAZA GUILLERMO ALFREDO',232,'4559273','04129911570','4559273',1,'2015-09-03 20:56:37','2015-09-03 20:57:00'),(29,'LAGARDERA LOZANO ANGEL DAVID',232,'14201847','04142495621','14201847',1,'2015-09-03 20:58:04','2015-09-03 20:58:24'),(30,'LANDAETA MONZON JESUS EDUARDO',232,'5519233','04146246151','5519233',1,'2015-09-03 20:59:42','2015-09-03 21:01:27'),(31,'MEDINA SILVERIO JORGE LUIS',232,'5406859','04141293680','5406859',1,'2015-09-03 21:02:42','2015-09-03 21:02:59'),(36,'MIRANDA RAMOS CESAR MIGUEL',232,'5940813','04142709710','5940813',1,'2015-09-04 01:42:57','2015-09-04 01:42:57'),(37,'MONTIEL PARRA LEONARDO RAFAEL',232,'15162272','04146715656','15162272',1,'2015-09-05 00:51:19','2015-09-05 00:51:19'),(38,'NARANJO TOVAR CARLOS JOSE',232,'3562587','04141199019','3562587',1,'2015-09-05 00:52:57','2015-09-05 00:52:57'),(39,'OCONNOR JAVIER',232,'4251408','04168994568','4251408',1,'2015-09-05 00:55:41','2015-09-05 00:55:41'),(40,'PEREZ CRUZ MANUEL DARIO',232,'7991335','04147877678','7991335',1,'2015-09-05 00:57:16','2015-09-05 00:57:16'),(41,'PEREZ LUNA COLINA ALEXIS',232,'12626563','04167022937','12626563',1,'2015-09-05 00:59:00','2015-09-05 00:59:00'),(42,'PORTILLO GONZALEZ ERNESTO JOSE',232,'14369112','04146098900','14369112',1,'2015-09-05 01:00:24','2015-09-05 01:00:24'),(43,'POSADAS JESUS',232,'10788282','04129638096','10788282',1,'2015-09-05 01:01:52','2015-09-05 01:01:53'),(44,'PRADA PAVEL',232,'4556796','04267166755','4556796',1,'2015-09-05 01:03:12','2015-09-05 01:03:12'),(45,'QUINTERO TRUJILLO HUGO',232,'16330706','04141959036','16330706',1,'2015-09-05 01:04:44','2015-09-05 01:04:44'),(46,'REYES LUIS',232,'10584716','04122286000','10584716',1,'2015-09-05 01:05:51','2015-09-05 01:05:52'),(47,'ROMERO ACOSTA',232,'4357954','04142780517','4357954',1,'2015-09-05 01:07:11','2015-09-05 01:07:11'),(48,'SANOJA OLIVIERI ALEXIS ANTONIO',232,'2906578','04148892366','2906578',1,'2015-09-05 01:08:35','2015-09-05 01:08:35'),(49,'SARDI TANCREDI VICTOR EDUARDO',232,'11225530','04123397907','11225530',1,'2015-09-05 01:09:51','2015-09-05 01:09:51'),(50,'SOSA UTRERA ALEXIS ANTONIO',232,'10389436','04148773806','10389436',1,'2015-09-05 01:11:22','2015-09-05 01:11:23'),(51,'SCHELLING VALLENILLA JORGE ERNESTO',232,'4006103','04143573134','4006103',1,'2015-09-05 01:12:54','2015-09-05 01:12:54'),(52,'VECCHIONE BELLO PEDRO PABLO',232,'3725524','04144040856','3725524',1,'2015-09-05 01:14:22','2015-09-05 01:14:22'),(53,'YAGUARACUTO MANUEL',232,'14187680','04148059901','14187680',1,'2015-09-05 01:16:41','2015-09-05 01:16:41'),(54,'ZAPATA NAHMENS',232,'3182675','04142028243','3182675',1,'2015-09-05 01:18:16','2015-09-05 01:18:16'),(55,'BORTONE JOSE',232,'12626549','04142527566','12626549',1,'2015-09-05 01:53:36','2015-09-05 01:53:36'),(57,'LANZON EDGAR',232,'11059497','','11059497',1,'2015-09-07 19:51:12','2015-09-07 19:51:12'),(58,'OZONIAN ALEX',232,'12039059','','12039059',1,'2015-09-07 19:53:21','2015-09-07 19:53:21'),(59,'FERNANDEZ ',232,'9675994','','9675994',1,'2015-09-07 19:55:33','2015-09-07 19:55:33'),(60,'TAVARES PAULO',232,'18186685','','18186685',1,'2015-09-07 19:56:31','2015-09-07 19:56:31'),(61,'YUMAR IVAN',232,'13887427','','13887427',1,'2015-09-07 19:57:54','2015-09-07 19:57:54'),(62,'AGUDELO ERWIN',232,'11995910','','11995910',1,'2015-09-07 19:58:46','2015-09-07 19:58:46'),(63,'JACKSON PABLO',232,'10614582','','10614582',1,'2015-09-07 19:59:37','2015-09-07 19:59:37'),(64,'FLORES OMAR',232,'7368825','','7368825',1,'2015-09-07 20:01:07','2015-09-07 20:01:07'),(65,'SILVA MARIO',232,'13335802','','13338802',1,'2015-09-07 20:01:52','2015-09-07 20:01:52'),(66,'PARRA JOSE',232,'9609116','','9609116',1,'2015-09-07 20:02:41','2015-09-07 20:02:41'),(67,'GRATEROL JONATHAN',232,'15119777','','15119777',1,'2015-09-07 20:03:30','2015-09-07 20:03:30'),(68,'PERNALETE JOSE',232,'5096520','','5096520',1,'2015-09-07 20:04:28','2015-09-07 20:04:28'),(69,'ISSA RICARDO',232,'15931820','','15931820',1,'2015-09-07 20:05:45','2015-09-07 20:05:45'),(70,'SOSA VLADIMIR',232,'10542402','','10542402',1,'2015-09-07 20:06:46','2015-09-07 20:06:46'),(71,'CEGARRA LUIS',232,'12417605','','12417605',1,'2015-09-07 20:07:59','2015-09-07 20:07:59'),(72,'RODRIGUEZ RICARDO',232,'12568179','','12568179',1,'2015-09-07 20:09:08','2015-09-07 20:09:08'),(73,'MORBIDELLI REMO',232,'12560171','','12560171',1,'2015-09-07 20:10:08','2015-09-07 20:10:08'),(74,'BERMUDEZ HECTOR',232,'9664751','','9664751',1,'2015-09-07 20:11:02','2015-09-07 20:11:02'),(75,'CALVIÑO JOSE ',232,'7993795','','7993795',1,'2015-09-07 20:11:39','2015-09-07 20:11:39'),(76,'FORTUL JORGE',232,'11120999','','11120999',1,'2015-09-07 20:12:11','2015-09-07 20:12:11'),(77,'MILLAN GUSTAVO',232,'11028206','','11028206',1,'2015-09-07 20:20:06','2015-09-07 20:20:06'),(78,'RAMONES ALEXIS',232,'9807561','','9807561',1,'2015-09-07 20:21:16','2015-09-07 20:21:16'),(79,'CARVAJAL RIGOBERTO',232,'14197215','','14197215',1,'2015-09-07 20:22:04','2015-09-07 20:22:04'),(80,'ARIAS ALBERTO',232,'17346180','','17643180',1,'2015-09-07 20:22:45','2015-09-07 20:22:45'),(81,'CARRILLO ELIO',232,'8818257','','8818257',1,'2015-09-07 20:23:42','2015-09-07 20:23:42'),(82,'OTERO HOMER',232,'13053466','','13053466',1,'2015-09-07 20:24:35','2015-09-07 20:24:35'),(83,'SERRA HUMBERTO',232,'14129730','','14129730',1,'2015-09-07 20:25:30','2015-09-07 20:25:30'),(84,'CARRIZALES RAMON',232,'14395597','','14395597',1,'2015-09-07 20:26:17','2015-09-07 20:26:17'),(85,'GRANADOS JESUS',232,'10169569','','10169596',1,'2015-09-07 20:27:24','2015-09-07 20:27:24'),(86,'PEREIRA DANIEL',232,'9063007','','9063007',1,'2015-09-07 20:28:55','2015-09-07 20:28:55'),(87,'NAVARRO OSWALDO',232,'12260023','','12260023',1,'2015-09-07 20:29:41','2015-09-07 20:29:41'),(88,'SALAS ARTURO',232,'11033637','','11033637',1,'2015-09-07 20:30:30','2015-09-07 20:30:30'),(89,'GASPARRINI EDDY',232,'6682031','','6682031',1,'2015-09-07 20:31:16','2015-09-07 20:31:16'),(90,'CARRATU FELIX',232,'116422083','','116422083',1,'2015-09-07 20:32:05','2015-09-07 20:32:05'),(91,'FERNANDEZ CESAR',232,'15122548','','15122548',1,'2015-09-07 20:32:49','2015-09-07 20:32:49'),(92,'MARTINEZ DAVID',232,'11391024','','11391024',1,'2015-09-07 20:33:37','2015-09-07 20:33:37'),(93,'DIAZ MICHAEL',232,'11413408','','11413408',1,'2015-09-07 20:34:32','2015-09-07 20:34:32'),(94,'BITORZOLI GIOVANNI',232,'6977466','','6977466',1,'2015-09-07 20:35:18','2015-09-07 20:35:18'),(95,'TERAN ANGEL',232,'15780479','','15780479',1,'2015-09-07 20:36:00','2015-09-07 20:36:00'),(96,'MARCANO JOSE',232,'15830660','','15830660',1,'2015-09-07 20:37:12','2015-09-07 20:37:12'),(97,'SILVESTRE JOSE',232,'5967398','','5967398',1,'2015-09-07 20:38:06','2015-09-07 20:38:06'),(98,'HERNANDEZ JOSE',232,'18441491','','18441491',1,'2015-09-07 20:39:46','2015-09-07 20:39:46'),(99,'CASTILLO HECTOR',232,'12994855','','12994855',1,'2015-09-07 20:40:28','2015-09-07 20:40:28'),(100,'CELIS RUBEN',232,'9967178','','9967178',1,'2015-09-07 20:41:05','2015-09-07 20:41:05'),(101,'BETANCOURT JORGE',232,'3180391','','3180391',1,'2015-09-11 00:15:26','2015-09-11 00:15:26'),(102,'MOSQUEDA JOSE',232,'2473673','','2473673',1,'2015-09-11 00:16:07','2015-09-11 00:16:07'),(103,'BERNAL GUSTAVO',232,'3541137','','3541137',1,'2015-09-11 00:16:58','2015-09-11 00:16:58'),(104,'IRISARRI JOSE ',232,'2136658','','2136658',1,'2015-09-11 00:17:45','2015-09-11 00:17:45'),(105,'BARRAGAN HERNAN',232,'3542779','','3542779',1,'2015-09-11 00:19:02','2015-09-11 00:19:02'),(106,'KOUKOUBINOSATHAANASSIOS',232,'6191637','','6191637',1,'2015-09-11 00:20:00','2015-09-11 00:20:00'),(107,'LEON GUSTAVO',232,'3973809','','3973809',1,'2015-09-11 00:20:31','2015-09-11 00:20:31'),(108,'MORENO HUGO',232,'5570066','','5570066',1,'2015-09-11 00:21:00','2015-09-11 00:21:00'),(109,'ABREU TOMAS',232,'5577495','','5577495',1,'2015-09-11 00:21:39','2015-09-11 00:21:39'),(110,'DARRIBA JOSE',232,'9098121','','9098121',1,'2015-09-11 00:22:12','2015-09-11 00:22:12'),(111,'ANTON ANTONIO',232,'6153225','','6153225',1,'2015-09-11 00:23:06','2015-09-11 00:23:06'),(112,'RAMOS ADELSIS',232,'5299596','','5299596',1,'2015-09-11 00:23:57','2015-09-11 00:23:57'),(113,'BLANCO MANUEL',232,'6498989','','6498989',1,'2015-09-11 00:25:34','2015-09-11 00:25:34'),(114,'GRILLO FRANCISCO',232,'17705495','','17705495',1,'2015-09-11 00:26:27','2015-09-11 00:26:27'),(115,'BONILLA OSCAR',232,'11985112','','11985112',1,'2015-09-11 00:27:15','2015-09-11 00:27:15'),(116,'RAMIREZ WILFREDO',232,'15183117','','15183117',1,'2015-09-11 00:28:00','2015-09-11 00:28:00'),(117,'WHITE ANTONIO',232,'13832371','','13832271',1,'2015-09-11 00:28:39','2015-09-11 00:28:39'),(118,'MAYORCA JUAN',232,'16182296','','16182296',1,'2015-09-11 00:29:24','2015-09-11 00:29:24'),(119,'OVALLES ALEJANDRO',232,'18037618','','18037618',1,'2015-09-11 00:30:26','2015-09-11 00:30:26'),(120,'JAIMES ROBERTO',232,'637330','','637330',1,'2015-09-11 01:26:19','2015-09-11 01:26:19'),(131,'COVARRUVIAS MARCEL',232,'5533569','','5533569',1,'2016-01-06 20:01:19','2016-01-06 20:01:19'),(132,'RODRIGUEZ FERNANDO',232,'12160859','','12160859',1,'2016-01-06 20:02:26','2016-01-06 20:02:26'),(133,'HERNANDEZ JOSE',232,'11738273','','11738273',1,'2016-01-06 20:03:11','2016-01-06 20:03:11'),(134,'MONTELONGO JOSE',232,'11515355','','11515355',1,'2016-01-06 20:03:52','2016-01-06 20:03:52'),(135,'MORA GABRIEL',232,'15920263','','15920263',1,'2016-01-07 00:50:59','2016-01-07 00:50:59'),(136,'VILLARROEL SEGUNDO',232,'4118731','','4118731',1,'2016-01-07 00:52:29','2016-01-08 03:30:10'),(137,'PIZZANI FRANCISCO',232,'11064203','','11064203',1,'2016-01-07 00:54:09','2016-01-07 00:54:09'),(138,'LEON PEDRO',232,'4883370','','4883370',1,'2016-01-07 00:54:46','2016-01-07 00:54:46'),(139,'RODRIGUEZ JULIAN J.',232,'15756585','','15756585',1,'2016-01-07 00:56:18','2016-01-14 03:09:48'),(140,'FIGUERA JOSE',232,'12292508','','12292508',1,'2016-01-07 01:05:50','2016-01-07 01:05:50'),(141,'ANGEL JOSE MIGUEL',232,'7255288','','7255288',1,'2016-01-08 00:45:26','2016-01-08 00:45:26'),(142,'MARCANO BRAULIO',232,'12506281','','12506281',1,'2016-01-08 00:47:10','2016-01-08 00:47:10'),(143,'GIL MANUEL',232,'13929107','','13929107',1,'2016-01-08 03:00:31','2016-01-08 03:00:31'),(144,'AÑEZ MIGUEL',232,'12615061','','12615061',1,'2016-01-08 03:18:20','2016-01-08 03:18:20'),(145,'RODRIGUEZ RAUL',232,'20808805','','20808805',1,'2016-01-08 07:48:26','2016-01-08 07:48:26'),(146,'LARRODE ANGEL',232,'9970564','','9970564',1,'2016-01-08 07:53:19','2016-01-08 07:53:19'),(147,' LEAL LUIS',232,'6548167','','6548167',1,'2016-01-09 02:13:03','2016-01-11 01:28:22'),(148,'  CORSER LUIS',232,'6940492','','6940492',1,'2016-01-09 02:40:06','2016-01-11 01:28:01'),(149,'PLASENCIA ANTONIO',232,'15637351','','15637351',1,'2016-01-09 02:51:39','2016-01-09 02:51:39'),(150,'SOSA CARLOS',232,'13595114','','13595114',1,'2016-01-09 03:01:04','2016-01-09 03:01:04'),(151,'SEGUIAS CARLOS',232,'17163746','','17163746',1,'2016-01-09 03:50:15','2016-01-09 03:50:15'),(152,'YUNKOSA HERNAN',232,'7397758','','7397758',1,'2016-01-09 04:48:45','2016-01-09 04:48:45'),(153,'RIVAS JOWER',232,'6266110','','6266110',1,'2016-01-09 18:18:10','2016-01-09 18:18:10'),(154,'SOLIS MIGUEL',232,'12570961','','12750961',1,'2016-01-09 18:25:34','2016-01-09 18:25:34'),(155,'PANIZ JEAN MARCOS ',232,'13684963','','13684963',1,'2016-01-09 18:30:37','2016-01-09 18:30:37'),(156,'MEDINA RUBEN',232,'3578741','','3578741',1,'2016-01-10 19:59:58','2016-01-10 19:59:58'),(157,'GOMEZ JHONNY',232,'12399013','','12399013',1,'2016-01-10 20:24:09','2016-01-10 20:24:09'),(158,'CRUZ  CARLOS',232,'3244265','','3244265',1,'2016-01-10 20:27:27','2016-01-10 20:27:27'),(159,'GARCIA RAMON',232,'5021503','','5021503',1,'2016-01-10 20:31:05','2016-01-10 20:31:05'),(160,'CASTILLO LUIS',232,'6317223','','6317223',1,'2016-01-10 20:59:59','2016-01-10 20:59:59'),(161,'GOMEZ RHAMSES',232,'17270428','','17270428',1,'2016-01-11 00:51:54','2016-01-11 00:51:54'),(162,' ALVAREZ MICKHAIL',232,'13625377','','13625377',1,'2016-01-11 00:56:22','2016-01-11 00:56:22'),(163,'LONGOBARDI PAUL',232,'16273336','','16273336',1,'2016-01-11 01:01:03','2016-01-11 01:01:03'),(164,'FARFAN LUIS',232,'4561031','','4561031',1,'2016-01-11 01:29:12','2016-01-11 01:29:12'),(165,'MARINHO FRANCISCO RONAL',232,'757031','','757031',1,'2016-01-11 01:33:45','2016-01-11 01:33:45'),(166,'JIMENEZ JEAN',232,'15689931','','15689931',1,'2016-01-11 01:46:17','2016-01-11 01:46:17'),(167,'RIVAS MICHEL',232,'4639163','','4639163',1,'2016-01-11 01:49:41','2016-01-11 01:49:41'),(168,'TERAN ALEJANDRO',232,'9494629','','9494629',1,'2016-01-11 02:02:59','2016-01-11 02:02:59'),(169,'SANCHEZ JUAN',232,'4654718','','4654718',1,'2016-01-14 00:38:55','2016-01-14 00:38:55'),(170,'ROQUE NELSON',232,'3227979','','3227979',1,'2016-01-14 00:46:15','2016-01-14 00:46:15'),(171,'BARMES ROGER',232,'2342875','','2342875',1,'2016-01-14 02:03:45','2016-01-14 02:03:45'),(172,'SOSA OSCAR',232,'6896590','','6896590',1,'2016-01-14 03:19:08','2016-01-14 03:19:08'),(173,'RUIZ JOSE',232,'3207316','','3207316',1,'2016-01-14 03:33:40','2016-01-14 03:33:40'),(174,'CARIAS JULIO',232,'4035674','','4035674',1,'2016-01-14 03:49:07','2016-01-14 03:49:07'),(175,'GRANIER RAMON',232,'19840552','','19840552',1,'2016-01-14 03:52:21','2016-01-14 03:52:21'),(176,'RAMIREZ JUAN',232,'16891816','','16891816',1,'2016-01-14 17:51:31','2016-01-14 17:51:31'),(177,'JIMENEZ JHONNIER',232,'17764519','','17764519',1,'2016-01-14 18:01:24','2016-01-14 18:01:24'),(178,'ROSENQVIST HARALD',232,'11664926','','11664926',1,'2016-01-14 18:10:43','2016-01-14 18:10:43'),(179,'CALDERON ALEXIS',232,'6182198','','6182198',1,'2016-01-14 18:20:11','2016-01-14 18:20:11'),(180,'AZARA ARNALDO',232,'4546389','','4546389',1,'2016-01-14 18:25:39','2016-01-14 18:25:39'),(181,'CORDOBA JOSE',232,'3102446','','3102446',1,'2016-01-14 18:33:11','2016-01-14 18:33:11'),(182,'GHANAIN IBRAHIM',232,'18732086','','18732086',1,'2016-01-14 18:40:32','2016-01-14 18:40:32'),(183,'MILLAN ROBERT',232,'12414780','','12414780',1,'2016-01-14 18:49:27','2016-01-14 18:49:27'),(184,'MANRIQUE JESUS',232,'20673595','','20673595',1,'2016-01-14 18:55:17','2016-01-14 18:55:17'),(185,'LOSADA OSCAR',232,'6256920','','6256920',1,'2016-01-14 19:11:16','2016-01-14 19:11:16'),(186,'ARVELO JERRY',232,'13905369','','13905369',1,'2016-01-14 19:19:32','2016-01-14 19:19:32'),(187,'DINELLI DANIEL',232,'10041141','','10041141',1,'2016-01-14 19:35:46','2016-01-14 19:35:46'),(188,'GARDONA SAMUEL',232,'16945254','','16945254',1,'2016-01-14 19:41:18','2016-01-14 19:41:18'),(189,'HERNANDEZ VICTOR',232,'15005452','','15005452',1,'2016-01-14 20:06:33','2016-01-14 20:06:33'),(190,'ARIAS RAUL',232,'4384045','','4384045',1,'2016-01-14 20:25:14','2016-01-14 20:25:14'),(191,'BELANDRIA EUGENIO',232,'5428286','','5428286',1,'2016-01-14 20:29:24','2016-01-14 20:29:24'),(192,'SHAYLOR DALE',232,'8949077','','8949077',1,'2016-01-14 20:47:05','2016-01-14 20:47:05'),(193,'NAKAL NUMAN',232,'4172947','','4172947',1,'2016-01-14 20:52:45','2016-01-14 20:52:45'),(194,'AZUAJE ISRAEL',232,'17252891','','17252891',1,'2016-01-14 20:58:16','2016-01-14 20:58:16'),(195,'JAMROZ TADEO',232,'12956303','','12956303',1,'2016-01-14 21:05:21','2016-01-14 21:05:21');
/*!40000 ALTER TABLE `pilotos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `precios_aterrizajes_despegues`
--

DROP TABLE IF EXISTS `precios_aterrizajes_despegues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `precios_aterrizajes_despegues` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `eq_diurnoNac` double(8,2) NOT NULL,
  `eq_diurnoInt` double(8,2) NOT NULL,
  `eq_nocturNac` double(8,2) NOT NULL,
  `eq_nocturInt` double(8,2) NOT NULL,
  `aeropuerto_id` int(10) unsigned NOT NULL,
  `conceptoCredito_id` int(10) unsigned NOT NULL,
  `conceptoContado_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `precios_aterrizajes_despegues_aeropuerto_id_foreign` (`aeropuerto_id`),
  KEY `precios_aterrizajes_despegues_conceptocredito_id_foreign` (`conceptoCredito_id`),
  KEY `precios_aterrizajes_despegues_conceptocontado_id_foreign` (`conceptoContado_id`),
  CONSTRAINT `precios_aterrizajes_despegues_conceptocontado_id_foreign` FOREIGN KEY (`conceptoContado_id`) REFERENCES `conceptos` (`id`),
  CONSTRAINT `precios_aterrizajes_despegues_aeropuerto_id_foreign` FOREIGN KEY (`aeropuerto_id`) REFERENCES `aeropuertos` (`id`),
  CONSTRAINT `precios_aterrizajes_despegues_conceptocredito_id_foreign` FOREIGN KEY (`conceptoCredito_id`) REFERENCES `conceptos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `precios_aterrizajes_despegues`
--

LOCK TABLES `precios_aterrizajes_despegues` WRITE;
/*!40000 ALTER TABLE `precios_aterrizajes_despegues` DISABLE KEYS */;
INSERT INTO `precios_aterrizajes_despegues` VALUES (1,0.41,0.85,0.49,1.65,1,68,54,'0000-00-00 00:00:00','2015-12-11 21:11:16');
/*!40000 ALTER TABLE `precios_aterrizajes_despegues` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `precios_cargas`
--

DROP TABLE IF EXISTS `precios_cargas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `precios_cargas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `equivalenteUT` double(8,2) NOT NULL,
  `toneladaPorBloque` double(8,2) NOT NULL,
  `aeropuerto_id` int(10) unsigned NOT NULL,
  `conceptoCredito_id` int(10) unsigned NOT NULL,
  `conceptoContado_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `precios_cargas_aeropuerto_id_foreign` (`aeropuerto_id`),
  KEY `precios_cargas_conceptocredito_id_foreign` (`conceptoCredito_id`),
  KEY `precios_cargas_conceptocontado_id_foreign` (`conceptoContado_id`),
  CONSTRAINT `precios_cargas_conceptocontado_id_foreign` FOREIGN KEY (`conceptoContado_id`) REFERENCES `conceptos` (`id`),
  CONSTRAINT `precios_cargas_aeropuerto_id_foreign` FOREIGN KEY (`aeropuerto_id`) REFERENCES `aeropuertos` (`id`),
  CONSTRAINT `precios_cargas_conceptocredito_id_foreign` FOREIGN KEY (`conceptoCredito_id`) REFERENCES `conceptos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `precios_cargas`
--

LOCK TABLES `precios_cargas` WRITE;
/*!40000 ALTER TABLE `precios_cargas` DISABLE KEYS */;
INSERT INTO `precios_cargas` VALUES (1,0.10,1.00,1,73,59,'0000-00-00 00:00:00','2016-01-14 18:00:44');
/*!40000 ALTER TABLE `precios_cargas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `puertos`
--

DROP TABLE IF EXISTS `puertos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `puertos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `siglas` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '0',
  `pais_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `puertos_pais_id_foreign` (`pais_id`),
  CONSTRAINT `puertos_pais_id_foreign` FOREIGN KEY (`pais_id`) REFERENCES `pais` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `puertos`
--

LOCK TABLES `puertos` WRITE;
/*!40000 ALTER TABLE `puertos` DISABLE KEYS */;
INSERT INTO `puertos` VALUES (1,'ARUBA','TNCA',1,15,'2015-09-03 01:15:27','2015-12-08 04:07:25'),(3,'SIMÓN BOLIVAR','SVMI',1,232,'2015-12-08 04:08:06','2015-12-08 04:08:06'),(4,'BARCELONA','SVBC',1,232,'2015-12-08 04:08:34','2015-12-08 04:08:34'),(5,'CHARALLAVE','SVCS',1,232,'2015-12-08 04:09:05','2015-12-08 04:09:05'),(6,'VALENCIA','SVVA',1,232,'2015-12-16 18:20:01','2015-12-16 18:20:01'),(7,'PUNTA BARIMA','SVPB',1,232,'2016-01-05 23:24:40','2016-01-05 23:24:40'),(8,'PORLAMAR','SVMG',1,232,'2016-01-05 23:59:15','2016-01-05 23:59:15'),(9,'CANAIMA','SVCN',1,232,'2016-01-06 01:10:18','2016-01-06 01:10:18'),(10,'PIARCO (TRINIDAD)','TTPP',1,221,'2016-01-08 00:04:21','2016-01-10 19:34:03'),(11,'CIUDAD BOLIVAR','SVCB',1,232,'2016-01-08 07:57:14','2016-01-08 07:57:14'),(12,'URUYEN','SVUY',1,232,'2016-01-09 02:43:23','2016-01-09 02:43:23'),(13,'SAN FELIPE','SVSP',1,232,'2016-01-09 02:54:29','2016-01-09 02:54:29'),(14,'VALLE LA PASCUA','SVVP',1,232,'2016-01-10 18:13:22','2016-01-10 19:31:06'),(15,'BASE AEREA MARISCAL SUCRE','SVBS',1,232,'2016-01-10 18:17:26','2016-01-14 17:58:09'),(16,'BASE AEREA FRANCISCO DE MIRANDA (LA CARLOTA)','SBFM',1,232,'2016-01-10 18:18:14','2016-01-10 19:07:21'),(17,'BASE AEREA EL LIBERTADOR','SVBL',1,232,'2016-01-10 18:18:57','2016-01-14 17:58:23'),(18,'SANTA ELENA DE UAIREN','SVSE',1,232,'2016-01-10 18:22:39','2016-01-10 18:22:39'),(19,'MARACAIBO','SVMC',1,232,'2016-01-10 18:23:48','2016-01-10 18:23:48'),(20,'TUCUPITA','SVTC',1,232,'2016-01-10 18:25:17','2016-01-10 18:25:17'),(21,'BARQUISIMETO (JACINTO LARA)','SVBM',1,232,'2016-01-10 18:28:21','2016-01-10 18:28:21'),(22,'PUERTO AYACUCHO','SVPA',1,232,'2016-01-10 18:29:31','2016-01-10 18:29:31'),(23,'LA ROMANA (REPÚBLICA DOMINICANA)','MDLR',1,65,'2016-01-10 18:33:01','2016-01-10 18:33:01'),(24,'OPALOCKA (MIAMI) EE.UU','KOPF',1,75,'2016-01-10 18:33:57','2016-01-10 20:35:43'),(25,'PANAMÁ','MPMG',1,170,'2016-01-10 18:34:57','2016-01-10 18:34:57'),(26,'BOGOTÁ','SKBO',1,52,'2016-01-10 18:35:50','2016-01-10 18:35:50'),(27,'LAS AMÉRICAS (REPÚBLICA DOMINICANA)','MDSD',1,65,'2016-01-10 18:38:38','2016-01-10 18:38:38'),(28,'CARTAGENA ','SKCG',1,52,'2016-01-10 18:39:37','2016-01-10 18:39:37'),(29,'ANACO','SVAN',1,232,'2016-01-10 18:41:23','2016-01-10 18:41:23'),(30,'SANTOMÉ','SVST',1,232,'2016-01-10 18:42:11','2016-01-10 18:42:11'),(31,'BARINAS','SVBI',1,232,'2016-01-10 18:43:11','2016-01-10 18:43:11'),(32,'CAICARA','SVCD',1,232,'2016-01-10 18:44:07','2016-01-10 18:44:07'),(33,'KAVAC','SVKA',1,232,'2016-01-10 18:45:21','2016-01-10 18:49:59'),(34,'KAMARATA','SVKM',1,232,'2016-01-10 18:46:01','2016-01-10 18:46:01'),(35,'MARIPA','SVNB',1,232,'2016-01-10 18:47:45','2016-01-10 18:49:37'),(36,'TUMEREMO','SVTM',1,232,'2016-01-10 18:48:25','2016-01-10 18:48:25'),(37,'URIMAN','SVUM',1,232,'2016-01-10 18:50:39','2016-01-10 18:50:39'),(38,'WONKEN','SVWK',1,232,'2016-01-10 18:54:57','2016-01-10 18:54:57'),(39,'PUERTO CABELLO','SVPC',1,232,'2016-01-10 18:55:58','2016-01-10 18:55:58'),(40,'SAN CARLOS','SVSC',1,232,'2016-01-10 18:57:32','2016-01-10 18:57:32'),(41,'LOS ROQUES','SVRS',1,232,'2016-01-10 18:59:02','2016-01-10 18:59:02'),(42,'FALCON (CORO)','SVCR',1,232,'2016-01-10 19:00:46','2016-01-10 19:00:46'),(43,'JOSEFA CAMEJO (PUNTO FIJO)','SVJC',1,232,'2016-01-10 19:02:48','2016-01-10 19:02:48'),(44,'CALABOZO','SVCL',1,232,'2016-01-10 19:03:50','2016-01-10 19:03:50'),(45,'ALTA GRACIA DE ORITUCO','SVSO',1,232,'2016-01-10 19:05:02','2016-01-10 19:05:02'),(46,'MERIDA','SVMD',1,232,'2016-01-10 19:06:05','2016-01-10 19:06:05'),(47,'EL VIGIA','SVVG',1,232,'2016-01-10 19:06:29','2016-01-10 19:06:29'),(48,'METROPOLITANO ','SVMP',1,232,'2016-01-10 19:08:34','2016-01-10 19:08:34'),(49,'MATURIN','SVMT',1,232,'2016-01-10 19:09:25','2016-01-10 19:09:25'),(50,'ACARIGUA','SVAC',1,232,'2016-01-10 19:10:46','2016-01-10 19:10:46'),(51,'GUANARE','SVGU',1,232,'2016-01-10 19:11:30','2016-01-10 19:11:30'),(52,'CARUPANO','SVCP',1,232,'2016-01-10 19:12:08','2016-01-10 19:12:08'),(53,'CUMANÁ','SVCU',1,232,'2016-01-10 19:12:47','2016-01-10 19:12:47'),(54,'LA FRIA','SVLF',1,232,'2016-01-10 19:13:32','2016-01-10 19:13:32'),(55,'PARAMILLO','SVPM',1,232,'2016-01-10 19:14:16','2016-01-10 19:14:16'),(56,'SAN ANTONIO DEL TACHIRA','SVSA',1,232,'2016-01-10 19:15:20','2016-01-10 19:15:20'),(57,'ORO  NEGRO','SVON',1,232,'2016-01-10 19:16:12','2016-01-10 19:16:12'),(58,'COSTA RICA','MRPV',1,60,'2016-01-10 20:27:02','2016-01-10 20:27:02'),(59,'MANAOS (BRASIL)','SBEG',1,33,'2016-01-10 20:28:59','2016-01-10 20:28:59'),(60,'PUNTA CANA (REPÚBLICA DOMINICANA)','MDPC',1,65,'2016-01-10 20:30:58','2016-01-10 20:30:58'),(61,'SURINAM','SMJP',1,209,'2016-01-10 20:31:32','2016-01-10 20:31:32'),(62,'QUITO (ECUADOR)','SECM',1,66,'2016-01-10 20:32:30','2016-01-10 20:32:30'),(63,'GEORGETOWN (GUYANA)','SYCJ',1,99,'2016-01-10 20:33:43','2016-01-10 20:33:43'),(64,'FOURLAUDER (MIAMI) EE.UU','KFLL',1,75,'2016-01-10 20:34:39','2016-01-10 20:34:39'),(65,'MACAGUA','SVMU',1,232,'2016-01-11 01:16:22','2016-01-11 01:16:22');
/*!40000 ALTER TABLE `puertos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_usuario`
--

DROP TABLE IF EXISTS `role_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_usuario` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `usuario_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `role_usuario_role_id_index` (`role_id`),
  KEY `role_usuario_usuario_id_index` (`usuario_id`),
  CONSTRAINT `role_usuario_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_usuario_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_usuario`
--

LOCK TABLES `role_usuario` WRITE;
/*!40000 ALTER TABLE `role_usuario` DISABLE KEYS */;
INSERT INTO `role_usuario` VALUES (1,1,1,'2015-07-31 14:08:02','2015-07-31 14:08:02'),(3,3,3,'2015-09-02 01:19:39','2015-09-02 01:19:39'),(4,5,5,'2016-01-11 23:40:29','2016-01-11 23:40:29'),(5,5,6,'2016-01-11 23:40:29','2016-01-11 23:40:29'),(6,5,8,'2016-01-11 23:40:29','2016-01-11 23:40:29'),(7,2,7,'2016-01-11 23:40:39','2016-01-11 23:40:39'),(8,2,2,'2016-01-11 23:40:50','2016-01-11 23:40:50'),(9,4,4,'2016-01-12 02:14:50','2016-01-12 02:14:50'),(10,3,9,'2016-01-14 23:39:41','2016-01-14 23:39:41');
/*!40000 ALTER TABLE `role_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Admin','admin','Usuario Administrador del Sistema',1,'2015-07-31 14:07:13','2016-01-11 23:40:17'),(2,'AdministradorSCV','administradorscv','Grupo de Usuario para los supervisores de la Sección de Control de Vuelos.',1,'2015-09-02 00:34:18','2016-01-11 23:39:08'),(3,'AdminRecaudación','adminrecaudacion','Grupo de Usuario para los supervisores del departamento de recaudación',1,'2015-09-02 01:19:32','2016-01-11 23:39:59'),(4,'Asuntos Legales','asuntos.legales','Asuntos Legales',1,'2016-01-05 19:54:09','2016-01-05 19:57:27'),(5,'OperadorSCV','operadorscv','Grupo de Usuario para los operadores de la Sección de Control de Vuelos.',1,'2016-01-11 23:38:30','2016-01-11 23:38:30');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ta_tasas`
--

DROP TABLE IF EXISTS `ta_tasas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ta_tasas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codtas` int(11) NOT NULL,
  `serie` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `femision` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `hemision` time NOT NULL,
  `tiptas` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `encargado` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `codbarras` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `fVer` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `hVer` time NOT NULL,
  `valor` double(14,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ta_tasas`
--

LOCK TABLES `ta_tasas` WRITE;
/*!40000 ALTER TABLE `ta_tasas` DISABLE KEYS */;
/*!40000 ALTER TABLE `ta_tasas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tasa_cierres`
--

DROP TABLE IF EXISTS `tasa_cierres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tasa_cierres` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fcierre` date NOT NULL,
  `hcierre` time NOT NULL,
  `monto` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `encargado` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `observacion` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasa_cierres`
--

LOCK TABLES `tasa_cierres` WRITE;
/*!40000 ALTER TABLE `tasa_cierres` DISABLE KEYS */;
/*!40000 ALTER TABLE `tasa_cierres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tip_tas`
--

DROP TABLE IF EXISTS `tip_tas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tip_tas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `monto` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tip_tas`
--

LOCK TABLES `tip_tas` WRITE;
/*!40000 ALTER TABLE `tip_tas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tip_tas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_aeronaves`
--

DROP TABLE IF EXISTS `tipo_aeronaves`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_aeronaves` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_aeronaves`
--

LOCK TABLES `tipo_aeronaves` WRITE;
/*!40000 ALTER TABLE `tipo_aeronaves` DISABLE KEYS */;
INSERT INTO `tipo_aeronaves` VALUES (1,'Helicóptero','2015-08-26 02:56:26','2015-08-26 02:56:26'),(2,'Avión','2015-08-26 02:56:31','2015-08-26 02:56:31');
/*!40000 ALTER TABLE `tipo_aeronaves` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_matriculas`
--

DROP TABLE IF EXISTS `tipo_matriculas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_matriculas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `siglas` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_matriculas`
--

LOCK TABLES `tipo_matriculas` WRITE;
/*!40000 ALTER TABLE `tipo_matriculas` DISABLE KEYS */;
INSERT INTO `tipo_matriculas` VALUES (1,'Privado','P ','0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'Comercial Privado','CP','0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'Comercial','C ','0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,'Oficial / Gobierno','O ','0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,'Escuela','E ','0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,'Militar','M ','0000-00-00 00:00:00','0000-00-00 00:00:00'),(7,'Agrícola','A ','0000-00-00 00:00:00','0000-00-00 00:00:00'),(8,'Adiestramiento','MR','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tipo_matriculas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `topes`
--

DROP TABLE IF EXISTS `topes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `topes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_archivo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ruta_imagen` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `aeropuerto` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topes`
--

LOCK TABLES `topes` WRITE;
/*!40000 ALTER TABLE `topes` DISABLE KEYS */;
/*!40000 ALTER TABLE `topes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `departamento_id` int(10) unsigned DEFAULT NULL,
  `aeropuerto_id` int(10) unsigned DEFAULT NULL,
  `cargo_id` int(10) unsigned DEFAULT NULL,
  `directo` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `usuarios_departamento_id_foreign` (`departamento_id`),
  KEY `usuarios_aeropuerto_id_foreign` (`aeropuerto_id`),
  KEY `usuarios_cargo_id_foreign` (`cargo_id`),
  CONSTRAINT `usuarios_cargo_id_foreign` FOREIGN KEY (`cargo_id`) REFERENCES `cargos` (`id`),
  CONSTRAINT `usuarios_aeropuerto_id_foreign` FOREIGN KEY (`aeropuerto_id`) REFERENCES `aeropuertos` (`id`),
  CONSTRAINT `usuarios_departamento_id_foreign` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'admin','$2y$10$IiAw5mwzKZwMjPMP7gv64OBUMHL2INfwOYpZaYxbHPPaS1oJComkm','',0,NULL,NULL,NULL,'','','c4lD1i7jwvFGT6g5sCxVFdso6sAsWzyH4JYhMwmokdllC2xR1ADQD5dlVEpk','2015-07-31 12:42:36','2016-01-14 23:39:47'),(2,'supervisor-scv','$2y$10$hZdmhsjIpdtl0elgxBhg4OIbeTa4EnN6525Gm/ZmtTgrvDCKOZ4Sy','Supervisor SCV',1,1,1,1,'0000','saar@gmail.com','JaQoVodYWaE1kuxEpfobqZyWzfLcBIOOdsp7TDEjWZN4Gzp2WMxbzNqtyZ8g','2015-09-02 00:32:49','2016-01-14 04:10:44'),(3,'recaudacion','$2y$10$euqvcZN2k7eP6B6gFfbb.eIfKJ7JaUZMHe8hg9ORz5zWD6uKBIrQ.','Recaudacion',1,1,1,1,'1234','email@gmail.com','B75Y0W3frFNjkXwEqzh6gHgcssFIxBBJf4NGRjoi0brkjHCGUJMSUrK2XiS4','2015-09-02 01:18:54','2015-09-02 01:40:19'),(4,'mrodriguez','$2y$10$pGBmGKJetGWpLSVm.pRuIuncFPhxkb1rU5JQAKhsh4wbqzqhuchZK','Miguel Rodriguez',1,1,1,1,'8009','mrodriguez@e-saarbolivar.gob.ve','USzZDHFOxOoADV84yjfIGKfrkcmX9qwYGGVapjijm0BTLfvNyxvugqHaKSfr','2016-01-05 19:48:16','2016-01-06 21:35:43'),(5,'aleon','$2y$10$CDF0PY5GvvrvyVoBqpfgMu2T45QAMnzJ.ecVEDw6L3NihneMn8Qoq','Aura León',1,1,1,1,'8028','aleon@e-saarbolivar.gob.ve',NULL,'2016-01-11 23:35:19','2016-01-11 23:35:19'),(6,'fmares','$2y$10$Swf26leRLxYM2InUdE8K8eM8EtQAA1UH6WC9JT.WF0V8tVug67q5e','Freddy Mares',1,1,1,1,'8086','fmares@e-saarbolivar.gob.ve','9afFvcPQ6c2MMcXR9p5OO0596DwBTWArgM8hvgltcW1Twy1BymTO7ZN8x3ak','2016-01-11 23:36:07','2016-01-11 23:41:32'),(7,'maro','$2y$10$B8idg5UACG.OOaTdLDscEOd3G05vYDBeUk6Q/GOgiTa6AZe1EHY1O','Marhoren Aro',1,1,1,1,'8023','maro@e-saarbolivar.gob.ve','irZXHXz84NYpbrzeODl5echDQWJCvCplo00OXuaiUeOTQbNU1VBe3HYHbG21','2016-01-11 23:36:42','2016-01-14 21:29:45'),(8,'erojas','$2y$10$cwg6LJQlRsmng7XjVTxqqOOZs48nOBWett8w4qa1CM38Pf8dVGmMO','Eduardo Rojas',1,1,1,1,'8088','erojas@e-saarbolivar.gob.ve','n9huYjJzhmXxu3M0odgxT9a8nxvbJMG136om42issr5Cw3luELd2DDkMGSU0','2016-01-11 23:37:12','2016-01-14 21:23:47'),(9,'mvelasquez','$2y$10$NeHAPygrpXozwjg9DYe8..0AYF8aFOEfwnkkO4ujmTqGjv1mK1LMC','Mirna Velasquez',1,1,1,1,'N/A','mdvvl@hotmail.com',NULL,'2016-01-14 23:39:22','2016-01-14 23:39:22');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-01-14 14:40:15
