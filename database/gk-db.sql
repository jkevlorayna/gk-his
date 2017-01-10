-- phpMyAdmin SQL Dump
-- version 4.2.8
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2017 at 12:08 AM
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
-- Table structure for table `tbl_crime`
--

CREATE TABLE IF NOT EXISTS `tbl_crime` (
`Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_crime`
--

INSERT INTO `tbl_crime` (`Id`, `Name`) VALUES
(1, 'Murder'),
(2, 'Rape'),
(3, 'stealing');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_crime_report`
--

CREATE TABLE IF NOT EXISTS `tbl_crime_report` (
`Id` int(11) NOT NULL,
  `CrimeDate` date NOT NULL,
  `CrimeTime` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_crime_report`
--

INSERT INTO `tbl_crime_report` (`Id`, `CrimeDate`, `CrimeTime`) VALUES
(1, '2016-11-08', '00:00:00'),
(2, '2016-11-20', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_crime_report_crimes`
--

CREATE TABLE IF NOT EXISTS `tbl_crime_report_crimes` (
`Id` int(11) NOT NULL,
  `CrimeReportId` int(11) NOT NULL,
  `Crime` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_crime_report_crimes`
--

INSERT INTO `tbl_crime_report_crimes` (`Id`, `CrimeReportId`, `Crime`) VALUES
(3, 2, 'Rape'),
(4, 2, 'stealing'),
(5, 1, 'Murder'),
(6, 1, 'Murder'),
(7, 1, 'Rape');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_crime_report_suspects`
--

CREATE TABLE IF NOT EXISTS `tbl_crime_report_suspects` (
`Id` int(11) NOT NULL,
  `CrimeReportId` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Age` int(11) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Gender` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_crime_report_suspects`
--

INSERT INTO `tbl_crime_report_suspects` (`Id`, `CrimeReportId`, `Name`, `Age`, `Address`, `Gender`) VALUES
(1, 2, 'Suspect 1', 0, '', 'Male'),
(2, 2, 'Suspect 2', 0, '', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_crime_report_victims`
--

CREATE TABLE IF NOT EXISTS `tbl_crime_report_victims` (
`Id` int(11) NOT NULL,
  `CrimeReportId` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Age` int(11) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Gender` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_crime_report_victims`
--

INSERT INTO `tbl_crime_report_victims` (`Id`, `CrimeReportId`, `Name`, `Age`, `Address`, `Gender`) VALUES
(1, 2, 'Victim 1', 10, 'Bacolod City', 'Male'),
(2, 2, 'Victim 2', 22, 'Bacolod City', 'Female');

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_household`
--

INSERT INTO `tbl_household` (`Id`, `HouseholdNo`, `SurveyDate`, `Address`, `LivelihoodId`) VALUES
(12, '123', '2015-09-04', 'Village 1', 1),
(13, '456', '2016-10-16', 'Village 1', 1),
(15, '455', '2016-10-16', 'Village 1', 2),
(16, 'sads', '2016-10-17', 'Village 2', 3),
(17, '4233', '2016-10-16', 'Village 3', 2),
(19, '2014 -test', '2014-10-16', 'Village 3', 1),
(20, '2013', '2013-10-16', 'dasd', 1),
(21, 'dasd', '2012-10-16', 'Village 1', 2),
(22, 'dasd', '2011-10-16', 'Village 1', 2),
(23, 'dasd', '2010-10-16', 'Village 1', 2),
(24, 'test', '2016-12-31', 'Village 1', 1);

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
  `EducationalAttainmentId` int(11) NOT NULL,
  `Relationship` varchar(100) NOT NULL,
  `DateOfBirth` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`Id`, `Name`, `Gender`, `Age`, `CivilStatus`, `HouseholdId`, `EmploymentStatusId`, `EducationalAttainmentId`, `Relationship`, `DateOfBirth`) VALUES
(85, 'Member 1', 'Male', 1, 'Widow', 17, 1, 2, '', '2017-01-17'),
(86, 'Member 1', 'Male', 1, 'Widow', 17, 1, 2, '', '2017-01-17'),
(87, 'member 2', 'Male', 1, 'Widow', 17, 1, 2, '1', '2017-01-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_relationship`
--

CREATE TABLE IF NOT EXISTS `tbl_relationship` (
`Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_relationship`
--

INSERT INTO `tbl_relationship` (`Id`, `Name`) VALUES
(1, 'Mother'),
(2, 'Father'),
(3, 'Son'),
(4, 'Daugther');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE IF NOT EXISTS `tbl_roles` (
`Id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL,
  `SqNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `tbl_village`
--

CREATE TABLE IF NOT EXISTS `tbl_village` (
`Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_village`
--

INSERT INTO `tbl_village` (`Id`, `Name`) VALUES
(1, 'Village 1'),
(2, 'Village 2'),
(3, 'Village 3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_year`
--

CREATE TABLE IF NOT EXISTS `tbl_year` (
`Id` int(11) NOT NULL,
  `Year` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_year`
--

INSERT INTO `tbl_year` (`Id`, `Year`) VALUES
(129, 2014),
(130, 2015),
(131, 2016),
(136, 2013);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
 ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_crime`
--
ALTER TABLE `tbl_crime`
 ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_crime_report`
--
ALTER TABLE `tbl_crime_report`
 ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_crime_report_crimes`
--
ALTER TABLE `tbl_crime_report_crimes`
 ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_crime_report_suspects`
--
ALTER TABLE `tbl_crime_report_suspects`
 ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_crime_report_victims`
--
ALTER TABLE `tbl_crime_report_victims`
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
-- Indexes for table `tbl_relationship`
--
ALTER TABLE `tbl_relationship`
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
-- Indexes for table `tbl_village`
--
ALTER TABLE `tbl_village`
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
-- AUTO_INCREMENT for table `tbl_crime`
--
ALTER TABLE `tbl_crime`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_crime_report`
--
ALTER TABLE `tbl_crime_report`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_crime_report_crimes`
--
ALTER TABLE `tbl_crime_report_crimes`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_crime_report_suspects`
--
ALTER TABLE `tbl_crime_report_suspects`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_crime_report_victims`
--
ALTER TABLE `tbl_crime_report_victims`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
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
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tbl_livelihood`
--
ALTER TABLE `tbl_livelihood`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `tbl_relationship`
--
ALTER TABLE `tbl_relationship`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
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
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_village`
--
ALTER TABLE `tbl_village`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_year`
--
ALTER TABLE `tbl_year`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=137;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
