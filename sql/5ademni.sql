-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 30, 2024 at 12:31 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `5ademni`
--

-- --------------------------------------------------------

--
-- Table structure for table `fields`
--

DROP TABLE IF EXISTS `fields`;
CREATE TABLE IF NOT EXISTS `fields` (
  `FieldID` int NOT NULL,
  `FieldName` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`FieldID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobdescriptions`
--

DROP TABLE IF EXISTS `jobdescriptions`;
CREATE TABLE IF NOT EXISTS `jobdescriptions` (
  `JobID` int DEFAULT NULL,
  `Description` text,
  `Role` text,
  `Requirements` text,
  KEY `JobID` (`JobID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobpostings`
--

DROP TABLE IF EXISTS `jobpostings`;
CREATE TABLE IF NOT EXISTS `jobpostings` (
  `JobID` int NOT NULL,
  `Title` varchar(100) DEFAULT NULL,
  `Location` varchar(100) DEFAULT NULL,
  `PostingDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `SalaryRange` varchar(50) DEFAULT NULL,
  `EmploymentType` varchar(50) DEFAULT NULL,
  `FieldID` int DEFAULT NULL,
  PRIMARY KEY (`JobID`),
  KEY `FieldID` (`FieldID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
