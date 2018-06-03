-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 03, 2018 at 10:45 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `test`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_Item`
--

DROP TABLE IF EXISTS `tbl_Item`;
CREATE TABLE IF NOT EXISTS `tbl_Item` (
  `ID` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CostPrice` double NOT NULL,
  `Quantity` int(11) NOT NULL,
  `SellPrice` double NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_Item`
--

INSERT INTO `tbl_Item` (`ID`, `Description`, `CostPrice`, `Quantity`, `SellPrice`) VALUES
('77R1934015A00', 'Giada F300/G300/I58/I39/F200/I200/I57 AC', 208, 420, 299),
('AW-CB161H', 'Giada Wifi Bluetooth Mini PCI Module', 183, 59, 249),
('D67-N1-7100U40H0G-GIA', 'Giada D67 i3-7100U 2xDDR4 2133Mhz 1xRS232', 4723, 30, 7695),
('D67-N1-7200U40H0G-GIA', 'Giada D67 i5-7200U 2xDDR4 2133Mhz 1xRS232', 5526, 69, 8995),
('F105D-BQ200', 'Giada F105D Fanless Cel N3450 2GB', 2326, 400, 3789),
('F110D-BD000', 'Giada F110D Fanless Cel J1900 2xRJ45', 2150, 900, 3499),
('F202-BB200', 'Giada F202 Fanless Cel N2807 2GB 1xVGA|1xHDMI', 1691, 700, 2749),
('F210U-BY230', 'Giada F210U Fanless Atom Z8350 2GB 32GB', 1534, 850, 2495),
('F210U-BY460', 'Giada F210U Fanless Atom Z8350 4GB 64GB', 2459, 923, 3999),
('F302-B3000', 'Giada F302 Fanless i3-6100U', 5396, 866, 8789),
('I58B-B5000', 'Giada I58B i5-5200U 2xDDR3L 1x RS232', 4993, 256, 8130),
('MU609', 'Giada Huawei Mini PCIe 3G Module', 626, 54845, 1019),
('P110', 'Antec P110 LUCE RGB LED Tempered Glass Side (GPU 390mm) ATX Gaming Chassis Black', 989, 400, 1200),
('P8', 'Antec P8 White LED Tempered Glass Side (GPU 390mm) ATX Gaming Chassis Black', 643, 299, 956),
('Q30W', 'Giada Q30W Android Cortex A9 QC 1.6GHz', 1287, 659, 2099);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_Order`
--

