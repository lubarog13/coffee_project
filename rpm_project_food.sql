-- MySQL dump 10.13  Distrib 8.0.11, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: rpm_project
-- ------------------------------------------------------
-- Server version	8.0.11

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
-- Table structure for table `food`
--

DROP TABLE IF EXISTS `food`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `food` (
  `idfood` int(11) NOT NULL AUTO_INCREMENT,
  `food_name` varchar(50) NOT NULL,
  `photo_link` varchar(45) NOT NULL,
  `short_description` varchar(200) NOT NULL,
  `long_description_link` varchar(45) NOT NULL,
  `provider_name` varchar(45) NOT NULL,
  `food_price` float NOT NULL,
  `food_count` int(11) NOT NULL,
  `food_type` enum('tea','coffee','other') DEFAULT NULL,
  PRIMARY KEY (`idfood`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `food`
--

LOCK TABLES `food` WRITE;
/*!40000 ALTER TABLE `food` DISABLE KEYS */;
INSERT INTO `food` VALUES (1,'Blue Beard Coffie Efiopia','blue_beard_coffee.jpg','Премиальный кофе из эфиопии, 100% арабика, 250г.','blue_beard_coffee.txt','BlueBeard',540,200,'coffee'),(2,'Organic Tierra Del Soul','coffee.jpg','Оригинальный кофе из Мексики, 100% арабика, 250г.','coffee.txt','mcher fanna',390,1000,'coffee'),(3,'Ethiopia Irgacheff','efiopia_coffee.jpg','Молотый кофе из эфиопии, 100% арабика, 250г.','efiopia_coffee.txt','the MOOD',450,2000,'coffee'),(4,'Таежный сбор','flour_tea.jpg','Смесь зеленого чая сенча и таежных трав, 100г.','flour_tea.txt','Чайная фактория',130,180,'tea'),(5,'Valencia','granell_coffee.jpg','Натуральные кофейные зерна с нотками франции, 100% арабика, 250 г.','granell_coffee.txt','Granell',454,50,'coffee'),(6,'Grean tea peach&apricount','jaf_tea.jpg','Оригинальный чайный микс зеленого чая и кусочков абрикоса и персика, 100г. ','jaf_tea.txt','Jaf tea',246,20,'tea'),(7,'Сенча Фукамуси Премиум','tea.jpg','Классический японский зеленый чай сенча, 100г.','tea.txt','Gurman bazar',100,120,'tea');
/*!40000 ALTER TABLE `food` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-03 17:56:44
