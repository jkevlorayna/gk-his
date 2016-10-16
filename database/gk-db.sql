-- phpMyAdmin SQL Dump
-- version 4.2.8
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2016 at 06:16 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gk-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
`Id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_desc` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`Id`, `category_name`, `category_desc`) VALUES
(24, 'Hotels', 'Hotels List'),
(25, 'Resorts', '0'),
(26, 'Beach', '0'),
(27, 'Restuarant', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_diagnosis`
--

CREATE TABLE IF NOT EXISTS `tbl_diagnosis` (
`Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_diagnosis`
--

INSERT INTO `tbl_diagnosis` (`Id`, `Name`) VALUES
(1, 'Fever');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_educational_attainment`
--

CREATE TABLE IF NOT EXISTS `tbl_educational_attainment` (
`Id` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_educational_attainment`
--

INSERT INTO `tbl_educational_attainment` (`Id`, `Name`) VALUES
(2, 'College Degree'),
(3, 'Elementary Level');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employment_status`
--

CREATE TABLE IF NOT EXISTS `tbl_employment_status` (
`Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employment_status`
--

INSERT INTO `tbl_employment_status` (`Id`, `Name`) VALUES
(1, 'Employed'),
(2, 'UnEmployed');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_household`
--

CREATE TABLE IF NOT EXISTS `tbl_household` (
`Id` int(11) NOT NULL,
  `HouseholdNo` varchar(50) NOT NULL,
  `SurveyDate` date NOT NULL,
  `Address` varchar(150) NOT NULL,
  `LivelihoodId` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_household`
--

INSERT INTO `tbl_household` (`Id`, `HouseholdNo`, `SurveyDate`, `Address`, `LivelihoodId`) VALUES
(12, '123', '0000-00-00', 'bago city', 1),
(13, '456', '2016-10-16', 'bago city', 1),
(15, '455', '2016-10-16', 'ads', 2),
(16, 'sads', '2016-10-16', 'das', 3),
(17, '4233', '2016-10-16', 'dasdasd', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_livelihood`
--

CREATE TABLE IF NOT EXISTS `tbl_livelihood` (
`Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_livelihood`
--

INSERT INTO `tbl_livelihood` (`Id`, `Name`) VALUES
(1, 'Farming'),
(2, 'Fishing'),
(3, 'Employment');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE IF NOT EXISTS `tbl_member` (
`Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Age` int(11) NOT NULL,
  `CivilStatus` varchar(100) NOT NULL,
  `HouseholdId` int(11) NOT NULL,
  `EmploymentStatusId` int(11) NOT NULL,
  `EducationalAttainmentId` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`Id`, `Name`, `Gender`, `Age`, `CivilStatus`, `HouseholdId`, `EmploymentStatusId`, `EducationalAttainmentId`) VALUES
(47, 'test 166', 'Male', 1, 'single', 12, 1, 2),
(50, 'john kevin', 'Male', 22, 'Single', 13, 1, 2),
(51, 'member 2', 'Male', 22, 'Separated', 13, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE IF NOT EXISTS `tbl_roles` (
`Id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL,
  `SqNo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE IF NOT EXISTS `tbl_setting` (
`Id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `settingKey` varchar(50) NOT NULL,
  `value` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`Id`, `title`, `settingKey`, `value`) VALUES
(4, 'Interest', 'INTEREST', '0.15'),
(6, 'CBU', 'CBU', '50'),
(7, 'MBA', 'MBA', '25'),
(8, 'MF', 'MF', '300'),
(9, 'CF', 'CF', '10'),
(10, 'LRF', 'LRF', '15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE IF NOT EXISTS `tbl_status` (
`Id` int(11) NOT NULL,
  `Status` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`Id`, `Status`) VALUES
(2, 'Full Payment'),
(3, 'PastDue'),
(4, 'OverDue'),
(5, 'Restruct');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
`user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `UserTypeId` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `name`, `username`, `password`, `UserTypeId`, `status`) VALUES
(3, 'john kevin lorayna', 'kevin', 'kevin', 1, 'InActive'),
(4, 'Administrator', 'admin', 'admin', 0, 'Active'),
(5, 'stephanie villanueva', 'teph', 'q', 2, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_roles`
--

CREATE TABLE IF NOT EXISTS `tbl_user_roles` (
`Id` int(11) NOT NULL,
  `RoleId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_type`
--

CREATE TABLE IF NOT EXISTS `tbl_user_type` (
`Id` int(11) NOT NULL,
  `user_type` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_type`
--

INSERT INTO `tbl_user_type` (`Id`, `user_type`) VALUES
(1, 'Manger'),
(2, 'Normal user');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_year`
--

CREATE TABLE IF NOT EXISTS `tbl_year` (
`Id` int(11) NOT NULL,
  `Year` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_year`
--

INSERT INTO `tbl_year` (`Id`, `Year`) VALUES
(129, 2014),
(130, 2015),
(131, 2016),
(132, 2017),
(133, 2018),
(134, 2019),
(136, 2013),
(137, 2020);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
 ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_diagnosis`
--
ALTER TABLE `tbl_diagnosis`
 ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_educational_attainment`
--
ALTER TABLE `tbl_educational_attainment`
 ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_employment_status`
--
ALTER TABLE `tbl_employment_status`
 ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_household`
--
ALTER TABLE `tbl_household`
 ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_livelihood`
--
ALTER TABLE `tbl_livelihood`
 ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
 ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
 ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
 ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
 ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
 ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_user_roles`
--
ALTER TABLE `tbl_user_roles`
 ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
 ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_year`
--
ALTER TABLE `tbl_year`
 ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tbl_diagnosis`
--
ALTER TABLE `tbl_diagnosis`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_educational_attainment`
--
ALTER TABLE `tbl_educational_attainment`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_employment_status`
--
ALTER TABLE `tbl_employment_status`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_household`
--
ALTER TABLE `tbl_household`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tbl_livelihood`
--
ALTER TABLE `tbl_livelihood`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_user_roles`
--
ALTER TABLE `tbl_user_roles`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_year`
--
ALTER TABLE `tbl_year`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=138;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
