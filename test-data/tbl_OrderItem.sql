-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 01, 2018 at 05:15 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_OrderItem`
--

CREATE TABLE `tbl_OrderItem` (
  `ID` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL,
  `ItemID` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `QuotedPrice` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_OrderItem`
--
ALTER TABLE `tbl_OrderItem`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_OrderID` (`OrderID`),
  ADD KEY `FK_ItemID` (`ItemID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_OrderItem`
--
ALTER TABLE `tbl_OrderItem`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_OrderItem`
--
ALTER TABLE `tbl_OrderItem`
  ADD CONSTRAINT `FK_ItemID` FOREIGN KEY (`ItemID`) REFERENCES `tbl_Item` (`ID`),
  ADD CONSTRAINT `FK_OrderID` FOREIGN KEY (`OrderID`) REFERENCES `tbl_Order` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
