-- MySQL dump 10.19  Distrib 10.3.34-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: conciliacao_parcelas_api
-- ------------------------------------------------------
-- Server version	10.3.34-MariaDB-0ubuntu0.20.04.1

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
-- Table structure for table `boletos`
--

DROP TABLE IF EXISTS `boletos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `boletos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nosso_numero` int(11) DEFAULT NULL,
  `parcela_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `parcela_id` (`parcela_id`),
  CONSTRAINT `boletos_ibfk_1` FOREIGN KEY (`parcela_id`) REFERENCES `parcelas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `boletos`
--

LOCK TABLES `boletos` WRITE;
/*!40000 ALTER TABLE `boletos` DISABLE KEYS */;
INSERT INTO `boletos` VALUES (1,4321,15,'2022-08-24 03:02:36','2022-08-24 00:02:36'),(2,1234,16,'2022-08-24 03:02:42','2022-08-24 00:02:42'),(3,2222,17,'2022-08-24 03:02:56','2022-08-24 00:02:56'),(4,3333,18,'2022-08-24 03:03:10','2022-08-24 00:03:10'),(5,9999,19,'2022-08-24 03:03:16','2022-08-24 00:03:16');
/*!40000 ALTER TABLE `boletos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parcelas`
--

DROP TABLE IF EXISTS `parcelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parcelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `flg_pago` varchar(3) DEFAULT 'nao',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parcelas`
--

LOCK TABLES `parcelas` WRITE;
/*!40000 ALTER TABLE `parcelas` DISABLE KEYS */;
INSERT INTO `parcelas` VALUES (15,'sim','2022-08-24 02:57:37','2022-08-24 22:39:25'),(16,'sim','2022-08-24 02:57:39','2022-08-24 22:39:25'),(17,'sim','2022-08-24 02:57:41','2022-08-24 22:39:25'),(18,'nao','2022-08-24 02:57:43','2022-08-24 13:17:25'),(19,'sim','2022-08-24 02:57:44','2022-08-24 22:39:25');
/*!40000 ALTER TABLE `parcelas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registros_webservice`
--

DROP TABLE IF EXISTS `registros_webservice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registros_webservice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nosso_numero` int(11) DEFAULT NULL,
  `flg_pago` varchar(3) DEFAULT NULL,
  `data_pagto` datetime DEFAULT NULL,
  `obs` varchar(255) DEFAULT NULL,
  `data_registro` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registros_webservice`
--

LOCK TABLES `registros_webservice` WRITE;
/*!40000 ALTER TABLE `registros_webservice` DISABLE KEYS */;
INSERT INTO `registros_webservice` VALUES (1,4321,'sim','2022-07-02 00:00:00','Pago no banco tal','2022-07-02 00:00:00','2022-08-25 01:39:25','2022-08-24 22:39:25'),(2,1234,'sim','2022-07-02 00:00:00','...','2022-07-01 00:00:00','2022-08-25 01:39:25','2022-08-24 22:39:25'),(3,2222,'sim','2022-07-28 00:00:00','Pago com atraso','2022-07-10 00:00:00','2022-08-25 01:39:25','2022-08-24 22:39:25'),(4,3333,'nao','0000-00-00 00:00:00','Não acusou pagto.','2022-07-01 00:00:00','2022-08-25 01:39:25','2022-08-24 22:39:25'),(5,9999,'sim','2022-06-25 00:00:00','','2022-06-28 00:00:00','2022-08-25 01:39:25','2022-08-24 22:39:25');
/*!40000 ALTER TABLE `registros_webservice` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-25 20:16:01
