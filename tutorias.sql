CREATE DATABASE  IF NOT EXISTS `db_tutorias` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `db_tutorias`;
-- MySQL dump 10.13  Distrib 8.0.15, for macos10.14 (x86_64)
--
-- Host: localhost    Database: db_tutorias
-- ------------------------------------------------------
-- Server version	8.0.15

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Alumno`
--

DROP TABLE IF EXISTS `Alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `Alumno` (
  `AlumnoID` int(11) NOT NULL,
  `Boleta` varchar(15) DEFAULT NULL,
  `fotoURL` varchar(45) DEFAULT '',
  `Nombre` varchar(45) NOT NULL,
  `Apel_pat` varchar(45) NOT NULL,
  `Apel_mat` varchar(45) NOT NULL,
  `Carrera` varchar(45) NOT NULL,
  `Turno` varchar(45) NOT NULL,
  `Semestre` int(11) NOT NULL,
  `Grupo` varchar(45) DEFAULT NULL,
  `Fec_nac` varchar(45) DEFAULT NULL,
  `Sexo` varchar(1) DEFAULT NULL,
  `Tel_casa` varchar(45) DEFAULT NULL,
  `Celular` varchar(45) DEFAULT NULL,
  `Mail` varchar(45) NOT NULL,
  `Calle` varchar(45) DEFAULT NULL,
  `Num_ext` varchar(45) DEFAULT NULL,
  `Num_int` varchar(45) DEFAULT NULL,
  `Colonia` varchar(45) DEFAULT NULL,
  `Cp` varchar(45) DEFAULT NULL,
  `Delegacion` varchar(45) DEFAULT NULL,
  `Estado` varchar(45) DEFAULT NULL,
  `Fecha_registro` varchar(45) DEFAULT NULL,
  `Validado` int(11) DEFAULT '1',
  PRIMARY KEY (`AlumnoID`),
  UNIQUE KEY `Mail_UNIQUE` (`Mail`),
  UNIQUE KEY `Boleta_UNIQUE` (`Boleta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Alumno`
--

LOCK TABLES `Alumno` WRITE;
/*!40000 ALTER TABLE `Alumno` DISABLE KEYS */;
INSERT INTO `Alumno` VALUES (1,'2017095721','../uploadedimages/perfil.png','Cesar Nahum','Pascual','Vazquez','Programacion','Matutino',6,'6IV7','1_Enero_1997','H','32131312','23455432','robinmiguelsdj@gmail.com','Roma','9','1','fefe','12345','Madero','lk','2018-11-30 14:07:38',1),(2,'1231231','','JOSE','ALBERTO','PAQUIO','SD','VESPERTINO',8,'8IV6','1_E_34','M',NULL,NULL,'JOSE@JOSE.COM',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1);
/*!40000 ALTER TABLE `Alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `alumnobytutorias`
--

DROP TABLE IF EXISTS `alumnobytutorias`;
/*!50001 DROP VIEW IF EXISTS `alumnobytutorias`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8mb4;
/*!50001 CREATE VIEW `alumnobytutorias` AS SELECT 
 1 AS `idtutoria`,
 1 AS `idalumno`,
 1 AS `Boleta`,
 1 AS `Mail`,
 1 AS `Nombre`,
 1 AS `Apel_pat`,
 1 AS `Apel_mat`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `coordinador`
--

DROP TABLE IF EXISTS `coordinador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `coordinador` (
  `idcoordinador` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL,
  `contraseña` varchar(45) NOT NULL,
  PRIMARY KEY (`idcoordinador`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coordinador`
--

LOCK TABLES `coordinador` WRITE;
/*!40000 ALTER TABLE `coordinador` DISABLE KEYS */;
INSERT INTO `coordinador` VALUES (1,'USUARIO','CONTRASEÑA');
/*!40000 ALTER TABLE `coordinador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profesor`
--

DROP TABLE IF EXISTS `profesor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `profesor` (
  `idprofesor` int(11) NOT NULL AUTO_INCREMENT,
  `profesor` varchar(45) NOT NULL,
  PRIMARY KEY (`idprofesor`),
  UNIQUE KEY `profesor_UNIQUE` (`profesor`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profesor`
--

LOCK TABLES `profesor` WRITE;
/*!40000 ALTER TABLE `profesor` DISABLE KEYS */;
INSERT INTO `profesor` VALUES (3,'Gustavo  Lopez Gonzales'),(6,'Jose Alberto Rincon Mendoza'),(5,'Quintero Vazquez Gustavo '),(4,'Tulio Treviño Santana');
/*!40000 ALTER TABLE `profesor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tutoria`
--

DROP TABLE IF EXISTS `tutoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tutoria` (
  `idtutoria` int(11) NOT NULL AUTO_INCREMENT,
  `idprofesor` int(11) NOT NULL,
  `idunidad` int(11) NOT NULL,
  `disponibles` int(11) DEFAULT '0',
  `lunes` varchar(45) NOT NULL DEFAULT '---',
  `martes` varchar(45) NOT NULL DEFAULT '---',
  `miercoles` varchar(45) NOT NULL DEFAULT '---',
  `jueves` varchar(45) NOT NULL DEFAULT '---',
  `viernes` varchar(45) NOT NULL DEFAULT '---',
  `sabado` varchar(45) NOT NULL DEFAULT '---',
  `tipoTutoria` varchar(45) DEFAULT 'Regularizacion',
  PRIMARY KEY (`idtutoria`),
  KEY `TUTORIA_PROFESOR_idx` (`idprofesor`),
  KEY `TUTORIA_UNIDAD_idx` (`idunidad`),
  CONSTRAINT `TUTORIA_PROFESOR` FOREIGN KEY (`idprofesor`) REFERENCES `profesor` (`idprofesor`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `TUTORIA_UNIDAD` FOREIGN KEY (`idunidad`) REFERENCES `unidad` (`idunidad`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tutoria`
--

LOCK TABLES `tutoria` WRITE;
/*!40000 ALTER TABLE `tutoria` DISABLE KEYS */;
INSERT INTO `tutoria` VALUES (1,3,3,19,'12:00:00-13:00:00','13:00:00-17:00:00','---','---','02:02:00-03:57:00','---','Regularizacion'),(4,3,5,37,'14:24:00-23:23:00','---','---','---','---','03:01:00-03:04:00','Regularizacion'),(7,3,1,8,'---','---','---','---','---','10:00:00-22:00:00','Recuperacion'),(9,3,1,20,'---','---','---','---','10:00:00-22:00:00','---','Recuperacion'),(10,6,2,29,'---','12:00:00-14:00:01','---','---','---','---','Recuperacion');
/*!40000 ALTER TABLE `tutoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tutoria_Alumno`
--

DROP TABLE IF EXISTS `tutoria_Alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tutoria_Alumno` (
  `idtutoria_Alumno` int(11) NOT NULL AUTO_INCREMENT,
  `idtutoria` int(11) NOT NULL,
  `idalumno` int(11) NOT NULL,
  `valida` int(11) DEFAULT '1',
  PRIMARY KEY (`idtutoria_Alumno`),
  KEY `TUTORIA_ALUMNO_ALUMNO_idx` (`idalumno`),
  KEY `TUTORIA_ALUMNO_TUTORIA_idx` (`idtutoria`),
  CONSTRAINT `TUTORIA_ALUMNO_ALUMNO` FOREIGN KEY (`idalumno`) REFERENCES `alumno` (`AlumnoID`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `TUTORIA_ALUMNO_TUTORIA` FOREIGN KEY (`idtutoria`) REFERENCES `tutoria` (`idtutoria`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tutoria_Alumno`
--

LOCK TABLES `tutoria_Alumno` WRITE;
/*!40000 ALTER TABLE `tutoria_Alumno` DISABLE KEYS */;
INSERT INTO `tutoria_Alumno` VALUES (25,4,1,1),(27,7,1,1),(28,1,1,1),(29,10,2,1),(30,4,2,1),(32,7,2,1);
/*!40000 ALTER TABLE `tutoria_Alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `tutorias`
--

DROP TABLE IF EXISTS `tutorias`;
/*!50001 DROP VIEW IF EXISTS `tutorias`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8mb4;
/*!50001 CREATE VIEW `tutorias` AS SELECT 
 1 AS `idtutoria`,
 1 AS `unidad`,
 1 AS `profesor`,
 1 AS `tipoTutoria`,
 1 AS `disponibles`,
 1 AS `lunes`,
 1 AS `martes`,
 1 AS `miercoles`,
 1 AS `jueves`,
 1 AS `viernes`,
 1 AS `sabado`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `tutoriasbyalumno`
--

DROP TABLE IF EXISTS `tutoriasbyalumno`;
/*!50001 DROP VIEW IF EXISTS `tutoriasbyalumno`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8mb4;
/*!50001 CREATE VIEW `tutoriasbyalumno` AS SELECT 
 1 AS `idalumno`,
 1 AS `idtutoria`,
 1 AS `disponibles`,
 1 AS `tipoTutoria`,
 1 AS `unidad`,
 1 AS `profesor`,
 1 AS `lunes`,
 1 AS `martes`,
 1 AS `miercoles`,
 1 AS `jueves`,
 1 AS `viernes`,
 1 AS `sabado`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `unidad`
--

DROP TABLE IF EXISTS `unidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `unidad` (
  `idunidad` int(11) NOT NULL AUTO_INCREMENT,
  `unidad` varchar(45) NOT NULL,
  PRIMARY KEY (`idunidad`),
  UNIQUE KEY `unidad_UNIQUE` (`unidad`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidad`
--

LOCK TABLES `unidad` WRITE;
/*!40000 ALTER TABLE `unidad` DISABLE KEYS */;
INSERT INTO `unidad` VALUES (2,'Biologia'),(4,'Fisica II'),(5,'Fisica III'),(1,'Geometria Analitica'),(3,'Quimica iv');
/*!40000 ALTER TABLE `unidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'db_tutorias'
--

--
-- Dumping routines for database 'db_tutorias'
--
/*!50003 DROP PROCEDURE IF EXISTS `joinTutoria` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;

/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `joinTutoria`(IN alumno INT, IN tutoria INT)
BEGIN
	INSERT INTO `db_tutorias`.`tutoria_Alumno` (`idtutoria`, `idalumno`, `valida`) VALUES (tutoria, alumno, 1);
	UPDATE tutoria SET disponibles = disponibles - 1 WHERE `idtutoria` = tutoria;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `leaveTutoria` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;

/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `leaveTutoria`(in alumno INT, in tutoria INT)
BEGIN
	DELETE FROM tutoria_Alumno WHERE idtutoria = tutoria AND idalumno = alumno;
    UPDATE tutoria SET disponibles = disponibles + 1 WHERE `idtutoria` = tutoria;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `showAlumnos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;

/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `showAlumnos`(IN tutoria INT)
BEGIN
	SELECT * FROM Alumno
		WHERE AlumnoID not in (SELECT idalumno FROM tutoria_Alumno WHERE idtutoria = tutoria);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `showTutorias` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;

/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `showTutorias`(in alumno_id INT)
BEGIN
	SELECT * FROM tutorias
	WHERE tutorias.idtutoria not in (SELECT idtutoria FROM tutoria_Alumno WHERE idalumno = alumno_id);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `alumnobytutorias`
--

/*!50001 DROP VIEW IF EXISTS `alumnobytutorias`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `alumnobytutorias` AS select `tutoria_alumno`.`idtutoria` AS `idtutoria`,`tutoria_alumno`.`idalumno` AS `idalumno`,`alumno`.`Boleta` AS `Boleta`,`alumno`.`Mail` AS `Mail`,`alumno`.`Nombre` AS `Nombre`,`alumno`.`Apel_pat` AS `Apel_pat`,`alumno`.`Apel_mat` AS `Apel_mat` from ((`tutoria_alumno` join `alumno` on((`alumno`.`AlumnoID` = `tutoria_alumno`.`idalumno`))) join `tutorias` on((`tutorias`.`idtutoria` = `tutoria_alumno`.`idtutoria`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `tutorias`
--

/*!50001 DROP VIEW IF EXISTS `tutorias`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `tutorias` AS select `tutoria`.`idtutoria` AS `idtutoria`,`unidad`.`unidad` AS `unidad`,`profesor`.`profesor` AS `profesor`,`tutoria`.`tipoTutoria` AS `tipoTutoria`,`tutoria`.`disponibles` AS `disponibles`,`tutoria`.`lunes` AS `lunes`,`tutoria`.`martes` AS `martes`,`tutoria`.`miercoles` AS `miercoles`,`tutoria`.`jueves` AS `jueves`,`tutoria`.`viernes` AS `viernes`,`tutoria`.`sabado` AS `sabado` from ((`tutoria` join `profesor` on((`tutoria`.`idprofesor` = `profesor`.`idprofesor`))) join `unidad` on((`tutoria`.`idunidad` = `unidad`.`idunidad`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `tutoriasbyalumno`
--

/*!50001 DROP VIEW IF EXISTS `tutoriasbyalumno`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `tutoriasbyalumno` AS select `tutoria_alumno`.`idalumno` AS `idalumno`,`tutoria_alumno`.`idtutoria` AS `idtutoria`,`tutorias`.`disponibles` AS `disponibles`,`tutorias`.`tipoTutoria` AS `tipoTutoria`,`tutorias`.`unidad` AS `unidad`,`tutorias`.`profesor` AS `profesor`,`tutorias`.`lunes` AS `lunes`,`tutorias`.`martes` AS `martes`,`tutorias`.`miercoles` AS `miercoles`,`tutorias`.`jueves` AS `jueves`,`tutorias`.`viernes` AS `viernes`,`tutorias`.`sabado` AS `sabado` from ((`tutoria_alumno` join `alumno` on((`alumno`.`AlumnoID` = `tutoria_alumno`.`idalumno`))) join `tutorias` on((`tutorias`.`idtutoria` = `tutoria_alumno`.`idtutoria`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-12 21:56:15
