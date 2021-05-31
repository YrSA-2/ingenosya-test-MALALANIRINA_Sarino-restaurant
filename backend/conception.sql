-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 31 mai 2021 à 13:30
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `conception`
--

-- --------------------------------------------------------

--
-- Structure de la table `tbl_couvert`
--

DROP TABLE IF EXISTS `tbl_couvert`;
CREATE TABLE IF NOT EXISTS `tbl_couvert` (
  `id_couvert` int(11) NOT NULL AUTO_INCREMENT,
  `element_couvert` varchar(45) NOT NULL,
  `prix_couvert` float DEFAULT NULL,
  PRIMARY KEY (`id_couvert`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_couvert`
--

INSERT INTO `tbl_couvert` (`id_couvert`, `element_couvert`, `prix_couvert`) VALUES
(1, 'assiette', 1000),
(2, 'cuillere', 500),
(3, 'tasse', 500),
(4, 'verre', 500),
(5, 'fourchette', 500),
(7, 'couteau de table', 500);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_emballage`
--

DROP TABLE IF EXISTS `tbl_emballage`;
CREATE TABLE IF NOT EXISTS `tbl_emballage` (
  `id_emballage` int(11) NOT NULL AUTO_INCREMENT,
  `type_emballage` varchar(45) NOT NULL,
  `prix_emballage` float DEFAULT NULL,
  PRIMARY KEY (`id_emballage`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_emballage`
--

INSERT INTO `tbl_emballage` (`id_emballage`, `type_emballage`, `prix_emballage`) VALUES
(1, 'sachet', 1500),
(2, 'papier', 1500);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_ingredient`
--

DROP TABLE IF EXISTS `tbl_ingredient`;
CREATE TABLE IF NOT EXISTS `tbl_ingredient` (
  `id_ingredient` int(11) NOT NULL AUTO_INCREMENT,
  `nom_ingredient` varchar(45) NOT NULL,
  `quantite_ingredient` int(11) NOT NULL,
  `prixUnitaire_ingredient` float NOT NULL,
  PRIMARY KEY (`id_ingredient`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_ingredient`
--

INSERT INTO `tbl_ingredient` (`id_ingredient`, `nom_ingredient`, `quantite_ingredient`, `prixUnitaire_ingredient`) VALUES
(1, 'sucre', 4, 500),
(2, 'sel', 3, 200),
(3, 'huile', 10, 4000),
(4, 'Tomate', 10, 200),
(5, 'pain burger', 5, 500),
(6, 'oeuf', 10, 600),
(9, 'salade', 6, 300);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_repas`
--

DROP TABLE IF EXISTS `tbl_repas`;
CREATE TABLE IF NOT EXISTS `tbl_repas` (
  `id_repas` int(11) NOT NULL AUTO_INCREMENT,
  `nom_repas` varchar(45) NOT NULL,
  `quantite_repas` float NOT NULL,
  `serviette_repas` int(11) DEFAULT NULL,
  `id_emballage` int(11) NOT NULL,
  PRIMARY KEY (`id_repas`),
  KEY `fk_emballage_numero` (`id_emballage`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_repas`
--

INSERT INTO `tbl_repas` (`id_repas`, `nom_repas`, `quantite_repas`, `serviette_repas`, `id_emballage`) VALUES
(1, 'Pizza', 2, 1, 2),
(2, 'Fritte', 3, 2, 2),
(3, 'Hamburger', 3, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_repas_couvert`
--

DROP TABLE IF EXISTS `tbl_repas_couvert`;
CREATE TABLE IF NOT EXISTS `tbl_repas_couvert` (
  `id_repas` int(11) NOT NULL,
  `id_couvert` int(11) NOT NULL,
  KEY `fk_repas_numero` (`id_repas`),
  KEY `fk_couvert_numero` (`id_couvert`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_repas_couvert`
--

INSERT INTO `tbl_repas_couvert` (`id_repas`, `id_couvert`) VALUES
(1, 2),
(1, 1),
(1, 5),
(2, 1),
(2, 5),
(3, 5),
(3, 1),
(4, 2);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_repas_ingredient`
--

DROP TABLE IF EXISTS `tbl_repas_ingredient`;
CREATE TABLE IF NOT EXISTS `tbl_repas_ingredient` (
  `id_repas` int(11) NOT NULL,
  `id_ingredient` int(11) NOT NULL,
  `quantite_ingredient` float DEFAULT NULL,
  `id_repas_ingredient` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_repas_ingredient`),
  KEY `fk_repas_numero` (`id_repas`),
  KEY `fk_ingredient_numero` (`id_ingredient`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_repas_ingredient`
--

INSERT INTO `tbl_repas_ingredient` (`id_repas`, `id_ingredient`, `quantite_ingredient`, `id_repas_ingredient`) VALUES
(1, 4, 2, 1),
(1, 3, 4, 2),
(1, 2, 3, 3),
(2, 2, 2, 4),
(2, 3, 1, 5),
(3, 5, 5, 6),
(3, 4, 5, 7),
(3, 9, 5, 8),
(3, 6, 5, 9);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
