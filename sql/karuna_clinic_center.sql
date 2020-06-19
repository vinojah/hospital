-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 12, 2019 at 08:07 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `karuna_clinic_center`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `Admin_id` int(10) NOT NULL AUTO_INCREMENT,
  `First_Name` varchar(20) NOT NULL,
  `Last_Name` varchar(20) NOT NULL,
  `Phone_No` varchar(10) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Username` varchar(10) NOT NULL,
  `Password` varchar(10) NOT NULL,
  PRIMARY KEY (`Admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_id`, `First_Name`, `Last_Name`, `Phone_No`, `Email`, `Username`, `Password`) VALUES
(1, 'Kumar', 'Swamy', '0776542345', 'kumarswamy@gmail.com', 'kumar', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `Appointment_id` int(10) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Appointment_order` int(5) NOT NULL,
  `Doctor_id` int(10) NOT NULL,
  `Patient_id` int(11) NOT NULL,
  `Doctor_Status` enum('0','1') NOT NULL,
  `Patient_Status` enum('0','1') NOT NULL,
  PRIMARY KEY (`Appointment_id`),
  KEY `Doctor_id` (`Doctor_id`),
  KEY `Patient_id` (`Patient_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `appointment`
--


-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
  `Doctor_id` int(10) NOT NULL AUTO_INCREMENT,
  `First_Name` varchar(20) NOT NULL,
  `Last_Name` varchar(20) NOT NULL,
  `Category` varchar(20) NOT NULL,
  `Phone_No` varchar(10) NOT NULL,
  `Address` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `AvailableDay` varchar(30) NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `Admin_id` int(10) NOT NULL DEFAULT '1',
  `image` varchar(100) NOT NULL DEFAULT 'doc.png',
  PRIMARY KEY (`Doctor_id`),
  KEY `Admin_id` (`Admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`Doctor_id`, `First_Name`, `Last_Name`, `Category`, `Phone_No`, `Address`, `Email`, `AvailableDay`, `StartTime`, `EndTime`, `Username`, `Password`, `Admin_id`, `image`) VALUES
(2, 'Raveenthiran', 'Subramaniyam', 'ENT surgeon', '0763477312', 'Jaffna', 'sravee72@gmail.com', 'Sunday', '11:00:00', '12:00:00', 'raveenthiran', '12345', 1, 'doc.png'),
(3, 'Malaravan', 'Navaneethan', 'ENT surgeon', '0771247819', 'Jaffna', 'malaravann@gmail.com', 'Tuesday', '03:00:00', '05:00:00', 'malaravan', '12345', 1, 'doc.png'),
(4, 'Sritharan', 'Ramanatnan', 'Gynecologist', '0773429877', 'Thirunelveli', 'sritharan76@gmail.com', 'saturday,sunday', '06:00:00', '207:00:00', 'sritharan', '12345', 1, 'doc.png'),
(5, 'Bavanika', 'Sriskantharajah', 'Neurologist', '0776438971', 'alvai', 'sribavani82@gmail.com', 'Monday,Wednesday', '05:00:00', '19:00:00', 'bavani', 'vinoja', 1, 'doc.png'),
(6, 'Ramachandran', 'Kanthasami', 'Neurologist', '0753422784', 'Kondavil', 'kram3170@gmail.com', 'wednesday', '03:00:00', '06:00:00', 'ramachandran', '12345', 1, 'doc.png'),
(8, 'Thamayanthi', 'Kumaran', 'Pediatrician', '0769304571', 'Jaffna', 'kthamayanthi2@gmail.com', 'thursday', '02:00:00', '03:00:00', 'thamayanthi', '12345', 1, 'doc.png'),
(9, 'Mayooran', 'Sivakumar', 'Pediatrician', '0752366107', 'Jaffna', 'mayooran77@gmail.com', 'friday', '04:00:00', '07:00:00', 'mayooran', '12345', 1, 'doc.png'),
(10, 'Sutharsan', 'Murukaiya', 'Oncologist', '0771158744', 'Chunnakam', 'sutharsan76@gmail.com', 'tuesday', '09:00:00', '12:00:00', 'sutharsan', '12345', 1, 'doc.png'),
(11, 'Piratheepan', 'Sabapathy', 'Oncologist', '0773128335', 'Jaffna', 'spiratheepan7@gmail.com', 'wednesday,monday', '04:00:00', '06:00:00', 'piratheepan', '12345', 1, 'doc.png'),
(13, 'vino', 'ffgb', 'ENT Surgeon', '46464', '', 'gfg@gmail.com', '', '09:00:00', '09:00:00', 'fdf', 'fdfd565756', 1, 'doc.png');

