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
-- Table structure for table `voti`
--

DROP TABLE IF EXISTS `voti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `voti` (
  `User` varchar(45) NOT NULL,
  `ID_Elezione` int(11) NOT NULL,
  PRIMARY KEY (`User`,`ID_Elezione`),
  KEY `ID_Elezione` (`ID_Elezione`),
  CONSTRAINT `voti_ibfk_1` FOREIGN KEY (`User`) REFERENCES `utente` (`User`),
  CONSTRAINT `voti_ibfk_2` FOREIGN KEY (`ID_Elezione`) REFERENCES `elezione` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `voti`
--

LOCK TABLES `voti` WRITE;
/*!40000 ALTER TABLE `voti` DISABLE KEYS */;
INSERT INTO `voti` VALUES ('alexkidd',1),('clown',1),('babbonatale',2),('clown',2),('luigi',2),('mario',2),('pinco',3),('tdo',4),('alexkidd',7),('annibal',7),('bush',7),('mario',7),('alexkidd',8),('anto',8),('luke',8),('poldo',8),('luigi',10),('annibal',13),('bush',13),('annibal',14),('alexkidd',17),('luigi',17),('luke',17),('mario',17),('poldo',17),('tdo',17);
/*!40000 ALTER TABLE `voti` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-09-18 22:50:05
