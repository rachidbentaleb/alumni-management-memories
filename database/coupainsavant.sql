-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3307
-- Généré le : mer. 06 nov. 2024 à 13:41
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
-- Base de données : `coupainsavant`
--

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `id_laureat` int(11) NOT NULL,
  `avis` varchar(500) NOT NULL,
  `date_avis` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `efp`
--

CREATE TABLE `efp` (
  `codeEFP` varchar(150) NOT NULL,
  `libelleEFP` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

CREATE TABLE `filiere` (
  `codeF` varchar(150) NOT NULL,
  `libelleF` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `gestionnaire`
--

CREATE TABLE `gestionnaire` (
  `matricule` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `prenom` varchar(150) NOT NULL,
  `motdepasse` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `laureat`
--

CREATE TABLE `laureat` (
  `id` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `prenom` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `motdepasse` varchar(150) NOT NULL,
  `telephone` int(11) NOT NULL,
  `promotion` year(4) NOT NULL,
  `filiere` varchar(150) NOT NULL,
  `etablissement` varchar(150) NOT NULL,
  `fonction` varchar(150) NOT NULL,
  `employeur` varchar(150) NOT NULL,
  `valider` double NOT NULL,
  `photoprofil` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `souvenirs`
--

CREATE TABLE `souvenirs` (
  `id_laureat` int(11) NOT NULL,
  `photo_souvenir` longblob NOT NULL,
  `date_souvenir` date NOT NULL,
  `commetaire_souvenir` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id_laureat`,`date_avis`);

--
-- Index pour la table `efp`
--
ALTER TABLE `efp`
  ADD PRIMARY KEY (`codeEFP`);

--
-- Index pour la table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`codeF`);

--
-- Index pour la table `gestionnaire`
--
ALTER TABLE `gestionnaire`
  ADD PRIMARY KEY (`matricule`);

--
-- Index pour la table `laureat`
--
ALTER TABLE `laureat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `souvenirs`
--
ALTER TABLE `souvenirs`
  ADD PRIMARY KEY (`date_souvenir`,`id_laureat`),
  ADD KEY `test5` (`id_laureat`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `laureat`
--
ALTER TABLE `laureat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `test6` FOREIGN KEY (`id_laureat`) REFERENCES `laureat` (`id`);

--
-- Contraintes pour la table `souvenirs`
--
ALTER TABLE `souvenirs`
  ADD CONSTRAINT `test5` FOREIGN KEY (`id_laureat`) REFERENCES `laureat` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
