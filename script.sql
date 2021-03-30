-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 30 mars 2021 à 14:53
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pt_gmp`
--

-- --------------------------------------------------------

--
-- Structure de la table `apoursujet`
--

DROP TABLE IF EXISTS `apoursujet`;
CREATE TABLE IF NOT EXISTS `apoursujet` (
  `per_num` int NOT NULL,
  `id_sujet` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `per_num` int NOT NULL,
  `etu_nom` varchar(30) NOT NULL,
  `etu_prenom` varchar(30) NOT NULL,
  `etu_annee` int NOT NULL,
  PRIMARY KEY (`per_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`per_num`, `etu_nom`, `etu_prenom`, `etu_annee`) VALUES
(55, 'Vernel', 'Corentin', 1),
(57, 'Lerdung', 'Kylian', 1),
(58, 'De-Pellegrin', 'Remi', 1),
(59, 'Raynaud', 'Lucas', 2);

-- --------------------------------------------------------

--
-- Structure de la table `formule`
--

DROP TABLE IF EXISTS `formule`;
CREATE TABLE IF NOT EXISTS `formule` (
  `numEq` int NOT NULL AUTO_INCREMENT,
  `libEq` varchar(50) NOT NULL,
  `equation` varchar(50) NOT NULL,
  `marge` float NOT NULL,
  PRIMARY KEY (`numEq`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `formule`
--

INSERT INTO `formule` (`numEq`, `libEq`, `equation`, `marge`) VALUES
(88, 'force', '78cos(56)', 15),
(89, 'Racine carré', '125', 1),
(92, 'Gravité', 'sqrt(15)+45', 10);

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
  `per_num` int NOT NULL AUTO_INCREMENT,
  `per_mail` varchar(30) NOT NULL,
  `per_mdp` varchar(100) NOT NULL,
  PRIMARY KEY (`per_num`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`per_num`, `per_mail`, `per_mdp`) VALUES
(55, 'corentin.vw@sfr.fr', 'test'),
(56, 'pierre@gmail.com', 'test'),
(57, 'kylian@gmail.com', 'test'),
(58, 'remi@gmail.com', 'test'),
(59, 'lucas@gmail.com', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

DROP TABLE IF EXISTS `professeur`;
CREATE TABLE IF NOT EXISTS `professeur` (
  `per_num` int NOT NULL,
  `prof_nom` varchar(30) NOT NULL,
  `prof_prenom` varchar(30) NOT NULL,
  PRIMARY KEY (`per_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `professeur`
--

INSERT INTO `professeur` (`per_num`, `prof_nom`, `prof_prenom`) VALUES
(56, 'Carrillo', 'Pierre');

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

DROP TABLE IF EXISTS `reponse`;
CREATE TABLE IF NOT EXISTS `reponse` (
  `per_num` int DEFAULT NULL,
  `rep_num` int NOT NULL,
  `rep_question` int NOT NULL,
  `rep_valeur` int NOT NULL,
  `unite_num` int DEFAULT NULL,
  PRIMARY KEY (`rep_num`),
  KEY `per_num` (`per_num`),
  KEY `unite_num` (`unite_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sujet`
--

DROP TABLE IF EXISTS `sujet`;
CREATE TABLE IF NOT EXISTS `sujet` (
  `id_sujet` smallint NOT NULL AUTO_INCREMENT,
  `titre` varchar(30) NOT NULL,
  `sujet_file` text,
  `sujet_file_html` text,
  PRIMARY KEY (`id_sujet`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `sujet`
--

INSERT INTO `sujet` (`id_sujet`, `titre`, `sujet_file`, `sujet_file_html`) VALUES
(9, 'Sujet 1', '{\"ops\":[{\"attributes\":{\"bold\":true},\"insert\":\"Sujet\"},{\"insert\":\"\\n\"},{\"attributes\":{\"bold\":true},\"insert\":\"{{var}}\"},{\"insert\":\"\\n\"}]}', '<p><strong>Sujet</strong></p><p><strong>{{var}}</strong></p>');

-- --------------------------------------------------------

--
-- Structure de la table `unite`
--

DROP TABLE IF EXISTS `unite`;
CREATE TABLE IF NOT EXISTS `unite` (
  `unite_num` int NOT NULL,
  `unite_nom` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`unite_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `variable`
--

DROP TABLE IF EXISTS `variable`;
CREATE TABLE IF NOT EXISTS `variable` (
  `variable1` float DEFAULT NULL,
  `variable2` float DEFAULT NULL,
  `variable3` float DEFAULT NULL,
  `variable4` float DEFAULT NULL,
  `variable5` float DEFAULT NULL,
  `variable6` float DEFAULT NULL,
  `variable7` float DEFAULT NULL,
  `variable8` float DEFAULT NULL,
  `variable9` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `variable`
--

INSERT INTO `variable` (`variable1`, `variable2`, `variable3`, `variable4`, `variable5`, `variable6`, `variable7`, `variable8`, `variable9`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `reponse_ibfk_1` FOREIGN KEY (`per_num`) REFERENCES `personne` (`per_num`),
  ADD CONSTRAINT `reponse_ibfk_2` FOREIGN KEY (`unite_num`) REFERENCES `unite` (`unite_num`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
