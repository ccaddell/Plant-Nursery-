-- MySQL dump 10.13  Distrib 8.0.27, for macos11 (x86_64)
--
-- Host: 127.0.0.1    Database: nursery
-- ------------------------------------------------------
-- Server version	8.0.28

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Customer`
--

DROP TABLE IF EXISTS `Customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Customer` (
  `CID` int NOT NULL,
  `Phone_Number` varchar(15) NOT NULL,
  `Discount` decimal(5,2) NOT NULL,
  `Beginning_Date` date NOT NULL,
  `First_Name` varchar(255) NOT NULL,
  `Last_Name` varchar(255) NOT NULL,
  PRIMARY KEY (`CID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Customer`
--

LOCK TABLES `Customer` WRITE;
/*!40000 ALTER TABLE `Customer` DISABLE KEYS */;
INSERT INTO `Customer` VALUES (1,'(470) 905-1022',10.00,'2022-04-12','Jennifer','Ives'),(2,' (588) 508-5850',5.00,'2020-01-15','Emma','Rooney'),(3,'(988) 334-3271',3.00,'2021-06-01','Richard','George'),(4,'(321) 206-5796',10.00,'2022-01-11','William','Powers'),(5,'(708) 202-0110',5.00,'2021-03-11','Martha','Seamons'),(6,'(928) 864-8659',15.00,'2021-07-30','Michelle','Johnson'),(7,'(236) 543-4465',5.00,'2022-02-04','Elizabeth','Manna'),(8,'(352) 928-4408',5.00,'2020-02-14','Ramiro','Bianchi'),(9,'(586) 863-8225',15.00,'2021-09-01','Phillip','Flores'),(10,'(830) 890-5788',5.00,'2019-12-01','Jose','Walters');
/*!40000 ALTER TABLE `Customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Orders`
--

DROP TABLE IF EXISTS `Orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Orders` (
  `OID` int NOT NULL AUTO_INCREMENT,
  `Total_Dollars` decimal(10,2) NOT NULL,
  `CID` int NOT NULL,
  `Order_Date` date NOT NULL,
  PRIMARY KEY (`OID`),
  KEY `orders_ibfk_1` (`CID`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`CID`) REFERENCES `Customer` (`CID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Orders`
--

LOCK TABLES `Orders` WRITE;
/*!40000 ALTER TABLE `Orders` DISABLE KEYS */;
INSERT INTO `Orders` VALUES (1,20.51,1,'2022-04-12'),(2,30.67,4,'2022-03-09'),(3,15.60,10,'2021-11-03'),(4,39.66,2,'2021-08-11');
/*!40000 ALTER TABLE `Orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Orders_Plants`
--

DROP TABLE IF EXISTS `Orders_Plants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Orders_Plants` (
  `OID` int NOT NULL,
  `PID` int NOT NULL,
  KEY `OID` (`OID`),
  KEY `PID` (`PID`),
  CONSTRAINT `orders_plants_ibfk_1` FOREIGN KEY (`OID`) REFERENCES `Orders` (`OID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `orders_plants_ibfk_2` FOREIGN KEY (`PID`) REFERENCES `Plants` (`PID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Orders_Plants`
--

LOCK TABLES `Orders_Plants` WRITE;
/*!40000 ALTER TABLE `Orders_Plants` DISABLE KEYS */;
INSERT INTO `Orders_Plants` VALUES (1,4),(2,5),(3,1),(3,8),(4,9);
/*!40000 ALTER TABLE `Orders_Plants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Plants`
--

DROP TABLE IF EXISTS `Plants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Plants` (
  `PID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Aisle` varchar(3) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Amt_in_Stock` int NOT NULL,
  `Water_Requirement` varchar(255) NOT NULL,
  `Sunlight_Requirement` varchar(255) NOT NULL,
  `is_Indoor` varchar(5) NOT NULL,
  `Is_Outdoor` varchar(5) NOT NULL,
  `Max_Quantity` int NOT NULL,
  `Is_Poisonous` varchar(5) NOT NULL,
  `Country_of_Origin` varchar(255) NOT NULL,
  `Is_Edible` varchar(5) NOT NULL,
  PRIMARY KEY (`PID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Plants`
--

LOCK TABLES `Plants` WRITE;
/*!40000 ALTER TABLE `Plants` DISABLE KEYS */;
INSERT INTO `Plants` VALUES (1,'Common Sweetleaf','A1',5.60,10,'Medium','Part Shade','No','Yes',15,'No','United States of America','Yes'),(2,'Virgina Strawberry','A2',4.84,5,'Low','Sun, Part Shade','No','Yes',25,'No','United States of America','Yes'),(3,'American Plum','B1',2.41,7,'High','Sun, Part Shade, Shade','No','Yes',20,'No','United States of America','Yes'),(4,'Dumb Cane','C5',10.00,4,'Low','Part Shade','Yes','No',10,'Yes','Brazil','No'),(5,'Daffodil','C6',2.00,20,'High','Sun, Part Shade','No','Yes',30,'Yes','Greece','No'),(6,'Wandering Jew','D7',31.45,13,'Medium','Sun, Part Shade','Yes','Yes',20,'No','Honduras','No'),(7,'Venus Flytrap','A8',9.99,6,'Medium','Sun','No','Yes',12,'No','United States Of America','No'),(8,'Snapdragon','B7',2.48,21,'Low','Sun','Yes','Yes',25,'No','Italy','No'),(9,'Boston Fern','D12',19.83,3,'High','Part Shade','Yes','Yes',20,'No','United States of America','No'),(10,'Pansy','B3',1.58,30,'Medium','Sun','Yes','Yes',30,'Yes','Haiti','No');
/*!40000 ALTER TABLE `Plants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Supplier`
--

DROP TABLE IF EXISTS `Supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Supplier` (
  `SID` int NOT NULL,
  `Company_Name` varchar(255) NOT NULL,
  `Shipment_Cost` decimal(10,2) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Phone_Number` varchar(15) NOT NULL,
  PRIMARY KEY (`SID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Supplier`
--

LOCK TABLES `Supplier` WRITE;
/*!40000 ALTER TABLE `Supplier` DISABLE KEYS */;
INSERT INTO `Supplier` VALUES (1,'Forest Farm',3.87,'14643 Watergap Rd. Williams, OR 97544','(541)846-7269'),(2,'Broken Arrow Nursery',10.00,'13 Broken Arrow Road, Hamden, CT 06518','(203)288-1026'),(3,'Digging Dog Nursery',5.50,'31101 Middle Ridge Rd., Albion, CA 95410',' (707)937-1130'),(4,'Antique Rose Emporium',2.00,'10000 FM 50, Brenham, TX 77833','(979)836-5548'),(5,'Wayside Gardens',6.75,'Wayside Gardens One Garden Lane Hodges, SC 29653','1-800-845-1124');
/*!40000 ALTER TABLE `Supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Supplier_Plants`
--

DROP TABLE IF EXISTS `Supplier_Plants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Supplier_Plants` (
  `SID` int NOT NULL,
  `PID` int NOT NULL,
  KEY `SID` (`SID`),
  KEY `PID` (`PID`),
  CONSTRAINT `supplier_plants_ibfk_1` FOREIGN KEY (`SID`) REFERENCES `Supplier` (`SID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `supplier_plants_ibfk_2` FOREIGN KEY (`PID`) REFERENCES `Plants` (`PID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Supplier_Plants`
--

LOCK TABLES `Supplier_Plants` WRITE;
/*!40000 ALTER TABLE `Supplier_Plants` DISABLE KEYS */;
INSERT INTO `Supplier_Plants` VALUES (1,9),(4,10),(2,1),(3,8),(5,7),(5,2);
/*!40000 ALTER TABLE `Supplier_Plants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'nursery'
--
/*!50003 DROP PROCEDURE IF EXISTS `drop_supplier` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `drop_supplier`(IN supplier_1 varchar(255))
begin
		DECLARE sup_id INT DEFAULT -1;
		DECLARE plant_id INT DEFAULT -1;
        
        SELECT sid INTO sup_id FROM Supplier WHERE supplier_1 = Supplier.Company_name;
        SELECT pid INTO plant_id FROM Supplier_plants AS sp WHERE sp.sid = sup_id;
        
		DELETE FROM nursery.supplier AS s WHERE s.sid = sup_id;
        DELETE FROM nursery.supplier_plants AS s_p WHERE s_p.sid = sup_id;
        DELETE FROM nursery.plants AS p WHERE p.pid = plant_id;
end ;;
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

-- Dump completed on 2022-05-02 10:57:06
