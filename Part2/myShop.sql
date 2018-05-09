-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 09, 2018 at 07:53 AM
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
-- Table structure for table `TBL_CUSTOMER`
--

CREATE TABLE `TBL_CUSTOMER` (
  `CUS_ID` int(11) NOT NULL,
  `CUS_NAME` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CUS_EMAIL` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `TBL_CUSTOMER`
--

INSERT INTO `TBL_CUSTOMER` (`CUS_ID`, `CUS_NAME`, `CUS_EMAIL`) VALUES
(1, 'jamie greg', ' jamie@greg.com'),
(2, 'peter pan', ' peter@pan.com'),
(3, 'Jackson Pollock', ' pollock@jackson.com'),
(4, 'Steve Erwin', ' ey@mate.com'),
(5, 'Jason Dreyer', ' j@drey.com'),
(6, 'Reece Mancini', ' reece@man.com'),
(7, 'Mark Zuckerburg', ' mark@facebook.com'),
(8, 'Darren Lee', ' d@lee.com'),
(9, 'Fred One', ' freddy@one.com'),
(10, 'Ben Dover', ' ben@dover.com'),
(11, 'Amy Winehouse', ' wine@house.com'),
(12, 'Jim Morrison', ' jim@morrison.com'),
(13, 'Jimi Hendrix', ' hendrix@jimi.com'),
(14, 'Fela Kuti', ' fela@kuti.com'),
(15, 'George Benson', ' b@george.com'),
(16, 'Tom Jobim', ' tom@jobim.com'),
(17, 'Antonio Carlos Jobim', ' carlos@jobim.com'),
(18, 'Dave Gilmour', ' dave@floyd.com'),
(19, 'Syd Barret', ' sid@floyd.com'),
(20, 'Roger Waters', ' roger@floyd.com'),
(21, 'Richard Wright', ' rich@floyd.com'),
(22, 'Dave Brubeck', ' dave@brubeck.com'),
(23, 'Jackie Chan', ' jackie@chan.com'),
(24, 'Danny McBride', ' danny@bride.com'),
(25, 'Blake Henderson', ' h@blake.com'),
(26, 'Adam Devine', ' d@adam.com'),
(27, 'Anders Holmvic', ' h@anders.com'),
(28, 'Carl Rogen', ' carl@rogen.com'),
(29, 'Seth Rogen', ' seth@rogen.com'),
(30, 'William Osman', ' william@osman.net');

-- --------------------------------------------------------

--
-- Table structure for table `TBL_ITEM`
--

CREATE TABLE `TBL_ITEM` (
  `ITEM_ID` int(11) NOT NULL,
  `ITEM_DESC` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ITEM_PRICE` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `TBL_ITEM`
--

INSERT INTO `TBL_ITEM` (`ITEM_ID`, `ITEM_DESC`, `ITEM_PRICE`) VALUES
(1, 'ps4', 4000),
(2, 'GWM Steed', 70000),
(3, 'Robot Bull', 30000),
(4, 'Whoopie cushion', 20),
(5, '20 Marbles', 60),
(6, 'Sausage rolls', 40),
(7, 'Eggs', 19),
(8, 'Paino choc', 15),
(9, 'Raspberry Pi', 700),
(10, 'Core i7', 5000),
(11, 'Shurken', 200),
(12, 'Nunchucks', 400),
(13, 'Rubics cube', 400),
(14, '27\" Monitor', 3000),
(15, 'Bag of Apples', 30),
(16, 'Copper pipe', 90),
(17, 'Ready mix', 190),
(18, 'Trowel', 80),
(19, 'Wheel barrow', 600),
(20, 'Gum boots', 200),
(21, 'Drill bits', 500),
(22, 'Pepper steak pie', 14),
(23, 'Parachute', 3800),
(24, 'Absailing kit', 2900),
(25, 'Walkie Talkies', 500),
(26, 'Carribena', 40),
(27, 'Nylon rope', 80),
(28, 'Q20', 60),
(29, 'Duct tape', 80),
(30, '2L Vanilla Ice Cream', 70);

-- --------------------------------------------------------

--
-- Table structure for table `TBL_ORDER`
--

CREATE TABLE `TBL_ORDER` (
  `ORDER_ID` int(11) NOT NULL,
  `CUSTOMER_ID` int(11) DEFAULT NULL,
  `ORDER_DATE` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `TBL_ORDER_ITEM`
--

CREATE TABLE `TBL_ORDER_ITEM` (
  `ORDER_ID` int(11) NOT NULL,
  `ITEM_ID` int(11) NOT NULL,
  `ORDER_ITEM_QUANTITY` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `TBL_CUSTOMER`
--
ALTER TABLE `TBL_CUSTOMER`
  ADD PRIMARY KEY (`CUS_ID`);

--
-- Indexes for table `TBL_ITEM`
--
ALTER TABLE `TBL_ITEM`
  ADD PRIMARY KEY (`ITEM_ID`);

--
-- Indexes for table `TBL_ORDER`
--
ALTER TABLE `TBL_ORDER`
  ADD PRIMARY KEY (`ORDER_ID`),
  ADD KEY `CUSTOMER_ID` (`CUSTOMER_ID`);

--
-- Indexes for table `TBL_ORDER_ITEM`
--
ALTER TABLE `TBL_ORDER_ITEM`
  ADD PRIMARY KEY (`ORDER_ID`,`ITEM_ID`),
  ADD KEY `ITEM_ID` (`ITEM_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `TBL_ORDER`
--
ALTER TABLE `TBL_ORDER`
  ADD CONSTRAINT `TBL_ORDER_ibfk_1` FOREIGN KEY (`CUSTOMER_ID`) REFERENCES `TBL_CUSTOMER` (`CUS_ID`);

--
-- Constraints for table `TBL_ORDER_ITEM`
--
ALTER TABLE `TBL_ORDER_ITEM`
  ADD CONSTRAINT `TBL_ORDER_ITEM_ibfk_1` FOREIGN KEY (`ORDER_ID`) REFERENCES `TBL_ORDER` (`ORDER_ID`),
  ADD CONSTRAINT `TBL_ORDER_ITEM_ibfk_2` FOREIGN KEY (`ITEM_ID`) REFERENCES `TBL_ITEM` (`ITEM_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
