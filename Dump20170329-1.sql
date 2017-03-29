-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: facturacion
-- ------------------------------------------------------
-- Server version	5.7.17-log

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
-- Table structure for table `comprobanteretencion`
--

DROP TABLE IF EXISTS `comprobanteretencion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comprobanteretencion` (
  `id` varchar(50) NOT NULL,
  `idContribuyente` varchar(50) DEFAULT NULL,
  `fechaEmision` varchar(45) DEFAULT NULL,
  `fechaCreacion` varchar(45) DEFAULT NULL,
  `idTipoComprobante` varchar(50) DEFAULT NULL,
  `numeroComprobante` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `numeroAutorizacion` varchar(50) DEFAULT NULL,
  `serie` varchar(45) DEFAULT NULL,
  `claveAcceso` varchar(100) DEFAULT NULL,
  `establecimiento` varchar(45) DEFAULT NULL,
  `puntoEmision` varchar(45) DEFAULT NULL,
  `ejercicioFiscal` varchar(45) DEFAULT NULL,
  `secuencial` varchar(100) DEFAULT NULL,
  `archivo` text,
  `idEmpresa` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `FK_comprobante_contribuyente_idx` (`idContribuyente`),
  KEY `FK_comprobante_tipoComprobant_idx` (`idTipoComprobante`),
  CONSTRAINT `FK_comprobante_contribuyente` FOREIGN KEY (`idContribuyente`) REFERENCES `contribuyente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_comprobante_tipoComprobant` FOREIGN KEY (`idTipoComprobante`) REFERENCES `tipocomprobante` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comprobanteretencion`
--

LOCK TABLES `comprobanteretencion` WRITE;
/*!40000 ALTER TABLE `comprobanteretencion` DISABLE KEYS */;
INSERT INTO `comprobanteretencion` VALUES ('2017032910324958dbd3a18de70','2017031410315658c80cecd064a','21/03/2017','29-03-2017','2017030712230458beec781d5eb','123123123','1','','','','001','001','01/2018','','','2017030812313758c03ff900e37'),('2017032910364858dbd490324bc','2017031410315658c80cecd064a','21/03/2017','29-03-2017','2017030712230458beec781d5eb','123123123','1','','','','001','001','01/2018','','','2017030812313758c03ff900e37'),('2017032910370058dbd49c00e09','2017031410315658c80cecd064a','21/03/2017','29-03-2017','2017030712230458beec781d5eb','123123123','1','','','','001','001','01/2018','','','2017030812313758c03ff900e37'),('2017032910371458dbd4aa7385b','2017031410315658c80cecd064a','21/03/2017','29-03-2017','2017030712230458beec781d5eb','123123123','1','','','','001','001','01/2018','','','2017030812313758c03ff900e37'),('2017032910375458dbd4d2967a9','2017031410315658c80cecd064a','21/03/2017','29-03-2017','2017030712230458beec781d5eb','123123123','1','','','','001','001','01/2018','','','2017030812313758c03ff900e37'),('2017032910391758dbd52545233','2017031410315658c80cecd064a','21/03/2017','29-03-2017','2017030712230458beec781d5eb','123123123','1','','','','001','001','01/2018','','','2017030812313758c03ff900e37'),('2017032910401858dbd5623fa70','2017031410315658c80cecd064a','21/03/2017','29-03-2017','2017030712230458beec781d5eb','123123123','1','','','','001','001','01/2018','','','2017030812313758c03ff900e37'),('2017032910434758dbd6331dcc4','2017031410315658c80cecd064a','21/03/2017','29-03-2017','2017030712230458beec781d5eb','123123123','1','','','','001','001','01/2018','','','2017030812313758c03ff900e37'),('2017032910440058dbd640edfb0','2017031410315658c80cecd064a','21/03/2017','29-03-2017','2017030712230458beec781d5eb','123123123','1','','','','001','001','01/2018','','','2017030812313758c03ff900e37'),('2017032910461258dbd6c40594e','2017031410315658c80cecd064a','21/03/2017','29-03-2017','2017030712230458beec781d5eb','123123123','1','','','','001','001','01/2018','','','2017030812313758c03ff900e37'),('2017032910492658dbd786304e4','2017031410315658c80cecd064a','21/03/2017','29-03-2017','2017030712230458beec781d5eb','123123123','1','','','','001','001','01/2018','','','2017030812313758c03ff900e37'),('2017032910504458dbd7d470270','2017031410315658c80cecd064a','21/03/2017','29-03-2017','2017030712230458beec781d5eb','123123123','1','','','','001','001','01/2018','','','2017030812313758c03ff900e37'),('2017032910512658dbd7fe86254','2017031410315658c80cecd064a','21/03/2017','29-03-2017','2017030712230458beec781d5eb','123123123','1','','','','003','001','01/2018','','','2017030812495658c04444c3eef'),('2017032910513058dbd80208ff1','2017031410315658c80cecd064a','21/03/2017','29-03-2017','2017030712230458beec781d5eb','123123123','1','','','','003','001','01/2018','','','2017030812495658c04444c3eef'),('2017032910554458dbd90069ce7','2017031410315658c80cecd064a','21/03/2017','29-03-2017','2017030712230458beec781d5eb','123123123','1','','','','003','001','01/2018','','','2017030812495658c04444c3eef'),('2017032911012158dbda5159358','2017032911012158dbda514bf46','28/03/2017','29-03-2017','2017030712234458beeca0814cb','001-001-123456789','1','','','','001','001','01/2016','','','2017030812313758c03ff900e37'),('2017032911112758dbdcafaa0be','2017032911012158dbda514bf46','28/03/2017','29-03-2017','2017030712234458beeca0814cb','001-001-123456789','1','','','','001','001','01/2016','','','2017030812313758c03ff900e37'),('2017032911244258dbdfcaafe81','2017032911012158dbda514bf46','28/03/2017','29-03-2017','2017030712234458beeca0814cb','001-001-123456789','1','','','','001','001','01/2016','','','2017030812313758c03ff900e37'),('2017032911292658dbe0e6cd73a','2017032911012158dbda514bf46','28/03/2017','29-03-2017','2017030712234458beeca0814cb','001-001-123456789','1','','','','001','001','01/2016','','','2017030812313758c03ff900e37'),('2017032911315158dbe17778329','2017032911012158dbda514bf46','28/03/2017','29-03-2017','2017030712234458beeca0814cb','001-001-123456789','1','','','','001','001','01/2016','','','2017030812313758c03ff900e37'),('2017032911334058dbe1e492337','2017032911012158dbda514bf46','28/03/2017','29-03-2017','2017030712224158beec6177244','001-001-123456789','1','','','','001','001','01/2016','','','2017030812313758c03ff900e37'),('2017032911365058dbe2a29cbd4','2017032911012158dbda514bf46','28/03/2017','29-03-2017','2017030712224158beec6177244','001-001-123456789','1','','','','001','001','01/2016','','','2017030812313758c03ff900e37'),('2017032911372658dbe2c662889','2017032911012158dbda514bf46','28/03/2017','29-03-2017','2017030712224158beec6177244','001-001-123456789','1','','','','001','001','01/2016','','','2017030812313758c03ff900e37'),('2017032911380258dbe2eab99dc','2017032911012158dbda514bf46','28/03/2017','29-03-2017','2017030712224158beec6177244','001-001-123456789','1','','','','001','001','01/2016','','','2017030812313758c03ff900e37'),('2017032911385058dbe31aefbd5','2017032911012158dbda514bf46','28/03/2017','29-03-2017','2017030712224158beec6177244','001-001-123456789','1','','','','001','001','01/2016','','','2017030812313758c03ff900e37'),('2017032911414558dbe3c95169e','2017032911012158dbda514bf46','28/03/2017','29-03-2017','2017030712224158beec6177244','001-001-123456789','1','','','','001','001','01/2016','','','2017030812313758c03ff900e37');
/*!40000 ALTER TABLE `comprobanteretencion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contribuyente`
--

DROP TABLE IF EXISTS `contribuyente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contribuyente` (
  `id` varchar(50) NOT NULL,
  `idTipoIdentificacion` varchar(50) DEFAULT NULL,
  `identificacion` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `razonSocial` text,
  `nombreComercial` text,
  `direccion` text,
  `telefono` varchar(50) DEFAULT NULL,
  `obligado` varchar(45) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `FK_tipoIdenticacion_Idetificacion_idx` (`idTipoIdentificacion`),
  CONSTRAINT `FK_tipoIdenticacion_Idetificacion` FOREIGN KEY (`idTipoIdentificacion`) REFERENCES `tipoidentificacion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contribuyente`
--

LOCK TABLES `contribuyente` WRITE;
/*!40000 ALTER TABLE `contribuyente` DISABLE KEYS */;
INSERT INTO `contribuyente` VALUES ('2017031410315658c80cecd064a','2017030712301258beee244e12e','1091732935001','info@accionimbaburapak.com.ec','COOPERATIVA DE AHORRO Y CREDITO ACCION IMBABURAPAK LTDA','COOPERATIVA DE AHORRO Y CREDITO ACCION IMBABURAPAK LTDA','IMBABURA / OTAVALO / ANTONIO JOSE DE SUCRE Y CRISTOBAL COLON','062922846','SI','1'),('2017032911012158dbda514bf46','2017030712301958beee2b59e42','1002910345','wnarvaez@accionimbaburapak.com.ec','WILLI ALFONSO NARVAEZ IÑAHUAZO','WILLI ALFONSO NARVAEZ IÑAHUAZO','Cdla. Manuel Córdova Galarza','062922992','NO','1');
/*!40000 ALTER TABLE `contribuyente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detallecomprobanteretencion`
--

DROP TABLE IF EXISTS `detallecomprobanteretencion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detallecomprobanteretencion` (
  `id` varchar(50) NOT NULL,
  `idComprobanteRetencion` varchar(50) DEFAULT NULL,
  `idCodigoRetencion` varchar(50) DEFAULT NULL,
  `baseImponible` varchar(45) DEFAULT NULL,
  `idCodigoImpuesto` varchar(50) DEFAULT NULL,
  `porcentaje` varchar(50) DEFAULT NULL,
  `valorRetenido` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `FK_comprobante_detalle_idx` (`idComprobanteRetencion`),
  CONSTRAINT `FK_comprobante_detalle` FOREIGN KEY (`idComprobanteRetencion`) REFERENCES `comprobanteretencion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detallecomprobanteretencion`
--

LOCK TABLES `detallecomprobanteretencion` WRITE;
/*!40000 ALTER TABLE `detallecomprobanteretencion` DISABLE KEYS */;
INSERT INTO `detallecomprobanteretencion` VALUES ('2017032910324958dbd3a1975b5','2017032910324958dbd3a18de70','2017030713273058befb9210f2a','22','2017030712445358bef19540021','8','1.76'),('2017032910364858dbd4903f7bd','2017032910364858dbd490324bc','2017030713273058befb9210f2a','22','2017030712445358bef19540021','8','1.76'),('2017032910370058dbd49c07ef4','2017032910370058dbd49c00e09','2017030713273058befb9210f2a','22','2017030712445358bef19540021','8','1.76'),('2017032910371458dbd4aa7890e','2017032910371458dbd4aa7385b','2017030713273058befb9210f2a','22','2017030712445358bef19540021','8','1.76'),('2017032910375458dbd4d2a1a0d','2017032910375458dbd4d2967a9','2017030713273058befb9210f2a','22','2017030712445358bef19540021','8','1.76'),('2017032910391758dbd525504c9','2017032910391758dbd52545233','2017030713273058befb9210f2a','22','2017030712445358bef19540021','8','1.76'),('2017032910401858dbd5624aeb6','2017032910401858dbd5623fa70','2017030713273058befb9210f2a','22','2017030712445358bef19540021','8','1.76'),('2017032910434758dbd6332b1d5','2017032910434758dbd6331dcc4','2017030713273058befb9210f2a','22','2017030712445358bef19540021','8','1.76'),('2017032910440158dbd64100e52','2017032910440058dbd640edfb0','2017030713273058befb9210f2a','22','2017030712445358bef19540021','8','1.76'),('2017032910461258dbd6c40f69c','2017032910461258dbd6c40594e','2017030713273058befb9210f2a','22','2017030712445358bef19540021','8','1.76'),('2017032910492658dbd78637b12','2017032910492658dbd786304e4','2017030713273058befb9210f2a','22','2017030712445358bef19540021','8','1.76'),('2017032910504458dbd7d47b92b','2017032910504458dbd7d470270','2017030713273058befb9210f2a','22','2017030712445358bef19540021','8','1.76'),('2017032910512658dbd7fe8d6d2','2017032910512658dbd7fe86254','2017030713273058befb9210f2a','22','2017030712445358bef19540021','8','1.76'),('2017032910513058dbd802165b2','2017032910513058dbd80208ff1','2017030713273058befb9210f2a','22','2017030712445358bef19540021','8','1.76'),('2017032910554458dbd90070ff7','2017032910554458dbd90069ce7','2017030713273058befb9210f2a','22','2017030712445358bef19540021','8','1.76'),('2017032911012158dbda516aa7b','2017032911012158dbda5159358','2017030713273058befb9210f2a','22','2017030712445358bef19540021','8','1.76'),('2017032911112758dbdcafb8b69','2017032911112758dbdcafaa0be','2017030713273058befb9210f2a','22','2017030712445358bef19540021','8','1.76'),('2017032911244258dbdfcab72c6','2017032911244258dbdfcaafe81','2017030713273058befb9210f2a','22','2017030712445358bef19540021','8','1.76'),('2017032911244258dbdfcad940f','2017032911244258dbdfcaafe81','2017030713261358befb45e5050','223','2017030712450658bef1a22881b','5','11.15'),('2017032911292658dbe0e6d2b06','2017032911292658dbe0e6cd73a','2017030713273058befb9210f2a','22','2017030712445358bef19540021','8','1.76'),('2017032911292658dbe0e6e4ee0','2017032911292658dbe0e6cd73a','2017030713261358befb45e5050','223','2017030712450658bef1a22881b','5','11.15'),('2017032911315158dbe17781490','2017032911315158dbe17778329','2017030713273058befb9210f2a','22','2017030712445358bef19540021','8','1.76'),('2017032911315158dbe17799fd5','2017032911315158dbe17778329','2017030713261358befb45e5050','223','2017030712450658bef1a22881b','5','11.15'),('2017032911334058dbe1e49d77b','2017032911334058dbe1e492337','2017030713273058befb9210f2a','22','2017030712445358bef19540021','8','1.76'),('2017032911334058dbe1e4b3f60','2017032911334058dbe1e492337','2017030713261358befb45e5050','223','2017030712450658bef1a22881b','5','11.15'),('2017032911365058dbe2a2a60b6','2017032911365058dbe2a29cbd4','2017030713273058befb9210f2a','22','2017030712445358bef19540021','8','1.76'),('2017032911365058dbe2a2c4b72','2017032911365058dbe2a29cbd4','2017030713261358befb45e5050','223','2017030712450658bef1a22881b','5','11.15'),('2017032911372658dbe2c66dfd7','2017032911372658dbe2c662889','2017030713273058befb9210f2a','22','2017030712445358bef19540021','8','1.76'),('2017032911372658dbe2c684584','2017032911372658dbe2c662889','2017030713261358befb45e5050','223','2017030712450658bef1a22881b','5','11.15'),('2017032911380258dbe2eac3015','2017032911380258dbe2eab99dc','2017030713273058befb9210f2a','22','2017030712445358bef19540021','8','1.76'),('2017032911380258dbe2eade1a9','2017032911380258dbe2eab99dc','2017030713261358befb45e5050','223','2017030712450658bef1a22881b','5','11.15'),('2017032911385158dbe31b06ee1','2017032911385058dbe31aefbd5','2017030713273058befb9210f2a','22','2017030712445358bef19540021','8','1.76'),('2017032911385158dbe31b1fc4f','2017032911385058dbe31aefbd5','2017030713261358befb45e5050','223','2017030712450658bef1a22881b','5','11.15'),('2017032911414558dbe3c95ad2f','2017032911414558dbe3c95169e','2017030713273058befb9210f2a','22','2017030712445358bef19540021','8','1.76'),('2017032911414558dbe3c97a19d','2017032911414558dbe3c95169e','2017030713261358befb45e5050','223','2017030712450658bef1a22881b','5','11.15'),('2017032911414558dbe3c991a79','2017032911414558dbe3c95169e','2017030713243658befae438063','22','2017030712445858bef19a6eb62','20','4.4'),('2017032911414558dbe3c9a73fd','2017032911414558dbe3c95169e','2017030713252958befb1928a67','23','2017030712445858bef19a6eb62','0','0');
/*!40000 ALTER TABLE `detallecomprobanteretencion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresa` (
  `id` varchar(50) NOT NULL,
  `razonSocial` text,
  `nombreComercial` text,
  `direccion` text,
  `telefono` varchar(45) DEFAULT NULL,
  `ruc` varchar(45) DEFAULT NULL,
  `puntoEmision` varchar(45) DEFAULT NULL,
  `establecimiento` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `autorizacion` varchar(45) DEFAULT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  `direccionEstablecimiento` text,
  `obligacion` varchar(45) DEFAULT NULL,
  `contribuyente` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` VALUES ('2017030812313758c03ff900e37','COOPERATIVA DE AHORRO Y CREDITO ACCION IMBABURAPAK LTDA','COOPERATIVA DE AHORRO Y CREDITO ACCION IMBABURAPAK LTDA','IMBABURA / OTAVALO / ANTONIO JOSE DE SUCRE Y CRISTOBAL COLON','062922846','1091732935001','001','001','info@accionimbaburapak.com.ec','1119259502','OTAVALO ECUADOR','ANTONIO JOSE DE SUCRE Y CRISTOBAL COLON','SI',''),('2017030812375758c041756f2e7','COOPERATIVA DE AHORRO Y CREDITO ACCION IMBABURAPAK LTDA','COOPERATIVA DE AHORRO Y CREDITO ACCION IMBABURAPAK LTDA','ANTONIO JOSE DE SUCRE Y CRISTOBAL COLON','062603337','1091732935001','001','002','info@accionimbaburapak.com.ec','1115211713','IBARRA ECUADOR','AV. JAIME RIVADENERIA Y MARIANO ACOSTA','SI',NULL),('2017030812475758c043cd073fd','COOPERATIVA DE AHORRO Y CREDITO ACCION IMBABURAPAK LTDA','COOPERATIVA DE AHORRO Y CREDITO ACCION IMBABURAPAK LTDA','SUCRE 11-07 ENTRE COLON Y MORALES','062909916','1091732935001','001','006','info@accionimbaburapak.com.ec','1115213433','ATUNTAQUI ECUADOR','RIO AMAZONAS Y ESPEJO','SI',NULL),('2017030812495658c04444c3eef','COOPERATIVA DE AHORRO Y CREDITO ACCION IMBABURAPAK LTDA','COOPERATIVA DE AHORRO Y CREDITO ACCION IMBABURAPAK LTDA','ANTONIO JOSE DE SUCRE Y CRISTOBAL COLON','062938009','1091732935001','001','003','info@accionimbaburapak.com.ec','1115211725','PIMAMPIRO ECUADOR','JUAN JOSE FLORES E IMBABURA',NULL,NULL),('2017030812521658c044d0efa3a','COOPERATIVA DE AHORRO Y CREDITO ACCION IMBABURAPAK LTDA','COOPERATIVA DE AHORRO Y CREDITO ACCION IMBABURAPAK LTDA','ANTONIO JOSE DE SUCRE ENTRE COLON Y MORALES','062290596','1091732935001','001','004','info@accionimbaburapak.com.ec','1115211740','SAN GABRIEL ECUADOR ','SIMON BOLIVAR Y ANTONIO JOSE DE SUCRE','SI',NULL),('2017030812541958c0454baa8d4','COOPERATIVA DE AHORRO Y CREDITO ACCION IMBABURAPAK LTDA','COOPERATIVA DE AHORRO Y CREDITO ACCION IMBABURAPAK LTDA','ANTONIO JOSE DE SUCRE ENTRE COLON Y MORALES','062205524','1091732935001','001','007','info@accionimbaburapak.com.ec','1115212545','JULIO ANDRADE ECUADOR','PICHINCHA ENTRE JUAN MONTALVO Y 13 DE ABRIL','SI',NULL),('2017030812552258c0458a05a6a','COOPERATIVA DE AHORRO Y CREDITO ACCION IMBABURAPAK LTDA','COOPERATIVA DE AHORRO Y CREDITO ACCION IMBABURAPAK LTDA','ANTONIO JOSE DE SUCRE ENTRE COLON Y MORALES','062961495','1091732935001','001','005','info@accionimbaburapak.com.ec','1115213430','TULCAN ECUADOR','SIMON BOLIVIAR Y BOYACA','SI',NULL);
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nivel`
--

DROP TABLE IF EXISTS `nivel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nivel` (
  `id` varchar(100) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nivel`
--

LOCK TABLES `nivel` WRITE;
/*!40000 ALTER TABLE `nivel` DISABLE KEYS */;
INSERT INTO `nivel` VALUES ('1','ADMINISTRADOR'),('2017030613573558bdb11fdaaea','CONTADORA'),('2017030711382158bee1fd5e728','FINANCIERA');
/*!40000 ALTER TABLE `nivel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tarifaimpuesto`
--

DROP TABLE IF EXISTS `tarifaimpuesto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tarifaimpuesto` (
  `id` varchar(50) NOT NULL,
  `idImpuesto` varchar(50) DEFAULT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `FK_tarifa_impuesto_idx` (`idImpuesto`),
  CONSTRAINT `FK_tarifa_impuesto` FOREIGN KEY (`idImpuesto`) REFERENCES `tipoimpuesto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarifaimpuesto`
--

LOCK TABLES `tarifaimpuesto` WRITE;
/*!40000 ALTER TABLE `tarifaimpuesto` DISABLE KEYS */;
INSERT INTO `tarifaimpuesto` VALUES ('2017030713034658bef602cd14e','2017030712381658bef0083ca96','0','0','IMPUESTO IVA'),('2017030713051258bef658f0386','2017030712381658bef0083ca96','2','12','IMPUESTO IVA'),('2017030713052658bef6662026e','2017030712381658bef0083ca96','3','14','IMPUESTO IVA'),('2017030713054758bef67b0ab72','2017030712381658bef0083ca96','6','0','NO OBJETO DE IMPUESTO'),('2017030713055658bef684de08f','2017030712381658bef0083ca96','7','0','EXENTO DE IVA'),('2017030713062058bef69c70801','2017030712382758bef01350977','3023','150','Productos del tabaco y sucedáneos del tabaco (abarcan los productos preparados totalmente o en parte utilizando como materia prima hojas de tabaco y destinados a ser fumados, chupados, inhalados, mascados o utilizados como rapé)'),('2017030713063358bef6a9acbe7','2017030712382758bef01350977','3610','20','Perfumes y aguas de tocador'),('2017030713065258bef6bc88246','2017030712382758bef01350977','3620','35','VIDEOJUEGOS');
/*!40000 ALTER TABLE `tarifaimpuesto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tarifaretencion`
--

DROP TABLE IF EXISTS `tarifaretencion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tarifaretencion` (
  `id` varchar(50) NOT NULL,
  `idTarifa` varchar(50) DEFAULT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `FK_tarifa_retencion_idx` (`idTarifa`),
  CONSTRAINT `FK_tarifa_retencion` FOREIGN KEY (`idTarifa`) REFERENCES `tiporetencion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarifaretencion`
--

LOCK TABLES `tarifaretencion` WRITE;
/*!40000 ALTER TABLE `tarifaretencion` DISABLE KEYS */;
INSERT INTO `tarifaretencion` VALUES ('2017030713242358befad7b93ea','2017030712445858bef19a6eb62','9','10','Retención IVA'),('2017030713243658befae438063','2017030712445858bef19a6eb62','10','20','Retención IVA'),('2017030713244658befaeee5450','2017030712445858bef19a6eb62','1','30','Retención IVA'),('2017030713245858befafa94223','2017030712445858bef19a6eb62','11','50','Retención IVA'),('2017030713250658befb02e9361','2017030712445858bef19a6eb62','2','70','Retención IVA'),('2017030713251758befb0d8dce9','2017030712445858bef19a6eb62','3','100','Retención IVA'),('2017030713252958befb1928a67','2017030712445858bef19a6eb62','7','0','Retención IVA'),('2017030713253658befb2083d15','2017030712445858bef19a6eb62','8','0','Retención IVA'),('2017030713261358befb45e5050','2017030712450658bef1a22881b','4580','5','Retención ISD'),('2017030713263958befb5f005da','2017030712445358bef19540021','303','10','Honorarios profesionales y demás pagos por servicios relacionados con el tÍ­tulo profesional'),('2017030713273058befb9210f2a','2017030712445358bef19540021','304','8','Servicios predomina el intelecto no relacionados con el título profesional'),('2017030713295458befc22e4b00','2017030712445358bef19540021','304A','8','Comisiones y demás pagos por servicios predomina intelecto no relacionados con el título profesional'),('2017030713330758befce383479','2017030712445358bef19540021','304B','8','Pagos a notarios y registradores de la propiedad y mercantil por sus actividades ejercidas como tales'),('2017030713332158befcf181c41','2017030712445358bef19540021','304C','8','Pagos a deportistas, entrenadores, árbitros, miembros del cuerpo técnico por sus actividades ejercidas como tales'),('2017030713333158befcfb85916','2017030712445358bef19540021','304D','8','Pagos a artistas por sus actividades ejercidas como tales'),('2017030713334158befd0512b60','2017030712445358bef19540021','304E','8','Honorarios y demás pagos por servicios de docencia'),('2017030713335258befd10af9c9','2017030712445358bef19540021','307','2','Servicios predomina la mano de obra'),('2017030713340258befd1af1ac5','2017030712445358bef19540021','308','10','Utilización o aprovechamiento de la imagen o renombre'),('2017030713341558befd27238b3','2017030712445358bef19540021','309','1','Servicios prestados por medios de comunicación y agencias de publicidad'),('2017030713342658befd326afd9','2017030712445358bef19540021','310','1','Servicio de transporte privado de pasajeros o transporte público o privado de carga'),('2017030713343558befd3b2b645','2017030712445358bef19540021','311','2','Por pagos a través de liquidación de compra (nivel cultural o rusticidad)'),('2017030713344458befd44eb6c6','2017030712445358bef19540021','312','1','Transferencia de bienes muebles de naturaleza corporal'),('2017030713345658befd5091fc7','2017030712445358bef19540021','312A','1','Compra de bienes de origen agrícola, avícola, pecuario, apícola, cunícula, bioacuático, y forestal'),('2017030713350958befd5d38901','2017030712445358bef19540021','314A','8','Regalías por concepto de franquicias de acuerdo a Ley de Propiedad Intelectual - pago a personas naturales'),('2017030713352358befd6b76490','2017030712445358bef19540021','314B','8','Cánones, derechos de autor,  marcas, patentes y similares de acuerdo a Ley de Propiedad Intelectual – pago a personas naturales'),('2017030713353858befd7a72582','2017030712445358bef19540021','314C','8','Regalías por concepto de franquicias de acuerdo a Ley de Propiedad Intelectual  - pago a sociedades'),('2017030713355958befd8f5268b','2017030712445358bef19540021','314D','8','Cánones, derechos de autor,  marcas, patentes y similares de acuerdo a Ley de Propiedad Intelectual – pago a sociedades'),('2017030713361058befd9a6d2ce','2017030712445358bef19540021','319','1','Cuotas de arrendamiento mercantil, inclusive la de opción de compra'),('2017030713362558befda9182cd','2017030712445358bef19540021','320','8','Por arrendamiento bienes inmuebles'),('2017030713363858befdb600ac6','2017030712445358bef19540021','322','1','Seguros y reaseguros (primas y cesiones)'),('2017030713365458befdc62834b','2017030712445358bef19540021','323','2','Por rendimientos financieros pagados a naturales y sociedades  (No a IFIs)'),('2017030713371158befdd70d961','2017030712445358bef19540021','323A','2','Por RF: depósitos Cta. Corriente'),('2017030713372358befde320cc5','2017030712445358bef19540021','323B1','2','Por RF:  depósitos Cta. Ahorros Sociedades'),('2017030713373958befdf333554','2017030712445358bef19540021','323E','2','Por RF: depósito a plazo fijo  gravados'),('2017030713375458befe020759b','2017030712445358bef19540021','323E2','0','Por RF: depósito a plazo fijo exentos'),('2017030713380658befe0e57d85','2017030712445358bef19540021','323F','2','Por rendimientos financieros: operaciones de reporto - repos'),('2017030713381558befe179e0af','2017030712445358bef19540021','323G','2','Por RF: inversiones (captaciones) rendimientos distintos de aquellos pagados a IFIs'),('2017030713382258befe1ea0d38','2017030712445358bef19540021','323H','2','Por RF: obligaciones'),('2017030713383358befe29846a0','2017030712445358bef19540021','323I','2','Por RF: bonos convertible en acciones'),('2017030713384358befe33e4432','2017030712445358bef19540021','323M','2','Por RF: Inversiones en títulos valores en renta fija gravados '),('2017030713385458befe3e32ea5','2017030712445358bef19540021','323N','0','Por RF: Inversiones en títulos valores en renta fija exentos'),('2017030713432458beff4ca6824','2017030712445358bef19540021','323O','0','Por RF: Intereses pagados a bancos y otras entidades sometidas al control de la Superintendencia de Bancos y de la Economía Popular y Solidaria'),('2017030713434058beff5cab9d9','2017030712445358bef19540021','323P','2','Por RF: Intereses pagados por entidades del sector público a favor de sujetos pasivos'),('2017030713435058beff668721b','2017030712445358bef19540021','323Q','2','Por RF: Otros intereses y rendimientos financieros gravados '),('2017030713435958beff6fbbfea','2017030712445358bef19540021','323R','0','Por RF: Otros intereses y rendimientos financieros exentos'),('2017030713441258beff7c08f79','2017030712445358bef19540021','324A','1','Por RF: Intereses en operaciones de crédito entre instituciones del sistema financiero y entidades economía popular y solidaria. '),('2017030713442358beff878db25','2017030712445358bef19540021','324B','1','Por RF: Por inversiones entre instituciones del sistema financiero y entidades economía popular y solidaria.'),('2017030713443358beff9127c78','2017030712445358bef19540021','325','22','Anticipo dividendos'),('2017030713444558beff9d307e1','2017030712445358bef19540021','325A','22','Dividendos anticipados préstamos accionistas, beneficiarios o partícipes'),('2017030713445758beffa98ea8d','2017030712445358bef19540021','326','100','Dividendos distribuidos que correspondan al impuesto a la renta único establecido en el art. 27 de la lrti'),('2017030713451158beffb73ec5b','2017030712445358bef19540021','327','22','Dividendos distribuidos a personas naturales residentes cuando la sociedad que distribuye aplicó tarifa del 22% IR'),('2017030713453258beffcc3d5b5','2017030712445358bef19540021','328','0','Dividendos distribuidos a sociedades residentes'),('2017030713454858beffdc30a3c','2017030712445358bef19540021','329','0','Dividendos distribuidos a fideicomisos residentes'),('2017030713460858befff059345','2017030712445358bef19540021','330','22','Dividendos gravados distribuidos en acciones (reinversión de utilidades sin derecho a reducción tarifa IR) cuando la sociedad que distribuye aplicó tarifa del 22% IR'),('2017030713462058befffc9436a','2017030712445358bef19540021','331','0','Dividendos exentos distribuidos en acciones (reinversión de utilidades con derecho a reducción tarifa IR) '),('2017030713462758bf0003397c5','2017030712445358bef19540021','332','0','Otras compras de bienes y servicios no sujetas a retención'),('2017030713464658bf0016e7585','2017030712445358bef19540021','332A','0','Por la enajenación ocasional de acciones o participaciones y títulos valores'),('2017030713465658bf0020d3b53','2017030712445358bef19540021','332B','0','Compra de bienes inmuebles'),('2017030713470758bf002b229af','2017030712445358bef19540021','332C','0','Transporte público de pasajeros'),('2017030713471658bf0034730ed','2017030712445358bef19540021','332D','0','Pagos en el país por transporte de pasajeros o transporte internacional de carga, a compañías nacionales o extranjeras de aviación o marítimas'),('2017030713472858bf0040dbf7c','2017030712445358bef19540021','332E','0','Valores entregados por las cooperativas de transporte a sus socios'),('2017030713473858bf004aeb004','2017030712445358bef19540021','332F','0','Compraventa de divisas distintas al dólar de los Estados Unidos de América'),('2017030713474958bf005570585','2017030712445358bef19540021','332G','0','Pagos con tarjeta de crédito '),('2017030713480458bf00641d4c2','2017030712445358bef19540021','332H','0','Pago al exterior tarjeta de crédito reportada por la Emisora de tarjeta de crédito, solo recap'),('2017030713481658bf00704775a','2017030712445358bef19540021','332I','0','Pago a través de convenio de debito (Clientes IFI`s)'),('2017030713482658bf007a7d503','2017030712445358bef19540021','333','0.20','Enajenación de derechos representativos de capital y otros derechos cotizados en bolsa ecuatoriana'),('2017030713484058bf00883b194','2017030712445358bef19540021','334','1','Enajenación de derechos representativos de capital y otros derechos no cotizados en bolsa ecuatoriana'),('2017030713485158bf0093d2df5','2017030712445358bef19540021','335','15','Por loterías, rifas, apuestas y similares'),('2017030713491058bf00a6dc6a7','2017030712445358bef19540021','336','0.002','Por venta de combustibles a comercializadoras'),('2017030713492358bf00b3f4094','2017030712445358bef19540021','337','0.003','Por venta de combustibles a distribuidores'),('2017030713493658bf00c023772','2017030712445358bef19540021','338','0','Compra local de banano a productor'),('2017030713494858bf00cc2d27a','2017030712445358bef19540021','339','100','Liquidación impuesto único a la venta local de banano de producción propia'),('2017030713500058bf00d8b1e61','2017030712445358bef19540021','340','0','Impuesto único a la exportación de banano de producción propia - componente 1'),('2017030713500858bf00e092c22','2017030712445358bef19540021','341','0','Impuesto único a la exportación de banano de producción propia - componente 2'),('2017030713502358bf00efaf88b','2017030712445358bef19540021','342','1.75','Impuesto único a la exportación de banano producido por terceros'),('2017030713503358bf00f9edeed','2017030712445358bef19540021','342A','0.5','Impuesto único a la exportación de banano producido por terceros de Asociaciones de micro y pequeños productores hasta 1000 cajas por semana por cada socio.'),('2017030713504658bf0106b43ff','2017030712445358bef19540021','342B','1','Impuesto único a la exportación de banano producido por terceros de Asociaciones de micro, pequeños y medianos productores'),('2017030713505858bf01120943e','2017030712445358bef19540021','343A','1','Por energía eléctrica'),('2017030713510858bf011c447d7','2017030712445358bef19540021','343B','1','Por actividades de construcción de obra material inmueble, urbanización, lotización o actividades similares'),('2017030713511858bf0126bc440','2017030712445358bef19540021','344','2','Otras retenciones aplicables el 2%'),('2017030713512858bf013006442','2017030712445358bef19540021','344A','2','Pago local tarjeta de crédito reportada por la Emisora de tarjeta de crédito, solo recap'),('2017030713514158bf013d08281','2017030712445358bef19540021','346A','10','Ganancias de capital');
/*!40000 ALTER TABLE `tarifaretencion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipoambiente`
--

DROP TABLE IF EXISTS `tipoambiente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipoambiente` (
  `id` varchar(50) NOT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipoambiente`
--

LOCK TABLES `tipoambiente` WRITE;
/*!40000 ALTER TABLE `tipoambiente` DISABLE KEYS */;
INSERT INTO `tipoambiente` VALUES ('2017030711572258bee6722d311','1','PRUEBAS'),('2017030712025358bee7bd7b8c8','2','PRODUCCIÓN');
/*!40000 ALTER TABLE `tipoambiente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipocomprobante`
--

DROP TABLE IF EXISTS `tipocomprobante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipocomprobante` (
  `id` varchar(50) NOT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipocomprobante`
--

LOCK TABLES `tipocomprobante` WRITE;
/*!40000 ALTER TABLE `tipocomprobante` DISABLE KEYS */;
INSERT INTO `tipocomprobante` VALUES ('2017030712224158beec6177244','01','FACTURA'),('2017030712225458beec6e1ef08','04','NOTA CRÉDITO'),('2017030712230458beec781d5eb','05','NOTA DÉBITO'),('2017030712233458beec9653fdc','06','GUÍA DE REMISIÓN'),('2017030712234458beeca0814cb','07','COMPROBANTE DE RETENCIÓN');
/*!40000 ALTER TABLE `tipocomprobante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipoemision`
--

DROP TABLE IF EXISTS `tipoemision`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipoemision` (
  `id` varchar(50) NOT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipoemision`
--

LOCK TABLES `tipoemision` WRITE;
/*!40000 ALTER TABLE `tipoemision` DISABLE KEYS */;
INSERT INTO `tipoemision` VALUES ('2017030712113758bee9c9aae87','1','Emisión Normal'),('2017030712114258bee9ceb76df','2','Emisión por Indisponiblidad del Sistema');
/*!40000 ALTER TABLE `tipoemision` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipoidentificacion`
--

DROP TABLE IF EXISTS `tipoidentificacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipoidentificacion` (
  `id` varchar(50) NOT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipoidentificacion`
--

LOCK TABLES `tipoidentificacion` WRITE;
/*!40000 ALTER TABLE `tipoidentificacion` DISABLE KEYS */;
INSERT INTO `tipoidentificacion` VALUES ('2017030712301258beee244e12e','04','RUC'),('2017030712301958beee2b59e42','05','CÉDULA'),('2017030712302558beee3172257','06','PASAPORTE'),('2017030712303858beee3ee4d61','07','VENTA A CONSUMIDOR FINAL *'),('2017030712305558beee4f0accb','08','IDENTIFICACIÓN DEL EXTERIOR *'),('2017030712310358beee5703192','09','PLACA');
/*!40000 ALTER TABLE `tipoidentificacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipoimpuesto`
--

DROP TABLE IF EXISTS `tipoimpuesto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipoimpuesto` (
  `id` varchar(50) NOT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipoimpuesto`
--

LOCK TABLES `tipoimpuesto` WRITE;
/*!40000 ALTER TABLE `tipoimpuesto` DISABLE KEYS */;
INSERT INTO `tipoimpuesto` VALUES ('2017030712381658bef0083ca96','2','IVA'),('2017030712382758bef01350977','3','ICE'),('2017030712383458bef01a8dba6','5','IRBPNR');
/*!40000 ALTER TABLE `tipoimpuesto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiporetencion`
--

DROP TABLE IF EXISTS `tiporetencion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiporetencion` (
  `id` varchar(50) NOT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiporetencion`
--

LOCK TABLES `tiporetencion` WRITE;
/*!40000 ALTER TABLE `tiporetencion` DISABLE KEYS */;
INSERT INTO `tiporetencion` VALUES ('2017030712445358bef19540021','1','RENTA'),('2017030712445858bef19a6eb62','2','IVA'),('2017030712450658bef1a22881b','6','ISD');
/*!40000 ALTER TABLE `tiporetencion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` varchar(100) NOT NULL,
  `firtsName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `userName` varchar(45) DEFAULT NULL,
  `emailUser` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `fechaCreacion` varchar(100) DEFAULT NULL,
  `idNivel` varchar(100) DEFAULT NULL,
  `genero` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Fk_user_nivel_idx` (`idNivel`),
  CONSTRAINT `Fk_user_nivel` FOREIGN KEY (`idNivel`) REFERENCES `nivel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('1','WILLI','NARVAEZ','WilliN','w_narvaez6@hotmail.com','e10adc3949ba59abbe56e057f20f883e','2017-03-07 11:29:57','1',1),('2017030614191058bdb62e73e90','TATIANA','VARGAS','TVARGAS','tvargas@accionimbaburapak.com.ec','e10adc3949ba59abbe56e057f20f883e','2017-03-07 11:27:18','2017030613573558bdb11fdaaea',2);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'facturacion'
--

--
-- Dumping routines for database 'facturacion'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-29 18:46:29