-- --------------------------------------------------------

--
-- Table structure for table `lab_assistant`
--

CREATE TABLE IF NOT EXISTS `lab_assistant` (
  `Labassistant_id` int(10) NOT NULL AUTO_INCREMENT,
  `First_Name` varchar(20) NOT NULL,
  `Last_Name` varchar(20) NOT NULL,
  `Address` varchar(20) NOT NULL,
  `Phone_No` varchar(10) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Username` varchar(10) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `Admin_id` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Labassistant_id`),
  KEY `Admin_id` (`Admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `lab_assistant`
--

INSERT INTO `lab_assistant` (`Labassistant_id`, `First_Name`, `Last_Name`, `Address`, `Phone_No`, `Email`, `Username`, `Password`, `Admin_id`) VALUES
(1, 'Mala', 'Raja', 'Colombo', '0779865432', 'mala@gmail.com', 'malaraj', 'vithu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `Patient_id` int(11) NOT NULL AUTO_INCREMENT,
  `Firstname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Lastname` varchar(20) CHARACTER SET latin1 NOT NULL,
  `DOB` date NOT NULL,
  `Gender` enum('M','F') CHARACTER SET latin1 NOT NULL DEFAULT 'M',
  `Address` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Phone_No` varchar(10) CHARACTER SET latin1 NOT NULL,
  `Disease` varchar(30) CHARACTER SET latin1 NOT NULL,
  `Username` varchar(30) CHARACTER SET latin1 NOT NULL,
  `Password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Admin_id` int(10) NOT NULL DEFAULT '1',
  `Doctor_id` int(11) NOT NULL,
  `isEmailConfirmed` tinyint(4) NOT NULL,
  `token` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Patient_id`),
  KEY `isEmailConfirmed` (`isEmailConfirmed`,`token`) USING BTREE,
  KEY `Admin_id` (`Admin_id`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`Patient_id`, `Firstname`, `Lastname`, `DOB`, `Gender`, `Address`, `Email`, `Phone_No`, `Disease`, `Username`, `Password`, `Admin_id`, `Doctor_id`, `isEmailConfirmed`, `token`) VALUES
(8, 'vino', 'raja', '2019-02-20', 'F', 'Jaffna', 'vinojarasasuntharam@gmail.com', '0769006515', 'jknikj', 'vino', 'Vino1996', 1, 0, 1, ''),
(9, 'archchi', 'raja', '2019-02-15', 'F', 'Jaffna', 'archikumaraswamy1996@gmail.com', '07545678', 'fefef', 'archi', 'Archi111', 1, 0, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
  `Patient_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Doctor_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Lab_Assistant_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Report_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`Report_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`Patient_id`, `Doctor_id`, `Lab_Assistant_id`, `Category`, `Report_id`, `file_name`, `uploaded_on`, `status`) VALUES
('1', '1', '1', 'Heart', 1, 'week_Progress_Report[1].pdf', '2018-12-06 22:52:04', '1'),
('5', '5', '1', 'Heart', 2, 'Project_CST_group_09.pdf', '2018-12-06 22:53:56', '1'),
('3', '1', '1', 'blood', 3, 'Project_CST_group 09.pdf', '2018-12-07 14:10:27', '1'),
('12', '2', '1', 'dfsdfsdf', 4, 'Project_CST_group 09.pdf', '2018-12-10 12:21:35', '1'),
('1', '2', '1', 'blood', 5, 'Project_CST_group 09.pdf', '2018-12-10 12:31:27', '1'),
('2', '1', '1', 'blood', 6, 'Project_CST_group 09.pdf', '2018-12-10 12:55:07', '1'),
('2', '2', '1', 'blood', 7, 'CST243-3 RAD - Exercise 1.pdf', '2018-12-10 13:02:30', '1'),
('2', '3', '1', 'Blood', 8, 'CST243-3 RAD - Exercise 1.pdf', '2018-12-10 14:23:35', '1'),
('1', '2', '1', 'blood', 9, 'Project_CST_group 09.pdf', '2018-12-10 15:12:27', '1');
