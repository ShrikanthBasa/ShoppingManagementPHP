-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2019 at 04:58 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proj_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `buys`
--

CREATE TABLE `buys` (
  `fk_cid` int(11) DEFAULT NULL,
  `fk_imei` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `fk_cid` int(11) DEFAULT NULL,
  `fk_imei` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `C_ID` int(11) NOT NULL,
  `FNAME` varchar(10) DEFAULT NULL,
  `UNAME` varchar(20) DEFAULT NULL,
  `PASS` varchar(15) DEFAULT NULL,
  `EMAIL` varchar(20) DEFAULT NULL,
  `ADDRESS` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`C_ID`, `FNAME`, `UNAME`, `PASS`, `EMAIL`, `ADDRESS`) VALUES
(1101, 'shrikanth', 'sbasa35', '123', 'test@gmail.com', 'near station dahisar west');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `FK_IMEI` varchar(15) DEFAULT NULL,
  `FEATURE` varchar(15) DEFAULT NULL,
  `DESCR` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`FK_IMEI`, `FEATURE`, `DESCR`) VALUES
('FEH123D54', 'Memory', '2 GB RAM | 32 GB ROM | Expanda'),
('FEH123D54', 'Memory', '2 GB RAM | 32 GB ROM | Expandable Upto 256 GB'),
('FEH123D54', 'Display', '15.49 cm (6.1 inch) HD+ Display'),
('FEH123D54', 'Camera', '13MP + 2MP | 5MP Front Camera'),
('FEH123D54', 'Battery', '4000 mAh Battery'),
('FEH123D54', 'Processor', 'MediaTek P22 Octa Core 2.0 GHz Processor'),
('FEH123D54', 'SIM', 'Dual Nano SIM slots and Memory Card Slot'),
('FEH123D54', 'Other', 'Face Unlock'),
('ADS6556DS', 'Memory', '3 GB RAM | 32 GB ROM | Expandable Upto 256 GB'),
('ADS6556DS', 'Display', '16.51 cm (6.5 inch) HD+ Display'),
('ADS6556DS', 'Camera', '12MP + 8MP + 2MP + 2MP | 13MP Front Camera'),
('ADS6556DS', 'Battery', '5000 mAH Battery'),
('ADS6556DS', 'Processor', 'Qualcomm Snapdragon 665 2 GHz Processor'),
('ADS6556DS', 'other', 'Fingerprint'),
('FEH123D54', 'Touch Screen', 'Yes'),
('ADS6556DS', 'USB', 'Yes 2.0'),
('ADS6556DS', 'Resolution', '720 x 1600 pixels'),
('ADS6556DS', 'Colors', '	      16.7M');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `IMEI` varchar(15) NOT NULL,
  `OS` varchar(10) DEFAULT NULL,
  `MODEL` varchar(50) DEFAULT NULL,
  `COST` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`IMEI`, `OS`, `MODEL`, `COST`) VALUES
('ADS6556DS', 'Android', 'Realme 5 (Crystal Blue, 32 GB)', 12999),
('FEH123D54', 'Android', 'Redmi 3S (2GB+16GB)', 7999);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buys`
--
ALTER TABLE `buys`
  ADD KEY `fk_cid` (`fk_cid`),
  ADD KEY `fk_imei` (`fk_imei`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `fk_cid` (`fk_cid`),
  ADD KEY `fk_imei` (`fk_imei`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`C_ID`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD KEY `FK_IMEI` (`FK_IMEI`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`IMEI`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `C_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1109;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buys`
--
ALTER TABLE `buys`
  ADD CONSTRAINT `buys_ibfk_1` FOREIGN KEY (`fk_cid`) REFERENCES `customer` (`C_ID`),
  ADD CONSTRAINT `buys_ibfk_2` FOREIGN KEY (`fk_imei`) REFERENCES `products` (`IMEI`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`fk_cid`) REFERENCES `customer` (`C_ID`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`fk_imei`) REFERENCES `products` (`IMEI`);

--
-- Constraints for table `features`
--
ALTER TABLE `features`
  ADD CONSTRAINT `features_ibfk_1` FOREIGN KEY (`FK_IMEI`) REFERENCES `products` (`IMEI`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
