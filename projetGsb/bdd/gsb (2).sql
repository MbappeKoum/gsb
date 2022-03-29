-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 25 mars 2022 à 13:07
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gsb`
--

-- --------------------------------------------------------

--
-- Structure de la table `emprunter`
--

DROP TABLE IF EXISTS `emprunter`;
CREATE TABLE IF NOT EXISTS `emprunter` (
  `dateEmprunter` date NOT NULL,
  `dateRestituer` date DEFAULT NULL,
  `vis_matricule` char(10) NOT NULL,
  `idMateriel` int(30) NOT NULL,
  PRIMARY KEY (`vis_matricule`,`idMateriel`,`dateEmprunter`) USING BTREE,
  KEY `dateEmprunter` (`dateEmprunter`),
  KEY `idMateriel` (`idMateriel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `emprunter`
--

INSERT INTO `emprunter` (`dateEmprunter`, `dateRestituer`, `vis_matricule`, `idMateriel`) VALUES
('2021-11-23', NULL, '71', 3),
('2021-12-27', '2021-12-30', 'a5', 5),
('2022-01-20', NULL, 'b', 4),
('2021-11-08', '2021-11-18', 'b1', 5),
('2021-10-11', '2021-12-15', 'b28', 4),
('2021-12-25', NULL, 'b4az', 4),
('2021-12-20', '2021-12-29', 'b4e', 4),
('2022-01-20', NULL, 'c3', 5),
('2021-12-27', '2021-12-30', 'l9', 3),
('2021-12-20', '2021-12-22', 'p7', 1),
('2022-01-20', NULL, 'p78', 4);

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
--

DROP TABLE IF EXISTS `materiel`;
CREATE TABLE IF NOT EXISTS `materiel` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(10) NOT NULL COMMENT 'tablette ou ordinateur',
  `prix` double NOT NULL,
  `taille` varchar(24) NOT NULL,
  `couleur` varchar(24) NOT NULL,
  `model` varchar(24) NOT NULL,
  `poids` double NOT NULL,
  `epaisseur` int(2) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `materiel`
--

INSERT INTO `materiel` (`ID`, `type`, `prix`, `taille`, `couleur`, `model`, `poids`, `epaisseur`) VALUES
(1, 'tablette', 180.1, '17.5 pouces', 'orange', 'Samsung tab 4', 2.5, 10),
(3, 'ordinateur', 750, '18.5 pouces', 'bleu', 'acer ', 18.8, 7),
(5, 'ordinateur', 17, '17.8 pouces', 'jaune', 'dell', 17, 6),
(6, 'ordinateur', 720, '18.8 pouces', 'rouge', 'dell', 17, 5);

-- --------------------------------------------------------

--
-- Structure de la table `visiteur`
--

DROP TABLE IF EXISTS `visiteur`;
CREATE TABLE IF NOT EXISTS `visiteur` (
  `VIS_MATRICULE` int(10) NOT NULL AUTO_INCREMENT,
  `VIS_NOM` char(25) DEFAULT NULL,
  `VIS_PRENOM` char(50) DEFAULT NULL,
  `VIS_ADRESSE` char(50) DEFAULT NULL,
  `VIS_CP` char(5) DEFAULT NULL,
  `VIS_VILLE` char(30) DEFAULT NULL,
  `VIS_DATEEMBAUCHE` datetime DEFAULT CURRENT_TIMESTAMP,
  `SEC_CODE` char(1) DEFAULT NULL,
  `LAB_CODE` char(2) DEFAULT NULL,
  `VIS_MDP` varchar(24) NOT NULL,
  `VIS_MAIL` varchar(48) NOT NULL,
  `VIS_ROLE` varchar(50) NOT NULL,
  PRIMARY KEY (`VIS_MATRICULE`),
  KEY `DEPENDRE_FK` (`LAB_CODE`),
  KEY `SEC_CODE` (`SEC_CODE`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `visiteur`
--

INSERT INTO `visiteur` (`VIS_MATRICULE`, `VIS_NOM`, `VIS_PRENOM`, `VIS_ADRESSE`, `VIS_CP`, `VIS_VILLE`, `VIS_DATEEMBAUCHE`, `SEC_CODE`, `LAB_CODE`, `VIS_MDP`, `VIS_MAIL`, `VIS_ROLE`) VALUES
(1, 'Villechalane', 'Louis', '8 cours Lafontaine', '29000', 'BREST', '2021-11-09 15:00:31', '', 'SW', 'azerty', '@gmail.com', ''),
(2, 'Andre', 'David', '1 rue Aimon de Chiss', '38100', 'GRENOBLE', '2021-11-02 15:00:35', '', 'GY', 'pov', '@gmail.com', ''),
(3, 'Bedos', 'Christian', '1 rue du B', '65000', 'TARBES', '2021-11-02 15:00:39', '', 'GY', 'poer870', '@gmail.com', ''),
(5, 'Sam', 'Jack', '8 claire fontaine', '77290', 'Mitry-Mory', '2021-11-09 15:00:31', 'P', 'SW', 'dojo77', 'jack@gmail.com', 'test'),
(9, 'Pare', 'Melvin', '1 avenue du oulin', '77294', 'Levallois', '2021-11-18 16:25:36', 'P', 'SW', 'testtest', 'melvin@gmail.com', 'testets');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
