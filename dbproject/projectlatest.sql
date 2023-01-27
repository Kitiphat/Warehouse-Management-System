-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2022 at 06:32 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `binlocation`
--

CREATE TABLE `binlocation` (
  `BinID` varchar(20) NOT NULL DEFAULT 'NOT NULL',
  `Area` varchar(10) NOT NULL DEFAULT 'NOT NULL',
  `Row` varchar(10) NOT NULL DEFAULT 'NOT NULL',
  `Bay` varchar(10) NOT NULL DEFAULT 'NOT NULL',
  `Level` int(10) NOT NULL,
  `PosProduct` varchar(10) NOT NULL DEFAULT 'NOT NULL',
  `_Status` varchar(10) NOT NULL DEFAULT 'NOT NULL',
  `Capacity` varchar(10) NOT NULL DEFAULT 'NOT NULL',
  `WarehouseID` varchar(10) NOT NULL DEFAULT 'NOT NULL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `binlocation`
--

INSERT INTO `binlocation` (`BinID`, `Area`, `Row`, `Bay`, `Level`, `PosProduct`, `_Status`, `Capacity`, `WarehouseID`) VALUES
('A-01-01-3-A', 'A', '01', '01', 3, 'A', 'Occupied', '50', 'WH00000001'),
('A-01-02-3-A', 'A', '01', '02', 3, 'A', 'Vacant', '100', 'WH00000001');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` varchar(10) NOT NULL DEFAULT 'NOT NULL',
  `Fname` varchar(20) NOT NULL DEFAULT 'NOT NULL',
  `Lname` varchar(20) NOT NULL DEFAULT 'NOT NULL',
  `Address` varchar(200) NOT NULL DEFAULT 'NOT NULL',
  `Tel_No` varchar(25) NOT NULL DEFAULT 'NOT NULL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `Fname`, `Lname`, `Address`, `Tel_No`) VALUES
('CS00000001', 'Tyrell', 'Duncan', '3767 Diamond Street Morganton North Carolina 28655', '0962895803');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `TruckID` varchar(10) NOT NULL DEFAULT 'NOT NULL',
  `TimeOut` timestamp NOT NULL DEFAULT current_timestamp(),
  `TimeIn` timestamp NOT NULL DEFAULT current_timestamp(),
  `OrderID` varchar(10) NOT NULL DEFAULT 'NOT NULL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`TruckID`, `TimeOut`, `TimeIn`, `OrderID`) VALUES
('T000000001', '2021-10-13 07:58:35', '2021-10-13 08:17:35', 'B000000001');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EmployeeID` varchar(10) NOT NULL DEFAULT 'NOT NULL',
  `Fname` varchar(20) NOT NULL DEFAULT 'NOT NULL',
  `Lname` varchar(20) NOT NULL DEFAULT 'NOT NULL',
  `Position` varchar(20) NOT NULL DEFAULT 'NOT NULL',
  `Email` varchar(50) NOT NULL DEFAULT 'NOT NULL',
  `Username` varchar(20) NOT NULL DEFAULT 'NOT NULL',
  `Password` varchar(20) NOT NULL DEFAULT 'NOT NULL',
  `Tel` varchar(25) NOT NULL DEFAULT 'NOT NULL',
  `UserRole` varchar(20) NOT NULL DEFAULT 'NOT NULL',
  `Salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EmployeeID`, `Fname`, `Lname`, `Position`, `Email`, `Username`, `Password`, `Tel`, `UserRole`, `Salary`) VALUES
('EM00000001', 'Kitthiphat', 'Ruangamornwat', 'Slave', 'kitthiphat_slave@gmail.com', 'kitthipat', '123456', '0852332262', 'Worker', 20),
('EM00000002', 'Siravich', 'Siravich', 'Slave', 'siravich_slave@gmail.com', 'siravich', '234567', '0992825946', 'Worker', 25),
('EM00000003', 'Test', 'Arai', 'Administator', 'test_admin@gmail.com', 'test', '123456', '0994561296', 'Admin', 90);

-- --------------------------------------------------------

--
-- Table structure for table `indvprod`
--

CREATE TABLE `indvprod` (
  `ProductID` varchar(10) NOT NULL DEFAULT 'NOT NULL',
  `SerialNum` varchar(20) NOT NULL DEFAULT 'NOT NULL',
  `Quantity` int(10) NOT NULL,
  `EXPDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `indvprod`
--

INSERT INTO `indvprod` (`ProductID`, `SerialNum`, `Quantity`, `EXPDate`) VALUES
('WT4210321', '01-2222-WT42', 10, '2025-02-25'),
('WT4210321', '01-2223-WT42', 3, '2022-02-25'),
('WT4210321', '01-2224-WT42', 15, '2024-02-25'),
('WT4210321', '01-2225-WT42', 7, '2025-07-14'),
('WT4210321', '01-2226-WT42', 12, '2025-05-27'),
('WT4210321', '01-2227-WT42', 20, '2022-08-15'),
('BN15240511', '01-3211-BN15', 15, '2024-02-25');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `OrderID` varchar(10) NOT NULL DEFAULT 'NOT NULL',
  `DateofOrder` date NOT NULL,
  `WarehouseID` varchar(10) NOT NULL DEFAULT 'NOT NULL',
  `CustomerID` varchar(10) NOT NULL DEFAULT 'NOT NULL',
  `EmployeeID` varchar(10) NOT NULL DEFAULT 'NOT NULL',
  `_Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`OrderID`, `DateofOrder`, `WarehouseID`, `CustomerID`, `EmployeeID`, `_Status`) VALUES
