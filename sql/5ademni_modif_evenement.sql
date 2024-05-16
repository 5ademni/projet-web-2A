-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 15 mai 2024 à 02:09
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `5ademni`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `adresse` varchar(30) NOT NULL,
  `numtel` int(30) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  `token` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `email`, `adresse`, `numtel`, `mdp`, `token`) VALUES
(6, 'aymen', 'mohamedmalek.hammami8@5ademni.tn', 'tunis', 22334332, '111', 'ON'),
(7, 'rayen farhani', 'rayen.farhani@esprit.tn', 'tunis', 12345432, '123', ''),
(12, 'KHALIL', 'tombarli@esprit.tn', 'tunis', 12345678, 'khalil123.', ''),
(14, 'NOUR', 'nour@gmail.com', 'tunis', 22222222, 'nour123.', ''),
(15, 'AHMED', 'ahmed@esprit.tn', 'benarous', 33333333, 'ahmed123.', ''),
(16, 'ALA', 'ala@esprit.tn', 'ariana', 44444444, 'alariahi123.', ''),
(17, 'LIWA', 'liwa@gmail.com', 'ariana', 55555555, 'liwa123123.', ''),
(18, 'ASMA', 'asma@gmail.com', 'tunis', 77777777, 'asma123.', ''),
(19, 'ADEM', 'adem@gmail.com', 'tunis', 99999999, 'adem123.', ''),
(20, 'HSAN', 'hsan@gmail.com', 'benarous', 12121212, 'hsan123.', ''),
(21, 'SAFWEN', 'safwen@5ademni.tn', 'benarous', 25118142, 'safwen123.', 'ON');

-- --------------------------------------------------------

--
-- Structure de la table `categorie_evenement`
--

CREATE TABLE `categorie_evenement` (
  `id_categorie` int(11) NOT NULL,
  `nom_categorie` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie_evenement`
--

INSERT INTO `categorie_evenement` (`id_categorie`, `nom_categorie`) VALUES
(1, 'Conference'),
(2, 'Congrès'),
(3, 'Séminaire');

-- --------------------------------------------------------

--
-- Structure de la table `domaine`
--

CREATE TABLE `domaine` (
  `id_domaine` int(11) NOT NULL,
  `nom_domaine` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `domaine`
--

INSERT INTO `domaine` (`id_domaine`, `nom_domaine`) VALUES
(2, 'mobile dev'),
(3, 'game dev'),
(4, 'marketing'),
(6, 'web dev');

-- --------------------------------------------------------

--
-- Structure de la table `employmenttypes`
--

CREATE TABLE `employmenttypes` (
  `EmploymentTypeID` int(11) NOT NULL,
  `EmploymentTypeName` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `employmenttypes`
--

INSERT INTO `employmenttypes` (`EmploymentTypeID`, `EmploymentTypeName`) VALUES
(1, 'full time'),
(2, 'part time'),
(3, 'contract'),
(4, 'freelance'),
(5, 'remote');

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `id_evenement` int(11) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `contenu` text DEFAULT NULL,
  `dateEvenement` date DEFAULT NULL,
  `lieu` varchar(255) DEFAULT NULL,
  `prix` decimal(10,2) DEFAULT NULL,
  `nbPlaces` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `heureEvenement` time DEFAULT NULL,
  `id_categorie` int(11) DEFAULT NULL,
  `id_domaine` int(11) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id_evenement`, `titre`, `contenu`, `dateEvenement`, `lieu`, `prix`, `nbPlaces`, `image`, `heureEvenement`, `id_categorie`, `id_domaine`, `id_admin`) VALUES
(35434247, 'Congrès', 'Un congrès médical ', '2024-05-15', 'beja', 80.00, 199, '../../upload/event-imagef.png', '15:00:00', 1, 4, NULL),
(71550114, 'conference', 'innovation technologique', '2024-05-16', 'Tunis', 80.00, 0, '../../upload/event-imagef.png', '12:00:00', 1, 2, 6);

-- --------------------------------------------------------

--
-- Structure de la table `fields`
--

