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
-- Table structure for table `utente`
--

DROP TABLE IF EXISTS `utente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utente` (
  `Nome` varchar(45) DEFAULT NULL,
  `Cognome` varchar(45) DEFAULT NULL,
  `User` varchar(45) NOT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `Admin` tinyint(1) DEFAULT '0',
  `Banned` tinyint(1) DEFAULT '0',
  `Cand` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`User`),
  UNIQUE KEY `User_UNIQUE` (`User`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utente`
--

LOCK TABLES `utente` WRITE;
/*!40000 ALTER TABLE `utente` DISABLE KEYS */;
INSERT INTO `utente` VALUES ('Admin','Admin','admin','admin',1,0,0),('Alex','Kidd','alexkidd','alexkidd',0,0,1),('Annibale','D\'Annibale','annibal','annibal',0,0,0),('Antonio','Antonini','anto','anto',0,0,1),('Babbo','Natale','babbonatale','bn',0,0,0),('Banned','User','banned','banned',0,1,0),('Bill','Clinton','bill','bill',0,0,1),('George','Bush','bush','bush',0,0,1),('Mister','Clown','clown','clown',0,0,1),('Dan','Doh','dandoh','dan',0,0,1),('Giovanni','Paolo','gp','gp',0,0,1),('John','Johans','jj','jj',0,0,1),('Luigi','Mario','luigi','luigi',0,0,1),('Luca','Ariosto','luke','luke',0,0,1),('Mario','Mario','mario','mario',0,0,1),('Marco','Consigli','mark','cons',0,0,1),('Massimo','Ambrogio','maxambrogio','max123',0,0,1),('Victor','Obama','obama','obama',0,0,1),('Pablo','Osvaldo','pablito','osvaldo',0,1,0),('Pinco','Pallino','pinco','pallino',0,0,1),('Pizza','Del Noce','pizdn','pizdn',0,0,1),('Poldo','Burger','poldo','poldo',0,0,1),('Paolo','Paulucci','pppp','pppp',0,0,1),('Antonio','Casagrande','pres1','acp1',0,0,1),('Paolo','Broccoli','pres2','pbp2',0,0,1),('Carlo','Colori','pres3','ccp3',0,0,1),('Giustino','Da Silva','pres4','gdsp4',0,0,1),('Pedro','Silva','ps','ps',0,0,1),('Taddeo','De Olivo','tdo','tdo',0,0,0),('Victor','Egg','victor','egg',0,0,1);
/*!40000 ALTER TABLE `utente` ENABLE KEYS */;
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
