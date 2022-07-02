-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 14 sep. 2020 à 07:28
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
CREATE DATABASE IF NOT EXISTS `forum` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `forum`;

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
  `jaime` int(40) NOT NULL DEFAULT 0,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`Id_Commantaire`),
  KEY `Id_Post` (`Id_Post`),
  KEY `Id_User` (`Id_User`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`Id_Commantaire`, `Id_User`, `Id_Post`, `Commentaire`, `jaime`, `Date`) VALUES
(37, 40, 120, 'Le mois 10 incha\'allah \r\nles moduls sont algebre 1/2 / Ã©lÃ©ctricitÃ© / circuit / reactivitÃ© chimique / tec 1/2  / analyse 1/2 mecanique du points / structure d\'etat et du matiere /  thermo dynamique', 0, '2020-09-08 20:32:29'),
(38, 59, 137, ' Je cherche Ã  un coloc conttacterz moi sur wsp (0665764653)', 0, '2020-09-08 21:14:02'),
(39, 59, 134, ' Merci', 0, '2020-09-08 21:16:01'),
(40, 42, 120, ' merci bcp!!', 0, '2020-09-08 21:17:41'),
(41, 40, 137, ' bienvenue dans ce group fb https://www.facebook.com/groups/1605105243088922/', 0, '2020-09-08 21:21:39'),
(42, 60, 135, ' Merci!', 0, '2020-09-08 21:50:46'),
(43, 60, 140, ' Aider moi!!', 0, '2020-09-08 21:52:49'),
(44, 62, 141, ' Help me', 0, '2020-09-10 20:19:11'),
(45, 62, 125, ' Contacter moi', 0, '2020-09-10 20:19:47'),
(46, 62, 131, ' Merci', 0, '2020-09-10 20:20:35'),
(36, 40, 119, ' Merci beaucoup meriem', 0, '2020-09-08 07:42:04'),
(35, 41, 119, ' C\'est simple mr hayar \r\n1er tu doit fait l\'inscription en lign dans le site deu fst \r\n2eme la fst va publier list des prÃ©selections \r\n3eme tu ramasse les document requis et tu va Ã  la fst et tu attend jusqu il appelle a ton nombre pour fait l\'inscription final', 0, '2020-09-08 07:40:49');

-- --------------------------------------------------------

--
-- Structure de la table `jaime`
--

