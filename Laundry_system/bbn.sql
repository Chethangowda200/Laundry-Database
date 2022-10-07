-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2021 at 08:24 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bbn`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `generateServiceId` () RETURNS INT(11) NO SQL
BEGIN
DECLARE countId INT;
SELECT `serviceId` INTO countId from `serviceid`;


UPDATE `serviceid` SET `serviceId`= (countId+1) WHERE primaryid = 1 ;
RETURN countId+1;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `itemId` int(2) NOT NULL,
  `itemName` varchar(45) NOT NULL,
  `price` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemId`, `itemName`, `price`) VALUES
(1, 'Long-arm-shirt', 20),
(2, 'Short-arm-shirt', 15),
(3, 'Long-arm-t-shirt', 20),
(4, 'Short-arm-t-shirt', 15),
(5, 'Trousers', 20),
(6, 'Shorts', 15),
(7, 'Jeans', 25),
(8, 'Long-skirt', 20),
(9, 'Short-skirt', 15),
(10, 'Dressing-coat', 50),
(11, 'Doctor-suit', 60),
(12, 'Towel', 40);

-- --------------------------------------------------------

--
-- Table structure for table `laundryservice`
--

CREATE TABLE `laundryservice` (
  `Pid` int(11) NOT NULL,
  `serviceId` int(11) NOT NULL,
  `memberId` int(11) NOT NULL,
  `staffId` int(11) NOT NULL,
  `dateIn` date NOT NULL,
  `dateOut` date NOT NULL,
  `serviceStatus` enum('F','NF') NOT NULL,
  `totalPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laundryservice`
--

INSERT INTO `laundryservice` (`Pid`, `serviceId`, `memberId`, `staffId`, `dateIn`, `dateOut`, `serviceStatus`, `totalPrice`) VALUES
(1, 1, 101, 001, '2021-12-15', '2021-12-16', 'F', 1000),
(2, 2, 102, 002, '2021-12-15', '2021-12-16', 'F', 3000),
(3, 3, 103, 003, '2021-12-15', '2021-12-16', 'F', 4000),
(4, 4, 101, 004, '2021-12-15', '0000-00-00', 'NF', 200),
(5, 5, 105, 005, '2021-12-15', '0000-00-00', 'NF', 700);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `memberId` int(15) NOT NULL,
  `firstName` varchar(45) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `mobileNo` varchar(10) NOT NULL,
  `address` varchar(45) NOT NULL,
  `memberTypeId` int(1) NOT NULL,
  `bonusPoint` int(5) NOT NULL,
  `email` varchar(45) NOT NULL,
  `memberUserId` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `gender` enum('M','F') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`memberId`, `firstName`, `lastName`, `mobileNo`, `address`, `memberTypeId`, `bonusPoint`, `email`, `memberUserId`, `password`, `gender`) VALUES
(101, 'suman', 'rao', '9865423354', 'banglore', 3, 6000, 'suman@gmail.com', 'suman', '***************', 'M'),
(102, 'arya', 'm', '7856245236', 'banglore', 1, 0, 'arya@gmail.com', 'arya', '**************', 'F'),
(103, 'santhu', 'kumar', '7531354454', 'banglore', 1, 0, 'santhu@gmail.com', 'santhu', '****************', 'M'),
(104, 'surya', 'k', '9851354454', 'banglore', 1, 0, 'surya@gmail.com', 'surya', '****************', 'M'),
(105, 'harsha', 'v', '9855145463', 'banglore', 1, 0, 'harsha@gmail.com', 'harsha', '****************', 'M');

-- --------------------------------------------------------

--
-- Table structure for table `m_type`
--

CREATE TABLE `m_type` (
  `m_TypeId` int(1) NOT NULL,
  `m_TypeName` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_type`
--

INSERT INTO `m_type` (`m_TypeId`, `m_TypeName`) VALUES
(1, 'Bronze'),
(2, 'Silver'),
(3, 'Gold');

-- --------------------------------------------------------

--
-- Table structure for table `regisitem`
--

CREATE TABLE `regisitem` (
  `regisId` int(15) NOT NULL,
  `memberId` int(15) NOT NULL,
  `staffId` int(15) DEFAULT NULL,
  `serviceId` int(15) DEFAULT NULL,
  `itemId` int(15) DEFAULT NULL,
  `quantity` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regisitem`
--

INSERT INTO `regisitem` (`regisId`, `memberId`, `staffId`, `serviceId`, `itemId`, `quantity`) VALUES
(1, 101, 001, 1, 1, 50),
(2, 101, 001, 2, 2, 200),
(3, 105, 002, 3, 1, 200),
(4, 105, 002, 4, 1, 10),
(5, 105, 003, 5, 1, 10),
(6, 103, 003, 5, 2, 10),
(7, 103, 004, 5, 3, 10),
(8, 103, 004, 5, 4, 10);

-- --------------------------------------------------------

--
-- Table structure for table `serviceid`
--

CREATE TABLE `serviceid` (
  `primaryid` int(11) NOT NULL,
  `serviceId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `serviceid`
--

INSERT INTO `serviceid` (`primaryid`, `serviceId`) VALUES
(1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffId` int(15) NOT NULL,
  `firstName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `citizenNo` varchar(13) DEFAULT NULL,
  `dateOfBirth` date NOT NULL,
  `mobileNo` varchar(10) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `userStaff` varchar(45) NOT NULL,
  `passStaff` varchar(45) NOT NULL,
  `status` enum('STAFF','ADMIN') NOT NULL,
  `gender` enum('M','F') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffId`, `firstName`, `lastName`, `citizenNo`, `dateOfBirth`, `mobileNo`, `address`, `email`, `userStaff`, `passStaff`, `status`, `gender`) VALUES
(001, 'ramu', 'kumar', '0', '1999-11-10', '7846518454', 'banglore', 'ramu@gmail.com', 'ramu', '**********', 'STAFF', 'M'),
(002, 'karthik', 'kumar', '0', '1998-06-15', '7562145698', 'banglore', 'karthik@gmail.com', 'karthik', '**********', 'STAFF', 'M'),
(003, 'geetha', 's', '0', '1998-11-15', '9874525634', 'banglore', 'geetha@gmail.com', 'geetha', '**********', 'STAFF', 'F'),
(004, 'chethan', 'gowda', '0', '2000-05-02', '9108565740', 'banglore', 'chethan@gmail.com', 'chethan', '**********', 'ADMIN', 'M'),
(005, 'vishnu', 'das', '0', '2000-07-27', '7795644645', 'banglore', 'vishnu@gmail.com', 'vishnu', '**********', 'ADMIN', 'M');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemId`);

--
-- Indexes for table `laundryservice`
--
ALTER TABLE `laundryservice`
  ADD PRIMARY KEY (`Pid`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`memberId`);

--
-- Indexes for table `m_type`
--
ALTER TABLE `m_type`
  ADD PRIMARY KEY (`m_TypeId`);

--
-- Indexes for table `regisitem`
--
ALTER TABLE `regisitem`
  ADD PRIMARY KEY (`regisId`);

--
-- Indexes for table `serviceid`
--
ALTER TABLE `serviceid`
  ADD PRIMARY KEY (`primaryid`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `itemId` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `laundryservice`
--
ALTER TABLE `laundryservice`
  MODIFY `Pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `memberId` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `m_type`
--
ALTER TABLE `m_type`
  MODIFY `m_TypeId` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `regisitem`
--
ALTER TABLE `regisitem`
  MODIFY `regisId` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `serviceid`
--
ALTER TABLE `serviceid`
  MODIFY `primaryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffId` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
