-- MySQL dump 10.13  Distrib 5.7.44, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: pdcdb
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Table structure for table `empresa_colaborador`
--

DROP TABLE IF EXISTS `empresa_colaborador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresa_colaborador` (
  `pdc_emp_id` int NOT NULL,
  `pdc_col_id` int NOT NULL,
  PRIMARY KEY (`pdc_emp_id`,`pdc_col_id`),
  KEY `empresa_colaborador_colaborador_FK` (`pdc_col_id`),
  CONSTRAINT `empresa_colaborador_colaborador_FK` FOREIGN KEY (`pdc_col_id`) REFERENCES `pdc_colaboradores` (`pdc_col_id`),
  CONSTRAINT `empresa_colaborador_empresa_FK` FOREIGN KEY (`pdc_emp_id`) REFERENCES `pdc_empresas` (`pdc_emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa_colaborador`
--

LOCK TABLES `empresa_colaborador` WRITE;
/*!40000 ALTER TABLE `empresa_colaborador` DISABLE KEYS */;
INSERT INTO `empresa_colaborador` VALUES (1,1),(2,1),(3,1);
/*!40000 ALTER TABLE `empresa_colaborador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pdc_colaboradores`
--

DROP TABLE IF EXISTS `pdc_colaboradores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pdc_colaboradores` (
  `pdc_col_id` int NOT NULL AUTO_INCREMENT,
  `pdc_col_nombre` varchar(255) NOT NULL,
  `pdc_col_apellido` varchar(255) NOT NULL,
  `pdc_col_edad` varchar(10) DEFAULT NULL,
  `pdc_col_telefono` varchar(40) DEFAULT NULL,
  `pdc_col_correo` varchar(50) DEFAULT NULL,
  `pdc_col_eliminado` int NOT NULL,
  `pdc_col_fecha_creado` datetime NOT NULL,
  PRIMARY KEY (`pdc_col_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pdc_colaboradores`
--

LOCK TABLES `pdc_colaboradores` WRITE;
/*!40000 ALTER TABLE `pdc_colaboradores` DISABLE KEYS */;
INSERT INTO `pdc_colaboradores` VALUES (1,'Abner','Ralak','27','1111-2222','abner@gmail.com',0,'2025-11-20 12:52:52');
/*!40000 ALTER TABLE `pdc_colaboradores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pdc_departamentos`
--

DROP TABLE IF EXISTS `pdc_departamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pdc_departamentos` (
  `pdc_dep_id` int NOT NULL AUTO_INCREMENT,
  `pdc_dep_departamento` varchar(255) NOT NULL,
  `pdc_pai_id` int DEFAULT NULL,
  `pdc_dep_eliminado` int NOT NULL,
  `pdc_dep_fecha_creado` datetime NOT NULL,
  PRIMARY KEY (`pdc_dep_id`),
  KEY `departamentos_pais_FK` (`pdc_pai_id`),
  CONSTRAINT `departamentos_pais_FK` FOREIGN KEY (`pdc_pai_id`) REFERENCES `pdc_pais` (`pdc_pai_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pdc_departamentos`
--

LOCK TABLES `pdc_departamentos` WRITE;
/*!40000 ALTER TABLE `pdc_departamentos` DISABLE KEYS */;
INSERT INTO `pdc_departamentos` VALUES (1,'Guatemala',1,0,'2025-11-19 16:05:26'),(2,'San Salvador',2,0,'2025-11-19 16:28:19'),(3,'Peten',1,0,'2025-11-19 17:03:23');
/*!40000 ALTER TABLE `pdc_departamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pdc_empresas`
--

DROP TABLE IF EXISTS `pdc_empresas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pdc_empresas` (
  `pdc_emp_id` int NOT NULL AUTO_INCREMENT,
  `pdc_emp_nombre_comercial` varchar(100) NOT NULL,
  `pdc_emp_razon_social` varchar(100) NOT NULL,
  `pdc_emp_nit` varchar(40) DEFAULT NULL,
  `pdc_emp_telefono` varchar(40) DEFAULT NULL,
  `pdc_emp_correo` varchar(50) DEFAULT NULL,
  `pdc_pai_id` int DEFAULT NULL,
  `pdc_dep_id` int DEFAULT NULL,
  `pdc_mun_id` int DEFAULT NULL,
  `pdc_emp_eliminado` int NOT NULL,
  `pdc_emp_fecha_creado` datetime NOT NULL,
  PRIMARY KEY (`pdc_emp_id`),
  KEY `empresa_pais_FK` (`pdc_pai_id`),
  KEY `empresa_departamento_FK` (`pdc_dep_id`),
  KEY `empresa_municipio_FK` (`pdc_mun_id`),
  CONSTRAINT `empresa_departamento_FK` FOREIGN KEY (`pdc_dep_id`) REFERENCES `pdc_departamentos` (`pdc_dep_id`),
  CONSTRAINT `empresa_municipio_FK` FOREIGN KEY (`pdc_mun_id`) REFERENCES `pdc_municipios` (`pdc_mun_id`),
  CONSTRAINT `empresa_pais_FK` FOREIGN KEY (`pdc_pai_id`) REFERENCES `pdc_pais` (`pdc_pai_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pdc_empresas`
--

LOCK TABLES `pdc_empresas` WRITE;
/*!40000 ALTER TABLE `pdc_empresas` DISABLE KEYS */;
INSERT INTO `pdc_empresas` VALUES (1,'PDC','PDC','1112156-5','1111-2222','pdc@gmail.com',1,3,1,0,'2025-11-20 00:19:35'),(2,'Empresa 2','Prueba Empresa 2','CF','0000-0000','prueba2@gmail.com',2,2,2,0,'2025-11-20 16:25:31'),(3,'Prueba 3','Empresa 3','CF','1234-1234','prueba3@gmail.com',1,3,1,0,'2025-11-20 16:26:27');
/*!40000 ALTER TABLE `pdc_empresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pdc_municipios`
--

DROP TABLE IF EXISTS `pdc_municipios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pdc_municipios` (
  `pdc_mun_id` int NOT NULL AUTO_INCREMENT,
  `pdc_mun_municipio` varchar(255) NOT NULL,
  `pdc_dep_id` int DEFAULT NULL,
  `pdc_dep_eliminado` int NOT NULL,
  `pdc_dep_fecha_creado` datetime NOT NULL,
  PRIMARY KEY (`pdc_mun_id`),
  KEY `municipio_departamento_FK` (`pdc_dep_id`),
  CONSTRAINT `municipio_departamento_FK` FOREIGN KEY (`pdc_dep_id`) REFERENCES `pdc_departamentos` (`pdc_dep_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pdc_municipios`
--

LOCK TABLES `pdc_municipios` WRITE;
/*!40000 ALTER TABLE `pdc_municipios` DISABLE KEYS */;
INSERT INTO `pdc_municipios` VALUES (1,'Ciudad',3,0,'2025-11-19 17:05:24'),(2,'Nueva Cuscatlan',2,0,'2025-11-20 21:09:06');
/*!40000 ALTER TABLE `pdc_municipios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pdc_pais`
--

DROP TABLE IF EXISTS `pdc_pais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pdc_pais` (
  `pdc_pai_id` int NOT NULL AUTO_INCREMENT,
  `pdc_pai_pais` varchar(50) NOT NULL,
  `pdc_pai_siglas` varchar(20) NOT NULL,
  `pdc_pai_eliminado` int NOT NULL,
  `pdc_pai_fecha_creado` datetime NOT NULL,
  PRIMARY KEY (`pdc_pai_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pdc_pais`
--

LOCK TABLES `pdc_pais` WRITE;
/*!40000 ALTER TABLE `pdc_pais` DISABLE KEYS */;
INSERT INTO `pdc_pais` VALUES (1,'Guatemala','GTM',0,'2025-11-19 13:41:01'),(2,'El Salvador','SLV',0,'2025-11-19 14:02:08'),(3,'Honduras','HND',0,'2025-11-19 17:11:36');
/*!40000 ALTER TABLE `pdc_pais` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-11-20 21:11:40