DROP TABLE IF EXISTS `jaime`;
CREATE TABLE IF NOT EXISTS `jaime` (
  `Id_user` int(255) NOT NULL,
  `Id_post` int(255) NOT NULL,
  `Type` enum('like','dislike') NOT NULL,
  UNIQUE KEY `Id_user_2` (`Id_user`,`Id_post`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `jaime`
--

INSERT INTO `jaime` (`Id_user`, `Id_post`, `Type`) VALUES
(40, 137, 'like'),
(59, 120, 'like'),
(59, 134, 'like'),
(59, 137, 'like'),
(40, 135, 'like'),
(40, 120, 'like'),
(40, 132, 'like'),
(40, 139, 'like'),
(40, 119, 'like'),
(40, 124, 'like'),
(60, 135, 'like'),
(60, 140, 'like'),
(60, 121, 'like'),
(62, 141, 'dislike'),
(62, 125, 'like'),
(62, 139, 'like'),
(62, 131, 'like');

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
  `Password` varchar(255) DEFAULT NULL,
  `Phone_number` varchar(20) DEFAULT NULL,
  `Etat` enum('active','susp') NOT NULL DEFAULT 'active',
  `verifie` tinyint(1) NOT NULL DEFAULT 0,
  `Date_singup` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`Id`),
  UNIQUE KEY `login` (`Login`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`Id`, `Login`, `Email`, `Nom`, `Prenom`, `Password`, `Phone_number`, `Etat`, `verifie`, `Date_singup`) VALUES
(45, 'adamhaddan', 'hamza4@email.com', 'adam', 'haddan', '646d6e2acb991d931b4ad1ae1817da41', '+1521523654', 'active', 1, '2020-09-08'),
(44, 'karimbiran', 'hamza3@email.com', 'karim', 'biran', '646d6e2acb991d931b4ad1ae1817da41', '+1521523654', 'susp', 1, '2020-09-08'),
(43, 'ahmedhadi', 'hamza2@email.com', 'ahmed', 'hadi', '646d6e2acb991d931b4ad1ae1817da41', '+1521523654', 'susp', 1, '2020-09-08'),
(42, 'soukaynasoukayna', 'hamza1@email.com', 'soukayna', 'soukayna', '646d6e2acb991d931b4ad1ae1817da41', '+1521523654', 'active', 1, '2020-09-08'),
(61, 'hayarezfc', 'hayar.h.fst@uhp.ac.ma', 'hayar', 'ezfc', 'd015d83e2212c738e37bf0a5738d8b63', '+1521523654', 'active', 0, '2020-09-09'),
(40, 'hayarhamza', 'hamzahayar1@gmail.com', 'hayar', 'hamza', 'd015d83e2212c738e37bf0a5738d8b63', '+1521523654', 'active', 1, '2020-09-08'),
(46, 'abdellahjaadi', 'hamza5@email.com', 'abdellah', 'jaadi', '646d6e2acb991d931b4ad1ae1817da41', '+1521523654', 'active', 1, '2020-09-08'),
(47, 'meryemmeryem', 'hamza6@email.com', 'meryem', 'meryem', '646d6e2acb991d931b4ad1ae1817da41', '+1521523654', 'active', 1, '2020-09-08'),
(48, 'karimrabii', 'hamza7@email.com', 'karim', 'rabii', '646d6e2acb991d931b4ad1ae1817da41', '+1521523654', 'active', 1, '2020-09-08'),
(49, 'adamhayan', 'hamza8@email.com', 'adam', 'hayan', '646d6e2acb991d931b4ad1ae1817da41', '+1521523654', 'active', 1, '2020-09-08'),
(50, 'hamidhamid', 'hamza9@email.com', 'hamid', 'hamid', '646d6e2acb991d931b4ad1ae1817da41', '+1521523654', 'active', 1, '2020-09-08'),
(51, 'hamzahamza', 'hamza10@email.com', 'hamza', 'hamza', '646d6e2acb991d931b4ad1ae1817da41', '+1521523654', 'active', 1, '2020-09-08'),
(52, 'meryemnophon', 'hamza11@email.com', 'meryem', 'nophon', '646d6e2acb991d931b4ad1ae1817da41', '+1521523654', 'active', 1, '2020-09-08'),
(53, 'mouradkaty', 'hamza12@email.com', 'mourad', 'katy', '646d6e2acb991d931b4ad1ae1817da41', '+1521523654', 'active', 1, '2020-09-08'),
(54, 'haytamouadii', 'hamza13@email.com', 'haytam', 'ouadii', '646d6e2acb991d931b4ad1ae1817da41', '+1521523654', 'active', 1, '2020-09-08'),
(55, 'abdelhalimkarim', 'hamza14@email.com', 'abdelhalim', 'karim', '646d6e2acb991d931b4ad1ae1817da41', '+1521523654', 'active', 1, '2020-09-08'),
(62, 'HAYARHAMZA0', 'hamza_hayar@hotmail.fr', 'HAYAR', 'HAMZA', '646d6e2acb991d931b4ad1ae1817da41', '+1521523654', 'active', 1, '2020-09-10'),
(57, 'hayarhamza1', 'hamza_hayar@outlook.fr', 'hayar', 'hamza', 'd015d83e2212c738e37bf0a5738d8b63', '+1521523654', 'active', 1, '2020-09-08');

-- --------------------------------------------------------

--
-- Structure de la table `membre_infos`
--

DROP TABLE IF EXISTS `membre_infos`;
CREATE TABLE IF NOT EXISTS `membre_infos` (
  `Id` int(11) UNSIGNED NOT NULL,
  `Date_de_naissance` date DEFAULT NULL,
  `Pays` varchar(20) NOT NULL,
  `Ville` varchar(20) DEFAULT NULL,
  `Etablissement` varchar(40) DEFAULT NULL,
  `Sexe` enum('Homme','Femme') DEFAULT NULL,
  `Email_visible` tinyint(1) NOT NULL DEFAULT 1,
  `Telephone_visible` tinyint(1) NOT NULL DEFAULT 1,
  `Type` enum('user','admin') NOT NULL DEFAULT 'user',
  `description` text DEFAULT NULL,
  `premiere_inscription` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Id` (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membre_infos`
--

INSERT INTO `membre_infos` (`Id`, `Date_de_naissance`, `Pays`, `Ville`, `Etablissement`, `Sexe`, `Email_visible`, `Telephone_visible`, `Type`, `description`, `premiere_inscription`) VALUES
(50, NULL, 'Morocco', NULL, NULL, NULL, 1, 1, 'user', NULL, 0),
(49, NULL, 'Morocco', NULL, NULL, NULL, 1, 1, 'user', NULL, 0),
(48, NULL, 'Morocco', NULL, NULL, NULL, 1, 1, 'user', NULL, 0),
(47, '2020-09-08', 'Morocco', 'settat', 'FSTS', 'Homme', 1, 1, 'user', '', 1),
(46, '1999-06-16', 'Morocco', 'Rabat', 'FSTS', 'Homme', 1, 1, 'user', '', 1),
(45, '1998-10-30', 'Morocco', 'Casablanca', 'FSTS', 'Homme', 1, 1, 'user', '', 1),
(43, '2020-09-08', 'Morocco', 'Casablanca', 'FSTS', 'Homme', 1, 1, 'user', '', 1),
(44, '2000-06-13', 'Morocco', 'Casablanca', 'FSTS', 'Homme', 1, 1, 'user', '', 1),
(42, '2020-09-08', 'Morocco', 'Casablanca', 'FSTS', 'Homme', 1, 1, 'user', '', 1),
(41, '1998-02-22', 'Morocco', 'settat', 'FSTS', 'Femme', 1, 1, 'user', 'etudiante Ã  la fst settat et stagiaire au sein de la societe OKY SOLUTIONS', 1),
(40, '2000-01-19', 'Morocco', 'Casablanca', 'FSTS', 'Homme', 1, 1, 'admin', 'Etudiant a fst settat LST GI \r\n', 1),
(51, NULL, 'Morocco', NULL, NULL, NULL, 1, 1, 'user', NULL, 0),
(52, NULL, 'Morocco', NULL, NULL, NULL, 1, 1, 'user', NULL, 0),
(53, NULL, 'Morocco', NULL, NULL, NULL, 1, 1, 'user', NULL, 0),
(54, NULL, 'Morocco', NULL, NULL, NULL, 1, 1, 'user', NULL, 0),
(55, NULL, 'Morocco', NULL, NULL, NULL, 1, 1, 'user', NULL, 0),
(56, '2000-01-19', 'Morocco', 'Casablanca', 'FSTS', 'Homme', 1, 1, 'user', '', 1),
(57, '2000-01-19', 'Morocco', 'Casablanca', 'FSTS', 'Homme', 1, 1, 'user', '', 1),
(58, NULL, 'Morocco', NULL, NULL, NULL, 1, 1, 'user', NULL, 0),
(59, '2000-01-19', 'Morocco', 'Casablanca', 'FSTS', 'Homme', 1, 1, 'user', '', 1),
(60, '2000-01-19', 'Morocco', 'Casablanca', 'FSTS', 'Homme', 1, 1, 'user', '', 1),
(61, NULL, 'American Samoa', NULL, NULL, NULL, 1, 1, 'user', NULL, 0),
(62, '2000-01-19', 'Morocco', 'Casablanca', 'FSTS', 'Homme', 1, 1, 'user', '', 1);

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
  `Extension` varchar(10) DEFAULT NULL,
  `Resolu` tinyint(1) NOT NULL DEFAULT 0,
  `tmp_post` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`Id_Post`),
  KEY `Id_User` (`Id_User`)
) ENGINE=MyISAM AUTO_INCREMENT=142 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`Id_Post`, `Id_User`, `Categorie`, `Titre`, `Description`, `Fichier`, `Extension`, `Resolu`, `tmp_post`) VALUES
(135, 40, 'Blog', 'Important ! Plannings des contrÃ´les Ã  distance de la session de printemps 2019/2020', 'Il est portÃ© Ã  la connaissance des Ã©tudiants que les planning des contrÃ´les Ã  distance sont disponibles ci dessous :\r\n\r\n', 'controle-750x278.png', 'png', 0, '2020-09-08 20:21:38'),
(137, 57, 'Aide et discussion', 'logement ', 'je ne connais personne dans la ville du Settat et je veux louer avec des gens en 1 Ã©re annÃ©e comme moi ou je peux trouver des coloc ? est ce qu\'il y a un groupe facebook ou watsapp pour le logement? j\'ai vraiment besoin de votre aide merci', 'NOT EXIST', NULL, 0, '2020-09-08 20:43:59'),
(129, 40, 'Blog', 'Listes des admis Ã  la FST Settat (MIP)', 'Les listes dÃ©finitives des bacheliers admis durant la 1ere phase Ã  la FST de Settat sont affichÃ©es ci dessous: \r\nListes des admis Ã  la FST Settat (MIP)', 'FST_SETTAT_MIP.pdf', 'pdf', 0, '2020-09-08 20:06:15'),
(130, 40, 'Blog', 'Listes des admis Ã  la FST Settat (BCG)', 'Les listes dÃ©finitives des bacheliers admis durant la 1ere phase Ã  la FST de Settat sont affichÃ©es ci dessous\r\n\r\n', 'FST_SETTAT_BCG.pdf', 'pdf', 0, '2020-09-08 20:08:08'),
(131, 40, 'Blog', 'Listes des admis Ã  la FST Settat (GEGM)', 'Les listes dÃ©finitives des bacheliers admis durant la 1ere phase Ã  la FST de Settat sont affichÃ©es ci dessous\r\n\r\n', 'FST_SETTAT_GEGM.pdf', 'pdf', 0, '2020-09-08 20:08:53'),
(132, 40, 'Blog', 'Important!', 'Il portÃ© Ã  la connaissance des Ã©tudiants quâ€™ils doivent avoir un email institutionnel (@uhp.ac.ma)et un compte scolagile (http://scolagile.pw/) pour passer les examens.', 'Urgent345-1-678x350.jpeg', 'jpeg', 0, '2020-09-08 20:10:28'),
(133, 40, 'Blog', 'Important ! Dates des contrÃ´les Ã  distance de la session de printemps 2019-2020', 'Le Doyen de la FacultÃ© des Sciences et Techniques de Settat informe les Ã©tudiants que les contrÃ´les de la session de printemps 2019-2020 auront lieu :\r\nA partir du 10 Septembre 2020, pour le semestre 6 des LST/LP, le semestre 2 des Masters et les semestres 2 â€“ 4 des Cycles IngÃ©nieurs.\r\nA partir du 14 Septembre 2020, pour les Ã©tudiants des troncs communs.\r\nLes plannings dÃ©taillÃ©s des contrÃ´les seront affichÃ©s trÃ¨s prochainement. ', 'DEBUT_CONTROL-Copie-750x350.jpg', 'jpg', 0, '2020-09-08 20:12:55'),
(128, 40, 'Blog', 'Urgent! Report du dÃ©pÃ´t du baccalaurÃ©at des admis Ã  sâ€™inscrire Ã  FST Settat', 'Compte tenu de lâ€™Ã©volution Ã©pidÃ©miologique de la pandÃ©mie COVID 19 et dans un souci de protection des diffÃ©rents acteurs (candidats, parents, personnel des universitÃ©s) des risques sanitaires liÃ©es aux dÃ©placements dans les diffÃ©rentes rÃ©gions et villes du Royaume, le ministÃ¨re a dÃ©cidÃ© de reporter le dÃ©pÃ´t de lâ€™original du baccalaurÃ©at des candidats Ã  une date ultÃ©rieure et de se contenter actuellement de leurs rÃ©ponses sur la plateforme par Â« Jâ€™accepte dÃ©finitivement dâ€™admission proposÃ©e Â» qui seront considÃ©rÃ©es comme des confirmations de leur inscriptions dans les Ã©tablissements concernÃ©s.Urgent! Report du dÃ©pÃ´t du baccalaurÃ©at des admis Ã  sâ€™inscrire Ã  FST Settat', 'NOT EXIST', NULL, 0, '2020-09-08 20:03:01'),
(134, 40, 'Blog', 'Urgent! Report du dÃ©pÃ´t du baccalaurÃ©at des admis Ã  sâ€™inscrire Ã  FST Settat', 'Compte tenu de lâ€™Ã©volution Ã©pidÃ©miologique de la pandÃ©mie COVID 19 et dans un souci de protection des diffÃ©rents acteurs (candidats, parents, personnel des universitÃ©s) des risques sanitaires liÃ©es aux dÃ©placements dans les diffÃ©rentes rÃ©gions et villes du Royaume, le ministÃ¨re a dÃ©cidÃ© de reporter le dÃ©pÃ´t de lâ€™original du baccalaurÃ©at des candidats Ã  une date ultÃ©rieure et de se contenter actuellement de leurs rÃ©ponses sur la plateforme par Â« Jâ€™accepte dÃ©finitivement dâ€™admission proposÃ©e Â» qui seront considÃ©rÃ©es comme des confirmations de leur inscriptions dans les Ã©tablissements concernÃ©s.', 'Important-720x350.jpg', 'jpg', 0, '2020-09-08 20:18:17'),
(125, 47, 'Aide et discussion', 'les machines', 'salut tous le monde ! je suis nouvelle Ã  fsts et j\'ai pas les moyens pour acheter mon propre pc est ce qu\'il y a des machines Ã  fsts et est ce qu\'ils sont disponible pour tous les Ã©tudiants ?et je veux aussi savoir est ce qu\'il y a des sources d\'Ã©tude Ã  la fsts comme bibliothÃ¨que?les machines', 'NOT EXIST', NULL, 0, '2020-09-08 19:58:09'),
(126, 47, 'Aide et discussion', 'les machines', 'salut tous le monde ! je suis nouvelle Ã  fsts et j\'ai pas les moyens pour acheter mon propre pc est ce qu\'il y a des machines Ã  fsts et est ce qu\'ils sont disponible pour tous les Ã©tudiants ?et je veux aussi savoir est ce qu\'il y a des sources d\'Ã©tude Ã  la fsts comme bibliothÃ¨que?les machines', 'NOT EXIST', NULL, 0, '2020-09-08 19:58:09'),
(122, 44, 'Aide et discussion', 'Ã©ussir Ã  fsts ', 'comment je peux validÃ© chaque module et avoir des bonnes notes ?Ã©ussir Ã  fsts ', 'NOT EXIST', NULL, 0, '2020-09-08 19:54:59'),
(139, 40, 'Blog', 'Mot Du Doyen', 'La participation de tous les acteurs de la sociÃ©tÃ© Ã  la dynamique de dÃ©veloppement que connait aujourdâ€™hui notre pays est Ã  tous Ã©gards, incontestable. NÃ©anmoins, face aux diffÃ©rents changements,que connaÃ®t le monde actuellement, sur tous les plans socio-Ã©conomique, scientifique, technique et culturel de plus en plus rapides, lâ€™UniversitÃ© marocaine Ã  travers ses Ã©tablissements, se doit dâ€™Ã©voluer, de se mÃ©tamorphoser, dâ€™actualiser son systÃ¨me pÃ©dagogique et de Recherche-DÃ©veloppement, dâ€™amÃ©liorer son efficience et dâ€™Ãªtre un vrai levier de dÃ©veloppement. Elle doit Ãªtre Ã  la fois, un observatoire des avancÃ©es scientifiques, un laboratoire pour la dÃ©couverte, lâ€™innovation, et un atelier dâ€™apprentissage,du savoir et des mÃ©tiers auxquels le citoyen pourrait avoir accÃ¨s pour subveniraux besoins de tous les secteurs Ã©conomiques en cadres compÃ©tents, amÃ©liorer les niveaux de productivitÃ©, de compÃ©titivitÃ© et de qualitÃ©, dans un monde marquÃ©, notamment par la concurrence.\r\n\r\nNous dÃ©ploierons tous les efforts possibles pour que la FST-Settat continuera Ã  exercer pleinement son rÃ´le et Ãªtre la pierre angulaire dans le rayonnement de lâ€™UniversitÃ©, en termes dâ€™amÃ©lioration de lâ€™offre de formation, du dÃ©veloppement de la recherche scientifique de lâ€™innovation et du dÃ©veloppement de la rÃ©gion, en sâ€™inscrivant dans le projet de dÃ©veloppement de lâ€™UniversitÃ© Hassan premier et dans les orientations globales du ministÃ¨re de tutelle.', 'photo-jamal2-750x350.jpg', 'jpg', 0, '2020-09-08 21:23:50'),
(121, 43, 'clubs', 'les clubs', 'quls sont les clubs trouvÃ© Ã  la fsts et quels sont ses activitÃ©?les clubs', 'NOT EXIST', NULL, 0, '2020-09-08 19:53:54'),
(120, 42, 'Parcours(MIP)', 'Module de MIP', 'Bonjours! quels sont les module qu\'on aura dans les deux semestre du parcours mip?et quels sont cs modules?Module de MIP', 'NOT EXIST', NULL, 1, '2020-09-08 19:52:51');

