-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 16, 2024 at 04:01 PM
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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `adresse` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `numtel` int NOT NULL,
  `mdp` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `email`, `adresse`, `numtel`, `mdp`, `token`) VALUES
(6, 'aymen', 'hmani@5ademni.tn', 'tunis', 22334332, '111', 'OFF'),
(7, 'rayen farhani', 'rayen.farhani@esprit.tn', 'tatouine', 12345432, '123', ''),
(12, 'KHALIL', 'tombarli@esprit.tn', 'tunis', 12345678, 'khalil123.', ''),
(14, 'NOUR', 'nour@gmail.com', 'tunis', 22222222, 'nour123.', ''),
(15, 'AHMED', 'ahmed@esprit.tn', 'benarous', 33333333, 'ahmed123.', ''),
(16, 'ALA', 'ala@esprit.tn', 'ariana', 44444444, 'alariahi123.', ''),
(17, 'LIWA', 'liwa@gmail.com', 'ariana', 55555555, 'liwa123123.', ''),
(18, 'ASMA', 'asma@gmail.com', 'tunis', 77777777, 'asma123.', ''),
(19, 'ADEM', 'adem@gmail.com', 'tunis', 99999999, 'adem123.', ''),
(20, 'HSAN', 'hsan@gmail.com', 'benarous', 12121212, 'hsan123.', ''),
(21, 'SAFWEN', 'safwen@5ademni.tn', 'benarous', 25118142, 'safwen123.', 'OFF'),
(23, 'SMILE', 'smile@esprit.tn', 'tunis', 12312312, '$2y$10$dRXJDH/5W/ST20p2yltpRuP', ''),
(24, 'INES', 'ines@esprit.tn', 'tunis', 88889999, '$2y$10$LGFPjyCoU5X6QnD7BoJokON', ''),
(25, 'AMENALLAH', 'robbanaamenallah@gmail.com', 'tunis', 95612913, '$2y$10$URzqy.qHuSILHqdtKg7oE.M', ''),
(27, 'SABAA', 'sabaa.melliti@esprit.tn', 'benarous', 55112332, 'sabaa123.', '7026ecf932936a9a9c857db4810c78f7'),
(28, 'SAFWEN', 'safwen.haboubi@esprit.tn', 'tunis', 25118142, 'amen123.', 'd60c769b0415621661f5241164e0ac9b');

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `articlesblog`
--

INSERT INTO `articlesblog` (`id_article`, `id_auteur`, `titre`, `contenu`, `datePublication`) VALUES
(3, 3, 'moncof blog', 'bnj bnj', '2024-03-31 16:18:54'),
(14, 1, 'escalope', 'health style', '2024-03-29 01:35:44'),
(15, 2, 'escalope', 'health style', '2024-03-29 01:35:44'),
(16, 1, 'aaaaa', 'aaaaaaa', '2024-04-29 21:29:04'),
(17, 1, 'aaaa', 'gh', '2024-05-15 11:37:13'),
(18, 1, 'aaaa', 'gh', '2024-05-15 12:19:02'),
(19, 1, 'aaaa', 'gh', '2024-05-15 12:19:10'),
(20, 1, 'aaaa', 'gh', '2024-05-15 12:19:39'),
(21, 1, 'aaaa', 'gh', '2024-05-15 12:23:03');

-- --------------------------------------------------------

--
-- Table structure for table `auteur`
--

