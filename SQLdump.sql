/*
SQLyog Community v13.1.1 (64 bit)
MySQL - 5.6.38-log : Database - heroku_70192c73b291e04
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`heroku_70192c73b291e04` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `heroku_70192c73b291e04`;

/*Table structure for table `duomenys` */

DROP TABLE IF EXISTS `duomenys`;

CREATE TABLE `duomenys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vardas` varchar(111) DEFAULT NULL,
  `pavarde` varchar(111) DEFAULT NULL,
  `adresas` varchar(111) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=622 DEFAULT CHARSET=utf8;

/*Data for the table `duomenys` */

insert  into `duomenys`(`id`,`vardas`,`pavarde`,`adresas`) values 
(2,'Harriette  ','Lafrance','USA'),
(5,'Jonas','Jonauskas','Vilnius.'),
(6,'Petras','Petrutis','Kaunas'),
(7,'Tadas','Tadauskas','Kaunas'),
(8,'Jaras','Jarutis','Kaunas'),
(9,'Makis','Makutis','Kaunas'),
(10,'Tadas','Blinda','Praeities g. 1800'),
(11,'Jonas','MaÄiulis','Maronio g. 12'),
(12,'Antanas','Baranauskas','Kaunas'),
(13,'Homeris','Simpsonas','Springfieldas'),
(14,'Fredas','Flinstonas','Akmens g.'),
(15,'Wiliamas','Godlingas','Musiu g.'),
(16,'Wiliamas','Sekspyras','Romeo g.'),
(17,'KÄ™stas','KÄ™stauskas','Kaunas'),
(18,'Marius','Jaskus','Kaunas'),
(19,'Gintaras','Sapak','Kaunas'),
(20,'Tomas','Kazlauskas','Babos g.'),
(21,'Mykolas','Brazauskas','Kaunas'),
(22,'Jonas','KuÄinskas','Kaunas'),
(23,'Virgis','Vigas','Kaunas'),
(24,'Stalis','Stlova','Kaunas'),
(25,'Balis','Bandada','VarÅ¡uva'),
(26,'Jonas','Argimantas','Kurmiskis'),
(27,'Olga','Sapo','Vilnius'),
(28,'Tadas','GraÅ¾usis','Kaunas'),
(29,'Jurgis','Kurmisza','Lenkija'),
(30,'Anita','Breedlove','England'),
(31,'Athena','Barry','England'),
(32,'Herminia','Udell','Germany'),
(33,'Demetria','Lafrance','Norway'),
(34,'Robbi','Burgess','Finland'),
(35,'Rochell','Virgin','England'),
(36,'Enrique','Gaccione','Spain'),
(37,'Dulce','Vandermark','Germany'),
(38,'Adella','Mcgregor','USA'),
(39,'Joetta','Penman','England'),
(40,'Kelle','Burkey','England'),
(41,'Lavenia','Whyte','USA'),
(42,'Roberta','Rainbolt','Ireland'),
(43,'Tresa','Cruze','England'),
(44,'Scott','Giron','USA'),
(45,'Ester','Fogel','USA'),
(46,'Katherina','Woodrum','USA'),
(47,'May','Bolanos','USA'),
(48,'Herbert','Sugarman','USA'),
(49,'Cristopher','Lafrance','USA'),
(50,'Alexis','Lafrance','USA'),
(51,'Antionette','Lafrance','England'),
(53,'Antone','Lafrance','USA'),
(54,'Jacquie ','Lafrance ','France'),
(55,'Naujas','Naujutis','Kaunas'),
(512,'Jonas','Saulytis','Vilnius'),
(522,'Dominykas','Rokas','Subaciaus g. 120, Vilnius'),
(532,'Pop','King','USA'),
(542,'Newest','Customer','England'),
(552,'John','Snow','France'),
(562,'Jonas','Arbuzas','Anglija'),
(572,'UrÅ¡ulÄ—','b','l'),
(582,'Bernardas','Brazdionis','Vilnius'),
(592,'Tomas','Tomilikas','Kaunas'),
(602,'Petras','Arbtuas','Vilnius'),
(612,'Hazel','Bunks','Loltown');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