DROP TABLE IF EXISTS `tbl_Order`;
CREATE TABLE IF NOT EXISTS `tbl_Order` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `OrderDate` date NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_UserID` (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_Order`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_OrderItem`
--

DROP TABLE IF EXISTS `tbl_OrderItem`;
CREATE TABLE IF NOT EXISTS `tbl_OrderItem` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `OrderID` int(11) NOT NULL,
  `ItemID` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `QuotedPrice` double NOT NULL,
  `Quantity` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_OrderID` (`OrderID`),
  KEY `FK_ItemID` (`ItemID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_User`
--

DROP TABLE IF EXISTS `tbl_User`;
CREATE TABLE IF NOT EXISTS `tbl_User` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `root` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_User`
--

INSERT INTO `tbl_User` (`ID`, `FName`, `LName`, `Email`, `Password`, `root`) VALUES
(1, 'jim', 'bo', 'jimbo@jim.com', '910212d01c6ca98d108561a645b21e84', 0),
(2, 'jamie', 'greg', 'jamie@greg.com', '1c138fd52ddd771388a5b4c410a9603a', 1),
(3, 'john', 'doe', 'john@doe.com', '29ef52e7563626a96cea7f4b4085c124', 0),
(4, 'carlos', 'jobim', 'carlos@antonio.jobim', 'dc599a9972fde3045dab59dbd1ae170b', 0),
(5, 'ben', 'head', 'ben@head.com', '7fe4771c008a22eb763df47d19e2c6aa', 0),
(6, 'pi', 'sky', 'pi@sky.com', '72ab8af56bddab33b269c5964b26620a', 0),
(7, 'cheese', 'louise', 'cheese@louise.com', 'fea0f1f6fede90bd0a925b4194deac11', 0),
(8, 'sister', 'sister', 'sister@sister.com', 'daffd55e1b8020c7a60a7b6e36afb775', 0),
(9, 'choco', 'pine', 'choco@pine.com', 'efd18c35cc5f1ef7280a0a8bee5fbbd3', 0),
(10, 'mark', 'checker', 'mark@checker.com', 'ea82410c7a9991816b5eeeebe195e20a', 0),
(11, 'leroy', 'junior', 'leroy@junior.com', '430a4ead8a22bce7374f13abef17aa5b', 0),
(12, 'abra', 'cadabra', 'abra@cadabra.com', '79218a25c2a07a92155aeb3c2b95d340', 0),
(13, 'mikeys', 'fontein', 'mikeys@fontein.com', '7475362096d90748dd7825da3365793f', 0),
(14, 'free', 'wood', 'free@wood.com', 'aa2d6e4f578eb0cfaba23beef76c2194', 0),
(15, 'dan', 'howard', 'danhow17@gmail.com', '9180b4da3f0c7e80975fad685f7f134e', 0),
(16, 'chicken', 'licken', 'chicken@licken.com', '742929dcb631403d7c1c1efad2ca2700', 0),
(17, 'luss', 'buss', 'luss@buss.com', 'be6cbfa757a7f62ed997e1c9a89909a3', 0),
(18, 'crazy', 'clown', 'crazy@clown.com', '297aae72cc4d0d068f46a9158469e34d', 0),
(19, 'april', 'fools', 'april@fools.com', '37d153a06c79e99e4de5889dbe2e7c57', 0),
(20, 'jamie', 'g', 'jamieg@gmail.com', 'f0f61e9a8b8bd612b199357e8b146daa', 0),
(21, 'jason', 'craig', 'jason@craig.com', '2b877b4b825b48a9a0950dd5bd1f264d', 0),
(22, 'juum', 'rat', 'juum@rat.com', '7f5e19191d9d0c35f1f48a2f1038d36e', 0),
(23, 'freddie', 'fingered', 'freddie@fingered.com', 'c908a90d0fe5aec600e957b88efc04a4', 0),
(24, 'butter', 'fingers', 'butter@fingers.com', 'd74fdde2944f475adc4a85e349d4ee7b', 0),
(25, 'bob', 'builder', 'bob@builder.com', '9f9d51bc70ef21ca5c14f307980a29d8', 0),
(26, 'ronald', 'mcdonald', 'ronald@mcdonald.com', '5af0a0feb2094f43bebb50c518c1ebfe', 0),
(27, 'ron', 'weezley', 'ron@weezley.com', '45798f269709550d6f6e1d2cf4b7d485', 0),
(28, 'dean', 'gregs', 'dean@gregs.com', '48767461cb09465362c687ae0c44753b', 0),
(29, 'roger', 'that', 'roger@that.captain', 'b911af807c2df88d671bd7004c54c1c2', 0),
(30, 'icantthink', 'ofonemore', 'icantthikof@onemore.com', '5f102a17f0b8a0d5bcb4dc8f29ee3958', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_Order`
--
ALTER TABLE `tbl_Order`
  ADD CONSTRAINT `FK_UserID` FOREIGN KEY (`UserID`) REFERENCES `tbl_User` (`ID`);

--
-- Constraints for table `tbl_OrderItem`
--
ALTER TABLE `tbl_OrderItem`
  ADD CONSTRAINT `FK_ItemID` FOREIGN KEY (`ItemID`) REFERENCES `tbl_Item` (`ID`),
  ADD CONSTRAINT `FK_OrderID` FOREIGN KEY (`OrderID`) REFERENCES `tbl_Order` (`ID`);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;