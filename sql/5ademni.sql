-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 16 mai 2024 à 16:57
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
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `numtel` int(11) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
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
-- Structure de la table `articlesblog`
--

CREATE TABLE `articlesblog` (
  `id_article` int(11) NOT NULL,
  `id_auteur` int(11) DEFAULT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `datePublication` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `articlesblog`
--

INSERT INTO `articlesblog` (`id_article`, `id_auteur`, `titre`, `contenu`, `datePublication`) VALUES
(3, 3, 'moncof blog', 'bnj bnj', '2024-03-31 16:18:54'),
(14, 1, 'escalope', 'health style', '2024-03-29 01:35:44'),
(15, 2, 'escalope', 'health style', '2024-03-29 01:35:44'),
(16, 1, 'aaaaa', 'aaaaaaa', '2024-04-29 21:29:04');

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

CREATE TABLE `auteur` (
  `id_auteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `auteur`
--

INSERT INTO `auteur` (`id_auteur`) VALUES
(102),
(105),
(110),
(1111);

-- --------------------------------------------------------

--
-- Structure de la table `auteurs`
--

CREATE TABLE `auteurs` (
  `id_auteur` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `auteurs`
--

INSERT INTO `auteurs` (`id_auteur`, `nom`, `email`) VALUES
(1, 'helo', 'eaea@esprit.tn'),
(2, 'aaaa', 'moncof@esprit.tn'),
(3, 'moncof', 'moncof@esprit.tn');

-- --------------------------------------------------------

--
-- Structure de la table `categorie_evenement`
--

CREATE TABLE `categorie_evenement` (
  `id_categorie` int(11) NOT NULL,
  `nom_categorie` varchar(255) DEFAULT NULL,
  `domaine` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie_evenement`
--

INSERT INTO `categorie_evenement` (`id_categorie`, `nom_categorie`, `domaine`) VALUES
(1, 'Conférence', NULL),
(2, 'Congrès', NULL),
(3, 'Séminaire', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id_commentaire` int(11) NOT NULL,
  `id_article` int(11) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `commentaire` text NOT NULL,
  `dateCommentaire` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `id_auteur` int(11) DEFAULT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `contenu` text DEFAULT NULL,
  `dateEvenement` date DEFAULT NULL,
  `lieu` varchar(255) DEFAULT NULL,
  `prix` decimal(10,2) DEFAULT NULL,
  `nbPlaces` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `heureEvenement` time DEFAULT NULL,
  `id_categorie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id_evenement`, `id_auteur`, `titre`, `contenu`, `dateEvenement`, `lieu`, `prix`, `nbPlaces`, `image`, `heureEvenement`, `id_categorie`) VALUES
(102, 105, 'conférence', 'innovation technologique', '2024-05-05', 'Tunis', 80.00, 0, '../../sql/Summer_blue_ocean_scenery_HD_desktop_wallpaper_1366x768.jpg', '12:00:00', 1),
(78888, 102, 'conférence', 'innovation technologique', '2024-04-27', 'safx', 50.00, 537, '../../sql/screen-6.jpg', '17:12:00', 1),
(11022063, 1111, 'Congrès', 'innovation technologique', '2024-04-26', 'Tunis', 80.00, 196, '../../upload/pexels-carlos-oliva-3586966.jpg', '09:00:00', 2),
(31673813, 110, 'conférence', 'innovation technologique', '2024-04-26', 'Tunis', 1000.00, 547, '../../upload/pexels-carlos-oliva-3586966.jpg', '12:17:00', 1),
(85089086, 105, 'aa', 'a', '2024-04-11', 'mammaya', 454.00, 44, '../../upload/_ea2a17b6-bc6b-41ca-ae98-3fe3e7eb6389.jpeg', '20:23:00', 1);

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
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `id_formation` int(11) NOT NULL,
  `titre_formation` varchar(255) DEFAULT NULL,
  `duretotale_formation` int(11) DEFAULT NULL,
  `description_formation` varchar(255) DEFAULT NULL,
  `prix_formation` float DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `ids` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id_formation`, `titre_formation`, `duretotale_formation`, `description_formation`, `prix_formation`, `image`, `ids`) VALUES
(27, 'wa', 12, 'zd', 10, '663ceb776bf0f1715268471.png', 5),
(28, 'dz', 12, 'zd', 10, '66461ae5ec6701715870437.jpg', 5),
(29, 'dz', 12, 'zd', 10, '66461aeb4129a1715870443.jpg', 5),
(51, 'dzada', 5, 'zdazda', 10, '66460f52c14b21715867474.jpg', 4);

-- --------------------------------------------------------

--
-- Structure de la table `inscriptionevenement`
--

CREATE TABLE `inscriptionevenement` (
  `id_inscription` int(11) NOT NULL,
  `id_evenement` int(11) DEFAULT NULL,
  `id_auteur` int(11) DEFAULT NULL,
  `date_inscription` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `inscriptionevenement`
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
(17, 'tech lead', 'google', 'usa', '2024-05-05 18:20:08', 5555, 1, 184, 3, 1, '');

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

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

CREATE TABLE `specialite` (
  `ids` int(5) NOT NULL,
  `noms` varchar(20) NOT NULL,
  `descrips` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `specialite`
--

INSERT INTO `specialite` (`ids`, `noms`, `descrips`) VALUES
(4, 'wa', 'laaaaaaaaaaa'),
(5, 'dd', 'd'),
(6, 'dd,', 'dùm'),
(9, 'a', 'a');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `articlesblog`
--
ALTER TABLE `articlesblog`
  ADD PRIMARY KEY (`id_article`),
  ADD KEY `ID_Auteur` (`id_auteur`);

--
-- Index pour la table `auteur`
--
ALTER TABLE `auteur`
  ADD PRIMARY KEY (`id_auteur`);

--
-- Index pour la table `auteurs`
--
ALTER TABLE `auteurs`
  ADD PRIMARY KEY (`id_auteur`);

--
-- Index pour la table `categorie_evenement`
--
ALTER TABLE `categorie_evenement`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id_commentaire`),
  ADD KEY `ID_Article` (`id_article`);

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
  ADD KEY `id_auteur` (`id_auteur`);

--
-- Index pour la table `fields`
--
ALTER TABLE `fields`
  ADD PRIMARY KEY (`FieldID`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`id_formation`),
  ADD KEY `fk_formation_specialite` (`ids`);

--
-- Index pour la table `inscriptionevenement`
--
ALTER TABLE `inscriptionevenement`
  ADD PRIMARY KEY (`id_inscription`),
  ADD KEY `id_evenement` (`id_evenement`),
  ADD KEY `id_auteur` (`id_auteur`);

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
-- Index pour la table `specialite`
--
ALTER TABLE `specialite`
  ADD PRIMARY KEY (`ids`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `articlesblog`
--
ALTER TABLE `articlesblog`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `auteur`
--
ALTER TABLE `auteur`
  MODIFY `id_auteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1112;

--
-- AUTO_INCREMENT pour la table `auteurs`
--
ALTER TABLE `auteurs`
  MODIFY `id_auteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `id_formation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT pour la table `inscriptionevenement`
--
ALTER TABLE `inscriptionevenement`
  MODIFY `id_inscription` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `jobpostings`
--
ALTER TABLE `jobpostings`
  MODIFY `JobID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `specialite`
--
ALTER TABLE `specialite`
  MODIFY `ids` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articlesblog`
--
ALTER TABLE `articlesblog`
  ADD CONSTRAINT `articlesblog_ibfk_1` FOREIGN KEY (`id_auteur`) REFERENCES `auteurs` (`id_auteur`);

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `articlesblog` (`id_article`);

--
-- Contraintes pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `evenement_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie_evenement` (`id_categorie`),
  ADD CONSTRAINT `evenement_ibfk_2` FOREIGN KEY (`id_auteur`) REFERENCES `auteur` (`id_auteur`);

--
-- Contraintes pour la table `formation`
--
ALTER TABLE `formation`
  ADD CONSTRAINT `fk_formation_specialite` FOREIGN KEY (`ids`) REFERENCES `specialite` (`ids`);

--
-- Contraintes pour la table `inscriptionevenement`
--
ALTER TABLE `inscriptionevenement`
  ADD CONSTRAINT `inscriptionevenement_ibfk_1` FOREIGN KEY (`id_evenement`) REFERENCES `evenement` (`id_evenement`),
  ADD CONSTRAINT `inscriptionevenement_ibfk_2` FOREIGN KEY (`id_auteur`) REFERENCES `auteur` (`id_auteur`);

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
