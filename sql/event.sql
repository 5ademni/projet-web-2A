-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 22 avr. 2024 à 21:19
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
(1, 'Conférence'),
(2, 'Congrès'),
(3, 'Séminaire');

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
(74, 105, 'Congrès', 'Un congrès médical international', '2024-04-26', 'beja', 80.00, 550, '../../sql/1.png', '14:01:00', NULL),
(77, 105, 'Congrès', 'Un congrès médical international', '2024-04-23', 'safx', 400.00, 150, '../../sql/Capture d\'-20 123318.png', '15:12:00', 2),
(102, 105, 'conférence', 'innovation technologique', '2024-05-05', 'Tunis', 80.00, 100, '../../sql/Capture d\'-20 123318.png', '12:00:00', 1),
(112, 105, 'conférence', 'innovation technologique', '2024-04-21', 'Tunis', 100.00, 150, '../../sql/Capture d\'-20 123318.png', '12:00:00', 1),
(1110, 105, 'conférence', 'innovation technologique', '2024-04-23', 'beja', 80.00, 200, '../../sql/2071627.jpg', '11:00:00', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie_evenement`
--
ALTER TABLE `categorie_evenement`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id_evenement`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `evenement_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie_evenement` (`id_categorie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
