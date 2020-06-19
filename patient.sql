-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 25, 2019 at 10:12 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `karuna_clinic_center`
--

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
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
  `isEmailConfirmed` tinyint(4) NOT NULL,
  `token` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Patient_id`),
  KEY `isEmailConfirmed` (`isEmailConfirmed`,`token`) USING BTREE,
  KEY `Admin_id` (`Admin_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`Patient_id`, `Firstname`, `Lastname`, `DOB`, `Gender`, `Address`, `Email`, `Phone_No`, `Disease`, `Username`, `Password`, `Admin_id`, `isEmailConfirmed`, `token`) VALUES
(4, 'Sajii', 'Krish', '2019-12-25', 'M', 'afsafa', 'sajithan05@gmail.com', '0773545', 'love', 'sjraja05', '#SAJII1995sajii', 1, 1, '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
