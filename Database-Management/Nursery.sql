-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 09, 2022 at 04:26 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Nursery`
--

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `CID` int(11) NOT NULL,
  `First_Name` varchar(255) NOT NULL,
  `Last_Name` varchar(255) NOT NULL,
  `Phone_Number` varchar(15) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Discount` decimal(5,2) NOT NULL,
  `Beginning_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`CID`, `First_Name`, `Last_Name`, `Phone_Number`, `Address`, `Discount`, `Beginning_Date`) VALUES
(1, 'Jennifer', 'Ives', '(470) 905-1022', '', '10.00', '2022-04-12'),
(2, 'Emma', 'Rooney', ' (588) 508-5850', '', '5.00', '2020-01-15'),
(3, 'Richard', 'George', '(988) 334-3271', '', '3.00', '2021-06-01'),
(4, 'William', 'Powers', '(321) 206-5796', '', '10.00', '2022-01-11'),
(5, 'Martha', 'Seamons', '(708) 202-0110', '', '5.00', '2021-03-11'),
(6, 'Michelle', 'Johnson', '(928) 864-8659', '', '15.00', '2021-07-30'),
(7, 'Elizabeth', 'Manna', '(236) 543-4465', '', '5.00', '2022-02-04'),
(8, 'Ramiro', 'Bianchi', '(352) 928-4408', '', '5.00', '2020-02-14'),
(9, 'Phillip', 'Flores', '(586) 863-8225', '', '15.00', '2021-09-01'),
(10, 'Jose', 'Walters', '(830) 890-5788', '', '5.00', '2019-12-01'),
(11, 'James', 'Kip', '123-456-9899', '', '1.00', '2022-05-02');

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE `Orders` (
  `OID` int(11) NOT NULL,
  `Total_Dollars` decimal(10,2) NOT NULL,
  `CID` int(11) NOT NULL,
  `Order_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Orders`
--

INSERT INTO `Orders` (`OID`, `Total_Dollars`, `CID`, `Order_Date`) VALUES
(1, '20.51', 1, '2022-04-12'),
(2, '30.67', 4, '2022-03-09'),
(3, '15.60', 10, '2021-11-03'),
(4, '39.66', 2, '2021-08-11');

-- --------------------------------------------------------

--
-- Table structure for table `Orders_Plants`
--

CREATE TABLE `Orders_Plants` (
  `OID` int(11) NOT NULL,
  `PID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Orders_Plants`
--

INSERT INTO `Orders_Plants` (`OID`, `PID`) VALUES
(1, 4),
(2, 5),
(3, 1),
(3, 8),
(4, 9);

-- --------------------------------------------------------

--
-- Table structure for table `Plants`
--

CREATE TABLE `Plants` (
  `PID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Aisle` varchar(3) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Amt_in_Stock` int(11) NOT NULL,
  `Max_Quantity` int(11) NOT NULL,
  `Country_of_Origin` varchar(255) NOT NULL,
  `Water_Requirement` varchar(255) NOT NULL,
  `Sunlight_Requirement` varchar(255) NOT NULL,
  `is_Indoor` varchar(5) DEFAULT 'False',
  `is_Outdoor` varchar(5) DEFAULT 'False',
  `is_Poisonous` varchar(5) DEFAULT 'False',
  `is_Edible` varchar(5) NOT NULL DEFAULT 'False'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Plants`
--

INSERT INTO `Plants` (`PID`, `Name`, `Aisle`, `Price`, `Amt_in_Stock`, `Max_Quantity`, `Country_of_Origin`, `Water_Requirement`, `Sunlight_Requirement`, `is_Indoor`, `is_Outdoor`, `is_Poisonous`, `is_Edible`) VALUES
(1, 'Common Sweetleaf', 'A1', '5.60', 10, 15, 'United States of America', 'Medium', 'Part Shade', 'False', 'True', 'False', 'True'),
(2, 'Virgina Strawberry', 'A2', '4.84', 5, 25, 'United States of America', 'Low', 'Sun, Part Shade', 'False', 'True', 'False', 'True'),
(3, 'American Plum', 'B1', '2.41', 7, 20, 'United States of America', 'High', 'Sun, Part Shade, Shade', 'False', 'True', 'False', 'True'),
(4, 'Dumb Cane', 'C5', '10.00', 4, 10, 'Brazil', 'Low', 'Part Shade', 'True', 'False', 'True', 'False'),
(5, 'Daffodil', 'C6', '2.00', 20, 30, 'Greece', 'High', 'Sun, Part Shade', 'False', 'True', 'True', 'False'),
(6, 'Wandering Jew', 'D7', '31.45', 13, 20, 'Honduras', 'Medium', 'Sun, Part Shade', 'True', 'True', 'False', 'False'),
(7, 'Venus Flytrap', 'A8', '9.99', 6, 12, 'United States Of America', 'Medium', 'Sun', 'False', 'True', 'False', 'False'),
(8, 'Snapdragon', 'B7', '2.48', 21, 25, 'Italy', 'Low', 'Sun', 'True', 'True', 'False', 'False'),
(9, 'Boston Fern', 'D12', '19.83', 3, 20, 'United States of America', 'High', 'Part Shade', 'True', 'True', 'False', 'False'),
(10, 'Pansy', 'B3', '1.58', 30, 30, 'Haiti', 'Medium', 'Sun', 'True', 'True', 'True', 'False');

-- --------------------------------------------------------

--
-- Table structure for table `Supplier`
--

CREATE TABLE `Supplier` (
  `SID` int(11) NOT NULL,
  `Company_Name` varchar(255) NOT NULL,
  `Shipment_Cost` decimal(10,2) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Phone_Number` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Supplier`
--

INSERT INTO `Supplier` (`SID`, `Company_Name`, `Shipment_Cost`, `Address`, `Phone_Number`) VALUES
(1, 'Forest Farm', '3.87', '14643 Watergap Rd. Williams, OR 97544', '(541)846-7269'),
(2, 'Broken Arrow Nursery', '10.00', '13 Broken Arrow Road, Hamden, CT 06518', '(203)288-1026'),
(3, 'Digging Dog Nursery', '5.50', '31101 Middle Ridge Rd., Albion, CA 95410', ' (707)937-1130'),
(4, 'Antique Rose Emporium', '2.00', '10000 FM 50, Brenham, TX 77833', '(979)836-5548'),
(5, 'Wayside Gardens', '6.75', 'Wayside Gardens One Garden Lane Hodges, SC 29653', '1-800-845-1124');

-- --------------------------------------------------------

--
-- Table structure for table `Supplier_Plants`
--

CREATE TABLE `Supplier_Plants` (
  `SID` int(11) NOT NULL,
  `PID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Supplier_Plants`
--

INSERT INTO `Supplier_Plants` (`SID`, `PID`) VALUES
(1, 9),
(4, 10),
(2, 1),
(3, 8),
(5, 7),
(5, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`OID`),
  ADD KEY `orders_ibfk_1` (`CID`);

--
-- Indexes for table `Orders_Plants`
--
ALTER TABLE `Orders_Plants`
  ADD KEY `OID` (`OID`),
  ADD KEY `PID` (`PID`);

--
-- Indexes for table `Plants`
--
ALTER TABLE `Plants`
  ADD PRIMARY KEY (`PID`);

--
-- Indexes for table `Supplier`
--
ALTER TABLE `Supplier`
  ADD PRIMARY KEY (`SID`);

--
-- Indexes for table `Supplier_Plants`
--
ALTER TABLE `Supplier_Plants`
  ADD KEY `SID` (`SID`),
  ADD KEY `PID` (`PID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Orders`
--
ALTER TABLE `Orders`
  MODIFY `OID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Plants`
--
ALTER TABLE `Plants`
  MODIFY `PID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Orders`
--
ALTER TABLE `Orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`CID`) REFERENCES `Customer` (`CID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Orders_Plants`
--
ALTER TABLE `Orders_Plants`
  ADD CONSTRAINT `orders_plants_ibfk_1` FOREIGN KEY (`OID`) REFERENCES `Orders` (`OID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_plants_ibfk_2` FOREIGN KEY (`PID`) REFERENCES `Plants` (`PID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Supplier_Plants`
--
ALTER TABLE `Supplier_Plants`
  ADD CONSTRAINT `supplier_plants_ibfk_1` FOREIGN KEY (`SID`) REFERENCES `Supplier` (`SID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `supplier_plants_ibfk_2` FOREIGN KEY (`PID`) REFERENCES `Plants` (`PID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
