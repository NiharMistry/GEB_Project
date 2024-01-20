-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 28, 2023 at 10:08 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gebdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

DROP TABLE IF EXISTS `application`;
CREATE TABLE IF NOT EXISTS `application` (
  `appid` int NOT NULL AUTO_INCREMENT,
  `appdate` date NOT NULL,
  `consumerid` int NOT NULL,
  `appheading` varchar(50) NOT NULL,
  `details` varchar(100) NOT NULL,
  `deptid` int NOT NULL,
  `status` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`appid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`appid`, `appdate`, `consumerid`, `appheading`, `details`, `deptid`, `status`) VALUES
(1, '2023-04-19', 5, 'New Connection', ' i want new connection for my home', 1, 'pandding'),
(2, '2023-04-28', 5, 'New Connection', ' I want to new connection for my new home.', 4, 'pandding');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

DROP TABLE IF EXISTS `bill`;
CREATE TABLE IF NOT EXISTS `bill` (
  `billid` int NOT NULL AUTO_INCREMENT,
  `billdate` date NOT NULL,
  `consumerid` int NOT NULL,
  `meterid` int NOT NULL,
  `connectionid` int NOT NULL,
  `consuunit` int NOT NULL,
  `lastunit` int NOT NULL,
  `meterrent` int NOT NULL,
  `tax` float(4,2) NOT NULL,
  `addamt` float(10,2) NOT NULL,
  `lessamt` float(10,2) NOT NULL,
  PRIMARY KEY (`billid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`billid`, `billdate`, `consumerid`, `meterid`, `connectionid`, `consuunit`, `lastunit`, `meterrent`, `tax`, `addamt`, `lessamt`) VALUES
