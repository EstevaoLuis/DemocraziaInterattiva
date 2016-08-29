CREATE DATABASE  IF NOT EXISTS `democrazia` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `democrazia`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win64 (x86_64)
--
-- Host: localhost    Database: democrazia
-- ------------------------------------------------------
-- Server version	5.6.13

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
-- Table structure for table `elezione`
--

DROP TABLE IF EXISTS `elezione`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elezione` (
  `Data_inizio` date DEFAULT NULL,
  `Data_fine` date DEFAULT NULL,
  `Descrizione` text,
  `Carica_Nome` varchar(45) NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`),
  KEY `fk_Elezione_Carica` (`Carica_Nome`),
  CONSTRAINT `fk_Elezione_Carica` FOREIGN KEY (`Carica_Nome`) REFERENCES `carica` (`Nome`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elezione`
--

LOCK TABLES `elezione` WRITE;
/*!40000 ALTER TABLE `elezione` DISABLE KEYS */;
INSERT INTO `elezione` VALUES ('2013-08-31','2013-09-14','abc','Presidente',1),('2013-08-31','2013-09-15','abcd','Vice Presidente',2),('2010-08-20','2010-09-20','klop','Ambasciatore',3),('2010-08-11','2010-09-12','mjjj','Cardinale',4),('2013-09-20','2013-10-20','hdbhd','Prefetto',6),('2000-01-01','2000-02-02','wow','Presidente',7),('2013-09-17','2013-10-17','\r\n    ','Amministratore',8),('2013-10-10','2013-11-11','\r\n    pagliacciata.','Pagliaccio',9),('2000-10-10','2000-11-10','pppp','Pagliaccio',10),('2013-09-20','2013-11-14','hjkkl.','Leader',11),('2014-02-23','2014-04-25','coach.','Allenatore',12),('1999-10-10','1999-11-11','ssdjs','Amministratore',13),('2001-10-10','2001-11-11','hjsjjs','Amministratore',14),('2013-10-15','2013-11-15',NULL,'Ambasciatore',15),('2013-10-15','2013-11-15',NULL,'Cardinale',16),('2013-08-01','2014-01-01','cons el.','Consigliere',17),('2013-09-25','2013-11-20','prof. el.','Professore',18);
/*!40000 ALTER TABLE `elezione` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-09-18 22:50:06
