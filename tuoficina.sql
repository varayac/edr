-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: tuoficina
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.13-MariaDB

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
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `ID_CLIENTE` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(40) DEFAULT NULL,
  `DIRECCION` varchar(50) DEFAULT NULL,
  `CREACION` datetime DEFAULT CURRENT_TIMESTAMP,
  `UPDATED_AT` datetime DEFAULT CURRENT_TIMESTAMP,
  `RUT` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`ID_CLIENTE`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'cliente1','av. santa rosa 3001, la pintana','2016-08-04 12:48:00','2016-08-04 12:48:00','1-9'),(2,'Mario Velazquez','av. ossa 132, la peñalolen','2016-08-04 13:44:31','2016-08-04 13:44:31','1-5');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_compra`
--

DROP TABLE IF EXISTS `detalle_compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_compra` (
  `id_detalle_compra` int(11) NOT NULL AUTO_INCREMENT,
  `id_factura` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `unidades` int(11) DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_detalle_compra`),
  KEY `id_producto_idx` (`id_producto`),
  KEY `id_factura_idx` (`id_factura`),
  CONSTRAINT `id_factura` FOREIGN KEY (`id_factura`) REFERENCES `factura` (`ID_FACTURA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_producto` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`ID_PRODUCTO`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_compra`
--

LOCK TABLES `detalle_compra` WRITE;
/*!40000 ALTER TABLE `detalle_compra` DISABLE KEYS */;
INSERT INTO `detalle_compra` VALUES (1,1,3,100,1000,'2016-08-04 14:44:17'),(2,2,5,60,1000,'2016-08-04 14:44:39'),(3,3,5,60,1000,'2016-08-04 15:03:07'),(4,4,5,75,3787,'2016-08-04 15:03:36');
/*!40000 ALTER TABLE `detalle_compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_venta`
--

DROP TABLE IF EXISTS `detalle_venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_venta` (
  `ID_DETALLE_VENTA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PRODUCTO` int(11) DEFAULT NULL,
  `ID_FACTURA` int(11) DEFAULT NULL,
  `CREATED_AT` datetime DEFAULT CURRENT_TIMESTAMP,
  `UNIDADES` int(11) DEFAULT NULL,
  `SUBTOTAL` double DEFAULT NULL,
  PRIMARY KEY (`ID_DETALLE_VENTA`),
  KEY `FK_DETALLE_PRODUCTO` (`ID_PRODUCTO`),
  KEY `fk_id_factura_idx` (`ID_FACTURA`),
  CONSTRAINT `fk_id_factura` FOREIGN KEY (`ID_FACTURA`) REFERENCES `factura` (`ID_FACTURA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_producto` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `producto` (`ID_PRODUCTO`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_venta`
--

LOCK TABLES `detalle_venta` WRITE;
/*!40000 ALTER TABLE `detalle_venta` DISABLE KEYS */;
INSERT INTO `detalle_venta` VALUES (2,1,1,'2016-08-04 12:54:08',4,990),(3,3,2,'2016-08-04 13:46:19',4,670);
/*!40000 ALTER TABLE `detalle_venta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `factura`
--

DROP TABLE IF EXISTS `factura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `factura` (
  `ID_FACTURA` int(11) NOT NULL AUTO_INCREMENT,
  `NUMERO` int(11) DEFAULT NULL,
  `CREATED_AT` datetime DEFAULT CURRENT_TIMESTAMP,
  `ID_PROVEEDOR` int(11) DEFAULT NULL,
  `ID_CLIENTE` int(11) DEFAULT NULL,
  `TIPO` varchar(15) DEFAULT NULL,
  `TOTAL` double DEFAULT NULL,
  PRIMARY KEY (`ID_FACTURA`),
  KEY `FK_CLIENTE_FACTURA` (`ID_CLIENTE`),
  KEY `FK_PROVEEDOR_FACTURA` (`ID_PROVEEDOR`),
  CONSTRAINT `FK_CLIENTE_FACTURA` FOREIGN KEY (`ID_CLIENTE`) REFERENCES `cliente` (`ID_CLIENTE`),
  CONSTRAINT `FK_PROVEEDOR_FACTURA` FOREIGN KEY (`ID_PROVEEDOR`) REFERENCES `proveedor` (`ID_PROVEEDOR`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `factura`
--

LOCK TABLES `factura` WRITE;
/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
INSERT INTO `factura` VALUES (1,1,'2016-08-04 12:54:03',NULL,1,'fact_venta',3690),(2,2,'2016-08-04 13:46:14',NULL,2,'fact_venta',2680),(3,1234,'2016-08-04 14:43:15',1,NULL,'fact_compra',100000),(4,56789,'2016-08-04 14:43:33',2,NULL,'fact_compra',300000);
/*!40000 ALTER TABLE `factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil`
--

DROP TABLE IF EXISTS `perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfil` (
  `ID_PERFIL` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID_PERFIL`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil`
--

LOCK TABLES `perfil` WRITE;
/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
INSERT INTO `perfil` VALUES (1,'admin'),(2,'vendedor');
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `ID_PRODUCTO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(30) DEFAULT NULL,
  `CODIGO` varchar(30) DEFAULT NULL,
  `PRECIO` int(11) DEFAULT NULL,
  `CANTIDAD` int(11) DEFAULT NULL,
  `CREACION` datetime DEFAULT CURRENT_TIMESTAMP,
  `UPDATED_AT` datetime DEFAULT CURRENT_TIMESTAMP,
  `ACTIVO` int(11) DEFAULT '1',
  PRIMARY KEY (`ID_PRODUCTO`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,'lapiz','1234a',990,5,'2016-07-25 23:48:19','2016-08-03 08:08:00',1),(2,'goma','567b',590,3,'2016-07-25 23:48:19','2016-07-25 23:48:19',1),(3,'papel','891c',670,4,'2016-07-25 23:48:19','2016-07-25 23:48:19',1),(4,'estuche','6543d',789,1,'2016-07-25 23:48:19','2016-07-25 23:48:19',1),(5,'carpeta','9876e',345,10,'2016-07-25 23:48:19','2016-07-25 23:48:19',1),(6,'lapiz','1234a',10000,5,'2016-08-03 04:00:55','2016-08-03 08:08:58',1),(7,'lapiz3','1234a',100000,5,'2016-08-03 04:01:21','2016-08-03 08:08:32',1),(8,'cosa','cosa1',10000,0,'2016-08-03 06:51:07','2016-08-03 08:08:05',1),(9,'cosita','cosita1',10000000,11,'2016-08-03 06:53:23','2016-08-03 08:08:10',1),(10,'goma1','gomadeborrar',25000,2,'2016-08-03 07:32:58','2016-08-03 07:32:58',1),(11,'cuaderno','cuad1234',700,0,'2016-08-03 07:46:56','2016-08-03 07:46:56',1);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedor` (
  `ID_PROVEEDOR` int(11) NOT NULL AUTO_INCREMENT,
  `RUT` varchar(40) DEFAULT NULL,
  `NOMBRE` varchar(30) DEFAULT NULL,
  `DIRECCION` varchar(40) DEFAULT NULL,
  `CREACION` datetime DEFAULT CURRENT_TIMESTAMP,
  `UPDATED_AT` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_PROVEEDOR`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor`
--

LOCK TABLES `proveedor` WRITE;
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
INSERT INTO `proveedor` VALUES (1,'98-k','Lider S.A.','Av. Las Condes 999, Las Condes','2016-07-26 00:06:30','2016-07-26 00:06:30'),(2,'99-0','Lapiz Lopez S.A.','Sta. Rosa 888, La Pintana','2016-07-26 00:06:30','2016-07-26 00:06:30'),(3,'77-3','Homy S.A','Av. Americo Vespucio 5000, La Reina','2016-07-26 00:06:30','2016-07-26 00:06:30');
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(20) DEFAULT NULL,
  `PASSWORD` varchar(252) DEFAULT NULL,
  `ACTIVO` int(11) DEFAULT '1',
  `ID_PERFIL` int(11) DEFAULT NULL,
  `CREADO` datetime DEFAULT CURRENT_TIMESTAMP,
  `UPDATED_AT` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_USUARIO`),
  KEY `FK_USUARIO_PERMISO` (`ID_PERFIL`),
  CONSTRAINT `FK_USUARIO_PERMISO` FOREIGN KEY (`ID_PERFIL`) REFERENCES `perfil` (`ID_PERFIL`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'mmoralesAdmin','827ccb0eea8a706c4c34a16891f84e7b',0,1,'2016-02-03 14:01:27','2016-08-03 01:08:30'),(31,'root','21232f297a57a5a743894a0e4a801fc3',0,1,'2016-08-01 21:26:03','2016-08-04 21:08:53'),(32,'VendedorPrueba','0407e8c8285ab85509ac2884025dcf42',0,2,'2016-08-02 23:34:59','2016-08-04 04:08:10'),(33,'root','03c7c0ace395d80182db07ae2c30f034',0,1,'2016-08-02 23:48:38','2016-08-03 01:08:28'),(34,'mauricio','bd10c8464416fe66974ed3511f246247',0,1,'2016-08-03 01:42:37','2016-08-03 02:08:51'),(35,'1aaaa','74b87337454200d4d33f80c4663dc5e5',0,2,'2016-08-03 06:35:32','2016-08-03 07:08:00'),(36,'varaya','21232f297a57a5a743894a0e4a801fc3',0,2,'2016-08-03 07:45:39','2016-08-04 07:08:55'),(37,'marciana','94b4832293a575584ca078d82a9c023a',0,2,'2016-08-03 20:02:27','2016-08-03 21:08:03'),(38,'xampp2','d985279a18de3e6380ee39939c98a3f9',0,1,'2016-08-03 20:10:04','2016-08-04 07:08:01'),(39,'eeeeeee','74b87337454200d4d33f80c4663dc5e5',0,2,'2016-08-03 21:33:30','2016-08-04 03:08:55'),(40,'varaya','0407e8c8285ab85509ac2884025dcf42',1,2,'2016-08-04 01:31:17','2016-08-04 01:31:17'),(41,'mmorales','415a7d3b8eafaf05d518d28b73c76c79',1,1,'2016-08-04 15:17:20','2016-08-04 15:17:20'),(42,'mmorales','4124bc0a9335c27f086f24ba207a4912',0,1,'2016-08-04 15:24:42','2016-08-04 21:08:50');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-08-04 15:36:36
