-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 16 mai 2024 à 16:15
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
-- Base de données : `web`
--

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `pseudo`, `message`, `timestamp`) VALUES
(0, 'dora', 'je suis intéressée par vos projets', '2024-05-15 11:28:51'),
(0, 'safwen', 'moi aussi', '2024-05-15 11:47:16'),
(0, 'safwen', 'moi aussi', '2024-05-15 11:47:22'),
(0, 'dora', '????', '2024-05-16 12:18:32'),
(0, 'dora', '????', '2024-05-16 12:20:38'),
(0, 'dora', '????', '2024-05-16 12:59:59');

-- --------------------------------------------------------

--
-- Structure de la table `postulation`
--

CREATE TABLE `postulation` (
  `participer` varchar(255) NOT NULL,
  `nom_societe` varchar(255) NOT NULL,
  `disponibilite_horaire` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_p` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `postulation`
--

INSERT INTO `postulation` (`participer`, `nom_societe`, `disponibilite_horaire`, `details`, `id_post`, `id_p`, `status`) VALUES
('oui', 'dorrrrra', 'soir', 'hh', 1, 2, 'refusé'),
('oui', 'esprit', 'matin', 'hh', 2, 2, 'accepté'),
('non', 'esprit', 'soir', 'je suis excellent', 3, 2, 'en_cours');

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `id` int(11) NOT NULL,
  `nom_projet` varchar(255) NOT NULL,
  `nom_realisateur` varchar(255) NOT NULL,
  `niveau_etudes` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `domaine` varchar(255) NOT NULL,
  `budget` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`id`, `nom_projet`, `nom_realisateur`, `niveau_etudes`, `email`, `time`, `domaine`, `budget`, `description`) VALUES
(2, 'sarah', 'sarahawichi', 'bac', 'sarah.awichi@gmail.com', 10, 'developpement', 1000, 'tayara'),
(3, 'allemand', 'yassounti', 'bac', 'dora.sioud@esprit.tn', 10, 'business', 1000, 'tayara');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `postulation`
--
ALTER TABLE `postulation`
  ADD PRIMARY KEY (`id_post`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `postulation`
--
ALTER TABLE `postulation`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