('B000000001', '2020-12-01', 'WH00000001', 'CS00000001', 'EM00000001', 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `order details`
--

CREATE TABLE `order details` (
  `ProductID` varchar(10) NOT NULL DEFAULT 'NOT NULL',
  `OrderID` varchar(10) NOT NULL DEFAULT 'NOT NULL',
  `Quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order details`
--

INSERT INTO `order details` (`ProductID`, `OrderID`, `Quantity`) VALUES
('WT4210321', 'B000000001', 20);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `BillNo` varchar(10) NOT NULL DEFAULT 'NOT NULL',
  `PaymentType` varchar(20) NOT NULL DEFAULT 'NOT NULL',
  `Detials` varchar(500) NOT NULL DEFAULT 'NOT NULL',
  `CustomerID` varchar(10) NOT NULL DEFAULT 'NOT NULL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`BillNo`, `PaymentType`, `Detials`, `CustomerID`) VALUES
('BL00000001', 'Cash', 'Watermelon 1 Tons', 'CS00000001');

-- --------------------------------------------------------

--
-- Table structure for table `pickorder`
--

CREATE TABLE `pickorder` (
  `SerialNum` varchar(20) NOT NULL DEFAULT 'NOT NULL',
  `OrderID` varchar(10) NOT NULL DEFAULT 'NOT NULL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pickorder`
--

INSERT INTO `pickorder` (`SerialNum`, `OrderID`) VALUES
('01-2227-WT42', 'B000000001');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` varchar(10) NOT NULL DEFAULT 'NOT NULL',
  `ProductName` varchar(20) NOT NULL DEFAULT 'NOT NULL',
  `Description` varchar(500) NOT NULL DEFAULT 'NOT NULL',
  `Price` int(10) NOT NULL,
  `Category` varchar(50) NOT NULL DEFAULT 'NOT NULL',
  `Unit` varchar(20) NOT NULL DEFAULT 'NOT NULL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `ProductName`, `Description`, `Price`, `Category`, `Unit`) VALUES
('BN15240511', 'banana', 'Cavendish Banana', 100, 'fruits', 'tons'),
('CF15033211', 'canned fish', 'Sam Mae Krua Canned Fish', 20, 'preserved foods', 'tons'),
('CO23203311', 'coconut oil', 'Nutiva Organic Virgin Coconut Oil', 99, 'oils', 'tons'),
('IPAD800123', 'iPad', 'iPad8 Made in China', 19999, 'Electronics', 'pieces'),
('WT4210321', 'watermelon', 'watermelon import grom Chiang Mai', 250, 'fruits', 'tons');

-- --------------------------------------------------------

--
-- Table structure for table `storage`
--

CREATE TABLE `storage` (
  `SerialNum` varchar(20) NOT NULL DEFAULT 'NOT NULL',
  `BinID` varchar(20) NOT NULL DEFAULT 'NOT NULL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `storage`
--

INSERT INTO `storage` (`SerialNum`, `BinID`) VALUES
('01-2227-WT42', 'A-01-01-3-A');

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `TransferID` varchar(10) NOT NULL DEFAULT 'NOT NULL',
  `ToBin` varchar(20) NOT NULL DEFAULT 'NOT NULL',
  `DateTransfer` date NOT NULL,
  `SerialNum` varchar(20) NOT NULL DEFAULT 'NOT NULL',
  `EmployeeID` varchar(10) NOT NULL DEFAULT 'NOT NULL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`TransferID`, `ToBin`, `DateTransfer`, `SerialNum`, `EmployeeID`) VALUES
('TF00000001', 'A-01-01-3-A', '2021-12-08', '01-2227-WT42', 'EM00000001');

-- --------------------------------------------------------

--
-- Table structure for table `truck`
--

CREATE TABLE `truck` (
  `TruckID` varchar(10) NOT NULL DEFAULT 'NOT NULL',
  `Capacity` varchar(10) NOT NULL DEFAULT 'NOT NULL',
  `_Status` varchar(10) NOT NULL DEFAULT 'NOT NULL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `truck`
--

INSERT INTO `truck` (`TruckID`, `Capacity`, `_Status`) VALUES
('T000000001', '100', 'Ready');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(50) NOT NULL,
  `username` varchar(44) CHARACTER SET utf8 NOT NULL,
  `password` varchar(44) CHARACTER SET utf8 NOT NULL,
  `email` varchar(44) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `email`) VALUES
(1, 'test', 'e10adc3949ba59abbe56e057f20f883e', 'thedew_123@hotmail.com'),
(2, 'test2', '25f9e794323b453885f5181f1b624d0b', 'dew63185@gmail.com'),
(3, 'test3', 'fb62579e990da4e2a8f15c3d1e123438', 'dew63186@hotmail.com'),
(4, 'test4', '6ebe76c9fb411be97b3b0d48b791a7c9', 'dew63189@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `WarehouseID` varchar(10) NOT NULL DEFAULT 'NOT NULL',
  `WarehouseName` varchar(50) NOT NULL DEFAULT 'NOT NULL',
  `Address` varchar(500) NOT NULL DEFAULT 'NOT NULL',
  `Tel_No` varchar(25) NOT NULL DEFAULT 'NOT NULL',
  `Email` varchar(50) NOT NULL DEFAULT 'NOT NULL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`WarehouseID`, `WarehouseName`, `Address`, `Tel_No`, `Email`) VALUES
('WH00000001', 'WhereHouse', '2020 on nut road suan luang subdistrict suan luang district, bangkok 10250', '028921185 6', 'WhereHouseCompany@yahoo.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binlocation`
--
ALTER TABLE `binlocation`
  ADD PRIMARY KEY (`BinID`),
  ADD KEY `WarehouseID` (`WarehouseID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`TruckID`,`OrderID`),
  ADD KEY `TruckID` (`TruckID`,`OrderID`),
  ADD KEY `OrderID` (`OrderID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmployeeID`);

--
-- Indexes for table `indvprod`
--
ALTER TABLE `indvprod`
  ADD PRIMARY KEY (`SerialNum`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `EmployeeID` (`EmployeeID`),
  ADD KEY `CustomerID_2` (`CustomerID`,`EmployeeID`),
  ADD KEY `WarehouseID` (`WarehouseID`);

--
-- Indexes for table `order details`
--
ALTER TABLE `order details`
  ADD PRIMARY KEY (`ProductID`,`OrderID`),
  ADD KEY `ProductID` (`ProductID`,`OrderID`),
  ADD KEY `OrderID` (`OrderID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`BillNo`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `pickorder`
--
ALTER TABLE `pickorder`
  ADD PRIMARY KEY (`SerialNum`,`OrderID`),
  ADD KEY `SerialNum` (`SerialNum`,`OrderID`),
  ADD KEY `OrderID` (`OrderID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`SerialNum`,`BinID`),
  ADD KEY `SerialNum` (`SerialNum`,`BinID`),
  ADD KEY `BinID` (`BinID`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`TransferID`),
  ADD KEY `BinID` (`ToBin`,`SerialNum`,`EmployeeID`),
  ADD KEY `EmployeeID` (`EmployeeID`),
  ADD KEY `SerialNum` (`SerialNum`);

--
-- Indexes for table `truck`
--
ALTER TABLE `truck`
  ADD PRIMARY KEY (`TruckID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`WarehouseID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binlocation`
--
ALTER TABLE `binlocation`
  ADD CONSTRAINT `BinLocation_ibfk_1` FOREIGN KEY (`WarehouseID`) REFERENCES `warehouse` (`WarehouseID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `Delivery_ibfk_1` FOREIGN KEY (`TruckID`) REFERENCES `truck` (`TruckID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Delivery_ibfk_2` FOREIGN KEY (`OrderID`) REFERENCES `order` (`OrderID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `indvprod`
--
ALTER TABLE `indvprod`
  ADD CONSTRAINT `IndvProd_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `Order_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `employee` (`EmployeeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Order_ibfk_2` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Order_ibfk_3` FOREIGN KEY (`WarehouseID`) REFERENCES `warehouse` (`WarehouseID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order details`
--
ALTER TABLE `order details`
  ADD CONSTRAINT `Order details_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `order` (`OrderID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Order details_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `Payment_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pickorder`
--
ALTER TABLE `pickorder`
  ADD CONSTRAINT `PickOrder_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `order` (`OrderID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PickOrder_ibfk_2` FOREIGN KEY (`SerialNum`) REFERENCES `indvprod` (`SerialNum`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `storage`
--
ALTER TABLE `storage`
  ADD CONSTRAINT `Storage_ibfk_1` FOREIGN KEY (`BinID`) REFERENCES `binlocation` (`BinID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Storage_ibfk_2` FOREIGN KEY (`SerialNum`) REFERENCES `indvprod` (`SerialNum`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transfer`
--
ALTER TABLE `transfer`
  ADD CONSTRAINT `Transfer_ibfk_1` FOREIGN KEY (`ToBin`) REFERENCES `binlocation` (`BinID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Transfer_ibfk_2` FOREIGN KEY (`EmployeeID`) REFERENCES `employee` (`EmployeeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Transfer_ibfk_3` FOREIGN KEY (`SerialNum`) REFERENCES `indvprod` (`SerialNum`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
