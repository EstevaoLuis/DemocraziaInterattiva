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
-- Table structure for table `candidati`
--

DROP TABLE IF EXISTS `candidati`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `candidati` (
  `User` varchar(45) NOT NULL,
  `ID_Elezione` int(11) NOT NULL,
  `Voti_ricevuti` int(11) DEFAULT '0',
  PRIMARY KEY (`ID_Elezione`,`User`),
  KEY `User` (`User`),
  CONSTRAINT `candidati_ibfk_1` FOREIGN KEY (`User`) REFERENCES `utente` (`User`),
  CONSTRAINT `candidati_ibfk_2` FOREIGN KEY (`ID_Elezione`) REFERENCES `elezione` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `candidati`
--

LOCK TABLES `candidati` WRITE;
/*!40000 ALTER TABLE `candidati` DISABLE KEYS */;
INSERT INTO `candidati` VALUES ('obama',1,1),('pres1',2,2),('pres2',2,0),('pres3',2,0),('pres4',2,1),('maxambrogio',3,1),('gp',4,1),('dandoh',6,0),('bill',7,1),('bush',7,2),('alexkidd',8,2),('anto',8,2),('clown',9,0),('clown',10,1),('pizdn',11,0),('poldo',11,0),('pppp',13,1),('pppp',14,1),('jj',17,0),('luke',17,1),('mark',17,3),('ps',17,1);
/*!40000 ALTER TABLE `candidati` ENABLE KEYS */;
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