CREATE TABLE `fields` (
  `FieldID` int(11) NOT NULL,
  `FieldName` varchar(20) NOT NULL,
  `Description` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `fields`
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
-- Structure de la table `inscriptionevenement`
--

CREATE TABLE `inscriptionevenement` (
  `id_inscription` int(11) NOT NULL,
  `id_evenement` int(11) DEFAULT NULL,
  `date_inscription` date DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `inscriptionevenement`
--

INSERT INTO `inscriptionevenement` (`id_inscription`, `id_evenement`, `date_inscription`, `id_admin`) VALUES
(126, 71550114, '2024-05-14', 6),
(127, 35434247, '2024-05-14', 6);

-- --------------------------------------------------------

--
-- Structure de la table `jobpostings`
--

CREATE TABLE `jobpostings` (
  `JobID` int(11) NOT NULL,
  `Title` varchar(30) NOT NULL,
  `Company` varchar(25) NOT NULL,
  `Location` varchar(30) NOT NULL,
  `PostingDate` datetime NOT NULL DEFAULT current_timestamp(),
  `Salary` int(11) DEFAULT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT 1,
  `FieldID` int(11) DEFAULT NULL,
  `LevelID` int(11) DEFAULT NULL,
  `EmploymentTypeID` int(11) DEFAULT NULL,
  `JobDescription` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `jobpostings`
--

INSERT INTO `jobpostings` (`JobID`, `Title`, `Company`, `Location`, `PostingDate`, `Salary`, `Status`, `FieldID`, `LevelID`, `EmploymentTypeID`, `JobDescription`) VALUES
(13, 'AAAAAAA', 'meta', 'ariana', '2024-04-16 10:56:51', 9999, 1, 555, 1, 1, ''),
(14, 'ss', 'login company', 'usa', '2024-04-27 01:15:36', 555555, 1, 105, 1, 2, 'OHOHO');

-- --------------------------------------------------------

--
-- Structure de la table `levels`
--

CREATE TABLE `levels` (
  `LevelID` int(11) NOT NULL,
  `LevelName` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `levels`
--

INSERT INTO `levels` (`LevelID`, `LevelName`) VALUES
(1, 'intership'),
(2, 'junior'),
(3, 'senior');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie_evenement`
--
ALTER TABLE `categorie_evenement`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `domaine`
--
ALTER TABLE `domaine`
  ADD PRIMARY KEY (`id_domaine`);

--
-- Index pour la table `employmenttypes`
--
ALTER TABLE `employmenttypes`
  ADD PRIMARY KEY (`EmploymentTypeID`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id_evenement`),
  ADD KEY `id_categorie` (`id_categorie`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `evenement_ibfk_3` (`id_domaine`);

--
-- Index pour la table `fields`
--
ALTER TABLE `fields`
  ADD PRIMARY KEY (`FieldID`);

--
-- Index pour la table `inscriptionevenement`
--
ALTER TABLE `inscriptionevenement`
  ADD PRIMARY KEY (`id_inscription`),
  ADD KEY `id_evenement` (`id_evenement`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Index pour la table `jobpostings`
--
ALTER TABLE `jobpostings`
  ADD PRIMARY KEY (`JobID`),
  ADD KEY `FieldID` (`FieldID`),
  ADD KEY `EmploymentTypeID` (`EmploymentTypeID`),
  ADD KEY `LevelID` (`LevelID`);

--
-- Index pour la table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`LevelID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `inscriptionevenement`
--
ALTER TABLE `inscriptionevenement`
  MODIFY `id_inscription` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT pour la table `jobpostings`
--
ALTER TABLE `jobpostings`
  MODIFY `JobID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `evenement_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie_evenement` (`id_categorie`),
  ADD CONSTRAINT `evenement_ibfk_3` FOREIGN KEY (`id_domaine`) REFERENCES `domaine` (`id_domaine`),
  ADD CONSTRAINT `evenement_ibfk_4` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`);

--
-- Contraintes pour la table `inscriptionevenement`
--
ALTER TABLE `inscriptionevenement`
  ADD CONSTRAINT `inscriptionevenement_ibfk_1` FOREIGN KEY (`id_evenement`) REFERENCES `evenement` (`id_evenement`),
  ADD CONSTRAINT `inscriptionevenement_ibfk_3` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`);

--
-- Contraintes pour la table `jobpostings`
--
ALTER TABLE `jobpostings`
  ADD CONSTRAINT `jobpostings_ibfk_1` FOREIGN KEY (`FieldID`) REFERENCES `fields` (`FieldID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jobpostings_ibfk_2` FOREIGN KEY (`EmploymentTypeID`) REFERENCES `employmenttypes` (`EmploymentTypeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jobpostings_ibfk_3` FOREIGN KEY (`LevelID`) REFERENCES `levels` (`LevelID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
