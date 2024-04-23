-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 22, 2024 at 07:05 PM
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
-- Table structure for table `articlesblog`
--

DROP TABLE IF EXISTS `articlesblog`;
CREATE TABLE IF NOT EXISTS `articlesblog` (
  `id_article` int NOT NULL AUTO_INCREMENT,
  `id_auteur` int DEFAULT NULL,
  `titre` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `contenu` text COLLATE utf8mb4_general_ci NOT NULL,
  `datePublication` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_article`),
  KEY `ID_Auteur` (`id_auteur`)
) ENGINE=InnoDB AUTO_INCREMENT=8889 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `articlesblog`
--

INSERT INTO `articlesblog` (`id_article`, `id_auteur`, `titre`, `contenu`, `datePublication`) VALUES
(1, 1, 'll', 'll', '2024-04-16 10:12:47'),
(3, 3, 'moncof blog', 'bnj bnj', '2024-03-31 16:18:54'),
(777, 3, 'hello', 'aaaa', '2024-04-16 10:21:44'),
(8888, 1, 'a', 'gh', '2024-04-16 10:21:11');

-- --------------------------------------------------------

--
-- Table structure for table `auteurs`
--

DROP TABLE IF EXISTS `auteurs`;
CREATE TABLE IF NOT EXISTS `auteurs` (
  `id_auteur` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_auteur`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auteurs`
--

INSERT INTO `auteurs` (`id_auteur`, `nom`, `email`) VALUES
(1, 'helo', 'eaea@esprit.tn'),
(2, 'moncof', 'moncof@esprit.tn'),
(3, 'moncof', 'moncof@esprit.tn');

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id_commentaire` int NOT NULL AUTO_INCREMENT,
  `id_article` int DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `commentaire` text COLLATE utf8mb4_general_ci NOT NULL,
  `dateCommentaire` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_commentaire`),
  KEY `ID_Article` (`id_article`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(4, 'freelance');

-- --------------------------------------------------------

--
-- Table structure for table `fields`
--

DROP TABLE IF EXISTS `fields`;
CREATE TABLE IF NOT EXISTS `fields` (
  `FieldID` int NOT NULL,
  `FieldName` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`FieldID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fields`
--

INSERT INTO `fields` (`FieldID`, `FieldName`) VALUES
(101, 'web dev'),
(102, 'mobile dev'),
(105, 'AI'),
(108, 'game dev'),
(201, 'marketing'),
(206, 'human resources'),
(555, 'teacher'),
(999, 'AAAAAAAA');

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
  `Salary` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT '1',
  `FieldID` int DEFAULT NULL,
  `LevelID` int DEFAULT NULL,
  `EmploymentTypeID` int DEFAULT NULL,
  `JobDescription` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`JobID`),
  KEY `FieldID` (`FieldID`),
  KEY `EmploymentTypeID` (`EmploymentTypeID`),
  KEY `LevelID` (`LevelID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobpostings`
--

INSERT INTO `jobpostings` (`JobID`, `Title`, `Company`, `Location`, `PostingDate`, `Salary`, `Status`, `FieldID`, `LevelID`, `EmploymentTypeID`, `JobDescription`) VALUES
(13, 'AAAAAAA', 'meta', 'ariana', '2024-04-16 10:56:51', '9999TND', 1, 555, 1, 1, '');

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
-- Constraints for table `articlesblog`
--
ALTER TABLE `articlesblog`
  ADD CONSTRAINT `articlesblog_ibfk_1` FOREIGN KEY (`id_auteur`) REFERENCES `auteurs` (`id_auteur`);

--
-- Constraints for table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `articlesblog` (`id_article`);

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
