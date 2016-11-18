-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2016 at 07:12 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `listed`
--

-- --------------------------------------------------------

--
-- Table structure for table `actiondb`
--

CREATE TABLE `actiondb` (
  `productid` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `favourite` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `actiondb`
--

INSERT INTO `actiondb` (`productid`, `username`, `favourite`) VALUES
('sample_65430', 'sample', 1),
('sample_65430', 'keertand', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categorydb`
--

CREATE TABLE `categorydb` (
  `categoryid` varchar(100) NOT NULL,
  `categoryname` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `spectable` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorydb`
--

INSERT INTO `categorydb` (`categoryid`, `categoryname`, `description`, `spectable`) VALUES
('mobiles_16985', 'mobiles', 'Mobiles and other cellular devices ', 'mobiles_16985_table'),
('laptops_16986', 'laptops', 'Laptops and other hand held devices', 'laptops_16986_table');

-- --------------------------------------------------------

--
-- Table structure for table `commentdb`
--

CREATE TABLE `commentdb` (
  `commentid` varchar(200) NOT NULL,
  `reviewid` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `commenttext` text NOT NULL,
  `timestamp` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commentdb`
--

INSERT INTO `commentdb` (`commentid`, `reviewid`, `username`, `commenttext`, `timestamp`) VALUES
('sample_65430_review_1479157717_comments_1479200526', 'sample_65430_review_1479157717', 'keertand', 'Still using the Moto X Play as your daily driver? Then, you\'ll be happy to know that Motorola has confirmed that Android Nougat is headed to your device soon.\n\nWhat\'s so good about it? While it may not be the visual overhaul seen with Android Lollipop, Nougat is all about refinement. For example, you\'ll be able to reply to text messages within the notifications. Also, split-screen app support will make working hard (or goofing off) even more efficient.', '1479200526'),
('sample_65430_review_1479157717_comments_1479344154', 'sample_65430_review_1479157717', 'keertand', 'wait.. did i just comment that ? ^ XD ', '1479344154'),
('sample_65430_review_1479157717_comments_1479345015', 'sample_65430_review_1479157717', 'keertand', 'so, i wanna ', '1479345015'),
('sample_65430_review_1479157717_comments_1479349011', 'sample_65430_review_1479157717', 'sample', 'Dude? are you stoned or what  -_- ', '1479349011'),
('sample_65430_review_1479157717_comments_1479365951', 'sample_65430_review_1479157717', 'keertand', '^ whats your problem bro >.<   n||m', '1479365951');

-- --------------------------------------------------------

--
-- Table structure for table `descriptiondb`
--

CREATE TABLE `descriptiondb` (
  `productid` varchar(200) NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `descriptiondb`
--

INSERT INTO `descriptiondb` (`productid`, `description`) VALUES
('sample_65430', 'PRODUCT : MOTOROLA MOTO X PLAY FACTORY UNLOCKED 4G/LTE CELL PHONE \n\nCOLOUR : WHITE \n\nMEMORY : 16GB \n\nMODEL NO : MOTOROLA MOTO X PLAY - SINGLE SIM \n\nPART NO : XT1562 \n\nSIMCARD TYPE : NANO-SIM \n\nFREQUENCIES : COMPATIBLE TO USE WITH NETWORK SIM CARDS THAT WORKS ON \n\n2G : GSM 850 / 900 / 1800 / 1900 and/or \n3G : 850(B5)/ 900(B8)/ 1800(B3) / 1900(B2) / 2100(B1) and/or \n4G : LTE 700(B28) / 800(B19) / 800(B20) / 850(B5) / 900(B8) / 1800(B3) / 2100(B1) / 2500(B41) / 2600(B7) / 2600(B38) \n\nIMPORTANT : PLEASE CHECK WITH YOUR NETWORK PROVIDER THE COMPATIBILITY BEFORE YOU BUY. \n\nSTOCK TYPE : UK / EU SPECS ');

-- --------------------------------------------------------

--
-- Table structure for table `laptops_16986_table`
--

CREATE TABLE `laptops_16986_table` (
  `specificationid` varchar(200) NOT NULL,
  `weight` varchar(100) NOT NULL,
  `touchscreen` varchar(100) NOT NULL,
  `usb_type` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mobiles_16985_table`
--

CREATE TABLE `mobiles_16985_table` (
  `specificationid` varchar(200) NOT NULL,
  `battery` varchar(100) NOT NULL,
  `modelno` varchar(100) NOT NULL,
  `bluetooth` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `productdb`
--

CREATE TABLE `productdb` (
  `productid` varchar(200) NOT NULL,
  `authorid` varchar(100) NOT NULL,
  `pname` varchar(200) NOT NULL,
  `categoryid` varchar(100) NOT NULL,
  `specificationid` varchar(200) NOT NULL,
  `imgno` int(3) NOT NULL,
  `approval` int(2) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productdb`
--

INSERT INTO `productdb` (`productid`, `authorid`, `pname`, `categoryid`, `specificationid`, `imgno`, `approval`) VALUES
('sample_65430', 'sample', 'Recliner Chair phone', 'mobile_16985', 'mobile_16985_2340', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reviewdb`
--

CREATE TABLE `reviewdb` (
  `reviewid` varchar(200) NOT NULL,
  `productid` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `rating` varchar(4) NOT NULL,
  `reviewtext` text NOT NULL,
  `timestamp` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviewdb`
--

INSERT INTO `reviewdb` (`reviewid`, `productid`, `username`, `rating`, `reviewtext`, `timestamp`) VALUES
('sample_65430_review_1479157717', 'sample_65430', 'keertand', '4.8', 'dsfvfnh', '1479366173'),
('sample_65430_review_1479349052', 'sample_65430', 'sample', '3.5', 'for me, its awesome :D ', '1479349062');

-- --------------------------------------------------------

--
-- Table structure for table `userdb`
--

CREATE TABLE `userdb` (
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `usertype` int(2) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `username` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`username`, `email`, `fname`, `lname`) VALUES
('keertand', 'kxd160830@utdallas.edu', 'keertan', 'Dakarapu'),
('sample', 's', 'google', 'company');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorydb`
--
ALTER TABLE `categorydb`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `commentdb`
--
ALTER TABLE `commentdb`
  ADD PRIMARY KEY (`commentid`);

--
-- Indexes for table `descriptiondb`
--
ALTER TABLE `descriptiondb`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `laptops_16986_table`
--
ALTER TABLE `laptops_16986_table`
  ADD PRIMARY KEY (`specificationid`);

--
-- Indexes for table `mobiles_16985_table`
--
ALTER TABLE `mobiles_16985_table`
  ADD PRIMARY KEY (`specificationid`);

--
-- Indexes for table `productdb`
--
ALTER TABLE `productdb`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `reviewdb`
--
ALTER TABLE `reviewdb`
  ADD PRIMARY KEY (`reviewid`);

--
-- Indexes for table `userdb`
--
ALTER TABLE `userdb`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
