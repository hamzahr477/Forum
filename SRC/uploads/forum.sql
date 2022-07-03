-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 30 août 2020 à 01:12
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `forum`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `Id_Commantaire` int(255) NOT NULL AUTO_INCREMENT,
  `Id_User` int(255) NOT NULL,
  `Id_Post` int(255) NOT NULL,
  `Commentaire` text NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`Id_Commantaire`),
  KEY `Id_Post` (`Id_Post`),
  KEY `Id_User` (`Id_User`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `jaime`
--

DROP TABLE IF EXISTS `jaime`;
CREATE TABLE IF NOT EXISTS `jaime` (
  `Id_user` int(255) NOT NULL,
  `Id_post` int(255) NOT NULL,
  `Type` enum('like','dislike') NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  KEY `Id_post` (`Id_post`),
  KEY `Id_user` (`Id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Login` varchar(20) NOT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Nom` varchar(20) DEFAULT NULL,
  `Prenom` varchar(20) DEFAULT NULL,
  `Password` varchar(20) DEFAULT NULL,
  `Phone_number` varchar(20) DEFAULT NULL,
  `Date_singup` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`Id`),
  UNIQUE KEY `login` (`Login`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `membre_infos`
--

DROP TABLE IF EXISTS `membre_infos`;
CREATE TABLE IF NOT EXISTS `membre_infos` (
  `Id` int(11) UNSIGNED NOT NULL,
  `Date de naissance` date NOT NULL,
  `Pays` varchar(20) NOT NULL,
  `Ville` varchar(20) NOT NULL,
  `Sexe` enum('Homme','Femme') NOT NULL,
  `Email_visible` tinyint(1) NOT NULL DEFAULT 1,
  `Telephone_visible` tinyint(1) NOT NULL DEFAULT 1,
  `Type` enum('user','admin') NOT NULL DEFAULT 'user',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Id` (`Id`),
  UNIQUE KEY `Numero_du_telephone` (`Date de naissance`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `Id_Post` int(255) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Id_User` int(255) NOT NULL,
  `Categorie` varchar(50) NOT NULL,
  `Titre` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `Fichier` varchar(150) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`Id_Post`),
  KEY `Id_User` (`Id_User`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sous_commentaires`
--

DROP TABLE IF EXISTS `sous_commentaires`;
CREATE TABLE IF NOT EXISTS `sous_commentaires` (
  `Id_SC` int(255) NOT NULL AUTO_INCREMENT,
  `Id_commentaire` int(255) NOT NULL,
  `Id_user` int(255) NOT NULL,
  `S_commentaire` text NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`Id_SC`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
