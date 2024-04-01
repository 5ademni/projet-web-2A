-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 01 avr. 2024 à 18:19
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
(15, 1, 'escalope', 'health style', '2024-03-29 01:35:44');

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
(2, 'moncof', 'moncof@esprit.tn'),
(3, 'moncof', 'moncof@esprit.tn');

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

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articlesblog`
--
ALTER TABLE `articlesblog`
  ADD PRIMARY KEY (`id_article`),
  ADD KEY `ID_Auteur` (`id_auteur`);

--
-- Index pour la table `auteurs`
--
ALTER TABLE `auteurs`
  ADD PRIMARY KEY (`id_auteur`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id_commentaire`),
  ADD KEY `ID_Article` (`id_article`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articlesblog`
--
ALTER TABLE `articlesblog`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articlesblog`
--
ALTER TABLE `articlesblog`
  ADD CONSTRAINT `articlesblog_ibfk_1` FOREIGN KEY (`ID_Auteur`) REFERENCES `auteurs` (`ID_Auteur`);

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_ibfk_1` FOREIGN KEY (`ID_Article`) REFERENCES `articlesblog` (`ID_Article`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
