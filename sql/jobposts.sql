-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 28, 2024 at 04:00 PM
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
-- Table structure for table `employmenttypes`
--

DROP TABLE IF EXISTS `employmenttypes`;
CREATE TABLE IF NOT EXISTS `employmenttypes` (
  `EmploymentTypeID` int NOT NULL,
  `EmploymentTypeName` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`EmploymentTypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employmenttypes`
--

INSERT INTO `employmenttypes` (`EmploymentTypeID`, `EmploymentTypeName`) VALUES
(1, 'full time'),
(2, 'part time'),
(3, 'contract'),
(4, 'freelance'),
(5, 'remote');

-- --------------------------------------------------------

--
-- Table structure for table `fields`
--

DROP TABLE IF EXISTS `fields`;
CREATE TABLE IF NOT EXISTS `fields` (
  `FieldID` int NOT NULL,
  `FieldName` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Description` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`FieldID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fields`
--

INSERT INTO `fields` (`FieldID`, `FieldName`, `Description`) VALUES
(101, 'web dev', 'TEST'),
(102, 'mobile dev', '#flutter #kotlin'),
(105, 'AI', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABBBBBBBBBB'),
(108, 'game dev', NULL),
(201, 'marketing', NULL),
(206, 'human resources', NULL),
(555, 'teacher', NULL),
(999, 'AAAAAAAA', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobpostings`
--

DROP TABLE IF EXISTS `jobpostings`;
CREATE TABLE IF NOT EXISTS `jobpostings` (
  `JobID` int NOT NULL AUTO_INCREMENT,
  `Title` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Company` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Location` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `PostingDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Salary` int DEFAULT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT '1',
  `FieldID` int DEFAULT NULL,
  `LevelID` int DEFAULT NULL,
  `EmploymentTypeID` int DEFAULT NULL,
  `JobDescription` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`JobID`),
  KEY `FieldID` (`FieldID`),
  KEY `EmploymentTypeID` (`EmploymentTypeID`),
  KEY `LevelID` (`LevelID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobpostings`
--

INSERT INTO `jobpostings` (`JobID`, `Title`, `Company`, `Location`, `PostingDate`, `Salary`, `Status`, `FieldID`, `LevelID`, `EmploymentTypeID`, `JobDescription`) VALUES
(13, 'AAAAAAA', 'meta', 'ariana', '2024-04-16 10:56:51', 9999, 1, 555, 1, 1, ''),
(14, 'ss', 'login company', 'usa', '2024-04-27 01:15:36', 555555, 1, 105, 1, 2, 'OHOHO');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

DROP TABLE IF EXISTS `levels`;
CREATE TABLE IF NOT EXISTS `levels` (
  `LevelID` int NOT NULL,
  `LevelName` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`LevelID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`LevelID`, `LevelName`) VALUES
(1, 'intership'),
(2, 'junior'),
(3, 'senior');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jobpostings`
--
ALTER TABLE `jobpostings`
  ADD CONSTRAINT `jobpostings_ibfk_1` FOREIGN KEY (`FieldID`) REFERENCES `fields` (`FieldID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jobpostings_ibfk_2` FOREIGN KEY (`EmploymentTypeID`) REFERENCES `employmenttypes` (`EmploymentTypeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jobpostings_ibfk_3` FOREIGN KEY (`LevelID`) REFERENCES `levels` (`LevelID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