DROP TABLE IF EXISTS `auteur`;
CREATE TABLE IF NOT EXISTS `auteur` (
  `id_auteur` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_auteur`)
) ENGINE=InnoDB AUTO_INCREMENT=1112 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auteur`
--

INSERT INTO `auteur` (`id_auteur`) VALUES
(102),
(105),
(110),
(1111);

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
(2, 'aaaa', 'moncof@esprit.tn'),
(3, 'moncof', 'moncof@esprit.tn');

-- --------------------------------------------------------

--
-- Table structure for table `categorie_evenement`
--

DROP TABLE IF EXISTS `categorie_evenement`;
CREATE TABLE IF NOT EXISTS `categorie_evenement` (
  `id_categorie` int NOT NULL,
  `nom_categorie` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `domaine` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorie_evenement`
--

INSERT INTO `categorie_evenement` (`id_categorie`, `nom_categorie`, `domaine`) VALUES
(1, 'Conférence', NULL),
(2, 'Congrès', NULL),
(3, 'Séminaire', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `certeficat`
--

DROP TABLE IF EXISTS `certeficat`;
CREATE TABLE IF NOT EXISTS `certeficat` (
  `id` int NOT NULL,
  `domaine` text COLLATE utf8mb4_general_ci NOT NULL,
  `date_c` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(4, 'freelance'),
(5, 'remote');

-- --------------------------------------------------------

--
-- Table structure for table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `id_evenement` int NOT NULL,
  `id_auteur` int DEFAULT NULL,
  `titre` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contenu` text COLLATE utf8mb4_general_ci,
  `dateEvenement` date DEFAULT NULL,
  `lieu` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `prix` decimal(10,2) DEFAULT NULL,
  `nbPlaces` int DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `heureEvenement` time DEFAULT NULL,
  `id_categorie` int DEFAULT NULL,
  PRIMARY KEY (`id_evenement`),
  KEY `id_categorie` (`id_categorie`),
  KEY `id_auteur` (`id_auteur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evenement`
--

INSERT INTO `evenement` (`id_evenement`, `id_auteur`, `titre`, `contenu`, `dateEvenement`, `lieu`, `prix`, `nbPlaces`, `image`, `heureEvenement`, `id_categorie`) VALUES
(102, 105, 'conférence', 'innovation technologique', '2024-05-05', 'Tunis', 80.00, 0, '../../sql/Summer_blue_ocean_scenery_HD_desktop_wallpaper_1366x768.jpg', '12:00:00', 1),
(78888, 102, 'conférence', 'innovation technologique', '2024-04-27', 'safx', 50.00, 537, '../../sql/screen-6.jpg', '17:12:00', 1),
(11022063, 1111, 'Congrès', 'innovation technologique', '2024-04-26', 'Tunis', 80.00, 196, '../../upload/pexels-carlos-oliva-3586966.jpg', '09:00:00', 2),
(31673813, 110, 'conférence', 'innovation technologique', '2024-04-26', 'Tunis', 1000.00, 547, '../../upload/pexels-carlos-oliva-3586966.jpg', '12:17:00', 1),
(85089086, 105, 'aa', 'a', '2024-04-11', 'mammaya', 454.00, 44, '../../upload/_ea2a17b6-bc6b-41ca-ae98-3fe3e7eb6389.jpeg', '20:23:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `experiance`
--

DROP TABLE IF EXISTS `experiance`;
CREATE TABLE IF NOT EXISTS `experiance` (
  `id` int NOT NULL AUTO_INCREMENT,
  `diplome` text COLLATE utf8mb4_general_ci NOT NULL,
  `certeficat` text COLLATE utf8mb4_general_ci NOT NULL,
  `competence` text COLLATE utf8mb4_general_ci NOT NULL,
  `experiance_pro` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `experiance`
--

INSERT INTO `experiance` (`id`, `diplome`, `certeficat`, `competence`, `experiance_pro`) VALUES
(2, 'francais', 'anglais', 'jhfg', 'jgfujyg'),
(5, 'francais', 'anglais', 'jhfg', 'soft skils'),
(6, 'francais', 'anglais', 'jhfg', 'soft skils');

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
(140, 'Qt dev', ''),
(154, 'Devops', ''),
(165, 'python dev', ''),
(184, 'web dev', ''),
(190, 'game dev', ''),
(263, 'CEO', ''),
(274, 'HR agent', ''),
(317, 'editor', ''),
(425, 'nurse', ''),
(592, 'mechanical engineer', '');

-- --------------------------------------------------------

--
-- Table structure for table `inscriptionevenement`
--

DROP TABLE IF EXISTS `inscriptionevenement`;
CREATE TABLE IF NOT EXISTS `inscriptionevenement` (
  `id_inscription` int NOT NULL AUTO_INCREMENT,
  `id_evenement` int DEFAULT NULL,
  `id_auteur` int DEFAULT NULL,
  `date_inscription` date DEFAULT NULL,
  PRIMARY KEY (`id_inscription`),
  KEY `id_evenement` (`id_evenement`),
  KEY `id_auteur` (`id_auteur`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inscriptionevenement`
--

INSERT INTO `inscriptionevenement` (`id_inscription`, `id_evenement`, `id_auteur`, `date_inscription`) VALUES
(22, 78888, 102, '2024-04-27'),
(23, 78888, 105, '2024-04-27'),
(24, 78888, 102, '2024-04-27'),
(25, 31673813, 105, '2024-04-27'),
(26, 11022063, 105, '2024-04-28'),
(27, 85089086, 105, '2024-04-28');

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobpostings`
--

INSERT INTO `jobpostings` (`JobID`, `Title`, `Company`, `Location`, `PostingDate`, `Salary`, `Status`, `FieldID`, `LevelID`, `EmploymentTypeID`, `JobDescription`) VALUES
(17, 'tech lead', 'google', 'usa', '2024-05-05 18:20:08', 5555, 1, 184, 3, 1, '');

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

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int NOT NULL,
  `pseudo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `message` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `pseudo`, `message`, `timestamp`) VALUES
(0, 'dora', 'je suis intéressée par vos projets', '2024-05-15 11:28:51'),
(0, 'safwen', 'moi aussi', '2024-05-15 11:47:16'),
(0, 'safwen', 'moi aussi', '2024-05-15 11:47:22'),
(0, 'dora', '????', '2024-05-16 12:18:32'),
(0, 'dora', '????', '2024-05-16 12:20:38'),
(0, 'dora', '????', '2024-05-16 12:59:59'),
(0, 'LIMA', 'SALAm', '2024-05-16 15:35:03'),
(0, 'aaaa', 'aaaa', '2024-05-16 15:35:17'),
(0, 'aaa', 'aaa❤️', '2024-05-16 15:35:30'),
(0, 'aaa', 'aaa????', '2024-05-16 15:35:35'),
(0, 'aaaa', '????????????????️????️????', '2024-05-16 15:35:47'),
(0, 'aaa', ':)', '2024-05-16 15:36:02');

-- --------------------------------------------------------

--
-- Table structure for table `postulation`
--

DROP TABLE IF EXISTS `postulation`;
CREATE TABLE IF NOT EXISTS `postulation` (
  `participer` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nom_societe` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `disponibilite_horaire` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_post` int NOT NULL AUTO_INCREMENT,
  `id_p` int NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_post`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `postulation`
--

INSERT INTO `postulation` (`participer`, `nom_societe`, `disponibilite_horaire`, `details`, `id_post`, `id_p`, `status`) VALUES
('oui', 'esprit', 'matin', 'hh', 2, 2, 'accepté'),
('non', 'esprit', 'soir', 'je suis excellent', 3, 2, 'en_cours');

-- --------------------------------------------------------

--
-- Table structure for table `projet`
--

DROP TABLE IF EXISTS `projet`;
CREATE TABLE IF NOT EXISTS `projet` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_projet` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nom_realisateur` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `niveau_etudes` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `domaine` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `budget` int NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projet`
--

INSERT INTO `projet` (`id`, `nom_projet`, `nom_realisateur`, `niveau_etudes`, `email`, `time`, `domaine`, `budget`, `description`) VALUES
(4, 'aaaaa', 'mounir', 'sadsa B', 'everpadd4@gmail.com', 10, 'AI', 5000, 'MOMOMO');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articlesblog`
--
ALTER TABLE `articlesblog`
  ADD CONSTRAINT `articlesblog_ibfk_1` FOREIGN KEY (`id_auteur`) REFERENCES `auteurs` (`id_auteur`);

--
-- Constraints for table `certeficat`
--
ALTER TABLE `certeficat`
  ADD CONSTRAINT `certeficat_ibfk_1` FOREIGN KEY (`id`) REFERENCES `experiance` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `articlesblog` (`id_article`);

--
-- Constraints for table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `evenement_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie_evenement` (`id_categorie`),
  ADD CONSTRAINT `evenement_ibfk_2` FOREIGN KEY (`id_auteur`) REFERENCES `auteur` (`id_auteur`);

--
-- Constraints for table `inscriptionevenement`
--
ALTER TABLE `inscriptionevenement`
  ADD CONSTRAINT `inscriptionevenement_ibfk_1` FOREIGN KEY (`id_evenement`) REFERENCES `evenement` (`id_evenement`),
  ADD CONSTRAINT `inscriptionevenement_ibfk_2` FOREIGN KEY (`id_auteur`) REFERENCES `auteur` (`id_auteur`);

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
