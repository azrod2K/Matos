-- MySQL dump 10.19  Distrib 10.3.34-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: MatosV2
-- ------------------------------------------------------
-- Server version	10.3.34-MariaDB-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `idImage` int(11) NOT NULL AUTO_INCREMENT,
  `nomImage` varchar(100) NOT NULL,
  `lienImage` varchar(100) NOT NULL,
  `idMateriel` int(11) NOT NULL,
  PRIMARY KEY (`idImage`),
  KEY `idMateriel` (`idMateriel`),
  CONSTRAINT `fk_idMateriel_images` FOREIGN KEY (`idMateriel`) REFERENCES `materiels` (`idMateriel`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (9,'mac-pro.jpg','./assets/img/materiel',1),(10,'hp-dragonfly.jpg','./assets/img/materiel',2),(11,'msi-GS77.jpg','./assets/img/materiel',3),(12,'tp-link-routeur.jpg','./assets/img/materiel',4),(13,'asus-bt400.jpg','./assets/img/materiel',5),(14,'devolo-dlan-550.jpg','./assets/img/materiel',6),(15,'roline-network.jpg','./assets/img/materiel',7),(16,'apple-adaptateur-usb-c-to-usb.jpg','./assets/img/materiel',8),(17,'icy-box-ib-ac6104-b.jpg','./assets/img/materiel',9),(18,'iphone-12.jpg','./assets/img/materiel',10),(19,'galaxy-a53.jpg','./assets/img/materiel',11),(20,'pixel-6.jpg','./assets/img/materiel',12),(21,'silhouette-alta-plus.jpg','./assets/img/materiel',13),(22,'htc-Vive-pro-2.jpg','./assets/img/materiel',14),(23,'AOC-AG353UCG.jpg','./assets/img/materiel',15);
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materiels`
--

DROP TABLE IF EXISTS `materiels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materiels` (
  `idMateriel` int(11) NOT NULL AUTO_INCREMENT,
  `marque` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `dateEntreeStock` date NOT NULL,
  `actif` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = disponible 0= pas disponible',
  `categorie` varchar(50) NOT NULL,
  `isDelete` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=visible 0=invisible',
  PRIMARY KEY (`idMateriel`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materiels`
--

LOCK TABLES `materiels` WRITE;
/*!40000 ALTER TABLE `materiels` DISABLE KEYS */;
INSERT INTO `materiels` VALUES (1,'Apple Macbook Pro ','Processeur Apple M1 Max à dix cœurs avec 8 cœurs de performance.','2022-05-09',1,'ordinateur portables',1),(2,'HP Elite Dragonfly G2','Intel Core i7-1165G7 (2.8 GHz/4.7 GHz Turbo) Quad Core,','2022-05-09',1,'ordinateur portables',1),(3,'MSI Stealth GS77','Processeur Intel Core i9-12900H Tedra-Core de 3.8 à 5.0 GHz.','2022-05-09',1,'ordinateur portables',1),(4,'TP-Link Routeur vpn','Ports RJ-45: 5x 1000 Mbit/s, Ports WAN: 5.','2022-05-09',1,'réseau',1),(5,'Asus USB-BT400','Bluetooth v4.0. USB 2.0. FHSS (Frequency Hopping Spread Spectrum).','2022-05-09',1,'réseau',1),(6,'Devolo dLan 550 duo+','Adaptateur réseau sur courant porteur (CPL). 2 x Ethernet. jusqu\'à 500 Mbits/s.','2022-05-09',1,'réseau',1),(7,'Roline Network','Roline Cat.6A S/FTP. 10Gbps.','2022-05-09',1,'connectiques',1),(8,'Apple','USB-C to USB Adapter for MacBook.','2022-05-09',1,'connectiques',1),(9,'Icy Box IB-AC6104-B','Hub avec 4 connecteurs USB 3.0. Boîtier compact et élégant.','2022-05-09',1,'connectiques',1),(10,'Apple iphone 12','6.1\" OLED Super Retina XDR10 (1170x2532). Apple A14 Bionic ','2022-05-09',1,'téléphonie',1),(11,'Samsung Galaxy A53','Processeur Octa-Core de 2.4 GHz, 6 Go de RAM, 128 Go de mémoire interne.','2022-05-09',1,'téléphonie',1),(12,'Google Pixel 6','6.4\" OLED (2400x1080) @ 90 Hz. Google Tensor. 8 GB RAM. ','2022-05-09',1,'téléphonie',1),(13,'Silhouette alta Plus','Imprimante 3D pré-calibrée et pré-assemblée. Logiciel d\'impression 3D Silhouette. ','2022-05-09',1,'périphérique',1),(14,'HTC Vive Pro 2','Casque VR. Double écran LCD à faible persistance 2448 x 2448 pixels par œil.','2022-05-09',1,'périphérique',1),(15,'AOC AG353UCG','Ecran 35\" avec une résolution de 3440 x 1440 pixels (UWQHD).','2022-05-09',1,'périphérique',1);
/*!40000 ALTER TABLE `materiels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prets`
--

DROP TABLE IF EXISTS `prets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prets` (
  `idPret` int(11) NOT NULL AUTO_INCREMENT,
  `dateReservation` date NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `idMateriel` int(11) NOT NULL,
  `validation` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = en attente & 1 = valider',
  PRIMARY KEY (`idPret`),
  KEY `idUtilisateur` (`idUtilisateur`,`idMateriel`),
  KEY `fk_idMateriel_prets` (`idMateriel`),
  CONSTRAINT `fk_idMateriel_prets` FOREIGN KEY (`idMateriel`) REFERENCES `materiels` (`idMateriel`),
  CONSTRAINT `fk_idUtilisateur` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateurs` (`idUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prets`
--

LOCK TABLES `prets` WRITE;
/*!40000 ALTER TABLE `prets` DISABLE KEYS */;
INSERT INTO `prets` VALUES (12,'2022-05-09','2022-05-11','2022-05-18',7,1,0),(13,'2022-05-10','2022-05-11','2022-05-15',6,2,1);
/*!40000 ALTER TABLE `prets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utilisateurs` (
  `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `noTel` varchar(20) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `motDePasse` varchar(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `statut` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateurs`
--

LOCK TABLES `utilisateurs` WRITE;
/*!40000 ALTER TABLE `utilisateurs` DISABLE KEYS */;
INSERT INTO `utilisateurs` VALUES (6,'Machado','David ','0766154106','azrod2K','feafe03d42c0e3c6da6e9f578867aac8','david.mchdb@eduge.ch',1),(7,'test','test','798561535','tesst','0ce3266d4eb71ad50f7a90aee6d21dcd','test@test.com',1),(8,'admin','admin','0777777777','admin','dddcdaa8264e6d96baadd43f324fbd83','admin@admin.ch',2);
/*!40000 ALTER TABLE `utilisateurs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-11 16:30:42
