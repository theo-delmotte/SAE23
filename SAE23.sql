-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 09 juin 2023 à 16:22
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `SAE23`
--

-- --------------------------------------------------------

--
-- Structure de la table `administration`
--

CREATE TABLE `administration` (
  `login` varchar(30) NOT NULL,
  `mdp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `administration`
--

INSERT INTO `administration` (`login`, `mdp`) VALUES
('root', 'passroot'),
('root', 'passroot');

-- --------------------------------------------------------

--
-- Structure de la table `batiment`
--

CREATE TABLE `batiment` (
  `ID_batiment` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `login` varchar(30) NOT NULL,
  `mdp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `batiment`
--

INSERT INTO `batiment` (`ID_batiment`, `nom`, `login`, `mdp`) VALUES
(25413, 'E', 'batE', 'passbatE'),
(82467, 'B', 'batB', 'passbatB');

-- --------------------------------------------------------

--
-- Structure de la table `capteur`
--

CREATE TABLE `capteur` (
  `ID_capteur` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `ID_batiment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `capteur`
--

INSERT INTO `capteur` (`ID_capteur`, `nom`, `type`, `ID_batiment`) VALUES
(25158, 'B002', 'temperature', 82467),
(25159, 'B002', 'co2', 82467),
(34568, 'E206', 'temperature', 25413),
(34569, 'E206', 'co2', 25413),
(35145, 'E210', 'temperature', 25413),
(35146, 'E210', 'co2', 25413),
(35647, 'B001', 'temperature', 82467),
(35648, 'B001', 'co2', 82467);

-- --------------------------------------------------------

--
-- Structure de la table `mesure`
--

CREATE TABLE `mesure` (
  `ID_mesure` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure` time(6) NOT NULL,
  `ID_capteur` int(11) NOT NULL,
  `valeur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `batiment`
--
ALTER TABLE `batiment`
  ADD PRIMARY KEY (`ID_batiment`);

--
-- Index pour la table `capteur`
--
ALTER TABLE `capteur`
  ADD PRIMARY KEY (`ID_capteur`),
  ADD KEY `FOREIGN` (`ID_batiment`) USING BTREE;

--
-- Index pour la table `mesure`
--
ALTER TABLE `mesure`
  ADD KEY `FOREIGN` (`ID_capteur`) USING BTREE;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `capteur`
--
ALTER TABLE `capteur`
  ADD CONSTRAINT `capteur_ibfk_1` FOREIGN KEY (`ID_batiment`) REFERENCES `batiment` (`ID_batiment`);

--
-- Contraintes pour la table `mesure`
--
ALTER TABLE `mesure`
  ADD CONSTRAINT `mesure_ibfk_1` FOREIGN KEY (`ID_capteur`) REFERENCES `capteur` (`ID_capteur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
