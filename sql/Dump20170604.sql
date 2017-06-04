-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: localhost    Database: gubler
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.21-MariaDB

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
-- Table structure for table `atendido`
--

DROP TABLE IF EXISTS `atendido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atendido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_paciente` int(11) DEFAULT NULL,
  `id_medico` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `id_localidad` int(11) DEFAULT NULL,
  `id_especialidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atendido`
--

LOCK TABLES `atendido` WRITE;
/*!40000 ALTER TABLE `atendido` DISABLE KEYS */;
/*!40000 ALTER TABLE `atendido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `especialidades`
--

DROP TABLE IF EXISTS `especialidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `especialidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_especialidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especialidades`
--

LOCK TABLES `especialidades` WRITE;
/*!40000 ALTER TABLE `especialidades` DISABLE KEYS */;
INSERT INTO `especialidades` VALUES (1,'Clinico',0),(2,'Pediatra',1),(3,'Clinico',0),(4,'Pediatra',3),(5,'Clinico',0),(6,'Pediatra',5),(7,'Clinico',0),(8,'Pediatra',7);
/*!40000 ALTER TABLE `especialidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instituciones`
--

DROP TABLE IF EXISTS `instituciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instituciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_tipo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instituciones`
--

LOCK TABLES `instituciones` WRITE;
/*!40000 ALTER TABLE `instituciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `instituciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medico_especialidad`
--

DROP TABLE IF EXISTS `medico_especialidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medico_especialidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_medico` int(11) DEFAULT NULL,
  `id_especialidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medico_especialidad`
--

LOCK TABLES `medico_especialidad` WRITE;
/*!40000 ALTER TABLE `medico_especialidad` DISABLE KEYS */;
/*!40000 ALTER TABLE `medico_especialidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medico_institucion`
--

DROP TABLE IF EXISTS `medico_institucion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medico_institucion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_medico` int(11) DEFAULT NULL,
  `id_institucion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medico_institucion`
--

LOCK TABLES `medico_institucion` WRITE;
/*!40000 ALTER TABLE `medico_institucion` DISABLE KEYS */;
/*!40000 ALTER TABLE `medico_institucion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medico_ubicacion`
--

DROP TABLE IF EXISTS `medico_ubicacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medico_ubicacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_medico` int(11) DEFAULT NULL,
  `id_ubicacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medico_ubicacion`
--

LOCK TABLES `medico_ubicacion` WRITE;
/*!40000 ALTER TABLE `medico_ubicacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `medico_ubicacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medicos`
--

DROP TABLE IF EXISTS `medicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `experiencia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `matricula` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `titulos` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medicos`
--

LOCK TABLES `medicos` WRITE;
/*!40000 ALTER TABLE `medicos` DISABLE KEYS */;
INSERT INTO `medicos` VALUES (1,'Tomas V','Medico pedriatra','123456','UBA Pediatra',9),(2,'Tomas V','Medico pedriatra','123456','UBA Pediatra',9),(3,'Tomas V','Medico pedriatra','123456','UBA Pediatra',9),(4,'Tomas V','Medico pedriatra','123456','UBA Pediatra',9),(5,'Tomas V','Medico pedriatra','123456','UBA Pediatra',9),(6,'Tomas V','Medico pedriatra','123456','UBA Pediatra',9),(7,'Tomas V','Medico pedriatra','123456','UBA Pediatra',9),(8,'Tomas V','Medico pedriatra','123456','UBA Pediatra',9),(9,'Tomas V','Medico pedriatra','123456','UBA Pediatra',9);
/*!40000 ALTER TABLE `medicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pacientes`
--

DROP TABLE IF EXISTS `pacientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pacientes`
--

LOCK TABLES `pacientes` WRITE;
/*!40000 ALTER TABLE `pacientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `pacientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recomendar`
--

DROP TABLE IF EXISTS `recomendar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recomendar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_recomendador` int(11) DEFAULT NULL,
  `id_recomendado` int(11) DEFAULT NULL,
  `tratamiento` int(11) DEFAULT NULL,
  `calidad` int(11) DEFAULT NULL,
  `resultado` int(11) DEFAULT NULL,
  `comentario` varchar(140) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recomendar`
--

LOCK TABLES `recomendar` WRITE;
/*!40000 ALTER TABLE `recomendar` DISABLE KEYS */;
/*!40000 ALTER TABLE `recomendar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_institucion`
--

DROP TABLE IF EXISTS `tipo_institucion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_institucion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_nombre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_institucion`
--

LOCK TABLES `tipo_institucion` WRITE;
/*!40000 ALTER TABLE `tipo_institucion` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_institucion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ubicaciones`
--

DROP TABLE IF EXISTS `ubicaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ubicaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_ubicacion_padre` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ubicaciones`
--

LOCK TABLES `ubicaciones` WRITE;
/*!40000 ALTER TABLE `ubicaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `ubicaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imagen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sexo` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_de_nacimiento` datetime DEFAULT NULL,
  `numero_de_telefono` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lugar_donde_vive` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idioma` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Lucas Rousseaux','lucas@gmail.com','88eae343b7f0b73152f02df220b60a38',NULL,'1',NULL,NULL,NULL,NULL),(2,'Rodrigo Trejo','rodrigo@gmail.com','e393d0ff26f8f27bc2b05fa7e7681edd',NULL,NULL,NULL,NULL,NULL,NULL),(3,'Alicia Perez','alicia@gmail.com','4aeeea6eb88d0e0b3afb2c9c537b63b1',NULL,NULL,NULL,NULL,NULL,NULL),(4,'Lucas Rousseaux','lucas@gmail.com','88eae343b7f0b73152f02df220b60a38',NULL,NULL,NULL,NULL,NULL,NULL),(5,'Veronica Olivari','veronica_olivari@hotmail.com','6d6844c5112e37cd61c6720866c7d42e',NULL,NULL,NULL,NULL,NULL,NULL),(6,'Veronica Olivari','veronica_olivari@hotmail.com','6d6844c5112e37cd61c6720866c7d42e',NULL,NULL,NULL,NULL,NULL,NULL),(7,'Alicia Perez','alicia@gmail.com','4aeeea6eb88d0e0b3afb2c9c537b63b1',NULL,NULL,NULL,NULL,NULL,NULL),(8,'Milagros Rousseaux','milagros@gmail.com','94d7234472a189cad24f0c97a1c42b85',NULL,NULL,NULL,NULL,NULL,NULL),(9,'Milagros','milagros2@gmail.com','94d7234472a189cad24f0c97a1c42b85',NULL,NULL,NULL,NULL,NULL,NULL),(10,'L','L','d160e0986aca4714714a16f29ec605af90be704d','L',NULL,NULL,NULL,NULL,NULL),(11,'Lucas','lucas@gmail.com','e2ba04068d9947058358df250aa2ee19b2415c63','doctor.jpg',NULL,NULL,NULL,NULL,NULL),(12,'Lucas','lucas@gmail.com','e2ba04068d9947058358df250aa2ee19b2415c63','doctor.jpg',NULL,NULL,NULL,NULL,NULL),(13,'Lucas','lucas@gmail.com','e2ba04068d9947058358df250aa2ee19b2415c63','doctor.jpg',NULL,NULL,NULL,NULL,NULL),(14,'Lucas','lucas@gmail.com','e2ba04068d9947058358df250aa2ee19b2415c63','doctor.jpg',NULL,NULL,NULL,NULL,NULL),(15,'Lucas','lucas@gmail.com','e2ba04068d9947058358df250aa2ee19b2415c63','doctor.jpg',NULL,NULL,NULL,NULL,NULL),(16,'Lucas','lucas@gmail.com','e2ba04068d9947058358df250aa2ee19b2415c63','doctor.jpg',NULL,NULL,NULL,NULL,NULL),(17,'Lucas','lucas@gmail.com','e2ba04068d9947058358df250aa2ee19b2415c63','doctor.jpg',NULL,NULL,NULL,NULL,NULL),(18,'Lucas','lucas@gmail.com','e2ba04068d9947058358df250aa2ee19b2415c63','doctor.jpg',NULL,NULL,NULL,NULL,NULL),(19,'Lucas','lucas@gmail.com','e2ba04068d9947058358df250aa2ee19b2415c63','doctor.jpg',NULL,NULL,NULL,NULL,NULL),(20,'Lucas','lucas@gmail.com','e2ba04068d9947058358df250aa2ee19b2415c63','doctor.jpg',NULL,NULL,NULL,NULL,NULL),(21,'Lucas','lucas@gmail.com','e2ba04068d9947058358df250aa2ee19b2415c63','doctor.jpg','M','1971-02-12 00:00:00','2147483647','HSM L213','Español'),(22,'Lucas','lucas@gmail.com','e2ba04068d9947058358df250aa2ee19b2415c63','doctor.jpg',NULL,NULL,NULL,NULL,NULL),(23,'Lucas','lucas@gmail.com','e2ba04068d9947058358df250aa2ee19b2415c63','doctor.jpg',NULL,NULL,NULL,NULL,NULL),(24,'Lucas','lucas@gmail.com','e2ba04068d9947058358df250aa2ee19b2415c63','doctor.jpg','M','1971-02-12 00:00:00','541152996264','HSM L213','Español'),(25,'Lucas','lucas@gmail.com','e2ba04068d9947058358df250aa2ee19b2415c63','doctor.jpg','M','1971-02-12 00:00:00','541152996264','HSM L213','Español'),(26,'Lucas','lucas@gmail.com','e2ba04068d9947058358df250aa2ee19b2415c63','doctor.jpg','M','1971-02-12 00:00:00','541152996264','HSM L213','Español'),(27,'Lucas','lucas@gmail.com','e2ba04068d9947058358df250aa2ee19b2415c63','doctor.jpg','M','1971-02-12 00:00:00','541152996264','HSM L213','Español'),(28,'Lucas','lucas@gmail.com','e2ba04068d9947058358df250aa2ee19b2415c63','doctor.jpg','M','1971-02-12 00:00:00','541152996264','HSM L213','Español'),(29,'Lucas','lucas@gmail.com','e2ba04068d9947058358df250aa2ee19b2415c63','doctor.jpg','M','1971-02-12 00:00:00','541152996264','HSM L213','Español');
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

-- Dump completed on 2017-06-04 19:23:35
