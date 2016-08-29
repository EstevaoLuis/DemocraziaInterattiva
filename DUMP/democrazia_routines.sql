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
-- Temporary table structure for view `cariche_detenute`
--

DROP TABLE IF EXISTS `cariche_detenute`;
/*!50001 DROP VIEW IF EXISTS `cariche_detenute`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `cariche_detenute` (
  `ID` tinyint NOT NULL,
  `Data_inizio` tinyint NOT NULL,
  `Data_fine` tinyint NOT NULL,
  `Voti_ricevuti` tinyint NOT NULL,
  `User` tinyint NOT NULL,
  `Nome` tinyint NOT NULL,
  `Cognome` tinyint NOT NULL,
  `Carica_Nome` tinyint NOT NULL,
  `Tot_voti` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `cariche_detenute`
--

/*!50001 DROP TABLE IF EXISTS `cariche_detenute`*/;
/*!50001 DROP VIEW IF EXISTS `cariche_detenute`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `cariche_detenute` AS select `elezione`.`ID` AS `ID`,`elezione`.`Data_inizio` AS `Data_inizio`,`elezione`.`Data_fine` AS `Data_fine`,`candidati`.`Voti_ricevuti` AS `Voti_ricevuti`,`utente`.`User` AS `User`,`utente`.`Nome` AS `Nome`,`utente`.`Cognome` AS `Cognome`,`elezione`.`Carica_Nome` AS `Carica_Nome`,max(`candidati`.`Voti_ricevuti`) AS `Tot_voti` from (((`carica` join `elezione`) join `candidati`) join `utente`) where ((`carica`.`Nome` = `elezione`.`Carica_Nome`) and (`elezione`.`ID` = `candidati`.`ID_Elezione`) and (`candidati`.`User` = `utente`.`User`) and (`elezione`.`Data_fine` < curdate())) group by `elezione`.`ID` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Dumping routines for database 'democrazia'
--
/*!50003 DROP FUNCTION IF EXISTS `anno_minimo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `anno_minimo`() RETURNS int(11)
BEGIN

RETURN (SELECT MIN(YEAR(Data_inizio))
FROM elezione);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `candidatura_utente` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `candidatura_utente`(usr VARCHAR(45), id_elez INT(11)) RETURNS int(11)
BEGIN
	DECLARE volte INTEGER;
	SET volte = volte_carica_detenuta(usr, id_elez);
	IF volte > 1 THEN
		RETURN -1;
	ELSE
		INSERT INTO `democrazia`.`candidati`
(`User`,
`ID_Elezione`,
`Voti_ricevuti`)
VALUES
(
usr,
id_elez,
0
);
		RETURN 0;
	END IF;
	RETURN 0;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `nuova_carica` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `nuova_carica`(nom VARCHAR(45), dur INT(10),
 descr_c TEXT, iniz DATE, fine DATE, descr_e TEXT) RETURNS int(11)
BEGIN
	IF (iniz>fine OR CURDATE() >= iniz) THEN
		RETURN -1;
	END IF;
	INSERT INTO democrazia.carica
	(Nome, Durata, Descrizione)
	VALUES
	(nom, dur, descr_c);
	INSERT INTO democrazia.elezione
	(Data_inizio, Data_fine, Descrizione, Carica_Nome)
	VALUES
	(iniz, fine, descr_e, nom);


RETURN 0;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `nuovo_utente` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `nuovo_utente`(nom VARCHAR(45), cognom VARCHAR(45),
 usr VARCHAR(45), pass VARCHAR(45), can TINYINT(1)) RETURNS int(11)
BEGIN
	
	INSERT INTO democrazia.utente
	(Nome, Cognome, User, Password, Banned, Cand)
	VALUES
	(nom, cognom, usr, pass, 1, can);



RETURN 0;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `rinnovo_automatico` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `rinnovo_automatico`() RETURNS int(11)
BEGIN
	DECLARE times INT DEFAULT 0;
	DECLARE car VARCHAR(45);
	DECLARE done INT DEFAULT 0;
	DECLARE iniz DATE;
	DECLARE fin DATE;

	DECLARE cur CURSOR FOR (SELECT tab2.Carica_Nome
			FROM (SELECT Carica_Nome,MAX(Data_fine) AS datafine
			FROM elezione INNER JOIN carica
			ON elezione.Carica_Nome = carica.Nome
			GROUP BY Carica_Nome, Durata
			HAVING DATE_ADD(datafine, INTERVAL Durata YEAR) < CURDATE()) AS tab2);
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;

	SET iniz = DATE_ADD(CURDATE(), INTERVAL 1 MONTH);
	SET fin  = DATE_ADD(CURDATE(), INTERVAL 2 MONTH);

	OPEN cur;
	read_loop: LOOP
	FETCH cur INTO car;
	IF done = 1 THEN
		LEAVE read_loop;
	END IF;
	SET times = times + 1;
	/* insert */
	INSERT INTO democrazia.elezione
	(Data_inizio, Data_fine, Carica_Nome)
	VALUES
	(iniz, fin, car);

	END LOOP;
	CLOSE cur;
	RETURN times;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `volte_carica_detenuta` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `volte_carica_detenuta`(usr VARCHAR(45), id_elez INT(11)) RETURNS int(11)
BEGIN
	DECLARE result INTEGER;
	SET result = (SELECT COUNT(*)
				FROM cariche_detenute
				WHERE User = usr
				AND Carica_Nome = (SELECT Carica_Nome
									FROM elezione
									WHERE ID = id_elez)
				);
RETURN result;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `attiva_disattiva_utente` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `attiva_disattiva_utente`(usr VARCHAR(45))
BEGIN
	UPDATE `democrazia`.`utente`
    SET Banned = 1 - Banned
    WHERE User = usr;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `vota` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `vota`(votante VARCHAR(45), elez INT(11), candidato VARCHAR(45))
BEGIN
	INSERT INTO `democrazia`.`voti`
(`User`,
`ID_Elezione`)
VALUES
(
votante,
elez
);
IF candidato <> '' THEN
	UPDATE `democrazia`.`candidati`
  SET Voti_ricevuti = Voti_ricevuti + 1
  WHERE ID_Elezione = elez
  AND User = candidato;
END IF;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-09-18 22:50:06
