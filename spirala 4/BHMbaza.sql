-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: bhmountain
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `komentar`
--

DROP TABLE IF EXISTS `komentar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `komentar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `vijest` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vijest` (`vijest`),
  CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`vijest`) REFERENCES `vijest` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `komentar`
--

LOCK TABLES `komentar` WRITE;
/*!40000 ALTER TABLE `komentar` DISABLE KEYS */;
/*!40000 ALTER TABLE `komentar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin` tinyint(1) NOT NULL,
  `username` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_slovenian_ci NOT NULL,
  `ime` varchar(30) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `korisnik`
--

LOCK TABLES `korisnik` WRITE;
/*!40000 ALTER TABLE `korisnik` DISABLE KEYS */;
INSERT INTO `korisnik` VALUES (1,1,'admin','21232f297a57a5a743894a0e4a801fc3','Admin'),(3,0,'boja','1f24356a833788d6ca4c2f074b3b079a','Boja');
/*!40000 ALTER TABLE `korisnik` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vijest`
--

DROP TABLE IF EXISTS `vijest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vijest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naslov` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `slika` text COLLATE utf8_slovenian_ci NOT NULL,
  `datum` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `komentar` tinyint(1) NOT NULL,
  `autor` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vijest`
--

LOCK TABLES `vijest` WRITE;
/*!40000 ALTER TABLE `vijest` DISABLE KEYS */;
INSERT INTO `vijest` VALUES (22,'Naslov','fgdb dfbvdfvsfvsdvsdvsdvsvsdvsdvsdvs\r\ndvsdvsdvsv','../images/prenj.jpg','2016-06-06T21:24:07',1,1),(23,'Prenj planina nije','sdklvljsnvjnsfkvjsnkjdvnksd\r\nsdvkjsdnvkjsnkjvnkjv','../images/prenj.jpg','2016-06-06T21:24:25',1,1),(26,'Uskoro renoviranje planinarskih objekata','U okviru projekta Via Dinarica - platforma za razvoj održivog turizma i lokalni ekonomski rast, uskoro počinje renoviranje objekata.','images/prenj.jpg','2016-06-06T21:43:54',1,1),(27,'Planinarska tura Maglić','Prije nego što ćemo krenuti na ovu turu proveli smo puno vremena na internetu pokušavajući vidjeti šta sve možemo očekivati. Odabrali smo najteži pravac uspona na Maglić, a to je takozvani Banjalučki smjer.','images/maglic.jpg','2016-06-06T21:44:33',0,1),(28,'Završena Via Ferrata Blagaj','U subotu 30.01 2016 god. je održana radna akcija čišćenja kanjona i izbušene su zadnje rupe i postavljene zadnje klanfe i sajle. Ostaje nam postavljanje znakova o sigurnosti i potrebnoj opremi i sve će biti onda otvoreno za javnost.','images/blagaj_climbing.jpg','2016-06-06T21:45:19',1,1),(29,'Vidimo se druže.','Planinar iz Sarajeva Dragi Novaković smrtno je stradao u nedjelju na lokalitetu Kotlovi na Bjelašnici, a sahrana će biti održana danas na groblju Donji Miljevići u Istočnom Sarajevu u 13 sati.','images/dragi_novakovic.jpg','2016-06-06T21:45:54',1,1),(30,'Bh. planinari osvojili italijanske Dolomite','Članovi planiraskog društva Zlatni ljiljan, njih 21 i pet kolega iz drugih planinarskih društava boravilo je dva dana na najvećoj svjetskoj planinarskoj destinaciji Dolomitima u Italiji.','../images/.jpg','2016-06-06T21:47:07',1,1);
/*!40000 ALTER TABLE `vijest` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-06-06 22:20:34