(1, '2023-04-26', 5, 1, 1, 200, 100, 100, 20.00, 100.00, 50.00),
(2, '2023-04-26', 5, 1, 1, 400, 200, 100, 20.00, 20.00, 10.00),
(3, '2023-04-28', 7, 9, 2, 200, 50, 100, 20.00, 30.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `cityid` int NOT NULL AUTO_INCREMENT,
  `cityname` varchar(20) NOT NULL,
  `shortname` varchar(10) DEFAULT NULL,
  `pincode` varchar(7) DEFAULT NULL,
  `state` varchar(20) NOT NULL,
  PRIMARY KEY (`cityid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`cityid`, `cityname`, `shortname`, `pincode`, `state`) VALUES
(1, 'Navsari', 'Nvs', '396445', 'Gujarat'),
(2, 'Surat', 'SRT', '369852', 'Gujarat'),
(3, 'Valsad', 'VLD', '36989', 'Gujarat');

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

DROP TABLE IF EXISTS `complain`;
CREATE TABLE IF NOT EXISTS `complain` (
  `compid` int NOT NULL AUTO_INCREMENT,
  `compdate` date NOT NULL,
  `consumerid` int NOT NULL,
  `complain` varchar(50) NOT NULL,
  `solution` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `deptid` int NOT NULL,
  PRIMARY KEY (`compid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`compid`, `compdate`, `consumerid`, `complain`, `solution`, `status`, `deptid`) VALUES
(1, '2023-04-22', 5, ' power problems', 'none', 'process', 4),
(2, '2023-04-28', 5, ' Power Problems', 'none', 'process', 4);

-- --------------------------------------------------------

--
-- Table structure for table `connection`
--

DROP TABLE IF EXISTS `connection`;
CREATE TABLE IF NOT EXISTS `connection` (
  `connid` int NOT NULL AUTO_INCREMENT,
  `conndate` date NOT NULL,
  `consumerid` int NOT NULL,
  `propertytype` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(10) NOT NULL,
  `pincode` varchar(7) NOT NULL,
  `landmark` varchar(20) NOT NULL,
  `connload` varchar(15) NOT NULL,
  `conntype` varchar(10) NOT NULL,
  `charge` int NOT NULL,
  PRIMARY KEY (`connid`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `connection`
--

INSERT INTO `connection` (`connid`, `conndate`, `consumerid`, `propertytype`, `address`, `city`, `pincode`, `landmark`, `connload`, `conntype`, `charge`) VALUES
(9, '2023-04-02', 7, 'Shop', ' B-906 Prem Residency ', '1', '396445', 'Ashanager', '100KW', 'Domestic', 10000),
(7, '2023-04-01', 5, 'Shop', ' Lunsikui ', '2', '396445', 'station', '200kv', 'Domestic', 100),
(8, '2023-04-02', 7, 'Shop', ' B-906 Prem Residency ', '1', '396445', 'Ashanager', '100KW', 'Domestic', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `connrequest`
--

DROP TABLE IF EXISTS `connrequest`;
CREATE TABLE IF NOT EXISTS `connrequest` (
  `reqid` int NOT NULL,
  `reqdate` date NOT NULL,
  `consumerid` int NOT NULL,
  `connfor` varchar(20) DEFAULT NULL,
  `phase` varchar(10) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`reqid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `connrequest`
--

INSERT INTO `connrequest` (`reqid`, `reqdate`, `consumerid`, `connfor`, `phase`, `address`, `city`, `status`) VALUES
(1, '2023-04-22', 5, 'Shop', '', ' Lunsikui', 'Surat', 'padding'),
(2, '2023-04-22', 5, 'Shop', 'One Phase', ' Lunsikui', 'Surat', 'padding'),
(3, '2023-04-28', 5, 'Shop', 'Three Phas', ' Ashanagar', 'Navsari', 'padding');

-- --------------------------------------------------------

--
-- Table structure for table `consumer`
--

DROP TABLE IF EXISTS `consumer`;
CREATE TABLE IF NOT EXISTS `consumer` (
  `consumerid` int NOT NULL,
  `consumername` varchar(30) NOT NULL,
  `address` varchar(100) CHARACTER SET utf8mb4  DEFAULT NULL,
  `cityname` varchar(20) CHARACTER SET utf8mb4  DEFAULT NULL,
  `pincode` varchar(7) CHARACTER SET utf8mb4  DEFAULT NULL,
  `image` varchar(20) CHARACTER SET utf8mb4  DEFAULT NULL,
  PRIMARY KEY (`consumerid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `consumer`
--

INSERT INTO `consumer` (`consumerid`, `consumername`, `address`, `cityname`, `pincode`, `image`) VALUES
(5, 'Swayam Bhalodia', 'Lunsikui', 'Navsari', '36989', 'customer5.jpg'),
(7, 'Ajay', 'B-906 Prem Residency', 'Navsari', '396445', 'customer7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `contactid` int NOT NULL AUTO_INCREMENT,
  `contactdate` date NOT NULL,
  `personname` varchar(20) NOT NULL,
  `contactno` varchar(15) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`contactid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contactid`, `contactdate`, `personname`, `contactno`, `emailid`, `description`) VALUES
(1, '2022-11-23', 'Raj', '123456789', 'raj@gmail.com', 'Increasing the load');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `deptid` int NOT NULL AUTO_INCREMENT,
  `deptname` varchar(30) NOT NULL,
  `shortname` varchar(15) DEFAULT NULL,
  `head` varchar(20) DEFAULT NULL,
  `divid` int NOT NULL,
  PRIMARY KEY (`deptid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`deptid`, `deptname`, `shortname`, `head`, `divid`) VALUES
(1, 'Bill Collection', 'BC', 'Jay', 1),
(2, 'Meter Department', 'MD', 'Amit', 1),
(3, 'Purchase', 'PUR', 'Jay Patel', 1),
(4, 'Connection', 'Conn', 'Jay', 3);

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

DROP TABLE IF EXISTS `division`;
CREATE TABLE IF NOT EXISTS `division` (
  `divid` int NOT NULL AUTO_INCREMENT,
  `divname` varchar(30) NOT NULL,
  `shortname` varchar(15) DEFAULT NULL,
  `head` varchar(20) NOT NULL,
  `contactno` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`divid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`divid`, `divname`, `shortname`, `head`, `contactno`) VALUES
(1, 'Sales', 'SLS', 'Amit', '9875693654'),
(3, 'Maintance', 'MNC', 'Kiran Shah', '9876541236');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

DROP TABLE IF EXISTS `document`;
CREATE TABLE IF NOT EXISTS `document` (
  `docid` int NOT NULL AUTO_INCREMENT,
  `docname` varchar(50) NOT NULL,
  `doctype` varchar(20) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `consumerid` int NOT NULL,
  PRIMARY KEY (`docid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

DROP TABLE IF EXISTS `email`;
CREATE TABLE IF NOT EXISTS `email` (
  `emailid` int NOT NULL AUTO_INCREMENT,
  `emaildate` date NOT NULL,
  `emailto` varchar(50) NOT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`emailid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`emailid`, `emaildate`, `emailto`, `subject`, `description`) VALUES
(1, '2023-04-15', 'swayam@gmail.com', 'Testing', 'Hi '),
(2, '2023-04-22', 'kirit.softech@gmail.com', 'for new connection', 'i want to new GEB connection ');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `feedbackid` int NOT NULL AUTO_INCREMENT,
  `feedbackdate` date NOT NULL,
  `consumerid` int NOT NULL,
  `feedbackfor` varchar(30) DEFAULT NULL,
  `details` varchar(50) DEFAULT NULL,
  `rating` varchar(10) DEFAULT NULL,
  `deptid` int NOT NULL,
  `divid` int NOT NULL,
  PRIMARY KEY (`feedbackid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `msgid` int NOT NULL AUTO_INCREMENT,
  `msgdate` date NOT NULL,
  `mobileno` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `message` varchar(200) NOT NULL,
  PRIMARY KEY (`msgid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`msgid`, `msgdate`, `mobileno`, `message`) VALUES
(1, '2023-04-18', '9879641323', 'Check your load'),
(2, '2023-04-22', '9879641323', 'pay your bill');

-- --------------------------------------------------------

--
-- Table structure for table `meter`
--

DROP TABLE IF EXISTS `meter`;
CREATE TABLE IF NOT EXISTS `meter` (
  `meterid` int NOT NULL,
  `installdate` date NOT NULL,
  `consumerid` int NOT NULL,
  `connid` int NOT NULL,
  `metertype` varchar(20) NOT NULL,
  `unit` int NOT NULL,
  PRIMARY KEY (`meterid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meter`
--

INSERT INTO `meter` (`meterid`, `installdate`, `consumerid`, `connid`, `metertype`, `unit`) VALUES
(1, '2023-04-01', 5, 1, 'Digital', 100),
(2, '2023-04-04', 7, 9, 'Anolog', 110),
(3, '2023-04-04', 7, 9, 'Anolog', 110),
(4, '2023-04-10', 7, 8, 'Anolog', 333);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
CREATE TABLE IF NOT EXISTS `register` (
  `regid` int NOT NULL,
  `regdate` date NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `usertype` varchar(15) NOT NULL,
  `emailid` varchar(40) NOT NULL,
  `contactno` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`regid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`regid`, `regdate`, `username`, `password`, `usertype`, `emailid`, `contactno`) VALUES
(1, '2022-09-01', 'Amit', '123', 'Consumer', 'amit@gmail.com', NULL),
(2, '2022-09-01', 'Admin', 'admin', 'Admin', 'admin@gmail.com', NULL),
(3, '2022-11-18', 'Raj', '123', 'Consumer', 'raj@gmail.com', NULL),
(4, '2022-12-17', 'Pratixa', '123456', 'Consumer', 'pratixa1234@gmail.com', NULL),
(5, '2023-02-18', 'Swayam', '123', 'Consumer', 'swayam@gmail.com', '9879641323'),
(6, '2023-04-15', 'Kiran', '123', 'Consumer', 'kiran@gmail.com', NULL),
(7, '2023-04-22', 'Ajay', '123', 'Consumer', 'ajya@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suggestion`
--

DROP TABLE IF EXISTS `suggestion`;
CREATE TABLE IF NOT EXISTS `suggestion` (
  `suggid` int NOT NULL AUTO_INCREMENT,
  `suggdate` date NOT NULL,
  `consumerid` int NOT NULL,
  `suggestion` varchar(100) NOT NULL,
  `divid` int NOT NULL,
  `deptid` int NOT NULL,
  `suggfor` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`suggid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