-- --------------------------------------------------------

--
-- Structure de la table `rating_info`
--

DROP TABLE IF EXISTS `rating_info`;
CREATE TABLE IF NOT EXISTS `rating_info` (
  `User_id` int(11) NOT NULL,
  `Commentaire_id` int(11) NOT NULL,
  `rating_action` varchar(30) NOT NULL,
  UNIQUE KEY `UC_rating_info` (`User_id`,`Commentaire_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `rating_info`
--

INSERT INTO `rating_info` (`User_id`, `Commentaire_id`, `rating_action`) VALUES
(40, 35, 'heart'),
(40, 37, 'heart'),
(41, 35, 'heart'),
(42, 37, 'heart'),
(42, 40, 'heart'),
(59, 37, 'heart'),
(59, 38, 'heart'),
(60, 42, 'heart'),
(60, 43, 'heart'),
(62, 44, 'heart');

-- --------------------------------------------------------

--
-- Structure de la table `reset_password`
--

DROP TABLE IF EXISTS `reset_password`;
CREATE TABLE IF NOT EXISTS `reset_password` (
  `Code` varchar(55) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `resete` tinyint(1) NOT NULL,
  `expDate` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`Code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reset_password`
--

INSERT INTO `reset_password` (`Code`, `Email`, `resete`, `expDate`) VALUES
('768e78024aa8fdb9b8fe87be86f64745b571ea00f8', 'hamzahayar1@gmail.com', 1, '2020-09-11 20:34:48'),
('768e78024aa8fdb9b8fe87be86f64745336f979caf', 'hamzahayar1@gmail.com', 0, '2020-09-11 20:33:33'),
('768e78024aa8fdb9b8fe87be86f64745dc1b220329', 'hamzahayar1@gmail.com', 0, '2020-09-11 20:32:15'),
('768e78024aa8fdb9b8fe87be86f64745e6cb0bc81c', 'hamzahayar1@gmail.com', 0, '2020-09-11 20:26:05');

-- --------------------------------------------------------

--
-- Structure de la table `verifier_email`
--

DROP TABLE IF EXISTS `verifier_email`;
CREATE TABLE IF NOT EXISTS `verifier_email` (
  `Code` varchar(60) NOT NULL,
  `Email` varchar(50) NOT NULL,
  PRIMARY KEY (`Code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `verifier_email`
--

INSERT INTO `verifier_email` (`Code`, `Email`) VALUES
('768e78024aa8fdb9b8fe87be86f64745f9ab8dfd79', 'hamzahayar1@hotmail.fr'),
('768e78024aa8fdb9b8fe87be86f64745bfb33062e8', 'hamza_hayar@hotmail.fr'),
('768e78024aa8fdb9b8fe87be86f647453070524add', 'hamza_hayar@hotmail.fr'),
('768e78024aa8fdb9b8fe87be86f64745983473c218', 'hamza_hayar@hotmail.fr'),
('768e78024aa8fdb9b8fe87be86f64745024b956713', 'hamzahayar1@gmail.com'),
('768e78024aa8fdb9b8fe87be86f64745ce87dd7fcc', 'hamzahayar1@gmail.com'),
('', 'hamzahayar1@gmail.com'),
('768e78024aa8fdb9b8fe87be86f6474505ab7f097e', 'hamzahayar1@gmail.com'),
('768e78024aa8fdb9b8fe87be86f6474597e0567a37', 'hamza_hayar@hotmail.fr'),
('768e78024aa8fdb9b8fe87be86f6474546acf87d04', 'hayar.h.fst@uhp.ac.ma'),
('768e78024aa8fdb9b8fe87be86f64745a01b721fb0', 'hamzahayar1@gmail.com'),
('768e78024aa8fdb9b8fe87be86f647452e57f278eb', 'hayar.h.fst@uhp.ac.ma'),
('768e78024aa8fdb9b8fe87be86f64745d2eae3352e', 'hamza1@email.com'),
('768e78024aa8fdb9b8fe87be86f647453c15fed667', 'hamza2@email.com'),
('768e78024aa8fdb9b8fe87be86f64745f201c9ea0e', 'hamza3@email.com'),
('768e78024aa8fdb9b8fe87be86f64745fc82ff3643', 'hamza4@email.com'),
('768e78024aa8fdb9b8fe87be86f6474521edb108c1', 'hamza5@email.com'),
('768e78024aa8fdb9b8fe87be86f647459d628539d8', 'hamza6@email.com'),
('768e78024aa8fdb9b8fe87be86f64745558c0df7a2', 'hamza7@email.com'),
('768e78024aa8fdb9b8fe87be86f64745744b82692a', 'hamza8@email.com'),
('768e78024aa8fdb9b8fe87be86f64745cdb798f089', 'hamza9@email.com'),
('768e78024aa8fdb9b8fe87be86f647454fd8211ca6', 'hamza10@email.com'),
('768e78024aa8fdb9b8fe87be86f64745b8cc3c5b4e', 'hamza11@email.com'),
('768e78024aa8fdb9b8fe87be86f64745228af27342', 'hamza12@email.com'),
('768e78024aa8fdb9b8fe87be86f647451729a6d1f0', 'hamza13@email.com'),
('768e78024aa8fdb9b8fe87be86f647453fba4deca5', 'hamza14@email.com'),
('768e78024aa8fdb9b8fe87be86f64745639004761c', 'hamza_hayar@hotmail.fr'),
('768e78024aa8fdb9b8fe87be86f64745ba11ad8eaf', 'hamza_hayar@outlook.fr'),
('768e78024aa8fdb9b8fe87be86f64745a10363a71c', 'hamzahayar1@gmail.com'),
('768e78024aa8fdb9b8fe87be86f6474504208080cb', 'hamza_hayar@hotmail.fr'),
('768e78024aa8fdb9b8fe87be86f647455dc4dac7de', 'hamzahayar1@gmail.com'),
('768e78024aa8fdb9b8fe87be86f64745c566fdae28', 'hamza_hayar@hotmail.fr'),
('768e78024aa8fdb9b8fe87be86f64745b6e524740a', 'hayar.h.fst@uhp.ac.ma'),
('768e78024aa8fdb9b8fe87be86f647455e81d07aeb', 'hamza_hayar@hotmail.fr'),
('768e78024aa8fdb9b8fe87be86f64745c185cd59cb', 'hamzahayar@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
